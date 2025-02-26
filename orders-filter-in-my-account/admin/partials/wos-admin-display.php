<?php

$all = array_merge($this->bilings, $this->other);
        
$wos_setting = [];
if(isset($_POST['submit']))
{
    foreach($all as $item){
        $meta = isset($_POST[$item]) ? sanitize_text_field($_POST[$item]) : 0;
        $wos_setting[$item] = $meta;
        
    }
    update_option('wos-setting', serialize($wos_setting));
}

$item = unserialize(get_option('wos-setting'));

?>

<div id="wrap">
    <h1><?php echo __('Woocommerce orders Filter in my account', "wos"); ?></h1>
    <br>
    <h3><?php echo __('Filter fileds', "wos"); ?>:</h3>
    
    <form method="post">
        <?php 
        foreach( $this->bilings as $key=>$biling ):
            ?>
            <p>
               <input <?php checked(@$item[$biling], 1); ?> name="<?php echo esc_attr($biling); ?>" type="checkbox" id="<?php echo esc_attr($key); ?>" value="1">
               <label for="<?php echo esc_attr($key); ?>"><?php echo __(esc_attr($key), "wos"); ?></label>
            </p>
            <?php
        endforeach;
        ?>
        
        <p>
           <input <?php checked(@$item['order_number'], 1); ?> name="order_number" type="checkbox" id="order_number" value="1">
           <label for="order_number"><?php echo __('Order number', "wos"); ?></label>
        </p>
        
        <p>
           <input <?php checked(@$item['event_start_date'], 1); ?> name="event_start_date" type="checkbox" id="event_start_date" value="1">
           <label for="event_start_date"><?php echo __('Start Date', "wos"); ?></label>
        </p>
        
        <p>
           <input <?php checked(@$item['event_end_date'], 1); ?> name="event_end_date" type="checkbox" id="event_end_date" value="1">
           <label for="event_end_date"><?php echo __('End Date', "wos"); ?></label>
        </p>
        
        <p>
           <input <?php checked(@$item['post_status'], 1); ?> name="post_status" type="checkbox" id="post_status" value="1">
           <label for="post_status"><?php echo __('Order status', "wos"); ?></label>
        </p>
        
        <p>
           <input <?php checked(@$item['numberposts'], 1); ?> name="numberposts" type="checkbox" id="numberposts" value="1">
           <label for="numberposts"><?php echo __('Items per page', "wos"); ?></label>
        </p>

		<p>
           <input <?php checked(@$item['sequential_order_numbers_support'], 1); ?> name="sequential_order_numbers_support" type="checkbox" id="sequential_order_numbers_support" value="1">
           <label for="sequential_order_numbers_support"><?php echo __('Support Sequential Order Numbers Pro plugin', "wos"); ?></label>
        </p>
        
        <p>
           <?php submit_button(); ?>
        </p>
        
    </form>
</div>
