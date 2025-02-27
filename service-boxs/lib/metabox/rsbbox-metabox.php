<?php

if( !defined( 'ABSPATH' ) ){
    exit;
}

function register_rsbbox_meta_boxes() {
    add_meta_box(
        'rsbbox_meta_id_01',                            # Metabox
        __( 'Service Box Details', 'service-boxs' ),          # Title
        'rsbbox_add_meta',                              # Call Back func
       	'tpwp_serviceboxs',                             # post type
        'normal'                                        # Text Content
    );
    add_meta_box(
        'rsbbox_meta_id_02',                            # Metabox
        __( 'Service Color Settings', 'service-boxs' ),           	# Title
        'rsbbox_add_meta2',                             # Call Back func
       	'tpwp_serviceboxs',                             # post type
        'normal'                                        # Text Content
    );	
    add_meta_box(
        'rsbbox_meta_id_03',                            # Metabox
        __( 'Service Option Settings', 'service-boxs' ),           	# Title
        'rsbbox_add_meta3',                             # Call Back func
       	'generateservices',                             # post type
        'normal'                                        # Text Content
    );
}
add_action( 'add_meta_boxes', 'register_rsbbox_meta_boxes' );

function rsbbox_add_meta( $post, $args ) {
	$tup_biography      = get_post_meta($post->ID, 'tup_biography', true);
	$ftw_icon           = get_post_meta($post->ID, 'ftw_icon', true);
	$rsbbox_button_text = get_post_meta($post->ID, 'rsbbox_button_text', true);
	$rsbbox_url         = get_post_meta($post->ID, 'rsbbox_url', true);
 ?>
	<table class="form-table">
		<tbody>
			<tr valign="top" class="ui-state-default">
			    <th scope="row">
			        <label for="tup_biography"><?php esc_html_e('Short Description', 'service-boxs'); ?></label>
			        <br />
			        <span class="rsboxservdeschints"><?php esc_html_e('Type your service short description.', 'service-boxs'); ?></span>
			    </th>
			    <td style="vertical-align: middle;">
			        <div>
			            <textarea maxlength="147" name="tup_biography" id="tup_biography" class="widefat widefat_custom" cols="25" rows="3"><?php echo isset($tup_biography) ? esc_textarea($tup_biography) : ''; ?></textarea>
			        </div>
			    </td>
			</tr>
			<!-- End Short Description -->

			<tr valign="top">
			    <th scope="row">
			        <label for="ftw_icon"><?php esc_html_e('Service Icon', 'service-boxs'); ?></label>
			        <br />
			        <span class="rsboxservdeschints"><?php esc_html_e('Click input field to choose your service box icon.', 'service-boxs'); ?></span>
			    </th>
			    <td style="vertical-align: middle;">
			        <input type="text" name="ftw_icon" id="ftw_icon" class="input1 input timezone_string" placeholder="Select Icon" required="required" value="<?php echo isset($ftw_icon) && !empty($ftw_icon) ? esc_attr($ftw_icon) : ''; ?>">
			        <script type="text/javascript">
			            jQuery(document).ready(function($){
			                'use strict';
			                $(".input1").iconpicker('.input1');
			            });
			        </script>
			    </td>
			</tr>
			<!-- End Choose Icons -->

			<tr valign="top">
			    <th scope="row">
			        <label for="rsbbox_button_text"><?php esc_html_e('Service Button Text', 'service-boxs'); ?></label>
			        <br />
			        <span class="rsboxservdeschints"><?php esc_html_e('Insert service box button text.', 'service-boxs'); ?></span>
			    </th>
			    <td style="vertical-align: middle;">
			        <input type="text" name="rsbbox_button_text" id="rsbbox_button_text" placeholder="Read More" value="<?php echo isset($rsbbox_button_text) && $rsbbox_button_text !== '' ? esc_attr($rsbbox_button_text) : ''; ?>">
			    </td>
			</tr>
			<!-- End Service Button Text -->

			<tr valign="top">
			    <th scope="row">
			        <label for="rsbbox_url"><?php esc_html_e('Service Button URL', 'service-boxs'); ?></label>
			        <br />
			        <span class="rsboxservdeschints"><?php esc_html_e('Insert service box button URL.', 'service-boxs'); ?></span>
			    </th>
			    <td style="vertical-align: middle;">
			        <input type="url" name="rsbbox_url" id="rsbbox_url" placeholder="https://yourdomain.com" value="<?php echo isset($rsbbox_url) && $rsbbox_url !== '' ? esc_url($rsbbox_url) : ''; ?>">
			    </td>
			</tr>
			<!-- End Service Button URL -->
		</tbody>
	</table>
	<?php
}

function rsbbox_add_meta2( $post, $args ) {
	$rsbbox_back_color       	= get_post_meta($post->ID, 'rsbbox_back_color', true);
	$rsbbox_icon_color       	= get_post_meta($post->ID, 'rsbbox_icon_color', true);
	$rsbbox_iconbg_color       	= get_post_meta($post->ID, 'rsbbox_iconbg_color', true);
	$rsbbox_title_color      	= get_post_meta($post->ID, 'rsbbox_title_color', true);
	$rsbbox_content_color      	= get_post_meta($post->ID, 'rsbbox_content_color', true);
	$rsbbox_moresize_color      = get_post_meta($post->ID, 'rsbbox_moresize_color', true);
 ?>

	<table class="form-table">
		<tbody>
			<tr valign="top">
			    <th scope="row">
			        <label for="rsbbox_back_color"><?php esc_html_e('Background Color', 'service-boxs'); ?></label>
			        <br />
			        <span class="rsboxservdeschints"><?php esc_html_e('Choose service box background color.', 'service-boxs'); ?></span>
			    </th>
			    <td style="vertical-align:middle;">
			        <input size='10' name='rsbbox_back_color' class='serviceboxs-background-color' type='text' id="rsbbox_back_color" value="<?php echo isset($rsbbox_back_color) && $rsbbox_back_color != '' ? esc_attr($rsbbox_back_color) : ''; ?>" />
			    </td>
			</tr>
			<!-- End Background Color -->

			<tr valign="top">
			    <th scope="row">
			        <label for="rsbbox_icon_color"><?php esc_html_e('Icon Color', 'service-boxs'); ?></label>
			        <br />
			        <span class="rsboxservdeschints"><?php esc_html_e('Choose service box icon color.', 'service-boxs'); ?></span>
			    </th>
			    <td style="vertical-align:middle;">
			        <input size='10' name='rsbbox_icon_color' class='serviceboxs-icons-color' type='text' id="rsbbox_icon_color" value="<?php echo isset($rsbbox_icon_color) && $rsbbox_icon_color != '' ? esc_attr($rsbbox_icon_color) : ''; ?>" />
			    </td>
			</tr>
			<!-- End Icon Color -->

			<tr valign="top">
			    <th scope="row">
			        <label for="rsbbox_iconbg_color"><?php esc_html_e('Icon Bg Color', 'service-boxs'); ?></label>
			        <br />
			        <span class="rsboxservdeschints"><?php esc_html_e('Choose service box icon background color.', 'service-boxs'); ?></span>
			    </th>
			    <td style="vertical-align:middle;">
			        <input size='10' name='rsbbox_iconbg_color' class='serviceboxs-icons-color' type='text' id="rsbbox_iconbg_color" value="<?php echo isset($rsbbox_iconbg_color) && $rsbbox_iconbg_color != '' ? esc_attr($rsbbox_iconbg_color) : ''; ?>" />
			    </td>
			</tr>
			<!-- End Icon Bg Color -->

			<tr valign="top">
			    <th scope="row">
			        <label for="rsbbox_title_color"><?php esc_html_e('Service Title Color', 'service-boxs'); ?></label>
			        <br />
			        <span class="rsboxservdeschints"><?php esc_html_e('Choose service box title color.', 'service-boxs'); ?></span>
			    </th>
			    <td style="vertical-align:middle;">
			        <input size='10' name='rsbbox_title_color' class='serviceboxs-icons-color' type='text' id="rsbbox_title_color" value="<?php echo isset($rsbbox_title_color) && $rsbbox_title_color != '' ? esc_attr($rsbbox_title_color) : ''; ?>" />
			    </td>
			</tr>
			<!-- End Title Color -->

			<tr valign="top">
			    <th scope="row">
			        <label for="rsbbox_content_color"><?php esc_html_e('Service Content Color', 'service-boxs'); ?></label>
			        <br />
			        <span class="rsboxservdeschints"><?php esc_html_e('Choose service box content color.', 'service-boxs'); ?></span>
			    </th>
			    <td style="vertical-align:middle;">
			        <input size='10' name='rsbbox_content_color' class='serviceboxs-icons-color' type='text' id="rsbbox_content_color" value="<?php echo isset($rsbbox_content_color) && $rsbbox_content_color != '' ? esc_attr($rsbbox_content_color) : ''; ?>" />
			    </td>
			</tr>
			<!-- End Content Color -->

			<tr valign="top">
			    <th scope="row">
			        <label for="rsbbox_moresize_color"><?php esc_html_e('Button Font Color', 'service-boxs'); ?></label>
			        <br />
			        <span class="rsboxservdeschints"><?php esc_html_e('Choose service box Read more text color.', 'service-boxs'); ?></span>
			    </th>
			    <td style="vertical-align:middle;">
			        <input size='10' name='rsbbox_moresize_color' class='serviceboxs-icons-color' type='text' id="rsbbox_moresize_color" value="<?php echo isset($rsbbox_moresize_color) && $rsbbox_moresize_color != '' ? esc_attr($rsbbox_moresize_color) : ''; ?>" />
			    </td>
			</tr>
			<!-- End Button Font Color -->

			<script type="text/javascript">
				jQuery(document).ready(function($){	
					$('#rsbbox_back_color,#rsbbox_icon_color,#rsbbox_iconbg_color,#rsbbox_title_color,#rsbbox_content_color,#rsbbox_moresize_color').wpColorPicker();
				});
			</script>
		</tbody>
	</table>
<?php
}

function rsbbox_add_meta3($post, $args){

	#Call get post meta.
	$rsbbox_catnames 		  = get_post_meta($post->ID, 'rsbbox_catnames', true);
	if(empty($rsbbox_catnames)){
		$rsbbox_catnames = array();
	}
	$rsbbox_theme_id              = get_post_meta($post->ID, 'rsbbox_theme_id', true);
	$rsbbox_servicetypes          = get_post_meta($post->ID, 'rsbbox_servicetypes', true);
	$rsbbox_columns               = get_post_meta($post->ID, 'rsbbox_columns', true);
	$rsbbox_itemsicons            = get_post_meta($post->ID, 'rsbbox_itemsicons', true);
	$rsbbox_colmargin_lr          = get_post_meta($post->ID, 'rsbbox_colmargin_lr', true);
	$rsbbox_marginbottom          = get_post_meta($post->ID, 'rsbbox_marginbottom', true);
	$rsbbox_alignment             = get_post_meta($post->ID, 'rsbbox_alignment', true);
	$rsbbox_itembg_color          = get_post_meta($post->ID, 'rsbbox_itembg_color', true);
	$rsbbox_padding_size          = get_post_meta($post->ID, 'rsbbox_padding_size', true);
	$rsbbox_hideicons             = get_post_meta($post->ID, 'rsbbox_hideicons', true);
	$rsbbox_itemicons_color       = get_post_meta($post->ID, 'rsbbox_itemicons_color', true);
	$rsbbox_itemiconsbg_color     = get_post_meta($post->ID, 'rsbbox_itemiconsbg_color', true);
	$rsbbox_iconsize              = get_post_meta($post->ID, 'rsbbox_iconsize', true);
	$rsbbox_iconheight            = get_post_meta($post->ID, 'rsbbox_iconheight', true);
	$rsbbox_itemtitle_color       = get_post_meta($post->ID, 'rsbbox_itemtitle_color', true);
	$rsbbox_itemtitleh_color      = get_post_meta($post->ID, 'rsbbox_itemtitleh_color', true);
	$rsbbox_hidetitle             = get_post_meta($post->ID, 'rsbbox_hidetitle', true);
	$rsbbox_titlesize             = get_post_meta($post->ID, 'rsbbox_titlesize', true);
	$rsbbox_contentsize           = get_post_meta($post->ID, 'rsbbox_contentsize', true);
	$rsbbox_conten_color          = get_post_meta($post->ID, 'rsbbox_conten_color', true);
	$rsbbox_hidelinks             = get_post_meta($post->ID, 'rsbbox_hidelinks', true);
	$rsbbox_linkopen              = get_post_meta($post->ID, 'rsbbox_linkopen', true);
	$rsbbox_hidereadmore          = get_post_meta($post->ID, 'rsbbox_hidereadmore', true);
	$rsbbox_moreoption_color      = get_post_meta($post->ID, 'rsbbox_moreoption_color', true);
	$rsbbox_moreoptionhover_color = get_post_meta($post->ID, 'rsbbox_moreoptionhover_color', true);
	$rsbbox_moresize              = get_post_meta($post->ID, 'rsbbox_moresize', true);
	$nav_value                    = get_post_meta($post->ID, 'nav_value', true );
	$rssbox_slide_autoplay        = get_post_meta($post->ID, 'rssbox_slide_autoplay', true);
	$rssbox_slide_speeds          = get_post_meta($post->ID, 'rssbox_slide_speeds', true);
	$rssbox_slide_stophovers      = get_post_meta($post->ID, 'rssbox_slide_stophovers', true);
	$rssbox_slide_timeout         = get_post_meta($post->ID, 'rssbox_slide_timeout', true);
	$rssbox_slide_items_alls      = get_post_meta($post->ID, 'rssbox_slide_items_alls', true);
	$rssbox_slide_items_dsks      = get_post_meta($post->ID, 'rssbox_slide_items_dsks', true);
	$rssbox_slide_items_dsksmall  = get_post_meta($post->ID, 'rssbox_slide_items_dsksmall', true);
	$rssbox_slide_items_mob       = get_post_meta($post->ID, 'rssbox_slide_items_mob', true);
	$rssbox_slide_loops           = get_post_meta($post->ID, 'rssbox_slide_loops', true);
	$rssbox_slide_margins         = get_post_meta($post->ID, 'rssbox_slide_margins', true);
	$rssbox_slide_navi            = get_post_meta($post->ID, 'rssbox_slide_navi', true);
	$rssbox_slide_navi_position   = get_post_meta($post->ID, 'rssbox_slide_navi_position', true);
	$rssbox_slide_navtext_color   = get_post_meta($post->ID, 'rssbox_slide_navtext_color', true);	
	$rssbox_slide_navbg_color     = get_post_meta($post->ID, 'rssbox_slide_navbg_color', true);
	$rssbox_slide_navho_color     = get_post_meta($post->ID, 'rssbox_slide_navho_color', true);
	$rssbox_slide_pagi            = get_post_meta($post->ID, 'rssbox_slide_pagi', true);
	$rssbox_slide_pagi_color      = get_post_meta($post->ID, 'rssbox_slide_pagi_color', true);
	$rssbox_slide_pagi_style      = get_post_meta($post->ID, 'rssbox_slide_pagi_style', true);
	$rssbox_slide_pagiposition    = get_post_meta($post->ID, 'rssbox_slide_pagiposition', true);
?>

<div class="tupsetings post-grid-metabox">
	<!-- <div class="wrap"> -->
	<ul class="tab-nav">
		<li nav="1" class="nav1 <?php if( $nav_value == 1 ){echo "active";}?>"><?php _e( 'Shortcodes','service-boxs' ); ?></li>
		<li nav="2" class="nav2 <?php if( $nav_value == 2 ){echo "active";}?>"><?php _e( 'Service Query ','service-boxs' ); ?></li>
		<li nav="3" class="nav3 <?php if( $nav_value == 3 ){echo "active";}?>"><?php _e( 'General Settings ','service-boxs' ); ?></li>
		<li nav="4" class="nav4 <?php if( $nav_value == 4 ){echo "active";}?>"><?php _e( 'Slider Settings ','service-boxs' ); ?></li>
	</ul> <!-- tab-nav end -->
	<?php 
		$getNavValue = "";
		if(!empty($nav_value)){ $getNavValue = $nav_value; } else { $getNavValue = 1; }
	?>
	<input type="hidden" name="nav_value" id="nav_value" value="<?php echo $getNavValue; ?>"> 

	<ul class="box">
		<!-- Tab 1 -->
		<li style="<?php if($nav_value == 1){echo "display: block;";} else{ echo "display: none;"; }?>" class="box1 tab-box <?php if($nav_value == 1){echo "active";}?>">
			<div class="option-box">
				<p class="option-title"><?php esc_html_e( 'Shortcode','service-boxs' ); ?></p>
				<p class="option-info"><?php esc_html_e( 'Copy this shortcode and paste on post, page or text widgets where you want to display Service Box.','service-boxs' ); ?></p>
				<textarea cols="50" rows="1" onClick="this.select();" >[tpservicebox <?php echo 'id="'.$post->ID.'"';?>]</textarea>
				<br /><br />
				<p class="option-info"><?php esc_html_e( 'PHP Code:','service-boxs' ); ?></p>
				<p class="option-info"><?php esc_html_e( 'Use PHP code to your themes file to display Service Box.','service-boxs' ); ?></p>
				<textarea cols="50" rows="2" onClick="this.select();" ><?php echo '<?php echo do_shortcode("[tpservicebox id='; echo "'".$post->ID."']"; echo '"); ?>'; ?></textarea>  
			</div>
		</li>

		<li style="<?php if($nav_value == 2){echo "display: block;";} else{ echo "display: none;"; }?>" class="box2 tab-box <?php if($nav_value == 2){echo "active";}?>">
			<div class="wrap">
				<div class="option-box">
					<p class="option-title"><?php esc_html_e( 'Service Query','service-boxs' ); ?></p>
					<table class="form-table">
						<tr valign="top">
							<th scope="row">
								<label for="rsbbox_catnames"><?php esc_html_e( 'Select Categories', 'service-boxs' ); ?></label>
							</th>
							<td style="vertical-align: middle;">
								<ul>			
									<?php
										$args = array( 
											'taxonomy'     => 'rsbboxcat',
											'orderby'      => 'name',
											'show_count'   => 1,
											'pad_counts'   => 1,
											'hierarchical' => 1,
											'echo'         => 0
										);
										$allthecats = get_categories( $args );
										foreach( $allthecats as $category ):
										    $cat_id = $category->cat_ID;
										    $checked = ( in_array($cat_id,(array)$rsbbox_catnames)? ' checked="checked"': "" );
										        echo'<li id="cat-'.$cat_id.'"><input type="checkbox" name="rsbbox_catnames[]" id="'.$cat_id.'" value="'.$cat_id.'"'.$checked.'> <label for="'.$cat_id.'">'.__( $category->cat_name, 'service-boxs' ).'</label></li>';
										endforeach;
									?>
								</ul>
								<span class="service_manager_hint"><?php esc_html_e( 'Service Group Names only show when you publish services under any group/categories.', 'service-boxs' ); ?></span>
							</td>
						</tr>
						<!-- End Categories -->

						<tr valign="top">
							<th scope="row">
								<label for="rsbbox_servicetypes"><?php esc_html_e( 'Service Type', 'rsbbox' ); ?></label>
							</th>
							<td style="vertical-align: middle;">
								<select name="rsbbox_servicetypes" id="rsbbox_servicetypes" class="timezone_string">
									<option value="1" <?php if ( isset ( $rsbbox_servicetypes ) ) selected( $rsbbox_servicetypes, '1' ); ?>><?php esc_html_e( 'Grid', 'service-boxs' ); ?></option>
									<option value="2" <?php if ( isset ( $rsbbox_servicetypes ) ) selected( $rsbbox_servicetypes, '2' ); ?>><?php esc_html_e( 'Slider (Pro)', 'service-boxs' ); ?></option>
								</select><br />
								<span class="rsboxservicehints"><?php esc_html_e( 'Choose service box type grid or slider.', 'service-boxs' ); ?></span>
							</td>
						</tr>
						<!-- End Service Type -->

						<tr valign="top">
							<th scope="row">
								<label for="rsbbox_theme_id"><?php esc_html_e( 'Service Styles', 'service-boxs' ); ?></label>
							</th>
							<td style="vertical-align: middle;">
								<select name="rsbbox_theme_id" id="rsbbox_theme_id" class="timezone_string">
									<option value="1" <?php if ( isset ( $rsbbox_theme_id ) ) selected( $rsbbox_theme_id, '1' ); ?>><?php esc_html_e('Style 01 (Free)', 'service-boxs');?></option>
									<option value="2" <?php if ( isset ( $rsbbox_theme_id ) ) selected( $rsbbox_theme_id, '2' ); ?>><?php esc_html_e('Style 02 (Free)', 'service-boxs');?></option>
									<option value="3" <?php if ( isset ( $rsbbox_theme_id ) ) selected( $rsbbox_theme_id, '3' ); ?>><?php esc_html_e('Style 03 (Free)', 'service-boxs');?></option>
									<option value="4" <?php if ( isset ( $rsbbox_theme_id ) ) selected( $rsbbox_theme_id, '4' ); ?>><?php esc_html_e('Style 04 (Free)', 'service-boxs');?></option>
									<option value="5" <?php if ( isset ( $rsbbox_theme_id ) ) selected( $rsbbox_theme_id, '5' ); ?>><?php esc_html_e('Style 05 (Free)', 'service-boxs');?></option>
									<option value="6" <?php if ( isset ( $rsbbox_theme_id ) ) selected( $rsbbox_theme_id, '6' ); ?>><?php esc_html_e('Style 06 (Free)', 'service-boxs');?></option>
									<option value="7" <?php if ( isset ( $rsbbox_theme_id ) ) selected( $rsbbox_theme_id, '7' ); ?>><?php esc_html_e('Style 07 (Free)', 'service-boxs');?></option>
									<option value="8" <?php if ( isset ( $rsbbox_theme_id ) ) selected( $rsbbox_theme_id, '8' ); ?>><?php esc_html_e('Style 08 (Pro)', 'service-boxs');?></option>
									<option value="9" <?php if ( isset ( $rsbbox_theme_id ) ) selected( $rsbbox_theme_id, '9' ); ?>><?php esc_html_e('Style 09 (Pro)', 'service-boxs');?></option>
									<option value="10" <?php if ( isset ( $rsbbox_theme_id ) ) selected( $rsbbox_theme_id, '10' ); ?>><?php esc_html_e('Style 10 (Pro)', 'service-boxs');?></option>
									<option value="11" <?php if ( isset ( $rsbbox_theme_id ) ) selected( $rsbbox_theme_id, '11' ); ?>><?php esc_html_e('Style 11 (Pro)', 'service-boxs');?></option>
									<option value="12" <?php if ( isset ( $rsbbox_theme_id ) ) selected( $rsbbox_theme_id, '12' ); ?>><?php esc_html_e('Style 12 (Pro)', 'service-boxs');?></option>
									<option value="13" <?php if ( isset ( $rsbbox_theme_id ) ) selected( $rsbbox_theme_id, '13' ); ?>><?php esc_html_e('Style 13 (Pro)', 'service-boxs');?></option>
									<option value="14" <?php if ( isset ( $rsbbox_theme_id ) ) selected( $rsbbox_theme_id, '14' ); ?>><?php esc_html_e('Style 14 (Pro)', 'service-boxs');?></option>
									<option value="15" <?php if ( isset ( $rsbbox_theme_id ) ) selected( $rsbbox_theme_id, '15' ); ?>><?php esc_html_e('Style 15 (Pro)', 'service-boxs');?></option>
									<option value="16" <?php if ( isset ( $rsbbox_theme_id ) ) selected( $rsbbox_theme_id, '16' ); ?>><?php esc_html_e('Style 16 (Pro)', 'service-boxs');?></option>
								</select><br/>
								<span class="service_manager_hint"><?php esc_html_e( 'Select Service Styles.', 'service-boxs' ); ?></span>
							</td>
						</tr>
						<!-- End Service Styles -->
						
						<tr valign="top">
							<th scope="row">
								<label for="rsbbox_columns"><?php esc_html_e( 'Service Column', 'service-boxs' ); ?></label>
							</th>
							<td style="vertical-align: middle;">
								<select name="rsbbox_columns" id="rsbbox_columns" class="timezone_string">
									<option value="3" <?php if ( isset ( $rsbbox_columns ) ) selected( $rsbbox_columns, '3' ); ?>><?php esc_html_e('3 Column', 'service-boxs'); ?></option>
									<option value="2" <?php if ( isset ( $rsbbox_columns ) ) selected( $rsbbox_columns, '2' ); ?>><?php esc_html_e('2 Column', 'service-boxs'); ?></option>
									<option value="1" <?php if ( isset ( $rsbbox_columns ) ) selected( $rsbbox_columns, '1' ); ?>><?php esc_html_e('1 Column', 'service-boxs'); ?></option>
									<option value="4" <?php if ( isset ( $rsbbox_columns ) ) selected( $rsbbox_columns, '4' ); ?>><?php esc_html_e('4 Column', 'service-boxs'); ?></option>
									<option value="5" <?php if ( isset ( $rsbbox_columns ) ) selected( $rsbbox_columns, '5' ); ?>><?php esc_html_e('5 Column', 'service-boxs'); ?></option>
									<option value="6" <?php if ( isset ( $rsbbox_columns ) ) selected( $rsbbox_columns, '6' ); ?>><?php esc_html_e('6 Column', 'service-boxs'); ?></option>
								</select><br/>
								<span class="service_manager_hint"><?php esc_html_e( 'Select Service Column.', 'service-boxs' ); ?></span>
							</td>
						</tr>
						<!-- End Service Column -->

						<tr valign="top">
							<th scope="row">
								<label for="rsbbox_itemsicons"><?php esc_html_e( 'Display Total Items', 'service-boxs' ); ?></label>
							</th>
							<td style="vertical-align: middle;">
								<input size="4" type="number" name="rsbbox_itemsicons" id="rsbbox_itemsicons" maxlength="2" class="timezone_string" value="<?php if ( $rsbbox_itemsicons != '' ) { echo $rsbbox_itemsicons; } else { echo '3'; } ?>">
								<br/>
								<span class="logo_manager_hint"><?php esc_html_e( 'Select how many items you want to show.', 'service-boxs' ); ?></span>
							</td>
						</tr>
						<!-- End Total Items -->

						<tr valign="top">
							<th scope="row">
								<label for="rsbbox_colmargin_lr"><?php esc_html_e('Column Margin Left/Right', 'service-boxs');?></label>
							</th>
							<td style="vertical-align: middle;">
								<input type="number" name="rsbbox_colmargin_lr" id="rsbbox_colmargin_lr" maxlength="4" class="timezone_string" value="<?php if($rsbbox_colmargin_lr !=''){echo $rsbbox_colmargin_lr; }else{ echo '5';} ?>">
								<br />
								<span class="rsboxservicehints"><?php esc_html_e('Choose service box column margin left/right.', 'service-boxs');?></span>
							</td>
						</tr>
						<!-- End Total Items -->
						
						<tr valign="top">
							<th scope="row">
								<label for="rsbbox_marginbottom"><?php esc_html_e('Column Margin Bottom (Pro)', 'service-boxs');?></label>
							</th>
							<td style="vertical-align: middle;">
								<input type="number" name="rsbbox_marginbottom" id="rsbbox_marginbottom" maxlength="4" class="timezone_string" value="<?php if($rsbbox_marginbottom !=''){echo $rsbbox_marginbottom; }else{ echo '15';} ?>">
								<br />
								<span class="rsboxservicehints"><?php esc_html_e('Choose service box column margin bottom.', 'service-boxs');?></span>
							</td>
						</tr>
						<!-- End Total Items -->
					</table>
				</div>
			</div>	
		</li>

		<li style="<?php if($nav_value == 3){echo "display: block;";} else{ echo "display: none;"; }?>" class="box3 tab-box <?php if($nav_value == 3){echo "active";}?>">
			<div class="wrap">
				<div class="option-box">
					<p class="option-title"><?php esc_html_e('General Settings','service-boxs'); ?></p>
					<table class="form-table">
						<tr valign="top">
							<th scope="row">
								<label for="rsbbox_alignment"><?php esc_html_e( 'Item Alignment', 'service-boxs' ); ?></label>
							</th>
							<td style="vertical-align: middle;">
								<select name="rsbbox_alignment" id="rsbbox_alignment" class="timezone_string">
									<option value="left" <?php if ( isset ( $rsbbox_alignment ) ) selected( $rsbbox_alignment, 'left' ); ?>><?php esc_html_e('Left', 'service-boxs'); ?></option>
									<option value="center" <?php if ( isset ( $rsbbox_alignment ) ) selected( $rsbbox_alignment, 'center' ); ?>><?php esc_html_e('Center', 'service-boxs'); ?></option>
									<option value="right" <?php if ( isset ( $rsbbox_alignment ) ) selected( $rsbbox_alignment, 'right' ); ?>><?php esc_html_e('Right', 'service-boxs'); ?></option>
								</select><br/>
								<span class="service_manager_hint"><?php esc_html_e( 'Select Service Item Content Alignment.', 'service-boxs' ); ?></span>
							</td>
						</tr>
						<!-- End Service Column -->

						<tr valign="top">
							<th scope="row">
								<label for="rsbbox_itembg_color"><?php esc_html_e('Item Background Color', 'service-boxs'); ?></label>
							</th>
							<td style="vertical-align:middle;">
								<input size='10' name='rsbbox_itembg_color' class='serviceboxs-itemsbg-color' type='text' id="rsbbox_itembg_color" value="<?php if($rsbbox_itembg_color !=''){echo $rsbbox_itembg_color;} else{ echo "#f8f8f8";} ?>" /><br>
								<span class="service_manager_hint"><?php esc_html_e('Choose Service Item Background Color.', 'service-boxs'); ?></span>
							</td>
						</tr>
						<!-- End Service Column -->

						<tr valign="top">
							<th scope="row">
								<label for="rsbbox_padding_size"><?php esc_html_e( 'Item Padding', 'service-boxs' ); ?></label>
							</th>
							<td style="vertical-align: middle;">
								<input size="4" type="number" name="rsbbox_padding_size" id="rsbbox_padding_size" maxlength="2" class="timezone_string" value="<?php if ( $rsbbox_padding_size != '' ) { echo $rsbbox_padding_size; } else { echo '15'; } ?>">
								<br/>
								<span class="logo_manager_hint"><?php esc_html_e( 'Choose Service Item Padding Size.', 'service-boxs' ); ?></span>
							</td>
						</tr>
						<!-- End Icon Font Size-->

						<tr valign="top">
							<th scope="row">
								<label for="rsbbox_hideicons"><?php esc_html_e( 'Show/Hide Icon', 'service-boxs' ); ?></label>
							</th>
							<td style="vertical-align: middle;">
								<div class="switch-field">
									<input type="radio" id="iconsbox_true" name="rsbbox_hideicons" value="1" <?php if ( $rsbbox_hideicons == '1' || $rsbbox_hideicons == '') echo 'checked'; ?>/>
									<label for="iconsbox_true"><?php esc_html_e( 'Show', 'service-boxs' ); ?></label>
									<input type="radio" id="iconsbox_false" name="rsbbox_hideicons" value="0" <?php if ( $rsbbox_hideicons == '0' ) echo 'checked'; ?>/>
									<label for="iconsbox_false" class="iconsbox_false"><?php esc_html_e( 'Hide', 'service-boxs' ); ?></label>
								</div><br>
								<span class="service_manager_hint"><?php esc_html_e('Show/Hide Service Icon.', 'service-boxs'); ?></span>
							</td>
						</tr>
						<!-- End hide Popup details page -->

						<tr valign="top">
							<th scope="row">
								<label for="rsbbox_itemicons_color"><?php esc_html_e('Item Icon Color', 'service-boxs'); ?></label>
							</th>
							<td style="vertical-align:middle;">
								<input size='10' name='rsbbox_itemicons_color' class='serviceboxs-itemsbg-color' type='text' id="rsbbox_itemicons_color" value="<?php if($rsbbox_itemicons_color !=''){echo $rsbbox_itemicons_color;} else{ echo "#000";} ?>" /><br>
								<span class="service_manager_hint"><?php esc_html_e('Choose Service Item Icon Color.', 'service-boxs'); ?></span>
							</td>
						</tr>
						<!-- End Icon Color -->

						<tr valign="top">
							<th scope="row">
								<label for="rsbbox_itemiconsbg_color"><?php esc_html_e('Item Icon Background Color', 'service-boxs'); ?></label>
							</th>
							<td style="vertical-align:middle;">
								<input size='10' name='rsbbox_itemiconsbg_color' class='serviceboxs-itemsbg-color' type='text' id="rsbbox_itemiconsbg_color" value="<?php if($rsbbox_itemiconsbg_color !=''){echo $rsbbox_itemiconsbg_color;} else{ echo "#dddddd";} ?>" /><br>
								<span class="service_manager_hint"><?php esc_html_e('Choose Service Item Icon Background Color.', 'service-boxs'); ?></span>
							</td>
						</tr>
						<!-- End Icon Background Color -->

						<tr valign="top">
							<th scope="row">
								<label for="rsbbox_iconsize"><?php esc_html_e( 'Icon Font Size', 'service-boxs' );?></label>
							</th>
							<td style="vertical-align: middle;">
								<input size="4" type="number" name="rsbbox_iconsize" id="rsbbox_iconsize" maxlength="2" class="timezone_string" value="<?php if ( $rsbbox_iconsize != '' ) { echo $rsbbox_iconsize; } else { echo '30'; } ?>">
								<br/>
								<span class="logo_manager_hint"><?php esc_html_e( 'Select Icon Font Size.', 'service-boxs' ); ?></span>
							</td>
						</tr>
						<!-- End Icon Font Size-->

						<tr valign="top">
							<th scope="row">
								<label for="rsbbox_iconheight"><?php esc_html_e( 'Icon Font Line Height', 'service-boxs' );?></label>
							</th>
							<td style="vertical-align: middle;">
								<input size="4" type="number" name="rsbbox_iconheight" id="rsbbox_iconheight" maxlength="2" class="timezone_string" value="<?php if ( $rsbbox_iconheight != '' ) { echo $rsbbox_iconheight; } else { echo '60'; } ?>">
								<br/>
								<span class="logo_manager_hint"><?php esc_html_e( 'Select Icon Font Line Height.', 'service-boxs' ); ?></span>
							</td>
						</tr>
						<!-- End Icon Font Line Height-->

						<tr valign="top">
							<th scope="row">
								<label for="rsbbox_hidetitle"><?php esc_html_e('Show/Hide Title', 'service-boxs');?></label>
							</th>
							<td style="vertical-align: middle;">
								<div class="switch-field">
									<input type="radio" id="titlebox_true" name="rsbbox_hidetitle" value="1" <?php if ( $rsbbox_hidetitle == '1' || $rsbbox_hidetitle == '') echo 'checked'; ?>/>
									<label for="titlebox_true"><?php esc_html_e( 'Show', 'service-boxs' ); ?></label>
									<input type="radio" id="titlebox_false" name="rsbbox_hidetitle" value="0" <?php if ( $rsbbox_hidetitle == '0' ) echo 'checked'; ?>/>
									<label for="titlebox_false" class="titlebox_false"><?php esc_html_e( 'Hide', 'service-boxs' ); ?></label>
								</div><br>
								<span class="service_manager_hint"><?php esc_html_e('Show/Hide Service Title.', 'service-boxs'); ?></span>
							</td>
						</tr>
						<!-- End Title Show/Hide -->

						<tr valign="top">
							<th scope="row">
								<label for="rsbbox_titlesize"><?php esc_html_e( 'Title Font Size', 'service-boxs' );?></label>
							</th>
							<td style="vertical-align: middle;">
								<input size="4" type="number" name="rsbbox_titlesize" id="rsbbox_titlesize" maxlength="2" class="timezone_string" value="<?php if ( $rsbbox_titlesize != '' ) { echo $rsbbox_titlesize; } else { echo '16'; } ?>">
								<br/>
								<span class="logo_manager_hint"><?php esc_html_e( 'Select Title Font Size.', 'service-boxs' ); ?></span>
							</td>
						</tr>
						<!-- End Title Font Size-->

						<tr valign="top">
							<th scope="row">
								<label for="rsbbox_itemtitle_color"><?php esc_html_e('Item Title Color', 'service-boxs'); ?></label>
							</th>
							<td style="vertical-align:middle;">
								<input size='10' name='rsbbox_itemtitle_color' class='serviceboxs-itemsbg-color' type='text' id="rsbbox_itemtitle_color" value="<?php if($rsbbox_itemtitle_color !=''){echo $rsbbox_itemtitle_color;} else{ echo "#000";} ?>" /><br>
								<span class="service_manager_hint"><?php esc_html_e('Choose Service Item Title Color.', 'service-boxs'); ?></span>
							</td>
						</tr>
						<!-- End Title Color -->

						<tr valign="top">
							<th scope="row">
								<label for="rsbbox_itemtitleh_color"><?php esc_html_e('Item Title Hover Color', 'service-boxs'); ?></label>
							</th>
							<td style="vertical-align:middle;">
								<input size='10' name='rsbbox_itemtitleh_color' class='serviceboxs-itemsbg-color' type='text' id="rsbbox_itemtitleh_color" value="<?php if($rsbbox_itemtitleh_color !=''){echo $rsbbox_itemtitleh_color;} else{ echo "#0056b3";} ?>" /><br>
								<span class="service_manager_hint"><?php esc_html_e('Choose Service Item Title Hover Color.', 'service-boxs'); ?></span>
							</td>
						</tr>
						<!-- End Title Hover Color -->

						<tr valign="top">
							<th scope="row">
								<label for="rsbbox_contentsize"><?php esc_html_e( 'Content Font Size', 'service-boxs' ); ?></label>
							</th>
							<td style="vertical-align: middle;">
								<input size="4" type="number" name="rsbbox_contentsize" id="rsbbox_contentsize" maxlength="2" class="timezone_string" value="<?php if ( $rsbbox_contentsize != '' ) { echo $rsbbox_contentsize; } else { echo '15'; } ?>">
								<br/>
								<span class="logo_manager_hint"><?php esc_html_e( 'Select Content Font Size.', 'service-boxs' ); ?></span>
							</td>
						</tr>
						<!-- End Content Font Size-->

						<tr valign="top">
							<th scope="row">
								<label for="rsbbox_conten_color"><?php esc_html_e('Item Content Color', 'service-boxs'); ?></label>
							</th>
							<td style="vertical-align:middle;">
								<input size='10' name='rsbbox_conten_color' class='serviceboxs-items-content-color' type='text' id="rsbbox_conten_color" value="<?php if($rsbbox_conten_color !=''){echo $rsbbox_conten_color;} else{ echo "#7c7c7c";} ?>" /><br>
								<span class="service_manager_hint"><?php esc_html_e('Choose Service Item Content Color.', 'service-boxs'); ?></span>
							</td>
						</tr>
						<!-- End Content Font Color -->

						<tr valign="top">
							<th scope="row">
								<label for="rsbbox_hidelinks"><?php esc_html_e('Show/Hide Link', 'service-boxs');?></label>
							</th>
							<td style="vertical-align: middle;">
								<div class="switch-field">
									<input type="radio" id="titlelinkbox_true" name="rsbbox_hidelinks" value="1" <?php if ( $rsbbox_hidelinks == '1' || $rsbbox_hidelinks == '') echo 'checked'; ?>/>
									<label for="titlelinkbox_true"><?php esc_html_e( 'Show', 'service-boxs' ); ?></label>
									<input type="radio" id="titlelinkbox_false" name="rsbbox_hidelinks" value="0" <?php if ( $rsbbox_hidelinks == '0' ) echo 'checked'; ?>/>
									<label for="titlelinkbox_false" class="titlelinkbox_false"><?php esc_html_e( 'Hide', 'service-boxs' ); ?></label>
								</div><br>
								<span class="service_manager_hint"><?php esc_html_e('Show/Hide Service Title Link.', 'service-boxs'); ?></span>
							</td>
						</tr>
						<!-- End Hide Link -->

						<tr valign="top">
							<th scope="row">
								<label for="rsbbox_linkopen"><?php esc_html_e( 'Link Open', 'service-boxs' ); ?></label>
							</th>
							<td style="vertical-align: middle;">
								<select name="rsbbox_linkopen" id="rsbbox_linkopen" class="timezone_string">
									<option value="_self" <?php if ( isset ( $rsbbox_linkopen ) ) selected( $rsbbox_linkopen, '_self' ); ?>><?php esc_html_e('Same Window', 'service-boxs'); ?></option>
									<option value="_blank" <?php if ( isset ( $rsbbox_linkopen ) ) selected( $rsbbox_linkopen, '_blank' ); ?>><?php esc_html_e('New Window', 'service-boxs'); ?></option>
								</select><br>
								<span class="service_manager_hint"><?php esc_html_e('Open Link to same page or new page.', 'service-boxs'); ?></span>
							</td>
						</tr>
						<!-- End Link Open -->

						<tr valign="top">
							<th scope="row">
								<label for="rsbbox_hidereadmore"><?php esc_html_e('Show/Hide Button', 'service-boxs'); ?></label>
							</th>
							<td style="vertical-align: middle;">
								<div class="switch-field">
									<input type="radio" id="buttonbox_true" name="rsbbox_hidereadmore" value="1" <?php if ( $rsbbox_hidereadmore == '1' || $rsbbox_hidereadmore == '') echo 'checked'; ?>/>
									<label for="buttonbox_true"><?php esc_html_e( 'Show', 'service-boxs' ); ?></label>
									<input type="radio" id="buttonbox_false" name="rsbbox_hidereadmore" value="0" <?php if ( $rsbbox_hidereadmore == '0' ) echo 'checked'; ?>/>
									<label for="buttonbox_false" class="buttonbox_false"><?php esc_html_e( 'Hide', 'service-boxs' ); ?></label>
								</div><br>
								<span class="service_manager_hint"><?php esc_html_e('Show/Hide Service Title.', 'service-boxs'); ?></span>
							</td>
						</tr>
						<!-- End Read More Show/Hide -->

						<tr valign="top">
							<th scope="row">
								<label for="rsbbox_moreoption_color"><?php esc_html_e('Button Font Color', 'service-boxs'); ?></label>
							</th>
							<td style="vertical-align:middle;">
								<input size='10' name='rsbbox_moreoption_color' class='serviceboxs-header-font-color' type='text' id="rsbbox_moreoption_color" value="<?php if($rsbbox_moreoption_color !=''){echo $rsbbox_moreoption_color;} else{ echo "#000";} ?>" /><br>
								<span class="service_manager_hint"><?php esc_html_e('Choose Button Font Color.', 'service-boxs'); ?></span>
							</td>
						</tr>
						<!-- End Button Font Color -->
						
						<tr valign="top">
							<th scope="row">
								<label for="rsbbox_moreoptionhover_color"><?php esc_html_e('Button Hover Font Color', 'service-boxs'); ?></label>
							</th>
							<td style="vertical-align:middle;">
								<input size='10' name='rsbbox_moreoptionhover_color' class='serviceboxs-hover-header-font-color' type='text' id="rsbbox_moreoptionhover_color" value="<?php if($rsbbox_moreoptionhover_color !=''){echo $rsbbox_moreoptionhover_color;} else{ echo "#0056b3";} ?>" /><br>
								<span class="service_manager_hint"><?php esc_html_e('Choose Button Hover Font Color.', 'service-boxs'); ?></span>
							</td>
						</tr>
						<!-- End Button Hover Font Color -->
						
						<tr valign="top">
							<th scope="row">
								<label for="rsbbox_moresize"><?php esc_html_e( 'Button Font Size', 'service-boxs' ); ?></label>
							</th>
							<td style="vertical-align: middle;">
								<input size="4" type="number" name="rsbbox_moresize" id="rsbbox_moresize" maxlength="2" class="timezone_string" value="<?php if ( $rsbbox_moresize != '' ) { echo $rsbbox_moresize; } else { echo '14'; } ?>">
								<br/>
								<span class="logo_manager_hint"><?php esc_html_e( 'Select Button Font Size.', 'service-boxs' ); ?></span>
							</td>
						</tr>
						<!-- End Button Font Size-->
					</table>
				</div>
			</div>	
		</li>
		<li style="<?php if($nav_value == 4){echo "display: block;";} else{ echo "display: none;"; }?>" class="box4 tab-box <?php if($nav_value == 4){echo "active";}?>">
			<div class="wrap">
				<div class="option-box">
					<p class="option-title"><?php esc_html_e('Slider Settings ( Pro Only )','service-boxs'); ?></p>
					<table class="form-table">
						<tr valign="top">
							<th scope="row">
								<label for="rssbox_slide_autoplay"><?php esc_html_e('Slider Autoplay', 'service-boxs'); ?></label>
							</th>
							<td style="vertical-align: middle;">
								<select name="rssbox_slide_autoplay" id="rssbox_slide_autoplay" class="timezone_string">
									<option value="true" <?php if ( isset ( $rssbox_slide_autoplay ) ) selected( $rssbox_slide_autoplay, 'true' ); ?>><?php esc_html_e('True', 'service-boxs'); ?></option>
									<option value="false" <?php if ( isset ( $rssbox_slide_autoplay ) ) selected( $rssbox_slide_autoplay, 'false' ); ?>><?php esc_html_e('False', 'service-boxs'); ?></option>
								</select><br />
								<span class="rsboxservicehints"><?php esc_html_e('Choose Service Box Autoplay options. default Autoplay: Enable', 'service-boxs'); ?></span>
							</td>
						</tr>
						<!-- End Slider Autoplay -->

						<tr valign="top">
							<th scope="row">
								<label for="rssbox_slide_speeds"><?php esc_html_e('Slide Delay Time', 'service-boxs'); ?></label>
							</th>
							<td style="vertical-align: middle;">
								<input type="text" name="rssbox_slide_speeds" id="rssbox_slide_speeds" maxlength="4" class="timezone_string" required value="<?php  if($rssbox_slide_speeds !=''){echo $rssbox_slide_speeds; }else{ echo '1500';} ?>"><br />
								<span class="rsboxservicehints"><?php esc_html_e('Input service box slide delay speed. input only number(700,800,1200 etc)', 'service-boxs'); ?></span>
							</td>
						</tr>
						<!-- End Slide Delay Time -->

						<tr valign="top">
							<th scope="row">
								<label for="rssbox_slide_stophovers"><?php esc_html_e('Slider Autoplay', 'service-boxs'); ?></label>
							</th>
							<td style="vertical-align: middle;">
								<select name="rssbox_slide_stophovers" id="rssbox_slide_stophovers" class="timezone_string">
									<option value="true" <?php if ( isset ( $rssbox_slide_stophovers ) ) selected( $rssbox_slide_stophovers, 'true' ); ?>><?php esc_html_e('True', 'service-boxs'); ?></option>	
									<option value="false" <?php if ( isset ( $rssbox_slide_stophovers ) ) selected( $rssbox_slide_stophovers, 'false' ); ?>><?php esc_html_e('False', 'service-boxs'); ?></option>
								</select><br />
								<span class="rsboxservicehints"><?php esc_html_e('Choose Service Box Autoplay options. default Autoplay: Enable', 'service-boxs'); ?></span>
							</td>
						</tr>
						<!-- End Slider Autoplay -->

						<tr valign="top">
							<th scope="row">
								<label for="rssbox_slide_timeout"><?php esc_html_e('Autoplay Time Out (Sec)', 'service-boxs'); ?></label>
							</th>
							<td style="vertical-align: middle;">
								<select name="rssbox_slide_timeout" id="rssbox_slide_timeout" class="timezone_string">
									<option value="1000" <?php if ( isset ( $rssbox_slide_timeout ) ) selected( $rssbox_slide_timeout, '1000' ); ?>><?php esc_html_e('1', 'service-boxs'); ?></option>
									<option value="2000" <?php if ( isset ( $rssbox_slide_timeout ) ) selected( $rssbox_slide_timeout, '2000' ); ?>><?php esc_html_e('2 ', 'service-boxs'); ?></option>
									<option value="3000" <?php if ( isset ( $rssbox_slide_timeout ) ) selected( $rssbox_slide_timeout, '3000' ); ?>><?php esc_html_e('3 ', 'service-boxs'); ?></option>
									<option value="4000" <?php if ( isset ( $rssbox_slide_timeout ) ) selected( $rssbox_slide_timeout, '4000' ); ?>><?php esc_html_e('4 ', 'service-boxs'); ?></option>
									<option value="5000" <?php if ( isset ( $rssbox_slide_timeout ) ) selected( $rssbox_slide_timeout, '5000' ); ?>><?php esc_html_e('5 ', 'service-boxs'); ?></option>
									<option value="6000" <?php if ( isset ( $rssbox_slide_timeout ) ) selected( $rssbox_slide_timeout, '6000' ); ?>><?php esc_html_e('6 ', 'service-boxs'); ?></option>
									<option value="7000" <?php if ( isset ( $rssbox_slide_timeout ) ) selected( $rssbox_slide_timeout, '7000' ); ?>><?php esc_html_e('7 ', 'service-boxs'); ?></option>
									<option value="8000" <?php if ( isset ( $rssbox_slide_timeout ) ) selected( $rssbox_slide_timeout, '8000' ); ?>><?php esc_html_e('8 ', 'service-boxs'); ?></option>
									<option value="9000" <?php if ( isset ( $rssbox_slide_timeout ) ) selected( $rssbox_slide_timeout, '9000' ); ?>><?php esc_html_e('9 ', 'service-boxs'); ?></option>
									<option value="10000" <?php if ( isset ( $rssbox_slide_timeout ) ) selected( $rssbox_slide_timeout, '10000' ); ?>><?php esc_html_e('10', 'service-boxs'); ?></option>
								</select><br />
								<span class="rsboxservicehints"><?php esc_html_e('Choose Service Box Autoplay time out (Sec). default:(1000sec)', 'service-boxs'); ?></span>
							</td>
						</tr>
						<!-- End Slider Autoplay Time Out (Sec) -->

						<tr valign="top">
							<th scope="row">
								<label for="rssbox_slide_items_alls"><?php esc_html_e('Item Number', 'service-boxs'); ?></label>
							</th>
							<td style="vertical-align: middle;">
								<select name="rssbox_slide_items_alls" id="rssbox_slide_items_alls" class="timezone_string">
									<option value="3" <?php if ( isset ( $rssbox_slide_items_alls ) )  selected( $rssbox_slide_items_alls, '3' ); ?>><?php esc_html_e('3', 'service-boxs'); ?></option>
									<option value="1" <?php if ( isset ( $rssbox_slide_items_alls ) )  selected( $rssbox_slide_items_alls, '1' ); ?>><?php esc_html_e('1', 'service-boxs'); ?></option>
									<option value="2" <?php if ( isset ( $rssbox_slide_items_alls ) )  selected( $rssbox_slide_items_alls, '2' ); ?>><?php esc_html_e('2', 'service-boxs'); ?></option>
									<option value="4" <?php if ( isset ( $rssbox_slide_items_alls ) )  selected( $rssbox_slide_items_alls, '4' ); ?>><?php esc_html_e('4', 'service-boxs'); ?></option>
									<option value="5" <?php if ( isset ( $rssbox_slide_items_alls ) )  selected( $rssbox_slide_items_alls, '5' ); ?>><?php esc_html_e('5 ', 'service-boxs'); ?></option>
									<option value="6" <?php if ( isset ( $rssbox_slide_items_alls ) )  selected( $rssbox_slide_items_alls, '6' ); ?>><?php esc_html_e('6 ', 'service-boxs'); ?></option>
									<option value="7" <?php if ( isset ( $rssbox_slide_items_alls ) )  selected( $rssbox_slide_items_alls, '7' ); ?>><?php esc_html_e('7 ', 'service-boxs'); ?></option>
									<option value="8" <?php if ( isset ( $rssbox_slide_items_alls ) )  selected( $rssbox_slide_items_alls, '8' ); ?>><?php esc_html_e('8 ', 'service-boxs'); ?></option>
									<option value="9" <?php if ( isset ( $rssbox_slide_items_alls ) )  selected( $rssbox_slide_items_alls, '9' ); ?>><?php esc_html_e('9 ', 'service-boxs'); ?></option>
									<option value="10" <?php if ( isset ( $rssbox_slide_items_alls ) ) selected( $rssbox_slide_items_alls, '10' ); ?>><?php esc_html_e('10 ', 'service-boxs'); ?></option>
								</select><br />
								<span class="rsboxservicehints"><?php esc_html_e('Choose Service Box total item display per slide. default: 3 items', 'service-boxs'); ?></span>
							</td>
						</tr>
						<!-- End Slider Item Number -->

						<tr valign="top">
							<th scope="row">
								<label for="rssbox_slide_items_dsks"><?php esc_html_e('Item Desktop', 'service-boxs'); ?></label>
							</th>
							<td style="vertical-align: middle;">
								<select name="rssbox_slide_items_dsks" id="rssbox_slide_items_dsks" class="timezone_string">
									<option value="3" <?php if ( isset ( $rssbox_slide_items_dsks ) ) selected( $rssbox_slide_items_dsks, '3' ); ?>><?php esc_html_e('3', 'service-boxs'); ?></option>
									<option value="1" <?php if ( isset ( $rssbox_slide_items_dsks ) ) selected( $rssbox_slide_items_dsks, '1' ); ?>><?php esc_html_e('1', 'service-boxs'); ?></option>
									<option value="2" <?php if ( isset ( $rssbox_slide_items_dsks ) ) selected( $rssbox_slide_items_dsks, '2' ); ?>><?php esc_html_e('2', 'service-boxs'); ?></option>
									<option value="4" <?php if ( isset ( $rssbox_slide_items_dsks ) ) selected( $rssbox_slide_items_dsks, '4' ); ?>><?php esc_html_e('4', 'service-boxs'); ?></option>
									<option value="5" <?php if ( isset ( $rssbox_slide_items_dsks ) ) selected( $rssbox_slide_items_dsks, '5' ); ?>><?php esc_html_e('5', 'service-boxs'); ?></option>
									<option value="6" <?php if ( isset ( $rssbox_slide_items_dsks ) ) selected( $rssbox_slide_items_dsks, '6' ); ?>><?php esc_html_e('6', 'service-boxs'); ?></option>
									<option value="7" <?php if ( isset ( $rssbox_slide_items_dsks ) ) selected( $rssbox_slide_items_dsks, '7' ); ?>><?php esc_html_e('7', 'service-boxs'); ?></option>
									<option value="8" <?php if ( isset ( $rssbox_slide_items_dsks ) ) selected( $rssbox_slide_items_dsks, '8' ); ?>><?php esc_html_e('8', 'service-boxs'); ?></option>
									<option value="9" <?php if ( isset ( $rssbox_slide_items_dsks ) ) selected( $rssbox_slide_items_dsks, '9' ); ?>><?php esc_html_e('9', 'service-boxs'); ?></option>
									<option value="10" <?php if ( isset ( $rssbox_slide_items_dsks ) ) selected( $rssbox_slide_items_dsks, '10' ); ?>><?php esc_html_e('10', 'service-boxs'); ?></option>
								</select><br />
								<span class="rsboxservicehints"><?php esc_html_e('Choose Service Box total items display on desktop. default:3', 'service-boxs'); ?></span>
							</td>
						</tr>
						<!-- End Slider Item Desktop -->

						<tr valign="top">
							<th scope="row">
								<label for="rssbox_slide_items_dsksmall"><?php esc_html_e('Item Desktop Small', 'service-boxs'); ?></label>
							</th>
							<td style="vertical-align: middle;">
								<select name="rssbox_slide_items_dsksmall" id="rssbox_slide_items_dsksmall" class="timezone_string">
									<option value="1" <?php if ( isset ( $rssbox_slide_items_dsksmall ) ) selected( $rssbox_slide_items_dsksmall, '1' ); ?>><?php esc_html_e('1', 'service-boxs'); ?></option>
									<option value="2" <?php if ( isset ( $rssbox_slide_items_dsksmall ) ) selected( $rssbox_slide_items_dsksmall, '2' ); ?>><?php esc_html_e('2', 'service-boxs'); ?></option>
									<option value="3" <?php if ( isset ( $rssbox_slide_items_dsksmall ) ) selected( $rssbox_slide_items_dsksmall, '3' ); ?>><?php esc_html_e('3', 'service-boxs'); ?></option>
									<option value="4" <?php if ( isset ( $rssbox_slide_items_dsksmall ) ) selected( $rssbox_slide_items_dsksmall, '4' ); ?>><?php esc_html_e('4', 'service-boxs'); ?></option>
									<option value="5" <?php if ( isset ( $rssbox_slide_items_dsksmall ) ) selected( $rssbox_slide_items_dsksmall, '5' ); ?>><?php esc_html_e('5', 'service-boxs'); ?></option>
									<option value="6" <?php if ( isset ( $rssbox_slide_items_dsksmall ) ) selected( $rssbox_slide_items_dsksmall, '6' ); ?>><?php esc_html_e('6', 'service-boxs'); ?></option>
									<option value="7" <?php if ( isset ( $rssbox_slide_items_dsksmall ) ) selected( $rssbox_slide_items_dsksmall, '7' ); ?>><?php esc_html_e('7', 'service-boxs'); ?></option>
									<option value="8" <?php if ( isset ( $rssbox_slide_items_dsksmall ) ) selected( $rssbox_slide_items_dsksmall, '8' ); ?>><?php esc_html_e('8', 'service-boxs'); ?></option>
									<option value="9" <?php if ( isset ( $rssbox_slide_items_dsksmall ) ) selected( $rssbox_slide_items_dsksmall, '9' ); ?>><?php esc_html_e('9', 'service-boxs'); ?></option>
									<option value="10" <?php if ( isset ( $rssbox_slide_items_dsksmall ) ) selected( $rssbox_slide_items_dsksmall, '10' ); ?>><?php esc_html_e('10', 'service-boxs'); ?></option>
								</select><br />
								<span class="rsboxservicehints"><?php esc_html_e('Choose Service Box total items display on desktop small. default:1', 'service-boxs'); ?></span>
							</td>
						</tr>
						<!-- End Item Desktop Small -->

						<tr valign="top">
							<th scope="row">
								<label for="rssbox_slide_items_mob"><?php esc_html_e('Item Mobile', 'service-boxs'); ?></label>
							</th>
							<td style="vertical-align: middle;">
								<select name="rssbox_slide_items_mob" id="rssbox_slide_items_mob" class="timezone_string">
									<option value="1" <?php if ( isset ( $rssbox_slide_items_mob ) ) selected( $rssbox_slide_items_mob, '1' ); ?>><?php esc_html_e('1', 'service-boxs'); ?></option>
									<option value="2" <?php if ( isset ( $rssbox_slide_items_mob ) ) selected( $rssbox_slide_items_mob, '2' ); ?>><?php esc_html_e('2', 'service-boxs'); ?></option>
									<option value="3" <?php if ( isset ( $rssbox_slide_items_mob ) ) selected( $rssbox_slide_items_mob, '3' ); ?>><?php esc_html_e('3', 'service-boxs'); ?></option>
									<option value="4" <?php if ( isset ( $rssbox_slide_items_mob ) ) selected( $rssbox_slide_items_mob, '4' ); ?>><?php esc_html_e('4', 'service-boxs'); ?></option>
									<option value="5" <?php if ( isset ( $rssbox_slide_items_mob ) ) selected( $rssbox_slide_items_mob, '5' ); ?>><?php esc_html_e('5', 'service-boxs'); ?></option>
									<option value="6" <?php if ( isset ( $rssbox_slide_items_mob ) ) selected( $rssbox_slide_items_mob, '6' ); ?>><?php esc_html_e('6', 'service-boxs'); ?></option>
									<option value="7" <?php if ( isset ( $rssbox_slide_items_mob ) ) selected( $rssbox_slide_items_mob, '7' ); ?>><?php esc_html_e('7', 'service-boxs'); ?></option>
									<option value="8" <?php if ( isset ( $rssbox_slide_items_mob ) ) selected( $rssbox_slide_items_mob, '8' ); ?>><?php esc_html_e('8', 'service-boxs'); ?></option>
									<option value="9" <?php if ( isset ( $rssbox_slide_items_mob ) ) selected( $rssbox_slide_items_mob, '9' ); ?>><?php esc_html_e('9', 'service-boxs'); ?></option>
									<option value="10" <?php if ( isset ( $rssbox_slide_items_mob ) ) selected( $rssbox_slide_items_mob, '10' ); ?>><?php esc_html_e('10', 'service-boxs'); ?></option>
								</select><br />
								<span class="rsboxservicehints"><?php esc_html_e('Choose Service Box total items display on mobile devices. default:1', 'service-boxs'); ?></span>
							</td>
						</tr>
						<!-- End Item Desktop Small -->

						<tr valign="top">
							<th scope="row">
								<label for="rssbox_slide_loops"><?php esc_html_e('Loop', 'service-boxs'); ?></label>
							</th>
							<td style="vertical-align: middle;">
								<select name="rssbox_slide_loops" id="rssbox_slide_loops" class="timezone_string">
									<option value="true" <?php if ( isset ( $rssbox_slide_loops ) ) selected( $rssbox_slide_loops, 'true' ); ?>><?php esc_html_e('True', 'service-boxs'); ?></option>
									<option value="false" <?php if ( isset ( $rssbox_slide_loops ) ) selected( $rssbox_slide_loops, 'false' ); ?>><?php esc_html_e('False', 'service-boxs'); ?></option>
								</select><br />
								<span class="rsboxservicehints"><?php esc_html_e('Choose Service Box items loop. default Mode: Enable', 'service-boxs'); ?></span>
							</td>
						</tr>
						<!-- End Item Desktop Small -->

						<tr valign="top">
							<th scope="row">
								<label for="rssbox_slide_margins"><?php esc_html_e('Item Margin', 'service-boxs'); ?></label>
							</th>
							<td style="vertical-align: middle;">
								<input type="number" name="rssbox_slide_margins" id="rssbox_slide_margins" maxlength="3" class="timezone_string" value="<?php if($rssbox_slide_margins !=''){echo $rssbox_slide_margins;} else{ echo '10'; } ?>" value="0"><br />
								<span class="rsboxservicehints"><?php esc_html_e('Choose service box slide item margin. default margin: 10px', 'service-boxs'); ?></span>
							</td>
						</tr>
						<!-- End Slide Delay Time -->

						<tr valign="top">
							<th scope="row">
								<label for="rssbox_slide_navi"><?php esc_html_e('Navigation', 'service-boxs'); ?></label>
							</th>
							<td style="vertical-align: middle;">
								<select name="rssbox_slide_navi" id="rssbox_slide_navi" class="timezone_string">
									<option value="true" <?php if ( isset ( $rssbox_slide_navi ) ) selected( $rssbox_slide_navi, 'true' ); ?>><?php esc_html_e('True', 'service-boxs'); ?></option>
									<option value="false" <?php if ( isset ( $rssbox_slide_navi ) ) selected( $rssbox_slide_navi, 'false' ); ?>><?php esc_html_e('False', 'service-boxs'); ?></option>
								</select><br />
								<span class="rsboxservicehints"><?php esc_html_e('Choose Service Box Navigation Mode. default Mode: Enable', 'service-boxs'); ?></span>
							</td>
						</tr>
						<!-- End Slider Navigation -->

						<tr valign="top">
							<th scope="row">
								<label for="rssbox_slide_navi_position"><?php esc_html_e('Navigation Position', 'service-boxs'); ?></label>
							</th>
							<td style="vertical-align: middle;">
								<select name="rssbox_slide_navi_position" id="rssbox_slide_navi_position" class="timezone_string">
									<option value="1" <?php if ( isset ( $rssbox_slide_navi_position ) ) selected( $rssbox_slide_navi_position, '1' ); ?>><?php esc_html_e('Top Right', 'service-boxs'); ?></option>
									<option value="2" <?php if ( isset ( $rssbox_slide_navi_position ) ) selected( $rssbox_slide_navi_position, '2' ); ?>><?php esc_html_e('Top Left', 'service-boxs'); ?></option>
									<option value="3" <?php if ( isset ( $rssbox_slide_navi_position ) ) selected( $rssbox_slide_navi_position, '3' ); ?>><?php esc_html_e('Centred', 'service-boxs'); ?></option>
								</select><br />
								<span class="rsboxservicehints"><?php esc_html_e('Choose Service Box Navigation Position. default Position: Top Right', 'service-boxs'); ?></span>
							</td>
						</tr>
						<!-- End Slider Navigation -->

						<tr valign="top">
							<th scope="row">
								<label for="rssbox_slide_navtext_color"><?php esc_html_e('Navigation Color', 'service-boxs'); ?></label>
							</th>
							<td style="vertical-align:middle;">
								<input size='10' name='rssbox_slide_navtext_color' class='serviceboxs-navtext-color' type='text' id="rssbox_slide_navtext_color" value="<?php if($rssbox_slide_navtext_color !=''){echo $rssbox_slide_navtext_color;} else{ echo "#ffffff";} ?>" /><br />
								<span class="rsboxservicehints"><?php esc_html_e('Choose service box slide Navigation text color. default color:#ffffff ', 'service-boxs'); ?></span>
							</td>
						</tr>
						<!-- End Slide Navigation Color -->

						<tr valign="top">
							<th scope="row">
								<label for="rssbox_slide_navbg_color"><?php esc_html_e('Navigation Background Color', 'service-boxs'); ?></label>
							</th>
							<td style="vertical-align:middle;">
								<input size='10' name='rssbox_slide_navbg_color' class='serviceboxs-navbg-color' type='text' id="rssbox_slide_navbg_color" value="<?php if($rssbox_slide_navbg_color !=''){echo $rssbox_slide_navbg_color;} else{ echo "#000000";} ?>" /><br />
								<span class="rsboxservicehints"><?php esc_html_e('Choose service box slide Navigation background color. default color:#000 ', 'service-boxs'); ?></span>
							</td>
						</tr>
						<!-- End Navigation Background Color -->

						<tr valign="top">
							<th scope="row">
								<label for="rssbox_slide_navho_color"><?php esc_html_e('Navigation Hover Bg Color', 'service-boxs'); ?></label>
							</th>
							<td style="vertical-align:middle;">
								<input size='10' name='rssbox_slide_navho_color' class='serviceboxs-navho-color' type='text' id="rssbox_slide_navho_color" value="<?php if($rssbox_slide_navho_color !=''){echo $rssbox_slide_navho_color;} else{ echo "#666666";} ?>" /><br />
								<span class="rsboxservicehints"><?php esc_html_e('Choose service box Navigation hover background color. default color:#666 ', 'service-boxs'); ?></span>
							</td>
						</tr>
						<!-- End Navigation Background Color -->

						<tr valign="top">
							<th scope="row">
								<label for="rssbox_slide_pagi"><?php esc_html_e('Pagination', 'service-boxs'); ?></label>
							</th>
							<td style="vertical-align: middle;">
								<select name="rssbox_slide_pagi" id="rssbox_slide_pagi" class="timezone_string">
									<option value="true" <?php if ( isset ( $rssbox_slide_pagi ) ) selected( $rssbox_slide_pagi, 'true' ); ?>><?php esc_html_e('True', 'service-boxs'); ?></option>
									<option value="false" <?php if ( isset ( $rssbox_slide_pagi ) ) selected( $rssbox_slide_pagi, 'false' ); ?>><?php esc_html_e('False', 'service-boxs'); ?></option>
								</select><br />
								<span class="rsboxservicehints"><?php esc_html_e('Choose Service Box Pagination Mode. default Mode: Enable', 'service-boxs'); ?></span>
							</td>
						</tr>
						<!-- End Slider Pagination -->

						<tr valign="top">
							<th scope="row">
								<label for="rssbox_slide_pagi_color"><?php esc_html_e('Pagination Color', 'service-boxs'); ?></label>
							</th>
							<td style="vertical-align:middle;">
								<input size='10' name='rssbox_slide_pagi_color' class='serviceboxs-navpagi-color' type='text' id="rssbox_slide_pagi_color" value="<?php if($rssbox_slide_pagi_color !=''){echo $rssbox_slide_pagi_color;} else{ echo "#000000";} ?>" /><br />
								<span class="rsboxservicehints"><?php esc_html_e('Choose service box slide Pagination color. default color:#000 ', 'service-boxs'); ?></span>
							</td>
						</tr>
						<!-- End Navigation Background Color -->

						<tr valign="top">
							<th scope="row">
								<label for="rssbox_slide_pagi_style"><?php esc_html_e('Pagination Style', 'service-boxs'); ?></label>
							</th>
							<td style="vertical-align: middle;">
								<select name="rssbox_slide_pagi_style" id="rssbox_slide_pagi_style" class="timezone_string">
									<option value="1" <?php if ( isset ( $rssbox_slide_pagi_style ) ) selected( $rssbox_slide_pagi_style, '1' ); ?>><?php esc_html_e('Round', 'service-boxs'); ?></option>
									<option value="2" <?php if ( isset ( $rssbox_slide_pagi_style ) ) selected( $rssbox_slide_pagi_style, '2' ); ?>><?php esc_html_e('Square', 'service-boxs'); ?></option>
								</select><br />
								<span class="rsboxservicehints"><?php esc_html_e('Choose Service Box Pagination Style. default style:Round', 'service-boxs'); ?></span>
							</td>
						</tr>
						<!-- End Slider Pagination Style -->

						<tr valign="top">
							<th scope="row">
								<label for="rssbox_slide_pagiposition"><?php esc_html_e('Pagination Position', 'service-boxs'); ?></label>
							</th>
							<td style="vertical-align: middle;">
								<select name="rssbox_slide_pagiposition" id="rssbox_slide_pagiposition" class="timezone_string">
									<option value="center" <?php if ( isset ( $rssbox_slide_pagiposition ) ) selected( $rssbox_slide_pagiposition, 'center' ); ?>><?php esc_html_e('Center', 'service-boxs'); ?></option>
									<option value="left" <?php if ( isset ( $rssbox_slide_pagiposition ) ) selected( $rssbox_slide_pagiposition, 'left' ); ?>><?php esc_html_e('Left', 'service-boxs'); ?></option>
									<option value="right" <?php if ( isset ( $rssbox_slide_pagiposition ) ) selected( $rssbox_slide_pagiposition, 'right' ); ?>><?php esc_html_e('Right', 'service-boxs'); ?></option>
								</select><br />
								<span class="rsboxservicehints"><?php esc_html_e('Choose Service Box Pagination Position. default position: Center', 'service-boxs'); ?></span>
							</td>
						</tr>
						<!-- End Slider Pagination Position -->

					</table>
				</div>
			</div>
		</li>
		<!-- Tab 4  -->

		<style>
			.switch-field {
			  display: flex;
			  overflow: hidden;
			}
			.switch-field input {
			  position: absolute !important;
			  clip: rect(0, 0, 0, 0);
			  height: 1px;
			  width: 1px;
			  border: 0;
			  overflow: hidden;
			}
			.switch-field label {
			  background-color: #e4e4e4;
			  color: rgba(0, 0, 0, 0.6);
			  font-size: 14px;
			  line-height: 1;
			  text-align: center;
			  padding: 8px 16px;
			  margin-right: -1px;
			  border: 1px solid rgba(0, 0, 0, 0.2);
			  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.1);
			  transition: all 0.1s ease-in-out;
			}
			.switch-field label:hover {
			  cursor: pointer;
			}
			.switch-field input:checked + label {
			  background-color: #0073aa;
			  color:#fff;
			  box-shadow: none;
			}
			.switch-field input:checked + label.titlelinkbox_false,
			.switch-field input:checked + label.buttonbox_false,
			.switch-field input:checked + label.titlebox_false,
			.switch-field input:checked + label.iconsbox_false {
			  background-color: red;
			  color:#fff;
			  box-shadow: none;
			}
			.switch-field label:first-of-type {
			  border-radius: 4px 0 0 4px;
			}
			.switch-field label:last-of-type {
			  border-radius: 0 4px 4px 0;
			}
		</style>

		<script type="text/javascript">
			jQuery(document).ready(function($){	
				$('#rsbbox_moreoption_color,#rsbbox_moreoptionhover_color,#rsbbox_itembg_color,#rsbbox_itemtitle_color,#rsbbox_itemtitleh_color,#rsbbox_conten_color,#rsbbox_itemicons_color,#rsbbox_itemiconsbg_color,#rssbox_slide_navtext_color,#rssbox_slide_navbg_color,#rssbox_slide_navho_color,#rssbox_slide_pagi_color,#rssbox_slide_pagi_color').wpColorPicker();
			});
		</script>
	</ul>
</div>
<?php
}

# Data save in custom metabox field
function rsbboxsave_meta_value($post_id){

    // Check if this is an autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    // Check if the user has permission to edit the post
    if (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

	// Checks for input and sanitizes before saving if needed
	if( isset( $_POST['rsbbox_catnames'] ) ) {
	    // Sanitize the input before saving to the database
	    $rsbbox_catnames = sanitize_text_field( $_POST['rsbbox_catnames'] );
	    
	    // Update post meta with sanitized value
	    update_post_meta( $post_id, 'rsbbox_catnames', $rsbbox_catnames );
	} else {
	    // If not set, set a default value (e.g., 'unchecked') and save it
	    update_post_meta( $post_id, 'rsbbox_catnames', 'unchecked' );
	}

	// Sanitize and save field
	if ( isset( $_POST[ 'rsbbox_theme_id' ] ) ) {
		$rsbbox_theme_id = sanitize_text_field( $_POST['rsbbox_theme_id'] );
		update_post_meta( $post_id, 'rsbbox_theme_id', $rsbbox_theme_id );
	}

	// Sanitize and save field
	if ( isset( $_POST[ 'rsbbox_servicetypes' ] ) ) {
		$rsbbox_servicetypes = sanitize_text_field( $_POST['rsbbox_servicetypes'] );
		update_post_meta( $post_id, 'rsbbox_servicetypes', $rsbbox_servicetypes );
	}

	// Sanitize and save field
	if ( isset( $_POST[ 'rsbbox_columns' ] ) ) {
		$rsbbox_columns = sanitize_text_field( $_POST['rsbbox_columns'] );
		update_post_meta( $post_id, 'rsbbox_columns', $rsbbox_columns );
	}

	#Value check and saves if needed
    if (isset($_POST['tup_biography'])) {
        $tup_biography = sanitize_text_field($_POST['tup_biography']);
        update_post_meta($post_id, 'tup_biography', $tup_biography);
    }

	#Value check and saves if needed
    if (isset($_POST['ftw_icon'])) {
        $ftw_icon = sanitize_text_field($_POST['ftw_icon']);
        update_post_meta($post_id, 'ftw_icon', $ftw_icon);
    }

	#Value check and saves if needed
    if (isset($_POST['rsbbox_button_text'])) {
        $rsbbox_button_text = sanitize_text_field($_POST['rsbbox_button_text']);
        update_post_meta($post_id, 'rsbbox_button_text', $rsbbox_button_text);
    }

	#Value check and saves if needed
    if (isset($_POST['rsbbox_url'])) {
        $rsbbox_url = esc_url_raw($_POST['rsbbox_url']); // sanitize URL
        update_post_meta($post_id, 'rsbbox_url', $rsbbox_url);
    }

	// Sanitize and save field
	if ( isset( $_POST[ 'rsbbox_icon_color' ] ) ) {
		$rsbbox_icon_color = sanitize_hex_color( $_POST['rsbbox_icon_color'] );
		update_post_meta( $post_id, 'rsbbox_icon_color', $rsbbox_icon_color );
	}

	// Sanitize and save field
	if ( isset( $_POST[ 'rsbbox_iconbg_color' ] ) ) {
		$rsbbox_iconbg_color = sanitize_hex_color( $_POST['rsbbox_iconbg_color'] );
		update_post_meta( $post_id, 'rsbbox_iconbg_color', $rsbbox_iconbg_color );
	}

	// Sanitize and save field
	if ( isset( $_POST[ 'rsbbox_back_color' ] ) ) {
		$rsbbox_back_color = sanitize_hex_color( $_POST['rsbbox_back_color'] );
		update_post_meta( $post_id, 'rsbbox_back_color', $rsbbox_back_color );
	}

	// Sanitize and save field
	if ( isset( $_POST[ 'rsbbox_title_color' ] ) ) {
		$rsbbox_title_color = sanitize_hex_color( $_POST['rsbbox_title_color'] );
		update_post_meta( $post_id, 'rsbbox_title_color', $rsbbox_title_color );
	}

	// Sanitize and save field
	if ( isset( $_POST[ 'rsbbox_content_color' ] ) ) {
		$rsbbox_content_color = sanitize_hex_color( $_POST['rsbbox_content_color'] );
		update_post_meta( $post_id, 'rsbbox_content_color', $rsbbox_content_color );
	}

	// Sanitize and save 'tp_imgborder_color_option' field
	if ( isset( $_POST[ 'rsbbox_moresize_color' ] ) ) {
		$rsbbox_moresize_color = sanitize_hex_color( $_POST['rsbbox_moresize_color'] );
		update_post_meta( $post_id, 'rsbbox_moresize_color', $rsbbox_moresize_color );
	}

	#Value check and saves if needed
    if (isset($_POST['rsbbox_hideicons'])) {
        $rsbbox_hideicons = sanitize_text_field($_POST['rsbbox_hideicons']);
        update_post_meta($post_id, 'rsbbox_hideicons', $rsbbox_hideicons);
    }

	#Checks for input and saves if needed
	if ( isset( $_POST[ 'rsbbox_iconsize' ] ) ) {
	    $rsbbox_iconsize = intval( $_POST['rsbbox_iconsize'] );
	    update_post_meta( $post_id, 'rsbbox_iconsize', $rsbbox_iconsize );
	}

	#Checks for input and saves if needed
	if ( isset( $_POST[ 'rsbbox_iconheight' ] ) ) {
	    $rsbbox_iconheight = intval( $_POST['rsbbox_iconheight'] );
	    update_post_meta( $post_id, 'rsbbox_iconheight', $rsbbox_iconheight );
	}

	#Value check and saves if needed
    if (isset($_POST['rsbbox_hidetitle'])) {
        $rsbbox_hidetitle = sanitize_text_field($_POST['rsbbox_hidetitle']);
        update_post_meta($post_id, 'rsbbox_hidetitle', $rsbbox_hidetitle);
    }

	if ( isset( $_POST[ 'rsbbox_titlesize' ] ) ) {
	    $rsbbox_titlesize = intval( $_POST['rsbbox_titlesize'] );
	    update_post_meta( $post_id, 'rsbbox_titlesize', $rsbbox_titlesize );
	}

	if ( isset( $_POST[ 'rsbbox_contentsize' ] ) ) {
	    $rsbbox_contentsize = intval( $_POST['rsbbox_contentsize'] );
	    update_post_meta( $post_id, 'rsbbox_contentsize', $rsbbox_contentsize );
	}

	// Sanitize and save field
	if ( isset( $_POST[ 'rsbbox_conten_color' ] ) ) {
		$rsbbox_conten_color = sanitize_hex_color( $_POST['rsbbox_conten_color'] );
		update_post_meta( $post_id, 'rsbbox_conten_color', $rsbbox_conten_color );
	}

	// Sanitize and save field
	if ( isset( $_POST[ 'rsbbox_itemicons_color' ] ) ) {
		$rsbbox_itemicons_color = sanitize_hex_color( $_POST['rsbbox_itemicons_color'] );
		update_post_meta( $post_id, 'rsbbox_itemicons_color', $rsbbox_itemicons_color );
	}

	// Sanitize and save field
	if ( isset( $_POST[ 'rsbbox_itemiconsbg_color' ] ) ) {
		$rsbbox_itemiconsbg_color = sanitize_hex_color( $_POST['rsbbox_itemiconsbg_color'] );
		update_post_meta( $post_id, 'rsbbox_itemiconsbg_color', $rsbbox_itemiconsbg_color );
	}

	#Value check and saves if needed
    if (isset($_POST['rsbbox_hidelinks'])) {
        $rsbbox_hidelinks = sanitize_text_field($_POST['rsbbox_hidelinks']);
        update_post_meta($post_id, 'rsbbox_hidelinks', $rsbbox_hidelinks);
    }

	#Value check and saves if needed
    if (isset($_POST['rsbbox_linkopen'])) {
        $rsbbox_linkopen = sanitize_text_field($_POST['rsbbox_linkopen']);
        update_post_meta($post_id, 'rsbbox_linkopen', $rsbbox_linkopen);
    }

	#Value check and saves if needed
    if (isset($_POST['rsbbox_hidereadmore'])) {
        $rsbbox_hidereadmore = sanitize_text_field($_POST['rsbbox_hidereadmore']);
        update_post_meta($post_id, 'rsbbox_hidereadmore', $rsbbox_hidereadmore);
    }

    // Sanitize and save field
	if ( isset( $_POST[ 'rsbbox_moresize' ] ) ) {
	    $rsbbox_moresize = intval( $_POST['rsbbox_moresize'] );
	    update_post_meta( $post_id, 'rsbbox_moresize', $rsbbox_moresize );
	}

	// Sanitize and save field
	if ( isset( $_POST[ 'rsbbox_moreoption_color' ] ) ) {
		$rsbbox_moreoption_color = sanitize_hex_color( $_POST['rsbbox_moreoption_color'] );
		update_post_meta( $post_id, 'rsbbox_moreoption_color', $rsbbox_moreoption_color );
	}

	// Sanitize and save field
	if ( isset( $_POST[ 'rsbbox_moreoptionhover_color' ] ) ) {
		$rsbbox_moreoptionhover_color = sanitize_hex_color( $_POST['rsbbox_moreoptionhover_color'] );
		update_post_meta( $post_id, 'rsbbox_moreoptionhover_color', $rsbbox_moreoptionhover_color );
	}

    // Sanitize and save field
	if ( isset( $_POST[ 'rsbbox_itemsicons' ] ) ) {
	    $rsbbox_itemsicons = intval( $_POST['rsbbox_itemsicons'] );
	    update_post_meta( $post_id, 'rsbbox_itemsicons', $rsbbox_itemsicons );
	}

    // Sanitize and save field
	if ( isset( $_POST[ 'rsbbox_colmargin_lr' ] ) ) {
	    $rsbbox_colmargin_lr = intval( $_POST['rsbbox_colmargin_lr'] );
	    update_post_meta( $post_id, 'rsbbox_colmargin_lr', $rsbbox_colmargin_lr );
	}

    // Sanitize and save field
	if ( isset( $_POST[ 'rsbbox_marginbottom' ] ) ) {
	    $rsbbox_marginbottom = intval( $_POST['rsbbox_marginbottom'] );
	    update_post_meta( $post_id, 'rsbbox_marginbottom', $rsbbox_marginbottom );
	}

	#Value check and saves if needed
    if (isset($_POST['rsbbox_alignment'])) {
        $rsbbox_alignment = sanitize_text_field($_POST['rsbbox_alignment']);
        update_post_meta($post_id, 'rsbbox_alignment', $rsbbox_alignment);
    }

	// Sanitize and save field
	if ( isset( $_POST[ 'rsbbox_itembg_color' ] ) ) {
		$rsbbox_itembg_color = sanitize_hex_color( $_POST['rsbbox_itembg_color'] );
		update_post_meta( $post_id, 'rsbbox_itembg_color', $rsbbox_itembg_color );
	}

	// Sanitize and save field
	if ( isset( $_POST[ 'rsbbox_itemtitle_color' ] ) ) {
		$rsbbox_itemtitle_color = sanitize_hex_color( $_POST['rsbbox_itemtitle_color'] );
		update_post_meta( $post_id, 'rsbbox_itemtitle_color', $rsbbox_itemtitle_color );
	}

	// Sanitize and save field
	if ( isset( $_POST[ 'rsbbox_itemtitleh_color' ] ) ) {
		$rsbbox_itemtitleh_color = sanitize_hex_color( $_POST['rsbbox_itemtitleh_color'] );
		update_post_meta( $post_id, 'rsbbox_itemtitleh_color', $rsbbox_itemtitleh_color );
	}

    // Sanitize and save field
	if ( isset( $_POST[ 'rsbbox_padding_size' ] ) ) {
	    $rsbbox_padding_size = intval( $_POST['rsbbox_padding_size'] );
	    update_post_meta( $post_id, 'rsbbox_padding_size', $rsbbox_padding_size );
	}

	// Slider All Options

	// Checks for input and sanitizes/saves if needed
	if ( isset( $_POST['rssbox_slide_autoplay'] ) && !empty( $_POST['rssbox_slide_autoplay'] ) ) {
	    $rssbox_slide_autoplay = sanitize_text_field( $_POST['rssbox_slide_autoplay'] );
	    update_post_meta( $post_id, 'rssbox_slide_autoplay', $rssbox_slide_autoplay );
	}

    // Sanitize and save field
	if ( isset( $_POST[ 'rssbox_slide_speeds' ] ) ) {
	    $rssbox_slide_speeds = intval( $_POST['rssbox_slide_speeds'] );
	    update_post_meta( $post_id, 'rssbox_slide_speeds', $rssbox_slide_speeds );
	}

	// Checks for input and sanitizes/saves if needed
	if ( isset( $_POST['rssbox_slide_stophovers'] ) && !empty( $_POST['rssbox_slide_stophovers'] ) ) {
	    $rssbox_slide_stophovers = sanitize_text_field( $_POST['rssbox_slide_stophovers'] );
	    update_post_meta( $post_id, 'rssbox_slide_stophovers', $rssbox_slide_stophovers );
	}

	// Checks for input and sanitizes/saves if needed
	if ( isset( $_POST['rssbox_slide_timeout'] ) && !empty( $_POST['rssbox_slide_timeout'] ) ) {
	    $rssbox_slide_timeout = sanitize_text_field( $_POST['rssbox_slide_timeout'] );
	    update_post_meta( $post_id, 'rssbox_slide_timeout', $rssbox_slide_timeout );
	}

	// Checks for input and sanitizes/saves if needed
	if ( isset( $_POST['rssbox_slide_items_alls'] ) && !empty( $_POST['rssbox_slide_items_alls'] ) ) {
	    $rssbox_slide_items_alls = sanitize_text_field( $_POST['rssbox_slide_items_alls'] );
	    update_post_meta( $post_id, 'rssbox_slide_items_alls', $rssbox_slide_items_alls );
	}

	// Checks for input and sanitizes/saves if needed
	if ( isset( $_POST['rssbox_slide_items_dsks'] ) && !empty( $_POST['rssbox_slide_items_dsks'] ) ) {
	    $rssbox_slide_items_dsks = sanitize_text_field( $_POST['rssbox_slide_items_dsks'] );
	    update_post_meta( $post_id, 'rssbox_slide_items_dsks', $rssbox_slide_items_dsks );
	}

	// Checks for input and sanitizes/saves if needed
	if ( isset( $_POST['rssbox_slide_items_dsksmall'] ) && !empty( $_POST['rssbox_slide_items_dsksmall'] ) ) {
	    $rssbox_slide_items_dsksmall = sanitize_text_field( $_POST['rssbox_slide_items_dsksmall'] );
	    update_post_meta( $post_id, 'rssbox_slide_items_dsksmall', $rssbox_slide_items_dsksmall );
	}

	// Checks for input and sanitizes/saves if needed
	if ( isset( $_POST['rssbox_slide_items_mob'] ) && !empty( $_POST['rssbox_slide_items_mob'] ) ) {
	    $rssbox_slide_items_mob = sanitize_text_field( $_POST['rssbox_slide_items_mob'] );
	    update_post_meta( $post_id, 'rssbox_slide_items_mob', $rssbox_slide_items_mob );
	}

	// Checks for input and sanitizes/saves if needed
	if ( isset( $_POST['rssbox_slide_loops'] ) && !empty( $_POST['rssbox_slide_loops'] ) ) {
	    $rssbox_slide_loops = sanitize_text_field( $_POST['rssbox_slide_loops'] );
	    update_post_meta( $post_id, 'rssbox_slide_loops', $rssbox_slide_loops );
	}

    // Sanitize and save field
	if ( isset( $_POST[ 'rssbox_slide_margins' ] ) ) {
	    $rssbox_slide_margins = intval( $_POST['rssbox_slide_margins'] );
	    update_post_meta( $post_id, 'rssbox_slide_margins', $rssbox_slide_margins );
	}

	// Checks for input and sanitizes/saves if needed
	if ( isset( $_POST['rssbox_slide_navi'] ) && !empty( $_POST['rssbox_slide_navi'] ) ) {
	    $rssbox_slide_navi = sanitize_text_field( $_POST['rssbox_slide_navi'] );
	    update_post_meta( $post_id, 'rssbox_slide_navi', $rssbox_slide_navi );
	}

	// Checks for input and sanitizes/saves if needed
	if ( isset( $_POST['rssbox_slide_navi_position'] ) && !empty( $_POST['rssbox_slide_navi_position'] ) ) {
	    $rssbox_slide_navi_position = sanitize_text_field( $_POST['rssbox_slide_navi_position'] );
	    update_post_meta( $post_id, 'rssbox_slide_navi_position', $rssbox_slide_navi_position );
	}

	// Checks for input and sanitizes/saves if needed
	if ( isset( $_POST['rssbox_slide_navtext_color'] ) && !empty( $_POST['rssbox_slide_navtext_color'] ) ) {
	    $rssbox_slide_navtext_color = sanitize_hex_color( $_POST['rssbox_slide_navtext_color'] );
	    update_post_meta( $post_id, 'rssbox_slide_navtext_color', $rssbox_slide_navtext_color );
	}

	// Checks for input and sanitizes/saves if needed
	if ( isset( $_POST['rssbox_slide_navbg_color'] ) && !empty( $_POST['rssbox_slide_navbg_color'] ) ) {
	    $rssbox_slide_navbg_color = sanitize_hex_color( $_POST['rssbox_slide_navbg_color'] );
	    update_post_meta( $post_id, 'rssbox_slide_navbg_color', $rssbox_slide_navbg_color );
	}

	// Checks for input and sanitizes/saves if needed
	if ( isset( $_POST['rssbox_slide_navho_color'] ) && !empty( $_POST['rssbox_slide_navho_color'] ) ) {
	    $rssbox_slide_navho_color = sanitize_hex_color( $_POST['rssbox_slide_navho_color'] );
	    update_post_meta( $post_id, 'rssbox_slide_navho_color', $rssbox_slide_navho_color );
	}

	// Checks for input and sanitizes/saves if needed
	if ( isset( $_POST['rssbox_slide_pagi'] ) && !empty( $_POST['rssbox_slide_pagi'] ) ) {
	    $rssbox_slide_pagi = sanitize_text_field( $_POST['rssbox_slide_pagi'] );
	    update_post_meta( $post_id, 'rssbox_slide_pagi', $rssbox_slide_pagi );
	}

	// Checks for input and sanitizes/saves if needed    
	if( isset($_POST['rssbox_slide_pagi_color']) && !empty($_POST['rssbox_slide_pagi_color']) ) {
	    $rssbox_slide_pagi_color = sanitize_hex_color( $_POST['rssbox_slide_pagi_color'] );
	    update_post_meta( $post_id, 'rssbox_slide_pagi_color', $rssbox_slide_pagi_color );
	}

	// Checks for input and sanitizes/saves if needed    
	if( isset($_POST['rssbox_slide_pagi_style']) && !empty($_POST['rssbox_slide_pagi_style']) ) {
	    $rssbox_slide_pagi_style = sanitize_text_field( $_POST['rssbox_slide_pagi_style'] );
	    update_post_meta( $post_id, 'rssbox_slide_pagi_style', $rssbox_slide_pagi_style );
	}

	// Checks for input and sanitizes/saves if needed    
	if( isset($_POST['rssbox_slide_pagiposition']) && !empty($_POST['rssbox_slide_pagiposition']) ) {
	    $rssbox_slide_pagiposition = sanitize_text_field( $_POST['rssbox_slide_pagiposition'] );
	    update_post_meta( $post_id, 'rssbox_slide_pagiposition', $rssbox_slide_pagiposition );
	}

	#Value check and saves if needed
	if ( isset( $_POST[ 'nav_value' ] ) ) {
	    $nav_value = sanitize_text_field( $_POST['nav_value'] ); // Sanitize nav_value input
	    update_post_meta( $post_id, 'nav_value', $nav_value );
	} else {
	    update_post_meta( $post_id, 'nav_value', 1 ); // Default value
	}

}			
add_action( 'save_post', 'rsbboxsave_meta_value' );