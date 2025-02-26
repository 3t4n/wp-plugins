<?php
/**
 * Degree of Difficulty for Sensei Controller
 * Where we really
 * - register our taxonomy
 * - do the installation (Add default Degrees of Difficulty to database)
 *
 * @package Degree of Difficulty for Sensei
 */

defined( 'ABSPATH' ) || exit;

/**
 * Degree of Difficulty for Sensei Controller class
 */
class Degree_of_Difficulty_for_Sensei_Controller extends Degree_of_Difficulty_for_Sensei {

	/**
	 * The single instance of Degree_of_Difficulty_for_Sensei_Controller.
	 *
	 * @var    object
	 * @access private
	 * @since  1.0.0
	 */
	private static $_instance = null;

	/**
	 * Degrees of Difficulty taxonomy slug.
	 *
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $slug = 'difficulty';


	/**
	 * Constructor function.
	 *
	 * @link https://wordpress.stackexchange.com/questions/20043/inserting-taxonomy-terms-during-a-plugin-activation
	 *
	 * @access  public
	 * @since   1.0.0
	 *
	 * @param string $file    File pathname.
	 * @param string $version Version number.
	 * @return  void
	 */
	public function __construct( $file = '', $version = '1.0.0' ) {
		parent::__construct( $file, $version );

		register_activation_hook( $this->file, array( $this, 'installation' ) );

		$this->create_taxonomy();

		// @link https://codex.wordpress.org/Function_Reference/register_activation_hook#Process_Flow
		if ( is_admin() &&
			get_option( 'Sensei_Plugin_Not_Activated' ) ) {

			delete_option( 'Sensei_Plugin_Not_Activated' );

			// Display warning to user: should activate Sensei plugin.
			add_action( 'admin_notices', array( $this, 'no_sensei_admin_notice__warning' ) );
		}
	}


	/**
	 * Main Degree_of_Difficulty_for_Sensei_Controller Instance
	 *
	 * Ensures only one instance of Degree_of_Difficulty_for_Sensei_Controller is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @static
	 * @see Degree_of_Difficulty_for_Sensei()
	 *
	 * @param string $file    File pathname.
	 * @param string $version Version number.
	 * @return Main Degree_of_Difficulty_for_Sensei_Controller instance
	 */
	public static function instance( $file = '', $version = '1.0.0' ) {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self( $file, $version );
		}
		return self::$_instance;
	}


	/**
	 * Create our Degrees of Difficulty taxonomy.
	 *
	 * @access  public
	 * @since 1.0.0
	 *
	 * @param bool $now Create Taxonomy now (do not use the init hook).
	 * @return object Taxonomy class object
	 */
	public function create_taxonomy( $now = false ) {

		// Register our taxonomy.
		$taxonomy = parent::register_taxonomy(
			$this->slug,
			__( 'Degrees of Difficulty', 'degree-of-difficulty-for-sensei' ),
			__( 'Degree of Difficulty', 'degree-of-difficulty-for-sensei' ),
			'course',
			array(
				'hierarchical' => false,
			),
			$now
		);

		return $taxonomy;
	}


	/**
	 * Installation. Runs on activation.
	 *
	 * @access  public
	 * @since   1.0.0
	 * @return  bool false if Sensei plugin not activated.
	 */
	public function installation() {

		if ( ! in_array(
			'woothemes-sensei/woothemes-sensei.php',
			apply_filters( 'active_plugins', get_option( 'active_plugins' ) )
		) ) {
			// https://codex.wordpress.org/Function_Reference/register_activation_hook#Process_Flow
			add_option( 'Sensei_Plugin_Not_Activated', true );

			return false;
		}

		// Add default terms on install, but after taxonomy was created.
		$this->_add_default_terms();

		return true;
	}


	/**
	 * Add default Degrees of Difficulty to database:
	 * - Beginner
	 * - Intermediate
	 * - Advanced
	 *
	 * @link https://codex.wordpress.org/Function_Reference/wp_insert_term
	 * @access  public
	 * @since   1.0.0
	 * @return  void
	 */
	private function _add_default_terms() {

		$now = true;

		// Create taxonomy now, not on init hook.
		$this->create_taxonomy( $now );

		$default_terms = array(
			__( 'Beginner', 'Degree_of_Difficulty_for_Sensei' ),
			__( 'Intermediate', 'Degree_of_Difficulty_for_Sensei' ),
			__( 'Advanced', 'Degree_of_Difficulty_for_Sensei' ),
		);

		foreach ( (array) $default_terms as $term ) {

			if ( term_exists( $term, $this->slug ) ) {
				continue;
			}

			wp_insert_term( $term, $this->slug );
		}
	}


	/**
	 * Display warning to user: should activate Sensei plugin.
	 *
	 * @access  public
	 * @since 1.0.0
	 */
	public function no_sensei_admin_notice__warning() {
		?>
		<div class="notice notice-warning">
			<p><strong><?php esc_html_e( 'Degree of Difficulty for Sensei', 'degree-of-difficulty-for-sensei' ); ?></strong>:
			<?php
			esc_html_e(
				'Please activate the Sensei plugin first and then reactivate the plugin.',
				'degree-of-difficulty-for-sensei'
			);
			?>
			</p>
		</div>
		<?php
	}
}
