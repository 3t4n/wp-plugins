(function ($) {

$(document).ready(function(){

    //<![CDATA[
	$('.link-present').click(function(){
        var this_href = $(this).attr('data-link-url');
        var this_target = $(this).attr('data-link-target');

		var target = "_self";

		if (this_target == 'true' ){
			target = "_blank";
		}

        if (this_href != null){

			window.open(
			    this_href,
			    target
			);

		}
    });

}
);
})(jQuery);