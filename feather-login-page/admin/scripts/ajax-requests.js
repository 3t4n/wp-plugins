	( function( $ ) {

		jQuery(document).ready(function($) {


			$.ajax({
				url: polpb_ajaxData_array.ajaxurlMain,
				type: 'GET',
				dataType: 'json',
				data: {param1: 'value1'},
			})
			.done(function(result) {
				
				if (result != 'false' && result != false) {
					var plbp_LoginBuilderDuplicatedOps = JSON.stringify(result);
					plbp_LoginBuilderDuplicatedOps = JSON.parse(plbp_LoginBuilderDuplicatedOps);

					feather_LoginBuilderApp.options.updatedOptions = _.clone( plbp_LoginBuilderDuplicatedOps[0] );

					if (plbp_LoginBuilderDuplicatedOps[1] != '') {
						feather_LoginBuilderApp.options.mobileOptions = _.clone( plbp_LoginBuilderDuplicatedOps[1] );
					}

					if (feather_LoginBuilderApp.options.updatedOptions == '') {
						defaultOptionsString = JSON.stringify(feather_LoginBuilderApp.options.defaultOps); 
						feather_LoginBuilderApp.options.updatedOptions = JSON.parse(defaultOptionsString);
					}

					loadSavedOptions(feather_LoginBuilderApp.options.updatedOptions);
				}

				console.log("success");
					
			})
			.fail(function() {
				alert("error while loading");
			})
			.always(function() {
				console.log("complete");
			});
			


			$('.updateBtn').on('click',function(e){

				console.log($(this))
				$(this).html("");
				$(this).html("<i class='fas fa-spinner fa-spin'></i>");

				$.ajax({
					url: polpb_ajaxData_array.ajaxurlMain,
					type: 'post',
					dataType: 'json',
					data: feather_LoginBuilderApp.options,
				})
				.done(function() {
					//console.log("success");
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					//console.log("complete");
				});

				setTimeout(function(){
					$('.updateBtn').html("Save Changes");
				}
					,800 );
				

			});


			if( polpb_ajaxData_array.isFeatherPremActive == 'true' ){
				$('.premiumFeaturesAcord').css('display','none');
			}
				


				
			
			
		
        
  		});
	})(jQuery);