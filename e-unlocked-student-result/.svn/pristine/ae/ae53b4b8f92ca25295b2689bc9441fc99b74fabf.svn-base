<?php
DEFINED('ABSPATH') or die("You can't access this file.");
    global $wpdb;
    $prefix = $wpdb->prefix;
    $display = "";
    $data='';
    $mark;
    $markis;
    $seesql = "SELECT * FROM `{$prefix}eusr_student_result` order by sid DESC";
    if (isset($_GET['insert'])) {
    if ($_GET['insert'] == 'true') {
    echo "<div id='message_div' class='alert alert-success'><center>Marks have been added Successfully.</center></div>";
}}
    
    ?>
    

<style>
    .formcontrol{
    /*width:400px;*/
    float:right;
    display:inline-block;
    margin:10px;
}
.field{
    margin:5px;
}
.btn{
    height:35px;
}
.searchfield{
    width:260px;
}
.container{
    margin-top:5vw;
}
</style>
<?php 
if(!isset($_GET['addid'])){
?>
<div class='container'>
    <div>
    <center><a href='<?php echo admin_url('admin.php?page=eusr-add-mark');?>'><h3 class='heading'><strong>Add Marks</strong></h3></a></center></div>
    <div class='formcontrol'><form action='' method='post' ><input type='text' class="field searchfield" name='search'  placeholder='Search By Name or Roll Number' aria-label="Search" required><input type='submit' class="btn btn-primary field" value="Search" name = 'searchsubmit'></form></div>
    <table class='table'>
        
        <tr>
            <td><strong>Select Class :</strong></td>
            <td><form method='get' action=''>
                <input type='text' name='page' hidden value='eusr-add-mark'>
                <select name='classsearch'>
                <?php 
                $sqlclass = "SELECT * FROM `{$prefix}eusr_class`";
                $classes = $wpdb->get_results($sqlclass, ARRAY_A);
                foreach($classes as $class){
                    ?>
                    
                <option value="<?php echo esc_html($class['id']);?>"><?php echo esc_html($class['class']);?></option>
                <?php
                }
                ?>
            </select></td>
            
        </tr>
        <tr>
            <td></td>
            <td><input type='submit' value='See Students' class='btn btn-primary'></td></form>
        </tr>
        
    </table>
    
    
</div>
<?php
if(isset($_POST['searchsubmit'])){
    $searchvalue = sanitize_text_field($_POST['search']);
$seesql = "SELECT * FROM `{$prefix}eusr_student_result` WHERE `sno` LIKE '{$searchvalue}' OR `name` LIKE '%{$searchvalue}%'";}
if(isset($_GET['classsearch'])){
    $classsearch = sanitize_text_field($_GET['classsearch']);
$seesql = "SELECT * FROM `{$prefix}eusr_student_result` WHERE `class` = {$classsearch}";}
$students = $wpdb->get_results($seesql, ARRAY_A);
    ?>
    <div class='subjectscontainer m-4 px-1' <?php echo $display;?>>
        <center><h3 class='heading'>Students in this Class</h3></center>
    <div style='float:right;' >
        
    </div>
    <table class="table">
  <thead class="thead-dark">

    <tr>
      <th scope="col">Id</th>
      <th scope="col">Roll No</th>
      <th scope="col">Student Name</th>
      <th scope="col">Class</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
     <?php 
     $i = 1;
foreach($students as $student){
    $classname = $wpdb->get_results("SELECT * FROM `{$prefix}eusr_class` WHERE `id` = {$student['class']}", ARRAY_A);
    ?>
    <tr>
      <th><?php echo $i;?></th>
      <td><strong><?php echo esc_html($student['sno']);?></strong></td>
      <td><?php echo esc_html($student['name']);?></td>
      <td><?php echo esc_html($classname[0]['class']);?></td>
      <td><a class="btn btn-primary" href="<?php echo admin_url('admin.php?page=eusr-add-mark&addid='. esc_html($student['sid']));?>">Add Marks</a></td>
      
      
    </tr>
    
    <?php 
    $i++;
    }?>
    
  </tbody>
</table>
</div>
<?php
}
if(isset($_GET['addid'])){
    $stuid = filter_var($_GET['addid'], FILTER_SANITIZE_NUMBER_INT);
    $display= "style='display:none;'";
    $sqladdsee = "SELECT * FROM `{$prefix}eusr_student_result` WHERE `sid` = '{$stuid}'";
    $addstudent = $wpdb->get_results($sqladdsee, ARRAY_A);
    $addstudent = $addstudent[0];
    $sqlsubjectsee = "SELECT * FROM `{$prefix}eusr_subject` WHERE `class` = '{$addstudent['class']}'";
    $subjects = $wpdb->get_results($sqlsubjectsee, ARRAY_A);
    $marks = $wpdb->get_results("SELECT * FROM `{$prefix}eusr_mark` WHERE `sid` = {$stuid}", ARRAY_A);
    if (count($marks)>0) {
        # code...
        $markser = $marks[0]; 
        $mark = unserialize($markser['marks']);
        if($addstudent['sid'] == $markser['sid']){
            $btn = 'Update Mark';
    }
}else{
    $btn = 'Add Mark';
}

    ?>
    <div class='container' >
    <center><h3 class='heading'>Add Marks</h3></center>
    <form method='post' action=''>
    <table class='table'>
        <thead>
            <th width="100%"><center>Name : <?php echo esc_html($addstudent['name']);?></center></th>
            <th></th>
            <th><center>Roll No : <?php echo esc_html($addstudent['sno']);?></center></th>
        </thead>
        <thead>
            <th>Subjects</th>
            <th>Total Mark</th>
            <th>Marks</th>
        </thead>
        <?php 
        $sqlarray = array();
        $id;
        foreach($subjects as $subject){
        $id = $subject['id'];
        if (empty($mark["{$id}"])) {
            $markis = '';
            // $markis = 
        }else(
            $markis = $mark["{$id}"]
        )
        ?>
        <tr>
            <td><strong><?php echo esc_html($subject['subname']);?></strong></td>
            <td><strong><?php echo esc_html($subject['total']);?></strong></td>
            <td><input type='number' value="<?php echo esc_html($markis);?>" name='<?php echo esc_html($subject['id']);?>' placeholder="Enter Mark"></td>
            </tr>
        <?php 
        } 
        ?>
        <tr>
            <td><strong>Remark</strong></td>
            <td></td>
            <td><input type='text' value="<?php echo esc_html($addstudent['remark']);?>" name='remark' placeholder="Enter Remark"></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><input type="submit" name="insub" value="<?php echo $btn;?>" id="submitbtn" class="btn btn-primary"></td></tr>
        <a href='<?php echo admin_url('admin.php?page=eusr-add-mark');?>' style='float:right;' class='btn btn-primary m-2'>View All Students</a>
    </table>
        
    </form>
    
</div>
<?php
$remark = $_POST['remark'];
unset($_POST['remark']);
$data = serialize($_POST);
$sql = "INSERT INTO `{$prefix}eusr_mark` (`id`, `sid`, `marks`) VALUES (NULL, '{$addstudent['sid']}', '{$data}')";
$sqlremark = "UPDATE `{$prefix}eusr_student_result` SET `remark` = '{$remark}' WHERE `sid` = {$addstudent['sid']}";
if (count($marks)>0) {
    if($addstudent['sid'] == $markser['sid']){
        $sql = "UPDATE `{$prefix}eusr_mark` SET `marks` = '{$data}' WHERE `sid` = {$addstudent['sid']}";
}}


if(isset($_POST['insub'])){
    $wpdb->query($sql);
    $wpdb->query($sqlremark);
    header('Location: '.admin_url("admin.php?page=eusr-add-mark&insert=true"));
}
}

?>
