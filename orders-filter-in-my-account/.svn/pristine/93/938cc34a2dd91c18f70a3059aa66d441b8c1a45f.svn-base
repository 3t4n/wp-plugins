<?php

class Wos_biawp_Activator {

	public static function activate() 
	{

	    if( ! get_option('wos-setting') ) 
		{
			update_option('wos-setting', serialize([]));
		}
            
            
        add_option('my_plugin_do_activation_redirect', true);
	}

}
