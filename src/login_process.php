<?php
	require_once __DIR__ . '/../config/connection.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		// Stessa cosa di registger
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
