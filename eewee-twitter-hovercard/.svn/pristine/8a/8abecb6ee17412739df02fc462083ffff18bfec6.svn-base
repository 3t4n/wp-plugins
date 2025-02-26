<?php
if( !class_exists(EeweeTwitterHovercard)){
	class EeweeTwitterHovercard{
		
		function __construct(){
                    $this->init();
                    
                    // SHORTCODE
//                  add_shortcode( 'xxx', array($this, 'fct') );
		}//fin constructeur

		// init
		function init(){ 
                    $this->getOptionsAdmin();
                
                    add_action("wp_head", array($this, "render") );
                }

		// execute lors de l'activation du plugin
		function eewee_activate(){}

		// execute lors de la désactivation du plugin
		function eewee_deactivate(){}
		
		/**
		 * Gestion des menus du site
		 */
		function eewee_adminMenu(){
			// main menu
			add_menu_page( "eeweeTwitterHovercard", "Eewee Twitter Hovercard", "manage_options", "idEeweeTwitterHovercard", array($this, menu), plugins_url("eewee-twitter-hovercard/img/icon.png") );
			// submenu (into main menu)
			add_submenu_page( "idEeweeTwitterHovercard", "Setting", "Setting", "manage_options", "idSousMenuTH1", array($this, sousMenu1));
			add_submenu_page( "idEeweeTwitterHovercard", "Manual", "Manual", "manage_options", "idSousMenuTH2", array($this, sousMenu2));
			
			// menu B
//			add_object_page( "monMenuB", "monMenuB", "manage_options", "idMonMenuB", "fct_b" );
			// submenu (into main menu)
//			add_pages_page( "sousPages", "sous page ici", "manage_options", "idSousMenuPage", "fct_sousMenu");
			
			// appel init
			add_action('admin_init', array($this, 'init'));
		}
		
                
                function render(){
                	
                    if( get_option( "eewee_twitterhovercard_val_enabled" ) == 'on' ){
           	           	$tbl['attr_expanded']	= get_option( "eewee_twitterhovercard_val_expanded" );
           	           	$tbl['attr_linkify']	= get_option( "eewee_twitterhovercard_val_linkify" );
           	           	$tbl['attr_infer']		= get_option( "eewee_twitterhovercard_val_infer" );
                    	$version				= get_option( "eewee_twitterhovercard_val_version" );
                    	$apikey 				= get_option( "eewee_twitterhovercard_val_apikey" );
                    	
                    	if( empty($tbl['attr_expanded']) ){ $tbl['attr_expanded'] = "expanded:false"; }else{ $tbl['attr_expanded'] = "expanded:true"; }
                    	if( empty($tbl['attr_linkify']) ){ $tbl['attr_linkify'] = "linkify:false"; }else{ $tbl['attr_linkify'] = "linkify:true"; }
                    	if( empty($tbl['attr_infer']) ){ $tbl['attr_infer'] = "infer:false"; }else{ $tbl['attr_infer'] = "infer:true"; }
                    	if( empty($version) ){ $version = 1; }
                    	if( empty($apikey) ){
                    		// apikey obligatoire
                    	}else{
                    		$options = implode( ",", $tbl );
	                    	echo '
							<script src="http://platform.twitter.com/anywhere.js?id='.$apikey.'&v='.$version.'" type="text/javascript"></script>
							<script type="text/javascript">
								twttr.anywhere(function (T) {
									T.hovercards({
										'.$options.'
                    				});
								});
							</script>';
                    	}
                    }
                }
                
		/**
		 * Page : main menu
		 */
		function menu(){ echo "Main menu here"; }


		/**
		 * Page : submenu 1
		 */
		function sousMenu1(){ include(EEWEE_TWITTERHOVERCARD_PLUGIN_DIR.'/view/twitterhovercard.php'); }
		
		/**
		 * Page : submenu 1
		 */
		function sousMenu2(){ include(EEWEE_TWITTERHOVERCARD_PLUGIN_DIR.'/view/manual.php'); }

		
		
		/**
		 * Shortcode 
		 * @param unknown_type $atts
		 */
		/*
		function xxx( $atts='' ){
			extract( shortcode_atts(array('type'=>''), $atts ));
			include(EEWEE_TWITTERCARD_PLUGIN_DIR.'/view/xxx.php');
		}//fin function
		*/

		
		
		/**
		 * Définition des options
		 */
		function getOptionsAdmin(){
			//assigne les valeurs par défaut aux options d'administration
			$tbl_optionsAdmin = array(
				'eewee_twitterhovercard_val_expanded'	=> 'on',
				'eewee_twitterhovercard_val_expanded'	=> 'on',
				'eewee_twitterhovercard_val_linkify'	=> 'on',
				'exclude_ips'	=> ''
			);
			//recup les options stockées en bdd
			$options = get_option($this->adminOptionsName);
			//si les options existent dans la base de données, les valeurs par défaut sont écrasées par celles de la base			
			if( !empty($options) ){
				foreach( $options as $k=>$v ){
					$tbl_optionsAdmin[$k] = $v;
				}
			}
			//les options sont stockées dans la base
			update_option($this->adminOptionsName, $tbl_optionsAdmin);
			//les options sont renvoyées pour être utilisées
			return $tbl_optionsAdmin;
		}

	}//fin class
}//fin if
