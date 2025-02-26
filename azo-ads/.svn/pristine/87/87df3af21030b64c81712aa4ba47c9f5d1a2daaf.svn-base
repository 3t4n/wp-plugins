<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$ads_content_class = 'manage-ads-content';
?>

<!-- AD TYPE CONTENT: BANNER -->
<div class="azo-ads-row <?php echo esc_attr( $ads_content_class ); ?>-wrapper <?php echo esc_attr( $ads_content_class ); ?>-banner">
    <div class="azo-ads-row-inner align-items-top">
        <div class="form-label">
            <label>
                <span><?php esc_html_e( 'Upload your ad banner', 'azo-ads' ); ?></span>
                <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Select the banner image from media library', 'azo-ads' ); ?>" target="_blank"></a>
            </label>
        </div>
        <div class="form-content">
            <div class="<?php echo esc_attr( $ads_content_class ); ?>">
                <?php if ( ! empty( $aa ) && isset( $aa['aa_banner_image'] ) && wp_http_validate_url( $aa['aa_banner_image'] ) ) : ?>
                <div class="azo-ads-upload active">
                    <img src="<?php echo esc_url( $aa['aa_banner_image'] ) ?>" alt="" />
                </div>
                <a href="#" class="azo-ads-upload-remove"><?php esc_html_e( 'Remove image', 'azo-ads' ); ?></a>
                <input type="hidden" name="banner_image" value="<?php echo esc_url( $aa['aa_banner_image'] ); ?>" data-error="<?php esc_html_e( 'You should upload the banner image', 'azo-ads' ); ?>" required>
                <?php else : ?>
                <div class="azo-ads-upload"><?php esc_html_e( 'Upload image', 'azo-ads' ); ?></div>
                <a href="#" class="azo-ads-upload-remove" style="display: none;"><?php esc_html_e( 'Remove image', 'azo-ads' ); ?></a>
                <input type="hidden" name="banner_image" value="" data-error="<?php esc_html_e( 'You should upload the banner image', 'azo-ads' ); ?>" required>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<div class="azo-ads-row <?php echo esc_attr( $ads_content_class ); ?>-wrapper <?php echo esc_attr( $ads_content_class ); ?>-banner">
    <div class="azo-ads-row-inner">
        <div class="form-label">
            <label>
                <span><?php esc_html_e( 'Ad size', 'azo-ads' ); ?></span>
                <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Choose banner image size in width and height', 'azo-ads' ); ?>" target="_blank"></a>
            </label>
        </div>
        <div class="form-content">
            <div class="<?php echo esc_attr( $ads_content_class ); ?> inline">
                <div class="azoads-fbc-inline">
                    <div class="azoads-fbc-wrapper">
                        <span class="azoads-fbc-label"><?php esc_html_e( 'Width (px)', 'azo-ads' ); ?></span>
                        <input type="number" class="azo-ads-form-control ad_size" name="banner_size_width" value="<?php echo ( ! empty( $aa['aa_banner_size_width'] ) ) ? esc_attr( $aa['aa_banner_size_width'] ) : 300; ?>">
                    </div>
                    <div class="azoads-fbc-wrapper">
                        <span class="azoads-fbc-label"><?php esc_html_e( 'Height (px)', 'azo-ads' ); ?></span>
                        <input type="number" class="azo-ads-form-control ad_size" name="banner_size_height" value="<?php echo ( ! empty( $aa['aa_banner_size_height'] ) ) ? esc_attr( $aa['aa_banner_size_height'] ) : 250; ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="azo-ads-row <?php echo esc_attr( $ads_content_class ); ?>-wrapper <?php echo esc_attr( $ads_content_class ); ?>-banner">
    <div class="azo-ads-row-inner">
        <div class="form-label">
            <label>
                <span><?php esc_html_e( 'Ad URL', 'azo-ads' ); ?></span>
                <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'This is the link when visitors click on the banner', 'azo-ads' ); ?>" target="_blank"></a>
            </label>
        </div>
        <div class="form-content">
            <div class="<?php echo esc_attr( $ads_content_class ); ?>">
                <input type="text" class="azo-ads-form-control" name="banner_url" value="<?php echo ( ! empty( $aa['aa_banner_url'] ) ) ? esc_url( $aa['aa_banner_url'] ) : ''; ?>" placeholder="<?php esc_html_e( 'https://', 'azo-ads' ); ?>">
            </div>
        </div>
    </div>
</div>
<div class="azo-ads-row <?php echo esc_attr( $ads_content_class ); ?>-wrapper <?php echo esc_attr( $ads_content_class ); ?>-banner">
    <div class="azo-ads-row-inner">
        <div class="form-label">
            <label>
                <span><?php esc_html_e( 'Add parallax effect on the banner', 'azo-ads' ); ?></span>
                <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Use parallax motion based on your scroll position to give the appearance of depth. The parallax effect creates an illusion of depth and perspective.', 'azo-ads' ); ?>" target="_blank"></a>
            </label>
        </div>
        <div class="form-content">
            <div class="<?php echo esc_attr( $ads_content_class ); ?>">
                <input class="form-check-box" type="checkbox" name="banner_parallax" value="<?php echo ( ! empty( $aa['aa_banner_parallax'] ) ) ? esc_attr( $aa['aa_banner_parallax'] ) : 0; ?>"<?php echo ( isset( $aa['aa_banner_parallax'] ) && ( $aa['aa_banner_parallax'] == 1 ) ) ? ' checked="checked"' : ''; ?>>
            </div>
        </div>
    </div>
</div>
<div class="azo-ads-row <?php echo esc_attr( $ads_content_class ); ?>-wrapper <?php echo esc_attr( $ads_content_class ); ?>-banner">
    <div class="azo-ads-row-inner">
        <div class="form-label">
            <label>
                <span><?php esc_html_e( 'Banner height for the effect', 'azo-ads' ); ?></span>
                <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Select an amount of height from the banner if you turn the parallax effect on', 'azo-ads' ); ?>" target="_blank"></a>
            </label>
        </div>
        <div class="form-content">
            <div class="<?php echo esc_attr( $ads_content_class ); ?>">
            <input type="number" class="azo-ads-form-control" name="banner_parallax_height" value="<?php echo ( ! empty( $aa['aa_banner_parallax_height'] ) ) ? esc_attr( $aa['aa_banner_parallax_height'] ) : 300; ?>">
            </div>
        </div>
    </div>
</div>
<!-- // AD TYPE CONTENT: BANNER -->

<!-- AD TYPE CONTENT: BACKGROUND -->
<div class="azo-ads-row <?php echo esc_attr( $ads_content_class ); ?>-wrapper <?php echo esc_attr( $ads_content_class ); ?>-background">
    <div class="azo-ads-row-inner align-items-top">
        <div class="form-label">
            <label>
                <span><?php esc_html_e( 'Upload your ad background', 'azo-ads' ); ?></span>
                <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Select the background image from media library', 'azo-ads' ); ?>" target="_blank"></a>
            </label>
        </div>
        <div class="form-content">
            <div class="<?php echo esc_attr( $ads_content_class ); ?>">
                <?php if ( ! empty( $aa ) && isset( $aa['aa_background_image'] ) && wp_http_validate_url( $aa['aa_background_image'] ) ) : ?>
                <div class="azo-ads-upload active">
                    <img src="<?php echo esc_url( $aa['aa_background_image'] ) ?>" alt="" />
                </div>
                <a href="#" class="azo-ads-upload-remove"><?php esc_html_e( 'Remove image', 'azo-ads' ); ?></a>
                <input type="hidden" name="background_image" value="<?php echo esc_attr( $aa['aa_background_image'] ) ?>" data-error="<?php esc_html_e( 'You should upload the background image', 'azo-ads' ); ?>" required>
                <?php else : ?>
                <div class="azo-ads-upload"><?php esc_html_e( 'Upload image', 'azo-ads' ); ?></div>
                <a href="#" class="azo-ads-upload-remove" style="display: none;"><?php esc_html_e( 'Remove image', 'azo-ads' ); ?></a>
                <input type="hidden" name="background_image" value="" data-error="<?php esc_html_e( 'You should upload the background image', 'azo-ads' ); ?>" required>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<div class="azo-ads-row <?php echo esc_attr( $ads_content_class ); ?>-wrapper <?php echo esc_attr( $ads_content_class ); ?>-background">
    <div class="azo-ads-row-inner">
        <div class="form-label">
            <label>
                <span><?php esc_html_e( 'Ad URL', 'azo-ads' ); ?></span>
                <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'This is the link when visitors click on the background ad', 'azo-ads' ); ?>" target="_blank"></a>
            </label>
        </div>
        <div class="form-content">
            <div class="<?php echo esc_attr( $ads_content_class ); ?>">
                <input type="text" class="azo-ads-form-control" name="background_url" value="<?php echo ( ! empty( $aa['aa_background_url'] ) ) ? esc_url( $aa['aa_background_url'] ) : ''; ?>" placeholder="<?php esc_html_e( 'https://', 'azo-ads' ); ?>">
            </div>
        </div>
    </div>
</div>
<!-- // AD TYPE CONTENT: BACKGROUND -->

<!-- AD TYPE CONTENT: TEXT HTML JAVASCRIPT -->
<script>
    codeInput.registerTemplate("syntax-highlighted", 
        codeInput.templates.prism(
        Prism, 
        [
            new codeInput.plugins.AutoCloseBrackets(), 
            new codeInput.plugins.Indent( true, 2 ) // 2 spaces indentation
        ]
        )
    );		
</script> 
<div class="azo-ads-row <?php echo esc_attr( $ads_content_class ); ?>-wrapper <?php echo esc_attr( $ads_content_class ); ?>-text-html-javascript">
    <div class="azo-ads-row-inner align-items-top">
        <div class="form-label">
            <label>
                <span><?php esc_html_e( 'Javascript in Header', 'azo-ads' ); ?></span>
                <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Write down your header javascript and remember to wrap your code by <script> tags', 'azo-ads' ); ?>" target="_blank"></a>
            </label>
        </div>
        <div class="form-content">
            <div class="<?php echo esc_attr( $ads_content_class ); ?>">
                <code-input language="JavaScript" placeholder="Type javascript code here" template="syntax-highlighted" name="content_header" class="line-numbers" rows="8"><?php echo ( isset( $aa['aa_content_header'] ) && ! empty( $aa ) ) ? esc_attr( $aa['aa_content_header'] ) : ''; ?></code-input>
            </div>
        </div>
    </div>
</div>
<div class="azo-ads-row <?php echo esc_attr( $ads_content_class ); ?>-wrapper <?php echo esc_attr( $ads_content_class ); ?>-text-html-javascript">
    <div class="azo-ads-row-inner align-items-top">
        <div class="form-label">
            <label>
                <span><?php esc_html_e( 'Input your ad content in textarea', 'azo-ads' ); ?></span>
                <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Write down your ad content. HTML language allowed.', 'azo-ads' ); ?>" target="_blank"></a>
            </label>
        </div>
        <div class="form-content">
            <div class="<?php echo esc_attr( $ads_content_class ); ?>">
                <code-input language="HTML" placeholder="Type ad content here (support HTML)" template="syntax-highlighted" name="content" class="line-numbers" rows="8"><?php echo ( isset( $aa['aa_content'] ) && ! empty( $aa ) ) ? esc_attr( $aa['aa_content'] ) : ''; ?></code-input>
            </div>
        </div>
    </div>
</div>
<div class="azo-ads-row <?php echo esc_attr( $ads_content_class ); ?>-wrapper <?php echo esc_attr( $ads_content_class ); ?>-text-html-javascript">
    <div class="azo-ads-row-inner align-items-top">
        <div class="form-label">
            <label>
                <span><?php esc_html_e( 'Javascript in Footer', 'azo-ads' ); ?></span>
                <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Write down your footer javascript and remember to wrap your code by <script> tags', 'azo-ads' ); ?>" target="_blank"></a>
            </label>
        </div>
        <div class="form-content">
            <div class="<?php echo esc_attr( $ads_content_class ); ?>">
                <code-input language="JavaScript" placeholder="Type javascript code here" template="syntax-highlighted" name="content_footer" class="line-numbers" rows="8"><?php echo ( isset( $aa['aa_content_footer'] ) && ! empty( $aa ) ) ? esc_attr( $aa['aa_content_footer'] ) : ''; ?></code-input>
            </div>
        </div>
    </div>
</div>
<!-- // AD TYPE CONTENT: TEXT HTML JAVASCRIPT -->

<!-- AD TYPE CONTENT: VIDEO -->
<div class="azo-ads-row <?php echo esc_attr( $ads_content_class ); ?>-wrapper <?php echo esc_attr( $ads_content_class ); ?>-video">
    <div class="azo-ads-row-inner align-items-top">
        <div class="form-label">
            <label>
                <span><?php esc_html_e( 'Upload your ad video file', 'azo-ads' ); ?></span>
                <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Select the video file from media library', 'azo-ads' ); ?>" target="_blank"></a>
            </label>
        </div>
        <div class="form-content">
            <div class="<?php echo esc_attr( $ads_content_class ); ?>">
                <?php
                if ( ! empty( $aa ) && isset( $aa['aa_video'] ) && wp_http_validate_url( $aa['aa_video'] ) ) :
                    if ( isset( $aa['aa_video_id'] ) && $aa['aa_video_id'] > 0 ) {
                        $video_data = wp_get_attachment_metadata( $aa['aa_video_id'] );
                    }
                ?>
                <div class="azo-ads-upload video active">
                    <video class="ad-type-video-player" width="<?php echo esc_attr( $video_data['width'] ); ?>" height="<?php echo esc_attr( $video_data['height'] ); ?>" controls><source src="<?php echo esc_url( $aa['aa_video'] ) ?>" type="video/<?php echo esc_attr( $video_data['fileformat'] ); ?>">Your browser does not support the video tag.</video>
                </div>
                <a href="#" class="azo-ads-upload-remove"><?php esc_html_e( 'Remove video', 'azo-ads' ); ?></a>
                <input type="hidden" name="video" value="<?php echo esc_attr( $aa['aa_video'] ) ?>" data-error="<?php esc_html_e( 'You should upload the video file', 'azo-ads' ); ?>" accept="video/*" required>
                <?php else : ?>
                <div class="azo-ads-upload video"><?php esc_html_e( 'Upload video', 'azo-ads' ); ?></div>
                <a href="#" class="azo-ads-upload-remove" style="display: none;"><?php esc_html_e( 'Remove video', 'azo-ads' ); ?></a>
                <input type="hidden" name="video" value="" data-error="<?php esc_html_e( 'You should upload the video file', 'azo-ads' ); ?>" accept="video/*" required>
                <?php endif; ?>
                <input type="hidden" name="video_id" value="<?php echo ( isset( $aa['aa_video_id'] ) ? esc_attr( $aa['aa_video_id'] ) : '' ); ?>">
            </div>
        </div>
    </div>
</div>
<div class="azo-ads-row <?php echo esc_attr( $ads_content_class ); ?>-wrapper <?php echo esc_attr( $ads_content_class ); ?>-video">
    <div class="azo-ads-row-inner">
        <div class="form-label">
            <label>
                <span><?php esc_html_e( 'Ad video URL', 'azo-ads' ); ?></span>
                <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'This is the link when visitors click on the video player', 'azo-ads' ); ?>" target="_blank"></a>
            </label>
        </div>
        <div class="form-content">
            <div class="<?php echo esc_attr( $ads_content_class ); ?>">
                <input type="text" class="azo-ads-form-control" name="video_url" value="<?php echo ( ! empty( $aa['aa_video_url'] ) ) ? esc_url( $aa['aa_video_url'] ) : ''; ?>" placeholder="<?php esc_html_e( 'https://', 'azo-ads' ); ?>">
            </div>
        </div>
    </div>
</div>
<div class="azo-ads-row <?php echo esc_attr( $ads_content_class ); ?>-wrapper <?php echo esc_attr( $ads_content_class ); ?>-video">
    <div class="azo-ads-row-inner">
        <div class="form-label">
            <label>
                <span><?php esc_html_e( 'Video width in pixel', 'azo-ads' ); ?></span>
                <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Set the width size for the video player', 'azo-ads' ); ?>" target="_blank"></a>
            </label>
        </div>
        <div class="form-content">
            <div class="<?php echo esc_attr( $ads_content_class ); ?>">
            <input type="number" class="azo-ads-form-control" name="video_width" value="<?php echo ( ! empty( $aa['aa_video_width'] ) ) ? esc_attr( $aa['aa_video_width'] ) : 360; ?>">
            </div>
        </div>
    </div>
</div>
<!-- // AD TYPE CONTENT: VIDEO -->

<?php if ( defined( 'AZOADS_PRO_VERSION' ) && azoads_activated_pro() ) : ?>
<?php include_once AZOADS_PRO_BASE_PATH . 'views/admin/manage_ads_content.php'; ?>
<?php endif; ?>

<!-- AD TYPE CONTENT: GOOGLE ADSENSE -->
<div class="azo-ads-row <?php echo esc_attr( $ads_content_class ); ?>-wrapper <?php echo esc_attr( $ads_content_class ); ?>-adsense">
    <div class="azo-ads-row-inner">
        <div class="form-label">
            <label>
                <span><?php esc_html_e( 'Select AdSense type', 'azo-ads' ); ?></span>
                <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Choose your AdSense type', 'azo-ads' ); ?>" target="_blank"></a>
            </label>
        </div>
        <div class="form-content">
            <div class="<?php echo esc_attr( $ads_content_class ); ?>">
                <select name="adsense_type" class="azo-ads-dropdown azoads-fbc" data-azoads-fbc="adsense_type" data-control="select2" data-hide-search="true" data-placeholder="Select Option" data-azo-ads-filter="Select Option" data-error="<?php esc_html_e( 'Select an ad', 'azo-ads' ); ?>" required>
                    <?php
                    $adsense_type_arr = array(
                        'auto'              => 'Auto',
                        'display'           => 'Display',
                        'in-article'        => 'In-Article',
                        'in-feed'           => 'In-Feed'
                    );
                    $adsense_type = '';
                    if ( isset( $aa['aa_id'] ) ) {
                        $adsense_type = get_post_meta( $aa['aa_id'], 'aa_adsense_type', true );
                        $adsense_type = $adsense_type ? $adsense_type : 'display';
                    }

                    foreach ( $adsense_type_arr as $key => $value ) :
                    ?>
                    <option value="<?php echo esc_attr( $key ); ?>"<?php echo ( $key == $adsense_type ) ? ' selected' : ''; ?>><?php echo esc_html( $value ); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>
</div>
<div class="azoads-fbc-content azoads-fbc-adsense_type azoads-fbc-in-feed<?php echo ( $adsense_type == 'in-feed' ) ? ' active' : ''; ?>">
    <div class="azo-ads-row <?php echo esc_attr( $ads_content_class ); ?>-wrapper <?php echo esc_attr( $ads_content_class ); ?>-adsense">
        <div class="azo-ads-row-inner">
            <div class="form-label">
                <label>
                    <span><?php esc_html_e( 'Data Layout Key', 'azo-ads' ); ?></span>
                    <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Input your Ad Layout Key', 'azo-ads' ); ?>" target="_blank"></a>
                </label>
            </div>
            <div class="form-content">
                <div class="<?php echo esc_attr( $ads_content_class ); ?>">
                    <input type="text" class="azo-ads-form-control" name="adsense_layout_key" value="<?php echo ( ! empty( $aa['aa_adsense_layout_key'] ) ) ? esc_attr( $aa['aa_adsense_layout_key'] ) : ''; ?>" placeholder="-ez+4c-5n+49+4v">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="azo-ads-row <?php echo esc_attr( $ads_content_class ); ?>-wrapper <?php echo esc_attr( $ads_content_class ); ?>-adsense">
    <div class="azo-ads-row-inner">
        <div class="form-label">
            <label>
                <span><?php esc_html_e( 'Data Ad Client ID', 'azo-ads' ); ?></span>
                <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Input your Ad Client ID', 'azo-ads' ); ?>" target="_blank"></a>
            </label>
        </div>
        <div class="form-content">
            <div class="<?php echo esc_attr( $ads_content_class ); ?>">
                <input type="text" class="azo-ads-form-control" name="adsense_client_id" value="<?php echo ( ! empty( $aa['aa_adsense_client_id'] ) ) ? esc_attr( $aa['aa_adsense_client_id'] ) : ''; ?>" placeholder="ca-pub-2548XXXXXXXXXX12">
            </div>
        </div>
    </div>
</div>
<div class="azo-ads-row <?php echo esc_attr( $ads_content_class ); ?>-wrapper <?php echo esc_attr( $ads_content_class ); ?>-adsense">
    <div class="azo-ads-row-inner">
        <div class="form-label">
            <label>
                <span><?php esc_html_e( 'Data Ad Slot ID', 'azo-ads' ); ?></span>
                <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Input your Ad Slot ID', 'azo-ads' ); ?>" target="_blank"></a>
            </label>
        </div>
        <div class="form-content">
            <div class="<?php echo esc_attr( $ads_content_class ); ?>">
                <input type="number" class="azo-ads-form-control" name="adsense_slot_id" value="<?php echo ( ! empty( $aa['aa_adsense_slot_id'] ) ) ? esc_attr( $aa['aa_adsense_slot_id'] ) : ''; ?>" placeholder="93XXXXXX07">
            </div>
        </div>
    </div>
</div>
<div class="azo-ads-row <?php echo esc_attr( $ads_content_class ); ?>-wrapper <?php echo esc_attr( $ads_content_class ); ?>-adsense">
    <div class="azo-ads-row-inner">
        <div class="form-label">
            <label>
                <span><?php esc_html_e( 'AdSense size', 'azo-ads' ); ?></span>
                <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Set your AdSense size', 'azo-ads' ); ?>" target="_blank"></a>
            </label>
        </div>
        <div class="form-content">
            <div class="<?php echo esc_attr( $ads_content_class ); ?> inline">
                <select name="adsense_size" class="azo-ads-dropdown azoads-fbc" data-azoads-fbc="adsense_size" data-control="select2" data-hide-search="true" data-placeholder="Select Option" data-azo-ads-filter="Select Option" data-error="<?php esc_html_e( 'Select an ad', 'azo-ads' ); ?>" required>
                    <?php
                    $adsense_size_arr = array(
                        'fixed'             => 'Fixed',
                        'responsive'        => 'Responsive',
                    );
                    $adsense_size = '';
                    if ( isset( $aa['aa_id'] ) ) {
                        $adsense_size = get_post_meta( $aa['aa_id'], 'aa_adsense_size', true );
                        $adsense_size = $adsense_size ? $adsense_size : 'responsive';
                    }

                    foreach ( $adsense_size_arr as $key => $value ) :
                    ?>
                    <option value="<?php echo esc_attr( $key ); ?>"<?php echo ( $key == $adsense_size ) ? ' selected' : ''; ?>><?php echo esc_html( $value ); ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="azoads-fbc-content azoads-fbc-adsense_size azoads-fbc-fixed<?php echo ( isset( $aa['aa_adsense_size'] ) && ( $aa['aa_adsense_size'] == 'fixed' ) ) ? ' active' : ''; ?>">
                    <div class="azoads-fbc-inline">
                        <div class="azoads-fbc-wrapper">
                            <span class="azoads-fbc-label"><?php esc_html_e( 'Width (px)', 'azo-ads' ); ?></span>
                            <input type="number" class="azo-ads-form-control ad_size" name="adsense_size_width" value="<?php echo ( ! empty( $aa['aa_adsense_size_width'] ) ) ? esc_attr( $aa['aa_adsense_size_width'] ) : 300; ?>">
                        </div>
                        <div class="azoads-fbc-wrapper">
                            <span class="azoads-fbc-label"><?php esc_html_e( 'Height (px)', 'azo-ads' ); ?></span>
                            <input type="number" class="azo-ads-form-control ad_size" name="adsense_size_height" value="<?php echo ( ! empty( $aa['aa_adsense_size_height'] ) ) ? esc_attr( $aa['aa_adsense_size_height'] ) : 250; ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- // AD TYPE CONTENT: GOOGLE ADSENSE -->

<!-- AD TYPE CONTENT: DOUBLE CLICK -->
<div class="azo-ads-row <?php echo esc_attr( $ads_content_class ); ?>-wrapper <?php echo esc_attr( $ads_content_class ); ?>-double-click">
    <div class="azo-ads-row-inner">
        <div class="form-label">
            <label>
                <span><?php esc_html_e( 'Network code', 'azo-ads' ); ?></span>
                <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Set your network code', 'azo-ads' ); ?>" target="_blank"></a>
            </label>
        </div>
        <div class="form-content">
            <div class="<?php echo esc_attr( $ads_content_class ); ?>">
                <input type="text" class="azo-ads-form-control" name="dc_network_code" value="<?php echo ( ! empty( $aa['aa_dc_network_code'] ) ) ? esc_attr( $aa['aa_dc_network_code'] ) : ''; ?>">
            </div>
        </div>
    </div>
</div>
<div class="azo-ads-row <?php echo esc_attr( $ads_content_class ); ?>-wrapper <?php echo esc_attr( $ads_content_class ); ?>-double-click">
    <div class="azo-ads-row-inner">
        <div class="form-label">
            <label>
                <span><?php esc_html_e( 'Ad unit name', 'azo-ads' ); ?></span>
                <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Input your ad unit name', 'azo-ads' ); ?>" target="_blank"></a>
            </label>
        </div>
        <div class="form-content">
            <div class="<?php echo esc_attr( $ads_content_class ); ?>">
                <input type="text" class="azo-ads-form-control" name="dc_unit_name" value="<?php echo ( ! empty( $aa['aa_dc_unit_name'] ) ) ? esc_attr( $aa['aa_dc_unit_name'] ) : ''; ?>">
            </div>
        </div>
    </div>
</div>
<div class="azo-ads-row <?php echo esc_attr( $ads_content_class ); ?>-wrapper <?php echo esc_attr( $ads_content_class ); ?>-double-click">
    <div class="azo-ads-row-inner">
        <div class="form-label">
            <label>
                <span><?php esc_html_e( 'Ad size', 'azo-ads' ); ?></span>
                <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Set your ad dimension', 'azo-ads' ); ?>" target="_blank"></a>
            </label>
        </div>
        <div class="form-content">
            <div class="<?php echo esc_attr( $ads_content_class ); ?> inline">
                <div class="azoads-fbc-inline">
                    <div class="azoads-fbc-wrapper">
                        <span class="azoads-fbc-label"><?php esc_html_e( 'Width (px)', 'azo-ads' ); ?></span>
                        <input type="number" class="azo-ads-form-control ad_size" name="dc_size_width" value="<?php echo ( ! empty( $aa['aa_dc_size_width'] ) ) ? esc_attr( $aa['aa_dc_size_width'] ) : 300; ?>">
                    </div>
                    <div class="azoads-fbc-wrapper">
                        <span class="azoads-fbc-label"><?php esc_html_e( 'Height (px)', 'azo-ads' ); ?></span>
                        <input type="number" class="azo-ads-form-control ad_size" name="dc_size_height" value="<?php echo ( ! empty( $aa['aa_dc_size_height'] ) ) ? esc_attr( $aa['aa_dc_size_height'] ) : 250; ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- // AD TYPE CONTENT: DOUBLE CLICK -->

<!-- AD TYPE CONTENT: INFOLINKS -->
<div class="azo-ads-row <?php echo esc_attr( $ads_content_class ); ?>-wrapper <?php echo esc_attr( $ads_content_class ); ?>-infolinks">
    <div class="azo-ads-row-inner">
        <div class="form-label">
            <label>
                <span><?php esc_html_e( 'Infolinks PID', 'azo-ads' ); ?></span>
                <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Input Infolinks PID', 'azo-ads' ); ?>" target="_blank"></a>
            </label>
        </div>
        <div class="form-content">
            <div class="<?php echo esc_attr( $ads_content_class ); ?>">
                <input type="text" class="azo-ads-form-control" name="infolinks_pid" value="<?php echo ( ! empty( $aa['aa_infolinks_pid'] ) ) ? esc_attr( $aa['aa_infolinks_pid'] ) : ''; ?>">
            </div>
        </div>
    </div>
</div>
<div class="azo-ads-row <?php echo esc_attr( $ads_content_class ); ?>-wrapper <?php echo esc_attr( $ads_content_class ); ?>-infolinks">
    <div class="azo-ads-row-inner">
        <div class="form-label">
            <label>
                <span><?php esc_html_e( 'Infolinks WSID', 'azo-ads' ); ?></span>
                <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Input Infolinks WSID', 'azo-ads' ); ?>" target="_blank"></a>
            </label>
        </div>
        <div class="form-content">
            <div class="<?php echo esc_attr( $ads_content_class ); ?>">
                <input type="text" class="azo-ads-form-control" name="infolinks_wsid" value="<?php echo ( ! empty( $aa['aa_infolinks_wsid'] ) ) ? esc_attr( $aa['aa_infolinks_wsid'] ) : ''; ?>">
            </div>
        </div>
    </div>
</div>
<!-- // AD TYPE CONTENT: INFOLINKS -->

<!-- AD TYPE CONTENT: MEDIANET -->
<div class="azo-ads-row <?php echo esc_attr( $ads_content_class ); ?>-wrapper <?php echo esc_attr( $ads_content_class ); ?>-medianet">
    <div class="azo-ads-row-inner">
        <div class="form-label">
            <label>
                <span><?php esc_html_e( 'Media.net CID', 'azo-ads' ); ?></span>
                <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Input Media.net CID', 'azo-ads' ); ?>" target="_blank"></a>
            </label>
        </div>
        <div class="form-content">
            <div class="<?php echo esc_attr( $ads_content_class ); ?>">
                <input type="text" class="azo-ads-form-control" name="medianet_cid" value="<?php echo ( ! empty( $aa['aa_medianet_cid'] ) ) ? esc_attr( $aa['aa_medianet_cid'] ) : ''; ?>">
            </div>
        </div>
    </div>
</div>
<div class="azo-ads-row <?php echo esc_attr( $ads_content_class ); ?>-wrapper <?php echo esc_attr( $ads_content_class ); ?>-medianet">
    <div class="azo-ads-row-inner">
        <div class="form-label">
            <label>
                <span><?php esc_html_e( 'Media.net Ad Unit ID', 'azo-ads' ); ?></span>
                <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Input Media.net Ad Unit ID', 'azo-ads' ); ?>" target="_blank"></a>
            </label>
        </div>
        <div class="form-content">
            <div class="<?php echo esc_attr( $ads_content_class ); ?>">
                <input type="text" class="azo-ads-form-control" name="medianet_ad_unit_id" value="<?php echo ( ! empty( $aa['aa_medianet_ad_unit_id'] ) ) ? esc_attr( $aa['aa_medianet_ad_unit_id'] ) : ''; ?>">
            </div>
        </div>
    </div>
</div>
<div class="azo-ads-row <?php echo esc_attr( $ads_content_class ); ?>-wrapper <?php echo esc_attr( $ads_content_class ); ?>-medianet">
    <div class="azo-ads-row-inner">
        <div class="form-label">
            <label>
                <span><?php esc_html_e( 'Ad size', 'azo-ads' ); ?></span>
                <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Set your ad dimension', 'azo-ads' ); ?>" target="_blank"></a>
            </label>
        </div>
        <div class="form-content">
            <div class="<?php echo esc_attr( $ads_content_class ); ?> inline">
                <div class="azoads-fbc-inline">
                    <div class="azoads-fbc-wrapper">
                        <span class="azoads-fbc-label"><?php esc_html_e( 'Width (px)', 'azo-ads' ); ?></span>
                        <input type="number" class="azo-ads-form-control ad_size" name="medianet_size_width" value="<?php echo ( ! empty( $aa['aa_medianet_size_width'] ) ) ? esc_attr( $aa['aa_medianet_size_width'] ) : 300; ?>">
                    </div>
                    <div class="azoads-fbc-wrapper">
                        <span class="azoads-fbc-label"><?php esc_html_e( 'Height (px)', 'azo-ads' ); ?></span>
                        <input type="number" class="azo-ads-form-control ad_size" name="medianet_size_height" value="<?php echo ( ! empty( $aa['aa_medianet_size_height'] ) ) ? esc_attr( $aa['aa_medianet_size_height'] ) : 250; ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- // AD TYPE CONTENT: MEDIANET -->

<!-- AD TYPE CONTENT: MEDIAVINE -->
<div class="azo-ads-row <?php echo esc_attr( $ads_content_class ); ?>-wrapper <?php echo esc_attr( $ads_content_class ); ?>-mediavine">
    <div class="azo-ads-row-inner">
        <div class="form-label">
            <label>
                <span><?php esc_html_e( 'Mediavine Site ID', 'azo-ads' ); ?></span>
                <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Input Mediavine Site ID', 'azo-ads' ); ?>" target="_blank"></a>
            </label>
        </div>
        <div class="form-content">
            <div class="<?php echo esc_attr( $ads_content_class ); ?>">
                <input type="text" class="azo-ads-form-control" name="mediavine_site_id" value="<?php echo ( ! empty( $aa['aa_mediavine_site_id'] ) ) ? esc_attr( $aa['aa_mediavine_site_id'] ) : ''; ?>">
            </div>
        </div>
    </div>
</div>
<!-- // AD TYPE CONTENT: MEDIAVINE -->

<!-- AD TYPE CONTENT: MGID -->
<div class="azo-ads-row <?php echo esc_attr( $ads_content_class ); ?>-wrapper <?php echo esc_attr( $ads_content_class ); ?>-mgid">
    <div class="azo-ads-row-inner">
        <div class="form-label">
            <label>
                <span><?php esc_html_e( 'MGID Container', 'azo-ads' ); ?></span>
                <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Input MGID Container', 'azo-ads' ); ?>" target="_blank"></a>
            </label>
        </div>
        <div class="form-content">
            <div class="<?php echo esc_attr( $ads_content_class ); ?>">
                <input type="text" class="azo-ads-form-control" name="mgid_container" value="<?php echo ( ! empty( $aa['aa_mgid_container'] ) ) ? esc_attr( $aa['aa_mgid_container'] ) : ''; ?>" placeholder="M545671ScriptRootC830765">
            </div>
        </div>
    </div>
</div>
<div class="azo-ads-row <?php echo esc_attr( $ads_content_class ); ?>-wrapper <?php echo esc_attr( $ads_content_class ); ?>-mgid">
    <div class="azo-ads-row-inner">
        <div class="form-label">
            <label>
                <span><?php esc_html_e( 'MGID Js Src', 'azo-ads' ); ?></span>
                <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Input MGID Js Src', 'azo-ads' ); ?>" target="_blank"></a>
            </label>
        </div>
        <div class="form-content">
            <div class="<?php echo esc_attr( $ads_content_class ); ?>">
                <input type="text" class="azo-ads-form-control" name="mgid_js_src" value="<?php echo ( ! empty( $aa['aa_mgid_js_src'] ) ) ? esc_attr( $aa['aa_mgid_js_src'] ) : ''; ?>" placeholder="//jsc.mgid.com/m/g/mgid.com.830765.js">
            </div>
        </div>
    </div>
</div>
<!-- // AD TYPE CONTENT: MGID -->

<!-- AD TYPE CONTENT: OUTBRAIN -->
<div class="azo-ads-row <?php echo esc_attr( $ads_content_class ); ?>-wrapper <?php echo esc_attr( $ads_content_class ); ?>-outbrain">
    <div class="azo-ads-row-inner">
        <div class="form-label">
            <label>
                <span><?php esc_html_e( 'Outbrain Widget IDs', 'azo-ads' ); ?></span>
                <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Input Outbrain Widget IDs', 'azo-ads' ); ?>" target="_blank"></a>
            </label>
        </div>
        <div class="form-content">
            <div class="<?php echo esc_attr( $ads_content_class ); ?>">
                <input type="text" class="azo-ads-form-control" name="outbrain_widget_id" value="<?php echo ( ! empty( $aa['aa_outbrain_widget_id'] ) ) ? esc_attr( $aa['aa_outbrain_widget_id'] ) : ''; ?>" placeholder="WIDGET_ID1,WIDGET_ID2,WIDGET_ID3">
            </div>
        </div>
    </div>
</div>
<!-- // AD TYPE CONTENT: OUTBRAIN -->

<!-- AD TYPE CONTENT: PROPELLER -->
<div class="azo-ads-row <?php echo esc_attr( $ads_content_class ); ?>-wrapper <?php echo esc_attr( $ads_content_class ); ?>-propeller">
    <div class="azo-ads-row-inner">
        <div class="form-label">
            <label>
                <span><?php esc_html_e( 'Propeller Js Code', 'azo-ads' ); ?></span>
                <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Input Propeller Js Code', 'azo-ads' ); ?>" target="_blank"></a>
            </label>
        </div>
        <div class="form-content">
            <div class="<?php echo esc_attr( $ads_content_class ); ?>">
                <input type="text" class="azo-ads-form-control" name="propeller_js" value="<?php echo ( ! empty( $aa['aa_propeller_js'] ) ) ? esc_attr( $aa['aa_propeller_js'] ) : ''; ?>" placeholder="(function(a,b,c,d){...">
            </div>
        </div>
    </div>
</div>
<!-- // AD TYPE CONTENT: PROPELLER -->

<!-- AD TYPE CONTENT: TABOOLA -->
<div class="azo-ads-row <?php echo esc_attr( $ads_content_class ); ?>-wrapper <?php echo esc_attr( $ads_content_class ); ?>-taboola">
    <div class="azo-ads-row-inner">
        <div class="form-label">
            <label>
                <span><?php esc_html_e( 'Taboola Publisher ID', 'azo-ads' ); ?></span>
                <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Input Taboola Publisher ID', 'azo-ads' ); ?>" target="_blank"></a>
            </label>
        </div>
        <div class="form-content">
            <div class="<?php echo esc_attr( $ads_content_class ); ?>">
                <input type="text" class="azo-ads-form-control" name="taboola_publisher_id" value="<?php echo ( ! empty( $aa['aa_taboola_publisher_id'] ) ) ? esc_attr( $aa['aa_taboola_publisher_id'] ) : ''; ?>">
            </div>
        </div>
    </div>
</div>
<!-- // AD TYPE CONTENT: TABOOLA -->

<!-- AD TYPE CONTENT: YANDEX -->
<div class="azo-ads-row <?php echo esc_attr( $ads_content_class ); ?>-wrapper <?php echo esc_attr( $ads_content_class ); ?>-yandex">
    <div class="azo-ads-row-inner">
        <div class="form-label">
            <label>
                <span><?php esc_html_e( 'Yandex Block ID', 'azo-ads' ); ?></span>
                <a class="azo-tooltip" data-azo-tooltip="<?php esc_html_e( 'Input Yandex Block ID', 'azo-ads' ); ?>" target="_blank"></a>
            </label>
        </div>
        <div class="form-content">
            <div class="<?php echo esc_attr( $ads_content_class ); ?>">
                <input type="text" class="azo-ads-form-control" name="yandex_block_id" value="<?php echo ( ! empty( $aa['aa_yandex_block_id'] ) ) ? esc_attr( $aa['aa_yandex_block_id'] ) : ''; ?>" placeholder="C-A-588461-3">
            </div>
        </div>
    </div>
</div>
<!-- // AD TYPE CONTENT: YANDEX -->