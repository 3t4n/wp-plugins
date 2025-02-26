<!-- Backend AP Contact Form Settings -->
<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

?>
<h3><?php _e( 'AP Contact Form', 'ap-contact-form' ); _e(' - Version ','ap-contact-form'); _e(APCF_VERSION)?></h3>

<!-- Save settings and Restore Success Message -->
<?php if ( isset( $_GET['message'] ) ) {
    ?>
    <div class="notice notice-success is-dismissible"><p><?php echo __( 'Settings saved successfully', 'ap-contact-form' ); ?></p></div>
<?php }
if ( isset( $_GET['restore-message'] ) ) {?>
<div class="notice notice-success is-dismissible"><p><?php echo __( 'Settings restored to default successfully', 'ap-contact-form' ); ?></p></div>
<?php }

?>

<div class="wrap apcf-contact">
    <div id="poststuff">
        <div id="post-body" class="metabox-holder columns-2">
            <!-- main content -->
            <div id="post-body-content">
                <div class="meta-box-sortables ui-sortable apcf-meta-box-sortables">
                    <div class="postbox">
                        <div class="inside">
                            <div class="apcf-container">
                                <!-- Getting Values from Option table -->
                                <?php
                                $ap_contact_form_settings = get_option( 'ap_contact_form_settings' );
                                $ap_contact_form_settings = empty( $ap_contact_form_settings ) ? array() : $ap_contact_form_settings;
                                //$this->print_array($ap_contact_form_settings);
                                ?>

                                <div class="apcf-form-wrap">
                                    <form method="post" action="<?php echo admin_url( 'admin-post.php' ); ?>">
                                        <input type="hidden" name="action" value="ap_settings_save_action"/>

                                        <!-- Creating Backend Tabs Header -->
                                        <ul class="apcf-tabs">
                                            <li class="tab-link current" data-tab="tab-1"><?php _e( 'Form Settings', 'ap-contact-form' ); ?></li>
                                            <li class="tab-link" data-tab="tab-3"><?php _e( 'Email Settings', 'ap-contact-form' ); ?></li>
                                            <li class="tab-link" data-tab="tab-4"><?php _e( 'Captcha Settings', 'ap-contact-form' ); ?></li>
                                            <li class="tab-link" data-tab="tab-2"><?php _e( 'How to use', 'ap-contact-form' ); ?></li>
                                            <li class="tab-link" data-tab="tab-5"><?php _e( 'About', 'ap-contact-form' ); ?></li>
                                        </ul>

                                        <!-- Backend Tab Contents -->
                                        <div id="tab-1" class="apcf-tab-content current">
                                        <!-- Backend Label Settings -->
                                            <div class="apcf-field-wrap">
                                                <div class="apcf-field-title" id="apcf-field-wrap-name">
                                                    <h4><?php _e( 'Name', 'ap-contact-form' ); ?></h4>
                                                </div>
                                                <div class="apcf-field-wrap-inner" id="apcf-field-wrap-inner-name">
                                                    <div class="apcf-field">
                                                        <label><?php _e( 'Name Label', 'ap-contact-form' ); ?></label>
                                                        <input type="text" class="apcf-text" id="apcf-label-name" name="apcf-label-name" value="<?php echo (isset( $ap_contact_form_settings['apcf-label-name'] )) ? esc_attr( $ap_contact_form_settings['apcf-label-name'] ) : ''; ?>"/>
                                                    </div>
                                                    <div class="apcf-field">
                                                        <label><?php _e( 'Display (Show/ Hide)', 'ap-contact-form' ); ?></label>
                                                        <input type="checkbox" class="apcf-checkbox" id="apcf-display-name" name="apcf-display-name" <?php if ( $ap_contact_form_settings['apcf-display-name'] ) echo 'checked'; ?>></p>
                                                    </div>
                                                    <div class="apcf-field">
                                                        <label><?php _e( 'Label as Placeholder', 'ap-contact-form' ); ?></label>
                                                        <input type="checkbox" class="apcf-checkbox" id="apcf-placeholder-name" name="apcf-placeholder-name" <?php if ( $ap_contact_form_settings['apcf-placeholder-name'] ) echo 'checked'; ?>></p>
                                                    </div>
                                                    <div class="apcf-field">
                                                        <label><?php _e( 'Required (Yes/ No)', 'ap-contact-form' ); ?></label>
                                                        <input type="checkbox" class="apcf-checkbox" id="apcf-required-name" name="apcf-required-name" <?php if ( $ap_contact_form_settings['apcf-required-name'] ) echo 'checked'; ?>>
                                                    </div>
                                                    <div class="apcf-field">
                                                        <label><?php _e( 'Required Message', 'ap-contact-form' ); ?></label>
                                                        <input type="text" class="apcf-text" id="apcf-required-message-name" name="apcf-required-message-name" value="<?php echo (isset( $ap_contact_form_settings['apcf-required-message-name'] )) ? esc_attr( $ap_contact_form_settings['apcf-required-message-name'] ) : ''; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="apcf-field-wrap">
                                                <div class="apcf-field-title" id="apcf-field-wrap-email">
                                                    <h4><?php _e( 'Email', 'ap-contact-form' ); ?></h4>
                                                </div>
                                                <div class="apcf-field-wrap-inner" id="apcf-field-wrap-inner-email">
                                                    <div class="apcf-field">
                                                        <label><?php _e( 'Email Label', 'ap-contact-form' ); ?></label>
                                                        <input type="text" class="apcf-text" id="apcf-label-email" name="apcf-label-email" value="<?php echo (isset( $ap_contact_form_settings['apcf-label-email'] )) ? esc_attr( $ap_contact_form_settings['apcf-label-email'] ) : ''; ?>"/>
                                                    </div>
                                                    <div class="apcf-field">
                                                        <label><?php _e( 'Display (Show/ Hide)', 'ap-contact-form' ); ?></label>
                                                        <input type="checkbox" class="apcf-checkbox" id="apcf-display-email" name="apcf-display-email" <?php if ( $ap_contact_form_settings['apcf-display-email'] ) echo 'checked'; ?>></p>
                                                    </div>
                                                    <div class="apcf-field">
                                                        <label><?php _e( 'Label as Placeholder', 'ap-contact-form' ); ?></label>
                                                        <input type="checkbox" class="apcf-checkbox" id="apcf-placeholder-email" name="apcf-placeholder-email" <?php if ( $ap_contact_form_settings['apcf-placeholder-email'] ) echo 'checked'; ?>></p>
                                                    </div>
                                                    <div class="apcf-field">
                                                        <label><?php _e( 'Required (Yes/ No)', 'ap-contact-form' ); ?></label>
                                                        <input type="checkbox" class="apcf-checkbox" id="apcf-required-email" name="apcf-required-email" <?php if ( $ap_contact_form_settings['apcf-required-email'] ) echo 'checked'; ?>>
                                                        <p class="email-notice">Note: Please check the box if you want to receive message.</p>
                                                    </div>
                                                    <div class="apcf-field">
                                                        <label><?php _e( 'Required Message', 'ap-contact-form' ); ?></label>
                                                        <input type="text" class="apcf-text" id="apcf-required-message-email" name="apcf-required-message-email" value="<?php echo (isset( $ap_contact_form_settings['apcf-required-message-email'] )) ? esc_attr( $ap_contact_form_settings['apcf-required-message-email'] ) : ''; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="apcf-field-wrap" >
                                                <div class="apcf-field-title" id="apcf-field-wrap-subject">
                                                    <h4><?php _e( 'Subject', 'ap-contact-form' ); ?></h4>
                                                </div>

                                                <div class="apcf-field-wrap-inner" id="apcf-field-wrap-inner-subject">
                                                    <div class="apcf-field">
                                                        <label><?php _e( 'Subject Label', 'ap-contact-form' ); ?></label>
                                                        <input type="text" class="apcf-text" id="apcf-label-subject" name="apcf-label-subject" value="<?php echo (isset( $ap_contact_form_settings['apcf-label-subject'] )) ? esc_attr( $ap_contact_form_settings['apcf-label-subject'] ) : ''; ?>"/>
                                                    </div>
                                                    <div class="apcf-field">
                                                        <label><?php _e( 'Display (Show/ Hide)', 'ap-contact-form' ); ?></label>
                                                        <input type="checkbox" class="apcf-checkbox" id="apcf-display-subject" name="apcf-display-subject" <?php if ( $ap_contact_form_settings['apcf-display-subject'] ) echo 'checked'; ?>></p>
                                                    </div>
                                                    <div class="apcf-field">
                                                        <label><?php _e( 'Label as Placeholder', 'ap-contact-form' ); ?></label>
                                                        <input type="checkbox" class="apcf-checkbox" id="apcf-placeholder-subject" name="apcf-placeholder-subject" <?php if ( $ap_contact_form_settings['apcf-placeholder-subject'] ) echo 'checked'; ?>></p>
                                                    </div>
                                                    <div class="apcf-field">
                                                        <label><?php _e( 'Required (Yes/ No)', 'ap-contact-form' ); ?></label>
                                                        <input type="checkbox" class="apcf-checkbox" id="apcf-required-subject" name="apcf-required-subject" <?php if ( $ap_contact_form_settings['apcf-required-subject'] ) echo 'checked'; ?>>
                                                    </div>
                                                    <div class="apcf-field">
                                                        <label><?php _e( 'Required Message', 'ap-contact-form' ); ?></label>
                                                        <input type="text" class="apcf-text" id="apcf-required-message-subject" name="apcf-required-message-subject" value="<?php echo (isset( $ap_contact_form_settings['apcf-required-message-subject'] )) ? esc_attr( $ap_contact_form_settings['apcf-required-message-subject'] ) : ''; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="apcf-field-wrap">
                                                <div class="apcf-field-title" id="apcf-field-wrap-message">
                                                    <h4><?php _e( 'Message', 'ap-contact-form' ); ?></h4>
                                                </div>

                                                <div class="apcf-field-wrap-inner" id="apcf-field-wrap-inner-message">
                                                    <div class="apcf-field">
                                                        <label><?php _e( 'Message Label', 'ap-contact-form' ); ?></label>
                                                        <input type="text" class="apcf-text" id="apcf-label-message" name="apcf-label-message" value="<?php echo (isset( $ap_contact_form_settings['apcf-label-message'] )) ? esc_attr( $ap_contact_form_settings['apcf-label-message'] ) : ''; ?>"/>
                                                    </div>
                                                    <div class="apcf-field">
                                                        <label><?php _e( 'Display (Show/ Hide)', 'ap-contact-form' ); ?></label>
                                                        <input type="checkbox" class="apcf-checkbox" id="apcf-display-message" name="apcf-display-message" <?php if ( $ap_contact_form_settings['apcf-display-message'] ) echo 'checked'; ?>></p>
                                                    </div>
                                                    <div class="apcf-field">
                                                        <label><?php _e( 'Label as Placeholder', 'ap-contact-form' ); ?></label>
                                                        <input type="checkbox" class="apcf-checkbox" id="apcf-placeholder-message" name="apcf-placeholder-message" <?php if ( $ap_contact_form_settings['apcf-placeholder-message'] ) echo 'checked'; ?>></p>
                                                    </div>
                                                    <div class="apcf-field">
                                                        <label><?php _e( 'Required (Yes/ No)', 'ap-contact-form' ); ?></label>
                                                        <input type="checkbox" class="apcf-checkbox" id="apcf-required-message" name="apcf-required-message" <?php if ( $ap_contact_form_settings['apcf-required-message'] ) echo 'checked'; ?>>
                                                    </div>
                                                    <div class="apcf-field">
                                                        <label><?php _e( 'Required Message', 'ap-contact-form' ); ?></label>
                                                        <input type="text" class="apcf-text" id="apcf-required-message-message" name="apcf-required-message-message" value="<?php echo (isset( $ap_contact_form_settings['apcf-required-message-message'] )) ? esc_attr( $ap_contact_form_settings['apcf-required-message-message'] ) : ''; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="apcf-field-wrap" >
                                                <div class="apcf-field-title" id="apcf-field-wrap-submit">
                                                    <h4><?php _e( 'Submit', 'ap-contact-form' ); ?></h4>
                                                </div>

                                                <div class="apcf-field-wrap-inner" id="apcf-field-wrap-inner-submit">
                                                    <div class="apcf-field">
                                                        <label><?php _e( 'Submit Button Label', 'ap-contact-form' ); ?></label>
                                                        <input type="text" class="apcf-text" id="apcf-label-submit" name="apcf-label-submit" value="<?php echo (isset( $ap_contact_form_settings['apcf-label-submit'] )) ? esc_attr( $ap_contact_form_settings['apcf-label-submit'] ) : ''; ?>"/>
                                                    </div>
                                                    <div class="apcf-field">
                                                        <label><?php _e( 'Display (Show/ Hide)', 'ap-contact-form' ); ?></label>
                                                        <input type="checkbox" class="apcf-checkbox" id="apcf-display-submit" name="apcf-display-submit" <?php if ( $ap_contact_form_settings['apcf-display-submit'] ) echo 'checked'; ?>></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="apcf-field-wrap">
                                                <div class="apcf-field">
                                                    <h4><?php _e( 'Success Message', 'ap-contact-form' ); ?></h4>
                                                    <input type="text" class="apcf-text" id="apcf-success-message" name="apcf-success-message" value="<?php echo (isset( $ap_contact_form_settings['apcf-success-message'] )) ? esc_attr( $ap_contact_form_settings['apcf-success-message'] ) : ''; ?>"/>
                                                </div>                                      
                                            </div>
                                            <div class="apcf-field-wrap">
                                                <div class="apcf-field">
                                                    <label><?php _e( 'Frontend Box Shadow', 'ap-contact-form' ); ?></label>
                                                        <input type="checkbox" class="apcf-checkbox" id="apcf-display-box-shadow" name="apcf-display-box-shadow" <?php if ( $ap_contact_form_settings['apcf-display-box-shadow'] ) echo 'checked'; ?>><?php _e( 'Show/ Hide', 'ap-contact-form' ); ?></input></p>
                                                </div>                                      
                                            </div>
                                        </div>
                                        <div id="tab-2" class="apcf-tab-content">
                                            <?php include(APCF_PATH . '/inc/backend/how-to.php'); ?>
                                        </div>
                                        <div id="tab-5" class="apcf-tab-content">
                                            <?php include(APCF_PATH . '/inc/backend/apcf-about.php'); ?>
                                        </div>
                                        <div id="tab-3" class="apcf-tab-content">
                                        <!-- Backend Email Settings -->
                                            <div class="apcf-field-wrap">
                                                <div class="apcf-field">
                                                    <label><?php _e( 'Receiver Email', 'ap-contact-form' ); ?></label>
                                                    <input type="text" class="apcf-text" id="apcf-from-email" name="apcf-from-email" value="<?php echo (isset( $ap_contact_form_settings['apcf-from-email'] )) ? esc_attr( $ap_contact_form_settings['apcf-from-email'] ) : ''; ?>"/>
                                                </div>
                                            </div>
                                            <div class="apcf-field-wrap">
                                                <div class="apcf-field">
                                                    <label><?php _e( 'Receiver Name', 'ap-contact-form' ); ?></label>
                                                    <input type="text" class="apcf-text" id="apcf-from-name" name="apcf-from-name" value="<?php echo (isset( $ap_contact_form_settings['apcf-from-name'] )) ? esc_attr( $ap_contact_form_settings['apcf-from-name'] ) : ''; ?>"/>
                                                </div>
                                            </div>
                                            <div class="apcf-field-wrap">
                                                <div class="apcf-field">
                                                    <label><?php _e( 'Receiver Email Subject', 'ap-contact-form' ); ?></label>
                                                    <input type="text" class="apcf-text" id="apcf-email-subject" name="apcf-email-subject" value="<?php echo (isset( $ap_contact_form_settings['apcf-email-subject'] )) ? esc_attr( $ap_contact_form_settings['apcf-email-subject'] ) : ''; ?>"/>
                                                </div>
                                            </div>
                                            <div class="apcf-field-wrap">
                                                <div class="apcf-field">
                                                    <label><?php _e( 'Receiver Message Format', 'ap-contact-form' ); ?></label>
                                                    <textarea class="apcf-textarea" id="apcf-email-message" name="apcf-email-message" rows="10" cols="  70"><?php echo (isset( $ap_contact_form_settings['apcf-email-message'] )) ? esc_attr( $ap_contact_form_settings['apcf-email-message'] ) : ''; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="email-format-message">
                                                <div class="apcf-email-wrap">
                                                    <span class="apcf-info-block">
                                                        <?php _e( 'Please use ', 'ap-contact-form' ); ?>
                                                    </span>
                                                    <ul>
                                                        <li><strong>#name</strong><?php _e( ' to extract form name', 'ap-contact-form' ); ?></li>
                                                        <li><strong>#email</strong><?php _e( ' to extract form email', 'ap-contact-form' ); ?></li>
                                                        <li><strong>#subject</strong><?php _e( ' to extract form subject', 'ap-contact-form' ); ?></li>
                                                        <li><strong>#message</strong><?php _e( ' to extract form message', 'ap-contact-form' ); ?></li>
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                        <div id="tab-4" class="apcf-tab-content">
                                        <!-- Backend Captcha Settings -->
                                            <div class="apcf-field-wrap">
                                                <div class="apcf-captcha-wrapper">
                                                    <div class="apcf-field">
                                                        <label><?php _e( 'Add a Captcha', 'ap-contact-form' ); ?></label>
                                                        <input type="checkbox" class="apcf-checkbox" id="apcf-display-captcha" name="apcf-display-captcha" <?php if ( $ap_contact_form_settings['apcf-display-captcha'] ) echo 'checked'; ?>>
                                                    </div>
                                                    <div class="apcf-captcha-wrapper-inner">
                                                        <div class="apcf-field">
                                                            <label><?php _e( 'Captcha Label', 'ap-contact-form' ); ?></label>
                                                            <input type="text" class="apcf-text" id="apcf-captcha-label" name="apcf-captcha-label" value="<?php echo (isset( $ap_contact_form_settings['apcf-captcha-label'] )) ? esc_attr( $ap_contact_form_settings['apcf-captcha-label'] ) : ''; ?>"/>
                                                        </div>
                                                        <div class="apcf-field">
                                                            <label><?php _e( 'Site Key', 'ap-contact-form' ); ?></label>
                                                            <input type="text" class="apcf-text" id="apcf-captcha-site-key" name="apcf-captcha-site-key" value="<?php echo (isset( $ap_contact_form_settings['apcf-captcha-site-key'] )) ? esc_attr( $ap_contact_form_settings['apcf-captcha-site-key'] ) : ''; ?>"/>
                                                        </div>
                                                        <div class="apcf-field">
                                                            <label><?php _e( 'Secret Key', 'ap-contact-form' ); ?></label>
                                                            <input type="text" class="apcf-text" id="apcf-captcha-secret-key" name="apcf-captcha-secret-key" value="<?php echo (isset( $ap_contact_form_settings['apcf-captcha-secret-key'] )) ? esc_attr( $ap_contact_form_settings['apcf-captcha-secret-key'] ) : ''; ?>"/>
                                                        </div>
                                                        <div class="apcf-field">
                                                            <label><?php _e( 'Captcha Error Message', 'ap-contact-form' ); ?></label>
                                                            <input type="text" class="apcf-text" id="apcf-captcha-error-message" name="apcf-captcha-error-message" value="<?php echo (isset( $ap_contact_form_settings['apcf-captcha-error-message'] )) ? esc_attr( $ap_contact_form_settings['apcf-captcha-error-message'] ) : ''; ?>"/>
                                                        </div>
                                                        <p><?php _e( 'If you do not have keys already then visit ', 'ap-contact-form' ) ?><tt><a href = "https://www.google.com/recaptcha/admin" target="_blank">
                                                                https://www.google.com/recaptcha/admin</a></tt><?php _e( ' to generate them.', 'ap-contact-form' ) ?> </p>
                                                    </div>
                                                </div>
                                            </div>  
                                        </div> 
                                </div><!-- container -->
                                <?php 
                                    wp_nonce_field( 'apcf_admin_option-update' ); 
                                    wp_nonce_field('apcf_action_nonce', 'apcf_nonce_field');
                                    $restore_nonce = wp_create_nonce('apcf-restore-nonce');
                                ?>
                                <div class="apcf-field-wrap">
                                    <label></label>
                                    <div class="apcf-field apcf-save">
                                        <input type="submit" class="button-primary" value="<?php _e( 'Save Changes', 'ap-contact-form' ); ?>" name="ap_settings_save_button"/>
                                        <a href="<?php echo admin_url() . 'admin-post.php?action=apcf_restore_settings&_wpnonce=' . $restore_nonce; ?>" onclick="return confirm('<?php _e('Are you sure you want to restore default settings?', 'ap-contact-form') ?>');"><input type="button" value="<?php _e('Restore Default Settings', 'ap-contact-form'); ?>" class="button-primary"/></a>
                                    </div>
                                </div>
                            </div><!-- .inside -->
                        </div>
                        <!-- .postbox -->
                    </div>
                    <!-- .meta-box-sortables .ui-sortable -->
                </div>
                <!-- post-body-content -->
                <!-- sidebar -->
                <div id="postbox-container-1" class="postbox-container apcf-aside">

                    <div class="meta-box-sortables">

                        <div class="postbox">

                            <div class="handlediv" title="Click to toggle"><br></div>
                            <!-- Toggle -->

                                <h3 class="hndle"><span>What more Features?</span></h3>

                            <div class="inside">
                                Check out some of our similar plugins 
                                <ul>
                                    <li>
                                        <div class="apcf-backend-sidebar-header"><strong><a href="https://wordpress.org/plugins/ultimate-form-builder-lite/" target="_blank">Ultimate Form Builder Lite</a></strong></div>
                                        <p>
                                            For a complete and flexible form.
                                        </p>
                                        <p><strong>Features</strong></p>
                                        <ul>
                                            <li>★ Unlimited Forms</li>
                                            <li>★ Pre Designed 6 Form Templates</li>
                                            <li>★ Drag and Drop Field Ordering</li>
                                            <li>★ Form Preview</li>
                                            <li>★ Fully Responsive</li>
                                            <li>★ SPAM Prevention from inbuilt captcha system</li>
                                        </ul>                                            
                                            <a href="https://wordpress.org/plugins/ultimate-form-builder-lite/" target="_blank">Download here</a></span>
                                        
                                    </li>                                      
                                    <li>
                                        <div class="apcf-backend-sidebar-header"><strong><a href="https://wordpress.org/plugins/accesspress-anonymous-post/" target="_blank">AccessPress Anonymous Post</a></strong></div>
                                        <p>
                                            For Frontend Form posting.
                                        </p>
                                        <p><strong>Features</strong></p>
                                        <ul>
                                            <li>★ Submit post from frontend.</li>
                                            <li>★ Email notification after post submission.</li>
                                            <li>★ Anyone can post from anywhere in the site.</li>
                                            <li>★ Add featured image to the post.</li>
                                            <li>★ Mathematical Captcha and Google Captcha</li>
                                            <li>★ Short code built.</li>
                                            <li>★ Posts saved into WordPress database and will show up in Admin Dashboard as pending post or any selected status with given Title, Description, Category and Tags.</li>
                                        </ul>                                            <a href="https://wordpress.org/plugins/accesspress-anonymous-post/" target="_blank">Download here</a></span>
                                    </li>
                                </ul>
                                
                            </div>
                            <!-- .inside -->

                        </div>
                        <!-- .postbox -->

                    </div>
                    <!-- .meta-box-sortables -->
                    <!-- end of sidebar -->

                </div>
                <!-- #postbox-container-1 .postbox-container -->

            </div>
            <!-- #post-body .metabox-holder .columns-2 -->

            <br class="clear">
        </div>
        <!-- #poststuff -->

    </div> <!-- .wrap -->
