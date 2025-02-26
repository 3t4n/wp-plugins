<?php

namespace RankologyFno\JsonSchemas;

if ( ! defined('ABSPATH')) {
    exit;
}

use Rankology\Models\GetJsonData;
use RankologyFno\Models\JsonSchemaValue;

class Person extends JsonSchemaValue implements GetJsonData {
    const NAME = 'person';

    protected function getName() {
        return self::NAME;
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

        return apply_filters('rankology_fno_get_json_data_person', $data, $context);
    }
}
