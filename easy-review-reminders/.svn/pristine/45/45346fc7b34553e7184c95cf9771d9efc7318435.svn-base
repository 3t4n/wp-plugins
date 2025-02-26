<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class ERR_Composite_Products {

    private static $_instance;

    public static function getInstance(){
        if(!self::$_instance instanceof self)
            self::$_instance = new self;
        return self::$_instance;
    }

    /**
     * Changes the tr class of composited items in all templates to allow their styling.
     *
     * @param string $classname
     * @param array $item
     * @param string $itemKey
     *
     * @return string
     * @since 1.1.0
     */
    public function errCompositeTableItemClass( $classname, $item, $itemKey ) {

        if ( class_exists( 'WC_CP_Order' ) ){

            $wcCPOrder = WC_CP_Order::instance();
            return $wcCPOrder->html_order_item_class( $classname, $item );

        }

        return $classname;
    }

    /**
     * Check if the item is a composite parent.
     *
     * @param array $item
     *
     * @return boolean
     * @since 1.1.0
     */
    public static function errCheckIfCompositeParent( $item ){
        
        if( isset( $item[ 'item_meta' ][ '_composite_children' ][ 0 ] ) && ! isset( $item[ 'item_meta' ][ '_composite_parent' ][ 0 ] ) )
            return true;
        else 
            return false;

    }
}
