<?php
require_once('eplm_p_init.php');
$opj = new eplm_options_control();
if (isset($_GET['id']) && intval($_GET['id']) != null) {
    $arr = $opj->eplm_read_popup(intval($_GET['id']));
    $arr = $arr->pop_options;
    //  $arr = base64_decode($arr);
    $arr = unserialize($arr);
    extract($arr);
}
$geturlval = 0;
if (!isset($_GET['id'])) {
    $geturlval = 1;
    $defultbgcolorvalue = '#ffffff';
    $pop_status = 1;
    echo "<script>
   jQuery('#1').prop('checked', true);
</script>";
}
?>
<input type="hidden" name="pop_id" id="pop_id" value="<?php echo $pop_id; ?>" />
<input type="hidden" name="temp_id" id="temp_id" value="<?php echo $template_id; ?>" />
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <!-- ////////////////start Dimension options//////////////////////////////////////-->
    <div id="flipDimension" style="cursor: pointer; background-color: #D33D3C;" class="panel-heading flip eplm_collabce"><a> <?php
                                                                                                                                echo '<img src="' . plugins_url('pages/icons/if_98_111048.png', dirname(__FILE__)) . '" > ';
                                                                                                                                ?>
        </a> Popup Settings
    </div>


    <div id="panelDimension" class="panel panel-default panel eplm-panel-body">
        <div class="panel-body eplm_inner_panel_body">
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field">
                <div class="panel-body eplm_inner_panel_body">
                    <br />
                    <div class="row">
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6  wpoc-field ">

                            <label class="eplm_form_main_title">Popup Status</label>
                        </div>
                        <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                            <label class="switch">
                                <input name="pop_status" id="pop_status" <?php if (isset($pop_status)) {
                                                                                checked('1', $pop_status);
                                                                            } ?> value="1" type="checkbox">
                                <span class="slider round"></span>
                            </label>
                        </div>

                    </div>
                </div>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12 wpoc-field">
                <span class="littleNote">Popup Type</span>
                <select style="  width: 100%;" id="popup-theam-type" name="options[popup_theam_type]" class="input-width-static">
                    <option id="ligh_box" <?php if (isset($popup_theam_type) && $popup_theam_type == 'Light') echo 'selected="selected"' ?> value="Light" selected="">Light Box Theme
                    </option>
                    <option id="Slide_box" <?php if (isset($popup_theam_type) && $popup_theam_type == 'Slide') echo 'selected="selected"' ?> value="Slide">Slide Box Theme
                    </option>
                </select>
            </div>

            <!-- ////////////////start box type options//////////////////////-->
            <div class="panel-body eplm_inner_panel_body" id="slide_options">
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field">
                    <div class="panel-body eplm_inner_panel_body">
                        <div class="row">

                            <input type="radio" id="slideoptradio" style="margin-left: -3px;margin-right: -20px;" class="eplm-radio-slide" value="Top_bottom" <?php if (isset($slideoptradio) && $slideoptradio == 'Top_bottom') echo 'checked' ?> name="options[slideoptradio]">
                            <label class="radio-inline" for="slideoptradio">Top bottom slide</label>
                            <input type="radio" id="slideoptradio_Slide_box" class="eplm-radio-slide ml-5" style="margin: 5px -20px 5px 50px;" value="Slide_box" <?php if (isset($slideoptradio) && $slideoptradio == 'Slide_box') echo 'checked' ?> name="options[slideoptradio]">
                            <label class="radio-inline" for="slideoptradio_Slide_box">
                                Bottom Up Slide
                            </label>
                            <br />
                            <input type="radio" id="slideoptradio_Left_Right" style="margin-left: -3px;margin-right: -20px;" class="eplm-radio-slide" value="Left_Right" <?php if (isset($slideoptradio) && $slideoptradio == 'Left_Right') echo 'checked' ?> name="options[slideoptradio]">
                            <label class="radio-inline" for="slideoptradio_Left_Right">
                                Left Right Slide
                            </label>
                            <input type="radio" id="slideoptradio_Right_Left" class="eplm-radio-slide ml-5" style="margin: 5px -20px 5px 57px;" value="Right_Left" <?php if (isset($slideoptradio) && $slideoptradio == 'Right_Left') echo 'checked' ?> name="options[slideoptradio]">
                            <label class="radio-inline" for="slideoptradio_Right_Left">
                                Right Left Slide
                            </label>

                        </div>

                    </div>
                </div>
            </div>
            <!-- ////////////////end box type    options////////////////////////-->
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field">
                <div class="panel-body eplm_inner_panel_body">
                    <div class="row">
                        <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <label class="littleNote"><input class="eplm-radio " type="radio" <?php if (isset($dimension) && $dimension == 'responsive') echo 'checked' ?> checked name="options[dimension]" id="responsive" value="responsive"> Responsive
                            </label>
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <label class="littleNote"><input class="eplm-radio " type="radio" <?php if (isset($dimension) && $dimension == 'Custom') echo 'checked' ?> name="options[dimension]" id="Custom" value="Custom">
                                Custom </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field">
                <div class="panel-body eplm_inner_panel_body eplm_inner_panel_body">
                    <div class="row">
                        <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12 wpoc-field" id="responsive_options">
                            <span class="littleNote">Size</span>
                            <select id="popup-responsive-dimension-measure" style=" width: 100%" name="options[popup_responsive_dimension_measure]" class="input-width-static">

                                <option value="auto" <?php if (isset($popup_responsive_dimension_measure) && $popup_responsive_dimension_measure == 'auto') echo 'selected="selected"' ?>>
                                    Auto
                                </option>
                                <option value="10%" <?php if (isset($popup_responsive_dimension_measure) && $popup_responsive_dimension_measure == '10%') echo 'selected="selected"' ?>>
                                    10%
                                </option>
                                <option value="20%" <?php if (isset($popup_responsive_dimension_measure) && $popup_responsive_dimension_measure == '20%') echo 'selected="selected"' ?>>
                                    20%
                                </option>
                                <option value="30%" <?php if (isset($popup_responsive_dimension_measure) && $popup_responsive_dimension_measure == '30%') echo 'selected="selected"' ?>>
                                    30%
                                </option>
                                <option value="40%" <?php if (isset($popup_responsive_dimension_measure) && $popup_responsive_dimension_measure == '40%') echo 'selected="selected"' ?>>
                                    40%
                                </option>
                                <option value="50%" <?php if (isset($popup_responsive_dimension_measure) && $popup_responsive_dimension_measure == '50%') echo 'selected="selected"' ?>>
                                    50%
                                </option>
                                <option value="60%" <?php if (isset($popup_responsive_dimension_measure) && $popup_responsive_dimension_measure == '60%') echo 'selected="selected"' ?>>
                                    60%
                                </option>
                                <option value="70%" <?php if (isset($popup_responsive_dimension_measure) && $popup_responsive_dimension_measure == '70%') echo 'selected="selected"' ?>>
                                    70%
                                </option>
                                <option value="80%" <?php if (isset($popup_responsive_dimension_measure) && $popup_responsive_dimension_measure == '80%') echo 'selected="selected"' ?>>
                                    80%
                                </option>
                                <option value="90%" <?php if (isset($popup_responsive_dimension_measure) && $popup_responsive_dimension_measure == '90%') echo 'selected="selected"' ?>>
                                    90%
                                </option>
                                <option value="100%" <?php if (isset($popup_responsive_dimension_measure) && $popup_responsive_dimension_measure == '100%') echo 'selected="selected"' ?>>
                                    100%
                                </option>
                            </select>
                        </div>

                    </div>
                </div>
            </div>

            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field" id="custom_options">
                <div class="panel-body eplm_inner_panel_body">
                    <div class="form-group col-lg-6 col-md-6 col-sm-3 col-xs-6 wpoc-field">
                        <span style="  width: 55%;" class="littleNote">Width %</span>
                        <input style=" width: 100%;" id="di_width_val" value="<?php echo isset($di_width_val) && $di_width_val != '' ? $di_width_val : 50; ?>" name="options[di_width_val]" type="number">

                        <span style="  width: 55%;" class="littleNote">Max Width %</span>
                        <input style=" width: 100%;" id="di_max_width_val" value="<?php echo isset($di_max_width_val) && $di_max_width_val != '' ? $di_max_width_val : 100; ?>" name="options[di_max_width_val]" type="number">
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-3 col-xs-6 wpoc-field">
                        <span style="  width: 55%;" class="littleNote">Hight %</span>
                        <input style=" width: 100%;" id="di_hight_val" name="options[di_hight_val]" value="<?php echo isset($di_hight_val) && $di_hight_val != '' ? $di_hight_val : 31; ?>" type="number">

                        <span style="  width: 55%;" class="littleNote">Max Hight %</span>
                        <input style=" width: 100%;" id="di_max_hight_val" value="<?php echo isset($di_max_hight_val) && $di_max_hight_val != '' ? $di_max_hight_val : 100; ?>" name="options[di_max_hight_val]" type="number">
                    </div>
                </div>
            </div>


            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field ">
                <div class="panel-body eplm_inner_panel_body">
                    <div class="row">
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6  wpoc-field  ">
                            <label class="eplm_form_main_title">Show Title </label>
                        </div>
                        <div class=" form-group col-lg-3 col-md-3 col-sm-4 col-xs-3  wpoc-field">
                            <label class="switch">
                                <input name="options[showtitlecheck]" <?php if (isset($showtitlecheck)) {
                                                                            checked('1', $showtitlecheck);
                                                                        } ?> id="showtitlecheck" value="1" type="checkbox">
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <div class=" form-group col-lg-3 col-md-3 col-sm-4 col-xs-3  wpoc-field">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field" id="title_options">
                <div class="panel-body eplm_inner_panel_body">
                    <div class="row">
                        <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12  wpoc-field">
                            <span class="littleNote">Title </span>
                            <input id="title_text" name="options[title_text]" class="form-control" value="<?php if (isset($title_text)) echo $title_text ?>" type="text">
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12  wpoc-field">
                            <span class="littleNote">Position</span>
                            <select id="title_posi_sellect" style=" width: 100%;" name="options[title_posi_sellect]" class="form-control">
                                <option value="Left" <?php if (isset($title_posi_sellect) && $title_posi_sellect == 'Left') echo 'selected="selected"' ?>>
                                    Top Left
                                </option>
                                <option value="Right" <?php if (isset($title_posi_sellect) && $title_posi_sellect == 'Right') echo 'selected="selected"' ?>>
                                    Top Right
                                </option>

                            </select>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12  wpoc-field">
                            <span class="littleNote">Font Size :</span>
                            <input type="range" min="1" max="100" step="1" value="<?php echo $titlesize ?>" class="sliderr" name="options[titlesize]" id="titlesize"><br />
                            <input name="titlesizeval" id="titlesizeval" type="hidden" value="<?php if (!empty($titlesize)) {
                                                                                                    echo substr($titlesize, 0, -2);
                                                                                                } else {
                                                                                                    echo 17;
                                                                                                } ?>">

                            <label class="eplm_control_hint">Font Size <span id="titlesize_demo"></span> Default Is
                                17</label>
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12  wpoc-field">
                            <span class="littleNote">Font Color</span>
                            <input type='text' class='startEmpty form-control' id="title_font_color_picker" name="options[title_font_color_picker]" value='<?php if (isset($title_font_color_picker)) echo $title_font_color_picker ?>' />
                            <script>
                                $(".startEmpty").spectrum({
                                    clickoutFiresChange: true,
                                    allowEmpty: true,
                                    showInput: true,
                                    preferredFormat: "hex"
                                });
                                $("#title_font_color_picker").on('move.spectrum', function(e, tinycolor) {
                                    this.value = tinycolor.toHexString();
                                });
                            </script>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- ////////////////end Dimension options//////////////////////////////////////-->
    <!-- ////////////////start Styling options//////////////////////////////////////-->
    <div id="flipStyling" style="cursor: pointer; background-color: #E9941D;" class="panel-heading flip eplm_collabce"><a> <?php
                                                                                                                            echo '<img src="' . plugins_url('pages/icons/if_17_2739104.png', dirname(__FILE__)) . '" > ';
                                                                                                                            ?>
        </a> Styling Options
    </div>
    <div id="panelStyling" class="panel panel-default panel eplm-panel-body">
        <div class="panel-body eplm_inner_panel_body">
            <?php
            if ($template_id != 7) {
            ?>
                <div class=" eplm_inner_panel_body">
                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field">
                        <div class="row">
                            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-6  wpoc-field ">
                                <label class="eplm_form_main_title">Background </label>
                            </div>


                            <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                                <label class="switch">
                                    <input name="options[Background_options]" id="Background_options" <?php if (isset($Background_options)) {
                                                                                                            checked('1', $Background_options);
                                                                                                        } ?> type="checkbox" value="1" type="checkbox">

                                    <span class="slider round"></span>
                                </label>
                            </div>
                            <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                            </div>
                        </div>
                    </div>
                </div>
                <div id="back_options">
                    <div class="panel-body eplm_inner_panel_body">
                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field ">
                            <label class="lpl_title">Popup Background : </label>
                            <div class="row ">
                                <div class="panel-body eplm_inner_panel_body">

                                    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                                        <span class="littleNote">Popup</span>
                                        <input type='text' class=' form-control' id="color_picker" style="display: block!important;" name="options[color_picker]" value='<?php echo $color_picker; ?>' />
                                        <script>
                                            $("#color_picker").spectrum({
                                                clickoutFiresChange: true,
                                                allowEmpty: true,
                                                showInput: true,
                                                preferredFormat: "hex"
                                            });
                                            $("#color_picker").on('move.spectrum', function(e, tinycolor) {
                                                this.value = tinycolor.toHexString();
                                            });
                                        </script>
                                    </div>
                                    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                                        <span class="littleNote">Footer</span>
                                        <input type='text' class=' form-control' id="footer_color_picker" style="display: block!important;" name="options[footer_color_picker]" <?php if ($footer_color_picker == 'white') {
                                                                                                                                                                                    $footer_color_picker = '#ffffff';
                                                                                                                                                                                } ?> value='<?php if (isset($footer_color_picker)) echo $footer_color_picker ?>' />
                                        <script>
                                            $("#footer_color_picker").spectrum({
                                                clickoutFiresChange: true,
                                                allowEmpty: true,
                                                showInput: true,
                                                showAlpha: false,
                                                preferredFormat: "hex"
                                            });
                                            $("#footer_color_picker").on('move.spectrum', function(e, tinycolor) {
                                                this.value = tinycolor.toHexString();
                                            });
                                        </script>
                                    </div>
                                    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                                        <span class="littleNote">Header</span>
                                        <input type='text' class=' form-control' id="header_color_picker" style="display: block!important;" name="options[header_color_picker]" <?php if ($header_color_picker == 'white') {
                                                                                                                                                                                    $header_color_picker = '#ffffff';
                                                                                                                                                                                } ?> value='<?php if (isset($header_color_picker)) echo $header_color_picker ?>' />
                                        <script>
                                            $("#header_color_picker").spectrum({
                                                clickoutFiresChange: true,
                                                allowEmpty: true,
                                                showInput: true,
                                                preferredFormat: "hex",
                                            });
                                            $("#header_color_picker").on('move.spectrum', function(e, tinycolor) {
                                                this.value = tinycolor.toHexString();
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="panel-body eplm_inner_panel_body">
                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field">

                            <div class="panel-body eplm_inner_panel_body">
                                <div class="row">
                                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6  wpoc-field">
                                        <span class="littleNote">Popup Margin </span>
                                        <input class="form-control" name="options[margin_val]" id="margin_val" type="number" value="<?php if (isset($margin_val)) echo (int)$margin_val ?>">
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12  wpoc-field">
                                        <span class="littleNote">Popup Opacity :</span>
                                        <input type="range" min="0" max="1" step=".01" value="<?php if (isset($popup_Opacity_myRange)) {
                                                                                                    echo $popup_Opacity_myRange;
                                                                                                } else {
                                                                                                    echo 1;
                                                                                                } ?>" class="sliderr" name="options[popup_Opacity_myRange]" id="popup_Opacity_myRange"><br />

                                        <label class="eplm_control_hint">Opacity <span id="popup_Opacity_demo"></span>
                                            Default
                                            Is 1</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body eplm_inner_panel_body" id="page_opacity_option">
                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field ">
                            <label class="lpl_title">Page Background : </label>
                            <div class="panel-body eplm_inner_panel_body">
                                <div class="row">

                                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6  wpoc-field">
                                        <span class="littleNote">Opacity</span>
                                        <input type='text' class='startEmptyopacity form-control' id="Opacity_color_picker" name="options[Opacity_color_picker]" value='<?php if (isset($Opacity_color_picker)) echo $Opacity_color_picker ?>' />
                                        <script>
                                            $(".startEmptyopacity").spectrum({
                                                clickoutFiresChange: true,
                                                allowEmpty: true,
                                                showInput: true,
                                                preferredFormat: "hex"
                                            });
                                            $("#Opacity_color_picker").on('move.spectrum', function(e, tinycolor) {
                                                this.value = tinycolor.toHexString();
                                            });
                                        </script>
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12  wpoc-field">
                                        <span class="littleNote">Cover Opacity :</span></span>
                                        <input type="range" min="0" max="1" step=".01" value="<?php if (isset($Opacity_myRange)) echo $Opacity_myRange ?>" class="sliderr" name="options[Opacity_myRange]" id="Opacity_myRange"><br />

                                        <label class="eplm_control_hint">Opacity <span id="Opacity_demo"> Default Is 0.5</label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="panel-body eplm_inner_panel_body" id="Background_value_my_color_divee">
                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field ">
                            <label class="lpl_title">Background Image: </label>
                            <div class="panel-body eplm_inner_panel_body">
                                <div class="row">
                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12  wpoc-field">
                                        <span class="littleNote">Background Position </span>
                                        <select class="form-control" name="options[backround_position]" id="backround_position">
                                            <option value="center" <?php if (isset($backround_position) && $backround_position == 'center') echo 'selected="selected"' ?>>
                                                Center
                                            </option>
                                            <option value="top" <?php if (isset($backround_position) && $backround_position == 'top') echo 'selected="selected"' ?>>
                                                Top
                                            </option>
                                            <option value="bottom" <?php if (isset($backround_position) && $backround_position == 'bottom') echo 'selected="selected"' ?>>
                                                Bottom
                                            </option>
                                            <option value="left" <?php if (isset($backround_position) && $backround_position == 'left') echo 'selected="selected"' ?>>
                                                Left
                                            </option>
                                            <option value="right" <?php if (isset($backround_position) && $backround_position == 'right') echo 'selected="selected"' ?>>
                                                Right
                                            </option>
                                        </select>

                                    </div>

                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12  wpoc-field">
                                        <span class="littleNote"> Popup Background Image</span>

                                        <?php
                                        if (!isset($pop_back_image)) {
                                            $pop_back_image = '';
                                        }
                                        $opj->add_file_upload('background_image_field', $pop_back_image, '');
                                        ?>
                                        <br />
                                        <input type="hidden" value="<?php if (isset($pop_back_image)) echo $pop_back_image ?>" name="options[pop_back_image]" id="pop_back_image">
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            <?php } ?>
            <?php if ($template_id == 7) { ?>
                <div class="eplm_inner_panel_body"></div>
            <?php } ?>

            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field">
                <div class="row">

                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6  wpoc-field ">
                        <label class="eplm_form_main_title">Border options </label>
                    </div>
                    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                        <label class="switch">
                            <input name="options[border_shadow_check]" id="border_shadow_check" <?php if (isset($border_shadow_check)) {
                                                                                                    checked('1', $border_shadow_check);
                                                                                                } ?> type="checkbox" value="1" type="checkbox">
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">

                    </div>

                </div>
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field" id="border_shadow_color_div">
                <div class="panel-body eplm_inner_panel_body">
                    <div class="row">
                        <div class="panel-body eplm_inner_panel_body">
                            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12  wpoc-field">
                                <span class="littleNote">Choose Border Style </span>
                                <select class="form-control" name="options[Border_Style_sellect]" id="Border_Style_sellect">
                                    <option value="none" <?php if (isset($Border_Style_sellect) && $Border_Style_sellect == 'none') echo 'selected="selected"' ?>>
                                        None
                                    </option>
                                    <option value="solid" <?php if (isset($Border_Style_sellect) && $Border_Style_sellect == 'solid') echo 'selected="selected"' ?>>
                                        Solid ________
                                    </option>
                                    <option value="dotted" <?php if (isset($Border_Style_sellect) && $Border_Style_sellect == 'dotted') echo 'selected="selected"' ?>>
                                        Dotted ........
                                    </option>
                                    <option value="dashed" <?php if (isset($Border_Style_sellect) && $Border_Style_sellect == 'dashed') echo 'selected="selected"' ?>>
                                        Dashed --------
                                    </option>
                                    <option value="double" <?php if (isset($Border_Style_sellect) && $Border_Style_sellect == 'double') echo 'selected="selected"' ?>>
                                        Double =======
                                    </option>
                                </select>
                            </div>

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6  wpoc-field">
                                <span class="littleNote">Border Thickness</span>
                                <input type="range" min="0" max="50" step="1" value="1<?php if (isset($Thickness_myRange)) echo $Thickness_myRange ?>" class="sliderr" name="options[Thickness_myRange]" id="Thickness_myRange">
                                <br />
                                <input name="thicknessval" id="thicknessval" type="hidden" value="<?php if (!empty($Thickness_myRange)) {
                                                                                                        echo $Thickness_myRange;
                                                                                                    } else {
                                                                                                        echo 1;
                                                                                                    } ?>">
                                <label class="eplm_control_hint"><span id="Thickness_demo">px</span>Top Is 1 PX</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field ">
                    <label class="lpl_title">Border Color : </label>
                    <div class="panel-body eplm_inner_panel_body">
                        <div class="row">
                            <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                                <span class="littleNote">Header Color</span>
                                <input type='text' class='startEmpty form-control' id="header_Border_color_picker" name="options[header_Border_color_picker]" value='<?php if (isset($header_Border_color_picker)) echo $header_Border_color_picker ?>' />
                                <script>
                                    $(".startEmpty").spectrum({
                                        clickoutFiresChange: true,
                                        allowEmpty: true,
                                        showInput: true,
                                        preferredFormat: "hex"
                                    });
                                    $("#header_Border_color_picker").on('move.spectrum', function(e, tinycolor) {
                                        this.value = tinycolor.toHexString();
                                    });
                                </script>
                            </div>
                            <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                                <span class="littleNote">Footer Color </span>
                                <input type='text' class='startEmpty form-control' id="fotter_Border_color_picker" name="options[fotter_Border_color_picker]" value='<?php if (isset($fotter_Border_color_picker)) echo $fotter_Border_color_picker ?>' />
                                <script>
                                    $(".startEmpty").spectrum({
                                        clickoutFiresChange: true,
                                        allowEmpty: true,
                                        showInput: true,
                                        preferredFormat: "hex"
                                    });
                                    $("#fotter_Border_color_picker").on('move.spectrum', function(e, tinycolor) {
                                        this.value = tinycolor.toHexString();
                                    });
                                </script>
                            </div>
                            <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                                <span class="littleNote">Popup Color</span>
                                <input style="width: 90%; margin-left: 20px;" type='text' class='startEmpty form-control' id="slide_Border_color_picker" name="options[slide_Border_color_picker]" value='<?php if (isset($slide_Border_color_picker)) echo $slide_Border_color_picker ?>' />
                                <script>
                                    $(".startEmpty").spectrum({
                                        clickoutFiresChange: true,
                                        allowEmpty: true,
                                        showInput: true,
                                        preferredFormat: "hex"
                                    });
                                    $("#slide_Border_color_picker").on('move.spectrum', function(e, tinycolor) {
                                        this.value = tinycolor.toHexString();
                                    });
                                </script>
                            </div>
                            <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                                <span class="littleNote">Shadow</span>
                                <input type='text' class='startEmpty form-control' id="border_shadow_color_picker" name="options[border_shadow_color_picker]" value='<?php if (isset($border_shadow_color_picker)) echo $border_shadow_color_picker ?>' />
                                <script>
                                    $(".startEmpty").spectrum({
                                        clickoutFiresChange: true,
                                        allowEmpty: true,
                                        showInput: true,
                                        preferredFormat: "hex"
                                    });
                                    $("#border_shadow_color_picker").on('move.spectrum', function(e, tinycolor) {
                                        this.value = tinycolor.toHexString();
                                    });
                                </script>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field ">
                    <label class="lpl_title">Radius : </label>
                    <div class="panel-body eplm_inner_panel_body">
                        <div class="row">

                            <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                                <span class="littleNote">Bottom Right</span>
                                <input style="  width: 90%;" id="Bottom_Top_Right" name="options[Bottom_Top_Right]" value="<?php if (isset($Bottom_Top_Right)) echo $Bottom_Top_Right ?>" type="number">
                            </div>
                            <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                                <span class="littleNote">Bottom Left</span>
                                <input style="  width: 90%;" id="Bottom_Top_Lift" name="options[Bottom_Top_Lift]" value="<?php if (isset($Bottom_Top_Lift)) echo $Bottom_Top_Lift ?>" type="number">
                            </div>
                            <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                                <span class="littleNote">Top Right</span>
                                <input style="  width: 90%;" id="radious_Top_Right" name="options[radious_Top_Right]" value="<?php if (isset($radious_Top_Right)) echo $radious_Top_Right ?>" type="number">
                            </div>
                            <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                                <span class="littleNote">Top Left</span>
                                <input style="  width: 90%;" id="radious_Top_Lift" name="options[radious_Top_Lift]" value="<?php if (isset($radious_Top_Lift)) echo $radious_Top_Lift ?>" type="number">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <?php if ($template_id != 7) { ?>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field ">
                    <div class="row">
                        <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-6  wpoc-field ">
                            <label class="eplm_form_main_title">Image Repeat </label>
                        </div>
                        <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                            <label class="switch">
                                <input name="options[img_repeat]" <?php if (isset($img_repeat)) {
                                                                        checked('1', $img_repeat);
                                                                    } ?> id="img_repeat" type="checkbox" value="1" type="checkbox">
                                <span class="slider round"></span>
                            </label>
                        </div>

                    </div>
                </div>
            <?php } ?>

            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field ">
                <div class="row">
                    <label style="margin-left: 10px;" class="eplm_form_main_title">Popup Padding </label>
                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field ">
                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field ">
                            <label class="lpl_title">Header Padding : </label>
                            <div class="panel-body eplm_inner_panel_body">
                                <div class="row">
                                    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                                        <span class="littleNote"> Top </span>
                                        <input style="  width: 90%;" id="header_p_top" name="options[header_p_top]" value="<?php if (isset($header_p_top)) echo (int)$header_p_top; ?>" type="number">
                                    </div>
                                    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                                        <span class="littleNote"> Bottom </span>
                                        <input style="  width: 90%;" id="header_p_bottom" name="options[header_p_bottom]" value="<?php if (isset($header_p_bottom)) echo (int)$header_p_bottom; ?>" type="number">
                                    </div>
                                    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                                        <span class="littleNote"> Right </span>
                                        <input style="  width: 90%;" id="header_p_right" name="options[header_p_right]" value="<?php if (isset($header_p_right)) echo (int)$header_p_right; ?>" type="number">
                                    </div>
                                    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                                        <span class="littleNote"> Left </span>
                                        <input style="  width: 90%;" id="header_p_left" name="options[header_p_left]" value="<?php if (isset($header_p_left)) echo (int)$header_p_left; ?>" type="number">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field ">
                            <label class="lpl_title">Content Padding : </label>
                            <div class="panel-body eplm_inner_panel_body">
                                <div class="row">
                                    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                                        <span class="littleNote"> Top </span>
                                        <input style="width: 90%;" id="content_p_top" name="options[content_p_top]" value="<?php if (isset($content_p_top)) echo (int)$content_p_top; ?>" type="number">
                                    </div>
                                    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                                        <span class="littleNote"> Bottom </span>
                                        <input style="  width: 90%;" id="content_p_bottom" name="options[content_p_bottom]" value="<?php if (isset($content_p_bottom)) echo (int)$content_p_bottom; ?>" type="number">
                                    </div>
                                    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                                        <span class="littleNote"> Right </span>
                                        <input style="  width: 90%;" id="content_p_right" name="options[content_p_right]" value="<?php if (isset($content_p_right)) echo (int)$content_p_right; ?>" type="number">
                                    </div>
                                    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                                        <span class="littleNote"> Left </span>
                                        <input style="  width: 90%;" id="content_p_left" name="options[content_p_left]" value="<?php if (isset($content_p_left)) echo (int)$content_p_left; ?>" type="number">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field ">
                            <label class="lpl_title">Footer Padding : </label>
                            <div class="panel-body eplm_inner_panel_body">
                                <div class="row">
                                    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                                        <span class="littleNote"> Top </span>
                                        <input style="  width: 90%;" id="footer_p_top" name="options[footer_p_top]" value="<?php if (isset($footer_p_top)) echo (int)$footer_p_top; ?>" type="number">
                                    </div>
                                    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                                        <span class="littleNote"> Bottom </span>
                                        <input style="  width: 90%;" id="footer_p_bottom" name="options[footer_p_bottom]" value="<?php if (isset($footer_p_bottom)) echo (int)$footer_p_bottom; ?>" type="number">
                                    </div>
                                    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                                        <span class="littleNote"> Right </span>
                                        <input style="  width: 90%;" id="footer_p_right" name="options[footer_p_right]" value="<?php if (isset($footer_p_right)) echo (int)$footer_p_right; ?>" type="number">
                                    </div>
                                    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                                        <span class="littleNote"> Left </span>
                                        <input style="  width: 90%;" id="footer_p_left" name="options[footer_p_left]" value="<?php if (isset($footer_p_left)) echo (int)$footer_p_left; ?>" type="number">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ////////////////end Styling options//////////////////////////////////////-->

</div>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <!-- ////////////////start close options//////////////////////////////////////-->
    <div id="flipClosing" style="cursor: pointer; background-color: #56AF55;" class="panel-heading flip eplm_collabce"><a> <?php
                                                                                                                            echo '<img src="' . plugins_url('pages/icons/if_cross_handrawn_close_436171.png', dirname(__FILE__)) . '" > ';
                                                                                                                            ?>
        </a> (Close button) options
    </div>
    <div id="panelClosing" class="panel panel-default panel eplm-panel-body">
        <div class="panel-body eplm_inner_panel_body">
            <div class="row">
                <div class="form-group  col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field">
                    <div class="panel-body eplm_inner_panel_body">
                        <div class="row">
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6 wpoc-field ">
                                <label class="eplm_form_main_title">Show close button </label>
                            </div>
                            <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                                <label class="switch">
                                    <input name="options[showclosebtn]" <?php if (isset($showclosebtn)) {
                                                                            checked('1', $showclosebtn);
                                                                        } ?> id="showclosebtn" value="1" type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                            <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field" id="Close_Butoon_options">

                    <div class="panel-body eplm_inner_panel_body">
                        <div class="row">
                            <div class="panel-body eplm_inner_panel_body">
                                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6  wpoc-field">
                                    <span class="littleNote">Position</span>
                                    <select id="Closingsellect" style=" width: 100%;" name="options[Closingsellect]" class="form-control">

                                        <option value="Right" <?php if (isset($Closingsellect) && $Closingsellect == 'Right') echo 'selected="selected"' ?>>
                                            Bottom Right
                                        </option>
                                        <option value="50%" <?php if (isset($Closingsellect) && $Closingsellect == '50%') echo 'selected="selected"' ?>>
                                            Bottom Center
                                        </option>
                                        <option value="Left" <?php if (isset($Closingsellect) && $Closingsellect == 'Left') echo 'selected="selected"' ?>>
                                            Bottom Left
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6  wpoc-field">
                                    <span class="littleNote">Text</span>
                                    <input id="closebtntext" name="options[closebtntext]" class="form-control" value="<?php if (isset($closebtntext)) {
                                                                                                                            echo $closebtntext;
                                                                                                                        }
                                                                                                                        ?>" type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body eplm_inner_panel_body" style="margin-left: 7px!important;">
                        <div class="panel-body eplm_inner_panel_body">
                            <div class="row">
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field ">
                                    <label class="lpl_title">Color :</label>
                                    <div class="row">
                                        <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                                            <span class="littleNote"> Shadow</span>
                                            <input type='text' class='startEmpty form-control' id="btnclose_Shadow_color_picker" name="options[btnclose_Shadow_color_picker]" value='<?php if (isset($btnclose_Shadow_color_picker)) echo $btnclose_Shadow_color_picker ?>' />
                                            <script>
                                                $(".startEmpty").spectrum({
                                                    clickoutFiresChange: true,
                                                    allowEmpty: true,
                                                    showInput: true,
                                                    preferredFormat: "hex"
                                                });
                                                $("#btnclose_Shadow_color_picker").on('move.spectrum', function(e, tinycolor) {
                                                    this.value = tinycolor.toHexString();
                                                });
                                            </script>
                                        </div>
                                        <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                                            <span class="littleNote">Font Color</span>
                                            <input type='text' class='startEmpty form-control' id="font_btnclose_color_picker" name="options[font_btnclose_color_picker]" value='<?php if (isset($font_btnclose_color_picker)) echo $font_btnclose_color_picker ?>' />
                                            <script>
                                                $(".startEmpty").spectrum({
                                                    clickoutFiresChange: true,
                                                    allowEmpty: true,
                                                    showInput: true,
                                                    preferredFormat: "hex"
                                                });
                                                $("#font_btnclose_color_picker").on('move.spectrum', function(e, tinycolor) {
                                                    this.value = tinycolor.toHexString();
                                                });
                                            </script>
                                        </div>
                                        <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                                            <span class="littleNote">Button Color</span>
                                            <input type='text' class='startEmpty form-control' id="btnclose_color_picker" name="options[btnclose_color_picker]" value='<?php if (isset($btnclose_color_picker)) echo $btnclose_color_picker ?>' />
                                            <script>
                                                $(".startEmpty").spectrum({
                                                    clickoutFiresChange: true,
                                                    allowEmpty: true,
                                                    showInput: true,
                                                    preferredFormat: "hex"
                                                });
                                                $("#btnclose_color_picker").on('move.spectrum', function(e, tinycolor) {
                                                    this.value = tinycolor.toHexString();
                                                });
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body eplm_inner_panel_body">
                        <div class="panel-body eplm_inner_panel_body">
                            <div class="row">
                                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6  wpoc-field">
                                    <span class="littleNote">Font Size :</span>
                                    <input type="range" min="1" max="40" step="1" value="<?php echo $closebtnsize ?>" class="sliderr" name="options[closebtnsize]" id="closebtnsize"><br />
                                    <input name="sizeval" id="sizeval" type="hidden" value="<?php if (!empty($closebtnsize)) {
                                                                                                echo substr($closebtnsize, 0, -2);
                                                                                            } else {
                                                                                                echo 13;
                                                                                            } ?>">

                                    <label class="eplm_control_hint">Font Size <span id="close_size_demo"></span>
                                        Default Is 13</label>
                                </div>
                                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6  wpoc-field">
                                    <span class="littleNote">Button Width :</span>
                                    <input type="range" min="50" max="250" step="1" value="<?php echo $close_btn_width ?>" class="sliderr" name="options[close_btn_width]" id="closebtnwidth"><br />
                                    <input name="closebtnwidthval" id="closebtnwidthval" type="hidden" value="<?php if (!empty($close_btn_width)) {
                                                                                                                    echo substr($close_btn_width, 0, -2);
                                                                                                                } else {
                                                                                                                    echo 100;
                                                                                                                } ?>">

                                    <label class="eplm_control_hint">Width Size <span id="close_btn_width_demo"></span>
                                        Default
                                        Is 100px</label>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="panel-body eplm_inner_panel_body">
                        <div class="panel-body eplm_inner_panel_body">
                            <div class="row">
                                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6  wpoc-field">
                                    <span class="littleNote">Button height :</span>
                                    <input type="range" min="1" max="100" step="1" value="<?php echo $close_btn_height ?>" class="sliderr" name="options[close_btn_height]" id="close_btn_height"><br />
                                    <input name="closebtnheightval" id="closebtnheightval" type="hidden" value="<?php if (!empty($close_btn_height)) {
                                                                                                                    echo substr($close_btn_height, 0, -2);
                                                                                                                } else {
                                                                                                                    echo 30;
                                                                                                                } ?>">

                                    <label class="littleNote">height Size <span id="close_btn_height_demo"></span>
                                        Default Is 100px</label>
                                </div>
                                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6  wpoc-field">
                                    <span class="littleNote">Button Padding :</span>
                                    <input type="range" min="1" max="100" step="1" value="<?php echo $closebtnpadding ?>" class="sliderr" name="options[closebtnpadding]" id="closebtnpadding"><br />
                                    <input name="padingval" id="padingval" type="hidden" value="<?php if (!empty($closebtnpadding)) {
                                                                                                    echo $closebtnpadding;
                                                                                                } else {
                                                                                                    echo 3;
                                                                                                } ?>">
                                    <label class="littleNote">Button Padding <span id="close_btn_padding_demo"></span>
                                        Default Is 3 PX</label>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="panel-body eplm_inner_panel_body">
                        <div class="row">
                            <div class="panel-body eplm_inner_panel_body">
                                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6  wpoc-field">
                                    <span class="littleNote">Border Style </span>
                                    <select class="form-control" name="options[close_btn_Border_Style_sellect]" id="close_btn_Border_Style_sellect">
                                        <option value="solid" <?php if (isset($close_btn_Border_Style_sellect) && $close_btn_Border_Style_sellect == 'solid') echo 'selected="selected"' ?>>
                                            Solid ________
                                        </option>
                                        <option value="dotted" <?php if (isset($close_btn_Border_Style_sellect) && $close_btn_Border_Style_sellect == 'dotted') echo 'selected="selected"' ?>>
                                            Dotted ........
                                        </option>
                                        <option value="dashed" <?php if (isset($close_btn_Border_Style_sellect) && $close_btn_Border_Style_sellect == 'dashed') echo 'selected="selected"' ?>>
                                            Dashed --------
                                        </option>
                                        <option value="double" <?php if (isset($close_btn_Border_Style_sellect) && $close_btn_Border_Style_sellect == 'double') echo 'selected="selected"' ?>>
                                            Double =======
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6  wpoc-field">
                                    <span class="littleNote">Button Border Radius :</span>
                                    <input type="range" min="0" max="100" step="1" value="<?php echo $closebtnb_radius ?>" class="sliderr" name="options[closebtnb_radius]" id="closebtnb_radius"><br />
                                    <input name="radiusval" id="radiusval" type="hidden" value="<?php if (!empty($closebtnb_radius)) {
                                                                                                    echo $closebtnb_radius;
                                                                                                } else {
                                                                                                    echo 0;
                                                                                                } ?>">

                                    <label class="eplm_control_hint">Button Border Radiue <span id="close_btn_b_radius_demo"></span> Default Is 5 PX</label>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field">
                    <div class="panel-body eplm_inner_panel_body">
                        <div class="row">
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6  wpoc-field ">
                                <label class="eplm_form_main_title">Show Cancel button </label>
                            </div>
                            <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                                <label class="switch">
                                    <input name="options[showcancelbtn]" <?php if (isset($showclosebtn)) {
                                                                                checked('1', $showcancelbtn);
                                                                            } ?> id="showcancelbtn" value="1" type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                            <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field" id="cancel_botton_options">
                    <div class="panel-body eplm_inner_panel_body">
                        <div class="panel-body eplm_inner_panel_body">
                            <div class="row">
                                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6  wpoc-field">
                                    <span class="littleNote">Text</span>
                                    <input id="cancelbtntext" name="options[cancelbtntext]" class="form-control" value="<?php if (isset($cancelbtntext)) echo $cancelbtntext ?>" type="text">
                                </div>
                                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6  wpoc-field">
                                    <span class="littleNote">Botton Color</span>
                                    <input type='text' class='startEmpty form-control' id="booton_color_picker" name="options[booton_color_picker]" value='<?php if (isset($booton_color_picker)) echo $booton_color_picker ?>' />
                                    <script>
                                        $(".startEmpty").spectrum({
                                            clickoutFiresChange: true,
                                            allowEmpty: true,
                                            showInput: true,
                                            preferredFormat: "hex"
                                        });
                                        $("#booton_color_picker").on('move.spectrum', function(e, tinycolor) {
                                            this.value = tinycolor.toHexString();
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field">
                    <div class="panel-body eplm_inner_panel_body">
                        <div class="row">
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6  wpoc-field ">
                                <h4>Show close Icon </h4>
                            </div>
                            <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                                <label class="switch">
                                    <input name="options[showcloseicon]" <?php if (isset($showcloseicon)) {
                                                                                checked('1', $showcloseicon);
                                                                            } ?> id="showcloseicon" value="1" type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                            <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field" id="Close_Icon_options">
                    <div class="panel-body eplm_inner_panel_body">
                        <div class="panel-body eplm_inner_panel_body">
                            <div class="row">
                                <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-4  wpoc-field">
                                    <span class="littleNote">Position</span>
                                    <select id="closeiconsellect" name="options[closeiconsellect]" class="form-control">
                                        <option value="Right" <?php if (isset($closeiconsellect) && $closeiconsellect == 'Right') echo 'selected="selected"' ?>>
                                            Top Right
                                        </option>
                                        <option value="Left" <?php if (isset($closeiconsellect) && $closeiconsellect == 'Left') echo 'selected="selected"' ?>>
                                            Top Left
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-4  wpoc-field">
                                    <span class="littleNote">Color</span>
                                    <input type='text' class='startEmpty form-control' id="Icon_color_picker" name="options[Icon_color_picker]" value='<?php if (isset($Icon_color_picker)) echo $Icon_color_picker ?>' />
                                    <script>
                                        $(".startEmpty").spectrum({
                                            clickoutFiresChange: true,
                                            allowEmpty: true,
                                            showInput: true,
                                            preferredFormat: "hex"
                                        });
                                        $("#Icon_color_picker").on('move.spectrum', function(e, tinycolor) {
                                            this.value = tinycolor.toHexString();
                                        });
                                    </script>
                                </div>
                                <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-4  wpoc-field">
                                    <span class="littleNote">Icon Size :</span>
                                    <input type="range" min="10" max="100" step="1" value="<?php echo $iconsize ?>" class="sliderr" name="options[iconsize]" id="iconsize"><br />
                                    <input name="iconsiseval" id="iconsiseval" type="hidden" value="<?php if (!empty($iconsize)) {
                                                                                                        echo $iconsize;
                                                                                                    } else {
                                                                                                        echo 30;
                                                                                                    } ?>">

                                    <label class="eplm_control_hint">Size <span id="icon_size_demo"></span> Default Is
                                        30</label>
                                </div>
                            </div>
                            <br />
                        </div>
                    </div>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field">
                    <div class="panel-body eplm_inner_panel_body">
                        <div class="row">
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6  wpoc-field ">
                                <label class="eplm_form_main_title">Close Popup Using ESC Key</label>
                            </div>
                            <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                                <label class="switch">
                                    <input name="options[escbtncheckbox]" id="escbtncheckbox" value="1" <?php if (isset($escbtncheckbox)) {
                                                                                                            checked('1', $escbtncheckbox);
                                                                                                        } ?> type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                            <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field">
                    <div class="panel-body eplm_inner_panel_body">
                        <div class="row">
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6  wpoc-field ">
                                <label class="eplm_form_main_title">Click Outside To Close </label>
                            </div>
                            <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                                <label class="switch">
                                    <input name="options[outerclose]" id="outerclose" value="1" <?php if (isset($outerclose)) {
                                                                                                    checked('1', $outerclose);
                                                                                                } ?> type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field">
                    <div class="panel-body eplm_inner_panel_body">
                        <div class="row">
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6  wpoc-field ">
                                <label class="eplm_form_main_title">Auto Close Popup after x sec</label>
                            </div>
                            <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                                <label class="switch">
                                    <input name="options[closingtimebtn]" id="closingtimebtn" value="1" <?php if (isset($closingtimebtn)) {
                                                                                                            checked('1', $closingtimebtn);
                                                                                                        } ?> type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field" id="closingtime_options">
                    <div class="panel-body eplm_inner_panel_body">
                        <div class="row">
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6  wpoc-field">
                                <span style="padding-left: 15px;" class="littleNote">Enter Total Secondes </span>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6  wpoc-field">
                                <input class="form-control" type="number" name="options[closingtime]" value="<?php if (isset($closingtime)) echo $closingtime ?>" id="closingtime">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ////////////////end close options//////////////////////////////////////-->
    <!-- ////////////////start 	Visibility   options///////////////////////////////////-->
    <div id="flipVisibility" style="cursor: pointer; background-color: #3C83C1;" class="panel-heading flip eplm_collabce"><a><?php
                                                                                                                                echo '<img src="' . plugins_url('pages/icons/if_Increase_visibility_3448015.png', dirname(__FILE__)) . '" > ';
                                                                                                                                ?>
        </a>Visibility Options
    </div>
    <div id="panelVisibility" class="panel panel-default panel eplm-panel-body">

        <div class="panel-body eplm_inner_panel_body">
            <div class="row">
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field">
                    <div class="panel-body eplm_inner_panel_body">
                        <div class="row">
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6  wpoc-field ">
                                <label class="eplm_form_main_title"> post types </label>
                            </div>
                            <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                                <label class="switch">
                                    <input name="options[post_types]" <?php if (isset($post_types)) {
                                                                            checked('1', $post_types);
                                                                        } ?> id="post_types" value="1" type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                            <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">

                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field" id="post_type_sellect">
                    <div class="panel-body eplm_inner_panel_body">
                        <div class="panel-body eplm_inner_panel_body">
                            <div class="row">
                                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6  wpoc-field">
                                    <span class="littleNote">Choose post type :</span>
                                </div>
                                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6  wpoc-field">
                                    <select class="js-example-basic-multiple" style=" width: 100%;" id="popup-vesability-post" name="options[popup_vesability_post]" multiple="multiple">
                                        <?php
                                        global $post;
                                        $args = '';
                                        $output = 'names';
                                        $attachments = get_post_types(array('public' => true, 'publicly_queryable' => true, 'exclude_from_search' => false,), $output);
                                        if ($attachments) {
                                            foreach ($attachments as $post) {
                                        ?>
                                                <option value="<?php echo $post ?>" <?php if (!empty($popup_vesability_post) and in_array($post, $popup_vesability_post)) echo 'selected="selected"' ?>><?php echo $post ?></option>
                                        <?php
                                            }
                                        }
                                        ?>


                                    </select>
                                    <input type="hidden" name="options[aaa]" id="aaa">
                                    <br />
                                    <span class="eplm_control_hint">Choose Types Of Postes </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field">
                    <div class="panel-body eplm_inner_panel_body">
                        <div class="row">
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6  wpoc-field ">
                                <label class="eplm_form_main_title"> Categories </label>
                            </div>
                            <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                                <label class="switch">
                                    <input name="options[Categories]" id="Categories" <?php if (isset($Categories)) {
                                                                                            checked('1', $Categories);
                                                                                        } ?> value="1" type="checkbox">
                                    <span class="slider round"></span>
                                </label>

                            </div>
                            <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">

                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field" id="Categories_sellect">
                    <div class="panel-body eplm_inner_panel_body">
                        <div class="panel-body eplm_inner_panel_body">
                            <div class="row">
                                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6  wpoc-field">
                                    <label class="littleNote" for="sel1">Choose category :</label>
                                </div>
                                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6  wpoc-field">
                                    <select class="js-example-basic-multiple" style=" width: 100%;" id="popup-vesability-category" name="options[popup_vesability_category]" multiple="multiple">
                                        <?php
                                        global $eplm_category;
                                        $args = array('orderby' => 'term_id ', 'order' => 'ASC');
                                        $categories = get_categories($args);
                                        if ($categories) {
                                            foreach ($categories as $eplm_category) {
                                        ?>
                                                <option value="<?php echo $eplm_category->term_id ?>" <?php if (!empty($popup_vesability_category) and in_array($eplm_category->term_id, $popup_vesability_category)) echo 'selected="selected"' ?>><?php echo $eplm_category->name ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    <input type="hidden" name="options[aaacat]" id="aaacat">
                                    <span class="eplm_control_hint">Choose Types Of Categories </span>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>


                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field">
                    <div class="panel-body eplm_inner_panel_body">
                        <div class="row">
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6  wpoc-field ">
                                <label class="eplm_form_main_title">Show while scrolling</label>
                            </div>
                            <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                                <label class="switch">
                                    <input name="options[scrolling]" id="scrolling" <?php if (isset($scrolling)) {
                                                                                        checked('1', $scrolling);
                                                                                    } ?> value="1" type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </div>

                        </div>
                    </div>
                </div>




                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field">
                    <div class="panel-body eplm_inner_panel_body">
                        <div class="row">
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6  wpoc-field ">
                                <label class="eplm_form_main_title">Use cookie</label>
                            </div>
                            <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                                <label class="switch">
                                    <input name="options[use_cooki]" id="use_cooki" <?php if (isset($use_cooki)) {
                                                                                        checked('1', $use_cooki);
                                                                                    } ?> value="1" type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field" id="use_cooki_option">

                    <div class="panel-body eplm_inner_panel_body">
                        <div class="panel-body eplm_inner_panel_body">
                            <div class="row">
                                <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                                    <label class="littleNote" for="sel1">Use cookie For </label>
                                </div>
                                <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                                    <p class="littleNote"><input type="radio" <?php if (isset($cookioption) && $cookioption == 'button') echo 'checked' ?> name="options[cookioption]" id="button" value="button">Close Button
                                    </p>
                                </div>
                                <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                                    <p class="littleNote"><input type="radio" <?php if (isset($cookioption) && $cookioption == 'icon') echo 'checked' ?> name="options[cookioption]" id="icon" value="icon">Close Icon </p>
                                </div>
                                <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                                    <p class="littleNote"><input type="radio" <?php if (isset($cookioption) && $cookioption == 'all') echo 'checked' ?> name="options[cookioption]" id="all" value="all">For All </p>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>


                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field">
                    <div class="panel-body eplm_inner_panel_body">
                        <div class="row">
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6  wpoc-field ">
                                <label class="eplm_form_main_title"> Auto Load</label>
                            </div>
                            <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                                <label class="switch">
                                    <input name="options[loading]" id="loading" <?php if (isset($loading)) {
                                                                                    checked('1', $loading);
                                                                                } ?> value="1" type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                            <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">

                            </div>
                        </div>
                    </div>
                </div>


                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field" id="loadingtime_option">
                    <div class="panel-body eplm_inner_panel_body">
                        <div class="panel-body eplm_inner_panel_body">
                            <div class="row">
                                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6  wpoc-field">
                                    <label class="littleNote" for="sel1">Show After X Seconds</label>
                                </div>
                                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6  wpoc-field">
                                    <input type="number" class="form-control" name="options[loadingtime]" value="<?php if (isset($loadingtime)) echo $loadingtime ?>" id="loadingtime">
                                    <br />
                                    <span class="eplm_control_hint">Enter Number Of Seconds to Show </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field">
                    <div class="panel-body eplm_inner_panel_body">

                        <div class="row">
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6  wpoc-field ">
                                <label class="eplm_form_main_title">Date Range</label>
                            </div>
                            <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3  wpoc-field">
                                <label class="switch">
                                    <input name="options[daterange]" id="daterange" <?php if (isset($daterange)) {
                                                                                        checked('1', $daterange);
                                                                                    } ?> value="1" type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </div>

                        </div>

                    </div>
                </div>


                <div id="daterange_option" class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 wpoc-field">
                    <div class="panel-body eplm_inner_panel_body">
                        <div class="panel-body eplm_inner_panel_body">
                            <div class="row">
                                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6  wpoc-field">
                                    <label class="littleNote"> Enter Start Date : </label>
                                    <input class="form-control" type="date" name="options[bday]" value="<?php if (isset($bday)) echo trim($bday) ?>">
                                    <br />
                                    <span class="eplm_control_hint">Enter Sart Show Date </span>
                                </div>
                                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6  wpoc-field">
                                    <label class="littleNote"> Enter End Date : </label>
                                    <input class="form-control" type="date" name="options[eday]" value="<?php if (isset($eday)) echo $eday ?>">
                                    <br />
                                    <span class="eplm_control_hint">Enter End Show Date </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>
    <!-- ////////////////end   Visibility  options//////////////////////////-->
</div>

<input name="hreflocation" type="hidden" id="hreflocation" value="">
<input name="hreflocation2" type="hidden" id="hreflocation2" value="">
<input type="hidden" value="<?php if (!empty($usetemplate_y_n)) {
                                echo $usetemplate_y_n;
                            } else {
                                echo 0;
                            } ?>" name="options[usetemplate_y_n]" id="usetemplate_y_n">
<input type="hidden" value="<?php if (!empty($edittemplate_y_n)) {
                                echo $edittemplate_y_n;
                            } else {
                                echo 0;
                            } ?>" name="options[edittemplate_y_n]" id="edittemplate_y_n">
<input type="hidden" value="<?php if (!empty($edittemplate_y_n)) {
                                echo $edittemplate_y_n;
                            } else {
                                echo 'temp_1';
                            } ?>" name="options[current_emplate]" id="current_emplate">