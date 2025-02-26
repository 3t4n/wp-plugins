<?php

namespace Custom_WP_Framework\Includes\Core\Custom_Post_Types;

// Exit if accessed directly.
if ( ! defined ( 'ABSPATH' ) ) { 
	exit(); 
} 

/**
 * Additional labels for the custom post type. 
 * 
 * @since   1.0.0
 */
class CWF_CPT_Labels {

    /**
     * Plural name of post type.
     * 
     * @since   1.0.0
     * @var     string      $name 
     */
    public $name;

    /**
     * Singular name of post type.
     * 
     * @since   1.0.0
     * @var     string      $singular_name
     */
    public $singular_name;

    /**
     * Add new label of post type.
     * 
     * @since   1.0.0
     * @var     string      $add_new
     */
    public $add_new;

    /**
     * Add new item label of post type.
     * 
     * @since   1.0.0
     * @var     string      $add_new_item
     */
    public $add_new_item;

    /**
     * Edit item label of post type.
     * 
     * @since   1.0.0
     * @var     string      $edit_item
     */
    public $edit_item;

    /**
     * New item label of post type.
     * 
     * @since   1.0.0
     * @var     string      $new_item
     */
    public $new_item;

    /**
     * View item label of post type.
     * 
     * @since   1.0.0
     * @var     string      $view_item
     */
    public $view_item;

    /**
     * View items label of post type.
     * 
     * @since   1.0.0
     * @var     string      $view_items
     */
    public $view_items;

    /**
     * Search items label of post type.
     * 
     * @since   1.0.0
     * @var     string      $search_items
     */
    public $search_items;

    /**
     * Not found label of post type.
     * 
     * @since   1.0.0
     * @var     string      $not_found
     */
    public $not_found;

    /**
     * Not found in trash label of post type.
     * 
     * @since   1.0.0
     * @var     string      $not_found_in_trash
     */
    public $not_found_in_trash;

    /**
     * Parent item colon label of post type.
     * 
     * @since   1.0.0
     * @var     string      $parent_item_colon
     */
    public $parent_item_colon;

    /**
     * All items label of post type.
     * 
     * @since   1.0.0
     * @var     string      $all_items
     */
    public $all_items;

    /**
     * Archives label of post type.
     * 
     * @since   1.0.0
     * @var     string      $archives
     */
    public $archives;

    /**
     * Attributes label of post type.
     * 
     * @since   1.0.0
     * @var     string      $attributes
     */
    public $attributes;

    /**
     * Insert into item label of post type.
     * 
     * @since   1.0.0
     * @var     string      $insert_into_item
     */
    public $insert_into_item;

    /**
     * Uploaded to this item label of post type.
     * 
     * @since   1.0.0
     * @var     string      $uploaded_to_this_item
     */
    public $uploaded_to_this_item;

    /**
     * Featured image label of post type.
     * 
     * @since   1.0.0
     * @var     string      $featured_image
     */
    public $featured_image;

    /**
     * Set featured image label of post type.
     * 
     * @since   1.0.0
     * @var     string      $set_featured_image
     */
    public $set_featured_image;

    /**
     * Remove featured image label of post type.
     * 
     * @since   1.0.0
     * @var     string      $remove_featured_image
     */
    public $remove_featured_image;

    /**
     * Use featured image label of post type.
     * 
     * @since   1.0.0
     * @var     string      $use_featured_image
     */
    public $use_featured_image;

    /**
     * Menu name label of the post type.
     * 
     * @since   1.0.0
     * @var     string      $menu_name
     */
    public $menu_name;

    /**
     * Filter items list label of the post type.
     * 
     * @since   1.0.0
     * @var     string      $filter_items_list
     */
    public $filter_items_list;

    /**
     * Items list navigation label of the post type.
     * 
     * @since   1.0.0
     * @var     string      $items_list_navigation
     */
    public $items_list_navigation;

    /**
     * Items list label of the post type.
     * 
     * @since   1.0.0
     * @var     string      $items_list
     */
    public $items_list;

    /**
     * Item published label of the post type.
     * 
     * @since   1.0.0
     * @var     string      $item_published
     */
    public $item_published;

    /**
     * Item published privately label of the post type.
     * 
     * @since   1.0.0
     * @var     string      $item_published_privately
     */
    public $item_published_privately;

    /**
     * Item reverted to draft label of the post type.
     * 
     * @since   1.0.0
     * @var     string      $item_reverted_to_draft
     */
    public $item_reverted_to_draft;

    /**
     * Item scheduled label of the post type.
     * 
     * @since   1.0.0
     * @var     string      $item_scheduled
     */
    public $item_scheduled;

    /**
     * Item updated label of the post type.
     */
    public $item_updated;

    /**
     * Default constructor method.
     * 
     * @since   1.0.0
     * @param   void
     * @return  void
     */
    public function __construct() {

        /**
         * Initialise plural name label variable and set to null.
         */
        $this->name = null;

        /**
         * Initialise singular name label variable and set to null.
         */
        $this->singular_name = null;

        /**
         * Initialise add new label variable and set default value to 'Add New'.
         */
        $this->add_new = 'Add New';

        /**
         * Initialise add new item label variable and set to null.
         */
        $this->add_new_item = null;

        /**
         * Initialise edit item label variable and set to null.
         */
        $this->edit_item = null;

        /**
         * Initialise new item label variable and set to null.
         */
        $this->new_item = null;

        /**
         * Initialise view item label variable and set to null.
         */
        $this->view_item = null;

        /**
         * Initialise view items label variable and set to null.
         */
        $this->view_items = null;

        /**
         * Initialise search items label variable and set to null.
         */
        $this->search_items = null;

        /**
         * Initialise not found items label variable and set to null.
         */
        $this->not_found = null;

        /**
         * Initialise not found in trash label variable and set to null.
         */
        $this->not_found_in_trash = null;

        /**
         * Initialise parent item colon label variable and set to null.
         */
        $this->parent_item_colon = null;

        /**
         * Initialise all items label variable and set to null.
         */
        $this->all_items = null;

        /**
         * Initialise archives label variable and set to null.
         */
        $this->archives = null;

        /**
         * Initialise attributes label variable and set to null.
         */
        $this->attributes = null;

        /**
         * Initialise insert into item label variable and set to null.
         */
        $this->insert_into_item = null;

        /**
         * Initialise uploaded to this item label variable and set to null.
         */
        $this->uploaded_to_this_item = null;

        /**
         * Initialise featured image label variable and set to null.
         */
        $this->featured_image = null;

        /**
         * Initialise set featured image label variable and set to null.
         */
        $this->set_featured_image = null;

        /**
         * Initialise remove featured image label variable and set to null.
         */
        $this->remove_featured_image = null;

        /**
         * Initialise use featured image label variable and set to null.
         */
        $this->use_featured_image = null;

        /**
         * Initialise menu name label variable and set to null.
         */
        $this->menu_name = null;

        /**
         * Initialise filter items list label variable and set to null. 
         */
        $this->filter_items_list = null;

        /**
         * Initialise items list navigation label variable and set to null. 
         */
        $this->items_list_navigation = null;

        /**
         * Initialise items list label variable and set to null. 
         */
        $this->items_list = null;

        /**
         * Initialise item published list label variable and set to null.
         */
        $this->item_published = null;

        /**
         * Initialise item published privately list label variable and set to null.
         */
        $this->item_published_privately = null;

        /**
         * Initialise item reverted to draft label variable and set to null.
         */
        $this->item_reverted_to_draft = null;

        /**
         * Initialise item scheduled label variable and set to null.
         */
        $this->item_scheduled = null;

        /**
         * Initialise item updated label variable and set to null. 
         */
        $this->item_updated = null;
    }

}