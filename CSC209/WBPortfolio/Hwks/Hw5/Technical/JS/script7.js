/**
 * This function allows users to generate a specified number of random points that move within the canvas and bounce off walls.
 * The user inputs the number of points, and the script creates them dynamically.
 * The animation updates frame-by-frame, ensuring the points bounce within the canvas.
 * Two interactive buttons allow the user to:
 * Generate new points (generatePoints())
 * Start the animation (startAnimation()).
 */
function initCanvas() {
    const canvas = document.getElementById("canvas1");
    const ctx = canvas.getContext("2d");

    /**
     * level7 - Generates a user-defined number of points with random properties,
     * animates them with bouncing behavior, and allows user interactions.
     */
    function level7() {
        let points = []; // Array to hold the generated points
        let currentStep = 0; //tracks the current step of the animation
        let animationId = null; //stores the requestAnimationFrame ID

        function getRandomColor() {
            const letters = '0123456789ABCDEF';
            let color = '#';
            for (let i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        function initializePoints(numPoints) {
            const points = [];
            for (let i = 0; i < numPoints; i++) {
                points.push({
                    x: Math.random() * (canvas.width - 40) + 20,
                    y: Math.random() * (canvas.height - 40) + 20,
                    radius: 5,
                    color: getRandomColor(),
                    dx: Math.random() * 4 - 2, 
                    dy: Math.random() * 4 - 2
                });
            }
            return points;
        }

        function drawPoints() {
            ctx.clearRect(0, 0, canvas.width, canvas.height); 
            for (let point of points) {
                
                ctx.beginPath();
                ctx.arc(point.x, point.y, point.radius, 0, Math.PI * 2);
                ctx.fillStyle = point.color;
                ctx.fill();
                ctx.closePath();

                ctx.beginPath();
                ctx.moveTo(point.x, point.y);
                ctx.lineTo(point.x + point.dx * 10, point.y + point.dy * 10); // Scale vector for visibility
                ctx.strokeStyle = point.color;
                ctx.lineWidth = 2;
                ctx.stroke();
                ctx.closePath();
            }
        }

        function updatePositions() {
            for (let point of points) {
                point.x += point.dx;
                point.y += point.dy;

                // Bounce off walls
                if (point.x <= point.radius || point.x >= canvas.width - point.radius) {
                    point.dx = -point.dx;
                }
                if (point.y <= point.radius || point.y >= canvas.height - point.radius) {
                    point.dy = -point.dy;
                }
            }
        }

        function animate() {
            if (currentStep >= NRSTEPS) {
                cancelAnimationFrame(animationId);
                return;
            }

            updatePositions();
            drawPoints();
            currentStep++;
            animationId = requestAnimationFrame(animate);
        }

        function generatePoints() {
            if (animationId) {
                cancelAnimationFrame(animationId);
            }
            currentStep = NRSTEPS;  // Prevent animation restart

            // Get the user input for the number of points
            const numPointsInput = document.getElementById("nrPoints");
            const numPoints = parseInt(numPointsInput.value);

            // Validate input (must be at least 1)
            if (isNaN(numPoints) || numPoints < 1) {
                alert("Please enter a valid number of points (minimum 1)");
                return;
            }

            // Generate new points based on user input
            points = initializePoints(numPoints);
            
            drawPoints();
        }

        /**
         * startAnimation - Starts the animation after points are generated.
         * Ensures points exist before starting the animation.
         */
        function startAnimation() {
            if (points.length === 0) {
                alert("Please generate points first!");
                return;
            }

            currentStep = 0;
            
            if (animationId) {
                cancelAnimationFrame(animationId);
            }

            animate();
        }

        const generateBtn = document.getElementById("generateBtn");
        generateBtn.addEventListener("click", generatePoints);

        const startBtn = document.getElementById("startBtn");
        startBtn.addEventListener("click", startAnimation);

        generatePoints();
    }

    level7();
}

initCanvas();
