<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
$nonce = wp_create_nonce('digages_add_order_to_cart_nonce');


// $checkmobiletab = 'digages_hidden';
// $checkmobiledetails = 'digages_show';

$enabled_options = 0;

// Check each payment option and count how many are enabled
if (isset($options['enable_bank_transfers']) && $options['enable_bank_transfers'] === 'yes') {
    $enabled_optionsbank = 1;
}
else
{
    $enabled_optionsbank = 0;
}

if (isset($options['enable_mobile_money']) && $options['enable_mobile_money'] === 'yes') {
    $enabled_optionsmob = 1;
}
else
{
    $enabled_optionsmob = 0;
}
if (isset($options['enable_crypto_money']) && $options['enable_crypto_money'] === 'yes') {
    $enabled_optionscryp = 1;
}
else
{
    $enabled_optionscryp = 0;
}


// For P2P, get the accounts and count how many are enabled
$p2pAccounts = get_option('digages_direct_p2p_accounts');
if (is_array($p2pAccounts) && !empty($p2pAccounts)) {
    // Filter the accounts to count the enabled ones
    $enabledP2PAccounts = array_filter($p2pAccounts, function($account) {
        return isset($account['enabled']) && $account['enabled'] === 1 && isset($account['p2p_name']) && !empty($account['p2p_name']);
    });
    
    // Increment the enabled options count based on the enabled P2P accounts
    if (count($enabledP2PAccounts) > 0) {
        $enabled_optionsppp = 1;
    }
    else
    {
        $enabled_optionsppp = 0;
    }
}

// If at least two options (including P2P) are enabled, adjust the values
// if ($enabled_options > 1) {
//     $checkmobiletab = '';
//     $checkmobiledetails = 'digagageshidden';
// }
$enabled_options= $enabled_optionsbank + $enabled_optionsmob + $enabled_optionscryp + $enabled_optionsppp;

if ($enabled_options > 1) {
        $checkmobiletab = '';
        $checkmobiledetails = 'digagageshidden';
    }
elseif ($enabled_options == 1)
{
    $checkmobiletab = 'digagageshidden';
    $checkmobiledetails = '';
}
    else {
        $checkmobiletab = 'digagageshidden';
        $checkmobiledetails = '';
    }

?> 

<!-- side bar -->
<div class="conta step" id="step1">
  <div class="rowt rowt-colts-auto"> 
<!-- side tab -->
    <div class="colt yusd digages_popmodal allbtn <?php echo wp_kses_post($checkmobiletab); ?>"> 
    <div class="rowt rowt-colts-1 rowt-colts-sm-1 rowt-colts-md-1 btnx">
        <div class="colt d-sm-none"> 
        <div class="modal-headerx modhe">
        <div class="container text-center">
  <div class="rowt">  
  <div class="colt-10 text-start urtmidkk">
    Direct Payments
    </div>

    <div class="colt-2t xcsxt"><i class="bi bi-x ticonduzs digages_add-order-to-cart-button" data-nonce="<?php echo esc_attr($nonce); ?>"></i></div>
  </div>
</div> 
      </div>
</div>
<div class="colt ppsjzzx trstxt d-sm-none"> 
Use one of the payment methods below to pay <b><?php echo esc_html(wp_strip_all_tags($cart_total)); ?></b> for Order #<b><span class="orderNumberDisplay"></span></b>
</div>

    <div class="colt rsdsd text-start lpllx d-none d-sm-block">PAY WITH</div>
    <div class="colt nav-pills tab-contentm" id="myTab" role="tablist">
    <div class="rowt rowt-colts-1 rowt-colts-sm-1 rowt-colts-md-1">
    <?php 
    $activeSet = false; // Track if an active option has been set

    // Bank Transfer
    if (isset($options['enable_bank_transfers']) && $options['enable_bank_transfers'] === 'yes') { 
        $activeSet = true; // Set active since Bank Transfer is enabled
    ?>
    <div class="colt">
        <a class="nav-linkt active" id="tab-bank" data-bs-toggle="tab" href="#bank" role="tab" aria-controls="bank" aria-selected="true">
            <div class="rowt">
                <div class="colt">
                        <div class="tumaz_mob_tab_menu">
                        Bank Transfer
                        <span class="tumaz_mob_tab_menu_end d-sm-none text-end"><i class="bi bi-chevron-right tddsumsr"></i></span>
                        </div>
                </div> 
            </div>
        </a>
    </div>
    <?php } ?>

    <!-- Mobile Money -->
    <?php if (isset($options['enable_mobile_money']) && $options['enable_mobile_money'] === 'yes') { ?>
    <div class="colt">
        <a class="nav-linkt <?php echo !$activeSet ? 'active' : ''; ?>" id="tab-mobile" data-bs-toggle="tab" href="#mobile" role="tab" aria-controls="mobile" aria-selected="<?php echo !$activeSet ? 'true' : 'false'; ?>">
            <div class="rowt">
               
            <div class="colt">
                        <div class="tumaz_mob_tab_menu">
                        Mobile Money
                        <span class="tumaz_mob_tab_menu_end d-sm-none text-end"><i class="bi bi-chevron-right tddsumsr"></i></span>
                        </div>
                </div> 
            </div>
        </a>
    </div>
    <?php 
    if (!$activeSet) $activeSet = true; // Set as active if Bank Transfer isn't available
    } ?>


    <!-- crypto Money -->
    <?php if (isset($options['enable_crypto_money']) && $options['enable_crypto_money'] === 'yes') { ?>
    <div class="colt">
        <a class="nav-linkt <?php echo !$activeSet ? 'active' : ''; ?>" id="tab-crypto" data-bs-toggle="tab" href="#crypto" role="tab" aria-controls="crypto" aria-selected="<?php echo !$activeSet ? 'true' : 'false'; ?>">
            <div class="rowt">
               
            <div class="colt">
                        <div class="tumaz_mob_tab_menu">
                        Crypto
                        <span class="tumaz_mob_tab_menu_end d-sm-none text-end"><i class="bi bi-chevron-right tddsumsr"></i></span>
                        </div>
                </div> 
            </div>
        </a>
    </div>
    <?php 
    if (!$activeSet) $activeSet = true; // Set as active if Bank Transfer isn't available
    } ?>



    <!-- P2P Payments -->
    <?php if (isset($options['enable_p2p_payments']) && $options['enable_p2p_payments'] === 'yes') { ?>
    <div class="colt">
        <?php
        $p2pAccounts = get_option('digages_direct_p2p_accounts');
        if (is_array($p2pAccounts) && !empty($p2pAccounts)) {
            foreach ($p2pAccounts as $p2p) { 
        ?>
        <a class="nav-linkt <?php echo !$activeSet ? 'active' : ''; ?>" id="tab-p2p-<?php echo esc_attr(str_replace(' ', '-', $p2p['p2p_name'])); ?>" data-bs-toggle="tab" href="#p2p-<?php echo esc_attr(str_replace(' ', '-', $p2p['p2p_name'])); ?>" role="tab" aria-controls="p2p-<?php echo esc_attr(str_replace(' ', '-', $p2p['p2p_name'])); ?>" aria-selected="<?php echo !$activeSet ? 'true' : 'false'; ?>">
        <div class="rowt">

            
            <div class="colt">
                        <div class="tumaz_mob_tab_menu">
                        <?php echo esc_html($p2p['p2p_name']); ?>
                        <span class="tumaz_mob_tab_menu_end d-sm-none text-end"><i class="bi bi-chevron-right tddsumsr"></i></span>
                        </div>
                </div>  
            </div>
        </a>
        <?php 
        if (!$activeSet) $activeSet = true; // Set as active if no previous method was active
        }
    } ?>
    </div>
    <?php } ?>
</div>


</div>

</div> 
    </div>
    <!-- side tab ends -->

<!-- Content section --> 
    <div class="colt digages_popmodal2 llks allclass <?php echo wp_kses_post($checkmobiledetails); ?>">
    <div class="rowt rowt-colts-1 rowt-colts-sm-1 rowt-colts-md-1 hidden-content">
    <div class="colt d-sm-none"> 
        <div class="modal-headerx modheq">
  <div class="rowt">
    <div class="colt-10 text-start urtmidkk">
        <span class="mobhedtumaz">
    <?php
    // Determine the active payment method name
    $activePaymentMethod = null;

    if (isset($options['enable_bank_transfers']) && $options['enable_bank_transfers'] === 'yes') {
        $activePaymentMethod = 'Bank Transfer';
    } elseif (isset($options['enable_mobile_money']) && $options['enable_mobile_money'] === 'yes') {
        $activePaymentMethod = 'Mobile Money';
    }
    elseif (isset($options['enable_crypto_money']) && $options['enable_crypto_money'] === 'yes') {
        $activePaymentMethod = 'Cryptocurrency';
    }
     elseif (isset($options['enable_p2p_payments']) && $options['enable_p2p_payments'] === 'yes') {
        // For P2P, get the exact account name
        $p2pAccounts = get_option('digages_direct_p2p_accounts');
        if (is_array($p2pAccounts) && !empty($p2pAccounts)) {
            $activePaymentMethod = $p2pAccounts[0]['p2p_name']; // Use the first P2P account's name
        }
    }

    // Print the active payment method name
    echo esc_html($activePaymentMethod);
    ?>
</span>
    </div>
    <div class="colt-2t xcsxt text-center ticonduzs"><i class="bi bi-x digages_add-order-to-cart-button" data-nonce="<?php echo esc_attr($nonce); ?>"></i></div>
  </div>
</div> 
</div>
    <!-- Top details -->
    <div class="colt dvvcsb">
        <div class="rowt">
                    <!-- <div class="colt-4">
                        <div class="rowt rowt-colts-1 rowt-colts-sm-1 rowt-colts-md-1">
                            <div class="colt dvvcs">Order:</div>
                            <div class="colt xzzs">#<span class="orderNumberDisplay">N/A</span></div>
                        </div>
                    </div> -->

                    <div class="colt-12 text-center xzzs">
                    <div class="rowt rowt-colts-1 rowt-colts-sm-1 rowt-colts-md-1">
                    <div class="colt tumaz_paaeer">Pay <span class="ppurl"><?php echo esc_html(wp_strip_all_tags(WC()->cart->get_total())); ?></span></div>
                    <div class="colt dvvcs text-truncate"><span class="tumaz_displayEmail"></span></div>
                    </div>
                    </div>
        </div>
    </div> 
    <div class="lpll"></div>
    
    <!-- Top details ends -->

    <!-- Payment details -->
    <div class="colt tab-content" id="myTabContent">

    <?php 
            // Determine the first available option
            $firstActiveTab = null;

            if (isset($options['enable_bank_transfers']) && $options['enable_bank_transfers'] === 'yes') {
                $firstActiveTab = 'bank'; // Set active tab to bank if enabled
            } elseif (isset($options['enable_mobile_money']) && $options['enable_mobile_money'] === 'yes') {
                $firstActiveTab = 'mobile'; // Set active tab to mobile if bank is not enabled
            } 
            elseif (isset($options['enable_crypto_money']) && $options['enable_crypto_money'] === 'yes') {
                $firstActiveTab = 'crypto'; // Set active tab to crypto if bank is not enabled
            } 
            elseif (isset($options['enable_p2p_payments']) && $options['enable_p2p_payments'] === 'yes') {
                $firstActiveTab = 'p2p'; // Set active tab to P2P if both bank and mobile are not enabled
            }
            ?>
        <!-- Bank transfer content -->
                    <?php if (isset($options['enable_bank_transfers']) && $options['enable_bank_transfers'] === 'yes') { ?>
                        <div class="tab-pane fade <?php echo $firstActiveTab === 'bank' ? 'show active' : ''; ?>" id="bank" role="tabpanel" aria-labelledby="tab-bank">
                            <div class="ppsj trstxt">
                                Transfer <b><?php echo esc_html(wp_strip_all_tags(WC()->cart->get_total())); ?></b> to the bank account details below
                            </div>
                                <select id="bankTransferSelect" class="form-select" hidden></select> 
                              <div id="hidden-payment-container">   
                                <div class="text-start bankt digage_stylenone"><?php include(plugin_dir_path(__FILE__) . 'btemail.php');?> </div>
                                <div class="text-start custbankt digage_stylenone"><?php include(plugin_dir_path(__FILE__) . 'custbtemail.php');?> </div>
                                
                                 </div>
                            <div class="ksllos">
                            <div class="text-start record-container" id="bankTransferRecords"></div>
                            <!-- <div class="border-wrapper"></div> -->
                            </div>
                            
                        
                        
            <div class="colt qqw">
                    <?php
// Fetch the saved instructions from the database
$instructions = get_option('digages_bank_transfer_instructions', '');

// Echo the instructions if available
if (!empty($instructions)) {
    echo esc_html(wp_strip_all_tags($instructions)); // wpautop() adds paragraph tags around the text for better formatting
} else {
    echo 'After making the payment, make sure you take a screenshot or save your receipt.';
}
?></div></div>
                    <?php } ?>

                     <!-- Mobile Money Content -->
                     <?php if (isset($options['enable_mobile_money']) && $options['enable_mobile_money'] === 'yes') { ?>
                        <div class="tab-pane fade <?php echo $firstActiveTab === 'mobile' ? 'show active' : ''; ?>" id="mobile" role="tabpanel" aria-labelledby="tab-mobile">
                            <div class="text-center ppsj trstxt">
                            Transfer <b><?php echo esc_html(wp_strip_all_tags(WC()->cart->get_total())); ?></b> to the mobile money account details below
                            </div>
                            <select id="mobileMoneySelect" class="form-select" hidden></select>
                              <div id="hidden-payment-container">   
                                <div class="text-start mmt digage_stylenone"><?php include(plugin_dir_path(__FILE__) . 'mmemail.php');?> </div>
                                <div class="text-start custmmt digage_stylenone"><?php include(plugin_dir_path(__FILE__) . 'custmmemail.php');?> </div>
                            </div>
                                 
                            <div class="ksllos">
                            <div class="text-start record-container" id="mobileMoneyRecords"></div>  
                            </div>  
                        
            <div class="colt qqw">
                    <?php
// Fetch the saved instructions from the database
$instructions = get_option('digages_mobile_transfer_instructions', '');

// Echo the instructions if available
if (!empty($instructions)) {
    echo esc_html(wp_strip_all_tags($instructions)); // wpautop() adds paragraph tags around the text for better formatting
} else { 
    echo 'After making the payment, make sure you take a screenshot or save your receipt.';
}
?></div>
                        </div>
                    <?php } ?>
                    


                     <!-- crypto Money Content -->
                     <?php if (isset($options['enable_crypto_money']) && $options['enable_crypto_money'] === 'yes') { ?>
                        <div class="tab-pane fade <?php echo $firstActiveTab === 'crypto' ? 'show active' : ''; ?>" id="crypto" role="tabpanel" aria-labelledby="tab-crypto">
                            <div class="text-center ppsj trstxt">
                            Transfer equivalent of <b><?php echo esc_html(wp_strip_all_tags(WC()->cart->get_total())); ?></b> to the wallet address below 
                            </div>
                            <select id="cryptoMoneySelect" class="form-select" hidden></select>
                              <div id="hidden-payment-container">   
                              <div class="text-start cet digage_stylenone"><?php include(plugin_dir_path(__FILE__) . 'cremail.php');?> </div>
                                <div class="text-start custcrt digage_stylenone"><?php include(plugin_dir_path(__FILE__) . 'custcremail.php');?> </div>
                            </div>
                                 
                            <div class="ksllos">
                            <div class="text-start record-container" id="cryptoMoneyRecords"></div>  
                            </div>  
                        
            <div class="colt qqw">
                    <?php
// Fetch the saved instructions from the database
$instructions = get_option('digages_crypto_transfer_instructions', '');

// Echo the instructions if available
if (!empty($instructions)) {
    echo esc_html(wp_strip_all_tags($instructions)); // wpautop() adds paragraph tags around the text for better formatting
} else { 
    echo 'After making the payment, make sure you take a screenshot or save your receipt.';
}
?></div>
                        </div>
                    <?php } ?>
                    
                    <!-- P2P Content -->
                   <!-- Display the P2P details in the content section --> 
<!-- P2P Content -->
<?php if (isset($options['enable_p2p_payments']) && $options['enable_p2p_payments'] === 'yes') { 
    // Fetch the P2P payment accounts data directly as an array
    $p2pAccounts = get_option('digages_direct_p2p_accounts');  
    $image_urlz = plugins_url('../assets/img/copy.svg', __FILE__); 

    // Check if the data is an array and not empty
    if (is_array($p2pAccounts) && !empty($p2pAccounts)) {
        foreach ($p2pAccounts as $index => $p2p) {
            $isFirst = ($index === 0); // Check if this is the first P2P account
            ?>
            <div class="tab-pane fade <?php echo $firstActiveTab === 'p2p' && $isFirst ? 'show active' : ''; ?>" 
                 id="p2p-<?php echo esc_attr(str_replace(' ', '-', $p2p['p2p_name'])); ?>" 
                 role="tabpanel" 
                 aria-labelledby="tab-p2p-<?php echo esc_attr(str_replace(' ', '-', $p2p['p2p_name'])); ?>">
                
                <div class="text-center ppsj trstxt">
                    Transfer <b><?php echo esc_html(wp_strip_all_tags(WC()->cart->get_total())); ?></b> 
                    to the <?php echo esc_html($p2p['p2p_name']); ?> account details below
                </div>

                <div id="hidden-payment-container">
                    <?php if ($isFirst) { // Only show these divs for the first P2P account ?>
                        <div class="text-start rec1n digage_stylenone"><?php include(plugin_dir_path(__FILE__) . 'p2p1.php');?></div>
                        <div class="text-start rec2t digage_stylenone"><?php include(plugin_dir_path(__FILE__) . 'p2p2.php');?></div>
                        <div class="text-start rec3i digage_stylenone"><?php include(plugin_dir_path(__FILE__) . 'p2p3.php');?></div>
                        <div class="text-start rec4a digage_stylenone"><?php include(plugin_dir_path(__FILE__) . 'p2p4.php');?></div>
                        <div class="text-start custp2p digage_stylenone"><?php include(plugin_dir_path(__FILE__) . 'custp2pemail.php');?></div>
                        <div class="text-start rec digage_stylenone"><?php include(plugin_dir_path(__FILE__) . 'p2pemail.php');?></div>
                    <?php } ?>
                </div>

                <div class="ksllos csdstumaz"> 
                    <div class="btssr3">
                        <div class="rowt">
                            <div class="colt-12">
                                <div class="rowt rowt-colts-1 rowt-colts-sm-1 rowt-colts-md-1">
                                    <div class="colt bdttcxt">PLATFORM</div>
                                    <div class="colt bdttcxtw ppname"><?php echo esc_html($p2p['p2p_name']); ?></div>
                                </div>
                            </div> 
                        </div>

                        <div class="colt tlks">
                            <div class="rowt rowt-colts-1 rowt-colts-sm-1 rowt-colts-md-1">
                                <div class="colt bdttcxt ppityp"><?php echo esc_html($p2p['account_type']); ?></div>
                                <div class="colt bdttcxtw">
                                    <div class="rowt digagescopy-container">
                                        <div class="colt-10 ppid digages_breakword digagestext-to-copy"><?php echo esc_html($p2p['account_id']); ?></div> 
                                        <div class="colt-2t digagescopy-button tumaz_hand_pointer">  
                                        <?php
                                        // phpcs:disable PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage
                                        ?> 
                                            <span class=""><img src="<?php echo esc_url($image_urlz) ?>" /></span>
                                            <?php
                                            // phpcs:enable
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="colt tlks">
                            <div class="rowt rowt-colts-1 rowt-colts-sm-1 rowt-colts-md-1">
                                <div class="colt bdttcxt">AMOUNT</div>
                                <div class="colt bdttcxtw">
                                    <div class="rowt digagescopy-container">
                                        <div class="colt-10">
                                            <?php echo esc_html(wp_strip_all_tags(WC()->cart->get_total())); ?><span class="digagestext-to-copy" style="display: none;"><?php echo esc_html(wp_strip_all_tags(WC()->cart->get_cart_contents_total())); ?> </span>
                                        </div> 
                                        <div class="colt-2t digagescopy-button tumaz_hand_pointer">
                                        <?php
                                        // phpcs:disable PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage
                                        ?>
                                            <span class=""><img src="<?php echo esc_url($image_urlz) ?>" /></span>
                                            <?php
                                            // phpcs:enable
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="colt tlks">
                            <div class="rowt rowt-colts-1 rowt-colts-sm-1 rowt-colts-md-1">
                                <div class="colt bdttcxt">ACCOUNT NAME</div>
                                <div class="colt bdttcxtw ppcnme"><?php echo esc_html($p2p['account_name']); ?></div> 
                            </div>
                        </div>
                    </div>
                </div>

                <div class="colt qqw tumaz_ppsss">
                    <?php
                    $instructions = get_option('digages_p2p_transfer_instructions', '');
                    if (!empty($instructions)) {
                        echo esc_html(wp_strip_all_tags($instructions));
                    } else {
                        echo 'After making the payment, make sure you take a screenshot or save your receipt.';
                    }
                    ?>
                </div>
            </div>
            <?php
        }
    }
} ?>


    </div>


  
                        <div class="colt text-center kfls"> 
                            <button type="button" class="ppopbtn" id="nextToStep2">I have sent the money</button>
                        </div>
                        <div class="colt text-center kllftyesp d-sm-none"><span class="chaaanqaz goback"><i class="bi bi-arrow-repeat"></i> Change payment method</span></div>
  </div>
    </div> 
 

</div>
</div>
<?php
// Enqueue the jQuery script
function digages_enqueue_scriptsnn() { 
    wp_enqueue_script(
        'digages-pop-copy-script', // Handle
        plugin_dir_url(__FILE__) . 'popcopy.js', // Path to your script
        array('jquery'), // Dependencies
        '1.5.1', // Version number
        true // Load in footer
    );

    
    wp_enqueue_script(
        'digages-pop-copycryp-script', // Handle
        plugin_dir_url(__FILE__) . 'popcopycryp.js', // Path to your script
        array('jquery'), // Dependencies
        '1.5.1', // Version number
        true // Load in footer
    );

    wp_enqueue_script(
        'digages-pop-copymob-script', // Handle
        plugin_dir_url(__FILE__) . 'popcopymob.js', // Path to your script
        array('jquery'), // Dependencies
        '1.5.1', // Version number
        true // Load in footer
    ); 
    
    wp_enqueue_script(
        'digages-pop-copybank-script', // Handle
        plugin_dir_url(__FILE__) . 'popcopybank.js', // Path to your script
        array('jquery'), // Dependencies
        '1.5.1', // Version number
        true // Load in footer
    );
}
add_action('wp_footer', 'digages_enqueue_scriptsnn');

?>
 
