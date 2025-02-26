<?php

class kirimAdminTop { 


	public function render_page(){
	

		$o 		= get_option('eu_law_options',array());
		// print_r($o);
	?>	
	<div class="eu-law-admin">
		<form method="POST">
		<h3 class="eu-law-head">Window Settings</h3>
		Do you find this plugin useful?<script type='text/javascript' src='https://ko-fi.com/widgets/widget_2.js'></script>
                <script type ='text/javascript'>kofiwidget2.init('Buy Us a Coffee', '#ee4f4f', 'A7061GQ');kofiwidget2.draw();</script>  <br><Br>
		<div class="eu-law-admin-panel">
		<label>Text to show</label>
		<input type="text" value="<?php echo $o['kirim_text_to_show'];?>" name="kirim_text_to_show">
		
		<hr>
		<label>Text Width (in Pixels)</label>
		<input type="text" value="<?php echo $o['text-width'];?>" name="text-width">
		
		<hr>
		<label>Cookie Law Terms Page</label>

		<select name="kirim_terms_page">
			<?php
			$old_terms_link_id=$o['kirim_terms_page'];
			$args = array(
				'post_type' => 'page',
				'posts_per_page' => -1,
			);
			$query = new WP_Query( $args );
			while ($query->have_posts()){
				$query->the_post();
				$id=get_the_ID();
				?><option value="<?php echo $id;?>" <?php if($id==$old_terms_link_id) echo 'selected';?>><?php the_title();?></option><?php
			}
			?>
		</select><br><br>
		If you are looking for Tailored Made Privacy Policy for your website, 
		you can checkout <a href="http://edissonclauss.com/" target="_blanks">Edisson Clauss Legal Docs</a>
		<hr>
		<label>Font Color</label>
		<input type="text" value="<?php echo $o['font-color'];?>" name="font-color" class="color-field">
		<hr>
		<label>Window Background Color</label>
		<input type="text" value="<?php echo $o['background-color'];?>" name="background-color" class="color-field">
		<hr>
		<label>Font Size (in px)</label>
		<input type="text" value="<?php echo $o['font-size'];?>" name="font-size">
		<hr>
		<label>Line Height (in px)</label>
		<input type="text" value="<?php echo $o['line-height'];?>" name="line-height">
		<hr>
		<label>Width (% or pixels)</label>
		<input type="text" value="<?php echo $o['width'];?>" name="width">
		<hr>
		<label>Position</label>
		<select name="fixed_position">
			<option value="0" <?php if($o['fixed_position']==0) echo "selected";?>>Top of Website</option>
			<option value="1" <?php if($o['fixed_position']==1) echo "selected";?>>Bottom of Website</option>
		</select>
		<hr>
		<label>Responsive Breakpoint (number of pixels for responsive view)</label>
		<input type="text" value="<?php echo $o['responsive-breakpoint'];?>" name="responsive-breakpoint">
		</div>
		<h3 class="eu-law-head">Learn More Button Options</h3>
		<div class="eu-law-admin-panel">
			<label>Button Text</label>
			<input type="text" value="<?php echo $o['learn-button-text'];?>" name="learn-button-text">
			<hr>
			<label>Position</label>
			<select name="learn-button-position">
				<option value="0" <?php if($o['learn-button-position']==0) echo "selected";?>>End of Text</option>
				<option value="1" <?php if($o['learn-button-position']==1) echo "selected";?>>Standalone Button</option>
			</select>
			<hr>
			<label>Color</label>
			<input type="text" value="<?php echo $o['learn-button-color'];?>" name="learn-button-color" class="color-field">
			<hr>
			<label>Padding Top-Bottom (in pixels)</label>
			<input type="text" value="<?php echo $o['learn-button-padding-top'];?>" name="learn-button-padding-top">
			<hr>
			<label>Padding Left-Right (in pixels)</label>
			<input type="text" value="<?php echo $o['learn-button-padding-left'];?>" name="learn-button-padding-left">
			<hr>
			<label>Border (in pixels)</label>
			<input type="text" value="<?php echo $o['learn-button-border'];?>" name="learn-button-border">
			<hr>
			<label>Border Color</label>
			<input type="text" value="<?php echo $o['learn-button-border-color'];?>" name="learn-button-border-color" class="color-field">
			<hr>
			<label>Border Radius (in pixels)</label>
			<input type="text" value="<?php echo $o['learn-button-border-radius'];?>" name="learn-button-border-radius">
			<hr>
			<label>Background Color</label>
			<input type="text" value="<?php echo $o['learn-button-background-color'];?>" name="learn-button-background-color" class="color-field">
		</div>

		<h3 class="eu-law-head">Agree Button Options</h3>
		<div class="eu-law-admin-panel">
			<label>Button Text</label>
			<input type="text" value="<?php echo $o['agree-button-text'];?>" name="agree-button-text">
			<hr>
			<label>Color</label>
			<input type="text" value="<?php echo $o['agree-button-color'];?>" name="agree-button-color" class="color-field">
			<hr>
			<label>Padding Top-Bottom (in pixels)</label>
			<input type="text" value="<?php echo $o['agree-button-padding-top'];?>" name="agree-button-padding-top">
			<hr>
			<label>Padding Left-Right (in pixels)</label>
			<input type="text" value="<?php echo $o['agree-button-padding-left'];?>" name="agree-button-padding-left">
			<hr>
			<label>Border (in pixels)</label>
			<input type="text" value="<?php echo $o['agree-button-border'];?>" name="agree-button-border">
			<hr>
			<label>Border Color</label>
			<input type="text" value="<?php echo $o['agree-button-border-color'];?>" name="agree-button-border-color" class="color-field">
			<hr>
			<label>Border Radius (in pixels)</label>
			<input type="text" value="<?php echo $o['agree-button-border-radius'];?>" name="agree-button-border-radius">
			<hr>
			<label>Background Color</label>
			<input type="text" value="<?php echo $o['agree-button-background-color'];?>" name="agree-button-background-color" class="color-field">
			<hr>
			<label>Full Height</label>
			<select name="agree-button-full-height">
				<option value="0" <?php if($o['agree-button-full-height']==0) echo "selected";?>>No</option>
				<option value="1" <?php if($o['agree-button-full-height']==1) echo "selected";?>>Yes</option>
			</select>
		</div>
		<input type="submit" class="submit" value="Save Changes" name="save_eu_law" >
		</form>
	</div>
	<?php
	}
}
 ?>