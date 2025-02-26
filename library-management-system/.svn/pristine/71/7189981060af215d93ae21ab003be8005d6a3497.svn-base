<?php 
if (!empty($params['sections']) && is_array($params['sections'])) {
    foreach ($params['sections'] as $section) {
        ?>
        <tr>
            <td><?php echo esc_html(ucwords($section->bookcase_name)); ?></td>
            <td><?php echo esc_html(ucwords($section->name)); ?></td>
            <td>
                <?php if ($section->status) { ?>
                    <a href="javascript:void(0);" class="action-btn view-btn">
                        <?php esc_html_e("Active", "library-management-system"); ?>
                    </a>
                <?php } else { ?>
                    <a href="javascript:void(0);" class="action-btn delete-btn">
                        <?php esc_html_e("Inactive", "library-management-system"); ?>
                    </a>
                <?php } ?>
            </td>
            <td><?php echo esc_html($section->created_at); ?></td>
            <td>
            <?php 
                // Generate the nonce for the actions
                $page_nonce = wp_create_nonce('owt7_manage_bookcase_page_nonce');
            ?>
                <a href="admin.php?page=owt7_library_bookcases&mod=section&fn=add&opt=view&id=<?php echo esc_attr(base64_encode($section->id)); ?>&_wpnonce=<?php echo esc_attr($page_nonce); ?>"
                    title="<?php esc_attr_e('View', 'library-management-system'); ?>" class="action-btn view-btn">
                    <span class="dashicons dashicons-visibility"></span>
                </a>
                <a href="admin.php?page=owt7_library_bookcases&mod=section&fn=add&opt=edit&id=<?php echo esc_attr(base64_encode($section->id)); ?>&_wpnonce=<?php echo esc_attr($page_nonce); ?>"
                    title="<?php esc_attr_e('Edit', 'library-management-system'); ?>" class="action-btn edit-btn">
                    <span class="dashicons dashicons-edit"></span>
                </a>
                <a href="javascript:void(0);" title="<?php esc_attr_e('Delete', 'library-management-system'); ?>" class="action-btn delete-btn action-btn-delete"
                    data-id="<?php echo esc_attr(base64_encode($section->id)); ?>"
                    data-module="<?php echo esc_attr(base64_encode('section')); ?>">
                    <span class="dashicons dashicons-trash"></span>
                </a>
            </td>
        </tr>
    <?php
    }
}
?>
