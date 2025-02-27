<?php
/*
 * Plugin Name:       Vform
 * Plugin URI:        /
 * Description:       Lifetime free Drag & Drop Contact Form Builder for WordPress VForm.
 * Version:           3.1.7
 * Requires at least: 5.6
 * Author:            Vikas Ratudi
 * Author URI:        https://www.instagram.com/ratudi_vikas/?r=nametag
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       vform
 * Tags:              form, wordpress form, contact form, very simple form, drag drop form, allinone form, secure form, free contact form, contact form plugin, forms, form builder
*/

defined('ABSPATH') || die("You Can't Access this File Directly");

define('VFORM_PLUGIN_PATH',plugin_dir_path(__FILE__));
define('VFORM_PLUGIN_URL',plugin_dir_url(__FILE__));
define('VFORM_PLUGIN_FILE', __FILE__);
define('VFORM_PLUGIN_VERSION','3.1.7');
include VFORM_PLUGIN_PATH."inc/db.php";


add_action('wp_enqueue_scripts','vform_wp_scripts');

function vform_wp_scripts(){
    wp_enqueue_script('jquery');
    wp_enqueue_style( 'vform_dev_style', VFORM_PLUGIN_URL . 'assets/css/style.css', array(), '3.1.7', 'all' );
    wp_enqueue_style('vform_dev_style2', VFORM_PLUGIN_URL."assets/css/fontawesome.css");
    wp_enqueue_script('vform_dev_script', VFORM_PLUGIN_URL."assets/js/custom.js", array(),'3.1.7',true);
    wp_localize_script('vform_dev_script','ajax_object',admin_url("admin-ajax.php"));

    wp_localize_script('vform_dev_script', 'pluginData', array(
        'pluginUrl' => VFORM_PLUGIN_URL
    ));
}



add_action('admin_enqueue_scripts','vform_admin_enqueue_scripts');

function vform_admin_enqueue_scripts(){
    wp_enqueue_script('jquery');
    wp_enqueue_style( 'vform_dev_style', VFORM_PLUGIN_URL . 'assets/css/style.css', array(), '3.1.7', 'all' );
    wp_enqueue_style('vform_dev_style2', VFORM_PLUGIN_URL."assets/css/fontawesome.css");
    wp_enqueue_script('vform_dev_script', VFORM_PLUGIN_URL."assets/js/custom.js", array(),'3.1.7',false);
    // wp_enqueue_script('vform_dev_script2', VFORM_PLUGIN_URL."assets/js/jquery-ui.min.js", array(),'3.1.7',false);
    wp_localize_script('vform_dev_script','ajax_object',admin_url("admin-ajax.php"));

    wp_localize_script('vform_dev_script', 'pluginData', array(
        'pluginUrl' => VFORM_PLUGIN_URL
    ));

    wp_enqueue_style('vform-popup-style', VFORM_PLUGIN_URL.'assets/css/deactivate-popup-style.css');
    wp_enqueue_script('vform-popup-script',VFORM_PLUGIN_URL.'assets/js/deactivate--popup-script.js', ['jquery'], null, true);
}

//ADMIN MENU
add_action('admin_menu','vform_plugin_menu');
function vform_plugin_menu(){

    add_menu_page('Vform','Vform','manage_options','vform','vform_options_func',$icon_url=VFORM_PLUGIN_URL."assets/images/vform-icon1.svg",$position=null);
    add_submenu_page('vform','Entries','Entries','manage_options','vform_entries','entries_options_func');

}

function vform_options_func(){
    // include VFORM_PLUGIN_PATH."inc/vformadmin.php";		
    wp_enqueue_style( 'vform_dev_style1', VFORM_PLUGIN_URL . 'assets/css/admin-dashboard.css', array(), '3.1.7', 'all' );

    include VFORM_PLUGIN_PATH."inc/admin-dashboard.php";		
}

function entries_options_func(){
        include VFORM_PLUGIN_PATH."inc/admin/entries.php";
    wp_enqueue_style( 'vform_dev_style_entries', VFORM_PLUGIN_URL . 'assets/css/admin-entries.css', array(), '3.1.7', 'all' );

}

add_filter('plugin_action_links', 'vform_plugin_action_links', 10, 2); 
function vform_plugin_action_links($links, $file) {
    static $this_plugin;

    if (!$this_plugin) {
        $this_plugin = plugin_basename(__FILE__);
    }

    // check to make sure we are on the correct plugin
    if ($file == $this_plugin) {
        // Change "Settings" to whatever you want
        $settings_text = 'Create VForm';
        // the anchor tag and href to the URL we want. For a "Settings" link, this needs to be the url of your settings page
        $settings_link = '<a href="' . get_admin_url(null, 'admin.php?page=vform') . '">' . $settings_text . '</a>';
        // add the link to the list
        array_unshift($links, $settings_link);
    }

    return $links;
}

add_filter('plugin_row_meta', 'our_plugin_row_meta', 10, 2);
function our_plugin_row_meta($plugin_meta, $plugin_file) {
    // The plugin file of your plugin
    $this_plugin = plugin_basename(__FILE__);

    // Check if the current plugin is your plugin
    if ($plugin_file === $this_plugin) {
        // Add your "Donate" link to the plugin row meta
        $donate_link = '<a href="https://paypal.me/VikasRatudi" target="_blank">Donate</a>';
        // Insert the "Donate" link after the author and before "View Details"
        array_splice($plugin_meta, 1, 0, $donate_link);
    }

    return $plugin_meta;
}


add_action('init', 'vform_init');

function vform_init(){
    add_shortcode('vform','vform_my_shortcode');
    add_shortcode('vform_userdetails','vform_userde');
}

function vform_userde($atts){

    $getid = $_GET['id'];

    if($getid!=''){

        
        global $wpdb;

        $getid = intval($getid); // Assuming id is an integer
        $query = "SELECT * FROM {$wpdb->prefix}vform_userinput WHERE id = %d";
        $fetfrm = $wpdb->get_results($wpdb->prepare($query, $getid), OBJECT);

        // $fetfrm = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}vform_userinput WHERE id='".$getid."'", OBJECT );   


            echo '<style>
            #frm-alt-table {
                width: 100%;
                border-collapse: collapse;
                border: 1px solid #ddd;
                text-align: left;
                max-width: 800px;
                margin: auto;
                margin-top: 20px;
                margin-bottom: 20px;
            }
                #frm-alt-table th{
                text-transform:capitalize;
                }
                #frm-alt-table th, #frm-alt-table td {
                    padding: 8px;
                    border-bottom: 1px solid #ddd;
                }
                #frm-alt-table th {
                    background-color: #f2f2f2;
                }
            </style>
            <div id="vf_postbox"><table cellspacing="0" id="frm-alt-table"><tbody>';

            foreach ($fetfrm as $v => $f) {
                $dataArray = json_decode($f->maindatabody);
                foreach ($dataArray as $key => $value) {
                    if (!empty($value)) {
                        $parts = explode('__', $key);
                        if ($parts[1]) {
                            $subParts = explode('~', $parts[1]);
                        } else {
                            $subParts = $parts;
                        }
                        $header = str_replace('~', ' ', $subParts);
                        $valueString = implode(' ', $value);
                        echo '<tr><th>' . implode(" ", $header) . '</th><td>' . $valueString . '</td></tr>';
                    }
                }
            }

            echo '</tbody></table></div>';


    }
    
}

// userdetails
function vform_my_shortcode($atts){

    $atts = shortcode_atts(array(
        'id' => '',
    ), $atts, 'vform');

    ob_start();
    include VFORM_PLUGIN_PATH."inc/vformstructure.php";
    return ob_get_clean();
}

// form save

function vformchkretundata($vfmvl){
    if($vfmvl=='{admin_email}'){
        return $vfmvl;
    }else if(substr($vfmvl,0, 6)=='{email'){
        return $vfmvl;
    }else{
        return sanitize_email($vfmvl);
    }
}

function vformchkretundata_to($vfmvl){
    if($vfmvl=='{admin_email}'){
        return $vfmvl;
    }else if(substr($vfmvl,0, 6)=='{email'){
        return $vfmvl;
    }else{
        return sanitize_text_field($vfmvl);
    }
}

add_action('wp_ajax_myvformsave','myvformsave');

function myvformsave(){

    if(!isset($_REQUEST['vfm-nonce1']) || !wp_verify_nonce($_REQUEST['vfm-nonce1'],'myvformdata1') ){
        wp_send_json_error([
            'status'=>'0'
        ]);
    }

    if($_REQUEST['param']=='save_vform'){

        global $wpdb;
        $prefix = $wpdb->prefix;
        $table = $prefix.'vform';
        $data = array(
        "formname"=>sanitize_text_field($_REQUEST['formname']),
            "formdescription"=>sanitize_text_field($_REQUEST['formdescription']),
            "formbody"=>sanitize_text_field( htmlentities($_REQUEST['formbody'])),
            "confirmation"=>sanitize_text_field($_REQUEST['selectedinfo']),
            "confirmation_value"=>sanitize_text_field( htmlentities($_REQUEST['wherego'])),
            "status"=>sanitize_text_field($_REQUEST['formstatus']),
            "notification_mode"=>sanitize_text_field($_REQUEST['notification_mode']),
            "no_duplicate"=>sanitize_text_field($_REQUEST['mknoduplicate']),
        );

        $edtid = sanitize_text_field($_REQUEST['editid']);
        $where = array( 'id' => $edtid);
        $wpdb->update($table, $data,$where);
        echo json_encode(array("status"=>1,"message"=>"Data update successful","id"=>esc_html($edtid)));

    }
    wp_die();

}

// form save

// create form

add_action('wp_ajax_myvformcreate','myvformcreate');

function myvformcreate(){

    if(!isset($_REQUEST['vfm-nonce2']) || !wp_verify_nonce($_REQUEST['vfm-nonce2'],'myvformdata2') ){
        wp_send_json_error([
            'status'=>0
        ]);
    }

    if($_REQUEST['param']=='create_vform'){


        $title = sanitize_text_field($_REQUEST['title']);

        global $wpdb;
        $prefix = $wpdb->prefix;
        $table = $prefix.'vform';
        $data = array(
            "formname"=>$title,
            "formdescription"=>"",
            "formbody"=> "&lt;div class=\&quot;form-all vform-mainfields-inside\&quot;&gt; &lt;/div&gt;",
            "confirmation"=> "message",
            "confirmation_value"=> "Thanks for contacting us! We will be in touch with you shortly.",
            "status"=> "true",
            "notification_mode"=> "1",
            "send_to"=> "",
            "email_subject"=> "New Entry",
            "from_name"=> "Admin",
            "from_email"=> "{admin_email}",
            "reply_to"=> "",
            "message"=> "{all_fields}"

        );
        $wpdb->insert($table, $data);

        $getid = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}vform ORDER BY id DESC LIMIT 1", OBJECT );

        foreach ( $getid as $keyid=>$valueid ) {
            $idget = $getid[$keyid]->id;
        }
        echo json_encode(array("status"=>1,"message"=>"create successful","id"=>esc_html($idget)));
    }
    wp_die();

}

// create form

//for delete

add_action('wp_ajax_myvformdelete','myvformdelete');

function myvformdelete(){
    if(!isset($_REQUEST['vfm-nonce3']) || !wp_verify_nonce($_REQUEST['vfm-nonce3'],'myvformdata3') ){
        wp_send_json_error([
            'status'=>'0'
        ]);
    }

    if($_REQUEST['param']=='save_vform'){

        global $wpdb;
        $prefix = $wpdb->prefix;
        $table = $prefix.'vform';
        $where = array( 'id' => sanitize_text_field($_REQUEST['id']) );
        $wpdb->delete($table, $where);
        echo json_encode(array("status"=>1,"message"=>"Data Delete successful"));
    }
    wp_die();

}

//for delete

//clone form

add_action('wp_ajax_myvformclone','myvformclone');

function myvformclone(){

    if(!isset($_REQUEST['vfm-nonce4']) || !wp_verify_nonce($_REQUEST['vfm-nonce4'],'myvformdata4') ){
        wp_send_json_error([
            'status'=>'0'
        ]);
    }

    if($_REQUEST['param']=='clone_vform'){

        global $wpdb;
        $prefix = $wpdb->prefix;
        $table = $prefix.'vform';
        
        $id = intval($_REQUEST['id']); // Assuming id is an integer
        $query = "SELECT * FROM {$wpdb->prefix}vform WHERE id = %d";
        $getid = $wpdb->get_results($wpdb->prepare($query, $id), OBJECT);


        // $getid = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}vform where id='".$_REQUEST['id']."'", OBJECT );

        foreach ( $getid as $keyid=>$valueid ) {
            $data = array(
                "formname"=> $getid[$keyid]->formname.' copy',
                "formdescription"=>$getid[$keyid]->formdescription,
                "formbody"=> $getid[$keyid]->formbody,
                "confirmation"=> $getid[$keyid]->confirmation,
                "confirmation_value"=> $getid[$keyid]->confirmation_value,
                "status"=> $getid[$keyid]->status,
                "notification_mode"=> $getid[$keyid]->notification_mode,
                "send_to"=> $getid[$keyid]->send_to,
                "email_subject"=> $getid[$keyid]->email_subject,
                "from_name"=> $getid[$keyid]->from_name,
                "from_email"=> $getid[$keyid]->from_email,
                "reply_to"=> $getid[$keyid]->reply_to,
                "message"=> $getid[$keyid]->message

            );
        }

        $wpdb->insert($table, $data);

        echo json_encode(array("status"=>1,"message"=>"clone successful"));

    }
    wp_die();

}

//clone form


// fontend save

add_action('wp_ajax_myvformfrontsave','myvformfrontsave');
add_action('wp_ajax_nopriv_myvformfrontsave','myvformfrontsave');

function vformgeneratearrformat($tags){
    if (is_array($tags)) {
        $tag = implode("~",$tags);
    }
    return sanitize_text_field($tag);
}

function vformgeneratearrformatemail($tags){
    // if (is_array($tags)) {
    // 			$tag = implode("~",$tags);
    // }
    return sanitize_email($tags);
}

function vformhtml_entity_decode($v1){
    foreach ($v1 as $key => $value) {
            $v1 .= $value[$key].",";
    }
    $v1 = rtrim($v1,",");
    return $v1;
}

function verify_recaptcha($recaptcha_response, $id) {
    
    global $wpdb;
    $id = intval($id); // Assuming id is an integer
    $query = "SELECT * FROM {$wpdb->prefix}vform WHERE id = %d";
    $vfsec = $wpdb->get_results($wpdb->prepare($query, $id), OBJECT);


    // $vfsec = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}vform WHERE id = '{$id}'", OBJECT );
    foreach ( $vfsec as $key1=>$val1 ) {
        $secret_key = $val1->rec_secret_key==null ? '': $val1->rec_secret_key;
    }
    $response = wp_remote_get("https://www.google.com/recaptcha/api/siteverify?secret={$secret_key}&response={$recaptcha_response}");
    $response_body = wp_remote_retrieve_body($response);
    $result = json_decode($response_body);

    return $result->success;
}

function getValueByKeyword($array, $keyword) {
    foreach ($array as $key => $value) {
        $parts = explode('__', $key);
        if (count($parts) > 1 && $parts[0] === $keyword) {
            return $value;
        }
    }
    return null;
}

function convertSizeToBytes($size) {
    $units = ['B' => 0, 'KB' => 1, 'MB' => 2, 'GB' => 3, 'TB' => 4];
    $unit = strtoupper(trim(preg_replace('/[^BKMGT]/i', '', $size)));
    $size_value = (float) preg_replace('/[^\d.]/', '', $size);
    return isset($units[$unit]) ? $size_value * pow(1024, $units[$unit]) : $size_value;
}



function myvformfrontsave(){

    $is_filesready = false;
    $readyfileurls = '';

    
    $mainformdata = $_POST['mainformdata'];
    $FDA = [];
    parse_str($mainformdata, $FDA);

    if (!empty($_FILES)) {
        $uploaded_files = [];
        $errors = [];
        
        foreach ($_FILES as $file_key => $file_array) {

            $allowed_file_types = explode(',', $FDA['custom_file_constraints'][$file_key]['allowed_file_types']);
            $max_file_size = convertSizeToBytes($FDA['custom_file_constraints'][$file_key]['max_file_size']);
            
            if (is_array($file_array['name'])) {
                foreach ($file_array['name'] as $index => $file_name) {
                    if (empty($file_name)) continue;
    
                    $file = [
                        'name' => $file_array['name'][$index],
                        'type' => $file_array['type'][$index],
                        'tmp_name' => $file_array['tmp_name'][$index],
                        'error' => $file_array['error'][$index],
                        'size' => $file_array['size'][$index]
                    ];
    
                    // Skip file if there's an upload error
                    if ($file['error'] !== UPLOAD_ERR_OK) {
                        $errors[] = "Error uploading file: " . $file['name'];
                        continue;
                    }
    
                    // Validate file extension
                    $file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                    if (!in_array($file_extension, $allowed_file_types)) {
                        $errors[] = "Invalid file type for: " . $file['name'] . '. Allowed types: ' . implode(", ", $allowed_file_types);
                        continue;
                    }
                    
                    // Validate file type
                    $file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                    if (!in_array($file_extension, $allowed_file_types)) {
                        $errors[] = "Invalid file type for: " . $file['name'].' types: '.implode(" ",$allowed_file_types);
                        continue;
                    }
                    
                      // Security check: disallow dangerous file types explicitly
                    $disallowed_file_types = ['html', 'htm', 'js', 'css', 'php', 'exe', 'sh', 'bat', 'py', 'rb', 'pl'];
                    if (in_array($file_extension, $disallowed_file_types)) {
                        $errors[] = "Disallowed file type: " . $file['name'];
                        continue;
                    }
                    
                    // Validate file size
                    if ($file['size'] > $max_file_size) {
                        $errors[] = "File size exceeds 1MB for: " . $file['name'];
                        continue;
                    }
    
                    // Upload file using WordPress function
                    $upload_overrides = ['test_form' => false];
                    $movefile = wp_handle_upload($file, $upload_overrides);
    
                    if ($movefile && !isset($movefile['error'])) {
                        $uploaded_files[] = $movefile['url'];
    
                        // Insert the attachment into the Media Library
                        $attachment = [
                            'guid'           => $movefile['url'],
                            'post_mime_type' => $movefile['type'],
                            'post_title'     => sanitize_file_name($file['name']),
                            'post_content'   => '',
                            'post_status'    => 'inherit'
                        ];
    
                        $attach_id = wp_insert_attachment($attachment, $movefile['file']);
                        require_once(ABSPATH . 'wp-admin/includes/image.php');
                        $attach_data = wp_generate_attachment_metadata($attach_id, $movefile['file']);
                        wp_update_attachment_metadata($attach_id, $attach_data);
                    } else {
                        $errors[] = "Upload error: " . $movefile['error'];
                    }
                }
            }
        }
    
        if (!empty($errors)) {
            // wp_send_json_error(['message' => $errors,'fda'=>$FDA,'allow'=>$allowed_file_types,]);
        } else {
            $is_filesready = true;
            $readyfileurls = $uploaded_files;
            // wp_send_json_success(['files' => $uploaded_files, 'allow'=>$allowed_file_types,'size'=>$max_file_size]);
        }
    } else {
        // wp_send_json_error(['message' => 'No files uploaded.']);
    }
    

 
    

    if(!isset($FDA['vfm-nonce']) || !wp_verify_nonce($FDA['vfm-nonce'],'myvformfrontsave') ){
        wp_send_json_error([
            'status'=>'0'
        ]);
    }

    $valid = true;
    if($FDA['recapthca']=='1'){
        $recaptcha_response = $FDA['g-recaptcha-response'];
        $is_valid = verify_recaptcha($recaptcha_response, $FDA['formid']);

        if (!$is_valid) {
            $valid = false;
            wp_send_json_error([
                'status'=>'0'
            ]);
        }
    }

    if($FDA['param']=='save_vform' && $valid){

        $idd = 'multiplechoice'.sanitize_text_field($FDA['formid']);
        $multiplechce = sanitize_text_field($FDA[$idd]);

        global $wpdb;
        $prefix = $wpdb->prefix;
        $table = $prefix.'vform_userinput';

        $formData = [];
        foreach ($FDA as $key => $value) {
            if (!in_array($key, ['action', 'param', 'vfid', 'usertimetakes','browser','currentdate','currentdate_part2','timezone','vfm-nonce','_wp_http_referer','ip','formid','g-recaptcha-response','recapthca','ct_bot_detector_event_token','custom_file_constraints','apbct_visible_fields_1','ct_no_cookie_hidden_field','ct_bot_detector_event_token'])) {
                $formData[$key] = $value;
            }
        }

        if($is_filesready){
            if($readyfileurls!=''){
                $formData['custom_file'] = $readyfileurls;
            }
        }

        $mainbodycnt = json_encode($formData);

        

        $ffmid = sanitize_text_field($FDA['formid']);

        $ffmid = intval($ffmid); // Assuming id is an integer
        $query = "SELECT * FROM {$wpdb->prefix}vform WHERE id = %d";
        $getdata = $wpdb->get_results($wpdb->prepare($query, $ffmid), OBJECT);


        // $getdata = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}vform WHERE id='".$ffmid."'", OBJECT );

        foreach ( $getdata as $keydata=>$valuedata ) {

            $vformid =  $valuedata->id;
            $data_conf1 = $valuedata->confirmation;
            $data_conf2 = $valuedata->confirmation_value;

            $mlsendinp1 = $valuedata->notification_mode;
            $no_duplicate = $valuedata->no_duplicate;
            $google_sheet = $valuedata->google_sheet;

            // $mlsendinp2 = $valuedata->send_to;
            // $mlsendinp3 = $valuedata->email_subject;
            // $mlsendinp4 = $valuedata->from_name;
            // $mlsendinp5 = $valuedata->from_email;
            // $mlsendinp6 = $valuedata->reply_to;
            // $mlsendinp7 = $valuedata->message;
        }

        $checkvalidemail = true;

        if($no_duplicate=='true'){

            $dataObject = json_decode($mainbodycnt);
            $getemail = getValueByKeyword($dataObject, 'email');
            $noemail = $getemail[0];

            if($noemail!=''){
                // $queryno = "SELECT * FROM {$wpdb->prefix}vform_userinput WHERE formid = ".$ffmid." AND maindatabody LIKE %s";
                
                // $getdatano = $wpdb->get_results($wpdb->prepare($queryno, '%' . $noemail . '%'), OBJECT);

                

                // if($getdatano){
                // 	$checkvalidemail = false;
                // }

                $queryCheckEmail = "
                    SELECT * 
                    FROM {$wpdb->prefix}vform_userinput 
                    WHERE formid = %d AND maindatabody LIKE %s
                ";

                // Execute the query with sanitized inputs
                $resultCheckEmail = $wpdb->get_results(
                    $wpdb->prepare($queryCheckEmail, $ffmid, '%' . $wpdb->esc_like($noemail) . '%'), 
                    OBJECT
                );

                // Set the email validity flag
                $checkvalidemail = empty($resultCheckEmail);


            }
        }


        if($checkvalidemail){

            $data = array(
            "formid"=>sanitize_text_field($FDA['formid']),
                "maindatabody"=>sanitize_text_field($mainbodycnt),
                "ip"=>sanitize_text_field($FDA['ip']),
                "browser"=>sanitize_text_field($FDA['browser']),
                "currentdate"=>sanitize_text_field($FDA['currentdate']),
                "timezone"=>sanitize_text_field($FDA['timezone']),
                "currentdate_part2"=>sanitize_text_field($FDA['currentdate_part2']),
                "usertimetakes"=>sanitize_text_field($FDA['usertimetakes']),
            );
            $wpdb->insert($table, $data);
            $inserted_id = $wpdb->insert_id;


           
            

            if($mlsendinp1=='1'){

                function vform_set_content_type() {
                    return "text/html";
                }
                add_filter( 'wp_mail_content_type','vform_set_content_type' );

                $formid = intval($vformid); // Assuming formid is an integer
                $query = "SELECT * FROM {$wpdb->prefix}vform_notifications WHERE formid = %d ORDER BY id ASC";
                $getdatanotifi = $wpdb->get_results($wpdb->prepare($query, $formid), OBJECT);


                // $getdatanotifi = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}vform_notifications WHERE formid='".$vformid."' ORDER BY id ASC", OBJECT );
                $tst2 = array(); 
                foreach ( $getdatanotifi as $keydatanotifi=>$valuedatanotifi ) {

                        $chkmode = $valuedatanotifi->mode;

                        if($chkmode=='1'){


                        $mlsendinp2 = $valuedatanotifi->send_to_email;
                        $mlsendinp3 = $valuedatanotifi->subject;
                        $mlsendinp4 = $valuedatanotifi->from_name;
                        $mlsendinp5 = $valuedatanotifi->from_email;
                        $mlsendinp6 = $valuedatanotifi->reply_to;

                        $mlsendinp7 = $valuedatanotifi->message;
                        $email_content = decode_html_base64($mlsendinp7);


                        $admin_email = get_option( 'admin_email' );
                        if($mlsendinp2==''){
                            $mlsendinp2='{admin_email}';
                        }

                        if($mlsendinp2=='{admin_email}'){
                            $to = $admin_email;
                        }else if(substr($mlsendinp2,0, 6)=='{email'){

                            foreach ($formData as $key => $value) {
                                // Handle array values by converting them to a comma-separated string
                                $formattedValue = is_array($value) ? implode(', ', $value) : htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
                                // Define the placeholder format
                                $placeholder = '{' . $key . '[]' . '}';
                                // Replace the placeholder with the actual value
                                if($placeholder == $mlsendinp2){
                                    $to = str_replace($placeholder, $formattedValue, $mlsendinp2);
                                }
                            }

                            $to = vformgeneratearrformatemail($to);


                        }else{
                            $to = $mlsendinp2;
                        }

                        $emailArray = explode(',', $to);

                        if(count($emailArray)>0){

                            foreach ($emailArray as $eml) {
                                $to = $eml;

                                if($to!=''){


                                    $subject = $mlsendinp3;
                                    $message ="";
                                    if(substr($mlsendinp5,0, 6)=='{email'){


                                        // foreach ($formData as $key => $value) {
                                        // 	if($key==$mlsendinp5){
                                        // 		$to2 = vformgeneratearrformatemail($value);
                                        // 	}
                                        // }

                                        foreach ($formData as $key => $value) {
                                            // Handle array values by converting them to a comma-separated string
                                            $formattedValue = is_array($value) ? implode(', ', $value) : htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
                                            // Define the placeholder format
                                            $placeholder = '{' . $key . '[]' . '}';
                                            // Replace the placeholder with the actual value
                                            if($placeholder == $mlsendinp5){
                                                $to2 = str_replace($placeholder, $formattedValue, $mlsendinp5);
                                            }
                                        }

                                        $to2 = vformgeneratearrformatemail($to2);
                                        // $a2 = str_replace(array('{', '}'), '', $mlsendinp5);
                                        // $to2 = vformgeneratearrformatemail($FDA[$a2]);


                                    }else{
                                        $to2 = "info@".substr(get_site_url(),8);
                                    }

                                    if($mlsendinp6=='{admin_email}'){
                                        $mlsendinp6 = $admin_email;
                                    }else if(substr($mlsendinp6,0, 6)=='{email'){

                                        foreach ($formData as $key => $value) {
                                            // Handle array values by converting them to a comma-separated string
                                            $formattedValue = is_array($value) ? implode(', ', $value) : htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
                                            // Define the placeholder format
                                            $placeholder = '{' . $key . '[]' . '}';
                                            // Replace the placeholder with the actual value
                                            if($placeholder == $mlsendinp2){
                                                $mlsendinp6 = str_replace($placeholder, $formattedValue, $mlsendinp2);
                                            }
                                        }

                                        $mlsendinp6 = vformgeneratearrformatemail($mlsendinp6);


                                    }else{
                                        $mlsendinp6 = $mlsendinp6;
                                    }

                                    $headers = array('Content-Type: text/html; charset=UTF-8');
                                    $headers[] = 'From: '.$mlsendinp4.' <'.$to2.'>';
                                    if($mlsendinp6!=''){
                                        $headers[] = 'Reply-To: '.$mlsendinp6;
                                    }

                                    if($email_content=='{all_fields}'){


                                        foreach ($formData as $key => $value) {
                                            $formattedValue = is_array($value) ? implode(', ', $value) : htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
                                            $key_main = explode('__',$key);
                                            if(count($key_main)!=1){
                                                $key = $key_main[1];
                                            }
                                            $key = str_replace('~', ' ', $key);
                                            $message .= "$key: $formattedValue<br>";
                                        }

                                        

                                    }else if(strpos($email_content, '{') !== false){


                                        foreach ($formData as $key => $value) {
                                            // Handle array values by converting them to a comma-separated string
                                            $formattedValue = is_array($value) ? implode(', ', $value) : htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
                                            // Define the placeholder format
                                            $placeholder = '{' . $key . '[]' . '}';
                                            // Replace the placeholder with the actual value
                                            $email_content = str_replace($placeholder, $formattedValue, $email_content);
                                        }


                                            // Handle {all_fields} placeholder
                                            if (strpos($email_content, '{all_fields}') !== false) {
                                                $allFields = '';

                                                foreach ($formData as $key => $value) {
                                                    $formattedValue = is_array($value) ? implode(', ', $value) : htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
                                                    $key_main = explode('__',$key);
                                                    if(count($key_main)!=1){
                                                        $key = $key_main[1];
                                                    }
                                                    $key = str_replace('~', ' ', $key);
                                                    $allFields .= "$key: $formattedValue<br>";
                                                }

                                                $message = str_replace('{all_fields}', nl2br($allFields), $email_content);


                                            }else{
                                                
                                                foreach ($formData as $key => $value) {
                                                    // Handle array values by converting them to a comma-separated string
                                                    $formattedValue = is_array($value) ? implode(', ', $value) : htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
                                                    // Define the placeholder format
                                                    $placeholder = '{' . $key . '[]' . '}';
                                                    // Replace the placeholder with the actual value
                                                    $email_content = str_replace($placeholder, $formattedValue, $email_content);
                                                }

                                                $message = $email_content;

                                            }
                                        
                                        
                                        

                                    }else{

                                        // foreach ($formData as $key => $value) {
                                        // 	$formattedValue = is_array($value) ? implode(', ', $value) : htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
                                        // 	$key_main = explode('__',$key);
                                        // 	if(count($key_main)!=1){
                                        // 		$key = $key_main[1];
                                        // 	}
                                        // 	$key = str_replace('~', ' ', $key);
                                        // 	$message .= "$key: $formattedValue<br>";
                                        // }

                                        $message = $email_content;
                                        
                                    }

                                    $tst = wp_mail( $to, $subject, $message, $headers, array() );
                                    $tst2[] = array($to,$subject,$message,$headers);

                                }
                                //if to


                                }
                                //foreach                                
                            }
                            //ifcount


                        }
                        // chkmode

                    }


            }


            if($google_sheet!=''){

                // Send Data to Google Sheets
                $google_script_url = $google_sheet;
                $sheet_data = array(
                    "formid" => $data['formid'],
                    "maindatabody" => $data['maindatabody'],
                    "ip" => $data['ip'],
                    "browser" => $data['browser'],
                    "currentdate" => $data['currentdate']
                );

                $response = wp_remote_post($google_script_url, array(
                    'body'    => json_encode($sheet_data),
                    'headers' => array('Content-Type' => 'application/json'),
                ));

                if (is_wp_error($response)) {
                    // $error_logsheet = 'Google Sheets API Error: ' . $response->get_error_message();
                } else {
                    // $error_logsheet ='Google Sheets API Success: ' . wp_remote_retrieve_body($response);
                }
            }


        }

        // echo json_encode(array("status"=>1,"message"=>"Data inserted successful","confirmation"=>esc_html($data_conf1),"confirmation_value"=>esc_html($data_conf2),"mailsent"=>esc_html($tst),"mailgo"=>esc_html($tst2),'checkvalidemail'=>$checkvalidemail,'mlsendinp1'=>$mlsendinp1,'chkmode'=>$chkmode,'mlsendinp2'=>$mlsendinp2 ,'mlsendinp3'=>$mlsendinp3,'mlsendinp4'=>$mlsendinp4,'mlsendinp5'=>$mlsendinp5,'mlsendinp6'=>$mlsendinp6,'email_content'=>$email_content));
        echo json_encode(array("status"=>1,"message"=>"Data inserted successful","confirmation"=>esc_html($data_conf1),"confirmation_value"=>esc_html($data_conf2),"inserted_id"=>$inserted_id,"bl"=>$formData,'d'=>$readyfileurls));
    }

    wp_die();

}

// formfront save



add_action('wp_ajax_myvformsend','myvformsend');

function myvformsend(){

    if(!isset($_REQUEST['vfm-nonce5']) || !wp_verify_nonce($_REQUEST['vfm-nonce5'],'myvformdata5') ){
        wp_send_json_error([
            'status'=>'0'
        ]);
    }

    if($_REQUEST['param']=='save_vform'){

        $to = 'vforminfo@gmail.com';
        $admin_email = get_option( 'admin_email' );
        $where = substr(get_site_url(),8);
        $headers[] = 'From: Wordpress <info@'.$where.'>';
        $subject  = 'Subscription For VFORM';
        $message .= 'Email: '.$admin_email.' | Email2: '.get_bloginfo( 'admin_email' ).' | Name: '.get_bloginfo( 'name' ).' | Description: '.get_bloginfo( 'description' ).' | Wpurl: '.get_bloginfo( 'wpurl' ).' | Url: '.get_bloginfo( 'url' ).' | version: '.get_bloginfo( 'version' );

        function vform_set_content_type(){
            return "text/html";
        }
        add_filter( 'wp_mail_content_type','vform_set_content_type' );

        $tst = wp_mail( $to, $subject, $message, $headers, array() );

        global $wpdb;
        $prefix = $wpdb->prefix;
        $table = $prefix.'vfsubscr';
        $data = array(
        "subscription"=>1
        );
        $wpdb->insert($table, $data);

        echo json_encode(array("status"=>1,"message"=>"Data inserted successful"));
    }
    wp_die();

}


// send test email

// add_action('wp_ajax_myvformsendtestemail','myvformsendtestemail');

// function myvformsendtestemail(){
// 	if($_REQUEST['param']=='save_vform'){

// 		$to = $_REQUEST['email'];
// 		$admin_email = get_option( 'admin_email' );
// 		$where = substr(get_site_url(),8);
// 		$headers[] = 'From: Wordpress <info@'.$where.'>';
// 		$subject  = 'Test email from VFORM';
// 		$message .= 'Hey Admin<br>
// 		You have receive email successfully.
// 		Enjoy VFORM';

// 		function vform_set_content_type(){
// 			return "text/html";
// 		}
// 		add_filter( 'wp_mail_content_type','vform_set_content_type' );

// 		$tst = wp_mail( $to, $subject, $message, $headers, array() );

// 		echo json_encode(array("status"=>1,"message"=>"Data inserted successful"));
// 	}
// 	wp_die();

// }



// donate
add_action('wp_ajax_myvformdonate','myvformdonate');

function myvformdonate(){

    if(!isset($_REQUEST['vfm-nonce6']) || !wp_verify_nonce($_REQUEST['vfm-nonce6'],'myvformdata6') ){
        wp_send_json_error([
            'status'=>'0'
        ]);
    }

    if($_REQUEST['param']=='save_vform'){

        $to = 'vforminfo@gmail.com';
        $admin_email = get_option( 'admin_email' );
        $where = substr(get_site_url(),8);
        $headers[] = 'From: Wordpress <info@'.$where.'>';

        if($_REQUEST['type']=='donate'){
            $subject  = 'Donate click';
        }else if($_REQUEST['type']=='freegift'){
            $subject  = 'Email Subscribe';
        }

        if($_REQUEST['email']!=''){
            $message .= 'Email Main: '.$_REQUEST['email'].'  Other Inputs: ';
        }

        $message .= 'Email: '.$admin_email.' | Email2: '.get_bloginfo( 'admin_email' ).' | Name: '.get_bloginfo( 'name' ).' | Description: '.get_bloginfo( 'description' ).' | Wpurl: '.get_bloginfo( 'wpurl' ).' | Url: '.get_bloginfo( 'url' ).' | version: '.get_bloginfo( 'version' );

        function vform_set_content_type(){
            return "text/html";
        }
        add_filter( 'wp_mail_content_type','vform_set_content_type' );

        $tst = wp_mail( $to, $subject, $message, $headers, array() );

        echo json_encode(array("status"=>1,"message"=>"Data inserted successful",'type'=>$subject,'msg'=>$message));
    }
    wp_die();

}


add_action('wp_ajax_myvformconversion','myvformconversion');
add_action('wp_ajax_nopriv_myvformconversion','myvformconversion');

function myvformconversion(){

    if(!isset($_REQUEST['vfm-nonce7']) || !wp_verify_nonce($_REQUEST['vfm-nonce7'],'myvformdata7') ){
        wp_send_json_error([
            'status'=>'0'
        ]);
    }

    if($_REQUEST['param']=='save_vform'){

        global $wpdb;
        $prefix = $wpdb->prefix;
        $table = $prefix.'vform_fields';
        $ip = sanitize_text_field($_REQUEST['ip']);

        // Check if the IP already exists in the table
        $existing_ip = $wpdb->get_var($wpdb->prepare("SELECT ip FROM $table WHERE ip = %s", $ip));

        if (!$existing_ip) {
            // IP doesn't exist in the table, proceed with insertion
            $data = array(
                "formid" => sanitize_text_field($_REQUEST['vfid']),
                "ip" => $ip
            );
            $wpdb->insert($table, $data);
        }

        echo json_encode(array("status"=>1,"message"=>"Data inserted successful"));
    }
    wp_die();

}


//for delete entries
add_action('wp_ajax_myvformentriedel', 'myvformentriedel');

function myvformentriedel() {
    if (!isset($_REQUEST['vfm-nonce8']) || !wp_verify_nonce($_REQUEST['vfm-nonce8'], 'myvformdata8')) {
        wp_send_json_error([
            'status' => 0,
            'message' => 'Invalid nonce.',
        ]);
    }

    if ($_REQUEST['param'] === 'del_entries') {
        global $wpdb;
        $prefix = $wpdb->prefix;
        $table = $prefix . 'vform_userinput';

        // Decode and sanitize the list of IDs
        $ids = json_decode(stripslashes($_REQUEST['ids']), true);
        if (is_array($ids) && !empty($ids)) {
            $ids = array_map('intval', $ids); // Ensure all IDs are integers
            $placeholders = implode(',', array_fill(0, count($ids), '%d'));

            $query = "DELETE FROM $table WHERE id IN ($placeholders)";
            $result = $wpdb->query($wpdb->prepare($query, $ids));

            if ($result !== false) {
                wp_send_json_success([
                    'status' => 1,
                    'message' => 'Data deletion successful.',
                ]);
            } else {
                wp_send_json_error([
                    'status' => 0,
                    'message' => 'Failed to delete data.',
                ]);
            }
        } else {
            wp_send_json_error([
                'status' => 0,
                'message' => 'No valid IDs provided.',
            ]);
        }
    }

    wp_die();
}


//for delete entries


// donate
add_action('wp_ajax_myvformneedinte','myvformneedinte');

function myvformneedinte(){

    if(!isset($_REQUEST['vfm-nonce9']) || !wp_verify_nonce($_REQUEST['vfm-nonce9'],'myvformdata9') ){
        wp_send_json_error([
            'status'=>'0'
        ]);
    }

    if($_REQUEST['param']=='integrate_vform'){

        $data = sanitize_text_field($_REQUEST['data']);
        $to = 'vforminfo@gmail.com';
        $admin_email = get_option( 'admin_email' );
        $where = substr(get_site_url(),8);
        $headers[] = 'From: Wordpress <info@'.$where.'>';
        $subject  = 'Need integration';
        $message .= 'Data: '.$data.' <br> Email: '.$admin_email.' | Email2: '.get_bloginfo( 'admin_email' ).' | Name: '.get_bloginfo( 'name' ).' | Description: '.get_bloginfo( 'description' ).' | Wpurl: '.get_bloginfo( 'wpurl' ).' | Url: '.get_bloginfo( 'url' ).' | version: '.get_bloginfo( 'version' );

        function vform_set_content_type(){
            return "text/html";
        }
        add_filter( 'wp_mail_content_type','vform_set_content_type' );

        $tst = wp_mail( $to, $subject, $message, $headers, array() );

        echo json_encode(array("status"=>1,"message"=>"Success!"));
    }
    wp_die();

}

// notification create
add_action('wp_ajax_createmynotifi','createmynotifi');

function createmynotifi(){

    if(!isset($_REQUEST['vfm-nonce10']) || !wp_verify_nonce($_REQUEST['vfm-nonce10'],'myvformdata10') ){
        wp_send_json_error([
            'status'=>'0'
        ]);
    }
    if($_REQUEST['param']=='notifi_vform'){


        global $wpdb;
        $prefix = $wpdb->prefix;
        $table = $prefix.'vform_notifications';
        $data = array(
            "formid"=>sanitize_text_field($_REQUEST['formid']),
            "action_name"=>"Send Email",
            "send_to_email"=> "",
            "from_name"=> "Admin",
            "from_email"=> "{admin_email}",
            "reply_to"=> "",
            "subject"=> "New Entry",
            "message"=> "{all_fields}",
            "mode"=> "0",
            "dropdown"=> "1"

        );
        $wpdb->insert($table, $data);

        echo json_encode(array("status"=>1,"message"=>"Success!"));
    }
    wp_die();

}

// notification delete
add_action('wp_ajax_deletemynotifi','deletemynotifi');

function deletemynotifi(){

    if(!isset($_REQUEST['vfm-nonce11']) || !wp_verify_nonce($_REQUEST['vfm-nonce11'],'myvformdata11') ){
        wp_send_json_error([
            'status'=>'0'
        ]);
    }

    if($_REQUEST['param']=='notifi_vform'){
        global $wpdb;
        $prefix = $wpdb->prefix;
        $table = $prefix.'vform_notifications';
        $where = array( 'id' => sanitize_text_field($_REQUEST['id']) );
        $wpdb->delete($table, $where);

        echo json_encode(array("status"=>1,"message"=>"Success!"));
    }
    wp_die();

}


// Function to encode HTML data
function encode_html_base64($data) {
    return json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
}

// Function to decode HTML data from base64
function decode_html_base64($data) {
    $decoded = json_decode($data, true);
    // Ensure the decoded data is stringified correctly without added slashes
    return preg_replace('/\\\\+/', '', $decoded);
}



// notification save
add_action('wp_ajax_savemynotifi','savemynotifi');

function savemynotifi(){

    if(!isset($_REQUEST['vfm-nonce12']) || !wp_verify_nonce($_REQUEST['vfm-nonce12'],'myvformdata12') ){
        wp_send_json_error([
            'status'=>'0'
        ]);
    }

    if($_REQUEST['param']=='notifi_vform'){

        global $wpdb;
        $prefix = $wpdb->prefix;
        $table = $prefix.'vform_notifications';
        $data = array(
            "action_name"=>sanitize_text_field($_REQUEST['action_name']),
            "send_to_email"=>vformchkretundata_to($_REQUEST['email_to']),
            "from_name"=>sanitize_text_field( $_REQUEST['from_name']),
            "from_email"=>vformchkretundata($_REQUEST['from_email']),
            "subject"=>sanitize_text_field( $_REQUEST['email_subject']),
            "message"=>encode_html_base64($_REQUEST['email_message']),
            "reply_to"=>vformchkretundata($_REQUEST['replyto']),
            "mode"=>sanitize_text_field($_REQUEST['vf_mode']),
            "dropdown"=>sanitize_text_field($_REQUEST['vf_dropdown']),
        );

        $edtid = sanitize_text_field($_REQUEST['notifiid']);
        $where = array( 'id' => $edtid);
        $wpdb->update($table, $data,$where);
        

        echo json_encode(array("status"=>1,"message"=>"Success!"));
    }
    wp_die();

}

// security save
add_action('wp_ajax_savesecurity','savesecurity');

function savesecurity(){

    if(!isset($_REQUEST['vfm-nonce13']) || !wp_verify_nonce($_REQUEST['vfm-nonce13'],'myvformdata13') ){
        wp_send_json_error([
            'status'=>'0'
        ]);
    }

    if($_REQUEST['param']=='secure_vform'){

        global $wpdb;
        $prefix = $wpdb->prefix;
        $table = $prefix.'vform';
        $data = array(
            "security_type"=>sanitize_text_field( $_REQUEST['which']),
            "rec_site_key"=>sanitize_text_field( $_REQUEST['key1']),
            "rec_secret_key"=>sanitize_text_field($_REQUEST['key2']),
            "hcap_site_key"=>sanitize_text_field($_REQUEST['key11']),
            "hcap_secret_key"=>sanitize_text_field($_REQUEST['key22']),
        );

        $edtid = sanitize_text_field($_REQUEST['id']);
        $where = array( 'id' => $edtid);
        $wpdb->update($table, $data,$where);
        

        echo json_encode(array("status"=>1,"message"=>"Success!"));
    }
    wp_die();


}

// google sheet save
add_action('wp_ajax_savegooglesheet','savegooglesheet');

function savegooglesheet(){

    if(!isset($_REQUEST['vfm-nonce133']) || !wp_verify_nonce($_REQUEST['vfm-nonce133'],'myvformdata133') ){
        wp_send_json_error([
            'status'=>'0'
        ]);
    }

    if($_REQUEST['param']=='secure_vform'){

        global $wpdb;
        $prefix = $wpdb->prefix;
        $table = $prefix.'vform';
        $data = array(
            "google_sheet"=>sanitize_text_field( $_REQUEST['key'])
        );

        $edtid = sanitize_text_field($_REQUEST['id']);
        $where = array( 'id' => $edtid);
        $wpdb->update($table, $data,$where);
        

        echo json_encode(array("status"=>1,"message"=>"Success!"));
    }
    wp_die();


}


// single export
// Hook for exporting CSV
add_action('admin_post_export_csv', 'handle_export_csv');

function handle_export_csv() {
    // Verify user permissions
    if (!current_user_can('manage_options')) {
        wp_die('Unauthorized user'); // Handle unauthorized access
    }

    // Optional: Verify a nonce if passed
    if (!isset($_GET['_wpnonce']) || !wp_verify_nonce($_GET['_wpnonce'], 'export_csv_nonce')) {
        wp_die('Invalid request');
    }

    // Get the ID parameter
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    
    global $wpdb;
    $query = "SELECT * FROM {$wpdb->prefix}vform_userinput WHERE id = %d";
    $fetfrm = $wpdb->get_results($wpdb->prepare($query, $id), OBJECT);


    // Generate CSV
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="export_data.csv"');

    $output = fopen('php://output', 'w');
    // fputcsv($output, ['Header', 'Value']); // Add headers

    // foreach ($fetfrm as $v => $f) {
    // 	$dataArray = json_decode($f->maindatabody, true); // Use associative array for easier access
    // 	if (isset($dataArray['ct_bot_detector_event_token'])) {
    // 		unset($dataArray['ct_bot_detector_event_token']);
    // 	}
    // 	foreach ($dataArray as $key => $value) {
    // 		if (!empty($value)) {
    // 			$parts = explode('__', $key);
                
    // 			// Check if $parts[1] exists before accessing it
    // 			if (isset($parts[1]) && !empty($parts[1])) {
    // 				$subParts = explode('~', $parts[1]);
    // 			} else {
    // 				$subParts = $parts;
    // 			}
                
    // 			// Convert $subParts to a header string
    // 			$header = implode(' ', str_replace('~', ' ', $subParts));
                
    // 			// Ensure $value is an array before using implode, otherwise use it directly
    // 			$valueString = is_array($value) ? implode(' ', $value) : $value;
    
    // 			fputcsv($output, [$header, $valueString]);
    // 		}
    // 	}
    // }

    $headers = [];
    $values = [];

    // Iterate over the results and group data by headers
    foreach ($fetfrm as $v => $f) {
        $dataArray = json_decode($f->maindatabody, true); // Decode JSON as associative array
        if (json_last_error() !== JSON_ERROR_NONE) {
            continue; // Skip invalid JSON
        }

        if (isset($dataArray['ct_bot_detector_event_token'])) {
            unset($dataArray['ct_bot_detector_event_token']); // Remove unwanted key
        }

        if (isset($dataArray['apbct_visible_fields'])) {
            unset($dataArray['apbct_visible_fields']); // Remove unwanted key
        }

        foreach ($dataArray as $key => $value) {
            if (!empty($value)) {
                $parts = explode('__', $key);

                // Determine header
                $subParts = isset($parts[1]) && !empty($parts[1]) ? explode('~', $parts[1]) : $parts;
                $header = implode(' ', str_replace('~', ' ', $subParts));

                // Normalize value to string
                $valueString = is_array($value) ? implode(' ', $value) : $value;

                // Store the headers and their corresponding values
                if (!in_array($header, $headers)) {
                    $headers[] = $header; // Add new header to the list
                }
                $values[$header][] = $valueString; // Add the value for this header
            }
        }
    }

    // Write headers as the first row in the CSV
    fputcsv($output, $headers);

    // Determine the number of rows to output (the number of values for each header)
    $numRows = max(array_map('count', $values));

    // Write values for each row, horizontally under the corresponding header
    for ($i = 0; $i < $numRows; $i++) {
        $row = [];
        foreach ($headers as $header) {
            // Fill row with values or empty if no value for that header
            $row[] = isset($values[$header][$i]) ? $values[$header][$i] : '';
        }
        fputcsv($output, $row);
    }

    fclose($output);
    exit;
}

// multiple export

// Hook for exporting CSV
add_action('admin_post_export_csv2', 'handle_export_csv2');

function handle_export_csv2() {
    error_log('handle_export_csv2 called'); // Logs to debug.log

    // Verify user permissions
    if (!current_user_can('manage_options')) {
        wp_die('Unauthorized user'); // Handle unauthorized access
    }

    // Optional: Verify a nonce if passed
    if (!isset($_GET['_wpnonce']) || !wp_verify_nonce($_GET['_wpnonce'], 'export_csv2_nonce')) {
        wp_die('Invalid request');
    }

    // Get the ID parameter
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    
    global $wpdb;
    $query = "SELECT * FROM {$wpdb->prefix}vform_userinput WHERE formid = %d";
    $fetfrm = $wpdb->get_results($wpdb->prepare($query, $id), OBJECT);

    if (empty($fetfrm)) {
        wp_die('No data found for the given form ID.');
    }
    // Generate CSV
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="export_data.csv"');

    $output = fopen('php://output', 'w');
    
    $headers = [];
    $values = [];
    foreach ($fetfrm as $v => $f) {
        $dataArray = json_decode($f->maindatabody, true); // Decode JSON as associative array
        if (json_last_error() !== JSON_ERROR_NONE) {
            continue; // Skip invalid JSON
        }

        if (isset($dataArray['ct_bot_detector_event_token'])) {
            unset($dataArray['ct_bot_detector_event_token']); // Remove unwanted key
        }

        foreach ($dataArray as $key => $value) {
            if (!empty($value)) {
                $parts = explode('__', $key);

                // Determine header
                $subParts = isset($parts[1]) && !empty($parts[1]) ? explode('~', $parts[1]) : $parts;
                $header = implode(' ', str_replace('~', ' ', $subParts));

                // Normalize value to string
                $valueString = is_array($value) ? implode(' ', $value) : $value;

                // Store the headers and their corresponding values
                if (!in_array($header, $headers)) {
                    $headers[] = $header; // Add new header to the list
                }
                $values[$header][] = $valueString; // Add the value for this header
            }
        }
    }

    // Write headers as the first row in the CSV
    fputcsv($output, $headers);

    // Determine the number of rows to output (the number of values for each header)
    $numRows = max(array_map('count', $values));

    // Write values for each row, across the headers
    for ($i = 0; $i < $numRows; $i++) {
        $row = [];
        foreach ($headers as $header) {
            // Fill row with values or empty if no value for that header
            $row[] = isset($values[$header][$i]) ? $values[$header][$i] : '';
        }
        fputcsv($output, $row);
    }


    fclose($output);
    exit;
}





// Add a custom rewrite rule for the form preview
function add_form_preview_rewrite_rule() {
    add_rewrite_rule(
        '^form-preview/?$', // Custom URL structure
        'index.php?form_preview=1&id=$matches[1]', // Internal query variable
        'top'
    );
}
add_action('init', 'add_form_preview_rewrite_rule');

// Register the query variable for form preview
function add_form_preview_query_vars($query_vars) {
    $query_vars[] = 'form_preview'; // To detect preview requests
    $query_vars[] = 'id'; // To pass form ID
    return $query_vars;
}
add_filter('query_vars', 'add_form_preview_query_vars');

// Flush rewrite rules on activation to register the new route
function flush_rewrite_rules_on_activation() {
    add_form_preview_rewrite_rule();
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'flush_rewrite_rules_on_activation');

// Render the preview page
function render_form_preview_page() {
    if (get_query_var('form_preview') == 1) {
        $form_id = intval(get_query_var('id')); // Get the form ID from the query
        if ($form_id) {
            // Dynamically generate the shortcode preview
           $ajax_url = admin_url("admin-ajax.php");
			$shortcode = '[vform id="' . $form_id . '"]';

            get_header(); // Load the theme header
			echo '<script src="' . includes_url('/js/jquery/jquery.js') . '"></script>';

            echo '<style>#vformpreview{position: absolute;top: 0;background: #fff;width: 100%;z-index: 999999;padding: 50px;margin: auto;}</style><div class="wrap" id="vformpreview">';
            echo '<h1>Form Preview</h1>';
            echo do_shortcode($shortcode); // Render the shortcode
            echo '</div>';
			   echo '<script>';
            echo 'var ajax_object = "' .  $ajax_url. '";';
            echo '</script>';
            get_footer(); // Load the theme footer
            exit;
        } else {
            wp_die('Invalid form ID'); // Handle missing or invalid ID
        }
    }
}
add_action('template_redirect', 'render_form_preview_page');



// update vform name

add_action('wp_ajax_quickeditsave','quickeditsave');

function quickeditsave(){

    if(!isset($_REQUEST['vfm-nonce22']) || !wp_verify_nonce($_REQUEST['vfm-nonce22'],'myvformdata22') ){
        wp_send_json_error([
            'status'=>'0'
        ]);
    }

    if($_REQUEST['param']=='quickedit_vform'){

        global $wpdb;
        $prefix = $wpdb->prefix;
        $table = $prefix.'vform';
        $data = array(
            "formname"=>sanitize_text_field($_REQUEST['title']),
        );

        $edtid = sanitize_text_field($_REQUEST['id']);
        $where = array( 'id' => $edtid);
        $wpdb->update($table, $data,$where);
        

        echo json_encode(array("status"=>1,"message"=>"Success!"));
    }
    wp_die();

}
// update vform name






function add_vform_meta_box() {
    add_meta_box(
        'vform_meta_box', // ID for the meta box
        'VForm', // Title
        'render_vform_meta_box', // Callback function to display the field
        'page', // Screen (page edit)
        'normal', // Context
        'high' // Priority
    );
}
add_action('add_meta_boxes', 'add_vform_meta_box');

function render_vform_meta_box($post) {
    global $wpdb;

    // Retrieve all forms from the vform table
    $vform_table = $wpdb->prefix . 'vform';
    $forms = $wpdb->get_results("SELECT id, formname FROM $vform_table");

    // Get the currently saved selected form ID
    $selected_form_id = get_post_meta($post->ID, '_vform_selected_id', true);

    // Dropdown to select the form
    echo '<label for="vform_selector">Select VForm:</label>';
    echo '<select id="vform_selector" name="vform_selector" class="widefat">';
    echo '<option value="">-- Select a Form --</option>';
    foreach ($forms as $form) {
        $selected = $form->id == $selected_form_id ? 'selected' : '';
        echo '<option value="' . esc_attr($form->id) . '" ' . $selected . '>' . esc_html($form->formname) . '</option>';
    }
    echo '</select>';

    // Display the shortcode dynamically
    echo '<p id="vform_shortcode_display" style="margin-top: 10px;"></p>';

    echo '<button id="vform_preview_button" type="button" style="margin-top: 10px;" class="button button-secondary" disabled>Preview</button>';

    // JavaScript to update the shortcode display dynamically
    ?>
    <script type="text/javascript">
        (function () {
            const selector = document.getElementById('vform_selector');
            const shortcodeDisplay = document.getElementById('vform_shortcode_display');
            const previewButton = document.getElementById('vform_preview_button');

            selector.addEventListener('change', function () {
                const selectedId = this.value;

                if (selectedId) {
                    shortcodeDisplay.innerHTML = 'Shortcode: <code>[vform id="' + selectedId + '"]</code>';
                    previewButton.disabled = false;
                    previewButton.dataset.previewUrl = '<?php echo site_url('/form-preview?id='); ?>' + selectedId;
                } else {
                    shortcodeDisplay.innerHTML = '';
                    previewButton.disabled = true;
                    previewButton.removeAttribute('data-preview-url');
                }
            });

            previewButton.addEventListener('click', function () {
                const previewUrl = this.dataset.previewUrl;
                if (previewUrl) {
                    window.open(previewUrl, '_blank');
                }
            });
        })();
    </script>
    <?php
}



add_action('wp_ajax_filter_table', 'filter_table_rows');
add_action('wp_ajax_nopriv_filter_table', 'filter_table_rows');

function filter_table_rows() {
    global $wpdb;
    
    $search = isset($_POST['search']) ? sanitize_text_field($_POST['search']) : '';
    $like_search = '%' . $wpdb->esc_like($search) . '%';

    // Query filtered results
    $vffrm = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT * FROM {$wpdb->prefix}vform WHERE formname LIKE %s ORDER BY id DESC",
            $like_search
        ),
        OBJECT
    );

    $views = $wpdb->get_results(
        "SELECT formid, COUNT(DISTINCT ip) AS distinct_ip_count FROM {$wpdb->prefix}vform_fields GROUP BY formid",
        OBJECT
    );

    $aab = $wpdb->get_results(
        "SELECT formid, submission_count, distinct_ip_count, 
            (submission_count / distinct_ip_count) * 100 AS conversion_rate
        FROM (
            SELECT
                f.formid,
                (SELECT COUNT(DISTINCT u.ip COLLATE utf8mb4_general_ci)
                FROM `{$wpdb->prefix}vform_userinput` u
                WHERE u.formid = f.formid
                AND u.ip IN (SELECT ip COLLATE utf8mb4_general_ci
                            FROM `{$wpdb->prefix}vform_fields` f2
                            WHERE f2.formid = f.formid)) AS submission_count,
                (SELECT COUNT(DISTINCT f3.ip COLLATE utf8mb4_general_ci)
                FROM `{$wpdb->prefix}vform_fields` f3
                WHERE f3.formid = f.formid) AS distinct_ip_count
            FROM
                {$wpdb->prefix}vform_fields f
            GROUP BY
                f.formid
        ) AS subquery",
        OBJECT
    );

    if (count($vffrm) === 0) {
        echo "<tr><td colspan='7'><center style='padding: 20px;'>No Data Found</center><td></tr>";
        wp_die();
    }

    foreach ($vffrm as $keyfrm => $valuefrm) {
        $date = strtotime($valuefrm->datesubmit);
        $formattedDate = date('F j, Y', $date);
        $mainid = $valuefrm->id;

        $vf_view = 0;
        foreach ($views as $view) {
            if ($view->formid == $mainid) {
                $vf_view = $view->distinct_ip_count;
            }
        }

        $vf_conversion = 0;
        foreach ($aab as $conversion) {
            if ($conversion->formid == $mainid) {
                $vf_conversion = $conversion->conversion_rate;
            }
        }

        $submission_count = $wpdb->get_var(
            $wpdb->prepare(
                "SELECT COUNT(*) FROM {$wpdb->prefix}vform_userinput WHERE formid = %d",
                $mainid
            )
        );

        echo "<tr role='row'  class='Table_tr__N4Hby ' >
                <td tabindex='-1' data-key='react-aria-50' role='rowheader'
                    id='react-aria3819347747-:rf:-react-aria-57-title' class='Table_titleCell__Ap63B'
                    data-rac='' style='padding-left: 0px;'>
                    
                    <span class='TitleCell_root__4mYWh undefined'>
                        <a class='TitleCell_titleLinkDefault__cXKpw TitleCell_titleLink__fiXjI css-0'
                            data-rac='' data-zds='true'
                            id='ZapTitleCell-Fanbasis onetime($1997) payment(6-Figure Fitness) to ghl'
                            href='admin.php?page=vform&id={$mainid}'>
                            
                            <span class='TitleCell_title__t8H6Z'
                                id='ZapTitleCell-span-Fanbasis onetime($1997) payment(6-Figure Fitness) to ghl'
                                data-testid='AssetItem-title'><span aria-hidden='true'
                                    data-testid='iconContainer' data-zds='true'
                                    class='css-37ysfe-Icon--miscBoltAltFill--animate--18x18--BrandOrange'><svg
                                        xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24'
                                        height='18' width='18' size='18' color='BrandOrange'
                                        name='miscBoltAltFill'>
                                        <path fill='#2D2E2E' d='M9 23.66 20.54 9.91H15V.16L3.46 13.91H9v9.75Z'>
                                        </path>
                                    </svg></span><span class='TitleCell_subtitleWrapper__PGyf_'>
                                    <div class='TooltipText_ellipsisText__apizD'>
                                        <div tabindex='0' data-zds='true'>
                                            <span class='css-fyw5iz-Text'
                                                data-zds='true'>{$valuefrm->formname}</span>
                                            </div>
                                            <small>{$valuefrm->formdescription}</small>
                                    </div>


                                </span></span>

                        </a>
                    </span>
                </td>
                <td tabindex='-1' data-key='react-aria-51' role='gridcell' class='ZapTable_appsColumn__COSLU'
                    data-rac=''>
                    <a
                        href='admin.php?page=vform_entries&select={$mainid}'>                     
                        {$submission_count}</a>
                </td>
                <td tabindex='-1' data-key='react-aria-52' role='gridcell'
                    class='ZapTable_locationColumn__JDABs' data-rac=''>{$vf_view}</td>
                <td tabindex='-1' data-key='react-aria-53' role='gridcell' class='react-aria-Cell' data-rac=''>
                " . round($vf_conversion, 2) . "%
                </td>
                <td tabindex='-1' data-key='react-aria-54' role='gridcell' class='ZapTable_statusColumn__AXVKM'
                    data-rac=''>
                    [vform id='{$mainid}']
                </td>
                <td tabindex='-1' data-key='react-aria-55' role='gridcell' class='OwnerCell_ownerCell__IjoNZ'
                    data-rac=''>
                    <abbr>{$formattedDate}</abbr>
                </td>
                <td tabindex='0' data-key='react-aria-56' role='gridcell' class='Table_iconButtonCell__HDRCh'
                    data-rac=''>
                    <div>
                        <div class='KebabMenu_wrapperCss___aWWS KebabMenu_hideButtonBorder__fXVCf'>
                            
                            <button type='button' data-testid='{$mainid}' class='_iconButton_10t6e_1 dropbtnbox' data-rac=''
                                    id='react-aria3819347747-:r14:' fdprocessedid='wx4w2o'><span aria-hidden='true'
                                        data-testid='iconContainer' data-zds='true'
                                        class='css-w6m7j2-Icon--navMoreVert--animate--24x24'><svg
                                            xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24'
                                            height='24' width='24' size='24' name='navMoreVert'>
                                            <path fill='#2D2E2E'
                                                d='M12 14.25a2.25 2.25 0 1 0 0-4.5 2.25 2.25 0 0 0 0 4.5ZM12 21.25a2.25 2.25 0 1 0 0-4.5 2.25 2.25 0 0 0 0 4.5ZM12 7.25a2.25 2.25 0 1 0 0-4.5 2.25 2.25 0 0 0 0 4.5Z'>
                                            </path>
                                        </svg></span>
                            </button>


                            <div data-testid='{$mainid}' class='css-1n9aljd-FloatingBox--right--south floating-box'>
                                <div class='css-1x5aju-FloatingBox__box'>
                                    <div class='KebabMenu_menu__XXoOI'>
                                        <ul role='menu' data-zds='true'>
                                            <div class='KebabMenu_menuItem__S7_XR undefined'>
                                                <li role='none' data-zds='true'><button type='button'
                                                        data-zds='true' role='menuitem'
                                                        class='css-ivw7cv-MenuItem__content makevformedit'  data-id='{$mainid}'><span
                                                            data-zds='true'
                                                            class='css-zpr5ft-MenuItem__text'><span
                                                                class='KebabMenu_menuItemContent__WU94G'><span
                                                                    aria-hidden='true'
                                                                    data-testid='iconContainer' data-zds='true'
                                                                    class='css-19pylnz-Icon--actionEdit--animate--20x20--GrayWarm6'><svg
                                                                        xmlns='http://www.w3.org/2000/svg'
                                                                        fill='none' viewBox='0 0 24 24'
                                                                        height='20' width='20' size='20'
                                                                        color='GrayWarm6' name='actionEdit'>
                                                                        <path fill='#2D2E2E'
                                                                            d='m16.92 5 3.51 3.52 1.42-1.42-4.93-4.93L3 16.09V21h4.91L19.02 9.9 17.6 8.48 7.09 19H5v-2.09L16.92 5Z'>
                                                                        </path>
                                                                    </svg></span>Edit</span></span></button>
                                                </li>
                                            </div>
                                            <div class='KebabMenu_menuItem__S7_XR undefined'>
                                                <li role='none' data-zds='true'><button type='button'
                                                        data-zds='true' role='menuitem'
                                                        class='css-ivw7cv-MenuItem__content quick_edit' data-id='{$mainid}' data-name='{$valuefrm->formname}'><span
                                                            data-zds='true'
                                                            class='css-zpr5ft-MenuItem__text'><span
                                                                class='KebabMenu_menuItemContent__WU94G'><span
                                                                    aria-hidden='true'
                                                                    data-testid='iconContainer' data-zds='true'
                                                                    class='css-19pylnz-Icon--actionEdit--animate--20x20--GrayWarm6'><svg width='18px' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg' version='1.1'><path style='fill:#111111;stroke:#555555;' d='m 34,48 c -12,0 -19,1 -21,2 -4.9,2 -5,12 -1,14 6,5 13,3 18,-2 4,-5 4,-9 4,-14 m 8,-3 0,27 -8,0 0,-7 C 27,73 13,76 5.6,69 0,63 1,50 6.7,46 14,40 24,42 34,42 33,24 15,29 4.8,33 l 0,-7 C 17,22 27,20 37,28 c 4,4 5,9 5,17'/><path style='fill:#1E9022;stroke:#555555' d='m 63,50 c 1,18 21,20 35,12 l 0,8 C 78,77 55,73 55,48 55,32 63,23 78,23 95,23 99,34 99,50 L 63,50 M 92,44 C 91,37 88,29 79,29 69,29 64,37 63,44 l 29,0'/><path style='fill:#111111;stroke:#555555' d='m 46,2 -1,96 7,0 0,-96 z'/></svg></span>Rename</span></span></button>
                                                </li>
                                            </div>
                                            <div class='KebabMenu_menuItem__S7_XR undefined'>
                                                <li role='none' data-zds='true'><button type='button'
                                                        data-zds='true' role='menuitem'
                                                        class='css-ivw7cv-MenuItem__content makevformentries' data-id='{$mainid}'><span
                                                            data-zds='true'
                                                            class='css-zpr5ft-MenuItem__text'><span
                                                                class='KebabMenu_menuItemContent__WU94G'><span
                                                                    aria-hidden='true'
                                                                    data-testid='iconContainer' data-zds='true'
                                                                    class='css-19pylnz-Icon--actionEdit--animate--20x20--GrayWarm6'><svg width='20px' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                                                        <path d='M8 8H20M11 12H20M14 16H20M4 8H4.01M7 12H7.01M10 16H10.01' stroke='#000000' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/>
                                                                        </svg></span>Entries</span></span></button>
                                                </li>
                                            </div>
                                            <div class='KebabMenu_menuItem__S7_XR undefined'>
                                                <li role='none' data-zds='true'><button type='button'
                                                        data-zds='true' role='menuitem'
                                                        class='css-ivw7cv-MenuItem__content clonevform' data-id='{$mainid}'><span
                                                            data-zds='true'
                                                            class='css-zpr5ft-MenuItem__text'><span
                                                                class='KebabMenu_menuItemContent__WU94G'><span
                                                                    aria-hidden='true'
                                                                    data-testid='iconContainer' data-zds='true'
                                                                    class='css-vmpazn-Icon--actionCopy--animate--20x20--GrayWarm6'><svg
                                                                        xmlns='http://www.w3.org/2000/svg'
                                                                        fill='none' viewBox='0 0 24 24'
                                                                        height='20' width='20' size='20'
                                                                        color='GrayWarm6' name='actionCopy'>
                                                                        <path fill='#2D2E2E'
                                                                            d='M2 22h16V6H2v16ZM4 8h12v12H4V8Z'>
                                                                        </path>
                                                                        <path fill='#2D2E2E'
                                                                            d='M6 2v2h14v14h2V2H6Z'></path>
                                                                    </svg></span>Duplicate</span></span></button>
                                                </li>
                                            </div>
                                            <div class='KebabMenu_menuItem__S7_XR undefined'>
                                                <li role='none' data-zds='true'><button type='button'
                                                        data-zds='true' role='menuitem'
                                                        class='css-ivw7cv-MenuItem__content makevformpreview' data-id='".site_url('/form-preview/?id=' . $mainid)."'><span
                                                            data-zds='true'
                                                            class='css-zpr5ft-MenuItem__text'><span
                                                                class='KebabMenu_menuItemContent__WU94G'><span
                                                                    aria-hidden='true'
                                                                    data-testid='iconContainer' data-zds='true'
                                                                    class='css-19pylnz-Icon--actionEdit--animate--20x20--GrayWarm6'><svg width='20px' viewBox='0 0 32 32' enable-background='new 0 0 32 32' id='Stock_cut' version='1.1' xml:space='preserve' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><desc/><g><path d='M21,21L21,21   c1.105-1.105,2.895-1.105,4,0l5.172,5.172c0.53,0.53,0.828,1.25,0.828,2v0C31,29.734,29.734,31,28.172,31h0   c-0.75,0-1.47-0.298-2-0.828L21,25C19.895,23.895,19.895,22.105,21,21z' fill='none' stroke='#000000' stroke-linejoin='round' stroke-miterlimit='10' stroke-width='2'/><circle cx='11' cy='11' fill='none' r='10' stroke='#000000' stroke-linejoin='round' stroke-miterlimit='10' stroke-width='2'/><path d='M11,5   c-3.314,0-6,2.686-6,6' fill='none' stroke='#000000' stroke-linejoin='round' stroke-miterlimit='10' stroke-width='2'/><line fill='none' stroke='#000000' stroke-linejoin='round' stroke-miterlimit='10' stroke-width='2' x1='18' x2='21' y1='18' y2='21'/></g></svg></span>Preview</span></span></button>
                                                </li>
                                            </div>
                                            <div class='KebabMenu_menuItem__S7_XR KebabMenu_warningItem__QAXHd'>
                                                <li role='none' data-zds='true'><button type='button'
                                                        data-zds='true' role='menuitem'
                                                        class='css-ivw7cv-MenuItem__content delvform' data-id='{$mainid}'><span
                                                            data-zds='true'
                                                            class='css-zpr5ft-MenuItem__text'><span
                                                                class='KebabMenu_menuItemContent__WU94G'><span
                                                                    aria-hidden='true'
                                                                    data-testid='iconContainer' data-zds='true'
                                                                    class='css-37uiql-Icon--actionTrash--animate--20x20--GrayWarm6'><svg
                                                                        xmlns='http://www.w3.org/2000/svg'
                                                                        fill='none' viewBox='0 0 24 24'
                                                                        height='20' width='20' size='20'
                                                                        color='GrayWarm6' name='actionTrash'>
                                                                        <path fill='#2D2E2E'
                                                                            d='M15.98 20H8.02L7.19 9h-2l.97 13h11.68l.97-13h-2l-.83 11ZM20.41 4.55l-.34-1.97-5.12.89-1-.84-4.86.86-.65 1.13-5.12.89.35 1.98 16.74-2.94Z'>
                                                                        </path>
                                                                    </svg></span>Delete</span></span></button>
                                                </li>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                                
                                
                        </div>
                    </div>
                </td>
            </tr>";
    }

    wp_die();
}






// form logic
// function create_conditional_logic_table() {
//     global $wpdb;

//     $table_name = $wpdb->prefix . 'vform_conditional_logic';
//     $charset_collate = $wpdb->get_charset_collate();

//     $sql = "CREATE TABLE $table_name (
//         id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
//         logic_name VARCHAR(255) NOT NULL,
//         conditions TEXT NOT NULL,
//         hidden_fields TEXT NOT NULL,
// 		form_id VARCHAR(100) NOT NULL,
//         PRIMARY KEY (id)
//     ) $charset_collate;";

//     require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
//     dbDelta($sql);
// }
// register_activation_hook(__FILE__, 'create_conditional_logic_table');

// function save_field_logic_groups() {
//     global $wpdb;

//     // Check if the request is valid
//     // check_ajax_referer('save_logic_nonce', 'nonce');

//     $table_name = $wpdb->prefix . 'vform_conditional_logic';

//     // Retrieve the data from the AJAX request
// 	$form_id = isset($_POST['form_id']) ? sanitize_text_field($_POST['form_id']) : '';
//     $logic_groups = isset($_POST['logic_groups']) ? json_decode(stripslashes($_POST['logic_groups']), true) : [];

//     foreach ($logic_groups as $logic_group) {
//         $logic_name = sanitize_text_field($logic_group['logicName']);
//         $conditions = maybe_serialize($logic_group['conditions']);
//         $hidden_fields = maybe_serialize($logic_group['hiddenFields']);

//         // Insert or update logic group
//         $wpdb->insert(
//             $table_name,
//             [
// 				'form_id' => $form_id,
//                 'logic_name' => $logic_name,
//                 'conditions' => $conditions,
//                 'hidden_fields' => $hidden_fields,
//             ],
//             ['%s', '%s', '%s', '%s']
//         );
//     }

//     wp_send_json_success(['message' => 'Logic saved successfully!']);
// }
// add_action('wp_ajax_save_field_logic_groups', 'save_field_logic_groups');


// function enqueue_conditional_logic_scripts() {
//     wp_enqueue_script('conditional-logic-script', plugin_dir_url(__FILE__) . 'assets/js/conditional-logic.js', ['jquery'], null, true);

//     global $wpdb;
//     $table_name = $wpdb->prefix . 'vform_conditional_logic';

//     // Fetch all logic groups
//     $logic_groups = $wpdb->get_results(
//         $wpdb->prepare("SELECT * FROM $table_name"),
//         ARRAY_A
//     );

//     foreach ($logic_groups as &$logic_group) {
// 		$logic_group['conditions'] = maybe_unserialize($logic_group['conditions']);
// 		if (!is_array($logic_group['conditions'])) {
// 			$logic_group['conditions'] = []; // Ensure it defaults to an array
// 		}
    
// 		$logic_group['hidden_fields'] = maybe_unserialize($logic_group['hidden_fields']);
// 		if (!is_array($logic_group['hidden_fields'])) {
// 			$logic_group['hidden_fields'] = []; // Ensure it defaults to an array
// 		}
// 	}
    

//     // Pass logic groups to JavaScript
//     wp_localize_script('conditional-logic-script', 'logicData', [
//       'logicGroups' => $logic_groups,
//     ]);
// }
// add_action('wp_enqueue_scripts', 'enqueue_conditional_logic_scripts');
// form logic



// deactivate popup

add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'vform_action_links', 10, 2);
function vform_action_links($actions, $plugin_file) {
    if (isset($actions['deactivate'])) {
        $actions['deactivate'] = '<a href="javascript:void(0)" class="vform_deactivate-link" data-plugin="' . esc_attr($plugin_file) . '">Deactivate</a>';
    }
    return $actions;
}


add_action('admin_footer', 'vform_popup_markup');
function vform_popup_markup() {
    ?>
    <form id="myvformdata66form">
            <?php wp_nonce_field('myvformdata66','vfm-nonce66'); ?>
    </form>
    <div id="vform_frm-deactivation-modal" style="display: none;">
        <div class="vform_metabox-holder">
            <div class="vform_postbox">
                <a class="vform_frm-modal-close dismiss" title="Close"><svg class="frmsvg" id="frm_close_icon" viewBox="0 0 20 20" width="18px" height="18px" aria-label="Close">
                            <path d="M16.8 4.5l-1.3-1.3L10 8.6 4.5 3.2 3.2 4.5 8.6 10l-5.4 5.5 1.3 1.3 5.5-5.4 5.5 5.4 1.3-1.3-5.4-5.5 5.4-5.5z"></path>
                        </svg></a>
                <div class="vform_inside">
                    <h3>Deactivation Feedback</h3>
                    <p>We'd love to learn more about your decision. Could you take a moment to share your reason with us?</p>
                    <form id="vform_deactivation-feedback-form">
                        <label><input type="radio" name="reason" value="found_better_plugin" class="vform_checkreason"> Found a better plugin</label><br>
                        <textarea name="haveyoufound" placeholder="Which plugin have you found?" style="width: 100%; display:none;"></textarea>
                        
                        <label><input type="radio" name="reason" value="no_needed_feature" class="vform_checkreason"> Missing feature</label><br>
                        <textarea name="featuremissing" placeholder="Which feature is missing?" style="width: 100%; display:none;"></textarea>

                        <label><input type="radio" name="reason" value="plugin_not_work" class="vform_checkreason"> Plugin not working</label><br>
                        <label><input type="radio" name="reason" value="temporary_deactivation" class="vform_checkreason"> Temporary deactivation</label><br>
                        <label><input type="radio" name="reason" value="other" class="vform_checkreason"> Other</label><br>
                        <textarea name="describereason" placeholder="Describe your reason..." style="width: 100%; display:none;"></textarea>
                        <br>
                        <br>
                        <button type="button" id="vform_submit-feedback">Submit & Deactivate</button>
                        <a href="javascript:void(0)" id="vform_skip-deactivate">Skip & Deactivate</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
}

// Deactivation Feedback
add_action('wp_ajax_vformfeedback','vformfeedback');

function vformfeedback(){

    if(!isset($_REQUEST['vfm-nonce66']) || !wp_verify_nonce($_REQUEST['vfm-nonce66'],'myvformdata66') ){
        wp_send_json_error([
            'status'=>'0'
        ]);
    }

    if($_REQUEST['param']=='save_vform'){

        $to = 'vforminfo@gmail.com';
        $admin_email = get_option( 'admin_email' );
        $where = substr(get_site_url(),8);
        $headers[] = 'From: Wordpress <info@'.$where.'>';

        $subject  = 'Deactivation Feedback';

        $reason = $_REQUEST['reason'];
        $details1 = $_REQUEST['details1'];
        $details2 = $_REQUEST['details2'];
        $details3 = $_REQUEST['details3'];

        $message .= 'Email: '.$admin_email.' | Email2: '.get_bloginfo( 'admin_email' ).' | Name: '.get_bloginfo( 'name' ).' | Description: '.get_bloginfo( 'description' ).' | Wpurl: '.get_bloginfo( 'wpurl' ).' | Url: '.get_bloginfo( 'url' ).' | version: '.get_bloginfo( 'version' ).'<br><br> Reason: '.$reason.' | Details1: '.$details1.' | Details2:'.$details2.' | Details3:'.$details3;

        function vform_set_content_type(){
            return "text/html";
        }
        add_filter( 'wp_mail_content_type','vform_set_content_type' );

        $tst = wp_mail( $to, $subject, $message, $headers, array() );

        deactivate_plugins(plugin_basename(__FILE__));
        echo json_encode(array("status"=>1,"message"=>"Data inserted successful",'message'=>$message));
    }
    wp_die();

}
// Deactivation Feedback

// deactivate popup




function my_plugin_update_check() {
    $saved_version = get_option('vform_plugin_version');

    if (version_compare($saved_version, '3.1.3', '<=')) {
        my_plugin_upgrade_tasks();
        update_option('vform_plugin_version', VFORM_PLUGIN_VERSION);
    }
}

function my_plugin_upgrade_tasks() {

    global $wpdb;
    $table_name = $wpdb->prefix . 'vform';

    $wpdb->query(
        "ALTER TABLE `$table_name` 
            ADD `no_duplicate` VARCHAR(50) NULL AFTER `hcap_secret_key`"
    );

    
    $wpdb->query(
        "ALTER TABLE `$table_name` 
            ADD `google_sheet` mediumtext NULL AFTER `no_duplicate`"
    );



}

add_action('plugins_loaded', 'my_plugin_update_check');



// elementor

function get_vform_list() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'vform';
    $results = $wpdb->get_results("SELECT id, formname FROM `$table_name`", ARRAY_A);
    return $results;
}
add_action('elementor/widgets/widgets_registered', function () {
    if (class_exists('\Elementor\Widget_Base')) {
        class VForm_Elementor_Widget extends \Elementor\Widget_Base {
            public function get_name() {
                return 'vform';
            }

            public function get_title() {
                return 'VForm';
            }

            public function get_icon() {
                return 'eicon-form-horizontal';
            }

            public function get_categories() {
                return ['general'];
            }

            protected function register_controls() {
                $this->start_controls_section(
                    'content_section',
                    [
                        'label' => __('Form Settings', 'vform'),
                        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    ]
                );

                // Fetch forms dynamically
                $forms = get_vform_list();
                $options = [];
                foreach ($forms as $form) {
                    $options[$form['id']] = $form['formname'];
                }

                $this->add_control(
                    'form_id',
                    [
                        'label' => __('Select Form', 'vform'),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'options' => $options,
                    ]
                );

                $this->end_controls_section();
            }

            protected function render() {
                $settings = $this->get_settings_for_display();
                $form_id = esc_attr($settings['form_id']);
                echo do_shortcode("[vform id='{$form_id}']");
            }
        }

        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new VForm_Elementor_Widget());
    }
});
// elementor






	