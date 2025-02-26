<div class="wrap">
    <?php if (!defined('ABSPATH'))
        exit; // Salir si se accede directamente ?>

    <?php if (!current_user_can('manage_options')) {
        wp_die(esc_html__('You do not have sufficient permissions to access this page.'));
    } ?>

    <?php if (!$options['autoId']) { ?>
        <form id="autogestiones-form" method="post" action="options.php">
            <h1>Mi Autogestiones</h1>
            <p>Es necesario hacer la vinculación para poder gestionar tu negocio</p>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">
                        <?php esc_html_e('ID de Cuenta de Autogestiones Cloud:', 'autogestiones-gestor'); ?>
                    </th>
                    <td>
                        <input id="customerId" type="text" name="autg_plugin_options[customerId]"
                            value="<?php echo esc_attr($options['customerId']); ?>" />
                    </td>
                </tr>
            </table>
            <div id="error-box"></div>
            <button onclick="autg_fn()" type="button" class="button button-primary">Añadir Cuenta de Autogestiones Cloud</button>
            <button onclick="autg_refresh()" type="button" class="button button-secondary">Actualizar</button>
            <?php settings_fields('autg_plugin_options'); ?>
            <?php do_settings_sections('autg_plugin'); ?>
        </form>
    <?php } else { ?>
        <form method="post" action="options.php">
            <h1>Mi Autogestiones</h1>
            <p>Felicidades. Su Cuenta de Autogestiones Cloud se encuentra vinculada
            </p>
            <input type="hidden" name="autg_plugin_options[autoId]" value="">
            <input type="hidden" name="autg_plugin_options[documentNo]" value="">
            <input type="hidden" name="autg_plugin_options[documentTypeId]" value="">
            <input type="hidden" name="autg_plugin_options[countryName]" value="">
            <input type="hidden" name="autg_plugin_options[denomination]" value="">
            <input type="hidden" name="autg_plugin_options[documentTypeName]" value="">
            <input type="hidden" name="autg_plugin_options[fieldCustomName]" value="">
            <?php wp_nonce_field('autg_connect_form', 'autg_connect_form_nonce'); ?>
            <table class="form-table">
               
            <tr valign="top">
                    <th scope="row">
                        <?php esc_html_e('ID de Cuenta de Autogestiones Cloud:', 'autogestiones-gestor'); ?>
                    </th>
                    <td>
                        <span>
                            <?php echo esc_attr($options['autoId']); ?>
                        </span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <?php esc_html_e('Denominación:', 'autogestiones-gestor'); ?>
                    </th>
                    <td>
                        <span>
                        <?php echo esc_attr($options['denomination']); ?>
                        </span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                    <?php echo esc_attr($options['documentTypeName']); ?>:
                    </th>
                    <td>
                        <span>
                        <?php echo esc_attr($options['documentNo']); ?>
                        </span>
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row">
                        <?php esc_html_e('País:', 'autogestiones-gestor'); ?>
                    </th>
                    <td>
                        <span>
                            <?php echo esc_attr($options['countryName']); ?>
                        </span>
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row">
                        <?php esc_html_e('Campo personalizado', 'autogestiones-gestor'); ?>
                    </th>
                    <td>
                        <span>
                            <?php echo esc_attr($options['fieldCustomName']); ?>
                        </span>
                    </td>
                </tr>
            </table>
            <p>En caso que hayas conectado tu woocommerce a una Cuenta de Autogestiones Cloud por error puedes utilizar esta opción:</p>

            <button type="submit" class="button button-secondary submitdelete deletion">Vincular a otra
            Cuenta de Autogestiones Cloud</button>

            <?php settings_fields('autg_plugin_options'); ?>
            <?php do_settings_sections('autg_plugin'); ?>
        </form>
    <?php } ?>
</div>

<script>


    function autg_nlyNumbers(v) {
        return v.replace(/\D/g, '');
    }

    function autg_refresh() {
        location.reload();
    }

    function autg_showError(message) {
        const box = document.getElementById('error-box');
        if (message) {
            box.innerText = message;
            box.style.display = "block";
        } else {
            box.innerText = "";
            box.style.display = "none";
        }
    }

    function autg_fn() {
        const customerIdInput = document.getElementById('customerId');

        if (!customerIdInput) {
            autg_showError("Por favor complete el ID del cliente")
            return
        }

        const customerId = customerIdInput.value

        if (!customerId) {
            autg_showError("Por favor complete el ID del cliente")
            return
        }



        autg_showError("")
        const pathArray = `${window.location.origin}`.split('/');
        const protocol = pathArray[0];
        const host = pathArray[2];
        const url = protocol + '//' + host + "/wc-auth/v1/authorize";
        const params = new URLSearchParams({
            app_name: "autogestiones",
            scope: "read_write",
            user_id: autg_nlyNumbers(customerId),
            return_url: encodeURIComponent("<?php echo esc_url(AUTOGESTIONES_REDIRECT_URL . '/woocommerce/back'); ?>"),
            callback_url: encodeURIComponent("<?php echo esc_url(AUTOGESTIONES_REDIRECT_URL . '/woocommerce/auth?storeUrl='); ?>" + window.location.origin)
        });
        const win = window.open(
            url + "?" + params,
            "_blank",
            "location=yes,height=570,width=520,scrollbars=yes,status=yes"
        );


    }
</script>