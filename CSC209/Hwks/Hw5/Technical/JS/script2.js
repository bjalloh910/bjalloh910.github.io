function initCanvas() {
    const canvas = document.getElementById("canvas1");
    const ctx = canvas.getContext("2d");

    function level2() {
        const points = [
            {
                x: canvas.width / 4,     // Left point
                y: canvas.height / 2,
                radius: 5,
                color: "pink",
                dx: 30,
                dy: -20
            },
            {
                x: canvas.width / 2,     // Center point
                y: canvas.height / 2,
                radius: 5,
                color: "blue",
                dx: -25,
                dy: 10
            },
            {
                x: 3 * canvas.width / 4, // Right point
                y: canvas.height / 2,
                radius: 5,
                color: "green",
                dx: 20,
                dy: 25
            }
        ];

        function drawPoints() {
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

        drawPoints();
        drawVectors();
    }

    level2();
}

initCanvas();