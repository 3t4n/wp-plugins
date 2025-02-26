jQuery(document).ready(function($){
	$('.title').on('click', function(){
		$('.panel').removeClass('active');
		$(this).siblings('.panel').addClass('active');
	});

	$('#remote-migration input[name="migration_type"]').on('change', function(){
		var type = $(this).val();
		$('.remote-data').removeClass('local');
		$('.remote-data').removeClass('remote');
		$('.remote-data').addClass(type);

	});


	/*Migration*/
	function setLoading(is_loading = false){
		if(is_loading){
			$('.image-loading').addClass('loading');
		}else{
			$('.image-loading').removeClass('loading');
		}
	}

	function setConnected(connect = false){
		
		if(connect){
			//is connected
			$('#connect').hide();
			$('#run').show();
			//
		}else{
			$('#connect').show();
			$('#run').hide();
		}
	}

	function running(first = false){
		$.ajax({
			url: cdwqa.ajax_url,
			type: 'POST',
			dataType: 'json',
			data: {
				action: 'cdwqa_migration',
				nonce: cdwqa.ajax_nonce,
				migration: 'bbpress',
				migration_action: 'run',
			},
			success: function( response ) {
				if (response.success) {
					if(response.data.current_action == 'count_total'){
						var html = '';
						var count = response.data.count;
						var countText = response.data.countText;
						for(var i = 0; i< count.length; i++){
							 html += '<div class="process">\
								<div class="processed">\
									<div class="text">'+countText[count[i].action]+'</div>\
									<div class="per-wrap">\
										<div class="per">\
											<span id="per-'+count[i].action+'"></span>\
										</div>\
									</div>\
									<div style="clear:both;"></div>\
								</div>\
							</div>';
						}
						$('#action-migration .process-wrap').html(html);
					}else{
						var per = response.data.per;
						var current_action = response.data.current_action;
						console.log();
						$('#action-migration').find('#per-'+current_action).css('width', per+'%' );
					}
					/*var offset = parseInt(response.data.remote_offset);
					var total = parseInt(response.data.remote_total);
					var per = "0%";
					if(offset >= total){
						per = "100%";
					}else{
						per = (offset*100/total).toFixed(2) + "%";
					}
					$('#connect-status').text(response.data.current_action+" "+per);*/

					if(response.data.current_action == 'done'){
						setLoading(false);
					}else{
						running();
					}

				}else{
					setLoading(false);
				}
				
			},
			error: function( data ) {
				setLoading(false);
			}
		});
	}


	$('#connect').on('click', function(){
		setLoading(true);

		$.ajax({
				url: cdwqa.ajax_url,
				type: 'POST',
				dataType: 'json',
				data: {
					action: 'cdwqa_migration',
					nonce: cdwqa.ajax_nonce,
					migration: 'bbpress',
					migration_action: 'connect',
					// db_name: db_name,
					// db_user: db_user,
					// db_password: db_password,
					// db_host: db_host,
					// db_prefix: db_prefix,
					// db_blog_id: db_blog_id,
				},
				success: function( response ) {
					// console.log( data );
					if (response.success) {
						$('#connect-status').text('Connected');
						setConnected(true);
					}else{
						$('#connect-status').text('Not Connected');
						setConnected(false);
						
					}
					setLoading(false);
				},
				error: function( data ) {
					$('#connect-status').text('Not Connected');
					setConnected(false);
					setLoading(false);
				}
			});

		return false;
	});

	$('#cdwqa_save').on('click', function(){
		var migration_from = $('#remote-migration input[name="migration_from"]:checked').val();
		var migration_type = $('#remote-migration input[name="migration_type"]:checked').val();
		var db_name = $('#db_name').val();
		var db_user = $('#db_user').val();
		var db_password = $('#db_password').val();
		var db_host = $('#db_host').val();
		var db_prefix = $('#db_prefix').val();
		var db_blog_id = $('#db_blog_id').val();
		var db_limit = $('#db_limit').val();
		var upload_dir = $('#upload_dir').val();

		$.ajax({
				url: cdwqa.ajax_url,
				type: 'POST',
				dataType: 'json',
				data: {
					action: 'cdwqa_save_db_info',
					nonce: cdwqa.ajax_nonce,
					migration_from: migration_from,
					migration_type: migration_type,
					db_name: db_name,
					db_user: db_user,
					db_password: db_password,
					db_host: db_host,
					db_prefix: db_prefix,
					db_blog_id: db_blog_id,
					db_limit: db_limit,
					upload_dir: upload_dir,
				},
				success: function( response ) {
					// console.log( data );
					if (response.success) {
						alert('Saved');

						$('#migration-step-2 .title')[0].click();
					}
				},
				error: function( data ) {
					alert('Error');
					// $('#connect-status').text('Not Connected');
					// setConnected(false);
					// setLoading(false);
				}
			});

		return false;
	});

	$('#cdwqa_reset').on('click', function(){
		$.ajax({
			url: cdwqa.ajax_url,
			type: 'POST',
			dataType: 'json',
			data: {
				action: 'cdwqa_migration',
				nonce: cdwqa.ajax_nonce,
				migration: 'bbpress',
				migration_action: 'reset',
			},
			success: function( response ) {
				// console.log( data );
				if (response.success) {
					alert('Reset Done');
					
					// $('#connect-status').text('Connected');
				}else{
					// $('#connect-status').text('Not Connected');
					setLoading(false);
				}
				
			},
			error: function( data ) {
				// $('#connect-status').text('Not Connected');
				setLoading(false);
			}
		});
		return false;
	});

	$('#re-run').on('click', function(){
		$.ajax({
			url: cdwqa.ajax_url,
			type: 'POST',
			dataType: 'json',
			data: {
				action: 'cdwqa_migration',
				nonce: cdwqa.ajax_nonce,
				migration: 'bbpress',
				migration_action: 're-run',
			},
			success: function( response ) {
				// console.log( data );
				if (response.success) {
					setLoading(true);
					running(true);
				}else{
					setLoading(false);
				}
				
			},
			error: function( data ) {
				setLoading(false);
			}
		});
		return false;
	});


	//prepare first time click run

	$('#run').on('click', function(){
		setLoading(true);

		running(true);

		return false;
	});
});