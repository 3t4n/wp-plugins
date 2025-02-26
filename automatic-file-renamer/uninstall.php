<?php
defined( 'WP_UNINSTALL_PLUGIN' ) or die( 'Something went wrong.' );

// Supprime les options enregistrées.
delete_option('AFR_prefixe');
delete_option('AFR_suffixe');
delete_option('AFR_activation');
delete_option('AFR_redirection');
delete_option('AFR_Ou_Rediriger');
delete_option('AFR_roles_config');

// Supprime les capabilities ajoutées aux roles lors de la suppression.
$roles = new WP_Roles;
$all_roles = $roles->get_names();
foreach ($all_roles as $role => $role_value) {
  $role_verif = $roles->get_role($role);
  $role_verif->remove_cap('AFR_config');
}
