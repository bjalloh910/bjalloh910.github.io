   
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


