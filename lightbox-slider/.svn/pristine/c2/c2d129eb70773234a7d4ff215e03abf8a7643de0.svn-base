<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
    /**
     * Load Saved Image Gallery settings
     */
    $LBS_Settings  = unserialize( get_option("WL_LBS_Settings") );
    if(count($LBS_Settings)) {
        $LBS_Hover_Animation     = $LBS_Settings['LBS_Hover_Animation'];
        $LBS_Gallery_Layout      = $LBS_Settings['LBS_Gallery_Layout'];
        $LBS_Hover_Color         = $LBS_Settings['LBS_Hover_Color'];
        $LBS_Font_Style          = $LBS_Settings['LBS_Font_Style'];
        $LBS_Image_View_Icon     = $LBS_Settings['LBS_Image_View_Icon'];
		$LBS_Gallery_Title       = $LBS_Settings['LBS_Gallery_Title'];
        $wl_custom_css           = $LBS_Settings['wl_custom_css'];
     } else {    
        $LBS_Hover_Animation     = "flow";
        $LBS_Gallery_Layout      = "col-md-6";
        $LBS_Font_Style          = "Arial";
        $LBS_Image_View_Icon     = "far fa-image";
		$LBS_Gallery_Title		 = "yes";	
        $wl_custom_css           = "";
    }

?>

<script>
jQuery(document).ready(function(){
    var editor = CodeMirror.fromTextArea(document.getElementById("wl-custom-css"), {
        lineNumbers: true,
        styleActiveLine: true,
        matchBrackets: true,
        hint:true,
        theme : 'blackboard',
        lineWrapping: true,
        extraKeys: {"Ctrl-Space": "autocomplete"},
    });
});
jQuery(document).ready(function($){
    jQuery('.my-color-field').wpColorPicker();
});
</script>

<style>
.custnote{
    background-color: rgba(23, 31, 22, 0.64);
    color: #fff;
    width: 324px;
    border-radius: 5px;
    padding-right: 5px;
    padding-left: 5px;
    padding-top: 2px;   
    padding-bottom: 2px;
}
.purchase_btn_div {
    text-align: center;
}
a.demo {
text-align: center;
display: block;
}
.plan-name {
    text-align: center;
}
</style>

<h2><?php esc_html_e("Lightbox Slider Settings", WEBLIZAR_LBS_TEXT_DOMAIN); ?></h2>
<form action="?post_type=lightbox-slider&page=light-box-settings" method="post">
<?php $nonce = wp_create_nonce( 'nonce_save_slider_setting_option' ); ?>
    <input type="hidden" name="security" value="<?php echo esc_attr( $nonce ); ?>">
    <input type="hidden" id="wl_lbs_action" name="wl_lbs_action" value="wl-lbs-save-settings">
    <table class="form-table">
        <tbody>
            <tr>
                <th scope="row"><label><?php esc_html_e("Image Hover Animation", WEBLIZAR_LBS_TEXT_DOMAIN); ?></label></th>
                <td>
                    <select name="wl-hover-animation" id="wl-hover-animation">
                        <optgroup label="Select Animation">
                            <option value="flow" <?php if($LBS_Hover_Animation == 'flow') echo "selected=selected"; ?>><?php esc_html_e("Flow", WEBLIZAR_LBS_TEXT_DOMAIN); ?></option>
                            <!--<option value="stroke" <?php /*if($LBS_Hover_Animation == 'stroke') echo "selected=selected"; */?>>Stroke</option>-->
                        </optgroup>
                    </select>
                    <p class="description"><strong><?php esc_html_e("Choose an animation effect apply on mouse hover.", WEBLIZAR_LBS_TEXT_DOMAIN); ?></strong> ( <?php esc_html_e("Upgrade to pro for get 6 more animation effect in plugin, check", WEBLIZAR_LBS_TEXT_DOMAIN); ?> <a href="http://weblizar.com/lightbox-slider-pro/" target="_new"> <?php esc_html_e("demo", WEBLIZAR_LBS_TEXT_DOMAIN); ?></a> )</p>
                </td>
            </tr>

            <tr>
                <th scope="row"><label><?php esc_html_e("Gallery Layout", WEBLIZAR_LBS_TEXT_DOMAIN); ?></label></th>
                <td>
                    <select name="wl-gallery-layout" id="wl-gallery-layout">
                        <optgroup label="Select Gallery Layout">
                            <option value="col-md-6" <?php if($LBS_Gallery_Layout == 'col-md-6') echo "selected=selected"; ?>><?php esc_html_e("Two Column", WEBLIZAR_LBS_TEXT_DOMAIN); ?></option>
                            <option value="col-md-4" <?php if($LBS_Gallery_Layout == 'col-md-4') echo "selected=selected"; ?>><?php esc_html_e("Three Column", WEBLIZAR_LBS_TEXT_DOMAIN); ?></option>
                        </optgroup>
                    </select>
                    <p class="description"><strong><?php esc_html_e("Choose a column layout for image gallery.", WEBLIZAR_LBS_TEXT_DOMAIN); ?></strong> ( <?php esc_html_e("Upgrade to pro for get three more gallery layout in plugin, check", WEBLIZAR_LBS_TEXT_DOMAIN); ?><a href="http://weblizar.com/lightbox-slider-pro/" target="_new"><?php esc_html_e("demo", WEBLIZAR_LBS_TEXT_DOMAIN); ?></a> )</p>
                </td>
            </tr>
			<tr>
                <th scope="row"><label><?php esc_html_e("Display Gallery Title", WEBLIZAR_LBS_TEXT_DOMAIN); ?></label></th>
                <td>
                    <input type="radio" name="lbs-gallery-title" id="lbs-gallery-title" value="yes" <?php if($LBS_Gallery_Title == 'yes' ) { echo "checked"; } ?>> Yes
                    <input type="radio" name="lbs-gallery-title" id="lbs-gallery-title" value="no" <?php if($LBS_Gallery_Title == 'no' ) { echo "checked"; } ?>> No

                    <p class="description"><strong><?php esc_html_e("Select yes if you want show gallery title .", WEBLIZAR_LBS_TEXT_DOMAIN); ?></strong> </p>
                </td>
            </tr>
            <tr>
                <th scope="row"><label><?php esc_html_e("Hover Color", WEBLIZAR_LBS_TEXT_DOMAIN); ?></label></th>
                <td>
                    <input type="text" name="wl-hover-color" value="<?php if($LBS_Hover_Color){echo $LBS_Hover_Color;} ?>" class="my-color-field" />  
                </td>
            </tr>

            <tr>
                <th scope="row"><label><?php esc_html_e("Image View Icon", WEBLIZAR_LBS_TEXT_DOMAIN); ?></label></th>
                <td>
                    <input type="radio" name="wl-image-view-icon" id="wl-image-view-icon" value="far fa-image"  <?php if($LBS_Image_View_Icon == 'far fa-image' ) { echo "checked"; } ?>> <i class="far fa-image fa-2x"></i>
                    <input type="radio" name="wl-image-view-icon" id="wl-image-view-icon" value="fa-camera" <?php if($LBS_Image_View_Icon == 'fa-camera' ) { echo "checked"; } ?>> <i class="fa fa-camera fa-2x"></i>
                    <input type="radio" name="wl-image-view-icon" id="wl-image-view-icon" value="fa-camera-retro" <?php if($LBS_Image_View_Icon == 'fa-camera-retro' ) { echo "checked"; } ?>> <i class="fa fa-camera-retro fa-2x"></i>
                    <p class="description"><strong><?php esc_html_e("Choose image view icon.", WEBLIZAR_LBS_TEXT_DOMAIN); ?></strong> (<?php esc_html_e("Upgrade to pro for get Unlimited Font Awesome Icon in plugin, check ", WEBLIZAR_LBS_TEXT_DOMAIN); ?><a href="http://weblizar.com/lightbox-slider-pro/" target="_new"><?php esc_html_e("demo", WEBLIZAR_LBS_TEXT_DOMAIN); ?></a> )</p>
                </td>
            </tr>

            <tr>
                <th scope="row"><label><?php esc_html_e("Caption Font Style", WEBLIZAR_LBS_TEXT_DOMAIN); ?></label></th>
                <td>
                    <select  name="wl-font-style" class="standard-dropdown" id="wl-font-style">
                        <optgroup label="Default Fonts">
                        <option value="Arial" <?php selected($LBS_Font_Style, 'Arial' ); ?>> <?php esc_html_e("Arial", WEBLIZAR_LBS_TEXT_DOMAIN); ?></option>
                        <option value="Courier New" <?php selected($LBS_Font_Style, 'Courier New' ); ?>> <?php esc_html_e("Courier New", WEBLIZAR_LBS_TEXT_DOMAIN); ?></option>
                        <option value="cursive" <?php selected($LBS_Font_Style, 'cursive' ); ?>><?php esc_html_e("Cursive", WEBLIZAR_LBS_TEXT_DOMAIN); ?></option>
                        <option value="fantasy" <?php selected($LBS_Font_Style, 'fantasy' ); ?>><?php esc_html_e("Fantasy", WEBLIZAR_LBS_TEXT_DOMAIN); ?></option>
                        <option value="Georgia" <?php selected($LBS_Font_Style, 'Georgia' ); ?>><?php esc_html_e("Georgia", WEBLIZAR_LBS_TEXT_DOMAIN); ?></option>
                        <option value="Grande"<?php selected($LBS_Font_Style, 'Grande' ); ?>> <?php esc_html_e("Grande", WEBLIZAR_LBS_TEXT_DOMAIN); ?></option>
                        <option value="Helvetica Neue" <?php selected($LBS_Font_Style, 'Helvetica Neue' ); ?>><?php esc_html_e("Helvetica Neue", WEBLIZAR_LBS_TEXT_DOMAIN); ?></option>
                        <option value="Impact" <?php selected($LBS_Font_Style, 'Impact' ); ?>> <?php esc_html_e("Impact", WEBLIZAR_LBS_TEXT_DOMAIN); ?></option>
                        <option value="Lucida" <?php selected($LBS_Font_Style, 'Lucida' ); ?>> <?php esc_html_e("Lucida", WEBLIZAR_LBS_TEXT_DOMAIN); ?></option>
                        <option value="Lucida Console"<?php selected($LBS_Font_Style, 'Lucida Console' ); ?>> <?php esc_html_e("Lucida Console", WEBLIZAR_LBS_TEXT_DOMAIN); ?></option>
                        <option value="monospace" <?php selected($LBS_Font_Style, 'monospace' ); ?>> <?php esc_html_e("Monospace", WEBLIZAR_LBS_TEXT_DOMAIN); ?></option>
                        <option value="Open Sans" <?php selected($LBS_Font_Style, 'Open Sans' ); ?>> <?php esc_html_e("Open Sans", WEBLIZAR_LBS_TEXT_DOMAIN); ?></option>
                        <option value="Palatino" <?php selected($LBS_Font_Style, 'Palatino' ); ?>><?php esc_html_e("Palatino", WEBLIZAR_LBS_TEXT_DOMAIN); ?></option>
                        <option value="sans" <?php selected($LBS_Font_Style, 'sans' ); ?>><?php esc_html_e("Sans", WEBLIZAR_LBS_TEXT_DOMAIN); ?></option>
                        <option value="sans-serif" <?php selected($LBS_Font_Style, 'sans-serif' ); ?>> <?php esc_html_e("Sans-Serif", WEBLIZAR_LBS_TEXT_DOMAIN); ?></option>
                        <option value="Tahoma" <?php selected($LBS_Font_Style, 'Tahoma' ); ?>> <?php esc_html_e("Tahoma", WEBLIZAR_LBS_TEXT_DOMAIN); ?></option>
                        <option value="Times New Roman"<?php selected($LBS_Font_Style, 'Times New Roman' ); ?>> <?php esc_html_e("Times New Roman", WEBLIZAR_LBS_TEXT_DOMAIN); ?></option>
                        <option value="Trebuchet MS" <?php selected($LBS_Font_Style, 'Trebuchet MS' ); ?>><?php esc_html_e("Trebuchet MS", WEBLIZAR_LBS_TEXT_DOMAIN); ?></option>
                        <option value="Verdana" <?php selected($LBS_Font_Style, 'Verdana' ); ?>> <?php esc_html_e("Verdana", WEBLIZAR_LBS_TEXT_DOMAIN); ?></option>
                        </optgroup>
                    </select>
                    <p class="description"><strong><?php esc_html_e("Choose a caption font style.", WEBLIZAR_LBS_TEXT_DOMAIN); ?></strong> ( <?php esc_html_e("Upgrade to pro for get 500+ Google fonts in plugin, check", WEBLIZAR_LBS_TEXT_DOMAIN); ?><a href="http://weblizar.com/lightbox-slider-pro/" target="_new"><?php esc_html_e("demo", WEBLIZAR_LBS_TEXT_DOMAIN); ?></a> )</p>
                </td>
            </tr>
			<tr>
                <th scope="row"><label><?php esc_html_e("Lightbox Style", WEBLIZAR_LBS_TEXT_DOMAIN); ?></label></th>
                <td>
                    <select>
                        
                            <option value="col-md-6" ><?php esc_html_e("Nivo box", WEBLIZAR_LBS_TEXT_DOMAIN); ?></option>
                             
                    </select>
                    <p class="description"><strong><?php esc_html_e("Choose a lightbox For gallery. ", WEBLIZAR_LBS_TEXT_DOMAIN); ?></strong> ( <?php esc_html_e("Upgrade to pro for get more 8 lightbox in plugin, check", WEBLIZAR_LBS_TEXT_DOMAIN); ?><a href="http://weblizar.com/lightbox-slider-pro/" target="_new"><?php esc_html_e("demo", WEBLIZAR_LBS_TEXT_DOMAIN); ?></a> )</p>
                </td>
            </tr>
            <tr>
                <th><label ><?php echo "Custom CSS"; ?></label></th>
                <td>
                <textarea class="widefat" id="wl-custom-css" name="wl-custom-css" style="width:50%;height: 125px;" placeholder="Enter custom css here"><?php if(!isset($wl_custom_css)) { echo esc_attr($wl_custom_css = ""); } else { echo esc_html($wl_custom_css);}?></textarea>
                    <p class="description">
                        <?php esc_html_e('Enter any custom css you want to apply on this gallery.',WEBLIZAR_LBS_TEXT_DOMAIN)?><br>
                    </p>
                    <p class="custnote"> <?php esc_html_e("Note: Please Do Not Use", WEBLIZAR_LBS_TEXT_DOMAIN); ?><b><?php esc_html_e("Style", WEBLIZAR_LBS_TEXT_DOMAIN); ?></b> <?php esc_html_e("Tag With Custom CSS", WEBLIZAR_LBS_TEXT_DOMAIN); ?></p>
                      <p class="submit" style="margin-top:20px;">
                        <input type="submit" value="<?php esc_html_e("Save Changes", WEBLIZAR_LBS_TEXT_DOMAIN); ?>" class="button button-primary" id="submit" name="submit">
                    </p>
                </td>

            </tr>

        </tbody>
    </table>
</form>


<div class="plan-name" style="margin-top:40px;">
	<h2 style="border-top: 5px solid #f9f9f9;
padding-top: 20px;"> <?php esc_html_e("Lightbox Slider Pro", WEBLIZAR_LBS_TEXT_DOMAIN); ?></h2>
</div>
<div class="purchase_btn_div" style="margin-top:20px;">
  <a style= "margin-right:10px;" href="http://demo.weblizar.com/lightbox-slider-pro-demo/" target="_blank" class="button button-hero"><?php esc_html_e("View Demo", WEBLIZAR_LBS_TEXT_DOMAIN); ?></a>
	  <a style= "margin-right:10px;" href="http://demo.weblizar.com/lightbox-slider-pro-admin-demo/" target="_blank" class="button button-primary button-hero"> <?php esc_html_e("Try Before Buy", WEBLIZAR_LBS_TEXT_DOMAIN); ?></a>
	  <a style="background-color: #d9534f;
border-color: #d43f3a;" href="https://weblizar.com/plugins/lightbox-slider-pro/" target="_blank" class="button button-primary button-hero"><?php esc_html_e("Upgrade To Pro", WEBLIZAR_LBS_TEXT_DOMAIN); ?></a>
	<a class="demo" href="https://weblizar.com/plugins/lightbox-slider-pro/" target="_new"><img style="margin-top:20px;box-shadow: 0 0 12px 3px #b0b2ab;" src="<?php echo WEBLIZAR_LBS_PLUGIN_URL.'images/lightbox-images.jpg'; ?>" /></a>
    </div>
		
<?php
if(isset($_POST['wl_lbs_action']) && isset($_POST['security'])) {
    if ( ! wp_verify_nonce( $_POST['security'], 'nonce_save_slider_setting_option' ) ) {
        die();}
    $Action = $_POST['wl_lbs_action'];
    //save settings
    if($Action == "wl-lbs-save-settings") {

        $LBS_Hover_Animation     = sanitize_text_field( $_POST['wl-hover-animation'] );
        $LBS_Gallery_Layout      = sanitize_text_field( $_POST['wl-gallery-layout']);
        $LBS_Hover_Color         = sanitize_text_field( $_POST['wl-hover-color'] );
        $LBS_Font_Style          = sanitize_text_field( $_POST['wl-font-style'] );
        $LBS_Image_View_Icon     = sanitize_text_field( $_POST['wl-image-view-icon'] );
	    $LBS_Gallery_Title	     = sanitize_text_field( $_POST['lbs-gallery-title']);
        $wl_custom_css           = sanitize_text_field( $_POST['wl-custom-css'] );

        $SettingsArray = serialize( array(
            'LBS_Hover_Animation' => $LBS_Hover_Animation,
            'LBS_Gallery_Layout' => $LBS_Gallery_Layout,
            'LBS_Hover_Color' => $LBS_Hover_Color,
            'LBS_Hover_Color_Opacity' => 1,
            'LBS_Font_Style' => $LBS_Font_Style,
            'LBS_Image_View_Icon' => $LBS_Image_View_Icon,
			'LBS_Gallery_Title' => $LBS_Gallery_Title,
            'wl_custom_css' => $wl_custom_css,
        ) );

        update_option("WL_LBS_Settings", $SettingsArray);
        echo "<script>location.href = location.href;</script>";
    }
}
?>