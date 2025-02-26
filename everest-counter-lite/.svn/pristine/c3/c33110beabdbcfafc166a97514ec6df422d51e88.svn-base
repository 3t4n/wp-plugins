<?php
/**
 * Handler for [etl_guten_block] shortcode
 *
 * @param $atts
 *
 * @return string
 */
function ecl_block_handler($atts)
{
	$atts = shortcode_atts([
		'heading' => __('Everest Counter-Lite Title'),
		'heading_tag' => 'h2',
		'ecl_id' => '',
	], $atts, 'ecl_guten_block');

	return ecl_block_renderer($atts[ 'heading' ],$atts[ 'heading_tag' ],$atts[ 'ecl_id' ]);
}

add_shortcode('ecl_guten_block', 'ecl_block_handler');

/**
 * Handler for post title block
 * @param $atts
 *
 * @return string
 */
function ecl_block_render_handler($atts)
{
	return ecl_block_renderer($atts[ 'heading' ],$atts[ 'heading_tag' ],$atts[ 'ecl_id' ]);
}

/**
 * Output the post title wrapped in a heading
 *
 * @param int $etl_id The post ID
 * @param string $heading Allows : h2,h3,h4 only
 *
 * @return string
 */
function ecl_block_renderer($heading,$heading_tag,$ecl_id)
{	
	$ret = '';
	if(!empty($heading)){
		$ret .= "<$heading_tag>$heading</$heading_tag>";
	}

	if($ecl_id!=null){
		$sht = "[everest_counter id='$ecl_id']";
		$title = do_shortcode($sht);
		$ret .= "$title";
	}

	return $ret;
}

/**
 * Register block
 */
add_action('init', function () {
	// Skip block registration if Gutenberg is not enabled/merged.
	if (!function_exists('register_block_type')) {
		return;
	}
	$dir = dirname(__FILE__);

			wp_enqueue_style( 'font-awesome-icons-v4.7.0', E_COUNTER_CSS_DIR.'/font-awesome/font-awesome.min.css', false, E_COUNTER_VERSION );
			wp_enqueue_style( 'ec_gener_icons', E_COUNTER_CSS_DIR . '/genericons.css', false, E_COUNTER_VERSION );
			wp_enqueue_style( 'dashicons' );
			wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Raleway|ABeeZee|Aguafina+Script|Open+Sans|Roboto|Roboto+Slab|Lato|Titillium+Web|Source+Sans+Pro|Playfair+Display|Montserrat|Khand|Oswald|Ek+Mukta|Rubik|PT+Sans+Narrow|Poppins|Oxygen:300,400,600,700', array(), E_COUNTER_VERSION );
			wp_enqueue_style( 'ec_frontend_css', E_COUNTER_CSS_DIR . '/frontend/ec-frontend.css', array(), E_COUNTER_VERSION );
			wp_enqueue_script('ec_waypoints_js', E_COUNTER_JS_DIR . '/jquery.waypoints.js', array('jquery'), E_COUNTER_VERSION , true );
			wp_enqueue_script('ec_counterup_js', E_COUNTER_JS_DIR . '/jquery.counterup.js', array('jquery', 'ec_waypoints_js'), E_COUNTER_VERSION , true );
			wp_enqueue_script('ec_frontend_js', E_COUNTER_JS_DIR . '/ec-frontend.js', array( 'jquery', 'ec_counterup_js' ), E_COUNTER_VERSION , true );


	$index_js = 'ecl-block.js';
	wp_register_script(
		'ecl-block-script',
		plugins_url($index_js, __FILE__),
		array(
			'wp-blocks',
			'wp-i18n',
			'wp-element',
			'wp-components',
			'wp-editor'
		),
		filemtime("$dir/$index_js")
	);

	$ecl_logos_array = get_ecl_logos();
	wp_localize_script( 'ecl-block-script', 'ECL_logos_array', $ecl_logos_array);

	register_block_type('ecl-display-block/ecl-widget', array(
		'editor_script' => 'ecl-block-script',
		'render_callback' => 'ecl_block_render_handler',
		'attributes' => [			
			'heading' => [
				'type' => 'string',
				'default' => __('Everest Counter-Lite Title')
			],
			'heading_tag' => [
				'type' => 'string',
				'default' => 'h2'
			],
			'ecl_id' => [
				'type' => 'string',
				'default' => ''
			],
		]
	));
});

function get_ecl_logos(){
	$args = array('post_type'=>'everest-counter',
		'post_status'=>'publish',
		'posts_per_page'=>'25'
	);
    // The Query
	$the_query = new WP_Query( $args );

	$everest_counter = array(array('value'=>'0','label'=>__('Select Counter')));

    // The Loop
	if ( $the_query->have_posts() ) {
		while($the_query->have_posts()){
			$the_query->the_post();
			global $post;
			$everest_counter[] = array('value'=>get_the_ID(), 'label'=> $post->post_name);
		}
	}

	return $everest_counter;
}

