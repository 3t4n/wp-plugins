<?php

$data = $this->db_obj->get_data();

$id = isset( $data['id'] ) && $data['id'] > 0 ? intval( $data['id'] ) : 0;

$api_key = isset( $data['api_key'] ) && $data['api_key'] != '' ? esc_attr( $data['api_key'] ) : '';

$options = isset( $data['options'] ) && $data['options'] != '' ? json_decode(esc_attr( $data['options'] ) ): '';

?>
<div class="wrap">
    <h1 class="wp-heading-inline">
        <?php
            echo __( esc_html( get_admin_page_title() ), "ays-chatgpt-assistant" );
        ?>
    </h1>

    <div id="poststuff">
        <div id="post-body" class="metabox-holder">
            <div id="post-body-content">
                <div class="meta-box-sortables ui-sortable">
                    <form method="post">
                        <input type="hidden" name="ays_chatgpt_assistant_id" value="<?php echo esc_attr($id); ?>">
                        <div>
                            <h3><?php echo __('To get an API key for the OpenAI API, follow these steps:', "ays-chatgpt-assistant"); ?></h3>
                            <ol>
                                <li><?php echo sprintf(__('Sign up %shere%s. You can use your Google or Microsoft account to sign up if you don`t want to create using an email/password combination. You may need a valid mobile number to verify your account.', "ays-chatgpt-assistant"), '<a href="https://beta.openai.com/signup" target="_blank">', '</a>'); ?></li>
                                <li><?php echo sprintf(__('Now, visit your %sOpenAI key page%s.', "ays-chatgpt-assistant"), '<a href="https://beta.openai.com/account/api-keys" target="_blank">', '</a>'); ?></li>
                                <li><?php echo __('Create a new key by clicking the "Create new secret key" button.', "ays-chatgpt-assistant"); ?></li>
                                <li><?php echo __('Copy the key and paste it here', "ays-chatgpt-assistant"); ?></li>
                                <li><?php echo __('Click "Connect" button.', "ays-chatgpt-assistant"); ?></li>
                            </ol>
                            <p><strong><?php echo __('Note: Access to the OpenAI API is currently limited, so you may need to wait for approval before you can start using the API.', "ays-chatgpt-assistant"); ?></strong></p>
                        </div>
                        <div>
                            <input type="text" name="ays_chatgpt_assistant_api_key" value="<?php echo esc_attr($api_key); ?>">
                            <button type="submit" name="ays_chatgpt_assistant_save_bttn">Connect</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>