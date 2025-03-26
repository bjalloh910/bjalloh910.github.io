/**
 * Level 3 - Draws multiple points with vectors.
 * This level extends the basic point drawing from level 2.
 * It introduces an array of points, each with its own position,
 * movement vector, and color.
 * 
 * It introduces interactivity by allowing the user to randomize the position of the points when they click a button (randomizeBtn).
 */
function initCanvas() {
    const canvas = document.getElementById("canvas1");
    const ctx = canvas.getContext("2d");

    /**
     * level3 - Draws multiple points with vectors and allows randomization on button click.
     */
    function level3() {
        let points = [
            {
                x: canvas.width / 4,
                y: canvas.height / 2,
                radius: 5,
                color: "pink",
                dx: 30,
                dy: -20
            },
            {
                x: canvas.width / 2,
                y: canvas.height / 2,
                radius: 5,
                color: "blue",
                dx: -25,
                dy: 10
            },
            {
                x: 3 * canvas.width / 4,
                y: canvas.height / 2,
                radius: 5,
                color: "green",
                dx: 20,
                dy: 25
            }
        ];

        function drawPoints() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            for (let point of points) {
                ctx.beginPath();
                ctx.arc(point.x, point.y, point.radius, 0, Math.PI * 2);
                ctx.fillStyle = point.color;
                ctx.fill();
                ctx.closePath();
            }
        }

        function drawVectors() {
            for (let point of points) {
                ctx.beginPath();
                ctx.moveTo(point.x, point.y);
                ctx.lineTo(point.x + point.dx, point.y + point.dy);
                ctx.strokeStyle = point.color;
                ctx.lineWidth = 2;
                ctx.stroke();
                ctx.closePath();
            }
        }

        /**
         * randomizePoints - Randomly repositions each point within the canvas.
         * Ensures that points do not get too close to the edges (adds padding of 20px).
         * Redraws the points and vectors after updating their positions.
         */
        function randomizePoints() {
            for (let point of points) {
                point.x = Math.random() * (canvas.width - 40) + 20;
                point.y = Math.random() * (canvas.height - 40) + 20;
            }
            
            drawPoints();
            drawVectors();
        }

        drawPoints();
        drawVectors();

        const randomizeBtn = document.getElementById("randomizeBtn");
        randomizeBtn.addEventListener("click", randomizePoints);
    }

    level3();
}

initCanvas();
