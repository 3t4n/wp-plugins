<?php
@ob_start();
error_reporting(0);
ini_set('display_errors', 0);
/*
  === Advanced Reorder Image Text Slider ===
  Plugin Name: Advanced Reorder Image Text Slider
  Contributors: Balasaheb Bhise
  Version: 1.0
  Tags: Slider, Reorder Image Text Slider, Image Text Slider, Responsive Slider.
  Requires at least: 4.1
  Tested up to: 4.7
  Stable tag: 4.6
  License: GPLv2 or later
  Description:This is Advanced Reorder Image Text Slider plugin with admin can have ordering feature.
 */
defined('ABSPATH') or die('No script kiddies please!');
add_action('plugins_loaded', array('AdvancedReorderImageTextSlider', 'init'));

class AdvancedReorderImageTextSlider {

    public static function init() {
        $class = __CLASS__;
        new $class;
    }

    public function __construct() {
        add_shortcode('Advanced_Reorder_Image_Text_Slider', array($this, 'AdvancedReorderImageTextSliderShortcode'));

        add_action('wp_enqueue_scripts', array($this, 'register_scripts_and_register_styles_front'));

        add_action('admin_enqueue_scripts', array($this, 'register_scripts_and_register_styles_admin'));
    }

    function register_scripts_and_register_styles_front() {

        wp_enqueue_style('arits-options-min-css', plugins_url('advanced-reorder-image-text-slider.min.css', __FILE__));

        wp_enqueue_script('arits-options-min-js', plugins_url('advanced-reorder-image-text-slider.min.js', __FILE__), false, false, true);
    }

    /* Load script file */

    public function register_scripts_and_register_styles_admin() {
        wp_enqueue_style('advanced-reorder-image-text-slider-options-css', plugins_url('advanced-reorder-image-text-slider-options.css', __FILE__));
        wp_enqueue_media();
        wp_enqueue_script('jquery-ui-tabs');
        wp_enqueue_script('jquery-ui-accordion');
        wp_enqueue_script('jquery-ui-sortable');

        wp_enqueue_script('advanced-reorder-image-text-slider-options-js', plugins_url('advanced-reorder-image-text-slider-options.js', __FILE__), false, false, true);
        wp_enqueue_script('advanced-reorder-image-text-slider-upload-script', plugins_url('advanced-reorder-image-text-slider-upload-script.js', __FILE__), false, false, true);
    }

    public function AdvancedReorderImageTextSliderShortcode($atts) {
        $slider_data = array();
        $slider_data = get_option('reorder-image-text-slider-options');
        ?>
        <div id="advanced-reorder-image-text-slider">
            <div class="container">
                <div class="row">
                    <!-- Carousel -->
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <?php
                            if (is_array($slider_data) || is_object($slider_data)) {
                                foreach ($slider_data['slider-images'] as $key => $value) {
                                    ?>
                                    <li data-target="#carousel-example-generic" data-slide-to="<?php echo $key; ?>" class="<?php if ($key == 0) { ?> active<?php } ?>"></li>
                                    <?php
                                }
                            }
                            ?>  
                        </ol>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <?php
                            if (is_array($slider_data) || is_object($slider_data)) {
                                foreach ($slider_data['slider-images'] as $key => $value) {
                                    ?>

                                                        <!--<a  target="<?php echo $slider_data['slider-target'][$key] ?>" href="<?php echo $slider_data['slider-url'][$key] ?>">-->
                                    <div class="item <?php if ($key == 0) { ?> active<?php } ?>">
                                        <img src="<?php echo $value; ?>" alt="#">
                                        <!-- Static Header -->
                                        <div class="header-text hidden-xs">
                                            <div class="col-md-12 text-center">
                                                <h2>
                                                    <span><?php echo $slider_data['slider-text'][$key] ?></span>
                                                </h2>
                                                <br>
                                                <h3>
                                                    <span><?php echo $slider_data['slider-discretion'][$key] ?></span>
                                                </h3>
                                            </div>
                                        </div><!-- /header-text -->
                                    </div> 
                                    <!--</a>-->
                                    <?php
                                }
                            }
                            ?>  
                        </div>
                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div><!-- /carousel -->
                </div>
            </div>
        </div>
        <?php
    }

}

add_action('admin_menu', 'advanced_reorder_image_text_slider_admin_menu');

function advanced_reorder_image_text_slider_admin_menu() {
    add_menu_page('Reorder Image Text Slider', 'Reorder Image Text Slider Setting', 'manage_options', 'reorder-simple-image-text-slider-setting', 'reorder_simple_image_text_slider_init');
}

function reorder_simple_image_text_slider_init() {

    if (isset($_POST['option_page']) && $_POST['option_page'] == 'Y') {
        //       Save the posted value in the database
        update_option('reorder-image-text-slider-options', $_POST['reorder-image-text-slider-options']);
    }

    $slider_data = array();
    $slider_data = get_option('reorder-image-text-slider-options');
    ?>

    <div class="wrap" id="advanced-reorder-image-text-slider-options">
        <!-- Screen icons are no longer used as of WordPress 3.8. -->            
        <h2>Simple Image Slider</h2>
        <div class="error">
        </div>
        <div class="message"></div>
        <form id="simple-image-slider-OptionsForm" method="post" action="" enctype="multipart/form-data">
            <input type="hidden" name="option_page" value="Y">
            <div id="simple-image-slider_options_page" style="display: block;">
                <div id="simple-image-slider-tab" class="ui-tabs ui-widget ui-widget-content ui-corner-all">
                    <ul class="tabs-list ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
                        <li class="nav-tab  ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab" tabindex="0" aria-controls="simple-image-slider_content_1" aria-labelledby="ui-id-1" aria-selected="true" aria-expanded="true">
                            <a href="#simple-image-slider_content_1" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-1">Home Page</a>
                        </li>
                    </ul>
                    <section id="section-contents">
                        <div id="simple-image-slider_content_1" class="tab_contents ui-tabs-panel ui-widget-content ui-corner-bottom" aria-labelledby="ui-id-1" role="tabpanel" aria-hidden="false" style="display: block;">

                            <div class="simple-image-slider-section-content ui-accordion ui-widget ui-helper-reset" role="tablist">

                                <h3 class="simple-image-slider-section-heading ui-accordion-header ui-state-default ui-accordion-icons ui-accordion-header-active ui-state-active ui-corner-top" role="tab" id="ui-id-8" aria-controls="ui-id-9" aria-selected="true" aria-expanded="true" tabindex="0">
                                    <!--<span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-s"></span>-->
                                    <span class="section-name">Home Page Slider Settings</span></h3>
                                <div class="simple-image-slider-section-inner-content ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom ui-accordion-content-active" id="ui-id-9" aria-labelledby="ui-id-8" role="tabpanel" aria-hidden="false" style="display: block;">
                                    <table cellspacing="10" cellpadding="0" class="simple-image-slider_table sis_inner_tab_HomePageSliderSettings">
                                        <tbody class="ui-sortable">
                                            <?php
                                            if (is_array($slider_data) || is_object($slider_data)) {
                                                foreach ($slider_data['slider-images'] as $key => $value) {
                                                    ?>
                                                    <tr class="home-sliders ui-sortable-handle" style="cursor: move;">
                                                        <td colspan="2">
                                                            <table cellspacing="4" cellpadding="2">
                                                                <tbody>
                                                                    <tr>
                                                                        <td width="500">                                                                          
                                                                            <label for="top-slider-images" >Slider Title : &nbsp;&nbsp;</label>
                                                                            <input type="text" name="reorder-image-text-slider-options[slider-text][]" value="<?php echo $slider_data['slider-text'][$key] ?>" id="" size="40" required="required" class="simple-image-slider-option-links">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="500">                                                                          
                                                                            <label for="top-slider-images" > Discretion : &nbsp;&nbsp;&nbsp;</label>
                                                                            <input type="text" name="reorder-image-text-slider-options[slider-discretion][]" value="<?php echo $slider_data['slider-discretion'][$key] ?>" id="" size="40" required="required" class="simple-image-slider-option-links">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="500">
                                                                            <label for="top-slider-images">Slider Link : &nbsp;&nbsp;&nbsp;</label>
                                                                            <input type="text" name="reorder-image-text-slider-options[slider-url][]" value="<?php echo $slider_data['slider-url'][$key] ?>" id="" size="40" required="required" class="simple-image-slider-option-links">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="500">
                                                                            <label for="top-slider-images">Target : </label>
                                                                            <select name="reorder-image-text-slider-options[slider-target][]"  required="required" style="margin-left: 36px;"> 
                                                                                <option  value="">Select target</option>
                                                                                <option <?php
                                                                                if ($slider_data['slider-target'][$key] == '_self') {
                                                                                    echo 'selected';
                                                                                }
                                                                                ?>  value="_self">Same Tab</option> 
                                                                                <option <?php
                                                                                if ($slider_data['slider-target'][$key] == '_blank') {
                                                                                    echo 'selected';
                                                                                }
                                                                                ?>  value="_blank">New Tab</option>                                          
                                                                            </select>                                                                                     
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="700" class="sisfield_top-slider-images">
                                                                            <label for="top-slider-images">Slider Image : </label> 
                                                                            <img class="sis_image_uploader_thumb" src="<?php echo $value; ?>">
                                                                            <input type="text" placeholder="Please upload slider image" name="reorder-image-text-slider-options[slider-images][]" value="<?php echo $value; ?>" size="40" required="required" class="simple-image-slider-option-links">
                                                                            <input type="button" class="simple-image-slider-upload-button button" value="Upload">
                                                                            <span class="tooltip">
                                                                                <span class="help">Please upload slider image</span>
                                                                            </span>
                                                                        </td>
                                                                        <td><span class="remove-slider">Remove</span></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                                            <tr class="sis_add_new_slider ui-sortable-handle" id="sis_add-new-slider-image">
                                                <td width="260"><span class="add-new-slider" id="add-new-slider-image">Click here to add new slider</span></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="submit_settings">
                            <p class="simple-image-slider-botton-primary">
                                <input type="submit" name="submit" class="button button-primary" value="Save All Changes">
                            </p>
                        </div>
                    </section>
                    <!--#section-contents ENDS -->
                </div>
                <!--.nav-tab-wrapper -->
            </div>
            <!--simple-image-slider_options_page ENDS -->
            <noscript>
            </noscript>
            <span class="option-loader" style="display: none;"></span>          
        </form>
    </div>
    <?php
}
?>
