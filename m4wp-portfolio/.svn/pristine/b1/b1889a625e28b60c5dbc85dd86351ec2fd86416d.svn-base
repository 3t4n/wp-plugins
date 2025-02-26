<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://made4wp.com
 * @since      1.0.0
 * @package    M4WP Portfolio
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    M4WP Portfolio

 */
class M4wp_Portfolio_Admin {

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
   * Post Type
   *
   * @since 1.0.0
   *
   * @type class
   */
  private $post_type;

  /**
   * Taxonomy Type
   *
   * @since 1.0.0
   *
   * @type class
   */
  private $taxonomy_type;


  /**
   * Initialize the class and set its properties.
   *
   * @since    1.0.0
   * @param      string    $plugin_name       The name of this plugin.
   * @param      string    $version    The version of this plugin.
   */
  public function __construct( $plugin_name, $version ) {

    $this->plugin_name = $plugin_name;
    $this->version = $version;

    $this->post_type = new M4wp_Portfolio_Post_Type;
    $this->taxonomy_category = new M4wp_Portfolio_Taxonomy_Category;
    $this->taxonomy_tag = new M4wp_Portfolio_Taxonomy_Tag;

  }

  /**
   * Register the stylesheets for the admin area.
   *
   * @since    1.0.0
   */
  public function enqueue_styles() {

    /**
     * This function is provided for demonstration purposes only.
     *
     * An instance of this class should be passed to the run() function
     * defined in M4wp_Portfolio_Loader as all of the hooks are defined
     * in that particular class.
     *
     * The M4wp_Portfolio_Loader will then create the relationship
     * between the defined hooks and the functions defined in this
     * class.
     */

    wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/m4wp-portfolio-admin.css', array(), $this->version, 'all' );

  }

  /**
   * Register the JavaScript for the admin area.
   *
   * @since    1.0.0
   */
  public function enqueue_scripts() {

    /**
     * This function is provided for demonstration purposes only.
     *
     * An instance of this class should be passed to the run() function
     * defined in M4wp_Portfolio_Loader as all of the hooks are defined
     * in that particular class.
     *
     * The M4wp_Portfolio_Loader will then create the relationship
     * between the defined hooks and the functions defined in this
     * class.
     */

    wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/m4wp-portfolio-admin.js', array( 'jquery' ), $this->version, false );

  }

  /**
   * Register custom post type Portfolio and taxonomies.
   *
   * @since    1.0.0
   */
  public function register_post_type() {

    register_post_type( 'portfolio', $this->post_type->default_args() );
    register_taxonomy( 'portfolio_category', array( 'portfolio' ), $this->taxonomy_category->default_args() );
    register_taxonomy( 'portfolio_tag', array( 'portfolio' ), $this->taxonomy_tag->default_args() );

  }

  /**
   * Register custom post type Portfolio.
   *
   * @since    1.0.0
   */
  public function get_messages() {

    $this->post_type->messages();

  }

  /**
   * Add Portfolio Item Info meta boxes.
   *
   * @since    1.0.0
   */
  public function add_portfolio_item_details_meta_box() {

    add_meta_box( 'm4wp_portfolio_item_details_meta_box', esc_html__( 'Portfolio Item Details', 'm4wp-portfolio' ), array( $this, 'print_portfolio_item_details_meta_box' ), 'portfolio', 'side', 'core' );

  }

  /**
   * Print Portfolio Item Info meta boxes.
   *
   * @since    1.0.0
   */
  public function print_portfolio_item_details_meta_box( $object, $box ) {

    wp_nonce_field( basename( __FILE__ ), 'm4wp_portfolio_item_details_meta_box_nonce' );

    ?>
    <p>
      <label for="m4wp_portfolio_item_details_client"><?php esc_html_e( 'Client:', 'm4wp-portfolio' ); ?></label>
      <br />
      <input class="widefat" type="text" name="m4wp_portfolio_item_details_client" id="m4wp_portfolio_item_details_client" value="<?php echo esc_attr( get_post_meta( $object->ID, 'm4wp_portfolio_item_details_client', true ) ); ?>" size="30" />
    </p>
    <?php

  }

  /**
   * Save Portfolio Item Info meta box.
   *
   * @since    1.0.0
   */
  public function save_portfolio_item_details_meta_box( $post_id, $post ) {

    /* Verify the nonce before proceeding. */
    if ( !isset( $_POST['m4wp_portfolio_item_details_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['m4wp_portfolio_item_details_meta_box_nonce'], basename( __FILE__ ) ) )
      return $post_id;

    /* Check autosave. */
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
      return $post_id;

    /* Get the post type object. */
    $post_type = get_post_type_object( $post->post_type );

    /* Check if the current user has permission to edit the post. */
    if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
      return $post_id;

    // List of meta keys
    $project_meta_keys = array(
      'm4wp_portfolio_item_details_client'
    );

    // Loop through fields
    foreach ( $project_meta_keys as $project_meta_key ) {

      /* Get the posted data and sanitize it for use as a link. */
      $new_meta_value = ( isset( $_POST[ $project_meta_key ] ) ? wp_filter_nohtml_kses( $_POST[ $project_meta_key ] ) : '' );

      $meta_key = $project_meta_key;

      /* Get the meta value of the custom field key. */
      $meta_value = get_post_meta( $post_id, $meta_key, true );

      /* If a new meta value was added and there was no previous value, add it. */
      if ( $new_meta_value && '' == $meta_value )
        add_post_meta( $post_id, $meta_key, $new_meta_value, true );

      /* If the new meta value does not match the old value, update it. */
      elseif ( $new_meta_value && $new_meta_value !== $meta_value )
        update_post_meta( $post_id, $meta_key, $new_meta_value );

      /* If there is no new meta value but an old value exists, delete it. */
      elseif ( '' == $new_meta_value && $meta_value )
        delete_post_meta( $post_id, $meta_key, $meta_value );
    }

  }

}
