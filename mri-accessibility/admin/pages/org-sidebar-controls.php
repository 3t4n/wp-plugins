<?php $org_list = miah_get_admin_widgets_list(); ?>
<div class="wrap">
    <div class="element_row">
        <h1 style="background: #48b24b;color: #FFF;padding: 10px;line-height: 1;">
            <?php _e("Sidebar widgets order","wp-accessibility-helper"); ?>
        </h1>

      

        <div id="fountainG">
            <?php for($i=1;$i<=8;$i++): ?>
                <div id="fountainG_<?php echo $i; ?>" class="fountainG"></div>
            <?php endfor; ?>
        </div>
    </div>
    <div class="element_row">
        <div class="org-main-admin-row">
          
            <div class="org-main-admin-form element_container">
                <p>
                    <ol>
                        <li>Drag and drop widget</li>
                        <li><span class="active_widget"></span>Active widget</li>
                        <li><span class="inactive_widget"></span>Inactive widget</li>
                    </ol>
                </p>
                <hr />
                <ul id="sortable-org-widget">
                    <?php foreach($org_list as $id=>$item) { ?>
                        <li data-status="<?php echo $item['active']; ?>" id="<?php echo $id; ?>" class="ui-state-default org-button-widget <?php echo $item['class']; ?>">
                            <span class="dashicons dashicons-menu"></span> <?php echo $item['html']; ?>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>

    </div>
</div>
<?php
    wp_enqueue_script( 'jquery-ui-core' );
?>

