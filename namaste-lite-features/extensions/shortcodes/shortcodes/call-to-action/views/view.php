<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
} 

$fullwidth_call = 'allow';
$post_id = get_the_ID();  
if ( function_exists( 'fw_get_db_post_option') ) {
	$basic_post_layer_select = fw_get_db_post_option( $post_id, 'basic_post_layer_select' ) ;
}
if ( function_exists( 'fw_get_db_customizer_option') ) {
	$basic_layer_select = fw_get_db_customizer_option( 'basic_layer_select');
}

if ($basic_post_layer_select == '2-col-l' || $basic_post_layer_select == '2-col-r') {
	$fullwidth_call = 'disable';
} elseif ($basic_layer_select == '2-col-l' || $basic_layer_select == '2-col-r') {
	$fullwidth_call = 'disable';
}

if (!($fullwidth_call == 'disable')) :
?>
<section class="namaste-action-call">
    <div class="container action-call-container">
        
        <div class="title"><p class="main-title"><?php echo wp_kses_post($atts['title']); ?></p></div>
        
        <div class="action-call-items">
        <div class="action-call-item square colored action-call-effect top_to_bottom">
            <a href="<?php echo esc_url($atts['link_1']); ?>">
            <div class="text-holder">
                <div class="text">
                    <div class="call-ribbon">
                        <div class="call-ribbon-2">
                            <i class="<?php echo esc_attr($atts['icon_1']); ?>"></i>
                            <p><?php echo esc_html($atts['name_1']); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="info">
                <div class="info-back" style="background-image: url(<?php echo esc_url($atts['img_1']['url']); ?>);">
                    <div class="info-content">
                        <h3><?php echo esc_html($atts['head_1']); ?></h3>
                        <p><?php echo esc_html($atts['desc_1']); ?></p>
                    </div>
                </div>
            </div>
            </a>
        </div>

        <div class="action-call-item square colored action-call-effect top_to_bottom">
            <a href="<?php echo esc_url($atts['link_2']); ?>">
            <div class="text-holder">
                <div class="text">
                    <div class="call-ribbon">
                        <div class="call-ribbon-2">
                            <i class="<?php echo esc_attr($atts['icon_2']); ?>"></i>
                            <p><?php echo esc_html($atts['name_2']); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="info">
                <div class="info-back" style="background-image: url(<?php echo esc_url($atts['img_2']['url']); ?>);">
                    <div class="info-content">
                        <h3><?php echo esc_html($atts['head_2']); ?></h3>
                        <p><?php echo esc_html($atts['desc_2']); ?></p>
                    </div>
                </div>
            </div>
            </a>
        </div>

        <div class="action-call-item square colored action-call-effect top_to_bottom">
            <a href="<?php echo esc_url($atts['link_3']); ?>">
            <div class="text-holder">
                <div class="text">
                    <div class="call-ribbon">
                        <div class="call-ribbon-2">
                            <i class="<?php echo esc_attr($atts['icon_3']); ?>"></i>
                            <p><?php echo esc_html($atts['name_3']); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="info">
                <div class="info-back" style="background-image: url(<?php echo esc_url($atts['img_3']['url']); ?>);">
                    <div class="info-content">
                        <h3><?php echo esc_html($atts['head_3']); ?></h3>
                        <p><?php echo esc_html($atts['desc_3']); ?></p>
                    </div>
                </div>
            </div>
            </a>
        </div>
        <div class="clearfix"></div>
        </div>

    </div>
    <div class="clearfix"></div>
</section>
<?php endif; ?>