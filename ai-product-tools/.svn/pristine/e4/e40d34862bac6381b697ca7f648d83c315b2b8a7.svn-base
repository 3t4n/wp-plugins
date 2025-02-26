<?php

namespace AIPT\Api\BulkGenerator;

use AIPT\Api\OpenAI\OpenAIClient;
use AIPT\Api\Gemini\GeminiClient;

class BulkGeneratorService {
    private $wpdb;
    private $history_table;

    public function __construct() {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->history_table = $wpdb->prefix . 'aipt_bulk_generator_history';
    }

    public function get_products($params) {
        global $wpdb;
        
        try {
            $args = [
                'post_type' => 'product',
                'posts_per_page' => isset($params['per_page']) ? absint($params['per_page']) : 10,
                'paged' => isset($params['page']) ? absint($params['page']) : 1,
                'post_status' => ['publish', 'draft'],
                'orderby' => isset($params['orderby']) ? $params['orderby'] : 'date',
                'order' => isset($params['order']) ? $params['order'] : 'DESC'
            ];

            if (!empty($params['search'])) {
                $search_term = sanitize_text_field($params['search']);
                

                

                $search_query = $wpdb->prepare(
                    "SELECT DISTINCT p.ID 
                    FROM $wpdb->posts p 
                    LEFT JOIN $wpdb->postmeta pm ON (p.ID = pm.post_id AND pm.meta_key = '_sku')
                    WHERE p.post_type = %s
                    AND (
                        p.post_title LIKE %s
                        OR pm.meta_value LIKE %s
                    )",
                    'product',
                    '%' . $wpdb->esc_like($search_term) . '%',
                    '%' . $wpdb->esc_like($search_term) . '%'
                );

                $product_ids = $wpdb->get_col($search_query);

                if (!empty($product_ids)) {
                    $args['post__in'] = $product_ids;

                    if ($args['orderby'] === 'date') {
                        $args['orderby'] = 'post__in';
                    }
                } else {

                    $args['post__in'] = [0];
                }
            }

            if (!empty($params['status'])) {
                $args['post_status'] = sanitize_text_field($params['status']);
            }

            if (!empty($params['stock_status'])) {
                $args['meta_query'][] = [
                    'key' => '_stock_status',
                    'value' => sanitize_text_field($params['stock_status']),
                    'compare' => '='
                ];
            }

            if (!empty($params['category'])) {
                $args['tax_query'] = [
                    [
                        'taxonomy' => 'product_cat',
                        'field' => 'slug',
                        'terms' => sanitize_text_field($params['category'])
                    ]
                ];
            }

            $query = new \WP_Query($args);
            $products = [];

            foreach ($query->posts as $post) {
                $product = wc_get_product($post);
                if (!$product) {
                    continue;
                }

                $has_description = !empty($product->get_description());
                $has_short_description = !empty($product->get_short_description());

                if (isset($params['hasDescription']) || isset($params['hasShortDescription'])) {
                    $want_description = isset($params['hasDescription']) ? 
                        filter_var($params['hasDescription'], FILTER_VALIDATE_BOOLEAN) : null;
                    $want_short_description = isset($params['hasShortDescription']) ? 
                        filter_var($params['hasShortDescription'], FILTER_VALIDATE_BOOLEAN) : null;

                    if ($want_description !== null && $want_short_description !== null) {
                        if ($has_description !== $want_description || $has_short_description !== $want_short_description) {
                            continue;
                        }
                    } else if ($want_description !== null && $has_description !== $want_description) {
                        continue;
                    } else if ($want_short_description !== null && $has_short_description !== $want_short_description) {
                        continue;
                    }
                }

                $image_id = $product->get_image_id();
                $image_url = wp_get_attachment_image_url($image_id, 'woocommerce_thumbnail');
                
                if (!$image_url) {
                    $image_url = wc_placeholder_img_src('woocommerce_thumbnail');
                }

                $products[] = [
                    'id' => $product->get_id(),
                    'name' => $product->get_name(),
                    'status' => $product->get_status(),
                    'categories' => wp_get_post_terms($product->get_id(), 'product_cat', ['fields' => 'names']),
                    'hasDescription' => $has_description,
                    'hasShortDescription' => $has_short_description,
                    'description' => $product->get_description(),
                    'shortDescription' => $product->get_short_description(),
                    'image' => $image_url,
                    'dateCreated' => $product->get_date_created() ? $product->get_date_created()->date('Y-m-d H:i:s') : '',
                    'dateModified' => $product->get_date_modified() ? $product->get_date_modified()->date('Y-m-d H:i:s') : '',
                    'price' => $product->get_price(),
                    'sku' => $product->get_sku()
                ];
            }

            return [
                'products' => $products,
                'total' => (int) $query->found_posts,
                'total_pages' => (int) $query->max_num_pages
            ];

        } catch (\Exception $e) {
            
            return [
                'products' => [],
                'total' => 0,
                'total_pages' => 0,
                'error' => 'An error occurred while searching products: ' . $e->getMessage()
            ];
        }
    }

    public function queue_bulk_generation($product_ids) {
        if (empty($product_ids)) {
            throw new \Exception('No products selected');
        }

        $values = [];
        $placeholders = [];

        foreach ($product_ids as $product_id) {
            $product = wc_get_product($product_id);
            if (!$product) {
                continue;
            }

            $values[] = $product_id;
            $values[] = $product->get_name();
            $values[] = 'pending';
            $placeholders[] = '(%d, %s, %s)';
        }

        if (!empty($values)) {
            $query = $this->wpdb->prepare(
                "INSERT INTO $wpdb->prefix" . "aipt_bulk_generator_history (product_id, product_name, status) VALUES " . implode(', ', $placeholders),
                $values
            );
            $this->wpdb->query($query);
        }

        return [
            'message' => 'Products queued for generation',
            'count' => count($product_ids)
        ];
    }

    public function get_generation_history() {
        return $this->wpdb->get_results(
            $wpdb->prepare(
                "SELECT * FROM $wpdb->prefix" . "aipt_bulk_generator_history ORDER BY created_at DESC LIMIT %d",
                100
            ),
            ARRAY_A
        );
    }

    public function apply_descriptions($history_ids) {
        $applied_count = 0;
        $placeholders = implode(',', array_fill(0, count($history_ids), '%d'));
        $history_items = $this->wpdb->get_results(
            $wpdb->prepare(
                "SELECT * FROM $wpdb->prefix" . "aipt_bulk_generator_history WHERE id IN ($placeholders) AND (status = %s OR status = %s)",
                array_merge($history_ids, ['approved', 'rejected'])
            ),
            ARRAY_A
        );

        foreach ($history_items as $item) {
            $product = wc_get_product($item['product_id']);
            if (!$product) continue;

            if ($item['description_type'] === 'short') {
                $product->set_short_description($item['generated_text']);
            } else {
                $product->set_description($item['generated_text']);
            }
            
            $product->save();

            $this->wpdb->update(
                $this->history_table,
                ['status' => 'approved'],
                ['id' => $item['id']],
                ['%s'],
                ['%d']
            );

            $applied_count++;
        }

        return [
            'message' => 'Descriptions applied successfully',
            'applied_count' => $applied_count
        ];
    }

    private function generate_description($product, $ai_service) {
        $prompt = $this->build_product_prompt($product);

        if ($ai_service === 'openai') {
            $client = new OpenAIClient();
            return $client->generateDescription($prompt);
        } else {
            $client = new GeminiClient();
            return $client->generateDescription($prompt);
        }
    }

    private function build_product_prompt($product) {
        $name = $product->get_name();
        $categories = wp_get_post_terms($product->get_id(), 'product_cat', ['fields' => 'names']);
        $short_description = $product->get_short_description();
        $regular_price = $product->get_regular_price();
        $sale_price = $product->get_sale_price();
        $attributes = $product->get_attributes();

        $prompt = "Product Name: {$name}\n";
        $prompt .= "Categories: " . implode(', ', $categories) . "\n";
        
        if ($short_description) {
            $prompt .= "Short Description: {$short_description}\n";
        }

        if ($regular_price) {
            $prompt .= "Regular Price: {$regular_price}\n";
        }

        if ($sale_price) {
            $prompt .= "Sale Price: {$sale_price}\n";
        }

        if (!empty($attributes)) {
            $prompt .= "Attributes:\n";
            foreach ($attributes as $attribute) {
                $prompt .= "- " . $attribute->get_name() . ": " . implode(', ', $attribute->get_options()) . "\n";
            }
        }

        $prompt .= "\nPlease generate a detailed, SEO-friendly product description that highlights the key features and benefits of this product. The description should be engaging and informative, written in a professional tone.";

        return $prompt;
    }

    public function get_categories() {
        $categories = get_terms([
            'taxonomy' => 'product_cat',
            'hide_empty' => false,
        ]);

        if (is_wp_error($categories)) {
            return [];
        }

        return array_map(function($category) {
            return [
                'id' => $category->term_id,
                'name' => $category->name,
                'slug' => $category->slug
            ];
        }, $categories);
    }

    public function bulk_generate($product_ids, $options) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'aipt_bulk_generator_history';
        $results = [];

        $system_prompt = get_option('aipt_system_prompt');
        $user_prompt = get_option('aipt_user_prompt');
        $language = get_option('aipt_language', 'English');
        $writing_style = get_option('aipt_writing_style', 'Professional');
        $max_length = get_option('aipt_max_length', '1000');
        $max_short_length = get_option('aipt_max_short_length', '300');

        foreach ($product_ids as $product_id) {
            $product = wc_get_product($product_id);
            if (!$product) continue;

            try {
                $api_provider = $options['provider'] ?? get_option('aipt_api_provider', 'openai');
                $client = $this->get_ai_client($api_provider);

                if ($options['generateShortDescription']) {

                    $short_system_prompt = str_replace('{max_length}', $max_short_length, $system_prompt);
                    $short_user_prompt = str_replace(
                        ['{language}', '{style}', '{title}'],
                        [$language, $writing_style, $product->get_name()],
                        $user_prompt
                    );

                    $short_description = $client->generate_description($short_system_prompt, $short_user_prompt);

                    $wpdb->insert(
                        $table_name,
                        [
                            'product_id' => $product_id,
                            'description_type' => 'short',
                            'generated_text' => $short_description,
                            'status' => 'pending',
                            'created_at' => current_time('mysql')
                        ]
                    );
                    $results[] = [
                        'product_id' => $product_id,
                        'type' => 'short',
                        'text' => $short_description
                    ];
                }

                if ($options['generateDescription']) {

                    $full_system_prompt = str_replace('{max_length}', $max_length, $system_prompt);
                    $full_user_prompt = str_replace(
                        ['{language}', '{style}', '{title}'],
                        [$language, $writing_style, $product->get_name()],
                        $user_prompt
                    );

                    $description = $client->generate_description($full_system_prompt, $full_user_prompt);

                    $wpdb->insert(
                        $table_name,
                        [
                            'product_id' => $product_id,
                            'description_type' => 'full',
                            'generated_text' => $description,
                            'status' => 'pending',
                            'created_at' => current_time('mysql')
                        ]
                    );
                    $results[] = [
                        'product_id' => $product_id,
                        'type' => 'full',
                        'text' => $description
                    ];
                }
            } catch (\Exception $e) {
                continue;
            }
        }

        return $results;
    }

    private function get_ai_client($api_provider) {
        if ($api_provider === 'gemini') {
            $api_key = get_option('aipt_gemini_api_key');
            if (empty($api_key)) {
                throw new \Exception('Gemini API key is not set');
            }
            return new \AIPT\Api\Gemini\GeminiClient($api_key);
        } else {
            $api_key = get_option('aipt_openai_api_key');
            if (empty($api_key)) {
                throw new \Exception('OpenAI API key is not set');
            }
            return new \AIPT\Api\OpenAI\OpenAIClient($api_key);
        }
    }
} 