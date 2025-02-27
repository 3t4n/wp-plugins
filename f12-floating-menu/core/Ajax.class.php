<?php

namespace forge12\floating_menu {

    use forge12\floating_menu\component\floatingmenu\MetaBoxFloatingMenuItems;

    if (!defined('ABSPATH')) {
        exit;
    }

    /**
     * Class Ajax
     * Responsible to handle the ajax calls.
     *
     * Ajax functions must always return a json encoded array containing the status and the content values.
     * json_encode([status=>200, content => ...]);
     */
    class Ajax
    {
        /**
         * Admin constructor.
         */
        public function __construct()
        {
            add_action('wp_ajax_f12_floating_menu_get_template', [$this, '_getTemplate']);
            add_action('wp_ajax_f12_floating_menu_select2_pages', [$this, '_getPages']);
        }

        /**
         * Return an array of all pages containing the keyword within the title.
         *
         * @param string $keyword
         * @return array
         */
        public static function getPageByTitleSearch(string $keyword = ''): array
        {
            global $wpdb;
            $keyword = esc_sql($keyword);

            if(!empty($keyword)) {
                $result = $wpdb->get_results(
                    "SELECT * 
                        FROM " . $wpdb->posts . " 
                        WHERE 
                            post_title LIKE '%" . $keyword . "%' 
                            AND
                            (
                            post_type = 'page'
                            OR
                            post_type = 'post'
                            OR
                            post_type = 'product' 
                            )
                            AND
                            post_status = 'publish'"
                );
            }else{
                $result = $wpdb->get_results(
                    "SELECT * 
                        FROM " . $wpdb->posts . " 
                        WHERE  
                            (
                            post_type = 'page'
                            OR
                            post_type = 'post'
                            OR
                            post_type = 'product' 
                            )
                            AND
                            post_status = 'publish'"
                );
            }
            return $result;
        }

        /**
         * Get the pages displayed within the select2 option window.
         * It will also send a parameter named "search" containing the search term used by the user.
         *
         * @see https://select2.org/data-sources/ajax fore more details about the return value.APP_FTP_USER
         *
         * @return json
         * {
         *  "results": [
         *      {
         *          "id": 1,
         *          "text": "Option 1"
         *      },
         *      {
         *          "id": 2,
         *          "text": "Option 2"
         *      }
         *  ],
         *  "pagination": {
         *  "more": true
         *  }
         * }
         */
        public function _getPages()
        {
            $listOfPages = [];

            if (wp_verify_nonce($_GET['nonce'], 'select2_reload_pages')) {
                $search = isset($_GET['search']) ? sanitize_text_field($_GET['search']) : '';

                if (!empty($search)) {
                    $pages = self::getPageByTitleSearch($search);
                } else {
                    $pages = self::getPageByTitleSearch();
                }

                /**
                 * Parse the results to the required format @see select2 link above.
                 */
                foreach ($pages as $key => /** @var \WP_Post $Page */ $Page) {
                    $listOfPages[] = [
                        'id' => $Page->ID,
                        'text' => $Page->post_title . ' (' . __($Page->post_type, 'f12_floating_menu') . ')'
                    ];
                }
            }

            $results = [
                "results" => $listOfPages,
                "pagination" => ["more" => false]
            ];

            echo json_encode($results);
            wp_die();
        }

        /**
         * Get a specific template via ajax.
         */
        public function _getTemplate()
        {
            $template = isset($_POST['template']) ? sanitize_text_field($_POST['template']) : '';

            if ($template == 'f12_floating_menu_items_add' && wp_verify_nonce($_POST['nonce'], 'f12_floating_menu_items_add')) {
                $id = isset($_POST['id']) ? (int)$_POST['id'] : -1;

                ob_start();
                MetaBoxFloatingMenuItems::getAdminInputBox($id);
                $template = ob_get_contents();
                ob_end_clean();

                if ($id != -1) {
                    echo wp_json_encode([
                        'status' => 200,
                        'content' => $template
                    ]);
                    wp_die();
                }
            }

            /**
             * Add a default response
             */
            echo wp_json_encode(['status' => 404, 'content' => '']);
            wp_die();
        }
    }

    new Ajax();
}