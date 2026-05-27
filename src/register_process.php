<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../public/css/index.css">
	<title>Document</title>
</head>
<body>
	<div class="welcome border neon">
		<div class="cont">
			<?php
				ini_set('pcre.jit', '0');
				require_once __DIR__ . '/../config/connection.php';

				if ($_SERVER["REQUEST_METHOD"] == "POST")
				{

					$user = $connection->real_escape_string($_POST['username']);
					$pass = $_POST['password'];
					$email = $_POST['email'];

					// ---- SERVER-SIDE PASSWORD VALIDATION ----
					$errors = [];

					if (strlen($pass) < 8) {
						$errors[] = "Minimo 8 caratteri";
					}
					if (!preg_match('/[A-Z]/', $pass)) {
						$errors[] = "Una lettera maiuscola";
					}
					if (!preg_match('/[a-z]/', $pass)) {
						$errors[] = "Una lettera minuscola";
					}
					if (!preg_match('/[0-9]/', $pass)) {
						$errors[] = "Un numero";
					}
					if (!preg_match('/[^A-Za-z0-9]/', $pass)) {
						$errors[] = "Un carattere speciale";
					}

					if (!empty($errors)) {
						echo "<h3>Errore di validazione password:</h3><ul style='color:red; text-align:left; margin-bottom: 20px;'>";
						foreach ($errors as $error) {
							echo "<li>❌ $error</li>";
						}
						echo "</ul>";
						die("<a class='reg' href='../register.php'>Torna indietro e riprova</a>");
					}
					$_SESSION['temp_email'] = $_POST['email'];
					$passEscaped = $connection->real_escape_string($pass);

					try
					{
						$checkSql = "SELECT * FROM giocatori WHERE giocatori_username = '$user'";
						$result = $connection->query($checkSql);

						// Se l'utente esiste gia' nel database
						if ($result->num_rows > 0)
							die("Errore: Questo username è già in uso. <a class='reg' href='../register.php'>Riprova</a>");

						$insertSql = "INSERT INTO giocatori (giocatori_username, giocatori_password, giocatori_email) 
									VALUES ('$user', '$passEscaped', '$email')";

						// Immetto l'utente nel database
						if ($connection->query($insertSql))
							echo "Registrazione completata! Ora puoi <a class='reg' href='../index.php'>effettuare il login</a>";
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
		</div>
	</div>
</body>
</html>
