<?php

if (!function_exists('GetRoleList')) {

	function GetRoleList() {
		global $wp_roles;

		if ( ! isset( $wp_roles ) ) {
			$wp_roles = new WP_Roles();
		}
		
		// get active level
		$sgsUserlevel		=  get_option('userLevelMayChangeSGS');

		foreach ( $wp_roles->get_names() as $key => $value ) {

			$level = GetUserMaxLevel( $key );

			// set selected option
			$selected = '';
			if ( $level == $sgsUserlevel ) {
				$selected = ' selected="selected"';
			}

			$options .= "\t" . '<option value="' . $level . '" ' . $selected . '>' . $value . '</option>' . "\n";

		}
		
		$select = '<select name="sgsUserlevel">' . "\n" . $options . '</select>';

		return $select;
	}
}

if ( !function_exists('GetUserMaxLevel') ) {

	function GetUserMaxLevel( $role ) {
		
		// get role info
		$roleInfo = get_role( $role );

		// max level
		$maxLevel = 100;

		for( $i = 0; $i < $maxLevel; $i++ )
		{
			// set level
			if ( $roleInfo->capabilities['level_' . $i] )
			{
				$level = $i;
			} else {
				// stop loop
				break;
			}
		}

		return $level;

	}
}

if ( !function_exists('GetCurrentUserLevel') ) {

	function GetCurrentUserLevel() {
		
		global $current_user;

		get_currentuserinfo();

		return GetUserMaxLevel($current_user->roles[0]);

	}
}

?>

<?php 
	if($_POST['SimpleGeneralSettingsExists']) {

		//Form data sent
		extract($_POST);

		// if is administrator
		if ( current_user_can('administrator') ) {
			update_option('userLevelMayChangeSGS', $sgsUserlevel);
		}
		
		update_option('blogname', $sgsName);
		update_option('blogdescription', $sgsDescription);
?>
		<div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>
<?php
	} else {

		//Normal page display
		$sgsName			=  get_bloginfo('name');
		$sgsDescription		=  get_bloginfo('description');

	}
	
?>

<div class="wrap">
<?php    echo "<h2>" . __( 'Simple General Settings', 'simpleSettings_trdom' ) . "</h2>"; ?>

<?php if ( GetCurrentUserLevel() >= get_option('userLevelMayChangeSGS') ) : ?>

<form name="SimpleGeneralSettingsForm" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
	<input type="hidden" name="SimpleGeneralSettingsExists" value="true">
	<?php    echo "<h4>" . __( 'Simple General Settings', 'SimpleGeneralSettings_trdom' ) . "</h4>"; ?>
	<?php if ( current_user_can('administrator') ) : ?>
	<p><?php _e("User role can change settings: " ); echo(GetRoleList()); ?></p>
	<?php endif; ?>
	<p><label><?php _e("Site Title: " ); ?><input type="text" name="sgsName" value="<?php echo $sgsName; ?>" class="regular-text" /></label></p>
	<p><label><?php _e("Tagline: " ); ?><input type="text" name="sgsDescription" value="<?php echo $sgsDescription; ?>" class="regular-text" /></label></p>	
	<p class="submit">
	    <input type="submit" name="Submit" value="<?php _e('Update Options', 'SimpleGeneralSettings_trdom' ) ?>" />
	</p>
</form>

<?php else : ?>

	<?php    echo "<h4>" . __( 'You don\'t have permission to change Simple General Settings', 'SimpleGeneralSettings_trdom' ) . "</h4>"; ?>
	<p><?php _e("Site Title: " ); echo $sgsName; ?></p>
	<p><?php _e("Tagline: " ); echo $sgsDescription; ?></p>	


<?php endif; ?>
</div>