<?php
	require_once __DIR__ . '/../config/connection.php';
	require_once __DIR__ . '/rate_limit.php';
	// 1. Carica i file necessari (Verifica che i percorsi siano esatti rispetto a dove si trova questo script)
	require __DIR__ . '/../PHPMailer/src/Exception.php';
	require __DIR__ . '/../PHPMailer/src/PHPMailer.php';
	require __DIR__ . '/../PHPMailer/src/SMTP.php';

	// 2. Importa i Namespace (NOTARE: Senza virgolette e con backslash \)
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

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

				            // Generiamo il codice
				$auth_code = random_int(100000, 999999);
				$_SESSION['temp_email'] = $row['giocatori_email'];
				// Invio Email con PHPMailer
				$mail = new PHPMailer(true);
				$mail->isSMTP();
				$mail->Host       = 'smtp.gmail.com'; 
				$mail->SMTPAuth   = true;
				$mail->Username   = 'TicTacToeManagement@gmail.com'; 
				$mail->Password   = 'qecs fpkz kwte vdut';
				$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
				$mail->Port       = 587;

				$mail->setFrom('TicTacToeManagement@gmail.com', 'Sicurezza Gioco');
				$mail->addAddress($_SESSION['temp_email']);
				$mail->isHTML(true);
				$mail->Subject = 'Codice di accesso';
				$mail->Body    = "Il tuo codice di verifica è: <b>$auth_code</b>";

				$mail->send();

				// Salviamo i dati temporaneamente in sessione
				$_SESSION['temp_username'] = $row['giocatori_username'];
				$_SESSION['temp_id'] = $row['giocatori_idGiocatore'];
				$_SESSION['auth_code'] = $auth_code;

				// Mandiamo l'utente alla pagina dove inserirà il codice
				header("Location: ./verifica.php");
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
