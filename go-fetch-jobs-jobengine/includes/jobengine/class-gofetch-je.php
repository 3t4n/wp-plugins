<?php

/**
 * Specific frontend code for JobEngine.
 *
 * @package GoFetch/JobEngine
 */
global  $gofetch_je_frontend ;
class GoFetch_JobEngine_Frontend
{
    public function __construct()
    {
        add_filter( 'the_content', array( $this, 'append_external_url' ), 10 );
        add_filter( 'the_content', array( $this, 'append_source' ), 11 );
    }
    
    /**
     * Append the job details external URL to the post content.
     */
    public function append_external_url( $content )
    {
        global  $post ;
        if ( !$post || !is_single() ) {
            return $content;
        }
        $append_external_url = is_user_logged_in();
        if ( !apply_filters( 'goft_je_append_external_url', $append_external_url ) || !($is_external = get_post_meta( $post->ID, '_goft_je_is_external', true )) ) {
            return $content;
        }
        // Skip earlier if the content already contains the '[...]' with the external url.
        if ( false !== stripos( $content, '[&#8230;]' ) ) {
            return $content;
        }
        $source_data = get_post_meta( $post->ID, '_goft_source_data', true );
        $link = get_post_meta( $post->ID, '_goft_external_link', true );
        $link = GoFetch_JobEngine_Importer::add_query_args( $source_data, $link );
        // If the content is wrapped in <p> tags make sure the <a> is added inside it.
        $content_inline = ( '/p>' === trim( substr( $content, -4 ) ) ? substr( $content, 0, -5 ) : $content );
        $content = sprintf( '%1$s <a class="goftj-exernal-link" href="%2$s">[...]</a>', $content_inline, esc_url( $link ) ) . '</p>';
        return $content;
    }
    
    /**
     * Append the source job URL to the post content.
     */
    public function append_source( $content )
    {
        global  $post ;
        if ( !$post || !is_single() ) {
            return $content;
        }
        if ( !apply_filters( 'goft_je_append_source_data', true ) || !($is_external = get_post_meta( $post->ID, '_goft_je_is_external', true )) ) {
            return $content;
        }
        $source_data = get_post_meta( $post->ID, '_goft_source_data', true );
        if ( empty($source_data['name']) || empty($source_data['website']) ) {
            return $content;
        }
        ?>
	<style type="text/css">
		.entry-content a.goftj-logo-exernal-link {
			box-shadow: none;
		}
		.goftj-source-logo {
			height: 32px;
		}
		.goftj-logo-exernal-link {
			display: -webkit-inline-box;
		}
	</style>

<?php 
        $link = GoFetch_JobEngine_Importer::add_query_args( $source_data, $source_data['website'] );
        
        if ( !empty($source_data['logo']) ) {
            $source = html( 'img class="goftj-source-logo"', array(
                'src'   => esc_url( $source_data['logo'] ),
                'rel'   => 'nofollow',
                'title' => esc_attr( $source_data['name'] ),
            ), '&nbsp;' );
        } else {
            $source = html( 'span class="goftj-source"', $source_data['name'] );
        }
        
        if ( $link ) {
            $source = html( 'a', array(
                'class' => 'goftj-logo-exernal-link',
                'rel'   => 'nofollow',
                'href'  => esc_url( $link ),
                'title' => esc_attr( $source_data['name'] ),
            ), $source );
        }
        $source = sprintf( html( 'p', sprintf( __( '<em class="goft-source">%1$s</em> %2$s', 'gofetch-je' ), __( 'Source:', 'gofetch-je' ), $source ) ) );
        return $content . $source;
    }

}
$gofetch_je_frontend = new GoFetch_JobEngine_Frontend();