<?php
    $themoneytizer_wp_lang = get_option('themoneytizer_user_language');
    // array of language and sub-domain available for The Moneytizer website --> 'en' doesn't exist
    $themoneytizer_sub_domain = array('fr' => 'www', 'en' => 'us', 'us' => 'us', 'es' => 'es', 'pt' => 'pt', 'de' => 'de', 'it' => 'it', 'pl' => 'pl', 'ru' => 'ru');
    if (array_key_exists($themoneytizer_wp_lang, $themoneytizer_sub_domain)) {
        $facture_url = "https://".$themoneytizer_sub_domain[$themoneytizer_wp_lang].".themoneytizer.com/manager/payment_method";
    } else {
        $facture_url = "https://www.themoneytizer.com/manager/payment_method";
    }
?>
<div class="accordion" id="accordion_menu_bill">
    <div class="accordion-item">
        <h2 class="accordion-header" id="menu_bill">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_menu_bill" aria-expanded="true" aria-controls="collapse_menu_bill">
                <i class="bi bi-wallet2"></i>&nbsp;<?php _e('Facturation et Paiements','themoneytizer');?>
            </button>
        </h2>
        <div id="collapse_menu_bill" class="accordion-collapse collapse" aria-labelledby="menu_bill" data-bs-parent="#accordion_menu_bill">
            <div class="accordion-body">
                <h5><?php _e('Coordonnées bancaires','themoneytizer');?></h5>
                <div id="el-intro-4">
                    <?php include_once('inc/inc_bill_form.php') ?>
                </div>
                <h5><?php _e('Factures','themoneytizer');?></h5>
                <p class="themoneytizer_no_margin mid-size themoneytizer_card">
                    <?php _e('Vous pouvez consulter vos factures sur le lien suivant','themoneytizer');?>
                    <a class="themoneytizer_link" href="<?php echo $facture_url; ?>" target="_blank"/><?php echo $facture_url; ?></a>
                    <?php _e('ou directement ci-dessous.','themoneytizer'); ?>
                    <br/>
                    <i class="bi bi-info-circle"></i>&nbsp;<?php _e("Vos factures sont payées 60 jours après son émission.", 'themoneytizer'); ?>
                </p>
                <div id="bill_details_panel" class="themoneytizer_card" style="display: none">
                    <div style="display: flex;justify-content:space-between">
                        <p class="themoneytizer_no_margin mid-size themoneytizer_card" style="border: 0px solid black">
                            <?php _e('Veuillez trouvez ci-dessous les détails de la facture n°', 'themoneytizer') ?><span id="bill_number"></span>
                        </p>
                        <p class="themoneytizer_no_margin mid-size themoneytizer_card" style="border: 0px solid black">
                            <button type="button" onClick="billResetDetails()" class="btn-close bill-close" aria-label="Close"></button>
                        </p>
                    </div>
                    <div class="spinner_bill_container">
                        <div style="text-align:center">
                            <p class="themoneytizer_no_margin mid-size themoneytizer_card" style="border: 0px solid black">
                                <?php _e('Chargement en cours...', 'themoneytizer') ?>
                            </p>
                            <div class="spinner-border" role="status">
                            </div>
                        </div>
                    </div>
                    <iframe id="bill_id" src=""></iframe>
                </div>
                <?php
                    $bills = json_decode(get_option('themoneytizer_data_bills'))->bills;
                    $billsExceptional = json_decode(get_option('themoneytizer_data_bills'))->bills_e;
                    if(empty($bills) && empty($billsExceptional)){
                        _e('Vous n\'avez actuellement aucune facture.', 'themoneytizer');
                    } else {
                        if(!empty($bills)){ ?>
                            <div class="bill-list">
                                <div><?php _e('Mois', 'themoneytizer'); ?></div>
                                <div><?php _e('Numéro', 'themoneytizer'); ?></div>
                                <div><?php _e('Montant', 'themoneytizer'); ?></div>
                            </div>
                            <?php foreach($bills as $key) {
                                $year = date("Y", strtotime($key->bill_date));
                                $date = date("Y-m-d", strtotime($key->bill_date));?>
                                <div onclick="showBill(<?php echo $key->bill_id; ?>)" class="themoneytizer_card d-flex bill-list">
                                    <div><?php echo $date; ?></div>
                                    <div><?php echo $year.'-'.str_pad($key->bill_id,6, "0", STR_PAD_LEFT);?></div>
                                    <div><?php echo $key->bill_amount; ?>.<?php echo $key->bill_currency; ?></div>
                                </div>
                            <?php }
                        }
                        if(!empty($billsExceptional)) { ?>
                        <h5><?php _e("Facturations exceptionnelles", 'themoneytizer'); ?></h5>
            
                        <?php foreach($billsExceptional as $key) { ?>
                            <div onclick="showBill(<?php echo $key->bill_id; ?>)" class="themoneytizer_card d-flex bill-list">
                                <div><?php echo $key->affichage_bill_date; ?></div>
                                <div><?php echo $key->affichage_bill_amount; ?></div>
                            </div>
                        <?php }
                        } ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
