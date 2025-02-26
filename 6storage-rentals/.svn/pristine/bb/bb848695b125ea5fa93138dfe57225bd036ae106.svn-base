<?php
    use SixStorageOnline\Base\Six_Storage_SettingsKeys;
    $obj = new Six_Storage_SettingsKeys(); 
?>
<style>
     .six-storage-primary-background-color{
          background-color:<?php echo esc_html(get_option($obj->six_storage_online_primary_color)); ?> !important;
     }
     .six-storage-secondary-background-color{
          background-color:<?php echo esc_html(get_option($obj->six_storage_online_secondary_color)); ?> !important;
     }

     .six-storage-primary-color{
          color:<?php echo esc_html(get_option($obj->six_storage_online_text_color)); ?> !important;
     }
     .six-storage-secondary-color{
          color:<?php echo esc_html(get_option($obj->six_storage_online_text_color)); ?> !important;
     }

     .six-storage-primary-border-bottom-color{
          border-bottom-color:<?php echo esc_html(get_option($obj->six_storage_online_primary_color)); ?> !important;
     }
     .six-storage-secondary-border-bottom-color{
          border-bottom-color:<?php echo esc_html(get_option($obj->six_storage_online_secondary_color)); ?> !important;
     }

     .six-storage-primary-border-left-color{
          border-left-color:<?php echo esc_html(get_option($obj->six_storage_online_primary_color)); ?> !important;
     }
     .six-storage-secondary-border-left-color{
          border-left-color:<?php echo esc_html(get_option($obj->six_storage_online_secondary_color)); ?> !important;
     }

     .six-storage-primary-border-color{
          border-color:<?php echo esc_html(get_option($obj->six_storage_online_primary_color)); ?> !important;
          color:<?php echo esc_html(get_option($obj->six_storage_online_primary_color)); ?> !important;
     }
     .six-storage-secondary-border-color{
          border-color:<?php echo esc_html(get_option($obj->six_storage_online_secondary_color)); ?> !important;
          color:<?php echo esc_html(get_option($obj->six_storage_online_secondary_color)); ?> !important;
     }

     .six-storage-primary-background{
          background:<?php echo esc_html(get_option($obj->six_storage_online_primary_color)); ?> !important;
     }
     .six-storage-secondary-background{
          background:<?php echo esc_html(get_option($obj->six_storage_online_secondary_color)); ?> !important;
     }


</style>

<div id="six-storage-sign-up-one-load-container" class="six-storage-online-root-class" style="display:none;">
     <div id="six-storage-sign-up-short-code" class="six-storage-grid-container">
          <div class="six-storage-grid-container">
               <?php 
                    if (function_exists('pll_get_post')) {
                         $dashboard_translated_Page = get_permalink(pll_get_post(get_option('six_storage_sign_in_page_id')));
                         echo "<input type='hidden' id='six-storage-signin-url' value=". esc_attr($dashboard_translated_Page).">";
                    }
                    else{
                         $dashboard_url = get_permalink(get_option('six_storage_sign_in_page_id'));
                         echo "<input type='hidden' id='six-storage-signin-url' value=". esc_attr($dashboard_url).">";
                    }
               ?>
               <div  id="six-storage-loading-container" style="display: none"></div>
               <div class="six-storage-grid-row six-storage-row cc" id="six-storage-unit-lists">
                    <h5 class="cc six-storage-fs-title six-storage-text-center six-storage-secondary-color" id="six-storage-signup_header"><!--Sign Up--><?php esc_html_e('Sign Up','6storage-rentals'); ?></h5>
                    <hr class="six-storage-grid-title-hr six-storage-grid-d-flex six-storage-secondary-border-bottom-color">
                    <div class="six-storage-s12 six-storage-col">
                         <form onsubmit="event.preventDefault()" class="border-0 six-storage-grid-shadow-md cc six-storage-sign-up-form" autocomplete="off" data-url="<?php echo esc_attr(admin_url('admin-ajax.php')) ?>" id="six-storage-template-ajax-url" action="post" data-culture="<?php echo esc_attr(json_decode(get_option("six_storage_online_api_culture"), true)['culture']) ?>">

                       
    
                         <!-- Hubspot Ignore Form -->
 
                         <label for="cc-num" style="display:none;">credit card HubspotCollectedFormsWorkaround</label>
                              <input name="cc-num" style="display:none;" required="" value="HubspotCollectedFormsWorkaround" id="cc-num" />
                              <!--  -->


                         <div class="six-storage-form-row six-storage-row cc" id="six-storage-signUp_container">
                                   <div class="six-storage-s12 six-storage-col">
                                        <div class="six-storage-input-field cc" data-element_required="'true'">
                                             <i class="six-storage-material-icons notranslate six-storage-prefix six-storage-grey-text">perm_identity</i>
                                             <input type="text" class="cc" id="six-storage-firstName" aria-describedby="six-storage-inputGroupPrepend" autocomplete="none" />
                                             <label  for="six-storage-firstName"><!--First Name--><?php esc_html_e('First Name','6storage-rentals'); ?></label>
                                             <div style="display: none;" id="six-storage-firstName-err" class="six-storage-invalid-feedback">
                                                  <!-- Please Enter First Name --> <?php esc_html_e('Please Enter First Name','6storage-rentals'); ?>
                                             </div>
                                        </div>
                                   </div>
                                   <div class="six-storage-s12 six-storage-col">
                                        <div class="six-storage-input-field cc" data-element_required="'true'">
                                             <i class="six-storage-material-icons notranslate six-storage-prefix six-storage-grey-text">perm_identity</i>
                                             <input type="text" class="cc" id="six-storage-lastName" aria-describedby="six-storage-inputGroupPrepend" autocomplete="none" />
                                             <label  for="six-storage-lastName"><!--Last Name--><?php esc_html_e('Last Name','6storage-rentals'); ?></label>
                                             <div style="display: none;" id="six-storage-lastName-err" class="six-storage-invalid-feedback">
                                                  <!--Please Enter Last Name--> <?php esc_html_e('Please Enter Last Name','6storage-rentals'); ?>
                                             </div>
                                        </div>
                                   </div>
                                   <div class="six-storage-s12 six-storage-col">
                                   <div class="six-storage-input-field cc" data-element_required="'true'">
                                        <i class="six-storage-material-icons notranslate six-storage-prefix six-storage-grey-text ">email</i>
                                        <input type="text" class="cc" id="six-storage-email" aria-describedby="six-storage-inputGroupPrepend" autocomplete="none" maxlength="100" />
                                        <label  for="six-storage-email"><!--Email--><?php esc_html_e('Email','6storage-rentals'); ?></label>
                                        <div style="display: none;" id="six-storage-email-err" class="six-storage-invalid-feedback">
                                             <!--Please Enter Email--> <?php esc_html_e('Please Enter Email','6storage-rentals'); ?>
                                        </div>
                                   </div>
                                   </div>
                                   <div class="six-storage-s12 six-storage-col">
                                   <div class="six-storage-input-field cc" data-element_required="'true'">
                                        <i class="six-storage-material-icons notranslate six-storage-prefix six-storage-grey-text">email</i>
                                        <input type="text" class="cc" id="six-storage-confirmEmail" aria-describedby="six-storage-inputGroupPrepend"  autocomplete="none" maxlength="100" />
                                        <label  for="email"><!--Confirm Email--><?php esc_html_e('Confirm Email','6storage-rentals'); ?></label>
                                        <div style="display: none;" id="six-storage-confirmEmail-err" class="six-storage-invalid-feedback">
                                             <!--Please Enter Confirm Email--> <?php esc_html_e('Please Enter Confirm Email','6storage-rentals'); ?>
                                        </div>
                                   </div>
                                   </div>
                                   <div class="six-storage-s12 six-storage-col">
                                        <div class="six-storage-input-field cc" data-element_required="'true'">
                                        <i class="six-storage-material-icons notranslate six-storage-prefix six-storage-grey-text">person</i>
                                        <input type="text" class="cc" id="six-storage-signupUserName" aria-describedby="six-storage-inputGroupPrepend"  autocomplete="none" />
                                        <label  for="six-storage-signupUserName"><!--Username--><?php esc_html_e('Username','6storage-rentals'); ?></label>
                                        <div style="display: none;" id="six-storage-signupUserName-err" class="six-storage-invalid-feedback sixstorageSignupUsernamealign">
                                             <!--Please Enter Username--> <?php esc_html_e('Please Enter Username','6storage-rentals'); ?>
                                        </div>
                                        </div>
                                   </div>
                                   <div class="six-storage-s12 six-storage-col">
                                        <div class="six-storage-input-field cc" data-element_required="'true'">
                                             <div class="six-storage-flex-nowrap six-storage-grid-d-flex">
                                                  <div class="six-storage-grid-input-group-prepend six-storage-border0 six-storage-bg-white">
                                                       <span class="six-storage-grid-input-group-text six-storage-grid-pl0 six-storage-border0 six-storage-bg-white" id="six-storage-inputGroupPrepend "><i class="six-storage-material-icons notranslate six-storage-grey-text">phone</i></span>
                                                  </div>
                                                  <input id="six-storage-phone" class="cc six-storage-telephone" type="tel" data-element_required="true" />
                                                  <label class="six-storage-active cc six-storage-signup-phonelabel" id="six-storage-mobilelabel">
                                                       <!--Phone--> <?php esc_html_e('Phone','6storage-rentals'); ?> 
                                                  </label>
                                             </div>
                                             <div style="display: none;" id="six-storage-phone-err" class="six-storage-invalid-feedback">
                                                  <!--Please Enter Phone Number--> <?php esc_html_e('Please Enter Phone Number','6storage-rentals'); ?>
                                             </div>
                                        </div>
                                   </div>
                                   <div class="six-storage-s12 six-storage-col">
                                        <div class="six-storage-input-field cc six-storage-password-type-toggle" data-element_required="'true'">
                                             <i class="six-storage-material-icons notranslate six-storage-prefix six-storage-grey-text">fingerprint</i>
                                             <input type="password" class="cc" id="six-storage-password" aria-describedby="six-storage-inputGroupPrepend" maxlength="12" autocomplete="none" />
                                             <label  for="six-storage-password"><!--Password--> <?php esc_html_e('Password','6storage-rentals'); ?></label>
                                             <a class="six-storage-waves-effect six-storage-prefix six-storage-password-icon  six-storage-grid-shadow-none six-storage-transparent six-storage-text-center six-storage-right-0"><i class="six-storage-material-icons notranslate six-storage-grey-text" toggle="six-storage-password" onclick="return sixStorageTogglePasswordVisibility(this);">remove_red_eye</i></a>
                                             <div style="display: none;" id="six-storage-password-err" class="six-storage-invalid-feedback">
                                                  <!--Please Enter Password--> <?php esc_html_e('Please Enter Password','6storage-rentals'); ?> 
                                             </div>
                                        </div>
                                   </div>
                                   <div class="six-storage-s12 six-storage-col">
                                        <div class="six-storage-input-field cc six-storage-password-type-toggle" data-element_required="'true'">
                                             <i class="six-storage-material-icons notranslate six-storage-prefix six-storage-grey-text">fingerprint</i>
                                             <input type="password" class="cc" id="six-storage-confirmPassword" aria-describedby="six-storage-inputGroupPrepend" maxlength="12" autocomplete="none" />
                                             <label  for="six-storage-confirmPassword"><!--Confirm Password--> <?php esc_html_e('Confirm Password','6storage-rentals'); ?></label>
                                             <a class="six-storage-waves-effect six-storage-password-icon six-storage-prefix  six-storage-grid-shadow-none six-storage-transparent six-storage-text-center six-storage-right-0"><i class="six-storage-material-icons notranslate six-storage-grey-text" toggle="six-storage-confirmPassword" onclick="return sixStorageTogglePasswordVisibility(this);">remove_red_eye</i></a>
                                             <div style="display: none;" id="six-storage-confirmPassword-err" class="six-storage-invalid-feedback">
                                                  <!--Please Enter Confirm Password--> <?php esc_html_e('Please Enter Confirm Password','6storage-rentals'); ?>
                                             </div>
                                        </div>
                                   </div>
                                   <div class="six-storage-s12 six-storage-col" id="six-storage-terms">
                                        <div class="six-storage-input-field cc six-storage-checkbox-msg" >
                                             <p class="cc sixStorageTerms six-storage-grid-mb0 six-storage-grid-ml15">
                                                  <label class="cc" for="six-storage-terms-checkbox"> 
                                                       <input type="checkbox" value='1' id='six-storage-terms-checkbox' class="cc" />
                                                       <span class="six-storage-field_label cc"><a class="six-storage-terms-and-conditions-model cc" id="six-storage-terms-modal-btn" href="javascript:void(0)" onclick="sixStorageTermsAndConditionsModel();"><!-- Terms and conditions wording --> <?php esc_html_e('Terms and Conditions','6storage-rentals'); ?></a></span>
                                                       <div style="display: none;" id="six-storage-terms-checkbox-err" class="six-storage-invalid-feedback">
                                                            <!--Please Accept the Terms and Conditions --> <?php esc_html_e('Please Accept the Terms and Conditions','6storage-rentals'); ?>
                                                       </div>
                                                  </label>
                                             </p>
                                             <div id="six-storage-terms-mymodal" class="six-storage-terms-modal" style="display:none">
                                                  <!-- Modal content -->
                                                  <div class="six-storage-terms-modal-content">
                                                       <span class="six-storage-terms-close">&times;</span>
                                                       <div class="six-storage-terms-msg">
                                                            <p class= "cc" ><?php esc_html_e('By clicking "Sign Up", you agree to our Terms of Use and Privacy Policy. You consent to receive phone calls and SMS messages from us to provide updates on your order and/or for marketing purposes. Message frequency depends on your activity. You may opt-out by texting "STOP" to 86753. Message and data rates may apply.','6storage-rentals')?></p>
                                                       <div>
                                                  </div>
                                             </div>
                                             <script>
                                                  // for us
                                                  var storageTerms=document.querySelector(".sixStorageTerms");
                                                  if(window.sixStorage_online_region=="eu"){
                                                       storageTerms.style.display="none";
                                                  }
                                                  // Get the modal
                                                  var modal = document.getElementById("six-storage-terms-mymodal");

                                                  // Get the button that opens the modal
                                                  var btn = document.getElementById("six-storage-terms-modal-btn");

                                                  // Get the <span> element that closes the modal
                                                  var span = document.getElementsByClassName("six-storage-terms-close")[0];

                                                  // When the user clicks the button, open the modal 
                                                  btn.onclick = function sixStorageTermsAndConditionsModel() {
                                                       modal.style.display = "block";
                                                  }

                                                  // When the user clicks on <span> (x), close the modal
                                                  span.onclick = function sixStorageTermsAndConditionsModel() {
                                                       modal.style.display = "none";
                                                  }

                                                  // When the user clicks anywhere outside of the modal, close it
                                                  window.onclick = function(event) {
                                                       if (event.target == modal) {
                                                            modal.style.display = "none";
                                                       }
                                                  }
                                             </script>
                                        </div> 
                                   </div>
                                   <div class="six-storage-s12 six-storage-col six-storage-grid-mt15">
                                        <div class="six-storage-text-center six-storage-clearfix six-storage-grid-pb15">
                                             <button class="six-storage-waves-effect six-storage-waves-light six-storage-btn cc six-storage-primary-background-color six-storage-signupsubmit-btn" id="six-storage-sign-up-btn" type="submit">
                                                  <!--Sign up--> <?php esc_html_e('Sign Up','6storage-rentals'); ?>
                                             </button>
                                        </div>
                                   </div>
                              </div>
                              <div class="six-storage-grid-alert-danger six-storage-text-center" style="display: none;position:relative;bottom:20px;" id="six-storage-sign-up-response"></div>
                         </form>
                    </div>
               </div>
          </div>
          <div class="six-storage-modal" id="six-storage-browser-compatibility-modal" style="display:none">
               <div class="six-storage-modal-container-header">
                    <div class="six-storage-title">
                         <!--Better Browser, Better Experience--> <?php esc_html_e('Better Browser, Better Experience','6storage-rentals'); ?>
                    </div>
                    <div>
                         <button id="six-storage-browser-comp-btn" class="six-storage-modal-close six-storage-waves-effect six-storage-waves-red six-storage-btn-flat cc">&times;</button>
                    </div>
               </div>
               <div class="six-storage-modal-content six-storage-text-center" id="six-storage-browser-compatibility-Body">
                    <img class="cc" width="300" src=" <?php echo esc_attr(SIX_STORAGE_PLUGIN_FILE) ?>/assets/images/undraw_mobile_browsers_lib5.svg" alt="Browser Compatiblity ">
                    <p class="cc six-storage-grey-text six-storage-grid-mt15 six-storage-text-title"><!--Improve your experience, in one of the up to date version of the chrome, Firefox and Edge--> <?php esc_html_e('Improve your experience, in one of the up to date version of the chrome, Firefox and Edge ','6storage-rentals'); ?></p>

                    <button class="six-storage-waves-effect six-storage-waves-light six-storage-btn cc secondary six-storage-modal-close" onclick="localStorage.setItem('ieBrowserLoaded', true);" id="six-storage-browser-comp-btn"><!--Ok--><?php esc_html_e('Ok','6storage-rentals'); ?></button>
               </div>
          </div>
          <!-- Modal Structure -->
          <div class="six-storage-alert-wrapper six-storage-d-none" id="six-storage-success-msg">
               <div class="six-storage-alert-box green six-storage-lighten-1 six-storage-grid-d-flex six-storage-justify-content-between  six-storage-align-items-center" id="six-storage-dv-alert">
                    <div class="six-storage-text-section six-storage-grid-d-flex six-storage-align-items-center">
                         <div class="six-storage-icon-alert-box green six-storage-lighten-3 six-storage-rounded-circle six-storage-grid-mr10 six-storage-grid-d-flex six-storage-align-items-center six-storage-justify-content-center">
                              <i class="six-storage-material-icons notranslate six-storage-white-text six-storage-font-size-30" id="six-storage-alert-icon">thumb_up</i>
                         </div>
                         <p class="cc six-storage-alert-text six-storage-font-weight-bold six-storage-grid-m0 six-storage-white-text six-storage-alert-message" id="six-storage-alert-message"><!--Successfully Updated--> <?php esc_html_e('Successfully Updated','6storage-rentals'); ?></p>
                    </div>
                    <div class="six-storage-action-close" onclick="sixStorageCloseAlert();">
                         <a class="six-storage-btn-floating six-storage-btn-large six-storage-waves-effect six-storage-waves-light six-storage-transparent six-storage-icon-alert-box six-storage-flexbox-important six-storage-align-items-center six-storage-justify-content-center six-storage-rounded-circle six-storage-text-decoration-none">
                              <i class="six-storage-material-icons notranslate six-storage-white-text">close</i>
                         </a>
                    </div>
               </div>
          </div>
     </div>         
   </div>
   </div>
          <div class="six-storage-row cc">
                <div class="cc six-storage-col six-storage-s12 six-storage-m12 six-storage-brand-name-div">
                <p class="cc six-storage-poweredBysignupfooter sixStoragefloatright"><b> Powered by </b> <a class="cc" href="https://www.6storage.com/" target="_blank">6Storage</a>
               </div>
           </div> 
      </div>


