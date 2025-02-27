<div id="partnero">

    <div class="center-wrap">

        <?php include_once Partnero_Util::get_plugin_directory() . 'admin/template/includes/top-bar.php' ?>

        <div class="partnero-heading py-2">
            <h1>Welcome!</h1>
            <p>Partnero is a powerful plugin designed to effortlessly manage affiliate and refer-a-friend programs directly within your WooCommerce store.</p>
            <?php if ( $active_type === Partnero_Util::TYPE_AFFILIATE ){ ?>
                <p class="description">Enhance your WooCommerce store with an affiliate program using Partnero. Effortlessly set up and manage your program to recruit, onboard, and engage affiliates, boosting your store’s reach.</p>
                <p class="description">With Partnero, you can:</p>
                <ul class="description">
                    <li><b>Customize Program Details:</b> Tailor settings to fit your business needs, including adjustable commission rates, multiple tiers, cookie lifetimes, and commission types.</li>
                    <li><b>Manage Tracking & Incentives:</b> Seamlessly handle tracking links, personalized coupons, and more.</li>
                    <li><b>Monitor Performance & Partners:</b>  Track program success, oversee partner accounts, and give affiliates access to a branded, user-friendly partner portal.</li>
                    <li><b>Automate & Streamline:</b> Save time with automated payouts, simplified partner onboarding, and customizable program emails for smooth communication.</li>
                </ul>
                <p class="description">Empower your business and increase your reach with Partnero’s comprehensive affiliate management tools.</p>
            <?php } ?>
            <?php if ( $active_type === Partnero_Util::TYPE_REFER_A_FRIEND ){ ?>
                <p class="description">Empower your customers to promote your WooCommerce store with the Partnero Refer-a-Friend program.</p>
                <p class="description">The Partnero Refer-a-Friend program allows your loyal customers to spread the word about your store and rewards them for their efforts, helping you grow through trusted recommendations.</p>
                <p class="description">With Partnero, you can:</p>
                <ul class="description">
                    <li><b>Offer Flexible Rewards:</b>  Set up various incentives, including discount codes or other rewards, for both the referring and referred customers.</li>
                    <li><b>Provide a Dedicated Referral Portal:</b>  Let customers track their rewards and view their referral history in a streamlined portal.</li>
                    <li><b>Streamline Reward Distribution:</b>  Effortlessly manage rewards and automate communication with program emails.</li>
                    <li><b>Identify Top Referrers:</b>  Track your best-performing customers, monitor their activity, and analyze conversions to optimize your referral strategy.</li>
                </ul>
                <p class="description">Partnero makes it easy to harness the power of referrals, increasing your reach and driving sales through customer advocacy.</p>
            <?php } ?>
        </div>

        <div class="partnero-heading py-2">
            <h1>Connect Partnero account</h1>
            <p>Choose what type of program you want to connect to your WooCommerce store.</p>
        </div>

        <div class="partnero-card white-card with-tabs">

            <?php if ( isset($active_type) ) { ?>
                <div class="partnero-card-tabs">
                    <a href="?page=partnero-admin&type=<?php echo Partnero_Util::TYPE_AFFILIATE; ?>" class="tab <?php echo ($active_type === Partnero_Util::TYPE_AFFILIATE) ? 'active' : ''; ?>">Affiliate</a>
                    <a href="?page=partnero-admin&type=<?php echo Partnero_Util::TYPE_REFER_A_FRIEND; ?>" class="tab <?php echo ($active_type === Partnero_Util::TYPE_REFER_A_FRIEND) ? 'active' : ''; ?>">Refer-A-Friend</a>
                </div>
            <?php } ?>

            <div class="partnero-card-content">

                <?php if ( $active_type === Partnero_Util::TYPE_AFFILIATE ){ ?>
                    <form action='' method='POST'>
                        <div class="api-key-wrapper">
                            <h4><label for='api-key'>API key</label></h4>
                            <input type='hidden' name='page' value='partnero-admin'/>
                            <input type='hidden' name='api_key_type' value='<?php echo Partnero_Util::TYPE_AFFILIATE ?>'/>
                            <input id='api-key' name='api_key' class='regular-text' type='password' required/>
                            <input type='submit' name='submit' id='submit' class='btn' value='Connect Affiliate program'>
                        </div>
                        <?php if ( ! empty( $error ) ){ ?>
                        <p style="color: #c12020; font-weight: bold;"><?php echo esc_html($error); ?></p>
                        <?php } ?>
                    </form>
                <?php } ?>
                <?php if ( $active_type === Partnero_Util::TYPE_REFER_A_FRIEND ){ ?>
                    <form action='' method='POST'>
                        <div class="api-key-wrapper">
                            <h4><label for='api-key'>API key</label></h4>
                            <input type='hidden' name='page' value='partnero-admin'/>
                            <input type='hidden' name='api_key_type' value='<?php echo Partnero_Util::TYPE_REFER_A_FRIEND ?>'/>
                            <input id='api-key' name='api_key' class='regular-text' type='password' required/>
                            <input type='submit' name='submit' id='submit' class='btn' value='Connect Refer-A-Friend program'>
                        </div>
                        <?php if ( ! empty( $error ) ){ ?>
                            <p style="color: #c12020; font-weight: bold;"><?php echo esc_html($error); ?></p>
                        <?php } ?>
                    </form>
                <?php } ?>

                <hr />

                <p class="small-description"  style="padding: 0; margin: 0;">
                    Looking for an API key?
                    <strong>
                       <a href="https://help.partnero.com/article/50-how-to-find-my-api-key" target="_blank">Click here for instructions <span class="dashicons dashicons-external"></span></a>
                   </strong>
                </p>

            </div>
        </div>

        <div class="partnero-heading py-2">
            <h1>Need help?</h1>
            <p>Learn more about Partnero.</p>
            <div class="grid quick-links-grid">
                <div class="slim-card white-card">
                    <a href="https://help.partnero.com" target="_blank" class="quick-links-flex-box">
                        <div class="grey-icon">
                            <span class="dashicons dashicons-editor-help"></span>
                        </div>
                        <div>
                            <h3 class="title">
                                Knowledge base
                            </h3>
                            <p class="description" style="margin-bottom: 0; margin-top: 0.625rem;">
                                Access the how-to guides and find answers to the most common questions, all in one place.
                            </p>
                        </div>
                    </a>
                </div>
                <div class="slim-card white-card">
                    <a href="https://help.partnero.com/article/5-getting-started" target="_blank" class="quick-links-flex-box">
                        <div class="grey-icon">
                            <span class="dashicons dashicons-text-page"></span>
                        </div>
                        <div>
                            <h3 class="title">
                                Getting started
                            </h3>
                            <p class="description" style="margin-bottom: 0; margin-top: 0.625rem;">
                                Things you should know about your Partnero account, including account setup and billing.
                            </p>
                        </div>
                    </a>
                </div>

            </div>
            <div class="py-2">
                <p class="description">Feel free to contact us at <a href="mailto:hello@partnero.com">hello@partnero.com</a></p>
            </div>
        </div>

    </div>
</div>
