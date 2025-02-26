<?php

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

//
// GET SETTINGS FROM WP
//
$apiurl = get_option('fc_apiurl');
$apiusr = get_option('fc_apiusr');
$apikey = get_option('fc_apikey');

//
// VERIFY REQUIRED SETTINGS
//
if (empty($apiurl) OR empty($apiusr) OR empty($apikey)) {

    $mainMsg    = "<img class='notice-icon' src='" . plugins_url( 'img/warning.png', __FILE__ ) . "' />";
    $mainMsg   .= "<p class='notice-text'>" . sprintf( __("To access all your content <b>please encode your settings</b> in the <a href='%s'>options page</a>.<br>You still can include a video directly, using his ID please.", 'freecaster'), get_admin_url() . 'options-general.php?page=freecaster' ) . "</p>";
    $inputState = ""; // enabled
    $inputValue = ""; // ready

} else {
    $mainMsg    = "<p class='notice-text'>" . __('Please enter a reference (ID) or a title in the search box', 'freecaster') . "</p>";
    $inputState = ""; // enabled
    $inputValue = ""; // ready
}

?>

<link rel='stylesheet' href='<?php echo plugins_url( 'fc_style.css', __FILE__ ) ?>' type='text/css' />

<!-- ------------------------ -->
<!--  FORM / TOOLS IN THE BOX -->
<!-- ------------------------ -->

<br/><input type="text" name="search" id="search" size="35" value="<?php echo $inputValue; ?>" style="margin-bottom: 6px;" <?php echo $inputState; ?> /> <img id="loader" src='<?php echo plugin_dir_url( __FILE__ ); ?>img/ajax_loading.gif' />

<hr>

<div id="search_results"><?php echo $mainMsg; ?><img src='<?php echo plugins_url( 'img/background.png', __FILE__ ) ?>' /></div>

<form id="embedder_source" style="display: none;">

    <input type="button" id="fc_plinsert" value="<?php _e('Insert video', 'freecaster'); ?>" class="button button-primary button-large" />

    <br style="clear: both;">
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

</form>

<script>

    jQuery(document).ready(function($) {

        //
        // LIVE SEARCH
        //
        var xhr;

        $("#search").keyup(function() {

            // INIT
            var search = $(this).val();
            $('#search_results').html('');
            $("embedder").remove();

            var doSearch = function()
            {
                $('#loader').fadeIn();

                // AJAX ANTI-SPAM
                if(xhr && xhr.readystate != 4) {
                    xhr.abort();
                }
                // AJAX METHOD
                xhr = $.ajax({
                    method: "POST",
                    url: "<?php echo site_url(); ?>/?fc_ajax=async&type=search",
                    data: { terms: search }
                })
                .done(function(callback) {

                    // CHECK NBR RETURNED
                    var nbr = $(callback).find('div.fc_video').prevObject.length - 1;

                    // DISPLAY RESULTS
                    $('#search_results').html(callback);
                    $('#loader').fadeOut();

                    // RESULT SELECTION
                    $('.fc_video').click(
                        function () {

                            // GET CHOICE CLEAN OTHERS
                            choice = $(this).attr('id');
                            $('.fc_video').not($(this)).remove();

                            // ADD SETTINGS FORM
                            if($('#embedder').length == 0) {

                                $('#embedder_source').clone().appendTo('#search_results').attr("id", "embedder").show();

                                $('input[type="checkbox"]').click(function() {

                                    if ($(this).prop("checked") == true) {
                                        $(this).attr("checked", "checked");
                                    }
                                    else if($(this).prop("checked") == false) {
                                        $(this).removeAttr("checked");
                                    }

                                });
                            }

                            // INSERT THE SELECTED VID
                            $('#fc_plinsert').click(
                                function () {

                                    // Get data
                                    var autoplay = $('#fc_playback').attr("checked");
                                    var width    = $('#fc_plwidth').val();

                                    // Arrange for insertion
                                    if (autoplay == 'checked') { autoplay = "autoplay='true'"; } else { autoplay = "autoplay='false'"; }
                                    if (!width) { width = "" } else { width = " width=" + width; }

                                    // Doing the job
                                    wp.media.editor.insert('[fcplayer id=' + choice + ' ' + autoplay + width + ']');
                                    delete choice;
                                    tb_remove();

                                }
                            );

                        }
                    );

                    // Auto select unique return
                    if (nbr == 1 ) $('.fc_video').click();

                });

            };

            setTimeout(doSearch, 250);

        });

    });

</script>