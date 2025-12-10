const player1 = localStorage.getItem('player1Name');
const player2 = localStorage.getItem('player2Name');
let currentPlayer = 'X';
let gameActive = true;
const winningCombos = [
	[1, 2, 3], [4, 5, 6], [7, 8, 9], // Righe
	[1, 4, 7], [2, 5, 8], [3, 6, 9], // Colonne
	[1, 5, 9], [3, 5, 7]             // Diagonali
];
const cells = Array.from(document.querySelectorAll('.cell')); 
const statusDisplay = document.querySelector('#gameStatus');

// Utility
function newGame()
{
	gameActive = true;
	cells.forEach(cell => {
		cell.textContent = '';
		cell.classList.remove('x', 'o');
	});
	currentPlayer = 'X';
	updateStatusDisplay(`Back to the future!`);
	history.back();
}

function updateStatusDisplay(message)
{
	if (statusDisplay)
		statusDisplay.textContent = message;
	else
		console.log(`Stato: ${message}`);
}

// Possibili out della partita
function checkWin()
{
	return winningCombos.some(combo => {
		return combo.every(pos => {
			const cellElement = document.getElementById(pos);
			// Verifica che la cella esista e che il contenuto della cella corrisponda al giocatore attuale
			return cellElement && cellElement.textContent === currentPlayer;
		});
	});
}

function checkDraw() {return cells.every(cell => cell.textContent !== '');}

function handleCellClick()
{
	if (!gameActive || this.textContent !== '') return;
	this.textContent = currentPlayer;
	this.classList.add(currentPlayer.toLowerCase());
	if (checkWin())
	{
		gameActive = false;
		updateStatusDisplay(`🎉 Vittoria di ${currentPlayer}!`);
		return;
	}
	if (checkDraw())
	{
		gameActive = false;
		updateStatusDisplay(`🤝 Partita Terminata in Pareggio!`);
		return;
	}
	currentPlayer = (currentPlayer === 'X') ? 'O' : 'X';
	updateStatusDisplay(`Turno del giocatore ${currentPlayer}`);
}

// MAIN
cells.forEach(cell => {cell.addEventListener('click', handleCellClick);});
updateStatusDisplay(`Player1: ${player1} Player2: ${player2}`);
updateStatusDisplay(`Inizia la X!`);
