console.log('calling');
//ES5
// $.fn.stars = function() {
// 	console.log('first');
//     return $(this).each(function() {
//         var rating = $(this).data("rating");
//         var fullStar = new Array(Math.floor(rating + 1)).join('<i class="fas fa-star"></i>');
//         var halfStar = ((rating%1) !== 0) ? '<i class="fas fa-star-half-alt"></i>': '';
//         var noStar = new Array(Math.floor($(this).data("numStars") + 1 - rating)).join('<i class="far fa-star"></i>');
//         $(this).html(fullStar + halfStar + noStar);
//     });
// }

//ES6
$.fn.stars = function() {
	console.log('fdfdf');
console.log($('.star-ratings .tm-rating_rev').length);
    return $('.tm-rating_rev').each(function() {
        const rating = $(this).data("rating");
        console.log(rating);
        const numStars = $(this).data("numStars");
        const fullStar = '<i class="fas fa-star"></i>'.repeat(Math.floor(rating));
        const halfStar = (rating%1!== 0) ? '<i class="fas fa-star-half-alt"></i>': '';
        const noStar = '<i class="far fa-star"></i>'.repeat(Math.floor(numStars-rating));
        $(this).html(`${fullStar}${halfStar}${noStar}`);
        //$(this).html(fullStar + halfStar + noStar);
        //$('.tm-rating_rev').html('stars');
    });
}