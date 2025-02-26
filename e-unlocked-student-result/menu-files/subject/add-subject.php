<?php 
global $wpdb;
$prefix = $wpdb->prefix;
$display = "style='display:block;'";
$updatesub = '';
$updatemin = '';?>
<?php
$updatetotal = '';
if (isset($_GET['add'])) {
if ($_GET['add'] == 'true') {
    echo "<div id='message_div' class='alert alert-success'><center>Subject has been Added Successfully</center></div>";
}}
if (isset($_GET['edit'])) {
if ($_GET['edit'] == 'true') {
    echo "<div id='message_div' class='alert alert-success'><center>Subject has been Updated Successfully</center></div>";
}}
if(isset($_GET['editid'])){
    $editid = stripslashes_deep(filter_var($_GET['editid'], FILTER_SANITIZE_NUMBER_INT));
    $display = "style='display:none;'";
    $sql = "SELECT * FROM `{$prefix}eusr_subject` WHERE `id`= {$editid}";
    $rows = $wpdb->get_results($sql, ARRAY_A);
    $row = $rows[0];
    ?>
    <div class='container' >
    <center><h3 class='heading'>Edit Subject</h3></center>
    <form method='post' action=''>
    <table class='table'>
        <tr>
            <td><strong>Enter Subject Name :</strong></td>
            <td><input type='text' name='updatesub' value='<?php echo esc_html($row['subname']);?>' required></td>
        </tr>
        <tr>
            <td><strong>Minimum Passing Mark :</strong></td>
            <td><input type='number' name='updatemin' value='<?php echo esc_html($row['minmark']);?>'></td>
        </tr>
        <tr>
            <td><strong>Total Mark :</strong></td>
            <td><input type='number' name='updatetotal' value='<?php echo esc_html($row['total']);?>'></td>
        </tr>
        <tr>
            <td></td>
            <td><input type='submit' value='Update' class='btn btn-primary' name='updatesubmit'></td>
        </tr>
        <a href='<?php echo admin_url("admin.php?page=eusr-subject");?>' style='float:right;' class='btn btn-primary m-2'>View All</a>
    </table>
    </form>
    
</div>
<?php
if (isset($_POST['updatesub'])) {
    
    $updatesub = sanitize_text_field($_POST['updatesub']);}
    if (isset($_POST['updatemin'])) {
    
        $updatemin = sanitize_text_field($_POST['updatemin']);}
        if (isset($_POST['updatetotal'])) {
    
            $updatetotal = sanitize_text_field($_POST['updatetotal']);}

if(isset($_POST['updatesubmit'])){
    $sqledit = $wpdb->update($prefix.'eusr_subject', array('subname'=>$updatesub, 'minmark'=>$updatemin, 'total'=>$updatetotal), array('id'=>$editid));
if($sqledit>0){
header('Location: '.admin_url("admin.php?page=eusr-subject&edit=true"));
}
}
}
if (isset($_GET['delid'])){
    $delid = stripslashes_deep(filter_var($_GET['delid'],  FILTER_SANITIZE_NUMBER_INT));
    $sqldelete = $wpdb->delete($prefix.'eusr_subject', array('id'=>$delid));
    if($sqldelete>0){
    echo "<div id='message_div' class='alert alert-success'><center>Subject Deleted Successfully</center></div>";
    }
}
?>



<div class='container' <?php echo $display;?>>
    <center><a href='<?php echo admin_url("admin.php?page=eusr-subject");?>'><h3 class='heading'>Subjects</h3></a></center>
    
    <table class='table'>
        <button  onclick="document.getElementById('addmodal').style.display='block'" id="addsub" class='btn btn-primary m-2'>Add Subject</button>
        <tr>
            <td><strong>Select Class :</strong></td>
            <td><form method='get' action=''>
                <input type='text' name='page' hidden value='eusr-subject'>
                <select name='classsearch'>
                    <option value="Select Class">Select Class</option>
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
            <td><input type='submit' value='See Subjects' class='btn btn-primary'></td></form>
        </tr>
        
    </table>
    
    
</div>



      <?php
if(isset($_GET['classsearch']) && $_GET['classsearch']!= 'Select Class'){
    $classsearch = filter_var($_GET['classsearch'], FILTER_SANITIZE_NUMBER_INT);
    $sqlsearch = "SELECT * FROM `{$prefix}eusr_subject` WHERE `class` = {$classsearch}";
    $subjects = $wpdb->get_results($sqlsearch, ARRAY_A);
    $display = "style='display:block;'";
        
?>
<div class='subjectscontainer m-4 px-1' <?php echo $display;?>>
        <center><h3 class='heading'>Subjects Added By You</h3></center>
    <div style='float:right;' >
        
    </div>
    <table class="table">
  <thead class="thead-dark">

    <tr>
      <th scope="col">Subject Id</th>
      <th scope="col">Subjects</th>
      <th scope="col">Minimum Mark</th>
      <th scope="col">Total Mark</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
     <?php 
     $i = 1;
foreach($subjects as $subject){
    ?>
    <tr>
      <th><?php echo esc_html($subject['id']);?></th>
      <td><strong><?php echo esc_html($subject['subname']);?></strong></td>
      <td><?php echo esc_html($subject['minmark']);?></td>
      <td><?php echo esc_html($subject['total']);?></td>
      <td><a href="<?php echo admin_url("admin.php?page=eusr-subject&editid=".esc_html($subject['id']));?>"><img width="20px" src="<?php echo plugins_url('/e-unlocked-student-result/images/edit.svg');?>"></a> / <a href="<?php echo admin_url("admin.php?page=eusr-subject&classsearch=".esc_html($_GET['classsearch']));?>&delid=<?php echo esc_html($subject['id']);?>" onclick="return eusr_show_confirm();" rel="tooltip" title="Delete" class="delete"> <img width="20px" src="<?php echo plugins_url('/e-unlocked-student-result/images/delete.png');?>"></a></td>
      
      
    </tr>
    
    <?php 
    $i++;
    }?>
    
  </tbody>
</table>
<?php
if(count($subjects)==0){
    echo '<h2><center>No Subjects added in this class</center></h2>';
}
?>
</div>
<?php }else{
    echo '<h2><center>Please select a class</center></h2>';
}

?>

<div id="addmodal" class="modal w3-animate-zoom">
  <span onclick="document.getElementById('addmodal').style.display='none'" class="close" title="Close Modal">X</span>
  <div class="modal-content">
      
    <div class="addcontainer">
      <h1><center>Add Subject</center></h1>
      <p><center>Select Class and Enter Other Information :</center></p>
        <form method="post" action="">
            <center><div id="middle">
                <table class='table'>
                <tr>
                    <td>Select Class :</td>
                    <td>
                    <select name='classadd' class="pt-1">
                <?php 
                foreach($classes as $class){
                    ?>
                <option value="<?php echo esc_html($class['id']);?>"><?php echo esc_html($class['class']);?></option>
                
                <?php
                
                }
                ?>
            </select></td></tr>
            <tr><td>Subject Name :</td>
            <td>
            <input type='text' name='subject' placeholder='Enter Subject Name'>
            </td>
            </tr>
            <tr><td>Minimum Passing Mark :</td>
            <td>
            <input type='number' name='minmark' placeholder='Enter Minimum Passing Mark'>
            </td>
            </tr>
            <tr><td>Total Mark :</td>
            <td>
            <input type='number' name='total' placeholder='Enter Total Mark'>
            </td>
            </tr>
            </table>
            </div></center>
      <center>
          <div class="clearfix">
        <button type="button" class="cancelbtn mx-2 btn btn-secondary" onclick="document.getElementById('addmodal').style.display='none'">Cancel</button>
        <input type="submit" name="addsubmit" class="addbtn btn btn-primary" value="Add Subject"></form></center>
      </div>
    </div>
  </div>
</div>
</div>



<?php 
    if(isset($_POST['addsubmit'])){
        $subjectadd = sanitize_text_field($_POST['subject']);
        $sqladd = $wpdb->insert($prefix.'eusr_subject', array('id'=>NULL, 'class'=>sanitize_text_field($_POST['classadd']), 'subname'=>$subjectadd, 'minmark'=>sanitize_text_field($_POST['minmark']), 'total'=>sanitize_text_field($_POST['total'])));
        if($sqladd>0){
        header('Location: '.admin_url("admin.php?page=eusr-subject&add=true"));
    }}
    ?>
    
<script type="text/javascript">
function eusr_show_confirm() {
    return confirm("Do You Really Want to delete the Class ? ");
}
</script>