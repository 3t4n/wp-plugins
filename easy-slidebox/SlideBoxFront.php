<?php

class SlideBoxFront {

    function __construct() {
        $this->init();
    }

    function init() {
        add_action('wp_enqueue_scripts', array($this, 'add_slidebox_jsscripts'), 11);
        add_action('wp_enqueue_scripts', array($this, 'add_slidebox_css'), 11);
        add_shortcode('slidebox', array($this, 'make_slidebox'));
        add_action('wp_head', array($this, 'add_custom_css'));
    }

    function add_slidebox_jsscripts() {
        wp_enqueue_script('jquery');
        wp_register_script('slidebox_js_front', plugins_url('slidebox.js', __FILE__));
        wp_enqueue_script('slidebox_js_front');
    }

    function add_slidebox_css() {
        wp_register_style('slidebox_css_front', plugins_url('slidebox.css', __FILE__));
        wp_enqueue_style('slidebox_css_front');
    }

    function add_custom_css() {
        if (get_option("slidebox_css_title") != "" ||
                get_option("slidebox_css_content") != "" ||
                get_option("slidebox_img_more") != "" ||
                get_option("slidebox_img_less") != "") {
            ?>
            <style>
            <?php if (get_option("slidebox_css_title") != "") { ?>
                    .slideBoxTitle{
                <?php echo get_option("slidebox_css_title"); ?>
                    }
            <?php } ?>
                            
            <?php if (get_option("slidebox_css_content") != "") { ?>
                    .slideBoxTitle+div{       
                <?php echo get_option("slidebox_css_content"); ?>
                    }
            <?php } ?>
                            
            <?php if (get_option("slidebox_img_more") != "") { ?>
                    .slideBoxLess{
                        background-image: url("<?php echo get_option("slidebox_img_more"); ?>");
                    }
            <?php } ?>
            <?php if (get_option("slidebox_img_less") != "") { ?>
                    .slideBoxMore{
                        background-image: url("<?php echo get_option("slidebox_img_less"); ?>");
                    }
            <?php } ?>
            </style>
            <?php
        }
    }

    function make_slidebox($atts, $content = null) {
        $display = "";
        $cssDiv = "";
        if ($atts["show"] == "true") {
            $display = "slideBoxLess";
        } else {
            $display = "slideBoxMore";
            $cssDiv = ' class="slideBoxHiddenText" ';
        }
        
        $titre = $atts["title"];
        
        $texte = '<div class="slideBoxTitle ' . $display . '">' . $titre . '</div>';
        $divAfter = '<div' . $cssDiv . '>' . $content . '</div>';
        $texte = $texte . $divAfter;
        
        return $texte;
    }

}
