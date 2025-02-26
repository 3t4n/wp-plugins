<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * Load Saved Image Gallery settings
 */
$WL_RG_Settings = unserialize( get_option( "WRP_Portfolio_Settings" ) );
if ( count( $WL_RG_Settings ) ) {
	$WL_Hover_Animation    = $WL_RG_Settings['WL_Hover_Animation'];
	$WL_Gallery_Layout     = $WL_RG_Settings['WL_Gallery_Layout'];
	$WL_Image_Border       = $WL_RG_Settings['WL_Image_Border'];
	$WL_Font_Style         = $WL_RG_Settings['WL_Font_Style'];
	$WL_Masonry_Layout     = $WL_RG_Settings['WL_Masonry_Layout'];
	$WL_Gallery_Title      = $WL_RG_Settings['WL_Gallery_Title'];
	$WL_Zoom_Animation     = $WL_RG_Settings['WL_Zoom_Animation'];
	$WL_Image_Border_Color = $WL_RG_Settings['WL_Image_Border_Color'];
	$WL_Custom_CSS         = $WL_RG_Settings['WL_Custom_CSS'];
} else {
	$WL_Hover_Animation    = "fade";
	$WL_Gallery_Layout     = "col-md-6";
	$WL_Image_Border       = "yes";
	$WL_Font_Style         = "Arial";
	$WL_Masonry_Layout     = "no";
	$WL_Gallery_Title      = "yes";
	$WL_Zoom_Animation     = "yes";
	$WL_Image_Border_Color = "#ffffff";
	$WL_Custom_CSS         = "";
}
?>
    <script>
        jQuery(document).ready(function () {
            var editor = CodeMirror.fromTextArea(document.getElementById("wl-custom-css"), {
                lineNumbers: true,
                styleActiveLine: true,
                matchBrackets: true,
                hint: true,
                theme: 'blackboard',
                lineWrapping: true,
                extraKeys: {"Ctrl-Space": "autocomplete"},
            });
        });
    </script>
    <style type="text/css">
        .rp_settings {
            padding: 25px;
            background-color: white;
            margin-top: 15px;
        }
    </style>
<div class="rp_settings">
    <h2><?php esc_html_e( "Responsive Portfolio Settings", WEBLIZAR_RP_TEXT_DOMAIN ); ?></h2>
    <form action="?post_type=responsive-portfolio&page=image-portfolio-settings" method="post">
        <?php $nonce = wp_create_nonce( 'nonce_save_rp_settings' ); ?>
        <input type="hidden" name="security" value="<?php echo esc_attr( $nonce ); ?>">
        <input type="hidden" id="wrp_action" name="wrp_action" value="wrp-save-settings">
        <table class="form-table">
            <tbody>
            <tr>
                <th scope="row"><label><?php esc_html_e( "Image Hover Animation", WEBLIZAR_RP_TEXT_DOMAIN ); ?></label></th>
                <td>
                    <select name="wl-hover-animation" id="wl-hover-animation">
                        <optgroup label="Select Animation">
                            <option value="fade" <?php if ( $WL_Hover_Animation == 'fade' ) {
								echo "selected=selected";
							} ?>><?php esc_html_e( "Hover From Top", WEBLIZAR_RP_TEXT_DOMAIN ); ?></option>
                        </optgroup>
                    </select>
                    <p class="description"><?php esc_html_e( "Choose an animation effect apply on mouse hover.", WEBLIZAR_RP_TEXT_DOMAIN ); ?></p>
                </td>
            </tr>

            <tr>
                <th scope="row"><label><?php esc_html_e( "Gallery Layout", WEBLIZAR_RP_TEXT_DOMAIN ); ?></label></th>
                <td>
                    <select name="wl-gallery-layout" id="wl-gallery-layout">
                        <optgroup label="Select Gallery Layout">
                            <option value="col-md-6" <?php if ( $WL_Gallery_Layout == 'col-md-6' ) {
								echo "selected=selected";
							} ?>><?php esc_html_e( "Two Column", WEBLIZAR_RP_TEXT_DOMAIN ); ?></option>
                            <option value="col-md-4" <?php if ( $WL_Gallery_Layout == 'col-md-4' ) {
								echo "selected=selected";
							} ?>><?php esc_html_e( "Three Column", WEBLIZAR_RP_TEXT_DOMAIN ); ?></option>
                        </optgroup>
                    </select>
                    <p class="description"><?php esc_html_e( "Choose a column layout for image gallery.", WEBLIZAR_RP_TEXT_DOMAIN ); ?></p>
                </td>
            </tr>

            <tr>
                <th scope="row"><label><?php esc_html_e( "Display Gallery Title", WEBLIZAR_RP_TEXT_DOMAIN ); ?></label></th>
                <td>
                    <input type="radio" name="wl-gallery-title" id="wl-gallery-title" value="yes" <?php if ( $WL_Gallery_Title == 'yes' ) {
						echo "checked";
					} ?>> <?php esc_html_e( "Yes", WEBLIZAR_RP_TEXT_DOMAIN ); ?>
                    <input type="radio" name="wl-gallery-title" id="wl-gallery-title" value="no" <?php if ( $WL_Gallery_Title == 'no' ) {
						echo "checked";
					} ?>> <?php esc_html_e( "No", WEBLIZAR_RP_TEXT_DOMAIN ); ?>
                    <p class="description"><?php esc_html_e( "Select yes if you want show gallery title .", WEBLIZAR_RP_TEXT_DOMAIN ); ?></p>
                </td>
            </tr>
            <tr>
                <th scope="row"><label><?php esc_html_e( "Masonry Layout", WEBLIZAR_RP_TEXT_DOMAIN ); ?></label></th>
                <td>
                    <input type="radio" name="wl-masonry-layout" id="wl-masonry-layout" value="yes" <?php if ( $WL_Masonry_Layout == 'yes' ) {
						echo "checked";
					} ?>> <?php esc_html_e( "Yes", WEBLIZAR_RP_TEXT_DOMAIN ); ?>
                    <input type="radio" name="wl-masonry-layout" id="wl-masonry-layout" value="no" <?php if ( $WL_Masonry_Layout == 'no' ) {
						echo "checked";
					} ?>> <?php esc_html_e( "No", WEBLIZAR_RP_TEXT_DOMAIN ); ?>
                    <p class="description"><?php esc_html_e( "Choose Yes if you want to hide margin between images ", WEBLIZAR_RP_TEXT_DOMAIN ); ?></p>
                </td>
            </tr>

            <tr>
                <th scope="row"><label><?php esc_html_e( "Image Border", WEBLIZAR_RP_TEXT_DOMAIN ); ?></label></th>
                <td>
                    <input type="radio" name="wl-image-border" id="wl-image-border"
                           value="yes" <?php if ( $WL_Image_Border == 'yes' ) {
						echo "checked";
					} ?>> <?php esc_html_e( "Yes", WEBLIZAR_RP_TEXT_DOMAIN ); ?>
                    <input type="radio" name="wl-image-border" id="wl-image-border"
                           value="no" <?php if ( $WL_Image_Border == 'no' ) {
						echo "checked";
					} ?>> <?php esc_html_e( "No", WEBLIZAR_RP_TEXT_DOMAIN ); ?>
                    <p class="description"><?php esc_html_e( "Select yes if you want to show image border ( NOTE : If Masonry Layout is selectd then image border is not visible )", WEBLIZAR_RP_TEXT_DOMAIN ); ?></p>
                </td>
            </tr>

            <tr>
                <th scope="row"><label><?php esc_html_e( 'Image Border Color', WEBLIZAR_RP_TEXT_DOMAIN ); ?></label></th>
                <td>
					<?php if ( $WL_Image_Border_Color == "" ) {
						$WL_Image_Border_Color = "#FFFFFF";
					} ?>
                    <input id="wl-image-border-color" name="wl-image-border-color" type="text" value="<?php echo esc_attr($WL_Image_Border_Color); ?>" class="my-color-field" data-default-color="#ffffff"/>

                </td>
            </tr>

            <tr>
                <th scope="row"><label><?php esc_html_e( "Image Zoom Animation", WEBLIZAR_RP_TEXT_DOMAIN ); ?></label></th>
                <td>
                    <input type="radio" name="wl-zoom-animation" id="wl-zoom-animation" value="yes" <?php if ( $WL_Zoom_Animation == 'yes' ) {
						echo "checked";
					} ?>> <?php esc_html_e( "Yes", WEBLIZAR_RP_TEXT_DOMAIN ); ?>
                    <input type="radio" name="wl-zoom-animation" id="wl-zoom-animation" value="no" <?php if ( $WL_Zoom_Animation == 'no' ) {
						echo "checked";
					} ?>> <?php esc_html_e( "No", WEBLIZAR_RP_TEXT_DOMAIN ); ?>
                    <p class="description"><?php esc_html_e( "Choose Yes if you want to zoom image on hover ", WEBLIZAR_RP_TEXT_DOMAIN ); ?></p>
                </td>
            </tr>

            <tr>
                <th scope="row"><label><?php esc_html_e( "Caption Font Style", WEBLIZAR_RP_TEXT_DOMAIN ); ?></label></th>
                <td>
                    <select name="wl-font-style" class="standard-dropdown" id="wl-font-style">
                        <optgroup label="Default Fonts">
                            <option value="Arial" <?php selected( $WL_Font_Style, 'Arial' ); ?>><?php esc_html_e( "Arial", WEBLIZAR_RP_TEXT_DOMAIN ); ?></option>
                            <option value="Arial Black" <?php selected( $WL_Font_Style, 'Arial Black' ); ?>><?php esc_html_e( "Arial Black", WEBLIZAR_RP_TEXT_DOMAIN ); ?>
                            </option>
                            <option value="Courier New" <?php selected( $WL_Font_Style, 'Courier New' ); ?>><?php esc_html_e( "Courier New", WEBLIZAR_RP_TEXT_DOMAIN ); ?>
                            </option>
                            <option value="cursive" <?php selected( $WL_Font_Style, 'cursive' ); ?>><?php esc_html_e( "cursive", WEBLIZAR_RP_TEXT_DOMAIN ); ?></option>
                            <option value="fantasy" <?php selected( $WL_Font_Style, 'fantasy' ); ?>><?php esc_html_e( "fantasy", WEBLIZAR_RP_TEXT_DOMAIN ); ?></option>
                            <option value="Georgia" <?php selected( $WL_Font_Style, 'Georgia' ); ?>><?php esc_html_e( "Georgia", WEBLIZAR_RP_TEXT_DOMAIN ); ?></option>
                            <option value="Grande"<?php selected( $WL_Font_Style, 'Grande' ); ?>><?php esc_html_e( "Grande", WEBLIZAR_RP_TEXT_DOMAIN ); ?></option>
                            <option value="Helvetica Neue" <?php selected( $WL_Font_Style, 'Helvetica Neue' ); ?>>
                                <?php esc_html_e( "Helvetica Neue", WEBLIZAR_RP_TEXT_DOMAIN ); ?>
                            </option>
                            <option value="Impact" <?php selected( $WL_Font_Style, 'Impact' ); ?>><?php esc_html_e( "Impact", WEBLIZAR_RP_TEXT_DOMAIN ); ?></option>
                            <option value="Lucida" <?php selected( $WL_Font_Style, 'Lucida' ); ?>><?php esc_html_e( "Lucida", WEBLIZAR_RP_TEXT_DOMAIN ); ?></option>
                            <option value="Lucida Console"<?php selected( $WL_Font_Style, 'Lucida Console' ); ?>> <?php esc_html_e( "Lucida Console", WEBLIZAR_RP_TEXT_DOMAIN ); ?>
                            </option>
                            <option value="monospace" <?php selected( $WL_Font_Style, 'monospace' ); ?>> <?php esc_html_e( "Monospace", WEBLIZAR_RP_TEXT_DOMAIN ); ?>
                            </option>
                            <option value="Open Sans" <?php selected( $WL_Font_Style, 'Open Sans' ); ?>><?php esc_html_e( "Open Sans", WEBLIZAR_RP_TEXT_DOMAIN ); ?>
                            </option>
                            <option value="Palatino" <?php selected( $WL_Font_Style, 'Palatino' ); ?>> <?php esc_html_e( "Palatino", WEBLIZAR_RP_TEXT_DOMAIN ); ?></option>
                            <option value="sans" <?php selected( $WL_Font_Style, 'sans' ); ?>> <?php esc_html_e( "Sans", WEBLIZAR_RP_TEXT_DOMAIN ); ?></option>
                            <option value="sans-serif" <?php selected( $WL_Font_Style, 'sans-serif' ); ?>> <?php esc_html_e( "Sans-Serif", WEBLIZAR_RP_TEXT_DOMAIN ); ?>
                            </option>
                            <option value="Tahoma" <?php selected( $WL_Font_Style, 'Tahoma' ); ?>> <?php esc_html_e( "Tahoma", WEBLIZAR_RP_TEXT_DOMAIN ); ?></option>
                            <option value="Times New Roman"<?php selected( $WL_Font_Style, 'Times New Roman' ); ?>> <?php esc_html_e( "Times New Roman", WEBLIZAR_RP_TEXT_DOMAIN ); ?>
                            </option>
                            <option value="Trebuchet MS" <?php selected( $WL_Font_Style, 'Trebuchet MS' ); ?>><?php esc_html_e( "Trebuchet MS", WEBLIZAR_RP_TEXT_DOMAIN ); ?>
                            </option>
                            <option value="Verdana" <?php selected( $WL_Font_Style, 'Verdana' ); ?>><?php esc_html_e( "Verdana", WEBLIZAR_RP_TEXT_DOMAIN ); ?></option>
                        </optgroup>
                    </select>
                    <p class="description"><?php esc_html_e( "Choose a caption font style.", WEBLIZAR_RP_TEXT_DOMAIN ); ?></p>
                </td>
            </tr>

            <tr>
                <th scope="row"><label><?php esc_html_e( 'Custom CSS', WEBLIZAR_RP_TEXT_DOMAIN ) ?></label></th>
                <td>
					<?php if ( ! isset( $WL_Custom_CSS ) ) {
						$WL_Custom_CSS = "";
					} ?>
                    <textarea id="wl-custom-css" name="wl-custom-css" type="text" class="" style="width:80%"><?php echo esc_html($WL_Custom_CSS); ?></textarea>
                    <p class="description">
						<?php esc_html_e( 'Enter any custom css you want to apply on this gallery.', WEBLIZAR_RP_TEXT_DOMAIN ) ?>
                        <br>
                    </p>
                    <p class="custnote"><?php esc_html_e( "Note: Please Do Not Use Style Tag With Custom CSS", WEBLIZAR_RP_TEXT_DOMAIN ); ?></p>
                </td>
            </tr>
            </tbody>
        </table>
        <tr class="submit">
            <input type="submit" value="<?php esc_attr_e( "Save Changes", WEBLIZAR_RP_TEXT_DOMAIN ); ?>" class="button button-primary" id="submit" name="submit">
        </tr>
    </form>
</div>
<?php
if ( isset( $_POST['wrp_action'] ) && isset( $_POST['security'] ) ) {
    if ( ! wp_verify_nonce( $_POST['security'], 'nonce_save_rp_settings' ) ) {
        die();}
	$Action = $_POST['wrp_action'];
	//save settings
	if ( $Action == "wrp-save-settings" ) {
		$WL_Hover_Animation    = sanitize_text_field( $_POST['wl-hover-animation'] );
		$WL_Gallery_Layout     = sanitize_text_field( $_POST['wl-gallery-layout'] );
		$WL_Image_Border       = sanitize_text_field( $_POST['wl-image-border'] );
		$WL_Image_Border_Color = sanitize_text_field( $_POST['wl-image-border-color'] );
		$WL_Font_Style         = sanitize_text_field( $_POST['wl-font-style'] );
		$WL_Masonry_Layout     = sanitize_text_field( $_POST['wl-masonry-layout'] );
		$WL_Gallery_Title      = sanitize_text_field( $_POST['wl-gallery-title'] );
		$WL_Zoom_Animation     = sanitize_text_field( $_POST['wl-zoom-animation'] );
		$WL_Custom_CSS         = $_POST['wl-custom-css'];
		$SettingsArray = serialize( array(
			'WL_Hover_Animation'     => $WL_Hover_Animation,
			'WL_Gallery_Layout'      => $WL_Gallery_Layout,
			'WL_Image_Border'        => $WL_Image_Border,
			'WL_Hover_Color_Opacity' => 1,
			'WL_Font_Style'          => $WL_Font_Style,
			'WL_Masonry_Layout'      => $WL_Masonry_Layout,
			'WL_Gallery_Title'       => $WL_Gallery_Title,
			'WL_Zoom_Animation'      => $WL_Zoom_Animation,
			'WL_Image_Border_Color'  => $WL_Image_Border_Color,
			'WL_Custom_CSS'          => $WL_Custom_CSS,
		) );
		update_option( "WRP_Portfolio_Settings", $SettingsArray );
		echo "<script>location.href = location.href;</script>";
	}
}