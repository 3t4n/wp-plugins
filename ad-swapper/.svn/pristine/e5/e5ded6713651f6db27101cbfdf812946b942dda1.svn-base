<?php

// *****************************************************************************
// AD-DISPLAYER / AD-DISPLAY-WIDGET.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer ;

// =============================================================================
// Widget Class
// =============================================================================

//  class example_widget extends \WP_Widget {
//
//      /** constructor -- name this the same as the class above */
//      function example_widget() {
//          parent::WP_Widget(false, $name = 'Example Text Widget');
//      }

class ad_swapper_ad_display_widget extends \WP_Widget {

    // =========================================================================
    // Constructor
    // =========================================================================

//   * PHP5 constructor.
//   *
//   * @since 2.8.0
//   * @access public
//   *
//   * @param string $id_base         Optional Base ID for the widget, lowercase and unique. If left empty,
//   *                                a portion of the widget's class name will be used Has to be unique.
//   * @param string $name            Name for the widget displayed on the configuration page.
//   * @param array  $widget_options  Optional. Widget options. See {@see wp_register_sidebar_widget()} for
//   *                                information on accepted arguments. Default empty array.
//   * @param array  $control_options Optional. Widget control options. See {@see wp_register_widget_control()}
//   *                                for information on accepted arguments. Default empty array.
//
//  public function __construct( $id_base, $name, $widget_options = array(), $control_options = array() )

	function __construct() {
       	    parent::__construct(
       	                'ad_swapper_ad_display_widget'      ,
       	                'Ad Swapper Ad Displayer'           ,
                        array(
//                          'description'   =>  'Drag me to the widget area(s) you want to display Ad Swapper Ads in...'
                            'description'   =>  'Displays Ad Swapper ads.'
                            )
       	                ) ;
    }

    // =========================================================================
    // Widget::widget()
    // =========================================================================

//  /**
//   * Outputs the content of the widget
//   *
//   * @param array $args
//   * @param array $instance
//   */
//  public function widget( $args, $instance ) {
//      // outputs the content of the widget
//  }

//  /**
//   * Front-end display of widget.
//   *
//   * @see WP_Widget::widget()
//   *
//   * @param array $args     Widget arguments.
//   * @param array $instance Saved values from database.
//   */
//  public function widget( $args, $instance )

//  widget (line 44)
//  Echo the widget content.
//  Subclasses should over-ride this function to generate their widget code.
//
//  void widget (array $args, array $instance)
//      array $args: Display arguments including before_title, after_title, before_widget, and after_widget.
//      array $instance: The settings for the particular instance of the widget

    /** @see WP_Widget::widget -- do not rename this */
    function widget( $args , $instance ) {

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $args = Array(
    //                  [name]          => Main Sidebar
    //                  [id]            => themonic-sidebar
    //                  [description]   => This is a Sitewide sidebar which appears on posts and pages
    //                  [class]         =>
    //                  [before_widget] =>
    //                  [after_widget]  =>
    //                  [before_title]  =>
    //                  [after_title]   =>
    //                  [widget_id]     => ad_swapper_ad_display_widget-2
    //                  [widget_name]   => Ad Swapper Ad Displayer
    //                  )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $args , '$args' ) ;

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $instance = Array(
    //                      [title]   =>
    //                      [message] =>
    //                      )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $instance , '$instance' ) ;

//      extract( $args );
//      $title      = apply_filters('widget_title', $instance['title']);
//      $message    = $instance['message'];
//      ?->
//            <?-php echo $before_widget; ?->
//                <?-php if ( $title )
//                      echo $before_title . $title . $after_title; ?->
//                          <ul>
//                              <li><-?php echo $message; ?-></li>
//                          </ul>
//            <-?php echo $after_widget; ?->
//      <-?php

        // ---------------------------------------------------------------------

//      require_once( dirname( __FILE__ ) . '/ad-display-widget-support.php' ) ;
//
//      // -------------------------------------------------------------------------
//      // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
//      // get_ads_to_display(
//      //      $that           ,
//      //      $args           ,
//      //      $instance
//      //      )
//      // - - - - - - - - - - - - - - - - -
//      // Generates and returns the "Ad Swapper Ad Displayer" widget's admin
//      // form (where the widget's options are entered/edited).
//      //
//      // $args is the widget settings - including "before_title", "after_title",
//      // "before_widget", and "after_widget".
//      //
//      // $instance holds the previously saved values from the WordPress
//      // options database.
//      //
//      // Returns the widget HTML (which could be an error message).
//      //
//      // RETURNS
//      //      $widget_html STRING
//      // -------------------------------------------------------------------------
//
//      $widget_html =
//          \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\get_ads_to_display(
//              $this           ,
//              $args           ,
//              $instance
//              ) ;

        // ---------------------------------------------------------------------

//      require_once( dirname( __FILE__ ) . '/ad-display-generic-support.php' ) ;

        require_once( dirname( __FILE__ ) . '/display-ad-slot-ads.php' ) ;

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
        // get_ad_slot_widget_html(
        //      $that           ,
        //      $args           ,
        //      $instance
        //      )
        // - - - - - - - - - - - - - - - - -
        // Generates and returns the front-end HTML that goes where the widget
        // is.  In other words, generates and returns the Ad Swapper ad (or ads),
        // to go in the widget's ad slot.
        //
        // ---
        //
        // $that is the "ad slot" WordPress Widget object instance.
        //
        // $args is the widget settings - including "before_title", "after_title",
        // "before_widget", and "after_widget".
        //
        // $instance holds the previously saved values from the WordPress
        // options database.
        //
        // Returns the widget HTML (which could be an error message).
        //
        // RETURNS
        //      $widget_html STRING
        // -------------------------------------------------------------------------

        $widget_html =
            get_ad_slot_widget_html(
                $this           ,
                $args           ,
                $instance
                ) ;

        // ---------------------------------------------------------------------

        if ( trim( $widget_html ) !== '' ) {

            echo <<<EOT
{$args['before_widget']}
{$widget_html}
{$args['after_widget']}
EOT;

        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // WP_Widget::form()
    // =========================================================================

//  /**
//   * Back-end widget form.
//   *
//   * @see WP_Widget::form()
//   *
//   * @param array $instance Previously saved values from database.
//   */
//  public function form( $instance )

//  /**
//   * Outputs the options form on admin
//   *
//   * @param array $instance The widget options
//   */
//  public function form( $instance ) {
//      // outputs the options form on admin
//  }

//  form (line 66)
//
//  Echo the settings update form
//
//  void form (array $instance)
//      array $instance: Current settings

    // -------------------------------------------------------------------------

//  get_field_id (line 121)
//
//  Constructs id attributes for use in form() fields
//
//  This function should be used in form() methods to create id attributes for
//  fields to be saved by update()
//
//  return: ID attribute for $field_name
//
//  string get_field_id (string $field_name)
//      string $field_name: Field name

//  get_field_name (line 109)
//
//  Constructs name attributes for use in form() fields
//
//  This function should be used in form() methods to create name attributes for
//  fields to be saved by update()
//
//  return: Name attribute for $field_name
//
//  string get_field_name (string $field_name)
//      string $field_name: Field name

    // -------------------------------------------------------------------------

    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {

//      $title      = esc_attr($instance['title']);
//      $message    = esc_attr($instance['message']);
//      ?->
//       <p>
//        <label for="<-?php echo $this->get_field_id('title'); ?->"><-?php _e('Title:'); ?-></label>
//        <input class="widefat" id="<?-php echo $this->get_field_id('title'); ?->" name="<?-php echo $this->get_field_name('title'); ?->" type="text" value="<?-php echo $title; ?->" />
//      </p>
//      <p>
//        <label for="<-?php echo $this->get_field_id('message'); ?->"><?-php _e('Simple Message'); ?-></label>
//        <input class="widefat" id="<?-php echo $this->get_field_id('message'); ?->" name="<?-php echo $this->get_field_name('message'); ?->" type="text" value="<?-php echo $message; ?->" />
//      </p>
//      <?-php

        require_once( dirname( __FILE__ ) . '/ad-display-form-support.php' ) ;

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
        // get_ad_display_widget_admin_form(
        //      $that       ,
        //      $instance
        //      )
        // - - - - - - - - - - - - - - - - -
        // Generates and returns the "Ad Swapper Ad Displayer" widget's admin
        // form (where the widget's options are entered/edited).
        //
        // $instance holds the previously saved values from the WordPress
        // options database.
        //
        // Returns the form HTML (which could be an error message string).
        //
        // RETURNS
        //      $form_html STRING
        // -------------------------------------------------------------------------

        echo get_ad_display_widget_admin_form( $this , $instance ) ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // WP_Widget::update()
    // =========================================================================

//  /**
//   * Processing widget options on save
//   *
//   * @param array $new_instance The new options
//   * @param array $old_instance The previous options
//   */
//  public function update( $new_instance, $old_instance ) {
//      // processes widget options to be saved
//  }

//  /**
//   * Sanitize widget form values as they are saved.
//   *
//   * @see WP_Widget::update()
//   *
//   * @param array $new_instance Values just sent to be saved.
//   * @param array $old_instance Previously saved values from database.
//   *
//   * @return array Updated safe values to be saved.
//   */
//  public function update( $new_instance, $old_instance )

//  update (line 58)
//
//  Update a particular instance.
//
//  This function should check that $new_instance is set correctly. The newly
//  calculated value of $instance should be returned. If "false" is returned,
//  the instance won't be saved/updated.
//
//  return: Settings to save or bool false to cancel saving
//
//  array update (array $new_instance, array $old_instance)
//
//      array $new_instance: New settings for this instance as input by the user via form()
//      array $old_instance: Old settings for this instance

    /** @see WP_Widget::update -- do not rename this */
    function update( $new_instance , $old_instance ) {

//      $instance = $old_instance;
//      $instance['title'] = strip_tags($new_instance['title']);
//      $instance['message'] = strip_tags($new_instance['message']);
//      return $instance;

        require_once( dirname( __FILE__ ) . '/ad-display-update-support.php' ) ;

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_adDisplayer\
        // validate_ad_display_widget_admin_form_submission(
        //      $that           ,
        //      $new_instance   ,
        //      $old_instance
        //      )
        // - - - - - - - - - - - - - - - - -
        // Checks that the new values to be saved to the WP options database
        // are valid.
        //
        // Returns the filtered/sanitised options if this is the case; FALSE
        // otherwise.
        //
        // RETURNS
        //      On SUCCESS
        //          $options_to_save STRING
        //
        //      On FAILURE
        //          FALSE
        // -------------------------------------------------------------------------

//      return validate_ad_display_widget_admin_form_submission(
    $temp = validate_ad_display_widget_admin_form_submission(
                    $this           ,
                    $new_instance   ,
                    $old_instance
                    ) ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $temp ) ;

    return $temp ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================

} // end class ad_swapper_ad_slot_widget

    // =========================================================================
    // Register the widget...
    // =========================================================================

    add_action(
        'widgets_init'      ,
        function() {
            register_widget( '\\' . __NAMESPACE__ . '\\ad_swapper_ad_display_widget' ) ;
            }
        ) ;

// =============================================================================
// That's that!
// =============================================================================

