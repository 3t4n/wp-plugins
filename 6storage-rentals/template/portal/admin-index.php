<div id="six-storage-admin-index-short-code" class="six-storage-grid-container-root six-storage-online-root-class">
    <?php
        use SixStorageOnline\Base\Six_Storage_SettingsKeys;
        $obj = new Six_Storage_SettingsKeys(); 
    ?>
    <div class="six-storage-wrapper">
        <div  id="six-storage-loading-container" style="display: none"></div>
            <div class="six-storage-container">
                <!-- Modal Structure -->
                <div class="six-storage-alert-wrapper six-storage-d-none cc" id="six-storage-success-msg">
                    <div class="six-storage-alert-box green six-storage-lighten-1 six-storage-grid-d-flex six-storage-justify-content-between cc six-storage-align-items-center" id="six-storage-dv-alert">
                        <div class="six-storage-text-section six-storage-grid-d-flex six-storage-align-items-center cc">
                            <div class="six-storage-icon-alert-box green six-storage-lighten-3 cc six-storage-rounded-circle six-storage-grid-mr10 six-storage-grid-d-flex six-storage-align-items-center six-storage-justify-content-center">
                                <i class="six-storage-material-icons notranslate six-storage-white-text six-storage-font-size-30" style="margin-top:10px;" id="six-storage-alert-icon">thumb_up</i>
                            </div>
                            <p class="cc six-storage-alert-text six-storage-font-weight-bold cc six-storage-white-text six-storage-alert-message" style="margin-top:12px;" id="six-storage-alert-message"> <!--Successfully Updated--> <?php esc_html_e('Successfully Updated','6storage-rentals'); ?></p>
                        </div>
                        <div class="six-storage-action-close cc" onclick="sixStorageCloseAlert();">
                            <a class="six-storage-btn-floating six-storage-btn-large cc six-storage-waves-effect six-storage-waves-light six-storage-transparent six-storage-icon-alert-box six-storage-flexbox-important six-storage-align-items-center six-storage-justify-content-center six-storage-rounded-circle six-storage-text-decoration-none">
                                <i class="six-storage-material-icons notranslate six-storage-white-text" style="margin-top:10px;">close</i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="six-storage-row cc">
                    <div class="six-storage-col six-storage-s12 six-storage-m12 six-storage-l12 cc">
                        <div class="six-storage-col six-storage-s12 six-storage-m6 six-storage-l6 cc">
                            <img class="cc" src="<?php echo esc_attr($this->six_storage_plugin_url) ?>assets/images/six-storage-logo.png" alt="6 Storage" style="width:25%;">
                            <h6 class="six-storage-font-weight-600 cc">Tenant Portal Configuration Page</h6>
                            <div class="six-storage-row cc">
                                <div class="six-storage-col six-storage-s12 six-storage-m6 six-storage-l6 cc six-storage-mt-20">
                                    <span class="cc" style="font-size:15px;">Select your region</span>
                                </div>
                                <div class="six-storage-col six-storage-s12 six-storage-m6 six-storage-l6 cc">
                                    <div class="six-storage-input-field cc">
                                        <select class="cc" id="six_storage_online_api_url" value="<?php echo esc_attr(get_option($obj->six_storage_online_api_url)); ?>">
                                            <option value="" selected disabled>Select Your Region</option>
                                            <option value="https://api.8storage.com/">Us Staging Region</option>
                                            <option value="https://api-eu.8storage.com/">Eu Staging Region</option>
                                            <option value="https://api-us.6storage.com/">Us Live Region</option>
                                            <option value="https://api-eu.6storage.com/">Eu Live Region</option>
                                            <option value="https://qaapi.8storage.com/">QA Environment</option>
                                        </select>
                                        <div style="display: none;" id="apiUrl-err" class="six-storage-invalid-feedback cc">Please Select Your Region</div>
                                    </div>
                                </div>
                            </div>
                            <form id='six-storage-template-ajax-url' class="cc" action="#" method="post" data-url="<?php echo esc_attr(admin_url('admin-ajax.php')) ?>" data-culture="<?php echo esc_attr(json_decode(get_option("six_storage_online_api_culture"), true)['culture']) ?>" data-date_format="<?php echo esc_attr(json_decode(get_option("six_storage_online_api_culture"), true)['shortDate']) ?>" data-currency_format="<?php echo esc_attr(json_decode(get_option("six_storage_online_api_culture"), true)['currency']) ?>">
                                <div class="six-storage-row cc">
                                    <div class="six-storage-col six-storage-s12 six-storage-m6 six-storage-l6 six-storage-mt-20 cc">
                                        <span class="cc" style="font-size:15px;">Login Email Id</span>
                                    </div>
                                    <div class="six-storage-col six-storage-s12 six-storage-m6 six-storage-l6 six-storage-input-field cc">
                                        <input type="text" class="cc" id="six_storage_online_email_id"  value="<?php echo esc_attr(get_option($obj->six_storage_online_email_id)); ?>" placeholder="">
                                        <div style="display: none;" id="emailId-err" class="six-storage-invalid-feedback">Please Select Your Region</div>
                                    </div>
                                </div>
                                <div class="six-storage-row cc">
                                    <div class="six-storage-col six-storage-s12 six-storage-m12 six-storage-l12 six-storage-grid-text-center cc">
                                        <button type="button" class="six-storage-waves-effect six-storage-waves-light six-storage-btn cc secondary" id="six-storage-register-plugin">Request Access</button>
                                    </div>
                                </div>
                            </form>
                            <div class="six-storage-row cc">
                                <div class="six-storage-col six-storage-s12 six-storage-m6 six-storage-l6 cc">
                                    <a class="cc" href="https://techsupport.6storage.com/support/solutions/articles/19000135240-how-to-integrate-6storage-with-plugin-" target="_blank" style="font-weight: 600;" >Click here for activation steps</a>
                                </div>
                                <div class="six-storage-col six-storage-s12 six-storage-m6 six-storage-l6 cc">
                                    <a class="cc" href="https://www.6storage.com/" target="_blank" style="font-weight: 600;" >New to 6storage?</a>
                                </div>
                            </div>
                            <div class="six-storage-row cc">
                                <div class="six-storage-col six-storage-s12 six-storage-m12 six-storage-l12 cc">
                                    <?php echo 'Logged in IP Address: ' . esc_attr($this->six_storage_client_ip) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="six-storage-row cc">
            <div class="cc six-storage-col six-storage-s12 six-storage-m12 cc" style="float:right;">
                <p class="cc" style="float:right;"><b> Powered by </b> <a class="cc" href="https://www.6storage.com/" target="_blank">6Storage</a>
            </div>
        </div> 
    </div>
</div>