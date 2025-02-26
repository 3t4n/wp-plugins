<?php

class DBP_SimplePie_Item extends SimplePie_Item
{
	public function get_title_()
	{
		$title = str_replace( '&amp;', '&', trim( $this->get_title() ) );
		if ( empty( $title ) ) $title = trim( $this->get_feed()->get_title() );
		if ( empty( $title ) ) $title = '*';

		return html_entity_decode( $title, ENT_QUOTES );
	}

	public function get_description_()
	{
		$title = $this->get_feed()->get_title();
		$title = trim( $title );

		$desc = str_replace( array( "\n", "\r" ), ' ', esc_attr( strip_tags( @html_entity_decode( $this->get_description(), ENT_QUOTES, get_option( 'blog_charset' ) ) ) ) );
		$desc = wp_html_excerpt( $desc, 360 );
		$desc = trim( $desc );

		if ( empty( $desc ) )
		{
			$desc =  $title . " | \n" . $this->get_title_();
		}
		else
		{
			$desc .= ( substr( $desc, -1 ) == '.' ) ? '' : ' [&hellip;]';
			if ( !empty( $title ) ) $desc = $title . " | \n" . $desc;
		}

		return html_entity_decode( $desc, ENT_QUOTES );
	}

	public function get_fulldate()
	{
		return date_i18n( get_option( 'date_format' ) . ' G:i ', $this->get_date( 'U' ) );
	}

	public function get_permalink_()
	{
		return str_replace( '&amp;', '&', $this->get_permalink() );
	}

	public function get_image( $key = 0, $format = true )
	{
		$images = $this->get_images();

		if ( !isset( $images[$key] ) )
		{
			return null;
		}

		if ( !$format )
		{
			return $images[$key];
		}

//		$wh = false;
//		$wh = @getimagesize( $images[$key] );
//		if ( $wh [1] < 10 ) return  '';

		return  $images[$key];
	}

	public function get_images()
	{
		if ( !isset( $this->data['dbp_images'] ) )
		{
			$this->data['dbp_images'] = array();

// looking for images as enclosures / thumbnails

			$enclosure	= $this->get_enclosure();
			if ( !empty( $enclosure ) )
			{
				$thumbnails = $enclosure->get_thumbnails();
				if ( !empty( $thumbnails ) ) foreach ( $thumbnails as $thumbnail) 	$this->data['dbp_images'] [] =  $thumbnail;
				if ( false !== stripos( $enclosure->get_type(), 'image' ) )		$this->data['dbp_images'] [] =  $enclosure->get_link(); 
				if ( 'image' == $enclosure->get_medium() ) 		 		$this->data['dbp_images'] [] =  $enclosure->get_link(); 
			}

// looking for images into text
/*
			$patterns[] = '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i';
			$patterns[] = '/\&\#x3c;img.+src=[\'"]([^\'"]+)[\'"].*>/i';

			$content = $this->get_content();

			foreach ( $patterns as $pattern )
			{
				preg_match_all( $pattern, $content, $matches, PREG_SET_ORDER );
				if ( isset( $matches [0] [1] ) ) $this->data['dbp_images'] [] = str_replace( ' ', '%20',$matches [0] [1] );
			}
*/
// cleaning images array

			$this->data['dbp_images'] = array_filter( $this->data['dbp_images'] );
			$this->data['dbp_images'] = array_filter( $this->data['dbp_images'], array($this, 'not_bookmark' ) );
			$this->data['dbp_images'] = array_filter( $this->data['dbp_images'], array($this, 'exclude' ) );
			$this->data['dbp_images'] = array_filter( $this->data['dbp_images'], array($this, 'is_url' ) );
			array_unique( $this->data['dbp_images'] );
		}

		if ( empty( $this->data['dbp_images'] ) )
		{
			return null;
		}

		return $this->data['dbp_images'];
	}

	function not_bookmark( $var )
	{
		return !$this->string_in_array( $var, array ( 'bookmark.gif', 'feeds.feedburner.com' ) );
	}

	function exclude( $var )
	{
		return !$this->string_in_array( $var, array( 'smilies' ) );
	}

	function is_url( $var )
	{
		return $this->string_in_array( $var, array( 'http://', 'https://' ) );
	}

	function string_in_array( $needle, $haystack )
	{
		foreach ( $haystack as $hay ) if ( ( stripos( $needle, $hay ) !== false ) ) return true;
		return false;
	}
}