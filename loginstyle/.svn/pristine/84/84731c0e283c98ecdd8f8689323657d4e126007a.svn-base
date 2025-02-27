<div class="admin-wrap">
	<div class="archtheme-links">
		<ul>
			<li class="inline-block"><a href="http://archtheme.com/loginstyle" target="_blank"><img src="<?php echo LOGINSTYLE_URL; ?>/admin/imgs/premium.png" alt="Go Premium"><br>GO PREMIUM!</a></li>
			<li class="inline-block"><a href="http://archtheme.com/loginstyle" target="_blank"><img src="<?php echo LOGINSTYLE_URL; ?>/admin/imgs/rate.png" alt="Leave a Rating"><br>LEAVE A RATING</a></li>
			<li class="inline-block"><a href="http://archtheme.com" target="_blank"><img src="<?php echo LOGINSTYLE_URL; ?>/admin/imgs/archtheme-logo.png" alt="ARCH WORDPRESS PLUGINS"><br>ARCH PLUGINS</a></li>
		</ul>
	</div>
        <h1 class="margin30"><?php echo LOGINSTYLE_NAME; ?></h1>
        <p>
                <?php _e('Brand and customize your login page without any coding knowledge.', LOGINSTYLE_SLUG); ?>
        </p>
        <div id="tabs" class="clearfix">
                <ul>
                <?php foreach ( $tabs as $k => $label): ?>
                        <li><a href="#tabs-<?php echo $k; ?>"><?php echo $label; ?></a></li>
                <?php endforeach; ?>
                </ul>
                <form method="post" action="options.php">
                        <?php settings_fields( LOGINSTYLE_OPTIONS . '_group' ); ?>
                        <div id="tabs-general">
                                <div class="admin-section">
                                        <h3><strong><?php _e('General Settings', LOGINSTYLE_SLUG); ?></strong></h3>
                                        <table class="form-table wide-th">
                                        	<tr>
                                                        <th>
                                                                <?php _e('Content Width', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Set the width of the login form and footer content. The default value is 320px.', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<input type="text" class="input-prefix" name="<?php echo LOGINSTYLE_OPTIONS;?>[content_width]" id="content_width" value="<?php echo $content_width; ?>" /><select class="postfix" name="<?php echo LOGINSTYLE_OPTIONS;?>[content_width_unit]" id="content_width_unit">
                                                        		<option value="px" <?php selected( $content_width_unit, 'px'); ?>><?php _e('px', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="%" <?php selected( $content_width_unit, '%'); ?>><?php _e('%', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="em" <?php selected( $content_width_unit, 'em'); ?>><?php _e('em', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="rem" <?php selected( $content_width_unit, 'rem'); ?>><?php _e('rem', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="vw" <?php selected( $content_width_unit, 'vw'); ?>><?php _e('vw', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="vh" <?php selected( $content_width_unit, 'vh'); ?>><?php _e('vh', LOGINSTYLE_SLUG); ?></option>
                                                        	</select>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th>
                                                                <?php _e('Font Family', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Select the font family for the login page', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                	<td>
                                                		<select id="font_family" name="<?php echo LOGINSTYLE_OPTIONS;?>[font_family]" class="css-select">
					                                <option value=""><?php _e('Font Family', LOGINSTYLE_SLUG); ?></option>
					                                <?php
					                                $variants_group = '';
					                                $subsets_group = '';
					                                foreach ($items as $item) {
					                                        $i++;
					                                        $str = $item['family'];
					                                        $variants = '';
					                                        $subsets = '';
					                                        $backup = ' data-backup="serif"';
					                                        if ( isset( $item['variants']) && is_array( $item['variants'] ) ) {
					                                                $variants = ' data-variants="' . implode(',', $item['variants']) . '"';
					                                                
					                                                if( $str == $font_family ) {
					                                                        foreach( $item['variants'] as $var ) {
					                                                                $variants_group .= '<option value="' . $var . '" ' . selected($font_variant, $var) . '>' . ucfirst( $var ) . '</option>';
					                                                        }
					                                                }
					                                        }
					                                        if ( isset( $item['subsets']) && is_array( $item['subsets'] ) ) {
					                                                $subsets = ' data-subsets="' . implode(',', $item['subsets']) . '"';
					                                                
					                                                if( $str == $font_family ) {
					                                                        foreach( $item['subsets'] as $sub ) {
					                                                                $subsets_group .= '<option value="' . $sub . '" ' . selected($font_subset, $sub) . '>' . ucfirst( $sub ) . '</option>';
					                                                        }
					                                                }
					                                        }
					                                        if ( isset( $item['category'] ) ) {
					                                                $cat = $item['category'];
					                                                
					                                                switch( $cat) {
					                                                        case 'serif':
					                                                                $backup = ' data-backup="serif"';
					                                                                break;
					                                                        case 'sans-serif':
					                                                                $backup = ' data-backup="sans-serif"';
					                                                                break;
					                                                        case 'monospace':
					                                                        	$backup = ' data-backup="monospace"';
					                                                        	break;
					                                                        case 'display':
					                                                        case 'handwriting':
					                                                                $backup = ' data-backup="cursive"';
					                                                                break;
					                                                }
					                                        }
					                                       ?>
					                                     
					                                       <option value="<?php echo $str; ?>"<?php echo $variants . $subsets . $backup; ?> <?php selected($font_family, $str); ?>><?php  echo $str; ?></option>
					                                <?php } ?>
					                        </select>
					                        <select id="font_variant" name="<?php echo LOGINSTYLE_OPTIONS;?>[font_variant]" class="css-select<?php if( $font_variant == '' ) echo ' js-hide'; ?>">
					                                <?php echo $variants_group; ?>
					                        </select>
					                        <select id="font_subset" name="<?php echo LOGINSTYLE_OPTIONS;?>[font_subset]" class="css-select<?php if( $font_subset == '' ) echo ' js-hide'; ?>">
					                                <?php echo $subsets_group; ?>
					                        </select>
					                        <input type="hidden" name="<?php echo LOGINSTYLE_OPTIONS;?>[font_backup]" id="font_backup" value="<?php echo $font_backup; ?>" />
					                </td>
					        </tr>
                                                <tr>
                                                        <th>
                                                                <?php _e('Font Color', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Select the font color for the login form', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
					                        <input type="text" id="font_color" class="alpha-colorpicker" name="<?php echo LOGINSTYLE_OPTIONS;?>[font_color]" value="<?php echo $font_color; ?>" />
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th>
                                                                <?php _e('Link Color', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Select the link color for the login page', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
					                        <input type="text" id="link_color" class="alpha-colorpicker" name="<?php echo LOGINSTYLE_OPTIONS;?>[link_color]" value="<?php echo $link_color; ?>" />
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th>
                                                                <?php _e('Link Hover Color', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Select the hover link color for the login page', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
					                        <input type="text" id="link_hover_color" class="alpha-colorpicker" name="<?php echo LOGINSTYLE_OPTIONS;?>[link_hover_color]" value="<?php echo $link_hover_color; ?>" />
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th>
                                                                <?php _e('Login Redirect URL', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('The URL to redirect to after logging in. The default link is the Dashboard.', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
					                        <input type="text" id="login_redirect" name="<?php echo LOGINSTYLE_OPTIONS;?>[login_redirect]" value="<?php echo $login_redirect; ?>" />
					                        <span class="description"><?php _e('Enter a full website, e.g. http://www.mywebsite.com', LOGINSTYLE_SLUG); ?></span>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th>
                                                                <?php _e('Remove Lost Password Link', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Remove the &quot;Lost your password?&quot; link', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                                <input type="hidden" id="lostpassword_off_hidden" name="<?php echo LOGINSTYLE_OPTIONS;?>[lostpassword_off]" value="0" />
                                                                <input type="checkbox" id="lostpassword_off" name="<?php echo LOGINSTYLE_OPTIONS;?>[lostpassword_off]" value="1" <?php checked('1', $lostpassword_off); ?> />
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th>
                                                                <?php _e('Remove Back To Link', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Remove the &quot;Back to&quot; your website link', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                                <input type="hidden" id="backto_off_hidden" name="<?php echo LOGINSTYLE_OPTIONS;?>[backto_off]" value="0" />
                                                                <input type="checkbox" id="backto_off" name="<?php echo LOGINSTYLE_OPTIONS;?>[backto_off]" value="1" <?php checked('1', $backto_off); ?> />
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th>
                                                                <?php _e('Remove Error Shake', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Remove the shake on the login form that alerts the user when there is a login error', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                                <input type="hidden" id="shake_off_hidden" name="<?php echo LOGINSTYLE_OPTIONS;?>[shake_off]" value="0" />
                                                                <input type="checkbox" id="shake_off" name="<?php echo LOGINSTYLE_OPTIONS;?>[shake_off]" value="1" <?php checked('1', $shake_off); ?> />
                                                        </td>
                                                </tr>
                                        </table>
                                </div>
                                <div class="admin-section">
                                        <table class="form-table wide-th">
                                                <tr>
                                                        <th>
                                                        	<?php _e('Deactivation Deletes Data', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('If this option is checked, all saved settings will be deleted when the plugin is deactivated and deleted. It is recommended to be disabled.', LOGINSTYLE_SLUG); ?>"></a>
                                                	</th>
                                                        <td>
                                                                <input type="hidden" id="deactivate_deletes_data_hidden" name="<?php echo LOGINSTYLE_OPTIONS;?>[deactivate_deletes_data]" value="0" />
                                                                <input type="checkbox" id="deactivate_deletes_data" name="<?php echo LOGINSTYLE_OPTIONS;?>[deactivate_deletes_data]" value="1" <?php checked('1', $deactivate_deletes_data); ?> />
                                                        </td>
                                                </tr>
                                        </table>
                                </div>
                        </div>
                        <div id="tabs-background">
                                <div class="admin-section">
                                        <h3><strong><?php _e('Background Settings', LOGINSTYLE_SLUG); ?></strong></h3>
                                        <table class="form-table wide-th">
                                                <tr>
                                                        <th>
                                                                <?php _e('Background Style', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Choose the style of the login page background', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<div class="relative inline-block">
	                                                        	<select name="<?php echo LOGINSTYLE_OPTIONS; ?>[background]" class="select-change" id="background">
	                                                        		<option value="color" <?php selected( $background, 'color'); ?>><?php _e('Solid Color Background', LOGINSTYLE_SLUG); ?></option>
	                                                        		<option value="gradient" <?php selected( $background, 'gradient'); ?>><?php _e('Gradient Color Background', LOGINSTYLE_SLUG); ?></option>
	                                                        		<option value="image" <?php selected( $background, 'image'); ?>><?php _e('Image Background', LOGINSTYLE_SLUG); ?></option>
	                                                        		<option value="slide" <?php selected( $background, 'slide'); ?> data-tooltip="<?php _e('Add Unlimited Buttons in the Premium version.', LOGINSTYLE_SLUG); ?>"><?php _e('Slider Background', LOGINSTYLE_SLUG); ?></option>
	                                                        		<option value="video" <?php selected( $background, 'video'); ?>><?php _e('Video Background', LOGINSTYLE_SLUG); ?></option>
	                                                                </select>
	                                                                <span data-check-field="background" data-check-value="background-slide background-video"class="tooltip premium-show<?php if( $background != 'slide' || $background != 'video') echo ' js-hide'; ?>" data-tooltip="<?php _e('Available on Premium Only', LOGINSTYLE_SLUG); ?>"></span>
                                                        	</div>
                                                        </td>
                                                </tr>
                                                <tr<?php if( $background != 'color' ) echo ' class="js-hide"'; ?> data-check-field="background" data-check-value="background-color">
                                                        <th>
                                                                <?php _e('Background Color', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Select a solid background color', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<input type="text" class="alpha-colorpicker" name="<?php echo LOGINSTYLE_OPTIONS;?>[background_color]" id="background_color" value="<?php echo $background_color; ?>" />
                                                        </td>
                                                </tr>
                                                <tr<?php if( $background != 'gradient' ) echo ' class="js-hide"'; ?> data-check-field="background" data-check-value="background-gradient">
                                                        <th>
                                                                <?php _e('Gradient Direction', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Select the direction of the gradient', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<select name="<?php echo LOGINSTYLE_OPTIONS; ?>[gradient_direction]" id="gradient_direction">
                                                        		<option value="top" <?php selected( $gradient_direction, 'top'); ?>><?php _e('From top to bottom', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="left" <?php selected( $gradient_direction, 'left'); ?>><?php _e('From left to right', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="left top" <?php selected( $gradient_direction, 'left top'); ?>><?php _e('From top left to bottom right', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="radial" <?php selected( $gradient_direction, 'radial'); ?>><?php _e('Radial from center to outside', LOGINSTYLE_SLUG); ?></option>
                                                                </select>
                                                        </td>
                                                </tr>
                                                <tr<?php if( $background != 'gradient' ) echo ' class="js-hide"'; ?> data-check-field="background" data-check-value="background-gradient">
                                                        <th>
                                                                <?php _e('Gradient Colors', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Choose the gradient colors to display according to the direction chosen above', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<?php 
                                                        	$from = '<input type="text" class="alpha-colorpicker" name="' . LOGINSTYLE_OPTIONS . '[gradient_from]" id="gradient_from" value="' . $gradient_from . '" />';
                                                        	$to = '<input type="text" class="alpha-colorpicker" name="' . LOGINSTYLE_OPTIONS . '[gradient_to]" id="gradient_to" value="' . $gradient_to . '" />';
                                                        	printf( __( 'From %1$s to %2$s', 'my-text-domain' ), $from, $to );
                                                        	?>
                                                        </td>
                                                </tr>
                                                <tbody<?php if( $background != 'image' ) echo ' class="js-hide"'; ?> data-check-field="background" data-check-value="background-image">
	                                                <tr>
	                                                        <th>
	                                                                <?php _e('Background Image Source', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Upload a background image through the Media Library or enter an absolute or relative URL for the image', LOGINSTYLE_SLUG); ?>"></a>
	                                                        </th>
	                                                        <td>
	                                                        	<select name="<?php echo LOGINSTYLE_OPTIONS; ?>[background_image_source]" id="bk_image_source" class="select-change">
	                                                        		<option value="media" <?php selected( $background_image_source, 'media'); ?>><?php _e('Media Library', LOGINSTYLE_SLUG); ?></option>
	                                                        		<option value="url" <?php selected( $background_image_source, 'url'); ?>><?php _e('URL', LOGINSTYLE_SLUG); ?></option>
	                                                                </select>
	                                                        </td>
	                                                </tr>	
	                                                <tr<?php if( $background_image_source != 'media' ) echo ' class="js-hide"'; ?> data-check-field="bk_image_source" data-check-value="bk_image_source-media">
	                                                        <th>
	                                                                <?php _e('Background Image', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Upload or select a background image from the Media Library', LOGINSTYLE_SLUG); ?>"></a>
	                                                        </th>
	                                                        <td>
	                                                        	<ul class="image-preview">
	                                                                        <?php if ($background_image != ''): ?>
	                                                                                <li id="background_image_upload">
	                                                                                        <a href="<?php echo get_edit_post_link( $background_image ); ?>" target="_blank"><?php echo wp_get_attachment_image( $background_image, 'full' ); ?></a>
	                                                                                        <a href="javascript:;" id="delete-background_image_upload" class="cmb-button small-button delete-media" data-input-name="background_image">&times;</a>
	                                                					<input type="hidden" name="<?php echo LOGINSTYLE_OPTIONS;?>[background_image]" id="background_image" value="<?php echo $background_image; ?>" />
	                                                                                </li>
	                                                                        <?php endif; ?>
	                                                                </ul>
	                                                                <div class="uploader clear">
	                                                                        <a id="background_image_upload" href="javascript:;" class="cmb-button default-button upload_image_button<?php if( $background_image != '' ) echo ' js-hide'; ?>" data-lib="image" data-input-name="background_image"><?php _e('Upload', LOGINSTYLE_SLUG); ?></a>
	                                                                </div>
	                                                        </td>
	                                                </tr>
	                                                <tr<?php if( $background_image_source != 'url' ) echo ' class="js-hide"'; ?> data-check-field="bk_image_source" data-check-value="bk_image_source-url">
	                                                        <th>
	                                                                <?php _e('Background Image URL', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Enter an absolute URL or a URL relative to the current site address for the background image. You can find the site address under Settings > General > Site Address.', LOGINSTYLE_SLUG); ?>"></a>
	                                                        </th>
	                                                        <td>
	                                                        	<input type="text" name="<?php echo LOGINSTYLE_OPTIONS;?>[background_image_url]" id="background_image_url" value="<?php echo $background_image_url; ?>" />
	                                                        </td>
	                                                </tr>
	                                                <tr>
	                                                        <th>
	                                                                <?php _e('Background Position', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Select the login page background position or enter a custom position', LOGINSTYLE_SLUG); ?>"></a>
	                                                        </th>
	                                                        <td>
	                                                        	<select name="<?php echo LOGINSTYLE_OPTIONS; ?>[background_position]" class="select-change" id="background_position">
	                                                        		<option value="left top" <?php selected( $background_position, 'left top'); ?>><?php _e('left top', LOGINSTYLE_SLUG); ?></option>
	                                                        		<option value="left center" <?php selected( $background_position, 'left center'); ?>><?php _e('left center', LOGINSTYLE_SLUG); ?></option>
	                                                        		<option value="left bottom" <?php selected( $background_position, 'left bottom'); ?>><?php _e('left bottom', LOGINSTYLE_SLUG); ?></option>
	                                                        		<option value="right top" <?php selected( $background_position, 'right top'); ?>><?php _e('right top', LOGINSTYLE_SLUG); ?></option>
	                                                        		<option value="right center" <?php selected( $background_position, 'right center'); ?>><?php _e('right center ', LOGINSTYLE_SLUG); ?></option>
	                                                        		<option value="right bottom" <?php selected( $background_position, 'right bottom'); ?>><?php _e('right bottom ', LOGINSTYLE_SLUG); ?></option>
	                                                        		<option value="center top" <?php selected( $background_position, 'center top'); ?>><?php _e('center top ', LOGINSTYLE_SLUG); ?></option>
	                                                        		<option value="center center" <?php selected( $background_position, 'center center'); ?>><?php _e('center center ', LOGINSTYLE_SLUG); ?></option>
	                                                        		<option value="center bottom" <?php selected( $background_position, 'center bottom'); ?>><?php _e('center bottom ', LOGINSTYLE_SLUG); ?></option>
	                                                        		<option value="custom" <?php selected( $background_position, 'custom'); ?><?php if( $rain != '0' ) echo ' class="js-hide"'; ?> data-check-field="rain" data-check-value="rain-0"><?php _e('Custom Value ', LOGINSTYLE_SLUG); ?></option>
	                                                                </select>
	                                                        </td>
	                                                </tr>
	                                                <tr<?php if( $background_position != 'custom' || $rain == '1' ) echo ' class="js-hide"'; ?> data-check-field="background_position,rain" data-check-value="background_position-custom rain-0">
	                                                        <th>
	                                                                <?php _e('Background Custom Position', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Enter a custom value for the background position, e.g. 10px 20px or 10% 20%', LOGINSTYLE_SLUG); ?>"></a>
	                                                        </th>
	                                                        <td>
	                                                        	<input type="text" name="<?php echo LOGINSTYLE_OPTIONS;?>[background_position_custom]" id="background_position_custom" value="<?php echo $background_position_custom; ?>" />
	                                                        </td>
	                                                </tr>
	                                                <tr>
	                                                        <th>
	                                                                <?php _e('Background Repeat', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Select the login page background repeat value', LOGINSTYLE_SLUG); ?>"></a>
	                                                        </th>
	                                                        <td>
	                                                        	<select name="<?php echo LOGINSTYLE_OPTIONS; ?>[background_repeat]" id="background_repeat" class="select-change">
	                                                        		<option value="repeat" <?php selected( $background_repeat, 'repeat'); ?>><?php _e('Repeat Horizontally and Vertically', LOGINSTYLE_SLUG); ?></option>
	                                                        		<option value="repeat-x" <?php selected( $background_repeat, 'repeat-x'); ?>><?php _e('Repeat Horizontally', LOGINSTYLE_SLUG); ?></option>
	                                                        		<option value="repeat-y" <?php selected( $background_repeat, 'repeat-y'); ?>><?php _e('Repeat Vertically', LOGINSTYLE_SLUG); ?></option>
	                                                        		<option value="no-repeat" <?php selected( $background_repeat, 'no-repeat'); ?>><?php _e('Do Not Repeat', LOGINSTYLE_SLUG); ?></option>
	                                                                </select>
	                                                        </td>
	                                                </tr>
                                                </tbody>
                                        </table>
                                </div>
                                <div class="admin-section">
                                        <h3><strong><?php _e('Background Effects', LOGINSTYLE_SLUG); ?></strong></h3>
                                        <table class="form-table wide-th">
                                                <tr>
                                                        <th>
                                                                <?php _e('Color Overlay', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Add a color overlay layer over background', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                                <input type="hidden" id="color_hidden" name="<?php echo LOGINSTYLE_OPTIONS;?>[color]" value="0" />
                                                                <input type="checkbox" id="color" class="select-change" name="<?php echo LOGINSTYLE_OPTIONS;?>[color]" value="1" <?php checked('1', $color); ?> />
                                                        </td>
                                                </tr>
                                                <tr<?php if( $color != '1' ) echo ' class="js-hide"'; ?> data-check-field="color" data-check-value="color-1">
                                                        <th>
                                                                <?php _e('Color Overlay Color', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Select the color of the color overlay. Supports transparency.', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<input type="text" class="alpha-colorpicker" name="<?php echo LOGINSTYLE_OPTIONS;?>[overlay_color]" id="overlay_color" value="<?php echo $overlay_color; ?>" />
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th>
                                                                <?php _e('Dotted Overlay', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Add a dotted overlay layer over background', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                                <span class="relative"><input type="checkbox" disabled=disabled /><a href="javascript:;" class="tooltip premium-only" data-tooltip="<?php _e('Available on Premium Only', LOGINSTYLE_SLUG); ?>"></a></span>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th>
                                                                <?php _e('Blurry', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Make background image or video blurry', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                                <span class="relative"><input type="checkbox" disabled=disabled /><a href="javascript:;" class="tooltip premium-only" data-tooltip="<?php _e('Available on Premium Only', LOGINSTYLE_SLUG); ?>"></a></span>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th>
                                                                <?php _e('Rain Effect', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Add a raindrop effect on the background image', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                                <span class="relative"><input type="checkbox" disabled=disabled /><a href="javascript:;" class="tooltip premium-only" data-tooltip="<?php _e('Available on Premium Only', LOGINSTYLE_SLUG); ?>"></a></span>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th>
                                                                <?php _e('Interactive Molecules', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Add an interactive molecules layer', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                                <span class="relative"><input type="checkbox" disabled=disabled /><a href="javascript:;" class="tooltip premium-only" data-tooltip="<?php _e('Available on Premium Only', LOGINSTYLE_SLUG); ?>"></a></span>
                                                        </td>
                                                </tr>
                                        </table>
                                </div>
                        </div>
                        <div id="tabs-logo">
                                <div class="admin-section">
                                        <h3><strong><?php _e('Logo Settings', LOGINSTYLE_SLUG); ?></strong></h3>
                                        <table class="form-table wide-th">
                                                <tr>
                                                        <th>
                                                                <?php _e('Logo Style', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Choose to display the default WordPress logo, custom logo or hide the logo', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<select name="<?php echo LOGINSTYLE_OPTIONS; ?>[logo]" class="select-change" id="logo">
                                                        		<option value="default" <?php selected( $logo, 'default'); ?>><?php _e('Default WordPress Logo', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="custom" <?php selected( $logo, 'custom'); ?>><?php _e('Custom Logo Image', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="hidden" <?php selected( $logo, 'hidden'); ?>><?php _e('Hide Logo', LOGINSTYLE_SLUG); ?></option>
                                                                </select>
                                                        </td>
                                                </tr>
                                                <tbody<?php if( $logo != 'custom' ) echo ' class="js-hide"'; ?> data-check-field="logo" data-check-value="logo-custom">
                                                	<tr>
	                                                        <th>
	                                                                <?php _e('Logo Image Source', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Upload a logo through the Media Library or enter an absolute or relative URL for the logo', LOGINSTYLE_SLUG); ?>"></a>
	                                                        </th>
	                                                        <td>
	                                                        	<select name="<?php echo LOGINSTYLE_OPTIONS; ?>[logo_image_source]" id="lg_image_source" class="select-change">
	                                                        		<option value="media" <?php selected( $logo_image_source, 'media'); ?>><?php _e('Media Library', LOGINSTYLE_SLUG); ?></option>
	                                                        		<option value="url" <?php selected( $logo_image_source, 'url'); ?>><?php _e('URL', LOGINSTYLE_SLUG); ?></option>
	                                                                </select>
	                                                        </td>
	                                                </tr>
	                                                <tr<?php if( $logo_image_source != 'media' ) echo ' class="js-hide"'; ?> data-check-field="lg_image_source" data-check-value="lg_image_source-media">
	                                                        <th>
	                                                                <?php _e('Logo Image', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Upload a custom logo image', LOGINSTYLE_SLUG); ?>"></a>
	                                                        </th>
	                                                        <td>
	                                                        	<ul class="image-preview logo-preview">
	                                                                        <?php if ($logo_image != ''): ?>
	                                                                                <li id="logo_image_upload">
	                                                                                        <a href="<?php echo get_edit_post_link( $logo_image ); ?>" target="_blank"><?php echo wp_get_attachment_image( $logo_image, 'full' ); ?></a>
	                                                                                        <a href="javascript:;" id="delete-logo_image_upload" class="cmb-button small-button delete-media" data-input-name="logo_image">&times;</a>
	                                                                                        <input type="hidden" name="<?php echo LOGINSTYLE_OPTIONS;?>[logo_image]" id="logo_image" value="<?php echo $logo_image; ?>" />
	                                                                                </li>
	                                                                        <?php endif; ?>
	                                                                </ul>
	                                                                <div class="uploader clear">
	                                                                        <a id="logo_image_upload" href="javascript:;" class="cmb-button default-button upload_image_button<?php if( $logo_image != '' ) echo ' js-hide'; ?>" data-lib="image" data-input-name="logo_image"><?php _e('Upload', LOGINSTYLE_SLUG); ?></a>
	                                                                </div>
	                                                        </td>
	                                                </tr>
	                                                <tr<?php if( $logo_image_source != 'url' ) echo ' class="js-hide"'; ?> data-check-field="lg_image_source" data-check-value="lg_image_source-url">
	                                                        <th>
	                                                                <?php _e('Logo Image URL', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Enter an absolute URL or a URL relative to the current site address for the logo. You can find the site address under Settings > General > Site Address.', LOGINSTYLE_SLUG); ?>"></a>
	                                                        </th>
	                                                        <td>
	                                                        	<input type="text" name="<?php echo LOGINSTYLE_OPTIONS;?>[logo_image_url]" id="logo_image_url" value="<?php echo $logo_image_url; ?>" />
	                                                        </td>
	                                                </tr>
	                                                <tr>
	                                                        <th>
	                                                                <?php _e('Logo Width', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Set the width of the logo', LOGINSTYLE_SLUG); ?>"></a>
	                                                        </th>
	                                                        <td>
	                                                        	<input type="text" class="input-prefix" name="<?php echo LOGINSTYLE_OPTIONS;?>[logo_width]" id="logo_width" value="<?php echo $logo_width; ?>" /><span class="postfix">px</span>
	                                                        </td>
	                                                </tr>
	                                                <tr>
	                                                        <th>
	                                                                <?php _e('Logo Height', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Set the height of the logo', LOGINSTYLE_SLUG); ?>"></a>
	                                                        </th>
	                                                        <td>
	                                                        	<input type="text" class="input-prefix" name="<?php echo LOGINSTYLE_OPTIONS;?>[logo_height]" id="logo_height" value="<?php echo $logo_height; ?>" /><span class="postfix">px</span>
	                                                        </td>
	                                                </tr>
                                                </tbody>
                                                <tr<?php if( $logo == 'hidden' ) echo ' class="js-hide"'; ?> data-check-field="logo" data-check-value="logo-default logo-custom">
                                                        <th>
                                                                <?php _e('Logo URL', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Input the URL to redirect to when the logo is clicked', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<input type="text" name="<?php echo LOGINSTYLE_OPTIONS;?>[logo_url]" id="logo_url" value="<?php echo $logo_url; ?>" />
                                                        	<span class="description"><?php _e('Enter a full website, e.g. http://www.mywebsite.com', LOGINSTYLE_SLUG); ?></span>
                                                        </td>
                                                </tr>
                                                <tr<?php if( $logo == 'hidden' ) echo ' class="js-hide"'; ?> data-check-field="logo" data-check-value="logo-default logo-custom">
                                                        <th>
                                                                <?php _e('Logo URL Title', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Change the title of the logo URL', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<input type="text" name="<?php echo LOGINSTYLE_OPTIONS;?>[logo_title]" id="logo_title" value="<?php echo $logo_title; ?>" />
                                                        </td>
                                                </tr>
                                                <tr<?php if( $logo == 'hidden' ) echo ' class="js-hide"'; ?> data-check-field="logo" data-check-value="logo-default logo-custom">
                                                        <th>
                                                                <?php _e('Logo Margins', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Set the margins for the logo', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<input type="text" class="input-prefix" placeholder="<?php _e('Top Margin', LOGINSTYLE_SLUG); ?>" name="<?php echo LOGINSTYLE_OPTIONS;?>[logo_top]" id="logo_top" value="<?php echo $logo_top; ?>" /><select class="postfix" name="<?php echo LOGINSTYLE_OPTIONS;?>[logo_top_unit]" id="logo_top_unit">
                                                        		<option value="px" <?php selected( $logo_top_unit, 'px'); ?>><?php _e('px', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="em" <?php selected( $logo_top_unit, 'em'); ?>><?php _e('em', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="rem" <?php selected( $logo_top_unit, 'rem'); ?>><?php _e('rem', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="vw" <?php selected( $logo_top_unit, 'vw'); ?>><?php _e('vw', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="vh" <?php selected( $logo_top_unit, 'vh'); ?>><?php _e('vh', LOGINSTYLE_SLUG); ?></option>
                                                        	</select><br />
                                                        	<input type="text" class="input-prefix" placeholder="<?php _e('Right Margin', LOGINSTYLE_SLUG); ?>" name="<?php echo LOGINSTYLE_OPTIONS;?>[logo_right]" id="logo_top" value="<?php echo $logo_right; ?>" /><select class="postfix" name="<?php echo LOGINSTYLE_OPTIONS;?>[logo_right_unit]" id="logo_right_unit">
                                                        		<option value="px" <?php selected( $logo_right_unit, 'px'); ?>><?php _e('px', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="em" <?php selected( $logo_right_unit, 'em'); ?>><?php _e('em', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="rem" <?php selected( $logo_right_unit, 'rem'); ?>><?php _e('rem', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="vw" <?php selected( $logo_right_unit, 'vw'); ?>><?php _e('vw', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="vh" <?php selected( $logo_right_unit, 'vh'); ?>><?php _e('vh', LOGINSTYLE_SLUG); ?></option>
                                                        	</select><br />
                                                        	<input type="text" class="input-prefix" placeholder="<?php _e('Bottom Margin', LOGINSTYLE_SLUG); ?>" name="<?php echo LOGINSTYLE_OPTIONS;?>[logo_bottom]" id="logo_top" value="<?php echo $logo_bottom; ?>" /><select class="postfix" name="<?php echo LOGINSTYLE_OPTIONS;?>[logo_bottom_unit]" id="logo_bottom_unit">
                                                        		<option value="px" <?php selected( $logo_bottom_unit, 'px'); ?>><?php _e('px', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="em" <?php selected( $logo_bottom_unit, 'em'); ?>><?php _e('em', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="rem" <?php selected( $logo_bottom_unit, 'rem'); ?>><?php _e('rem', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="vw" <?php selected( $logo_bottom_unit, 'vw'); ?>><?php _e('vw', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="vh" <?php selected( $logo_bottom_unit, 'vh'); ?>><?php _e('vh', LOGINSTYLE_SLUG); ?></option>
                                                        	</select><br />
                                                        	<input type="text" class="input-prefix" placeholder="<?php _e('Left Margin', LOGINSTYLE_SLUG); ?>" name="<?php echo LOGINSTYLE_OPTIONS;?>[logo_left]" id="logo_top" value="<?php echo $logo_left; ?>" /><select class="postfix" name="<?php echo LOGINSTYLE_OPTIONS;?>[logo_left_unit]" id="logo_left_unit">
                                                        		<option value="px" <?php selected( $logo_left_unit, 'px'); ?>><?php _e('px', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="em" <?php selected( $logo_left_unit, 'em'); ?>><?php _e('em', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="rem" <?php selected( $logo_left_unit, 'rem'); ?>><?php _e('rem', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="vw" <?php selected( $logo_left_unit, 'vw'); ?>><?php _e('vw', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="vh" <?php selected( $logo_left_unit, 'vh'); ?>><?php _e('vh', LOGINSTYLE_SLUG); ?></option>
                                                        	</select>
                                                        </td>
                                                </tr>
                                        </table>
                                </div>
                        </div>
                        <div id="tabs-form">
                                <div class="admin-section">
                                        <h3><strong><?php _e('Form General Settings', LOGINSTYLE_SLUG); ?></strong></h3>
                                        <table class="form-table wide-th">
                                                <tr>
                                                        <th>
                                                                <?php _e('Form Padding', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Set the padding for the login form', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<input type="text" class="input-prefix" placeholder="<?php _e('Top Padding', LOGINSTYLE_SLUG); ?>" name="<?php echo LOGINSTYLE_OPTIONS;?>[form_padding_top]" id="form_padding_top" value="<?php echo $form_padding_top; ?>" /><select class="postfix" name="<?php echo LOGINSTYLE_OPTIONS;?>[form_padding_top_unit]" id="form_padding_top_unit">
                                                        		<option value="px" <?php selected( $form_padding_top_unit, 'px'); ?>><?php _e('px', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="em" <?php selected( $form_padding_top_unit, 'em'); ?>><?php _e('em', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="rem" <?php selected( $form_padding_top_unit, 'rem'); ?>><?php _e('rem', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="vw" <?php selected( $form_padding_top_unit, 'vw'); ?>><?php _e('vw', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="vh" <?php selected( $form_padding_top_unit, 'vh'); ?>><?php _e('vh', LOGINSTYLE_SLUG); ?></option>
                                                        	</select><br />
                                                        	<input type="text" class="input-prefix" placeholder="<?php _e('Right Padding', LOGINSTYLE_SLUG); ?>" name="<?php echo LOGINSTYLE_OPTIONS;?>[form_padding_right]" id="form_padding_right" value="<?php echo $form_padding_right; ?>" /><select class="postfix" name="<?php echo LOGINSTYLE_OPTIONS;?>[form_padding_right_unit]" id="form_padding_right_unit">
                                                        		<option value="px" <?php selected( $form_padding_right_unit, 'px'); ?>><?php _e('px', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="em" <?php selected( $form_padding_right_unit, 'em'); ?>><?php _e('em', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="rem" <?php selected( $form_padding_right_unit, 'rem'); ?>><?php _e('rem', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="vw" <?php selected( $form_padding_right_unit, 'vw'); ?>><?php _e('vw', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="vh" <?php selected( $form_padding_right_unit, 'vh'); ?>><?php _e('vh', LOGINSTYLE_SLUG); ?></option>
                                                        	</select><br />
                                                        	<input type="text" class="input-prefix" placeholder="<?php _e('Bottom Padding', LOGINSTYLE_SLUG); ?>" name="<?php echo LOGINSTYLE_OPTIONS;?>[form_padding_bottom]" id="form_padding_bottom" value="<?php echo $form_padding_bottom; ?>" /><select class="postfix" name="<?php echo LOGINSTYLE_OPTIONS;?>[form_padding_bottom_unit]" id="form_padding_bottom_unit">
                                                        		<option value="px" <?php selected( $form_padding_bottom_unit, 'px'); ?>><?php _e('px', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="em" <?php selected( $form_padding_bottom_unit, 'em'); ?>><?php _e('em', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="rem" <?php selected( $form_padding_bottom_unit, 'rem'); ?>><?php _e('rem', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="vw" <?php selected( $form_padding_bottom_unit, 'vw'); ?>><?php _e('vw', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="vh" <?php selected( $form_padding_bottom_unit, 'vh'); ?>><?php _e('vh', LOGINSTYLE_SLUG); ?></option>
                                                        	</select><br />
                                                        	<input type="text" class="input-prefix" placeholder="<?php _e('Left Padding', LOGINSTYLE_SLUG); ?>" name="<?php echo LOGINSTYLE_OPTIONS;?>[form_padding_left]" id="form_padding_left" value="<?php echo $form_padding_left; ?>" /><select class="postfix" name="<?php echo LOGINSTYLE_OPTIONS;?>[form_padding_left_unit]" id="form_padding_left_unit">
                                                        		<option value="px" <?php selected( $form_padding_left_unit, 'px'); ?>><?php _e('px', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="em" <?php selected( $form_padding_left_unit, 'em'); ?>><?php _e('em', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="rem" <?php selected( $form_padding_left_unit, 'rem'); ?>><?php _e('rem', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="vw" <?php selected( $form_padding_left_unit, 'vw'); ?>><?php _e('vw', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="vh" <?php selected( $form_padding_left_unit, 'vh'); ?>><?php _e('vh', LOGINSTYLE_SLUG); ?></option>
                                                        	</select>
                                                        </td>
                                                </tr>
                                        </table>
                                </div>
                                <div class="admin-section">
                                        <h3><strong><?php _e('Form Background', LOGINSTYLE_SLUG); ?></strong></h3>
                                        <table class="form-table wide-th">
                                        	<tr>
                                                        <th>
                                                                <?php _e('Form Background Image Source', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Upload a form background image through the Media Library or enter an absolute or relative URL', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<select name="<?php echo LOGINSTYLE_OPTIONS; ?>[form_background_image_source]" id="frm_bg_img_source" class="select-change">
                                                        		<option value="media" <?php selected( $form_background_image_source, 'media'); ?>><?php _e('Media Library', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="url" <?php selected( $form_background_image_source, 'url'); ?>><?php _e('URL', LOGINSTYLE_SLUG); ?></option>
                                                                </select>
                                                        </td>
                                                </tr>
                                        	<tr<?php if( $form_background_image_source != 'media' ) echo ' class="js-hide"'; ?> data-check-field="frm_bg_img_source" data-check-value="frm_bg_img_source-media">
                                                        <th>
                                                                <?php _e('Form Background Image', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Upload a background image for the form (optional)', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<ul class="image-preview">
                                                                        <?php if ($form_background_image != ''): ?>
                                                                                <li id="form_background_image_upload">
                                                                                        <a href="<?php echo get_edit_post_link( $form_background_image ); ?>" target="_blank"><?php echo wp_get_attachment_image( $form_background_image, 'full' ); ?></a>
                                                                                        <a href="javascript:;" id="delete-form_background_image_upload" class="cmb-button small-button delete-media" data-input-name="form_background_image">&times;</a>
                                                                                        <input type="hidden" name="<?php echo LOGINSTYLE_OPTIONS;?>[form_background_image]" id="form_background_image" value="<?php echo $form_background_image; ?>" />
                                                                                </li>
                                                                        <?php endif; ?>
                                                                </ul>
                                                                <div class="uploader clear">
                                                                        <a id="form_background_image_upload" href="javascript:;" class="cmb-button default-button upload_image_button<?php if( $form_background_image != '' ) echo ' js-hide'; ?>" data-lib="image" data-input-name="form_background_image"><?php _e('Upload', LOGINSTYLE_SLUG); ?></a>
                                                                </div>
                                                        </td>
                                                </tr>
                                                <tr<?php if( $form_background_image_source != 'url' ) echo ' class="js-hide"'; ?> data-check-field="frm_bg_img_source" data-check-value="frm_bg_img_source-url">
                                                        <th>
                                                                <?php _e('Form Background Image URL', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Enter an absolute URL or a URL relative to the current site address for the form background image. You can find the site address under Settings > General > Site Address.', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<input type="text" name="<?php echo LOGINSTYLE_OPTIONS;?>[form_background_image_url]" id="form_background_image_url" value="<?php echo $form_background_image_url; ?>" />
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th>
                                                                <?php _e('Form Background Color', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Select a background color for the form. Supports transparent colors.', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<input type="text" class="alpha-colorpicker" name="<?php echo LOGINSTYLE_OPTIONS;?>[form_background_color]" id="form_background_color" value="<?php echo $form_background_color; ?>" />
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th>
                                                                <?php _e('Form Background Position', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Select the login form background position or enter a custom position', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<select name="<?php echo LOGINSTYLE_OPTIONS; ?>[form_background_position]" class="select-change" id="form_background_position">
                                                        		<option value="left top" <?php selected( $form_background_position, 'left top'); ?>><?php _e('left top', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="left center" <?php selected( $form_background_position, 'left center'); ?>><?php _e('left center', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="left bottom" <?php selected( $form_background_position, 'left bottom'); ?>><?php _e('left bottom', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="right top" <?php selected( $form_background_position, 'right top'); ?>><?php _e('right top', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="right center" <?php selected( $form_background_position, 'right center'); ?>><?php _e('right center ', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="right bottom" <?php selected( $form_background_position, 'right bottom'); ?>><?php _e('right bottom ', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="center top" <?php selected( $form_background_position, 'center top'); ?>><?php _e('center top ', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="center center" <?php selected( $form_background_position, 'center center'); ?>><?php _e('center center ', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="center bottom" <?php selected( $form_background_position, 'center bottom'); ?>><?php _e('center bottom ', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="custom" <?php selected( $form_background_position, 'custom'); ?>><?php _e('Custom Value ', LOGINSTYLE_SLUG); ?></option>
                                                                </select>
                                                        </td>
                                                </tr>
                                                <tr<?php if( $form_background_position != 'custom' ) echo ' class="js-hide"'; ?> data-check-field="form_background_position" data-check-value="form_background_position-custom">
                                                        <th>
                                                                <?php _e('Form Background Custom Position', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Enter a custom value for the login form background position, e.g. 10px 20px or 10% 20%', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<input type="text" name="<?php echo LOGINSTYLE_OPTIONS;?>[form_background_position_custom]" id="form_background_position_custom" value="<?php echo $form_background_position_custom; ?>" />
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th>
                                                                <?php _e('Form Background Repeat', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Select the login form background repeat value', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<select name="<?php echo LOGINSTYLE_OPTIONS; ?>[form_background_repeat]" id="form_background_repeat">
                                                        		<option value="repeat" <?php selected( $form_background_repeat, 'repeat'); ?>><?php _e('Repeat Horizontally and Vertically', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="repeat-x" <?php selected( $form_background_repeat, 'repeat-x'); ?>><?php _e('Repeat Horizontally', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="repeat-y" <?php selected( $form_background_repeat, 'repeat-y'); ?>><?php _e('Repeat Vertically', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="no-repeat" <?php selected( $form_background_repeat, 'no-repeat'); ?>><?php _e('Do Not Repeat', LOGINSTYLE_SLUG); ?></option>
                                                                </select>
                                                        </td>
                                                </tr>
                                        </table>
                                </div>
                                <div class="admin-section">
                                        <h3><strong><?php _e('Form Border', LOGINSTYLE_SLUG); ?></strong></h3>
                                        <table class="form-table wide-th">
                                                <tr>
                                                        <th>
                                                                <?php _e('Form Border Style', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Set the style of the login form border', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<select name="<?php echo LOGINSTYLE_OPTIONS; ?>[form_border_style]" id="form_border_style" class="select-change">
                                                        		<option value="none" <?php selected( $form_border_style, 'none'); ?>><?php _e('No Border', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="dotted" <?php selected( $form_border_style, 'dotted'); ?>><?php _e('Dotted Border', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="dashed" <?php selected( $form_border_style, 'dashed'); ?>><?php _e('Dashed Border', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="solid" <?php selected( $form_border_style, 'solid'); ?>><?php _e('Solid Border', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="double" <?php selected( $form_border_style, 'double'); ?>><?php _e('Double Border', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="groove" <?php selected( $form_border_style, 'groove'); ?>><?php _e('3D Grovved Border', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="ridge" <?php selected( $form_border_style, 'ridge'); ?>><?php _e('3D Ridged Border', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="inset" <?php selected( $form_border_style, 'inset'); ?>><?php _e('3D Inset Border', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="outset" <?php selected( $form_border_style, 'outset'); ?>><?php _e('3D Outset Border', LOGINSTYLE_SLUG); ?></option>
                                                                </select>
                                                        </td>
                                                </tr>
                                                <tr<?php if( $form_border_style == 'none' ) echo ' class="js-hide"'; ?> data-check-field="form_border_style" data-check-value="form_border_style-dotted form_border_style-dashed form_border_style-solid form_border_style-double form_border_style-groove form_border_style-ridge form_border_style-inset form_border_style-outset">
                                                        <th>
                                                                <?php _e('Form Border Size', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Set the width of the login form border', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<input type="text" class="input-prefix" name="<?php echo LOGINSTYLE_OPTIONS;?>[form_border_width]" id="form_border_width" value="<?php echo $form_border_width; ?>" /><span class="postfix">px</span>
                                                        </td>
                                                </tr>
                                                <tr<?php if( $form_border_style == 'none' ) echo ' class="js-hide"'; ?> data-check-field="form_border_style" data-check-value="form_border_style-dotted form_border_style-dashed form_border_style-solid form_border_style-double form_border_style-groove form_border_style-ridge form_border_style-inset form_border_style-outset">
                                                        <th>
                                                                <?php _e('Form Border Color', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Select a color for the login form border', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<input type="text" class="alpha-colorpicker" name="<?php echo LOGINSTYLE_OPTIONS;?>[form_border_color]" id="form_border_color" value="<?php echo $form_border_color; ?>" />
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th>
                                                                <?php _e('Form Border Radius', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Set the radius of the login form border', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<input type="text" class="input-prefix" name="<?php echo LOGINSTYLE_OPTIONS;?>[form_border_radius]" id="form_border_radius" value="<?php echo $form_border_radius; ?>" /><span class="postfix">px</span>
                                                        </td>
                                                </tr>
                                        </table>
                                </div>
                        </div>
                        <div id="tabs-input">
                                <div class="admin-section">
                                        <h3><strong><?php _e('Input Labels', LOGINSTYLE_SLUG); ?></strong></h3>
                                        <table class="form-table wide-th">
                                                <tr>
                                                        <th>
                                                                <?php _e('Show Username Label', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Uncheck the box to hide the Username label', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                                <input type="hidden" id="input_show_username_label_hidden" name="<?php echo LOGINSTYLE_OPTIONS;?>[input_show_username_label]" value="0" />
                                                                <input type="checkbox" class="select-change" id="input_show_username_label" name="<?php echo LOGINSTYLE_OPTIONS;?>[input_show_username_label]" value="1" <?php checked('1', $input_show_username_label); ?> />
                                                        </td>
                                                </tr>
                                                <tr<?php if( $input_show_username_label != '1' ) echo ' class="js-hide"'; ?> data-check-field="input_show_username_label" data-check-value="input_show_username_label-1">
                                                        <th>
                                                                <?php _e('Username Label', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Change the username label. The default value is &quot;Username&quot;.', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<input type="text" name="<?php echo LOGINSTYLE_OPTIONS;?>[input_username_label]" id="input_username_label" value="<?php echo $input_username_label; ?>" />
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th>
                                                                <?php _e('Username Placeholder', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Edit the Username field placeholder', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<input type="text" name="<?php echo LOGINSTYLE_OPTIONS;?>[input_username_placeholder]" id="input_username_placeholder" value="<?php echo $input_username_placeholder; ?>" />
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th>
                                                                <?php _e('Show Password Label', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Uncheck the box to hide the Password label', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                                <input type="hidden" id="input_show_password_label_hidden" name="<?php echo LOGINSTYLE_OPTIONS;?>[input_show_password_label]" value="0" />
                                                                <input type="checkbox" class="select-change" id="input_show_password_label" name="<?php echo LOGINSTYLE_OPTIONS;?>[input_show_password_label]" value="1" <?php checked('1', $input_show_password_label); ?> />
                                                        </td>
                                                </tr>
                                                <tr<?php if( $input_show_password_label != '1' ) echo ' class="js-hide"'; ?> data-check-field="input_show_password_label" data-check-value="input_show_password_label-1">
                                                        <th>
                                                                <?php _e('Password Label', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Change the password label. The default value is &quot;Password&quot;.', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<input type="text" name="<?php echo LOGINSTYLE_OPTIONS;?>[input_password_label]" id="input_password_label" value="<?php echo $input_password_label; ?>" />
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th>
                                                                <?php _e('Password Placeholder', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Edit the Password field placeholder', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<input type="text" name="<?php echo LOGINSTYLE_OPTIONS;?>[input_password_placeholder]" id="input_password_placeholder" value="<?php echo $input_password_placeholder; ?>" />
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th>
                                                                <?php _e('Input Text Alignment', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Set the vertical alignment of the input texts', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<select name="<?php echo LOGINSTYLE_OPTIONS; ?>[input_align]" id="input_align">
                                                        		<option value="left" <?php selected( $input_align, 'left'); ?>><?php _e('Left Align', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="center" <?php selected( $input_align, 'center'); ?>><?php _e('Center Align', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="right" <?php selected( $input_align, 'right'); ?>><?php _e('Right Align', LOGINSTYLE_SLUG); ?></option>
                                                                </select>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th>
                                                                <?php _e('Input Label Color', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Select the color for the labels of the username, password and remember me fields', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<input type="text" class="alpha-colorpicker" name="<?php echo LOGINSTYLE_OPTIONS;?>[input_label_color]" id="input_label_color" value="<?php echo $input_label_color; ?>" />
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th>
                                                                <?php _e('Input Font Color', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Select the color for typed in text of the username and password fields', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<input type="text" class="alpha-colorpicker" name="<?php echo LOGINSTYLE_OPTIONS;?>[input_font_color]" id="input_font_color" value="<?php echo $input_font_color; ?>" />
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th>
                                                                <?php _e('Placeholder Color', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Select the color for the input placeholders. Supported in all major browsers and Internet Explorer 10 or later.', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<input type="text" class="alpha-colorpicker" name="<?php echo LOGINSTYLE_OPTIONS;?>[placeholder_color]" id="placeholder_color" value="<?php echo $placeholder_color; ?>" />
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th>
                                                                <?php _e('Input Font Size', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Set the font size for the username and password input', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<input type="text" class="input-prefix" name="<?php echo LOGINSTYLE_OPTIONS;?>[input_font_size]" id="input_font_size" value="<?php echo $input_font_size; ?>" /><span class="postfix">px</span>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th>
                                                                <?php _e('Input Padding', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Set the padding for the input fields', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<input type="text" class="input-prefix" placeholder="<?php _e('Top Padding', LOGINSTYLE_SLUG); ?>" name="<?php echo LOGINSTYLE_OPTIONS;?>[input_padding_top]" id="input_padding_top" value="<?php echo $input_padding_top; ?>" /><select class="postfix" name="<?php echo LOGINSTYLE_OPTIONS;?>[input_padding_top_unit]" id="input_padding_top_unit">
                                                        		<option value="px" <?php selected( $input_padding_top_unit, 'px'); ?>><?php _e('px', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="em" <?php selected( $input_padding_top_unit, 'em'); ?>><?php _e('em', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="rem" <?php selected( $input_padding_top_unit, 'rem'); ?>><?php _e('rem', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="vw" <?php selected( $input_padding_top_unit, 'vw'); ?>><?php _e('vw', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="vh" <?php selected( $input_padding_top_unit, 'vh'); ?>><?php _e('vh', LOGINSTYLE_SLUG); ?></option>
                                                        	</select><br />
                                                        	<input type="text" class="input-prefix" placeholder="<?php _e('Right Padding', LOGINSTYLE_SLUG); ?>" name="<?php echo LOGINSTYLE_OPTIONS;?>[input_padding_right]" id="input_padding_right" value="<?php echo $input_padding_right; ?>" /><select class="postfix" name="<?php echo LOGINSTYLE_OPTIONS;?>[input_padding_right_unit]" id="input_padding_right_unit">
                                                        		<option value="px" <?php selected( $input_padding_right_unit, 'px'); ?>><?php _e('px', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="em" <?php selected( $input_padding_right_unit, 'em'); ?>><?php _e('em', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="rem" <?php selected( $input_padding_right_unit, 'rem'); ?>><?php _e('rem', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="vw" <?php selected( $input_padding_right_unit, 'vw'); ?>><?php _e('vw', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="vh" <?php selected( $input_padding_right_unit, 'vh'); ?>><?php _e('vh', LOGINSTYLE_SLUG); ?></option>
                                                        	</select><br />
                                                        	<input type="text" class="input-prefix" placeholder="<?php _e('Bottom Padding', LOGINSTYLE_SLUG); ?>" name="<?php echo LOGINSTYLE_OPTIONS;?>[input_padding_bottom]" id="input_padding_bottom" value="<?php echo $input_padding_bottom; ?>" /><select class="postfix" name="<?php echo LOGINSTYLE_OPTIONS;?>[input_padding_bottom_unit]" id="input_padding_bottom_unit">
                                                        		<option value="px" <?php selected( $input_padding_bottom_unit, 'px'); ?>><?php _e('px', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="em" <?php selected( $input_padding_bottom_unit, 'em'); ?>><?php _e('em', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="rem" <?php selected( $input_padding_bottom_unit, 'rem'); ?>><?php _e('rem', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="vw" <?php selected( $input_padding_bottom_unit, 'vw'); ?>><?php _e('vw', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="vh" <?php selected( $input_padding_bottom_unit, 'vh'); ?>><?php _e('vh', LOGINSTYLE_SLUG); ?></option>
                                                        	</select><br />
                                                        	<input type="text" class="input-prefix" placeholder="<?php _e('Left Padding', LOGINSTYLE_SLUG); ?>" name="<?php echo LOGINSTYLE_OPTIONS;?>[input_padding_left]" id="input_padding_left" value="<?php echo $input_padding_left; ?>" /><select class="postfix" name="<?php echo LOGINSTYLE_OPTIONS;?>[input_padding_left_unit]" id="input_padding_left_unit">
                                                        		<option value="px" <?php selected( $input_padding_left_unit, 'px'); ?>><?php _e('px', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="em" <?php selected( $input_padding_left_unit, 'em'); ?>><?php _e('em', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="rem" <?php selected( $input_padding_left_unit, 'rem'); ?>><?php _e('rem', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="vw" <?php selected( $input_padding_left_unit, 'vw'); ?>><?php _e('vw', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="vh" <?php selected( $input_padding_left_unit, 'vh'); ?>><?php _e('vh', LOGINSTYLE_SLUG); ?></option>
                                                        	</select>
                                                        </td>
                                                </tr>
                                        </table>
                                </div>
                                <div class="admin-section">
                                        <h3><strong><?php _e('Input Background & Border', LOGINSTYLE_SLUG); ?></strong></h3>
                                        <table class="form-table wide-th">
                                                <tr>
                                                        <th>
                                                                <?php _e('Input Background Color', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Select the color for the input background', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<input type="text" class="alpha-colorpicker" name="<?php echo LOGINSTYLE_OPTIONS;?>[input_background_color]" id="input_background_color" value="<?php echo $input_background_color; ?>" />
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th>
                                                                <?php _e('Input Border Style', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Set the style of the input fields border', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<select name="<?php echo LOGINSTYLE_OPTIONS; ?>[input_border_style]" id="input_border_style" class="select-change">
                                                        		<option value="none" <?php selected( $input_border_style, 'none'); ?>><?php _e('No Border', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="dotted" <?php selected( $input_border_style, 'dotted'); ?>><?php _e('Dotted Border', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="dashed" <?php selected( $input_border_style, 'dashed'); ?>><?php _e('Dashed Border', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="solid" <?php selected( $input_border_style, 'solid'); ?>><?php _e('Solid Border', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="double" <?php selected( $input_border_style, 'double'); ?>><?php _e('Double Border', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="groove" <?php selected( $input_border_style, 'groove'); ?>><?php _e('3D Grovved Border', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="ridge" <?php selected( $input_border_style, 'ridge'); ?>><?php _e('3D Ridged Border', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="inset" <?php selected( $input_border_style, 'inset'); ?>><?php _e('3D Inset Border', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="outset" <?php selected( $input_border_style, 'outset'); ?>><?php _e('3D Outset Border', LOGINSTYLE_SLUG); ?></option>
                                                                </select>
                                                        </td>
                                                </tr>
                                                <tr<?php if( $input_border_style == 'none' ) echo ' class="js-hide"'; ?> data-check-field="input_border_style" data-check-value="input_border_style-dotted input_border_style-dashed input_border_style-solid input_border_style-double input_border_style-groove input_border_style-ridge input_border_style-inset input_border_style-outset">
                                                        <th>
                                                                <?php _e('Input Border Size', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Set the width of the input fields border', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<input type="text" class="input-prefix" placeholder="<?php _e('Top Border', LOGINSTYLE_SLUG); ?>" name="<?php echo LOGINSTYLE_OPTIONS;?>[input_border_top_width]" id="input_border_top_width" value="<?php echo $input_border_top_width; ?>" /><span class="postfix">px</span><br />
                                                        	<input type="text" class="input-prefix" placeholder="<?php _e('Right Border', LOGINSTYLE_SLUG); ?>" name="<?php echo LOGINSTYLE_OPTIONS;?>[input_border_right_width]" id="input_border_right_width" value="<?php echo $input_border_right_width; ?>" /><span class="postfix">px</span><br />
                                                        	<input type="text" class="input-prefix" placeholder="<?php _e('Bottom Border', LOGINSTYLE_SLUG); ?>" name="<?php echo LOGINSTYLE_OPTIONS;?>[input_border_bottom_width]" id="input_border_bottom_width" value="<?php echo $input_border_bottom_width; ?>" /><span class="postfix">px</span><br />
                                                        	<input type="text" class="input-prefix" placeholder="<?php _e('Left Border', LOGINSTYLE_SLUG); ?>" name="<?php echo LOGINSTYLE_OPTIONS;?>[input_border_left_width]" id="input_border_left_width" value="<?php echo $input_border_left_width; ?>" /><span class="postfix">px</span>
                                                        </td>
                                                </tr>
                                                <tr<?php if( $input_border_style == 'none' ) echo ' class="js-hide"'; ?> data-check-field="input_border_style" data-check-value="input_border_style-dotted input_border_style-dashed input_border_style-solid input_border_style-double input_border_style-groove input_border_style-ridge input_border_style-inset input_border_style-outset">
                                                        <th>
                                                                <?php _e('Input Border Color', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Select the color for the input border', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<input type="text" class="alpha-colorpicker" name="<?php echo LOGINSTYLE_OPTIONS;?>[input_border_color]" id="input_border_color" value="<?php echo $input_border_color; ?>" />
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th>
                                                                <?php _e('Input Border Radius', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Set the radius of the input border', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<input type="text" class="input-prefix" name="<?php echo LOGINSTYLE_OPTIONS;?>[input_border_radius]" id="input_border_radius" value="<?php echo $input_border_radius; ?>" /><span class="postfix">px</span>
                                                        </td>
                                                </tr>
                                        </table>
                                </div>
                                <div class="admin-section">
                                        <h3><strong><?php _e('Input Icons', LOGINSTYLE_SLUG); ?></strong></h3>
                                        <table class="form-table wide-th">
                                                <tr>
                                                        <th>
                                                                <?php _e('Show Icons on Input Fields', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Choose whether to show icons on Username and Passowrd input fields', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                                <input type="hidden" id="input_show_icon_hidden" name="<?php echo LOGINSTYLE_OPTIONS;?>[input_show_icon]" value="0" />
                                                                <input type="checkbox" class="select-change" id="input_show_icon" name="<?php echo LOGINSTYLE_OPTIONS;?>[input_show_icon]" value="1" <?php checked('1', $input_show_icon); ?> />
                                                        </td>
                                                </tr>
                                                <tbody<?php if( $input_show_icon != '1' ) echo ' class="js-hide"'; ?> data-check-field="input_show_icon" data-check-value="input_show_icon-1">
	                                                <tr>
	                                                        <th>
	                                                                <?php _e('Username Input Icon', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Select the icon for the username field', LOGINSTYLE_SLUG); ?>"></a>
	                                                        </th>
	                                                        <td>
	                                                        	<select name="<?php echo LOGINSTYLE_OPTIONS; ?>[username_icon]" id="username_icon" class="icon-picker">
	                                                        		<option value="loginicon-user3" <?php selected( $username_icon, 'loginicon-user3' ); ?>>loginicon-user3</option>
	                                                        		<option value="loginicon-user11" <?php selected( $username_icon, 'loginicon-user11' ); ?>>loginicon-user11</option>
	                                                                </select>
	                                                        </td>
	                                                </tr>
	                                                <tr>
	                                                        <th>
	                                                                <?php _e('Password Input Icon', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Select the icon for the password field', LOGINSTYLE_SLUG); ?>"></a>
	                                                        </th>
	                                                        <td>
	                                                        	<select name="<?php echo LOGINSTYLE_OPTIONS; ?>[password_icon]" id="password_icon" class="icon-picker">
	                                                        		<option value="loginicon-key7" <?php selected( $password_icon, 'loginicon-key7' ); ?>>loginicon-key7</option>
	                                                        		<option value="loginicon-key8" <?php selected( $password_icon, 'loginicon-key8' ); ?>>loginicon-key8</option>
	                                                                </select>
	                                                        </td>
	                                                </tr>
	                                                <tr>
	                                                        <th>
	                                                                <?php _e('Icon Position', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Select whether to place the icon on the left or right hand side of the input fields', LOGINSTYLE_SLUG); ?>"></a>
	                                                        </th>
	                                                        <td>
	                                                        	<select name="<?php echo LOGINSTYLE_OPTIONS; ?>[input_icon_position]" id="input_icon_position">
	                                                        		<option value="left" <?php selected( $input_icon_position, 'left' ); ?>><?php _e('Left Side', LOGINSTYLE_SLUG); ?></option>
	                                                        		<option value="right" <?php selected( $input_icon_position, 'right' ); ?>><?php _e('Right Side', LOGINSTYLE_SLUG); ?></option>
	                                                                </select>
	                                                        </td>
	                                                </tr>
	                                                <tr>
	                                                        <th>
	                                                                <?php _e('Icon Alignment', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Align the icon within the icon container on the left, center or right hand side', LOGINSTYLE_SLUG); ?>"></a>
	                                                        </th>
	                                                        <td>
	                                                        	<select name="<?php echo LOGINSTYLE_OPTIONS; ?>[input_icon_align]" id="input_icon_align">
	                                                        		<option value="left" <?php selected( $input_icon_align, 'left' ); ?>><?php _e('Align Left', LOGINSTYLE_SLUG); ?></option>
	                                                        		<option value="center" <?php selected( $input_icon_align, 'center' ); ?>><?php _e('Align Center', LOGINSTYLE_SLUG); ?></option>
	                                                        		<option value="right" <?php selected( $input_icon_align, 'right' ); ?>><?php _e('Align Right', LOGINSTYLE_SLUG); ?></option>
	                                                                </select>
	                                                        </td>
	                                                </tr>
	                                                <tr>
	                                                        <th>
	                                                                <?php _e('Icon Font Color', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Select a color for the input icons', LOGINSTYLE_SLUG); ?>"></a>
	                                                        </th>
	                                                        <td>
	                                                        	<input type="text" class="alpha-colorpicker" name="<?php echo LOGINSTYLE_OPTIONS;?>[input_icon_font_color]" id="input_icon_font_color" value="<?php echo $input_icon_font_color; ?>" />
	                                                        </td>
	                                                </tr>
	                                                <tr>
	                                                        <th>
	                                                                <?php _e('Icon Background Color', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Select a color for the icon background. Leave it blank for a transparent background.', LOGINSTYLE_SLUG); ?>"></a>
	                                                        </th>
	                                                        <td>
	                                                        	<input type="text" class="alpha-colorpicker" name="<?php echo LOGINSTYLE_OPTIONS;?>[input_icon_background_color]" id="input_icon_background_color" value="<?php echo $input_icon_background_color; ?>" />
	                                                        </td>
	                                                </tr>
	                                                <tr>
	                                                        <th>
	                                                                <?php _e('Icon Border Color', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Select a color for the icon border', LOGINSTYLE_SLUG); ?>"></a>
	                                                        </th>
	                                                        <td>
	                                                        	<input type="text" class="alpha-colorpicker" name="<?php echo LOGINSTYLE_OPTIONS;?>[input_icon_border_color]" id="input_icon_border_color" value="<?php echo $input_icon_border_color; ?>" />
	                                                        </td>
	                                                </tr>
	                                                <tr>
	                                                        <th>
	                                                                <?php _e('Icon Border Size', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Set the width of the icon border. Leave it blank for no borders.', LOGINSTYLE_SLUG); ?>"></a>
	                                                        </th>
	                                                        <td>
	                                                        	<input type="text" class="input-prefix" name="<?php echo LOGINSTYLE_OPTIONS;?>[input_icon_border_width]" id="input_icon_border_width" value="<?php echo $input_icon_border_width; ?>" /><span class="postfix">px</span>
	                                                        </td>
	                                                </tr>
	                                                <tr>
	                                                        <th>
	                                                                <?php _e('Icon Container Width', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Set the width of the icon container.', LOGINSTYLE_SLUG); ?>"></a>
	                                                        </th>
	                                                        <td>
	                                                        	<input type="text" class="input-prefix" name="<?php echo LOGINSTYLE_OPTIONS;?>[input_icon_width]" id="input_icon_width" value="<?php echo $input_icon_width; ?>" /><span class="postfix">px</span>
	                                                        </td>
	                                                </tr>
                                                </tbody>
                                        </table>
                                </div>
                                <div class="admin-section">
                                        <h3><strong><?php _e('Remember Me Settings', LOGINSTYLE_SLUG); ?></strong></h3>
                                        <table class="form-table wide-th">
                                                <tr>
                                                        <th>
                                                                <?php _e('Remember Me Checked By Default', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Check the Remember Me checkbox by default', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                                <input type="hidden" id="rememberme_on_hidden" name="<?php echo LOGINSTYLE_OPTIONS;?>[rememberme_on]" value="0" />
                                                                <input type="checkbox" id="rememberme_on" name="<?php echo LOGINSTYLE_OPTIONS;?>[rememberme_on]" value="1" <?php checked('1', $rememberme_on); ?> />
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th>
                                                                <?php _e('Remember Me Label', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Change the remember me label. The default value is &quot;Remember Me&quot;.', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<input type="text" name="<?php echo LOGINSTYLE_OPTIONS;?>[input_rememberme_label]" id="input_rememberme_label" value="<?php echo $input_rememberme_label; ?>" />
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th>
                                                                <?php _e('Checkbox Label Color', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Select the color for the checkbox label', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<input type="text" class="alpha-colorpicker" name="<?php echo LOGINSTYLE_OPTIONS;?>[checkbox_label_color]" id="checkbox_label_color" value="<?php echo $checkbox_label_color; ?>" />
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th>
                                                                <?php _e('Checkbox Background Color', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Select the color for the checkbox background', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<input type="text" class="alpha-colorpicker" name="<?php echo LOGINSTYLE_OPTIONS;?>[checkbox_background_color]" id="checkbox_background_color" value="<?php echo $checkbox_background_color; ?>" />
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th>
                                                                <?php _e('Checkbox Check Color', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Select the color for the checkbox check', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<input type="text" class="alpha-colorpicker" name="<?php echo LOGINSTYLE_OPTIONS;?>[checkbox_check_color]" id="checkbox_check_color" value="<?php echo $checkbox_check_color; ?>" />
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th>
                                                                <?php _e('Checkbox Border Color', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Select the color for the checkbox border', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<input type="text" class="alpha-colorpicker" name="<?php echo LOGINSTYLE_OPTIONS;?>[checkbox_border_color]" id="checkbox_border_color" value="<?php echo $checkbox_border_color; ?>" />
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th>
                                                                <?php _e('Checkbox Border Radius', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Set the radius of the checkbox border', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<input type="text" class="input-prefix" name="<?php echo LOGINSTYLE_OPTIONS;?>[checkbox_border_radius]" id="checkbox_border_radius" value="<?php echo $checkbox_border_radius; ?>" /><span class="postfix">px</span>
                                                        </td>
                                                </tr>
                                        </table>
                                </div>
                        </div>
                        <div id="tabs-submit">
                                <div class="admin-section">
                                        <h3><strong><?php _e('Submit Button General Settings', LOGINSTYLE_SLUG); ?></strong><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Pending Status is triggered when a customer makes a booking but haven\'t paid the required deposit yet.', LOGINSTYLE_SLUG); ?>"></a></h3>
                                        <table class="form-table wide-th">
                                                <tr>
                                                        <th>
                                                                <?php _e('Submit Button Label', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Change the submit button label. The default value is &quot;Log In&quot;.', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<input type="text" name="<?php echo LOGINSTYLE_OPTIONS;?>[submit_label]" id="submit_label" value="<?php echo $submit_label; ?>" />
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th>
                                                                <?php _e('Submit Button Padding', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Set the padding for the submit button', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<input type="text" class="input-prefix" placeholder="<?php _e('Top Padding', LOGINSTYLE_SLUG); ?>" name="<?php echo LOGINSTYLE_OPTIONS;?>[submit_padding_top]" id="submit_padding_top" value="<?php echo $submit_padding_top; ?>" /><select class="postfix" name="<?php echo LOGINSTYLE_OPTIONS;?>[submit_padding_top_unit]" id="submit_padding_top_unit">
                                                        		<option value="px" <?php selected( $submit_padding_top_unit, 'px'); ?>><?php _e('px', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="em" <?php selected( $submit_padding_top_unit, 'em'); ?>><?php _e('em', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="rem" <?php selected( $submit_padding_top_unit, 'rem'); ?>><?php _e('rem', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="vw" <?php selected( $submit_padding_top_unit, 'vw'); ?>><?php _e('vw', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="vh" <?php selected( $submit_padding_top_unit, 'vh'); ?>><?php _e('vh', LOGINSTYLE_SLUG); ?></option>
                                                        	</select><br />
                                                        	<input type="text" class="input-prefix" placeholder="<?php _e('Right Padding', LOGINSTYLE_SLUG); ?>" name="<?php echo LOGINSTYLE_OPTIONS;?>[submit_padding_right]" id="submit_padding_right" value="<?php echo $submit_padding_right; ?>" /><select class="postfix" name="<?php echo LOGINSTYLE_OPTIONS;?>[submit_padding_right_unit]" id="submit_padding_right_unit">
                                                        		<option value="px" <?php selected( $submit_padding_right_unit, 'px'); ?>><?php _e('px', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="em" <?php selected( $submit_padding_right_unit, 'em'); ?>><?php _e('em', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="rem" <?php selected( $submit_padding_right_unit, 'rem'); ?>><?php _e('rem', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="vw" <?php selected( $submit_padding_right_unit, 'vw'); ?>><?php _e('vw', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="vh" <?php selected( $submit_padding_right_unit, 'vh'); ?>><?php _e('vh', LOGINSTYLE_SLUG); ?></option>
                                                        	</select><br />
                                                        	<input type="text" class="input-prefix" placeholder="<?php _e('Bottom Padding', LOGINSTYLE_SLUG); ?>" name="<?php echo LOGINSTYLE_OPTIONS;?>[submit_padding_bottom]" id="submit_padding_bottom" value="<?php echo $submit_padding_bottom; ?>" /><select class="postfix" name="<?php echo LOGINSTYLE_OPTIONS;?>[submit_padding_bottom_unit]" id="submit_padding_bottom_unit">
                                                        		<option value="px" <?php selected( $submit_padding_bottom_unit, 'px'); ?>><?php _e('px', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="em" <?php selected( $submit_padding_bottom_unit, 'em'); ?>><?php _e('em', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="rem" <?php selected( $submit_padding_bottom_unit, 'rem'); ?>><?php _e('rem', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="vw" <?php selected( $submit_padding_bottom_unit, 'vw'); ?>><?php _e('vw', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="vh" <?php selected( $submit_padding_bottom_unit, 'vh'); ?>><?php _e('vh', LOGINSTYLE_SLUG); ?></option>
                                                        	</select><br />
                                                        	<input type="text" class="input-prefix" placeholder="<?php _e('Left Padding', LOGINSTYLE_SLUG); ?>" name="<?php echo LOGINSTYLE_OPTIONS;?>[submit_padding_left]" id="submit_padding_left" value="<?php echo $submit_padding_left; ?>" /><select class="postfix" name="<?php echo LOGINSTYLE_OPTIONS;?>[submit_padding_left_unit]" id="submit_padding_left_unit">
                                                        		<option value="px" <?php selected( $submit_padding_left_unit, 'px'); ?>><?php _e('px', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="em" <?php selected( $submit_padding_left_unit, 'em'); ?>><?php _e('em', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="rem" <?php selected( $submit_padding_left_unit, 'rem'); ?>><?php _e('rem', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="vw" <?php selected( $submit_padding_left_unit, 'vw'); ?>><?php _e('vw', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="vh" <?php selected( $submit_padding_left_unit, 'vh'); ?>><?php _e('vh', LOGINSTYLE_SLUG); ?></option>
                                                        	</select>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th>
                                                                <?php _e('Submit Button Font Size', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Set the font size for the submit button', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<input type="text" class="input-prefix" name="<?php echo LOGINSTYLE_OPTIONS;?>[submit_font_size]" id="submit_font_size" value="<?php echo $submit_font_size; ?>" /><select class="postfix" name="<?php echo LOGINSTYLE_OPTIONS;?>[submit_font_size_unit]" id="submit_font_size_unit">
                                                        		<option value="px" <?php selected( $submit_font_size_unit, 'px'); ?>><?php _e('px', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="em" <?php selected( $submit_font_size_unit, 'em'); ?>><?php _e('em', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="rem" <?php selected( $submit_font_size_unit, 'rem'); ?>><?php _e('rem', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="pt" <?php selected( $submit_font_size_unit, 'pt'); ?>><?php _e('pt', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="%" <?php selected( $submit_font_size_unit, '%'); ?>><?php _e('%', LOGINSTYLE_SLUG); ?></option>
                                                        	</select>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th>
                                                                <?php _e('Submit Button Move Row', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Move the submit button to the previous or next row', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                                <select class="select-change" name="<?php echo LOGINSTYLE_OPTIONS;?>[submit_move_row]" id="submit_move_row">
                                                        		<option value=""><?php _e('Keep on the Same Row as Remember Me', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="before" <?php selected( $submit_move_row, 'before'); ?>><?php _e('Move to Previous Row', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="after" <?php selected( $submit_move_row, 'after'); ?>><?php _e('Move to Next Row', LOGINSTYLE_SLUG); ?></option>
                                                        	</select>
                                                        </td>
                                                </tr>
                                                <tr<?php if( $submit_move_row == '' ) echo ' class="js-hide"'; ?> data-check-field="submit_move_row" data-check-value="submit_move_row-before submit_move_row-after">
                                                        <th>
                                                                <?php _e('Submit Button Alignment', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Set the horizontal alignment of the submit button to the form or make it full width', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<select name="<?php echo LOGINSTYLE_OPTIONS; ?>[submit_align]" id="submit_align">
                                                        		<option value="left" <?php selected( $submit_align, 'left'); ?>><?php _e('Left Align', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="center" <?php selected( $submit_align, 'center'); ?>><?php _e('Center Align', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="right" <?php selected( $submit_align, 'right'); ?>><?php _e('Right Align', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="full" <?php selected( $submit_align, 'full'); ?>><?php _e('Full Width', LOGINSTYLE_SLUG); ?></option>
                                                                </select>
                                                        </td>
                                                </tr>
                                        </table>
                                </div>
                                <div class="admin-section">
                                        <h3><strong><?php _e('Submit Button Styles', LOGINSTYLE_SLUG); ?></strong><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Pending Status is triggered when a customer makes a booking but haven\'t paid the required deposit yet.', LOGINSTYLE_SLUG); ?>"></a></h3>
                                        <table class="form-table wide-th">
                                                <tr>
                                                        <th>
                                                                <?php _e('Submit Background Color', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Select the color for the submit button background', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<input type="text" class="alpha-colorpicker" name="<?php echo LOGINSTYLE_OPTIONS;?>[submit_background_color]" id="submit_background_color" value="<?php echo $submit_background_color; ?>" />
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th>
                                                                <?php _e('Submit Button Font Color', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Select the color for the submit button text', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<input type="text" class="alpha-colorpicker" name="<?php echo LOGINSTYLE_OPTIONS;?>[submit_font_color]" id="submit_font_color" value="<?php echo $submit_font_color; ?>" />
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th>
                                                                <?php _e('Submit Button Border Style', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Set the style of the submit button border', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<select name="<?php echo LOGINSTYLE_OPTIONS; ?>[submit_border_style]" id="submit_border_style" class="select-change">
                                                        		<option value="none" <?php selected( $submit_border_style, 'none'); ?>><?php _e('No Border', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="dotted" <?php selected( $submit_border_style, 'dotted'); ?>><?php _e('Dotted Border', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="dashed" <?php selected( $submit_border_style, 'dashed'); ?>><?php _e('Dashed Border', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="solid" <?php selected( $submit_border_style, 'solid'); ?>><?php _e('Solid Border', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="double" <?php selected( $submit_border_style, 'double'); ?>><?php _e('Double Border', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="groove" <?php selected( $submit_border_style, 'groove'); ?>><?php _e('3D Grovved Border', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="ridge" <?php selected( $submit_border_style, 'ridge'); ?>><?php _e('3D Ridged Border', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="inset" <?php selected( $submit_border_style, 'inset'); ?>><?php _e('3D Inset Border', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="outset" <?php selected( $submit_border_style, 'outset'); ?>><?php _e('3D Outset Border', LOGINSTYLE_SLUG); ?></option>
                                                                </select>
                                                        </td>
                                                </tr>
                                                <tr<?php if( $submit_border_style == 'none' ) echo ' class="js-hide"'; ?> data-check-field="submit_border_style" data-check-value="submit_border_style-dotted submit_border_style-dashed submit_border_style-solid submit_border_style-double submit_border_style-groove submit_border_style-ridge submit_border_style-inset submit_border_style-outset">
                                                        <th>
                                                                <?php _e('Submit Button Border Size', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Set the width of the submit button border', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<input type="text" class="input-prefix" name="<?php echo LOGINSTYLE_OPTIONS;?>[submit_border_width]" id="submit_border_width" value="<?php echo $submit_border_width; ?>" /><span class="postfix">px</span>
                                                        </td>
                                                </tr>
                                                <tr<?php if( $submit_border_style == 'none' ) echo ' class="js-hide"'; ?> data-check-field="submit_border_style" data-check-value="submit_border_style-dotted submit_border_style-dashed submit_border_style-solid submit_border_style-double submit_border_style-groove submit_border_style-ridge submit_border_style-inset submit_border_style-outset">
                                                        <th>
                                                                <?php _e('Submit Button Border Color', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Select a color for the submit button border', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<input type="text" class="alpha-colorpicker" name="<?php echo LOGINSTYLE_OPTIONS;?>[submit_border_color]" id="submit_border_color" value="<?php echo $submit_border_color; ?>" />
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th>
                                                                <?php _e('Submit Button Border Radius', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Set the radius of the submit button corners', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<input type="text" class="input-prefix" name="<?php echo LOGINSTYLE_OPTIONS;?>[submit_radius]" id="submit_radius" value="<?php echo $submit_radius; ?>" /><span class="postfix">px</span>
                                                        </td>
                                                </tr>
                                        </table>
                                </div>
                                <div class="admin-section">
                                        <h3><strong><?php _e('Submit Button Hover Styles', LOGINSTYLE_SLUG); ?></strong></h3>
                                        <table class="form-table wide-th">
                                                <tr>
                                                        <th>
                                                                <?php _e('Submit Hover Background Color', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Select the hover color for the submit button background', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<input type="text" class="alpha-colorpicker" name="<?php echo LOGINSTYLE_OPTIONS;?>[submit_hover_background_color]" id="submit_hover_background_color" value="<?php echo $submit_hover_background_color; ?>" />
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th>
                                                                <?php _e('Submit Button Hover Font Color', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Select the hover color for the submit button text', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<input type="text" class="alpha-colorpicker" name="<?php echo LOGINSTYLE_OPTIONS;?>[submit_hover_font_color]" id="submit_hover_font_color" value="<?php echo $submit_hover_font_color; ?>" />
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th>
                                                                <?php _e('Submit Button Hover Border Color', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Select a hover color for the submit button border', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<input type="text" class="alpha-colorpicker" name="<?php echo LOGINSTYLE_OPTIONS;?>[submit_hover_border_color]" id="submit_hover_border_color" value="<?php echo $submit_hover_border_color; ?>" />
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th>
                                                                <?php _e('Submit Hover Transition Time', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('The time in seconds for the transition delay for the hover effect', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<input type="text" class="input-prefix" name="<?php echo LOGINSTYLE_OPTIONS;?>[submit_transition]" id="submit_transition" value="<?php echo $submit_transition; ?>" /><span class="postfix">s</span>
                                                        </td>
                                                </tr>
                                        </table>
                                </div>
                        </div>
                        <div id="tabs-footer">
                                <div class="admin-section">
                                        <h3><strong><?php _e('Footer Extra Content', LOGINSTYLE_SLUG); ?></strong></h3>
                                        <table class="form-table wide-th">
                                                <tr>
                                                        <th>
                                                                <?php _e('Footer Text Alignment', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Set the vertical alignment of the footer text', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<select name="<?php echo LOGINSTYLE_OPTIONS; ?>[footer_align]" id="footer_align">
                                                        		<option value="left" <?php selected( $footer_align, 'left'); ?>><?php _e('Left Align', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="center" <?php selected( $footer_align, 'center'); ?>><?php _e('Center Align', LOGINSTYLE_SLUG); ?></option>
                                                        		<option value="right" <?php selected( $footer_align, 'right'); ?>><?php _e('Right Align', LOGINSTYLE_SLUG); ?></option>
                                                                </select>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th><?php _e('Footer Text', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Enter content to insert below the login form. HTML markup allowed.', LOGINSTYLE_SLUG); ?>"></a></th>
                                                        <td>
                                                        	<textarea id="footer_text" name="<?php echo LOGINSTYLE_OPTIONS;?>[footer_text]"><?php echo $footer_text; ?></textarea>
                                                        </td>
                                                </tr>
                                        </table>
                                </div>
                                <div class="admin-section">
                                        <h3><strong><?php _e('Social Buttons', LOGINSTYLE_SLUG); ?></strong></h3>
                                        <table class="form-table wide-th">
                                                <tr>
                                                        <th><?php _e('Social Button', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Click Add Button to add a new social button. Select the icon and insert the social link. Drag the groups to rearrange the button order if required.', LOGINSTYLE_SLUG); ?>"></a></th>
                                                        <td>
                                                        	<ul id="social" data-group-placeholder="%" class="sortable">
					                                <?php foreach( $social as $n => $v ): ?>
					                                <li id="social_<?php echo $n; ?>" class="admin-meta admin-subsection social-subsection">
					                                	<div class="row">
				                                        		<div class="small-2 columns">
				                                        			<label for="social_icon_<?php echo $n; ?>"><?php _e('Social Icon', LOGINSTYLE_SLUG); ?></label>
				                                        		</div>
				                                        		<div class="small-10 columns">
				                                        			<select name="<?php echo LOGINSTYLE_OPTIONS; ?>[social][<?php echo $n; ?>][icon]" id="social_icon_<?php echo $n; ?>" class="icon-picker">
				                                                        		<?php foreach( $social_icon_options as $social_icon_option ): ?>
				                                                        		<option value="<?php echo $social_icon_option; ?>" <?php selected( $v['icon'], $social_icon_option ); ?>><?php echo $social_icon_option; ?></option>
				                                                        		<?php endforeach; ?>
				                                                                </select>
				                                        		</div>
				                                        	</div>
				                                        	<div class="row">
				                                        		<div class="small-2 columns">
				                                        			<label for="social_link_<?php echo $n; ?>"><?php _e('Social Website', LOGINSTYLE_SLUG); ?></label>
				                                        		</div>
				                                        		<div class="small-10 columns">
				                                        			<input id="social_link_<?php echo $n; ?>" type="text" name="<?php echo LOGINSTYLE_OPTIONS; ?>[social][<?php echo $n; ?>][link]" value="<?php echo esc_html( $v['link'] ); ?>">
			                                                			<span class="description"><?php _e('Enter a full website, e.g. http://www.mywebsite.com', LOGINSTYLE_SLUG); ?></span>
				                                        		</div>
				                                        	</div>
				                                                <div id="delete_social_<?php echo $n; ?>" class="delete-group cmb-button small-button">&times</div>
					                                </li>
					                                <?php endforeach; ?>
                                                        	</ul>
				                                <div id="social_" class="hidden">
				                                        <li id="social_%" class="admin-meta admin-subsection social-subsection">
				                                        	<div class="row">
				                                        		<div class="small-2 columns">
				                                        			<label for="social_icon_%"><?php _e('Social Icon', LOGINSTYLE_SLUG); ?></label>
				                                        		</div>
				                                        		<div class="small-10 columns">
				                                        			<select name="<?php echo LOGINSTYLE_OPTIONS; ?>[social][%][icon]" id="social_icon_%" class="iconpicker-init">
				                                                        		<?php foreach( $social_icon_options as $social_icon_option ): ?>
				                                                        		<option value="<?php echo $social_icon_option; ?>"><?php echo $social_icon_option; ?></option>
				                                                        		<?php endforeach; ?>
				                                                                </select>
				                                        		</div>
				                                        	</div>
				                                        	<div class="row">
				                                        		<div class="small-2 columns">
				                                        			<label for="social_link_%"><?php _e('Social Website', LOGINSTYLE_SLUG); ?></label>
				                                        		</div>
				                                        		<div class="small-10 columns">
				                                        			<input id="social_link_%" type="text" name="<?php echo LOGINSTYLE_OPTIONS; ?>[social][%][link]">
			                                                			<span class="description"><?php _e('Enter a full website, e.g. http://www.mywebsite.com', LOGINSTYLE_SLUG); ?></span>
				                                        		</div>
				                                        	</div>
				                                                <div id="delete_social_%" class="delete-group cmb-button small-button">&times</div>
				                                        </li>
				                                </div>
				                                <div class="add-group cmb-button default-button premium-focus" id="social_add" data-count="5" data-count-class="social-subsection" data-tooltip="<?php _e('Add Unlimited Buttons in the Premium version.', LOGINSTYLE_SLUG); ?>"><?php _e('Add Button', LOGINSTYLE_SLUG); ?></div>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th>
                                                                <?php _e('Social Icon Size', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Set the size of the social icon button. The default size is 20.', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<input type="text" class="input-prefix" name="<?php echo LOGINSTYLE_OPTIONS;?>[social_icon_font_size]" id="social_icon_font_size" value="<?php echo $social_icon_font_size; ?>" /><span class="postfix">px</span>
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th>
                                                                <?php _e('Social Icon Color', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Select a color for the social icon', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<input type="text" class="alpha-colorpicker" name="<?php echo LOGINSTYLE_OPTIONS;?>[social_icon_color]" id="social_icon_color" value="<?php echo $social_icon_color; ?>" />
                                                        </td>
                                                </tr>
                                                <tr>
                                                        <th>
                                                                <?php _e('Social Icon Hover Color', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Select the color when hovering over the social icon', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<input type="text" class="alpha-colorpicker" name="<?php echo LOGINSTYLE_OPTIONS;?>[social_icon_hover_color]" id="social_icon_hover_color" value="<?php echo $social_icon_hover_color; ?>" />
                                                        </td>
                                                </tr>
                                        </table>
                                </div>
                        </div>
                        <div id="tabs-templates">
                                <div class="admin-section">
                                        <h3><strong><?php _e('Custom CSS', LOGINSTYLE_SLUG); ?></strong></h3>
                                        <table class="form-table wide-th">
                                                <tr>
                                                        <th>
                                                                <?php _e('Custom CSS', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Enter any custom CSS here.', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<textarea name="<?php echo LOGINSTYLE_OPTIONS;?>[custom_css]" id="custom_css"><?php echo $custom_css; ?></textarea>
                                                        </td>
                                                </tr>
                                        </table>
                                </div>
                                <div class="admin-section">
                                        <h3><strong><?php _e('Templates', LOGINSTYLE_SLUG); ?></strong></h3>
                                        <table class="form-table wide-th">
                                                <tr>
                                                        <th>
                                                                <?php _e('Load Templates', LOGINSTYLE_SLUG); ?><a href="javascript:;" class="tooltip" data-tooltip="<?php _e('Select a template and load the demo. WARNING: All current options will be lost. This cannot be undone.', LOGINSTYLE_SLUG); ?>"></a>
                                                        </th>
                                                        <td>
                                                        	<ul class="templates clearfix">
                                                        		<?php foreach( $templates as $template ): ?>
                                                        			<?php if( in_array( $template['name'], array('Alps', 'Bicycle', 'Chimera', 'Enigma') ) ): ?>
											<li>
			                                                        		<?php if( $template['preview'] != '' ): ?>
			                                                        		<img src="<?php echo $template['preview']; ?>" alt="<?php echo $template['name']; ?>" />
			                                                        		<?php endif; ?>
			                                                        		<div class="template-content">
			                                                        			<h4><?php echo $template['name']; ?></h4>
			                                                        			<a id="import_template_<?php echo $template['file']; ?>" href="javascript:;" class="cmb-button default-button import-options" data-file="<?php echo $template['file']; ?>" data-nonce="<?php echo $nonce; ?>"><?php _e('Load Template', LOGINSTYLE_SLUG); ?></a><br />
			                                                        		</div>
			                                                        	</li>
                                                        			<?php else: ?>
											<li>
			                                                        		<?php if( $template['preview'] != '' ): ?>
			                                                        		<img src="<?php echo $template['preview']; ?>" alt="<?php echo $template['name']; ?>" />
			                                                        		<?php endif; ?>
			                                                        		<div class="template-content">
			                                                        			<h4><?php echo $template['name']; ?></h4>
			                                                        			<a href="javascript:;" class="cmb-button default-button tooltip premium-focus" data-tooltip="<?php _e('Available in Premium Only', 'archtheme'); ?>"><?php _e('Premium', LOGINSTYLE_SLUG); ?></a><br />
			                                                        		</div>
			                                                        	</li>
                                                        			<?php endif; ?>
                                                        		
	                                                        	<?php endforeach; ?>
                                                        	</ul>
                                                        	<div class="description"><?php _e('WARNING: All current options will be lost when a template is loaded. This cannot be undone.', LOGINSTYLE_SLUG); ?></div>
                                                        </td>
                                                </tr>
                                        </table>
                                </div>
                        </div>
                        <?php submit_button(); ?>
                </form>
        </div>
</div>