<html>
    <head>
        <title><?php _e( 'Table Preview', 'ap-pricing-tables-lite' ); ?></title>
        <?php wp_head(); ?>
        <style>
            body:before{display:none !important;}
            body:after{display:none !important;}
            body{background:#F1F1F1 !important;}
            .appts-preview-title-wrap {
                height: 80px;
                text-align: center;
            }

            .appts-preview-note {
                text-align: center;
                margin-top: 38px;
                font-size: 20px;
            }

            .appts-preview-title {
                background-color: white;
                width: 200px;
                margin: 20 auto;
                box-shadow: 0 0 2px #222;
                height: 70px;
                padding: 20px 0;
                font-weight: bold;
            }

            .appts-form-preview-wrap {
                width: 80%;
                margin: 50px auto;
                background: white;
                padding: 40px;
            }
        </style>
    </head>
    <body>
        <div class="appts-preview-title-wrap">
            <div class="appts-preview-title"><?php _e( 'Preview Mode', 'ap-pricing-tables-lite' ); ?></div>
        </div>
        <div class="appts-preview-note"><?php _e( 'This is just the basic preview and it may look different when used in frontend as per your theme\'s styles.', 'ap-pricing-tables-lite' ); ?></div>
        <div class="appts-form-preview-wrap">
            <?php
            $s_id = sanitize_text_field( $_GET[ 'appts_sid' ] );
            echo do_shortcode( '[appts_pricing_table sid="' . $s_id . '"]' );
            ?>
        </div>
    </body>
</html>

