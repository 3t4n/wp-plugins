<div id="pt-tabs-container">
    <!--Tabs Menu-->
    <ul class="pt-tabs-menu">

        <li class="current" ><a href="#pt-tab-1"><?php _e('Table Content', PT_TEXTDOMAIN); ?></a></li>
        <li><a href="#pt-tab-2"><?php _e('Table Style', PT_TEXTDOMAIN); ?></a></li>
    </ul>
    <!--TABS Container-->
    <div class="pt-tab">
        <!--TABS LISTS-->
        <!-- TABS 1 Package Data-->
        <div id="pt-tab-1" class="pt-tab-content">
            <div class="cmb2-wrap form-table">
                <div id="cmb2-metabox" class="cmb2-metabox cmb-field-list pt-package-list">
                    <div class="sgpt-container-top-bar">
                        <a class="button-primary" id="add_package">
                            <span class="dashicons dashicons-plus-alt"></span>Add New Column              
                        </a>
                        <input type="hidden" id="pt_total_old_pack" name="pt_total_old_pack" value="<?= (!empty($pt_total_old_pack))? absint($pt_total_old_pack) : 0; ?>">
                        <input type="hidden" id="pt_total_current_pack" name="pt_total_current_pack" value="<?= (!empty($pt_total_current_pack)) ? absint($pt_total_current_pack) : absint($pt_total_old_pack); ?>">

                    </div>


    <?php
        if ( ! is_array( $adl_table_data ) ) {
        // initialize an array if the data is empty
            $adl_table_data = [
                [], // added an item so that foreach loop below can print at least one package on the load
            ];
        }

        $packID = 1;
        foreach($adl_table_data as $i => $package ){
        // prepare all variable
        $pt_package_title = (!empty($package['pt_package_title'])) ? trim(esc_attr($package['pt_package_title'])) : '' ;
        $pt_package_price = (!empty($package['pt_package_price'])) ? absint($package['pt_package_price']) : '' ;
        $pt_package_currency = (!empty($package['pt_package_currency'])) ? esc_attr($package['pt_package_currency']) : '$' ;
        $pt_package_features = (!empty($package['pt_package_features'])) ? trim(wp_kses($package['pt_package_features'], $allowed_html)) : '' ;
        $pt_package_time = (!empty($package['pt_package_time'])) ? trim(esc_attr($package['pt_package_time'])) : '' ;
        $pt_package_btn_text = (!empty($package['pt_package_btn_text'])) ? trim(esc_html($package['pt_package_btn_text'])) : '' ;
        $pt_package_btn_url = (!empty($package['pt_package_btn_url'])) ? esc_url(trim($package['pt_package_btn_url'])) : '' ;

    ?>
                        <div class="pricing-table-wrap">
                            <h3 class="pt-heading"><?php printf( esc_html__( 'Column %d ', PT_TEXTDOMAIN ), $packID ); ?> <button class="pt-btn remove-package button" title="Remove this package?"><span class="dashicons dashicons-no"></span></button></h3>

                            <div class="pricing-table-body">

                                <!--Package Title -->
                                <div class="cmb-row cmb-type-text-medium">
                                    <div class="cmb-th">
                                        <label class="pt-label" for="<?php echo "pt_package_title{$i}"; ?>"><?php _e('Title', PT_TEXTDOMAIN); ?></label>
                                    </div>

                                    <div class="cmb-td">
                                        <input type="text" id="<?php echo "pt_package_title{$i}"; ?>" class="cmb2-text-medium" name="<?php echo "adl_pt_data_group[$i][pt_package_title]"; ?>"  placeholder="eg. Basic" value="<?php echo $pt_package_title; ?>">
                                    </div>
                                </div>


                                <!--Package Price -->
                                <div class="cmb-row cmb-type-text-medium">
                                    <div class="cmb-th">
                                        <label class="pt-label" for="<?= "pt_package_price{$i}"; ?>"><?php _e('Price', PT_TEXTDOMAIN); ?></label>
                                    </div>

                                    <div class="cmb-td">

                                        <input type="text" class="cmb2-text-small ps" name="<?= "adl_pt_data_group[$i][pt_package_currency]"; ?>" id="<?= "pt_package_currency{$i}"; ?>" placeholder="eg. $" value="<?= $pt_package_currency; ?>">

                                        <input type="text" class="cmb2-text-small pa" name="<?= "adl_pt_data_group[$i][pt_package_price]"; ?>" id="<?= "pt_package_price{$i}"; ?>" placeholder="eg. 10" value="<?= $pt_package_price; ?>">


                                    </div> <!--   ends class="cmb-td"-->

                                </div>



                                <!--Package features -->
                                <div class="cmb-row cmb-type-text-medium">
                                    <div class="cmb-th">
                                        <label class="pt-label" for="<?= "pt_package_features{$i}"; ?>"><?php _e('Features', PT_TEXTDOMAIN); ?></label><a href="#" class="adl-tooltip ft" data-tooltip='List all the features of this package separated by a "comma". You can additionally use a "carriage return/enter" after "comma" for readability. DO NOT USE a comma at the end of the last feature.'><span></span></a>
                                    </div>

                                    <div class="cmb-td">
                                        <textarea class="pt_package_features" id="<?= "pt_package_features{$i}"; ?>" placeholder="<?= "eg. 10 GB Storage, \n 4 Databases, \n 5 Emails Account, \n 50 GB Bandwidth, \n Enhanced Security";  ?>" name="<?= "adl_pt_data_group[$i][pt_package_features]"; ?>"><?= $pt_package_features; ?></textarea>
                                    </div>
                                </div>




                                <!--Package Duration / Time-->
                                <div class="cmb-row pt_package_time">
                                    <div class="cmb-th">
                                        <label class="pt-label" for="<?= "pt_package_time{$i}"; ?>"><?php _e('Pricing Plan', PT_TEXTDOMAIN); ?></label>
                                    </div>

                                    <div class="cmb-td">
                                        <input type="text" id="<?php echo "pt_package_time{$i}"; ?>" class="cmb2-text-medium" name="<?php echo "adl_pt_data_group[$i][pt_package_time]"; ?>"  placeholder="eg. per month" value="<?php echo $pt_package_time; ?>">
                                    </div>
                            </div>




                                <!--Subscribe Button Text -->
                                <div class="cmb-row cmb-type-text-medium btn">
                                    <div class="cmb-th">
                                        <label class="pt-label" for="<?= "pt_package_btn_text{$i}"; ?>"><?php _e('Button Text', PT_TEXTDOMAIN); ?></label>
                                    </div>

                                    <div class="cmb-td">
                                        <input type="text" class="cmb2-text-medium" name="<?= "adl_pt_data_group[$i][pt_package_btn_text]"; ?>" id="<?= "pt_package_btn_text{$i}"; ?>" placeholder="eg. Sign Up" value="<?= $pt_package_btn_text; ?>">
                                    </div>
                                </div>



                                <!--Subscribe Button URL -->
                                <div class="cmb-row cmb-type-text-medium btn">
                                    <div class="cmb-th">
                                        <label class="pt-label" for="<?= "pt_package_btn_url{$i}"; ?>"><?php _e('Button Link', PT_TEXTDOMAIN); ?></label>
                                    </div>


                                    <div class="cmb-td">
                                        <input type="text" class="cmb2-text-medium" name="<?= "adl_pt_data_group[$i][pt_package_btn_url]"; ?>" id="<?= "pt_package_btn_url{$i}"; ?>" placeholder="eg. http://example.com/signup" value="<?= $pt_package_btn_url; ?>">
                                    </div>
                                </div>
                            </div> <!-- end pricing-table-body -->



                        </div>


                    <?php $packID++; } ?>

                </div> <!-- end cmb2-metabox -->
            </div> <!-- end cmb2-wrap -->
        </div> <!-- end pt-tab-1 -->

        <!-- TABS 2 STYLE SETTINGS-->


        <!-- TABS 2 STYLE SETTINGS-->


        <div id="pt-tab-2" class="pt-tab-content">
            <div class="cmb2-wrap form-table" id="aptAccordion">
                <h2>Customize Themes</h2>
                <div class="accordion-item">
                    <div id="cmb2-metabox" class="cmb2-metabox cmb-field-list">

                        <div class="cmb-row adl_price_package">
                            <div class="cmb-th">
                                <label for="pt_package_theme""><?php _e('Select a Theme for Table', PT_TEXTDOMAIN); ?></label>
                            </div>
                            <?php

                            $pt_package_theme = (!empty($pt_package_theme)) ? $pt_package_theme : '' ;
                            ?>
                            <div class="cmb-td">
                                <select class="pt-nice-select" id='pt_package_theme' name="pt_package_theme">
                                    <?php
                                    $values = [
                                        'style4'  => __('Bordered', PT_TEXTDOMAIN),
                                        'style5'  => __('Clean', PT_TEXTDOMAIN),
                                        'style6'  => __('Rounded', PT_TEXTDOMAIN),
                                    ];
                                    foreach ( $values as $key => $val  ) {
                                        echo '<option value="' . esc_attr($key) . '"';

                                        selected($pt_package_theme, $key);

                                        echo '>' . esc_attr($val) . '</option>';
                                    }

                                    ?>
                                </select>

                                <div class="pt-upgrade">
                                    <p><a target="_blank" href="https://adlplugins.com/plugin/adl-pricing-table-pro" class="button" title="You can upgrade to Pro version for 3 more beautiful themes">Need more themes?</a></p>
                                </div>
                                <!--ends pt-upgrade-notice-->
                            </div>
                        </div>


                    </div> <!-- end cmb2-metabox -->



                    <!--Theme Bordered Setting-->
                    <div class="cmb2-metabox cmb-field-list" id="style4">

                        <!--Package header BG color-->
                        <div class="cmb-row cmb-type-colorpicker">
                            <div class="cmb-th">
                                <label for="pt_style4_hcolor"><?php _e('Header Background', PT_TEXTDOMAIN); ?></label>
                            </div>
                            <div class="cmb-td">
                                <input  type="text" class="cmb2-text-small" name="pt_style4_[hcolor]" id="pt_style4_hcolor" value="<?= (!empty($pt_style4_['hcolor'])) ? $pt_style4_['hcolor'] : "#f3f8fb"; ?>">
                            </div>

                        </div>

                        <!--     Text Color -->
                        <div class="cmb-row cmb-type-colorpicker">
                            <div class="cmb-th">
                                <label for="pt_style4_txt_color"><?php _e('Text Color', PT_TEXTDOMAIN); ?></label>
                            </div>
                            <div class="cmb-td">
                                <input  type="text" class="cmb2-text-small" name="pt_style4_[txt_color]" id="pt_style4_txt_color" value="<?= (!empty($pt_style4_['txt_color'])) ? $pt_style4_['txt_color'] : "#676767"; ?>">
                            </div>
                        </div>

                        <!--action button color-->
                        <div class="cmb-row cmb-type-colorpicker">
                            <div class="cmb-th">
                                <label for="pt_style4_btn_color"><?php _e('Button Background', PT_TEXTDOMAIN); ?></label>
                            </div>
                            <div class="cmb-td">
                                <input  type="text" class="cmb2-text-small" name="pt_style4_[btn_color]" id="pt_style4_btn_color" value="<?= (!empty($pt_style4_['btn_color'])) ? $pt_style4_['btn_color'] : "#000"; ?>">
                            </div>
                        </div>

                        <!--action button hover color-->
                        <div class="cmb-row cmb-type-colorpicker">
                            <div class="cmb-th">
                                <label for="pt_style4_btn_hc"><?php _e('Button Hover', PT_TEXTDOMAIN); ?></label>
                            </div>
                            <div class="cmb-td">
                                <input  type="text" class="cmb2-text-small" name="pt_style4_[btn_hc]" id="pt_style4_btn_hc" value="<?= (!empty($pt_style4_['btn_hc'])) ? $pt_style4_['btn_hc'] : "#31aae2"; ?>">
                            </div>
                        </div>

                        <!--action button text color-->
                        <div class="cmb-row cmb-type-colorpicker">
                            <div class="cmb-th">
                                <label for="pt_style4_btntxt_color"><?php _e('Button Text Color', PT_TEXTDOMAIN); ?></label>
                            </div>
                            <div class="cmb-td">
                                <input  type="text" class="cmb2-text-small" name="pt_style4_[btntxt_color]" id="pt_style4_btntxt_color" value="<?= (!empty($pt_style4_['btntxt_color'])) ? $pt_style4_['btntxt_color'] : "#fff"; ?>">
                            </div>
                        </div>

                        <!--Package FOOTER BG color-->
                        <div class="cmb-row cmb-type-colorpicker">
                            <div class="cmb-th">
                                <label for="pt_style4_divider"><?php _e('Divider Color', PT_TEXTDOMAIN); ?></label>
                            </div>
                            <div class="cmb-td">
                                <input  type="text" class="cmb2-text-small" name="pt_style4_[divider]" id="pt_style4_divider" value="<?= (!empty($pt_style4_['divider'])) ? $pt_style4_['divider'] : "#d0cccc"; ?>">
                            </div>

                        </div>


                    </div> <!-- ends Theme Bordered Setting-->


                    <!--Theme Clean Setting-->
                    <div class="cmb2-metabox cmb-field-list" id="style5">

                        <!--Package header BG color-->
                        <div class="cmb-row cmb-type-colorpicker">
                            <div class="cmb-th">
                                <label for="pt_style5_hcolor"><?php _e('Background Color', PT_TEXTDOMAIN); ?></label>
                            </div>
                            <div class="cmb-td">
                                <input  type="text" class="cmb2-text-small" name="pt_style5_[hcolor]" id="pt_style5_hcolor" value="<?= (!empty($pt_style5_['hcolor'])) ? $pt_style5_['hcolor'] : "#fff"; ?>">
                            </div>

                        </div>

                        <!--     Text Color -->
                        <div class="cmb-row cmb-type-colorpicker">
                            <div class="cmb-th">
                                <label for="pt_style5_txt_color"><?php _e('Text Color', PT_TEXTDOMAIN); ?></label>
                            </div>
                            <div class="cmb-td">
                                <input  type="text" class="cmb2-text-small" name="pt_style5_[txt_color]" id="pt_style5_txt_color" value="<?= (!empty($pt_style5_['txt_color'])) ? $pt_style5_['txt_color'] : "#969696"; ?>">
                            </div>
                        </div>


                        <!--     Border Color -->
                        <div class="cmb-row cmb-type-colorpicker">
                            <div class="cmb-th">
                                <label for="pt_style5_border"><?php _e('Border Color', PT_TEXTDOMAIN); ?></label>
                            </div>
                            <div class="cmb-td">
                                <input  type="text" class="cmb2-text-small" name="pt_style5_[border]" id="pt_style5_border" value="<?= (!empty($pt_style5_['border'])) ? $pt_style5_['border'] : "#ebebeb"; ?>">
                            </div>
                        </div>


                    </div> <!-- ends Theme Clean Setting-->


                    <!--Theme Rounded Setting-->
                    <div class="cmb2-metabox cmb-field-list" id="style6">

                        <!--Package header BG color-->
                        <div class="cmb-row cmb-type-colorpicker">
                            <div class="cmb-th">
                                <label for="pt_style6_hcolor"><?php _e('Header Background Color', PT_TEXTDOMAIN); ?></label>
                            </div>
                            <div class="cmb-td">
                                <input  type="text" class="cmb2-text-small" name="pt_style6_[hcolor]" id="pt_style6_hcolor" value="<?= (!empty($pt_style6_['hcolor'])) ? $pt_style6_['hcolor'] : "#529366"; ?>">
                            </div>
                        </div>
                        <!--Package BG color-->
                        <div class="cmb-row cmb-type-colorpicker">
                            <div class="cmb-th">
                                <label for="pt_style6_bg"><?php _e('Text Background Color', PT_TEXTDOMAIN); ?></label>
                            </div>
                            <div class="cmb-td">
                                <input  type="text" class="cmb2-text-small" name="pt_style6_[bg]" id="pt_style6_bg" value="<?= (!empty($pt_style6_['bg'])) ? $pt_style6_['bg'] : "#fff"; ?>">
                            </div>
                        </div>

                        <!--     Text Color -->
                        <div class="cmb-row cmb-type-colorpicker">
                            <div class="cmb-th">
                                <label for="pt_style6_txt_color"><?php _e('Text Color', PT_TEXTDOMAIN); ?></label>
                            </div>
                            <div class="cmb-td">
                                <input  type="text" class="cmb2-text-small" name="pt_style6_[txt_color]" id="pt_style6_txt_color" value="<?= (!empty($pt_style6_['txt_color'])) ? $pt_style6_['txt_color'] : "#969696"; ?>">
                            </div>
                        </div>
                        <!--     Hover Color -->
                        <div class="cmb-row cmb-type-colorpicker">
                            <div class="cmb-th">
                                <label for="pt_style6_hc"><?php _e('Package Hover Color', PT_TEXTDOMAIN); ?></label>
                            </div>
                            <div class="cmb-td">
                                <input  type="text" class="cmb2-text-small" name="pt_style6_[hc]" id="pt_style6_hc" value="<?= (!empty($pt_style6_['hc'])) ? $pt_style6_['hc'] : "#ff5e6b"; ?>">
                            </div>
                        </div>


                        <!--     Border Color -->
                        <div class="cmb-row cmb-type-colorpicker">
                            <div class="cmb-th">
                                <label for="pt_style6_border"><?php _e('Border Color', PT_TEXTDOMAIN); ?></label>
                            </div>
                            <div class="cmb-td">
                                <input  type="text" class="cmb2-text-small" name="pt_style6_[border]" id="pt_style6_border" value="<?= (!empty($pt_style6_['border'])) ? $pt_style6_['border'] : "#dcdcdc"; ?>">
                            </div>
                        </div>

                        <!--     Shadow Color -->
                        <div class="cmb-row cmb-type-colorpicker">
                            <div class="cmb-th">
                                <label for="pt_style6_shadow"><?php _e('Shadow of Price Circle', PT_TEXTDOMAIN); ?></label>
                            </div>
                            <div class="cmb-td">
                                <input  type="text" class="cmb2-text-small" name="pt_style6_[shadow]" id="pt_style6_shadow" value="<?= (!empty($pt_style6_['shadow'])) ? $pt_style6_['shadow'] : "#aaa"; ?>">
                            </div>
                        </div>


                    </div> <!-- ends Theme Rounded Setting-->
                </div><!--ends accordion-item-->

                <h2>Customize Fonts Style</h2>
                <div class="accordion-item">





                    <div class="cmb2-metabox cmb-field-list">
                        <!--Header Font Size-->
                        <div class="cmb-row cmb-type-text-medium">
                            <div class="cmb-th">
                                <label class="pt-label" for="headerFS"><?php _e('Title Text Size', PT_TEXTDOMAIN); ?></label>
                            </div>

                            <div class="cmb-td">
                                <div id="headerSlider" class="fontSlider"></div>
                                <div class="pixel"> <input type="text" id="headerFS" name="headerFS" class="pt-font-input" readonly  value="<?= (!empty($headerFS)) ? absint($headerFS) : 24; ?>">px</div>
                            </div>
                        </div>

                        <!--Price Text Size-->
                        <div class="cmb-row cmb-type-text-medium">
                            <div class="cmb-th">
                                <label class="pt-label" for="priceFS"><?php _e('Price Text Size', PT_TEXTDOMAIN); ?></label>
                            </div>

                            <div class="cmb-td">
                                <div id="priceSlider" class="fontSlider"></div>
                                <div class="pixel"> <input type="text" id="priceFS" name="priceFS" class="pt-font-input" readonly  value="<?= (!empty($priceFS)) ? absint($priceFS) : 54; ?>">px</div>
                            </div>
                        </div>

                        <!--Plan Text Size-->
                        <div class="cmb-row cmb-type-text-medium">
                            <div class="cmb-th">
                                <label class="pt-label" for="planFS"><?php _e('Plan Text Size', PT_TEXTDOMAIN); ?></label>
                            </div>

                            <div class="cmb-td">
                                <div id="planSlider" class="fontSlider"></div>
                                <div class="pixel"> <input type="text" id="planFS" name="planFS" class="pt-font-input" readonly  value="<?= (!empty($planFS)) ? absint($planFS) : 14; ?>">px</div>
                            </div>
                        </div>

                        <!--Feature Text Size-->
                        <div class="cmb-row cmb-type-text-medium">
                            <div class="cmb-th">
                                <label class="pt-label" for="featureFS"><?php _e('Features Text Size', PT_TEXTDOMAIN); ?></label>
                            </div>

                            <div class="cmb-td">
                                <div id="featureSlider" class="fontSlider"></div>
                                <div class="pixel"> <input type="text" id="featureFS" name="featureFS" class="pt-font-input" readonly  value="<?= (!empty($featureFS)) ? absint($featureFS) : 14; ?>">px</div>
                            </div>
                        </div>

                        <!--Button Text Size-->
                        <div class="cmb-row cmb-type-text-medium">
                            <div class="cmb-th">
                                <label class="pt-label" for="buttonFS"><?php _e('Button Text Size', PT_TEXTDOMAIN); ?></label>
                            </div>

                            <div class="cmb-td">
                                <div id="buttonSlider" class="fontSlider"></div>
                                <div class="pixel"> <input type="text" id="buttonFS" name="buttonFS" class="pt-font-input" readonly  value="<?= (!empty($buttonFS)) ? absint($buttonFS) : 14; ?>">px</div>
                            </div>
                        </div>
                    </div> <!-- ends cmb2-metabox cmb-field-list-->



                </div> <!--    ends according-item -->


            </div> <!-- end cmb2-wrap -->
        </div> <!-- end pt-tab-2 -->



    </div> <!-- end pt-tab -->
</div> <!-- end pt-tabs-container -->





<div class="pt_shortcode">
    <h2><?php _e('Shortcode', PT_TEXTDOMAIN); ?> </h2>
    <p><?php _e('Use following shortcode to display the Pricing Table  anywhere:', PT_TEXTDOMAIN); ?></p>
    <textarea cols="40" rows="1" onClick="this.select();" >[adl_pricing_table <?= 'id="'.$post->ID.'"';?>]</textarea> <br />

    <p><?php _e('If you need to put the shortcode in code/theme file, use this:', PT_TEXTDOMAIN); ?></p>
    <textarea cols="65" rows="1" onClick="this.select();" ><?php echo '<?php echo do_shortcode("[adl_pricing_table id='; echo "'".$post->ID."']"; echo '"); ?>'; ?></textarea> </p>
</div>


