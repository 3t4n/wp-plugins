<?php

/**
 * Custmizer extensions for Meteorite
 *
 * @package    	Meteorite_Extensions
 * @link        http://terra-themes.com
 * Author:      Terra Themes
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

function meteorite_extensions_customize_register( $wp_customize ) {

    // Titles
    class Meteorite_Extensions_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
            <h3 style="margin-top:30px;color:#FFF;padding:5px;background-color:#435159;text-align:center;text-transform:uppercase;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }

	/*--------------------------------------------------------------
    # Custom Post Types
    --------------------------------------------------------------*/
    $wp_customize->add_section(
        'meteorite_cpt',
        array(
            'title'     => __('Custom Post Types', 'meteorite_extensions'),
            'description' => __( 'Here you can change the slugs for the custom post types like projects, employees etc. Please note: your changes won\'t happen instantly. Once you changed your slugs, go to the backend and from <strong>Settings > Permalinks</strong> click on Save without making any changes.', 'meteorite_extensions' ),
            'priority'  => 20,
        )
    );

    // Layout Options title
    $wp_customize->add_setting('meteorite_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control( new Meteorite_Extensions_Info( $wp_customize, 'cpt_slug_title', array(
        'label' => __('Slugs', 'meteorite_extensions'),
        'section' => 'meteorite_cpt',
        'settings' => 'meteorite_options[info]',
        'priority' => 10
        ) )
    );

    $cpts = array('employees', 'clients', 'testimonials', 'projects', 'slides');

    foreach ( $cpts as $cpt ) {
        $wp_customize->add_setting(
            'cpts_slug_' . $cpt,
            array(
                'default' => $cpt,
                'sanitize_callback' => 'meteorite_extensions_sanitize_text',
            )
        );
        $wp_customize->add_control(
            'cpts_slug_' . $cpt,
            array(
                'label'         => ucwords(str_replace('-',' ',$cpt)) . __( ' slug', 'meteorite_extensions' ),
                'section'       => 'meteorite_cpt',
                'type'          => 'text',
                'priority'      => 10,
                'description'   => sprintf(__( 'The slug you add here will replace the word <strong>%s</strong> in the permalink.', 'meteorite_extensions' ), $cpt),
            )
        );
    }

    // Default row padding title
    $wp_customize->add_setting('meteorite_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control( new Meteorite_Extensions_Info( $wp_customize, 'so_default_row_padding_title', array(
        'label' => __('Default Row Padding', 'meteorite_extensions'),
        'section' => 'meteorite_general',
        'settings' => 'meteorite_options[info]',
        'priority' => 40
        ) )
    );

    // Default row padding
    $wp_customize->add_setting(
        'so_default_row_padding',
        array(
            'default'           => '100',
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control( 'so_default_row_padding', array(
        'type'          => 'number',
        'priority'      => 42,
        'section'       => 'meteorite_general',
        'label'         => __( 'Default Row Padding', 'meteorite_extensions' ),
        'description'   => __( 'Default padding that is applied to rows from Page Builder by SiteOrigin', 'meteorite_extensions' ),
        'input_attrs'   => array(
            'min'   => 0,
            'max'   => 1000,
            'step'  => 5,
        ),
    ) );

}
add_action( 'customize_register', 'meteorite_extensions_customize_register' );

/**
* Sanitize
*/

// Text
function meteorite_extensions_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}