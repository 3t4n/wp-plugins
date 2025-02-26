<?php
namespace tmc\acfptf\src;

/**
 * @author jakubkuranda@gmail.com
 * Date: 22.08.2018
 * Time: 15:14
 */

use shellpress\v1_2_9_1\ShellPress;
use tmc\acfptf\src\Components\Utility;
use tmc\acfptf\src\Fields\PostTypesFieldV5;

class App extends ShellPress {

	const TMC_URL = 'https://themastercut.co/';

	/** @var Utility */
	public $utility;

	/**
	 * Called automatically after core is ready.
	 *
	 * @return void
	 */
	protected function onSetUp() {

		//  ----------------------------------------
		//  Autoloading
		//  ----------------------------------------

		$this::s()->autoloading->addNamespace( 'tmc\acfptf', dirname( $this::s()->getMainPluginFile() ) );

		//  ----------------------------------------
		//  Components
		//  ----------------------------------------

		$this->utility = new Utility( $this );

		//  ----------------------------------------
		//  Actions
		//  ----------------------------------------

		add_action( 'acf/field_group/admin_enqueue_scripts',    array( $this, '_a_enqueueFieldGroupScripts' ) );
		add_action( 'acf/include_field_types',                  array( $this, '_a_includeAcfFieldsDefinition' ) );  // ACF5
		add_action( 'acf/register_fields',                      array( $this, '_a_includeAcfFieldsDefinition' ) );  // ACF4

	}

	//  ================================================================================
	//  ACTIONS
	//  ================================================================================

	/**
	 * Includes fields definition. Supports both ACF4 and ACF5 versions.
	 *
	 * Called on acf/include_field_types.   //  ACF v5
	 * Called on acf/register_fields.       //  ACF v4
	 *
	 * @param int|false
	 *
	 * @return void
	 */
	public function _a_includeAcfFieldsDefinition( $acfVersion = false ) {

		if( $acfVersion ){
			new PostTypesFieldV5();
		}

	}

	/**
	 * Enqueues custom scripts and styles on admin field group edit page.
	 * Called on acf/field_group/admin_enqueue_scripts.
	 *
	 * @return void
	 */
	public function _a_enqueueFieldGroupScripts() {

		wp_enqueue_script( App::s()->getPrefix( '_fieldGroupsModificator' ), App::s()->getUrl( 'assets/js/fieldGroupsModificator.js' ), array( 'jquery' ), App::s()->getFullPluginVersion() );

	}

}