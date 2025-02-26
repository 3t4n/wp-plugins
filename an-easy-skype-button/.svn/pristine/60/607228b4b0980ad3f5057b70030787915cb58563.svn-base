<?php

namespace AnEasySkypeButton\Admin;


use WPExpress\Abstractions\SettingsPage;


class Settings extends SettingsPage
{

    public function __construct()
    {
        parent::__construct( __( 'Skype Settings', 'octopus-skype' ), 'manage_options', 'octopus-skype-button' );
        $description = __( 'Set the default skype account name', 'octopus-skype' );


        $this->addCustomSettings()
            ->setPageDescription($description)
            ->setPageTitle( __( 'An Easy Skype Button', 'octopus-skype' ) )
            ->registerPage();

    }

    private function addCustomSettings()
    {
        $atts = array( 'style' => 'min-width: 400px;', 'readonly' => false );
        $this->registerMetaField( 'defaultAccount', __( 'Default Account', 'octopus-skype' ), 'text', '', $atts );

        return $this;
    }

}