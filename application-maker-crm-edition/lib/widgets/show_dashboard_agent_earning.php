<?php
///////////show_dashboard_list_yourtax.php

if (!class_exists('Application_Maker_setWidgetAgentEarning')) {

    class Application_Maker_setWidgetAgentEarning extends Application_Maker_Extensions {

        public function __construct() {

        }


        public function setWidget($widg, $mainkey, $app) {
            global $current_user, $post, $meta_marker, $oThis;

//PUT DATA PROCESS HERE

            //GET VIEW
             include APPLICATION_MAKER_PATH . 'lib/widgets/views/show_dashboard_agent_earning_view.php';
        }
    }

}
$apm_setwidget_agent_earning = new Application_Maker_setWidgetAgentEarning();
$apm_setwidget_agent_earning->setWidget($widg, $mainkey, $app);
?>

