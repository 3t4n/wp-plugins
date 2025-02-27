<?php

final class ReservationsSettingsProvider
{
    const DEFAULT_BACKGROUND_COLOR = '#FFFFFF';
    const DEFAULT_TEXT_COLOR = '#404040';
    const DEFAULT_MINIMUM_SUGGESTED_STAY = '1';
    const DEFAULT_MAXIMUM_AGE_FOR_CHILDREN = '13';
    const DEFAULT_CALL_TO_ACTION_BUTTON_ITALIAN_LABEL = 'Prenota ora';
    const DEFAULT_CALL_TO_ACTION_BUTTON_ENGLISH_LABEL = 'Book now';
    const DEFAULT_CALL_TO_ACTION_BUTTON_FRENCH_LABEL = 'Réserver';
    const DEFAULT_CALL_TO_ACTION_BUTTON_GERMAN_LABEL = 'Buchen';

    private static $cache = null;

    public static function getEstablishmentId()
    {
        return self::get('uuid', '');
    }

    public static function getCallToActionButtonItalianLabel()
    {
        return self::get('button_value', self::DEFAULT_CALL_TO_ACTION_BUTTON_ITALIAN_LABEL);
    }

    public static function getCallToActionButtonEnglishLabel()
    {
        return self::get('button_value_en', self::DEFAULT_CALL_TO_ACTION_BUTTON_ENGLISH_LABEL);
    }

    public static function getCallToActionButtonFrenchLabel()
    {
        return self::get('button_value_fr', self::DEFAULT_CALL_TO_ACTION_BUTTON_FRENCH_LABEL);
    }

    public static function getCallToActionButtonGermanLabel()
    {
        return self::get('button_value_de', self::DEFAULT_CALL_TO_ACTION_BUTTON_GERMAN_LABEL);
    }

    public static function isCallToActionButtonLabelUsingBold()
    {
        return self::get('select_font_weight', false);
    }

    public static function getMaximumAgeForChildren()
    {
        return self::get('children_age_max', self::DEFAULT_MAXIMUM_AGE_FOR_CHILDREN);
    }

    public static function getMinimumSuggestedStay()
    {
        return self::get('min_days', self::DEFAULT_MINIMUM_SUGGESTED_STAY);
    }

    public static function isChildrenPickerDisplayed()
    {
        return self::get('show_children', false);
    }

    public static function isMobileLayoutForced()
    {
        return self::get('force_mobile_layout', false);
    }

    public static function getBackgroundColor()
    {
        return self::get('main_color', self::DEFAULT_BACKGROUND_COLOR);
    }

    public static function getTextColor()
    {
        return self::get('text_color', self::DEFAULT_TEXT_COLOR);
    }

    public static function isOpeningBookingEngineInANewBrowserTabEnabled()
    {
        return self::get('book_target', false);
    }

    private static function get($key, $defaultValue = null)
    {
        if (self::$cache == null) {
            self::$cache = get_option('slope_options');
        }

        $options = self::$cache;

        return (isset($options[$key]) && $options[$key] != '') ? $options[$key] : $defaultValue;
    }
}
