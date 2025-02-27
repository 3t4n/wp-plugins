<?php
/**
 * Activator class for plugin
 *
 * @package DaReactions
 *
 * @since 1.0.0
 */
namespace DaReactions;
/**
 * Class Activator
 * @package DaReactions
 *
 * Manage activation tasks such as initialize database and save default values
 *
 * @since 1.0.0
 */
class Activator
{
    public static $current_database_version = 2.0;
    /**
     * Invokes functions to create and populate table on plugin activation or update database if needed.
     *
     * @throws JsonException
     * @since    1.0.0
     */
    public static function activate()
    {
        $installed_database_version = (float) get_option('da_reactions_db_version', 0);
        /// Install database version 1.0
        if ($installed_database_version < 1) {
            /// First installation ever
            self::createInitialTables();
            self::populateInitialData();
            self::setInitialOptions();
            self::createInitialFiles();
        }
        /// Upgrade database from version 1.0 to version 2.0
        if ($installed_database_version < 2) {
            self::updateFromVersionOne();
        }
        update_option('da_reactions_db_version', self::$current_database_version);
    }
    /**
     * Creates default image files
     * Invoked by self::activate()
     *
     * @since 1.0.0
     */
    public static function createInitialFiles()
    {
        $source_path_with_end_slash = DA_REACTIONS_PATH . 'assets/icons/svg/_default/';
        $files = FileSystem::getFiles(
            $source_path_with_end_slash,
            array('svg', 'jpg', 'png', 'gif')
        );
        if (is_multisite()) {
            $sites = get_sites();
            foreach ($sites as $site) {
                switch_to_blog($site->blog_id);
                /** @noinspection DisconnectedForeachInstructionInspection */
                FileSystem::copyImagesToUploadDir($files, $source_path_with_end_slash);
                restore_current_blog();
            }
        } else {
            FileSystem::copyImagesToUploadDir($files, $source_path_with_end_slash);
        }
    }
    /**
     * Creates tables
     * Invoked by self::activate()
     *
     * @since 1.0.0
     */
    public static function createInitialTables()
    {
        Data::createReactionsTable();
        Data::createVotesTable();
    }
    /**
     * Populates tables
     * Invoked by self::activate()
     *
     * @since 1.0.0
     */
    public static function populateInitialData()
    {
        Data::createDefaultReactions();
    }
    /**
     * Saves initial options
     * Invoked by self::activate()
     *
     * @throws JsonException
     * @since 1.0.0
     */
    public static function setInitialOptions()
    {
        $sites = json_decode('[{"blog_id":null}]', false);
        if (is_multisite()) {
            $sites = get_sites();
        }
        foreach ($sites as $site) {
            $general_options = Options::getInstance('general', $site->blog_id);
            $general_options->saveOption("post_type_post", "on");
            $general_options->saveOption("post_type_post_comments", "on");
            $general_options->saveOption("page_type_single", "on");
            $general_options->saveOption("id_method_cookie", "on");
            $general_options->saveOption("user_can_change_reaction", "on");
            $general_options->saveOption("enable_internal_cache", "on");
        }
    }
    public static function updateFromVersionOne()
    {
        Data::upgradeVotesIdToBigInt();
        Data::addGroupColumnToReactions();
        Data::createGroupsTable();
        Data::createDefaultGroups();
    }
}
