<?php

namespace RankologyFno\JsonSchemas;

if ( ! defined('ABSPATH')) {
    exit;
}

use Rankology\Helpers\RichSnippetType;
use Rankology\JsonSchemas\Organization;
use Rankology\Models\GetJsonData;
use RankologyFno\Models\JsonSchemaValue;

class Event extends JsonSchemaValue implements GetJsonData {
    const NAME = 'event';

    const ALIAS = ['events'];

    protected function getName() {
        return self::NAME;
    }

    /**
     * 
     *
     * @return array
     */
    protected function getKeysForSchemaManual() {
        return [
            'type' => '_rankology_fno_rich_snippets_type',
            'eventType' => '_rankology_fno_rich_snippets_events_type',
            'name' => '_rankology_fno_rich_snippets_events_name',
            'description' => '_rankology_fno_rich_snippets_events_desc',
            'image' => '_rankology_fno_rich_snippets_events_img',
            'startDate' => '_rankology_fno_rich_snippets_events_start_date',
            'startDateTimezone' => '_rankology_fno_rich_snippets_events_start_date_timezone',
            'startTime' => '_rankology_fno_rich_snippets_events_start_time',
            'endDate' => '_rankology_fno_rich_snippets_events_end_date',
            'endTime' => '_rankology_fno_rich_snippets_events_end_time',
            'previousStartDate' => '_rankology_fno_rich_snippets_events_previous_start_date',
            'previousStartTime' => '_rankology_fno_rich_snippets_events_previous_start_time',
            'locationName' => '_rankology_fno_rich_snippets_events_location_name',
            'url' => '_rankology_fno_rich_snippets_events_location_url',
            'locationAddress' => '_rankology_fno_rich_snippets_events_location_address',
            'offersName' => '_rankology_fno_rich_snippets_events_offers_name',
            'offersCat' => '_rankology_fno_rich_snippets_events_offers_cat',
            'offersPrice' => '_rankology_fno_rich_snippets_events_offers_price',
            'offersPriceCurrency' => '_rankology_fno_rich_snippets_events_offers_price_currency',
            'offersAvailability' => '_rankology_fno_rich_snippets_events_offers_availability',
            'offersValidFromDate' => '_rankology_fno_rich_snippets_events_offers_valid_from_date',
            'offersValidFromTime' => '_rankology_fno_rich_snippets_events_offers_valid_from_time',
            'offersUrl' => '_rankology_fno_rich_snippets_events_offers_url',
            'performer' => '_rankology_fno_rich_snippets_events_performer',
            'organizerName' => '_rankology_fno_rich_snippets_events_organizer_name',
            'organizerUrl' => '_rankology_fno_rich_snippets_events_organizer_url',
            'status' => '_rankology_fno_rich_snippets_events_status',
            'attendanceMode' => '_rankology_fno_rich_snippets_events_attendance_mode',
        ];
    }

    /**
     * 
     *
     * @return array
     *
     * @param array $keys
     * @param array $data
     */
    protected function getVariablesByKeysAndData($keys, $data = []) {
        $variables = parent::getVariablesByKeysAndData($keys, $data);

        if (isset($variables['status']) && ! empty($variables['status']) && $variables['status'] !== 'none') {
            $variables['eventStatus'] = sprintf('%sschema.org/%s', rankology_check_ssl(), $variables['status']);
        }

        if (isset($variables['previousStartDate'], $variables['previousStartTime']) && ! empty($variables['previousStartDate']) && ! empty($variables['previousStartTime'])) {
            $variables['previousStartDate'] = sprintf('%sT%s', $variables['previousStartDate'], $variables['previousStartTime']);
        }

        if (isset($variables['startDate'], $variables['startTime']) && ! empty($variables['startDate']) && ! empty($variables['startTime'])) {
            $variables['startDate'] = sprintf('%sT%s', $variables['startDate'], $variables['startTime']);

            if ($variables['startDateTimezone']) {
                $variables['startDate'] = $variables['startDate'] . $variables['startDateTimezone'];
            }
        }

        if (isset($variables['endDate'], $variables['endTime']) && ! empty($variables['endDate']) && ! empty($variables['endTime'])) {
            $variables['endDate'] = sprintf('%sT%s', $variables['endDate'], $variables['endTime']);
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

        $variables = $this->getVariablesByType($typeSchema, $context);

        if (isset($variables['previousStartDate']) && ! isset($variables['eventStatus']) || $variables['eventStatus'] !== rankology_check_ssl() . 'schema.org/EventRescheduled') {
            unset($variables['previousStartDate']);
        }

        if (isset($variables['attendanceMode']) && 'none' != $variables['attendanceMode']) {
            if (in_array($variables['attendanceMode'], ['OnlineEventAttendanceMode', 'MixedEventAttendanceMode', 'OfflineEventAttendanceMode'], true)) {
                $data['eventAttendanceMode'] = $variables['attendanceMode'];
            }
        }

        if (isset($variables['locationName'], $variables['locationAddress']) && ! empty($variables['locationName']) && ! empty($variables['locationAddress'])) {
            if (isset($variables['attendanceMode']) && 'OnlineEventAttendanceMode' === $variables['attendanceMode']) {
                $contextWithVariables = $context;
                $contextWithVariables['variables'] = [
                    'url' => isset($variables['url']) ? $variables['url'] : '',
                ];
                $contextWithVariables['type'] = RichSnippetType::SUB_TYPE;
                $schema = rankology_get_service('JsonSchemaGenerator')->getJsonFromSchema(VirtualLocation::NAME, $contextWithVariables, ['remove_empty' => true]);
                if (count($schema) > 1) {
                    $data['location'] = $schema;
                }
            } elseif (isset($variables['attendanceMode']) && 'MixedEventAttendanceMode' === $variables['attendanceMode']) {
                $contextWithVariables = $context;
                $contextWithVariables['variables'] = [
                    'url' => isset($variables['url']) ? $variables['url'] : '',
                    'name' => isset($variables['locationName']) ? $variables['locationName'] : '',
                    'address' => isset($variables['locationAddress']) ? $variables['locationAddress'] : '',
                ];
                $contextWithVariables['type'] = RichSnippetType::SUB_TYPE;
                $schema = rankology_get_service('JsonSchemaGenerator')->getJsonFromSchema(VirtualLocation::NAME, $contextWithVariables, ['remove_empty' => true]);
                if (count($schema) > 1) {
                    $data['location'][] = $schema;
                }

                $schema = rankology_get_service('JsonSchemaGenerator')->getJsonFromSchema(Place::NAME, $contextWithVariables, ['remove_empty' => true]);
                if (count($schema) > 1) {
                    $data['location'][] = $schema;
                }
            } else {
                $contextWithVariables = $context;
                $contextWithVariables['variables'] = [
                    'url' => isset($variables['url']) ? $variables['url'] : '',
                    'name' => isset($variables['locationName']) ? $variables['locationName'] : '',
                    'address' => isset($variables['locationAddress']) ? $variables['locationAddress'] : '',
                ];
                $contextWithVariables['type'] = RichSnippetType::SUB_TYPE;
                $schema = rankology_get_service('JsonSchemaGenerator')->getJsonFromSchema(Place::NAME, $contextWithVariables, ['remove_empty' => true]);
                if (count($schema) > 1) {
                    $data['location'] = $schema;
                }
            }
        }

        if (isset($variables['offersName']) && ! empty($variables['offersName'])) {
            $contextWithVariables = $context;
            $contextWithVariables['variables'] = [
                'name' => $variables['offersName'],
                'category' => isset($variables['offersCat']) ? $variables['offersCat'] : '',
                'price' => isset($variables['offersPrice']) ? $variables['offersPrice'] : '',
                'priceCurrency' => isset($variables['offersPriceCurrency']) ? $variables['offersPriceCurrency'] : '',
                'url' => isset($variables['offersUrl']) ? $variables['offersUrl'] : '',
                'availability' => isset($variables['offersAvailability']) ? $variables['offersAvailability'] : '',
            ];

            if (isset($variables['offersValidFromDate'], $variables['offersValidFromTime']) && ! empty($variables['offersValidFromDate']) && ! empty($variables['offersValidFromTime'])) {
                $date = sprintf('%sT%s', $variables['offersValidFromDate'], $variables['offersValidFromTime']);
                $gmtOffset = get_option('gmt_offset');
                if ( ! empty($gmtOffset)) {
                    $timezone = sprintf('%+d', $gmtOffset);
                    $date = $date . $timezone . ':00';
                }

                $contextWithVariables['variables']['validFrom'] = $date;
            }

            $contextWithVariables['type'] = RichSnippetType::SUB_TYPE;
            $schema = rankology_get_service('JsonSchemaGenerator')->getJsonFromSchema(Offer::NAME, $contextWithVariables, ['remove_empty' => true]);
            if (count($schema) > 1) {
                $data['offers'][] = $schema;
            }
        }

        if (isset($variables['performer'])) {
            $contextWithVariables = $context;
            $contextWithVariables['variables'] = [
                'name' => $variables['performer'],
            ];
            $contextWithVariables['type'] = RichSnippetType::SUB_TYPE;
            $schema = rankology_get_service('JsonSchemaGenerator')->getJsonFromSchema(Person::NAME, $contextWithVariables, ['remove_empty' => true]);
            if (count($schema) > 1) {
                $data['performer'] = $schema;
            }
        }

        if (isset($variables['organizerName']) && ! empty($variables['organizerName'])) {
            $variablesSchema = [
                'type' => 'Organization',
                'name' => isset($variables['organizerName']) ? $variables['organizerName'] : '',
                'url' => isset($variables['organizerUrl']) ? $variables['organizerUrl'] : '',
            ];

            $contextWithVariables = $context;
            $contextWithVariables['variables'] = $variablesSchema;
            $contextWithVariables['type'] = RichSnippetType::SUB_TYPE;
            $schema = rankology_get_service('JsonSchemaGenerator')->getJsonFromSchema(Organization::NAME, $contextWithVariables, ['remove_empty' => true]);
            if (count($schema) > 1) {
                $data['organizer'] = $schema;
            }
        }

        $data = rankology_get_service('VariablesToString')->replaceDataToString($data, $variables);

        return apply_filters('rankology_fno_get_json_data_event', $data, $context);
    }

    /**
     * 
     *
     * @param  $data
     *
     * @return array
     */
    public function cleanValues($data) {
        if (isset($data['organizer']['contactPoint'])) {
            unset($data['organizer']['contactPoint']);
        }

        return parent::cleanValues($data);
    }
}
