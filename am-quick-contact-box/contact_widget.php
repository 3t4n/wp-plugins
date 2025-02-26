<?php
/*
Plugin Name: Quick contact box
Plugin Script: contact_widget.php
Description: This plugin enables a very nice contacts box
Version: 1.0
License: GPL 2.0
Author: Antonio Scarf&igrave; - Maurizio Tarchini
*/

/*  Copyright 2011  Maurizio Tarchini  (email : maurizio.tarchini@bluewin.ch)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

$location = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),'',plugin_basename(__FILE__));
define("QC_PLUGIN_FOLDER_URL", $location);

class quick_contact_widget extends WP_Widget
{
	function quick_contact_widget() 
    {
		$widget_ops = array( 
            'classname' => 'quick-contact', 
            'description' => __('Quick contact box.') 
        );

		$control_ops = array( 'id_base' => 'quick-contact' );
		
		wp_enqueue_style( 'contact-widget-style', QC_PLUGIN_FOLDER_URL . 'css/contact.css');
		wp_enqueue_script('contact-script', QC_PLUGIN_FOLDER_URL . 'js/contact.js', array('jquery'));

		$this->WP_Widget( 'quick-contact', 'Quick contact box', $widget_ops, $control_ops );
	}
	
	function form( $instance )
	{
        /* Impostazioni di default del widget */
		$defaults = array( 
            'title' => 'Contact us',
            'phone_title' => 'Call us Today',
            'phone' => 555,
            'mobile' => 555,
            'fax' => 555,
            'address_title' => 'Your Company',
            'address_1' => 'Line 1',
            'address_2' => 'Line 2',
            'address_3' => 'Line 3',
            'address_4' => 'Line 4',
            'email_title' => 'Write Us',
            'email_name_1' => 'email 1',
            'email_1' => 'me@site.com',
            'email_name_2' => 'email 2',
            'email_2' => 'me2@site.com'
        );
        
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
		<p>
			<label>
				Title:<br />
				<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
			</label>
		</p>
		<p>&nbsp;</p>

		<p>
			<label>
				Phone title:<br />
				<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'phone_title' ); ?>" name="<?php echo $this->get_field_name( 'phone_title' ); ?>" value="<?php echo $instance['phone_title']; ?>" />
			</label>
		</p> 
		
			<p>
			<label>
				Phone number:<br />
				<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'phone' ); ?>" name="<?php echo $this->get_field_name( 'phone' ); ?>" value="<?php echo $instance['phone']; ?>" />
			</label>
		</p>  

		<p>
			<label>
				Mobile number:<br />
				<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'mobile' ); ?>" name="<?php echo $this->get_field_name( 'mobile' ); ?>" value="<?php echo $instance['mobile']; ?>" />
			</label>
		</p> 
		
			<p>
			<label>
				Fax number:<br />
				<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'fax' ); ?>" name="<?php echo $this->get_field_name( 'fax' ); ?>" value="<?php echo $instance['fax']; ?>" />
			</label>
		</p>
		
		<p>&nbsp;</p>
		
		<p>
			<label>
				Address title:<br />
				<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'address_title' ); ?>" name="<?php echo $this->get_field_name( 'address_title' ); ?>" value="<?php echo $instance['address_title']; ?>" />
			</label>
		</p> 
			<p>
			<label>
				Address line 1:<br />
				<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'address_1' ); ?>" name="<?php echo $this->get_field_name( 'address_1' ); ?>" value="<?php echo $instance['address_1']; ?>" />
			</label>
		</p> 
		<p>
			<label>
				Address line 2:<br />
				<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'address_2' ); ?>" name="<?php echo $this->get_field_name( 'address_2' ); ?>" value="<?php echo $instance['address_2']; ?>" />
			</label>
		</p> 
		<p>
			<label>
				Address line 3:<br />
				<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'address_3' ); ?>" name="<?php echo $this->get_field_name( 'address_3' ); ?>" value="<?php echo $instance['address_3']; ?>" />
			</label>
		</p> 
		<p>
			<label>
				Address line 4:<br />
				<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'address_4' ); ?>" name="<?php echo $this->get_field_name( 'address_4' ); ?>" value="<?php echo $instance['address_4']; ?>" />
			</label>
		</p>                
		
		<p>&nbsp;</p>
		
		<p>
			<label>
				Email title:<br />
				<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'email_title' ); ?>" name="<?php echo $this->get_field_name( 'email_title' ); ?>" value="<?php echo $instance['email_title']; ?>" />
			</label>
		</p> 
		
			<p>
			<label>
				Email 1 name:<br />
				<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'email_name_1' ); ?>" name="<?php echo $this->get_field_name( 'email_name_1' ); ?>" value="<?php echo $instance['email_name_1']; ?>" />
			</label>
		</p>
			<p>
			<label>
				Email 1 link:<br />
				<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'email_1' ); ?>" name="<?php echo $this->get_field_name( 'email_1' ); ?>" value="<?php echo $instance['email_1']; ?>" />
			</label>
		</p>  
		
			<p>
			<label>
				Email 2 name:<br />
				<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'email_name_2' ); ?>" name="<?php echo $this->get_field_name( 'email_name_2' ); ?>" value="<?php echo $instance['email_name_2']; ?>" />
			</label>
		</p>
			<p>
			<label>
				Email 2 link:<br />
				<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'email_2' ); ?>" name="<?php echo $this->get_field_name( 'email_2' ); ?>" value="<?php echo $instance['email_2']; ?>" />
			</label>
		</p>                                 
		<?php
	}
	
	function widget( $args, $instance )
	{
		
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );
		
		echo $before_widget;
		echo $before_title . $title . $after_title;
		?>
		<div class="quick-contact-box .tabs-container">
    		<ul class="nav-box">
				<li class="active"><a href="#1"><img src="<?php echo QC_PLUGIN_FOLDER_URL; ?>images/phone-grey.png" alt="Image Tab 1" class="nofade" /></a></li>
				<li><a href="#2"><img src="<?php echo QC_PLUGIN_FOLDER_URL; ?>images/pencil-grey.png" alt="Image Tab 2" class="nofade" /></a></li>
				<li><a href="#3"><img src="<?php echo QC_PLUGIN_FOLDER_URL; ?>images/mail-grey.png" alt="Image Tab 3" class="nofade" /></a></li>
			</ul>
			<div style="min-height: 147px;" class="box-info">
				<div style="display: block;" id="1" class="panel">
				<h6><?php echo $instance['phone_title']; ?></h6>
				<p><strong>Phone</strong>: <?php echo $instance['phone']; ?></p>
				<p><strong>Mobile</strong>: <?php echo $instance['mobile']; ?></p>
				<p><strong>Fax</strong>: <?php echo $instance['fax']; ?></p>			
				<div class="clearer"></div>
			</div>
			<div style="display: none;" id="2" class="panel">
				<h6><?php echo $instance['address_title']; ?></h6>
				<p><?php echo $instance['address_1']; ?></p>
				<p><?php echo $instance['address_2']; ?></p>
				<p><?php echo $instance['address_3']; ?></p>
				<p><?php echo $instance['address_4']; ?></p>
				<div class="clearer"></div>
			</div>
			<div style="display: none;" id="3" class="panel">
				<h6><?php echo $instance['email_title']; ?></h6>
				<p><strong><?php echo $instance['email_name_1']; ?></strong>:</p>
				<p><?php echo $instance['email_1']; ?></p>
				<p>&nbsp;</p>
				<p><strong><?php echo $instance['email_name_2']; ?></strong>:</p>
				<p><?php echo $instance['email_2']; ?></p>
				<div class="clearer"></div></div>
				<div class="clearer"></div></div>
			</div>
		<?php
		echo $after_widget;
	}
	
	function update( $new_instance, $old_instance ) 
    {
		$instance = $old_instance;

		$instance['title'] = strip_tags( $new_instance['title'] );

		$instance['phone_title'] = strip_tags( $new_instance['phone_title'] );

		$instance['phone'] = strip_tags( $new_instance['phone'] );
		
		$instance['mobile'] = strip_tags( $new_instance['mobile'] );
		
		$instance['fax'] = strip_tags( $new_instance['fax'] );

		$instance['address_title'] = strip_tags( $new_instance['address_title'] );
		
		$instance['address_1'] = strip_tags( $new_instance['address_1'] );
		
		$instance['address_2'] = strip_tags( $new_instance['address_2'] );
		
		$instance['address_3'] = strip_tags( $new_instance['address_3'] );
		
		$instance['address_4'] = strip_tags( $new_instance['address_4'] );
		
		$instance['twitter_name'] = strip_tags( $new_instance['twitter_name'] );

		$instance['email_title'] = strip_tags( $new_instance['email_title'] );
		
		$instance['email_name_1'] = strip_tags( $new_instance['email_name_1'] );
		
		$instance['email_1'] = strip_tags( $new_instance['email_1'] );

		$instance['email_name_2'] = strip_tags( $new_instance['email_name_2'] );
		
		$instance['email_2'] = strip_tags( $new_instance['email_2'] );

		return $instance;
	}                     
}
	
function qc_register_widgets()
{
	register_widget( 'quick_contact_widget' );
}

add_action( 'widgets_init', 'qc_register_widgets' );
?>