<?php

function pbw_pagina_opcoes_frontend(){
  require_once(PBW_DIRETORIO_ABSOLUTO_DO_PLUGIN.'includes/templates/pagina-opcoes.php');
}

function pbw_registro_pagina_opcoes(){
  add_options_page( 'Player Barra WebRadio Opcões', 'Player Barra Opções', 'manage_options', 'Player Barra', 'pbw_pagina_opcoes_frontend');
}
add_action('admin_menu','pbw_registro_pagina_opcoes');

function pbw_carregando_settings_api(){
  register_setting('playerbarra_opcoes', 'playerbarra_op');
}
add_action('admin_init','pbw_carregando_settings_api');