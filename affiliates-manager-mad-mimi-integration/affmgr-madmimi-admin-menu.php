<?php

add_action('wpam_after_main_admin_menu', 'wpam_madmimi_do_admin_menu');

function wpam_madmimi_do_admin_menu($menu_parent_slug) {
    add_submenu_page($menu_parent_slug, __("Mad Mimi", 'wpam'), __("Mad Mimi", 'wpam'), 'manage_options', 'wpam-madmimi', 'wpam_admin_madmimi_interface');
}

function wpam_admin_madmimi_interface() {
    echo '<div class="wrap">';
    echo '<div id="poststuff"><div id="post-body">';

    echo '<h2>Affiliates Manager and Mad Mimi Integration</h2>';

    if(isset($_REQUEST['wpam_madmimi_save_settings']))
    {
        $options = array(
            'madmimi_username' => $_POST['madmimi_username'],
            'madmimi_api_key' => $_POST['madmimi_api_key'],
            'madmimi_listname' => $_POST['madmimi_listname'],
        );
        update_option('wpam_madmimi_integration_settings', $options); //store the results in WP options table
        
        echo '<div id="message" class="updated fade">';
        echo '<p>Mad Mimi Integration Settings Saved!</p>';
        echo '</div>';
    }
    
    $madmimi_options = get_option('wpam_madmimi_integration_settings');
    $madmimi_username = $madmimi_options['madmimi_username'];
    $madmimi_api_key = $madmimi_options['madmimi_api_key'];
    $madmimi_listname = $madmimi_options['madmimi_listname'];

    ?>
    <form method="post" action="">	
    <div class="postbox">
    <h3><label for="title">Mad Mimi API Details</label></h3>
    <div class="inside">
    <table class="form-table">

    <tr valign="top"><td width="25%" align="left">
    Mad Mimi Username or Email
    </td><td align="left">
    <input name="madmimi_username" type="text" size="60" value="<?php echo $madmimi_username; ?>"/>
    <p class="description">Enter your Mad Mimi account username or email address.</p>
    </td></tr>
    
    <tr valign="top"><td width="25%" align="left">
    Mad Mimi API Key
    </td><td align="left">
    <input name="madmimi_api_key" type="text" size="60" value="<?php echo $madmimi_api_key; ?>"/>
    <p class="description">Enter your Mad Mimi API key.</p>
    </td></tr>
     
    <tr valign="top"><td width="25%" align="left">
    Mad Mimi List Name
    </td><td align="left">
    <input name="madmimi_listname" type="text" size="60" value="<?php echo $madmimi_listname; ?>"/>
    <p class="description">Enter your Mad Mimi list name.</p>
    </td></tr>
    
    </table>
        
    <div class="submit">
        <input type="submit" name="wpam_madmimi_save_settings" class="button-primary" value="Save Settings" />
    </div>
        
    </form>
    </div></div>

    <?php
    echo '</div></div>'; //end of poststuff and post-body
    echo '</div>'; //end of wrap    
}