import Splide from "@splidejs/splide";
// import "../../helper/splide/splide.min.css";
// Default theme

document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll("#splide-8").forEach((carousel) => {
        new Splide(carousel, {

        }).mount();
    }
    );
});
document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll("#splide2").forEach((carousel) => {
        console.log("slider", carousel)
        new Splide(carousel, {
            breakpoints: {
                640: {
                    perPage: 1,
                },
            }
        }).mount();
    }
    );
});


