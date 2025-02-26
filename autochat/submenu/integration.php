<?php
// if (isset($_GET['edit'])) {
//     $view = $_GET['edit'];

//     // Load different content based on the value of the 'view' parameter
//     switch ($view) {
//         case 'edit-page':
//             include_once(plugin_dir_path(__FILE__) . 'edit/edit_common.php');
//             die();
//             break;
//             // Add more cases for additional views as needed
//         default:
//             // Default case, load a default view or show an error message
//             echo 'Invalid view parameter.';
//     }
// } else {
//     // Default view or landing page content goes here
    
// }
// $admin_url        = admin_url('admin.php');

// $common_setting_page_url = add_query_arg(
//     array(
//         'page'     => 'chat_integration',
//         'edit'     => 'edit-page',
//     ),
//     $admin_url
// );

if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
    $tawk_to_script = ($_POST['tawk_to_script']);
    update_option('tawk_to_script', wp_unslash($tawk_to_script));
    //update_option('tawk_chat_feature',$_POST['tawk_chat_feature']);
     //update_option('tawk_title',$_POST['tawk-title']);
    echo '<div class="notice notice-success is-dismissible"><p>Script saved successfully.</p></div>';
}
$tawkScript = get_option('tawk_to_script');

?>
<div class="ac-main-wrapper" >
   <h3 class="border-bottom section-padding">Integrations</h3>
   <!-- AUTO CHAT NEW SETTINGS PAGE -->
  <form method="post" action="">
   <div class="flex-layout primary-bg">
       
      <div class="autochat flex-layout">
         <div class="ac-integration-logo">
            <img src="<?php echo plugins_url('assets/images/tawk_logo.png', PCH_FILE); ?>" alt="Tawk.to logo">
         </div>
         <div class="ac-integration-title">
            <h4>Tawk.to</h4>
            <p>By activating Autochat, a chatbox will appear on your websites</p>
         </div>
      </div>
      <!-- popup markup start -->
       <?php if(( empty($tawkScript) )){ ?> 
         <div class="autochat-input-area tawk-connect-button-display">
            <a href="#" class="autochat-button tawk-connect-button">Connect</a>
         </div>
      <?php } else{ ?>
         
      <div class="ac-integration-manage-display">
         <div class="ac-integration-manage flex-layout">
            <!-- <div class="ac-input-area tawk-manage-toggle">
               <label class="switch">
               <input type="hidden" name="achat-enable" id="achat-enable-hidden" value="1">
               <input id="enable_chat" type="checkbox" name="enable_chat_feature" <?php //echo get_option('') == 1 ? 'checked' : ''; ?> class="achat-form-toggle-input">
               <span class="slider round"></span>
               </label>
            </div> -->
            <div class="autochat-input-area manage-button">
               <a class="autochat-button tawk-manage-button">Manage</a>
            </div>
         </div>
      </div>
      <!-- First Popup -->
      <?php }?>
      <div id="autochat-popup1" class="autochat-popup-overlay">
         <div class="autochat-popup-content">
            <div class="popup-title-area">
               <div class="autochat-popup-title">
                  <h3>Connect Tawk.to</h3>
               </div>
               <div class="popup-close">
                  <span class="autochat-close">&times;</span>
               </div>
            </div>
            <hr>
            <div class="popup-content-inner">
                <div class="popup-manage-content-padding">
                    <label for="">Paste Code</label>
                    <textarea id="autochat-tawk-input" name="tawk_to_script" placeholder="Enter something..."><?php echo $tawkScript;?></textarea>   
                </div>
                <div class="autochat-popup-footer-buttons">
                  <div class="ac-popup-left-button">
                     <span id="autochat-reset-1" class="reset-btn">Reset</span>
                  </div>
                  <div class="ac-popup-right-button">
                     <a href="#" id="autochat-cancel" class="autochat-button">Cancel</a>
                     <a href="#" id="autochat-connect-tawk">Connect Tawk.to</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
     
      <!-- Second Popup -->
       
      <div id="autochat-popup2" class="autochat-popup-overlay">
         <div class="autochat-manage-popup-content">
            <div class="popup-title-area">
               <div class="autochat-popup-title">
                  <h3>Manage Tawk.to</h3>
               </div>
               <div class="popup-close">
                  <span class="autochat-close">&times;</span>
               </div>
            </div>
            <hr>
            <div class="popup-manage-content-inner">
               <div class="popup-manage-content-padding">
                <div class="manage-popup-activation-area">
                    <!-- <div class="manage-popup-activate">
                        <label class="switch">
                            <input type="hidden" name="achat-enable" id="achat-enable-hidden" value="0">
                            <input id="enable_chat" type="checkbox" name="tawk_chat_feature" <?php //echo get_option('tawk_chat_feature') == 1 ? 'checked' : ''; ?> class="achat-form-toggle-input">
                            <span class="slider round"></span>
                        </label>
                    </div> -->
                    <div class="manage-popup-activation-text">
                        <h4>Activate Tawk.to</h4>
                        <p>By activating Autochat, a chatbox will appear on your websites</p>
                    </div>
                </div>
                <span class="ac-space-divider"></span>
                <!-- <div class="manage-popup-title-area">
                    <label for="">Title</label>
                    <br>
                    <input type="text" name="tawk-title" placeholder="Write your text" value="<?php //echo get_option('tawk_title');?>">
                </div> -->
                <!-- <div class="manage-popup-bubble-logo">
                    <label for="">Bubble Logo</label>
                    <br>
                    <input type="file" placeholder="">
                </div> -->
                <div class="manage-popup-channel-showon">
                    <label for="">Channel Show on</label>
                    <br>
                    <input type="checkbox" placeholder="" id="ac-desktop"><label for="ac-desktop">Desktop</label>
                    <input type="checkbox" placeholder="" id="ac-mobile"><label for="ac-mobile">Mobile</label>
                </div>
                
               </div>
               <span class="ac-space-divider"></span>
                <div class="autochat-popup-footer-buttons">
                    <div class="ac-popup-left-button">
                        <span id="autochat-reset" class="ac-remove-btn">Remove Tawk.to</span>
                    </div>
                    <div class="ac-popup-right-button">
                        <button id="autochat-manage-cancel" class="autochat-button">Cancel</button>
                        <button id="autochat-connect-tawk">Save Changes</button>
                    </div>
                </div>
            </div>
         </div>
      </div>
      
   </div>
  
   <!-- popup markup end -->
 </form>
</div>


