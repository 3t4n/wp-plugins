<?php
$cheeko_slider_options = get_option('cheeko_slider_options');
?>
<div class="cjs-slider">
    <div class="cycle-slideshow"
    data-cycle-fx="<?php echo $cheeko_slider_options['cjs_effect']; ?>"
    data-cycle-timeout="<?php echo (($cheeko_slider_options['cjs_auto_play'] == 1 ) ? $cheeko_slider_options['cjs_auto_time'] * 1000 : 0) ?>"
    data-cycle-speed="<?php echo $cheeko_slider_options['cjs_speed'] * 1000; ?>"
    data-cycle-prev="#prev"
    data-cycle-next="#next"
    data-cycle-pager=".cjs-cycle-pager"
    data-cycle-slides="> div"
    >

    <!-- empty element for pager links -->
    <?php
    global $wpdb;

    $result = $wpdb->get_results("SELECT * FROM wp_cjs_images");

    if ($cheeko_slider_options['cjs_pager'] == 1) {
    ?>
        <span class="cjs-cycle-pager"></span>
    <?php
    }

    foreach ($result as $row) {
        ?>
        <div class="cjs-slider-img">
            <?php

            if(!empty($row->cjs_img_title)) {
                echo "<h2 class='cjs-img-title'>" . sanitize_text_field(stripslashes($row->cjs_img_title)) . "</h2>";
            }
            ?>
            <img src="<?php echo $row->cjs_img_path ?>">
            <?php
            if(!empty($row->cjs_img_link)) {
                echo "<a href='" . esc_url($row->cjs_img_link) ."' target='_blank' class='cjs_banner_link'> Click Here </a>";
            }

            if(!empty($row->cjs_img_description)) {
                echo "<p>" . sanitize_text_field(stripslashes($row->cjs_img_description)) . "</p>";
            }
            ?>
        </div>
        <?php        
    }
    ?>
</div>
<?php
if ($cheeko_slider_options['cjs_controls'] == 1) {
    ?>
    <div class="cjs-slider-controls">
        <a href=# id="prev"></a>
        <a href=# id="next"></a>
    </div>
    <?php
}
?>
</div>
