<?php

// CHANGEMENT DU NOM DES MEDIAS

// Compte le nombre de fichiers du répertoire où sont stockées les images médias ou bien crée le dossier s'il est inexistant.

function AFR_count_fichiers_url_file() {
  $uploads = wp_upload_dir();
  $repertoire = $uploads['path']; // On récupère notre répertoire.
  if (is_dir($repertoire)) { // On regarde s'il existe.
    if ($dh = opendir($repertoire)) {  // Si c'est le cas on le lit.
      while (($file = readdir($dh)) !== false) {
        if ($file != "." && $file != ".." ) {
        $filelist[]= $file;
        }
      }
      closedir($dh);
      if (!isset($filelist) || $filelist == NULL) {
        return 0;
      }else {
        return count($filelist); // Et on retourne le nombre de fichiers présentes à l'intérieur.
      }
    }
  } else {
      mkdir ($repertoire); // Si le dossier n'existe pas on le crée et on retourne 0 car il ne comporte pas de fichiers.
      return 0;
  }
}

// Mise à jour du NOM de l'image lors de l'importation.

function AFR_change_nom_prefixe_dur ( $AFR_filename, $AFR_prefixe, $AFR_suffixe) {
  $info = pathinfo( $AFR_filename ); // Analyse de notre fichier.
  $nomoriginal = $info['filename']; // on récuère le nom original du fichier
  $ext = empty( $info['extension'] ) ? '' : '.' . $info['extension']; // On récupère l'extension de notre fichier.
  if (function_exists('AFR_count_fichiers_url_file')) {
    $nombre_fichier =(AFR_count_fichiers_url_file())+1; // On récupère le nombre de fichiers de notre répertoire.
  } else {
    $nombre_fichier = 1; // Cas ou la fonction n'est pas trouvé.
  }
  if ($AFR_prefixe =='') { // On prépare le nom du fichier sortant.
    $nom = $nomoriginal.'-'.$nombre_fichier;
  }else{
    $nom = $AFR_prefixe.'-'.$nomoriginal.'-'.$nombre_fichier;
  }
  if ($AFR_suffixe =='') {
    $nom .= $ext;
  }else{
    $nom .= '-'.$AFR_suffixe.$ext;
  }

  return $nom; // Et on le retourne.
}

function AFR_change_enregistrement_fichier ( $AFR_fichier_ID, $AFR_prefixe, $AFR_suffixe ) {

  if (function_exists('AFR_count_fichiers_url_file')) {
    $nombre_fichier =(AFR_count_fichiers_url_file()); // On récupère le nombre de fichiers de notre répertoire.
  } else {
    $nombre_fichier = 1; // Cas ou la fonction n'est pas trouvé.
  }
  $fichiermodifiee = get_permalink( $AFR_fichier_ID );
  $fichierurl = pathinfo($fichiermodifiee);
  $fichiername = $AFR_prefixe.'-'.$fichierurl['filename'].'-'.$nombre_fichier.'-'.$AFR_suffixe;

  $fichier = array ( // On modifie la page liée dans cette variable.
    'ID' => $AFR_fichier_ID,
    'post_name' => $fichiername
  );
  wp_update_post( $fichier );
}

function AFR_Redirection_defaut() {
  if ( ! defined( 'ATTACHMENT_REDIRECT_CODE' ) ) {
    define( 'ATTACHMENT_REDIRECT_CODE', '301' );
  }

  global $post;

  if ( is_attachment() ) {
    if (isset( $post->guid ) ) {
      // Redirect to media's url.
      wp_safe_redirect( $post->guid, ATTACHMENT_REDIRECT_CODE );
      exit;
    }else {
      // Theme 404 template available?
      $theme_404_template = locate_template( '404.php' );
      if ( ! empty( $theme_404_template ) ) {
        global $wp_query;
        $wp_query->set_404();
        status_header( 404 );
        nocache_headers();
        require get_404_template();
        exit;
      } else {
        wp_die( 'Page not found.', '404 - Page not found', 404 );
        exit;
      }
    }
  }
}


function AFR_Redirection_Page_Liee() {
//
// Code tiré du plugin "Attachment Pages Redirect", de Samuel Aguilera
//
  if ( ! defined( 'ATTACHMENT_REDIRECT_CODE' ) ) {
    define( 'ATTACHMENT_REDIRECT_CODE', '301' ); // Default redirect code for attachments with existing parent post.
  }

  if ( ! defined( 'ORPHAN_ATTACHMENT_REDIRECT_CODE' ) ) {
    define( 'ORPHAN_ATTACHMENT_REDIRECT_CODE', '302' ); // Default redirect code for attachments with no parent post.
  }


  global $post;

  if ( is_attachment() && isset( $post->post_parent ) && is_numeric( $post->post_parent ) && ( 0 !== $post->post_parent ) ) {

    // Is the post in trash?
    $parent_post_in_trash = get_post_status( $post->post_parent ) === 'trash' ? true : false;

    // Prevent endless redirection loop in old WP releases and redirecting to trashed posts if an attachment page is visited when parent post is in trash.
    if ( $parent_post_in_trash ) {
      // Theme 404 template available?
      $theme_404_template = locate_template( '404.php' );
      if ( ! empty( $theme_404_template ) ) {
        global $wp_query;
        $wp_query->set_404();
        status_header( 404 );
        nocache_headers();
        require get_404_template();
        exit;
      } else {
        wp_die( 'Page not found.', '404 - Page not found', 404 );
        exit;
      }
    }

    // Redirect to post/page from where attachment was uploaded.
    wp_safe_redirect( get_permalink( $post->post_parent ), ATTACHMENT_REDIRECT_CODE );
    exit;

  } elseif ( is_attachment() && isset( $post->post_parent ) && is_numeric( $post->post_parent ) && ( $post->post_parent < 1 ) ) {

    // Redirect to home for attachments not associated to any post/page.
    wp_safe_redirect( get_bloginfo( 'wpurl' ), ORPHAN_ATTACHMENT_REDIRECT_CODE );
    exit;

  }
}

function AFR_Redirection_error_404() {
  if ( ! defined( 'ATTACHMENT_REDIRECT_CODE' ) ) {
    define( 'ATTACHMENT_REDIRECT_CODE', '301' );
  }
  global $post;

  if ( is_attachment() ) {
    // Theme 404 template available?
    $theme_404_template = locate_template( '404.php' );
    if ( ! empty( $theme_404_template ) ) {
      global $wp_query;
      $wp_query->set_404();
      status_header( 404 );
      nocache_headers();
      wp_safe_redirect( home_url( '/404/' ) );
      exit;
    } else {
      wp_die( 'Page not found.', '404 - Page not found', 404 );
      exit;
    }
  }
}
?>
