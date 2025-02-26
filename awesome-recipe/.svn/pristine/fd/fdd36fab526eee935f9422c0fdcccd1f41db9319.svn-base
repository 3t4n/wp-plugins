<?php

/**
* Display custom meta box fields to custom post type frontend
*
*@package AwesomeRecipePlugin
*/

function arpcpt_awesome_recipe_content_filter( $content ){

	// Check if it is Recipe post type
	if( !is_singular( 'arpcpt_recipe' ) ){
	return $content; 
	}

	global $post, $wpdb; // Getting access to all posts.

	$arpcpt_awesome_recipe_input_data = get_post_meta( $post->ID, 'arpcpt_awesome_recipe_input_data', true ); // getting custom metabox fields data

 	$arpcpt_awesome_recipe_dynamic_input_data =   get_post_meta($post->ID, 'arpcpt_awesome_recipe_dynamic_input_data', true); // Get dynamic fields (ingredients) data


 	$arpcpt_awesome_recipe_instruction = get_post_meta( $post->ID, 'arpcpt_awesome_recipe_instruction', true );
 	// Get TinyMCE data (instruction)

 	$arpcpt_awesome_recipe_dynamic_input_data_nutrition =   get_post_meta($post->ID, 'arpcpt_awesome_recipe_dynamic_input_data_nutrition', true); // Get dynamic fields (nutritions) data




// Getting row data
    $arpcpt_styles = $wpdb->get_row(
                        "SELECT * FROM `". $wpdb->prefix ."arpcpt_awesome_recipe_styles`
                        ORDER BY id DESC LIMIT 1"
                        ); 


    // Storing data into an array
    foreach ($arpcpt_styles as $key => $arpcpt_style) {

    }


?>



<!-- Open Graph -->
<meta property="og:title" content="<?php esc_html ( the_title() ); ?>"/>
<meta property="og:description" content="<?php remove_filter( 'the_excerpt', 'wpautop' ); esc_html ( the_excerpt() ); ?>"/>
<meta property="og:type" content="Recipe"/>
<meta property="og:url" content="<?php esc_url ( the_permalink() ); ?>"/>
<meta property="og:site_name" content="<?php esc_html ( bloginfo() ); ?>"/>
<meta property="og:image" content="<?php esc_url( the_post_thumbnail_url() ); ?>"/>

<!--  Recipe Image -->
<div class="arpcpt_recipe-image">


<?php

if ( has_post_thumbnail( $post->ID) ) {
   esc_html ( the_post_thumbnail( 'single-post-thumbnail' ) );
}
else {
    echo '<img src="' . plugins_url( '/assets/img/picture.png', dirname(__FILE__) ) . '" > ';
} 
?>

</div>
<!--  END Recipe Image -->

<!--  Change SVG ICON COLOR -->
<style>
    svg {width: 30px; height: 30px;}
    svg path{fill:<?php echo  $arpcpt_styles->arpcpt_icon_color; ?>;}
    svg rect{fill:<?php echo  $arpcpt_styles->arpcpt_icon_color; ?>;}
</style>
<!--  END Change SVG ICON COLOR -->

<!--  Short Details -->
<table style="width:100%; text-align: center;"  cellpadding="20">
  <tr>
    <td>
    	
	<div class="arpcpt_recipe-icon"><img class="arpcpt_recipe-info-img svg" src="<?php echo esc_url( plugins_url( '/assets/img/serve.svg', dirname(__FILE__) ) ); ?>"></div>
	<label>SERVING</label>
 	<div class="arpcpt_recipe-detailed-info"><?php echo esc_html ( $arpcpt_awesome_recipe_input_data['arpcpt_serving'] ); ?> Persons</div>  	
    </td>
    <td>
    	
	<div class="arpcpt_recipe-icon"><img class="arpcpt_recipe-info-img svg" src="<?php echo esc_url( plugins_url( '/assets/img/course.svg', dirname(__FILE__) ) ); ?>"></div>
	<label>COURSE</label>
	<div class="arpcpt_recipe-detailed-info"><?php echo esc_html ( $arpcpt_awesome_recipe_input_data['arpcpt_course'] ); ?></div>

    </td> 
    <td>
    	<div class="arpcpt_recipe-icon"><img class="arpcpt_recipe-info-img svg" src="<?php echo esc_url( plugins_url( '/assets/img/cutlery.svg', dirname(__FILE__) ) ); ?>"></div>
		<label>CUISINE</label>
		<div class="arpcpt_recipe-detailed-info"><?php echo esc_html ( $arpcpt_awesome_recipe_input_data['arpcpt_cuisine'] ); ?></div>

    </td>
  </tr>
  <tr>
    <td>
    	
    	<div class="arpcpt_recipe-icon"><img class="arpcpt_recipe-info-img svg" src="<?php echo esc_url( plugins_url( '/assets/img/level.svg', dirname(__FILE__) ) ); ?>"></div>
		<label>LEVEL</label>
		<div class="arpcpt_recipe-detailed-info"><?php echo esc_html ( $arpcpt_awesome_recipe_input_data['arpcpt_level'] ); ?></div>

    </td>
    <td>
    	
    	<div class="arpcpt_recipe-icon"><img class="arpcpt_recipe-info-img svg" src="<?php echo esc_url( plugins_url( '/assets/img/time.svg', dirname(__FILE__) ) ); ?>"></div>
		<label>TIME</label>
		<div class="arpcpt_recipe-detailed-info"><?php echo esc_html ( $arpcpt_awesome_recipe_input_data['arpcpt_time'] ); ?></div>

    </td> 
    <td>
    	

<div class="arpcpt_recipe-icon"><img class="arpcpt_recipe-info-img svg" src="<?php echo esc_url( plugins_url( '/assets/img/rating.svg', dirname(__FILE__) ) ); ?>"></div>
		<label>RATING</label>
		<div class="arpcpt_recipe-detailed-info">
				<!-- Rating -->
				<?php 

				// Query for getting average ratings
					$arpcpt_average_rating = $wpdb->get_var(
					"SELECT AVG(`arpcpt_rating`) FROM `". $wpdb->prefix ."arpcpt_awesome_recipe_ratings`
					WHERE arpcpt_recipe_id='". $post->ID ."'"
					); 

				?>


				<div id="arpcpt_recipe_rating" class="rateit" data-rateit-resetable="false" data-rateit-value="<?php echo esc_html ( $arpcpt_average_rating ); ?>" READONLY_PLACEHOLDER data-rid="<?php echo esc_html ( $post->ID ); ?>">
				</div>

				<!-- END -->
			</div>		
		</div>

    </td>
  </tr>
</table>

<!--  END Short Details -->


<!--  Ingredients -->
<br>
<div class="arpcpt_recipe-body-header">
	<div class="arpcpt_recipe-header" style="background:<?php echo esc_html ( $arpcpt_styles->arpcpt_header_background ); ?>;">
        <h4 style="font-size:<?php echo esc_html ( $arpcpt_styles->arpcpt_header_font_size ); ?>; text-transform: <?php echo esc_html ( $arpcpt_styles->arpcpt_header_font_style ); ?>; color:<?php echo esc_html ( $arpcpt_styles->arpcpt_header_font_color ); ?>; ">ingredients</h4></div>
<!--  Frontend output Ingredients -->

<div class="arpcpt_input_fields_wrap">
    <?php
    if(isset($arpcpt_awesome_recipe_dynamic_input_data) && is_array($arpcpt_awesome_recipe_dynamic_input_data)) {
        $i = 1;
        $arpcpt_output = '';
     
        foreach($arpcpt_awesome_recipe_dynamic_input_data as $arpcpt_ingredients){
            
            $arpcpt_output = '<div class="arpcpt_input-items"><i class="fa fa-check" style="color:'. esc_html ( $arpcpt_styles->arpcpt_header_background ) .'" aria-hidden="true" ></i></i>
</i><span class="arpcpt_ingredient-item" style=" font-size:'. $arpcpt_styles->arpcpt_list_font_size . ';"><strong> '. $arpcpt_ingredients .'</strong></span></div>';
            
            echo $arpcpt_output;
            
            $i++;
        }

    } else {
       
    }
 
    ?>

</div>
<!-- END -->
</div> 
<!--  END Ingredients -->



<br>
<div class="arpcpt_recipe-body-header">
	<div class="arpcpt_recipe-header" style="background:<?php echo esc_html ( $arpcpt_styles->arpcpt_header_background ); ?>;"> <h4 style="font-size:<?php echo esc_html ( $arpcpt_styles->arpcpt_header_font_size ); ?>; text-transform: <?php echo esc_html ( $arpcpt_styles->arpcpt_header_font_style ); ?>; color:<?php echo esc_html ( $arpcpt_styles->arpcpt_header_font_color ); ?>; ">cooking procedure</h4></div>
<!-- Post Body-->

<div class="arpcpt_recipe-body"><?php echo  $arpcpt_awesome_recipe_instruction ; ?></div>
<!-- END-->
</div>




<!--  Nutritions -->
<?php 
if ($arpcpt_awesome_recipe_dynamic_input_data_nutrition['1'] == NULL){ // check if the field is empty 

}else{


?>
<br>
<div class="arpcpt_recipe-body-header">
	<div class="arpcpt_recipe-header" style="background:<?php echo esc_html ( $arpcpt_styles->arpcpt_header_background ); ?>;"><h4 style="font-size:<?php echo esc_html ( $arpcpt_styles->arpcpt_header_font_size ); ?>; text-transform: <?php echo esc_html ( $arpcpt_styles->arpcpt_header_font_style ); ?>; color:<?php echo esc_html ( $arpcpt_styles->arpcpt_header_font_color ); ?>; ">nutrition facts</h4></div>
<!--  Frontend output Nutritions -->

<div class="arpcpt_input_fields_wrap">
    <?php
    if(isset($arpcpt_awesome_recipe_dynamic_input_data_nutrition) && is_array($arpcpt_awesome_recipe_dynamic_input_data_nutrition)) {
        $i = 1;
        $arpcpt_output = '';
     
        foreach($arpcpt_awesome_recipe_dynamic_input_data_nutrition as $arpcpt_nutritions){
            
            $arpcpt_output = '<div class="arpcpt_input-items"><i class="fa fa-hashtag" style="color:'. esc_html ( $arpcpt_styles->arpcpt_header_background ) .'" aria-hidden="true"></i><span class="arpcpt_ingredient-item" style=" font-size:'. $arpcpt_styles->arpcpt_list_font_size . ';"> <strong>'. $arpcpt_nutritions .'</strong></span></div>';
            
            echo $arpcpt_output;
            
            $i++;
        }

    } else {
       
    }
 
    ?>

</div>
<!-- END -->
</div> 

<?php
}// ends if loop
?>
<!--  END Nutritions -->

<!-- SHARE -->
<hr>

<label style="margin-bottom: 10px;"><strong>SHARE THIS RECIPE</strong></label>

<div class="arpcpt_awesome-recipe-share-container">


<?php



$arpcpt_URL = esc_html ( get_the_permalink() );
$arpcpt_TITLE = esc_html ( get_the_title() );
$arpcpt_DESCRIPTION = esc_html ( get_the_excerpt() );
$arpcpt_MEDIA = esc_html ( get_the_post_thumbnail_url() );


echo '<div class="arpcpt_awesome-recipe-share">';

echo '<a href="https://www.facebook.com/sharer/sharer.php?u='. $arpcpt_URL  .'" target="_blank">';

echo '<img src="' . esc_url ( plugins_url( '/assets/img/facebook.svg', dirname(__FILE__) ) ) . '">';

echo '</a>';

echo '</div>';



echo '<div class="arpcpt_awesome-recipe-share">';

echo '<a href="https://plus.google.com/share?url='. $arpcpt_URL  .'" target="_blank">';

echo '<img src="' . esc_url ( plugins_url( '/assets/img/googlePlus.svg', dirname(__FILE__) ) ) . '">';

echo '</a>';

echo '</div>';



echo '<div class="arpcpt_awesome-recipe-share">';

echo '<a href="http://twitter.com/share?'. $arpcpt_TITLE .'=&url='. $arpcpt_URL  .'" target="_blank">';

echo '<img src="' . esc_url ( plugins_url( '/assets/img/twitter.svg', dirname(__FILE__) ) ) . '">';

echo '</a>';

echo '</div>';



echo '<div class="arpcpt_awesome-recipe-share">';

echo '<a href="https://pinterest.com/pin/create/button/?url='. $arpcpt_URL .'&media='. $arpcpt_MEDIA .'&description='. $arpcpt_DESCRIPTION  .'" target="_blank">';

echo '<img src="' . esc_url ( plugins_url( '/assets/img/pinterest.svg', dirname(__FILE__) ) ) . '">';

echo '</a>';

echo '</div>';



echo '<div class="arpcpt_awesome-recipe-share">';

echo '<a href="http://www.tumblr.com/share/link?url='. $arpcpt_URL  .'" target="_blank">';

echo '<img src="' . esc_url ( plugins_url( '/assets/img/tumblr.svg', dirname(__FILE__) ) ) . '">';

echo '</a>';

echo '</div>';



echo '<div class="arpcpt_awesome-recipe-share">';

echo '<a href="mailto:your@email.com?subject=Awesome Recipe Plugin" target="_blank">';

echo '<img src="' . esc_url ( plugins_url( '/assets/img/email.svg', dirname(__FILE__) ) ) . '">';

echo '</a>';

echo '</div>';



echo '</div>';

// END SHARE

} // ends function