/**
 * Initializes the canvas and draws a point with a vector.
 * This function sets up a 2D drawing context and calls `level1()` to 
 * draw a point and an associated vector.
 */
function initCanvas() {
    // Get the canvas element from the DOM
    const canvas = document.getElementById("canvas1");
    const ctx = canvas.getContext("2d"); // Get the 2D rendering context for drawing on the canvas

    /**
     * level1 - Draws a single point at the center of the canvas with an attached vector.
     * The point has movement properties represented by `dx` and `dy`.
     */
    function level1() {
        // Define a point object with position, size, color, and movement vector
        const point = {
            x: canvas.width / 2,  // Center x position
            y: canvas.height / 2, // Center y position
            radius: 5,
            color: "pink",
            dx: 30,  // // Vector x-component (horizontal movement)
            dy: -20  // Vector y component (vertical movement)
        };

        /**
         * drawPoint - Draws the defined point on the canvas.
         * Uses the `arc` method to create a filled circle.
         */
        function drawPoint() {
            ctx.beginPath();
            ctx.arc(point.x, point.y, point.radius, 0, Math.PI * 2); // Draw a full circle
            ctx.fillStyle = point.color;
            ctx.fill();
            ctx.closePath();
        }

        /**
         * drawVector - Draws a line (vector) indicating direction and movement from the point.
         * The vector extends from the point's current position to `(x + dx, y + dy)`.
         */
        function drawVector() {
            ctx.beginPath();
            ctx.moveTo(point.x, point.y); // Start at the point's position
            ctx.lineTo(point.x + point.dx, point.y + point.dy); // Draw a line to the end of the vector
            ctx.strokeStyle = point.color;
            ctx.lineWidth = 2;
            ctx.stroke();
            ctx.closePath();
        }

        drawPoint();
        drawVector();
    }

    level1();
}

initCanvas();