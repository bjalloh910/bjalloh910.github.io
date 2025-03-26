/**
 * This function animates multiple randomly generated points that move within the canvas while bouncing off the edges.
 * Each point has a random position, color, and velocity when first created.
 * The animation updates the points frame-by-frame, ensuring they stay within the canvas.
 * The user can randomize the points (resetting their positions, velocities, and colors) or start the animation using two separate buttons.
 */
function initCanvas() {
    const canvas = document.getElementById("canvas1");
    const ctx = canvas.getContext("2d");

    /**
     * level6 - Generates multiple random points with unique properties, 
     * animates them with bouncing behavior, and allows user interactions.
     */
    function level6() {
        function getRandomColor() {
            const letters = '0123456789ABCDEF';
            let color = '#';
            for (let i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        // Initialize points array with random positions, velocities, and colors
        /**
         * initializePoints - Creates an array of points with random positions, velocities, and colors.
         * @returns {Array} An array of point objects.
         */
        function initializePoints() {
            const points = [];
            for (let i = 0; i < NRPTS; i++) {
                points.push({
                    x: Math.random() * (canvas.width - 40) + 20,
                    y: Math.random() * (canvas.height - 40) + 20,
                    radius: 5,
                    color: getRandomColor(),
                    dx: Math.random() * 4 - 2,  // Random velocity between -2 and 2
                    dy: Math.random() * 4 - 2
                });
            }
            return points;
        }

        // Generate initial points with random properties
        let points = initializePoints();
        let currentStep = 0; // Initialize step counter
        let animationId = null; // Initialize animation ID

        /**
         * drawPoints - Draws the points on the canvas.
         * Clears the canvas, draws each point, and its associated vector.
         */
        function drawPoints() {
            // Draw the point (circle)
            ctx.clearRect(0, 0, canvas.width, canvas.height); 
            for (let point of points) {
                
                ctx.beginPath();
                ctx.arc(point.x, point.y, point.radius, 0, Math.PI * 2);
                ctx.fillStyle = point.color;
                ctx.fill();
                ctx.closePath();

                // Draw the movement vector (scaled for visibility)
                ctx.beginPath();
                ctx.moveTo(point.x, point.y);
                ctx.lineTo(point.x + point.dx * 10, point.y + point.dy * 10); // Scale vector for visibility
                ctx.strokeStyle = point.color;
                ctx.lineWidth = 2;
                ctx.stroke();
                ctx.closePath();
            }
        }

        /**
         * updatePositions - Updates each point's position based on its velocity and 
         * reverses direction when it reaches the canvas boundaries.
         */
        function updatePositions() {
            for (let point of points) {
                
                // Update position based on velocity
                point.x += point.dx;
                point.y += point.dy;

               
                // Bounce off vertical walls (left and right)
                if (point.x <= point.radius || point.x >= canvas.width - point.radius) {
                    point.dx = -point.dx; // Reverse direction
                }

                // Bounce off horizontal walls (top and bottom)
                if (point.y <= point.radius || point.y >= canvas.height - point.radius) {
                    point.dy = -point.dy; // Reverse direction
                }
            }
        }

        /**
         * animate - Handles the animation loop, updating positions and redrawing points.
         */
        function animate() {
            if (currentStep >= NRSTEPS) { // Stops animation after NRSTEPS
                cancelAnimationFrame(animationId);
                return;
            }

            updatePositions();
            drawPoints();
            currentStep++;
            animationId = requestAnimationFrame(animate);
        }

        function randomizePoints() {
            
            if (animationId) {
                cancelAnimationFrame(animationId);
            }
            currentStep = NRSTEPS;  // Prevent animation restart

            // Create new random points
            points = initializePoints();
            
            
            drawPoints();
        }

        /**
         * startAnimation - Resets the animation and starts it from the beginning.
         */
        function startAnimation() {
            // Reset animation step counter
            currentStep = 0;
            
            if (animationId) {
                cancelAnimationFrame(animationId);
            }

            animate();
        }

        drawPoints();

        const startBtn = document.getElementById("startBtn");
        startBtn.addEventListener("click", startAnimation);

        const randomizeBtn = document.getElementById("randomizeBtn");
        randomizeBtn.addEventListener("click", randomizePoints);
    }

    level6();
}

initCanvas();
