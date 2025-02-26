<?php
/**
 * Plugin Name: Advice Advertorials
 * Author: Vice Media
 * Description: Creates a shortcode for including impression trackers into WordPress articles
 * Author Email: adops-de@vice.com
 * Version: 1.0
 */

function av_advertorial( $atts ) {
    $a = shortcode_atts( array(
        'id' => '',
        'site' => '',
    ), $atts );

    makeAdvertorial($a['id'], $a['site']);
}
function makeAdvertorial($id, $site) {
    ?>
    <script type='text/javascript' src='http://www.googletagservices.com/tag/js/gpt.js'>
        googletag.pubads().definePassback('16916245/<?php echo $site; ?>', [[1,1]]).setTargeting('orderId',['<?php echo $id; ?>']).display();
    </script>
<?php
}
add_shortcode( 'advertorial', 'av_advertorial' );