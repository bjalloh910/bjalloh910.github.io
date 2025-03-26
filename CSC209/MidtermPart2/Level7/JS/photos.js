let currentSlide = 0;
const slides = document.getElementsByClassName("slide");

// Show initial slide
showSlide(currentSlide);

function showSlide(n) {

    // Hide all slides
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    // Show the current slide
    slides[n].style.display = "block";
    }

    function changeSlide(direction) {
            
    currentSlide += direction;

    // This will loop back to first slide if at end
    if (currentSlide >= slides.length) {
        currentSlide = 0;
    }
    // Loop to last slide if going backwards from first
    if (currentSlide < 0) {
        currentSlide = slides.length - 1;
    }
    showSlide(currentSlide);
}