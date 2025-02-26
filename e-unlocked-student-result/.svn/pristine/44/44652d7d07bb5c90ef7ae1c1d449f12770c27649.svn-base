<?php 
DEFINED('ABSPATH') or die("You can't access this file.");
?>


<!--</div>-->
<?php
global $wpdb;
    $prefix = $wpdb->prefix;
    $remark = "";
    $viewpercentage = 0;
    $finalresult = "";
    $obtainedtotal = 0;
    $alltotal = 0;
    $allminmark = 0;
    $minpercentage = 0;
    $stuclassid;
    $totalremark = "No Marks Added!";
    $placeholder = '';
    $id = 0;
    $sclass =0;
    
if(isset($_GET['sno'])){
$id = sanitize_text_field($_GET['sno']);}
if(isset($_GET['sclass'])){
$sclass = sanitize_text_field($_GET['sclass']);}
$sqlsc = "SELECT * FROM `{$prefix}eusr_school_info`";

$sqlclass = "SELECT * FROM `{$prefix}eusr_class`";
$rowsc =array();
$rowsco = array();
$rowst = array();
$rowsto = array();
$rowclass = array();
$andsql = '';
$searchsqlkey = '';
if (1) {
    $sqlview = "SELECT * FROM `{$prefix}eusr_view_settings`";
        $resultview = $wpdb->get_results($sqlview, ARRAY_A);
        $myresultview = $resultview[0];
        $myresultview2 = $resultview[1];
        if($myresultview['methodfield']=='Roll Number'){
            $searchsqlkey = 'sno';
        }elseif($myresultview['methodfield']=='Registration Number'){
            $searchsqlkey = 'regno';
        }
        if($myresultview2['methodfield']=='y'){
            $andsql = "AND `class` = {$sclass}";
        }
    $sqlst = "SELECT * FROM `{$prefix}eusr_student_result` where `{$searchsqlkey}` = '{$id}' {$andsql}";
    $rowsco = $wpdb->get_results($sqlsc, ARRAY_A);
    $rowsto = $wpdb->get_results($sqlst, ARRAY_A);
    $rowclass = $wpdb->get_results($sqlclass, ARRAY_A);
    if (count($rowsco)>0) {
        # code...
        $rowsc = $rowsco[0];
    }
    if (count($rowsto)>0) {
        # code...
        $rowst = $rowsto[0];
    }
    
    
}?>
<!---load bootstrap css----->


<style>
::placeholder {
  color: black !important;
  opacity: 0.5; 

}
#table{
    width:54%;
}
.table{
    margin-top:0px;
    margin-bottom:0px;
}
#print {
        width: 21.6cm;
        padding: 1cm;
        margin: 1cm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 10px;
        background: white;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        color:black;
    }
#inline{
    display:inline-block;
    float:right;
    margin-right:80px;
}
@media screen and (max-width:500px){
    #print{
    width:310px;
    margin:0px auto;
    padding:4px;
    }
    .table{
  margin-left: auto;
  margin-right: auto;
}
    .mytable{
        border: none;
        font-size:9px;
        padding:2px;
        /*width:300px;*/
        /*display:block;*/
        
    }
    .photo{
        width:50%;
    }
    h1, h2, h3{
        font-size:15pxrem;
    }
    .last-table td{
        padding:2px;
    }
    #sc_name{
        font-size:2em;
    }
    .title{
        font-size:1em;
    }
    .first td{
        padding-right:15px;
        padding-left:15px;
    }
    .second td{
        padding-right:2px;
        padding-left:2px;
    }
    .second{
        /*margin-left:0;*/
    }
    .third th{
        padding-right:2px;
        padding-left:2px;
    }
    .third td{
        padding-right:2px;
        padding-left:2px;
    }
    #principal{
        margin:4px;
        padding:4px;
        font-size:0.7em;
    }
    #address{
        font-size:0.8rem;
        padding-left:32px;
        padding-right:33px;
    }
        
    }
    #search{
        /*border:1px solid black;*/
        /*width:70%;*/
    }
    .searchtable{
        border:1px solid black;
        box-shadow:0 2px 4px grey;
        padding:50px;
        
    }

td{
    font-weight:500;
}
th{
    font-weight:700;
}
</style>
<center>
    <table class='table searchtable' id='table'>
        <form action="" method="get" id="search" >
        <?php if($myresultview2['methodfield']=='y'){?><tr>
            <td><strong><center>
    Select <?php echo esc_html($myresultview['classfield']);?></center></strong>
        </td>
        <td><center>
    <select name="sclass" id="select" >
        <?php foreach($rowclass as $rowclass){?>
    <option value="<?php echo esc_html($rowclass['id']);?>"><?php echo esc_html($rowclass['class']);?></option>
    <?php } ?>
</select></center>
        </td></tr><?php } ?>
        <tr><?php if($myresultview['methodfield']=='Roll Number'){$placeholder = $myresultview['rollfield'];?>
            <td><center>
<label for="sno"><strong><?php echo esc_html($myresultview['rollfield']);?></strong></label></center>
            </td><?php } ?>
            <?php if($myresultview['methodfield']=='Registration Number'){$placeholder = $myresultview['regnofield'];?>
            <td><center>
<label for="sno"><strong><?php echo esc_html($myresultview['regnofield']);?></strong></label></center>
            </td><?php } ?>
            <td><center>
<input style="width:200px" type="text" name="sno" placeholder="Type Your <?php echo esc_html($placeholder);?>" required></center>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><center>
<input type="submit" class="btn btn-primary" name="submit" value="Submit"></center>
            </td>
        </tr>
</form></center></table>
<br/>

<?php 
if(count($rowst)>0){
        if ($rowst['class']>0) {
            $stuclassid = $rowst['class'];
            $sqlsubject = "SELECT * FROM `{$prefix}eusr_subject` WHERE `id`= {$stuclassid}";
        }
    $rowssub = $wpdb->get_results($sqlsubject, ARRAY_A);
    $rowsub = $rowssub[0];
         
            
            $subjectssql = "SELECT * FROM `{$prefix}eusr_mark` WHERE `sid` = '{$rowst['sid']}'";
            $subjectstobedisplayed = $wpdb->get_results($subjectssql, ARRAY_A);
            if(count($subjectstobedisplayed)>0){
            $subjecttobedisplayed = $subjectstobedisplayed[0];
            $marks = unserialize($subjecttobedisplayed['marks']);
            }else{
                $marks = array();
            }
            $class = $wpdb->get_results("SELECT * FROM `{$prefix}eusr_class` WHERE `id` = {$rowst['class']}", ARRAY_A);
        if (count($resultview)==0 OR count($resultview)>0) {
            $rowview = $resultview[0];
            $rowcheck = $resultview[1];
            ?>

<?php 
$sqltype = $wpdb->get_results("SELECT * FROM `{$prefix}eusr_view_settings` WHERE `vid` = '3';", ARRAY_A);
$sqltype = $sqltype[0];
if($sqltype['methodfield']=="marksheet"){
?>
<div class='print' id='print'>
    <?php if($sqltype['titlefield']=="watermark"){?>
        <img class="watermark" style="background-repeat: no-repeat;z-index: 9999;opacity: 0.1;position: absolute;top: 0;bottom: 0;left:0;right:0;margin: auto;transform: rotate(320deg);filter: grayscale(10%);width:600px;" onerror="this.onerror=null; this.remove();" src="<?php echo wp_get_upload_dir()['baseurl'].'/result/'.esc_html($rowsc['logo']);?>"><?php }?>
    <center>
        <div class="photo" style="display:inline;">
<div id='schoolinfo'>
        <img style="width:100px;" onerror="this.onerror=null; this.remove();" src="<?php echo wp_get_upload_dir()['baseurl'].'/result/'.esc_html($rowsc['logo']);?>">
        <?php if (!empty($rowsc['sc_name'])) {?>
    </div>
        <h1 id="sc_name"><?php echo esc_html($rowsc['sc_name']);?></h1>
    </center>
    <center>
        <div style='' id="address"><?php echo esc_html($rowsc['vill']);?>, <?php echo esc_html($rowsc['ps']);?> ,
<?php echo esc_html($rowsc['dist']);?> ( <?php echo esc_html($rowsc['state']);?> ) <br /><br /><?php }if($rowcheck['titlefield']=='y'){?><h3 class="title"><?php echo esc_html($rowview['titlefield']);}?></h3>
            
            </div>
    </center>
    
    <table class='table mytable first' border='1' style='width:100%;'>
        <tr ><?php if($rowcheck['namefield']=='y'){?>
            <td <?php if($rowcheck['genderfield']!='y'){echo 'colspan="2"';}?>><center><strong><?php echo esc_html($rowview['namefield']);?></strong></center></td>
        <td <?php if($rowcheck['genderfield']!='y'){echo 'colspan="2"';}?>><center><?php echo esc_html($rowst['name']);?></center></td><?php }?>
        <?php if($rowcheck['genderfield']=='y'){?>
            <td <?php if($rowcheck['namefield']!='y'){echo 'colspan="2"';}?>><center><strong><?php echo esc_html($rowview['genderfield']);?></strong></center></td>
        <td <?php if($rowcheck['namefield']!='y'){echo 'colspan="2"';}?>><center><?php echo esc_html($rowst['gender']);?></center></td><?php } ?>
        </tr>
        
        <tr ><?php if($rowcheck['fnamefield']=='y'){?>
            <td <?php if($rowcheck['mnamefield']!='y'){echo 'colspan="2"';}?>><center><strong><?php echo esc_html($rowview['fnamefield']);?></strong></center></td>
        <td <?php if($rowcheck['mnamefield']!='y'){echo 'colspan="2"';}?>><center><?php echo esc_html($rowst['fname']);?></center></td><?php }?>
        <?php if($rowcheck['mnamefield']=='y'){?>
            <td <?php if($rowcheck['fnamefield']!='y'){echo 'colspan="2"';}?>><center><strong><?php echo esc_html($rowview['mnamefield']);?></strong></center></td>
        <td <?php if($rowcheck['fnamefield']!='y'){echo 'colspan="2"';}?>><center><?php echo esc_html($rowst['mname']);?></center></td><?php } ?>
        </tr>
        
        <tr ><?php if($rowcheck['classfield']=='y'){?>
            <td <?php if($rowcheck['rollfield']!='y'){echo 'colspan="2"';}?>><center><strong><?php echo esc_html($rowview['classfield']);?></strong></center></td>
        <td <?php if($rowcheck['rollfield']!='y'){echo 'colspan="2"';}?>><center><?php echo esc_html($class[0]['class']);?></center></td><?php }?>
        <?php if($rowcheck['rollfield']=='y'){?>
            <td <?php if($rowcheck['classfield']!='y'){echo 'colspan="2"';}?>><center><strong><?php echo esc_html($rowview['rollfield']);?></strong></center></td>
        <td <?php if($rowcheck['classfield']!='y'){echo 'colspan="2"';}?>><center><?php echo esc_html($rowst['sno']);?></center></td><?php } ?>
        </tr>
        <?php if($rowcheck['regnofield']=='y'){?>
        <tr><th colspan="2"><center><?php echo esc_html($rowview['regnofield']);?></center></th><td colspan="2"><center><?php echo esc_html($rowst['regno']);?></center></td></tr><?php } ?>
    </table><br/>
    <table class='responsive display second table mytable table-bordered' style='width:100%;' border='1'>
        <tr>
        <?php if($rowcheck['subjectfield']=='y'){?><th><center><?php echo esc_html($rowview['subjectfield']);?></center></th><?php } ?>
        <?php if($rowcheck['totalfield']=='y'){?><th><center><?php echo esc_html($rowview['totalfield']);?></center></th><?php } ?>
        <?php if($rowcheck['minimumfield']=='y'){?> <th><center><?php echo esc_html($rowview['minimumfield']);?></center></th><?php } ?>
        <?php if($rowcheck['obtainedfield']=='y'){?> <th><center><?php echo esc_html($rowview['obtainedfield']);?></center></th><?php } ?>
        <?php if($rowcheck['remarkfield']=='y'){?><th><center><?php echo esc_html($rowview['remarkfield']);?></center></th><?php } ?>
        </tr><?php if(count($marks)>0){foreach($marks as $key => $value){
            if($key == 'insub'){
                continue;
            }
            $subsql = "SELECT * FROM `{$prefix}eusr_subject` WHERE `id` = '{$key}'";
        $sub = $wpdb->get_results($subsql, ARRAY_A);   
        $sub = $sub[0];  
        
            $ifgrade = $sub['total']/100;
            if($value>(($sub['total'])-5*$ifgrade)){
                $remark = "AA";
            }elseif($value>(($sub['total'])-20*$ifgrade)){
                $remark = "A+";
            }elseif($value>(($sub['total'])-30*$ifgrade)){
                $remark = "A";
            }elseif($value>(($sub['total'])-40*$ifgrade)){
                $remark = "B+";
            }elseif($value>(($sub['total'])-60*$ifgrade)){
                $remark = "B";
            }elseif($value>(($sub['total'])-70*$ifgrade)){
                $remark = "C";
            }elseif($value>(($sub['total'])-75*$ifgrade)-$ifgrade){
                $remark = "D";
                }else{
                $remark = "Fail";
            }
            
            
            $obtainedtotal = $obtainedtotal + $value;
            $alltotal = $alltotal + $sub['total'];
            $allminmark = $allminmark + $sub['minmark'];
        ?>
        <tr>
        <?php if($rowcheck['subjectfield']=='y'){?><td><center><?php echo esc_html($sub['subname']);?></center></td><?php } ?>
        <?php if($rowcheck['totalfield']=='y'){?><td><center><?php echo esc_html($sub['total']);?></center></td><?php } ?>
        <?php if($rowcheck['minimumfield']=='y'){?><td><center><?php echo esc_html($sub['minmark']);?></center></td><?php } ?>
        <?php if($rowcheck['obtainedfield']=='y'){?><td>
                <center><?php echo esc_html($value);?></center>
        </td><?php } ?>
        <?php if($rowcheck['remarkfield']=='y'){?><td><center><?php echo esc_html($remark);?></center></td><?php } ?>
        </tr>
        <?php
        }}
        if($obtainedtotal>0){
        $viewpercentage = $obtainedtotal*100/$alltotal;
        $minpercentage = $allminmark*100/$alltotal;
        $ifgrade = $alltotal/100;
        if($obtainedtotal>(($alltotal)-40*$ifgrade)){
                $finalresult = "First Division";
            }elseif($obtainedtotal>(($alltotal)-60*$ifgrade)){
                $finalresult = "Second Division";
            }else{
                $finalresult = "Third Division";
            }
        if($viewpercentage>=95){
            $totalremark = "Outstanding";
        }elseif($viewpercentage>80){
            $totalremark = "Exceptional";
        }elseif($viewpercentage>70){
            $totalremark = "Excellent";
        }elseif($viewpercentage>55){
            $totalremark = "Good";
        }elseif($viewpercentage>40){
            $totalremark = "Satisfactory";
        }elseif($viewpercentage>30){
            $totalremark = "Partially Acceptable";
        }elseif($viewpercentage>25){
            $totalremark = "Barely Acceptable";
        }else{
            $totalremark = "Unacceptable";
        }}
        ?>
        <tr>
    <?php if($rowcheck['subjectfield']=='y'){?><th><center>Total</center></th><?php } ?>
    <?php if($rowcheck['totalfield']=='y'){?> <th><center>= <?php echo esc_html($alltotal);?></center></th><?php } ?>
    <?php if($rowcheck['minimumfield']=='y'){?> <th><center>= <?php echo esc_html($allminmark);?></center></th><?php } ?>
    <?php if($rowcheck['obtainedfield']=='y'){?> <th><center>= <?php echo esc_html($obtainedtotal);?></center></th><?php } ?>
    <?php if($rowcheck['remarkfield']=='y'){?> <th><center><?php echo esc_html($totalremark);?></center></th><?php } ?>
        </tr>
    </table><br/>
    <h4 class="title">
        <center>Results</center>
    </h4>
    <center>
    <table class='table third mytable' border='1'>
        <tr>
        <?php if($rowcheck['percentage']=='y'){?> <th><center><?php echo esc_html($rowview['percentage']);?></center></th>
        <td><center> <?php echo esc_html(number_format($viewpercentage, 2, '.', ''));?> %</center></td><?php } ?>
        <?php if($rowcheck['minimumpercentage']=='y'){?><th><center><?php echo esc_html($rowview['minimumpercentage']);?></center></th>
        <td> <center><?php echo esc_html(number_format($minpercentage, 2, '.', ''));?> % </center></td><?php } ?>
        <?php if($rowcheck['finalresult']=='y'){?> <th><center><?php echo esc_html($rowview['finalresult']);?></center></th>
        <td><center><?php if($resultview[2]['finalresult']=='automatic'){ echo $finalresult;}else{echo $rowst['remark'];}?></center></td><?php } ?>
    </table></center><br/>
    
    <?php if($rowcheck['principalfield']=='y' AND !empty($rowsc['field1'])){?>
    <h5 id="principal" style="float:right;"><?php echo esc_html($rowview['principalfield']);?> : <b><?php if(count($rowsco)>0){echo esc_html($rowsc['field1']);}?></b> </h5>
    <?php }}?>
</div>
<?php }
}if($sqltype['methodfield']=="normal"){
    ?>
    <div id="print">
        <?php if($sqltype['titlefield']=="watermark"){?>
        <img class="watermark" style="background-repeat: no-repeat;z-index: 9999;opacity: 0.1;position: absolute;top: 0;bottom: 0;left:0;right:0;margin: auto;transform: rotate(320deg);filter: grayscale(10%);width:600px;" onerror="this.onerror=null; this.remove();" src="<?php echo wp_get_upload_dir()['baseurl'].'/result/'.esc_html($rowsc['logo']);?>"><?php }?>
        <center>
        <div class="photo" style="display:inline;">
<div id='schoolinfo'>
        <img style="width:100px;" onerror="this.onerror=null; this.remove();" src="<?php echo wp_get_upload_dir()['baseurl'].'/result/'.esc_html($rowsc['logo']);?>">
        <?php if (!empty($rowsc['sc_name'])) {?>
    </div>
        <h1 id="sc_name"><?php echo esc_html($rowsc['sc_name']);?></h1>
    </center>
    <center>
        <div style='' id="address"><?php echo esc_html($rowsc['vill']);?>, <?php echo esc_html($rowsc['ps']);?> ,
<?php echo esc_html($rowsc['dist']);?> ( <?php echo esc_html($rowsc['state']);?> ) <br /><br /><?php }?>
            
            </div>
    </center>
    <center>
        <table class='table'>
            <?php
            if($myresultview2['titlefield']=='y'){?>
            <tr><td colspan="2"><center><h3>Progress Report</h3></center></td></tr><?php }?>
            <?php $normalrows = $wpdb->get_results($sqlst,ARRAY_A);
            $normalrow = $normalrows[0];
            $normaltotal =0;
            foreach($normalrow as $key => $value){
                if($key=='class'){
                    continue;
                }
                if($key=='sid'){
                    continue;
                }
                if($key=='sno'){
                    $key = $myresultview['rollfield'];
                    if($myresultview2['rollfield']!='y'){
                        $value="";
                    }
                }
                if($key=='regno'){
                    $key = $myresultview['regnofield'];
                    if($myresultview2['regnofield']!='y'){
                        $value="";
                    }
                }
                if($key=='name'){
                    $key = $myresultview['namefield'];
                    if($myresultview2['namefield']!='y'){
                        $value="";
                    }
                }
                if($key=='gender'){
                    $key = $myresultview['genderfield'];
                    if($myresultview2['genderfield']!='y'){
                        $value="";
                    }
                }
                if($key=='fname'){
                    $key = $myresultview['fnamefield'];
                    if($myresultview2['fnamefield']!='y'){
                        $value="";
                    }
                }
                if($key=='mname'){
                    $key = $myresultview['mnamefield'];
                    if($myresultview2['mnamefield']!='y'){
                        $value="";
                    }
                }
                if($value==''){
                    continue;
                }
            ?>
            <tr>
                <td><?php echo $key;?></td>
                <td><?php echo $value;?></td>
            </tr>
            <?php }?>
            <?php $classrows = $wpdb->get_results("SELECT * FROM `{$prefix}eusr_class` WHERE `id` = '{$sclass}';",ARRAY_A);
            $classrow = $classrows[0];
            foreach($classrow as $key => $value){
                if($key=='id'){
                    continue;
                }
                if($key=='class'){
                    $key = $myresultview['classfield'];
                }
                if($value==''){
                    continue;
                }
            if($myresultview2['classfield']=='y'){?>
            <tr>
                <td><?php echo $key;?></td>
                <td><?php echo $value;?></td>
            </tr>
            <?php } }?>
            <?php $markrows = $wpdb->get_results("SELECT * FROM `{$prefix}eusr_mark` WHERE `sid` = '{$normalrow['sid']}';",ARRAY_A);
            $markrow = $markrows[0];
            $normalfinalresult;
            $normalsubjectscount=0;
            $markrow = unserialize($markrow['marks']);
            foreach($markrow as $key => $value){
                 $subjectrows = $wpdb->get_results("SELECT * FROM `{$prefix}eusr_subject` WHERE `id` = '{$key}'", ARRAY_A);
            $subjectrow = $subjectrows[0];
                if($key=='insub'){
                    continue;
                }
                if($value==''){
                    continue;
                }
                $normaltotal += $value;
                $normalsubjectscount++;
            ?>
            <tr>
                <td><?php echo $subjectrow['subname'];?></td>
                <td><?php echo $value;?></td>
            </tr>
            <?php }?>
            <?php $normalpercentage = $normaltotal/$normalsubjectscount;
            ?>
            <?php
            if($myresultview2['totalfield']=='y'){?>
            <tr>
                <td><?php echo $myresultview['totalfield'];?></td>
                <td><?php echo $normaltotal;?></td>
            </tr><?php }
            if($myresultview2['percentage']=='y'){?>
            <tr>
                <td><?php echo $myresultview['percentage'];?></td>
                <td><?php echo $normalpercentage." %";?></td>
            </tr>
            <?php } if($normalpercentage>90){
                $normalfinalresult = "AA";
            }
            elseif($normalpercentage>75){
                $normalfinalresult = "A+";
            }
            elseif($normalpercentage>65){
                $normalfinalresult = "A";
            }
            elseif($normalpercentage>55){
                $normalfinalresult = "B+";
            }
            elseif($normalpercentage>45){
                $normalfinalresult = "B";
            }
            elseif($normalpercentage>35){
                $normalfinalresult = "C+";
            }
            elseif($normalpercentage>=25){
                $normalfinalresult = "C";
            }else{
                $normalfinalresult = "D";
            }
            if($myresultview2['finalresult']=='y'){?>
            <tr>
                <td><?php echo $myresultview['finalresult'];?></td>
                <td><?php if($resultview[2]['finalresult']=='automatic'){ echo $normalfinalresult;}else{echo $rowst['remark'];}?></td>
            </tr><?php }
            if($myresultview2['principalfield']=='y'){?>
            <tr>
                <td><?php echo $myresultview['principalfield'];?></td>
                <td><?php echo $rowsc['field1']?></td>
            </tr><?php }?>
        </table>
        </center>
    </div>
    <?php }
        if(empty($rowsto[0]) AND isset($_GET['submit'])){
    echo '<center><h1>No Result Found</h1></center>';}elseif(isset($_GET['submit'])){
        ?><center><input style="margin-top:10px;" type="button" class="btn btn-info" value="Print This Marksheet !!!" onclick="eusr_print_this();"></center><?php
    }
    ?>
    <script>
function eusr_print_this()
{
	   var divToPrint = document.getElementById('print');
	   var popupWin = window.open('', '_blank', 'width=800,height=600');
	   popupWin.document.open();
	   popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
	   popupWin.document.close();
}
</script>
