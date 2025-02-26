<!-- Onglet configuration du backoffice -->
<?php  $Hob_ac_view = new Hob_ac_view; ?>
<section class="ac-configuration">

    <?php $Hob_ac_view->hob_ac_create_select_input('Position du bandeau',"hod-ac-c-position-du-bandeau",array(['true','Bas'],['false','Haut'])); ?>

    <?php $Hob_ac_view->hob_ac_create_text_input('Durée du consentement (en jours)',"hod-ac-c-duree-du-consentement"); ?>

    <?php $Hob_ac_view->hob_ac_create_text_input('Délai avant apparition du bandeau (en secondes)',"hod-ac-c-delai-du-bandeau"); ?>


    <div class="control control-textarea">
        <p><?php echo( esc_html(__('Texte du bandeau','advancedcookies'))) ?></p>
        <?php $Hob_ac_view->hob_ac_create_wp_editor('hod-ac-c-texte-du-bandeau'); ?>
    </div>

    <?php 
        $Hob_ac_view->hob_ac_create_text_input('Texte du lien "en savoir plus"',"hod-ac-c-texte-du-lien-en-savoir-plus");
        $Hob_ac_view->hob_ac_create_text_input('Texte du bouton d\'acceptation',"hod-ac-c-texte-du-bouton-acceptation");
        $Hob_ac_view->hob_ac_create_text_input('Texte du bouton de refus',"hod-ac-c-texte-du-bouton-refus"); 
    ?>

    <div class="control control-radio">
        <p><?php echo( esc_html(__('Position des boutons aléatoire','advancedcookies'))) ?></p>
        <?php $Hob_ac_view->hob_ac_create_radio_input(array('post_alea_desac','post_alea_act'),'hod-ac-c-post-alea',array('true','false'),'',array('Désactiver','Activer'),false); ?>
    </div>
    <?php 
        $Hob_ac_view->hob_ac_create_text_input('Texte du bouton Paramètre',"hod-ac-c-texte-du-bouton-parametre"); 
        $Hob_ac_view->hob_ac_create_text_input('Url du lien (En savoir plus)',"hod-ac-c-url-du-lien"); 
    ?>

    <hr>
    <h5><?php echo( esc_html(__('Paramètrage de bouton de \'Cookies\'','advancedcookies'))) ?></h5>
    <div class="control control-radio">
        <p><?php echo( esc_html(__('Cacher / Montrer','advancedcookies'))) ?></p>
        <?php $Hob_ac_view->hob_ac_create_radio_input(array('c-cacher','c-montrer'),'hod-ac-c-cookie-bouton',array('true','false'),'oninput="see_param_button_cookie(this)"',array('Cacher','Montrer'),false); ?>
    </div>
    <div id="params_cookies" <?php if(get_option('hod-ac-c-cookie-bouton') == 'true'){ echo "style='display:none'"; }; ?>>
        <?php 
            $Hob_ac_view->hob_ac_create_select_input('Bouton position',"hod-ac-c-bouton-position",array(['true','Gauche'],['false','Droite']));
            $Hob_ac_view->hob_ac_create_select_input('Mode d\'affichage',"hod-ac-c-mode-affichage",array(['absolute','Afficher en bas de site (Absolute)'],['fixed','Flottant (fixed)'],['relative','Afficher dans la position relative']));
            $Hob_ac_view->hob_ac_create_text_input('Bouton texte',"hod-ac-c-bouton-texte"); 
        ?>
    </div>
    <hr>
    <?php 
        foreach ($Hob_ac_view->list_color as $key => $value): ?>
            <h5><?php echo esc_html($key) ?></h5>
            <?php $Hob_ac_view->hob_ac_create_color_input($value);
            echo "<hr>";
        endforeach; 
    ?>
    
    <h5><?php echo( esc_html(__('Paramètrage des textes','advancedcookies'))) ?></h5>
    <?php 
        foreach ($Hob_ac_view->ad_list_editor  as $value): ?>
            <div class="control control-textarea">
                <p><?php echo (esc_html($value[0])) ?></p>
                <?php $Hob_ac_view->hob_ac_create_wp_editor($value[1]); ?>
            </div>
    <?php 
        endforeach; 
    ?>
    <div class="ac-enregistrer">
        <button type="button" onclick='save_configuration(this)'>
            <img src="<?php echo( esc_url(HOB_AC_URL_SCRIPT )) ?>asset/img/disquette.png" alt="Enregistrer">
            <?php echo( esc_html(__('Enregistrer','advancedcookies'))) ?>
        </button>
    </div>
</section>

