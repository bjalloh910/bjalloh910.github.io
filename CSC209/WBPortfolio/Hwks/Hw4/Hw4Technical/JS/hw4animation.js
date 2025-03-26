// EVENT LISTENERS
// Syntax: element.addEventListener('eventType', functionName)
document.getElementById('moveRedBtn').addEventListener('click', moveRed);

function moveRed(){   
    // DOM MANIPULATION - Getting Elements
    let redSquare = document.getElementById("redSq");   
    let redPos = 0; // this is used to track the square's position
    let speed = parseInt(document.getElementById('redSpeed').value) // Get speed from dropdown

    // SETINTERVAL - Animation Loop
    // Syntax: setInterval(function, milliseconds)
    // Returns: interval ID (needed for stopping)
    let stepRedId = setInterval(stepRed, speed); //calls it every 10 miliseconds

    // CLOSURE - Inner Function
    // Allows access to variables from the parent function
    function stepRed() {
        if (redPos == 350) {
            clearInterval(stepRedId); // Stops the interval
        } else {
            redPos++; 
            redSquare.style.top = redPos + 'px'; 
            redSquare.style.left = redPos + 'px';
        }
    }
}


// OPPOSITE DIRECTION ANIMATION
document.getElementById('moveBlueBtn').addEventListener('click', moveBlue);

function moveBlue(){
    let blueBox = document.getElementById('blueSq');
    let bluePos = 350; // Starts at end position
    let speed = parseInt(document.getElementById('blueSpeed').value)
    let stepBlueId = setInterval(stepBlue, speed);

    function stepBlue(){
        if(bluePos == 0){
            clearInterval(stepBlueId);
        } else {
            bluePos --; // Decrement for opposite direction
            blueBox.style.top = bluePos + 'px'; 
            blueBox.style.left = bluePos + 'px';
        }
    }
}

// animation for bouncing effect
document.getElementById('startButton').addEventListener('click', startAnimation);

function startAnimation(){
    // QUERYSELECTORALL
    // Returns NodeList of all elements matching selector
    const squares = document.querySelectorAll('.square'); // this returns a nodelist of the squares
    console.log(squares)

    //store the pos and directions of each square arrays
    const positions = [];
    const directions = [];

    // FOREACH WITH INDEX
    // Iterate through NodeList with access to index
    squares.forEach((square, index) => {
        let startPos = index * 60;
        positions.push({x : startPos, y: startPos}); // Object literal
        directions.push({ dx: 1, dy: 1 });

        square.style.left = startPos + 'px';
        square.style.top = startPos + 'px';

        square.style.backgroundColor = getRandomColor();
    })

    let intervalId = setInterval(moveSquares, 10);

    function moveSquares(){
        // Update positions using vectors
        squares.forEach((square, index) => {
            positions[index].x += directions[index].dx;
            positions[index].y += directions[index].dy;

            square.style.left = positions[index].x + 'px';
            square.style.top = positions[index].y + 'px';

            // COLLISION DETECTION AND BOUNCE
            // Check boundaries (400px container, 50px square size)
            // if a square goes out of bounds then reverse(bounce back)
            if(positions[index].x + 50 >= 400 || positions[index].x <= 0) {
                directions[index].dx *= -1; // reverses the x direction
            }
            if(positions[index].y + 50 >= 400 || positions[index].y <= 0){
                directions[index].dy *= -1; // reverses the y direction
            }
        })
    }
}


function getRandomColor() {
    // Convert number to hex string
    return '#' + Math.floor(Math.random()*16777215).toString(16);
}


