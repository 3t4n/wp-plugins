<input type="hidden" name="aws_ts_member_meta[flag]" value="1" />

<table class="aws-member-meta">

    <?php $ids = array(); ?>

    <?php if (empty($fields)): ?>

        <p><?php _e("Assign this member to a team, and update the page, to use the available meta fields", $this->plugin_name) ?></p>
    <?php endif; ?>

    <?php foreach ($fields as $field): ?>

        <?php if (!in_array($field["id"], $ids)): ?>

            <tr>

                <th><?php echo __($field["label"], $this->plugin_name) ?></th>
                <td>
                    
                    <?php if( isset($field["type"]) && $field["type"] === "text" ):?>
                        
                        <input type="text" name="aws_ts_member_meta[<?php echo $field["id"] ?>]" value="<?php echo ( isset($aws_ts_member_meta[$field["id"]]) ? $aws_ts_member_meta[$field["id"]] : "" ) ?>" />
                         
                    <?php elseif(isset($field["type"]) && $field["type"] === "textarea" ): ?>
                        
                        <textarea name="aws_ts_member_meta[<?php echo $field["id"] ?>]"><?php echo ( isset($aws_ts_member_meta[$field["id"]]) ? $aws_ts_member_meta[$field["id"]] : "" ) ?></textarea>
                        
                    <?php endif; ?>
                    
                </td>

            </tr>

            <?php $ids[] = $field["id"] ?>

        <?php endif; ?>

    <?php endforeach; ?>

</table>