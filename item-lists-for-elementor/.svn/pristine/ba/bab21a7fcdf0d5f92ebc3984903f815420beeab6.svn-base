<!-- Start Alternate Timeline Bullet Style -->
<?php use Elementor\Icons_Manager; ?>
<div class="ile-alternate-timeline-bullet-style">
    <?php $count = 0; 
    foreach ($settings['timeline_item_lists'] as $items => $item) {
        $icon = $item['timeline_list_items_icon']['value'];
        $title = $item['timeline_list_items_title'];
        $content = $item['timeline_list_items_content'];
        $icon_color = $item['timeline_icon_color'];
        $icon_bg_color = $item['timeline_icon_bg_color'];
        $ile_timeline_content = "ile-timeline-right";
        if($count % 2 == 0) { 
            $ile_timeline_content = "ile-timeline-left";  
        } ?>
        <div class="ile-container-holder <?php echo esc_attr($ile_timeline_content); ?>">
            <div class="ile-timeline-vertical"></div>
            <div class="ile-timeline-horizontal"></div>
            <?php if($item['timeline_list_items_display_icon'] === 'icon') { ?>
                <div class="ile-icon-box" style="background-color:<?php echo esc_attr( $icon_bg_color ); ?>">
                    <?php Icons_Manager::render_icon($item['timeline_list_items_icon'], [ 'aria-hidden' => 'true', 'class' => 'ile-icon', 'fill' => $icon_color ]); ?>
                </div>
            <?php } else if($item['timeline_list_items_display_icon'] === 'image') { ?>
                <img src="<?php echo esc_url($item['timeline_list_items_image']['url']); ?>" class="ile-image" /><?php
            } ?>
            <div class="ile-content-box">
                <h2 class="ile-title"><?php echo esc_attr($title); ?></h2>
                <p class="ile-content"><?php echo wp_kses_post($content); ?></p>
            </div>
        </div>
        <?php $count = $count +1; } ?>
</div>
<!-- End Alternate Timeline Bullet Style -->
