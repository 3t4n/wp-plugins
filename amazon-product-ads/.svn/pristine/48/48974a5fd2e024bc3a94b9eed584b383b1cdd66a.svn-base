<?php
/*
Plugin Name: Amazon Product Ads
Plugin URI: http://www.proactivewebdesign.co.uk/wordpress/amazon-product-ads
Description: A multi-instance WP widget that displays Amazon UK/US Self Optimizing Ads or if a post contains a custom field ASIN or ISBN it will display a buy from Amazon product link.
Version: 1.3
Author: Pro@active Web Design
Author URI: http://www.proactivewebdesign.co.uk

Copyright 2009  Proactive Web Design  (email : PLUGIN AUTHOR EMAIL)

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/
?>
<?php
add_action("widgets_init", create_function( '', 'return register_widget("Widget_Amazon_Product_Ads");'));

/**
 * A Multi-instance wordpress widget that displays specific product information ads when a 
 * ASIN/ISBN custom field is defined in a post, otherwise is displays self optimizing links
 *
 */
class Widget_Amazon_Product_Ads extends WP_Widget {

	/**
	 * The ASIN value tanken from the posts custom fields
	 *
	 * @var string
	 */
	var $ASIN;

	
	
	/**
	 * Class constructor
	 *
	 * @return Widget_Amazon_Product_Ads
	 */
	function Widget_Amazon_Product_Ads() {

		parent::WP_Widget( false, $name = __('Amazon Product Ads') );
	     
	
	}
	
	/**
	 * Widget settings form
	 *
	 * @param array $instance
	 */
	function form( $instance ) {
		//$data = get_option('Widget_Amazon_Product_Ads');
		$title = esc_attr( $instance['title'] );
		$trackingId = esc_attr( $instance['trackingId'] );
		$store = esc_attr( $instance['store'] );
		$size = esc_attr( $instance['size'] );
		$size = ( $size != "" ) ? $size : "120x240";
		$linkColour = esc_attr( $instance['linkColour'] );
		$selfOptOnly = esc_attr( $instance['selfOptOnly'] );
		$selfOptLogo = esc_attr( $instance['selfOptLogo'] );
		$fixedProductId = esc_attr( $instance['fixedProductId'] );
		?>
		<p><label for="<?php echo $this->get_field_id('title') ?>"><?php _e("Title") ?>: <input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('store') ?>"><?php _e("Amazon Store") ?>: <select id="<?php echo $this->get_field_id('store'); ?>" name="<?php echo $this->get_field_name('store'); ?>">
        <option value="co.uk"<?php echo ( ( $store == "co.uk" ) ? ' selected="yes"' : '' ); ?>><?php _e("Amazon UK") ?></option>
        <option value="com"<?php echo ( ( $store == "com" ) ? ' selected="yes"' : '' ); ?>><?php _e("Amazon US") ?></option>
        </select></label></p>
		<p><label for="<?php echo $this->get_field_id('trackingId') ?>"><?php _e("Tracking ID") ?>: <input id="<?php echo $this->get_field_id('trackingId'); ?>" name="<?php echo $this->get_field_name('trackingId'); ?>" type="text" value="<?php echo $trackingId; ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('linkColour') ?>"><?php _e("Link Colour") ?>: <input id="<?php echo $this->get_field_id('linkColour'); ?>" name="<?php echo $this->get_field_name('linkColour'); ?>" type="text" value="<?php echo $linkColour; ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('selfOptOnly') ?>"><?php _e("Self-optimising Ads Only") ?> <input id="<?php echo $this->get_field_id('selfOptOnly'); ?>" name="<?php echo $this->get_field_name('selfOptOnly'); ?>" type="checkbox"<?php echo ( ( $selfOptOnly == 'on' ) ? ' checked="checked"' : '' ); ?> /></label></p>

		<p><label for="<?php echo $this->get_field_id('selfOptLogo') ?>"><?php _e("Self-optimising Ads Logo") ?> <input id="<?php echo $this->get_field_id('selfOptLogo'); ?>" name="<?php echo $this->get_field_name('selfOptLogo'); ?>" type="checkbox"<?php echo ( ( $selfOptLogo == 'on' ) ? ' checked="checked"' : '' ); ?> /></label></p>

        <p><label for="<?php echo $this->get_field_id('size') ?>"><?php _e("Self-optimising Size") ?>:<select id="<?php echo $this->get_field_id('size') ?>" name="<?php echo $this->get_field_name('size') ?>">
          <option value="120x600"<?php echo ( ( $size == "120x600" ) ? ' selected="yes"' : '' ); ?>>120x600</option>
          <option value="120x240"<?php echo ( ( $size == "120x240" ) ? ' selected="yes"' : '' ); ?>>120x240</option>
          <option value="160x600"<?php echo ( ( $size == "160x600" ) ? ' selected="yes"' : '' ); ?>>160x600</option>
          <option value="180x150"<?php echo ( ( $size == "180x150" ) ? ' selected="yes"' : '' ); ?>>180x150</option>
          <option value="468x60"<?php echo ( ( $size == "468x60" ) ? ' selected="yes"' : '' ); ?>>468x60</option>
          <option value="728x90"<?php echo ( ( $size == "728x90" ) ? ' selected="yes"' : '' ); ?>>728x90</option>
          <option value="300x250"<?php echo ( ( $size == "300x250" ) ? ' selected="yes"' : '' ); ?>>300x250</option>
          <option value="600x520"<?php echo ( ( $size == "600x520" ) ? ' selected="yes"' : '' ); ?>>600x520</option>
        </select></label></p>
		<p><label for="<?php echo $this->get_field_id('fixedProductId') ?>"><?php _e("Fixed Product ID") ?><br /><em>(<?php _e("Note: This overrides Self-Optimising Only") ?>)</em>: <input id="<?php echo $this->get_field_id('fixedProductId'); ?>" name="<?php echo $this->get_field_name('fixedProductId'); ?>" type="text" value="<?php echo $fixedProductId; ?>" /></label></p>

		<?php

	}
	
	/**
	 * Widget display
	 *
	 * @param array $args
	 * @param array $instance
	 */
	function widget( $args, $instance ) {
		
		extract( $args );
		
		echo $before_widget;
		
		//Only display the title if one is set
		if ( $instance['title'] ) {

			echo $before_title . $instance['title'] . $after_title;
			
		}
		
		/*Can't display an ad if they don't provide their tracking id
		* OK strictly speaking you could however it's kinda pointless if you don't
		* get credit for the referal
		*/
		if ( $instance['trackingId'] ) {
		    
		    //
			Widget_Amazon_Product_Ads::_content( $instance );
		
		} else {
		     
		     echo '<p><strong>';
		     _e("Error");
			 echo ':</strong> ';
			 _e('tracking ID not set' );
			 echo '.</p>';
			 
		}
		
		echo $after_widget;

    }

	/**
	 * Widget setting pre update script
	 *
	 * @param array $new_instance
	 * @param array $old_instance
	 * @return array
	 */
	function update($new_instance, $old_instance) {	
		
		$instance = $new_instance;

		$instance['linkColour'] = Widget_Amazon_Product_Ads::_validateColour( $new_instance['linkColour'] );
        
		return $instance;
    }

	/**
	 * Definte which type of ad is to be displayed and create the content
	 *
	 * @param array $instance
	 */
	function _content( $instance ) {

		global $post;
		
		//Check if a specific product has been specified
		if ( $instance['fixedProductId'] != "" ) {
			
			$this->ASIN = $instance['fixedProductId'];
			
		} else {
			//Grab the value of any ASIN/ISBN defined in the post
			$ASIN = get_post_meta( $post->ID, 'ASIN', true );
			$ASIN = ( $ASIN ) ? $ASIN : get_post_meta( $post->ID, 'ISBN', true );
			$this->ASIN = $ASIN;
		}
		
		if ( ( $this->ASIN ) && ( $instance['selfOptOnly'] != 'on' ) ){
			
			Widget_Amazon_Product_Ads::_product( $instance );
		
		} else {
		
			Widget_Amazon_Product_Ads::_context( $instance );
		
		}
	
	}
	
	/**
	 * Create product specific ad
	 *
	 * @param array $instance
	 */
	function _product( $instance ) {
		$store = $instance['store'];
		$trackingId = $instance['trackingId'];
		$linkColour = ( $instance['linkColour'] == '' ) ? '0000FF' : $instance['linkColour'];
		
		$domain["co.uk"] = "rcm-uk.amazon.co.uk";
		$domain["com"] = "rcm.amazon.com";
		
		$o["com"] = 1;
		$o["co.uk"] = 2;
		
		$sizeBits = preg_split("/x/", $instance['size'], 2);
		
		$w = ( intval( $sizeBits[0] ) > 0 ) ? intval( $sizeBits[0] ) : 120;
		$h = ( intval( $sizeBits[1] ) > 0 ) ? intval( $sizeBits[1] ) : 240;
		$arrASIN = explode(",", $this->ASIN);
		
		foreach ( $arrASIN as $ASIN ) {
		
			print '<iframe src="http://' . $domain[$store] . '/e/cm?t=' . $trackingId . '&amp;o=' . $o[$store] . '&amp;p=8&amp;l=as1&amp;asins=' . $ASIN . '&amp;fc1=000000&amp;IS2=1&amp;lt1=_blank&amp;m=amazon&amp;lc1=' . $linkColour . '&amp;bc1=FFFFFF&amp;bg1=FFFFFF&amp;f=ifr&amp;nou=1" style="width:120px;height:240px;" scrolling="no" marginwidth="0" marginheight="0" frameborder="0"></iframe>';
		
		}
	
	}
	
	/**
	 * Create self optimizing ads
	 *
	 * @param array $instance
	 */
	function _context( $instance ) {
		
		$store = $instance['store'];
		$trackingId = $instance['trackingId'];

		$sizeBits = preg_split("/x/", $instance['size'], 2);
		
		$w = ( intval( $sizeBits[0] ) > 0 ) ? intval( $sizeBits[0] ) : 120;
		$h = ( intval( $sizeBits[1] ) > 0 ) ? intval( $sizeBits[1] ) : 240;
		
		print '<script type="text/javascript"><!--
amazon_ad_tag = "' . $trackingId . '"; amazon_ad_width = "' . $w . '"; amazon_ad_height = "' . $h . '";';
		echo ( $instance['selfOptLogo'] == 'on' ) ? '' : ' amazon_ad_logo = "hide";';
		echo ( $instance['linkColour'] == '' ) ? '' : ' amazon_color_link = "' . $instance['linkColour'] . '";';
		print ' amazon_ad_link_target = "new"; amazon_ad_price = "retail"; amazon_ad_border = "hide";//--></script>
<script type="text/javascript" src="http://www.assoc-amazon.' . $store . '/s/ads.js"></script>';
	
	}
	
	/**
	 * Validate given colour and a valid hex RGB colour
	 *
	 * @param string $colour
	 * @return string
	 */
	function _validateColour( $colour ) {
	
		if ( preg_match( '/^([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$/', $colour ) == 0 ) {
		
			$validatedColour= "";
			
		} else if ( preg_match( '/^([a-fA-F0-9]{3})$/', $colour ) == 1 ){
		
			$validatedColour= substr( $colour, 0, 1 );
			$validatedColour.= substr( $colour, 0, 1 );
			$validatedColour.= substr( $colour, 1, 1 );
			$validatedColour.= substr( $colour, 1, 1 );
			$validatedColour.= substr( $colour, 2, 1 );
			$validatedColour.= substr( $colour, 2, 1 );
		
		} else {
		
			$validatedColour = $colour;
		
		}
		
		$validatedColour= strtoupper( $validatedColour);
		
		return $validatedColour;
	
	}
	
}
?>