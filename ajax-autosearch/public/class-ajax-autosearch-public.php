<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://catchplugins.com/plugins/ajax-autosearch
 * @since      1.0.0
 *
 * @package    Ajax_AutoSearch
 * @subpackage Ajax_AutoSearch/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Ajax_AutoSearch
 * @subpackage Ajax_AutoSearch/public
 * @author     Catch Plugins <info@catchplugins.com>
 */
class Ajax_AutoSearch_Public {

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
	 * @param      string $plugin_name       The name of the plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;
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
		 * defined in Ajax_AutoSearch_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ajax_AutoSearch_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_style( 'ajax-autosearch', AJAX_AUTOSEARCH_URL . 'public/css/ajax-autosearch-public.css', array( 'dashicons' ), '1.0.0', 'all' );

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
		 * defined in Ajax_AutoSearch_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ajax_AutoSearch_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		$options = ajax_autosearch_get_options();
		wp_register_script( 'ajax-autosearch', AJAX_AUTOSEARCH_URL . 'public/js/ajax-autosearch-public.js', array( 'jquery' ), '1.0.0', false );
		$args = array(
			'public'   => true,
			'_builtin' => true,
		);

		$post_type  = get_post_types( $args );
		$categories = get_categories();
		$tags       = get_tags();

		$ajax_object = array(
			'home_url'        => home_url( '?s=' ),
			'ajax_url'        => admin_url( 'admin-ajax.php' ),
			'post_type'       => $post_type,
			'categories'      => $categories,
			'tags'            => $tags,
			'options'         => $options,
			'no_result_found' => esc_html__( 'No results found', 'ajax-autosearch' ),
			'more_button'     => esc_html__( 'See more results', 'ajax-autosearch' ),
		);

		wp_localize_script( 'ajax-autosearch', 'ajax_object', $ajax_object );
		wp_enqueue_script( 'ajax-autosearch' );
	}

	/**
	 * Search Function.
	 *
	 * @since    1.0.0
	 */
	public function search() {
		$options   = ajax_autosearch_get_options();
		$query     = $_POST['query'];
		$post_type = $_POST['post_type'];
		$category  = $_POST['category'];
		$tag       = $_POST['tag'];
		$limit     = $options['limit'];

		$args = array(
			'post_type'      => $post_type,
			'post_status'    => 'publish',
			's'              => $query,
			'posts_per_page' => $limit,
			'category__and'  => $category,
			'tag__in'        => $tag,
		);

		$search = new WP_Query( $args );
		ob_start();

		if ( $search->have_posts() ) :
			?>

			<?php
			while ( $search->have_posts() ) :
				$search->the_post();
				?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<?php if ( has_post_thumbnail() && ( '1' == $options['show_featured_image'] ) ) { ?>
						<div class="ac-thumbnail">
							<a href="<?php echo esc_url( get_permalink() ); ?>">
							<?php
								$post = null;
								$size = 'large';
								$attr = '';
								echo get_the_post_thumbnail( $post, $size, $attr );
							?>
							</a>
						</div>
						<?php } elseif ( '1' == $options['show_featured_image'] ) { ?>
						<div class="ac-thumbnail">
							<a href="<?php echo esc_url( get_permalink() ); ?>">
								<img src="<?php echo AJAX_AUTOSEARCH_URL . 'public/images/no-thumb.jpg'; ?>">
							</a>
						</div>
						<?php } ?>
						<header class="entry-header">
							<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
						</header><!-- .entry-header -->
					</article><!-- #post-## -->
				<?php
					endwhile;
		else :
			get_template_part( 'no-results', 'search' );
		endif;

		$content = ob_get_clean();

		echo wp_kses_post( $content );

		// this is required to terminate immediately and return a proper response.
		wp_die();
	}

}
