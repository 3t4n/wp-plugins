<div class="wrap"> 
    <h2><?php echo _e("Cyberimpact Subscribe Form Setup", "wp-cyber")?></h2> 
    <form method="post" action="options.php">
        <fieldset>
        <?php @settings_fields('wp_cyber_setup'); ?> 
        <?php @settings_errors('wp_cyber_setup'); ?> 
        <?php @do_settings_fields('wp_cyber_setup'); ?>
        
        <?php $cyber_login =  get_option('cyber_login');?>
        <?php if ( isset($_REQUEST['settings-updated']) && $_REQUEST['settings-updated'] == true && !count(get_settings_errors('wp_cyber_setup'))) : ?>
            <div id='message' class='updated below-h2'><p><?php echo _e( 'Login saved', 'wp-cyber' ); ?></p></div>
        <?php endif; ?> 
        <h3><?php echo _e("Login info", "wp-cyber")?></h3>
        <p><?php echo _e("To start using the plugin we first need to check and store your Cyberimpact username and password", "wp-cyber")?></p> 
        <table class="form-table"> 
            <tr valign="top"> 
                <th scope="row"><label for="cyber_user"><?php echo _e("Cyber User", "wp-cyber")?></label></th> 
                <td><input type="text" name="cyber_login[user]" id="cyber_user" value="<?php echo  $cyber_login['user']?>" /></td> 
            </tr> 
            <tr valign="top"> 
                <th scope="row"><label for="cyber_pass"><?php echo _e("Cyber Password", "wp-cyber")?></label></th> 
                <td><input type="password" name="cyber_login[pass]" id="cyber_pass" value="<?php echo  $cyber_login['pass']?>" /></td> 
            </tr> 
        </table> 
        <?php @submit_button(); ?> 
        </fieldset>
    </form> 
</div> 