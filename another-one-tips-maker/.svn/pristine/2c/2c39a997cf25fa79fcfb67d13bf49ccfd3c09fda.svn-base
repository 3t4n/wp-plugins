<?php  
add_shortcode( 'single_tip', 'wts_message_checker' );
function wts_message_checker( $atts, $content = null ) {
	
	$out = wts_generate_tip( $atts['id'], $atts );

	return $out;
	
	$out = '<div class="tw-bs">
	<label>'.$config['widget_title'].'</label>	
	<input type="text" class="input-medium code_input_data" placeholder="'.$config['widget_placeholder'].'" />
	<div>
	<input type="button" onClick="get_results()" class="btn btn-success btn_search_one" value="'.$config['button_text'].'" id="check_message" />
	</div>
	
	<div class="status_bar hide marg_10">
		<img src="'.plugins_url('images/loader.gif', __FILE__ ).'">
	</div>
	
	
	<div class="out_msg_cont marg_10"></div>
	
	</div>
	<script>
	 function get_results(){

		var data = {
  			action: "get_message_action",
			code: jQuery(".code_input_data").val(),
  			security: "'.wp_create_nonce("filter_nonce").'"
  		};
  				  jQuery.ajax({url: \''.get_option('home').'/wp-admin/admin-ajax.php\',
  					  type: "POST",
  					  data: data,            
  					  beforeSend: function(msg){
						jQuery(".status_bar").removeClass("hide");
  					   },
  						success: function(msg){
						jQuery(".status_bar").addClass("hide");
						
					var search_data = jQuery(".code_input_data").val();
					
					var obj = jQuery.parseJSON( msg );
					var cnt = 0;
					var out_msg = "Sorry, no messages found!";

					if( obj.code == search_data ){
							cnt++;
							out_msg = obj.msg;
					}
			
					
					// check if code exists
					if( cnt != 0 ){
						jQuery(".out_msg_cont").html( "<div class=\"alert alert-info\"> "+out_msg+"</div>" );
					}else{
						jQuery(".out_msg_cont").html( "<div class=\"alert alert-error\">"+out_msg+"</div>" );
					}

						} , 
  					  error:  function(msg) {
  						alert("Error Saved!!: " + msg);
  					  }          
  			  });
        }
		</script>
	
	';
	return $out;
}
?>