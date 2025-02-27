<?php /**
 * @version 1.0
 * @package 
 * @category Core
 * @author wpdevelop
 *
 * @web-site http://oplugins.com/
 * @email info@oplugins.com 
 * 
 * @modified 2013.10.16
 */

class OPER_CSS extends OPER_JS_CSS{

    public function define() {
        
        $this->setType('css');
        
        /*
        // Exmaples of usage Font Avesome: http://fontawesome.io/icons/
        
        $this->add( array(
                            'handle' => 'font-awesome',
                            'src' => OPER_PLUGIN_URL . 'assets/libs/font-awesome-4.3.0/css/font-awesome.css' ,
                            'deps' => false,
                            'version' => '4.3.0',
                            'where_to_load' => array( 'admin' ),
                            'condition' => false    
                  ) );   
        
        // Exmaples of usage Font Avesome 3.2.1 (benefits of this version - support IE7): http://fontawesome.io/3.2.1/examples/ 
        $this->add( array(
                            'handle' => 'font-awesome',
                            'src' => OPER_PLUGIN_URL . '/assets/libs/font-awesome/css/font-awesome.css' ,
                            'deps' => false,
                            'version' => '3.2.1',
                            'where_to_load' => array( 'admin' ),
                            'condition' => false    
                  ) );            
        $this->add( array(
                            'handle' => 'font-awesome-ie7',
                            'src' => OPER_PLUGIN_URL . '/assets/libs/font-awesome/css/font-awesome-ie7.css' ,
                            'deps' => array('font-awesome'),
                            'version' => '3.2.1',
                            'where_to_load' => array( 'admin' ),
                            'condition' => 'IE 7'                               // CSS condition. Exmaple: <!--[if IE 7]>    
                  ) );  
        */
          
    }


    public function enqueue( $where_to_load ) {        
        

        if ( $where_to_load == 'admin' ) {                                                                                                      // Admin CSS files

			//FixIn: 2.0.2.1
	         wp_enqueue_style('wpdevelop-bts',       oper_plugin_url( '/assets/vendors/bootstrap/css/bootstrap.css' ),          array(), '3.3.5.1');
	         wp_enqueue_style('wpdevelop-bts-theme', oper_plugin_url( '/assets/vendors/bootstrap/css/bootstrap-theme.css' ),    array(), '3.3.5.1');

            wp_enqueue_style( 'oper-chosen',                oper_plugin_url( '/assets/vendors/chosen/chosen.css' ),array(), OPER_VERSION_NUM);
			wp_enqueue_style( 'oper-admin-support',         oper_plugin_url( '/_out/css/admin-support.css' ),       array(), OPER_VERSION_NUM);
			wp_enqueue_style( 'oper-admin-menu',            oper_plugin_url( '/_out/css/admin-menu.css' ),          array(), OPER_VERSION_NUM);
//wp_enqueue_style( 'oper-admin-toolbar',         oper_plugin_url( '/_out/css/admin-toolbar.css' ),       array(), OPER_VERSION_NUM);
			wp_enqueue_style( 'oper-settings-page',         oper_plugin_url( '/_out/css/settings-page.css' ),       array(), OPER_VERSION_NUM);
	        wp_enqueue_style( 'oper-admin-skin-modern_1',   oper_plugin_url( '/_out/css/admin-skin-modern_1.css' ),      array( 'oper-settings-page' ), OPER_VERSION_NUM ); //FixIn: 2.0.3.1  9.5.5.1
//wp_enqueue_style( 'oper-admin-listing-table',   oper_plugin_url( '/_out/css/admin-listing-table.css' ), array(), OPER_VERSION_NUM);
//wp_enqueue_style( 'oper-br-table',              oper_plugin_url( '/_out/css/admin-br-table.css' ),      array(), OPER_VERSION_NUM);
            // wp_enqueue_style( 'oper-admin-modal-popups',    oper_plugin_url( '/css/modal.css' ),                        array(), OPER_VERSION_NUM);
            // wp_enqueue_style( 'oper-admin-pages',           oper_plugin_url( '/css/admin.css' ),                        array(), OPER_VERSION_NUM);
            // wp_enqueue_style( 'oper-css-print',             oper_plugin_url( '/css/print.css' ),                        array(), OPER_VERSION_NUM);

            //wp_enqueue_style( 'oper-pagination',            oper_plugin_url( '/_out/css/o-pagination.css' ),   array(), OPER_VERSION_NUM );
        }         
        if (  ( $where_to_load != 'admin' ) || ( oper_is_new_oper_page() )  ){                                                               // Client or Add New item page
            // wp_enqueue_style( 'oper-client-pages',          oper_plugin_url( '/_out/css/client.css' ),                       array(), OPER_VERSION_NUM);
        }        
        if (  ( $where_to_load != 'admin' ) || ( oper_is_master_page() )  ){
            // wp_enqueue_style( 'oper-admin-popover',        oper_plugin_url( '/_out/css/popover.css' ),						 array(), OPER_VERSION_NUM);
        }        
        // wp_enqueue_style('oper-calendar',   oper_plugin_url( '/_out/css/calendar.css' ),                                     array(), OPER_VERSION_NUM);
                                                                                                                                                // Calendar Skins

        do_action( 'oper_enqueue_css_files', $where_to_load );
    }


    public function remove_conflicts( $where_to_load ) {        
    
        if ( oper_is_master_page() ) {
            if (function_exists('wp_dequeue_style')) {
                /*
                wp_dequeue_style( 'cs-alert' );
                wp_dequeue_style( 'cs-framework' );
                wp_dequeue_style( 'cs-font-awesome' );
                wp_dequeue_style( 'icomoon' );           
                */            
                wp_dequeue_style( 'chosen'); 
                wp_dequeue_style( 'toolset-font-awesome-css' );                               // Remove this script sitepress-multilingual-cms/res/css/font-awesome.min.css?ver=3.1.6, which is load by the "sitepress-multilingual-cms"
                wp_dequeue_style( 'toolset-font-awesome' );                          //FixIn: 5.4.5.8
                
            } 
        }
    }
}