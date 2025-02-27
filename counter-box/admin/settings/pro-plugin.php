<?php

use CounterBox\WOWP_Plugin;

defined( 'ABSPATH' ) || exit;
$default    = $options['item_order']['pro_feature'] ?? 1;
$item_order = ! empty( $default ) ? 1 : 0;
$open       = ! empty( $item_order ) ? ' open' : '';
?>

<div class="wpie-sidebar wpie-sidebar-features">
    <details class="wpie-item"<?php echo esc_attr( $open ); ?>>
        <input type="hidden" name="param[item_order][pro_feature]" class="wpie-item__toggle"
               value="<?php echo absint( $item_order ); ?>">
        <summary class="wpie-item_heading">
            <span class="wpie-item_heading_icon"><span class="wpie-icon wpie_icon-rocket wpie-color-danger"></span></span>
            <span class="wpie-item_heading_label"><?php esc_html_e( 'PRO FEATURES', 'counter-box' ); ?></span>
            <span class="wpie-item_heading_type"></span>
            <span class="wpie-item_heading_toogle">
        <span class="wpie-icon wpie_icon-chevron-down"></span>
        <span class="wpie-icon wpie_icon-chevron-up "></span>
    </span>
        </summary>
        <div class="wpie-fields__box">

            <ul>
                <li><strong>Counter (From Date)</strong> - Set a base value at a specific date and time, and then continuously increment the value at a chosen interval. This allows you to track metrics like "Current World Population" based on estimated growth rates.</li>
                <li><strong>Counter (From Weekday)</strong> - Create a counter that resets each week on a chosen weekday and starts incrementing again. This is useful for displaying statistics like "Births Today" or "Website Visits this Week."</li>
                <li><strong>Number Formatting</strong> - Enhance the readability of your counters by adding delimiters to separate large numbers.</li>
            </ul>

            <details class="wpie-details-sidebar">
                <summary>Targets:</summary>
                <div class="wpie-details-sidebar-box">
                    <ul>
                        <li><strong>Hide Block</strong> - This action hides a specific block of content on your webpage after the countdown finishes. This is useful for revealing content after a promotional period or after users complete a specific action.</li>
                        <li><strong>Show Block</strong> - This action shows a previously hidden block of content on your webpage after the countdown finishes. This allows you to display content that becomes relevant only after the counter reaches zero.</li>
                        <li><strong>Redirect</strong> - This action redirects users to a different URL after the countdown finishes. This is useful for sending users to a product page after a launch or to a confirmation page after a registration countdown.</li>
                        <li><strong>Hide the counter box</strong> - This action hides the entire counter box itself from the webpage after the countdown finishes. This provides a clean look once the countdown is complete.</li>
                        <li><strong>Show the message</strong> - This action displays a custom message of your choice on the webpage after the countdown finishes. This allows you to inform users about what happens next or provide them with additional information.</li>
                        <li><strong>Call any function</strong> - This action offers the most flexibility. It allows you to trigger any custom JavaScript function you define in your code after the countdown finishes. This enables you to perform advanced actions or integrate the counter with other functionalities on your webpage.</li>
                    </ul>
                </div>
            </details>

            <details class="wpie-details-sidebar">
                <summary>Personalization:</summary>
                <div class="wpie-details-sidebar-box">
                    <ul>
                        <li><strong>Activate by URL</strong> - Target specific pages based on URL parameters (e.g., show a counter only on page with URL parameter).</li>
                        <li><strong>Activate by Referrer URL</strong> - Tailor counter experiences for visitors arriving from particular websites.</li>
                        <li><strong>Geotargeting</strong> - Take your counter to the next level with geotargeting functionality! This powerful plugin feature allows you to display targeted counter based on the country location of your website visitors.</li>
                        <li><strong>User Role</strong> - Define which user roles (e.g., Administrator, Editor, Author) have the ability to see the counter. This can be helpful for displaying internal counter relevant only to website administrators or for specific user groups.</li>
                        <li><strong>Scheduling</strong> - Schedule counter appearances based on specific days, times, and dates. This allows you to promote temporary events or campaigns without cluttering your website permanently.</li>
                        <li><strong>Multi-Language</strong> - For websites catering to a global audience, Counter Box Pro allows you to restrict counter visibility to specific languages. This ensures users only see button relevant to their chosen language setting.</li>
                    </ul>
                </div>
            </details>


            <details class="wpie-details-sidebar">
                <summary>Technical Advantages:</summary>
                <div class="wpie-details-sidebar-box">
                    <ul>
                        <li><strong>Titles</strong> - Add titles for counter elements.</li>
                        <li><strong>Responsive Visibility</strong> - Choose to hide the counter on mobile or desktop devices to optimize for different screen sizes.</li>
                        <li><strong>Browsers:</strong> - Deactivate counters selectively for specific browsers.</li>
                    </ul>

                </div>
            </details>

        </div>
    </details>
    <div class="wpie-buttons">
        <a href="https://demo.wow-estore.com/counter-box-pro/" class="wpie-button is-demo" target="_blank">Demo</a>
        <a href="https://wow-estore.com/item/counter-box-pro/" class="wpie-button is-pro" target="_blank">GET PRO</a>
    </div>
</div>
