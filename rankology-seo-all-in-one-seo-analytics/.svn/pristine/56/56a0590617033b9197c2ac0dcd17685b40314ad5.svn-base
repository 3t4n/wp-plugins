<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

function rankology_get_schema_metaboxe_local_business($rankology_fno_rich_snippets_data, $key_schema = 0) {
    $rankology_fno_rich_snippets_lb_name = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_lb_name']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_lb_name'] : '';
    $rankology_fno_rich_snippets_lb_type = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_lb_type']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_lb_type'] : '';
    $rankology_fno_rich_snippets_lb_cuisine = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_lb_cuisine']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_lb_cuisine'] : '';
    $rankology_fno_rich_snippets_lb_menu = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_lb_menu']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_lb_menu'] : '';
    $rankology_fno_rich_snippets_lb_accepts_reservations = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_lb_accepts_reservations']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_lb_accepts_reservations'] : '';
    $rankology_fno_rich_snippets_lb_img = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_lb_img']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_lb_img'] : '';
    $rankology_fno_rich_snippets_lb_img_width = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_lb_img_width']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_lb_img_width'] : '';
    $rankology_fno_rich_snippets_lb_img_height = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_lb_img_height']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_lb_img_height'] : '';
    $rankology_fno_rich_snippets_lb_street_addr = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_lb_street_addr']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_lb_street_addr'] : '';
    $rankology_fno_rich_snippets_lb_city = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_lb_city']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_lb_city'] : '';
    $rankology_fno_rich_snippets_lb_state = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_lb_state']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_lb_state'] : '';
    $rankology_fno_rich_snippets_lb_pc = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_lb_pc']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_lb_pc'] : '';
    $rankology_fno_rich_snippets_lb_country = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_lb_country']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_lb_country'] : '';
    $rankology_fno_rich_snippets_lb_lat = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_lb_lat']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_lb_lat'] : '';
    $rankology_fno_rich_snippets_lb_lon = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_lb_lon']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_lb_lon'] : '';
    $rankology_fno_rich_snippets_lb_website = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_lb_website']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_lb_website'] : '';
    $rankology_fno_rich_snippets_lb_tel = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_lb_tel']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_lb_tel'] : '';
    $rankology_fno_rich_snippets_lb_price = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_lb_price']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_lb_price'] : '';

    $rankology_fno_rich_snippets_lb_opening_hours = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_lb_opening_hours']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_lb_opening_hours'] : [];

    // Rankology < 3.9
    // Double dimension required as a result of migration 3.9
    $rankology_fno_rich_snippets_lb_opening_hours = ['0' => $rankology_fno_rich_snippets_lb_opening_hours];

    $rankology_lb_types = rankology_lb_types_list();

    $options = $rankology_fno_rich_snippets_lb_opening_hours;

    $days = [__('Monday', 'wp-rankology'), __('Tuesday', 'wp-rankology'), __('Wednesday', 'wp-rankology'), __('Thursday', 'wp-rankology'), __('Friday', 'wp-rankology'), __('Saturday', 'wp-rankology'), __('Sunday', 'wp-rankology')];

    $hours = ['00', '01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23'];

    $mins = ['00', '15', '30', '45', '59']; ?>
<div class="wrap-rich-snippets-item wrap-rich-snippets-local-business">
    <div class="rankology-notice">
        <p>
            <?php esc_html_e('When users search for businesses on Google Search or Maps, Search results may display a prominent Knowledge Graph card with details about a business that matched the query. ', 'wp-rankology'); ?>
        </p>
    </div>
    <p>
        <label for="rankology_fno_rich_snippets_lb_name_meta">
            <?php esc_html_e('Name of your business', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_lb_name_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_lb_name]"
            placeholder="<?php echo esc_html__('e.g. My Local Business', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Name of your business', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_lb_name; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_lb_type_meta"><?php esc_html_e('Select a business type', 'wp-rankology'); ?></label>
        <select id="rankology_fno_rich_snippets_lb_type_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_lb_type]">';
            <?php foreach ($rankology_lb_types as $type_value => $type_i18n) { ?>
            <option <?php selected($type_value, $rankology_fno_rich_snippets_lb_type); ?>
                value="<?php echo $type_value; ?>">
                <?php echo $type_i18n; ?>
            </option>
            <?php } ?>
        </select>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_lb_img_meta">
            <?php esc_html_e('Image', 'wp-rankology'); ?>
        </label>
        <span class="description"><?php esc_html_e('Every page must contain at least one image (whether or not you include markup). Google will pick the best image to display in Search results based on the aspect ratio and resolution.<br> Image URLs must be crawlable and indexable.<br> Images must represent the marked up content.<br> Images must be in .jpg, .png, or. gif format.<br> For best results, provide multiple high-resolution images (minimum of 50K pixels when multiplying width and height) with the following aspect ratios: 16x9, 4x3, and 1x1.', 'wp-rankology'); ?></span>
        <input id="rankology_fno_rich_snippets_lb_img_meta" type="text"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_lb_img]"
            placeholder="<?php echo esc_html__('Select your image', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Image', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_lb_img; ?>" />
        <input id="rankology_fno_rich_snippets_lb_img_width" type="hidden"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_lb_img_width]"
            value="<?php echo $rankology_fno_rich_snippets_lb_img_width; ?>" />
        <input id="rankology_fno_rich_snippets_lb_img_height" type="hidden"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_lb_img_height]"
            value="<?php echo $rankology_fno_rich_snippets_lb_img_height; ?>" />
        <input id="rankology_fno_rich_snippets_lb_img"
            class="<?php echo rankology_btn_secondary_classes(); ?> rankology_media_upload"
            type="button"
            value="<?php esc_html_e('Upload an Image', 'wp-rankology'); ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_lb_street_addr_meta">
            <?php esc_html_e('Street Address', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_lb_street_addr_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_lb_street_addr]"
            placeholder="<?php echo esc_html__('e.g. Place Bellevue', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Street Address', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_lb_street_addr; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_lb_city_meta">
            <?php esc_html_e('City', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_lb_city_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_lb_city]"
            placeholder="<?php echo esc_html__('e.g. Biarritz', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('City', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_lb_city; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_lb_state_meta">
            <?php esc_html_e('State', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_lb_state_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_lb_state]"
            placeholder="<?php echo esc_html__('e.g. Nouvelle Aquitaine', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('State', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_lb_state; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_lb_pc_meta">
            <?php esc_html_e('Postal code', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_lb_pc_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_lb_pc]"
            placeholder="<?php echo esc_html__('e.g. 64200', 'wp-rankology') . '" aria-label="' . __('Postal code', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_lb_pc; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_lb_country_meta">
            <?php esc_html_e('Country', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_lb_country_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_lb_country]"
            placeholder="<?php echo esc_html__('e.g. France', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Country', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_lb_country; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_lb_lat_meta">
            <?php esc_html_e('Latitude', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_lb_lat_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_lb_lat]"
            placeholder="<?php echo esc_html__('e.g. 43.4831389', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Latitude', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_lb_lat; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_lb_lon_meta">
            <?php esc_html_e('Longitude', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_lb_lon_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_lb_lon]"
            placeholder="<?php echo esc_html__('e.g. -1.5630987', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Longitude', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_lb_lon; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_lb_website_meta">
            <?php esc_html_e('URL', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_lb_website_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_lb_website]"
            placeholder="<?php printf(esc_html__('e.g. %s', 'wp-rankology'), get_home_url()); ?>"
            aria-label="<?php esc_html_e('URL', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_lb_website; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_lb_tel_meta">
            <?php esc_html_e('Telephone', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_lb_tel_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_lb_tel]"
            placeholder="<?php echo esc_html__('e.g. +11501020304', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Telephone', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_lb_tel; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_lb_price_meta">
            <?php esc_html_e('Price range', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_lb_price_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_lb_price]"
            placeholder="<?php echo esc_html__('e.g. $$, €€€, or ££££...', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Price', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_lb_price; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_lb_cuisine_meta">
            <?php esc_html_e('Cuisine served', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_lb_cuisine_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_lb_cuisine]"
            placeholder="<?php echo esc_html__('e.g. French, Italian, Indian, American', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('The type of cuisine the restaurant serves.', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_lb_cuisine; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_lb_menu_meta">
            <?php esc_html_e('URL of the menu', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_lb_menu_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_lb_menu]"
            placeholder="<?php printf(esc_html__('e.g. %s', 'wp-rankology'), get_home_url()); ?>"
            aria-label="<?php esc_html_e('The URL of the menu.', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_lb_menu; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_lb_accepts_reservations_meta">
            <?php esc_html_e('Accepts reservations', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_lb_accepts_reservations_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_lb_accepts_reservations]"
            placeholder="<?php echo esc_html__('e.g. True', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Accepts reservations ', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_lb_accepts_reservations; ?>" />
        <span class="description"><?php esc_html_e('Indicates whether a FoodEstablishment accepts reservations. Values can be Boolean (True or False), an URL at which reservations can be made or (for backwards compatibility) the strings Yes or No.', 'wp-rankology'); ?></span>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_lb_opening_hours_meta">
            <?php esc_html_e('Opening hours', 'wp-rankology'); ?>
        </label>
        <span class="description"><?php esc_html_e('<strong>Morning and Afternoon are just time slots</strong>. e.g. if you\'re opened from 10:00 AM to 9:00 PM, check Morning and enter 10:00 / 21:00. If you are open non-stop, check Morning and enter 0:00 / 23:59.', 'wp-rankology'); ?></span>
    </p>



    <ul class="wrap-opening-hours">

        <?php foreach ($days as $key => $day) { ?>
        <?php
            $check_day = isset($options[0]['rankology_local_business_opening_hours'][$key]['open']);

            $check_day_am = isset($options[0]['rankology_local_business_opening_hours'][$key]['am']['open']);

            $check_day_pm = isset($options[0]['rankology_local_business_opening_hours'][$key]['pm']['open']);

            $selected_start_hours = isset($options[0]['rankology_local_business_opening_hours'][$key]['am']['start']['hours']) ? $options[0]['rankology_local_business_opening_hours'][$key]['am']['start']['hours'] : null;

            $selected_start_mins = isset($options[0]['rankology_local_business_opening_hours'][$key]['am']['start']['mins']) ? $options[0]['rankology_local_business_opening_hours'][$key]['am']['start']['mins'] : null;

            ?>

        <li>
            <span class="day"><strong><?php echo $day; ?></strong></span>
            <ul>
                <?php //Closed??>
                <li>
                    <input
                        id="rankology_local_business_opening_hours[<?php echo $key; ?>][open]"
                        name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_lb_opening_hours][rankology_local_business_opening_hours][<?php echo $key; ?>][open]"
                        type="checkbox" <?php if ('1' == $check_day) {
                echo 'checked="yes"';
            } ?>
                    value="1"
                    />

                    <label
                        for="rankology_local_business_opening_hours[<?php echo $key; ?>][open]">
                        <?php esc_html_e('Closed all the day?', 'wp-rankology'); ?>
                    </label>

                    <?php if (isset($options['rankology_local_business_opening_hours'][$key]['open'])) { ?>
                    <?php echo esc_attr($options['rankology_local_business_opening_hours'][$key]['open']); ?>
                    <?php } ?>
                </li>

                <?php //AM?>
                <li>
                    <input
                        id="rankology_local_business_opening_hours[<?php echo $key; ?>][am][open]"
                        name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_lb_opening_hours][rankology_local_business_opening_hours][<?php echo $key; ?>][am][open]"
                        type="checkbox" <?php if ('1' == $check_day_am) {
                echo 'checked="yes"';
            } ?>
                    value="1"
                    />

                    <label
                        for="rankology_local_business_opening_hours[<?php echo $key; ?>][am][open]">
                        <?php esc_html_e('Open in the morning?', 'wp-rankology'); ?>
                    </label>
                    <?php
                            if (isset($options['rankology_local_business_opening_hours'][$key]['am']['open'])) {
                                esc_attr($options['rankology_local_business_opening_hours'][$key]['am']['open']);
                            }
                            ?>

                    <select
                        id="rankology_local_business_opening_hours[<?php echo $key; ?>][am][start][hours]"
                        name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_lb_opening_hours][rankology_local_business_opening_hours][<?php echo $key; ?>][am][start][hours]">

                        <?php foreach ($hours as $hour) { ?>
                        <option <?php if ($hour == $selected_start_hours) {
                                echo 'selected="selected"';
                            } ?>
                            value="<?php echo $hour; ?>"
                            >
                            <?php echo $hour; ?>
                        </option>
                        <?php } ?>

                    </select> :

                    <select
                        id="rankology_local_business_opening_hours[<?php echo $key; ?>][am][start][mins]"
                        name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_lb_opening_hours][rankology_local_business_opening_hours][<?php echo $key; ?>][am][start][mins]">

                        <?php foreach ($mins as $min) { ?>
                        <option <?php if ($min == $selected_start_mins) {
                                echo 'selected="selected"';
                            } ?>
                            value="<?php echo $min; ?>"><?php echo $min; ?>
                        </option>
                        <?php } ?>

                    </select>
                    <?php
                            if (isset($options['rankology_local_business_opening_hours'][$key]['am']['start']['hours'])) {
                                esc_attr($options['rankology_local_business_opening_hours'][$key]['am']['start']['hours']);
                            }

                            if (isset($options['rankology_local_business_opening_hours'][$key]['am']['start']['mins'])) {
                                esc_attr($options['rankology_local_business_opening_hours'][$key]['am']['start']['mins']);
                            }
                            ?>
                    -
                    <?php
                            $selected_end_hours = isset($options[0]['rankology_local_business_opening_hours'][$key]['am']['end']['hours']) ? $options[0]['rankology_local_business_opening_hours'][$key]['am']['end']['hours'] : null;

                            $selected_end_mins = isset($options[0]['rankology_local_business_opening_hours'][$key]['am']['end']['mins']) ? $options[0]['rankology_local_business_opening_hours'][$key]['am']['end']['mins'] : null;
                            ?>
                    <select
                        id="rankology_local_business_opening_hours[<?php echo $key; ?>][am][end][hours]"
                        name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_lb_opening_hours][rankology_local_business_opening_hours][<?php echo $key; ?>][am][end][hours]">
                        <?php foreach ($hours as $hour) { ?>
                        <option <?php if ($hour == $selected_end_hours) {
                                echo 'selected="selected"';
                            } ?>
                            value="<?php echo $hour; ?>"
                            >
                            <?php echo $hour; ?>
                        </option>
                        <?php } ?>

                    </select>
                    :

                    <select
                        id="rankology_local_business_opening_hours[<?php echo $key; ?>][am][end][mins]"
                        name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_lb_opening_hours][rankology_local_business_opening_hours][<?php echo $key; ?>][am][end][mins]">

                        <?php foreach ($mins as $min) { ?>
                        <option <?php if ($min == $selected_end_mins) {
                                echo 'selected="selected"';
                            } ?>
                            value="<?php echo $min; ?>"
                            >
                            <?php echo $min; ?>
                        </option>
                        <?php } ?>

                    </select>
                </li>
        </li>

        <?php //PM?>
        <li>
            <?php
                        $selected_start_hours2 = isset($options[0]['rankology_local_business_opening_hours'][$key]['pm']['start']['hours']) ? $options[0]['rankology_local_business_opening_hours'][$key]['pm']['start']['hours'] : null;

                        $selected_start_mins2 = isset($options[0]['rankology_local_business_opening_hours'][$key]['pm']['start']['mins']) ? $options[0]['rankology_local_business_opening_hours'][$key]['pm']['start']['mins'] : null;
                        ?>
            <input
                id="rankology_local_business_opening_hours[<?php echo $key; ?>][pm][open]"
                name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_lb_opening_hours][rankology_local_business_opening_hours][<?php echo $key; ?>][pm][open]"
                type="checkbox" <?php if ('1' == $check_day_pm) {
                            echo 'checked="yes"';
                        } ?>
            value="1"
            />

            <label
                for="rankology_local_business_opening_hours[<?php echo $key; ?>][pm][open]">
                <?php esc_html_e('Open in the afternoon?', 'wp-rankology'); ?>
            </label>

            <?php
                        if (isset($options['rankology_local_business_opening_hours'][$key]['pm']['open'])) {
                            esc_attr($options['rankology_local_business_opening_hours'][$key]['pm']['open']);
                        }
                        ?>

            <select
                id="rankology_local_business_opening_hours[<?php echo $key; ?>][pm][start][hours]"
                name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_lb_opening_hours][rankology_local_business_opening_hours][<?php echo $key; ?>][pm][start][hours]">

                <?php foreach ($hours as $hour) { ?>
                <option <?php if ($hour == $selected_start_hours2) {
                            echo 'selected="selected"';
                        } ?>
                    value="<?php echo $hour; ?>"
                    >
                    <?php echo $hour; ?>
                </option>
                <?php } ?>

            </select>
            :
            <select
                id="rankology_local_business_opening_hours[<?php echo $key; ?>][pm][start][mins]"
                name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_lb_opening_hours][rankology_local_business_opening_hours][<?php echo $key; ?>][pm][start][mins]">
                <?php foreach ($mins as $min) { ?>
                <option <?php if ($min == $selected_start_mins2) {
                            echo 'selected="selected"';
                        } ?>
                    value="<?php echo $min; ?>"
                    >
                    <?php echo $min; ?>
                </option>
                <?php } ?>
            </select>
            <?php
                        if (isset($options['rankology_local_business_opening_hours'][$key]['pm']['start']['hours'])) {
                            esc_attr($options['rankology_local_business_opening_hours'][$key]['pm']['start']['hours']);
                        }

                        if (isset($options['rankology_local_business_opening_hours'][$key]['pm']['start']['mins'])) {
                            esc_attr($options['rankology_local_business_opening_hours'][$key]['pm']['start']['mins']);
                        }
                        ?>
            -
            <?php
                        $selected_end_hours2 = isset($options[0]['rankology_local_business_opening_hours'][$key]['pm']['end']['hours']) ? $options[0]['rankology_local_business_opening_hours'][$key]['pm']['end']['hours'] : null;

                        $selected_end_mins2 = isset($options[0]['rankology_local_business_opening_hours'][$key]['pm']['end']['mins']) ? $options[0]['rankology_local_business_opening_hours'][$key]['pm']['end']['mins'] : null;
                        ?>
            <select
                id="rankology_local_business_opening_hours[<?php echo $key; ?>][pm][end][hours]"
                name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_lb_opening_hours][rankology_local_business_opening_hours][<?php echo $key; ?>][pm][end][hours]">

                <?php foreach ($hours as $hour) { ?>
                <option <?php if ($hour == $selected_end_hours2) {
                            echo 'selected="selected"';
                        } ?>
                    value="<?php echo $hour; ?>">
                    <?php echo $hour; ?>
                </option>
                <?php } ?>

            </select>

            :

            <select
                id="rankology_local_business_opening_hours[<?php echo $key; ?>][pm][end][mins]"
                name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_lb_opening_hours][rankology_local_business_opening_hours][<?php echo $key; ?>][pm][end][mins]">
                <?php foreach ($mins as $min) { ?>
                <option <?php if ($min == $selected_end_mins2) {
                            echo 'selected="selected"';
                        } ?>
                    value="<?php echo $min; ?>"
                    >
                    <?php echo $min; ?>
                </option>
                <?php } ?>
            </select>
        </li>
        </li>
        <?php
            if (isset($options['rankology_local_business_opening_hours'][$key]['pm']['end']['hours'])) {
                esc_attr($options['rankology_local_business_opening_hours'][$key]['pm']['end']['hours']);
            }

            if (isset($options['rankology_local_business_opening_hours'][$key]['pm']['end']['mins'])) {
                esc_attr($options['rankology_local_business_opening_hours'][$key]['pm']['end']['mins']);
            }

            ?>
        <?php } ?>
    </ul>
</div>
<?php
}
