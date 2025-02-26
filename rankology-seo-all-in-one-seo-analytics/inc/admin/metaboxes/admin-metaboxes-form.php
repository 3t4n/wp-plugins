<?php
defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

global $typenow;
global $pagenow;

function rankology_redirections_value($rankology_redirections_value)
{
    if ('' != $rankology_redirections_value) {
        return $rankology_redirections_value;
    }
}

$data_attr = [];
$disabled = [];
$data_attr['data_tax'] = '';
$data_attr['termId'] = '';

if ('post-new.php' == $pagenow || 'post.php' == $pagenow) {
    $data_attr['current_id'] = get_the_id();
    $data_attr['origin'] = 'post';
    $data_attr['title'] = get_the_title($data_attr['current_id']);
} elseif ('term.php' == $pagenow || 'edit-tags.php' == $pagenow) {
    global $tag;
    $data_attr['current_id'] = $tag->term_id;
    $data_attr['termId'] = $tag->term_id;
    $data_attr['origin'] = 'term';
    $data_attr['data_tax'] = $tag->taxonomy;
    $data_attr['title'] = $tag->name;

}

$data_attr['isHomeId'] = get_option('page_on_front');
if ('0' === $data_attr['isHomeId']) {
    $data_attr['isHomeId'] = '';
}

if ('term.php' == $pagenow || 'edit-tags.php' == $pagenow) { ?>
    <tr id="term-rankology" class="form-field">
        <th scope="row">
            <h2>
                <?php esc_html_e('On-Page SEO', 'wp-rankology'); ?>
            </h2>
        </th>
        <td>
            <div id="rankology_cpt">
                <div class="inside">
                <?php } ?>
                <div id="rankology-tabs" class="rankology-tabs-preview"
                    data-home-id="<?php echo $data_attr['isHomeId']; ?>"
                    data-term-id="<?php echo $data_attr['termId']; ?>" data_id="<?php echo $data_attr['current_id']; ?>"
                    data_origin="<?php echo $data_attr['origin']; ?>" data_tax="<?php echo $data_attr['data_tax']; ?>">
                    <?php if ('rankology_404' != $typenow) {
                        $seo_tabs['title-tab'] = '<li><a href="#tabs-1">' . esc_html__('Titles settings', 'wp-rankology') . '</a></li>';
                        $seo_tabs['social-tab'] = '<li><a href="#tabs-2">' . esc_html__('Social', 'wp-rankology') . '</a></li>';
                        $seo_tabs['advanced-tab'] = '<li><a href="#tabs-3">' . esc_html__('Advanced', 'wp-rankology') . '</a></li>';
                    }
                    $seo_tabs['redirect-tab'] = '<li><a href="#tabs-4">' . esc_html__('Redirection', 'wp-rankology') . '</a></li>';


                    $seo_tabs['google-tab'] = '<li><a href="#tabs-7">' . esc_html__('Inspect with Google', 'wp-rankology') . '</a></li>';

                    $seo_tabs['intlinking-tab'] = '<li><a href="#tabs-8">' . esc_html__('Internal Linking', 'wp-rankology') . '</a></li>';

                    // Google news Tab in post & pages
                    $seo_tabs = apply_filters('rankology_metabox_seo_tabs', $seo_tabs, $typenow, $pagenow);


                    if (!empty($seo_tabs)) { ?>
                        <ul>
                            <?php foreach ($seo_tabs as $tab) {
                                echo $tab;
                            } ?>
                        </ul>
                    <?php }

                    if ('rankology_404' != $typenow) {
                        if (array_key_exists('title-tab', $seo_tabs)) {

                            require_once dirname(__FILE__) . '/rankology-title-setting-tab.php';

                        }
                        if (array_key_exists('advanced-tab', $seo_tabs)) {
                            require_once dirname(__FILE__) . '/rankology-advanced-tab.php';
                        }
                        if (array_key_exists('social-tab', $seo_tabs)) {
                            require_once dirname(__FILE__) . '/rankology-social-tab.php';
                        }
                    }

                    if (array_key_exists('redirect-tab', $seo_tabs)) {
                        require_once dirname(__FILE__) . '/rankology-redirect-tab.php';

                    }

                    if (array_key_exists('google-tab', $seo_tabs)) {
                        ?>

                        <div id="tabs-7">
                            <?php if (rankology_get_toggle_option('inspect-url') === '1') { ?>
                                <?php if (function_exists('rankology_fno_get_service') && !empty($data_attr['current_id'])) {
                                    rankology_fno_get_service('RenderGSCInspectUrl')->render($data_attr['current_id']);
                                }
                            } ?>

                        </div>
                    <?php }
                    if (array_key_exists('intlinking-tab', $seo_tabs)) {
                        ?>
                        <div id="tabs-8">
                            <?php
                            require_once dirname(__FILE__) . '/rankology-posts-similar-content-class.php';
                            ?>
                            <?php

                            if (function_exists('rankology_fno_get_service') && !empty($data_attr['current_id'])) {
                                rankology_fno_get_service('RenderMetaboxInternalLinking')->render($data_attr['current_id']);
                            }
                            ?>
                        </div>
                    <?php }

                    do_action('rankology_seo_metabox_after_content', $typenow, $pagenow, $data_attr, $seo_tabs);
                    ?>
                </div>

                <?php
                if ('term.php' == $pagenow || 'edit-tags.php' == $pagenow) { ?>
                </div>
            </div>
        </td>
    </tr>
<?php } ?>
<input type="hidden" id="seo_tabs" name="seo_tabs"
    value="<?php echo htmlspecialchars(json_encode(array_keys($seo_tabs))); ?>">