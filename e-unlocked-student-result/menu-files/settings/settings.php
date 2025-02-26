<?php
DEFINED('ABSPATH') or die("You can't access this file.");
global $wpdb;
$prefix = $wpdb->prefix;
$generalactive = '';
$viewactive = '';
$schoolactive = '';
$classdelete = '';
if(isset($_GET['delete'])){
if ($_GET['delete'] == 'success') {
    echo "<div id='message_div' class='alert alert-success'><center>Student Records Deleted Successfully</center></div>";
}}
if(isset($_GET['type'])){
if ($_GET['type'] == 'changed') {
    echo "<div id='message_div' class='alert alert-success'><center>Settings have been saved Successfully</center></div>";
}}
if(isset($_GET['option'])){
if($_GET['option']=='school'){
    $schoolactive = 'active';
}elseif($_GET['option']=='view'){
    $viewactive = 'active';
}}else{
    $generalactive = 'active';
}
if(isset($_GET['deletelogo'])){
if ($_GET['deletelogo'] == 'true') {
       function rmrf($dir) {
    foreach (glob($dir) as $file) {
        if (is_dir($file)) { 
            rmrf("$file/*");
        } else {
            unlink($file);
        }
    }
}
    rmrf(wp_get_upload_dir()['basedir'].'/result');
    $logo = '';
    $wpdb->query("UPDATE `{$prefix}eusr_school_info` SET `logo` = '{$logo}' WHERE `sc_id` = 1");
    echo "<div id='message_div' class='alert alert-success'><center>Logo has been Deleted Successfully</center></div>";
}}
?>
<style>
</style>

<?php
echo '<div id="options" class="options"><button class="btn '.$generalactive.' btn-dark"><a href="'.admin_url("admin.php?page=eusr-settings").'">General Setting</a></button><button class="btn '.$schoolactive.' btn-dark"><a href="'.admin_url("admin.php?page=eusr-settings&option=school").'">School Info</a></button><button class="btn '.$viewactive.' btn-dark"><a href="'.admin_url("admin.php?page=eusr-settings&option=view").'">Edit Marksheet Fields</a></button></div>';
if (isset($_GET['redirect'])) {
if ($_GET['redirect'] == 'success') {
    
        echo "<div class='alert alert-success'>School Information Updated Successfully</div>";
    
}}
if(isset($_GET['option'])){
if($_GET['option']=='school'){
?>
<div class='mycontainer'>
<h2 class="ml-4 mt-4 mb-2">Enter School Information</h2>
<form action="" method="post" enctype="multipart/form-data"> 
    <div class="container mx-5 my-4 pb-0">
    <table class='table'>
        <?php
        $rowv = Array ( 'sc_id' => '1' ,'sc_name' => '' ,'vill' => '' ,'pin' => '', 'ps' => '' ,'dist' => '' ,'state' => '' ,'contact' => '' ,'website' => '', 'logo' => '', 'field1' => '' );
         $sqlv = "SELECT * FROM `{$prefix}eusr_school_info`";
        $wpdb->query($sqlv);
        $resultv = $wpdb->get_results($sqlv, ARRAY_A);
        // var_dump($resultv);
        if (count($resultv)==0 OR count($resultv)>0) {
            if(count($resultv)>0){
                $rowv = $resultv[0];
            }
        ?>
        <tr>
            <td>Schhol Name:</td>
            <td><input type="text" name="sc_name" placeholder="Enter School Name" value="<?php echo esc_html($rowv['sc_name']);?>"></td>
        </tr>
        <tr>
            <td>Village:</td>
            <td><input type="text" name="vill" placeholder="Enter Village" value="<?php echo esc_html($rowv['vill']);?>"></td>
        </tr>
        <tr>
            <td>Police Station:</td>
            <td><input type="text" name="ps" placeholder="Enter Police Station" value="<?php echo esc_html($rowv['ps']);?>"></td>
        </tr>
        <tr>
            <td>District:</td>
            <td><input type="text" name="dist" placeholder="Enter District" value="<?php echo esc_html($rowv['dist']);?>"></td>
        </tr>
        <tr>
            <td>Pin Code:</td>
            <td><input type="text" name="pin" placeholder="Enter Pin Number" value="<?php echo esc_html($rowv['pin']);?>"></td>
        </tr>
        <tr>
            <td>State:</td>
            <td><input type="text" name="state" placeholder="Enter State" value="<?php echo esc_html($rowv['state']);?>"></td>
        </tr>
        <tr>
            <td>Contact No:</td>
            <td><input type="text" name="contact" placeholder="Enter Contact Number" value="<?php echo esc_html($rowv['contact']);?>"></td>
        </tr>
        <tr>
            <td>Principal :</td>
            <td><input type="text" name="field1" placeholder="Enter Principal Name" value="<?php echo esc_html($rowv['field1']);?>"></td>
        </tr>
        <tr>
            <td>Website:</td>
            <td><input type="text" name="website" placeholder="Enter Website Url" value="<?php echo esc_html($rowv['website']);?>"></td>
        </tr>
        <tr>
            <td>Upload Logo:<br><br><a href="<?php echo admin_url('admin.php?page=eusr-settings&option=school&deletelogo=true'); ?>" onclick="return eusr_show_confirm();" rel="tooltip" class="btn btn-primary">Delete Logo</a></td>
            <td><input type="file" name="logo"><img width="100" alt="No Logo Uploaded" src="<?php echo wp_get_upload_dir()['baseurl'].'/result/'.esc_html($rowv['logo']);?>"></td>
        </tr>
        <tr>
            <td></td>
            <td><input class='btn btn-success m-auto' type="submit"  value="Submit" name="submit"></td>
        </tr>
    </table>
    </div>

        <?php
$logo = $rowv['logo'];
        }?>

</form>
<?php 

$name = '';
$vill = '';
$ps = '';
$dist = '';
$pin = '';
$state = '';
$contact = '';
$field1 = '';
$website = '';
if (isset($_POST['submit'])) {
    $name = sanitize_text_field($_POST['sc_name']);
    $vill = sanitize_text_field($_POST['vill']);
    $ps = sanitize_text_field($_POST['ps']);
    $dist = sanitize_text_field($_POST['dist']);
    $pin = sanitize_text_field($_POST['pin']);
    $state = sanitize_text_field($_POST['state']);
    $contact = sanitize_text_field($_POST['contact']);
    $field1 = sanitize_text_field($_POST['field1']);
    $website = sanitize_text_field($_POST['website']);
    $sql = "";
    // $extension = array('0' => '' , '1' => '');
    if(isset($_FILES['logo'])){
    $filename = sanitize_file_name($_FILES['logo']['name']);
    $filetmp = sanitize_text_field($_FILES['logo']['tmp_name']);
    $extension = explode('.', $_FILES['logo']['name']);
    function recursive_sanitize_text_field($array) {
    foreach ( $array as $key => &$value ) {
        if ( is_array( $value ) ) {
            $value = recursive_sanitize_text_field($value);
        }
        else {
            $value = sanitize_text_field( $value );
        }
    }

    return $array;
}
    $extension = recursive_sanitize_text_field($extension);
    if(count($extension)>1){
    $logo = $extension[0] . rand() .'.'. $extension[1];
    move_uploaded_file($filetmp, wp_get_upload_dir()['basedir'].'/result/'.$logo);}
        
    }
    if (count($resultv)>=1) {
        $sql = "UPDATE `{$prefix}eusr_school_info` SET `sc_name` = '{$name}', `vill` = '{$vill}', `pin` = '{$pin}', `ps` = '{$ps}', `dist` = '{$dist}', `state` = '{$state}', `contact` = '{$contact}', `website` = '{$website}', `logo` = '{$logo}', `field1` = '{$field1}' WHERE `sc_id` = 1";
    }else {
        $sql = "INSERT INTO `{$prefix}eusr_school_info` (`sc_id`, `sc_name`, `vill`, `pin`, `ps`, `dist`, `state`, `contact`, `website`, `logo`, `field1`) VALUES (1, '$name', '$vill', '$pin', '$ps', '$dist', '$state', '$contact', '$website', '{$logo}', '{$field1}')";
    }
    
    global $wpdb;
    
    
    if ($wpdb->query($sql)) {
    
        header('Location: '.admin_url("admin.php?page=eusr-settings&option=school&redirect=success"));
    }
}}}
if(!isset($_GET['option'])){
    if(isset($_POST['classdelete'])){
    $classdelete = filter_var($_POST['classdelete'], FILTER_SANITIZE_NUMBER_INT);}
    $sqldelete = "DELETE FROM `{$prefix}eusr_student_result`";
    $sqldelete2 = "DELETE FROM `{$prefix}eusr_mark`";
    $sqldelete3 = "DELETE FROM `{$prefix}eusr_student_result` WHERE `class` = '{$classdelete}'";
    $sqldelete4 = "DELETE FROM `{$prefix}eusr_mark` WHERE `class` = '{$classdelete}'";
    $classsql = "SELECT * FROM `{$prefix}eusr_class`";
    $classes = $wpdb->get_results($classsql, ARRAY_A);
    ?>
    <div id="generalsetting" class='mycontainer'>
        <h2>General Settings</h2>
        <table class="table">
            <tr>
                <td><strong>Want to Delete all the Student Results?</strong></td>
                <td>
<button onclick="document.getElementById('deletemodal').style.display='block'" id="btndelete" class="btn btn-primary">Delete All Student Records</button>
</td></tr>
<tr><form method="post" action="">
    <div id="deleteclassmodal" class="modal w3-animate-zoom">
  <span onclick="document.getElementById('deleteclassmodal').style.display='none'" class="close" title="Close Modal">&times;</span>
  <div class="modal-content">
    <div class="container">
      <h1>Delete Records from this Class?</h1>
      <p>Are you sure you want to delete all the student records from this Class?</p>

      <div class="clearfix">
        <button type="button" class="cancelbtn btn btn-secondary" onclick="document.getElementById('deleteclassmodal').style.display='none'">Cancel</button>
        <input type="submit" name="deleteclasssubmit" class="deletebtn btn btn-danger" value="Delete Records">
      </div>
    </div>
  </div>
</div>
                <td><strong>Delete Students from Class ?</strong></td>
                <td>
                    <select name='classdelete'><?php foreach($classes as $class){?>
                        <option value="<?php echo esc_html($class['id']);?>"><?php echo esc_html($class['class']);?></option><?php } ?>
                    </select></form>
<button onclick="document.getElementById('deleteclassmodal').style.display='block'" id="btndelete" class="btn btn-primary">Delete Students</button>
</td></tr>
      </table>
        </div>
        

       
<div id="deletemodal" class="modal w3-animate-zoom">
  <span onclick="document.getElementById('deletemodal').style.display='none'" class="close" title="Close Modal">&times;</span>
  <div class="modal-content">
    <div class="container">
      <h1>Delete Records?</h1>
      <p>Are you sure you want to delete all the student records?</p>

      <div class="clearfix">
        <button type="button" class="cancelbtn btn btn-secondary" onclick="document.getElementById('deletemodal').style.display='none'">Cancel</button>
        <form method="post" action=""><input type="submit" name="deletesubmit" class="deletebtn btn btn-danger" value="Delete Records"></form>
      </div>
    </div>
  </div>
</div>


</div>
<?php
if(isset($_POST['deletesubmit'])){
    $wpdb->query($sqldelete);
    $wpdb->query($sqldelete2);
    header("Location: ".admin_url('admin.php?page=eusr-settings&delete=success'));
}
if(isset($_POST['deleteclasssubmit'])){
    $wpdb->query($sqldelete3);
    $wpdb->query($sqldelete4);
    header("Location: ".admin_url('admin.php?page=eusr-settings&delete=success'));
}
$sqltype = $wpdb->get_results("SELECT * FROM `{$prefix}eusr_view_settings` WHERE `vid` = '3';", ARRAY_A);
$sqltype = $sqltype[0];
$checkedwatermark ="";
if($sqltype['titlefield']=="watermark"){
    $checkedwatermark = "checked";
}
?>
<table class='table' style="width:80%;margin:10px auto;">
    <form action="" method="post">
    <tr><td>Select Frontend Result Style</td>
        <td><input type="radio" id="marksheet" name="result_type" value="marksheet" <?php if($sqltype['methodfield']=="marksheet"){echo 'checked';}?>>
  <label for="marksheet"><img src="https://careacademy.info/wp-content/uploads/2020/12/screenshot-1.png" width="200px"></label></td>
        <td><input type="radio" id="normal" name="result_type" value="normal" <?php if($sqltype['methodfield']=="normal"){echo 'checked';}?>>
  <label for="normal"><img src="https://careacademy.info/wp-content/uploads/2020/12/CARE-ACADEMY-RESULTS-–-Care-Academy.png" width="200px"></label></td>
    </tr>
</table>
<table class="table" style="width:80%;margin:10px auto;">
    <tr>
        <td>Enable Watermark on Marksheet?</td>
        <td><input type="checkbox" id="watermark" name="watermark" value="watermark" <?php echo $checkedwatermark;?>>
<label for="watermark">Yes / No</label><br></td>
<tr>
<td colspan="2"><center><input type="submit" class="btn btn-primary" value"Submit" name="generalsubmit"></center></td></tr>
    </tr>
    </form>
</table>
<?php
if(isset($_POST['generalsubmit'])){
    $result_type = $_POST['result_type'];
    $iswatermark = $_POST['watermark'];
    $hasbeeninserted = $wpdb->query("UPDATE `{$prefix}eusr_view_settings` SET `methodfield` = '{$result_type}', `titlefield` = '{$iswatermark}' WHERE `vid` = '3';");
    if($hasbeeninserted){
        header("Location: ".admin_url('admin.php?page=eusr-settings&type=changed'));
    }
}
}
// View Result Code Starts Here
if(isset($_GET['option'])){
if($_GET['option']=='view'){
    $sqlview = "SELECT * FROM `{$prefix}eusr_view_settings`";
        $wpdb->query($sqlview);
        $resultview = $wpdb->get_results($sqlview, ARRAY_A);
        // var_dump($resultv);
        if (count($resultview)==0 OR count($resultview)>0) {
            $rowview = $resultview[0];
            $rowcheck = $resultview[1];
?><div class="view container mycontainer">
    <h2>Edit Search Option</h2>
    <form class="form" action="" method="post">
        <table class="table">
            <thead>
                <tr>
                    <th>Search Result By</th>
                    <th colspan="2">Select Method to Search</th>
                     <th>Show 'Select Class' Method to Search</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Select Method</td>
                    <td colspan="2"><select name="method"><option <?php if($rowview['methodfield']=='Roll Number'){echo 'selected';}?> value="Roll Number"><?php echo esc_html($rowview['rollfield']);?></option><option <?php if($rowview['methodfield']=='Registration Number'){echo 'selected';}?> value="Registration Number"><?php echo esc_html($rowview['regnofield']);?></option></select></td>
                    <td width="38%"><center>
                <input class="form-check-input" type="checkbox" name="classmethod" value="y" <?php if($rowcheck['methodfield']=='y'){echo 'checked';}?>></center>
                </td>
                </tr>
            </tbody>
        </table>
        <h2>Edit Marksheet Fields</h2>
        <table class="table">
        <thead>
        <th>Field Name</th>
        <th>Edit Field Name</th>
        <th>Show Field</th>
        </thead>
            <tr>
                <td>
                    Result Title Field :
                </td>
                <td>
                    <input type="text" name="titlefield" value="<?php echo esc_html($rowview['titlefield']);?>">
                </td>
                <td>
                <input class="form-check-input" type="checkbox" name="title" value="y" <?php if($rowcheck['titlefield']=='y'){echo 'checked';}?>>
                </td>
            </tr>
            <tr>
                <td>Student Name Field :</td>
                <td><input type="text" name="namefield" value="<?php echo esc_html($rowview['namefield']);?>"></td>
                <td>
                <input class="form-check-input" type="checkbox" name="name" value="y" <?php if($rowcheck['namefield']=='y'){echo 'checked';}?>>
                </td>
            </tr>
            <tr>
                <td>Gender :</td>
                <td><input type="text" name="genderfield" value="<?php echo esc_html($rowview['genderfield']);?>"></td>
                <td>
                <input class="form-check-input" type="checkbox" name="gender" value="y" <?php if($rowcheck['genderfield']=='y'){echo 'checked';}?>>
                </td>
            </tr>
            <tr>
                <td>Father's Name Field :</td>
                <td><input type="text" name="fnamefield" value="<?php echo esc_html($rowview['fnamefield']);?>"></td>
                <td>
                <input class="form-check-input" type="checkbox" name="fname" value="y" <?php if($rowcheck['fnamefield']=='y'){echo 'checked';}?>>
                </td>
            </tr>
            <tr>
                <td>Mother's Name Field :</td>
                <td><input type="text" name="mnamefield" value="<?php echo esc_html($rowview['mnamefield']);?>"></td>
                <td>
                <input class="form-check-input" type="checkbox" name="mname" value="y" <?php if($rowcheck['mnamefield']=='y'){echo 'checked';}?>>
                </td>
            </tr>
            <tr>
                <td>Class Field :</td>
                <td><input type="text" name="classfield" value="<?php echo esc_html($rowview['classfield']);?>"></td>
                <td>
                <input class="form-check-input" type="checkbox" name="class" value="y" <?php if($rowcheck['classfield']=='y'){echo 'checked';}?>>
                </td>
            </tr>
            <tr>
                <td>Registration No Field :</td>
                <td><input type="text" name="regnofield" value="<?php echo esc_html($rowview['regnofield']);?>"></td>
                <td>
                <input class="form-check-input" type="checkbox" name="regno" value="y" <?php if($rowcheck['regnofield']=='y'){echo 'checked';}?>>
                </td>
            </tr>
            <tr>
                <td>Subject Field :</td>
                <td><input type="text" name="subjectfield" value="<?php echo esc_html($rowview['subjectfield']);?>"></td>
                <td>
                <input class="form-check-input" type="checkbox" name="subject" value="y" <?php if($rowcheck['subjectfield']=='y'){echo 'checked';}?>>
                </td>
            </tr>
            <tr>
                <td>Roll Field :</td>
                <td><input type="text" name="rollfield" value="<?php echo esc_html($rowview['rollfield']);?>"></td>
                <td>
                <input class="form-check-input" type="checkbox" name="roll" value="y" <?php if($rowcheck['rollfield']=='y'){echo 'checked';}?>>
                </td>
            </tr>
            <tr>
                <td>Total Mark Field :</td>
                <td><input type="text" name="totalfield" value="<?php echo esc_html($rowview['totalfield']);?>"></td>
                <td>
                <input class="form-check-input" type="checkbox" name="total" value="y" <?php if($rowcheck['totalfield']=='y'){echo 'checked';}?>>
                </td>
            </tr>
            <tr>
                <td>Minimum Mark Field :</td>
                <td><input type="text" name="minimumfield" value="<?php echo esc_html($rowview['minimumfield']);?>"></td>
                <td>
                <input class="form-check-input" type="checkbox" name="minimum" value="y" <?php if($rowcheck['minimumfield']=='y'){echo 'checked';}?>>
                </td>
            </tr>
            <tr>
                <td>Obtained Mark Field :</td>
                <td><input type="text" name="obtainedfield" value="<?php echo esc_html($rowview['obtainedfield']);?>"></td>
                <td>
                <input class="form-check-input" type="checkbox" name="obtained" value="y" <?php if($rowcheck['obtainedfield']=='y'){echo 'checked';}?>>
                </td>
            </tr>
            <tr>
                <td>Grade Field :</td>
                <td><input type="text" name="remarkfield" value="<?php echo esc_html($rowview['remarkfield']);?>"></td>
                <td>
                <input class="form-check-input" type="checkbox" name="remark" value="y" <?php if($rowcheck['remarkfield']=='y'){echo 'checked';}?>>
                </td>
            </tr>
            <tr>
                <td>Percentage Field :</td>
                <td><input type="text" name="percentage" value="<?php echo esc_html($rowview['percentage']);?>"></td>
                <td>
                <input class="form-check-input" type="checkbox" name="percentagecheck" value="y" <?php if($rowcheck['percentage']=='y'){echo 'checked';}?>>
                </td>
            </tr>
            <tr>
                <td>Minimum Percentage Field :</td>
                <td><input type="text" name="minimumpercentage" value="<?php echo esc_html($rowview['minimumpercentage']);?>"></td>
                <td>
                <input class="form-check-input" type="checkbox" name="minimumpercentagecheck" value="y" <?php if($rowcheck['minimumpercentage']=='y'){echo 'checked';}?>>
                </td>
            </tr>
            <tr>
                <td>Remark Field :</td>
                <td><input type="text" name="finalresult" value="<?php echo esc_html($rowview['finalresult']);?>"></td>
                <td>
                <input class="form-check-input" type="checkbox" name="final" value="y" <?php if($rowcheck['finalresult']=='y'){echo 'checked';}?>>
                </td>
            </tr>
            <tr>
                <td>Remark Option</td>
                <td><input type="radio" id="automatic" name="remarkoption" value="automatic" <?php if($resultview[2]['finalresult']=='automatic'){echo 'checked';}?>>
<label for="automatic">Automatic Remark</label><br>
<input type="radio" id="custom" name="remarkoption" value="custom" <?php if($resultview[2]['finalresult']=='custom'){echo 'checked';}?>>
<label for="custom">Custom Remark</label><br></td>
                <td></td>
            </tr>
            <tr>
                <td>Principal Field :</td>
                <td><input type="text" name="principalfield" value="<?php echo esc_html($rowview['principalfield']);?>"></td>
                <td>
                <input class="form-check-input" type="checkbox" name="principal" value="y" <?php if($rowcheck['principalfield']=='y'){echo 'checked';}?>>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" class="btn btn-info" name="viewsubmit">
                </td>
                <td></td>
            </tr>
        </table>
    </form>
    </div>
    <?php 
    $method ='';
    if (isset($_POST['method'])) {
        $method = sanitize_text_field($_POST['method']);
    }
    $title ='';
    if (isset($_POST['titlefield'])) {
        $title = sanitize_text_field($_POST['titlefield']);
    }
    $namefield ='';
    if (isset($_POST['namefield'])) {
        $namefield = sanitize_text_field($_POST['namefield']);
    }
    $genderfield ='';
    if (isset($_POST['genderfield'])) {
        $genderfield = sanitize_text_field($_POST['genderfield']);
    }
    $fnamefield ='';
    if (isset($_POST['fnamefield'])) {
        $fnamefield = sanitize_text_field($_POST['fnamefield']);
    }
    $mnamefield ='';
    if (isset($_POST['mnamefield'])) {
        $mnamefield = sanitize_text_field($_POST['mnamefield']);
    }
    $classfield ='';
    if (isset($_POST['classfield'])) {
        $classfield = sanitize_text_field($_POST['classfield']);
    }
    $regnofield ='';
    if (isset($_POST['regnofield'])) {
        $regnofield = sanitize_text_field($_POST['regnofield']);
    }
    $subjectfield ='';
    if (isset($_POST['subjectfield'])) {
        $subjectfield = sanitize_text_field($_POST['subjectfield']);
    }
    $rollfield ='';
    if (isset($_POST['rollfield'])) {
        $rollfield = sanitize_text_field($_POST['rollfield']);
    }
    $totalfield ='';
    if (isset($_POST['totalfield'])) {
        $totalfield = sanitize_text_field($_POST['totalfield']);
    }
    $minimumfield ='';
    if (isset($_POST['minimumfield'])) {
        $minimumfield = sanitize_text_field($_POST['minimumfield']);
    }
    $obtainedfield ='';
    if (isset($_POST['obtainedfield'])) {
        $obtainedfield = sanitize_text_field($_POST['obtainedfield']);
    }
    $remarkfield ='';
    if (isset($_POST['remarkfield'])) {
        $remarkfield = sanitize_text_field($_POST['remarkfield']);
    }
    $percentagefield ='';
    if (isset($_POST['percentage'])) {
        $percentagefield = sanitize_text_field($_POST['percentage']);
    }
    $minimumpercentagefield ='';
    if (isset($_POST['minimumpercentage'])) {
        $minimumpercentagefield = sanitize_text_field($_POST['minimumpercentage']);
    }
    $finalfield ='';
    if (isset($_POST['finalresult'])) {
        $finalfield = sanitize_text_field($_POST['finalresult']);
    }
    $principalfield ='';
    if (isset($_POST['principalfield'])) {
        $principalfield = sanitize_text_field($_POST['principalfield']);
    }

    $classcheck ='n';
    if (isset($_POST['classmethod'])) {
        $classcheck = 'y';
           
    }
    $titlecheck ='n';
    if (isset($_POST['title'])) {
        $titlecheck = 'y';
           
    }
    $name ='n';
    if (isset($_POST['name'])) {
        $name = sanitize_text_field($_POST['name']);
        
    }
    $gender ='n';
    if (isset($_POST['gender'])) {
        $gender = sanitize_text_field($_POST['gender']);
        
    }
    $fname ='n';
    if (isset($_POST['fname'])) {
        $fname = sanitize_text_field($_POST['fname']);
        
    }
    $mname ='n';
    if (isset($_POST['mname'])) {
        $mname = sanitize_text_field($_POST['mname']);
        
    }
    $class ='n';
    if (isset($_POST['class'])) {
        $class = sanitize_text_field($_POST['class']);
        
    }
    $regno ='n';
    if (isset($_POST['regno'])) {
        $regno = sanitize_text_field($_POST['regno']);
        
    }
    $subject ='n';
    if (isset($_POST['subject'])) {
        $subject = sanitize_text_field($_POST['subject']);
        
    }
    $roll ='n';
    if (isset($_POST['roll'])) {
        $roll = sanitize_text_field($_POST['roll']);
        
    }
    $total ='n';
    if (isset($_POST['total'])) {
        $total = sanitize_text_field($_POST['total']);
       
    }
    $minimum ='n';
    if (isset($_POST['minimum'])) {
        $minimum = sanitize_text_field($_POST['minimum']);
        
    }
    $obtained ='n';
    if (isset($_POST['obtained'])) {
        $obtained = sanitize_text_field($_POST['obtained']);
        
    }
    $remark ='n';
    if (isset($_POST['remark'])) {
        $remark = sanitize_text_field($_POST['remark']);
    }
    $percentage ='n';
    if (isset($_POST['percentagecheck'])) {
        $percentage = sanitize_text_field($_POST['percentagecheck']);
        
    }
    $minimumpercentage ='n';
    if (isset($_POST['minimumpercentagecheck'])) {
        $minimumpercentage = sanitize_text_field($_POST['minimumpercentagecheck']);
        
    }
    $final ='n';
    if (isset($_POST['final'])) {
        $final = sanitize_text_field($_POST['final']);
       
    }
    $principal ='n';
    if (isset($_POST['principal'])) {
        $principal = sanitize_text_field($_POST['principal']);
        
    }


    $sqlupdateview = "UPDATE `{$prefix}eusr_view_settings` SET `methodfield` = '{$method}',`titlefield` = '{$title}', `namefield` = '{$namefield}', `genderfield` = '{$genderfield}', `fnamefield` = '{$fnamefield}', `mnamefield` = '{$mnamefield}', `classfield` = '{$classfield}',`regnofield` = '{$regnofield}',`subjectfield` = '{$subjectfield}', `rollfield` = '{$rollfield}', `totalfield` = '{$totalfield}', `minimumfield` = '{$minimumfield}', `obtainedfield` = '{$obtainedfield}', `remarkfield` = '{$remarkfield}', `percentage` = '{$percentagefield}', `minimumpercentage` = '{$minimumpercentagefield}', `finalresult` = '{$finalfield}', `principalfield` = '{$principalfield}' WHERE `vid` = 1;";

    $sqlcheck = "UPDATE `{$prefix}eusr_view_settings` SET `methodfield` = '{$classcheck}',`titlefield` = '{$titlecheck}', `namefield` = '{$name}', `genderfield` = '{$gender}', `fnamefield` = '{$fname}', `mnamefield` = '{$mname}', `classfield` = '{$class}',`regnofield` = '{$regno}',`subjectfield` = '{$subject}', `rollfield` = '{$roll}', `totalfield` = '{$total}', `minimumfield` = '{$minimum}', `obtainedfield` = '{$obtained}', `remarkfield` = '{$remark}', `percentage` = '{$percentage}', `minimumpercentage` = '{$minimumpercentage}', `finalresult` = '{$final}', `principalfield` = '{$principal}' WHERE `vid` = 2;";
    
    $sqlthird = "UPDATE `{$prefix}eusr_view_settings` SET `finalresult` = '{$_POST['remarkoption']}' WHERE `vid` = 3;";
    
    if(isset($_POST['viewsubmit'])){
        if($wpdb->query($sqlthird)){
            header('Location: '.admin_url("admin.php?page=eusr-settings&option=view&updatev=true"));
        }
    if($wpdb->query($sqlupdateview)){
        header('Location: '.admin_url("admin.php?page=eusr-settings&option=view&updatev=true"));
    }
    if($wpdb->query($sqlcheck)){
        header('Location: '.admin_url("admin.php?page=eusr-settings&option=view&updatev=true"));
    }
}
    }}}
   ?>
   
 <script type="text/javascript">
function eusr_show_confirm() {
    return confirm("Do You Really Want to delete the Logo ? ");
}
</script>