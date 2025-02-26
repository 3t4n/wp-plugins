<div class="the_posts_pagination">
    <?php
    $xargs = array();
    if ( !empty($instance['option']['mid_size']) ) {
        $xargs['mid_size'] = absint($instance['option']['mid_size']);
    }
    if ( !empty($instance['option']['prev_text']) ) {
        $xargs['prev_text'] = esc_html(sanitize_text_field($instance['option']['prev_text']));
    }
    if ( !empty($instance['option']['next_text']) ) {
        $xargs['next_text'] = esc_html(sanitize_text_field($instance['option']['next_text']));
    }
    the_posts_pagination($xargs);
    ?>
</div>
