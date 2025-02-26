<?php

namespace ExactLinks\App\Http\Controllers;

use ExactLinks\App\Models\SubDomain;
use ExactLinks\Framework\Request\Request;

class SubdomainController extends Controller 
{
    // get Request subdomains
    public function getAllSubdomains() 
    {
        $data = (new SubDomain)->getSubDomains();

        return $this->sendSuccess([
            'data' => $data,
            'message' => __('Get Subdomains', 'exact-links')
        ]);
    }
 
    // get Request subdomain onchange
    public function getSubdomain(Request $request) 
    {
        $subdomain = (new SubDomain)->isSubDomainSlug($request->get('slug'));

        return $this->sendSuccess([
            'data' => $subdomain
        ]);
    }

    public function updateSubdomain(Request $request) 
    {
        $SubDomain =  (new SubDomain);
        $subdomainID    = sanitize_title($request->get('subdomain_id'));
        $subdomainSlug  = sanitize_title($request->get('subdomain_name'));

        $data = [
            'subdomain_name'   => sanitize_text_field($request->get('subdomain_name')),
            'subdomain_slug'   => sanitize_title($request->get('subdomain_name')),
            'created_at'       => gmdate('Y-m-d H:i:s'),
            'updated_at'       => gmdate('Y-m-d H:i:s'),
        ];

        if ($subdomainID) {
            $SubDomain->updateSubDomain($subdomainID, $data);

            $updateSubDomain = $SubDomain->getSubDomainByID($subdomainID);
           
            return $this->sendSuccess([
                'message' => __('Subdomain successfully updated', 'exact-links'),
                "data" => $updateSubDomain
            ]);
        } 
        
        if ($SubDomain->isSubDomainSlug($subdomainSlug)) {
            return $this->sendError([
                'message' => __('The Subdomain name is already taken please change the subdomain name', 'exact-links')
            ]);
        }
        
       $createdId = $SubDomain->insertGetId($data);

       $createdSubDomain = $SubDomain->getSubDomainByID($createdId);
    
       return $this->sendSuccess([
            'message' => __('Subdomain successfully created', 'exact-links'),
            'data' => $createdSubDomain
        ]);
       
    }

    public function deleteSubdomain(Request $request) 
    {
       $deleteData = (new SubDomain)->deleteSubDomain($request->get('subdomain_id'));

        return $this->sendSuccess([
            'deleted' => (bool) $deleteData,
            'message' => __('Subdomain successfully deleted', 'exact-links')
        ], 200);
    }
}