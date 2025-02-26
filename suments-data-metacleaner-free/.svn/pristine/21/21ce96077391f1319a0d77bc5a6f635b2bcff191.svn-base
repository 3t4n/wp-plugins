<?php 
   if($this->s_token_get() != ""){
    $this->s_token_validate($this->s_token_get());
   }
   $this->s_ft_update();
   $feedback_user["token_information"] = $this->s_token_validate();
   // echo "<pre>";
   // print_r($feedback_user["token_information"]);
   
   ?>

<!-- metawash plugin html start -->
<div class=" metawash-plugin-outer">
   <div class="metawash-logo">
      <img src="<?php  echo plugin_dir_url(__DIR__);  ?>/admin/img/metawash-logo.svg">
   </div>
   <div class="metawash-all-tabs">
      <!-- about -->
      <div class="about">
         <a class="bg_links social portfolio" href="https://www.rafaelalucas.com" target="_blank">
         <span class="icon"></span>
         </a>
         <a class="bg_links social dribbble" href="https://dribbble.com/rafaelalucas" target="_blank">
         <span class="icon"></span>
         </a>
         <a class="bg_links social linkedin" href="https://www.linkedin.com/in/rafaelalucas/" target="_blank">
         <span class="icon"></span>
         </a>
         <a class="bg_links logo"></a>
      </div>
      <!-- end about -->
   </div>
   <div class="metawash-tab-content">
      <div id="wrapper">
         <div class="content">
            <!-- Tab links -->
            <div class="tabs">
               <!-- token tab button html start here -->
               <button class="tablinks active token" data-country="Token">
                  <svg class="white-bg" width="248" height="76" viewBox="0 0 248 76" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <g filter="url(#filter0_d_208_28)">
                        <path d="M21 36.5212C13.8 66.5212 3 67.5212 3 67.5212H238.5C238.5 67.5212 224.5 46.0212 218.5 25.5212C213.7 9.12117 203.5 4.35451 199 4.02118H46.5C40 3.70776 28.2 6.52118 21 36.5212Z" fill="white"/>
                     </g>
                     <defs>
                        <filter id="filter0_d_208_28" x="0" y="0" width="247.5" height="75.5212" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                           <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                           <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                           <feOffset dx="3" dy="2"/>
                           <feGaussianBlur stdDeviation="3"/>
                           <feComposite in2="hardAlpha" operator="out"/>
                           <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.2 0"/>
                           <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_208_28"/>
                           <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_208_28" result="shape"/>
                        </filter>
                     </defs>
                  </svg>
                  <p data-title="Token"><?php echo __('Token','metawash') ?></p>
               </button>
               <!-- token tab button html end here -->
               <!-- setting tab button html start here -->
               <button class="tablinks setting" data-country="Setting">
                  <svg class="white-bg" width="248" height="76" viewBox="0 0 248 76" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <g filter="url(#filter0_d_208_28)">
                        <path d="M21 36.5212C13.8 66.5212 3 67.5212 3 67.5212H238.5C238.5 67.5212 224.5 46.0212 218.5 25.5212C213.7 9.12117 203.5 4.35451 199 4.02118H46.5C40 3.70776 28.2 6.52118 21 36.5212Z" fill="white"/>
                     </g>
                     <defs>
                        <filter id="filter0_d_208_28" x="0" y="0" width="247.5" height="75.5212" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                           <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                           <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                           <feOffset dx="3" dy="2"/>
                           <feGaussianBlur stdDeviation="3"/>
                           <feComposite in2="hardAlpha" operator="out"/>
                           <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.2 0"/>
                           <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_208_28"/>
                           <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_208_28" result="shape"/>
                        </filter>
                     </defs>
                  </svg>
                  <p data-title="Setting"><?= __('Setting','metawash') ?></p>
               </button>
               <!-- setting tab button html close here -->
               <!-- manual tab button html start here -->
               <button class="tablinks manual" data-country="Manual">
                  <svg class="white-bg" width="248" height="76" viewBox="0 0 248 76" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <g filter="url(#filter0_d_208_28)">
                        <path d="M21 36.5212C13.8 66.5212 3 67.5212 3 67.5212H238.5C238.5 67.5212 224.5 46.0212 218.5 25.5212C213.7 9.12117 203.5 4.35451 199 4.02118H46.5C40 3.70776 28.2 6.52118 21 36.5212Z" fill="white"/>
                     </g>
                     <defs>
                        <filter id="filter0_d_208_28" x="0" y="0" width="247.5" height="75.5212" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                           <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                           <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                           <feOffset dx="3" dy="2"/>
                           <feGaussianBlur stdDeviation="3"/>
                           <feComposite in2="hardAlpha" operator="out"/>
                           <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.2 0"/>
                           <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_208_28"/>
                           <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_208_28" result="shape"/>
                        </filter>
                     </defs>
                  </svg>
                  <p data-title="Manual"><?= _e('Manual file cleaner','metawash') ?></p>
               </button>
               <!-- manual tab button html end here -->
               <!-- contact tab button html start here -->
               <button class="tablinks contact" data-country="Contact">
                  <svg class="white-bg" width="248" height="76" viewBox="0 0 248 76" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <g filter="url(#filter0_d_208_28)">
                        <path d="M21 36.5212C13.8 66.5212 3 67.5212 3 67.5212H238.5C238.5 67.5212 224.5 46.0212 218.5 25.5212C213.7 9.12117 203.5 4.35451 199 4.02118H46.5C40 3.70776 28.2 6.52118 21 36.5212Z" fill="white"/>
                     </g>
                     <defs>
                        <filter id="filter0_d_208_28" x="0" y="0" width="247.5" height="75.5212" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                           <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                           <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                           <feOffset dx="3" dy="2"/>
                           <feGaussianBlur stdDeviation="3"/>
                           <feComposite in2="hardAlpha" operator="out"/>
                           <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.2 0"/>
                           <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_208_28"/>
                           <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_208_28" result="shape"/>
                        </filter>
                     </defs>
                  </svg>
                  <p data-title="Contact"><?= __('Contact','metawash') ?></p>
               </button>
               <!-- contact tab button html end here -->
            </div>
            <!-- Tab content html start here-->
            <!-- token tab html start here-->
            <div id="Token" class="tabcontent active token-tab">
               <div class="token_outer">
                  <div class="token_field_outer">
                     <div class="token_heading">
                        <div class="token_heading_left">
                           <h6><?= __('Enter your Token Here','metawash') ?></h6>
                           <span><a target="_blank" href="https://suments.com/es/metacleaner-como-obtengo-un-token/"><?= __('How do I get a token?','metawash') ?></a></span>
                        </div>
                        <?php  if ($this->s_token_get()) { ?>
                        <div class="token_heading_right">
                           <p><img src="<?php  echo plugin_dir_url(__DIR__);  ?>/admin/img/star_icon.svg" alt="upgrade-icon">Plan actual: <?php echo ucwords($feedback_user["token_information"]->plan_name) ?></p>
                           <span><a href=" https://suments.com/es/metacleaner/" target="_blank" class="text-primary"><?= __('Ver planes','metawash') ?></a></span>
                        </div>
                        <?php } ?>
                     </div>
                     <div class="token_form">
                        <form action="/action_page.php">
                           <input type="text" id="mc_token" class="input_token_field" name="fname" maxlength="32"
                              placeholder="Copia tu token aquí"
                              value="<?php echo $this->s_token_get();?>" required>
                           <input type="hidden" name="action" value="mc_send_token"
                              style="display: none; visibility: hidden; opacity: 0;">
                                    <?php if (!$this->s_token_get()) { ?>
                                    <div class="token_form_btn" id="save_token">
                                       <a id="mc_ajax_save_token" type="submit">  <?= __('Save Token','metawash') ?></a>
                                    </div>
                                    <?php }else{ ?>
                                    <div class="token_form_btn" id="delete_token">
                                       <a class="token-dlt-btn delete_confirm_btn" type="submit" >
                                    <img src="<?php  echo plugin_dir_url(__DIR__);  ?>/admin/img/clean_ic.svg" class="white-dlt-icon">
                                    <img src="<?php  echo plugin_dir_url(__DIR__);  ?>/admin/img/delete_icon_active.svg" alt="delete_clean" class="active_plus"><?= __('Delete Token','metawash') ?></a>
                                    </div>
                                    <?php }?>
                        </form>
                        <div id="token_error_empty" style="display:none;margin-top:5px;" class="text-error-mc">
                           <p class="text-error-mc">  <?= __('Oops... looks like you forgot the token.','metawash') ?></p>
                        </div>
                        <div id="token_error_length" style="display:none;margin-top:5px;" class="text-error-mc">
                           <p class="text-error-mc"> <?= __('Oops, the token length seems wrong. Did you copy it right?','metawash') ?></p>
                        </div>
                        <div id="mc_token_invalid" class="text-error-mc"
                           style="display:<?php echo ($feedback_user['token_information']->valid == false) ? 'inline-block':'none;'?> ;margin-top:5px;">
                           <p class="text-error-mc"> <?php // echo __("Oops... looks like it's invalid.",'metawash') ?></p>
                        </div>
                        <div id="token_saved_success" style="display:none;margin-top:5px;" class="text-success-mc">
                           <p class="text-success-mc"> <?= __('Todo ha ido como la seda :)','metawash') ?></p>
                        </div>
                        <h4 class="text-primary" id="mc_token_valid" style="display:<?php echo ($this->s_token_get() == "") ?  'none':'inline-block;'?> ;">
                          <?= __('✔ Token valid until','metawash') ?>
                           <?php echo $feedback_user["token_information"]->date_expiration;?>
                        </h4>
                        <div id="token_saved_validation" style="display:none;" class="text-error-mc">
                           <p class="text-error-mc"> <?= __('This token has expired.','metawash') ?><br>
                              <?= __('As long as it is not renewed, we will use the functionality of the free plan.','metawash') ?>
                              Más<?= __('Más','metawash') ?>
                              <?= __('info en:','metawash') ?> <a href:"https://www.suments.com" target="_blank"><?= __('here','metawash') ?></a>
                           </p>
                        </div>
                        <div id="token_saved_fail" style="display:none;" class="text-error-mc">
                           <p class="text-error-mc">
                             <?= __('Whoops... something went wrong. Try again in a few minutes','metawash') ?> <br>
                              <?= __('If the error persists, you can contact us at','metawash') ?> <b><a
                                 href="mailto:hola@metacleaner.suments.com"
                                 target="_blank">hola@metacleaner.suments.com</a></b>
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
<?php  if ($this->s_token_get()) { ?>

               <div class="token_bottom_outer">
                  <div class="token_bottom_left"> 
                     <img src="<?php  echo plugin_dir_url(__DIR__);  ?>/admin/img/token_bottom_img.jpg" alt="image_token">
                     <img src="<?php  echo plugin_dir_url(__DIR__);  ?>/admin/img/Polygon_bottom_icon.svg" alt="image_token1" class="Polygon_bottom">
                  </div>
                  
                  <div class="token_bottom_right">
                     <img src="<?php  echo plugin_dir_url(__DIR__);  ?>/admin/img/right_side_cicrle.svg" class="cicrle-icon1" alt="cicrle-icon1">
                     <img src="<?php  echo plugin_dir_url(__DIR__);  ?>/admin/img/right_side_cicrle2.svg" class="cicrle-icon2" alt="cicrle-icon1">
                     <h5>You are using “<?php echo ucwords($feedback_user["token_information"]->plan_name) ?>”</h5>
                     <div class="token_bottom_btn">
                        <a href="https://suments.com/es/metacleaner/">
                        <img src="<?php  echo plugin_dir_url(__DIR__);  ?>/admin/img/upgrade-icon.svg" alt="upgrade-icon"><?= __('Upgrade to pro','metawash') ?></a>
                     </div>
                  </div>
                  
               </div>
   <?php } ?>
               
               <div class="modal_outer1" id="modal_outer1" style="display:none">
                  <div class="modal_outer">
                     <div class="modal_img">
                        <img src="<?php  echo plugin_dir_url(__DIR__);  ?>/admin/img/error_msg.svg" alt="error">
                     </div>
                     <div class="modal_heading">
                        <h6><?= __('Are you Sure?','metawash') ?></h6>
                        <p><?= __('Do you want to delete this token?','metawash') ?></p>
                     </div>
                     <div class="modal_btn_bottom">
                        <div class="modal_btn_left">
                           <a class="delete_close_btn" ><?= __('Cancel','metawash') ?></a>
                        </div>
                        <div class="modal_btn_right">
                           <a id="mc_ajax_delete_token" class="delete_token_btnn  mc_ajax_delete_token"><?= __('Delete','metawash') ?></a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="social_ic_bottom">
                  <div class="social_ic_item">
                     <a href="https://twitter.com/suments">
                     <img src="<?php  echo plugin_dir_url(__DIR__);  ?>/admin/img/twitter_icon.svg" alt="social_ic">
                     </a>
                  </div>
                  <div class="social_ic_item">
                     <a href="https://www.facebook.com/Suments/">
                     <img src="<?php  echo plugin_dir_url(__DIR__);  ?>/admin/img/facebook_icon.svg" alt="social_ic">
                     </a>
                  </div>
                  <div class="social_ic_item">
                     <a href="https://www.linkedin.com/company/suments-data/">
                     <img src="<?php  echo plugin_dir_url(__DIR__);  ?>/admin/img/likdin_icon.svg" alt="social_ic">
                     </a>
                  </div>
                  <div class="social_ic_item">
                     <a href="#">
                     <img src="<?php  echo plugin_dir_url(__DIR__);  ?>/admin/img/internet_icon.svg" alt="social_ic">
                     </a>
                  </div>
               </div>
               <div class="bottom_tagLines">
                  <p>© 2021 <span><?= __('Suments Data','metawash') ?></span> <?= __('We speak data!','metawash') ?></p>
               </div>
            </div>
            <!-- token tab html end here-->
            <!-- setting tab html start here-->
            <div id="Setting" class="tabcontent">
               <div class="token_outer setting_outer">
                  <div class="setting_item">
                     <div class="setting_heading">
                        <h6><img src="<?php  echo plugin_dir_url(__DIR__);  ?>/admin/img/Vector.svg"><?= __('Setting','metawash') ?></h6>
                     </div>
                     <div class="setting_paragraph">
                        <p><?= __('Automatically clean up files when adding them. This option works using the Wordpress multimedia manager.','metawash') ?></p>
                     </div>
                     <div class="setting_toggle_btn">
                        <label class="switch">           
                        <input type="checkbox"  id="config_auto" <?php echo ($this->s_config_auto_get() == "1") ?  " checked": " "?> >
                        <span class="slider round"></span>
                        </label>
                     </div>
                  </div>
               </div>
               <div class="social_ic_bottom">
                  <div class="social_ic_item">
                     <a href="https://twitter.com/suments">
                     <img src="<?php  echo plugin_dir_url(__DIR__);  ?>/admin/img/twitter_icon.svg" alt="social_ic">
                     </a>
                  </div>
                  <div class="social_ic_item">
                     <a href="https://www.facebook.com/Suments/">
                     <img src="<?php  echo plugin_dir_url(__DIR__);  ?>/admin/img/facebook_icon.svg" alt="social_ic">
                     </a>
                  </div>
                  <div class="social_ic_item">
                     <a href="https://www.linkedin.com/company/suments-data/">
                     <img src="<?php  echo plugin_dir_url(__DIR__);  ?>/admin/img/likdin_icon.svg" alt="social_ic">
                     </a>
                  </div>
                  <div class="social_ic_item">
                     <a href="#">
                     <img src="<?php  echo plugin_dir_url(__DIR__);  ?>/admin/img/internet_icon.svg" alt="social_ic">
                     </a>
                  </div>
               </div>
               <div class="bottom_tagLines">
                  <p>© 2021<span><?= __('Suments Data','metawash') ?></span> <?= __('We speak data!','metawash') ?></p>
               </div>
            </div>
            <!-- setting tab html end here -->
            <!-- manual tab html start here-->
            <div id="Manual" class="tabcontent">
               <div class="spoted_file_outer">
                  <div class="token_outer spoted_file_input">
                     <div class="clean_files">
                        <span><a target="_blank" href="https://suments.com/es/metacleaner-como-obtengo-un-token/"><?= __('How do I clean my files?','metawash') ?></a></span>
                     </div>
                     <div class="select_box_outer">
                        <div class="input_fieldOuter">
                           <input type="text" id="directory" class="input_token_field" name="file_name" value="" readonly>
                           <div id="mc_processing_gif" style="display:none;">
                              <h3 class="text-primary" style="font-style:italic;">
                                 <?= __('We will cleaning the metadata of your files','metawash') ?>
                              </h3>
                              <img src="<?php echo plugin_dir_url(__DIR__);?>/admin/img/loading.gif" alt="loading">
                           </div>
                           <table id="mc_log_summary" class="paginated table table-bordered">
                              <tr>
                                 <th>
                                    <p class="text-success-mc log_success_n"></p>
                                 </th>
                                 <th>
                                    <p class="text-error-mc log_filesize_n"></p>
                                 </th>
                                 <th>
                                    <p class="text-error-mc log_extension_n"></p>
                                 </th>
                              </tr>
                              <tbody id="tabldata"></tbody>
                           </table>
                        </div>
                        <div class="select_box_btn delete_clean">
                           <?php  $nonce = wp_create_nonce("dirFilesCon_nonce"); ?>
                           
                           <a id="<?php echo (!$this->s_token_get() ? 'showerror' : 'convert'); ?>" data-nonce="<?php echo $nonce ?>"><img src="<?php  echo plugin_dir_url(__DIR__);  ?>/admin/img/clean_ic.svg">
                           <img src="<?php  echo plugin_dir_url(__DIR__);  ?>/admin/img/delete_icon_active.svg" alt="delete_clean" class="active_plus">
                           <?= __('Clean Files','metawash') ?></a>
                        </div>
                     </div>
                     <div class="select_folders_outers">
                        <div class="select_folders_heading">
                           <div class="folders_heading_left">
                              <h6><?= __('Select Folders','metawash') ?></h6>
                           </div>
                        </div>
                        <div class="folders_outer2">
                           <form action="/action_page.php">
                              <div class="folders_outer1">
                                 <div class="folders_item1 enable_button_btn">
                                    <label class="radio_btn">
                                    <input type="radio" id="html" name="fav_language" class="handleChange_btn" value="all">
                                    <span class="checkmark"></span>
                                    </label>
                                    <img src="<?php  echo plugin_dir_url(__DIR__);  ?>/admin/img/folder-icon.svg">
                                    <div class="heading_folders1">
                                       <h6><?= __('All files','metawash') ?></h6>
                                       <div class="file_list">         
                                       </div>
                                    </div>
                                 </div>
                                 <?php
                                    $nonce = wp_create_nonce("dirFilesCon_nonce");
                                    $directoriesSubdirectories = $this->getDirectories();
                                    foreach ($directoriesSubdirectories as $current_pair => [$subdirectory, $nfile]) { ?>
                                 <div class="folders_item1 enable_button_btn" >
                                    <label class="radio_btn">
                                    <input type="radio" id="html" name="fav_language" class="handleChange_btn" value="<?php echo $subdirectory?>" >
                                    <span class="checkmark"></span>
                                    </label>
                                    <img src="<?php  echo plugin_dir_url(__DIR__);  ?>/admin/img/folder-icon.svg">
                                    <div class="heading_folders1">
                                       <h6><?php echo $subdirectory ?></h6>
                                       <div class="file_list">
                                          <span class="file_list1"><?php echo "(".$nfile ." carpetas/archivos en total)"?></span>
                                       </div>
                                    </div>
                                 </div>
                                 <?php  }   ?>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
                  <div class="token_outer spoted_file">
                     <h6><?= __('Supported file extensions:','metawash') ?></h6>
                     <h4><?php echo implode(", ", $this->s_ft_get());?></h4>
                  </div>
               </div>
               <div class="social_ic_bottom">
                  <div class="social_ic_item">
                     <a href="https://twitter.com/suments">
                     <img src="<?php  echo plugin_dir_url(__DIR__);  ?>/admin/img/twitter_icon.svg" alt="social_ic">
                     </a>
                  </div>
                  <div class="social_ic_item">
                     <a href="https://www.facebook.com/Suments/">
                     <img src="<?php  echo plugin_dir_url(__DIR__);  ?>/admin/img/facebook_icon.svg" alt="social_ic">
                     </a>
                  </div>
                  <div class="social_ic_item">
                     <a href="https://www.linkedin.com/company/suments-data/">
                     <img src="<?php  echo plugin_dir_url(__DIR__);  ?>/admin/img/likdin_icon.svg" alt="social_ic">
                     </a>
                  </div>
                  <div class="social_ic_item">
                     <a href="#">
                     <img src="<?php  echo plugin_dir_url(__DIR__);  ?>/admin/img/internet_icon.svg" alt="social_ic">
                     </a>
                  </div>
               </div>
               <div class="spoted_file_outer">
                  <div class="bottom_tagLines">
                     <p>© 2021 <span><?= __('Suments Data','metawash') ?></span> <?= __('We speak data!','metawash') ?></p>
                  </div>
               </div>
            </div>
            <!-- manual tab html end here-->
            <!-- contact tab html start here-->
            <div id="Contact" class="tabcontent contact-tab">
               <div class="token_outer contact_form_outer">
                  <div class="contact_heading">
                     <h5><?= __('Contact and Support','metawash') ?></h5>
                     <p><?= __('Reach out us with your Email and Message','metawash') ?></p>
                     <div class="form-status-message"></div>
                  </div>
                  <div class="contact_img_left">
                     <img src="<?php  echo plugin_dir_url(__DIR__);  ?>/admin/img/image_contact.png">
                  </div>
                  <div class="contact_img_right">
                     <img src="<?php  echo plugin_dir_url(__DIR__);  ?>/admin/img/image_contact1.png">
                  </div>
                  <div class="contact_form1">
                     <form>
                        <div class="first_child">
                           <label for="fname"><?= __('Your Email:','metawash'); ?></label>
                           <input type="email" id="fname" name="contact_email" placeholder="jenny@lorem.com" required>
                        </div>
                        <div class="message_input">
                           <label for="fname"><?= __('Your Message:','metawash'); ?></label>
                           <textarea id="w3review" name="contact_msg" rows="4" cols="50"></textarea>
                        </div>
                        <div class="contact_form_msg_outer" style="padding: 10px; margin-bottom: 30px;display:none;">
                           <div id="contact_form_msg">
                           </div>
                        </div>
                        <div class="contact_form_btn">
                           <input type="submit" id="contact_submit_mail" value="Send"> 
                        </div>
                     </form>
                  </div>
               </div>
               <div class="social_ic_bottom">
                  <div class="social_ic_item">
                     <a target="_blank" href="https://twitter.com/suments">
                     <img src="<?php  echo plugin_dir_url(__DIR__);  ?>/admin/img/twitter_icon.svg" alt="social_ic">
                     </a>
                  </div>
                  <div class="social_ic_item">
                     <a target="_blank" href="https://www.facebook.com/Suments/">
                     <img src="<?php  echo plugin_dir_url(__DIR__);  ?>/admin/img/facebook_icon.svg" alt="social_ic">
                     </a>
                  </div>
                  <div class="social_ic_item">
                     <a target="_blank" href="https://www.linkedin.com/company/suments-data/">
                       <img src="<?php  echo plugin_dir_url(__DIR__);  ?>/admin/img/likdin_icon.svg" alt="social_ic">
                     </a>
                  </div>
                  <div class="social_ic_item">
                     <a href="#">
                     <img src="<?php  echo plugin_dir_url(__DIR__);  ?>/admin/img/internet_icon.svg" alt="social_ic">
                     </a>
                  </div>
               </div>
               <div class="bottom_tagLines">
                  <p>© 2021 <?= __('Ver planes','metawash') ?><span><?= __('Suments Data','metawash') ?></span><?= __('We speak data!','metawash') ?></p>
               </div>
            </div>
            <!-- contact tab html end here-->
            <!-- Tab content html end here-->
         </div>
      </div>
   </div>
</div>
<!-- metawash plugin html end -->
