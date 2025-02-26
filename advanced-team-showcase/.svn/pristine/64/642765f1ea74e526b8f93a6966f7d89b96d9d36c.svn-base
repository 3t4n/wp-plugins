<?php	
function atmswc_sorting( $post, $args ){
	$sort_array		= get_post_meta( $post->ID, 'sort_array', true );
?>	
<div class="wrap">
	<div>
		<table class="form-table atmswc-form-table">
			<tbody class="atmswc_class2">
			<?php if( !empty($sort_array) ){
				foreach ( $sort_array as $value ){
					if( $value =="designation" ){
			?>
				<tr valign="top" class="ui-state-default atmswc-drag">
					<th scope="row">
						<label for="sort_dg"><?php esc_html_e('Designation', 'atmswc')?></label>
					</th>
					<td style="vertical-align: middle;">
						<div style="float:left;width:100%;margin-bottom: 10px;">
							<input type="hidden" name="sort_array[]" value="designation">
						</div>																			
					</td>
				</tr>
			<?php 
				}
				if( $value =="mail" ){				
			?>	
				<tr valign="top" class="ui-state-default atmswc-drag">
					<th scope="row">
						<label for="sort_em"><?php esc_html_e('Email', 'atmswc')?></label>
					</th>
					<td style="vertical-align: middle;">
						<div style="float:left;width:100%;margin-bottom: 10px;">
							<input type="hidden" name="sort_array[]" value="mail">
						</div>																	
					</td>														
				</tr>
			<?php 
				}
				if( $value =="telephone" ){			
			?>					
				<tr valign="top" class="ui-state-default atmswc-drag">
					<th scope="row">
						<label for="sort_tel"><?php esc_html_e('Telephone', 'atmswc')?></label>
					</th>
					<td style="vertical-align: middle;">
						<div style="float:left;width:100%;margin-bottom: 10px;">
							<input type="hidden" name="sort_array[]" value="telephone">
						</div>																		
					</td>														
				</tr>
			<?php 
				}
				if( $value =="web" ){				
			?>									
				<tr valign="top" class="ui-state-default atmswc-drag">
					<th scope="row">
						<label for="sort_web"><?php esc_html_e('Web', 'atmswc')?></label>
					</th>
					<td style="vertical-align: middle;">
						<div style="float:left;width:100%;margin-bottom: 10px;">
							<input type="hidden" name="sort_array[]" value="web" >		
						</div>																
					</td>														
				</tr>											
			<?php }   
			 }   // End foreach loop
			 }  else { ?>
				<tr valign="top" class="ui-state-default atmswc-drag">
					<th scope="row">
						<label for="sort_dg"><?php esc_html_e('Designation', 'atmswc')?></label>
					</th>
					<td style="vertical-align: middle;">
						<div style="float:left;width:100%;margin-bottom: 10px;">
							<input type="hidden" name="sort_array[]" value="designation">
						</div>																			
					</td>
				</tr>
				<tr valign="top" class="ui-state-default atmswc-drag">
					<th scope="row">
						<label for="sort_em"><?php esc_html_e('Email', 'atmswc')?></label>
					</th>
					<td style="vertical-align: middle;">
						<div style="float:left;width:100%;margin-bottom: 10px;">
							<input type="hidden" name="sort_array[]" value="mail">
						</div>																	
					</td>														
				</tr>
				<tr valign="top" class="ui-state-default atmswc-drag">
					<th scope="row">
						<label for="sort_tel"><?php esc_html_e('Telephone', 'atmswc')?></label>
					</th>
					<td style="vertical-align: middle;">
						<div style="float:left;width:100%;margin-bottom: 10px;">
							<input type="hidden" name="sort_array[]" value="telephone">
						</div>																		
					</td>														
				</tr>				
				<tr valign="top" class="ui-state-default atmswc-drag">
					<th scope="row">
						<label for="sort_web"><?php esc_html_e('Web', 'atmswc')?></label>
					</th>
					<td style="vertical-align: middle;">
						<div style="float:left;width:100%;margin-bottom: 10px;">
							<input type="hidden" name="sort_array[]" value="web" >		
						</div>																
					</td>														
				</tr>	

			<?php } ?>
			</tbody>
	 	</table>
	</div> 
</div> 
<?php }
	// End Sort Meta	
	function atmswc_social_sorting( $post, $args ){
		$sort_social	= get_post_meta( $post->ID, 'sort_social', true );
 ?>

<div class="wrap">
	<div>
		<table class="form-table atmswc-form-table">
			<tbody class="atmswc_class3">
			<?php if( !empty($sort_social) ){
				foreach ( $sort_social as $value ) {
			 		if( $value =="fb" ){
			?>
				<tr valign="top" class="ui-state-default atmswc-drag">
					<th scope="row">
						<label for="sort_fb"><?php esc_html_e('Facebook', 'atmswc')?></label>
					</th>
					<td style="vertical-align: middle;">
						<div style="float:left;width:100%;margin-bottom: 10px;">
							<input type="hidden" name="sort_social[]" value="fb">
						</div>																			
					</td>
				</tr>
			<?php 
				}
				if( $value =="twitter" ){				
			?>	
				<tr valign="top" class="ui-state-default atmswc-drag">
					<th scope="row">
						<label for="sort_twitter"><?php esc_html_e('Twitter', 'atmswc')?></label>
					</th>
					<td style="vertical-align: middle;">
						<div style="float:left;width:100%;margin-bottom: 10px;">
							<input type="hidden" name="sort_social[]" value="twitter">
						</div>																	
					</td>														
				</tr>
			<?php 
				}
				if( $value =="gplus" ){			
			?>					
				<tr valign="top" class="ui-state-default atmswc-drag">
					<th scope="row">
						<label for="sort_gplus"><?php esc_html_e('Google Plus', 'atmswc')?></label>
					</th>
					<td style="vertical-align: middle;">
						<div style="float:left;width:100%;margin-bottom: 10px;">
							<input type="hidden" name="sort_social[]" value="gplus">
						</div>																		
					</td>														
				</tr>
			<?php 
				}
				if( $value =="linkedin" ){				
			?>									
				<tr valign="top" class="ui-state-default atmswc-drag">
					<th scope="row">
						<label for="sort_linkedin"><?php esc_html_e('Linkedin', 'atmswc')?></label>
					</th>
					<td style="vertical-align: middle;">
						<div style="float:left;width:100%;margin-bottom: 10px;">
							<input type="hidden" name="sort_social[]" value="linkedin">		
						</div>																
					</td>														
				</tr>
			<?php 
				}
				if( $value =="github" ){				
			?>					
				<tr valign="top" class="ui-state-default atmswc-drag">
					<th scope="row">
						<label for="sort_github"><?php esc_html_e('Github', 'atmswc')?></label>
					</th>
					<td style="vertical-align: middle;">
						<div style="float:left;width:100%;margin-bottom: 10px;">
							<input type="hidden" name="sort_social[]" value="github">		
						</div>																
					</td>														
				</tr>
			<?php 
				}
				if( $value =="behance" ){				
			?>
				<tr valign="top" class="ui-state-default atmswc-drag">
					<th scope="row">
						<label for="sort_behance"><?php esc_html_e('Behance', 'atmswc')?></label>
					</th>
					<td style="vertical-align: middle;">
						<div style="float:left;width:100%;margin-bottom: 10px;">
							<input type="hidden" name="sort_social[]" value="behance">		
						</div>																
					</td>														
				</tr>
			<?php 
				}
				if( $value =="dribbble" ){				
			?>
				<tr valign="top" class="ui-state-default atmswc-drag">
					<th scope="row">
						<label for="sort_dribbble"><?php esc_html_e('Dribbble', 'atmswc')?></label>
					</th>
					<td style="vertical-align: middle;">
						<div style="float:left;width:100%;margin-bottom: 10px;">
							<input type="hidden" name="sort_social[]" value="dribbble">		
						</div>																
					</td>														
				</tr>
			<?php 
				}
				if( $value =="youtube" ){				
			?>				

				<tr valign="top" class="ui-state-default atmswc-drag">
					<th scope="row">
						<label for="sort_youtube"><?php esc_html_e('Youtube', 'atmswc')?></label>
					</th>
					<td style="vertical-align: middle;">
						<div style="float:left;width:100%;margin-bottom: 10px;">
							<input type="hidden" name="sort_social[]" value="youtube">		
						</div>																
					</td>														
				</tr>																

			<?php }   
			 }   // End foreach loop
			 }  else { ?>
				<tr valign="top" class="ui-state-default atmswc-drag">
					<th scope="row">
						<label for="sort_fb"><?php esc_html_e('Facebook', 'atmswc')?></label>
					</th>
					<td style="vertical-align: middle;">
						<div style="float:left;width:100%;margin-bottom: 10px;">
							<input type="hidden" name="sort_social[]" value="fb">
						</div>																			
					</td>
				</tr>
				<tr valign="top" class="ui-state-default atmswc-drag">
					<th scope="row">
						<label for="sort_twitter"><?php esc_html_e('Twitter', 'atmswc')?></label>
					</th>
					<td style="vertical-align: middle;">
						<div style="float:left;width:100%;margin-bottom: 10px;">
							<input type="hidden" name="sort_social[]" value="twitter">
						</div>																	
					</td>														
				</tr>
				<tr valign="top" class="ui-state-default atmswc-drag">
					<th scope="row">
						<label for="sort_gplus"><?php esc_html_e('Telephone', 'atmswc')?></label>
					</th>
					<td style="vertical-align: middle;">
						<div style="float:left;width:100%;margin-bottom: 10px;">
							<input type="hidden" name="sort_social[]" value="gplus">
						</div>																		
					</td>														
				</tr>				
				<tr valign="top" class="ui-state-default atmswc-drag">
					<th scope="row">
						<label for="sort_linkedin"><?php esc_html_e('Linkedin', 'atmswc')?></label>
					</th>
					<td style="vertical-align: middle;">
						<div style="float:left;width:100%;margin-bottom: 10px;">
							<input type="hidden" name="sort_social[]" value="linkedin">		
						</div>																
					</td>														
				</tr>

				<tr valign="top" class="ui-state-default atmswc-drag">
					<th scope="row">
						<label for="sort_github"><?php esc_html_e('Github', 'atmswc')?></label>
					</th>
					<td style="vertical-align: middle;">
						<div style="float:left;width:100%;margin-bottom: 10px;">
							<input type="hidden" name="sort_social[]" value="github">		
						</div>																
					</td>														
				</tr>

				<tr valign="top" class="ui-state-default atmswc-drag">
					<th scope="row">
						<label for="sort_behance"><?php esc_html_e('Behance', 'atmswc')?></label>
					</th>
					<td style="vertical-align: middle;">
						<div style="float:left;width:100%;margin-bottom: 10px;">
							<input type="hidden" name="sort_social[]" value="behance">		
						</div>																
					</td>														
				</tr>
				<tr valign="top" class="ui-state-default atmswc-drag">
					<th scope="row">
						<label for="sort_dribbble"><?php esc_html_e('Dribbble', 'atmswc')?></label>
					</th>
					<td style="vertical-align: middle;">
						<div style="float:left;width:100%;margin-bottom: 10px;">
							<input type="hidden" name="sort_social[]" value="dribbble">		
						</div>																
					</td>														
				</tr>

				<tr valign="top" class="ui-state-default atmswc-drag">
					<th scope="row">
						<label for="sort_youtube"><?php esc_html_e('Youtube', 'atmswc')?></label>
					</th>
					<td style="vertical-align: middle;">
						<div style="float:left;width:100%;margin-bottom: 10px;">
							<input type="hidden" name="sort_social[]" value="youtube">		
						</div>																
					</td>														
				</tr>				

			<?php } ?>
			</tbody>
	 	</table>
	</div> 
</div> 
 <?php } 