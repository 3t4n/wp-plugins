<?php

/**
 * Class GeneralSettings
 * @package DaReactions\Pages
 *
 * Admin general settings page
 *
 * @since 1.0.0
 */
namespace DaReactions\Pages;

use DaReactions\Main;
use DaReactions\Options;
use DaReactions\Plugins\BuddyPress;
use DaReactions\Plugins\WpForo;
/**
 * Class GeneralSettings
 * @package DaReactions\Pages
 *
 * Admin general settings page
 *
 * @since 1.0.0
 */
class GeneralSettings extends SettingsPage {
    /**
     * @var Main $main
     * A reference to Main instance
     *
     * @since 2.0.3
     */
    private $main;

    /**
     * GeneralSettings constructor.
     *
     * @param string $options_group
     * @param $section
     * @param Main $main
     *
     * @since 1.0.0
     */
    public function __construct( $options_group, $section, $main ) {
        parent::__construct( $options_group, $section );
        $this->main = $main;
        $this->navigation = array();
        $this->navigation['general'] = array(
            'title'   => __( 'General', 'da-reactions' ),
            'visible' => true,
        );
        $this->navigation['user'] = array(
            'title'   => __( 'User', 'da-reactions' ),
            'visible' => true,
        );
        $this->navigation['performance'] = array(
            'title'   => __( 'Performance', 'da-reactions' ),
            'visible' => true,
        );
        $this->navigation['plugins'] = array(
            'title'   => __( 'Plugins', 'da-reactions' ),
            'visible' => true,
        );
        $this->navigation['preferences'] = array(
            'title'   => __( 'Preferences', 'da-reactions' ),
            'visible' => true,
        );
        if ( isset( $_GET['tab'] ) ) {
            $this->current_tab = filter_var( $_GET['tab'], FILTER_SANITIZE_FULL_SPECIAL_CHARS );
        }
        if ( !(array_key_exists( $this->current_tab, $this->navigation ) && $this->navigation[$this->current_tab]['visible'] === true) ) {
            $this->current_tab = 'general';
        }
    }

    /**
     * Getter for this instace options
     *
     * @return Options
     */
    public function getOptions() {
        return $this->options;
    }

    /**
     * Register all settings for this page
     *
     * @since 1.0.0
     */
    public function initSettings() {
        register_setting( $this->options_group, $this->options_group, array($this, 'sanitizeData') );
        $valid_tab = false;
        if ( $this->current_tab === 'general' ) {
            $this->registerGeneralSettings();
            $valid_tab = true;
        } else {
            if ( $this->current_tab === 'user' ) {
                $this->registerUserSettings();
                $valid_tab = true;
            } else {
                if ( $this->current_tab === 'plugins' ) {
                    $this->registerPluginsSettings();
                    $valid_tab = true;
                } else {
                    if ( $this->current_tab === 'performance' ) {
                        $this->registerPerformanceSettings();
                        $valid_tab = true;
                    } else {
                        if ( $this->current_tab === 'preferences' ) {
                            $this->registerPreferencesSettings();
                            $valid_tab = true;
                        }
                    }
                }
            }
        }
        if ( $this->current_tab === 'detail' && darea_fs()->is__premium_only() ) {
            $this->registerDetailSettings__premium_only();
            $valid_tab = true;
        }
        if ( !$valid_tab ) {
            /** @noinspection ForgottenDebugOutputInspection */
            wp_die( 'May I help you?' );
        }
    }

    /**
     * Register Buddypress Settings Section
     *
     * @since 3.1.1
     */
    public function registerPluginsSettings() {
        $count_plugins = 0;
        $title = _x( 'Third Party Plugins', 'Section title', 'da-reactions' );
        // BBPress
        if ( $this->main->isBBPressInstalled() ) {
            $section = 'bbpress_section';
            $count_plugins++;
            add_settings_section(
                $section,
                _x( 'BBPress Options', 'Settings section', 'da-reactions' ),
                $this->makeSectionRenderer( __( 'These are BBPress specific integration settings.', 'da-reactions' ) ),
                $this->options_page
            );
            add_settings_field(
                'da_r_bbp_forum',
                __( 'Forums', 'da-reactions' ),
                $this->makeCheckboxRenderer( 'bbp_forum_enabled', __( 'Add reactions to BBPress’ forums.', 'da-reactions' ) ),
                $this->options_page,
                $section
            );
            add_settings_field(
                'da_r_bbp_topic',
                __( 'Topics', 'da-reactions' ),
                $this->makeCheckboxRenderer( 'bbp_topic_enabled', __( 'Add reactions to BBPress’ topics.', 'da-reactions' ) ),
                $this->options_page,
                $section
            );
            add_settings_field(
                'da_r_bbp_reply',
                __( 'Replies', 'da-reactions' ),
                $this->makeCheckboxRenderer( 'bbp_reply_enabled', __( 'Add reactions to BBPress’ replies.', 'da-reactions' ) ),
                $this->options_page,
                $section
            );
        }
        // WpForum
        if ( $this->main->isWpForoInstalled() ) {
            $section = 'wpforo_section';
            $count_plugins++;
            $wf_manager = new WpForo();
            add_settings_section(
                $section,
                _x( 'WpForo Options', 'Settings section', 'da-reactions' ),
                $this->makeSectionRenderer( __( 'These are WpForo specific integration settings.', 'da-reactions' ) ),
                $this->options_page
            );
            add_settings_field(
                'da_r_wpforo_position',
                __( 'Display reactions in WpForo replies', 'da-reactions' ),
                array($wf_manager, 'renderPositionSelect'),
                $this->options_page,
                $section
            );
        }
        if ( $count_plugins === 0 ) {
            $section = 'plugins_section';
            add_settings_section(
                $section,
                $title,
                $this->makeSectionRenderer( __( 'No supported third party plugins found.', 'da-reactions' ) ),
                $this->options_page
            );
        }
    }

    /**
     * Register General Settings Section
     *
     * @since 3.1.1
     */
    public function registerGeneralSettings() {
        $section = 'general_section';
        $title = __( 'General settings', 'da-reactions' );
        $intro = __( 'These are general settings, you can select to enable or disable reactions for specific content types and views.', 'da-reactions' );
        add_settings_section(
            $section,
            $title,
            $this->makeSectionRenderer( $intro ),
            $this->options_page
        );
        add_settings_field(
            'da_r_post_type_selector',
            __( 'Add reactions to post types and comments', 'da-reactions' ),
            array($this, 'renderPostTypeSelector'),
            $this->options_page,
            $section
        );
        add_settings_field(
            'da_r_template_type_selector',
            __( 'Add reactions to single pages and/or archives too', 'da-reactions' ),
            array($this, 'renderPageTypeSelector'),
            $this->options_page,
            $section
        );
        add_settings_field(
            'da_r_chart_colors_selector',
            __( 'Use different colors for chart widgets?', 'da-reactions' ),
            array($this, 'renderChartColorSelector'),
            $this->options_page,
            $section
        );
    }

    /**
     * Register Performance Settings Section
     *
     * @since 3.1.1
     */
    public function registerPerformanceSettings() {
        $section = 'performance_section';
        $title = __( 'Performance settings', 'da-reactions' );
        $intro = __( 'Use those settings to solve performances issues', 'da-reactions' );
        add_settings_section(
            $section,
            $title,
            $this->makeSectionRenderer( $intro ),
            $this->options_page
        );
        add_settings_field(
            'da_r_use_cache',
            __( 'Use plugin own cache system to serve generated widgets from disk?', 'da-reactions' ),
            $this->makeCheckboxRenderer( 'enable_internal_cache', __( 'Enable internal plugin cache', 'da-reactions' ) ),
            $this->options_page,
            $section,
            array(
                'class' => 'enable_cache_selector',
            )
        );
        add_settings_field(
            'da_r_delete_cache',
            __( 'Use this button to delete all cache files.', 'da-reactions' ),
            array($this, 'renderRemoveCacheButton'),
            $this->options_page,
            $section
        );
    }

    /**
     * Register Plugin Settings Section
     *
     * @since 3.1.1
     */
    public function registerPreferencesSettings() {
        $section = 'plugin_section';
        $title = __( 'Plugin settings', 'da-reactions' );
        $intro = __( 'These are plugin settings, select a method to identify unlogged users and check the delete option if you want to get rid of all data on plugin deactivation . ', 'da-reactions' );
        add_settings_section(
            $section,
            $title,
            $this->makeSectionRenderer( $intro ),
            $this->options_page
        );
        add_settings_field(
            'da_r_identification_method',
            __( 'Which identification method should be used for unregistered users?', 'da-reactions' ),
            array($this, 'renderUserIdentificationMethod'),
            $this->options_page,
            $section
        );
        add_settings_field(
            'da_r_remove_data_on_disable',
            __( 'Remove all data', 'da-reactions' ),
            array($this, 'renderRemoveDataButton'),
            $this->options_page,
            $section
        );
    }

    /**
     * Register User Settings Section
     *
     * @since 3.1.1
     */
    public function registerUserSettings() {
        $section = 'user_section';
        $title = __( 'User settings', 'da-reactions' );
        $intro = __( 'Users’ related settings.', 'da-reactions' );
        add_settings_section(
            $section,
            $title,
            $this->makeSectionRenderer( $intro ),
            $this->options_page
        );
        add_settings_field(
            'da_r_user_can_change',
            __( 'Can users change their reactions?', 'da-reactions' ),
            $this->makeCheckboxRenderer( 'user_can_change_reaction', __( 'User can change reaction.', 'da-reactions' ) ),
            $this->options_page,
            $section
        );
        add_settings_field(
            'da_r_user_can_remove',
            __( 'Can users remove their reactions?', 'da-reactions' ),
            $this->makeCheckboxRenderer( 'user_can_remove_reaction', __( 'User can remove own reaction.', 'da-reactions' ) ),
            $this->options_page,
            $section
        );
    }

    /**
     * Render function for color type selector
     *
     * @since 1.3.2
     */
    public function renderChartColorSelector() {
        $field_name = $this->options->getFieldName( "chart_colors" );
        $saved_value = $this->options->getOption( "chart_colors" );
        ?>
        <p>
	        <?php 
        esc_html_e( 'Sometimes the icon colors are too similar to be used for graphics as well, so you can change the colors here.', 'da-reactions' );
        ?>
        </p>
        <p>
            <label for="id_<?php 
        echo esc_attr( $field_name );
        ?>"><?php 
        esc_html_e( 'Chart color scheme: ', 'da-reactions' );
        ?></label>
            <select id="id_<?php 
        echo esc_attr( $field_name );
        ?>"
                    name="<?php 
        echo esc_attr( $field_name );
        ?>">
                <option value="icons" <?php 
        echo ( empty( $saved_value ) || $saved_value === 'icons' ? 'selected = "selected"' : '' );
        ?>>
			        <?php 
        esc_html_e( 'Use buttons’ colors', 'da-reactions' );
        ?></option>
                <option value="random" <?php 
        echo ( $saved_value === 'random' ? 'selected = "selected"' : '' );
        ?>>
			        <?php 
        esc_html_e( 'Use random generated colors', 'da-reactions' );
        ?></option>
                <option value="default" <?php 
        echo ( $saved_value === 'default' ? 'selected = "selected"' : '' );
        ?>>
			        <?php 
        esc_html_e( 'Use default rainbow palette', 'da-reactions' );
        ?></option>
            </select>
        </p>
        <?php 
    }

    /**
     * Render function for page type checkgroup
     *
     * @since   1.0.0
     */
    public function renderPageTypeSelector() {
        $registered_page_types = json_decode( '{
            "single": {
                "name": "single",
                "label": "' . __( 'Single pages and posts', 'da-reactions' ) . '"
            },
            "archive": {
                "name": "archive",
                "label": "' . __( 'Archives', 'da-reactions' ) . '"
            },
            "blog": {
                "name": "blog",
                "label": "' . __( 'Blog page', 'da-reactions' ) . '"
            }
        }', false );
        foreach ( $registered_page_types as $page_type ) {
            $field_name = $this->options->getFieldName( "page_type_{$page_type->name}" );
            $saved_value = $this->options->getOption( "page_type_{$page_type->name}" );
            $checked = isset( $saved_value ) && $saved_value === 'on';
            ?>
            <p>
                <input type="hidden" name="<?php 
            echo esc_attr( $field_name );
            ?>" value="off"/>
                <input id="id_<?php 
            echo esc_attr( $field_name );
            ?>" type="checkbox"
                       name="<?php 
            echo esc_attr( $field_name );
            ?>" <?php 
            checked( $checked, 1 );
            ?>
                       value="on"/>
                <label for="id_<?php 
            echo esc_attr( $field_name );
            ?>"><?php 
            echo wp_kses( $page_type->label, 'da-r-text' );
            ?></label>
            </p>
            <?php 
        }
    }

    /**
     * Render function for post type checkgroup
     *
     * @since   1.0.0
     */
    public function renderPostTypeSelector() {
        $post_type_query = array(
            'public' => true,
        );
        if ( darea_fs()->is_free_plan() ) {
            $post_type_query['_builtin'] = true;
        }
        $registered_post_types = get_post_types( $post_type_query, 'objects' );
        foreach ( $registered_post_types as $post_type ) {
            $field_name = $this->options->getFieldName( "post_type_{$post_type->name}" );
            $saved_value = $this->options->getOption( "post_type_{$post_type->name}" );
            $checked = isset( $saved_value ) && $saved_value === 'on';
            ?>
            <p>
                <input type="hidden" name="<?php 
            echo esc_attr( $field_name );
            ?>" value="off"/>
                <input id="id_<?php 
            echo esc_attr( $field_name );
            ?>" type="checkbox"
                       name="<?php 
            echo esc_attr( $field_name );
            ?>" <?php 
            checked( $checked, 1 );
            ?>
                       value="on"/>
                <label for="id_<?php 
            echo esc_attr( $field_name );
            ?>"><?php 
            echo wp_kses( $post_type->label, 'da-r-text' );
            ?></label>
                <?php 
            if ( post_type_supports( $post_type->name, 'comments' ) ) {
                $post_type_name = $post_type->name;
                $field_name = $this->options->getFieldName( "post_type_{$post_type_name}_comments" );
                $saved_value = $this->options->getOption( "post_type_{$post_type_name}_comments" );
                $checked = isset( $saved_value ) && $saved_value === 'on';
                ?>
                    <input type="hidden" name="<?php 
                echo esc_attr( $field_name );
                ?>" value="off"/>
                    <input id="id_<?php 
                echo esc_attr( $field_name );
                ?>" type="checkbox"
                           name="<?php 
                echo esc_attr( $field_name );
                ?>" <?php 
                checked( $checked, 1 );
                ?>
                           value="on"/>
                    <label for="id_<?php 
                echo esc_attr( $field_name );
                ?>"><?php 
                esc_html_e( ' and their comments.', 'da-reactions' );
                ?></label>
                    <?php 
            }
            ?>
            </p>
            <?php 
        }
    }

    /**
     * Render function for remove data on plugin disable checkbox
     *
     * @since   1.0.0
     */
    public function renderRemoveCacheButton() {
        if ( !is_multisite() || is_main_site() ) {
            ?>
            <p>
                <a href="javascript:;" id="delete-all-cache"
                   class="button button-link-delete"><?php 
            esc_html_e( 'Delete', 'da-reactions' );
            ?></a>
	            <?php 
            esc_html_e( 'Delete all cache files.', 'da-reactions' );
            ?>
            </p>
            <?php 
        }
    }

    /**
     * Render function for remove data on plugin disable checkbox
     *
     * @since   1.0.0
     */
    public function renderRemoveDataButton() {
        if ( !is_multisite() || is_main_site() ) {
            ?>
            <p>
                <a href="javascript:;" id="delete-all-data"
                   class="button button-link-delete"><?php 
            esc_html_e( 'Delete', 'da-reactions' );
            ?></a>
	            <?php 
            esc_html_e( 'Delete all data. Warning! Lost data cannot be recovered. ', 'da-reactions' );
            ?>
            </p>
            <?php 
        }
    }

    /**
     * Render function for user identifying method checkgroup
     *
     * @since 1.0.0
     */
    public function renderUserIdentificationMethod() {
        $id_methods = array(
            'cookie' => array(
                'name' => __( 'Set cookie', 'da-reactions' ),
            ),
            'ip'     => array(
                'name' => __( 'Save IP address', 'da-reactions' ),
            ),
        );
        foreach ( $id_methods as $method_slug => $method_info ) {
            $field_name = $this->options->getFieldName( "id_method_{$method_slug}" );
            $saved_value = $this->options->getOption( "id_method_{$method_slug}" );
            $checked = isset( $saved_value ) && $saved_value === 'on';
            ?>
            <p>
                <input type="hidden" name="<?php 
            echo esc_attr( $field_name );
            ?>" value="off"/>
                <input id="id_<?php 
            echo esc_attr( $field_name );
            ?>" type="checkbox"
                       name="<?php 
            echo esc_attr( $field_name );
            ?>" <?php 
            checked( $checked, 1 );
            ?>
                   value="on"/>
                <label for="id_<?php 
            echo esc_attr( $field_name );
            ?>"><?php 
            echo wp_kses( $method_info['name'], 'da-r-text' );
            ?></label>
        </p>
        <?php 
        }
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
