<?php

/***********************************************************************
* Class: adpressWidget
*
* The custom adpress widget.
*
* 
* See http://codex.wordpress.org/Widgets_API
*
************************************************************************/

class adpressWidget extends WP_Widget {

    var $adpress;

	public function __construct() {
        $this->adpress = $GLOBALS['AdPress'];

		parent::__construct(
	 		$this->adpress->prefix.'_widget', // Base ID
			__('AdPress Ad',$this->adpress->prefix), // Name
			array( 
			    'description' => __( 'Add an AdPress ad to any widget box location.', $this->adpress->prefix ), 
			    ) 
		);
	}

 	public function form( $instance ) {
 	    print __('Enter the ID or shorthand code for an ad.', $this->adpress->prefix);
		print $this->formatFormEntry($instance, 'id'        , __( 'Ad ID:', $this->adpress->prefix)           ,''); 
		print $this->formatFormEntry($instance, 'shorthand' , __( 'Ad Shorthand:', $this->adpress->prefix)    ,''); 
    }

	public function update( $new_instance, $old_instance ) {
		return $new_instance;
	}

	public function widget( $args, $instance ) {
        $this->adpress->is_widget = true;
		print apply_filters($this->adpress->prefix."Render", $instance);
	}
	
	private function formatFormEntry($instance, $id,$label,$default) {
	    $fldID = $this->get_field_id( $id );
	    $content= '<p>'.
            '<label for="'.$fldID.'">'.$label.'</label>'. 
            '<input class="widefat" type="text" '.  
                'id="'      .$fldID                                                     .'" '. 
                'name="'    .$this->get_field_name( $id )                               .'" '. 
                'value="'   .esc_attr( isset($instance[$id])?$instance[$id]:$default )  .'" '. 
                '/>'.
             '</p>';
        return $content;             
	}
	
}
