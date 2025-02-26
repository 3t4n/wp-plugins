<?php
/**
 * Auto_Aliexpress_Job Class
 *
 * @since  1.0.0
 * @package Auto Aliexpress
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

if ( ! class_exists( 'Auto_Aliexpress_Job' ) ) :

    class Auto_Aliexpress_Job extends Auto_Aliexpress_Base_Job{

        /**
         * Feed link
         *
         * @var string
         */
        public $feed_link = '';

        /**
         * Attachment model
         *
         * @var object
         */
        private $attachment_model;

        /**
         * Auto_Aliexpress_Job constructor.
         *
         * @since 1.0.0
         */
        public function __construct($id, $keyword, $settings) {
            $this->id = $id;
            $this->keyword = $keyword;
            $this->settings = $settings;
            $this->logger = new Auto_Aliexpress_Log($id);
            $this->log = array();
            $this->attachment_model = new Auto_Aliexpress_Attachment();
        }

        /**
         * Run this job
         *
         * @return array
         */
        public function run(){
            $response = array();

            // Fetch Data
            $data = $this->fetch_data();

            if(!is_array($data)){
                $this->log[] = array(
                    'message'   => 'Fetch single product data failed',
                    'level'     => 'error'
                );
            }else{
                // Generate new product
                $this->create_product($data, $this->settings);
            }

            // Add this job running log to system log file
            foreach($this->log as $key => $value){
                $this->logger->add($value['message'], $value['level']);
                $response[$key] = $value['message'];
            }

            return $response;
        }

        /**
        * Fetch Data
        *
        * @return array
        */
        public function fetch_data() {
            $url = 'https://api.ali2woo.com/v1/get_products.php?';
            $req_params = [
                'version' => '1.15.2',
                'page' => 1,
                'per_page' => 20,
                'keywords' => $this->keyword,
                'category' => 26
            ];
            $url .= http_build_query($req_params);

            // fetch url json data
            $return_data  = $this->fetch_stream( $url );

            $response = json_decode($return_data, true);

            $results = $response['products'];

            foreach($results as $key => $value){
                if($this->is_title_duplicate($value['title'])){
                    continue;
                }else{
                    $value['description'] = $this->get_single_product_description($value['id']);
                    $product_info = $this->get_single_product_info($value['id']);
                    $value['attributes'] = $product_info['desc_meta']['attributes'];
                    $value['images'] = $product_info['images'];
                    $value['thumb'] = $product_info['thumb'];
                    $value['sku'] = $product_info['sku'];
                    $value['sku_products'] = $product_info['sku_products'];
                    $value['price_min'] = $product_info['price_min'];
                    $value['regular_price_min'] = $product_info['regular_price_min'];
                    return $value;
                }
            }
        }

        /**
        * Single product infomation
        *
        * @return array
        */
        public function get_single_product_info($id) {
            $url = 'https://api.ali2woo.com/v1/get_product.php?';
            $req_params = [
                'version' => '1.15.2',
                'product_id' => $id
            ];
            $url .= http_build_query($req_params);

            // fetch url json data
            $return_data  = $this->fetch_stream( $url );

            $response = json_decode($return_data, true);

            return $response['product'];
        }

        /**
        * Single product description
        *
        * @return array
        */
        public function get_single_product_description($id) {
            $url = 'https://m.aliexpress.com/api/products/'.$id.'/descriptions?';
            $req_params = [
                'clientType' => 'pc',
                'currency' => 'USD',
                'lang' => 'en_GB'
            ];
            $url .= http_build_query($req_params);

            $response = auto_aliexpress_remote_get($url);
            $result = json_decode($response['body']);
            $product_desc_url = $result->data->productDesc;

            // fetch url json data
            $return_data  = $this->fetch_stream( $product_desc_url );
            return $return_data;
        }

        /**
        * Create new product
        *
        * @return array
        */
        public function create_product($product, $settings) {
            $post_author = get_user_by('login',$settings['aliexpress_post_author']);
            $post = array(
                'post_author' => $post_author->ID,
                'post_status' => "publish",
                'post_title' => $product['title'],
                'post_content' => $product['description'],
                'post_parent' => '',
                'post_type' => "product",
            );

            // Create new product post
            $post_id = wp_insert_post( $post );
            if($post_id){

                $variations_active_cnt = 0;
                $total_quantity = 0;
                if (!empty($product['sku_products']['variations'])) {
                    foreach ($product['sku_products']['variations'] as $variation) {
                        // Count variation count
                        if (intval($variation['quantity']) > 0) {
                            $variations_active_cnt++;
                            $total_quantity += intval($variation['quantity']);
                        }
                    }
                }

                $default_product_type = $variations_active_cnt > 1 ? 'variable' : 'simple';
                wp_set_object_terms($post_id, $default_product_type, 'product_type');

                if($default_product_type == 'simple'){
                    update_post_meta($post_id, '_regular_price', $product['regular_price_min']);
                    update_post_meta($post_id, '_sale_price', $product['price_min']);
                }

                update_post_meta( $post_id, '_visibility', 'visible' );
                update_post_meta( $post_id, '_stock_status', 'instock');
                update_post_meta( $post_id, '_sku', $product['sku']);
                update_post_meta( $post_id, '_manage_stock', 'yes');
                update_post_meta( $post_id, '_stock', $total_quantity);


                $product_attributes = array();
                foreach ($product['attributes'] as $key => $value) {
                    $product_attributes[str_replace(' ', '-', $value['name'])] = array(
                        'name' => $value['name'],
                        'value' => $value['value'],
                        'position' => count($product_attributes),
                        'is_visible' => 1,
                        'is_variation' => 0,
                        'is_taxonomy' => 0
                    );
                }

                // Set product attributes
                update_post_meta($post_id, '_product_attributes', $product_attributes);

                // Set product images
                $this->set_images($post_id, $product['thumb'], $product['images']);

                $attributes_name = array();
                $variations_value = array();
                foreach ($product['sku_products']['attributes'] as $key => $attribute) {
                    $name = $attribute['name'];
                    $attributes_name[$key] = $name;
                    $variations_value[$name] = array();
                    foreach ($attribute['value'] as $key => $value) {
                        $variations_value[$name][] = $value['name'];
                    }
                }

                $product_attributes = array();

                foreach( $variations_value as $key => $terms ){
                    $taxonomy = wc_attribute_taxonomy_name($key); // The taxonomy slug
                    $attr_label = ucfirst($key); // attribute label name
                    $attr_name = ( wc_sanitize_taxonomy_name($key)); // attribute slug

                    // NEW Attributes: Register and save them
                    if( ! taxonomy_exists( $taxonomy ) )
                        $this->save_product_attribute_from_name( $attr_name, $attr_label );

                    $product_attributes[$taxonomy] = array (
                        'name'         => $taxonomy,
                        'value'        => '',
                        'position'     => '',
                        'is_visible'   => 0,
                        'is_variation' => 1,
                        'is_taxonomy'  => 1
                    );

                    foreach( $terms as $value ){
                        $term_name = ucfirst($value);
                        $term_slug = sanitize_title($value);

                        // Check if the Term name exist and if not we create it.
                        if( ! term_exists( $value, $taxonomy ) )
                            wp_insert_term( $term_name, $taxonomy, array('slug' => $term_slug ) ); // Create the term

                        // Set attribute values
                        wp_set_post_terms( $post_id, $term_name, $taxonomy, true );
                    }
                }
                update_post_meta( $post_id, '_product_attributes', $product_attributes );

                // Set product variations
                if (!empty($product['sku_products']['variations'])) {
                    foreach ($product['sku_products']['variations'] as $variation) {
                        // Prepare attributes data
                        $attributes_data = array();
                        foreach ($variation['attributes'] as $key => $attribute) {
                            $attributes_data[$product['sku_products']['attributes'][$key]['name']] = $variation['attributes_names'][$key];
                        }

                        // The variation data
                        $variation_data =  array(
                            'attributes'    => $attributes_data,
                            'sku'           => $variation['sku'],
                            'regular_price' => $variation['regular_price'],
                            'sale_price'    => $variation['price'],
                            'stock_qty'     => $variation['quantity'],
                        );

                        // Create product variation
                        $this->create_product_variation( $post_id, $variation_data );
                    }
                }

                $this->log[] = array(
                    'message'  => 'Post New Post Success: <a href="'. get_permalink( $post_id ) .'">'.$product['title'].'</a>',
                    'level'    => 'log'
                );

            }
        }

        public function set_images($product_id, $thumb_url, $images, $title = '') {

            if ($thumb_url && $thumb_url != 'empty' && !get_post_thumbnail_id($product_id) ) {
                $tmp_title = !empty($title) ? $title : null;
                $thumb_id = $this->attachment_model->create_attachment($product_id, $thumb_url, array('inner_post_id' => $product_id, 'title' => $tmp_title, 'alt' => $tmp_title, 'edit_images' => array()));
                if (is_wp_error($thumb_id)) {
                    $this->log[] = array(
                        'message'  => "Can't download $thumb_url: ".print_r($thumb_id, true),
                        'level'    => 'error'
                    );
                }else{
                    set_post_thumbnail($product_id, $thumb_id);
                }
            }

            if ($images) {
                $cur_product_image_gallery = get_post_meta($product_id, '_product_image_gallery', true);
                $cur_product_image_gallery =  $cur_product_image_gallery ? $cur_product_image_gallery : '';

                if (!$cur_product_image_gallery) {
                    $image_gallery_ids = '';
                    foreach ($images as $image_url) {
                        $cnt++;
                        if ($image_url == $thumb_url) {
                            continue;
                        }

                        $tmp_title = !empty($title) ? ($title . ' ' . $cnt) : null;
                        $new_image_gallery_id = $this->attachment_model->create_attachment($product_id, $image_url, array('inner_post_id' => $product_id, 'title' => $tmp_title, 'alt' => $tmp_title, 'edit_images' => array()));
                        if (is_wp_error($new_image_gallery_id)) {
                            $this->log[] = array(
                                'message'  => "Can't download $image_url".print_r($new_image_gallery_id, true),
                                'level'    => 'error'
                            );
                        }else{
                            $image_gallery_ids .= $new_image_gallery_id . ',';
                        }
                    }
                    update_post_meta($product_id, '_product_image_gallery', $image_gallery_ids);
                }
            }
        }

        public function create_product_variants( $id, $data ){
            foreach( $data as $variation_data ){
                if( isset($variation_data['attribute_name']) && isset($variation_data['variant']) ){
                    $variation = new WC_Product_Variation();

                    $variation->set_parent_id($id); // Set parent ID

                    $variation->set_regular_price($variation_data['price']); // Set price
                    $variation->set_price($variation_data['price']); // Set price

                    // Enable and set stock
                    if ( isset($variation_data['quantity']) ) {
                        $variation->set_manage_stock(true);
                        $variation->set_stock_quantity($variation_data['quantity']);
                        $variation->set_stock_status('instock');
                    }

                    $attributes      = array(); // Initializing
                    $attribute_names = (array) $variation_data['attribute_name'];
                    $attribute_terms = (array) $variation_data['variant'];

                    // Formatting attributes data array
                    foreach( $attribute_names as $key => $attribute_name ){
                        $attributes[sanitize_title($attribute_name)] = $attribute_terms[$key];
                    }

                    $variation->set_attributes($attributes); // Set attributes
                    $variation_id = $variation->save(); // Save to database (return the variation Id)
                }
            }
        }

        /**
        * Create a product variation for a defined variable product ID.
        *
        * @since 3.0.0
        * @param int   $product_id | Post ID of the product parent variable product.
        * @param array $variation_data | The data to insert in the product.
        */
        public function create_product_variation( $product_id, $variation_data ){
            // Get the Variable product object (parent)
            $product = wc_get_product($product_id);

            $variation_post = array(
                'post_title'  => $product->get_name(),
                'post_name'   => 'product-'.$product_id.'-variation',
                'post_status' => 'publish',
                'post_parent' => $product_id,
                'post_type'   => 'product_variation',
                'guid'        => $product->get_permalink()
            );

            // Creating the product variation
            $variation_id = wp_insert_post( $variation_post );

            // Get an instance of the WC_Product_Variation object
            $variation = new WC_Product_Variation( $variation_id );

            // Iterating through the variations attributes
            foreach ($variation_data['attributes'] as $attribute => $term_name )
            {
                //$taxonomy = 'pa_'.$attribute; // The attribute taxonomy

                $taxonomy = wc_attribute_taxonomy_name($attribute);

                // If taxonomy doesn't exists we create it (Thanks to Carl F. Corneil)
                if( ! taxonomy_exists( $taxonomy ) ){
                    register_taxonomy(
                        $taxonomy,
                        'product_variation',
                        array(
                            'hierarchical' => false,
                            'label' => ucfirst( $attribute ),
                            'query_var' => true,
                            'rewrite' => array( 'slug' => sanitize_title($attribute) ) // The base slug
                        )
                    );
                }

                // Check if the Term name exist and if not we create it.
                if( ! term_exists( $term_name, $taxonomy ) )
                    wp_insert_term( $term_name, $taxonomy ); // Create the term

                $term_slug = get_term_by('name', $term_name, $taxonomy )->slug; // Get the term slug

                // Get the post Terms names from the parent variable product.
                $post_term_names =  wp_get_post_terms( $product_id, $taxonomy, array('fields' => 'names') );

                // Check if the post term exist and if not we set it in the parent variable product.
                if( ! in_array( $term_name, $post_term_names ) )
                    wp_set_post_terms( $product_id, $term_name, $taxonomy, true );

                // Set/save the attribute data in the product variation
                update_post_meta( $variation_id, 'attribute_'.$taxonomy, $term_slug );
            }

            ## Set/save all other data

            // SKU
            if( ! empty( $variation_data['sku'] ) )
                $variation->set_sku( $variation_data['sku'] );

            // Prices
            if( empty( $variation_data['sale_price'] ) ){
                $variation->set_price( $variation_data['regular_price'] );
            } else {
                $variation->set_price( $variation_data['sale_price'] );
                $variation->set_sale_price( $variation_data['sale_price'] );
            }
            $variation->set_regular_price( $variation_data['regular_price'] );

            // Stock
            if( ! empty($variation_data['stock_qty']) ){
                $variation->set_stock_quantity( $variation_data['stock_qty'] );
                $variation->set_manage_stock(true);
                $variation->set_stock_status('');
            } else {
                $variation->set_manage_stock(false);
            }

            $variation->set_weight(''); // weight (reseting)

            $variation->save(); // Save the data
        }

        /**
        * Save a new product attribute from his name (slug).
        *
        * @since 3.0.0
        * @param string $name  | The product attribute name (slug).
        * @param string $label | The product attribute label (name).
        */
        public function save_product_attribute_from_name( $name, $label='', $set=true ){

            global $wpdb;

            $label = $label == '' ? ucfirst($name) : $label;
            $attribute_id = $this->get_attribute_id_from_name( $name );

            if( empty($attribute_id) ){
                $attribute_id = NULL;
            } else {
                $set = false;
            }
            $args = array(
                'attribute_id'      => $attribute_id,
                'attribute_name'    => $name,
                'attribute_label'   => $label,
                'attribute_type'    => 'select',
                'attribute_orderby' => 'menu_order',
                'attribute_public'  => 0,
            );


            if( empty($attribute_id) ) {
                $wpdb->insert(  "{$wpdb->prefix}woocommerce_attribute_taxonomies", $args );
                set_transient( 'wc_attribute_taxonomies', false );
            }

            if( $set ){
                $attributes = wc_get_attribute_taxonomies();
                $args['attribute_id'] = $this->get_attribute_id_from_name( $name );
                $attributes[] = (object) $args;
                set_transient( 'wc_attribute_taxonomies', $attributes );
            } else {
                return;
            }
        }

        /**
        * Get the product attribute ID from the name.
        *
        * @since 3.0.0
        * @param string $name | The name (slug).
        */
        public function get_attribute_id_from_name( $name ){
            global $wpdb;
            $attribute_id = $wpdb->get_col("SELECT attribute_id
            FROM {$wpdb->prefix}woocommerce_attribute_taxonomies
            WHERE attribute_name LIKE '$name'");
            return reset($attribute_id);
        }

}

endif;
