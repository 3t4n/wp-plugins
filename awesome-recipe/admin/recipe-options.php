<?php

/**
* Creating meta box
*
*@package AwesomeRecipePlugin
*/

function arpcpt_awesome_recipe_options( $post ){

	$arpcpt_awesome_recipe_input_data = get_post_meta( $post->ID, 'arpcpt_awesome_recipe_input_data', true ); // Getting post data to dispay user input values to custom fields.
    $arpcpt_awesome_recipe_dynamic_input_data =   get_post_meta($post->ID, 'arpcpt_awesome_recipe_dynamic_input_data', true); // For dynamic fields (ingredients)

	// If $awesome_recipe_input_data is empty then display empty fields
	if( empty($arpcpt_awesome_recipe_input_data) ){
		$arpcpt_awesome_recipe_input_data = array(
			'arpcpt_time' => '',
			'arpcpt_lebel' => 'Select',
            'arpcpt_course' => '',
            'arpcpt_cuisine' => '',
            'arpcpt_serving' => ''
		);
	}
    
    $arpcpt_awesome_recipe_dynamic_input_data_nutrition = get_post_meta($post->ID, 'arpcpt_awesome_recipe_dynamic_input_data_nutrition', true); // For dynamic fields (ingredients)

    // Check if arry key exists or not (otherwise dispays notice inside input field)
    if (array_key_exists('arpcpt_course', $arpcpt_awesome_recipe_input_data)){ // check if the field is empty or not

    }else{
    $arpcpt_awesome_recipe_input_data['arpcpt_cuisine'] = '';
    $arpcpt_awesome_recipe_input_data['arpcpt_course'] = '';
    }


?>

<!-- Nonce -->
<?php 
$arpcpt_awesome_recipe_input_data_nonce = wp_create_nonce('arpcpt_awesome_recipe_save_post_admin');
?>
<input type="hidden" class="form-control" name="arpcpt_awesome_recipe_inputNonce" value="<?php echo $arpcpt_awesome_recipe_input_data_nonce; ?>">

<!-- START Admin Input Form-->

<!-- People Serve -->
<br>
<div class="form-group">
    <label>Persons Serving</label>
    <input type="number" class="form-control" name="arpcpt_awesome_recipe_inputServing" value="<?php echo esc_html ( $arpcpt_awesome_recipe_input_data['arpcpt_serving'] ); ?>" placeholder="e.g. 2" >
</div>
<!-- END People Serve -->


<!-- Course -->
<br>
<div class="form-group">
    <label>Course</label>
    <input type="text" class="form-control" name="arpcpt_awesome_recipe_inputCourse" value="<?php echo esc_html ( $arpcpt_awesome_recipe_input_data['arpcpt_course'] ); ?>" placeholder="e.g. Appetizers">
</div>
<!-- END Course -->


<!-- Cuisine -->
<br>
<div class="form-group">
    <label>Cuisine</label>
    <input type="text" class="form-control" name="arpcpt_awesome_recipe_inputCuisine" value="<?php echo esc_html ( $arpcpt_awesome_recipe_input_data['arpcpt_cuisine'] ); ?>" placeholder="e.g. Italian">
</div>
<!-- END Cuisine -->


<!-- Skill Level-->
<br>
<div class="form-group">
    <label>Skill level</label>
    <select class="form-control" name="arpcpt_awesome_recipe_inputLevel">
		
        <option value="Select">Select</option>
       

        <option value="Beginner" 

          <?php 
          if (array_key_exists('arpcpt_level', $arpcpt_awesome_recipe_input_data)) { // checks if array key exists
                if ($arpcpt_awesome_recipe_input_data['arpcpt_level']=="Beginner"){ // check if it matches with array index data or not
                echo "SELECTED";  
                }
            }
          ?>


        >Beginner</option>


        <option value="Intermediate" 

          <?php  
          if (array_key_exists('arpcpt_level', $arpcpt_awesome_recipe_input_data)) {
                if ($arpcpt_awesome_recipe_input_data['arpcpt_level']=="Intermediate"){
                    echo "SELECTED";  
                }
            }
         ?>

         >Intermediate</option>


         <option value="Expert"

         <?php 
            if (array_key_exists('arpcpt_level', $arpcpt_awesome_recipe_input_data)) {
                if ($arpcpt_awesome_recipe_input_data['arpcpt_level']=="Expert"){
                    echo "SELECTED";  
                }
            }
         ?>

         >Expert</option>

    </select>
</div>
<!-- END Skill Level-->


<!-- Cooking Time -->
<br>
<div class="form-group">
    <label>Time Required</label>
    <input type="text" class="form-control" name="arpcpt_awesome_recipe_inputTime" value="<?php echo esc_html ( $arpcpt_awesome_recipe_input_data['arpcpt_time'] ); ?>" placeholder="e.g. 20 Minutes">
</div>
<!-- END Cooking Time -->

<!-- Ingredients -->
<br>
<div class="form-group">

<!--  Dynamic Meta Input Boxes For dynamic fields (ingredients) -->
<div class="arpcpt_input_fields_wrap">
      <label>Ingredients</label>
    <?php
    if(isset($arpcpt_awesome_recipe_dynamic_input_data) && is_array($arpcpt_awesome_recipe_dynamic_input_data)) {
        $i = 1;
        $arpcpt_output = '';

        foreach($arpcpt_awesome_recipe_dynamic_input_data as $arpcpt_ingredients){
            
            $arpcpt_output = '<div class="arpcpt_input-spacing"><input class="form-control" type="text" name="arpcpt_awesome_recipe_dynamic_input_data[]" value="' . $arpcpt_ingredients . '" >';
            if( $i !== 1 && $i > 1 ) $arpcpt_output .= '<a href="#" class="remove_field"><i class="fa fa-times-circle" aria-hidden="true"></i></a></div>';
            else $arpcpt_output .= '</div>';
            
            echo  $arpcpt_output;
            $i++;
        }
    } else {
        echo '<div class="arpcpt_input-spacing"><input class="form-control" type="text" name="arpcpt_awesome_recipe_dynamic_input_data[]" placeholder="e.g. Flower 100gm"></div>';
    }
    ?>

</div>
<a class="arpcpt_add_field_button button-secondary"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New Ingredients Field</a><br>
<!-- END -->


</div>

<!-- END Ingredients -->



<!-- Instruction Editor -->
<br>
<div class="form-group">
<label>Cooking Procedure</label><br>
<?php



// Adds TinyMCE editor

$arpcpt_awesome_recipe_instruction = get_post_meta( $post->ID, 'arpcpt_awesome_recipe_instruction', true );



// Adding features to tinyMCE
$tinymce_opt = array(
 'toolbar1' => "fontselect, styleselect,|,bold,italic,underline,|,justifyleft,justifycenter,justifyright,justifyfull,|,link,unlink,|,forecolor,removeformat,charmap,undo,redo"
);

    // Add WP Editor as replacement of textarea 
    wp_editor( $arpcpt_awesome_recipe_instruction, 'arpcpt_awesome_recipe_instruction', array(
        'wpautop'       => false,
        'media_buttons' => true,
        'textarea_name' => 'arpcpt_awesome_recipe_instruction',  
        'textarea_rows' => 20,
        'teeny'         => true,
        'quicktags' => true,
        'tinymce' => $tinymce_opt,
        'quicktags' => true
    ) );



?>

</div>
<!-- END Instruction Editor -->



<!-- Nutritions -->
<div class="form-group">


<!--  Dynamic Meta Input Boxes For dynamic fields (Nutritions) -->
<div class="arpcpt_input_fields_wrap_nutrition">
      <label>Nutrition Facts</label><em> (Optional)</em>
    <?php
    if(isset($arpcpt_awesome_recipe_dynamic_input_data_nutrition) && is_array($arpcpt_awesome_recipe_dynamic_input_data_nutrition)) {
        $i = 1;
        $arpcpt_output = '';

        foreach($arpcpt_awesome_recipe_dynamic_input_data_nutrition as $arpcpt_nutrutuions){
            
            $arpcpt_output = '<div class="arpcpt_input-spacing"><input class="form-control" type="text" name="arpcpt_awesome_recipe_dynamic_input_data_nutrition[]" value="' . $arpcpt_nutrutuions . '" >';
            if( $i !== 1 && $i > 1 ) $arpcpt_output .= '<a href="#" class="remove_field"><i class="fa fa-times-circle" aria-hidden="true"></i></a></div>';
            else $arpcpt_output .= '</div>';
            
            echo $arpcpt_output;
            $i++;
        }
    } else {
        echo '<div class="arpcpt_input-spacing"><input class="form-control" type="text" name="arpcpt_awesome_recipe_dynamic_input_data_nutrition[]" placeholder="e.g. Carbohydrate 200mg"></div>';
    }
    ?>

</div>
<a class="arpcpt_add_field_button_nutrition button-secondary"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New Nutrition Field</a><br>
<!-- END -->


</div>

<!-- END Nutritions -->

<!-- END Admin Input Form-->


<?php

} 


