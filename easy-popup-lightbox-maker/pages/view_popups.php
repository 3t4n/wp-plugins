<?php require_once('eplm_p_init.php'); ?>

<?php $admin_url = get_admin_url(); ?>

<?php $page = (isset($_GET['pg'])) ? intval($_GET['pg']) : 1; ?>

<?php $page = (!empty($page)) ? $page : 1; ?>

<?php $limit = 15; ?>

<?php $offset = ($page - 1) * $limit; ?>

<?php $popups = eplm_read_popups(array(), $limit, $offset) ?>
<style>
    .copied {
        opacity: 0.4;
        transition: opacity 0.5s;
    }

    .center-content {
        vertical-align: middle !important;
        text-align: center !important;
    }
</style>


<!--<input type="hidden" name="pop_id" id="pop_id" value="<?php /*echo $pop_id; */ ?>"/>-->

<div class="bootstrap-wrapper">

    <div class="container-fluid wpoc-plugin-logo">

        <div class="row">

            <div style="padding: 0 10px; margin-top: 20px;">

                <h3><?php _e('&nbsp;&nbsp;Popups List', 'eplm_popups'); ?>&nbsp;&nbsp;</h3>

            </div>

        </div>



    </div>



    <div class="container-fluid">

        <div class="row" style="margin-top: 20px;">

            <div class="col-md-8 col-sm-12">

                <div class="row">

                    <div class="col-sm-10">

                        <div class="row">

                            <div class="col-sm-3">

                                <a class="btn btn-success" href="<?php echo $admin_url; ?>admin.php?page=eplm_popups_template"><i class="fa fa-plus-square"></i>&nbsp;

                                    <?php _e('Create New Popup', 'eplm_popups'); ?></a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <br />

        <div class="row">

            <div class="col-sm-12">

                <table class="table table-bordered table-striped table-hover wpoc-sliders-table">

                    <thead>

                        <tr>

                            <th class="center-content"><?php _e('Name', 'eplm_popups') ?></th>

                            <th class="center-content"><?php _e('Shortcode', 'eplm_popups') ?></th>

                            <th class="center-content"><?php _e('Type', 'eplm_popups') ?></th>

                            <th class="center-content"><?php _e('Date', 'eplm_popups') ?></th>

                            <th class="center-content"><?php _e('Actions', 'eplm_popups') ?></th>

                            <th class="center-content"><?php _e('Status', 'eplm_popups') ?></th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php if (count($popups['data']) > 0) : ?>

                            <?php foreach ($popups['data'] as $s) : ?>

                                <tr id="popup__<?php echo $s->pop_id; ?>">

                                    <td class="center-content">

                                        <a href="<?php echo $admin_url; ?>admin.php?page=eplm_popups_edit&id=<?php echo $s->pop_id; ?>"><?php echo $s->pop_name; ?></a>

                                    </td>

                                    <td class="center-content">
                                        <div class="d-flex" style="justify-content: space-around;align-items: center">

                                            <p id="<?php echo $s->pop_id; ?>"><?php echo '[eplm_popup pop_id="' . $s->pop_id . '"]'; ?></p>
                                            <button id="copyButton<?php echo $s->pop_id; ?>" style="width: 85px;" class="btn btn-xs btn-default" onclick="copyTextToClipboard('<?php echo $s->pop_id; ?>')">Copy Text</button>
                                        </div>
                                    </td>


                                    <?php

                                    $template_name = eplm_read_template_name($s->template_id);

                                    extract((array)$template_name);

                                    ?>

                                    <td class="center-content"><?php echo $temp_name;  ?></td>

                                    <td class="center-content"><?php echo date('Y-m-d', strtotime($s->pop_date)); ?> </td>

                                    <td class="center-content">

                                        <a class="btn btn-xs btn-default" href="<?php echo $admin_url; ?>admin.php?page=eplm_popups_edit&id=<?php echo $s->pop_id; ?>">

                                            <i class="fa fa-pencil-square-o"></i>&nbsp;<?php _e('Edit', 'eplm_popups'); ?>

                                        </a>&nbsp;&nbsp;

                                        <a class="btn btn-xs btn-danger" href="javascript:void(0)" onclick="deletepopu(<?php echo $s->pop_id; ?>)">

                                            <i class="fa fa-times-circle"></i>&nbsp;<?php _e('delete', 'eplm_popups'); ?>

                                        </a>



                                    </td>



                                    <td id="status_msg" class="center-content">
                                        <div class="d-flex" style="justify-content: center; align-items: center;">
                                            <?php

                                            if ($s->pop_status == 1) {

                                                echo ' <span class="badge badge-success">Enabled</span>';
                                            } else {

                                                echo ' <span class="badge badge-danger">disabled</span>';
                                            }

                                            ?>
                                            <label class="switch">
                                                <input name="pop_status" class="pop-status-checkbox" data-pop-id="<?php echo $s->pop_id; ?>" <?php if (isset($s->pop_status)) {
                                                                                                                                                    checked('1', $s->pop_status);
                                                                                                                                                } ?> value="1" type="checkbox">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        <?php else : ?>

                            <tr>

                                <td colspan="6"><?php _e('No popups found', 'eplm_popups'); ?></td>

                            </tr>

                        <?php endif; ?>

                    </tbody>

                </table>

                <?php if ($popups['total'] > $limit) : ?>

                    <?php echo eplm_pagination($admin_url . 'admin.php?page=eplm_popups&pg=', $popups['total'], $limit, $page); ?>

                <?php endif; ?>

            </div>

        </div>

    </div>

</div>

<script>
    function copyTextToClipboard(elementId) {
        var textToCopy = document.getElementById(elementId).innerText;
        var textArea = document.createElement("textarea");
        textArea.value = textToCopy;
        document.body.appendChild(textArea);
        textArea.select();
        document.execCommand("copy");
        document.body.removeChild(textArea);

        var copyButton = document.getElementById("copyButton" + elementId);
        copyButton.innerText = "Text Copied!";
        copyButton.classList.add("copied");

        setTimeout(function() {
            copyButton.innerText = "Copy Text";
            copyButton.classList.remove("copied");
        }, 2000);
    }

    jQuery(document).ready(function($) {
        $('.pop-status-checkbox').on('change', function() {
            var popId = $(this).data('pop-id');
            var isChecked = $(this).prop('checked') ? 1 : 0;
            $.ajax({
                type: 'POST',
                url: ajaxurl,
                data: {
                    action: 'update_pop_status',
                    popId: popId,
                    isChecked: isChecked,
                    security: '<?php echo wp_create_nonce("pop_status_nonce"); ?>'
                },
                success: function(response) {
                    alert(response);
                    window.location.reload();
                }
            });
        });
    });
</script>