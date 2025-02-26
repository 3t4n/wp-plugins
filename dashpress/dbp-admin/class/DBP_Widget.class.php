<?php
class DBP_Widget
{
	function __construct( $i )
	{
		$this->i  = $i;
		$this->id = ( 1 == $this->i ) ? 'dashpress' : 'dashpress_' . $this->i;

		$this->get_options();

		if ( function_exists( 'wp_add_dashboard_widget' ) )
			wp_add_dashboard_widget( $this->id,
						 sprintf( '<span class="wtitle">%1$s</span>', $this->options['wtitle'] ),
						 array( &$this, 'widget' ),
						 array( &$this, 'control' ) 
		);
	}

	function widget()
	{
		$out = '';

		if ( !isset( $this->options['feeds'] ) ) 
		{
			$out .= '<p class="widget-norequest hide-if-no-js">' . __( 'First time ! welcome ! you have to edit the control panel&#8230;', 'DashPress' ) . '</p>';
		}
		elseif ( 0 < count( $this->options['feeds'] ) ) 
		{
			$out .= '<p class="widget-loading hide-if-no-js dbp_widget" id="dbp_widget_' . $this->i . '">' . __( 'Loading&#8230;' ) . '</p><p class="describe hide-if-js">' . __( 'This widget requires JavaScript.', 'DashPress' ) . '</p>';
		}
		else
		{
			$out .= '<p class="widget-norequest hide-if-no-js">' . __( 'No feed requested, you should edit the control panel&#8230;', 'DashPress' ) . '</p>';
		}

		echo $out;
	}

	function control()
	{
		echo '<p class="describe">' . __( 'This widget requires JavaScript.', 'Dashpress' ) . '</p>';
	}
//
///////////////////
//
	function get_content()
	{
		if ( !class_exists( 'SimplePie', false ) ) require_once( ABSPATH . WPINC . '/class-simplepie.php' );

		require_once( ABSPATH . WPINC . '/class-wp-simplepie-file.php' );
		require_once( ABSPATH . WPINC . '/class-wp-simplepie-sanitize-kses.php' );

		$feed = new SimplePie();

		$feed->registry->register( 'Sanitize', 'WP_SimplePie_Sanitize_KSES', true );
		$feed->registry->register( 'File',  'WP_SimplePie_File', true );
		$feed->registry->register( 'Item',  'DBP_SimplePie_Item',true );
		$feed->registry->register( 'Cache', 'DBP_SimplePie_Cache', true );

		$lifetime = $this->options['caching'] ?? 43200;

		$feed->set_cache_duration( $lifetime );
		$feed->set_cache_location( 'dashpress://dashpress?i=' . $this->i . '&lifetime=' . $lifetime );
		$feed->set_feed_url( $this->options['feeds'] );

		$feed->init();
		$feed->handle_content_type();

		$data  = new stdClass();
		$items = array();

		if ( $feed->get_items() )
		{
			$z = 1;
			$date_format = get_option( 'date_format' ) . ' H:i ';

			$data->height = $this->options['height'];

			foreach( $feed->get_items() as $item )
			{
				$_item = new stdClass();

				$_item->title 		= $item->get_title_();
				$_item->desc		= $item->get_description_();
				$_item->fulldate 	= $item->get_fulldate();
				$_item->date 		= $item->get_date( 'Y/m/d' );
				$_item->permalink 	= $item->get_permalink_();

				$img = ( $this->options['image'] ) ? $item->get_image() : '';
				if ( $img ) $_item->image = $img;

				$items[] = $_item;

				if ( ++$z > $this->options ['maxlines'] )  break;
			}

			$data->items = $items;

			$feed->__destruct(); 
		}
		else
		{
			$data->empty = true;
		}

		wp_send_json( $data );
	}

	function get_control()
	{
		$data  = new stdClass();

		$data->id = $this->id;
		$data->options = $this->options;
		$data->options['cache'] = array( 300 => __( '5 min', 'DashPress' ), 900 => __( '15 min', 'DashPress' ), 1800 => __( '30 min', 'DashPress' ), 3600 => __( '1 hour', 'DashPress' ), 7200 => __( '2 hours', 'DashPress' ), 14400 => __( '4 hours', 'DashPress' ), 28800 => __( '8 hours', 'DashPress' ), 43200 => __( '12 hours', 'DashPress' ), 96400 => __( '1 day', 'DashPress' ), );

		wp_send_json( $data );
	}

	function control_submitted()
	{
		if ( 'POST' == $_SERVER['REQUEST_METHOD'] && isset( $_POST['form'] ) )
		{
			parse_str( $_POST['form'], $form );
			$options = $form[$this->id];
			$this->options = $this->clean_options( $options );

			$options = ( current_user_can( 'edit_dashboard' ) ) ? get_user_option( DashPress::option_wdgts ) : get_option( DashPress::option_wdgts );
			$options[$this->id] = $this->options;
			DashPress::update_user_option( DashPress::option_wdgts, $options );
		}
	}

	function get_options()
	{
		$o = ( current_user_can( 'edit_dashboard' ) ) ? get_user_option( DashPress::option_wdgts ) : get_option( DashPress::option_wdgts );
		$options = ( isset( $o[$this->id] ) ? $o[$this->id] : array() );
		$this->options = $this->clean_options( $options );
	}

	function clean_options( $options )
	{
		$defaults = array(	'wtitle'	=> __( 'Last News', 'DashPress' ) . ' - ' . $this->i,
					'image'		=> false,
					'maxfeeds'	=> 3,
					'caching'	=> 43200,
					'maxlines'	=> 10,
					'height'	=> 20,
					'feeds'		=> array(),
		);

		$options = wp_parse_args( $options, $defaults );

		if ( !empty( $options['feeds'] ) )
		{
			$feeds  = array_filter( $options['feeds'] );
			$feeds  = array_slice( $feeds, 0, $options['maxfeeds'] );
			$options['feeds'] = $feeds;
		}

		return $options;
	}
}