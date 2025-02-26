import Splide from "@splidejs/splide";
// Default theme

document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll("#slider-9").forEach((carousel) => {
        new Splide(carousel, {
            
        }).mount();
    });
});
