<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

function rankology_get_schema_metaboxe_jobs($rankology_fno_rich_snippets_data, $key_schema = 0) {
    $rankology_fno_rich_snippets_jobs_name                           = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_jobs_name']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_jobs_name'] : '';
    $rankology_fno_rich_snippets_jobs_desc                           = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_jobs_desc']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_jobs_desc'] : '';
    $rankology_fno_rich_snippets_jobs_date_posted                    = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_jobs_date_posted']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_jobs_date_posted'] : '';
    $rankology_fno_rich_snippets_jobs_valid_through                  = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_jobs_valid_through']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_jobs_valid_through'] : '';
    $rankology_fno_rich_snippets_jobs_employment_type                = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_jobs_employment_type']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_jobs_employment_type'] : '';
    $rankology_fno_rich_snippets_jobs_identifier_name                = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_jobs_identifier_name']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_jobs_identifier_name'] : '';
    $rankology_fno_rich_snippets_jobs_identifier_value               = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_jobs_identifier_value']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_jobs_identifier_value'] : '';
    $rankology_fno_rich_snippets_jobs_hiring_organization            = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_jobs_hiring_organization']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_jobs_hiring_organization'] : '';
    $rankology_fno_rich_snippets_jobs_hiring_same_as                 = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_jobs_hiring_same_as']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_jobs_hiring_same_as'] : '';
    $rankology_fno_rich_snippets_jobs_hiring_logo                    = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_jobs_hiring_logo']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_jobs_hiring_logo'] : '';
    $rankology_fno_rich_snippets_jobs_hiring_logo_width              = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_jobs_hiring_logo_width']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_jobs_hiring_logo_width'] : '';
    $rankology_fno_rich_snippets_jobs_hiring_logo_height             = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_jobs_hiring_logo_height']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_jobs_hiring_logo_height'] : '';
    $rankology_fno_rich_snippets_jobs_address_street                 = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_jobs_address_street']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_jobs_address_street'] : '';
    $rankology_fno_rich_snippets_jobs_address_locality               = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_jobs_address_locality']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_jobs_address_locality'] : '';
    $rankology_fno_rich_snippets_jobs_address_region                 = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_jobs_address_region']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_jobs_address_region'] : '';
    $rankology_fno_rich_snippets_jobs_postal_code                    = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_jobs_postal_code']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_jobs_postal_code'] : '';
    $rankology_fno_rich_snippets_jobs_country                        = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_jobs_country']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_jobs_country'] : '';
    $rankology_fno_rich_snippets_jobs_remote                         = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_jobs_remote']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_jobs_remote'] : '';
    $rankology_fno_rich_snippets_jobs_direct_apply                   = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_jobs_direct_apply']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_jobs_direct_apply'] : '';
    $rankology_fno_rich_snippets_jobs_salary                         = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_jobs_salary']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_jobs_salary'] : '';
    $rankology_fno_rich_snippets_jobs_salary_currency                = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_jobs_salary_currency']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_jobs_salary_currency'] : '';
    $rankology_fno_rich_snippets_jobs_salary_unit                    = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_jobs_salary_unit']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_jobs_salary_unit'] : '';
    $rankology_fno_rich_snippets_jobs_location_requirement           = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_jobs_location_requirement']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_jobs_location_requirement'] : ''; ?>
<div class="wrap-rich-snippets-item wrap-rich-snippets-jobs">
    <div class="rankology-notice">
        <p>
            <?php esc_html_e('Adding structured data makes your job postings eligible to appear in a special user experience in Google Search results.', 'wp-rankology'); ?>
        </p>
    </div>
    <p>
        <label for="rankology_fno_rich_snippets_jobs_name_meta">
            <?php esc_html_e('Job title', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_jobs_name_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_jobs_name]"
            placeholder="<?php echo esc_html__('The title of the job (not the title of the posting). For example, "Software Engineer" or "Barista".', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Job title', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_jobs_name; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_jobs_desc_meta">
            <?php esc_html_e('Job description', 'wp-rankology'); ?>
        </label>
        <textarea rows="12" id="rankology_fno_rich_snippets_jobs_desc_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_jobs_desc]"
            placeholder="<?php echo esc_html__('The full description of the job in HTML format.', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Job description', 'wp-rankology'); ?>"><?php echo $rankology_fno_rich_snippets_jobs_desc; ?></textarea>
    </p>
    <p>
        <label for="rankology-date-picker4">
            <?php esc_html_e('Published date', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology-date-picker4" class="rankology-date-picker" autocomplete="off"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_jobs_date_posted]"
            placeholder="<?php echo esc_html__('The original date that employer posted the job in ISO 8601 format. For example, "2017-01-24" or "2017-01-24T19:33:17+00:00".', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Published date', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_jobs_date_posted; ?>" />
    </p>
    <p>
        <label for="rankology-date-picker5">
            <?php esc_html_e('Expiration date', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology-date-picker5" class="rankology-date-picker" autocomplete="off"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_jobs_valid_through]"
            placeholder="<?php echo esc_html__('The date when the job posting will expire in ISO 8601 format. For example, "2017-02-24" or "2017-02-24T19:33:17+00:00".', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Expiration date', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_jobs_valid_through; ?>" />
    </p>
    <p class="rankology_fno_rich_snippets_jobs_employment_type_p">
        <label for="rankology_fno_rich_snippets_jobs_employment_type_meta">
            <?php esc_html_e('Type of employment', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_jobs_employment_type_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_jobs_employment_type]"
            class="rankology_fno_rich_snippets_jobs_employment_type"
            placeholder="<?php echo esc_html__('Type of employment, You can include more than one employmentType property.', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Type of employment', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_jobs_employment_type; ?>" />

        <span class="wrap-tags">
            <?php
            $employment_type = [
                'FULL_TIME'  => 'FULL TIME',
                'PART_TIME'  => 'PART TIME',
                'CONTRACTOR' => 'CONTRACTOR',
                'TEMPORARY'  => 'TEMPORARY',
                'INTERN'     => 'INTERN',
                'VOLUNTEER'  => 'VOLUNTEER',
                'PER_DIEM'   => 'PER_DIEM',
                'OTHER'      => 'OTHER',
            ];
    $i = 1;
    foreach ($employment_type as $key => $value) { ?>
            <button type="button" class="<?php echo rankology_btn_secondary_classes(); ?> tag-title" id="rankology-tag-employment-<?php echo $i; ?>"
                data-tag="<?php echo $key; ?>"><span
                    class="dashicons dashicons-tag"></span><?php echo $value; ?></button>
            <?php
                ++$i;
            } ?>
        </span>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_jobs_identifier_name_meta">
            <?php esc_html_e('Identifier name', 'wp-rankology'); ?></label>
        <input type="text" id="rankology_fno_rich_snippets_jobs_identifier_name_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_jobs_identifier_name]"
            placeholder="<?php echo esc_html__('The hiring organization\'s unique identifier name for the job', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Identifier name', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_jobs_identifier_name; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_jobs_identifier_value_meta">
            <?php esc_html_e('Identifier value', 'wp-rankology'); ?></label>
        <input type="number" id="rankology_fno_rich_snippets_jobs_identifier_value_meta" min="0"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_jobs_identifier_value]"
            placeholder="<?php echo esc_html__('The hiring organization\'s value identifier value for the job', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Identifier value', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_jobs_identifier_value; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_jobs_hiring_organization_meta">
            <?php esc_html_e('Organization that hires', 'wp-rankology'); ?>
        </label>
        <span class="description"><?php esc_html_e('Default: Organization name from your Knowledge Graph (SEO > Social Platforms > Knowledge Graph)', 'wp-rankology'); ?></span>
        <input type="text" id="rankology_fno_rich_snippets_jobs_hiring_organization_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_jobs_hiring_organization]"
            placeholder="<?php echo esc_html__('The organization offering the job position. This should be the name of the company.', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Organization that hires', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_jobs_hiring_organization; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_jobs_hiring_same_as_meta">
            <?php esc_html_e('Organization website', 'wp-rankology'); ?>
        </label>
        <span class="description"><?php esc_html_e('Default: URL of your site', 'wp-rankology'); ?></span>
        <input type="text" id="rankology_fno_rich_snippets_jobs_hiring_same_as_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_jobs_hiring_same_as]"
            placeholder="<?php echo esc_html__('The organization website URL offering the job position.', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Organization URL', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_jobs_hiring_same_as; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_jobs_hiring_logo_meta">
            <?php esc_html_e('Organization logo', 'wp-rankology'); ?>
        </label>
        <span class="description"><?php esc_html_e('Default: Logo from your Knowledge Graph (SEO > Social Platforms > Knowledge Graph)', 'wp-rankology'); ?>
        </span>
        <input id="rankology_fno_rich_snippets_jobs_hiring_logo_meta" type="text"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_jobs_hiring_logo]"
            placeholder="<?php echo esc_html__('Select your image', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Organization logo', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_jobs_hiring_logo; ?>" />
        <input id="rankology_fno_rich_snippets_jobs_hiring_logo_width" type="hidden"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_jobs_hiring_logo_width]"
            value="<?php ?>" />
        <input id="rankology_fno_rich_snippets_jobs_hiring_logo_height" type="hidden"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_jobs_hiring_logo_height]"
            value="<?php ?>" />
        <input id="rankology_fno_rich_snippets_jobs_hiring_logo"
            class="<?php echo rankology_btn_secondary_classes(); ?> rankology_media_upload" type="button"
            value="<?php esc_html_e('Upload an Image', 'wp-rankology'); ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_jobs_address_street_meta">
            <?php esc_html_e('Street address', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_jobs_address_street_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_jobs_address_street]"
            placeholder="<?php echo esc_html__('Street address', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Street address', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_jobs_address_street; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_jobs_address_locality_meta">
            <?php esc_html_e('Locality address', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_jobs_address_locality_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_jobs_address_locality]"
            placeholder="<?php echo esc_html__('Locality address', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Locality address', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_jobs_address_locality; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_jobs_address_region_meta">
            <?php esc_html_e('Region', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_jobs_address_region_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_jobs_address_region]"
            placeholder="<?php echo esc_html__('Region', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Region', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_jobs_address_region; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_jobs_postal_code_meta">
            <?php esc_html_e('Postal code', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_jobs_postal_code_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_jobs_postal_code]"
            placeholder="<?php echo esc_html__('Postal code', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Postal code', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_jobs_postal_code; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_jobs_country_meta">
            <?php esc_html_e('Country', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_jobs_country_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_jobs_country]"
            placeholder="<?php echo esc_html__('Country', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Country', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_jobs_country; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_jobs_remote_meta">
            <input type="checkbox" id="rankology_fno_rich_snippets_jobs_remote_meta"
                name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_jobs_remote]"
                aria-label="<?php esc_html_e('Remote job', 'wp-rankology'); ?>"
                <?php if ('1' == $rankology_fno_rich_snippets_jobs_remote) {
                echo 'checked="yes"';
            } ?>
            value="1"
            />
            <?php esc_html_e('Remote job?', 'wp-rankology'); ?>
        </label>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_jobs_location_requirement_meta">
            <?php esc_html_e('Location requirement for remote job', 'wp-rankology'); ?>
        </label>

        <input type="text" id="rankology_fno_rich_snippets_jobs_location_requirement_meta"
        name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_jobs_location_requirement]"
        placeholder="<?php echo esc_html__('e.g. France', 'wp-rankology'); ?>"
        aria-label="<?php esc_html_e('e.g. France', 'wp-rankology'); ?>"
        value="<?php echo $rankology_fno_rich_snippets_jobs_location_requirement; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_jobs_direct_apply_meta">
            <input type="checkbox" id="rankology_fno_rich_snippets_jobs_direct_apply_meta"
                name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_jobs_direct_apply]"
                aria-label="<?php esc_html_e('Direct apply', 'wp-rankology'); ?>"
                <?php if ('1' == $rankology_fno_rich_snippets_jobs_direct_apply) {
                echo 'checked="yes"';
            } ?>
            value="1"
            />
            <?php esc_html_e('Direct apply?', 'wp-rankology'); ?>
        </label>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_jobs_salary_meta">
            <?php esc_html_e('Salary', 'wp-rankology'); ?>
        </label>
        <input type="number" id="rankology_fno_rich_snippets_jobs_salary_meta" step="0.01" min="0"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_jobs_salary]"
            placeholder="<?php echo esc_html__('e.g. 50.00', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Currency', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_jobs_salary; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_jobs_salary_currency_meta">
            <?php esc_html_e('Currency', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_jobs_salary_currency_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_jobs_salary_currency]"
            placeholder="<?php echo esc_html__('e.g. USD', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Currency', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_jobs_salary_currency; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_jobs_salary_unit_meta">
            <?php esc_html_e('Select your unit text', 'wp-rankology'); ?>
        </label>
        <select id="rankology_fno_rich_snippets_jobs_salary_unit_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_jobs_salary_unit]">
            <option <?php selected('HOUR', $rankology_fno_rich_snippets_jobs_salary_unit); ?>
                value="HOUR">
                <?php esc_html_e('HOUR', 'wp-rankology'); ?>
            </option>
            <option <?php selected('DAY', $rankology_fno_rich_snippets_jobs_salary_unit); ?>
                value="DAY">
                <?php esc_html_e('DAY', 'wp-rankology'); ?>
            </option>
            <option <?php selected('WEEK', $rankology_fno_rich_snippets_jobs_salary_unit); ?>
                value="WEEK">
                <?php esc_html_e('WEEK', 'wp-rankology'); ?>
            </option>
            <option <?php selected('MONTH', $rankology_fno_rich_snippets_jobs_salary_unit); ?>
                value="MONTH">
                <?php esc_html_e('MONTH', 'wp-rankology'); ?>
            </option>
            <option <?php selected('YEAR', $rankology_fno_rich_snippets_jobs_salary_unit); ?>
                value="YEAR">
                <?php esc_html_e('YEAR', 'wp-rankology'); ?>
            </option>
        </select>
    </p>
</div>
<?php
}
