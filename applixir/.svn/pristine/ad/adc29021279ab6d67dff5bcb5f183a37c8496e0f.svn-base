<?php

class Applixir_Restriction
{
    /**
     * Autoload method
     *
     * @return void
     */
    public function __construct()
    {
        add_action('wp_enqueue_scripts', array( $this, 'add_scripts'));
        add_filter('the_content', array( $this, 'maybe_show_paywall'), 10);

        add_shortcode('insert-AppLixir', '__return_empty_string');
        add_action('wp_footer', array( $this, 'insert_ad_div'), 9999999);
    }

    public function add_scripts()
    {
        global $post;
        wp_enqueue_script('applixir-js', 'https://cdn.applixir.com/applixir.sdk4.0m.js', array('jquery'));
        wp_enqueue_script('applixir-ad', APPLIXIR_URL.'/js/applixir-ad.js', array('jquery'));
        wp_localize_script(
            'applixir-ad',
            'applixir_global_vars',
            array(
            'postID' => $post->ID
        )
        );
    }

    public function maybe_show_paywall($content)
    {
        global $post;
        $cookie_name = 'applixir-ad-watched-'.$post->ID;
        // Check if we're inside the main loop in a single post page.
        //&& !isset($_COOKIE[$cookie_name])
        if ((is_single() || is_page()) && in_the_loop() && is_main_query() && !isset($_COOKIE[$cookie_name])) {
            $search = "[insert-AppLixir";
            $position =  strpos($content, $search);
            if ($position == true) {
                $content = $this->get_nag_excerpt($content);
            }
        }
        return $content;
    }

    public function the_content_paywall_message($attrs)
    {
        $settings= get_option('applixir_settings');
        // $settings['position'] = $settings['video_placement'];
        $settings['position'] = 'mid';
        $message_before_video = $settings['message_before_video'];

        $btn_label ='Watch Ad';
        if (!empty($attrs['btn-label'])) {
            $btn_label = $attrs['btn-label'];
        }



        $message  = '<script>';
        $message .=' var applixir_settings ='.json_encode($settings);

        $message .='</script>';
        $message .='<style>
		#applixir-ad-btn{
			padding: 10px 30px;
			background: '.$settings['background_color'].';
			color: '.$settings['font_color'].';
			font-size: '.$settings['font_size'].'px;
		}
		#applixir-paywall-message p{
			color: '.$settings['message_font_color'].';
			font-size: '.$settings['message_font_size'].'px;
		}
		</style>';
        $message  .='<div class="applixir-paywall-message-wrap"><div id="applixir-paywall-message">';
        $message .='<p> '.$message_before_video.'</p>';
        $message .='<button id="applixir-ad-btn" class="applixir-ad-btn"> '.$btn_label.'</button>';
        $message .= '</div></div>';
        return $message;
    }

    public function get_nag_excerpt($content)
    {
        $plain_content = strip_tags($content);
        $pattern = get_shortcode_regex();

        if (preg_match_all('/'. $pattern .'/s', $content, $matches)
            && array_key_exists(2, $matches)
            && in_array('insert-AppLixir', $matches[2])
        ) {
            $search = "[insert-AppLixir";
            $position =  strpos($plain_content, $search);
            if ($position  == true) {
                $attrs = '';
                if (!empty($matches[3][0])) {
                    $attrs = shortcode_parse_atts($matches[3][0]);
                }
                $excerpt = strip_shortcodes(substr($plain_content, 0, $position));
                $message = $this->the_content_paywall_message($attrs);
                $content = $excerpt.$message;
            }
        }

        return $content;
    }

    public function update_counter()
    {
        global $post;
        $counter = get_option('applixir_visit_counter');
        $post_id = $post->ID;

        if (isset($counter[$post_id])) {
            $new_count = $counter[$post_id]++;
        } else {
            $new_count = 1;
        }
        $counter[$post_id] = $new_count;
        update_post_meta($post_id, 'applixir_visit_counter', $counter);
    }

    public function insert_ad_div()
    {
        $message  = '<div id="applixir_vanishing_div" hidden>
		<iframe id="applixir_parent" allow="autoplay"></iframe>
	</div>';
        echo $message;
    }
}
new Applixir_Restriction();
