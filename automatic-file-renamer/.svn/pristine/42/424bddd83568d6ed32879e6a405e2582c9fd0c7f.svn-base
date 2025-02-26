<?php
/*
Plugin Name: Automatic File Renamer
Plugin URI: https://wordpress.org/plugins/automatic-file-renamer
Author URI: https://unsiteavous.fr/realisations/extensions/automatic-file-renamer/
Description: Renomme les fichiers téléversés de sorte à ce que les page liées ne posent pas de problèmes dans l'arborescence du site.
Author: Un site à Vous, Cellophile
Version: 0.2.8
Requires at least: 5.6
Tested up to: 6.6.1
Requires PHP: 7.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Author URI: https://unsiteavous.fr
Text Domain: automatic-file-renamer

Automatic File Renamer is free software: you can redistribute it and/or modifyit under the terms of the GNU General Public License as published bythe Free Software Foundation, either version 2 of the License, or any later version.

Automatic File Renamer is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License along
with Automatic File Renamer or WordPress. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}


require_once __DIR__ . '/AFR-config.php';
require_once __DIR__ . '/Admin/AFR-Admin-functions.php';
require_once __DIR__ . '/AFR-functions.php';



// Appel des deux fonctions.
if ($AFR_activation == '1') {
  // Lors du téléversement du media
  add_filter( 'sanitize_file_name', function( $filename ) use ( $AFR_prefixe, $AFR_suffixe ) {
    return AFR_change_nom_prefixe_dur ( $filename, $AFR_prefixe, $AFR_suffixe );
  },1 );

  if (isset($image_ID)){
    // Si le media est attaché lors de sa création :
    add_action( 'add_attachment', function( $image_ID ) use ( $AFR_prefixe, $AFR_suffixe ) {
      AFR_change_enregistrement_fichier ( $image_ID, $AFR_prefixe, $AFR_suffixe );
    },10);

    do_action ( 'add_attachment', $image_ID);
  }
}

if ($AFR_redirection == '1') {
  if ($AFR_Ou_Rediriger == 'defaut') {
    add_action( 'template_redirect', 'AFR_Redirection_defaut', 1 );

  }elseif ($AFR_Ou_Rediriger == 'pageliee') {

    add_action( 'template_redirect', 'AFR_Redirection_Page_Liee', 1 );

  }elseif ($AFR_Ou_Rediriger == 'error') {
    add_action( 'template_redirect', 'AFR_Redirection_error_404', 1 );

  }
}
