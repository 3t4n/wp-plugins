<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

///////////////////////////////////////////////////////////////////////////////////////////////////
//Requests schemas using WP Query
///////////////////////////////////////////////////////////////////////////////////////////////////
global $post;
$tmp = $post;

$args = [
    'post_type' => 'rankology_schemas',
    'posts_per_page' => -1,
    //'fields' => 'ids',
];

$rkseo_schemas_query = new WP_Query($args);

$rkseo_schemas_ids = [];

if ($rkseo_schemas_query->have_posts()) {
    while ($rkseo_schemas_query->have_posts()) {
        $rkseo_schemas_query->the_post();

        $_post = $tmp;
        $_cpt = get_post_type($_post);
        $post_id = $tmp->ID;
        $_taxos = get_post_taxonomies($_post);

        $serviceWpData = rankology_get_service('WordPressData');
        $_terms = [];
        if ($serviceWpData && method_exists($serviceWpData, 'getTaxonomies')) {
            $_terms = array_flip(wp_list_pluck(wp_get_post_terms($_post->ID, array_keys($serviceWpData->getTaxonomies())), 'term_id'));
        }

        $rules = get_post_meta(get_the_ID(), '_rankology_fno_rich_snippets_rules', true);

        if ( ! is_array($rules)) {
            $rules = rankology_get_default_schemas_rules($rules);
        }
        $conditions = rankology_get_schemas_conditions();
        $filters = rankology_get_schemas_filters();
        $html = '';
        foreach ($rules as $or => $values) {
            $flag = 0;
            foreach ($values as $and => $value) {
                $filter = $filters[$value['filter']];
                $cond = $conditions[$value['cond']];
                if ('post_type' === $value['filter'] && post_type_exists($value['cpt']) &&
                    (($value['cpt'] === $_cpt && 'equal' === $value['cond']) || ($value['cpt'] !== $_cpt && 'not_equal' === $value['cond']))
                ) {
                    ++$flag;
                }

                if ('taxonomy' === $value['filter'] && term_exists((int) $value['taxo']) &&
                    ((isset($_terms[$value['taxo']]) && 'equal' === $value['cond']) || ( ! isset($_terms[$value['taxo']]) && 'not_equal' === $value['cond']))
                ) {
                    ++$flag;
                }

                if (
                    'postId' === $value['filter'] &&
                    (((int) $value['postId'] === (int) $post_id && 'equal' === $value['cond']) || ((int) $value['postId'] !== (int) $post_id && 'not_equal' === $value['cond']))
                ) {
                    ++$flag;
                }

                if ($flag === count($values)) {
                    $rkseo_schemas_ids[] = get_the_ID();
                }
            }
        }
    }
    wp_reset_postdata();
}

$post = $tmp;

///////////////////////////////////////////////////////////////////////////////////////////////////
//Display schemas inside Automatic tab
///////////////////////////////////////////////////////////////////////////////////////////////////
if ( ! empty($rkseo_schemas_ids)) {
    $count = count($rkseo_schemas_ids); ?>

<div class="rankology-notice">
    <p class="rkseo-schema-count" data-count="<?php echo $count; ?>">
        <?php
        printf(
        _n(
            'You have <strong>%d</strong> automatic schema:',
            'You have <strong>%d</strong> automatic schemas:',
            $count,
            'wp-rankology'
        ),
        number_format_i18n($count)
    ); ?>
    </p>
</div>

<?php
    //Disable all schemas for this post
    $rankology_fno_rich_snippets_disable_all = get_post_meta($post->ID, '_rankology_fno_rich_snippets_disable_all', true);

    echo '<p><label for="rankology_fno_rich_snippets_disable_all"><input id="rankology_fno_rich_snippets_disable_all" name="rankology_fno_rich_snippets_disable_all" type="checkbox"';
    if ('1' == $rankology_fno_rich_snippets_disable_all) {
        echo 'checked="yes"';
    }
    echo ' value="1"/>';
    esc_html_e('Disable all automatic schemas for this post?', 'wp-rankology') . '</label></p>';

    //Disable automatic schemas individually
    $rankology_fno_rich_snippets_disable = get_post_meta($post->ID, '_rankology_fno_rich_snippets_disable', true);

    foreach ($rkseo_schemas_ids as $id) {
        //All datas
        $rankology_fno_schemas = get_post_meta($post->ID, '_rankology_fno_schemas');

        //Type
        $rankology_fno_rich_snippets_type = get_post_meta($id, '_rankology_fno_rich_snippets_type', true);

        //Article
        if ('articles' == $rankology_fno_rich_snippets_type) {
            $rankology_fno_rich_snippets_article_title = get_post_meta($id, '_rankology_fno_rich_snippets_article_title', true);
            $check_article_title = isset($rankology_fno_schemas[0][$id]['rich_snippets_article']['title']) ? $rankology_fno_schemas[0][$id]['rich_snippets_article']['title'] : null;

            $rankology_fno_rich_snippets_article_desc = get_post_meta($id, '_rankology_fno_rich_snippets_article_desc', true);
            $check_article_desc = isset($rankology_fno_schemas[0][$id]['rich_snippets_article']['desc']) ? $rankology_fno_schemas[0][$id]['rich_snippets_article']['desc'] : null;

            $rankology_fno_rich_snippets_article_author = get_post_meta($id, '_rankology_fno_rich_snippets_article_author', true);
            $check_article_author = isset($rankology_fno_schemas[0][$id]['rich_snippets_article']['author']) ? $rankology_fno_schemas[0][$id]['rich_snippets_article']['author'] : null;

            $rankology_fno_rich_snippets_article_img = get_post_meta($id, '_rankology_fno_rich_snippets_article_img', true);
            $check_article_img = isset($rankology_fno_schemas[0][$id]['rich_snippets_article']['img']) ? $rankology_fno_schemas[0][$id]['rich_snippets_article']['img'] : null;

            $rankology_fno_rich_snippets_article_coverage_start_date = get_post_meta($id, '_rankology_fno_rich_snippets_article_coverage_start_date', true);
            $check_article_coverage_start_date = isset($rankology_fno_schemas[0][$id]['rich_snippets_article']['coverage_start_date']) ? $rankology_fno_schemas[0][$id]['rich_snippets_article']['coverage_start_date'] : null;

            $rankology_fno_rich_snippets_article_coverage_start_time = get_post_meta($id, '_rankology_fno_rich_snippets_article_coverage_start_time', true);
            $check_article_coverage_start_time = isset($rankology_fno_schemas[0][$id]['rich_snippets_article']['coverage_start_time']) ? $rankology_fno_schemas[0][$id]['rich_snippets_article']['coverage_start_time'] : null;

            $rankology_fno_rich_snippets_article_coverage_end_date = get_post_meta($id, '_rankology_fno_rich_snippets_article_coverage_end_date', true);
            $check_article_coverage_end_date = isset($rankology_fno_schemas[0][$id]['rich_snippets_article']['coverage_end_date']) ? $rankology_fno_schemas[0][$id]['rich_snippets_article']['coverage_end_date'] : null;

            $rankology_fno_rich_snippets_article_coverage_end_time = get_post_meta($id, '_rankology_fno_rich_snippets_article_coverage_end_time', true);
            $check_article_coverage_end_time = isset($rankology_fno_schemas[0][$id]['rich_snippets_article']['coverage_end_time']) ? $rankology_fno_schemas[0][$id]['rich_snippets_article']['coverage_end_time'] : null;

            $rankology_fno_rich_snippets_article_speakable = get_post_meta($id, '_rankology_fno_rich_snippets_article_speakable', true);
            $check_article_speakable = isset($rankology_fno_schemas[0][$id]['rich_snippets_article']['speakable']) ? $rankology_fno_schemas[0][$id]['rich_snippets_article']['speakable'] : null;
        }
        //Business
        if ('localbusiness' == $rankology_fno_rich_snippets_type) {
            $rankology_fno_rich_snippets_lb_name = get_post_meta($id, '_rankology_fno_rich_snippets_lb_name', true);
            $check_lb_name = isset($rankology_fno_schemas[0][$id]['rich_snippets_lb']['name']) ? $rankology_fno_schemas[0][$id]['rich_snippets_lb']['name'] : null;

            $rankology_fno_rich_snippets_lb_type = get_post_meta($id, '_rankology_fno_rich_snippets_lb_type', true);
            $check_lb_type = isset($rankology_fno_schemas[0][$id]['rich_snippets_lb']['type']) ? $rankology_fno_schemas[0][$id]['rich_snippets_lb']['type'] : null;

            $rankology_fno_rich_snippets_lb_img = get_post_meta($id, '_rankology_fno_rich_snippets_lb_img', true);
            $check_lb_img = isset($rankology_fno_schemas[0][$id]['rich_snippets_lb']['img']) ? $rankology_fno_schemas[0][$id]['rich_snippets_lb']['img'] : null;

            $rankology_fno_rich_snippets_lb_street_addr = get_post_meta($id, '_rankology_fno_rich_snippets_lb_street_addr', true);
            $check_lb_street_addr = isset($rankology_fno_schemas[0][$id]['rich_snippets_lb']['street_addr']) ? $rankology_fno_schemas[0][$id]['rich_snippets_lb']['street_addr'] : null;

            $rankology_fno_rich_snippets_lb_city = get_post_meta($id, '_rankology_fno_rich_snippets_lb_city', true);
            $check_lb_city = isset($rankology_fno_schemas[0][$id]['rich_snippets_lb']['city']) ? $rankology_fno_schemas[0][$id]['rich_snippets_lb']['city'] : null;

            $rankology_fno_rich_snippets_lb_state = get_post_meta($id, '_rankology_fno_rich_snippets_lb_state', true);
            $check_lb_state = isset($rankology_fno_schemas[0][$id]['rich_snippets_lb']['state']) ? $rankology_fno_schemas[0][$id]['rich_snippets_lb']['state'] : null;

            $rankology_fno_rich_snippets_lb_pc = get_post_meta($id, '_rankology_fno_rich_snippets_lb_pc', true);
            $check_lb_pc = isset($rankology_fno_schemas[0][$id]['rich_snippets_lb']['pc']) ? $rankology_fno_schemas[0][$id]['rich_snippets_lb']['pc'] : null;

            $rankology_fno_rich_snippets_lb_country = get_post_meta($id, '_rankology_fno_rich_snippets_lb_country', true);
            $check_lb_country = isset($rankology_fno_schemas[0][$id]['rich_snippets_lb']['country']) ? $rankology_fno_schemas[0][$id]['rich_snippets_lb']['country'] : null;

            $rankology_fno_rich_snippets_lb_lat = get_post_meta($id, '_rankology_fno_rich_snippets_lb_lat', true);
            $check_lb_lat = isset($rankology_fno_schemas[0][$id]['rich_snippets_lb']['lat']) ? $rankology_fno_schemas[0][$id]['rich_snippets_lb']['lat'] : null;

            $rankology_fno_rich_snippets_lb_lon = get_post_meta($id, '_rankology_fno_rich_snippets_lb_lon', true);
            $check_lb_lon = isset($rankology_fno_schemas[0][$id]['rich_snippets_lb']['lon']) ? $rankology_fno_schemas[0][$id]['rich_snippets_lb']['lon'] : null;

            $rankology_fno_rich_snippets_lb_website = get_post_meta($id, '_rankology_fno_rich_snippets_lb_website', true);
            $check_lb_website = isset($rankology_fno_schemas[0][$id]['rich_snippets_lb']['website']) ? $rankology_fno_schemas[0][$id]['rich_snippets_lb']['website'] : null;

            $rankology_fno_rich_snippets_lb_tel = get_post_meta($id, '_rankology_fno_rich_snippets_lb_tel', true);
            $check_lb_tel = isset($rankology_fno_schemas[0][$id]['rich_snippets_lb']['tel']) ? $rankology_fno_schemas[0][$id]['rich_snippets_lb']['tel'] : null;

            $rankology_fno_rich_snippets_lb_price = get_post_meta($id, '_rankology_fno_rich_snippets_lb_price', true);
            $check_lb_price = isset($rankology_fno_schemas[0][$id]['rich_snippets_lb']['price']) ? $rankology_fno_schemas[0][$id]['rich_snippets_lb']['price'] : null;

            $check_lb_opening_hours = isset($rankology_fno_schemas[0][$id]['rich_snippets_lb']['opening_hours']) ? $rankology_fno_schemas[0][$id]['rich_snippets_lb']['opening_hours'] : null;
        }

        //FAQ
        if ('faq' == $rankology_fno_rich_snippets_type) {
            $rankology_fno_rich_snippets_faq_q = get_post_meta($id, '_rankology_fno_rich_snippets_faq_q', true);
            $check_faq_q = isset($rankology_fno_schemas[0][$id]['rich_snippets_faq']['q']) ? $rankology_fno_schemas[0][$id]['rich_snippets_faq']['q'] : null;

            $rankology_fno_rich_snippets_faq_a = get_post_meta($id, '_rankology_fno_rich_snippets_faq_a', true);
            $check_faq_a = isset($rankology_fno_schemas[0][$id]['rich_snippets_faq']['a']) ? $rankology_fno_schemas[0][$id]['rich_snippets_faq']['a'] : null;
        }

        //Course
        if ('courses' == $rankology_fno_rich_snippets_type) {
            $rankology_fno_rich_snippets_courses_title = get_post_meta($id, '_rankology_fno_rich_snippets_courses_title', true);
            $check_courses_title = isset($rankology_fno_schemas[0][$id]['rich_snippets_courses']['title']) ? $rankology_fno_schemas[0][$id]['rich_snippets_courses']['title'] : null;

            $rankology_fno_rich_snippets_courses_desc = get_post_meta($id, '_rankology_fno_rich_snippets_courses_desc', true);
            $check_courses_desc = isset($rankology_fno_schemas[0][$id]['rich_snippets_courses']['desc']) ? $rankology_fno_schemas[0][$id]['rich_snippets_courses']['desc'] : null;

            $rankology_fno_rich_snippets_courses_school = get_post_meta($id, '_rankology_fno_rich_snippets_courses_school', true);
            $check_courses_school = isset($rankology_fno_schemas[0][$id]['rich_snippets_courses']['school']) ? $rankology_fno_schemas[0][$id]['rich_snippets_courses']['school'] : null;

            $rankology_fno_rich_snippets_courses_website = get_post_meta($id, '_rankology_fno_rich_snippets_courses_website', true);
            $check_courses_website = isset($rankology_fno_schemas[0][$id]['rich_snippets_courses']['website']) ? $rankology_fno_schemas[0][$id]['rich_snippets_courses']['website'] : null;
        }

        //Recipe
        if ('recipes' == $rankology_fno_rich_snippets_type) {
            $rankology_fno_rich_snippets_recipes_name = get_post_meta($id, '_rankology_fno_rich_snippets_recipes_name', true);
            $check_recipes_name = isset($rankology_fno_schemas[0][$id]['rich_snippets_recipes']['name']) ? $rankology_fno_schemas[0][$id]['rich_snippets_recipes']['name'] : null;

            $rankology_fno_rich_snippets_recipes_desc = get_post_meta($id, '_rankology_fno_rich_snippets_recipes_desc', true);
            $check_recipes_desc = isset($rankology_fno_schemas[0][$id]['rich_snippets_recipes']['desc']) ? $rankology_fno_schemas[0][$id]['rich_snippets_recipes']['desc'] : null;

            $rankology_fno_rich_snippets_recipes_cat = get_post_meta($id, '_rankology_fno_rich_snippets_recipes_cat', true);
            $check_recipes_cat = isset($rankology_fno_schemas[0][$id]['rich_snippets_recipes']['cat']) ? $rankology_fno_schemas[0][$id]['rich_snippets_recipes']['cat'] : null;

            $rankology_fno_rich_snippets_recipes_img = get_post_meta($id, '_rankology_fno_rich_snippets_recipes_img', true);
            $check_recipes_img = isset($rankology_fno_schemas[0][$id]['rich_snippets_recipes']['img']) ? $rankology_fno_schemas[0][$id]['rich_snippets_recipes']['img'] : null;

            $rankology_fno_rich_snippets_recipes_video = get_post_meta($id, '_rankology_fno_rich_snippets_recipes_video', true);
            $check_recipes_video = isset($rankology_fno_schemas[0][$id]['rich_snippets_recipes']['video']) ? $rankology_fno_schemas[0][$id]['rich_snippets_recipes']['video'] : null;

            $rankology_fno_rich_snippets_recipes_prep_time = get_post_meta($id, '_rankology_fno_rich_snippets_recipes_prep_time', true);
            $check_recipes_prep_time = isset($rankology_fno_schemas[0][$id]['rich_snippets_recipes']['prep_time']) ? $rankology_fno_schemas[0][$id]['rich_snippets_recipes']['prep_time'] : null;

            $rankology_fno_rich_snippets_recipes_cook_time = get_post_meta($id, '_rankology_fno_rich_snippets_recipes_cook_time', true);
            $check_recipes_cook_time = isset($rankology_fno_schemas[0][$id]['rich_snippets_recipes']['cook_time']) ? $rankology_fno_schemas[0][$id]['rich_snippets_recipes']['cook_time'] : null;

            $rankology_fno_rich_snippets_recipes_calories = get_post_meta($id, '_rankology_fno_rich_snippets_recipes_calories', true);
            $check_recipes_calories = isset($rankology_fno_schemas[0][$id]['rich_snippets_recipes']['calories']) ? $rankology_fno_schemas[0][$id]['rich_snippets_recipes']['calories'] : null;

            $rankology_fno_rich_snippets_recipes_yield = get_post_meta($id, '_rankology_fno_rich_snippets_recipes_yield', true);
            $check_recipes_yield = isset($rankology_fno_schemas[0][$id]['rich_snippets_recipes']['yield']) ? $rankology_fno_schemas[0][$id]['rich_snippets_recipes']['yield'] : null;

            $rankology_fno_rich_snippets_recipes_keywords = get_post_meta($id, '_rankology_fno_rich_snippets_recipes_keywords', true);
            $check_recipes_keywords = isset($rankology_fno_schemas[0][$id]['rich_snippets_recipes']['keywords']) ? $rankology_fno_schemas[0][$id]['rich_snippets_recipes']['keywords'] : null;

            $rankology_fno_rich_snippets_recipes_cuisine = get_post_meta($id, '_rankology_fno_rich_snippets_recipes_cuisine', true);
            $check_recipes_cuisine = isset($rankology_fno_schemas[0][$id]['rich_snippets_recipes']['cuisine']) ? $rankology_fno_schemas[0][$id]['rich_snippets_recipes']['cuisine'] : null;

            $rankology_fno_rich_snippets_recipes_ingredient = get_post_meta($id, '_rankology_fno_rich_snippets_recipes_ingredient', true);
            $check_recipes_ingredient = isset($rankology_fno_schemas[0][$id]['rich_snippets_recipes']['ingredient']) ? $rankology_fno_schemas[0][$id]['rich_snippets_recipes']['ingredient'] : null;

            $rankology_fno_rich_snippets_recipes_instructions = get_post_meta($id, '_rankology_fno_rich_snippets_recipes_instructions', true);
            $check_recipes_instructions = isset($rankology_fno_schemas[0][$id]['rich_snippets_recipes']['instructions']) ? $rankology_fno_schemas[0][$id]['rich_snippets_recipes']['instructions'] : null;
        }

        //Job
        if ('jobs' == $rankology_fno_rich_snippets_type) {
            $rankology_fno_rich_snippets_jobs_name = get_post_meta($id, '_rankology_fno_rich_snippets_jobs_name', true);
            $check_jobs_name = isset($rankology_fno_schemas[0][$id]['rich_snippets_jobs']['name']) ? $rankology_fno_schemas[0][$id]['rich_snippets_jobs']['name'] : null;

            $rankology_fno_rich_snippets_jobs_desc = get_post_meta($id, '_rankology_fno_rich_snippets_jobs_desc', true);
            $check_jobs_desc = isset($rankology_fno_schemas[0][$id]['rich_snippets_jobs']['desc']) ? $rankology_fno_schemas[0][$id]['rich_snippets_jobs']['desc'] : null;

            $rankology_fno_rich_snippets_jobs_date_posted = get_post_meta($id, '_rankology_fno_rich_snippets_jobs_date_posted', true);
            $check_jobs_date_posted = isset($rankology_fno_schemas[0][$id]['rich_snippets_jobs']['date_posted']) ? $rankology_fno_schemas[0][$id]['rich_snippets_jobs']['date_posted'] : null;

            $rankology_fno_rich_snippets_jobs_valid_through = get_post_meta($id, '_rankology_fno_rich_snippets_jobs_valid_through', true);
            $check_jobs_valid_through = isset($rankology_fno_schemas[0][$id]['rich_snippets_jobs']['valid_through']) ? $rankology_fno_schemas[0][$id]['rich_snippets_jobs']['valid_through'] : null;

            $rankology_fno_rich_snippets_jobs_employment_type = get_post_meta($id, '_rankology_fno_rich_snippets_jobs_employment_type', true);
            $check_jobs_employment_type = isset($rankology_fno_schemas[0][$id]['rich_snippets_jobs']['employment_type']) ? $rankology_fno_schemas[0][$id]['rich_snippets_jobs']['employment_type'] : null;

            $rankology_fno_rich_snippets_jobs_identifier_name = get_post_meta($id, '_rankology_fno_rich_snippets_jobs_identifier_name', true);
            $check_jobs_identifier_name = isset($rankology_fno_schemas[0][$id]['rich_snippets_jobs']['identifier_name']) ? $rankology_fno_schemas[0][$id]['rich_snippets_jobs']['identifier_name'] : null;

            $rankology_fno_rich_snippets_jobs_identifier_value = get_post_meta($id, '_rankology_fno_rich_snippets_jobs_identifier_value', true);
            $check_jobs_identifier_value = isset($rankology_fno_schemas[0][$id]['rich_snippets_jobs']['identifier_value']) ? $rankology_fno_schemas[0][$id]['rich_snippets_jobs']['identifier_value'] : null;

            $rankology_fno_rich_snippets_jobs_hiring_organization = get_post_meta($id, '_rankology_fno_rich_snippets_jobs_hiring_organization', true);
            $check_jobs_hiring_organization = isset($rankology_fno_schemas[0][$id]['rich_snippets_jobs']['hiring_organization']) ? $rankology_fno_schemas[0][$id]['rich_snippets_jobs']['hiring_organization'] : null;

            $rankology_fno_rich_snippets_jobs_hiring_same_as = get_post_meta($id, '_rankology_fno_rich_snippets_jobs_hiring_same_as', true);
            $check_jobs_hiring_same_as = isset($rankology_fno_schemas[0][$id]['rich_snippets_jobs']['hiring_same_as']) ? $rankology_fno_schemas[0][$id]['rich_snippets_jobs']['hiring_same_as'] : null;

            $rankology_fno_rich_snippets_jobs_hiring_logo = get_post_meta($id, '_rankology_fno_rich_snippets_jobs_hiring_logo', true);
            $check_jobs_hiring_logo = isset($rankology_fno_schemas[0][$id]['rich_snippets_jobs']['hiring_logo']) ? $rankology_fno_schemas[0][$id]['rich_snippets_jobs']['hiring_logo'] : null;

            $rankology_fno_rich_snippets_jobs_address_street = get_post_meta($id, '_rankology_fno_rich_snippets_jobs_address_street', true);
            $check_jobs_address_street = isset($rankology_fno_schemas[0][$id]['rich_snippets_jobs']['address_street']) ? $rankology_fno_schemas[0][$id]['rich_snippets_jobs']['address_street'] : null;

            $rankology_fno_rich_snippets_jobs_address_locality = get_post_meta($id, '_rankology_fno_rich_snippets_jobs_address_locality', true);
            $check_jobs_address_locality = isset($rankology_fno_schemas[0][$id]['rich_snippets_jobs']['address_locality']) ? $rankology_fno_schemas[0][$id]['rich_snippets_jobs']['address_locality'] : null;

            $rankology_fno_rich_snippets_jobs_address_region = get_post_meta($id, '_rankology_fno_rich_snippets_jobs_address_region', true);
            $check_jobs_address_region = isset($rankology_fno_schemas[0][$id]['rich_snippets_jobs']['address_region']) ? $rankology_fno_schemas[0][$id]['rich_snippets_jobs']['address_region'] : null;

            $rankology_fno_rich_snippets_jobs_postal_code = get_post_meta($id, '_rankology_fno_rich_snippets_jobs_postal_code', true);
            $check_jobs_postal_code = isset($rankology_fno_schemas[0][$id]['rich_snippets_jobs']['postal_code']) ? $rankology_fno_schemas[0][$id]['rich_snippets_jobs']['postal_code'] : null;

            $rankology_fno_rich_snippets_jobs_country = get_post_meta($id, '_rankology_fno_rich_snippets_jobs_country', true);
            $check_jobs_country = isset($rankology_fno_schemas[0][$id]['rich_snippets_jobs']['country']) ? $rankology_fno_schemas[0][$id]['rich_snippets_jobs']['country'] : null;

            $rankology_fno_rich_snippets_jobs_remote = get_post_meta($id, '_rankology_fno_rich_snippets_jobs_remote', true);
            $check_jobs_remote = isset($rankology_fno_schemas[0][$id]['rich_snippets_jobs']['remote']) ? $rankology_fno_schemas[0][$id]['rich_snippets_jobs']['remote'] : null;

            $rankology_fno_rich_snippets_jobs_location_requirement = get_post_meta($id, '_rankology_fno_rich_snippets_jobs_location_requirement', true);
            $check_jobs_location_requirement = isset($rankology_fno_schemas[0][$id]['rich_snippets_jobs']['location_requirement']) ? $rankology_fno_schemas[0][$id]['rich_snippets_jobs']['location_requirement'] : null;

            $rankology_fno_rich_snippets_jobs_direct_apply = get_post_meta($id, '_rankology_fno_rich_snippets_jobs_direct_apply', true);
            $check_jobs_direct_apply = isset($rankology_fno_schemas[0][$id]['rich_snippets_jobs']['direct_apply']) ? $rankology_fno_schemas[0][$id]['rich_snippets_jobs']['direct_apply'] : null;

            $rankology_fno_rich_snippets_jobs_salary = get_post_meta($id, '_rankology_fno_rich_snippets_jobs_salary', true);
            $check_jobs_salary = isset($rankology_fno_schemas[0][$id]['rich_snippets_jobs']['salary']) ? $rankology_fno_schemas[0][$id]['rich_snippets_jobs']['salary'] : null;

            $rankology_fno_rich_snippets_jobs_salary_currency = get_post_meta($id, '_rankology_fno_rich_snippets_jobs_salary_currency', true);
            $check_jobs_salary_currency = isset($rankology_fno_schemas[0][$id]['rich_snippets_jobs']['salary_currency']) ? $rankology_fno_schemas[0][$id]['rich_snippets_jobs']['salary_currency'] : null;

            $rankology_fno_rich_snippets_jobs_salary_unit = get_post_meta($id, '_rankology_fno_rich_snippets_jobs_salary_unit', true);
            $check_jobs_salary_unit = isset($rankology_fno_schemas[0][$id]['rich_snippets_jobs']['salary_unit']) ? $rankology_fno_schemas[0][$id]['rich_snippets_jobs']['salary_unit'] : null;
        }

        //Video
        if ('videos' == $rankology_fno_rich_snippets_type) {
            $rankology_fno_rich_snippets_videos_name = get_post_meta($id, '_rankology_fno_rich_snippets_videos_name', true);
            $check_videos_name = isset($rankology_fno_schemas[0][$id]['rich_snippets_videos']['name']) ? $rankology_fno_schemas[0][$id]['rich_snippets_videos']['name'] : null;

            $rankology_fno_rich_snippets_videos_description = get_post_meta($id, '_rankology_fno_rich_snippets_videos_description', true);
            $check_videos_description = isset($rankology_fno_schemas[0][$id]['rich_snippets_videos']['description']) ? $rankology_fno_schemas[0][$id]['rich_snippets_videos']['description'] : null;

            $rankology_fno_rich_snippets_videos_date_posted = get_post_meta($id, '_rankology_fno_rich_snippets_videos_date_posted', true);
            $check_videos_date_posted = isset($rankology_fno_schemas[0][$id]['rich_snippets_videos']['date_posted']) ? $rankology_fno_schemas[0][$id]['rich_snippets_videos']['date_posted'] : null;

            $rankology_fno_rich_snippets_videos_img = get_post_meta($id, '_rankology_fno_rich_snippets_videos_img', true);
            $check_videos_img = isset($rankology_fno_schemas[0][$id]['rich_snippets_videos']['img']) ? $rankology_fno_schemas[0][$id]['rich_snippets_videos']['img'] : null;

            $rankology_fno_rich_snippets_videos_duration = get_post_meta($id, '_rankology_fno_rich_snippets_videos_duration', true);
            $check_videos_duration = isset($rankology_fno_schemas[0][$id]['rich_snippets_videos']['duration']) ? $rankology_fno_schemas[0][$id]['rich_snippets_videos']['duration'] : null;

            $rankology_fno_rich_snippets_videos_url = get_post_meta($id, '_rankology_fno_rich_snippets_videos_url', true);
            $check_videos_url = isset($rankology_fno_schemas[0][$id]['rich_snippets_videos']['url']) ? $rankology_fno_schemas[0][$id]['rich_snippets_videos']['url'] : null;
        }

        //Events
        if ('events' == $rankology_fno_rich_snippets_type) {
            $rankology_fno_rich_snippets_events_type = get_post_meta($id, '_rankology_fno_rich_snippets_events_type', true);
            $check_events_type = isset($rankology_fno_schemas[0][$id]['rich_snippets_events']['type']) ? $rankology_fno_schemas[0][$id]['rich_snippets_events']['type'] : null;

            $rankology_fno_rich_snippets_events_name = get_post_meta($id, '_rankology_fno_rich_snippets_events_name', true);
            $check_events_name = isset($rankology_fno_schemas[0][$id]['rich_snippets_events']['name']) ? $rankology_fno_schemas[0][$id]['rich_snippets_events']['name'] : null;

            $rankology_fno_rich_snippets_events_desc = get_post_meta($id, '_rankology_fno_rich_snippets_events_desc', true);
            $check_events_desc = isset($rankology_fno_schemas[0][$id]['rich_snippets_events']['desc']) ? $rankology_fno_schemas[0][$id]['rich_snippets_events']['desc'] : null;

            $rankology_fno_rich_snippets_events_img = get_post_meta($id, '_rankology_fno_rich_snippets_events_img', true);
            $check_events_img = isset($rankology_fno_schemas[0][$id]['rich_snippets_events']['img']) ? $rankology_fno_schemas[0][$id]['rich_snippets_events']['img'] : null;

            $rankology_fno_rich_snippets_events_start_date = get_post_meta($id, '_rankology_fno_rich_snippets_events_start_date', true);
            $check_events_start_date = isset($rankology_fno_schemas[0][$id]['rich_snippets_events']['start_date']) ? $rankology_fno_schemas[0][$id]['rich_snippets_events']['start_date'] : null;

            $rankology_fno_rich_snippets_events_start_date_timezone = get_post_meta($id, '_rankology_fno_rich_snippets_events_start_date_timezone', true);
            $check_events_start_date_timezone = isset($rankology_fno_schemas[0][$id]['rich_snippets_events']['start_date_timezone']) ? $rankology_fno_schemas[0][$id]['rich_snippets_events']['start_date_timezone'] : null;

            $rankology_fno_rich_snippets_events_start_time = get_post_meta($id, '_rankology_fno_rich_snippets_events_start_time', true);
            $check_events_start_time = isset($rankology_fno_schemas[0][$id]['rich_snippets_events']['start_time']) ? $rankology_fno_schemas[0][$id]['rich_snippets_events']['start_time'] : null;

            $rankology_fno_rich_snippets_events_end_date = get_post_meta($id, '_rankology_fno_rich_snippets_events_end_date', true);
            $check_events_end_date = isset($rankology_fno_schemas[0][$id]['rich_snippets_events']['end_date']) ? $rankology_fno_schemas[0][$id]['rich_snippets_events']['end_date'] : null;

            $rankology_fno_rich_snippets_events_end_time = get_post_meta($id, '_rankology_fno_rich_snippets_events_end_time', true);
            $check_events_end_time = isset($rankology_fno_schemas[0][$id]['rich_snippets_events']['end_time']) ? $rankology_fno_schemas[0][$id]['rich_snippets_events']['end_time'] : null;

            $rankology_fno_rich_snippets_events_previous_start_date = get_post_meta($id, '_rankology_fno_rich_snippets_events_previous_start_date', true);
            $check_events_previous_start_date = isset($rankology_fno_schemas[0][$id]['rich_snippets_events']['previous_start_date']) ? $rankology_fno_schemas[0][$id]['rich_snippets_events']['previous_start_date'] : null;

            $rankology_fno_rich_snippets_events_previous_start_time = get_post_meta($id, '_rankology_fno_rich_snippets_events_previous_start_time', true);
            $check_events_previous_start_time = isset($rankology_fno_schemas[0][$id]['rich_snippets_events']['previous_start_time']) ? $rankology_fno_schemas[0][$id]['rich_snippets_events']['previous_start_time'] : null;

            $rankology_fno_rich_snippets_events_location_name = get_post_meta($id, '_rankology_fno_rich_snippets_events_location_name', true);
            $check_events_location_name = isset($rankology_fno_schemas[0][$id]['rich_snippets_events']['location_name']) ? $rankology_fno_schemas[0][$id]['rich_snippets_events']['location_name'] : null;

            $rankology_fno_rich_snippets_events_location_url = get_post_meta($id, '_rankology_fno_rich_snippets_events_location_url', true);
            $check_events_location_url = isset($rankology_fno_schemas[0][$id]['rich_snippets_events']['location_url']) ? $rankology_fno_schemas[0][$id]['rich_snippets_events']['location_url'] : null;

            $rankology_fno_rich_snippets_events_location_address = get_post_meta($id, '_rankology_fno_rich_snippets_events_location_address', true);
            $check_events_location_address = isset($rankology_fno_schemas[0][$id]['rich_snippets_events']['location_address']) ? $rankology_fno_schemas[0][$id]['rich_snippets_events']['location_address'] : null;

            $rankology_fno_rich_snippets_events_offers_name = get_post_meta($id, '_rankology_fno_rich_snippets_events_offers_name', true);
            $check_events_offers_name = isset($rankology_fno_schemas[0][$id]['rich_snippets_events']['offers_name']) ? $rankology_fno_schemas[0][$id]['rich_snippets_events']['offers_name'] : null;

            $rankology_fno_rich_snippets_events_offers_cat = get_post_meta($id, '_rankology_fno_rich_snippets_events_offers_cat', true);
            $check_events_offers_cat = isset($rankology_fno_schemas[0][$id]['rich_snippets_events']['offers_cat']) ? $rankology_fno_schemas[0][$id]['rich_snippets_events']['offers_cat'] : null;

            $rankology_fno_rich_snippets_events_offers_price = get_post_meta($id, '_rankology_fno_rich_snippets_events_offers_price', true);
            $check_events_offers_price = isset($rankology_fno_schemas[0][$id]['rich_snippets_events']['offers_price']) ? $rankology_fno_schemas[0][$id]['rich_snippets_events']['offers_price'] : null;

            $rankology_fno_rich_snippets_events_offers_price_currency = get_post_meta($id, '_rankology_fno_rich_snippets_events_offers_price_currency', true);
            $check_events_offers_price_currency = isset($rankology_fno_schemas[0][$id]['rich_snippets_events']['offers_price_currency']) ? $rankology_fno_schemas[0][$id]['rich_snippets_events']['offers_price_currency'] : null;

            $rankology_fno_rich_snippets_events_offers_availability = get_post_meta($id, '_rankology_fno_rich_snippets_events_offers_availability', true);
            $check_events_offers_availability = isset($rankology_fno_schemas[0][$id]['rich_snippets_events']['offers_availability']) ? $rankology_fno_schemas[0][$id]['rich_snippets_events']['offers_availability'] : null;

            $rankology_fno_rich_snippets_events_offers_valid_from_date = get_post_meta($id, '_rankology_fno_rich_snippets_events_offers_valid_from_date', true);
            $check_events_offers_valid_from_date = isset($rankology_fno_schemas[0][$id]['rich_snippets_events']['offers_valid_from_date']) ? $rankology_fno_schemas[0][$id]['rich_snippets_events']['offers_valid_from_date'] : null;

            $rankology_fno_rich_snippets_events_offers_valid_from_time = get_post_meta($id, '_rankology_fno_rich_snippets_events_offers_valid_from_time', true);
            $check_events_offers_valid_from_time = isset($rankology_fno_schemas[0][$id]['rich_snippets_events']['offers_valid_from_time']) ? $rankology_fno_schemas[0][$id]['rich_snippets_events']['offers_valid_from_time'] : null;

            $rankology_fno_rich_snippets_events_offers_url = get_post_meta($id, '_rankology_fno_rich_snippets_events_offers_url', true);
            $check_events_offers_url = isset($rankology_fno_schemas[0][$id]['rich_snippets_events']['offers_url']) ? $rankology_fno_schemas[0][$id]['rich_snippets_events']['offers_url'] : null;

            $rankology_fno_rich_snippets_events_performer = get_post_meta($id, '_rankology_fno_rich_snippets_events_performer', true);
            $check_events_performer = isset($rankology_fno_schemas[0][$id]['rich_snippets_events']['performer']) ? $rankology_fno_schemas[0][$id]['rich_snippets_events']['performer'] : null;

            $rankology_fno_rich_snippets_events_organizer_name = get_post_meta($id, '_rankology_fno_rich_snippets_events_organizer_name', true);
            $check_events_organizer_name = isset($rankology_fno_schemas[0][$id]['rich_snippets_events']['organizer_name']) ? $rankology_fno_schemas[0][$id]['rich_snippets_events']['organizer_name'] : null;

            $rankology_fno_rich_snippets_events_organizer_url = get_post_meta($id, '_rankology_fno_rich_snippets_events_organizer_url', true);
            $check_events_organizer_url = isset($rankology_fno_schemas[0][$id]['rich_snippets_events']['organizer_url']) ? $rankology_fno_schemas[0][$id]['rich_snippets_events']['organizer_url'] : null;

            $rankology_fno_rich_snippets_events_status = get_post_meta($id, '_rankology_fno_rich_snippets_events_status', true);
            $check_events_status = isset($rankology_fno_schemas[0][$id]['rich_snippets_events']['status']) ? $rankology_fno_schemas[0][$id]['rich_snippets_events']['status'] : null;

            $rankology_fno_rich_snippets_events_attendance_mode = get_post_meta($id, '_rankology_fno_rich_snippets_events_attendance_mode', true);
            $check_events_attendance_mode = isset($rankology_fno_schemas[0][$id]['rich_snippets_events']['attendance_mode']) ? $rankology_fno_schemas[0][$id]['rich_snippets_events']['attendance_mode'] : null;
        }

        //Products
        if ('products' == $rankology_fno_rich_snippets_type) {
            $rankology_fno_rich_snippets_product_name = get_post_meta($id, '_rankology_fno_rich_snippets_product_name', true);
            $check_product_name = isset($rankology_fno_schemas[0][$id]['rich_snippets_product']['name']) ? $rankology_fno_schemas[0][$id]['rich_snippets_product']['name'] : null;

            $rankology_fno_rich_snippets_product_description = get_post_meta($id, '_rankology_fno_rich_snippets_product_description', true);
            $check_product_description = isset($rankology_fno_schemas[0][$id]['rich_snippets_product']['description']) ? $rankology_fno_schemas[0][$id]['rich_snippets_product']['description'] : null;

            $rankology_fno_rich_snippets_product_img = get_post_meta($id, '_rankology_fno_rich_snippets_product_img', true);
            $check_product_img = isset($rankology_fno_schemas[0][$id]['rich_snippets_product']['img']) ? $rankology_fno_schemas[0][$id]['rich_snippets_product']['img'] : null;

            $rankology_fno_rich_snippets_product_price = get_post_meta($id, '_rankology_fno_rich_snippets_product_price', true);
            $check_product_price = isset($rankology_fno_schemas[0][$id]['rich_snippets_product']['price']) ? $rankology_fno_schemas[0][$id]['rich_snippets_product']['price'] : null;

            $rankology_fno_rich_snippets_product_price_valid_date = get_post_meta($id, '_rankology_fno_rich_snippets_product_price_valid_date', true);
            $check_product_price_valid_date = isset($rankology_fno_schemas[0][$id]['rich_snippets_product']['price_valid_date']) ? $rankology_fno_schemas[0][$id]['rich_snippets_product']['price_valid_date'] : null;

            $rankology_fno_rich_snippets_product_sku = get_post_meta($id, '_rankology_fno_rich_snippets_product_sku', true);
            $check_product_sku = isset($rankology_fno_schemas[0][$id]['rich_snippets_product']['sku']) ? $rankology_fno_schemas[0][$id]['rich_snippets_product']['sku'] : null;

            $rankology_fno_rich_snippets_product_brand = get_post_meta($id, '_rankology_fno_rich_snippets_product_brand', true);
            $check_product_brand = isset($rankology_fno_schemas[0][$id]['rich_snippets_product']['brand']) ? $rankology_fno_schemas[0][$id]['rich_snippets_product']['brand'] : null;

            $rankology_fno_rich_snippets_product_global_ids = get_post_meta($id, '_rankology_fno_rich_snippets_product_global_ids', true);
            $check_product_global_ids = isset($rankology_fno_schemas[0][$id]['rich_snippets_product']['global_ids']) ? $rankology_fno_schemas[0][$id]['rich_snippets_product']['global_ids'] : null;

            $rankology_fno_rich_snippets_product_global_ids_value = get_post_meta($id, '_rankology_fno_rich_snippets_product_global_ids_value', true);
            $check_product_global_ids_value = isset($rankology_fno_schemas[0][$id]['rich_snippets_product']['global_ids_value']) ? $rankology_fno_schemas[0][$id]['rich_snippets_product']['global_ids_value'] : null;

            $rankology_fno_rich_snippets_product_price_currency = get_post_meta($id, '_rankology_fno_rich_snippets_product_price_currency', true);
            $check_product_currency = isset($rankology_fno_schemas[0][$id]['rich_snippets_product']['currency']) ? $rankology_fno_schemas[0][$id]['rich_snippets_product']['currency'] : null;

            $rankology_fno_rich_snippets_product_condition = get_post_meta($id, '_rankology_fno_rich_snippets_product_condition', true);
            $check_product_condition = isset($rankology_fno_schemas[0][$id]['rich_snippets_product']['condition']) ? $rankology_fno_schemas[0][$id]['rich_snippets_product']['condition'] : null;

            $rankology_fno_rich_snippets_product_availability = get_post_meta($id, '_rankology_fno_rich_snippets_product_availability', true);
            $check_product_availability = isset($rankology_fno_schemas[0][$id]['rich_snippets_product']['availability']) ? $rankology_fno_schemas[0][$id]['rich_snippets_product']['availability'] : null;

            $rankology_fno_rich_snippets_product_positive_notes = get_post_meta($id, '_rankology_fno_rich_snippets_product_positive_notes', true);
            $check_product_pros = isset($rankology_fno_schemas[0][$id]['rich_snippets_product']['positive_notes']) ? $rankology_fno_schemas[0][$id]['rich_snippets_product']['positive_notes'] : null;

            $rankology_fno_rich_snippets_product_negative_notes = get_post_meta($id, '_rankology_fno_rich_snippets_product_negative_notes', true);
            $check_product_cons = isset($rankology_fno_schemas[0][$id]['rich_snippets_product']['negative_notes']) ? $rankology_fno_schemas[0][$id]['rich_snippets_product']['negative_notes'] : null;

            $rankology_fno_rich_snippets_product_energy_consumption = get_post_meta($id, '_rankology_fno_rich_snippets_product_energy_consumption', true);
            $check_product_ec = isset($rankology_fno_schemas[0][$id]['rich_snippets_product']['energy_consumption']) ? $rankology_fno_schemas[0][$id]['rich_snippets_product']['energy_consumption'] : null;
        }

        //Service
        if ('services' == $rankology_fno_rich_snippets_type) {
            $rankology_fno_rich_snippets_service_name = get_post_meta($id, '_rankology_fno_rich_snippets_service_name', true);
            $check_service_name = isset($rankology_fno_schemas[0][$id]['rich_snippets_service']['name']) ? $rankology_fno_schemas[0][$id]['rich_snippets_service']['name'] : null;

            $rankology_fno_rich_snippets_service_type = get_post_meta($id, '_rankology_fno_rich_snippets_service_type', true);
            $check_service_type = isset($rankology_fno_schemas[0][$id]['rich_snippets_service']['type']) ? $rankology_fno_schemas[0][$id]['rich_snippets_service']['type'] : null;

            $rankology_fno_rich_snippets_service_description = get_post_meta($id, '_rankology_fno_rich_snippets_service_description', true);
            $check_service_description = isset($rankology_fno_schemas[0][$id]['rich_snippets_service']['description']) ? $rankology_fno_schemas[0][$id]['rich_snippets_service']['description'] : null;

            $rankology_fno_rich_snippets_service_img = get_post_meta($id, '_rankology_fno_rich_snippets_service_img', true);
            $check_service_img = isset($rankology_fno_schemas[0][$id]['rich_snippets_service']['img']) ? $rankology_fno_schemas[0][$id]['rich_snippets_service']['img'] : null;

            $rankology_fno_rich_snippets_service_area = get_post_meta($id, '_rankology_fno_rich_snippets_service_area', true);
            $check_service_area = isset($rankology_fno_schemas[0][$id]['rich_snippets_service']['area']) ? $rankology_fno_schemas[0][$id]['rich_snippets_service']['area'] : null;

            $rankology_fno_rich_snippets_service_provider_name = get_post_meta($id, '_rankology_fno_rich_snippets_service_provider_name', true);
            $check_service_provider_name = isset($rankology_fno_schemas[0][$id]['rich_snippets_service']['provider_name']) ? $rankology_fno_schemas[0][$id]['rich_snippets_service']['provider_name'] : null;

            $rankology_fno_rich_snippets_service_lb_img = get_post_meta($id, '_rankology_fno_rich_snippets_service_lb_img', true);
            $check_service_lb_img = isset($rankology_fno_schemas[0][$id]['rich_snippets_service']['lb_img']) ? $rankology_fno_schemas[0][$id]['rich_snippets_service']['lb_img'] : null;

            $rankology_fno_rich_snippets_service_provider_mobility = get_post_meta($id, '_rankology_fno_rich_snippets_service_provider_mobility', true);
            $check_service_provider_mobility = isset($rankology_fno_schemas[0][$id]['rich_snippets_service']['provider_mobility']) ? $rankology_fno_schemas[0][$id]['rich_snippets_service']['provider_mobility'] : null;

            $rankology_fno_rich_snippets_service_slogan = get_post_meta($id, '_rankology_fno_rich_snippets_service_slogan', true);
            $check_service_slogan = isset($rankology_fno_schemas[0][$id]['rich_snippets_service']['slogan']) ? $rankology_fno_schemas[0][$id]['rich_snippets_service']['slogan'] : null;

            $rankology_fno_rich_snippets_service_street_addr = get_post_meta($id, '_rankology_fno_rich_snippets_service_street_addr', true);
            $check_service_street_addr = isset($rankology_fno_schemas[0][$id]['rich_snippets_service']['street_addr']) ? $rankology_fno_schemas[0][$id]['rich_snippets_service']['street_addr'] : null;

            $rankology_fno_rich_snippets_service_city = get_post_meta($id, '_rankology_fno_rich_snippets_service_city', true);
            $check_service_city = isset($rankology_fno_schemas[0][$id]['rich_snippets_service']['city']) ? $rankology_fno_schemas[0][$id]['rich_snippets_service']['city'] : null;

            $rankology_fno_rich_snippets_service_state = get_post_meta($id, '_rankology_fno_rich_snippets_service_state', true);
            $check_service_state = isset($rankology_fno_schemas[0][$id]['rich_snippets_service']['state']) ? $rankology_fno_schemas[0][$id]['rich_snippets_service']['state'] : null;

            $rankology_fno_rich_snippets_service_pc = get_post_meta($id, '_rankology_fno_rich_snippets_service_pc', true);
            $check_service_pc = isset($rankology_fno_schemas[0][$id]['rich_snippets_service']['pc']) ? $rankology_fno_schemas[0][$id]['rich_snippets_service']['pc'] : null;

            $rankology_fno_rich_snippets_service_country = get_post_meta($id, '_rankology_fno_rich_snippets_service_country', true);
            $check_service_country = isset($rankology_fno_schemas[0][$id]['rich_snippets_service']['country']) ? $rankology_fno_schemas[0][$id]['rich_snippets_service']['country'] : null;

            $rankology_fno_rich_snippets_service_lat = get_post_meta($id, '_rankology_fno_rich_snippets_service_lat', true);
            $check_service_lat = isset($rankology_fno_schemas[0][$id]['rich_snippets_service']['lat']) ? $rankology_fno_schemas[0][$id]['rich_snippets_service']['lat'] : null;

            $rankology_fno_rich_snippets_service_lon = get_post_meta($id, '_rankology_fno_rich_snippets_service_lon', true);
            $check_service_lon = isset($rankology_fno_schemas[0][$id]['rich_snippets_service']['lon']) ? $rankology_fno_schemas[0][$id]['rich_snippets_service']['lon'] : null;

            $rankology_fno_rich_snippets_service_tel = get_post_meta($id, '_rankology_fno_rich_snippets_service_tel', true);
            $check_service_tel = isset($rankology_fno_schemas[0][$id]['rich_snippets_service']['tel']) ? $rankology_fno_schemas[0][$id]['rich_snippets_service']['tel'] : null;

            $rankology_fno_rich_snippets_service_price = get_post_meta($id, '_rankology_fno_rich_snippets_service_price', true);
            $check_service_price = isset($rankology_fno_schemas[0][$id]['rich_snippets_service']['price']) ? $rankology_fno_schemas[0][$id]['rich_snippets_service']['price'] : null;
        }

        //Software App
        if ('softwareapp' == $rankology_fno_rich_snippets_type) {
            $rankology_fno_rich_snippets_softwareapp_name = get_post_meta($id, '_rankology_fno_rich_snippets_softwareapp_name', true);
            $check_softwareapp_name = isset($rankology_fno_schemas[0][$id]['rich_snippets_softwareapp']['name']) ? $rankology_fno_schemas[0][$id]['rich_snippets_softwareapp']['name'] : null;

            $rankology_fno_rich_snippets_softwareapp_os = get_post_meta($id, '_rankology_fno_rich_snippets_softwareapp_os', true);
            $check_softwareapp_os = isset($rankology_fno_schemas[0][$id]['rich_snippets_softwareapp']['os']) ? $rankology_fno_schemas[0][$id]['rich_snippets_softwareapp']['os'] : null;

            $rankology_fno_rich_snippets_softwareapp_cat = get_post_meta($id, '_rankology_fno_rich_snippets_softwareapp_cat', true);
            $check_softwareapp_cat = isset($rankology_fno_schemas[0][$id]['rich_snippets_softwareapp']['cat']) ? $rankology_fno_schemas[0][$id]['rich_snippets_softwareapp']['cat'] : null;

            $rankology_fno_rich_snippets_softwareapp_price = get_post_meta($id, '_rankology_fno_rich_snippets_softwareapp_price', true);
            $check_softwareapp_price = isset($rankology_fno_schemas[0][$id]['rich_snippets_softwareapp']['price']) ? $rankology_fno_schemas[0][$id]['rich_snippets_softwareapp']['price'] : null;

            $rankology_fno_rich_snippets_softwareapp_currency = get_post_meta($id, '_rankology_fno_rich_snippets_softwareapp_currency', true);
            $check_softwareapp_currency = isset($rankology_fno_schemas[0][$id]['rich_snippets_softwareapp']['currency']) ? $rankology_fno_schemas[0][$id]['rich_snippets_softwareapp']['currency'] : null;

            $rankology_fno_rich_snippets_softwareapp_rating = get_post_meta($id, '_rankology_fno_rich_snippets_softwareapp_rating', true);
            $check_softwareapp_rating = isset($rankology_fno_schemas[0][$id]['rich_snippets_softwareapp']['rating']) ? $rankology_fno_schemas[0][$id]['rich_snippets_softwareapp']['rating'] : null;

            $rankology_fno_rich_snippets_softwareapp_max_rating = get_post_meta($id, '_rankology_fno_rich_snippets_softwareapp_max_rating', true);
            $check_softwareapp_max_rating = isset($rankology_fno_schemas[0][$id]['rich_snippets_softwareapp']['max_rating']) ? $rankology_fno_schemas[0][$id]['rich_snippets_softwareapp']['max_rating'] : null;
        }

        //Review
        if ('review' == $rankology_fno_rich_snippets_type) {
            $rankology_fno_rich_snippets_review_item = get_post_meta($id, '_rankology_fno_rich_snippets_review_item', true);
            $check_review_item = isset($rankology_fno_schemas[0][$id]['rich_snippets_review']['item']) ? $rankology_fno_schemas[0][$id]['rich_snippets_review']['item'] : null;

            $rankology_fno_rich_snippets_review_item_type = get_post_meta($id, '_rankology_fno_rich_snippets_review_item_type', true);
            $check_review_item_type = isset($rankology_fno_schemas[0][$id]['rich_snippets_review']['item_type']) ? $rankology_fno_schemas[0][$id]['rich_snippets_review']['item_type'] : null;

            $rankology_fno_rich_snippets_review_img = get_post_meta($id, '_rankology_fno_rich_snippets_review_img', true);
            $check_review_img = isset($rankology_fno_schemas[0][$id]['rich_snippets_review']['img']) ? $rankology_fno_schemas[0][$id]['rich_snippets_review']['img'] : null;

            $rankology_fno_rich_snippets_review_rating = get_post_meta($id, '_rankology_fno_rich_snippets_review_rating', true);
            $check_review_rating = isset($rankology_fno_schemas[0][$id]['rich_snippets_review']['rating']) ? $rankology_fno_schemas[0][$id]['rich_snippets_review']['rating'] : null;

            $rankology_fno_rich_snippets_review_max_rating = get_post_meta($id, '_rankology_fno_rich_snippets_review_max_rating', true);
            $check_review_max_rating = isset($rankology_fno_schemas[0][$id]['rich_snippets_review']['max_rating']) ? $rankology_fno_schemas[0][$id]['rich_snippets_review']['max_rating'] : null;

            $rankology_fno_rich_snippets_review_body = get_post_meta($id, '_rankology_fno_rich_snippets_review_body', true);
            $check_review_body = isset($rankology_fno_schemas[0][$id]['rich_snippets_review']['body']) ? $rankology_fno_schemas[0][$id]['rich_snippets_review']['body'] : null;
        }

        //Custom
        if ('custom' == $rankology_fno_rich_snippets_type) {
            $rankology_fno_rich_snippets_custom = get_post_meta($id, '_rankology_fno_rich_snippets_custom', true);
            $check_custom = isset($rankology_fno_schemas[0][$id]['rich_snippets_custom']['custom']) ? $rankology_fno_schemas[0][$id]['rich_snippets_custom']['custom'] : null;
        }

        if ('none' != $rankology_fno_rich_snippets_type || '' != $rankology_fno_rich_snippets_type) {
            echo '<p class="schema_type"><span class="label">' . __('Name: ', 'wp-rankology') . '</span>' . get_the_title($id) . ' - <span class="label">' . __('Type: ', 'wp-rankology') . '</span>' . $rankology_fno_rich_snippets_type;

            if (current_user_can(rankology_capability('manage_options', 'schemas')) && is_admin()) {
                echo '<span class="edit"><a href="' . admin_url('post.php?post=' . $id . '&action=edit') . '">' . __('Edit', 'wp-rankology') . '</a></span>';
            }

            echo '</p>';

            //Disable schema
            echo '<p><label for="rankology_fno_rich_snippets_disable[' . $id . ']"><input id="rankology_fno_rich_snippets_disable[' . $id . ']" name="rankology_fno_rich_snippets_disable[' . $id . ']" type="checkbox" class="toggle"';
            if (is_array($rankology_fno_rich_snippets_disable) && array_key_exists($id, $rankology_fno_rich_snippets_disable)) {
                echo 'checked="yes"';
            }
            echo ' value="1"/>';
            esc_html_e('Disable this automatic schema for this post?', 'wp-rankology') . '</label></p>';
        }

        //Article
        if ('articles' == $rankology_fno_rich_snippets_type) {
            if ('manual_single' == $rankology_fno_rich_snippets_article_title) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_article][title]_meta">
							' . __('Headline <em>(max limit: 110)</em>', 'wp-rankology') . '</label>
						' . __('Default value if empty: Post title', 'wp-rankology') . '
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_article][title]" name="rankology_fno_schemas[' . $id . '][rich_snippets_article][title]" placeholder="' . esc_html__('The headline of the article', 'wp-rankology') . '" aria-label="' . __('Headline <em>(max limit: 110)</em>', 'wp-rankology') . '" value="' . esc_html($check_article_title) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_article_desc) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_article][desc]_meta">
							' . __('Description', 'wp-rankology') . '</label>
						' . __('Default value if empty: Post excerpt', 'wp-rankology') . '
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_article][desc]" name="rankology_fno_schemas[' . $id . '][rich_snippets_article][desc]" placeholder="' . esc_html__('The description of the article', 'wp-rankology') . '" aria-label="' . __('Description', 'wp-rankology') . '" value="' . esc_html($check_article_desc) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_article_author) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_article][author]_meta">
							' . __('Post author', 'wp-rankology') . '</label>
						' . __('Default value if empty: Post author', 'wp-rankology') . '
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_article][author]" name="rankology_fno_schemas[' . $id . '][rich_snippets_article][author]" placeholder="' . esc_html__('The author of the article', 'wp-rankology') . '" aria-label="' . __('Post author', 'wp-rankology') . '" value="' . esc_html($check_article_author) . '" />
					</p>';
            }
            if ('manual_img_single' == $rankology_fno_rich_snippets_article_img) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_article][img]_meta">
							' . __('Image', 'wp-rankology') . '</label>
							' . __('Default value if empty: Post thumbnail (featured image)', 'wp-rankology') . '
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_article][img]" name="rankology_fno_schemas[' . $id . '][rich_snippets_article][img]" placeholder="' . esc_html__('Select your image', 'wp-rankology') . '" aria-label="' . __('Image', 'wp-rankology') . '" value="' . esc_html($check_article_img) . '" />
					</p>';
            }
            if ('manual_date_single' == $rankology_fno_rich_snippets_article_coverage_start_date) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_article][coverage_start_date]_meta">
							' . __('Coverage Start Date', 'wp-rankology') . '</label>
						<input type="text" class="rankology-date-picker" id="rankology_fno_schemas[' . $id . '][rich_snippets_article][coverage_start_date]" name="rankology_fno_schemas[' . $id . '][rich_snippets_article][coverage_start_date]" placeholder="' . esc_html__('e.g. YYYY-MM-DD', 'wp-rankology') . '" aria-label="' . __('Coverage Start Date', 'wp-rankology') . '" value="' . esc_html($check_article_coverage_start_date) . '" />
					</p>';
            }
            if ('manual_time_single' == $rankology_fno_rich_snippets_article_coverage_start_time) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_article][coverage_start_time]_meta">
							' . __('Coverage Start Time', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_article][coverage_start_time]" name="rankology_fno_schemas[' . $id . '][rich_snippets_article][coverage_start_time]" placeholder="' . esc_html__('e.g. HH:MM', 'wp-rankology') . '" aria-label="' . __('Coverage Start Time', 'wp-rankology') . '" value="' . esc_html($check_article_coverage_start_time) . '" />
					</p>';
            }
            if ('manual_date_single' == $rankology_fno_rich_snippets_article_coverage_end_date) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_article][coverage_end_date]_meta">
							' . __('Coverage End Date', 'wp-rankology') . '</label>
						<input type="text" class="rankology-date-picker" id="rankology_fno_schemas[' . $id . '][rich_snippets_article][coverage_end_date]" name="rankology_fno_schemas[' . $id . '][rich_snippets_article][coverage_end_date]" placeholder="' . esc_html__('e.g. YYYY-MM-DD', 'wp-rankology') . '" aria-label="' . __('Coverage End Date', 'wp-rankology') . '" value="' . esc_html($check_article_coverage_end_date) . '" />
					</p>';
            }
            if ('manual_time_single' == $rankology_fno_rich_snippets_article_coverage_end_time) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_article][coverage_end_time]_meta">
							' . __('Coverage End Time', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_article][coverage_end_time]" name="rankology_fno_schemas[' . $id . '][rich_snippets_article][coverage_end_time]" placeholder="' . esc_html__('e.g. HH:MM', 'wp-rankology') . '" aria-label="' . __('Coverage End Time', 'wp-rankology') . '" value="' . esc_html($check_article_coverage_end_time) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_article_speakable) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_article][speakable]_meta">
							' . __('Speakable CSS Selector', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_article][speakable]" name="rankology_fno_schemas[' . $id . '][rich_snippets_article][speakable]" placeholder="' . esc_html__('e.g. post', 'wp-rankology') . '" aria-label="' . __('Speakable CSS Selector', 'wp-rankology') . '" value="' . esc_html($check_article_speakable) . '" />
					</p>';
            }
        }

        //Local Business
        if ('localbusiness' == $rankology_fno_rich_snippets_type) {
            if ('manual_single' == $rankology_fno_rich_snippets_lb_name) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_lb][name]_meta">
							' . __('Name of your business', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_lb][name]" name="rankology_fno_schemas[' . $id . '][rich_snippets_lb][name]" placeholder="' . esc_html__('e.g. My Local Business', 'wp-rankology') . '" aria-label="' . __('Name of your business', 'wp-rankology') . '" value="' . esc_html($check_lb_name) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_lb_type) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_lb][type]_meta">
							' . __('Select a business type', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_lb][type]" name="rankology_fno_schemas[' . $id . '][rich_snippets_lb][type]" placeholder="' . esc_html__('e.g. TravelAgency', 'wp-rankology') . '" aria-label="' . __('Select a business type', 'wp-rankology') . '" value="' . esc_html($check_lb_type) . '" />
					</p>';
            }
            if ('manual_img_single' == $rankology_fno_rich_snippets_lb_img) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_lb][img]_meta">
							' . __('Image', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_lb][img]" name="rankology_fno_schemas[' . $id . '][rich_snippets_lb][img]" placeholder="' . esc_html__('Select your image', 'wp-rankology') . '" aria-label="' . __('Select your image', 'wp-rankology') . '" value="' . esc_html($check_lb_img) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_lb_street_addr) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_lb][street_addr]_meta">
							' . __('Street Address', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_lb][street_addr]" name="rankology_fno_schemas[' . $id . '][rich_snippets_lb][street_addr]" placeholder="' . esc_html__('e.g. Place Bellevue', 'wp-rankology') . '" aria-label="' . __('Street Address', 'wp-rankology') . '" value="' . esc_html($check_lb_street_addr) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_lb_city) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_lb][city]_meta">
							' . __('City', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_lb][city]" name="rankology_fno_schemas[' . $id . '][rich_snippets_lb][city]" placeholder="' . esc_html__('e.g. Biarritz', 'wp-rankology') . '" aria-label="' . __('City', 'wp-rankology') . '" value="' . esc_html($check_lb_city) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_lb_state) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_lb][state]_meta">
							' . __('State', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_lb][state]" name="rankology_fno_schemas[' . $id . '][rich_snippets_lb][state]" placeholder="' . esc_html__('e.g. Nouvelle Aquitaine', 'wp-rankology') . '" aria-label="' . __('State', 'wp-rankology') . '" value="' . esc_html($check_lb_state) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_lb_pc) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_lb][pc]_meta">
							' . __('Postal code', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_lb][pc]" name="rankology_fno_schemas[' . $id . '][rich_snippets_lb][pc]" placeholder="' . esc_html__('e.g. 64200', 'wp-rankology') . '" aria-label="' . __('Postal code', 'wp-rankology') . '" value="' . esc_html($check_lb_pc) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_lb_country) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_lb][country]_meta">
							' . __('Country', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_lb][country]" name="rankology_fno_schemas[' . $id . '][rich_snippets_lb][country]" placeholder="' . esc_html__('e.g. France', 'wp-rankology') . '" aria-label="' . __('Country', 'wp-rankology') . '" value="' . esc_html($check_lb_country) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_lb_lat) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_lb][lat]_meta">
							' . __('Latitude', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_lb][lat]" name="rankology_fno_schemas[' . $id . '][rich_snippets_lb][lat]" placeholder="' . esc_html__('e.g. 43.4831389', 'wp-rankology') . '" aria-label="' . __('Latitude', 'wp-rankology') . '" value="' . esc_html($check_lb_lat) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_lb_lon) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_lb][lon]_meta">
							' . __('Longitude', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_lb][lon]" name="rankology_fno_schemas[' . $id . '][rich_snippets_lb][lon]" placeholder="' . esc_html__('e.g. -1.5630987', 'wp-rankology') . '" aria-label="' . __('Longitude', 'wp-rankology') . '" value="' . esc_html($check_lb_lon) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_lb_website) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_lb][website]_meta">
							' . __('URL', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_lb][website]" name="rankology_fno_schemas[' . $id . '][rich_snippets_lb][website]" placeholder="' . get_home_url() . '" aria-label="' . __('URL', 'wp-rankology') . '" value="' . esc_html($check_lb_website) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_lb_tel) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_lb][tel]_meta">
							' . __('Telephone', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_lb][tel]" name="rankology_fno_schemas[' . $id . '][rich_snippets_lb][tel]" placeholder="' . esc_html__('e.g. +43501020304', 'wp-rankology') . '" aria-label="' . __('Telephone', 'wp-rankology') . '" value="' . esc_html($check_lb_tel) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_lb_price) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_lb][price]_meta">
							' . __('Price range', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_lb][price]" name="rankology_fno_schemas[' . $id . '][rich_snippets_lb][price]" placeholder="' . esc_html__('e.g. $$, €€€, or ££££...', 'wp-rankology') . '" aria-label="' . __('Price range', 'wp-rankology') . '" value="' . esc_html($check_lb_price) . '" />
					</p>';
            }
            echo '<p>
				<label for="rankology_fno_rich_snippets_lb_opening_hours_meta">
					' . __('Opening hours', 'wp-rankology') . '</label>
			</p>';

            $options = $check_lb_opening_hours;

            $days = [__('Monday', 'wp-rankology'), __('Tuesday', 'wp-rankology'), __('Wednesday', 'wp-rankology'), __('Thursday', 'wp-rankology'), __('Friday', 'wp-rankology'), __('Saturday', 'wp-rankology'), __('Sunday', 'wp-rankology')];

            $hours = ['00', '01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23'];

            $mins = ['00', '15', '30', '45', '59'];

            echo '<ul class="wrap-opening-hours">';

            foreach ($days as $key => $day) {
                $check_day = isset($options[$key]['open']);

                $check_day_am = isset($options[$key]['am']['open']);

                $check_day_pm = isset($options[$key]['pm']['open']);

                $selected_start_hours = isset($options[$key]['am']['start']['hours']) ? $options[$key]['am']['start']['hours'] : null;

                $selected_start_mins = isset($options[$key]['am']['start']['mins']) ? $options[$key]['am']['start']['mins'] : null;

                echo '<li>';

                echo '<span class="day"><strong>' . $day . '</strong></span>';

                echo '<ul>';
                //Closed?
                echo '<li>';

                echo '<input id="rankology_fno_schemas[' . $id . '][rich_snippets_lb][opening_hours][' . $key . '][open]" name="rankology_fno_schemas[' . $id . '][rich_snippets_lb][opening_hours][' . $key . '][open]" type="checkbox"';
                if ('1' == $check_day) {
                    echo 'checked="yes"';
                }
                echo ' value="1"/>';

                echo '<label for="rankology_fno_schemas[' . $id . '][rich_snippets_lb][opening_hours][' . $key . '][open]">' . __('Closed all the day?', 'wp-rankology') . '</label> ';

                if (isset($options['rankology_fno_schemas'][$id]['rich_snippets_lb']['opening_hours'][$key]['open'])) {
                    esc_attr($options['rankology_fno_schemas'][$id]['rich_snippets_lb']['opening_hours'][$key]['open']);
                }
                echo '</li>';

                //AM
                echo '<li>';
                echo '<input id="rankology_fno_schemas[' . $id . '][rich_snippets_lb][opening_hours][' . $key . '][am][open]" name="rankology_fno_schemas[' . $id . '][rich_snippets_lb][opening_hours][' . $key . '][am][open]" type="checkbox"';
                if ('1' == $check_day_am) {
                    echo 'checked="yes"';
                }
                echo ' value="1"/>';

                echo '<label for="rankology_fno_schemas[' . $id . '][rich_snippets_lb][opening_hours][' . $key . '][am][open]">' . __('Open in the morning?', 'wp-rankology') . '</label> ';

                if (isset($options['rankology_fno_schemas'][$id]['rich_snippets_lb']['opening_hours'][$key]['am']['open'])) {
                    esc_attr($options['rankology_fno_schemas'][$id]['rich_snippets_lb']['opening_hours'][$key]['am']['open']);
                }

                echo '<select id="rankology_fno_schemas[' . $id . '][rich_snippets_lb][opening_hours][' . $key . '][am][start][hours]" name="rankology_fno_schemas[' . $id . '][rich_snippets_lb][opening_hours][' . $key . '][am][start][hours]">';

                foreach ($hours as $hour) {
                    echo '<option ';
                    if ($hour == $selected_start_hours) {
                        echo 'selected="selected"';
                    }
                    echo ' value="' . $hour . '">' . $hour . '</option>';
                }

                echo '</select>';

                echo ' : ';

                echo '<select id="rankology_fno_schemas[' . $id . '][rich_snippets_lb][opening_hours][' . $key . '][am][start][mins]" name="rankology_fno_schemas[' . $id . '][rich_snippets_lb][opening_hours][' . $key . '][am][start][mins]">';

                foreach ($mins as $min) {
                    echo '<option ';
                    if ($min == $selected_start_mins) {
                        echo 'selected="selected"';
                    }
                    echo ' value="' . $min . '">' . $min . '</option>';
                }

                echo '</select>';

                if (isset($options['rankology_fno_schemas'][$id]['rich_snippets_lb']['opening_hours'][$key]['am']['start']['hours'])) {
                    esc_attr($options['rankology_fno_schemas'][$id]['rich_snippets_lb']['opening_hours'][$key]['am']['start']['hours']);
                }

                if (isset($options['rankology_fno_schemas'][$id]['rich_snippets_lb']['opening_hours'][$key]['am']['start']['mins'])) {
                    esc_attr($options['rankology_fno_schemas'][$id]['rich_snippets_lb']['opening_hours'][$key]['am']['start']['mins']);
                }

                echo ' - ';

                $selected_end_hours = isset($options[$key]['am']['end']['hours']) ? $options[$key]['am']['end']['hours'] : null;

                $selected_end_mins = isset($options[$key]['am']['end']['mins']) ? $options[$key]['am']['end']['mins'] : null;

                echo '<select id="rankology_fno_schemas[' . $id . '][rich_snippets_lb][opening_hours][' . $key . '][am][end][hours]" name="rankology_fno_schemas[' . $id . '][rich_snippets_lb][opening_hours][' . $key . '][am][end][hours]">';

                foreach ($hours as $hour) {
                    echo '<option ';
                    if ($hour == $selected_end_hours) {
                        echo 'selected="selected"';
                    }
                    echo ' value="' . $hour . '">' . $hour . '</option>';
                }

                echo '</select>';

                echo ' : ';

                echo '<select id="rankology_fno_schemas[' . $id . '][rich_snippets_lb][opening_hours][' . $key . '][am][end][mins]" name="rankology_fno_schemas[' . $id . '][rich_snippets_lb][opening_hours][' . $key . '][am][end][mins]">';

                foreach ($mins as $min) {
                    echo '<option ';
                    if ($min == $selected_end_mins) {
                        echo 'selected="selected"';
                    }
                    echo ' value="' . $min . '">' . $min . '</option>';
                }

                echo '</select>';
                echo '</li>';

                //PM
                echo '<li>';
                $selected_start_hours2 = isset($options[$key]['pm']['start']['hours']) ? $options[$key]['pm']['start']['hours'] : null;

                $selected_start_mins2 = isset($options[$key]['pm']['start']['mins']) ? $options[$key]['pm']['start']['mins'] : null;

                echo '<input id="rankology_fno_schemas[' . $id . '][rich_snippets_lb][opening_hours][' . $key . '][pm][open]" name="rankology_fno_schemas[' . $id . '][rich_snippets_lb][opening_hours][' . $key . '][pm][open]" type="checkbox"';
                if ('1' == $check_day_pm) {
                    echo 'checked="yes"';
                }
                echo ' value="1"/>';

                echo '<label for="rankology_fno_schemas[' . $id . '][rich_snippets_lb][opening_hours][' . $key . '][pm][open]">' . __('Open in the afternoon?', 'wp-rankology') . '</label> ';

                if (isset($options['rankology_fno_schemas'][$id]['rich_snippets_lb']['opening_hours'][$key]['pm']['open'])) {
                    esc_attr($options['rankology_fno_schemas'][$id]['rich_snippets_lb']['opening_hours'][$key]['pm']['open']);
                }

                echo '<select id="rankology_fno_schemas[' . $id . '][rich_snippets_lb][opening_hours][' . $key . '][pm][start][hours]" name="rankology_fno_schemas[' . $id . '][rich_snippets_lb][opening_hours][' . $key . '][pm][start][hours]">';

                foreach ($hours as $hour) {
                    echo '<option ';
                    if ($hour == $selected_start_hours2) {
                        echo 'selected="selected"';
                    }
                    echo ' value="' . $hour . '">' . $hour . '</option>';
                }

                echo '</select>';

                echo ' : ';

                echo '<select id="rankology_fno_schemas[' . $id . '][rich_snippets_lb][opening_hours][' . $key . '][pm][start][mins]" name="rankology_fno_schemas[' . $id . '][rich_snippets_lb][opening_hours][' . $key . '][pm][start][mins]">';

                foreach ($mins as $min) {
                    echo '<option ';
                    if ($min == $selected_start_mins2) {
                        echo 'selected="selected"';
                    }
                    echo ' value="' . $min . '">' . $min . '</option>';
                }

                echo '</select>';

                if (isset($options['rankology_fno_schemas'][$id]['rich_snippets_lb']['opening_hours'][$key]['pm']['start']['hours'])) {
                    esc_attr($options['rankology_fno_schemas'][$id]['rich_snippets_lb']['opening_hours'][$key]['pm']['start']['hours']);
                }

                if (isset($options['rankology_fno_schemas'][$id]['rich_snippets_lb']['opening_hours'][$key]['pm']['start']['mins'])) {
                    esc_attr($options['rankology_fno_schemas'][$id]['rich_snippets_lb']['opening_hours'][$key]['pm']['start']['mins']);
                }

                echo ' - ';

                $selected_end_hours2 = isset($options[$key]['pm']['end']['hours']) ? $options[$key]['pm']['end']['hours'] : null;

                $selected_end_mins2 = isset($options[$key]['pm']['end']['mins']) ? $options[$key]['pm']['end']['mins'] : null;

                echo '<select id="rankology_fno_schemas[' . $id . '][rich_snippets_lb][opening_hours][' . $key . '][pm][end][hours]" name="rankology_fno_schemas[' . $id . '][rich_snippets_lb][opening_hours][' . $key . '][pm][end][hours]">';

                foreach ($hours as $hour) {
                    echo '<option ';
                    if ($hour == $selected_end_hours2) {
                        echo 'selected="selected"';
                    }
                    echo ' value="' . $hour . '">' . $hour . '</option>';
                }

                echo '</select>';

                echo ' : ';

                echo '<select id="rankology_fno_schemas[' . $id . '][rich_snippets_lb][opening_hours][' . $key . '][pm][end][mins]" name="rankology_fno_schemas[' . $id . '][rich_snippets_lb][opening_hours][' . $key . '][pm][end][mins]">';

                foreach ($mins as $min) {
                    echo '<option ';
                    if ($min == $selected_end_mins2) {
                        echo 'selected="selected"';
                    }
                    echo ' value="' . $min . '">' . $min . '</option>';
                }

                echo '</select>';

                echo '</li>';
                echo '</ul>';

                if (isset($options['rankology_fno_schemas'][$id]['rich_snippets_lb']['opening_hours'][$key]['pm']['end']['hours'])) {
                    esc_attr($options['rankology_fno_schemas'][$id]['rich_snippets_lb']['opening_hours'][$key]['pm']['end']['hours']);
                }

                if (isset($options['rankology_fno_schemas'][$id]['rich_snippets_lb']['opening_hours'][$key]['pm']['end']['mins'])) {
                    esc_attr($options['rankology_fno_schemas'][$id]['rich_snippets_lb']['opening_hours'][$key]['pm']['end']['mins']);
                }

                $check_lb_opening_hours = $options;
                echo '</li>';
            }
            echo '</ul>';
        }

        //FAQ
        if ('faq' == $rankology_fno_rich_snippets_type) {
            if ('manual_single' == $rankology_fno_rich_snippets_faq_q) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_faq][q]_meta">
							' . __('Question', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_faq][q]" name="rankology_fno_schemas[' . $id . '][rich_snippets_faq][q]" placeholder="' . esc_html__('Your question', 'wp-rankology') . '" aria-label="' . __('Question', 'wp-rankology') . '" value="' . esc_html($check_faq_q) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_faq_a) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_faq][a]_meta">
							' . __('Answer', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_faq][a]" name="rankology_fno_schemas[' . $id . '][rich_snippets_faq][a]" placeholder="' . esc_html__('Your answer', 'wp-rankology') . '" aria-label="' . __('Answer', 'wp-rankology') . '" value="' . esc_html($check_faq_a) . '" />
					</p>';
            }
        }

        //Courses
        if ('courses' == $rankology_fno_rich_snippets_type) {
            if ('manual_single' == $rankology_fno_rich_snippets_courses_title) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_courses][title]_meta">
							' . __('Title', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_courses][title]" name="rankology_fno_schemas[' . $id . '][rich_snippets_courses][title]" placeholder="' . esc_html__('The title of your lesson, course...', 'wp-rankology') . '" aria-label="' . __('Title', 'wp-rankology') . '" value="' . esc_html($check_courses_title) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_courses_desc) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_courses][desc]_meta">
							' . __('Course description', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_courses][desc]" name="rankology_fno_schemas[' . $id . '][rich_snippets_courses][desc]" placeholder="' . esc_html__('Enter your course/lesson description', 'wp-rankology') . '" aria-label="' . __('Course description', 'wp-rankology') . '" value="' . esc_html($check_courses_desc) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_courses_school) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_courses][school]_meta">
							' . __('School/Organization', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_courses][school]" name="rankology_fno_schemas[' . $id . '][rich_snippets_courses][school]" placeholder="' . esc_html__('Name of university, organization...', 'wp-rankology') . '" aria-label="' . __('School/Organization', 'wp-rankology') . '" value="' . esc_html($check_courses_school) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_courses_website) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_courses][website]_meta">
							' . __('School/Organization Website', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_courses][website]" name="rankology_fno_schemas[' . $id . '][rich_snippets_courses][website]" placeholder="' . esc_html__('Enter the URL like https://example.com/', 'wp-rankology') . '" aria-label="' . __('School/Organization Website', 'wp-rankology') . '" value="' . esc_html($check_courses_website) . '" />
					</p>';
            }
        }

        //Recipes
        if ('recipes' == $rankology_fno_rich_snippets_type) {
            if ('manual_single' == $rankology_fno_rich_snippets_recipes_name) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_recipes][name]_meta">
							' . __('Recipe name', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_recipes][name]" name="rankology_fno_schemas[' . $id . '][rich_snippets_recipes][name]" placeholder="' . esc_html__('The name of your dish', 'wp-rankology') . '" aria-label="' . __('Recipe name', 'wp-rankology') . '" value="' . esc_html($check_recipes_name) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_recipes_desc) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_recipes][desc]_meta">
							' . __('Short recipe description', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_recipes][desc]" name="rankology_fno_schemas[' . $id . '][rich_snippets_recipes][desc]" placeholder="' . esc_html__('A short summary describing the dish.', 'wp-rankology') . '" aria-label="' . __('Short recipe description', 'wp-rankology') . '" value="' . esc_html($check_recipes_desc) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_recipes_cat) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_recipes][cat]_meta">
							' . __('Recipe category', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_recipes][cat]" name="rankology_fno_schemas[' . $id . '][rich_snippets_recipes][cat]" placeholder="' . esc_html__('e.g. appetizer, entree, or dessert', 'wp-rankology') . '" aria-label="' . __('Recipe category', 'wp-rankology') . '" value="' . esc_html($check_recipes_cat) . '" />
					</p>';
            }
            if ('manual_img_single' == $rankology_fno_rich_snippets_recipes_img) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_recipes][img]_meta">
							' . __('Image', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_recipes][img]" name="rankology_fno_schemas[' . $id . '][rich_snippets_recipes][img]" placeholder="' . esc_html__('Select your image', 'wp-rankology') . '" aria-label="' . __('Image', 'wp-rankology') . '" value="' . esc_html($check_recipes_img) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_recipes_video) {
                echo '<p>
                        <label for="rankology_fno_schemas[' . $id . '][rich_snippets_recipes][video]_meta">
                            ' . __('Video URL of the recipe', 'wp-rankology') . '</label>
                        <input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_recipes][video]" name="rankology_fno_schemas[' . $id . '][rich_snippets_recipes][video]" placeholder="" aria-label="' . __('Video URL of the recipe', 'wp-rankology') . '" value="' . esc_html($check_recipes_video) . '" />
                    </p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_recipes_prep_time) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_recipes][prep_time]_meta">
							' . __('Preparation time (in minutes)', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_recipes][prep_time]" name="rankology_fno_schemas[' . $id . '][rich_snippets_recipes][prep_time]" placeholder="' . esc_html__('e.g. 30', 'wp-rankology') . '" aria-label="' . __('Preparation time (in minutes)', 'wp-rankology') . '" value="' . esc_html($check_recipes_prep_time) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_recipes_cook_time) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_recipes][cook_time]_meta">
							' . __('Cooking time (in minutes)', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_recipes][cook_time]" name="rankology_fno_schemas[' . $id . '][rich_snippets_recipes][cook_time]" placeholder="' . esc_html__('e.g. 45', 'wp-rankology') . '" aria-label="' . __('Cooking time (in minutes)', 'wp-rankology') . '" value="' . esc_html($check_recipes_cook_time) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_recipes_calories) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_recipes][calories]_meta">
							' . __('Calories', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_recipes][calories]" name="rankology_fno_schemas[' . $id . '][rich_snippets_recipes][calories]" placeholder="' . esc_html__('Number of calories', 'wp-rankology') . '" aria-label="' . __('Calories', 'wp-rankology') . '" value="' . esc_html($check_recipes_calories) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_recipes_yield) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_recipes][yield]_meta">
							' . __('Recipe yield', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_recipes][yield]" name="rankology_fno_schemas[' . $id . '][rich_snippets_recipes][yield]" placeholder="' . esc_html__('e.g. number of people served, or number of servings', 'wp-rankology') . '" aria-label="' . __('Recipe yield', 'wp-rankology') . '" value="' . esc_html($check_recipes_yield) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_recipes_keywords) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_recipes][keywords]_meta">
							' . __('Keywords (separated by commas)', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_recipes][keywords]" name="rankology_fno_schemas[' . $id . '][rich_snippets_recipes][keywords]" placeholder="' . esc_html__('e.g. winter apple pie, nutmeg crust (NOT recommended: dessert, American)', 'wp-rankology') . '" aria-label="' . __('Keywords', 'wp-rankology') . '" value="' . esc_html($check_recipes_keywords) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_recipes_cuisine) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_recipes][cuisine]_meta">
							' . __('Recipe cuisine', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_recipes][cuisine]" name="rankology_fno_schemas[' . $id . '][rich_snippets_recipes][cuisine]" placeholder="' . esc_html__('The region associated with your recipe. For example, "French", Mediterranean", or "American".', 'wp-rankology') . '" aria-label="' . __('Recipe cuisine', 'wp-rankology') . '" value="' . esc_html($check_recipes_cuisine) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_recipes_ingredient) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_recipes][ingredient]_meta">
							' . __('Recipe ingredients (one per line)', 'wp-rankology') . '</label>
						<textarea rows="12" id="rankology_fno_schemas[' . $id . '][rich_snippets_recipes][ingredient]" name="rankology_fno_schemas[' . $id . '][rich_snippets_recipes][ingredient]" placeholder="' . esc_html__('Ingredients used in the recipe. One ingredient per line. Include only the ingredient text that is necessary for making the recipe. Don\'t include unnecessary information, such as a definition of the ingredient.', 'wp-rankology') . '" aria-label="' . __('Recipe ingredients', 'wp-rankology') . '" value="' . esc_html($check_recipes_ingredient) . '">' . esc_html($check_recipes_ingredient) . '</textarea>
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_recipes_instructions) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_recipes][instructions]_meta">
							' . __('Recipe instructions (one per line)', 'wp-rankology') . '</label>
						<textarea rows="12" id="rankology_fno_schemas[' . $id . '][rich_snippets_recipes][instructions]" name="rankology_fno_schemas[' . $id . '][rich_snippets_recipes][instructions]" placeholder="' . esc_html__('e.g. Heat oven to 425°F. Include only text on how to make the recipe and don\'t include other text such as "Directions", "Watch the video", "Step 1".', 'wp-rankology') . '" aria-label="' . __('Recipe instructions', 'wp-rankology') . '" value="' . esc_html($check_recipes_instructions) . '">' . esc_html($check_recipes_instructions) . '</textarea>
					</p>';
            }
        }

        //Jobs
        if ('jobs' == $rankology_fno_rich_snippets_type) {
            if ('manual_single' == $rankology_fno_rich_snippets_jobs_name) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][name]_meta">
							' . __('Job title', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][name]" name="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][name]" placeholder="' . esc_html__('The title of the job (not the title of the posting). For example, "Software Engineer" or "Barista".', 'wp-rankology') . '" aria-label="' . __('Job title', 'wp-rankology') . '" value="' . esc_html($check_jobs_name) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_jobs_desc) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][desc]_meta">
							' . __('Job description', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][desc]" name="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][desc]" placeholder="' . esc_html__('The full description of the job in HTML format.', 'wp-rankology') . '" aria-label="' . __('Job description', 'wp-rankology') . '" value="' . esc_html($check_jobs_desc) . '" />
					</p>';
            }
            if ('manual_date_single' == $rankology_fno_rich_snippets_jobs_date_posted) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][date_posted]_meta">
							' . __('Published date', 'wp-rankology') . '</label>
						<input type="text" class="rankology-date-picker" autocomplete="false" id="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][date_posted]" name="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][date_posted]" placeholder="' . esc_html__('The original date that employer posted the job in ISO 8601 format. For example, "2017-01-24" or "2017-01-24T19:33:17+00:00".', 'wp-rankology') . '" aria-label="' . __('Published date', 'wp-rankology') . '" value="' . esc_html($check_jobs_date_posted) . '" />
					</p>';
            }
            if ('manual_date_single' == $rankology_fno_rich_snippets_jobs_valid_through) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][valid_through]_meta">
							' . __('Expiration date', 'wp-rankology') . '</label>
						<input type="text" class="rankology-date-picker" autocomplete="false" id="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][valid_through]" name="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][valid_through]" placeholder="' . esc_html__('The date when the job posting will expire in ISO 8601 format. For example, "2017-02-24" or "2017-02-24T19:33:17+00:00".', 'wp-rankology') . '" aria-label="' . __('Expiration date', 'wp-rankology') . '" value="' . esc_html($check_jobs_valid_through) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_jobs_employment_type) {
                echo '<p class="rankology_fno_rich_snippets_jobs_employment_type_p">
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][employment_type]_meta">
							' . __('Type of employment', 'wp-rankology') . '</label>
						<input type="text" class="rankology_fno_rich_snippets_jobs_employment_type" id="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][employment_type]" name="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][employment_type]" placeholder="' . esc_html__('Type of employment, You can include more than one employmentType property.', 'wp-rankology') . '" aria-label="' . __('Type of employment', 'wp-rankology') . '" value="' . esc_html($check_jobs_employment_type) . '" />
						<span class="wrap-tags">';
                echo '<button type="button" class="btn btnSecondary tag-title" id="rankology-tag-employment-1" data-tag="FULL_TIME"><span class="dashicons dashicons-tag"></span>FULL TIME</button>';
                echo '<button type="button" class="btn btnSecondary tag-title" id="rankology-tag-employment-2" data-tag="PART_TIME"><span class="dashicons dashicons-tag"></span>PART TIME</button>';
                echo '<button type="button" class="btn btnSecondary tag-title" id="rankology-tag-employment-3" data-tag="CONTRACTOR"><span class="dashicons dashicons-tag"></span>CONTRACTOR</button>';
                echo '<button type="button" class="btn btnSecondary tag-title" id="rankology-tag-employment-4" data-tag="TEMPORARY"><span class="dashicons dashicons-tag"></span>TEMPORARY</button>';
                echo '<button type="button" class="btn btnSecondary tag-title" id="rankology-tag-employment-5" data-tag="INTERN"><span class="dashicons dashicons-tag"></span>INTERN</button>';
                echo '<button type="button" class="btn btnSecondary tag-title" id="rankology-tag-employment-6" data-tag="VOLUNTEER"><span class="dashicons dashicons-tag"></span>VOLUNTEER</button>';
                echo '<button type="button" class="btn btnSecondary tag-title" id="rankology-tag-employment-7" data-tag="PER_DIEM"><span class="dashicons dashicons-tag"></span>PER_DIEM</button>';
                echo '<button type="button" class="btn btnSecondary tag-title" id="rankology-tag-employment-8" data-tag="OTHER"><span class="dashicons dashicons-tag"></span>OTHER</button>';
                echo '</span>
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_jobs_identifier_name) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][identifier_name]_meta">
							' . __('Identifier name', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][identifier_name]" name="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][identifier_name]" placeholder="' . esc_html__('The hiring organization\'s unique identifier name for the job', 'wp-rankology') . '" aria-label="' . __('Identifier name', 'wp-rankology') . '" value="' . esc_html($check_jobs_identifier_name) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_jobs_identifier_value) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][identifier_value]_meta">
							' . __('Identifier value', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][identifier_value]" name="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][identifier_value]" placeholder="' . esc_html__('The hiring organization\'s unique identifier value for the job', 'wp-rankology') . '" aria-label="' . __('Identifier value', 'wp-rankology') . '" value="' . esc_html($check_jobs_identifier_value) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_jobs_hiring_organization) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][hiring_organization]_meta">
							' . __('Organization that hires', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][hiring_organization]" name="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][hiring_organization]" placeholder="' . esc_html__('The organization offering the job position. This should be the name of the company.', 'wp-rankology') . '" aria-label="' . __('Organization that hires', 'wp-rankology') . '" value="' . esc_html($check_jobs_hiring_organization) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_jobs_hiring_same_as) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][hiring_same_as]_meta">
							' . __('Organization URL', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][hiring_same_as]" name="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][hiring_same_as]" placeholder="' . esc_html__('The organization website URL offering the job position.', 'wp-rankology') . '" aria-label="' . __('Organization URL', 'wp-rankology') . '" value="' . esc_html($check_jobs_hiring_same_as) . '" />
					</p>';
            }
            if ('manual_img_single' == $rankology_fno_rich_snippets_jobs_hiring_logo) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][hiring_logo]_meta">
							' . __('Organization logo', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][hiring_logo]" name="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][hiring_logo]" placeholder="' . esc_html__('The organization logo offering the job position.', 'wp-rankology') . '" aria-label="' . __('Organization logo', 'wp-rankology') . '" value="' . esc_html($check_jobs_hiring_logo) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_jobs_address_street) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][address_street]_meta">
							' . __('Street address', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][address_street]" name="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][address_street]" placeholder="' . esc_html__('Street address', 'wp-rankology') . '" aria-label="' . __('Street address', 'wp-rankology') . '" value="' . esc_html($check_jobs_address_street) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_jobs_address_locality) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][address_locality]_meta">
							' . __('Locality address', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][address_locality]" name="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][address_locality]" placeholder="' . esc_html__('Locality address', 'wp-rankology') . '" aria-label="' . __('Locality address', 'wp-rankology') . '" value="' . esc_html($check_jobs_address_locality) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_jobs_address_region) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][address_region]_meta">
							' . __('Region', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][address_region]" name="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][address_region]" placeholder="' . esc_html__('Region', 'wp-rankology') . '" aria-label="' . __('Region', 'wp-rankology') . '" value="' . esc_html($check_jobs_address_region) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_jobs_postal_code) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][postal_code]_meta">
							' . __('Postal code', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][postal_code]" name="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][postal_code]" placeholder="' . esc_html__('Postal code', 'wp-rankology') . '" aria-label="' . __('Postal code', 'wp-rankology') . '" value="' . esc_html($check_jobs_postal_code) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_jobs_country) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][country]_meta">
							' . __('Country', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][country]" name="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][country]" placeholder="' . esc_html__('Country', 'wp-rankology') . '" aria-label="' . __('Country', 'wp-rankology') . '" value="' . esc_html($check_jobs_country) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_jobs_remote) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][remote]_meta">
							' . __('Remote job?', 'wp-rankology') . '</label>
						<input type="checkbox" id="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][remote]" name="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][remote]" placeholder="' . esc_html__('Remote job?', 'wp-rankology') . '" aria-label="' . __('Remote job?', 'wp-rankology') . '"';
                if ('1' == esc_html($check_jobs_remote)) {
                    echo 'checked="yes"';
                }
                echo ' value="1"/>
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_jobs_location_requirement) {
                echo '<p>
                    <label for="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][location_requirement]_meta">
                        ' . __('Location requirement for remote job', 'wp-rankology') . '</label>
                    <input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][location_requirement]" name="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][location_requirement]" placeholder="' . esc_html__('Location requirement for remote job', 'wp-rankology') . '" aria-label="' . __('Location requirement for remote job', 'wp-rankology') . '" value="' . esc_html($check_jobs_location_requirement) . '" />
                </p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_jobs_direct_apply) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][direct_apply]_meta">
							' . __('Direct apply?', 'wp-rankology') . '</label>
						<input type="checkbox" id="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][direct_apply]" name="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][direct_apply]" placeholder="' . esc_html__('Direct apply?', 'wp-rankology') . '" aria-label="' . __('Direct apply?', 'wp-rankology') . '"';
                if ('1' == esc_html($check_jobs_direct_apply)) {
                    echo 'checked="yes"';
                }
                echo ' value="1"/>
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_jobs_salary) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][salary]_meta">
							' . __('Salary', 'wp-rankology') . '</label>
						<input type="number" step="0.01" min="0" id="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][salary]" name="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][salary]" placeholder="' . esc_html__('50', 'wp-rankology') . '" aria-label="' . __('Salary', 'wp-rankology') . '" value="' . esc_html($check_jobs_salary) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_jobs_salary_currency) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][salary_currency]_meta">
							' . __('Currency', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][salary_currency]" name="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][salary_currency]" placeholder="' . esc_html__('Currency', 'wp-rankology') . '" aria-label="' . __('Currency', 'wp-rankology') . '" value="' . esc_html($check_jobs_salary_currency) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_jobs_salary_unit) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][salary_unit]_meta">
							' . __('Select your unit text', 'wp-rankology') . '</label>
						<select id="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][salary_unit]" name="rankology_fno_schemas[' . $id . '][rich_snippets_jobs][salary_unit]">
							<option ' . selected('HOUR', esc_html($check_jobs_salary_unit), false) . ' value="HOUR">' . __('HOUR', 'wp-rankology') . '</option>
							<option ' . selected('DAY', esc_html($check_jobs_salary_unit), false) . ' value="DAY">' . __('DAY', 'wp-rankology') . '</option>
							<option ' . selected('WEEK', esc_html($check_jobs_salary_unit), false) . ' value="WEEK">' . __('WEEK', 'wp-rankology') . '</option>
							<option ' . selected('MONTH', esc_html($check_jobs_salary_unit), false) . ' value="MONTH">' . __('MONTH', 'wp-rankology') . '</option>
							<option ' . selected('YEAR', esc_html($check_jobs_salary_unit), false) . ' value="YEAR">' . __('YEAR', 'wp-rankology') . '</option>
						</select>
					</p>';
            }
        }

        //Videos
        if ('videos' == $rankology_fno_rich_snippets_type) {
            if ('manual_single' == $rankology_fno_rich_snippets_videos_name) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_videos][name]_meta">
							' . __('Video name', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_videos][name]" name="rankology_fno_schemas[' . $id . '][rich_snippets_videos][name]" placeholder="' . esc_html__('The title of your video', 'wp-rankology') . '" aria-label="' . __('Video name', 'wp-rankology') . '" value="' . esc_html($check_videos_name) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_videos_description) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_videos][description]_meta">
							' . __('Video description', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_videos][description]" name="rankology_fno_schemas[' . $id . '][rich_snippets_videos][description]" placeholder="' . esc_html__('The description of the video', 'wp-rankology') . '" aria-label="' . __('Video description', 'wp-rankology') . '" value="' . esc_html($check_videos_description) . '" />
					</p>';
            }
            if ('manual_date_single' == $rankology_fno_rich_snippets_videos_date_posted) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_videos][date_posted]_meta">
							' . __('Uploaded date', 'wp-rankology') . '</label>
						<input type="text" class="rankology-date-picker" id="rankology_fno_schemas[' . $id . '][rich_snippets_videos][date_posted]" name="rankology_fno_schemas[' . $id . '][rich_snippets_videos][date_posted]" placeholder="' . esc_html__('The uploaded date of your video in ISO 8601 format. For example, "2017-01-24" or "2017-01-24T19:33:17+00:00".', 'wp-rankology') . '" value="' . esc_html($check_videos_date_posted) . '" />
					</p>';
            }

            if ('manual_img_single' == $rankology_fno_rich_snippets_videos_img) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_videos][img]_meta">
							' . __('Video thumbnail', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_videos][img]" name="rankology_fno_schemas[' . $id . '][rich_snippets_videos][img]" placeholder="' . esc_html__('Select your image', 'wp-rankology') . '" aria-label="' . __('Video thumbnail', 'wp-rankology') . '" value="' . esc_html($check_videos_img) . '" />
					</p>';
            }
            if ('manual_time_single' == $rankology_fno_rich_snippets_videos_duration) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_videos][duration]_meta">
							' . __('Duration of your video (format: hh:mm:ss)', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_videos][duration]" name="rankology_fno_schemas[' . $id . '][rich_snippets_videos][duration]" placeholder="' . esc_html__('e.g. 00:12:00 for 12 mins', 'wp-rankology') . '" aria-label="' . __('Duration of your video (format: hh:mm:ss)', 'wp-rankology') . '" value="' . esc_html($check_videos_duration) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_videos_url) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_videos][url]_meta">
							' . __('Video URL', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_videos][url]" name="rankology_fno_schemas[' . $id . '][rich_snippets_videos][url]" placeholder="' . esc_html__('e.g. https://example.com/video.mp4', 'wp-rankology') . '" aria-label="' . __('Video URL', 'wp-rankology') . '" value="' . esc_html($check_videos_url) . '" />
					</p>';
            }
        }

        //Events
        if ('events' == $rankology_fno_rich_snippets_type) {
            if ('manual_single' == $rankology_fno_rich_snippets_events_type) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_events][type]_meta">
							' . __('Event type', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_events][type]" name="rankology_fno_schemas[' . $id . '][rich_snippets_events][type]" placeholder="' . esc_html__('Select your event type', 'wp-rankology') . '" aria-label="' . __('Event type', 'wp-rankology') . '" value="' . esc_html($check_events_type) . '" />
                        <span class="description">' . __('<strong>Authorized values:</strong> "BusinessEvent", "ChildrensEvent", "ComedyEvent", "CourseInstance", "DanceEvent", "DeliveryEvent", "EducationEvent", "ExhibitionEvent", "Festival", "FoodEvent", "LiteraryEvent", "MusicEvent", "PublicationEvent", "SaleEvent", "ScreeningEvent", "SocialEvent", "SportsEvent", "TheaterEvent", "VisualArtsEvent"', 'wp-rankology') . '</span>
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_events_name) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_events][name]_meta">
							' . __('Event name', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_events][name]" name="rankology_fno_schemas[' . $id . '][rich_snippets_events][name]" placeholder="' . esc_html__('The name of your event', 'wp-rankology') . '" aria-label="' . __('Event name', 'wp-rankology') . '" value="' . esc_html($check_events_name) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_events_desc) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_events][desc]_meta">
							' . __('Event description', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_events][desc]" name="rankology_fno_schemas[' . $id . '][rich_snippets_events][desc]" placeholder="' . esc_html__('Enter your event description', 'wp-rankology') . '" aria-label="' . __('Event description', 'wp-rankology') . '" value="' . esc_html($check_events_desc) . '" />
					</p>';
            }
            if ('manual_img_single' == $rankology_fno_rich_snippets_events_img) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_events][img]_meta">
							' . __('Image thumbnail', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_events][img]" name="rankology_fno_schemas[' . $id . '][rich_snippets_events][img]" placeholder="' . esc_html__('Select your image', 'wp-rankology') . '" aria-label="' . __('Image thumbnail', 'wp-rankology') . '" value="' . esc_html($check_events_img) . '" />
					</p>';
            }
            if ('manual_date_single' == $rankology_fno_rich_snippets_events_start_date) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_events][start_date]_meta">
							' . __('Start date', 'wp-rankology') . '</label>
						<input type="text" class="rankology-date-picker" id="rankology_fno_schemas[' . $id . '][rich_snippets_events][start_date]" name="rankology_fno_schemas[' . $id . '][rich_snippets_events][start_date]" placeholder="' . esc_html__('e.g. YYYY-MM-DD', 'wp-rankology') . '" aria-label="' . __('Start date', 'wp-rankology') . '" value="' . esc_html($check_events_start_date) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_events_start_date_timezone) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_events][start_date_timezone]_meta">
							' . __('Timezone', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_events][start_date_timezone]" name="rankology_fno_schemas[' . $id . '][rich_snippets_events][start_date_timezone]" placeholder="' . esc_html__('e.g. -4:00', 'wp-rankology') . '" aria-label="' . __('Timezone start date', 'wp-rankology') . '" value="' . esc_html($check_events_start_date_timezone) . '" />
					</p>';
            }
            if ('manual_time_single' == $rankology_fno_rich_snippets_events_start_time) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_events][start_time]_meta">
							' . __('Start time', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_events][start_time]" name="rankology_fno_schemas[' . $id . '][rich_snippets_events][start_time]" placeholder="' . esc_html__('e.g. HH:MM', 'wp-rankology') . '" aria-label="' . __('Start time', 'wp-rankology') . '" value="' . esc_html($check_events_start_time) . '" />
					</p>';
            }
            if ('manual_date_single' == $rankology_fno_rich_snippets_events_end_date) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_events][end_date]_meta">
							' . __('End date', 'wp-rankology') . '</label>
						<input type="text" class="rankology-date-picker" id="rankology_fno_schemas[' . $id . '][rich_snippets_events][end_date]" name="rankology_fno_schemas[' . $id . '][rich_snippets_events][end_date]" placeholder="' . esc_html__('e.g. YYYY-MM-DD', 'wp-rankology') . '" aria-label="' . __('End date', 'wp-rankology') . '" value="' . esc_html($check_events_end_date) . '" />
					</p>';
            }
            if ('manual_time_single' == $rankology_fno_rich_snippets_events_end_time) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_events][end_time]_meta">
							' . __('End time', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_events][end_time]" name="rankology_fno_schemas[' . $id . '][rich_snippets_events][end_time]" placeholder="' . esc_html__('e.g. HH:MM', 'wp-rankology') . '" aria-label="' . __('End time', 'wp-rankology') . '" value="' . esc_html($check_events_end_time) . '" />
					</p>';
            }
            if ('manual_date_single' == $rankology_fno_rich_snippets_events_previous_start_date) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_events][previous_start_date]_meta">
							' . __('Previous start date', 'wp-rankology') . '</label>
						<input type="text" class="rankology-date-picker" id="rankology_fno_schemas[' . $id . '][rich_snippets_events][previous_start_date]" name="rankology_fno_schemas[' . $id . '][rich_snippets_events][previous_start_date]" placeholder="' . esc_html__('e.g. YYYY-MM-DD', 'wp-rankology') . '" aria-label="' . __('Previous start date', 'wp-rankology') . '" value="' . esc_html($check_events_previous_start_date) . '" />
					</p>';
            }
            if ('manual_time_single' == $rankology_fno_rich_snippets_events_previous_start_time) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_events][previous_start_time]_meta">
							' . __('Previous Start time', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_events][previous_start_time]" name="rankology_fno_schemas[' . $id . '][rich_snippets_events][previous_start_time]" placeholder="' . esc_html__('e.g. HH:MM', 'wp-rankology') . '" aria-label="' . __('Previous start time', 'wp-rankology') . '" value="' . esc_html($check_events_previous_start_time) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_events_location_name) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_events][location_name]_meta">
							' . __('Location name', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_events][location_name]" name="rankology_fno_schemas[' . $id . '][rich_snippets_events][location_name]" placeholder="' . esc_html__('e.g. My Local Business name', 'wp-rankology') . '" aria-label="' . __('Location name', 'wp-rankology') . '" value="' . esc_html($check_events_location_name) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_events_location_url) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_events][location_url]_meta">
							' . __('Location Website', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_events][location_url]" name="rankology_fno_schemas[' . $id . '][rich_snippets_events][location_url]" placeholder="' . esc_html__('e.g. https://www.example.com', 'wp-rankology') . '" aria-label="' . __('Location Website', 'wp-rankology') . '" value="' . esc_html($check_events_location_url) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_events_location_address) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_events][location_address]_meta">
							' . __('Location Address', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_events][location_address]" name="rankology_fno_schemas[' . $id . '][rich_snippets_events][location_address]" placeholder="' . esc_html__('e.g. 1 Avenue de l\'Imperatrice, 64200 Biarritz', 'wp-rankology') . '" aria-label="' . __('Location Address', 'wp-rankology') . '" value="' . esc_html($check_events_location_address) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_events_offers_name) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_events][offers_name]_meta">
							' . __('Offer name', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_events][offers_name]" name="rankology_fno_schemas[' . $id . '][rich_snippets_events][offers_name]" placeholder="' . esc_html__('e.g. General admission', 'wp-rankology') . '" aria-label="' . __('Offer name', 'wp-rankology') . '" value="' . esc_html($check_events_offers_name) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_events_offers_cat) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_events][offers_cat]_meta">
							' . __('Offer category', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_events][offers_cat]" name="rankology_fno_schemas[' . $id . '][rich_snippets_events][offers_cat]" placeholder="' . esc_html__('Select your offer category', 'wp-rankology') . '" aria-label="' . __('Offer category', 'wp-rankology') . '" value="' . esc_html($check_events_offers_cat) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_events_offers_price) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_events][offers_price]_meta">
							' . __('Offer price', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_events][offers_price]" name="rankology_fno_schemas[' . $id . '][rich_snippets_events][offers_price]" placeholder="' . esc_html__('e.g. 10', 'wp-rankology') . '" aria-label="' . __('Offer price', 'wp-rankology') . '" value="' . esc_html($check_events_offers_price) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_events_offers_price_currency) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_events][offers_price_currency]_meta">
							' . __('Offer price currency', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_events][offers_price_currency]" name="rankology_fno_schemas[' . $id . '][rich_snippets_events][offers_price_currency]" placeholder="' . esc_html__('e.g. USD, EUR...', 'wp-rankology') . '" aria-label="' . __('Offer price currency', 'wp-rankology') . '" value="' . esc_html($check_events_offers_price_currency) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_events_offers_availability) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_events][offers_availability]_meta">
							' . __('Availability', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_events][offers_availability]" name="rankology_fno_schemas[' . $id . '][rich_snippets_events][offers_availability]" placeholder="' . esc_html__('e.g. InStock, SoldOut, PreOrder', 'wp-rankology') . '" aria-label="' . __('Availability', 'wp-rankology') . '" value="' . esc_html($check_events_offers_availability) . '" />
					</p>';
            }
            if ('manual_date_single' == $rankology_fno_rich_snippets_events_offers_valid_from_date) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_events][offers_valid_from_date]_meta">
							' . __('Valid From', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_events][offers_valid_from_date]" class="rankology-date-picker" name="rankology_fno_schemas[' . $id . '][rich_snippets_events][offers_valid_from_date]" placeholder="' . esc_html__('The date when tickets go on sale', 'wp-rankology') . '" aria-label="' . __('Valid From', 'wp-rankology') . '" value="' . esc_html($check_events_offers_valid_from_date) . '" />
					</p>';
            }
            if ('manual_time_single' == $rankology_fno_rich_snippets_events_offers_valid_from_time) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_events][offers_valid_from_time]_meta">
							' . __('Time', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_events][offers_valid_from_time]" name="rankology_fno_schemas[' . $id . '][rich_snippets_events][offers_valid_from_time]" placeholder="' . esc_html__('The time when tickets go on sale', 'wp-rankology') . '" aria-label="' . __('Time', 'wp-rankology') . '" value="' . esc_html($check_events_offers_valid_from_time) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_events_offers_url) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_events][offers_url]_meta">
							' . __('Website to buy tickets', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_events][offers_url]" name="rankology_fno_schemas[' . $id . '][rich_snippets_events][offers_url]" placeholder="' . esc_html__('e.g. https://www.example.com', 'wp-rankology') . '" aria-label="' . __('Website to buy tickets', 'wp-rankology') . '" value="' . esc_html($check_events_offers_url) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_events_performer) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_events][performer]_meta">
							' . __('Performer name', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_events][performer]" name="rankology_fno_schemas[' . $id . '][rich_snippets_events][performer]" placeholder="' . esc_html__('e.g. Lana Del Rey', 'wp-rankology') . '" aria-label="' . __('Performer name', 'wp-rankology') . '" value="' . esc_html($check_events_performer) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_events_organizer_name) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_events][organizer_name]_meta">
							' . __('Organizer name', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_events][organizer_name]" name="rankology_fno_schemas[' . $id . '][rich_snippets_events][organizer_name]" placeholder="' . esc_html__('e.g. Apple', 'wp-rankology') . '" aria-label="' . __('Organizer name', 'wp-rankology') . '" value="' . esc_html($check_events_organizer_name) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_events_organizer_url) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_events][organizer_url]_meta">
							' . __('Organizer URL', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_events][organizer_url]" name="rankology_fno_schemas[' . $id . '][rich_snippets_events][organizer_url]" placeholder="' . esc_html__('e.g. https://www.example.com', 'wp-rankology') . '" aria-label="' . __('Organizer URL', 'wp-rankology') . '" value="' . esc_html($check_events_organizer_url) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_events_status) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_events][status]_meta">
							' . __('Event status', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_events][status]" name="rankology_fno_schemas[' . $id . '][rich_snippets_events][status]" placeholder="' . esc_html__('e.g. EventCancelled', 'wp-rankology') . '" aria-label="' . __('Event status', 'wp-rankology') . '" value="' . esc_html($check_events_status) . '" />
						<span class="description">' . __('Possible values: "EventCancelled", "EventMovedOnline", "EventPostponed", "EventRescheduled", "EventScheduled"', 'wp-rankology') . '</span>
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_events_attendance_mode) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_events][attendance_mode]_meta">
							' . __('Event attendance mode', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_events][attendance_mode]" name="rankology_fno_schemas[' . $id . '][rich_snippets_events][attendance_mode]" placeholder="' . esc_html__('e.g. OfflineEventAttendanceMode', 'wp-rankology') . '" aria-label="' . __('Event attendance mode', 'wp-rankology') . '" value="' . esc_html($check_events_attendance_mode) . '" />
						<span class="description">' . __('Possible values: "OfflineEventAttendanceMode", "OnlineEventAttendanceMode", "MixedEventAttendanceMode"', 'wp-rankology') . '</span>
					</p>';
            }
        }

        //Products
        if ('products' == $rankology_fno_rich_snippets_type) {
            if ('manual_single' == $rankology_fno_rich_snippets_product_name) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_product][name]_meta">
							' . __('Product name', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_product][name]" name="rankology_fno_schemas[' . $id . '][rich_snippets_product][name]" placeholder="' . esc_html__('The name of your product', 'wp-rankology') . '" aria-label="' . __('Product name', 'wp-rankology') . '" value="' . esc_html($check_product_name) . '" />
						<span class="description">' . __('Default: product title', 'wp-rankology') . '</span>
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_product_description) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_product][description]_meta">
							' . __('Product description', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_product][description]" name="rankology_fno_schemas[' . $id . '][rich_snippets_product][description]" placeholder="' . esc_html__('The description of the product', 'wp-rankology') . '" aria-label="' . __('Product description', 'wp-rankology') . '" value="' . esc_html($check_product_description) . '" />
						<span class="description">' . __('Default: product excerpt', 'wp-rankology') . '</span>
					</p>';
            }
            if ('manual_img_single' == $rankology_fno_rich_snippets_product_img) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_product][img]_meta">
							' . __('Thumbnail', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_product][img]" name="rankology_fno_schemas[' . $id . '][rich_snippets_product][img]" placeholder="' . esc_html__('Select your image', 'wp-rankology') . '" aria-label="' . __('Thumbnail', 'wp-rankology') . '" value="' . esc_html($check_product_img) . '" />
						<span class="description">' . __('Default: product image', 'wp-rankology') . '</span>
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_product_price) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_product][price]_meta">
							' . __('Product price', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_product][price]" name="rankology_fno_schemas[' . $id . '][rich_snippets_product][price]" placeholder="' . esc_html__('e.g. 30', 'wp-rankology') . '" aria-label="' . __('Product price', 'wp-rankology') . '" value="' . esc_html($check_product_price) . '" />
						<span class="description">' . __('Default: active product price', 'wp-rankology') . '</span>
					</p>';
            }
            if ('manual_date_single' == $rankology_fno_rich_snippets_product_price_valid_date) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_product][price_valid_date]_meta">
							' . __('Product price valid until', 'wp-rankology') . '</label>
						<input type="text" class="rankology-date-picker" id="rankology_fno_schemas[' . $id . '][rich_snippets_product][price_valid_date]" name="rankology_fno_schemas[' . $id . '][rich_snippets_product][price_valid_date]" placeholder="' . esc_html__('e.g. YYYY-MM-DD', 'wp-rankology') . '" aria-label="' . __('Product price valid until', 'wp-rankology') . '" value="' . esc_html($check_product_price_valid_date) . '" />
						<span class="description">' . __('Default: sale price dates To field', 'wp-rankology') . '</span>
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_product_sku) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_product][sku]_meta">
							' . __('Product SKU', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_product][sku]" name="rankology_fno_schemas[' . $id . '][rich_snippets_product][sku]" placeholder="' . esc_html__('e.g. 0446310786', 'wp-rankology') . '" aria-label="' . __('Product SKU', 'wp-rankology') . '" value="' . esc_html($check_product_sku) . '" />
						<span class="description">' . __('Default: product SKU', 'wp-rankology') . '</span>
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_product_global_ids) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_product][global_ids]_meta">
							' . __('Product Global Identifiers type', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_product][global_ids]" name="rankology_fno_schemas[' . $id . '][rich_snippets_product][global_ids]" placeholder="' . esc_html__('e.g. gtin8', 'wp-rankology') . '" aria-label="' . __('Product Global Identifiers type', 'wp-rankology') . '" value="' . esc_html($check_product_global_ids) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_product_global_ids_value) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_product][global_ids_value]_meta">
							' . __('Product Global Identifiers', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_product][global_ids_value]" name="rankology_fno_schemas[' . $id . '][rich_snippets_product][global_ids_value]" placeholder="' . esc_html__('e.g. 925872', 'wp-rankology') . '" aria-label="' . __('Product Global Identifiers', 'wp-rankology') . '" value="' . esc_html($check_product_global_ids_value) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_product_brand) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_product][brand]_meta">
							' . __('Select a brand', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_product][brand]" name="rankology_fno_schemas[' . $id . '][rich_snippets_product][brand]" placeholder="' . esc_html__('e.g. category', 'wp-rankology') . '" aria-label="' . __('Select a brand', 'wp-rankology') . '" value="' . esc_html($check_product_brand) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_product_price_currency) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_product][currency]_meta">
							' . __('Product currency', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_product][currency]" name="rankology_fno_schemas[' . $id . '][rich_snippets_product][currency]" placeholder="' . esc_html__('e.g. USD, EUR', 'wp-rankology') . '" aria-label="' . __('Product currency', 'wp-rankology') . '" value="' . esc_html($check_product_currency) . '" />
						<span class="description">' . __('Default: USD', 'wp-rankology') . '</span>
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_product_condition) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_product][condition]_meta">
							' . __('Product Condition', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_product][condition]" name="rankology_fno_schemas[' . $id . '][rich_snippets_product][condition]" placeholder="' . esc_html__('e.g. NewCondition, UsedCondition...', 'wp-rankology') . '" aria-label="' . __('Product Condition', 'wp-rankology') . '" value="' . esc_html($check_product_condition) . '" />
						<span class="description">' . __('Default: new', 'wp-rankology') . '</span>
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_product_availability) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_product][availability]_meta">
							' . __('Product Availability', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_product][availability]" name="rankology_fno_schemas[' . $id . '][rich_snippets_product][availability]" placeholder="' . esc_html__('e.g. InStock, InStoreOnly...', 'wp-rankology') . '" aria-label="' . __('Product Availability', 'wp-rankology') . '" value="' . esc_html($check_product_availability) . '" />
						<span class="description">' . __('Default: In Stock', 'wp-rankology') . '</span>
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_product_positive_notes) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_product][positive_notes]_meta">
							' . __('Positive Notes', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_product][positive_notes]" name="rankology_fno_schemas[' . $id . '][rich_snippets_product][positive_notes]" placeholder="' . esc_html__('e.g. Great design', 'wp-rankology') . '" aria-label="' . __('Positive Notes', 'wp-rankology') . '" value="' . esc_html($check_product_pros) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_product_negative_notes) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_product][negative_notes]_meta">
							' . __('Negative Notes', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_product][negative_notes]" name="rankology_fno_schemas[' . $id . '][rich_snippets_product][negative_notes]" placeholder="' . esc_html__('e.g. Too expensive', 'wp-rankology') . '" aria-label="' . __('Negative Notes', 'wp-rankology') . '" value="' . esc_html($check_product_cons) . '" />
					</p>';
            }
        }

        //Service
        if ('services' == $rankology_fno_rich_snippets_type) {
            if ('manual_single' == $rankology_fno_rich_snippets_service_name) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_service][name]_meta">
							' . __('Service name', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_service][name]" name="rankology_fno_schemas[' . $id . '][rich_snippets_service][name]" placeholder="' . esc_html__('The name of your service', 'wp-rankology') . '" aria-label="' . __('Service name', 'wp-rankology') . '" value="' . esc_html($check_service_name) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_service_type) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_service][type]_meta">
							' . __('Service type', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_service][type]" name="rankology_fno_schemas[' . $id . '][rich_snippets_service][type]" placeholder="' . esc_html__('The type of service', 'wp-rankology') . '" aria-label="' . __('Service type', 'wp-rankology') . '" value="' . esc_html($check_service_type) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_service_description) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_service][description]_meta">
							' . __('Service description', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_service][description]" name="rankology_fno_schemas[' . $id . '][rich_snippets_service][description]" placeholder="' . esc_html__('The description of your service', 'wp-rankology') . '" aria-label="' . __('Service description', 'wp-rankology') . '" value="' . esc_html($check_service_description) . '" />
					</p>';
            }
            if ('manual_img_single' == $rankology_fno_rich_snippets_service_img) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_service][img]_meta">
							' . __('Thumbnail', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_service][img]" name="rankology_fno_schemas[' . $id . '][rich_snippets_service][img]" placeholder="' . esc_html__('Select your image', 'wp-rankology') . '" aria-label="' . __('Image', 'wp-rankology') . '" value="' . esc_html($check_service_img) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_service_area) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_service][area]_meta">
							' . __('Area served', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_service][area]" name="rankology_fno_schemas[' . $id . '][rich_snippets_service][area]" placeholder="' . esc_html__('The area served by your service', 'wp-rankology') . '" aria-label="' . __('Area served', 'wp-rankology') . '" value="' . esc_html($check_service_area) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_service_provider_name) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_service][provider_name]_meta">
							' . __('Provider name', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_service][provider_name]" name="rankology_fno_schemas[' . $id . '][rich_snippets_service][provider_name]" placeholder="' . esc_html__('The provider name of your service', 'wp-rankology') . '" aria-label="' . __('Provider name', 'wp-rankology') . '" value="' . esc_html($check_service_provider_name) . '" />
					</p>';
            }
            if ('manual_img_single' == $rankology_fno_rich_snippets_service_lb_img) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_service][lb_img]_meta">
							' . __('Location image', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_service][lb_img]" name="rankology_fno_schemas[' . $id . '][rich_snippets_service][lb_img]" placeholder="' . esc_html__('Select your location image', 'wp-rankology') . '" aria-label="' . __('Location image', 'wp-rankology') . '" value="' . esc_html($check_service_lb_img) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_service_provider_mobility) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_service][provider_mobility]_meta">
							' . __('Provider mobility (static or dynamic)', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_service][provider_mobility]" name="rankology_fno_schemas[' . $id . '][rich_snippets_service][provider_mobility]" placeholder="' . esc_html__('The provider mobility of your service', 'wp-rankology') . '" aria-label="' . __('Provider mobility (static or dynamic)', 'wp-rankology') . '" value="' . esc_html($check_service_provider_mobility) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_service_slogan) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_service][slogan]_meta">
							' . __('Slogan', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_service][slogan]" name="rankology_fno_schemas[' . $id . '][rich_snippets_service][slogan]" placeholder="' . esc_html__('The slogan of your service', 'wp-rankology') . '" aria-label="' . __('Slogan', 'wp-rankology') . '" value="' . esc_html($check_service_slogan) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_service_street_addr) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_service][street_addr]_meta">
							' . __('Street Address', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_service][street_addr]" name="rankology_fno_schemas[' . $id . '][rich_snippets_service][street_addr]" placeholder="' . esc_html__('The street address of your service', 'wp-rankology') . '" aria-label="' . __('Street Address', 'wp-rankology') . '" value="' . esc_html($check_service_street_addr) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_service_city) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_service][city]_meta">
							' . __('City', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_service][city]" name="rankology_fno_schemas[' . $id . '][rich_snippets_service][city]" placeholder="' . esc_html__('The city of your service', 'wp-rankology') . '" aria-label="' . __('City', 'wp-rankology') . '" value="' . esc_html($check_service_city) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_service_state) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_service][state]_meta">
							' . __('State', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_service][state]" name="rankology_fno_schemas[' . $id . '][rich_snippets_service][state]" placeholder="' . esc_html__('The state of your service', 'wp-rankology') . '" aria-label="' . __('State', 'wp-rankology') . '" value="' . esc_html($check_service_state) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_service_pc) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_service][pc]_meta">
							' . __('Postal code', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_service][pc]" name="rankology_fno_schemas[' . $id . '][rich_snippets_service][pc]" placeholder="' . esc_html__('The postal code of your service', 'wp-rankology') . '" aria-label="' . __('Postal code', 'wp-rankology') . '" value="' . esc_html($check_service_pc) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_service_country) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_service][country]_meta">
							' . __('Country', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_service][country]" name="rankology_fno_schemas[' . $id . '][rich_snippets_service][country]" placeholder="' . esc_html__('The country of your service', 'wp-rankology') . '" aria-label="' . __('Country', 'wp-rankology') . '" value="' . esc_html($check_service_country) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_service_lat) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_service][lat]_meta">
							' . __('Latitude', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_service][lat]" name="rankology_fno_schemas[' . $id . '][rich_snippets_service][lat]" placeholder="' . esc_html__('The latitude of your service', 'wp-rankology') . '" aria-label="' . __('Latitude', 'wp-rankology') . '" value="' . esc_html($check_service_lat) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_service_lon) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_service][lon]_meta">
							' . __('Longitude', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_service][lon]" name="rankology_fno_schemas[' . $id . '][rich_snippets_service][lon]" placeholder="' . esc_html__('The longitude of your service', 'wp-rankology') . '" aria-label="' . __('Longitude', 'wp-rankology') . '" value="' . esc_html($check_service_lon) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_service_tel) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_service][tel]_meta">
							' . __('Telephone', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_service][tel]" name="rankology_fno_schemas[' . $id . '][rich_snippets_service][tel]" placeholder="' . esc_html__('The telephone of your service', 'wp-rankology') . '" aria-label="' . __('Telephone', 'wp-rankology') . '" value="' . esc_html($check_service_tel) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_service_price) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_service][price]_meta">
							' . __('Price range', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_service][price]" name="rankology_fno_schemas[' . $id . '][rich_snippets_service][price]" placeholder="' . esc_html__('The price range of your service', 'wp-rankology') . '" aria-label="' . __('Price range', 'wp-rankology') . '" value="' . esc_html($check_service_price) . '" />
					</p>';
            }
        }

        //Software App
        if ('softwareapp' == $rankology_fno_rich_snippets_type) {
            if ('manual_single' == $rankology_fno_rich_snippets_softwareapp_name) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_softwareapp][name]_meta">
							' . __('Software name', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_softwareapp][name]" name="rankology_fno_schemas[' . $id . '][rich_snippets_softwareapp][name]" placeholder="' . esc_html__('The name of your app', 'wp-rankology') . '" aria-label="' . __('App name', 'wp-rankology') . '" value="' . esc_html($check_softwareapp_name) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_softwareapp_os) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_softwareapp][os]_meta">
							' . __('Operating system', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_softwareapp][os]" name="rankology_fno_schemas[' . $id . '][rich_snippets_softwareapp][os]" placeholder="' . esc_html__('The operating system(s) required to use the app', 'wp-rankology') . '" aria-label="' . __('Operating system', 'wp-rankology') . '" value="' . esc_html($check_softwareapp_os) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_softwareapp_cat) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_softwareapp][cat]_meta">
							' . __('Application category', 'wp-rankology') . '</label>
							<select id="rankology_fno_schemas[' . $id . '][rich_snippets_softwareapp][cat]" name="rankology_fno_schemas[' . $id . '][rich_snippets_softwareapp][cat]">
								<option ' . selected('GameApplication', esc_html($check_softwareapp_cat), false) . ' value="GameApplication">' . __('GameApplication', 'wp-rankology') . '</option>
								<option ' . selected('SocialNetworkingApplication', esc_html($check_softwareapp_cat), false) . ' value="SocialNetworkingApplication">' . __('SocialNetworkingApplication', 'wp-rankology') . '</option>
								<option ' . selected('TravelApplication', esc_html($check_softwareapp_cat), false) . ' value="TravelApplication">' . __('TravelApplication', 'wp-rankology') . '</option>
								<option ' . selected('ShoppingApplication', esc_html($check_softwareapp_cat), false) . ' value="ShoppingApplication">' . __('ShoppingApplication', 'wp-rankology') . '</option>
								<option ' . selected('SportsApplication', esc_html($check_softwareapp_cat), false) . ' value="SportsApplication">' . __('SportsApplication', 'wp-rankology') . '</option>
								<option ' . selected('LifestyleApplication', esc_html($check_softwareapp_cat), false) . ' value="LifestyleApplication">' . __('LifestyleApplication', 'wp-rankology') . '</option>
								<option ' . selected('BusinessApplication', esc_html($check_softwareapp_cat), false) . ' value="BusinessApplication">' . __('BusinessApplication', 'wp-rankology') . '</option>
								<option ' . selected('DesignApplication', esc_html($check_softwareapp_cat), false) . ' value="DesignApplication">' . __('DesignApplication', 'wp-rankology') . '</option>
								<option ' . selected('DeveloperApplication', esc_html($check_softwareapp_cat), false) . ' value="DeveloperApplication">' . __('DeveloperApplication', 'wp-rankology') . '</option>
								<option ' . selected('DriverApplication', esc_html($check_softwareapp_cat), false) . ' value="DriverApplication">' . __('DriverApplication', 'wp-rankology') . '</option>
								<option ' . selected('EducationalApplication', esc_html($check_softwareapp_cat), false) . ' value="EducationalApplication">' . __('EducationalApplication', 'wp-rankology') . '</option>
								<option ' . selected('HealthApplication', esc_html($check_softwareapp_cat), false) . ' value="HealthApplication">' . __('HealthApplication', 'wp-rankology') . '</option>
								<option ' . selected('FinanceApplication', esc_html($check_softwareapp_cat), false) . ' value="FinanceApplication">' . __('FinanceApplication', 'wp-rankology') . '</option>
								<option ' . selected('SecurityApplication', esc_html($check_softwareapp_cat), false) . ' value="SecurityApplication">' . __('SecurityApplication', 'wp-rankology') . '</option>
								<option ' . selected('BrowserApplication', esc_html($check_softwareapp_cat), false) . ' value="BrowserApplication">' . __('BrowserApplication', 'wp-rankology') . '</option>
								<option ' . selected('CommunicationApplication', esc_html($check_softwareapp_cat), false) . ' value="CommunicationApplication">' . __('CommunicationApplication', 'wp-rankology') . '</option>
								<option ' . selected('DesktopEnhancementApplication', esc_html($check_softwareapp_cat), false) . ' value="DesktopEnhancementApplication">' . __('DesktopEnhancementApplication', 'wp-rankology') . '</option>
								<option ' . selected('EntertainmentApplication', esc_html($check_softwareapp_cat), false) . ' value="EntertainmentApplication">' . __('EntertainmentApplication', 'wp-rankology') . '</option>
								<option ' . selected('MultimediaApplication', esc_html($check_softwareapp_cat), false) . ' value="MultimediaApplication">' . __('MultimediaApplication', 'wp-rankology') . '</option>
								<option ' . selected('HomeApplication', esc_html($check_softwareapp_cat), false) . ' value="HomeApplication">' . __('HomeApplication', 'wp-rankology') . '</option>
								<option ' . selected('UtilitiesApplication', esc_html($check_softwareapp_cat), false) . ' value="UtilitiesApplication">' . __('UtilitiesApplication', 'wp-rankology') . '</option>
								<option ' . selected('ReferenceApplication', esc_html($check_softwareapp_cat), false) . ' value="ReferenceApplication">' . __('ReferenceApplication', 'wp-rankology') . '</option>
							</select>
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_softwareapp_price) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_softwareapp][price]_meta">
							' . __('Price of your app', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_softwareapp][price]" name="rankology_fno_schemas[' . $id . '][rich_snippets_softwareapp][price]" placeholder="' . esc_html__('The price of your app (set "0" if the app is free of charge)', 'wp-rankology') . '" aria-label="' . __('Price', 'wp-rankology') . '" value="' . esc_html($check_softwareapp_price) . '" />
					</p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_softwareapp_currency) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_softwareapp][currency]_meta">
							' . __('Currency', 'wp-rankology') . '</label>
						<input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_softwareapp][currency]" name="rankology_fno_schemas[' . $id . '][rich_snippets_softwareapp][currency]" placeholder="' . esc_html__('Currency', 'wp-rankology') . '" aria-label="' . __('Currency', 'wp-rankology') . '" value="' . esc_html($check_softwareapp_currency) . '" />
					</p>';
            }
            if ('manual_rating_single' == $rankology_fno_rich_snippets_softwareapp_rating) {
                echo '<p>
                <label for="rankology_fno_schemas[' . $id . '][rich_snippets_softwareapp][rating]_meta">
                ' . __('Your rating', 'wp-rankology') . '</label>
                <input type="number" step="0.1" min="1" id="rankology_fno_schemas[' . $id . '][rich_snippets_softwareapp][rating]" name="rankology_fno_schemas[' . $id . '][rich_snippets_softwareapp][rating]" placeholder="' . esc_html__('The item rating', 'wp-rankology') . '" aria-label="' . __('Your rating', 'wp-rankology') . '" value="' . esc_attr($check_softwareapp_rating) . '" />
                </p>';
            }
            if ('manual_rating_single' == $rankology_fno_rich_snippets_softwareapp_max_rating) {
                echo '<p>
                <label for="rankology_fno_schemas[' . $id . '][rich_snippets_softwareapp][max_rating]_meta">
                ' . __('Max best rating', 'wp-rankology') . '</label>
                <input type="number" step="0.1" min="1" id="rankology_fno_schemas[' . $id . '][rich_snippets_softwareapp][max_rating]" name="rankology_fno_schemas[' . $id . '][rich_snippets_softwareapp][max_rating]" placeholder="' . esc_html__('Max best rating', 'wp-rankology') . '" aria-label="' . __('Max best rating', 'wp-rankology') . '" value="' . esc_attr($check_softwareapp_max_rating) . '" />
                </p>';
            }
        }

        //Review
        if ('review' == $rankology_fno_rich_snippets_type) {
            if ('manual_single' == $rankology_fno_rich_snippets_review_item) {
                echo '<p>
                <label for="rankology_fno_schemas[' . $id . '][rich_snippets_review][item]_meta">
                ' . __('Review item name', 'wp-rankology') . '</label>
                <input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_review][item]" name="rankology_fno_schemas[' . $id . '][rich_snippets_review][item]" placeholder="' . esc_html__('The item name reviewed', 'wp-rankology') . '" aria-label="' . __('Review item name', 'wp-rankology') . '" value="' . esc_html($check_review_item) . '" />
                </p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_review_item_type) {
                echo '<p>
                <label for="rankology_fno_schemas[' . $id . '][rich_snippets_review][item_type]_meta">
                ' . __('Review item type', 'wp-rankology') . '</label>
                <select id="rankology_fno_schemas[' . $id . '][rich_snippets_review][item_type]" name="rankology_fno_schemas[' . $id . '][rich_snippets_review][item_type]">
                <option ' . selected('CreativeWorkSeason', esc_html($check_review_item_type), false) . ' value="CreativeWorkSeason">' . __('CreativeWorkSeason', 'wp-rankology') . '</option>
                <option ' . selected('CreativeWorkSeries', esc_html($check_review_item_type), false) . ' value="CreativeWorkSeries">' . __('CreativeWorkSeries', 'wp-rankology') . '</option>
                <option ' . selected('Episode', esc_html($check_review_item_type), false) . ' value="Episode">' . __('Episode', 'wp-rankology') . '</option>
                <option ' . selected('Game', esc_html($check_review_item_type), false) . ' value="Game">' . __('Game', 'wp-rankology') . '</option>
                <option ' . selected('MediaObject', esc_html($check_review_item_type), false) . ' value="MediaObject">' . __('MediaObject', 'wp-rankology') . '</option>
                <option ' . selected('MusicPlaylist', esc_html($check_review_item_type), false) . ' value="MusicPlaylist">' . __('MusicPlaylist', 'wp-rankology') . '</option>
                <option ' . selected('MusicRecording', esc_html($check_review_item_type), false) . ' value="MusicRecording">' . __('MusicRecording', 'wp-rankology') . '</option>
                <option ' . selected('Organization', esc_html($check_review_item_type), false) . ' value="Organization">' . __('Organization', 'wp-rankology') . '</option>
                </select>
                </p>';
            }
            if ('manual_img_single' == $rankology_fno_rich_snippets_review_img) {
                echo '<p>
                <label for="rankology_fno_schemas[' . $id . '][rich_snippets_review][img]_meta">
                ' . __('Review item image', 'wp-rankology') . '</label>
                <input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_review][img]" name="rankology_fno_schemas[' . $id . '][rich_snippets_review][img]" placeholder="' . esc_html__('Select your image', 'wp-rankology') . '" aria-label="' . __('Review item image', 'wp-rankology') . '" value="' . esc_html($check_review_img) . '" />
                </p>';
            }
            if ('manual_rating_single' == $rankology_fno_rich_snippets_review_rating) {
                echo '<p>
                <label for="rankology_fno_schemas[' . $id . '][rich_snippets_review][rating]_meta">
                ' . __('Your rating', 'wp-rankology') . '</label>
                <input type="number" step="0.1" min="1" id="rankology_fno_schemas[' . $id . '][rich_snippets_review][rating]" name="rankology_fno_schemas[' . $id . '][rich_snippets_review][rating]" placeholder="' . esc_html__('The item rating', 'wp-rankology') . '" aria-label="' . __('Your rating', 'wp-rankology') . '" value="' . esc_attr($check_review_rating) . '" />
                </p>';
            }
            if ('manual_rating_single' == $rankology_fno_rich_snippets_review_max_rating) {
                echo '<p>
                <label for="rankology_fno_schemas[' . $id . '][rich_snippets_review][max_rating]_meta">
                ' . __('Max best rating', 'wp-rankology') . '</label>
                <input type="number" step="0.1" min="1" id="rankology_fno_schemas[' . $id . '][rich_snippets_review][max_rating]" name="rankology_fno_schemas[' . $id . '][rich_snippets_review][max_rating]" placeholder="' . esc_html__('Max best rating', 'wp-rankology') . '" aria-label="' . __('Max best rating', 'wp-rankology') . '" value="' . esc_attr($check_review_max_rating) . '" />
                </p>';
            }
            if ('manual_single' == $rankology_fno_rich_snippets_review_body) {
                echo '<p>
                        <label for="rankology_fno_schemas[' . $id . '][rich_snippets_review][body]_meta">
                            ' . __('Review body', 'wp-rankology') . '</label>
                        <input type="text" id="rankology_fno_schemas[' . $id . '][rich_snippets_review][body]" name="rankology_fno_schemas[' . $id . '][rich_snippets_review][body]" placeholder="' . esc_html__('Review body', 'wp-rankology') . '" aria-label="' . __('Your review body', 'wp-rankology') . '" value="' . esc_html($check_review_body) . '" />
                    </p>';
            }
        }

        //Custom
        if ('custom' == $rankology_fno_rich_snippets_type) {
            if ('manual_custom_single' == $rankology_fno_rich_snippets_custom) {
                echo '<p>
						<label for="rankology_fno_schemas[' . $id . '][rich_snippets_custom][custom]_meta">
							' . __('Custom schema', 'wp-rankology') . '</label>
						<textarea rows="25" id="rankology_fno_schemas[' . $id . '][rich_snippets_custom][custom]" name="rankology_fno_schemas[' . $id . '][rich_snippets_custom][custom]" placeholder="' . esc_html__('e.g. <script type="application/ld+json">{
							"@context": "https://schema.org/",
							"@type": "Review",
							"itemReviewed": {
							  "@type": "Restaurant",
							  "image": "http://www.example.com/seafood-restaurant.jpg",
							  "name": "Legal Seafood",
							  "servesCuisine": "Seafood",
							  "telephone": "1234567",
							  "address" :{
								"@type": "PostalAddress",
								"streetAddress": "123 William St",
								"addressLocality": "New York",
								"addressRegion": "NY",
								"postalCode": "10038",
								"addressCountry": "US"
							  }
							},
							"reviewRating": {
							  "@type": "Rating",
							  "ratingValue": "4"
							},
							"name": "A good seafood place.",
							"author": {
							  "@type": "Person",
							  "name": "Bob Smith"
							},
							"reviewBody": "The seafood is great.",
							"publisher": {
							  "@type": "Organization",
							  "name": "Washington Times"
							}
						  }</script>', 'wp-rankology') . '" aria-label="' . __('Custom schema', 'wp-rankology') . '" value="' . esc_html($check_custom) . '">' . htmlspecialchars($check_custom) . '</textarea>
					</p>';
            }
        }
    }
} else { ?>
<div class="rankology-notice">
    <p>
        <?php esc_html_e('No automatic schema created for this content.', 'wp-rankology'); ?>
    </p>

    <p>
        <a class="<?php echo rankology_btn_secondary_classes(); ?>"
            href="<?php echo admin_url('post-new.php?post_type=rankology_schemas'); ?>">
            <?php esc_html_e('Add a schema', 'wp-rankology'); ?>
        </a>
    </p>
</div>
<?php
}
