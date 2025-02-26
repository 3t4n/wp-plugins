document.addEventListener('DOMContentLoaded', () => {
  let currentSlide = 0;
  const slides = document.querySelectorAll('.mySlides');

  const nextButton = document.querySelector('.custom-next');
  nextButton.addEventListener('click', nextSlide);
  nextButton.style.cursor = 'pointer';

  const prevButton = document.querySelector('.custom-prev');
  prevButton.addEventListener('click', prevSlide);
  prevButton.style.cursor = 'pointer';

  showSlide(currentSlide);

  function nextSlide() {
    currentSlide = (currentSlide + 1) % slides.length;
    showSlide(currentSlide);
  }

  function prevSlide() {
    currentSlide = (currentSlide - 1 + slides.length) % slides.length;
    showSlide(currentSlide);
  }

  function showSlide(index) {
    slides.forEach((slide, idx) => {
      if (idx === index) {
        slide.style.display = 'block';
      } else {
        slide.style.display = 'none';
      }
    });
  }
});