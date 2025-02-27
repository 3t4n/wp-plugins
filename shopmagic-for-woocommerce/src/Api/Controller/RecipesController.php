<?php

declare( strict_types=1 );

namespace WPDesk\ShopMagic\Api\Controller;

use WPDesk\ShopMagic\Api\Normalizer\RecipeAutomationNormalizer;
use WPDesk\ShopMagic\Components\Collections\ArrayCollection;
use WPDesk\ShopMagic\Recipe\RecipeConverter;
use WPDesk\ShopMagic\Workflow\Automation\Automation;

class RecipesController {

	private const DEFAULT_LOCALE = 'en_US';

	private string $recipes_dir;

	public function __construct( string $recipes_dir ) {
		$this->recipes_dir = $recipes_dir;
	}

	public function index( RecipeAutomationNormalizer $normalizer, RecipeConverter $converter ): \WP_REST_Response {
		$locale       = $this->get_locale();
		$lang_path    = $this->recipes_dir . '/' . $locale;
		$recipe_files = (array) scandir( $lang_path );
		sort( $recipe_files, SORT_NATURAL );
		$recipes = ( new ArrayCollection( $recipe_files ) )
			->filter(
				static function ( string $filename ) use ( $lang_path ) {
					return is_file( $lang_path . '/' . $filename );
				}
			)
			->map(
				static function ( string $filename ) use ( $lang_path, $converter ): Automation {
					$decoded = json_decode( file_get_contents( $lang_path . '/' . $filename ), true );

					return $converter->to_automation( $decoded );
				}
			)
			->map( \Closure::fromCallable( [ $normalizer, 'normalize' ] ) )
			->to_array();

		return new \WP_REST_Response( $recipes );
	}

	private function get_locale(): string {
		$locale = get_locale();
		if ( ! file_exists( $this->recipes_dir . '/' . $locale ) ) {
			$locale = self::DEFAULT_LOCALE;
		}

		return $locale;
	}
}
