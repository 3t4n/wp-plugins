<?php

/**
 * Prevents direct access to the file
 */
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * Class Floating_Links_Frontend
 *
 * This class handles the frontend functionalities of the Floating Links plugin
 */
if ( !class_exists( 'Floating_Links_Frontend' ) ) {
    class Floating_Links_Frontend {
        /**
         * Floating_Links_Frontend constructor.
         *
         * Adds necessary hooks for frontend functionalities of the Floating Links plugin
         *
         * @since 1.0.0
         */
        function __construct() {
            // Enqueues the necessary scripts and styles for the plugin's admin pages
            add_action( 'wp_enqueue_scripts', array($this, 'enqueue_scripts') );
            // Adds the floating links to the footer
            add_action( 'wp_footer', array($this, 'load_fl_in_footer') );
            // Adds the social bar to the footer if the user is not in the customizer
            if ( !is_customize_preview() ) {
                add_action( 'wp_footer', array($this, 'load_social_icons_html') );
            }
        }

        /**
         * Enqueues the necessary scripts and styles for the plugin's frontend
         *
         * @since 1.0.0
         */
        public function enqueue_scripts() {
            // Load styles and scripts for floating links
            wp_enqueue_style( 'floating-links-fonts', FLOATING_LINKS_URL . 'admin/assets/css/floating-links-fonts.css' );
            wp_enqueue_style( 'floating-links-style', FLOATING_LINKS_URL . 'frontend/assets/css/floating-links-style.css' );
            wp_enqueue_script( 'floating-links-script', FLOATING_LINKS_URL . 'frontend/assets/js/floating-links-script.js', array('jquery') );
            $settings = get_option( 'fl_settings', false );
            $scroll_enabled = false;
            $scroll_percent = 0;
            wp_localize_script( 'floating-links-script', 'fl', array(
                'scroll_enabled' => $scroll_enabled,
                'scroll_percent' => $scroll_percent,
            ) );
            // Add dashicons for floating links
            wp_enqueue_style( 'dashicons' );
        }

        /**
         * Render Floating Links HTML
         *
         * @since 3.6.2
         */
        public function render_floating_links_html() {
            $settings = get_option( 'fl_settings', false );
            $sort_order = fl_get_sort_order();
            $sort_order = explode( ',', $sort_order );
            if ( is_page() ) {
                $post_type = 'page';
            } else {
                $post_type = 'post';
            }
            $minimized = '';
            global $wp;
            // Get current page URL
            $current_page_url = home_url( $wp->request );
            include FLOATING_LINKS_DIR . 'frontend/views/floating-links.php';
        }

        /**
         * Load social icons in footer
         *
         * @param $content
         * @since 3.6.2
         */
        public function load_fl_in_footer( $content ) {
            ob_start();
            $this->render_floating_links_html();
            $html = ob_get_contents();
            ob_end_clean();
            echo $content . $html;
        }

        /**
         * Get icons settings
         *
         * @param $id
         * @param $post_type
         *
         * @since 3.6.2
         * @return array
         */
        public function get_icon_settings( $id = false, $post_type = 'post' ) {
            if ( !$id ) {
                return array();
            }
            $data = array(
                'id' => $id,
            );
            $settings = get_option( 'fl_settings', false );
            switch ( $id ) {
                case 'fl_next':
                    if ( isset( $settings['fl_right_icon'] ) && !empty( $settings['fl_right_icon'] ) ) {
                        $data['icon'] = $settings['fl_right_icon'];
                    } else {
                        $data['icon'] = 'dashicons dashicons-arrow-right-alt';
                    }
                    $data['label'] = __( 'Next', 'floating-links' );
                    $additional_data = $this->get_additional_data( 'next', $post_type );
                    if ( $additional_data ) {
                        $data['additional_data'] = $additional_data;
                        if ( isset( $additional_data['url'] ) ) {
                            $data['url'] = $additional_data['url'];
                        } else {
                            $data['url'] = get_permalink( $additional_data['ID'] );
                        }
                    }
                    break;
                case 'fl_prev':
                    if ( isset( $settings['fl_left_icon'] ) && !empty( $settings['fl_left_icon'] ) ) {
                        $data['icon'] = $settings['fl_left_icon'];
                    } else {
                        $data['icon'] = 'dashicons dashicons-arrow-left-alt';
                    }
                    $data['label'] = __( 'Previous', 'floating-links' );
                    $additional_data = $this->get_additional_data( 'prev', $post_type );
                    if ( $additional_data ) {
                        $data['additional_data'] = $additional_data;
                        if ( isset( $additional_data['url'] ) ) {
                            $data['url'] = $additional_data['url'];
                        } else {
                            $data['url'] = get_permalink( $additional_data['ID'] );
                        }
                    }
                    break;
                case 'fl_random':
                    if ( isset( $settings['fl_random_icon'] ) && !empty( $settings['fl_random_icon'] ) ) {
                        $data['icon'] = $settings['fl_random_icon'];
                    } else {
                        $data['icon'] = 'dashicons dashicons-randomize';
                    }
                    $data['label'] = __( 'Random', 'floating-links' );
                    $additional_data = $this->get_additional_data( 'random', $post_type );
                    if ( $additional_data ) {
                        $data['additional_data'] = $additional_data;
                        if ( isset( $additional_data['url'] ) ) {
                            $data['url'] = $additional_data['url'];
                        } else {
                            $data['url'] = get_permalink( $additional_data['ID'] );
                        }
                    }
                    break;
                case 'fl_home':
                    if ( isset( $settings['fl_home_icon'] ) && !empty( $settings['fl_home_icon'] ) ) {
                        $data['icon'] = $settings['fl_home_icon'];
                    } else {
                        $data['icon'] = 'dashicons dashicons-admin-home';
                    }
                    $data['label'] = __( 'Home', 'floating-links' );
                    $data['url'] = home_url( '/' );
                    break;
                case 'fl_top':
                    if ( isset( $settings['fl_up_icon'] ) && !empty( $settings['fl_up_icon'] ) ) {
                        $data['icon'] = $settings['fl_up_icon'];
                    } else {
                        $data['icon'] = 'dashicons dashicons-arrow-up-alt';
                    }
                    $data['label'] = __( 'To Top', 'floating-links' );
                    $data['url'] = '';
                    break;
                case 'fl_bottom':
                    if ( isset( $settings['fl_down_icon'] ) && !empty( $settings['fl_down_icon'] ) ) {
                        $data['icon'] = $settings['fl_down_icon'];
                    } else {
                        $data['icon'] = 'dashicons dashicons-arrow-down-alt';
                    }
                    $data['label'] = __( 'To Bottom', 'floating-links' );
                    $data['url'] = '';
                    break;
                case 'fl_copy_url':
                    global $wp;
                    if ( isset( $settings['fl_copy_url_icon'] ) && !empty( $settings['fl_copy_url_icon'] ) ) {
                        $data['icon'] = $settings['fl_copy_url_icon'];
                    } else {
                        $data['icon'] = 'dashicons dashicons-admin-page';
                    }
                    $data['label'] = __( 'Copy current URL', 'floating-links' );
                    $data['current_url'] = home_url( $wp->request );
                    break;
                case 'fl_minimizer':
                    if ( isset( $settings['fl_slimer_close_icon'] ) && !empty( $settings['fl_slimer_close_icon'] ) ) {
                        $data['icon'] = $settings['fl_slimer_close_icon'];
                    } else {
                        $data['icon'] = 'dashicons dashicons-no-alt';
                    }
                    if ( isset( $settings['fl_default_minimized'] ) && !empty( $settings['fl_default_minimized'] ) ) {
                        $data['default_minimized'] = $settings['fl_default_minimized'];
                    } else {
                        $data['default_minimized'] = 'false';
                    }
                    if ( isset( $settings['fl_slimer_open_icon'] ) && !empty( $settings['fl_slimer_open_icon'] ) ) {
                        $data['open_icon'] = $settings['fl_slimer_open_icon'];
                    } else {
                        $data['open_icon'] = 'dashicons dashicons-editor-expand';
                    }
                    $data['label'] = __( 'Minimizer', 'floating-links' );
                    $data['url'] = '';
                    break;
                default:
                    break;
            }
            return apply_filters(
                'fl_icon_settings',
                $data,
                $id,
                $post_type,
                $settings
            );
        }

        /**
         * Get additional data for next, prev and random links
         *
         * @param string $post_type
         * @param string $type
         *
         * @since 3.6.2
         * @return bool|mixed
         */
        public function get_additional_data( $type, $post_type = 'post' ) {
            if ( !$type ) {
                return false;
            }
            $data = array();
            if ( $post_type == 'post' ) {
                $settings = get_option( 'fl_settings', false );
                if ( isset( $settings['fl_cat'] ) && !empty( $settings['fl_cat'] ) ) {
                    $cat = $settings['fl_cat'];
                } else {
                    $cat = false;
                }
                if ( $type == 'next' ) {
                    $data = get_next_post( $cat );
                    if ( is_a( $data, 'WP_Post' ) ) {
                        $data = (array) $data;
                    }
                } elseif ( $type == 'prev' ) {
                    $data = get_previous_post( $cat );
                    if ( is_a( $data, 'WP_Post' ) ) {
                        $data = (array) $data;
                    }
                } elseif ( $type == 'random' ) {
                    $rand = get_posts( array(
                        'posts_per_page' => 1,
                        'orderby'        => 'rand',
                        'post_type'      => get_post_type(),
                    ) );
                    if ( isset( $rand[0] ) ) {
                        $data = array(
                            'url'          => get_permalink( $rand[0]->ID ),
                            'post_title'   => $rand[0]->post_title,
                            'post_content' => $rand[0]->post_content,
                            'ID'           => $rand[0]->ID,
                        );
                    }
                }
            }
            if ( $post_type == 'page' ) {
                $id = get_the_ID();
                $post = get_post( $id );
                $pages_args = 'child_of=' . $post->post_parent . '&parent=' . $post->post_parent . '&sort_column=menu_order&sort_order=asc';
                $section_pages = get_pages( $pages_args );
                $page_count = count( $section_pages );
                for ($i = 0; $i < $page_count; $i++) {
                    if ( $id == $section_pages[$i]->ID ) {
                        break;
                    }
                }
                if ( isset( $i ) ) {
                    $next_key = $i + 1;
                    $prev_key = $i - 1;
                    if ( isset( $section_pages[$next_key] ) && !empty( $section_pages[$next_key] ) && $type == 'next' ) {
                        $data = (array) $section_pages[$next_key];
                    }
                    if ( isset( $section_pages[$prev_key] ) && !empty( $section_pages[$prev_key] ) && $type == 'prev' ) {
                        $data = (array) $section_pages[$prev_key];
                    }
                }
                if ( $type == 'random' ) {
                    $rand = get_posts( array(
                        'posts_per_page' => 1,
                        'orderby'        => 'rand',
                        'post_type'      => get_post_type(),
                    ) );
                    if ( isset( $rand[0] ) ) {
                        $data = array(
                            'url'          => get_permalink( $rand[0]->ID ),
                            'post_title'   => $rand[0]->post_title,
                            'post_content' => $rand[0]->post_content,
                            'ID'           => $rand[0]->ID,
                        );
                    }
                }
            }
            return apply_filters(
                'fl_additional_data',
                $data,
                $post_type,
                $type
            );
        }

        /**
         * Check if the current icon is url dependent
         *
         * @since 3.6.2
         * @return mixed|void
         */
        private function is_url_dependent() {
            return apply_filters( 'fl_url_dependent', array('fl_next', 'fl_prev', 'fl_random') );
        }

        /**
         * Load Social Icons HTML
         *
         * @since 3.6.2
         */
        public function load_social_icons_html() {
            $fl_templateurl = locate_template( array('floating-links/views/social-icons.php') );
            if ( $fl_templateurl ) {
                $fl_templateurl = $fl_templateurl;
            } else {
                $fl_templateurl = FLOATING_LINKS_DIR . 'frontend/views/social-icons.php';
            }
            require apply_filters( 'fl_social_icons_views_url', $fl_templateurl );
        }

    }

    new Floating_Links_Frontend();
}