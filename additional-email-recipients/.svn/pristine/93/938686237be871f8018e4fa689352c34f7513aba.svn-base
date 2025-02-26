<?php
// Exit if accessed directly
  if (!defined('ABSPATH'))
    exit;



/**
 * Adds a new settings page under Setting menu
*/
add_action( 'admin_menu', 'arrowD07137738__additionalemails_admin_page' );
function arrowD07137738__additionalemails_admin_page() {
    //only editor and administrator can edit
    if( current_user_can('editor') || current_user_can('administrator') ) {
        add_options_page(
            __( 'Email Recipients', 'additional-email-recipients' ),
            __( 'Email Recipients', 'additional-email-recipients' ),
            'manage_options',
            'arrowD07137738__additionalemailsSettings',
            'arrowD07137738__additionalemails_homepage'
        );
    }
}//arrowD07137738__additionalemails_admin_page


function arrowD07137738__additionalemails_homepage(){
//	$savingOverLay = arrowD07137738_creationOfLoadingOverlayDivHtml();
//	echo esc_html( $savingOverLay );
	
	
	
?>

<div id="arrowD07137738loadingOverlay" class="arrowD07137738loadingOverlay" style="display: none;">
    <div id="arrowD07137738OverlayLoaderText" class="arrowD07137738OverlayLoaderText">Saved</div>
    <div id="arrowD07137738OverlayLoaderSpinner" class="arrowD07137738OverlayLoaderSpinner"></div>
</div>
    
    
	<div style="margin-left:1%; margin-bottom:2%;">
	<h2 style="">Add Additional Email Recipients - by <a href="https://arrowdesign.ie">ArrowDesign.ie</a></h2>
	<h4 style="">The easy way to edit your woocommerce Email Recipients - add more emails, comma seperated</h4>
	<!--
	<p style=""><strong>Quick Links: <a href="https://arrowdesign.ie">Docs (XXX needed)</a> <a href="https://arrowdesign.ie">Get Support (XXX needed)</a> <a href="https://arrowdesign.ie">Leave A Review (XXX needed)</a></strong></p>
	-->
	
<?php
	//Check for the transient and display an admin notice
    if ( get_transient( 'arrowD07137738_settings_saved' ) )
	{
        echo '<div class="notice notice-success is-dismissible" style="margin-top:1%; margin-bottom:1%;"><p>Settings updated successfully.</p></div>';
        delete_transient( 'arrowD07137738_settings_saved' );
	}//transient set

?>
	</div>
	<!--
	<div id="arrowD071377382_additionalEmailNav_id" class="arrowD071377382_additionalEmailNav_Cls">
	<button type="submit" onclick="arrowD7137738_closeOrOpenApiPanel('inline-flex')" name="" class="button button-primary button-large" >Plugin Api Details</button>
	<button type="submit" onclick="arrowD7137738_closeOrOpenEmailLogPanel('block')" name="" class="button button-primary button-large" >Email Log</button>
	</div>
	->
<?php
//	arrowD07137738_checkForPluginUpdates();
//	arrowD071377382_premiumAuthenticationOptionsPnl();
?>
	<div style="margin-top:2%; margin-left:1%;">
 
	<!--
	<form action="" method="post" id="arrowD071377382_additionalEmailsFrm">
	
	-->
	<div id="arrowD07137738_additionalEmailsDiv">
<?php

$savedEmailSettingsString = get_term_meta('2024', 'arrowD07137738_theAdditionalEmails', true);
$savedEmailSettingsStringObj = json_decode($savedEmailSettingsString, true);

/* // Check if the decoding was successful
if ($savedEmailSettingsStringObj === null && json_last_error() !== JSON_ERROR_NONE) {
    echo "Error decoding JSON: " . json_last_error_msg();
} else {
    echo '<pre>';
    print_r($savedEmailSettingsStringObj);
    echo '</pre>';
}
echo'<p style="color:red; font-size:18px;">'.$savedEmailSettingsStringObj['new_order_to']['id'].'</p>'; */

		if ( class_exists( 'WC_Emails' ) )
		{
			
			// Get all WooCommerce email instances
				$emails = WC_Emails::instance()->get_emails();
?>
				<table class="wp-list-table widefat fixed striped" style="border:1px solid black; background-color:#ffffff; table-layout:auto!important;">
				<tr style="">
				<th><b>Email Sent</b></th>
				<th style=""><b>When This Occurs</b></th>
				<th><b>Set Additional "To" Mails (comma separated)</b></th>
				<th><b>Set Additional "CC" Mails (comma separated)</b></th>
				<th><b>Set Additional "BCC" Mails (comma separated)</b></th>
				</tr>
<?php				
				// Loop through the emails
				foreach ( $emails as $email )
				{
					
				// Retrieve saved values
				$objectHandle_to = $email->id . '_to';
				$objectHandle_cc = $email->id . '_cc';
				$objectHandle_bcc = $email->id . '_bcc';
				if(!is_null($savedEmailSettingsStringObj))
				{
					if(!is_null($savedEmailSettingsStringObj[$objectHandle_to]['value']))
					{
						$to_value = $savedEmailSettingsStringObj[$objectHandle_to]['value'];
					}
					else
					{
						$to_value = "";
					}
					if(!is_null($savedEmailSettingsStringObj[$objectHandle_cc]['value']))
					{
						$cc_value = $savedEmailSettingsStringObj[$objectHandle_cc]['value'];
					}
					else
					{
						$cc_value = "";
					}
					if(!is_null($savedEmailSettingsStringObj[$objectHandle_bcc]['value']))
					{
						$bcc_value = $savedEmailSettingsStringObj[$objectHandle_bcc]['value'];
					}
					else
					{
						$bcc_value = "";
					}
				}
				else
				{
					$to_value = "";
					$cc_value = "";
					$bcc_value = "";
				}

				
				
				if( ($email->id=='new_order')||($email->id=='cancelled_order')||($email->id=='failed_order') )
				{
					$set_recipient = esc_html( $email->get_recipient() );
									if ($set_recipient == "")
						{
							// Check if the email ID suggests it's a customer email
							if ( strpos($email->id, 'customer_') === 0 )
							{
								//$set_recipient = 'Customer (Dynamic based on order)';
							}
							else
							{
							$set_recipient = '(Not Configured)';
							}
						}
				}
				else
				{
					$set_recipient = 'Customer (Dynamic based on order)';
				}
					
						
					// Display email title and description
?>					
					<tr style="">
					<td><strong><?php echo esc_html( $email->get_title() ); ?></strong><br/>Recipient: <br/><?php echo esc_html( $set_recipient ); ?></td>
					<td style="width:100px;">Description: <?php echo esc_html( $email->get_description() ) ; ?></td>
					<td><input id="<?php echo esc_attr( $email->id ); ?>_to" name="<?php echo esc_attr( $email->id ); ?>_to" style="width:400px; margin-left:2%;" placeholder="To:" type="text" value="<?php echo esc_html( $to_value );?>"></input></td>
					<td><input id="<?php echo esc_attr( $email->id ); ?>_cc" name="<?php echo esc_attr( $email->id ); ?>_cc" style="width:400px; margin-left:2%;" placeholder="CC:" type="text" value="<?php echo esc_html( $cc_value );?>"></input></td>
					<td><input id="<?php echo esc_attr( $email->id ); ?>_bcc" name="<?php echo esc_attr( $email->id ); ?>_bcc" style="width:400px; margin-left:2%;" placeholder="BCC:" type="text" value="<?php echo esc_html( $bcc_value ); ?>"></input></td>
					</tr>
<?php					
				}//foreach
			
?>
				</table>
				<button type="submit" onclick="arrowD07137738_checkForSavesToEmails(event)" name="arrowD07137738_checkForSavesToEmails" class="button button-primary button-large" style="float: right; margin-top: 1%; margin-right: 4%;" value="">Save Additional Emails</button>
				</div><!-- arrowD07137738_additionalEmailsDiv -->
				</div>
<?php
				
		}//if WC_Emails exists
		else{
?>
<h2 style="font-weight:bold;color:red;">Woocmmerce Is Not Enabled. This plugin requires woocommerce.</h2>
<?php
		}


}//arrowD07137738__additionalemails_homepage

function arrowD07137738__additionalemails_load_custom_wp_admin_style() {
    $plugin_url = plugin_dir_url(__FILE__);
    wp_enqueue_style('admin_style_css', $plugin_url . 'styles/style.css');
    wp_enqueue_style('admin_style_css');
    
    // Enqueue your JavaScript file
    wp_enqueue_script('arrowD07137738__additionalemails_logic_file', plugins_url('/js/logic.js', __FILE__ ));
    
    // Define and pass the AJAX URL to your JavaScript
    $ajax_url = admin_url('admin-ajax.php');
	$nonce = wp_create_nonce('arrowD07137738__additionalemails_nonce');
	wp_localize_script('arrowD07137738__additionalemails_logic_file', 'custom_additionalemails_logic_object', array('ajax_url' => $ajax_url, 'nonce' => $nonce));
}

add_action('admin_enqueue_scripts', 'arrowD07137738__additionalemails_load_custom_wp_admin_style');

// Add Plugin Settings Menu to Admin Menu
function arrowD07137738__additionalemails_settings_menu() {
    add_menu_page(
        'Additional email recipients Settings', // Page Title
        'Additional Emails', // Menu Title
        'manage_options', // Capability
        'arrowD07137738_additionalemails', // Menu Slug
        'arrowD07137738_additionalemails_homepage_callback', // Callback function to display the settings page
        'dashicons-admin-generic' // Icon (You can change this to a suitable icon)
    );
}//arrowD182378_erpc_settings_menu

add_action('admin_menu', 'arrowD07137738__additionalemails_settings_menu');


function arrowD07137738_additionalemails_homepage_callback(){
arrowD07137738__additionalemails_homepage();	
}//arrowD07137738_additionalemails_homepage_callback

/* function arrowD07137738_add_additional_email_headers( $headers, $email_id, $order ) {

	$savedEmailSettingsString = get_term_meta('2024', 'arrowD07137738_theAdditionalEmails', true);
	
	
	if(is_null($savedEmailSettingsString))
	{
		return $headers;
	}
	$savedEmailSettingsStringObj = json_decode($savedEmailSettingsString, true);

	// Retrieve saved values
	$objectHandle_to = $email_id . '_to';
	$objectHandle_cc = $email_id . '_cc';
	$objectHandle_bcc = $email_id . '_bcc';
	$to_emails = $savedEmailSettingsStringObj[$objectHandle_to]['value'] ?? "";
	$cc_emails = $savedEmailSettingsStringObj[$objectHandle_cc]['value'] ?? "";
	$bcc_emails = $savedEmailSettingsStringObj[$objectHandle_bcc]['value'] ?? "";
	
	
	if($to_emails!='')
	{
		$headers .= 'To: ' . $to_emails . "\r\n";
	}

	if($cc_emails!='')
	{
		$headers .= 'To: ' . $cc_emails . "\r\n";
	}

	if($bcc_emails!='')
	{
		$headers .= 'To: ' . $bcc_emails . "\r\n";
	}

    return $headers;
}//arrowD07137738_add_additional_email_headers
add_filter( 'woocommerce_email_headers', 'arrowD07137738_add_additional_email_headers', 10, 3 ); */
function arrowD07137738_add_additional_email_headers( $headers, $email_id, $order ) {
	
	// Get saved email settings
	$savedEmailSettingsString = get_term_meta('2024', 'arrowD07137738_theAdditionalEmails', true);
	
	if ( is_null( $savedEmailSettingsString ) ) {
		return $headers;
	}
	
	$savedEmailSettings = json_decode( $savedEmailSettingsString, true );

	// Retrieve saved values
	$objectHandle_to = $email_id . '_to';
	$objectHandle_cc = $email_id . '_cc';
	$objectHandle_bcc = $email_id . '_bcc';
	$to_emails = $savedEmailSettings[ $objectHandle_to ]['value'] ?? '';
	$cc_emails = $savedEmailSettings[ $objectHandle_cc ]['value'] ?? '';
	$bcc_emails = $savedEmailSettings[ $objectHandle_bcc ]['value'] ?? '';
	
	// Add 'To' header if not empty
	if ( ! empty( $to_emails ) ) {
		$headers .= 'To: ' . $to_emails . "\r\n";
	}

	// Add 'Cc' header if not empty
	if ( ! empty( $cc_emails ) ) {
		$headers .= 'Cc: ' . $cc_emails . "\r\n";
	}

	// Add 'Bcc' header if not empty
	if ( ! empty( $bcc_emails ) ) {
		$headers .= 'Bcc: ' . $bcc_emails . "\r\n";
	}

    return $headers;
}

add_filter( 'woocommerce_email_headers', 'arrowD07137738_add_additional_email_headers', 10, 3 );

function arrowD07137738_savesTheAdditionalEmails() {
    // Sanitize nonce
    if (!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'arrowD07137738__additionalemails_nonce')) {
        wp_send_json_error(array('message' => 'Nonce verification failed'));
        wp_die();
    }

    // Sanitize other inputs
    $stylingObjAsString = sanitize_text_field(wp_unslash($_POST['inputDetails']));
    $updateSuccessResponse = '';
    $termMetaIdentifier = 'arrowD07137738_theAdditionalEmails';

    if (update_term_meta('2024', $termMetaIdentifier, $stylingObjAsString)) {
        $updateSuccessResponse = 'saved';
    } else {
        $updateSuccessResponse = 'not saved';
    }

    wp_send_json_success($updateSuccessResponse);
    wp_die();
}
add_action('wp_ajax_arrowD07137738_savesTheAdditionalEmails', 'arrowD07137738_savesTheAdditionalEmails');


/*
function arrowD07137738_creationOfLoadingOverlayDivHtml(){
	$overlayHtml = '';
	$overlayHtml .= '<div id="arrowD07137738loadingOverlay" class="arrowD07137738loadingOverlay" style="display: none;">';
	$overlayHtml .= '<div id="arrowD07137738OverlayLoaderText" class="arrowD07137738OverlayLoaderText">Saved</div>';
    $overlayHtml .= '<div id="arrowD07137738OverlayLoaderSpinner" class="arrowD07137738OverlayLoaderSpinner"></div>';
    $overlayHtml .= '</div>';//arrowD1377382loadingOverlay
	return $overlayHtml;
}//arrowD07137738_creationOfLoadingOverlayDivHtml
*/
function arrowD07137738_creationOfDivForEmailDisplay(){
	$overlayHtml = '';
	$overlayHtml .= '<div id="arrowD07137738singleEmailDisplay" class="arrowD07137738SingleEmailDisplay" style="">';
    $overlayHtml .= '</div>';//singleEmailDisplay
	return $overlayHtml;
}//arrowD07137738_creationOfDivForEmailDisplay