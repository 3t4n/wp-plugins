<?php

$uid = uniqid();

global $acftt;

if (!empty($instance['field']['is_sub'])) {
    $sub = true;
} else {
    $sub = false;
}

if ($fo = $acftt->get_acf_field_object($instance, $sub)) {
    
    if ( !empty($instance['url']['new_window']) ) {
        $target = ' target="_blank"';
    } else {
        $target = '';
    }
    
    // link target
    
    if ($instance['target']['target'] == 'field_value') {
        if ($sub) {
            $link_target = esc_url(get_sub_field($fo['key'], $fo['source']));
        } else {
            $link_target = esc_url(get_field($fo['key'], $fo['source']));
        }
    }
    
    if ($instance['target']['target'] == 'post_object') {
        $link_target = get_permalink($fo['post_object']);
    }
    
    // link value
    
    if ($instance['display']['display_as'] == 'url') {
        if ($sub) {
            $link_value = esc_url(get_sub_field($fo['key'], $fo['source']));
        } else {
            $link_value = esc_url(get_field($fo['key'], $fo['source']));
        }
    }
    
    if ($instance['display']['display_as'] == 'post_object_title') {
        $link_value = get_the_title($fo['post_object']);
    }
    
    if ($instance['display']['display_as'] == 'post_object_field_value') {
        $link_value = get_field($instance['field']['field'],$fo['post_object']);
    }
    
    if ($instance['display']['display_as'] == 'text') {
        $link_value = esc_html($instance['display']['linked_text']);
    }
    
    if ($instance['display']['display_as'] == 'icon') {
        $link_value = siteorigin_widget_get_icon( $instance['display']['icon'] );
    }
    
    // html tags
    
    if ( $instance['display']['html_tag'] != 'none' ) {
        
        $html_before = '<' . wp_kses_post(esc_html($instance['display']['html_tag'])) . '>';
        $html_after = '</' . wp_kses_post(esc_html($instance['display']['html_tag'])) . '>';
        
    } else {
        $html_before = '';
        $html_after = '';
    }
    
}

?>

<div id="acf_url_<?php echo $uid; ?>" class="acf-url">
    
    
    <?php if ( !empty($instance['icon']['icon']) ) : ?>
        
        <span class="acf-url-icon">
            <?php echo siteorigin_widget_get_icon( $instance['icon']['icon'] ); ?>
        </span>
        
    <?php endif; ?>
    
    <?php if ( !empty($instance['option']['before'])) : ?>
        
        <span class="acf-url-before">
            <?php echo wp_kses_post( $instance['option']['before'] ); ?>
        </span>
        
    <?php endif; ?>
    
    <?php if (!empty($link_target) && !empty($link_value)) : ?>
        
        <?php echo $html_before; ?>
        
        <a href="<?php echo $link_target; ?>" <?php echo $target; ?>>
            
            <?php echo $link_value; ?>
            
        </a>
        
        <?php echo $html_after; ?>
        
    <?php endif; ?>
    
    <?php if ( !empty($instance['option']['after'])) : ?>
        
        <span class="acf-url-after">
            <?php echo wp_kses_post( $instance['option']['after'] ); ?>
        </span>
        
    <?php endif; ?>
    
</div>
