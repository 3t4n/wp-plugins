<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
class AYSSlides{
	public function add(){
		?>
		<div class="wrap">

			<h2>AYS Slider Properties</h2>
			<form action="" method="POST" enctype="multipart/form-data" style="display:flex;">
                <script src="<?php echo AYS_URL."/includes/ays_admin_js - Add.js";?>"></script>
                <div class="ays_admin_tabs">
                <div class="tabs">
                    <ul class="tab-links">
                        <li class="active"><a href="#tab1">General</a></li>
                        <li><a href="#tab2">Images</a></li>
                        <li><a href="#tab3">Effects</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="tab1" class="tab active">
                            <p>General</p>
                            <table class="ays_main_table">
                                <tr>
                                    <td><label for="nk_slider_name">Slider name:</label></td>
                                    <td><input type="text" id="nk_slider_name" name="nk_slider_name"></td>
                                </tr>
                                <tr>
                                    <td><label for="nk_slider_width">Slider width:</label></td>
                                    <td><input type="number" id="nk_slider_width" name="nk_slider_width">px</td>
                                </tr>
                                <tr>
                                    <td><label for="nk_slider_height">Slider height:</label></td>
                                    <td><input type="number" id="nk_slider_height" name="nk_slider_height">px</td>
                                </tr>
                                <tr>
                                    <td><label for="ays_slide_dur">Slide duration</label></td>
                                    <td><input type="number" id="ays_slide_dur" name="ays_slide_dur"></td>
                                </tr>
                                <tr>
                                    <td style="width:107px;"><label for="ays_el_dur">Element duration</label></td>
                                    <td><input type="number" id="ays_el_dur" name="ays_el_dur"></td>
                                </tr>
                                <tr>
                                    <td><label for="ays_el_del">Element delay</label></td>
                                    <td><input type="number" id="ays_el_del" name="ays_el_del"></td>
                                </tr>
                            </table>
                        </div>
                        <div id="tab2" class="tab">
                            <p>Images</p>
                            <table>
                                <tr>
                                    <td>Upload files:</td>
                                    <td id="nk_uploads">
                                        <div class="ays_nk_main">
                                            <ul id="sortable_pics">
                                                <li class="pics_sort">
                                                    <div class="draggable">
                                                    </div>
                                                    <div class="ays_nk_column">
                                                        <input type="button" value="<?php _e( 'Upload' ); ?>" onclick="openMediaUploader(event,'<?php echo "ays_sl_nk"; ?>');return false;" class="button button-primary"><br>
                                                        <label for="ays_image_url">Data URL: </label><input style="width:100%;" type="url" name="ays_data_url[]" class="ays_image_url" id="ays_image_url"><br><label for="ays_image_text"> Data Text: </label><input style="width:100%;" type="text" name="ays_image_text[]" class="ays_image_text" id="ays_image_text"><br><br>
                                                        <span class="<?php echo "ays_sl_nk"; ?> ays_par" style="padding-left: 10px;"><span class="ays_rem" style="display:none;"></span><img width="500" height="300" class="ays_i"></span>
                                                        <input type="hidden" id="<?php echo "ays_sl_nk"; ?>" name="<?php echo "ays_sl_nk[]"; ?>" value="">
                                                    </div>
                                                </li>
                                                <li class="pics_sort">
                                                    <div class="draggable">
                                                    </div>
                                                    <div class="ays_nk_column">
                                                        <input type="button" value="<?php _e( 'Upload' ); ?>" onclick="openMediaUploader(event,'<?php echo "ays_sl_nk1"; ?>');return false;" class="button button-primary"><br>
                                                        <label for="ays_image_url1">Data URL: </label><input style="width:100%;" type="url" name="ays_data_url[]" class="ays_image_url" id="ays_image_url1"><br><label for="ays_image_text1"> Data Text: </label><input style="width:100%;" type="text" name="ays_image_text[]" class="ays_image_text" id="ays_image_text1"><br><br>
                                                        <span class="<?php echo "ays_sl_nk1"; ?> ays_par" style="padding-left: 10px;"><span class="ays_rem" style="display:none;"></span><img width="500" height="300" class="ays_i"></span>
                                                        <input type="hidden" id="<?php echo "ays_sl_nk1"; ?>" name="<?php echo "ays_sl_nk[]"; ?>" value="">
                                                    </div>
                                                </li>
                                                <li class="pics_sort">
                                                    <div class="draggable">
                                                    </div>
                                                    <div class="ays_nk_column">
                                                        <input type="button" value="<?php _e( 'Upload' ); ?>" onclick="openMediaUploader(event,'<?php echo "ays_sl_nk2"; ?>');return false;" class="button button-primary"><br>
                                                        <label for="ays_image_url2">Data URL: </label><input style="width:100%;" type="url" name="ays_data_url[]" class="ays_image_url" id="ays_image_url2"><br><label for="ays_image_text2"> Data Text: </label><input style="width:100%;" type="text" name="ays_image_text[]" class="ays_image_text" id="ays_image_text2"><br><br>
                                                        <span class="<?php echo "ays_sl_nk2"; ?> ays_par" style="padding-left: 10px;"><span class="ays_rem" style="display:none;"></span><img width="500" height="300" class="ays_i"></span>
                                                        <input type="hidden" id="<?php echo "ays_sl_nk2"; ?>" name="<?php echo "ays_sl_nk[]"; ?>" value="">
                                                    </div>
                                                </li>
                                                <li class="pics_sort">
                                                    <div class="draggable">
                                                    </div>
                                                    <div class="ays_nk_column">
                                                        <input type="button" value="<?php _e( 'Upload' ); ?>" onclick="openMediaUploader(event,'<?php echo "ays_sl_nk3"; ?>');return false;" class="button button-primary"><br>
                                                        <label for="ays_image_url3">Data URL: </label><input style="width:100%;" type="url" name="ays_data_url[]" class="ays_image_url" id="ays_image_url3"><br><label for="ays_image_text3"> Data Text: </label><input style="width:100%;" type="text" name="ays_image_text[]" class="ays_image_text" id="ays_image_text3"><br><br>
                                                        <span class="<?php echo "ays_sl_nk3"; ?> ays_par" style="padding-left: 10px;"><span class="ays_rem" style="display:none;"></span><img width="500" height="300" class="ays_i"></span>
                                                        <input type="hidden" id="<?php echo "ays_sl_nk3"; ?>" name="<?php echo "ays_sl_nk[]"; ?>" value="">
                                                    </div>
                                                </li>
                                                <li class="pics_sort">
                                                    <div class="draggable">
                                                    </div>
                                                    <div class="ays_nk_column">
                                                        <input type="button" value="<?php _e( 'Upload' ); ?>" onclick="openMediaUploader(event,'<?php echo "ays_sl_nk4"; ?>');return false;" class="button button-primary"><br>
                                                        <label for="ays_image_url4">Data URL: </label><input style="width:100%;" type="url" name="ays_data_url[]" class="ays_image_url" id="ays_image_url4"><br><label for="ays_image_text4"> Data Text: </label><input style="width:100%;" type="text" name="ays_image_text[]" class="ays_image_text" id="ays_image_text4"><br><br>
                                                        <span class="<?php echo "ays_sl_nk4"; ?> ays_par" style="padding-left: 10px;"><span class="ays_rem" style="display:none;"></span><img width="500" height="300" class="ays_i"></span>
                                                        <input type="hidden" id="<?php echo "ays_sl_nk4"; ?>" name="<?php echo "ays_sl_nk[]"; ?>" value="">
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                            </table>

                        </div>
                        <div id="tab3" class="tab">
                            <p>Effects</p>
                            <table>
                            <tr>
                                <td><label for="ays_effects">Choose Slide Effects</label></td>
                                <td>
                                <table class="eff_table">
                                    <tr><td><input type="checkbox" id="ays_rand" checked></td><td><label for="ays_rand">Select All</label></td></tr>
                                    <?php
                                        $ays_effects = array("fade","crossfade","fadethroughdark","fadethroughlight","fadethroughtransparent","slideup","slidedown","slideright","slideleft","slidehorizontal","slidevertical","slideoverup","slideoverdown","slideoverright","slideoverleft","slideoverhorizontal","slideoververtical","boxslide","slotslide","slotslide","boxfade","slotfade","slotfade","fadefromright","fadefromleft","fadefromtop","fadefrombottom","fadetoleftfadefromright","fadetorightfadefromleft","fadetotopfadefrombottom","fadetobottomfadefromtop","parallaxtoright","parallaxtoleft","parallaxtotop","parallaxtobottom","parallaxhorizontal","parallaxvertical","slidingoverlayup","slidingoverlaydown","slidingoverlayright","slidingoverlayleft","slidingoverlayhorizontal","slidingoverlayvertical","scaledownfromright","scaledownfromleft","scaledownfromtop","scaledownfrombottom","zoomout","zoomin","slotzoom","slotzoom","curtain","curtain","curtain","3dcurtain-horizontal","3dcurtain-vertical","cube","cube-horizontal","incube","incube-horizontal","turnoff","turnoff-vertical","papercut","flyin","slideremoveup","slideremovedown","slideremoveright","slideremoveleft","slideremovehorizontal","slideremovevertical");
                                        $ays_effects_name = array("Fade","Cross Fade","Fade through Dark BG","Fade through Light BG","Fade through predefined BG","Slide To Top","Slide To Bottom","Slide To Right","Slide To Left","Slide Horizontal (Next/Previous)","Slide Vertical (Next/Previous)","Slide Over To Top","Slide Over To Bottom","Slide Over To Right","Slide Over To Left","Slide Over Horizontal (Next/Previous)","Slide Over Vertical (Next/Previous),","Slide Boxes","Horizontal=>Slide Slots Horizontal","Vertical=>Slide Slots Vertical","Fade Boxes","Horizontal=>Fade Slots Horizontal","Vertical=>Fade Slots Vertical","Fade and Slide from Right","Fade and Slide from Left","Fade and Slide from Top","Fade and Slide from Bottom","To Left From Right","To Right From Left","To Top From Bottom","To Bottom From Top","Parallax to Right","Parallax to Left","Parallax to Top","Parallax to Bottom","Parallax Horizontal","Parallax Vertical","Sliding Overlays to the Top","Sliding Overlays to the Bottom","Sliding Overlays to the Right","Sliding Overlays to the Left","Sliding Overlays Horizontal","Sliding Overlays Vertical","Zoom Out and Fade From Right","Zoom Out and Fade From Left","Zoom Out and Fade From Top","Zoom Out and Fade From Bottom","ZoomOut","ZoomIn","Horizontal=>Zoom Slots Horizontal","Vertical=>Zoom Slots Vertical","Curtain from Left","Curtain from Right","Curtain from Middle","3D Curtain Horizontal","3D Curtain Vertical","Cube Vertical","Cube Horizontal","In Cube Vertical","In Cube Horizontal","TurnOff Horizontal","TurnOff Vertical","Paper Cut","Fly In","Slide Remove To Top","Slide Remove To Bottom","Slide Remove To Right","Slide Remove To Left","Slide Remove Horizontal (Next/Previous)","Slide Remove Vertical (Next/Previous)");
                                        foreach($ays_effects as $ays_index=>$eff)
                                        {

                                           echo '<tr><td><input type="checkbox" name="ays_'.$eff.'" id="ays_'.$eff.'" class="ays_effects" value="'.$eff.'" checked></td>';
                                            echo '<td><label for="ays_'.$eff.'">'.$ays_effects_name[$ays_index].'</label></td></tr>';
                                        }
                                    ?>
                                    <tr>
                                        <td>
                                            <input type="checkbox" id="ays_notransition"value="notransition">
                                        </td>
                                        <td>
                                            <label for="ays_notransition">No Transition</label>
                                        </td>
                                    </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <hr>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="ays_effects">Choose Element Effects</label></td>
                                <td>
                                    <?php
                                        $ays_el_effects = array("Default","Linear.easeNone","Power0.easeIn","Power0.easeInOut","Power0.easeOut","Power1.easeIn","Power1.easeInOut","Power1.easeOut","Power2.easeIn","Power2.easeInOut","Power2.easeOut","Power3.easeIn","Power3.easeInOut","Power3.easeOut","Power4.easeIn","Power4.easeInOut","Power4.easeOut","Quad.easeIn","Quad.easeInOut","Quad.easeOut","Cubic.easeIn","Cubic.easeInOut","Cubic.easeOut","Quart.easeIn","Quart.easeInOut","Quart.easeOut","Quint.easeIn","Quint.easeInOut","Quint.easeOut","Strong.easeIn","Strong.easeInOut","Strong.easeOut","Back.easeIn","Back.easeInOut","Back.easeOut","Bounce.easeIn","Bounce.easeInOut","Bounce.easeOut","Circ.easeIn","Circ.easeInOut","Circ.easeOut","Elastic.easeIn","Elastic.easeInOut","Elastic.easeOut","Expo.easeIn","Expo.easeInOut","Expo.easeOut","Sine.easeIn","Sine.easeInOut","Sine.easeOut","SlowMo.ease");
                                        echo "<select name='nk_ays_el_eff'>";
                                        foreach($ays_el_effects as $el_eff)
                                        {
                                            echo "<option value='".$el_eff."'>".$el_eff."</option>";
                                        }
                                        echo "</select>";
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="ays_caption">Caption Effect</label></td>
                                <td>
                                <?php
                                    $ays_caption_style = array("medium_grey","small_text","medium_text","large_text","very_large_text","very_big_white","very_big_black","modern_medium_fat","modern_medium_fat_white","modern_medium_light","modern_big_bluebg","modern_big_redbg","modern_small_text_dark","thinheadline_dark","thintext_dark","largeblackbg","largepinkbg","largewhitebg","largegreenbg","excerpt","large_bold_grey","medium_thin_grey","small_thin_grey","lightgrey_divider","large_bold_darkblue","medium_bg_darkblue","medium_bold_red","medium_light_red","medium_bg_red","medium_bold_orange","medium_bg_orange","large_bold_white","medium_light_white","mediumlarge_light_white","mediumlarge_light_white_center","medium_bg_asbestos","medium_light_black","large_bold_black","mediumlarge_light_darkblue","small_light_white","large_bg_black","mediumwhitebg");
                                    echo "<select id='ays_caption' name='ays_caption'>";
                                    foreach ($ays_caption_style as $ays_value) {
                                        echo "<option value='".$ays_value."'>".$ays_value."</option>";
                                    }
                                    echo "</select>";
                                ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                    </div>
                </div>
                    <div style="padding:25px;text-align:center;">
                        <input type="submit" class="button-primary" name="nk_save_options" value="<?php echo esc_attr( __("Save","ays")); ?>" />
                        <input type="submit" class="button-primary" name="nk_apply_options" value="<?php echo esc_attr(__("Apply","ays")); ?>" />
                        <input type="submit" class="button-primary" name="nk_cancel_options" value="<?php echo esc_attr(__("Cancel","ays")); ?>" />
                    </div>
                </div>
                <input type="hidden" id="nk_ays_sl_eff" name="nk_ays_sl_eff" value="<?php $utyutyu = implode("***",$ays_effects); echo $utyutyu; ?>">
			</form>
			<script>
				function openMediaUploader(e,id){
                    e.preventDefault();
                    var aysUploader = wp.media({
                        title: 'Upload',
                        button: {
                            text: 'Upload'
                        },
                        multiple: false
                    })
                    .on('select', function() {
                       var attachment = aysUploader.state().get('selection').first().toJSON();
                       jQuery('#' + id).val(attachment.url);
                       jQuery('.' + id + " img").attr("src",attachment.url);
                       jQuery('.' + id + " span").attr("style","display:inline-block;");
					   jQuery('.' + id + " img").fadeIn(1000);
                    })
                    .open();

                    return false;

                }
			</script>
		</div>
		<?php
		if(isset($_POST["nk_save_options"])){
			global $wpdb;
			$table_name = $wpdb->prefix . 'nk_slider_table';
			$slider_name = sanitize_text_field($_POST["nk_slider_name"]);
			$slider_width = intval($_POST["nk_slider_width"]);
			$slider_height = intval($_POST["nk_slider_height"]);
      $slider_caption = sanitize_text_field($_POST["ays_caption"]);
			$date = date("d/m/Y H:i:s",time());
            $ays_sl_up = $_POST["ays_sl_nk"];
            foreach($ays_sl_up as $files_upload){
                if($files_upload!=""){
                    $slider_files.=$files_upload."***";
                }
            }
            $ays_slider_urls = $_POST["ays_data_url"];
            foreach($ays_slider_urls as $ays_urls){
                if($ays_urls!=""){
                    $slider_urls.=$ays_urls."***";
                }
            }
            $ays_slider_text = $_POST["ays_image_text"];
            foreach($ays_slider_text as $texts){
                if($texts !=""){
                    $slider_text.=$texts."***";
                }
            }
			$wpdb->insert(
			$table_name,
			array(
				'slider_name' => $slider_name,
				'slider_date' => $date,
				'slider_width' => intval($slider_width),
				'slider_height' => intval($slider_height),
        'slider_caption' => $slider_caption,
				'slider_files' => $slider_files,
                'slider_urls' => $slider_urls,
                'slider_text' => $slider_text,
				'slider_effects' => $_POST["nk_ays_sl_eff"],
				'element_effects' => $_POST["nk_ays_el_eff"],
				'slide_duration' => intval($_POST["ays_slide_dur"]),
				'element_duration' => intval($_POST["ays_el_dur"]),
				'element_delay' => intval($_POST["ays_el_del"]),
			)
			);
			AYSHelper::ays_redirect("admin.php?page=ayssettings");
		}
        if(isset($_POST["nk_apply_options"])){
            global $wpdb;
            $table_name = $wpdb->prefix . 'nk_slider_table';
            $slider_name = sanitize_text_field($_POST["nk_slider_name"]);
            $slider_caption = sanitize_text_field($_POST["ays_caption"]);
            $slider_width = intval($_POST["nk_slider_width"]);
            $slider_height = intval($_POST["nk_slider_height"]);
            $date = date("d/m/Y H:i:s",time());
            $ays_sl_up = $_POST["ays_sl_nk"];
            foreach($ays_sl_up as $files_upload){
                if($files_upload!=""){
                    $slider_files.=$files_upload."***";
                }
            }
            $ays_slider_urls = $_POST["ays_data_url"];
            foreach($ays_slider_urls as $ays_urls){
                if($ays_urls!=""){
                    $slider_urls.=$ays_urls."***";
                }
            }
            $ays_slider_text = $_POST["ays_image_text"];
            foreach($ays_slider_text as $texts){
                if($texts !=""){
                    $slider_text.=$texts."***";
                }
            }
            $wpdb->insert(
            $table_name,
            array(
                'slider_name' => $slider_name,
                'slider_date' => $date,
                'slider_width' => $slider_width,
                'slider_height' => $slider_height,
                'slider_caption' => $slider_caption,
                'slider_files' => $slider_files,
                'slider_urls' => $slider_urls,
                'slider_text' => $slider_text,
                'slider_effects' => $_POST["nk_ays_sl_eff"],
                'element_effects' => $_POST["nk_ays_el_eff"],
                'slide_duration' => intval($_POST["ays_slide_dur"]),
                'element_duration' => intval($_POST["ays_el_dur"]),
                'element_delay' => intval($_POST["ays_el_del"]),
            )
            );
						$ays_last_id = $wpdb->insert_id;
						AYSHelper::ays_redirect("?page=ayssettings&task=edit&sl_id=".$ays_last_id."");
        }
        if(isset($_POST["nk_cancel_options"])){
            AYSHelper::ays_redirect("?page=ayssettings");
        }
    }

	/****************************************************************************************************************************
	*****************************************************************************************************************************
	****************************************************** EDIT SLIDERS *********************************************************
	*****************************************************************************************************************************
	*****************************************************************************************************************************/
	public function edit(){
		$x = $_GET["sl_id"];
		global $wpdb;
		$table_name = $wpdb->prefix . 'nk_slider_table';
        if(isset($_POST["nk_edit_options"]))
        {
            global $wpdb;
						$table_name = $wpdb->prefix . 'nk_slider_table';
						$slider_name = sanitize_text_field($_POST["nk_slider_name"]);
						$slider_width = intval($_POST["nk_slider_width"]);
			      $slider_caption = sanitize_text_field($_POST["ays_caption"]);
						$slider_height = intval($_POST["nk_slider_height"]);
						$date = date("d/m/Y H:i:s",time());
            $ays_sl_up = $_POST["ays_sl_nk"];
            foreach($ays_sl_up as $files_upload){
                if($files_upload!=""){
                    $slider_files.=$files_upload."***";
                }
            }
            $ays_slider_urls = $_POST["ays_data_url"];
            foreach($ays_slider_urls as $ays_urls){
                if($ays_urls!=""){
                    $slider_urls.=$ays_urls."***";
                }
            }
            $ays_slider_text = $_POST["ays_image_text"];
            foreach($ays_slider_text as $texts){
                if($texts !=""){
                    $slider_text.=$texts."***";
                }
            }
            $wpdb->update(
                $table_name,
                array(
                    'slider_name' => $slider_name,
                    'slider_date' => $date,
                    'slider_width' => $slider_width,
                    'slider_height' => $slider_height,
                    'slider_caption' => $slider_caption,
                    'slider_files' => $slider_files,
                    'slider_urls' => $slider_urls,
                    'slider_text' => $slider_text,
                    'slider_effects' => $_POST["nk_ays_sl_eff"],
                    'element_effects' => $_POST["nk_ays_el_eff"],
                    'slide_duration' => $_POST["ays_slide_dur"],
                    'element_duration' => $_POST["ays_el_dur"],
                    'element_delay' => $_POST["ays_el_del"],
                ),
                array( 'ID' => $x ),
                array(
                    '%s',
                    '%s',
                    '%d',
                    '%d',
                    '%s',
                    '%s',
                    '%s',
                    '%s',
                    '%s',
                    '%s',
                    '%d',
                    '%d',
                    '%d',
                ),
                array( '%d' )
            );
            AYSHelper::ays_redirect("admin.php?page=ayssettings");
        }
        if(isset($_POST["nk_apply_options"]))
        {
            global $wpdb;
			$table_name = $wpdb->prefix . 'nk_slider_table';
			$slider_name = sanitize_text_field($_POST["nk_slider_name"]);
			$slider_width = intval($_POST["nk_slider_width"]);
			$slider_height = intval($_POST["nk_slider_height"]);
            $slider_caption = sanitize_text_field($_POST["ays_caption"]);
			$date = date("d/m/Y H:i:s",time());
            $ays_sl_up = $_POST["ays_sl_nk"];
            foreach($ays_sl_up as $files_upload){
                if($files_upload!=""){
                    $slider_files.=$files_upload."***";
                }
            }
            $ays_slider_urls = $_POST["ays_data_url"];
            foreach($ays_slider_urls as $ays_urls){
                if($ays_urls!=""){
                    $slider_urls.=$ays_urls."***";
                }
            }
            $ays_slider_text = $_POST["ays_image_text"];
            foreach($ays_slider_text as $texts){
                if($texts !=""){
                    $slider_text.=$texts."***";
                }
            }
            $wpdb->update(
                $table_name,
                array(
                    'slider_name' => $slider_name,
                    'slider_date' => $date,
                    'slider_width' => $slider_width,
                    'slider_height' => $slider_height,
                    'slider_caption' => $slider_caption,
                    'slider_files' => $slider_files,
                    'slider_urls' => $slider_urls,
                    'slider_text' => $slider_text,
                    'slider_effects' => $_POST["nk_ays_sl_eff"],
                    'element_effects' => $_POST["nk_ays_el_eff"],
                    'slide_duration' => $_POST["ays_slide_dur"],
                    'element_duration' => $_POST["ays_el_dur"],
                    'element_delay' => $_POST["ays_el_del"],
                ),
                array( 'ID' => $x ),
                array(
                    '%s',
                    '%s',
                    '%d',
                    '%d',
                    '%s',
                    '%s',
                    '%s',
                    '%s',
                    '%s',
                    '%s',
                    '%d',
                    '%d',
                    '%d',
                ),
                array( '%d' )
            );
        }
        if(isset($_POST["nk_cancel_options"]))
        {
            AYSHelper::ays_redirect("admin.php?page=ayssettings");
        }

		$res = $wpdb->get_results("SELECT * FROM ".$table_name." WHERE id=".$x."");
		foreach($res as $results){
		?>
		<div class="wrap">

			<h2>AYS Slider Properties</h2>
			<form action="" method="POST" enctype="multipart/form-data" style="display:flex;">
                <script src="<?php echo AYS_URL."/includes/ays_admin_js - Edit.js";?>"></script>
                <div class="ays_admin_tabs">
                <div class="tabs">
                    <ul class="tab-links">
                        <li class="active"><a href="#tab1">General</a></li>
                        <li><a href="#tab2">Images</a></li>
                        <li><a href="#tab3">Effects</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="tab1" class="tab active">
                            <p>General</p>
                            <table class="ays_main_table">
                                <tr>
                                    <td><label for="nk_slider_name">Slider name:</label></td>
                                    <td><input type="text" id="nk_slider_name" name="nk_slider_name" value="<?php echo esc_attr($results->slider_name); ?>"></td>
                                </tr>
                                <tr>
                                    <td><label for="nk_slider_width">Slider width:</label></td>
                                    <td><input type="number" id="nk_slider_width" name="nk_slider_width" value="<?php echo esc_attr($results->slider_width); ?>">px</td>
                                </tr>
                                <tr>
                                    <td><label for="nk_slider_height">Slider height:</label></td>
                                    <td><input type="number" id="nk_slider_height" name="nk_slider_height" value="<?php echo esc_attr($results->slider_height); ?>">px</td>
                                </tr>
                                <tr>
                                    <td><label for="ays_slide_dur">Slide duration</label></td>
                                    <td><input type="number" id="ays_slide_dur" name="ays_slide_dur" value="<?php echo esc_attr($results->slide_duration); ?>"></td>
                                </tr>
                                <tr>
                                    <td style="width:107px;"><label for="ays_el_dur">Element duration</label></td>
                                    <td><input type="number" id="ays_el_dur" name="ays_el_dur" value="<?php echo esc_attr($results->element_duration); ?>"></td>
                                </tr>
                                <tr>
                                    <td><label for="ays_el_del">Element delay</label></td>
                                    <td><input type="number" id="ays_el_del" name="ays_el_del"  value="<?php echo esc_attr($results->element_delay); ?>"></td>
                                </tr>
                            </table>
                        </div>
                        <div id="tab2" class="tab">
                            <p>Images</p>
                            <table>
                                <tr>
                                    <td>Upload files:</td>
                                    <td id="nk_uploads">
                                        <div class="ays_nk_main">
                                            <ul id="sortable_pics">
                                            <?php
                                            $ays_sl_images = $results->slider_files;
                                            $ays_sl_images_arr = explode("***",$ays_sl_images);
                                            array_pop($ays_sl_images_arr);
                                            $ays_sl_urls = $results->slider_urls;
                                            $ays_sl_urls_arr = explode("***",$ays_sl_urls);
                                            array_pop($ays_sl_urls_arr);
                                            $ays_sl_text = $results->slider_text;
                                            $ays_sl_text_array = explode("***",$ays_sl_text);
                                            array_pop($ays_sl_text_array);
                                            for($a=0;$a<count($ays_sl_images_arr);$a++)
                                            {
                                            ?>
                                                <li class="pics_sort">
                                                    <div class="draggable">
                                                    </div>
                                                    <div class="ays_nk_column">
                                                        <input type="button" value="<?php _e( 'Upload' ); ?>" onclick="openMediaUploader(event,'<?php echo "ays_sl_nk".$a; ?>');return false;" class="button button-primary"><br>
                                                        <label for="ays_image_url<?php echo $a;?>">Data URL: </label><input style="width:100%;" type="text" name="ays_data_url[]" class="ays_image_url" id="ays_image_url" value="<?php echo $ays_sl_urls_arr[$a];?>"><br><label for="ays_image_text"> Data Text: </label><input style="width:100%;" type="text" name="ays_image_text[]" class="ays_image_text" id="ays_image_text" value="<?php echo $ays_sl_text_array[$a] ?>"><br><br>
                                                        <span class="<?php echo "ays_sl_nk".$a; ?> ays_par"><span class="ays_rem"></span><img width="500" height="300" class="ays_i" src="<?php echo $ays_sl_images_arr[$a]; ?>" style="display:block;"></span>
                                                        <input type="hidden" id="<?php echo "ays_sl_nk".$a; ?>" name="<?php echo "ays_sl_nk[]"; ?>" value="<?php echo $ays_sl_images_arr[$a]; ?>">
                                                    </div>
                                                </li>
                                            <?php
                                            }
                                            $utyuk = count($ays_sl_images_arr);
                                            for($b=$utyuk;$b<5;$b++){
                                                ?>
                                                <li class="pics_sort">
                                                    <div class="draggable">
                                                    </div>
                                                    <div class="ays_nk_column">
                                                        <input type="button" value="<?php _e( 'Upload' ); ?>" onclick="openMediaUploader(event,'<?php echo "ays_sl_nk".$b; ?>');return false;" class="button button-primary"><br>
                                                        <label for="ays_image_url<?php echo $b;?>">Data URL: </label><input style="width:100%;" type="text" name="ays_data_url[]" class="ays_image_url" id="ays_image_url"><br><label for="ays_image_text"> Data Text: </label><input style="width:100%;" type="text" name="ays_image_text[]" class="ays_image_text" id="ays_image_text"><br><br>
                                                        <span class="<?php echo "ays_sl_nk".$b; ?>  ays_par"><span class="ays_rem" style="display:none;"></span><img width="500" height="300" class="ays_i"></span>
                                                        <input type="hidden" id="<?php echo "ays_sl_nk".$b; ?>" name="<?php echo "ays_sl_nk[]"; ?>" value="">
                                                    </div>
                                                </li>
                                                <?php
                                            }
                                            ?>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            </table>

                        </div>
                        <div id="tab3" class="tab">
                            <p>Effects</p>
                            <table>
                            <tr>
                                <td><label for="ays_effects">Choose Slide Effects</label></td>
                                <td>
                                    <?php
                                        $ays_effects =array("fade","crossfade","fadethroughdark","fadethroughlight","fadethroughtransparent","slideup","slidedown","slideright","slideleft","slidehorizontal","slidevertical","slideoverup","slideoverdown","slideoverright","slideoverleft","slideoverhorizontal","slideoververtical","boxslide","slotslide","slotslide","boxfade","slotfade","slotfade","fadefromright","fadefromleft","fadefromtop","fadefrombottom","fadetoleftfadefromright","fadetorightfadefromleft","fadetotopfadefrombottom","fadetobottomfadefromtop","parallaxtoright","parallaxtoleft","parallaxtotop","parallaxtobottom","parallaxhorizontal","parallaxvertical","slidingoverlayup","slidingoverlaydown","slidingoverlayright","slidingoverlayleft","slidingoverlayhorizontal","slidingoverlayvertical","scaledownfromright","scaledownfromleft","scaledownfromtop","scaledownfrombottom","zoomout","zoomin","slotzoom","slotzoom","curtain","curtain","curtain","3dcurtain-horizontal","3dcurtain-vertical","cube","cube-horizontal","incube","incube-horizontal","turnoff","turnoff-vertical","papercut","flyin","slideremoveup","slideremovedown","slideremoveright","slideremoveleft","slideremovehorizontal","slideremovevertical");
                                        $ays_effects_name = array("Fade","Cross Fade","Fade through Dark BG","Fade through Light BG","Fade through predefined BG","Slide To Top","Slide To Bottom","Slide To Right","Slide To Left","Slide Horizontal (Next/Previous)","Slide Vertical (Next/Previous)","Slide Over To Top","Slide Over To Bottom","Slide Over To Right","Slide Over To Left","Slide Over Horizontal (Next/Previous)","Slide Over Vertical (Next/Previous),","Slide Boxes","Horizontal=>Slide Slots Horizontal","Vertical=>Slide Slots Vertical","Fade Boxes","Horizontal=>Fade Slots Horizontal","Vertical=>Fade Slots Vertical","Fade and Slide from Right","Fade and Slide from Left","Fade and Slide from Top","Fade and Slide from Bottom","To Left From Right","To Right From Left","To Top From Bottom","To Bottom From Top","Parallax to Right","Parallax to Left","Parallax to Top","Parallax to Bottom","Parallax Horizontal","Parallax Vertical","Sliding Overlays to the Top","Sliding Overlays to the Bottom","Sliding Overlays to the Right","Sliding Overlays to the Left","Sliding Overlays Horizontal","Sliding Overlays Vertical","Zoom Out and Fade From Right","Zoom Out and Fade From Left","Zoom Out and Fade From Top","Zoom Out and Fade From Bottom","ZoomOut","ZoomIn","Horizontal=>Zoom Slots Horizontal","Vertical=>Zoom Slots Vertical","Curtain from Left","Curtain from Right","Curtain from Middle","3D Curtain Horizontal","3D Curtain Vertical","Cube Vertical","Cube Horizontal","In Cube Vertical","In Cube Horizontal","TurnOff Horizontal","TurnOff Vertical","Paper Cut","Fly In","Slide Remove To Top","Slide Remove To Bottom","Slide Remove To Right","Slide Remove To Left","Slide Remove Horizontal (Next/Previous)","Slide Remove Vertical (Next/Previous)");
                                        $selected_effects = $results->slider_effects;
                                        $ays_selected_effects_array = explode("***",$selected_effects);
                                        if(count($ays_selected_effects_array) == 70){
                                            echo '                                    <table class="eff_table">
                                        <tr><td><input type="checkbox" id="ays_rand" checked></td><td><label for="ays_rand">Select All</label></td></tr>';
                                        }
                                        else{
                                             echo '                                    <table class="eff_table">
                                        <tr><td><input type="checkbox" id="ays_rand"></td><td><label for="ays_rand">Select All</label></td></tr>';
                                        }
                                        foreach($ays_effects as $index=>$eff)
                                        {
                                            if(array_search($eff,$ays_selected_effects_array)!==false){
                                                echo '<tr><td><input type="checkbox" name="ays_'.$eff.'" id="ays_'.$eff.'" class="ays_effects" value="'.$eff.'" checked></td>';
                                                echo '<td><label for="ays_'.$eff.'">'.$ays_effects_name[$index].'</label></td></tr>';
                                            }
                                            else{
                                                echo '<tr><td><input type="checkbox" name="ays_'.$eff.'" id="ays_'.$eff.'" class="ays_effects" value="'.$eff.'"></td>';
                                                echo '<td><label for="ays_'.$eff.'">'.$ays_effects_name[$index].'</label></td></tr>';
                                            }
                                        }
                                    ?>
                                    <tr>
                                        <td>
                                            <input type="checkbox" id="ays_notransition"value="notransition">
                                        </td>
                                        <td>
                                            <label for="ays_notransition">No Transition</label>
                                        </td>
                                    </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <hr>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="ays_effects">Choose Element Effects</label></td>
                                <td>
                                    <?php
                                        $ays_el_effects = array("Default","Linear.easeNone","Power0.easeIn","Power0.easeInOut","Power0.easeOut","Power1.easeIn","Power1.easeInOut","Power1.easeOut","Power2.easeIn","Power2.easeInOut","Power2.easeOut","Power3.easeIn","Power3.easeInOut","Power3.easeOut","Power4.easeIn","Power4.easeInOut","Power4.easeOut","Quad.easeIn","Quad.easeInOut","Quad.easeOut","Cubic.easeIn","Cubic.easeInOut","Cubic.easeOut","Quart.easeIn","Quart.easeInOut","Quart.easeOut","Quint.easeIn","Quint.easeInOut","Quint.easeOut","Strong.easeIn","Strong.easeInOut","Strong.easeOut","Back.easeIn","Back.easeInOut","Back.easeOut","Bounce.easeIn","Bounce.easeInOut","Bounce.easeOut","Circ.easeIn","Circ.easeInOut","Circ.easeOut","Elastic.easeIn","Elastic.easeInOut","Elastic.easeOut","Expo.easeIn","Expo.easeInOut","Expo.easeOut","Sine.easeIn","Sine.easeInOut","Sine.easeOut","SlowMo.ease");
                                        $selected_el_effects = $results->element_effects;
                                        $ays_selected_el_eff = explode("***",$selected_el_effects);
                                        echo "<select name='nk_ays_el_eff'>";
                                        foreach($ays_el_effects as $el_eff)
                                        {
                                            if(array_search($el_eff,$ays_selected_el_eff)!==false){
                                                echo '<option value="'.$el_eff.'" selected>'.$el_eff.'</option>';
                                            }
                                            else{
                                                echo '<option value="'.$el_eff.'">'.$el_eff.'</option>';
                                            }
                                        }
                                        echo "</select>";
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <hr>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="ays_caption">Caption Effect</label></td>
                                <td>
                                <?php
                                    $selected_caption_style = $results->slider_caption;
                                    $ays_caption_style = array("medium_grey","small_text","medium_text","large_text","very_large_text","very_big_white","very_big_black","modern_medium_fat","modern_medium_fat_white","modern_medium_light","modern_big_bluebg","modern_big_redbg","modern_small_text_dark","thinheadline_dark","thintext_dark","largeblackbg","largepinkbg","largewhitebg","largegreenbg","excerpt","large_bold_grey","medium_thin_grey","small_thin_grey","lightgrey_divider","large_bold_darkblue","medium_bg_darkblue","medium_bold_red","medium_light_red","medium_bg_red","medium_bold_orange","medium_bg_orange","large_bold_white","medium_light_white","mediumlarge_light_white","mediumlarge_light_white_center","medium_bg_asbestos","medium_light_black","large_bold_black","mediumlarge_light_darkblue","small_light_white","large_bg_black","mediumwhitebg");
                                    echo "<select id='ays_caption' name='ays_caption'>";
                                    foreach ($ays_caption_style as $ays_value) {
                                        if($selected_caption_style == $ays_value){
                                            echo "<option value='".$ays_value."' selected>".$ays_value."</option>";
                                        }
                                        else{
                                            echo "<option value='".$ays_value."'>".$ays_value."</option>";
                                        }
                                    }
                                    echo "</select>";
                                ?>
                                </td>
                            </tr>
                            </table>
                        </div>
                    </div>
                </div>
                    <div style="padding:25px;text-align:center;">
                        <input type="submit" class="button-primary" name="nk_edit_options" value="<?php echo __("Save","ays"); ?>" />
                        <input type="submit" class="button-primary" name="nk_apply_options" value="<?php echo __("Apply","ays"); ?>" />
                        <input type="submit" class="button-primary" name="nk_cancel_options" value="<?php echo __("Cancel","ays"); ?>" />
                    </div>
                </div>
                <input type="hidden" id="nk_ays_sl_eff" name="nk_ays_sl_eff" value="<?php echo $results->slider_effects; ?>">
			</form>
			<script>
				function openMediaUploader(e,id){
                    e.preventDefault();
                    var aysUploader = wp.media({
                        title: 'Upload',
                        button: {
                            text: 'Upload'
                        },
                        multiple: false
                    })
                    .on('select', function() {
                       var attachment = aysUploader.state().get('selection').first().toJSON();
                       jQuery('#' + id).val(attachment.url);
                       jQuery('.' + id + " img").attr("src",attachment.url);
                       jQuery('.' + id + " span").attr("style","display:inline-block;");
					   jQuery('.' + id + " img").fadeIn(1000);
                    })
                    .open();

                    return false;

                }
			</script>
		</div>
		<?php
		}
	}

	/****************************************************************************************************************************
	*****************************************************************************************************************************
	**************************************************** END EDIT SLIDERS *******************************************************
	*****************************************************************************************************************************
	*****************************************************************************************************************************/

	/****************************************************************************************************************************
	*****************************************************************************************************************************
	**************************************************** DISPLAY SLIDERS ********************************************************
	*****************************************************************************************************************************
	*****************************************************************************************************************************/
	public function display_list(){
		?>
		<div class="wrap">
		<h2>AYS Sliders
			<a href = "admin.php?page=ayssettings&task=add" class="add-new-h2 page-title-action"><?php echo __("Add New","ays"); ?></a>
		</h2>
		<script>
			function ays_checkAll(){
				var existing_ids = document.getElementById("ays_hidd_ids").value;
				var existing_ids_array = existing_ids.split("***");
				if(document.getElementById("nk_checkAll").checked == true){
					for(var j = 0;j<existing_ids_array.length;j++){
						document.getElementById("nk_check"+existing_ids_array[j]).checked = true;
					}
				}
				else{
					for(var j = 0;j<existing_ids_array.length;j++){
						document.getElementById("nk_check"+existing_ids_array[j]).checked = false;
					}
				}
			}
		</script>
		<form action="" method="POST">
			<table class = "wp-list-table widefat fixed pages product_table">
				<tr>
					<td style="width:15px"><input type="checkbox" name="nk_checkAll" id="nk_checkAll" onchange="ays_checkAll()"></td>
					<th style="width:20px">ID</th>
					<th style="text-align:center;">Slider Name</th>
					<th style="text-align:center;">Slider Title</th>
                    <th style="text-align:center;">Slider Shortcode</th>
				</tr>
                <tr>
                    <td colspan="5">
                        <hr>
                    </td>
                </tr>
				<?php
					global $wpdb;
					$table_name = $wpdb->prefix . 'nk_slider_table';
					if(isset($_POST["nk_delete_options"])){
						$id_f_delete = explode("***",$_POST["ays_hidd_ids"]);
						foreach($id_f_delete as $deleted_id){
							if(isset($_POST["nk_check".$deleted_id])){
								$wpdb->query(
									  'DELETE  FROM '.$table_name.'
									   WHERE id = "'.$deleted_id.'"
									  '
								);
							}
						}
					}
					$qanak = $wpdb->get_var("SELECT COUNT(*) FROM ".$table_name."");
					$nk_idner = array();
					if($qanak>0){
						$res = $wpdb->get_results("SELECT * FROM ".$table_name."");
						foreach($res as $results){
                            $ays_shortcode_field = '[ays-slider-shortcode id="'.$results->id.'" W="'.$results->slider_width.'" h="'.$results->slider_height.'"]';
							echo "
									<tr>
										<td><input type='checkbox' name='nk_check".$results->id."' id='nk_check".$results->id."'></td>
										<td style='text-align:center;'>".$results->id."</td>
										<td style='text-align:center;'><a href='admin.php?page=ayssettings&task=edit&sl_id=".$results->id."'>".$results->slider_name."</a></td>
										<td style='text-align:center;'>".$results->slider_title."</td>
<td><input type='text' onClick='this.setSelectionRange(0, this.value.length)' style='width:100%;' id='ays_shorcode_field' value='".$ays_shortcode_field."' readonly></td>
									</tr>";
								$nk_idner[] = $results->id;
						}
					}
					else{
						echo "<tr><td colspan='6' align='center'>No Sliders For Review</td></tr>";
					}
					$nk_idner_str = implode("***",$nk_idner);
				?>
			</table>
			<input type="hidden" id="ays_hidd_ids" name="ays_hidd_ids" value="<?php echo $nk_idner_str; ?>">
			<input type="submit" class="button-primary" name="nk_delete_options" value="<?php echo __("Delete","ays"); ?>" style="margin-top:20px;"/>
		</form>
		</div>
		<?php
	}
}
?>
