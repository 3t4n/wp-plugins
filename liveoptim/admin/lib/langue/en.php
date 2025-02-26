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
 * langue : en
 */

$langue = array(

		//layout
		'parametrage' => 'Configuration',
		'contact' => 'Contact us',
		'facebook' => 'Join us',
		'twitter' => 'Need help?',
		'twitter2' => '@liveoptim',
		'inscription_message' => 'Register your website to activate LiveOptim',
		'accueil_erreur_pas_de_compte' => 'Inactive account.',
		'accueil_inscrivez_vous_ici' => 'Registration',
		'accueil_copte_cbisoust_actif' => 'Account activated',
		'accueil_compte_cbisoust_inactif' => 'Inactive account.', 
		'accueil_mots_cles' => 'Keywords',
		'accueil_balise_ignores' => 'Processing exceptions',
		'accueil_pattern' => 'Global tag schema',
		'accueil_pattern_cible' => 'Target page tag schema',
		'accueil_nouveau_mdp' => 'New password',
		'modifier' => 'Modify',

		
		
		// connexion.php
		'connexion_1' => 'Admin access',
		'connexion_content' => 'Enter your password below to log in as LiveOptim <sup>&copy;</sup>administrator',
		'connexion_titre' => 'Password:',
		'connexion_connexion' => 'Log in',
		'connexion_messageErreur_1' => 'Incorrect password',

		
		
		// nouveauMdp.php
		'nouveauMdp_titre' => 'Welcome to LiveOptim<sup>&copy;</sup>',
		'nouveauMdp_content' => '
				Specify the password that will connect you to
				the adminstration module, and guard it carefully.		
				',
		'nouveauMdp_titre' => 'Choose a password :',
		'nouveauMdp_ancien_mdp' => 'Old password :',
		'nouveauMdp_nouveau_mdp' => 'Password :',
		'nouveauMdp_nouveau_mdp_2' => 'Confirmation :',
		'nouveauMdp_connexion' => 'Save',
		'nouveauMdp_messageErreur_1' => 'Invalid passwords ',
		
		
		
		// script.php
		'accueil_accueil' => 'Home',
		'accueil_titre' => 'Welcome to your LiveOptim dashboard',
		'accueil_contenu' => '
		
				<p>From this interface, you can configure how LiveOptim works on your site:</p>
				<ul>
					<li>
						Key phrases
						<ul>
							<li>
								<a href="admin.php?page=liveoptim&#38;page=liveoptim&#38;action=mot-cle-lister">Add key phrases</a>
								<p>
									Add or modify your list of strategic key phrases and
									the URLs for associated pages
								</p>
							</li>
						</ul>
					</li>
					<li>
						Configuration:
						<ul>
							<li>
								<a href="admin.php?page=liveoptim&#38;page=liveoptim&#38;action=pattern-lister">Global tag schema</a>
								<p>
									Tags applied by default<span class="lo_ps">*</span> by the function that
									handles the key phrases in your content, and their order of appearance
								</p>
							</li>
							<li>
								<a href="admin.php?page=liveoptim&#38;page=liveoptim&#38;action=pattern-cible-lister">Tag schema for target page</a><span class="txt_prenium">(premium version)</span>
								<p>
									Reconfigure tags for key phrases when
									processed on their target page(s)
								</p>
							</li>
							<li>
								<a href="admin.php?page=liveoptim&#38;action=balise-ignore-lister">Processing Exceptions</a>
								<p>
									Tags delimiting content that must not be processed by the
									function<span class="lo_ps">*</span>
								</p>
							</li>
							<li>
								<a href="admin.php?page=liveoptim&#38;action=restreintes-lister">Pages without LiveOptim\'s optimisations</a><span class="txt_prenium">(premium version)</span>
								<p>
									Modify the pages in which the content must not be handled by the function
								</p>
							</li>
						</ul>
					</li>
				</ul>
				<p class="txt_etoile"><i><span class="lo_ps">*</span> Modification available in the premium version </i></p>',

				

		// tutoriel.php
		'tutoriel_titre' => 'Tutorial',
		'tutoriel_clique' => 'clicking here',
		
		'tutoriel_texte' =>'<div>
				<img src="../wp-content/plugins/liveoptim/img/video.png" alt="" style="float:left; margin: 0px 20px 0px 20px;">
				<div style="padding-top:80px;">
					<p style="font-size:18px">Let us guide you through the tutorial video by  <u><a href="http://www.youtube.com/watch?v=6GgK2kVY4_I" target="_blank">clicking here</a></u>
					</p>
				</div>
			</div>
			<div>
				<img src="../wp-content/plugins/liveoptim/img/book.png" alt="" style="float:left; margin: 0px 20px 0px 20px;">
				<div style="padding-top:80px; margin-top:70px;">
					<p style="font-size:18px">Download the full tutorial for the Liveoptim plugin for Wordpress by <u><a href="http://www.liveoptim.com/docs/wp_tutoriel_us.pdf" target="_blank">clicking here</a></u>
					</p>
				</div>
			</div>',
			
		'tutoriel_telecharge' => 'Download the full tutorial for the Liveoptim plugin for Wordpress by clicking here',
		'tutoriel_video' => 'Let us guide you through the tutorial video by clicking here',
		'tutoriel_contenu' => '<p>Please download the full tutorial for LiveOptim : <u><a href="http://www.liveoptim.com/docs/wp_tutoriel_uk.pdf" target="_blank">Download</a></u></p>',

		
		
		// listerBaliseIgnore.php
		'hintlisterBaliseIgnore'=>'<div class="hint2"><img  src="../wp-content/plugins/liveoptim/img/hint.png" alt="?" /><p>Indicate here the tags that delimit content that must not be processed by LiveOptim</p></div>',
		'listerBaliseIgnore_accueil' => 'Home',
		'listerBaliseIgnore_balises_ignores' => 'Processing exceptions',
		'listerBaliseIgnore_titre' => 'Processing exceptions',
		'listerBaliseIgnore_text' => '<div style="margin-top:20px">
<p><span style="font-size: 18px;font-weight:bold; color:#bf4122">Welcome to your Optimization space :
Here you\'ll find the the tags you need to use for the function!
</span></p>
<span style="font-size :18px; font-weight:bold">
This is an advanced setting. We recommend that you leave the default setting.<br/><br/>
</span>
</div>',
		'listerBaliseIgnore_nom' => 'Surname',
		'listerBaliseIgnore_action' => 'Action',
		'listerBaliseIgnore_confirmation_suppression' => 'Are you sure you want to delete this restriction?',
		'listerBaliseIgnore_supprimer' => 'Delete',
		'listerBaliseIgnore_modifier' => 'Modify',
		'listerBaliseIgnore_ajouter' => 'Add',
		
		
		
		// layout.php, layoutConnexion.php, layoutNouveauMdp.php
		'layout_title' => 'LiveOptim Admin',
		'layout_deconnexion' => 'Disconnect',
		'layout_liveoptim' => 'LiveOptim',
		
		
		
		// listerMotCle.php
		'hintMotCle'=>'<div class="hint2"><img  src="../wp-content/plugins/liveoptim/img/hint.png" alt="?"/><p>Enter the strategic key phrases for your positioning,the associated target page(s) and the order in which they must be processed (if you define more than one target page for the same key phrase)</p><h2>Tips:</h2><ul><li>Vary the Target pages based on your key phrases.</li><li>Do not modify the target pages of a key phrase too often</li></ul></div>',
		'listerMotCle_accueil' => 'Home',
		'listerMotCle_mots_cles' => 'Keywords',
		'listerMotCle_titre' => 'Managing key phrases and target pages',
		'listerMotCle_table_requete' => 'Search',
		'listerMotCle_table_destination' => 'Address of target page (<em>with prefix HTTP://)',
		'listerMotCle_table_position' => 'position',
		'listerMotCle_table_action' => 'Action',
		'listerMotCle_confirmation_suppression' => 'Are you sure you want to delete this keyword?',
		'listerMotCle_supprimer' => 'Delete',
		'listerMotCle_modifier' => 'Modify',
		'listerMotCle_monter' => 'Send higher',
		'listerMotCle_descendre' => 'Send lower',
		'listerMotCle_ajouter' => 'Add',
		'listerMotCle_msg_alert' => 'Please fulfil the box Keyword !',
	    'listerMotCle_text' => '<div style="margin-top:20px">
<p><span style="font-size: 18px;font-weight:bold; color:#bf4122">Welcome to your Optimization space: Please enter your keywords here to boost your traffic!
</span></p><ol style="font-size:14px;"><li>
Add a keyword in "Request"</li>
<li>Associate it with a page on your site</li>
  <li>Click "add", and do the same for each keyword.</li></ol>
<em>(Please note: Get more tips by clicking <img class="hint" src="../wp-content/plugins/liveoptim/img/hint.png" alt="?"> next to each element)</em><br><br>
<p></p></div>',
       'hintRequete'=>'	<div class="hint2">		<img  src="../wp-content/plugins/liveoptim/img/hint.png" alt="?"/><p>Enter here the key phrases by which you want to be visible in the search engines.  
</p>            
<h2>Recommendations for use:</h2>           
 <ul>            
<span class="mc"><li >Multiply the input keys on your site: <br />
Mix generic keywords and keywords with longer tails. </li></span><br />
<li> Example:  <br />
generic keyword: "fashion"<br />
long-tail keyword: "Women\'s fashion blog"<br />
<br />
generic keyword: "travel"<br />
long-tail keyword: "Travel London cheap"<br /></li><br />
<li>
These keywords, when used individually, generate some traffic, but when they\'re combined, they can increase your traffic by up to 80%.</li>                
</ul>    	   			</div>	   			',
         'hinturl'=>'	<div class="hint2">		<img  src="../wp-content/plugins/liveoptim/img/hint.png" alt="?"/>			<p>Check one or more pages related to the keyword. This is the page you want to position using the key phrase.
</p>            
<h2>Recommendations for use :</h2>           
 <ul>            
<li>Enter multiple URLs for the same keyword to diversify the target pages.<br />
You just have to add the same keyword using a different URL.
</li>                
</ul>    	   			</div>	   			',		
		'hintposition'=>'	<div class="hint2">		<img  src="../wp-content/plugins/liveoptim/img/hint.png" alt="?"/>			<p>Using the same keyword, you can define multiple associated pages. The position is only used in this case. 

</p>            
<h2>Recommendations for use :</h2>           
 <ul>            
<li>Enter multiple URLs for one keyword in order to diversify the target pages.<br />
</li>  
<li>The URLs of these pages are then treated according to an order of priority that is attributed to them and that you can define(using the arrows or by entering a value).
</li>             
<li>The function will then create a first link to the first url, and a second link to a second url, for the same content.
</li>      
<li>Please note : is not the order of the keywords that counts, but the order of the URLs.
</li>         
</ul>  	   			</div>	   			',
       'hintLO'=>'	<div class="hint2">		<img  src="../wp-content/plugins/liveoptim/img/hint.png" alt="?"/>			<p>Activate / deactivate the function via this button
          </p>        	   			</div>	   			',
'hintLimite'=>'	<div class="hint2">		<img  src="../wp-content/plugins/liveoptim/img/hint.png" alt="?"/>			<p>Set a high limit for optimization
       </p>            
       <h2>Recommendations for use :</h2>           
        <ul>            
       <li>By default, there is a limit of 5 optimizations for the same keyword in a page.<br />
       </li>
       <li>We advise you not to go beyond this.</li>
       <li>
      You can reduce this value if you want !/li>                
        </ul>             	   			</div>	   			',	
  'hintimport'=>'	<div class="hint2">		<img  src="../wp-content/plugins/liveoptim/img/hint.png" alt="?"/>	<p>Export your keyword/target page database and your settings before disabling the plugin or update ! </p>		         	   			</div>	   			',		
  'hintconfigue'=>'	<div class="hint2">		<img  src="../wp-content/plugins/liveoptim/img/hint.png" alt="?"/>		<p> You can import your settings, by simply selecting the table you want to import, or import all tables (that is, six tables) as a zip file. 
</p> 	         	   			</div>	   			',  
      'Message_lien'=>'Start ranking',
	  	'Message_attente'=>'Please wait while the ranking.
(Do not close this window)',
        'Message_resultat'=>'Please log on <a  id="lien_so" href="http://statoptim.veille-mkt.com/controleur.php?cible=identification&cible2=apercu-rapport&recherche=ranking&id_projet=" target="_blank" >Statoptim</a> to see the position of your site.
Please have your access (mailed to your registration). ',
       
		// listerPattern.php
		'listerPattern_text' => '<div style="margin-top:20px">
<p><span style="font-size: 18px;font-weight:bold; color:#bf4122">Welcome to your Optimization space :
Personalize the optimizations applied to your content here!!
</span></p><ol style="font-size:14px;"><li>
Solution: Leave the default setting.</li>
<li>Solution: Personalize it to conform to your site!!</li></ol>
<em>(Please note: Get more tips by clicking <img class="hint" src="../wp-content/plugins/liveoptim/img/hint.png" alt="?"> next to each element)</em></div>',
'listerPattern_cible_text' => '<div style="margin-top:20px">
<p><span style="font-size: 18px;font-weight:bold; color:#bf4122">Welcome to your Optimization space :
Personalize the optimizations applied specifically to target pages (i.e. pages associated with a keyword)!!
</span></p><ol style="font-size:14px;"><li>
Solution: Leave the default setting.</li>
<li>Solution: Personalize it to conform to your site!!</li></ol>
<em>(Please note: Get more tips by clicking <img class="hint" src="../wp-content/plugins/liveoptim/img/hint.png" alt="?"> next to each element)</em></div>',

		'hintPattern' => '<div class="hint2"><img  src="../wp-content/plugins/liveoptim/img/hint.png" alt="?"/><p>Configure the tags added by LiveOptim on a given keyword every time it is encountered on a page (excluding target pages), by using <span class="mc">{mc}</span> to indicate the key phrase and<span class="url">{url}</span> to indicate the URL for the links. You can also choose to process the schema as a loop.</p><h2>For example, to run the process below: </h2><ul><li>&lt;strong&gt;<span class="mc">Key phrase</span>&lt;/strong&gt;<em> (first occurence)</em></li><li>&lt;a href=”<span class="url">http://www.example.com/page-cible.html</span>”&gt;<span class="mc">Key phrase</span>&lt;/a&gt;<em>(second occurence)</em></li><li><span class="mc">Key phrase</span><em> (third occurence)</em></li></ul><h2>Populate the following structure</h2><ul><li>&lt;strong&gt;<span class="mc">{mc}</span>&lt;/strong&gt;</li><li>&lt;a href=”<span class="url">{url}</span>”&gt;<span class="mc">{mc}</span>&lt;/a&gt;</li><li><span class="mc">{mc}</span></li></ul></div>				',
		'listerPattern_pattern' => 'Global tag schema',
		'listerPattern_titre' => 'Global tag schema',
		'listerPattern_boucler' => 'Process as loop : ',
		'listerPattern_oui' => 'Yes',
		'listerPattern_non' => 'No',
		'listerPattern_table_structure' => 'Structure',
		'listerPattern_table_position' => 'position',
		'listerPattern_table_action' => 'Action',
		'listerPattern_confirmation_suppression' => 'Are you sure you want to delete this schema?',
		'listerPattern_supprimer' => 'Delete',
		'listerPattern_modifier' => 'Modify',
		'listerPattern_monter' => 'Send higher',
		'listerPattern_descendre' => 'Send lower',
		'listerPattern_ajouter' => 'Add', 
		
			
		
		// listerPatternCible.php
		'hintPatternCible' => '<div class="hint2"><img  src="../wp-content/plugins/liveoptim/img/hint.png" alt="?"/><p>Configure the tags added by LiveOptim on the same keyword every time it is encountered on an associated target page, by using <span class="mc">{mc}</span> to indicate the key phrase and 		<span class="url">{url}</span> to indicate the URL for the links. You can also choose to process the schema as a loop.</p><h2>For example, run the process below: </h2><ul><li>&lt;strong&gt;<span class="mc">Key phrase</span>&lt;/strong&gt;</li><li>&lt;a href=”<span class="url">http://www.example.com/page-cible.html</span>”&gt;<span class="mc">Key phrase</span>&lt;/a&gt;</li><li><span class="mc">Key phrase</span></li></ul><h2>Populate the following structure</h2><ul><li>&lt;strong&gt;<span class="mc">{mc}</span>&lt;/strong&gt;</li><li>&lt;a href=”<span class="url">{url}</span>”&gt;<span class="mc">{mc}</span>&lt;/a&gt;</li><li><span class="mc">{mc}</span></li></ul></div>',
		'listerPatternCible_accueil' => 'Home',
		'listerPatternCible_pattern' => 'Target page tag schema',
		'listerPatternCible_titre' => 'Target page tag schema',
		'listerPatternCible_boucler' => 'Loop',
		'listerPatternCible_oui' => 'Yes',
		'listerPatternCible_non' => 'No',
		'listerPatternCible_table_structure' => 'Structure',
		'listerPatternCible_table_position' => 'position',
		'listerPatternCible_table_action' => 'Action',
		'listerPatternCible_confirmation_suppression' => 'Are you sure you want to delete this schema?',
		'listerPatternCible_supprimer' => 'Delete',
		'listerPatternCible_modifier' => 'Modify',
		'listerPatternCible_monter' => 'Send higher',
		'listerPatternCible_descendre' => 'Send lower',
		'listerPatternCible_ajouter' => 'Add', 
		'listerPageRestreinte_text' => '<div style="margin-top:20px">
<p><span style="font-size: 18px;font-weight:bold; color:#bf4122">Welcome to your Optimization space :
Personalize the pages processed by LiveOptim !
</span></p>
<span style="font-size: 18px;font-weight:bold; ">
Add the page of your site that you do not want to optimize with LiveOptim !
</span>


</div>',
		// ajouts m.a.j 1.2
		'COM_LIVEOPTIM_MENU_CONFIGURATION' 	=> 'Configuration',
		'COM_LIVEOPTIM_MENU_PAGE_RESTREINTE' => 'Restricted pages',
		'COM_LIVEOPTIM_LIMITE_CAPPING' => 'Limit',
		'COM_LIVEOPTIM_VALCAP_SUP' => 'You are about to use a value not recommended by MKT. See www.liveoptim.com',
		'COM_LIVEOPTIM_VALCAP_NAN' => 'The limit must be an integer',
		'COM_LIVEOPTIM_VALCAP_VIDE' => 'Please enter a value',
		'COM_LIVEOPTIM_EXPORT_CSV' => 'Do a backup of the LiveOptim configuration',
		'COM_LIVEOPTIM_TABLES_FILE' => 'File:',
		'COM_LIVEOPTIM_TABLES_ALL' => 'All (zip)',
		'COM_LIVEOPTIM_FICHIER_VIDE' => 'Please upload a file',
		'COM_LIVEOPTIM_FICHIER_NCSV' => 'The file is not a CSV',
		'COM_LIVEOPTIM_FICHIER_NZIP' => 'The file is not a ZIP archive',
		'COM_LIVEOPTIM_EXPIRE' => 'Your are using a constrained version of LiveOptim. 
Benefit from the effects of LiveOptim for an unlimited number of keywords or configurations. Buy now your License and find all your advanced configurations !',
		'COM_LIVEOPTIM_NON_INSCRIT' => 'To use the module you must first register. You can register at <a class="link_liveoptim" href="http://www.liveoptim.com" target="_blank">LiveOptim\'s website</a>',
		'COM_LIVEOPTIM_TOUT_COCHER' => 'Tick all boxes',
		'COM_LIVEOPTIM_TOUT_DECOCHER' => 'Untick all boxes',
		'COM_LIVEOPTIM_BOUTON_EXPORT' => 'Export CSV',
		'COM_LIVEOPTIM_IMPORTATION' => 'Table to import: ',
		'COM_LIVEOPTIM_IMPORT_VALIDATION' => 'Confirm',
		'COM_LIVEOPTIM_PAGES_RESTREINTES' => 'Page',
		'listerPagesRestreintes_titre' => 'Pages without LiveOptim\'s optimisations',
		'listerConfiguration_titre' => 'Settings',
		'COM_LIVEOPTIM_LICENCE_TEST' => 'You are using a trial version.<br /> 
Benefit from the effects of LiveOptim on your site for an unlimited time, buy now your License !',
		'COM_LIVEOPTIM_CONFIG_EXPORT' => 'Export',

		'COM_LIVEOPTIM_BOUTON_BUY' => '<a class="btn_buy"  href="http://www.liveoptim.com/us/paiement/choix-du-mode.html">BUY</a>',
		'COM_LIVEOPTIM_BOUTON_MAJ' => '<a class="btn_MaJ"  href="admin.php?page=liveoptim&#38;action=update&noheader=true">updates <br />available</a>',
		'COM_LIVEOPTIM_BOUTON_MAJ_FTP' => 'Update',
		'COM_LIVEOPTIM_MAJ_FTP_TITRE' => 'Update using FTP',
		'COM_LIVEOPTIM_MAJ_FTP_PHRASE' => 'To start the required request , WordPress needs to access your web server. Please enter your FTP username to continue. If you do not remember your username, you should contact your host..',
		'COM_LIVEOPTIM_MAJ_FTP_USER' => 'FTP username',
		'COM_LIVEOPTIM_MAJ_FTP_PASS' => 'FTP Password',
		
		//Cache
		'COM_LIVEOPTIM_CACHE-TITRE' => 'Cache Management',
		'COM_LIVEOPTIM_CACHE-TEXT' => 'LiveOptim uses a cache to speed up the processing of your pages <br />
										Click below to delete this cache',
		'COM_LIVEOPTIM_BTN-VIDE-CACHE' => 'DELETE CACHE',
		
		//version FREE
		'COM_LIVEOPTIM_LICENCE_FREE' =>'You are currently use the free version of LiveOptim, however some functionalities are disabled. <br />
										<b>Upgrade to the Premium version to benefit all the available functionalities:<br />
										FREE TEST FOR 30 DAYS.</b>',
		'COM_LIVEOPTIM_BOUTON_PRENIUM' => '<a class="btn_Prenuim"  target="__blank" href="http://www.liveoptim.com/us/contenu/plugin-wordpress-premium.html" ><b>PREMIUM UPDATE</b> <br /><i>(30 days free)</i></a>',
		'hintPrenium' =>'<div onclick="fenetreInfoPreniumFermer()" class="hint2">		<img alt="?" src="../wp-content/plugins/liveoptim/img/hint.png"><br>	This funtionality is not available in free version.<br /> Upgrade to the Premium version for benefiting it.		</div>',
		'COM_LIVEOPTIM_MSG_MOT_CLE' =>'You can add only 10 keywords associated to each page. Upgrade your LiveOptim: no more limits with keywords.',
		'COM_LIVEOPTIM_MSG_PAGES_RESTREINTE' =>'You are allowed to use only 10 restricted pages. With Premium version you will have no limits.',

		//Inscription
		'inscription_titre' => 'Registration',
		'inscription_texte' => 'Using the plugin requires creating an account with our services',
		'inscription_email' => 'Email : ',
		'inscription_url' => 'URL of your site:',
		'inscription_pass' => 'Password :',
        'inscription_btnInscrip' => 'OK ! I\'M STARTING THE OPTIMIZATION',
		'inscription_btnPasse' => '  >> Skip this step ',
		'inscription_msgPasse' => '<em>(your URL will be sent to our server)<em> ',
		'inscription_email_info' => '<em>Get for FREE the advices of our experts about your SEO: White Paper, Best practices, examples of set up ... furthermore, get advice personnalised by a project manager !</em>',

		'inscription_mail_vide' =>'You must enter an email address',
		'inscription_mail_trop_long' => 'You must enter a shorter email address',
		'inscription_mail_invalid' => 'You must enter a valid email address',
		'inscription_url_vide' => 'You must enter the domain name on which LiveOptim<sup>&copy;</sup> will be activated',
		'inscription_url_trop_long' => 'You must enter a shorter domain name',
		'inscription_url_deja_util' => 'This domain name is already in use',
		'inscription_compte_already_create_wrong_email' => 'The account already exists! Please indicate the address with which you registered.',
		'inscription_compte_already_create_wrong_password' => 'Existing account, please enter the password of your account LiveOptim.',

		//Fenetre Prenuim
		
		'COM_LIVEOPTIM_FNT_PRE_ALL_PRODUCT' => 'ALL OUR PRODUCTS',
		'COM_LIVEOPTIM_FNT_PRE_OTHER_PRODUCT' => 'See also the other products in the range of LiveOptim',
		'COM_LIVEOPTIM_FNT_PRE_MORE_INFO' =>  'MORE INFO',
		
		'COM_LIVEOPTIM_FNT_PRE_TXT_MKT900' => '1-year SEO service for your website.<br />
												Free hotline, 7-day-a-week timeline, support team, etc...<br />',
		'COM_LIVEOPTIM_FNT_PRE_PRIX_MKT900' => '&euro;900 INC. TAXES',
		'COM_LIVEOPTIM_FNT_PRE_TXT_SO' => 'All your SEO analyses on 1 platform!<br />
										Site audit, ranking on demand, analytic monitoring of positions, etc...<br />',
		'COM_LIVEOPTIM_FNT_PRE_PRIX_SO' => '&euro;9.90 INC. TAXES / MONTH',
		'COM_LIVEOPTIM_FNT_PRE_COMING_SOON' => 'COMING SOON',
		
		
		'COM_LIVEOPTIM_FNT_PRE_UN_KEY' => 'Unlimited Keywords',
		'COM_LIVEOPTIM_FNT_PRE_UN_TARGET' => 'Unlimited Target Pages',
		'COM_LIVEOPTIM_FNT_PRE_CACHE' => 'Cache system included<br />(Loading time optimization)',
		'COM_LIVEOPTIM_FNT_PRE_CUSTOM_TAG' => 'Customization of tags order',
		'COM_LIVEOPTIM_FNT_PRE_TARGET' => 'Specific Tag Schema on Target pages',
		'COM_LIVEOPTIM_FNT_PRE_LOOP' => 'Option : Tagging loop',
		'COM_LIVEOPTIM_FNT_PRE_CAPPING' => 'Capping System <br />(Suroptimization Alert)',
		'COM_LIVEOPTIM_FNT_PRE_EXCLUD_PAGES' => 'Option : excluded pages (without tagging)',
		'COM_LIVEOPTIM_FNT_PRE_EXECEPTION' => 'Preconfigure exceptions tags',
		'COM_LIVEOPTIM_FNT_PRE_SUPPORT' => 'Premium Support',
		'COM_LIVEOPTIM_FNT_PRE_TWITER' => 'Twitter Timeline Support 24/7',
		'COM_LIVEOPTIM_FNT_PRE_HOTLINE' => 'Free Hotline',
		'COM_LIVEOPTIM_FNT_PRE_CHAT' => 'LiveChat',
		'COM_LIVEOPTIM_FNT_PRE_UPGRADE' => 'UPGRADE',
		
		// code401.php
		'code401_titre' => 'Code 401.',
		
		// code403.php
		'code403_titre' => 'Code 403.',
		
		// code404.php
		'code404_titre' => 'Code 404.',
		
);
?>