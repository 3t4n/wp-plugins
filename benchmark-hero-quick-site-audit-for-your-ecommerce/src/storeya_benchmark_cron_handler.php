<?php

class StoreYa_Benchmark_Cron_Handler {
  public static function init() {
    add_action( 'send_repeated_report_request', array( get_called_class(), 'send_report_request' ) );
  }

  public static function schedule_next_api_call() {
    wp_clear_scheduled_hook( 'send_repeated_report_request' );
    wp_schedule_single_event( time() + 10, 'send_repeated_report_request' );
  }

  public static function clear_scheduled_api_call() {
    wp_clear_scheduled_hook( 'send_repeated_report_request' );
  }

  public static function send_report_request() {
    $api_handler = new StoreYa_Benchmark_API_Handler();
    $api_handler->send_report_request();
  }
}