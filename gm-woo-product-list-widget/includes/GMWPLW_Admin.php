<?php

/**
 * This class is loaded on the back-end since its main job is 
 * to display the Admin to box.
 */

class GMWPLW_Admin {
	
	protected static $instance = NULL;


	public function __construct () {
		add_action( 'init', array( $this, 'GMWPLW_init' ) );
		add_action( 'add_meta_boxes', array($this, 'GMWPLW_add_meta_box'));
		add_action('admin_enqueue_scripts', array($this, 'GMWPLW_scripts'));
		
		add_action( 'wp_ajax_gmwqp_change_tax', array( $this, 'gmwqp_change_tax' ));
		add_action( 'wp_ajax_nopriv_gmwqp_change_tax', array( $this, 'gmwqp_change_tax' ));

		add_action( 'edit_post', array($this, 'GMWPLW_meta_save'), 10, 2);
	}

	public function GMWPLW_init () {
		
		$args = array(
	        'label'  => __( 'Product Widget', 'gmwrpm' ),
	        'public'             => false, // Set to false to hide it from the frontend.
	        'publicly_queryable' => false, // Set to false to prevent queries from the frontend.
	        'show_ui'            => true, // Show in the admin dashboard.
	        'show_in_admin_bar'  => true, // Show in the admin bar.
	        'query_var'          => false, // Disable query variable.
	        'rewrite'            => false, // Disable URL rewriting.
	        'capability_type'    => 'post',
	        'has_archive'        => false, // Disable archives.
	        'menu_position'      => null,
	        'supports'  => array( 'title' ),
	    );
	    register_post_type( 'product_widget', $args );

	}

	public function GMWPLW_add_meta_box() {
            add_meta_box(
                'GMWPLW_metabox',
                __( 'Product Widget Settings', 'gmwrpm' ),
                array($this, 'GMWPLW_metabox_rule'),
                'product_widget',
                'normal'
            );
   }
   public function GMWPLW_meta_save( $post_id, $post ) {
   	 	if ($post->post_type != 'product_widget') { return; }
	 	if ( !current_user_can( 'edit_post', $post_id )) return;

		update_post_meta($post_id, 'gmwplw_select_type', sanitize_text_field($_POST['gmwplw_select_type']));
	    update_post_meta($post_id, 'gmwplw_product_show', intval($_POST['gmwplw_product_show']));
	    update_post_meta($post_id, 'gmwplw_show_per_column', intval($_POST['gmwplw_show_per_column']));
	    update_post_meta($post_id, 'gmwplw_thum', sanitize_text_field($_POST['gmwplw_thum']));
	    update_post_meta($post_id, 'gmwplw_order_by', sanitize_text_field($_POST['gmwplw_order_by']));
	    update_post_meta($post_id, 'gmwplw_order', sanitize_text_field($_POST['gmwplw_order']));
	    update_post_meta($post_id, 'gmwplw_select_tax_val', sanitize_text_field($_POST['gmwplw_select_tax_val']));
	    update_post_meta($post_id, 'gmwplw_layout', sanitize_text_field($_POST['gmwplw_layout']));
	    
   }
   public function GMWPLW_metabox_rule( $post ) {
   	$gmwplw_select_type = get_post_meta( $post->ID,'gmwplw_select_type', true);
   	if (empty($gmwplw_select_type)) {
	    $gmwplw_select_type = 'all';
	}
   	$gmwplw_product_show = get_post_meta( $post->ID,'gmwplw_product_show', true);
   	if (empty($gmwplw_product_show)) {
	    $gmwplw_product_show = 5;
	}
	$gmwplw_show_per_column = get_post_meta( $post->ID,'gmwplw_show_per_column', true);
   	if (empty($gmwplw_show_per_column)) {
	    $gmwplw_show_per_column = 3;
	}

	
   	$gmwplw_thum = get_post_meta( $post->ID,'gmwplw_thum', true);
   	if (empty($gmwplw_thum)) {
	    $gmwplw_thum = 'yes';
	}
   	$gmwplw_order_by = get_post_meta( $post->ID,'gmwplw_order_by', true);
   	$gmwplw_order = get_post_meta( $post->ID,'gmwplw_order', true);
   	$gmwplw_select_tax_val = get_post_meta( $post->ID,'gmwplw_select_tax_val', true);
   	$gmwplw_layout = get_post_meta( $post->ID,'gmwplw_layout', true);
   	if (empty($gmwplw_layout)) {
	    $gmwplw_layout = 'list';
	}
   	
   	
   	?>
   	<div class="gmwplw_settings">
   		<table>
   			<tr>
   				<td>Shortcode</td>
   				<td>
   					<code>[gmwplw_product_layout id="<?php echo $post->ID;?>"]</code>
   				</td>
   			</tr>
   			<tr>
   				<td>Display Layout</td>
   				<td>
   					<input  name="gmwplw_layout" type="radio" value="list" <?php checked( $gmwplw_layout, 'list' ); ?> /> List
					<input  name="gmwplw_layout" type="radio" value="grid" <?php checked( $gmwplw_layout, 'grid' ); ?> /> Grid
   				</td>
   			</tr>
   			<tr>
   				<td>Select Type</td>
   				<td>
   					<?php
   					$taxonomies=get_object_taxonomies( 'product', 'objects' ); 
			
					$taxc = array();
					foreach ($taxonomies as $key => $value) {
						if($value->show_ui){
							$taxc[$key] = $value->label;
						}
					}
   					?>
   					<input  
   					name="gmwplw_select_type" 
   					type="radio" 
   					value="all"  
   					iscal="no" 
   					<?php checked( $gmwplw_select_type, 'all' ); ?>  
   					class="changecat"/> All<br/>
   					<input  
   					name="gmwplw_select_type" 
   					type="radio" 
   					value="featured"  
   					iscal="no" 
   					<?php checked( $gmwplw_select_type, 'featured' ); ?>  
   					class="changecat"/> Featured<br/>
   					<input  
   					name="gmwplw_select_type" 
   					type="radio" 
   					value="sale" 
   					iscal="no"  
   					<?php checked( $gmwplw_select_type, 'sale' ); ?>  
   					class="changecat"/> On-Sale<br/>
   					<?php 
					foreach($taxc as $taxckey=>$taxcval){
						$isselcted = (($gmwplw_select_type ==$taxckey) ? 'checked' : '');
						$arr_make = array('product_cat','product_tag');
						$isdisabled = ((!in_array($taxckey,$arr_make)) ? 'disabled' : '');
						echo '<input  
			   					name="gmwplw_select_type" 
			   					type="radio" 
			   					value="'.$taxckey.'" 
			   					iscal="yes"  
			   					'.$isselcted.' 
			   					'.$isdisabled.' 
			   					class="changecat"/> '.$taxcval;
			   			if($isdisabled=='disabled'){
			   				echo "&nbsp;&nbsp;<a href='https://www.codesmade.com/store/product-list-widget-for-woocommerce-pro/' target='_blank'>Get Pro</a>";
			   			}
						echo '<br/>';
						/*echo '<option  
						iscal="yes"  
						value="'.$taxckey.'" 
						'.$isselcted.'
						 '.$isdisabled.'>'.$taxcval.'</option>';*/
					}
					?>
   					
   				</td>
   			</tr>
   			<?php 
   			if (array_key_exists($gmwplw_select_type, $taxc)) {
   				$istax=true;
   			}else{
   				$istax=false;
   			}
   			?>
   			<tr class="showc_taxonomy_val" style="<?php echo ($istax == true) ? 'display: table-row' : ''; ?>">
   				<td>Select Taxonomy Value</td>
   				<td>
   					<?php
					if($istax == true){
   						$terms = get_terms( $gmwplw_select_type, array(
							    'hide_empty' => false,
							) );
   						$taxc = array();
						foreach ($terms as $key => $value) {
							$taxc[$value->term_id] = $value->name;
						}
   					}
   					?>
   					<select class='changetax_val widefat' name="gmwplw_select_tax_val" >
   						<?php 
   						if($istax == true){
	   						foreach($taxc as $taxckey=>$taxcval){
	   							echo '<option value="'.$taxckey.'" '.(($gmwplw_select_tax_val==$taxckey) ? 'selected' : '').'>'.$taxcval.'</option>';
	   						}
	   					}
   						?>
					</select>
   				</td>
   			</tr>
   			<tr>
   				<td>No of Products Per Column <i>(Just work for grid layout)</i></td>
   				<td>
   					<input type="number" name="gmwplw_show_per_column"  class="widefat" value="<?php echo esc_attr($gmwplw_show_per_column); ?>">
   				</td>
   			</tr>
   			<tr>
   				<td>No of Products </td>
   				<td>
   					<input type="number" name="gmwplw_product_show"  class="widefat" value="<?php echo esc_attr($gmwplw_product_show); ?>">
   				</td>
   			</tr>
   			<tr>
   				<td>Show product thumbnails?</td>
   				<td>
   					<input  name="gmwplw_thum" type="radio" value="yes" <?php checked( $gmwplw_thum, 'yes' ); ?> /> Yes
					<input  name="gmwplw_thum" type="radio" value="no" <?php checked( $gmwplw_thum, 'no' ); ?> /> No
   				</td>
   			</tr>
   			
   			<tr>
   				<td>Order By</td>
   				<td>
   					<select  name="gmwplw_order_by"  class="widefat">
						<option value='post_title' <?php echo ($gmwplw_order_by == 'post_title') ? 'selected' : ''; ?>>Product Name</option>
						<option value='id' <?php echo ($gmwplw_order_by == 'id') ? 'selected' : ''; ?>>Product ID</option>
						<option value='date' <?php echo ($gmwplw_order_by == 'date') ? 'selected' : ''; ?>>Date Published</option>
						<option value='modified' <?php echo ($gmwplw_order_by == 'modified') ? 'selected' : ''; ?>>Last Modified</option>
						<option value='rand' <?php echo ($gmwplw_order_by == 'rand') ? 'selected' : ''; ?>>Random</option>
						<option value='total_sales' <?php echo ($gmwplw_order_by == 'total_sales') ? 'selected' : ''; ?>>Total Sales</option>
						<option value='none' <?php echo ($gmwplw_order_by == 'none') ? 'selected' : ''; ?>>None</option>
					</select>
   				</td>
   			</tr>
   			<tr>
   				<td>Order By</td>
   				<td>
   					<select  name="gmwplw_order" class="widefat">
						<option value='ASC' <?php echo ($gmwplw_order == 'ASC') ? 'selected' : ''; ?>>Ascending</option>
						<option value='DESC' <?php echo ($gmwplw_order == 'DESC') ? 'selected' : ''; ?>>Descending</option>
					</select>
   				</td>
   			</tr>
   		</table>
   	</div>
   	<?php
   }

	public static function get_instance()
    {
        if ( NULL === self::$instance )
            self::$instance = new self;

        return self::$instance;
    }
	
	
	public function gmwqp_change_tax() {
		$htmlfinal = '';
		$terms = get_terms( sanitize_text_field($_REQUEST['option']), array(
						    'hide_empty' => false,
						) );
		foreach ($terms as $key => $value) {
			$htmlfinal .= '<option value="'.$value->term_id.'" >'.$value->name.'</option>';
		}
		echo html_entity_decode(esc_html($htmlfinal)) ;
		
		exit;
	}
	


	public function GMWPLW_scripts(){
		wp_enqueue_script('gmwplwadmin-script', GMWPLW_PLUGIN_URL . '/js/admin-script.js', array(), '1.0.0', true );
		wp_localize_script( 'gmwplwadmin-script', 'gmwplw_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
		wp_enqueue_style('gmwplw_admin_css', GMWPLW_PLUGIN_URL.'css/admin-style.css');
	}

	

}

?>
