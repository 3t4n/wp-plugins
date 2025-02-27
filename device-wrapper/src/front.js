/**
 * Front JS
 */

window.addEventListener('DOMContentLoaded', (event) => {

    Array.prototype.forEach.call(
        document.querySelectorAll(`
        .device-wrapper .device-wrapper__inner__scroll
        `),
        el => {
            new SimpleBar(el, {
                classNames: {
                    //contentWrapper: 'dragscroll',
                }
            });
            el.querySelector(".simplebar-content-wrapper").classList.add("dragscroll");
            dragscroll.reset();
        }
    );

    const videos = document.querySelectorAll('.device-wrapper .device-wrapper__inner video');
    const autoplayVideos = document.querySelectorAll('.device-wrapper .device-wrapper__inner video.is-autoplay-on-view');

    [].forEach.call(videos, function(video) {
        video.addEventListener("play", function(e){
            video.classList.add("is-playing");
        })
        video.addEventListener("pause", function(e){
            video.classList.remove("is-playing");
        })
        video.addEventListener("click", function(e){
            // TBD: fix bug on Firefox with controls enabled (no click event fired and link doesnt open)
            if (video.hasAttribute("controls")) {
                e.stopPropagation();
            }
            if (video.classList.contains("has-link") || video.hasAttribute("controls")) {
                console.log(e.target)
            } else {
                if (video.paused) {
                    video.play();
                } else {
                    video.pause();
                }
            }
        })
    })

    if ("IntersectionObserver" in window) {

        let autoplayVideoObserver = new IntersectionObserver(function(entries) {
            entries.forEach(function(video) {
                if (video.isIntersecting) {
                    video.target.setAttribute("muted", "");
                    video.target.setAttribute("autoplay", "");
                    video.target.muted = true; // without this line it's not working although I have "muted" in HTML
                    video.target.play();
                    //video.target.classList.remove("is-autoplay-on-view");
                    video.target.classList.add("is-playing");
                    autoplayVideoObserver.unobserve(video.target);
                }
            });
        });
     
        autoplayVideos.forEach(function(autoplayVideo) {
            autoplayVideoObserver.observe(autoplayVideo);
        });

    }
    
});

