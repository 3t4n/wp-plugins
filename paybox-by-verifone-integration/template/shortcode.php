<?php

if (!defined('ABSPATH')) {
    exit;
}
?>

<style>
    .paybox-shortcode ul {
        list-style-type: square;
        margin-left: 40px;
    }

</style>
<div id="paybox-shortcodes">
    <p>
        L'extension Paybox by Verifone vous propose un Shortcode (balise de texte formatté entre crochets) permettant d'intégrer directement un bouton de paiement dans vos articles, pages, barres latérales...
    </p>
    <div class="paybox-shortcode">
        <h2>Bouton de paiement</h2>
        <p>
            <em>Intégrez rapidement un ou plusieurs boutons de paiement dans votre site avec un Shortcode simple à paramétrer. Lors de l'affichage du bouton sur la partie publique du site, les paramètres sont encryptés empêchant leur modification ou tentative de fraude par vos visiteurs (changement de montant, récupération de votre adresse e-mail...).</em>
        </p>
        <p>
            <strong>Exemple d'utilisation du Shortcode</strong><br />
            Code à placer et à adapter selon vos besoins dans l'éditeur de texte d'un article, d'une page... (en utilisant de préférence l'onglet "Texte")<br />
            <code style="line-height:3;">[paybox_button button-label="Payer" amount="10" currency="EUR" mail="wordpress-paybox@verifone.com" params="reference-additionnelle-de-paiement"]</code>
        </p>
        <p>
            <strong>Paramètres à renseigner pour le bon fonctionnement du Shortcode</strong><br />
            <ul>
                <li><strong>"button-label" :</strong> texte apparaissant sur le bouton de paiement</li>
                <li><strong>"amount" :</strong> montant du paiement</li>
                <li><strong>"currency" :</strong> devise du paiement dans la norme ISO 4217 (<a href="https://fr.wikipedia.org/wiki/ISO_4217" target="_blank">code alphabétique composé de 3 lettres</a>)</li>
                <li><strong>"mail" :</strong> adresse e-mail de notification de paiement (par exemple : adresse e-mail de l'administrateur du site)</li>
                <li><strong>"params" :</strong> texte additionnel utilisé dans la référence de paiement vous permettant de facilement identifier les paiements réalisés par ce bouton dans votre Back-Office Paybox</li>
            </ul>
        </p>
        <p>
            <strong>Fonctionnement</strong><br />
            Lors d'un clic sur le bouton, le visiteur sera redirigé vers la page de paiement Paybox by Verifone l'invitant à choisir son moyen de paiement puis réaliser son paiement. Le visiteur est ensuite redirigé sur le site, sur une page spécifique selon le cas de figure (3 pages sont créées par l'extension et peuvent être modifiées à votre convenance dans votre interface d'administration du site) :
            <ul>
                <li><strong>Paiement validé :</strong> le paiement a été autorisé et capturé par Paybox</li>
                <li><strong>Paiement annulé :</strong> le visiteur a annulé son paiement</li>
                <li><strong>Paiement refusé :</strong> un problème est survenu lors du paiement (moyen de paiement invalide, trop de tentatives de paiement...)</li>
            </ul>
        </p>
    </div>   
</div>