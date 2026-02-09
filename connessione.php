<?php

	try {

		// Avvio la connessione al database MySQL tramite la classe mysqli di PHP nella quale specifico 4 parametri (host,username,password,nome_database)
		$connessione = new mysqli("localhost", "root", "root", "tictactoe");

	} catch (mysqli_sql_exception $e) {

		echo "Errore di connessione: " . $e->getMessage();
	}
	session_start();
    // Chiudo la connessione
?>
