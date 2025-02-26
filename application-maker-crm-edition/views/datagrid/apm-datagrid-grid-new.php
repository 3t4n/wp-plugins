<?php if (isset($_REQUEST['do_clearcache'])) {
    ?>
    <script type="text/javascript">
        $.get(ajaxurl+'?action=apm_extensions&subaction=get_extensions_files&type=js&clearcache=false');
        $.get(ajaxurl+'?action=apm_extensions&subaction=get_extensions_files&type=css&clearcache=false');
        $.get(ajaxurl+'?action=apm_extensions&subaction=get_extensions_files&type=views&clearcache=false');
    </script>
    <?php }
?>
<script type="text/javascript">
    flg_apm.setModuleGrid.module_config= <?php
global $post;
$modconfig = array(
    'modulekey' => $this->config['modulekey'],
    'slug' => $this->config['module']['slug'],
    'name' => $this->config['module']['name'],
    'menu_name' => $this->config['module']['menu_name'],
    'singular_name' => $this->config['module']['singular_name'],
    'icon' => $this->config['module']['icon'],
);
echo json_encode($modconfig);
?>;
    flg_apm.setModuleGrid.module_datagrid= <?php
foreach ($this->config['module']['module_datagrid']['columns_definition'] as $ck => $ccol) {

    if (isset($this->default_fields[$ck]['column_label'])) {
        $collab = $this->default_fields[$ck]['column_label'];
        $collab = $oThis->get_currency($collab);
        $this->config['module']['module_datagrid']['columns_definition'][$ck]['column_label'] = $collab;
    } else {
        $this->config['module']['module_datagrid']['columns_definition'][$ck]['column_label'] = $this->default_fields[$ck]['label'];
    }
    if (isset($this->default_fields[$ck]['label'])) {
        $label = $this->default_fields[$ck]['label'];
        $label = $oThis->get_currency($label);
        $this->config['module']['module_datagrid']['columns_definition'][$ck]['label'] = $label;
    } else {
        $this->config['module']['module_datagrid']['columns_definition'][$ck]['label'] = $ck;
    }
}
//var_dump($this->config['module']['module_datagrid']);
echo json_encode($this->config['module']['module_datagrid']);
?>;
    if(flg_apm.setModuleGrid.module_datagrid==null){
        alert('Sorry but your <?php echo $this->config['module']['name']; ?> module config is missing the Datagrid config definition.')
    }

</script>
<div id='apmdatagrid_new_container'  class='apmdatagrid_new_container'>
    <div id='apmdatagrid_new_leftpan' class='ext_new_leftpan' data-status='expanded' ></div>
    <div id='apmdatagrid_new_header' class='ext_new_header'> <p> LOADING UI... PLEASE WAIT</p></div>
    <div id='apmdatagrid_new_gridhead' class='ext_new_gridhead'></div>
    <div id='apmdatagrid_new_gridbody' class='ext_new_gridbody'></div>
    <div id='apmdatagrid_new_gridfooter' class='ext_new_gridfooter'></div>
    <div id='apmdatagrid_new_rightpan' class='ext_new_rightpan'></div>
    <div id='apmdatagrid_new_statusfooter' class='ext_new_statusfooter'></div>
</div>
