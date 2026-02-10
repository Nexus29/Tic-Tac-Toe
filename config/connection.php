<?php
// inizializzazione base e dichiarazione
$host = "localhost";
$username = "root";
$password = "Wrpowered01";
$dbname = "tictactoe";
// in caso vuoi fare come in correzione usa il messaggio su discord delle ore 20:09

try
{
	$connection = new mysqli($host, $username, $password);
	if ($connection->connect_error)
		throw new Exception("Connection failed: " . $connection->connect_error);

	// Fa' quello che c'e' scritto se il database non esiste lo crea
	$createDb = "CREATE DATABASE IF NOT EXISTS $dbname";
	// La creazione reale avvine in questo if, lancio la query sopra citata e se va' a buon fine proseguo
	if ($connection->query($createDb))
	{
		$connection->select_db($dbname);
		$tableCheck = $connection->query("SHOW TABLES LIKE 'giocatori'");
		if($tableCheck->num_rows == 0)
		{
			// Carico lo schema del database fato da Gaia
			$sqlFile = __DIR__ . '/../database/tictactoe.sql';
	
			if (file_exists($sqlFile))
			{
				// Prendo il contenuto di questo file
				$sqlContent = file_get_contents($sqlFile);
				
				// Eseguo ora tutte le query prese dal mio file
				if ($connection->multi_query($sqlContent))
				{
					// Stessa cosa del while ma solo per la prima linea
					$result = $connection->store_result();
					if ($result) $result->free();
					
					// Processo i risultati mano a mano
					while ($connection->next_result())
					{
						$result = $connection->store_result();
						if ($result) $result->free();
					}
				}
			}
		}
	}

} catch (Exception $e)
{
	// Ammazzo tutto se ci sono stati thrown nel try
	die("Setup Error: " . $e->getMessage());
}

// IL session start
// Mi sembra pulito farlo qui alla fine e' dove loddiamo tutto
if (session_status() === PHP_SESSION_NONE)
	session_start();
?>

<!--
	Se volete provarlo fate il DROP del database tictactoe e poi fate: 
 		http://localhost:8000/config/connection.php
	a questo punto fate il refresh mi phpmyadmin e apparira
	il db SIUMMMMM
 -->
