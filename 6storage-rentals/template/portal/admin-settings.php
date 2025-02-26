<div id="six-storage-admin-settings-short-code" class="six-storage-grid-container-root six-storage-online-root-class" style="display:none;">
   <?php
      use SixStorageOnline\Base\Six_Storage_SettingsKeys;
      $six_storage_settingsKey = new Six_Storage_SettingsKeys(); 
   ?>
   <div class="six-storage-wrapper">
      <div  id="six-storage-loading-container" style="display: none"></div>
      <div class="six-storage-container">
         <!-- Modal Structure -->
         <div class="six-storage-alert-wrapper six-storage-d-none cc" id="six-storage-success-msg">
            <div class="six-storage-alert-box green six-storage-lighten-1 six-storage-grid-d-flex six-storage-justify-content-between cc six-storage-align-items-center" id="six-storage-dv-alert">
               <div class="six-storage-text-section six-storage-grid-d-flex six-storage-align-items-center cc">
                  <div class="six-storage-icon-alert-box green six-storage-lighten-3 six-storage-rounded-circle cc six-storage-grid-mr10 six-storage-grid-d-flex six-storage-align-items-center six-storage-justify-content-center">
                     <i class="six-storage-material-icons notranslate six-storage-white-text six-storage-font-size-30" id="six-storage-alert-icon">thumb_up</i>
                  </div>
                  <p class="cc six-storage-alert-text six-storage-font-weight-bold six-storage-grid-m0 six-storage-white-text six-storage-alert-message" id="six-storage-alert-message"> <!--Successfully Updated--> <?php esc_html_e('Successfully Updated','6storage-rentals'); ?></p>
               </div>
               <div class="six-storage-action-close cc" onclick="sixStorageCloseAlert();">
                  <a class="six-storage-btn-floating cc six-storage-btn-large six-storage-waves-effect six-storage-waves-light six-storage-transparent six-storage-icon-alert-box six-storage-flexbox-important six-storage-align-items-center six-storage-justify-content-center six-storage-rounded-circle six-storage-text-decoration-none">
                     <i class="six-storage-material-icons notranslate six-storage-white-text">close</i>
                  </a>
               </div>
            </div>
         </div>
         <div class="six-storage-section2 cc">
            <div class="six-storage-row cc ">
               <div class="cc six-storage-col six-storage-m3 six-storage-l2 six-storage-s12">
                  <ul class="six-storage-tabs six-storage-tabs-fixed-width cc" id="six-storage-tab_main">
                     <li class="six-storage-tab cc six-storage-tab-align six-storage-col six-storage-s12 six-storage-m12 six-storage-l12"><a class="six-storage-tab-head six-storage-btn cc" href="#six-storage-field-settings">Field Settings</a></li>
                     <li class="six-storage-tab cc six-storage-tab-align six-storage-col six-storage-s12 six-storage-m12 six-storage-l12"><a class="six-storage-tab-head six-storage-btn cc" href="#six-storage-feature-customization">Feature Customization</a></li>
                     <li class="six-storage-tab cc six-storage-tab-align six-storage-col six-storage-s12 six-storage-m12 six-storage-l12"><a class="six-storage-tab-head six-storage-btn cc" href="#six-storage-appearance">Appearance</a></li>
                     <li class="six-storage-tab cc six-storage-tab-align six-storage-col six-storage-s12 six-storage-m12 six-storage-l12"><a class="six-storage-tab-head six-storage-btn cc" href="#six-storage-terms-condition">Terms & Conditions</a></li>
                  </ul>
               </div>
               <div class="cc six-storage-col six-storage-m9 six-storage-l10 six-storage-s12">
                  <div id="six-storage-field-settings" class="six-storage-tab-content cc" style="width:100%">
                     <div class="six-storage-row cc">
                        <div class="cc six-storage-col six-storage-m12 six-storage-s12 six-storage-l12">
                           <span class="six-storage-grid-ml10 cc" style="float:right;"><a href="https://techsupport.6storage.com/support/solutions/articles/19000123904" target="_blank">Help</a><i class="six-storage-material-icons six-storage-tiny six-storage-icon-align">help_outline</i></span>
                        </div>
                     </div>
                     <div class="six-storage-row cc">
                        <div class="cc six-storage-col six-storage-m12 six-storage-s12 six-storage-l12">
                           <div class="six-storage-container">
                              <ul class="six-storage-tabs six-storage-tabs-fixed-width cc">
                                 <li class="six-storage-tab  six-storage-subtab-align six-storage-col six-storage-m3 cc"><a class="six-storage-tab-head six-storage-btn six-storage-active cc" href="#six-storage-tenantinfo">Tenant Info</a></li>
                                 <li class="six-storage-tab  six-storage-subtab-align six-storage-col six-storage-m3 cc"><a class="six-storage-tab-head six-storage-btn cc" href="#six-storage-addons">Addons</a></li>
                              </ul>
                              <!-- Tenant Info -->
                              <div class="six-storage-col six-storage-m12 cc" id="six-storage-tenantinfo">
                                 <form id='six-storage-template-ajax-url' class="cc" action="#" method="post" data-url="<?php echo esc_attr(admin_url('admin-ajax.php')) ?>" data-culture="<?php echo esc_attr(json_decode(get_option("six_storage_online_api_culture"), true)['culture']) ?>" data-date_format="<?php echo esc_attr(json_decode(get_option("six_storage_online_api_culture"), true)['shortDate']) ?>" data-currency_format="<?php echo esc_attr(json_decode(get_option("six_storage_online_api_culture"), true)['currency']) ?>">
                                    <div class="six-storage-row cc">
                                       <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12">
                                          <div class="six-storage-row cc ">
                                             <div class="six-storage-col six-storage-s12 six-storage-m12 six-storage-l6 cc">
                                                <div class="six-storage-row cc">
                                                   <div class="six-storage-col six-storage-s6 six-storage-l6 six-storage-m6 cc ">
                                                      <p class="six-storage-Tenant-info-head six-storage-center-align">Fields</p>
                                                   </div>
                                                   <div class="six-storage-col six-storage-s6 six-storage-l6 six-storage-m6 cc ">
                                                      <p class="cc six-storage-Tenant-info-head" style="float:right;">Make Mandatory</p>
                                                   </div>
                                                </div>
                                                <div class="six-storage-row cc">
                                                   <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                      <div class="six-storage-switch cc ">
                                                         <label>
                                                            <div style="display: flex;">
                                                               <div>
                                                                  <input type="checkbox" id="six_storage_online_fs_ti_first_name_toggle" class="cc" disabled <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_first_name_toggle) == '1') { echo esc_attr('checked'); } ?> >
                                                                  <span class="six-storage-lever"></span>
                                                               </div>
                                                               <div>
                                                                  <span class="six-storage-field_label cc">First Name</span>
                                                               </div>
                                                            </div>
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0">
                                                      <p class="cc six-storage-center-align six-storage-grid-m0">
                                                         <label>
                                                            <input type="checkbox" id="six_storage_online_fs_ti_first_name_is_mandatory" class="cc" disabled <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_first_name_is_mandatory) == '1') { echo esc_attr('checked'); } ?> class="cc six-storage-input-field"/>
                                                            <span ></span>
                                                         </label>
                                                      </p>
                                                   </div>
                                                </div>
                                                <div class="six-storage-row cc">
                                                   <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                      <div class="six-storage-switch cc ">
                                                            <label>
                                                            <div style="display: flex;">
                                                               <div>
                                                            <input type="checkbox" id="six_storage_online_fs_ti_phone1_toggle" class="cc" disabled <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_phone1_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                            <span class="six-storage-lever"></span>
                                                               </div>
                                                            <div>
                                                            <span class="six-storage-field_label cc">Phone 1</span>
                                                         </div>
                                                      </div>
                                                            </label>
                                                         </div>
                                                      </div>
                                                   <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0">
                                                      <p class="cc six-storage-center-align six-storage-grid-m0">
                                                         <label>
                                                            <input type="checkbox" id="six_storage_online_fs_ti_phone1_is_mandatory" class="cc" disabled <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_phone1_is_mandatory) == '1') { echo esc_attr('checked'); } ?> class="cc six-storage-input-field"/>
                                                            <span ></span>
                                                         </label>
                                                      </p>
                                                   </div>
                                                </div>
                                                <div class="six-storage-row cc">
                                                   <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                      <div class="six-storage-switch cc ">
                                                         <label>
                                                    <div style="display: flex;">
                                                               <div>
                                                         <input type="checkbox" id="six_storage_online_fs_ti_address1_toggle" disabled class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_address1_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                         <span class="six-storage-lever"></span>
                                                   </div>
                                                   <div>
                                                         <span class="six-storage-field_label cc">Address 1</span>
                                                   </div>
                                                </div>
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0">
                                                      <p class="cc six-storage-center-align six-storage-grid-m0">
                                                         <label>
                                                            <input type="checkbox" id="six_storage_online_fs_ti_address1_is_mandatory" disabled <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_address1_is_mandatory) == '1') { echo esc_attr('checked'); } ?> class="cc six-storage-input-field"/>
                                                            <span ></span>
                                                         </label>
                                                      </p>
                                                   </div>
                                                </div>
                                                <div class="six-storage-row cc">
                                                   <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                      <div class="six-storage-switch cc ">
                                                         <label>
                                                     <div style="display: flex;">
                                                               <div>
                                                         <input type="checkbox" id="six_storage_online_fs_ti_city_toggle" disabled class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_city_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                         <span class="six-storage-lever"></span>
                                                   </div>
                                                   <div>
                                                         <span class="six-storage-field_label cc">City</span>
                                                   </div>
                                                </div>
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0">
                                                      <p class="cc six-storage-center-align six-storage-grid-m0">
                                                         <label>
                                                            <input type="checkbox" id="six_storage_online_fs_ti_city_is_mandatory" disabled <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_city_is_mandatory) == '1') { echo esc_attr('checked'); } ?> class="cc six-storage-input-field"/>
                                                            <span ></span>
                                                         </label>
                                                      </p>
                                                   </div>
                                                </div>
                                                <div class="six-storage-row cc">
                                                   <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                      <div class="six-storage-switch cc ">
                                                         <label>
                                                      <div style="display: flex;">
                                                               <div>
                                                         <input type="checkbox" id="six_storage_online_fs_ti_companyname_toggle" class="cc" disabled <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_companyname_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                         <span class="six-storage-lever"></span>
                                                   </div>
                                                   <div>
                                                         <span class="six-storage-field_label cc">Company Name</span>
                                                   </div>
                                                </div>
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0">
                                                      <p class="cc six-storage-center-align six-storage-grid-m0">
                                                         <label>
                                                            <input type="checkbox" id="six_storage_online_fs_ti_companyname_is_mandatory" disabled <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_companyname_is_mandatory) == '1') { echo esc_attr('checked'); } ?> class="cc six-storage-input-field"/>
                                                            <span ></span>
                                                         </label>
                                                      </p>
                                                   </div>
                                                </div>
                                                <div class="six-storage-row cc">
                                                   <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                      <div class="six-storage-switch cc ">
                                                         <label>
                                                      <div style="display: flex;">
                                                               <div>
                                                         <input type="checkbox" id="six_storage_online_fs_ti_dob_toggle"  class="cc"<?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_dob_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                         <span class="six-storage-lever"></span>
                                                   </div>
                                                   <div>
                                                         <span class="six-storage-field_label cc">Date Of Birth</span>
                                                   </div>
                                                </div>
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0">
                                                      <p class="cc six-storage-center-align six-storage-grid-m0">
                                                         <label>
                                                            <input type="checkbox" id="six_storage_online_fs_ti_dob_is_mandatory" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_dob_is_mandatory) == '1') { echo esc_attr('checked'); } ?> class="cc six-storage-input-field"/>
                                                            <span ></span>
                                                         </label>
                                                      </p>
                                                   </div>
                                                </div>


                                                <div class="six-storage-row cc">
                                                   <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                      <div class="six-storage-switch cc ">
                                                         <label>
                                                      <div style="display: flex;">
                                                               <div>
                                                            <input type="checkbox" id="six_storage_online_fs_ti_gateaccesscode_toggle" class="cc" disabled <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_gateaccesscode_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                            <span class="six-storage-lever"></span>
                                                           </div>
                                                       <div>
                                                            <span class="six-storage-field_label cc">Gate Access Code</span>
                                                   </div>

                                                   
                                                </div>
                                                         </label>
                                                      </div>
                                                    </div>
                                                
                                                   <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0">
                                                      <p class="cc six-storage-center-align six-storage-grid-m0">
                                                         <label>
                                                            <input type="checkbox" id="six_storage_online_fs_ti_gateaccesscode_is_mandatory" disabled <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_gateaccesscode_is_mandatory) == '1') { echo esc_attr('checked'); } ?> class="cc six-storage-input-field"/>
                                                            <span ></span>
                                                         </label>
                                                      </p>
                                                   </div>
                                                </div>

                                              

                                                <div class="six-storage-row cc" style="display:none;margin-left: 50px;margin-top: -20px;" id = "sixstorage-gateaccesscode-min">
                                                <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                    <div>
                                                            <span class="six-storage-field_label cc">Required # of Digits</span> 
                                                            <input type="number" style="width:30% ;" min="4" max="10" class="cc" id="six_storage_gateaccesscodemindigits" value="<?php echo esc_attr(get_option($six_storage_settingsKey->six_storage_gateaccesscodemindigits)); ?>"  onkeyup= "gateAccesscodemindigits(this)"  placeholder="">
                                                       </div>

                                                         </div>   
                                                </div>
                                                    

                                                <div class="six-storage-row cc">
                                                   <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                      <div class="six-storage-switch cc ">
                                                         <label>
                                                      <div style="display: flex;">
                                                               <div>
                                                         <input type="checkbox" id="six_storage_online_fs_ti_upload_document_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_upload_document_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                         <span class="six-storage-lever"></span>
                                                   </div>
                                                   <div>
                                                         <span class="six-storage-field_label cc">File Uploads</span></div></div>
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0">
                                                      <p class="cc six-storage-center-align six-storage-grid-m0">
                                                         <label>
                                                            <input type="checkbox" disabled id="six_storage_online_fs_ti_upload_document_is_mandatory" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_upload_document_is_mandatory) == '1') { echo esc_attr('checked'); } ?> class="cc six-storage-input-field"/>
                                                            <span ></span>
                                                         </label>
                                                      </p>
                                                   </div>
                                                </div>
                                                <div class="six-storage-row cc">
                                                   <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                      <div class="six-storage-switch cc ">
                                                         <label>
                                                      <div style="display: flex;">
                                                               <div>
                                                            <input type="checkbox" id="six_storage_online_fs_ti_taxid_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_taxid_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                            <span class="six-storage-lever"></span>
                                                   </div><div>
                                                            <span class="six-storage-field_label cc">Tax ID</span></div></div>
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0">
                                                      <p class="cc six-storage-center-align six-storage-grid-m0">
                                                         <label>
                                                            <input type="checkbox" id="six_storage_online_fs_ti_taxid_is_mandatory" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_taxid_is_mandatory) == '1') { echo esc_attr('checked'); } ?> class="cc six-storage-input-field"/>
                                                            <span ></span>
                                                         </label>
                                                      </p>
                                                   </div>
                                                </div>
                                                <div class="six-storage-row cc">
                                                   <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                      <div class="six-storage-switch cc ">
                                                         <label>
                                                     <div style="display: flex;">
                                                               <div>
                                                            <input type="checkbox" id="six_storage_online_fs_ti_emergencycontact_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_emergencycontact_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                            <span class="six-storage-lever"></span>
                                                   </div>
                                                   <div>
                                                            <span class="six-storage-field_label cc">Emergency Contact</span>
                                                   </div>
                                                   </div>
                                                   </label>
                                                </div>
                                             </div>                                      
                                          </div>
                                          <!-- Tenant separate toggle on/off fields -->
                                          <div id="tenant-separate-toggle-fields" class="tenant-separate-toggle-fields" style="padding-left: 40pX;">
                                             <div class="six-storage-row cc">
                                                <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                   <div class="six-storage-switch cc ">
                                                      <label>
                                                         <div style="display: flex;">
                                                               <div>
                                                         <input type="checkbox" id="six_storage_online_fs_ti_emergencycontact_first_name_toggle" class="cc" disabled <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_emergencycontact_first_name_toggle) == '1') { echo esc_attr('checked'); } ?> >
                                                         <span class="six-storage-lever"></span>
                                                      </div>
                                                      <div>
                                                         <span class="six-storage-field_label cc">First Name</span></div></div>
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0">
                                                      <p class="cc six-storage-center-align six-storage-grid-m0">
                                                         <label>
                                                         <input type="checkbox" id="six_storage_online_fs_ti_emergencycontact_first_name_is_mandatory" class="cc" disabled <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_emergencycontact_first_name_is_mandatory) == '1') { echo esc_attr('checked'); } ?> class="cc six-storage-input-field"/>
                                                            <span ></span>
                                                         </label>
                                                      </p>
                                                </div>
                                             </div>
                                                <div class="six-storage-row cc">
                                                   <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                      <div class="six-storage-switch cc ">
                                                         <label>
                                                         <div style="display: flex;">
                                                               <div>
                                                         <input type="checkbox" id="six_storage_online_fs_ti_emergencycontact_last_name_toggle" class="cc" disabled <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_emergencycontact_last_name_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                         <span class="six-storage-lever"></span>
                                                      </div>
                                                      <div>
                                                         <span class="six-storage-field_label cc">Last Name</span></div></div>
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0">
                                                   <p class="cc six-storage-center-align six-storage-grid-m0">
                                                      <label>
                                                         <input type="checkbox" id="six_storage_online_fs_ti_emergencycontact_last_name_is_mandatory" class="cc" disabled <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_emergencycontact_last_name_is_mandatory) == '1') { echo esc_attr('checked'); } ?> class="cc six-storage-input-field"/>
                                                         <span ></span>
                                                      </label>
                                                   </p>
                                                </div>
                                             </div>
                                             <div class="six-storage-row cc">
                                                <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                   <div class="six-storage-switch cc ">
                                                      <label>
                                                         <div style="display: flex;">
                                                               <div>
                                                         <input type="checkbox" id="six_storage_online_fs_ti_emergencycontact_mobile_toggle" class="cc" disabled <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_emergencycontact_mobile_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                         <span class="six-storage-lever"></span>
                                                      </div>
                                                      <div>
                                                         <span class="six-storage-field_label cc">Mobile</span></div></div>
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0">
                                                   <p class="cc six-storage-center-align six-storage-grid-m0">
                                                      <label>
                                                         <input type="checkbox" id="six_storage_online_fs_ti_emergencycontact_mobile_is_mandatory" class="cc" disabled <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_emergencycontact_mobile_is_mandatory) == '1') { echo esc_attr('checked'); } ?> class="cc six-storage-input-field"/>
                                                         <span ></span>
                                                      </label>
                                                   </p>
                                                </div>
                                             </div>
                                             <div class="six-storage-row cc">
                                                <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0"> 
                                                   <div class="six-storage-switch cc ">
                                                      <label>
                                                         <div style="display: flex;">
                                                               <div>
                                                         <input type="checkbox" id="six_storage_online_fs_ti_emergencycontact_email_toggle" class="cc" disabled <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_emergencycontact_email_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                         <span class="six-storage-lever"></span>
                                                      </div>
                                                      <div>
                                                         <span class="six-storage-field_label cc">Email</span></div></div>
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0">
                                                   <p class="cc six-storage-center-align six-storage-grid-m0">
                                                      <label>
                                                         <input type="checkbox" id="six_storage_online_fs_ti_emergencycontact_email_is_mandatory" class="cc" disabled <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_emergencycontact_email_is_mandatory) == '1') { echo esc_attr('checked'); } ?> class="cc six-storage-input-field"/>
                                                         <span ></span>
                                                      </label>
                                                   </p>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="six-storage-row cc">
                                             <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                <div class="six-storage-switch cc ">
                                                   <label>
                                                      <div style="display: flex;">
                                                               <div>
                                                            <input type="checkbox" id="six_storage_online_movein_profile_picture_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_movein_profile_picture_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                         <span class="six-storage-lever"></span>
                                                   </div>
                                                   <div>
                                                         <span class="six-storage-field_label cc">Photo ID</span></div></div>
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0">
                                                      <p class="cc six-storage-center-align six-storage-grid-m0">
                                                         <label>
                                                            <input type="checkbox" id="six_storage_online_movein_profile_picture_is_mandatory" <?php if(get_option($six_storage_settingsKey->six_storage_online_movein_profile_picture_is_mandatory) == '1') { echo esc_attr('checked'); } ?> class="cc six-storage-input-field"/>
                                                            <span ></span>
                                                         </label>
                                                      </p>
                                                   </div>
                                                </div>
                                                <div class="six-storage-row cc">
                                                      <div class="six-storage-col six-storage-s6 six-storage-l6 six-storage-m6 cc six-storage-grid-p0">
                                                         <p class="cc six-storage-feature-info-head">Profile </p>
                                                       </div>
                                                   </div>
                                                   <div class="six-storage-row cc">
                                                   <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                      <div class="six-storage-switch cc ">
                                                         <label>
                                                      <div style="display: flex;">
                                                               <div>
                                                      <input type="checkbox" id="six_storage_online_fs_ti_tenantphoto_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_tenantphoto_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                      <span class="six-storage-lever"></span>
                                                   </div>
                                                   <div>
                                                      <span class="six-storage-field_label cc">Tenant Profile Photo</span></div></div>
                                                   </label>
                                                </div>
                                             </div>
                                             <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0">
                                                <p class="cc six-storage-center-align six-storage-grid-m0">
                                                   <label>
                                                      <input type="checkbox" id="six_storage_online_fs_ti_tenantphoto_is_mandatory" disabled <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_tenantphoto_is_mandatory) == '1') { echo esc_attr('checked'); } ?> class="cc six-storage-input-field"/>
                                                      <span ></span>
                                                   </label>
                                                </p>
                                             </div>
                                          </div>
                                       </div>

                                             

                                             <!-- Second Side-->

                                             <div class="six-storage-col six-storage-s12 six-storage-m12 six-storage-l6 cc">
                                                <div class="six-storage-secondSideHead">
                                                   <div class="six-storage-row cc">
                                                      <div class="six-storage-col six-storage-s6 six-storage-l6 six-storage-m6 cc">
                                                         <p class="cc six-storage-Tenant-info-head six-storage-center-align">Fields</p>
                                                      </div>
                                                      <div class="six-storage-col six-storage-s6 six-storage-l6 six-storage-m6 cc">
                                                         <p class="cc six-storage-Tenant-info-head" style="float:right;">Make Mandatory</p>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="six-storage-row cc">
                                                   <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                      <div class="six-storage-switch cc ">
                                                         <label>
                                                      <div style="display: flex;">
                                                               <div>
                                                      <input type="checkbox" id="six_storage_online_fs_ti_last_name_toggle" class="cc" disabled <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_last_name_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                      <span class="six-storage-lever"></span>
                                                   </div>
                                                   <div>
                                                      <span class="six-storage-field_label cc">Last Name</span></div></div>
                                                   </label>
                                                </div>
                                             </div>
                                             <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0">
                                                <p class="cc six-storage-center-align six-storage-grid-m0">
                                                   <label>
                                                      <input type="checkbox" id="six_storage_online_fs_ti_last_name_is_mandatory" disabled <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_last_name_is_mandatory) == '1') { echo esc_attr('checked'); } ?> class="cc six-storage-input-field"/>
                                                      <span ></span>
                                                   </label>
                                                </p>
                                             </div>
                                          </div>
                                          <div class="six-storage-row cc">
                                             <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                <div class="six-storage-switch cc ">
                                                   <label>
                                                      <div style="display: flex;">
                                                               <div>
                                                      <input type="checkbox" id="six_storage_online_fs_ti_phone2_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_phone2_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                      <span class="six-storage-lever"></span>
                                                   </div>
                                                   <div>
                                                      <span class="six-storage-field_label cc">Phone 2</span></div></div>
                                                   </label>
                                                </div>
                                             </div>
                                             <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0">
                                                <p class="cc six-storage-center-align six-storage-grid-m0">
                                                   <label>
                                                      <input type="checkbox" id="six_storage_online_fs_ti_phone2_is_mandatory" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_phone2_is_mandatory) == '1') { echo esc_attr('checked'); } ?> class="cc six-storage-input-field"/>
                                                      <span ></span>
                                                   </label>
                                                </p>
                                             </div>
                                          </div>
                                          <div class="six-storage-row cc">
                                             <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                <div class="six-storage-switch cc ">
                                                   <label>
                                                      <div style="display: flex;">
                                                               <div>
                                                      <input type="checkbox" id="six_storage_online_fs_ti_address2_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_address2_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                      <span class="six-storage-lever"></span>
                                                   </div>
                                                   <div>
                                                      <span class="six-storage-field_label cc">Address 2</span></div></div>
                                                   </label>
                                                </div>
                                             </div>
                                             <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0">
                                                <p class="cc six-storage-center-align six-storage-grid-m0">
                                                   <label>
                                                      <input type="checkbox" id="six_storage_online_fs_ti_address2_is_mandatory" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_address2_is_mandatory) == '1') { echo esc_attr('checked'); } ?> class="cc six-storage-input-field"/>
                                                      <span ></span>
                                                   </label>
                                                </p>
                                             </div>
                                          </div>
                                          <div class="six-storage-row cc">
                                             <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                <div class="six-storage-switch cc ">
                                                   <label>
                                                      <div style="display: flex;">
                                                               <div>
                                                      <input type="checkbox" id="six_storage_online_fs_ti_state_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_state_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                      <span class="six-storage-lever"></span>
                                                   </div>
                                                   <div>
                                                      <span class="six-storage-field_label cc">State</span></div></div>
                                                   </label>
                                                </div>
                                             </div>
                                             <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0">
                                                <p class="cc six-storage-center-align six-storage-grid-m0">
                                                   <label>
                                                      <input type="checkbox" id="six_storage_online_fs_ti_state_is_mandatory" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_state_is_mandatory) == '1') { echo esc_attr('checked'); } ?> class="cc six-storage-input-field"/>
                                                      <span ></span>
                                                   </label>
                                                </p>
                                             </div>
                                          </div>
                                          <div class="six-storage-row cc">
                                             <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                <div class="six-storage-switch cc ">
                                                   <label>
                                                      <div style="display: flex;">
                                                               <div>
                                                      <input type="checkbox" id="six_storage_online_fs_ti_country_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_country_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                      <span class="six-storage-lever"></span></div>
                                                      <div>
                                                      <span class="six-storage-field_label cc">Country</span></div></div>
                                                   </label>
                                                </div>
                                             </div>
                                             <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0">
                                                <p class="cc six-storage-center-align six-storage-grid-m0">
                                                   <label>
                                                      <input type="checkbox" id="six_storage_online_fs_ti_country_is_mandatory" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_country_is_mandatory) == '1') { echo esc_attr('checked'); } ?> class="cc six-storage-input-field"/>
                                                      <span ></span>
                                                   </label>
                                                </p>
                                             </div>
                                          </div>
                                          <div class="six-storage-row cc">
                                             <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0"> 
                                                <div class="six-storage-switch cc ">
                                                   <label>
                                                      <div style="display: flex;">
                                                               <div>
                                                      <input type="checkbox" id="six_storage_online_fs_ti_email_toggle" class="cc" disabled <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_email_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                      <span class="six-storage-lever"></span>
                                                   </div>
                                                   <div>
                                                      <span class="six-storage-field_label cc">Email</span></div></div>
                                                   </label>
                                                </div>
                                             </div>
                                             <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0">
                                                <p class="cc six-storage-center-align six-storage-grid-m0">
                                                   <label>
                                                      <input type="checkbox" id="six_storage_online_fs_ti_email_is_mandatory" disabled <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_email_is_mandatory) == '1') { echo esc_attr('checked'); } ?> class="cc six-storage-input-field"/>
                                                      <span ></span>
                                                   </label>
                                                </p>
                                             </div>
                                          </div>
                                          <div class="six-storage-row cc" style = "margin-bottom:10px">
                                             <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                <div class="six-storage-switch cc ">
                                                   <label>
                                                      <div style="display: flex;">
                                                               <div>
                                                      <input type="checkbox" id="six_storage_online_fs_ti_timezone_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_timezone_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                      <span class="six-storage-lever"></span>
                                                   </div>
                                                   <div>
                                                      <span class="six-storage-field_label cc">Gate Time Zone (Access Hours)</span></div></div>
                                                   </label>
                                                </div>
                                             </div>
                                             <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0">
                                                <p class="cc six-storage-center-align six-storage-grid-m0">
                                                   <label>
                                                      <input type="checkbox" disabled id="six_storage_online_fs_ti_timezone_is_mandatory" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_timezone_is_mandatory) == '1') { echo esc_attr('checked'); } ?> class="cc six-storage-input-field"/>
                                                      <span ></span>
                                                   </label>
                                                </p>
                                             </div>
                                          </div>                                      
                                          <div class="six-storage-row cc">
                                             <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                <div class="six-storage-switch cc ">
                                                   <label>
                                                      <div style="display: flex;">
                                                               <div>
                                                      <input type="checkbox" id="six_storage_online_fs_ti_zip_postalcode_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_zip_postalcode_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                      <span class="six-storage-lever"></span></div>
                                                      <div>
                                                      <span class="six-storage-field_label cc">Zip/Postal Code</span></div></div>
                                                   </label>
                                                </div>
                                             </div>
                                             <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0">
                                                <p class="cc six-storage-center-align six-storage-grid-m0">
                                                   <label>
                                                      <input type="checkbox" id="six_storage_online_fs_ti_zip_postalcode_is_mandatory" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_zip_postalcode_is_mandatory) == '1') { echo esc_attr('checked'); } ?> class="cc six-storage-input-field"/>
                                                      <span ></span>
                                                   </label>
                                                </p>
                                             </div>
                                          </div>
                                          <div class="six-storage-row cc">
                                             <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                <div class="six-storage-switch cc ">
                                                   <label>
                                                      <div style="display: flex;">
                                                               <div>
                                                      <input type="checkbox" id="six_storage_online_fs_ti_tenantsignature_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_tenantsignature_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                      <span class="six-storage-lever"></span></div>
                                                      <div>
                                                      <span class="six-storage-field_label cc">Tenant
                                                      Signature</span></div></div>
                                                   </label>
                                                </div>
                                             </div>
                                             <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0">
                                                <p class="cc six-storage-center-align six-storage-grid-m0">
                                                   <label>
                                                      <input type="checkbox" id="six_storage_online_fs_ti_tenantsignature_is_mandatory" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_tenantsignature_is_mandatory) == '1') { echo esc_attr('checked'); } ?> class="cc six-storage-input-field"/>
                                                      <span ></span>
                                                   </label>
                                                </p>
                                             </div>
                                          </div>
                                          <div class="six-storage-row cc">
                                             <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                <div class="six-storage-switch cc ">
                                                   <label>
                                                      <div style="display: flex;">
                                                               <div>
                                                      <input type="checkbox" id="six_storage_online_fs_ti_website_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_website_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                      <span class="six-storage-lever"></span></div><div>
                                                      <span class="six-storage-field_label cc">Website</span></div></div>
                                                   </label>
                                                </div>
                                             </div>
                                             <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0">
                                                <p class="cc six-storage-center-align six-storage-grid-m0">
                                                   <label>
                                                      <input type="checkbox" id="six_storage_online_fs_ti_website_is_mandatory" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_website_is_mandatory) == '1') { echo esc_attr('checked'); } ?> class="cc six-storage-input-field"/>
                                                      <span ></span>
                                                   </label>
                                                </p>
                                             </div>
                                          </div>
                                          <div class="six-storage-row cc">
                                             <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                <div class="six-storage-switch cc ">
                                                   <label>
                                                      <div style="display: flex;">
                                                               <div>
                                                      <input type="checkbox" id="six_storage_online_fs_ti_identitydocument_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_identitydocument_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                      <span class="six-storage-lever"></span></div><div>
                                                      <span class="six-storage-field_label cc">Identity Document</span></div></div>
                                                   </label>
                                                </div>
                                             </div>
                                             <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0">
                                                <p class="cc six-storage-center-align six-storage-grid-m0">
                                                   <label>
                                                      <input type="checkbox" id="six_storage_online_fs_ti_identitydocument_is_mandatory" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_identitydocument_is_mandatory) == '1') { echo esc_attr('checked'); } ?> class="cc six-storage-input-field"/>
                                                      <span ></span>
                                                   </label>
                                                </p>
                                             </div>
                                          </div>
                                          <div class="six-storage-row cc">
                                             <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                <div class="six-storage-switch cc ">
                                                   <label>
                                                      <div style="display: flex;">
                                                               <div>
                                                      <input type="checkbox" id="six_storage_online_fs_ti_SSN_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_SSN_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                      <span class="six-storage-lever"></span>
                                                   </div>
                                                   <div>
                                                      <span class="six-storage-field_label cc">SSN</span></div></div>
                                                   </label>
                                                </div>
                                             </div>
                                             <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0">
                                                <p class="cc six-storage-center-align six-storage-grid-m0">
                                                   <label>
                                                      <input type="checkbox" id="six_storage_online_fs_ti_SSN_is_mandatory" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ti_SSN_is_mandatory) == '1') { echo esc_attr('checked'); } ?> class="cc six-storage-input-field"/>
                                                      <span ></span>
                                                   </label>
                                                </p>
                                             </div>
                                          </div>
                                       </div>
                                    </div>                                    
                                 </div>
                              </div>
                              <div class="six-storage-row cc ">
                                 <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12">
                                    <p class="cc six-storage-center-align"><input type="button" id="six_storage_online_TenantInfoSaveBtn" class="six-storage-btn six-storage-btn-primary" value="Save"></p>
                                 </div>
                              </div>
                           </form>
                        </div>
                        <!--Addons-->
                        <div class="six-storage-col six-storage-m12" id="six-storage-addons">
                           <form id='six-storage-template-ajax-url' class="cc" action="#" method="post" data-url="<?php echo esc_attr(admin_url('admin-ajax.php')) ?>" data-culture="<?php echo esc_attr(json_decode(get_option("six_storage_online_api_culture"), true)['culture']) ?>" data-date_format="<?php echo esc_attr(json_decode(get_option("six_storage_online_api_culture"), true)['shortDate']) ?>" data-currency_format="<?php echo esc_attr(json_decode(get_option("six_storage_online_api_culture"), true)['currency']) ?>">
                              <div class="six-storage-row cc">
                                 <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12">
                                    <div class="six-storage-row cc " style="margin-bottom: 0px ;">
                                       <div class="six-storage-col six-storage-s12 six-storage-m12 six-storage-l6 cc">
                                          <div class="six-storage-row cc">
                                             <div class="six-storage-col six-storage-s6 six-storage-l6 six-storage-m6 cc ">
                                                <p class="cc six-storage-Tenant-info-head six-storage-center-align">Fields</p>
                                             </div>
                                             <div class="six-storage-col six-storage-s6 six-storage-l6 six-storage-m6 cc ">
                                                <p class="cc six-storage-Tenant-info-head" style="float:right;">Make Mandatory</p>
                                             </div>
                                          </div>
                                          <div class="six-storage-row cc">
                                             <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                <div class="six-storage-switch cc ">
                                                   <label>
                                                      <div style="display: flex;">
                                                               <div>
                                                      <input type="checkbox" id="six_storage_online_fs_ad_insurance_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ad_insurance_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                      <span class="six-storage-lever"></span></div>
                                                      <div>
                                                      <span class="six-storage-field_label cc">Insurance</span></div></div>
                                                   </label>
                                                </div>
                                             </div>
                                             <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0">
                                                <p class="cc six-storage-center-align six-storage-grid-m0">
                                                   <label>
                                                      <input type="checkbox" id="six_storage_online_fs_ad_insurance_is_mandatory" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ad_insurance_is_mandatory) == '1') { echo 'checked'; } ?> class="cc six-storage-input-field"/>
                                                      <span ></span>
                                                   </label>
                                                </p>
                                             </div>
                                          </div>
                                          <div class="six-storage-row cc">
                                             <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                <div class="six-storage-switch cc ">
                                                   <label>
                                                      <div style="display: flex;">
                                                               <div>
                                                      <input type="checkbox" id="six_storage_online_fs_ad_no_insurance_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ad_no_insurance_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                      <span class="six-storage-lever"></span>
                                                   </div>
                                                   <div>
                                                      <span class="six-storage-field_label cc">No Insurance</span></div></div>
                                                   </label>
                                                </div>
                                             </div>
                                          </div>

                                                <div class="six-storage-row cc">
                                                   <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                      <div class="six-storage-switch cc ">
                                                         <label>
                                                      <div style="display: flex;">
                                                         <div>
                                                            <input type="checkbox" id="six_storage_online_fs_ad_post_booking_insurance_popup_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ad_post_booking_insurance_popup_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                            <span class="six-storage-lever"></span>
                                                         </div>
                                                         <div>
                                                            <span class="six-storage-field_label cc">Display post booking purchase pop-up</span>
                                                         </div>
                                                      </div>
                                                   </label>
                                                </div>
                                             </div>
                                          </div>

                                                <div class="six-storage-row cc">
                                                   <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                      <div class="six-storage-switch cc ">
                                                         <label>
                                                      <div style="display: flex;">
                                                               <div>
                                                            <input type="checkbox" id="six_storage_online_fs_ad_third_party_insurance_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ad_third_party_insurance_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                            <span class="six-storage-lever"></span>
                                                   </div><div>
                                                            <span class="six-storage-field_label cc">I have my own insurance</span></div></div>
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0" style="display:none">
                                                      <p class="cc six-storage-center-align six-storage-grid-m0">
                                                         <label>
                                                            <input type="checkbox" id="six_storage_online_fs_ad_third_party_insurance_is_mandatory" class="cc six-storage-input-field" disabled />
                                                            <span ></span>
                                                         </label>
                                                      </p>
                                                   </div>
                                                </div>
                                                <div class="six-storage-row cc">
                                                   <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                      <div class="six-storage-switch cc ">
                                                         <label>
                                                      <div style="display: flex;">
                                                               <div>
                                                            <input type="checkbox" id="six_storage_online_insurance_policy_providername_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_insurance_policy_providername_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                            <span class="six-storage-lever"></span>
                                                   </div>
                                                   <div>
                                                      <span class="six-storage-field_label cc">Insurance policy provider name</span></div></div>
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0">
                                                      <p class="cc six-storage-center-align six-storage-grid-m0">
                                                         <label>
                                                            <input type="checkbox" id="six_storage_online_insurance_policy_providername_is_mandatory" <?php if(get_option($six_storage_settingsKey->six_storage_online_insurance_policy_providername_is_mandatory) == '1') { echo esc_attr('checked'); } ?> class="cc six-storage-input-field"/>
                                                            <span ></span>
                                                         </label>
                                                      </p>
                                                   </div>
                                                </div>
                                                <div class="six-storage-row cc">
                                                   <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                      <div class="six-storage-switch cc ">
                                                         <label>
                                                      <div style="display: flex;">
                                                               <div>
                                                            <input type="checkbox" id="six_storage_online_fs_ad_third_party_insurance_start_date_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ad_third_party_insurance_start_date_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                      <span class="six-storage-lever"></span></div><div>
                                                      <span class="six-storage-field_label cc">Third party insurance start date</span></div></div>
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0">
                                                      <p class="cc six-storage-center-align six-storage-grid-m0">
                                                         <label>
                                                            <input type="checkbox" id="six_storage_online_fs_ad_third_party_insurance_start_date_is_mandatory" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ad_third_party_insurance_start_date_is_mandatory) == '1') { echo esc_attr('checked'); } ?> class="cc six-storage-input-field"/>
                                                            <span ></span>
                                                         </label>
                                                      </p>
                                                   </div>
                                                </div>
                                                <div class="six-storage-row cc">
                                                   <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                      <div class="six-storage-switch cc ">
                                                         <label>
                                                      <div style="display: flex;">
                                                               <div>
                                                            <input type="checkbox" id="six_storage_online_fs_ad_third_party_insurance_end_date_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ad_third_party_insurance_end_date_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                      <span class="six-storage-lever"></span></div><div>
                                                      <span class="six-storage-field_label cc">Third party insurance end date</span></div></div>
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0">
                                                      <p class="cc six-storage-center-align six-storage-grid-m0">
                                                         <label>
                                                            <input type="checkbox" id="six_storage_online_fs_ad_third_party_insurance_end_date_is_mandatory" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ad_third_party_insurance_end_date_is_mandatory) == '1') { echo esc_attr('checked'); } ?> class="cc six-storage-input-field"/>
                                                            <span ></span>
                                                         </label>
                                                      </p>
                                                   </div>
                                                </div>
                                                <div class="six-storage-row cc">
                                                   <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                      <div class="six-storage-switch cc ">
                                                         <label>
                                                      <div style="display: flex;">
                                                               <div>
                                                            <input type="checkbox" id="six_storage_online_fs_ad_third_party_insurance_policy_number_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ad_third_party_insurance_policy_number_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                            <span class="six-storage-lever"></span>
                                                   </div>
                                                   <div>
                                                      <span class="six-storage-field_label cc">Third party insurance policy#</span></div></div>
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0">
                                                      <p class="cc six-storage-center-align six-storage-grid-m0">
                                                         <label>
                                                            <input type="checkbox" id="six_storage_online_fs_ad_third_party_insurance_policy_number_is_mandatory" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ad_third_party_insurance_policy_number_is_mandatory) == '1') { echo esc_attr('checked'); } ?> class="cc six-storage-input-field"/>
                                                            <span ></span>
                                                         </label>
                                                      </p>
                                                   </div>
                                                </div>
                                                <div class="six-storage-row cc">
                                                   <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                      <div class="six-storage-switch cc ">
                                                         <label>
                                                      <div style="display: flex;">
                                                               <div>
                                                            <input type="checkbox" id="six_storage_online_insurance_policy_phonenumber_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_insurance_policy_phonenumber_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                            <span class="six-storage-lever"></span>
                                                   </div>
                                                   <div>
                                                      <span class="six-storage-field_label cc">Insurance policy phone number</span></div></div>
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0">
                                                      <p class="cc six-storage-center-align six-storage-grid-m0">
                                                         <label>
                                                            <input type="checkbox" id="six_storage_online_insurance_policy_phonenumber_is_mandatory" <?php if(get_option($six_storage_settingsKey->six_storage_online_insurance_policy_phonenumber_is_mandatory) == '1') { echo esc_attr('checked'); } ?> class="cc six-storage-input-field"/>
                                                            <span ></span>
                                                         </label>
                                                      </p>
                                                   </div>
                                                </div>



                                                <div class="six-storage-row cc">
                                                   <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                      <div class="six-storage-switch cc ">
                                                         <label>
                                                            <input type="checkbox" id="six_storage_online_fs_of_key_in_safe_box_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_of_key_in_safe_box_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                            <span class="six-storage-lever"></span>
                                                            <span class="six-storage-field_label cc">Key In Safe Box</span>
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0">
                                                      <p class="cc six-storage-center-align six-storage-grid-m0">
                                                         <label>
                                                            <input type="checkbox"  id="six_storage_online_fs_of_key_in_safe_box_is_mandatory" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_of_key_in_safe_box_is_mandatory) == '1') { echo esc_attr('checked'); } ?> class="cc six-storage-input-field" disabled />
                                                            <span ></span>
                                                         </label>
                                                      </p>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="six-storage-col six-storage-s12 six-storage-m12 six-storage-l6 cc">
                                                <div class="six-storage-secondSideHead">
                                                   <div class="six-storage-row cc">
                                                      <div class="six-storage-col six-storage-s6 six-storage-l6 six-storage-m6 cc ">
                                                         <p class="cc six-storage-Tenant-info-head six-storage-center-align">Fields</p>
                                                      </div>
                                                      <div class="six-storage-col six-storage-s6 six-storage-l6 six-storage-m6 cc ">
                                                         <p class="cc six-storage-Tenant-info-head" style="float:right;">Make Mandatory</p>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="six-storage-row cc">
                                                   <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                      <div class="six-storage-switch cc ">
                                                         <label>
                                                      <div style="display: flex;">
                                                               <div>
                                                            <input type="checkbox" id="six_storage_online_fs_of_additional_months_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_of_additional_months_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                      <span class="six-storage-lever"></span></div><div>
                                                      <span class="six-storage-field_label cc">Additional Months</span></div></div>
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0">
                                                      <p class="cc six-storage-center-align six-storage-grid-m0">
                                                         <label>
                                                            <input type="checkbox" type="checkbox" id="six_storage_online_fs_of_additional_months_is_mandatory" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_of_additional_months_is_mandatory) == '1') { echo esc_attr('checked'); } ?> class="cc six-storage-input-field" disabled />
                                                            <span ></span>
                                                         </label>
                                                      </p>
                                                   </div>
                                                </div>
                                                <div class="six-storage-row cc">
                                                   <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                      <div class="six-storage-switch cc ">
                                                         <label>
                                                      <div style="display: flex;">
                                                               <div>
                                                         <input type="checkbox" id="six_storage_online_fs_ad_delivery_address_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ad_delivery_address_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                      <span class="six-storage-lever"></span></div><div>
                                                      <span class="six-storage-field_label cc">Delivery Address</span></div></div>
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0">
                                                      <p class="cc six-storage-center-align six-storage-grid-m0">
                                                         <label>
                                                         <input type="checkbox" id="six_storage_online_fs_ad_delivery_address_is_mandatory" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ad_delivery_address_is_mandatory) == '1') { echo esc_attr('checked'); } ?> class="cc six-storage-input-field"/>
                                                            <span ></span>
                                                         </label>
                                                      </p>
                                                   </div>
                                                </div>
                                                <div class="six-storage-row cc">
                                                   <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                      <div class="six-storage-switch cc ">
                                                         <label>
                                                            <input type="checkbox" id="six_storage_online_fs_of_lead_source_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_of_lead_source_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                            <span class="six-storage-lever"></span>
                                                            <span class="six-storage-field_label cc">Lead Source</span>
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0">
                                                      <p class="cc six-storage-center-align six-storage-grid-m0">
                                                         <label>
                                                            <input type="checkbox" id="six_storage_online_fs_of_lead_source_is_mandatory" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_of_lead_source_is_mandatory) == '1') { echo esc_attr('checked'); } ?> class="cc six-storage-input-field"/>
                                                            <span ></span>
                                                         </label>
                                                      </p>
                                                   </div>
                                                </div>
                                                <div class="six-storage-row cc">
                                                   <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                      <div class="six-storage-switch cc ">
                                                         <label>
                                                      <div style="display: flex;">
                                                               <div>
                                                            <input type="checkbox" id="six_storage_online_fs_of_schedule_move_out_date_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_of_schedule_move_out_date_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                      <span class="six-storage-lever"></span></div><div>
                                                      <span class="six-storage-field_label cc">Desired Move-out</span></div></div>
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0">
                                                      <p class="cc six-storage-center-align six-storage-grid-m0">
                                                         <label>
                                                            <input type="checkbox" id="six_storage_online_fs_of_schedule_move_out_date_is_mandatory" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_of_schedule_move_out_date_is_mandatory) == '1') { echo esc_attr('checked'); } ?> class="cc six-storage-input-field"/>
                                                            <span ></span>
                                                         </label>
                                                      </p>
                                                   </div>
                                                </div>
                                                <div class="six-storage-row cc">
                                                   <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                      <div class="six-storage-switch cc ">
                                                         <label>
                                                            <input type="checkbox" id="six_storage_online_fs_ad_merchandise_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ad_merchandise_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                            <span class="six-storage-lever"></span>
                                                            <span class="six-storage-field_label cc">Merchandise</span>
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0">
                                                      <p class="cc six-storage-center-align six-storage-grid-m0">
                                                         <label>
                                                            <input type="checkbox" id="six_storage_online_fs_ad_merchandise_is_mandatory" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ad_merchandise_is_mandatory) == '1') { echo esc_attr('checked'); } ?> class="cc six-storage-input-field"/>
                                                            <span ></span>
                                                         </label>
                                                      </p>
                                                   </div>
                                                </div>

                                                <div class="six-storage-row cc">
                                                   <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                      <div class="six-storage-switch cc ">
                                                         <label>
                                                            <input type="checkbox" id="six_storage_online_fs_ad_services_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ad_services_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                            <span class="six-storage-lever"></span>
                                                            <span class="six-storage-field_label cc">Services</span>
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0">
                                                      <p class="cc six-storage-center-align six-storage-grid-m0">
                                                         <label>
                                                            <input type="checkbox" id="six_storage_online_fs_ad_services_is_mandatory" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ad_services_is_mandatory) == '1') { echo esc_attr('checked'); } ?> class="cc six-storage-input-field"/>
                                                            <span ></span>
                                                         </label>
                                                      </p>
                                                   </div>
                                                </div>
                                          <!-- hubspot integration -->
                                                <div class="six-storage-row cc">
                                                   <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                      <div class="six-storage-switch cc ">
                                                         <label>
                                                            <input type="checkbox" id="six_storage_online_hubspot_pickup_integration_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_hubspot_pickup_integration_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                            <span class="six-storage-lever"></span>
                                                            <span class="six-storage-field_label cc">Hubspot</span>
                                                         </label>
                                                      </div>
                                                   </div>
                                                </div>
                                                <?php $six_storage_hubspot_toggle_input_val = get_option('six_storage_online_hubspot_pickup_integration_toggle') == "1" ? "" : "display:none";  ?>
                                                <div id="six-storage-hubspot-input-container" style="<?php echo esc_attr($six_storage_hubspot_toggle_input_val) ?>">
                                                   <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12 cc six-storage-grid-p0 six-storage-input-field">
                                                      <span class="six-storage-field_label">Hubspot URL</span>
                                                      <input type="text" class="cc" id="six_storage_online_hubspot_url"  value="<?php echo esc_attr(get_option($six_storage_settingsKey->six_storage_online_hubspot_url)); ?>" >
                                                      <div style="display: none;" id="six-storage-hubspot-url-err" class="six-storage-invalid-feedback"></div>
                                                   </div>
                                                </div>
                                          <!-- hubspot integration end-->
                                          <!-- Movein Flow Note -->
                                          <div class="six-storage-row cc">
                                                   <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                      <div class="six-storage-switch cc ">
                                                         <label>
                                                      <div style="display: flex;">
                                                               <div>
                                                            <input type="checkbox" id="six_storage_online_move_in_flow_note_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_move_in_flow_note_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                      <span class="six-storage-lever"></span></div>
                                                      <div>
                                                            <span class="six-storage-field_label cc">Move-in Note</span>
                                                      <span class="six-storage-grid-ml10 six-storage-help_text"><i class="six-storage-material-icons six-storage-tiny six-storage-movein-note-tooltip six-storage-icon-align">help_outline</i></span>
                                                   </div></div>
                                                         </label>
                                                   
                                                      </div>
                                                   </div>
                                                </div>



                                                <?php $six_storage_movein_flow_note_toggle_input_val = get_option('six_storage_online_move_in_flow_note_toggle') == "1" ? "" : "display:none";  ?>
                                                <div id = "six-storage-movein-toggle-notes-items" style="<?php echo esc_attr($six_storage_movein_flow_note_toggle_input_val) ?>">
                                                <div id="six-storage-move-in-note-input-container">
                                                   <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12 cc six-storage-grid-p0 six-storage-input-field">
                                                      <span class="six-storage-field_label">Rent Now Note</span>
                                                      <textarea  class="six-storage-materialize-textarea cc" id="six-storage-moveinnote" maxlength="150"><?php echo esc_attr(get_option($six_storage_settingsKey->six_storage_online_move_in_note));?></textarea>
                                                      <div style="display: none;" id="six-storage-moveinnote-err" class="six-storage-invalid-feedback"></div>
                                                   </div>
                                                </div>
                                             
                                                <div id="six-storage-move-in-note-input-container">
                                                   <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12 cc six-storage-grid-p0 six-storage-input-field" id ="sixstoragemoveinsteps">
                                                      <span class="six-storage-field_label">Storage Note</span>
                                                      <textarea  class="six-storage-materialize-textarea cc" id="six_storage_online_storage_details" maxlength="150"><?php echo esc_attr(get_option($six_storage_settingsKey->six_storage_online_storage_details));?></textarea>
                                                      <div style="display: none;" id="six-storage-details-note-err" class="six-storage-invalid-feedback"></div>
                                                   </div>
                                                </div>

                                                <div id="six-storage-move-in-note-input-container">
                                                   <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12 cc six-storage-grid-p0 six-storage-input-field"  id ="sixstoragemoveinsteps">
                                                      <span class="six-storage-field_label">Addons Note</span>
                                                      <textarea  class="six-storage-materialize-textarea cc" id="six_storage_online_addons_details" maxlength="150"><?php echo esc_attr(get_option($six_storage_settingsKey->six_storage_online_addons_details));?></textarea>
                                                      <div style="display: none;" id="six-storage-addon-note-err" class="six-storage-invalid-feedback"></div>
                                                   </div>
                                                </div>

                                                <div id="six-storage-move-in-note-input-container">
                                                   <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12 cc six-storage-grid-p0 six-storage-input-field"  id ="sixstoragemoveinsteps">
                                                      <span class="six-storage-field_label">Tenant Details Note</span>
                                                      <textarea  class="six-storage-materialize-textarea cc" id="six_storage_online_tenant_details" maxlength="150"><?php echo esc_attr(get_option($six_storage_settingsKey->six_storage_online_tenant_details));?></textarea>
                                                      <div style="display: none;" id="six-storage-tenant-details-note-err" class="six-storage-invalid-feedback"></div>
                                                   </div>
                                                </div>

                                                <div id="six-storage-move-in-note-input-container">
                                                   <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12 cc six-storage-grid-p0 six-storage-input-field"  id ="sixstoragemoveinsteps">
                                                      <span class="six-storage-field_label">Preview & Payment Note</span>
                                                      <textarea  class="six-storage-materialize-textarea cc" id="six_storage_online_payment_details" maxlength="150"><?php echo esc_attr(get_option($six_storage_settingsKey->six_storage_online_payment_details));?></textarea>
                                                      <div style="display: none;" id="six-storage-payment-preview-note-err" class="six-storage-invalid-feedback"></div>
                                                   </div>
                                                </div>

                                                   </div>


                                          <!-- End of move-in flow note  -->
                                          <!-- File Upload Note -->
                                          <div class="six-storage-row cc">
                                                   <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                      <div class="six-storage-switch cc ">
                                                         <label>
                                                       <div style="display: flex;">
                                                               <div>
                                                            <input type="checkbox" id="six_storage_online_file_upload_note_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_file_upload_note_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                      <span class="six-storage-lever"></span></div><div>
                                                            <span class="six-storage-field_label cc">File-Upload Note</span>
                                                       <span class="six-storage-grid-ml10 six-storage-help_text"><i class="six-storage-material-icons six-storage-tiny six-storage-fileupload-note-tooltip six-storage-icon-align">help_outline</i></span></div></div>
                                                         </label>
                                                  
                                                      </div>
                                                   </div>
                                                </div>
                                                <?php $six_storage_file_upload_note_toggle_input_val = get_option('six_storage_online_file_upload_note_toggle') == "1" ? "" : "display:none";  ?>
                                                <div id="six-storage-file-upload-note-input-container" style="<?php echo esc_attr($six_storage_file_upload_note_toggle_input_val) ?>">
                                                   <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12 cc six-storage-grid-p0 six-storage-input-field">
                                                      <span class="six-storage-field_label">Note</span>
                                                      <textarea  class="six-storage-materialize-textarea cc" rows="4" id="six_storage_online_file_upload_note" maxlength="150"><?php echo esc_attr(get_option($six_storage_settingsKey->six_storage_online_file_upload_note));?></textarea>
                                                      <div style="display: none;" id="six-storage-file-upload-note-err" class="six-storage-invalid-feedback"></div>
                                                   </div>
                                                </div>
                                          <!-- End of file upload note  -->
                                                <div class="six-storage-row cc">
                                                   <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0" style="margin-top:5%">
                                                      <div class="six-storage-switch cc ">
                                                         <label>
                                                            <input type="checkbox" id="six_storage_online_fs_ad_vehicle_info_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ad_vehicle_info_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                            <span class="six-storage-lever"></span>
                                                            <span class="six-storage-field_label cc">Vehicle Info</span>
                                                         </label>
                                                      </div>
                                                   </div>
                                                   <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0" style="margin-top:5%">
                                                      <p class="cc six-storage-center-align six-storage-grid-m0">
                                                         <label>
                                                            <input type="checkbox" id="six_storage_online_fs_ad_vehicle_info_is_mandatory"  <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ad_vehicle_info_is_mandatory) == '1') { echo esc_attr('checked'); } ?> class="cc six-storage-input-field"/>
                                                            <span ></span>
                                                         </label>
                                                      </p>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div id="six-storage-vehicle_sub_fields" style="display:none;">
                                             <div class="six-storage-row cc">
                                                <div class="six-storage-col six-storage-s12 six-storage-m12 six-storage-l6 cc">
                                                   <div class="six-storage-row cc">
                                                      <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                         <div class="six-storage-switch cc ">
                                                            <label>
                                                               <input type="checkbox" id="six_storage_online_fs_ad_vehicle_type_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ad_vehicle_type_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                               <span class="six-storage-lever"></span>
                                                               <span class="six-storage-field_label cc">Vehicle Type</span>
                                                            </label>
                                                         </div>
                                                      </div>
                                                      <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0">
                                                         <p class="cc six-storage-center-align six-storage-grid-m0">
                                                            <label>
                                                               <input type="checkbox" id="six_storage_online_fs_ad_vehicle_type_is_mandatory" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ad_vehicle_type_is_mandatory) == '1') { echo esc_attr('checked'); } ?> class="cc six-storage-input-field"/>
                                                               <span ></span>
                                                            </label>
                                                         </p>
                                                      </div>
                                                   </div>
                                                   <div class="six-storage-row cc">
                                                      <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                         <div class="six-storage-switch cc ">
                                                            <label>
                                                               <input type="checkbox" id="six_storage_online_fs_ad_vehicle_brand_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ad_vehicle_brand_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                               <span class="six-storage-lever"></span>
                                                               <span class="six-storage-field_label cc">Vehicle Brand</span>
                                                            </label>
                                                         </div>
                                                      </div>
                                                      <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0">
                                                         <p class="cc six-storage-center-align six-storage-grid-m0">
                                                            <label>
                                                               <input type="checkbox" id="six_storage_online_fs_ad_vehicle_brand_is_mandatory" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ad_vehicle_brand_is_mandatory) == '1') { echo esc_attr('checked'); } ?> class="cc six-storage-input-field"/>
                                                               <span ></span>
                                                            </label>
                                                         </p>
                                                      </div>
                                                   </div>
                                                   <div class="six-storage-row cc">
                                                      <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                         <div class="six-storage-switch cc ">
                                                            <label>
                                                               <input type="checkbox" id="six_storage_online_fs_ad_vehicle_make_color_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ad_vehicle_make_color_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                               <span class="six-storage-lever"></span>
                                                               <span class="six-storage-field_label cc">Vehicle Color</span>
                                                            </label>
                                                         </div>
                                                      </div>
                                                      <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0">
                                                         <p class="cc six-storage-center-align six-storage-grid-m0">
                                                            <label>
                                                               <input type="checkbox" id="six_storage_online_fs_ad_vehicle_make_color_is_mandatory" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ad_vehicle_make_color_is_mandatory) == '1') { echo esc_attr('checked'); } ?> class="cc six-storage-input-field"/>
                                                               <span ></span>
                                                            </label>
                                                         </p>
                                                      </div>
                                                   </div>
                                                   <div class="six-storage-row cc">
                                                      <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                         <div class="six-storage-switch cc ">
                                                            <label>
                                                         <div style="display: flex;">
                                                               <div>
                                                               <input type="checkbox" id="six_storage_online_fs_ad_vehicle_registration_number_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ad_vehicle_registration_number_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                         <span class="six-storage-lever"></span></div>
                                                         <div>
                                                         <span class="six-storage-field_label cc">Vehicle Registration Number</span></div></div>
                                                            </label>
                                                         </div>
                                                      </div>
                                                      <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0">
                                                         <p class="cc six-storage-center-align six-storage-grid-m0">
                                                            <label>
                                                               <input type="checkbox" id="six_storage_online_fs_ad_vehicle_registration_number_is_mandatory" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ad_vehicle_registration_number_is_mandatory) == '1') { echo esc_attr('checked'); } ?> class="cc six-storage-input-field"/>
                                                               <span ></span>
                                                            </label>
                                                         </p>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="six-storage-col six-storage-s12 six-storage-m12 six-storage-l6 cc">
                                                   <div class="six-storage-row cc">
                                                      <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                         <div class="six-storage-switch cc ">
                                                            <label>
                                                               <input type="checkbox" id="six_storage_online_fs_ad_vehicle_manufactured_year_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ad_vehicle_manufactured_year_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                               <span class="six-storage-lever"></span>
                                                               <span class="six-storage-field_label cc">Vehicle Year</span>
                                                            </label>
                                                         </div>
                                                      </div>
                                                      <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0">
                                                         <p class="cc six-storage-center-align six-storage-grid-m0">
                                                            <label>
                                                               <input type="checkbox" id="six_storage_online_fs_ad_vehicle_manufactured_year_is_mandatory" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ad_vehicle_manufactured_year_is_mandatory) == '1') { echo esc_attr('checked'); } ?> class="cc six-storage-input-field"/>
                                                               <span ></span>
                                                            </label>
                                                         </p>
                                                      </div>
                                                   </div>
                                                   <div class="six-storage-row cc">
                                                      <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                         <div class="six-storage-switch cc ">
                                                            <label>
                                                               <input type="checkbox" id="six_storage_online_fs_ad_vehicle_model_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ad_vehicle_model_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                               <span class="six-storage-lever"></span>
                                                               <span class="six-storage-field_label cc">Vehicle Model</span>
                                                            </label>
                                                         </div>
                                                      </div>
                                                      <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0">
                                                         <p class="cc six-storage-center-align six-storage-grid-m0">
                                                            <label>
                                                               <input type="checkbox" id="six_storage_online_fs_ad_vehicle_model_is_mandatory" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ad_vehicle_model_is_mandatory) == '1') { echo esc_attr('checked'); } ?> class="cc six-storage-input-field"/>
                                                               <span ></span>
                                                            </label>
                                                         </p>
                                                      </div>
                                                   </div>
                                                   <div class="six-storage-row cc">
                                                      <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                         <div class="six-storage-switch cc ">
                                                            <label>
                                                         <div style="display: flex;">
                                                               <div>
                                                               <input type="checkbox" id="six_storage_online_fs_ad_vehicle_licence_state_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ad_vehicle_licence_state_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                         <span class="six-storage-lever"></span></div><div>
                                                         <span class="six-storage-field_label cc">Vehicle Licence State</span></div></div>
                                                            </label>
                                                         </div>
                                                      </div>
                                                      <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0">
                                                         <p class="cc six-storage-center-align six-storage-grid-m0">
                                                            <label>
                                                               <input type="checkbox" id="six_storage_online_fs_ad_vehicle_licence_state_is_mandatory" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ad_vehicle_licence_state_is_mandatory) == '1') { echo esc_attr('checked'); } ?> class="cc six-storage-input-field"/>
                                                               <span ></span>
                                                            </label>
                                                         </p>
                                                      </div>
                                                   </div>
                                                   <div class="six-storage-row cc">
                                                      <div class="six-storage-col six-storage-s10 six-storage-l8 six-storage-m10 cc six-storage-grid-p0">
                                                         <div class="six-storage-switch cc ">
                                                            <label>
                                                               <input type="checkbox" id="six_storage_online_fs_ad_vehicle_licence_number_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ad_vehicle_licence_number_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                               <span class="six-storage-lever"></span>
                                                               <span class="six-storage-field_label cc">Licence Number</span>
                                                            </label>
                                                         </div>
                                                      </div>
                                                      <div class="six-storage-col six-storage-s2 six-storage-l4 six-storage-m2 cc six-storage-grid-p0">
                                                         <p class="cc six-storage-center-align six-storage-grid-m0">
                                                            <label>
                                                               <input type="checkbox" id="six_storage_online_fs_ad_vehicle_licence_number_is_mandatory" <?php if(get_option($six_storage_settingsKey->six_storage_online_fs_ad_vehicle_licence_number_is_mandatory) == '1') { echo esc_attr('checked'); } ?> class="cc six-storage-input-field"/>
                                                               <span ></span>
                                                            </label>
                                                         </p>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div> 
                                       </div>
                                       <!-- <div class="six-storage-col six-storage-s12 six-storage-l4 six-storage-m4 six-storage-hide">
                                          <div >
                                             <div class="six-storage-row cc ">
                                                <div class="six-storage-col-12">
                                                   <p class="cc six-storage-Tenant-info-head">Preview</p>
                                                </div>
                                             </div>
                                          </div>
                                       </div> -->
                                    </div>
                                    <div class="six-storage-row cc ">
                                       <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12">
                                          <p class="cc six-storage-center-align"><input type="button" id="six_storage_online_save_addons" class="six-storage-btn six-storage-btn-primary" value="Save"></p>
                                       </div>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Feature Customization -->
                  <div id="six-storage-feature-customization" class="six-storage-tab-content" style="width:100%">
                     <form id='six-storage-template-ajax-url' class="cc" action="#" method="post" data-url="<?php echo esc_attr(admin_url('admin-ajax.php')) ?>" data-culture="<?php echo esc_attr(json_decode(get_option("six_storage_online_api_culture"), true)['culture']) ?>" data-date_format="<?php echo esc_attr(json_decode(get_option("six_storage_online_api_culture"), true)['shortDate']) ?>" data-currency_format="<?php echo esc_attr(json_decode(get_option("six_storage_online_api_culture"), true)['currency']) ?>">
                        <div class="six-storage-row cc">
                           <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12">
                              <div class="six-storage-row cc ">
                                 <div class="six-storage-col six-storage-s12 six-storage-m12 six-storage-l6 cc">
                                    <div class="six-storage-row cc">
                                       <div class="six-storage-col six-storage-s6 six-storage-l6 six-storage-m6 cc six-storage-grid-p0">
                                          <p class="cc six-storage-feature-info-head">Fields</p>
                                       </div>
                                    </div>
                                    <div class="six-storage-row cc">
                                       <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12 cc six-storage-grid-p0">
                                          <div class="six-storage-switch cc ">
                                             <label>
                                                 <div style="display: flex;">
                                                <div>
                                             <input type="checkbox" id="six_storage_online_fc_group_the_unit_based_on_size_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fc_group_the_unit_based_on_size_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                <span class="six-storage-lever"></span></div><div>
                                                <span class="six-storage-field_label cc">Group the unit based on size</span><span class="six-storage-grid-ml10 six-storage-help_text"><a href="https://techsupport.6storage.com/support/solutions/articles/19000123907" target="_blank">Help</a><i class="six-storage-material-icons six-storage-tiny grouping six-storage-icon-align">help_outline</i></span></div></div>
                                             </label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="six-storage-row cc">
                                       <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12 cc six-storage-grid-p0">
                                          <div class="six-storage-switch cc ">
                                             <label>
                                                <input type="checkbox" id="six_storage_online_fc_vacancy_count_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fc_vacancy_count_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                <span class="six-storage-lever"></span>
                                                <span class="six-storage-field_label cc">Vacancy Count</span>
                                             </label>
                                             <span class="six-storage-grid-ml10 six-storage-help_text"><a href="https://techsupport.6storage.com/support/solutions/articles/19000123909" target="_blank">Help</a><i class="six-storage-material-icons six-storage-tiny vaccancy six-storage-icon-align">help_outline</i></span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="six-storage-row cc">
                                       <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12 cc six-storage-grid-p0">
                                          <div class="six-storage-switch cc">
                                             <label>
                                             <input type="checkbox" id="six_storage_online_fc_reservation_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fc_reservation_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                             <span class="six-storage-lever"></span>
                                             <span class="six-storage-field_label cc">Reservation</span>
                                             </label>
                                             <span class="six-storage-grid-ml10 six-storage-help_text"><a href="https://techsupport.6storage.com/support/solutions/articles/19000123910" target="_blank">Help</a><i class="six-storage-material-icons six-storage-tiny reservation six-storage-icon-align">help_outline</i></span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="six-storage-row cc">
                                       <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12 cc six-storage-grid-p0">
                                          <div class="six-storage-switch cc">
                                             <label>
                                                <input type="checkbox" id="six_storage_online_fc_rent_now_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fc_rent_now_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                <span class="six-storage-lever"></span>
                                                <span class="six-storage-field_label cc">Rent Now</span>
                                             </label>
                                             <span class="six-storage-grid-ml10 six-storage-help_text"><a href="https://techsupport.6storage.com/support/solutions/articles/19000123913" target="_blank">Help</a><i class="six-storage-material-icons six-storage-tiny rentnow six-storage-icon-align">help_outline</i></span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="six-storage-row cc" style="display:none;" >
                                       <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12 cc six-storage-grid-p0">
                                          <div class="six-storage-switch cc">
                                             <label>
                                             <input type="checkbox" id="six_storage_online_fc_pay_later_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fc_pay_later_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                             <span class="six-storage-lever"></span>
                                             <span class="six-storage-field_label cc">Pay Later </span>
                                             </label>
                                             <span class="six-storage-grid-ml10 six-storage-help_text"><a href="https://techsupport.6storage.com/support/solutions/articles/19000123922" target="_blank">Help</a><i class="six-storage-material-icons six-storage-tiny paylater six-storage-icon-align">help_outline</i></span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="six-storage-row cc">
                                       <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12 cc six-storage-grid-p0">
                                          <div class="six-storage-switch cc">
                                             <label>
                                                <input type="checkbox" id="six_storage_online_fc_business_user_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fc_business_user_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                <span class="six-storage-lever"></span>
                                                <span class="six-storage-field_label cc">Business User</span>
                                             </label>
                                             <span class="six-storage-grid-ml10 six-storage-help_text"><i class="six-storage-material-icons six-storage-tiny businessUser six-storage-icon-align">help_outline</i></span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="six-storage-row cc">
                                       <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12 cc six-storage-grid-p0">
                                          <div class="six-storage-switch cc">
                                             <label>
                                                <input type="checkbox" id="six_storage_online_fc_show_the_rental_with_tax_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fc_show_the_rental_with_tax_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                <span class="six-storage-lever"></span>
                                                <span class="six-storage-field_label cc">Show the rental with tax</span>
                                             </label>
                                             <span class="six-storage-grid-ml10 six-storage-help_text"><i class="six-storage-material-icons six-storage-tiny rentalTax six-storage-icon-align">help_outline</i></span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="six-storage-row cc">
                                       <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12 cc six-storage-grid-p0">
                                          <div class="six-storage-switch cc">
                                             <label>
                                                <input type="checkbox" id="six_storage_online_setup_preloader" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_setup_preloader) == '1') { echo esc_attr('checked'); } ?> />
                                                <span class="six-storage-lever"></span>
                                                <span class="six-storage-field_label cc">Change Preloader</span>
                                             </label>
                                             <span class="six-storage-grid-ml10 six-storage-help_text"><i class="six-storage-material-icons six-storage-tiny six-storage-preloaderSetup six-storage-icon-align">help_outline</i></span>
                                          </div> 
                                       </div>
                                    </div>
                                    <div class="six-storage-row cc">
                                       <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12 cc six-storage-grid-p0">
                                          <div class="six-storage-switch cc">
                                             <label>
                                                 <div style="display: flex;">
                                                               <div>
                                                <input type="checkbox" id="six_storage_online_display_next_invoice" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_display_next_invoice) == '1') { echo esc_attr('checked'); } ?> />
                                                <span class="six-storage-lever"></span></div><div>
                                                <span class="six-storage-field_label cc">Display Next Invoice Summary</span><span class="six-storage-grid-ml10 six-storage-help_text"><i class="six-storage-material-icons six-storage-tiny nextInvoice six-storage-icon-align">help_outline</i></span></div></div>
                                             </label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="six-storage-row cc">
                                       <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12 cc six-storage-grid-p0">
                                          <div class="six-storage-switch cc">
                                             <label>
                                                <input type="checkbox" id="six_storage_online_fc_moveindate_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fc_moveindate_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                <span class="six-storage-lever"></span>
                                                <span class="six-storage-field_label cc">Move-In Date</span>
                                             </label>
                                             <span class="six-storage-grid-ml10 six-storage-help_text"><i class="six-storage-material-icons six-storage-tiny moveInDate six-storage-icon-align">help_outline</i></span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="six-storage-row cc">
                                       <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12 cc six-storage-grid-p0 six-storage-input-field">
                                       <p>  Move in after &nbsp; <input type="text"  style="width:20% ;" class="cc" id="six_storage_online_fc_move_in_after"  value="<?php echo esc_attr(get_option($six_storage_settingsKey->six_storage_online_fc_move_in_after)); ?>" placeholder=""> &nbsp; day(s) from current date </p>
                                       
                                       <p> Display Movein date upto  &nbsp; <input type="text"  style="width:20% ;" class="cc" id="six_storage_online_fc_move_in_upto"  value="<?php echo esc_attr(get_option($six_storage_settingsKey->six_storage_online_fc_move_in_upto)); ?>" placeholder=""> &nbsp; day(s) </p>
                                          <!-- <label>Additional Months</label> -->
                                          <div style="display: none;" id="six_storage_online_fc_move_in_after-error" class="six-storage-invalid-feedback"></div> 
                                       </div>
                                    </div>        
                                    <div class="six-storage-row cc">
                                       <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12 cc six-storage-grid-p0 six-storage-input-field">
                                          <input  min="0" type="number" class="cc six-storage-grid-ml30 six-storage-grid-w-75" id="six_storage_online_fc_additional_month_custom_word"  value="<?php echo esc_attr(get_option($six_storage_settingsKey->six_storage_online_fc_additional_month_custom_word)); ?>" placeholder="">
                                          <label>Additional Months</label>
                                          <div style="display: none;" id="six_storage_online_fc_additional_month_custom_word-err" class="six-storage-invalid-feedback"></div>
                                       </div>
                                    </div>
                                    <div class="six-storage-row cc">
                                       <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12 cc six-storage-grid-p0">
                                          <div class="six-storage-switch cc">
                                             <label>
                                                <input type="checkbox" id="six_storage_online_tenant_activity_enable" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_tenant_activity_enable) == '1') { echo esc_attr('checked'); } ?> />
                                                <span class="six-storage-lever"></span>
                                                <span class="six-storage-field_label cc">Tenant Activity</span>
                                             </label>
                                             <span class="six-storage-grid-ml10 six-storage-help_text"></span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="six-storage-row cc" style="display:none">
                                    <div class="six-storage-col six-storage-s12  six-storage-l12 cc  six-storage-m12 cc six-storage-grid-p0">
                                       <div class="six-storage-switch cc">
                                          <label>
                                             <input type="checkbox" id="six_storage_online_tenant_location_enable" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_tenant_location_enable) == '1') { echo esc_attr('checked'); } ?> />
                                             <span class="six-storage-lever"></span>
                                             <span class="six-storage-field_label cc">Track Location</span>
                                          </label>
                                          <span class="six-storage-grid-ml10 six-storage-help_text"></span>
                                       </div>
                                    </div>
                                    <div class="six-storage-row cc">
                                    <div id="six-storage-tenant-activity-location-info">
                                       <input type="text" class="cc six-storage-grid-ml30 six-storage-grid-w-75" id="six_storage_online_tenant_location_api_key"  value="<?php echo esc_attr(get_option($six_storage_settingsKey->six_storage_online_tenant_location_api_key)); ?>" placeholder="Google Api Key">
                                       <div style="display: none;" id="six_storage_tenant_activity_location_info-err" class="six-storage-invalid-feedback"></div>
                                    </div>
                                 </div>
                                 </div>
                                    <div class="six-storage-row cc">
                                       <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12 cc six-storage-grid-p0">
                                          <div class="six-storage-switch cc">
                                             <label>
                                                <input type="checkbox" id="six_storage_online_google_analytics_enable" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_google_analytics_enable) == '1') { echo esc_attr('checked'); } ?> />
                                                <span class="six-storage-lever"></span>
                                                <span class="six-storage-field_label cc">Google Analytics</span>
                                             </label>
                                          </div>
                                       </div>
                                    </div>
                                    <?php $display_google_key_input = get_option('six_storage_online_google_analytics_enable') == "1" ? "" : "display:none";  ?>
                                    <div class="six-storage-row cc" id="six-storage-six-storage-google-key-input" style="<?php echo esc_attr($display_google_key_input) ?>">
                                       <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12 cc six-storage-grid-p0">
                                          <input type="text" class="cc six-storage-grid-ml30 six-storage-grid-w-75" id="six_storage_online_fc_google_analytics_key_word"  value="<?php echo esc_attr(get_option($six_storage_settingsKey->six_storage_online_fc_google_analytics_key_word)); ?>" placeholder="G-XXXXXXXX">
                                          <div style="display: none;" id="six-storage-google-analytics-error-msg" class="six-storage-invalid-feedback"></div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="six-storage-col six-storage-s12 six-storage-m12 six-storage-l6 cc">
                                    <div class="six-storage-row cc">
                                       <div class="six-storage-col six-storage-s6 six-storage-l6 six-storage-m6 cc six-storage-grid-p0">
                                          <p class="cc six-storage-feature-info-head">Additional Addons</p>
                                       </div>
                                    </div>
                                    <div class="six-storage-row cc">
                                       <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12 cc six-storage-grid-p0">
                                          <div class="six-storage-switch cc">
                                             <label>
                                                <input type="checkbox" id="six_storage_online_rent_single_unit" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_rent_single_unit) == '1') { echo esc_attr('checked'); } ?> />
                                                <span class="six-storage-lever"></span>
                                                <span class="six-storage-field_label cc">Rent Single Unit </span>
                                             </label>
                                             <span class="six-storage-grid-ml10 cc six-storage-help_text"><a href="https://techsupport.6storage.com/support/solutions/articles/19000123915" target="_blank">Help</a><i class="six-storage-material-icons six-storage-tiny six-storage-rentSingleUnit six-storage-icon-align">help_outline</i></span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="six-storage-row cc">
                                       <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12 cc six-storage-grid-p0">
                                          <div class="six-storage-switch cc">
                                             <label>
                                             <input type="checkbox" id="six_storage_online_fc_unit_type_name_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fc_unit_type_name_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                             <span class="six-storage-lever"></span>
                                             <span class="six-storage-field_label cc">Unit Type Name</span>
                                             </label>
                                             <span class="six-storage-grid-ml10 six-storage-help_text"><i class="six-storage-material-icons six-storage-tiny unitTypeName six-storage-icon-align">help_outline</i></span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="six-storage-row cc">
                                       <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12 cc six-storage-grid-p0">
                                          <div class="six-storage-switch cc">
                                             <label>
                                                <input type="checkbox" id="six_storage_online_fc_waitlist_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fc_waitlist_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                <span class="six-storage-lever"></span>
                                                <span class="six-storage-field_label cc">Waitlist Unit Enquiry</span>
                                             </label>
                                             <span class="six-storage-grid-ml10 six-storage-help_text"><a href="https://techsupport.6storage.com/support/solutions/articles/19000123919" target="_blank">Help</a><i class="six-storage-material-icons six-storage-tiny enquiry six-storage-icon-align">help_outline</i></span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="six-storage-row cc">
                                       <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12 cc six-storage-grid-p0">
                                          <div class="six-storage-switch cc">
                                             <label>
                                                <input type="checkbox" id="six_storage_online_fc_enquiry_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fc_enquiry_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                <span class="six-storage-lever"></span>
                                                <span class="six-storage-field_label cc">Tenant Unit Enquiry</span>
                                             </label>
                                             <span class="six-storage-grid-ml10 six-storage-help_text"><a href="https://techsupport.6storage.com/support/solutions/articles/19000123919" target="_blank">Help</a><i class="six-storage-material-icons six-storage-tiny enquiry six-storage-icon-align">help_outline</i></span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="six-storage-row cc">
                                       <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12 cc six-storage-grid-p0">
                                          <div class="six-storage-switch cc">
                                             <label>
                                                <input type="checkbox" id="six_storage_online_fc_unit_size_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fc_unit_size_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                <span class="six-storage-lever"></span>
                                                <span class="six-storage-field_label cc">Unit Size</span>
                                             </label>
                                             <span class="six-storage-grid-ml10 six-storage-help_text"><a href="https://techsupport.6storage.com/support/solutions/articles/19000123920" target="_blank">Help</a><i class="six-storage-material-icons six-storage-tiny unitsize six-storage-icon-align">help_outline</i></span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="six-storage-row cc">
                                       <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12 cc six-storage-grid-p0">
                                          <div class="six-storage-switch cc">
                                             <label>
                                                <input type="checkbox" id="six_storage_online_fc_unit_image_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fc_unit_image_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                <span class="six-storage-lever"></span>
                                                <span class="six-storage-field_label cc">Unit Image</span>
                                             </label>
                                             <span class="six-storage-grid-ml10 six-storage-help_text"><a href="#" target="_blank">Help</a><i class="six-storage-material-icons six-storage-tiny unitsize six-storage-icon-align">help_outline</i></span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="six-storage-row cc">
                                       <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12 cc six-storage-grid-p0">
                                          <div class="six-storage-switch cc">
                                             <label>
                                                <input type="checkbox" id="six_storage_online_fc_availability_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fc_availability_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                <span class="six-storage-lever"></span>
                                                <span class="six-storage-field_label cc"> Display vacant storages</span>
                                             </label>
                                             <span class="six-storage-grid-ml10 six-storage-help_text"><i class="six-storage-material-icons six-storage-tiny showOnlyVacantFilter six-storage-icon-align">help_outline</i></span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="six-storage-row cc">
                                       <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12 cc six-storage-grid-p0">
                                          <div class="six-storage-switch cc">
                                             <label>
                                                <input type="checkbox" id="six_storage_online_fc_hide_storage_category_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fc_hide_storage_category_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                <span class="six-storage-lever"></span>
                                                <span class="six-storage-field_label cc"> Hide Single Storage Category</span>
                                             </label>
                                             <span class="six-storage-grid-ml10 six-storage-help_text"><i class="six-storage-material-icons six-storage-tiny hideSingleUnitCategory six-storage-icon-align">help_outline</i></span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="six-storage-row cc" style="margin-bottom: 0px ;">
                                       <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12 cc six-storage-grid-p0">
                                          <div class="six-storage-switch cc">
                                             <label>
                                                <input type="checkbox" id="six_storage_online_fc_unit_description_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fc_unit_description_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                <span class="six-storage-lever"></span>
                                                <span class="six-storage-field_label cc">Unit Description</span>
                                             </label>
                                             <span class="six-storage-grid-ml10 six-storage-help_text"><i class="six-storage-material-icons six-storage-tiny unitDescription six-storage-icon-align">help_outline</i></span>
                                          </div>
                                          <div class="six-storage-col six-storage-s6 six-storage-l6 six-storage-m6 cc six-storage-grid-p0">
                                             <p class="cc six-storage-feature-info-head">Other Operations</p>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="six-storage-row cc">
                                       <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12 cc six-storage-grid-p0">
                                          <div class="six-storage-switch cc">
                                             <label>
                                                 <div style="display: flex;">
                                                               <div>
                                             <input type="checkbox" disabled id="six_storage_online_fc_onlinemoveout_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fc_onlinemoveout_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                <span class="six-storage-lever"></span></div><div>
                                                <span class="six-storage-field_label cc">Online Move Out <span class="six-storage-comingSoon-text">(Coming Soon)</span></span><span class="six-storage-grid-ml10 six-storage-help_text"><i class="six-storage-material-icons six-storage-tiny onlineMoveout six-storage-icon-align six-storage-hide">help_outline</i></span></div></div>
                                             </label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="six-storage-row cc">
                                       <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12 cc six-storage-grid-p0">
                                          <div class="six-storage-switch cc">
                                             <label>
                                                 <div style="display: flex;">
                                                               <div>
                                                <input type="checkbox" disabled id="six_storage_online_fc_proratemoveout_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fc_proratemoveout_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                <span class="six-storage-lever"></span></div>
                                                <div>
                                                <span class="six-storage-field_label cc">Prorate Move Out <span class="six-storage-comingSoon-text">(Coming Soon)</span></span><span class="six-storage-grid-ml10 six-storage-help_text"><i class="six-storage-material-icons six-storage-tiny six-storage-hide prorateMoveout six-storage-icon-align">help_outline</i></span></div></div>
                                             </label>
                                             
                                          </div>
                                       </div>
                                    </div>
                                    <div class="six-storage-row cc">
                                       <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12 cc six-storage-grid-p0">
                                          <div class="six-storage-switch cc">
                                             <label>
                                                <div style="display: flex;">
                                                               <div>
                                                <input type="checkbox" disabled id="six_storage_online_fc_charge_tenant_on_moveoutdate_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fc_charge_tenant_on_moveoutdate_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                <span class="six-storage-lever"></span></div><div>
                                                <span class="six-storage-field_label cc">Charge tenant on move out date <span class="six-storage-comingSoon-text">(Coming Soon)</span></span><span class="six-storage-grid-ml10 six-storage-help_text"><i class="six-storage-material-icons six-storage-tiny chargeMoveoutdate six-storage-hide six-storage-icon-align">help_outline</i></span></div></div>
                                             </label>
                                             
                                          </div>
                                       </div>
                                    </div>
                                    <div class="six-storage-row cc">
                                       <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12 cc six-storage-grid-p0">
                                          <div class="six-storage-switch cc ">
                                             <label>
                                                <div style="display: flex;">
                                                <div>
                                                <input type="checkbox" disabled class="cc" id="six_storage_online_fc_enable_site_map_in_booking_page_toggle" <?php if(get_option($six_storage_settingsKey->six_storage_online_fc_enable_site_map_in_booking_page_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                <span class="six-storage-lever"></span></div><div>
                                                <span class="six-storage-field_label  cc">Enable Site Map In Booking Page <span class="six-storage-comingSoon-text">(Coming Soon)</span></span><span class="six-storage-grid-ml10 six-storage-help_text"><i class="six-storage-material-icons six-storage-tiny six-storage-hide siteMap six-storage-icon-align">help_outline</i></span></div></div>
                                             </label>
                                             
                                          </div>
                                       </div>
                                    </div>
                                    <div class="six-storage-row cc">
                                       <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12 cc six-storage-grid-p0">
                                          <div class="six-storage-switch cc">
                                             <label>
                                                <input type="checkbox" id="six_storage_online_fc_schedule_moveout_toggle" class="cc" <?php if(get_option($six_storage_settingsKey->six_storage_online_fc_schedule_moveout_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                <span class="six-storage-lever"></span>
                                                <span class="six-storage-field_label cc">Schedule Move Out</span>
                                             </label>
                                             <span class="six-storage-grid-ml10 six-storage-help_text"><i class="six-storage-material-icons six-storage-tiny scheduleMovout six-storage-icon-align">help_outline</i></span>
                                          </div>
                                          <div id="six-storage-schedule_move_out-cont" style="margin-top: 5%;">
                                             <div class="six-storage-col six-storage-s6 six-storage-l6 cc">
                                                <span class="six-storage-field_label">Minimum Days</span>
                                                <input type="text" class="cc" id="six_storage_online_fc_schedule_minimum_days_custom_word" maxlength="3"   value="<?php echo esc_attr(get_option($six_storage_settingsKey->six_storage_online_fc_schedule_minimum_days_custom_word)); ?>" placeholder="Minimum Days">
                                                <div style="display: none;" id="six-storage-minimum_days_selection-err" class="six-storage-invalid-feedback">Selected Minimum days is Invalid</div>
                                             </div>
                                             <div  style="display: none;" class="six-storage-col six-storage-s6 six-storage-l6 cc">
                                                <span class="six-storage-field_label">Maximum Days</span>
                                                <input type="text" class="cc" format="yy-mm-dd" id="six_storage_online_fc_schedule_maximum_days_custom_word" maxlength="3"   value="<?php echo esc_attr(get_option($six_storage_settingsKey->six_storage_online_fc_schedule_maximum_days_custom_word)); ?>" placeholder="Maximum Days">
                                                <div style="display: none;" id="six-storage-maximum_days_selection-err" class="six-storage-invalid-feedback">Maximum days should not be less than Minimum days</div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>                              
                                    <!-- //Filtering options -->
                                    <div class="six-storage-row cc">
                                    <div class="six-storage-col six-storage-s6 six-storage-l6 six-storage-m6 cc six-storage-grid-p0">
                                             <p class="cc six-storage-feature-info-head" id="filtering-options">Filtering Options</p>
                                       </div>
                                    </div> 
                                 <div class = "six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12 cc six-storage-grid-p0">  

                                 <!-- first column filtering options -->
                                       <div class="six-storage-col six-storage-s6 six-storage-l6 six-storage-m6 cc six-storage-grid-p0">

                                    <div class="six-storage-row cc" style = "display:none;">
                                       <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12 cc six-storage-grid-p0">
                                          <div class="six-storage-switch cc ">
                                             <label>
                                                <input type="checkbox" class="cc" id="six_storage_online_fc_storage_category_toggle" disabled <?php if(get_option($six_storage_settingsKey->six_storage_online_fc_storage_category_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                <span class="six-storage-lever"></span>
                                                <span class="six-storage-field_label  cc">Storage Category </span>
                                             </label>
                                          </div>
                                       </div>
                                    </div>  
                                    
                                    <div class="six-storage-row cc">
                                       <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12 cc six-storage-grid-p0">
                                          <div class="six-storage-switch cc ">
                                             <label>
                                                <input type="checkbox"  class="cc" id="six_storage_online_fc_location_toggle" <?php if(get_option($six_storage_settingsKey->six_storage_online_fc_location_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                <span class="six-storage-lever"></span>
                                                <span class="six-storage-field_label  cc">Location </span>
                                             </label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="six-storage-row cc">
                                       <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12 cc six-storage-grid-p0">
                                          <div class="six-storage-switch cc ">
                                             <label>
                                                <input type="checkbox"  class="cc" id="six_storage_online_fc_building_toggle" <?php if(get_option($six_storage_settingsKey->six_storage_online_fc_building_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                <span class="six-storage-lever"></span>
                                                <span class="six-storage-field_label  cc">Building</span>
                                             </label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="six-storage-row cc">
                                       <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12 cc six-storage-grid-p0">
                                          <div class="six-storage-switch cc ">
                                             <label>
                                                <input type="checkbox"  class="cc" id="six_storage_online_fc_unit_type_toggle" <?php if(get_option($six_storage_settingsKey->six_storage_online_fc_unit_type_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                <span class="six-storage-lever"></span>
                                                <span class="six-storage-field_label  cc">Unit Type</span>
                                             </label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="six-storage-row cc">
                                       <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12 cc six-storage-grid-p0">
                                          <div class="six-storage-switch cc ">
                                             <label>
                                                <input type="checkbox"  class="cc" id="six_storage_online_fc_unit_size_filter_toggle" <?php if(get_option($six_storage_settingsKey->six_storage_online_fc_unit_size_filter_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                <span class="six-storage-lever"></span>
                                                <span class="six-storage-field_label  cc">Unit Size </span>
                                             </label>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- first column filtering options ended -->   
                                 <!-- second column filtering options -->
                                       <div class="six-storage-col six-storage-s6 six-storage-l6 six-storage-m6 cc six-storage-grid-p0">   

                                    <div class="six-storage-row cc">
                                       <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12 cc six-storage-grid-p0">
                                          <div class="six-storage-switch cc ">
                                             <label>
                                                <input type="checkbox"  class="cc" id="six_storage_online_fc_price_range_toggle" <?php if(get_option($six_storage_settingsKey->six_storage_online_fc_price_range_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                <span class="six-storage-lever"></span>
                                                <span class="six-storage-field_label  cc">Price Range </span>
                                             </label>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="six-storage-row cc six-storage-d-none">
                                       <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12 cc six-storage-grid-p0">
                                          <div class="six-storage-switch cc ">
                                             <label>
                                                <input type="checkbox"  class="cc" id="six_storage_online_fc_super_search_toggle" <?php if(get_option($six_storage_settingsKey->six_storage_online_fc_super_search_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                <span class="six-storage-lever"></span>
                                                <span class="six-storage-field_label  cc">Super Search </span>
                                             </label>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="six-storage-row cc">
                                       <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12 cc six-storage-grid-p0">
                                          <div class="six-storage-switch cc ">
                                             <label>
                                                <input type="checkbox"  class="cc" id="six_storage_online_fc_sort_by_toggle" <?php if(get_option($six_storage_settingsKey->six_storage_online_fc_sort_by_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                <span class="six-storage-lever"></span>
                                                <span class="six-storage-field_label  cc">Sort By </span>
                                             </label>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="six-storage-row cc six-storage-d-none">
                                       <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12 cc six-storage-grid-p0">
                                          <div class="six-storage-switch cc ">
                                             <label>
                                                <input type="checkbox"  class="cc" id="six_storage_online_fc_unit_ash_toggle" <?php if(get_option($six_storage_settingsKey->six_storage_online_fc_unit_ash_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                <span class="six-storage-lever"></span>
                                                <span class="six-storage-field_label  cc">Unit# </span>
                                             </label>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="six-storage-row cc">
                                       <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12 cc six-storage-grid-p0">
                                          <div class="six-storage-switch cc ">
                                             <label>
                                                <input type="checkbox"  class="cc" id="six_storage_online_fc_amenity_toggle" <?php if(get_option($six_storage_settingsKey->six_storage_online_fc_amenity_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                <span class="six-storage-lever"></span>
                                                <span class="six-storage-field_label  cc">Amenity </span>
                                             </label>
                                          </div>
                                       </div>
                                    </div>
                                                                  
                                    </div>
                                       <!-- second column filtering options ended -->
                                 
                                 </div>
                                 <!-- both column filtering options ended  -->


                                    <div class="six-storage-row cc six-storage-d-none">
                                       <div class="six-storage-col six-storage-s6 six-storage-l6 cc"> 
                                          <div class="six-storage-switch cc ">
                                             <label>
                                                <input type="checkbox" id="six_storage_online_fc_enable_SSO_toggle" <?php if(get_option($six_storage_settingsKey->six_storage_online_fc_enable_SSO_toggle) == '1') { echo esc_attr('checked'); } ?> />
                                                <span class="six-storage-lever"></span>
                                                <span class="six-storage-field_label">Noke SSO</span>
                                             </label>
                                             <span class="six-storage-grid-ml10 six-storage-help_text"><i class="six-storage-material-icons six-storage-tiny nokeSSO six-storage-icon-align six-storage-hide">help_outline</i></span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="six-storage-row cc ">
                           <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12 ">
                              <p class="cc six-storage-center-align"><input type="button" id="six_storage_online_save_feature_customization" class="six-storage-btn six-storage-btn-primary" value="Save"></p>
                           </div>
                        </div>
                     </form>
                  </div>
                  <!--Appearance-->
                  <div id="six-storage-appearance" class="six-storage-tab-content" style="width:100%">
                     <div class="six-storage-row cc">
                        <div class="cc six-storage-col six-storage-m12 six-storage-s12 six-storage-l12">
                           <div class="six-storage-container">
                              <ul class="six-storage-tabs six-storage-tabs-fixed-width cc">
                                 <li class="six-storage-tab  six-storage-subtab-align six-storage-col six-storage-m3 cc"><a class="six-storage-tab-head six-storage-btn cc six-storage-active" href="#six-storage-colorCustomization">Color Customization</a></li>
                                 <li class="six-storage-tab  six-storage-subtab-align six-storage-col six-storage-m3 cc"><a class="six-storage-tab-head six-storage-btn cc" href="#six-storage-textCustomization">Text Customization</a></li>
                              </ul>
                              <!-- <div class="tab-content"> -->
                              <div class="six-storage-col six-storage-m12" id="six-storage-colorCustomization">
                                 <form id='six-storage-template-ajax-url' class="cc" action="#" method="post" data-url="<?php echo esc_attr(admin_url('admin-ajax.php')) ?>" data-culture="<?php echo esc_attr(json_decode(get_option("six_storage_online_api_culture"), true)['culture']) ?>" data-date_format="<?php echo esc_attr(json_decode(get_option("six_storage_online_api_culture"), true)['shortDate']) ?>" data-currency_format="<?php echo esc_attr(json_decode(get_option("six_storage_online_api_culture"), true)['currency']) ?>">
                                    <div class="six-storage-row cc">
                                       <div class="cc six-storage-col six-storage-l12 six-storage-m12">
                                          <p class="cc six-storage-Tenant-info-head six-storage-center-align">Color Customization</p>
                                       </div>
                                    </div>
                                    <div class="six-storage-row cc ">
                                       <!--Color_Customization Column One-->
                                       <div class="cc six-storage-col six-storage-s12 six-storage-l4 six-storage-m4">
                                          <div class="six-storage-center-align six-storage-d-flex six-storage-justify-content-center six-storage-align-items-center six-storage-flex-column">
                                             <i id="primary-icon" class="six-storage-material-icons six-storage-small six-storage-icon-align six-storage-primary-color notranslate">palette</i>
                                             <p class="cc six-storage-customizeColor">Primary Color</p>
                                             <span class="six-storage-Primecolor-picker">
                                                <label for="six_storage_online_primary_color">
                                                   <input type="color" value="<?php echo esc_attr(get_option($six_storage_settingsKey->six_storage_online_primary_color)); ?>" id="six_storage_online_primary_color">
                                                </label>
                                             </span>
                                          </div>
                                       </div>
                                       <!--Color_Customization Column Two-->
                                       <div class="cc six-storage-col six-storage-s12 six-storage-l4 six-storage-m4">
                                          <div class="six-storage-center-align six-storage-d-flex six-storage-justify-content-center six-storage-align-items-center six-storage-flex-column">
                                             <i id="secondary-icon" class="six-storage-material-icons six-storage-small six-storage-icon-align six-storage-secondary-color notranslate">palette</i>
                                             <p class="cc six-storage-customizeColor">Secondary Color</p>
                                             <span class="six-storage-Secondarycolor-picker">
                                                <label for="six_storage_online_secondary_color">
                                                   <input type="color" value="<?php echo esc_attr(get_option($six_storage_settingsKey->six_storage_online_secondary_color)); ?>" id="six_storage_online_secondary_color">
                                                </label>
                                             </span>
                                          </div>
                                       </div>
                                       <!--Text Color_Customization-->
                                       <div class="cc six-storage-col six-storage-s12 six-storage-l4 six-storage-m4">
                                          <div class="six-storage-center-align six-storage-d-flex six-storage-justify-content-center six-storage-align-items-center six-storage-flex-column">
                                             <i id="text-icon" class="six-storage-material-icons six-storage-small six-storage-icon-align six_storage_online_text_color notranslate">palette</i>
                                             <p class="cc six-storage-customizeColor">Text Color</p>
                                             <span class="six-storage-Secondarycolor-picker">
                                                <label for="six_storage_online_text_color">
                                                   <input type="color" value="<?php echo esc_attr(get_option($six_storage_settingsKey->six_storage_online_text_color)); ?>" id="six_storage_online_text_color">
                                                </label>
                                             </span>
                                          </div>
                                       </div>
                                    </div>
                                    <!--Color_Customization Save Changes Button-->
                                    <div class="six-storage-row cc ">
                                       <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12">
                                          <p class="cc six-storage-center-align"><button type="button" id="six_storage_online_color_savechanges" class="six-storage-btn six-storage-btn-primary cc">Save</button></p>
                                       </div>
                                    </div>
                                    <!--Color Customization Preview-->
                                    <div class="six-storage-row cc six-storage-d-none">
                                       <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12">
                                          <div class="six-storage-grid-container six-storage-grid-xs-p0 six-storage-grid-shadow-sm" id="six-storage-preview-container">
                                             <div id="six-storage-preview_unit-lists" class="six-storage-overflow-x-hidden six-storage-overflow-y-scroll six-storage-custom-scroller six-storage-hide-native-scrollbar six-storage-scroll-hide">
                                                <div class="six-storage-row cc">
                                                   <div class="six-storage-col six-storage-l12 six-storage-s12">
                                                      <p class="cc six-storage-fs-title six-storage-grid-mt10 six-storage-text-center six-storage-text-uppercase" id="preview_rentNow_header">Preview</p>
                                                      <hr class="six-storage-grid-title-hr six-storage-secondary-border-bottom-color" id="preview_rentNow_hr">
                                                   </div>
                                                </div>
                                                <div class="six-storage-row cc six-storage-header-action-wrapper six-storage-white six-storage-z-index-2 six-storage-grid-p10 six-storage-grid-shadow-sm">
                                                   <div class="six-storage-col six-storage-l6 six-storage-m12 six-storage-s12">
                                                      <div id="selected-units-contianer" class="six-storage-grid-d-flex six-storage-flex-wrap"></div>
                                                   </div>
                                                   <div class="six-storage-col six-storage-l6 six-storage-m12 six-storage-s12">
                                                      <div class="six-storage-btn-action-container six-storage-grid-d-flex six-storage-justify-content-end" id="preview_rent-now-container" style="float:right;">
                                                         <button class="six-storage-btn cc six-storage-grid-mr10" id="preview_reserve-now">Reserve Now</button>
                                                         <button class="six-storage-btn cc six-storage-grid-mr10" id="preview_rent-now">Rent Now</button>
                                                         <button class="six-storage-btn cc six-storage-grid-btn six-storage-d-none"id="preview_grid-list">Grid</button>
                                                      </div>
                                                      <div style="display: none;" id="six-storage-rent-now-err" class="six-storage-invalid-feedback"></div>
                                                   </div>
                                                </div>
                                                <div class="six-storage-row cc">
                                                   <div class="six-storage-col six-storage-m12 six-storage-l4 six-storage-grid-mt10 six-storage-s12 cc">
                                                      <div class="six-storage-grid-pt30  six-storage-leftsidebar six-storage-grey six-storage-lighten-4 six-storage-grid-d-flex six-storage-flex-column">
                                                         <form class="six-storage-border-none cc six-storage-grid-shadow-none six-storage-grid-p0 six-storage-grid-position-sticky six-storage-z-index-1" >
                                                            <div class="six-storage-col six-storage-m12 six-storage-l12 six-storage-s12 cc six-storage-grid-p0">
                                                               <div class="six-storage-row cc">
                                                                  <div class="six-storage-col six-storage-m12 six-storage-l12 six-storage-s12 cc">
                                                                     <div class="six-storage-input-field six-storage-col six-storage-s12 cc six-storage-grid-m0" id="preview_six-storage-dvTenantType">
                                                                        <select class="cc" disabled id="six-storage-preview_tenant_type">
                                                                           <option value="" disabled selected>Business User</option>
                                                                        </select>
                                                                        <label for="six-storage-location">Choose Tenant Type</label>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="six-storage-row cc">
                                                                  <div class="six-storage-col six-storage-m12 six-storage-l12 six-storage-s12 cc">
                                                                     <div class="six-storage-input-field six-storage-col six-storage-s12 cc six-storage-grid-m0">
                                                                        <select class="cc" disabled id="preview_storage_type">
                                                                           <option value="" disabled selected>Unit</option>
                                                                        </select>
                                                                        <label for="preview_storage_type">Choose your Storage Type</label>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <!-- <div class="six-storage-row cc">
                                                                  <div class="six-storage-col six-storage-m12 six-storage-l12 six-storage-s12 cc">
                                                                     <div class="six-storage-input-field six-storage-col six-storage-s12 cc" id="six-storage-dvLocation" style="margin:0;">
                                                                        <select class="cc" id="six-storage-location">
                                                                           <option value="" disabled selected>Facility</option> 
                                                                        </select>
                                                                        <label for="six-storage-location">Choose your Location</label>
                                                                     </div>
                                                                  </div>
                                                               </div> -->
                                                               <div class="six-storage-row cc">
                                                                  <div class="six-storage-col six-storage-m12 six-storage-l12 six-storage-s12 cc">
                                                                     <div class="six-storage-input-field six-storage-col six-storage-s12 cc six-storage-grid-m0" id="preview_dvUnitType">
                                                                        <select class="cc" id="preview_unit_type" disabled name="unitType">
                                                                           <option value="" disabled selected>Small</option>
                                                                        </select>
                                                                        <label for="preview_unit_type">Choose your Unit Type</label>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="six-storage-row cc">
                                                                  <div class="six-storage-col six-storage-m12 six-storage-l12 six-storage-s12 cc">
                                                                     <div class="six-storage-input-field six-storage-col six-storage-s12 cc six-storage-grid-m0">
                                                                        <input class="cc" id="preview_dtmoveindate" type="text" placeholder="" value="<?php echo date('d-m-Y'); ?>" readonly="readonly" style="width:81%;">
                                                                        <label for="six-storage-dtmoveindate" style="font-size:12px;font-weight:700;">Choose your move in date</label>
                                                                        <i class="six-storage-material-icons notranslate six-storage-dateicon-append six-storage-grey-text ">date_range</i>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="six-storage-row cc">
                                                                  <div class="six-storage-col six-storage-m12 six-storage-l12 six-storage-s12 cc six-storage-grid-p0">
                                                                     <div id="six-storage-enquiry-container">
                                                                        <div class="six-storage-row cc">
                                                                           <div class="six-storage-col m6 six-storage-l6 six-storage-s12 cc">
                                                                              <button class="six-storage-btn cc six-storage-grid-mr10" id="preview_enquiry" style="padding:0px 10px;">Enquiry</button>
                                                                           </div>
                                                                           <div class="six-storage-col m6 six-storage-l6 six-storage-s12 cc six-storage-grid-p0">
                                                                              <button class="six-storage-btn cc six-storage-grid-mr10" id="preview_view-units" style="padding:0px 8px;">View Units</button>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </form>
                                                      </div>
                                                   </div>
                                                   <div class="six-storage-col six-storage-l8 six-storage-m12 six-storage-overflow-y-scroll six-storage-custom-scroller six-storage-position-relative" id="six-storage-online-unit-collection-contianer" style="padding:2px;">
                                                      <div class=" six-storage-grid-d-flex six-storage-flex-wrap six-storage-col cc six-storage-s12 six-storage-grid-p0 six-storage-min-height-75">
                                                         <h5 class="cc six-storage-note-box six-storage-grey-text six-storage-text-darken-3  six-storage-font-size-16  six-storage-grid-p15 six-storage-grid-pr20 six-storage-grid-pl20  six-storage-grid-mt10 six-storage-grey six-storage-lighten-4 six-storage-text-white six-storage-rounded-10 six-storage-grid-d-flex six-storage-align-items-center">
                                                            <i class="six-storage-material-icons notranslate six-storage-grid-mr10">house_siding</i>Select your storage(s)</h5>
                                                      </div>
                                                      <div class="six-storage-gridshadow  six-storage-grid-mb10 six-storage-grid-mt10 six-storage-unitDetails-info six-storage-white" id="six-storage-unitDetails-info">
                                                         <div  id="six-storage-unit-image">
                                                            <label class="cc six-storage-grid-m0 six-storage-grid-p10 six-storage-cursor-pointer">
                                                               <input id="six-storage-unit-selection" class="six-storage-select-units cc" type="checkbox" value="">
                                                               <span></span>
                                                            </label>
                                                         </div>
                                                         <div class="six-storage-unit-details">
                                                            <h6><span class="six-storage-unit-no cc six-storage-grid-d-inline-block six-storage-pr-20 six-storage-text-blue"><b>R19</b></span><span class="six-storage-grey-text six-storage-font-weight-bold" style="font-size:10px;">3,600 M<sup class="cc">3</sup> (Room)</span></h6>
                                                            <h6 class="six-storage-location-building cc" style="font-size:10px;"><span class="six-storage-location-name six-storage-grid-d-inline-block six-storage-pr-10">Warehoue</span> | <span class="building-name six-storage-pl-10">Whitehouse</span></h6>
                                                               <div class="six-storage-unit-description six-storage-units-description-cont"><b></b></div>
                                                               <div class="six-storage-unit-discount" id="six-storage-unit_discount"><p class="cc six-storage-font-size-12 six-storage-grid-m0"> <i class="six-storage-material-icons notranslate cc six-storage-discount-icon">local_offer </i><span class="cc six-storage-Unitdetail-offtxt">50% Discount</span><br> </p></div>
                                                         </div>
                                                         <div class="six-storage-grid-p20 six-storage-text-white six-storage-grid-text-center six-storage-right-side-grid" id="price-background-one">
                                                               <div>
                                                                  <h4 class="cc six-storage-price-detail six-storage-white-text">$60.00 
                                                                     
                                                                  </h4>
                                                                  <p class="cc six-storage-grid-m0 six-storage-grid-m0 six-storage-white-text"></p>
                                                               </div>
                                                         </div>
                                                      </div>
                                                      <div class="six-storage-gridshadow  six-storage-grid-mb10 six-storage-grid-mt10 six-storage-unitDetails-info six-storage-white" id="six-storage-unitDetails-info">
                                                         <div  id="six-storage-unit-image">
                                                            <label class="cc six-storage-grid-m0 six-storage-grid-p10 six-storage-cursor-pointer">
                                                               <input id="six-storage-unit-selection" class="six-storage-select-units cc" type="checkbox" value="">
                                                               <span></span>
                                                            </label>
                                                         </div>
                                                         <div class="six-storage-unit-details">
                                                            <h6><span class="six-storage-unit-no cc six-storage-grid-d-inline-block six-storage-pr-20 six-storage-text-blue"><b>R19</b></span><span class="six-storage-grey-text six-storage-font-weight-bold" style="font-size:10px;">2,84 FT<sup class="cc">3</sup> (Small)</span></h6>
                                                            <h6 class="six-storage-location-building cc" style="font-size:10px;"><span class="six-storage-location-name six-storage-grid-d-inline-block six-storage-pr-10">Warehoue</span> | <span class="building-name six-storage-pl-10">Whitehouse</span></h6>
                                                               <div class="six-storage-unit-description six-storage-units-description-cont"><b></b></div>
                                                               <div class="six-storage-unit-discount" id="six-storage-unit_discount"><p class="cc six-storage-font-size-12 six-storage-grid-m0"> <i class="six-storage-material-icons notranslate cc six-storage-discount-icon">local_offer </i><span class="cc six-storage-Unitdetail-offtxt">50% Discount</span><br> </p></div>
                                                               
                                                         </div>
                                                         <div class="six-storage-grid-p20 six-storage-text-white six-storage-grid-text-center six-storage-right-side-grid " id="price-background-two">
                                                               <div>
                                                                  <h4 class="cc six-storage-price-detail six-storage-white-text">$60.00 
                                                                     
                                                                  </h4>
                                                                  <p class="cc six-storage-grid-m0 six-storage-grid-m0 six-storage-white-text"></p>
                                                               </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </form>
                              </div>
                              <div class="six-storage-col six-storage-m12" id="six-storage-textCustomization">
                                 <form id='six-storage-template-ajax-url' class="cc" action="#" method="post" data-url="<?php echo esc_attr(admin_url('admin-ajax.php')) ?>" data-culture="<?php echo esc_attr(json_decode(get_option("six_storage_online_api_culture"), true)['culture']) ?>" data-date_format="<?php echo esc_attr(json_decode(get_option("six_storage_online_api_culture"), true)['shortDate']) ?>" data-currency_format="<?php echo esc_attr(json_decode(get_option("six_storage_online_api_culture"), true)['currency']) ?>">
                                    <div class="six-storage-row cc">
                                       <!--Tenant_Info Column One-->
                                       <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12">
                                          <div class="six-storage-row cc ">
                                             <div class="six-storage-col six-storage-s12 six-storage-m12 six-storage-l6 cc">
                                                <div class="six-storage-row cc">
                                                   <div class="six-storage-col six-storage-s6 six-storage-l6 six-storage-m6 cc ">
                                                      <p class="cc six-storage-Tenant-info-head six-storage-center-align">Fields</p>
                                                   </div>
                                                   <div class="six-storage-col six-storage-s6 six-storage-l6 six-storage-m6 cc ">
                                                      <p class="cc six-storage-Tenant-info-head" style="float:right;">Make Mandatory</p>
                                                   </div>
                                                </div>
                                                <div class="six-storage-row cc">
                                                   <div class="six-storage-col six-storage-s6 six-storage-l6 six-storage-m6 cc ">
                                                      <p class="cc six-storage-textCustoization-text">Rent Now</p>
                                                   </div>
                                                   <div class="six-storage-col six-storage-s6 six-storage-l6 six-storage-m6 cc ">
                                                      <input type="text" class="cc" id="six_storage_online_fs_rent_now_custom_word" value="<?php echo esc_attr(get_option($six_storage_settingsKey->six_storage_online_fs_rent_now_custom_word)); ?>" placeholder="Rent Now">
                                                      <div id="rentNowCustom-err" style="display: none;" class="six-storage-invalid-feedback">Please Enter value</div>
                                                   </div>
                                                </div>
                                                <div class="six-storage-row cc">
                                                   <div class="six-storage-col six-storage-s6 six-storage-l6 six-storage-m6 cc ">
                                                      <p class="cc six-storage-textCustoization-text">Selected Storage</p>
                                                   </div>
                                                   <div class="six-storage-col six-storage-s6 six-storage-l6 six-storage-m6 cc ">
                                                      <input type="text" class="cc" id="six_storage_online_fs_selected_storage_custom_word" value="<?php echo esc_attr(get_option($six_storage_settingsKey->six_storage_online_fs_selected_storage_custom_word)); ?>" placeholder="Selected Storage">
                                                      <div id="selectedStorageCustom-err" style="display: none;" class="six-storage-invalid-feedback">Please Enter value</div>
                                                   </div>
                                                </div>
                                                <div class="six-storage-row cc">
                                                   <div class="six-storage-col six-storage-s6 six-storage-l6 six-storage-m6 cc ">
                                                      <p class="cc six-storage-textCustoization-text">Please choose your addons like insurance, Additional Services </p>
                                                   </div>
                                                   <div class="six-storage-col six-storage-s6 six-storage-l6 six-storage-m6 cc ">
                                                      <input type="text" class="cc" id="six_storage_online_please_choose_your_addons_custom_word" value="<?php echo esc_attr(get_option($six_storage_settingsKey->six_storage_online_please_choose_your_addons_custom_word)); ?>" placeholder="Please choose your addons">
                                                      <div id="pleaseChooseAddonsCustom-err" style="display: none;" class="six-storage-invalid-feedback">Please Enter value</div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="six-storage-col six-storage-s12 six-storage-m12 six-storage-l6 cc">
                                                <div class="six-storage-secondSideHead">
                                                   <div class="six-storage-row cc">
                                                      <div class="six-storage-col six-storage-s6 six-storage-l6 six-storage-m6 cc ">
                                                         <p class="cc six-storage-Tenant-info-head six-storage-center-align">Fields</p>
                                                      </div>
                                                      <div class="six-storage-col six-storage-s6 six-storage-l6 six-storage-m6 cc ">
                                                         <p class="cc six-storage-Tenant-info-head" style="float:right;">Make Mandatory</p>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="six-storage-row cc">
                                                   <div class="six-storage-col six-storage-s6 six-storage-l6 six-storage-m6 cc">
                                                      <p class="cc six-storage-textCustoization-text">Select Your Storage(S)</p>
                                                   </div>
                                                   <div class="six-storage-col six-storage-s6 six-storage-l6 six-storage-m6 cc">
                                                      <input type="text" class="cc" id="six_storage_online_select_your_storage_custom_word" value="<?php echo esc_attr(get_option($six_storage_settingsKey->six_storage_online_select_your_storage_custom_word)); ?>" placeholder="Select Your Storage">
                                                      <div id="selectStorageCustom-err" style="display: none;" class="six-storage-invalid-feedback">Please Enter value</div>
                                                   </div>
                                                </div>
                                                <div class="six-storage-row cc">
                                                   <div class="six-storage-col six-storage-s6 six-storage-l6 six-storage-m6 cc">
                                                      <p class="cc six-storage-textCustoization-text">Please review your storage(s) and payment cycle</p>
                                                   </div>
                                                   <div class="six-storage-col six-storage-s6 six-storage-l6 six-storage-m6 cc">
                                                      <input type="text" class="cc" id="six_storage_online_review_your_storage_custom_word" value="<?php echo esc_attr(get_option($six_storage_settingsKey->six_storage_online_review_your_storage_custom_word)); ?>" placeholder="Please review your storage(s)">
                                                      <div id="reviewStorageCustom-err" style="display: none;" class="six-storage-invalid-feedback">Please Enter value</div>
                                                   </div>
                                                </div>
                                                <div class="six-storage-row cc">
                                                   <div class="six-storage-col six-storage-s6 six-storage-l6 six-storage-m6 cc">
                                                      <p class="cc six-storage-textCustoization-text">Add On's</p>
                                                   </div>
                                                   <div class="six-storage-col six-storage-s6 six-storage-l6 six-storage-m6 cc">
                                                      <input type="text" class="cc" id="six_storage_online_addons_custom_word" value="<?php echo esc_attr(get_option($six_storage_settingsKey->six_storage_online_addons_custom_word)); ?>" placeholder="Add On's">
                                                      <div id="addonsCustom-err" style="display: none;" class="six-storage-invalid-feedback">Please Enter value</div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="six-storage-row cc ">
                                       <div class="six-storage-col six-storage-s12 six-storage-l12 cc six-storage-m12">
                                          <p class="cc six-storage-center-align"><button type="button" id="six_storage_online_save_text_customization" class="six-storage-btn cc six-storage-btn-primary ">Save</button></p>
                                       </div>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!--Terms And Condition-->
                  <div id="six-storage-terms-condition" class="six-storage-tab-content" style="width:100%">
                     <form id='six-storage-template-ajax-url' class="cc" action="#" method="post" data-url="<?php echo esc_attr(admin_url('admin-ajax.php')) ?>" data-culture="<?php echo esc_attr(json_decode(get_option("six_storage_online_api_culture"), true)['culture']) ?>" data-date_format="<?php echo esc_attr(json_decode(get_option("six_storage_online_api_culture"), true)['shortDate']) ?>" data-currency_format="<?php echo esc_attr(json_decode(get_option("six_storage_online_api_culture"), true)['currency']) ?>">
                        <div class="six-storage-row cc">
                           <div class="six-storage-col six-storage-s12">
                              <p class="cc six-storage-feature-info-head">Terms & Conditions URL'S</p>
                           </div>
                        </div>
                        <div class="six-storage-row cc">
                           <div class="six-storage-clearfix six-storage-clearfix-w-100 six-storage-row  cc six-storage-grid-mt30" id="terms-condition-fields" >
                                 <div class="six-storage-grid-table-responsive six-storage-custom-scroller six-storage-leasetab">
                                    <table id="six-storage-termsCondition-details-list" class="six-storage-word-break-table cc six-storage-addedvehicles six-storage-table-header-fixed six-storage-text-center six-storage-grid-table six-storage-grid-table-borderless six-storage-grid-mt20" style="display: none;width:1500px">
                                       <thead class="six-storage-grid-thead-light six-storage-grey six-storage-lighten-4">
                                          <tr class="cc">
                                             <th class="cc">Terms & Condition Type</th>
                                             <th class="cc">Website Base URL</th>
                                             <th class="cc">Terms & Condition Link</th>
                                             <th class="cc">Text To Appear On Website</th>
                                             <th class="cc">Action</th>
                                          </tr>
                                       </thead>
                                       <tbody id="termsCondition-tbody" class="six-storage-custom-scroller">
                                       </tbody>
                                    </table>
                                 </div>
                                 <div class="six-storage-row  cc six-storage-grid-mt75" id="termsCondition-fields">
                                    <div class="six-storage-input-field six-storage-col six-storage-m3 six-storage-s12">
                                       <select class="cc" id="terms-type">
                                          <option value="" disabled>Choose your option</option>
                                          <option value="General">General</option>
                                          <option value="Insurance">Insurance</option>
                                          <option value="Auto Pay">Auto Pay</option>
                                       </select>
                                       <label>Terms & Condition Type</label>
                                       <div style="display: none;" id="terms_type-err" class="six-storage-invalid-feedback">Please Select Type</div>
                                    </div>
                                    <div class="six-storage-input-field six-storage-col six-storage-m3 six-storage-s12" >
                                       <input id="terms_webBase_url" class="cc" type="text" >
                                       <label>Website Base URL</label>
                                       <div style="display: none;" id="terms_webBase_url-err" class="six-storage-invalid-feedback">Please Enter Website Base URL</div>
                                    </div>
                                    <div class="six-storage-input-field six-storage-col six-storage-m3 six-storage-s12">
                                       <input id="terms_condition_link" class="cc" type="email"  >
                                       <label>Terms & Condition Link</label>
                                       <div style="display: none;" id="terms_condition_link-err" class="six-storage-invalid-feedback">Please Enter Terms & Condition Link</div>
                                    </div>
                                    <div class="six-storage-input-field six-storage-col six-storage-m3 six-storage-s12 six-storage-phone-input">
                                       <input id="text_on_website" class="cc" type="text"  >
                                       <label>Text To Appear On Website</label>
                                       <div style="display: none;" id="text_on_website-err" class="six-storage-invalid-feedback">Please enter text to appear on website</div>
                                    </div>
                                 </div>
                                 <div class="six-storage-row cc" style="margin-top: 50px;width: 17%;">
                                    <div class="six-storage-col six-storage-float-none six-storage-text-center">
                                       <button type="button" class="six-storage-btn cc six-storage-primary-background-color" id="addtermsDetails">Save</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>  
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <script>
      document.querySelectorAll('input[type=color]').forEach(function(picker) {
      
         var targetLabel = document.querySelector('label[for="' + picker.id + '"]'),
         codeArea = document.createElement('span');
      
         codeArea.innerHTML = picker.value;
         targetLabel.appendChild(codeArea);
      
         picker.addEventListener('change', function() {
            codeArea.innerHTML = picker.value;
            targetLabel.appendChild(codeArea);
         });
      });
      
   </script>
   <div class="six-storage-row cc">
      <div class="cc six-storage-col six-storage-s12 six-storage-m12" style="float:right;">
         <p class="cc" style="float:right;"><b> Powered by </b> <a href="https://www.6storage.com/" target="_blank">6Storage</a>
      </div>
      <div class="six-storage-php-version-div">
                <p class="six-storage-php-version" style="font-size:11px;text-align:right;padding:0 0.75rem">Php version &nbsp;<?php echo esc_attr(phpversion())?></p>
      </div>
   </div> 
</div>