var player1 = ""; 
player1.


function updateStatusDisplay(message)
{
	if (statusDisplay)
		statusDisplay.textContent = message;
	else
		console.log(`Stato: ${message}`);
}