
<style>
    .inliArea .input-xs {
        height: 22px;
        padding: 2px 5px;
        font-size: 12px;
        line-height: 1.5;
        border-radius: 3px;
    }

    .inliArea {
        background: #f0f0f1;
        color: #3c434a;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
        font-size: 13px;
        line-height: 1.4em;
        width:98%;
        position:relative;
    }

    .inliArea .btn {
        padding: 5px 15px;
        background: #2271b1;
        outline: none;
        border: 1px solid #083c66;
        border-radius: 5px;
        cursor: pointer;
        color: #fff;
    }


    .inliArea .alert {
        padding: 30px 65px;
        display:block;
        text-align:center;
        font-size: 22px;
        color:#fff;
        background:#cd0000;
    }

    .inliArea .alert a {
        color:#fff;
    }

</style>
<div class="inliArea">

    <?php if($this->canI ==false)  { ?>
    <div class="alert">
        You can't save. You have to <a href="admin.php?page=internal-link-pricing">upgrade</a> the plugin.
    </div>
    <?php }?>

<h1><?php _e("Settings","internal-link")?></h1>

<div class="container" id="dashboard-widgets-wrap">
    <div class="row">

        <div class="col-md-12 col-xs-12 col-sm-12">
            <form method="POST">
                <input type="hidden" name="process" value="settings"/>
                <table class="table table-responsive wp-list-table widefat fixed striped table-view-list posts">
                    <tbody>
                    <tr>
                        <td>
                            <?php _e("Content Link Rate","internal-link")?> <br>
                            <input type="text" name="percent" value="<?php echo $percent ?>" class="form-control" required
                                   placeholder="<?php _e("Content Link Rate","internal-link")?>"></td>
                        <td>
                            <?php _e("Maximum Total Link","internal-link")?> <br>
                            <input type="text" name="max_link" value="<?php echo $maxLink ?>" class="form-control" required
                                   placeholder="<?php _e("Maximum Total Link","internal-link")?>"></td>
                        <td><br>
                            <button type="submit" name="submit" value="ok" class="btn btn-success"><?php _e("Save","internal-link")?></button>
                        </td>

                        <td><br>
                            <button type="submit" name="deleteAll" value="ok" class="btn btn-danger"><?php _e("Reset","internal-link")?></button>
                        </td>

                        <td><br>
                            <button type="button" onclick="jQuery('.importExport').show(250); return false;" class="btn btn-danger"><?php _e("Import/Export","internal-link")?></button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </form>

        </div>
    </div>
</div>

<div class="importExport" style="display:none;">
    <br/>
<h1><?php _e("Import / Export","internal-link")?></h1>

<div class="container" id="dashboard-widgets-wrap">
    <div class="row">

        <div class="col-md-12 col-xs-12 col-sm-12">

            <table class="table table-responsive wp-list-table widefat fixed striped table-view-list posts">
                <tbody>
                <tr>
                    <td>
                        <form method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="process" value="settings"/>
                            <input type="file" name="file" class="form-control" required
                                   placeholder="Link Oranı" style="display:inline-block; width:70%;">

                            <button name="import" value="ok"
                                    class="btn btn-primary"><?php _e("Import","internal-link")?>
                            </button>
                        </form>
                    </td>
                    <td>
                        <form method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="process" value="settings"/>
                            <button name="export" value="ok"
                                    class="btn btn-primary"><?php _e("Export","internal-link")?>
                            </button>
                        </form>
                    </td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>

</div>

    <br/>

<h1><?php _e("Interal Links","internal-link")?></h1>

<div class="container" id="dashboard-widgets-wrap">
    <div class="row">
        <div class="col-md-12 col-xs-12 col-sm-12">
            <form method="POST" id="add_newdata">
                <input type="hidden" name="process" value="insert"/>
                <table class="table table-responsive wp-list-table widefat fixed striped table-view-list posts">
                    <tbody>
                    <tr>
                        <td><input type="text" name="keyword" class="form-control" required
                                   placeholder="<?php _e("Your Keyword","internal-link")?>"></td>
                        <td><input type="text" name="target_url" class="form-control" required
                                   placeholder="<?php _e("Target Url","internal-link")?>"></td>
                        <td>
                            <button type="submit" class="btn btn-success"><?php _e("Add","internal-link")?></button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </form>

            <br/>

            <form method="POST" id="seo_data">

                <table class="table table-responsive wp-list-table widefat fixed striped table-view-list posts">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th><?php _e("Keyword","internal-link")?></th>
                        <th><?php _e("Target Url","internal-link")?></th>
                        <th><?php _e("Process","internal-link")?></th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    foreach ($data as $d) {
                        ?>
                        <tr id="data<?php echo esc_attr($d['id']) ?>">

                            <input type="hidden" name="process" value="update"/>
                            <td>
                                <input type="checkbox"  class="form-control selectThis" name="ids[<?php echo esc_attr($d['id']) ?>]"
                                       value="<?php echo esc_attr($d['id']) ?>"/>
                                <?php echo esc_attr($d['id']) ?>
                            </td>
                            <td><input type="text" name="keyword" class="form-control input-xs"
                                       value="<?php echo esc_attr($d['keyword']) ?>"></td>
                            <td><input type="text" name="target_url" class="form-control input-xs"
                                       value="<?php echo esc_attr($d['target_url']) ?>"></td>
                            <td>
                                <button style="display:none;" name="dhidd" value="<?php echo esc_attr($d['id']); ?>"></button>

                                <button name="delete" value="<?php echo esc_attr($d['id']); ?>"
                                        class="btn btn-xs btn-danger"><?php _e("Delete","internal-link")?>
                                </button>
                                <button name="update" value="<?php echo esc_attr($d['id']); ?>"
                                        class="btn btn-xs btn-primary"><?php _e("Update","internal-link")?>
                                </button>
                            </td>

                        </tr>
                    <?php } ?>
                    </tbody>
                </table>

                <br/>

                <button onclick="return false;"
                        class="btn btn-xs btn-primary selectNow"><?php _e("Select All","internal-link")?>
                </button>


                <button name="deletes" value="ok"
                        class="btn btn-xs btn-primary"><?php _e("Delete Selected","internal-link")?>
                </button>

            </form>


        </div>
    </div>
</div>
</div>
<script>
    jQuery('.selectNow').click(function() {
        jQuery('.selectThis').prop( "checked", true ).attr('checked','checked');
    });

    jQuery('form').on('keyup keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });

</script>