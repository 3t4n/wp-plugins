<!--OPTIONS START-->
<div class="mb-l-optionsobj">
    <h2><?php _e('Options OBJ', 'author-box-pro'); ?></h2>
    <p><?php _e('Options OBJ', 'author-box-pro'); ?></p>
    <?php
    global $wpdb;
    $melibu_ab = $wpdb->prefix . "melibu_ab";
    $result = $wpdb->get_results("SELECT * FROM " . $melibu_ab . "");
    if ($result) {
        echo '<h3>' . __('Options OBJ', 'author-box-pro') . '</h3>';
        echo '<pre>';
        var_dump($result[0]);
        echo '</pre>';
        echo '<h3>' . __('Options OBJ (Array)', 'author-box-pro') . '</h3>';
        echo '<pre>';
        var_dump(unserialize($result[0]->value));
        echo '</pre>';
    }
    ?>
</div>
<!--OPTIONS END-->