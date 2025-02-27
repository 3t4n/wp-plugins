<?php

namespace Codemanas\SimplePopupBlock;

class Patterns {
	public static ?Patterns $instance = null;

	public static function get_instance(): ?Patterns {
		return is_null( self::$instance ) ? self::$instance = new self() : self::$instance;
	}

	protected function __construct() {
		//register pattern code goes here
		add_action( 'init', [ $this, 'register_block_pattern' ] );


		//register pattern category
		add_action( 'init', [ $this, 'register_block_pattern_categories' ] );
	}


	public function register_block_pattern() {
		//Default: the value is passed from the patterns header i.e. the Title hold the value of the Title from pattern header.
		$default_headers = array(
			'title'         => 'Title',
			'slug'          => 'Slug',
			'description'   => 'Description',
			'viewportWidth' => 'Viewport Width',
			'inserter'      => 'Inserter',
			'categories'    => 'Categories',
			'keywords'      => 'Keywords',
			'blockTypes'    => 'Block Types',
			'postTypes'     => 'Post Types',
			'templateTypes' => 'Template Types',
		);

		$dir_path = SIMPLE_POPUP_BLOCK_DIR_PATH . 'patterns/';
		$files    = glob( $dir_path . '*.php' );

		//	Blank pattern had to be shifted as the first element in the array since it is being targeted using :first-child
		// in editor.scss
		foreach ( $files as $file ) {
			if ( str_contains( $file, 'blank.php' ) ) {
				array_unshift( $files, $file );
			}
		}

		foreach ( array_unique( $files ) as $file ) { // The above array_unshift makes blank.php duplicated so need to use array_unique
			$pattern_data = get_file_data( $file, $default_headers );

			// The actual pattern content is the output of the file.
			ob_start();
			include $file;
			$pattern_data['content'] = ob_get_clean();

			if ( ! $pattern_data['content'] ) {
				continue;
			}

			//parse properties of type array.
			foreach ( array( 'categories', 'keywords', 'blockTypes', 'postTypes', 'templateTypes' ) as $property ) {
				if ( ! empty( $pattern_data[ $property ] ) ) {
					$pattern_data[ $property ] = array_filter(
						preg_split(
							'/[\s,]+/',
							(string) $pattern_data[ $property ]
						)
					);
				} else {
					unset( $pattern_data[ $property ] );
				}
			}

			// Parse properties of type int.
			foreach ( array( 'viewportWidth' ) as $property ) {
				if ( ! empty( $pattern_data[ $property ] ) ) {
					$pattern_data[ $property ] = (int) $pattern_data[ $property ];
				} else {
					unset( $pattern_data[ $property ] );
				}
			}

			// Parse properties of type boolean .
			foreach ( array( 'inserter' ) as $property ) {
				if ( ! empty( $pattern_data[ $property ] ) ) {
					$pattern_data[ $property ] = in_array(
						strtolower( $pattern_data[ $property ] ),
						array( 'yes', 'true' ),
						true
					);
				} else {
					unset( $pattern_data[ $property ] );
				}
			}

			register_block_pattern( 'codemanas/simple-popup-block/' . $pattern_data['slug'], $pattern_data );
		}
	}


	public function register_block_pattern_categories() {
		register_block_pattern_category(
			'codemanas',
			array( 'label' => __( 'Codemanas', 'simple-popup-block' ) )
		);
	}
}
