<?php
/**
 * @package Editable_Recipe
 * @version 2.0
 */
/*
Plugin Name: Editable Recipe
Plugin URI: http://www.jasonandshawnda.com/foodiebride/
Description: This plugin adds several editable boxes to the post page to allow you enter and edit your recipe.  The resulting recipe fits the hRecipe format.
Author: Jason Horn
Version: 2.0
Author URI: http://www.jasonandshawnda.com/foodiebride/
*/

/*  Copyright 2011  Jason Horn  (email : jason.o.horn@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
if (!class_exists("EditableRecipe")) {
	
	// Includes
	require_once dirname(__FILE__).'/php/er_Recipe.php';
	
	$print_file = dirname(__FILE__).'/php/er_Print.php';
	if(file_exists($print_file))
		require_once $print_file;
	
	class EditableRecipe {
		
		public $opt_enable_print = 'editableRecipe_enable_print';
		public $opt_print_ads = 'editableRecipe_print_ad_text';
		
		function EditableRecipe() { //constructor
				
		}

		
		
		function editCustomBox() {
			// Use nonce for verification
			wp_nonce_field( plugin_basename(__FILE__), 'editableRecipe_noncename' );

			$recipe = new er_Recipe();
			$recipe->load();
			
			// The actual fields for data entry
			echo '<label>Recipe Name:</label> ';
			echo '<input type="text" id="editableRecipe_fn_field" name="editableRecipe_fn_field" value="'.$recipe->name().'" size="50" />';
			echo '<br/>';
			echo '<br/>';

			echo '<label>Photo:</label> ';
			echo '<input type="text" id="editableRecipe_photo_field" name="editableRecipe_photo_field" value="'.$recipe->photo().'" size="50" />';
			echo '<br/>';
			echo '<br/>';

			echo '<div id="editableRecipe_ingredients">';
			echo '<label>Ingredients: <ul>';
			echo '<li><em>* Separate line for each ingredient</em></li>';
			echo '<li><em>* Use * at the start of a line to add a section title</em></li>';
			echo '</label>';

			$ingredients = $recipe->ingredients();
			$numIngredients = max(count($ingredients)+5,15);

			echo '</div>';
			echo '<textarea rows="'.$numIngredients.'" cols="30" style="width:100%" id="editableRecipe_ingredient_field" name="editableRecipe_ingredient_field">'.$recipe->ingredientText().'</textarea>';

			echo '<br/>';

			echo '<label>Instructions:</label><br/>';
			
			wp_editor($recipe->instructions(),'editableRecipe_instructions_field');
				
			echo '<br/>';
			echo '<br/>';
			echo '<label>Yield:</label>';
			echo '<input type="text" id="editableRecipe_yield_field" name="editableRecipe_yield_field" value="'.$recipe->yeild().'" size="50" />';
			echo '<br/>';
			echo '<br/>';

			echo '<label>Source:</label>';
			echo '<input type="text" id="editableRecipe_source_field" name="editableRecipe_source_field" value="'.$recipe->source().'" size="50" />';
			echo '<br/>';
			echo '<label>Source URL:</label>';
			echo '<input type="text" id="editableRecipe_source_url_field" name="editableRecipe_source_url_field" value="'.$recipe->source_url().'" size="50" />';
			echo '<br/>';
			echo '<br/>';

			echo '<label>Duration:</label> ';
			echo '<input type="text" id="editableRecipe_duration_h_field" name="editableRecipe_duration_h_field" value="'.$recipe->duration_h().'" size="5" />';
			echo '<label>hours</label> ';
			echo '<input type="text" id="editableRecipe_duration_m_field" name="editableRecipe_duration_m_field" value="'.$recipe->duration_m().'" size="5" />';
			echo '<label>minutes</label> ';
			echo '<br/>';
			echo '<br/>';

			echo '<label>Summary:</label><br/> ';
			echo '<textarea id="editableRecipe_summary_field" name="editableRecipe_summary_field" rows="5" cols="75">'.$recipe->summary().'</textarea>';
			echo '<br/>';
			echo '<br/>';
	
		}



		/* When the post is saved, saves our custom data */
		function savePostdata( $post_id ) {

			// verify this came from the our screen and with proper authorization,
			// because save_post can be triggered at other times

			if ( !wp_verify_nonce( $_POST['editableRecipe_noncename'], plugin_basename(__FILE__) ) )
				return $post_id;

			// verify if this is an auto save routine.
			// If it is our form has not been submitted, so we dont want to do anything
			if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
				return $post_id;


			// Check permissions
			if ( 'page' == $_POST['post_type'] )
			{
				if ( !current_user_can( 'edit_page', $post_id ) )
					return $post_id;
			}
			else
			{
				if ( !current_user_can( 'edit_post', $post_id ) )
					return $post_id;
			}

			// OK, we're authenticated: we need to find and save the data
			$recipe = new er_Recipe();
			$recipe->loadFromForm();
			$recipe->save($post_id);
			
			return $post_id;
		}

		function addHeaderCode() {
			?><link rel="stylesheet" href="<?php echo plugins_url($path='/editableRecipe')?>/css/er_main.css" />
<?php 
		}
		
		// [bartag foo="foo-value"]
		function shortcode( $atts ) {
			return $this->buildRecipeHTML();
		}
		
		/**
		 * Build and return the recipe string.
		 * @param string $printing either 'printing' or 'notprinting'
		 * @return string String representing the recipe html
		 */
		function buildRecipeHTML($printing='notprinting') {
          global $er_editableRecipePrintObj;
		  // No shortcode attributes just yet
		  //  extract( shortcode_atts( array(
		  //				 'foo' => 'something',
		  //				 'bar' => 'something else',
		  //				 ), $atts ) );
		  $is_printing = ('printing' == $printing);
		  $fn = get_post_meta(get_the_ID(), 'editableRecipe_fn', true);
		  $photo = get_post_meta(get_the_ID(), 'editableRecipe_photo', true);
		  $ingredient = get_post_meta(get_the_ID(), 'editableRecipe_ingredient', true);
		  $instructions = get_post_meta(get_the_ID(), 'editableRecipe_instructions', true);
		  $yeild = get_post_meta(get_the_ID(), 'editableRecipe_yeild', true);
		  $source = get_post_meta(get_the_ID(), 'editableRecipe_source', true);
		  $source_url = get_post_meta(get_the_ID(), 'editableRecipe_source_url', true);
		  $duration_h = get_post_meta(get_the_ID(), 'editableRecipe_duration_h', true);
		  $duration_m = get_post_meta(get_the_ID(), 'editableRecipe_duration_m', true);
		  $summary = get_post_meta(get_the_ID(), 'editableRecipe_summary', true);
		  $output = '';
		  $enable_print = get_option($this->opt_enable_print);
		  
		  if (function_exists('wp_gdsr_render_article')) {
		    ob_start();
		    wp_gdsr_render_article(44, true);
		    $ratings = ob_get_contents();
		    ob_end_clean();
		    $output = $output.'<div style="float:right;margin:10px">'.$ratings.'</div>';
		  }
		  $target_element='div#editableRecipe_content';
		  $output = $output.
		  '<div id="editableRecipe_content" class="hrecipe">';
		  
		  if($enable_print && !$is_printing && isset($er_editableRecipePrintObj)) {
			  $output = $output.
			  "<button type='button' class='print_button' onClick='parent.location=\"?printrecipe=1\"'>".
			  "<img src='".plugins_url($path='/editableRecipe')."/images/print1.gif' />Print</button>";
		  }
		  $output = $output.'<h1 class="fn">'.$fn.'</h1>';
		  if(!empty($photo) && !$is_printing) {
		    $output = $output.'<div class="editableRecipe_photo"><img class="photo" src="'.$photo.'" /></div>';
		  }

		  $output = $output.
		  '<p class="summary">'.$summary.'</p>'.
		  '<h2>Ingredients</h2>'.
		  '<ul>';
		  foreach($ingredient as $i) {
		  	if(!empty($i)) {
			  if($i[0] == '*') {
			    $output = $output.'<li class="ingredient_header">'.substr($i,1).'</li>';
			  } else {
			    $output = $output.'<li class="ingredient">'.$i.'</li>';
			  }
		  	}
		  }
		  $output = $output.
		  '</ul>'.
		  '<h2>Instructions</h2>'.
		  '<div><span class="instructions">'.$instructions.'</span></div>'.
		  '<h2>Notes</h2>';
		  if(!empty($yeild))
		  	$output = $output.'<p>Yields: <span class="yeild">'.$yeild.'</span></p>';
		  if(!empty($source)) {
		    if(!empty($source_url)) {
		      if(substr($source_url,0,7) != 'http://')
		      	$source_url = 'http://'.$source_url;
		      $output = $output.'<p><span class="author"><a href="'.$source_url.'" class="url fn n">'.$source.'</a></span>';
		    } else {
		      $output = $output.'<p><span class="author fn n">'.$source.'</span></span>';
		    }

		    $output = $output.'</p>';
		  }
		  if($duration_h > 0 || $duration_m > 0) {
		    $output = $output.'<p>Estimated time: <span class="duration">'.
		      '<span class="value-title" title="PT'.(int)$duration_h.'H'.(int)$duration_m.'M"></span>';
		    if($duration_h > 0) {
		      $output = $output.$duration_h;
		      if($duration_h == 1)
		      	$output = $output.' hour ';
		      else
		      	$output = $output.' hours ';
		    }
		    if($duration_m > 0) {
		      $output = $output.$duration_m;
		      if($duration_m == 1)
		      	$output = $output.' minute ';
		      else
		      	$output = $output.' minutes ';
		    }
		    $output = $output.'</span></p>';

		  }
		  $output = $output.'</div>';
		  return $output;
		}
	
		function adminInitCallback()
		{

			if(function_exists('add_meta_box')) {
				add_meta_box('editableRecipe_box1',__('Editable Recipe'), array(&$this,'editCustomBox'),'post','advanced');
				add_meta_box('editableRecipe_box1',__('Editable Recipe'), array(&$this,'editCustomBox'),'page','advanced');
			}
		
		}
		
		function adminSettingsMenu() {
			add_options_page( 'Editable Recipe Options', 'Editable Recipe', 'manage_options', 'editableRecipe', array(&$this,'pluginOptions'));
		}
		
		function pluginOptions() {
			if ( !current_user_can( 'manage_options' ) )  {
				wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
			}
			$hidden_field_name = 'editableRecipe_submit_hidden';
			
				
			$enable_print = get_option($this->opt_enable_print);
			$print_ads = get_option($this->opt_print_ads);
				
			if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) {
				// Read their posted value
				if(isset($_POST[ $this->opt_enable_print ]))
					$enable_print = true;
				else
					$enable_print = false;
				
				$print_ads = stripslashes($_POST[ $this->opt_print_ads ]);
				// Save the posted value in the database
				update_option( $this->opt_enable_print, $enable_print );
				update_option( $this->opt_print_ads, $print_ads );

				// Put an settings updated message on the screen

				?>
				<div class="updated">
					<p>
						<strong><?php _e('settings saved.', 'editable-recipe-menu' ); ?> </strong>
					</p>
				</div>
				<?php

			}

			// Now display the settings editing screen

			echo '<div class="wrap">';

			// header

			echo "<h2>" . __( 'Editable Recipe Plugin Settings', 'editable-recipe-menu' ) . "</h2>";

			// settings form
			if($enable_print)
				$enable_print_checked = "CHECKED";
			
			?>

<form name="form1" method="post" action="">
	<input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">

	<p>
		<?php _e("Enable Print Button:", 'editable-recipe-menu' ); ?>
		<input type="checkbox" name="<?php echo $this->opt_enable_print; ?>"
			value="1" <?php echo $enable_print_checked; ?>>
	</p>
	<p>
		<?php _e("Print Window ad text:", 'editable-recipe-menu' ); ?>
		<br>
		<textarea rows="10" cols="70" name="<?php echo $this->opt_print_ads; ?>"><?php echo $print_ads ?></textarea>
	</p>
	<hr />

	<p class="submit">
		<input type="submit" name="Submit" class="button-primary"
			value="<?php esc_attr_e('Save Changes') ?>" />
	</p>

</form>
</div>

<?php
 
		}
		
		
	}//End Class EditableRecipe

	
} 


if (class_exists("EditableRecipe")) {
	$er_editableRecipeObj = new EditableRecipe();
}

if (isset($er_editableRecipeObj)) {
	// Edit recipe
	add_action( 'admin_init', array(&$er_editableRecipeObj,'adminInitCallback') );
	add_action('save_post',  array(&$er_editableRecipeObj,'savePostdata'));
	
	// View Recipe
	add_action('wp_head', array( &$er_editableRecipeObj, 'addHeaderCode' ) );
	add_shortcode('editablerecipe', array(&$er_editableRecipeObj,'shortcode'));
	
	
	if (class_exists("er_Print")) {
	    $er_editableRecipePrintObj = new er_Print($er_editableRecipeObj);
	}
	
	if (isset($er_editableRecipePrintObj)) {
		// Admin page
		add_action( 'admin_menu', array(&$er_editableRecipeObj,'adminSettingsMenu') );
		
		// Printing functionality
		add_filter('query_vars',  array(&$er_editableRecipePrintObj,'addPrintQueryVars'));
		add_action('template_redirect', array(&$er_editableRecipePrintObj,'printRecipe') );
	}
}
?>
