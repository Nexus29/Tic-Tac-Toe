<?php
	require_once 'config/connection.php';

	if (isset($_SESSION['user_id']))
	{
		header("Location: index.php");
		exit();
	}
?>
<!DOCTYPE html>
<html lang="it">
	<head>
		<meta charset="UTF-8">
		<title>Registrazione - Tic-Tac-Toe</title>
		<link rel="stylesheet" href="public/css/index.css">
	</head>
	<body>
		<section class="welcome">
			<h1 class="titolo">TIC TAC TOE</h1>

			<div class="border neon register-wrapper">
				<header>
					<h1>Nuovo Giocatore</h1>
					<p>Crea il tuo account per sfidare la cpu!</p>
				</header>

				<form action="src/register_process.php" method="POST">
					<div class="input-group">
						<label for="username">Username</label>
						<input type="text" id="username" name="username" required placeholder="Inserisci username">
					</div>

					<div class="input-group">
						<label for="password">Password</label>
						<input type="password" id="password" name="password" required placeholder="Inserisci password">
					</div>

					<button type="submit" class="btn-primary">Registrati</button>
				</form>

				<footer>
					<p>Hai già un account? <a href="index.php" class="ins">Torna al Login</a></p>
				</footer>
			</div>
		</section>
	</body>
</html>
