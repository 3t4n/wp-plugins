<?php
// Add Shortcode

global $wpdb;
$table_name = $wpdb->prefix . "admanager";
$results = $wpdb->get_results("SELECT * FROM `" . $table_name . "` WHERE status=1 ORDER BY id", ARRAY_A);
$count = 1;
foreach ($results as $k => $val) {
    $cb = function() use ($val) {
        $pre_shortcode_content = "<div>";
        //if ($count == 1) {
            ?>
            <script type="text/javascript">
                function admanager_click_counter(id) {
                    jQuery.ajax({
                        url: '<?php echo plugins_url('admanager_ajax.php', __FILE__); ?>',
                        type: 'post',
                        data: 'updateclick=1&id=' + id,
                        success: function (result)
                        {
                        }
                    });
                }
            </script>
            <?php
        //}
        $shortcode_content = "";
        $height = "";
        $width = "";
        $divstyle = "";
        if ($val['div_height'] != '') {
            $height = "height='" . $val['div_height'] . "'";
            $divstyle .= "height:" . $val['div_height'] . "px;";
        }
        if ($val['div_width'] != '') {
            $width = "width='" . $val['div_width'] . "'";
            $divstyle .= "width:" . $val['div_width'] . "px;";
        }
        $shortcode_content .= "<div style='" . $divstyle . "'>";
        if ($val['target_url'] != '') {
            $shortcode_content .= "<a target='_blank' onclick='admanager_click_counter(" . $val['id'] . ")' href='" . $val['target_url'] . "'>";
        }
        $shortcode_content .= "<img src='" . $val['ad_image'] . "' style='" . $divstyle . "'>";
        if ($val['target_url'] != '') {
            $shortcode_content .= "</a>";
        }
        if ($val['target_url'] != '') {
            
        }
        $shortcode_content .= "</div>";

        $post_shortcode_content = "</div>";

        $shortcode_content = $pre_shortcode_content . $shortcode_content . $post_shortcode_content;

        return $shortcode_content;
    };

    add_shortcode($val['short_code'], $cb);
    $count++;
}
//wp_enqueue_script('latest_jquery', '//code.jquery.com/jquery-latest.min.js', array(), null, true);
?>
