/**
 * level9() modifies existing behavior by introducing a trace effect, which allows points to leave behind faded trails as they move.
 */
function level9() {
    let tracePoints = [];

    /**
     * drawPoints - Draws points on the canvas.
     * If the trace effect is enabled, it draws the points with a reduced opacity.
     * If the trace effect is disabled, it clears the canvas.
     */
    window.drawPoints = function() {
        const showTrace = document.getElementById("showTrace").checked;
        
        if (!showTrace) {
            
            ctx.clearRect(0, 0, canvas.width, canvas.height);
        }

        if (showTrace && tracePoints.length > 0) {
            for (let trace of tracePoints) {
                for (let point of trace) {
                    // Draw point with reduced opacity
                    ctx.beginPath();
                    ctx.arc(point.x, point.y, point.radius, 0, Math.PI * 2);
                    ctx.fillStyle = point.color + '40';
                    ctx.fill();
                    ctx.closePath();
                }
            }
        }

      
        for (let point of points) {
          
            ctx.beginPath();
            ctx.arc(point.x, point.y, point.radius, 0, Math.PI * 2);
            ctx.fillStyle = point.color;
            ctx.fill();
            ctx.closePath();

          
            ctx.beginPath();
            ctx.moveTo(point.x, point.y);
            ctx.lineTo(point.x + point.dx * 10, point.y + point.dy * 10);
            ctx.strokeStyle = point.color;
            ctx.lineWidth = 2;
            ctx.stroke();
            ctx.closePath();
        }

       
        if (showTrace && currentStep < NRSTEPS) {
            tracePoints.push(copyPoints(points));
        }
    };

    // Override the resetAnimation function to clear trace
    const originalResetAnimation = resetAnimation;
    window.resetAnimation = function() {
        tracePoints = []; // Clear trace points
        originalResetAnimation();
    };

    // Override the generatePoints function to clear trace
    const originalGeneratePoints = generatePoints;
    window.generatePoints = function() {
        tracePoints = []; // Clear trace points
        originalGeneratePoints();
    };
}

// I really struggled with this one, I don't know how to get it to work.
level9();
