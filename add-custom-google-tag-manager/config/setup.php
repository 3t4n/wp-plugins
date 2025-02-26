<?php
defined('ABSPATH') or die('not allowed.');

if (!exist_option('tag-manager-add-custom-tag-manager')){ //INSTALLING THE DATA, NEED TO BE SET FROM THE PLUGIN ADMIN PAGE ONLY AND ALSO REMOVED CAN BE FROM THERE.
    foreach ($myInstallationData as $addTagKey => $addTagValue){
        add_option($addTagKey,$addTagValue);
    }
}