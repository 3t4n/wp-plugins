<?php 

if(!defined('ABSPATH')) exit;

if(isset($_POST['acttf_submit'])){
	$acttf_top_editor_code=sanitize_text_field(htmlentities($_POST['acttf_top_editor']));
	$acttf_bottom_editor_code=sanitize_text_field(htmlentities($_POST['acttf_bottom_editor']));
	$nonce=$_POST['acttf_wpnonce'];
	if(wp_verify_nonce( $nonce, 'acttf_nonce' ))
	{
		update_option('acttf_content_top',$acttf_top_editor_code);
		update_option('acttf_content_bottom',$acttf_bottom_editor_code);
		$successmsg= success_option_msg_acttf('Settings Saved!');
		
	}
	else
	{
        $errormsg= failure_option_msg_acttf('An error has occurred.');
		
    }
}

$acttf_top_content_code=get_option_acttf_code_top();

$acttf_bottom_content_code=get_option_acttf_code_bottom();

?>

<div class="wrap">

		<h2>Adding Content to the Footer </h2>
		
    <?php
    if ( isset( $successmsg ) ) 
	{
		echo $successmsg; 
    }
	
    if ( isset( $errormsg ) ) 
	{
        echo $errormsg;
    }
    ?>
		
	<div class='acttf_inner'>
	
		<form method="post" enctype="multipart/form-data">
		
			<label for="acttf-add-content-to-top"> Adding Content to the Footer Top</label>
				
				<?php
					if(isset($acttf_top_content_code) && !empty($acttf_top_content_code))
					{
						$content = html_entity_decode($acttf_top_content_code);
						
						$editor_id = 'acttf_top_editor';
					
						$settings=array(
										'media_buttons' => true,
										'textarea_name' => $editor_id,
										'textarea_rows'=>'8',
										'drag_drop_upload' => true
						);
						
						wp_editor( $content, $editor_id, $settings );
					}
					else
					{
						$content = '';	
							
						$editor_id = 'acttf_top_editor';
						
						$settings=array(
										'media_buttons' => true,
										'textarea_name' => $editor_id,
										'textarea_rows'=>'8',
										'drag_drop_upload' => true
						);
						
						wp_editor( $content, $editor_id, $settings );
					}
				?>
			
				<label for="acttf-add-content-to-bottom"> Adding Content to the Footer Bottom</label>
				
				<?php
					if(isset($acttf_bottom_content_code) && !empty($acttf_bottom_content_code))
					{
						$content = html_entity_decode($acttf_bottom_content_code);
						
						$editor_id = 'acttf_bottom_editor';
						
						$settings=array(
										'media_buttons' => true,
										'textarea_name' => $editor_id,
										'textarea_rows'=>'8',
										'drag_drop_upload' => true
						);
						
						wp_editor( $content, $editor_id, $settings );
					}
					else
					{
						$content = '';
						
						$editor_id = 'acttf_bottom_editor';
						
						$settings=array(
										'media_buttons' => true,
										'textarea_name' => $editor_id,
										'textarea_rows'=>'8',
										'drag_drop_upload' => true
						);
						
						wp_editor( $content, $editor_id, $settings );
					}
				?>
			
			<input type="hidden" name="acttf_wpnonce" value="<?php echo $nonce= wp_create_nonce('acttf_nonce'); ?>">
			
			<input type="submit" class="button button-primary " name="acttf_submit" id="acttf_submit" value="Save">
			
		</form>
		
		
	</div>
	

</div>