<?php

if (!class_exists('WP_Ajax_Class')) {
	
	class WP_Ajax_Class {
	
		
			public function __construct() {
                            /* constructor */

                        }
			
			
			public static function To_Do( $args = array() )
			{
				
				@extract($_REQUEST);
				
				$callback_function = strtolower($callback_function);
				
				switch( $callback_function ) {
					
					case "save_category_lightbox":
				
							self::Save_Category_Lightbox();
							die();
							
					break;
                                        
					
					default:
					
							self::Undefined();
							die();
				
				}				
				
			}

			
			
			function Save_Category_Lightbox()
			{
                                global $WP_Category_Lightbox;
				@extract($_REQUEST);
                                $cat_array = array();
                                $output = "";
                                $cat_array = array_filter( explode(",", $_REQUEST['cats']) );


                                if( count( $cat_array ) > 0 ) foreach( $cat_array as $cat ) {

                                    $temp = file_get_contents($WP_Category_Lightbox->plugin_source_path."snippets/category-list.html");
                                    $output .= str_replace("%%Cat_title%%",get_cat_name($cat),$temp);
                                    
                                }

                                echo $output;
				die;
					
			}
			
			
			function Undefined()
			{
				
				echo 'Undefined Action';
				
			}
			
			
	
	}
	
}
