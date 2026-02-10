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

	if(isset($_GET['error']) && $_GET['error'] == 'invalid_credentials')
		$errorMsg = "Username o password errati.";
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
				<?php if(!isset($_SESSION['username'])): ?>
					<h1 class="login">Login</h1>
					<?php if($errorMsg) echo "<p class='error' style='color:red;'>$errorMsg</p>"; ?>
					
					<form action="src/login_process.php" method="POST">
						<label for="user">Username:</label>
						<input type="text" name="username" id="user" class="neon" required>
						<label for="pass">Password:</label>
						<input type="password" name="password" id="pass" class="neon" required>
						<div style="margin-top:20px;">
							<button type="submit">Log In</button>
							<a href="register.php" class="ins">Registrati</a>
						</div>
					</form>
				<?php else: ?>
					<div class="logged-in">
						<?php
							$userId = $_SESSION['user_id'];
							$statsQuery = "SELECT COUNT(*) as total_wins FROM partite 
										WHERE partite_idGiocatore = '$userId' 
										AND partite_risultato = 1";
							
							$statsResult = $connection->query($statsQuery);
							$stats = $statsResult->fetch_assoc();
							$wins = $stats['total_wins'];
						?>
						<p>Benvenuto, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong>!</p>
						<p style="color: #0ff; margin-bottom: 20px;">
							Vittorie totali: <strong><?php echo $wins; ?></strong>
						</p>
						<div style="margin-bottom:15px;">
							<a href="gioco.php" style="display:inline-block; padding:10px 20px; background:#0ff; color:#000; text-decoration:none; font-weight:bold; border-radius:5px;">Inizia Partita</a>
						</div>
						<form method="post">
							<input type='submit' name='logout' value='Logout' class='logout' style="background:none; border:none; color:red; cursor:pointer; text-decoration:underline;">
						</form>
					</div>
				<?php endif; ?>
			</div>
		</section>
	</body>
</html>
