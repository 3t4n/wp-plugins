<?php

namespace RankologyFno\Actions;


use Rankology\Core\Hooks\ExecuteHooks;
use WP_CLI;

class Commands implements ExecuteHooks {
    public function hooks() {
        add_action('cli_init', [$this, 'init']);
    }

    public function init(){
        if ( defined( 'WP_CLI' ) && WP_CLI ) {
            WP_CLI::add_command( 'rankology settings', '\RankologyFno\CommandLine\Settings' );
        }
    }

}
