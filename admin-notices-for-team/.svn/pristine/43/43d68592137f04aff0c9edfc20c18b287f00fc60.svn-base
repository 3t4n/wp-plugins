<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://plugwpress.com
 * @since      1.0.0
 *
 * @package    Ant_admin_notices_team
 * @subpackage Ant_admin_notices_team/admin/partials
 */

function ant_admin_settings_tabs ($current = 'general') {
	if ( isset ( $_GET['tab'] ) ) :
		$current = $_GET['tab'];
	else:
		$current = 'general';
	endif;
	$tabs  = array( 'general' => '<p class="dashicons dashicons-admin-settings"></p>General Options', 'design' => '<p class="dashicons dashicons-admin-customizer"></p>Design Options' );
	$links = array();
	foreach ( $tabs as $tab => $name ) :
		if ( $tab == $current ) :
			$links[] = "<a class='nav-tab nav-tab-active' href='?post_type=notice&page=ant_admin_notices_team&tab=$tab'>$name</a>";
		else :
			$links[] = "<a class='nav-tab' href='?post_type=notice&page=ant_admin_notices_team&tab=$tab'>$name</a>";
		endif;
	endforeach;
	echo '<div class="ant_tabs">';
	foreach ( $links as $link ) {

		echo $link;

	}
	echo '</div>';
}
?>


<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div id="ant_dashboard_wrap">
	<?php if ( isset( $_GET['settings-updated'] ) ) {
		echo "<div class='updated'><p>Settings updated successfully.</p></div>";
	} ?>


    <div class="nav-tab-wrapper">
		<?php ant_admin_settings_tabs(); ?>
    </div>




    <div id="ant_dashboard_content">
       <form method="post" action="options.php">

			<?php
			global $pagenow;

			if ( $pagenow == 'edit.php' && $_GET['page'] == 'ant_admin_notices_team' ) {
				if ( isset ( $_GET['tab'] ) ) {
					$tab = $_GET['tab'];
				} else {
					$tab = 'general';
				}
				switch ( $tab ) :
					default :
						settings_fields( $this->plugin_name . '-settings' );
						do_settings_sections( $this->plugin_name . '-settings&tab=general' );
						break;
					case 'design' :
					    ?>
                        <div id="ant_dashboard_design">
            <?php
						settings_fields( $this->plugin_name . '-design-settings' );
						do_settings_sections( $this->plugin_name . '-settings&tab=design' );
						?>
                        </div>
            <?php
						break;

				endswitch;

			}
			?>
        <div class="ant_options_btn">
		    <?php
		    submit_button();
		    ?>
       </div>
        </form>
    </div>
    </div>
