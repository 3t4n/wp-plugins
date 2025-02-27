(function( $ ) {
	'use strict';

	$(".webs-custom-schema").on('change click paste', function(){
		var data_id = $(this).data('id');
		try
		{
		   var json = JSON.parse($(this).val().replace(/\r?\n|\r/g, ''));
			 $("#webs-custom-schema-" + data_id + ", #webs-custom-schema-errors-"+ data_id).addClass('green');
			 $("#webs-custom-schema-" + data_id + ", #webs-custom-schema-errors-"+ data_id).removeClass('red');
			 $("#webs-custom-schema-errors-" + data_id).text("correct");
		}
		catch(e)
		{
			 $("#webs-custom-schema-errors-"+ data_id).text(e);
		   $("#webs-custom-schema-" + data_id + ", #webs-custom-schema-errors-"+ data_id).addClass('red');
			 $("#webs-custom-schema-" + data_id + ", #webs-custom-schema-errors-"+ data_id).removeClass('green');
		}
	});

	$("a.show-custom-schema-fields").on('click', function(e){
		e.preventDefault();
		$(".webs-more-link").toggleClass("hidden");
		$(".webs-schema-1, .webs-schema-2").toggleClass("hidden");
	});

})( jQuery );
