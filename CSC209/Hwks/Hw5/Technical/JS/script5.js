function initCanvas() {
    const canvas = document.getElementById("canvas1");
    const ctx = canvas.getContext("2d");

    function level5() {
        // Initialize the three points (similar to level 3)
        let points = [
            {
                x: canvas.width / 4,
                y: canvas.height / 2,
                radius: 5,
                color: "pink",
                dx: 2,  // Reduced velocity for smoother animation
                dy: -1.5
            },
            {
                x: canvas.width / 2,
                y: canvas.height / 2,
                radius: 5,
                color: "blue",
                dx: -2,
                dy: 1
            },
            {
                x: 3 * canvas.width / 4,
                y: canvas.height / 2,
                radius: 5,
                color: "green",
                dx: 1.5,
                dy: -2
            }
        ];

        let currentStep = 0;
        let animationId = null;

        function drawPoints() {
            ctx.clearRect(0, 0, canvas.width, canvas.height); // Clear canvas
            for (let point of points) {
                // Draw point
                ctx.beginPath();
                ctx.arc(point.x, point.y, point.radius, 0, Math.PI * 2);
                ctx.fillStyle = point.color;
                ctx.fill();
                ctx.closePath();

                // Draw vector
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
                // Update position based on velocity
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

        function startAnimation() {
            currentStep = 0; // start at 0 to reset the animaton 
            
            // next declare the points 
            points = [
                {
                    x: canvas.width / 4,
                    y: canvas.height / 2,
                    radius: 5,
                    color: "pink",
                    dx: 2,
                    dy: -1.5
                },
                {
                    x: canvas.width / 2,
                    y: canvas.height / 2,
                    radius: 5,
                    color: "blue",
                    dx: -2,
                    dy: 1
                },
                {
                    x: 3 * canvas.width / 4,
                    y: canvas.height / 2,
                    radius: 5,
                    color: "green",
                    dx: 1.5,
                    dy: -2
                }
            ];

            // Cancel any animation currently running
            if (animationId) {
                cancelAnimationFrame(animationId);
            }

            // Start the new animation
            animate();
        }

        drawPoints();

        const startBtn = document.getElementById("startBtn");
        startBtn.addEventListener("click", startAnimation);
    }

    level5();
}

initCanvas();
