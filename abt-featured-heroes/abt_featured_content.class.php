<?php
/**
 * Core class
 */
class abt_featured_content
{
	private $MENU_SLUG = true;

    public function __construct( $type_name, $singular, $plural = NULL, $menu = true ) {
		$this->postType  = $type_name;
		$this->singular  = $singular;
		$this->plural    = ( NULL === $plural ? $singular . 's' : $plural );
		$this->MENU_SLUG = $menu;
		
		if( is_admin() ){
			add_action( 'admin_init', array( &$this, 'admin_init' ) );
			add_action( 'save_post', array( &$this, 'on_save' ) );
		}
		
		add_action( 'init', array( &$this, 'init' ) );
		
		// support featured image for this post type
		// @reference http://codex.wordpress.org/Function_Reference/add_theme_support
		if ( function_exists( 'add_theme_support' ) ) {
			add_theme_support( 'post-thumbnails', array( $this->postType ) );
		}
	}
	
	public function init(){
		$this->add_type();
		
		// Set Heroes size IF it hasn't been set previously in a child theme!
		global $_wp_additional_image_sizes;
		if ( !isset( $_wp_additional_image_sizes['hero'] ) ) {
			add_image_size( 'hero', 960, 400, true );
		}
	}
	public function admin_init(){
		$this->add_type_boxes();
	}
	
	
	#region ================== Heroes (slides) ===============
	
	protected $postType;
	protected $singular;
	protected $plural;
	
	
	/**
	 * Creates the custom post type
	 */
	public function add_type() {
		register_post_type(
		    $this->postType,
		    array(
				'label'           => $this->plural,
				'description'     => '',
				'public'          => true,
				'show_ui'         => true,
				'show_in_menu'    => $this->MENU_SLUG,
				'capability_type' => 'post',
				'hierarchical'    => false,
				'rewrite'         => array( 'slug' => $this->postType, 'with_front' => false ),
				'query_var'       => true,
				'menu_icon'       => plugins_url( 'i_' . $this->postType . '.png', __FILE__ ),
				'supports'        => array( 'title', 'editor', 'page-attributes', 'thumbnail' ),
				'labels'          => array (
					'name'               => $this->plural,
					'singular_name'      => $this->singular,
					'menu_name'          => $this->plural,
					'add_new'            => 'Add ' . $this->singular,
					'add_new_item'       => 'Add New ' . $this->singular,
					'edit'               => 'Edit',
					'edit_item'          => 'Edit ' . $this->singular,
					'new_item'           => 'New ' . $this->singular,
					'view'               => 'View ' . $this->singular,
					'view_item'          => 'View ' . $this->singular,
					'search_items'       => 'Search ' . $this->plural,
					'not_found'          => 'No ' . $this->plural . ' Found',
					'not_found_in_trash' => 'No ' . $this->plural . ' Found in Trash',
					'parent'             => 'Parent ' . $this->singular,
				),
			)
		);
	}
	public function add_type_boxes(){
		add_meta_box(
		    $this->postType . '_options',
		    __( $this->singular . ' Options', 'snapsite' ),
		    array( &$this, 'meta_boxes' ),
		    $this->postType,
		    'normal',
		    'default'
	    );
	}
	
	public function meta_boxes(){
		global $post;
		//get the values
		$meta = get_post_meta( $post->ID, $this->postType, true );
		if ( empty( $meta ) ) {
		    $meta = array( 'text' => '', 'link' => '' );	// prevent warnings
		}
		
		wp_nonce_field( $this->postType . '-nonce',  $this->postType . '-nonce' );
		?>
		
        <div class="field">
        	<label for="<?php echo $this->postType; ?>-text">Button Text:</label>
        	<input type="text" id="<?php echo $this->postType; ?>-text" name="<?php echo $this->postType; ?>[text]" value="<?php echo $meta['text']; ?>" />
            <em class="summary">What do you want the button to say? Leave blank if you don't want a button.</em>
        </div>
        <div class="field">
        	<label for="<?php echo $this->postType; ?>-link">Button Link:</label>
        	<input type="text" id="<?php echo $this->postType; ?>-link" name="<?php echo $this->postType; ?>[link]" value="<?php echo $meta['link']; ?>" />
            <em class="summary">Example: http://wordpress.org/ — don’t forget the http://</em>
        </div>
		<?php
	}//---	function add_boxes

	function on_save( $id ) {
		
		//nothing to do?
		if( !isset( $_POST[$this->postType] ) ) {
			return $id;
		}
		
		$meta = $_POST[$this->postType];
		
		if ( !wp_verify_nonce( $_POST["{$this->postType}-nonce"], "{$this->postType}-nonce" ) ) {
		    return $id; //nonce
		}
		
		update_post_meta( $id, $this->postType, $meta );
	}//--	function save

	#endregion =============== Heroes (slides) ================

}///---	class	abt_featured_content
?>