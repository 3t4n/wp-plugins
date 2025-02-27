<div id="partnero">

    <div class="partnero-center-wrap">

        <?php include_once Partnero_Util::get_plugin_directory() . 'admin/template/includes/top-bar.php' ?>

        <div class="program-overview-header">
            <h1>Program overview</h1>
            <div class="header-actions">
                <div>
                    <a href="https://app.partnero.com" target="_blank" class="btn">Log in to Partnero</a>
                </div>
                <div>
                    <form action='' method='POST'>
                        <input type='hidden' name='page' value='partnero-admin'/>
                        <input type='hidden' name='program_action' value='detach-program'/>
                        <input type='hidden' name='program_type' value='<?php echo esc_html($active_type) ?>'/>
                        <input type='submit' name='submit' class='btn' value='Detach program'>
                    </form>
                </div>
                <?php if( empty( $result ) ) { /* If there is no response from api show error */ ?>
                    <p style="color: #c12020; font-weight: bold;">
                        Woops! Can't fetch program data. Please try again later.
                    </p>
                <?php } ?>
            </div>
        </div>

        <!-- Do not show overview without api response -->
        <?php
            if( !empty( $result ) ) {
                if ( $active_type === Partnero_Util::TYPE_AFFILIATE ) {
                    include_once Partnero_Util::get_plugin_directory() . 'admin/template/includes/dashboard-affiliate.php';
                }

                if ( $active_type === Partnero_Util::TYPE_REFER_A_FRIEND ) {
                    include_once Partnero_Util::get_plugin_directory() . 'admin/template/includes/dashboard-refer-a-friend.php';
                }
            }
        ?>

        <div class="py-2">
            <p class="description">Need help? Feel free to contact us at <a href="mailto:hello@partnero.com">hello@partnero.com</a></p>
        </div>

    </div>

</div>
