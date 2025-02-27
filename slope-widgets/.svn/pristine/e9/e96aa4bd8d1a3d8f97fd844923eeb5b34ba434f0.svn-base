<?php

/**
 * Provides settings for the promotions section of the widget. It returns default settings when there is no user-defined
 * setting.
 */
final class PromotionsSettingProvider
{
    const DEFAULT_BUTTON_BACKGROUND_COLOR = '#277fbe';
    const DEFAULT_BUTTON_TEXT_COLOR = '#fff';
    const DEFAULT_BUTTON_TEXT_WEIGHT = FontWeight::SEMIBOLD;

    const DEFAULT_CARD_BACKGROUND_COLOR = '#fbfbfb';
    const DEFAULT_CARD_BORDER_COLOR = '#ccc';
    const DEFAULT_CARD_BORDER_RADIUS = '5';
    const DEFAULT_CARD_BORDER_SIZE = '1';

    const DEFAULT_TEXT_COLOR = '#111';

    const DEFAULT_TITLE_ALIGN = TextAlignment::LEFT;
    const DEFAULT_TITLE_COLOR = '#111';
    const DEFAULT_TITLE_SIZE = '22';
    const DEFAULT_TITLE_WEIGHT = FontWeight::LIGHT;

    private static $cache = null;

    public static function getButtonBackgroundColor()
    {
        return self::get('promotions_button_background_color', self::DEFAULT_BUTTON_BACKGROUND_COLOR);
    }

    public static function getButtonTextColor()
    {
        return self::get('promotions_button_text_color', self::DEFAULT_BUTTON_TEXT_COLOR);
    }

    public static function getButtonTextWeight()
    {
        return self::get('button_weight', self::DEFAULT_BUTTON_TEXT_WEIGHT);
    }

    public static function getCardBackgroundColor()
    {
        return self::get('promotions_background_color', self::DEFAULT_CARD_BACKGROUND_COLOR);
    }

    public static function getCardBorderColor()
    {
        return self::get('promotions_border_color', self::DEFAULT_CARD_BORDER_COLOR);
    }

    public static function getCardBorderRadius()
    {
        return self::get('border_radius', self::DEFAULT_CARD_BORDER_RADIUS);
    }

    public static function getCardBorderSize()
    {
        return self::get('promotions_border_size', self::DEFAULT_CARD_BORDER_SIZE);
    }

    public static function getCardLayoutOption()
    {
        // No default is specified
        return self::get('option_set', '');
    }

    public static function getTextColor()
    {
        return self::get('promotions_text_color', self::DEFAULT_TEXT_COLOR);
    }

    public static function getTitleAlignment()
    {
        $alignment = self::get('align_title', self::DEFAULT_TITLE_ALIGN);

        // Map the old promotion title alignment value to the new value. This method allows supporting existing data
        // that was based on strings, now it's based on "enums".
        if ($alignment == 'SLOPE_PROMOTIONS_ALIGN_CENTER') {
            return TextAlignment::CENTER;
        } else if ($alignment == 'SLOPE_PROMOTIONS_ALIGN_LEFT') {
            return TextAlignment::LEFT;
        } else if ($alignment == 'SLOPE_PROMOTIONS_ALIGN_RIGHT') {
            return TextAlignment::RIGHT;
        }

        return $alignment;
    }

    public static function getTitleColor()
    {
        return self::get('promotions_title_color', self::DEFAULT_TITLE_COLOR);
    }

    public static function getTitleSize()
    {
        return self::get('title_size', self::DEFAULT_TITLE_SIZE);
    }

    public static function getTitleWeight()
    {
        return self::get('title_weight', self::DEFAULT_TITLE_WEIGHT);
    }

    public static function isDescriptionHidden()
    {
        return self::get('hide_description', false);
    }

    public static function isBookabilityInformationHidden()
    {
        return self::get('hide_information', false);
    }

    public static function shouldOpenLinksOnANewTab()
    {
        return self::get('book_target', false);
    }

    private static function get($key, $defaultValue = null)
    {
        if (self::$cache == null) {
            self::$cache = get_option('slope_promotions_options');
        }

        $options = self::$cache;

        return (isset($options[$key]) && $options[$key] != '') ? $options[$key] : $defaultValue;
    }
}
