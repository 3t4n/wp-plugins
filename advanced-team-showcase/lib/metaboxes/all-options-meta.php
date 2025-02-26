<?php	
	function atmswc_all_options( $post, $args ){

		$atmswc_cat_name		= get_post_meta( $post->ID, 'atmswc_cat_name', true );				
		$sort_post				= get_post_meta( $post->ID, 'sort_post', true );
		$atmswc_order_by		= get_post_meta( $post->ID, 'atmswc_order_by', true );
		$atmswc_order_type      = get_post_meta( $post->ID, 'atmswc_order_type', true );
		$theme_id				= get_post_meta( $post->ID, 'theme_id', true );
		$bg_color				= get_post_meta( $post->ID, 'bg_color', true );	
		$first_param			= get_post_meta( $post->ID, 'first_param', true );
		$second_param			= get_post_meta( $post->ID, 'second_param', true );
		$third_param			= get_post_meta( $post->ID, 'third_param', true );
		$fourth_param			= get_post_meta( $post->ID, 'fourth_param', true );
		$hide_box_shadow		= get_post_meta( $post->ID, 'hide_box_shadow', true );
		$txt_align				= get_post_meta( $post->ID, 'txt_align', true );
		$img_size				= get_post_meta( $post->ID, 'img_size', true );
		$img_height				= get_post_meta( $post->ID, 'img_height', true );
		$title_color         	= get_post_meta( $post->ID, 'title_color', true );
		$title_fontsize         = get_post_meta( $post->ID, 'title_fontsize', true );
		$content_color         	= get_post_meta( $post->ID, 'content_color', true );
		$content_fontsize       = get_post_meta( $post->ID, 'content_fontsize', true );		
		$opacity 				= get_post_meta( $post->ID, 'opacity', true );
		$opacity_color 			= get_post_meta( $post->ID, 'opacity_color', true );
		$bio_text_color 		= get_post_meta( $post->ID, 'bio_text_color', true );
		$bio_fontsize 			= get_post_meta( $post->ID, 'bio_fontsize', true );
		$designation_color 		= get_post_meta( $post->ID, 'designation_color', true );
		$designation_fontsize 	= get_post_meta( $post->ID, 'designation_fontsize', true );
		$telephone_color 		= get_post_meta( $post->ID, 'telephone_color', true );
		$telephone_fontsize 	= get_post_meta( $post->ID, 'telephone_fontsize', true );
		$email_color 			= get_post_meta( $post->ID, 'email_color', true );
		$email_fontsize 		= get_post_meta( $post->ID, 'email_fontsize', true );		
		$web_color 				= get_post_meta( $post->ID, 'web_color', true );
		$web_fontsize 			= get_post_meta( $post->ID, 'web_fontsize', true );
		$bio_social_icon 		= get_post_meta( $post->ID, 'bio_social_icon', true );
		$bio_social_textcolor 	= get_post_meta( $post->ID, 'bio_social_textcolor', true );
		$bio_social_hcolor 		= get_post_meta( $post->ID, 'bio_social_hcolor', true );
		$bio_social_backcolor 	= get_post_meta( $post->ID, 'bio_social_backcolor', true );
		$bio_social_backhcolor 	= get_post_meta( $post->ID, 'bio_social_backhcolor', true );
?>

<div class="wrap">
	<table class="form-table">
		<tbody>
			<tr valign="top">
				<th scope="row">
					<label for="atmswc_cat_name"><?php esc_html_e('Categories', 'atmswc'); ?></label>
				</th>
				<td style="vertical-align: middle;">
					<?php
						$args = array( 
							'taxonomy'     => 'atmswc_cat',
							'orderby'      => 'name',
							'show_count'   => 1,
							'pad_counts'   => 1, 
							'hierarchical' => 1,
							'echo'         => 0
						);
						$allthecats = get_categories( $args );
					?>

					<select required="" style="min-width:162px !important" id="multiple_cat" class="timezone_string" name="atmswc_cat_name[]" multiple="multiple" size="10" style="height: 100px;">
				<?php
					foreach( $allthecats as $category ): 
						$cat_id = $category->cat_ID;
						if( in_array($category->cat_ID, $atmswc_cat_name) ){
							echo $selected = 'selected';
						}
						else
						{
							echo $selected = '';
						}	
					?>
					<option <?php echo $selected; ?> value="<?php echo $cat_id; ?>"><?php echo $category->cat_name; ?></option>
				<?php endforeach; ?>	
					</select>					
				</td>
			</tr>
			<!-- End Categories -->
		</tbody>
 	</table>
 	<div style="float:left;width:28%;">
		<h4><?php esc_html_e("Team Members", "atmswc"); ?></h4>
 	</div>
 	<div style="float:left;width:72%;">
		<table class="form-table atmswc-form-table cpost">
			<tbody class="atmswc_cpost_drag">
			<?php
				if( !empty($atmswc_cat_name) ){
					$args2 = array(
					   'post_type' => 'atmswc',
						'tax_query' 	 	=> array(
							array(
								'taxonomy'  => 'atmswc_cat',
								'field' 	=> 'id',
								'terms'     => $atmswc_cat_name,
							)
						)			   
					);					
					$query2 = new WP_Query( $args2 );
					while ( $query2->have_posts() ) : $query2->the_post(); ?>
				<tr valign="top" class="ui-state-default atmswc-drag">
					<th scope="row">
						<label for="sort_p"><?php the_title(); ?></label>
					</th>
					<td style="vertical-align: middle;">
						<input type="hidden" name="sort_post[]" value="<?php echo get_the_ID(); ?>">		
					</td>
				</tr>
			<?php 
				endwhile;	
				} 
			?>
			</tbody>
	 	</table>			
 	</div>
	<table class="form-table">
		<tbody> 				
			<tr valign="top">
				<th scope="row">
					<label for="atmswc_order_by"><?php esc_html_e('Order By', 'atmswc'); ?></label>
				</th>
				<td style="vertical-align: middle;">
					<select name="atmswc_order_by" id="atmswc_order_by" class="timezone_string">
						<option value="author" <?php if ( isset ( $atmswc_order_by ) ) selected( $atmswc_order_by, 'author' ); ?>><?php esc_html_e('Author', 'atmswc'); ?></option>
						<option value="post_date" <?php if ( isset ( $atmswc_order_by ) ) selected( $atmswc_order_by, 'post_date' ); ?>><?php esc_html_e('Date', 'atmswc'); ?></option>
						<option value="title" <?php if ( isset ( $atmswc_order_by ) ) selected( $atmswc_order_by, 'title' ); ?>><?php esc_html_e('Title', 'atmswc'); ?></option>
						<option value="modified" <?php if ( isset ( $atmswc_order_by ) ) selected( $atmswc_order_by, 'modified' ); ?>><?php esc_html_e('Modified', 'atmswc'); ?></option>
						<option value="rand" <?php if ( isset ( $atmswc_order_by ) ) selected( $atmswc_order_by, 'rand' ); ?>><?php esc_html_e('Rand', 'atmswc'); ?></option>
					</select>
				</td>
			</tr>
			<!-- End Order By -->	

			<tr valign="top">
				<th scope="row">
					<label for="atmswc_order_by"><?php esc_html_e('Order Type', 'atmswc'); ?></label>
				</th>
				<td style="vertical-align: middle;">
					<select name="atmswc_order_type" id="atmswc_order_type" class="timezone_string">
						<option value="ASC" <?php if ( isset ( $atmswc_order_type ) ) selected( $atmswc_order_type, 'ASC' ); ?>><?php esc_html_e('Ascending', 'atmswc'); ?></option>
						<option value="DESC" <?php if ( isset ( $atmswc_order_type ) ) selected( $atmswc_order_type, 'DESC' ); ?>><?php esc_html_e('Descending', 'atmswc'); ?></option>
					</select>
				</td>
			</tr>
			<!-- End Order Type -->

			<tr valign="top" class="ui-state-default">
				<th scope="row">
					<label for="theme_id"><?php esc_html_e('Team Styles', 'atmswc'); ?></label>
				</th>
				<td style="vertical-align: middle;"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
					<select name="theme_id" id="theme_id" class="timezone_string">
						<option value="1" <?php if ( isset ( $theme_id ) ) selected( $theme_id, '1' ); ?>><?php esc_html_e('Style One', 'atmswc')?></option>
						<option value="2" <?php if ( isset ( $theme_id ) ) selected( $theme_id, '2' ); ?>><?php esc_html_e('Style Two', 'atmswc')?></option>
						<option value="3" <?php if ( isset ( $theme_id ) ) selected( $theme_id, '3' ); ?>><?php esc_html_e('Style Three', 'atmswc'); ?></option>
						<option value="4" <?php if ( isset ( $theme_id ) ) selected( $theme_id, '4' ); ?>><?php esc_html_e('Style Four', 'atmswc'); ?></option>
						<option value="5" <?php if ( isset ( $theme_id ) ) selected( $theme_id, '5' ); ?>><?php esc_html_e('Style Five', 'atmswc'); ?></option>
						<option value="6" <?php if ( isset ( $theme_id ) ) selected( $theme_id, '6' ); ?>><?php esc_html_e('Style Six', 'atmswc')?></option>
						<option value="7" <?php if ( isset ( $theme_id ) ) selected( $theme_id, '7' ); ?>><?php esc_html_e('Style Seven', 'atmswc'); ?></option>
						<option value="8" <?php if ( isset ( $theme_id ) ) selected( $theme_id, '8' ); ?>><?php esc_html_e('Style Eight', 'atmswc'); ?></option>
						<option value="9" <?php if ( isset ( $theme_id ) ) selected( $theme_id, '9' ); ?>><?php esc_html_e('Style Nine', 'atmswc'); ?></option>
						<option value="10" <?php if ( isset ( $theme_id ) ) selected( $theme_id, '10' ); ?>><?php esc_html_e('Style Ten', 'atmswc'); ?></option>
						<option value="11" <?php if ( isset ( $theme_id ) ) selected( $theme_id, '11' ); ?>><?php esc_html_e('Style Eleven', 'atmswc'); ?></option>
						<option value="12" <?php if ( isset ( $theme_id ) ) selected( $theme_id, '12' ); ?>><?php esc_html_e('Style Twelve', 'atmswc'); ?></option>
					</select>
				</td>
			</tr>

			<tr valign="top" id="bg_area">
				<th scope="row">
					<label for="bg_color"><?php esc_html_e('Background Color', 'atmswc'); ?></label>
				</th>
				<td style="vertical-align: middle;">
					<input name="bg_color" value="<?php if( $bg_color !='' ){ echo esc_attr($bg_color); } else { echo "#fff"; } ?>" class="jscolor" readonly>							
				</td>
			</tr> 

			<tr valign="top" id="box_area">
				<th scope="row">
					<label for="box_shadow"><?php esc_html_e('Background Shadow', 'atmswc'); ?></label>
				</th>
				<td style="vertical-align: middle;">
					<input type="text" class="timezone_string" name="first_param" value="<?php echo esc_attr($first_param); ?>" style="width:50px;" placeholder="3"><?php esc_html_e('px', 'atmswc'); ?>&nbsp;
					<input type="text" class="timezone_string" name="second_param" value="<?php echo esc_attr($second_param); ?>"style="width:50px;" placeholder="5"><?php esc_html_e('px', 'atmswc'); ?>&nbsp;
					<input type="text" class="timezone_string" name="third_param" value="<?php echo esc_attr($third_param); ?>"style="width:50px;" placeholder="5"><?php esc_html_e('px', 'atmswc'); ?>&nbsp;
					<input type="text" class="timezone_string" name="fourth_param" value="<?php echo esc_attr($fourth_param); ?>"style="width:50px;" placeholder="-2"><?php esc_html_e('px', 'atmswc'); ?>&nbsp;<br />	<br />
					<input type="checkbox" name="hide_box_shadow" id="hide_box_shadow" value="1" <?php checked( $hide_box_shadow, 1, true );	?> ><?php esc_html_e("Hide Background Shadow", "atmswc"); ?>	
				</td>
			</tr> 			
			<!-- End Background Color -->


			<tr valign="top" id="img_area">
				<th scope="row">
					<label for="img_size"><?php esc_html_e('Image Size', 'atmswc'); ?></label>
				</th>
				<td style="vertical-align: middle;">
					<select name="img_size" id="img_size" class="timezone_string">
						<option value="default" <?php if( $img_size == 'default' ){ echo "selected"; }; ?>><?php esc_html_e('Default', 'atmswc'); ?></option>
						<option value="custom" <?php if( $img_size == 'custom' ){ echo "selected"; }; ?>><?php esc_html_e('Custom', 'atmswc'); ?></option>
					</select>						
				</td>
			</tr> 			

			<tr valign="top" id="img_size_area" >
				<th scope="row">
					<label for="img_height"><?php esc_html_e('Image Height', 'atmswc'); ?></label>
				</th>
				<td style="vertical-align: middle;">
					<input name="img_height" value="<?php echo esc_attr($img_height); ?>" id="img_height" placeholder="269" maxlength="3"><?php esc_html_e('px', 'atmswc'); ?>	
				</td>
			</tr> 
			<!-- End Image Height -->


			<tr valign="top" id="txt_area">
				<th scope="row">
					<label for="txt_align"><?php esc_html_e('Text Align', 'atmswc'); ?></label>
				</th>
				<td style="vertical-align: middle;">
					<select name="txt_align" id="txt_align" class="timezone_string">
						<option value="center" <?php if( $txt_align == 'center' ){ echo "selected"; }; ?>><?php esc_html_e('Center', 'atmswc'); ?></option>
						<option value="left" <?php if( $txt_align == 'left' ){ echo "selected"; }; ?>><?php esc_html_e('Left', 'atmswc'); ?></option>
						<option value="right" <?php if( $txt_align == 'right' ){ echo "selected"; }; ?>><?php esc_html_e('Right', 'atmswc'); ?></option>
						<option value="justify" <?php if( $txt_align == 'justify' ){ echo "selected"; }; ?>><?php esc_html_e('Justify', 'atmswc'); ?></option>
					</select>											
				</td>
			</tr> 
			<!-- End Background Color -->

			<tr valign="top" id="title_area">
				<th scope="row">
					<label for="title_color"><?php esc_html_e('Title Text Color', 'atmswc'); ?></label>
				</th>
				<td style="vertical-align: middle;">
					<input name="title_color" value="<?php if( $title_color !='' ){ echo esc_attr($title_color); } else { echo "#DC005A"; } ?>" class="jscolor" readonly>	&nbsp; <?php esc_html_e("Font Size", "atmswc"); ?>  &nbsp;&nbsp; 
					<select name="title_fontsize" id="title_fontsize" class="timezone_string">
						<?php
							for( $i=8; $i<=72; $i++ ){
						?>
						<option value="<?php echo $i; ?>" <?php if( $i == $title_fontsize ){ echo "selected"; } ?>><?php echo $i; ?><?php esc_html_e("px", "atmswc"); ?></option>
						<?php } ?>
					</select>								
				</td>
			</tr> 
			<!-- End Title Text Color -->	

			<tr valign="top" id="content_area">
				<th scope="row">
					<label for="content_color"><?php esc_html_e('Content Text Color', 'atmswc'); ?></label>
				</th>
				<td style="vertical-align: middle;">
					<input name="content_color" value="<?php if( $content_color !='' ){ echo esc_attr($content_color); } else { echo "#DC005A"; } ?>" class="jscolor" readonly>	&nbsp; <?php esc_html_e("Font Size", "atmswc"); ?> &nbsp;&nbsp; 
					<select name="content_fontsize" id="content_fontsize" class="timezone_string">
						<?php
							for( $i=8; $i<=72; $i++ ){
						?>
						<option value="<?php echo $i; ?>" <?php if( $i == $content_fontsize ){ echo "selected"; } ?>><?php echo $i; ?><?php esc_html_e("px", "atmswc"); ?></option>
						<?php } ?>
					</select>								
				</td>
			</tr> 
			<!-- End Title Text Color -->	

			<tr valign="top" id="opacity_area">
				<th scope="row">
					<label for="opacity_color"><?php esc_html_e('Image Opacity', 'atmswc'); ?></label>
				</th>
				<td style="vertical-align: middle;">
					<input name="opacity_color" value="<?php if( $opacity_color !='' ){ echo esc_attr($opacity_color); } else { echo "#DC005A"; } ?>" class="jscolor" readonly>
					<select name="opacity" id="opacity" class="timezone_string">
						<option value="0.1" <?php if ( isset ( $opacity ) ) selected( $opacity, '0.1' ); ?>><?php esc_html_e('0.1', 'atmswc'); ?></option>
						<option value="0.2" <?php if ( isset ( $opacity ) ) selected( $opacity, '0.2' ); ?>><?php esc_html_e('0.2', 'atmswc'); ?></option>
						<option value="0.3" <?php if ( isset ( $opacity ) ) selected( $opacity, '0.3' ); ?>><?php esc_html_e('0.3', 'atmswc'); ?></option>
						<option value="0.4" <?php if ( isset ( $opacity ) ) selected( $opacity, '0.4' ); ?>><?php esc_html_e('0.4', 'atmswc'); ?></option>
						<option value="0.5" <?php if ( isset ( $opacity ) ) selected( $opacity, '0.5' ); ?>><?php esc_html_e('0.5', 'atmswc'); ?></option>
						<option value="0.6" <?php if ( isset ( $opacity ) ) selected( $opacity, '0.6' ); ?>><?php esc_html_e('0.6', 'atmswc'); ?></option>
						<option value="0.7" <?php if ( isset ( $opacity ) ) selected( $opacity, '0.7' ); ?>><?php esc_html_e('0.7', 'atmswc'); ?></option>
						<option value="0.8" <?php if ( isset ( $opacity ) ) selected( $opacity, '0.8' ); ?>><?php esc_html_e('0.8', 'atmswc'); ?></option>
						<option value="0.9" <?php if ( isset ( $opacity ) ) selected( $opacity, '0.9' ); ?>><?php esc_html_e('0.9', 'atmswc'); ?></option>
						<option value="1"   <?php if ( isset ( $opacity ) ) selected( $opacity, '1' ); ?>><?php esc_html_e('1', 'atmswc'); ?></option>		
					</select>				
				</td>
			</tr> 
			<!-- End Image Opacity -->	

			<tr valign="top" id="bio_text">
				<th scope="row">
					<label for="bio_text_color"><?php esc_html_e('Biography ', 'atmswc'); ?></label>
				</th>
				<td style="vertical-align: middle;">
					<input name="bio_text_color" value="<?php if( $bio_text_color !='' ){ echo esc_attr($bio_text_color); } else { echo "#fff"; } ?>" class="jscolor" readonly>	&nbsp; <?php esc_html_e("Font Size", "atmswc"); ?> &nbsp;&nbsp; 
					<select name="bio_fontsize" id="bio_fontsize" class="timezone_string">
						<?php
							for( $i=8; $i<=72; $i++ ){
						?>
						<option value="<?php echo $i; ?>" <?php if( $i == $bio_fontsize ){ echo "selected"; } ?>><?php echo $i; ?><?php esc_html_e("px", "atmswc"); ?></option>
						<?php } ?>
					</select>				
				</td>
			</tr>
			<!-- End Bio Text -->

			<tr valign="top" id="designation_area">
				<th scope="row">
					<label for="designation"><?php esc_html_e('Designation', 'atmswc'); ?></label>
				</th>
				<td style="vertical-align: middle;">
					<input name="designation_color" value="<?php if( $designation_color !='' ){ echo esc_attr($designation_color); } else { echo "#1a1a1a"; } ?>" class="jscolor" readonly>
					&nbsp; <?php esc_html_e("Font Size:", "atmswc"); ?> &nbsp;&nbsp;	
					<select name="designation_fontsize" id="designation_fontsize" class="timezone_string">
						<?php
							for( $i=8; $i<=72; $i++ ){
						?>
						<option value="<?php echo $i; ?>" <?php if( $i == $designation_fontsize ){ echo "selected"; } ?>><?php echo $i; ?><?php esc_html_e("px", "atmswc"); ?></option>
						<?php } ?>
					</select>									
				</td>
			</tr> 
			<!-- End Designation -->

			<tr valign="top" id="telephone_area">
				<th scope="row">
					<label for="telephone"><?php esc_html_e('Telephone', 'atmswc'); ?></label>
				</th>
				<td style="vertical-align: middle;">
					<input name="telephone_color" value="<?php if( $telephone_color !='' ){ echo esc_attr($telephone_color); } else { echo "#1a1a1a"; } ?>" class="jscolor" readonly>
					&nbsp; <?php esc_html_e("Font Size", "atmswc"); ?> &nbsp;&nbsp;	
					<select name="telephone_fontsize" id="telephone_fontsize" class="timezone_string">
						<?php
							for( $i=8; $i<=72; $i++ ){
						?>
						<option value="<?php echo $i; ?>" <?php if( $i == $telephone_fontsize ){ echo "selected"; } ?>><?php echo $i; ?><?php esc_html_e('px', 'atmswc'); ?></option>
						<?php } ?>
					</select>									
				</td>
			</tr> 
			<!-- End Telephone -->

			<tr valign="top" id="email_area">
				<th scope="row">
					<label for="email"><?php esc_html_e('Email', 'atmswc'); ?></label>
				</th>
				<td style="vertical-align: middle;">
					<input name="email_color" value="<?php if( $email_color !='' ){ echo esc_attr($email_color); } else { echo "#1a1a1a"; } ?>" class="jscolor" readonly>
					&nbsp; <?php esc_html_e("Font Size", "atmswc"); ?> &nbsp;&nbsp;	
					<select name="email_fontsize" id="email_fontsize" class="timezone_string">
						<?php
							for( $i=8; $i<=72; $i++ ){
						?>
						<option value="<?php echo $i; ?>" <?php if( $i == $email_fontsize ){ echo "selected"; } ?>><?php echo $i; ?><?php esc_html_e('px', 'atmswc'); ?></option>
						<?php } ?>
					</select>									
				</td>
			</tr> 
			<!-- End Email -->	

			<tr valign="top" id="web_area">
				<th scope="row">
					<label for="web"><?php esc_html_e('Web', 'atmswc'); ?></label>
				</th>
				<td style="vertical-align: middle;">
					<input name="web_color" value="<?php if( $web_color !='' ){ echo esc_attr($web_color); } else { echo "#1a1a1a"; } ?>" class="jscolor" readonly>
					&nbsp; <?php esc_html_e("Font Size", "atmswc"); ?> &nbsp;&nbsp;	
					<select name="web_fontsize" id="web_fontsize" class="timezone_string">
						<?php
							for( $i=8; $i<=72; $i++ ){
						?>
						<option value="<?php echo $i; ?>" <?php if( $i == $web_fontsize ){ echo "selected"; }?>><?php echo $i; ?><?php esc_html_e('px', 'atmswc'); ?></option>
						<?php } ?>
					</select>									
				</td>
			</tr> 
			<!-- End Web -->	
		</tbody>
 	</table>
</div> 
<div class="wrap">
	<table class="form-table">
		<tbody>
			<tr valign="top" id="bio_social_area">
				<th scope="row">
					<label for="bio_social_icon"><?php esc_html_e('Social Icon', 'atmswc'); ?></label>
				</th>
				<td style="vertical-align: middle;">
					<select name="bio_social_icon" id="bio_social_icon" class="timezone_string">
						<option value="square" <?php if( $bio_social_icon == "square" ){ echo "selected"; } ?>><?php esc_html_e('Square', 'atmswc'); ?></option>
						<option value="round" <?php if( $bio_social_icon == "round" ){ echo "selected"; } ?>><?php esc_html_e('Round', 'atmswc'); ?></option>
					</select>			
				</td>
			</tr>
			<tr valign="top" id="bio_social">
				<th scope="row">
					<label for="bio_social_textcolor"><?php esc_html_e('Social Text Color', 'atmswc'); ?></label>
				</th>
				<td style="vertical-align: middle;">
					<input name="bio_social_textcolor" value="<?php if( $bio_social_textcolor !='' ){ echo esc_attr($bio_social_textcolor); } else { echo "#fff"; } ?>" class="jscolor" readonly>				
				</td>
			</tr> 
			<tr valign="top" id="bio_social_color">
				<th scope="row">
					<label for="bio_social_hcolor"><?php esc_html_e('Social Hover Text Color', 'atmswc'); ?></label>
				</th>
				<td style="vertical-align: middle;">
					<input name="bio_social_hcolor" value="<?php if( $bio_social_hcolor !='' ){ echo esc_attr($bio_social_hcolor); } else { echo "#fff"; } ?>" class="jscolor" readonly>				
				</td>
			</tr> 
			<tr valign="top" id="bio_social_backg">
				<th scope="row">
					<label for="bio_social_backcolor"><?php esc_html_e('Social Back Color', 'atmswc'); ?></label>
				</th>
				<td style="vertical-align: middle;">
					<input name="bio_social_backcolor" value="<?php if( $bio_social_backcolor !='' ){ echo esc_attr($bio_social_backcolor); } else { echo "#fff"; } ?>" class="jscolor" readonly>				
				</td>
			</tr> 

			<tr valign="top" id="bio_social_color">
				<th scope="row">
					<label for="bio_social_hcolor"><?php esc_html_e('Social Hover Back  Color', 'atmswc'); ?></label>
				</th>
				<td style="vertical-align: middle;">
					<input name="bio_social_backhcolor" value="<?php if( $bio_social_backhcolor !='' ){ echo esc_attr($bio_social_backhcolor); } else { echo "#fff"; } ?>" class="jscolor" readonly>				
				</td>
			</tr> 
			<!-- End Social -->	
		</tbody>
 	</table>
</div> 					
<?php
} // End all options function