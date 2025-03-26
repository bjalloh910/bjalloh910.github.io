/**
 * This function generates multiple random points, each with:
 * A random position on the canvas.
 * A random movement direction (velocity vector).
 * A random color.
 * It provides interactive functionality, allowing the user to randomize the positions, velocities, and colors of the points by clicking a button (randomizeBtn).
 */
function initCanvas() {
    const canvas = document.getElementById("canvas1");
    const ctx = canvas.getContext("2d");

    /**
     * level4 - Generates multiple points with random properties and 
     * allows randomization of their position, velocity, and color.
     */
    function level4() {
        /**
         * getRandomColor - Generates a random hex color.
         * Uses six randomly selected hexadecimal digits (0-9, A-F).
         * @returns {string} A random hex color (e.g., "#A1B2C3").
         */
        function getRandomColor() {
            const letters = '0123456789ABCDEF';
            let color = '#';
            for (let i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        /**
         * initializePoints - Creates an array of points with random positions, velocities, and colors.
         * @returns {Array} An array of point objects.
         */
        function initializePoints() {
            const points = [];
            for (let i = 0; i < NRPTS; i++) { // NRPTS (Number of points) should be defined elsewhere in the script
                points.push({
                    x: Math.random() * (canvas.width - 40) + 20,
                    y: Math.random() * (canvas.height - 40) + 20,
                    radius: 5,
                    color: getRandomColor(),
                    dx: Math.random() * 60 - 30,  // Random velocity between -30 and 30
                    dy: Math.random() * 60 - 30
                });
            }
            return points;
        }

        let points = initializePoints(); // Generate initial points with random properties

        function drawPoints() {
            ctx.clearRect(0, 0, canvas.width, canvas.height); // Clear canvas before redrawing
            for (let point of points) {
                ctx.beginPath();
                ctx.arc(point.x, point.y, point.radius, 0, Math.PI * 2);
                ctx.fillStyle = point.color;
                ctx.fill();
                ctx.closePath();
            }
        }

        /**
         * drawVectors - Draws a movement vector (line) for each point.
         * Each vector starts at the point's current position and extends by `(dx, dy)`.
         */
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
         * randomizePoints - Randomly changes the position, velocity, and color of all points.
         * Ensures points stay within canvas bounds.
         */
        function randomizePoints() {
            for (let point of points) {
                // Random position within canvas bounds
                point.x = Math.random() * (canvas.width - 40) + 20;
                point.y = Math.random() * (canvas.height - 40) + 20;
                
                // Random velocity
                point.dx = Math.random() * 60 - 30;
                point.dy = Math.random() * 60 - 30;
                
                // New random color
                point.color = getRandomColor();
            }
            
            // Redraw everything
            drawPoints();
            drawVectors();
        }

        // Initial draw
        drawPoints();
        drawVectors();

        // Add button click handler
        const randomizeBtn = document.getElementById("randomizeBtn");
        randomizeBtn.addEventListener("click", randomizePoints);
    }

    level4();
}

initCanvas();
