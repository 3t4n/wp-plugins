<?php
if (!defined('ABSPATH')) exit;
?>
<div class="pt-container">
<?php if (!$this->getProductOptionsPluginEnabled()): ?>
  <div class="pofw-pt-create-ms"><?php echo __('Please, install and enable the <a href="https://wordpress.org/plugins/pofw-pizza-toppings/" target="_blank">Product Options</a> plugin.', 'pofw-pizza-toppings'); ?></div>
<?php  elseif (!$this->getCheckboxOptionExists()): ?> 
  <div class="pofw-pt-create-ms"><?php echo sprintf(__('Create product options with type Checkbox and save the product. (<a href="%s" target="_blank">screenshot</a>)', 'pofw-pizza-toppings'), Pektsekye_PT()->getPluginUrl() . 'view/adminhtml/web/product/edit/checkbox_option.png'); ?></div>
<?php else: ?>
  <div id="pt_options">
    <input type="hidden" id="pt_changed" name="pt_changed" value="0">  
    <input type="hidden" name="pt_product_id" value="<?php echo (int) $this->getPtProductId(); ?>">         
    <div>
      <p class="form-field">
        <label for="pt_option_select"><?php echo __('Toppings option', 'pofw-pizza-toppings'); ?></label>  <span class="woocommerce-help-tip" data-tip="<?php echo htmlspecialchars(__("The product option that will be displayed as the toppings option.", 'pofw-pizza-toppings'));?>"></span>    
        <select id="pt_option_select" name="pt_option_id">
        <?php foreach ($this->getCheckboxSelectOptions() as $key => $value ): ?>
          <option value="<?php echo esc_attr($key); ?>" <?php echo $key == $this->getOptionId() ? 'selected="selected"' : ''; ?> ><?php echo esc_html($value); ?></option>
        <?php endforeach; ?>
        </select>
      </p>       
    </div>     
    <div>
      <p class="form-field">
        <label for="pt_min_selection"><?php echo __('Min Toppings', 'pofw-pizza-toppings'); ?></label>
        <input class="pt-min-selection" type="text" id="pt_min_selection" name="pt_min_selection" value="<?php echo (int) $this->getMinSelection(); ?>" autocomplete="off">                     
      </p>     
      <p class="form-field">
        <label for="pt_max_selection"><?php echo __('Max Toppings', 'pofw-pizza-toppings'); ?></label>
        <input class="pt-max-selection" type="text" id="pt_max_selection" name="pt_max_selection" value="<?php echo (int) $this->getMaxSelection(); ?>" autocomplete="off">                     
      </p>                   
    </div>
    <div> 
      <?php echo __('You can adjust the maximum toppings message on the <a href="admin.php?page=pofw_pt" target="_blank">settings page</a>.', 'pofw-pizza-toppings'); ?>
      <br/> 
      <br/>        
      <?php echo sprintf(__('You should set special sort order to split the topping option into columns.<br/>Example: 1, 2, 3 ...  101, 102, 103 ...  (<a href="%s" target="_blank">screenshot</a>)', 'pofw-pizza-toppings'), Pektsekye_PT()->getPluginUrl() . 'view/adminhtml/web/product/edit/option_sort_order.png'); ?>
      <br/>
      <br/>
      <?php if (!$this->getOptionDefaultPluginEnabled()): ?>      
        <?php echo sprintf(__('It is possible to preselect the toppings option by default with the POFW Option Default plugin.<br/><a href="%1$s" target="_blank">%1$s</a>', 'pofw-pizza-toppings'), 'https://wordpress.org/plugins/pofw-option-default/'); ?>    
      <?php endif; ?>    
    </div> 
  </div> 
   <script type="text/javascript">
    jQuery('#pt_options').pizzaToppings({});        
  </script>                 
<?php endif; ?>     
</div>

    