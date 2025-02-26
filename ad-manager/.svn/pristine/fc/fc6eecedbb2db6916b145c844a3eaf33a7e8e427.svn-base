<?php

function ad_create() {
    $title = $_POST["txt_title"];
    $image = $_POST["txt_image"];
    $target_url = $_POST["txt_targeturl"];
    $width = $_POST["txt_adwidth"];
    $height = $_POST["txt_adheight"];

    $created_date = date("Y-m-d H:i:s");
    $status = "1";    
    //insert
    if (isset($_POST['insert'])) {
        global $wpdb;
        $table_name = $wpdb->prefix . "admanager";
        
        $id = $wpdb->get_var( $wpdb->prepare( 
            "
                SELECT id 
                FROM `".$table_name."`
                ORDER BY id DESC limit 0,1
            "
        ));        
        $short_code = "admanager-".$id+1;        
        $wpdb->insert(
                $table_name, //table
                array('title' => $title, 'ad_image' => $image, 'target_url' => $target_url, 'div_width' => $width, 'div_height' => $height, 'short_code' => $short_code, 'created_date' => $created_date, 'status' => $status)
        );
        $message.="Ad inserted successfully.";
    }    
    ?>    
    <div class="wrap">
        <h2>Create New Ad</h2>
        <?php if (isset($message)): ?><div class="updated"><p><?php echo $message; ?></p></div><?php endif; ?>
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
                        <input type='submit' name="insert" value='Save' class='button button-primary button-large'>
                        <a href="<?php echo admin_url('admin.php?page=ad_list') ?>" class='button button-warning button-large'>Back</a>
                    </td>
                </tr>
            </table>
            
        </form>
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
