<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://github.com/mrakisp
 * @since      1.0.0
 *
 * @package    Aatsc
 * @subpackage Aatsc/admin/partials
 */


?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<?php 
	$text = get_option( 'sale_category_selected' );
    $args = array(
        'order'      => 'ASC',
        'hide_empty' => false,
    );
    $product_categories = get_terms( 'product_cat', $args );
    echo ' <form method="post" action="options.php"><select id="sale_category_selected" name="sale_category_selected">';

    foreach( $product_categories as $category ){
        if($text == $category->term_id){
            echo "<option selected value = '" . esc_attr( $category->term_id ) . "'>" . esc_html( $category->name ) . "</option>";
        }else{
            echo "<option value = '" . esc_attr( $category->term_id ) . "'>" . esc_html( $category->name ) . "</option>";
        }
        
    }
    echo '</select>';
    // printf(
    //     '<input type="text" id="sale_category_selected1" name="sale_category_selected1" value="%s" />',
    //     esc_attr( $text )
    // );
?>