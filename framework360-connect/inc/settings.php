<div class="wrap fw360-settings-section">
    <style type="text/css">
        .dependency-error {color: red; text-decoration: underline; font-style: italic;}
    </style>

    <h1><?php _e('Framework360 Connect - Settings','framework360-connect');?></h1>

    <form method="post" class="fw360-settings" action="options.php">
        <?php settings_fields( 'fw360_options_group' ); ?>

        <table class="form-table" role="presentation">
            <tbody>
            <tr>
                <th scope="row"><?php _e('Framework360 environment URL','framework360-connect');?></th>
                <td>
                    <input type="text" id="fw360_api_url" name="fw360_api_url" placeholder="dominio.it" value="<?php echo esc_attr(get_option('fw360_api_url')); ?>" class="regular-text"/>
                    <p class="description"><?php echo _e('Add your Framework360 environmnent URL','framework360-connect'); ?></p>
                </td>
            </tr>

            <tr>
                <th scope="row"><?php _e('Api Key','framework360-connect');?></th>
                <td>
                    <input type="text" id="fw360_api_key" name="fw360_api_key" value="<?php echo esc_attr(get_option('fw360_api_key')); ?>" class="regular-text"/>
                    <p class="description"><?php _e('You can generate a key via the "<i> Developers => API => Api Key </i>" panel in your Framework360 environment. <b>NB: Remember to enable <i>/customers/registration</i> permission</b>','framework360-connect'); ?></p>
                </td>
            </tr>

            <tr>
                <th scope="row"><?php _e('Custom List','framework360-connect');?></th>
                <td>
                    <input type="text" id="fw360_default_tags" name="fw360_default_tags" value="<?php echo esc_attr(get_option('fw360_default_tags')); ?>" class="regular-text"/>
                    <p class="description"><?php sprintf(_e('Basically all users will be automatically added to an list called "<i>%s - <u>Role</u></i>"','framework360-connect'), esc_attr(get_bloginfo('name'))); ?></p>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <?php _e('Roles to sync','framework360-connect');?>
                </th>
                <td class="allowed-roles">
                    <fieldset>
                        <?php
                        $allowed_roles = get_option('fw360_allowed_roles');
                        foreach ($wp_roles->roles as $key => $value) { ?>
                            <label for="role_<?php echo esc_attr($key);?>"><input type="checkbox" id="role_<?php echo esc_attr($key);?>" name="fw360_allowed_roles[]" value="<?php echo esc_attr($key); ?>" <?php if (in_array($key, $allowed_roles)): ?> checked <?php endif ?>> <?php echo esc_attr($value['name']); ?></label>
                            <br>
                        <?php } ?>
                    </fieldset>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <?php _e('Data to sync','framework360-connect');?>
                </th>
                <td class="sync-data">
                    <fieldset>
                        <?php foreach ($this->getSyncData() as $key => $value) { ?>
                            <label for="data_<?php echo esc_attr($key); ?>"><input type="checkbox" id="data_<?php echo esc_attr($key); ?>" name="fw360_sync_data[]" value="<?php echo esc_attr($key); ?>" <?php echo ($value['status'] ? 'checked' : '') . (!$value['checkable'] ? ' disabled' : ''); ?>> <?php echo wp_kses_post($value['name'], 'u'); ?></label>
                            <br>
                        <?php } ?>
                    </fieldset>
                </td>
            </tr>
            </tbody>
        </table>

        <?php submit_button(); ?>
    </form>
</div>