const player1 = localStorage.getItem('player1Name');
const player2 = localStorage.getItem('player2Name');
const winnerDiv = document.getElementById('winnerNameDisplay');
const loserDiv = document.getElementById('loserNameDisplay');
const winner = localStorage.getItem('winnerName');
const COUNTER_KEY = 'totalGames';

function updateHistory()
{
    const storedValue = localStorage.getItem(COUNTER_KEY);
    let currentCount = +(storedValue || 0);
    currentCount += 1;
    localStorage.setItem(COUNTER_KEY, currentCount.toString());
}

function displayWinner()
{
    if(winner === 'X')
    {
        winnerDiv.textContent = `THE WINNER IS ${player1}`;
        loserDiv.textContent = `THE LOSER IS ${player2}`;
    }
    else
    {
        winnerDiv.textContent = `THE WINNER IS ${player2}`;
        loserDiv.textContent = `THE LOSER IS ${player1}`;
    }
    updateHistory();
}

//Main
displayWinner();
