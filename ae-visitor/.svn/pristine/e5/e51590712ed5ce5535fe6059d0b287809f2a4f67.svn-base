<?php

function ae_visitor_install(){
	if (!get_option('ae_visitor_data')) {
		add_option('ae_visitor_data', 1);
		add_option('ae_visitor_day', 0);
		add_option('ae_visitor_yesterday', 0);
		add_option('ae_visitor_week', 0);
		add_option('ae_visitor_month', 0);
		add_option('ae_visitor_all', 0);
		
		add_option('ae_visitor_day_update');
		add_option('ae_visitor_week_update');
		add_option('ae_visitor_month_update');
	}
}
function ae_visitor_uninstall(){
	delete_option('ae_visitor_data');
	delete_option('ae_visitor_day');
	delete_option('ae_visitor_yesterday');
	delete_option('ae_visitor_week');
	delete_option('ae_visitor_month');
	delete_option('ae_visitor_all');
	
	delete_option('ae_visitor_day_update');
	delete_option('ae_visitor_week_update');
	delete_option('ae_visitor_month_update');
}

?>