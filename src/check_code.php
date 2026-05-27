

<?php

require_once __DIR__ . '/../config/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codice_inserito = $_POST['codice_utente'];
    $username_temp = $_SESSION['temp_username'] ?? null;
	$id_temp = $_SESSION['temp_id'];

    if ($codice_inserito == $_SESSION['auth_code']) {
        // CODICE CORRETTO: Logghiamo l'utente ufficialmente
        $_SESSION['username'] = $username_temp;
		$_SESSION['user_id'] = $id_temp;
        
        // Puliamo i dati temporanei
        unset($_SESSION['temp_username']);
		unset($_SESSION['temp_email']);
        
        header("Location: ../gioco.php");
        exit();
    } else {
        // CODICE ERRATO
        header("Location: ./verifica.php?error=1");
        exit();
    }
}
