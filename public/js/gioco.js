const player1Div = document.getElementById('player1NameDisplay');
const player2Div = document.getElementById('player2NameDisplay');
const cells = Array.from(document.querySelectorAll('.cell')); 

const player1 = player1Div.textContent.trim() || "Giocatore";
const player2 = player2Div.textContent.trim() || "Bot";

let currentPlayer = 'X';
let gameActive = true;

const winningCombos = [
	[1, 2, 3], [4, 5, 6], [7, 8, 9],
	[1, 4, 7], [2, 5, 8], [3, 6, 9],
	[1, 5, 9], [3, 5, 7]
];

function botMove()
{
	if (!gameActive) return;

	const availableCells = cells.filter(cell => cell.textContent === '');
	
	if (availableCells.length > 0)
	{
		const randomCell = availableCells[Math.floor(Math.random() * availableCells.length)];
		// Delay artificiale fatto per emulare un ragionamento in questo modo il bot non risponde instant
		setTimeout(() => {
			randomCell.click();
		}, 600);
	}
}

function handleCellClick()
{
	if (!gameActive || this.textContent !== '') return;

	this.textContent = currentPlayer;
	this.classList.add(currentPlayer.toLowerCase());

	if (checkWin())
	{
		gameActive = false;
		const winner = (currentPlayer === 'X') ? player1 : player2;
		alert(`🎉 Vittoria per ${winner}!`);
		window.location.href = 'index.php';
		return;
	}

	if (checkDraw())
	{
		gameActive = false;
		alert(`🤝 Pareggio tra ${player1} e ${player2}!`);
		window.location.href = 'index.php';
		return;
	}

	currentPlayer = (currentPlayer === 'X') ? 'O' : 'X';

	// Bot turn
	if (currentPlayer === 'O' && gameActive)
		botMove();
}

function checkWin()
{
	return winningCombos.some(combo => {
		return combo.every(pos => {
			const cellElement = document.getElementById(pos.toString());
			return cellElement && cellElement.textContent === currentPlayer;
		});
	});
}

function checkDraw()
{ 
	return cells.every(cell => cell.textContent !== ''); 
}

function newGame()
{
	gameActive = true;
	currentPlayer = 'X';
	cells.forEach(cell => {
		cell.textContent = '';
		cell.classList.remove('x', 'o');
	});
}

// Main
cells.forEach(cell => { cell.addEventListener('click', handleCellClick); });

player1Div.textContent = player1;
player2Div.textContent = player2;
