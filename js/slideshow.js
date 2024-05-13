$(document).ready(function() {
    let slideIndex = 0;
    let slides = $(".slide");  // Define slides here so it's accessible throughout the script

    function showSlides() {
        slides.hide();  // Hide all slides
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}  // Loop back to the first slide
        slides.eq(slideIndex-1).fadeIn(600);  // Use jQuery fadeIn for smooth transition
        setTimeout(showSlides, 3000); // Change image every 3 seconds
    }

    // Event handlers for navigation buttons
    $(".prev").click(function() {
        plusSlides(-1);
    });

    $(".next").click(function() {
        plusSlides(1);
    });

    function plusSlides(n) {
        slideIndex += n;
        if (slideIndex > slides.length) {slideIndex = 1}
        if (slideIndex < 1) {slideIndex = slides.length}
        slides.stop(true, true); // Stop current animation and proceed immediately to the next
        slides.hide();  // Ensure all slides are hidden before showing the next
        slides.eq(slideIndex-1).fadeIn(600); // Show the correct slide
    }

    showSlides();  // Initialize the slideshow
});
