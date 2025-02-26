<div class="wrap">
	<div id="icon-tools" class="icon32"></div>
	<h2>AK Bootstrap FAQ setting page</h2>
	<hr/>
	
	<form method="post" action="options.php" novalidate="novalidate">
		<?php settings_fields( 'akbootstrapfaq-settings-group' ); ?>
		<?php do_settings_sections( 'akbootstrapfaq-settings-group' ); ?>
		<table class="form-table">
			<tbody>
				<tr>
					<th scope="row">
						<label for="blogname">Display mode</label>
					</th>
					<td>
						<?php
						if(esc_attr( get_option('faq_display_mode') ) == 1) {
						?>
						<label><input name="faq_display_mode" type="radio" value="0" /> Normal &nbsp;</label>
						<label><input name="faq_display_mode" checked type="radio" value="1" /> Category wise</label>
						<?php
						}else {
						?>
						<label><input name="faq_display_mode" checked type="radio" value="0" /> Normal &nbsp;</label>
						<label><input name="faq_display_mode" type="radio" value="1" /> Category wise</label>
						<?php
						}
						?>
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="cat_h_color">Category heading color</label>
					</th>
					<td>
						<input name="cat_h_color" type="text" id="cat_h_color"  value="<?php if(esc_attr( get_option('cat_h_color') != "")) {echo esc_attr( get_option('cat_h_color') );} else {echo '#333333';} ?>" class="regular-text color-field">
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="ques_bg_color">Question background color</label>
					</th>
					<td>
						<input name="ques_bg_color" type="text" id="ques_bg_color" value="<?php if(esc_attr( get_option('ques_bg_color') != "")) {echo esc_attr( get_option('ques_bg_color') );} else {echo '#f5f5f5';} ?>" class="regular-text color-field">
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="ques_txt_color">Question text color</label>
					</th>
					<td>
						<input name="ques_txt_color" type="text" id="ques_txt_color" value="<?php if(esc_attr( get_option('ques_txt_color') != "")) {echo esc_attr( get_option('ques_txt_color') );} else {echo '#333333';} ?>" class="regular-text color-field">
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="ques_bdr_color">Question border color</label>
					</th>
					<td>
						<input name="ques_bdr_color" type="text" id="ques_bdr_color" value="<?php if(esc_attr( get_option('ques_bdr_color') != "")) {echo esc_attr( get_option('ques_bdr_color') );} else {echo '#dddddd';} ?>" class="regular-text color-field">
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="ans_bg_color">Answer background color</label>
					</th>
					<td>
						<input name="ans_bg_color" type="text" id="ans_bg_color" value="<?php if(esc_attr( get_option('ans_bg_color') != "")) {echo esc_attr( get_option('ans_bg_color') );} else {echo '#ffffff';} ?>" class="regular-text color-field">
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="ans_txt_color">Answer text color</label>
					</th>
					<td>
						<input name="ans_txt_color" type="text" id="ans_txt_color" value="<?php if(esc_attr( get_option('ans_txt_color') != "")) {echo esc_attr( get_option('ans_txt_color') );} else {echo '#333333';} ?>" class="regular-text color-field">
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="ans_bdr_color">Answer border color</label>
					</th>
					<td>
						<input name="ans_bdr_color" type="text" id="ans_bdr_color" value="<?php if(esc_attr( get_option('ans_bdr_color') != "")) {echo esc_attr( get_option('ans_bdr_color') );} else {echo '#dddddd';} ?>" class="regular-text color-field">
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="faq_icon_color">Icon color</label>
					</th>
					<td>
						<input name="faq_icon_color" type="text" id="faq_icon_color" value="<?php if(esc_attr( get_option('faq_icon_color') != "")) {echo esc_attr( get_option('faq_icon_color') );} else {echo '#454444';} ?>" class="regular-text color-field">
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="act_icon_color">Active Icon color</label>
					</th>
					<td>
						<input name="act_icon_color" type="text" id="act_icon_color" value="<?php if(esc_attr( get_option('act_icon_color') != "")) {echo esc_attr( get_option('act_icon_color') );} else {echo '#F58723';} ?>" class="regular-text color-field">
					</td>
				</tr>
			</tbody>
		</table>
		<?php submit_button(); ?>
	</form>
</div>