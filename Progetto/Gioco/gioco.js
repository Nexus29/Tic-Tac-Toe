let player1 = document.getElementById("player1");
let player2 = document.getElementById("player2");
let btn = document.getElementById("btn");

let grid = document.querySelector(".grid");
let container = document.getElementById("container");
var turn = 1;
var symbols = "X";

// var gridTris = [
//     [0, 0, 0],
//     [0, 0, 0],
//     [0, 0, 0]
// ];

function startGame(container, turn, symbols){
    for(var i = 0; i < container.length; i++)
    {
        container[i].textContent = "";
    }

    turn = 1;
    symbols = "X";
    // if(turn % 2 == 1)
    // {
    //     symbols = "X";
    //     turn++;
    // }
    // else
    // {
    //     symbols = "O";
    //     turn++;
    // }
}
const terzoDiv = document.querySelector('#container > .grid:nth-child(3)');
// terzoDiv.addEventListener(onclick , (turn , symbols)=>{
    
//         if(container.textContent == "")
//             container.textContent = symbols;
//         nextTurn(turn, symbols);
//     }
// );

function nextMove(turn, symbols){
    if(container.textContent == "")
            container.textContent = symbols;
       // nextTurn(turn, symbols);
}

startGame(container, turn, symbols);
btn.onclick(nextMove(turn, symbols));
// use the table with image
