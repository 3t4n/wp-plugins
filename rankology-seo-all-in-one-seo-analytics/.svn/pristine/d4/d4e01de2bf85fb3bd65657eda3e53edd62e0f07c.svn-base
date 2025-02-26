<?php

namespace RankologyFno\Services\Forms\Schemas;

defined('ABSPATH') || exit;

use RankologyFno\Core\FormApi;

class FormSchemaJob extends FormApi {
    protected function getTypeByField($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_jobs_desc':
                return 'textarea';
            case '_rankology_fno_rich_snippets_jobs_hiring_logo':
                return 'upload';
            case '_rankology_fno_rich_snippets_jobs_remote':
                return 'checkbox';
            case '_rankology_fno_rich_snippets_jobs_direct_apply':
                return 'checkbox';
            case '_rankology_fno_rich_snippets_jobs_salary':
                return 'number';
            case '_rankology_fno_rich_snippets_jobs_date_posted':
            case '_rankology_fno_rich_snippets_jobs_valid_through':
                return 'date';
            case '_rankology_fno_rich_snippets_jobs_name':
            case '_rankology_fno_rich_snippets_jobs_employment_type':
            case '_rankology_fno_rich_snippets_jobs_identifier_name':
            case '_rankology_fno_rich_snippets_jobs_identifier_value':
            case '_rankology_fno_rich_snippets_jobs_hiring_organization':
            case '_rankology_fno_rich_snippets_jobs_hiring_same_as':
            case '_rankology_fno_rich_snippets_jobs_address_street':
            case '_rankology_fno_rich_snippets_jobs_address_locality':
            case '_rankology_fno_rich_snippets_jobs_address_region':
            case '_rankology_fno_rich_snippets_jobs_postal_code':
            case '_rankology_fno_rich_snippets_jobs_country':
            case '_rankology_fno_rich_snippets_jobs_salary_currency':
            case '_rankology_fno_rich_snippets_jobs_location_requirement':
                return 'input';
            case '_rankology_fno_rich_snippets_jobs_salary_unit':
                return 'select';
        }
    }

    protected function getLabelByField($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_jobs_name':
                return __('Job title', 'wp-rankology');
            case '_rankology_fno_rich_snippets_jobs_desc':
                return __('Job description', 'wp-rankology');
            case '_rankology_fno_rich_snippets_jobs_date_posted':
                return __('Published date', 'wp-rankology');
            case '_rankology_fno_rich_snippets_jobs_valid_through':
                return __('Expiration date', 'wp-rankology');
            case '_rankology_fno_rich_snippets_jobs_employment_type':
                return __('Type of employment', 'wp-rankology');
            case '_rankology_fno_rich_snippets_jobs_identifier_name':
                return __('Identifier name', 'wp-rankology');
            case '_rankology_fno_rich_snippets_jobs_identifier_value':
                return __('Identifier value', 'wp-rankology');
            case '_rankology_fno_rich_snippets_jobs_hiring_organization':
                return __('Organization that hires', 'wp-rankology');
            case '_rankology_fno_rich_snippets_jobs_hiring_same_as':
                return __('Organization website', 'wp-rankology');
            case '_rankology_fno_rich_snippets_jobs_hiring_logo':
                return __('Organization logo', 'wp-rankology');
            case '_rankology_fno_rich_snippets_jobs_address_street':
                return __('Street address', 'wp-rankology');
            case '_rankology_fno_rich_snippets_jobs_address_locality':
                return __('Locality address', 'wp-rankology');
            case '_rankology_fno_rich_snippets_jobs_address_region':
                return __('Region', 'wp-rankology');
            case '_rankology_fno_rich_snippets_jobs_postal_code':
                return __('Postal code', 'wp-rankology');
            case '_rankology_fno_rich_snippets_jobs_country':
                return __('Country', 'wp-rankology');
            case '_rankology_fno_rich_snippets_jobs_remote':
                return __('Remote job', 'wp-rankology');
            case '_rankology_fno_rich_snippets_jobs_direct_apply':
                return __('Direct apply', 'wp-rankology');
            case '_rankology_fno_rich_snippets_jobs_salary':
                return __('Salary', 'wp-rankology');
            case '_rankology_fno_rich_snippets_jobs_salary_currency':
                return __('Currency', 'wp-rankology');
            case '_rankology_fno_rich_snippets_jobs_salary_unit':
                return __('Select your unit text', 'wp-rankology');
            case '_rankology_fno_rich_snippets_jobs_location_requirement':
                return __('Location requirement for remote job', 'wp-rankology');
        }
    }

    protected function getPlaceholderByField($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_jobs_name':
                return __('The title of the job (not the title of the posting). For example, "Software Engineer" or "Barista".', 'wp-rankology');
            case '_rankology_fno_rich_snippets_jobs_desc':
                return __('The full description of the job in HTML format.', 'wp-rankology');
            case '_rankology_fno_rich_snippets_jobs_date_posted':
            case '_rankology_fno_rich_snippets_jobs_valid_through':
                return __('The original date that employer posted the job in ISO 8601 format. For example, "2017-01-24" or "2017-01-24T19:33:17+00:00".', 'wp-rankology');
            case '_rankology_fno_rich_snippets_jobs_valid_through':
                return __('The date when the job posting will expire in ISO 8601 format. For example, "2017-02-24" or "2017-02-24T19:33:17+00:00".', 'wp-rankology');
            case '_rankology_fno_rich_snippets_jobs_employment_type':
                return __('Type of employment, You can include more than one employmentType property.', 'wp-rankology');
            case '_rankology_fno_rich_snippets_jobs_identifier_name':
                return __("The hiring organization's unique identifier name for the job", 'wp-rankology');
            case '_rankology_fno_rich_snippets_jobs_identifier_value':
                return __("The hiring organization's value identifier value for the job", 'wp-rankology');
            case '_rankology_fno_rich_snippets_jobs_hiring_organization':
                return __('The organization offering the job position. This should be the name of the company.', 'wp-rankology');
            case '_rankology_fno_rich_snippets_jobs_hiring_same_as':
                return __('The organization website URL offering the job position.', 'wp-rankology');
            case '_rankology_fno_rich_snippets_jobs_hiring_logo':
                return __('Select your image', 'wp-rankology');
            case '_rankology_fno_rich_snippets_jobs_address_street':
                return __('Street address', 'wp-rankology');
            case '_rankology_fno_rich_snippets_jobs_address_locality':
                return __('Locality address', 'wp-rankology');
            case '_rankology_fno_rich_snippets_jobs_address_region':
                return __('Region', 'wp-rankology');
            case '_rankology_fno_rich_snippets_jobs_postal_code':
                return __('Postal code', 'wp-rankology');
            case '_rankology_fno_rich_snippets_jobs_country':
                return __('Country', 'wp-rankology');
            case '_rankology_fno_rich_snippets_jobs_direct_apply':
                /* translators: do not translate expected values, true / false  */
                return __('Indicates whether the URL that\'s associated with this job posting enables direct application for the job. Expected value: "true" or "false".', 'wp-rankology');
            case '_rankology_fno_rich_snippets_jobs_salary':
                return __('e.g. 50.00', 'wp-rankology');
            case '_rankology_fno_rich_snippets_jobs_salary_currency':
                return __('e.g. USD', 'wp-rankology');
            case '_rankology_fno_rich_snippets_jobs_location_requirement':
                return __('e.g. France', 'wp-rankology');
        }
    }

    protected function getDescriptionByField($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_jobs_hiring_organization':
                return __('Default: Organization name from your Knowledge Graph (SEO > Social Platforms > Knowledge Graph)', 'wp-rankology');
            case '_rankology_fno_rich_snippets_jobs_hiring_same_as':
                return __('Default: URL of your site', 'wp-rankology');
            case '_rankology_fno_rich_snippets_jobs_hiring_logo':
                return __('Default: Logo from your Knowledge Graph (SEO > Social Platforms > Knowledge Graph)', 'wp-rankology');
        }
    }

    protected function getOptions($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_jobs_salary_unit':
                return [
                    ['value' => 'HOUR', 'label' => __('HOUR', 'wp-rankology')],
                    ['value' => 'DAY', 'label' => __('DAY', 'wp-rankology')],
                    ['value' => 'WEEK', 'label' => __('WEEK', 'wp-rankology')],
                    ['value' => 'MONTH', 'label' => __('MONTH', 'wp-rankology')],
                    ['value' => 'YEAR', 'label' => __('YEAR', 'wp-rankology')],
                ];
        }
    }

    protected function getDetails($postId = null) {
        return [
            [
                'key' => '_rankology_fno_rich_snippets_jobs_name',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_jobs_desc',
                'class' => 'rankology-textarea-high-size'
            ],
            [
                'key' => '_rankology_fno_rich_snippets_jobs_date_posted',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_jobs_valid_through',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_jobs_employment_type',
                'options' => [
                    'separator' => ',',
                    'quick_buttons' => [
                        [
                            "value" => "FULL_TIME",
                            "label" => "FULL TIME",
                        ],
                        [
                            "value" => "PART_TIME",
                            "label" => "PART TIME",
                        ],[
                            "value" => "CONTRACTOR",
                            "label" => "CONTRACTOR",
                        ],[
                            "value" => "TEMPORARY",
                            "label" => "TEMPORARY",
                        ],[
                            "value" => "INTERN",
                            "label" => "INTERN",
                        ],[
                            "value" => "VOLUNTEER",
                            "label" => "VOLUNTEER",
                        ],[
                            "value" => "PER_DIEM",
                            "label" => "PER DIEM",
                        ],[
                            "value" => "OTHER",
                            "label" => "OTHER",
                        ]
                    ]
                ]
            ],
            [
                'key' => '_rankology_fno_rich_snippets_jobs_identifier_name',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_jobs_identifier_value',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_jobs_hiring_organization',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_jobs_hiring_same_as',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_jobs_hiring_logo',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_jobs_hiring_logo_width',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_jobs_hiring_logo_height',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_jobs_address_street',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_jobs_address_locality',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_jobs_address_region',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_jobs_postal_code',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_jobs_country',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_jobs_remote',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_jobs_location_requirement',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_jobs_direct_apply',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_jobs_salary',
                'min' => 1,
            ],
            [
                'key' => '_rankology_fno_rich_snippets_jobs_salary_currency',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_jobs_salary_unit',
                'value' => 'HOUR'
            ],

        ];
    }
}
