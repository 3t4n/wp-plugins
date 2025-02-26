<?php

if ( ! class_exists( 'About_Author_Box_Settings_API' ) ) {

     /**
     * Helper class for the WP Settings API
     *
     * @since 1.0.0
     */
    class About_Author_Box_Settings_API {

        protected $settings_sections = array();
        protected $settings_fields = array();

        /**
         * Constructor
         *
         * @since 1.0.0
         */
        public function __construct() {

            add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
            add_action( 'admin_init', array( $this, 'register_settings' ), 10 );

        }

        /**
         * Enqueue scripts and styles
         *
         * @since 1.0.0
         */
        function enqueue_scripts() {

            // enqueues

        }

        /**
         * Display navigation
         *
         * @since 1.0.0
         */
        function display_navigation() {

            ?>
            <style type="text/css">
                .about-author-box-admin-options {
                    padding: 20px;
                    background: #fff;
                    border: 1px solid rgba( 0, 0, 0, 0.1 );
                }
                .about-author-box-admin-options h2 {
                    display: none;
                }
                .about-author-box-admin-options .form-table tr {
                    border-bottom: 1px solid rgba( 0, 0, 0, 0.1 );
                }
                    .about-author-box-admin-options .form-table td,
                    .about-author-box-admin-options .form-table th {
                        padding: 30px 0;
                    }
                .about-author-box-admin-options input[type="text"] {
                    width: 300px;
                }
                .about-author-box-admin-options input[type="checkbox"] {
                    vertical-align: middle;
                }
                .about-author-box-admin-options p.description {
                    max-width: 400px;
                }
            </style>
            <?php
            $active_tab = isset( $_GET[ 'tab' ] ) ? sanitize_text_field( $_GET[ 'tab' ] ) : $this->settings_sections[0]['option'];
            ?>
            <h2 class="nav-tab-wrapper">
                <?php foreach ( $this->settings_sections as $section ) : ?>
                    <a href="?page=<?php echo esc_attr( $section['parent'] ); ?>&tab=<?php echo esc_attr( $section['option'] ); ?>" class="nav-tab <?php echo ( $active_tab == $section['option'] ) ? 'nav-tab-active' : ''; ?>"><?php echo esc_html( $section['title'] ); ?></a>
                <?php endforeach; ?>
            </h2>
            <?php
        }

        /**
         * Display content
         *
         * @since 1.0.0
         */
        function display_content() {

            $active_tab = isset( $_GET[ 'tab' ] ) ? sanitize_text_field( $_GET[ 'tab' ] ) : $this->settings_sections[0]['option'];

            foreach ( $this->settings_sections as $section ) {
                if ( $section['option'] == $active_tab ) {
                    if ( ! isset( $section['display'] ) || $section['display'] == true ) {
                        ?><form action="options.php" method="post" class="about-author-box-admin-options"><?php
                            settings_fields( $section['page'] );
                            do_settings_sections( $section['page'] );
                            submit_button();
                        ?></form><?php
                    } else {
                        do_action( 'about_author_box_settings_api_display_' . $section['id'] );
                    }
                }
            }

        }

        /**
         * Set sections
         *
         * @since 1.0.0
         */
        function set_sections( $sections ) {
            $this->settings_sections = $sections;
        }

        /**
         * Set fields
         *
         * @since 1.0.0
         */
        function set_fields( $fields ) {
            $this->settings_fields = $fields;
        }

        /**
         * Register settings
         *
         * @since 1.0.0
         */
        function register_settings() {

            foreach ( $this->settings_sections as $section ) {

                add_settings_section(
                    $section['id'],
                    $section['title'],
                    '', // description, leave empty
                    $section['page']
                );

                foreach ( $this->settings_fields[$section['id']] as $setting ) {

                    add_settings_field(
                        $setting['id'],
                        $setting['title'],
                        array( $this, 'display_field' ),
                        $section['page'],
                        $section['id'],
                        array( $setting, $section )
                    );

                }

                register_setting( $section['page'], $section['option'], array( $this, 'sanitize_input' ) );

            }

        }

        /**
         * Get the settings values
         *
         * @since 1.0.0
         */
        function get_option( $option_id ) {

            // all settings data
            $fields = $this->settings_fields;
            $sections = $this->settings_sections;

            // get section ID
            $section_id = false;
            foreach ( $sections as $section ) {
                if ( $section['option'] == $option_id ) {
                    $section_id = $section['id'];
                }
            }

            // no section ID, go back
            if ( ! $section_id ) {
                return false;
            }

            // generate defaults
            $defaults = array();
            foreach ( $fields[$section_id] as $field ) {
                if ( isset( $field['default'] ) ) {
                    $defaults[$field['id']] = $field['default'];
                } else {
                    $defaults[$field['id']] = '';
                }
            }

            // user defined
            $user_defined = get_option( $option_id, array() );

            // combine
            $option = array_merge( $defaults, $user_defined );

            // pass it back
            return $option;

        }

        /**
         * Display settings field
         *
         * @since 1.0.0
         */
        function display_field( $data ) {

            $setting = $data[0];
            $section = $data[1];

            switch ( $setting['type'] ) {

                case 'text':
                    $this->display_field_text( $setting, $section );
                    break;

                case 'textarea':
                    $this->display_field_textarea( $setting, $section );
                    break;

                case 'select':
                    $this->display_field_select( $setting, $section );
                    break;

                case 'checkbox':
                    $this->display_field_checkbox( $setting, $section );
                    break;

                case 'radio':
                    $this->display_field_radio( $setting, $section );
                    break;

                case 'number':
                    $this->display_field_number( $setting, $section );
                    break;

                default:
                    # code...
                    break;

            }

        }

        /**
         * Display text field
         *
         * @since 1.0.0
         */
        function display_field_text( $setting, $section ) {

            $settings = $this->get_option( $section['option'] );

            ?>
            <input type='text' name='<?php echo esc_attr( $section['option'] ); ?>[<?php echo esc_attr( $setting['id'] ); ?>]' value='<?php echo esc_attr( $settings[$setting['id']] ); ?>'>
            <?php
            if ( ! empty( $setting['descr'] ) ) {
                ?><p class="description"><?php echo esc_html( $setting['descr'] ); ?></p><?php
            }

        }

        /**
         * Display textarea field
         *
         * @since 1.0.0
         */
        function display_field_textarea( $setting, $section ) {

            $settings = $this->get_option( $section['option'] );
            ?>
            <textarea cols='40' rows='5' name='<?php echo esc_attr( $section['option'] ); ?>[<?php echo esc_attr( $setting['id'] ); ?>]'><?php echo esc_html( $settings[$setting['id']] ); ?></textarea>
            <?php
            if ( ! empty( $setting['descr'] ) ) {
                ?><p class="description"><?php echo esc_html( $setting['descr'] ); ?></p><?php
            }

        }

        /**
         * Display select field
         *
         * @since 1.0.0
         */
        function display_field_select( $setting, $section ) {

            $settings = $this->get_option( $section['option'] );
            ?>
            <select name='<?php echo esc_attr($section['option'] ); ?>[<?php echo esc_attr( $setting['id'] ); ?>]'>
                <?php foreach ( $setting['choices'] as $value => $label ) : ?>
                    <option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, $settings[$setting['id']] ); ?>><?php echo esc_html( $label ); ?></option>
                <?php endforeach; ?>
            </select>
            <?php
            if ( ! empty( $setting['descr'] ) ) {
                ?><p class="description"><?php echo esc_html( $setting['descr'] ); ?></p><?php
            }

        }

        /**
         * Display checkbox field
         *
         * @since 1.0.0
         */
        function display_field_checkbox( $setting, $section ) {

            $settings = $this->get_option( $section['option'] );
            ?>
            <input type='checkbox' name='<?php echo esc_attr( $section['option'] ); ?>[<?php echo esc_attr( $setting['id'] ); ?>]' <?php checked( $settings[$setting['id']], 'yes' ); ?> value='yes'>
            <?php
            if ( ! empty( $setting['descr'] ) ) {
                ?><p class="description"><?php echo esc_html( $setting['descr'] ); ?></p><?php
            }

        }

        /**
         * Display radio field
         *
         * @since 1.0.0
         */
        function display_field_radio( $setting, $section ) {

            $settings = $this->get_option( $section['option'] );
            ?>
            <?php foreach ( $setting['choices'] as $value => $label ) : ?>
                <p><input type='radio' name='<?php echo esc_attr( $section['option'] ); ?>[<?php echo esc_attr( $setting['id'] ); ?>]' <?php checked( $settings[$setting['id']], $value ); ?> value='<?php echo esc_attr( $value ); ?>'> <?php echo esc_html( $label ); ?></p>
            <?php endforeach; ?>
            <?php
            if ( ! empty( $setting['descr'] ) ) {
                ?><p class="description"><?php echo esc_html( $setting['descr'] ); ?></p><?php
            }

        }

        /**
         * Display number field
         *
         * @since 1.0.0
         */
        function display_field_number( $setting, $section ) {

            $settings = $this->get_option( $section['option'] );
            ?>
                <input type='number' name='<?php echo esc_attr( $section['option'] ); ?>[<?php echo esc_attr( $setting['id'] ); ?>]' value='<?php echo esc_attr( $settings[$setting['id']] ); ?>'>
            <?php
            if ( ! empty( $setting['descr'] ) ) {
                ?><p class="description"><?php echo esc_html( $setting['descr'] ); ?></p><?php
            }

        }

        /**
         * Sanitize input
         *
         * @since 1.0.0
         */
        function sanitize_input( $input ) {

            // storage for sanitized values
            $output = array();

            // loop through options
            foreach( $input as $key => $value ) {
                if ( isset( $input[$key] ) ) {
                    $output[$key] = sanitize_text_field( $input[ $key ] );
                }
            }

            // pass it back
            return $output;

        }

    }

} // end if class About_Author_Box_Settings_API exists
