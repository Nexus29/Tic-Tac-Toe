<?php
if (!isset($_SESSION['temp_user_id'])) {
	header("Location: index.php");
	exit();
}

// CHIAVE SEGRETA FISSA (Gimmick senza DB - usa 16 caratteri base32, es: A-Z, 2-7)
$secret = 'TICTACTOE2FACOOL'; 
$errorMsg = "";

function getTOTPCode($secret) {
	// key on 32 bit
	$base32chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ234567";
	$base32charsFlipped = array_flip(str_split($base32chars));
	$binarySecret = "";
	foreach (str_split($secret) as $char) {
		if (isset($base32charsFlipped[$char])) {
			$binarySecret .= str_pad(decbin($base32charsFlipped[$char]), 5, "0", STR_PAD_LEFT);
		}
	}
	$binarySecret = pack('H*', array_reduce(str_split($binarySecret, 8), function($carry, $item) {
		return $carry . sprintf('%02x', bindec($item));
	}, ''));

	$timeSlice = floor(time() / 30);
	$timestamp = pack('N*', 0) . pack('N*', $timeSlice);

	// hash of the password
	$hash = hash_hmac('sha1', $timestamp, $binarySecret, true);
	$offset = ord($hash[19]) & 0xf;
	
	$code = (
		(ord($hash[$offset+0]) & 0x7f) << 24 |
		(ord($hash[$offset+1]) & 0xff) << 16 |
		(ord($hash[$offset+2]) & 0xff) << 8  |
		(ord($hash[$offset+3]) & 0xff)
	) % 1000000;

	return str_pad($code, 6, "0", STR_PAD_LEFT);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$user_code = trim($_POST['otp_code']);
	$correct_code = getTOTPCode($secret);

	if ($user_code === $correct_code) {
		// Login Definitivo
		$_SESSION['user_id'] = $_SESSION['temp_user_id'];
		$_SESSION['username'] = $_SESSION['temp_username'];
		
		unset($_SESSION['temp_user_id'], $_SESSION['temp_username']);
		header("Location: gioco.php");
		exit();
	} else {
		$errorMsg = "Codice errato o scaduto. Verifica l'ora del telefono.";
	}
}

$qrCodeUrl = "https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=" . urlencode("otpauth://totp/TicTacToe:" . $_SESSION['temp_username'] . "?secret=" . $secret . "&issuer=TicTacToe");
?>

<!DOCTYPE html>
<html lang="it">
<head>
	<title>Google Authenticator 2FA</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="public/css/index.css">
</head>
<body>
	<section class="welcome">
		<div class="border neon" style="max-width: 400px; margin: auto;">
			<h1>Google 2FA</h1>
			
			<div style="text-align: center; margin: 20px 0; background: white; padding: 10px; display: inline-block; border-radius: 5px;">
				<img src="<?php echo $qrCodeUrl; ?>" alt="QR Code" style="display:block;">
			</div>
			
			<p style="font-size: 0.85rem; color: #aaa; margin-bottom: 15px;">
				Inquadra il QR con Google Authenticator (solo la prima volta) e inserisci il codice a 6 cifre.
			</p>

			<?php if($errorMsg) echo "<p style='color:red; font-size:0.9rem;'>$errorMsg</p>"; ?>

			<form method="POST">
				<input type="text" name="otp_code" maxlength="6" placeholder="000000" required autocomplete="off" 
					   style="text-align: center; font-size: 1.8rem; letter-spacing: 5px; width: 80%;" class="neon">
				<br>
				<button type="submit" style="margin-top: 20px;">Verifica codice</button>
			</form>
		</div>
	</section>
</body>
</html>
