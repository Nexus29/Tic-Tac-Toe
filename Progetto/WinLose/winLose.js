
document.addEventListener("DOMContentLoaded", () => { // fa runnare il codice js dopo che ha caricato tutta la pagina

    localStorage.setItem("vincitore", "Muharem"); // 'vincitore' è il nome del setitem(aggiungin oggetto) invece 'muharem' è il valore di setitem
    localStorage.setItem("perdente", "Bianca"); // 'vincitore' è il nome del setitem(aggiungin oggetto) invece 'bianca' è il valore di setitem


    document.getElementById("perdente").textContent = localStorage.getItem("perdente"); // 'perdente' è il nome del getitem(ottenere oggetto) invece 'bianca' è il valore di getitem
    document.getElementById("vincitore").textContent = localStorage.getItem("vincitore"); // 'vincitore' è il nome del getitem(ottenere oggetto) invece 'muharem' è il valore di getitem

    if (localStorage.getItem("pareggio") === "1"){
        document.querySelector(".contenitore2").style.display = "none"; // questo mi serve per nascondere il div contenitore2 se c'è pareggio

    }

});