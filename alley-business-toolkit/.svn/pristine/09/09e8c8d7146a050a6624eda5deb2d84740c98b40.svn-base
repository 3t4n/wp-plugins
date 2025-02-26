<?php
/*
* dashborad display page for alley toolkit page
*/
?>
<div class="abt-wrapper">
    <div class="abt-container">
        <div class="dashboard-header-text">
            <?php
            echo wp_kses_post('<h2 class="dashboard-header">'.esc_html__('Welcome to Alley ToolKit, companion plugin for Home Services by Alley Themes', 'alley-business-toolkit'). '</h2>');
            $theme = wp_get_theme();
            if ( 'Home Services' == $theme->name || 'Home Services' == $theme->parent_theme ) {
                //return
            }else{
                echo wp_kses_post('<h4 class="dashboard-sub-heder">' .esc_html__('If you haven’t installed Home Services Theme, please do so. ','alley-business-toolkit') .'<a href="' . esc_url( 'https://wordpress.org/themes/home-services/' ) . '"target="_blank" aria-label="' . esc_attr__( 'Click here to download the theme', 'alley-business-toolkit' ) . '">' . esc_html__( 'Click here to download the theme', 'alley-business-toolkit' ) . '</a></h4>');
            }
            ?>
        </div><!-- end of header section -->
        <div class="dashboard-banner dashborad-section">
            <div class="col-left equal-box">
                <div>
                    <?php
                    echo wp_kses_post('<h1>' . esc_html__('Import Starter Layouts  with a single click!', 'alley-business-toolkit') . '</h1>');
                    echo wp_kses_post('<p>' . esc_html__('If you are not sure how to start building your website, you can use one of our pre-build easy to import elementor starter layouts. Our starter demos are built using Elementor, “the world’s leading website builder”. They are easy to use and customize according to your needs.', 'alley-business-toolkit') . '</p>');
                    $demo_import_url = site_url() . '/wp-admin/themes.php?page=advanced-import';
                    printf('<a class="demo-link-button" href="%s"target="_self" aria-label="' . esc_attr__('Import DEmo', 'alley-business-toolkit') . '">' . esc_html__('Import Demo', 'alley-business-toolkit') . '</a>', esc_url($demo_import_url));
                    ?>
                </div>
            </div>
            <div class="col-right equal-box">
                <div class="card-holder">
                    <h2>Need Assistance Setting up Your Website?</h2>
                    <div>
                        <p>Let our expert team handle theme installation and setup and make your website look exactly like the demo.</p>
                    </div>
                    <div class="card-footer">
                        <div class="cta-button">
                            <a href="https://alleythemes.com/theme-setup-service/?utm_source=toolkit_dashboard_cta&utm_medium=dashboard_cta&utm_campaign=request_setup_service&utm_id=wpuser_theme_request" target="_blank">Request Setup</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if (! abt_fs()->can_use_premium_code() ) { ?>
            <!-- end of dashbaord banner -->
            <div class="dashborad-section abt-featrues-list">
                <?php echo wp_kses_post('<h1>'. esc_html__('Upgrade to Pro for more features','alley-business-toolkit').'</h1>');?>

                <table class="wp-list-table widefat striped table-view-list" cellspacing="0">
                    <thead>
                    <tr>
                        <th id="cb" class="manage-column column-cb " scope="col"><?php echo esc_html__('Features','alley-business-toolkit');?></th>
                        <th id="" class="manage-column " scope="col"><?php echo esc_html__('Free','alley-business-toolkit');?></th>
                        <th id="" class="manage-column " scope="col"><?php echo esc_html__('Pro','alley-business-toolkit');?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr></tr>
                    <tr class="">
                        <td class="title column-title has-row-actions" scope="row"><?php echo esc_html__('Starter Layouts','alley-business-toolkit');?></td>
                        <td class=""><?php echo esc_html__('1','alley-business-toolkit');?></td>
                        <td class=""><?php echo esc_html__('Multiple','alley-business-toolkit');?></td>
                    </tr>
                    <tr class="">
                        <td class="title column-title has-row-actions" scope="row"><?php echo __('One Click Demo Import','alley-business-toolkit');?></td>
                        <td class=""><?php echo esc_html__('Yes','alley-business-toolkit');?></td>
                        <td class=""><?php echo esc_html__('Yes','alley-business-toolkit');?></td>
                    </tr>
                    <tr class="">
                        <td class="title column-title has-row-actions" scope="row">Site Logo Management</td>
                        <td class=""><?php echo esc_html__('Yes','alley-business-toolkit');?></td>
                        <td class=""><?php echo esc_html__('Yes','alley-business-toolkit');?></td>
                    </tr>
                    <tr class="">
                        <td class="title column-title has-row-actions" scope="row">Font Options</td>
                        <td class=""><?php echo esc_html__('Yes','alley-business-toolkit');?></td>
                        <td class=""><?php echo esc_html__('Yes','alley-business-toolkit');?></td>
                    </tr>
                    <tr class="">
                        <td class="title column-title has-row-actions" scope="row">Color Options</td>
                        <td class=""><?php echo esc_html__('Yes','alley-business-toolkit');?></td>
                        <td class=""><?php echo esc_html__('Yes','alley-business-toolkit');?></td>
                    </tr>
                    <tr class="">
                        <td class="title column-title has-row-actions" scope="row">Responsive Design</td>
                        <td class=""><?php echo esc_html__('Yes','alley-business-toolkit');?></td>
                        <td class=""><?php echo esc_html__('Yes','alley-business-toolkit');?></td>
                    </tr>
                    <tr class="">
                        <td class="title column-title has-row-action" scope="row">Container Width Option</td>
                        <td class=""><?php echo esc_html__('Yes','alley-business-toolkit');?></td>
                        <td class=""><?php echo esc_html__('Yes','alley-business-toolkit');?></td>
                    </tr>
                    <tr class="">
                        <td class="title column-title has-row-actions" scope="row">Header Layout</td>
                        <td class=""><?php echo esc_html__('1','alley-business-toolkit');?></td>
                        <td class=""><?php echo esc_html__('Multiple','alley-business-toolkit');?></td>
                    </tr>
                    <tr class="">
                        <td class="title column-title has-row-actions" scope="row">Header Buttons</td>
                        <td class=""><?php echo esc_html__('No','alley-business-toolkit');?></td>
                        <td class=""><?php echo esc_html__('Yes','alley-business-toolkit');?></td>
                    </tr>
                    <tr class="">
                        <td class="title column-title has-row-actions" scope="row">Header stikcy</td>
                        <td class=""><?php echo esc_html__('Yes','alley-business-toolkit');?></td>
                        <td class=""><?php echo esc_html__('Yes','alley-business-toolkit');?></td>
                    </tr>
                    <tr class="">
                        <td class="title column-title has-row-actions" scope="row">Mobile CTA Button</td>
                        <td class=""><?php echo esc_html__('No','alley-business-toolkit');?></td>
                        <td class=""><?php echo esc_html__('Yes','alley-business-toolkit');?></td>
                    </tr>
                    <tr class="">
                        <td class="title column-title has-row-actions" scope="row">Blog Layout</td>
                        <td class=""><?php echo esc_html__('1','alley-business-toolkit');?></td>
                        <td class=""><?php echo esc_html__('Multiple','alley-business-toolkit');?></td>
                    </tr>
                    <tr class="">
                        <td class="title column-title has-row-actions" scope="row">Promotion Widget</td>
                        <td class=""><?php echo esc_html__('No','alley-business-toolkit');?></td>
                        <td class=""><?php echo esc_html__('Yes','alley-business-toolkit');?></td>
                    </tr>
                    <tr class="">
                        <td class="title column-title has-row-actions" scope="row">Testimonial Widget</td>
                        <td class=""><?php echo esc_html__('No','alley-business-toolkit');?></td>
                        <td class=""><?php echo esc_html__('Yes','alley-business-toolkit');?></td>
                    </tr>
                    <tr class="">
                        <td class="title column-title has-row-actions" scope="row">Team Widget</td>
                        <td class=""><?php echo esc_html__('No','alley-business-toolkit');?></td>
                        <td class=""><?php echo esc_html__('Yes','alley-business-toolkit');?></td>
                    </tr>
                    <tr class="">
                        <td class="title column-title has-row-actions" scope="row">Footer Copyright</td>
                        <td class=""><?php echo esc_html__('No','alley-business-toolkit');?></td>
                        <td class=""><?php echo esc_html__('Yes','alley-business-toolkit');?></td>
                    </tr>
                    <tr class="">
                        <td class="title column-title has-row-actions" scope="row">Documentation</td>
                        <td class=""><?php echo esc_html__('Yes','alley-business-toolkit');?></td>
                        <td class=""><?php echo esc_html__('Yes','alley-business-toolkit');?></td>
                    </tr>
                    <tr class="">
                        <td class="title column-title has-row-actions" scope="row">Premium Support</td>
                        <td class=""><?php echo esc_html__('No','alley-business-toolkit');?></td>
                        <td class=""><?php echo esc_html__('Yes','alley-business-toolkit');?></td>
                    </tr>

                    </tbody>
                </table>

                <div class="pro-link-cta">
                    <div class="cta-text"><?php echo wp_kses_post('<h3>'. esc_html__('Unlock all layouts and features with 1 license','alley-business-toolkit').'</h3>');?></div>
                    <div class="cta-button">
                        <?php printf('<a href="%s"target="_blank" aria-label="' . esc_attr__( 'Buy Pro', 'alley-business-toolkit' ) . '">' . esc_html__( 'BUY PRO', 'alley-business-toolkit' ) . '</a>', esc_url( 'https://alleythemes.com/home-services-pro/' ) );?>
                    </div>
                </div>

            </div> <!-- end of features list -->
        <?php } ?>
        <div class="dashborad-section support-section">
            <?php echo wp_kses_post('<h1>'. esc_html__('Need Help?','alley-business-toolkit') .'</h1>');
            echo wp_kses_post('<p>' .esc_html__('If you are stuck anywhere, please go through the theme/plugin documentation or contact our support team.', 'alley-business-toolkit') .'</p>');?>

            <?php
            printf('<a class="support-button" href="%s"target="_blank" aria-label="' . esc_attr__( 'View Documentation', 'alley-business-toolkit' ) . '"> <span class="dashicons dashicons-open-folder"></span> ' . esc_html__( 'View Documentation', 'alley-business-toolkit' ) . '</a> <a class="support-button" href="%s"target="_blank" aria-label="' . esc_attr__( 'Support Ticket', 'alley-business-toolkit' ) . '"> <span class="dashicons dashicons-admin-tools"></span>' . esc_html__( 'Support Ticket', 'alley-business-toolkit' ) . '</a>', esc_url('https://doc.alleythemes.com/'), esc_url('https://alleythemes.com/support/'));
            ?>
        </div><!-- end of support section -->
    </div>
</div> 