<?php

declare(strict_types=1);

class TwitchStreamShortcodeAttribute
{
    public ?string $customCssClass;

    /**
     * @param string[] $attributes
     */
    public function __construct(array $attributes)
    {
        $attributes = shortcode_atts([
            'customcssclass' => null,
        ], $attributes);

        $this->customCssClass = $attributes['customcssclass'];
    }
}
