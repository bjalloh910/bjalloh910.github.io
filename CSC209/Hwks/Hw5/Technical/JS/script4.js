function initCanvas() {
    const canvas = document.getElementById("canvas1");
    const ctx = canvas.getContext("2d");

    function level4() {
        // Generate random color
        function getRandomColor() {
            const letters = '0123456789ABCDEF';
            let color = '#';
            for (let i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        // Initialize points array with random positions, velocities, and colors
        function initializePoints() {
            const points = [];
            for (let i = 0; i < NRPTS; i++) {
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

        let points = initializePoints();

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
