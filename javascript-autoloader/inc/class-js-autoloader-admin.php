<?php

/**
 * The JavaScript AutoLoader admin plugin class
 *
 * @since 5.0.0
 */
 
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The admin plugin class
 */
if ( !class_exists( 'PP_Js_Autoloader_Admin' ) ) {
  
  class PP_Js_Autoloader_Admin extends PPF09_Admin {

    
    /**
	 * Do Init
     *
     * @since 5.0.0
     * @access public
     */
	 public function init() {
		 
		$this->add_actions( array( 
			'admin_init',
			'admin_menu'
		) );
	  
	 }
    
    /**
     * init admin 
     */
    function action_admin_init() {
      
		$this->add_setting_sections(
      
			[
      
				[
        
					'section' => 'general',
					'order'   => 10,
					'title'   => esc_html__( 'General', 'javascript-autoloader' ),
					'icon'    => 'general',
					'html'     => $this->show_current(),
					'nosubmit' => true
        
				]
			]
        
		);
      
    }
    
    
    /**
     * create the menu entry
     */
    function action_admin_menu() {
		
      $screen_id = add_theme_page ( $this->core()->get_plugin_name(), $this->core()->get_plugin_shortname(), 'manage_options', 'jsautoloader', array( $this, 'show_admin' ) );
      $this->set_screen_id( $screen_id );
	  
    }
    
   
   
    /**
     * show admin page
     */
    function show_admin() {
            
      $this->show( 'manage_options' );
      
    }
    
    
    /**
     * list currently loaded JS files on admin page
	 * moved from main class in v 5.0.0
     */
    private function show_current() {
		
		$filesarray = $this->core()->getAllFiles();
		$possibledirs = $this->core()->getDirs();
		
		$list = '<h2>' . __( 'Currently loaded JavaScript files (in that order)', 'javascript-autoloader') . '</h2>';
      
		if ( empty( $filesarray ) ) {
			
			$list .= __( 'no files loaded currently', 'javascript-autoloader' );
      
		} else {
        
			$list .= '<table>';
			
			$positions = [
				[ 'footer' => false, 'title' => __( 'in Header', 'javascript-autoloader' ), 'files' => [] ],
				[ 'footer' => true,  'title' => __( 'in Footer', 'javascript-autoloader' ), 'files' => [] ]
			];
			
			foreach( $positions as &$position ) {
				
				foreach ( $filesarray as $file ) {
					if ( $file['footer'] == $position['footer'] ) {
						$position['files'][] = $file;
					}
				}
				
			}
			
			foreach( $positions as $pos ) {
				
				if ( ! empty( $pos['files'] ) ) {
					
					$list .= '<tr><th>&nbsp;</th><td>' . $pos['title'] . '</td></tr>' .
						 '<tr><th>&nbsp;</th><td>&nbsp;</td></tr>';
				
					foreach ( $pos['files'] as $file ) {
						
						$list .= '<tr><th>URL</th><td><a href="' . $file['url'] . '">' . $file['url'] . '</a></td></tr>' .
								 '<tr><th>' . __( 'File', 'javascript-autoloader' ) . '</th><td><code>' . $file['name'] . '</code></td></tr>' .
								 '<tr><th>&nbsp;</th><td>&nbsp;</td></tr>';
					}
				}
			}
		
			
			$list .= '</table>';
		}
		
		$list .= '<h2>' . __( 'Possible paths to store your JavaScript files', 'javascript-autoloader') . '</h2>';
		
		$list .= '<table>';
        
		$list .= '<tr><th>' . __( 'General Directory', 'javascript-autoloader') . '</th>' .
                 '<td><code>' . $possibledirs['general']['dir'] . '</code></td></tr>';
				 
		$list .= '<tr><th>' . __( 'Theme Directory', 'javascript-autoloader') . '</th>' .
                 '<td><code>' . $possibledirs['theme']['dir'] . '</code></td></tr>';
				 
		$list .= '<tr><th>' . __( 'Child Theme Directory', 'javascript-autoloader') . '</th><td>';
           
		if ( $possibledirs['childtheme'] ) {
        
			$list .= '<code>' . $possibledirs['childtheme']['dir'] . '</code>';
		
		} else {
        
			$list .= __( 'You are not using a Child Theme', 'javascript-autoloader' );
        
		}
		
		$list .= '</td></tr></table><style> .pp-admin-page-inner th {text-align: left; padding-right: 6px; } </style>';
        
		return $list;
		
    }
  
  }
  
}

?>