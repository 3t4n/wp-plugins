<style id='floating-tiktok-button-css'>
    .ftb-button { position:fixed;text-align:center;z-index:100;line-height:100%;<?php 
if ( $option::check( 'button_position' ) ) {
    switch ( $option::get( 'button_position' ) ) {
        case $option::get( 'button_position' ) == 'bottom_right':
            echo "bottom:0;right:0;";
            break;
        case $option::get( 'button_position' ) == 'bottom_left':
            echo "bottom:0;left:0;";
            break;
        case $option::get( 'button_position' ) == 'top_right':
            echo "top:0;right:0;";
            break;
        case $option::get( 'button_position' ) == 'top_left':
            echo "top:0;left:0;";
            break;
    }
}
echo esc_html( $option->css(
    'margin_top',
    'margin-top',
    ( $option->check( 'margin_top' ) ? $option->get( 'margin_top' ) : '0' ),
    "px"
) );
echo esc_html( $option->css(
    'margin_right',
    'margin-right',
    ( $option->check( 'margin_right' ) ? $option->get( 'margin_right' ) : '0' ),
    "px"
) );
echo esc_html( $option->css(
    'margin_bottom',
    'margin-bottom',
    ( $option->check( 'margin_bottom' ) ? $option->get( 'margin_bottom' ) : '0' ),
    "px"
) );
echo esc_html( $option->css(
    'margin_left',
    'margin-left',
    ( $option->check( 'margin_left' ) ? $option->get( 'margin_left' ) : '0' ),
    "px"
) );
echo "background-color:transparent;border:0px solid;border-color:#ccc;color:#555;font-size:10px;padding:5px;border-radius:5px;text-decoration:none;";
?>
    }
    .ftb-button .ftb-icon { display:block;line-height:100%;margin:auto; <?php 
echo "margin:0 auto 5px;width:50px;height:50px;border-radius:50px;";
?> }

    .ftb-button span { display:block;line-height:100%; <?php 
?> }

    <?php 
?>
    
        <?php 
if ( $option->check( 'devices' ) && $option->get( 'devices' ) == "desktop" ) {
    ?>
            @media screen and (max-width: 800px) {
                .ftb-button {
                    display: none;
                }
            }
    <?php 
}
?>


    <?php 
if ( ftb__fs()->can_use_premium_code__premium_only() && $option->check( 'devices' ) && $option->get( 'devices' ) == "mobile" ) {
    ?>
        @media screen and (min-width: 800px) {
            .ftb-button {
                display: none;
            }
        }
    <?php 
}
?>
    
</style>