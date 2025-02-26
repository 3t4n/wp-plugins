<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;
if ( ! class_exists( 'OPBW_History' ) ) :

    /**
     * Main OPBW_Start_Instance_Admin Class.
     *
     * @package		OPBW
     * @subpackage	Classes/OPBW_History
     * @since		1.0.0
     * @author		WPOPAL
     */
    Class OPBW_History {
		
        private static $_instance = null;

		public $pt = 'opbw-history';

        public function __construct() {
            $pt = $this->pt;


			add_filter( 'post_row_actions', [$this, 'remove_row_actions'], 10, 2 );
            add_filter( "views_edit-{$pt}", [$this, 'history_view_status'] );
            add_filter( "manage_{$pt}_posts_columns", [$this, 'history_admin_columns'] );

            add_action( "manage_{$pt}_posts_custom_column" , [$this, 'history_data_column'], 10, 2 );
            add_action( 'pre_get_posts', [$this, 'history_query_by_stt'], 99);

            add_action( 'wp_ajax_opbw_restore_backup', [$this, 'restore_backup'] ); // wp_ajax_{action}
            add_action( 'wp_ajax_opbw_delete_history', [$this, 'delete_history'] ); // wp_ajax_{action}
            add_action( 'wp_ajax_opbw_download_backup', [$this, 'download_backup'] ); // wp_ajax_{action}
        }

        public static function instance($file = '', $version = '1.0.0') {
            if (is_null(self::$_instance)) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }
		
		public function history_view_status($views) {
            $post_type = $this->pt;
            $num_posts    = wp_count_posts( $post_type, 'readable' );
		    $total_posts  = array_sum( (array) $num_posts );
            $class = '';
            
            $link = $this->get_status_link();
            $class = $this->get_status_class();
            $actions = [
                'all' => '<a class="'.$class.'" href="edit.php?post_type='.$this->pt.'">'.__('All', 'opal-bulkedit-for-woocommerce').'</a>'
            ];
            if (isset($views['publish']) && isset($num_posts->publish)) {
                $link = $this->get_status_link('publish');
                $class = $this->get_status_class('publish');
                $actions['publish'] = '<a class="'.$class.'" href="'.$link.'">'.__('Finished', 'opal-bulkedit-for-woocommerce').' <span class="count">('.$num_posts->publish.')</span></a>';
            }
            if (isset($views['pending']) && isset($num_posts->pending)) {
                $link = $this->get_status_link('pending');
                $class = $this->get_status_class('pending');
                $actions['pending'] = '<a class="'.$class.'" href="'.$link.'">'.__('Editing', 'opal-bulkedit-for-woocommerce').' <span class="count">('.$num_posts->pending.')</span></a>';
            }
			return $actions;
		}

        private function get_status_link($status = '') {
            $status_args = [
                'post_type' => $this->pt
            ];
            if (!empty($status)) {
                $status_args['post_status'] = $status;
            }
            $link = esc_url( add_query_arg( $status_args, 'edit.php' ) );

            return $link;
        }

        private function get_status_class($status = '') {
            if (empty($status)) {
                if (!isset($_REQUEST['post_status']) || !in_array($_REQUEST['post_status'], ['publish', 'pending'])) {
                    $class = 'current';
                }
            } else {
                if (isset($_REQUEST['post_status']) && $_REQUEST['post_status'] == $status) {
                    $class = 'current';
                }
            }

            return $class ?? '';
        }

        public function history_query_by_stt($query) {
			if (is_admin() && $query->is_main_query()) {
                $post_type = $this->pt;
                if ($query->get('post_type') === $post_type) {
                    if (!empty($_GET['post_status'])) {
                        $query->set('post_status', sanitize_text_field($_GET['post_status']));
                    } else {
                        $query->set('post_status', array('publish', 'pending'));
                    }
                }
            }
		}
	
		public function history_admin_columns($columns) {
			unset( $columns['title'] );
			$columns['name'] = __( 'Name', 'opal-bulkedit-for-woocommerce' );
			$columns['progress'] = __( 'Progress', 'opal-bulkedit-for-woocommerce' );
			$columns['status'] = __( 'Status', 'opal-bulkedit-for-woocommerce' );
			$columns['author'] = __( 'Author', 'opal-bulkedit-for-woocommerce' );
			$columns['actions'] = __( 'Actions', 'opal-bulkedit-for-woocommerce' );
		
			return $columns;
		}

        public function history_data_column( $column, $post_id ) {
            switch ( $column ) {
                case 'name' :
                    self::get_history_title($post_id);
                    break;
                case 'progress' :
                    self::get_history_progress($post_id);
                    break;
                case 'status' :
                    self::get_history_status($post_id);
                    break;
                case 'actions' :
                    self::get_history_actions($post_id);
                    break;
            }
        }

		public function remove_row_actions($actions, $post) {
            if ($post->post_type == $this->pt) {
                $actions = [];
            }
            return $actions;
        }

        public static function get_history_title($post_id) {
            $value = '<strong class="opbw-primary-color">'.get_the_title($post_id).'</strong>';
            echo wp_kses_post($value);
        }

        public static function get_history_progress($post_id) {
            $progress = get_post_meta($post_id, '_opbw_progress_edited', true);
            $value = $progress ? $progress : '---';
            echo wp_kses_post('<strong>'.$value.'</strong>');
        }

        public static function get_history_status($post_id) {
            $status = get_post_status($post_id);
            switch ($status) {
                case 'pending':
                    $stt_text = __('Editing', 'opal-bulkedit-for-woocommerce');
                    $color = "#ff8300";
                    break;
                case 'publish':
                    $stt_text = __('Finished', 'opal-bulkedit-for-woocommerce');
                    $color = "#49b300";
                    break;
                default:
                    $stt_text = __('Setupping', 'opal-bulkedit-for-woocommerce');
                    break;
            }
            $bg_stt = !empty($color) ? 'background-color: '.$color : '';
            $stt_text = '<span class="history-status" data-status="'.$status.'" style="'.$bg_stt.'">'.$stt_text.'</span>';
            echo wp_kses_post($stt_text);
        }

        public static function get_history_actions($post_id) {
            OPBW_Admin::view('history-actions', [
                'history_id' => $post_id,
            ]);
        }

        public function restore_backup() {
            global $wpdb;

            if ( !check_ajax_referer( 'opbw-nonce-ajax', 'ajax_nonce_parameter' ) ) {
				wp_die('Permission denied');
			}
	
			try {
                if (empty($_POST['id'])) {
					wp_send_json_error( ['message' => 'No records are being edited!'] );
				}

				$history_id = absint($_POST['id']);
				if ('opbw-history' !== get_post_type( $history_id )) {
					wp_send_json_error([
						'message' => __('This edit record is not in the correct format!', 'opal-bulkedit-for-woocommerce')
					]);
				}

                $csv_file = get_post_meta($history_id, '_opbw_backup_file', true);
                
                include_once WP_PLUGIN_DIR . '/woocommerce/includes/import/class-wc-product-csv-importer.php';

                if ( $csv_file && file_exists( $csv_file ) && class_exists( 'WC_Product_CSV_Importer' ) ) {
                    // Override locale so we can return mappings from WooCommerce in English language stores.
                    add_filter( 'locale', '__return_false', 9999 );
                    $importer_class = 'WC_Product_CSV_Importer';

                    $edit_data = get_post_meta($history_id, '_opbw_editor_data', true);

                    $args           = array(
                        'parse' => 1,
                        'update_existing' => !isset($edit_data['delete_action']),
                        'delimiter' => ',',
                        'prevent_timeouts' => 1,
                        'enclosure' => '"',
                        'escape' => '\\',
                        'start_pos' => isset($_POST['position']) ? absint( $_POST['position'] ) : 0,
                        'end_pos' => -1,
                        'lines' => apply_filters( 'opbw_history_restore_batch_size', 20 ),
                        'mapping' => self::get_header_mappings( $csv_file ),
                    );
                    $args = apply_filters( 'opbw_product_csv_importer_args', $args, $importer_class );

                    $importer = new $importer_class( $csv_file, $args );
                    $results   = $importer->import();
                    $percent_complete = $importer->get_percent_complete();

                    if ( 100 === $percent_complete ) {
                        // @codingStandardsIgnoreStart.
                        $wpdb->delete( $wpdb->postmeta, array( 'meta_key' => '_original_id' ) );
                        $wpdb->delete( $wpdb->posts, array(
                            'post_type'   => 'product',
                            'post_status' => 'importing',
                        ) );
                        $wpdb->delete( $wpdb->posts, array(
                            'post_type'   => 'product_variation',
                            'post_status' => 'importing',
                        ) );
                        // @codingStandardsIgnoreEnd.

                        // Clean up orphaned data.
                        $wpdb->query(
                            "
                            DELETE {$wpdb->posts}.* FROM {$wpdb->posts}
                            LEFT JOIN {$wpdb->posts} wp ON wp.ID = {$wpdb->posts}.post_parent
                            WHERE wp.ID IS NULL AND {$wpdb->posts}.post_type = 'product_variation'
                        "
                        );
                        $wpdb->query(
                            "
                            DELETE {$wpdb->postmeta}.* FROM {$wpdb->postmeta}
                            LEFT JOIN {$wpdb->posts} wp ON wp.ID = {$wpdb->postmeta}.post_id
                            WHERE wp.ID IS NULL
                        "
                        );
                        // @codingStandardsIgnoreStart.
                        $wpdb->query( 
                            $wpdb->prepare(  "
                                DELETE tr.* FROM {$wpdb->term_relationships} tr
                                LEFT JOIN {$wpdb->posts} wp ON wp.ID = tr.object_id
                                LEFT JOIN {$wpdb->term_taxonomy} tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
                                WHERE wp.ID IS NULL
                                AND tt.taxonomy IN ( %s )
                                ", implode( "','", array_map( 'esc_sql', get_object_taxonomies( 'product' ) ) ) 
                            ) 
                        );
                        // @codingStandardsIgnoreEnd.

                        // Send success.
                        wp_send_json_success(
                            array(
                                'position'            => 'done',
                                'percentage'          => 100,
                                'imported'            => is_countable( $results['imported'] ) ? count( $results['imported'] ) : 0,
                                'imported_variations' => is_countable( $results['imported_variations'] ) ? count( $results['imported_variations'] ) : 0,
                                'failed'              => is_countable( $results['failed'] ) ? count( $results['failed'] ) : 0,
                                'updated'             => is_countable( $results['updated'] ) ? count( $results['updated'] ) : 0,
                                'skipped'             => is_countable( $results['skipped'] ) ? count( $results['skipped'] ) : 0,
                            )
                        );
                    } else {
                        wp_send_json_success(
                            array(
                                'position'            => $importer->get_file_position(),
                                'percentage'          => $percent_complete,
                                'imported'            => is_countable( $results['imported'] ) ? count( $results['imported'] ) : 0,
                                'imported_variations' => is_countable( $results['imported_variations'] ) ? count( $results['imported_variations'] ) : 0,
                                'failed'              => is_countable( $results['failed'] ) ? count( $results['failed'] ) : 0,
                                'updated'             => is_countable( $results['updated'] ) ? count( $results['updated'] ) : 0,
                                'skipped'             => is_countable( $results['skipped'] ) ? count( $results['skipped'] ) : 0,
                            )
                        );
                    }
                } else {
                    wp_send_json_error( array( 'message' => __( 'Sorry, the backup file was removed or not found.', 'opal-bulkedit-for-woocommerce' ) ) );
                }
				
            } catch ( Exception $e ) {
				wp_send_json_error( array( 'message' => $e->getMessage() ) );
			}
        }

        public static function get_header_mappings( $file ) {
            include_once WP_PLUGIN_DIR . '/woocommerce/includes/admin/importers/mappings/mappings.php';
    
            $importer_class  = apply_filters( 'woocommerce_product_csv_importer_class', 'WC_Product_CSV_Importer' );
            $importer        = new $importer_class( $file, array() );
            $raw_headers     = $importer->get_raw_keys();
            $default_columns = wc_importer_default_english_mappings( array() );
            $special_columns = wc_importer_default_special_english_mappings( array() );
    
            $headers = array();
            foreach ( $raw_headers as $key => $field ) {
                $index             = $field;
                $headers[ $index ] = $field;
    
                if ( isset( $default_columns[ $field ] ) ) {
                    $headers[ $index ] = $default_columns[ $field ];
                } else {
                    foreach ( $special_columns as $regex => $special_key ) {
                        if ( preg_match( self::sanitize_special_column_name_regex( $regex ), $field, $matches ) ) {
                            $headers[ $index ] = $special_key . $matches[1];
                            break;
                        }
                    }
                }
            }
    
            return $headers;
        }

        /**
         * Sanitize special column name regex.
         *
         * @internal
         * @param  string $value Raw special column name.
         * @return string
         */
        public static function sanitize_special_column_name_regex( $value ) {
            return '/' . str_replace( array( '%d', '%s' ), '(.*)', trim( quotemeta( $value ) ) ) . '/';
        }

        public function delete_history() {
            if ( !check_ajax_referer( 'opbw-nonce-ajax', 'ajax_nonce_parameter' ) ) {
				wp_die('Permission denied');
			}
	
			try {
                if (empty($_POST['id'])) {
					wp_send_json_error( ['message' => 'No records are being edited!'] );
				}

				$history_id = absint($_POST['id']);
				if ('opbw-history' !== get_post_type( $history_id )) {
					wp_send_json_error([
						'message' => __('This edit record is not in the correct format!', 'opal-bulkedit-for-woocommerce')
					]);
				}

                $backup_file = get_post_meta($history_id, '_opbw_backup_file', true);
                if ($backup_file && @file_exists( $backup_file ) ) { // phpcs:ignore Generic.PHP.NoSilencedErrors.Discouraged
                    wp_delete_file($backup_file);
                }
                $delete = wp_delete_post($history_id, true);
                if (!$delete) {
                    wp_send_json_error([
						'message' => __('History records cannot be deleted. Please try again!', 'opal-bulkedit-for-woocommerce')
					]);
                }

                wp_send_json_success([
                    'message' => __('Delete history record successfully!', 'opal-bulkedit-for-woocommerce')
                ]);

            } catch ( Exception $e ) {
				wp_send_json_error( array( 'message' => $e->getMessage() ) );
			}
        }

        public function download_backup() {
            if ( !check_ajax_referer( 'opbw-nonce-ajax', 'ajax_nonce_parameter' ) ) {
				wp_die('Permission denied');
			}

			if (empty($_REQUEST['history_id'])) {
				_default_wp_die_handler( __('No history id!', 'opal-bulkedit-for-woocommerce'), 'OPBW' );
			}

            $history_id = absint($_REQUEST['history_id']);
            $backup_file = get_post_meta($history_id, '_opbw_backup_file', true);
            if ($backup_file && @file_exists( $backup_file ) ) { // phpcs:ignore Generic.PHP.NoSilencedErrors.Discouraged
                $upload_dir = wp_upload_dir();
                if (strpos($backup_file, $upload_dir['basedir']) !== false) {
                    $file_url = str_replace($upload_dir['basedir'], $upload_dir['baseurl'], $backup_file);
                    wp_redirect($file_url);
                }
            }
            die;
        }
    }  

endif; // End if class_exists check.

new OPBW_History();