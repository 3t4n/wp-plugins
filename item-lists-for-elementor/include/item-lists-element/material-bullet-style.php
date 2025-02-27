<!-- Start Material Bullet Style -->
 <?php use Elementor\Icons_Manager; ?>
<div class="ile-material-bullet-style" style="direction:<?php echo esc_attr($settings['list_items_box_column_direction']); ?>;">
    <div class="ile-container-holder">
    <?php foreach ($settings['material_item_lists'] as $items => $item) {
        $icon = $item['material_list_items_icon']['value'];
        $title = $item['material_list_items_title'];
        $title_color = $item['material_title_color'];
        $content = $item['material_list_items_content'];
        $content_color = $item['material_content_color'];
        $content_bg_color = $item['material_content_bg_color'];
        $icon_color = $item['material_icon_color'];
        $icon_bg_color = $item['material_icon_bg_color']; ?>
        <div class="ile-container-row"><?php
            if($item['material_list_items_display_icon'] === 'icon') { ?>
                <div class="ile-icon-box" style="background-color:<?php echo esc_attr( $icon_bg_color ); ?>;">
                        <?php Icons_Manager::render_icon($item['material_list_items_icon'], [ 'aria-hidden' => 'true', 'class' => 'ile-icon', 'fill' => $icon_color ]); ?>
                    </div>
            <?php } else if ($item['material_list_items_display_icon'] === 'image') { ?>
                <img src="<?php echo esc_url($item['material_list_items_image']['url']); ?>" class="ile-image" />
            <?php } ?>
            <div class="ile-content-box" style="background-color:<?php echo esc_attr($content_bg_color); ?>;">
                <h2 class="ile-title" style="color:<?php echo esc_attr($title_color); ?>;"><?php echo esc_attr($title); ?></h2>
                <p class="ile-content" style="color:<?php echo esc_attr($content_color); ?>;"><?php echo wp_kses_post($content); ?></p>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<!-- End Material Bullet Style -->
