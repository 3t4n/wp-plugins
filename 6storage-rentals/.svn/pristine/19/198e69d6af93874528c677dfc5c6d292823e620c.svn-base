<?php

use SixStorageOnline\Base\Six_Storage_SettingsKeys;

$obj = new Six_Storage_SettingsKeys();
?>
<div class="six-storage-online-root-class" id="six-storage-online-freemium-root" style="display:none">
    <div  id="six-storage-loading-container" style="display: none"></div>
    <div class="six-storage-grid-row six-storage-grid-mb30">
        <h5 class="cc six-storage-fs-title six-storage-text-center six_storage_online_text_color six-storage-grid-w-100" id="six-storage-sign-in-header"><?php esc_html_e('Inquire','6storage-rentals'); ?></h5>
        <hr class="six-storage-grid-title-hr six-storage-grid-d-flex six-storage-text-border-bottom-color">
    </div>
    <div class="six-storage-grid-row grid-col-md-6 six-storage-mx-auto">
        <form name="six-storage-enquiry" data-url="<?php echo esc_attr(admin_url('admin-ajax.php')) ?>" class="six-storage-grid-p0 cc six-storage-grid-shadow-none six-storage-form-sign-up-modal six-storage-enquiry-form-online six-storage-grid-w-100 six-storage-mx-auto"
        method="post" id="six-storage-template-ajax-url" action="" autocomplete="off">
            <div class="six-storage-form-row six-storage-row cc six-storage-grid-p25  six-storage-grid-mb0">
                <div class="six-storage-col six-storage-s12 six_storage_signup_align six-storage-m6 six-storage-grid-mt10 six-storage-grid-mb20">
                    <div class="six-storage-input-field cc" data-element_required="true">
                        <i class="six-storage-material-icons notranslate six-storage-prefix six-storage-grey-text">perm_identity</i>
                        <input type="text" class="cc" id="six-storage-EnqfirstName" data-element_required="true" aria-describedby="six-storage-inputGroupPrepend" autocomplete="none" />
                        <label  for="six-storage-EnqfirstName"><!--First Name--><?php esc_html_e('First Name','6storage-rentals'); ?></label>
                        <div style="display: none;" id="six-storage-EnqfirstName-err" class="six-storage-grid-ml45 six-storage-grid-mt0 six-storage-invalid-feedback">
                            <!-- Please Enter First Name --> <?php esc_html_e('Please Enter First Name','6storage-rentals'); ?>
                        </div>
                    </div>
                </div>
                <div class="six-storage-col six-storage-s12 six_storage_signup_align six-storage-m6 six-storage-grid-mt10 six-storage-grid-mb20">
                    <div class="six-storage-input-field cc">
                        <i class="six-storage-material-icons notranslate six-storage-prefix six-storage-grey-text">perm_identity</i>
                        <input type="text" class="cc" id="six-storage-EnqlastName" tabindex="2" aria-describedby="six-storage-inputGroupPrepend" autocomplete="none" />
                        <label  for="six-storage-EnqlastName"><!--Last Name--><?php esc_html_e('Last Name','6storage-rentals'); ?></label>
                        <div style="display: none;" id="six-storage-EnqlastName-err" class="six-storage-font-size-14 six-storage-grid-mt0 six-storage-invalid-feedback">
                            <!-- Please Enter Last Name --> <?php esc_html_e('Please Enter Last Name','6storage-rentals'); ?>
                        </div>
                    </div>
                </div>
                <div class="six-storage-col six-storage-s12 six_storage_signup_align six-storage-m6  six-storage-grid-mt10 six-storage-grid-mb20">
                    <div class="six-storage-min-height-70"> 
                        <div class="six-storage-input-field cc six-storage-phone-input" data-element_required="true">
                            <input type="text" name="mobile"  data-element_required="true" maxlength="15" class="cc six-storage-telephone six-storage-grid-pl25 six-storage-grid-ml45 six-storage-icon cc" id="six-storage-Enqphone"
                            tabindex="3" aria-describedby="six-storage-inputGroupPrepend" autocomplete="none"/>
                            <label class="six-storage-phone-label six-storage-active six-storage-grid-ml50"> <?php echo esc_html_e( 'Phone', '6storage-rentals' ) ?> </label>
                            <div style="display: none;" id="six-storage-Enqphone-err" class="six-storage-grid-ml45 six-storage-grid-mt0 six-storage-invalid-feedback">
                            <?php esc_html_e('Please Enter Phone Number','6storage-rentals'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="six-storage-col six-storage-s12 six_storage_signup_align six-storage-m6 six-storage-grid-mt10 six-storage-grid-mb20">
                    <div class="six-storage-input-field cc" data-element_required="true">
                        <i class="six-storage-material-icons notranslate six-storage-prefix six-storage-grey-text">email</i>
                        <input type="text" name="email" class="cc" id="six-storage-Enqemail" data-element_required="true" tabindex="4" aria-describedby="six-storage-inputGroupPrepend" autocomplete="none" />
                        <label  for="six-storage-Enqemail">  <?php echo esc_html_e( 'Email', '6storage-rentals' ); ?></label>
                        <div style="display: none;" id="six-storage-Enqemail-err" class="six-storage-grid-ml45 six-storage-grid-mt0 six-storage-invalid-feedback">
                        <?php esc_html_e('Please Enter Email Address','6storage-rentals'); ?>
                        </div>
                    </div>
                </div>
                <div class="six-storage-col six-storage-s12 six_storage_signup_align six-storage-m6 six-storage-grid-mt10 six-storage-grid-mb20">
                    <div class="six-storage-input-field cc">
                        <i class="six-storage-material-icons notranslate six-storage-prefix six-storage-grey-text">perm_identity</i>
                        <input type="text" name="address"  class="cc six-storage-grid-mb0" id="six-storage-EnqAddress" tabindex="5"
                            aria-describedby="six-storage-inputGroupPrepend" autocomplete="none"/>
                        <label  for="six-storage-EnqAddress"><?php echo esc_html_e( "Address", "6storage-rentals" ); ?></label>
                        <div style="display: none;" id="six-storage-EnqAddress-err" class="six-storage-font-size-14 six-storage-grid-mt0 six-storage-invalid-feedback">
                        <?php esc_html_e('Please Enter the Address','6storage-rentals'); ?>
                        </div>
                    </div>
                </div>
                <div class="six-storage-col six-storage-s12 six_storage_signup_align six-storage-m6 six-storage-grid-mt10 six-storage-grid-mb20">
                    <div class="six-storage-input-field cc">
                        <i class="six-storage-material-icons notranslate six-storage-prefix six-storage-grey-text">location_city</i>
                        <input type="text" name="city" class="cc" id="six-storage-EnqCity" tabindex="6" aria-describedby="six-storage-inputGroupPrepend"
                            autocomplete="none"/>
                            <label  for="six-storage-EnqCity"> <?php echo esc_html_e( 'City', '6storage-rentals' ); ?></label>
                        <div style="display: none;" id="six-storage-EnqCity-err" class="six-storage-font-size-14 six-storage-grid-mt0 six-storage-invalid-feedback">
                        <?php esc_html_e('Please Enter City','6storage-rentals'); ?> 
                        </div>
                    </div>
                </div>
                <div class="six-storage-col six-storage-s12 six_storage_signup_align six-storage-m6 six-storage-grid-mt10 six-storage-grid-mb20">
                    <div class="six-storage-input-field cc">
                        <i class="six-storage-material-icons notranslate six-storage-prefix six-storage-grey-text">location_city</i>
                        <input type="text" name="state" class="cc" id="six-storage-EnqState" tabindex="7" aria-describedby="six-storage-inputGroupPrepend"
                            autocomplete="none"/>
                        <label  for="six-storage-EnqState"> <?php echo esc_html_e( 'State', '6storage-rentals' ); ?></label>
                        <div style="display: none;" id="six-storage-EnqState-err" class="six-storage-font-size-14 six-storage-grid-mt0 six-storage-invalid-feedback">
                        <?php esc_html_e('Please Enter State','6storage-rentals'); ?> 
                        </div>
                    </div>
                </div>
                <div class="six-storage-col six-storage-s12 six_storage_signup_align six-storage-m6 six-storage-grid-mt10 six-storage-grid-mb20">
                    <div class="six-storage-input-field cc">
                        <i class="six-storage-material-icons notranslate six-storage-prefix six-storage-grey-text">location_city</i>
                        <input type="text" name="country" class="cc" id="six-storage-EnqCountry" tabindex="8" aria-describedby="six-storage-inputGroupPrepend"
                            autocomplete="none"/>
                        <label  for="six-storage-EnqState"> <?php echo esc_html_e( 'Country', '6storage-rentals' ); ?></label>
                        <div style="display: none;" id="six-storage-EnqCountry-err" class="six-storage-font-size-14 six-storage-grid-mt0 six-storage-invalid-feedback">
                        <?php esc_html_e('Please Enter Country','6storage-rentals'); ?>  
                        </div>
                    </div>
                </div>
                <div class="six-storage-col six-storage-s12 six_storage_signup_align six-storage-m6 six-storage-grid-mt10 six-storage-grid-mb20">
                    <div class="six-storage-input-field cc">
                        <i class="six-storage-material-icons notranslate six-storage-prefix six-storage-grey-text">location_city</i>
                        <input type="text" name="zipCode" class="cc" id="six-storage-EnqZipCode" tabindex="9" aria-describedby="six-storage-inputGroupPrepend"
                            autocomplete="none"/>
                        <label  for="six-storage-EnqZipCode"> <?php echo esc_html_e( 'Zip Code', '6storage-rentals' ); ?></label>
                        <div style="display: none;" id="six-storage-EnqZipCode-err" class="six-storage-font-size-14 six-storage-grid-mt0 six-storage-invalid-feedback">
                        <?php esc_html_e('Please Enter Zipcode','6storage-rentals'); ?>  
                        </div>
                    </div>
                </div>
                <div class="six-storage-col six-storage-s12 six_storage_signup_align six-storage-m6 six-storage-grid-mt12 six-storage-grid-pl20">
                    <div class="six-storage-min-height-70">
                        <div class="six-storage-input-field cc six-storage-leadsource-alignment">
                            <i class="six-storage-material-icons notranslate six-storage-prefix six-storage-grey-text">question_answer</i>
                            <select class="cc six-storage-select" name="leadSource" tabindex="9" id="six-storage-know-lead">
                                <option value="" selected disabled >Select Lead Source</option>
                                <optgroup label="Blogging 1">
                                    <option value="Wordpress">Wordpress</option>
                                </optgroup>
                                <optgroup label="Community Sites">
                                    <option value="Quora">Quora</option>
                                    <option value="Reddit">Reddit</option>
                                </optgroup>
                                <optgroup label="Digital Ads">
                                    <option value="Bing Ads">Bing Ads</option>
                                    <option value="Facebook Ads">Facebook Ads</option>
                                    <option value="Google Ads">Google Ads</option>
                                    <option value="Instagram Ads">Instagram Ads</option>
                                    <option value="LinkedIn Ads">LinkedIn Ads</option>
                                </optgroup>
                                <optgroup label="Email">
                                    <option value="Builk Emails">Builk Emails</option>
                                    <option value="Email Compaign">Email Compaign</option>
                                    <option value="Individual Email">Individual Email</option>
                                </optgroup>
                                <optgroup label="Instant Messenger">
                                    <option value="FB Messenger">FB Messenger</option>
                                    <option value="WeChat">WeChat</option>
                                    <option value="WhatsApp">WhatsApp</option>
                                </optgroup>
                                <optgroup label="Review Sites">
                                    <option value="Capterra">Capterra</option>
                                    <option value="Get App">Get App</option>
                                </optgroup>
                                <optgroup label="SEO">
                                    <option value="Google">Google</option>
                                    <option value="Yahoo">Yahoo</option>
                                </optgroup>
                                <optgroup label="SMS">
                                    <option value="SMS Campaigns">SMS Campaigns</option>
                                    <option value="Text/ SMS Ads">Text/ SMS Ads</option>
                                </optgroup>
                                <optgroup label="Social">
                                    <option value="Facebook">Facebook</option>
                                    <option value="Instagram">Instagram</option>
                                    <option value="Linkedin">Linkedin</option>
                                    <option value="Pinterest">Pinterest</option>
                                    <option value="Tumblr">Tumblr</option>
                                    <option value="Twitter">Twitter</option>
                                </optgroup>
                                <optgroup label="Video">
                                    <option value="Youtube">Youtube</option>
                                </optgroup>
                            </select>
                            <label class="cc">  <?php echo esc_html_e( 'How do you know about us ?', '6storage-rentals' ); ?> </label>
                            <div style="display: none;" id="six-storage-Enqleadsource-err" class="six-storage-font-size-14 six-storage-grid-mt0 six-storage-invalid-feedback">
                            <?php esc_html_e('How do you know about us ?','6storage-rentals'); ?>  
                            </div>
                        </div>
                    </div>
                </div>
                <div class="six-storage-col six-storage-s12 six_storage_signup_align six-storage-m12 six-storage-grid-mt12 six-storage-grid-pl15">
                    <div class="six-storage-input-field cc">
                        <i class="six-storage-material-icons notranslate six-storage-prefix six-storage-grey-text">date_range</i>
                        <input class="cc six-storage-date-control-contact-date" name="preferred_movein_date"  tabindex="13" id="six-storage-dtcontactdate"
                            readonly="readonly" required/>
                        <label class="cc six-storage-active">  <?php echo esc_html_e( 'Contact Me On', '6storage-rentals' ); ?></label>
                        <div style="display: none;" id="six-storage-dtcontactdate-err" class="six-storage-font-size-14 six-storage-grid-mt0 six-storage-invalid-feedback">
                        <?php esc_html_e('Please Enter Contact Date','6storage-rentals'); ?> 
                        </div>
                    </div>
                </div>
                <div class="six-storage-col six-storage-s12 six-storage-m12">
                    <p class="six-storage-six-storage-font-size-15 cc six-storage-text-center">
                        <b>  <?php echo esc_html_e( 'Contact Preference', '6storage-rentals' ); ?>  </b>
                    </p>
                </div>
                <div class="six-storage-col six-storage-s12 six-storage-m6 six-storage-grid-pl15 six-storage-mobile-margin-bottom">
                    <p class="six-storage-contact-through-label cc">  <?php echo esc_html_e( 'Contact Through', '6storage-rentals' ); ?> </p>
                    <div class="six-storage-contact-through-label-div">
                        <p class="six-storage-grid-mb0">
                            <label class="six-storage-contact-through">
                                <input type="checkbox" value="EMAIL" tabindex="14" name="contactPreference_" class="cc" id="six-storage-leadsourceEmail"/>
                                <span style="white-space:nowrap">  <?php echo esc_html_e( 'Email', '6storage-rentals' ); ?> </span>
                            </label>
                        </p>
                        <p class="six-storage-grid-mb0">
                            <label class="six-storage-contact-through">
                                <input type="checkbox" value="SMS" tabindex="15" name="contactPreference_" class="cc" id="six-storage-leadsourceSms"/>
                                <span>  <?php echo esc_html_e( 'SMS', '6storage-rentals' ); ?> </span>
                            </label>
                        </p>
                    </div>
                </div>
                <div class="six-storage-col six-storage-s12 six-storage-m6">
                    <div class="six-storage-input-field cc">
                        <i class="six-storage-material-icons notranslate six-storage-prefix six-storage-grey-text">insert_comment</i>
                        <input type="text" class="cc" id="six-storage-Leadsourcecomment" tabindex="16"
                            name="message"  aria-describedby="six-storage-inputGroupPrepend" autocomplete="none"/>
                        <label  for="six-storage-Leadsourcecomment"> <?php echo esc_html_e( 'Comment', '6storage-rentals' ); ?></label>
                    </div>
                </div>
                <div class="six-storage-text-center six-storage-clearfix six-storage-col six-storage-s12 six-storage-m12 six-storage-center">
                    <button class="six-storage-waves-effect six-storage-waves-light six-storage-btn cc six-storage-primary-background six-storage-signupsubmit-btn six-storage-grid-mb10 six-storage-white-text"
                            id="six-storage-enquiry-submit-btn" tabindex="17" name="six-storage-enquiry" type="submit">
                        <?php echo esc_html_e( 'Submit', '6storage-rentals' ); ?>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="six-storage-grid-row six-storage-moveinSuccess"  id="six-storage-enquiry-thank-you" style="display:none">
    <div class="six-storage-grid-col-md-12">
        <img src=" <?php echo esc_attr(SIX_STORAGE_PLUGIN_FILE) ?>/assets/images/undraw_business_shop_qw5t.svg" width="300" class="six-storage-grid-margin-auto cc grid-p35">
        <div >
            <h5 class="cc six-storage-green-text six-storage-grid-mt0">
                <!--You have successfully Moved in--><?php esc_html_e('Inquire Successfully Submitted','6storage-rentals'); ?><span></span>
            </h5>
        </div>
    </div>
</div>