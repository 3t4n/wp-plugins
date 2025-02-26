<?php  
// Activatio nde la classe Viiew
$Hob_ac_view = new Hob_ac_view;


// Si mode bouton aléatoire activé, je crée un rand sur deux variable pour faire un vrais aléatoire
if(get_option('hod-ac-c-post-alea')  == 'false'){
    $hob_pos_accept = rand(0,1000);
    $hob_pos_refuse = rand(0,1000);
}else{
    $hob_pos_accept = 1000;
    $hob_pos_refuse = 0;
}

// Si aucun cookie hob
$hob_choice_cookie = array(
    "cat1=N",
    "cat2=N",
    "cat3=N",
    "cat4=N"
); 

// récupération du cookie hob si existe
$hob_cookie = isset($_COOKIE['HOB-cookie']) ? sanitize_text_field( $_COOKIE['HOB-cookie'] ) : '';

if($hob_cookie != ''){   
    $hob_choice_cookie = explode(' ', $hob_cookie);
}

// concaténation du texte bandeau avec le lien
$ac_texte_bandeau = str_replace('</p>','<a style="margin-left:3px;color:'. get_option('hod-ac-c-c-lien-savoir').';" href="'.get_option('hod-ac-c-url-du-lien') .'">'. get_option('hod-ac-c-texte-du-lien-en-savoir-plus').'</a></p>',get_option('hod-ac-c-texte-du-bandeau'));

?>
<link rel='dns-prefetch' href='//www.google.com' />

<!-- Bandeau si aucun cookie Hob -->
<section id="ac_section_presentation" style="<?php if($hob_cookie != ''){ echo "display:none;"; } ?><?php if(get_option('hod-ac-c-position-du-bandeau')){ echo "bottom:0;background-color:".esc_html(get_option('hod-ac-c-c-fond')).";"; }else{ echo "top:0;background-color:".esc_html(get_option('hod-ac-c-c-fond')).";"; }  ?>">
    <!-- Texte du bandeau -->
    <div id="ac_texte_bandeau" style="color:<?php echo( esc_html(get_option('hod-ac-c-c-texte-info'))) ?>">

        <?php echo( esc_html($ac_texte_bandeau )) ?>
    </div>
    <!-- Boutons -->
    <div id="ac-button-choose">
            <button data-toggle="modal" data-target="#ac-modal" id="ac-show-modal" style="background-color:<?php echo( esc_html(get_option('hod-ac-c-c-bouton-parametre'))) ?>;border:2px solid <?php echo( esc_html(get_option('hod-ac-c-c-bordure-parametre'))) ?>;color:<?php echo( esc_html(get_option('hod-ac-c-c-texte-parametre'))) ?>;" id="ac_Modal_btn" type="button" class="button_custom"><?php echo( esc_html(get_option('hod-ac-c-texte-du-bouton-parametre'))) ?></button>
            <?php if($hob_pos_accept > $hob_pos_refuse): ?>
                <button onclick="ac_cookie_event.setCookie('cat1=N cat2=N cat3=N cat4=N')" style="background-color:<?php echo( esc_html(get_option('hod-ac-c-c-bouton-refus'))) ?>;border:2px solid <?php echo( esc_html(get_option('hod-ac-c-c-bordure-refus'))) ?>;color:<?php echo( esc_html(get_option('hod-ac-c-c-texte-refus'))) ?>;" id="refuse_all_g" type="button" class="button_custom"><?php echo( esc_html(get_option('hod-ac-c-texte-du-bouton-refus'))) ?></button>
                <button onclick="ac_cookie_event.setCookie('cat1=Y cat2=Y cat3=Y cat4=Y')" style="background-color:<?php echo( esc_html(get_option('hod-ac-c-c-bouton-acceptation'))) ?>;border:2px solid <?php echo( esc_html(get_option('hod-ac-c-c-bordure-acceptation'))) ?>;color:<?php echo( esc_html(get_option('hod-ac-c-c-texte-acceptation'))) ?>;" id="accept_all_g" type="button" class="button_custom"><?php echo( esc_html(get_option('hod-ac-c-texte-du-bouton-acceptation'))) ?></button>
            <?php else: ?>
                <button onclick="ac_cookie_event.setCookie('cat1=Y cat2=Y cat3=Y cat4=Y')" style="background-color:<?php echo( esc_html(get_option('hod-ac-c-c-bouton-acceptation'))) ?>;border:2px solid <?php echo( esc_html(get_option('hod-ac-c-c-bordure-acceptation'))) ?>;color:<?php echo( esc_html(get_option('hod-ac-c-c-texte-acceptation'))) ?>;" id="accept_all_g" type="button" class="button_custom"><?php echo( esc_html(get_option('hod-ac-c-texte-du-bouton-acceptation'))) ?></button>
                <button onclick="ac_cookie_event.setCookie('cat1=N cat2=N cat3=N cat4=N')" style="background-color:<?php echo( esc_html(get_option('hod-ac-c-c-bouton-refus'))) ?>;border:2px solid <?php echo( esc_html(get_option('hod-ac-c-c-bordure-refus'))) ?>;color:<?php echo(esc_html(get_option('hod-ac-c-c-texte-refus'))) ?>;" id="refuse_all_g" type="button" class="button_custom"><?php echo( esc_html(get_option('hod-ac-c-texte-du-bouton-refus'))) ?></button>
            <?php endif; ?>
    </div>
</section>

<!-- Bouton cookie  -->
<section id="ac_button_cookie" style="z-index: 100000;position:<?php echo( esc_html(get_option('hod-ac-c-mode-affichage'))) ?>;<?php if($hob_cookie != '' && get_option('hod-ac-c-cookie-bouton') == "false"){ echo "display:block;"; } ?><?php if(get_option('hod-ac-c-bouton-position') == "true"){ echo "left:1%;float: left;"; }else{echo "right:1%;float: right;";} ?>">
            <button style="border-color:<?php echo( get_option('hod-ac-c-c-cookie-bordure')) ?>;color:<?php echo( esc_html(get_option('hod-ac-c-c-cookie-texte'))) ?>;background-color:<?php echo( esc_html(get_option('hod-ac-c-c-cookie_fond'))) ?>" id="ac-show-modal-change" data-toggle="modal" data-target="#ac-modal"><?php echo( esc_html(get_option('hod-ac-c-bouton-texte'))) ?></button>
</section>

<!-- Style modifier selon choix admin -->
<style>
    #ac_button_cookie button:hover {
        background-color: <?php echo( esc_html(get_option('hod-ac-c-c-cookie_fond-s'))) ?> !important;
        color: <?php echo( esc_html(get_option('hod-ac-c-c-cookie-texte-s'))) ?> !important;
    }
    #ac-content-tab p{
        color: <?php echo( esc_html(get_option('hod-ac-c-c-modal-cat-texte'))) ?>;
        background-color: <?php echo( esc_html(get_option('hod-ac-c-c-modal-cat-fond'))) ?>;
    }
    #ac-content-tab p:hover {
        cursor: pointer;
        color: <?php echo( esc_html(get_option('hod-ac-c-c-modal-cat-texte-s'))) ?> !important;
        background-color: <?php echo( esc_html(get_option('hod-ac-c-c-modal-cat-fond-s'))) ?> !important;
    }
    #ac-content-modal h6{
        color: <?php echo( esc_html(get_option('hod-ac-c-c-modal-corps-titre'))) ?> !important;
    }
    #ac-content-modal p{
        color: <?php echo( esc_html(get_option('hod-ac-c-c-modal-corps-texte'))) ?> !important;
    }
    #ac-content-modal a{
        color: <?php echo( esc_url(get_option('hod-ac-c-c-modal-corps-lien'))) ?> !important;
    }
    .ac-mdl-dialog #ac-modal-accept_all {
        border: 2px solid <?php echo( esc_html(get_option('hod-ac-c-c-modal-fond-accept-s'))) ?>;
        background-color: <?php echo( esc_html(get_option('hod-ac-c-c-modal-fond-accept'))) ?>;
        color: <?php echo( esc_html(get_option('hod-ac-c-c-modal-texte-accept'))) ?>;
    }
    .ac-mdl-dialog #ac-modal-accept_all:hover {
        background-color: <?php echo( esc_html(get_option('hod-ac-c-c-modal-fond-accept-s'))) ?>;
        color: <?php echo( esc_html(get_option('hod-ac-c-c-modal-texte-accept-s'))) ?>;
    }

    .ac-mdl-dialog #ac-modal-valid:hover {
        background-color: <?php echo( esc_html(get_option('hod-ac-c-c-modal-fond-valider-s'))) ?>;
        color: <?php echo( esc_html(get_option('hod-ac-c-c-modal-texte-valider-s'))) ?>;
    }

    .ac-mdl-dialog #ac-modal-valid{
        border: 2px solid <?php echo( esc_html(get_option('hod-ac-c-c-modal-fond-valider-s'))) ?>;
        background-color: <?php echo( esc_html(get_option('hod-ac-c-c-modal-fond-valider'))) ?>;
        color: <?php echo( esc_html(get_option('hod-ac-c-c-modal-texte-valider'))) ?>;
    }

    .ac-mdl-dialog #ac-modal-decline_all {
        border: 2px solid <?php echo( esc_html(get_option('hod-ac-c-c-modal-fond-reject-s'))) ?>;
        background-color: <?php echo( esc_html(get_option('hod-ac-c-c-modal-fond-reject'))) ?>;
        color: <?php echo( esc_html(get_option('hod-ac-c-c-modal-texte-reject'))) ?>;
    }

    .ac-mdl-dialog #ac-modal-decline_all:hover{
        background-color: <?php echo( esc_html(get_option('hod-ac-c-c-modal-fond-reject-s'))) ?>;
        color: <?php echo( esc_html(get_option('hod-ac-c-c-modal-texte-reject-s'))) ?>;
    }

</style>

<!-- fond -->
<section id="ac-fond"></section>

<!-- Modal -->
<section class="ac-mdl-dialog" id="ac-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="ac-mdl-dialog__content">
        <!-- Header -->
        <header style="color:<?php echo( esc_html(get_option('hod-ac-c-c-texte-info'))) ?>;<?php echo( "background-color:".esc_html(get_option('hod-ac-c-c-modal-entete-fond'))).";";  ?>">
            <h4 style="font-size: 0.9rem;color:<?php echo( esc_html(get_option('hod-ac-c-c-modal-entete-texte'))) ?>;" ><?php echo( esc_html(__('Paramétrages de cookies','advancedcookies'))) ?></h4>
            <button class="ac-mdl-button ac-mdl-button-close" style="color:<?php echo( esc_html(get_option('hod-ac-c-c-modal-entete-texte'))) ?>;background-color:<?php echo( esc_html(get_option('hod-ac-c-c-modal-entete-fond'))) ?>;" data-dismiss="modal" aria-label="Close">X</button>
        </header>
        <!-- Choix type cookie -->
        <section  id="ac-content-tab" style="<?php echo( "background-color:".esc_html(get_option('hod-ac-c-c-modal-cat-fond'))).";";  ?>">
            <p onclick="ac_cookie_event.change_content_modal(1);" id="ac-button_information-1" class="list_button_information"><?php echo( esc_html(__('Cookies fonctionnels','advancedcookies'))) ?></p>
            <p onclick="ac_cookie_event.change_content_modal(2);" id="ac-button_information-2" class="list_button_information"><?php echo( esc_html(__('Mesure d\'audience','advancedcookies'))) ?></p>
            <p onclick="ac_cookie_event.change_content_modal(3);" id="ac-button_information-3" class="list_button_information"><?php echo( esc_html(__('Contenus interactifs','advancedcookies'))) ?></p>
            <p onclick="ac_cookie_event.change_content_modal(4);" id="ac-button_information-4" class="list_button_information"><?php echo( esc_html(__('Réseaux sociaux/Vidéos','advancedcookies'))) ?></p>
            <p onclick="ac_cookie_event.change_content_modal(5);" id="ac-button_information-5" class="list_button_information"><?php echo( esc_html(__('Autres cookies','advancedcookies'))) ?></p>
        </section>
        <!-- Liste des choix selon le type de cookie selection -->
        <form id="ac-content-modal" style="color:<?php echo( esc_html(get_option('hod-ac-c-c-texte-info'))) ?>;">
            <?php foreach ($Hob_ac_view->list_information as $key => $information): ?>
                <div id="<?php echo( esc_html($key)) ?>" class="ac_list_information">
                    <h6><?php echo( esc_html($information[0])) ?></h6>
                    <?php
                        if($information[1]):
                            echo (esc_html(get_option($information[1])));
                            // var_dump(esc_html(get_option($information[1])));
                        endif;
                    ?>
                    <?php if($information[2]): ?>
                        <div class="ac-switch">
                            <input type="checkbox" id="<?php echo( esc_html($information[6])) ?>" class="hob_cookie_choice" name="hob_cookie_choice[]" <?php if($hob_choice_cookie[$information[3]] == $information[7]) echo "checked"; ?> /><label for="<?php echo( esc_html($information[6])) ?>"></label>
                        </div>
                    <?php endif; ?>
                    <?php if($information[4]):
                        foreach ($information[5] as $value):
                            if(get_option($value[0])): ?>
                                <div class="type-cookies">
                                    <div class="title_cookies" onclick="ac_cookie_event.information_cookie(this);">
                                        <p><?php echo( esc_html($value[1])) ?></p>
                                        <p>+</p>
                                    </div>
                                    <div>
                                        <p><?php echo( esc_html(get_option($value[2]))) ?></p>
                                        <a href="<?php echo( esc_url($value[3])) ?>">Voir le site officiel</a>
                                    </div>
                                </div>
                            <?php endif; 
                        endforeach;
                    endif; ?>
                </div>
            <?php endforeach; ?>
        </form>
    </div>
    <!-- Boutons -->
    <div class="ac-mdl-dialog__actions">
        <div>
            <button id="ac-modal-accept_all" type="button" class="button_custom ac-mdl-button-close" onclick="ac_cookie_event.setCookie('cat1=Y cat2=Y cat3=Y cat4=Y cat5=Y')"><?php echo( esc_html(__('Accepter tous cookies','advancedcookies'))) ?></button>
            <button id="ac-modal-decline_all" type="button" class="button_custom ac-mdl-button-close" onclick="ac_cookie_event.setCookie('cat1=N cat2=N cat3=N cat4=N cat5=N')"><?php echo( esc_html(__('Refuser tous cookies','advancedcookies'))) ?></button>
        </div>
        <div>
            <button id="ac-modal-valid" type="button" class="button_custom ac-mdl-button-close" onclick="ac_cookie_event.cookie_choice()"><?php echo( esc_html(__('Valider','advancedcookies'))) ?></button>
        </div>
    </div>
        <footer>
            <p>©Copyright <a href="https://www.hob-france.com/" target="_blank">HOB France Services, Expert Wordpress</a></p>
        </footer>
</section>


<script>

    // Ajout d'un délai possible pour afficher le bandeau de cookie
    const delayBandeau =  document.getElementById('ac_section_presentation');

    <?php if($hob_cookie != ''){ ?>
        delayBandeau.classList.remove("show");
    <?php
    }
    else { ?>
        setTimeout(function() {
            delayBandeau.classList.add("show");
        }, 
        <?php echo( esc_html(get_option('hod-ac-c-delai-du-bandeau'))) ?> * 1000);
    <?php
        } 
    ?>
    
    
    const value = ('; '+document.cookie).split(`; COOKIE_NAME=HOB-cookie`).pop().split(';')[0];
    console.log(value);


    value_or_null = (document.cookie.match(/^(?:.*;)?\s*HOB-cookie\s*=\s*([^;]+)(?:.*)?$/)||[,null])[1]

    if(value_or_null){
        var bandeau
    }
    /* Création class javascript */
    const ac_cookie_event = {

        /* Class construct ( importante a appellé des la ccréation de ac_cookie_event ) */
        construct : function(){
            // Attributs //
            this.modal = document.querySelector('#ac-modal');
            this.fond = document.getElementById('ac-fond');
            this.closeButton = this.modal.querySelector('.ac-mdl-button-close');
            this.showButton = document.querySelector('#ac-show-modal');
            this.cookie_button = document.querySelector('#ac-show-modal-change');

            // Bandeau //
            this.bandeau =  document.getElementById('ac_section_presentation');

            value_or_null = (document.cookie.match(/^(?:.*;)?\s*HOB-cookie\s*=\s*([^;]+)(?:.*)?$/)||[,null])[1];

            if(value_or_null){
                this.bandeau.style.display = "none";
                this.cookie_button.style.display = "block";

            }else{
                this.bandeau.style.display = "flex";
                this.cookie_button.style.display = "none";
            }

            // If Cookie button absolute //
            body = document.getElementsByTagName('body')[0];
            <?php if(get_option('hod-ac-c-mode-affichage') == "absolute"){
                echo "body.style.position = 'relative'";
            } ?>
        },

        /* Evenement display : block / none  sur les informatiosn des cookies*/
        information_cookie : function (element){
            if( element.nextElementSibling.style.display != 'block'){
                element.nextElementSibling.style.display = "block";
            }else{
                element.nextElementSibling.style.display = "none";
            }
        },

        /* Remise a zero du visuel de la modal */
        change_content_modal : function (id){
            var ac_info = document.getElementById("ac-information-" + id);
            var ac_button = document.getElementById("ac-button_information-" + id);
            var ac_list_info = document.getElementsByClassName("ac_list_information");

            Array.from(document.getElementsByClassName("ac_list_information")).forEach(function(div) {
                div.style.display = "none";
            });

            ac_info.style.display = "block";

            Array.from(document.getElementsByClassName("list_button_information")).forEach(function(p) {
                p.style.background = "<?php echo( esc_html(get_option('hod-ac-c-c-modal-cat-fond'))) ?>";
                p.style.color = "<?php echo( esc_html(get_option('hod-ac-c-c-modal-cat-texte'))) ?>";
            });

            ac_button.style.background = "<?php echo( esc_html(get_option('hod-ac-c-c-modal-cat-fond-s'))) ?>";
            ac_button.style.color = "<?php echo( esc_html(get_option('hod-ac-c-c-modal-cat-texte-s'))) ?>";
        },
         
        /* Récupération des choix cookies */
        cookie_choice : function (){
            var up_forms = document.getElementsByClassName("hob_cookie_choice");

            var cvalue = "";

            for (let index = 0; index < up_forms.length; index++) {
                $i = index + 1;
                $mode = "N ";
                if(up_forms[index].checked){
                    $mode = "Y ";
                }
                cvalue += "cat" + $i + "=" + $mode;
            }

            this.setCookie(cvalue);
    
        },

        /* Création du cookie hob et rrefresh de la page */
        setCookie : function(cvalue) {

            const d = new Date();
            d.setTime(d.getTime() + (<?php echo( esc_html(get_option('hod-ac-c-duree-du-consentement'))) ?> * 24 * 60 * 60 * 1000));

            let expires = "expires="+d.toUTCString();
            document.cookie = "HOB-cookie" + "=" + cvalue + ";" + expires + ";path=/";
            var modal = document.querySelector('#ac-modal');

            this.change_select_cookie(cvalue);
            ac_cookie_event.closeModal(this.modal,this.fond);

            this.hide_bandeau();
            location.reload();
        },

        /* Modification des cookies selectionner */
        change_select_cookie : function (cvalue){

            const cookie_choose = cvalue.split(' ');
            var up_forms = document.getElementsByClassName("hob_cookie_choice");

            for (let index = 0; index < cookie_choose.length; index++) {
                i = index + 1;
                var cat = "cat" + i + "=Y";
                if(cookie_choose[index] == cat){
                    if(up_forms[index] != undefined){
                        up_forms[index].checked = true;
                    }
                }else{
                    if(up_forms[index] != undefined){
                        up_forms[index].checked = false;
                    }
                }
            }

        },

        /* Cacher le bandeau */
        hide_bandeau : function (){
            this.bandeau.style.display = "none";
            this.cookie_button.parentNode.style.display = "block";
        },

        /* Gestion des evenement dans la modal */
        modalEvent : function() {
            'use strict';
            this.change_content_modal(1);

            var modal = this.modal;
            var fond = this.fond;

            var closeClickHandler = function(event) {
                ac_cookie_event.closeModal(modal,fond);
            };
            var showClickHandler = function(event) {
                ac_cookie_event.showModal(modal,fond);
            };
            this.cookie_button.addEventListener('click', showClickHandler);
            this.showButton.addEventListener('click', showClickHandler);
            this.closeButton.addEventListener('click', closeClickHandler);
            this.fond.addEventListener('click', closeClickHandler);
        },

        /* Activer la modal */
        showModal : function(modal,fond) {
            modal.style.display = "block";
            fond.style.display = "block";
        },

        /* Enlever la modal */
        closeModal : function(modal,fond) {
            modal.style.display = "none";
            fond.style.display = "none";
        }

    }


    /* Activation de la class et des functions */
    ac_cookie_event;
    ac_cookie_event.construct();
    ac_cookie_event.modalEvent();



</script>
