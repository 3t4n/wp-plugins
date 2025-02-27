<?php

class Catcwp_Shortcode {

    public function Catcwp_shortcode_register() {
        add_shortcode('copy_clipboard', [$this, 'Catcwp_shortcode_generator']);
    }
    
    /**
     * Shortcode Render Function
     */
    public function Catcwp_shortcode_generator($atts, $content = null) {

        ob_start();


        $args = array(
            'post_type'      => 'copy_to_clipboard',
            'posts_per_page' => -1,
        );
        
        $query = new WP_Query($args);
        
        $titles = array();
        $meta = [];
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $titles[] = get_the_title();
                $meta[] = get_post_meta( get_the_ID(), 'copy_to_clipboard_options', true );
            }
            wp_reset_postdata();
        }

        $copy_clipboard_selector = [];
        $copy_clipboard_text = [];
        $copy_clipboard_content = [];

        $copy_clipboard_bg_color = [];
        $copy_clipboard_bg_hover_color = [];
        $copy_clipboard_color = [];
        $copy_clipboard_hover_color = [];

        $copy_clipboard_font_family = [];
        $copy_clipboard_font_weight = [];
        $copy_clipboard_text_align = [];
        $copy_clipboard_text_transform = [];
        $copy_clipboard_font_size = [];
        $copy_clipboard_line_height = [];
        $copy_clipboard_letter_spacing = [];

        $copy_clipboard_padding_top = [];
        $copy_clipboard_padding_right = [];
        $copy_clipboard_padding_bottom = [];
        $copy_clipboard_padding_left = [];

        $copy_clipboard_margin_top = [];
        $copy_clipboard_margin_right = [];
        $copy_clipboard_margin_bottom = [];
        $copy_clipboard_margin_left = [];

        $copy_clipboard_border_top = [];
        $copy_clipboard_border_right = [];
        $copy_clipboard_border_bottom = [];
        $copy_clipboard_border_left = [];
        $copy_clipboard_border_color = [];
        $copy_clipboard_border_style = [];

        $copy_clipboard_border_radius_top = [];
        $copy_clipboard_border_radius_right = [];
        $copy_clipboard_border_radius_bottom = [];
        $copy_clipboard_border_radius_left = [];

        if(!empty($meta)){
            foreach ($meta as $item) {

                $copy_clipboard_selector[] = strtolower($item['copy_clipboard_selector']);
                $copy_clipboard_text[] = $item['copy_clipboard_text'];
                $copy_clipboard_content[] = $item['copy_clipboard_content'];
                $copy_clipboard_bg_color[] = $item['copy_clipboard_bg_color'];
                $copy_clipboard_bg_hover_color[] = $item['copy_clipboard_bg_hover_color'];
                $copy_clipboard_color[] = $item['copy_clipboard_color'];
                $copy_clipboard_hover_color[] = $item['copy_clipboard_hover_color'];

                $copy_clipboard_font_family [] = $item['copy_clipboard_typography']['font-family'];
                $copy_clipboard_font_weight [] = $item['copy_clipboard_typography']['font-weight'];
                $copy_clipboard_text_align [] = $item['copy_clipboard_typography']['text-align'];
                $copy_clipboard_text_transform [] = $item['copy_clipboard_typography']['text-transform'];
                $copy_clipboard_font_size [] = $item['copy_clipboard_typography']['font-size'];
                $copy_clipboard_line_height [] = $item['copy_clipboard_typography']['line-height'];
                $copy_clipboard_letter_spacing [] = $item['copy_clipboard_typography']['letter-spacing'];

                $copy_clipboard_padding_top [] = $item['copy_clipboard_padding']['top'];
                $copy_clipboard_padding_right [] = $item['copy_clipboard_padding']['right'];
                $copy_clipboard_padding_bottom [] = $item['copy_clipboard_padding']['bottom'];
                $copy_clipboard_padding_left [] = $item['copy_clipboard_padding']['left'];

                $copy_clipboard_margin_top [] = $item['copy_clipboard_margin']['top'];
                $copy_clipboard_margin_right [] = $item['copy_clipboard_margin']['right'];
                $copy_clipboard_margin_bottom [] = $item['copy_clipboard_margin']['bottom'];
                $copy_clipboard_margin_left [] = $item['copy_clipboard_margin']['left'];

                $copy_clipboard_border_top [] = $item['copy_clipboard_border']['top'];
                $copy_clipboard_border_right [] = $item['copy_clipboard_border']['right'];
                $copy_clipboard_border_bottom [] = $item['copy_clipboard_border']['bottom'];
                $copy_clipboard_border_left [] = $item['copy_clipboard_border']['left'];
                $copy_clipboard_border_color [] = $item['copy_clipboard_border']['color'];
                $copy_clipboard_border_style [] = $item['copy_clipboard_border']['style'];

                $copy_clipboard_border_radius_top [] = $item['copy_clipboard_border_radius_top'];
                $copy_clipboard_border_radius_right [] = $item['copy_clipboard_border_radius_right'];
                $copy_clipboard_border_radius_bottom [] = $item['copy_clipboard_border_radius_bottom'];
                $copy_clipboard_border_radius_left [] = $item['copy_clipboard_border_radius_left'];

            }
        }

        // check if the 'tag' value matches a value in $copy_clipboard_selector array
        $tag = isset($atts['tag']) ? strtolower($atts['tag']) : '';
        if (in_array($tag, $copy_clipboard_selector)) {

            $index = array_search($tag, $copy_clipboard_selector);
            $custom_text = $copy_clipboard_text[$index];
            $custom_content = $copy_clipboard_content[$index];

            $custom_bg_color = $copy_clipboard_bg_color[$index];
            $custom_bg_hover_color = $copy_clipboard_bg_hover_color[$index];
            $custom_color = $copy_clipboard_color[$index];
            $custom_hover_color = $copy_clipboard_hover_color[$index];

            $custom_font_family = $copy_clipboard_font_family[$index];
            $custom_font_weight = $copy_clipboard_font_weight[$index];
            $custom_text_align = $copy_clipboard_text_align[$index];
            $custom_text_transform = $copy_clipboard_text_transform[$index];
            $custom_font_size = $copy_clipboard_font_size[$index];
            $custom_line_height = $copy_clipboard_line_height[$index];
            $custom_letter_spacing = $copy_clipboard_letter_spacing[$index];

            $custom_padding_top = $copy_clipboard_padding_top[$index];
            $custom_padding_right = $copy_clipboard_padding_right[$index];
            $custom_padding_bottom = $copy_clipboard_padding_bottom[$index];
            $custom_padding_left = $copy_clipboard_padding_left[$index];

            $custom_margin_top = $copy_clipboard_margin_top[$index];
            $custom_margin_right = $copy_clipboard_margin_right[$index];
            $custom_margin_bottom = $copy_clipboard_margin_bottom[$index];
            $custom_margin_left = $copy_clipboard_margin_left[$index];

            $custom_border_top = $copy_clipboard_border_top[$index];
            $custom_border_right = $copy_clipboard_border_right[$index];
            $custom_border_bottom = $copy_clipboard_border_bottom[$index];
            $custom_border_left = $copy_clipboard_border_left[$index];
            $custom_border_color = $copy_clipboard_border_color[$index];
            $custom_border_style = $copy_clipboard_border_style[$index];

            $custom_border_radius_top = $copy_clipboard_border_radius_top[$index];
            $custom_border_radius_right = $copy_clipboard_border_radius_right[$index];
            $custom_border_radius_bottom = $copy_clipboard_border_radius_bottom[$index];
            $custom_border_radius_left = $copy_clipboard_border_radius_left[$index];

        } else {
            //set default value
            $custom_text = 'Click to copy';
            $custom_content = '';

        }

        // Content Display Condition
        if (empty($content)) {
            $text = isset($atts['text']) ? $atts['text'] : $custom_text;
            $content = isset($atts['content']) ? $atts['content'] : $custom_content;
        }else {
            $content = isset($atts['content']) ? $atts['content'] : $custom_content;
            $text = isset($atts['text']) ? $atts['text'] : $custom_text;
        }
        
        ?>

        <style>
            span.cacwp_text.index_<?php echo $index; ?> {

                cursor: pointer;
                display: inline-block;
                transition: ease-in-out .5s;

                background-color: <?php echo $custom_bg_color ? $custom_bg_color : '#ffffff'; ?>;
                color: <?php echo $custom_color ? $custom_color : '#000000'; ?>;

                font-family: <?php echo ($custom_font_family ? $custom_font_family : '"Roboto", Sans-serif'); ?>;
                font-weight: <?php echo ($custom_font_weight ? $custom_font_weight : '500'); ?>;
                text-align: <?php echo ($custom_text_align ? $custom_text_align : 'center'); ?>;
                text-transform: <?php echo ($custom_text_transform ? $custom_text_transform : 'none'); ?>;
                font-size: <?php echo ($custom_font_size ? $custom_font_size . 'px' : '15px'); ?>;
                line-height: <?php echo ($custom_line_height ? $custom_line_height . 'px' : '1'); ?>;
                letter-spacing: <?php echo ($custom_letter_spacing ? $custom_letter_spacing . 'px' : 'normal'); ?>;

                padding-top: <?php echo $custom_padding_top ? $custom_padding_top . 'px' : '0'; ?>;
                padding-right: <?php echo $custom_padding_right ? $custom_padding_right . 'px' : '0'; ?>;
                padding-bottom: <?php echo $custom_padding_bottom ? $custom_padding_bottom . 'px' : '0'; ?>;
                padding-left: <?php echo $custom_padding_left ? $custom_padding_left . 'px' : '0'; ?>;

                margin-top: <?php echo $custom_margin_top ? $custom_margin_top . 'px' : '0'; ?>;
                margin-right: <?php echo $custom_margin_right ? $custom_margin_right . 'px' : '0'; ?>;
                margin-bottom: <?php echo $custom_margin_bottom ? $custom_margin_bottom . 'px' : '0'; ?>;
                margin-left: <?php echo $custom_margin_left ? $custom_margin_left . 'px' : '0'; ?>;

                border-top: <?php echo $custom_border_top ? $custom_border_top . 'px' : '0'; ?>;
                border-right: <?php echo $custom_border_right ? $custom_border_right . 'px' : '0'; ?>;
                border-bottom: <?php echo $custom_border_bottom ? $custom_border_bottom . 'px' : '0'; ?>;
                border-left: <?php echo $custom_border_left ? $custom_border_left . 'px' : '0'; ?>;
                border-color: <?php echo $custom_border_color ? $custom_border_color : '#fff'; ?>;
                border-style: <?php echo $custom_border_style ? $custom_border_style : 'solid'; ?>;

                border-top-left-radius: <?php echo $custom_border_radius_top ? $custom_border_radius_top . 'px' : '0'; ?>;
                border-top-right-radius: <?php echo $custom_border_radius_right ? $custom_border_radius_right . 'px' : '0'; ?>;
                border-bottom-right-radius: <?php echo $custom_border_radius_bottom ? $custom_border_radius_bottom . 'px' : '0'; ?>;
                border-bottom-left-radius: <?php echo $custom_border_radius_left ? $custom_border_radius_left . 'px' : '0'; ?>;

            }
            span.cacwp_text.index_<?php echo $index; ?>:hover {
                background-color: <?php echo $custom_bg_hover_color ? $custom_bg_hover_color : ''; ?>;
                color: <?php echo $custom_hover_color ? $custom_hover_color : ''; ?>;
            }
        </style>

        <span class="cacwp_text index_<?php echo $index; ?>" title="Click to copy" data-content="<?php echo esc_html($content); ?>" data-text="<?php echo esc_html($text); ?>"><?php echo esc_html($text); ?></span>
        
        <?php
        return ob_get_clean();
        
    }
    
}