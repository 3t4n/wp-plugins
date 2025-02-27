<div class="accordion" id="accordion_menu_profil">
    <div class="accordion-item">
        <h2 class="accordion-header" id="menu_profil">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_menu_profil" aria-expanded="true" aria-controls="collapse_menu_profil">
        <i class="bi bi-person"></i>&nbsp;<?php _e('Mon profil','themoneytizer');?>
        </button>
        </h2>
        <div id="collapse_menu_profil" class="accordion-collapse collapse" aria-labelledby="menu_profil" data-bs-parent="#accordion_menu_profil">
            <div class="accordion-body">
                <h5><?php _e('Coordonées personnelles','themoneytizer');?></h5>
                <div id="el-intro-3" style="width: 60%;">
                    <table>
                        <tr>
                            <td>
                                <label for="themoneytizer_user_name"><?php _e('Nom','themoneytizer');?><span class="option_required">*</span>:</label>
                            </td>
                            <td>
                                <input style="width:215px;" type="text" name="themoneytizer_user_name" id="themoneytizer_user_name" value="<?php echo get_option('themoneytizer_user_name'); ?>" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="themoneytizer_user_firstname"><?php _e('Prénom','themoneytizer');?><span class="option_required">*</span>:</label>
                            </td>
                            <td>
                                <input style="width:215px;" type="text" name="themoneytizer_user_firstname" id="themoneytizer_user_firstname" value="<?php echo get_option('themoneytizer_user_firstname'); ?>" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="themoneytizer_user_mail"><?php _e('Email','themoneytizer');?><span class="option_required">*</span>:</label>
                            </td>
                            <td>
                                <input style="width:215px;" type="text" name="themoneytizer_user_mail" id="themoneytizer_user_mail" value="<?php echo get_option('themoneytizer_user_mail'); ?>" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="themoneytizer_user_tel"><?php _e('Téléphone','themoneytizer');?><span class="option_required">*</span>:</label>
                            </td>
                            <td>
                                <input style="width:215px;" type="text" name="themoneytizer_user_tel" id="themoneytizer_user_tel" value="<?php echo get_option('themoneytizer_user_tel'); ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="themoneytizer_user_address"><?php _e('Adresse','themoneytizer');?><span class="option_required">*</span>:</label>
                            </td>
                            <td>
                                <input style="width:215px;" type="text" name="themoneytizer_user_address" id="themoneytizer_user_address" value="<?php echo get_option('themoneytizer_user_address'); ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="themoneytizer_user_city"><?php _e('Ville','themoneytizer');?><span class="option_required">*</span>:</label>
                            </td>
                            <td>
                                <input style="width:215px;" type="text" name="themoneytizer_user_city" id="themoneytizer_user_city" value="<?php echo get_option('themoneytizer_user_city'); ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="themoneytizer_user_zip_code"><?php _e('Code postal','themoneytizer');?><span class="option_required">*</span>:</label>
                            </td>
                            <td>
                                <input style="width:215px;" type="text" name="themoneytizer_user_zip_code" id="themoneytizer_user_zip_code" value="<?php echo get_option('themoneytizer_user_zip_code'); ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="themoneytizer_user_country"><?php _e('Pays','themoneytizer');?><span class="option_required">*</span>:</label>
                            </td>
                            <td>
                                <select style="padding: 0 24px 0 3px;" id="themoneytizer_user_country" name="themoneytizer_user_country">
                                    <?php include('inc/inc_country_list.php'); ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php _e('Type de structure', 'themoneytizer'); ?>
                            </td>
                            <td></td>
                        </tr>
                        <?php
                        $list_structure = [
                            1 => ['id' => 'type_personne', 'name' => __("Une personne", 'themoneytizer'), 'disabled' => true],
                            2 => ['id' => 'type_auto_entrepreneur', 'name' => __("Auto-entrepreneur", 'themoneytizer'), 'disabled' => false],
                            3 => ['id' => 'type_association', 'name' => __("Une association", 'themoneytizer'), 'disabled' => true],
                            4 => ['id' => 'type_entreprise', 'name' => __("Une entreprise", 'themoneytizer'), 'disabled' => false],
                        ];
                        $entreprise = get_option('themoneytizer_user_entreprise');
                        $type_structure = get_option('themoneytizer_user_type_structure');

                        if (get_option('themoneytizer_user_local_lang') != 'fr_FR') {?>
                        <tr>
                            <td>
                                <label for="type_structure_1"><?php _e("Une personne",'themoneytizer');?></label>
                            </td>
                            <td style="padding-left: 10px">
                                <input onClick="switchStructureType()" type="radio" name="themoneytizer_user_type_structure" id="type_structure_1" value="1" <?php echo ($type_structure == 1 ? "checked" : ""); ?>>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="type_structure_4"><?php _e("Une entreprise",'themoneytizer');?></label>
                            </td>
                            <td style="padding-left: 10px">
                                <input onClick="switchStructureType()" type="radio" name="themoneytizer_user_type_structure" id="type_structure_4" value="4" <?php echo ($type_structure == 4 ? "checked" : ""); ?>>
                            </td>
                        </tr>
                        <?php } else {
                            foreach ($list_structure as $key => $structure) { ?>
                            <tr style=>
                                <td>
                                    <label for="type_structure_<?php echo $key; ?>">&nbsp;&nbsp;&nbsp;<?php echo $structure['name']; ?></label>
                                </td>
                                <td style="padding-left: 10px">
                                    <input onClick="switchStructureType()" name="themoneytizer_user_type_structure" id="type_structure_<?php echo $key; ?>" type="radio" value="<?php echo $key; ?>" <?php echo ($type_structure == $key ? "checked" : ""); ?> />
                                </td>
                            </tr>
                            <?php } ?>
                        </tr>
                        <?php }?>
                        <tr class="professionnel" id="entreprise_money_user_up">
                            <td>
                                <label for="themoneytizer_user_entreprise">&nbsp;&nbsp;&nbsp;<?php _e("Nom de l'entreprise:",'themoneytizer');?></label>
                            </td>
                            <td>
                                <input style="width:215px;" type="text" name="themoneytizer_user_entreprise" id="themoneytizer_user_entreprise" value="<?php echo get_option('themoneytizer_user_entreprise'); ?>" >
                            </td>
                        </tr>
                        <tr class="professionnel" id="siren_money_up">
                            <td>
                                <label for="themoneytizer_user_user_siren">&nbsp;&nbsp;&nbsp;<?php _e('SIREN:','themoneytizer');?></label>
                            </td>
                            <td>
                                <input style="width:215px;" type="text" name="themoneytizer_user_user_siren" id="themoneytizer_user_user_siren" value="<?php echo get_option('themoneytizer_user_user_siren'); ?>" >
                            </td>
                        </tr>
                        <tr id="tva_money_up" class="not-show" >
                            <td>
                                <label for="themoneytizer_user_tva">&nbsp;&nbsp;&nbsp;<?php _e('N° de TVA intracommunautaire:','themoneytizer');?>&nbsp;</label>
                            </td>
                            <td>
                                <input style="width:215px;" type="text" name="themoneytizer_user_tva" id="themoneytizer_user_tva" value="<?php echo get_option('themoneytizer_user_tva'); ?>" >
                            </td>
                        </tr>
                        <tr id="themoneytizer_denomination_social">
                            <td>
                                <label for="themoneytizer_user_denomination_social">&nbsp;&nbsp;&nbsp;<?php _e('Dénomination sociale:','themoneytizer');?>&nbsp;</label>
                            </td>
                            <td>
                                <input style="width:215px;" type="text" name="themoneytizer_user_denomination_social" id="themoneytizer_user_denomination_social" value="<?php echo get_option('themoneytizer_user_tva'); ?>" >
                            </td>
                        </tr>
                    </table>
                </div>
                <button onClick="saveProfile()" class="themoneytizer_button center lazyloading"><?php _e('Enregister', 'themoneytizer'); ?></button>
                <?php
                if($type_structure == 4){
                ?>
                <script>
                jQuery_money('#entreprise_money_user_up').show();
                jQuery_money('#siren_money_up').show();
                jQuery_money('#tva_money_up').show();
                jQuery_money('#themoneytizer_denomination_social').hide();
                </script>
                <?php
                } else if($type_structure == 3){
                ?>
                <script>
                jQuery_money('#entreprise_money_user_up').hide();
                jQuery_money('#siren_money_up').show();
                jQuery_money('#tva_money_up').show();
                jQuery_money('#themoneytizer_denomination_social').show();
                </script>
                <?php
                } else if($type_structure == 2){
                ?>
                <script>
                jQuery_money('#entreprise_money_user_up').show();
                jQuery_money('#siren_money_up').show();
                jQuery_money('#tva_money_up').hide();
                jQuery_money('#themoneytizer_denomination_social').hide();
                </script>
                <?php
                } else {
                ?>
                <script>
                jQuery_money('#entreprise_money_user_up').hide();
                jQuery_money('#siren_money_up').hide();
                jQuery_money('#tva_money_up').hide();
                jQuery_money('#themoneytizer_denomination_social').hide();
                </script>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
