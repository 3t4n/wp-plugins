<?php
class Evdpl_FAQ_Display {
    public function __construct() {
        $this->defaults = array(
            'p'                     => '',
            'order'                 => 'DESC',
            'orderby'               => 'date',
            'style'                 => 'accordion',
            'posts_per_page'        => -1,
            'nopaging'              => true,
            'category'                 => '',
            'exclude_category'         => '',
            'hide_category_title'      => false
        );
    }
    
    public function getdefaults() {
        return apply_filters( 'evdpl_faq_defaults', $this->defaults );
    }
    public function loop( $args, $echo = false ) {
      
        $args = wp_parse_args( $args, $this->getdefaults() );
        
        $exclude = $args[ 'exclude_category' ];
        $html = '';
        $terms = get_terms( 'faq-category' );
        if ( ! empty( $terms ) && empty( $args['p'] ) ) {
            foreach ( $terms as $term ) {
                $category = $args['category'];
                if ( isset( $category ) && $category != '' && $term->slug != $category )
                    continue;
                $query_args = array(
                    'post_type'         => 'faq',
                    'order'             => $args['order'],
                    'orderby'           => $args['orderby'],
                    'posts_per_page'    => $args['posts_per_page'],
                    'tax_query'         => array(
                        array(
                            'taxonomy'  => 'faq-category',
                            'field'     => 'slug',
                            'terms'     => array( $term->slug ),
                            'operator'  => 'IN'
                        )
                    )
                );
                $q = new WP_Query( $query_args );
                if ( $q->have_posts() ) {
                    if( !( $exclude == $term->slug ) ) {
                       if ( ! $args['hide_category_title'] )
                            $html .= '<h3 id="faq-' . $term->slug . '" class="evdpl-faq-term-title evdpl-faq-term-' . $term->slug . '">' . $term->name . '</h3>';
                        if ( $term->description )
                            $html .= '<p class="evdpl-faq-term-description">' . $term->description . '</p>';
                        $html .= '<div class="evdpl-faq-accordion-wrap">';
                        while ( $q->have_posts() ) : $q->the_post();
                            $html .= $this->evdpl_accordion_output();   
                        endwhile;
                            $html .= '</div>';
                    }
                } 
                wp_reset_postdata();
            } 
        }
        else { 
            $q = new WP_Query( array(
                'post_type'         => 'faq',
                'p'                 => $args['p'],
                'order'             => $args['order'],
                'orderby'           => $args['orderby'],
                'posts_per_page'    => $args['posts_per_page']
            ) );
            if ( $q->have_posts() ) {
                $html .= '<div class="evdpl-faq-accordion-wrap">';
                while ( $q->have_posts() ) : $q->the_post();
                    $html .= $this->evdpl_accordion_output();        
                endwhile;
                    $html .= '</div>';
            } 
            wp_reset_postdata();
        }
        $html = apply_filters( 'evdpl_faq_return', $html, $args );
        if ( $echo === true )
            echo $html;
        else
            return $html;
    }
    private function evdpl_accordion_output( $echo = false ) {
        $html = '';
        $link = 'faq-' . sanitize_html_class( get_the_title() );
        $html .= '<div id="faq-' . get_the_id() . '" class="evdpl-faq-accordion-title">';
        $html .= get_the_title() . '</div>';
        $html .= '<div id="' . $link . '" class="evdpl-faq-accordion-content">' . apply_filters( 'the_content', get_the_content() );
        $html .= '</div>';
        $html = apply_filters( 'evdpl_faq_accordion_output', $html );
        if ( $echo === true )
            echo $html;
        else
            return $html;
    }
}
