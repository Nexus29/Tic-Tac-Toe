function updateStatusDisplay(message)
{
	if (statusDisplay)
		statusDisplay.textContent = message;
	else
		console.log(`Stato: ${message}`);
}