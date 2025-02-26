(function($) {
  $(document).ready(function() {
	  $(".bspb-type-field").change(ShowIfType);
    ShowIfType();

if( $(".bspb-transparent-field").is(':checked') ){
			$(".bspb-color-bg-row").hide();
		}else{
			$(".bspb-color-bg-row").show();
		}
$(".bspb-transparent-field").change(function(){
                //si la case a cocher est cochée
		if(this.checked){
			$(".bspb-color-bg-row").hide();
		}else{
			$(".bspb-color-bg-row").show();
		}
	});

if( $(".bspb-stripped-field").is(':checked') ){
			$(".bspb-animate-strip-row").show();
		}else{
			$(".bspb-animate-strip-row").hide();
		}
$(".bspb-stripped-field").change(function(){
                //si la case a cocher est cochée
		if(this.checked){
			$(".bspb-animate-strip-row").show();
		}else{
			$(".bspb-animate-strip-row").hide();
		}
	});

if( $(".bspb-animate-strip-field").is(':checked') ){
			$(".bspb-animate-strip-angle-row").show();
		}else{
			$(".bspb-animate-strip-angle-row").hide();
		}
$(".bspb-animate-strip-field").change(function(){
                //si la case a cocher est cochée
		if(this.checked){
			$(".bspb-animate-strip-angle-row").show();
		}else{
			$(".bspb-animate-strip-angle-row").hide();
		}
	});

if( $(".bspb-draw-on-scroll-field").is(':checked') ){
			$(".bspb-draw-on-scroll-id-row").show();
		}else{
			$(".bspb-draw-on-scroll-id-row").hide();
		}
$(".bspb-draw-on-scroll-field").change(function(){
                //si la case a cocher est cochée
		if(this.checked){
			$(".bspb-draw-on-scroll-id-row").show();
		}else{
			$(".bspb-draw-on-scroll-id-row").hide();
		}
	});



	    //$('.color-field').wpColorPicker();
    $( '.bspb-color-picker' ).wpColorPicker();
    });

   function ShowIfType() {
    if ($(".bspb-type-field").val() == "vertical") {
        $(".bspb-width-row").show();
        $(".bspb-height-row").hide();

    }
    else if ($(".bspb-type-field").val() == "horizontal") {
        $(".bspb-width-row").hide();
        $(".bspb-height-row").show();

    }

    else {
	    $(".bspb-height-row").hide();
        $(".bspb-width-row").hide();
    }
}

   function ShowIfTransparent() {
	   if(this.checked){
			$(".bspb-color-bg-field").hide();
		}else{
			$(".bspb-color-bg-field").show();
		}
		}


})(jQuery);


