<?php
$is_woocommerce_connected = ! class_exists( 'WooCommerce' ) || datapocket_is_connected( true );
$is_wordpress_connected   = datapocket_is_connected();
$problem_count            = count( array_filter( array( ! is_ssl(), ! $is_woocommerce_connected || ! $is_wordpress_connected  ) ) );
?>

<div class="container ms-0 p-5">
    <div class="row">
        <div class="col-12 col-lg-7">
            <img src="<?php echo esc_url( datapocket()->plugin_url() . '/assets/img/logo.svg' ); ?>">
        </div>
        <div class="col-12 col-lg-5 text-center">
            <h3 class="fs-5 fw-bold mb-0"><?php esc_html_e( 'Connect and design on', 'datapocket' ); ?></h3>
            <img
                src="<?php echo esc_url( datapocket()->plugin_url() . '/assets/img/supported-platforms.svg' ); ?>"
                class="mt-4"
            >
        </div>
    </div>
    <div class="row mt-4 g-5">
        <div class="col-12 col-lg-7">
            <div class="border-bottom p-2">
                <h1 class="fs-3"><?php esc_html_e( 'Design with your data', 'datapocket' ); ?></h1>
                <h2 class="fs-5 fw-normal"><?php esc_html_e( 'Connect your blog or store catalogue with your chosen design platforms.', 'datapocket' ); ?></h2>
            </div>

            <?php if ( ! is_ssl() || ! $is_woocommerce_connected || ! $is_wordpress_connected ) : ?>
                <section class="mt-4">
                    <h3 class="fs-5 p-3 d-flex gap-3 align-items-center">
                        <img src="<?php echo esc_url( datapocket()->plugin_url() . '/assets/img/error.svg' ); ?>">
                        <?php esc_html_e( 'Problems', 'datapocket' ); ?> (<?php echo esc_html( $problem_count ); ?>)

                        <a
                            href="https://help.datapocket.app/en/articles/9414407"
                            target="_blank"
                            class="datapocket-btn bg-transparent border border-1 border-dark rounded px-2 ms-auto d-block py-2 text-decoration-none text-black fw-normal fs-6 lh-base me-3"
                        >
                            <?php esc_html_e( 'Help me', 'datapocket' ); ?>
                        </a>
                    </h3>

                    <div class="p-3 border shadow-sm">
                        <p><?php esc_html_e( 'We have detected the following issues that affect the connection.', 'datapocket' ); ?></p>
                        
                        <?php if ( ! is_ssl() ) : ?>
                            <div class="d-flex shadow-sm p-3 gap-2 mt-2 border-start border-5 border-danger align-items-center">
                                <div>
                                    <span class="d-block fw-semibold"><?php esc_html_e( 'HTTPS Required', 'datapocket' ); ?></span>
                                    <span class="d-block fs-7"><?php esc_html_e( 'Your server must be configured with HTTPS', 'datapocket' ); ?></span>
                                </div>
                                <a
                                    href="<?php echo esc_url( get_admin_url( null, 'options-general.php' ) ); ?>"
                                    class="datapocket-btn bg-transparent border border-1 border-dark rounded px-2 ms-auto d-block py-2 text-decoration-none text-black"
                                >
                                    <?php esc_html_e( 'Settings', 'datapocket' ); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        <?php if ( ! $is_woocommerce_connected || ! $is_wordpress_connected ) : ?>
                            <div class="d-flex shadow-sm p-3 gap-2 mt-2 border-start border-5 border-danger align-items-center">
                                <div>
                                    <span class="d-block fw-semibold"><?php esc_html_e( 'No connection with DataPocket', 'datapocket' ); ?></span>
                                    <span class="d-block fs-7"><?php esc_html_e( 'Connection failed between your server and DataPocket. Click "help me" (link above) for common troubles associated and check again.', 'datapocket' ); ?></span>
                                </div>
                                <a
                                    href=""
                                    class="datapocket-btn bg-transparent border border-1 border-dark rounded px-2 ms-auto d-block py-2 text-decoration-none text-black text-nowrap"
                                >
                                    <?php esc_html_e( 'Check again', 'datapocket' ); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </section>
            <?php else : ?>
                <section class="mt-4">
                    <h3 class="fs-5 p-3 d-flex gap-3">
                        <img src="<?php echo esc_url( datapocket()->plugin_url() . '/assets/img/success.svg' ); ?>">
                        <?php esc_html_e( 'All set', 'datapocket' ); ?>
                    </h3>

                    <div class="p-3 border shadow-sm">
                        <p class="m-0"><?php esc_html_e( 'Your server is ready to connect to DataPocket. Follow the instructions on the right to complete the connection.', 'datapocket' ); ?></p>
                    </div>
                </section>
            <?php endif; ?>

            <section class="mt-4">
                <h3 class="fs-5 p-3"><?php esc_html_e( 'WordPress Connection', 'datapocket' ); ?></h3>

                <div class="p-3 border shadow-sm">
                    <p><?php esc_html_e( 'Please copy the URL and key below and paste it into your DataPocket account.', 'datapocket' ); ?></p>
                    
                    <div class="d-flex shadow-sm p-3 gap-2 mt-2 border-start border-5 border-dark align-items-center">
                        <div>
                            <span class="d-block fw-semibold"><?php esc_html_e( 'URL', 'datapocket' ); ?></span>
                            <span class="d-block fs-7"><?php esc_html_e( 'Paste at DataPocket settings', 'datapocket' ); ?></span>
                        </div>
                        <div class="ms-auto d-flex gap-2  flex-column flex-md-row">
                            <input type="text" readonly class="rounded border-1 bg-white border text-secondary py-1" value="<?php echo esc_attr( get_option( 'siteurl' ) ); ?>">
                            <button
                                id="copy_wp_url"
                                class="datapocket-btn bg-transparent border border-1 border-dark rounded px-2 py-1"
                                onclick="copy('<?php echo esc_attr( get_option( 'siteurl' ) ); ?>','#copy_wp_url')"
                            >
                                <?php esc_html_e( 'Copy', 'datapocket' ); ?>
                            </button>
                        </div>
                    </div>
                    <div class="d-flex shadow-sm p-3 gap-2 mt-2 border-start border-5 border-dark align-items-center">
                        <div>
                            <span class="d-block fw-semibold"><?php esc_html_e( 'DataPocket Key', 'datapocket' ); ?></span>
                            <span class="d-block fs-7"><?php esc_html_e( 'Paste at DataPocket settings', 'datapocket' ); ?></span>
                        </div>
                        <div class="ms-auto d-flex gap-2  flex-column flex-md-row">
                            <input type="text" readonly class="rounded border-1 bg-white border text-secondary py-1" value="<?php echo esc_attr( get_option( 'datapocket_wp_token' ) ); ?>">
                            <button
                                id="copy_wp_token"
                                class="datapocket-btn  bg-transparent border border-1 border-dark rounded px-2 py-1"
                                onclick="copy('<?php echo esc_attr( get_option( 'datapocket_wp_token' ) ); ?>','#copy_wp_token')"
                            >
                                <?php esc_html_e( 'Copy', 'datapocket' ); ?>
                            </button>
                        </div>
                    </div>
                </div>
            </section>

            <?php if ( class_exists( 'WooCommerce' ) ) : ?>
                <section class="mt-4">
                    <h3 class="fs-5 p-3"><?php esc_html_e( 'WooCommerce Connection', 'datapocket' ); ?></h3>

                    <div class="p-3 border shadow-sm">
                        <p><?php esc_html_e( 'Please copy the URL and key below and paste it into your DataPocket account.', 'datapocket' ); ?></p>
                        
                        <div class="d-flex shadow-sm p-3 gap-2 mt-2 border-start border-5 border-dark align-items-center">
                            <div>
                                <span class="d-block fw-semibold"><?php esc_html_e( 'URL', 'datapocket' ); ?></span>
                                <span class="d-block fs-7"><?php esc_html_e( 'Paste at DataPocket settings', 'datapocket' ); ?></span>
                            </div>
                            <div class="ms-auto d-flex gap-2  flex-column flex-md-row">
                                <input type="text" readonly class="rounded border-1 bg-white border text-secondary py-1" value="<?php echo esc_attr( get_option( 'siteurl' ) ); ?>">
                                <button
                                    id="copy_wc_url"
                                    class="datapocket-btn bg-transparent border border-1 border-dark rounded px-2 py-1"
                                    onclick="copy('<?php echo esc_attr( get_option( 'siteurl' ) ); ?>','#copy_wc_url')"
                                >
                                    <?php esc_html_e( 'Copy', 'datapocket' ); ?>
                                </button>
                            </div>
                        </div>
                        <div class="d-flex shadow-sm p-3 gap-2 mt-2 border-start border-5 border-dark align-items-center">
                            <div>
                                <span class="d-block fw-semibold"><?php esc_html_e( 'DataPocket Key', 'datapocket' ); ?></span>
                                <span class="d-block fs-7"><?php esc_html_e( 'Paste at DataPocket settings', 'datapocket' ); ?></span>
                            </div>
                            <div class="ms-auto d-flex gap-2  flex-column flex-md-row">
                                <input type="text" readonly class="rounded border-1 bg-white border text-secondary py-1" value="<?php echo esc_attr( get_option( 'datapocket_token' ) ); ?>">
                                <button
                                    id="copy_wc_token"
                                    class="datapocket-btn bg-transparent border border-1 border-dark rounded px-2 py-1"
                                    onclick="copy('<?php echo esc_attr( get_option( 'datapocket_token' ) ); ?>','#copy_wc_token')"
                                >
                                    <?php esc_html_e( 'Copy', 'datapocket' ); ?>
                                </button>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif;  ?>
        </div>
        <div class="col-12 col-lg-5">
            <div class="border-bottom p-2">
                <h1 class="fs-3"><?php esc_html_e( 'Instructions', 'datapocket' ); ?></h1>
                <h2 class="fs-5 fw-normal"><?php esc_html_e( 'Follow these steps', 'datapocket' ); ?></h2>
            </div>

            <ol class="list-unstyled ms-0 mt-4 steps mb-5">
                <li>
                    <span class="border border-2 border-secondary rounded-circle p-2 fs-7 d-inline-lock me-2">01</span>
                    <?php esc_html_e( 'Open', 'datapocket' ); ?> <a class="text-brand" target="_blank" href="https://m.datapocket.app">https://m.datapocket.app</a>
                </li>
                <li>
                    <span class="border border-2 border-secondary rounded-circle p-2 fs-7 d-inline-lock me-2">02</span>
                    <?php esc_html_e( 'Select “add your own datasource”', 'datapocket' ); ?>
                </li>
                <li>
                    <span class="border border-2 border-secondary rounded-circle p-2 fs-7 d-inline-lock me-2">03</span>
                    <?php esc_html_e( 'Select your connector', 'datapocket' ); ?>
                </li>
                <li>
                    <span class="border border-2 border-secondary rounded-circle p-2 fs-7 d-inline-lock me-2">04</span>
                    <?php esc_html_e( 'Copy the URL and paste', 'datapocket' ); ?>
                </li>
                <li>
                    <span class="border border-2 border-secondary rounded-circle p-2 fs-7 d-inline-lock me-2">05</span>
                    <?php esc_html_e( 'Copy the key and paste', 'datapocket' ); ?>
                </li>
            </ol>

            <div class="mt-8 fw-semibold"><?php esc_html_e( 'Need extra help?', 'datapocket' ); ?> <a target="_blank" href="https://help.datapocket.app/en/collections/9390679" class="text-brand"><?php esc_html_e( 'Go to Help Center', 'datapocket' ); ?></a></div>
        
            <div class="mt-8 border-bottom p-2">
                <h3><?php esc_html_e( 'Peace of mind', 'datapocket' ); ?></h3>
                <p><?php esc_html_e( 'DataPocket does NOT overwrite your products or website. It only connects your product catalogue or blogposts to design platforms like Canva, Figma, Adobe Express and the Adobe Suite.  Use it confidently knowing your data remains intact.', 'datapocket' ); ?></p>
            </div>
        </div>
    </div>
</div>

<script>
    function copy( text, target ) {      
        document.querySelector( target ).innerText = '<?php esc_html_e( 'Copied!', 'datapocket' ); ?>';
        
        setTimeout( function () {
            document.querySelector( target ).innerText = '<?php esc_html_e( 'Copy', 'datapocket' ); ?>';
        }, 800 );

        navigator.clipboard.writeText( text );
    }
</script>
