var animateInterval;
function rotateImagesForward(){

    var CurrentTitle = jQuery("#background-slideshow .fls-slider-name.active");
    var NextTitle = CurrentTitle.next();

    if (NextTitle.length == 0) {
        NextTitle = jQuery("#background-slideshow .fls-slider-name:first");      
    }

    CurrentTitle.removeClass("active").addClass("previous_active");
    NextTitle.css({opacity:0.7}).addClass("active")
            .animate({opacity:1.0}, 700, function(){  
                CurrentTitle.removeClass("previous_active");
            });

    var CurrentPhoto = jQuery("#background-slideshow img.current");
    var NextPhoto = CurrentPhoto.next();
    if (NextPhoto.length == 0) {
        NextPhoto = jQuery("#background-slideshow img:first");      
    }
    CurrentPhoto.removeClass("current").addClass("previous");
    NextPhoto.css({opacity:0.7}).addClass("current")
            .animate({opacity:1.0}, 700, function(){  
                CurrentPhoto.removeClass("previous");
            });
}
animateInterval = setInterval(rotateImagesForward, 4000);