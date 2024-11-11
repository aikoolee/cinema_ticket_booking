document.addEventListener('DOMContentLoaded', () => {
    console.log("Slideshow activated");

    let currentSlide = 0;
    const slides = document.querySelectorAll('#slideshow .slide');
    const totalSlides = slides.length;

    slides.forEach((slide, index) => {
        slide.classList.add('opacity-0');
        if (index === 0) slide.classList.add('opacity-100');
    });

    function showNextSlide() {
        slides[currentSlide].classList.remove('opacity-100');
        slides[currentSlide].classList.add('opacity-0');

        currentSlide = (currentSlide + 1) % totalSlides;

        slides[currentSlide].classList.remove('opacity-0');
        slides[currentSlide].classList.add('opacity-100');
    }

    // berganti setiap 3 detik
    setInterval(showNextSlide, 3000);
});
