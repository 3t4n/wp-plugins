<?php

class collapsingCategoryListAPF_CreatePage extends collapsingCategoryList_AdminPageFramework {

  public function setUp() {
    
    // Create the root menu - specifies to which parent menu to add
    $this->setRootMenuPage( 'Settings' );
    
    // Add the sub menus and the pages.
    $this->addSubMenuItems(
            array(
              'title' => __( 'Collapsing category list' ), // page and menu title
              'page_slug' => 'collapsing_category_list_admin_page' // page slug
            )
    );
  }
  
  public function do_collapsing_category_list_admin_page() {
    ?>
      <h2><?php __( 'Collapsing category list' ); ?></h2>
    <?php
  }
  
  public function load_collapsing_category_list_admin_page() {
    $this->addSettingFields(
            array(
              'field_id' => 'limit_categories_selected',
              'type' => 'checkbox',
              'title' => __('Limit the selection of categories and subcategories when creating or editing a post:'),
            ),
            array(
              'field_id' => 'section_limit_categories_selected',
              'content' => array (
                array(
                  'field_id' => 'num_categories_selected',
                  'type' => 'text',
                  'title' => __('Number of selectable categories:'),
                ),
                array(
                  'field_id' => 'num_subcategories_selected',
                  'type' => 'text',
                  'title' => __('Number of selectable subcategories:'),
                ), 
                array(
                  'field_id' => 'add_more_levels',
                  'type' => 'checkbox',
                  'title' => __('Add more levels of subcategories'),
                ),
                array(
                  'field_id' => 'section_more_levels',
                  'type' => 'inline_mixed',
                  'repeatable' => true,
                  'content' => array (
                    array(
                      'field_id' => 'level',
                      'type' => 'text',
                      'title' => __('Level'),
                    ),
                    array(
                      'field_id' => 'num_subcats',
                      'type' => 'text',
                      'title' => __('Number of subcategories'),
                    ),
                  ),
                )
              ),
            ),
            array(
              'field_id' => 'submit_button',
              'type' => 'submit',
            )
    );
  }
}

new collapsingCategoryListAPF_CreatePage;

