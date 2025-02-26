<?php
function atmswc_display_social_profiles( $post, $args ){

	// All Show/Hide Settings Section
	$atmswc_fb         			= get_post_meta( $post->ID, 'atmswc_fb', true );
	$atmswc_twitter         	= get_post_meta( $post->ID, 'atmswc_twitter', true );
	$atmswc_gplus         		= get_post_meta( $post->ID, 'atmswc_gplus', true );
	$atmswc_linkedin         	= get_post_meta( $post->ID, 'atmswc_linkedin', true );
	$atmswc_github         		= get_post_meta( $post->ID, 'atmswc_github', true );
	$atmswc_behance         	= get_post_meta( $post->ID, 'atmswc_behance', true );
	$atmswc_dribble         	= get_post_meta( $post->ID, 'atmswc_dribble', true );
	$atmswc_youtube         	= get_post_meta( $post->ID, 'atmswc_youtube', true );

?>
<div class="wrap">
	<table class="form-table">
		<tbody>
			<tr valign="top">
				<th scope="row">
					<label for="atmswc_fb"><?php esc_html_e('Facebook', 'atmswc'); ?></label>
				</th>
				<td style="vertical-align: middle;">
					<input type="text" name="atmswc_fb" id="atmswc_fb" maxlength="1500" class="widefat widefat_custom" value="<?php echo esc_url($atmswc_fb); ?>" placeholder="Facebook"> &nbsp;		
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					<label for="atmswc_twitter"><?php esc_html_e('Twitter', 'atmswc'); ?></label>
				</th>
				<td style="vertical-align: middle;">
					<input type="text" name="atmswc_twitter" id="atmswc_twitter" maxlength="1500" class="widefat widefat_custom" value="<?php echo esc_url($atmswc_twitter); ?>" placeholder="Twitter"> &nbsp;	
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					<label for="atmswc_gplus"><?php esc_html_e('Google Plus', 'atmswc'); ?></label>
				</th>
				<td style="vertical-align: middle;">
					<input type="text" name="atmswc_gplus" id="atmswc_gplus" maxlength="1500" class="widefat widefat_custom" value="<?php echo esc_url($atmswc_gplus); ?>" placeholder="Google Plus"> &nbsp;
							
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					<label for="atmswc_linkedin"><?php esc_html_e('Linkedin', 'atmswc'); ?></label>
				</th>
				<td style="vertical-align: middle;">
					<input type="text" name="atmswc_linkedin" id="atmswc_linkedin" maxlength="1500" class="widefat widefat_custom" value="<?php echo esc_url($atmswc_linkedin); ?>" placeholder="Linkedin"> &nbsp;
								
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					<label for="atmswc_github"><?php esc_html_e('Github', 'atmswc'); ?></label>
				</th>
				<td style="vertical-align: middle;">
					<input type="text" name="atmswc_github" id="atmswc_github" maxlength="1500" class="widefat widefat_custom" value="<?php echo esc_url($atmswc_github); ?>" placeholder="Github"> &nbsp;
									
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					<label for="atmswc_behance"><?php esc_html_e('Behance', 'atmswc'); ?></label>
				</th>
				<td style="vertical-align: middle;">
					<input type="text" name="atmswc_behance" id="atmswc_behance" maxlength="1500" class="widefat widefat_custom" value="<?php echo esc_url($atmswc_behance); ?>" placeholder="Behance"> &nbsp;		
				</td>
			</tr>	
			<tr valign="top">
				<th scope="row">
					<label for="atmswc_dribble"><?php esc_html_e('Dribble', 'atmswc'); ?></label>
				</th>
				<td style="vertical-align: middle;">
					<input type="text" name="atmswc_dribble" id="atmswc_dribble" maxlength="1500" class="widefat widefat_custom" value="<?php echo esc_url($atmswc_dribble); ?>" placeholder="Dribble"> &nbsp;		
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					<label for="atmswc_youtube"><?php esc_html_e('Youtube', 'atmswc'); ?></label>
				</th>
				<td style="vertical-align: middle;">
					<input type="text" name="atmswc_youtube" id="atmswc_youtube" maxlength="1500" class="widefat widefat_custom" value="<?php echo esc_url($atmswc_youtube); ?>" placeholder="Youtube"> &nbsp;
				</td>
			</tr>																																						
		</tbody>							
	</table>
</div>	

<?php 
}