<div class="guarantee-block">
    <div class="go-pro-widget">
        <h2 class="go-pro-headline">
            <em><?php _e('Pro Features', COUPON_PLUGIN_TEXT_DOMAIN); ?></em>
        </h2>
        <div class="pro-feature-box">
            <span class="pro-feature-list">
                <span class="number"><?php _e('1', COUPON_PLUGIN_TEXT_DOMAIN); ?></span>
                <span class="feature-text"><?php _e('All Free Features', COUPON_PLUGIN_TEXT_DOMAIN); ?></span>
            </span>
            <span class="pro-feature-list">
                <span class="number"><?php _e('2', COUPON_PLUGIN_TEXT_DOMAIN); ?></span>
                <span class="feature-text"><?php _e('Affiliate Link Cloaking', COUPON_PLUGIN_TEXT_DOMAIN); ?></span>
            </span>
            <span class="pro-feature-list">
                <span class="number"><?php _e('3', COUPON_PLUGIN_TEXT_DOMAIN); ?></span>
                <span class="feature-text"><?php _e('Insert Shortcode From Editor', COUPON_PLUGIN_TEXT_DOMAIN); ?></span>
            </span>
            <span class="pro-feature-list">
                <span class="number"><?php _e('4', COUPON_PLUGIN_TEXT_DOMAIN); ?></span>
                <span class="feature-text"><?php _e('Coupon Share', COUPON_PLUGIN_TEXT_DOMAIN); ?></span>
            </span>
            <span class="pro-feature-list">
                <span class="number"><?php _e('5', COUPON_PLUGIN_TEXT_DOMAIN); ?></span>
                <span class="feature-text"><?php _e('Coupon Vote', COUPON_PLUGIN_TEXT_DOMAIN); ?></span>
            </span>
            <span class="pro-feature-list">
                <span class="number"><?php _e('6', COUPON_PLUGIN_TEXT_DOMAIN); ?></span>
                <span class="feature-text"><?php _e('Coupon Popup', COUPON_PLUGIN_TEXT_DOMAIN); ?></span>
            </span>
            <span class="pro-feature-list">
                <span class="number"><?php _e('7', COUPON_PLUGIN_TEXT_DOMAIN); ?></span>
                <span class="feature-text"><?php _e('Click To Copy', COUPON_PLUGIN_TEXT_DOMAIN); ?></span>
            </span>
            <span class="pro-feature-list">
                <span class="number"><?php _e('8', COUPON_PLUGIN_TEXT_DOMAIN); ?></span>
                <span class="feature-text"><?php _e('Coupon Shortcode For Grid Look', COUPON_PLUGIN_TEXT_DOMAIN); ?></span>
            </span>
            <span class="pro-feature-list">
                <span class="number"><?php _e('9', COUPON_PLUGIN_TEXT_DOMAIN); ?></span>
                <span class="feature-text"><?php _e('Category Wise Coupon Shortcode', COUPON_PLUGIN_TEXT_DOMAIN); ?></span>
            </span>
            <span class="pro-feature-list">
                <span class="number"><?php _e('10', COUPON_PLUGIN_TEXT_DOMAIN); ?></span>
                <span class="feature-text"><?php _e('Store Wise Coupon Shortcode', COUPON_PLUGIN_TEXT_DOMAIN); ?></span>
            </span>
        </div>
    </div>
    <div class="go-pro-widget">
        <h2 class="go-pro-headline">
            <em><?php _e('Plan starts at $29.99 only', COUPON_PLUGIN_TEXT_DOMAIN); ?></em>
        </h2>
        <form class="go-pro-subscriber-form" id="coupon-plugin-subscribe">
            <input type="hidden" name="apiKey" value="f8KvObp1fCaorGHz5MW10aPpL4L4q6aH">
            <fieldset>

                <legend><?php _e('Get Flat 20% Off Coupon On Pro Plan', COUPON_PLUGIN_TEXT_DOMAIN); ?></legend>

                <input class="input" type="text" id="name" name="name" value="<?php esc_attr_e($current_user->display_name); ?>" required>

                <input class="input" type="email" id="mail" name="email" value="<?php esc_attr_e($current_user->user_email); ?>" required>


            </fieldset>
            <button type="submit" id="coupon-plugin-subscribe-btn"><?php _e('Get Coupon', COUPON_PLUGIN_TEXT_DOMAIN); ?></button>
        </form>
        <script>
            document.querySelector("#coupon-plugin-subscribe").addEventListener('submit', onEmailSubmit);

            function onEmailSubmit(e) {
                e.preventDefault();
                const formData = new FormData(e.target);
                const formObject = Object.fromEntries(formData.entries());

                const submitButton = document.querySelector("#coupon-plugin-subscribe-btn");
                submitButton.disabled = true;
                submitButton.innerHTML = "<div style='display: flex; align-items: center; justify-content: center;'><p style='font-size: 16px; color: #fff; padding: 0; margin:0;margin-right: 10px; '>Creating..</p><style>.loader {border: 4px solid #f3f3f3;border-top: 4px solid #3498db;border-radius: 50%;width: 15px;height: 15px;animation: spin 2s linear infinite;}@keyframes spin {0% { transform: rotate(0deg); }100% { transform: rotate(360deg); }}</style><div class='loader'></div></div>"
                fetch('https://wpcouponplugin.com/wp-json/subscribe/v1/new', {
                    method: "POST",
                    headers: {
                        'Content-Type': 'application/json',
                        'x-api-key': formObject.apiKey
                    },
                    body: JSON.stringify({
                        name: formObject.name,
                        email: formObject.email
                    })
                }).then(() => {
                    submitButton.innerHTML = "<p style='font-size: 16px; color: #fff; padding: 0; margin:0;margin-right: 10px;'>Discount Sent</p>";
                }).catch(() => {
                    submitButton.innerHTML = "<p style='font-size: 16px; color: #fff; padding: 0; margin:0;margin-right: 10px;'>Something went wrong</p>";
                })
            }
        </script>
    </div>
</div>
<div class="guarantee-block">
    <img class="guarantee" src="<?php echo COUPON_PLUGIN_URL . 'assets/images/moneyback-guarantee.png'; ?>" alt="money-back" style="max-width: 150px">
    <a class="go-pro-widget-title" href="https://wpcouponplugin.com" target="_blank"><?php _e('What Are You Waiting For ? Go Pro', COUPON_PLUGIN_TEXT_DOMAIN); ?>
        <span class="dashicons dashicons-arrow-right"></span></a>
</div>