const player1 = localStorage.getItem('player1Name');
const player2 = localStorage.getItem('player2Name');
const winner = localStorage.getItem('winnerName');
const winnerDiv = document.getElementById('winnerNameDisplay');
const loserDiv = document.getElementById('loserNameDisplay');
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
        winnerDiv.textContent = `The winner is ${player1}!`;
        loserDiv.textContent = `The loser is ${player2}!`;
    }
    else
    {
        winnerDiv.textContent = `The winner is ${player2}!`;
        loserDiv.textContent = `The loser is ${player1}!`;
    }
    updateHistory();
}

//Main
displayWinner();