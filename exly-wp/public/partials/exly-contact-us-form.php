<div class="exly-form-grp">
			<h2><?php echo __( 'Get In Touch', 'exly-wp' ); ?></h2>
		  <form class="form" method="POST" id="exly-contact-validation">
                <div class="form-group form-input">
                  <label for="exlyfname"><?php echo __( 'Name', 'exly-wp' ); ?> <span class="mend">*</span></label>                  
                  <input id="exlyfname" type="text" name="full_name" placeholder="Name"/>
                </div>
                <div class="form-group form-input">
                	<label for="email-address"><?php echo __( 'Email', 'exly-wp' ); ?> <span class="mend">*</span></label>
                  <input id="email-address" type="email" name="email" placeholder="Enter Email">
                </div>
				
                <div class="form-group form-input">
                 <label for="mobile-phone"><?php echo __( 'Phone Number', 'exly-wp' ); ?> <span class="mend">*</span></label>
                  
				  <?php 
// Read the JSON file 
 $contactLictjson = file_get_contents(plugin_dir_url(__FILE__).'/country-list.json');
  
// Decode the JSON file
$json_data = json_decode($contactLictjson,true);
  
 
$countries = $json_data['countries'];
					?>
                 <select class="phones" name="country_info">
					
					<?php 
					
					
					foreach($countries as $key => $country) {
					$code = $country["code"];
					$name = $country["name"];
					$dial_code = $country["dial_code"];
					if($name == 'India'): $selected ="selected='selected'"; else: $selected =''; endif;
					$value = $name . '-'.$dial_code;
                    $options .= "<option $selected value='$value'> $name ($dial_code)</option>";
					
} ?>
<?php 
$allowed_tags = wp_kses_allowed_html('post');
    $allowed_tags['option'] = array();
    $allowed_tags['option']['name'] = array();
    $allowed_tags['option']['value'] = array();
    $allowed_tags['option']['class'] = array();
	$allowed_tags['option']['selected'] = array();
    $allowed_tags['option']['id'] = array();

echo wp_kses($options,$allowed_tags); ?>
		</select>
		
                  <input id="mobilephone" type="number" class="num" name="phone" placeholder="Enter Phone Number" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" min="0" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" />
                </div>
                <div class="form-group form-input">
                  <label for="userInfo-message"><?php echo __( 'Message', 'exly-wp' ); ?> <span class="mend">*</span></label>
  
                 <textarea name="message" id="userInfo-message" class="userDetails_formInput__3cFJQ userDetails_formInputError__28UqH" placeholder="Enter Message" rows="3" ></textarea>
                </div>
				<?php  do_action('contact_form_extra_fields'); ?>
				
				<div class="form-group">
                <button type="submit" class="modern-primary-background-color classic-primary-background-color shadow-none exly-submit-button"><?php echo __( 'Send Message', 'exly-wp' ); ?></button>
				</div>
              </form>
          </div>