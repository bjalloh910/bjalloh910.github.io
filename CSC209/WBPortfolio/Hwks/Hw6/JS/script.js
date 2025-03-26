/* This function will create the grid structure
It takes in a size and fills the 2d array with 0s
*/
/**
 * createEmptyGrid - Creates a 2D grid filled with 0s (dead cells).
 * @param {number} size - The number of rows and columns in the grid.
 * @returns {Array} - A 2D array representing the grid.
 */
function createEmptyGrid(size){ 
    return new Array(size).fill(null).map(() => new Array(size).fill(0));
}

/**
 * initGame - Initializes the game by setting up the grid, event listeners, and interval.
 * @returns {void}
 */
function initGame(){
    const gridContainer = document.getElementById('grid');
    const gridSizeInput = document.getElementById('gridSizeSlider');

    let interval = null; // Stores interval ID for automatic simulation
    
    // Reads the slider value and uses that create the grid size
    let gridSize = parseInt(gridSizeInput.value);
    let grid = createEmptyGrid(gridSize); // creates 2d array for the grid

    /**
     * createGrid - Dynamically generates the grid structure in the DOM.
     */
    function createGrid(){
        gridContainer.innerHTML = ''; // Clears any existing cells
        gridContainer.style.gridTemplateColumns = `repeat(${gridSize}, 1fr)`; // css grid to dynamically create the grid
        gridContainer.style.gridTemplateRows = `repeat(${gridSize}, 1fr)`;
    
    
        for(let row=0; row<gridSize; row++){
            for(let col=0; col<gridSize; col++){
                const cell = document.createElement("div");
                cell.classList.add("cell");
                cell.dataset.row = row;
                cell.dataset.col = col;

                /**
                 * Toggles a cell between "alive" (1) and "dead" (0) when clicked.
                 */ 
                // when a user clicks on a cell it will toggle the cell between alive and dead
                cell.addEventListener("click", () => {
                    grid[row][col] = grid[row][col] === 1 ? 0 : 1;
                    cell.classList.toggle("alive", grid[row][col] === 1);
                });
    
                if(grid[row][col] === 1){
                    cell.classList.add("alive"); // so that the alive cell looks different from the dead cell
                }
                gridContainer.appendChild(cell);
            }
        }
    }
    // calls next generation and updates the grid to show the next generation
    /**
     * nextStep - Advances the simulation by one generation and updates the grid.
     */
    function nextStep() {
        grid = getNextGeneration(grid); // gets the next generation of the grid
        createGrid();
    }

    /**
     * startGame - Starts the automatic simulation, step by step.
     */
    function startGame(){ // starts the automatic simulation, step by step
        if(!interval){
            interval = setInterval(() => { //setInterval repeatedly calls the nextStep function every 300ms to make sure the game keeps going
                nextStep();
            }, 300)
        }
    }

    /**
     * stopGame - Pauses the automatic simulation.
     */
    function stopGame(){
        clearInterval(interval); // pause the interval
        interval = null; // setting it to null so we can restart the game
    }

    /**
     * resetGame - Resets the game to the initial state.
     */
    function resetGame(){
        stopGame(); // Ensures simulation is stopped
        grid = createEmptyGrid(gridSize); // resets the grid to an empty state
        createGrid();
    }

    /**
     * updateGridSize - Updates the grid size based on the slider value.
     */
    gridSizeSlider.addEventListener("input", () => {
        gridSizeValue.textContent = gridSizeSlider.value; // makes the slider value display on the screen so that the user can see the current grid size
    });

    // changes(updates after selectio picked) the input based on the slider value the user puts 
    gridSizeInput.addEventListener("change", () => { 
        gridSize = parseInt(gridSizeInput.value);
        grid = createEmptyGrid(gridSize);
        createGrid();
    });

    document.getElementById("startButton").addEventListener("click",startGame);
    document.getElementById("stopButton").addEventListener("click", stopGame);
    document.getElementById("resetButton").addEventListener("click", resetGame);
    document.getElementById("nextButton").addEventListener("click", nextStep);

    createGrid();
}

initGame();


// implementing the game logic 

function countAliveNeighbors(grid, row, col){
    let count = 0; 

    // we need to check all 8 directions around the cell
    const directions = [
        [-1, -1], [-1, 0], [-1,1],
        [0,-1],            [0,1],
        [1, -1],  [1, 0],  [1, 1]
    ];

    for(let [dx, dy] of directions){
        // shifts the current cell to the direction we are checking
        const newRow = row + dx; 
        const newCol = col + dy;

        // check if the new row and col are within the bounds of the grid
        if( newRow >= 0 && newRow < grid.length && newCol >= 0 && newCol < grid[0].length){
            count += grid[newRow][newCol]; // adds 1 if the neighbor is alive and skips if dead
        }
    }
    return count;
}

// function to create the next generation of the grid and logic for the rules of the game
function getNextGeneration(grid){
    const gridSize = grid.length;
    let newGrid = createEmptyGrid(gridSize);

    for(let row=0; row<gridSize; row++){
        for(let col=0; col<gridSize; col++){ 
            let alive = grid[row][col] === 1; // checks if the current cell is alive
            let neighbors = countAliveNeighbors(grid, row, col); // counts the number of alive neighbors of the current cell

            if(alive){ // the condiiton for survival 
                newGrid[row][col] = (neighbors === 2 || neighbors === 3) ? 1 : 0; // cell only stays alive if it has 2 or 3 neighbors otherwise it dies
            } else { // the condition to reproduce 
                newGrid[row][col] = neighbors === 3 ? 1 : 0; // cell only reproduces if it has 3 neighbors
            }
        }
    }
    return newGrid;
}


