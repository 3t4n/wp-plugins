<?php
global $pagenow;
$post_status = self::count_posts();
$publish_generic_el = isset($post_status->publish) ? $post_status->publish : 0;
$trash_generic_el = 0;
$current_url = admin_url('admin.php?page=generic-elements-admin');
$publish_url = add_query_arg('status', 'enabled', $current_url);
$disabled_url = add_query_arg('status', 'disabled', $current_url);
$trash_url = add_query_arg('status', 'trash', $current_url);
$empty_trash_url = add_query_arg('delete_all', true, $current_url);
$get_enabled_post = 0;
$get_disabled_post = 0;
$total_generic_el = $get_enabled_post + $get_disabled_post;
?>
<div class="ui container generic-elements-admin-settings">
    <table class="form-table">
        <div class="ui tabular menu">
            <?php
            foreach ($tabs_titles as $id => $tab) :
                $active = ($id == 0) ? ' active' : '';
                $class = ' generic-el-has-icon';
                $class .= $active;
            ?>
                <div class="item <?php echo $class; ?>" data-tab="<?php echo $id; ?>">
                    <?php if (isset($tab['icon'])) : ?>
                        <span class="tab-icon">
                            <img src="<?php echo GENERIC_ELEMENTS_ADMIN_ASSETS . '/img/icons/' . $tab['icon']; ?>" alt="<?php echo $tab['title']; ?>">
                        </span>
                    <?php endif; ?>
                    <span class="tab-title"><?php echo $tab['title']; ?></span>
                </div>
            <?php endforeach; ?>
        </div>
        <?php
        $tabid = 1;
        foreach ($tabs_titles as $id => $tab) :
            $active = ($id == 0) ? ' active ' : ''; ?>
            <div class="ui tab <?php echo $active; ?>" data-tab="<?php echo $id ?>">
                <?php 
                // if the file exists, require it
                $filepath = GENERIC_ELEMENTS_TEMPLATES . '/' . $tab['file'] . '.php';
                if (file_exists($filepath)) {
                    require_once $filepath;
                }
                ?>
            </div>
        <?php endforeach; ?>
    </table>
</div>