<?php

/**
 * Incluyo la clase para el administrado
 */
$rdWapp = new rdWapp();
$result_data = "";

/**
 * Selector de opciones de formularios de administracion
 */
if (isset($_POST['rd-id-form']) && (trim($_POST['rd-id-form']) != '') ) {

    $formData = sanitize_text_field($_POST['rd-id-form']);
    switch ($formData) {
        case 'active-plugin':

            // Activacion del plugins
            $result_data = $rdWapp->activePlugin(sanitize_post($_POST));

            break;
        case 'rdwapp-update-data':

            // Actualizacion del las opciones del plugins
            $result_data = $rdWapp->rdWappUpdateData(sanitize_post($_POST));

            break;
    }
}

/**
 * Llamada de las opciones del plugins
 */
$options = get_option('rdwapp_options_free');

?>

<div class="rd-container">

    <div class="rdseo-banner"></div>

    <div class="rdseo-header">
    </div>

    <?php

    /**
     * Mensaje de impresion de los resultados
     */
        if ($result_data == true) {
            $success = __( 'Configuración Guardada.');

            echo "<div class='updated settings-error notice is-dismissible'>
                        <p><strong>" . $success ."</strong></p>
                    </div>";
        }

    ?>

    <div class="rd-content">

        <h3 class="title"><?php esc_html_e( 'WhatsApp', 'rd-wapp' ); ?></h3>
        <hr>
        <form method="POST" action="#">
            <input type="hidden" name="rd-id-form" value="rdwapp-update-data">
            <table class="form-table">
                <tbody>
                    <tr>
                        <th valign="top" scope="row"><label for="rdwapp_agent_name"><span style="color: red";>*</span> <?php esc_html_e( 'Nombre del Agente', 'rd-wapp' ); ?></label></th>
                        <td>
                            <input type="text" class="regular-text" name="rdwapp_agent_name" value="<?php echo esc_html($options['whatsapp']['user']['name']); ?>" maxlength="50" required>
                            <p class="description"><?php esc_html_e( 'Contacto de WhatsApp', 'rd-wapp' ); ?></p>
                        </td>
                    </tr>
                    <tr>
                        <th valign="top" scope="row"><label for="rdwapp_agent_departament"><?php esc_html_e( 'Departamento', 'rd-wapp' ); ?></label></th>
                        <td>
                            <input type="text" class="regular-text" name="rdwapp_agent_departament" value="<?php echo esc_html($options['whatsapp']['user']['departament']); ?>" maxlength="25">
                            <p class="description"><?php esc_html_e( 'Departamento del Contacto WhatsApp', 'rd-wapp' ); ?></p>
                        </td>
                    </tr>
                    <tr>
                        <th valign="top" scope="row"><label for="rdwapp_agent_number"><span style="color: red";>*</span> <?php esc_html_e( 'Número', 'rd-wapp' ); ?></label></th>
                        <td>

                            <select name="rdwapp_phone_code_whatsapp" required>
                                <?php

                                    $rdWappCountry = $rdWapp->rdWapp_country();

                                    if ($options['whatsapp']['user']['numberCode'] == ""){

                                        echo "<option value='' selected>" . __( 'Seleccione un país', 'rd-wapp' ) . "</option>";

                                        foreach ($rdWappCountry as $countryCode => $countryInfo){

                                            echo "<option value='" . $countryCode . "'>" . $countryInfo . "</option>";

                                        }

                                    }else{

                                        foreach ($rdWappCountry as $countryCode => $countryInfo){

                                            if ($options['whatsapp']['user']['numberCode'] == $countryCode){
                                                echo "<option value='" . $countryCode . "' selected>" . $countryInfo . "</option>";
                                            }else{
                                                echo "<option value='" . $countryCode . "'>" . $countryInfo . "</option>";
                                            }

                                        }

                                    }

                                ?>
                            </select>
                            <input type="number" class="regular-text" name="rdwapp_agent_number" value="<?php echo esc_html($options['whatsapp']['user']['number']); ?>" maxlength="25" required>
                            <p class="description"><?php esc_html_e( 'Seleccione el País y Número WhatsApp del Contacto. Ej: +580000000000', 'rd-wapp' ); ?></p>
                        </td>
                    </tr>
                    <tr>
                        <th valign="top" scope="row"><label for="rdwapp_agent_message"><?php esc_html_e('Mensaje:', 'rd-wapp'); ?></label></th>
                        <td>
                            <textarea name="rdwapp_agent_message" rows="5" cols="50" maxlength="200" required><?php echo esc_textarea($options['whatsapp']['user']['message']); ?></textarea>
                            <p class="description"><?php esc_html_e( 'Mensaje de Bienvenida del Agente a los usuarios', 'rd-wapp' ); ?></p>
                        </td>
                    </tr>
                </tbody>
            </table>

            <h3 class="title"><?php esc_html_e( 'Teléfono', 'rd-wapp' ); ?></h3>
            <hr>
            <table class="form-table">
                <tbody>
                <tr>
                    <th valign="top" scope="row"><label for="rdwapp_phone_text"><?php esc_html_e( 'Nombre del Agente', 'rd-wapp' ); ?></label></th>
                    <td>
                        <input type="text" class="regular-text" name="rdwapp_phone_text" value="<?php echo esc_html($options['phone']['text']); ?>" maxlength="50">
                        <p class="description"><?php esc_html_e( 'Contacto Telefónico', 'rd-wapp' ); ?></p>
                    </td>
                </tr>
                <tr>
                    <th valign="top" scope="row"><label for="rdwapp_phone_number"><?php esc_html_e( 'Número', 'rd-wapp' ); ?></label></th>
                    <td>

                        <select name="rdwapp_phone_code_phone" required>
                            <?php

                            $rdWappCountry = $rdWapp->rdWapp_country();

                            if ($options['whatsapp']['user']['numberCode'] == ""){

                                echo "<option value='' selected>" . __( 'Seleccione un país', 'rd-wapp' ) . "</option>";

                                foreach ($rdWappCountry as $countryCode => $countryInfo){

                                    echo "<option value='" . $countryCode . "'>" . $countryInfo . "</option>";

                                }

                            }else{

                                foreach ($rdWappCountry as $countryCode => $countryInfo){

                                    if ($options['whatsapp']['user']['numberCode'] == $countryCode){
                                        echo "<option value='" . $countryCode . "' selected>" . $countryInfo . "</option>";
                                    }else{
                                        echo "<option value='" . $countryCode . "'>" . $countryInfo . "</option>";
                                    }

                                }

                            }

                            ?>
                        </select>

                        <input type="number" class="regular-text" name="rdwapp_phone_number" value="<?php echo esc_html($options['phone']['number']); ?>" maxlength="25">
                        <p class="description"><?php esc_html_e( 'Seleccione el Pais y Número Telefónico de Contacto. Ej: +580000000000', 'rd-wapp' ); ?></p>
                    </td>
                </tr>
                </tbody>
            </table>

            <hr>
            <h3 class="title"><?php esc_html_e( 'Opciones del Plugin', 'rd-wapp' ); ?></h3>
            <table class="form-table">
                <tbody>
                <tr>
                    <th valign="top" scope="row"><label for="rdwapp_plugin_button_text"><span style="color: red";>*</span> <?php esc_html_e( 'Texto del Botón', 'rd-wapp' ); ?></label></th>
                    <td>
                        <input type="text" class="regular-text" name="rdwapp_plugin_button_text" value="<?php echo esc_html($options['whatsapp']['config']['textButton']); ?>" required>
                        <p class="description"><?php esc_html_e( 'Texto del Boton en la web', 'rd-wapp' ); ?></p>
                    </td>
                </tr>

                <tr>
                    <th valign="top" scope="row"><label for="rdwapp_plugin_position_button"><?php esc_html_e( 'Posición Botón', 'rd-wapp' ); ?></label></th>
                    <td>
                        <input type="radio" value="l" id="rdwapp_plugin_position_button" name="rdwapp_plugin_position_button" <?php if($options['rd_plugins_position'] == "l"){echo "checked";} ?>> <?php esc_html_e( 'Posición a la Izquierda', 'rd-wapp' ); ?>&nbsp;
                        <input type="radio" value="r" id="rdwapp_plugin_position_button" name="rdwapp_plugin_position_button" <?php if($options['rd_plugins_position'] == "r"){echo "checked";} ?>> <?php esc_html_e( 'Posición a la Derecha', 'rd-wapp' ); ?>
                    </td>
                </tr>

                <tr>
                    <th valign="top" scope="row"><label for="rdwapp_plugin_color"><?php esc_html_e( 'Color del Botón', 'rd-wapp' ); ?></label></th>
                    <td>
                        <input type="text" class="color-picker regular-text" data-alpha="false" data-default-color="#6a99d8" name="rdwapp_plugin_color" value="<?php echo esc_html($options['whatsapp']['config']['color']); ?>"/>
                    </td>
                </tr>
                <tr>
                    <th valign="top" scope="row"><label for="rdwapp_plugin_message"><?php esc_html_e( 'Mensaje de Bienvenida', 'rd-wapp' ); ?></label></th>
                    <td>
                        <textarea type="text" name="rdwapp_plugin_message" rows="5" cols="50" maxlength="200"><?php echo esc_textarea($options['whatsapp']['config']['textWelcome']); ?></textarea><br>
                        <p class="description"><?php esc_html_e( 'Mensaje de Bienvenida a los usuarios', 'rd-wapp' ); ?></p>

                    </td>
                </tr>
                </tbody>
            </table>
            <p class="submit">
                <?php submit_button(); ?>
            </p>

        </form>

    </div>

</div>
