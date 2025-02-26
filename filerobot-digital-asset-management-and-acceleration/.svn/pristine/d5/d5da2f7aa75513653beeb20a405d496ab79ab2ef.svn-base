<?php
$metadata_fields = [];
if (get_option('filerobot_token') != '' && get_option('filerobot_sec_id') != '') {
    $endpoint  = 'https://api.filerobot.com/';
    $filesystem = new Filerobot_API(get_option('filerobot_token'), get_option('filerobot_sec_id'), '/', $endpoint);
    $response   = $filesystem->get_metadata_taxonomy();

    if ($response->status == 'success') {
        $metadata_fields = $response->fields;
    }
}
?>
<!-- Style -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<!-- Script -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<div id="filerobot-plugin-container" class="filerobot__page row">

    <div class="filerobot-lower">

        <div class="filerobot__message"></div>

        <form method="POST" action="options.php" class="filerobot-box" id="settings_form">
            <div class="content-container">

                <div class="top_part">
                    <h1><?php echo 'General Settings'; ?></h1>
                </div>

                <?php settings_fields('filerobot_settings'); ?>

                <div class="settings_block">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 filerobot-control">
                            <label for="filerobot_cname">
                                <?php echo 'CNAME'; ?>
                                <div class="tooltip">?
                                    <span class="tooltiptext"><?php echo 'Enter the cname as per configuration done in your Scaleflex DAM Hub interface, once validated and SSL certificate accepted. (Or leave blank if none)'; ?></span>
                                </div>
                            </label>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 filerobot-control">
                            <input
                                    id="filerobot_cname"
                                    name="filerobot_cname"
                                    type="text"
                                    class="regular-text code"
                                    value="<?php echo get_option('filerobot_cname'); ?>"
                            />
                            <div class="filerobot_description">
                                <?php echo 'Enter CNAME: for example media.mydomain.com'; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 filerobot-control">
                            <label for="filerobot_token">
                                <?php echo 'Scaleflex DAM token'; ?>
                                <div class="tooltip">?
                                    <span class="tooltiptext"><?php echo 'Scaleflex DAM token from your Scaleflex DAM account'; ?></span>
                                </div>
                            </label>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 filerobot-control">
                            <input
                                    id="filerobot_token"
                                    name="filerobot_token"
                                    type="text"
                                    class="regular-text code"
                                    value="<?php echo get_option('filerobot_token'); ?>"
                            />
                            <div class="filerobot_description">
                                <?php echo 'Enter token: for example fmpsaXXX'; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 filerobot-control">
                            <label for="filerobot_sec_id">
                                <?php echo 'Security Template Identifier'; ?>
                                <div class="tooltip">?
                                    <span class="tooltiptext">
                                        <?php echo 'To load the Scaleflex DAM Widget or Scaleflex DAM Image Editor, you you need to create a Security Template in your Scaleflex DAM Hub first, in order for your WordPress instantiation of the Scaleflex DAM Widget to obtain proper credentials and access your storage'; ?>
                                    </span>
                                </div>
                            </label>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 filerobot-control">
                            <input
                                    id="filerobot_sec_id"
                                    name="filerobot_sec_id"
                                    type="text"
                                    class="regular-text code"
                                    value="<?php echo get_option('filerobot_sec_id'); ?>"
                            />
                            <div class="filerobot_description">
                                <?php echo 'Enter the Security Template Identifier: for example SECU_3268740A1382466B9XBC390D8'; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 filerobot-control">
                            <label for="filerobot_container">
                                <?php echo 'Scaleflex DAM upload directory'; ?>
                            </label>
                            <div class="tooltip">?
                                <span class="tooltiptext"><?php echo 'The directory in your Scaleflex DAM account, where the files will be stored'; ?></span>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 filerobot-control">
                            <input
                                    id="filerobot_container"
                                    name="filerobot_container"
                                    type="text"
                                    class="regular-text code"
                                    value="<?php echo get_option('filerobot_container') ? get_option('filerobot_container') : '/'; ?>"
                            />
                            <div class="filerobot_description">
                                <?php echo 'By default: /'; ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 filerobot-control">
                            <?php echo 'Do not store media assets on WP server'; ?>
                            <div class="tooltip">?
                                <span class="tooltiptext"><?php echo 'Save space on your WordPress server by securely keeping your media files solely in the Scaleflex DAM\'s multi-tenant cloud'; ?></span>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 filerobot-control">
                            <input
                                    id="filerobot_cloud_storage_only"
                                    name="filerobot_cloud_storage_only"
                                    type="checkbox"
                                    value="1"
                                <?php echo checked((get_option('filerobot_cloud_storage_only') !== false) ? get_option('filerobot_cloud_storage_only') : 1); ?>
                            />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 filerobot-control">
                            <?php echo 'Use Scaleflex DAM Widget as gallery'; ?>
                            <div class="tooltip">?
                                <span class="tooltiptext">
                                    <?php echo 'This option will allow to use as the Single Source of Truth the Scaleflex DAM media, disabling the native WordPress gallery and keeping only the Scaleflex DAM Widget as media gallery'; ?>
                                </span>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 filerobot-control">
                            <input
                                    id="filerobot_use_fmaw_only"
                                    name="filerobot_use_fmaw_only"
                                    type="checkbox"
                                    value="1"
                                <?php echo checked((get_option('filerobot_use_fmaw_only') !== false) ? get_option('filerobot_use_fmaw_only') : 1); ?>
                            />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 filerobot-control">
                            <?php echo 'Synchronize Scaleflex DAM metadata'; ?>
                            <div class="tooltip">?
                                <span class="tooltiptext">
                                    This option will import the metadata available in Scaleflex DAM (tags, etc.) in your image description and alt text to facilitate search.<br>
                                    Warning: This option is mandatory for advanced editors (like Elementor, Gutenberg, etc.)
                                </span>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 filerobot-control">
                            <input
                                    id="filerobot_sync_metadata"
                                    name="filerobot_sync_metadata"
                                    type="checkbox"
                                    value="1"
                                <?php echo checked((get_option('filerobot_sync_metadata') !== false) ? get_option('filerobot_sync_metadata') : 1); ?>
                            />
                        </div>
                    </div>

                    <div class="row" style="display:none;"><!-- @Todo: Currently unused. Confirm and use it later -->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 filerobot-control">
                            <?php _e('sync_comments_label', 'filerobot'); ?>
                            <div class="tooltip">?
                                <span class="tooltiptext"><?php echo 'Synchronize Comments as Description'; ?></span>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 filerobot-control">
                            <input
                                    id="filerobot_sync_comments"
                                    name="filerobot_sync_comments"
                                    type="checkbox"
                                    value="1"
                                <?php echo checked((get_option('filerobot_sync_comments') !== false) ? get_option('filerobot_sync_comments') : 0); ?>
                            />
                        </div>
                    </div>

                    <div class="row" style="align-items: center">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 filerobot-control">
                            <?php echo 'Sync "Post ID"'; ?>
                            <div class="tooltip">?
                                <span class="tooltiptext"><?php echo 'The function will sync all post ID are using the asset to specific metadata field.'; ?></span>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2 filerobot-control">
                            <input
                                    id="filerobot_sync_post_id"
                                    name="filerobot_sync_post_id"
                                    type="checkbox"
                                    value="1"
                                <?php echo checked((get_option('filerobot_sync_post_id') !== false) ? get_option('filerobot_sync_post_id') : 0); ?>
                            /> <span style="margin-left: 40px;">to</span>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 filerobot-control">
                            <?php echo 'Select metadata field'; ?>
                            <div class="tooltip">?
                                <span class="tooltiptext">
                                    <?php echo 'To use you need to go to the Scaleflex DAM Hub and create a specific metadata fields first (Scaleflex DAM Hub > Setting > Metadata > Assets Tab > Add new field)'; ?>
                                </span>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 filerobot-control">
                            <select name="filerobot_sync_post_id_to_metadata" id="filerobot_sync_post_id_to_metadata">
                                <option value="">Select metadata</option>
                                <?php
                                if (count($metadata_fields) > 0):
                                    foreach ($metadata_fields as $metadata_field): ?>
                                        <option value="<?php echo $metadata_field->api_slug; ?>"
                                            <?php if (get_option('filerobot_sync_post_id_to_metadata') == $metadata_field->api_slug) echo 'selected'; ?>
                                        >
                                            <?php echo $metadata_field->title; ?>
                                        </option>
                                    <?php
                                    endforeach;
                                endif;
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="row" style="align-items: center">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 filerobot-control">
                            <?php echo 'Sync metadata fields'; ?>
                            <div class="tooltip">?
                                <span class="tooltiptext">
                                    <?php echo 'Warning, this setting needs a specific set of metadata in Scaleflex DAM to be activated, otherwise will break the synchronisation.'; ?>
                                </span>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2 filerobot-control">
                            <input
                                    id="filerobot_sync_multiple_metadata_to_db"
                                    name="filerobot_sync_multiple_metadata_to_db"
                                    type="checkbox"
                                    value="1"
                                <?php echo checked((get_option('filerobot_sync_multiple_metadata_to_db') !== false) ? get_option('filerobot_sync_multiple_metadata_to_db') : 0); ?>
                            /> <span style="margin-left: 40px;">to</span>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 filerobot-control">
                            <?php echo 'Select metadata fields'; ?>
                            <div class="tooltip">?
                                <span class="tooltiptext">
                                    <?php echo 'To use you need to go to the Scaleflex DAM Hub and create a specific metadata fields first (Scaleflex DAM Hub > Setting > Metadata > Assets Tab > Add new field)'; ?>
                                </span>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 filerobot-control">
                            <?php
                            $filerobot_metadata_fields = get_option('filerobot_metadata_fields');
                            $selected_metadata_fields = ($filerobot_metadata_fields != '') ? json_decode($filerobot_metadata_fields, true) : [];
                            ?>
                            <input type="hidden" name="filerobot_metadata_fields" id="filerobot_metadata_fields_result"
                                   value="<?php echo htmlspecialchars($filerobot_metadata_fields); ?>">
                            <select id="filerobot_metadata_fields" multiple>
                                <option value="">Select metadata</option>
                                <?php
                                if (count($metadata_fields) > 0):
                                    foreach ($metadata_fields as $metadata_field): ?>
                                        <option value="<?php echo $metadata_field->api_slug; ?>"
                                            <?php if (in_array($metadata_field->api_slug, $selected_metadata_fields)) echo 'selected'; ?>
                                        >
                                            <?php echo $metadata_field->title; ?>
                                        </option>
                                    <?php
                                    endforeach;
                                endif;
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 filerobot-control">
                            <label for="filerobot_sec_id">
                                <?php echo 'Name of the metadata list in WP database'; ?>
                            </label>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 filerobot-control">
                            <input
                                    id="filerobot_name_the_metadata_list"
                                    name="filerobot_name_the_metadata_list"
                                    type="text"
                                    class="regular-text code"
                                    placeholder='This field is required if you want to use "Sync metadata fields"'
                                    value="<?php echo get_option('filerobot_name_the_metadata_list'); ?>"
                            />
                        </div>
                    </div>

                    <div class="row" style="align-items: center">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 filerobot-control">
                            <?php echo 'Change value of "_wp_attached_file" to CDN link'; ?>
                            <div class="tooltip">?
                                <span class="tooltiptext">
                                    <?php echo 'Warning, this setting will be change the meta_value in database to CDN link.'; ?>
                                </span>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 filerobot-control">
                            <input
                                    id="filerobot_change_value_wp_attached_file_to_cdn_link"
                                    name="filerobot_change_value_wp_attached_file_to_cdn_link"
                                    type="checkbox"
                                    value="1"
                                <?php echo checked((get_option('filerobot_change_value_wp_attached_file_to_cdn_link') !== false) ? get_option('filerobot_change_value_wp_attached_file_to_cdn_link') : 0); ?>
                            />
                        </div>
                    </div>

                    <div class="row" style="align-items: center">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 filerobot-control">
                            <?php echo 'Sync the metadata by custom meta key'; ?>
                            <div class="tooltip">?
                                <span class="tooltiptext">
                                    <?php echo 'Warning, this setting needs a specific set of metadata in Scaleflex DAM to be activated, otherwise will break the synchronisation.'; ?>
                                </span>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 filerobot-control">
                            <input
                                    id="filerobot_sync_metadata_by_custom_meta_key"
                                    name="filerobot_sync_metadata_by_custom_meta_key"
                                    type="checkbox"
                                    value="1"
                                <?php echo checked((get_option('filerobot_sync_metadata_by_custom_meta_key') !== false) ? get_option('filerobot_sync_metadata_by_custom_meta_key') : 0); ?>
                            />
                        </div>
                    </div>

                    <?php
                    $sync_metadata_by_custom_meta_key = get_option('filerobot_sync_metadata_by_custom_meta_key');
                    ?>
                    <div id="sync_metadata_by_custom_meta_key" <?php echo ($sync_metadata_by_custom_meta_key) ? 'style="display: block;"' : 'style="display: none;"'; ?>>
                        <?php
                        $metadata_by_custom_meta_key = (get_option('filerobot_metadata_by_custom_meta_key') != '') ? json_decode(get_option('filerobot_metadata_by_custom_meta_key'), true) : [];
                        ?>
                        <?php if (count($metadata_by_custom_meta_key)): ?>
                            <input type="hidden" name="count_custom_meta_key" id="count_custom_meta_key" value="<?php echo count($metadata_by_custom_meta_key); ?>">
                        <?php else: ?>
                            <input type="hidden" name="count_custom_meta_key" id="count_custom_meta_key" value="1">
                        <?php endif; ?>

                        <table class="widefat fixed" id="tbl_sync_metadata_by_custom_meta_key" cellspacing="0">
                            <thead>
                            <tr>
                                <th id="columnname" class="manage-column column-columnname" scope="col"><b>Meta Key</b></th>
                                <th id="columnname" class="manage-column column-columnname" scope="col"><b>Metadata</b></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (count($metadata_by_custom_meta_key)):
                                for($i = 0; $i < count($metadata_by_custom_meta_key); $i++):
                                    ?>
                                    <tr class="alternate">
                                        <td class="column-columnname">
                                            <input type="text" name="custom_meta_key_<?php echo $i + 1; ?>" id="custom_meta_key_<?php echo $i + 1; ?>"
                                                   class="regular-text" value="<?php echo $metadata_by_custom_meta_key[$i]['meta_key']; ?>">
                                        </td>
                                        <td class="column-columnname">
                                            <select name="custom_metadata_field_<?php echo $i + 1; ?>" id="custom_metadata_field_<?php echo $i + 1; ?>" class="filerobot_metadata_field">
                                                <option value="">Select metadata</option>
                                                <?php
                                                if (count($metadata_fields) > 0):
                                                    foreach ($metadata_fields as $metadata_field): ?>
                                                        <option value="<?php echo $metadata_field->api_slug; ?>"
                                                            <?php if ($metadata_by_custom_meta_key[$i]['metadata_field'] == $metadata_field->api_slug) echo 'selected'; ?>
                                                        >
                                                            <?php echo $metadata_field->title; ?>
                                                        </option>
                                                    <?php
                                                    endforeach;
                                                endif;
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                <?php endfor; ?>
                            <?php else: ?>
                                <tr class="alternate">
                                    <td class="column-columnname">
                                        <input type="text" name="custom_meta_key_1" id="custom_meta_key_1" class="regular-text" value="">
                                    </td>
                                    <td class="column-columnname">
                                        <select name="custom_metadata_field_1" id="custom_metadata_field_1" class="filerobot_metadata_field">
                                            <option value="">Select metadata</option>
                                            <?php
                                            if (count($metadata_fields) > 0):
                                                foreach ($metadata_fields as $metadata_field): ?>
                                                    <option value="<?php echo $metadata_field->api_slug; ?>">
                                                        <?php echo $metadata_field->title; ?>
                                                    </option>
                                                <?php
                                                endforeach;
                                            endif;
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                        <div style="text-align: right; margin-top: 10px">
                            <input type="button" class="button button-primary button-large" value="Add field" onclick="addMoreCustomMetaKey()">
                        </div>
                        <input type="hidden" name="filerobot_metadata_by_custom_meta_key" id="filerobot_metadata_by_custom_meta_key" value="<?php echo htmlspecialchars(get_option('filerobot_metadata_by_custom_meta_key')); ?>">
                    </div>

                    <div class="row">
                        <p class="shaded-bg">
                            <?php echo "Changing token or upload directory in mid-use can cause unexpected consequences. It's highly recommended that you deactivate then activate this plugin before entering a new token or upload directory."; ?>
                        </p>
                    </div>
                    <div class="row">
                        <p class="shaded-bg">
                            <?php echo "Please do not change the default 'Store' settings on Scaleflex DAM hub, because this version of the Scaleflex DAM plugin does NOT support any non-default settings. Hence, please keep 'How should the assets be called once uploaded?' as 'Keep original file name' and keep 'Action to take if a file with the same name already exist in the container?' as 'New version'."; ?>
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 filerobot-control">
                        <input type="hidden" name="action" value="update"/>
                        <?php submit_button('Save all changes', ['primary', 'large'], 'submit', true); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="buttons_row">
                        <input
                                type="button"
                                name="test"
                                class="button test-connection-btn filerobot__test__connection"
                                value="<?php echo 'Test connection'; ?>"
                        />
                        <input
                                type="button"
                                name="sync"
                                class="button test-connection-btn filerobot__sync__status"
                                value="<?php echo 'Synchronization status'; ?>"
                        />
                        <input
                                type="button"
                                name="sync-force"
                                class="button test-connection-btn filerobot__sync__force"
                                value="<?php echo 'Finalize activation and synchronize assets database'; ?>
                        "/>

                        <div class="filerobot_notices">
                            <div class="icon">
                                <p>
                                    <span class="dashicons dashicons-yes-alt"></span>
                                </p>
                            </div>
                            <div class="message">
                                <p></p>
                            </div>
                            <div class="close">
                                <p>
                                    <span class="dashicons dashicons-no-alt"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        <p>
                            <label><?php echo 'To Scaleflex DAM:'; ?></label>
                        </p>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <div class="progress_container">
                            <div id="up_progress" class="progress">
                                <div class="bar"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        <p>
                            <label id="up_succeeded"></label>
                        </p>
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        <p>
                            <label><?php echo 'From Scaleflex DAM:'; ?></label>
                        </p>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <div class="progress_container">
                            <div id="down_progress" class="progress">
                                <div class="bar"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        <p>
                            <label id="down_succeeded"></label>
                        </p>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>

    jQuery(document).ready(function($) {
        $('.filerobot_metadata_field').select2({
            width: '100%'
        });
        $('#filerobot_metadata_fields').select2();
        $('#filerobot_sync_post_id_to_metadata').select2();

        $('#filerobot_metadata_fields').on('change', function () {
            $('#filerobot_metadata_fields_result').val(JSON.stringify($(this).val()));
        });

        $('#filerobot_metadata_fields').on('change', function () {
            $('#filerobot_metadata_fields_result').val(JSON.stringify($(this).val()));
        });

        $('#filerobot_sync_metadata_by_custom_meta_key').on('change', function () {
            if ($(this).is(':checked')) {
                $('#sync_metadata_by_custom_meta_key').show();
            } else {
                $('#sync_metadata_by_custom_meta_key').hide();
            }
        });

        $('#settings_form').one('submit', function(e) {
            e.preventDefault();
            //check and get value from custom meta key if it enabled
            let filerobot_metadata_by_custom_meta_key = $('#filerobot_metadata_by_custom_meta_key').val();
            if ($('#filerobot_sync_metadata_by_custom_meta_key').is(':checked')) {
                let count_fields = $('#count_custom_meta_key').val();
                let custom_metadata = [];
                for (let i = 1; i <= count_fields; i++) {
                    if ($('#custom_meta_key_' + i).val() !== '' && $('#custom_metadata_field_' + i).val() !== '') {
                        custom_metadata.push(
                            {
                                'meta_key': $('#custom_meta_key_' + i).val(),
                                'metadata_field': $('#custom_metadata_field_' + i).val()
                            }
                        );
                    }
                }
                filerobot_metadata_by_custom_meta_key = JSON.stringify(custom_metadata);
            }

            $('#filerobot_metadata_by_custom_meta_key').val(filerobot_metadata_by_custom_meta_key);

            if ($('#filerobot_sync_multiple_metadata_to_db').is(':checked') && $('#filerobot_name_the_metadata_list').val() !== '') {
                return true;
            } else if($('#filerobot_sync_multiple_metadata_to_db').is(':checked') && $('#filerobot_name_the_metadata_list').val() === '') {
                alert('Please set "Name of the metadata list in WP database" when you want to use "Sync metadata fields"');
                $('#filerobot_name_the_metadata_list').css('border', '1px solid red');
                return false;
            } else {
                return true;
            }
        });
    });

    function addMoreCustomMetaKey()
    {
        (function ($) {
            let count = $('#count_custom_meta_key').val();
            let number_item_add = parseInt(count) + 1;
            let html = `<tr class="alternate">
                <td class="column-columnname">
                    <input type="text" name="custom_meta_key_${number_item_add}" id="custom_meta_key_${number_item_add}" class="regular-text" value="">
                </td>
                <td class="column-columnname">
                    <select name="custom_metadata_field_${number_item_add}" id="custom_metadata_field_${number_item_add}" class="filerobot_metadata_field">
                        <option value="">Select metadata</option>
                        <?php
            if (count($metadata_fields) > 0):
            foreach ($metadata_fields as $metadata_field): ?>
                                <option value="<?php echo $metadata_field->api_slug; ?>">
                                    <?php echo $metadata_field->title; ?>
                                </option>
                            <?php
            endforeach;
            endif;
            ?>
                    </select>
                </td>
            </tr>`;
            $('#count_custom_meta_key').val(number_item_add);
            $('#tbl_sync_metadata_by_custom_meta_key tbody').append(html);
            $('#custom_metadata_field_' + number_item_add).select2({
                width: '100%'
            });

        })(jQuery);
    }
</script>
