<div class="wrap">
    <h2><?php _e('Empty Trash Settings'); ?></h2>

    <form method="post" action="options.php">
        <?php settings_fields('empty-trash-group'); ?>
        <?php do_settings_sections('empty-trash-group'); ?>
        <table class="form-table">                       
            <tr valign="top">
                <th scope="row"><?php _e("Number of days to empty the trash :"); ?></th>
                <td>
                    <input type="number" required="required" name="empty_trash_days"  value="<?php echo esc_attr(get_option('empty_trash_days')); ?>" /> days
                </td>                
            </tr>            
        </table>
        <?php submit_button(); ?>
    </form>
</div>