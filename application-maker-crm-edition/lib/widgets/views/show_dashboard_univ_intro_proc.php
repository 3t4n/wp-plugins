<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div style="text-align:right;">
    <h5  style="text-align:right;">
        Welcome to the UNIVERSITY dashboard.
    </h5>
    <?php
        if (current_user_can('administrator')) {
    ?>
    <p><span class="btn btn-info apm_admin_post_tip" >Post a Tip</span></p>
        <?php } ?>
    <a href='index.php'><i class="icon-chevron-left" ></i> Back to the Default Dashboard</a>
</div>