<?php

// Si les données sont présentes dans la DB, on les récupère, sinon on initialise.
if (get_option('AFR_prefixe') || get_option('AFR_suffixe') || get_option('AFR_activation') && get_option('AFR_redirection') && get_option('AFR_Ou_Rediriger') ) {
  $AFR_prefixe = get_option('AFR_prefixe');
  $AFR_suffixe = get_option('AFR_suffixe');
  $AFR_activation = get_option('AFR_activation');
  $AFR_redirection = get_option('AFR_redirection');
  $AFR_Ou_Rediriger = get_option('AFR_Ou_Rediriger');
}else {
  $AFR_prefixe = get_bloginfo('name');
  $AFR_suffixe = 'example';
  $AFR_activation = '1';
  $AFR_redirection = '1';
  $AFR_Ou_Rediriger = 'defaut';
}

if (get_option('AFR_roles_config')) {
  $AFR_roles_config = get_option('AFR_roles_config');
}else {
  $AFR_roles_config = 'Administrator';
}

