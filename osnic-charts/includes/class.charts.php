<?php

class Charts {
    
    var $db;
    
    function __construct() {
        global $wpdb;
        $this->db = $wpdb;
    }
    
    public function save_chart($data){
        $validateY = $this->validate_Yaxis($data['yaxis']);
        if($validateY['isError'] == FALSE){
            $dataP['xaxis'] = $data['xaxis'];
            $dataP['yaxis'] = $data['yaxis'];
            
            $saveChart['data'] = addslashes(json_encode($dataP));
            $saveChart['type'] = $data['ChartType'];
            $saveChart['title'] = $data['title'];
            
            if($data['type'] == "edit" && $data['chartId'] != 0){
                $where['id'] = intval($data['chartId']);
                $this->db->update('os_charts',$saveChart,$where);
            }
            else{
                $this->db->insert( 'os_charts', $saveChart );
            }
            return true;
        }
        else{
            return $validateY;
        }
    }
    
    public function validate_Yaxis($yaxis){
        $stringL = strlen($yaxis);
        if($stringL <= 0 || $yaxis == ""){
            $error = "Y-axis data cannot be empty";
        }
        else{
            $yaxis = explode(',', $yaxis);
            foreach ($yaxis as $p){
                if(!is_numeric($p)){
                    $error = "Please enter numeric values in Y-axis data";
                    break;
                }
            }
        }
        if(isset($error) && $error != ""){
            $ret['isError'] = true;
            $ret['errormsg'] = $error;
        }
        else{
            $ret['isError'] = FALSE;
        }
        return $ret;
    }
    
    public function getChartById($id){
        $sql = "select * from os_charts where id = ".$id;
        return $this->db->get_row($sql);
    }
    
    public function delete_chart($id)
    {
        $del_id=$id;
        $sql = "DELETE from os_charts where id = ".$id;
        $this->db->query($sql);
        return true;
        //chart_delte_admin_notice($del_id);
    }
    
    public function getCharts($limit = 0){
        $pagenum = isset( $_GET['pagenum'] ) ? absint( $_GET['pagenum'] ) : 1;
        $limit = 10;
        $offset = ( $pagenum - 1 ) * $limit;
        $sql = "SELECT * FROM os_charts LIMIT $offset, $limit";
        $charts = $this->db->get_results( $sql, OBJECT );
        return $charts;
    }
    
    public function Charts_shortcode($chData){
        $chartId = intval($chData['id']);
        if(isset($chData['width']) && is_numeric($chData['width'])){
            $width = intval($chData['width']);
        }else $width = 300;
        
        if(isset($chData['height']) && is_numeric($chData['height'])){
            $height = intval($chData['height']);
        }else $height = 300;
        
        $DivStyle = 'style="height:'.$height.'px; width: '.$width.'px;"';
        wp_enqueue_script('osnic_canvasjs');
        wp_enqueue_script('osnic_charts');
        wp_enqueue_script('osnic_frontcharts');
        $html = "<div class='osnic_chartdiv' id='osnic_chartContainer".$chartId."'".$DivStyle."></div>";
        return $html;
        
    }
}
?>
