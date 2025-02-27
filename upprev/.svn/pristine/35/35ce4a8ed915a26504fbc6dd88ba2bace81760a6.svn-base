<?php
/*

Copyright 2011-2025  Marcin Pietrzak (marcin@iworks.pl)

this program is free software; you can redistribute it and/or modify
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

if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( class_exists( 'IworksUpprev' ) ) {
	return;
}

class IworksUpprev {

	private $base;
	private $capability;
	private $dev;
	private $dir;
	private $options;
	private $version;
	private $working_mode;
	private $current_post = null;

	/**
	 * plugin file
	 *
	 * @since 4.0.5
	 */
	private $plugin_file;

	/**
	 * layotuts
	 *
	 */
	private array $available_layouts = array();

	public function __construct() {
		/**
		 * static settings
		 */
		$this->version      = '4.0';
		$this->base         = dirname( dirname( __FILE__ ) );
		$this->dir          = basename( dirname( $this->base ) );
		$this->capability   = apply_filters( 'iworks_upprev_capability', 'manage_options' );
		$this->working_mode = 'site';
		$this->dev          = ( defined( 'IWORKS_DEV_MODE' ) && IWORKS_DEV_MODE ) ? '' : '.min';
		/**
		 * plugin ID
		 *
		 * @since 4.0.6
		 */
		$this->plugin_file = plugin_basename( dirname( $this->base ) . '/upprev.php' );
		/**
		 * WordPress Hooks
		 */
		add_action( 'after_setup_theme', array( $this, 'after_setup_theme' ) );
		add_action( 'init', array( $this, 'action_init_register_iworks_rate' ), PHP_INT_MAX );
		add_action( 'init', array( $this, 'init' ), 11 );
		add_action( 'the_content', array( $this, 'the_content' ), PHP_INT_MAX );
		add_action( 'wp_ajax_nopriv_upprev', array( $this, 'ajax_get_box' ) );
		add_action( 'wp_ajax_upprev', array( $this, 'ajax_get_box' ) );
		/**
		 * iWorks Rate Class
		 */
		add_filter( 'iworks_rate_notice_logo_style', array( $this, 'filter_plugin_logo' ), 10, 2 );
	}

	/**
	 * return false to display
	 * return true to hide
	 */
	private function iworks_upprev_check() {
		$this->check_option_object();
		/**
		 * check post type
		 */
		if ( is_singular() && $this->options->get_option( 'match_post_type' ) ) {
			$post_types = $this->options->get_option( 'post_type' );
			if ( empty( $post_types ) ) {
				$post_types = array( 'post' );
			}
			if ( ! in_array( get_post_type(), $post_types ) ) {
				return apply_filters( 'iworks_upprev_check', true );
			}
		}
		/**
		 * check base and exclude streams
		 */
		if ( ! is_singular() && 'page' != get_option( 'show_on_front' ) ) {
			return apply_filters( 'iworks_upprev_check', true );
		}
		/**
		 * check mobile devices
		 */
		if ( 1 === intval( $this->options->get_option( 'mobile_hide' ) ) ) {
			include_once dirname( $this->base ) . '/vendor/Mobile_Detect.php';
			$detect = new Mobile_Detect;
			if ( $detect->isMobile() ) {
				return apply_filters( 'iworks_upprev_check', true );
			}
			if ( 1 === intval( $this->options->get_option( 'mobile_tablets' ) ) ) {
				if ( $detect->isTablet() ) {
					return apply_filters( 'iworks_upprev_check', true );
				}
			}
		}
		/**
		 * get allowed post types
		 */
		$post_types = $this->options->get_option( 'post_type' );
		/**
		 * check post types
		 */
		if ( $this->options->get_option( 'match_post_type' ) && is_array( $post_types ) ) {
			if ( ! is_singular( array_values( $post_types ) ) ) {
				return apply_filters( 'iworks_upprev_check', true );
			}
		}
		return apply_filters( 'iworks_upprev_check', ! is_single() );
	}

	public function get_version( $file = null ) {
		if ( defined( 'IWORKS_DEV_MODE' ) && IWORKS_DEV_MODE ) {
			if ( null != $file ) {
				$file = dirname( dirname( __FILE__ ) ) . $file;
				if ( is_file( $file ) ) {
					return md5_file( $file );
				}
			}
			return rand( 0, 99999 );
		}
		return $this->version;
	}

	public function init() {
		$this->check_option_object();
		add_action( 'admin_init', array( $this, 'admin_init' ) );
		add_action( 'wp_head', array( $this, 'print_custom_style' ), PHP_INT_MAX );
		add_action( 'wp_enqueue_scripts', array( $this, 'register_assets' ), 0 );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ) );
		/**
		 * filters
		 */
		add_filter( 'index_iworks_upprev_position_content', array( $this, 'index_iworks_upprev_position_content' ), 10, 5 );
		/**
		 * layouts settings
		 */
		$this->available_layouts = array(
			'simple'     => array(
				'name'     => __( 'Default simple layout', 'upprev' ),
				'defaults' => array(
					'class'            => 'simple',
					'compare'          => 'simple_or_yarpp',
					'css_border_width' => '2px 0 0 0',
					'css_bottom'       => 10,
					'css_side'         => 10,
					'number_of_posts'  => 1,
				),
			),
			'vertical 3' => array(
				'name'     => __( 'Vertical Three', 'upprev' ),
				'defaults' => array(
					'class'            => 'vertical-3',
					'compare'          => 'simple_or_yarpp',
					'css_border_width' => '2px 0 0 0',
					'css_bottom'       => 10,
					'css_side'         => 10,
					'excerpt_show'     => false,
					'make_break'       => false,
					'number_of_posts'  => 3,
					'show_thumb'       => true,
					'thumb_height'     => 96,
					'thumb_width'      => 96,
				),
			),
			'bloginity'  => array(
				'name'     => __( '"Bloginity" style', 'upprev' ),
				'defaults' => array(
					'class'             => 'bloginity',
					'compare'           => 'simple_or_yarpp',
					'css_bottom'        => 0,
					'css_side'          => 0,
					'css_width'         => 376,
					'excerpt_show'      => false,
					'header_show'       => false,
					'make_break'        => false,
					'number_of_posts'   => 4,
					'show_close_button' => false,
					'show_thumb'        => true,
					'thumb_height'      => 84,
					'thumb_width'       => 84,
				),
			),
		);
	}

	public function after_setup_theme() {
		$this->check_option_object();
		if ( 'simple' == $this->sanitize_layout( $this->options->get_option( 'layout' ) ) ) {
			foreach ( $this->available_layouts as $key => $layout ) {
				if ( isset( $layout['defaults']['thumb_width'] ) and isset( $layout['defaults']['thumb_height'] ) ) {
					add_image_size(
						'iworks-upprev-' . $layout['defaults']['class'],
						$layout['defaults']['thumb_width'],
						$layout['defaults']['thumb_height'],
						true
					);
				}
			}
		}
	}

	/**
	 * register styles
	 *
	 * @since 4.0.0
	 */
	public function register_assets() {
		$this->check_option_object();
		$name = $this->options->get_option_name( 'frontend' );
		/**
		 * styles
		 */
		$file = '/assets/styles/frontend' . $this->dev . '.css';
		wp_register_style(
			$name,
			plugins_url( $file, $this->base ),
			array(),
			$this->get_version( $file )
		);
		/**
		 * JS
		 */
		$file = '/assets/scripts/upprev' . $this->dev . '.js';
		wp_register_script(
			$name,
			plugins_url( $file, $this->base ),
			array( 'jquery' ),
			$this->get_version( $file )
		);
	}

	/**
	 * Enquque styles
	 *
	 * @since 1.3.0
	 */
	public function enqueue_assets() {
		$this->check_option_object();
		if ( $this->iworks_upprev_check() ) {
			return;
		}
		$name = $this->options->get_option_name( 'frontend' );
		wp_enqueue_style( $name );
		wp_enqueue_script( $name );
		wp_localize_script( $name, 'iworks_upprev', $this->get_config_javascript() );
	}

	public function admin_init() {
		$this->update();
		$scripts = array( 'jquery-ui-tabs', 'farbtastic' );
		wp_register_script(
			'upprev-admin',
			plugins_url( 'assets/scripts/admin' . $this->dev . '.js', $this->base ),
			$scripts,
			$this->get_version()
		);
		$file = 'assets/styles/frontend' . $this->dev . '.css';
		wp_register_style( 'upprev', plugins_url( $file, $this->base ), array(), $this->get_version( $file ) );
		$file = 'assets/styles/admin' . $this->dev . '.css';
		wp_register_style( 'upprev-admin', plugins_url( $file, $this->base ), array( 'farbtastic' ), $this->get_version( $file ) );
		/**
		 * Settings on plugin page
		 *
		 * @since 4.0.5
		 */
		add_filter( 'plugin_action_links_' . $this->plugin_file, array( $this, 'add_settings_link' ), 0 );
	}

	/**
	 * Add settings link to plugin_action_links.
	 *
	 * @since 4.0.5
	 *
	 * @param array  $actions     An array of plugin action links.
	 */
	public function add_settings_link( $actions ) {
		$this->check_option_object();
		$page      = $this->options->get_pagehook();
		$url       = add_query_arg( 'page', $page, admin_url( 'themes.php' ) );
		$actions[] = sprintf( '<a href="%s">%s</a>', esc_url( $url ), esc_html__( 'Settings', 'sierotki' ) );
		return $actions;
	}

	private function get_config_javascript() {
		$this->check_option_object();
		$params   = $this->get_params();
		$defaults = $this->get_default_params();
		foreach ( $params as $key ) {
			$value = $this->options->get_option( $key );
			if ( empty( $value ) && isset( $defaults[ $key ] ) && $defaults[ $key ] ) {
				$value = $defaults[ $key ];
			}
			$data[ $key ] = $value;
		}
		$position                = $this->sanitize_position( $this->options->get_option( 'position' ) );
		$data['position']['raw'] = $position;
		foreach ( array( 'top', 'left', 'center', 'middle' ) as $key ) {
			$re                       = sprintf( '/%s/', $key );
			$data['position'][ $key ] = preg_match( $re, $position );
		}
		$data['position']['all'] = $position;
		$data['title']           = esc_attr( get_the_title() );
		$data['p']               = get_the_ID();
		$data['nonce']           = wp_create_nonce( 'upprev' );
		$data['ajaxurl']         = admin_url( 'admin-ajax.php' );
		return $data;
	}

	/**
	 * get box
	 *
	 * @since 1.0.0
	 * @since 4.0.0 param $post_id
	 */
	private function get_box( $layout = false, $post_id = 0 ) {
		$this->check_option_object();
		/**
		 * get current post title and convert special characters to HTML entities
		 */
		$current_post_title = esc_attr( get_the_title() );
		/**
		 * set defaults
		 */
		$box_classes  = array( 'default' );
		$make_break   = true;
		$thumb_height = 9999;
		/**
		 * get used params
		 */
		$setttings = array();
		$params    = $this->get_params();
		foreach ( $params as $key ) {
			$setttings[ $key ] = $this->options->get_option( $key );
		}
		/**
		 * allow to change configuration
		 *
		 * @since 4.0.3
		 *
		 * @param array $setttings upPrev settings for box
		 */
		$setttings = apply_filters( 'iworks_upprev_settings', $setttings );
		/**
		 * set some extra
		 */
		$compare = $setttings['compare'];
		/**
		 * if simple or admin mode setup defaults
		 */
		if ( 'simple' == $setttings['configuration'] or 'admin' == $this->working_mode ) {
			if ( 'admin' == $this->working_mode ) {
				$compare = 'simple';
			} else {
				$layout = $this->sanitize_layout( $this->options->get_option( 'layout' ) );
			}
			extract( $this->get_default_params( $layout ) );
			$box_classes[] = $class;
		}
		/**
		 * select compare method
		 */
		$compare = $this->sanitize_compare( apply_filters( 'iworks_upprev_compare', $compare ) );
		/**
		 * upprev_box class
		 */
		$box_classes[] = 'compare-' . $compare;
		$box_classes[] = 'animation-' . $setttings['animation'];
		/**
		 * admin mode?
		 */
		$show_taxonomy = true;
		$siblings      = array();
		$args          = array(
			'ignore_sticky_posts' => $setttings['ignore_sticky_posts'],
			'orderby'             => 'date',
			'order'               => 'DESC',
			'posts_per_page'      => $setttings['number_of_posts'],
			'post_status'         => 'publish',
			'post_type'           => array(),
		);
		/**
		 * exclude one id if singular
		 */
		if ( empty( $post_id ) && isset( $_GET['p'] ) && preg_match( '/^\d+$/', $_GET['p'] ) ) {
			$post_id = $args['post__not_in'] = array( $_GET['p'] );
		}
			$this->current_post = get_post( $post_id );
		/**
		 * check & set post type
		 */
		$post_type = $this->options->get_option( 'post_type' );
		if ( ! empty( $post_type ) ) {
			if ( array_key_exists( 'any', $post_type ) ) {
				$args['post_type'] = 'any';
			} else {
				foreach ( $post_type as $type ) {
					$args['post_type'][] = $type;
				}
			}
		}
		/**
		 * exclude categories
		 */
		$exclude_categories = $this->options->get_option( 'exclude_categories' );
		if ( is_array( $exclude_categories ) && ! empty( $exclude_categories ) ) {
			$args['category__not_in'] = $exclude_categories;
		}
		/**
		 * exclude tags
		 */
		$exclude_tags = $this->options->get_option( 'exclude_tags' );
		if ( is_array( $exclude_tags ) && ! empty( $exclude_tags ) ) {
			$args['tag__not_in'] = $exclude_tags;
		}
		/**
		 * comparation method
		 */
		switch ( $compare ) {
			/**
			 * simple previous
			 */
			case 'simple':
				$show_taxonomy = false;
				break;
			/**
			 * category
			 */
			case 'category':
				$categories = get_the_category( $post_id );
				if ( ! $categories ) {
					break;
				}
				$max = count( $categories );
				if ( 0 < $setttings['taxonomy_limit'] && $setttings['taxonomy_limit'] < $max ) {
					$max = $setttings['taxonomy_limit'];
				}
				for ( $i = 0; $i < $max; $i++ ) {
					$siblings[ get_category_link( $categories[ $i ]->term_id ) ] = $categories[ $i ]->name;
				}
				/**
				 * get categories to WP_Query
				 */
				$args['category__and'] = array();
				foreach ( $categories as $cat ) {
					$args['category__and'][] = $cat->term_id;
				}
				break;
			/**
			 * tag
			 */
			case 'tag':
				$tags = get_the_tags();
				if ( ! $tags ) {
					break;
				}
				$max = count( $tags );
				if ( 1 > $max ) {
					break;
				}
				if ( 0 < $setttings['taxonomy_limit'] && $setttings['taxonomy_limit'] < $max ) {
					$max = $taxonomy_limit;
				}
				if ( count( $tags ) ) {
					$i = 1;
					foreach ( $tags as $tag ) {
						if ( ++$i > $max ) {
							continue;
						}
						$siblings[ get_tag_link( $tag->term_id ) ] = $tag->name;
					}
				}
				/**
				 * get tags to WP_Query
				 */
				$args['tag__and'] = array();
				foreach ( $tags as $tag ) {
					$args['tag__and'][] = $tag->term_id;
				}
				break;
			/**
			 * random
			 */
			case 'random':
				$args['orderby'] = 'rand';
				unset( $args['order'] );
				/**
				 * YARPP
				 */
			case 'yarpp':
				if ( function_exists( 'yarpp_get_related' ) ) {
					$args['limit'] = $number_of_posts;
					$a             = yarpp_get_related( $args );
					$yarpp_posts   = array();
					foreach ( $a as $b ) {
						if ( $b->ID === $post->ID ) {
							continue;
						}
						$yarpp_posts[] = $b->ID;
					}
				}
				break;
			default:
				$show_taxonomy = false;
		}
		$value = sprintf( '<div id="upprev_box" class="%s">', esc_attr( implode( ' ', $box_classes ) ) );
		if ( ! preg_match( '/^(yarpp|random)$/', $compare ) ) {
			add_filter( 'posts_where', array( $this, 'posts_where' ), 72, 1 );
		}
		/**
		 * YARPP
		 */
		if ( 'yarpp' == $compare ) {
			$args = array(
				'post__in'            => $yarpp_posts,
				'ignore_sticky_posts' => 1,
			);
		}
		/**
		 * always! exlude self
		 */
		if ( ! empty( $post_id ) ) {
			$args['post__not_in'] = array( $post_id );
		}
		/**
		 * filter WP_Query args
		 *
		 * @since 4.1.0
		 */
		$args         = apply_filters( 'iworks/upprev/wp_query/args', $args );
		$upprev_query = new WP_Query( $args );
		if ( ! $upprev_query->have_posts() ) {
			/**
			 * exception for taxonomies
			 */
			if ( preg_match( '/^(category|tag)$/', $compare ) ) {
				switch ( $compare ) {
					case 'category':
						if ( 1 === sizeof( $args['category__and'] ) ) {
							$args['cat'] = intval( $args['category__and'][0] );
						} else {
							$args['cat'] = implode( ',', $args['category__and'] );
						}
						unset( $args['category__and'] );
						break;
					case 'tag':
						$args['tag__in'] = $args['tag__and'];
						unset( $args['tag__and'] );
						break;
				}
				$upprev_query = new WP_Query( $args );
				if ( ! $upprev_query->have_posts() ) {
					return;
				}
			} else {
				return;
			}
		}
		/**
		 * remove any filter if needed
		 */
		if ( $this->options->get_option( 'remove_all_filters' ) ) {
			remove_all_filters( 'the_content' );
		}
		/**
		 * catch elements
		 */
		ob_start();
		do_action( 'iworks_upprev_box_before' );
		$value .= ob_get_flush();
		/**
		 * box title
		 */
		$title = '';
		if ( $setttings['header_show'] ) {
			if ( ! empty( $setttings['header_text'] ) ) {
				$title .= $setttings['header_text'];
			} elseif ( count( $siblings ) ) {
				$title .= sprintf( '%s ', __( 'More in', 'upprev' ) );
				$a      = array();
				foreach ( $siblings as $url => $name ) {
					$a[] = sprintf(
						'<a href="%s" rel="%s">%s</a>',
						esc_url( $url ),
						esc_attr( $current_post_title ),
						$name
					);
				}
				$title .= implode( ', ', $a );
			} elseif ( preg_match( '/^(random|yarpp)$/', $compare ) or 'vertical 3' == $layout ) {
				$title .= __( 'Read more:', 'upprev' );
			} else {
				$title .= __( 'Read previous post:', 'upprev' );
			}
		}
		$title = apply_filters( 'iworks_upprev_box_title', $title );
		if ( $title ) {
			$value .= sprintf( '<h6>%s</h6>', $title );
		}
		/**
		 *
		 */
		$i              = 1;
		$ga_click_track = '';
		while ( $upprev_query->have_posts() ) {
			$item = '';
			$upprev_query->the_post();
			$item_class = array();
			if ( $setttings['excerpt_show'] ) {
				$item_class[] = 'upprev_excerpt';
			}
			if ( $i > $setttings['number_of_posts'] ) {
				break;
			}
			if ( ! preg_match( '/^(vertical 3)$/', $layout ) ) {
				if ( $i < $setttings['number_of_posts'] ) {
					$item_class[] = 'upprev_space';
				}
			}
			$image     = '';
			$permalink = sprintf(
				'%s%s%s',
				$setttings['url_prefix'],
				get_permalink(),
				$setttings['url_suffix']
			);
			if ( current_theme_supports( 'post-thumbnails' ) && $setttings['show_thumb'] && has_post_thumbnail( get_the_ID() ) ) {
				$a_class = '';
				if ( ! preg_match( '/^(vertical 3)$/', $layout ) ) {
					$item_class[] = 'upprev_thumbnail';
					$a_class      = 'upprev_thumbnail';
				}
				$image = sprintf(
					'<a href="%s" title="%s" class="%s"%s rel="%s">%s</a>',
					esc_url( $permalink ),
					esc_attr( strip_tags( get_the_title() ) ),
					esc_attr( $a_class ),
					$ga_click_track,
					esc_attr( strip_tags( $current_post_title ) ),
					apply_filters(
						'iworks_upprev_get_the_post_thumbnail',
						get_the_post_thumbnail(
							get_the_ID(),
							apply_filters(
								'iworks_upprev_thumbnail_size',
								array( $setttings['thumb_width'], $setttings['thumb_height'] )
							),
							array(
								'title' => get_the_title(),
								'class' => 'iworks_upprev_thumb',
							)
						)
					)
				);
			} else {
				ob_start();
				do_action( 'iworks_upprev_image' );
				$image = ob_get_flush();
			}
			if ( empty( $image ) ) {
				$item_class[] = 'no-image';
			}
			$item .= '<div';
			if ( ! empty( $item ) ) {
				$item .= sprintf( ' class="%s"', esc_attr( implode( ' ', $item_class ) ) );
			}
			$item .= '>';
			$item .= $image;
			$title = get_the_title();
			if ( ! empty( $title ) ) {
				$item .= sprintf(
					'<h5><a href="%s"%s rel="%s">%s</a></h5>',
					esc_url( $permalink ),
					$ga_click_track,
					esc_attr( strip_tags( $current_post_title ) ),
					$title
				);
			}
			if ( $setttings['excerpt_show'] && 0 < $setttings['excerpt_length'] ) {
				$excerpt = wp_trim_words(
					strip_shortcodes( get_the_excerpt() ),
					$this->options->get_option( 'excerpt_length' ),
					'...'
				);
				if ( empty( $title ) ) {
					$excerpt = sprintf(
						'<a href="%s"%s rel="%s">%s</a>',
						esc_url( $permalink ),
						$ga_click_track,
						esc_attr( strip_tags( $current_post_title ) ),
						$excerpt
					);
				}
				$item .= wpautop( $excerpt );
			} elseif ( $image && $make_break ) {
				$item .= '<br />';
			}
			$item  .= '</div>';
			$value .= apply_filters( 'iworks_upprev_box_item', $item );
			$i++;
		}
		if ( $setttings['close_button_show'] ) {
			$value .= sprintf( '<a id="upprev_close" href="#" rel="close">%s</a>', __( 'Close', 'upprev' ) );
		}
		if ( $this->options->get_option( 'promote' ) ) {
			$value .= '<p class="promote"><small>' . __( 'Previous posts box brought to you by <a href="http://iworks.pl/produkty/wordpress/wtyczki/upprev/en/">upPrev plugin</a>.', 'upprev' ) . '</small></p>';
		}
		$value .= '<br />';
		ob_start();
		do_action( 'iworks_upprev_box_after' );
		$value .= ob_get_flush();
		$value .= '</div>';
		wp_reset_postdata();
		remove_filter( 'posts_where', array( $this, 'posts_where' ), 72, 1 );
		return apply_filters( 'iworks_upprev_box', $value );
	}

	public function posts_where( $where = '' ) {
		if ( is_object( $this->current_post ) ) {
			global $wpdb;
			$where .= $wpdb->prepare(
				' AND post_date < %s ',
				$this->current_post->post_date
			);
		}
		return $where;
	}

	private function sanitize_layout( $layout ) {
		if ( array_key_exists( $layout, $this->available_layouts ) ) {
			return $layout;
		}
		return 'simple';
	}

	/**
	 * callback: layout
	 */
	public function build_layout_chooser( $layout ) {
		$this->working_mode    = 'admin';
		$options               = array();
		$set_simple_as_default = false;
		foreach ( $this->available_layouts as $key => $one ) {
			$data            = array(
				'name'     => $one['name'],
				'value'    => preg_replace( '/id="upprev_box" class="/', 'class="upprev_box ', $this->get_box( $key ) ),
				'checked'  => $key == $this->sanitize_layout( $layout ),
				'disabled' => false,
			);
			$options[ $key ] = $data;
		}
		if ( $set_simple_as_default ) {
			$options['simple']['checked'] = true;
		}
		$content = '<ul>';
		foreach ( $options as $key => $one ) {
			$id       = 'iworks_upprev_' . crc32( $key );
			$content .= sprintf(
				'<li><input type="radio" name="iworks_upprev_layout" value="%s"%s%s id="%s"><label for="%s"> %s</label>',
				esc_attr( $key ),
				$one['checked'] ? ' checked="checked"' : '',
				$one['disabled'] ? ' disabled="disabled"' : '',
				esc_attr( $id ),
				esc_attr( $id ),
				$one['name']
			);
			$content .= $one['value'];
			$content .= '</li>';
		}
		$content .= '</ul>';
		return $content;
	}

	public function update() {
		$this->check_option_object();
		$version = $this->options->get_option( 'version' );
		if ( version_compare( $this->version, $version, '>' ) ) {
			if ( version_compare( $version, '2.0', '<' ) ) {
				$this->options->add_option( 'salt', wp_generate_password( 256, false, false ), false );
			}
			if ( version_compare( $version, '4.0', '<' ) ) {
				foreach ( array( 'use_cache', 'cache_stamp', 'cache_lifetime' ) as $key ) {
					delete_option( $this->options->get_option_name( $key ) );
				}
				$this->options->update_option( 'configuration', 'simple' );
			}
			$this->options->update_option( 'version', $this->version );
		}
	}

	private function position_one_radio( $value, $input, $html_element_name, $option_name, $option_value ) {
		$option_value = $this->sanitize_position( $option_value );
		$id           = $option_name . '-' . $value;
		$disabled     = '';
		if ( isset( $input['disabled'] ) && $input['disabled'] ) {
			$disabled = 'disabled="disabled"';
		}
		return sprintf(
			'<td class="%s%s"><label for="%s" class="imgedit-group"><input type="radio" name="%s" value="%s"%s id="%s" %s/> <span>%s</span></label></td>',
			esc_attr( sanitize_title( $value ) ),
			$disabled ? ' disabled' : '',
			$id,
			esc_attr( $html_element_name ),
			esc_attr( $value ),
			( $option_value == $value or ( empty( $option_value ) and isset( $option['default'] ) and $value == $option['default'] ) ) ? ' checked="checked"' : '',
			esc_attr( $id ),
			$disabled,
			$input['label']
		);
	}

	public function index_iworks_upprev_position_content( $content, $data, $html_element_name, $option_name, $option_value ) {
		$content  = '';
		$content .= sprintf( '<table id="%s"><tbody><tr>', esc_attr( $html_element_name ) );
		foreach ( array( 'left-top', 'top', 'right-top' ) as $key ) {
			$content .= $this->position_one_radio( $key, $data[ $key ], $html_element_name, $option_name, $option_value );
		}
		$content .= '</tr><tr>';
		$key      = 'left-middle';
		$content .= $this->position_one_radio( $key, $data[ $key ], $html_element_name, $option_name, $option_value );
		$content .= '<td>&nbsp;</td>';
		$key      = 'right-middle';
		$content .= $this->position_one_radio( $key, $data[ $key ], $html_element_name, $option_name, $option_value );
		$content .= '</tr><tr>';
		foreach ( array( 'left', 'bottom', 'right' ) as $key ) {
			$content .= $this->position_one_radio( $key, $data[ $key ], $html_element_name, $option_name, $option_value );
		}
		$content .= '</tr><tr>';
		$content .= '</tr></tbody></table>';
		return $content;
	}

	public function print_custom_style() {
		if ( $this->iworks_upprev_check() ) {
			return;
		}
		$content  = '<style type="text/css">' . PHP_EOL;
		$content .= preg_replace( '/\s\s+/s', ' ', preg_replace( '/#[^\{]+ \{ \}/', '', preg_replace( '@/\*[^\*]+\*/@', '', $this->options->get_option( 'css' ) ) ) );
		$content .= '</style>' . PHP_EOL;
		echo $content;
	}

	private function get_default_params( $layout = null ) {
		if ( null == $layout ) {
			$layout = $this->sanitize_layout( $this->options->get_option( 'layout' ) );
		}
		if ( isset( $this->available_layouts[ $layout ] ) && isset( $this->available_layouts[ $layout ]['defaults'] ) && is_array( $this->available_layouts[ $layout ]['defaults'] ) ) {
			return $this->available_layouts[ $layout ]['defaults'];
		}
		return array();
	}

	private function sanitize_position( $position ) {
		$this->check_option_object();
		$positions = $this->options->get_values( 'position' );
		if ( array_key_exists( $position, $positions ) ) {
			return $position;
		}
		return 'right';
	}

	/**
	 * sanitize_compare
	 */
	private function sanitize_compare( $compare ) {
		if ( ! preg_match( '/^(simple|category|tag|random|yarpp|simple_or_yarpp)$/', $compare ) ) {
			return 'simple';
		}
		if ( preg_match( '/^(simple_or_yarpp|yarpp)$/', $compare ) ) {
			if ( defined( 'YARPP_VERSION' ) && version_compare( YARPP_VERSION, '3.5' ) > -1 ) {
				return 'yarpp';
			}
			return 'simple';
		}
		return $compare;
	}

	/**
	 * exclude categories
	 */
	public function build_exclude_categories( $values ) {
		$args       = array(
			'hide_empty'   => false,
			'hierarchical' => false,
		);
		$content    = '';
		$categories = get_categories( $args );
		foreach ( $categories as $category ) {
			$id       = sprintf( 'category_%04d', $category->term_id );
			$content .= sprintf(
				'<li><input type="checkbox" name="iworks_upprev_exclude_categories[%d]" id="%s"%s%s /><label for="%s"> %s <small>(%d)</small></label></li>',
				esc_attr( $category->term_id ),
				esc_attr( $id ),
				is_array( $values ) && in_array( $category->term_id, $values ) ? ' checked="checked"' : '',
				'',
				esc_attr( $id ),
				$category->name,
				$category->count
			);
		}
		return '<ul>' . $content . '</li>';
	}

	/**
	 * exclude tags
	 */
	public function build_exclude_tags( $values ) {
		$args    = array(
			'hide_empty'   => false,
			'hierarchical' => false,
		);
		$content = '';
		$tags    = get_tags( $args );
		foreach ( $tags as $category ) {
			$id       = sprintf( 'category_%04d', $category->term_id );
			$content .= sprintf(
				'<li><input type="checkbox" name="iworks_upprev_exclude_tags[%d]" id="%s"%s%s /><label for="%s"> %s <small>(%d)</small></label></li>',
				esc_attr( $category->term_id ),
				esc_attr( $id ),
				is_array( $values ) && in_array( $category->term_id, $values ) ? ' checked="checked"' : '',
				'',
				esc_attr( $id ),
				$category->name,
				$category->count
			);
		}
		return '<ul>' . $content . '</li>';
	}

	/**
	 * Add upPrev trigger to the contentn
	 *
	 * Description.
	 *
	 * @since x.x.x
	 * @access (for functions: only use if private)
	 *
	 * @see Function/method/class relied on
	 * @link URL
	 * @global type $varname Description.
	 * @global type $varname Description.
	 *
	 * @param type $var Description.
	 * @param type $var Optional. Description.
	 * @return type Description.
	 */
	public function the_content( $content ) {
		if ( is_singular() ) {
			$content .= '<div id="upprev-trigger"></div>';
		}
		return $content;
	}

	/**
	 * Plugin logo for rate messages
	 *
	 * @since 4.0.0
	 *
	 * @param string $logo Logo, can be empty.
	 * @param object $plugin Plugin basic data.
	 */
	public function filter_plugin_logo( $logo, $plugin ) {
		if ( is_object( $plugin ) ) {
			$plugin = (array) $plugin;
		}
		if ( 'upprev' === $plugin['slug'] ) {
			return plugin_dir_url( dirname( dirname( __FILE__ ) ) ) . '/assets/images/upprev-logo.svg';
		}
		return $logo;
	}

	/**
	 * get box using ajax
	 *
	 * @since 4.0.0
	 */
	public function ajax_get_box() {
		$nonce = filter_input( INPUT_POST, '_wpnonce', FILTER_DEFAULT );
		if ( ! wp_verify_nonce( $nonce, 'upprev' ) ) {
			wp_send_json_error( 1 );
		}
		$post_id = filter_input( INPUT_POST, 'p', FILTER_VALIDATE_INT );
		if ( empty( $post_id ) ) {
			wp_send_json_error( 2 );
		}
		$box = $this->get_box( false, $post_id );
		if ( empty( $box ) ) {
			wp_send_json_error( 3 );
		}
		$content       = sprintf( '<!-- upPrev: %s/%s -->', IWORKS_UPPREV_VERSION, $this->version );
		$content      .= $box;
		$configuration = $this->get_config_javascript();
		if (
			isset( $configuration['close_button_show'] ) && $configuration['close_button_show']
			&& isset( $configuration['reopen_button_show'] ) && $configuration['reopen_button_show']
		) {
			$content .= '<a id="upprev_rise">&clubs;</a>';
		}
		$data = array(
			'html' => $content,
		);
		wp_send_json_success( $data );
	}

	/**
	 * get params
	 *
	 * @since 4.0.2
	 */
	private function get_params() {
		$params = array(
			'animation',
			'close_button_show',
			'color_set',
			'compare',
			'configuration',
			'css_border_width',
			'css_bottom',
			'css_side',
			'css_width',
			'excerpt_length',
			'excerpt_show',
			'ga_opt_noninteraction',
			'ga_track_clicks',
			'ga_track_views',
			'header_show',
			'header_text',
			'ignore_sticky_posts',
			'number_of_posts',
			'offset_element',
			'offset_percent',
			'reopen_button_show',
			'show_thumb',
			'taxonomy_limit',
			'thumb_height',
			'thumb_width',
			'url_new_window',
			'url_prefix',
			'url_suffix',
		);
		if ( $this->options->get_option( 'color_set' ) ) {
			$params = array_merge( $params, array( 'color', 'color_background', 'color_link', 'color_border' ) );
		}
		return $params;
	}

	/**
	 * register plugin to iWorks Rate Helper
	 *
	 * @since 4.1.0
	 */
	public function action_init_register_iworks_rate() {
		if ( ! class_exists( 'iworks_rate' ) ) {
			include_once dirname( __FILE__ ) . '/rate/rate.php';
		}
		do_action(
			'iworks-register-plugin',
			plugin_basename( $this->plugin_file ),
			__( 'upPrev', 'upprev' ),
			'upprev'
		);
	}

	/**
	 * check option object
	 *
	 * @since 4.1.0
	 */
	private function check_option_object() {
		if ( is_a( $this->options, 'iworks_options' ) ) {
			return;
		}
		$this->options = iworks_upprev_get_options();
	}
}
