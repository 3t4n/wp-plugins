<div class="wrap adzapier jscode-admin-page page-wpjscode">
    <!-- <h1 id="wpjscode-title">PrivacyPillar GDPR CCPA compliance</h1> -->
    <div class="wpjscode-header">
        <img src="<?php echo plugins_url('assets/adziper-logo.webp', __FILE__);?>" title="PrivacyPillar GDPR CCPA compliance" alt="PrivacyPillar, Company Logo">
        <small>Simplified Privacy & Data</small>
        <div class="right social">
            <a href="https://www.facebook.com/PrivacyPillar/" target="_blank"><span class="dashicons dashicons-facebook-alt"></span></a>
            <a href="https://twitter.com/privacypillar?lang=en" target="_blank"><span class="dashicons dashicons-twitter"></span></a>
            <a href="https://www.linkedin.com/company/privacypillar/" target="_blank"><span class="dashicons dashicons-linkedin"></span></a>
            <a href="https://www.instagram.com/privacypillar/?utm_medium=copy_link" target="_blank"><span class="dashicons dashicons-instagram"></span></a>
            <a href="mailto:sales@privacypillar.com"><span class="dashicons dashicons-email"></span></a>
        </div>
    </div>

    <div class="wpjscode_content_wrapper">
        <div class="wpjscode_content_cell" id="wpjscode_content_top">
        <h1 id="wpjscode-title">PrivacyPillar GDPR CCPA compliance</h1>
            <?php if ($response) { ?>
                <?php $_cls = ($response['status'] !== false) ? 'notice-success' : 'notice-error error'; ?>
                <div id="message" class="updated notice <?php echo esc_html($_cls, 'adzapier-gdpr'); ?> is-dismissible">
                    <p><?php echo esc_html($response['msg'], 'adzapier-gdpr') ?></p>
                    <button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button>
                </div>
            <?php } ?>

            <div class="adzapier-container adzapier-container__configuration-wizard">
                <div class="adzapier-container__configuration-wizard--content full">
                    <p>This plugin provides you with the easiest way to insert the JavaScript for implementing PrivacyPillar’s Cookie Banner and providing the network path to get cookie consent records from your website users.</p>
                    <h3>Getting Started with PrivacyPillar</h3>
                    <p>To configure the cookie banner and get the JS code, an PrivacyPillar account is required.</p>
                    <ul>
                        <li>
                            To sign up with PrivacyPillar, visit <a href="https://www.privacypillar.com" target="_blank">www.privacypillar.com</a>.
                        </li>
                        <li>
                            Choose a plan that opts to your requirements and subscribe or try the free trial out. See <a href="https://support.privacypillar.com/help-center/articles/23/12/1/create-account-and-sign-in" target="_blank">Getting Started</a> guide.
                        </li>
                    </ul>
                    <h3>How to Configure Cookie Consent Banner and get JS code</h3>
                    <ul>
                        <li>
                            Once you set up your account, go to our cookie consent solutions and scan your website.
                        </li>
                        <li>Configure the cookie banner for your website.</li>
                        <li>Get the JS code to implement the cookie banner.</li>
                    </ul>
                    <p>See <a href="https://support.privacypillar.com/help-center/categories/7/cookie-consent" target="_blank">Cookie Consent Documentation</a> for more details.</p>
                </div>
            </div>
            <div class="wp_js_code_main">
                <div class="wp_js_code_ctr">
                    <form action="" method="post">
                        <table class="form-table">
                            <tbody>
                                <tr class="form-field">
                                    <td>
                                        <label for="_head_js_code"><h3>Insert JS Code</h3></label>
                                        <p>Insert the copied script from PrivacyPillar Portal here and save it to publish the cookie banner on your website</p>
                                    </td>
                                </tr>
                                <tr class="form-field form-required">
                                    <td><textarea name="_head_js_code" id="_head_js_code" rows="10" cols="50"><?php echo esc_js($_adzapier_js_code) ?></textarea></td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="submit">
                            <?php $_nonce_id = uniqid(); ?>
                            <input type="hidden" name="frm-action" value="insertjs" />
                            <input type="hidden" name="_nonce_id" value="<?php echo $_nonce_id ?>" />
                            <?php wp_nonce_field('wp_js_code_' . $_nonce_id, 'wp_js_code_insert_nonce', false); ?>
                            <input type="submit" name="savejscode" id="savejscode" class="button button-primary" value="Save">
                        </p>
                    </form>
                    <div class="adzapier-more-features full">
                        <h3>More Features</h3>
                        <ul>
                            <li>In addition to cookie notice and preference pop-up, the above JS code implements a consent badge on your website that helps the users to modify their cookie preferences at any time.</li>
                            <li>Once you publish the cookie banner on your website, every consent given by the visitors will be recorded in our portal and you can track the records using our Consent Tracking module.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="adzapier-container adzapier-container__configuration-wizard">
                <div class="adzapier-container__configuration-wizard--content full">
                    <h3>Disclaimer</h3>
                    <p>This plugin helps you to insert the cookie consent banner script directly to your website. The use of this plugin by itself doesn't guarantee compliance with legal necessities associated with cookies.</p>
                </div>
            </div>
        </div>
        <div class="wpjscode_content_cell" id="sidebar-container">
            <div id="sidebar" class="adzapier-sidebar">
                <div class="wpjscode_content_cell_title adzapier-sidebar__title">
                    PrivacyPillar recommendations for you </div>
                <div class="adzapier-sidebar__section">
                    <a class="button button-primary wpjscode-btn" href="https://portal.privacypillar.com/signup" target="_blank" rel="noopener">Create PrivacyPillar Account</a>

                    <h2>Help Center</h2>
                    <p>To learn more about how PrivacyPillar CMP works, visit our <a href="https://support.privacypillar.com/help-center" target="_blank">PrivacyPillar Help Center</a>.</p>
                    <h2>About PrivacyPillar</h2>
                    <p>PrivacyPillar helps you to automate best practices of data & privacy compliance so that you can focus on what matters most in your core business activities.</p>
                    <p>The Consumer consents are all safe and stored in a concise manner that works as your audit-proof record if you and your customers might need it in the future.</p>
                </div>
            </div>
        </div>
    </div>
</div>