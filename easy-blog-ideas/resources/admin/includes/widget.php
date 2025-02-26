<div id="pig-widget">
    <h3><b><?php _e("Last Bookmarked Ideas", PIG_PLUGIN_SLUG__);?></b></h3>

    <table cellspacing="5" cellpadding="2">
<?php
    foreach ($bookmarks as $post) {
?>
        <tr>
            <td class="date"><?php echo date("M j", self::getPostMeta($post->ID, "publish")/1000);?></td>
            <td><a href="<?php echo self::getPostMeta($post->ID, "url");?>" target="_new"><?php echo $post->post_title;?></a></td>
        </tr>
<?php
    }
?>
    </table>

    <a href="<?php echo admin_url("admin.php?page=" . PIG_PLUGIN_SLUG__);?>"><input type="button" class="button button-primary" value="<?php _e("Find new post ideas", PIG_PLUGIN_SLUG__);?>"></a>
</div>