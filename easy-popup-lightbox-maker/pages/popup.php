<?php
require_once( 'eplm_p_init.php' );
$opj = new eplm_options_control();
if (isset($_GET['id']) && !empty(intval($_GET['id']))) {
    $arr = $opj->eplm_read_popup(intval($_GET['id']));
    extract((array)$arr);
}
$opj = new eplm_options_control();

if (isset($_GET['tid']) && intval($_GET['tid']) != null) {
    $template_id =intval( $_GET['tid']);
}
?>

<div  id="new_pop_div"  >
    <div class="panel-body">
        <div class="form-group col-lg-6 col-sm-4 col-xs-12 wpoc-field" style="display: none;">
            <label for="popup_type_sellect"> Popup Type</label>
            <select name="options[popup_type_sellect]" id="popup_type_sellect">
                <option value="HTML" <?php if (isset($popup_type_sellect) && $popup_type_sellect == 'HTML') echo 'selected="selected"' ?>
                        selected="selected">HTML
                </option>
            </select>
        </div>
        <?php
        if (isset($template_id) && $template_id == 0) {
            echo "<script>
   jQuery('#new_pop_div').css('display', 'none');
    
</script>";
        } else if ((isset($template_id) && $template_id == 6)) {
            ?>
            <?php
            if (isset($pop_text)) {
                //$content = base64_decode($pop_text);
                $content = ($pop_text);
				$video_id = '';
                if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $content, $match)) {
                    $video_id = $match[1];
                }
                $eplm_link= "https://www.youtube.com/watch?v=$video_id";
                $content= $eplm_link;
            } else {
                $content = '';
            }
            ?>
            <div class="form-group " id="html_type">
                <section class="row" id="text_container_1" style="display: block;">
                    <div class="form-group col-lg-12 wpoc-field">
                        <fieldset>
                            <label>YouTube Page URL:</label>
                            <textarea class="form-control" id="pop_text"
                                      name="pop_text"><?php echo $content; ?></textarea>
                        </fieldset>
                    </div>
                    <input type="hidden" id="editorvalu" name="editorvalu">
                </section>
            </div>
            <script>
                $('#save').attr('onClick', 'eplm_saveyoutuopcontent();');
            </script>
        <?php
        }else if((isset($template_id) && $template_id == 7))
        { ?>
        <?php
        if (isset($pop_text)) {
            $content =$pop_text;
        } else {
            $content = '';
        }
        ?>
            <div class="form-group " id="html_type">
                <section class="row" id="text_container_1" style="display: block;">
                    <div class="form-group col-lg-12 wpoc-field">
                        <fieldset>
                            <label>Image URL :</label>
                            <textarea class="form-control" id="pop_text"
                                      name="pop_text"><?php echo $content; ?></textarea>
                        </fieldset>
                        <br/>
                        <div>
                            <?php // do_action( 'media_buttons', 'media_buttons' );
                            $ggg=  eplm_media_selector_settings_page_callback();
                            ?>
                        </div>
                    </div>
                    <input type="hidden" id="editorvalu" name="editorvalu">
                </section>
            </div>
            <script>
                $('#save').attr('onClick', 'eplm_saveyoutuopcontent();');
            </script>
        <?php

        }else

        {
        ?>
            <div class="form-group " id="html_type" >
                <section class="row" id="text_container_1" style="display: block;">
                    <div class="form-group col-lg-12 wpoc-field" >
                        <?php
                        $settings = array(
                            'editor_height' => 200, // In pixels, takes precedence and has no default value
                            'textarea_rows' => 10,  // Has no visible effect if editor_height is set, default is 10
                        );
                        if (isset($pop_text)) {
                           // $content = base64_decode($pop_text);
                            $content = ($pop_text);

                        } else {
                            $content = '';
                        }
                        $editor_id = 'pop_text';
                        wp_editor($content, $editor_id,$settings);
                        ?>
                        <input type="hidden" id="editorvalu" name="editorvalu">
                        <script>
                            $('#save').attr('onClick', 'eplm_savecontent();');
                        </script>
                    </div>
                </section>
            </div>
            <?php
        }
        ?>
    </div>
</div>
<input type="hidden" name="templateid" id="templateid" value="<?php echo $template_id; ?>">
<div class="panel panel-default" id="theam_pop_div" style="background-color: #f2f2f2; display: none;">
    <div class="panel-heading">
        <h3 class="panel-title"><span id="type_title">Popup Template</span></h3>
    </div>
    <div class="panel-body">
        <?php include("eplm_theames.php"); ?>
    </div>
</div>
</div>

