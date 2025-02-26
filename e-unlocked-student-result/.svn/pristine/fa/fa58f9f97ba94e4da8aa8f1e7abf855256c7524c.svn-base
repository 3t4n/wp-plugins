<?php
DEFINED('ABSPATH') or die("You can't access this file.");
global $wpdb;
$prefix = $wpdb->prefix;
$id = filter_var($_GET['id'],  FILTER_SANITIZE_NUMBER_INT);
$sql1 = "SELECT * FROM `{$prefix}eusr_student_result` WHERE `{$prefix}eusr_student_result`.`sid` = {$id}";

$getdatas = $wpdb->get_results($sql1, ARRAY_A);
$row = $getdatas[0];
$maleselected = "";
$femaleselected = "";
$othersselected = "";
if($row['gender']=='MALE'){
    $maleselected = 'selected';
}elseif($row['gender']=='FEMALE'){
    $femaleselected = 'selected';
}else{
    $othersselected = 'selected';
}
?>
    <style>
        .table{
            margin:40px 140px 40px 140px;
            width:70%;
        }
        h1{
            margin:20px auto 20px 70px;
        }
    </style>
    <h1>Edit <?php echo esc_html($row['name']);?>'s Information.</h1>
    <table class="table">
    <form action="" method="POST">
<tr>
<td>Serial Number :</td>
<td><input type="text" placeholder="Enter Serial Number" name="sno" value="<?php echo esc_html($row['sno']);?>" id="sno"></td>
</tr>
<tr>
<td>Reg No :</td>
<td><input type="text" placeholder="Enter Registration Number" value="<?php echo esc_html($row['regno']);?>" name="regno" id="regno"></td>
</tr>
<tr>
<td>Name :</td>
<td><input type="text" placeholder="Enter Student Name" value="<?php echo esc_html($row['name']);?>" name="name" id="name" required></td>
</tr>
<tr>
<td>Gender :</td>
<td>
    <select name="gender">
        <option value="MALE" <?php echo $maleselected;?>>MALE</option>
        <option value="FEMALE" <?php echo $femaleselected;?>>FEMALE</option>
        <option value="OTHERS" <?php echo $othersselected;?>>Others</option>
    </select>
</td>
</tr>
<tr>
<td>Father's Name :</td>
<td><input type="text" placeholder="Enter Father's Name" value="<?php echo esc_html($row['fname']);?>" name="fname" id="fname"></td>
</tr>
<tr>
<td>Mother's Name :</td>
<td><input type="text" placeholder="Enter Mother's Name" value="<?php echo esc_html($row['mname']);?>" name="mname" id="mname"></td>
</tr>
<tr>
<td>Class :</td>
<td><select name="class" id="class">
<?php 
$sqlclass = "SELECT * FROM `{$prefix}eusr_class`";
$class = $wpdb->get_results($sqlclass, ARRAY_A);
foreach($class as $class){
$selected = '';
if($class['id']==$row['class']){
$selected = 'selected';
}
?>
<option value="<?php echo esc_html($class['id']);?>" <?php echo $selected;?> ><?php echo esc_html($class['class']);?></option>
<?php 

} ?>
    </select></td>
</tr>
<tr>
<td></td>
<td><input class="btn btn-primary" type="submit" name='submit' value="Update"></td>
</tr>
</table>
</form>
<?php
$name = sanitize_text_field(isset($_POST['name'])) ? $_POST['name'] : '';
$class = sanitize_text_field(isset($_POST['class'])) ? $_POST['class'] : '';
$sno = sanitize_text_field(isset($_POST['sno'])) ? $_POST['sno'] : '';
$regno = sanitize_text_field(isset($_POST['regno'])) ? $_POST['regno'] : '';
$gender = sanitize_text_field(isset($_POST['gender'])) ? $_POST['gender'] : '';
$fname = sanitize_text_field(isset($_POST['fname'])) ? $_POST['fname'] : '';
$mname = sanitize_text_field(isset($_POST['mname'])) ? $_POST['mname'] : '';

if(isset($_POST['submit'])){
    $updated = $wpdb->update($prefix.'eusr_student_result', array('sno'=>$sno, 'regno'=>$regno, 'name'=>$name,'fname'=>$fname,'mname'=>$mname, 'class'=>$class, 'gender' => $gender), array('sid'=>$id));
         
         header('Location: '.admin_url("admin.php?page=eusr-all-students&edit=true"));}
?>