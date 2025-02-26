<?php

namespace RankologyFno\Services\Admin\Settings\LocalBusiness\Fields;

defined('ABSPATH') or exit('Cheatin&#8217; uh?');

use Rankology\Helpers\OpeningHoursHelper;

trait FieldOpeningHours {
    /**
     * 
     *
     * @return void
     */
    public function renderFieldOpeningHours() {
        $options = rankology_fno_get_service('OptionPro')->getLocalBusinessOpeningHours();

        $options = rankology_fno_get_service('TransformOldOpeningHours')->transform($options);

        $days = OpeningHoursHelper::getDays();
        $hours = OpeningHoursHelper::getHours();
        $mins = OpeningHoursHelper::getMinutes();

        $halfDay = ['am', 'pm']; ?>

<div class="rankology-notice">
    <p>
        <?php esc_html_e('<strong>Morning and Afternoon are just time slots</strong>.', 'wp-rankology'); ?>
    </p>
    <p>
        <?php esc_html_e('e.g. if you\'re opened from 10:00 AM to 9:00 PM, check Morning and enter 10:00 / 21:00.', 'wp-rankology'); ?>
    </p>
    <p>
        <?php esc_html_e('If you are open non-stop, check Morning and enter 0:00 / 23:59.', 'wp-rankology'); ?>
    </p>
</div>

<ul class="wrap-opening-hours">
    <?php
            foreach ($days as $key => $day) {
                $closedAllDay = isset($options[$key]['open']) ? $options[$key]['open'] : 0; ?>
    <li>
        <span class="day">
            <?php echo $day; ?>
        </span>

        <label
            for="rankology_fno_option_name[rankology_local_business_opening_hours][<?php echo $key; ?>][open]">

        <input
            id="rankology_fno_option_name[rankology_local_business_opening_hours][<?php echo $key; ?>][open]"
            name="rankology_fno_option_name[rankology_local_business_opening_hours][<?php echo $key; ?>][open]"
            type="checkbox" <?php checked($closedAllDay, '1'); ?>
            value="1"/>

            <?php esc_html_e('Closed all the day?', 'wp-rankology'); ?>
        </label>
        <?php foreach ($halfDay as $valueHalfDay) {
                    $open = isset($options[$key][$valueHalfDay]['open']) ? $options[$key][$valueHalfDay]['open'] : 0;

                    $startHours = isset($options[$key][$valueHalfDay]['start']['hours']) ? $options[$key][$valueHalfDay]['start']['hours'] : '00';
                    $endHours = isset($options[$key][$valueHalfDay]['end']['hours']) ? $options[$key][$valueHalfDay]['end']['hours'] : '00';
                    $startMins = isset($options[$key][$valueHalfDay]['start']['mins']) ? $options[$key][$valueHalfDay]['start']['mins'] : '00';
                    $endMins = isset($options[$key][$valueHalfDay]['end']['mins']) ? $options[$key][$valueHalfDay]['end']['mins'] : '00'; ?>
        <div class="hours">
            <div class="range">
                <label
                    for="rankology_fno_option_name[rankology_local_business_opening_hours][<?php echo $key; ?>][<?php echo $valueHalfDay; ?>][open]">
                    <input
                        id="rankology_fno_option_name[rankology_local_business_opening_hours][<?php echo $key; ?>][<?php echo $valueHalfDay; ?>][open]"
                        name="rankology_fno_option_name[rankology_local_business_opening_hours][<?php echo $key; ?>][<?php echo $valueHalfDay; ?>][open]"
                        type="checkbox" <?php checked($open, '1'); ?>
                    value="1"
                    />
                    <?php if ('am' === $valueHalfDay) { ?>

                    <?php esc_html_e('Open in the morning?', 'wp-rankology'); ?>
                    <?php } else { ?>
                    <?php esc_html_e('Open in the afternoon?', 'wp-rankology'); ?>
                    <?php } ?>
                </label>
            </div>

            <div class="range">
                <select
                    id="rankology_fno_option_name[rankology_local_business_opening_hours][<?php echo $key; ?>][<?php echo $valueHalfDay; ?>][start][hours]"
                    name="rankology_fno_option_name[rankology_local_business_opening_hours][<?php echo $key; ?>][<?php echo $valueHalfDay; ?>][start][hours]">
                    <?php foreach ($hours as $hour) { ?>
                    <option <?php selected($hour, $startHours); ?>
                        value="<?php echo $hour; ?>">
                        <?php echo $hour; ?>
                    </option>
                    <?php } ?>

                </select>

                <span>:</span>

                <select
                    id="rankology_fno_option_name[rankology_local_business_opening_hours][<?php echo $key; ?>][<?php echo $valueHalfDay; ?>][start][mins]"
                    name="rankology_fno_option_name[rankology_local_business_opening_hours][<?php echo $key; ?>][<?php echo $valueHalfDay; ?>][start][mins]">

                    <?php foreach ($mins as $min) { ?>
                    <option <?php selected($min, $startMins); ?>
                        value="<?php echo $min; ?>">
                        <?php echo $min; ?>
                    </option>
                    <?php } ?>

                </select>

                <span>-</span>

                <select
                    id="rankology_fno_option_name[rankology_local_business_opening_hours][<?php echo $key; ?>][<?php echo $valueHalfDay; ?>][end][hours]"
                    name="rankology_fno_option_name[rankology_local_business_opening_hours][<?php echo $key; ?>][<?php echo $valueHalfDay; ?>][end][hours]">

                    <?php foreach ($hours as $hour) { ?>
                    <option <?php selected($hour, $endHours); ?>
                        value="<?php echo $hour; ?>">
                        <?php echo $hour; ?>
                    </option>
                    <?php } ?>
                </select>

                <span>:</span>

                <select
                    id="rankology_fno_option_name[rankology_local_business_opening_hours][<?php echo $key; ?>][<?php echo $valueHalfDay; ?>][end][mins]"
                    name="rankology_fno_option_name[rankology_local_business_opening_hours][<?php echo $key; ?>][<?php echo $valueHalfDay; ?>][end][mins]">

                    <?php foreach ($mins as $min) { ?>
                    <option <?php selected($min, $endMins); ?>
                        value="<?php echo $min; ?>">
                        <?php echo $min; ?>
                    </option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <?php
                } ?>

    </li>
    <?php
            } ?>
</ul>

<p class="description">
    <?php esc_html_e('<span class="field-recommended">Recommended</span> property by Google.', 'wp-rankology'); ?>
</p>

<?php
    }
}
