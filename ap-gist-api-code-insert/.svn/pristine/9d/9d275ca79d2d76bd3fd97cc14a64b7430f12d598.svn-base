<?php

namespace Pinchoalex\SocialPatch\components\requests;

use Pinchoalex\SocialPatch\components\transformers\Settings;
use ReflectionClass;
use ReflectionProperty;

class RequestBuilder
{
    protected string $url;
    protected string $api_token;

    protected string $g_key;

    private array $exclude = [
        'url'
    ];

    public function __construct()
    {
        $this->api_token = $this->getSettingsApiKey();
        $this->g_key = Settings::getValue('youtubeApiKey');
    }

    protected function getSettingsApiKey(): string
    {
        return Settings::getValue('pluginApiKey', '32a247b24da6323cf7af8bc497e4af44b1c86789de8977de0bd5b3f611577c99');
    }

    public function build(): string
    {
        $reflect = new ReflectionClass($this);
        $filter = ReflectionProperty::IS_PUBLIC + ReflectionProperty::IS_PROTECTED;

        $params = [];
        foreach ($reflect->getProperties($filter) as $property) {
            if (!in_array($property->name, $this->exclude)) {
                if (!empty($this->{$property->name})) {
                    $params[$property->name] = $this->{$property->name};
                }
            }
        }

        return $this->url . '?' . http_build_query($params);
    }
}