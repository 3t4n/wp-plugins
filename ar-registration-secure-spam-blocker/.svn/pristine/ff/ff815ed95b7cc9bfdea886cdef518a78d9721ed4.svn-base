<?php
/**
 * Main functionality
 **/

// This function shows the form field on registration page
add_action('register_form','show_custom_field');

// This is a check to see if you want to make a field required
add_action('register_post','check_fields',10,3);


function show_custom_field() {

?>

	<p>

	<label><?php echo get_option('ars_question'); ?></label><br />

	<input id="ars-custom-field" class="input" type="text" name="ars-custom-field" value="<?php echo $_POST['ars-custom-field']; ?>" />

	</p>

<?php
   
}

// If no city entered display Error

function check_fields($login, $email, $errors) {

   if ($_POST['ars-custom-field'] == '' || strtolower($_POST['ars-custom-field']) != strtolower(get_option('ars_answer'))){

      $errors->add('empty_custom-field', '<strong>ERROR</strong>: Please enter valid entries in all fields.');

   }

}

?>