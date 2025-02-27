<?php
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
global $post;
if( isset( $_GET['resourcePath'] ) ){
    require_once $this->PluginDir . '/templates/pci-frame-applepay-resourcepath.php';
} else {
    require_once $this->PluginDir . '/templates/pci-frame-applepay-init.php';
}
?>
