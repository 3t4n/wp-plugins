<?php
AnyChatLoader::loadModel('AnyChatConfigModelAbstract');
AnyChatLoader::loadClass('AnyChatAdmin');

abstract class AnyChatConfigModel extends AnyChatConfigModelAbstract
{
    
    public function getCurrentIP()
    {
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] != '127.0.0.1') {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] != '127.0.0.1') {
            return $_SERVER['REMOTE_ADDR'];
        }
        if (isset($_SERVER['HTTP_X_REAL_IP']) && $_SERVER['HTTP_X_REAL_IP'] != '127.0.0.1') {
            return $_SERVER['HTTP_X_REAL_IP'];
        }
    }
    
    public function rules()
    {
        return array(
            array(
                array(
                    'api_key',
                    'widget_id',
                    'integration_type',
                    'disable_admin'
                ), 'safe'
            ),
            array(
                array(
                    'api_key',
                    'widget_id',
                ), 'validateApiWidget'
            ),
            array(
                array(
                    'integration_type'
                ), 'validateIntegrationType'
            ),
            array(
                array(
                    'api_key',
                    'widget_id',
                    'integration_type',
                ), 'validateRequired'
            )
        );
    }
    
    public function validateIntegrationType($value)
    {
        return in_array($value, array('1', '2', 1, 2));
    }
    
    public function validateApiWidget($value)
    {
        return preg_match('/^[a-zA-Z0-9-_]+$/is', $value);
    }
    
    public function attributeLabels()
    {
        return array(
            'api_key' => esc_html__('AnyChat API Key', 'anychat'),
            'widget_id' => esc_html__('AnyChat Widget ID', 'anychat'),
            'integration_type' => esc_html__('Integration type', 'anychat'),
            'disable_admin' => esc_html__('Disable admin widget', 'anychat'),
        );
    }
    
    public function attributeTypes()
    {
        return array(
            'disable_admin' => 'switch',
            'integration_type' => 'html'
        );
    }
    
    public function validate($addErrors = true) {
        $valid = parent::validate($addErrors);
        
        $validValues = true;
        $values = null;
        foreach ($this->getAttributes() as $attr => $value) {
            switch ($this->getAttributeType($attr)) {
                case 'select':
                    if ($this->getGroupedSelect($attr)) {
                        $options = $this->getSelectOptions($attr);
                        $values = array();
                        foreach ($options as $k => $v) {
                            if ($v['items']){
                                $values = array_merge($values, array_keys($v['items']));
                            }
                        }
                    } else {
                        $values = array_keys($this->getSelectOptions($attr));  
                    }
                    break;
                case 'switch':
                    $values = array(0, 1);
                    break;
                default: 
                    $values = null;
            }
            if (is_array($values) && in_array(0, $values, true)) {
                $values[] = '0';
            }
            if (is_array($values) && in_array(1, $values, true)) {
                $values[] = '1';
            }
            if (is_array($values)) {
                if ($this->getAttributeType($attr) == 'select' && $this->getMultipleSelect($attr)) {
                    foreach ($value as $v) {
                        if (!in_array($v, $values)) {
                            $this->addError($attr, sprintf(esc_html__('Incorrect "%s" value', 'anychat'), $this->getAttributeLabel($attr)));
                            $validValues = false;
                        }
                    }
                } else {
                    if (!in_array($value, $values, true)) {
                        $this->addError($attr, sprintf(esc_html__('Incorrect "%s" value', 'anychat'), $this->getAttributeLabel($attr)));
                        $validValues = false;
                    }
                }
            }
        }
        return $valid && $validValues;
    }
}
