<?php
DEFINED('ABSPATH') or die("You can't access this file.");
$mark = 0;
global $wpdb;
$prefix = $wpdb->prefix;
$studentcolumns = array();
if(isset($_GET['del'])){
if ($_GET['del'] == 'true') {
    echo "<div id='message_div' class='alert alert-success'><center>Student Record Deleted Successfully</center></div>";
}}
if(isset($_GET['edit'])){
if ($_GET['edit'] == 'true') {
    echo "<div id='message_div' class='alert alert-success'><center>Student Record Updated Successfully</center></div>";
}}
if(isset($_GET['csv'])){
if ($_GET['csv'] == 'imported') {
    echo "<div id='message_div' class='alert alert-success'><center>CSV File Imported Successfully</center></div>";
}}

// csvexport coding starts here
if(isset($_POST['export'])){
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=eusr-students.csv');
    $output = fopen("php://output", "w");
     ob_end_clean();
     $studentdetailscolumns = $wpdb->get_results("SELECT COLUMN_NAME FROM information_schema.COLUMNS WHERE TABLE_NAME = '{$prefix}eusr_student_result'
AND TABLE_SCHEMA='$wpdb->dbname'", ARRAY_A);
     foreach($studentdetailscolumns as $studentdetailscolumn){
         array_push($studentcolumns, $studentdetailscolumn['COLUMN_NAME']);
         
     }
         unset($studentcolumns[8]);
         array_push($studentcolumns, "class");
    fputcsv($output, $studentcolumns);    
      $result = $wpdb->get_results("SELECT * FROM `{$prefix}eusr_student_result`", ARRAY_A); 
      foreach($result as $row) 
      { 
        $rowid = $row['sid'];  
        $exportstudents = $wpdb->get_results("SELECT * FROM `{$prefix}eusr_student_result` where `sid` = '{$rowid}'", ARRAY_A);
        $exportstudent = $exportstudents[0];
        $classid = $exportstudent['class'];
        $exportclasses = $wpdb->get_results("SELECT * FROM `{$prefix}eusr_class` WHERE `id` = '{$classid}'", ARRAY_A);
        $exportclass = $exportclasses[0];
        array_push($row, $exportclass['class']);  
        unset($row['class']);
        
        $exportmarks = $wpdb->get_results("SELECT * FROM `{$prefix}eusr_mark` WHERE `sid` = '{$rowid}'", ARRAY_A);
        $exportmark = $exportmarks[0];
        $marks = unserialize($exportmark['marks']);
        foreach($marks as $key=>$value){
            if($key=="insub"){
                continue;
            }
            $exportsubjects = $wpdb->get_results("SELECT * FROM `{$prefix}eusr_subject` WHERE id = '{$key}'", ARRAY_A);
            $exportsubject = $exportsubjects[0];
            array_push($row, $exportsubject['subname']);
            array_push($row, $value);
        }
          fputcsv($output, $row);  
      }  
      fclose($output);
      exit();
    // print_r($exportstudents); 
    // echo $classid; 
}

// csvexport coding ends here

 $sl = 1;
 $limit = 15;
 $total_page = 1;
 if(isset($_GET['paginate'])){
 $page = $_GET['paginate'];
 }else{
     $page = 1;
 }
 $offset = ($page - 1) * $limit;
$sqlpage = "SELECT * FROM `{$prefix}eusr_student_result`";
$num_rows = $wpdb->query($sqlpage);
if($num_rows == 1 OR $num_rows == 0){
    $grammar = $num_rows . " Student is in Database.";
}else{
    $grammar = $num_rows . " Students are in Database.";
}

?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<style>
  #pagination{
     width:70%;
     margin:5px auto;
 }
 .pagination li a{
     margin:2px;
 }
 .disabled{
     pointer-events: none;
  cursor: default;
  text-decoration: none;
  color: black;
 }
 .currentpage{
  pointer-events: none;
  cursor: default;
  text-decoration: none;
  color: black;
 }
</style>

<div id='print'><h1 id='heading'><center><a id='a' href='<?php echo admin_url('admin.php?page=eusr-all-students');?>'>All Students</a></center></h1>
<center><form action="" method="post"><input class="btn btn-success" type="submit" value="Export Csv" name="export"></form><div class='formcontrol'><form action='' method='post' ><input type='text' class="field searchfield" name='search'  placeholder='Search By Name or Roll Number' aria-label="Search" required><input type='submit' class="btn btn-info field" value="Search" name = 'searchsubmit'></form></div>
<div><h4 style="color:blue;"><?php echo esc_html($grammar);?></h4></div>
<table class="table">

<tr>
<th>ID</th>
<th>Roll Number</th>
<th>Registration Number</th>
<th><center>Student Name</center></th>
<th><center>Class</center></th>
<th><center>Mark</center></th>
<th id='paddingaction'>Action</th>
</tr>
<?php
$sql = "SELECT * FROM `{$prefix}eusr_student_result` ORDER BY `sno` LIMIT {$offset}, {$limit}";
if(isset($_POST['searchsubmit'])){
    $searchvar = sanitize_text_field($_POST['search']);
    $sql = "SELECT * FROM `{$prefix}eusr_student_result` WHERE `sno` = '{$searchvar}' OR `name` LIKE '%{$searchvar}%' ";
}
$rows = $wpdb->get_results($sql, ARRAY_A);
if (count($rows)>0) {
    $id = ($page * $limit) - ($limit - 1);
    
        foreach($rows as $row){
            $mark = '';
        $class = $wpdb->get_results("SELECT `class` FROM `{$prefix}eusr_class` WHERE `id` = {$row['class']}", ARRAY_A);
        if(count($class)>0){
        $class = $class[0]['class'];}
        $markssql = "SELECT * FROM `{$prefix}eusr_mark` WHERE `sid` = '{$row['sid']}'";
            $markstobedisplayed = $wpdb->get_results($markssql, ARRAY_A);
            if(count($markstobedisplayed)>0){
            $marktobedisplayed = $markstobedisplayed[0];
            $marks = unserialize($marktobedisplayed['marks']);
            foreach($marks as $key=>$value){
                $mark = (int)$mark + (int)$value ;
            }
            }else{
                $marks = array();
            }
?>
<tr>
<td class='padding'><center><?php echo esc_html($id); ?></center></td>
<td class='padding'><center><?php echo esc_html($row['sno']); ?></center></td>
<td class='padding'><center><?php echo esc_html($row['regno']); ?></center></td>
<td class='padding'><center><?php echo esc_html($row['name']); ?></center></td>
<td class='padding'><center><?php if(!empty($class)){echo esc_html($class);}else{echo "Class doesn't exist";} ?></center></td>
<td class='padding'><center><?php echo esc_html($mark); ?></center></td>
<td class='padding'><a class='btn paddingbtn' href='<?php echo admin_url('admin.php?page=eusr-editrec&id=');?><?php echo esc_html($row['sid']);?>'><img src="<?php echo plugins_url('/e-unlocked-student-result/images/edit.svg'); ?>" alt="Edit" width="18px"></a><a onclick="return eusr_show_confirm();" class='btn paddingbtn' href='<?php echo admin_url('admin.php?page=eusr-delrec&id=');?><?php echo esc_html($row['sid']);?>'><img src="<?php echo plugins_url('/e-unlocked-student-result/images/delete.png'); ?>" alt="Delete" width="18px"></a></td>
</tr>



<?php
$id++;
    }

}else{
    echo '<h2>No Record Found</h2>';
}
?>
</table></center></div>
<div id="pagination">
<?php
$allusers = $wpdb->get_results("SELECT * FROM `{$prefix}eusr_student_result`", ARRAY_A);
if(isset($_POST['searchsubmit'])){
    $searchvar = sanitize_text_field($_POST['search']);
    $allusers = $wpdb->get_results("SELECT * FROM `{$prefix}eusr_student_result` WHERE `sno` = '{$searchvar}' OR `name` LIKE '%{$searchvar}%' ", ARRAY_A);
}
if(count($allusers)>0){
    if(isset($_POST['searchsubmit'])){
        $total_users = count($users);
        $total_page = ceil($total_users/$limit);
    }
    if(!isset($_POST['searchsubmit'])){
        $total_users = count($allusers);
        $total_page = ceil($total_users/$limit);
    }
    $prevdisabled = "";
    $nextdisabled = "";
    echo '<ul class="pagination admin-pagination">';
    if($page<2){
        $prevdisabled = 'disabled';
    }
        $prev_page = $page-1;
    echo '<li class="'.$prevdisabled.'"><a href="'.admin_url("admin.php?page=eusr-all-students&paginate=1").'"><<</a></li>';
    echo '<li class="'.$prevdisabled.'"><a href="'.admin_url("admin.php?page=eusr-all-students&paginate=$prev_page").'"><</a></li>';
    if($total_page == $page || $total_page == 0){
        $nextdisabled = 'disabled';
    }
    echo '<li class="active currentpage"><a href="">'.$page.'</a></li>';
        $next_page = $page+1;
    echo '<li class="currentpage"><a href="">of</a></li>';
    echo '<li class=" currentpage"><a href="">'.$total_page.'</a></li>';
    echo '<li class="'.$nextdisabled.'"><a href="'.admin_url("admin.php?page=eusr-all-students&paginate=$next_page").'">></a></li>';
    echo '<li class="'.$nextdisabled.'"><a href="'.admin_url("admin.php?page=eusr-all-students&paginate=$total_page").'">>></a></li>';
    echo '</ul>';
?>
<?php }?>
</div>
<script type="text/javascript">
function eusr_hideMessage() {
    document.getElementById("message_div").style.display = "none";
};
setTimeout(eusr_hideMessage, 5000);

function eusr_show_confirm() {
    return confirm("Do You Really Want to delete the Record ? ");
}
</script>

