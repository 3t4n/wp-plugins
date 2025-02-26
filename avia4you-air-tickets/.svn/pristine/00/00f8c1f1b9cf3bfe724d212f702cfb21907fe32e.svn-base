<?php
/*
Plugin Name: AVIA4YOU.COM.UA - AIR Tickets Plugin
Plugin URI: http://avia4you.com.ua/
Description: Best online search cheap airtickets from AVIA4YOU.COM.UA
Author: AVIA4YOU.COM.UA
Version: 1.1
*/ 

function avia4you_plugin($args) {
    extract($args, EXTR_SKIP);
    $options = get_option('avia4you_plugin');
    $title = empty($options['title']) ? 'Авиабилеты от AVIA4YOU.COM.UA' : $options['title'];    
?>
        <?php echo $before_widget; ?>
            <?php echo $before_title . $title . $after_title; ?>
			<?php echo '<iframe src="https://avia4you.galileo.com.ua/iframe" width="425" height="360" scrolling="no" frameborder="0"></iframe>';?>
	
        <?php echo $after_widget; ?>
<?php
}

function avia4you_plugin_init() {
    register_sidebar_widget('AVIA4YOU AIR Tickets', 'avia4you_plugin');
}

add_action('init', 'avia4you_plugin_init');
?>