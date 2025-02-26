<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>

<center>
    <h1> <?php echo __('UPS Address Validation'); ?> </h1>
</center>
<hr>
<?php 

$additional_ups_data_arrribute = array(
    'city' => 'City',
    'State' => 'State Code',
    'Pin' => 'Postal Code',
    'country' => 'Country Code'
    );
if(isset($_POST['ma_ups_submit']) && wp_verify_nonce($_REQUEST['_ma_ups_addr_valid'],"ma-ups-addr-valid")){ 
    $settings_array = array();
    $settings_array['ups_switch']       = sanitize_text_field($_POST['ma_ups_addr_valid_switch']);
    $settings_array['api_mode']         = sanitize_text_field($_POST['ma_ups_addr_valid_mode']);
    $settings_array['access_key']       = !empty($_POST['ma_ups_access_key']) ? sanitize_text_field($_POST['ma_ups_access_key']) : '';
    $settings_array['user_id']          = !empty($_POST['ma_ups_user_id']) ? sanitize_text_field($_POST['ma_ups_user_id']) : '';
    $settings_array['user_pwd']         = !empty($_POST['ma_user_pwd']) ? sanitize_text_field($_POST['ma_user_pwd']) : '';
    $settings_array['user_note']        = !empty($_POST['ma_user_note']) ? sanitize_text_field($_POST['ma_user_note']) : '';

    update_option( 'woocommerce_'.MA_UPS_ADDR_VALID_SETTINGS_KEY, $settings_array );
   
    echo '<div class="notice notice-success is-dismissible"> 
    <p><strong>'. __('Settings saved','ma-ups-addr-valid') .'</strong></p>
</div>';

}

$output_array = (get_option('woocommerce_'.MA_UPS_ADDR_VALID_SETTINGS_KEY) != false) ? get_option('woocommerce_'.MA_UPS_ADDR_VALID_SETTINGS_KEY) : array();

?>
<div style="width:100%;">
	<br>
	<style type="">
	.input_box_css{
		line-height: 22px;
		padding-right: 24px;
		width:30%;;
	}
	</style>
	
	<h2> <?php echo __('Generic Settings:','ma-ups-addr-valid'); ?> </h2>
	<form method="post">
            <?php wp_nonce_field('ma-ups-addr-valid', '_ma_ups_addr_valid'); ?>
            <table class="form-table">
                    <tr>
                            <th><?php echo __('Realtime Address Validation ','ma-ups-addr-valid'); ?></th>

                            <td>
                                    <select name="ma_ups_addr_valid_switch" id="ma_ups_addr_valid_switch" class="wc-enhanced-select" style='width:30%;'>
                                            <?php 
                                                if(!empty($output_array))
                                                {
                                                    if($output_array['ups_switch'] === 'yes'){
                                                        
                                                        echo "<option value='yes' selected='true'>". __('Enable','ma-ups-addr-valid') ."</option>";
                                                        echo "<option value='no'>".__('Disable ','ma-ups-addr-valid')."</option>";
                                                    
                                                    }else{
                                                        
                                                        echo "<option value='yes'>". __('Enable','ma-ups-addr-valid') ."</option>";
                                                        echo "<option value='no' selected='true'>".__('Disable ','ma-ups-addr-valid')."</option>";
                                                    
                                                    }
                                                     
                                                }else{
                                                     echo "<option value='yes' selected='true'>". __('Enable','ma-ups-addr-valid') ."</option>";
                                                     echo "<option value='no'>".__('Disable ','ma-ups-addr-valid')."</option>";
                                               
                                                }            
                                                    
                                            ?>

                                    </select>
                            </td>
                    </tr>
                    <tr>
                            <th><?php echo __('UPS API Mode ','ma-ups-addr-valid'); ?></th>

                            <td>
                                    <select name="ma_ups_addr_valid_mode" id="ma_ups_addr_valid_mode" class="wc-enhanced-select" style='width:30%;'>
                                            <?php 
                                              if(!empty($output_array))
                                                {
                                                    if($output_array['api_mode'] === 'live'){
                                                        
                                                        echo "<option value='live' selected='true'>". __('Production Mode','ma-ups-addr-valid') ."</option>";
                                                        echo "<option value='test'>".__('Test Mode ','ma-ups-addr-valid')."</option>";
                                                    
                                                    }else{
                                                        
                                                        echo "<option value='live'>". __('Production Mode','ma-ups-addr-valid') ."</option>";
                                                        echo "<option value='test'  selected='true'>".__('Test Mode ','ma-ups-addr-valid')."</option>";
                                                    
                                                    }
                                                     
                                                }else{
                                                     echo "<option value='yes' selected='true'>". __('Enable','ma-ups-addr-valid') ."</option>";
                                                     echo "<option value='no'>".__('Disable ','ma-ups-addr-valid')."</option>";
                                               
                                                } 
                                            ?>

                                    </select>
                            </td>
                    </tr>
                    <tr>
                            <th><?php echo __('UPS Access Key ','ma-ups-addr-valid'); ?></th>

                            <td>
                                    <input type="password" name="ma_ups_access_key" id="ma_ups_access_key" class="input_box_css" value="<?php echo !empty($output_array['access_key']) ? $output_array['access_key'] : ''; ?>" placeholder="<?php  _e('Obtained from UPS after getting account','ma-ups-addr-valid'); ?>" >
                            </td>
                    </tr>
                      <tr>
                            <th><?php echo __('UPS User ID ','ma-ups-addr-valid'); ?></th>

                            <td>
                                    <input type="text" name="ma_ups_user_id" id="ma_ups_user_id" class="input_box_css" value="<?php echo !empty($output_array['user_id']) ? $output_array['user_id'] : ''; ?>" placeholder="<?php  _e('Obtained from UPS after getting account','ma-ups-addr-valid'); ?>" >
                            </td>
                    </tr>
                    <tr>
                            <th><?php echo __('UPS Password','ma-ups-addr-valid'); ?></th>

                            <td>
                                    <input type="password" name="ma_user_pwd" id="ma_user_pwd" value="<?php echo !empty($output_array['user_pwd']) ? $output_array['user_pwd'] : ''; ?>" class="input_box_css" placeholder="<?php  _e('Obtained from UPS after getting account','ma-ups-addr-valid'); ?>">
                            </td>
                    </tr>
                    <tr>
                            <th><?php echo __('UPS Success Note','ma-ups-addr-valid'); ?></th>

                            <td>
                                    <input type="text" name="ma_user_note" id="ma_user_note" value="<?php echo !empty($output_array['user_note']) ? $output_array['user_note'] : 'Your Shipping Address is Verified by UPS'; ?>" class="input_box_css" placeholder="<?php  _e('Obtained from UPS after getting account','ma-ups-addr-valid'); ?>">
                            </td>
                    </tr>
                     

                  
            </table>
            <hr>
            <br>
            <button type="submit" class="button button-primary" name="ma_ups_submit" id="ma_ups_submit"><?php echo __("Save Changes",'ma-ups-addr-valid'); ?></button>
            </form>
</div> 