<div class='apm_sidebar_block' >
    <p class='apm_sidebar_title typeface-js' >SORT</p>
    <div class='apm_sidebar_content' >
        <?php
        if (isset($this->config['module']['module_columns_sortby']) and is_array($this->config['module']['module_columns_sortby']) and count($this->config['module']['module_columns_sortby']) > 0) {
            $this->set_sort_by();
            ?>
            <span class='sort_dir sort_asc sort_sel'>ASC</span> <span class='sort_dir sort_desc sort_unsel'>DESC</span>
        <?php } else { ?>
            <p>Page not sortable. Sorted by post title by default</p>
<?php } ?>
    </div>
    <p class='apm_sidebar_title typeface-js' >ACTIONS</p>

    <div class='apm_sidebar_content' >
        <ul class='apm_sidebar_actions' modulekey='<?php echo $this->config['modulekey'] ?>'>
            <!--<li>Quick Add</li>
            <li>Quick Edit</li>
            <li>Select All</li>-->
            <li class="apm_act_title">Batch Actions with selected records:</li>
            <li class="apm_act_pub apm_pad_icon">Publish</li>
            <li class="apm_act_unpub apm_pad_icon" title="Unpublish = Set to Draft">Unpublish</li>
            <li class="apm_act_trash apm_pad_icon">Trash</li>
            <li class="apm_act_del apm_pad_icon">Delete</li>
            <!--<li>Export selected records</li>
            <li>Export All</li>-->
            <?php if (isset($this->config['module']['module_datagrid_special_action'])) { ?>
                <li class="apm_act_title">Special  Actions:</li>
                <?php
                foreach ($this->config['module']['module_datagrid_special_action'] as $k => $action) {
                    $tooltip = "";
                    $tooltipt = "";
                    if (isset($action['tooltip'])) {
                        $tooltip = ' data-tooltip="' . $action['tooltip'] . '" ';
                        $tooltipt = ' title="' . $action['tooltip'] . '" ';
                    }
                    echo '<li class="apm_act_specialaction   apm_pad_icon ' . $action['icon_css'] . '"  ' . $tooltip . ' ' . $tooltipt . ' data-fields="' . $action['fields'] . '" data-act_name="' . $action['action'] . '" data-act_key="' . $k . '">' . $action['label'] . '</li>';
                }
            }
            if (isset($this->config['module']['module_data_grid_batch_actions'])) {
                if (is_array($this->config['module']['module_data_grid_batch_actions']) and count($this->config['module']['module_data_grid_batch_actions']) > 0) {
                    echo '<li class="apm_act_title">Special Batch Actions with selected records:</li>';
                    foreach ($this->config['module']['module_data_grid_batch_actions'] as $k => $action) {
                        echo '<li class="apm_act_special  apm_pad_icon" data-act_name="' . $k . '" data-value="' . $action['value'] . '"  data-field="' . $action['field'] . '" data-act_name="' . $k . '">' . $action['label'] . '</li>';
                    }
                }
            }
            ?>
        </ul>
    </div>

    <div  class='apm_sidebar_content_filter'>
        <p class='apm_sidebar_title typeface-js' >SEARCH</p>

        <div class='apm_sidebar_content' >
            <p>
                <label>Free search</label>
                <input type="text" value='' name='search_apm' style='width:60px' class='apm_search_field'/>
                <!--input type="button" class='apm_search_btn apm_search_btn_go' /-->
                <a  class='btn btn-mini apm_search_btn_go' ><i class='icon-search'></i></a>
                <a  class='btn btn-mini apm_search_cancel_btn_go' ><i class='icon-remove'></i></a>
                <br/>(Note: the search will be apply on main title / name only)
            </p>
            <span class='apm_open_advanced_search'><strong>See Advanced Search</strong></span>
            <!--<ul class='apm_sidebar_actions'>
                    <li class="apm_act_title">Filter by Status:</li>
                    <li class="apm_act_all apm_filter_icon">All</li>
                    <li class="apm_act_pub apm_filter_icon">Publish</li>
                    <li class="apm_act_unpub apm_filter_icon" title="UnPublished (Draft)">UnPublished</li>
                    <li class="apm_act_trash apm_filter_icon">Trash</li>

            <!--<li class="apm_act_title">Filter by team/assignment: </li>
            <li class="apm_filter_assign apm_filter_icon">Assigned to me</li>
            <li class="apm_filter_assign apm_filter_icon">I'm in notification</li>
            <li class="apm_filter_assign apm_filter_icon">I'm in team</li>

            <li  class="apm_act_title">Filter by creation date</li>
            <li>Today</li>
            <li>Yesterday</li>
            <li>This week</li>
            <li>This month</li>
            <li>This year</li>
            <li>Older</li>
            <li  class="apm_act_title">Open Advanced Search</li>
    </ul>-->
        </div>
    </div>
    <div  class='apm_sidebar_content_advanced_search'>
        <p class='apm_sidebar_title typeface-js' >ADVANCED SEARCH</p>
        <div class='apm_sidebar_content' >
            <span class='apm_close_advanced_search'>Close Advanced Search</span>
            <div class='content_advanced_search_fields'>
                <?php $this->set_advanced_search(); ?>
                <p>

                <a  class='btn btn-mini apm_advanced_search_btn_go' ><i class='icon-search'></i> Search</a>
                <a  class='btn btn-mini apm_advanced_search_cancel_btn_go' ><i class='icon-remove'></i>Cancel</a>
                </p>

            </div>
        </div>
    </div>
    <div class='apm_sidebar_content' ><ul class='apm_sidebar_actions'>
            <li class="apm_act_title">Filter by Status:</li>
            <li class="apm_act_all apm_filter_icon">All</li>
            <li class="apm_act_pub apm_filter_icon">Publish</li>
            <li class="apm_act_unpub apm_filter_icon" title="UnPublished (Draft)">UnPublished</li>
            <li class="apm_act_trash apm_filter_icon">Trash</li>
        </ul>
    </div>
</div>