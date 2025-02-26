<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

$gallery_class = 'zlfms-image-gallery';

$columns_class = $settings["skin"] === "grid" ? "gallery-columns-" . esc_attr($settings["gallery_columns"]) : "";

$unique_id = "gallery_" . uniqid();
echo '<div id="' . esc_attr($unique_id) . '" class="' . esc_attr($gallery_class) . '">';
echo '<div class="zlfms_gallery ' . esc_attr($columns_class) . '">';

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

echo '</div>';
echo '</div>';
