<?php

/**
 * The base handler class
 */
final class maan_addons_helper
{

    public function get_option($option = '', $default = null)
    {
        $options = get_option('_maan_elementor_addons'); // Attention: Set your unique id of the framework
        return (isset($options[$option])) ? $options[$option] : $default;
    }

    public function validate_html_tag($tag)
    {
        $allowed_html_tags = [
            'article',
            'aside',
            'footer',
            'header',
            'section',
            'nav',
            'main',
            'div',
            'h1',
            'h2',
            'h3',
            'h4',
            'h5',
            'h6',
            'p',
            'span',
        ];
        return in_array(strtolower($tag), $allowed_html_tags) ? $tag : 'div';
    }

    public function html_tag_lists()
    {
        $html_tag_list = [
            'h1' => __('H1', 'maan-addons-elements'),
            'h2' => __('H2', 'maan-addons-elements'),
            'h3' => __('H3', 'maan-addons-elements'),
            'h4' => __('H4', 'maan-addons-elements'),
            'h5' => __('H5', 'maan-addons-elements'),
            'h6' => __('H6', 'maan-addons-elements'),
            'p' => __('p', 'maan-addons-elements'),
            'div' => __('div', 'maan-addons-elements'),
            'span' => __('span', 'maan-addons-elements'),
        ];
        return $html_tag_list;
    }

    public function get_linked_button($link, $text, $class = 'me-btn')
    {
        if (empty($text)) return false;
        $url = $link['url'] ? 'href=' . esc_url($link['url']) . '' : '';
        $ext = $link['is_external'] ? 'target= _blank' : '';
        $nofollow = $link['nofollow'] ? 'rel="nofollow"' : '';
        $link = "<a $url class='$class' $ext $nofollow>$text</a>";
        return $link;
    }

    public function generate_html($content, $tag = 'div', $class = 'maan-addons-elements')
    {
        if (empty($content)) return false;
        $gen_tag = $this->validate_html_tag($tag);
        return "<$gen_tag class='$class'>$content</$gen_tag>";
    }

    public function generate_image($src, $class = 'maan-addons-img', $wp_img = false, $size = 'full')
    {
        if (empty($src['url'])) return false;
        $placeholder = \Elementor\Utils::get_placeholder_image_src();
        if ($wp_img == true) {
            if (!empty($src['id'])){
                $img = !empty($src['id']) ? wp_get_attachment_image($src['id'], $size, false, ['class'=>$class]) : '';
            }else{
                $img = "<img src='$placeholder' class='$class' alt='Maan Addons Image'>";
            }
            return $img;
        } else {
            $img = !empty($src['url']) ? $src['url'] : \Elementor\Utils::get_placeholder_image_src();
            return "<img src='$img' class='$class' alt='Maan Addons Image'>";
        }
    }

    public function has_image_before($src, $before){
        if (empty($src['url'])) return false;
        return $before;
    }

    public function has_image_after($src, $after){
        if (empty($src['url'])) return false;
        return $after;
    }
}