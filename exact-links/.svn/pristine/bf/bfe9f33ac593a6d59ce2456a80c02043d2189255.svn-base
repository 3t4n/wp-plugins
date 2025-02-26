<?php

namespace ExactLinks\App\Http\Controllers;

use ExactLinks\App\Models\UTMTemplate;
use ExactLinks\Framework\Request\Request;

class UTMController extends Controller 
{
    // get Request utm Template
    public function getAllUTMTemplates() 
    {
        $data = (new UTMTemplate)->getTemplates();

        return $this->sendSuccess([
            'data' => $data,
            'message' => __('Get UTM Templates', 'exact-links')
        ]);
    }

    // get Request utm Template onchange
    public function getUTMTemplate(Request $request) 
    {
        $template = (new UTMTemplate)->isUTMTemplateSlug($request->get('slug'));

        return $this->sendSuccess([
            'data' => $template
        ]);
    }
    
    public function updateUTMTemplate(Request $request) 
    {
        $UTMTemplate =  (new UTMTemplate);
        $utmTemplateID = sanitize_title($request->get('utm_template_id'));
        $templateSlug  = sanitize_title($request->get('template_title'));

        $data = [
            'template_title'   => sanitize_text_field($request->get('template_title')),
            'template_slug'    => sanitize_title($request->get('template_title')),
            'utm_source'       => sanitize_text_field($request->get('utm_source')),
            'utm_medium'       => sanitize_text_field($request->get('utm_medium')),
            'utm_campaign'     => sanitize_text_field($request->get('utm_campaign')),
            'utm_term'         => sanitize_text_field($request->get('utm_term')),
            'utm_content'      => sanitize_text_field($request->get('utm_content')),
            'created_at'       => gmdate('Y-m-d H:i:s'),
            'updated_at'       => gmdate('Y-m-d H:i:s'),
        ];

        if ($utmTemplateID) {
            (new UTMTemplate)->updateTemplate($utmTemplateID, $data);

            $updateUTMTemplate = $UTMTemplate->getUTMTemplateByID($utmTemplateID);
           
            return $this->sendSuccess([
                'message' => __('Template successfully updated', 'exact-links'),
                "data" => $updateUTMTemplate
            ]);
        } 
        
        if ($UTMTemplate->isUTMTemplateSlug($templateSlug)) {
            return $this->sendError([
                'message' => __('The template title is already taken please change the template title', 'exact-links')
            ]);
        }
        
       $createdId = $UTMTemplate->insertGetId($data);

       $createdUTMTemplate = $UTMTemplate->getUTMTemplateByID($createdId);
    
       return $this->sendSuccess([
            'message' => __('Template successfully created', 'exact-links'),
            'data' => $createdUTMTemplate
        ]);
       
    }

    public function deleteUTMTemplate(Request $request) 
    {
        $deleteData = (new UTMTemplate)->deleteTemplate($request->get('utm_template_id'));

        return $this->sendSuccess([
            'deleted' => (bool) $deleteData,
            'message' => __('Template successfully deleted', 'exact-links')
        ], 200);
    }
   
}