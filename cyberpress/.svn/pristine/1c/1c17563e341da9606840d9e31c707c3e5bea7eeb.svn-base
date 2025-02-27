<?php
/**
 * Template Loader
 *
 * @package cyberpress
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Template Loader
 *
 * @class       CyberPress_Template_Loader
 * @package     cyberpress
 */
class CyberPress_Template_Loader {
    /**
     * Store whether we're processing a pages inside the_content filter.
     *
     * @var boolean
     */
    private static $in_content_filter = false;

    /**
     * Store cyberpress page name.
     *
     * @var boolean|string
     */
    private static $is_cyberpress_page = false;

    /**
     * Hook in methods.
     */
    public static function init() {
        $theme_support = current_theme_supports( 'cyberpress' );

        if ( $theme_support ) {
            add_filter( 'template_include', array( __CLASS__, 'template_loader' ) );
        } else {
            add_action( 'template_redirect', array( __CLASS__, 'unsupported_theme_init' ) );
        }
    }

    /**
     * Load a template.
     *
     * Handles template usage so that we can use our own templates instead of the themes.
     *
     * Templates are in the 'templates' folder. cyberpress looks for theme.
     * overrides in /theme/cyberpress/ by default.
     *
     * @param mixed $template - current template.
     * @return string
     */
    public static function template_loader( $template ) {
        if ( is_embed() ) {
            return $template;
        }
        $default_file = self::get_template_loader_default_file();

        if ( $default_file ) {
            /**
             * Filter hook to choose which files to find before CyberPress does it's own logic.
             *
             * @var array
             */
            $search_files = self::get_template_loader_files( $default_file );
            $template     = locate_template( $search_files );

            if ( ! $template ) {
                $template = cyberpress()->plugin_path . '/templates/' . $default_file;
            }
        }

        return $template;
    }

    /**
     * Get the default filename for a template.
     *
     * @return string
     */
    private static function get_template_loader_default_file() {
        $page_list_option_names = CyberPress_Settings::$page_list_option_names;
        $default_file           = '';

        foreach ( $page_list_option_names as $page_option_name ) {
            $archive_id = CyberPress_Settings::get_option( $page_option_name . '_list_page_id', 'cyberpress_general' );
            switch ( $page_option_name ) {
                case 'games':
                    if ( is_singular( 'game' ) ) {
                        $default_file = $page_option_name . '/single-page.php';
                    } elseif ( is_post_type_archive( 'game' ) || is_page( $archive_id ) ) {
                        $default_file = $page_option_name . '/archive.php';
                    }
                    break;
                case 'players':
                    if ( is_singular( 'player' ) ) {
                        $default_file = $page_option_name . '/single-page.php';
                    } elseif ( is_post_type_archive( 'player' ) || is_page( $archive_id ) ) {
                        $default_file = $page_option_name . '/archive.php';
                    }
                    break;
                case 'teams':
                    if ( is_singular( 'team' ) ) {
                        $default_file = $page_option_name . '/single-page.php';
                    } elseif ( is_post_type_archive( 'team' ) || is_page( $archive_id ) ) {
                        $default_file = $page_option_name . '/archive.php';
                    }
                    break;
                case 'matches':
                    if ( is_singular( 'match' ) ) {
                        $default_file = $page_option_name . '/single-page.php';
                    } elseif ( is_post_type_archive( 'match' ) || is_page( $archive_id ) ) {
                        $default_file = $page_option_name . '/archive.php';
                    }
                    break;
                case 'tournaments':
                    if ( is_singular( 'tournament' ) ) {
                        $default_file = $page_option_name . '/single-page.php';
                    } elseif ( is_post_type_archive( 'tournament' ) || is_page( $archive_id ) ) {
                        $default_file = $page_option_name . '/archive.php';
                    }
                    break;
            }
        }

        return $default_file;
    }

    /**
     * Get an array of filenames to search for a given template.
     *
     * @param  string $default_file The default file name.
     * @return string[]
     */
    private static function get_template_loader_files( $default_file ) {
        $search_files = apply_filters( 'cyberpress_template_loader_files', array(), $default_file );

        if ( is_page_template() ) {
            $search_files[] = get_page_template_slug();
        }

        $search_files[] = '/cyberpress/' . $default_file;
        return array_unique( $search_files );
    }

    /**
     * Unsupported theme compatibility methods.
     */

    /**
     * Hook in methods to enhance the unsupported theme experience on pages.
     */
    public static function unsupported_theme_init() {
        $page_list_option_names   = CyberPress_Settings::$page_list_option_names;
        self::$is_cyberpress_page = '';

        foreach ( $page_list_option_names as $page_option_name ) {
            $archive_id = CyberPress_Settings::get_option( $page_option_name . '_list_page_id', 'cyberpress_general' );
            if ( ! empty( $archive_id ) ) {
                switch ( $page_option_name ) {
                    case 'games':
                        if ( is_singular( 'game' ) ) {
                            self::$is_cyberpress_page = 'game';
                        } elseif ( is_post_type_archive( 'game' ) || is_page( $archive_id ) ) {
                            self::$is_cyberpress_page = 'games_archive';
                        }
                        break;
                    case 'players':
                        if ( is_singular( 'player' ) ) {
                            self::$is_cyberpress_page = 'player';
                        } elseif ( is_post_type_archive( 'player' ) || is_page( $archive_id ) ) {
                            self::$is_cyberpress_page = 'players_archive';
                        }
                        break;
                    case 'teams':
                        if ( is_singular( 'team' ) ) {
                            self::$is_cyberpress_page = 'team';
                        } elseif ( is_post_type_archive( 'team' ) || is_page( $archive_id ) ) {
                            self::$is_cyberpress_page = 'teams_archive';
                        }
                        break;
                    case 'matches':
                        if ( is_singular( 'match' ) ) {
                            self::$is_cyberpress_page = 'match';
                        } elseif ( is_post_type_archive( 'match' ) || is_page( $archive_id ) ) {
                            self::$is_cyberpress_page = 'matches_archive';
                        }
                        break;
                    case 'tournaments':
                        if ( is_singular( 'tournament' ) ) {
                            self::$is_cyberpress_page = 'tournament';
                        } elseif ( is_post_type_archive( 'tournament' ) || is_page( $archive_id ) ) {
                            self::$is_cyberpress_page = 'tournaments_archive';
                        }
                        break;
                }
            }
        }

        if ( '' !== self::$is_cyberpress_page ) {
            add_filter( 'the_content', array( __CLASS__, 'unsupported_theme_' . self::$is_cyberpress_page . '_content_filter' ), 10 );
            add_filter( 'post_thumbnail_html', array( __CLASS__, 'unsupported_theme_single_featured_image_filter' ) );
        }
    }

    /**
     * Prevent the main featured image on single pages because there will be another featured image in templates.
     *
     * @param string $html Img element HTML.
     * @return string
     */
    public static function unsupported_theme_single_featured_image_filter( $html ) {
        if ( self::$in_content_filter || ! self::$is_cyberpress_page || ! is_main_query() ) {
            return $html;
        }

        // Games templates doesn't contain any image yer, so we need to use default one.
        if ( 'game' === self::$is_cyberpress_page ) {
            return $html;
        }

        return '';
    }

    /**
     * Filter the content and insert CyberPress content on the games page.
     *
     * For non-CP themes, this will setup the main games page to be block games render to improve default appearance.
     *
     * @param string $content - current page content.
     * @return string - redefined content.
     */
    public static function unsupported_theme_games_archive_content_filter( $content ) {
        if ( ! is_main_query() || ! in_the_loop() ) {
            return $content;
        }

        self::$in_content_filter = true;

        remove_filter( 'the_content', array( __CLASS__, 'unsupported_theme_games_archive_content_filter' ) );

        // used block render.
        $games = new CyberPress_Games_List_Block();

        $attributes = CyberPress_Settings::get_group_options( 'games' );

        $games_output = $games->block_render( $attributes );

        $content = $content . $games_output;

        self::$in_content_filter = false;

        return $content;
    }

    /**
     * Filter the content and insert CyberPress content on the matches page.
     *
     * For non-CP themes, this will setup the main matches page to be block matches render to improve default appearance.
     *
     * @param string $content - current page content.
     * @return string - redefined content.
     */
    public static function unsupported_theme_matches_archive_content_filter( $content ) {
        if ( ! is_main_query() || ! in_the_loop() ) {
            return $content;
        }

        self::$in_content_filter = true;

        remove_filter( 'the_content', array( __CLASS__, 'unsupported_theme_matches_archive_content_filter' ) );

        // used block render.
        $matches = new CyberPress_Matches_List_Block();

        $attributes = CyberPress_Settings::get_group_options( 'matches' );

        $matches_output = $matches->block_render( $attributes );

        $content = $content . $matches_output;

        self::$in_content_filter = false;

        return $content;
    }

    /**
     * Filter the content and insert CyberPress content on the players page.
     *
     * For non-CP themes, this will setup the main players page to be block players render to improve default appearance.
     *
     * @param string $content - current page content.
     * @return string - redefined content.
     */
    public static function unsupported_theme_players_archive_content_filter( $content ) {
        if ( ! is_main_query() || ! in_the_loop() ) {
            return $content;
        }

        self::$in_content_filter = true;

        remove_filter( 'the_content', array( __CLASS__, 'unsupported_theme_players_archive_content_filter' ) );

        // used block render.
        $players = new CyberPress_Players_List_Block();

        $attributes = CyberPress_Settings::get_group_options( 'players' );

        $players_output = $players->block_render( $attributes );

        $content = $content . $players_output;

        self::$in_content_filter = false;

        return $content;
    }

    /**
     * Filter the content and insert CyberPress content on the teams page.
     *
     * For non-CP themes, this will setup the main teams page to be block teams render to improve default appearance.
     *
     * @param string $content - current page content.
     * @return string - redefined content.
     */
    public static function unsupported_theme_teams_archive_content_filter( $content ) {
        if ( ! is_main_query() || ! in_the_loop() ) {
            return $content;
        }

        self::$in_content_filter = true;

        remove_filter( 'the_content', array( __CLASS__, 'unsupported_theme_teams_archive_content_filter' ) );

        // used block render.
        $teams = new CyberPress_Teams_List_Block();

        $attributes = CyberPress_Settings::get_group_options( 'teams' );

        $teams_output = $teams->block_render( $attributes );

        $content = $content . $teams_output;

        self::$in_content_filter = false;

        return $content;
    }

    /**
     * Filter the content and insert CyberPress content on the tournaments page.
     *
     * For non-CP themes, this will setup the main tournaments page to be block tournaments render to improve default appearance.
     *
     * @param string $content - current page content.
     * @return string - redefined content.
     */
    public static function unsupported_theme_tournaments_archive_content_filter( $content ) {
        if ( ! is_main_query() || ! in_the_loop() ) {
            return $content;
        }

        self::$in_content_filter = true;

        remove_filter( 'the_content', array( __CLASS__, 'unsupported_theme_tournaments_archive_content_filter' ) );

        // used block render.
        $tournaments = new CyberPress_Tournaments_List_Block();

        $attributes = CyberPress_Settings::get_group_options( 'tournaments' );

        $tournaments_output = $tournaments->block_render( $attributes );

        $content = $content . $tournaments_output;

        self::$in_content_filter = false;

        return $content;
    }

    /**
     * Filter the content and insert CyberPress content on the game page.
     *
     * For non-CP themes, this will setup the game page to be based actions to improve default appearance.
     *
     * @param string $content Existing post content.
     * @return string
     */
    public static function unsupported_theme_game_content_filter( $content ) {
        if ( ! is_main_query() || ! in_the_loop() ) {
            return $content;
        }

        self::$in_content_filter = true;

        remove_filter( 'the_content', array( __CLASS__, 'unsupported_theme_game_content_filter' ) );

        ob_start();

        do_action( 'cyberpress_single_game_content' );

        $game_output = ob_get_contents();

        ob_end_clean();

        $content = $game_output;

        self::$in_content_filter = false;

        return $content;
    }

    /**
     * Filter the content and insert CyberPress content on the match page.
     *
     * For non-CP themes, this will setup the match page to be based actions to improve default appearance.
     *
     * @param string $content Existing post content.
     * @return string
     */
    public static function unsupported_theme_match_content_filter( $content ) {
        if ( ! is_main_query() || ! in_the_loop() ) {
            return $content;
        }

        self::$in_content_filter = true;

        remove_filter( 'the_content', array( __CLASS__, 'unsupported_theme_match_content_filter' ) );

        ob_start();

        do_action( 'cyberpress_single_match_participants' );

        do_action( 'cyberpress_single_match_content' );

        do_action( 'cyberpress_single_match_videos' );

        do_action( 'cyberpress_single_match_screenshots' );

        $game_output = ob_get_contents();

        ob_end_clean();

        $content = $game_output;

        self::$in_content_filter = false;

        return $content;
    }

    /**
     * Filter the content and insert CyberPress content on the player page.
     *
     * For non-CP themes, this will setup the player page to be based actions to improve default appearance.
     *
     * @param string $content Existing post content.
     * @return string
     */
    public static function unsupported_theme_player_content_filter( $content ) {
        if ( ! is_main_query() || ! in_the_loop() ) {
            return $content;
        }

        self::$in_content_filter = true;

        remove_filter( 'the_content', array( __CLASS__, 'unsupported_theme_player_content_filter' ) );

        ob_start();

        echo '<div class="cyberpress-player">';

            do_action( 'cyberpress_single_player_thumbnail' );

            do_action( 'cyberpress_single_player_info' );

        echo '</div>';

        do_action( 'cyberpress_single_player_content' );

        do_action( 'cyberpress_single_player_games_stats' );

        do_action( 'cyberpress_single_player_teams' );

        do_action( 'cyberpress_single_player_twitch' );

        do_action( 'cyberpress_single_player_social' );

        $player_output = ob_get_contents();

        ob_end_clean();

        $content = $player_output;

        self::$in_content_filter = false;

        return $content;
    }

    /**
     * Filter the content and insert CyberPress content on the team page.
     *
     * For non-CP themes, this will setup the team page to be based actions to improve default appearance.
     *
     * @param string $content Existing post content.
     * @return string
     */
    public static function unsupported_theme_team_content_filter( $content ) {
        if ( ! is_main_query() || ! in_the_loop() ) {
            return $content;
        }

        self::$in_content_filter = true;

        remove_filter( 'the_content', array( __CLASS__, 'unsupported_theme_team_content_filter' ) );

        ob_start();

        echo '<div class="cyberpress-team">';

        do_action( 'cyberpress_single_team_thumbnail' );

        do_action( 'cyberpress_single_team_info' );

        echo '</div>';

        do_action( 'cyberpress_single_team_content' );

        do_action( 'cyberpress_single_team_players' );

        do_action( 'cyberpress_single_team_twitch' );

        do_action( 'cyberpress_single_team_social' );

        $team_output = ob_get_contents();

        ob_end_clean();

        $content = $team_output;

        self::$in_content_filter = false;

        return $content;
    }

    /**
     * Filter the content and insert CyberPress content on the tournament page.
     *
     * For non-CP themes, this will setup the tournament page to be based actions to improve default appearance.
     *
     * @param string $content Existing post content.
     * @return string
     */
    public static function unsupported_theme_tournament_content_filter( $content ) {
        if ( ! is_main_query() || ! in_the_loop() ) {
            return $content;
        }

        self::$in_content_filter = true;

        remove_filter( 'the_content', array( __CLASS__, 'unsupported_theme_tournament_content_filter' ) );

        ob_start();

        do_action( 'cyberpress_single_tournament_info' );

        do_action( 'cyberpress_single_tournament_content' );

        do_action( 'cyberpress_single_tournament_matches' );

        do_action( 'cyberpress_single_tournament_videos' );

        do_action( 'cyberpress_single_tournament_screenshots' );

        $tournament_output = ob_get_contents();

        ob_end_clean();

        $content = $tournament_output;

        self::$in_content_filter = true;

        return $content;
    }
}
