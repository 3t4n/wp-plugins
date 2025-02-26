<?php 

require_once("header.php"); 

$section_url = get_admin_url(false, "admin.php?page=cuterecords-settings"); 

if($_POST['submit_cutegig'] == "Y") { 
	$cuterecords_thumb_w = $_POST['cuterecords_thumb_w'];
	update_option('cuterecords_thumb_w', $cuterecords_thumb_w);
	
	$cuterecords_thumb_h = $_POST['cuterecords_thumb_h'];
	update_option('cuterecords_thumb_h', $cuterecords_thumb_h);
	
	$cuterecords_cover_w = $_POST['cuterecords_cover_w'];
	update_option('cuterecords_cover_w', $cuterecords_cover_w);
	
	$cuterecords_cover_h = $_POST['cuterecords_cover_h'];
	update_option('cuterecords_cover_h', $cuterecords_cover_h);
	
	$cuterecords_side_w = $_POST['cuterecords_side_w'];
	update_option('cuterecords_side_w', $cuterecords_side_w);

	$cuterecords_side_h = $_POST['cuterecords_side_h'];
	update_option('cuterecords_side_h', $cuterecords_side_h);
	
	$cuterecords_cont_css = $_POST['cuterecords_cont_css'];
	update_option('cuterecords_cont_css', $cuterecords_cont_css);
	
	$cuterecords_trklst_css = $_POST['cuterecords_trklst_css'];
	update_option('cuterecords_trklst_css', $cuterecords_trklst_css);
	
	$cuterecords_lyr_css = $_POST['cuterecords_lyr_css'];
	update_option('cuterecords_lyr_css', $cuterecords_lyr_css);
	
	$cuterecords_but_css = $_POST['cuterecords_but_css'];
	update_option('cuterecords_but_css', $cuterecords_but_css);
	
	$cuterecords_but_css_h = $_POST['cuterecords_but_css_h'];
	update_option('cuterecords_but_css_h', $cuterecords_but_css_h);
	
	$cuterecords_skin = $_POST['cuterecords_skin'];
	update_option('cuterecords_skin', $cuterecords_skin);
} else { 
	$cuterecords_thumb_w = cuterecords_THUMB_WIDTH;

	$cuterecords_thumb_h = cuterecords_THUMB_HEIGHT;

	$cuterecords_cover_w = cuterecords_COVER_WIDTH;

	$cuterecords_cover_h = cuterecords_COVER_HEIGHT;
	
	$cuterecords_side_w = cuterecords_SIDE_WIDTH;

	$cuterecords_side_h = cuterecords_SIDE_HEIGHT;

	$cuterecords_cont_css = cuterecords_CONT_CSS;
	
	$cuterecords_trklst_css = cuterecords_TRKLST_CSS;
	
	$cuterecords_lyr_css = cuterecords_LYR_CSS;
	
	$cuterecords_but_css = cuterecords_BUT_CSS;
	
	$cuterecords_but_css_h = cuterecords_BUT_CSS_H;
	
	$cuterecords_skin = cuterecords_SKIN;
}

?>

<div class="wrap">

<div id="icon-options-general" class="icon32"><br></div>

		<h2><?php echo  __( 'Cute Records' ); ?> - 
		<?php echo __( 'Settings' ); ?>
		</h2>
		<form name="cuterecords_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>" enctype="multipart/form-data">	
		<input type="hidden" name="submit_cutegig" value="Y">
		
			<h3><?php echo __('Image sizes'); ?></h3>

			<table class="form-table">
				<tbody>
				<tr>
					<th scope="row"><?php echo __('Cover image size'); ?></th>
					<td>
					<label for="cuterecords_cover_w"><?php echo __('Width'); ?></label>
					<input name="cuterecords_cover_w" id="cuterecords_cover_w" class="small-text" value="<?php echo esc_attr($cuterecords_cover_w); ?>" type="text">
					<label for="cuterecords_cover_h"><?php echo __('Height'); ?></label>
					<input name="cuterecords_cover_h" id="cuterecords_cover_h" class="small-text" value="<?php echo esc_attr($cuterecords_cover_h); ?>" type="text">
					</td>
				</tr>
				<tr>
					<th scope="row"><?php echo __('Thumbnail size'); ?></th>
					<td>
					<label for="cuterecords_thumb_w"><?php echo __('Width'); ?></label>
					<input name="cuterecords_thumb_w" id="cuterecords_thumb_w" class="small-text" value="<?php echo esc_attr($cuterecords_thumb_w); ?>" type="text">
					<label for="cuterecords_thumb_h"><?php echo __('Height'); ?></label>
					<input name="cuterecords_thumb_h" id="cuterecords_thumb_h" class="small-text" value="<?php echo esc_attr($cuterecords_thumb_h); ?>" type="text">
					</td>
				</tr>
				<tr>
					<th scope="row"><?php echo __('Widget image size'); ?></th>
					<td>
					<label for="cuterecords_side_w"><?php echo __('Width'); ?></label>
					<input name="cuterecords_side_w" id="cuterecords_side_w" class="small-text" value="<?php echo esc_attr($cuterecords_side_w); ?>" type="text">
					<label for="cuterecords_side_h"><?php echo __('Height'); ?></label>
					<input name="cuterecords_side_h" id="cuterecords_side_h" class="small-text" value="<?php echo esc_attr($cuterecords_side_h); ?>" type="text">
					</td>
				</tr>
				</tbody>
			</table>
			
			<h3><?php echo __('Style settings'); ?></h3>
			
			<table class="form-table">
				<tbody>
				<tr>
					<th scope="row"><label for="cuterecords_cont_css"><?php echo __('Container style'); ?></label></th>
					<td><input name="cuterecords_cont_css" id="cuterecords_cont_css" size="100" value="<?php echo esc_attr($cuterecords_cont_css); ?>" type="text"></td>
				</tr>
				<tr>
					<th scope="row"><?php echo __('Button style'); ?></th>
					<td>
					<label for="cuterecords_but_css"><?php echo __('Normal State'); ?></label>
					<input name="cuterecords_but_css" id="cuterecords_but_css" size="100" value="<?php echo esc_attr($cuterecords_but_css); ?>" type="text">
					</td>
				</tr>
				<tr>
					<th scope="row">&nbsp;</th>
					<td>
					<label for="cuterecords_but_css_h"><?php echo __('Mouse Over'); ?></label>
					<input name="cuterecords_but_css_h" id="cuterecords_but_css_h" size="100" value="<?php echo esc_attr($cuterecords_but_css_h); ?>" type="text">
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="cuterecords_trklst_css"><?php echo __('Tracklist style'); ?></label></th>
					<td><input name="cuterecords_trklst_css" id="cuterecords_trklst_css" size="100" value="<?php echo esc_attr($cuterecords_trklst_css); ?>" type="text"></td>
				</tr>
				<tr>
					<th scope="row"><label for="cuterecords_lyr_css"><?php echo __('Lyrics style'); ?></label></th>
					<td><input name="cuterecords_lyr_css" id="cuterecords_lyr_css" size="100" value="<?php echo esc_attr($cuterecords_lyr_css); ?>" type="text"><p class="description"><?php echo __('In CSS format. Example: width: 400px; background: #000; color: #fff;'); ?></p></td>
				</tr>
				<tr>
					<th scope="row"><label for="cuterecords_skin"><?php echo __('Play button style'); ?></label></th>
					<td>
					<select name="cuterecords_skin" id="cuterecords_skin">
						<option value="1"<?php echo $cuterecords_skin == 1 ? ' selected="selected"' : ''; ?>><?php echo __('black small'); ?></option>
						<option value="2"<?php echo $cuterecords_skin == 2 ? ' selected="selected"' : ''; ?>><?php echo __('white small'); ?></option>
					</select>
					</td>
				</tr>
				</tbody>
			</table>

			<p class="submit">
			<input name="save" class="button-primary" id="publish" accesskey="p" value="<?php echo __('Save Changes'); ?>" type="submit">
			</p>
			
		</form>

</div>