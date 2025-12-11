const player1Input = document.getElementById('player1');
const player2Input = document.getElementById('player2');
const startButton = document.getElementById('start-button');
const gameHistory = document.getElementById('game-count');
const COUNTER_KEY = 'totalGames';

// Per prendere il numero di partite
function getGamesCount()
{
	const counter = localStorage.getItem(COUNTER_KEY);
	return +(counter || 0);
}

function displayGamesCount()
{
    const count = getGamesCount();
    if (gameHistory)
        gameHistory.textContent = count;
}

document.addEventListener("DOMContentLoaded", () => {

	displayGamesCount();

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
