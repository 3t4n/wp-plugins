<?php

///////////show_dashboard_list_yourtax.php

if (!class_exists('Application_Maker_setListWidget')) {

    class Application_Maker_setListWidget extends Application_Maker_Extensions {

        public function __construct() {

        }
        public function setWidget($widg, $mainkey, $app) {
            global $current_user, $post, $meta_marker, $oThis;
            //GET DATA PROCESS FILE
            include APPLICATION_MAKER_PATH . 'lib/widgets/data_process/' . $widg['data_process'] . '.php';
            //GET VIEW
            include APPLICATION_MAKER_PATH . 'lib/widgets/views/' . $widg['view'] . '.php';
        }

    }

}
$apm_setwidget_list = new Application_Maker_setListWidget();
$apm_setwidget_list->setWidget($widg, $mainkey, $app);
?>

