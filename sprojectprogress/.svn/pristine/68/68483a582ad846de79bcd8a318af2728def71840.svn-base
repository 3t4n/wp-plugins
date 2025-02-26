<?php
	function sPP_admin_page() {
		if ( isset( $_POST['save'] ) ) {
			update_option( 'sPP_default_layout', $_POST['layout'] );
			update_option( 'sPP_default_primarycolor', $_POST['primarycolor'] );
			update_option( 'sPP_default_secondarycolor', $_POST['secondarycolor'] );
		}

		?>
		<div class="wrap">
			<h2>sProjectProgress - Settings</h2>
			<form action="" method="post">
				<h3>Preselected settings</h3>
				<p>This settings will be used if you create a new progress bar.</p>
				<div id="sPP_appearance">
					<h4>Appearance</h4>
					<p>You have the choice between the theme based standard appearance and some of us created appearances.</p>
					<input id="layout0" name="layout" value="0" type="radio"<?php if( get_option( 'sPP_default_layout' ) == 0 ) echo ' checked'; ?> onclick="sPP_colors.style.display='none'" /> <label for="layout0">Standard</label><br />
					<input id="layout1" name="layout" value="1" type="radio"<?php if( get_option( 'sPP_default_layout' ) == 1 ) echo ' checked'; ?> onclick="sPP_colors.style.display='block'" /> <label for="layout1">Flat</label><br />
					<input id="layout2" name="layout" value="2" type="radio"<?php if( get_option( 'sPP_default_layout' ) == 2 ) echo ' checked'; ?> onclick="sPP_colors.style.display='block'" /> <label for="layout2">Round</label><br />
				</div>
				<div id="sPP_colors" style="display:<?php echo ( get_option( 'sPP_default_layout' ) == 0 ) ? 'none;' : 'block;'; ?>">
					<h4>Colors</h4>
					<p>This setting let you decide which colors the progress bars have (not for the standard appearance). You have to use hexadecimal codes.</p>
					<input id="primarycolor" name="primarycolor" type="color" value="<?php echo get_option( 'sPP_default_primarycolor' ); ?>" /> <label for="primarycolor">Primary color</label><br />
					<input id="secondarycolor" name="secondarycolor" type="color" value="<?php echo get_option( 'sPP_default_secondarycolor' ); ?>" /> <label for="secondarycolor">Secondary color</label><br />
				</div>
				<input type="hidden" name="save" value="true" />
				<p><input type="submit" value="Save changes" /></p>
			</form>
			<h3>Next updates</h3>
			<p>You will get more settings and appearances in the next updates.</p>
			<br />
			<p>Thank you for using my plugin. Visit me on <a href="http://simonknittel.de/" target="_blank">simonknittel.de</a></p>
		</div>
		<?php
	}

	function sPP_register_admin_page() {
		add_submenu_page( 'options-general.php', 'sProjectProgress', 'sProjectProgress', 10, 'sPP', 'sPP_admin_page' );
	}

	add_action( 'admin_menu', 'sPP_register_admin_page' );
?>