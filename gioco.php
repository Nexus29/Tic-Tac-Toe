<!DOCTYPE html>
<html lang="it">
	<head>
		<title>Game</title>
		<link rel="icon" type="image/png" href="public/assets/gioco.png">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="public/css/gioco.css">
	</head>
	<body>
		<section class="grid">
			<h1 class="title">TIC-TAC-TOE</h1>
			<div class="board border">
				<div class="cell" id="1"></div>
				<div class="cell" id="2"></div>
				<div class="cell" id="3"></div>
				<div class="cell" id="4"></div>
				<div class="cell" id="5"></div>
				<div class="cell" id="6"></div>
				<div class="cell" id="7"></div>
				<div class="cell" id="8"></div>
				<div class="cell" id="9"></div>
			</div>
			<div class="players border">
				<?php
					include_once('config/connection.php');
					
					echo "<div class=\"symbol x\">x</div>
						<div class=\"playerName\" id=\"player1NameDisplay\"> " . (isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Player') . "</div>";
				?>
				<div class="playerName" id="player2NameDisplay">Bot</div>
				<div class="symbol o">o</div>
			</div>
		</section>
		<script src="public/js/gioco.js"></script>
	</body>
</html>
