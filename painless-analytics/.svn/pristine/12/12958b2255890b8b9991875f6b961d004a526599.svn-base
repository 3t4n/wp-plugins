<?php
/*
 * admin/views/page.php
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?><div id="painlessanalytics-plugin-container">
    <div class="painlessanalytics-header">
        <div class="painlessanalytics-body">
            <div class="painlessanalytics-container">
                <?php painlessAnalyticsAdmin::view('header'); ?>
                <div class="wrap">
                    <h2><?php echo esc_html(__('Simplified web metrics', 'painless-analytics')); ?></h2><!-- so messages are relocated here -->
                </div>
            </div>
        </div>
    </div>
    <?php if( !painlessAnalytics::getInstance()->getApiUrl() ) { ?>
    <div class="painlessanalytics-hero">
        <div class="painlessanalytics-body">
            <div class="painlessanalytics-container">
                <p class="painlessanalytics-p-lg"><?php echo esc_html(__('Revolutionary web analytics allowing you to focus on the metrics that matter most.', 'painless-analytics')); ?></p>
                <p class="painlessanalytics-p-lg"><a class="painlessanalytics-link" 
                    href="https://account.painlessanalytics.com/start" 
                    title="<?php echo esc_attr( __('Sign up for FREE', 'painless-analytics')); ?>" target="_blank">
                    <?php echo esc_html( __('Sign up for FREE', 'painless-analytics')); ?></a> | <a class="painlessanalytics-link" 
                    href="https://www.painlessanalytics.com/" 
                    title="<?php echo esc_attr(__('Learn more', 'painless-analytics')); ?>" target="_blank">
                    <?php echo esc_html(__('Learn more', 'painless-analytics')); ?></a>
                </p>
            </div>
        </div>
    </div>
    <?php } ?>
    <div class="painlessanalytics-section-gray">
        <div class="painlessanalytics-body">
            <div class="painlessanalytics-container">
            <?php painlessAnalyticsAdmin::view('setup'); ?>
            </div>
        </div>
    </div>
    <div class="painlessanalytics-footer">
        <div class="painlessanalytics-container">
            <p>
            <?php echo esc_html( __( 'Having issues?', 'painless-analytics' ) ); ?>
            <a href="https://www.painlessanalytics.com/company/contact/" target="_blank"><?php echo esc_html( __('Please contact us', 'painless-analytics') ) ?></a>. 
            <?php echo esc_html( __( 'We want to help you!', 'painless-analytics' ) ); ?>
            </p>
        </div>
    </div>
</div>