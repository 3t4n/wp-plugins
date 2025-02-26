<?php

namespace Level_Wp\Affiliate_Advantage\Controllers;

use  Level_Wp\Affiliate_Advantage\Helpers\View ;
use  Level_Wp\Affiliate_Advantage\Models\Affiliate_Link ;
use  Level_Wp\Affiliate_Advantage\Models\Click ;
use  Level_Wp\Affiliate_Advantage\Plugin ;
class Affiliate_Links_Controller extends Base_Controller
{
    /**
     *
     * @since 1.0.0
     */
    public function redirect()
    {
        if ( get_post_type() != Plugin::get_instance()->cpt ) {
            return;
        }
        if ( !get_queried_object() ) {
            return;
        }
        $link = new Affiliate_Link( get_queried_object()->ID );
        
        if ( $link->get( 'password' ) ) {
            $link_id = $link->id;
            View::render( 'links.password', compact( 'link_id' ) );
            die;
        }
        
        $this->do_redirect( $link );
    }
    
    public function display_columns()
    {
        $columns = array(
            'cb'         => '<input type="checkbox">',
            'id'         => 'Link ID',
            'banner'     => 'Banner Image',
            'title'      => 'Title',
            'share'      => 'Share',
            'link'       => 'Original URL',
            'short_link' => 'Short Link (Click to Copy)',
            'clicks'     => 'Clicks',
            'date'       => 'Date',
        );
        if ( Plugin::get_instance()->has_valid_licence() ) {
            $columns = array_slice(
                $columns,
                0,
                6,
                true
            ) + array(
                'taxonomy-' . Plugin::get_instance()->cpt . '_group' => 'Link Groups',
            ) + array_slice(
                $columns,
                6,
                count( $columns ) - 6,
                true
            );
        }
        if ( !Plugin::get_instance()->has_valid_licence() ) {
            $columns = array_slice(
                $columns,
                0,
                6,
                true
            ) + array(
                'link_group' => 'Link Groups',
            ) + array_slice(
                $columns,
                6,
                count( $columns ) - 6,
                true
            );
        }
        return $columns;
    }
    
    public function displayColumnsData( $column, $link_id )
    {
        $link = new Affiliate_Link( $link_id );
        switch ( $column ) {
            case 'id':
                echo  esc_html( $link->id ) ;
                break;
            case 'link':
                echo  esc_html( $link->get( 'link_url' ) ) ;
                break;
            case 'clicks':
                echo  wp_kses_post( '<a href="/wp-admin/edit.php?post_type=' . Plugin::get_instance()->cpt . '&page=stats&type=link&link=' . $link_id . '">' . count( $link->clicks ) . '</a>' ) ;
                break;
            case 'share':
                $this->display_share_column_data( $link );
                break;
            case 'link_group':
                echo  wp_kses_post( '<a href="' . admin_url( 'edit.php?post_type=affiliate_link&billing_cycle=annual&page=affiliate-advantage-pricing' ) . '">Upgrade to Premium version</a>' ) ;
                break;
            case 'short_link':
                echo  wp_kses_post( '<a href="#" class="affiliate-advantage-copy">' . $link->permalink . '</a>' ) ;
                break;
            case 'banner':
                echo  wp_kses_post( '<img src="' . $link->banner . '" width="100">' ) ;
                break;
        }
    }
    
    public function display_share_column_data( $link )
    {
        
        if ( Plugin::get_instance()->has_valid_licence() ) {
            echo  wp_kses_post( '<!-- AddToAny BEGIN -->
					<div class="a2a_kit a2a_kit_size_32 a2a_default_style" data-a2a-url="' . $link->permalink . '">
					<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
					<a class="a2a_button_facebook"></a>
					<a class="a2a_button_twitter"></a>
					<a class="a2a_button_email"></a>
					</div>
					<script async src="https://static.addtoany.com/menu/page.js"></script>
					<!-- AddToAny END -->' ) ;
        } else {
            echo  wp_kses_post( '<a href="' . admin_url( 'edit.php?post_type=affiliate_link&billing_cycle=annual&page=affiliate-advantage-pricing' ) . '">Upgrade to Premium version</a>' ) ;
        }
    
    }
    
    public function sortColumns( $columns )
    {
        $columns['clicks'] = 'clicks';
        $columns['id'] = 'id';
        return $columns;
    }
    
    public function do_redirect( $link )
    {
        $redirect_to = $link->get( 'link_url' );
        
        if ( $link->get( 'forward_parameters' ) == '1' ) {
            $query_parameters = explode( '?', sanitize_text_field( $_SERVER['REQUEST_URI'] ) );
            $redirect_to = $redirect_to . '?' . $query_parameters[1];
        }
        
        $redirection_type = $link->get( 'redirection_type' );
        ( new Clicks_Controller() )->record( $link->id );
        wp_redirect( $redirect_to, $redirection_type );
        exit;
    }
    
    public function remove_slug( $post_link, $post, $leavename )
    {
        if ( Plugin::get_instance()->cpt != $post->post_type || 'publish' != $post->post_status ) {
            return $post_link;
        }
        $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
        return $post_link;
    }
    
    public function parse_request( $query )
    {
        if ( !$query->is_main_query() || 2 != count( $query->query ) || !isset( $query->query['page'] ) ) {
            return;
        }
        
        if ( !empty($query->query['name']) ) {
            $query->set( 'post_type', array( 'post', 'bit_links', 'page' ) );
        } elseif ( !empty($query->query['pagename']) && false === strpos( $query->query['pagename'], '/' ) ) {
            $query->set( 'post_type', array( 'post', 'bit_links', 'page' ) );
            // We also need to set the name query var since redirect_guess_404_permalink() relies on it.
            $query->set( 'name', $query->query['pagename'] );
        }
    
    }

}