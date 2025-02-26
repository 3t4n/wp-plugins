<?php


// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}


add_action('admin_init', 'asp_sermon_metaboxes');

function asp_meta_admin_scripts()
{
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
}

function asp_meta_admin_styles()
{
    wp_enqueue_style('thickbox');
}

add_action('admin_print_scripts', 'asp_meta_admin_scripts');
add_action('admin_print_styles', 'asp_meta_admin_styles');

function asp_sermon_metaboxes()
{
    // Customize label options
    $sermon_label = get_option('asp_general_sermon_label');
    if (!empty($sermon_label)) {
        $sermon_label = $sermon_label;
        $sermon_label_slug = strtolower("$sermon_label");
    } else {
        $sermon_label = 'Sermon';
        $sermon_label_slug = strtolower("Sermon");
    }
    add_meta_box("asp_sermon_details", "$sermon_label Details", "asp_sermon_details_metabox_fields", "sermons",
        "normal", "high");
}

function asp_sermon_details_metabox_fields()
{
    global $post;

    // Use nonce for verification
    wp_nonce_field('wpp_meta_box_nonce', 'meta_box_nonce');
    $sermonVideoType = get_post_meta($post->ID, 'asp_sermon_video_type_select', true);
    $sermonyoutube = get_post_meta($post->ID, 'asp_sermon_youtube', true);
    $sermonvimeo = get_post_meta($post->ID, 'asp_sermon_vimeo', true);
    $sermonfacebook = get_post_meta($post->ID, 'asp_sermon_facebook', true);
    $sermon_video_embed = get_post_meta($post->ID, 'asp_sermon_video_embed', true);
    $sermonmp4 = get_post_meta($post->ID, 'asp_sermon_mp4', true);
    $sermon_audio_embed = get_post_meta($post->ID, 'asp_sermon_audio_embed', true);
    $sermonpdf = get_post_meta($post->ID, 'asp_sermon_pdf', true);
    $soundcloud = get_post_meta($post->ID, 'asp_sermon_soundcloud', true);
    $sermon_bible_passage = get_post_meta($post->ID, 'asp_sermon_bible_passage', true);
    $sermon_bulletin = get_post_meta($post->ID, 'asp_sermon_bulletin', true);

    // Hide meta field options
    $asp_hide_passage_meta = get_option('asp_misc_passage_meta');
    $asp_hide_pdf_meta = get_option('asp_misc_pdf_meta');
    $asp_hide_youtube_meta = get_option('asp_misc_youtube_meta');
    $asp_hide_vimeo_meta = get_option('asp_misc_vimeo_meta');
    $asp_hide_facebook_meta = get_option('asp_misc_facebook_meta');
    $asp_hide_video_embed_meta = get_option('asp_misc_video_embed_meta');
    $asp_hide_audio_meta = get_option('asp_misc_audio_meta');
    $asp_hide_audio_embed_meta = get_option('asp_misc_audio_embed_meta');
    $asp_hide_soundcloud_meta = get_option('asp_misc_soundcloud_meta');
    $asp_hide_bulletin_meta = get_option('asp_misc_bulletin_meta');

    // Customize label options
    $sermon_label = get_option('asp_general_sermon_label');
    if (!empty($sermon_label)) {
        $sermon_label = $sermon_label;
        $sermon_label_slug = strtolower("$sermon_label");
    } else {
        $sermon_label = 'Sermon';
        $sermon_label_slug = strtolower("Sermon");
    }

    // Meta box table ?>

    <table class="form-table">
        <tbody>

        <tr>
            <p class="asp-sermon-date-alert"><?php echo sprintf( __( "Reminder: You can change the %s date by editing the published date", "advanced-sermons" ), $sermon_label_slug) ?></p>
        </tr>

        <?php do_action('asp_hook_sermon_details_metabox_top'); ?>

        <?php

          $array_video_types_select = [
              "youtube" => [
                  "name" => "YouTube",
                  "condition" => empty($asp_hide_youtube_meta) || $sermonVideoType === 'youtube'
              ],
              "vimeo" => [
                  "name" => "Vimeo",
                  "condition" => empty($asp_hide_vimeo_meta) || $sermonVideoType === 'vimeo'
              ],
              "facebook" => [
                  "name" => "Facebook",
                  "condition" => empty($asp_hide_facebook_meta) || $sermonVideoType === 'facebook'
              ],
              "embed" => [
                  "name" => "Embed",
                  "condition" => empty($asp_hide_video_embed_meta) || $sermonVideoType === 'embed'
              ],
          ];

          ?>

            <?php
            $show_video_settings = false;
            foreach ($array_video_types_select as $type => $details) {
	            if ($details['condition']) {
		            $show_video_settings = true;
		            break;
	            }
            }

            if ($show_video_settings) {
                ?>
            <tr class="asp-meta-box">
                <th style="width: 100% !important;"><h3 style="margin: 0 !important;"><?php _e('Video Settings', 'advanced-sermons') ?></h3></th>
            </tr>
            <?php } ?>

            <!-- Video Type select -->
            <tr class="asp-meta-box <?php if (!empty($asp_hide_youtube_meta) && !empty($asp_hide_vimeo_meta) && !empty($asp_hide_facebook_meta) && !empty($asp_hide_video_embed_meta) ) { echo 'asp-hide-meta-field'; } ?>">
            <th><?php _e('Video Type', 'advanced-sermons') ?></th>
            <td>
                <select name="asp_single_sermon_video_select" id="asp_video_type">
                    <?php foreach ($array_video_types_select as $key => $array): ?>
                        <?php if ($array['condition']): ?>
                            <option <?php selected($sermonVideoType, $key); ?> value="<?php echo $key; ?>"><?php echo $array['name']; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </td>
            </tr>

            <?php
            $asp_check_video_youtube = ($sermonVideoType === 'youtube' || empty($sermonVideoType));
            $asp_check_video_vimeo = ($sermonVideoType === 'vimeo');
            $asp_check_video_facebook = ($sermonVideoType === 'facebook');
            $asp_check_video_embed = ($sermonVideoType === 'embed');

            ?>

            <!-- YouTube Meta Field -->

            <?php $show_youtube_field = $array_video_types_select['youtube']['condition'];
            if ($show_youtube_field) { ?>
            <tr class="asp-single-video-type <?php echo $asp_check_video_youtube ? '' : 'asp-single-video-type-hidden'; ?>"
                data-asp-video-type="youtube">
                <th><?php _e('YouTube Video', 'advanced-sermons') ?></th>
                <td><input type="text" name="sermon_youtube" id="sermon_youtube" value="<?php echo $sermonyoutube; ?>"/>
                    <p>
                        <?php echo sprintf( __( "To add a YouTube or YouTube Live video to your %s, please enter or paste the YouTube URL here.", "advanced-sermons" ), $sermon_label_slug) ?>
                    </p>
                </td>
            </tr>
            <?php } ?>

            <!-- Vimeo Meta Field -->

            <?php $show_vimeo_field = $array_video_types_select['vimeo']['condition'];
            if ($show_vimeo_field) { ?>
            <tr class="asp-single-video-type <?php echo $asp_check_video_vimeo ? '' : 'asp-single-video-type-hidden'; ?>"
                data-asp-video-type="vimeo">
                <th><?php _e('Vimeo Video', 'advanced-sermons') ?></th>
                <td><input type="text" name="sermon_vimeo" id="sermon_vimeo" value="<?php echo $sermonvimeo; ?>"/>
                    <p>
	                    <?php echo sprintf( __( "To add a Vimeo video to your %s, please enter or paste the Vimeo URL here.", "advanced-sermons" ), $sermon_label_slug) ?>
                    </p>
                    <p>
                        <?php echo sprintf( __( "<strong style='color: #555555; font-style: normal;'>How to use start time:</strong> By adding ?t=2m30s to the URL, after the /video ID/, the playback will automatically start at two minutes and thirty seconds.", "advanced-sermons" ), $sermon_label_slug) ?>
                    </p>
                </td>
            </tr>
            <?php } ?>

            <!-- Facebook Meta Field -->

            <?php $show_facebook_field = $array_video_types_select['facebook']['condition'];
            if ($show_facebook_field) { ?>
                <tr class="asp-pro-version asp-meta-box asp-single-video-type <?php echo $asp_check_video_facebook ? '' : 'asp-single-video-type-hidden'; ?>"
                    data-asp-video-type="facebook">
                    <th><?php _e('Facebook Video', 'advanced-sermons') ?></th>
                    <td><input type="text" name="sermon_facebook" id="sermon_facebook"
                               value="<?php echo $sermonfacebook; ?>"/>
                        <p>
	                        <?php echo sprintf( __( "To add a Facebook or Facebook Live video to your %s, please enter or paste the Facebook URL here.", "advanced-sermons" ), $sermon_label_slug) ?>
                        </p>
                    </td>
                </tr>
            <?php } ?>

            <!-- Video Embed Meta Field -->

            <?php $show_embed_field = $array_video_types_select['embed']['condition'];
            if ($show_embed_field) {  ?>
            <tr class="asp-pro-version asp-meta-box asp-single-video-type <?php echo $asp_check_video_embed ? '' : 'asp-single-video-type-hidden'; ?>"
                data-asp-video-type="embed">
                <th><?php _e('Video Embed', 'advanced-sermons') ?></th>
                <td><textarea name="sermon_video_embed" id="sermon_video_embed"><?php echo $sermon_video_embed; ?></textarea>
                    <p>
	                    <?php echo sprintf( __( "To embed a video to your %s, please enter or paste the embed code here.", "advanced-sermons" ), $sermon_label_slug) ?>
                    </p>
                </td>
            </tr>
            <?php } ?>

            <tr class="asp-meta-box">
                <th style="width: 100% !important;"><h3 style="margin: 0 !important;"><?php _e('Audio Settings', 'advanced-sermons') ?></h3></th>
            </tr>

            <!-- Audio Meta Field -->

            <?php if (empty($asp_hide_audio_meta)) { ?>
                <tr>
                    <th><?php _e('Audio File', 'advanced-sermons') ?></th>
                    <td><input type="text" name="sermon_mp4" id="sermon_mp4" value="<?php echo $sermonmp4; ?>"/>
                        <input type="button" name="sermon_mp4_button" id="sermon_mp4_button"
                               value="<?php _e('Add Sermon Audio') ?>"/>
                        <p>
                            <?php echo sprintf( __( "Add or paste an audio file link for this %s. Supported formats: .mp3, .wav, and .ogg", "advanced-sermons" ), $sermon_label_slug); ?>
                        </p>
                    </td>
                </tr>
            <?php } ?>

            <!-- Audio Embed Meta Field -->

            <?php if (empty($asp_hide_audio_embed_meta)) { ?>
                <tr class="asp-pro-version asp-meta-box">
                    <th><?php _e('Audio Embed', 'advanced-sermons') ?></th>
                    <td><textarea name="sermon_audio_embed" id="sermon_audio_embed"><?php echo $sermon_audio_embed; ?></textarea>
                        <p>
                            <?php echo sprintf( __( "Paste a audio embed code for this %s.", "advanced-sermons" ), $sermon_label_slug); ?>
                        </p>
                    </td>
                </tr>
            <?php } ?>

            <!-- SoundCloud Meta Field -->

            <?php if (empty($asp_hide_soundcloud_meta)) { ?>
                <tr>
                    <th><?php _e('SoundCloud', 'advanced-sermons') ?></th>
                    <td><input type="text" name="sermon_soundcloud" id="sermon_soundcloud"
                               value="<?php echo $soundcloud; ?>"/>
                        <p>
                            <?php echo sprintf( __( "Paste a SoundCloud audio URL for this %s. Displays only as a button.", "advanced-sermons" ), $sermon_label_slug); ?>
                        </p>
                    </td>
                </tr>
            <?php } ?>

            <tr class="asp-meta-box">
                <th style="width: 100% !important;"><h3 style="margin: 0 !important;"><?php _e('Resources', 'advanced-sermons') ?></h3></th>
            </tr>

            <!-- Bible Passage Meta Field -->

            <?php if (empty($asp_hide_passage_meta)) { ?>
                <tr class="asp-pro-version asp-meta-box">
                    <th><?php _e('Scripture', 'advanced-sermons') ?></th>
                    <td><input type="text" name="sermon_bible_passage" id="sermon_bible_passage"
                               value="<?php echo $sermon_bible_passage; ?>"/>
                        <p>
                            <?php _e("Enter the scripture for this sermon. Seperate multiple scriptures with a comma. Example: 1 Corinthians 13:4-8, John 3:16",
                                "advanced-sermons") ?>
                        </p>
                    </td>
                </tr>
            <?php } ?>

    		    <!-- Sermon Notes Meta Field -->

            <?php if (empty($asp_hide_pdf_meta)) { ?>
                <tr>
                    <th><?php echo sprintf( __( "%s Notes", "advanced-sermons" ), $sermon_label); ?></th>
                    <td><input type="text" name="sermon_pdf" id="sermon_pdf" value="<?php echo $sermonpdf; ?>"/>
                        <input type="button" name="sermon_pdf_button" id="sermon_pdf_button"
                               value="<?php _e('Add File') ?>"/>
                        <p>
                            <?php echo sprintf( __( "Add or paste a sermon notes file link for this %s.", "advanced-sermons" ), $sermon_label_slug); ?>
                        </p>
                    </td>
                </tr>
            <?php } ?>

            <!-- Bulletin Meta Field -->

            <?php if (empty($asp_hide_bulletin_meta)) { ?>
                <tr class="asp-pro-version asp-meta-box">
                    <th><?php _e("Bulletin", "advanced-sermons") ?></th>
                    <td><input type="text" name="sermon_bulletin" id="sermon_bulletin"
                               value="<?php echo $sermon_bulletin; ?>"/>
                        <input type="button" name="sermon_bulletin_button" id="sermon_bulletin_button"
                               value="<?php _e('Add File') ?>"/>
                        <p>
                            <?php echo sprintf( __( "Add or paste a bulletin file link for this %s.", "advanced-sermons" ), $sermon_label_slug) ?>
                        </p>
                    </td>
                </tr>
            <?php } ?>

            <?php do_action('asp_hook_sermon_details_metabox_bottom'); ?>

    </table>

    <!-- Meta Box JS -->

    <script type="text/javascript">
        function setupUploader(buttonId, fieldId, allowedTypes) {
            var file_frame;
            jQuery(buttonId).on('click', function (event) {
                event.preventDefault();

                // Reuse the existing media frame if it exists
                if (file_frame) {
                    file_frame.open();
                    return;
                }

                // Define the library options based on allowed types
                var libraryOptions = allowedTypes ? { type: allowedTypes } : {};

                // Create the media frame with file type restrictions if specified
                file_frame = wp.media.frames.file_frame = wp.media({
                    title: jQuery(this).data('uploader_title'),
                    button: {
                        text: jQuery(this).data('uploader_button_text'),
                    },
                    library: libraryOptions,
                    multiple: false
                });

                // Callback when a file is selected
                file_frame.on('select', function () {
                    var attachment = file_frame.state().get('selection').first().toJSON();
                    var url = attachment.url;
                    var field = document.getElementById(fieldId);
                    field.value = url;
                });

                // Open the modal
                file_frame.open();
            });
        }

        // Initialize uploaders
        setupUploader('#sermon_mp4_button', 'sermon_mp4', ['audio/mpeg', 'audio/wav', 'audio/ogg']); // For specific audio formats
        setupUploader('#sermon_pdf_button', 'sermon_pdf', null); // For any file type
        setupUploader('#sermon_bulletin_button', 'sermon_bulletin', null); // For any file type
    </script>
    <?php
    wp_nonce_field('c_nonce_field', 'c_wpnonce');
}


// Load allowed HTML for various fields for sanitization
function asp_sermon_details_get_allowed_html() {
	return array(
		'a' => array(
			'href'   => array(),
			'title'  => array(),
			'target' => array(),
			'style'  => array(),
		),
		'iframe' => array(
			'src'             => array(),
			'width'           => array(),
			'height'          => array(),
			'frameborder'     => array(),
			'allowfullscreen' => array(),
			'allow'           => array(),
			'referrerpolicy'  => array(),
			'sandbox'         => array(),
			'title'           => array(),
			'scrolling'       => array(),
			'style'           => array(),
			'id'              => array(), // Added flexibility
		),
		'div' => array(
			'style' => array(),
			'id'    => array(),
			'class' => array(),
			'data-*' => true, // Allow all data attributes, useful for embed scripts
		),
		'audio' => array(
			'src'      => array(),
			'controls' => array(),
			'autoplay' => array(),
			'loop'     => array(),
		),
		'source' => array(
			'src'  => array(),
			'type' => array(),
		),
		'script' => array(
			'src'   => array(),
			'async' => array(),
			'defer' => array(),
			'type'  => array(),
			'id'    => array(),
		),
		'p' => array(
			'style' => array(),
		),
		'span' => array(
			'style' => array(),
			'class' => array(),
		),
	);
}


// Do something with the sermon data entered
add_action('save_post', 'asp_save_sermon_details');
function asp_save_sermon_details($post_id) {
	if (defined("DOING_AJAX") && DOING_AJAX) {
		return;
	}
	if (!current_user_can('edit_post', $post_id)) {
		return;
	}
	if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'wpp_meta_box_nonce')) {
		return;
	}

	$allowed_html = asp_sermon_details_get_allowed_html();

	if (isset($_POST['sermon_youtube'])) {
		update_post_meta($post_id, 'asp_sermon_youtube', wp_kses($_POST['sermon_youtube'], $allowed_html));
	}
	if (isset($_POST['sermon_vimeo'])) {
		update_post_meta($post_id, 'asp_sermon_vimeo', wp_kses($_POST['sermon_vimeo'], $allowed_html));
	}
	if (isset($_POST['sermon_facebook'])) {
		update_post_meta($post_id, 'asp_sermon_facebook', wp_kses($_POST['sermon_facebook'], $allowed_html));
	}
	if (isset($_POST['sermon_video_embed'])) {
		update_post_meta($post_id, 'asp_sermon_video_embed', wp_kses($_POST['sermon_video_embed'], $allowed_html));
	}
	if (isset($_POST['sermon_mp4'])) {
		update_post_meta($post_id, 'asp_sermon_mp4', wp_kses($_POST['sermon_mp4'], $allowed_html));
	}
	if (isset($_POST['sermon_audio_embed'])) {
		update_post_meta($post_id, 'asp_sermon_audio_embed', wp_kses($_POST['sermon_audio_embed'], $allowed_html));
	}
	if (isset($_POST['sermon_soundcloud'])) {
		update_post_meta($post_id, 'asp_sermon_soundcloud', wp_kses($_POST['sermon_soundcloud'], $allowed_html));
	}
	if (isset($_POST['sermon_pdf'])) {
		update_post_meta($post_id, 'asp_sermon_pdf', wp_kses($_POST['sermon_pdf'], $allowed_html));
	}
	if (isset($_POST['sermon_bible_passage'])) {
		update_post_meta($post_id, 'asp_sermon_bible_passage', wp_kses($_POST['sermon_bible_passage'], $allowed_html));
	}
	if (isset($_POST['sermon_bulletin'])) {
		update_post_meta($post_id, 'asp_sermon_bulletin', wp_kses($_POST['sermon_bulletin'], $allowed_html));
	}
	if (isset($_POST['asp_single_sermon_video_select'])) {
		$selected_video_type = $_POST['asp_single_sermon_video_select'];
		$selected_video_type_url = $_POST["sermon_".$selected_video_type];
		update_post_meta($post_id, 'asp_sermon_video_type_select', $selected_video_type);
	}

	do_action('asp_hook_sermon_details_metabox_save');
}
