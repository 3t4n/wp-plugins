<?php
//default values, all the possibilities
$menusArr = array(
  array(
    'type'=>'page',
    'label' => 'Page',
    'tooltip' => 'All main admin pages affected',
  ),
  array(
    'type'=>'post',
    'label' => 'Post',
    'tooltip' => 'All main admin posts affected',

  ),
  array(
    'type'=>'post_type',
    'name'=>'default',
    'label' => 'Post Type',
    'tooltip' => 'Specific Custom post type',
  ),
  array(
    'type'=>'widget',
    'name'=>'defaultW',
    'label' => 'Widget',
    'tooltip' => 'Created a widget',
  ),
  array(
    'type'=>'customizer',
    'name'=>'custPanels',
    'label' => 'Customizer',
    'tooltip' => 'Manage custom Customizer panels',
  ),
  array(
    'type'=>'custom_page',
    'file_path'=>'custom_page_template.php',
    'label' => 'Custom Page Template',
    'tooltip' => 'Manage a specific Custom Page template',
  ),
  array(
    'type'=>'tax',
    'tax_name'=>'taxonomy_name',
    'label' => 'Taxonomy',
    'tooltip' => 'Manage a specific taxonomy',
  ),
  array(
    'type'=>'menu',
    'label' => 'Menu',
    'tooltip' => 'Manage a specific menu based on location',
  ),
);
echo json_encode($menusArr);
update_option();
