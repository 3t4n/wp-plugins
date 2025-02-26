<?php

/**
* Save recipe post.
*
*@package AwesomeRecipePlugin
*/



// Creates the exterpt field required for Recipe post type

function arpcpt_mandatory_excerpt($data) {

  // If the post type is Recipe
  if ( 'arpcpt_recipe' == $data['post_type'] ) { 
     
  $excerpt = $data['post_excerpt'];

  if (empty($excerpt)) { // If excerpt field is empty

      // Check if the data is not drafed and trashed
      if ( ( $data['post_status'] != 'draft' ) && ( $data['post_status'] != 'trash' ) ){

        $data['post_status'] = 'draft';

        // Add filter to redirect error location
      add_filter('redirect_post_location', 'arpcpt_excerpt_error_message_redirect', '99'); 
        
      }
    }
  }
 
  return $data;
}

add_filter('wp_insert_post_data', 'arpcpt_mandatory_excerpt'); // Check exerpt field exists or not



// Redirect to error location

function arpcpt_excerpt_error_message_redirect($location) {

  $location = str_replace('&message=6', '', $location);

  return add_query_arg('excerpt_required', 1, $location); 

}

// Display error notice

function arpcpt_excerpt_admin_notice() {

  if (!isset($_GET['excerpt_required'])) return;

  switch (absint($_GET['excerpt_required'])) {

    case 1:

      $message = 'Excerpt field is empty! Excerpt is required to publish your recipe post.';

      break;

    default:

      $message = 'Unexpected error';
  }

  echo '<div id="notice" class="error"><p>' . $message . '</p></div>';

}


add_action('admin_notices', 'arpcpt_excerpt_admin_notice');
















// Save post

function arpcpt_awesome_recipe_save_post_admin( $post_id, $post, $update ){


  // If it is a new post then do not update.

  if( !$update ){
    return;
  }


  // Do security check

    if ( ! isset( $_POST['arpcpt_awesome_recipe_inputNonce'] ) ) {
        return;
    }

    if ( ! wp_verify_nonce( $_POST['arpcpt_awesome_recipe_inputNonce'], 'arpcpt_awesome_recipe_save_post_admin' ) ) {
        return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    // Check the user's permissions.
    if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return;
        }

    } else {

        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    }


// Checking if the field has value

if (isset($_POST['arpcpt_awesome_recipe_inputTime'])) {
     
  // sanitizing custom input fields
  
  $arpcpt_awesome_recipe_input_data = array(); // Creating an array to hold user input data.
     
  // If the input fields has value then sanittize it and assign it to corresponding array index

  $arpcpt_awesome_recipe_input_data['arpcpt_time'] = sanitize_text_field( $_POST['arpcpt_awesome_recipe_inputTime'] );
  $arpcpt_awesome_recipe_input_data['arpcpt_level'] = sanitize_text_field( $_POST['arpcpt_awesome_recipe_inputLevel'] );
  $arpcpt_awesome_recipe_input_data['arpcpt_course'] = sanitize_text_field( $_POST['arpcpt_awesome_recipe_inputCourse'] );
  $arpcpt_awesome_recipe_input_data['arpcpt_cuisine'] = sanitize_text_field( $_POST['arpcpt_awesome_recipe_inputCuisine'] );
  $arpcpt_awesome_recipe_input_data['arpcpt_serving'] = sanitize_text_field( $_POST['arpcpt_awesome_recipe_inputServing'] );
  $arpcpt_awesome_recipe_input_data['arpcpt_rating'] = 0;
  $arpcpt_awesome_recipe_input_data['arpcpt_rating_count'] = 0;
  
  // Validate field

  $arpcpt_awesome_recipe_input_data['arpcpt_serving'] = intval( $_POST['arpcpt_awesome_recipe_inputServing'] );

  if ( ! $arpcpt_awesome_recipe_input_data['arpcpt_serving'] ) {
  $arpcpt_awesome_recipe_input_data['arpcpt_serving'] = 0;
  }

  // if the post exists then update otherwise create a new post.

  update_post_meta( $post_id, 'arpcpt_awesome_recipe_input_data', $arpcpt_awesome_recipe_input_data );
}

 
  





  // Following code saves dynamic field data (Ingredients)

  if( $update ){ // if user updates the post
    
    if(isset($_POST['arpcpt_awesome_recipe_dynamic_input_data'])) {

      // Sanitizing data

       $arpcpt_awesome_recipe_dynamic_input_data =  $_POST['arpcpt_awesome_recipe_dynamic_input_data'];

        // Creating a new array to store sanitized values

        $arpcpt_awesome_recipe_dynamic_sanitized_data = array();
        $i = 1;
        foreach ($arpcpt_awesome_recipe_dynamic_input_data as $arpcpt_value) {
           $arpcpt_awesome_recipe_dynamic_sanitized_data[$i]= sanitize_text_field( $arpcpt_value );
          $i++;
        }

          // $post_id, $meta_key, $meta_value

          update_post_meta( $post_id, 'arpcpt_awesome_recipe_dynamic_input_data',  $arpcpt_awesome_recipe_dynamic_sanitized_data );
      }
  }else{ // if user creates new post

  if(isset($_POST['arpcpt_awesome_recipe_dynamic_input_data'])) {

    // Sanitizing data

      $arpcpt_awesome_recipe_dynamic_input_data =  $_POST['arpcpt_awesome_recipe_dynamic_input_data'];

        // Creating a new array to store sanitized values

        $arpcpt_awesome_recipe_dynamic_sanitized_data = array();
        $i = 1;
        foreach ($arpcpt_awesome_recipe_dynamic_input_data as $arpcpt_value) {
           $arpcpt_awesome_recipe_dynamic_sanitized_data[$i]= sanitize_text_field( $arpcpt_value );
          $i++;
        }

        // $post_id, $meta_key, $meta_value

        add_post_meta( $post_id, 'arpcpt_awesome_recipe_dynamic_input_data',  $arpcpt_awesome_recipe_dynamic_sanitized_data  );
    }

  }    







// Save TinyMCE data
  
$arpcpt_awesome_recipe_instruction = $_POST['arpcpt_awesome_recipe_instruction'];

update_post_meta( $post_id, 'arpcpt_awesome_recipe_instruction', $arpcpt_awesome_recipe_instruction);







  // Following code saves dynamic field data (Nutritions)

  if( $update ){ // if user updates the post
    
    if(isset($_POST['arpcpt_awesome_recipe_dynamic_input_data_nutrition'])) {


      // Sanitizing data

      $arpcpt_awesome_recipe_dynamic_input_data_nutrition =  $_POST['arpcpt_awesome_recipe_dynamic_input_data_nutrition'];

        // Creating a new array to store sanitized values

        $arpcpt_awesome_recipe_dynamic_sanitized_data_nutrition = array();
        $i = 1;
        foreach ($arpcpt_awesome_recipe_dynamic_input_data_nutrition as $arpcpt_value_nutrition) {
           $arpcpt_awesome_recipe_dynamic_sanitized_data_nutrition[$i]= sanitize_text_field( $arpcpt_value_nutrition );
          $i++;
        }



          // $post_id, $meta_key, $meta_value

          update_post_meta( $post_id, 'arpcpt_awesome_recipe_dynamic_input_data_nutrition', $arpcpt_awesome_recipe_dynamic_sanitized_data_nutrition );
      }
  }else{ // if user creates new post

  if(isset($_POST['arpcpt_awesome_recipe_dynamic_input_data_nutrition'])) {



      // Sanitizing data

      $arpcpt_awesome_recipe_dynamic_input_data_nutrition =  $_POST['arpcpt_awesome_recipe_dynamic_input_data_nutrition'];

        // Creating a new array to store sanitized values

        $arpcpt_awesome_recipe_dynamic_sanitized_data_nutrition = array();
        $i = 1;
        foreach ($arpcpt_awesome_recipe_dynamic_input_data_nutrition as $arpcpt_value_nutrition) {
           $arpcpt_awesome_recipe_dynamic_sanitized_data_nutrition[$i]= sanitize_text_field( $arpcpt_value_nutrition );
          $i++;
        }

      
        // $post_id, $meta_key, $meta_value
        
        add_post_meta( $post_id, 'arpcpt_awesome_recipe_dynamic_input_data_nutrition', $arpcpt_awesome_recipe_dynamic_sanitized_data_nutrition );
    }

  }    

  
}