<?php
/**
 * Content for help section in admin area.
 *
 * @package Maintenance Notice
 * @since 1.0.0
 * 
 */
?>
<div id="cvmn-help" style="display:none">
    <h2 class="cvmn-admin-title">
        <?php esc_html_e( 'Do you need any help related to our plugin ?', 'maintenance-notice' ); ?>
    </h2>
    <div class="cvmn-admin-img">
        <img src="<?php echo esc_url( plugins_url( 'includes/assets/images/support-img.jpg', dirname(__DIR__) ) ); ?>">
    </div>

    <div class="cvmn-admin-box-wrapper">
        <div class="cvmn-admin-fields">
            <?php esc_html_e( 'Our documentation gives all the necessary detailed information to get you started. It provides an elaborated overview on plugin features, how to use those features and how to troubleshoot errors.', 'maintenance-notice' ); ?>
            <div class="cvmn-main-btn">
                <a class="button-primary" href="https://docs.codevibrant.com/plugins/maintenance-notice" target="_blank"><?php esc_html_e( 'Documentation', 'maintenance-notice' ); ?></a>
            </div>
        </div><!-- .cvmn-admin-fields -->

        <div class="cvmn-admin-fields">
            <?php esc_html_e( 'Our TeamSupport specialists are standing by to better understand your customer support needs and solve your problem for you. We aim to provide professional technical support  24/7 to satisfy your need and wish. We also offer support via email and social media.', 'maintenance-notice' ); ?>
            <div class="cvmn-main-btn">
                <a class="button-primary" href="https://codevibrant.com/contact" target="_blank"><?php esc_html_e( 'Support', 'maintenance-notice' ); ?></a>
            </div>
        </div><!-- .cvmn-admin-fields -->

        <div class="cvmn-admin-fields">
            <?php esc_html_e( 'WPAllresources is a completely free online WordPress resources offers genuine and useful content helps to build your WordPress knowledge with us including tutorials, reviews, and many more.', 'maintenance-notice' ); ?>
            <div class="cvmn-main-btn">
                <a class="button-primary" href="https://wpallresources.com" target="_blank"><?php esc_html_e( 'Wpallresources', 'maintenance-notice' ); ?></a>
            </div>
        </div><!-- .cvmn-admin-fields -->
    </div><!-- .cvmn-admin-box-wrapper -->
</div><!-- .cvmn-help -->