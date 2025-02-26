<?php
///////////show_dashboard_list_yourtax.php

if (!class_exists('Application_Maker_setWidgetListTax')) {

    class Application_Maker_setWidgetListTax extends Application_Maker_Extensions {

        public function __construct() {

        }

        public function setWidget($widg, $mainkey, $app) {
            global $current_user, $post, $meta_marker, $oThis;
			
            $nbr = $widg['default_nbr'];
            if (isset($widg['option_nbr_name'])) {
                $nbrtest = get_option($widg['option_nbr_name']);
                if ($nbrtest !== false and $nbrtest !== '') {
                    $nbr = intval($nbrtest);
                }
            }
            $activities = $this->getLatestActivities($mainkey, $widg['modules'], $nbr, $widg);
            $armodsnum = $this->getModuleNumbers($app);
            $default_name = $widg['default_name'];


            //GET VIEW
             include APPLICATION_MAKER_PATH . 'lib/widgets/views/show_dashboard_list_yourtax_view.php';
        }
    }

}
$apm_setwidget = new Application_Maker_setWidgetListTax();
$apm_setwidget->setWidget($widg, $mainkey, $app);
?>

