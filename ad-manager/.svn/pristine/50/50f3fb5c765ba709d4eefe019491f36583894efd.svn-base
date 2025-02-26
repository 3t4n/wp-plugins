<?php

function ad_update() {
    global $wpdb;
    $table_name = $wpdb->prefix . "admanager";    
    $id = $_GET["id"];
    
    $title = $_POST["txt_title"];
    $image = $_POST["txt_image"];
    $target_url = $_POST["txt_targeturl"];
    $width = $_POST["txt_adwidth"];
    $height = $_POST["txt_adheight"];
    //update
    if (isset($_POST['update'])) {
        $wpdb->update(
                $table_name, //table
                array('title' => $title, 'ad_image' => $image, 'target_url' => $target_url, 'div_width' => $width, 'div_height' => $height), //data                
                array('id' => $id) //where
        );
    }
    //delete
    else if (isset($_POST['delete'])) {
        $wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id = %s", $id));
    } else {//selecting value to update	
        $ads = $wpdb->get_results($wpdb->prepare("SELECT * from $table_name where id=%s", $id));
        foreach ($ads as $s) {
            $title = $s->title;
            $image = $s->ad_image;
            $target_url = $s->target_url;
            $width = $s->div_width;
            $height = $s->div_height;
        }
    }    
    ?>    
    <div class="wrap">
        <h2>Ad Manager</h2>

        <?php if ($_POST['delete']) { ?>
            <div class="updated"><p>Ad deleted</p></div>
            <a href="<?php echo admin_url('admin.php?page=ad_list') ?>">&laquo; Back to ad list</a>

        <?php } else if ($_POST['update']) { ?>
            <div class="updated"><p>Ad updated</p></div>
            <a href="<?php echo admin_url('admin.php?page=ad_list') ?>">&laquo; Back to ad list</a>

        <?php } else { ?>
            <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                <table class='wp-list-table widefat fixed' style="min-width: 1000px;">                
                <tr>
                    <th class="ss-th-width">Title</th>
                    <td><input type="text" name="txt_title" id="txt_title" value="<?php echo $title; ?>" class="ad-manager-txt" /></td>
                </tr>
                <tr>
                    <th class="ss-th-width">Image</th>
                    <td>
                        <input type="text" name="txt_image" id="txt_image" value="<?php echo $image; ?>" class="ad-manager-txt" />
                        <input id="upload-button" type="button" class="button" value="Upload Image" />
                    </td>
                </tr>
                <tr>
                    <th class="ss-th-width">Target URL</th>
                    <td><input type="text" name="txt_targeturl" id="txt_targeturl" value="<?php echo $target_url; ?>" class="ad-manager-txt" /></td>
                </tr>
                <tr>
                    <th class="ss-th-width">Ad Width</th>
                    <td><input type="text" name="txt_adwidth" id="txt_adwidth" value="<?php echo $width; ?>" class="ad-manager-txt" /></td>
                </tr>
                <tr>
                    <th class="ss-th-width">Ad Height</th>
                    <td><input type="text" name="txt_adheight" id="txt_adheight" value="<?php echo $height; ?>" class="ad-manager-txt" /></td>
                </tr>
                <tr>
                    <th class="ss-th-width">&nbsp;</th>
                    <td>
                        <input type='submit' name="update" value='Save' class='button button-primary button-large'> &nbsp;&nbsp;
                        <input type='submit' name="delete" value='Delete' class='button button-primary button-large' style="margin: 0px 20px 0px 0px" onclick="return confirm('Are you sure to delete this ad?')">                        
                        <a href="<?php echo admin_url('admin.php?page=ad_list') ?>" class='button button-warning button-large'>Back</a>
                    </td>
                </tr>
            </table>                
            </form>
        <?php } ?>

    </div>
    <script>
        jQuery(document).ready(function ($) {

            var mediaUploader;

            $('#upload-button').click(function (e) {
                e.preventDefault();
                // If the uploader object has already been created, reopen the dialog
                if (mediaUploader) {
                    mediaUploader.open();
                    return;
                }
                // Extend the wp.media object
                mediaUploader = wp.media.frames.file_frame = wp.media({
                    title: 'Choose Image',
                    button: {
                        text: 'Choose Image'
                    }, multiple: false});

                // When a file is selected, grab the URL and set it as the text field's value
                mediaUploader.on('select', function () {
                    attachment = mediaUploader.state().get('selection').first().toJSON();
                    $('#txt_image').val(attachment.url);
                });
                // Open the uploader dialog
                mediaUploader.open();
            });

        });
    </script>
    <?php
}