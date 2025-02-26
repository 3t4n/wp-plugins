<?php

namespace RankologyFno\JsonSchemas;

if ( ! defined('ABSPATH')) {
    exit;
}

use Rankology\Helpers\RichSnippetType;
use Rankology\Models\GetJsonData;
use RankologyFno\Models\JsonSchemaValue;

class LocalBusiness extends JsonSchemaValue implements GetJsonData {
    const NAME = 'local-business';

    const ALIAS = ['localbusiness'];

    protected function getName() {
        return self::NAME;
    }

    protected function getDayByKey($key) {
        switch ($key) {
            case 0:
                return 'Monday';
            case 1:
                return 'Tuesday';
            case 2:
                return 'Wednesday';
            case 3:
                return 'Thursday';
            case 4:
                return 'Friday';
            case 5:
                return 'Saturday';
            case 6:
                return 'Sunday';
        }
    }

    /**
     * 
     *
     * @return array
     */
    protected function getKeysForOptionLocalBusiness() {
        return [
            'type' => '%%local_business_type%%',
            'image' => '%%social_knowledge_image%%',
            'id' => '%%siteurl%%',
            'name' => '%%social_knowledge_name%%',
            'url' => '%%local_business_url%%',
            'telephone' => '%%local_business_phone%%',
            'priceRange' => '%%local_business_price_range%%',
            'servesCuisines' => '%%local_business_cuisine%%',
            'acceptsReservations' => '%%local_business_accepts_reservations%%',
            'menu' => '%%local_business_menu%%',
        ];
    }

    /**
     * 
     *
     * @return array
     */
    protected function getKeysForSchemaManual() {
        return [
            'type' => '_rankology_fno_rich_snippets_lb_type',
            'image' => '_rankology_fno_rich_snippets_lb_img',
            'url' => '_rankology_fno_rich_snippets_lb_website',
            'telephone' => '_rankology_fno_rich_snippets_lb_tel',
            'priceRange' => '_rankology_fno_rich_snippets_lb_price',
            'country' => '_rankology_fno_rich_snippets_lb_country',
            'postalCode' => '_rankology_fno_rich_snippets_lb_pc',
            'state' => '_rankology_fno_rich_snippets_lb_state',
            'city' => '_rankology_fno_rich_snippets_lb_city',
            'address' => '_rankology_fno_rich_snippets_lb_street_addr',
            'menu' => '_rankology_fno_rich_snippets_lb_menu',
            'acceptsReservations' => '_rankology_fno_rich_snippets_lb_accepts_reservations',
            'servesCuisines' => '_rankology_fno_rich_snippets_lb_cuisine',
            'name' => [
                'value' => '_rankology_fno_rich_snippets_lb_name',
                'default' => '%%sitetitle%%',
            ],
            'id' => [
                'default' => '%%schema_article_canonical%%',
            ],
            'openingHours' => '_rankology_fno_rich_snippets_lb_opening_hours',
        ];
    }

    /**
     * 
     *
     * @return array
     */
    protected function getTypeFood() {
        return [
            'FoodEstablishment',
            'Bakery',
            'BarOrPub',
            'Brewery',
            'CafeOrCoffeeShop',
            'FastFoodRestaurant',
            'IceCreamShop',
            'Restaurant',
            'Winery',
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

        if (isset($variables['servesCuisines']) && ! in_array($variables['type'], $this->getTypeFood(), true)) {
            unset($variables['servesCuisines']);
        }

        if (isset($variables['openingHours']['rankology_local_business_opening_hours'])) {
            $variables['openingHours'] = $variables['openingHours']['rankology_local_business_opening_hours'];
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

        $typeSchema = isset($context['type']) ? $context['type'] : RichSnippetType::OPTION_LOCAL_BUSINESS;

        $openingHours = [];
        $variables = $this->getVariablesByType($typeSchema, $context);

        if (RichSnippetType::OPTION_LOCAL_BUSINESS === $typeSchema) {
            $openingHours = rankology_fno_get_service('OptionPro')->getLocalBusinessOpeningHours();
        } elseif (isset($variables['openingHours'])) {
            $openingHours = $variables['openingHours'];
        }

        $data = rankology_get_service('VariablesToString')->replaceDataToString($data, $variables);

        $schema = rankology_get_service('JsonSchemaGenerator')->getJsonFromSchema(PostalAddress::NAME, $context, ['remove_empty' => true]);

        if (count($schema) > 1) {
            $data['address'] = $schema;
        }

        $schema = rankology_get_service('JsonSchemaGenerator')->getJsonFromSchema(Geo::NAME, $context, ['remove_empty' => true]);

        if (count($schema) > 1) {
            $data['geo'] = $schema;
        }

        if ( ! empty($openingHours)) {
            foreach ($openingHours as $key => $day) {
                if (isset($day['open']) && '1' === $day['open']) { // bad name => reality is closed
                    continue;
                }

                foreach ($day as $keyHalfDay => $halfDay) {
                    if ( ! isset($halfDay['open']) || '1' !== $halfDay['open']) {
                        continue;
                    }

                    $variablesOpeningHours = [
                        'dayOfWeek' => $this->getDayByKey($key),
                        'opens' => \sprintf('%s:%s:00', $halfDay['start']['hours'], $halfDay['start']['mins']),
                        'closes' => \sprintf('%s:%s:00', $halfDay['end']['hours'], $halfDay['end']['mins']),
                    ];

                    $schema = rankology_get_service('JsonSchemaGenerator')->getJsonFromSchema(OpeningHours::NAME, ['variables' => $variablesOpeningHours], ['remove_empty' => true]);
                    if (count($schema) > 1) {
                        $data['openingHoursSpecification'][] = $schema;
                    }
                }
            }
        }
        return apply_filters('rankology_fno_get_json_data_local_business', $data, $context);
    }

    public function cleanValues($data) {
        if (isset($data['@type']) && ! in_array($data['@type'], $this->getTypeFood(), true)) {
            $removeKeys = ['menu', 'acceptsReservations', 'servesCuisine'];
            foreach ($removeKeys as $key => $value) {
                if (isset($data[$value])) {
                    unset($data[$value]);
                }
            }
        }

        return $data;
    }
}
