<?php

namespace RankologyFno\JsonSchemas;

if ( ! defined('ABSPATH')) {
    exit;
}

use Rankology\Helpers\RichSnippetType;
use Rankology\JsonSchemas\Organization;
use Rankology\Models\GetJsonData;
use RankologyFno\Models\JsonSchemaValue;

class Job extends JsonSchemaValue implements GetJsonData {
    const NAME = 'job';

    const ALIAS = ['jobs'];

    protected function getName() {
        return self::NAME;
    }

    /**
     * 
     *
     * @return array
     *
     * @param array $schemaManual
     */
    protected function getVariablesForManualSnippet($schemaManual) {
        $keys = [
            'jobType'            => '_rankology_fno_rich_snippets_type',
            'title'              => '_rankology_fno_rich_snippets_jobs_name',
            'description'        => '_rankology_fno_rich_snippets_jobs_desc',
            'datePosted'         => '_rankology_fno_rich_snippets_jobs_date_posted',
            'validThrough'       => '_rankology_fno_rich_snippets_jobs_valid_through',
            'employmentType'     => '_rankology_fno_rich_snippets_jobs_employment_type',
            'identifierName'     => '_rankology_fno_rich_snippets_jobs_identifier_name',
            'identifierValue'    => '_rankology_fno_rich_snippets_jobs_identifier_value',
            'hiringOrganization' => '_rankology_fno_rich_snippets_jobs_hiring_organization',
            'hiringSameAs'       => '_rankology_fno_rich_snippets_jobs_hiring_same_as',
            'hiringLogo'         => '_rankology_fno_rich_snippets_jobs_hiring_logo',
            'hiringLogoWidth'    => '_rankology_fno_rich_snippets_jobs_hiring_logo_width',
            'hiringLogoHeight'   => '_rankology_fno_rich_snippets_jobs_hiring_logo_height',
            'addressStreet'      => '_rankology_fno_rich_snippets_jobs_address_street',
            'addressLocality'    => '_rankology_fno_rich_snippets_jobs_address_locality',
            'addressRegion'      => '_rankology_fno_rich_snippets_jobs_address_region',
            'postalCode'         => '_rankology_fno_rich_snippets_jobs_postal_code',
            'addressCountry'     => '_rankology_fno_rich_snippets_jobs_country',
            'remote'             => '_rankology_fno_rich_snippets_jobs_remote',
            'direct_apply'       => '_rankology_fno_rich_snippets_jobs_direct_apply',
            'salary'             => '_rankology_fno_rich_snippets_jobs_salary',
            'salaryCurrency'     => '_rankology_fno_rich_snippets_jobs_salary_currency',
            'salaryUnit'         => '_rankology_fno_rich_snippets_jobs_salary_unit',
            'applicantLocationRequirements'         => '_rankology_fno_rich_snippets_jobs_location_requirement',
        ];
        $variables = [];

        foreach ($keys as $key => $value) {
            $variables[$key] = isset($schemaManual[$value]) ? $schemaManual[$value] : '';
        }

        return $variables;
    }

    /**
     * 
     *
     * @param array $context
     *
     * @return array
     */
    public function getJsonData($context = null) {
        $data = $this->getArrayJson();

        $typeSchema = isset($context['type']) ? $context['type'] : RichSnippetType::MANUAL;

        switch ($typeSchema) {
            case RichSnippetType::MANUAL:
                $schemaManual = $this->getCurrentSchemaManual($context);

                if (null === $schemaManual) {
                    return $data;
                }

                $variables = $this->getVariablesForManualSnippet($schemaManual);
                break;
        }

        $variablesSchema = [
            'type'    => 'Organization',
            'name'    => (isset($variables['hiringOrganization']) && ! empty($variables['hiringOrganization'])) ? $variables['hiringOrganization'] : '%%social_knowledge_name%%',
            'logo'    => (isset($variables['hiringLogo']) && ! empty($variables['hiringLogo'])) ? $variables['hiringLogo'] : '%%social_knowledge_image%%',
        ];
        $contextWithVariables              = $context;
        $contextWithVariables['variables'] = $variablesSchema;
        $contextWithVariables['type']      = RichSnippetType::SUB_TYPE;

        $schema                            = rankology_get_service('JsonSchemaGenerator')->getJsonFromSchema(Organization::NAME, $contextWithVariables, ['remove_empty'=> true]);

        if (count($schema) > 1) {
            $data['hiringOrganization']           = $schema;
            $data['hiringOrganization']['sameAs'] = isset($variables['hiringSameAs']) && ! empty($variables['hiringSameAs']) ? $variables['hiringSameAs'] : '%%siteurl%%';
        }

        if (isset($variables['identifierName']) && ! empty($variables['identifierName'])) {
            $data['identifier'] = [
                '@type' => 'PropertyValue',
                'name'  => $variables['identifierName'],
                'value' => isset($variables['identifierValue']) ? $variables['identifierValue'] : '',
            ];
        }

        if (isset($variables['addressStreet']) && ! empty($variables['addressStreet'])) {
            $variablesSchema = [
                'streetAddress'  => $variables['addressStreet'],
                'addressLocality'=> isset($variables['addressLocality']) ? $variables['addressLocality'] : '',
                'addressRegion'  => isset($variables['addressRegion']) ? $variables['addressRegion'] : '',
                'postalCode'     => isset($variables['postalCode']) ? $variables['postalCode'] : '',
                'addressCountry' => isset($variables['addressCountry']) ? $variables['addressCountry'] : '',
            ];

            $contextWithVariables              = $context;
            $contextWithVariables['variables'] = $variablesSchema;
            $contextWithVariables['type']      = RichSnippetType::SUB_TYPE;
            $schema                            = rankology_get_service('JsonSchemaGenerator')->getJsonFromSchema(Place::NAME, $contextWithVariables, ['remove_empty'=> true]);
            if (count($schema) > 1) {
                $data['jobLocation'] = $schema;
            }
        }

        if (isset($variables['remote']) && ! empty($variables['remote'])) {
            $data['jobLocationType'] = 'TELECOMMUTE';

            if(isset($variables['applicantLocationRequirements']) && !empty($variables['applicantLocationRequirements'])){
                $data['applicantLocationRequirements'] = [
                    "@type" => "Country",
                    "name" => $variables['applicantLocationRequirements']
                ];
            }
        }

        if (isset($variables['direct_apply']) && ! empty($variables['direct_apply'])) {
            $data['direct_apply'] = true;
        }

        if (isset($variables['salary']) && ! empty($variables['salary'])) {
            $variablesSchema = [
                'currency'          => isset($variables['salaryCurrency']) ? $variables['salaryCurrency'] : '',
                'quantity_value'    => isset($variables['salary']) ? $variables['salary'] : '',
                'quantity_unit_text'=> isset($variables['salaryUnit']) ? $variables['salaryUnit'] : '',
            ];

            $contextWithVariables              = $context;
            $contextWithVariables['variables'] = $variablesSchema;
            $contextWithVariables['type']      = RichSnippetType::SUB_TYPE;
            $schema                            = rankology_get_service('JsonSchemaGenerator')->getJsonFromSchema(MonetaryAmount::NAME, $contextWithVariables, ['remove_empty'=> true]);
            if (count($schema) > 1) {
                $data['baseSalary'] = $schema;
            }
        }

        $data = rankology_get_service('VariablesToString')->replaceDataToString($data, $variables);

        return apply_filters('rankology_fno_get_json_data_job', $data, $context);
    }

    /**
     * 
     *
     * @param array $data
     *
     * @return array
     */
    public function cleanValues($data) {
        if (isset($data['hiringOrganization']['contactPoint'])) {
            unset($data['hiringOrganization']['contactPoint']);
        }

        return $data;
    }
}
