<?php
if( ! class_exists( 'AFAQCBC_q_a_faq_controls_class' ) ) {
    class AFAQCBC_q_a_faq_controls_class
    {
        //---------------------------------------------------------------------
        //Layout builders
        //---------------------------------------------------------------------

        public static function margin_padding($type)
        {
            ?>
            <div class="faq_style hide" id="<?php echo esc_attr($type);?>">
                <div class="kc-param-row field-corners field-base-margin| faq-css-group-box" data-name="margin|">

                    <div class="m-p-r-label">
                        <label><?php echo esc_html__($type,'advanced-faq-creator-by-category')?>:</label>
                    </div>
                    <div class="m-p-r-content">
                        <div class="faq-corners-wrp">
                            <div class="faq-corners-top faq-corners-pos">
                                <input id="<?php echo esc_attr($type);?>-top" name="<?php echo esc_attr($type);?>-top" value="" type="number">
                            </div>

                            <div class="faq-corners-right faq-corners-pos">
                                <input id="<?php echo esc_attr($type);?>-right" name="<?php echo esc_attr($type);?>-right" value="" type="number">
                            </div>

                            <div class="faq-corners-bottom faq-corners-pos">
                                <input id="<?php echo esc_attr($type);?>-bottom" name="<?php echo esc_attr($type);?>-bottom" value="" type="number">
                            </div>

                            <div class="faq-corners-left faq-corners-pos">
                                <input id="<?php echo esc_attr($type);?>-left" name="<?php echo esc_attr($type);?>-left" value="" type="number">
                            </div>

                            <div class="m-f-u-li-link">
                                <span><i class="sl-link"></i></span>
                            </div>
                        </div>


                    </div>
                </div>
                <hr class="form_hr">
            </div>



            <?php
        }
        public static function border_width(){
            ?>
            <div class="faq_style hide" id="text_border_width">
                <div class="m-p-r-label">
                    <label><?php echo esc_html__('border width','advanced-faq-creator-by-category')?>:</label>
                </div>
                <input class="sliderr" oninput="border_width(value)" type="range" min="11" max="40" step="1"  id="border_width" name="border_width" placeholder="<?php echo esc_attr__( '15', 'advanced-faq-creator-by-category' );?>" value="15"><output style="display: block;" for="faqs_border_width_Size" id="border_widthv">15px</output>

            </div>
            <?php
        }

        public static function font_size(){
            ?>
            <div class="faq_style hide" id="text_font-size">
                <div class="m-p-r-label">
                    <label><?php echo esc_html__('Font size','advanced-faq-creator-by-category')?>:</label>
                </div>
                <input class="sliderr" oninput="TitleSize(value)" type="range" min="0" max="50" step="1"  id="font-size" name="font-size" placeholder="' . esc_attr__( '15', 'advanced-faq-creator-by-category' ) . '" value="0"><output style="display: block;" for="faqs_Title_Post_Size" id="TitleSizeV"></output>
                <hr class="form_hr">
            </div>
            <?php
        }
        public static function color(){
            ?>
            <div class="faq_style hide" id="text_color">
                <div class="m-p-r-label">
                    <label><?php echo esc_html__('Font color','advanced-faq-creator-by-category')?>:</label>
                </div>
                <input type="text" id="color" name="color" class="gwp_pc_primary_color_field"  value="">
                <hr class="form_hr">
            </div>
            <?php
        }
        public static function border_color(){
            ?>
            <div class="faq_style hide" id="text_border-color">
                <div class="m-p-r-label">
                    <label><?php echo esc_html__('border color','advanced-faq-creator-by-category')?>:</label>
                </div>
                <input type="text" id="border-color" name="border-color" class="gwp_pc_border-color_field"  value="">
                <hr class="form_hr">
            </div>
            <?php
        }
        public static function background_color(){
            ?>
            <div class="faq_style hide" id="text_background-color">
                <div class="m-p-r-label">
                    <label><?php echo esc_html__('Background color','advanced-faq-creator-by-category')?>:</label>
                </div>
                <input type="text" id="background-color" name="background-color" class="gwp_pc_background-color_field"  value="">
                <hr class="form_hr">
            </div>
            <?php
        }
        public static function hover_background_color(){
            ?>
            <div class="faq_style hide" id="background_hover_color">
                <div class="m-p-r-label">
                    <label><?php echo esc_html__('Hover background color','advanced-faq-creator-by-category')?>:</label>
                </div>
                <input type="text" id="hover_background-color" name="hover_background-color" class="gwp_pc_hover_background-color_field"  value="">
                <hr class="form_hr">
            </div>
            <?php
        }
        public static function hover_text_color(){
            ?>
            <div class="faq_style hide" id="text_hover_color">
                <div class="m-p-r-label">
                    <label><?php echo esc_html__('Hover text color','advanced-faq-creator-by-category')?>:</label>
                </div>
                <input type="text" id="hover_text_color" name="hover_text_color" class="gwp_pc_hover_text_color_field"  value="">
                <hr class="form_hr">
            </div>
            <?php
        }
        public static function textarea($placeholder,$name,$option_value){
            ?>
            <textarea placeholder="<?php echo esc_attr($placeholder);?>" rows="9" class="form-control textbox_custom" name="<?php echo esc_attr($name);?>" id="<?php echo esc_attr($name);?>"><?php echo esc_textarea($option_value);?></textarea>
            <?php
        }

        public static function animation(){
            ?>
            <div class="faq_style hide" id="text_animation">
                <div id="animate-preview-faq" >
                    <?php echo esc_html__('Animate preview','advanced-faq-creator-by-category')?>
                </div>

                <div class="m-p-r-label">
                    <label><?php echo esc_html__('Animation','advanced-faq-creator-by-category')?>:</label>
                </div>
                <select class="input input--dropdown js--animations form-control" id="animation_select" name="animation_select">
                    <option value=""><?php echo esc_attr__('select','advanced-faq-creator-by-category')?></option>
                    <optgroup label="<?php echo esc_attr__('Attention Seekers','advanced-faq-creator-by-category')?>">
                        <option value="bounce"><?php echo esc_attr__('bounce','advanced-faq-creator-by-category')?></option>
                        <option value="flash"><?php echo esc_attr__('flash','advanced-faq-creator-by-category')?></option>
                        <option value="pulse"><?php echo esc_attr__('pulse','advanced-faq-creator-by-category')?></option>
                        <option value="rubberBand"><?php echo esc_attr__('rubberBand','advanced-faq-creator-by-category')?></option>
                        <option value="shake"><?php echo esc_attr__('shake','advanced-faq-creator-by-category')?></option>
                        <option value="swing"><?php echo esc_attr__('swing','advanced-faq-creator-by-category')?></option>
                        <option value="tada"><?php echo esc_attr__('tada','advanced-faq-creator-by-category')?></option>
                        <option value="wobble"><?php echo esc_attr__('wobble','advanced-faq-creator-by-category')?></option>
                        <option value="jello"><?php echo esc_attr__('jello','advanced-faq-creator-by-category')?></option>
                        <option value="heartBeat"><?php echo esc_attr__('heartBeat','advanced-faq-creator-by-category')?></option>
                    </optgroup>

                    <optgroup label="<?php echo esc_attr__('Bouncing Entrances','advanced-faq-creator-by-category')?>">
                        <option value="bounceIn"><?php echo esc_attr__('bounceIn','advanced-faq-creator-by-category')?></option>
                        <option value="bounceInDown"><?php echo esc_attr__('bounceInDown','advanced-faq-creator-by-category')?></option>
                        <option value="bounceInLeft"><?php echo esc_attr__('bounceInLeft','advanced-faq-creator-by-category')?></option>
                        <option value="bounceInRight"><?php echo esc_attr__('bounceInRight','advanced-faq-creator-by-category')?></option>
                        <option value="bounceInUp"><?php echo esc_attr__('bounceInUp','advanced-faq-creator-by-category')?></option>
                    </optgroup>

                    <optgroup label="<?php echo esc_attr__('Bouncing Exits','advanced-faq-creator-by-category')?>">
                        <option value="bounceOut"><?php echo esc_attr__('bounceOut','advanced-faq-creator-by-category')?></option>
                        <option value="bounceOutDown"><?php echo esc_attr__('bounceOutDown','advanced-faq-creator-by-category')?></option>
                        <option value="bounceOutLeft"><?php echo esc_attr__('bounceOutLeft','advanced-faq-creator-by-category')?></option>
                        <option value="bounceOutRight"><?php echo esc_attr__('bounceOutRight','advanced-faq-creator-by-category')?></option>
                        <option value="bounceOutUp"><?php echo esc_attr__('bounceOutUp','advanced-faq-creator-by-category')?></option>
                    </optgroup>

                    <optgroup label="<?php echo esc_attr__('Fading Entrances','advanced-faq-creator-by-category')?>">
                        <option value="fadeIn"><?php echo esc_attr__('fadeIn','advanced-faq-creator-by-category')?></option>
                        <option value="fadeInDown"><?php echo esc_attr__('fadeInDown','advanced-faq-creator-by-category')?></option>
                        <option value="fadeInDownBig"><?php echo esc_attr__('fadeInDownBig','advanced-faq-creator-by-category')?></option>
                        <option value="fadeInLeft"><?php echo esc_attr__('fadeInLeft','advanced-faq-creator-by-category')?></option>
                        <option value="fadeInLeftBig"><?php echo esc_attr__('fadeInLeftBig','advanced-faq-creator-by-category')?></option>
                        <option value="fadeInRight"><?php echo esc_attr__('fadeInRight','advanced-faq-creator-by-category')?></option>
                        <option value="fadeInRightBig"><?php echo esc_attr__('fadeInRightBig','advanced-faq-creator-by-category')?></option>
                        <option value="fadeInUp"><?php echo esc_attr__('fadeInUp','advanced-faq-creator-by-category')?></option>
                        <option value="fadeInUpBig"><?php echo esc_attr__('fadeInUpBig','advanced-faq-creator-by-category')?></option>
                    </optgroup>

                    <optgroup label="<?php echo esc_attr__('Fading Exits','advanced-faq-creator-by-category')?>">
                        <option value="fadeOut"><?php echo esc_attr__('fadeOut','advanced-faq-creator-by-category')?></option>
                        <option value="fadeOutDown"><?php echo esc_attr__('fadeOutDown','advanced-faq-creator-by-category')?></option>
                        <option value="fadeOutDownBig"><?php echo esc_attr__('fadeOutDownBig','advanced-faq-creator-by-category')?></option>
                        <option value="fadeOutLeft"><?php echo esc_attr__('fadeOutLeft','advanced-faq-creator-by-category')?></option>
                        <option value="fadeOutLeftBig"><?php echo esc_attr__('fadeOutLeftBig','advanced-faq-creator-by-category')?></option>
                        <option value="fadeOutRight"><?php echo esc_attr__('fadeOutRight','advanced-faq-creator-by-category')?></option>
                        <option value="fadeOutRightBig"><?php echo esc_attr__('fadeOutRightBig','advanced-faq-creator-by-category')?></option>
                        <option value="fadeOutUp"><?php echo esc_attr__('fadeOutUp','advanced-faq-creator-by-category')?></option>
                        <option value="fadeOutUpBig"><?php echo esc_attr__('fadeOutUpBig','advanced-faq-creator-by-category')?></option>
                    </optgroup>

                    <optgroup label="<?php echo esc_attr__('Flippers','advanced-faq-creator-by-category')?>">
                        <option value="flip"><?php echo esc_attr__('flip','advanced-faq-creator-by-category')?></option>
                        <option value="flipInX"><?php echo esc_attr__('flipInX','advanced-faq-creator-by-category')?></option>
                        <option value="flipInY"><?php echo esc_attr__('flipInY','advanced-faq-creator-by-category')?></option>
                        <option value="flipOutX"><?php echo esc_attr__('flipOutX','advanced-faq-creator-by-category')?></option>
                        <option value="flipOutY"><?php echo esc_attr__('flipOutY','advanced-faq-creator-by-category')?></option>
                    </optgroup>

                    <optgroup label="<?php echo esc_attr__('Lightspeed','advanced-faq-creator-by-category')?>">
                        <option value="lightSpeedIn"><?php echo esc_attr__('lightSpeedIn','advanced-faq-creator-by-category')?></option>
                        <option value="lightSpeedOut"><?php echo esc_attr__('lightSpeedOut','advanced-faq-creator-by-category')?></option>
                    </optgroup>

                    <optgroup label="<?php echo esc_attr__('Rotating Entrances','advanced-faq-creator-by-category')?>">
                        <option value="rotateIn"><?php echo esc_attr__('rotateIn','advanced-faq-creator-by-category')?></option>
                        <option value="rotateInDownLeft"><?php echo esc_attr__('rotateInDownLeft','advanced-faq-creator-by-category')?></option>
                        <option value="rotateInDownRight"><?php echo esc_attr__('rotateInDownRight','advanced-faq-creator-by-category')?></option>
                        <option value="rotateInUpLeft"><?php echo esc_attr__('rotateInUpLeft','advanced-faq-creator-by-category')?></option>
                        <option value="rotateInUpRight"><?php echo esc_attr__('rotateInUpRight','advanced-faq-creator-by-category')?></option>
                    </optgroup>

                    <optgroup label="<?php echo esc_attr__('Rotating Exits','advanced-faq-creator-by-category')?>">
                        <option value="rotateOut"><?php echo esc_attr__('rotateOut','advanced-faq-creator-by-category')?></option>
                        <option value="rotateOutDownLeft"><?php echo esc_attr__('rotateOutDownLeft','advanced-faq-creator-by-category')?></option>
                        <option value="rotateOutDownRight"><?php echo esc_attr__('rotateOutDownRight','advanced-faq-creator-by-category')?></option>
                        <option value="rotateOutUpLeft"><?php echo esc_attr__('rotateOutUpLeft','advanced-faq-creator-by-category')?></option>
                        <option value="rotateOutUpRight"><?php echo esc_attr__('rotateOutUpRight','advanced-faq-creator-by-category')?></option>
                    </optgroup>

                    <optgroup label="<?php echo esc_attr__('Sliding Entrances','advanced-faq-creator-by-category')?>">
                        <option value="slideInUp"><?php echo esc_attr__('slideInUp','advanced-faq-creator-by-category')?></option>
                        <option value="slideInDown"><?php echo esc_attr__('slideInDown','advanced-faq-creator-by-category')?></option>
                        <option value="slideInLeft"><?php echo esc_attr__('slideInLeft','advanced-faq-creator-by-category')?></option>
                        <option value="slideInRight"><?php echo esc_attr__('slideInRight','advanced-faq-creator-by-category')?></option>

                    </optgroup>
                    <optgroup label="<?php echo esc_attr__('Sliding Exits','advanced-faq-creator-by-category')?>">
                        <option value="slideOutUp"><?php echo esc_attr__('slideOutUp','advanced-faq-creator-by-category')?></option>
                        <option value="slideOutDown"><?php echo esc_attr__('slideOutDown','advanced-faq-creator-by-category')?></option>
                        <option value="slideOutLeft"><?php echo esc_attr__('slideOutLeft','advanced-faq-creator-by-category')?></option>
                        <option value="slideOutRight"><?php echo esc_attr__('slideOutRight','advanced-faq-creator-by-category')?></option>

                    </optgroup>

                    <optgroup label="<?php echo esc_attr__('','advanced-faq-creator-by-category')?>Zoom Entrances">
                        <option value="zoomIn"><?php echo esc_attr__('zoomIn','advanced-faq-creator-by-category')?></option>
                        <option value="zoomInDown"><?php echo esc_attr__('zoomInDown','advanced-faq-creator-by-category')?></option>
                        <option value="zoomInLeft"><?php echo esc_attr__('zoomInLeft','advanced-faq-creator-by-category')?></option>
                        <option value="zoomInRight"><?php echo esc_attr__('zoomInRight','advanced-faq-creator-by-category')?></option>
                        <option value="zoomInUp"><?php echo esc_attr__('zoomInUp','advanced-faq-creator-by-category')?></option>
                    </optgroup>

                    <optgroup label="<?php echo esc_attr__('','advanced-faq-creator-by-category')?>Zoom Exits">
                        <option value="zoomOut"><?php echo esc_attr__('zoomOut','advanced-faq-creator-by-category')?></option>
                        <option value="zoomOutDown"><?php echo esc_attr__('zoomOutDown','advanced-faq-creator-by-category')?></option>
                        <option value="zoomOutLeft"><?php echo esc_attr__('zoomOutLeft','advanced-faq-creator-by-category')?></option>
                        <option value="zoomOutRight"><?php echo esc_attr__('zoomOutRight','advanced-faq-creator-by-category')?></option>
                        <option value="zoomOutUp"><?php echo esc_attr__('zoomOutUp','advanced-faq-creator-by-category')?></option>
                    </optgroup>

                    <optgroup label="<?php echo esc_attr__('Specials','advanced-faq-creator-by-category')?>">
                        <option value="hinge"><?php echo esc_attr__('hinge','advanced-faq-creator-by-category')?></option>
                        <option value="jackInTheBox"><?php echo esc_attr__('jackInTheBox','advanced-faq-creator-by-category')?></option>
                        <option value="rollIn"><?php echo esc_attr__('rollIn','advanced-faq-creator-by-category')?></option>
                        <option value="rollOut"><?php echo esc_attr__('rollOut','advanced-faq-creator-by-category')?></option>
                    </optgroup>
                </select>
                <hr class="form_hr">
            </div>
            <?php
        }

        public static function input_text_contener($title , $name,$val=''){
            ?>
            <div class="faq_style hide" id="text_<?php echo esc_attr($name);?>">
                <div class="m-p-r-label">
                    <label><?php echo esc_attr__($title,'advanced-faq-creator-by-category')?>:</label>
                </div>
                <input id="<?php echo esc_attr($name);?>" name="<?php echo esc_attr($name);?>" value="<?php echo esc_attr($val);?>"  type="text"  style=" border-radius: 2px;">
                <hr class="form_hr">
            </div>
            <?php
        }

        public static function input_text($name,$val=''){
            ?>
            <input id="<?php echo esc_attr($name);?>" name="<?php echo esc_attr($name);?>" value="<?php echo esc_attr($val);?>"  type="text"  style=" border-radius: 2px;">
            <?php
        }


        public static function add_label($text)
        {?>
            <div class="col-md-12 col-12"><div class="welling"><span><?php echo esc_html__($text,'advanced-faq-creator-by-category');?></span></div></div>
            <?php
        }
        public static function add_label_for_modal($text)
        {?>
            <div class="w-modal-menu"><div class="welling"><span><?php echo esc_html__($text,'advanced-faq-creator-by-category');?></span></div></div>
            <?php
        }

        //---------------------------------------------------------------------
        //Add hidden input
        //---------------------------------------------------------------------
        public static function add_hidden_input($name, $value)
        {?>
            <input type="hidden" id="<?php echo esc_attr($name);?>" name="<?php echo esc_attr($name);?>" value='<?php echo esc_attr($value);?>'>
        <?php
        }
        //---------------------------------------------------------------------
        //Add dropdown control
        //---------------------------------------------------------------------
        public static function add_dropdown($name, $options_array, $default_value,$class_name="")
        {?>
            <div id="div_<?php echo esc_attr($name);?>">
            <div class="styled-select-div">
            <select class="form-control <?php echo esc_attr($class_name);?>" size="1" id="<?php echo esc_attr($name);?>"   name="<?php echo esc_attr($name);?>">
            <?php
            foreach ($options_array as $item) {
                if($item['0'] == $default_value){ ?>
                    <option selected value="<?php echo esc_attr($item['0']);?>"><?php echo esc_attr($item['1']);?></option>
                <?php }else{ ?>
                    <option  value="<?php echo esc_attr($item['0']);?>"><?php echo esc_attr($item['1']);?></option>
                <?php }
            }
            ?>
            </select>
            </div>
            </div>
        <?php
        }
    }//Class End
}
