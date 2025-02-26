<?php
// Handle the AJAX request
function freightpop_user_logged_in_data() {
    // Sanitize and verify nonce
    $security_nonce = isset($_POST['security']) ? sanitize_text_field(wp_unslash($_POST['security'])) : '';

    if (!wp_verify_nonce($security_nonce, 'freightpop_loggedin_nonce')) {
        wp_send_json_error(['error' => 'Nonce verification failed']);
        return;
    }
    global $wpdb;
    // Sanitize input data
    $username = isset($_POST['username']) ? sanitize_text_field(wp_unslash($_POST['username'])) : '';
    $password = isset($_POST['password']) ? sanitize_text_field(wp_unslash($_POST['password'])) : '';
    $appurl = isset($_POST['appurl']) ? sanitize_text_field(wp_unslash($_POST['appurl'])) : '';
    $source = isset($_POST['source']) ? sanitize_text_field(wp_unslash($_POST['source'])) : '';

    // Prepare request body
    $body = wp_json_encode(array(
        "Username" => $username,
        "Password" => $password
    ));

    // Prepare request headers
    $headers = array(
        "Content-Type" => "application/json; charset=utf-8",
        "Accept" => "application/json"
    );

    // Make the request using wp_remote_post
    $response = wp_remote_post($appurl, array(
        'method'    => 'POST',
        'body'      => $body,
        'headers'   => $headers,
        'timeout'   => 45
    ));

    // Check for errors in the response
    if (is_wp_error($response)) {
        wp_send_json_error(['error' => $response->get_error_message()]);
        return;
    }

    // Decode the response body
    $result = json_decode(wp_remote_retrieve_body($response), true);

    try {
        if ($result['Code'] == 200) {
            $table_name = 'settings';
            $accesstoken = $result['Data']['AccessToken'];
            $storeHash = get_option('unique_store_id');
            $connectionStatus = 1;
            $productSetting = null; // Set it if needed
            $ratesToDisplay = null; // Set it if needed

            // Define the data to be inserted
            $data = array(
                'storeHash' => $storeHash,
                'username' => $username,
                'password' => $password,
                'source' => $source,
                'accessToken' => $accesstoken,
                'connectionStatus' => $connectionStatus,
                'productSetting' => $productSetting,
                'ratesToDisplay' => $ratesToDisplay
            );

            $format = array(
                '%s', // storeHash
                '%s', // username
                '%s', // password
                '%s', // source
                '%s', // accessToken
                '%d', // connectionStatus
                '%s', // productSetting
                '%s'  // ratesToDisplay
            );

            // Insert data into the database
            $insert_status = $wpdb->insert($table_name, $data, $format);

            if ($insert_status === false) {
                $error_message = $wpdb->last_error;
                wp_send_json_error(['error' => $error_message]);
            } else {
                $result['message'] = 'Data inserted successfully';
            }

            wp_send_json($result);
        } else {
            wp_send_json($result);
        }
    } catch (Exception $e) {
        wp_send_json_error(['error' => $e->getMessage()]);
    }
}

add_action('wp_ajax_freightpop_user_logged_in_data', 'freightpop_user_logged_in_data');
add_action('wp_ajax_nopriv_freightpop_user_logged_in_data', 'freightpop_user_logged_in_data');


function freightpop_product_setting() {
    // Sanitize and verify nonce
    $security_nonce = isset($_POST['security']) ? sanitize_text_field(wp_unslash($_POST['security'])) : '';

    if (!wp_verify_nonce($security_nonce, 'freightpop_loggedin_nonce')) {
        wp_send_json_error(['error' => 'Nonce verification failed']);
        return;
    }
    global $wpdb;

    // Sanitize POST inputs
    $productsetting = !empty($_POST['productsetting']) ? sanitize_text_field(wp_unslash($_POST['productsetting'])) : null;
    $rateToDiplay = !empty($_POST['rateToDiplay']) ? sanitize_text_field(wp_unslash($_POST['rateToDiplay'])) : null;
    
    $currentuserid = $wpdb->get_var("SELECT id FROM `settings` LIMIT 1");
    if (!$currentuserid) {
        wp_send_json(['message' => 'User ID not found.', 'status' => 404]);
    }
    // Update record
    $updated = $wpdb->update('settings', ['productSetting' => $productsetting, 'ratesToDisplay' => $rateToDiplay], ['id' => $currentuserid]);
    
    if ($updated === false) {
        wp_send_json(['message' => 'Error updating record.', 'status' => 400, 'error' => $wpdb->last_error]);
    }

    // Retrieve updated record
    $finaldata = $wpdb->get_row($wpdb->prepare("SELECT * FROM `settings` WHERE id = %d", $currentuserid), ARRAY_A);
    if ($finaldata) {
        wp_send_json([
            'message' => 'Record updated successfully.', 
            'status' => 200, 
            'data' => $finaldata
        ]);
    } else {
        wp_send_json(['message' => 'No updated record found.', 'status' => 404]);
    }
}
add_action('wp_ajax_freightpop_product_setting', 'freightpop_product_setting');
add_action('wp_ajax_nopriv_freightpop_product_setting', 'freightpop_product_setting');

function freightpop_logged_out(){
    // Sanitize and verify nonce
    $security_nonce = isset($_POST['security']) ? sanitize_text_field(wp_unslash($_POST['security'])) : '';

    if (!wp_verify_nonce($security_nonce, 'freightpop_loggedin_nonce')) {
        wp_send_json_error(['error' => 'Nonce verification failed']);
        return;
    }
    global $wpdb;
    $delete_status = $wpdb->query("DELETE FROM `settings`");
    if ($delete_status === false) {
        $error_message = $wpdb->last_error;
        wp_send_json_error(['error' => $error_message]);
    } else {
        wp_send_json_success(['message' => 'Data deleted successfully']);
    }
   
}
add_action('wp_ajax_freightpop_logged_out', 'freightpop_logged_out');
add_action('wp_ajax_nopriv_freightpop_logged_out', 'freightpop_logged_out');


function freightpop_add_markups_rules(){
    // Sanitize and verify nonce
    $security_nonce = isset($_POST['security']) ? sanitize_text_field(wp_unslash($_POST['security'])) : '';

    if (!wp_verify_nonce($security_nonce, 'freightpop_loggedin_nonce')) {
        wp_send_json_error(['error' => 'Nonce verification failed']);
        return;
    }
    global $wpdb;
    
    $table_name = 'markups';
    $storeHash = get_option('unique_store_id');
    $type = isset($_POST['markuptype']) ? sanitize_text_field(wp_unslash($_POST['markuptype'])) : '';
    $value = isset($_POST['markupvalue']) ? sanitize_text_field(wp_unslash($_POST['markupvalue'])) : '';
    $applyTo = isset($_POST['applyto']) ? sanitize_text_field(wp_unslash($_POST['applyto'])) : '';
    $status = 1;

    $data = array(
        'storeHash' => $storeHash,
        'type'	=> $type,
        'value' => $value,
        'applyTo' => $applyTo,
        'status' => $status,  		
    );

    $format = array(
        '%s', 
        '%s', 
        '%s', 
        '%s', 
        '%d' 
    );

    $insert_discount = $wpdb->insert($table_name, $data, $format);
    if ($insert_discount === false) {
        $error_message = $wpdb->last_error;
        wp_send_json_error(['error' => $error_message]);
    } else {
        $result = array(
            'message' => 'MarkUps created successfully.',
            'status' => 200
        );
        wp_send_json($result);
    }

    //wp_send_json($data);
}
add_action('wp_ajax_freightpop_add_markups_rules','freightpop_add_markups_rules');
add_action('wp_ajax_nopriv_freightpop_add_markups_rules','freightpop_add_markups_rules');

function freightpop_add_discount_rules(){
    // Sanitize and verify nonce
    $security_nonce = isset($_POST['security']) ? sanitize_text_field(wp_unslash($_POST['security'])) : '';

    if (!wp_verify_nonce($security_nonce, 'freightpop_loggedin_nonce')) {
        wp_send_json_error(['error' => 'Nonce verification failed']);
        return;
    }
    global $wpdb;
    
    $table_name = 'discounts';
    $storeHash = get_option('unique_store_id');
    $type = isset($_POST['discounttype']) ? sanitize_text_field(wp_unslash($_POST['discounttype'])) : '';
    $value = isset($_POST['discountvalue']) ? sanitize_text_field(wp_unslash($_POST['discountvalue'])) : '';
    $applyTo = isset($_POST['discountapplyto']) ? sanitize_text_field(wp_unslash($_POST['discountapplyto'])) : '';
    $ruleset = isset($_POST['ruleset']) ? sanitize_text_field(wp_unslash($_POST['ruleset'])) : '';
    $rulevalue = isset($_POST['rulevalue']) ? sanitize_text_field(wp_unslash($_POST['rulevalue'])) : '';
    $status = 1;

    $data = array(
        'storeHash' => $storeHash,
        'type'	=> $type,
        'value' => $value,
        'condition' => $ruleset,
        'conditionValue' => $rulevalue,
        'applyTo' => $applyTo,
        'status' => $status,  		
    );

    $format = array(
        '%s', 
        '%s', 
        '%s', 
        '%s', 
        '%s', 
        '%s', 
        '%d' 
    );

    $insert_discount = $wpdb->insert($table_name, $data, $format);
    if ($insert_discount === false) {
        $error_message = $wpdb->last_error;
        wp_send_json_error(['error' => $error_message]);
    } else {
        $result = array(
            'message' => 'Discount created successfully.',
            'status' => 200
        );
        wp_send_json($result);
    }

    //wp_send_json($data);
}
add_action('wp_ajax_freightpop_add_discount_rules','freightpop_add_discount_rules');
add_action('wp_ajax_nopriv_freightpop_add_discount_rules','freightpop_add_discount_rules');

function freightpop_delete_discount_or_markups() {
    // Sanitize and verify nonce
    $security_nonce = isset($_POST['security']) ? sanitize_text_field(wp_unslash($_POST['security'])) : '';

    if (!wp_verify_nonce($security_nonce, 'freightpop_loggedin_nonce')) {
        wp_send_json_error(['error' => 'Nonce verification failed']);
        return;
    }
    global $wpdb;

    // Sanitize and retrieve input values safely
    $table_name = isset($_POST['tablename']) ? sanitize_text_field(wp_unslash($_POST['tablename'])) : '';
    $id = isset($_POST['id']) ? intval($_POST['id']) : ''; // Use intval for IDs

    // Check if the table name is valid and prevent SQL injection
    if (empty($table_name) || !in_array($table_name, ['discounts', 'markups'], true)) {
        wp_send_json_error(['error' => 'Invalid table name.']);
        return;
    }

    // Prepare the WHERE clause
    $where = array('id' => $id);

    // Execute the delete using wpdb->delete
    $delete_status = $wpdb->delete($table_name, $where);

    // Check for errors and send a response
    if ($delete_status === false) {
        $error_message = $wpdb->last_error;
        wp_send_json_error(['error' => $error_message]);
    } elseif ($delete_status === 0) {
        // No rows affected
        wp_send_json_error(['error' => 'No records found to delete.']);
    } else {
        wp_send_json_success(['message' => 'Data deleted successfully']);
    }
}


// Hook this function to handle AJAX requests
add_action('wp_ajax_freightpop_delete_discount_or_markups', 'freightpop_delete_discount_or_markups');
add_action('wp_ajax_nopriv_freightpop_delete_discount_or_markups', 'freightpop_delete_discount_or_markups');

// add_action('wp_ajax_freightpop_delete_discount_or_markups','freightpop_delete_discount_or_markups');
// add_action('wp_ajax_nopriv_freightpop_delete_discount_or_markups','freightpop_delete_discount_or_markups');

function freightpop_restore_markup_or_discount_data() {
    // Sanitize and verify nonce
    $security_nonce = isset($_POST['security']) ? sanitize_text_field(wp_unslash($_POST['security'])) : '';

    if (!wp_verify_nonce($security_nonce, 'freightpop_loggedin_nonce')) {
        wp_send_json_error(['error' => 'Nonce verification failed']);
        return;
    }
    global $wpdb;

    // Sanitize and retrieve the table name
    $table_name = isset($_POST['tablename']) ? sanitize_text_field(wp_unslash($_POST['tablename'])) : '';

    // Query the database to get the markup data
    if ($table_name == 'markups') {
        $markups = $wpdb->get_results("SELECT * FROM `markups`", ARRAY_A);
    } elseif ($table_name == 'discounts') {
        $markups = $wpdb->get_results("SELECT * FROM `discounts`", ARRAY_A);
    }
    // Start output buffering
    ob_start();

    // Generate the HTML for each markup row
    foreach ($markups as $row) {
        if($table_name == 'markups'){
        ?>
         <tr>
            <td>
                <?php 
                    if($row['type'] == 'FIXED_AMOUNT'){
                        echo '$';
                    }
                    echo esc_html($row['value']); 
                    if($row['type'] == 'PERCENTAGE'){
                        echo '%';
                    }
                ?>
            </td>
            <td><?php echo esc_attr($row['applyTo']); ?></td>
            <td>
            <div class="d-flex">
                <div class="delete-markup me-2" data-id="<?php echo esc_attr($row['id']); ?>" onclick="deleteMarkUps(<?php echo esc_attr($row['id']); ?>, 'markups')">
                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true"><path d="M11.5 8.25a.75.75 0 0 1 .75.75v4.25a.75.75 0 0 1-1.5 0v-4.25a.75.75 0 0 1 .75-.75Z"></path><path d="M9.25 9a.75.75 0 0 0-1.5 0v4.25a.75.75 0 0 0 1.5 0v-4.25Z"></path><path fill-rule="evenodd" d="M7.25 5.25a2.75 2.75 0 0 1 5.5 0h3a.75.75 0 0 1 0 1.5h-.75v5.45c0 1.68 0 2.52-.327 3.162a3 3 0 0 1-1.311 1.311c-.642.327-1.482.327-3.162.327h-.4c-1.68 0-2.52 0-3.162-.327a3 3 0 0 1-1.311-1.311c-.327-.642-.327-1.482-.327-3.162v-5.45h-.75a.75.75 0 0 1 0-1.5h3Zm1.5 0a1.25 1.25 0 1 1 2.5 0h-2.5Zm-2.25 1.5h7v5.45c0 .865-.001 1.423-.036 1.848-.033.408-.09.559-.128.633a1.5 1.5 0 0 1-.655.655c-.074.038-.225.095-.633.128-.425.035-.983.036-1.848.036h-.4c-.865 0-1.423-.001-1.848-.036-.408-.033-.559-.09-.633-.128a1.5 1.5 0 0 1-.656-.655c-.037-.074-.094-.225-.127-.633-.035-.425-.036-.983-.036-1.848v-5.45Z"></path></svg>
                </div>
                <div class="delete-markup" data-id="<?php echo esc_attr($row['id']); ?>" onclick="get_markup_data(<?php echo esc_attr($row['id']); ?>, 'markups')" data-bs-toggle="modal" data-bs-target="#editMarkups">
                    <svg fill="#000000" style="width:14px;height:14px;" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                        width="20px" height="30px" viewBox="0 0 494.936 494.936"
                        xml:space="preserve">
                        <g>
                            <g>
                                <path d="M389.844,182.85c-6.743,0-12.21,5.467-12.21,12.21v222.968c0,23.562-19.174,42.735-42.736,42.735H67.157
                                    c-23.562,0-42.736-19.174-42.736-42.735V150.285c0-23.562,19.174-42.735,42.736-42.735h267.741c6.743,0,12.21-5.467,12.21-12.21
                                    s-5.467-12.21-12.21-12.21H67.157C30.126,83.13,0,113.255,0,150.285v267.743c0,37.029,30.126,67.155,67.157,67.155h267.741
                                    c37.03,0,67.156-30.126,67.156-67.155V195.061C402.054,188.318,396.587,182.85,389.844,182.85z"/>
                                <path d="M483.876,20.791c-14.72-14.72-38.669-14.714-53.377,0L221.352,229.944c-0.28,0.28-3.434,3.559-4.251,5.396l-28.963,65.069
                                    c-2.057,4.619-1.056,10.027,2.521,13.6c2.337,2.336,5.461,3.576,8.639,3.576c1.675,0,3.362-0.346,4.96-1.057l65.07-28.963
                                    c1.83-0.815,5.114-3.97,5.396-4.25L483.876,74.169c7.131-7.131,11.06-16.61,11.06-26.692
                                    C494.936,37.396,491.007,27.915,483.876,20.791z M466.61,56.897L257.457,266.05c-0.035,0.036-0.055,0.078-0.089,0.107
                                    l-33.989,15.131L238.51,247.3c0.03-0.036,0.071-0.055,0.107-0.09L447.765,38.058c5.038-5.039,13.819-5.033,18.846,0.005
                                    c2.518,2.51,3.905,5.855,3.905,9.414C470.516,51.036,469.127,54.38,466.61,56.897z"/>
                            </g>
                        </g>
                    </svg>
                </div>
            </div>
            </td>
        </tr>
        <?php
        }else{
            ?>
            <tr>
                <td>
                    <?php 
                        if($row['type'] == 'FIXED_AMOUNT'){
                            echo '$';
                        }
                        echo esc_html($row['value']); 
                        if($row['type'] == 'PERCENTAGE'){
                            echo '%';
                        }
                    ?>
                </td>
                <td><?php echo esc_attr($row['applyTo']); ?></td>
                <td>
                    <?php 
                        
                        echo esc_attr( $row['condition']);
                        if($row['condition'] != 'No minimum requirements'){
                            echo esc_attr(' $'.$row['conditionValue']);
                        }
                    ?>
                </td>
                <td>
                    <div class="d-flex">
                        <div class="delete-markup me-2" data-id="<?php echo esc_attr($row['id']); ?>" onclick="deleteMarkUps(<?php echo esc_attr($row['id']); ?>, 'discounts')">
                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true"><path d="M11.5 8.25a.75.75 0 0 1 .75.75v4.25a.75.75 0 0 1-1.5 0v-4.25a.75.75 0 0 1 .75-.75Z"></path><path d="M9.25 9a.75.75 0 0 0-1.5 0v4.25a.75.75 0 0 0 1.5 0v-4.25Z"></path><path fill-rule="evenodd" d="M7.25 5.25a2.75 2.75 0 0 1 5.5 0h3a.75.75 0 0 1 0 1.5h-.75v5.45c0 1.68 0 2.52-.327 3.162a3 3 0 0 1-1.311 1.311c-.642.327-1.482.327-3.162.327h-.4c-1.68 0-2.52 0-3.162-.327a3 3 0 0 1-1.311-1.311c-.327-.642-.327-1.482-.327-3.162v-5.45h-.75a.75.75 0 0 1 0-1.5h3Zm1.5 0a1.25 1.25 0 1 1 2.5 0h-2.5Zm-2.25 1.5h7v5.45c0 .865-.001 1.423-.036 1.848-.033.408-.09.559-.128.633a1.5 1.5 0 0 1-.655.655c-.074.038-.225.095-.633.128-.425.035-.983.036-1.848.036h-.4c-.865 0-1.423-.001-1.848-.036-.408-.033-.559-.09-.633-.128a1.5 1.5 0 0 1-.656-.655c-.037-.074-.094-.225-.127-.633-.035-.425-.036-.983-.036-1.848v-5.45Z"></path></svg>
                        </div>
                        <div class="delete-markup" data-id="<?php echo esc_attr($row['id']); ?>" onclick="get_discount_data(<?php echo esc_attr($row['id']); ?>, 'discounts')" data-bs-toggle="modal" data-bs-target="#editDiscount">
                            <svg fill="#000000" style="width:14px;height:14px;" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                width="20px" height="30px" viewBox="0 0 494.936 494.936"
                                xml:space="preserve">
                                <g>
                                    <g>
                                        <path d="M389.844,182.85c-6.743,0-12.21,5.467-12.21,12.21v222.968c0,23.562-19.174,42.735-42.736,42.735H67.157
                                            c-23.562,0-42.736-19.174-42.736-42.735V150.285c0-23.562,19.174-42.735,42.736-42.735h267.741c6.743,0,12.21-5.467,12.21-12.21
                                            s-5.467-12.21-12.21-12.21H67.157C30.126,83.13,0,113.255,0,150.285v267.743c0,37.029,30.126,67.155,67.157,67.155h267.741
                                            c37.03,0,67.156-30.126,67.156-67.155V195.061C402.054,188.318,396.587,182.85,389.844,182.85z"/>
                                        <path d="M483.876,20.791c-14.72-14.72-38.669-14.714-53.377,0L221.352,229.944c-0.28,0.28-3.434,3.559-4.251,5.396l-28.963,65.069
                                            c-2.057,4.619-1.056,10.027,2.521,13.6c2.337,2.336,5.461,3.576,8.639,3.576c1.675,0,3.362-0.346,4.96-1.057l65.07-28.963
                                            c1.83-0.815,5.114-3.97,5.396-4.25L483.876,74.169c7.131-7.131,11.06-16.61,11.06-26.692
                                            C494.936,37.396,491.007,27.915,483.876,20.791z M466.61,56.897L257.457,266.05c-0.035,0.036-0.055,0.078-0.089,0.107
                                            l-33.989,15.131L238.51,247.3c0.03-0.036,0.071-0.055,0.107-0.09L447.765,38.058c5.038-5.039,13.819-5.033,18.846,0.005
                                            c2.518,2.51,3.905,5.855,3.905,9.414C470.516,51.036,469.127,54.38,466.61,56.897z"/>
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div>
                </td>
            </tr>
            <?php
        }
    }

    // Get the generated HTML and clear the output buffer
    $html = ob_get_clean();

    // Return the HTML content
    //echo $html;
    wp_send_json_success(['html' => $html]);
    // Always use wp_die() in AJAX functions
    wp_die();
}
add_action('wp_ajax_freightpop_restore_markup_or_discount_data', 'freightpop_restore_markup_or_discount_data');
add_action('wp_ajax_nopriv_freightpop_restore_markup_or_discount_data', 'freightpop_restore_markup_or_discount_data');


// Get markup data by id

function freightpop_markup_or_discount(){
    // Sanitize and verify nonce
    $security_nonce = isset($_POST['security']) ? sanitize_text_field(wp_unslash($_POST['security'])) : '';

    if (!wp_verify_nonce($security_nonce, 'freightpop_loggedin_nonce')) {
        wp_send_json_error(['error' => 'Nonce verification failed']);
        return;
    }
    global $wpdb;
    // Sanitize and retrieve the table name
    $table_name = isset($_POST['tablename']) ? sanitize_text_field(wp_unslash($_POST['tablename'])) : '';
    $id = isset($_POST['id']) ? intval($_POST['id']) : '';
    $result = [];
    if ($table_name == 'markups') {
        $data = $wpdb->get_results("SELECT * FROM `markups`");
        $result['message'] = 'MarkUps Data Received successfully.';
    } elseif ($table_name == 'discounts') {
        $data = $wpdb->get_results("SELECT * FROM `discounts`");
        $result['message'] = 'Discount Data Received successfully.';
    }
    $filteredData = [];
    foreach ($data as $item) {
        if ($item->id === (string)$id) {
            $filteredData[] = $item; // Add the matched item to the filteredData array
        }
    }
    
    $result['status'] = 200;
    $result['data'] = $filteredData[0];
    wp_send_json($result);
    
}

add_action('wp_ajax_freightpop_markup_or_discount', 'freightpop_markup_or_discount');
add_action('wp_ajax_nopriv_freightpop_markup_or_discount', 'freightpop_markup_or_discount');

// Edit markup value 

function freightpop_edit_markups_rules() {
    // Sanitize and verify nonce
    $security_nonce = isset($_POST['security']) ? sanitize_text_field(wp_unslash($_POST['security'])) : '';

    if (!wp_verify_nonce($security_nonce, 'freightpop_loggedin_nonce')) {
        wp_send_json_error(['error' => 'Nonce verification failed']);
        return;
    }
    global $wpdb;

    // Sanitize and retrieve form data
    $type = isset($_POST['markuptype']) ? sanitize_text_field(wp_unslash($_POST['markuptype'])) : '';
    $value = isset($_POST['markupvalue']) ? sanitize_text_field(wp_unslash($_POST['markupvalue'])) : '';
    $applyTo = isset($_POST['applyto']) ? sanitize_text_field(wp_unslash($_POST['applyto'])) : '';
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0; // Use intval for ID
    
    // Check if the ID is valid
    if (empty($id)) {
        wp_send_json_error(['error' => 'Invalid ID provided.']);
        wp_die();
    }

    // Prepare data for update
    $data = array(
        'type'    => $type,
        'value'   => $value,
        'applyTo' => $applyTo
    );
    
    // Define data formats
    $format = array(
        '%s', // type
        '%s', // value
        '%s'  // applyTo
    );
    
    // Prepare where clause for update
    $where = array(
        'id' => $id // Specify the ID to update
    );
    
    // Define where format
    $where_format = array(
        '%d' // Format for the 'id' field
    );

    // Get the table name (with prefix)
    $table_name = 'markups';

    // Perform the update
    $update_result = $wpdb->update($table_name, $data, $where, $format, $where_format);

    // Check if update was successful
    if ($update_result === false) {
        // Handle the error
        $error_message = $wpdb->last_error;
        wp_send_json_error(['error' => $error_message]);
    } else {
        // Success response
        $result = array(
            'message' => 'Markups updated successfully.',
            'status'  => 200
        );
        wp_send_json_success($result);
    }

    wp_die(); // Always include to terminate script after sending response
}
add_action('wp_ajax_freightpop_edit_markups_rules', 'freightpop_edit_markups_rules');
add_action('wp_ajax_nopriv_freightpop_edit_markups_rules', 'freightpop_edit_markups_rules');

function freightpop_edit_discount_rules() {
    // Sanitize and verify nonce
    $security_nonce = isset($_POST['security']) ? sanitize_text_field(wp_unslash($_POST['security'])) : '';

    if (!wp_verify_nonce($security_nonce, 'freightpop_loggedin_nonce')) {
        wp_send_json_error(['error' => 'Nonce verification failed']);
        return;
    }
    global $wpdb;

    // Sanitize and retrieve form data
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0; // Retrieve and sanitize the ID
    $type = isset($_POST['discounttype']) ? sanitize_text_field(wp_unslash($_POST['discounttype'])) : '';
    $value = isset($_POST['discountvalue']) ? sanitize_text_field(wp_unslash($_POST['discountvalue'])) : '';
    $applyTo = isset($_POST['discountapplyto']) ? sanitize_text_field(wp_unslash($_POST['discountapplyto'])) : '';
    $ruleset = isset($_POST['ruleset']) ? sanitize_text_field(wp_unslash($_POST['ruleset'])) : '';
    $rulevalue = isset($_POST['rulevalue']) ? sanitize_text_field(wp_unslash($_POST['rulevalue'])) : '';

    // Check if the ID is valid
    if (empty($id)) {
        wp_send_json_error(['error' => 'Invalid ID provided.']);
        wp_die();
    }

    // Prepare data for update
    $data = array(
        'type'    => $type,
        'value'   => $value,
        'applyTo' => $applyTo,
        'condition' => $ruleset,      // Assuming you want to update ruleset
        'conditionValue' => $rulevalue   // Assuming you want to update rulevalue
    );

    // Define data formats
    $format = array(
        '%s', // type
        '%s', // value
        '%s', // applyTo
        '%s', // ruleset
        '%s'  // rulevalue
    );

    // Prepare where clause for update
    $where = array(
        'id' => $id // Specify the ID to update
    );

    // Define where format
    $where_format = array(
        '%d' // Format for the 'id' field
    );

    // Get the table name (with prefix)
    $table_name = 'discounts';

    // Perform the update
    $update_result = $wpdb->update($table_name, $data, $where, $format, $where_format);

    // Check if update was successful
    if ($update_result === false) {
        // Handle the error
        $error_message = $wpdb->last_error;
        wp_send_json_error(['error' => $error_message]);
    } else {
        // Success response
        $result = array(
            'message' => 'Discount updated successfully.',
            'status'  => 200
        );
        wp_send_json_success($result);
    }

    wp_die(); // Always include to terminate script after sending response
}
add_action('wp_ajax_freightpop_edit_discount_rules', 'freightpop_edit_discount_rules');
add_action('wp_ajax_nopriv_freightpop_edit_discount_rules', 'freightpop_edit_discount_rules');
