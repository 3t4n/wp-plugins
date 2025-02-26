document.addEventListener('DOMContentLoaded', function () {
    /* Utility  */
    function getCookie(cname) {
        let name = cname + "=";
        let decodedCookie = decodeURIComponent(document.cookie);
        let ca = decodedCookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }
    (function () {
        const formElement = document.querySelector('.wpcf7-form');
        const particlesOpts = {
            type: getCookie('type') !== "" ? getCookie('type') : "circle",
            color: getCookie('color') !== "" ? getCookie('color') : "#000000",
            duration: getCookie('duration') !== "" ? getCookie('duration') : 500,
            size: getCookie('size') !== "" ? parseInt(getCookie('size')) : 3,
            style: getCookie('style') !== "" ? getCookie('style') : "fill",
            direction: getCookie('direction') !== "" ? getCookie('direction') : "left",
            oscillationCoefficient: getCookie('oscillationCoefficient') !== "" ? getCookie('oscillationCoefficient') : "20",
            particlesAmountCoefficient: 5,
            easing: 'easeInOutQuad',
            canvasPadding: 0,
            complete: () => {
                const formWrapper = document.querySelector('.particles-wrapper');
                formWrapper.classList.add("particles-wrapper-shrink");
            }
        }
        if (formElement) {
            const particles = new Particles(formElement, particlesOpts);
            const particlesWrapperContainer = document.querySelector('.particles');
            const formDimensions = formElement.getBoundingClientRect();

            let formVisible = true;
            formElement.addEventListener('wpcf7mailsent', () => {
                if (!particles.isAnimating() && formVisible) {
                    particles.disintegrate();
                    formVisible = !formVisible;
                    const output = document.querySelector('.wpcf7-response-output');
                    output.style.display = 'none';
                    var config = { childList: true };

                    const callback = function () {

                        let particlesOutput = document.createElement("div");
                        particlesOutput.classList.add('particles-output');
                        particlesOutput.style.width = formDimensions.width.toString() + "px";
                        particlesOutput.innerHTML = output.innerHTML;
                        particlesOutput.style.marginTop = ((formDimensions.height) / 2).toString() + 'px';

                        particlesWrapperContainer.style.height = formDimensions.height.toString() + "px";




                        document.querySelector('.particles').prepend(particlesOutput)
                    };
                    const myobserver = new MutationObserver(callback);
                    myobserver.observe(output, config);
                }
            });
        }
    })();
})