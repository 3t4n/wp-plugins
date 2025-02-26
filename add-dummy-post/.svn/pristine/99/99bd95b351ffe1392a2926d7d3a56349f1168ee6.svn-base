<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// check if user is login, if yes then only add new posts
function adp_handle_form_submission()
{
    // Check if user form is submitted and start the import process
    if (isset($_POST['adp_submit']) && !empty($_POST['adp_submit']) && !empty($_POST['blog_number']) && isset($_POST['blog_number'])) {
        // Verify nonce
        if (isset($_POST['adp_nonce']) && wp_verify_nonce($_POST['adp_nonce'], 'adp_nonce_action')) {
            // Check the user permission
            if (current_user_can('manage_options')) {
                if (is_user_logged_in() == true) {
                    try {
                        $number_of_post = intval($_POST['blog_number']);
                        str_replace(" ", "", $number_of_post);

                        // generate dummy content and title
                        abstract class AdpLorem
                        {
                            public static function title($nparagraphs)
                            {
                                $paragraphs = [];
                                for ($p = 0; $p < $nparagraphs; ++$p) {
                                    $nsentences = 1;
                                    $sentences = [];
                                    for ($s = 0; $s < $nsentences; ++$s) {
                                        $frags = [];
                                        $commaChance = .33;
                                        while (true) {
                                            $nwords = 5;
                                            $words = self::randomValues(self::$lorem, $nwords);
                                            $frags[] = implode(' ', $words);
                                            if (self::randomFloat() >= $commaChance) {
                                                break;
                                            }
                                            $commaChance /= 2;
                                        }
                                        $sentences[] = ucfirst(implode(', ', $frags)) . '.';
                                    }
                                    $paragraphs[] = implode(' ', $sentences);
                                }
                                return implode("\n\n", $paragraphs);
                            }

                            public static function para($nparagraphs)
                            {
                                $paragraphs = [];
                                for ($p = 0; $p < $nparagraphs; ++$p) {
                                    $nsentences = random_int(3, 8);
                                    $sentences = [];
                                    for ($s = 0; $s < $nsentences; ++$s) {
                                        $frags = [];
                                        $commaChance = .33;
                                        while (true) {
                                            $nwords = random_int(3, 15);
                                            $words = self::randomValues(self::$lorem, $nwords);
                                            $frags[] = implode(' ', $words);
                                            if (self::randomFloat() >= $commaChance) {
                                                break;
                                            }
                                            $commaChance /= 2;
                                        }

                                        $sentences[] = ucfirst(implode(', ', $frags)) . '.';
                                    }
                                    $paragraphs[] = implode(' ', $sentences);
                                }
                                return implode("</br></br>", $paragraphs);
                            }

                            private static function randomFloat()
                            {
                                return random_int(0, PHP_INT_MAX - 1) / PHP_INT_MAX;
                            }

                            private static function randomValues($arr, $count)
                            {
                                $keys = array_rand($arr, $count);
                                if ($count == 1) {
                                    $keys = [$keys];
                                }
                                return array_intersect_key($arr, array_fill_keys($keys, null));
                            }

                            private static $lorem = ['lorem', 'ipsum', 'dolor', 'sit', 'amet', 'consectetur', 'adipiscing', 'elit', 'praesent', 'interdum', 'dictum', 'mi', 'non', 'egestas', 'nulla', 'in', 'lacus', 'sed', 'sapien', 'placerat', 'malesuada', 'at', 'erat', 'etiam', 'id', 'velit', 'finibus', 'viverra', 'maecenas', 'mattis', 'volutpat', 'justo', 'vitae', 'vestibulum', 'metus', 'lobortis', 'mauris', 'luctus', 'leo', 'feugiat', 'nibh', 'tincidunt', 'a', 'integer', 'facilisis', 'lacinia', 'ligula', 'ac', 'suspendisse', 'eleifend', 'nunc', 'nec', 'pulvinar', 'quisque', 'ut', 'semper', 'auctor', 'tortor', 'mollis', 'est', 'tempor', 'scelerisque', 'venenatis', 'quis', 'ultrices', 'tellus', 'nisi', 'phasellus', 'aliquam', 'molestie', 'purus', 'convallis', 'cursus', 'ex', 'massa', 'fusce', 'felis', 'fringilla', 'faucibus', 'varius', 'ante', 'primis', 'orci', 'et', 'posuere', 'cubilia', 'curae', 'proin', 'ultricies', 'hendrerit', 'ornare', 'augue', 'pharetra', 'dapibus', 'nullam', 'sollicitudin', 'euismod', 'eget', 'pretium', 'vulputate', 'urna', 'arcu', 'porttitor', 'quam', 'condimentum', 'consequat', 'tempus', 'hac', 'habitasse', 'platea', 'dictumst', 'sagittis', 'gravida', 'eu', 'commodo', 'dui', 'lectus', 'vivamus', 'libero', 'vel', 'maximus', 'pellentesque', 'efficitur', 'class', 'aptent', 'taciti', 'sociosqu', 'ad', 'litora', 'torquent', 'per', 'conubia', 'nostra', 'inceptos', 'himenaeos', 'fermentum', 'turpis', 'donec', 'magna', 'porta', 'enim', 'curabitur', 'odio', 'rhoncus', 'blandit', 'potenti', 'sodales', 'accumsan', 'congue', 'neque', 'duis', 'bibendum', 'laoreet', 'elementum', 'suscipit', 'diam', 'vehicula', 'eros', 'nam', 'imperdiet', 'sem', 'ullamcorper', 'dignissim', 'risus', 'aliquet', 'habitant', 'morbi', 'tristique', 'senectus', 'netus', 'fames', 'nisl', 'iaculis', 'cras', 'aenean'];
                        }

                        // add new dummy post to the wordpress posts
                        if (is_numeric($number_of_post) && $number_of_post < 51) {
                            $blog_data = array();

                            for ($i = 0; $i < $number_of_post; $i++) {
                                $title = AdpLorem::title(1);
                                $para = AdpLorem::para(5);

                                if (!empty($title)) {
                                    $blog_args['post_title'] = $title;
                                }

                                if (!empty($para)) {
                                    $blog_args['post_content'] = $para;
                                    $blog_args['post_status'] = 'publish';
                                    $blog_args['post_author'] = '1';
                                }

                                try {
                                    $post_id = wp_insert_post($blog_args);
                                } catch (\Throwable $th) {
                                    echo esc_html__('There is a problem while inserting the posts', 'adp');
                                }
                            }
                        }
                    } catch (\Throwable $th) {
                        echo esc_html__('There is a problem in the input of data', 'adp');
                    }
                }
            }
        }
    }
    // Redirect after form submission (change URL to your desired location)
    wp_redirect(admin_url('tools.php?page=adp-post'));
    exit;
}

// Hook to handle form submissions
add_action('admin_post_adp_handle_form_submission', 'adp_handle_form_submission');
add_action('admin_post_nopriv_adp_handle_form_submission', 'adp_handle_form_submission');
