<?php
/*
Plugin Name: Airline Tickets Plugin
Plugin URI: http://tickets.ua/
Description: quick search of airline tickets
Author: Salyga Sasha
Version: 1.0
*/ 

function tickets_airline_plugin($args) {
    extract($args, EXTR_SKIP);
    $options = get_option('tickets_airline_plugin');
    $title = empty($options['title']) ? 'Заказать Авиабилеты' : $options['title'];    
	$wid = empty($options['wid']) ? '430' : $options['wid'];  
?>
        <?php echo $before_widget; ?>
            <?php echo $before_title . $title . $after_title; ?>
			<?php echo '<iframe src="http://widgets.tickets.ua/avia.php" width="'.$wid.'" height="275" scrolling="no"></iframe>';?>
			<div style="clear:both;font-size:0.8em;line-height:1.1em;margin:-28px 0 0;color:#21224C;overflow:hidden;padding:0 0 0 11px;position:relative;white-space:nowrap;">
				Powered by <a href="http://tickets.ua" target="_blank" style="color:#AA4C9D;">tickets.ua</a>
			</div>	
        <?php echo $after_widget; ?>
<?php
}

function tickets_airline_plugin_control() {
    $options = $newoptions = get_option('tickets_airline_plugin');
    if ( $_POST["tickets_airline_plugin-submit"] ) {
        $newoptions['title'] = strip_tags(stripslashes($_POST["tickets_airline_plugin-title"]));
		$newoptions['wid'] = strip_tags(stripslashes($_POST["tickets_airline_plugin-wid"]));
    }
    if ( $options != $newoptions ) {
        $options = $newoptions;
        update_option('tickets_airline_plugin', $options);
    }
    $title = htmlspecialchars($options['title'], ENT_QUOTES);
	$wid = htmlspecialchars($options['wid'], ENT_QUOTES);
?>
            <p>
            	<label for="tickets_airline_plugin-title">
            		<?php _e('Title:'); ?> 
            	<input style="width: 250px;" id="tickets_airline_plugin-title" name="tickets_airline_plugin-title" type="text" value="<?php echo $title; ?>" /></label>
            </p>
			<p>
            	<label for="tickets_airline_plugin-wid">
            		<?php _e('Ширина блока (минимально: 430):'); ?> 
            	<input style="width: 250px;" id="tickets_airline_plugin-wid" name="tickets_airline_plugin-wid" type="text" value="<?php echo $wid; ?>" /></label>
            </p>
            <input type="hidden" id="tickets_airline_plugin-submit" name="tickets_airline_plugin-submit" value="2" />
<?php
}

function tickets_airline_plugin_init() {
    register_sidebar_widget('Airline Tickets', 'tickets_airline_plugin');
    register_widget_control('Airline Tickets', 'tickets_airline_plugin_control', 300, 90);
}

add_action('init', 'tickets_airline_plugin_init');
?>