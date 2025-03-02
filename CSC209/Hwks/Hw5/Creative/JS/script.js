function initCanvas() {
    const canvas = document.getElementById("canvas1");
    const ctx = canvas.getContext("2d");
    let animationId = null; 

    function drawFish(ctx, x, y, direction, color, size = 20) {
        // Save the current context state
        ctx.save();
        
        // Move to the fish's position and rotate based on direction
        ctx.translate(x, y);
        ctx.rotate(Math.atan2(direction.dy, direction.dx));
        
        // Draw the fish
        ctx.beginPath();
        // Fish body (oval)
        ctx.ellipse(0, 0, size, size/2, 0, 0, 2 * Math.PI);
        ctx.fillStyle = color;
        ctx.fill();
        
        // Tail
        ctx.beginPath();
        ctx.moveTo(size-5, 0);
        ctx.lineTo(size+10, -size/2);
        ctx.lineTo(size+10, size/2);
        ctx.closePath();
        ctx.fillStyle = color;
        ctx.fill();
        
        // Eye
        ctx.beginPath();
        ctx.arc(-size/3, -size/6, size/8, 0, 2 * Math.PI);
        ctx.fillStyle = 'white';
        ctx.fill();
        ctx.beginPath();
        ctx.arc(-size/3, -size/6, size/16, 0, 2 * Math.PI);
        ctx.fillStyle = 'black';
        ctx.fill();
        
        // Need to restore the context state
        ctx.restore();
    }

    let points = [
        {x: 100, y: 100, dx: 2, dy: 1, color: 'pink'},
        {x: 200, y: 150, dx: -1.5, dy: 2, color: 'purple'},
        {x: 300, y: 50, dx: 1, dy: -1.5, color: 'rgb(225, 29, 209)'},
        {x: 400, y: 200, dx: -2, dy: -1, color: 'rgb(222, 121, 121)'},
        {x: 350, y: 100, dx: 1.5, dy: 1, color: 'rgb(201, 74, 5)'},
    ];

    function drawPoints() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        for (let point of points) {
            // Calculate direction for fish rotation
            const direction = {
                dx: point.dx,
                dy: point.dy
            };

            drawFish(ctx, point.x, point.y, direction, point.color);
        }
    } 

    function animate() {
        drawPoints();
        
        points.forEach(point => {
            point.x += point.dx;
            point.y += point.dy;
            
            // Bounce off walls
            if (point.x <= 0 || point.x >= canvas.width) point.dx = -point.dx;
            if (point.y <= 0 || point.y >= canvas.height) point.dy = -point.dy;
        });
        animationId = requestAnimationFrame(animate);
    }

    function startAnimation() {
        if (!animationId) { 
            animate();
        }
    }

    function stopAnimation() {
        if (animationId) {
            cancelAnimationFrame(animationId); //stops the animation
            animationId = null;
        }
    }

    function startEndBtns() {
        document.getElementById('startBtn').addEventListener('click', startAnimation);
        document.getElementById('stopBtn').addEventListener('click', stopAnimation);
        drawPoints();
    }

    startEndBtns();
}

// Call the main function when the page loads
initCanvas();