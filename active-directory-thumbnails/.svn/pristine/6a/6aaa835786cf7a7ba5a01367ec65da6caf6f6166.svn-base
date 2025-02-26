<?php
if($_POST['adt_hidden'] == 'Y') {
    $adt_ad_thumbnail = $_POST['adt_adfield'];
    $adt_replace_avatar = $_POST['adt_replace_avatar'];
    $adt_replace_bp_avatar = $_POST['adt_replace_bp_avatar'];
    update_option('adt_ad_thumbnail', $adt_ad_thumbnail);
    update_option('adt_replace_avatar', $adt_replace_avatar);
    update_option('adt_replace_bp_avatar', $adt_replace_bp_avatar);
} else {
    $adt_ad_thumbnail = get_option('adt_ad_thumbnail');
    $adt_replace_avatar = get_option('adt_replace_avatar');
    $adt_replace_bp_avatar = get_option('adt_replace_bp_avatar');
}

if($_POST['adt_bulk_url_hidden'] == 'Y') {
    $adt_nonce = wp_create_nonce(rand());
    update_option('adt_nonce', $adt_nonce);
}
?>

<div class="wrap">
    <h2><?php _e( 'Active Directory Thumbnails Options', 'active-directory-thumbnails' );?></h2>

    <form name="adt_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
        <input type="hidden" name="adt_hidden" value="Y">
        <h4><?php _e( 'General Settings', 'active-directory-thumbnails' )?></h4>
        <p>
            <?php _e('Active Directory Integration field name for thumbnail: ', 'active-directory-thumbnails'); ?>
            <input placeholder="<?php _e(' ex: adi_thumbnailphoto', 'active-directory-thumbnails' ); ?>" type="text" name="adt_adfield" value="<?php echo $adt_ad_thumbnail; ?>" size="30"><br>
            <input type="checkbox" name="adt_replace_avatar" value="true" <?php echo $adt_replace_avatar == 'true' ? 'checked' : ''; ?>> <?php _e('Replace default WordPress avatar?', 'active-directory-thumbnails'); ?><br>
            <input type="checkbox" name="adt_replace_bp_avatar" value="true" <?php echo $adt_replace_bp_avatar == 'true' ? 'checked' : ''; ?>> <?php _e('Replace BuddyPress avatar?', 'active-directory-thumbnails'); ?><br>
        </p>
        <p class="submit">
            <input class="button" type="submit" name="Submit" value="<?php _e('Update Options', 'active-directory-thumbnails' ) ?>" />
        </p>
    </form>

    <hr />

    <h4><?php _e( 'Active Directory Create Pictures', 'active-directory-thumbnails' ) ?></h4>
    <div id="progressbar"></div>
    <br />
    <input type="button" class="button" onclick="create_picture()" id="create_photos" name="create_photos" value="<?php _e('Create Photos', 'active-directory-thumbnails' ) ?>" />
    <br />
    <h5 style="display: inline;"><?php _e('Currently creating photo for user id:', 'active-directory-thumbnails')?> </h5><span id="current_user_id"></span>

    <hr />

    <h4><?php _e( 'Active Directory Generate Single User Picture', 'active-directory-thumbnails' ) ?></h4>
    <?php wp_dropdown_users(array('name' => 'author', 'id'=> 'adt_user_dropdown')); ?>
    <input type="button" class="button" onclick="create_single_user_picture()" id="create_single_photo" name="create_single_photo" value="<?php _e('Create Photo', 'active-directory-thumbnails' ) ?>" />

    <div id="current_photo"></div>
    <br />

    <hr />
    <h4><?php _e( 'Bulk Script URL for Scheduled Tasks', 'active-directory-thumbnails' ) ?></h4>
    <p><?php _e('Please run the URL once manually to see if you get a fatal error regarding memory.
    This is caused by the max memory limit in PHP.
    Increase the max memory to ensure this script runs to completion', 'active-directory-thumbnails' ) ?></p>
    <?php
        $adt_bulk_url = add_query_arg('active_directory_thumbnails', '', site_url());
        $adt_bulk_url = add_query_arg('nonce', get_option('adt_nonce', false), $adt_bulk_url);
    ?>
    <form name="adt_url" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
        <input type="hidden" name="adt_bulk_url_hidden" value="Y">
        <input readonly type="text" style="min-width: 100%;" name="adt_bulk_url" id="adt_bulk_url-bulk-url" value="<?php echo $adt_bulk_url ?>">
        <p class="submit">
            <a target="_blank" href="<?php echo $adt_bulk_url ?>" class="button"><?php _e('Run Bulk Job', 'active-directory-thumbnails' ) ?></a>
            <input class="button" type="submit" name="Submit" value="<?php _e('Change URL', 'active-directory-thumbnails' ) ?>" />
        </p>
    </form>
    <hr />
    <h4><?php _e('Meta Field', 'active-directory-thumbnails' ) ?></h4>
    <p>
        <?php _e('The meta field for the user photo for themes/plugins:', 'active-directory-thumbnails' ) ?> <b>adt_user_photo_url</b><br>
        <?php _e('The meta field for the user photo filename for themes/plugins (if the upload directory is expected to change):', 'active-directory-thumbnails' ) ?> <b>adt_user_photo_filename</b>
    </p>
</div>
