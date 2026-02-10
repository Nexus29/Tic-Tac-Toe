<?php
	require_once __DIR__ . '/../config/connection.php';

	if (isset($_SESSION['user_id']) && isset($_POST['result']))
	{
		
		$userId = $_SESSION['user_id'];
		$result = $_POST['result'];
		$win = ($result === 'win') ? 1 : 0;

		try
		{
			$stmt = $connection->prepare("INSERT INTO partite (partite_idGiocatore, partite_risultato) VALUES (?, ?)");

			$stmt->bind_param("ii", $userId, $win);
			if ($stmt->execute())
				echo "Risultato salvato con successo!";
			else
				echo "Errore durante il salvataggio: " . $stmt->error;

			$stmt->close();
		}
		catch (Exception $e)
		{
			echo "Database Error: " . $e->getMessage();
		}
	}
	else
		echo "Dati mancanti o sessione non valida.";
?>