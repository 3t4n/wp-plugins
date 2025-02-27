<?php

//home
if( !function_exists("es_plugin_page_home") ) { 
    function es_plugin_page_home() {
        include(dirname(__FILE__).'/home/index.php');
    } 
}

//config
if( !function_exists("es_plugin_page_config") ) { 
    function es_plugin_page_config() {
        include(dirname(__FILE__).'/config/index.php');
    } 
}

//campaigns
if( !function_exists("es_plugin_page_campaigns") ) { 
    function es_plugin_page_campaigns() { 
        include(dirname(__FILE__).'/campaigns/list.php');
    } 
}
if( !function_exists("es_plugin_page_campaigns_create") ) { 
    function es_plugin_page_campaigns_create() { 
        include(dirname(__FILE__).'/campaigns/create.php');
    } 
} 
if( !function_exists("es_plugin_page_campaigns_edit") ) { 
    function es_plugin_page_campaigns_edit() { 
        include(dirname(__FILE__).'/campaigns/edit.php');
    } 
} 

//maillists
if( !function_exists("es_plugin_page_maillists") ) { 
    function es_plugin_page_maillists() { 
        include(dirname(__FILE__).'/maillists/list.php');
    } 
}
if( !function_exists("es_plugin_page_maillists_create") ) { 
    function es_plugin_page_maillists_create() { 
        include(dirname(__FILE__).'/maillists/create.php');
    } 
} 
if( !function_exists("es_plugin_page_maillists_edit") ) { 
    function es_plugin_page_maillists_edit() { 
        include(dirname(__FILE__).'/maillists/edit.php');
    } 
} 
//contacts
if( !function_exists("es_plugin_page_contacts") ) { 
    function es_plugin_page_contacts() { 
        include(dirname(__FILE__).'/contacts/list.php');
    } 
}
if( !function_exists("es_plugin_page_contacts_create") ) { 
    function es_plugin_page_contacts_create() { 
        include(dirname(__FILE__).'/contacts/create.php');
    } 
} 
if( !function_exists("es_plugin_page_contacts_edit") ) { 
    function es_plugin_page_contacts_edit() { 
        include(dirname(__FILE__).'/contacts/edit.php');
    } 
} 

//editor
if( !function_exists("es_plugin_page_editor") ) { 
    function es_plugin_page_editor() { 
        include(dirname(__FILE__).'/editor/editor.php');
    } 
} 

//contactform7
if( !function_exists("es_plugin_page_contactform7") ) { 
    function es_plugin_page_contactform7() { 
        include(dirname(__FILE__).'/contactform7/list.php');
    } 
}

if( !function_exists("es_plugin_page_contactform7_create") ) { 
    function es_plugin_page_contactform7_create() { 
        include(dirname(__FILE__).'/contactform7/create.php');
    } 
}

if( !function_exists("es_plugin_page_contactform7_edit") ) { 
    function es_plugin_page_contactform7_edit() { 
        include(dirname(__FILE__).'/contactform7/edit.php');
    } 
}

//frontend pages
include(dirname(__FILE__).'/frontend/suscription.php');