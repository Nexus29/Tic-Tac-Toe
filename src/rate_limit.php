<?php

function getClientIp() {
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		return $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		return explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0];
	}
	return $_SERVER['REMOTE_ADDR'];
}

function checkRateLimit($connection, $maxAttempts = 5, $timeFrame = 2) {
	$ip = getClientIp();

	$connection->query("DELETE FROM login_attempts WHERE attempt_time < NOW() - INTERVAL 1 DAY");

	$stmt = $connection->prepare("
		SELECT COUNT(*) FROM login_attempts 
		WHERE ip_address = ? 
		AND attempt_time > NOW() - INTERVAL ? MINUTE
	");
	$stmt->bind_param("si", $ip, $timeFrame);
	$stmt->execute();
	$res = $stmt->get_result();
	$attempts = $res->fetch_row()[0];
	$stmt->close();

	if ($attempts >= $maxAttempts) {
		return false;
	}

	$logStmt = $connection->prepare("INSERT INTO login_attempts (ip_address) VALUES (?)");
	$logStmt->bind_param("s", $ip);
	$logStmt->execute();
	$logStmt->close();

	return true;
}
