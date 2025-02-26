<?php 
	global $wpdb;
	$api='';
	$serv='';
	$msg_header='';
	$msg='';
	$type='';
	$h2_header = '';
	$h2_text = '';
	$back_color='';
	$btn_color_prev='';
	$btn_color_next='';
	$back_image='';
	$form_back_color='';
	
	if((wp_verify_nonce( $_REQUEST['_wpnonce'], 'gyq-admin_10' ))&&(isset($_REQUEST['service-api-submit']))){
		$id = "";
		$key = $wpdb->get_results("SELECT * FROM wp_get_your_quote_options");
		if (!empty($key)){ 
			foreach ($key as $k){
				$id = $k->ID;		
			}
			$insert_sql = $wpdb->update('wp_get_your_quote_options', array('apikey'=>sanitize_text_field($_POST['API_key']), 'services'=>sanitize_text_field($_POST['services_provided']),'msg_header'=>sanitize_text_field($_POST['msg_header']),'message'=>sanitize_text_field($_POST['message']),'backgroundcolor'=>sanitize_text_field($_POST['back_color']),'buttoncolorprev'=>sanitize_text_field($_POST['btn_color_prev']),'buttoncolornext'=>sanitize_text_field($_POST['btn_color_next']),'backgroundimage'=>sanitize_text_field($_POST['back_image']),'formbackgroundcolor'=>sanitize_text_field($_POST['form_back_color']),'heading'=>sanitize_text_field($_POST['h2_header']),'headertext'=>sanitize_text_field($_POST['h2_text']),'type'=>sanitize_text_field($_POST['type_of_service'])),array('ID' => $id)); 
		}
		else{
			$insert_sql = $wpdb->insert('wp_get_your_quote_options', array(
			'apikey' => sanitize_text_field($_POST['API_key']),
			'services' => sanitize_text_field($_POST['services_provided']),
			'msg_header'=>sanitize_text_field($_POST['msg_header']),
			'message'=>sanitize_text_field($_POST['message']),
			'backgroundcolor'=>sanitize_text_field($_POST['back_color']),
			'buttoncolorprev'=>sanitize_text_field($_POST['btn_color_prev']),
			'buttoncolornext'=>sanitize_text_field($_POST['btn_color_next']),
			'backgroundimage'=>sanitize_text_field($_POST['back_image']),
			'formbackgroundcolor'=>sanitize_text_field($_POST['form_back_color']),	
			'heading'=>sanitize_text_field($_POST['h2_header']),
			'headertext'=>sanitize_text_field($_POST['h2_text']),
			'type'=>sanitize_text_field($_POST['type_of_service']),
			));
		
		}
		if ($insert_sql){
			echo "APi key added successfully.";
		}else{
			echo "Error in submitting data.";	
		}
	}	
	
	
	$key = $wpdb->get_results("SELECT * FROM wp_get_your_quote_options");
	if (!empty($key)){      
		foreach ($key as $k){
		$api = $k->apikey;
		$serv = $k->services;
		$msg_header = $k->msg_header;
		$msg = $k->message;
		$type = $k->type;
		$h2_header = $k->heading;
		$h2_text = $k->headertext;
		if ($k->backgroundcolor!="")
		{
		$back_color = $k->backgroundcolor;
		}
		else
		{
	    $back_color = "#4c5b6d" ;
		}
		if ($k->buttoncolorprev!="")
		{
		$btn_color_prev = $k->buttoncolorprev;
		}
		else
		{
	    $btn_color_prev = "#fff none repeat scroll 0 0";
		}
		if ($k->buttoncolornext!="")
		{
		$btn_color_next = $k->buttoncolornext;
		}
		else
		{
	    $btn_color_next = "#fb8015";
		}
		if ($k->backgroundimage!="")
		{
		$back_image = $k->backgroundimage;
		}
		else
		{
	   $back_image = "";
		}
		if ($k->formbackgroundcolor!="")
		{
		$form_back_color = $k->formbackgroundcolor;
		}
		else
		{
	   $form_back_color = "";
		}
		}	 
	}	
	?>
<form action="" method="POST">
	<?php wp_nonce_field( 'gyq-admin_10' );?>
	<div><b>NOTE: To use the plugin please add shortcode in this format: [getyourquote service='service name'].  Here service name is the name of service you provide.</b> </div>
  <table class="set_table">
  <tr><td></td><td></td></tr>
  <tr>
  <div class="form-group">
  <td class="head_td"><h4>Please Enter the API Key:</h4></td>
  <td><input type="text" name="API_key" class="form-control" value="<?php echo esc_html__($api);?>"></td>
  </div>
  </tr>
  <tr>
  <div class="form-group">
  <td><h4>Please Enter the Name of Service:</h4></td>
  <td><input type="text" name="services_provided" class="form-control" value="<?php echo esc_html__($serv);?>"></td>
  </div>
  </tr>
  <tr>
  <div class="form-group">
  <td><h4>Thank You Message Heading:</h4></td>
  <td><input type="text" name="msg_header" class="form-control" value="<?php echo esc_html__($msg_header);?>"></td>
  </div>
  </tr>
  <tr>
  <div class="form-group">
  <td><h4>Confirmation Message:</h4></td>
  <td><textarea name="message" class="form-control" ><?php echo esc_html__($msg); ?></textarea></td>
  </div>
  </tr>
  </table>
  <br>
 
   <div class="form-group"><h4> <input type="radio" name="type_of_service" value="sandbox" <?php if(esc_html__($type)=="sandbox"){ echo "checked";} ?>>Sandbox</h4></div>
   <div class="form-group"><h4>  <input type="radio" name="type_of_service" value="live" <?php if(esc_html__($type)=="live"){ echo "checked";} ?>>Live</h4></div><br>

  <h2>Style Settings</h2>
  <table class="set_table">
  <tr>
  <div class="form-group">
  <td class="head_td"><h4>Background Color:</h4></td>
  <td><input type="text" name="back_color" class="form-control" value="<?php echo esc_html__($back_color);?>"></td>
  </div>
  </tr> 
  <tr>
  <div class="form-group">
  <td class="head_td"><h4>Form Background Color:</h4></td>
  <td><input type="text" name="form_back_color" class="form-control" value="<?php echo esc_html__($form_back_color);?>"></td>
  </div>
  </tr>
  <tr>
  <div class="form-group">
  <td><h4>Previous Button Color:</h4></td>
  <td><input type="text" name="btn_color_prev" class="form-control" value="<?php echo esc_html__($btn_color_prev);?>"></td>
  </div> 
  </tr>
  <tr>
  <div class="form-group">
  <td><h4>Next Button Color:</h4></td>
  <td><input type="text" name="btn_color_next" class="form-control" value="<?php echo esc_html__($btn_color_next);?>"></td>
  </div>
  </tr>
  <tr>
  <div class="form-group">
  <td><h4>Background Image:</h4></td>
  <td><input type="text" name="back_image" placeholder="Enter the url here" class="form-control" value="<?php echo esc_html__($back_image);?>"></td>
  </div>
  </tr> 
  <tr>
  <div class="form-group">
  <td><h4>Add H2 heading:</h4></td>
  <td><input type="text" name="h2_header"  class="form-control" value="<?php echo esc_html__($h2_header);?>"></td>
  </div>
  </tr> 
  <tr>
  <div class="form-group">
  <td><h4>Text below heading:</h4></td>
  <td><input type="text" name="h2_text"  class="form-control" value="<?php echo esc_html__($h2_text);?>"></td>
  </div>
  </tr>
  <tr>
  <td><input type="submit" value="Submit" name="service-api-submit"></td>
  </tr>
</form> 