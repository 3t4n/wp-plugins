<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$confirmationMessage = "";
$welcomeMsg = "";
$installationInstructions = "";
$gmapInstruction = "";
$couponMesssage = "";


/*
 *  REQUIRED VARS
 *  ====================
 $idx    		= $_GET["idx"];             // Used to get array of IDX instructions etc
 
 $serviceType    = $_GET["servicetype"];     // 1 = website, 2 = plugin
 $accountType    = $_GET["accounttype"];	    // agent, team, office
 $freeTrial      = $_GET["ft"];              // set to 1 if a free trial
 $trialFor       = $_GET["ftFor"];           // developer / webmaster / agent
 $websiteType    = $_GET["websitetype"];		// wordpress, squarespace, duda, wix  etc
 $coupon_code    = $_GET["code"];            // any coupon codes etc, e.g. bizstarter
 */


if (sanitize_text_field($trial) == 1) $freeTrial  = TRUE;             // signup for a free trial or not
else $freeTrial = FALSE;


/*
 * TEST SETTINGS?
 * ================= */
if (isset($_GET["ftFor"])) $trialFor = sanitize_text_field($_GET["ftFor"]);                   // developer | webmaster | other
else $trialFor = "";
if (isset($_GET["code"])) $coupon_code = sanitize_text_field($_GET["code"]);                   // developer | webmaster | other
else $coupon_code = "";
if (isset($accounttype_id)) $accounttype_id = sanitize_text_field($accounttype_id);                   // developer | webmaster | other
else $accounttype_id = "";
if (isset($trialUpgrade)) $trialUpgrade = sanitize_text_field($trialUpgrade);                   // developer | webmaster | other
else $trialUpgrade = "";
if (isset($mls_idxname)) $mls_idxname = sanitize_text_field($mls_idxname);                   // developer | webmaster | other
else $mls_idxname = "";
if (isset($idx_approval)) $idx_approval = sanitize_text_field($idx_approval);                   // developer | webmaster | other
else $idx_approval = "";

$serviceType = 2;                 // 1 = website 2 = plugin, 9 = upgrade
$accountType = $accounttype_id;
$websiteType = "wp";
if ($trial == 1) $freeTrial  = TRUE;
else $freeTrial  = FALSE;

//$coupon_code = "bizstarter";
//$trialUpgrade = TRUE;             // If this is for a free trial upgrade


// ================================================
// ========     **BLOCK** TOP THANKYOU MESSAGE
// ================================================

$thankyouForHeading = 'Thank you for ';
if($trialFor == "developer")    $thankyouForHeading .= "Requesting a Developer Account";
else if($freeTrial)             $thankyouForHeading .= "Requesting a Free Trial";
else if($trialUpgrade)          $thankyouForHeading .= "Upgrading Your Account";
else                            $thankyouForHeading .= "Submitting Your Order";
$thankyouForHeading .= '';

$thankyouFor = '
    <h4 class="mb-1">
        We\'ve sent you a confirmation email along with your account sign-in details.<br> 
        The email also includes these instructions, but you might want to print this out for future reference.
    </h4>
    <h4 class="text-danger mb-1">
        Click <b>"Continue"</b> at the bottom of this page to go to the plugin dashboard.
    </h4>
';

// ================================================
// SERVICE TYPE
// ================================================
switch ($serviceType) {
    case "1" :
        $service = ""; break;
    case "2" :
        $service = "Buying Buddy IDX Plugin and CRM"; break;
    case "3" :
        $service = ""; break;
    case "9" :
        $service = "Account Upgrade to a Live MLS feed"; // Upgrade from a free trial to a full account
        $trialUpgrade = TRUE; break;
}

// ================================================
// ACCOUNT TYPE NOTES
// ================================================
$accountTypeNotes = '';


if($trialFor == "developer") {      // for developer
    $accountTypeNotes .='
        <p>
            You now have full access to your new Developer Portal. See the instructions we sent you.
        </p>
        <p>
            Your Developer Portal includes:
            <ul class="small list-disc list-compact">
                <li>A demonstration account.
                    The Buying Buddy plugin and widgets can be installed on the demonstration website (that you specified),
                    and will use our demonstration MLS data set (not a live MLS feed).
                    CRM features that rely on live MLS data, such as sending property alerts etc, are disabled.</li>
                <li>Dashboard to add, and access, your client accounts.</li>
            </ul>
        </p>
        <p class="mb-0">
            <a href="https://support.buyingbuddy.com/knowledge-base/developer-portal/" target="_blank">Learn more about your Developer Account</a>.
        </p>
        <hr>
    ';
} elseif ($freeTrial && $trialFor == "webmaster") {
    $accountTypeNotes .='
        <p>
            You now have full access to a Free Trial account. See the instructions we sent you.
        </p>
        <p>
            Your Free Trial account uses our demonstration MLS data set (not a live MLS feed).<br>
            CRM features that rely on live MLS data, such as sending property alerts etc, are disabled.
        </p>
        <hr>
    ';
} else if($freeTrial) {
    $accountTypeNotes .='
        
        <p>
            You now have full access to a Free Trial account. See the instructions we sent you.
        </p>
        <p>
            Your Free Trial account uses our demonstration MLS data set (not a live MLS feed).<br>
            CRM features that rely on live MLS data, such as sending property alerts etc, are disabled.
        </p>
        <hr>
    ';
    
    
} else if( ($accountType == 2 || $accountType == 3) && $serviceType == 2 && $trialFor != "developer") { // show for MU accounts - but only if plugin and not developers
    $accountTypeNotes = '
        <ul class="small list-disc list-compact">
            <li><span class="weight500">Your Buying Buddy account includes 2 Users.</span><br>
                <span class="smaller lh-13">If you added a webmaster contact then they will also be shown as the Webmaster User in your account (non-chargeable).</span>
            </li>
            <li><span class="weight500">To add more Users / Agents:</span><br>
                <span class="smaller lh-13">
                    Login to your Buying Buddy dashboard and go to: My Account > Users.<br>
                    If you add CRM Users then your billing will be adjusted on the next billing cycle (the start of the next month).
                </span>
            </li>
        </ul>
        <hr>
    ';
}

// ================================================
// ========     **BLOCK** CONFIRMATION MESSAGES
// ================================================
$confirmationMessage = '
    <div class="card card-inner-outline bg-soft-success bg-opacity-60 overflow-hidden mb-5">
        <div class="card-header alert alert-success alert-marker marker-right">
            <div class="marker-icon">
                <img src="'.esc_url(plugin_dir_url(__FILE__)).'../images/cart.png" alt="">
            </div>
            <div class="text-h4">
                <div class="strong smaller">';
$confirmationMessage .= $trialFor == "developer" ? "Your Developer Account Includes:" : ($freeTrial ? "Your 30-Day Free Trial Includes:" : "You Ordered:" );
$confirmationMessage .= '
                </div>
                <div>
                    '.$service.'
                </div>
            </div>
        </div>
        <div class="card-body pt-3">
            <div class="max600 mx-auto pb-2">';
$confirmationMessage .= $accountTypeNotes ? $accountTypeNotes : "";
$confirmationMessage .= '
                <h5 class="mb-2">
                    You should be receiving the following confirmations shortly:
                </h5>
                <ol class="small">';
if(!$freeTrial) {
    $confirmationMessage .= '
                    <li><span class="weight600">Order Confirmation</span></li>
        ';
}

$confirmationMessage .= '
                    <li><span class="weight600">Welcome To Your ';
$confirmationMessage .= $trialFor == "developer" ? "Developer Account" : ($freeTrial ? "Free Trial Account" : "New Buying Buddy Account" );
$confirmationMessage .= '</span>
                    <span class="d-block smaller lh-13">This email will include instructions and login credentials for your new Buying Buddy account:</span></li>
                </ol>
                <hr>
                <div class="ml-4">
                    <div class="d-flex small mb-2">
                        <img src="'.esc_url(plugin_dir_url(__FILE__)).'../images/envelope.png" class="icon-sm mt-1 mr-2" alt="">
                        <div>
                            Emails are from: <span class="weight500">support@buyingbuddy.com</span>
                        </div>
                    </div>
                    <div class="d-flex small">
                        <img src="'.esc_url(plugin_dir_url(__FILE__)).'../images/sms.png" class="icon-sm mt-1 mr-2" alt="">
                        <div class="d-flex flex-column">
                            <div>SMS messages from: <span class="weight500">720-536-0933</span></div>
                            <div class="weight500">
                                This notifications number is SMS "send" only, do not reply or call.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
';

// ================================================
// ========     **BLOCK** INSTALLATION INSTRUCTIONS
// ================================================
$installationInstructions ='
    <div class="card card-inner-outline mb-5">
        <div class="card-header alert alert-success alert-marker marker-rounded">
            <div class="marker-icon">
                <img src="'.esc_url(plugin_dir_url(__FILE__)).'../images/thumbs-up.png" alt="">
            </div>
            <div class="text-h4">Installation and initial setup is now complete!</div>
        </div>
        <div class="card-body pt-3">
            <div class="max600 mx-auto pb-3">
                <p>
                     The Buying Buddy plugin is now activated.
                </p>
                <ul class="small list-disc list-compact mb-2">
                    <li><strong>The plugin created three utility ("foundation") pages</strong> with Buying Buddy widgets.</li>
                    <li><strong>We also created a search page</strong> that has the search form widget on it.
                        This will allow you to see the MLS search, results and property details all working straight away.</li>
                </ul>
                <p>
                    Scroll down to see the options to add additional helpful pages.
                </p>
                <div class="pr-lg-5">
                    <img src="'.esc_url(plugin_dir_url(__FILE__)).'../images/initial-page-setup.jpg" class="img-fluid shadow-img" alt="Initial pages setup" style="max-width: 560px">
                </div>
            </div>
        </div>
    </div>
';

// ====================================================
// ========     **BLOCK** WELCOME MESSAGE INSTRUCTIONS
// ====================================================
if ($buyingbuddy_status == 30) {
    $demoMlsNotice = '
        <div class="alert alert-sm alert-info alert-marker marker-right mb-0 lh-13">
            <div class="marker-icon">
                <img src="'.esc_url(plugin_dir_url(__FILE__)).'../images/circle-exclamation.png" alt="">
            </div>
            <div class="mb-1">
                This is a 30-day free trial account.<br>
                <b>Remember!</b> All property information comes from
                <a href="https://support.buyingbuddy.com/knowledge-base/demonstration-mls-data-set/" target="_blank" title="See details">Demonstration MLS data set</a>
                (not a live MLS feed).
            </div>
            <div class="mb-1">
                Any property information shown is for demonstration purposes only and does not represent any properties for sale.
            </div>
            <div>
                When you are ready, upgrade to a live MLS feed and all the widgets and displays you have will <span class="weight600">automatically</span> update to display listings from YOUR MLS instead of the Demo MLS.
            </div>
        </div>
    ';
} else {
    $demoMlsNotice = '';
}

if($freeTrial) {
    $welcomeMsg ='';
} else {                                          // standard order - IDX instructions
    $welcomeMsg = '
        <div class="card card-inner-outline overflow-hidden mb-4">
            <div class="card-header alert alert-dark alert-marker marker-rounded">
                <div class="marker-icon">
                    <img src="'.esc_url(plugin_dir_url(__FILE__)).'../images/circle-question.png" alt="">
                </div>
                <div class="text-h4">
                    IDX Approval Required, from: '.$mls_idxname.'
                </div>
            </div>
            <div class="card-body pt-3">
                <div class="max600 mx-auto pb-3">
                    <p>
                        You now have access to your new Buying Buddy account. See the instructions we sent you.
                    </p>
                    <p>
                        IDX approval is now required.
                        Until IDX approval is received from your MLS, Buying Buddy widgets will use our Demonstration MLS data set,
                        which will allow you to visualize components in your website.
                    </p>
                    <div class="mb-1"><span class="s14 badge badge-danger">YOUR ACTION:</span></div>
                    <div class="border-left border-danger border-3 pt-3 px-3 pb-1 mb-3 bg-soft-secondary bg-opacity-30 smaller">
                        '. $idx_approval .'
                    </div>
                    <div>
                        <strong>PLEASE NOTE:</strong> We will be unable to provide the live data feed
                        until we receive IDX approval from your MLS.
                        Even if you have an existing IDX agreement with another IDX vendor,
                        you will still need an IDX agreement for Buying Buddy.
                    </div>
                </div>
            </div>
        </div>
    ';
}


// ================================================
// ========     **BLOCK** GOOGLE MAP
// ================================================
$gmapInstructions = '
        <div class="row">
            <div class="col-12">
                <p class="mb-2">
                    A Google Map API Key is required for any widget that uses a map.<br>
                    <span class="smaller">Widget features that do not use the map will function normally without a map key.</span>
                </p>
                <p>
                    See <a href="https://support.buyingbuddy.com/generate-and-set-a-google-maps-api-key/" target="_blank">How to get a Google Map API key</a> for full instructions.
                </p>
                <div class="alert alert-sm alert-warning alert-marker marker-right border-inner-outline lh-13">
                    <div class="marker-icon">
                        <img src="'.esc_url(plugin_dir_url(__FILE__)).'../images/circle-exclamation.png" alt="">
                    </div>
                    <strong>Note</strong> -
                    If this is a production or live website, you should obtain a Map Key.
                </div>
            </div>
        </div>';
if($freeTrial) {
    $gmapInstructions .= '
        <div class="row">
            <div class="col-12 mb-3">
                <div class="alert alert-sm alert-primary border-inner-outline mb-2 lh-13">
                    <div class="weight700 mb-1">Do you need a Google Map API key for your Free Trial?</div>
                    Without a valid Google Map Key, Buying Buddy widgets will still function normally <b>except any map displays</b>.
                    The map sections on the Results "map" panel and the "Map Display Widget" will show a Google warning message unless a valid Google Maps API Key is used.
                </div>
            </div>
        </div>';
} 
$gmapInstructions .= '
        <div class="row">
            <div class="col-12">
                <div class="alert alert-sm alert-danger alert-marker marker-right border-inner-outline lh-13">
                    <div class="marker-icon">
                        <img src="'.esc_url(plugin_dir_url(__FILE__)).'../images/circle-exclamation.png" alt="">
                    </div>
                    <div class="weight700 mb-1">Are you using DIVI, or Real Spaces Themes?</div>
                    You must still add a Google Map Key, but these themes also load the Google Maps JavaScript, and loading this twice causes errors.<br>
                    <a href="https://support.buyingbuddy.com/knowledge-base/knowledge-base/wordpress-compatibility-and-technical-notes/" target="_blank">See our support article</a> on how to remove conflicts.
                </div>
            </div>
        </div>
';




// ================================================
// ========     **BLOCK** COUPON / SPECIAL MESSAGES
// ================================================
if ($coupon_code == "bizstarter") {
    
    $couponMesssage = '
        <div class="card card-outline overflow-hidden mb-5">
            <div class="card-header alert alert-dark alert-marker marker-rounded">
                <div class="marker-icon">
                    <img src="'.esc_url(plugin_dir_url(__FILE__)).'../images/angles-right.png" alt="">
                </div>
                <div class="text-h4">Business Starter Special Offer</div>
            </div>
            <div class="card-body pt-3">
                <div class="max600 mx-auto pb-3">
                    <div class="row">
                        <div class="col-12">
                            <p class="mb-1">
                                In order to qualify, you must have received your original real estate license within the last 12 months.
                            </p>
                            <div class="mb-1"><span class="s14 badge badge-danger">YOUR ACTION:</span></div>
                            <ul class="small list-alpha list-compact mb-3">
                                <li>
                                    Log in to your new Buying Buddy dashboard.<br>
                                    Your dashboard shows your account status and the Messages panel (see image below).<br>
                                    <span class="small">We just sent your login credentials by email from support@buyingbuddy.com.</span>
                                </li>
                                <li>
                                    Send us a Message with a copy of your real estate license showing the date it was issued.
                                </li>
                            </ul>
                            <div class="text-center">
                                <img src="https://buyingbuddy.com/assets/images/order/business-starter-upload.jpg" class="img-fluid shadow-img" alt="Upload your license in the Messages panel">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    ';
}


// ================================================
// ========            NEED HELP / GOT QUESTIONS
// ================================================
$needHelpQuestions ='
    <div class="card card-inner-outline overflow-hidden mb-4">
        <div class="card-header alert alert-info alert-marker marker-rounded">
            <div class="marker-icon">
                <img src="'.esc_url(plugin_dir_url(__FILE__)).'../images/circle-question.png" alt="">
            </div>
            <div class="text-h4">Need Help? Got Questions?</div>
        </div>
        <div class="card-body pt-3">
            <div class="max600 mx-auto pb-3">
                <div class="row">
                    <div class="col-12">
                        <p>
                            If you need assistance, please use the Messages panel in your new Buying Buddy dashboard.<br>
                            Login at <a href="https://leadsandcontacts.com" target="_blank">LeadsAndContacts.com</a>.
                            The Messages panel is shown on the right.
                        </p>
                        <div class="text-center">
                            <img src="'.esc_url(plugin_dir_url(__FILE__)).'../images/pending-dashboard-messages.jpg" class="img-fluid shadow-img" alt="Use the Messages panel to get help">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
';
?>   