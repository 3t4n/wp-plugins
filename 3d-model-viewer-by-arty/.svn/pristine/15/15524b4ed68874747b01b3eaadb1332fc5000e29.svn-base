<?php

/**
 * @package  3D-Model-Viewer-by-Arty
 */

namespace Arty_3DModelViewer\Settings;

use Arty_3DModelViewer\Controllers\Arty_3DModelViewer_BaseController;


class Arty_3DModelViewer_WooCommerceSettings extends Arty_3DModelViewer_BaseController
{

    /**
     * Initialization function
     * @return void
     */
    public function arty_3dmodelviewer_register()
    {
        add_filter( 'woocommerce_settings_tabs_array', array( $this, 'arty_3dmodelviewer_add_woocommerce_section' ),50 );
        add_action( 'woocommerce_settings_' . $this->woo_tab_id, array( $this, 'arty_3dmodelviewer_woocommerce_section_settings' ) );
    }

    function arty_3dmodelviewer_add_woocommerce_section( $tabs )
    {
        $tabs[$this->woo_tab_id] = __('3D Model Viewer by Arty','3d-model-viewer-by-arty');
        return $tabs;
    }

    function arty_3dmodelviewer_woocommerce_section_settings()
    {
        global $current_section;

        $sections = array(
            '' => 'Integration',
            'settings'  => 'Viewer settings'
        );

        echo '<ul class="subsubsub">';

        foreach( $sections as $id => $label ) {
            $url = add_query_arg(
                array(
                    'page' => 'wc-settings',
                    'tab' => $this->woo_tab_id,
                    'section' => $id,
                ),
                admin_url( 'admin.php' )
            );

            $current = $current_section == $id ? 'class="current"' : '';

            $separator = end( array_keys( $sections ) ) === $id ? '' : '|';
			
			echo '<li><a href="' . esc_url( $url ) . '" ' . esc_attr( $current ) . '>' . esc_html( $label ) . '</a> ' . esc_html( $separator ) . '</li>';
        }

        echo '</ul><br class="clear" />';

        if ( $current_section == '' ){
            $this->arty_3dmodelviewer_integration();
        }

        if ( $current_section == 'settings' ){
            $this->arty_3dmodelviewer_settings();
        }
    }

    function arty_3dmodelviewer_integration()
    {
		include $this->plugin_path. '/templates/admin.php';
    }

    function arty_3dmodelviewer_settings() {
		
		if ( isset( $_POST['arty_3dmodel_settings'] ) ) {
			// Unslash the POST data
			$arty_3dmodel_settings = wp_unslash( sanitize_text_field( $_POST['arty_3dmodel_settings'] ) );
			
			// Verify the nonce
			if ( wp_verify_nonce( $arty_3dmodel_settings, 'arty_3dmodel_viewer' ) ) {
    
				$height = wp_unslash( sanitize_text_field( $_POST['arty_3dmodelviewer_settings_height'] ) );
				$defaultValuesOptions = array(
					'height' => $height
				);
				update_option( 'arty_3dmodelviewer_woocommerce_default_values', $defaultValuesOptions, 'yes' );
    
				$position = wp_unslash( sanitize_text_field( $_POST['arty_3dmodelviewer_settings_position'] ) );
				$defaultPositionsOptions = array(
					'position' => $position
				);
				update_option( 'arty_3dmodelviewer_woocommerce_default_position', $defaultPositionsOptions, 'yes' );
			}
		}

        $viewerOptions = get_option( 'arty_3dmodelviewer_woocommerce_default_values' );
        $height = $viewerOptions['height'];

        $defaultPosition = get_option( 'arty_3dmodelviewer_woocommerce_default_position' );
        $position = $defaultPosition['position'];

        ?>

        <h3><?php esc_html_e( 'Set default viewer values', '3d-model-viewer-by-arty' ); ?></h3>

        <table class="form-table">
            <tbody>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label for="arty_3dmodelviewer_settings_height"><?php esc_html_e( 'Container height (pixels)','3d-model-viewer-by-arty' ) ?></label>
                    </th>
                    <td class="forminp forminp-text">
                        <input name="arty_3dmodelviewer_settings_height" id="arty_3dmodelviewer_settings_height" type="number" min="300" value="<?php echo esc_html( $height ); ?>">
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label for="arty_3dmodelviewer_settings_position"><?php esc_html_e( 'Viewer position on product page','3d-model-viewer-by-arty' ) ?></label>
                        <p style="font-size: 10px; font-weight: 500">
							<?php esc_html_e( 'NOTE: Viewer position can be overridden by your theme','3d-model-viewer-by-arty' ) ?>
                        </p>
                    </th>
                    <td class="forminp forminp-text">
                        <select name="arty_3dmodelviewer_settings_position" id="arty_3dmodelviewer_settings_position">
							<?php
								foreach ( $this->product_page_positions as $key => $value ) {
									$selected = ( $key == $position ) ? 'selected' : '';
									echo '<option value="' . esc_attr( $key ) . '" ' . esc_attr( $selected ) . '>' . esc_html( $value ) . '</option>';
								}
							?>
                        </select>
                    </td>
                </tr>
				
				<?php wp_nonce_field( 'arty_3dmodel_viewer', 'arty_3dmodel_settings' ); ?>
            
            </tbody>
        </table>

        <?php
    }
}
