<?php

/**
 * Class GraphicSettings
 * @package DaReactions\Pages
 *
 * Admin settings page for graphic features
 *
 * @since 1.0.0
 */
namespace DaReactions\Pages;

/**
 * Class GraphicSettings
 * @package DaReactions\Pages
 *
 * Admin settings page for graphic features
 *
 * @since 1.0.0
 */
class GraphicSettings extends SettingsPage {
    private $fade_methods;

    private $templates;

    private $alignments;

    private $showCountOptions;

    /**
     */
    public function setValues() {
        $this->fade_methods = array(
            'none'         => __( 'None', 'da-reactions' ),
            'transparence' => __( 'Transparence', 'da-reactions' ),
            'desaturate'   => __( 'Desaturate', 'da-reactions' ),
            'blur'         => __( 'Blur', 'da-reactions' ),
        );
        $this->templates = array(
            'exposed' => __( 'Exposed: all buttons are immediately visible on big screens, on small screens displays a hamburger toggle button', 'da-reactions' ),
            'reveal'  => __( 'Reveal: only the most used reaction is visible, other icons are revealed on click', 'da-reactions' ),
            'static'  => __( 'Static: all reactions are always visible on any screen size', 'da-reactions' ),
        );
        $this->alignments = array(
            'left'   => __( ' Align left', 'da-reactions' ),
            'center' => __( ' Center', 'da-reactions' ),
            'right'  => __( ' Align right', 'da-reactions' ),
        );
        $this->showCountOptions = array(
            'always'              => __( 'Always show the total number of votes', 'da-reactions' ),
            'percentage'          => __( 'Always show the percentage', 'da-reactions' ),
            'non-zero'            => __( 'Total number of votes if greater than zero', 'da-reactions' ),
            'percentage-non-zero' => __( 'Percentage if greater than zero', 'da-reactions' ),
            'never'               => __( 'Never', 'da-reactions' ),
        );
        $this->navigation = array();
        $this->navigation['default'] = array(
            'title'   => __( 'Default', 'da-reactions' ),
            'visible' => true,
        );
        if ( isset( $_GET['tab'] ) ) {
            $this->current_tab = filter_var( $_GET['tab'], FILTER_SANITIZE_FULL_SPECIAL_CHARS );
        }
        if ( !(array_key_exists( $this->current_tab, $this->navigation ) && $this->navigation[$this->current_tab]['visible'] === true) ) {
            $this->current_tab = 'default';
        }
    }

    /**
     * Register all settings for this page
     *
     * @since 1.0.0
     */
    public function initSettings() {
        $this->setValues();
        register_setting( $this->options_group, $this->options_group, array($this, 'sanitizeData') );
        $valid_tab = false;
        if ( $this->current_tab === 'default' ) {
            $this->registerDefaultSettings();
            $valid_tab = true;
        }
        if ( $this->current_tab === 'mobile' && darea_fs()->is__premium_only() ) {
            $this->registerMobileSettings();
            $valid_tab = true;
        }
        if ( !$valid_tab ) {
            /** @noinspection ForgottenDebugOutputInspection */
            wp_die( 'May I help you?' );
        }
    }

    /**
     * Register settings for default page
     *
     * @since 3.8.0
     */
    private function registerDefaultSettings() {
        $section = 'graphic_section';
        $title = __( 'Graphic Preferences', 'da-reactions' );
        $intro = __( 'These are the graphics settings of reactions on your site, use these settings to determine the appearance, size, and text to be displayed.', 'da-reactions' );
        add_settings_section(
            $section,
            $title,
            $this->makeSectionRenderer( $intro ),
            $this->options_page
        );
        add_settings_field(
            'da_r_reactions_size_selector',
            __( 'Select size for reaction buttons', 'da-reactions' ),
            $this->makeTextfieldRenderer( 'button_size', '64', array(
                'min'   => '10',
                'type'  => 'number',
                'class' => 'refresh-preview',
            ) ),
            $this->options_page,
            $section
        );
        add_settings_field(
            'da_r_reactions_fade_method',
            __( 'Select fade method for inactive buttons', 'da-reactions' ),
            $this->makeSelectRenderer(
                'fade_method',
                'none',
                $this->fade_methods,
                array(
                    'class' => 'refresh-preview',
                )
            ),
            $this->options_page,
            $section
        );
        add_settings_field(
            'da_r_reactions_fade_amount',
            __( 'Fade effect value (0 - 100)', 'da-reactions' ),
            $this->makeTextfieldRenderer( 'fade_value', '50', array(
                'min'   => '0',
                'max'   => '100',
                'type'  => 'number',
                'class' => 'refresh-preview',
            ) ),
            $this->options_page,
            $section
        );
        add_settings_field(
            'da_r_reactions_buttons_template_radio',
            __( 'Select a template for reactions', 'da-reactions' ),
            $this->makeSelectRenderer(
                'use_template',
                'exposed',
                $this->templates,
                array(
                    'class' => 'refresh-preview',
                )
            ),
            $this->options_page,
            $section
        );
        add_settings_field(
            'da_r_show_count',
            __( 'Show reactions count', 'da-reactions' ),
            $this->makeSelectRenderer(
                'show_count',
                '',
                $this->showCountOptions,
                array(
                    'id'    => 'show_count',
                    'class' => 'refresh-preview',
                )
            ),
            $this->options_page,
            $section
        );
        add_settings_field(
            'da_r_reactions_buttons_alignment_radio',
            __( 'Select widget alignment', 'da-reactions' ),
            $this->makeSelectRenderer(
                'buttons_alignment',
                'center',
                $this->alignments,
                array(
                    'class' => 'refresh-preview',
                )
            ),
            $this->options_page,
            $section
        );
        add_settings_field(
            'da_r_reactions_description_text',
            __( 'Text do display before reaction buttons', 'da-reactions' ),
            array($this, 'renderDescriptionTextEditor'),
            $this->options_page,
            $section
        );
    }

    private function registerMobileSettings() {
        $section = 'graphic_section_mobile';
        $title = __( 'Graphic Preferences on mobile devices', 'da-reactions' );
        $intro = __( 'These options can be enabled to display the widget with different settings on mobile devices.', 'da-reactions' );
        add_settings_section(
            $section,
            $title,
            $this->makeSectionRenderer( $intro ),
            $this->options_page
        );
        add_settings_field(
            'da_r_reactions_enable_mobile_settings',
            __( 'Enable mobile settings', 'da-reactions' ),
            $this->makeCheckboxRenderer( 'da_r_mobile_enabled', __( 'Create different settings for mobile devices.', 'da-reactions' ) ),
            $this->options_page,
            $section
        );
        $section = 'graphic_section_mobile_toggle';
        add_settings_section(
            $section,
            '',
            $this->makeSectionRenderer( '' ),
            $this->options_page
        );
        add_settings_field(
            'da_r_reactions_size_selector_mobile',
            __( 'Select size for reaction buttons', 'da-reactions' ),
            $this->makeTextfieldRenderer( 'button_size_mobile', '64', array(
                'min'   => '10',
                'type'  => 'number',
                'class' => 'refresh-preview',
            ) ),
            $this->options_page,
            $section
        );
        add_settings_field(
            'da_r_reactions_fade_method_mobile',
            __( 'Select fade method for inactive buttons', 'da-reactions' ),
            $this->makeSelectRenderer(
                'fade_method_mobile',
                'none',
                $this->fade_methods,
                array(
                    'class' => 'refresh-preview',
                )
            ),
            $this->options_page,
            $section
        );
        add_settings_field(
            'da_r_reactions_fade_amount_mobile',
            __( 'Fade effect value (0 - 100)', 'da-reactions' ),
            $this->makeTextfieldRenderer( 'fade_value_mobile', '50', array(
                'min'   => '0',
                'max'   => '100',
                'type'  => 'number',
                'class' => 'refresh-preview',
            ) ),
            $this->options_page,
            $section
        );
        add_settings_field(
            'da_r_reactions_buttons_template_radio_mobile',
            __( 'Select a template for reactions', 'da-reactions' ),
            $this->makeSelectRenderer(
                'use_template_mobile',
                'exposed',
                $this->templates,
                array(
                    'class' => 'refresh-preview',
                )
            ),
            $this->options_page,
            $section
        );
        add_settings_field(
            'da_r_show_count_mobile',
            __( 'Show reactions count', 'da-reactions' ),
            $this->makeSelectRenderer(
                'show_count_mobile',
                '',
                $this->showCountOptions,
                array(
                    'id'    => 'show_count',
                    'class' => 'refresh-preview',
                )
            ),
            $this->options_page,
            $section
        );
        add_settings_field(
            'da_r_reactions_buttons_alignment_radio_mobile',
            __( 'Select widget alignment', 'da-reactions' ),
            $this->makeSelectRenderer(
                'buttons_alignment_mobile',
                'center',
                $this->alignments,
                array(
                    'class' => 'refresh-preview',
                )
            ),
            $this->options_page,
            $section
        );
        add_settings_field(
            'da_r_reactions_description_text_mobile',
            __( 'Text do display before reaction buttons', 'da-reactions' ),
            array($this, 'renderDescriptionTextEditor'),
            $this->options_page,
            $section
        );
    }

    /**
     * Render input field for text before Reaction Buttons
     *
     * @since 1.0.0
     */
    public function renderDescriptionTextEditor() {
        $field_id = 'wysiwyg_description_text';
        $saved_value = html_entity_decode( esc_html( $this->options->getOption( 'description_text', '' ) ) );
        $settings = array(
            'teeny'         => true,
            'textarea_rows' => 15,
            'tabindex'      => 1,
            'textarea_name' => $this->options->getFieldName( 'description_text' ),
            'media_buttons' => false,
        );
        wp_editor( $saved_value, $field_id, $settings );
    }

    /**
     * Render input field for text before Reaction Buttons
     *
     * @since 1.0.0
     */
    public function renderDescriptionTextMobileEditor() {
        $field_id = 'wysiwyg_description_text_mobile';
        $saved_value = html_entity_decode( esc_html( $this->options->getOption( 'description_text_mobile', '' ) ) );
        $settings = array(
            'teeny'         => true,
            'textarea_rows' => 15,
            'tabindex'      => 1,
            'textarea_name' => $this->options->getFieldName( 'description_text_mobile' ),
            'media_buttons' => false,
        );
        wp_editor( $saved_value, $field_id, $settings );
    }

    /**
     * Render function for show count option selector
     *
     * @since 3.5.0
     */
    public function makeShowCounterSelector() {
        $field_name = $this->options->getFieldName( 'show_count' );
        $saved_value = $this->options->getOption( 'show_count', 'always' );
        ?>
        <p>
            <select id="id_<?php 
        echo esc_attr( $field_name );
        ?>" name="<?php 
        echo esc_attr( $field_name );
        ?>">
                <option value="always" <?php 
        echo ( empty( $saved_value ) || $saved_value === 'always' ? 'selected = "selected"' : '' );
        ?>>
			        <?php 
        esc_html_e( 'Always', 'da-reactions' );
        ?></option>
                <option value="non-zero" <?php 
        echo ( $saved_value === 'non-zero' ? 'selected = "selected"' : '' );
        ?>>
			        <?php 
        esc_html_e( 'Only if greater than zero', 'da-reactions' );
        ?></option>
                <option value="never" <?php 
        echo ( $saved_value === 'never' ? 'selected = "selected"' : '' );
        ?>>
			        <?php 
        esc_html_e( 'Never', 'da-reactions' );
        ?></option>
            </select>
        </p>
        <?php 
    }

    /**
     * Should validate input data, do nothing for now
     *
     * @param array $input
     *
     * @return array
     *
     * @since 1.0.0
     */
    public function sanitizeData( $input ) {
        /**
         * Preserve previously saved data
         *
         * @since 3.1.1
         */
        $saved_options = $this->options->getAllOptions();
        foreach ( $input as $key => $value ) {
            $saved_options[$key] = $value;
        }
        return $saved_options;
    }

}
