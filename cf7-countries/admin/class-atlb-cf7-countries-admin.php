<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://atelierlabo.com
 * @since      1.0.0
 *
 * @package    Cf7_Countries
 * @subpackage Cf7_Countries/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Cf7_Countries
 * @subpackage Cf7_Countries/admin
 * @author     Atelier Labo <wp@atelierlabo.com>
 */
class Atlb_Cf7_Countries_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		
		add_action( 'wpcf7_init', array($this, 'custom_add_form_tag_countries') );
		add_action( 'wpcf7_admin_init', array($this, 'custom_add_menu_tag_countries'), 99999, 0 );	

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
		 * defined in Cf7_Countries_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Cf7_Countries_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/cf7-countries-admin.css', array(), $this->version, 'all' );

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
		 * defined in Cf7_Countries_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Cf7_Countries_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/cf7-countries-admin.js', array( 'jquery' ), $this->version, false );

	}
	
	public function custom_add_form_tag_countries() {
		
		$cf7_countries = new Atlb_Cf7_Countries();
		$plugin_public = new Atlb_Cf7_Countries_Public( $cf7_countries->get_plugin_name(), $cf7_countries->get_version() );
		
	    wpcf7_add_form_tag( array( 'countries', 'countries*' ),
			array($plugin_public, 'custom_add_form_tag_countries_handler'),
			array(
				'name-attr' => true,
				'selectable-values' => true,
			)
		);
	}
	
	public function custom_add_menu_tag_countries() {
		
		$tag_generator = WPCF7_TagGenerator::get_instance();
		$tag_generator->add( 'countries', __( 'countries drop down', $this->plugin_name ), array($this,'custom_add_menu_countries') );
	}
	
	
	public function custom_add_menu_countries( $contact_form, $args = '' ) {
		$args = wp_parse_args( $args, array() );
	
		$description = __( "Generate a form-tag for a Country drop-down menu. For more details, see %s.", 'contact-form-7' );
	
		$desc_link = wpcf7_link( __( 'https://atelierlabo.com/wp/ctf-countries/', 'contact-form-7' ), __( 'CF7 Countries Plugin', 'contact-form-7' ) );
	
		?>
		<div class="control-box">
		<fieldset>
		<legend><?php echo sprintf( esc_html( $description ), $desc_link ); ?></legend>
		
		<table class="form-table">
		<tbody>
			<tr>
			<th scope="row"><?php echo esc_html( __( 'Field type', 'contact-form-7' ) ); ?></th>
			<td>
				<fieldset>
				<legend class="screen-reader-text"><?php echo esc_html( __( 'Field type', 'contact-form-7' ) ); ?></legend>
				<label><input type="checkbox" name="required" /> <?php echo esc_html( __( 'Required field', 'contact-form-7' ) ); ?></label>
				</fieldset>
			</td>
			</tr>
		
			<tr>
			<th scope="row"><label for="<?php echo esc_attr( $args['content'] . '-name' ); ?>"><?php echo esc_html( __( 'Name', 'contact-form-7' ) ); ?></label></th>
			<td><input type="text" name="name" class="tg-name oneline" id="<?php echo esc_attr( $args['content'] . '-name' ); ?>" /></td>
			</tr>
		
			<tr>
			<th scope="row"><?php echo esc_html( __( 'Options', 'contact-form-7' ) ); ?></th>
			<td>
				<fieldset>
				<legend class="screen-reader-text"><?php echo esc_html( __( 'Options', 'contact-form-7' ) ); ?></legend>
				<label><input type="checkbox" name="include_blank" class="option" /> <?php echo esc_html( __( 'Insert a blank item as the first option', 'contact-form-7' ) ); ?></label>
				</fieldset>
			</td>
			</tr>
		
			<tr>
			<th scope="row"><label for="<?php echo esc_attr( $args['content'] . '-id' ); ?>"><?php echo esc_html( __( 'Id attribute', 'contact-form-7' ) ); ?></label></th>
			<td><input type="text" name="id" class="idvalue oneline option" id="<?php echo esc_attr( $args['content'] . '-id' ); ?>" /></td>
			</tr>
		
			<tr>
			<th scope="row"><label for="<?php echo esc_attr( $args['content'] . '-class' ); ?>"><?php echo esc_html( __( 'Class attribute', 'contact-form-7' ) ); ?></label></th>
			<td><input type="text" name="class" class="classvalue oneline option" id="<?php echo esc_attr( $args['content'] . '-class' ); ?>" /></td>
			</tr>
		
		</tbody>
		</table>
		</fieldset>
		</div>
		
		<div class="insert-box">
			<input type="text" name="countries" class="tag code" readonly="readonly" onfocus="this.select()" />
		
			<div class="submitbox">
			<input type="button" class="button button-primary insert-tag" value="<?php echo esc_attr( __( 'Insert Tag', 'contact-form-7' ) ); ?>" />
			</div>
		
			<br class="clear" />
		
			<p class="description mail-tag"><label for="<?php echo esc_attr( $args['content'] . '-mailtag' ); ?>"><?php echo sprintf( esc_html( __( "To use the value input through this field in a mail field, you need to insert the corresponding mail-tag (%s) into the field on the Mail tab.", 'contact-form-7' ) ), '<strong><span class="mail-tag"></span></strong>' ); ?><input type="text" class="mail-tag code hidden" readonly="readonly" id="<?php echo esc_attr( $args['content'] . '-mailtag' ); ?>" /></label></p>
		</div>
		<?php
	}

}
