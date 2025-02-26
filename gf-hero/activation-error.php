<?php

if ( ! defined( 'TGGH_ACTIVATE' ) ) {
    exit;
}

$plugins = get_plugins();

?>
<style>
    html, body {
        margin: 0; padding: 0;
        font-family: sans-serif;
        font-size: 13px;
        color: #444;
        border: 1px solid #dc3232;

    }

    div {
        display: flex;
        flex-direction: column;
        width: 100%;
        height: 100%;
        align-items: center;
        justify-content: center;
    }
    p {
        margin: 0;
        padding: 0;
    }

    a {
        color: #0073aa;
    }
</style>

<?php if ( $tggh_error === 'gf_not_present' ) { ?>
    <div>
        <p><?php esc_html_e( tggh__( 'Hero is a Gravity Forms add-on.' ) ) ?></p>
        <?php if ( empty( $plugins['gravityforms/gravityforms.php'] ) ) { ?>
            <p><?php echo sprintf( esc_html( tggh__(
                'Please install and activate %s before activating Hero.'
            ) ), '<a href="https://www.gravityforms.com">Gravity Forms</a>' ) . '</p>' ?></p>
        <?php } else { ?>
            <p><?php esc_html_e( tggh__(
                'Please activate Gravity Forms before activating Hero.'
            ) ) ?></p>
        <?php } ?>
    </div>
<?php } ?>

<?php if ( $tggh_error === 'gf_too_old' ) { ?>
    <div>
        <p><?php
            echo sprintf(
                esc_html( tggh__(
                    'Hero requires Gravity Forms version %s or above.'
                ) ),
                '<b>' . TGGH_MIN_GF_VERSION . '</b>'
            )
        ?></p>
        <p><?php
            esc_html_e( tggh__(
                'Please update Gravity Forms before activating Hero.'
            ) )
        ?></p>
    </div>
<?php } ?>

<?php

exit;
