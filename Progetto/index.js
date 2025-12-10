const player1Input = document.getElementById('player1');
const player2Input = document.getElementById('player2');
const startButton = document.getElementById('start-button'); 

function updateStatusDisplay(message)
{
	if (statusDisplay)
		statusDisplay.textContent = message;
	else
		console.log(`Stato: ${message}`);
}

document.addEventListener("DOMContentLoaded", () => {
	
	startButton.addEventListener('click', () => {

		const p1Name = player1Input.value.trim();
		const p2Name = player2Input.value.trim();

		if (!p1Name || !p2Name) {
			alert("Per favore, inserisci i nomi di entrambi i giocatori per iniziare!");
			return;
		}

		localStorage.setItem('player1Name', p1Name);
		localStorage.setItem('player2Name', p2Name);

		window.location.href = "./Gioco/gioco.html";
	});
});
