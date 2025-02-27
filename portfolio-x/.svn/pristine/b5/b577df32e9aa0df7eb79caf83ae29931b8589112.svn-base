<?php

//Register ShortCode
add_shortcode('portfolio-x-showcase', 'qcld_portfolio_showcase_sc');

//Get All portfolio
function qcld_portfolio_showcase_sc( $atts = array() )
{
    
    ob_start();

    qcld_show_showcase_sc( $atts );

    $content = ob_get_clean();

    return $content;

}

function qcld_show_showcase_sc( $atts = array() )
{

    //Defaults & Set Parameters
    extract( shortcode_atts(
        array(
            'orderby' => '',
            'order' => '',
            'template' => 'style-01',
            'limit' => '5',
            'portfolio' => '',
        ), $atts
    ));
    //$paged = intval(get_query_var('page')) ? get_query_var('page') : 1;
    $paged = isset($_GET['portfolio_page']) && intval( $_GET['portfolio_page'] > 0 ) ? $_GET['portfolio_page'] : 1;

    $qVars = array(
        'orderby' => $orderby, 
        'order' => $order, 
        'post_type' => 'portfolio-x', 
        'posts_per_page' => $limit, 
        'paged' => $paged,
        'post_status' => 'publish', 
    );
    
    $portfolio = new WP_Query( $qVars );

    //Check if the supplied portfolio ID is Valid
    if ( $portfolio->have_posts() ) 
    {

        require( PORTFOLIO_THEMES_DIR . "/showcase/" . $template . "/index.php" );

    }
    else
    {
        _e("No portfolio items was found.", 'portfolio-x');
    }

}
