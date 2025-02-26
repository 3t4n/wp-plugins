<?php
require_once( 'eplm_p_init.php' );
if (isset($_GET['tid']) && intval($_GET['tid']) != null) {
    $template_id = intval($_GET['tid']);
}
?>
<div class="form-group " id="html_type">
    <div class="panel-body">
    <div class="row">
        <?php
        $eplm_plugin_trmplate_url = plugins_url('', __FILE__);
        foreach ($templates['data'] as $s) {
            $path = $eplm_plugin_trmplate_url . '/templates/' . $s->temp_id . '.png';
            ?>

            <div class="eplm_template_list">
                <?php echo $s->temp_name; ?>
                <br/>

                            <a id="linkid"
                               href="<?php echo $admin_url; ?>admin.php?page=eplm_popups_edit&tid=<?php echo $s->temp_id; ?>"><img
                                        id="<?php echo $s->temp_id; ?>" style="height: 144px; margin-top: 5px;"
                                        src="<?php echo $path; ?>"
                                        class="img-thumbnail"></a>

            </div>
            <?php
        }
        ?>
    </div>
    </div>
    </div>
    <input type="hidden" name="templateid" id="templateid" value="<?php if (isset($template_id)) echo $template_id; ?>">
    <input type="hidden" value="<?php if (isset($template_id)) echo $template_id; ?>" name="options[rolbackradioval]"
           id="rolbackradioval">
    <script>
        $('.theamesoption').click(function () {
            var curr = jQuery(this).attr('id');
            var old = jQuery('#rolbackradioval').val();
                var x = 1;
                $('#usetemplate_y_n').val(x);
                $('#templateid').val(curr);
                $('#current_emplate').val(curr);
                $('#saveandprev').click();
        });
    </script>
