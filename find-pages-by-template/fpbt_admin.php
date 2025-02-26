<?php
/**
 * Admin page front-end template for Find Pages By Template
 */
?>

<div class="wrap wrap--fpbt">
    <h1>Find Pages By Template</h1>

    <?php if ($templates) { ?>
        <form method="post" id="fpbt_form" class="fpbt_form">

            <input type="hidden" name="page" value="find-pages-by-template">

            <select name="fpbt_template">
                <?php foreach ($templates as $title => $filename) { ?>
                    <option value="<?php echo $filename ?>|<?php echo $title ?>" <?php echo ($filename === $template_file ? 'selected="selected"' : '') ?>><?php echo $title ?></option>
                <?php } ?>
            </select>

            <button type="submit" id="fpbt_submit" value="1" name="fpbt_submit">Search</button>

        </form>
    <?php } else { ?>
        <div class="fpbt-alert fpbt-alert--warning">
            <strong>Hold up!</strong>
            <span>It appears you don't have any page templates in your theme yet!</span>
        </div>
    <?php } ?>


    <?php if ($pages) { ?>
        <hr>
        <h2>Pages using "<?php echo $template_title ?>"</h2>
        <span>Found <strong><?php echo count($pages) ?></strong> page<?php echo (count($pages) > 1 ? 's' : '') ?> in total</span>
        <table class="fpbt_page_table">
            <thead>
                <th>ID</th>
                <th>Title</th>
                <th>Status</th>
                <th>Updated</th>
            </thead>
            <tbody>
                <?php foreach ($pages as $page) { ?>
                    <tr>
                        <td><a href="<?php echo get_admin_url() . '/post.php?post=' . $page->ID . '&action=edit'  ?>" target="_blank"><?php echo $page->ID ?></a></td>
                        <td><a href="<?php echo get_admin_url() . '/post.php?post=' . $page->ID . '&action=edit'  ?>" target="_blank"><?php echo $page->post_title ?></a></td>
                        <td><?php echo $page->post_status ?></td>
                        <td><?php echo $page->post_modified ?></td>
                        <td><a href="<?php echo get_admin_url() . '/post.php?post=' . $page->ID . '&action=edit'  ?>" target="_blank">edit</a></td>
                        <td><a href="<?php echo get_permalink($page->ID) ?>" target="_blank">view</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else if (!$pages && $template_title) { ?>
        <hr>
        <div class="fpbt-alert fpbt-alert--warning">
            <strong>We've come up empty!</strong>
            <span>There aren't any pages found using the "<?php echo $template_title ?>" template!</span>
        </div>
    <?php } ?>
</div>
