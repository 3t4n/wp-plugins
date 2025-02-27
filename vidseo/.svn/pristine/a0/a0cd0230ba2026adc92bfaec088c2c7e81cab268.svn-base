<?php  include "inc/top.view.php"; ?>

<!-- Start Settings -->
<div class="vidseo-row">

    <!-- Start Main Settings Column -->
    <div class="vidseo-column col-9">

        <div class="vidseo-main">

            <form method="post">

            <?php if ( function_exists( 'wp_nonce_field' ) ) { wp_nonce_field( 'vidseo_settings', 'vidseo_nonce' ); }

                // Include all ui files
                $file_names = array(
                    'step-1.view',
                    'step-2-1.view',
                    'step-2-2.view',
                    'step-2-3.view',
                    'step-3.view',
                    'delete.view',
                );

                foreach ( $file_names as $name ) {
                    include_once dirname( __FILE__ ).'/inc/' . $name . '.php';
                }

                ?>
            
            
            <p class="submit"><input type="submit" name="update" class="button-primary" value="<?php 
            echo  esc_html__( 'Save Changes', 'vidseo' ) ;
            ?>" /></p>

            </form>
        
                    
            <div class="vidseo-note">
                <p><?php 
                echo  esc_html__( 'Note: Please check plugin documentation for more details about shortcode parameters and global settings', 'vidseo' ) ;
                ?></p>
            </div>


    </div> <!-- End vidseo-main -->

</div> <!-- End main settings vidseo-column col-8 -->

<?php 
    // Sidebar
    Pagup\Vidseo\Core\Plugin::view('inc/sidebar');
?>

</div>