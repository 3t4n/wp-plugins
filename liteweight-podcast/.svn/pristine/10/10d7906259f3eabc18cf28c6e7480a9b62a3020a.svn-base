<?php
namespace PDP\Model;

class ImportData{

    public static function importMeta(){
        $podcasts = self::createBlock();
        foreach($podcasts as $podcast){
            $content_post = get_post($podcast['ID']);
            $content = $content_post->post_content;
            if($content == ''){
                wp_update_post($podcast);
            }
        }
    }

    public static function createBlock(){
        $query = new \WP_Query(array(
            'post_type' => 'podcast',
            'post_status' => 'any',
            'posts_per_page' => -1
        ));

        $output = [];
        while($query->have_posts()): $query->the_post();
            $id = \get_the_ID();
            $shares = [
                '_pdp_facebook' => 'facebook',
                '_pdp_twitter' => 'twitter',
                '_pdp_linkedin' => 'linkedin',
                '_pdp_pinterest' => 'pinterest',
                '_pdp_stumbleupon' => 'stumbleupon',
                '_pdp_whatsapp' => 'whatsapp',
                '_pdp_email' => 'email',
            ];
            $newShares = [];
            foreach($shares as $key => $value){
                if(get_post_meta($id, $key, true) != 'on'){
                    array_push($newShares, $value);
                }
            }
    
            //podcasts
            $podcasts = get_post_meta($id, '_pdp_re_', true);
            $newPodcasts = [];
            if(is_array($podcasts)){
                foreach($podcasts as $podcast){
                    array_push($newPodcasts, [
                        'title' => $podcast['_pdp_title'] != '' ? $podcast['_pdp_title'] : 'title',
                        'audio' => $podcast['_pdp_audio']['url'] ?? '',
                        'image' => $podcast['_pdp_image']['url'] ?? ''
                    ]);
                }
            }
            
            //controls 
            $controls = [
                'play' => true,
                'progress' => true,
                'current-time' => true,
                'mute' => true,
                'volume' => true,
                'settings' => get_post_meta($id, '_pdp_setting_button', true) !== 'on' ? true : false,
                'download' => get_post_meta($id, '_pdp_download_button', true) !== 'on' ? true : false
            ];
    
            $output[] = [
                'ID' => $id,
                'post_content' => '<!-- wp:pdp/podcast '.json_encode([
                    'podcasts' => $newPodcasts, 
                    'shares' => $newShares,
                    'controls' => $controls,
                    'theme' => get_post_meta($id, '_pdp_player_theme', true) == 'dark' ? 'dark' : 'light',
                    'featureImage' => get_post_meta($id, '_pdp_disable_image', true) == 'on' ? false : true,
                    'loop' => get_post_meta($id, '_pdp_audio_repeat', true) == 'once' ? false : true,
                    'showLabel' => get_post_meta($id, '_pdp_social_label', true) == 'on' ? true : false,
                    'showCount' => get_post_meta($id, '_pdp_social_count', true) == 'on' ? true : false,
                    'share' => get_post_meta($id, '_pdp_disable_social', true) == 'on' ? false : true,
                ]).' /-->'
            ];
        endwhile;
        return $output;
    }
}