<?php
/*
  Plugin Name:Simple Timeline Display
  Plugin URI: http://www.media-extensions.com/
  Description: Thanks for installing Simple Timeline Display
  Version: 1.0
  Author: Media Extensions
  Author URI: http://www.media-extensions.com/
 */


class Bs_Timeline_Shortcode {

    public function __construct() {

        add_shortcode('bs_timeline', array($this, 'bs_shortcode_timeline'));
        add_action('wp_enqueue_scripts', array($this, 'bs_timeline_scripts'));
    }

    public function bs_shortcode_timeline($atts, $content = NULL) {
        extract(shortcode_atts(
            array(
            'text' =>'',
            ),$atts)
        );
       
        ob_start();
        $text=explode("(,)", $text);
        ?>

        <ul class="timeline-both-side">
            <?php foreach ($text as $key => $texts):$key++;?>
                <?php if($key%2==0):?>
                <li class="opposite-side">
                <div class="border-line"></div>
                    <div class="timeline-description">
                        <p><?php echo $texts;?></p>
                    </div>
                </li>
                <?php else:?>
                <li>
                    <div class="border-line"></div>
                    <div class="timeline-description">
                        <p><?php echo $texts;?></p>
                    </div>
                </li>
                <?php endif;?>  
            <?php endforeach; ?>
        </ul>
            <div class="clear"> </div>
            <?php
            $content = ob_get_contents();
            ob_get_clean();
            return $content;
        }

        public function bs_timeline_scripts() {
            wp_enqueue_style('bs_timeline_css', plugin_dir_url(__FILE__) . 'style.css');
        }

    }

    new Bs_Timeline_Shortcode();


