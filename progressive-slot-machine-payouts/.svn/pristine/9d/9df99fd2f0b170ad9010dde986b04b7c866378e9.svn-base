<?php
  
   // Plugin Name: Progressive Slot Machine Payouts
   // Version: 1.0
   // Plugin URI: http://www.onlinemarketing.eu
   // Description: Displays the names and current payouts of several popular slot machines from RTG, Play Tech and Microgaming.
   // Author: Online Marketing
   // Author URI: http://www.onlinemarketing.eu
   
  class ProgressiveSlotMachinePayouts extends WP_Widget {
    
    // Initialize this widget.
    //
    function ProgressiveSlotMachinePayouts() {
      $widget_options = array();
      $control_option = array();
      
      // The first argument is the value that WordPress will use to generate
      // HTML ID values and references in URIs.
      //
      // Examples:
      //  <div id='widget-7_progressive_slot_machine_payouts-__i__'>
      //  <a href="/wp-admin/widgets.php?editwidget=progressive_slot_machine_payouts-2&#038;addnew=1&#038;num=3&#038;base=progressive_slot_machine_payouts">
      //
      // The second argument is the value that will be displayed to the user
      // as the title of the widget when they visit their
      // "wp-admin/widgets.php" page.
      //
      // I have not figured out what the last two arguments are for.
      //
      $this->WP_Widget('progressive_slot_machine_payouts', 'Progressive Slot Machine Payouts', $widget_options, $control_option);
    }
   
    // Display the widget.
    //
    function widget($args, $instance) {
      $progressive_slot_machine_payouts = file_get_contents('http://winchester.onlinemarketing.eu/progressive_payouts/' . $instance['mode']);
      echo $progressive_slot_machine_payouts;
    }

    // Save changes to the widget.
    //
    function update($updated_attributes, $instance) {
      $instance['mode'] = $updated_attributes['mode'];
      return $instance;
    }

    // Displays a form to edit the widget.
    //
    function form($instance) {
      // Do something that infuses the $instance variable with previously saved
      // options.
      $instance = wp_parse_args((array) $instance, array('mode' => 'all'));
      
      // Literally break out of a function within a class to echo HTML. Way to
      // go WordPress, way to go.
      
      ?>
      
        <p>Show progressive slot machine payouts from these companies:</p>
        <p>
          <input type="radio" name="<?php echo $this->get_field_name('mode'); ?>" value="rtg" <?php if($instance['mode'] == 'rtg') echo 'checked="true"'; ?> /> RTG<br />
          <input type="radio" name="<?php echo $this->get_field_name('mode'); ?>" value="microgaming" <?php if($instance['mode'] == 'microgaming') echo 'checked="true"'; ?> /> Microgaming<br />
          <input type="radio" name="<?php echo $this->get_field_name('mode'); ?>" value="play_tech" <?php if($instance['mode'] == 'play_tech') echo 'checked="true"'; ?> /> Play Tech<br />
          <input type="radio" name="<?php echo $this->get_field_name('mode'); ?>" value="all" <?php if($instance['mode'] == 'all') echo 'checked="true"'; ?> /> All companies
        </p>
        
      <?php
      
    }
    
  }

  function ProgressiveSlotMachinePayoutsInit() {
		register_widget('ProgressiveSlotMachinePayouts');
	}
  
	add_action('widgets_init', 'ProgressiveSlotMachinePayoutsInit');

  // Let us know you activated or deactivated our plugin. Thanks!

  function activate_progressive_slot_machine_payouts() {
    update_option('progressive_slot_machine_payouts_installed', '1');
    file_get_contents('http://winchester.onlinemarketing.eu/installations/create?installation[uri]=' . urlencode($_SERVER['SERVER_NAME']) . '&installation[activity]=activate&installation[plugin_or_widget_name]=' . urlencode('Progressive Slot Machine Payouts'));
  }
  
  function deactivate_progressive_slot_machine_payouts() {
    update_option('progressive_slot_machine_payouts_installed', '0');
    file_get_contents('http://winchester.onlinemarketing.eu/installations/create?installation[uri]=' . urlencode($_SERVER['SERVER_NAME']) . '&installation[activity]=deactivate&installation[plugin_or_widget_name]=' . urlencode('Progressive Slot Machine Payouts'));
  }

  register_activation_hook(__FILE__, 'activate_progressive_slot_machine_payouts');
  register_deactivation_hook(__FILE__, 'deactivate_progressive_slot_machine_payouts');

?>