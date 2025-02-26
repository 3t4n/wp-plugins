<?php
//show(json_decode(stripslashes($post->post_content)));
?>
<script src="<?php echo AW_URL; ?>js/awslideadmin.min.js" type="text/javascript"></script>
<form id="aw_slide_data_frm" onsubmit="return false;">
<textarea id="aw_slide_data" class="aw_hidden" name="aw_slide_data"><?php echo ($post->post_content!='') ? stripcslashes($post->post_content) : '{"background":{"bg_color":"","desktop_height":"300","tablet_height":"300","mobile_height":"300","bg_img":"","bg_img_position":"tc","desktop_appearance":"fade","tablet_appearance":"fade","mobile_appearance":"fade"},"elements":{}}'; ?></textarea>
<input type="hidden" name="slideid" value="<?php echo $post_id; ?>" />
</form>

<div id="aw_preview_div" style="display: none;">
    <div class="aw_css_editor_footer">
        <a class="button fr" onclick="jQuery('#aw_preview_div').hide();" href="javascript: void(0);">Close</a>
        <br class="clr" />
    </div>
    <br />
    <iframe id="aw_preview_frame" scrolling="no" src="" data-id="<?php echo $post_id; ?>" width="100%" height="100%" frameborder="0"></iframe> 
</div>

<div id="aw_css_editor_div" style="display: none;">
    <div class="aw_css_editor_header">
        CSS Editor
        <a class="fr" onclick="jQuery('#aw_css_editor_div').hide();" href="javascript: void(0);"><i class="fa fa-times fa-2x"></i></a>
    </div>
    <div id="aw_css_editor_area"><?php echo file_get_contents(AW_URL . 'css/awstyles.css'); ?></div>
    <div class="aw_css_editor_footer">
        <a class="button-primary marleft fr" id="aw_css_save_button" onclick="save_aw_css();" href="javascript: void(0);">Save</a>
        <a class="button fr" onclick="jQuery('#aw_css_editor_div').hide();" href="javascript: void(0);">Cancel</a>
        <br class="clr" />
    </div>
</div>

<div class="slide_container">
    <h2>Manage Slide - <?php echo $post->post_title; ?></h2>
        <div class="aw_tabs">
        <a href="admin.php?page=aweslides" title="Click here to go back to Slides listing" class="button marleft fr">&lt;&lt; Back to Slides</a>
        <a class="button marleftlong fr disabled" title="Locked in Lite version" href="javascript: void(0);">Duplicate this Slide</a>
        
        <a id="aw_copy_element_button" title="Locked in Lite version" class="button disabled marleft fr" href="javascript: void(0);">Copy Element</a>
        
        <a id="aw_delete_layer_button" title="Click here to delete selected element" class="button disabled marleft fr" href="javascript: void(0);">Delete</a>
        <a id="aw_delete_all_layer_button" title="Click here to delete all the elements" class="button fr" href="javascript: void(0);">Clear All</a>
        
        <ul class="aw_devices">
            <li data-device="desktop" class="active"><a href="javascript: void(0);" title="Width: 771px or More..."><i class="fa fa-desktop fa-2x"></i></a></li>
            <li data-device="tablet"><a href="javascript: void(0);" title="Width: 770px or Less.."><i class="fa fa-tablet fa-2x"></i></a></li>
            <li data-device="mobile"><a href="javascript: void(0);" title="Width: 400px or Less.."><i class="fa fa-mobile fa-2x"></i></a></li>
        </ul>
        </div>
        <br class="clr" />
        <div id="aw_playground">
            <div id="aw_device" class="desktop">
                
            </div>
        </div>
        <div class="aw_timeline">
            <h3 onclick="aw_show_hide_layers(this);"><span>+</span> Layers</h3>
            <div id="aw_layers" onscroll="position_layer_actions();" style="display: none;" title="Drag bottom line vertically to resize">
                <div class="layer_headings">
                    <div class="layer_timing_text" title="In Millisecond">
                    </div>
                </div>
                <ul class="aw_layers_ul" id="aw_layers_ul">
                </ul>
            </div>
        </div>
        <div class="aw_slide_menus">
            <a class="button" title="Click here to add Image Layer" onclick="select_aw_image_callback('aw_add_image_layer');" href="javascript: void(0);">Add Image</a>
            <a class="button" title="Click here to add Text Layer" href="javascript: void(0);" onclick="aw_add_text_layer();">Add Text</a>
            <a class="button" title="Click here to add Video Layer" href="javascript: void(0);" onclick="aw_add_video_layer();">Add Video</a>
            <a class="button marleft" title="Click here to edit CSS" href="javascript: void(0);" onclick="jQuery('#aw_css_editor_div').show();">CSS</a>
            <a class="button-primary marleft fr aw_slide_save_button" title="Click here to Save the changes" id="aw_slide_save_button" onclick="aw_save_slide(this);" href="javascript: void(0);"><i class="fa fa-refresh"></i>Save Slide</a>
            <a class="button fr marleft disabled" title="Locked in Lite version" href="javascript: void(0);">Import/Export</a>
            
            <a class="button fr" title="Click here to see the Preview" onclick="show_aw_preview();" href="javascript: void(0);">Preview</a>
        </div>
        <div class="aw_element_prop">
            <div id="aw_animation_prop" class="aw_eleprop  aw_hidden">
                <h3>Animation Settings</h3>
                <form method="post" id="awfrm_animation_settings" onsubmit="return false;">
                <div class="aw_row">
                    <div class="aw_col1">Time</div>
                    <div class="aw_col2">
                        <input type="text" id="aw_time" name="aw_time" class="aw_ip ip_small" />
                    </div>
                    <div class="aw_col3">
                        In milliseconds
                    </div>
                </div>
                <br class="clr" />
                <div class="aw_row">
                    <div class="aw_col1">Appearance Effect</div>
                    <div class="aw_col2">
                        <select name="aw_appearance">
                            <?php 
                            foreach($aw_element_effects as $row) {
                            ?>
                            <option value="<?php echo $row; ?>"><?php echo ucfirst($row); ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="aw_col3">
                        
                    </div>
                </div>
                <br class="clr" />
                <div class="aw_row">
                    <div class="aw_col1">Appearance Time</div>
                    <div class="aw_col2">
                        <input type="text" id="aw_appear_speed" name="aw_appear_speed" class="aw_ip ip_small" />
                    </div>
                    <div class="aw_col3">
                        In milliseconds
                    </div>
                </div>
                <br class="clr" />
                <div class="aw_row">
                    <div class="aw_col1">Appearance Easing</div>
                    <div class="aw_col2">
                        <select name="aw_appear_easing">
                            <?php 
                            foreach($aw_easings as $key=>$row) {
                            ?>
                            <option value="<?php echo ($key!='default') ? $key : ''; ?>"><?php echo ucfirst($key); ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="aw_col3">
                        
                    </div>
                </div>
                <br class="clr" />
                <br class="clr" />
                <hr />
                <br class="clr" />
                <div class="aw_row">
                    <div class="aw_col1">Disappearance Effect</div>
                    <div class="aw_col2">
                        <select name="aw_disappearance">
                            <?php 
                            foreach($aw_element_effects as $row) {
                            ?>
                            <option value="<?php echo $row; ?>"><?php echo ucfirst($row); ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="aw_col3">
                        
                    </div>
                </div>
                <br class="clr" />
                <div class="aw_row">
                    <div class="aw_col1">Disappearance Delay</div>
                    <div class="aw_col2">
                        <input type="text" id="aw_disappear_delay" name="aw_disappear_delay" class="aw_ip ip_small" />
                    </div>
                    <div class="aw_col3">
                        In milliseconds
                    </div>
                </div>
                <br class="clr" />
                <div class="aw_row">
                    Set this when the element needs to disappear after some time of appearance.
                        <br />
                    Set '0' when the element needs to disappear just before next/previous slide.
                </div>
                <br class="clr" />
                <div class="aw_row">
                    <div class="aw_col1">Disappearance Time</div>
                    <div class="aw_col2">
                        <input type="text" id="aw_disappear_speed" name="aw_disappear_speed" class="aw_ip ip_small" />
                    </div>
                    <div class="aw_col3">
                        
                    </div>
                </div>
                <br class="clr" />
                <div class="aw_row">
                    <div class="aw_col1">Disappearance Easing</div>
                    <div class="aw_col2">
                        <select name="aw_disappear_easing">
                            <?php 
                            foreach($aw_easings as $key=>$row) {
                            ?>
                            <option value="<?php echo $key; ?>"><?php echo ucfirst($key); ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="aw_col3">
                        
                    </div>
                </div>
                <br class="clr" />
                </form>
            </div>
            <div id="aw_video_prop" class="aw_eleprop aw_hidden">
                <h3>Video Properties</h3>
                <form onsubmit="return false;" id="awfrm_video_settings">
                <div class="aw_row">
                    <div class="aw_col1">CSS Class</div>
                    <div class="aw_col3">
                        <input type="text" id="aw_video_class" name="aw_class" class="aw_class aw_ip" />
                    </div>
                </div>
                <br class="clr" />
                <div class="aw_row">
                    <div class="aw_col1">Change Video ID</div>
                    <div class="aw_col3">
                        <input type="text" id="aw_video" name="aw_video" class="aw_ip ip_small" />
                    </div>
                </div>
                <br class="clr" />
                <div class="aw_row">
                    <div class="aw_col1">&nbsp;</div>
                    <div class="aw_col3">
                        Please enter Youtube<br /> or Vimeo video ID
                    </div>
                </div>
                <br class="clr" />
                <div class="aw_row">
                    <div class="aw_col1">&nbsp;</div>
                    <div class="aw_col3">
                        <input type="radio" name="aw_video_type" id="aw_video_type_youtube" checked="checked" value="youtube" /> 
                        <label for="aw_video_type_youtube">Youtube</label> 
                        &nbsp;
                        <input type="radio" name="aw_video_type" id="aw_video_type_vimeo" value="vimeo" /> 
                        <label for="aw_video_type_vimeo">Vimeo</label> 
                    </div>
                </div>
                <br class="clr" />
                <div class="aw_row">
                    <div class="aw_col1">Position X</div>
                    <div class="aw_col2">
                        <input type="text" id="aw_video_pos_x" name="aw_pos_x" class="aw_ip ip_small" />
                    </div>
                    <div class="aw_col3">
                        
                    </div>
                </div>
                <br class="clr" />
                <div class="aw_row">
                    <div class="aw_col1">Position Y</div>
                    <div class="aw_col2">
                        <input type="text" id="aw_video_pos_y" name="aw_pos_y" class="aw_ip ip_small" />
                    </div>
                    <div class="aw_col3">
                        
                    </div>
                </div>
                <br class="clr" />
                <div class="aw_row">
                    <div class="aw_col1">Width</div>
                    <div class="aw_col2">
                        <input type="text" id="aw_video_width" name="aw_width" class="aw_ip ip_small" />
                        <input type="hidden" id="aw_video_height" name="aw_height" class="aw_ip ip_small" />
                    </div>
                    <div class="aw_col3">
                        
                    </div>
                </div>
                <br class="clr" />
                <div class="aw_row">
                    <div class="aw_col1">Video Ratio</div>
                    <div class="aw_col3">
                        <input type="radio" name="aw_video_ratio" id="aw_video_ratio_43" checked="checked" value="4:3" /> 
                        <label for="aw_video_ratio_43">4:3</label> 
                        &nbsp;
                        <input type="radio" name="aw_video_ratio" id="aw_video_ratio_169" value="16:9" /> 
                        <label for="aw_video_ratio_169">16:9</label> 
                    </div>
                </div>
                <br class="clr" />
                <div class="aw_row">
                    <div class="aw_col1">Autoplay</div>
                    <div class="aw_col3">
                        <input type="radio" id="aw_video_autoplay_on" name="aw_video_autoplay" value="1" /> <label for="aw_video_autoplay_on">On</label> 
                        &nbsp;
                        <input type="radio" id="aw_video_autoplay_off" name="aw_video_autoplay" value="0" /> <label for="aw_video_autoplay_off">Off</label>
                    </div>
                </div>
                <br class="clr" />
                </form>
            </div>
            <div id="aw_text_prop" class="aw_eleprop aw_hidden">
                <h3>Text Properties</h3>
                <form onsubmit="return false;" id="awfrm_text_settings">
                <div class="aw_row">
                    <div class="aw_col1">CSS Class</div>
                    <div class="aw_col3">
                        <input type="text" id="aw_text_class" name="aw_class" class="aw_class aw_ip" />
                    </div>
                </div>
                <br class="clr" />
                <div class="aw_row">
                    <div class="aw_col1">Change Text</div>
                    <div class="aw_col3">
                        <input type="text" id="aw_text" name="aw_text" class="aw_ip" />
                    </div>
                </div>
                <br class="clr" />
                <div class="aw_row">
                    <div class="aw_col1">Text Color</div>
                    <div class="aw_col3 colpicker100">
                        <input type="text" id="aw_text_color" name="aw_text_color" value="#ffcc00" class="aw_ip" />
                    </div>
                </div>
                <br class="clr" />
                <br class="clr" />
                <div class="aw_row">
                    <div class="aw_col1">Background Color</div>
                    <div class="aw_col3 colpicker99">
                        <input type="text" id="aw_text_bg_color" name="aw_text_bg_color" value="" class="aw_ip" />
                    </div>
                </div>
                <br class="clr" />
                <br class="clr" />
                <div class="aw_row">
                    <div class="aw_col1">Padding</div>
                    <div class="aw_col3">
                        <input type="text" name="aw_text_padding" value="" class="aw_ip" />
                        <br />
                        eg. 0px, <br />5px, <br />2px 4px 2px 4px
                    </div>
                </div>
                <br class="clr" />
                <div class="aw_row">
                    <div class="aw_col1">Position X</div>
                    <div class="aw_col3">
                        <input type="text" id="aw_text_pos_x" name="aw_pos_x" class="aw_ip ip_small" />
                    </div>
                </div>
                <br class="clr" />
                <div class="aw_row">
                    <div class="aw_col1">Position Y</div>
                    <div class="aw_col3">
                        <input type="text" id="aw_text_pos_y" name="aw_pos_y" class="aw_ip ip_small" />
                    </div>
                </div>
                <br class="clr" />
                <div class="aw_row">
                    <div class="aw_col1">Width</div>
                    <div class="aw_col3">
                        <input type="text" id="aw_text_width" name="aw_width" class="aw_ip ip_small" />
                        <input type="hidden" id="aw_text_height" name="aw_height" class="aw_ip ip_small" />
                        <br />
                        Text width may not be exact, <br />
                        it will always calculate <br />
                        the nearest width related to <br />font size
                    </div>
                </div>
                <br class="clr" />
                <div class="aw_row">
                    <b>Note: </b>
                    Do not forget to prepend http:// when click action is link
                    <br />
                    Enter predefine / custom function when aclick action is function
                    <br /><br />
                    <b>Predefine Functions: </b>
                    <br /><br />
                    <span class="aw_func">this.prevSlide()</span> | <span class="aw_func">this.nextSlide()</span> | 
                    <span class="aw_func">this.gotoSlide(2)</span>
                </div>
                <br class="clr" />
                <div class="aw_row">
                    <div class="aw_col1">Click Action</div>
                    <div class="aw_col3">
                        <input type="radio" value="link" checked="checked" id="aw_link_action_link1" name="aw_link_action"> 
                        <label for="aw_link_action_link1">Link</label> 
                        &nbsp;
                        <input type="radio" value="function" id="aw_link_action_func1" name="aw_link_action"> 
                        <label for="aw_link_action_func1">Function</label> 
                    </div>
                </div>
                <br class="clr" />
                <div class="aw_row">
                    <div class="aw_col1">Link / Function</div>
                    <div class="aw_col3">
                        <input type="text" id="aw_img_link" name="aw_link" />
                        <br />
                        <select name="aw_link_target">
                            <option value="_self">Same Window</option>
                            <option value="_blank">New Window</option>
                        </select>
                    </div>
                </div>
                <br class="clr" />
                </form>
            </div>
            <div id="aw_image_prop" class="aw_eleprop  aw_hidden">
                <h3>Image Properties</h3>
                <form onsubmit="return false;" id="awfrm_img_settings">
                <div class="aw_row">
                    <div class="aw_col1">CSS Class</div>
                    <div class="aw_col3">
                        <input type="text" id="aw_img_class" name="aw_class" class="aw_class aw_ip" />
                    </div>
                </div>
                <br class="clr" />
                <div class="aw_row">
                    <div class="aw_col1">Change Image</div>
                    <div class="aw_col3">
                        <input type="hidden" name="aw_img_src" value="" />
                        <input type="button" onclick="select_aw_image_callback('aw_image_changed');" class="button" value="Select Image" />
                    </div>
                </div>
                <br class="clr" />
                <div class="aw_row">
                    <div class="aw_col1">Position X</div>
                    <div class="aw_col3">
                        <input type="text" id="aw_img_pos_x" name="aw_pos_x" class="aw_ip ip_small" />
                    </div>
                </div>
                <br class="clr" />
                <div class="aw_row">
                    <div class="aw_col1">Position Y</div>
                    <div class="aw_col3">
                        <input type="text" id="aw_img_pos_y" name="aw_pos_y" class="aw_ip ip_small" />
                    </div>
                </div>
                <br class="clr" />
                <div class="aw_row">
                    <div class="aw_col1">Width</div>
                    <div class="aw_col3">
                        <input type="text" id="aw_img_width" name="aw_width" class="aw_ip ip_small" />
                        <input type="hidden" id="aw_img_height" name="aw_height" class="aw_ip ip_small" />
                        <a class="button" onclick="aw_reset_image();" href="javascript: void(0);">Reset</a>
                        <br />
                        Reset to actual dimension
                    </div>
                </div>
                <br class="clr" />
                <div class="aw_row">
                    <b>Note: </b>
                    Do not forget to prepend http:// when click action is link
                    <br />
                    Enter predefine / custom function when aclick action is function
                    <br /><br />
                    <b>Predefine Functions: </b>
                    <br /><br />
                    <span class="aw_func">prevSlide()</span> | <span class="aw_func">nextSlide()</span> | 
                    <span class="aw_func">gotoSlide(2)</span>
                </div>
                <br class="clr" />
                <div class="aw_row">
                    <div class="aw_col1">Click Action</div>
                    <div class="aw_col3">
                        <input type="radio" value="link" checked="checked" id="aw_link_action_link" name="aw_link_action"> 
                        <label for="aw_link_action_link">Link</label> 
                        &nbsp;
                        <input type="radio" value="function" id="aw_link_action_func" name="aw_link_action"> 
                        <label for="aw_link_action_func">Function</label> 
                    </div>
                </div>
                <br class="clr" />
                <div class="aw_row">
                    <div class="aw_col1">Link / Function</div>
                    <div class="aw_col3">
                        <input type="text" id="aw_img_link" name="aw_link" />
                        <br />
                        <select name="aw_link_target">
                            <option value="_self">Same Window</option>
                            <option value="_blank">New Window</option>
                        </select>
                    </div>
                </div>
                <br class="clr" />
                </form>
            </div>
            <div id="aw_stage_prop" class="aw_eleprop">
                <h3>Background Settings</h3>
                <form onsubmit="return false;" id="awfrm_bg_settings">
                <div class="aw_row">
                    <div class="aw_col1">BG Color</div>
                    <div class="aw_col2">
                        <input type="text" name="bg_color" id="aw_bg_color" />
                    </div>
                    <div class="aw_col3">
                        
                    </div>
                </div>
                <br class="clr" />
                <br class="clr" />
                <div class="aw_row">
                    <div class="aw_col1">Desktop Height</div>
                    <div class="aw_col2">
                        <input type="text" id="aw_desktop_height" name="desktop_height" value="300" class="aw_ip ip_small" /> px
                    </div>
                    <div class="aw_col3">
                        Please enter desktop height
                    </div>
                </div>
                <br class="clr" />
                <div class="aw_row">
                    <div class="aw_col1">Tablet Height</div>
                    <div class="aw_col2">
                        <input type="text" id="aw_tablet_height" name="tablet_height" value="300" class="aw_ip ip_small" /> px
                    </div>
                    <div class="aw_col3">
                        <input type="checkbox" name="disable_tablet_layout" id="aw_disable_tablet" value="1" /> 
                        <label for="aw_disable_tablet">Disable Tablet Layout</label>
                    </div>
                </div>
                <br class="clr" />
                <div class="aw_row">
                    <div class="aw_col1">Mobile Height</div>
                    <div class="aw_col2">
                        <input type="text" id="aw_mobile_height" value="300" name="mobile_height" class="aw_ip ip_small" /> px
                    </div>
                    <div class="aw_col3">
                        <input type="checkbox" name="disable_mobile_layout" id="aw_disable_mobile" value="1" /> 
                        <label for="aw_disable_mobile">Disable Mobile Layout</label>
                    </div>
                </div>
                <br class="clr" />
                <div class="aw_row">
                    <div class="aw_col1">BG Image</div>
                    <div class="aw_col3">
                        <input type="hidden" name="bg_img" id="aw_bg_img" value="" />
                        <a href="javascript: void(0);" onclick="select_aw_image_callback('aw_bgimg_selected');" class="button">Select Image</a>
                        <a href="javascript: void(0);" onclick="remove_aw_bg_image();" id="aw_bg_remove_but" class="button aw_hidden">Remove</a>
                    </div>
                </div>
                <br class="clr" />
                <div class="aw_row">
                    <div class="aw_col1">BG Image Position</div>
                    <div class="aw_col3">
                        <div class="aw_bgpos_setting">
                            <input type="radio" id="aw_bp_tl" checked="checked" name="bg_img_position" value="tl" /> 
                            <label for="aw_bp_tl">Top-Left</label>
                        </div>
                        <div class="aw_bgpos_setting">
                        <input type="radio" id="aw_bp_tc" name="bg_img_position" value="tc" /> 
                        <label for="aw_bp_tc">Top-Center</label>
                        </div>
                        <div class="aw_bgpos_setting">
                            <input type="radio" id="aw_bp_tr" name="bg_img_position" value="tr" /> 
                            <label for="aw_bp_tr">Top-Right </label>
                        </div>
                        <br class="clr" />
                        <div class="aw_bgpos_setting">
                        <input type="radio" id="aw_bp_ml" name="bg_img_position" value="ml" /> 
                        <label for="aw_bp_ml">Middle-Left</label>
                        </div>
                        <div class="aw_bgpos_setting">
                            <input type="radio" id="aw_bp_mc" name="bg_img_position" value="mc" /> 
                            <label for="aw_bp_mc">Middle-Center</label>
                        </div>
                        <div class="aw_bgpos_setting">
                        <input type="radio" id="aw_bp_mr" name="bg_img_position" value="mr" /> 
                        <label for="aw_bp_mr">Middle-Right </label>
                        </div>
                        <br class="clr" />
                        <div class="aw_bgpos_setting">
                            <input type="radio" id="aw_bp_bl" name="bg_img_position" value="bl" /> 
                        <label for="aw_bp_bl">Bottom-Left</label>
                        </div>
                        <div class="aw_bgpos_setting">
                            <input type="radio" id="aw_bp_bc" name="bg_img_position" value="bc" /> 
                        <label for="aw_bp_bc">Bottom-Center</label>
                        </div>
                        <div class="aw_bgpos_setting">
                            <input type="radio" id="aw_bp_br" name="bg_img_position" value="br" /> 
                        <label for="aw_bp_br">Bottom-Right </label>
                        </div>
                    </div>
                </div>
                <br class="clr" />
                <div class="aw_row">
                    <div class="aw_col1"><label for="aw_bg_parallax">Parallax Effect</label></div>
                    <div class="aw_col2">
                        <input type="checkbox" id="aw_bg_parallax" name="aw_bg_parallax" value="1" />
                    </div>
                    <div class="aw_col3">
                        
                    </div>
                </div>
                <br class="clr" />
                <div class="aw_row">
                    <div class="aw_col1">Desktop Appearance Effect</div>
                    <div class="aw_col2">
                        <select name="desktop_appearance">
                            <?php 
                            foreach($aw_bg_transactions as $i=>$row) {
                            ?>
                            <option<?php echo ($i==0) ? ' selected="selected"' : ''; ?> value="<?php echo $row; ?>"><?php echo ucfirst($row); ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="aw_col3">
                        
                    </div>
                </div>
                <br class="clr" />
                <div class="aw_row">
                    <div class="aw_col1">Tablet Appearance Effect</div>
                    <div class="aw_col2">
                        <select name="tablet_appearance">
                            <?php 
                            foreach($aw_bg_transactions as $i=>$row) {
                            ?>
                            <option<?php echo ($i==0) ? ' selected="selected"' : ''; ?> value="<?php echo $row; ?>"><?php echo ucfirst($row); ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="aw_col3">
                        
                    </div>
                </div>
                <br class="clr" />
                <div class="aw_row">
                    <div class="aw_col1">Mobile Appearance Effect</div>
                    <div class="aw_col2">
                        <select name="mobile_appearance">
                            <?php 
                            foreach($aw_bg_transactions as $i=>$row) {
                            ?>
                            <option<?php echo ($i==0) ? ' selected="selected"' : ''; ?> value="<?php echo $row; ?>"><?php echo ucfirst($row); ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="aw_col3">
                        
                    </div>
                </div>
                <br class="clr" />
                </form>
            </div>
        </div>
        <div class="aw_slide_menus">
        <a class="button-primary marleft fr aw_slide_save_button" title="Click here to Save the changes" id="aw_slide_save_button" onclick="aw_save_slide(this);" href="javascript: void(0);"><i class="fa fa-refresh"></i>Save Slide</a>
        </div>
</div>