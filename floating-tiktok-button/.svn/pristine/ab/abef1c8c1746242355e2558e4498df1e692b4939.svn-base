<!-- Floating TikTok Button -->
<a 
    href="https://tiktok.com/@<?php 
echo esc_html( $option->val( 'tiktok_id' ) );
?>" class="ftb-button" target="_blank">

    <?php 
?>

    <?php 
if ( ftb__fs()->can_use_premium_code__premium_only() && $option::check( 'enable_button' ) ) {
    if ( $option::get( 'enable_button' ) === "button" ) {
        ?>

        <img src="<?php 
        echo esc_html( $option->val( 'icon_url' ) );
        ?>" class="ftb-icon" alt="<?php 
        echo esc_html( $option->val( 'button_text', "" ) );
        ?>"/>
    
    <?php 
    }
} else {
    if ( $option::check( 'enable_button' ) ) {
        ?>

        <img src="<?php 
        echo esc_html( $option->val( 'icon_url' ) );
        ?>" class="ftb-icon" alt="<?php 
        echo esc_html( $option->val( 'button_text', "" ) );
        ?>"/>
    
    <?php 
    }
}
if ( ftb__fs()->can_use_premium_code__premium_only() && $option::check( 'enable_button' ) ) {
    if ( $option::get( 'enable_button' ) == "qrcode" ) {
        ?>

            <div id="qrcode" class="ftb-qrcode"></div>

        <?php 
    } elseif ( $option::get( 'enable_button' ) == "both" ) {
        ?>
    
        <div id="qrcode" class="ftb-qrcode" style="<?php 
        if ( $option::check( 'button_position' ) ) {
            switch ( $option::get( 'button_position' ) ) {
                case $option::get( 'button_position' ) == 'bottom_right':
                    echo "left:0;";
                    break;
                case $option::get( 'button_position' ) == 'bottom_left':
                    echo "right:0;";
                    break;
                case $option::get( 'button_position' ) == 'top_right':
                    echo "left:0;";
                    break;
                case $option::get( 'button_position' ) == 'top_left':
                    echo "right:0;";
                    break;
            }
        }
        ?>"></div>
    
    <?php 
    }
}
?>

</a>

    