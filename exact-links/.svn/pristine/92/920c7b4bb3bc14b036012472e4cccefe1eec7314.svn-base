<?php

namespace ExactLinks\App\Models;

class UTMTemplate extends Model
{
    protected $table = 'exactlinks_utm_template';

    public function getUTMTemplateByID($id)
    {  
       return $this->where('id', $id)->first();
    }
    
    public function getTemplates() 
    {
        return $this->orderBy('id', 'DESC')->get();
    }

    public function isUTMTemplateSlug($slug)
    {   
        return $this->where('template_slug', $slug)->first();
    }

    public function updateTemplate($id, $data)
    {
      return $this->where('id', $id)->update($data);
    }

    public function deleteTemplate($id)
    {
        return $this->where('id', $id)->delete();
    }
}

