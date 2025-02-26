

<div id='apm_grid_block' class="apm_grid_block_cls">
    <div class='apm_grid_main_header'>
        <?php
        if (isset($this->config['module']['module_columns_config']['header_a_z']) and $this->config['module']['module_columns_config']['header_a_z'] == true) {
            ?>
            <ul class='apm_grid_az_header' >
                <?php
                $az_array = array('#', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '0-9');
                foreach ($az_array as $letter) {
                    echo '<li><a href="#" letter="' . $letter . '" >' . $letter . '</a></li>';
                }
                ?>

            </ul>
            <?php
        }
        ?>
        <div  class='apm_grid_status_zone_container'  has_paging='<?php $this->set_datagrid_paging('has_paging'); ?>' nb_by_page='<?php $this->set_datagrid_paging('nb_by_page'); ?>' initial_page='<?php $this->set_datagrid_paging('initial_page'); ?>' last_page='5'>
            <div class='apm_grid_status_zone'  >Status infos.</div>
                <?php $this->set_datagrid_paging('header_paging'); ?>
            <span class='btn btn-mini apm_refresh_btn hasTooltip' title='Refresh'><i class="icon-refresh"></i></span>
            <br clear="all"/>
        </div>
    </div>
    <div class='apm_grid_zone' id='mainGridZone'>
        <table  cellspacing="0">
            <thead class="fixedHeader"><tr><?php $this->set_datagrid_header(); ?></tr>
            </thead>
            <tbody class='apm_table_tbody scrollContent' modulekey='<?php echo $this->config['modulekey'] ?>' shown='true'>

            </tbody>
        </table>
    </div>
    <div class='apm_grid_footer' >

        <!--<div class='apm_grid_pagin_zone'>
        <?php $this->set_datagrid_paging(); ?>
        </div>-->
    </div>
</div>
<div id='apm_grid_actions_layer'><?php echo $action_all_btns; ?></div>

