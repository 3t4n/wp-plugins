<div class="ui stackable grid" id="ARAC_INTEGRATION_TYPE-container">
    <input type="hidden" value="<?php echo esc_attr($value) ?>" name="ANYCHAT_INTEGRATION_TYPE" id="integration_type">
    <div class="four wide column integration-type-option <?php echo ($value == 2)? 'active' : '' ?>" data-value="2">
        <div><?php echo esc_html__('Menu button widget', 'anychat') ?></div>
        <img class="img-responsive" src="https://api.anychat.one/img/menu-button-mockup.png">
    </div>
    <div class="four wide column integration-type-option <?php echo ($value == 1)? 'active' : '' ?>" data-value="1">
        <div><?php echo esc_html__('Standalone live chat widget', 'anychat') ?></div>
        <img class="img-responsive" src="https://api.anychat.one/img/livechat-mockup.png">
    </div>
</div>