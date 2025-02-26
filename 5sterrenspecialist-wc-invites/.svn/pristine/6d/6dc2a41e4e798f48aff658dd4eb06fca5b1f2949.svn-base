<div class="wrap">
    <h2><?php _e( 'Settings', FIVESTER_INVITE_SLUG__ );?></h2>

<?php
	$tab = sanitize_title( $_REQUEST[ 'tab' ] );
    $active_tab = isset( $tab ) ? $tab : "fields";
?>
    <h2 class="nav-tab-wrapper">
        <a href="?page=<?php echo FIVESTER_INVITE_SLUG__;?>&tab=config" class="nav-tab <?php echo $active_tab == 'config' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Configuration', FIVESTER_INVITE_SLUG__ );?></a>
        <a href="?page=<?php echo FIVESTER_INVITE_SLUG__;?>&tab=fields" class="nav-tab <?php echo $active_tab == 'fields' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Fields', FIVESTER_INVITE_SLUG__ );?></a>
    </h2>

    <form method="post" action="">
        <table class="form-table">
<?php
    switch ( $active_tab ) {
        case 'config':
?>
            <tr valign="top">
                <th scope="row"><?php _e( 'Company ID', FIVESTER_INVITE_SLUG__ );?></th>
                <td><input type="text" name="companyID" id="companyID" value="<?php echo self::getOption( 'companyID' );?>" class="regular-text"></td>
            </tr>
            <tr valign="top">
                <th scope="row"><?php _e( 'Password', FIVESTER_INVITE_SLUG__ );?></th>
                <td><input type="password" name="password" id="password" value="<?php echo self::getOption( 'password' );?>" class="regular-text"></td>
            </tr>
             <tr valign="top">
                <th scope="row"><?php _e( 'Blacklisted domains', FIVESTER_INVITE_SLUG__ );?></th>
                <td><textarea name="blacklist" id="blacklist" class="regular-text" cols="50" rows="10"><?php echo self::getOption( 'blacklist' );?></textarea></td>
            </tr>
<?php
			break;
        case 'fields':
?>
            <tr valign="top">
                <th scope="row"><?php _e( 'First name seller', FIVESTER_INVITE_SLUG__ );?></th>
                <td><input type="text" name="employeeFirstname" id="employeeFirstname" value="<?php echo self::getOption( 'employeeFirstname' );?>" class="regular-text"></td>
            </tr>
            <tr valign="top">
                <th scope="row"><?php _e( 'Last name seller', FIVESTER_INVITE_SLUG__ );?></th>
                <td><input type="text" name="employeeSurname" id="employeeSurname" value="<?php echo self::getOption( 'employeeSurname' );?>" class="regular-text"></td>
            </tr>
            <tr valign="top">
                <th scope="row"><?php _e( 'E-mail adress seller', FIVESTER_INVITE_SLUG__ );?></th>
                <td><input type="email" name="employeeEmail" id="employeeEmail" value="<?php echo empty( self::getOption( 'employeeEmail' ) ) ? get_option('admin_email') : self::getOption( 'employeeEmail' );?>" class="regular-text"></td>
            </tr>
            <tr valign="top">
                <th scope="row"><?php _e( 'Send after x days', FIVESTER_INVITE_SLUG__ );?></th>
                <td><input type="number" min="0" name="reminderDelayInDays" id="reminderDelayInDays" value="<?php echo self::getOption( 'reminderDelayInDays' );?>" class="regular-text"></td>
            </tr>
            <tr valign="top">
                <th scope="row"><?php _e( 'Debug', FIVESTER_INVITE_SLUG__ );?></th>
                <td><input type="checkbox" value="1" name="debug" id="debug" <?php echo self::getOption( 'debug' ) == 1 ? 'checked' : '' ?>></td>
            </tr>
<?php
    }
?>
        </table>
    
        <input type="hidden" name="tab" value="<?php echo $active_tab;?>">
        <?php wp_nonce_field( $active_tab, 'nonce' );?>
        <?php submit_button( __( 'Save Changes', FIVESTER_INVITE_SLUG__ ), 'primary', '5ster-settings' ); ?>
    </form>
