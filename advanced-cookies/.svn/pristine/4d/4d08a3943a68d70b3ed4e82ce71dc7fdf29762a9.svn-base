<!-- Onglet gestion du backoffice -->
<section class="ac-gestion-des-services">
    <div class="control control-radio">
        <p><?php echo( esc_html(__('Tous les services','advancedcookies'))) ?></p>
        <div>
            <div class="ac-switch-field">
                <input type="radio" id="ac-gs-all-true" name="ac-gs-all" value="" oninput="gs_all_services(false)">
                <label for="ac-gs-all-true"><?php echo( esc_html(__('Désactiver','advancedcookies'))) ?></label>
                <input type="radio" id="ac-gs-all-false" name="ac-gs-all" value="true" oninput="gs_all_services(true)" checked>
                <label for="ac-gs-all-false"><?php echo( esc_html(__('Activer','advancedcookies'))) ?></label>
            </div>
        </div>
    </div>
    <?php foreach ($Hob_ac_view->gestion_list_checkbox as $value): ?>
        <div class="control">
            <p><?php echo( esc_html($value[0])) ?></p>
        </div>
        <?php foreach ($value[1] as $checkbox_value): ?>
            <div class="control control-radio">
                <p><?php echo( esc_html($checkbox_value[0])) ?></p>
                <div>
                    <div class="ac-switch-field ac-switch-data">
                        <input type="radio" id="<?php echo( esc_html($checkbox_value[1])) ?>-true" name="<?php echo(esc_html( $checkbox_value[1])) ?>" value="" class="ac-gestion-radio" oninput="gs_see_or_not(true,'<?php echo( esc_html($checkbox_value[1])) ?>')"
                        <?php if(!get_option($checkbox_value[2])){ echo "checked"; }; ?>>
                        <label for="<?php echo( esc_html($checkbox_value[1])) ?>-true"><?php echo( esc_html(__('Désactiver','advancedcookies'))) ?></label>
                        <input type="radio" id="<?php echo( esc_html($checkbox_value[1])) ?>-false" name="<?php echo( esc_html($checkbox_value[1])) ?>" value="true" class="ac-gestion-radio"  oninput="gs_see_or_not(false,'<?php echo( esc_html($checkbox_value[1])) ?>')"
                        <?php if(get_option($checkbox_value[2])){ echo "checked"; }; ?>>
                        <label for="<?php echo( esc_html($checkbox_value[1])) ?>-false"><?php echo( esc_html(__('Activer','advancedcookies'))) ?></label>
                    </div>
                </div>
            </div>
            <div class="control control-textarea" id="<?php echo( esc_html($checkbox_value[1])) ?>-text" <?php if(!get_option($checkbox_value[2])) { echo "style='display:none;'"; }?>>
                <p><?php echo( esc_html(__('Description','advancedcookies'))) ?> Google Analytics</p>
                <div>
                    <textarea name="<?php echo( esc_html($checkbox_value[1])) ?>-text" rows="5"><?php echo( esc_textarea(get_option($checkbox_value[3]))) ?></textarea>
                    <small><?php echo( esc_html(__('Texte de description','advancedcookies'))) ?></small>
                </div>
            </div>
        <?php endforeach; ?>
        <hr>
    <?php endforeach; ?>
    <div class="ac-enregistrer">
        <button type="button" onclick='save_gestion(this)'>
            <img src="<?php echo( esc_url(HOB_AC_URL_SCRIPT)) ?>asset/img/disquette.png" alt="Enregistrer">
            <?php echo( esc_html(__('Enregistrer','advancedcookies'))) ?>
        </button>
    </div>
</section>