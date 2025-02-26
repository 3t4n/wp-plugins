<?php
/**
 * Admin Sidebar Page
 *
 * This file contains the admin sidebar page for the "Awesome Responsive Photo Gallery" plugin.
 * The sidebar page displays various information and links related 
 * to the plugin, offering valuable resources for administrators.
 *
 * @package Awesome Responsive Photo Gallery - v1.2 - 12 January, 2025
 * @author Realwebcare
 * @link https://www.realwebcare.com/
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if(!class_exists('AWRPG_Sidebar')) {
    class AWRPG_Sidebar {

        /**
		 * Constructor to initialize gallery
		 */
        public function __construct() {
            // Constructor code, if needed, can be added here.
        }

        /**
         * Method to generate the sidebar content.
         *
         * @param bool $show_pro Whether to show the Pro section.
         * @param bool $show_note Whether to show the Note section.
         * @param bool $show_info Whether to show the Info section.
         * @param string $class Additional CSS class for styling.
         * @return string Sanitized and escaped HTML content.
         */
        function awrpg_sidebar($show_pro = true, $show_note = true, $show_info = true, $class='') {
            // Sanitize and escape class attribute.
            $class = !empty($class) ? ' ' . esc_attr($class) : '';

            // Initialize content.
            $content = '';
            $content .= '
            <div id="awrpg-sidebar" class="postbox-container'. $class .'">';

                // Pro Section
                if ($show_pro) {
                    $content .= '<div id="awrpgusage-pro" class="awrpgusage-sidebar">';
                    $content .= sprintf(
                        '<div class="awrpgusage-pro-header">
                            <img src="%s" alt="%s">
                        </div>
                        <div class="awrpgusage-pro-body">
                            <h3>%s</h3>
                            <div class="awrpg">%s</div>
                            <ul class="awrpgusage-list">
                                <li><strong>%s</strong></li>
                                <li><strong>%s</strong></li>
                                <li><strong>%s</strong></li>
                                <li><strong>%s</strong></li>
                                <li><strong>%s</strong></li>
                                <li>%s</li>
                                <li>%s</li>
                            </ul>
                            <a class="btn-demo" href="%s" target="_blank">%s</a>
                        </div>',
                        esc_url(AWRPG_PLUGIN_URL . 'assets/images/template-pro.jpg'),
                        esc_attr__('Pro Image', 'awesome-responsive-photo-gallery'),
                        esc_html__('Awesome Photo Gallery Pro Features', 'awesome-responsive-photo-gallery'),
                        esc_html__('Pro version has been developed to present Photo Gallery more proficiently. Some of the most notable features are:', 'awesome-responsive-photo-gallery'),
                        esc_html__('Masonry Support.', 'awesome-responsive-photo-gallery'),
                        esc_html__('Category Filtering Support', 'awesome-responsive-photo-gallery'),
                        esc_html__('Pagination Support', 'awesome-responsive-photo-gallery'),
                        esc_html__('Import/Export (Backup) Support', 'awesome-responsive-photo-gallery'),
                        esc_html__('Duplicate/Copy an image gallery', 'awesome-responsive-photo-gallery'),
                        esc_html__('Pro unlocks more advanced features than free!', 'awesome-responsive-photo-gallery'),
                        sprintf(
                            esc_html__('Click %s to learn more...', 'awesome-responsive-photo-gallery'),
                            '<a href="' . esc_url("https://www.realwebcare.com/item/image-gallery-responsive-photo-gallery-pro/") . '" target="_blank">' . esc_html__('here', 'awesome-responsive-photo-gallery') . '</a>'
                        ),
                        esc_url("https://www.realwebcare.com/demo/?product_id=awesome-image-gallery"),
                        esc_html__('View Demo', 'awesome-responsive-photo-gallery')
                    );
                    $content .= '</div>';
                }

                // Note section
                if ($show_note) {
                    ob_start();
                    ?>
                    <div id="awrpgusage-note" class="awrpgusage-sidebar">
                        <h3><?php esc_html_e('Why Use This Plugin?', 'awesome-responsive-photo-gallery'); ?></h3>
                        <div class="awrpg">
                            <p class="awrpg-first">
                            <?php
                                printf(
                                    esc_html__('WordPress has a built-in gallery feature, but it is quite basic. It doesn\'t include a. %slightbox%s option, which means when users click on an image, it opens in a new page instead of a popup. This can make browsing your images less user-friendly and slower.',
                                    'awesome-responsive-photo-gallery' ),
                                    '<strong>',
                                    '</strong>'
                                );
                            ?>
                            </p>
                            <p>
                            <?php
                                printf(
                                    esc_html__('Our plugin improves the default WordPress gallery by turning it into a %smodern, interactive lightbox gallery%s. Once installed, every gallery you create will have a smooth, professional look. Visitors can click on any image to view it in a popup with navigation options, making your gallery more attractive and easier to use.',
                                    'awesome-responsive-photo-gallery' ),
                                    '<strong>',
                                    '</strong>'
                                );
                            ?>
                            </p>
                            <h3><?php esc_html_e('How Does It Help You?', 'awesome-responsive-photo-gallery'); ?></h3>
                            <ol>
                                <li>
                                <?php
                                    printf(
                                        esc_html__('%sAutomatic Upgrade:%s After installing the plugin, it replaces the default gallery with the upgraded lightbox version—no extra setup needed.', 'awesome-responsive-photo-gallery' ),
                                        '<strong>',
                                        '</strong>'
                                    );
                                ?>
                                </li>
                                <li>
                                <?php
                                    printf(
                                        esc_html__('%sBetter User Experience:%s Visitors can quickly browse through images in a popup without leaving the page.', 'awesome-responsive-photo-gallery' ),
                                        '<strong>',
                                        '</strong>'
                                    );
                                ?>
                                </li>
                                <li>
                                <?php
                                    printf(
                                        esc_html__('%sProfessional Look:%s Makes your gallery feel premium and enhances your site\'s design.', 'awesome-responsive-photo-gallery' ),
                                        '<strong>',
                                        '</strong>'
                                    );
                                ?>
                                </li>
                            </ol>
                            <p><?php esc_html_e('This plugin works automatically, saving you time and effort while giving your gallery a polished, modern appearance.', 'awesome-responsive-photo-gallery'); ?></p>
                            <h3><?php esc_html_e('How to Create Gallery in Block Editor?', 'awesome-responsive-photo-gallery'); ?></h3>
                            <ol>
                                <li>
                                    <?php 
                                    printf(
                                        esc_html__('Go to %1$sPages > Add New Page%2$s.', 'awesome-responsive-photo-gallery'), 
                                        '<strong>', '</strong>'
                                    ); 
                                    ?>
                                </li>
                                <li>
                                    <?php 
                                    printf(
                                        esc_html__('Below %1$sAdd title%2$s, click on the %3$s+ (plus)%4$s icon.', 'awesome-responsive-photo-gallery'), 
                                        '<strong>', '</strong>', '<strong>', '</strong>'
                                    ); 
                                    ?>
                                </li>
                                <li>
                                    <?php 
                                    printf(
                                        esc_html__('In the %1$sSearch%2$s box, type %3$sClassic%4$s.', 'awesome-responsive-photo-gallery'), 
                                        '<strong>', '</strong>', '<strong>', '</strong>'
                                    ); 
                                    ?>
                                </li>
                                <li>
                                    <?php 
                                    printf(
                                        esc_html__('Click on %1$sClassic%2$s to open the %3$sClassic Editor%4$s window.', 'awesome-responsive-photo-gallery'), 
                                        '<strong>', '</strong>', '<strong>', '</strong>'
                                    ); 
                                    ?>
                                </li>
                                <li>
                                    <?php 
                                    printf(
                                        esc_html__('Click on the %1$sAdd Media%2$s icon and follow the same procedure described under the %3$sClassic Editor%4$s section on this help page, starting from instruction number %5$s3%6$s to %7$s7%8$s.', 'awesome-responsive-photo-gallery'), 
                                        '<strong>', '</strong>', '<strong>', '</strong>', '<strong>', '</strong>', '<strong>', '</strong>'
                                    ); 
                                    ?>
                                </li>
                                <li>
                                    <?php 
                                    printf(
                                        esc_html__('After clicking on %1$sInsert Gallery%2$s, you cannot manually add the gallery ID.', 'awesome-responsive-photo-gallery'),
                                        '<strong>', '</strong>'
                                    ); 
                                    ?>
                                </li>
                                <li>
                                    <?php 
                                    printf(
                                        esc_html__('We have added an %1$sAdd Gallery ID%2$s icon to make this process easier.', 'awesome-responsive-photo-gallery'), 
                                        '<strong>', '</strong>'
                                    ); 
                                    ?>
                                </li>
                                <li>
                                    <?php 
                                    printf(
                                        esc_html__('Click on the %1$sAdd Gallery ID%2$s icon and follow the steps from instruction number %3$s9%4$s mentioned under the %5$sClassic Editor%6$s section on this help page.', 'awesome-responsive-photo-gallery'), 
                                        '<strong>', '</strong>', '<strong>', '</strong>', '<strong>', '</strong>'
                                    ); 
                                    ?>
                                </li>
                            </ol>

                        </div>
                    </div>
                    <?php
                    $content .= ob_get_clean();
                }

                // Info section
                if ($show_info) {
                    $content .= '<div id="awrpgusage-info" class="awrpgusage-sidebar">';
                    $content .= sprintf(
                        '<h3>%s</h3>
                        <ul class="awrpgusage-list">
                            <li>%s</li>
                            <li>%s</li>
                            <li>%s</li>
                            <li>%s</li>
                            <li>%s</li>
                            <li>%s</li>
                            <li>%s: %s</li>
                            <li>%s: %s</li>
                            <li>%s: %s</li>
                            <li>%s: %s</li>
                        </ul>',
                        esc_html__('Plugin Info', 'awesome-responsive-photo-gallery'),
                        esc_html__('Awesome Responsive Photo Gallery', 'awesome-responsive-photo-gallery'),
                        esc_html__('Version: 1.2', 'awesome-responsive-photo-gallery'),
                        esc_html__('Scripts: PHP + CSS + JS', 'awesome-responsive-photo-gallery'),
                        esc_html__('Requires: WordPress 5.0', 'awesome-responsive-photo-gallery'),
                        esc_html__('First Released: 8 March, 2018', 'awesome-responsive-photo-gallery'),
                        esc_html__('Last Updated: 12 January, 2025', 'awesome-responsive-photo-gallery'),
                        esc_html__('By', 'awesome-responsive-photo-gallery'),
                        '<a href="'. esc_url('https://www.realwebcare.com/') .'" target="_blank">'. esc_html__('Realwebcare', 'awesome-responsive-photo-gallery') .'</a>',
                        esc_html__('Facebook Page', 'awesome-responsive-photo-gallery'),
                        '<a href="'. esc_url('https://www.facebook.com/realwebcare') .'" target="_blank">'. esc_html__('Realwebcare', 'awesome-responsive-photo-gallery') .'</a>',
                        esc_html__('Need Help?', 'awesome-responsive-photo-gallery'),
                        '<a href="'. esc_url('https://wordpress.org/support/plugin/awesome-responsive-photo-gallery/') .'" target="_blank">'. esc_html__('Support', 'awesome-responsive-photo-gallery') .'</a>',
                        esc_html__('Like it?', 'awesome-responsive-photo-gallery'),
                        '<a href="'. esc_url('https://wordpress.org/support/plugin/awesome-responsive-photo-gallery/reviews/?filter=5/#new-post') .'" target="_blank">'. esc_html__('&#9733;&#9733;&#9733;&#9733;&#9733;', 'awesome-responsive-photo-gallery') .'</a>',
                    );
                    $content .= '</div>';
                }

            $content .= '</div>';
    
            return $content;
        }
    }
}
