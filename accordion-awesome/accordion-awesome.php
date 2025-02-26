<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://themesawesome.com/
 * @since             1.0.0
 * @package           Accordion_Awesome
 *
 * @wordpress-plugin
 * Plugin Name:       Accordion Awesome
 * Plugin URI:        https://accordion.themesawesome.com/
 * Description:       WordPress Accordion Plugin
 * Version:           1.0.1
 * Author:            Themes Awesome
 * Author URI:        https://themesawesome.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       accordion-awesome
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'ACCORDION_AWESOME_VERSION', '1.0.1' );

define( 'ACCORDION_AWESOME', __FILE__ );

define( 'ACCORDION_AWESOME_BASENAME', plugin_basename( ACCORDION_AWESOME ) );

define( 'ACCORDION_AWESOME_NAME', trim( dirname( ACCORDION_AWESOME_BASENAME ), '/' ) );

define( 'ACCORDION_AWESOME_DIR', untrailingslashit( dirname( ACCORDION_AWESOME ) ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-accordion-awesome-activator.php
 */
function activate_accordion_awesome() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-accordion-awesome-activator.php';
	Accordion_Awesome_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-accordion-awesome-deactivator.php
 */
function deactivate_accordion_awesome() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-accordion-awesome-deactivator.php';
	Accordion_Awesome_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_accordion_awesome' );
register_deactivation_hook( __FILE__, 'deactivate_accordion_awesome' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-accordion-awesome.php';

require plugin_dir_path( __FILE__ ) . 'accordion-awesome-post-type.php';

require_once plugin_dir_path( __FILE__ ) . 'includes/element-helper.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/hover-collections.php';
require_once plugin_dir_path( __FILE__ ) . 'public/partials/get-views-part.php';

function accordion_awesome_new_elements() {
	require_once plugin_dir_path( __FILE__ ) . 'elementor-widgets/accordions/accordion-control.php';
}

add_action( 'elementor/widgets/widgets_registered', 'accordion_awesome_new_elements' );

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_accordion_awesome() {

	$plugin = new Accordion_Awesome();
	$plugin->run();

}
run_accordion_awesome();

add_filter( 'manage_accordion-awesome_posts_columns', function( $columns ) {
	return array_merge( $columns, ['shortcode' => esc_html__( 'Shortcode', 'accordion-awesome' )] );
});

add_action( 'manage_accordion-awesome_posts_custom_column', function($column_key, $post_id) {
	echo '<pre"><code>[accordion_awesome id="'. esc_attr( $post_id ) .'"]</code></pre>';
}, 10, 2);

add_filter( 'single_template', 'accordion_awesome_post_custom_template', 50, 1 );
function accordion_awesome_post_custom_template( $template ) {

	if ( is_singular( 'accordion-awesome' ) ) {
		$template = ACCORDION_AWESOME_DIR . '/single-accordion-awesome.php';
	}

	return $template;
}

// carbon fields init
add_action( 'after_setup_theme', 'accordion_awesome_crb_load' );
function accordion_awesome_crb_load() {
	require_once( 'vendor/autoload.php' );
	\Carbon_Fields\Carbon_Fields::boot();
}

add_action( 'elementor/preview/enqueue_styles', function() {
	wp_enqueue_style( 'ta-accordion-awesome-swiper', plugin_dir_url( __FILE__ ) . 'public/css/swiper.css', array(), '', 'all' );
	wp_enqueue_style( 'ta-accordion-awesome-hovers', plugin_dir_url( __FILE__ ) . 'public/css/hovers.css', array(), '', 'all' );
	wp_enqueue_style( 'ta-accordion-awesome-fontawesome', plugin_dir_url( __FILE__ ) . 'public/css/fontawesome.min.css', array(), '', 'all' );
	wp_enqueue_style( 'ta-accordion-awesome-thaw-flexgrid', plugin_dir_url( __FILE__ ) . 'public/css/thaw-flexgrid.css', array(), '', 'all' );
	wp_enqueue_style( 'ta-accordion-awesome', plugin_dir_url( __FILE__ ) . 'public/css/accordion-awesome-public.css', array(), '1.0.0', 'all' );

	wp_enqueue_script( 'ta-accordion-awesome-stopExecution', plugin_dir_url(__FILE__ ) . 'public/js/stopExecution.js', array( 'jquery' ), '', false );
} );

/* Shortcode Function */
function accordion_awesome( $atts ) {

	// Get Attributes
	extract(
		shortcode_atts(
			array(
				'id' => ''   // DEFAULT SLUG SET TO EMPTY
			),
			$atts
		)
	);

	// WP_Query arguments
	$args = array (
		'page_id'   =>  $id,     // GET POST BY SLUG  // IGNORE IF YOU ARE GETTING ERROR ON THIS LINE IN YOUR EDITOR
		'post_type' => 'accordion-awesome', // YOUR POST TYPE

	);
	ob_start();

	// The Query
	$query = new WP_Query( $args );

	// The Loop
	if ( $query->have_posts() && $id != '' ) {

		wp_enqueue_style( 'ta-accordion-awesome-fontawesome', plugin_dir_url(__FILE__ ) . 'public/css/fontawesome.min.css', array(), '', 'all' );
		wp_enqueue_style( 'ta-accordion-awesome-thaw-flexgrid', plugin_dir_url(__FILE__ ) . 'public/css/thaw-flexgrid.css', array(), '', 'all' );
		wp_enqueue_style( 'ta-accordion-awesome', plugin_dir_url(__FILE__ ) . 'public/css/accordion-awesome-public.css', array(), '1.0.0', 'all' );

		while ( $query->have_posts() ) {

		$query->the_post();

			$accordion_style = carbon_get_post_meta( get_the_ID(), 'accordion_style_choice' );

			if ( $accordion_style == 'accordion-style-2' ) {
				$accordion_style_part = dirname( __FILE__ ) . '/public/accordion-styles/accordion-style-2.php';
			} elseif ( $accordion_style == 'accordion-style-7' ) {
				$accordion_style_part = dirname( __FILE__ ) . '/public/accordion-styles/accordion-style-7.php';
			} elseif ( $accordion_style == 'accordion-style-9' ) {
				$accordion_style_part = dirname( __FILE__ ) . '/public/accordion-styles/accordion-style-9.php';
			} elseif ( $accordion_style == 'accordion-style-13-checkboxes' ) {
				$accordion_style_part = dirname( __FILE__ ) . '/public/accordion-styles/accordion-style-13-checkboxes.php';
			} elseif ( $accordion_style == 'accordion-style-13-radiobuttons' ) {
				$accordion_style_part = dirname( __FILE__ ) . '/public/accordion-styles/accordion-style-13-radiobuttons.php';
			}
			ob_start();
			include_once $accordion_style_part;
			$content = ob_get_clean();
			return $content;
		}
	} else {
		// no posts found
		return esc_html__( 'Sorry You have set no html for this slug...', 'accordion-awesome' );
	}
	// Restore original Post Data
	wp_reset_postdata();
}
add_shortcode( 'accordion_awesome', 'accordion_awesome' );

function accordion_awesome_select_accordion_post() {
	$accordions_array = array();

	$args = array(
		'posts_per_page' => -1,
		'post_type' => 'accordion-awesome',
	);

	$accordions = get_posts($args);

	foreach( $accordions as $post ) { setup_postdata( $post );
		$accordions_array[$post->ID] = $post->post_title;
	}

	return $accordions_array;

	wp_reset_postdata();
}


add_action('wp_head', 'accordion_awesome_color_custom_styles', 100);
function accordion_awesome_color_custom_styles()
{
	$accordion_awesome_custom_args = array(
	'post_type'         => 'accordion-awesome',
	'posts_per_page'    => -1,
	);
	$accordion_awesome_custom = new WP_Query($accordion_awesome_custom_args);
	if ($accordion_awesome_custom->have_posts()) : ?>

	<style>
		<?php while($accordion_awesome_custom->have_posts()) : $accordion_awesome_custom->the_post();

		$accordion_title_color = carbon_get_post_meta( get_the_ID(), 'accordion_title_color' );
		$accordion_hover_title = carbon_get_post_meta( get_the_ID(), 'accordion_hover_title' );
		$accordion_description_color = carbon_get_post_meta( get_the_ID(), 'accordion_description_color' );
		$accordion_icon_color = carbon_get_post_meta( get_the_ID(), 'accordion_icon_color' );
		
		$accordion_icon_color2 = carbon_get_post_meta( get_the_ID(), 'accordion_icon_color' );
		$accordion_header_name_color = carbon_get_post_meta( get_the_ID(), 'accordion_header_name_color' );

		// Style 2
		$accordion_name_color_hover_active = carbon_get_post_meta( get_the_ID(), 'accordion_title_hover' );

		// Style 7
		$accordion_border_color = carbon_get_post_meta( get_the_ID(), 'accordion_border_color' );
		
		$accordion_header_border_color = carbon_get_post_meta( get_the_ID(), 'accordion_header_border_color' );

		// style 12

		// style 13
		$accordion_background_active = carbon_get_post_meta( get_the_ID(), 'accordion_background_active' );
		$accordion_background_color = carbon_get_post_meta( get_the_ID(), 'accordion_background_color' );

		$accordion_background_hover_color = carbon_get_post_meta( get_the_ID(), 'accordion_background_hover_color' );
		$accordion_inner_background_color = carbon_get_post_meta( get_the_ID(), 'accordion_inner_background_color' );

		// layout
		$accordion_width_container = carbon_get_post_meta( get_the_ID(), 'accordion_width_container' );

		?>
		<?php if(!empty($accordion_title_color)) { ?>
		.accordion-post-<?php echo esc_attr(get_the_ID()); ?> .accordion-name h1, .accordion-post-<?php echo esc_attr(get_the_ID()); ?> .accordion-name,
		.accordion-post-<?php echo esc_attr(get_the_ID()); ?> .accordion-style-sapuluh .acc_ctrl .accordion-name h3,
		.accordion-post-<?php echo esc_attr(get_the_ID()); ?> .accordion-style-tilubelas .accordion-name {
			color: <?php echo esc_html($accordion_title_color); ?>;
		}
		<?php } ?>

		<?php if(!empty($accordion_hover_title)) { ?>
		.accordion-post-<?php echo esc_attr(get_the_ID()); ?> .accordion-style-tilubelas .ac-container label:hover .accordion-name,
		.accordion-post-<?php echo esc_attr(get_the_ID()); ?>  .accordion-style-tilubelas .ac-container input:checked+label .accordion-name {
			color: <?php echo esc_html($accordion_hover_title); ?>;
		}
		<?php } ?>

		<?php if(!empty($accordion_description_color)) { ?>
		.accordion-post-<?php echo esc_attr(get_the_ID()); ?> .accordion-description p, 
		.accordion-post-<?php echo esc_attr(get_the_ID()); ?> p.accordion-description,
		.accordion-post-<?php echo esc_attr(get_the_ID()); ?> .accordion-style-duabelas .accordion-description p,
		.accordion-post-<?php echo esc_attr(get_the_ID()); ?> .accordion-description {
			color: <?php echo esc_html($accordion_description_color); ?>;
		}
		<?php } ?>

		<?php if(!empty($accordion_icon_color)) { ?>
		.accordion-post-<?php echo esc_attr(get_the_ID()); ?> ul li i:before, .accordion-post-<?php echo esc_attr(get_the_ID()); ?>  ul li i:after,
		.accordion-post-<?php echo esc_attr(get_the_ID()); ?> .accordion-style-sapuluh .acc_ctrl:after,
		.accordion-post-<?php echo esc_attr(get_the_ID()); ?> .accordion-style-sapuluh .acc_ctrl:before {
			background-color: <?php echo esc_html($accordion_icon_color); ?>;
		}

		.accordion-post-<?php echo esc_attr(get_the_ID()); ?> .accordion-style-salapan .accordion-label:before {
			border-left-color: <?php echo esc_html($accordion_icon_color); ?>;
		}

		.accordion-post-<?php echo esc_attr(get_the_ID()); ?> .accordion-style-sabelas label>span {
			color: <?php echo esc_html($accordion_icon_color); ?>;
		}

		.accordion-post-<?php echo esc_attr(get_the_ID()); ?> .accordion-style-dua .st-accordion ul li>a span,
		.accordion-post-<?php echo esc_attr(get_the_ID()); ?> .accordion-style-tilubelas .ac-container label:hover:after, .accordion-post-<?php echo esc_attr(get_the_ID()); ?> .accordion-style-tilubelas .ac-container input:checked+label:hover:after {
			color: <?php echo esc_html($accordion_icon_color); ?>;
		}

		.accordion-post-<?php echo esc_attr(get_the_ID()); ?> .accordion-style-duabelas ul li i:before, .accordion-post-<?php echo esc_attr(get_the_ID()); ?> .accordion-style-duabelas ul li i:after {
			background-color: <?php echo esc_html($accordion_icon_color); ?>;
		}

		.accordion-post-<?php echo esc_attr(get_the_ID()); ?> .accordion-style-vertical .va-nav span svg path {
			fill: <?php echo esc_html($accordion_icon_color); ?>;
		}
		<?php } ?>

		<?php if(!empty($accordion_header_border_color)) { ?>
			.accordion-post-<?php echo esc_attr(get_the_ID()); ?> .accordion-wrapper {
				box-shadow: 0 10px 0 0 <?php echo esc_html($accordion_header_border_color); ?> inset ;
			}
		<?php } ?>


		<?php if(!empty($accordion_border_color)) { ?>

		.accordion-post-<?php echo esc_attr(get_the_ID()); ?> .accordion-style-dua .st-accordion > ul > li,
		.accordion-post-<?php echo esc_attr(get_the_ID()); ?> .accordion-style-tujuh ul li,
		.accordion-post-<?php echo esc_attr(get_the_ID()); ?> .accordion-style-salapan .accordion-item,
		.accordion-post-<?php echo esc_attr(get_the_ID()); ?> .accordion-style-sapuluh .acc_ctrl,
		.accordion-post-<?php echo esc_attr(get_the_ID()); ?> .accordion-style-duabelas ul li,
		.accordion-post-<?php echo esc_attr(get_the_ID()); ?> .accordion-style-tilubelas .ac-container label,
		.accordion-post-<?php echo esc_attr(get_the_ID()); ?> .accordion-style-dalapan input:checked+.box .box-title,
		.accordion-post-<?php echo esc_attr(get_the_ID()); ?> .accordion-style-salapan .accordion {
			border-color: <?php echo esc_html($accordion_border_color); ?>;
		}

		.accordion-post-<?php echo esc_attr(get_the_ID()); ?> .accordion-style-sabelas .nav a, 
		.accordion-post-<?php echo esc_attr(get_the_ID()); ?> .accordion-style-sabelas .nav label {
			box-shadow: inset 0 -1px <?php echo esc_html($accordion_border_color); ?>;
		}

		.accordion-post-<?php echo esc_attr(get_the_ID()); ?> .accordion-style-dalapan .box::before {
			box-shadow: 0 -1px 0 <?php echo esc_html($accordion_border_color); ?>, 0 0 2px rgb(0 0 0 / 12%), 0 2px 4px rgb(0 0 0 / 24%);
		}
		<?php } ?>

		<?php if(!empty($accordion_header_name_color)) { ?>
		.accordion-post-<?php echo esc_attr(get_the_ID()); ?> .accordion-style-tujuh .header-name h1,
		.accordion-post-<?php echo esc_attr(get_the_ID()); ?> .accordion-style-dalapan .header-name h1 {
			color: <?php echo esc_html($accordion_header_name_color); ?>;
		}
		<?php } ?>

		<?php if(!empty($accordion_name_color_hover_active)) { ?>
		.accordion-post-<?php echo esc_attr(get_the_ID()); ?> .accordion-style-dua .st-accordion ul li>a:hover,
		.accordion-post-<?php echo esc_attr(get_the_ID()); ?> .accordion-style-dua .st-accordion ul li.st-open>a {
			color: <?php echo esc_html($accordion_name_color_hover_active); ?>;
		}
		<?php } ?>

		<?php if(!empty($accordion_icon_color)) { ?>
		.accordion-post-<?php echo esc_attr(get_the_ID()); ?> .arrows section .box-title:before {
		color: <?php echo esc_html($accordion_icon_color); ?>;
		}
		<?php } ?>

		<?php if(!empty($accordion_background_active)) { ?>
		.accordion-post-<?php echo esc_attr(get_the_ID());?> .ac-container input:checked+label{
		background: <?php echo esc_html($accordion_background_active); ?>;
		}
		<?php } ?>

		<?php if(!empty($accordion_width_container)) { ?>
		.accordion-post-<?php echo esc_attr(get_the_ID());?> .accordion-style-hiji .ia-container,
		.accordion-post-<?php echo esc_attr(get_the_ID());?> .accordion-style-dua .wrapper,
		.accordion-post-<?php echo esc_attr(get_the_ID());?> .va-container,
		.accordion-post-<?php echo esc_attr(get_the_ID());?> .accordion-wrapper,
		.accordion-post-<?php echo esc_attr(get_the_ID());?> .accordion-style-dalapan,
		.accordion-post-<?php echo esc_attr(get_the_ID());?> .accordion-style-salapan .accordion,
		.accordion-post-<?php echo esc_attr(get_the_ID());?> .accordion-style-sapuluh .container,
		.accordion-post-<?php echo esc_attr(get_the_ID());?> .accordion-style-sabelas .banner,
		.accordion-post-<?php echo esc_attr(get_the_ID());?> .accordion-style-duabelas #wrapper,
		.accordion-post-<?php echo esc_attr(get_the_ID());?> .accordion-style-tilubelas .ac-container {
			max-width: <?php echo intval($accordion_width_container); ?>px;
		}
		<?php } ?>

		<?php if(!empty($accordion_background_color)) { ?>
		.accordion-post-<?php echo esc_attr(get_the_ID());?> .accordion-wrapper,
		.accordion-post-<?php echo esc_attr(get_the_ID());?> .accordion-style-dalapan .box,
		.accordion-post-<?php echo esc_attr(get_the_ID());?> .accordion-style-salapan .accordion,
		.accordion-post-<?php echo esc_attr(get_the_ID());?> .accordion-style-sapuluh .acc_ctrl,
		.accordion-post-<?php echo esc_attr(get_the_ID());?> .accordion-style-sabelas .nav a, 
		.accordion-post-<?php echo esc_attr(get_the_ID());?> .accordion-style-sabelas .nav label,
		.accordion-post-<?php echo esc_attr(get_the_ID());?> .accordion-style-duabelas #wrapper {
			background-color: <?php echo esc_html($accordion_background_color); ?>;
		}

		.accordion-post-<?php echo esc_attr(get_the_ID());?> .accordion-style-tilubelas .ac-container label {
			background: <?php echo esc_html($accordion_background_color); ?>;
		}
		<?php } ?>

		<?php if($accordion_background_hover_color) { ?>
		.accordion-post-<?php echo esc_attr(get_the_ID());?> .accordion-style-sabelas .nav a:focus, 
		.accordion-post-<?php echo esc_attr(get_the_ID());?> .accordion-style-sabelas .nav a:hover, 
		.accordion-post-<?php echo esc_attr(get_the_ID());?> .accordion-style-sabelas .nav label:focus, 
		.accordion-post-<?php echo esc_attr(get_the_ID());?> .accordion-style-sabelas .nav label:hover {
			background-color: <?php echo esc_html($accordion_background_hover_color); ?>;
		}

		.accordion-post-<?php echo esc_attr(get_the_ID());?> .accordion-style-tilubelas .ac-container label:hover,
		.accordion-post-<?php echo esc_attr(get_the_ID());?> .accordion-style-tilubelas .ac-container input:checked+label, 
		.accordion-post-<?php echo esc_attr(get_the_ID());?> .accordion-style-tilubelas .ac-container input:checked+label:hover {
			background: <?php echo esc_html($accordion_background_hover_color); ?>;
		}
		<?php } ?>

		<?php if(!empty($accordion_inner_background_color)) { ?>
		.accordion-post-<?php echo esc_attr(get_the_ID());?> .accordion-style-salapan input[type=checkbox]:checked~.accordion-child,
		.accordion-post-<?php echo esc_attr(get_the_ID());?> .accordion-style-sapuluh .acc_panel,
		.accordion-post-<?php echo esc_attr(get_the_ID());?> .accordion-style-sabelas .nav__list input[type=checkbox]:checked+label+ul {
			background-color: <?php echo esc_html($accordion_inner_background_color); ?>;
		}

		.accordion-post-<?php echo esc_attr(get_the_ID());?> .accordion-style-tilubelas .ac-container .ac-small {
			background: <?php echo esc_html($accordion_inner_background_color); ?>;
		}
		<?php } ?>


		<?php endwhile; wp_reset_postdata(); ?>
	</style>

	<?php endif;
}
