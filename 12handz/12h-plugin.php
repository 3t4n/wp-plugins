<?php
/**
 * Plugin Name: 12handz
 * Description: Plugin for 12handz.
 * Version:           1.1.0
 */
// Create the wordPress plugin configuration page for the dashboard

add_action( 'admin_menu', 'add_twelveHandz_menu' );  


function twelveHandz_dashboard_page(){ ?>
<style type="text/css">
    .twelveHandz-submit-button {
        height: 50px;
        width: 155px;
        font-weight: 700;
        font-family: Arial;
        font-size: 16px !important;
        padding: 0;
        }
    #twelveHandz-plugin-title {
        font-size: 18px;
        line-height: 21px;
        font-family: Arial;
        margin: 24px 0;
        }
    #twelveHandz-idInput {
        background: #F6F7F7;
        border: 1px solid #DCDCDE;
        width: 60%;
    }
    #twelveHandz-input-container {
        background: white;
        height: 150px;
        width: 528px;
        border-radius: 4px;
        padding: 24px;
        border: 1px solid #DCDCDE
    }
    #twelveHandz-input-info {
        margin: 0;
        padding-bottom: 24px;
    }
    #twelveHandz-inputTitle {
        width: 70px;
    }
</style>
<h1 id="twelveHandz-plugin-title">12handz</h1>
    <form method="post" action="options.php">
    <?php settings_fields( 'twelveHandz-settings' ); ?>
    <?php do_settings_sections( 'twelveHandz-settings' ); ?>
    <div id="twelveHandz-input-container">
        <table class="form-table"><tr valign="top">
        <th id="twelveHandz-inputTitle" scope="row">ID Input:</th>
        <td style="padding: 0;"> 
         <input id="twelveHandz-idInput" type="text" name="twelveHandz_site_info" value="<?php echo esc_attr(get_option( 'twelveHandz_site_info' )); ?>"/>
    </td></tr></table>
    <?php submit_button("Save changes","twelveHandz-submit-button primary"); ?>
    </div>
    </form>
    <?php }

function add_twelveHandz_menu(){
    $page_title = '12handz'; 
    $menu_title = '12handz';   
    $capability = 'manage_options';   
    $menu_slug  = '12handz-info';   
    $function   = 'twelveHandz_dashboard_page';   
    $icon_url   = 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHZpZXdCb3g9IjAgMCAyMCAyMCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPGcgY2xpcC1wYXRoPSJ1cmwoI2NsaXAwKSI+CjxwYXRoIGQ9Ik0wIDYuMTk4NDlIMi4zNTA2M1YxNy4zNjU3SDYuOTcwMjZWMi4zODA5NEgwVjYuMTk4NDlaIiBmaWxsPSIjQTBBNUFBIi8+CjxwYXRoIGQ9Ik0xNi45NDQyIDExLjgzNTZDMTcuODc0NyAxMC45MjU4IDE4LjQ5NSAxMC4xMDUyIDE4LjgyMTQgOS4zOTE2NkMxOS4xNDc5IDguNjc4MSAxOS4yOTQ4IDcuODkzMTggMTkuMjk0OCA3LjA3MjU5QzE5LjI5NDggNi4xNDQ5NSAxOS4wNjYzIDUuMzI0MzYgMTguNTkyOSA0LjYxMDhDMTguMTE5NSAzLjg5NzIzIDE3LjQ2NjYgMy4zNDQyMiAxNi42MzQxIDIuOTY5NkMxNS44MDE1IDIuNTc3MTQgMTQuODM4NCAyLjM4MDkxIDEzLjc0NDcgMi4zODA5MUw5LjUyMzg3IDIuMzgwOVY2LjE5ODQ2TDEyLjg2MzMgNi4xOTg0N0MxMy43Mjg0IDYuMTk4NDcgMTQuMDg3NSA2LjQ2NjA2IDE0LjMxNjEgNi42ODAxM0MxNC41NDQ2IDYuODk0MTkgMTQuNjU4OSA3LjE3OTYyIDE0LjY1ODkgNy41NTQyNEMxNC42NTg5IDcuODU3NSAxNC41OTM2IDguMTYwNzcgMTQuNDQ2NyA4LjQ4MTg3QzE0LjI5OTggOC43NjczIDE0LjAwNTkgOS4xNTk3NSAxMy41ODE1IDkuNTg3ODlMOC42MTkwOCAxNC4yNjE3VjE3LjM2NTdIMTkuNjA1VjEzLjQ0MTFIMTQuOTg1NEwxNi45NDQyIDExLjgzNTZaIiBmaWxsPSIjQTBBNUFBIi8+CjwvZz4KPGRlZnM+CjxjbGlwUGF0aCBpZD0iY2xpcDAiPgo8cmVjdCB3aWR0aD0iMjAiIGhlaWdodD0iMTUuMjM4MSIgZmlsbD0id2hpdGUiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDAgMi4zODA5NCkiLz4KPC9jbGlwUGF0aD4KPC9kZWZzPgo8L3N2Zz4K';   
    $position   = 4;    

    add_menu_page( $page_title,
                   $menu_title, 
                   $capability, 
                   $menu_slug, 
                   $function, 
                   $icon_url,
                   $position );

    // Call update_twelveHandz_script function to update database
    add_action( 'admin_init', 'update_twelveHandz_script' ); } 

    // Create function to register plugin settings in the database

    function update_twelveHandz_script() {   register_setting( 'twelveHandz-settings', 'twelveHandz_site_info' ); }

    //Logic to add extra information to post    
    function twelveHandz_site_info($content)   {    
    $twelveHandz_info = get_option( 'twelveHandz_site_info' ); 
    if (!empty($twelveHandz_info)) {
        ?>
<!-- Start of 12Handz Embed Code --> <script> window.addEventListener('load', function(){ window.camTagsConfig = window.camTagsConfig || {env: 'TWELVEHANDZ', fid: 'pd12', sGuid: '<?php echo esc_js($twelveHandz_info)  ?>'}; var j=document.createElement('script'); j.id='external-script-loader'; j.async=true; j.src= 'https://externalsitescripts.camilyo.software/tags-initializer/tags-initializer.js'; document.body.appendChild(j); } ); </script> <!-- End of 12Handz Embed Code -->
        <?php
        }
    }

        //Apply the twelveHandz_site_info dn to our content
        /* Add the saved information to the body */
  
        add_action('wp_body_open', 'twelveHandz_site_info');
        wp_cache_flush();
        
    
