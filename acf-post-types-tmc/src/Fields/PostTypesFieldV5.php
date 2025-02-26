<?php
namespace tmc\acfptf\src\Fields;

/**
 * @author jakubkuranda@gmail.com
 * Date: 22.08.2018
 * Time: 15:45
 */

use acf_field;
use tmc\acfptf\src\App;

class PostTypesFieldV5 extends acf_field {

	/**
	 *  This function will setup the field type data.
	 */
	public function __construct() {

	    //  ----------------------------------------
	    //  Properties
	    //  ----------------------------------------

		$this->name         = App::s()->getPrefix( '_post_types_checkbox' );
		$this->label        = __( 'Post Types', 'tmc-acfptf' );
		$this->category     = 'choice';
		$this->defaults     = array(
			'show_only_custom'  =>  false,
			'show_only_public'  =>  true,
			'allow_multiple'    =>  false,
			'whitelist'         =>  '',
			'blacklist'         =>  ''
		);

		//  ----------------------------------------
		//  Parent constructor
		//  ----------------------------------------

		parent::__construct();

	}


	/**
	 *  Create extra settings for your field. These are visible when editing a field.
     *
     * @param array $field
	 */
	public function render_field_settings( $field ) {

		//  TODO

	}



	/**
     *  Create the HTML interface for your field
     *
     *  @param array $field
     */
	public function render_field( $field ) {

//		echo App::s()->utility->getFormattedVarExport( $field );

		//  ----------------------------------------
		//  Prepare whitelist/blacklist
		//  ----------------------------------------

		$whitelistAsArray = array_filter( preg_split( "/[\s,]+/", $field['whitelist'] ) );
		$blacklistAsArray = array_filter( preg_split( "/[\s,]+/", $field['blacklist'] ) );

		//  ----------------------------------------
		//  Prepare list of post types
		//  ----------------------------------------

		$argsForCustom = array(
			'public'        =>  (bool) $field['show_only_public'],
			'_builtin'      =>  false
		);

		$argsForBuiltIn = array(
			'public'        =>  (bool) $field['show_only_public'],
			'_builtin'      =>  true
		);

		$customPostTypes = App::i()->utility->getPostTypesNames( $argsForCustom );
		$builtInPostTypes = App::i()->utility->getPostTypesNames( $argsForBuiltIn );

		if( $field['show_only_custom'] ){

			$allPostTypes = $customPostTypes;   //  All post types? More like: only custom post types!!!

		} else {

			$allPostTypes = array_merge( $builtInPostTypes, $customPostTypes );
			$allPostTypes = array_unique( $allPostTypes );

		}

        //  ----------------------------------------
        //  Render checkboxes/radio
        //  ----------------------------------------

		$inputType = $field['allow_multiple'] ? 'checkbox' : 'radio';   //  Multiple or single select?

		printf( '<input type="hidden" name="%1$s" value="">', $field['name'] );
        printf( '<ul class="acf-%1$s-list acf-bl">', $inputType );
        foreach( $allPostTypes as $postTypeName => $postTypeLabel ){

        	if( ! empty( $whitelistAsArray ) && ! in_array( $postTypeName, $whitelistAsArray ) ) continue;
        	if( ! empty( $blacklistAsArray ) && in_array( $postTypeName, $blacklistAsArray ) ) continue;

            $savedValue = (array) $field['value'];
            $isChecked  = in_array( $postTypeName, $savedValue );

            printf( '<li><label style="display: block;" title="%1$s"><input type="%2$s" name="%3$s" value="%4$s" %5$s><span>%6$s</span></label></li>',
                esc_attr( $postTypeName ),
                esc_attr( $inputType ),
                esc_attr( $field['name'] . '[]' ),
                esc_attr( $postTypeName ),
                checked( $isChecked, true, false ),
                $postTypeLabel
            );

        }
        echo '</ul>';

	}

	/**
     * This filter is appied to the $value after it is loaded from the db and before it is returned to the template.
     *
	 * @param mixed $value
	 * @param int $postId
	 * @param array $field
     *
     * @return mixed
	 */
	public function format_value( $value, $postId, $field ) {

        return (array) $value;

    }

    /**
	 * This filter is applied to the $value before it is saved in the db.
	 *
	 * @param	mixed $value
	 * @param	int   $postId
	 * @param	array $field
     *
     * @return    mixed
	 */
	public function update_value( $value, $postId, $field ) {

		return empty( $value ) ? array() : (array) $value;

	}

}