<?php
	/* setting page */
	
	function openinghours_show_settings() {
		?>
		<script src="http://code.jquery.com/jquery-latest.js"></script>
		<div>
			<h2>Office Hours</h2>
			<form action="options.php" method="post">
				<?php settings_fields('openinghour_options'); ?>
				<?php do_settings_sections('openinghour'); ?>
				<br/>
				<input class="button" name="Submit" type="submit" value="<?php esc_attr_e( 'Save Changes' ); ?>" />
		</form>
		<script>
					/* remove line from holydays table*/
					var counter = jQuery("#holydays tr").length;
					jQuery(".del").on('click', function() {
						$(this).parent().parent().remove();
					});
					/* add line into holydays table*/
					jQuery("#add").click(function() {
						/* max 50 lines (changing here is enough) */
						if(counter < 51){
							jQuery('#holydays tr:last').after('<tr><td><input name="free_from'+counter+'" class="input_date" type="text" size="10" value="'+$("input#openinghour_holydays_from").val()+'"/></td><td><input name="free_to'+counter+'" class="input_date" type="text" size="10" value="'+$("input#openinghour_holydays_to").val()+'"/></td><td><input name="free_why'+counter+'"type="text" size="10" value="'+$("input#openinghour_holydays_why").val()+'"/></td><td><button class="del" type="button"><?php _e( 'Remove', 'opening_hours' ); ?></button></td></tr>');
							counter++;
						}
					});	
				</script>
	</div>
	<?php
	}
?>
