<?php

require_once __DIR__ . '/../config/connection.php';
// Connessione PDO al database


/* 1. CONTROLLO AUTENTICAZIONE- */
// se l'utente è loggato e ho ricevuto result 
if (isset($_SESSION['user_id']) && isset($_POST['result']))
{
    $userId = $_SESSION['user_id'];
    $result = $_POST['result'];

    $win = ($result === 'win') ? 1 : 0;

    $stmt = $connection->prepare("INSERT INTO partite (partite_idGiocatore, partite_risultato) VALUES (?, ?)");
    $stmt->bind_param("ii", $userId, $vittoria);

    if ($stmt->execute())
        echo "inseriti con successo";
    $stmt->close();
}
?>
