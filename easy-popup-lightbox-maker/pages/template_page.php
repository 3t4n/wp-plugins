<?php
require_once( 'eplm_p_init.php' );
$admin_url = get_admin_url();
$templates = eplm_read_template_popups(array());
?>
<div class="bootstrap-wrapper" style="background-color: #f2f2f2; margin-right: 20px; margin-top: 20px;">
    <div class="container-fluid wpoc-plugin-logo">
        <div class="row">
            <div style="padding: 0 10px; margin-top: 20px;">
                <h3><?php _e('&nbsp;&nbsp;Template List', 'eplm_popups'); ?>&nbsp;&nbsp;</h3>
            </div>
        </div>
        </br>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <?php include("eplm_theames.php");?>
        </div>
    </div>
</div>




