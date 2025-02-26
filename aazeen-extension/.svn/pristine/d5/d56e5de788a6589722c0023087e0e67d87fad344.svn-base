<?php
/**
 * All functions for Aazeen extension
 *
 *
 * @package     Aazeen extension
 * @category    Core
 * @author      Themez WP
 * @copyright   Copyright (c) 2017, Themez WP
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       1.0
 */

 // Exit if accessed directly.
 if ( ! defined( 'ABSPATH' ) ) {
 	exit;
 }


/**
* Prints first category link and name
*/
if (! function_exists('aazeen_extension_firstcategory_link')) :
function aazeen_extension_firstcategory_link()
{
    $categories = get_the_category();
    if (! empty($categories)) {
        echo  '<a class="cat-info-el hollow button secondary radius" href="' . esc_url(get_category_link($categories[0]->term_id)) . '">' . esc_html($categories[0]->name) . '</a>';
    }
}
endif;

	/**
	*  thumbnail on  product carousel
	*/
	function aazeen_extension_woocommerce_template_carousel_product_thumbnail()
	{
		$thumbnail = get_the_post_thumbnail(null, 'aazeen-shop', array('class' => 'object-fit-images'));
		if (empty($thumbnail) && function_exists('wc_placeholder_img')) {
			$thumbnail = wc_placeholder_img();
		}
		if (! empty($thumbnail)) {
			?>
			<div class="view">
				<a href="<?php echo esc_url(get_permalink()); ?>" title="<?php the_title_attribute(); ?>">
					<?php echo wp_kses_post($thumbnail); ?>
				</a>
			</div>
			<?php
		}
	}

// Print categories for widgets
if (! function_exists('aazeen_extensioncategory_widgtesmission')) :
function aazeen_extensioncategory_widgtesmission()
{
    $categories = get_the_category();

    $output = '';

    $separator = '';
    if (! empty($categories)) {
        foreach ($categories as $category) {
            $output .=
						'<a class="label primary" href="' . esc_url(get_category_link($category->term_id)) .
						'" alt="' . esc_attr(sprintf(__('View all posts in %s', 'aazeen-extension'), $category->name)) . '">' . esc_html($category->name) . '</a>' . $separator;
        }
    }
    echo trim($output, $separator);
}
endif;

/* Function which displays your post date in time ago format */
function aazeen_extension_time_ago()
{
    return human_time_diff(get_the_time('U'), current_time('timestamp')).' '.esc_html__('ago', 'aazeen-extension');
}


/**
 * Returns an array of all available variants.
 *
 * @static
 * @access public
 * @return array
 */
 function get_all_variants_aazeen() {
  return array(
    '100'       => esc_attr__( 'Ultra-Light 100', 'aazeen-extension' ),
    '100light'  => esc_attr__( 'Ultra-Light 100', 'aazeen-extension' ),
    '100italic' => esc_attr__( 'Ultra-Light 100 Italic', 'aazeen-extension' ),
    '200'       => esc_attr__( 'Light 200', 'aazeen-extension' ),
    '200italic' => esc_attr__( 'Light 200 Italic', 'aazeen-extension' ),
    '300'       => esc_attr__( 'Book 300', 'aazeen-extension' ),
    '300italic' => esc_attr__( 'Book 300 Italic', 'aazeen-extension' ),
    '400'       => esc_attr__( 'Normal 400', 'aazeen-extension' ),
    'regular'   => esc_attr__( 'Normal 400', 'aazeen-extension' ),
    'italic'    => esc_attr__( 'Normal 400 Italic', 'aazeen-extension' ),
    '500'       => esc_attr__( 'Medium 500', 'aazeen-extension' ),
    '500italic' => esc_attr__( 'Medium 500 Italic', 'aazeen-extension' ),
    '600'       => esc_attr__( 'Semi-Bold 600', 'aazeen-extension' ),
    '600bold'   => esc_attr__( 'Semi-Bold 600', 'aazeen-extension' ),
    '600italic' => esc_attr__( 'Semi-Bold 600 Italic', 'aazeen-extension' ),
    '700'       => esc_attr__( 'Bold 700', 'aazeen-extension' ),
    '700italic' => esc_attr__( 'Bold 700 Italic', 'aazeen-extension' ),
    '800'       => esc_attr__( 'Extra-Bold 800', 'aazeen-extension' ),
    '800bold'   => esc_attr__( 'Extra-Bold 800', 'aazeen-extension' ),
    '800italic' => esc_attr__( 'Extra-Bold 800 Italic', 'aazeen-extension' ),
    '900'       => esc_attr__( 'Ultra-Bold 900', 'aazeen-extension' ),
    '900bold'   => esc_attr__( 'Ultra-Bold 900', 'aazeen-extension' ),
    '900italic' => esc_attr__( 'Ultra-Bold 900 Italic', 'aazeen-extension' ),
  );
}

/**
 * Returns an array of all available button style.
 *
 * @static
 * @access public
 * @return array
 */
 function button_style_aazeen_extentions() {
  return array(
    'btn-sm'       => esc_attr__( 'Small', 'aazeen-extension' ),
    'regu'  => esc_attr__( 'Regular', 'aazeen-extension' ),
    'btn-lg' => esc_attr__( 'Large', 'aazeen-extension' ),
    'btn-round'       => esc_attr__( 'Round', 'aazeen-extension' ),
    'btn-round btn-lg' => esc_attr__( 'Round Large ', 'aazeen-extension' ),
  );
}

/**
 * Returns an array of all available Background style.
 *
 * @static
 * @access public
 * @return array
 */
 function background_style_aazeen_extentions() {
  return array(
    'gradient'  => esc_attr__( 'gradient', 'aazeen-extension' ),
    'image' => esc_attr__( 'Image', 'aazeen-extension' ),
  );
}

// demo import menu

function aazeen_extension_plugin_page_setup( $default_settings ) {
	$default_settings['parent_slug'] = 'admin.php';
	$default_settings['page_title']  = esc_html__( 'One Click Demo Import' , 'pt-ocdi' );
	$default_settings['menu_title']  = esc_html__( 'Import Demo Data' , 'pt-ocdi' );
	$default_settings['capability']  = 'import';
	$default_settings['menu_slug']   = 'pt-one-click-demo-import';

	return $default_settings;
}
add_filter( 'pt-ocdi/plugin_page_setup', 'aazeen_extension_plugin_page_setup' );

/**
 * Register a custom menu page.
 */

function aazeen_extension_register_import_menu_page() {
    add_menu_page(
        __( 'Import Demo Data', 'aazeen-extension' ),
        'Import Demo Data',
        'import',
        'pt-one-click-demo-import',
        '',
        plugins_url( 'aazeen-extension/images/paper-plane.svg' )

    );
}
add_action( 'admin_menu', 'aazeen_extension_register_import_menu_page' );


add_action( 'admin_enqueue_scripts', 'aazeen_extention_admin_pointers_header' );

function aazeen_extention_admin_pointers_header() {
   if ( aazeen_extention_admin_pointers_check() ) {
      add_action( 'admin_print_footer_scripts', 'aazeen_extention_admin_pointers_footer' );

      wp_enqueue_script( 'wp-pointer' );
      wp_enqueue_style( 'wp-pointer' );
   }
}

function aazeen_extention_admin_pointers_check() {
   $admin_pointers = aazeen_extention_admin_pointers();
   foreach ( $admin_pointers as $pointer => $array ) {
      if ( $array['active'] )
         return true;
   }
}

function aazeen_extention_admin_pointers_footer() {
   $admin_pointers = aazeen_extention_admin_pointers();
   ?>
<script type="text/javascript">
/* <![CDATA[ */
( function($) {
   <?php
   foreach ( $admin_pointers as $pointer => $array ) {
      if ( $array['active'] ) {
         ?>
         $( '<?php echo $array['anchor_id']; ?>' ).pointer( {
            content: '<?php echo $array['content']; ?>',
            position: {
            edge: '<?php echo $array['edge']; ?>',
            align: '<?php echo $array['align']; ?>'
         },
            close: function() {
               $.post( ajaxurl, {
                  pointer: '<?php echo $pointer; ?>',
                  action: 'dismiss-wp-pointer'
               } );
            }
         } ).pointer( 'open' );
         <?php
      }
   }
   ?>
} )(jQuery);
/* ]]> */
</script>
   <?php
}

function aazeen_extention_admin_pointers() {
   $dismissed = explode( ',', (string) get_user_meta( get_current_user_id(), 'dismissed_wp_pointers', true ) );
   $version = '1_0_2'; // replace all periods in 1.0 with an underscore
   $prefix = 'aazeen_extention_admin_pointers' . $version . '_';

   $new_pointer_content = '<h3>' . __( 'Demo Import','aazeen-extension' ) . '</h3>';
   $new_pointer_content .= '<p>' . __( 'Setup your site in one click' ,'aazeen-extension') . '</p>';

   return array(
      $prefix . 'new_items' => array(
         'content' => $new_pointer_content,
         'anchor_id' => '#toplevel_page_pt-one-click-demo-import',
         'edge' => 'bottom',
         'align' => 'right',
         'active' => ( ! in_array( $prefix . 'new_items', $dismissed ) )
      ),
   );
}

/**
 * Set Front page displays option to A static page
 */
function aazeen_extention_set_frontpage() {
	if ( function_exists( 'aazeen_setup' ) ) {
		$is_fresh_site = get_option( 'fresh_site' );
		if ( (bool) $is_fresh_site === false ) {
			$frontpage_title = esc_html__( 'Front Page', 'aazeen-extention' );
			$front_id = aazeen_extention_create_page( 'aazeem-front', $frontpage_title );
			$blogpage_title = esc_html__( 'Blog', 'aazeen-extention' );
			$blog_id = aazeen_extention_create_page( 'blog', $blogpage_title );
			set_theme_mod( 'show_on_front','page' );
			update_option( 'show_on_front', 'page' );
			if ( ! empty( $front_id ) ) {
				update_option( 'page_on_front', $front_id );
			}
			if ( ! empty( $blog_id ) ) {
				update_option( 'page_for_posts', $blog_id );
			}
		}
	}
}
