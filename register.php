<?php
	require_once 'config/connection.php';

	if (isset($_SESSION['user_id']))
	{
		header("Location: index.php");
		exit();
	}
?>

<!DOCTYPE html>
<html lang="it">
<head>
	<meta charset="UTF-8">

	<meta
		name="viewport"
		content="width=device-width, initial-scale=1.0"
	>

	<link rel="stylesheet" href="public/css/register.css">

	<title>Registrazione - Tic Tac Toe</title>
</head>

<body>

	<section class="welcome">

		<h1 class="titolo">
			TIC TAC TOE
		</h1>

		<div class="border neon register-wrapper">

			<header>

				<h1>
					Nuovo Giocatore
				</h1>

				<p>
					Crea il tuo account per sfidare la CPU!
				</p>

			</header>

			<form
				id="registerForm"
				action="src/register_process.php"
				method="POST"
				autocomplete="off"
			>

				<div class="input-group">

					<label for="username">
						Username
					</label>

					<input
						type="text"
						id="username"
						name="username"
						required
						placeholder="Inserisci username"
						autocomplete="off"
					>

				</div>

				<div class="input-group">

					<label for="password">
						Password
					</label>

					<input
						type="password"
						id="password"
						name="password"
						required
						placeholder="Inserisci password"
						autocomplete="new-password"
					>

					<div class="password-rules">

						<p id="length" class="invalid">
							❌ Minimo 8 caratteri
						</p>

						<p id="uppercase" class="invalid">
							❌ Una lettera maiuscola
						</p>
						
						<p id="lowercase" class="invalid">
 
							❌ Una lettera minuscola
						</p>

						<p id="number" class="invalid">
							❌ Un numero
						</p>

						<p id="special" class="invalid">
							❌ Un carattere speciale
						</p>

					</div>

				</div>

				<div class="buttons">

					<button
						type="submit"
						class="btn-primary"
					>
						Registrati
					</button>

				</div>

			</form>

			<footer>

				<p>

					Hai già un account?

					<a
						href="index.php"
						class="ins"
					>
						Torna al Login
					</a>

				</p>

			</footer>

		</div>

	</section>

	<script>

		const password =
			document.getElementById("password");

		password.addEventListener("input", () =>
		{
			const value = password.value;

			checkRule(
				"length",
				value.length >= 8
			);

			checkRule(
				"uppercase",
				/[A-Z]/.test(value)
			);

			checkRule(
				"lowercase",
				/[a-z]/.test(value)
			);

			checkRule(
				"number",
				/[0-9]/.test(value)
			);

			checkRule(
				"special",
				/[^A-Za-z0-9]/.test(value)
			);
		});

		function checkRule(id, valid)
		{
			const element =
				document.getElementById(id);

			if (valid)
			{
				element.classList.remove("invalid");
				element.classList.add("valid");

				element.innerHTML =
					element.innerHTML.replace("❌", "✅");
			}
			else
			{
				element.classList.remove("valid");
				element.classList.add("invalid");

				element.innerHTML =
					element.innerHTML.replace("✅", "❌");
			}
		}

		window.addEventListener("pageshow", () =>
		{
			document
				.getElementById("registerForm")
				.reset();

			const rules =
			[
				"length",
				"uppercase",
				"lowercase",
				"number",
				"special"
			];

			rules.forEach((id) =>
			{
				const element =
					document.getElementById(id);

				element.classList.remove("valid");
				element.classList.add("invalid");

				element.innerHTML =
					element.innerHTML.replace("✅", "❌");
			});
		});

	</script>

</body>
</html>
