<?php
function ad_list() {    
    ?>    
    <div class="wrap">
        <h2>Ad Manager</h2>
        <div class="tablenav top" style="padding-bottom: 10px;">
            <div class="alignleft actions">
                <a href="<?php echo admin_url('admin.php?page=ad_create'); ?>" style="height: 33px;" class="button button-primary button-large">Create New</a>
            </div>
            <br class="clear">
        </div>
        <?php
        global $wpdb;
        $table_name = $wpdb->prefix . "admanager";

        $rows = $wpdb->get_results("SELECT * from $table_name");
        ?>
        <table class='wp-list-table widefat fixed striped posts'>
            <tr style="background-color:#cccccc;font-weight:bold !important;">
                <th class="manage-column ss-list-width">ID</th>
                <th class="manage-column ss-list-width">Title</th>
                <th class="manage-column ss-list-width">Clicks</th>
                <th class="manage-column ss-list-width">Short Code</th>
                <th>Action</th>
            </tr>
            <?php foreach ($rows as $row) { ?>
                <tr>
                    <td class="manage-column ss-list-width" style="width: 5%;"><?php echo $row->id; ?></td>
                    <td class="manage-column ss-list-width" style="width: 50%;"><?php echo $row->title; ?></td>
                    <td class="manage-column ss-list-width" style="width: 10%;padding-left: 25px"><?php echo $row->clicks; ?></td>
                    <td class="manage-column ss-list-width" style="width: 10%">[<?php echo $row->short_code; ?>]</td>
                    <td style="width:10%"><a href="<?php echo admin_url('admin.php?page=ad_update&id=' . $row->id); ?>">Update</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <?php
}