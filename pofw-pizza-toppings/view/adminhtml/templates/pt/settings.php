<?php 
if (!defined('ABSPATH')) exit;

$message = $this->getMessage();

?>
<div><h3><?php echo __('Pizza Toppings Settings', 'pofw-pizza-toppings') ?></h3></div>
<?php if (isset($message['text'])): ?>    
  <div id="message" class="updated notice notice-success is-dismissible below-h2">
    <p><?php echo $message['text']; ?></p>    
    <button type="button" class="notice-dismiss"><span class="screen-reader-text"><?php echo __( 'Dismiss this notice.', 'woocommerce' );?></span></button>
  </div>
<?php endif;?>
<form id="export_form" action="?page=pofw_pt&action=updateConfig" method="post">
  <table class="form-table">
    <tr>
      <th><?php _e('Default min toppings', 'pofw-pizza-toppings') ?></th>
      <td>
        <fieldset>      
         <input type="text" name="pt_min_selection" value="<?php echo $this->getMinSelection(); ?>" autocomplete="off">              
        </fieldset>
      </td>
    </tr>
    <tr>
      <th><?php _e('Default max toppings', 'pofw-pizza-toppings') ?></th>
      <td>
        <fieldset>      
         <input type="text" name="pt_max_selection" value="<?php echo $this->getMaxSelection(); ?>" autocomplete="off">              
        </fieldset>
      </td>
    </tr>
    <tr>
      <th><?php _e('Min toppings message', 'pofw-pizza-toppings') ?></th>
      <td>
        <fieldset>      
         <input type="text" name="pt_min_message" value="<?php echo $this->getMinMessage(); ?>" autocomplete="off">              
        </fieldset>
      </td>
    </tr> 
    <tr>
      <th><?php _e('Max toppings message', 'pofw-pizza-toppings') ?></th>
      <td>
        <fieldset>      
         <input type="text" name="pt_max_message" value="<?php echo $this->getMaxMessage(); ?>" autocomplete="off">             
        </fieldset>
      </td>
    </tr>             
  </table>
  <div>
    <input name="submit" id="submit" class="button button-primary" value="<?php echo __('Save Settings', 'pofw-pizza-toppings') ; ?>" type="submit">
  </div>
</form>     

