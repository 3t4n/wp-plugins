<?php

namespace AIPT\Api\BulkGenerator;

use WP_REST_Request;
use WP_REST_Response;
use WP_Error;
use AIPT\Api\BulkGenerator\BulkGeneratorService;
use AIPT\Core\CtrlManager;

class BulkGeneratorController {
    private $service;

    public function __construct() {
        $this->service = new BulkGeneratorService();
    }

    public function register_routes() {
        register_rest_route('aipt/v1', '/products', [
            'methods' => 'GET',
            'callback' => [$this, 'get_products'],
            'permission_callback' => [$this, 'check_permission'],
            'args' => [
                'search' => [
                    'type' => 'string',
                    'required' => false,
                    'sanitize_callback' => 'sanitize_text_field'
                ],
                'category' => [
                    'type' => 'string',
                    'required' => false,
                    'sanitize_callback' => 'sanitize_text_field'
                ],
                'status' => [
                    'type' => 'string',
                    'required' => false,
                    'sanitize_callback' => 'sanitize_text_field'
                ],
                'stock_status' => [
                    'type' => 'string',
                    'required' => false,
                    'enum' => ['instock', 'outofstock', 'onbackorder'],
                    'sanitize_callback' => 'sanitize_text_field'
                ],
                'hasDescription' => [
                    'type' => 'string',
                    'required' => false
                ],
                'hasShortDescription' => [
                    'type' => 'string',
                    'required' => false
                ],
                'page' => [
                    'type' => 'integer',
                    'required' => false,
                    'default' => 1,
                    'sanitize_callback' => 'absint'
                ],
                'per_page' => [
                    'type' => 'integer',
                    'required' => false,
                    'default' => 10,
                    'sanitize_callback' => 'absint'
                ],
                'orderby' => [
                    'type' => 'string',
                    'required' => false,
                    'default' => 'date',
                    'sanitize_callback' => 'sanitize_text_field'
                ],
                'order' => [
                    'type' => 'string',
                    'required' => false,
                    'default' => 'DESC',
                    'enum' => ['ASC', 'DESC'],
                    'sanitize_callback' => 'sanitize_text_field'
                ]
            ]
        ]);

        register_rest_route('aipt/v1', '/categories', [
            'methods' => 'GET',
            'callback' => [$this, 'get_categories'],
            'permission_callback' => [$this, 'check_permission']
        ]);

        register_rest_route('aipt/v1/description-generator', '/queue', [
            'methods' => 'POST',
            'callback' => [$this, 'queue_bulk_generation'],
            'permission_callback' => [$this, 'check_permission']
        ]);

        register_rest_route('aipt/v1/description-generator', '/history', [
            [
                'methods' => 'GET',
                'callback' => [$this, 'get_generation_history'],
                'permission_callback' => [$this, 'check_permission']
            ],
            [
                'methods' => 'POST',
                'callback' => [$this, 'save_generation_history'],
                'permission_callback' => [$this, 'check_permission'],
                'args' => [
                    'product_id' => [
                        'required' => true,
                        'type' => 'integer',
                        'sanitize_callback' => 'absint'
                    ],
                    'description_type' => [
                        'required' => true,
                        'type' => 'string',
                        'enum' => ['short', 'full']
                    ],
                    'generated_text' => [
                        'required' => true,
                        'type' => 'string'
                    ],
                    'status' => [
                        'required' => true,
                        'type' => 'string',
                        'enum' => ['rejected']
                    ]
                ]
            ]
        ]);

        register_rest_route('aipt/v1/description-generator', '/cancel', [
            'methods' => 'POST',
            'callback' => [$this, 'cancel_generation'],
            'permission_callback' => [$this, 'check_permission'],
            'args' => [
                'history_id' => [
                    'required' => true,
                    'type' => 'integer',
                    'sanitize_callback' => 'absint'
                ]
            ]
        ]);

        register_rest_route('aipt/v1/description-generator', '/apply', [
            'methods' => 'POST',
            'callback' => [$this, 'apply_descriptions'],
            'permission_callback' => [$this, 'check_permission']
        ]);

        register_rest_route('aipt/v1/description-generator', '/bulk-generate', [
            'methods' => 'POST',
            'callback' => [$this, 'bulk_generate'],
            'permission_callback' => [$this, 'check_permission']
        ]);

        register_rest_route('aipt/v1/description-generator', '/bulk-apply', [
            'methods' => 'POST',
            'callback' => [$this, 'bulk_apply'],
            'permission_callback' => [$this, 'check_permission']
        ]);

        register_rest_route('aipt/v1', '/description-generator/apply-rejected', [
            'methods' => 'POST',
            'callback' => [$this, 'apply_rejected_descriptions'],
            'permission_callback' => [$this, 'check_permission'],
            'args' => [
                'product_ids' => [
                    'required' => true,
                    'type' => 'array',
                    'items' => [
                        'type' => 'integer'
                    ]
                ]
            ]
        ]);

        register_rest_route('aipt/v1', '/description-generator/delete-history', [
            'methods' => 'POST',
            'callback' => [$this, 'delete_history'],
            'permission_callback' => [$this, 'check_permission'],
            'args' => [
                'product_ids' => [
                    'required' => true,
                    'type' => 'array',
                    'items' => [
                        'type' => 'integer'
                    ]
                ]
            ]
        ]);

        register_rest_route('aipt/v1', '/description-generator/approve-description', [
            'methods' => 'POST',
            'callback' => [$this, 'approve_description'],
            'permission_callback' => [$this, 'check_permission'],
            'args' => [
                'product_id' => [
                    'required' => true,
                    'type' => 'integer'
                ],
                'description_type' => [
                    'required' => true,
                    'type' => 'string',
                    'enum' => ['short', 'full']
                ],
                'description' => [
                    'required' => true,
                    'type' => 'string'
                ]
            ]
        ]);

        register_rest_route('aipt/v1', '/description-generator/reject-description', [
            'methods' => 'POST',
            'callback' => [$this, 'reject_description'],
            'permission_callback' => [$this, 'check_permission'],
            'args' => [
                'product_id' => [
                    'required' => true,
                    'type' => 'integer'
                ],
                'description_type' => [
                    'required' => true,
                    'type' => 'string',
                    'enum' => ['short', 'full']
                ]
            ]
        ]);

        register_rest_route('aipt/v1', '/description-generator/delete-all-history', [
            'methods' => 'POST',
            'callback' => [$this, 'delete_all_history'],
            'permission_callback' => [$this, 'check_permission']
        ]);
    }

    public function check_permission() {
        return current_user_can('manage_woocommerce');
    }

    public function get_products(WP_REST_Request $request) {
        try {
            $params = [
                'search' => $request->get_param('search'),
                'category' => $request->get_param('category'),
                'status' => $request->get_param('status'),
                'stock_status' => $request->get_param('stock_status'),
                'hasDescription' => $request->get_param('hasDescription'),
                'hasShortDescription' => $request->get_param('hasShortDescription'),
                'page' => $request->get_param('page'),
                'per_page' => $request->get_param('per_page'),
                'orderby' => $request->get_param('orderby'),
                'order' => $request->get_param('order')
            ];

            $products = $this->service->get_products($params);
            return new WP_REST_Response($products, 200);
        } catch (\Exception $e) {
            return new WP_Error(
                'aipt_error',
                esc_html($e->getMessage()),
                array('status' => 500)
            );
        }
    }

    public function get_categories(\WP_REST_Request $request) {
        return $this->service->get_categories();
    }

    public function queue_bulk_generation(WP_REST_Request $request) {
        try {
            $product_ids = array_map('absint', $request->get_param('productIds'));
            
            if (empty($product_ids)) {
                return new WP_Error('invalid_request', 'No products selected', ['status' => 400]);
            }

            $result = $this->service->queue_bulk_generation($product_ids);
            return new WP_REST_Response($result, 200);
        } catch (\Exception $e) {
            return new WP_Error(
                'aipt_bulk_generation_error',
                esc_html($e->getMessage()),
                array('status' => 500)
            );
        }
    }

    public function get_generation_history(WP_REST_Request $request) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'aipt_bulk_generator_history';
        

        $query = $wpdb->prepare(
            "SELECT h.*, p.post_title as product_name 
            FROM $wpdb->prefix" . "aipt_bulk_generator_history h
            LEFT JOIN $wpdb->posts p ON h.product_id = p.ID
            WHERE p.post_type = %s
            ORDER BY h.product_id ASC, h.created_at DESC",
            'product'
        );
        
        $results = $wpdb->get_results($query);
        
        if ($results === false) {
            return new WP_Error('db_error', 'Database error occurred', ['status' => 500]);
        }

        foreach ($results as $result) {
            $product = wc_get_product($result->product_id);
            if ($product) {
                $image_id = $product->get_image_id();
                $result->product_image = $image_id ? wp_get_attachment_image_url($image_id, 'thumbnail') : wc_placeholder_img_src('thumbnail');
            } else {
                $result->product_image = wc_placeholder_img_src('thumbnail');
            }
        }
        
        return new WP_REST_Response($results, 200);
    }

    public function cancel_generation(WP_REST_Request $request) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'aipt_bulk_generator_history';
        
        $history_id = $request->get_param('history_id');
        
        if (!$history_id) {
            return new WP_Error('invalid_id', 'Invalid history ID', ['status' => 400]);
        }
        
        $result = $wpdb->update(
            $table_name,
            [
                'status' => 'rejected',
                'updated_at' => current_time('mysql', true)
            ],
            ['id' => $history_id],
            ['%s', '%s'],
            ['%d']
        );
        
        if ($result === false) {
            return new WP_Error('db_error', 'Failed to reject generation', ['status' => 500]);
        }
        
        return new WP_REST_Response(['message' => 'Generation rejected successfully'], 200);
    }

    public function apply_descriptions(WP_REST_Request $request) {
        try {
            $history_ids = array_map('absint', $request->get_param('historyIds'));
            
            if (empty($history_ids)) {
                return new WP_Error('invalid_request', 'No items selected', ['status' => 400]);
            }

            $result = $this->service->apply_descriptions($history_ids);
            return new WP_REST_Response($result, 200);
        } catch (\Exception $e) {
            return new WP_Error('server_error', $e->getMessage(), ['status' => 500]);
        }
    }

    private function check_credits(int $required_descriptions): bool {
        try {
            $ctrl_manager = CtrlManager::getInstance();
            $credits = $ctrl_manager->verifyCredits();
            
            
            if (is_wp_error($credits)) {
                throw new \Exception($credits->get_error_message());
            }

            if ($credits['isUnlimited']) {
                return true;
            }

            if (!isset($credits['costPerDescription'])) {
                throw new \Exception('Failed to get cost per description from API');
            }

            $cost_per_description = (int)$credits['costPerDescription'];
            if ($cost_per_description <= 0) {
                throw new \Exception('Invalid cost per description value from API');
            }

            $total_cost = $required_descriptions * $cost_per_description;
            error_log(sprintf(
                'Credit check calculation: descriptions=%d, cost_per=%d, total=%d, remaining=%d',
                $required_descriptions,
                $cost_per_description,
                $total_cost,
                $credits['remaining']
            ));

            return $credits['remaining'] >= $total_cost;
        } catch (\Exception $e) {
            throw new \Exception(esc_html($e->getMessage()));
        }
    }

    public function bulk_generate(WP_REST_Request $request) {
        try {
            $raw_data = $request->get_body();

            $data = $request->get_json_params();
            $products = $data['productIds'] ?? [];
            $options = $data['options'] ?? [];

            if (empty($products)) {
                throw new \Exception('No products provided. Request data: ' . $raw_data);
            }

            if (!is_array($products)) {
                throw new \Exception('Invalid products format. Expected array.');
            }

            $ctrl_manager = CtrlManager::getInstance();
            $credits = $ctrl_manager->verifyCredits();
            
            
            if (is_wp_error($credits)) {
                throw new \Exception($credits->get_error_message());
            }

            $total_descriptions = count($products) * (
                ($options['generateShortDescription'] ? 1 : 0) + 
                ($options['generateDescription'] ? 1 : 0)
            );

            if (!isset($credits['costPerDescription'])) {
                throw new \Exception('Failed to get cost per description from API');
            }

            $cost_per_description = (int)$credits['costPerDescription'];
            if ($cost_per_description <= 0) {
                throw new \Exception('Invalid cost per description value from API');
            }

            $total_cost = $total_descriptions * $cost_per_description;

            error_log('Credit calculation: ' . print_r([
                'total_descriptions' => $total_descriptions,
                'cost_per_description' => $cost_per_description,
                'total_cost' => $total_cost,
                'credits' => $credits
            ], true));

            if (!$this->check_credits($total_descriptions)) {
                throw new \Exception("Not enough credits. Required: {$total_cost} credits");
            }

            $result = $this->service->bulk_generate($products, $options);

            if (!$ctrl_manager->incrementCredits($total_cost)) {
                throw new \Exception('Failed to deduct credits');
            }
            

            $ctrl_manager->clearCreditsCache();
            $newBalance = $ctrl_manager->verifyCredits();
            if (is_wp_error($newBalance)) {
                throw new \Exception($newBalance->get_error_message());
            }

            return new WP_REST_Response([
                'results' => $result,
                'balance' => $newBalance,
                'operation' => [
                    'descriptions' => $total_descriptions,
                    'costPerDescription' => $cost_per_description,
                    'totalCost' => $total_cost
                ]
            ], 200);
        } catch (\Exception $e) {
            return new WP_Error(
                'aipt_bulk_generation_error',
                esc_html($e->getMessage()),
                array('status' => 500)
            );
        }
    }

    public function bulk_apply($request) {
        try {
            $params = $request->get_json_params();
            $results = $params['results'] ?? [];

            if (empty($results)) {
                return new \WP_Error('invalid_request', 'No descriptions to apply', ['status' => 400]);
            }

            global $wpdb;
            $table_name = $wpdb->prefix . 'aipt_bulk_generator_history';

            foreach ($results as $result) {
                $product_id = $result['product_id'] ?? null;
                $type = $result['type'] ?? null;
                $text = $result['text'] ?? null;

                if (!$product_id || !$type || !$text) {
                    continue;
                }

                $product = wc_get_product($product_id);
                if (!$product) {
                    continue;
                }

                if ($type === 'short') {
                    $product->set_short_description($text);
                } else {
                    $product->set_description($text);
                }

                $product->save();

                $wpdb->delete(
                    $table_name,
                    [
                        'product_id' => $product_id,
                        'description_type' => $type,
                        'status' => 'pending'
                    ],
                    [
                        '%d',
                        '%s',
                        '%s'
                    ]
                );
            }

            return new \WP_REST_Response([
                'success' => true,
                'message' => 'Descriptions applied successfully'
            ], 200);

        } catch (\Exception $e) {
            return new \WP_Error('apply_error', $e->getMessage(), ['status' => 500]);
        }
    }

    public function save_generation_history(WP_REST_Request $request) {

        if ($request->get_param('status') !== 'rejected') {
            return new WP_REST_Response(['message' => 'Only rejected items are stored in history'], 200);
        }

        global $wpdb;
        $table_name = $wpdb->prefix . 'aipt_bulk_generator_history';
        

        $data = [
            'product_id' => $request->get_param('product_id'),
            'description_type' => $request->get_param('description_type'),
            'generated_text' => $request->get_param('generated_text'),
            'status' => 'rejected',
            'updated_at' => current_time('mysql', true),
            'created_at' => current_time('mysql', true)
        ];
        
        $format = [
            '%d', 
            '%s', 
            '%s', 
            '%s', 
            '%s', 
            '%s'  
        ];
        

        $existing = $wpdb->get_row(
            $wpdb->prepare(
                "SELECT id FROM $wpdb->prefix" . "aipt_bulk_generator_history 
                WHERE product_id = %d 
                AND description_type = %s 
                AND status = %s",
                $data['product_id'],
                $data['description_type'],
                'rejected'
            )
        );

        if ($existing) {

            $result = $wpdb->update(
                $table_name,
                $data,
                [
                    'id' => $existing->id
                ],
                $format,
                ['%d']
            );
        } else {

            $result = $wpdb->insert(
                $table_name,
                $data,
                $format
            );
        }
        
        if ($result === false) {
            return new WP_Error('db_error', 'Failed to save history item', ['status' => 500]);
        }
        
        return new WP_REST_Response([
            'message' => 'History item saved successfully',
            'id' => $existing ? $existing->id : $wpdb->insert_id
        ], 201);
    }

    public function apply_rejected_descriptions(WP_REST_Request $request) {
        try {
            $product_ids = array_map('absint', $request->get_param('product_ids'));
            
            if (empty($product_ids)) {
                return new WP_Error('invalid_request', 'No products selected', ['status' => 400]);
            }

            global $wpdb;
            $table_name = $wpdb->prefix . 'aipt_bulk_generator_history';
            $success_count = 0;

            foreach ($product_ids as $product_id) {
                $product = wc_get_product($product_id);
                if (!$product) {
                    continue;
                }

                $rejected_descriptions = $wpdb->get_results(
                    $wpdb->prepare(
                        "SELECT h.* 
                        FROM $wpdb->prefix" . "aipt_bulk_generator_history h
                        INNER JOIN (
                            SELECT product_id, description_type, MAX(created_at) as max_created_at
                            FROM $wpdb->prefix" . "aipt_bulk_generator_history
                            WHERE product_id = %d AND status = %s
                            GROUP BY product_id, description_type
                        ) latest ON h.product_id = latest.product_id 
                            AND h.description_type = latest.description_type 
                            AND h.created_at = latest.max_created_at",
                        $product_id,
                        'rejected'
                    )
                );

                foreach ($rejected_descriptions as $desc) {
                    if ($desc->description_type === 'short') {
                        $product->set_short_description($desc->generated_text);
                    } else {
                        $product->set_description($desc->generated_text);
                    }
                }

                $product->save();
                $success_count++;

                $wpdb->update(
                    $table_name,
                    ['status' => 'approved'],
                    [
                        'product_id' => $product_id,
                        'status' => 'rejected'
                    ],
                    ['%s'],
                    ['%d', '%s']
                );
            }

            return new WP_REST_Response([
                'success' => true,
                'message' => sprintf('%d products updated successfully', $success_count)
            ], 200);

        } catch (\Exception $e) {
            return new WP_Error('server_error', $e->getMessage(), ['status' => 500]);
        }
    }

    public function delete_history(WP_REST_Request $request) {
        try {
            $product_ids = array_map('absint', $request->get_param('product_ids'));
            
            if (empty($product_ids)) {
                return new WP_Error('invalid_request', 'No products selected', ['status' => 400]);
            }

            global $wpdb;
            $table_name = $wpdb->prefix . 'aipt_bulk_generator_history';
            

            $placeholders = implode(',', array_fill(0, count($product_ids), '%d'));
            $result = $wpdb->query(
                $wpdb->prepare(
                    "DELETE FROM $wpdb->prefix" . "aipt_bulk_generator_history WHERE product_id IN ($placeholders)",
                    ...$product_ids
                )
            );

            if ($result === false) {
                return new WP_Error('db_error', 'Failed to delete history items', ['status' => 500]);
            }

            return new WP_REST_Response([
                'success' => true,
                'message' => sprintf('%d history items deleted successfully', $result)
            ], 200);

        } catch (\Exception $e) {
            return new WP_Error('server_error', $e->getMessage(), ['status' => 500]);
        }
    }

    public function approve_description(WP_REST_Request $request) {
        try {
            $product_id = $request->get_param('product_id');
            $description_type = $request->get_param('description_type');
            $description = $request->get_param('description');

            $product = wc_get_product($product_id);
            if (!$product) {
                return new WP_Error('invalid_product', 'Invalid product ID', ['status' => 404]);
            }

            if ($description_type === 'short') {
                $product->set_short_description($description);
            } else {
                $product->set_description($description);
            }
            $product->save();

            global $wpdb;
            $table_name = $wpdb->prefix . 'aipt_bulk_generator_history';

            $wpdb->update(
                $table_name,
                [
                    'status' => 'approved',
                    'generated_text' => '', 
                    'updated_at' => current_time('mysql', true)
                ],
                [
                    'product_id' => $product_id,
                    'description_type' => $description_type,
                    'status' => 'pending'
                ],
                ['%s', '%s', '%s'],
                ['%d', '%s', '%s']
            );

            return new WP_REST_Response([
                'success' => true,
                'message' => 'Description approved and applied successfully'
            ], 200);

        } catch (\Exception $e) {
            return new WP_Error('server_error', $e->getMessage(), ['status' => 500]);
        }
    }

    public function reject_description(WP_REST_Request $request) {
        try {
            $product_id = $request->get_param('product_id');
            $description_type = $request->get_param('description_type');

            global $wpdb;
            $table_name = $wpdb->prefix . 'aipt_bulk_generator_history';

            $wpdb->update(
                $table_name,
                [
                    'status' => 'rejected',
                    'updated_at' => current_time('mysql', true)
                ],
                [
                    'product_id' => $product_id,
                    'description_type' => $description_type
                ],
                ['%s', '%s'],
                ['%d', '%s']
            );

            return new WP_REST_Response([
                'success' => true,
                'message' => 'Description rejected successfully'
            ], 200);

        } catch (\Exception $e) {
            return new WP_Error('server_error', $e->getMessage(), ['status' => 500]);
        }
    }

    public function delete_all_history(WP_REST_Request $request) {
        try {
            global $wpdb;
            $table_name = $wpdb->prefix . 'aipt_bulk_generator_history';
            

            $result = $wpdb->query(
                $wpdb->prepare(
                    "TRUNCATE TABLE $wpdb->prefix" . "aipt_bulk_generator_history"
                )
            );

            if ($result === false) {
                return new WP_Error('db_error', 'Failed to delete all history items', ['status' => 500]);
            }

            return new WP_REST_Response([
                'success' => true,
                'message' => 'All history items deleted successfully'
            ], 200);

        } catch (\Exception $e) {
            return new WP_Error('server_error', $e->getMessage(), ['status' => 500]);
        }
    }
} 