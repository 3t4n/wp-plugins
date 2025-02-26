<?php
    if(isset($_GET['ChartType']) && $_GET['ChartType'] != ""){
        $chartType = $_GET['ChartType'];
    }else{
        $chartType = '';
    }
    
    if(isset($_GET['type']) && $_GET['type'] != ""){
        $type = $_GET['type'];
    }

    if(isset($type) && $type == 'edit'){
            $formButtonType = "Update Chart";
            $dataPts = json_decode(stripslashes($chartData->data),TRUE);
            $DataTitle = $chartData->title;
            $dataX = $dataPts['xaxis'];
            $dataY = $dataPts['yaxis'];
            $chartType = $chartData->type;
            
      }else{
          $formButtonType = "Save Chart";
          $dataX = $dataY = $DataTitle = "";
          $chartId = 0;
      }
?>
<div id="error_msg">
  </div>
<form id="create_chart_frm" method="post">
<table class="form-table form-table-charts">
    <tr>
        <th>Chart Title&nbsp;&nbsp;:</th>
        <td><input placeholder="chart title" type="text" name="title" value="<?php echo $DataTitle; ?>"/></td>
    </tr>
    <tr>
        <th>Data X-axis&nbsp;&nbsp;:</th>
        <td><input placeholder="Comma Seperated values" type="text" name="xaxis" value="<?php echo $dataX; ?>"/>
        <br/><label><strong>ex :</strong> 23,34,45,...</label>
        </td>
    </tr>
    <tr>
        <th>Data Y-axis&nbsp;&nbsp;:</th>
        <td><input placeholder="Comma Seperated values" type="text" name="yaxis" value="<?php echo $dataY; ?>"/>
         <br/><label><strong>ex :</strong> apple, banana,...</label>
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>
            <input type="hidden" value="<?php echo $type; ?>" name="type" />
            <input type="hidden" value="<?php echo $chartId; ?>" name="chartId" />
            <input type="hidden" value="<?php echo $chartType; ?>" name="ChartType" />
            <input type="hidden" value="osnic_charts" name="page"/>
            <input class="button-primary" type="submit" value="<?php echo $formButtonType; ?>" name="save"/>&nbsp;&nbsp;&nbsp;
            <input class="button-primary" onclick="column_chart()" id="osnic_review_chart" type="button" value="Review Chart" name="review"/>
        </td>
    </tr>
</table>
</form>
<hr/>
<div id="chartContainer" style="height: 300px; width: 300px;">
  </div>
<script type="text/javascript">
jQuery(document).ready(function(){
    submitChartFrm();
})

</script>
