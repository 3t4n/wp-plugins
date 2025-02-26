<?php

declare(strict_types=1);

class TwitchStreamFormDataNormalizer
{
    public const TWITCH_SETTINGS_STREAM_OFFLINE_HTML_DEFAULT_VALUE = '<h4>No streamers are online!</h4>';

    private array $formData;

    /**
     * @param array $formData
     */
    public function __construct(array $formData)
    {
        $this->formData = $formData;
    }

    /**
     * @param string $formElementName
     * @param string|int|float|bool|array|object|null $defaultValue
     * @param bool $sanitizeTextField
     * @return string|int|float|bool|array|object|null
     */
    public function getValueFromForm(
        string $formElementName,
        $defaultValue = null,
        bool $sanitizeTextField = true
    ) {
        if (array_key_exists($formElementName, $this->formData) === false || $this->emptyStringToNull($this->formData[$formElementName]) === null) {
            return $this->emptyStringToNull($defaultValue);
        }

        $formElementData = $this->emptyStringToNull($this->formData[$formElementName]);

        if ($sanitizeTextField) {
            return sanitize_text_field($formElementData);
        }

        return $formElementData;
    }

    /**
     * @param string|int|float|bool|array|object|null $value
     * @return string|int|float|bool|array|object|null
     */
    private function emptyStringToNull($value)
    {
        return $value === '' ? null : $value;
    }
}
