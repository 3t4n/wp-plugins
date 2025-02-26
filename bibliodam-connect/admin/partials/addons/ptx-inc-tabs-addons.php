<div id="addons-tab-1" class="tab-content">
    <h3><?php printf(esc_attr__('Manage Add-Ons', $this->pluginName)); ?></h3>
    <div class="grid">
        <?php $this->pluginAddOns->ptxAvailableAddOns(); ?>
    </div>
</div>
