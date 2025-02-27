<?php
  $themoneytizer_wp_lang = get_option('themoneytizer_user_language');
  // array of language and sub-domain available for The Moneytizer website --> 'en' doesn't exist
  $themoney_sub_domain = array('fr' => 'www', 'en' => 'us', 'us' => 'us', 'es' => 'es', 'pt' => 'pt', 'de' => 'de', 'it' => 'it', 'pl' => 'pl', 'ru' => 'ru');
?>
<div class="accordion" id="accordion_menu_settings">
    <div class="accordion-item">
        <h2 class="accordion-header" id="menu_settings">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_menu_settings" aria-expanded="true" aria-controls="collapse_menu_settings">
            <i class="bi bi-tools"></i>&nbsp;<?php _e('Paramètres du plugin','themoneytizer');?>
        </button>
        </h2>
        <div id="collapse_menu_settings" class="accordion-collapse collapse" aria-labelledby="menu_settings" data-bs-parent="#accordion_menu_settings">
            <div class="accordion-body">
                <h5><?php _e('Ads.txt', 'themoneytizer');?></h5>
                <div id="adstxt_panel" class="themoneytizer_card mid-size" style="margin-bottom:20px">
                    <div class="ads_txt_env_notifier themoneytizer_card" style="margin-bottom:20px; display: none;">
                        <i class="option_required bi bi-exclamation-triangle"></i>
                        &nbsp;&nbsp;
                        <span class="message-content"></span>
                    </div>
                    <p class="mid-size">
                        <?php _e('Intégrez le fichier ADS.TXT au plus vite sur votre site sous peine de ne plus être monétisé.','themoneytizer') ?><br>
                        <?php _e('Toutes les informations concernant cette norme','themoneytizer') ?>
                        <?php if (array_key_exists($themoneytizer_wp_lang, $themoney_sub_domain)) { ?>

                        <a class="themoneytizer_link" href="https://<?= $themoney_sub_domain[$themoneytizer_wp_lang]; ?>.themoneytizer.com/blog/fichier-ads-txt-the-moneytizer/" target="_blank">
                            <?php _e('ici','themoneytizer') ?>
                        </a>

                        <?php } else { ?>

                        <a href="https://www.themoneytizer.com/blog/fichier-ads-txt-the-moneytizer/" target="_blank">
                            <?php _e('ici','themoneytizer') ?>
                        </a>

                        <?php } ?>
                    </p>

                    <p class="mid-size">
                        <input onClick="ads_txt_setting()" name="auto-ads-txt-checkbox" type="checkbox" id="auto_option_ads_txt"
                        <?php echo (get_option('themoneytizer_data_auto_ads_txt')==1 ? 'checked' : '') ?>
                        />
                        <span><?php _e('Placement automatique de l\'ads.txt', 'themoneytizer') ?></span>
                    </p>

                    <p class="mid-size" style="display:<?php echo (get_option('themoneytizer_data_auto_ads_txt')==1 ? 'none' : 'block') ?>">
                        <?php _e('Télécharger notre fichier ads.txt :','themoneytizer') ?>
                        <button onClick="ads_txt_download()" class="themoneytizer_button" id="themoney-download-ads-txt"> <?php _e('Télécharger le fichier','themoneytizer') ?> </button>
                    </p>

                    <button style="max-width: unset;" class="themoneytizer_button" id="themoney-check-ads-txt" onclick="checkAdsTxt(<?= $themoney_website->site_id; ?>)"> <?php _e('Vérifier votre fichier ads.txt','themoneytizer') ?> </button>

                    <p class="mid-size" style="display:<?php echo (get_option('themoneytizer_data_auto_ads_txt')==1 ? 'none' : 'block') ?>">
                        <b><?php _e('ATTENTION :','themoneytizer') ?></b>
                        <?php _e('Si vous avez déjà des publicités Adsense vous aurez besoin d\'ajouter votre ligne Adsense au fichier avant de le mettre en ligne','themoneytizer') ?>
                    </p>
                </div>
                <h5><?php _e('CMP', 'themoneytizer');?></h5>
                <div id="el-intro-8" class="themoneytizer_card mid-size" style="margin-bottom:20px">
                    <p class="mid-size">
                        <?php _e('Afin de mettre en conformité votre site avec le nouveau Règlement Général sur la Protection des Données, il est impératif de diffuser un bandeau de consentement compatible avec cette nouvelle loi.','themoneytizer') ?>
                    </p>
                    <p>
                        <?php _e('Copiez le code ci-dessous et mettez le dans le "head" de votre site ou activer le placement automatique de la CMP','themoneytizer') ?>
                    </p>
                    <div style="width: 100%; margin-bottom: 20px; margin-top:20px;">
                        <input onClick="cmp_setting()" name="cmp-auto-checkbox" type="checkbox" id="option_auto_cmp"
                            <?php echo (get_option('themoneytizer_data_auto_cmp')==1 ? 'checked' : '') ?>
                        />
                        <span><?php _e('Placement automatique de la CMP sur votre site', 'themoneytizer') ?></span>
                    </div>
                    <div id="themoneytizer_tag_cmp" style="display: <?php echo (get_option('themoneytizer_data_auto_cmp')==1 ? 'none' : 'block') ?>"></div>
                    <div id="container_themoney_copy_cmp" style="display: <?php echo (get_option('themoneytizer_data_auto_cmp')==1 ? 'none' : 'inline-block') ?>">
                        <button class="themoneytizer_button" id="themoney-copy-cmp"><?php _e('Copier dans le presse papier','themoneytizer') ?></button>
                    </div>
                    <button style="max-width: unset;" class="themoneytizer_button" id="themoney-check-cmp" onclick="checkCmp(<?= $themoney_website->site_id; ?>)"><?php _e('Vérifier votre bandeau de consentement','themoneytizer') ?></button>
                </div>
                <h5><?php _e('Paramètres','themoneytizer');?></h5>
                <p class="themoneytizer_card mid-size">
                    <?php _e('Version actuelle du plugin','themoneytizer');?>: <?= get_option('themoneytizer_plugin_version')?>
                    <br/>
                    <?php _e("Vous pouvez reinitialiser le plugin si vous le souhaitez en cliquant sur le bouton ci-dessous :",'themoneytizer');?>
                    <br/>
                    <button type="button" style="margin-top: 5px" class="themoneytizer_button" data-bs-toggle="modal" data-bs-target="#resetPlugin">
                        <?php _e('Réinitialisation du plugin','themoneytizer');?>
                    </button>
                    <div class="modal fade" id="resetPlugin" tabindex="-1" aria-labelledby="#resetPluginLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="resetPluginLabel"><?php _e('Réinitialisation du plugin','themoneytizer');?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <?php _e('Êtes-vous sûr de vouloir réinitialiser le plugin ?','themoneytizer');?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php _e('Non','themoneytizer');?></button>
                            <button type="button" onClick="resetPlugin()" class="themoneytizer_button"><?php _e('Oui','themoneytizer');?></button>
                        </div>
                        </div>
                    </div>
                    </div>
                </p>
            </div>
        </div>
    </div>
</div>
