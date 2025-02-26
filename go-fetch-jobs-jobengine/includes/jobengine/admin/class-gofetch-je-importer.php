<?php

/**
 * Specific import code for JobEngine.
 *
 * @package GoFetch/JobEngine
 */
class GoFetch_JobEngine_Specific_Import extends GoFetch_JobEngine_Importer
{
    public function __construct()
    {
        add_filter(
            'goft_je_item_meta_value',
            array( $this, 'prepare_meta' ),
            10,
            5
        );
        add_filter(
            'goft_je_post',
            array( $this, 'maybe_create_author' ),
            10,
            3
        );
        add_filter(
            'goft_je_after_insert_job',
            array( $this, 'attach_company_logo' ),
            10,
            3
        );
    }
    
    /**
     * Retrieves the custom meta fields/known fields key/value pair mappings.
     */
    public static function meta_mappings()
    {
        $mappings = array(
            'display_name'     => 'company',
            'company_logo'     => 'logo',
            'et_location'      => 'location',
            'et_full_location' => 'location',
            'et_location_lat'  => 'latitude',
            'et_location_lng'  => 'longitude',
        );
        return $mappings;
    }
    
    /**
     * Replaces string placeholders with valid data on a given meta key.
     */
    public function prepare_meta(
        $meta_value,
        $meta_key,
        $item,
        $post_id,
        $params
    )
    {
        switch ( $meta_key ) {
            case 'et_applicant_detail':
                // Placeholder variables that can be used to dynamically fill in the 'Apply To' meta value.
                $find = array( '/%external_apply_to_url%/i' );
                // Replace the placeholder link with the final link.
                $replace = self::add_query_args( $params, $item['link'] );
                $meta_value = preg_replace( $find, (array) $replace, $meta_value );
                // Manually set the apply method meta key to 'description'.
                update_post_meta( $post_id, 'et_apply_method', 'ishowtoapply' );
                break;
            case 'et_location':
            case 'et_location_lat':
            case 'et_location_lng':
                // Override the default location, if location is provided by the RSS feed.
                
                if ( !empty($item['location']) ) {
                    if ( 'et_location' === $meta_key ) {
                        $meta_value = esc_attr( $item['location'] );
                    }
                    if ( 'et_location_lat' === $meta_key ) {
                        
                        if ( !empty($item['latitude']) ) {
                            $meta_value = esc_attr( $item['latitude'] );
                        } else {
                            $meta_value = '';
                        }
                    
                    }
                    if ( 'et_location_lng' === $meta_key ) {
                        
                        if ( !empty($item['latitude']) ) {
                            $meta_value = esc_attr( $item['latitude'] );
                        } else {
                            $meta_value = '';
                        }
                    
                    }
                }
                
                break;
        }
        return $meta_value;
    }
    
    /**
     * Creates a new user with role 'Company' on the database if the post author does not exist.
     */
    public function maybe_create_author( $post_arr, $item, $params )
    {
        // If the option to add new companies to the DB is not checked, skip this.
        if ( empty($params['add_new_companies']) ) {
            return $post_arr;
        }
        // Prioritize the company name from the RSS feed, if exists.
        
        if ( !empty($item['company']) ) {
            $company_slug = sanitize_title( $item['company'] );
            $userdata = array(
                'display_name' => $item['company'],
                'user_pass'    => null,
            );
        } elseif ( !empty($params['usermeta']['display_name']) ) {
            $company_slug = sanitize_title( $params['usermeta']['display_name'] );
            $userdata = $params['usermeta'];
        }
        
        
        if ( !empty($company_slug) ) {
            $user = get_user_by( 'slug', $company_slug );
            
            if ( !$user ) {
                $userdata['role'] = 'company';
                $userdata['user_login'] = $company_slug;
                $userdata = array_map( 'wp_strip_all_tags', $userdata );
                $user_id = wp_insert_user( $userdata );
                if ( is_wp_error( $user_id ) ) {
                    return $post_arr;
                }
                $post_arr['post_author'] = $user_id;
            } else {
                $post_arr['post_author'] = $user->ID;
            }
        
        }
        
        return $post_arr;
    }
    
    /**
     * Attach a company logo to an existing post author.
     */
    public function attach_company_logo( $post_id, $item, $params )
    {
        $post = get_post( $post_id );
        // Assign a logo to this author if applicable.
        
        if ( !empty($item['logo']) ) {
            $logo = $item['logo'];
        } elseif ( !empty($params['usermeta']['company_logo']) ) {
            $logo = $params['usermeta']['company_logo'];
        }
        
        
        if ( !empty($logo) ) {
            $logo = array( $logo );
            $et_user_logo = array(
                'company-logo' => $logo,
                'small_thumb'  => $logo,
                'thumbnail'    => $logo,
                'attach_id'    => 0,
            );
            update_user_meta( $post->post_author, 'et_user_logo', $et_user_logo );
        }
    
    }

}
new GoFetch_JobEngine_Specific_Import();