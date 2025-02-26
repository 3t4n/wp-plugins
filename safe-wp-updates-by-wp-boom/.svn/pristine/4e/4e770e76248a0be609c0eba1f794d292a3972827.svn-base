<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<div class="modal modal-lg fade" id="settingsModal" tabindex="-1" aria-labelledby="settingsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header  bd-gray-500">
        <h1 class="modal-title fs-5" id="settingsModalLabel">Settings</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="lead">If you have a WP Boom account you can enter an API Token here. Your API token can be located on your site page at <a target="_blank" href="<?php echo esc_url(WPBOOM_URL); ?>"><?php echo wp_kses_post(WPBOOM_URL); ?></a> in the upper-right corner. Otherwise, you can reset by clicking 'Deactivate API Token'.</p>

        <p class="lead">The API token must be for this site: <a href="<?php echo esc_url($home_url); ?>" target="_blank"><?php echo wp_kses_post($home_url); ?></a></p>
        <div class="row mb-2 px-2 border-0">
          
            
            <form method="post" autocomplete="off"  id="api_form">
                <input type="hidden" name="page" value="safeupdates_dashboard">
                <?php wp_nonce_field('wpboom-update-api'); ?>
                <div class="input-group mb-3">
                    
                    <div class="form-floating mb-3">
                    <input type="<?php echo (!$api['valid'])?"text":"password"; ?>" data-1p-ignore autocomplete="new-pasword" class="form-control" placeholder="API Token" value="<?php echo esc_attr($api['token']); ?>"  name="api_token" id="api_token" aria-label="API Token" >
                    <label for="prefix" class="form-label">API Token</label>
                    
                    </div>
                    <?php if($options['account_type'] == 'guest' && $api['token'] && $api['valid']){ ?>
                    <div class="invalid-feedback d-block"><i class="fa fa-exclamation-circle"></i><strong> Warning:</strong> You appear to have a valid API token as a guest user. Editing your token is not recommended as it will invalidate your install unless you are updating with a registered token.</div>
                    <?php } ?>
                </div>
                    
                
            </form>
            
        </div>
        
      </div>
      
      <div class="modal-footer">
        <button class="btn btn-update-token btn-<?php echo (!$api['valid'])?"primary":"success"; ?>" onclick="jQuery('#api_form').submit();"><?php echo (!$api['valid'])?"Check Token":"Refresh Data"; ?></button>
        <?php if($api['token'] && $api){ ?>
            <button class="btn btn-warning" onclick="Swal.showLoading();jQuery('.swal2-footer:visible').html('Refreshing...').show();jQuery('#api_token').val('');jQuery('#api_form').submit();">Deactivate API Token</button>
        <?php } ?>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>


<!-- image viewer modal -->
<div class="modal fade" id="thumbModal" data-bs-theme="dark" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="thumbModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-fullscreen">
    <div class="modal-content">
        <div class="modal-header ">
            <h1 class="modal-title text-light fs-5" id="thumbModalLabel"></h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
      <div class="modal-body p-0">
       
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-primary btn-snapshot-prev"><i class="fa-solid fa-chevron-left"></i> Prev</button>
        <div class="snapshot-pagination text-light d-inline-block mx-2">1/11</div>
        <button type="button" class="btn btn-primary btn-snapshot-next">Next <i class="fa-solid fa-chevron-right"></i></button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<!-- sign up modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <!-- <div class="modal-header  bd-gray-500">
        <h1 class="modal-title fs-5" id="signupModalLabel">Register/Login</h1>
        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div> -->
      <div class="modal-body p-0">
      <div class="accordion" id="accordionRegister">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button" type="button" onclick="jQuery('#register-boom').removeClass('d-none');jQuery('#login-boom').addClass('d-none')" data-bs-toggle="collapse" data-bs-target="#collapseRegister" aria-expanded="true" aria-controls="collapseRegister">
              Register
            </button>
          </h2>
          <div id="collapseRegister" class="accordion-collapse collapse show" data-bs-parent="#accordionRegister">
            <div class="accordion-body row">
              <p class="lead ">Let's start by connecting to the WP Boom service by registering with a free account. You can upgrade to a paid subscription at any time after you've registered.</p>
              <div class="col-6  ">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control required" id="boom-name" placeholder="Name" value="<?php echo esc_attr($user->display_name); ?>">
                    <label for="prefix"   class="form-label">Name</label>
                  
                </div>
              </div>
              <div class="col-6  ">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" data-bs-toggle="tooltip" data-bs-title="The registration email address must match the WordPress admin email address."   readonly="true" data-1p-ignore="true"  id="boom-email" placeholder="Email" value="<?php echo esc_attr($user->user_email); ?>">
                    <label for="prefix" class="form-label">Email</label>
                  
                </div>
              </div>
          
              <div class="col-6 ">
                <div class="form-floating mb-3">
                    <input type="password" class="form-control required"  autocomplete="new-password" data-1p-ignore="true" id="boom-password" placeholder="Password" value="">
                    <label for="prefix"   class="form-label">Password</label>
                  
                </div>
              </div>
              <div class="col-6 ">
                <div class="form-floating mb-3">
                    <input type="password" class="form-control required"  autocomplete="new-password" data-1p-ignore="true" id="boom-password-retyped" placeholder="Retype Password" value="">
                    <label for="prefix"  class="form-label">Retype Password</label>
                  
                </div>
              </div>
              <div class="col-12  ">
                <div class="mb-3">
                    <div  class="form-control text-center border-0 rounded-0"   id="password-strength"  ></div>
                  
                  
                </div>
              </div>
              <div class="col-12 d-none">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="boom-site-name" placeholder="Site Name" value="<?php echo esc_attr(get_bloginfo('name')); ?>">
                    <label for="prefix" class="form-label">Site Name</label>
                  
                </div>
              </div>
              <div class="col-12 ">
                <div class="form-floating mb-3">
                    <input type="url" class="form-control" readonly="true" data-bs-toggle="tooltip" id="boom-url" data-bs-title="The site URL must match the site where the plugin is installed."  placeholder="Live Site URL" value="<?php echo esc_attr(get_bloginfo('url')); ?>">
                    <label for="prefix" class="form-label">Live Site URL</label>
                  
                </div>
              </div>
              <div class="col-12 d-none">
                <?php  if(array_key_exists('spawned',$options) && count((array)$options['spawned'])){ ?>
                  <div class="form-floating mb-3">
                      <input type="url" class="form-control" readonly="true" id="boom-dev-url" placeholder="Dev Site URL" value="<?php echo esc_attr(get_bloginfo('url')); ?>/<?php echo wp_kses_post(array_key_first($options['spawned'])) ; ?>">
                      <label for="prefix" class="form-label">Dev Site URL</label>
                  </div>
                <?php } else { ?>
                  <div class="form-floating mb-1">
                      <input type="url" class="form-control" readonly="true" id="boom-dev-url" placeholder="Dev Site URL" value="">
                      <label for="prefix" class="form-label">Dev Site URL</label>
                  </div>
                <div class="invalid-feedback d-block"><i class="fa fa-exclamation-circle" style="font-size:16px;"></i> A development site was not found. Registration will not include a development site until one is created.</div>
                <?php } ?>
              </div>
              <div class="col-12 snapshot-request-notice">
                <p class="lead"><i class="fa-solid fa-circle-info fs-6"></i>  Your requested snapshot will resume after you've registerd. Note that in some instances,  your site will have to be crawled for pages first.</p>
              </div>
              <div class="col-12">
                <div class="bg-light p-3 border border-1" style="font-size: 12px;">
                  Registering this site to a WP Boom service account is reliant on the following condition: 
                  <ul class="ps-3 mt-2">
                    <li>• This site must not already be attached to another account. In the event this site is found to be connected to another account, and you are the owner of that account, you may login with that account to connect this site. Otherwise, registration will be prohibited.</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" onclick="jQuery('#register-boom').addClass('d-none');jQuery('#login-boom').removeClass('d-none')" type="button" data-bs-toggle="collapse" data-bs-target="#collapseLogin" aria-expanded="false" aria-controls="collapseLogin">
              <span class="">Already have an account? Click here to log-in.</a>
            </button>
          </h2>
          <div id="collapseLogin" class="accordion-collapse collapse" data-bs-parent="#accordionRegister">
            <div class="accordion-body row">
              <p class="lead ">Let's start by connecting to the WP Boom service by using your registered email address and password.</p>
              <div class="col-12 ">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control required"   data-1p-ignore="true" id="email" placeholder="Email" value="">
                    <label for="prefix" class="form-label">Email</label>
                  
                </div>
              </div>
              <div class="col-12 ">
                <div class="form-floating mb-3">
                    <input type="password" class="form-control required"  autocomplete="new-password" data-1p-ignore="true" id="password" placeholder="Password" value="">
                    <label for="prefix" class="form-label">Password</label>
                  
                </div>
              </div>
              
              <div class="col-12 snapshot-request-notice">
                <p class="lead"><i class="fa-solid fa-circle-info fs-6"></i>  Your requested snapshot will resume after you login.  Note that in some instances,  your site will have to be crawled for pages first.</p>
              </div>
              <div class="col-12">
                <div class="bg-light p-3 border border-1" style="font-size: 12px;">
                  Connecting this site to a WP Boom service account is reliant on the following conditions: 
                  <ul class="ps-3 my-2">
                    <li>• This site must not already be attached to another account, or</li>
                    <li>• This site is already registered with your existing account, and</li>
                    <li>• Your subscription allows for adding an additional sites (Free Tier allows a total of 2 sites).</li>
                  </ul>
                  If the aforementioned conditions are met, this site will be added to your account.
                </div>
              </div>
            </div>
          </div>
        </div>
       
      </div>
        
       
        
     
       
        
      </div>
      
      <div class="modal-footer">
        <div class="form-check fade">
            <input class="form-check-input  bg-light mt-2" type="checkbox" role="switch" id="skip-snapshot" onclick="if(jQuery(this).prop('checked')){jQuery('.snapshot-request-notice').hide();}else{jQuery('.snapshot-request-notice').show()}">
            <label class="form-check-label " for="skip-snapshot">Skip Snapshot</label>
        </div>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary  " id="register-boom"> <span class="spinner-border spinner-border-sm d-none" aria-hidden="true"></span> Register</button>
        <button type="button" class="btn btn-success d-none" id="login-boom"> <span class="spinner-border spinner-border-sm d-none" aria-hidden="true"></span> Login</button>
       
      </div>
    </div>
  </div>
</div>
<!-- create site modal -->
<div class="modal modal-lg fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="createModalLabel">Create Dev Site</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="lead">Create a copy of this web site into a subfolder.</p>
        <small><strong>Tip:</strong> Only alphanumeric characters are allowed, including spaces.</small>
        <div class="card border-0 mb-2 px-2 mt-0" style="max-width:100%">
            <div class="form-floating">
                
                <input type="text" maxlength="30" class="form-control" id="prefix" placeholder="Site Name" value="Dev Site">
                <label for="prefix" class="form-label">Site Name</label>
               
            </div>
            <div class="valid-feedback d-block"><?php echo wp_kses_post(get_bloginfo('url')); ?>/<span class="text-primary prefix-preview"><?php echo wp_kses_post(strtolower(str_replace(" ","_",'Dev Site'))); ?></span></div>
            <!-- toggle advanced options with jQuery(".spawn-extra-config").removeClass("d-none") -->
            <div class="form-check fade collapse d-none spawn-extra-config">
                
                <input class="form-check-input  bg-light mt-2" type="checkbox" role="switch" id="include_uploads">
                <label class="form-check-label " for="include_uploads"><strong>Include Uploads </strong><small>If checked, the spawned site will copy and use its own set of uploaded media &mdash; otherwise it will use the live sites media and uploads will be disabled on the spawned site.</small></label>
                <!-- <div class="invalid-feedback d-block text-muted"><i class="dashicons dashicons-info mt-1" style="font-size: 14px;"></i> Disables <em>'Skip Database'</em></div> -->
            </div>
            <div class="form-check  fade collapse d-none spawn-extra-config"> 
                
                <input class="form-check-input bg-light  mt-2" type="checkbox" role="switch" id="update_plugins">
                <label class="form-check-label " for="update_plugins"><strong>Update Plugins and Themes </strong><small>If checked, updates will be forced on the copied site. There is a chance it will break your site.</small></label>
                <!-- <div class="invalid-feedback d-block text-muted"><i class="dashicons dashicons-info mt-1" style="font-size: 14px;"></i> Disables <em>'Skip Database'</em></div> -->
            </div>
            
            <div class="form-check d-none spawn-extra-config fade collapse">
                <input class="form-check-input  bg-light mt-2" type="checkbox" role="switch" id="skip_database">
                <label class="form-check-label " for="skip_database"><strong>Skip Database </strong><small>If checked, only the files will be copied and a normal install with its own database will be performed. </small></label>
                <div class="invalid-feedback d-block text-muted"><i class="text-danger dashicons dashicons-warning mt-1" style="font-size: 14px;"></i> <strong>Important:</strong> An admin user will be generated from the first admin user returned by WordPress with a new password. The password will be available when finished.</div>
                <div class="invalid-feedback d-block text-muted"><i class="dashicons dashicons-info mt-1" style="font-size: 14px;"></i> Disables <em>'Include Uploads'</em> and <em>'Update Plugins and Themes'</em></div>
            </div> 
            </div>
            <p class="alert alert-primary"><i class="fa-solid fa-circle-info fs-6"></i> Once complete, you can selectively update plugins on the dev site and snapshot the dev site.</p>
            <p class="alert alert-warning"><i class="fa-solid fa-circle-exclamation fs-6"></i> It is a known issue that security and caching plugins interfere with creating a dev site. Please deactivate any such plugins before proceeding. You can reactivate them once the dev site is created.</p>
            <?php if($options['account_type'] == 'guest'){ ?>
            <p class="lead"><strong>Guest Account</strong>: Including the home page, up to 10 pages will be crawled.</p>
            <?php } ?>
            <?php if($database_size > WPBOOM_DATABASE_WARNING_SIZE) { ?>
            <div class="input-group sure-group"><span class="input-group-text sure d-none"><i class="fa fa-exclamation-circle"></i></span><span class="input-group-text sure"><i class="fa fa-exclamation-circle"></i></span><span class="input-group-text sure">The database on this site is <?php echo number_format($database_size,1,".",",") ; ?> MB. This process might fail.</span> <button class="btn  btn-success continue-button" type="button" onclick="jQuery('.sure').toggleClass('d-none');jQuery('.sure-button').removeClass('d-none');jQuery('.continue').addClass('d-none');jQuery('.continue-button').addClass('d-none');">Accept</button>
            <span class="input-group-text sure d-none">Are you sure?</span> <button class="btn btn-danger sure-button d-none" type="button" onclick="jQuery('#spawn-dev').removeClass('disabled');jQuery('.sure-group').hide();jQuery('.alert-database-size').remove();">Yes</button>
            
            
        </div>
        <?php } ?>
        
          <?php if($root_files){ ?>
            <p class="lead">The following list of files/folders are not part of the WordPress core install. Check any item you want to exclude from the copy.</p>
            <div style="overflow:auto;max-height:150px;" class=" border border-1 border-secondary">
            <?php foreach($root_files as $idx => $file){ ?>
              <div class="form-check my-0 p-2">
                <input class="form-check-input ms-0 exclude-check bg-light mt-2" type="checkbox" id="exclude-<?php echo wp_kses_post($idx); ?>" role="switch"  name="excluded_files[]" value="<?php echo esc_attr(basename($file['path'])); ?>">
                <label class="form-check-label " for="exclude-<?php echo esc_attr($idx); ?>"><?php echo wp_kses_post(basename($file['path'])); ?> (<?php echo wp_kses_post($file['size']); ?>)</label>
              </div>
            <?php } ?>
           
            </div>
            <p class="text-muted pt-2"><i class="fa fa-info-circle"></i> Excluding extraneous files/folders can speed the copy progress. Be aware that if your site relies on these files, whether due to custom development or inclusion by a 3rd-party plugin, the dev site may not work properly if these files are excluded. </p>
        <?php } ?>
      </div>
      
      <div class="modal-footer">
        <div style="flex: auto !important;"><strong>Database Size</strong>: <?php echo number_format($database_size,1,".",",") ; ?> MB</div>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-success <?php if($database_size > WPBOOM_DATABASE_WARNING_SIZE) { ?>disabled<?php } ?>" id="spawn-dev"> <span class="spinner-border spinner-border-sm d-none" aria-hidden="true"></span>Create Site</button>
      </div>
    </div>
  </div>
</div>