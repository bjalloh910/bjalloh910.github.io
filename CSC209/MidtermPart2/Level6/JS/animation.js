
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

        square.style.borderRadius = '50%';
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


