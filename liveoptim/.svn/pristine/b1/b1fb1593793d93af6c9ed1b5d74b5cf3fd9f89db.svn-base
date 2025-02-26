<?php

/*
Plugin Name: Liveoptim
Plugin URI: http://www.liveoptim.com/
Description: <strong>Liveoptim</strong> est une extension qui vous simplifiera la vie.
Author: Erwan Milbéo - copyright 2012
Version: 1.2.0-free
Author URI: http://www.liveoptim.com/
*/


// Runs when plugin is activated
register_activation_hook( __FILE__, 'liveoptim_install' );

// Runs on plugin deactivation
register_deactivation_hook( __FILE__, 'liveoptim_remove' );

function liveoptim_install() {
	// Creates new dataLangues field
	//add_option("liveoptim_data", 'Default', '', 'yes');
	
	global $wpdb;
	
	
	// balise_ignore
	$sql = '
			CREATE TABLE IF NOT EXISTS `'.$wpdb->prefix.'liveoptim_balise_ignore` (
				`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
				`nom` varchar(255) NOT NULL,
				PRIMARY KEY (`id`)
			);';
	
	require_once(ABSPATH.'wp-admin/includes/upgrade.php');
	dbDelta($sql);
	//add_option('liveoptim_balise_ignore_db_version', '1.0') ;
	
	$rows_affected = $wpdb->insert( $wpdb->prefix.'liveoptim_balise_ignore', array( 'id' => 1, 'nom' => 'a' ) );
	$rows_affected = $wpdb->insert( $wpdb->prefix.'liveoptim_balise_ignore', array( 'id' => 2, 'nom' => 'h1' ) );
	$rows_affected = $wpdb->insert( $wpdb->prefix.'liveoptim_balise_ignore', array( 'id' => 3, 'nom' => 'h2' ) );
	$rows_affected = $wpdb->insert( $wpdb->prefix.'liveoptim_balise_ignore', array( 'id' => 4, 'nom' => 'h3' ) );
	$rows_affected = $wpdb->insert( $wpdb->prefix.'liveoptim_balise_ignore', array( 'id' => 5, 'nom' => 'h4' ) );
	$rows_affected = $wpdb->insert( $wpdb->prefix.'liveoptim_balise_ignore', array( 'id' => 6, 'nom' => 'h5' ) );
	$rows_affected = $wpdb->insert( $wpdb->prefix.'liveoptim_balise_ignore', array( 'id' => 7, 'nom' => 'h6' ) );
	$rows_affected = $wpdb->insert( $wpdb->prefix.'liveoptim_balise_ignore', array( 'id' => 8, 'nom' => 'strong' ) );
	$rows_affected = $wpdb->insert( $wpdb->prefix.'liveoptim_balise_ignore', array( 'id' => 9, 'nom' => 'em' ) );
	$rows_affected = $wpdb->insert( $wpdb->prefix.'liveoptim_balise_ignore', array( 'id' => 10, 'nom' => 'u' ) );
	$rows_affected = $wpdb->insert( $wpdb->prefix.'liveoptim_balise_ignore', array( 'id' => 11, 'nom' => 'i' ) );
	$rows_affected = $wpdb->insert( $wpdb->prefix.'liveoptim_balise_ignore', array( 'id' => 12, 'nom' => 'b' ) );
	$rows_affected = $wpdb->insert( $wpdb->prefix.'liveoptim_balise_ignore', array( 'id' => 13, 'nom' => 'embed' ) );
	$rows_affected = $wpdb->insert( $wpdb->prefix.'liveoptim_balise_ignore', array( 'id' => 14, 'nom' => 'object' ) );
	$rows_affected = $wpdb->insert( $wpdb->prefix.'liveoptim_balise_ignore', array( 'id' => 15, 'nom' => 'style' ) );
	
	
	// mot_cle
	$sql = '
			CREATE TABLE IF NOT EXISTS `'.$wpdb->prefix.'liveoptim_mot_cle` (
				`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
				`requete` varchar(255) NOT NULL,
				`destination` varchar(255) NOT NULL,
				`position` int(10) unsigned NOT NULL,
				PRIMARY KEY (`id`)
			);';
	
	require_once(ABSPATH.'wp-admin/includes/upgrade.php');
	dbDelta($sql);
	//add_option('liveoptim_mot_cle_db_version', '1.0') ;
	
	
	
	// parametres
	$sql = '
			CREATE TABLE IF NOT EXISTS `'.$wpdb->prefix.'liveoptim_parametres` (
				`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
				`cle` varchar(255) NOT NULL,
				`valeur` varchar(255) NOT NULL,
				PRIMARY KEY (`id`)
			);';
	
	require_once(ABSPATH.'wp-admin/includes/upgrade.php');
	dbDelta($sql);
	//add_option('liveoptim_parametres_db_version', '1.0') ;
	$rows_affected = $wpdb->insert( $wpdb->prefix.'liveoptim_parametres', array( 'id' => 1, 'cle' => 'is_pattern_boucler', 'valeur' => '0' ) );
	$rows_affected = $wpdb->insert( $wpdb->prefix.'liveoptim_parametres', array( 'id' => 2, 'cle' => 'is_pattern_cible_boucler', 'valeur' => '0' ) );
	$rows_affected = $wpdb->insert( $wpdb->prefix.'liveoptim_parametres', array( 'id' => 3, 'cle' => 'certificat_mkt_jour', 'valeur' => '' ) );
	$rows_affected = $wpdb->insert( $wpdb->prefix.'liveoptim_parametres', array( 'id' => 4, 'cle' => 'tentative_maj_nb', 'valeur' => '0' ) );
	$rows_affected = $wpdb->insert( $wpdb->prefix.'liveoptim_parametres', array( 'id' => 5, 'cle' => 'tentative_maj_date', 'valeur' => '2012-01-01 00:00:00' ) );
	$rows_affected = $wpdb->insert( $wpdb->prefix.'liveoptim_parametres', array( 'id' => 6, 'cle' => 'version', 'valeur' => '1.2.0-free' ) );
	$rows_affected = $wpdb->insert( $wpdb->prefix.'liveoptim_parametres', array( 'id' => 7, 'cle' => 'rank', 'valeur' => '1' ) );
	$rows_affected = $wpdb->insert( $wpdb->prefix.'liveoptim_parametres', array( 'id' => 9, 'cle' => 'cache', 'valeur' => '0' ) );
	$rows_affected = $wpdb->insert( $wpdb->prefix.'liveoptim_parametres', array( 'id' => 10, 'cle' => 'etat', 'valeur' => '0' ) );
	$rows_affected = $wpdb->insert( $wpdb->prefix.'liveoptim_parametres', array( 'id' => 8, 'cle' => 'inscription', 'valeur' => '0' ) );
	
	// Config
	$sql = 'CREATE TABLE `'.$wpdb->prefix.'liveoptim_capping` (
	`capping` int(11) DEFAULT NULL,
	`marche` tinyint(1) DEFAULT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 MIN_ROWS=1 MAX_ROWS=1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;';
	
	require_once(ABSPATH.'wp-admin/includes/upgrade.php');
	dbDelta($sql);
	
	$rows_affected = $wpdb->insert( $wpdb->prefix.'liveoptim_capping', array( 'capping' => 5, 'marche' => 1) );
	// Pages Restreintes
	$sql = 'CREATE TABLE `'.$wpdb->prefix.'liveoptim_page_restriction` (
	`page` varchar(250) DEFAULT NULL,
	`ID` int(11) NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`ID`)
	) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;';
	
	require_once(ABSPATH.'wp-admin/includes/upgrade.php');
	dbDelta($sql);
	// pattern
	$sql = '
			CREATE TABLE IF NOT EXISTS `'.$wpdb->prefix.'liveoptim_pattern` (
				`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
				`structure` varchar(255) NOT NULL,
				`position` int(10) unsigned NOT NULL,
				PRIMARY KEY (`id`)
			);';
	
	require_once(ABSPATH.'wp-admin/includes/upgrade.php');
	dbDelta($sql);
	//add_option('liveoptim_pattern_db_version', '1.0') ;
	
	$rows_affected = $wpdb->insert( $wpdb->prefix.'liveoptim_pattern', array( 'id' => 1, 'structure' => '<a href="{url}">{mc}</a>', 'position' => '1' ) );
	$rows_affected = $wpdb->insert( $wpdb->prefix.'liveoptim_pattern', array( 'id' => 2, 'structure' => '<strong>{mc}</strong>', 'position' => '2' ) );
	$rows_affected = $wpdb->insert( $wpdb->prefix.'liveoptim_pattern', array( 'id' => 3, 'structure' => '{mc}', 'position' => '3' ) );
	$rows_affected = $wpdb->insert( $wpdb->prefix.'liveoptim_pattern', array( 'id' => 4, 'structure' => '<a href="{url}">{mc}</a>', 'position' => '4' ) );

	
	// pattern_cible
	$sql = '
			CREATE TABLE IF NOT EXISTS `'.$wpdb->prefix.'liveoptim_pattern_cible` (
				`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
				`structure` varchar(255) NOT NULL,
				`position` int(10) unsigned NOT NULL,
				PRIMARY KEY (`id`)
			);';
	
	require_once(ABSPATH.'wp-admin/includes/upgrade.php');
	dbDelta($sql);
	//add_option('liveoptim_pattern_cible_db_version', '1.0') ;
	
	$rows_affected = $wpdb->insert( $wpdb->prefix.'liveoptim_pattern_cible', array( 'id' => 1, 'structure' => '<strong>{mc} </strong>', 'position' => '1' ) );
	$rows_affected = $wpdb->insert( $wpdb->prefix.'liveoptim_pattern_cible', array( 'id' => 2, 'structure' => '<em>{mc}</em>', 'position' => '2' ) );
	$rows_affected = $wpdb->insert( $wpdb->prefix.'liveoptim_pattern_cible', array( 'id' => 3, 'structure' => '{mc}', 'position' => '3' ) );
	$rows_affected = $wpdb->insert( $wpdb->prefix.'liveoptim_pattern_cible', array( 'id' => 4, 'structure' => '{mc}', 'position' => '4' ) );
	
}

function liveoptim_remove() {
	// Deletes the database field
	//delete_option('liveoptim_data');
	
	global $wpdb;
	
	// balise_ignore
	$sql = 'DROP TABLE`'.$wpdb->prefix.'liveoptim_balise_ignore`';
	$wpdb->query($sql);
	
	//delete_option('liveoptim_balise_ignore_db_version');
	
	// mot_cle
	$sql = 'DROP TABLE`'.$wpdb->prefix.'liveoptim_mot_cle`';
	$wpdb->query($sql);
	
	//delete_option('liveoptim_mot_cle_db_version');

	// Config
	$sql = 'DROP TABLE`'.$wpdb->prefix.'liveoptim_capping`';
	$wpdb->query($sql);
	
	// Pages Restreintes
	$sql = 'DROP TABLE`'.$wpdb->prefix.'liveoptim_page_restriction`';
	$wpdb->query($sql);

	
	// parametres
	$sql = 'DROP TABLE`'.$wpdb->prefix.'liveoptim_parametres`';
	$wpdb->query($sql);
	
	//delete_option('liveoptim_parametres_db_version');
	
	// pattern
	$sql = 'DROP TABLE`'.$wpdb->prefix.'liveoptim_pattern`';
	$wpdb->query($sql);
	
	//delete_option('liveoptim_pattern_db_version');
	
	// pattern_cible
	$sql = 'DROP TABLE`'.$wpdb->prefix.'liveoptim_pattern_cible`';
	$wpdb->query($sql);
	
	//delete_option('liveoptim_pattern_cible_db_version');
	
}

function liveoptim_the_content($content) {
	
	require_once(dirname(__FILE__).'/admin/lib/base/conteneurParametres.class.php');
	$conteneurParametre = ConteneurParametres::getInstance();
	$isON = $conteneurParametre->isOnOff();
	
	try {
		if ($isON && file_exists( dirname(__FILE__).'/admin/lib/liveoptim.php' ) && liveoptim_isInscrit()) {
			require_once dirname(__FILE__).'/admin/lib/liveoptim.php';
			return liveoptim_action( $content );
		} else {
			throw new Exception('file_exists( "liveoptim.php" ) == false');
		}
	} catch (Exception $e) {
		return $content;
	}
}

add_action('the_content', 'liveoptim_the_content');


if ( is_admin() ) {
	
	add_action('admin_menu', 'liveoptim_admin_menu');
	
	function liveoptim_admin_menu() {

		// menu
		switch (WPLANG) {
			case 'fr_FR': // Français
				$menu_tutoriel = 'Tutoriel';
				$menu_mots_cles = 'Mots Clés';
				$menu_balises_ignores = 'Restrictions';
				$menu_pattern = 'Schéma global';
				$menu_Pattern_page_cible = 'Schéma sur page cible';
				$menu_Pages_Restreintes = 'Pages restreintes';
				$menu_Config= 'Configuration';
				break;

			case 'es_ES': // España
			case 'es_PE': // Perú
			case 'es_CL': // Chile
				$menu_tutoriel = 'Tutorial';
				$menu_mots_cles = 'Palabras clave';
				$menu_balises_ignores = 'Excepción ';
				$menu_pattern = 'Esquema general';
				$menu_Pattern_page_cible = 'Esquema de páginas meta';
				$menu_Pages_Restreintes = 'Páginas restringidas';
				$menu_Config= 'Configuración';
				break;
				
			case 'pt_BR': // Brazilian Portuguese
			case 'pt_PT': // European Portuguese
				$menu_tutoriel = 'Tutorial';
				$menu_mots_cles = 'Palavras-chave';
				$menu_balises_ignores = 'Exceção';
				$menu_pattern = 'Esquema geral';
				$menu_Pattern_page_cible = 'Esquema páginas de destino';
				$menu_Pages_Restreintes = 'Páginas restritas';
				$menu_Config= 'Configuração';
				break;
								
			case 'en_GB':
				$menu_tutoriel = 'Tutorial';
				$menu_mots_cles = 'Keywords';
				$menu_balises_ignores = 'Restrictions';
				$menu_pattern = 'Global pattern';
				$menu_Pattern_page_cible = 'Target page pattern';
				$menu_Pages_Restreintes = 'Restricted pages';
				$menu_Config= 'Configuration';				
				break;
				
			case 'en_US':
			default:
				$menu_tutoriel = 'Tutorial';
				$menu_mots_cles = 'Keywords';
				$menu_balises_ignores = 'Restrictions';
				$menu_pattern = 'Global pattern';
				$menu_Pattern_page_cible = 'Target page pattern';
				$menu_Pages_Restreintes = 'Restricted pages';
				$menu_Config= 'Configuration';				
		}

		add_menu_page(
				'LiveOptim', //$page_title
				'LiveOptim', //$menu_title
				'administrator', //$capability
				'liveoptim', //$menu_slug
				'liveoptim_html_page', //$function
				'', //$icon_url
				58 //$position
		);

		add_submenu_page(
				'liveoptim', //$parent_slug,
				$menu_tutoriel, //$page_title,
				$menu_tutoriel, //$menu_title,
				'administrator', //$capability,
				'liveoptim&#38;action=tutoriel', //$menu_slug,
				'liveoptim_html_page' //$function = ''
		);
		
		
		add_submenu_page(
				'liveoptim', //$parent_slug,
				$menu_mots_cles, //$page_title,
				$menu_mots_cles, //$menu_title,
				'administrator', //$capability,
				'liveoptim&#38;action=mot-cle-lister', //$menu_slug,
				'liveoptim_html_page' //$function = ''
		);
		
		add_submenu_page(
				'liveoptim', //$parent_slug,
				$menu_balises_ignores, //$page_title,
				$menu_balises_ignores, //$menu_title,
				'administrator', //$capability,
				'liveoptim&#38;action=balise-ignore-lister', //$menu_slug,
				'liveoptim_html_page' //$function = ''
		);
		
		add_submenu_page(
				'liveoptim', //$parent_slug,
				$menu_pattern, //$page_title,
				$menu_pattern, //$menu_title,
				'administrator', //$capability,
				'liveoptim&#38;action=pattern-lister', //$menu_slug,
				'liveoptim_html_page' //$function = ''
		);
		
		add_submenu_page(
				'liveoptim', //$parent_slug,
				$menu_Pattern_page_cible, //$page_title,
				$menu_Pattern_page_cible, //$menu_title,
				'administrator', //$capability,
				'liveoptim&#38;action=pattern-cible-lister', //$menu_slug,
				'liveoptim_html_page' //$function = ''
		);
		
		add_submenu_page(
				'liveoptim', //$parent_slug,
				$menu_Pages_Restreintes, //$page_title,
				$menu_Pages_Restreintes, //$menu_title,
				'administrator', //$capability,
				'liveoptim&#38;action=restreintes-lister', //$menu_slug,
				'liveoptim_html_page' //$function = ''
		);
		
		add_submenu_page(
				'liveoptim', //$parent_slug,
				$menu_Config, //$page_title,
				$menu_Config, //$menu_title,
				'administrator', //$capability,
				'liveoptim&#38;action=lister-config', //$menu_slug,
				'liveoptim_html_page' //$function = ''
		);
	}

	
	
	function liveoptim_html_page() {
	
		require_once 'admin/lib/base/conteneurMotCle.class.php';
		require_once 'admin/lib/base/conteneurBaliseIgnore.class.php';
		require_once 'admin/lib/base/conteneurTentativeMaj.class.php';
		require_once 'admin/lib/base/conteneurParametres.class.php';
		require_once 'admin/lib/base/conteneurConfig.class.php';
				
		// on récupère l'action
		$lAction = ( isset($_GET['action']) && strlen(sanitize_key($_GET['action'])) > 0 )? sanitize_key($_GET['action']) : 'accueil';
		
		
		if(!liveoptim_isInscrit() && $lAction!='inscriptionurl')$lAction='inscription' ;
		
		switch ($lAction) {
			case 'accueil':
				require_once 'admin/actions/accueil.class.php';
				new AccueilAction();
				break;
			case 'tutoriel':
				require_once 'admin/actions/tutoriel.class.php';
				new TutorielAction();
				break;
				
			//******************	
			// mise à jour V1.2
			//******************
			
			
			//Config
			
			case 'lister-config':
				require_once 'admin/actions/config/listerConfig.class.php';
				new ListerConfigAction();
				break;
				
			case 'upload-config':
				require_once 'admin/actions/config/UploadImport.class.php';
				new UploadImportAction();
				break;
				
			case 'modif-config':
				require_once 'admin/actions/config/modifConfig.class.php';
				new ModifConfigAction();
				break;
				
			case 'zip-config':
				require_once 'admin/actions/config/zipConfig.class.php';
				new ZipConfigAction();
				break;
				
			// Pages restreintes	
			
			case 'restreintes-lister':
				require_once 'admin/actions/pagesRestreintes/listerPagesRestreintes.class.php';
				new ListerPagesRestreintesAction();
				break;
				
			case 'PR-creer':
				require_once 'admin/actions/pagesRestreintes/creerPageRestreinte.class.php';
				new CreerPageRestreinteAction();
				break;	
				
			case 'PR-retirer':
				require_once 'admin/actions/pagesRestreintes/enleverPageRestreinte.class.php';
				new EnleverPageRestreinteAction();
				break;
			
			//*************
			// fin maj 1.2
			//**************
			
				// les mots clés
			case 'mot-cle-lister':
				require_once 'admin/actions/motCle/listerMotCle.class.php';
				new ListerMotCleAction();
				break;
			case 'mot-cle-creer':
				require_once 'admin/actions/motCle/creerMotCle.class.php';
				new CreerMotCleAction();
				break;
			case 'mot-cle-modifier':
				require_once 'admin/actions/motCle/modifierMotCle.class.php';
				new ModifierMotCleAction();
				break;
			case 'mot-cle-deplacer':
				require_once 'admin/actions/motCle/deplacerMotCle.class.php';
				new DeplacerMotCleAction();
				break;
			case 'mot-cle-enlever':
				require_once 'admin/actions/motCle/enleverMotCle.class.php';
				new EnleverMotCleAction();
				break;
		
				// les patterns
			case 'pattern-lister':
				require_once 'admin/actions/pattern/listerPattern.class.php';
				new ListerPatternAction();
				break;
			
							
				// les patterns ciblés
			case 'pattern-cible-lister':
				require_once 'admin/actions/patternCible/listerPatternCible.class.php';
				new ListerPatternCibleAction();
				break;
			
							
				// les balises ignorés
			case 'balise-ignore-lister':
				require_once 'admin/actions/baliseIgnore/listerBaliseIgnore.class.php';
				new ListerBaliseIgnoreAction();
				break;
			
			case 'inscription':
				require_once 'admin/actions/inscription.class.php';
				new InscriptionAction();
				break;
			case 'inscriptionurl':
				 require_once 'admin/actions/inscription_url.class.php';
				new InscriptionUrlAction(); 
				break;
					
				// les codes HTTP
			case 'code401':
				require_once 'admin/actions/codesHttp/code401.class.php';
				new Code401Action();
				break;
			case 'code403':
				require_once 'admin/actions/codesHttp/code403.class.php';
				new Code403Action();
				break;
			case 'code404':
				require_once 'admin/actions/codesHttp/code404.class.php';
				new Code404Action();
				break;
		
			default:
				require_once 'admin/actions/codesHttp/code404.class.php';
				new Code404Action();
				break;
		}
	}
		
}


function liveoptim_isInscrit(){
		
	require_once dirname(__FILE__).'/admin/lib/base/conteneurParametres.class.php';
	$conteneurParametre = ConteneurParametres::getInstance();
	
	
	$inscription = $conteneurParametre->getInscription();
		
	return $inscription == 1;
}
?>