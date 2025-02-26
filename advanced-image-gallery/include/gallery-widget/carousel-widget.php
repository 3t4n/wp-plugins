<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$unique_id = "carousel_" . uniqid();

// Get the pagination value from Elementor settings
$pagination = isset($settings['pagination']) ? sanitize_text_field($settings['pagination']) : ''; // Default to empty (none)

// Set pagination attributes based on the value of the "pagination" control
$pagination_attr = '';
$pagination_type_attr = 'bullets';
$pagination_dynamic_bullets_attr = 'false';

if ($pagination === '') {
    $pagination_attr = '';
    $pagination_type_attr = '';
    $pagination_dynamic_bullets_attr = '';
} elseif ($pagination === 'progressbar') {
    $pagination_attr = 'pagination="true"';
    $pagination_type_attr = 'progressbar';
} elseif ($pagination === 'fraction') {
    $pagination_attr = 'pagination="true"';
    $pagination_type_attr = 'fraction';
} elseif ($pagination === 'dots') {
    $pagination_attr = 'pagination="true"';
    $pagination_type_attr = 'bullets';
    $pagination_dynamic_bullets_attr = 'true';
}

$space_between_slides = isset($settings['space_between_slides']) ? absint($settings['space_between_slides']['size']) : 30;
$slides_per_view = isset($settings['slides_per_view']) ? absint($settings['slides_per_view']) : 3;
$slides_per_scroll = isset($settings['slides_per_scroll']) ? absint($settings['slides_per_scroll']) : 1;
$slides_per_view_laptop = isset($settings['slides_per_view_laptop']) ? absint($settings['slides_per_view_laptop']) : 3;
$slides_per_view_tablet = isset($settings['slides_per_view_tablet']) ? absint($settings['slides_per_view_tablet']) : 2;
$slides_per_view_mobile = isset($settings['slides_per_view_mobile']) ? absint($settings['slides_per_view_mobile']) : 1;

// Navigation option
$navigation = isset($settings['navigation']) && $settings['navigation'] === 'yes' ? 'true' : 'false';

?>
<!-- Slider main container -->
<div class="swiper-container zlfms-carousel"
    data-space-between="<?php echo esc_attr($space_between_slides); ?>"
    data-slides-per-view="<?php echo esc_attr($slides_per_view); ?>"
    data-slides-per-scroll="<?php echo esc_attr($slides_per_scroll); ?>"
    data-pagination="<?php echo ($pagination === '') ? 'false' : 'true'; ?>"
    data-pagination-type="<?php echo esc_attr($pagination_type_attr); ?>"
    data-pagination-dynamic-bullets="<?php echo esc_attr($pagination_dynamic_bullets_attr); ?>"
    data-navigation="<?php echo esc_attr($navigation); ?>"
    data-autoplay="<?php echo esc_attr($settings['autoplay'] === 'yes' ? 'true' : 'false'); ?>"
    data-scroll-speed="<?php echo esc_attr($settings['scroll_speed']); ?>"
    data-pause-on-hover="<?php echo esc_attr($settings['pause_on_hover']); ?>"
    data-pause-on-interaction="<?php echo esc_attr($settings['pause_on_interaction']); ?>"
    data-infinite-scroll="<?php echo esc_attr($settings['infinite_scroll']); ?>"
    data-offset-sides="<?php echo esc_attr($settings['offset_sides']); ?>"
    data-offset-width="<?php echo esc_attr(isset($settings['offset_width']['size']) ? $settings['offset_width']['size'] : 30); ?>"
    data-speed="<?php echo esc_attr($settings['speed']); ?>"
    data-slides-per-view-laptop="<?php echo esc_attr($slides_per_view_laptop); ?>"
    data-slides-per-view-tablet="<?php echo esc_attr($slides_per_view_tablet); ?>"
    data-slides-per-view-mobile="<?php echo esc_attr($slides_per_view_mobile); ?>"
    data-effect="<?php echo esc_attr($settings['effect']); ?>">

    <div class="swiper-wrapper">
        <?php
        foreach ($settings["image_list"] as $item) {
            $type = esc_attr($item["type"]);
            $link_target = isset($item["link"]["is_external"]) && $item["link"]["is_external"] ? "_blank" : "_self";
            $link_target = esc_attr($link_target);                
            $link = "";
            $attachment_id = isset($item["image"]["id"]) ? absint($item["image"]["id"]) : 0;
            $image_title = '';

            if ($attachment_id) {
                $image_post = get_post($attachment_id);
                if ($image_post) {
                    $image_title = esc_html($image_post->post_title);
                }
            }
            if (empty($image_title)) {
                $image_title = esc_html(get_the_title());
            }

            $image_url = !empty($item["image"]["url"]) ? esc_url($item["image"]["url"]) : esc_url(\Elementor\Utils::get_placeholder_image_src());

            if ($type === "image") {
                if ($item["image_link_to_type"] === "custom" && !empty($item["link"]["url"])) {
                    $link = esc_url($item["link"]["url"]);
                } elseif ($item["image_link_to_type"] === "file") {
                    if ($settings["open_lightbox"] === "yes") {
                        $link = esc_url($image_url);
                    } else {
                        $link = esc_url(get_attachment_link($item["image"]["id"]));
                    }
                }

                echo '<div class="swiper-slide zlfms-gallery-item">';
                if (!empty($link)) {
                    echo '<a href="' . esc_url($link) . '" target="' . esc_attr($link_target) . '"';
                    if ($settings["open_lightbox"] === "yes") {
                        echo ' data-elementor-open-lightbox="yes"';
                        if (!empty($image_title)) {
                            echo ' data-elementor-lightbox-title="' . esc_attr($image_title) . '"';
                        }
                    }
                    echo '>';
                }
                echo '<div class="zlfms-gallery-img" style="background-image: url(\'' . esc_url($image_url) . '\');">';
                $overlay_type = esc_attr($settings['overlay_type']);
                $animation_class = 'zlfms-overlay-animation-' . esc_attr($settings['overlay_animation']);
                if ($overlay_type === 'text') {
                    echo '<div class="zlfms-carousel-image-overlay ' . esc_attr($animation_class) . '">';
                    echo esc_html($image_title);
                    echo '</div>';
                } elseif ($overlay_type === 'icon') {
                    echo '<div class="zlfms-carousel-image-overlay ' . esc_attr($animation_class) . '">';
                    $icon = $settings['overlay_icon_choose'];
                    if (!empty($icon['value'])) {
                        echo '<i class="' . esc_attr($icon['value']) . '"></i>';
                    }
                    echo '</div>';
                }
                echo '</div>';
                if (!empty($link)) {
                    echo '</a>';
                }
                echo '</div>'; // Closing swiper-slide

            } elseif ($type === "video") {
                $video_url = esc_url($item["video"]["url"]);
                $video_id = "";
                $embed_url = "";
                $matches = [];

                if (preg_match('/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $video_url, $matches)) {
                    $video_id = $matches[1];
                    $embed_url = "https://www.youtube.com/embed/" . esc_attr($video_id);
                    $video_type = "youtube";
                } elseif (preg_match('/(?:https?:\/\/)?(?:www\.)?(?:vimeo\.com\/(?:channels\/(?:\w+\/)?|groups\/(?:\w+\/)?videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?))/', $video_url, $matches)) {
                    $video_id = $matches[2];
                    $embed_url = "https://player.vimeo.com/video/" . esc_attr($video_id);
                    $video_type = "vimeo";
                }

                echo '<div class="swiper-slide zlfms-gallery-item zlfms_video">';
                if (!empty($embed_url) && $settings["open_lightbox"] === "yes") {
                    echo '<div class="zlfms_video_player" data-elementor-open-lightbox="yes" data-elementor-lightbox=\'{"type":"video","videoType":"' . esc_attr($video_type) . '","url":"' . esc_url($embed_url) . '?autoplay=1","modalOptions":{"id":"elementor-lightbox-424803d","videoAspectRatio":"169"}}\'>';
                } else {
                    echo '<a class="zlfms_video_player" href="' . esc_url($video_url) . '" target="_blank">';
                }

                echo '<div class="zlfms-gallery-img" style="background-image: url(\'' . esc_url($image_url) . '\');">';
                if ($settings["show_play_icon"] === "yes") {
                    $play_icon = $settings["play_icon"];
                    $icon_value = isset($play_icon['value']) ? esc_attr($play_icon['value']) : 'far fa-play-circle';
                    $icon_library = isset($play_icon['library']) ? esc_attr($play_icon['library']) : 'fa-solid';
                    echo '<div class="zlfms-custom-embed-play"><i aria-hidden="true" class="' . esc_attr($icon_library . ' ' . $icon_value) . '"></i></div>';
                }
                echo '</div>';

                $overlay_type = esc_attr($settings['overlay_type']);
                $animation_class = 'zlfms-overlay-animation-' . esc_attr($settings['overlay_animation']);
                if ($overlay_type === 'text') {
                    echo '<div class="zlfms-carousel-image-overlay ' . esc_attr($animation_class) . '">';
                    echo esc_html($image_title);
                    echo '</div>';
                } elseif ($overlay_type === 'icon') {
                    echo '<div class="zlfms-carousel-image-overlay ' . esc_attr($animation_class) . '">';
                    $icon = $settings['overlay_icon_choose'];
                    if (!empty($icon['value'])) {
                        echo '<i class="' . esc_attr($icon['value']) . '"></i>';
                    }
                    echo '</div>';
                }

                echo (!empty($embed_url) && $settings["open_lightbox"] === "yes") ? '</div>' : '</a>';
                echo '</div>'; // Closing swiper-slide for video

            }
        }
        ?>
    </div> <!-- Closing swiper-wrapper-->


    <!-- Custom navigation buttons -->
    <?php if ($settings['navigation'] === 'yes'): ?>
        <div class="swiper-button-prev"><?php \Elementor\Icons_Manager::render_icon($settings['navigation_previous_icon'], ['aria-hidden' => 'true']); ?></div>
        <div class="swiper-button-next"><?php \Elementor\Icons_Manager::render_icon($settings['navigation_next_icon'], ['aria-hidden' => 'true']); ?></div>
    <?php endif; ?>

    <!-- Custom pagination -->
    <div class="swiper-pagination"></div>

</div><!-- Closing swiper-container -->