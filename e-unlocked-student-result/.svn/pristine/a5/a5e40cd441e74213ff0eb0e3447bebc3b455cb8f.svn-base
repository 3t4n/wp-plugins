<?php
DEFINED('ABSPATH') or die("You can't access this file.");
global $wpdb;
$prefix = $wpdb->prefix;
if (isset($_GET['redirect'])) {
if ($_GET['redirect'] == 'success') {
    echo "<div id='message_div' class='alert alert-success'><center>Student Record Added Successfully</center></div>";
}}
$name = '';
$gender = '';
$fname = '';
$mname = '';
$class = '';
$sno = '';
$regno = '';
if (isset($_POST['sno'])) {
    $sno = sanitize_text_field($_POST['sno']);
}
if (isset($_POST['regno'])) {
    $regno = sanitize_text_field($_POST['regno']);
}
if (isset($_POST['name'])) {
    $name = sanitize_text_field($_POST['name']);
}
if (isset($_POST['gender'])) {
    $gender = sanitize_text_field($_POST['gender']);
}
if (isset($_POST['class'])) {
    $class = sanitize_text_field($_POST['class']);
}
if (isset($_POST['fname'])) {
    $fname = sanitize_text_field($_POST['fname']);
}
if (isset($_POST['mname'])) {
    $mname = sanitize_text_field($_POST['mname']);
}





if(isset($_POST['submit'])){
$added = $wpdb->insert($prefix.'eusr_student_result', array('sid'=>NULL, 'sno'=>$sno, 'regno'=>$regno, 'name'=>$name, 'gender'=>$gender, 'fname'=>$fname, 'mname'=>$mname, 'class'=>$class), array('%d', '%s','%s','%s','%s','%s','%s','%d' ));

if($added>0){

header('Location: '.admin_url("admin.php?page=eusr-add-record&redirect=success"));
}
}


?>
<style>

    .gender{
    display:flex;
    flex-direction: row;
}
.undergender{
    margin:0px;
    padding:0px;
}
#read{
    color:#FF0000;
    text-decoration: underline;
}
    </style>
<div class="container">
<div id="adddiv">
    <h1>Add Student</h1>
<table class="table ml-4 mr-4">
<form action="" method="POST">
<tr>
<td><strong>Roll Number :</strong></td>
<td><input type="text" placeholder="Enter Serial Number" name="sno" id="sno"></td>
<td><strong>Registration No :</strong></td>
<td><input type="text" placeholder="Enter Registration Number" name="regno" id="regno"></td>
</tr>
<tr>
<td><strong>Name :</strong></td>
<td><input type="text" placeholder="Enter Student Name" required name="name" id="name"></td>
<td><strong>Gender :</strong></td>
<td ><div class='gender'><input class='undergender' type="radio" id="male" name="gender" value="MALE">
  <label for="male">Male</label><br>
  <input class='undergender' type="radio" id="female" name="gender" value="FEMALE">
  <label for="female">Female</label><br>
  <input class='undergender' type="radio" id="other" name="gender" value="OTHERS">
  <label for="other">Others</label></div></td>
</tr>
<tr>
<td><strong>Class :</strong></td>
<td><select name="class" id="class">
<?php 
$sqlclass = "SELECT * FROM `{$prefix}eusr_class`";
$class = $wpdb->get_results($sqlclass, ARRAY_A);
foreach($class as $class){?>
<option value="<?php echo esc_html($class['id']);?>"><?php echo esc_html($class['class']);?></option>
<?php } ?>
    </select></td>

<td><strong>Father's Name :</strong></td>
<td><input type="text" placeholder="Enter Father's Name" name="fname" id="fname"></td>
</tr>
<tr><td></td>
<td><strong>Mother's Name :</strong></td>
<td><input type="text" placeholder="Enter Mother's Name" name="mname" id="mname"></td><td></td>
</tr>

<tr>
<td></td>
<td></td>
<td><input class="btn btn-primary" type="submit" name='submit' value="Submit"></td>
<td></td>
</tr>
</form>
</table>
</div>
<div align="center" id="div">
    <h1 id="csvheading">Add Records Using CSV</h1>
    <table class='table ml-4 mr-4'>
    <div class="file-field">
<form method="post" action="" enctype="multipart/form-data">
    
        <tr>
            <td><strong><h5>Choose CSV file</h5></strong></td>
      <td><div id="nocursor" class="btn btn-success btn-sm">
      <input type="file" name="file"></div></td>
      </tr>
      <tr><td></td>
      <td><input class="btn btn-primary" type="submit" name="submitcsv" value="Import" id="import"></td>
      
      </tr>
    
    <button class="btn btn-success" id="float-right"><a href="<?php echo plugins_url('/e-unlocked-student-result/files/format.csv');?>">Download CSV Format</a></button>
  </table>
        <h5>Note : <a id="read" href="<?php echo admin_url('admin.php?page=eusr-help#import');?>">Read this</a> before uploading csv file</h5>
  </div>
</form>
</div>
</div>

<?php
if (isset($_POST['submitcsv'])) {
    if ($_FILES['file']['name']) {
        $filename = explode('.', $_FILES['file']['name']);
        if ($filename[1]=='csv') {
            $handle = fopen($_FILES['file']['tmp_name'], 'r');
            $sqlis = "no";
            while ($data = fgetcsv($handle)) {
                ?>
                <form method='post' action=''>
                    <?php
               $csvsubjects = array();
               $csvmarks = array();
                $snocsv = $wpdb->_real_escape($data[0]);
                $regnocsv = $wpdb->_real_escape($data[1]);
                $namecsv = $wpdb->_real_escape($data[2]);
                if(empty($namecsv)){
                    continue;
                }
                $gendercsv = sanitize_text_field($wpdb->_real_escape($data[3]));
                $fnamecsv = sanitize_text_field($wpdb->_real_escape($data[4]));
                $mnamecsv = sanitize_text_field($wpdb->_real_escape($data[5]));
                $remarkcsv = sanitize_text_field($wpdb->_real_escape($data[6]));
                $classid = sanitize_text_field($wpdb->_real_escape($data[7]));
                $subjectid1 = sanitize_text_field($wpdb->_real_escape($data[8]));
                $mark1 = sanitize_text_field($wpdb->_real_escape($data[9]));
                if(!empty($subjectid1)){
                array_push($csvsubjects, $subjectid1);
                array_push($csvmarks, $mark1);
                }
                $subjectid2 = sanitize_text_field($wpdb->_real_escape($data[10]));
                $mark2 = sanitize_text_field($wpdb->_real_escape($data[11]));
                if(!empty($subjectid2)){
                array_push($csvsubjects, $subjectid2);
                array_push($csvmarks, $mark2);
                }
                $subjectid3 = sanitize_text_field($wpdb->_real_escape($data[12]));
                $mark3 = sanitize_text_field($wpdb->_real_escape($data[13]));
                if(!empty($subjectid3)){
                array_push($csvsubjects, $subjectid3);
                array_push($csvmarks, $mark3);
                }
                $subjectid4 = sanitize_text_field($wpdb->_real_escape($data[14]));
                $mark4 = sanitize_text_field($wpdb->_real_escape($data[15]));
                if(!empty($subjectid4)){
                array_push($csvsubjects, $subjectid4);
                array_push($csvmarks, $mark4);
                }
                $subjectid5 = sanitize_text_field($wpdb->_real_escape($data[16]));
                $mark5 = sanitize_text_field($wpdb->_real_escape($data[17]));
                if(!empty($subjectid5)){
                array_push($csvsubjects, $subjectid5);
                array_push($csvmarks, $mark5);
                }
                $subjectid6 = sanitize_text_field($wpdb->_real_escape($data[18]));
                $mark6 = sanitize_text_field($wpdb->_real_escape($data[19]));
                if(!empty($subjectid6)){
                array_push($csvsubjects, $subjectid6);
                array_push($csvmarks, $mark6);
                }
                $subjectid7 = sanitize_text_field($wpdb->_real_escape($data[20]));
                $mark7 = sanitize_text_field($wpdb->_real_escape($data[21]));
                if(!empty($subjectid7)){
                array_push($csvsubjects, $subjectid7);
                array_push($csvmarks, $mark7);
                }
                $subjectid8 = sanitize_text_field($wpdb->_real_escape($data[22]));
                $mark8 = sanitize_text_field($wpdb->_real_escape($data[23]));
                if(!empty($subjectid8)){
                array_push($csvsubjects, $subjectid8);
                array_push($csvmarks, $mark8);
                }
                $subjectid9 = sanitize_text_field($wpdb->_real_escape($data[24]));
                $mark9 = sanitize_text_field($wpdb->_real_escape($data[25]));
                if(!empty($subjectid9)){
                array_push($csvsubjects, $subjectid9);
                array_push($csvmarks, $mark9);
                }
                $subjectid10 = sanitize_text_field($wpdb->_real_escape($data[26]));
                $mark10 = sanitize_text_field($wpdb->_real_escape($data[27]));
                if(!empty($subjectid10)){
                array_push($csvsubjects, $subjectid10);
                array_push($csvmarks, $mark10);
                }
                $subjectid11 = sanitize_text_field($wpdb->_real_escape($data[28]));
                $mark11 = sanitize_text_field($wpdb->_real_escape($data[29]));
                if(!empty($subjectid11)){
                array_push($csvsubjects, $subjectid11);
                array_push($csvmarks, $mark11);
                }
                $subjectid12 = sanitize_text_field($wpdb->_real_escape($data[30]));
                $mark12 = sanitize_text_field($wpdb->_real_escape($data[31]));
                if(!empty($subjectid12)){
                array_push($csvsubjects, $subjectid12);
                array_push($csvmarks, $mark12);
                }
                $subjectid13 = sanitize_text_field($wpdb->_real_escape($data[32]));
                $mark13 = sanitize_text_field($wpdb->_real_escape($data[33]));
                if(!empty($subjectid13)){
                array_push($csvsubjects, $subjectid13);
                array_push($csvmarks, $mark13);
                }
                $subjectid14 = sanitize_text_field($wpdb->_real_escape($data[34]));
                $mark14 = sanitize_text_field($wpdb->_real_escape($data[35]));
                if(!empty($subjectid14)){
                array_push($csvsubjects, $subjectid14);
                array_push($csvmarks, $mark14);
                }
                $subjectid15 = sanitize_text_field($wpdb->_real_escape($data[36]));
                $mark15 = sanitize_text_field($wpdb->_real_escape($data[37]));
                if(!empty($subjectid15)){
                array_push($csvsubjects, $subjectid15);
                array_push($csvmarks, $mark15);
                }
                $combinedarray = array_combine($csvsubjects, $csvmarks);
                $num = $wpdb->get_results("SELECT AUTO_INCREMENT
                FROM information_schema.tables
                WHERE table_name = '{$prefix}eusr_student_result'
                AND table_schema = DATABASE( ) ;", ARRAY_N);
                $tobesid = $num[0][0];;
                    
                $serialized = serialize($combinedarray);   
                if($sqlis=="yes"){
                    $csvimported = $wpdb->insert($prefix.'eusr_student_result', array('sid'=>NULL, 'sno'=>$snocsv, 'regno'=>$regnocsv, 'name'=>$namecsv, 'fname'=>$fnamecsv, 'mname'=>$mnamecsv, 'remark'=>$remarkcsv,'gender'=>$gendercsv, 'class'=>$classid));
                    $markimported = $wpdb->insert($prefix.'eusr_mark', array('id'=>NULL, 'sid'=>$tobesid, 'marks'=>$serialized));
                }else{
                $sqlis = "yes";
                
                }
                
                
            }
            header('Location: '.admin_url("admin.php?page=eusr-all-students&csv=imported"));
            fclose($handle);
            
        }
    }
}
?>