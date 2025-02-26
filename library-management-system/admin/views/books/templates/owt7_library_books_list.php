<?php

if (!empty($params['books']) && is_array($params['books'])) {
    foreach ($params['books'] as $book) {
        ?>
        <tr>
            <td><?php echo esc_html($book->book_id); ?></td>
            <td>
                <strong><?php esc_html_e("Category", "library-management-system"); ?>:</strong> <span><?php echo esc_html($book->category_name); ?></span><br>
                <strong><?php esc_html_e("Bookcase", "library-management-system"); ?>:</strong> <span><?php echo esc_html($book->bookcase_name); ?></span><br>
                <strong><?php esc_html_e("Section", "library-management-system"); ?>:</strong> <span><?php echo esc_html($book->section_name); ?></span>
            </td>
            <td><?php echo esc_html(ucwords($book->name)); ?></td>
            <td><?php echo esc_html(intval($book->stock_quantity)); ?></td>
            <td>
                <?php if ($book->status) { ?>
                    <a href="javascript:void(0);" class="action-btn view-btn">
                        <?php esc_html_e("Active", "library-management-system"); ?>
                    </a>
                <?php } else { ?>
                    <a href="javascript:void(0);" class="action-btn delete-btn">
                        <?php esc_html_e("Inactive", "library-management-system"); ?>
                    </a>
                <?php } ?>
            </td>
            <?php 
                // Generate the nonce for the actions
                $page_nonce = wp_create_nonce('owt7_manage_books_page_nonce');
            ?>
            <td>
                <a href="admin.php?page=owt7_library_books&mod=book&fn=add&opt=view&id=<?php echo esc_attr(base64_encode($book->id)); ?>&_wpnonce=<?php echo esc_attr($page_nonce); ?>"
                   title="<?php esc_attr_e('View', 'library-management-system'); ?>" class="action-btn view-btn">
                    <span class="dashicons dashicons-visibility"></span>
                </a>
                <a href="admin.php?page=owt7_library_books&mod=book&fn=add&opt=edit&id=<?php echo esc_attr(base64_encode($book->id)); ?>&_wpnonce=<?php echo esc_attr($page_nonce); ?>"
                   title="<?php esc_attr_e('Edit', 'library-management-system'); ?>" class="action-btn edit-btn">
                    <span class="dashicons dashicons-edit"></span>
                </a>
                <a href="javascript:void(0);" title="<?php esc_attr_e('Delete', 'library-management-system'); ?>"
                   class="action-btn delete-btn action-btn-delete" data-id="<?php echo esc_attr(base64_encode($book->id)); ?>"
                   data-module="<?php echo esc_attr(base64_encode('book')); ?>">
                    <span class="dashicons dashicons-trash"></span>
                </a>
            </td>
        </tr>
        <?php
    }
}
?>
