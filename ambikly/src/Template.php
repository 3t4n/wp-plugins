<?php

namespace Ambikly;

use Ambikly\Models\Category;
use Ambikly\Models\Product;
use Ambikly\Models\Products;
use Ambikly\Repository\ProductRepository;

class Template
{
    protected $current_title = '';

    public function __construct()
    {

        add_filter('query_vars', array($this, 'add_query_vars'), 10);
        add_filter('template_include', array($this, 'template_include'), 1000, 1);
        add_action('init', array($this, 'session_start'), 1);
        add_filter('document_title_parts', array($this, 'set_custom_title'), 1000);
        add_filter('the_content', array($this, 'shop_page'));


    }

    public function session_start()
    {
        $session = ambikly()->getClass('Session');
        $session->init();
    }

    public function add_query_vars($vars)
    {

        $vars[] = 'ambikly_type';

        return $vars;
    }

    public function template_include($template)
    {

        global $wp_query;

        $slug = get_query_var('name');

        if (ambikly_is_page(Constants::AMBIKLY_PRODUCT_TYPE)) {

            $slug = sanitize_text_field($slug);
            /**
             * @var Product $product_model
             */
            $product_model = ambikly()->getClass('Models.Product');

            $product_model->setProduct($slug, 'slug', true);

            if ($product_model->getID() < 1) {

                return $template;
            }
            $this->current_title = $product_model->getProductName();

            $wp_query->is_404 = false;

            status_header(200);

            return ambikly_locate_template('product.php');

        } elseif (ambikly_is_page(Constants::AMBIKLY_CATEGORY_TYPE)) {


            $slug = sanitize_text_field($slug);
            /**
             * @var Category $model
             */
            $model = ambikly()->getClass('Models.Category');

            $model->setCategory($slug, 'slug', true);

            if ($model->getID() < 1 || !$model->hasProducts()) {

                return $template;
            }

            $this->current_title = $model->getCategoryName();

            $wp_query->is_404 = false;

            status_header(200);

            return ambikly_locate_template('category.php');

        }


        return $template;


    }

    public function set_custom_title($title_parts)
    {
        if (!empty($this->current_title)) {
            $title_parts['title'] = sanitize_text_field($this->current_title);
        }
        return $title_parts;
    }

    public function shop_page($content)
    {
        if (get_the_ID() != ambikly_get_shop_page()) {

            return $content;
        }

        /**
         * @var Products $model
         */
        $model = ambikly()->getClass('Models.Products');

        $model->setProducts(true);

        if (!$model->hasProducts()) {

            return $content;
        }

        ob_start();

        echo $content;

        ambikly_get_template('shop.php');

        return ob_get_clean();

    }
}