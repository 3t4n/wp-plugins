<?php /* Slope Welcome */ ?>

<form id="slope-welcome-form" action="#">
    <div class="slope-setting-container" id="slope-widget-container">

        <h1>
            <?php esc_html_e("Benvenuto in Slope!", "slope-widgets"); ?>
        </h1>
        <p style="font-size: 16px; margin-bottom: 10px;">
            <?php esc_html_e("Ciao e grazie per aver scaricato il nostro plugin.", "slope-widgets"); ?>
            <br>
            <?php esc_html_e('Una volta attivato il plugin vorremmo tenerti aggiornato sulle novità e sulle nuove funzionalità di Slope, software gestionale all in one per hotel.', 'slope-widgets'); ?>
        </p>

        <table class='form-table'>
            <tbody>
            <tr>
                <td>
                    <p style="font-size: 16px;">
                        <?php esc_html_e("Nel frattempo dicci qualcosa in più su di te:", "slope-widgets"); ?>
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <div class='slope-radio-field'>
                        <label class="slope-style-field">
                            <?php esc_html_e("Lavoro per la struttura ricettiva", "slope-widgets"); ?>
                            <input type="radio" name="slope-user-type" value="employee">
                        </label>
                        <label class="slope-style-field">
                            <?php esc_html_e("Lavoro per la web agency / Sono il webmaster", "slope-widgets"); ?>
                            <input type="radio" name="slope-user-type" value="webmaster">
                        </label>
                        <label class="slope-style-field">
                            <?php esc_html_e("Altro", "slope-widgets"); ?>
                            <input type="radio" name="slope-user-type" value="other">
                        </label>
                    </div>
                </td>
            </tr>

            <tr class="setting-field">
                <th>
                    <label class="slope-style-field" for="slope-email-address">
                        Email
                    </label>
                    <input type="text" id="slope-email-address" name="slope-email-address" value="<?php echo esc_attr(get_option('admin_email')); ?>">
                </th>
            </tr>

            <tr class="slope-terms">
                <td>
                    <input type="checkbox" id="slope-terms">
                    <label class="slope-style-field" for="slope-terms">
                        <?php esc_html_e('Dichiaro di aver letto ed accettato l’', 'slope-widgets') ?>
                        <a href="https://www.slope.it/privacy/" target="_blank">
                            <?php esc_html_e('informativa sulla privacy', 'slope-widgets') ?>
                        </a>
                        <?php esc_html_e('ai sensi del Regolamento (UE) 2016/679 per il trattamento dei dati personali ai fini di essere ricontattato.', 'slope-widgets') ?>
                    </label>
                </td>
            </tr>
            </tbody>
        </table>
        <input disabled name="Submit" type="submit" class="button-primary"
               value="<?php esc_attr_e('Avanti', 'slope-widgets'); ?>"
               onclick="event.preventDefault(); slopeSendDataAndRedirect('<?php echo esc_url(admin_url('/admin.php?page=slope_reservations')); ?>'); checkValidity()"/>
        <a id="slope-skip-welcome-button" href="<?php echo esc_url(admin_url('/admin.php?page=slope_reservations')) ?>">
            <span class="slope-skip-icon dashicons-no dashicons"></span>
            <?php esc_html_e('Salta', 'slope-widgets') ?>
        </a>

    </div>
</form>
