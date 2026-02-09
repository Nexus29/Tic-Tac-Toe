<!-- <!DOCTYPE html>
<html lang="it">
	<head>
		<title>Tic Tac Toe</title>
		<link rel="icon" type="image/png" href="./index.png">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="style.css">
	</head>
    <body>
		
        <section class="welcome">
            <h1 class="titolo"> TIC TAC TOE</h1>
            <div class="border neon">
				<div class="games">
					<h2>Partite totali giocate:</h2>
					<p id="game-count"></p>
				</div>

				<div class="playerRow">
                    <label class="nome1">Player 1:</label>
                    <input type="text" placeholder="Giocatore1" id="player1" class="neon">
                </div>
                <div class="playerRow">
                    <label class="nome2">Player 2:</label>
                    <input type="text" placeholder="Giocatore2" id="player2" class="neon">
                </div>
				<div class="buttons">
					<a><button class="gioco neon" id="start-button">Gioca</button></a>
					<a href="./Credits/credits.html"><button class="credits neon">Credits</button></a>
				</div>
			</div>
        </section>
		<footer class="footer">
			<div class="copyright">Copyright Progetto TicTacToe-2025- Tutti i diritti riservati.</div>
			<div class="fondo">
				<div class="links">
					<a href="#">Termini e Condizioni</a>
					<a href="#">Privacy</a>
					<a href="#">Cookie</a>
					<a href="#">Note Legali</a>
				</div>
			</div>
		</footer>
		<script src="index.js"></script>
    </body>
</html> -->


<!DOCTYPE html>
<html lang="it">
	<head>
		<title>Tic Tac Toe</title>
		<link rel="icon" type="image/png" href="./index.png">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="style.css">
	</head>
    <body>
		
        <section class="welcome">
            <h1 class="titolo"> TIC TAC TOE</h1>
            <div class="border neon">
				<div class="games">
					<h2>Partite totali giocate:</h2>
					<p id="game-count"></p>
				</div>

				<?php
                    include_once('connessione.php');
                    
                    if(isset($_POST['logout']))
                    {
                        session_unset();
                        session_destroy();
                    }

                    // $result = $connessione->query("SELECT * FROM giocatori");

                    // if(isset($_POST['username']) && isset($_POST['password']))
                    // {
                    //     if ($result) {
		
                    //         // Il ciclo while scorre ogni riga finché ce ne sono disponibili
                    //         while ($row = $result->fetch_assoc()) {
                    //         if($row['giocatori_username'] == $_POST['username'] && $row['giocatori_password'] == $_POST['password'])
                    //             $_SESSION['online'] = $row['giocatori_username'];
                            
                    //         }
                    //         } else {
                                
                    //             echo "Errore nella query: " . $connessione->error;
                                
                    //         }
                    // }




                    if(isset($_POST['username']) && isset($_POST['password']))
                    {


                        $result = $connessione->query("SELECT * FROM giocatori WHERE giocatori_username='".$_POST["username"]."' && giocatori_password='".$_POST["password"]."'");
                        $row = $result->fetch_assoc();

                        if (isset($row['giocatori_username'])) {
            
                            // Il ciclo while scorre ogni riga finché ce ne sono disponibili
                            $_SESSION['online'] = $row['giocatori_username'];
                                
                        }
                    
                    }

                    if(isset($_SESSION['online']))
                    {
                        header("Location: ./Gioco/gioco.php");
                    }
                    else
                    {
                        if(isset($_POST['username']) || isset($_POST['password']))
                            echo "<p class='error'>Username o password non validi</p> <br>";
                            echo "<h1>Login</h1>
                                <form method='post' action=''>
                                    <label class='nome1'>Username Player 1:</label>
                                    <input type='text' placeholder='Giocatore1' id='player1' class='neon' name='username'>
                                    <label class='nome1'>Password Player 1:</label>
                                    <input type='text' placeholder='Giocatore1' id='player1' class='neon' name='password'>
                                    <label class='nome1'>Player 2:</label>
                                    <input type='text' placeholder='Giocatore2' id='player2' class='neon'>
                                    <input type='submit' name='logout' value='Logout' class='logout'>
                                    <input type='submit' value='Gioca'>
                                </form>";
                    }
        ?>
			</div>
        </section>
		<script src="index.js"></script>
    </body>
</html> 
