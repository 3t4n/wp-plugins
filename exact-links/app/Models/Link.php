<?php

namespace ExactLinks\App\Models;

use ExactLinks\App\Models\LinkAnalytics;
use ExactLinks\App\Models\ConversionItems;

class Link extends Model
{
    protected $table = 'exactlinks_links';

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($model) {
            $model->children()->get()->each(function($model) {
                $model->delete();
            });

            $model->analytics()->get()->each(function($model) {
                $model->delete();
            });

            $model->conversionItems()->get()->each(function($model) {
                $model->delete();
            });
        });
    }

    public function children()
    {
        return $this->hasMany(__CLASS__, 'parent_id');
    }

    public function analytics()
    {   
        return $this->hasMany(LinkAnalytics::class, 'link_id');
    }

    public function conversionItems(){
        return $this->hasMany(ConversionItems::class, 'link_id');
    }


    public function getLink($linkId)
    {  
        $link = $this->whereNull('parent_id')->find($linkId);
     
        if(!$link) {
            return;
        }

        if ($link->type == 'choice_pages') {
            $link->choice_links = $this->getChoiceLinks($linkId);
        } elseif ($link->type == 'ab_pages') {
            $link->ab_links = $this->getAbLinks($linkId);
        }

        if ($link->tags != NULL) {
            $link->tags  = maybe_unserialize($link['tags']);
        } 
        
        if ($link->settings != NULL) {
            $link->settings = maybe_unserialize($link['settings']);
        }
        
        return $link;
    }

    public function getChoiceLinks($linkId)
    {
        return $this
            ->select(['id', 'target_url', 'slug', 'target_domain', 'button_text'])
            ->where('parent_id', $linkId)
            ->where('type', 'choice_links')
            ->orderBy('priority', 'ASC')
            ->get();
    }

    public function getAbLinks($linkId)
    {
        return $this
            ->select(['id', 'target_url', 'slug', 'priority'])
            ->where('parent_id', $linkId)
            ->where('type', 'ab_links')
            ->orderBy('id', 'ASC')
            ->get();
    }


    public function getDomainByUrl($url)
    {
        $parse = parse_url($url);

        if (isset($parse['host'])) {
           return $parse['host'];
        }
        
        return "";
    }

    /**
     * Is slug available or not
    */
    public function isSlugAvailable($slug, $id = '')
    {
        // first check if it's taken by this plugin
        $isTaken = $this->where('slug', $slug)->where('id', '!=', $id)->first();

        if ($isTaken) {
            return false;
        }
        
        return true;
        // @todo: We may check for posts/page too for this
    }


    /**
     * checking slug  
    */

    public function isSlug($slug)
    {
        return $this->where('slug', $slug)->first();
    }

    
    /**
     *  checking goal url 
    */

    public function isGoalURL($slug, $targetURL, $goalURL)
    {
        return $this->where('slug', $slug)
                    ->where('target_url', $targetURL)
                    ->where('goal_url', $goalURL)
                    ->first();
    }



    public function deleteUnusedChilds($parentId, $activeChilds)
    {   
        return $this->where('parent_id', $parentId)
                ->whereNotIn('id', $activeChilds)
                ->delete();
    }
    

    public function getSlug($id)
    {
        return $this->where('id', $id)->first();
    }
}
