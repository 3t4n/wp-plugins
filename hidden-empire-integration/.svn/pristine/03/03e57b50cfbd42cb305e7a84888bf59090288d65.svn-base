<?php
// Define Hebrew Tool Names
$name_popup = 'פופ אפ';
$name_copypaste = 'כלי קופי-פייסט';

?>

<div class='wrap'>
	<?php if( isset($_GET['settings-updated']) ) { ?>
    	<div id="message" class="updated">
        	<p><strong><?php _e('Settings saved.') ?></strong></p>
    	</div>
	<?php } ?>
	
	<div id="icon-options-general" class="icon32">
		<div id="hiddenempire-options-page" style="width:400px; direction:rtl; text-align:right;">
			<h2>האימפרייה הנסתרת</h2>

			<p>הכניסו את שם המשתמש שלכם בתיבה ולחצו "עדכן"</p>


			<form action="options.php" method="post" id="<?php echo $plugin_id; ?>_options_form" name="<?php echo $plugin_id; ?>_options_form">

			<?php settings_fields($plugin_id.'_options'); ?>

				<li><label>
					<input type="text" value="<?php echo get_option('he_userid'); ?>" name="he_userid" placeholder="username"/>
				</label></li>
				<br />
				<li><label>

					<?php

						if (get_option('he_popup_option'))
							echo '<input type="checkbox" name="he_popup_option" checked /> ' .$name_popup;
						else
							echo '<input type="checkbox" name="he_popup_option" /> ' .$name_popup;

					?>

				</label></li>
				<li><label>

					<?php

						if (get_option('he_copypaste_option'))
							echo '<input type="checkbox" name="he_copypaste_option" checked /> ' .$name_copypaste;
						else
							echo '<input type="checkbox" name="he_copypaste_option" /> ' .$name_copypaste;

					?>

				</label></li>
				
				<li id="toggleFreecode">
					<span><a href="#">עריכה חופשית</a></span>
				</li>
				<li id="Freecode_l" style="display:none;"><label>

					<?php

						if (get_option('he_freecode')) {
							$addthis = get_option('he_freecode');
						} else {
							$addthis = 'no code yet';
						}
						
						echo '<textarea id="he_freecode" name="he_freecode">'.$addthis.'</textarea>'

					?>

				</label></li>
				
				<li><label><input class="button-primary" type="submit" value="שמור שינויים" /></label></li>

			</form>
			
			<h4>היכן נמצא שם המשתמש שלי?</h4>
			<p>גשו לעמוד 
				"<a href="http://hiddenempire.co.il/members/">ניהול חשבון</a>"
				בממשק האימפרייה הנסתרת. שם המשתמש שלכם מופיע בשדה Username. העתיקו אותו לכןא בדיוק כמו שהוא ללא רווחים. שימו לב לאותיות גדולות וקטנות.
				</p>



			<script>		
				jQuery(function(){
					jQuery('#toggleFreecode').click(function(){
						jQuery('#Freecode_l').slideToggle();
					});
					jQuery("textarea").live("focus", function(){ if( this.value == this.defaultValue ) { this.value = ''; } }).live("blur", function(){ if( !this.value.length ) { this.value = this.defaultValue; } } );
				});
			</script>
			<style type="text/css">
				li {list-style:none;}
				textarea {width:400px; direction:ltr; min-height:180px; font-family:"Lucida Console", Monaco, monospace, "Courier New", Courier, monospace; font-size:11px;}
			</style>
		</div>
	</div>

</div>