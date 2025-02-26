<?php
/**
 * Plugin Name:     Brandfolder
 * Description:     The Brandfolder Integration gives you the ability to display your assets on your Wordpress website.
 * Version:         5.0.18
 * Author:          Brandfolder
 * License:         MIT License
 * License URI:     https://opensource.org/licenses/MIT
 * Text Domain:     brandfolder-integration
 *
 * @package         brandfolder
 */

/**
 * Registers all block assets so that they can be enqueued through the block editor
 * in the corresponding context.
 *
 * @see https://developer.wordpress.org/block-editor/tutorials/block-tutorial/applying-styles-with-stylesheets/
 */
function brandfolder_integration_block_init() {
	$dir = dirname( __FILE__ );

	$script_asset_path = "$dir/build/index.asset.php";
	if ( ! file_exists( $script_asset_path ) ) {
		throw new Error(
			'You need to run `npm start` or `npm run build` for the "brandfolder/editor-integration" block first.'
		);
	}
	$index_js     = 'build/index.js';
	$script_asset = require( $script_asset_path );
	wp_register_script(
		'brandfolder-integration-block-editor',
		plugins_url( $index_js, __FILE__ ),
		$script_asset['dependencies'],
		$script_asset['version']
	);
	wp_set_script_translations( 'brandfolder-integration-block-editor', 'brandfolder-integration' );

	$editor_css = 'build/index.css';
	wp_register_style(
		'brandfolder-integration-block-editor',
		plugins_url( $editor_css, __FILE__ ),
		array(),
		filemtime( "$dir/$editor_css" )
	);

	$style_css = 'build/style-index.css';
	wp_register_style(
		'brandfolder-integration-block',
		plugins_url( $style_css, __FILE__ ),
		array(),
		filemtime( "$dir/$style_css" )
	);

	register_block_type( 'brandfolder/editor-integration', array(
		'editor_script' => 'brandfolder-integration-block-editor',
		'editor_style'  => 'brandfolder-integration-block-editor',
		'style'         => 'brandfolder-integration-block',
	) );
}
add_action( 'init', 'brandfolder_integration_block_init' );

//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//
// START THE BF FOR EMBEDDING
//
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
function brandfolder_load_into_head() {
	$devOptions = get_option("brandfolderWordpressPluginAdminOptions");
	if (!empty($devOptions)) {
		foreach ($devOptions as $key => $option)
			$brandfolderAdminOptions[$key] = $option;
	}
	?>
	<style>
		<?php echo esc_html($brandfolderAdminOptions["brandfolder_style"]); ?>
	</style>
	<script type="text/javascript">
		function brandfolder_loadScript(src, callback)
		{
			var s,r,t;
			r = false;
			s = document.createElement('script');
			s.type = 'text/javascript';
			s.src = src;
			s.onload = s.onreadystatechange = function() {
				//console.log( this.readyState ); //uncomment this line to see which ready states are called.
				if ( !r && (!this.readyState || this.readyState == 'complete') )
				{
					r = true;
					callback();
				}
			};
			t = document.getElementsByTagName('script')[0];
			t.parentNode.insertBefore(s, t);
		}

		function brandfolder_null() {
		}

		jQuery(document).ready(
			function () {
				brandfolder_loadScript('//cdn.brandfolder.com/bf.min.js', brandfolder_null);
			});

	</script>
	<?php
}

function brandfolder_scripts() {
	wp_enqueue_script('jquery');
}

function brandfolder_popup_link($atts)  {
	$devOptions = get_option("brandfolderWordpressPluginAdminOptions");
	if (!empty($devOptions)) {
		foreach ($devOptions as $key => $option)
			$brandfolderAdminOptions[$key] = $option;
	}

	extract( shortcode_atts( array(
			'id' => $brandfolderAdminOptions["brandfolder_url"],
			'branding' => true,
			'collection' => '',
			'query' => '',
			'text' => "&lt;button style='padding: 15px 0px;margin: 10px auto;text-align: center;width: 100%;font-size: 15px;font-weight: bold;color: #333333;background-color: #dde2e6;border: 2px solid #cccccc;border-radius: 4px;'&gt;View our Brandfolder&lt;/button&gt;",
			'classes' => ''
		), $atts )
	);

	if ($collection != '') {
		$url = $id."/".$collection;
	} else {
		$url = $id;
	}

	$elemid = uniqid('bf');
	$output = "<a id='".$elemid."' href='https://brandfolder.com/".$url."' class='".$classes."'>".html_entity_decode($text)."</a>";
	$output .= "<script type='text/javascript'>
      jQuery('#".$elemid."').click(function(e) {
          e.stopImmediatePropagation();
          Brandfolder.showEmbed({brandfolder_id: '".$id."', branding: ".$branding.", query: '".$query."', collection_id: '".$collection."'});
          return false;
      });
    </script>";
	return $output;
}

//Actions
add_action( 'wp_enqueue_scripts', 'brandfolder_scripts' );
add_action( 'wp_head', 'brandfolder_load_into_head' );
add_shortcode('brandfolder', 'brandfolder_popup_link');
add_shortcode('Brandfolder', 'brandfolder_popup_link');
add_shortcode('Brandfolder-logos', 'brandfolder_popup_link');
add_shortcode('Brandfolder-images', 'brandfolder_popup_link');
add_shortcode('Brandfolder-documents', 'brandfolder_popup_link');
add_shortcode('Brandfolder-people', 'brandfolder_popup_link');
add_shortcode('Brandfolder-press', 'brandfolder_popup_link');
add_shortcode('brandfolder-logos', 'brandfolder_popup_link');
add_shortcode('brandfolder-images', 'brandfolder_popup_link');
add_shortcode('brandfolder-documents', 'brandfolder_popup_link');
add_shortcode('brandfolder-people', 'brandfolder_popup_link');
add_shortcode('brandfolder-press', 'brandfolder_popup_link');
add_filter('widget_text', 'do_shortcode');
?>
