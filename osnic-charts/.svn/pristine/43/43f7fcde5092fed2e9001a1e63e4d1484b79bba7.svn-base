<?php
wp_enqueue_script('osnic_canvasjs');
wp_enqueue_script('osnic_charts');
$type = "new";
if(isset($_POST['save'])){
    $charts = new Charts();
    $check = $charts->save_chart($_POST);
}
if(isset($_GET['type']) && $_GET['type'] == 'edit'){
    $type = $_GET['type'];
    $charts = new Charts();
    $chartId = intval($_GET['chartId']);
    $chartData = $charts->getChartById($chartId);
    if($chartData){
    ?>
        <h3 class="create_chart_head">Edit Chart</h3>
    <?php
        include_once OSNIC_PLUGIN_DIR.'includes/templates/column_chart.php';
    }
}
else{
    $chartId = 0;
?>
  <h3 class="create_chart_head">Add Charts</h3>
    <table class="form-table form-table-charts create_chart_option">
        <tr>
            <th>Select Chart&nbsp;&nbsp;:</th>
            <td>
                <select id="os_selectChart">
                    <option value="0">Select Chart</option>
                    <option value="column">Column Chart</option>
                    <option value="line">Line Chart</option>
                    <option value="spline">Spline Chart</option>
                    <option value="area">Area Chart</option>
                    <option value="pie">Pie Chart</option>
                    <option value="doughnut">Doughnut Chart</option>
                </select>
            </td>
        </tr>
    </table>
    <br/><hr/><br/>

    <div id="os_load_mainContainer"></div>
<?php
}
?>
