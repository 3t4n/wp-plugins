<?php

if (!defined('ABSPATH'))
    exit;

class AWECM_Api
{

    /**
     * @var    object
     * @access  private
     * @since    1.0.0
     */
    private static $_instance = null;

    /**
     * The version number.
     * @var     string
     * @access  public
     * @since   1.0.0
     */
    public $_version;
    private $_active = false;

	/**
     * The token.
     * @var     string
     * @access  public
     * @since   1.0.0
    */
    public $_token;

    public function __construct()
    {
		$this->_token = AWECM_TOKEN;
		// rest api end points
        add_action('rest_api_init', function () {
            register_rest_route('awecm/v1', '/email-map/', array(
                'methods' => 'GET',
                'callback' => array($this, 'get_email_mappings'),
                'permission_callback' => array($this, 'get_permission')
            ));

            register_rest_route('awecm/v1', '/change-email-map/', array(
                'methods' => 'POST',
                'callback' => array($this, 'change_email_mappings'),
                'permission_callback' => array($this, 'get_permission')
            ));

            register_rest_route('awecm/v1', '/save-global-style/', array(
                'methods' => 'POST',
                'callback' => array($this, 'save_global_style'),
                'permission_callback' => array($this, 'get_permission')
            ));

            register_rest_route('awecm/v1', '/get-global-styles/', array(
                'methods' => 'GET',
                'callback' => array($this, 'get_global_styles'),
                'permission_callback' => array($this, 'get_permission')
            ));

            register_rest_route('awecm/v1', '/templates/', array(
                'methods' => 'POST',
                'callback' => array($this, 'get_templates_by_slug'),
                'permission_callback' => array($this, 'get_permission')
            ));

            register_rest_route('awecm/v1', '/delete-template/', array(
                'methods' => 'POST',
                'callback' => array($this, 'delete_template'),
                'permission_callback' => array($this, 'get_permission')
            ));

            register_rest_route('awecm/v1', '/save-template/', array(
                'methods' => 'POST',
                'callback' => array($this, 'save_template'),
                'permission_callback' => array($this, 'get_permission')
            ));

            register_rest_route('awecm/v1', '/template-data/', array(
                'methods' => 'POST',
                'callback' => array($this, 'get_template_data'),
                'permission_callback' => array($this, 'get_permission')
            ));

            register_rest_route('awecm/v1', '/preview/', array(
                'methods' => 'POST',
                'callback' => array($this, 'template_preview'),
                'permission_callback' => array($this, 'get_permission')
            ));

            register_rest_route('awecm/v1', '/template-map-preview/', array(
                'methods' => 'POST',
                'callback' => array($this, 'template_mapping_preview'),
                'permission_callback' => array($this, 'get_permission')
            ));

            register_rest_route('awecm/v1', '/sent-mail/', array(
                'methods' => 'POST',
                'callback' => array($this, 'sent_mail'),
                'permission_callback' => array($this, 'get_permission')
            ));

            register_rest_route('awecm/v1', '/customizer-data/', array(
                'methods' => 'GET',
                'callback' => array($this, 'get_customizer_data'),
                'permission_callback' => array($this, 'get_permission')
            ));

            register_rest_route('awecm/v1', '/get-template-list/', array(
                'methods' => 'POST',
                'callback' => array($this, 'get_template_list'),
                'permission_callback' => array($this, 'get_permission')
            ));
        });
    }

    /**
     *
     * Ensures only one instance of AWDP is loaded or can be loaded.
     *
     * @since 1.0.0
     * @static
     * @see WordPress_Plugin_Template()
     * @return Main AWDP instance
     */
    public static function instance($file = '', $version = '1.0.0')
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self($file, $version);
        }
        return self::$_instance;
    }

    /**
     * Cloning is forbidden.
     *
     * @since 1.0.0
     */
    public function __clone()
    {
        _doing_it_wrong(__FUNCTION__, __('Cheatin&#8217; huh?'), $this->_version);
    }

    /**
     * Unserializing instances of this class is forbidden.
     *
     * @since 1.0.0
     */
    public function __wakeup()
    {
        _doing_it_wrong(__FUNCTION__, __('Cheatin&#8217; huh?'), $this->_version);
    }

    /**
     * Permission Callback
    **/
    public function get_permission()
    {
        if (current_user_can('administrator') || current_user_can('manage_woocommerce')) {
            return true;
        } else {
            return false;
        }
    }

    /**
	 * Get email mapping for email mappings page
     * @return WP_REST_Response
     * @throws Exception
    */
    public function get_email_mappings()
    {
        $result = array();
		$new_ord_active_temp_id = -1;
		$cancelled_ord_active_temp_id = -1;
		$failed_ord_active_temp_id = -1;
		$onhold_ord_active_temp_id = -1;
		$processing_ord_active_temp_id = -1;
		$completed_ord_active_temp_id = -1;
		$refunded_ord_active_temp_id = -1;
		$invoice_active_temp_id = -1;
		$customer_note_active_temp_id = -1;
		$reset_password_active_temp_id = -1;
		$new_account_active_temp_id = -1;

		// get email map settings
		$email_mapping = get_option( $this->_token.'_email_mapping' );
		if( ! empty( $email_mapping ) ){
			if( ! empty( $email_mapping['new_ord_temp_id'] ) ){
				$new_ord_active_temp_id = $email_mapping['new_ord_temp_id'];
			}
			if( ! empty( $email_mapping['cancelled_ord_temp_id'] ) ){
				$cancelled_ord_active_temp_id = $email_mapping['cancelled_ord_temp_id'];
			}
			if( ! empty( $email_mapping['failed_ord_temp_id'] ) ){
				$failed_ord_active_temp_id = $email_mapping['failed_ord_temp_id'];
			}
			if( ! empty( $email_mapping['onhold_ord_temp_id'] ) ){
				$onhold_ord_active_temp_id = $email_mapping['onhold_ord_temp_id'];
			}
			if( ! empty( $email_mapping['processing_ord_temp_id'] ) ){
				$processing_ord_active_temp_id = $email_mapping['processing_ord_temp_id'];
			}
			if( ! empty( $email_mapping['completed_ord_temp_id'] ) ){
				$completed_ord_active_temp_id = $email_mapping['completed_ord_temp_id'];
			}
			if( ! empty( $email_mapping['refunded_ord_temp_id'] ) ){
				$refunded_ord_active_temp_id = $email_mapping['refunded_ord_temp_id'];
			}
			if( ! empty( $email_mapping['invoice_temp_id'] ) ){
				$invoice_active_temp_id = $email_mapping['invoice_temp_id'];
			}
			if( ! empty( $email_mapping['customer_note_temp_id'] ) ){
				$customer_note_active_temp_id = $email_mapping['customer_note_temp_id'];
			}
			if( ! empty( $email_mapping['reset_password_temp_id'] ) ){
				$reset_password_active_temp_id = $email_mapping['reset_password_temp_id'];
			}
			if( ! empty( $email_mapping['new_account_temp_id'] ) ){
				$new_account_active_temp_id = $email_mapping['new_account_temp_id'];
			}
		}

        // template arrays initializations
        $new_order_templates = array(
            array(
				'value' => -1,
				'label' => 'Default Template'
            )
        );

        $cancelled_order_templates = array(
            array(
				'value' => -1,
				'label' => 'Default Template'
            )
        );

        $failed_order_templates = array(
            array(
				'value' => -1,
				'label' => 'Default Template'
            )
        );

        $onhold_order_templates = array(
			array(
				'value' => -1,
				'label' => 'Default Template'
			)
        );

        $processing_order_templates = array(
			array(
				'value' => -1,
            	'label' => 'Default Template'
			)
        );

        $completed_order_templates = array(
			array(
				'value' => -1,
				'label' => 'Default Template'
			)
        );

        $refunded_order_templates = array(
			array(
				'value' => -1,
				'label' => 'Default Template'
			)
        );

        $customer_invoice_templates = array(
			array(
				'value' => -1,
            	'label' => 'Default Template'
			)
        );

        $customer_note_templates = array(
			array(
				'value' => -1,
				'label' => 'Default Template'
			)
        );

        $reset_password_templates = array(
			array(
				'value' => -1,
				'label' => 'Default Template'
			)
        );

        $new_account_templates = array(
			array(
				'value' => -1,
				'label' => 'Default Template'
			)
        );

        // Query arguments
        $args = array(
            'post_type' => 'aco_email_templates',
            'posts_per_page' => -1
        );

        // The Query
        $template_query = new WP_Query($args);

        // Query Loop
        if( $template_query->have_posts() ):
            while( $template_query->have_posts() ): $template_query->the_post();
                $current_post = array(
                    'value' => get_the_ID(),
                    'label' => get_the_title()
                );

                // assing after checking post category
                if( has_term( 'awecm_admin_new_order', 'awecm_template_categories' ) ) {
                    array_push( $new_order_templates, $current_post );
                }

                if( has_term( 'awecm_admin_cancelled_order', 'awecm_template_categories' ) ) {
                    array_push( $cancelled_order_templates, $current_post );
                }

                if( has_term( 'awecm_admin_failed_order', 'awecm_template_categories' ) ) {
                    array_push( $failed_order_templates, $current_post );
                }

                if( has_term( 'awecm_order_onhold', 'awecm_template_categories' ) ) {
                    array_push( $onhold_order_templates, $current_post );
                }

                if( has_term( 'awecm_order_processing', 'awecm_template_categories' ) ) {
                    array_push( $processing_order_templates, $current_post );
                }

                if( has_term( 'awecm_order_completed', 'awecm_template_categories' ) ) {
                    array_push( $completed_order_templates, $current_post );
                }

                if( has_term( 'awecm_order_refunded', 'awecm_template_categories' ) ) {
                    array_push( $refunded_order_templates, $current_post );
                }

                if( has_term( 'awecm_order_invoice', 'awecm_template_categories' ) ) {
                    array_push( $customer_invoice_templates, $current_post );
                }

                if( has_term( 'awecm_order_note', 'awecm_template_categories' ) ) {
                    array_push( $customer_note_templates, $current_post );
                }

                if( has_term( 'awecm_reset_password', 'awecm_template_categories' ) ) {
                    array_push( $reset_password_templates, $current_post );
                }

                if( has_term( 'awecm_new_account', 'awecm_template_categories' ) ) {
                    array_push( $new_account_templates, $current_post );
                }
            endwhile;
            // response data
            $result['status'] = 1;
            $result['newOrderTemplates'] = $new_order_templates;
            $result['cancelledOrderTemplates'] = $cancelled_order_templates;
            $result['failedOrderTemplates'] = $failed_order_templates;
            $result['onholdOrderTemplates'] = $onhold_order_templates;
            $result['processingOrderTemplates'] = $processing_order_templates;
            $result['completedOrderTemplates'] = $completed_order_templates;
            $result['refundedOrderTemplates'] = $refunded_order_templates;
            $result['customerInvoiceTemplates'] = $customer_invoice_templates;
            $result['customerNoteTemplates'] = $customer_note_templates;
            $result['resetPasswordTemplates'] = $reset_password_templates;
            $result['newAccountTemplates'] = $new_account_templates;
			$result['newOrdActiveTemp'] = $new_ord_active_temp_id;
			$result['cancelledOrdActiveTemp'] = $cancelled_ord_active_temp_id;
			$result['failedOrdActiveTemp'] = $failed_ord_active_temp_id;
			$result['onholdOrdActiveTemp'] = $onhold_ord_active_temp_id;
			$result['processingOrdActiveTemp'] = $processing_ord_active_temp_id;
			$result['completedOrdActiveTemp'] = $completed_ord_active_temp_id;
			$result['refundedOrdActiveTemp'] = $refunded_ord_active_temp_id;
			$result['invoiceActiveTemp'] = $invoice_active_temp_id;
			$result['customerNoteActiveTemp'] = $customer_note_active_temp_id;
			$result['resetPasswordActiveTemp'] = $reset_password_active_temp_id;
			$result['newAccountActiveTemp'] = $new_account_active_temp_id;
        else:
            // response data
            $result['status'] = 0;
        endif;
        wp_reset_postdata();

        // response
        return new WP_REST_Response( $result, 200 );
    }

    /**
	 * change email template based on change of template select box in email mapping page
     * @return WP_REST_Response
     * @throws Exception
    */
    public function change_email_mappings($data)
    {
        $request_body = $data->get_params();
		$template_id = $request_body['templateID'];
		$category = $request_body['category'];
		$response = 0;

		if( ! empty( $category ) && ! empty( $template_id ) ){
			$email_mapping = get_option( $this->_token.'_email_mapping' );
			if( empty( $email_mapping) || ! is_array( $email_mapping ) ){
				$email_mapping = array();
			}

			switch( $category ) {
				case "awecm_admin_new_order":
					$email_mapping['new_ord_temp_id'] = $template_id;
					update_option( $this->_token . '_email_mapping', $email_mapping );
					$response = 1;
					break;
				case "awecm_admin_cancelled_order":
					$email_mapping['cancelled_ord_temp_id'] = $template_id;
					update_option( $this->_token . '_email_mapping', $email_mapping );
					$response = 1;
					break;
				case "awecm_admin_failed_order":
					$email_mapping['failed_ord_temp_id'] = $template_id;
					update_option( $this->_token . '_email_mapping', $email_mapping );
					$response = 1;
					break;
				case "awecm_order_onhold":
					$email_mapping['onhold_ord_temp_id'] = $template_id;
					update_option( $this->_token . '_email_mapping', $email_mapping );
					$response = 1;
					break;
				case "awecm_order_processing":
					$email_mapping['processing_ord_temp_id'] = $template_id;
					update_option( $this->_token . '_email_mapping', $email_mapping );
					$response = 1;
					break;
				case "awecm_order_completed":
					$email_mapping['completed_ord_temp_id'] = $template_id;
					update_option( $this->_token . '_email_mapping', $email_mapping );
					$response = 1;
					break;
				case "awecm_order_refunded":
					$email_mapping['refunded_ord_temp_id'] = $template_id;
					update_option( $this->_token . '_email_mapping', $email_mapping );
					$response = 1;
					break;
				case "awecm_order_invoice":
					$email_mapping['invoice_temp_id'] = $template_id;
					update_option( $this->_token . '_email_mapping', $email_mapping );
					$response = 1;
					break;
				case "awecm_order_note":
					$email_mapping['customer_note_temp_id'] = $template_id;
					update_option( $this->_token . '_email_mapping', $email_mapping );
					$response = 1;
					break;
				case "awecm_reset_password":
					$email_mapping['reset_password_temp_id'] = $template_id;
					update_option( $this->_token . '_email_mapping', $email_mapping );
					$response = 1;
					break;
				case "awecm_new_account":
					$email_mapping['new_account_temp_id'] = $template_id;
					update_option( $this->_token . '_email_mapping', $email_mapping );
					$response = 1;
					break;
				default:
					$response = 0;
			}
		}

        return new WP_REST_Response($response, 200);
    }

    /**
	 * Get templates by term slug
     * @return WP_REST_Response
     * @throws Exception
    */
    public function get_templates_by_slug($data)
    {
        $request_body = $data->get_params();
		$term_slug = $request_body['term'];
        $result = array();
        $templates_list = array();
        $email_mapping = get_option( $this->_token.'_email_mapping' );

        // Query arguments
        $args = array(
            'post_type' => 'aco_email_templates',
            'tax_query' => array(
                array(
                    'taxonomy' => 'awecm_template_categories',
                    'field'    => 'slug',
                    'terms'    => $term_slug,
                ),
            ),
            'posts_per_page' => -1
        );

        // The Query
        $template_query = new WP_Query($args);

        // Query Loop
        if( $template_query->have_posts() ):
            while( $template_query->have_posts() ): $template_query->the_post();
                $template_status = false;
                // checking active or not
                if( ! empty( $email_mapping) && is_array( $email_mapping ) ){
                    switch( $term_slug ) {
                        case "awecm_admin_new_order":
                            if( $email_mapping['new_ord_temp_id'] == get_the_ID() ){
                                $template_status = true;
                            }
                            break;
                        case "awecm_admin_cancelled_order":
                            if( $email_mapping['cancelled_ord_temp_id'] == get_the_ID() ){
                                $template_status = true;
                            }
                            break;
                        case "awecm_admin_failed_order":
                            if( $email_mapping['failed_ord_temp_id'] == get_the_ID() ){
                                $template_status = true;
                            }
                            break;
                        case "awecm_order_onhold":
                            if( $email_mapping['onhold_ord_temp_id'] == get_the_ID() ){
                                $template_status = true;
                            }
                            break;
                        case "awecm_order_processing":
                            if( $email_mapping['processing_ord_temp_id'] == get_the_ID() ){
                                $template_status = true;
                            }
                            break;
                        case "awecm_order_completed":
                            if( $email_mapping['completed_ord_temp_id'] == get_the_ID() ){
                                $template_status = true;
                            }
                            break;
                        case "awecm_order_refunded":
                            if( $email_mapping['refunded_ord_temp_id'] == get_the_ID() ){
                                $template_status = true;
                            }
                            break;
                        case "awecm_order_invoice":
                            if( $email_mapping['invoice_temp_id'] == get_the_ID() ){
                                $template_status = true;
                            }
                            break;
                        case "awecm_order_note":
                            if( $email_mapping['customer_note_temp_id'] == get_the_ID() ){
                                $template_status = true;
                            }
                            break;
                        case "awecm_reset_password":
                            if( $email_mapping['reset_password_temp_id'] == get_the_ID() ){
                                $template_status = true;
                            }
                            break;
                        case "awecm_new_account":
                            if( $email_mapping['new_account_temp_id'] == get_the_ID() ){
                                $template_status = true;
                            }
                            break;
                        default:
                            $template_status = false;
                    }
                }

                $templates_list[] = array(
                    'id'    => get_the_ID(),
                    'title' => get_the_title(),
                    'active' => $template_status,
                    'rule' =>''
                );

                // response data
                $result['status'] = 1;
                $result['templateList'] = $templates_list;
            endwhile;
        else:
            // response data
            $result['status'] = 0;
        endif;
        wp_reset_postdata();

        return new WP_REST_Response($result, 200);
    }

    /**
	 * delete templates by id
     * @return WP_REST_Response
     * @throws Exception
    */
    public function delete_template($data)
    {
        $request_body = $data->get_params();
        $term_slug = $request_body['term'];
		$template_id = $request_body['templateID'];
        $email_mapping = get_option( $this->_token.'_email_mapping' );
        $result = array();
        $templates_list = array();

        // delete post
        wp_delete_post( $template_id, true );

        // Query arguments
        $args = array(
            'post_type' => 'aco_email_templates',
            'tax_query' => array(
                array(
                    'taxonomy' => 'awecm_template_categories',
                    'field'    => 'slug',
                    'terms'    => $term_slug,
                ),
            ),
            'posts_per_page' => -1
        );

        // The Query
        $template_query = new WP_Query($args);

        // Query Loop
        if( $template_query->have_posts() ):
            while( $template_query->have_posts() ): $template_query->the_post();
                $template_status = false;
                // checking active or not
                if( ! empty( $email_mapping) && is_array( $email_mapping ) ){
                    switch( $term_slug ) {
                        case "awecm_admin_new_order":
                            if( $email_mapping['new_ord_temp_id'] == get_the_ID() ){
                                $template_status = true;
                            }
                            break;
                        case "awecm_admin_cancelled_order":
                            if( $email_mapping['cancelled_ord_temp_id'] == get_the_ID() ){
                                $template_status = true;
                            }
                            break;
                        case "awecm_admin_failed_order":
                            if( $email_mapping['failed_ord_temp_id'] == get_the_ID() ){
                                $template_status = true;
                            }
                            break;
                        case "awecm_order_onhold":
                            if( $email_mapping['onhold_ord_temp_id'] == get_the_ID() ){
                                $template_status = true;
                            }
                            break;
                        case "awecm_order_processing":
                            if( $email_mapping['processing_ord_temp_id'] == get_the_ID() ){
                                $template_status = true;
                            }
                            break;
                        case "awecm_order_completed":
                            if( $email_mapping['completed_ord_temp_id'] == get_the_ID() ){
                                $template_status = true;
                            }
                            break;
                        case "awecm_order_refunded":
                            if( $email_mapping['refunded_ord_temp_id'] == get_the_ID() ){
                                $template_status = true;
                            }
                            break;
                        case "awecm_order_invoice":
                            if( $email_mapping['invoice_temp_id'] == get_the_ID() ){
                                $template_status = true;
                            }
                            break;
                        case "awecm_order_note":
                            if( $email_mapping['customer_note_temp_id'] == get_the_ID() ){
                                $template_status = true;
                            }
                            break;
                        case "awecm_reset_password":
                            if( $email_mapping['reset_password_temp_id'] == get_the_ID() ){
                                $template_status = true;
                            }
                            break;
                        case "awecm_new_account":
                            if( $email_mapping['new_account_temp_id'] == get_the_ID() ){
                                $template_status = true;
                            }
                            break;
                        default:
                            $template_status = false;
                    }
                }

                $templates_list[] = array(
                    'id'    => get_the_ID(),
                    'title' => get_the_title(),
                    'active' => $template_status,
                    'rule' =>''
                );
            endwhile;
        endif;
        wp_reset_postdata();

        // response data
        $result['status'] = 1;
        $result['templateList'] = $templates_list;

        return new WP_REST_Response($result, 200);
    }

    /**
	 * Save template
     * @return WP_REST_Response
     * @throws Exception
    */
    public function save_template($data)
    {
        $request_body = $data->get_params();
        $template_id = $request_body['id'];
        $category = $request_body['category'];
        $settings = $request_body['settings'];
        $template_name = $settings['tempName'];
        unset($settings['tempName']);
       
        if( empty( $template_id ) ){
            // Create post object
            $args = array(
                'post_title' => wp_strip_all_tags( $template_name ),
                'post_type' => 'aco_email_templates',
                'post_status' => 'publish',
                'post_author' => 1,
            );
            
            // Insert the post into the database
            $template_id = wp_insert_post( $args );
            // set term 
            wp_set_object_terms( $template_id, $category, 'awecm_template_categories' );

            // add post meta
            add_post_meta( $template_id, 'template_settings', maybe_serialize($settings), true );
        } else {
            $args = array(
                'ID'           => $template_id,
                'post_title'   => $template_name,
            );
            wp_update_post( $args );
            update_post_meta( $template_id, 'template_settings', maybe_serialize($settings) );
        }

        // saving template file
        if( ! empty( $template_id ) ){
            $settings['tempName'] = $template_name;
            $frontend_obj = new AWECM_Front_End();
            $html = $frontend_obj->prepare_template( $settings, 'woomail' );
            $file_name = get_post_field( 'post_name', $template_id );
            $file_path = AWECM_UPLOAD_TEMPLATE_DIR.$file_name.'.php';
            $f = fopen( $file_path, "w" );
            if( $f != false ){
                fwrite( $f, $html );
                fclose( $f );
            }
        }

        // response data
        $result['status'] = 1;
        $result['templateID'] = $template_id;

        return new WP_REST_Response($result, 200);
    }

    /**
	 * get template data
     * @return WP_REST_Response
     * @throws Exception
    */
    public function get_template_data($data)
    {
        $request_body = $data->get_params();
        $template_id = $request_body['id'];
        $category = $request_body['category'];
        $email_mapping = get_option( $this->_token.'_email_mapping' );
        $template_name = get_the_title( $template_id );
        $settings_serialized = get_post_meta( $template_id, 'template_settings', true );
        $template_status = false;
        if( ! empty( $settings_serialized ) ){
            $template_settings = maybe_unserialize( $settings_serialized );
            if( ! empty( $template_settings ) && is_array( $template_settings ) ){
                $template_settings['tempName'] = $template_name;
                // response data
                $result['settings'] = $template_settings;
                // checking active or not
                if( ! empty( $email_mapping) || ! is_array( $email_mapping ) ){
                    switch( $category ) {
                        case "awecm_admin_new_order":
                            if( $email_mapping['new_ord_temp_id'] == $template_id ){
                                $template_status = true;
                            }
                            break;
                        case "awecm_admin_cancelled_order":
                            if( $email_mapping['cancelled_ord_temp_id'] == $template_id ){
                                $template_status = true;
                            }
                            break;
                        case "awecm_admin_failed_order":
                            if( $email_mapping['failed_ord_temp_id'] == $template_id ){
                                $template_status = true;
                            }
                            break;
                        case "awecm_order_onhold":
                            if( $email_mapping['onhold_ord_temp_id'] == $template_id ){
                                $template_status = true;
                            }
                            break;
                        case "awecm_order_processing":
                            if( $email_mapping['processing_ord_temp_id'] == $template_id ){
                                $template_status = true;
                            }
                            break;
                        case "awecm_order_completed":
                            if( $email_mapping['completed_ord_temp_id'] == $template_id ){
                                $template_status = true;
                            }
                            break;
                        case "awecm_order_refunded":
                            if( $email_mapping['refunded_ord_temp_id'] == $template_id ){
                                $template_status = true;
                            }
                            break;
                        case "awecm_order_invoice":
                            if( $email_mapping['invoice_temp_id'] == $template_id ){
                                $template_status = true;
                            }
                            break;
                        case "awecm_order_note":
                            if( $email_mapping['customer_note_temp_id'] == $template_id ){
                                $template_status = true;
                            }
                            break;
                        case "awecm_reset_password":
                            if( $email_mapping['reset_password_temp_id'] == $template_id ){
                                $template_status = true;
                            }
                            break;
                        case "awecm_new_account":
                            if( $email_mapping['new_account_temp_id'] == $template_id ){
                                $template_status = true;
                            }
                            break;
                        default:
                            $template_status = false;
                    }
                }
                $result['active'] = $template_status;
                $result['status'] = 1;
            } else {
                $result['status'] = 0;
            }
        } else {
            $result['status'] = 0;
        }

        return new WP_REST_Response($result, 200);
    }

    /**
	 * get template preview
     * @return WP_REST_Response
     * @throws Exception
    */
    public function template_preview($data)
    {
        $request_body = $data->get_params();
        $settings = $request_body['settings'];

        if( ! empty( $settings ) ) {
            $settings_serialize = maybe_serialize( $settings );
            if( !session_id() )
                session_start();

            $_SESSION['awecm_template_settings'] = $settings_serialize;
            // result
            $result['status'] = 1;
        } else {
            $result['status'] = 0;
        }

        return new WP_REST_Response($result, 200);
    }

    /**
	 * Generate template preview for email mapping page
     * @return WP_REST_Response
     * @throws Exception
    */
    public function template_mapping_preview($data)
    {
        $request_body = $data->get_params();
        $template_id = $request_body['id'];
        if( ! empty( $template_id ) && $template_id != -1 ){
            $template_name = get_the_title( $template_id );
            $settings_serialized = get_post_meta( $template_id, 'template_settings', true );
            if( ! empty( $settings_serialized ) ){
                $template_settings = maybe_unserialize( $settings_serialized );
                if( ! empty( $template_settings ) && is_array( $template_settings ) ){
                    $template_settings['tempName'] = $template_name;
                    $settings = maybe_serialize( $template_settings );
                    if( !session_id() )
                        session_start();

                    $_SESSION['awecm_template_settings'] = $settings;
                    // result
                    $result['status'] = 1;
                } else {
                    $result['status'] = 0;
                }
            } else {
                $result['status'] = 0;
            }
        } else {
            $result['status'] = 0;
        }
        
        return new WP_REST_Response($result, 200);
    }

    /**
	 * Sent test email
     * @return WP_REST_Response
     * @throws Exception
    */
    public function sent_mail($data)
    {
        $request_body = $data->get_params();
        $category = $request_body['category'];
        $to = $request_body['emailID'];
        $settings = $request_body['settings'];
		$subject = "[".get_bloginfo('name')."] Test Email";
		$headers[] = 'From: ' .get_bloginfo('name'). '<no-reply@'. $_SERVER['SERVER_NAME'].'>';
        $headers[] = 'Reply-To: ' . get_bloginfo('name') . ' <' . $to . '>';
        $frontend_obj = new AWECM_Front_End();
        $message = $frontend_obj->prepare_template( $settings, 'testmail' );

        add_filter( 'wp_mail_content_type', array( $this, 'mail_html_content_type' ) );
		if( wp_mail( $to, $subject, $message, $headers ) ) {
            $result['status'] = 1;
        } else {
            $result['status'] = $to.' '.$subject;
        }

        return new WP_REST_Response($result, 200);
    }

    /**
	 * Email content type
    */
    public function mail_html_content_type()
    {
        return 'text/html';
    }

    /**
	 * Save global style
     * @return WP_REST_Response
     * @throws Exception
    */
    public function save_global_style($data)
    {
        $request_body = $data->get_params();
        $styles = $request_body['styles'];
        if( ! empty( $styles ) ){
            update_option( $this->_token . '_global_styles', $styles );
            $result['status'] = 1;
        } else {
            $result['status'] = 0;
        }

        return new WP_REST_Response($result, 200);
    }

    /**
	 * Get global styles
     * @return WP_REST_Response
     * @throws Exception
    */
    public function get_global_styles()
    {
        $result = array();
        $global_styles = get_option( $this->_token.'_global_styles' );
        if( ! empty( $global_styles ) ){
            $result['globalStyles'] = $global_styles;
            $result['status'] = 1;
        } else {
            $result['status'] = 0;
        }
        
        return new WP_REST_Response($result, 200);
    }

    /**
	 * Get template customizer woo data
     * @return WP_REST_Response
     * @throws Exception
    */
    public function get_customizer_data()
    {
        $coupon_codes = array();
        $args = array(
            'posts_per_page'   => -1,
            'orderby'          => 'name',
            'order'            => 'asc',
            'post_type'        => 'shop_coupon',
            'post_status'      => 'publish',
        );
        $coupon_posts = get_posts( $args );

        if( ! is_wp_error( $coupon_posts ) && ! empty( $coupon_posts ) ){
            foreach( $coupon_posts as $coupon_post ) {
                $current_coupon = array();
                $current_coupon['label'] = $coupon_post->post_name;
                $current_coupon['value'] = $coupon_post->post_name;
                $coupon_codes[] = $current_coupon;
            }
            $result['coupons'] = $coupon_codes;
        } else {
            $result['coupons'] = '';
        }
        // global styles
        $global_styles = get_option( $this->_token.'_global_styles' );
        if( ! empty( $global_styles ) ){
            $result['globalStyles'] = $global_styles;
        } else {
            $result['globalStyles'] = '';
        }

        $result['status'] = 1;
        
        return new WP_REST_Response($result, 200);
    }

    /**
	 * Get templates list by category
     * @return WP_REST_Response
     * @throws Exception
    */
    public function get_template_list($data)
    {
        $request_body = $data->get_params();
        $term_slug = $request_body['category'];
        $templates_list = array();
        $result = array();

        // Query arguments for getting template by category
        $args = array(
            'post_type' => 'aco_email_templates',
            'tax_query' => array(
                array(
                    'taxonomy' => 'awecm_template_categories',
                    'field'    => 'slug',
                    'terms'    => $term_slug,
                ),
            ),
            'posts_per_page' => -1
        );

        // The Query
        $template_query = new WP_Query($args);

        // Query Loop
        if( $template_query->have_posts() ):
            while( $template_query->have_posts() ): $template_query->the_post();
                $templates_list[] = array(
                    'value'    => get_the_ID(),
                    'label' => get_the_title(),
                );
            endwhile;
        endif;
        wp_reset_postdata();
        $result['templateList'] = $templates_list;
        $result['status'] = 1;
        
        return new WP_REST_Response($result, 200);
    }
}