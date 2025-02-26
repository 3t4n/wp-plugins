<?php

namespace RankologyFno\Actions\Admin;

if (! defined('ABSPATH')) {
    exit;
}

use Rankology\Core\Hooks\ExecuteHooksBackend;

class ManageColumn implements ExecuteHooksBackend
{

    public function hooks()
    {
        if(!function_exists('rankology_get_toggle_option')){
            return;
        }

        if ('1' == rankology_get_toggle_option('advanced')) {
            add_action('init', [$this, 'setup'], 20); //priority is important for plugins compatibility like Toolset
        }
    }

    public function setup()
    {
        $listPostTypes = rankology_get_service('WordPressData')->getPostTypes();

        if (empty($listPostTypes)) {
            return;
        }

        foreach ($listPostTypes as $key => $value) {
            if (method_exists(rankology_get_service('TitleOption'), 'getSingleCptEnable') && null === rankology_get_service('TitleOption')->getSingleCptEnable($key) && '' != $key) {
                add_filter('manage_' . $key . '_posts_columns', [$this, 'addColumn']);
                add_action('manage_' . $key . '_posts_custom_column', [$this, 'displayColumn'], 10, 2);
                add_filter('manage_edit-' . $key . '_sortable_columns', [$this, 'sortableColumn']);
                add_filter('pre_get_posts', [$this, 'sortColumnsBy']);
            }
        }

        add_filter('manage_edit-download_columns', [$this, 'addColumn'], 10, 2);
    }

    public function addColumn($columns)
    {
        if (! empty(rankology_get_service('AdvancedOption')->getAppearanceSearchConsole())) {
            $columns['rankology_search_console_clicks'] = __('Clicks', 'wp-rankology');
        }
        if (! empty(rankology_get_service('AdvancedOption')->getAppearanceSearchConsole())) {
            $columns['rankology_search_console_impressions'] = __('Impressions', 'wp-rankology');
        }
        if (! empty(rankology_get_service('AdvancedOption')->getAppearanceSearchConsole())) {
            $columns['rankology_search_console_ctr'] = __('CTR', 'wp-rankology');
        }
        if (! empty(rankology_get_service('AdvancedOption')->getAppearanceSearchConsole())) {
            $columns['rankology_search_console_position'] = __('Position', 'wp-rankology');
        }

        return $columns;
    }

    /**
     * 
     * @see manage_' . $postType . '_posts_custom_column
     *
     * @param string $column
     * @param int    $post_id
     *
     * @return void
     */
    public function displayColumn($column, $post_id)
    {
        switch ($column) {

            case 'rankology_search_console_clicks':
                $clicks = get_post_meta($post_id, '_rankology_search_console_analysis_clicks', true);
                if(!$clicks){
                    echo "0";
                    return;
                }

                echo esc_html($clicks);

                break;
            case 'rankology_search_console_impressions':
                $impressions = get_post_meta($post_id, '_rankology_search_console_analysis_impressions', true);
                if(!$impressions){
                    echo "0";
                    return;
                }

                echo esc_html($impressions);

                break;
            case 'rankology_search_console_ctr':
                $ctr = get_post_meta($post_id, '_rankology_search_console_analysis_ctr', true);
                if(!$ctr){
                    echo "0";
                    return;
                }

                echo esc_html(number_format(floatval($ctr)  * 100, 2) . '%');

                break;
            case 'rankology_search_console_position':
                $position = get_post_meta($post_id, '_rankology_search_console_analysis_position', true);
                if(!$position){
                    echo "0";
                    return;
                }

                echo esc_html(number_format(floatval($position), 0));

                break;
        }
    }

    /**
     * 
     * @see manage_edit' . $postType . '_sortable_columns
     *
     * @param string $columns
     *
     * @return array $columns
     */
    public function sortableColumn($columns) {
        $columns['rankology_search_console_clicks'] = 'rankology_search_console_clicks';
        $columns['rankology_search_console_ctr'] = 'rankology_search_console_ctr';
        $columns['rankology_search_console_impressions'] = 'rankology_search_console_impressions';
        $columns['rankology_search_console_position'] = 'rankology_search_console_position';

        return $columns;
    }

    /**
     * 
     * @see pre_get_posts
     *
     * @param string $query
     *
     * @return void
     */
    public function sortColumnsBy($query) {
        if (! is_admin()) {
            return;
        }

        $orderby = $query->get('orderby');
        if ('rankology_search_console_clicks' == $orderby) {
            $query->set('meta_key', '_rankology_search_console_analysis_clicks');
            $query->set('orderby', 'meta_value_num');
        }
        if ('rankology_search_console_impressions' == $orderby) {
            $query->set('meta_key', '_rankology_search_console_analysis_impressions');
            $query->set('orderby', 'meta_value_num');
        }
        if ('rankology_search_console_ctr' == $orderby) {
            $query->set('meta_key', '_rankology_search_console_analysis_ctr');
            $query->set('orderby', 'meta_value_num');
        }
        if ('rankology_search_console_position' == $orderby) {
            $query->set('meta_key', '_rankology_search_console_analysis_position');
            $query->set('orderby', 'meta_value_num');
        }
    }
}
