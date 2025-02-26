<?php
global $wpdb;
$table_name_animated_Accordion = $wpdb->prefix . 'animated_Accordion';
$table_name_animated_Accordion_content = $wpdb->prefix . 'animated_Accordion_panels';
$ata_id = $_GET['ata_id'];
$id = $_GET['id'];
$action = $_GET['action'];
$animated_Accordion_Name = $wpdb->get_var("SELECT ata_name FROM $table_name_animated_Accordion WHERE ata_id=$ata_id");
$animated_Accordion_panels_num = $wpdb->get_var("SELECT COUNT(ata_id) FROM $table_name_animated_Accordion_content WHERE id_ata_id=$ata_id");
$panel = $wpdb->get_row("SELECT * FROM $table_name_animated_Accordion_content WHERE id=$id");


$imgurl = $panel->image;
$src = preg_match('/<img src=\"(.*?)\"\s*alt=\"(.*?)\"\/>/', $imgurl, $results);
?>



<div class="wrap">
    <h2 style="border-bottom:1px solid #ccc;padding-bottom:20px;">Add New Panel</h2>
     <div style="float:left">
		<a class="btn btn-primary" href="?page=animated-accordion" style="margin-top: 10px;color:#fff;padding:10px;">Back To Accordions</a>
    </div>
    <div style="float:left;position:relative;left:50px;width:200px">
        <button class="btn btn-success" style="margin-top: 10px;" type="submit" id="submit" name="submit">Edit Accordion</button>
        <div id="sending_data" class="display" style="display:none;float:right;width:64px;height:64px;position: relative;top: -10px;">
            <img style="height:100%;width:100%;" src="<?php echo plugins_url('../js/', __FILE__) ?>loading.gif"/>
        </div>
    </div>
    <div style="float:left;width:100%;">
    </div>
        <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal form-label-left" style="padding-top:80px;">
            <input type="hidden" name="panel_id" id="panel_id" value="<?php echo $id; ?>"/>
            <input type="hidden" name="ata_id" id="ata_id" value="<?php echo $ata_id; ?>"/>
            <input type="hidden" name="aaction" id="aaction" value="edit"/>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Animated Accordion Name: 
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="aName" id="aName" value="<?php echo $panel->name ?>"  class="form-control col-md-7 col-xs-12">
                </div>
            </div>
            <div class="container" style="padding-top: 40px;">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="active">
                        <a href="#title" role="tab" data-toggle="tab">
                            <icon class="fa fa-home"></icon> Title
                        </a>
                    </li>
                    <li><a href="#text" role="tab" data-toggle="tab">
                            <i class="fa fa-user"></i> Content Text
                        </a>
                    </li>
                    <li>
                        <a href="#image" role="tab" data-toggle="tab">
                            <i class="fa fa-envelope"></i> Content Image
                        </a>
                    </li>
                    <!-- <li>
                         <a href="#settings" role="tab" data-toggle="tab">
                             <i class="fa fa-cog"></i> Settings
                         </a>
                     </li>-->
                    <li>
                        <a href="#preview-panel" role="tab" data-toggle="tab">
                            <i class="fa fa-cog"></i> Preview
                        </a>
                    </li>

                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade active in" id="title">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Title: 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="aTitle" id="aTitle" value="<?php echo $panel->title ?>"  class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Title Background Color: 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="titleBgColor" id="titleBgColor" value="<?php echo $panel->titleBgColor ?>"  class="cpa-color-picker form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Title Font Size: 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="titleFontSize" id="titleFontSize" value="<?php echo $panel->titleFontSize ?>"  
                                       class=" form-control col-md-7 col-xs-12" style="width: 70px;">&nbsp;px

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Title Section Height: 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="titleSectionHeight" id="titleSectionHeight" value="<?php echo $panel->titleSectionHeight ?>"  
                                       class=" form-control col-md-7 col-xs-12" style="width: 70px;">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Title Font Color: 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="titleFontColor" id="titleFontColor" value="<?php echo $panel->titleFontColor ?>"  class="cpa-color-picker  form-control col-md-7 col-xs-12">

                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Title Border: 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" >
                                <?php
                                $title_border = $panel->titleBorder;
                                $border_var = explode(',', $title_border);
                                $title_Border_width = $border_var[0];
                                $title_Border_style = $border_var[1];
                                $title_Border_color = $border_var[2];
                                ?>
                                <input type="text" name="titleBorderWidth" id="titleBorderWidth"
                                       value="<?php echo $title_Border_width ?>"  
                                       class="form-control col-md-7 col-xs-12" style="width: 80px;">&nbsp;px

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="titleBorderColor" id="titleBorderColor" value="<?php echo $title_Border_color ?>"  class="cpa-color-picker  form-control col-md-7 col-xs-12">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <select id="titleBorderStyle" name="titleBorderStyle">
                                    <?php
                                    switch ($title_Border_style) {
                                        case "solid":
                                            echo '<option value = "solid" selected="selected">solid</option>
                                <option value = "dashed">dashed</option>';
                                            break;
                                        case "dashed":
                                            echo '<option value = "solid">solid</option>
                                <option value = "dashed" selected="selected">dashed</option>';
                                            break;
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="text">
                        <div class="form-group" style="text-align: left !important;">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Text: 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea type="text" name="aText" id="aText" value="" rows="10" cols="100"  class="form-control col-md-7 col-xs-12">
                                    <?php echo $panel->text ?>
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Content Background Color: 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="contentBgColor" id="contentBgColor" value="<?php echo $panel->contentBgColor ?>"  class="cpa-color-picker form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Content Font Size: 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="contentFontSize" id="contentFontSize" value="<?php echo $panel->contentFontSize ?>"  
                                       class=" form-control col-md-7 col-xs-12" style="width: 70px;">&nbsp;px

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Content Font Color:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="contentFontColor" id="contentFontColor" value="<?php echo $panel->contentFontColor ?>"  class="cpa-color-picker  form-control col-md-7 col-xs-12">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Content Border: 
                            </label>
                            <?php
                            $content_border = $panel->contentBorder;
                            $border_var = explode(',', $content_border);
                            $content_Border_width = $border_var[0];
                            $content_Border_style = $border_var[1];
                            $content_Border_Color = $border_var[2];
                            ?>
                            <div class="col-md-6 col-sm-6 col-xs-12" >
                                <input type="text" name="contentBorderWidth" id="contentBorderWidth"
                                       placeholder="width" value="<?php echo $content_Border_width ?>"  
                                       class="form-control col-md-7 col-xs-12" style="width: 80px;">&nbsp;px

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="contentBorderColor" id="contentBorderColor" value="<?php echo $content_Border_Color ?>"  class="cpa-color-picker  form-control col-md-7 col-xs-12">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="contentBorderStyle" name="contentBorderStyle">
                                    <?php
                                    switch ($content_Border_style) {
                                        case "solid":
                                            echo '<option value = "solid" selected="selected">solid</option>
                                              <option value = "dashed">dashed</option>';
                                            break;
                                        case "dashed":
                                            echo '<option value = "solid">solid</option>
                                             <option value = "dashed" selected="selected">dashed</option>';
                                            break;
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="image">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Image: 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="aImage" id="aImage" value="<?php echo $results[1] ?>" class=""  class="regular-text form-control col-md-7 col-xs-12">
                                <input type='button' class="button-primary" value="Upload Image" id="uploadimage"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Image Float</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                $img_float = $panel->image_float;
                                if ($img_float == 'right') {
                                    $f_right = 'checked';
                                }
                                if ($img_float == 'left') {
                                    $f_left = 'checked';
                                }
                                ?>
                                <label >
                                    <input type="radio" name="imgfloat" id="imgfloat" value="right" <?php echo $f_right; ?>> &nbsp; Right &nbsp;
                                </label>
                                <label >
                                    <input type="radio" name="imgfloat" id="imgfloat" value="left" <?php echo $f_left; ?>> Left
                                </label>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Image Size: 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="ImageSize" id="ImageSize" value="<?php echo $panel->ImageSize ?>"  class=" form-control col-md-7 col-xs-12"
                                       style="width: 70px;">&nbsp;px
                            </div>
                        </div>
                    </div>
                    <!-- <div class="tab-pane fade" id="settings">
                         <div class="form-group">
                             <label class="control-label col-md-3 col-sm-3 col-xs-12">Transition in time:
                             </label>
                             <div class="col-md-6 col-sm-6 col-xs-12">
                                 <input type="text" name="animationTimeIn" id="animationTimeIn" value="<?php echo $animation_Time_In ?>"  
                                        class="form-control col-md-7 col-xs-12" style="width: 80px;">&nbsp;sec
     
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label col-md-3 col-sm-3 col-xs-12">Transition out time:
                             </label>
                             <div class="col-md-6 col-sm-6 col-xs-12">
                                 <input type="text" name="animationTimeOut" id="animationTimeOut" value="<?php echo $animation_Time_Out ?>"  
                                        class=" form-control col-md-7 col-xs-12" style="width: 80px;">&nbsp;sec
     
                             </div>
                         </div>
                     </div>-->
                    </form>
                    <div class="tab-pane fade" id="preview-panel">


                        <div  style="position: relative;padding:10px;">
                            <h2 style="border-bottom:1px solid #ccc;padding-bottom:20px;">Preview</h2>
                            <h4 style="padding-bottom:20px;"><span style="color: red">Attention:</span>This preview show the user how colors and borders will be shown on front-end.<br>
                                image  won't show in the size you choose</h4>
                           

                            <div style="padding-bottom:25px;padding-top: 40px;">
                                <div id="preview_section" style="display:none;width:400px;">
                                    <a id="title_section" href="#accordion1" aria-expanded="false" aria-controls="accordion1" class="accordion-title accordionTitle_preview js-accordionTrigger-preview"></a>
                                </div>
                                <div class="accordion-content accordionItem accordionItem_preview is-collapsed" id="accordion1" aria-hidden="true">
                                    <div style="padding-top:40px;">
                                        <p id="content_img" style="padding:5px;"></p>
                                        <p id="content_text"></p>
                                    </div>
                                </div>
                            </div>

                            <input type="button" id="preview" value="preview" onclick="preview_changes">
                        </div> 
                    </div>
                </div>





            </div>
            <script type="text/javascript">
                (function($) {
                    $('#uploadimage').on('click', function() {
                        tb_show('', 'media-upload.php?type=image&TB_iframe=1');

                        window.send_to_editor = function(html)
                        {
                            imgurl = $('img', html).attr('src');
                            $('#aImage').val(imgurl);
                            tb_remove();
                        }

                        return false;
                    });

                })(jQuery);
            </script>
    <?php

