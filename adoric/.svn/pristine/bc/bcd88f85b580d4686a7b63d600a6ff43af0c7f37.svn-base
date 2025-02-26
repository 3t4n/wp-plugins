<?php

defined( 'ABSPATH' ) or exit;

class adoric_util
{    
    public function __construct()
    {
    }
    
    public function get_adoric_installed()
    {
        $res = ADORICWP::instance()->sql->get_account_data();
        
        return (is_object($res) && is_string($res->embed_code));
    }
    
    public function get_adoric_embed_code()
    {
        $res = ADORICWP::instance()->sql->get_account_data();
        
        if (is_object($res) && is_string($res->embed_code)) {
            return base64_decode($res->embed_code);
        } else if ( is_null($res) ) {
            return '';
        }
        
        return '';
    }
    
    public function get_adoric_username()
    {
        $res = ADORICWP::instance()->sql->get_account_data();
        
        if (is_object($res) && is_string($res->account_id)) {
            $requestAdoricUsername = wp_remote_get( ADORIC__APP__HOST__ . "/v1/public/wp/get-user-name?accountId={$res->account_id}" );
            $responseAdoricUsername = json_decode(wp_remote_retrieve_body( $requestAdoricUsername ), TRUE);

            if ($responseAdoricUsername === NULL || $responseAdoricUsername['code'] != 200) {
                return '';
            }
            
            return $responseAdoricUsername['data']['name'];
        } else if ( is_null($res) ) {
            return '';
        }
        
        return '';
    }
    
    public function get_adoric_domain_id()
    {
        $res = ADORICWP::instance()->sql->get_account_data();
        
        if (is_object($res) && is_string($res->domain_id)) {
            return $res->domain_id;
        } else if ( is_null($res) ) {
            return '';
        }
        
        return '';
    }
    
    public function get_adoric_account_id()
    {
        $res = ADORICWP::instance()->sql->get_account_data();
        
        if (is_object($res) && is_string($res->account_id)) {
            return $res->account_id;
        } else if ( is_null($res) ) {
            return '';
        }
        
        return '';
    }
    
    public function get_adoric_templates()
    {
        $requestTemplates = wp_remote_get( ADORIC__APP__HOST__ . '/v1/get-templates?page=1&limit=9' );
        $templates = json_decode(wp_remote_retrieve_body( $requestTemplates ), TRUE);
        
        if ($templates === NULL || $templates['code'] != 200) {
            return [];
        }
        
        return $templates['data'];
    }
    
    public function generate_template_link($template) {
        if ($template === 'ADORIC_BLANK_TEMPLATE') {
            $templateId = $template;
            $type = 'boxes';
        } else {
            $templateId = $template['_id'];
            $type = array_key_exists('templateType', $template) ? $template['templateType'] : 'boxes';
        }
        
        $domainId = ADORICWP::instance()->util->get_adoric_domain_id();
        
        
        return ADORIC__APP__HOST__ . '/v1/campaign/create?domainId='. $domainId .'&templateId='. $templateId .'&templateSource=template&templateType=' . $type;
    }
    
    public function generate_template_style($template) {
        $width = '250px';
        $position = '';
        $parentStyles = '';
        
        if ($template['templateType'] === 'bars') {
            $width = '90%';
        } else if (intval($template['width'], 10) === intval($template['height'], 10)) {
            $width = '260px';
        } else if ($template['width'] > $template['height']) {
            $width = '280px';
        } else if (($template['width'] / $template['height']) <= 0.7) {
            $width = '140px';
        } else if ($template['width'] < $template['height']) {
            $width = '160px';
        }

        switch (is_array($template['html']) ? $template['html'][0]['settings']['position'] : $template['settings']['position']) {
            case '1':
                $position = 'position: absolute; top 5%; left: 5%';
                break;
            case '2':
                $parentStyles = 'display: flex; justify-content: center; align-items: flex-start';
                $position = 'top: 5%';
                break;
            case '3':
                $position = 'position: absolute; top 5%; right: 5%';
                break;
            case '4':
                $parentStyles = 'display: flex; align-items: center';
                break;
            case '5':
                $parentStyles = 'display: flex; justify-content: center; align-items: center';
                break;
            case '7':
                $position = 'position: absolute; bottom: 5%; left: 5%';
                break;
            case '8':
                $parentStyles = 'display: flex; justify-content: center; align-items: flex-end';
                $position = 'bottom: 5%';
                break;
            case '9':
                $position = 'position: absolute; bottom: 5%; right: 5%';
                break;
            default:
                break;
        }
        
        return ['width' => $width, 'position' => $position, 'parentStyles' => $parentStyles];
    }
    
    public function get_signup_free_link() {
        $requestLink = wp_remote_get( ADORIC__APP__HOST__ . '/v1/public/get-free-plan-id' );
        $link = json_decode(wp_remote_retrieve_body( $requestLink ), TRUE);
        
        if ($link === NULL || $link["planId"] === NULL) {
            return ADORIC__APP__HOST__;
        }
        
        return ADORIC__APP__HOST__ . '/subscribe?price=0&contractId=0&planId=' . $link["planId"];
    }
}