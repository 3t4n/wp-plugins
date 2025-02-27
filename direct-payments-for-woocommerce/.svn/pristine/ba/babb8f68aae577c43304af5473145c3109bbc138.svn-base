
<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}    

 
// Fetch saved p2p accounts from the database or settings
$saved_p2p_accounts = get_option('digages_direct_p2p_accounts', array());

// Fetch saved title and instructions
$title = sanitize_text_field(get_option('digages_p2p_transfer_title', 'P2P Transfer')); // Sanitize the title
$instructions = sanitize_textarea_field(get_option('digages_p2p_transfer_instructions', 'After making the payment, make sure you take a screenshot or save your receipt.')); // Sanitize the instructions


// Handle form submission
if ( isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST' && 
    isset($_POST['p2p_transfer_nonce']) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['p2p_transfer_nonce'])), 'save_p2p_transfer_settings') ) {
      
    // Sanitize and save title
   // Check if title and instructions are set before using them
   if ( isset($_POST['digages_p2p_transfer_title']) ) {
    // Unsplash and sanitize title
    $new_title = sanitize_text_field(wp_unslash($_POST['digages_p2p_transfer_title'])); // Unsplash before sanitization
    update_option('digages_p2p_transfer_title', $new_title);
}

    // Sanitize and save instructions

    if ( isset($_POST['digages_p2p_transfer_instructions']) ) {
        // Unsplash and sanitize instructions
        $new_instructions = sanitize_textarea_field(wp_unslash($_POST['digages_p2p_transfer_instructions'])); // Unsplash before sanitization
        update_option('digages_p2p_transfer_instructions', $new_instructions);
    }
    
    // Display success message
     echo '<div class="updated notice"><p>Settings saved successfully! Refreshing...</p></div>'; 
}
?>

<div class="tumaz-direct-container"> 
<div class="wrap">
    <h1><b>Peer-to-Peer</b></h1><br/>

    <form method="post" action="">
        <?php wp_nonce_field('save_p2p_transfer_settings', 'p2p_transfer_nonce'); ?>

    <div class="text-start">
  <div class="rowt">
    <div class="colt-12 colt-sm-3 colt-md-3 colt-lg-3 llbd"><label for="p2p_transfer_title">Title</label></div>
    <!-- <div class="colt-2t"></div> -->
    <div class="colt-12 colt-sm-9 colt-md-9 colt-lg-9 rrwtp"><input type="text" name="digages_p2p_transfer_title" value="<?php echo esc_attr($title); ?>" readonly /></div>
  </div>
</div>


<div class="text-start">
  <div class="rowt">
    <div class="colt-12 colt-sm-3 colt-md-3 colt-lg-3 llbd"><label for="p2p_transfer_instructions">Instructions</label></div>
    <!-- <div class="colt-2t"></div> -->
    <div class="colt-12 colt-sm-9 colt-md-9 colt-lg-9 rrwtp"><textarea name="digages_p2p_transfer_instructions" class="digage_widthmodalbord"><?php echo esc_textarea($instructions); ?></textarea></div>
  </div>
</div>



<div class="text-start">
  <div class="rowt">
    <div class="colt-12 colt-sm-3 colt-md-3 colt-lg-3">
  <div class="rowt rowt-colts-1 rowt-colts-sm-1 rowt-colts-md-1">
    <div class="colt rrwtp llbd">Peer-to-Peer details</div>
    <div class="colt rrwtp">Add the peer-to-peer platforms your customers can use for payments.</div>
    <div class="colt rrwtp">
        <button type="button" id="add_account_button" class="trddbtnot22" data-bs-toggle="digages_popup" data-bs-target="#digages_addform" > <i class="bi bi-plus"></i> Add Account</button>
    </div>
  </div>
    </div>
    
    <!-- <div class="colt-2t"></div> -->
    <div class="colt-12 colt-sm-9 colt-md-9 colt-lg-9 rrwtp table-responsive">
        
    <table class="wp-list-table widefat striped">
    <thead>
        <tr>
            <th class="teeb">P2P Details</th> 
            <th class="teeb">ID</th> 
            <th class="teeb">Status</th> 
            <th class="teeb text-end"><span class="btact" data-bs-toggle="digages_popup" data-bs-target="#digages_addform" ><i class="bi bi-plus"></i></span></th> <!-- Add this coltumn for action buttons -->
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($saved_p2p_accounts)): ?>
            <?php foreach ($saved_p2p_accounts as $index => $account): ?>
                <tr>
                    <td>  
                        <span class=""><?php echo esc_html($account['p2p_name']); ?></span><br/>
                        <span class="acntname text-uppercase"><?php echo esc_html($account['account_name']); ?></span>
                      
                    </td> 
                    
     <td><?php echo esc_html($account['account_id']); ?></td>
    <td>
    <input type="checkbox" id="tbkp" name="status" 
           value="1" 
           class="form-check-input" 
           data-account="<?php echo esc_attr($index); ?>" 
           <?php checked($account['enabled'], 1); ?> checked disabled>
    </td>


    <td class="text-end">

    <span class="eedtbt edit-account" data-index="<?php echo esc_attr($index); ?>" data-bs-toggle="modal" data-bs-target="#editAccountModal">Edit</span> | 
    <span class="edeletbt delete-account" data-index="<?php echo esc_attr($index); ?>">Delete</span>

                    </td>  
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
          
            <td colspan="4">
                <div class="container text-center digages_no_recordstable d-none d-sm-block">
  <div class="rowt rowt-colts-1 rowt-colts-sm-1 rowt-colts-md-1"> 
    <div class="colt">Start by adding a P2P account below to accept payments via P2P transfer.<br/><br/></div>
    <div class="colt">
        <button type="button" id="add_account_button" class="trddbtnot22" data-bs-toggle="digages_popup" data-bs-target="#digages_addform" > <i class="bi bi-plus"></i> Add Account</button>
    </div>

  </div>
</div>    
</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

</div>


</div>
</div>
 
<!-- Add Account Button -->

<div class="text-start">
  <div class="rowt rowt-colts-1 rowt-colts-sm-1 rowt-colts-md-1">
    <div class="colt"> <p class="submit">
            <button type="submit" class="trddbtn">Save Changes</button>
        </p></div>
  </div>
</div>
 
    </form>
</div>

<!-- Modal -->
  
<?php
include plugin_dir_path(__FILE__) . 'edit-form.php';
?>
    <form id="p2p_account_form">

    <!-- for popup -->

    <div id="digages_addform" class="digages_popup">
    <div class="digagesmaincontainer">  
      
        <div class="digages_popup-content digagesmaincenter"> 

        
        <div class="modhe"> 

        <div class="container text-center">
  <div class="rowt">
    <div class="colt-6 text-start mtttp"><span class="xcsse" id="staticBackdropLabel">Add P2P Account</span></div>
    <div class="colt-5 text-end mtttp"><span class="astre">*</span> are required</div>
    <div class="colt-1t xcs"><span class="digages_close"><i class="bi bi-x"></i></div>
  </div>
</div>

      </div>
       
      <?php
      if (count($saved_p2p_accounts) < 1) {
            include plugin_dir_path(__FILE__) . 'modal.php';
            }  
            else {
              include plugin_dir_path(__FILE__) . 'modal2.php';
            } 
            ?>

</div>
</div>
          </div>
    </form>