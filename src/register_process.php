<?php
	require_once __DIR__ . '/../config/connection.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		// Misura di sicurezza per prevenire code injection
		$user = $connection->real_escape_string($_POST['username']);
		$pass = $connection->real_escape_string($_POST['password']);

		try
		{
			$checkSql = "SELECT * FROM giocatori WHERE giocatori_username = '$user'";
			$result = $connection->query($checkSql);

			// Se l'utente esiste gia' nel database
			if ($result->num_rows > 0)
				die("Errore: Questo username è già in uso. <a href='../register.php'>Riprova</a>");

			$insertSql = "INSERT INTO giocatori (giocatori_username, giocatori_password) 
						VALUES ('$user', '$pass')";

			// Immentto l'utente nel database
			if ($connection->query($insertSql))
				echo "Registrazione completata! Ora puoi <a href='../index.php'>effettuare il login</a>.";
			else
				throw new Exception("Errore durante la registrazione: " . $connection->error);
		}
		catch (Exception $e)
		{
			die("Setup Error: " . $e->getMessage());
		}
	}
	else
	{
		header("Location: ../register.php");
		exit();
	}
?>
