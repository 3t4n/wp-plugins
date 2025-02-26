<div class="forminix-main">
    <div class="forminix-container">

        <?php
            $activated_modules = $this->settings->listAllModules();
        ?>

        <div id="forminix_modules">

            <div class="forminix_modules_header">
                <div class="forminix_icon">
                    <img src="<?php echo esc_url(FORMINIX_IMG_DIR . "forminix_logo.svg") ?>"/>
                </div>
            </div>

            <div class="forminix_modules_body">
                <div class="forminix_modules_body_container">

                    <div class="forminix_modules_main_area">
                        <div class="forminix_modules_main_area_header">
                            <div class="forminix_modules_main_area_header_details">
                                <h2>All Modules</h2>
                                <p>Active modules are usable as Form Integrations</p>
                            </div>
                        </div>

                        <div class="forminix_modules_card_container">

                            <div class="forminix_modules_card" data-module="mailchimp">
                                <div class="forminix_modules_card_header"><h3>Mailchimp</h3></div>
                                <div class="forminix_modules_card_body">
                                    <div class="forminix_modules_card_image">
                                        <img width="210px" src="<?php echo esc_url(FORMINIX_IMG_DIR . "module_icons/forminix_module_icon_mailchimp.svg") ?>">
                                    </div>
                                    <div class="forminix_modules_card_details">
                                        <p>Automatically add Mailchimp Subscriber into your specific contact list when a user submits the form.</p>
                                    </div>
                                </div>
                                <div class="forminix_modules_card_footer">
                                    <span class="forminix_modules_card_status">Currently <?php echo in_array('mailchimp', $activated_modules) ? "Enabled" : "Disabled"; ?></span>
                                    <label class="forminix_modules_card_switch">
                                        <input onclick="forminix_module_update_activated_modules(`<?php echo esc_url(FORMINIX_URL); ?>`, this)" type="checkbox" <?php echo in_array('mailchimp', $activated_modules) ? "checked" : ""; ?>>
                                        <span class="forminix_modules_card_switch_slider round"></span>
                                    </label>
                                </div>
                            </div>


                            <div class="forminix_modules_card" data-module="slack">
                                <div class="forminix_modules_card_header"><h3>Slack</h3></div>
                                <div class="forminix_modules_card_body">
                                    <div class="forminix_modules_card_image">
                                        <img width="210px" src="<?php echo esc_url(FORMINIX_IMG_DIR . "module_icons/forminix_module_icon_slack.svg") ?>">
                                    </div>
                                    <div class="forminix_modules_card_details">
                                        <p>Automatically receive realtime notification on your Slack Channel when someone submits the form.</p>
                                    </div>
                                </div>
                                <div class="forminix_modules_card_footer">
                                    <span class="forminix_modules_card_status">Currently <?php echo in_array('slack', $activated_modules) ? "Enabled" : "Disabled"; ?></span>
                                    <label class="forminix_modules_card_switch">
                                        <input onclick="forminix_module_update_activated_modules(`<?php echo esc_url(FORMINIX_URL); ?>`, this)" type="checkbox" <?php echo in_array('slack', $activated_modules) ? "checked" : ""; ?>>
                                        <span class="forminix_modules_card_switch_slider round"></span>
                                    </label>
                                </div>
                            </div>


                            <div class="forminix_modules_card" data-module="mailjet">
                                <div class="forminix_modules_card_header"><h3>Mailjet</h3></div>
                                <div class="forminix_modules_card_body">
                                    <div class="forminix_modules_card_image">
                                        <img width="190px" src="<?php echo esc_url(FORMINIX_IMG_DIR . "module_icons/forminix_module_icon_mailjet.svg") ?>">
                                    </div>
                                    <div class="forminix_modules_card_details">
                                        <p>Automatically add Mailjet Subscriber into your specific contact list when a user submits the form.</p>
                                    </div>
                                </div>
                                <div class="forminix_modules_card_footer">
                                    <span class="forminix_modules_card_status">Available in Pro</span>
                                    <a href="<?php echo esc_url(FORMINIX_SERVER); ?>" class="upgrade_to_pro_btn" target="_blank">Upgrade to Pro</a>
                                </div>
                            </div>


                            <div class="forminix_modules_card" data-module="webhook_zapier">
                                <div class="forminix_modules_card_header"><h3>Zapier</h3></div>
                                <div class="forminix_modules_card_body">
                                    <div class="forminix_modules_card_image">
                                        <img width="190px" src="<?php echo esc_url(FORMINIX_IMG_DIR . "module_icons/forminix_module_icon_zapier.svg") ?>">
                                    </div>
                                    <div class="forminix_modules_card_details">
                                        <p>Connect to Zapier's Webhook to process form submission data with hundreds of apps and tools.</p>
                                    </div>
                                </div>
                                <div class="forminix_modules_card_footer">
                                    <span class="forminix_modules_card_status">Available in Pro</span>
                                    <a href="<?php echo esc_url(FORMINIX_SERVER); ?>" class="upgrade_to_pro_btn" target="_blank">Upgrade to Pro</a>
                                </div>
                            </div>


                            <div class="forminix_modules_card" data-module="webhook_pabbly">
                                <div class="forminix_modules_card_header"><h3>Pabbly</h3></div>
                                <div class="forminix_modules_card_body">
                                    <div class="forminix_modules_card_image">
                                        <img width="190px" src="<?php echo esc_url(FORMINIX_IMG_DIR . "module_icons/forminix_module_icon_pabbly.png") ?>">
                                    </div>
                                    <div class="forminix_modules_card_details">
                                        <p>Connect to Pabbly's Webhook to process form submission data with hundreds of apps and tools.</p>
                                    </div>
                                </div>
                                <div class="forminix_modules_card_footer">
                                    <span class="forminix_modules_card_status">Available in Pro</span>
                                    <a href="<?php echo esc_url(FORMINIX_SERVER); ?>" class="upgrade_to_pro_btn" target="_blank">Upgrade to Pro</a>
                                </div>
                            </div>


                            <div class="forminix_modules_card" data-module="user_registration">
                                <div class="forminix_modules_card_header"><h3>User Registration</h3></div>
                                <div class="forminix_modules_card_body">
                                    <div class="forminix_modules_card_image">
                                        <img width="180px" src="<?php echo esc_url(FORMINIX_IMG_DIR . "module_icons/forminix_module_icon_user_registration.svg") ?>">
                                    </div>
                                    <div class="forminix_modules_card_details">
                                        <p>Automatically create new WordPress user on form submission using the form field data sich as name, email, password etc.</p>
                                    </div>
                                </div>
                                <div class="forminix_modules_card_footer">
                                    <span class="forminix_modules_card_status">Available in Pro</span>
                                    <a href="<?php echo esc_url(FORMINIX_SERVER); ?>" class="upgrade_to_pro_btn" target="_blank">Upgrade to Pro</a>
                                </div>
                            </div>


                            <div class="forminix_modules_card" data-module="sendinblue">
                                <div class="forminix_modules_card_header"><h3>Sendinblue</h3></div>
                                <div class="forminix_modules_card_body">
                                    <div class="forminix_modules_card_image">
                                        <img width="210px" src="<?php echo esc_url(FORMINIX_IMG_DIR . "module_icons/forminix_module_icon_sendinblue.svg") ?>">
                                    </div>
                                    <div class="forminix_modules_card_details">
                                        <p>Automatically add Sendinblue Subscriber into your specific contact list when a user submits the form.</p>
                                    </div>
                                </div>
                                <div class="forminix_modules_card_footer">
                                    <span class="forminix_modules_card_status">Available in Pro</span>
                                    <a href="<?php echo esc_url(FORMINIX_SERVER); ?>" class="upgrade_to_pro_btn" target="_blank">Upgrade to Pro</a>
                                </div>
                            </div>


                            <div class="forminix_modules_card" data-module="mailerlite">
                                <div class="forminix_modules_card_header"><h3>MailerLite</h3></div>
                                <div class="forminix_modules_card_body">
                                    <div class="forminix_modules_card_image">
                                        <img width="180px" src="<?php echo esc_url(FORMINIX_IMG_DIR . "module_icons/forminix_module_icon_mailerlite.svg") ?>">
                                    </div>
                                    <div class="forminix_modules_card_details">
                                        <p>Automatically add MailerLite Subscriber into your specific group when a user submits the form.</p>
                                    </div>
                                </div>
                                <div class="forminix_modules_card_footer">
                                    <span class="forminix_modules_card_status">Available in Pro</span>
                                    <a href="<?php echo esc_url(FORMINIX_SERVER); ?>" class="upgrade_to_pro_btn" target="_blank">Upgrade to Pro</a>
                                </div>
                            </div>


                            <div class="forminix_modules_card" data-module="activecampaign">
                                <div class="forminix_modules_card_header"><h3>ActiveCampaign</h3></div>
                                <div class="forminix_modules_card_body">
                                    <div class="forminix_modules_card_image">
                                        <img width="230px" src="<?php echo esc_url(FORMINIX_IMG_DIR . "module_icons/forminix_module_icon_activecampaign.svg") ?>">
                                    </div>
                                    <div class="forminix_modules_card_details">
                                        <p>Automatically add ActiveCampaign Subscriber into your specific list when a user submits the form.</p>
                                    </div>
                                </div>
                                <div class="forminix_modules_card_footer">
                                    <span class="forminix_modules_card_status">Available in Pro</span>
                                    <a href="<?php echo esc_url(FORMINIX_SERVER); ?>" class="upgrade_to_pro_btn" target="_blank">Upgrade to Pro</a>
                                </div>
                            </div>


                            <div class="forminix_modules_card" data-module="mailpoet">
                                <div class="forminix_modules_card_header"><h3>MailPoet</h3></div>
                                <div class="forminix_modules_card_body">
                                    <div class="forminix_modules_card_image">
                                        <img width="150px" src="<?php echo esc_url(FORMINIX_IMG_DIR . "module_icons/forminix_module_icon_mailpoet.svg") ?>">
                                    </div>
                                    <div class="forminix_modules_card_details">
                                        <p>Automatically add Subscriber into your MailPoet contact list when a user submits the form.</p>
                                    </div>
                                </div>
                                <div class="forminix_modules_card_footer">
                                    <span class="forminix_modules_card_status">Available in Pro</span>
                                    <a href="<?php echo esc_url(FORMINIX_SERVER); ?>" class="upgrade_to_pro_btn" target="_blank">Upgrade to Pro</a>
                                </div>
                            </div>


                            <div class="forminix_modules_card" data-module="paypal">
                                <div class="forminix_modules_card_header"><h3>PayPal</h3></div>
                                <div class="forminix_modules_card_body">
                                    <div class="forminix_modules_card_image">
                                        <img width="190px" src="<?php echo esc_url(FORMINIX_IMG_DIR . "module_icons/forminix_module_icon_paypal.svg") ?>">
                                    </div>
                                    <div class="forminix_modules_card_details">
                                        <p>Enable PayPal payment after the form submission to create payment forms and accept payments.</p>
                                    </div>
                                </div>
                                <div class="forminix_modules_card_footer">
                                    <span class="forminix_modules_card_status">Available in Pro</span>
                                    <a href="<?php echo esc_url(FORMINIX_SERVER); ?>" class="upgrade_to_pro_btn" target="_blank">Upgrade to Pro</a>
                                </div>
                            </div>

                            <div class="forminix_modules_card" data-module="hubspot">
                                <div class="forminix_modules_card_header"><h3>HubSpot</h3></div>
                                <div class="forminix_modules_card_body">
                                    <div class="forminix_modules_card_image">
                                        <img width="180px" src="<?php echo esc_url(FORMINIX_IMG_DIR . "module_icons/forminix_module_icon_hubspot.svg") ?>">
                                    </div>
                                    <div class="forminix_modules_card_details">
                                        <p>Automatically add Subscriber into your HubSpot contact list when a user submits the form.</p>
                                    </div>
                                </div>
                                <div class="forminix_modules_card_footer">
                                    <span class="forminix_modules_card_status">Available in Pro</span>
                                    <a href="<?php echo esc_url(FORMINIX_SERVER); ?>" class="upgrade_to_pro_btn" target="_blank">Upgrade to Pro</a>
                                </div>
                            </div>

                            <div class="forminix_modules_card" data-module="trello">
                                <div class="forminix_modules_card_header"><h3>Trello</h3></div>
                                <div class="forminix_modules_card_body">
                                    <div class="forminix_modules_card_image">
                                        <img width="180px" src="<?php echo esc_url(FORMINIX_IMG_DIR . "module_icons/forminix_module_icon_trello.svg") ?>">
                                    </div>
                                    <div class="forminix_modules_card_details">
                                        <p>Automatically create cards with field data into Trello list of a board when a user submits the form.</p>
                                    </div>
                                </div>
                                <div class="forminix_modules_card_footer">
                                    <span class="forminix_modules_card_status">Available in Pro</span>
                                    <a href="<?php echo esc_url(FORMINIX_SERVER); ?>" class="upgrade_to_pro_btn" target="_blank">Upgrade to Pro</a>
                                </div>
                            </div>

                            <div class="forminix_modules_card" data-module="drip">
                                <div class="forminix_modules_card_header"><h3>Drip</h3></div>
                                <div class="forminix_modules_card_body">
                                    <div class="forminix_modules_card_image">
                                        <img width="160px" src="<?php echo esc_url(FORMINIX_IMG_DIR . "module_icons/forminix_module_icon_drip.svg") ?>">
                                    </div>
                                    <div class="forminix_modules_card_details">
                                        <p>Automatically add subscriber into your Drip contact list when a user submits the form created with Forminix.</p>
                                    </div>
                                </div>
                                <div class="forminix_modules_card_footer">
                                    <span class="forminix_modules_card_status">Available in Pro</span>
                                    <a href="<?php echo esc_url(FORMINIX_SERVER); ?>" class="upgrade_to_pro_btn" target="_blank">Upgrade to Pro</a>
                                </div>
                            </div>

                            <div class="forminix_modules_card" data-module="moosend">
                                <div class="forminix_modules_card_header"><h3>Moosend</h3></div>
                                <div class="forminix_modules_card_body">
                                    <div class="forminix_modules_card_image">
                                        <img width="210px" src="<?php echo esc_url(FORMINIX_IMG_DIR . "module_icons/forminix_module_icon_moosend.svg") ?>">
                                    </div>
                                    <div class="forminix_modules_card_details">
                                        <p>Automatically add subscriber into your Moosend mailing list when a user submits the form created with Forminix.</p>
                                    </div>
                                </div>
                                <div class="forminix_modules_card_footer">
                                    <span class="forminix_modules_card_status">Available in Pro</span>
                                    <a href="<?php echo esc_url(FORMINIX_SERVER); ?>" class="upgrade_to_pro_btn" target="_blank">Upgrade to Pro</a>
                                </div>
                            </div>

                            <div class="forminix_modules_card" data-module="sheets">
                                <div class="forminix_modules_card_header"><h3>Google Sheets</h3></div>
                                <div class="forminix_modules_card_body">
                                    <div class="forminix_modules_card_image">
                                        <img width="140px" src="<?php echo esc_url(FORMINIX_IMG_DIR . "module_icons/forminix_module_icon_sheets.svg") ?>">
                                    </div>
                                    <div class="forminix_modules_card_details">
                                        <p>Automatically add submission data to Google Sheet when a user submits the form created with Forminix.</p>
                                    </div>
                                </div>
                                <div class="forminix_modules_card_footer">
                                    <span class="forminix_modules_card_status">Available in Pro</span>
                                    <a href="<?php echo esc_url(FORMINIX_SERVER); ?>" class="upgrade_to_pro_btn" target="_blank">Upgrade to Pro</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>