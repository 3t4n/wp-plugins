<?php

$title = isset($instance['title']) ? $instance['title'] : __('Make Donations', 'asoriba-payment');
$include_name_fields = isset($instance['include_name_fields']) ? (bool)$instance['include_name_fields'] : false;
?>
<div class="asoriba-payment-widget-options">
<!--     <p>
        <label for="<?php echo $this->get_field_id('list_id'); ?>"><?php _e('List id:', 'asoriba-payment'); ?></label>
        <input id="<?php echo $this->get_field_id('list_id'); ?>" name="<?php echo $this->get_field_name('list_id'); ?>" type="text" value="<?php echo esc_attr($list_id); ?>" class="widefat">
    </p> -->
    <p>
        <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'asoriba-payment'); ?></label>
        <input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" class="widefat">
    </p>
<!--     <p>
        <input type="checkbox" <?php checked($include_name_fields); ?> id="<?php echo $this->get_field_id('include_name_fields'); ?>" name="<?php echo $this->get_field_name('include_name_fields'); ?>" class="checkbox" />
        <label for="<?php echo $this->get_field_id('include_name_fields'); ?>"><?php _e('Include optional name fields', 'asoriba-payment'); ?></label>
    </p>
    <p>
        <input type="checkbox" <?php checked($include_referral); ?> id="<?php echo $this->get_field_id('include_referral'); ?>" name="<?php echo $this->get_field_name('include_referral'); ?>" class="checkbox" />
        <label for="<?php echo $this->get_field_id('include_referral'); ?>"><?php _e('Include referral', 'asoriba-payment'); ?></label>
    </p> -->
</div>
