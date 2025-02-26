<?php

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

include_once(plugin_dir_path(__FILE__) . 'FCAPItools.php');
$FreecasterAPI = new FCAPItools();

// Get the list of channels accessible by user
try
{
    $channels = $FreecasterAPI->factory->get_channels();
}
catch (Exception $e)
{
    echo $e->getMessage();
}

?>

<link rel='stylesheet' href='<?php echo plugins_url( 'fc_style.css', __FILE__ ) ?>' type='text/css' />

<style>
    #TB_window {
        width: 690px !important;
        height: 475px !important;
    }
    #loader {
        margin-top: 8px;
    }
</style>

<form id="upload_form" method="post" enctype="multipart/form-data" action="<?php echo site_url(); ?>/?fc_ajax=async&type=upload">

    <table class="form-table">
        <tbody>
        <tr>
            <th scope="row"><label for=""><?php _e('Related channel', 'freecaster'); ?></label></th>
            <td>
                <?php
                    echo '<select name="channel">';
                    foreach ($channels as $channel)
                    {
                        echo '<option value="'.$channel->channel_id.'">'.$channel->name.'</option>';
                    }
                    echo '</select>';
                ?>
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="video_title"><?php _e('Video title', 'freecaster'); ?></label></th>
            <td><input type="text" name="video_title" id="video_title" class="regular-text" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="video_file"><?php _e('File to upload', 'freecaster'); ?></label></th>
            <td><input type="file" name="video_file" id="video_file" class="regular-text" /></td>
        </tr>
        </tbody>
    </table>

    <div id="notice-error">
        <img class='notice-icon' src='<?php echo plugins_url( 'img/problem.png', __FILE__ ) ?>' />
        <p class='notice-text'><?php _e('Your form submission seems incomplete', 'freecaster'); ?></p>
        <br style="clear: both;">
    </div>

    <hr style="margin-top: 10px;">

    <table class="form-table">
        <tbody>
        <tr>
            <th scope="row"><label for="fc_playback"><?php _e('Playback', 'freecaster'); ?></label></th>
            <td><input name="fc_playback" type="checkbox" id="fc_playback"><?php _e('Auto play video', 'freecaster'); ?></td>
        </tr>
        <tr>
            <th scope="row"><label for="fc_plwidth"><?php _e('Player width', 'freecaster'); ?></label></th>
            <td><input name="fc_plwidth" type="number" size="6" id="fc_plwidth" aria-describedby="fc_plwidth_desc"> px
                <p class="description" id="fc_plwidth_desc"><?php _e('Sets the player size (default 100%)', 'freecaster'); ?>.</p></td>
        </tr>
        </tbody>
    </table>

    <?php wp_nonce_field('fc_video_upload', 'fc_upload'); ?>

    <br><input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e('Upload video', 'freecaster'); ?>"  /> <img id="loader" src='<?php echo plugin_dir_url( __FILE__ ); ?>img/ajax_loading.gif' />

</form>

<script>

    jQuery(document).ready(function($) {

        $('input[type="checkbox"]').click(function() {

            if ($(this).prop("checked") == true) {
                $(this).attr("checked", "checked");
            }
            else if($(this).prop("checked") == false) {
                $(this).removeAttr("checked");
            }

        });

        $('#upload_form').on('submit', function (e) {

            e.preventDefault();

            var $form = $(this);
            var formdata = (window.FormData) ? new FormData($form[0]) : null;
            var data = (formdata !== null) ? formdata : $form.serialize();

            if ( !$('input#video_title').val() || !$('input#video_file').val() )
            {
                $('#notice-error').fadeIn();
            }
            else
            {
                $('#notice-error').hide();
                $(this).find('#submit').attr('disabled', 'disabled');
                $('#loader').fadeIn();
            }

            $.ajax({

                url: $form.attr('action'),
                type: $form.attr('method'),
                contentType: false,
                processData: false,
                dataType: 'json',
                data: data

            }).success(function(callback) {

                // Get data
                var autoplay = $('#fc_playback').attr("checked");
                var width    = $('#fc_plwidth').val();

                // Arrange for insertion
                if (autoplay == 'checked') { autoplay = "autoplay='true'"; } else { autoplay = "autoplay='false'"; }
                if (!width) { width = "" } else { width = " width=" + width; }

                // Doing the job
                wp.media.editor.insert('[fcplayer id=' + callback.video_id + ' ' + autoplay + width + ']');
                tb_remove();

            });

        });

    });

</script>