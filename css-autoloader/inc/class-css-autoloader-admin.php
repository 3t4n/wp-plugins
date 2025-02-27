<?php

/**
 * The CSS AutoLoader admin plugin class
 *
 * @since 5.0.0
 */
 
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The admin plugin class
 */
if ( !class_exists( 'PP_Css_Autoloader_Admin' ) ) {
  
  class PP_Css_Autoloader_Admin extends PPF09_Admin {

    
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
					'title'   => esc_html__( 'General', 'css-autoloader' ),
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
		
      $screen_id = add_theme_page ( $this->core()->get_plugin_name(), $this->core()->get_plugin_shortname(), 'manage_options', 'cssautoloader', array( $this, 'show_admin' ) );
      $this->set_screen_id( $screen_id );
	  
    }
    
   
   
    /**
     * show admin page
     */
    function show_admin() {
      
      $this->show( 'manage_options' );
      
    }
    
    
    /**
     * add links to plugins table
     */
    function add_settings_links( $links ) {
		
      return array_merge( $links, array( '<a href="' . admin_url( 'themes.php?page=cssautoloader' ) . '" title="' . __( 'Show currently loaded files', 'css-autoloader' ) . '">' . __( 'Show currently loaded files', 'css-autoloader' ) . '</a>', '<a href="https://wordpress.org/support/plugin/' . $this->core()->get_plugin_slug() . '/reviews/" title="' . __( 'Please rate plugin', 'css-autoloader' ) . '">' . __( 'Please rate plugin', 'css-autoloader' ) . '</a>' ) );
      
    }
    
    
    /**
     * list currently loaded css files on admin page
	 * moved from main class in v 5.0.0
     */
    private function show_current() {
		
		$filesarray = $this->core()->getAllFiles();
		$possibledirs = $this->core()->getDirs();
		
		$list = '<h2>' . __( 'Currently loaded CSS files (in that order)', 'css-autoloader') . '</h2>';
      
		if ( empty( $filesarray ) ) {
			
			$list .= __( 'no files loaded currently', 'css-autoloader' );
      
		} else {
        
			$list .= '<table>';
			
			foreach ( $filesarray as $file ) {
				
				$list .= '<tr><th>URL</th><td><a href="' . $file['url'] . '">' . $file['url'] . '</a></td></tr>' .
				         '<tr><th>' . __( 'File', 'css-autoloader' ) . '</th><td><code>' . $file['name'] . '</code></td></tr>' .
				         '<tr><th>' . __( 'Media', 'css-autoloader' ) . '</th><td>' . $file['media'] .  '</td></tr>' .
						 '<tr><th>&nbsp;</th><td>&nbsp;</td></tr>';
			}
			
			$list .= '</table>';
		}
		
		$list .= '<h2>' . __( 'Possible paths to store your CSS files', 'css-autoloader') . '</h2>';
		
		$list .= '<table>';
        
		$list .= '<tr><th>' . __( 'General Directory', 'css-autoloader') . '</th>' .
                 '<td><code>' . $possibledirs['general']['dir'] . '</code></td></tr>';
				 
		$list .= '<tr><th>' . __( 'Theme Directory', 'css-autoloader') . '</th>' .
                 '<td><code>' . $possibledirs['theme']['dir'] . '</code></td></tr>';
				 
		$list .= '<tr><th>' . __( 'Child Theme Directory', 'css-autoloader') . '</th><td>';
           
		if ( $possibledirs['childtheme'] ) {
        
			$list .= '<code>' . $possibledirs['childtheme']['dir'] . '</code>';
		
		} else {
        
			$list .= __( 'You are not using a Child Theme', 'css-autoloader' );
        
		}
		
		$list .= '</td></tr></table><style> .pp-admin-page-inner th {text-align: left; padding-right: 6px; } </style>';
        
		return $list;
		
    }
  
  }
  
}

?>