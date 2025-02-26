<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

function rankology_get_schema_metaboxe_event($rankology_fno_rich_snippets_data, $key_schema = 0) {
    $options_currencies = rankology_get_options_schema_currencies();

    $rankology_fno_rich_snippets_events_type                         = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_type']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_type'] : '';
    $rankology_fno_rich_snippets_events_name                         = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_name']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_name'] : '';
    $rankology_fno_rich_snippets_events_desc                         = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_desc']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_desc'] : '';
    $rankology_fno_rich_snippets_events_img                          = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_img']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_img'] : '';
    $rankology_fno_rich_snippets_events_start_date                   = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_start_date']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_start_date'] : '';
    $rankology_fno_rich_snippets_events_start_date_timezone          = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_start_date_timezone']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_start_date_timezone'] : '';
    $rankology_fno_rich_snippets_events_start_time                   = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_start_time']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_start_time'] : '';
    $rankology_fno_rich_snippets_events_end_date                     = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_end_date']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_end_date'] : '';
    $rankology_fno_rich_snippets_events_end_time                     = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_end_time']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_end_time'] : '';
    $rankology_fno_rich_snippets_events_previous_start_date          = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_previous_start_date']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_previous_start_date'] : '';
    $rankology_fno_rich_snippets_events_previous_start_time          = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_previous_start_time']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_previous_start_time'] : '';
    $rankology_fno_rich_snippets_events_location_name                = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_location_name']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_location_name'] : '';
    $rankology_fno_rich_snippets_events_location_url                 = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_location_url']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_location_url'] : '';
    $rankology_fno_rich_snippets_events_location_address             = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_location_address']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_location_address'] : '';
    $rankology_fno_rich_snippets_events_offers_name                  = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_offers_name']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_offers_name'] : '';
    $rankology_fno_rich_snippets_events_offers_cat                   = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_offers_cat']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_offers_cat'] : '';
    $rankology_fno_rich_snippets_events_offers_price                 = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_offers_price']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_offers_price'] : '';
    $rankology_fno_rich_snippets_events_offers_price_currency        = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_offers_price_currency']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_offers_price_currency'] : '';
    $rankology_fno_rich_snippets_events_offers_availability          = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_offers_availability']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_offers_availability'] : '';
    $rankology_fno_rich_snippets_events_offers_valid_from_date       = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_offers_valid_from_date']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_offers_valid_from_date'] : '';
    $rankology_fno_rich_snippets_events_offers_valid_from_time       = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_offers_valid_from_time']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_offers_valid_from_time'] : '';
    $rankology_fno_rich_snippets_events_offers_url                   = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_offers_url']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_offers_url'] : '';
    $rankology_fno_rich_snippets_events_performer                    = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_performer']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_performer'] : '';
    $rankology_fno_rich_snippets_events_organizer_name               = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_organizer_name']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_organizer_name'] : '';
    $rankology_fno_rich_snippets_events_organizer_url                = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_organizer_url']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_organizer_url'] : '';
    $rankology_fno_rich_snippets_events_status                       = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_status']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_status'] : '';
    $rankology_fno_rich_snippets_events_attendance_mode              = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_attendance_mode']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_events_attendance_mode'] : ''; ?>
<div class="wrap-rich-snippets-item wrap-rich-snippets-events">
    <div class="rankology-notice">
        <p>
            <?php esc_html_e('Event markup describes the details of organized events. When you use it in your content, that event becomes relevant for enhanced search results for relevant queries.', 'wp-rankology'); ?>
        </p>
    </div>

    <div class="rankology-notice is-warning">
        <ul class="advice rankology-list">
            <li>
                <?php esc_html_e('<strong>Expired events.</strong> Events data for any feature will never be shown for expired events. However, you do not have to remove markup for expired events.', 'wp-rankology'); ?>
            </li>
            <li>
                <?php esc_html_e('<strong>Indicate the performer.</strong> Each event item must specify a performer property corresponding to the event\'s performer; that is, a musician, musical group, presenter, actor, and so on.', 'wp-rankology'); ?>
            </li>
            <li>
                <?php esc_html_e('<strong>Do not include promotional elements in the name.</strong>', 'wp-rankology'); ?>
            </li>
            <ul class="sublist">
                <li>
                    <span class="dashicons dashicons-no"></span><?php esc_html_e('Promoting non-event products or services: "Trip package: San Diego/LA, 7 nights"', 'wp-rankology'); ?>
                </li>
                <li>
                    <span class="dashicons dashicons-no"></span><?php esc_html_e('Prices in event titles: "Music festival - only $10!" Instead, highlight ticket prices using the tickets property in your markup.', 'wp-rankology'); ?>
                </li>
                <li>
                    <span class="dashicons dashicons-no"></span><?php esc_html_e('Using a non-event for a title, such as: "Sale on dresses!"', 'wp-rankology'); ?>
                </li>
                <li>
                    <span class="dashicons dashicons-no"></span><?php esc_html_e('Discounts or purchase opportunties, such as: "Concert - buy your tickets now," or "Concert - 50 percent off until Saturday!"', 'wp-rankology'); ?>
                </li>
            </ul>
            <li>
                <?php esc_html_e('<strong>Multi-day events.</strong> If your event/ticket info is for the festival itself, specify both the start and end date of the festival. If your event/ticket info is for a specific performance that is part of the festival, specify the specific date of the performance. If the specific date is unavailable, specify both the start and end date of the festival.', 'wp-rankology'); ?>
            </li>
        </ul>
    </div>

    <p>
        <label for="rankology_fno_rich_snippets_events_type_meta">
            <?php esc_html_e('Select your event type', 'wp-rankology'); ?>
        </label>
        <select id="rankology_fno_rich_snippets_events_type_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_events_type]">
            <option <?php selected('BusinessEvent', $rankology_fno_rich_snippets_events_type); ?>
                value="BusinessEvent"><?php esc_html_e('Business Event', 'wp-rankology'); ?>
            </option>
            <option <?php selected('ChildrensEvent', $rankology_fno_rich_snippets_events_type); ?>
                value="ChildrensEvent">
                <?php esc_html_e('Children\'s Event', 'wp-rankology'); ?>
            </option>
            <option <?php selected('ComedyEvent', $rankology_fno_rich_snippets_events_type); ?>
                value="ComedyEvent">
                <?php esc_html_e('Comedy Event', 'wp-rankology'); ?>
            </option>
            <option <?php selected('CourseInstance', $rankology_fno_rich_snippets_events_type); ?>
                value="CourseInstance">
                <?php esc_html_e('Course Instance', 'wp-rankology'); ?>
            </option>
            <option <?php selected('DanceEvent', $rankology_fno_rich_snippets_events_type); ?>
                value="DanceEvent">
                <?php esc_html_e('Dance Event', 'wp-rankology'); ?>
            </option>
            <option <?php selected('DeliveryEvent', $rankology_fno_rich_snippets_events_type); ?>
                value="DeliveryEvent">
                <?php esc_html_e('Delivery Event', 'wp-rankology'); ?>
            </option>
            <option <?php selected('EducationEvent', $rankology_fno_rich_snippets_events_type); ?>
                value="EducationEvent">
                <?php esc_html_e('Education Event', 'wp-rankology'); ?>
            </option>
            <option <?php selected('ExhibitionEvent', $rankology_fno_rich_snippets_events_type); ?>
                value="ExhibitionEvent">
                <?php esc_html_e('Exhibition Event', 'wp-rankology'); ?>
            </option>
            <option <?php selected('Festival', $rankology_fno_rich_snippets_events_type); ?>
                value="Festival">
                <?php esc_html_e('Festival', 'wp-rankology'); ?>
            </option>
            <option <?php selected('FoodEvent', $rankology_fno_rich_snippets_events_type); ?>
                value="FoodEvent">
                <?php esc_html_e('Food Event', 'wp-rankology'); ?>
            </option>
            <option <?php selected('LiteraryEvent', $rankology_fno_rich_snippets_events_type); ?>
                value="LiteraryEvent">
                <?php esc_html_e('Literary Event', 'wp-rankology'); ?>
            </option>
            <option <?php selected('MusicEvent', $rankology_fno_rich_snippets_events_type); ?>
                value="MusicEvent">
                <?php esc_html_e('Music Event', 'wp-rankology'); ?>
            </option>
            <option <?php selected('PublicationEvent', $rankology_fno_rich_snippets_events_type); ?>
                value="PublicationEvent">
                <?php esc_html_e('Publication Event', 'wp-rankology'); ?>
            </option>
            <option <?php selected('SaleEvent', $rankology_fno_rich_snippets_events_type); ?>
                value="SaleEvent">
                <?php esc_html_e('Sale Event', 'wp-rankology'); ?>
            </option>
            <option <?php selected('ScreeningEvent', $rankology_fno_rich_snippets_events_type); ?>
                value="ScreeningEvent">
                <?php esc_html_e('Screening Event', 'wp-rankology'); ?>
            </option>
            <option <?php selected('SocialEvent', $rankology_fno_rich_snippets_events_type); ?>
                value="SocialEvent">
                <?php esc_html_e('Social Event', 'wp-rankology'); ?>
            </option>
            <option <?php selected('SportsEvent', $rankology_fno_rich_snippets_events_type); ?>
                value="SportsEvent">
                <?php esc_html_e('Sports Event', 'wp-rankology'); ?>
            </option>
            <option <?php selected('TheaterEvent', $rankology_fno_rich_snippets_events_type); ?>
                value="TheaterEvent">
                <?php esc_html_e('Theater Event', 'wp-rankology'); ?>
            </option>
            <option <?php selected('VisualArtsEvent', $rankology_fno_rich_snippets_events_type); ?>
                value="VisualArtsEvent">
                <?php esc_html_e('Visual Arts Event', 'wp-rankology'); ?>
            </option>
        </select>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_events_name_meta">
            <?php esc_html_e('Event name', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_events_name_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_events_name]"
            placeholder="<?php echo esc_html__('The name of your event', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Event name', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_events_name; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_events_desc">
            <?php esc_html_e('Event description (default excerpt, or beginning of the content)', 'wp-rankology'); ?>
        </label>
        <textarea id="rankology_fno_rich_snippets_events_desc"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_events_desc]"
            placeholder="<?php echo esc_html__('Enter your event description', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Event description', 'wp-rankology'); ?>"><?php echo $rankology_fno_rich_snippets_events_desc; ?></textarea>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_events_img_meta">
            <?php esc_html_e('Image thumbnail', 'wp-rankology'); ?>
        </label>
        <input id="rankology_fno_rich_snippets_events_img_meta" type="text"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_events_img]"
            placeholder="<?php echo esc_html__('Select your image', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Image thumbnail', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_events_img; ?>" />
        <span class="description"><?php esc_html_e('Minimum width: 720px - Recommended size: 1920px -  .jpg, .png, or. gif format - crawlable and indexable', 'wp-rankology'); ?></span>
        <input id="rankology_fno_rich_snippets_events_img" class="<?php echo rankology_btn_secondary_classes(); ?> rankology_media_upload"
            type="button"
            value="<?php esc_html_e('Upload an Image', 'wp-rankology'); ?>" />
    </p>
    <p>
        <label for="rankology-date-picker1">
            <?php esc_html_e('Start date', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology-date-picker1" class="rankology-date-picker" autocomplete="off"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_events_start_date]"
            placeholder="<?php echo esc_html__('e.g. YYYY-MM-DD', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Start date', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_events_start_date; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_events_start_date_timezone_meta">
            <?php esc_html_e('Timezone', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_events_start_date_timezone_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_events_start_date_timezone]"
            placeholder="<?php echo esc_html__('Timezone start date', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Timezone', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_events_start_date_timezone; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_events_start_time_meta">
            <?php esc_html_e('Start time', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_events_start_time_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_events_start_time]"
            placeholder="<?php echo esc_html__('e.g. HH:MM', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Start time', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_events_start_time; ?>" />
    </p>
    <p>
        <label for="rankology-date-picker2">
            <?php esc_html_e('End date', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology-date-picker2" class="rankology-date-picker" autocomplete="off"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_events_end_date]"
            placeholder="<?php echo esc_html__('e.g. YYYY-MM-DD', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('End date', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_events_end_date; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_events_end_time_meta">
            <?php esc_html_e('End time', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_events_end_time_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_events_end_time]"
            placeholder="<?php echo esc_html__('e.g. HH:MM', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('End time', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_events_end_time; ?>" />
    </p>
    <p>
        <label for="rankology-date-picker7">
            <?php esc_html_e('Previous start date', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology-date-picker7" class="rankology-date-picker" autocomplete="off"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_events_previous_start_date]"
            placeholder="<?php echo esc_html__('e.g. YYYY-MM-DD', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Previous start date', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_events_previous_start_date; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_events_previous_start_time_meta">
            <?php esc_html_e('Previous start time', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_events_previous_start_time_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_events_previous_start_time]"
            placeholder="<?php echo esc_html__('e.g. HH:MM', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Previous start time', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_events_previous_start_time; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_events_location_name_meta">
            <?php esc_html_e('Location name', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_events_location_name_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_events_location_name]"
            placeholder="<?php echo esc_html__('e.g. My Local Business name', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Location name', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_events_location_name; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_events_location_url_meta">
            <?php esc_html_e('Location Website', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_events_location_url_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_events_location_url]"
            placeholder="<?php echo esc_html__('e.g. https://www.example.com', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Location Website', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_events_location_url; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_events_location_address_meta">
            <?php esc_html_e('Location Address', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_events_location_address_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_events_location_address]"
            placeholder="<?php echo esc_html__('e.g. 1 Avenue de l\'Imperatrice, 64200 Biarritz', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Location Address', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_events_location_address; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_events_offers_name_meta">
            <?php esc_html_e('Offer name', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_events_offers_name_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_events_offers_name]"
            aria-label="<?php esc_html_e('Offer name', 'wp-rankology'); ?>"
            placeholder="<?php echo esc_html__('e.g. General admission', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_events_offers_name; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_events_offers_cat_meta"><?php esc_html_e('Select your offer category', 'wp-rankology'); ?>
        </label>
        <select id="rankology_fno_rich_snippets_events_offers_cat_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_events_offers_cat]">
            <option <?php selected('Primary', $rankology_fno_rich_snippets_events_offers_cat); ?>
                value="Primary"><?php esc_html_e('Primary', 'wp-rankology'); ?>
            </option>
            <option <?php selected('Secondary', $rankology_fno_rich_snippets_events_offers_cat); ?>
                value="Secondary"><?php esc_html_e('Secondary', 'wp-rankology'); ?>
            </option>
            <option <?php selected('Presale', $rankology_fno_rich_snippets_events_offers_cat); ?>
                value="Presale"><?php esc_html_e('Presale', 'wp-rankology'); ?>
            </option>
            <option <?php selected('Premium', $rankology_fno_rich_snippets_events_offers_cat); ?>
                value="Premium"><?php esc_html_e('Premium', 'wp-rankology'); ?>
            </option>
        </select>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_events_offers_price_meta">
            <?php esc_html_e('Price', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_events_offers_price_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_events_offers_price]"
            placeholder="<?php echo esc_html__('e.g. 10', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Price', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_events_offers_price; ?>" />
        <span class="description">
            <?php esc_html_e('The lowest available price, including service charges and fees, of this type of ticket.', 'wp-rankology'); ?>
        </span>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_events_offers_price_currency_meta"><?php esc_html_e('Select your currency', 'wp-rankology'); ?>
        </label>
        <select id="rankology_fno_rich_snippets_events_offers_price_currency_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_events_offers_price_currency]">
            <?php foreach ($options_currencies as $item) { ?>
            <option <?php selected($item['value'], $rankology_fno_rich_snippets_events_offers_price_currency); ?>
                value="<?php echo $item['value']; ?>">
                <?php echo $item['label']; ?>
            </option>
            <?php } ?>
        </select>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_events_offers_availability_meta"><?php esc_html_e('Availability', 'wp-rankology'); ?>
        </label>
        <select id="rankology_fno_rich_snippets_events_offers_availability_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_events_offers_availability]">
            <option <?php selected('InStock', $rankology_fno_rich_snippets_events_offers_availability); ?>
                value="InStock"><?php esc_html_e('In Stock', 'wp-rankology'); ?>
            </option>
            <option <?php selected('SoldOut', $rankology_fno_rich_snippets_events_offers_availability); ?>
                value="SoldOut"><?php esc_html_e('Sold Out', 'wp-rankology'); ?>
            </option>
            <option <?php selected('PreOrder', $rankology_fno_rich_snippets_events_offers_availability); ?>
                value="PreOrder"><?php esc_html_e('Pre Order', 'wp-rankology'); ?>
            </option>
        </select>
    </p>
    <p>
        <label for="rankology-date-picker3">
            <?php esc_html_e('Valid From', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology-date-picker3" class="rankology-date-picker" autocomplete="off"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_events_offers_valid_from_date]"
            aria-label="<?php esc_html_e('The date when tickets go on sale', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_events_offers_valid_from_date; ?>" />

        <span class="description">
            <?php esc_html_e('The date when tickets go on sale', 'wp-rankology'); ?>
        </span>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_events_offers_valid_from_meta_time">
            <?php esc_html_e('Time', 'wp-rankology'); ?>
        </label>
        <span class="description"><?php esc_html_e('The time when tickets go on sale', 'wp-rankology'); ?></span>
        <input type="time" id="rankology_fno_rich_snippets_events_offers_valid_from_meta_time"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_events_offers_valid_from_time]"
            aria-label="<?php esc_html_e('The time when tickets go on sale', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_events_offers_valid_from_time; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_events_offers_url_meta">
            <?php esc_html_e('Website to buy tickets', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_events_offers_url_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_events_offers_url]"
            placeholder="<?php echo esc_html__('e.g. https://www.example.com', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Website to buy tickets', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_events_offers_url; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_events_performer_meta">
            <?php esc_html_e('Performer name', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_events_performer_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_events_performer]"
            placeholder="<?php echo esc_html__('e.g. Lana Del Rey', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Performer name', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_events_performer; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_events_organizer_name_meta">
            <?php esc_html_e('Organizer name', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_events_organizer_name_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_events_organizer_name]"
            placeholder="<?php echo esc_html__('e.g. Apple', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Organizer name', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_events_organizer_name; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_events_organizer_url_meta">
            <?php esc_html_e('Organizer URL', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_events_organizer_url_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_events_organizer_url]"
            placeholder="<?php echo esc_html__('e.g. https://www.example.com', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Organizer URL', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_events_organizer_url; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_events_status_meta"><?php esc_html_e('Select your event status', 'wp-rankology'); ?>
        </label>
        <select id="rankology_fno_rich_snippets_events_status_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_events_status]">
            <option <?php selected('none', $rankology_fno_rich_snippets_events_status); ?>
                value="none"><?php esc_html_e('Select a status event', 'wp-rankology'); ?>
            </option>
            <option <?php selected('EventCancelled', $rankology_fno_rich_snippets_events_status); ?>
                value="EventCancelled"><?php esc_html_e('Event cancelled', 'wp-rankology'); ?>
            </option>
            <option <?php selected('EventMovedOnline', $rankology_fno_rich_snippets_events_status); ?>
                value="EventMovedOnline"><?php esc_html_e('Event moved online', 'wp-rankology'); ?>
            </option>
            <option <?php selected('EventPostponed', $rankology_fno_rich_snippets_events_status); ?>
                value="EventPostponed"><?php esc_html_e('Event postponed', 'wp-rankology'); ?>
            </option>
            <option <?php selected('EventRescheduled', $rankology_fno_rich_snippets_events_status); ?>
                value="EventRescheduled"><?php esc_html_e('Event rescheduled', 'wp-rankology'); ?>
            </option>
            <option <?php selected('EventScheduled', $rankology_fno_rich_snippets_events_status); ?>
                value="EventScheduled"><?php esc_html_e('Event scheduled', 'wp-rankology'); ?>
            </option>
        </select>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_events_attendance_mode_meta"><?php esc_html_e('Select your event attendance mode', 'wp-rankology'); ?>
        </label>
        <select id="rankology_fno_rich_snippets_events_attendance_mode_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_events_attendance_mode]">
            <option <?php selected('none', $rankology_fno_rich_snippets_events_attendance_mode); ?>
                value="none"><?php esc_html_e('Select your event attendance mode', 'wp-rankology'); ?>
            </option>
            <option <?php selected('OfflineEventAttendanceMode', $rankology_fno_rich_snippets_events_attendance_mode); ?>
                value="OfflineEventAttendanceMode"><?php esc_html_e('Offline event', 'wp-rankology'); ?>
            </option>
            <option <?php selected('OnlineEventAttendanceMode', $rankology_fno_rich_snippets_events_attendance_mode); ?>
                value="OnlineEventAttendanceMode"><?php esc_html_e('Online event', 'wp-rankology'); ?>
            </option>
            <option <?php selected('MixedEventAttendanceMode', $rankology_fno_rich_snippets_events_attendance_mode); ?>
                value="MixedEventAttendanceMode"><?php esc_html_e('Mixed event', 'wp-rankology'); ?>
            </option>
        </select>
    </p>
</div>
<?php
}
