<?php
$wos = get_option('wos-setting', []);
$item = is_string($wos) ? unserialize(get_option('wos-setting', [])) : '';
if(is_array($item) && count(array_filter($item)) > 0): 
    
do_action('wos_biawp_before_form');
?>

<form id="wos_wrapper" autocomplete="off">
    
    <span onclick="wosCloseForm()" id="wos_biawp_close_form">×</span>
    
    <?php 
    
    echo '<div>'.do_action('wos_biawp_before_fields').'</div>';
    
    if($item['_billing_first_name'] == 1)
    {
        echo '<section>';
            $meta = isset($_GET['_billing_first_name']) && $_GET['_billing_first_name']!=='' ? sanitize_text_field($_GET['_billing_first_name']) : '';
            echo '<label for="'.esc_attr('_billing_first_name').'">'.__('First Name', "wos").':</label>';
            echo '<input id="'.esc_attr('_billing_first_name').'" value="'.esc_attr($meta).'" type="text" name="'.esc_attr('_billing_first_name').'" />';
        echo '</section>';
    }
    
    if($item['_billing_last_name'] == 1)
    {
        echo '<section>';
            $meta = isset($_GET['_billing_last_name']) && $_GET['_billing_last_name']!=='' ? sanitize_text_field($_GET['_billing_last_name']) : '';
            echo '<label for="'.esc_attr('_billing_last_name').'">'.__('Last name', "wos").':</label>';
            echo '<input id="'.esc_attr('_billing_last_name').'" value="'.esc_attr($meta).'" type="text" name="'.esc_attr('_billing_last_name').'" />';
        echo '</section>';
    }
    
    if($item['_billing_company'] == 1)
    {
        echo '<section>';
            $meta = isset($_GET['_billing_company']) && $_GET['_billing_company']!=='' ? sanitize_text_field($_GET['_billing_company']) : '';
            echo '<label for="'.esc_attr('_billing_company').'">'.__('Company', "wos").':</label>';
            echo '<input id="'.esc_attr('_billing_company').'" value="'.esc_attr($meta).'" type="text" name="'.esc_attr('_billing_company').'" />';
        echo '</section>';
    }
    
    if($item['_billing_address_1'] == 1)
    {
        echo '<section>';
            $meta = isset($_GET['_billing_address_1']) && $_GET['_billing_address_1']!=='' ? sanitize_text_field($_GET['_billing_address_1']) : '';
            echo '<label for="'.esc_attr('_billing_address_1').'">'.__('Address1', "wos").':</label>';
            echo '<input id="'.esc_attr('_billing_address_1').'" value="'.esc_attr($meta).'" type="text" name="'.esc_attr('_billing_address_1').'" />';
        echo '</section>';
    }
    
    if($item['_billing_address_2'] == 1)
    {
        echo '<section>';
            $meta = isset($_GET['_billing_address_2']) && $_GET['_billing_address_2']!=='' ? sanitize_text_field($_GET['_billing_address_2']) : '';
            echo '<label for="'.esc_attr('_billing_address_2').'">'.__('Address2', "wos").':</label>';
            echo '<input id="'.esc_attr('_billing_address_2').'" value="'.esc_attr($meta).'" type="text" name="'.esc_attr('_billing_address_2').'" />';
        echo '</section>';
    }
    
    if($item['_billing_city'] == 1)
    {
        echo '<section>';
            $meta = isset($_GET['_billing_city']) && $_GET['_billing_city']!=='' ? sanitize_text_field($_GET['_billing_city']) : '';
            echo '<label for="'.esc_attr('_billing_city').'">'.__('City', "wos").':</label>';
            echo '<input id="'.esc_attr('_billing_city').'" value="'.esc_attr($meta).'" type="text" name="'.esc_attr('_billing_city').'" />';
        echo '</section>';
    }
    
    if($item['_billing_postcode'] == 1)
    {
        echo '<section>';
            $meta = isset($_GET['_billing_postcode']) && $_GET['_billing_postcode']!=='' ? sanitize_text_field($_GET['_billing_postcode']) : '';
            echo '<label for="'.esc_attr('_billing_postcode').'">'.__('Postcode', "wos").':</label>';
            echo '<input id="'.esc_attr('_billing_postcode').'" value="'.esc_attr($meta).'" type="text" name="'.esc_attr('_billing_postcode').'" />';
        echo '</section>';
    }
    
    if($item['_billing_email'] == 1)
    {
        echo '<section>';
            $meta = isset($_GET['_billing_email']) && $_GET['_billing_email']!=='' ? sanitize_text_field($_GET['_billing_email']) : '';
            echo '<label for="'.esc_attr('_billing_email').'">'.__('Email', "wos").':</label>';
            echo '<input id="'.esc_attr('_billing_email').'" value="'.esc_attr($meta).'" type="text" name="'.esc_attr('_billing_email').'" />';
        echo '</section>';
    }
    
    if($item['_billing_phone'] == 1)
    {
        echo '<section>';
            $meta = isset($_GET['_billing_phone']) && $_GET['_billing_phone']!=='' ? sanitize_text_field($_GET['_billing_phone']) : '';
            echo '<label for="'.esc_attr('_billing_phone').'">'.__('Phone', "wos").':</label>';
            echo '<input id="'.esc_attr('_billing_phone').'" value="'.esc_attr($meta).'" type="text" name="'.esc_attr('_billing_phone').'" />';
        echo '</section>';
    }
    
    ?>
    <?php if($item['order_number'] == 1): ?>
    <section>
        <?php 
        $number = isset($_GET['order_number']) && $_GET['order_number']!=='' ? sanitize_text_field($_GET['order_number']) : '';
        ?>
        <label for="order_number"><?php echo __('Order number', "wos"); ?></label>
        <input id="order_number" value="<?php echo esc_attr($number); ?>" type="text" name="order_number" />
    </section>
    <?php endif; ?>
    
    <?php if($item['event_start_date'] == 1): ?>
    <section>
        <?php $meta = isset($_GET['event_start_date']) && $_GET['event_start_date']!=='' ? sanitize_text_field($_GET['event_start_date']) : ''; ?>
        <label for="event_start_date"><?php echo __('Start Date', "wos"); ?>:</label>
        <input pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" value="<?php echo esc_attr($meta); ?>" id="event_start_date" type="date" name="event_start_date" />
    </section>
    <?php endif; ?>
    
    <?php if($item['event_end_date'] == 1): ?>
    <section>
        <?php $meta = isset($_GET['event_end_date']) && $_GET['event_end_date']!=='' ? sanitize_text_field($_GET['event_end_date']) : ''; ?>
        <label for="event_end_date"><?php echo __('End Date', "wos"); ?>:</label>
        <input pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" value="<?php echo esc_attr($meta); ?>" id="event_end_date" type="date" name="event_end_date" />
    </section>
    <?php endif; ?>
    
    <?php if($item['post_status'] == 1): ?>
    <section>
        <label for="order_status"><?php echo __('Order status', "wos"); ?>:</label>
        <select id="order_status" name="post_status">
            <option value=""><?php echo __('Select', 'wos'); ?></option>
            <?php
            foreach( wc_get_order_statuses() as $key=>$status )
            {
                $selected = isset($_GET['post_status']) && $_GET['post_status']==$key ? 'selected="selected"' : '';
                echo '<option '.esc_attr($selected).' value="'.esc_attr($key).'">'.esc_attr($status).'</option>';
            }
            ?>
        </select>
    </section>
    <?php endif; ?>
    
    <?php if($item['numberposts'] == 1): ?>
    <section>
        <label for="numberposts"><?php echo __('Items per page', "wos"); ?></label>
        <select id="numberposts" name="numberposts">
            <option value=""><?php echo __('Select', 'wos'); ?></option>
            <?php 
            $numbers = [5, 10, 15, 20, 50, 100];
            foreach($numbers as $number)
            {
                $selected = isset($_GET['numberposts']) && $_GET['numberposts']==$number ? 'selected="selected"' : '';
                echo '<option '.esc_attr($selected).' value="'.esc_attr($number).'">'.esc_attr($number).'</option>';
            }
            ?>
            
        </select>
    </section>
    <?php endif; ?>
    
    <div id="wos_submit">
        <input name="wos_filter" type="submit" value="<?php echo apply_filters('wos_biawp_filter_button_text', __('Filter', "wos")); ?>" />
    </div>
    
    <?php echo '<div>'.do_action('wos_biawp_after_fields').'</div>'; ?>
    
</form>

<?php do_action('wos_biawp_after_form'); ?>

<script>
function wosCloseForm(){
    document.getElementById('wos_wrapper').remove();
}
</script>

<?php endif; ?>