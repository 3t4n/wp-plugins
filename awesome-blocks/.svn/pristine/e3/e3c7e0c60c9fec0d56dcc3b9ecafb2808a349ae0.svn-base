<?php
/**
 * simple menu block class.
*
* @since	  5.0.0
* @package	awesome-blocks
* @subpackage awesome-blocks/includes/blocks
* @author	 zintaThemes <>
*/

if (! defined( 'ABSPATH' ) || class_exists( 'AwesomeBlocksSmenu' )) return;

class AwesomeBlocksSmenu extends AwesomeBlocks
{

	/**
	 * The single instance of AwesomeBlocks.
	 * @var	 object
	 * @access  private
	 * @since	 3.0.0
	 */
	private static $_instance = false;

	/**
	 * Define the pagecontent block class.
	 *
	 * @access		public
	 * @since		1.0.0
	 * @var		  unown
	 */
	public function __construct() {
		if ( self::$_instance ) return self::$_instance;
		$this->register_smenu();
		return self::$_instance = true;
	} // End __construct()

	/**
	 * pagecontent block
	 */
	private function register_smenu() {
		register_block_type( 'awesome-blocks/smenu',
			[
				'render_callback' => [
					$this,
					'render_callback'
				],
				'attributes' => [
					'menu' => [
						'type' => 'string',
						'default' => ''
					],
					'align' => [
						'type' => 'string',
						'default' => ''
					],
					'editor' => [
						'type' => 'boolean',
						'default' => false
					],
					'id' => [
						'type' => 'string',
						'default' => ''
					],
					'vertical' => [
						'type' => 'boolean',
						'default' => false
					],
					'classesList' => [
						'type' => 'string',
						'default' => ''
					]
				]
			]
		);
	}

	/**
	 * render_callback
	 *
	 * @param	  array   $attributes  The attributes
	 *
	 * @return	 string  ( description_of_the_return_value )
	 */
	public function render_callback( $attributes = [] ) {
		if ( empty( $attributes ) || ! is_array($attributes) ) return '';
		extract($attributes);

		$depth = 6;

		$class = ! empty($classesList) ? ' '.$classesList : '';

		$menu_align = $align ? ' hb-' . $align : '';
		$menu_vertical = isset($vertical) && $vertical ? ' awesome-blocks-vertical' : ' awesome-blocks-horizontal';

		$menu_before = '<div class="wp-block-awesome-blocks-smenu' . esc_attr($menu_align . $class . ' ' . $id) . '"><ul class="' . esc_attr($menu_vertical) . '">';
		$wp_nav_menu = wp_nav_menu( array(
			'sort_column' => 'menu_order',
			'container' => false,
			'menu' => $menu,
			// 'menu_id' => $id,
			'menu_class' => false,
			'items_wrap' => '%3$s',
			'echo' => false,
			'depth'=> $depth
		) );
		$menu_after = '</ul></div>';
		return $wp_nav_menu ? $menu_before . $wp_nav_menu . $menu_after : '';
	} // End render_callback()

} // End AwesomeBlocks {}
