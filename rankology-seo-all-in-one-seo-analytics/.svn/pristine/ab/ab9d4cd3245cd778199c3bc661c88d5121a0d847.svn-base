<?php

namespace RankologyFno\Actions\Ajax;

defined('ABSPATH') or exit('Cheatin&#8217; uh?');

use Rankology\Core\Hooks\ExecuteHooks;

class BotSearchConsole implements ExecuteHooks
{
    /**
     *
     * @return void
     */
    public function hooks()
    {
        add_action('wp_ajax_rankology_request_data_search_console', [$this, 'handleSearchConsole']);
        add_action('wp_ajax_rankology_request_save_search_console', [$this, 'handle']);
    }

    public function handleSearchConsole(){
        check_ajax_referer('rankology_nonce_search_console');

        if(!is_admin()){
            return;
        }

        if(!current_user_can(rankology_capability('manage_options', 'bot'))){
            return;
        }

        //Get Google API Key
        $options = get_option('rankology_instant_indexing_option_name');
        $google_api_key = isset($options['rankology_instant_indexing_google_api_key']) ? $options['rankology_instant_indexing_google_api_key'] : '';

        if (empty($google_api_key)) {
            wp_send_json_error("missing_parameters");
        }

        $service = rankology_fno_get_service('SearchConsole');
        $rows = $service->handle();

        wp_send_json_success($rows);

    }

    /**
     * @return void
     */
    public function handle()
    {

        check_ajax_referer('rankology_nonce_search_console');

        if(!is_admin()){
            wp_send_json_error("not_authorized");
        }

        if(!current_user_can(rankology_capability('manage_options', 'bot'))){
            wp_send_json_error("not_authorized");
        }


        if(!isset($_POST['rows'])){
            wp_send_json_error("missing_parameters");
        }

        $rows = $_POST['rows'];

        $service = rankology_fno_get_service('SearchConsole');

        $countSaveMatches = 0;
        foreach($rows as $row){
            $result = $service->saveDataFromRowResult($row);
            if($result && isset($result['post_id'])){
                $countSaveMatches++;
            }
        }

        wp_send_json_success([
            'total_matches' =>  $countSaveMatches,
        ]);
    }
}
