<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../public/css/index.css">
    <title>Verifica Codice</title>
</head>
<body>
    <div class="welcome border neon">
        <div class="cont">
			<?php
				require_once __DIR__ . '/../config/connection.php'; 

				if(!isset($_SESSION['temp_email']) && !isset($_SESSION['temp_id'])  && !isset($_SESSION['temp_username']))
					header("Location: ../index.php");
			?>
            <h2>Inserisci Codice</h2>
            <p>Abbiamo inviato un codice a: 
				<?php 
					
					echo $_SESSION['temp_email'] ?? 'tua email'; 
					?>
				</p>
            
            <form action="check_code.php" method="POST">
                <input type="number" name="codice_utente" placeholder="Codice 6 cifre" required>
                <button type="submit" class="reg">Verifica</button>
            </form>
            
            <?php if(isset($_GET['error'])) echo "<p style='color:red'>Codice errato!</p>"; ?>
        </div>
    </div>
</body>
</html>
