<?php

namespace RankologyFno\CommandLine;

use WP_CLI_Command;
use WP_CLI;

class Settings extends WP_CLI_Command {

    /**
     * This command import the Rankology settings from a JSON file.
     *
     * ## OPTIONS
     *
     * [--from=<value>]
     * : From path for the file.
     *
     * ## EXAMPLES
     *
     *     wp rankology settings import --from=/home/user
     */
    public function import( $args, $assoc_args ) {
        if(is_null(rankology_get_service('ImportSettings'))){
            WP_CLI::line("Rankology is not up to date. Please update Rankology to the latest version.");
            return;
        }

        $from = isset($assoc_args['from']) ? $assoc_args['from'] : false;

        if(!$from) {
            $from = wp_upload_dir();
            if (! empty( $from['basedir'] )) {
                $from = $from['basedir'];
            } else {
                $from = RANKOLOGY_FNO_PLUGIN_DIR_PATH;
            }
        }

        $from = trailingslashit($from) . 'rankology-settings.json';

        if ( ! file_exists( $from ) ) {
            WP_CLI::error( sprintf( 'The file %s does not exist.', $from ) );
        }

        WP_CLI::line( 'Importing Rankology settings...' );

        $data = json_decode( file_get_contents( $from ), true );

        if ( ! is_array( $data ) ) {
            WP_CLI::error( sprintf( 'The file %s is not a valid JSON file.', $from ) );
        }

        rankology_get_service('ImportSettings')->handle($data);

        WP_CLI::success( 'Rankology settings imported.' );

    }

    /**
     * This command export the Rankology settings to a JSON file.
     *
     * ## OPTIONS
     *
     * [--destination=<value>]
     * : Destination path for the file.
     *
     * ## EXAMPLES
     *
     *     wp rankology settings export --destination=/home/user/
     */
    public function export( $args, $assoc_args ) {
        if(is_null(rankology_get_service('ExportSettings'))){
            WP_CLI::line("Rankology is not up to date. Please update Rankology to the latest version.");
            return;
        }

        $settings = rankology_get_service('ExportSettings')->handle();

        $destination = isset($assoc_args['destination']) ? $assoc_args['destination'] : false;

        if(!$destination) {
            $destination = wp_upload_dir();
            if (! empty( $destination['basedir'] )) {
                $destination = $destination['basedir'];
            } else {
                $destination = RANKOLOGY_FNO_PLUGIN_DIR_PATH;
            }
        }

        $destination = trailingslashit($destination) . 'rankology-settings.json';
        file_put_contents($destination, json_encode($settings));

        WP_CLI::line(sprintf('The file has been created: %s', $destination) );
    }
}
