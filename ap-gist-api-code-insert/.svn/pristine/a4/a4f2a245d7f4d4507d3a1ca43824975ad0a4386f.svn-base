<?php

namespace Pinchoalex\SocialPatch\components\transformers;

class BlockSettings
{
    protected $data;
    public function __construct($fileName)
    {
        $jsonFromFile = file_get_contents(AP_YOUTUBE_PLUGIN_PATH . '/src/' . $fileName . '/src/block.json');

        $this->data = json_decode($jsonFromFile);
    }

    public function getBlockAttributes(): array
    {
        $attributes = [];
        foreach ($this->data->attributes as $key => $attribute) {
            $attribute->default = Settings::getDefault($key, $attribute);
            $attributes[$key] = (array)$attribute;
        }

        return $attributes;
    }

    public function getShortcodeAttributes(): array
    {
        $attributes = [];
        foreach ($this->data->attributes as $key => $attribute) {
            $attributes[$key] = Settings::getDefault($key, $attribute);
        }

        return $attributes;
    }
}