document.getElementById('moveRedBtn').addEventListener('click', moveRed);

function moveRed(){   
    let redSquare = document.getElementById("redSq");   
    let redPos = 0; // this is used to track the square's position
    let speed = parseInt(document.getElementById('redSpeed').value) // Get speed from dropdown
    let stepRedId = setInterval(stepRed, speed); //calls it every 10 miliseconds

    function stepRed() {
        if (redPos == 350) {
            clearInterval(stepRedId);
        } else {
            redPos++; 
            redSquare.style.top = redPos + 'px'; 
            redSquare.style.left = redPos + 'px';
        }
    }
}

document.getElementById('moveBlueBtn').addEventListener('click', moveBlue);

function moveBlue(){
    let blueBox = document.getElementById('blueSq');
    let bluePos = 350;
    let speed = parseInt(document.getElementById('blueSpeed').value)
    let stepBlueId = setInterval(stepBlue, speed);

    function stepBlue(){
        if(bluePos == 0){
            clearInterval(stepBlueId);
        } else {
            bluePos --;
            blueBox.style.top = bluePos + 'px'; 
            blueBox.style.left = bluePos + 'px';
        }
    }
}

// animation for bouncing effect

document.getElementById('startButton').addEventListener('click', startAnimation);

function startAnimation(){

    const squares = document.querySelectorAll('.square'); // this returns a nodelist of the squares
    console.log(squares)

    //store the pos and directions of each square arrays
    const positions = [];
    const directions = [];

    squares.forEach((square, index) => {
        let startPos = index * 60;
        positions.push({x : startPos, y: startPos});
        directions.push({ dx: 1, dy: 1 });

        square.style.left = startPos + 'px';
        square.style.top = startPos + 'px';

        square.style.backgroundColor = getRandomColor();
    })

    let intervalId = setInterval(moveSquares, 10);

    function moveSquares(){
        squares.forEach((square, index) => {
            positions[index].x += directions[index].dx;
            positions[index].y += directions[index].dy;

            square.style.left = positions[index].x + 'px';
            square.style.top = positions[index].y + 'px';

            // if a square goes out of bounds then reverse(bounce back)
            if(positions[index].x + 50 >= 400 || positions[index].x <= 0) {
                directions[index].dx *= -1;
            }
            if(positions[index].y + 50 >= 400 || positions[index].y <= 0){
                directions[index].dy *= -1;
            }
        })
    }
}


function getRandomColor() {
    return '#' + Math.floor(Math.random()*16777215).toString(16);
}


