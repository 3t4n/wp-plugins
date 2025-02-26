<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
} 
$uri = NAMASTE_PLUGIN_URL.'/extensions/shortcodes/shortcodes/icon-box';
?>

<div class="iconbox">
	<div class="icon">
    	<?php if (!empty($atts['link'])): ?>
        <a href="<?php echo esc_url($atts['link']); ?>">
		<?php endif; ?>
		<img class="iconbox-image" src="<?php echo esc_url($uri); ?>/static/img/mandala-frame.png"  width="150" height="150" alt="namaste-mandala">
        <div class="iconbox-icon-holder"><i class="<?php echo esc_attr($atts['icon']); ?>"></i></div>
        <?php if (!empty($atts['link'])): ?>
        </a>
		<?php endif; ?>
	</div>
    <?php if (!empty($atts['link'])): ?>
    <a href="<?php echo esc_url($atts['link']); ?>">
    <?php endif; ?>
    <p class="name"><?php echo esc_html($atts['title']); ?></p>
    <?php if (!empty($atts['link'])): ?>
    </a>
    <?php endif; ?>
    <div class="desc">
    	<p><?php echo wp_kses_post($atts['content']); ?></p>
    </div>
</div> 