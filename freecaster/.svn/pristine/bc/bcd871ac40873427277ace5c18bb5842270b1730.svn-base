<?php

//
// GET SETTINGS FROM WP
//
$apiurl = get_option('fc_apiurl');
$apiusr = get_option('fc_apiusr');
$apikey = get_option('fc_apikey');

//
// CHECK IF IT'S ASYNC AJAX REQUEST
//
if ($_GET['fc_ajax'] != 'async')
{
    return false;
    exit(0);
}
//
// IMPORT & DECLARE API ACCESS
//
else
{
    include_once(plugin_dir_path(__FILE__) . 'FCAPItools.php');
    $FreecasterAPI = new FCAPItools();
}

//
// RESPONSE FOR AJAX SEARCH
//
if ( $_GET['type'] == 'search' )
{

    //
    // DOING THE SEARCH
    //
    if ( !empty($_POST['terms']) AND (!empty($apiurl) AND !empty($apiusr) AND !empty($apikey)) ) {

        // ID Search
        if ( is_numeric($_POST['terms']) ) {
            $search = array('id' => $_POST['terms']);
        }
        // Text Search
        elseif ( is_string($_POST['terms']) )  {
            $search = array('name' => '~' . $_POST['terms'], 'limit' => 100);
        }

        // Get the results
        $APICallback = json_decode( $FreecasterAPI->SearchVideos($search) );
        $videos = $APICallback->videos;

    } elseif ( is_numeric($_POST['terms']) ) {

        // Fake the results
        $videos = array((object) array('video_id' => $_POST['terms']));

    }

    //
    // RETURN RESULTS
    //
    $total = count($videos);
    echo '<div id="totvid">';
    printf( _n( '%s result found', '%s results found', $total, 'freecaster' ), $total );
    echo '</div>';

    //
    // PARSING & DISPLAY ALL VIDS
    //
    if ($total > 0) {

        foreach ($videos as $key => $video) {

            echo '<div class="fc_video" id="' . $video->video_id . '">';
            (isset($video->thumbnail) ? $thumb = $video->thumbnail : $thumb = plugins_url( 'img/nopreview.png', __FILE__ ));
            echo '<img src="' . $thumb . '" width="120" height="68" style="float: left;" />';
            echo '<div class="fc_video_txt">';
            echo '<span style="color: grey;">ID : ' . $video->video_id . '</span>';
            echo '<br>';
            echo substr($video->name, 0, 80);
            echo '</div>';
            echo '</div>';

        }

    } else {

        // Need an API access for search, report error
        echo "<br><img class='notice-icon' src='" . plugins_url( 'img/problem.png', __FILE__ ) . "' />";
        echo "<p class='notice-text'>" . sprintf( __("An error occurred while retrieving data <b>please verify your access</b> in the <a href='%s'>options page</a>", 'freecaster'), get_admin_url() . 'options-general.php?page=freecaster' ) . "</p>";

    }

}

//
// RESPONSE FOR AJAX UPLOAD
//
if ( $_GET['type'] == 'upload' ) {

    if (isset($_POST['video_title']) && isset($_FILES['video_file'])) {

        // Create the new video object
        try
        {
            $video = $FreecasterAPI->factory->create_video($_POST['channel'], array('name' => $_POST['video_title']));
        }
        catch (Exception $e)
        {
            echo $e->getMessage();
        }

        // Upload the selected video file
        try
        {
            $FreecasterAPI->factory->upload_video($video->video_id, array('file' => '@' . $_FILES['video_file']['tmp_name'] . ';type=' . $_FILES['video_file']['type']));
        }
        catch (Exception $e)
        {
            echo $e->getMessage();
        }

        echo json_encode($video);

    }

}