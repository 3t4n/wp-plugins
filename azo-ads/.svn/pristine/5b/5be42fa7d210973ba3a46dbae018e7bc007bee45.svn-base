<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

include 'header.php';

$require_pro_class = ( ! defined( 'AZOADS_PRO_VERSION' ) || ! azoads_activated_pro() ) ? ' require-pro' : '';
$require_pro_class_btn_only = ( ! defined( 'AZOADS_PRO_VERSION' ) || ! azoads_activated_pro() ) ? ' require-pro has-btn-only' : '';
?>

<div id="azo-ads-settings" class="azo-ads-main">

    <div class="azo-ads-card">

        <!--begin::Card body-->
        <div class="card-body">

            <div class="settings-content">

                <!--begin:::Tabs-->
                <ul class="azo-ads-tabs">
                    <!--begin:::Tab item-->
                    <li>
                        <a class="nav-link active" href="#settings_general">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336c44.2 0 80-35.8 80-80s-35.8-80-80-80s-80 35.8-80 80s35.8 80 80 80z"/></svg>
                            <?php esc_html_e( 'General', 'azo-ads' ); ?>
                        </a>
                    </li>
                    <!--end:::Tab item-->

                    <!--begin:::Tab item-->
                    <li>
                        <a class="nav-link" href="#settings_tools">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4h54.1l109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109V104c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7H352c-8.8 0-16-7.2-16-16V102.6c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM104 432c0 13.3-10.7 24-24 24s-24-10.7-24-24s10.7-24 24-24s24 10.7 24 24z"/></svg>
                            <?php esc_html_e( 'Tools', 'azo-ads' ); ?>
                        </a>
                    </li>
                    <!--end:::Tab item-->

                    <!--begin:::Tab item-->
                    <li>
                        <a class="nav-link" href="#settings_help">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M0 64C0 28.7 28.7 0 64 0H448c35.3 0 64 28.7 64 64V352c0 35.3-28.7 64-64 64H309.3L185.6 508.8c-4.8 3.6-11.3 4.2-16.8 1.5s-8.8-8.2-8.8-14.3V416H64c-35.3 0-64-28.7-64-64V64zm169.8 53.3l-.4 1.2c-4.4 12.5 2.1 26.2 14.6 30.6s26.2-2.1 30.6-14.6l.4-1.2c1.1-3.2 4.2-5.3 7.5-5.3h58.3c8.4 0 15.1 6.8 15.1 15.1c0 5.4-2.9 10.4-7.6 13.1l-44.3 25.4c-7.5 4.3-12.1 12.2-12.1 20.8V216c0 13.3 10.7 24 24 24c13.1 0 23.8-10.5 24-23.6l32.3-18.5c19.6-11.3 31.7-32.2 31.7-54.8c0-34.9-28.3-63.1-63.1-63.1H222.6c-23.7 0-44.8 14.9-52.8 37.3zM288 304c0-17.7-14.3-32-32-32s-32 14.3-32 32s14.3 32 32 32s32-14.3 32-32z"/></svg>
                            <?php esc_html_e( 'Help & Support', 'azo-ads' ); ?>
                        </a>
                    </li>
                    <!--end:::Tab item-->
                    
                    <?php if ( defined( 'AZOADS_PRO_VERSION' ) ) : ?>
                    <!--begin:::Tab item-->
                    <li>
                        <a class="nav-link" href="#settings_license">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M160 64c0-35.3 28.7-64 64-64H384V128c0 17.7 14.3 32 32 32H544V448c0 35.3-28.7 64-64 64H253.3c1.8-5.1 2.7-10.5 2.7-16V416c1.3-.5 2.5-1 3.8-1.5c6.8-3 14.3-7.8 20.6-15.5c6.4-7.9 10.1-17.2 11.4-27.1c.5-3.6 .8-5.7 1.1-7.1c1.1-.9 2.8-2.3 5.6-4.5c19.9-15.4 27.1-42.2 17.5-65.5c-1.4-3.3-2.1-5.4-2.6-6.7c.5-1.4 1.2-3.4 2.6-6.7c9.5-23.3 2.4-50.1-17.5-65.5c-2.8-2.2-4.5-3.6-5.6-4.5c-.3-1.4-.6-3.6-1.1-7.1c-3.4-24.9-23-44.6-47.9-47.9c-3.6-.5-5.7-.8-7.1-1.1c-.9-1.1-2.3-2.8-4.5-5.6c-15.4-19.9-42.2-27.1-65.5-17.5c-2.6 1.1-5.1 2.3-6.6 3l-.1 .1V64zm384 64H416V0L544 128zM141.2 161.6L157 168c1.9 .8 4.1 .8 6.1 0l15.8-6.5c10-4.1 21.5-1 28.1 7.5l10.5 13.5c1.3 1.7 3.2 2.7 5.2 3l16.9 2.3c10.7 1.5 19.1 9.9 20.5 20.5l2.3 16.9c.3 2.1 1.4 4 3 5.2l13.5 10.5c8.5 6.6 11.6 18.1 7.5 28.1L280 285c-.8 1.9-.8 4.1 0 6.1l6.5 15.8c4.1 10 1 21.5-7.5 28.1l-13.5 10.5c-1.7 1.3-2.7 3.2-3 5.2l-2.3 16.9c-1.5 10.7-9.9 19.1-20.5 20.6L224 390.2V496c0 5.9-3.2 11.3-8.5 14.1s-11.5 2.5-16.4-.8L160 483.2l-39.1 26.1c-4.9 3.3-11.2 3.6-16.4 .8s-8.5-8.2-8.5-14.1V390.2l-15.5-2.1c-10.7-1.5-19.1-9.9-20.5-20.6l-2.3-16.9c-.3-2.1-1.4-4-3-5.2L41.1 334.9c-8.5-6.6-11.6-18.1-7.5-28.1L40 291c.8-1.9 .8-4.1 0-6.1l-6.5-15.8c-4.1-10-1-21.5 7.5-28.1l13.5-10.5c1.7-1.3 2.7-3.2 3-5.2l2.3-16.9c1.5-10.7 9.9-19.1 20.5-20.5l16.9-2.3c2.1-.3 4-1.4 5.2-3l10.5-13.5c6.6-8.5 18.1-11.6 28.1-7.5zM224 288c0-35.3-28.7-64-64-64s-64 28.7-64 64s28.7 64 64 64s64-28.7 64-64z"/></svg>
                            <?php esc_html_e( 'License', 'azo-ads' ); ?>
                        </a>
                    </li>
                    <!--end:::Tab item-->
                    <?php endif; ?>
                </ul>
                <!--end:::Tabs-->

                <div class="tab-content">
                    <form method="post" id="form-settings">
                        
                    <div class="tab-pane" id="settings_general" style="display: block;">
                        <div class="azo-ads-row">
                            <div class="azo-ads-row-inner">
                                <div class="form-label"></div>
                                <div class="form-content"><h3><?php esc_html_e( 'Ad Blocker Detector', 'azo-ads' ); ?></h3></div>
                            </div>
                        </div>
                        <div class="azo-ads-row">
                            <div class="azo-ads-row-inner">
                                <div class="form-label">
                                    <label>
                                        <span><?php esc_html_e( 'Enable Ad Blocker Detector', 'azo-ads' ); ?></span>
                                        <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Enable or Disable Ad Blocker Detector feature', 'azo-ads' ); ?>" target="_blank"></a>
                                    </label>
                                </div>
                                <div class="form-content">
                                    <input class="form-check-box" type="checkbox" name="settings[]" data-var="ab_detector" value="<?php echo esc_html( azoads_get_setting( 'ab_detector' ) ); ?>"<?php echo ( azoads_get_setting( 'ab_detector' ) == 1 ) ? ' checked': ''; ?>>
                                </div>
                            </div>
                        </div>
                        <div class="azo-ads-row">
                            <div class="azo-ads-row-inner">
                                <div class="form-label">
                                    <label>
                                        <span><?php esc_html_e( 'Dialog title', 'azo-ads' ); ?></span>
                                        <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Choose your dialog title popup', 'azo-ads' ); ?>" target="_blank"></a>
                                    </label>
                                </div>
                                <div class="form-content">
                                    <input type="text" class="azo-ads-form-control" name="settings[]" data-var="ab_detector_title" value="<?php echo ( strlen( azoads_get_setting( 'ab_detector_title' ) ) > 0 ) ? esc_html( azoads_get_setting( 'ab_detector_title' ) ) : esc_html( 'Ad Blocker Detector', 'azo-ads' ); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="azo-ads-row">
                            <div class="azo-ads-row-inner align-items-top">
                                <div class="form-label">
                                    <label>
                                        <span><?php esc_html_e( 'Dialog content', 'azo-ads' ); ?></span>
                                        <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Input your dialog content popup', 'azo-ads' ); ?>" target="_blank"></a>
                                    </label>
                                </div>
                                <div class="form-content">
                                    <textarea class="azo-ads-form-control" name="settings[]" data-var="ab_detector_content" rows="5"><?php if ( strlen( azoads_get_setting( 'ab_detector_content' ) ) > 0 ) : ?><?php echo esc_textarea( azoads_get_setting( 'ab_detector_content' ) ); ?><?php else : ?><?php esc_html_e( 'Please consider to disable Ad Blocker to able to access the website. Thank you!', 'azo-ads' ); ?><?php endif; ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="azo-ads-row row-divider">
                            <div class="azo-ads-row-inner">
                                <div class="form-label"></div>
                                <div class="form-content"><h3><?php esc_html_e( 'Ad Disablement', 'azo-ads' ); ?></h3></div>
                            </div>
                        </div>
                        <div class="azo-ads-row">
                            <div class="azo-ads-row-inner align-items-top">
                                <div class="form-label">
                                    <label>
                                        <span><?php esc_html_e( 'Hide ads from the crawlers', 'azo-ads' ); ?></span>
                                    </label>
                                </div>
                                <div class="form-content">
                                    <div class="form-content-settings-inner">
                                        <input class="form-check-box" type="checkbox" name="settings[]" data-var="ad_hide_crawlers" value="<?php echo esc_html( azoads_get_setting( 'ad_hide_crawlers' ) ); ?>"<?php echo ( azoads_get_setting( 'ad_hide_crawlers' ) == 1 ) ? ' checked': ''; ?>>
                                        <span class="settings-desc"><?php esc_html_e( 'Disable ads from more over 500 robots, crawlers and spiders user agent.', 'azo-ads' ); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="azo-ads-row">
                            <div class="azo-ads-row-inner<?php echo esc_html( $require_pro_class ); ?>">
                                <div class="form-label">
                                    <label>
                                        <span><?php esc_html_e( 'Hide ads by post types', 'azo-ads' ); ?></span>
                                        <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Choose the post types you wish to hide the ads', 'azo-ads' ); ?>" target="_blank"></a>
                                    </label>
                                </div>
                                <div class="form-content">
                                    <select id="ad_hide_post_types" class="azo-ads-multiple-select" name="settings[]" data-var="ad_hide_post_types" data-control="select2" data-hide-search="true" data-placeholder="<?php esc_html_e( 'Select post types', 'azo-ads' ); ?>" multiple="multiple">
                                        <?php
                                        $ad_post_types = array();
                                        $ad_args = array(
                                            'public' => true,
                                        );
                                        $ad_post_types_query = get_post_types( $ad_args, 'objects' );
                                        foreach ( $ad_post_types_query as $ad_post_type ) {
                                            $ad_post_types[$ad_post_type->name] = $ad_post_type->labels->name;
                                        }
                                        $selected_post_types = azoads_get_setting( 'ad_hide_post_types' );
                                        $selected_post_types = ( ! empty( $selected_post_types ) ) ? $selected_post_types : array();
                                        foreach ( $ad_post_types as $name => $label ) : ?>
                                        <option value="<?php echo $name; ?>"<?php if ( in_array( $name, $selected_post_types ) !== false ) { echo ' selected'; }?>><?php echo $label; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="azo-ads-row">
                            <div class="azo-ads-row-inner<?php echo esc_html( $require_pro_class ); ?>">
                                <div class="form-label">
                                    <label>
                                        <span><?php esc_html_e( 'Hide ads by user roles', 'azo-ads' ); ?></span>
                                        <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Choose the user roles you wish to hide the ads', 'azo-ads' ); ?>" target="_blank"></a>
                                    </label>
                                </div>
                                <div class="form-content">
                                    <select id="ad_hide_roles" class="azo-ads-multiple-select" name="settings[]" data-var="ad_hide_roles" data-control="select2" data-hide-search="true" data-placeholder="<?php esc_html_e( 'Select user roles', 'azo-ads' ); ?>" multiple="multiple">
                                        <?php
                                        global $wp_roles;
                                        $selected_roles = azoads_get_setting( 'ad_hide_roles' );
                                        $selected_roles = ( ! empty( $selected_roles ) ) ? $selected_roles : array();
                                        foreach ( $wp_roles->roles as $role => $role_detail ) : ?>
                                        <option value="<?php echo $role; ?>"<?php if ( in_array( $role, $selected_roles ) !== false ) { echo ' selected'; }?>><?php echo $role_detail['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="azo-ads-row row-divider">
                            <div class="azo-ads-row-inner">
                                <div class="form-label"></div>
                                <div class="form-content"><h3><?php esc_html_e( 'ads.txt (Authorized Digital Sellers)', 'azo-ads' ); ?></h3></div>
                            </div>
                        </div>
                        <div class="azo-ads-row">
                            <div class="azo-ads-row-inner">
                                <div class="form-label">
                                    <label>
                                        <span><?php esc_html_e( 'Enable ads.txt', 'azo-ads' ); ?></span>
                                        <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Enable or Disable ads.txt feature', 'azo-ads' ); ?>" target="_blank"></a>
                                    </label>
                                </div>
                                <div class="form-content">
                                    <input class="form-check-box" type="checkbox" name="settings[]" data-var="ads_enable" value="<?php echo esc_html( azoads_get_setting( 'ads_enable' ) ); ?>"<?php echo ( azoads_get_setting( 'ads_enable' ) == 1 ) ? ' checked': ''; ?>>
                                </div>
                            </div>
                        </div>
                        <div class="azo-ads-row">
                            <div class="azo-ads-row-inner align-items-top">
                                <div class="form-label">
                                    <label>
                                        <span><?php esc_html_e( 'File content', 'azo-ads' ); ?></span>
                                        <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Input the file content. For example: google.com, pub-0000000000000000, DIRECT, f08c47fec0942fa0', 'azo-ads' ); ?>" target="_blank"></a>
                                    </label>
                                </div>
                                <div class="form-content">
                                    <div class="form-content-settings-inner">
                                        <textarea class="azo-ads-form-control" name="settings[]" data-var="ads_content" rows="5"><?php if ( strlen( azoads_get_setting( 'ads_content' ) ) > 0 ) : ?><?php echo esc_textarea( azoads_get_setting( 'ads_content' ) ); ?><?php else : ?>google.com, pub-0000000000000000, DIRECT, f08c47fec0942fa0<?php endif; ?></textarea>
                                        <span class="settings-desc"><?php esc_html_e( 'Every record is separated by a new line.', 'azo-ads' ); ?> <a href="<?php bloginfo( 'url' ); ?>/ads.txt" target="_blank"><?php esc_html_e( 'View the ads.txt file!', 'azo-ads' ); ?></a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="azo-ads-row row-divider">
                            <div class="azo-ads-row-inner">
                                <div class="form-label"></div>
                                <div class="form-content"><h3><?php esc_html_e( 'Click Fraud Protection', 'azo-ads' ); ?></h3></div>
                            </div>
                        </div>
                        <div class="azo-ads-row">
                            <div class="azo-ads-row-inner">
                                <div class="form-label">
                                    <label>
                                        <span><?php esc_html_e( 'Enable Click Fraud Protection', 'azo-ads' ); ?></span>
                                        <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Interested in safeguarding your ad revenue?', 'azo-ads' ); ?>" target="_blank"></a>
                                    </label>
                                </div>
                                <div class="form-content<?php echo esc_html( $require_pro_class_btn_only ); ?>">
                                    <input class="form-check-box" type="checkbox" name="settings[]" data-var="cfp_enable" value="<?php echo esc_html( azoads_get_setting( 'cfp_enable' ) ); ?>"<?php echo ( azoads_get_setting( 'cfp_enable' ) == 1 ) ? ' checked': ''; ?>>
                                </div>
                            </div>
                        </div>
                        <div class="azo-ads-row">
                            <div class="azo-ads-row-inner">
                                <div class="form-label">
                                    <label>
                                        <span><?php esc_html_e( 'Allowed clicks', 'azo-ads' ); ?></span>
                                        <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Decide on the number of allowed clicks on every ad before the plugin hides it', 'azo-ads' ); ?>" target="_blank"></a>
                                    </label>
                                </div>
                                <div class="form-content">
                                    <input type="number" class="azo-ads-form-control" name="settings[]" min="1" step="1" data-var="cfp_allowed_clicks" value="<?php echo ( strlen( azoads_get_setting( 'cfp_allowed_clicks' ) ) > 0 ) ? esc_html( azoads_get_setting( 'cfp_allowed_clicks' ) ) : 3; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="azo-ads-row">
                            <div class="azo-ads-row-inner">
                                <div class="form-label">
                                    <label>
                                        <span><?php esc_html_e( 'Click limit (in hours)', 'azo-ads' ); ?></span>
                                        <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Set the period for a visitor to reach that click limit before the ad disappears', 'azo-ads' ); ?>" target="_blank"></a>
                                    </label>
                                </div>
                                <div class="form-content">
                                    <input type="number" class="azo-ads-form-control" name="settings[]" min="1" step="1" data-var="cfp_click_limit" value="<?php echo ( strlen( azoads_get_setting( 'cfp_click_limit' ) ) > 0 ) ? esc_html( azoads_get_setting( 'cfp_click_limit' ) ) : 3; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="azo-ads-row">
                            <div class="azo-ads-row-inner">
                                <div class="form-label">
                                    <label>
                                        <span><?php esc_html_e( 'Ban period (in days)', 'azo-ads' ); ?></span>
                                        <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Specify how many days a user gets banned from the ad after exceeding the click limit', 'azo-ads' ); ?>" target="_blank"></a>
                                    </label>
                                </div>
                                <div class="form-content">
                                    <input type="number" class="azo-ads-form-control" name="settings[]" min="1" step="1" data-var="cfp_ban_period" value="<?php echo ( strlen( azoads_get_setting( 'cfp_ban_period' ) ) > 0 ) ? esc_html( azoads_get_setting( 'cfp_ban_period' ) ) : 7; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="azo-ads-row row-divider">
                            <div class="azo-ads-row-inner">
                                <div class="form-label"></div>
                                <div class="form-content"><h3><?php esc_html_e( 'Miscellaneous', 'azo-ads' ); ?></h3></div>
                            </div>
                        </div>
                        <div class="azo-ads-row">
                            <div class="azo-ads-row-inner">
                                <div class="form-label">
                                    <label>
                                        <span><?php esc_html_e( 'Role-Based Access Control', 'azo-ads' ); ?></span>
                                        <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Access plugin based on roles', 'azo-ads' ); ?>" target="_blank"></a>
                                    </label>
                                </div>
                                <div class="form-content">
                                    <div class="form-content-settings-inner">
                                        <select id="misc_access_roles" class="azo-ads-multiple-select" name="settings[]" data-var="misc_access_roles" data-control="select2" data-hide-search="true" data-placeholder="<?php esc_html_e( 'Select user roles', 'azo-ads' ); ?>" multiple="multiple">
                                            <?php
                                            $list_roles_access = azoads_get_list_role_based_access();
                                            $selected_roles = azoads_get_setting( 'misc_access_roles' );
                                            $selected_roles = ( ! empty( $selected_roles ) ) ? $selected_roles : array();
                                            foreach ( $list_roles_access as $role => $role_label ) : ?>
                                            <option value="<?php echo $role; ?>"<?php if ( in_array( $role, $selected_roles ) !== false ) { echo ' selected'; }?>><?php echo $role_label; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <span class="settings-desc"><?php esc_html_e( 'The adminitrator role is always accessible as default.', 'azo-ads' ); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="azo-ads-row">
                            <div class="azo-ads-row-inner align-items-top">
                                <div class="form-label">
                                    <label>
                                        <span><?php esc_html_e( 'Remove data on uninstall', 'azo-ads' ); ?></span>
                                        <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Remove all data relate to AZO Ads once uninstall the plugin', 'azo-ads' ); ?>" target="_blank"></a>
                                    </label>
                                </div>
                                <div class="form-content">
                                    <div class="form-content-settings-inner">
                                        <input class="form-check-box" type="checkbox" name="settings[]" data-var="misc_delete_data" value="<?php echo esc_html( azoads_get_setting( 'misc_delete_data' ) ); ?>"<?php echo ( azoads_get_setting( 'misc_delete_data' ) == 1 ) ? ' checked': ''; ?>>
                                        <span class="settings-desc azo-ads-text-warning"><?php esc_html_e( 'Warning: All data should be deleted, and it cannot be recovered.', 'azo-ads' ); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <div class="tab-pane" id="settings_tools">
                        <div class="azo-ads-row">
                            <div class="azo-ads-row-inner align-items-top has-btn-only">
                                <div class="form-label">
                                    <label>
                                        <span><?php esc_html_e( 'Export Settings', 'azo-ads' ); ?></span>
                                    </label>
                                </div>
                                <div class="form-content">
                                    <div class="form-content-settings-inner">
                                        <button type="submit" class="azo-btn azo-btn-tools azo-btn-export">
                                            <span class="indicator-label">
                                                <?php esc_html_e( 'Export', 'azo-ads' ); ?>
                                            </span>
                                        </button>
                                        <a id="azo-anchor-export" style="display: none;"></a>
                                        <span class="settings-desc"><?php esc_html_e( 'When you click the Export button, a .json configuration settings file should be downloaded to your computer.', 'azo-ads' ); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="azo-ads-row">
                            <div class="azo-ads-row-inner align-items-top has-btn-only">
                                <div class="form-label">
                                    <label>
                                        <span><?php esc_html_e( 'Import Settings', 'azo-ads' ); ?></span>
                                    </label>
                                </div>
                                <div class="form-content">
                                    <div class="form-content-settings-inner">
                                        <div class="azo-file-upload-import">
                                            <input type="file" name="azo-file-upload-import" id="azo-file-upload-import" class="azo-file-upload" accept="application/json">
                                            <button type="submit" class="azo-btn azo-btn-tools azo-btn-import">
                                                <span class="indicator-label">
                                                    <?php esc_html_e( 'Import', 'azo-ads' ); ?>
                                                </span>
                                            </button>
                                            <input type="hidden" name="azo-import-content" id="azo-import-content">
                                        </div>
                                        <span class="settings-desc"><?php esc_html_e( 'Choose a .json file from your computer. Click Import button to restore the settings configuration.', 'azo-ads' ); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="settings_help">
                        <div class="azo-ads-row">
                            <div class="azo-ads-row-inner">
                                <div class="form-label"></div>
                                <div class="form-content"><h3><?php esc_html_e( 'Ask for technical support', 'azo-ads' ); ?></h3></div>
                            </div>
                        </div>
                        <div class="azo-ads-row">
                            <div class="azo-ads-row-inner">
                                <div class="help-message"><?php esc_html_e( "We are always available to help you with everything related to ad. Please don't hesitate to contact us anytime.", 'azo-ads' ); ?></div>
                                <div class="help-via">
                                    <a href="https://my.azonow.com/support/" class="help-method help-ticket" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M416 176c0 97.2-93.1 176-208 176c-38.2 0-73.9-8.7-104.7-23.9c-7.5 4-16 7.9-25.2 11.4C59.8 346.4 37.8 352 16 352c-6.9 0-13.1-4.5-15.2-11.1s.2-13.8 5.8-17.9l0 0 0 0 .2-.2c.2-.2 .6-.4 1.1-.8c1-.8 2.5-2 4.3-3.7c3.6-3.3 8.5-8.1 13.3-14.3c5.5-7 10.7-15.4 14.2-24.7C14.7 250.3 0 214.6 0 176C0 78.8 93.1 0 208 0S416 78.8 416 176zM231.5 383C348.9 372.9 448 288.3 448 176c0-5.2-.2-10.4-.6-15.5C555.1 167.1 640 243.2 640 336c0 38.6-14.7 74.3-39.6 103.4c3.5 9.4 8.7 17.7 14.2 24.7c4.8 6.2 9.7 11 13.3 14.3c1.8 1.6 3.3 2.9 4.3 3.7c.5 .4 .9 .7 1.1 .8l.2 .2 0 0 0 0c5.6 4.1 7.9 11.3 5.8 17.9c-2.1 6.6-8.3 11.1-15.2 11.1c-21.8 0-43.8-5.6-62.1-12.5c-9.2-3.5-17.8-7.4-25.2-11.4C505.9 503.3 470.2 512 432 512c-95.6 0-176.2-54.6-200.5-129zM136.2 108.4l-.4 1c-3.7 10.4 1.8 21.8 12.2 25.5s21.8-1.8 25.5-12.2l.4-1c.9-2.7 3.5-4.4 6.3-4.4h48.5c7 0 12.6 5.7 12.6 12.6c0 4.5-2.4 8.7-6.3 10.9L198 162.1c-6.2 3.6-10 10.2-10 17.3v11.2c0 11 9 20 20 20c10.9 0 19.8-8.8 20-19.6l26.9-15.4c16.3-9.4 26.4-26.8 26.4-45.6c0-29.1-23.6-52.6-52.6-52.6H180.2c-19.8 0-37.4 12.4-44 31.1zM234.7 264a26.7 26.7 0 1 0 -53.3 0 26.7 26.7 0 1 0 53.3 0z"></path></svg>
                                        <?php esc_html_e( 'Submit a Ticket', 'azo-ads' ); ?>
                                    </a>
                                    <a href="https://ads.azonow.com/documentation/" class="help-method help-documentation" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M0 32C0 14.3 14.3 0 32 0H96c17.7 0 32 14.3 32 32V96H0V32zm0 96H128V384H0V128zM0 416H128v64c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32V416zM160 32c0-17.7 14.3-32 32-32h64c17.7 0 32 14.3 32 32V96H160V32zm0 96H288V384H160V128zm0 288H288v64c0 17.7-14.3 32-32 32H192c-17.7 0-32-14.3-32-32V416zm203.6-19.9L320 232.6V142.8l100.4-26.9 66 247.4L363.6 396.1zM412.2 85L320 109.6V11l36.9-9.9c16.9-4.6 34.4 5.5 38.9 22.6L412.2 85zM371.8 427l122.8-32.9 16.3 61.1c4.5 17-5.5 34.5-22.5 39.1l-61.4 16.5c-16.9 4.6-34.4-5.5-38.9-22.6L371.8 427z"></path></svg>
                                        <?php esc_html_e( 'Documentation', 'azo-ads' ); ?>
                                    </a>
                                    <a href="https://my.azonow.com/support/add-ticket/" class="help-method help-feature" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M234.7 42.7L197 56.8c-3 1.1-5 4-5 7.2s2 6.1 5 7.2l37.7 14.1L248.8 123c1.1 3 4 5 7.2 5s6.1-2 7.2-5l14.1-37.7L315 71.2c3-1.1 5-4 5-7.2s-2-6.1-5-7.2L277.3 42.7 263.2 5c-1.1-3-4-5-7.2-5s-6.1 2-7.2 5L234.7 42.7zM46.1 395.4c-18.7 18.7-18.7 49.1 0 67.9l34.6 34.6c18.7 18.7 49.1 18.7 67.9 0L529.9 116.5c18.7-18.7 18.7-49.1 0-67.9L495.3 14.1c-18.7-18.7-49.1-18.7-67.9 0L46.1 395.4zM484.6 82.6l-105 105-23.3-23.3 105-105 23.3 23.3zM7.5 117.2C3 118.9 0 123.2 0 128s3 9.1 7.5 10.8L64 160l21.2 56.5c1.7 4.5 6 7.5 10.8 7.5s9.1-3 10.8-7.5L128 160l56.5-21.2c4.5-1.7 7.5-6 7.5-10.8s-3-9.1-7.5-10.8L128 96 106.8 39.5C105.1 35 100.8 32 96 32s-9.1 3-10.8 7.5L64 96 7.5 117.2zm352 256c-4.5 1.7-7.5 6-7.5 10.8s3 9.1 7.5 10.8L416 416l21.2 56.5c1.7 4.5 6 7.5 10.8 7.5s9.1-3 10.8-7.5L480 416l56.5-21.2c4.5-1.7 7.5-6 7.5-10.8s-3-9.1-7.5-10.8L480 352l-21.2-56.5c-1.7-4.5-6-7.5-10.8-7.5s-9.1 3-10.8 7.5L416 352l-56.5 21.2z"/></svg>
                                        <?php esc_html_e( 'Request Features', 'azo-ads' ); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if ( defined( 'AZOADS_PRO_VERSION' ) ) : ?>
                    <?php include_once AZOADS_PRO_BASE_PATH . 'views/admin/settings-license.php'; ?>
                    <?php endif; ?>

                    <!-- form submit -->
                    <div class="form-btn">
                        <div class="azo-ads-row">
                            <div class="azo-ads-row-inner">
                                <div class="form-label"></div>
                                <div class="form-content">
                                    <button type="submit" class="azo-btn azo-btn-primary btn-settings">
                                        <span class="indicator-label">
                                            <?php esc_html_e( 'Save Settings', 'azo-ads' ); ?>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- // form submit -->
                    </form>

                </div>
            </div>

            <div class="settings-license-info">
                <div class="sli-heading"><?php esc_html_e( 'My AZO Account', 'azo-ads' ); ?></div>
                <div class="sli-detail">
                    <?php
                    if ( class_exists( 'AZOAds_Pro_License' ) ) :
                        $license = new AZOAds_Pro_License;
                    ?>
                    <p>Your plan is <strong>AZO Ads <span class="pro">Pro</span></strong><?php if ( $license->isTrial() ) : ?> <strong>(Trial)</strong><?php endif; ?>.</p>
                    <?php if ( $license->isValid() ) : ?>
                    <p>License key has been <span class="activated">activated</span>.</p>
                    <p>Your license is valid for <strong><?php echo esc_html( $license->getDayRemain() ); ?></strong>.</p>
                    <p>Thank you for purchasing the license. You're having all the Pro benefits of the AZO Ads Pro along with updates & technical support.</p>
                    <?php elseif ( $license->isExceeded() ) : ?>
                    <p>Your license key has reached its activation limit. Please login at <a href="https://my.azonow.com/">My AZO</a> to manage the limitation.</p>
                    <p>
                        <button type="button" id="license-extend" class="azo-btn azo-btn-primary btn-license-extend" onclick="location.href='https://my.azonow.com/'">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M160 64c0-35.3 28.7-64 64-64H384V128c0 17.7 14.3 32 32 32H544V448c0 35.3-28.7 64-64 64H253.3c1.8-5.1 2.7-10.5 2.7-16V416c1.3-.5 2.5-1 3.8-1.5c6.8-3 14.3-7.8 20.6-15.5c6.4-7.9 10.1-17.2 11.4-27.1c.5-3.6 .8-5.7 1.1-7.1c1.1-.9 2.8-2.3 5.6-4.5c19.9-15.4 27.1-42.2 17.5-65.5c-1.4-3.3-2.1-5.4-2.6-6.7c.5-1.4 1.2-3.4 2.6-6.7c9.5-23.3 2.4-50.1-17.5-65.5c-2.8-2.2-4.5-3.6-5.6-4.5c-.3-1.4-.6-3.6-1.1-7.1c-3.4-24.9-23-44.6-47.9-47.9c-3.6-.5-5.7-.8-7.1-1.1c-.9-1.1-2.3-2.8-4.5-5.6c-15.4-19.9-42.2-27.1-65.5-17.5c-2.6 1.1-5.1 2.3-6.6 3l-.1 .1V64zm384 64H416V0L544 128zM141.2 161.6L157 168c1.9 .8 4.1 .8 6.1 0l15.8-6.5c10-4.1 21.5-1 28.1 7.5l10.5 13.5c1.3 1.7 3.2 2.7 5.2 3l16.9 2.3c10.7 1.5 19.1 9.9 20.5 20.5l2.3 16.9c.3 2.1 1.4 4 3 5.2l13.5 10.5c8.5 6.6 11.6 18.1 7.5 28.1L280 285c-.8 1.9-.8 4.1 0 6.1l6.5 15.8c4.1 10 1 21.5-7.5 28.1l-13.5 10.5c-1.7 1.3-2.7 3.2-3 5.2l-2.3 16.9c-1.5 10.7-9.9 19.1-20.5 20.6L224 390.2V496c0 5.9-3.2 11.3-8.5 14.1s-11.5 2.5-16.4-.8L160 483.2l-39.1 26.1c-4.9 3.3-11.2 3.6-16.4 .8s-8.5-8.2-8.5-14.1V390.2l-15.5-2.1c-10.7-1.5-19.1-9.9-20.5-20.6l-2.3-16.9c-.3-2.1-1.4-4-3-5.2L41.1 334.9c-8.5-6.6-11.6-18.1-7.5-28.1L40 291c.8-1.9 .8-4.1 0-6.1l-6.5-15.8c-4.1-10-1-21.5 7.5-28.1l13.5-10.5c1.7-1.3 2.7-3.2 3-5.2l2.3-16.9c1.5-10.7 9.9-19.1 20.5-20.5l16.9-2.3c2.1-.3 4-1.4 5.2-3l10.5-13.5c6.6-8.5 18.1-11.6 28.1-7.5zM224 288c0-35.3-28.7-64-64-64s-64 28.7-64 64s28.7 64 64 64s64-28.7 64-64z"></path></svg>
                            <span class="indicator-label">Manage License</span>
                        </button>
                    </p>
                    <?php elseif ( $license->isExpired() ) : ?>
                    <p>License key is expired. Please extend your license.</p>
                    <p>
                        <button type="button" id="license-extend" class="azo-btn azo-btn-primary btn-license-extend" onclick="location.href='https://my.azonow.com/'">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M160 64c0-35.3 28.7-64 64-64H384V128c0 17.7 14.3 32 32 32H544V448c0 35.3-28.7 64-64 64H253.3c1.8-5.1 2.7-10.5 2.7-16V416c1.3-.5 2.5-1 3.8-1.5c6.8-3 14.3-7.8 20.6-15.5c6.4-7.9 10.1-17.2 11.4-27.1c.5-3.6 .8-5.7 1.1-7.1c1.1-.9 2.8-2.3 5.6-4.5c19.9-15.4 27.1-42.2 17.5-65.5c-1.4-3.3-2.1-5.4-2.6-6.7c.5-1.4 1.2-3.4 2.6-6.7c9.5-23.3 2.4-50.1-17.5-65.5c-2.8-2.2-4.5-3.6-5.6-4.5c-.3-1.4-.6-3.6-1.1-7.1c-3.4-24.9-23-44.6-47.9-47.9c-3.6-.5-5.7-.8-7.1-1.1c-.9-1.1-2.3-2.8-4.5-5.6c-15.4-19.9-42.2-27.1-65.5-17.5c-2.6 1.1-5.1 2.3-6.6 3l-.1 .1V64zm384 64H416V0L544 128zM141.2 161.6L157 168c1.9 .8 4.1 .8 6.1 0l15.8-6.5c10-4.1 21.5-1 28.1 7.5l10.5 13.5c1.3 1.7 3.2 2.7 5.2 3l16.9 2.3c10.7 1.5 19.1 9.9 20.5 20.5l2.3 16.9c.3 2.1 1.4 4 3 5.2l13.5 10.5c8.5 6.6 11.6 18.1 7.5 28.1L280 285c-.8 1.9-.8 4.1 0 6.1l6.5 15.8c4.1 10 1 21.5-7.5 28.1l-13.5 10.5c-1.7 1.3-2.7 3.2-3 5.2l-2.3 16.9c-1.5 10.7-9.9 19.1-20.5 20.6L224 390.2V496c0 5.9-3.2 11.3-8.5 14.1s-11.5 2.5-16.4-.8L160 483.2l-39.1 26.1c-4.9 3.3-11.2 3.6-16.4 .8s-8.5-8.2-8.5-14.1V390.2l-15.5-2.1c-10.7-1.5-19.1-9.9-20.5-20.6l-2.3-16.9c-.3-2.1-1.4-4-3-5.2L41.1 334.9c-8.5-6.6-11.6-18.1-7.5-28.1L40 291c.8-1.9 .8-4.1 0-6.1l-6.5-15.8c-4.1-10-1-21.5 7.5-28.1l13.5-10.5c1.7-1.3 2.7-3.2 3-5.2l2.3-16.9c1.5-10.7 9.9-19.1 20.5-20.5l16.9-2.3c2.1-.3 4-1.4 5.2-3l10.5-13.5c6.6-8.5 18.1-11.6 28.1-7.5zM224 288c0-35.3-28.7-64-64-64s-64 28.7-64 64s28.7 64 64 64s64-28.7 64-64z"></path></svg>
                            <span class="indicator-label">Extend License</span>
                        </button>
                    </p>
                    <?php else : ?>
                    <p>License key is invalid or has not been activated yet.</p>
                    <?php endif; ?>
                    <?php else : ?>
                    <p>Your plan is <strong>AZO Ads Free</strong>.</p>
                    <p>Get <strong>AZO Ads <span class="pro">Pro</span></strong> to unlock all amazing features.</p>
                    <p>
                        <a href="https://my.azonow.com/cart/?add-to-cart=2214" class="azo-btn azo-btn-success btn-get-pro" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M160 64c0-35.3 28.7-64 64-64H384V128c0 17.7 14.3 32 32 32H544V448c0 35.3-28.7 64-64 64H253.3c1.8-5.1 2.7-10.5 2.7-16V416c1.3-.5 2.5-1 3.8-1.5c6.8-3 14.3-7.8 20.6-15.5c6.4-7.9 10.1-17.2 11.4-27.1c.5-3.6 .8-5.7 1.1-7.1c1.1-.9 2.8-2.3 5.6-4.5c19.9-15.4 27.1-42.2 17.5-65.5c-1.4-3.3-2.1-5.4-2.6-6.7c.5-1.4 1.2-3.4 2.6-6.7c9.5-23.3 2.4-50.1-17.5-65.5c-2.8-2.2-4.5-3.6-5.6-4.5c-.3-1.4-.6-3.6-1.1-7.1c-3.4-24.9-23-44.6-47.9-47.9c-3.6-.5-5.7-.8-7.1-1.1c-.9-1.1-2.3-2.8-4.5-5.6c-15.4-19.9-42.2-27.1-65.5-17.5c-2.6 1.1-5.1 2.3-6.6 3l-.1 .1V64zm384 64H416V0L544 128zM141.2 161.6L157 168c1.9 .8 4.1 .8 6.1 0l15.8-6.5c10-4.1 21.5-1 28.1 7.5l10.5 13.5c1.3 1.7 3.2 2.7 5.2 3l16.9 2.3c10.7 1.5 19.1 9.9 20.5 20.5l2.3 16.9c.3 2.1 1.4 4 3 5.2l13.5 10.5c8.5 6.6 11.6 18.1 7.5 28.1L280 285c-.8 1.9-.8 4.1 0 6.1l6.5 15.8c4.1 10 1 21.5-7.5 28.1l-13.5 10.5c-1.7 1.3-2.7 3.2-3 5.2l-2.3 16.9c-1.5 10.7-9.9 19.1-20.5 20.6L224 390.2V496c0 5.9-3.2 11.3-8.5 14.1s-11.5 2.5-16.4-.8L160 483.2l-39.1 26.1c-4.9 3.3-11.2 3.6-16.4 .8s-8.5-8.2-8.5-14.1V390.2l-15.5-2.1c-10.7-1.5-19.1-9.9-20.5-20.6l-2.3-16.9c-.3-2.1-1.4-4-3-5.2L41.1 334.9c-8.5-6.6-11.6-18.1-7.5-28.1L40 291c.8-1.9 .8-4.1 0-6.1l-6.5-15.8c-4.1-10-1-21.5 7.5-28.1l13.5-10.5c1.7-1.3 2.7-3.2 3-5.2l2.3-16.9c1.5-10.7 9.9-19.1 20.5-20.5l16.9-2.3c2.1-.3 4-1.4 5.2-3l10.5-13.5c6.6-8.5 18.1-11.6 28.1-7.5zM224 288c0-35.3-28.7-64-64-64s-64 28.7-64 64s28.7 64 64 64s64-28.7 64-64z"></path></svg>
                            Get AZO Ads Pro Now
                        </a>
                    </p>
                    <?php endif; ?>
                </div>

        </div>
        <!--end::Card body-->

        <?php wp_nonce_field( 'azoads-settings-ad', '_wpnonce' ); ?>

    </div>
</div>
<?php include 'footer.php'; ?>