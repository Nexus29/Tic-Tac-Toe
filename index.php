<?php
	include_once('config/connection.php'); 

	if(isset($_POST['logout']))
	{
		session_unset();
		session_destroy();
		header("Location: index.php");
		exit();
	}

	$errorMsg = "";

	// Login
	if(isset($_POST['username']) && isset($_POST['password']))
	{
		$user = $_POST['username'];
		$pass = $_POST['password'];

		if (isset($connection))
		{
			$query = "SELECT * FROM giocatori WHERE giocatori_username='$user' AND giocatori_password='$pass'";
			$result = $connection->query($query); 

			if ($result && $result->num_rows > 0)
			{
				$row = $result->fetch_assoc();
				$_SESSION['online'] = $row['giocatori_username'];
				$_SESSION['user_id'] = $row['giocatori_idGiocatore'];
				header("Location: gioco.php");
				exit();
			}
			else
				$errorMsg = "Username o password errati.";
		}
		else
			$errorMsg = "Errore: Connessione al database non caricata. Controlla il percorso del file.";
	}
?>

<!DOCTYPE html>
<html lang="it">
	<head>
		<title>Tic Tac Toe</title>
		<link rel="icon" type="image/png" href="public/assets/index.png">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="public/css/index.css">
	</head>
	<body>
		<section class="welcome">
			<h1 class="titolo">TIC TAC TOE</h1>
			<div class="border neon">
				<?php if(!isset($_SESSION['online'])): ?>
					<h1>Login</h1>
					<?php if($errorMsg) echo "<p class='error'>$errorMsg</p>"; ?>
					<form method='post' action=''>
						<label>Username:</label>
						<input type='text' name='username' class='neon' required>
						<label>Password:</label>
						<input type='password' name='password' class='neon' required>
						<div style="margin-top:20px;">
							<input type='submit' value='Entra'>
							<a href="register.php" style="color:#0ff; margin-left:15px;">Registrati</a>
						</div>
					</form>
				<?php else: ?>
					<div class="logged-in">
						<p>Bentvenuto, <strong><?php echo $_SESSION['online']; ?></strong>!</p>
						<button onclick="window.location.href='gioco.php'">Inizia Partita</button>
						<form method="post" style="display:inline;">
							<input type='submit' name='logout' value='Logout' class='logout'>
						</form>
					</div>
				<?php endif; ?>
			</div>
		</section>
	</body>
</html>
