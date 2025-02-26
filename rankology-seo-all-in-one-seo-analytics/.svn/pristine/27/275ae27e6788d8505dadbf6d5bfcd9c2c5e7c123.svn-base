<?php

/**
 * Rankology Stats Widget
 */
class RANKOLOGY_Stats_Widget extends \WP_Widget
{
    /**
     * Sets up the widgets name etc
     */
    public function __construct()
    {
        parent::__construct(
            'RANKOLOGY_Stats_Widget', // Base ID
            __('Statistics', 'rankology-stats'), // Name
            array('description' => __('Show site stats in sidebar.', 'rankology-stats')) // Args
        );
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance)
    {
        extract($args);
        $widget_options = RANKOLOGY_STATS\Option::get('widget');

        if (!is_array($widget_options)) {
            return;
        }

        echo $before_widget; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        echo $before_title . esc_attr($widget_options['name_widget']) . $after_title; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        echo '<ul>';

        if ($widget_options['useronline_widget']) {
            echo '<li>';
            echo '<label>' . __('Active Users', 'rankology-stats') . ':&nbsp;</label>';
            echo number_format_i18n(rankology_stats_useronline()); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo '</li>';
        }

        if ($widget_options['tvisit_widget']) {
            echo '<li>';
            echo '<label>' . __('Today\'s Visits', 'rankology-stats') . ':&nbsp;</label>';
            echo number_format_i18n(rankology_stats_visit('today')); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo '</li>';
        }

        if ($widget_options['tvisitor_widget']) {
            echo '<li>';
            echo '<label>' . __('Today\'s Visitors', 'rankology-stats') . ':&nbsp;</label>';
            echo number_format_i18n(rankology_stats_visitor('today', null, true)); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo '</li>';
        }

        if ($widget_options['yvisit_widget']) {
            echo '<li>';
            echo '<label>' . __('Yesterday\'s Visits', 'rankology-stats') . ':&nbsp;</label>';
            echo number_format_i18n(rankology_stats_visit('yesterday')); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo '</li>';
        }

        if ($widget_options['yvisitor_widget']) {
            echo '<li>';
            echo '<label>' . __('Yesterday\'s Visitors', 'rankology-stats') . ':&nbsp;</label>';
            echo number_format_i18n(rankology_stats_visitor('yesterday', null, true)); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo '</li>';
        }

        if ($widget_options['wvisit_widget']) {
            echo '<li>';
            echo '<label>' . __('Last 7 Days Visits', 'rankology-stats') . ':&nbsp;</label>';
            echo number_format_i18n(rankology_stats_visit('week')); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo '</li>';
        }

        if ($widget_options['mvisit_widget']) {
            echo '<li>';
            echo '<label>' . __('Last 30 Days Visits', 'rankology-stats') . ':&nbsp;</label>';
            echo number_format_i18n(rankology_stats_visit('month')); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo '</li>';
        }

        if ($widget_options['ysvisit_widget']) {
            echo '<li>';
            echo '<label>' . __('Last 365 Days Visits', 'rankology-stats') . ':&nbsp;</label>';
            echo number_format_i18n(rankology_stats_visit('year')); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo '</li>';
        }

        if ($widget_options['ttvisit_widget']) {
            echo '<li>';
            echo '<label>' . __('Total Visits', 'rankology-stats') . ':&nbsp;</label>';
            echo number_format_i18n(rankology_stats_visit('total')); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo '</li>';
        }

        if ($widget_options['ttvisitor_widget']) {
            echo '<li>';
            echo '<label>' . __('Total Visitors', 'rankology-stats') . ':&nbsp;</label>';
            echo number_format_i18n(rankology_stats_visitor('total', null, true)); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo '</li>';
        }

        if ($widget_options['tpviews_widget']) {
            echo '<li>';
            echo '<label>' . __('Total Page Views', 'rankology-stats') . ':&nbsp;</label>';
            echo number_format_i18n(rankology_stats_pages('total', null, get_queried_object_ID())); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo '</li>';
        }

        if ($widget_options['ser_widget']) {
            echo '<li>';
            echo '<label>' . __('Search Engine Referrals', 'rankology-stats') . ':&nbsp;</label>';
            echo number_format_i18n(rankology_stats_searchengine($widget_options['select_se'])); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo '</li>';
        }

        if ($widget_options['tp_widget']) {
            echo '<li>';
            echo '<label>' . __('Total Posts', 'rankology-stats') . ':&nbsp;</label>';
            echo number_format_i18n(RANKOLOGY_STATS\Helper::getCountPosts()); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo '</li>';
        }

        if ($widget_options['tpg_widget']) {
            echo '<li>';
            echo '<label>' . __('Total Pages', 'rankology-stats') . ':&nbsp;</label>';
            echo number_format_i18n(\RANKOLOGY_STATS\Helper::getCountPages()); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo '</li>';
        }

        if ($widget_options['tc_widget']) {
            echo '<li>';
            echo '<label>' . __('Total Comments', 'rankology-stats') . ':&nbsp;</label>';
            echo number_format_i18n(\RANKOLOGY_STATS\Helper::getCountComment()); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo '</li>';
        }

        if ($widget_options['ts_widget']) {
            echo '<li>';
            echo '<label>' . __('Total Spams', 'rankology-stats') . ':&nbsp;</label>';
            echo \RANKOLOGY_STATS\Helper::getCountSpam(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo '</li>';
        }

        if ($widget_options['tu_widget']) {
            echo '<li>';
            echo '<label>' . __('Total Users', 'rankology-stats') . ':&nbsp;</label>';
            echo number_format_i18n(\RANKOLOGY_STATS\Helper::getCountUsers()); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo '</li>';
        }

        if ($widget_options['ap_widget']) {
            echo '<li>';
            echo '<label>' . __('Post Average', 'rankology-stats') . ':&nbsp;</label>';
            echo number_format_i18n(\RANKOLOGY_STATS\Helper::getAveragePost()); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo '</li>';
        }

        if ($widget_options['ac_widget']) {
            echo '<li>';
            echo '<label>' . __('Comment Average', 'rankology-stats') . ':&nbsp;</label>';
            echo number_format_i18n(\RANKOLOGY_STATS\Helper::getAverageComment()); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo '</li>';
        }

        if ($widget_options['au_widget']) {
            echo '<li>';
            echo '<label>' . __('User Average', 'rankology-stats') . ':&nbsp;</label>';
            echo number_format_i18n(\RANKOLOGY_STATS\Helper::getAverageRegisterUser()); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo '</li>';
        }

        if ($widget_options['lpd_widget']) {
            echo '<li>';
            echo '<label>' . __('Last Post Date', 'rankology-stats') . ':&nbsp;</label>';
            echo \RANKOLOGY_STATS\Helper::getLastPostDate(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo '</li>';
        }

        echo '</ul>';
        echo $after_widget; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     *
     * @return array
     */
    public function update($new_instance, $old_instance)
    {
        if (array_key_exists('rankology_stats_control_widget_submit', $new_instance)) {
            $keys = array(
                'name_widget'       => 'name_widget',
                'useronline_widget' => 'useronline_widget',
                'tvisit_widget'     => 'tvisit_widget',
                'tvisitor_widget'   => 'tvisitor_widget',
                'yvisit_widget'     => 'yvisit_widget',
                'yvisitor_widget'   => 'yvisitor_widget',
                'wvisit_widget'     => 'wvisit_widget',
                'mvisit_widget'     => 'mvisit_widget',
                'ysvisit_widget'    => 'ysvisit_widget',
                'ttvisit_widget'    => 'ttvisit_widget',
                'ttvisitor_widget'  => 'ttvisitor_widget',
                'tpviews_widget'    => 'tpviews_widget',
                'ser_widget'        => 'ser_widget',
                'select_se'         => 'select_se',
                'tp_widget'         => 'tp_widget',
                'tpg_widget'        => 'tpg_widget',
                'tc_widget'         => 'tc_widget',
                'ts_widget'         => 'ts_widget',
                'tu_widget'         => 'tu_widget',
                'ap_widget'         => 'ap_widget',
                'ac_widget'         => 'ac_widget',
                'au_widget'         => 'au_widget',
                'lpd_widget'        => 'lpd_widget',
                'select_lps'        => 'select_lps',
            );

            foreach ($keys as $key => $post) {
                if (array_key_exists($post, $new_instance)) {
                    $widget_options[$key] = $new_instance[$post];
                } else {
                    $widget_options[$key] = '';
                }
            }

            RANKOLOGY_STATS\Option::update('widget', $widget_options);
        }

        return array();
    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     *
     * @return string|void
     */
    public function form($instance)
    {
        $widget_options = RANKOLOGY_STATS\Option::get('widget');

        ?>
        <p>
            <label for="name_widget"><?php esc_html_e('Name', 'rankology-stats'); ?>:
                <input id="name_widget" name="<?php echo $this->get_field_name('name_widget'); ?>" type="text" value="<?php if (isset($widget_options['name_widget'])) echo esc_attr($widget_options['name_widget']); ?>"/>
            </label>
        </p>

        <?php esc_html_e('Items', 'rankology-stats'); ?>:<br/>
        <ul>
            <li>
                <input type="checkbox" id="<?php echo esc_attr($this->get_field_id('useronline_widget')); ?>" name="<?php echo $this->get_field_name('useronline_widget'); ?>" <?php if (isset($widget_options['useronline_widget'])) checked('on', $widget_options['useronline_widget']); ?>/>
                <label for="<?php echo esc_attr($this->get_field_id('useronline_widget')); ?>"><?php esc_html_e('Active Users', 'rankology-stats'); ?></label>
            </li>
            <li>
                <input type="checkbox" id="<?php echo esc_attr($this->get_field_id('tvisit_widget')); ?>" name="<?php echo $this->get_field_name('tvisit_widget'); ?>" <?php if (isset($widget_options['tvisit_widget'])) checked('on', $widget_options['tvisit_widget']); ?>/>
                <label for="<?php echo esc_attr($this->get_field_id('tvisit_widget')); ?>"><?php esc_html_e('Today\'s Visits', 'rankology-stats'); ?></label>
            </li>
            <li>
                <input type="checkbox" id="<?php echo esc_attr($this->get_field_id('tvisitor_widget')); ?>" name="<?php echo $this->get_field_name('tvisitor_widget'); ?>" <?php if (isset($widget_options['tvisitor_widget'])) checked('on', $widget_options['tvisitor_widget']); ?>/>
                <label for="<?php echo esc_attr($this->get_field_id('tvisitor_widget')); ?>"><?php esc_html_e('Today\'s Visitors', 'rankology-stats'); ?></label>
            </li>
            <li>
                <input type="checkbox" id="<?php echo esc_attr($this->get_field_id('yvisit_widget')); ?>" name="<?php echo $this->get_field_name('yvisit_widget'); ?>" <?php if (isset($widget_options['yvisit_widget'])) checked('on', $widget_options['yvisit_widget']); ?>/>
                <label for="<?php echo esc_attr($this->get_field_id('yvisit_widget')); ?>"><?php esc_html_e('Yesterday\'s Visits', 'rankology-stats'); ?></label>
            </li>
            <li>
                <input type="checkbox" id="<?php echo esc_attr($this->get_field_id('yvisitor_widget')); ?>" name="<?php echo $this->get_field_name('yvisitor_widget'); ?>" <?php if (isset($widget_options['yvisitor_widget'])) checked('on', $widget_options['yvisitor_widget']); ?>/>
                <label for="<?php echo esc_attr($this->get_field_id('yvisitor_widget')); ?>"><?php esc_html_e('Yesterday\'s Visitors', 'rankology-stats'); ?></label>
            </li>
            <li>
                <input type="checkbox" id="<?php echo esc_attr($this->get_field_id('wvisit_widget')); ?>" name="<?php echo $this->get_field_name('wvisit_widget'); ?>" <?php if (isset($widget_options['wvisit_widget'])) checked('on', $widget_options['wvisit_widget']); ?>/>
                <label for="<?php echo esc_attr($this->get_field_id('wvisit_widget')); ?>"><?php esc_html_e('Last 7 Days Visits', 'rankology-stats'); ?></label>
            </li>
            <li>
                <input type="checkbox" id="<?php echo esc_attr($this->get_field_id('mvisit_widget')); ?>" name="<?php echo $this->get_field_name('mvisit_widget'); ?>" <?php if (isset($widget_options['mvisit_widget'])) checked('on', $widget_options['mvisit_widget']); ?>/>
                <label for="<?php echo esc_attr($this->get_field_id('mvisit_widget')); ?>"><?php esc_html_e('Last 30 Days Visits', 'rankology-stats'); ?></label>
            </li>
            <li>
                <input type="checkbox" id="<?php echo esc_attr($this->get_field_id('ysvisit_widget')); ?>" name="<?php echo $this->get_field_name('ysvisit_widget'); ?>" <?php if (isset($widget_options['ysvisit_widget'])) checked('on', $widget_options['ysvisit_widget']); ?>/>
                <label for="<?php echo esc_attr($this->get_field_id('ysvisit_widget')); ?>"><?php esc_html_e('Last 365 Days Visits', 'rankology-stats'); ?></label>
            </li>
            <li>
                <input type="checkbox" id="<?php echo esc_attr($this->get_field_id('ttvisit_widget')); ?>" name="<?php echo $this->get_field_name('ttvisit_widget'); ?>" <?php if (isset($widget_options['ttvisit_widget'])) checked('on', $widget_options['ttvisit_widget']); ?>/>
                <label for="<?php echo esc_attr($this->get_field_id('ttvisit_widget')); ?>"><?php esc_html_e('Total Visits', 'rankology-stats'); ?></label>
            </li>
            <li>
                <input type="checkbox" id="<?php echo esc_attr($this->get_field_id('ttvisitor_widget')); ?>" name="<?php echo $this->get_field_name('ttvisitor_widget'); ?>" <?php if (isset($widget_options['ttvisitor_widget'])) checked('on', $widget_options['ttvisitor_widget']); ?>/>
                <label for="<?php echo esc_attr($this->get_field_id('ttvisitor_widget')); ?>"><?php esc_html_e('Total Visitors', 'rankology-stats'); ?></label>
            </li>
            <li>
                <input type="checkbox" id="<?php echo esc_attr($this->get_field_id('tpviews_widget')); ?>" name="<?php echo $this->get_field_name('tpviews_widget'); ?>" <?php if (isset($widget_options['tpviews_widget'])) checked('on', $widget_options['tpviews_widget']); ?>/>
                <label for="<?php echo esc_attr($this->get_field_id('tpviews_widget')); ?>"><?php esc_html_e('Total Page Views', 'rankology-stats'); ?></label>
            </li>
            <li>
                <input type="checkbox" id="<?php echo esc_attr($this->get_field_id('ser_widget')); ?>" class="ser_widget" name="<?php echo $this->get_field_name('ser_widget'); ?>" <?php if (isset($widget_options['ser_widget'])) checked('on', $widget_options['ser_widget']); ?>/>
                <label for="<?php echo esc_attr($this->get_field_id('ser_widget')); ?>"><?php esc_html_e('Search Engine Referrals', 'rankology-stats'); ?></label>

                <p id="ser_option" style="<?php if (isset($widget_options['ser_widget']) and !$widget_options['ser_widget']) {
                    echo "display: none;";
                } ?>">
                    <?php esc_html_e('Select type of search engine', 'rankology-stats'); ?>:<br/>
                    <?php
                    $search_engines = RANKOLOGY_STATS\SearchEngine::getList();

                    foreach ($search_engines as $se) {
                        echo '<input type="radio" id="select_' . esc_html($se['tag']) . '" name="select_se" value="' . esc_html($se['tag']) . '" ';
                        if (isset($widget_options['select_se'])) checked($se['tag'], $widget_options['select_se']);
                        echo "/>\n";
                        echo '<label for="' . esc_html($se['name']) . '">' . esc_html($se['translated']) . "</label>\n";
                        echo "\n";
                    }
                    ?>
                    <input type="radio" id="select_all" name="select_se" value="all" <?php if (isset($widget_options['select_se'])) checked('all', $widget_options['select_se']); ?>/>
                    <label for="select_all"><?php esc_html_e('All', 'rankology-stats'); ?></label>
                </p>
            </li>
            <li>
                <input type="checkbox" id="<?php echo esc_attr($this->get_field_id('tp_widget')); ?>" name="<?php echo $this->get_field_name('tp_widget'); ?>" <?php if (isset($widget_options['tp_widget'])) checked('on', $widget_options['tp_widget']); ?>/>
                <label for="<?php echo esc_attr($this->get_field_id('tp_widget')); ?>"><?php esc_html_e('Total Posts', 'rankology-stats'); ?></label>
            </li>
            <li>
                <input type="checkbox" id="<?php echo esc_attr($this->get_field_id('tpg_widget')); ?>" name="<?php echo $this->get_field_name('tpg_widget'); ?>" <?php if (isset($widget_options['tpg_widget'])) checked('on', $widget_options['tpg_widget']); ?>/>
                <label for="<?php echo esc_attr($this->get_field_id('tpg_widget')); ?>"><?php esc_html_e('Total Pages', 'rankology-stats'); ?></label>
            </li>
            <li>
                <input type="checkbox" id="<?php echo esc_attr($this->get_field_id('tc_widget')); ?>" name="<?php echo $this->get_field_name('tc_widget'); ?>" <?php if (isset($widget_options['tc_widget'])) checked('on', $widget_options['tc_widget']); ?>/>
                <label for="<?php echo esc_attr($this->get_field_id('tc_widget')); ?>"><?php esc_html_e('Total Comments', 'rankology-stats'); ?></label>
            </li>
            <li>
                <input type="checkbox" id="<?php echo esc_attr($this->get_field_id('ts_widget')); ?>" name="<?php echo $this->get_field_name('ts_widget'); ?>" <?php if (isset($widget_options['ts_widget'])) checked('on', $widget_options['ts_widget']); ?>/>
                <label for="<?php echo esc_attr($this->get_field_id('ts_widget')); ?>"><?php esc_html_e('Total Spams', 'rankology-stats'); ?></label>
            </li>
            <li>
                <input type="checkbox" id="<?php echo esc_attr($this->get_field_id('tu_widget')); ?>" name="<?php echo $this->get_field_name('tu_widget'); ?>" <?php if (isset($widget_options['tu_widget'])) checked('on', $widget_options['tu_widget']); ?>/>
                <label for="<?php echo esc_attr($this->get_field_id('tu_widget')); ?>"><?php esc_html_e('Total Users', 'rankology-stats'); ?></label>
            </li>
            <li>
                <input type="checkbox" id="<?php echo esc_attr($this->get_field_id('ap_widget')); ?>" name="<?php echo $this->get_field_name('ap_widget'); ?>" <?php if (isset($widget_options['ap_widget'])) checked('on', $widget_options['ap_widget']); ?>/>
                <label for="<?php echo esc_attr($this->get_field_id('ap_widget')); ?>"><?php esc_html_e('Post Average', 'rankology-stats'); ?></label>
            </li>
            <li>
                <input type="checkbox" id="<?php echo esc_attr($this->get_field_id('ac_widget')); ?>" name="<?php echo $this->get_field_name('ac_widget'); ?>" <?php if (isset($widget_options['ac_widget'])) checked('on', $widget_options['ac_widget']); ?>/>
                <label for="<?php echo esc_attr($this->get_field_id('ac_widget')); ?>"><?php esc_html_e('Comment Average', 'rankology-stats'); ?></label>
            </li>
            <li>
                <input type="checkbox" id="<?php echo esc_attr($this->get_field_id('au_widget')); ?>" name="<?php echo $this->get_field_name('au_widget'); ?>" <?php if (isset($widget_options['au_widget'])) checked('on', $widget_options['au_widget']); ?>/>
                <label for="<?php echo esc_attr($this->get_field_id('au_widget')); ?>"><?php esc_html_e('User Average', 'rankology-stats'); ?></label>
            </li>
            <li>
                <input type="checkbox" id="<?php echo esc_attr($this->get_field_id('lpd_widget')); ?>" class="lpd_widget" name="<?php echo $this->get_field_name('lpd_widget'); ?>" <?php if (isset($widget_options['lpd_widget'])) checked('on', $widget_options['lpd_widget']); ?>/>
                <label for="<?php echo esc_attr($this->get_field_id('lpd_widget')); ?>"><?php esc_html_e('Last Post Date', 'rankology-stats'); ?></label>
            </li>
        </ul>

        <input type="hidden" id="<?php echo esc_attr($this->get_field_id('rankology_stats_control_widget_submit')); ?>" name="<?php echo $this->get_field_name('rankology_stats_control_widget_submit'); ?>" value="1"/>
        <?php
    }
}

/**
 * Register RANKOLOGY_Stats_Widget widget
 *
 * @return void
 */
add_action('widgets_init', 'register_rankology_stats_widget');
function register_rankology_stats_widget()
{
    register_widget('RANKOLOGY_Stats_Widget');
}

