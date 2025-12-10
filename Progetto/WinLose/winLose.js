const player1 = localStorage.getItem('player1Name');
const player2 = localStorage.getItem('player2Name');
const winnerDiv = document.getElementById('winnerNameDisplay');
const loserDiv = document.getElementById('loserNameDisplay');
const winner = localStorage.getItem('winnerName');

function displayWinner()
{
    if(winner === 'X')
    {
        winnerDiv.textContent = player1;
        loserDiv.textContent = player2;
    }
    else
    {
        winnerDiv.textContent = player2;
        loserDiv.textContent = player1;
    }

}

//Main
displayWinner();
