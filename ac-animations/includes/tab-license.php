<?php

function acanimations_tab_license() {
    $description = "One license per one website. Please check your domain name, the license would be very similar.";

    $license = get_option('acanimations_license_key');
    if (empty($license)) {
        $description = "Use the key sent to your email." . $description;
    } else {
        if (acanimations_is_license_valid($license)) {
            $description = "<strong class=\"success\">License is valid!</strong> One license per one website. Please check your domain name, the license would be very similar.";
            $description .= '<br>Animations will not work if license belong to incorrect domain.';
        } else {
            $description = "<strong>License '$license' is incorrect</strong> Use the key sent to your email. " . $description;
            update_option('acanimations_license_key', '');
            $license = '';
        }
    }

    $special_offer = file_get_contents('https://animate-conversions.web.app/p/wp/offer.html');
    ?>
    <h2>Get the full potential from AC Animations</h2>
    <p>Get access to all animations and customisation flexibility.</p>
    <div class="acanimations-license-container">
        <div class="acanimations-license-card acanimations-license-trial">
            <b class="acanimations-title">FREE Trial</b>
            <ul>
                <li>✓ Animate Multiple Elements</li>
                <li>✓ Customize Elements Selector (include specific div's)</li>
            </ul>
            <a href="https://animateconversions.com/#pricing" target="_blank">Get FREE Trial</a>
            <p>
                7 Days Free Trial
            </p>
        </div>

        <div class="acanimations-license-card">
            <b class="acanimations-title">Upgrade to Full Version</b>
            <ul>
                <li>✓ Animate Multiple Elements</li>
                <li>✓ Customize Elements Selector (include specific div's)</li>
                <li>✓ Priority Support</li>
                <li>✓ All Feature Updates</li>
            </ul>
            <a href="https://animateconversions.com/#pricing" target="_blank">Get License</a>
            <p>
                Get Monthly or Annual (<b class="success">-20%</b>) subscription.
                <br>Tired of subscriptions? Buy a Lifetime access.
            </p>
        </div>

        <?php echo wp_kses_post($special_offer); ?>
    </div>
    <h3>Paste your License</h3>
    <form method="post" action="options.php">
        <?php settings_fields('acanimations_license_group'); ?>
        <input type="text" name="acanimations_license_key" value="<?php echo esc_attr($license); ?>" placeholder="Enter your license key">
        <p class="description"><?php echo wp_kses($description, array('br' => array(), 'strong' => array('class' => true)));?></p>
        <?php submit_button('Submit license'); ?>
    </form>
<?php
}

