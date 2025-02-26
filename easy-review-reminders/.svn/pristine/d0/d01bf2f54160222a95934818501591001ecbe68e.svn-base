<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class ERR_Bundled_Products {

    private static $_instance;

    public static function getInstance(){
        if(!self::$_instance instanceof self)
            self::$_instance = new self;
        return self::$_instance;
    }

    /**
     * Change the tr class of bundled items to allow their styling.
     *
     * @param string $classname
     * @param array $item
     * @param string $itemKey
     *
     * @return string
     * @since 1.1.0
     */
    public function errBundlesTableItemClass( $classname, $item, $itemKey ){

        if ( class_exists( 'WC_PB_Order' ) ){

            $wcPBOrder = WC_PB_Order::instance();

            return $wcPBOrder->html_order_item_class( $classname, $item );

        }

        return $classname;

    }

    /**
     * Check if the item is bundled parent.
     *
     * @param array $item
     *
     * @return bool
     * @since 1.1.0
     */
    public static function errCheckIfBundledParent( $item ){

        if( isset( $item[ 'item_meta' ][ '_bundled_items' ][ 0 ] ) && ! isset( $item[ 'item_meta' ][ '_bundled_by' ][ 0 ] ) &&
            ! isset( $item[ 'composite_item'] ) )
            return true;
        else
            return false;

    }
}