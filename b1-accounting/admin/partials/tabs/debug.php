<?php
if (!defined('WPINC')) {
    die;
}
/**
 * @var B1_Accounting_Admin $this
 */
$path = admin_url() . 'admin-post.php?action=';
$nonce = wp_create_nonce('b1_security');
?>

<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fas fa-file-alt"></i> <?php _e('Debug', $this->plugin_name); ?>
                </h3>
            </div>
            <div class="panel-body">
                <button type="submit" class="btn btn-primary" id="b1PluginDebugBtn">
                    <i class="fas"></i> <?php _e('Run auto test', $this->plugin_name); ?>
                </button>
                <hr/>
                <div>
                    <textarea cols="80" rows="3" id="b1DebugQueryText" ></textarea>
                    <button type="submit" class="btn btn-primary" id="b1PluginDebugQueryBtn">
                        <i class="fas"></i> <?php _e('Run SQL query', $this->plugin_name); ?>
                    </button>
                </div>

                <div id="b1DebugTab">
                </div>

            </div>
        </div>
    </div>
</div>



