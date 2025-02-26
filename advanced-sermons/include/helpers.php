<?php

function asp_pro_activated() {
	if(in_array('advanced-sermons-pro/advanced-sermons-pro.php', apply_filters('active_plugins', get_option('active_plugins')))){ 
		return true; // Advanced Sermons Pro is activated
	}
	return false; // Advanced Sermons Pro is not activated
}
