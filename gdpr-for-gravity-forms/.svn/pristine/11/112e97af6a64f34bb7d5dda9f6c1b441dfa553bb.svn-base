<?php

namespace data443\GDPR\Modules\GravityForms;

use Codelight\GDPR\Components\Consent\ConsentManager;
use Codelight\GDPR\DataSubject\DataSubjectManager;

use GFAPI;

/**
 * todo: add filters!
 *
 * Class GravityForms
 *
 * @package data443\GDPR\Modules\GravityForms
 */
class GravityForms
{
    public function __construct(DataSubjectManager $dataSubjectManager, ConsentManager $consentManager)
    {   
        $this->dataSubjectManager = $dataSubjectManager;
        $this->consentManager = $consentManager;

        add_action('gform_loaded', [$this, 'loadAddOn'], 5);
        add_action('gform_field_standard_settings',[$this,'anonymizeAdminFields'], 10, 2);
        add_action('gform_editor_js', [$this,'editor_script']);
        add_filter('gform_tooltips', [$this,'add_anonymize_tooltips']);
        add_action('gform_after_submission', [$this,'gdpr_add_entry_to_db'], 10, 2);        
        add_filter('gdpr/data-subject/data', [$this, 'getExportData'], 20, 2);
        add_action('gdpr/data-subject/delete', [$this, 'deleteEntries']);
        add_action('gdpr/data-subject/anonymize', [$this, 'anonymizeEntries']);        
        add_action( 'admin_notices',  [$this, 'gdpr_error_notice']);
    }

    public function loadAddOn()
    {
        if (!method_exists('\GFForms', 'include_addon_framework')) {
            return;
        }

        \GFAddOn::register('\data443\GDPR\Modules\GravityForms\GravityFormsGDPRAddOn');
    }
    
    public function anonymizeAdminFields($position, $form_id)
    {   
        if ( $position == 1450 ) {
        ?>
        <li class="gdpr_anonymize">
        <label for="field_admin_label" class="section_label">
            <?php esc_html_e( 'Anonymize', 'gravityforms' ); ?>
            <?php gform_tooltip( 'form_field_anonymize_value' ) ?>
        </label>
        <input type="checkbox" id="field_anonymize_value" onclick="SetFieldProperty('anonymizeField', this.checked);" /> Anonymize field value
        </li>
        <?php
        }
    }

    public function editor_script()
    {
        ?>
        <script type='text/javascript'>
            //adding setting to fields of type "text"
            fieldSettings.text += ', .anonymize_setting';
     
            //binding to the load field settings event to initialize the checkbox
            jQuery(document).on('gform_load_field_settings', function(event, field, form){
                jQuery('#field_anonymize_value').attr('checked', field.anonymizeField == true);
            });
        </script>
        <?php
    }

    public function add_anonymize_tooltips( $tooltips ) 
    {
        $tooltips['form_field_anonymize_value'] = "<h6>Anonymize</h6>Check this box to Anonymize this field's data on GDPR data search";
        return $tooltips;
    }

    public function gdpr_add_entry_to_db($entry,$form)
    {   
        $consents = $this->findConsents($entry);

        if (!count($consents)) {
            return;
        }
        $gdprAddOn  = GravityFormsGDPRAddOn::get_instance();
        $settings = $gdprAddOn->get_form_settings($form);
        
        if(isset($settings['gdpr_email_field']))
        {
            if(isset($entry[$settings['gdpr_email_field']]))
            {
                $email= $entry[$settings['gdpr_email_field']];

                if (!$email) 
                {
                    return;
                }
                $dataSubject = $this->dataSubjectManager->getByEmail($email);

                foreach ($consents as $consent) {
                    $dataSubject->giveConsent($consent);
                }
            }
        }
    }
    
    public function getExportData(array $data, $email)
    {
        $forms = $this->getValidForms($this->getForms(), 'export');
        if (!count($forms)) 
        {
            return $data;
        }

        foreach ($forms as $form) 
        {

            $entries = $this->getEntriesByEmail($form, $email);

            if (!count($entries)) 
            {
                continue;
            }

            $title  = __('Form submission:', 'gdpr') . ' ' . $form['title'];
            $fields = $this->getFormFields($form);

            foreach ($entries as $i => $entry) 
            {

                foreach ($fields as $field) 
                {
                    if(isset($field['id']))
                    {
                        $data_value="";
                        foreach($entry as $key => $value){
                            $exp_key = explode('.', $key);
                            if($exp_key[0] == $field['id']){
                                $data_value .= $entry[$key]." ";
                            }                           
                        }
                        $data[$title][$i][$field['label']] = rtrim($data_value);
                    }
                }

                $data[$title][$i]['date']       = $entry['date_created'];
                $data[$title][$i]['ip']         = $entry['ip'];
                $data[$title][$i]['url']        = $entry['source_url'];
                $data[$title][$i]['user_agent'] = $entry['user_agent'];
            }
        }
        return $data;
    }

    public function deleteEntries($email)
    {
        $forms = $this->getValidForms($this->getForms(), 'delete');
        if (!count($forms)) {
            return;
        }

        foreach ($forms as $form) {

            $entries = $this->getEntriesByEmail($form, $email);

            if (!count($entries)) {
                continue;
            }

            foreach ($entries as $entry) {
                GFAPI::delete_entry($entry['id']);
            }
        }
    }

    public function anonymizeEntries($email)
    {
        $forms = $this->getValidForms($this->getForms(), 'delete');
        
        if (!count($forms)) {
            return;
        }

        foreach ($forms as $form) {
            foreach($form['fields'] as $key => $value)
            {  
                if($value['anonymizeField'] == 1) 
                {
                    $entries = $this->getEntriesByEmail($form, $email);

                    if (!count($entries)) {
                    continue;
                    }

                    if(is_array($value['inputs'])){
                        foreach ($value['inputs'] as $input) {
                            foreach ($entries as $entry) {
                                GFAPI::update_entry_field( $entry['id'], $input['id'], "[deleted]" ) ;
                            }
                        }
                    }else{
                        foreach ($entries as $entry) {
                            GFAPI::update_entry_field( $entry['id'], $value['id'], "[deleted]" ) ;
                        }
                    }

                }
            }

        }
    }

    public function getForms()
    {
        return GFAPI::get_forms();
    }

    public function getValidForms($forms, $action)
    {
        $gdprAddOn  = GravityFormsGDPRAddOn::get_instance();
        $validForms = [];

        foreach ($forms as $form) {
            $settings = $gdprAddOn->get_form_settings($form);

            // Skip if email is not set
            if (!isset($settings['gdpr_email_field'])) {
                continue;
            }

            if ('delete' === $action) {
                if (isset($settings['gdpr_exclude_from_delete']) && $settings['gdpr_exclude_from_delete']) {
                    continue;
                }
            } else if ('export' === $action) {
                if (isset($settings['gdpr_exclude_from_export']) && $settings['gdpr_exclude_from_export']) {
                    continue;
                }
            }

            $validForms[] = $form;
        }

        return $validForms;
    }

    public function getEntriesByEmail($form, $email)
    {
        $gdprAddOn           = GravityFormsGDPRAddOn::get_instance();
        $primaryEmailFieldId = $gdprAddOn->get_form_settings($form)['gdpr_email_field'];

        $filter = [
            'field_filters' => [
                [
                    'key'   => $primaryEmailFieldId,
                    'value' => $email,
                ],
            ],
        ];
        $paging = [
            'offset'    => 0,
            'page_size' => 200,
        ];

        $entries = GFAPI::get_entries(
            $form['id'],
            $filter,
            null,
            $paging
        );

        // todo: add check for count: $result = GFAPI::count_entries( $form_ids, $search_criteria );

        return $entries;
    }

    public function getFormFields($form)
    {
        $fields = [];

        if (!count($form['fields'])) 
        {
            return $fields;
        }

        foreach ($form['fields'] as $field) 
        {
            $fields[] = [
                'id'    => $field->id,
                'label' => $field->label,
            ];
        }
        return $fields;
    }

    public function findConsents($entry)
    {
        $consents = [];

        foreach ($entry as $tag) 
        {
            /* @var $tag \WPCF7_FormTag */
            if ( $tag && $this->consentManager->isRegisteredConsent($tag))
            {
                $consents[] = $tag;
            }
        }
        return $consents;
    }
    
    public function gdpr_error_notice() {
        if(isset($_GET['page']) && isset($_GET['id']) && $_GET['page']=='gf_edit_forms' && $_GET['id']!='')
        {
            $gdprAddOn  = GravityFormsGDPRAddOn::get_instance();

            foreach ($this->getForms() as $form) 
            {
                if($form['id'] == $_GET['id'])
                {
                    $settings = $gdprAddOn->get_form_settings($form);
                    // Add Notice if email is not set
                    if (!isset($settings['gdpr_email_field'])) 
                    {
                        echo   '<div class="error notice">
                            <p>'.  __("You need to update the privacy settings and pick a field to be used as the main email address. Otherwise, the GDPR plugin won't know how to identify the data.", "gdpr-admin").'</p>
                            </div>';
                    }

                }

            }
        }
    }
}