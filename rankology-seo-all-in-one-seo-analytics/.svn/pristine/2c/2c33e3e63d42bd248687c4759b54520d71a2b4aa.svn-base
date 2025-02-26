<?php

namespace RankologyFno\Models;

if ( ! defined('ABSPATH')) {
    exit;
}

use Rankology\Helpers\RichSnippetType;
use Rankology\Models\JsonSchemaValue as JsonSchemaValueBase;

/**
 * @abstract
 */
abstract class JsonSchemaValue extends JsonSchemaValueBase {
    /**
     * 
     *
     * @param string $file
     * @param mixed  $name
     *
     * @return string
     */
    public function getJson() {
        $file = apply_filters('rankology_get_json_from_file', sprintf('%s/%s.json', RANKOLOGY_FNO_TEMPLATE_JSON_SCHEMAS, $this->getName(), '.json'));

        if ( ! file_exists($file)) {
            return '';
        }

        $json = file_get_contents($file);

        return $json;
    }

    /**
     * 
     *
     * @param array $context
     *
     * @return array|null
     */
    public function getCurrentSchemaManual($context) {
        if ( ! rankology_get_service('CheckContextPage')->hasSchemaManualValues($context)) {
            return null;
        }

        return $context['schemas_manual'][$context['key_get_json_schema']];
    }

    /**
     * 
     *
     * @return array
     */
    protected function getKeysForSchemaManual() {
        return [];
    }

    /**
     * 
     *
     * @return array
     */
    protected function getKeysForOptionLocalBusiness() {
        return [];
    }

    /**
     * 
     *
     * @param array $keys
     * @param array $data
     *
     * @return array
     */
    protected function getVariablesByKeysAndData($keys, $data = []) {
        $variables = [];

        foreach ($keys as $key => $item) {
            if (is_string($item)) {
                $variables[$key] = isset($data[$item]) ? $data[$item] : '';
            } elseif (is_array($item)) {
                $variables[$key] = (isset($item['value']) && isset($data[$item['value']]) && ! empty($data[$item['value']])) ? $data[$item['value']] : $item['default'];
            }
        }

        return $variables;
    }

    /**
     * 
     *
     * @param string $type
     * @param array  $context
     *
     * @return array
     */
    public function getVariablesByType($type, $context) {
        switch ($type) {
            case RichSnippetType::MANUAL:
                $data = $this->getCurrentSchemaManual($context);
                if (null === $data) {
                    return [];
                }

                $keys      = $this->getKeysForSchemaManual();

                return $this->getVariablesByKeysAndData($keys, $data);
            case RichSnippetType::OPTION_LOCAL_BUSINESS:
                return $this->getKeysForOptionLocalBusiness();
            case RichSnippetType::SUB_TYPE:
                return isset($context['variables']) ? $context['variables'] : [];
            default:
                return [];
        }
    }
}
