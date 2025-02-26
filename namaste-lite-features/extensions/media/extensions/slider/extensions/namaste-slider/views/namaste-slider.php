<?php if (!defined('FW')) die('Forbidden');

$fullwidth_slider = 'allow';
$post_id = get_the_ID();  
if ( function_exists( 'fw_get_db_post_option') ) {
	$basic_post_layer_select = fw_get_db_post_option( $post_id, 'basic_post_layer_select' ) ;
}
if ( function_exists( 'fw_get_db_customizer_option') ) {
	$basic_layer_select = fw_get_db_customizer_option( 'basic_layer_select');
}

if ($basic_post_layer_select == '2-col-l' || $basic_post_layer_select == '2-col-r') {
	$fullwidth_slider = 'disable';
} elseif ($basic_layer_select == '2-col-l' || $basic_layer_select == '2-col-r') {
	$fullwidth_slider = 'disable';
}

if (!($data['settings']['extra']['fullwidth'] == 'yes' && $fullwidth_slider == 'disable')) :
?>

<?php if (isset($data['slides'])): ?>
	<!--Slider-->
	<section class="wrap-nivoslider theme-default namaste-custom-slider<?php if ($data['settings']['extra']['fullwidth'] == 'yes') { ?> namaste-fullwidth-slider<?php } ?>">
    	<div class="namaste-slider-holder">
            <div class="nivoSlider">
                <?php foreach ($data['slides'] as $id => $slide): ?>
                <img  width="<?php echo esc_attr($dimensions['width']); ?>"
                      height="<?php echo esc_attr($dimensions['height']); ?>"
                      src="<?php echo esc_attr(fw_resize($slide['src'], $dimensions['width'], $dimensions['height'], true)); ?>"
                      alt="<?php echo esc_attr($slide['title']); ?>"
                      title="#nivo-<?php echo esc_attr($id); ?>" />
                <?php endforeach; ?>
            </div>
            <?php foreach ($data['slides'] as $id => $slide): ?>
            <div id="nivo-<?php echo esc_attr($id) ?>" class="nivo-html-caption">
                <div class="namaste-slider-caption-holder">
                    <div class="namaste-slider-caption">
                        <span><?php echo $slide['title'] ?></span>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
	</section>
	<!--/Slider-->
<?php endif; ?>
<?php endif; ?>