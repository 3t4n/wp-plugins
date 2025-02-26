<!-- layout custom section start-->
<div class="tab-pane <?php if(esc_html($tab) == "wacout_cms_sec"){echo "active";}?>" id="wacout_metabox_side_tab2">
	<div class="wacout_custom_section_tab">
		<?php
			/*
			** Check if for custom section label is not empty
			*/
			if(isset($temp_layout_custom_sec['wacout_cstm_sec1']) && !empty($temp_layout_custom_sec['wacout_cstm_sec1'])){
			 $wacout_cstm_sec1_ttl = sanitize_text_field($temp_layout_custom_sec['wacout_cstm_sec1']);
			} else{ $wacout_cstm_sec1_ttl = ""; }

			if(isset($temp_layout_custom_sec['wacout_cstm_sec2']) && !empty($temp_layout_custom_sec['wacout_cstm_sec2'])){
			 $wacout_cstm_sec2_ttl = sanitize_text_field($temp_layout_custom_sec['wacout_cstm_sec2']);
			} else{ $wacout_cstm_sec2_ttl = ""; }

			if(isset($temp_layout_custom_sec['wacout_cstm_sec3']) && !empty($temp_layout_custom_sec['wacout_cstm_sec3'])){
			 $wacout_cstm_sec3_ttl = sanitize_text_field($temp_layout_custom_sec['wacout_cstm_sec3']);
			} else{ $wacout_cstm_sec3_ttl = ""; }

		?>
		<div id="custom_sec_acrdn">
			<div class="cstm_sec_div">
				<h3><?php _e('Custom Section A' , 'wacout') ;?></h3>
				<div class="wacout_cstm_sec1 cstm_sec">						
					<div class="cstm_sec_group mb_20">
						<div class="cstm_sec_in">
							<div class="cstm_sec_lbl"><?php _e('Title' , 'wacout') ;?></div>
							<input class="cstm_sec_ctrl" type="text" name="wacout_custom_sections[wacout_cstm_sec1]" value="<?php echo esc_attr($wacout_cstm_sec1_ttl); ?>">
						</div>
					</div>
					<div class="cstm_sec_group">
						<div class="cstm_sec_in">
							<div class="cstm_sec_lbl"><?php _e('Description' , 'wacout') ;?></div>
							<?php
								/*
								** Check if custom section a description in not empty
								*/
							if(isset($temp_layout_custom_sec['wacout_csec_wp_editor1']) && !empty($temp_layout_custom_sec['wacout_csec_wp_editor1'])){
								$wacout_cstm_sec1_edtr1 = wp_kses_post($temp_layout_custom_sec['wacout_csec_wp_editor1']);
							} else{ $wacout_cstm_sec1_edtr1 = ""; }

							$editor_id = 'wacout_csec_wp_editor1';
							$option_name='wacout_csec_wp_editor1';
							wp_editor( wp_kses_post($wacout_cstm_sec1_edtr1), $editor_id,array('textarea_name' => $option_name,'media_buttons' => true,'editor_height' => 100,'tinymce' => array(
								'theme_advanced_buttons1' => 'formatselect,|,bold,italic,underline,|,' .
								'bullist,blockquote,|,justifyleft,justifycenter' .
								',justifyright,justifyfull,|,link,unlink,|' .
								',spellchecker,wp_fullscreen,wp_adv'
							))  );
							?>
						</div>
					</div>
				</div>
			</div>
			<div class="cstm_sec_div">
				<h3><?php _e('Custom Section B' , 'wacout') ;?></h3>
				<div class="wacout_cstm_sec2 cstm_sec">
					<div class="cstm_sec_group mb_20">
						<div class="cstm_sec_in">
							<div class="cstm_sec_lbl"><?php _e('Title' , 'wacout') ;?></div>
							<input class="cstm_sec_ctrl" type="text" name="wacout_custom_sections[wacout_cstm_sec2]" value="<?php echo esc_attr($wacout_cstm_sec2_ttl); ?>">
						</div>
					</div>
					<div class="cstm_sec_group">
						<div class="cstm_sec_in">
							<div class="cstm_sec_lbl"><?php _e('Description' , 'wacout') ;?></div>
							<?php
								/*
								** Check if custom section b description in not empty
								*/
							if(isset($temp_layout_custom_sec['wacout_csec_wp_editor2']) && !empty($temp_layout_custom_sec['wacout_csec_wp_editor2'])){
								$wacout_cstm_sec1_edtr2 = wp_kses_post($temp_layout_custom_sec['wacout_csec_wp_editor2']);
							} else{ $wacout_cstm_sec1_edtr2 = ""; }

							$editor_id = 'wacout_csec_wp_editor2';
							$option_name='wacout_csec_wp_editor2';
							wp_editor( wp_kses_post($wacout_cstm_sec1_edtr2), $editor_id,array('textarea_name' => $option_name,'media_buttons' => true,'editor_height' => 100,'tinymce' => array(
								'theme_advanced_buttons1' => 'formatselect,|,bold,italic,underline,|,' .
								'bullist,blockquote,|,justifyleft,justifycenter' .
								',justifyright,justifyfull,|,link,unlink,|' .
								',spellchecker,wp_fullscreen,wp_adv'
							))  );
							?>
						</div>
					</div>
				</div>
			</div>
			<div class="cstm_sec_div">
				<h3><?php _e('Custom Section C' , 'wacout') ;?></h3>
				<div class="wacout_cstm_sec3 cstm_sec">						
					<div class="cstm_sec_group mb_20">
						<div class="cstm_sec_in">
							<div class="cstm_sec_lbl"><?php _e('Title' , 'wacout') ;?></div>
							<input class="cstm_sec_ctrl" type="text" name="wacout_custom_sections[wacout_cstm_sec3]" value="<?php echo esc_attr($wacout_cstm_sec3_ttl); ?>">
						</div>
					</div>
					<div class="cstm_sec_group">
						<div class="cstm_sec_in">
							<div class="cstm_sec_lbl"><?php _e('Description' , 'wacout') ;?></div>
							<?php
								/*
								** Check if custom section c description in not empty
								*/
							if(isset($temp_layout_custom_sec['wacout_csec_wp_editor3']) && !empty($temp_layout_custom_sec['wacout_csec_wp_editor3'])){
								$wacout_cstm_sec1_edtr3 = wp_kses_post($temp_layout_custom_sec['wacout_csec_wp_editor3']);
							} else{ $wacout_cstm_sec1_edtr3 = ""; }

							$editor_id = 'wacout_csec_wp_editor3';
							$option_name='wacout_csec_wp_editor3';
							wp_editor( wp_kses_post($wacout_cstm_sec1_edtr3), $editor_id,array('textarea_name' => $option_name,'media_buttons' => true,'editor_height' => 100,'tinymce' => array(
								'theme_advanced_buttons1' => 'formatselect,|,bold,italic,underline,|,' .
								'bullist,blockquote,|,justifyleft,justifycenter' .
								',justifyright,justifyfull,|,link,unlink,|' .
								',spellchecker,wp_fullscreen,wp_adv'
							))  );
							?>
						</div>
					</div>
				</div>		
			</div>	
		</div>
	</div>
</div>
<!-- layout custom section end-->