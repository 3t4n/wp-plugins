<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!!' );

if ( !class_exists( 'WPMICONSLITE_FRONT' ) ) {

    class WPMICONSLITE_FRONT extends WPMICONSLITE_Library{
        /**
         * Executes all the tasks on Plugin activation
         * 
         * @since 1.0.0
         */
        function __construct() {
            add_filter( 'wp_nav_menu_args', array( $this, 'wpmenu_set_icon_args' ), 999999 );
            add_filter( 'wp_nav_menu', array($this, 'wpmenu_remove_title_filter' ) );
            // add_filter( 'nav_menu_css_class', array( $this, 'wpmenuicon_classes' ), 1, 3 );
            add_filter( 'nav_menu_css_class', array( $this, 'wpmenuicon_classes' ), 10, 3 );
            add_filter( 'wp_nav_menu_objects', array( $this, 'wpmi_addmenu' ), 9, 2 );
            /* Apply Neccessary Classes for li items of top level menu with depth check*/
            add_filter( 'wpmi_navmenuafterobj', array( $this, 'wpmi_setclassesmenuitems' ), 7, 2 );
            add_action('wp_head',array($this,'fn_custom_menuicon_styles'));
        }


        public function wpmi_addmenu( $items, $args ){
          $items = apply_filters( "wpmi_navmenuafterobj", $items, $args );                
          return $items;
        }
        /**
     * Apply column and clear classes to menu items (inc. widgets)
     */
    public function wpmi_setclassesmenuitems( $items, $args ) {
      // WPMICONSLITE_Library::displayArr($args);
      $args = json_decode(json_encode($args), true);
      //$menu_id = (int) $args['menu']['term_id'];
      $menu_id = (isset($args['menu']['term_id']) && $args['menu']['term_id'] != '')?(int) $args['menu']['term_id']:'';
      if($menu_id != ''){
      $icon_settings = get_option( 'wpmi_icon_settings' ); //get all plugin metabox data 
      $enable_menuicon = (isset($icon_settings['menuid_'.$menu_id]['enable_menu_icon']) && $icon_settings['menuid_'.$menu_id]['enable_menu_icon'] != '')?esc_attr($icon_settings['menuid_'.$menu_id]['enable_menu_icon']):0;
      if($enable_menuicon == 1){
        foreach ( $items as $item ) {
          $menu_settings = get_post_meta( $item->ID , '_wpmenuiconsettings', true );
           $all_menu_settings = (isset($menu_settings['wpmi_icon_settings']) && !empty($menu_settings['wpmi_icon_settings']))?$menu_settings['wpmi_icon_settings']:array();
           $icon_menu_settings = (isset($all_menu_settings['icon_settings']) && !empty($all_menu_settings['icon_settings']))?$all_menu_settings['icon_settings']:array();
           $general_settings = (isset($all_menu_settings['general_settings']) && !empty($all_menu_settings['general_settings']))?$all_menu_settings['general_settings']:array();            
           $disable_menu_label = (isset($general_settings['disable_menu_label']) && $general_settings['disable_menu_label'] == "true")?1:0;
           $disable_desktop = (isset($general_settings['disable_desktop']) && $general_settings['disable_desktop'] == "true")?1:0;
            $icon_position = (isset($general_settings['icon_position']) && $general_settings['icon_position'] != '')?esc_attr($general_settings['icon_position']):'left';
           //animation
           $enable_animation = (isset($icon_menu_settings['enable_animation']) && $icon_menu_settings['enable_animation'] == 1)?1:0;
           $hover_animation_effect = (isset($icon_menu_settings['hover_animation_effect']) && $icon_menu_settings['hover_animation_effect'] != '')?esc_attr($icon_menu_settings['hover_animation_effect']):'';

           $ddclass = ($disable_desktop == 1)?' wpmi-disable-desktop':'';
           $classes = ($disable_menu_label == 1)?' wpmi-hide-label':'';
           $iposition_class = ' wpmi-iposition-'.$icon_position;
           $item->classes[] = $ddclass;
           $item->classes[] = $classes;
           $item->classes[] = $iposition_class;
           if($enable_animation){
            $item->classes[] = 'wpmi-enable-animation '.$hover_animation_effect;
           }
           $item->classes[] = 'wpmi-custom-style-'.$item->ID;
         }
        }
         }
        return $items;
      }

       /*
        * Add filter to 'the_title' hook
       */
        public function wpmenu_set_icon_args( $args ){
         $icon_settings = get_option( 'wpmi_icon_settings' ); //get all plugin metabox data 
         $allmenus =  get_terms( 'nav_menu' );
         if(isset($allmenus) && !empty($allmenus)){
          $menus = json_decode(json_encode($allmenus), true);
          $menu_name = (isset($args['theme_location']) && $args['theme_location'] != '')?esc_attr($args['theme_location']):'';
         // $locations = get_nav_menu_locations();
         // $menu_id = $locations[ $menu_name ];
    
        foreach ($menus as $key => $value) {
            $menu_term_id = (int) $value['term_id'];
            $enable_menuicon = (isset($icon_settings['menuid_'.$menu_term_id]['enable_menu_icon']) && $icon_settings['menuid_'.$menu_term_id]['enable_menu_icon'] == 1)?1:0;
           //  if( $enable_menuicon == 1 && $menu_id == $menu_term_id){
               add_filter( 'the_title', array( $this, 'wpmicons_display_icon' ), 999, 2 );
               add_filter( 'megamenu_the_title', array( $this, 'wpmicons_display_icon' ), 999, 2 );//For max mega menu compatible
               add_filter( 'wp_mega_menu_the_title', array( $this, 'wpmicons_display_icon' ), 999, 2 );//For wp mega menu pro compatible
            // }
          }
        }
            return $args;
        }

        /**
         * Remove the_title filter hook for other post title.
         */
        public function wpmenu_remove_title_filter( $nav_menu ) {
          remove_filter( 'the_title', array(  $this,  'wpmicons_display_icon' ), 999, 2 );
          remove_filter( 'megamenu_the_title', array(  $this,  'wpmicons_display_icon' ), 999, 2 );//For max mega menu compatible
          remove_filter( 'wp_mega_menu_the_title', array(  $this,  'wpmicons_display_icon' ), 999, 2 );//For wp mega menu pro compatible
          return $nav_menu;
        }

              
        /*
         * Add set icon to specific menu item title
         */
        public function wpmicons_display_icon( $mtitle, $menu_id ){
           $icon = "";
           $menu_settings = get_post_meta( $menu_id, '_wpmenuiconsettings', true );
           $all_menu_settings = (isset($menu_settings['wpmi_icon_settings']) && !empty($menu_settings['wpmi_icon_settings']))?$menu_settings['wpmi_icon_settings']:array();
           $icon_menu_settings = (isset($all_menu_settings['icon_settings']) && !empty($all_menu_settings['icon_settings']))?$all_menu_settings['icon_settings']:array();
           $general_settings = (isset($all_menu_settings['general_settings']) && !empty($all_menu_settings['general_settings']))?$all_menu_settings['general_settings']:array();
           
           $icon_type = (isset($icon_menu_settings['icon_type']) && $icon_menu_settings['icon_type'] != '')?esc_attr($icon_menu_settings['icon_type']):'';
           $icon_picker_input = (isset($icon_menu_settings['icon_picker_input']) && $icon_menu_settings['icon_picker_input'] != '')?esc_attr($icon_menu_settings['icon_picker_input']):'';
           if($icon_picker_input != ''){
            if(strstr($icon_picker_input, '|')){
                $mexplodeicon = explode('|', $icon_picker_input); 
                $menuicon = $mexplodeicon[0] . ' ' . $mexplodeicon[1];
              }else{
                $menuicon = $icon_picker_input;
              }
           }else{
            $menuicon = '';
           }
           

           $icon_position = (isset($general_settings['icon_position']) && $general_settings['icon_position'] != '')?esc_attr($general_settings['icon_position']):'left';
            $disable_menu_label = (isset($general_settings['disable_menu_label']) && $general_settings['disable_menu_label'] == "true")?1:0;

            //animation
           $enable_animation = (isset($icon_menu_settings['enable_animation']) && $icon_menu_settings['enable_animation'] == 1)?1:0;
           if($enable_animation){
            $animation_icon_class = ' hvr-icon';
           }else{
            $animation_icon_class = '';
           }
 
           $title_wrapped = "<span class='wpmi-mlabel'>".$mtitle."</span>";           
       
          if($icon_type == "available_font_icon"){
            if ( $menuicon != '' ) {
              $icon = "<div class='wpmicons-set wpmicons-avicon'><i class='".$menuicon.$animation_icon_class."' aria-hidden='true'></i></div>";
            }
          }

          
          /* Set position for icon */
          if ( 'left' === $icon_position ) {
            if($disable_menu_label == 1){
               $title_append_icon = "{$icon}";
            }else{
              $title_append_icon = "{$icon}{$title_wrapped}";
            } 
          } else {
            if($disable_menu_label == 1){
              $title_append_icon = "{$icon}";
            }else{
              $title_append_icon = "{$title_wrapped}{$icon}";
            }
            
          }
          
          $title_append_icon = apply_filters( 'wp_menu_icons_item_title', $title_append_icon, $menu_id, $mtitle );

          return $title_append_icon;

       }

        /*
         * Load Main Plugin's Common Class for each menu items
        */
        function wpmenuicon_classes($classes, $item, $args = array()) {
          $result_args =  (array) $args;
          $result_item =  (array) $item;
          if(isset($result_args) && !empty($result_args['menu'])){
          $menu_id =  $result_args['menu']->term_id;
          $isettings = get_option( 'wpmi_icon_settings' ); //get all plugin metabox data 
          $enable_menuicon = (isset($isettings['menuid_'.$menu_id]['enable_menu_icon']) && $isettings['menuid_'.$menu_id]['enable_menu_icon'] == 1)?1:0;
           if($enable_menuicon == 1){
               $classes[] = 'wpmi-each-menu-item';
               if($result_item['menu_item_parent'] != 0){
                  $classes[] = 'wpmi-each-sub-mitem';
               }
           }
          }
          return $classes;
        }

       /*
        * Load CSS on Header
       */
      public function fn_custom_menuicon_styles(){
        $allmenus =  get_terms( 'nav_menu' );
       if(isset($allmenus ) && !empty($allmenus )){
        $menus = json_decode(json_encode($allmenus), true);//object to array conversion
        //WPMICONSLITE_Library::displayArr($allmenus);
        $isettings = get_option( 'wpmi_icon_settings' ); ?><style><?php foreach ($menus as $key => $value) {
         $term_id =  (int) $value['term_id'];
         $enable_micon = (isset($isettings['menuid_'.$term_id]['enable_menu_icon']) && $isettings['menuid_'.$term_id]['enable_menu_icon'] == 1)?1:0;
         if( $enable_micon == 1){
          $menuitems = wp_get_nav_menu_items( $term_id, array( 'order' => 'DESC' ) );
           if(isset($menuitems) && !empty($menuitems)):
             foreach ($menuitems as $key => $value) {
             $menuID = ( int ) $value->ID;
             $micon_settings = get_post_meta( $menuID, '_wpmenuiconsettings', true );
               include(WPMICONSLITE_PATH.'includes/views/frontend/menu_icon_styling.php');
             } 
            endif;         
         }//end enable check
        }?></style>
         <?php }
      }
       
    }
    new WPMICONSLITE_FRONT();
}