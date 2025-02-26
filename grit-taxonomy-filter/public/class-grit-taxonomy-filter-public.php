<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Grit_Taxonomy_Filter
 * @subpackage Grit_Taxonomy_Filter/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Grit_Taxonomy_Filter
 * @subpackage Grit_Taxonomy_Filter/public
 * @author     Mrityunjay Kumar
 */
class Grit_Taxonomy_Filter_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;
	
	

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->grit_taxonomy_filter_options = get_option($this->plugin_name);


	}
	

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/grit-taxonomy-filter-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		$params = array ( 'ajaxurl' => admin_url( 'admin-ajax.php' ) );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/grit-taxonomy-filter-public.js', array( 'jquery' ), $this->version, false );
		wp_localize_script( $this->plugin_name, 'params', $params );		


	}
   
  /** Register shortcode */
	
	public function register_shortcodes() {
	add_shortcode( 'GRITFILTER', array( $this, 'get_taxonomy_filter') );
	}
	public function get_taxonomy_filter(){
	ob_start();
	$orderby = 'name';
	$show_count = 0; 
	$pad_counts = 0;
	$hierarchical = 1; 
	$title = '';

	$args = array(
	'show_option_none'   => 'Select a value',
	'option_none_value'  => '',
	'orderby' => $orderby,
	'show_count' => $show_count,
	'pad_counts' => $pad_counts,
	'hierarchical' => $hierarchical,
	'taxonomy' => $this->grit_taxonomy_filter_options['taxonomy_name'],
	'title_li' => $title,
	'parent' =>0,
	'class' => 'filter-input',
	'hide_empty' =>1
	);
	?>
	
      <div class="row">
        <!-- <div class="col-12"><h5>Filter for Client</h5></div>  -->
        
        <div class="col-12">
          <div class="row ml-0 mr-0">
           
            <div class="col-lg-12 filter-row">
              <div class="row">
                
                 <div class="col-sm-12 col-lg-4 grit-left">
                    
					
					
					<form id='grit_filter_form' class='' action ="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>" method='post'>
	<?php
	echo __("<input type='hidden' name='action' value='grit_taxonomy_filter_response'>");

	wp_dropdown_categories($args);
	echo _("</form>");?>
					
					
   
</div>
                 <div class="col-sm-12 col-lg-4 grit-left">
                  
                    <form id='grit_filter_form2' class='' action ="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>" method='post'>
	 <?php
	 echo __("<input type='hidden' name='action' value='grit_taxonomy_filter_response'>");
	 echo '<select name="business_type" id="business_type" class="filter-input">';
	 echo "<option value=' '>Select a value</option>";
	 echo '</select>';
	 echo '</form>';
	 ?>
                 </div>
                 <div class="col-sm-12 col-lg-4 grit-left">
                 
                  <form id='grit_filter_form3' class='' action ="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>" method='post'>
	<?php
	 echo __("<input type='hidden' name='action' value='grit_taxonomy_filter_response'>");
	 echo '<select name="business" id="business" class="filter-input" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">';
	 echo "<option value=' '>Select a value</option>";
	 echo '</select>';
	 echo "</form>";
	 ?>
                 </div>
                
              </div><!--row-->
            </div>

          </div>
        </div>
      </div><!--./row for filter area-->
      
     <?php

	return ob_get_clean();
?>
<?php

}
public function get_second_dropdown_values($term_id_cat){
	$orderby = 'name';
	$show_count = 0; 
	$pad_counts = 0;
	$hierarchical = 1; 
	$title = '';
	

	$args11 = array(
    'parent' => $term_id_cat,
	'hide_empty' =>1
	);
	$termchildren = get_terms( $this->grit_taxonomy_filter_options['taxonomy_name'], $args11 ); 
	

    $option = "<option value=' '>Select a value</option>";		  
	foreach ( $termchildren as $child ) {
    $option .= '<option value="'.$child->term_id.'">'.$child->name.'</option>';
	}
	
	
	
	return $option;
}
public function get_third_dropdown_values($term_id_business){
	
	
	$orderby = 'name';
	$show_count = 0; 
	$pad_counts = 0;
	$hierarchical = 1; 
	$title = '';
	
	
	 $termchildren_last = get_term_children( $term_id_business, $this->grit_taxonomy_filter_options['taxonomy_name'] );
	

	$option2 = "<option value='null'>Select a value</option>";
	foreach ( $termchildren_last as $child_last ) {
    $term = get_term_by( 'id', $child_last, $this->grit_taxonomy_filter_options['taxonomy_name'] );
     // Skip empty terms
    if( $term->count <= 0 ) {
        continue;
    }
	
    $option2 .= '<option value="'.home_url( '/' ).$this->grit_taxonomy_filter_options['taxonomy_name'].'/'.$term->slug.'"><a href="' . get_term_link( $child_last, $this->grit_taxonomy_filter_options['taxonomy_name'] ) . '">' . $term->name . '</a></option>';
	}
	
	return $option2;
}
public function get_taxonomy_filter_form_data_operation(){
if(isset($_POST['cat'])){
	echo $this->get_second_dropdown_values($_POST['cat']);
}
if(isset($_POST['business_type'])){
	echo $this->get_third_dropdown_values($_POST['business_type']);
}
}

}
?>