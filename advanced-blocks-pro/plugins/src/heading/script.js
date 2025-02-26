import Splide from "@splidejs/splide";
// Default theme

document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll("#slider-3").forEach((carousel) => {
        new Splide(carousel, {
            
        }).mount();
    });
});
