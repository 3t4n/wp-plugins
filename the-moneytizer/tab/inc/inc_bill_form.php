<form  id="update_bank_data" method="post">
    <input type="hidden" name="themoneytizer_is_registered" id="themoneytizer_is_registered" value="4"/>
    <p class="themoneytizer_card mid-size">            
        <?php _e('La modification de vos champs personnels de paiement est impossible du 5 au 10 inclus, chaque mois.','themoneytizer'); ?><br/>
        <i class="bi bi-exclamation-triangle" style="font-size:20px;color:#db0436"></i>
        <?php _e('Merci de vérifier l\'exactitude de vos informations de paiement  avant le 5 de chaque mois.','themoneytizer'); ?>
    </p>
    <table>
        <tr>
            <?= get_option('themoneytizer_billing_choice') != 2 ? '<style> .billing_paypal_child {display: none;}</style>' : '' ?>
            <?= get_option('themoneytizer_billing_choice') != 1 ? '<style> .billing_bank_child {display: none;}</style>' : '' ?>
            <input type="text" value="<?= _e('Certains champs sont vides.','themoneytizer'); ?>" hidden id="billing_empty_message"/>
            <td colspan="4" class="themoneytizer_bottom_p_20">
                <input onchange="changeBillingChoice()" type="radio" id="billing_choice_1" name="themoneytizer_billing_choice" value="1" <?php if(get_option('themoneytizer_billing_choice') == 1) { echo 'checked'; } ?> >
                <label for="billing_choice_1"><?php _e('Virement bancaire','themoneytizer');?></label>
                &nbsp;
                <input onchange="changeBillingChoice()" type="radio" id="billing_choice_2" name="themoneytizer_billing_choice" value="2"
                <?php if(get_option('themoneytizer_billing_choice') == 2) { echo 'checked'; } ?> >
                <label for="billing_choice_2"><?php _e('Paypal','themoneytizer');?></label>
            </td>
        </tr>
        <tr class="billing_bank_child">
            <td><label for="themoneytizer_user_bank_name"><?php _e('Titulaire du compte:','themoneytizer');?></label></td>
            <td>
                <input class="themoneytizer_input_w_215" type="text" name="themoneytizer_user_bank_name" id="themoneytizer_user_bank_name" value="<?php echo get_option('themoneytizer_user_bank_name'); ?>" >
            </td>
            <td class="themoneytizer_left_p_20">
                <label for="billing_choice_inter">Banque intérmédiaire</label>
                <input onchange="changeInterChoice()" id="billing_choice_inter" <?= get_option('themoneytizer_billing_inter') ? 'checked' : '' ?> type="checkbox"/>
                <?= get_option('themoneytizer_billing_inter') ? '' : '<style> .billing_choice_inter_child {display:none} </style>'; ?>
            </td>
        </tr>
        <tr class="billing_bank_child">
            <td><label for="themoneytizer_user_bank_namebank"><?php _e('Nom de la banque:','themoneytizer');?></label></td>
            <td><input class="themoneytizer_input_w_215" type="text" name="themoneytizer_user_bank_namebank" id="themoneytizer_user_bank_namebank" value="<?php echo get_option('themoneytizer_user_bank_namebank'); ?>" ></td>
            <td class="themoneytizer_left_p_20">
                <label class="billing_choice_inter_child" for="themoneytizer_user_bank_inter_citybank">Ville banque intérmédiaire</label>
            </td>
            <td class="themoneytizer_left_p_20">
                <input type="text" id="themoneytizer_user_bank_inter_citybank" name="themoneytizer_user_bank_inter_citybank" class="billing_choice_inter_child themoneytizer_input_w_215" value="<?= get_option('themoneytizer_user_bank_citybank_inter')?>"/>
            </td>
        </tr>
        <tr class="billing_bank_child">
            <td><label for="themoneytizer_user_bank_addressbank"><?php _e('Adresse de la banque:','themoneytizer');?></label></td>
            <td><input class="themoneytizer_input_w_215" type="text" name="themoneytizer_user_bank_addressbank" id="themoneytizer_user_bank_addressbank" value="<?php echo get_option('themoneytizer_user_bank_adressbank'); ?>" ></td>
            <td class="themoneytizer_left_p_20">
                <label class="billing_choice_inter_child" for="themoneytizer_user_bank_inter_zipcode">Code postal banque intérmédiaire</label>
            </td>
            <td class="themoneytizer_left_p_20">
                <input type="text" id="themoneytizer_user_bank_inter_zipcode" name="themoneytizer_user_bank_inter_zipcode" class="billing_choice_inter_child themoneytizer_input_w_215" value="<?= get_option('themoneytizer_user_bank_zipbank_inter') ?>"/>
            </td>
        </tr>
        <tr class="billing_bank_child">
        <td><label for="themoneytizer_user_bank_citybank"><?php _e('Ville:','themoneytizer');?></label></td>
        <td><input class="themoneytizer_input_w_215" value="<?= get_option('themoneytizer_user_bank_citybank') ?>" type="text" name="themoneytizer_user_bank_citybank" id="themoneytizer_user_bank_citybank" value="<?php echo get_option('themoneytizer_user_bank_citybank'); ?>" ></td>
            <td class="themoneytizer_left_p_20">
                <label class="billing_choice_inter_child" for="themoneytizer_user_bank_inter_country">Pays banque intérmédiaire</label>
            </td>
            <td class="themoneytizer_left_p_20">
                <select id="themoneytizer_user_bank_inter_country" name="themoneytizer_user_bank_inter_zipcode" class="billing_choice_inter_child themoneytizer_form_select">
                    <?php include('inc_country_list_inter.php'); ?>
                </select>
            </td>
        </tr>
        <tr class="billing_bank_child">
        <td><label for="themoneytizer_user_bank_zipcode"><?php _e('Code postal:','themoneytizer');?></label></td>
        <td><input class="themoneytizer_input_w_215" value="<?= get_option('themoneytizer_user_bank_zipbank') ?>" type="text" name="themoneytizer_user_bank_zipcode" id="themoneytizer_user_bank_zipcode" value="<?php echo get_option('themoneytizer_user_bank_zipcode'); ?>" ></td>
            <td class="themoneytizer_left_p_20">
                <label class="billing_choice_inter_child" for="themoneytizer_user_bank_inter_name"><?= _e('Nom banque intérmédiaire', 'themoneytizer'); ?></label>
            </td>
            <td class="themoneytizer_left_p_20">
                <input type="text" id="themoneytizer_user_bank_inter_name" name="themoneytizer_user_bank_inter_name" class="billing_choice_inter_child themoneytizer_input_w_215" value="<?= get_option('themoneytizer_user_bank_zipbank_inter'); ?>"/>
            </td>
        </tr>
        <tr class="billing_bank_child">
        <td><label for="themoneytizer_user_bank_countrybank"><?php _e('Pays:','themoneytizer');?></label></td>
        <td>
            <select class="themoneytizer_form_select" id="themoneytizer_user_bank_countrybank" name="themoneytizer_user_bank_countrybank">
                <?php include('inc_country_list.php'); ?>
            </select>
        </td>
            <td class="themoneytizer_left_p_20">
                <label class="billing_choice_inter_child" for="themoneytizer_user_bank_inter_address"><?= _e('Adresse banque intérmédiaire', 'themoneytizer'); ?></label>
            </td>
            <td class="themoneytizer_left_p_20">
                <input type="text" id="themoneytizer_user_bank_inter_address" name="themoneytizer_user_bank_inter_address" class="billing_choice_inter_child themoneytizer_input_w_215" value="<?= get_option('themoneytizer_user_bank_adressbank_inter'); ?>"/>
            </td>
        </tr>
        <tr class="billing_bank_child">
        <td><label for="themoneytizer_user_bank_iban"><?php _e('IBAN:','themoneytizer');?></label></td>
        <td><input class="themoneytizer_input_w_215" type="text" name="themoneytizer_user_bank_iban" id="themoneytizer_user_bank_iban" value="<?php echo get_option('themoneytizer_user_bank_iban'); ?>" ></td>
            <td class="themoneytizer_left_p_20">
                <label class="billing_choice_inter_child" for="themoneytizer_user_bank_inter_bic">BIC</label>
            </td>
            <td class="themoneytizer_left_p_20">
                <input type="text" id="themoneytizer_user_bank_inter_bic" name="themoneytizer_user_bank_inter_bic" class="billing_choice_inter_child themoneytizer_input_w_215" value="<?= get_option('themoneytizer_user_bank_bic_inter'); ?>"/>
            </td>
        </tr>
        <tr class="billing_bank_child">
        <td><label for="themoneytizer_user_bank_bic"><?php _e('SWIFT/BIC:','themoneytizer');?></label></td>
        <td><input class="themoneytizer_input_w_215" type="text" name="themoneytizer_user_bank_bic" id="themoneytizer_user_bank_bic" value="<?php echo get_option('themoneytizer_user_bank_bic'); ?>" ></td>
            <td class="themoneytizer_left_p_20">
                <label class="billing_choice_inter_child" for="themoneytizer_user_bank_inter_iban">IBAN</label>
            </td>
            <td class="themoneytizer_left_p_20">
                <input type="text" id="themoneytizer_user_bank_inter_iban" name="themoneytizer_user_bank_inter_iban" class="billing_choice_inter_child themoneytizer_input_w_215" value="<?= get_option('themoneytizer_user_bank_bic_inter'); ?>"/>
            </td>
        </tr>
        <tr class="billing_paypal_child">
            <td><label for="themoneytizer_user_paypal"><?php _e('Paypal:','themoneytizer');?></label></td>
            <td><input class="themoneytizer_input_w_215" type="text" name="themoneytizer_user_paypal" id="themoneytizer_user_paypal" value="<?php echo get_option('themoneytizer_user_paypal'); ?>" ></td>
            <td colspan="2"></td>
        </tr>
        <tr>
        </tr>
        <tr>
            <td colspan="1">
                <div style="margin-top:20px;">
                    <?php wp_nonce_field('update_bank_data', 'saveBillingDetails-smf-nonce'); ?>
                    <button onclick="saveBillingDetails()" type="button"  id="billing_submit_button" class="themoneytizer_button"><?php _e('Enregistrer','themoneytizer');?></button>
                </div>
            </td>
            <td colspan="3"></td>
        </tr>
    </table>
</form>