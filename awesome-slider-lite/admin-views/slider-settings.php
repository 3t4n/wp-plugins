<?php
//show(json_decode(stripslashes($post->post_content)));
?>
<script src="<?php echo AW_URL; ?>js/awslideradmin.min.js" type="text/javascript"></script>
<form method="post" id="aw_slider_data_frm" onsubmit="return false;">
    <textarea name="aw_slider_data" id="aw_slider_data" style="display: none;"><?php echo ($post->post_content!='') ? stripslashes($post->post_content) : '{"aw_loadon":"1","aw_border_width":"2","aw_border_color":"","aw_slider_loop":"0","aw_slider_action":"stop","aw_redirect_url":"","aw_padding":"0","aw_margin":"0","aw_left_right_nav":"","aw_left_right_custom_class":"","aw_paging_style":"dot","aw_paging_size":"2","aw_paging_custom_class":"","aw_autoplay_timing":"2000"}'; ?></textarea>
    <input type="hidden" name="sliderid" value="<?php echo $post->ID; ?>" />
</form>
<form id="sliderfrm" onsubmit="return false;" method="post">
    <div class="slide_container">
        <h2>Manage Slider - <?php echo $post->post_title; ?></h2>
        <center>
            <h3>Select Slide</h3>
            <select id="aw_slides" style="width: 150px;">
                <option value="">Select</option>
                <?php
                $args = array(
                    'post_type' => 'awesomeslide'
                );
                $slides = new WP_Query($args);
                foreach ($slides->posts as $row) {
                    ?>
                    <option value="<?php echo $row->ID; ?>"><?php echo $row->post_title; ?></option>
                    <?php
                }
                ?>
            </select>
            <br /><br />
            <a href="javascript: void(0);" title="Click here to add selected Slide to Slider" onclick="aw_add_slide_slider();" class="button-primary"><i class="fa fa-angle-double-down"></i>Add Slide</a>
            <br /><br />
            <div id="slides_holder">
                <?php
                $sliderObj = ($post->post_content!='') ? json_decode(stripslashes($post->post_content)) : (object) array();
                $tslides = isset($sliderObj->{'aw_slides[]'}) ? $sliderObj->{'aw_slides[]'} : array();
                if(is_string($tslides)) {
                    $tslides = array($tslides);
                }
                
                $temp_arr = array();
                foreach ($slides->posts as $row) {
                    $temp_arr[$row->ID] = $row;
                }
                
                foreach ($tslides as $id) {
                    $row = $temp_arr[$id];
                    ?>
                    <div class="slider_slide">
                        <input type="hidden" name="aw_slides[]" value="<?php echo $row->ID; ?>" />
                        <div title="Remove this slide" onclick="aw_remove_slide(this);" class="aw_remove_slide fr"><i class="fa fa-times fa-4x"></i></div>
                        <div title="Edit this slide" onclick="aw_edit_slide('<?php echo $row->ID; ?>');" class="aw_edit_slide fr"><i class="fa fa-cogs fa-3x"></i></div>
                        <h2><?php echo $row->post_title; ?></h2>
                    </div>
                    <?php
                }
                ?>
            </div>
        </center>
        <br class="clr" />
        <br class="clr" />
        <div class="aw_tabs_wrap">
            <a href="javascript: void(0);" onclick="aw_save_slider();" class="button-primary fr aw_slider_save_button"><i class="fa fa-refresh"></i>Save Slider Settings</a>
            <div class="aw_slider_tabs">
                <div data-tab="aw_tab1" class="active">General Settings</div>
                <div data-tab="aw_tab2">Navigation Settings</div>
            </div>
            <div class="aw_tab_container">
                <div id="aw_tab1" class="active">
                    <div class="aw_row">
                        <div class="aw_col1">Border Width</div>
                        <div class="aw_col2"><input type="text" name="aw_border_width" value="0" class="ip_small ip" />Px</div>
                    </div>
                    <br class="clr" />
                    <div class="aw_row">
                        <div class="aw_col1">Border Color</div>
                        <div class="aw_col2"><input type="text" name="aw_border_color" id="aw_border_color" value="" class="ip_small ip" /></div>
                    </div>
                    <br class="clr" />
                    <div class="aw_row">
                        <div class="aw_col1">Slider Loop</div>
                        <div class="aw_col2"><input type="text" disabled="" value="0" class="ip_small ip" /></div>
                        <div class="aw_col3">Enter '0' to disable Loop Action</div>
                    </div>
                    <br class="clr" />
                    <div class="aw_row">
                        <div class="aw_col1">Loop Action</div>
                        <div class="aw_col2">
                            <input type="radio" checked="checked" disabled="" value="stop" /> Stop
                            <input type="radio" value="redirect" disabled="" /> Redirect
                        </div>
                    </div>
                    <br class="clr" />
                    <div class="aw_row">
                        <div class="aw_col1">Redirect URL</div>
                        <div class="aw_col2"><input type="text" disabled="" value="" class="ip" /></div>
                    </div>
                    <br class="clr" />
                    <div class="aw_row">
                        <div class="aw_col1">Slider Padding</div>
                        <div class="aw_col2"><input type="text" disabled="" value="0" class="ip ip_small" />Px</div>
                    </div>
                    <br class="clr" />
                </div>
                <div id="aw_tab2">
                    <div class="aw_row">
                        <div class="aw_col1">Left Right Navigation</div>
                        <div class="aw_col2">
                            <select name="aw_left_right_nav">
                                <option value="">None</option>
                                <option value="style1">Style1</option>
                                <option value="style2">Style2</option>
                                <option value="style3">Style3</option>
                                <option value="style4">Style4</option>
                                <option value="style5">Style5</option>
                                <option value="style6">Style6</option>
                                <option value="style7">Style7</option>
                                <option value="custom">Custom</option>
                            </select>
                        </div>
                    </div>
                    <br class="clr" />
                    <div class="aw_row">
                        <div class="aw_col1">Custom Class</div>
                        <div class="aw_col2">
                            <input type="text" disabled="" class="ip" />
                        </div>
                    </div>
                    <br class="clr" />
                    <div class="aw_row">
                        <div class="aw_col1">Show on Hover</div>
                        <div class="aw_col2">
                            <input type="checkbox" disabled="" value="1" />
                        </div>
                    </div>
                    <br class="clr" />
                    <div class="aw_row">
                        <div class="aw_col1">Hide in Mobile</div>
                        <div class="aw_col2">
                            <input type="checkbox" disabled="" value="1" />
                        </div>
                    </div>
                    <br class="clr" />
                    <div class="aw_row">
                        <div class="aw_col1">Hide in Tablet</div>
                        <div class="aw_col2">
                            <input type="checkbox" disabled="" value="1" />
                        </div>
                    </div>
                    <br class="clr" />
                    <div class="aw_row">
                        <div class="aw_col1">Hide in Desktop</div>
                        <div class="aw_col2">
                            <input type="checkbox" disabled="" value="1" />
                        </div>
                    </div>
                    <br class="clr" />
                    <div class="aw_sep"></div>
                    <div class="aw_row">
                        <div class="aw_col1">Pagination Style</div>
                        <div class="aw_col2">
                            <select name="aw_paging_style">
                                <option value="">None</option>
                                <option value="dot">Dot</option>
                                <option value="square">Square</option>
                                <option value="custom">Custom</option>
                            </select>
                        </div>
                    </div>
                    <br class="clr" />
                    <div class="aw_row">
                        <div class="aw_col1">Custom Class</div>
                        <div class="aw_col2">
                            <input type="text" disabled="" value="" class="ip" />
                        </div>
                    </div>
                    <br class="clr" />
                    <div class="aw_row">
                        <div class="aw_col1">Show on Hover</div>
                        <div class="aw_col2">
                            <input type="checkbox" disabled="" value="1" />
                        </div>
                    </div>
                    <br class="clr" />
                    <div class="aw_row">
                        <div class="aw_col1">Hide in Mobile</div>
                        <div class="aw_col2">
                            <input type="checkbox" disabled="" value="1" />
                        </div>
                    </div>
                    <br class="clr" />
                    <div class="aw_row">
                        <div class="aw_col1">Hide in Tablet</div>
                        <div class="aw_col2">
                            <input type="checkbox" disabled="" value="1" />
                        </div>
                    </div>
                    <br class="clr" />
                    <div class="aw_row">
                        <div class="aw_col1">Hide in Desktop</div>
                        <div class="aw_col2">
                            <input type="checkbox" disabled="" value="1" />
                        </div>
                    </div>
                    <br class="clr" />
                    <div class="aw_sep"></div>
                    <div class="aw_row">
                        <div class="aw_col1">Autoplay</div>
                        <div class="aw_col2">
                            <input type="checkbox" disabled="" value="1" />
                        </div>
                    </div>
                    <br class="clr" />
                    <div class="aw_row">
                        <div class="aw_col1">Autoplay Timing</div>
                        <div class="aw_col2">
                            <input type="text" disabled="" value="" class="ip ip_small" /> Milliseconds
                        </div>
                    </div>
                    <br class="clr" />
                    <div class="aw_row">
                        <div class="aw_col1">Pause on Hover</div>
                        <div class="aw_col2">
                            <input type="checkbox" disabled="" value="1" />
                        </div>
                    </div>
                    <br class="clr" />
                    <div class="aw_row">
                        <div class="aw_col1">Progress Bar</div>
                        <div class="aw_col2">
                            <input type="checkbox" disabled="" value="1" />
                        </div>
                    </div>
                    <br class="clr" />
                    <div class="aw_sep"></div>
                    <div class="aw_row">
                        <div class="aw_col1">Touch Swipe</div>
                        <div class="aw_col2">
                            <input type="checkbox" name="aw_touchswipe" value="1" />
                        </div>
                    </div>
                    <br class="clr" />
                    <div class="aw_row">
                        <div class="aw_col1">Keyboard Nav</div>
                        <div class="aw_col2">
                            <input type="checkbox" disabled="" value="1" />
                        </div>
                    </div>
                    <br class="clr" />
                </div>
            </div>
        </div>
        <br class="clr" />
        <a href="javascript: void(0);" onclick="aw_save_slider();" class="button-primary fr aw_slider_save_button"><i class="fa fa-refresh"></i>Save Slider Settings</a>
    </div>
</form>