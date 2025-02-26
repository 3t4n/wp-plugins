<?php
/**
 * Plugin Name: MJ Term Meta Box
 * Plugin URI: 
 * Description: This plugin adds custom meta fields to Taxonomies
 * Version: 1.0.0
 * Author: Shishir Kumar Mishra
 * Author URI: 
 * License: GPL2
 * Text Domain:
 * Domain Path: 
 */



 
class MJ_Custom_term_meta_box {
 
    
    public function __construct() {
        
           if(is_admin()){
           	  add_action( 'product_cat_edit_form_fields',  array( $this, 'mj_taxonomy_edit_meta_field' ), 10, 2 );
              add_action( 'product_cat_add_form_fields',  array( $this, 'mj_taxonomy_add_new_meta_field' ), 10, 2 );
              add_action( 'edited_product_cat',  array( $this, 'mj_save_taxonomy_custom_meta' ), 10, 2 );
              add_action( 'create_product_cat',  array( $this, 'mj_save_taxonomy_custom_meta' ), 10, 2 );
           }
       }
 
  
    // Add term page
	public function mj_taxonomy_add_new_meta_field() {
		?>
		<div class="form-field">
			<label for="class_term_meta"><?php _e( 'Add Class', 'MJ' ); ?></label>
			<input type="text" name="class_term_meta" id="class_term_meta" value="">
			<p class="description"><?php _e( 'Enter a value for this field','MJ' ); ?></p>
		</div>
	<?php
	}

    //Edit term page
    public function mj_taxonomy_edit_meta_field($term) {

	    $t_id = $term->term_id;
	    $term_meta = get_option( "taxonomy_$t_id" ); 
	   
		?>
		<tr class="form-field">
		<th scope="row" valign="top"><label for="class_term_meta"><?php _e( 'Add Class', 'MJ' ); ?></label></th>
			<td>
				<input type="text" name="class_term_meta" id="class_term_meta" value="<?php echo esc_attr( $term_meta ) ? esc_attr( $term_meta ) : ''; ?>">
				<p class="description"><?php _e( 'Enter a value for this field','MJ' ); ?></p>
			</td>
		</tr>
	<?php
	}

    //Save term meta box values
    public function mj_save_taxonomy_custom_meta( $term_id ) {

    	$term_meta = sanitize_text_field($_POST['class_term_meta']);
		if ( isset( $term_meta ) ) {
			
		    // Save the option 
			update_option( "taxonomy_$term_id", $term_meta );
		}
		    
	}  

}
 
new MJ_Custom_term_meta_box();