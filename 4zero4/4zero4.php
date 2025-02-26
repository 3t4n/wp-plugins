<?php
/*
Plugin Name: 4zero4
Description: Gestione pagina non trovata, effettua una ricerca cercando termini relativi alla pagina assente
Author: DevFabio
Version: 1.1
Author URI: https://www.inventyourtrade.it
*/
add_action('wp', 'p4zero4_redirect');
function p4zero4_redirect()
{
        if(is_404()) 
	        {
	           $paginaMancante	=	urldecode(str_replace('-',' ',$_SERVER['REDIRECT_URL']));
	           $ricerca	=	get_search_link( $paginaMancante );
	          
               
                       header ('HTTP/1.1 301 Moved Permanently');
                       header ("Location: " . $ricerca);
                        exit(); 
              
        }
	}
