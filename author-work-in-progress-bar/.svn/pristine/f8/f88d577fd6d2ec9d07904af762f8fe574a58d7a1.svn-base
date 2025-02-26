<script type="text/javascript">
	jQuery(document).ready(function(){
	
		// Set all variables to be used in scope
		var frame;
	
		jQuery('body').on( 'click', '#open-media-custom-btn', function( event ){
			event.preventDefault();
			
			// If the media frame already exists, reopen it.
			if ( frame ) {
				frame.open();
				return;
			}
			
			// Create a new media frame
			frame = wp.media({
				title: 'Upload Image',
				button: {
					text: 'Use this media'
				},
				multiple: false  // Set to true to allow multiple files to be selected
			});
			
			// When an image is selected in the media frame...
			frame.on( 'select', function() {
			
				// Get media attachment details from the frame state
				var attachment = frame.state().get('selection').first().toJSON();
			
				// Output to the console uploaded_image
				//console.log(uploaded_image);
				var image_url = attachment.url;
				//alert(image_url);
				// Let's assign the url value to the input field
				jQuery('.media-input-field').val(image_url);
				//frame.close();
			});
			
			// Finally, open the modal on click
			frame.open();
			
			jQuery('.media-modal').parent().not('div:first').remove();
			
		});
	});
</script>

<div class="wrap" style="background: none repeat scroll 0 0 #fff;padding-left: 20px;">
  <h2>Generate Shortcode</h2>
  
	<?php
	
	$heading = array_key_exists('submit', $_POST) ? sanitize_text_field( $_POST['heading'] ) : '';
	$wip_title = array_key_exists('submit', $_POST) ? sanitize_text_field( $_POST['wip_title'] ) : '';
	$unit_of_measure = array_key_exists('submit', $_POST) ? sanitize_text_field( $_POST['unit_of_measure'] ) : 'words'; //
	$your_goal = array_key_exists('submit', $_POST) ? intval( sanitize_text_field( $_POST['your_goal'] ) ) : '';
	$current_score = array_key_exists('submit', $_POST) ? intval( sanitize_text_field( $_POST['current_score'] ) ) : '';
	$progress_bar_color = array_key_exists('submit', $_POST) ? sanitize_text_field( $_POST['progress_bar_color'] ) : 'red';
	$progress_bar_border = array_key_exists('submit', $_POST) ? sanitize_text_field( $_POST['progress_bar_border'] ) : 'red';
	$candy_stripe_options = array_key_exists('submit', $_POST) ? sanitize_text_field( $_POST['candy_stripe_options'] ) : 'none';
	$progress_bar_height = array_key_exists('submit', $_POST) ? intval( sanitize_text_field( $_POST['progress_bar_height'] ) ) : '';
	$progress_bar_media = array_key_exists('submit', $_POST) ? sanitize_text_field( $_POST['progress_bar_media'] ) : '';
	$font_color = array_key_exists('submit', $_POST) ? sanitize_text_field( $_POST['font_color'] ) : '';
	$more_information = array_key_exists('submit', $_POST) ? sanitize_text_field( $_POST['more_information'] ) : '';
	$include_hyperlink = array_key_exists('submit', $_POST) ? sanitize_text_field( $_POST['include_hyperlink'] ) : '';
	$hyperlink_text = array_key_exists('submit', $_POST) ? sanitize_text_field( $_POST['hyperlink_text'] ) : '';
	$hyperlink = array_key_exists('submit', $_POST) ? sanitize_text_field( $_POST['hyperlink'] ) : '';
	$include_own_progress_bar = array_key_exists('submit', $_POST) ? sanitize_text_field( $_POST['include_own_progress_bar'] ) : '';
	
	if(array_key_exists('submit', $_POST))
	{
		$shortcode = '[progressbar heading="'.$heading.'" wip_title="'.$wip_title.'" unit_of_measure="'.$unit_of_measure.'" your_goal="'.$your_goal.'" current_score="'.$current_score.'" progress_bar_color="'.$progress_bar_color.'" progress_bar_border="'.$progress_bar_border.'" candy_stripe_options="'.$candy_stripe_options.'" progress_bar_height="'.$progress_bar_height.'" progress_bar_media="'.$progress_bar_media.'" font_color="'.$font_color.'" more_information="'.$more_information.'" include_hyperlink="'.$include_hyperlink.'" hyperlink_text="'.$hyperlink_text.'" hyperlink="'.$hyperlink.'" include_own_progress_bar="'.$include_own_progress_bar.'"]';
			
		echo '<div class="updated">
			<p><strong>Shortcode Generated Successfully.</strong></p>
			<p>Your desired shortcode is:</p>
			<p class="my-shortcode">'.esc_html($shortcode).'</p>
			<p>Now you can use this shortcode in any page/post you want. Just copy and paste it in page/post editor.</p>
			</div>';
	}
	
	
	?>
    
  <form action="" method="post" enctype="multipart/form-data">
    <table class="form-table">
      <tbody>
	  
        <tr>
          <th scope="row"><label for="heading">Heading</label></th>
          <td><input type="text" id="heading" name="heading" value="<?php echo esc_attr( $heading ) ?>" /></td>
        </tr>
	  
        <tr>
          <th scope="row"><label for="wip_title">WIP Title</label></th>
		  <td><input type="text" id="wip_title" name="wip_title" value="<?php echo esc_attr( $wip_title ) ?>" /></td>
        </tr>
	  
        <tr>
          <th scope="row"><label for="unit_of_measure">Unit of measure</label></th>
          <td>
		  <input type="radio" name="unit_of_measure" value="words" <?php echo ($unit_of_measure == 'words') ? 'checked="checked"' : '' ?> /> &nbsp; Words <br />
		  <input type="radio" name="unit_of_measure" value="pages" <?php echo ($unit_of_measure == 'pages') ? 'checked="checked"' : '' ?> /> &nbsp; Pages
		  </td>
        </tr>
	  
        <tr>
          <th scope="row"><label for="your_goal">Your Goal</label></th>
          <td><input type="text" id="your_goal" name="your_goal" value="<?php echo esc_attr( $your_goal ) ?>" onblur="this.value=this.value.replace(/,/g,'')" /></td>
        </tr>
	  
        <tr>
          <th scope="row"><label for="current_score">Current</label></th>
          <td><input type="text" id="current_score" name="current_score" value="<?php echo esc_attr( $current_score ) ?>" onblur="this.value=this.value.replace(/,/g,'')" /></td>
        </tr>
	  
        <tr>
          <th scope="row"><label for="progress_bar_color">Color of Progress Bar</label></th>
          <td>
		  <select name="progress_bar_color">
			<option value="red" <?php echo ($progress_bar_color == 'red') ? 'selected="selected"' : '' ?>>Red</option>
			<option value="black" <?php echo ($progress_bar_color == 'black') ? 'selected="selected"' : '' ?>>Black</option>
			<option value="blue" <?php echo ($progress_bar_color == 'blue') ? 'selected="selected"' : '' ?>>Blue</option>
			<option value="green" <?php echo ($progress_bar_color == 'green') ? 'selected="selected"' : '' ?>>Green</option>
			<option value="orange" <?php echo ($progress_bar_color == 'orange') ? 'selected="selected"' : '' ?>>Orange</option>
			<option value="yellow" <?php echo ($progress_bar_color == 'yellow') ? 'selected="selected"' : '' ?>>Yellow</option>
			<option value="white" <?php echo ($progress_bar_color == 'white') ? 'selected="selected"' : '' ?>>White</option>
		  </select>
		  </td>
        </tr>
	  
        <tr>
          <th scope="row"><label for="progress_bar_border">Color of Progress Bar Border</label></th>
          <td>
		  <select name="progress_bar_border">
			<option value="noborder" <?php echo ($progress_bar_border == 'noborder') ? 'selected="selected"' : '' ?>>No Border</option>
			<option value="red" <?php echo ($progress_bar_border == 'red') ? 'selected="selected"' : '' ?>>Red</option>
			<option value="black" <?php echo ($progress_bar_border == 'black') ? 'selected="selected"' : '' ?>>Black</option>
			<option value="blue" <?php echo ($progress_bar_border == 'blue') ? 'selected="selected"' : '' ?>>Blue</option>
			<option value="green" <?php echo ($progress_bar_border == 'green') ? 'selected="selected"' : '' ?>>Green</option>
			<option value="orange" <?php echo ($progress_bar_border == 'orange') ? 'selected="selected"' : '' ?>>Orange</option>
			<option value="yellow" <?php echo ($progress_bar_border == 'yellow') ? 'selected="selected"' : '' ?>>Yellow</option>
			<option value="white" <?php echo ($progress_bar_border == 'white') ? 'selected="selected"' : '' ?>>White</option>
		  </select>
		  </td>
        </tr>
	  
        <tr>
          <th scope="row"><label for="candy_stripe_options">Candy stripe options</label></th>
          <td>
		  <input type="radio" name="candy_stripe_options" <?php echo ($candy_stripe_options == 'simple') ? 'checked="checked"' : '' ?> value="simple" /> &nbsp; Candy stripe <br />
		  <input type="radio" name="candy_stripe_options" <?php echo ($candy_stripe_options == 'animated') ? 'checked="checked"' : '' ?> value="animated" /> &nbsp; Candy stripe animated <br />
		  <input type="radio" name="candy_stripe_options" <?php echo ($candy_stripe_options == 'none') ? 'checked="checked"' : '' ?> value="none" /> &nbsp; None
		  </td>
        </tr>
	  
        <tr>
          <th scope="row"><label for="progress_bar_height">Progress Bar Height in Pixels</label></th>
          <td><input type="text" id="progress_bar_height" name="progress_bar_height" value="<?php echo esc_attr( $progress_bar_height ) ?>" onblur="this.value=this.value.replace(/,/g,'')" /></td>
        </tr>
	  
        <tr>
          <th scope="row"><label for="progress_bar_media">Add Cover</label></th>
          <td><input type="text" id="progress_bar_media" name="progress_bar_media" class="media-input-field" value="<?php echo esc_attr( $progress_bar_media ) ?>" /> &nbsp <a href="#" id="open-media-custom-btn" class="">Add Media</a></td>
        </tr>
	  
        <tr>
          <th scope="row"><label for="font_color">Font Color</label></th>
          <td><input type="text" id="font_color" name="font_color" value="<?php echo esc_attr( $font_color ) ?>" /></td>
        </tr>
	  
        <tr>
          <th scope="row"><label for="more_information">More Information</label></th>
          <td><textarea id="more_information" name="more_information"><?php echo esc_textarea( $more_information ) ?></textarea></td>
        </tr>
	  
        <tr>
          <th scope="row"><label for="include_hyperlink">Add Link</label></th>
          <td><input type="checkbox" id="include_hyperlink" name="include_hyperlink" <?php echo ($include_hyperlink == 'yes') ? 'checked="checked"' : '' ?> value="yes" /> &nbsp; Want to add link?</td>
        </tr>
	  
        <tr>
          <th scope="row"><label for="hyperlink_text">Hyperlink Text</label></th>
          <td><input type="text" id="hyperlink_text" name="hyperlink_text" value="<?php echo esc_attr( $hyperlink_text ) ?>" /></td>
        </tr>
	  
        <tr>
          <th scope="row"><label for="hyperlink">Hyperlink</label></th>
          <td><input type="text" id="hyperlink" name="hyperlink" value="<?php echo esc_attr( $hyperlink ) ?>" /></td>
        </tr>
	  
        <tr>
          <th scope="row"><label for="include_own_progress_bar">Help spread the word (optional)</label></th>
          <td><input type="checkbox" id="include_own_progress_bar" name="include_own_progress_bar" <?php echo ($include_own_progress_bar == 'yes') ? 'checked="checked"' : '' ?> value="yes" /> &nbsp; Include: "WIP Progress Bar"</td>
        </tr>
		
		
      </tbody>
    </table>
    <p class="submit">
      <input type="submit" value="Generate Shortcode" class="button button-primary" id="submit" name="submit">
    </p>
  </form>
</div>