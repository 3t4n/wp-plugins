<?php
defined( 'ABSPATH' ) or exit;

?>

<div class="molongui-page-support">

    <?php
    $args = array
    (
        'logo'   => false,
        'link'   => 'https://www.molongui.com/',
        'button' => null,
    );
    include 'parts/html-part-masthead.php';
    ?>

    <!-- Page Content -->
    <div class="m-page-content">

        <h2 class="m-section-title"><?php _e( "Need help? Let us know and we will be happy to assist.", 'molongui-bump-offer' ); ?></h2>

        <!-- Docs -->
        <div class="m-card m-card-header">
            <div class="m-card-header__label">
                <span class="m-card-header__label-text"><?php _e( "Plugin Documentation", 'molongui-bump-offer' ); ?></span>
            </div>
            <div class="m-card-header__actions">
                <a href="<?php echo 'https://www.molongui.com/help/docs/'; ?>" target="_blank" type="button" class="m-button is-compact is-primary same-width"><?php _e( "Read Docs", 'molongui-bump-offer' ); ?></a>
            </div>
        </div>
        <div class="m-card">
            <div>
                <?php _e( "Learn the basics to help you make the most of Molongui plugins.", 'molongui-bump-offer' ); ?>
            </div>
        </div>

        <!-- Open Ticket -->
        <div class="m-card m-card-header">
            <div class="m-card-header__label">
                <span class="m-card-header__label-text"><?php _e( "Open a Support Ticket", 'molongui-bump-offer' ); ?></span>
            </div>
            <div class="m-card-header__actions">
                <a href="<?php echo 'https://www.molongui.com/help/support/'; ?>" target="_blank" type="button" class="m-button is-compact same-width"><?php _e( "Get Support", 'molongui-bump-offer' ); ?></a>
            </div>
        </div>
        <div class="m-card">
            <div>
                <?php printf( __( "Documentation didn't help? Submit a ticket below and get help from our friendly and knowledgeable %sMolonguis%s. We reply to every ticket, please check your Spam folder if you haven't heard from us.", 'molongui-bump-offer' ), '<i>', '</i>'); ?>
            </div>
        </div>
        <div class="m-card">
            <div>
                <form id="molongui-help-ticket-form">
                    <div id="molongui-form-error" class="hidden"><?php _e( "All fields are mandatory", 'molongui-bump-offer' ); ?></div>
                    <p>
                        <label for="your-name"><?php _e( "Name", 'molongui-bump-offer' ); ?></label>
                        <input type="text" name="your-name" required placeholder="<?php _e( "Your name here", 'molongui-bump-offer' ); ?>">
                    </p>
                    <p>
                        <label for="your-email"><?php _e( "Email", 'molongui-bump-offer' ); ?></label>
                        <input type="email" name="your-email" required placeholder="<?php _e( "Your e-mail here", 'molongui-bump-offer' ); ?>">
                    </p>
                    <p>
                        <label for="your-subject"><?php _e( "Subject", 'molongui-bump-offer' ); ?></label>
                        <input type="text" name="your-subject" required placeholder="<?php _e( "Brief issue description", 'molongui-bump-offer' ); ?>">
                    </p>
                    <p>
                        <label for="plugin"><?php _e( "Plugin", 'molongui-bump-offer' ); ?></label>
                        <select name="plugin" required>
                            <option value="">---</option>
                            <option value="Molongui Authorship">Molongui Authorship</option>
                            <option value="Molongui Deals, Sales Promotions and Upsells for WooCommerce">Molongui Deals, Sales Promotions and Upsells for WooCommerce</option>
                        </select>
                    </p>
                    <p>
                        <label for="your-message"><?php _e( "Message", 'molongui-bump-offer' ); ?></label>
                        <textarea name="your-message" cols="40" rows="7" required placeholder="<?php _e( "Explain your issue providing a URL we can check", 'molongui-bump-offer' ); ?>"></textarea>
                    </p>
                    <p><input type="checkbox" id="molongui-accept-tos" name="molongui-accept-tos" value="1"><?php printf( __( "I have read and accept the %sprivacy policy%s.", 'molongui-bump-offer' ), '<a href="https://www.molongui.com/privacy/">', '</a>' ); ?></p>
                    <p class="hidden"><input type="hidden" name="ticket-id" value="<?php echo 'HR'.date('y').'-'.date('mdHis'); ?>"></p>
                    <button type="submit" id="molongui-submit-ticket" class="m-button is-compact is-primary"><?php _e( "Open Support Ticket", 'molongui-bump-offer' ); ?></button>
                </form>
            </div>
        </div>

        <!-- Live Chat -->
        <div class="m-card m-card-header">
            <div class="m-card-header__label">
                <span class="m-card-header__label-text"><?php _e( "Live Support", 'molongui-bump-offer' ); ?></span>
            </div>
            <div class="m-card-header__actions">
                <a href="<?php echo $tidio_url; ?>" target="_blank" type="button" class="m-button is-compact same-width"><?php _e( "Open Chat", 'molongui-bump-offer' ); ?></a>
            </div>
        </div>
        <div class="m-card">
            <div>
                <?php _e( "Need answers and documentation didn't help? Chat with us. You can open the chat by clicking either on the link below, on the button above or on the floating dark button on the bottom right.", 'molongui-bump-offer' ); ?>
            </div>
            <div>
                <ul class="m-list">
                    <li><span class="dashicons dashicons-translation"></span><?php printf( __( "We speak %sEnglish%s and %sSpanish%s", 'molongui-bump-offer' ), '<strong>', '</strong>', '<strong>', '</strong>' ); ?></li>
                    <li><span class="dashicons dashicons-clock"></span><?php printf( __( "We answer Monday to Friday, from 9 AM to 5 PM (%sCentral European Time%s)", 'molongui-bump-offer' ), '<strong>', '</strong>' ); ?></li>
                    <li><span class="dashicons dashicons-email"></span><?php _e( "If offline, please leave your email address so we can get in touch with you", 'molongui-bump-offer' ); ?></li>
                </ul>
            </div>
        </div>
        <a class="m-card is-card-link is-compact" target="_blank" href="<?php echo $tidio_url; ?>" title="<?php _e( "Click to open Live Chat", 'molongui-bump-offer' ); ?>">
            <svg class="gridicon gridicons-external m-card__link-indicator" height="24" width="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g><path d="M19 13v6c0 1.105-.895 2-2 2H5c-1.105 0-2-.895-2-2V7c0-1.105.895-2 2-2h6v2H5v12h12v-6h2zM13 3v2h4.586l-7.793 7.793 1.414 1.414L19 6.414V11h2V3h-8z"></path></g></svg>
            <?php _e( "Open Live Support Chat", 'molongui-bump-offer' ); ?>
        </a>
<!--
        <div class="m-card">
            <div>
                <iframe src="<?php echo $tidio_url; ?>"></iframe>
            </div>
        </div>
-->
        <!-- Send Report -->
        <div class="m-card m-card-header">
            <div class="m-card-header__label">
                <span class="m-card-header__label-text"><?php _e( "System Status Report", 'molongui-bump-offer' ); ?></span>
            </div>
            <div class="m-card-header__actions">
                <a id="send-molongui-support-report" type="button" class="m-button is-compact is-primary same-width"><?php _e( "Send Report", 'molongui-bump-offer' ); ?></a>
            </div>
        </div>
        <div class="m-card">
            <div>
                <?php _e( "Sometimes we may ask you to send us your system status report so we can get a better knowledge of your installation.", 'molongui-bump-offer' ); ?>
            </div>
        </div>

        <!-- Nonce -->
        <?php wp_nonce_field( 'molongui-support-nonce', 'molongui-support-nonce', true, true ); ?>

    </div><!-- !m-page-content -->

    <?php
    $args = array
    (
        'links' => array
        (
            array
            (
                'label'   => __( "Website", 'molongui-bump-offer' ),
                'prefix'  => '',
                'suffix'  => '',
                'href'    => 'https://www.molongui.com/',
                'display' => true,
            ),
            array
            (
                'label'   => __( "Docs", 'molongui-bump-offer' ),
                'prefix'  => '',
                'suffix'  => '',
                'href'    => 'https://www.molongui.com/help/docs/',
                'display' => true,
            ),
            array
            (
                'label'   => __( "Demos", 'molongui-bump-offer' ),
                'prefix'  => '',
                'suffix'  => '',
                'href'    => 'https://demos.molongui.com/',
                'display' => true,
            ),
            array
            (
                'label'   => __( "Support", 'molongui-bump-offer' ),
                'prefix'  => '',
                'suffix'  => '',
                'href'    => 'https://www.molongui.com/help/support/',
                'display' => true,
            ),
            array
            (
                'label'   => __( "Chat", 'molongui-bump-offer' ),
                'prefix'  => '',
                'suffix'  => '',
                'href'    => 'https://www.tidiochat.com/chat/foioudbu7xqepgvwseufnvhcz6wkp7am',
                'display' => true,
            ),
        ),
    );
    include 'parts/html-part-footer.php';

    ?>

</div><!-- !molongui-page-support -->

<?php

mbo_enqueue_common_options_styles();
mbo_enqueue_support_styles();
mbo_enqueue_support_scripts();