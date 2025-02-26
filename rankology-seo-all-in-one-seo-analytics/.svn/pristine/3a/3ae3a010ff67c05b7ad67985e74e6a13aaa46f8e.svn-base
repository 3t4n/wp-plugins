<?php

namespace Rankology\Actions\Admin;

if (! defined('ABSPATH')) {
    exit;
}

use Rankology\Core\Hooks\ExecuteHooksBackend;
use Rankology\Services\TagsToString;

class ManageColumn implements ExecuteHooksBackend
{
    /**
     * @var TagsToString
     */
    protected $tagsToStringService;

    /**
     * 
     */
    public function __construct()
    {
        $this->tagsToStringService = rankology_get_service('TagsToString');
    }

    /**
     * 
     *
     * @return void
     */
    public function hooks()
    {
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
            if (null === rankology_get_service('TitleOption')->getSingleCptEnable($key) && '' != $key) {
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
        if (rankology_get_service('AdvancedOption')->getAppearanceTitleCol() ==='1') {
            $columns['rankology_title'] = __('Title tag', 'wp-rankology');
        }
        if (rankology_get_service('AdvancedOption')->getAppearanceMetaDescriptionCol() ==='1') {
            $columns['rankology_desc'] = __('Meta Desc.', 'wp-rankology');
        }
        if (rankology_get_service('AdvancedOption')->getAppearanceRedirectEnableCol() ==='1') {
            $columns['rankology_redirect_enable'] = __('Redirect?', 'wp-rankology');
        }
        if (rankology_get_service('AdvancedOption')->getAppearanceRedirectUrlCol() ==='1') {
            $columns['rankology_redirect_url'] = __('Redirect URL', 'wp-rankology');
        }
        if (rankology_get_service('AdvancedOption')->getAppearanceCanonical() ==='1') {
            $columns['rankology_canonical'] = __('Canonical', 'wp-rankology');
        }
        if (rankology_get_service('AdvancedOption')->getAppearanceTargetKwCol() ==='1') {
            $columns['rankology_tkw'] = __('Target Kw', 'wp-rankology');
        }
        if (rankology_get_service('AdvancedOption')->getAppearanceNoIndexCol() ==='1') {
            $columns['rankology_noindex'] = __('noindex?', 'wp-rankology');
        }
        if (rankology_get_service('AdvancedOption')->getAppearanceNoFollowCol() ==='1') {
            $columns['rankology_nofollow'] = __('nofollow?', 'wp-rankology');
        }
        if (rankology_get_service('AdvancedOption')->getAppearanceWordsCol() ==='1') {
            $columns['rankology_words'] = __('Words', 'wp-rankology');
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
            case 'rankology_title':
                $metaPostTitle   = get_post_meta($post_id, '_rankology_titles_title', true);

                $context = rankology_get_service('ContextPage')->buildContextWithCurrentId($post_id)->getContext();
                $title   = $this->tagsToStringService->replace($metaPostTitle, $context);
                if (empty($title)) {
                    $title = $metaPostTitle;
                }
                printf('<div id="rankology_title-%s">%s</div>', esc_attr($post_id), $title);
                printf('<div id="rankology_title_raw-%s" class="hidden">%s</div>', esc_attr($post_id), $metaPostTitle);
                break;

            case 'rankology_desc':
                $metaDescription   = get_post_meta($post_id, '_rankology_titles_desc', true);
                $context           = rankology_get_service('ContextPage')->buildContextWithCurrentId($post_id)->getContext();
                $description       = $this->tagsToStringService->replace($metaDescription, $context);
                if (empty($description)) {
                    $description = $metaDescription;
                }
                printf('<div id="rankology_desc-%s">%s</div>', esc_attr($post_id), $description);
                printf('<div id="rankology_desc_raw-%s" class="hidden">%s</div>', esc_attr($post_id), $metaDescription);
                break;

            case 'rankology_redirect_enable':
                if ('yes' == get_post_meta($post_id, '_rankology_redirections_enabled', true)) {
                    echo '<span class="dashicons dashicons-yes-alt"></span>';
                }
                break;
            case 'rankology_redirect_url':
                echo '<div id="rankology_redirect_url-' . esc_attr($post_id) . '">' . esc_html(get_post_meta($post_id, '_rankology_redirections_value', true)) . '</div>';
                break;

            case 'rankology_canonical':
                echo '<div id="rankology_canonical-' . esc_attr($post_id) . '">' . esc_html(get_post_meta($post_id, '_rankology_robots_canonical', true)) . '</div>';
                break;

            case 'rankology_tkw':
                echo '<div id="rankology_tkw-' . esc_attr($post_id) . '">' . esc_html(get_post_meta($post_id, '_rankology_analysis_target_kw', true)) . '</div>';
                break;

            case 'rankology_noindex':
                if ('yes' == get_post_meta($post_id, '_rankology_robots_index', true)) {
                    echo '<span class="dashicons dashicons-hidden"></span><span class="screen-reader-text">' . __('noindex is on!', 'wp-rankology') . '</span>';
                }
                break;

            case 'rankology_nofollow':
                if ('yes' == get_post_meta($post_id, '_rankology_robots_follow', true)) {
                    echo '<span class="dashicons dashicons-yes"></span><span class="screen-reader-text">' . __('nofollow is on!', 'wp-rankology') . '</span>';
                }
                break;

            case 'rankology_words':
                $dataApiAnalysis = get_post_meta($post_id, '_rankology_content_analysis_api', true);
                if (isset($dataApiAnalysis['words_counter']) && $dataApiAnalysis['words_counter'] !== null) {
                    echo $dataApiAnalysis['words_counter'];
                } else {
                    if ('' != get_the_content()) {
                        $rankology_analysis_data['words_counter'] = preg_match_all("/\p{L}[\p{L}\p{Mn}\p{Pd}'\x{2019}]*/u", strip_tags(wp_filter_nohtml_kses(get_the_content())), $matches);

                        echo $rankology_analysis_data['words_counter'];
                    }
                }
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
        $columns['rankology_noindex']  = 'rankology_noindex';
        $columns['rankology_nofollow'] = 'rankology_nofollow';

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
        if ('rankology_noindex' == $orderby) {
            $query->set('meta_key', '_rankology_robots_index');
            $query->set('orderby', 'meta_value');
        }
        if ('rankology_nofollow' == $orderby) {
            $query->set('meta_key', '_rankology_robots_follow');
            $query->set('orderby', 'meta_value');
        }
    }
}
