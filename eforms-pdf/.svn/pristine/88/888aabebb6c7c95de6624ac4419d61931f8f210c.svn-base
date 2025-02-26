<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
class Superaddons_Pdfbuilder_editor {
    function __construct(){
      add_action("builder_email_tab__editor",array($this,"builder_email_tab__editor"),100);  
    }
    public static function get_color_pick($text = "Color Pick"){
        return '<div class="builder__editor--color">
                <label>'.$text.'</label>
                <div class="">
                    <input type="text" value="#e7e7e7" class="builder__editor_color">
                </div>
            </div>';
    }
    public static function get_padding() {
        return '<div class="builder__editor--padding">
                <div>
                    <label>'.esc_html__("Top","pdf-for-wpforms").'</label>
                    <input data-after_value="px" class="builder__editor--padding-top touchspin" type="text" placeholder="px" />
                </div>
                <div>
                    <label>'. esc_html__("Bottom","pdf-for-wpforms").'</label>
                    <input data-after_value="px" class="builder__editor--padding-bottom touchspin" type="text" placeholder="px" />
                </div>
                <div>
                    <label>'.esc_html__("Left","pdf-for-wpforms").'</label>
                    <input data-after_value="px" class="builder__editor--padding-left touchspin" type="text" placeholder="px" />
                </div>
                <div>
                    <label>'.esc_html__("Right","pdf-for-wpforms").'</label>
                    <input data-after_value="px" class="builder__editor--padding-right touchspin" type="text" placeholder="px" />
                </div>
            </div>';
    }
    function builder_email_tab__editor(){
    ?>
        <div class="builder__editor--item builder__editor--item-html">
            <div class="builder__editor--html">
                <label><?php esc_html_e("Content","pdf-for-wpforms") ?></label>
                <textarea id="builder__editor--js" class="builder__editor--js"></textarea>
            </div>
        </div>
        <div class="builder__editor--item builder__editor--item-video">
            <div class="builder__editor--video">
                <label><?php esc_html_e("Youtube","pdf-for-wpforms") ?></label>
                <input type="text" class="video_url">
            </div>
        </div>
        <div class="builder__editor--item builder__editor--item-field">
            <label><?php esc_html_e("Map Field","pdf-for-wpforms") ?></label>
            <div class="builder__editor--button-url">
                
                <div class="pdfcreator-filed-type-field">
                    <select class="pdfcreator-filed-type-editor-field regular-text">
                        <option value="0"><?php esc_html_e("Choose Field","pdf-for-wpforms") ?></option>
                        <?php 
                        $lists = apply_filters("wp_builder_pdf_shortcode",array());
                        foreach( $lists as $shortcode ){
                            if( $shortcode["value"] != ""){
                            ?>
                            <option value="<?php echo esc_html($shortcode["value"]) ?>"><?php echo esc_html($shortcode["text"]) ?></option>
                            <?php }
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="builder__editor--item builder__editor--item-image">
            <label><?php esc_html_e("Image","pdf-for-wpforms") ?></label>
            <div class="builder__editor--button-url">
                <select class="pdfcreator-image-type-editor">
                        <option value="0"><?php esc_html_e("Upload Image","pdf-for-wpforms") ?></option>
                        <option value="1"><?php esc_html_e("Use Field","pdf-for-wpforms") ?></option>
                </select>
                <div class="pdfcreator-image-type-upload">
                    <label><?php esc_html_e("Source URL","pdf-for-wpforms") ?></label>
                    <input type="text" class="image_url" placeholder="Source url">
                    <input type="button" class="upload-editor--image button button-primary" value="Upload">
                </div>
                <div class="pdfcreator-image-type-field">
                    <select class="pdfcreator-image-type-editor-field regular-text">
                        <option value="0"><?php esc_html_e("Choose Field","pdf-for-wpforms") ?></option>
                        <?php 
                        $lists = apply_filters("wp_builder_pdf_shortcode",array());
                        foreach( $lists as $shortcode ){
                            if( $shortcode["value"] != ""){
                            ?>
                            <option value="<?php echo esc_html($shortcode["value"]) ?>"><?php echo esc_html($shortcode["text"]) ?></option>
                            <?php }
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="builder__editor--item builder__editor--item-button">
            <div class="builder__editor--button">
                <label><?php esc_html_e("Button","pdf-for-wpforms") ?></label>
                <div class="builder__editor--button-text">
                    <label><?php esc_html_e("Button text","pdf-for-wpforms") ?></label>
                    <input type="text" class="button_text" value="Button text">
                </div>
                <div class="builder__editor--button-url">
                    <label><?php esc_html_e("Button url","pdf-for-wpforms") ?></label>
                    <input type="text" class="button_url" placeholder="Button url" >
                </div>
                <div class="builder__editor--button-range">
                    <label><?php esc_html_e("Font size","pdf-for-wpforms") ?></label>
                    <input data-after_value="px" type="text" value="16" class="font_size touchspin" min="10" max="30">
                </div>
            </div>
        </div>
        <div class="builder__editor--item builder__editor--item-background">
            <?php echo Superaddons_Pdfbuilder_editor::get_color_pick(esc_html__("Background color","pdf-for-wpforms")) ?>
            <div class="builder__editor--button-url">
                <label><?php esc_html_e("Background Image","pdf-for-wpforms") ?></label>
                <input type="text" class="image_url" placeholder="Source url">
                <input type="button" class="upload-editor--image button button-primary" value="Upload">
            </div>
        </div>
        <div class="builder__editor--item builder__editor--item-background_full">
            <label><?php esc_html_e("Background Full Width","pdf-for-wpforms") ?></label>
                    <input type="checkbox" class="background_full_width" >
        </div>
        <div class="builder__editor--item builder__editor--item-color">
            <?php echo Superaddons_Pdfbuilder_editor::get_color_pick(esc_html__("Color","pdf-for-wpforms")) ?>
        </div>
        <div class="builder__editor--item builder__editor--item-menu">
            <div class="builder__editor--item-menu-hidden hidden">
                <ul>
                    <li>
                        <label><?php esc_html_e("Text","pdf-for-wpforms") ?></label>
                        <input type="text" class="text"> 
                    </li>
                    <li>
                        <label><?php esc_html_e("Url","pdf-for-wpforms") ?></label>
                        <input type="text" class="text_url">
                    </li>
                    <li>
                        <label><?php esc_html_e("Background","pdf-for-wpforms") ?></label>
                        <input type="text" class="text_background" value="transparent">
                    </li>
                    <li>
                         <label><?php esc_html_e("Color","pdf-for-wpforms") ?></label>
                            <input type="text" value="#fff" class="text_color"> 
                    </li>
                </ul>
            </div>
           <div class="menu-content-tool">
           </div>
            <a class="pdfbuilder_email_add_menu button button-primary" href="#"><?php esc_html_e("Add menu","pdf-for-wpforms") ?></a>
        </div>
        <div class="builder__editor--item builder__editor--item-text-align">
            <label><?php esc_html_e("Text align","pdf-for-wpforms") ?></label>
            <div class="builder__editor--align">
                <a class="button__align builder__editor--align-left" data-value="left"><i class="pdf-creator-icon icon-align-left"></i></a>
                <a class="button__align builder__editor--align-center" data-value="center"><i class="pdf-creator-icon icon-align-justify"></i></a>
                <a class="button__align builder__editor--align-right" data-value="right"><i class="pdf-creator-icon icon-align-right"></i></a>
                <input type="text" value="left" class="text_align hidden">
            </div>
        </div>
        <div class="builder__editor--item builder__editor--item-width">
            <div class="builder__editor--padding">
                <div>
                    <label><?php esc_html_e("Width","pdf-for-wpforms") ?></label>
                    <input data-after_value="px" type="text" class="text_width touchspin">
                </div>
            </div>
        </div>
        <div class="builder__editor--item builder__editor--item-height">
            <div class="builder__editor--padding">
                    <div>
                        <label><?php esc_html_e("Height","pdf-for-wpforms") ?></label>
                        <input data-after_value="px" type="text" class="text_height touchspin">
                    </div>
                </div>
            </div>
        </div>
        <div class="builder__editor--item builder__editor--item-padding">
            <label><?php esc_html_e("Padding","pdf-for-wpforms") ?></label>
            <?php echo Superaddons_Pdfbuilder_editor::get_padding() ?>
        </div>
        <div class="builder__editor--item builder__editor--item-margin">
            <label><?php esc_html_e("Margin","pdf-for-wpforms") ?></label>
            <?php echo Superaddons_Pdfbuilder_editor::get_padding() ?>
        </div>
        <div class="builder__editor--item builder__editor--item-border">
            <label><?php esc_html_e("Border","pdf-for-wpforms") ?></label>
            <label><?php esc_html_e("Border Width","pdf-for-wpforms") ?></label>
            <div class="builder__editor--item-border-width">
                <?php echo Superaddons_Pdfbuilder_editor::get_padding() ?>
                <label class="hidden"><?php esc_html_e("Border Style","pdf-for-wpforms") ?></label>
                <input type="text" value="solid" class="border_style hidden">
                <?php echo Superaddons_Pdfbuilder_editor::get_color_pick(esc_html__("Border color","pdf-for-wpforms")) ?> 
            </div>
            <label><?php esc_html_e("Border radius","pdf-for-wpforms") ?></label>
            <div class="builder__editor--item-border-radius">
                <?php echo Superaddons_Pdfbuilder_editor::get_padding() ?>
            </div>
        </div>
        <div class="builder__editor--item builder__editor--item-condition">
            <label><?php esc_html_e("Condition","pdf-for-wpforms") ?></label>
            <textarea class="builder__editor--condition hidden"></textarea>
            <a href="#" class="manager_condition button"><?php esc_html_e("Manager Condition","pdf-for-wpforms") ?></a>
            <?php add_thickbox(); ?>
            <div id="pdfbuilder-popup-content" style="display:none;">
                 <div class="pdfbuilder-popup-content">
                    <select name="" id="pdfcreator-logic-type">
                        <option value="show"><?php esc_html_e("Show","pdf-for-wpforms") ?></option>
                        <option value="hide"><?php esc_html_e("Hide","pdf-for-wpforms") ?></option>
                    </select>
                    <?php esc_html_e(" this field if","pdf-for-wpforms") ?>
                    <select name="" id="pdfcreator-logic-logic">
                        <option value="all"><?php esc_html_e("All","pdf-for-wpforms") ?></option>
                        <option value="any"><?php esc_html_e("Any","pdf-for-wpforms") ?></option>
                    </select>
                    <?php esc_html_e("of the following match:","pdf-for-wpforms") ?>
                    <div class="text-center">
                        <a href="#" class="pdfbuilder_condition_add button"><?php esc_html_e("Add Condition","pdf-for-wpforms") ?></a>
                    </div>
                    <div class="pdfbuilder-popup-layout" >
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
new Superaddons_Pdfbuilder_editor();