<?php
	require_once __DIR__ . '/../config/connection.php';
	require_once __DIR__ . '/rate_limit.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if (!checkRateLimit($connection, 5, 2)) {
			header("Location: ../index.php?error=rate_limit");
			exit();
		}
		
		$recaptcha = $_POST['g-recaptcha-response'] ?? '';

		$secretKey = "6LdKZussAAAAAIoTXkaEjo90jRJfO6iYBcpbaiFY";
		$url = "https://www.google.com/recaptcha/api/siteverify";

		$data = [
			'secret' => $secretKey,
			'response' => $recaptcha
		];

		$options = [
			'http' => [
				'method'  => 'POST',
				'header'  => "Content-type: application/x-www-form-urlencoded",
				'content' => http_build_query($data)
			]
		];

		$context = stream_context_create($options);
		$verify = file_get_contents($url, false, $context);
		$captcha_success = json_decode($verify);

		// 3. Evaluate the Captcha results
		if (!$captcha_success || !$captcha_success->success)
		{
			header("Location: ../index.php?error=captcha");
			exit();
		}

		// 4. If rate limit passes AND captcha passes, proceed to database check
		$user = $connection->real_escape_string($_POST['username']);
		$pass = $connection->real_escape_string($_POST['password']);

		try
		{
			$sql = "SELECT * FROM giocatori 
					WHERE giocatori_username = '$user' 
					AND giocatori_password = '$pass'";
			
			$result = $connection->query($sql);

			if ($result->num_rows === 1)
			{
				$row = $result->fetch_assoc();
				
				$_SESSION['user_id'] = $row['giocatori_idGiocatore'];
				$_SESSION['username'] = $row['giocatori_username'];

				header("Location: ../gioco.php");
				exit();
			}
			else
			{
				header("Location: ../index.php?error=invalid_credentials");
				exit();
			}
		}
		catch (Exception $e)
		{
			die("Setup Error: " . $e->getMessage());
		}
	}
	else
	{
		header("Location: ../index.php");
		exit();
	}
?>
