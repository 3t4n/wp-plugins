<?php

/**
 * @var array $files
 */
?>
<div class="icon-select-window-background">
    <div class="icon-select-window">
        <?php 
?>
        <h2><?php 
esc_html_e( 'Choose SVG from those available:', 'da-reactions' );
?></h2>
        <a href="javascript:" class="close">
            <img alt="Unchecked"
                 src="<?php 
echo esc_url( DA_REACTIONS_URL );
?>assets/dist/close.svg"
                 width="64">
        </a>
        <div class="icon-list">
            <?php 
foreach ( $files as $dir => $file ) {
    ?>
                <?php 
    if ( is_array( $file ) ) {
        ?>
                    <?php 
        foreach ( $file as $sub_file ) {
            ?>
                        <div class="icon">
                            <img alt="<?php 
            echo esc_attr( $sub_file );
            ?> icon"
                                 src="<?php 
            echo esc_url( DA_REACTIONS_URL );
            ?>assets/icons/svg/<?php 
            echo esc_attr( $dir );
            ?>/<?php 
            echo esc_attr( $sub_file );
            ?>"
                                 width="64"/>
                        </div>
                    <?php 
        }
        ?>
                <?php 
    } else {
        ?>
                    <div class="icon">
                        <img alt="<?php 
        echo esc_attr( $file );
        ?> icon"
                             src="<?php 
        echo esc_url( DA_REACTIONS_URL );
        ?>assets/icons/svg/<?php 
        echo esc_attr( $file );
        ?>"
                             width="64"/>
                    </div>
                <?php 
    }
    ?>
            <?php 
}
?>
        </div>
    </div>
</div>
