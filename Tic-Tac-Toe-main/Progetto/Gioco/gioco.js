const player1 = localStorage.getItem('player1Name');
const player2 = localStorage.getItem('player2Name');
const player1Div = document.getElementById('player1NameDisplay');
const player2Div = document.getElementById('player2NameDisplay');
const cells = Array.from(document.querySelectorAll('.cell')); 
let currentPlayer = 'X';
let gameActive = true;
const winningCombos = [
	[1, 2, 3], [4, 5, 6], [7, 8, 9], // Righe
	[1, 4, 7], [2, 5, 8], [3, 6, 9], // Colonne
	[1, 5, 9], [3, 5, 7]             // Diagonali
];

// Utility
function newGame()
{
	gameActive = true;
	cells.forEach(cell => {
		cell.textContent = '';
		cell.classList.remove('x', 'o');
	});
	currentPlayer = 'X';
	history.back();
}

// Possibili out della partita
function checkWin()
{
	return winningCombos.some(combo => {
		return combo.every(pos => {
			const cellElement = document.getElementById(pos);
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
		window.location.replace("/home/its/Desktop/Tic-Tac-Toe-main/Progetto//WinLose/winLose.html");
		localStorage.setItem('winnerName', currentPlayer);
		return;
	}
	if (checkDraw())
	{
		gameActive = false;
		alert(`🤝 Partita Terminata in Pareggio! Complimenti i giocatori ${player1} e ${player2}`);
		window.location.replace("/home/its/Desktop/Tic-Tac-Toe-main/Progetto//Progetto/index.html");
		return;
	}
	currentPlayer = (currentPlayer === 'X') ? 'O' : 'X';
}

// MAIN
cells.forEach(cell => {cell.addEventListener('click', handleCellClick);});
player1Div.textContent = player1;
player2Div.textContent = player2;
