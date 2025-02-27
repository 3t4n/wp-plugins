<?php

namespace forge12\floating_menu\component\floatingmenu {
    if (!defined('ABSPATH')) {
        exit;
    }

    /**
     * Class Frontend
     */
    class Frontend
    {

        /**
         * Admin constructor.
         */
        public function __construct()
        {
            add_action('wp_head', [$this, '_render']);
            add_action('wp_enqueue_scripts', [$this, '_addStyles']);
            add_filter('f12_floating_menu_get_link', [$this, '_replacePlaceholder'], 10, 1);
            add_filter(FORGE12_FLOATING_SLUG . '_before_render_menu_item', [$this, '_setPlaceholderIcon'], 10, 1);

            add_action('f12_floating_menu_inline_style', [$this, 'setInlineStyleLowerLeftCorner'], 10, 1);
            add_action('f12_floating_menu_inline_style', [$this, 'setInlineStyleUpperLeftCorner'], 10, 1);
            add_action('f12_floating_menu_inline_style', [$this, 'setInlineStyleUpperRightCorner'], 10, 1);
            add_action('f12_floating_menu_inline_style', [$this, 'setInlineStyleLowerRightCorner'], 10, 1);
            add_filter('f12_floating_menu_style', [$this, 'setStyleUpperLeftCorner'], 10, 3);
            add_filter('f12_floating_menu_style', [$this, 'setStyleLowerLeftCorner'], 10, 3);
            add_filter('f12_floating_menu_style', [$this, 'setStyleUpperRightCorner'], 10, 3);
            add_filter('f12_floating_menu_style', [$this, 'setStyleLowerRightCorner'], 10, 3);
        }

        /**
         * @param FloatingMenu $Menu
         *
         * @return string
         */
        public function setInlineStyleLowerLeftCorner($Menu)
        {
            if ($Menu->getPosition() != 'lowerleft') {
                return;
            }
            ?>
            <style>
                .f12-floating-menu.lowerleft ul {
                    left: 0;
                }

                .f12-floating-menu.lowerleft ul li {
                    margin-top: 0px;
                    margin-left: 0px;
                    width: <?php esc_attr_e(((int)$Menu->getOption('icon_padding',true)*2) + (int)$Menu->getOption('attachment_size', true));?>px;
                    height: <?php esc_attr_e(((int)$Menu->getOption('icon_padding',true)*2) + (int)$Menu->getOption('attachment_size', true));?>px;
                }

                .f12-floating-menu.lowerleft ul li .icon {
                    width: <?php esc_attr_e(((int)$Menu->getOption('icon_padding',true)*2) + (int)$Menu->getOption('attachment_size', true));?>px;
                    height: <?php esc_attr_e(((int)$Menu->getOption('icon_padding',true)*2) + (int)$Menu->getOption('attachment_size', true));?>px;
                }
            </style>
            <?php
        }

        /**
         * @param FloatingMenu $Menu
         *
         * @return string
         */
        public function setInlineStyleUpperLeftCorner($Menu)
        {
            if ($Menu->getPosition() != 'upperleft') {
                return;
            }
            ?>
            <style>
                .f12-floating-menu.upperleft ul {
                    left: 0;
                }

                .f12-floating-menu.upperleft ul li {
                    margin-top: 0px;
                    margin-left: 0px;
                    width: <?php esc_attr_e(((int)$Menu->getOption('icon_padding',true)*2) + (int)$Menu->getOption('attachment_size', true));?>px;
                    height: <?php esc_attr_e(((int)$Menu->getOption('icon_padding',true)*2) + (int)$Menu->getOption('attachment_size', true));?>px;
                }

                .f12-floating-menu.upperleft ul li .icon {
                    width: <?php esc_attr_e(((int)$Menu->getOption('icon_padding',true)*2) + (int)$Menu->getOption('attachment_size', true));?>px;
                    height: <?php esc_attr_e(((int)$Menu->getOption('icon_padding',true)*2) + (int)$Menu->getOption('attachment_size', true));?>px;
                }
            </style>
            <?php
        }

        /**
         * @param FloatingMenu $Menu
         *
         * @return string
         */
        public function setInlineStyleLowerRightCorner($Menu)
        {
            if ($Menu->getPosition() != 'bottomright') {
                return;
            }
            ?>
            <style>
                .f12-floating-menu.bottomright ul {
                    left: calc(100% - <?php esc_attr_e(((int)$Menu->getOption('icon_padding',true)*2) + (int)$Menu->getOption('attachment_size', true));?>px);
                }

                .f12-floating-menu.bottomright ul li {
                    margin-top: -<?php esc_attr_e(((int)$Menu->getOption('icon_padding',true)*2) + (int)$Menu->getOption('attachment_size', true));?>px;
                    margin-left: 0px;
                    width: <?php esc_attr_e(((int)$Menu->getOption('icon_padding',true)*2) + (int)$Menu->getOption('attachment_size', true));?>px;
                    height: <?php esc_attr_e(((int)$Menu->getOption('icon_padding',true)*2) + (int)$Menu->getOption('attachment_size', true));?>px;
                }

                .f12-floating-menu.bottomright ul li .icon {
                    width: <?php esc_attr_e(((int)$Menu->getOption('icon_padding',true)*2) + (int)$Menu->getOption('attachment_size', true));?>px;
                    height: <?php esc_attr_e(((int)$Menu->getOption('icon_padding',true)*2) + (int)$Menu->getOption('attachment_size', true));?>px;
                }
            </style>
            <?php
        }

        /**
         * @param FloatingMenu $Menu
         *
         * @return string
         */
        public function setInlineStyleUpperRightCorner($Menu)
        {
            if ($Menu->getPosition() != 'upperright') {
                return;
            }
            ?>
            <style>
                .f12-floating-menu.upperright ul {
                    left: calc(100% - <?php esc_attr_e(((int)$Menu->getOption('icon_padding',true)*2) + (int)$Menu->getOption('attachment_size', true));?>px);
                }

                .f12-floating-menu.upperright ul li {
                    margin-top: 0px;
                    margin-left: 0px;
                    width: <?php esc_attr_e(((int)$Menu->getOption('icon_padding',true)*2) + (int)$Menu->getOption('attachment_size', true));?>px;
                    height: <?php esc_attr_e(((int)$Menu->getOption('icon_padding',true)*2) + (int)$Menu->getOption('attachment_size', true));?>px;
                }

                .f12-floating-menu.upperright ul li .icon {
                    width: <?php esc_attr_e(((int)$Menu->getOption('icon_padding',true)*2) + (int)$Menu->getOption('attachment_size', true));?>px;
                    height: <?php esc_attr_e(((int)$Menu->getOption('icon_padding',true)*2) + (int)$Menu->getOption('attachment_size', true));?>px;
                }
            </style>
            <?php
        }

        /**
         * @param string       $style
         * @param FloatingMenu $Menu
         * @param array counter [column => <int>, row => <int>, number => <int>]
         *
         * @return string
         */
        public function setStyleLowerLeftCorner($style, $Menu, $counter)
        {
            if ($Menu->getPosition() != 'lowerleft') {
                return $style;
            }

            $size = (($Menu->getOption('icon_padding',true) * 2) + $Menu->getOption('attachment_size', true));

            $style .= 'margin-top:  ' . (-$size * ($counter['row'] + 1)) . 'px;';
            $style .= 'margin-left: ' . ($size * ($counter['column'] - 1)) . 'px;';

            return $style;
        }

        /**
         * @param string       $style
         * @param FloatingMenu $Menu
         * @param array counter [column => <int>, row => <int>, number => <int>]
         *
         * @return string
         */
        public function setStyleLowerRightCorner($style, $Menu, $counter)
        {
            if ($Menu->getPosition() != 'bottomright') {
                return $style;
            }

            $size = (($Menu->getOption('icon_padding',true) * 2) + $Menu->getOption('attachment_size', true)) * -1;

            $style .= 'margin-top:  ' . ($size * ($counter['row'] + 1)) . 'px;';
            $style .= 'margin-left: ' . ($size * ($counter['column'] - 1)) . 'px;';

            return $style;
        }

        /**
         * @param string       $style
         * @param FloatingMenu $Menu
         * @param array counter [column => <int>, row => <int>, number => <int>]
         *
         * @return string
         */
        public function setStyleUpperRightCorner($style, $Menu, $counter)
        {
            if ($Menu->getPosition() != 'upperright') {
                return $style;
            }

            $size = (($Menu->getOption('icon_padding',true) * 2) + $Menu->getOption('attachment_size', true));

            $style .= 'margin-top:  ' . ($size * ($counter['row'])) . 'px;';
            $style .= 'margin-left: ' . (-$size * ($counter['column'] - 1)) . 'px;';

            return $style;
        }

        /**
         * @param string       $style
         * @param FloatingMenu $Menu
         * @param array counter [column => <int>, row => <int>, number => <int>]
         *
         * @return string
         */
        public function setStyleUpperLeftCorner($style, $Menu, $counter)
        {
            if ($Menu->getPosition() != 'upperleft') {
                return $style;
            }

            $size = (($Menu->getOption('icon_padding',true) * 2) + $Menu->getOption('attachment_size', true));

            $style .= 'margin-top:  ' . ($size * ($counter['row'])) . 'px;';
            $style .= 'margin-left: ' . ($size * ($counter['column'] - 1)) . 'px;';

            return $style;
        }

        /**
         * Set default icon for links
         *
         * @param $link
         *
         * @return mixed
         */
        public function _setPlaceholderIcon($link)
        {
            if (empty($link['icon_id'])) {
                $link['icon_id'] = 'fas fa-image';
            }
            return $link;
        }

        /**
         * Replace all Placeholder with the specific information
         *
         * @param $link
         */
        public function _replacePlaceholder($link)
        {
            global $post;

            if (!$post) {
                return $link;
            }


            // Enter the current url into the link
            $link = str_replace('[post-title]', $post->post_title, $link);

            // Enter the current url into the link
            $link = str_replace('[post-url]', get_permalink($post->ID), $link);

            // Enter the attachment / Image if required
            $attachment = get_the_post_thumbnail_url($post);
            if (!$attachment) {
                $attachment = '';
            }
            $link = str_replace('[post-img]', $attachment, $link);

            // Enter the post short description
            $desc = $post->post_excerpt;
            $link = str_replace('[post-desc]', $desc, $link);

            return $link;
        }

        /**
         * Add the floating menu styles for the frontend
         */
        public function _addStyles()
        {
            wp_register_style('f12_floating_menu', plugin_dir_url(__FILE__) . 'assets/f12_floating_menu.css');
            wp_enqueue_style('f12_floating_menu');

            wp_register_script('f12_floating_menu', plugin_dir_url(__FILE__) . 'assets/f12_floating_menu_min.js', array('jquery'));
            wp_enqueue_script('f12_floating_menu');

            /*wp_register_script('f12_floating_menu', plugin_dir_url(__FILE__) . 'assets/f12_floating_menu.js', array('jquery'));
            wp_enqueue_script('f12_floating_menu');

            wp_register_script('f12_floating_menu_icon', plugin_dir_url(__FILE__) . 'assets/f12_floating_menu_icon.js', array('jquery'));
            wp_enqueue_script('f12_floating_menu_icon');

            wp_register_script('f12_floating_menu_full', plugin_dir_url(__FILE__) . 'assets/f12_floating_menu_full.js', array('jquery'));
            wp_enqueue_script('f12_floating_menu_full');

            wp_register_script('f12_floating_menu_animate', plugin_dir_url(__FILE__) . 'assets/f12_floating_menu_animate.js', array('jquery'));
            wp_enqueue_script('f12_floating_menu_animate');*/

            wp_register_style('f12_floating_menu_fontawesome', plugin_dir_url(__FILE__) . 'assets/vendor/fontawesome/css/all.css');
            wp_enqueue_style('f12_floating_menu_fontawesome');
        }

        /**
         * Generate the links
         */
        private function generateLinks($MenuStorage, string $position)
        {

            foreach ($MenuStorage as $key => $el) {

                foreach ($el as $Menu/** @var $Menu FloatingMenu */) {
                    $counter = array('number' => 0, 'row' => 0, 'column' => 0);

                    $links = $Menu->getLinks();
                    $links_counter = count($links);

                    foreach ($links as $link) {
                        $counter['number']++;

                        if ($Menu->getPosition() == $position) {

                            $name = '';
                            if (isset($link['display_name']) && $link['display_name'] == 1) {
                                $name = $link['name'];
                            }

                            /**
                             * Set the title to improve SEO
                             */
                            $title = isset($link['title']) ? $link['title'] : '';

                            /**
                             * Add the rel to increase security
                             */
                            $noopener = isset($link['nooopener']) ? $link['nooopener'] : 0;
                            $noreferrer = isset($link['noreferrer']) ? $link['noreferrer'] : 0;

                            $noopener = $noopener == 0 ? '' : 'noopener';
                            $noreferrer = $noreferrer == 0 ? '' : 'noreferrer';

                            $rel = $noopener . ' ' . $noreferrer;

                            /**
                             * Set the target
                             */
                            $target = isset($link['target']) ? $link['target'] : '';

                            /**
                             * Set Corner bottom right styles
                             */
                            if ($Menu->isPositionAtCorner()) {
                                if ($links_counter % 2 == 0) {
                                    $links_counter -= 1;
                                }

                                if ($counter['column'] >= floor(($links_counter) / 2) - $counter['row']) {
                                    $counter['row']++;
                                    $counter['column'] = 1;
                                } else {
                                    $counter['column']++;
                                }
                            }

                            $style = apply_filters('f12_floating_menu_style', '', $Menu, $counter);

                            ?>
                            <li class="f12-floating-menu-<?php esc_attr_e($Menu->getID()); ?>"
                                style="<?php esc_attr_e($style); ?>">
                                <a href="<?php echo esc_url(apply_filters('f12_floating_menu_get_link', $link['link'])); ?>"
                                   title="<?php esc_attr_e($title); ?>"
                                   rel="<?php esc_attr_e($rel); ?>"
                                   target="<?php esc_attr_e($target); ?>">
                                    <span class="icon">
                                        <?php
                                        $link = apply_filters(FORGE12_FLOATING_SLUG . '_before_render_menu_item', $link);
                                        $attachment = '';
                                        if(isset($link['attachment_url']) && !empty($link['attachment_url'])){
                                            $attachment = $link['attachment_url'];
                                        }else if (isset($link['attachment_id'])){
                                            $attachment = wp_get_attachment_image_src((int)$link['attachment_id']);
                                        }

                                        if (isset($link['icon_id']) && !empty($link['icon_id']) && empty($attachment)) {
                                            ?>
                                            <i class="<?php esc_attr_e($link['icon_id']); ?>"
                                               style=" font-size: <?php esc_attr_e($Menu->getOption('attachment_size', true)); ?>px;
                                                       width:<?php esc_attr_e($Menu->getOption('attachment_size', true)) ?>px;
                                                       height:<?php esc_attr_e($Menu->getOption('attachment_size', true)); ?>px;">
                                            </i>
                                            <?php
                                        } else if(!empty($attachment) && isset($attachment[0]) && is_array($attachment)) {
                                            $attachment_src = $attachment[0];
                                            ?>
                                            <img src="<?php echo esc_url($attachment_src); ?>"
                                                 style="width:<?php esc_attr_e($Menu->getOption('attachment_size', true)); ?>px;
                                                         height:<?php esc_attr_e($Menu->getOption('attachment_size', true)); ?>px;"/>
                                            <?php
                                        }else{
                                            ?>
                                            <img src="<?php echo esc_url($attachment); ?>"
                                                 style="width:<?php esc_attr_e($Menu->getOption('attachment_size', true)); ?>px;
                                                         height:<?php esc_attr_e($Menu->getOption('attachment_size', true)); ?>px;"/>
                                                <?php
                                        }
                                        ?>
                                    </span>
                                    <?php if (!$Menu->isPositionAtCorner()): ?>
                                        <span class="name"><?php esc_html_e($name); ?></span>
                                    <?php endif; ?>
                                </a>
                            </li>
                            <?php
                        }
                    }
                }
            }
        }

        /**
         * Render the floating menus
         */
        public function _render()
        {
            global $post;

            if (!$post) {
                return;
            }

            $Menus = FloatingMenuManager::getInstance()->getListForPostID($post);

            if (!empty($Menus)) {

                /* Store all links in this array - use the position as a key - this will allow us to merge multiple
                 * floating menus */
                $MenuStorage = [];

                foreach ($Menus as $key => $Menu) {

                    /* We store the whole menu on the given position */
                    if (!isset($MenuStorage[$Menu->getPosition()]) || !is_array($MenuStorage[$Menu->getPosition()])) {
                        $MenuStorage[$Menu->getPosition()] = [];
                    }

                    $MenuStorage[$Menu->getPosition()][] = $Menu;
                }

                $result = '';


                /**
                 * Generate the CSS and the outer wrapper of the menus
                 */
                $definedPositions = [];

                foreach ($MenuStorage as $key => $el) {

                    foreach ($el as $Menu/** @var $Menu FloatingMenu */) {
                        // Ensure that each position is only loaded once.
                        ?>
                        <style id="css-floating-menu">
                            .f12-floating-menu li.f12-floating-menu-<?php esc_attr_e($Menu->getID());?> {
                                background-color: <?php esc_attr_e( $Menu->getOption('background_color',true));?>;
                            }

                            .f12-floating-menu li.f12-floating-menu-<?php esc_attr_e($Menu->getID());?>:hover {
                                background-color: <?php esc_attr_e( $Menu->getOption('background_color_hover', true) );?>;
                            }

                            .f12-floating-menu li.f12-floating-menu-<?php esc_attr_e($Menu->getID());?> a {
                                color: <?php esc_attr_e( $Menu->getOption('link_color', true) );?>;
                            }

                            .f12-floating-menu li.f12-floating-menu-<?php esc_attr_e($Menu->getID());?> a .name {
                                font-size: <?php esc_attr_e( $Menu->getOption('font_size', true));?>px;
                            }

                            .f12-floating-menu li.f12-floating-menu-<?php esc_attr_e($Menu->getID());?>:hover a {
                                color: <?php esc_attr_e( $Menu->getOption('link_color_hover', true) );?>;
                            }

                            .f12-floating-menu li.f12-floating-menu-<?php esc_attr_e($Menu->getID());?> .name,
                            .f12-floating-menu li.f12-floating-menu-<?php esc_attr_e($Menu->getID());?> .icon {
                                padding: <?php esc_attr_e( $Menu->getOption('icon_padding', true) );?>px;
                            }
                        </style>
                        <?php do_action('f12_floating_menu_inline_style', $Menu); ?>
                        <?php
                        if (!isset($definedPositions[$Menu->getPosition()])) {
                            $classes = array();

                            if ($Menu->isVisibleOnDesktopDevices()) {
                                $classes[] = ' display-desktop ';
                            } else {
                                $classes[] = ' hide-desktop ';
                            }

                            if ($Menu->isVisibleOnMobileDevices()) {
                                $classes[] = ' display-mobile ';
                            } else {
                                $classes[] = ' hide-mobile ';
                            }

                            if ($Menu->isVisibleOnTabletDevices()) {
                                $classes[] = ' display-tablet ';
                            } else {
                                $classes[] = ' hide-tablet ';
                            }

                            if ($Menu->isAnimationDistanceEnabled()) {
                                $classes[] = ' animation-distance ';
                            }

                            if ($Menu->isAnimationSlideoutEnabled() && $Menu->getOption('display_settings', true) != 'full') {
                                $classes[] = ' animation-slideout ';
                            }

                            $classes[] = esc_attr($Menu->getOption('display_settings', true));
                            $classes[] = esc_attr($key);

                            $definedPositions[$Menu->getOption('position',true)] = true;
                            ?>
                            <div class="f12-floating-menu <?php esc_attr_e(implode(" ", $classes)); ?>"
                                 data-attachment-size="<?php esc_attr_e($Menu->getOption('attachment_size', true)); ?>">
                                <div class="f12-floating-menu--inner">
                                    <ul>
                                        <?php $this->generateLinks($MenuStorage, $Menu->getPosition()); ?>
                                    </ul>
                                </div>
                            </div>
                            <?php
                        }
                    }
                }

                echo $result;
            }
        }
    }
}