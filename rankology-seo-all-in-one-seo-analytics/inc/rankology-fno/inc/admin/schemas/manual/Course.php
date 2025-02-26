<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

function rankology_get_schema_metaboxe_course($rankology_fno_rich_snippets_data, $key_schema = 0) {
    $rankology_fno_rich_snippets_courses_title   = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_courses_title']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_courses_title'] : '';
    $rankology_fno_rich_snippets_courses_desc    = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_courses_desc']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_courses_desc'] : '';
    $rankology_fno_rich_snippets_courses_school  = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_courses_school']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_courses_school'] : '';
    $rankology_fno_rich_snippets_courses_website = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_courses_website']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_courses_website'] : ''; ?>
<div class="wrap-rich-snippets-item wrap-rich-snippets-courses">
    <div class="rankology-notice">
        <p>
            <?php esc_html_e('Mark up your course lists with structured data so prospective students find you through Google Search.', 'wp-rankology'); ?>
        </p>
    </div>
    <div class="rankology-notice is-warning">
        <ul class="rankology-list advice">
            <li><?php esc_html_e('Only use course markup for educational content that fits the following definition of a course: A series or unit of curriculum that contains lectures, lessons, or modules in a particular subject and/or topic.', 'wp-rankology'); ?>
            </li>
            <li><?php esc_html_e('A course must have an explicit educational outcome of knowledge and/or skill in a particular subject and/or topic, and be led by one or more instructors with a roster of students.', 'wp-rankology'); ?>
            </li>
            <li><?php esc_html_e('A general public event such as "Astronomy Day" is not a course, and a single 2-minute "How to make a Sandwich Video" is not a course.', 'wp-rankology'); ?>
            </li>
        </ul>
    </div>
    <p>
        <label for="rankology_fno_rich_snippets_courses_title_meta">
            <?php esc_html_e('Title', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_courses_title_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_courses_title]"
            placeholder="<?php echo esc_html__('The title of your lesson, course...', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Title', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_courses_title; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_courses_desc">
            <?php esc_html_e('Course description', 'wp-rankology'); ?>
        </label>
        <textarea id="rankology_fno_rich_snippets_courses_desc" class="rankology_fno_rich_snippets_courses_desc"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_courses_desc]"
            placeholder="<?php echo esc_html__('Enter your course/lesson description', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Course description', 'wp-rankology'); ?>"><?php echo $rankology_fno_rich_snippets_courses_desc; ?></textarea>
    <div class="wrap-rankology-counters">
        <div class="rankology_rich_snippets_courses_counters"></div>
        <?php esc_html_e('(maximum limit)', 'wp-rankology'); ?>
    </div>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_courses_school_meta">
            <?php esc_html_e('School/Organization', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_courses_school_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_courses_school]"
            placeholder="<?php echo esc_html__('Name of university, organization...', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('School/Organization', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_courses_school; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_courses_website_meta">
            <?php esc_html_e('School/Organization Website', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_courses_website_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_courses_website]"
            placeholder="<?php echo esc_html__('Enter the URL like https://example.com/', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('School/Organization Website', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_courses_website; ?>" />
    </p>
</div>
<?php
}
