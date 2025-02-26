<?php
defined('ABSPATH') or die('Please don&rsquo;t call the plugin directly. Thanks :)');

///////////////////////////////////////////////////////////////////////////////////////////////////
//Robots.txt
///////////////////////////////////////////////////////////////////////////////////////////////////
//Options Robots.txt
if (rankology_fno_get_service('OptionPro')->getRobotsTxtEnable() === '1') {
    function rankology_filter_robots_txt($output, $public) {
        $rankology_robots = rankology_fno_get_service('OptionPro')->getRobotsTxtFile();
        $rankology_robots = apply_filters('rankology_robots_txt_file', $rankology_robots);
        return $rankology_robots;
    };
    add_filter('robots_txt', 'rankology_filter_robots_txt', 10, 2);
}
