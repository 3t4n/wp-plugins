<?php


/**
 * Create the admin menu for this plugin
 * @param no-param
 * @return no-return
 */
function APCEmailToPostAdminMenu() {
    add_options_page('Aspose Cloud Email to Post', __('Aspose Cloud Email to Post', 'Aspose-Cloud-Email-To-Post'), 'activate_plugins', 'APCEmailToPostAdminMenu', 'APCEmailToPostAdminContent');
}

add_action('admin_menu', 'APCEmailToPostAdminMenu');


/**
 * Add the javascript for the plugin
 * @param no-param
 * @return string
 */
function APCEmailToPostEnqueueScripts() {

    wp_register_script( 'apc_email_to_post_script', plugins_url( 'js/aspose_email_to_post.js', __FILE__ ), array('jquery') );

    $upload_path = wp_upload_dir();
    $params = array(
        'appSID'            => get_option('aspose_email_to_post_app_sid'),
        'appKey'            => get_option('aspose_email_to_post_app_key'),
        'uploadpath'        => $upload_path['path'],
        'uploadURI'         => $upload_path['url'],
        'insert_email_url'  => plugins_url( 'getAsposeEmailContent.php', __FILE__ ),
        'aspose_files_url'  => plugins_url( 'getAsposeFiles.php', __FILE__ ),


    );

    wp_localize_script( 'apc_email_to_post_script', 'APCEmailParams', $params );

    wp_enqueue_script( 'jquery-ui-dialog' );
    wp_enqueue_script( 'jquery-ui-tabs' );
    wp_enqueue_script( 'apc_email_to_post_script' );

    wp_register_style( 'apc_email_to_post_style', plugins_url( 'css/style.css', __FILE__), array(), '' );

    wp_enqueue_style( 'apc_email_to_post_style');
    wp_enqueue_style( 'jquery-ui-tabs');
    wp_enqueue_style( 'wp-jquery-ui-dialog');



}

add_action('init', 'APCEmailToPostEnqueueScripts');


/**
 * Pluing settings page
 * @param no-param
 * @return no-return
 */
function APCEmailToPostAdminContent() {

    // Creating the admin configuration interface
    ?>
    <div class="wrap">
    <h2><?php echo __('Aspose Cloud Email To Post Options', 'aspose-cloud-email-to-post');?></h2>
    <br class="clear" />

    <div class="metabox-holder has-right-sidebar" id="poststuff">
    <div class="inner-sidebar" id="side-info-column">
        <div class="meta-box-sortables ui-sortable" id="side-sortables">
            <div id="APCEmailToPostOptions" class="postbox">
                <div title="Click to toggle" class="handlediv"><br /></div>
                <h3 class="hndle"><?php echo __('Support / Manual', 'aspose-doc-importer'); ?></h3>
                <div class="inside">
                    <p style="margin:15px 0px;"><?php echo __('For any suggestion / query / issue / requirement, please feel free to drop an email to', 'aspose-doc-importer'); ?> <a href="mailto:fahad.adeel@aspose.com?subject=Aspose Cloud Email To Post Plugin">fahad.adeel@aspose.com</a>.</p>
                    <p style="margin:15px 0px;"><?php echo __('Get the', 'aspose-doc-importer'); ?> <a href="#" target="_blank"><?php echo __('Manual here', 'aspose-cloud-email-to-post'); ?></a>.</p>

                </div>
            </div>

            <div id="APCEmailToPostOptions" class="postbox">
                <div title="Click to toggle" class="handlediv"><br /></div>
                <h3 class="hndle"><?php echo __('Review', 'aspose-doc-importer'); ?></h3>
                <div class="inside">
                    <p style="margin:15px 0px;">
                        <?php echo __('Please feel free to add your reviews on', 'aspose-doc-importer'); ?> <a href="http://wordpress.org/support/view/plugin-reviews/aspose-cloud-email-to-post" target="_blank"><?php echo __('Wordpress', 'aspose-cloud-email-to-post');?></a>.</p>
                    </p>

                </div>
            </div>
        </div>
    </div>

    <div id="post-body">
        <div id="post-body-content">
            <div id="WtiLikePostOptions" class="postbox">
                <h3><?php echo __('Configuration / Settings', 'aspose-cloud-email-to-post'); ?></h3>

                <div class="inside">
                    <form method="post" action="options.php">
                        <?php settings_fields('aspose_cloud_email_to_post_options'); ?>
                        <table class="form-table">



                            <tr valign="top">
                                <td colspan="2">
                                    <p> If you don't have an account with Aspose Cloud, <a target="_blank" href="https://cloud.aspose.com/SignUp?src=total-api"> Click here </a> to Sign Up.</p>
                                </td>

                            </tr>

                            <tr valign="top">
                                <th scope="row"><label><?php _e('App SID', 'aspose-cloud-email-to-post'); ?></label></th>
                                <td>
                                    <input type="text" size="40" name="aspose_email_to_post_app_sid" id="aspose_email_to_post_app_sid" value="<?php echo get_option('aspose_email_to_post_app_sid'); ?>" />
                                    <span class="description"><?php _e('Aspose for Cloud App sID.', 'aspose-cloud-email-to-post');?></span>
                                </td>
                            </tr>

                            <tr valign="top">
                                <th scope="row"><label><?php _e('App key', 'aspose-doc-importer'); ?></label></th>
                                <td>
                                    <input type="text" size="40" name="aspose_email_to_post_app_key" id="aspose_email_to_post_app_key" value="<?php echo get_option('aspose_email_to_post_app_key'); ?>" />
                                    <span class="description"><?php _e('Aspose for Cloud App Key.', 'aspose-cloud-email-to-post');?></span>
                                </td>
                            </tr>


                            <tr valign="top">
                                <th scope="row"></th>
                                <td>
                                    <input class="button-primary" type="submit" name="Save" value="<?php _e('Save Options', 'aspose-cloud-email-to-post'); ?>" />
                                    <input class="button-secondary" type="reset" name="Reset" value="<?php _e('Reset', 'aspose-cloud-email-to-post'); ?>" />
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
}

// For adding button for Aspose Cloud Doc Importer
add_action('media_buttons_context',  'add_apc_email_to_post_button');

function add_apc_email_to_post_button($context){
    //path to my icon

    $context .= '<a id="apc_email_to_post_popup" title = "Aspose Cloud Email to Post" class="button-primary">Aspose Email Importer</a>';

    return $context;
}

add_action( 'admin_footer',  'apc_email_to_post_add_inline_popup_content' );
function apc_email_to_post_add_inline_popup_content() {
    ?>
    <style type="text/css">
        .ui-dialog {
            z-index:9999 !important;
        }
    </style>
    <div id="apc_email_to_post_popup_container" title="Aspose Cloud Email to Post">
        <p>
            <?php
            if( get_option('aspose_email_to_post_app_sid') == '' || get_option('aspose_email_to_post_app_key') == '') { ?>
        <h3 style="color:red"> Please go to settings page and enter valid Aspose Cloud App ID & Key. </h3>
        <?php
        } else { ?>
            <div id="tabs">
                <ul>
                    <li><a href="#tabs-1">From Local</a></li>
                    <li><a href="#tabs-2">From Aspose Cloud Storage</a></li>
                </ul>
                <div id="tabs-1">
                    <table>
                        <tr>
                            <td>
                                <?php
                                $image_library_url = get_upload_iframe_src( );
                                $image_library_url = remove_query_arg( array('TB_iframe'), $image_library_url );
                                $image_library_url = add_query_arg( array( 'context' => 'Aspose-Cloud-Email-To-Post-Select-File', 'TB_iframe' => 1 ), $image_library_url );
                                ?>

                                <p>
                                    <a title="Select Email File" href="<?php echo esc_url( $image_library_url ); ?>" id="select-email-file" class="button thickbox">Select Email File</a>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="text" name="email_file_name" style="width:250px; margin-right:10px;" id="email_file_name" readonly value="" />  </td>
                            <td style="margin-left:10px; vertical-align: top;"> <input type="button" class="button-primary" id="insert_email_content" value="Insert Email to Editor" /> </td>
                        </tr>


                    </table>
                </div>
                <div id="tabs-2">
                    <input type="button" class="button-primary" style="position:fixed; margin-top:5px; margin-left:350px;" id="insert_aspose_email_content" value="Insert Email to Editor" />
                    <table id="aspose_cloud_doc" style="height: 250px; width:500px !important; overflow-y: scroll;">

                    </table>


                </div>
                <div id="target"></div>
            </div>
        <?php
        } ?>
        </p>
    </div>

    <div class="modal"></div>

<?php
}


add_filter('upload_mimes', 'apc_email_to_post_uploader_upload_mimes', 10, 3);
if (check_upload_apc_email_to_post('Aspose-Cloud-Email-To-Post-Select-File')) {

    add_filter('media_upload_tabs', 'apc_email_to_post_uploader_tabs', 10, 1);
    add_filter('attachment_fields_to_edit', 'apc_email_to_post_uploader_action_button', 20, 2);
    add_filter('media_send_to_editor', 'apc_email_to_post_uploader_file_selected', 10, 3);

}

function apc_email_to_post_uploader_upload_mimes ( $mimes ) {

    $email_mimes_array['eml'] = 'Email eml';
    $email_mimes_array['msg'] = 'Email msg';
    $email_mimes_array['mht'] = 'Email mht';
    $new_array =  array_merge($mimes,$email_mimes_array);
    return $new_array;
  //  echo "<pre>"; print_r($new_array); exit;
}

function apc_email_to_post_uploader_tabs($_default_tabs) {

    unset($_default_tabs['type_url']);
    return($_default_tabs);
}

function apc_email_to_post_uploader_action_button($form_fields, $post) {

    $send = "<input type='submit' class='button-primary' name='send[$post->ID]' value='" . esc_attr__( 'Use this Email File For Importing' ) . "' />";

    $form_fields['buttons'] = array('tr' => "\t\t<tr class='submit'><td></td><td class='savesend'>$send</td></tr>\n");
    $form_fields['context'] = array( 'input' => 'hidden', 'value' => 'Aspose-Cloud-Email-To-Post-Select-File' );
    return $form_fields;
}


function apc_email_to_post_uploader_file_selected($html, $send_id) {

    $file_url = wp_get_attachment_url($send_id);
    $file_url = basename($file_url);
    ?>
    <script type="text/javascript">
        /* <![CDATA[ */
        var win = window.dialogArguments || opener || parent || top;

        win.jQuery( '#email_file_name' ).val('<?php echo $file_url;?>');

    </script>
    <?php
    return '';
}

function add_apc_email_to_post_uploader_context_to_url($url, $type) {
    //if ($type != 'image') return $url;
    if (isset($_REQUEST['context'])) {
        $url = add_query_arg('context', $_REQUEST['context'], $url);
    }
    return $url;
}


function check_upload_apc_email_to_post($context) {

    if (isset($_REQUEST['context']) && $_REQUEST['context'] == $context) {
        add_filter('media_upload_form_url', 'add_apc_email_to_post_uploader_context_to_url', 10, 2);
        return TRUE;
    }
    return FALSE;
}
