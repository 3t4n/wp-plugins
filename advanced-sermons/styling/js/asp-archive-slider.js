
const aspSliderWrappers = document.querySelectorAll('.asp-sermon-slider');


if (aspSliderWrappers.length > 0) {
    aspSliderWrappers.forEach(function (aspSliderWrapper) {
        const aspSliderWrapperWidth = aspSliderWrapper.offsetWidth;
        let aspCustomControls = aspSliderWrapper.querySelector('.asp-slider-controls');
        let aspColumns = aspSliderWrapper.getAttribute('data-asp-slider-columns');
        const sliderContainer = aspSliderWrapper.querySelector('.sermon-archive-holder-slider');

        if (parseInt(aspColumns) > 4) {
            aspColumns = 4;
        }

        let responsive = {};

        if (aspSliderWrapperWidth < 650 && parseInt(aspColumns) !== 1) {
            responsive = {
                0: {
                    items: 1,
                },
                758: {
                    items: 2,
                }
            }
        } else if (parseInt(aspColumns) === 1) {
            responsive = {
                0: {
                    items: parseInt(aspColumns),
                }
            }
        } else if (parseInt(aspColumns) === 2) {
            responsive = {
                0: {
                    items: 1,
                },
                600: {
                    items: parseInt(aspColumns),
                }
            }
        } else if (parseInt(aspColumns) === 3) {
            responsive = {
                0: {
                    items: 1,
                },
                600: {
                    items: 2,
                },
                960: {
                    items: parseInt(aspColumns),
                }
            }
        } else if (parseInt(aspColumns) === 4) {
            responsive = {
                0: {
                    items: 1,
                },
                600: {
                    items: 2,
                },
                1092: {
                    items: parseInt(aspColumns),
                }
            }
        }

        let slider = aspTns({
            container: sliderContainer,
            slideBy: 1,
            autoplay: false,
            mouseDrag: true,
            controls: true,
            controlsContainer: aspCustomControls,
            loop: false,
            nav: false,
            items: 3,
            responsive: responsive,
            gutter: 20,
        });
    });
}


// function debounce(func, timeout = 300) {
//     let timer;
//     return (...args) => {
//         clearTimeout(timer);
//         timer = setTimeout(() => {
//             func.apply(this, args);
//         }, timeout);
//     };
// }
//
// const resizeSlider = debounce(() => {
//     aspSliderWrapper = document.querySelector('.asp-sermon-slider');
//     aspCustomControls = aspSliderWrapper.querySelector('#customize-controls');
//
//     setTimeout(function () {
//         if (aspSliderWrapper.offsetWidth < 650) {
//             slider.destroy();
//             setTimeout(function () {
//                 slider = aspTns({
//                     container: '.sermon-archive-holder',
//                     slideBy: 1,
//                     autoplay: false,
//                     mouseDrag: true,
//                     controls: true,
//                     controlsContainer: aspCustomControls,
//                     loop: false,
//                     nav: false,
//                     items: 2,
//                     gutter: 20,
//                 });
//             }, 1000);
//         }
//     }, 1000);
// })


// window.addEventListener('resize', resizeSlider);

