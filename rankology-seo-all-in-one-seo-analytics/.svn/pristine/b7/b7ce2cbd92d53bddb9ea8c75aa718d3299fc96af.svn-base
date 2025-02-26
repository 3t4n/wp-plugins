<?php

namespace RankologyFno\Actions\Admin;

defined('ABSPATH') or exit('Cheatin&#8217; uh?');

use Rankology\Core\Hooks\ExecuteHooks;

class SaveSignificantKeywords implements ExecuteHooks
{
    /**
     *
     * @return void
     */
    public function hooks()
    {
        add_action('save_post', [$this, 'save'], 10, 2);
        add_action( 'delete_post',[$this, 'delete']);
    }

    /**
     * @return void
     */
    public function save($id, $post)
    {

        // Disable content analysis
        if(rankology_get_service('AdvancedOption')->getAppearanceCaMetaboxe()){
            return;
        }

        $postTypes = rankology_get_service('WordPressData')->getPostTypes();

        $canSave = true;
        if(wp_is_post_revision($id)){
            $canSave = false;
        }

        if($post->post_status !== 'publish'){
            $canSave = false;
        }

        if(!in_array($post->post_type, array_keys($postTypes))){
            $canSave = false;
        }

        if(!\property_exists($post, 'post_content')){
            $canSave = false;
        }

        if(!$canSave){
            return;
        }

        $content = rankology_fno_get_service('SignificantKeywords')->getFullContentByPost($post);
        $keywords = rankology_fno_get_service('SignificantKeywords')->retrieveSignificantKeywords($content);
        $data = rankology_fno_get_service('SignificantKeywords')->prepareWordsToInsert($keywords, $id, $content);


        rankology_fno_get_service('SignificantKeywordsRepository')->removeSignificantKeywordsByPostId($id);
        if (!empty($data)) {
            rankology_fno_get_service('SignificantKeywordsRepository')->insertSignificantKeywords($data);
        }
    }

    public function delete($id){
        rankology_fno_get_service('SignificantKeywordsRepository')->removeSignificantKeywordsByPostId($id);
    }
}
