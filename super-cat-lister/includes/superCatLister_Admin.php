<?php
//Initialize the function for the Admin Panel=========================
function superCatLister_initAdmin() {
if(!$plugin_page) {
$plugin_page = add_options_page(
 'Super Cat Lister Plug-In Options'  //Page Title
,'Super Cat Lister' //Menu Title
,9 //User Access Level
,basename('superCatLister_Admin.php') //Filename
,array('superCatLister_adminPanelStarter','init') //Class & function
);
}//end if(!$plugin_page)
}//end function superCatLister_initAdmin() 
//end Initialize the function for the Admin Panel====================

class SuperCatLister_adminPanelStarter {
function init() {
$defaults = new SuperCatListerDefaults();
$adminPanel = new EI_WP_AdminPanel($defaults);
$adminPanel->adminPanel();
}//end function init
}//end class SuperCatLister_adminPanelStarter
?>