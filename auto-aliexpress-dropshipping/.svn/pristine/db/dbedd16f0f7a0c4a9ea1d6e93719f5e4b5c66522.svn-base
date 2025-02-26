<div class="aliexpress-box-settings-row">

    <div class="aliexpress-box-settings-col-1">
        <span class="aliexpress-settings-label"><?php esc_html_e( 'Schedule Settings', Auto_Aliexpress::DOMAIN ); ?></span>
        <span class="aliexpress-description"><?php esc_html_e( 'Run this campaign as the WP Cron Job Schedule.', Auto_Aliexpress::DOMAIN ); ?></span>
    </div>

    <div class="aliexpress-box-settings-col-2">

        <label class="aliexpress-settings-label"><?php esc_html_e( 'Schedule Settings', Auto_Aliexpress::DOMAIN ); ?></label>

        <span class="aliexpress-description"><?php esc_html_e( 'Select Campaign Schedule use the WP Cron Job Schedule on backend.', Auto_Aliexpress::DOMAIN ); ?></span>

        <div class="range-slider">
            <input class="range-slider__range" type="range" value="<?php if(isset($settings['update_frequency'])){echo $settings['update_frequency'];}else{echo esc_html('100');}?>" min="0" max="500">
            <span class="range-slider__value">0</span>
        </div>

        <span class="aliexpress-description"><?php esc_html_e( 'Time Unit', Auto_Aliexpress::DOMAIN ); ?></span>

        <div class="select-container">
            <span class="dropdown-handle" aria-hidden="true">
                <ion-icon name="chevron-down" class="aliexpress-icon-down"></ion-icon>
            </span>
            <div class="select-list-container">
                <button type="button" class="list-value" id="aliexpress-field-unit-button" value="Minutes">
                    <?php
                    if(isset($settings['update_frequency_unit'])){
                        echo $settings['update_frequency_unit'];
                    }else{
                        esc_html_e( 'Minutes', Auto_Aliexpress::DOMAIN );
                    }
                    ?>
                </button>
                <ul tabindex="-1" role="listbox" class="list-results aliexpress-sidenav-hide-md" >
                    <li><?php esc_html_e( 'Minutes', Auto_Aliexpress::DOMAIN ); ?></li>
                    <li><?php esc_html_e( 'Hours', Auto_Aliexpress::DOMAIN ); ?></li>
                    <li><?php esc_html_e( 'Days', Auto_Aliexpress::DOMAIN ); ?></li>
                </ul>
            </div>
        </div>


    </div>

</div>
