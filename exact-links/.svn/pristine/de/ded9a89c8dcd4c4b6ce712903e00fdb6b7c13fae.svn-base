<?php

namespace ExactLinks\App\Models;

class SubDomain extends Model
{
    protected $table = 'exactlinks_sub_domain';

    public function getSubDomainByID($id)
    {  
       return $this->where('id', $id)->first();
    }
    
    public function getSubDomains() 
    {
        return $this->orderBy('id', 'DESC')->get();
    }

    public function isSubDomainSlug($slug)
    {   
        return $this->where('subdomain_slug', $slug)->first();
    }

    public function updateSubDomain($id, $data)
    {
      return $this->where('id', $id)->update($data);
    }

    public function deleteSubDomain($id)
    {
        return $this->where('id', $id)->delete();
    }
}

