<?php
AnyChatLoader::loadModel('AnyChatConfigModel');

class AnyChatConfigGeneral extends AnyChatConfigModel
{
    public $api_key;
    public $widget_id;
    public $integration_type;
    public $disable_admin;
    
    public function getJsonConfigKey()
    {
        return 'anychat';
    }
    
    public function attributeDefaults()
    {
        return array(
            'integration_type' => 2,
            'disable_admin' => 0
        );
    }
    
    public function htmlFields()
    {
        return array(
            'integration_type' => AnyChatAdmin::render('admin/_integration_type.php', array(
                'value' => $this->integration_type
            ))
        );
    }
    
    public function getFormTitle()
    {
        return esc_html__('General settings', 'anychat');
    }
}
