<?php
/*
 *
 * LiveOptim - Optimize the content of your articles and automatically tickets to easily improve your position in the results of search engines: Google, Baidu, Yandex, Bing ... 
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl.htm
 * Copyright (C) 2012 Erwan MILBEO — All rights reserved
 * For more information see the README
 * Any question will find answer on  
 * [support@liveoptim.com](mailto:support@liveoptim.com)
 * our Timelines : [US-EN](https://twitter.com/LiveOptim_US) | [FR](https://twitter.com/LiveOptim_FR) | [ES](https://twitter.com/LiveOptim_ES)
 *
 * langue : fr 
 */

$langue = array(
		
		// layout
		'parametrage' => 'Paramétrage',
		'contact' => 'Nous contacter',
		'facebook' => 'Rejoignez-nous',
		'twitter' => 'Besoin d\'aide ?',
		'twitter2' => '@liveoptim',
		'inscription_message' => 'Inscrivez votre site pour activer LiveOptim',
		'accueil_erreur_pas_de_compte' => 'Compte inactif.',
		'accueil_inscrivez_vous_ici' => 'Inscription',
		'accueil_copte_client_actif' => 'Compte activé',
		'accueil_compte_client_inactif' => 'Compte non activé',
		'accueil_mots_cles' => 'Mots Clés',
		'accueil_balise_ignores' => 'Exceptions de traitement',
		'accueil_pattern' => 'Schéma de balisage global',
		'accueil_pattern_cible' => 'Schéma de balisage sur page cible',
		'accueil_nouveau_mdp' => 'Nouveau mot de passe',
		'modifier' => 'Modifier',

		
		
		// connexion.php
		'connexion_1' => 'Acc&egrave;s administration',
		'connexion_content' => '
		Indiquez ci-dessous votre mot de passe de connexion &agrave; l\'administration LiveOptim<sup>&copy;</sup>
		
		',
		'connexion_titre' => 'Mot de passe :',
		'connexion_connexion' => 'Connexion',
		'connexion_messageErreur_1' => 'Mot de passe erron&eacute;',
		
		// nouveauMdp.php
		'nouveauMdp_titre' => 'Bienvenue sur LiveOptim<sup>&copy;</sup>',
		'nouveauMdp_content' => '
		D&eacute;finissez le mot de passe qui vous servira &agrave; vous connecter 
		&agrave; l&quot;administration du module, et conservez-le pr&eacute;cieusement. 	
		
		',
		'nouveauMdp_titre' => 'Choix du mot de passe :',
		'nouveauMdp_ancien_mdp' => 'Ancien mot de passe :',
		'nouveauMdp_nouveau_mdp' => 'Mot de passe :',
		'nouveauMdp_nouveau_mdp_2' => 'Confirmation :',
		'nouveauMdp_connexion' => 'Enregistrer',
		'nouveauMdp_messageErreur_1' => 'Mots de passe invalides ',
		

			
		// accueil.php
		'accueil_accueil' => 'Accueil',
		'accueil_titre' => 'Bienvenue sur votre console d\'administration LiveOptim',
		'accueil_contenu' => '
		
		<p>Depuis cette interface,  vous pouvez paramétrer le fonctionnement de LiveOptim sur votre site :</p> 
		<ul>
			<li>Expressions clés
				<ul>
					<li><a href="admin.php?page=liveoptim&#38;action=mot-cle-lister">Ajout d\'expressions clés</a>
					<p>Ajoutez ou modifiez votre liste d’expresions clés stratégiques et 
					les URL des pages cibles associées</p></li>
				</ul>
			</li>
			<li>Paramétrage :
				<ul>				
					<li><a href="admin.php?page=liveoptim&#38;action=pattern-lister">Schéma de balisage global</a>
						<p>Schéma de balisage appliqué par défaut<span class="lo_ps">*</span> par la fonction sur les expressions clés présentes dans vos contenus, et leur ordre d’apparition</p>
					</li>
					<li><a href="admin.php?page=liveoptim&#38;action=pattern-cible-lister">Schéma de balisage sur page cible</a> <span class="txt_prenium">(version premium)</span>
						<p>Modifiez le paramétrage des balises sur les expressions clés lorsqu’elles 
						sont traitées sur leur(s) page(s) cible(s)</p>
					</li>
					<li><a href="admin.php?page=liveoptim&#38;action=balise-ignore-lister">Exceptions de traitement</a>
						<p>Balises au sein desquelles les contenus ne doivent pas être 
						traités par la fonction<span class="lo_ps">*</span></p>
					</li>
					<li><a href="admin.php?page=liveoptim&#38;action=restreintes-lister">Pages restreintes</a> <span class="txt_prenium">(version premium)</span>
						<p>Modifiez les pages au sein desquelles les contenus ne doivent pas être 
						traitées par la fonction</p>
					</li>
				</ul>
			</li>
		</ul>
		<p class="txt_etoile"><i><span class="lo_ps">*</span> Modification disponible dans la version prenium</i></p>
		',
		
		
	
		// tutoriel.php
		'tutoriel_titre' => 'Tutoriel',
		'tutoriel_clique' => 'cliquant ici',
		
		'tutoriel_texte' =>'<div>
		<img src="../wp-content/plugins/liveoptim/img/video.png" alt="" style="float:left; margin: 0px 20px 0px 20px;">
		<div style="padding-top:80px;">
			<p style="font-size:18px">Laissez-vous guider par la vidéo tutoriel en <u><a href="http://www.youtube.com/watch?v=6GgK2kVY4_I" target="_blank">cliquant ici</a></u>
			</p>
		</div>
	</div>
	<div>
		<img src="../wp-content/plugins/liveoptim/img/book.png" alt="" style="float:left; margin: 0px 20px 0px 20px;">
		<div style="padding-top:80px; margin-top:70px;">
			<p style="font-size:18px">Téléchargez le tutoriel complet du plugin Liveoptim pour Wordpress en <u><a href="http://www.liveoptim.com/docs/wp_tutoriel_fr.pdf" target="_blank">cliquant ici</a></u>
			</p>
		</div>
	</div>',
		
		'tutoriel_telecharge' => 'Téléchargez le tutoriel complet du plugin Liveoptim pour Wordpress en',
		'tutoriel_video' => 'Laissez-vous guider par la vidéo tutoriel en',
		'tutoriel_contenu' => '
		<p>T&eacute;l&eacute;chargez le tutoriel complet du plugin Liveoptim pour Wordpress en <u><a href="http://www.liveoptim.com/docs/wp_tutoriel_fr.pdf" target="_blank">cliquant ici</a></u></p>
		
		',
		
		
		
		// listerBaliseIgnore.php
		'hintlisterBaliseIgnore'=>'	<div class="hint2">		<img  src="../wp-content/plugins/liveoptim/img/hint.png" alt="?"/>	<p>Indiquez ici les balises au sein desquelles le contenu ne doit pas être traité par LiveOptim</p>',
		
		'listerBaliseIgnore_accueil' => 'Accueil',
		'listerBaliseIgnore_text' => '<div style="margin-top:20px">
<p><span style="font-size: 18px;font-weight:bold; color:#bf4122">Bienvenue dans votre espace Optimisation :
Vous trouvez ici les balises sur lesquelles la fonction ne repassera pas !
</span></p>
<span style="font-size :18px; font-weight:bold">
Il s\'agit d\'un paramétrage avancé. Nous vous conseillons de laisser le paramétrage par défaut<br/><br/>
</span>
</div>',
		'listerBaliseIgnore_balises_ignores' => 'Exceptions de traitement',
		'listerBaliseIgnore_titre' => 'Exceptions de traitement',
		'listerBaliseIgnore_nom' => 'Nom',
		'listerBaliseIgnore_action' => 'Action',
		'listerBaliseIgnore_confirmation_suppression' => 'Etes-vous sur de vouloir supprimer cette restriction ?',
		'listerBaliseIgnore_supprimer' => 'Supprimer',
		'listerBaliseIgnore_modifier' => 'Modifier',
		'listerBaliseIgnore_ajouter' => 'Ajouter',
		
		// layout.php, layoutConnexion.php, layoutNouveauMdp.php
		'layout_title' => 'Admin de Liveoptim',
		'layout_deconnexion' => 'Déconnexion',
		'layout_liveoptim' => 'Liveoptim',
		
		// listerMotCle.php
		'hintMotCle'=>'	<div class="hint2">		<img  src="../wp-content/plugins/liveoptim/img/hint.png" alt="?"/>			<p>Renseignez les expressions clés stratégiques pour votre positionnement, 			la ou  les pages cibles associées et leur ordre de traitement (si vous définissez plusieurs pages cibles pour une même expression clé)</p>			<h2>Conseils d\'utilisation :</h2>			<ul>			<li>Variez les pages Cibles en fonction de vos expressions clés.</li>				<li>Ne modifiez pas trop fréquemment les pages cibles d’une expression clé</li>				</ul>	   			</div>	   			',

		
		'hintLO'=>'	<div class="hint2">		<img  src="../wp-content/plugins/liveoptim/img/hint.png" alt="?"/>			<p>Activez / Désactivez la fonction via ce bouton
          </p>        	   			</div>	   			',

		  'hintconfigue'=>'	<div class="hint2">		<img  src="../wp-content/plugins/liveoptim/img/hint.png" alt="?"/>		<p> Vous pouvez réaliser l’import de vos paramètres ; il vous suffit de choisir la table que vous souhaitez importer ou d’importer toutes les tables (soit 6 tables) en zip. 
</p> 	         	   			</div>	   			',  
		  
		  'hintimport'=>'	<div class="hint2">		<img  src="../wp-content/plugins/liveoptim/img/hint.png" alt="?"/>	<p>Exportez votre base de mots-clés/pages cible et vos paramètres avant toute désactivation du plugin ou mise à jour ! </p>		         	   			</div>	   			',


        'hintLimite'=>'	<div class="hint2">		<img  src="../wp-content/plugins/liveoptim/img/hint.png" alt="?"/>			<p>Paramétrez une limite haute d\'optimisation
       </p>            
       <h2>Conseils d\'utilisation :</h2>           
        <ul>            
       <li>Par défaut, limite de 5 optimisations du même mot-clé dans une page<br />
       </li>
       <li>Nous vous conseillons de ne pas aller au-délà.</li>
       <li>
       Vous pouvez diminuer cette valeur si vous le souhaitez !</li>                
        </ul>             	   			</div>	   			',

		'hintposition'=>'	<div class="hint2">		<img  src="../wp-content/plugins/liveoptim/img/hint.png" alt="?"/>			<p>Vous pouvez définir pour un même mot-clé plusieurs pages associées. La position sert uniquement dans ce cas là. 

</p>            
<h2>Conseils d\'utilisation :</h2>           
 <ul>            
<li>Renseignez plusieurs URLs pour un même mot-clé afin de diversifier les pages cibles<br />
</li>  
<li>Les URLS de ces pages ont alors triées selon un ordre de priorité qui leur est attribué et que vous pouvez définir (via les flèches ou en renseignant une valeur).
</li>             
<li>La fonction fera alors un premier lien vers la première url, et un second lien vers la seconde url, pour le même contenu
</li>      
<li>NB : il ne s\'agit pas de l\'ordre des mots-clés mais celui des URLs.
</li>         
</ul>  	   			</div>	   			',

		'hinturl'=>'	<div class="hint2">		<img  src="../wp-content/plugins/liveoptim/img/hint.png" alt="?"/>			<p>Renseignez ici une ou plusieurs pages associées au mot-clé. Il s\'agit de la page que vous souhaitez positionner sur cette expression clé.
</p>            
<h2>Conseils d\'utilisation :</h2>           
 <ul>            
<li>Renseignez plusieurs URLs pour un même mot-clé afin de diversifier les pages cibles.<br />
Il vous suffit d\'ajouter le même mot-clé avec une URL différente
</li>                
</ul>    	   			</div>	   			',
		
		'hintRequete'=>'	<div class="hint2">		<img  src="../wp-content/plugins/liveoptim/img/hint.png" alt="?"/><p> Renseignez ici les expressions clés sur lesquelles vous souhaitez être visible dans les moteurs. 
</p>            
<h2>Conseils d\'utilisation :</h2>           
 <ul>            
<span class="mc"><li >Multipliez les clés d\'entrées sur votre site : <br />
Mixez mots-clés génériques et mots-clés plus longue traine. </li></span><br />
<li> Exemple : <br />
mot-clé générique : "mode"<br />
mot-clé longue traine : "blog de mode féminine"<br />
<br />
mot-clé générique : "voyage"<br />
mot-clé longue traine : "voyage londres pas cher"<br /></li><br />
<li>
Ces mots-clés, pris individuellement, génèrent peu de trafic mais, une fois cumulés, peuvent peser jusqu’à 80 % de votre trafic.</li>                
</ul>    	   			</div>	   			',
		'listerMotCle_accueil' => 'Accueil',
		'listerMotCle_mots_cles' => 'Mots Clés',
		'listerMotCle_titre' => 'Gestion des expressions clés et des pages cibles',
		'listerMotCle_table_requete' => 'Requete',
		'listerMotCle_text' => '<div style="margin-top:20px">
<p><span style="font-size: 18px;font-weight:bold; color:#bf4122">Bienvenue dans votre espace Optimisation :
Renseignez ici vos mots-clés et boostez ainsi votre trafic !
</span></p><ol style="font-size:14px;"><li>
Ajoutez un mot-clé dans "Requête"</li>
<li>Associez lui une page de votre site</li>
  <li>Cliquez sur "ajouter", et ainsi de suite pour chaque mot-clé. </li></ol>
<em>(NB: Plus de conseils en cliquant sur <img class="hint" src="../wp-content/plugins/liveoptim/img/hint.png" alt="?"> à côté de chaque élément)</em><br><br>
</div>',
		'listerMotCle_table_destination' => 'Adresse de la page cible (<em>avec préfixe HTTP://)',
		'listerMotCle_table_position' => 'Position',
		'listerMotCle_table_action' => 'Action',
		'listerMotCle_confirmation_suppression' => 'Etes-vous sur de vouloir supprimer ce mot clé ?',
		'listerMotCle_supprimer' => 'Supprimer',
		'listerMotCle_modifier' => 'Modifier',
		'listerMotCle_monter' => 'Monter',
		'listerMotCle_descendre' => 'Descendre',
		'listerMotCle_ajouter' => 'Ajouter',
		'listerMotCle_msg_alert' => 'Veuillez remplir le champ Mot-clé !',
		
		// listerPattern.php
		'hintPattern'=>'	<div class="hint2">		<img  src="../wp-content/plugins/liveoptim/img/hint.png" alt="?"/>	<p>Paramétrez les balises ajoutées par LiveOptim sur un même mot clé à chaque fois qu\'il sera rencontré dans une page (hors pages cibles), en utilisant <span class="mc">{mc}</span> pour indiquer l\'expression clé et 		<span class="url">{url}</span> pour indiquer 		l\'URL cible pour les liens. Vous pouvez également choisir de traiter le schéma en boucle.</p><h2>Exemple, pour opérer le traitement ci-dessous : </h2>				<ul><li>&lt;strong&gt;<span class="mc">Expression clé</span>&lt;/strong&gt;<em> (première occurence)</em></li>		<li>&lt;a href=”<span class="url">http://www.example.com/page-cible.html</span>”&gt;<span class="mc">Expression clé</span>&lt;/a&gt;<em>(deuxième occurence)</em></li><li><span class="mc">Expression clé</span><em> (troisième occurence)</em></li>				</ul>		<h2>Renseignez la structure suivante</h2>				<ul>			<li>&lt;strong&gt;<span class="mc">{mc}</span>&lt;/strong&gt;</li>			<li>&lt;a href=”<span class="url">{url}</span>”&gt;<span class="mc">{mc}</span>&lt;/a&gt;</li>					<li><span class="mc">{mc}</span></li>	</ul>		</div>	   			',		'listerPattern_accueil' => 'Accueil',
		'listerPattern_pattern' => 'Schéma de balisage global',
		'listerPattern_titre' => 'Schéma de balisage global',
		'listerPattern_text' => '<div style="margin-top:20px">
<p><span style="font-size: 18px;font-weight:bold; color:#bf4122">Bienvenue dans votre espace Optimisation :
Personnalisez ici les optimisations appliquées à vos contenus !
</span></p><div style="font-size:14px;">
Solution 1 : laissez le paramétrage par défaut<br />
Solution 2 : personnalisez-le pour s\'adapter à vos pratiques !</div>
<em>(NB: Plus de conseils en cliquant sur <img class="hint" src="../wp-content/plugins/liveoptim/img/hint.png" alt="?"> à côté de chaque élément)</em></div>',
		'listerPattern_boucler' => 'Effectuer le traitement en boucle : ',
		'listerPattern_oui' => 'Oui',
		'listerPattern_cible_text' => '<div style="margin-top:20px">
<p><span style="font-size: 18px;font-weight:bold; color:#bf4122">Bienvenue dans votre espace Optimisation :
Personnalisez ici les optimisations appliquées spécifiquement aux pages cibles (c\'est-à-dire les pages associés à un mot-clé)!
</span></p><ol style="font-size:14px;"><li>
Solution  : laissez le paramétrage par défaut</li>
<li>Solution  : personnalisez-le pour s\'adapter à vos pratiques !</li></ol>
<em>(NB: Plus de conseils en cliquant sur <img class="hint" src="../wp-content/plugins/liveoptim/img/hint.png" alt="?"> à côté de chaque élément)</em></div>',
		'listerPattern_non' => 'Non',
		'listerPattern_table_structure' => 'Structure',
		'listerPattern_table_position' => 'Position',
		'listerPattern_table_action' => 'Action',
		'listerPattern_confirmation_suppression' => 'Etes-vous sur de vouloir supprimer ce schéma ?',
		'listerPattern_supprimer' => 'Supprimer',
		'listerPattern_modifier' => 'Modifier',
		'listerPattern_monter' => 'Monter',
		'listerPattern_descendre' => 'Descendre',
		'listerPattern_ajouter' => 'Ajouter',
		
		// listerPatternCible.php
		'hintPatternCible'=>'	<div class="hint2">		<img  src="../wp-content/plugins/liveoptim/img/hint.png" alt="?"/>	<p>Paramétrez les balises ajoutées par LiveOptim sur un même mot clé à chaque fois qu\'il sera rencontré dans une page cible associée, en utilisant <span class="mc">{mc}</span> pour indiquer l\'expression clé et 		<span class="url">{url}</span> pour indiquer l\'URL cible pour les liens. Vous pouvez également choisir de traiter le schéma en boucle.</p><h2>Exemple, opérer le traitement ci-dessous : </h2>				<ul><li>&lt;strong&gt;<span class="mc">Expression clé</span>&lt;/strong&gt;</li>		<li>&lt;a href=”<span class="url">http://www.example.com/page-cible.html</span>”&gt;<span class="mc">Expression clé</span>&lt;/a&gt;</li><li><span class="mc">Expression clé</span></li>				</ul>		<h2>Renseignez la structure suivante</h2>				<ul>			<li>&lt;strong&gt;<span class="mc">{mc}</span>&lt;/strong&gt;</li>			<li>&lt;a href=”<span class="url">{url}</span>”&gt;<span class="mc">{mc}</span>&lt;/a&gt;</li>					<li><span class="mc">{mc}</span></li>	</ul>		</div>	   			',		'listerPattern_accueil' => 'Accueil',
		
		'hintstructure'=>'	<div class="hint2">		<img  src="../wp-content/plugins/liveoptim/img/hint.png" alt="?"/><p>Paramétrez les balises ajoutées par LiveOptim sur un même mot clé à chaque fois qu\'il sera rencontré dans une page cible associée, en utilisant <span class="mc">{mc}</span> pour indiquer l\'expression clé et 		<span class="url">{url}</span> pour indiquer l\'URL cible pour les liens. Vous pouvez également choisir de traiter le schéma en boucle.</p><h2>Exemple, opérer le traitement ci-dessous : </h2>				<ul><li>&lt;strong&gt;<span class="mc">Expression clé</span>&lt;/strong&gt;</li>		<li>&lt;a href=”<span class="url">http://www.example.com/page-cible.html</span>”&gt;<span class="mc">Expression clé</span>&lt;/a&gt;</li><li><span class="mc">Expression clé</span></li>				</ul>		<h2>Renseignez la structure suivante</h2>				<ul>			<li>&lt;strong&gt;<span class="mc">{mc}</span>&lt;/strong&gt;</li>			<li>&lt;a href=”<span class="url">{url}</span>”&gt;<span class="mc">{mc}</span>&lt;/a&gt;</li>					<li><span class="mc">{mc}</span></li>	</ul>					</div>	   			',		'listerPattern_accueil' => 'Accueil',	

		
		'listerPatternCible_accueil' => 'Accueil',
		'listerPatternCible_pattern' => 'Schéma de balisage sur page cible',
		'listerPatternCible_titre' => 'Schéma de balisage sur page cible',
		'listerPatternCible_boucler' => 'Boucler',
		'listerPatternCible_oui' => 'Oui',
		'listerPatternCible_non' => 'Non',
		'listerPatternCible_table_structure' => 'Structure',
		'listerPatternCible_table_position' => 'Position',
		'listerPatternCible_table_action' => 'Action',
		'listerPatternCible_confirmation_suppression' => 'Etes-vous sur de vouloir supprimer ce schéma ?',
		'listerPatternCible_supprimer' => 'Supprimer',
		'listerPatternCible_modifier' => 'Modifier',
		'listerPatternCible_monter' => 'Monter',
		'listerPatternCible_descendre' => 'Descendre',
		'listerPatternCible_ajouter' => 'Ajouter',
		
		
		// ajouts m.a.j 1.2
		'COM_LIVEOPTIM_MENU_PAGE_RESTREINTE' => 'Pages restreintes',
		'COM_LIVEOPTIM_PAGES_RESTREINTES' => 'Page',
		'listerPagesRestreintes_titre' => 'Pages sans passage de LiveOptim',
		'listerPageRestreinte_text' => '<div style="margin-top:20px">
<p><span style="font-size: 18px;font-weight:bold; color:#bf4122">Bienvenue dans votre espace Optimisation :
Personnalisez les pages traitées par LiveOptim !
</span></p>
<span style="font-size: 18px;font-weight:bold; ">
Ajoutez la page de votre site que vous ne souhaitez pas optimiser avec LiveOptim !
</span>
</div>',
		
		'COM_LIVEOPTIM_MENU_CONFIGURATION' 	=> 'Configuration',
		'COM_LIVEOPTIM_LIMITE_CAPPING' => 'Limite',
		'COM_LIVEOPTIM_VALCAP_SUP' => 'Vous allez utiliser une valeur déconseillée par MKT. Renseignez-vous sur www.liveoptim.com',
		'COM_LIVEOPTIM_VALCAP_NAN' => 'La limite doit être un entier',
		'COM_LIVEOPTIM_VALCAP_VIDE' => 'Veuillez renseigner une valeur',
		'COM_LIVEOPTIM_EXPORT_CSV' => 'Faire une sauvegarde de la configuration de LiveOptim',
		'COM_LIVEOPTIM_TABLES_FILE' => 'Fichier :',
		'COM_LIVEOPTIM_TABLES_ALL' => 'Toutes (zip)',
		'COM_LIVEOPTIM_FICHIER_VIDE' => 'Veuillez uploadé un fichier',
		'COM_LIVEOPTIM_FICHIER_NCSV' => 'Le fichier n\\\'est pas un CSV',
		'COM_LIVEOPTIM_FICHIER_NZIP' => 'Le fichier n\\\'est pas une archive ZIP',
		'COM_LIVEOPTIM_EXPIRE' => 'Vous utilisez une version bridée.<br /> 
Bénéficiez des effets de LiveOptim sans limite de mots-clés ou de paramétrage. Acheter dès maintenant votre licence et retrouvez votre configuration avancée !',
		'COM_LIVEOPTIM_NON_INSCRIT' => 'Vous ne pouvez utiliser le module sans être inscrit au préalable. Vous pouvez vous inscrire sur <a class="link_liveoptim" href= "http://www.liveoptim.com", target ="_blank">le site de LiveOptim</a>',
		'COM_LIVEOPTIM_TOUT_COCHER' => 'Tout cocher',
		'COM_LIVEOPTIM_TOUT_DECOCHER' => 'Tout décocher',
		'COM_LIVEOPTIM_BOUTON_EXPORT' => 'Export CSV',
		'COM_LIVEOPTIM_IMPORTATION' => 'Table à importer ',
		'COM_LIVEOPTIM_IMPORT_VALIDATION' => 'Valider',
		
		'listerConfiguration_titre' => 'Options',
		'COM_LIVEOPTIM_LICENCE_TEST' => 'Vous utilisez une version d\'essai.<br />
		Bénéficiez des effets de LiveOptim sur votre site sans limite de durée, achetez dès maintenant votre licence !',
		'COM_LIVEOPTIM_BOUTON_BUY' => '<a class="btn_buy"  href="http://www.liveoptim.com/fr/paiement/choix-du-mode.html">ACHETER</a>',
		'COM_LIVEOPTIM_BOUTON_MAJ' => '<a class="btn_MaJ"  href="admin.php?page=liveoptim&#38;action=update&noheader=true">MISE A JOUR <br /> DISPONIBLE</a>',
		'COM_LIVEOPTIM_BOUTON_MAJ_FTP' => 'Mise à jour',
		'COM_LIVEOPTIM_MAJ_FTP_TITRE' => 'Mise a jour via FTP',
		'COM_LIVEOPTIM_MAJ_FTP_PHRASE' => 'Pour lancer la requête demandée, WordPress a besoin d’accéder à votre serveur web. Veuillez saisir votre identifiant FTP pour continuer. Si vous ne vous souvenez pas de votre identifiant, vous devriez contacter votre hébergeur..',
		'COM_LIVEOPTIM_MAJ_FTP_USER' => 'Utilisateur FTP',
		'COM_LIVEOPTIM_MAJ_FTP_PASS' => 'Mot de passe FTP',
		'COM_LIVEOPTIM_CONFIG_EXPORT' => 'Export',
		
		//ranking 
		'Message_lien'=>'Lancer le ranking',
		'MessageRanking'=>'Page ranking',
		'Message_attente'=>'Veuillez patienter durant le ranking.
(Ne pas fermer cette fenêtre)',
        'Message_resultat'=>'Veuillez vous connecter sur <a  id="lien_so" href="http://statoptim.veille-mkt.com/controleur.php?cible=identification&cible2=apercu-rapport&recherche=ranking&id_projet=" target="_blank" >Statoptim</a> pour voir les positions de votre site.
Munissez-vous de vos accès (envoyés par mail à votre inscription). ',
        'MessageAficher'=>'Multipliez les clés d\'entrées sur votre site. Mixez mots-clés génériques et mots-clés plus longue traine. Exemple<br/><br/>
mot-clé générique : "mode"<br/>
mot-clé longue traine : "blog de mode féminine"<br/><br/>
mot-clé générique : "voyage"<br/>
mot-clé longue traine : "voyage londres pas cher"<br/><br/>
Ces mots-clés, pris individuellement, génèrent peu de trafic mais, une fois cumulés, peuvent peser jusqu’à 80 % de votre trafic.',
   
		//Cache
		'COM_LIVEOPTIM_CACHE-TITRE' => 'Gestion du cache',
		'COM_LIVEOPTIM_CACHE-TEXT' => 'LiveOptim utilise un système de cache pour accélérer le traitement de vos pages<br />
									Cliquer ci-dessous pour vider ce cache',
		'COM_LIVEOPTIM_BTN-VIDE-CACHE' => 'VIDER LE CACHE',
		
		//Version Free
		'COM_LIVEOPTIM_LICENCE_FREE' =>'Vous utilisez la version gratuite de LiveOptim, certaines fonctionnalités sont désactivées.<br />
										<b>Passez à la version premium pour profiter de toutes les fonctionnalités<br />
										ESSAI GRATUIT PENDANT 30 JOURS.</b>',
		'COM_LIVEOPTIM_BOUTON_PRENIUM' => '<a class="btn_Prenuim"  target="__blank" href="http://www.liveoptim.com/fr/contenu/plugin-wordpress-premium.html" ><b>MISE À JOUR PREMIUM</b> <br /><i>(30 jours gratuits)</i></a>',
		'COM_LIVEOPTIM_BOUTON_PRENIUM_PLUS' => 'Plus de mots-clés',
		'hintPrenium' =>'<div onclick="fenetreInfoPreniumFermer()" class="hint2">		<img alt="?" src="../wp-content/plugins/liveoptim/img/hint.png"><br>	Cette fonctionalité est indisponible dans la version gratuite. <br> Passez à la version Premium pour en disposer.		</div>',
		'COM_LIVEOPTIM_MSG_MOT_CLE' =>'Vous ne pouvez ajouter que 10 associations mot clé/page cible. Upgradez votre LiveOptim : plus aucune limite de mots-clés',
		'COM_LIVEOPTIM_MSG_PAGES_RESTREINTE' =>'Vous n\\\'avez le droit qu\\\'à 10 pages restreintes. Passez à la version Premium pour ne plus avoir de limite.',
		
		//Inscription
		'inscription_titre' => 'Inscription',
		'inscription_texte' => 'L\'utilisation du plugin requiert la création d\'un compte auprès de nos services',
		'inscription_email' => 'Email : ',
		'inscription_url' => 'URL de votre site :',
		'inscription_pass' => 'Mot de passe :',
		'inscription_btnInscrip' => 'OK ! JE COMMENCE L\'OPTIMISATION',
		'inscription_btnPasse' => '  >> passer cette étape ',
		'inscription_msgPasse' => '<em>(votre URL sera envoyée à notre serveur)<em> ',
		'inscription_email_info' => '<em>Recevez GRATUITEMENT tous les conseils de nos experts pour votre SEO : Livre Blanc, Best practices, exemples de paramétrage... et bénéficiez des conseils sur-mesure d\'un chef de projet dédié !</em>',
		
		
		'inscription_mail_vide' =>'Vous devez indiquer un e-mail',
		'inscription_mail_trop_long' => 'Vous devez indiquer un e-mail plus court',
		'inscription_mail_invalid' => 'Vous devez indiquer un e-mail valide',
		'inscription_url_vide' => 'Vous devez indiquer le nom de domaine sur lequel sera activé LiveOptim<sup>&copy;</sup>',
		'inscription_url_trop_long' => 'Vous devez indiquer un nom de domaine plus court',
		'inscription_url_deja_util' => 'Ce nom de domaine a déjà été utilisé',
		'inscription_compte_already_create_wrong_email' => 'Le compte existe déja! Veuillez indiquer l\'adresse avec laquelle vous vous ête inscrit.',
		'inscription_compte_already_create_wrong_password' => 'Compte existant, veuillez renseigner le mot de passe de votre compte LiveOptim.',
		
		//Fenetre Prenuim
		
		'COM_LIVEOPTIM_FNT_PRE_ALL_PRODUCT' => 'TOUT NOS PRODUITS',
		'COM_LIVEOPTIM_FNT_PRE_OTHER_PRODUCT' => 'Découvrez aussi les autres produits de la gamme de LiveOptim',
		'COM_LIVEOPTIM_FNT_PRE_MORE_INFO' =>  '+ D\'INFO',
		
		'COM_LIVEOPTIM_FNT_PRE_TXT_MKT900' => '1 Prestation TOTALE d\'un an sur votre site web.
												Hotline gratuite, timeline 7/7, team support, etc... <br />',
		'COM_LIVEOPTIM_FNT_PRE_PRIX_MKT900' => '900&euro; TTC',
		'COM_LIVEOPTIM_FNT_PRE_TXT_SO' => ' Toutes vos analyses SEO sur 1 plateforme !
										Audit de site, ranking à la demande, suivi analytic des positions, etc...<br />',
		'COM_LIVEOPTIM_FNT_PRE_PRIX_SO' => '9.90&euro; TTC / MOIS',
		'COM_LIVEOPTIM_FNT_PRE_COMING_SOON' => 'Bientôt',
		
		
		
		'COM_LIVEOPTIM_FNT_PRE_UN_KEY' => 'Mots clés illimités ',
		'COM_LIVEOPTIM_FNT_PRE_UN_TARGET' => 'Pages cible illimitées ',
		'COM_LIVEOPTIM_FNT_PRE_CACHE' => 'Système de cache inclus <br />(Optimisation du temps de chargement) ',
		'COM_LIVEOPTIM_FNT_PRE_CUSTOM_TAG' => 'Personalisation des schémas d\'optimisation ',
		'COM_LIVEOPTIM_FNT_PRE_TARGET' => 'Schéma d\'optimisation spécifique sur pages cibles ',
		'COM_LIVEOPTIM_FNT_PRE_LOOP' => 'Option: schéma en boucle ',
		'COM_LIVEOPTIM_FNT_PRE_CAPPING' => 'Système de Capping <br />(Alerte de Sur-Optimisation) ',
		'COM_LIVEOPTIM_FNT_PRE_EXCLUD_PAGES' => 'Option : pages exclues (sans optimisation)',
		'COM_LIVEOPTIM_FNT_PRE_EXECEPTION' => 'Personnalisation des balises restreintes ',
		'COM_LIVEOPTIM_FNT_PRE_SUPPORT' => 'Support Premium ',
		'COM_LIVEOPTIM_FNT_PRE_TWITER' => 'Support 24/7 Twiter Timeline ',
		'COM_LIVEOPTIM_FNT_PRE_HOTLINE' => 'Hotline Gratuit ',
		'COM_LIVEOPTIM_FNT_PRE_CHAT' => 'LiveChat ',
		'COM_LIVEOPTIM_FNT_PRE_UPGRADE' => 'METTRE A JOUR',
		
		// code401.php
		'code401_titre' => 'Code 401.',
		
		// code403.php
		'code403_titre' => 'Code 403.',
		
		// code404.php
		'code404_titre' => 'Code 404.',
		
);
?>