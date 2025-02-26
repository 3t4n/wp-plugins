<?php

/**
 * Permet l'enregistrement des nouvelles données dans le fichier config
 * @param [string] $prefixe        [string placée au début du nom du fichier]
 * @param [string] $suffixe        [string placée àla fin du nom du fichier]
 * @param [int] $AFRactivation     [0 ou 1 : active ou desactive le renommage]
 * @param [int] $AFRredirection    [0 ou 1 : active ou desactive la redirection]
 * @param [string] $ou_rediriger   [404, url du fichier ou page attachée]
 */
function AFRenregistrement($AFR_prefixe, $AFR_suffixe, $AFR_activation, $AFR_redirection, $AFR_Ou_Rediriger) {

// Si les options existent dans la DB, on les met à jour.
  if (get_option('AFR_prefixe') || get_option('AFR_suffixe') || get_option('AFR_activation') && get_option('AFR_redirection') && get_option('AFR_Ou_Rediriger') ) {
    update_option('AFR_prefixe', $AFR_prefixe);
    update_option('AFR_suffixe', $AFR_suffixe);
    update_option('AFR_activation', $AFR_activation);
    update_option('AFR_redirection', $AFR_redirection);
    update_option('AFR_Ou_Rediriger', $AFR_Ou_Rediriger);

  }else{ // Sinon les enregistre dans la table options pour la première fois.
    add_option('AFR_prefixe', $AFR_prefixe);
    add_option('AFR_suffixe', $AFR_suffixe);
    add_option('AFR_activation', $AFR_activation);
    add_option('AFR_redirection', $AFR_redirection);
    add_option('AFR_Ou_Rediriger', $AFR_Ou_Rediriger);
  }
  return true;
}


/**
 * Permet l'enregistrement des capacités à modifier les réglages de Automatic File Renamer.
 * @param [type] $POSTS [array : récupère toutes les cases cochées dans le panel admin]
 */
function AFR_user_role($POSTS) {
  // On initie les rôles
  $roles = new WP_Roles;
  $all_roles = $roles->get_names();
  $AFR_roles_config = ['Administrator'];

//On regarde pour chaque rôle si la cse est cochée. Si oui, on ajout la cap, sinon on l'enlève.

  foreach ($all_roles as $role => $role_value) {

    $rolecap = $roles->get_role($role)->capabilities;
    $role_verif = $roles->get_role($role);

    if ($role == "administrator") {
    // Si role est admin, on vérifie qu'il est inscrit avant de passer
      if (!isset($rolecap['AFR_config']) || $rolecap['AFR_config'] =! 1) {
        $role_verif->add_cap('AFR_config'); // on ajoute la cap si elle n'existe pas
      }
    }else{

      if (in_array($role_value, $POSTS)) {
        array_push($AFR_roles_config, $role_value); // on mémorise le role coché.

        if (isset($rolecap['AFR_config']) && $rolecap['AFR_config'] == 1) {
        }else {
          $role_verif->add_cap('AFR_config'); // on ajoute la cap si elle n'existe pas
        }
      }else { // sinon on la supprime
        if (isset($rolecap['AFR_config']) && $rolecap['AFR_config'] == 1) {
          $role_verif->remove_cap('AFR_config');
        }
      }
    }

  }

  // on met à jour la table option avec tous les utilisateurs cochés
  update_option('AFR_roles_config', $AFR_roles_config);


  return true;
}
