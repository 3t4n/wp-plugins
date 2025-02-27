<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class reviProductsModel
{
    var $REVI_API_URL;
    var $prefix;
    var $wpdb;

    public function __construct()
    {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->prefix = $this->wpdb->prefix;
        $this->REVI_API_URL = REVI_API_URL;
    }


    ///////////////////////////// REVI PRODUCTS ////////////////////

    public function getReviProduct($idProduct)
    {
        $sql = "SELECT * FROM revi_products WHERE id_product = '" . $idProduct . "'";
        $product = $this->wpdb->get_row($sql);

        if (isset($product->id_product)) {
            $product->avg_rating = round($product->avg_rating, 2);
            return $product;
        } else {
            $product = new StdClass();
            $product->id_product = $idProduct;
            $product->num_reviews = 0;
            $product->avg_rating = 0;
            return $product;
        }
    }

    public function addReviProduct($productData, $dateSent = null)
    {
        if (!$this->checkReviProductExist($productData['id_product'])) {
            return $this->insertReviProduct($productData, $dateSent);
        } else {
            return $this->updateReviProduct($productData, $dateSent);
        }
    }

    public function checkReviProductExist($idProduct)
    {
        $sql = "SELECT id_product FROM revi_products WHERE id_product = '" . $idProduct . "'";
        return $this->wpdb->get_var($sql);
    }

    public function insertReviProduct($productData, $dateSent)
    {
        if (empty($productData['num_reviews'])) {
            $productData['num_reviews'] = 0;
        }
        if (empty($productData['avg_rating'])) {
            $productData['avg_rating'] = 5;
        }

        $sql = "INSERT INTO `revi_products`(id_product, num_reviews, avg_rating, date_sent) VALUES ('" . $productData['id_product'] . "', '" . $productData['num_reviews'] . "', '" . $productData['avg_rating'] . "', '" . $dateSent . "')";
        $this->wpdb->query($sql);
    }

    public function updateReviProduct($productData, $dateSent)
    {
        if ($dateSent) {
            $sql = "UPDATE revi_products SET date_sent = '" . $dateSent . "'";
        } else {
            $sql = "UPDATE revi_products SET num_reviews = '" . $productData['num_reviews'] . "', avg_rating = '" . $productData['avg_rating'] . "'";
        }
        $sql .= " WHERE id_product = '" . $productData['id_product'] . "'";
        $this->wpdb->query($sql);
    }

    ///////////////////////////// PRODUCTS ////////////////////

    //Busca el main product de WPML
    public function get_id_main_product($idProduct)
    {
        if (function_exists('icl_object_id')) {
            $sql = "SELECT * FROM " . $this->wpdb->prefix . "icl_translations WHERE element_type LIKE 'post_product' AND element_id = '$idProduct'";
            $trid = $this->wpdb->get_row($sql);

            if (!empty($trid->trid)) {
                $sql = "SELECT * FROM " . $this->wpdb->prefix . "icl_translations WHERE trid = '$trid->trid' AND source_language_code IS NULL";
                $translation_group = $this->wpdb->get_row($sql);
            }

            if (!empty($translation_group->element_id)) {
                $idProduct = $translation_group->element_id;
            }
        }

        return $idProduct;
    }

    public function get_product_language($idProduct)
    {
        $lang = null;
        if (array_key_exists('wpml_post_language_details', $GLOBALS['wp_filter'])) {
            $language_data = apply_filters('wpml_post_language_details', null, $idProduct);

            if (isset($language_data['language_code'])) {
                $lang = $language_data['language_code'];
            }
        }

        if (!empty($lang) && strlen($lang) > 0) {
            $lang = reviParseLang($lang);
            return $lang;
        } else {
            return get_option('REVI_SELECTED_LANGUAGE');
        }
    }


    public function getProduct($idProduct, $id_lang)
    {
        //WORDPRESS DA FALLO DE BIG QUERYS A VECES, CON ESTO SE SOLUCIONA
        $this->wpdb->query('SET SQL_BIG_SELECTS = 1');

        $sql = "SELECT P.id_product, PL.name, P.price, P.ean13 as ean, PL.link_rewrite, PL.description, P.quantity as stock
            FROM " . $this->prefix . "product_lang PL
            LEFT JOIN " . $this->prefix . "product P ON P.id_product = PL.id_product
            WHERE PL.id_product = '" . $idProduct . "' 
            AND PL.id_lang = " . $id_lang . "";
        return $this->wpdb->get_row($sql);
    }

    /**
     * Obtiene los productos que no se han enviado a Revi.
     **/
    public function getNumProductsNotSent()
    {
        //WORDPRESS DA FALLO DE BIG QUERYS A VECES, CON ESTO SE SOLUCIONA
        $this->wpdb->query('SET SQL_BIG_SELECTS = 1');

        $sql = "SELECT COUNT(P.ID) as num_products 
        FROM " . $this->prefix . "posts P 
        WHERE P.ID NOT IN (SELECT RP.id_product FROM revi_products RP) 
        AND P.post_type = 'product'";

        return $this->wpdb->get_row($sql);
    }

    /**
     * Obtiene los productos que no se han enviado a Revi.
     **/
    public function getProductsNotSent($limit)
    {
        //WORDPRESS DA FALLO DE BIG QUERYS A VECES, CON ESTO SE SOLUCIONA
        $this->wpdb->query('SET SQL_BIG_SELECTS = 1');

        $sql = "SELECT P.ID as id_product, P.post_title as name, P.post_content as description,
        M1.meta_value as price, M2.meta_value as regular_price, M3.meta_value as sku, 
        M4.meta_value as stock
        FROM " . $this->prefix . "posts P 
        LEFT JOIN " . $this->prefix . "postmeta M1 ON M1.post_id = P.ID AND M1.meta_key = '_sale_price'
        LEFT JOIN " . $this->prefix . "postmeta M2 ON M2.post_id = P.ID AND M2.meta_key = '_regular_price'
        LEFT JOIN " . $this->prefix . "postmeta M3 ON M3.post_id = P.ID AND M3.meta_key = '_sku'
        LEFT JOIN " . $this->prefix . "postmeta M4 ON M4.post_id = P.ID AND M4.meta_key = '_stock'
        WHERE P.ID NOT IN (SELECT RP.id_product FROM revi_products RP) 
        AND P.post_type = 'product'
        LIMIT $limit";

        return $this->wpdb->get_results($sql);
    }

    /**
     * Obtiene los productos que se han actualizado tras haberlos sincronizado con Revi.
     **/
    public function getNumProductsUpdated()
    {
        //WORDPRESS DA FALLO DE BIG QUERYS A VECES, CON ESTO SE SOLUCIONA
        $this->wpdb->query('SET SQL_BIG_SELECTS = 1');

        $sql = "SELECT COUNT(P.ID) as num_products 
        FROM " . $this->prefix . "posts P 
        LEFT JOIN revi_products RP ON RP.id_product = P.ID
        WHERE P.post_type = 'product' 
        AND P.post_modified_gmt > RP.date_sent";

        return $this->wpdb->get_row($sql);
    }

    /**
     * Obtiene los productos que se han actualizado tras haberlos sincronizado con Revi.
     **/
    public function getProductsUpdated($limit)
    {
        //WORDPRESS DA FALLO DE BIG QUERYS A VECES, CON ESTO SE SOLUCIONA
        $this->wpdb->query('SET SQL_BIG_SELECTS = 1');

        $sql = "SELECT P.ID as id_product, P.post_title as name, P.post_content as description,
        M1.meta_value as price, M2.meta_value as regular_price, M3.meta_value as sku, 
        M4.meta_value as stock
        FROM " . $this->prefix . "posts P 
        LEFT JOIN revi_products RP ON RP.id_product = P.ID
        LEFT JOIN " . $this->prefix . "postmeta M1 ON M1.post_id = P.ID AND M1.meta_key = '_sale_price'
        LEFT JOIN " . $this->prefix . "postmeta M2 ON M2.post_id = P.ID AND M2.meta_key = '_regular_price'
        LEFT JOIN " . $this->prefix . "postmeta M3 ON M3.post_id = P.ID AND M3.meta_key = '_sku'
        LEFT JOIN " . $this->prefix . "postmeta M4 ON M4.post_id = P.ID AND M4.meta_key = '_stock'
        WHERE P.post_type = 'product' 
        AND P.post_modified_gmt > RP.date_sent
        LIMIT $limit";

        return $this->wpdb->get_results($sql);
    }

    /**
     * Num products left
     **/
    public function getNumProductsLeft()
    {
        $num_products_not_sent = $this->getNumProductsNotSent();
        $num_products_not_updated = $this->getNumProductsUpdated();

        return $num_products_not_sent->num_products + $num_products_not_updated->num_products;
    }

    /**
     * Obtener todos los productos para sincronizar con Revi
     **/
    public function getProductsToSend($limit = 20)
    {
        $result = array();

        $productsNotSent = $this->getProductsNotSent($limit);
        $productsUpdated = $this->getProductsUpdated($limit);

        if (!empty($productsNotSent)) {
            $result = array_merge($result, $productsNotSent);
        }

        if (!empty($productsUpdated)) {
            $result = array_merge($result, $productsUpdated);
        }

        $products = array();
        foreach ($result as $product) {
            $products[] = $this->parseProduct($product);
        }

        return $products;
    }

    private function parseProduct($product)
    {
        $wc_product = wc_get_product($product->id_product);
        if (empty($wc_product)) {
            return [];
        }

        $aux_product = (array)$product;

        $aux_product['iso_code'] = $this->get_product_language($product->id_product);

        // $aux_product['url'] = get_permalink($product->id_product);
        $aux_product['url'] = $wc_product->get_permalink();

        $image_array = wp_get_attachment_image_src(get_post_thumbnail_id($product->id_product), 'full');
        $aux_product['image_url'] = (!empty($image_array[0])) ? $image_array[0] : '';

        $aux_product['ean'] = $this->getCombinationMetaValue($product->id_product, 'gtin', $product, null);
        $aux_product['brand'] = $this->getCombinationMetaValue($product->id_product, 'brand', $product, null);

        if (method_exists($wc_product, 'get_available_variations')) {
            $variations = $wc_product->get_available_variations();

            $combinations = [];
            foreach ($variations as $key => $variation) {
                if (isset($variation['variation_is_active']) && $variation['variation_is_active']) {

                    $combination = [];
                    $combination['id_external_product_combination'] = $variation['variation_id'];
                    $combination['sku'] = $this->getCombinationMetaValue($variation['variation_id'], 'sku', $product, $variation);
                    $combination['brand'] = $this->getCombinationMetaValue($variation['variation_id'], 'brand', $product, $variation);
                    $combination['ean'] = $this->getCombinationMetaValue($variation['variation_id'], 'gtin', $product, $variation);

                    $combination['image_url'] = '';
                    if (isset($variation['image']) && !empty($variation['image'])) {
                        if (isset($variation['image']['url']) && !empty($variation['image']['url'])) {
                            $combination['image_url'] = $variation['image']['url'];
                        }
                    }
                    array_push($combinations, $combination);
                }
            }
            $aux_product['combinations'] = $combinations;
        }

        //Cambiamos el ID del producto por el del producto principal, no los IDS traducidos
        $aux_product['id_external_product'] = $this->get_id_main_product($product->id_product);
        $aux_product['id_product_parent'] = $product->id_product;

        return $aux_product;
    }


    function getCombinationMetaValue($idProduct, $metaKeyName, $product, $variation)
    {
        if (isset($variation["{$metaKeyName}"]) && !empty($variation["{$metaKeyName}"]) && strlen($variation["{$metaKeyName}"]) > 0) {
            return $variation["{$metaKeyName}"];
        }

        if (!empty($product->{$metaKeyName}) && strlen($product->{$metaKeyName}) > 0) {
            return $product->{$metaKeyName};
        }

        $yith_name = $this->getYithProductMetaData($idProduct, $metaKeyName);
        if (!empty($yith_name) && strlen($yith_name) > 0) {
            return $yith_name;
        }

        if ($metaKeyName == 'brand') {
            $constant = PRODUCT_BRAND;
            $capital_name = 'BRAND';
        } else if ($metaKeyName == 'gtin') {
            $constant = PRODUCT_EAN;
            $capital_name = 'EAN';
        }

        if (!empty($constant)) {
            $wc_product = wc_get_product($idProduct);

            foreach ($constant as $possible_meta_name) {
                if (strlen($wc_product->get_attribute($possible_meta_name))) {
                    return $wc_product->get_attribute($possible_meta_name);
                } else if (strlen(get_post_meta($idProduct, $possible_meta_name, true))) {
                    return get_post_meta($idProduct, $possible_meta_name, true);
                } else if (strlen($wc_product->get_meta($possible_meta_name))) { // PLUGIN Product GTIN (EAN, UPC, ISBN) for WooCommerce
                    return $wc_product->get_meta($possible_meta_name);
                } else {
                    $terms = wp_get_post_terms($wc_product->get_id(), $possible_meta_name);
                    $terms = reset($terms);
                    if (!empty($terms->name) && strlen($terms->name) > 0) {
                        return $terms->name;
                    }
                }
            }

            // Algunas tiendas utilizan numeraciones raras, tipo EAN-1 EAN-55, EAN-200, etc
            for ($i = 0; $i < 200; $i++) {
                if (strlen($wc_product->get_attribute("$capital_name-" . $i))) {
                    return $wc_product->get_attribute("$capital_name-" . $i);
                } else if (strlen($wc_product->get_attribute("$capital_name-" . $i))) {
                    return $wc_product->get_attribute("$capital_name-" . $i);
                }
            }
        }

        return '';
    }

    function getYithProductMetaData($idProduct, $meta_key)
    {
        $sql = "SELECT meta_value FROM " . $this->prefix . "postmeta WHERE post_id = '" . $idProduct . "' AND meta_key = 'yith_wcgpf_product_feed_configuration'";
        $data_value = $this->wpdb->get_results($sql);

        if (!empty($data_value)) {
            $unserialized_data = unserialize($data_value[0]->meta_value);

            if (!empty($unserialized_data[$meta_key])) {
                return $unserialized_data[$meta_key];
            }
        }

        return '';
    }
}
