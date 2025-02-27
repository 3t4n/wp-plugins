<?php

    function admin_enqueue_scripts(){
        wp_enqueue_style('fmc-admin-main', FMC_ASSETS_CSS . 'admin.css', array() , time(), 'all');
        wp_enqueue_script( 'fmc-admin-main', FMC_ASSETS_JS . 'admin.js', array('jquery'), time(), true );
    }
    add_action( 'admin_enqueue_scripts', 'admin_enqueue_scripts' );


    function fmc_admin_menu() {
        $parent_slug = 'finest-mini-cart';
        $capability = 'manage_options';

        add_menu_page( __( 'Finest Mini Cart', 'finest-mini-cart' ), __( 'Minicart Option', 'finest-mini-cart' ), $capability, $parent_slug, 'plugin_option', 'dashicons-cart' );

        // add_submenu_page( $parent_slug, __( 'Minicart Option', 'finest-mini-cart' ), __( 'Minicart Option', 'finest-mini-cart' ), $capability, $parent_slug, 'plugin_option' );


    }
    add_action( 'admin_menu',  'fmc_admin_menu'  );





    function plugin_option() { ?>

        <div class="fmc-admin-settings-wraper">
            <div id="container">
                <!-- <header class="fmc-tabs-nav">
                    <a class="active" href="#tab1">
                        <i class="dashicons dashicons-admin-tools"></i>
                        <?php _e('General', 'finest-mini-cart'); ?>
                    </a>
                </header> -->

                <section class="tabs-content">

                    <div class="single-tab" id="tab1">
                        <ul>
                            <li>
                                <div class="fmc-admin-cart-headding">
                                    <h1><?php _e('Design Setting', 'finest-mini-cart' ); ?></h1>
                                </div>
                                <a href="<?php echo admin_url( 'customize.php' ); ?>" >
                                <?php _e( 'Open Customizer', 'finest-mini-cart' ); ?>
                                </a>
                            </li>
                        </ul>
                    </div>

                </section>
            </div>
        </div>


    <?php }
