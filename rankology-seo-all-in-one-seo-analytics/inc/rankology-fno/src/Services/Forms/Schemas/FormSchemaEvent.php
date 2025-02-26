<?php

namespace RankologyFno\Services\Forms\Schemas;

defined('ABSPATH') || exit;

use RankologyFno\Core\FormApi;
use RankologyFno\Helpers\Schemas\Currencies;

class FormSchemaEvent extends FormApi {
    protected function getTypeByField($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_events_type':
            case '_rankology_fno_rich_snippets_events_offers_cat':
            case '_rankology_fno_rich_snippets_events_offers_price_currency':
            case '_rankology_fno_rich_snippets_events_offers_availability':
            case '_rankology_fno_rich_snippets_events_status':
            case '_rankology_fno_rich_snippets_events_attendance_mode':
                return 'select';
            case '_rankology_fno_rich_snippets_events_desc':
                return 'textarea';
            case '_rankology_fno_rich_snippets_events_img':
                return 'upload';
            case '_rankology_fno_rich_snippets_events_start_date':
            case '_rankology_fno_rich_snippets_events_end_date':
            case '_rankology_fno_rich_snippets_events_previous_start_date':
            case '_rankology_fno_rich_snippets_events_offers_valid_from_date':
                return 'date';
            case '_rankology_fno_rich_snippets_events_start_time':
            case '_rankology_fno_rich_snippets_events_end_time':
            case '_rankology_fno_rich_snippets_events_offers_valid_from_time':
                return 'time';
            case '_rankology_fno_rich_snippets_events_name':
            case '_rankology_fno_rich_snippets_events_start_date_timezone':
            case '_rankology_fno_rich_snippets_events_previous_start_time':
            case '_rankology_fno_rich_snippets_events_location_name':
            case '_rankology_fno_rich_snippets_events_location_url':
            case '_rankology_fno_rich_snippets_events_location_address':
            case '_rankology_fno_rich_snippets_events_offers_name':
            case '_rankology_fno_rich_snippets_events_offers_price':
            case '_rankology_fno_rich_snippets_events_offers_url':
            case '_rankology_fno_rich_snippets_events_performer':
            case '_rankology_fno_rich_snippets_events_organizer_name':
            case '_rankology_fno_rich_snippets_events_organizer_url':
                return 'input';
        }
    }

    protected function getLabelByField($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_events_type':
                return __('Select your event type', 'wp-rankology');
            case '_rankology_fno_rich_snippets_events_name':
                return __('Event name', 'wp-rankology');
            case '_rankology_fno_rich_snippets_events_desc':
                return __('Event description (default excerpt, or beginning of the content)', 'wp-rankology');
            case '_rankology_fno_rich_snippets_events_img':
                return __('Image thumbnail', 'wp-rankology');
            case '_rankology_fno_rich_snippets_events_start_date':
                return __('Start date', 'wp-rankology');
            case '_rankology_fno_rich_snippets_events_start_date_timezone':
                return __('Timezone', 'wp-rankology');
            case '_rankology_fno_rich_snippets_events_start_time':
                return __('Start time', 'wp-rankology');
            case '_rankology_fno_rich_snippets_events_end_date':
                return __('End date', 'wp-rankology');
            case '_rankology_fno_rich_snippets_events_end_time':
                return __('End time', 'wp-rankology');
            case '_rankology_fno_rich_snippets_events_previous_start_date':
                return __('Previous start date', 'wp-rankology');
            case '_rankology_fno_rich_snippets_events_previous_start_time':
                return __('Previous start time', 'wp-rankology');
            case '_rankology_fno_rich_snippets_events_location_name':
                return __('Location name', 'wp-rankology');
            case '_rankology_fno_rich_snippets_events_location_url':
                return __('Location Website', 'wp-rankology');
            case '_rankology_fno_rich_snippets_events_location_address':
                return __('Location Address', 'wp-rankology');
            case '_rankology_fno_rich_snippets_events_offers_name':
                return __('Offer name', 'wp-rankology');
            case '_rankology_fno_rich_snippets_events_offers_cat':
                return __('Select your offer category', 'wp-rankology');
            case '_rankology_fno_rich_snippets_events_offers_price':
                return __('Price', 'wp-rankology');
            case '_rankology_fno_rich_snippets_events_offers_price_currency':
                return __('Select your currency', 'wp-rankology');
            case '_rankology_fno_rich_snippets_events_offers_availability':
                return __('Availability', 'wp-rankology');
            case '_rankology_fno_rich_snippets_events_offers_valid_from_date':
                return __('Valid From', 'wp-rankology');
            case '_rankology_fno_rich_snippets_events_offers_valid_from_time':
                return __('Time', 'wp-rankology');
            case '_rankology_fno_rich_snippets_events_offers_url':
                return __('Website to buy tickets', 'wp-rankology');
            case '_rankology_fno_rich_snippets_events_performer':
                return __('Performer name', 'wp-rankology');
            case '_rankology_fno_rich_snippets_events_organizer_name':
                return __('Organizer name', 'wp-rankology');
            case '_rankology_fno_rich_snippets_events_organizer_url':
                return __('Organizer URL', 'wp-rankology');
            case '_rankology_fno_rich_snippets_events_status':
                return __('Select your event status', 'wp-rankology');
            case '_rankology_fno_rich_snippets_events_attendance_mode':
                return __('Select your event attendance mode', 'wp-rankology');
        }
    }

    protected function getPlaceholderByField($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_events_name':
                return __('The name of your event', 'wp-rankology');
            case '_rankology_fno_rich_snippets_events_desc':
                return __('Enter your event description', 'wp-rankology');
            case '_rankology_fno_rich_snippets_events_img':
                return __('Select your image', 'wp-rankology');
            case '_rankology_fno_rich_snippets_events_start_date':
                return __('e.g. YYYY-MM-DD', 'wp-rankology');
            case '_rankology_fno_rich_snippets_events_start_date_timezone':
                return __('Timezone start date', 'wp-rankology');
            case '_rankology_fno_rich_snippets_events_start_time':
                return __('e.g. HH:MM', 'wp-rankology');
            case '_rankology_fno_rich_snippets_events_end_date':
                return __('e.g. YYYY-MM-DD', 'wp-rankology');
            case '_rankology_fno_rich_snippets_events_end_time':
                return __('e.g. HH:MM', 'wp-rankology');
            case '_rankology_fno_rich_snippets_events_previous_start_date':
                return __('e.g. YYYY-MM-DD', 'wp-rankology');
            case '_rankology_fno_rich_snippets_events_previous_start_time':
                return __('e.g. HH:MM', 'wp-rankology');
            case '_rankology_fno_rich_snippets_events_location_name':
                return __('e.g. My Local Business name', 'wp-rankology');
            case '_rankology_fno_rich_snippets_events_location_url':
                return __('e.g. https://www.example.com', 'wp-rankology');
            case '_rankology_fno_rich_snippets_events_location_address':
                return __("e.g. 1 Avenue de l'Imperatrice, 64200 Biarritz", 'wp-rankology');
            case '_rankology_fno_rich_snippets_events_offers_name':
                return __('e.g. General admission', 'wp-rankology');
            case '_rankology_fno_rich_snippets_events_offers_price':
                return __('e.g. 10', 'wp-rankology');
            case '_rankology_fno_rich_snippets_events_offers_url':
                return __('e.g. https://www.example.com', 'wp-rankology');
            case '_rankology_fno_rich_snippets_events_performer':
                return __('e.g. Lana Del Rey', 'wp-rankology');
            case '_rankology_fno_rich_snippets_events_organizer_name':
                return __('e.g. Apple', 'wp-rankology');
            case '_rankology_fno_rich_snippets_events_organizer_url':
                return __('e.g. https://www.example.com', 'wp-rankology');
        }
    }

    protected function getDescriptionByField($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_events_offers_valid_from_date':
                return __('The date when tickets go on sale', 'wp-rankology');
            case '_rankology_fno_rich_snippets_events_offers_valid_from_time':
                return __('The time when tickets go on sale', 'wp-rankology');
            case '_rankology_fno_rich_snippets_events_offers_price':
                return __('The lowest available price, including service charges and fees, of this type of ticket.', 'wp-rankology');
            case '_rankology_fno_rich_snippets_events_img':
                return __('Minimum width: 720px - Recommended size: 1920px - .jpg, .png, or. gif format - crawlable and indexable', 'wp-rankology');
        }
    }

    protected function getOptions($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_events_type':
                return [['value' => 'BusinessEvent', 'label' => __('Business Event', 'wp-rankology')],
                    ['value' => 'ChildrensEvent',  'label' => __('Children\'s Event', 'wp-rankology')],
                    ['value' => 'ComedyEvent',  'label' => __('Comedy Event', 'wp-rankology')],
                    ['value' => 'CourseInstance',  'label' => __('Course Instance', 'wp-rankology')],
                    ['value' => 'DanceEvent',  'label' => __('Dance Event', 'wp-rankology')],
                    ['value' => 'DeliveryEvent',  'label' => __('Delivery Event', 'wp-rankology')],
                    ['value' => 'EducationEvent',  'label' => __('Education Event', 'wp-rankology')],
                    ['value' => 'ExhibitionEvent',  'label' => __('Exhibition Event', 'wp-rankology')],
                    ['value' => 'Festival',  'label' => __('Festival', 'wp-rankology')],
                    ['value' => 'FoodEvent',  'label' => __('Food Event', 'wp-rankology')],
                    ['value' => 'LiteraryEvent',  'label' => __('Literary Event', 'wp-rankology')],
                    ['value' => 'MusicEvent',  'label' => __('Music Event', 'wp-rankology')],
                    ['value' => 'PublicationEvent',  'label' => __('Publication Event', 'wp-rankology')],
                    ['value' => 'SaleEvent',  'label' => __('Sale Event', 'wp-rankology')],
                    ['value' => 'ScreeningEvent',  'label' => __('Screening Event', 'wp-rankology')],
                    ['value' => 'SocialEvent',  'label' => __('Social Event', 'wp-rankology')],
                    ['value' => 'SportsEvent',  'label' => __('Sports Event', 'wp-rankology')],
                    ['value' => 'TheaterEvent',  'label' => __('Theater Event', 'wp-rankology')],
                    ['value' => 'VisualArtsEvent',  'label' => __('Visual Arts Event', 'wp-rankology')],
                ];
            case '_rankology_fno_rich_snippets_events_offers_cat':
                return [
                    ['value' => 'Primary',  'label' => __('Primary', 'wp-rankology')],
                    ['value' => 'Secondary',  'label' => __('Secondary', 'wp-rankology')],
                    ['value' => 'Presale',  'label' => __('Presale', 'wp-rankology')],
                    ['value' => 'Premium',  'label' => __('Premium', 'wp-rankology')],
                ];
            case '_rankology_fno_rich_snippets_events_offers_price_currency':
                return Currencies::getOptions();
            case '_rankology_fno_rich_snippets_events_offers_availability':
                return [
                    ['value' => 'InStock', 'label' => __('In Stock', 'wp-rankology')],
                    ['value' => 'SoldOut', 'label' => __('Sold Out', 'wp-rankology')],
                    ['value' => 'PreOrder', 'label' => __('Pre Order', 'wp-rankology')],
                ];
            case '_rankology_fno_rich_snippets_events_status':
                return [
                    ['value' => 'none', 'label' => __('Select a status event', 'wp-rankology')],
                    ['value' => 'EventCancelled', 'label' => __('Event cancelled', 'wp-rankology')],
                    ['value' => 'EventMovedOnline', 'label' => __('Event moved online', 'wp-rankology')],
                    ['value' => 'EventPostponed', 'label' => __('Event postponed', 'wp-rankology')],
                    ['value' => 'EventRescheduled', 'label' => __('Event rescheduled', 'wp-rankology')],
                    ['value' => 'EventScheduled', 'label' => __('Event scheduled', 'wp-rankology')],
                ];
            case '_rankology_fno_rich_snippets_events_attendance_mode':
                return [
                    ['value' => 'none', 'label' => __('Select your event attendance mode', 'wp-rankology')],
                    ['value' => 'OfflineEventAttendanceMode', 'label' => __('Offline event', 'wp-rankology')],
                    ['value' => 'OnlineEventAttendanceMode', 'label' => __('Online event', 'wp-rankology')],
                    ['value' => 'MixedEventAttendanceMode', 'label' => __('Mixed event', 'wp-rankology')],
                ];
                break;
        }
    }

    protected function getDetails($postId = null) {
        return [
            [
                'key' => '_rankology_fno_rich_snippets_events_type',
                'value' => 'BusinessEvent',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_events_name',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_events_desc',
                'class' => 'rankology-textarea-high-size'
            ],
            [
                'key' => '_rankology_fno_rich_snippets_events_img',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_events_start_date',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_events_start_date_timezone',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_events_start_time',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_events_end_date',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_events_end_time',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_events_previous_start_date',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_events_previous_start_time',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_events_location_name',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_events_location_url',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_events_location_address',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_events_offers_name',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_events_offers_cat',
                'value' => 'Primary',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_events_offers_price',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_events_offers_price_currency',
                'value' => 'none'
            ],
            [
                'key' => '_rankology_fno_rich_snippets_events_offers_availability',
                'value' => 'InStock'
            ],
            [
                'key' => '_rankology_fno_rich_snippets_events_offers_valid_from_date',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_events_offers_valid_from_time',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_events_offers_url',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_events_performer',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_events_organizer_name',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_events_organizer_url',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_events_status',
                'value' => 'none',
            ],
            [
                'key' => '_rankology_fno_rich_snippets_events_attendance_mode',
                'value' => 'none'
            ],
        ];
    }
}
