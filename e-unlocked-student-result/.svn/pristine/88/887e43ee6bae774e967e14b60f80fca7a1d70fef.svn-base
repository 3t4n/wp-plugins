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
    $classes = '';
    $studentsinclass = '';

$sqlsc = "SELECT * FROM `{$prefix}eusr_school_info`";
$sqlst = "SELECT * FROM `{$prefix}eusr_student_result`";
$sqlclass = "SELECT * FROM `{$prefix}eusr_class`";
$sqlsubject = "SELECT * FROM `{$prefix}eusr_subject`";
$rowsc =array();
$rowsco = array();
$rowst = array();
$rowsto = array();
if (1) {
    $rowsco = $wpdb->get_results($sqlsc, ARRAY_A);
    $rowsto = $wpdb->get_results($sqlst, ARRAY_A);
    $classes = $wpdb->get_results($sqlclass, ARRAY_A);
    $subjects = $wpdb->get_results($sqlsubject, ARRAY_A);
    if (count($rowsco)>0) {
        # code...
        $rowsc = $rowsco[0];
    }
    
}?>
<style>
    .firstdiv{
        margin:12px;
        padding:8px;
    }
    .seconddiv{
        margin:12px;
        padding:15px;
        box-shadow:0 2px 3px black;
    }
    td{
        border-left:1px solid rgba(0,0,0,0.1);
        border-right:1px solid rgba(0,0,0,0.1);
        border-bottom:1px solid rgba(0,0,0,0.1);
        box-shadow:0 1px 1px rgba(0,0,0,0.1);
        font-weight:600;
    }
    .dashboard{
        border:1px solid #007bff;
        width:300px;
        padding:8px;
        box-shadow:0 3px 7px #007bff;
        background-color:#007bff;
        border-radius:10px;
    }
    .dashboard h1,h3{
        margin-top:9px;
        color:white;
    }
    .firstdiv{
        display:flex;
        justify-content:center;
        background-color:rgba(26, 123, 255,0.2);
        border-radius:10px;
    }
    .about{
        /*width:95%;*/
        margin:5px auto;
        padding:3px;
        background-color:rgba(26, 123, 255,1);
        border-radius:15px;
        font-size:1.4rem;
        color:white;
        text-align:center;
        font-weight:600;
    }
    .dashbtn{
        float:right;
        margin-right:8px;
        border:1px solid white;
        padding:3px;
    }
    .dashbtn:hover{
        background-color:grey;
        border:1px solid black;
        transition:0.5s;
    }
</style>
<div class='container'>
    <div class='firstdiv'>
        <div class='dashboard'><?php if(!empty($rowsc)){?>
            <center><img style="width:100px;" onerror="this.onerror=null; this.remove();" src="<?php echo wp_get_upload_dir()['baseurl'].'/result/'.esc_html($rowsc['logo']);?>"></center>
            <center><h3 id="sc_name"><?php echo esc_html($rowsc['sc_name']);?></h3></center><?php } ?>
            <h1><center>Dashboard</center></h1>
        </div>
    </div>
    
    <div class='seconddiv'>
        <div class="about">
            School Information
            <a class="btn btn-primary dashbtn" href="<?php echo admin_url('admin.php?page=eusr-settings&option=school');?>">Edit School</a>
        </div>
        <table class='table'>
             <thead class="thead-dark">
                 <tr>
                    <th scope="col"><center>School Name</center></th>
                    <th scope="col"><center>Address</center></th>
                    <th scope="col"><center>Contact No</center></th>
                    <th scope="col"><center>Principal</center></th>
                    <th scope="col"><center>Website</center></th>
                 </tr>
             </thead>
             <tbody><?php if(!empty($rowsc)){?>
                 <tr>
                     <td><center><?php echo esc_html($rowsc['sc_name']);?></center></td>
                     <td><center><?php echo esc_html($rowsc['vill']);?>, <?php echo esc_html($rowsc['ps']);?>, <?php echo esc_html($rowsc['dist']);?>, <?php echo esc_html($rowsc['pin']);?> (<?php echo esc_html($rowsc['state']);?>)</center></td>
                     <td><center><?php echo esc_html($rowsc['contact']);?></center></td>
                     <td><center><?php echo esc_html($rowsc['field1']);?></center></td>
                     <td><center><?php echo esc_html($rowsc['website']);?></center></td>
                 </tr><?php } ?>
             </tbody>
        </table>
    </div>
    
    <div class='seconddiv'>
        <div class="about">
            Class Information
            <a class="btn btn-primary dashbtn" href="<?php echo admin_url('admin.php?page=eusr-class');?>">Add Class</a>
        </div>
        <table class='table'>
             <thead class="thead-dark">
                 <tr>
                    <th scope="col"><center>Class Id</center></th>
                    <th scope="col"><center>Class Name</center></th>
                    <th scope="col"><center>No of Subjects in this Class</center></th>
                    <th scope="col"><center>No of Students in this Class</center></th>
                 </tr>
             </thead>
             <tbody><?php foreach($classes as $class){
             $studentsinclass = "SELECT * FROM `{$prefix}eusr_student_result` where `class` = '{$class['id']}'";
             $noofsubjectinclass = $wpdb->query("SELECT * FROM `{$prefix}eusr_subject` WHERE `class` = '{$class['id']}'");
             $classresult = $wpdb->query($studentsinclass);
             ?>
                 <tr>
                     <td><center><?php echo esc_html($class['id']);?></center></td>
                     <td><center><?php echo esc_html($class['class']);?></center></td>
                     <td><center><?php echo esc_html($noofsubjectinclass);?></center></td>
                     <td><center><?php echo esc_html($classresult);?></center></td>
                 </tr><?php } ?>
             </tbody>
        </table>
    </div>
    <div class='seconddiv'>
        <div class="about">
            Subject Information
            <a class="btn btn-primary dashbtn" href="<?php echo admin_url('admin.php?page=eusr-subject');?>">Add Subject</a>
        </div>
        <table class='table'>
             <thead class="thead-dark">
                 <tr>
                    <th scope="col"><center>Subject Id</center></th>
                    <th scope="col"><center>Subject Name</center></th>
                    <th scope="col"><center>Minimum Mark</center></th>
                    <th scope="col"><center>Total Mark</center></th>
                    <th scope="col"><center>Class Id</center></th>
                    <th scope="col"><center>Class Name</center></th>
                 </tr>
             </thead>
             <tbody><?php foreach($subjects as $subject){
              $classsubsql = "SELECT * FROM `{$prefix}eusr_class` where `id` = '{$subject['class']}'";
             $subjectresult = $wpdb->get_results($classsubsql, ARRAY_A);
             ?>
                 <tr>
                     <td><center><?php echo esc_html($subject['id']);?></center></td>
                     <td><center><?php echo esc_html($subject['subname']);?></center></td>
                     <td><center><?php echo esc_html($subject['minmark']);?></center></td>
                     <td><center><?php echo esc_html($subject['total']);?></center></td>
                     <td><center><?php echo esc_html($subjectresult[0]['id']);?></center></td>
                     <td><center><?php echo esc_html($subjectresult[0]['class']);?></center></td>
                 </tr><?php } ?>
             </tbody>
        </table>
    </div>
    
</div>