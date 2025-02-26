<?php 


/* 

Adds a metabox to the Menu custom post type

*/

add_action( 'add_meta_boxes', 'advance_food_menu_meta_box' );
function advance_food_menu_meta_box( ){

	add_meta_box( 
		'Menu Custom Options', 
		__( 'Menu Options', 'srm-domain' ), 
		'advance_food_menu_meta_box_build', 
		'menu-item', 
		'side',
		'high'
	);

}

function advance_food_menu_meta_box_build() { ?>
	<div class="inside">
		<table>
			<td>Menu Price<tD>
			<td><input type="text" class="widefat" name="afm-price" value="<?php echo get_post_meta(get_the_ID(), 'afm-price', true); ?>" placeholder="10.00"><tD>
			
		</table>
	</div>
<?php }
 
function advance_food_menu_meta_box_save($post_id){
	update_post_meta($post_id, 'afm-price', $_POST['afm-price']);
}
add_action('save_post', 'advance_food_menu_meta_box_save'); 




 
