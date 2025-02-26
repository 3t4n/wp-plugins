
$(document).ready(function () {
    $('.slides-slick').slick({
        infinite: true,
        autoplay: false,
        arrows: true,
        /*fade: true,*/
        cssEase: 'linear',
     /*   appendArrows: $(".arrows-bottom")*/
        //appendArrows: $(this).find('.arrows-bottom'),
})
    ;
});

$('.slides-slick').each(function (idx, item) {
    var carouselId = "carousel" + idx;
    console.log(carouselId);
    this.id = carouselId;
    $(this).slick({
        slide: "#" + carouselId +" .slide",
       appendArrows: "#" + carouselId + " .arrows-bottom",
       // appendArrows: $(this).find('.arrows-bottom'),

    });
});