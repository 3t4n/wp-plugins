<?php

namespace RANKOLOGY_STATS;

class ShortCode
{

    public function __construct()
    {

        //init ShortCode
        add_action('admin_init', array($this, 'shortcake'));

        // Add ShortCode
        add_shortcode('rankologystats', array($this, 'shortcodes'));
    }

    /**
     * Rankology Stats ShortCode is in the format of:
     * [rankologystats stat=xxx time=xxxx provider=xxxx format=xxxxxx id=xxx]
     *
     * Where:
     * stat = the statistic you want.
     * time = is the timeframe, strtotime() (http://php.net/manual/en/datetime.formats.php) will be used to calculate
     * it. provider = the search provider to get stats on. format = i18n, english, none. id = the page/post id to get
     * stats on.
     *
     * @param $atts
     * @return array|false|int|null|object|string|void
     */
    public function shortcodes($atts)
    {

        if (!is_array($atts)) {
            return;
        }
        if (!array_key_exists('stat', $atts)) {
            return;
        }

        if (!array_key_exists('time', $atts)) {
            $atts['time'] = null;
        }
        if (!array_key_exists('provider', $atts)) {
            $atts['provider'] = 'all';
        }
        if (!array_key_exists('format', $atts)) {
            $atts['format'] = null;
        }
        if (!array_key_exists('id', $atts)) {
            $atts['id'] = -1;
        }

        $formatnumber = array_key_exists('format', $atts);

        switch ($atts['stat']) {
            case 'usersonline':
                $result = rankology_stats_useronline();
                break;

            case 'visits':
                $result = rankology_stats_visit($atts['time']);
                break;

            case 'visitors':
                $result = rankology_stats_visitor($atts['time'], null, true);
                break;

            case 'pagevisits':
                $result = rankology_stats_pages($atts['time'], null, $atts['id']);
                break;

            case 'searches':
                $result = rankology_stats_searchengine($atts['provider'], $atts['time']);
                break;

            case 'referrer':
                $result = rankology_stats_referrer($atts['time']);
                break;

            case 'postcount':
                $result = Helper::getCountPosts();
                break;

            case 'pagecount':
                $result = Helper::getCountPages();
                break;

            case 'commentcount':
                $result = Helper::getCountComment();
                break;

            case 'spamcount':
                $result = Helper::getCountSpam();
                break;

            case 'usercount':
                $result = Helper::getCountUsers();
                break;

            case 'postaverage':
                $result = Helper::getAveragePost();
                break;

            case 'commentaverage':
                $result = Helper::getAverageComment();
                break;

            case 'useraverage':
                $result = Helper::getAverageRegisterUser();
                break;

            case 'lpd':
                $result       = Helper::getLastPostDate();
                $formatnumber = false;
                break;
        }

        if ($formatnumber) {
            switch (strtolower($atts['format'])) {
                case 'i18n':
                    $result = number_format_i18n($result);

                    break;
                case 'english':
                    $result = number_format($result);

                    break;
            }
        }

        return $result;
    }

    public function shortcake()
    {

        // ShortCake support if loaded.
        if (function_exists('shortcode_ui_register_for_shortcode')) {
            $se_list = SearchEngine::getList();

            $se_options = array('' => 'None');

            foreach ($se_list as $se) {
                $se_options[$se['tag']] = $se['translated'];
            }

            shortcode_ui_register_for_shortcode('rankologystats',
                array(

                    // Display label. String. Required.
                    'label'         => 'Rankology Stats',

                    // Icon/image for shortcode. Optional. src or dashicons-$icon. Defaults to carrot.
                    'listItemImage' => '<img src="' . RANKOLOGY_STATS_URL . 'assets/images/logo-250.png" width="128" height="128">',

                    // Available shortCode attributes and default values. Required. Array.
                    // Attribute model expects 'attr', 'type' and 'label'
                    // Supported field types: text, checkbox, textarea, radio, select, email, url, number, and date.
                    'attrs'         => array(
                        array(
                            'label'       => __('Statistic', 'rankology-stats'),
                            'attr'        => 'stat',
                            'type'        => 'select',
                            'description' => __('Select the statistic you wish to display.', 'rankology-stats'),
                            'value'       => 'usersonline',
                            'options'     => array(
                                'usersonline'    => __('Active Users', 'rankology-stats'),
                                'visits'         => __('Visits', 'rankology-stats'),
                                'visitors'       => __('Visitors', 'rankology-stats'),
                                'pagevisits'     => __('Page Visits', 'rankology-stats'),
                                'searches'       => __('Searches', 'rankology-stats'),
                                'postcount'      => __('Post Count', 'rankology-stats'),
                                'pagecount'      => __('Page Count', 'rankology-stats'),
                                'commentcount'   => __('Comment Count', 'rankology-stats'),
                                'spamcount'      => __('Spam Count', 'rankology-stats'),
                                'usercount'      => __('User Count', 'rankology-stats'),
                                'postaverage'    => __('Post Average', 'rankology-stats'),
                                'commentaverage' => __('Comment Average', 'rankology-stats'),
                                'useraverage'    => __('User Average', 'rankology-stats'),
                                'lpd'            => __('Last Post Date', 'rankology-stats'),
                                'referrer'       => __('Referrer', 'rankology-stats'),
                            ),
                        ),
                        array(
                            'label'       => __('Time Frame', 'rankology-stats'),
                            'attr'        => 'time',
                            'type'        => 'url',
                            'description' => __(
                                'The time frame to get the statistic for, strtotime() (http://php.net/manual/en/datetime.formats.php) will be used to calculate it. Use "total" to get all recorded dates.',
                                'rankology-stats'
                            ),
                            'meta'        => array('size' => '10'),
                        ),
                        array(
                            'label'       => __('Search Provider', 'rankology-stats'),
                            'attr'        => 'provider',
                            'type'        => 'select',
                            'description' => __('The search provider to get statistics on.', 'rankology-stats'),
                            'options'     => $se_options,
                        ),
                        array(
                            'label'       => __('Number Format', 'rankology-stats'),
                            'attr'        => 'format',
                            'type'        => 'select',
                            'description' => __(
                                'The format to display numbers in: i18n, english, none.',
                                'rankology-stats'
                            ),
                            'value'       => 'none',
                            'options'     => array(
                                'none'    => __('None', 'rankology-stats'),
                                'english' => __('English', 'rankology-stats'),
                                'i18n'    => __('International', 'rankology-stats'),
                            ),
                        ),
                        array(
                            'label'       => __('Post/Page ID', 'rankology-stats'),
                            'attr'        => 'id',
                            'type'        => 'number',
                            'description' => __('The post/page ID to get page statistics on.', 'rankology-stats'),
                            'meta'        => array('size' => '5'),
                        ),
                    ),
                )
            );
        }
    }
}

new ShortCode;
