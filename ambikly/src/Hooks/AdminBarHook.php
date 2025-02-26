<?php

namespace Ambikly\Hooks;

use Ambikly\Controllers\OrderController;
use Ambikly\Controllers\PaymentController;
use Ambikly\Models\Category;
use Ambikly\Models\Product;

class AdminBarHook
{
    public function __construct()
    {
        add_action('admin_bar_menu', array($this, 'admin_bar_menus'), 99);


    }

    public function admin_bar_menus($wp_admin_bar)
    {

        if (!is_admin_bar_showing()) {
            return;
        }


        if (!is_user_member_of_blog() && !is_super_admin()) {
            return;
        }

        global $ambikly_product;

        global $ambikly_category;

        if ($ambikly_product instanceof Product) {

            $product_id = $ambikly_product->getID();

            if ($product_id < 1) {

                return;
            }


            $wp_admin_bar->add_node([
                'id' => 'add-product',
                'title' => esc_html__('Product', 'ambikly'),
                'href' => ambikly_get_add_link(),
                'parent' => 'new-content',

            ]);

            $wp_admin_bar->add_node([
                'id' => 'edit',
                'title' => esc_html__('Edit Product', 'ambikly'),
                'href' => ambikly_get_edit_link($product_id),
                'parent' => false,

            ]);
        } else if ($ambikly_category instanceof Category) {

            $category_id = $ambikly_category->getID();

            if ($category_id < 1) {
                return;
            }

            $wp_admin_bar->add_node([
                'id' => 'add-category',
                'title' => esc_html__('Product Category', 'ambikly'),
                'href' => ambikly_get_add_link('category'),
                'parent' => 'new-content',

            ]);

            $wp_admin_bar->add_node([
                'id' => 'edit',
                'title' => esc_html__('Edit Product Category', 'ambikly'),
                'href' => ambikly_get_edit_link($category_id, 'category'),
                'parent' => false,

            ]);
        }

    }


}