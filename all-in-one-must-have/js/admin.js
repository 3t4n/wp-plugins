(function($) {
	$(document).ready(function () {
		$(".aiomh-ccb").click(function(){
			var change = $(this).children('.aiomh-cb');
			var show_child = $(this).parent().children('.aiomh-hcb');
			if(change.val()=='0')
			{
				change.attr('value',1).removeClass('aiomh-cb-off').addClass('aiomh-cb-on');
				if(show_child){
					show_child.show('slow');
					show_child.children('input').removeAttr('disabled');
					show_child.children('div').children('input').removeAttr('disabled');
				}
			}
			else
			{
				change.attr('value',0).removeClass('aiomh-cb-on').addClass('aiomh-cb-off');
				if(show_child){
					show_child.hide('slow');
					show_child.children('input').attr('disabled','disabled');
					show_child.children('div').children('input').attr('disabled','disabled');
				}
			}
		});

		$("#aiomh_jpeg_quality_svalue").change(function(){
			$("#aiomh_jpeg_quality_value").val($(this).val());
		});
		$("#aiomh_jpeg_quality_value").change(function(){
			$("#aiomh_jpeg_quality_svalue").val($(this).val());
		});

		$(".show-change-prefix").click(function(){
			$('body').animate({
		        scrollTop: 0
		    }, 800);
			$("#aiomh-form-prefix").show('slow');
		});

		$("#aiomh_change_lang").change(function(){
			$('#submit').click();
		});

	    $('input[type="checkbox"]').change(function() {
	        if($(this).is(":checked")) {
	            $(this).val(1);
	        }
	        else{
	        	$(this).val(0);
	        }
	    });



	    $('.counttime input').change(function() {
	        var ctdate = $('.ctdate').val();
	        var cthours = $('.cthours').val();
	        var ctminutes = $('.ctminutes').val();
	        if(ctdate==0 && cthours==0 && ctminutes==0)
	        {
	        	//$('.ctreset').val(1);
	        	//$('.ctreset').attr('checked','checked');
	        	$('.ctvalue').val(0);
	        }
	        else
	        {
	        	//$('.ctreset').removeAttr('checked');
	        	//$('.ctreset').val(0);
	        	$('.ctvalue').val( (ctminutes*60) + (cthours*3600) + (ctdate*86400) );
	        }
	    });
	    // $('.ctreset').change(function() {
	    // 	if($(this).val()==1)
	    // 	{
	    // 		$('.ctdate').val(0);
	    // 		$('.cthours').val(0);
	    // 		$('.ctminutes').val(0);
	    // 	}
	    // });


	});
})(jQuery);