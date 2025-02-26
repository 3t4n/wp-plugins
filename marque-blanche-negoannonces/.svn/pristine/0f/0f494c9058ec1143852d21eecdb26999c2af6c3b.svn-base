<?php 
/*
Plugin Name: Marque Blanche negoAnnonces
Plugin URI: https://negoannonces.com
Description: Installation de LIENS pour CREER un service d'Achat/Vente optimisé, GENERER du Trafic et MONETISER votre audience (Gains automatiques sans comparaison: 75% de reversement).La Marque Blanche negoAnnonces propose un concept innovant qui garantit l'optimisation des prix pour acheter ou vendre n'importe quel article neuf ou d'occasion. Ainsi, en quelques clics, vous pouvez créer GRATUITEMENT votre propre Plate-forme de negoAnnonces pour la lier à votre site et garantir à votre clientèle d'ACHETER toujours moins cher que le Prix indiqué (88% de remise en moyenne) ou VENDRE jusqu’à 3 fois le Prix de mise en vente !
Version: 1.0
Author: Stéphane Closse
Author URI: https://negoannonces.com
License: GPLv2 or later
*/

add_action("widgets_init", "negoannonces_init"); 

function negoannonces_init() { 
    register_widget("negoannonces_widget");
}

class negoannonces_widget extends WP_widget {
    function negoannonces_widget() {
        $options = array(
            "classname" => "negoannonces_widget", 
            "description"   => "Permet l'affiliation à la marque blanche negoAnnonces pour monétiser votre site par l'insertion automatique d'un LIEN à choisir."
        );
        $this->WP_widget("nego-widget", "LIEN monétisé negoAnnonces", $options);
    }

    function widget($args,$instance) {
        extract($args);
        echo $before_widget; 
        echo $before_title;
        echo $instance['nego_titre'];
        echo $after_title; ?>
        <div style="text-align: center">
            <?= $instance['nego_code'] ?>
        </div>
        <?php
        echo $after_widget;
        
    }

    function update($new,$old) {
        return $new;
    }

    function form($instance) { 
        $default = array(
            "nego_titre"    => "retrouvez nous sur negoAnonces", 
            "nego_code"     => ""
        );
        $instance = wp_parse_args($instance, $default);
        ?>
        <p>
            Ce widget vous permet de placer un LIEN negoAnnonces sur votre Site.<br/>
            Si vous n'êtes pas encore Partenaire negoAnnonces, vous devez vous inscrire sur <a href='https://negoannonces.com/' target='_blank'>www.negoannonces.com</a>, 
            pour créer préalablement votre propre Plate-forme negoAnnonces à lier à votre Site.<br/>
            Si vous êtes déjà Partenaire, vous pouvez créer votre LIEN negoAnnonces et récupérer son code, à partir de votre "Espace Partenaire" rubrique "Accès".<br/>
            En insérant le code copié ci-dessous, votre LIEN s'affichera automatiquement sur votre site, redirigera vers votre Plate-forme negoAnnonces, et permettra 
            l’affichage des statistiques de vos gains dans votre « Espace negoAnnonces ».<br/>
            Prenez soin de bien choisir la taille de votre LIEN (tous les formats standards de bannières sont proposés) en fonction de l'emplacement de votre widget.
<!--
            Ce widget vous permet de placer une bannière negoAnnonces sur votre site.</br>
            Si vous n'êtes pas encore partenaire negoAnnonces, vous devez vous inscrire sur notre site 
            <a href='https://negoannonces.com/' target='_blank'>negoannonces.com</a>.<br/>
            Si vous êtes déjà partenaire, vous pouvez récupérer un code dans votre "espace negoannonces", rubrique "Accès".<br/> 
            En insérant votre code ci-dessous, une bannière s'affichera sur votre site et redirigera vers votre site negoannonces.<br/><br/>
            Prenez soin de bien choisir la taille de votre bannière en fonction de l'emplacement de votre widget.   -->
        </p>
        <p>
            <label for="<?= $this->get_field_id('nego_titre') ?>">Titre</label>
            <input type="text" name="<?= $this->get_field_name('nego_titre') ?>" id="<?= $this->get_field_id('nego_titre') ?>" class="widefat" value="<?= $instance['nego_titre'] ?>" />
        </p>
        <p>
            <label for="<?= $this->get_field_id('nego_code') ?>">Code negoAnnonces</label>
            <textarea name="<?= $this->get_field_name('nego_code') ?>" id="<?= $this->get_field_id('nego_code') ?>" class="widefat"><?= $instance['nego_code'] ?></textarea>
        </p>
    <?php }
}
?>