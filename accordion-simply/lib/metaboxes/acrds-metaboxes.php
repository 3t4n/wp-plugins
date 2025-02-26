<?php 

	if( !defined( 'ABSPATH' ) ){
	    exit;
	}

	function acrds_swapping_register_cp_meta_boxes() {

		$acrds = array( 'acrdsshortocde');
	    add_meta_box(
	        'acrds_meta_box_id',                                  	# Metabox
	        __( 'Accordion Simply Settings', 'acrds' ),           	# Title
	        'acrds_display_post_type_func',                       	# Call Back func
	       	$acrds,                                         		# post type
	        'normal'                                                # Text Content
	    );
	}
	add_action( 'add_meta_boxes', 'acrds_swapping_register_cp_meta_boxes' );


	# Call Back Function...
	function acrds_display_post_type_func( $post, $args ) {

	#Call get post meta.
	$acrds_cat_name			= get_post_meta( $post->ID, 'acrds_cat_name', true );

	if( !empty($acrds_cat_name) ) {
		$acrds_cat_name = $acrds_cat_name;
	}
	else
	{
		$acrds_cat_name = array();
	}

	$acrds_orderby 				= get_post_meta( $post->ID, 'acrds_orderby', true );
	$acrds_order 				= get_post_meta( $post->ID, 'acrds_order', true );
	$acrds_tcolor          		= get_post_meta( $post->ID, 'acrds_tcolor', true );
	$acrds_fsize          		= get_post_meta( $post->ID, 'acrds_fsize', true );
	$acrds_ccolor          		= get_post_meta( $post->ID, 'acrds_ccolor', true );
	$acrds_cfsize          		= get_post_meta( $post->ID, 'acrds_cfsize', true );		
	$acrds_bgcolor          	= get_post_meta( $post->ID, 'acrds_bgcolor', true );		
	$acrds_nav_value          	= get_post_meta( $post->ID, 'acrds_nav_value', true );	
	$acrds_hdcolor            	= get_post_meta( $post->ID, 'acrds_hdcolor', true );
	$excerpt_lenght 	  		= get_post_meta( $post->ID, 'excerpt_lenght', true );
	$excerpt_color              = get_post_meta( $post->ID, 'excerpt_color', true );	
	$btn_readmore         		= get_post_meta( $post->ID, 'btn_readmore', true );
	$excerpt_hcolor				= get_post_meta( $post->ID, 'excerpt_hcolor', true );	
	$bg_color					= get_post_meta( $post->ID, 'bg_color', true );	
	$bg_hovercolor				= get_post_meta( $post->ID, 'bg_hovercolor', true );	
	$border_color				= get_post_meta( $post->ID, 'border_color', true );	

?>
<div class="para-settings post-grid-metabox">
    <ul class="tab-nav"> 
        <li nav="1" class="nav1 <?php if( $acrds_nav_value == 1 ){ echo "active"; } ?>"><i class="fa fa-file-code-o" aria-hidden="true" ></i> <?php esc_html_e('Shortcodes','accrodion-simply'); ?></li>
        <li nav="2" class="nav2 <?php if( $acrds_nav_value == 2 ){ echo "active"; } ?>"><i class="fa fa-clipboard" aria-hidden="true"></i> <?php esc_html_e('Query Post ','accrodion-simply'); ?></li>        
        <li nav="3" class="nav3 <?php if( $acrds_nav_value ==3 ){ echo "active"; } ?>"><i class="fa fa-cogs" aria-hidden="true"></i> <?php esc_html_e('Content ','accrodion-simply'); ?></li>
    </ul> <!-- tab-nav end -->
    <?php 
    	$getNavValue = "";
    	if( !empty($acrds_nav_value) ) { 
			$getNavValue = $acrds_nav_value; 
		} else { 
			$getNavValue = 1; 
		}
    ?>
    <input type="hidden" name="acrds_nav_value" id="acrds_nav_value" value="<?php echo $getNavValue; ?>"> 

	<ul class="box">
        <li style="<?php if( $acrds_nav_value == 1 ){ echo "display: block;"; } else { echo "display: none;"; } ?>" class="box1 tab-box <?php if( $acrds_nav_value == 1 ){ echo "active"; } ?>">
            <div class="option-box">
                <p class="option-title"><?php esc_html_e('Shortcode','accrodion-simply'); ?></p>
                <p class="option-info"><?php esc_html_e('Copy this shortcode and paste on page or post where you want to display accordion. <br />Use PHP code to your themes file to display accordion.','accrodion-simply'); ?></p>
                <textarea cols="50" rows="1" style="background:#bfefff" onClick="this.select();" >[acrds_composer <?php echo 'id="'.$post->ID.'"';?>]</textarea>
            <br /><br />

            <p class="option-info"><?php esc_html_e('PHP Code:','accrodion-simply'); ?></p>
            <textarea cols="50" rows="1" style="background:#bfefff" onClick="this.select();" ><?php echo '<?php echo do_shortcode("[acrds_composer id='; echo "'".$post->ID."']"; echo '"); ?>'; ?></textarea>  
            </div>        
        </li>
        <li style="<?php if( $acrds_nav_value == 2 ){ echo "display: block;"; } else { echo "display: none;"; } ?>" class="box2 tab-box <?php if( $acrds_nav_value == 2 ) { echo "active"; } ?>"> 
		<table class="form-table">
		<tr valign="top">
			<th scope="row">
				<label for="cat_name"><?php esc_html_e('Categories', 'accrodion-simply')?></label>
			</th>
			<td style="vertical-align: middle;">
				<ul>			
					<?php
						$args = array( 
							'taxonomy'     => 'acrdscat',
							'orderby'      => 'name',
							'show_count'   => 1,
							'pad_counts'   => 1, 
							'hierarchical' => 1,
							'echo'         => 0
						);
						$allthecats = get_categories( $args );

						foreach( $allthecats as $category ):
						    $cat_id = $category->cat_ID;
						    $checked = ( in_array($cat_id,(array)$acrds_cat_name)? ' checked="checked"': "" );
						        echo'<li id="cat-'.$cat_id.'"><input type="checkbox" name="acrds_cat_name[]" id="'.$cat_id.'" value="'.$cat_id.'"'.$checked.'> <label for="'.$cat_id.'">'.__( $category->cat_name, 'accordion-simply' ).'</label></li>';
						endforeach;
					?>
				</ul>
			</td>
		</tr><!-- End Testimonial Categories -->

		<tr valign="top">
			<th scope="row">
				<label for="acrds_orderby"><?php esc_html_e('Order By', 'accordion-simply')?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="acrds_orderby" id="acrds_orderby" class="timezone_string">
					<option value="title" <?php if ( isset ( $acrds_orderby ) ) selected( $acrds_orderby, 'title' ); ?>><?php esc_html_e('Title', 'accordion-simply'); ?></option>
					<option value="post_date" <?php if ( isset ( $acrds_orderby ) ) selected( $acrds_orderby, 'post_date' ); ?>><?php esc_html_e('Date', 'accordion-simply'); ?></option>
					<option value="modified" <?php if ( isset ( $acrds_orderby ) ) selected( $acrds_orderby, 'modified' ); ?>><?php esc_html_e('Modified', 'accordion-simply'); ?></option>
					<option value="rand" <?php if ( isset ( $acrds_orderby ) ) selected( $acrds_orderby, 'rand' ); ?>><?php esc_html_e('Rand', 'accordion-simply'); ?></option>
				</select>
			</td>
		</tr>
		<!-- End Order By -->

		<tr valign="top">
			<th scope="row">
				<label for="acrds_order"><?php esc_html_e('Order to display', 'accordion-simply'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="acrds_order" id="acrds_order" class="timezone_string">
					<option value="DESC" <?php if ( isset ( $acrds_order ) ) selected( $acrds_order, 'DESC' ); ?>><?php esc_html_e('DESC', 'accordion-simply'); ?></option>
					<option value="ASC" <?php if ( isset ( $acrds_order ) ) selected( $acrds_order, 'ASC' ); ?>><?php esc_html_e('ASC', 'accordion-simply'); ?></option>
				</select>
			</td>
		</tr>
		<!-- End Order By -->

	</table>		
		<!-- End Grayscale -->
	</li>
	<li style="<?php if( $acrds_nav_value == 3 ) { echo "display: block;"; } else { echo "display: none;"; } ?>" class="box3 tab-box <?php if($acrds_nav_value == 3) { echo "active"; } ?>"> 	

	<table class="form-table">

		<tr valign="top">
			<th scope="row">
				<label for="acrds_tcolor"><?php esc_html_e('Title Color', 'accordion-simply'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<input type="text" name="acrds_tcolor" id="acrds_tcolor" class="jscolor" value="<?php if( !empty($acrds_tcolor) ) { echo esc_attr($acrds_tcolor); } else { echo "#7B7E85"; } ?>" >
			</td>
		</tr>

		<tr valign="top">
			<th scope="row">
				<label for="acrds_fsize"><?php esc_html_e('Title Font Size', 'accordion-simply'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="acrds_fsize" id="acrds_fsize" class="timezone_string">
				<?php
					for( $i=8; $i<=72; $i++ ){
				?>
				<option value="<?php echo $i; ?>" <?php if ( isset ( $acrds_fsize ) ) selected( $acrds_fsize, $i ); ?>><?php echo $i; ?>px</option>
				<?php } ?>
				</select>
			</td>
		</tr>

		<tr valign="top">
			<th scope="row">
				<label for="acrds_ccolor"><?php esc_html_e('Content Color', 'accordion-simply'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<input type="text" name="acrds_ccolor" id="acrds_ccolor" class="jscolor" value="<?php if( !empty($acrds_ccolor) ) { echo esc_attr($acrds_ccolor); } else { echo "#7B7E85"; } ?>" >
			</td>
		</tr>

		<tr valign="top">
			<th scope="row">
				<label for="acrds_cfsize"><?php esc_html_e('Content Font Size', 'accordion-simply'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<select name="acrds_cfsize" id="acrds_cfsize" class="timezone_string">
				<?php
					for( $i=8; $i<=72; $i++ ) {
				?>
				<option value="<?php echo $i; ?>" <?php if ( isset ( $acrds_cfsize ) ) selected( $acrds_cfsize, $i ); ?>><?php echo $i; ?><?php esc_html_e('px', 'accordion-simply'); ?></option>
				<?php } ?>
				</select>
			</td>
		</tr>


		<tr valign="top">
			<th scope="row">
				<label for="acrds_hdcolor"><?php esc_html_e('Heading Back Color', 'accordion-simply'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<input type="text" name="acrds_hdcolor" id="acrds_hdcolor" class="jscolor" value="<?php if( !empty($acrds_hdcolor) ) { echo esc_attr($acrds_hdcolor); } else { echo "#567843"; } ?>" >
			</td>
		</tr>


		<tr valign="top">
			<th scope="row">
				<label for="acrds_bgcolor"><?php esc_html_e('Background Color', 'accordion-simply'); ?></label>
			</th>
			<td style="vertical-align: middle;">
				<input type="text" name="acrds_bgcolor" id="acrds_bgcolor" class="jscolor" value="<?php if( !empty($acrds_bgcolor) ) { echo esc_attr($acrds_bgcolor); } else { echo "#567843"; } ?>" >
			</td>
		</tr>


		<tr valign="top" class="excerpt_details">
				<th scope="row">
					<label for="excerpt_lenght"><?php esc_html_e('Excerpt Length in Words', 'accordion-simply'); ?></label>
				</th>
				<td style="vertical-align: middle;">
					<input type="number" name="excerpt_lenght"  id="excerpt_lenght" maxlength="3" class="timezone_string" value="<?php echo $excerpt_lenght; ?>" placeholder="Excerpt Length">

					<input type="text" name="btn_readmore" id="btn_readmore" maxlength="20" class="timezone_string" value="<?php echo esc_attr($btn_readmore); ?>"  placeholder="Excerpt Word">
				</td>
			</tr>	
			<!-- End Excerpt Length -->


			<tr valign="top" id="excerpt_fontsize_area">
				<th scope="row">
					<label for="excerpt_fontsize"><?php esc_html_e('Excerpt Font Size', 'accordion-simply'); ?></label>
				</th>
				<td style="vertical-align: middle;">
					<select name="excerpt_fontsize" id="excerpt_fontsize">
						<?php for( $i=12; $i<=72; $i++ ) { ?>
						<option value="<?php echo $i; ?>" <?php if ( isset ( $excerpt_fontsize ) ) selected( $excerpt_fontsize, $i ); ?>><?php echo $i."px";?></option>
						<?php } ?>
					</select>			
				</td>
			</tr> 

			<tr valign="top" id="excerpt_color_area">
				<th scope="row">
					<label for="excerpt_color"><?php esc_html_e('Excerpt Color', 'accordion-simply'); ?></label>
				</th>
				<td style="vertical-align: middle;">
					<input name="excerpt_color" value="<?php if( $excerpt_color !='' ) { echo esc_attr($excerpt_color); } else { echo "#DBEAF7"; } ?>" class="jscolor" readonly>
				</td>
			</tr> 

			<tr valign="top" id="excerpt_hcolor_area">
				<th scope="row">
					<label for="excerpt_hcolor"><?php esc_html_e('Excerpt Hover Color', 'accordion-simply'); ?></label>
				</th>
				<td style="vertical-align: middle;">
					<input name="excerpt_hcolor" value="<?php if( $excerpt_hcolor !='' ) { echo esc_attr($excerpt_hcolor); } else { echo "#DBEaaa"; } ?>" class="jscolor" readonly>
				</td>
			</tr>
			<!-- End Excerpt Color -->	

			<tr valign="top" id="bg_color_area">
				<th scope="row">
					<label for="bg_color"><?php esc_html_e('Background Color', 'accordion-simply'); ?></label>
				</th>
				<td style="vertical-align: middle;">
					<input name="bg_color" value="<?php if( $bg_color !='' ) { echo esc_attr($bg_color); } else { echo "#ddd"; } ?>" class="jscolor" readonly>
				</td>
			</tr>			

			<tr valign="top" id="bg_hover">
				<th scope="row">
					<label for="bg_hovercolor"><?php esc_html_e('Background Hover Color', 'accordion-simply'); ?></label>
				</th>
				<td style="vertical-align: middle;">
					<input name="bg_hovercolor" value="<?php if( $bg_hovercolor !='' ) { echo esc_attr($bg_hovercolor); } else { echo "#FFFFE0"; } ?>" class="jscolor" readonly>
				</td>
			</tr>
			<!-- End Background Color -->	

			<tr valign="top" id="border_color_area">
				<th scope="row">
					<label for="border_color"><?php esc_html_e('Border Color', 'accordion-simply'); ?></label>
				</th>
				<td style="vertical-align: middle;">
					<input name="border_color" value="<?php if( $border_color !='' ) { echo esc_attr($border_color); } else { echo "#FFFFE0"; } ?>" class="jscolor" readonly>
				</td>
			</tr>			
	</table>
	</li>
	</ul>
</div>		
<?php }   //
	
# Data save in custom metabox field
function ards_save_meta_box( $post_id ) {

	# Doing autosave then return.
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return;

	#Value check and saves if needed
	if( isset($_POST['border_color']) ) {
	    update_post_meta( $post_id, 'border_color', sanitize_text_field($_POST['border_color']) );
	} 

	#Value check and saves if needed
	if( isset($_POST['bg_color']) ) {
	    update_post_meta( $post_id, 'bg_color', sanitize_text_field($_POST['bg_color']) );
	} 

	#Value check and saves if needed
	if( isset($_POST['bg_hovercolor']) ) {
	    update_post_meta( $post_id, 'bg_hovercolor', sanitize_text_field($_POST['bg_hovercolor']) );
	} 

	#Value check and saves if needed
	if( isset($_POST['acrds_nav_value']) ) {
	    update_post_meta( $post_id, 'acrds_nav_value', sanitize_text_field($_POST['acrds_nav_value']) );
	} else {
		update_post_meta( $post_id, 'acrds_nav_value', 1 );
	}	

	#Checks for input and saves if needed
	if( isset($_POST['acrds_hdcolor']) ) {
		update_post_meta( $post_id, 'acrds_hdcolor', sanitize_text_field($_POST['acrds_hdcolor'])  );
	}

	#Checks for input and saves if needed
	if( isset($_POST['excerpt_fontsize']) ) {
		update_post_meta( $post_id, 'excerpt_fontsize', sanitize_text_field($_POST['excerpt_fontsize'])  );
	}	

	#Checks for input and saves if needed
	if( isset($_POST['acrdsesc_html_exicon']) ) {
		update_post_meta( $post_id, 'acrdsesc_html_exicon', sanitize_text_field($_POST['acrdsesc_html_exicon'])  );
	}

	#Checks for input and saves if needed
	if( isset($_POST['acrds_active']) ) {
		update_post_meta( $post_id, 'acrds_active', sanitize_text_field($_POST['acrds_active'])  );
	} else{
		update_post_meta( $post_id, 'acrds_active', 1 );
	}

	#Checks for input and saves if needed
	if( isset($_POST['acrds_bgcolor']) ) {
		update_post_meta( $post_id, 'acrds_bgcolor', sanitize_text_field($_POST['acrds_bgcolor'])  );
	}

	#Checks for input and saves if needed
	if( isset($_POST['acrds_ccolor']) ) {
		update_post_meta( $post_id, 'acrds_ccolor', sanitize_text_field($_POST['acrds_ccolor'])  );
	}

	#Checks for input and saves if needed
	if( isset($_POST['acrds_cfsize']) ) {
		update_post_meta( $post_id, 'acrds_cfsize', sanitize_text_field($_POST['acrds_cfsize'])  );
	}	

	#Checks for input and saves if needed
	if( isset($_POST['acrds_fsize']) ) {
		update_post_meta( $post_id, 'acrds_fsize', sanitize_text_field($_POST['acrds_fsize'])  );
	}

	#Checks for input and saves if needed
	if( isset($_POST['acrds_tcolor']) ) {
		update_post_meta( $post_id, 'acrds_tcolor', sanitize_text_field($_POST['acrds_tcolor'])  );
	}

	#Checks for input and saves if needed
	if( isset($_POST['acrds_cat_name']) ) {
		update_post_meta( $post_id, 'acrds_cat_name', array_map( 'sanitize_text_field', $_POST[ 'acrds_cat_name' ] ) );
		
	}

	#Checks for input and saves if needed
	if( isset($_POST['acrds_orderby']) ) {
	    update_post_meta( $post_id, 'acrds_orderby', sanitize_text_field($_POST['acrds_orderby']) );
	}

	#Checks for input and saves if needed
	if( isset($_POST['acrds_order']) ) {
	    update_post_meta( $post_id, 'acrds_order', sanitize_text_field($_POST['acrds_order']) );
	}

	#Value check and saves
	if( isset($_POST['excerpt_color']) ) {
	    update_post_meta( $post_id, 'excerpt_color', sanitize_text_field($_POST['excerpt_color']) );
	}

    if( isset($_POST['excerpt_lenght']) ) {
		if( $_POST['excerpt_lenght'] == '' || $_POST['excerpt_lenght'] == 0 || $_POST['excerpt_lenght'] == null || ( strlen($_POST['excerpt_lenght']) > 3) ||  !is_numeric($_POST['excerpt_lenght'])) {
			update_post_meta( $post_id, 'excerpt_lenght', 62 );	
		} else {
      		update_post_meta( $post_id, 'excerpt_lenght', sanitize_text_field($_POST['excerpt_lenght']) );  			
		}
    } 

	#Checks for input and sanitizes/saves if needed
    if( isset($_POST['btn_readmore']) ) {
		if( $_POST['btn_readmore'] == '' || $_POST['btn_readmore'] == 0 || $_POST['btn_readmore'] == null || ( strlen($_POST['btn_readmore']) >= 20 ) || is_numeric($_POST['btn_readmore']) ) {
			update_post_meta( $post_id, 'btn_readmore',  'Read More' );	
		} else {
      		update_post_meta( $post_id, 'btn_readmore', sanitize_text_field($_POST['btn_readmore']) );  			
		}
    }	

}
add_action( 'save_post', 'ards_save_meta_box' );
# Custom metabox field end