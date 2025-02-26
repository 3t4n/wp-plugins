<?php
DEFINED('ABSPATH') or die("You can't access this file.");
global $wpdb;
$prefix = $wpdb->prefix;
$display ="style='display:block;'";
if (isset($_GET['edit'])) {
if ($_GET['edit'] == 'true') {
    echo "<div id='message_div' class='alert alert-success'><center>Class Updated Successfully</center></div>";
}}
if (isset($_GET['delid'])){
    $delid = stripslashes_deep(filter_var($_GET['delid'], FILTER_SANITIZE_NUMBER_INT));
    $deleted = $wpdb->delete( $prefix.eusr_class, array( 'id' => $delid ) );
    $wpdb->delete( $prefix.eusr_subject, array( 'class' => $delid ) );
    $wpdb->delete( $prefix.eusr_student_result, array( 'class' => $delid ) );
    if($deleted>0){
        header('Location: '.admin_url('admin.php?page=eusr-class&del=true'));
    }
}
if (isset($_GET['del'])) {
  if ($_GET['del'] == 'true') {
    echo "<div id='message_div' class='alert alert-success'><center>Class Deleted Successfully</center></div>";
}}
if (isset($_GET['add'])) {
  if ($_GET['add'] == 'true') {
    echo "<div id='message_div' class='alert alert-success'><center>Class Added Successfully</center></div>";
}}
?>

<style>
    .heading{
        font-weight:600;
    }
</style>
<?php
if(isset($_GET['editid'])){
    $editid = filter_var($_GET['editid'], FILTER_SANITIZE_NUMBER_INT);
    $sql = "SELECT * FROM `{$prefix}eusr_class` WHERE `id`= {$editid}";
    $rows = $wpdb->get_results($sql, ARRAY_A);
    $row = $rows[0];
    $display = "style='display:none;'";
    $editid = stripslashes_deep($editid);
?>
<div class='container' >
    <center><h3 class='heading'>Edit Class</h3></center>
    <form method='post' action=''>
    <table class='table'>
        <tr>
            <td><strong>Enter Class Name :</strong></td>
            <td><input type='text' name='updateclass' value='<?php echo esc_html($row['class']);?>' required></td>
        </tr>
        <tr>
            <td></td>
            <td><input type='submit' value='Update' class='btn btn-primary' name='updatesubmit'></td>
        </tr>
        <a href='<?php echo admin_url("admin.php?page=eusr-class");?>' style='float:right;' class='btn btn-primary m-2'>View All</a>
    </table>
    </form>
    
</div>
<?php
if(isset($_POST['updateclass'])){
    $updateclass = stripslashes_deep(sanitize_text_field(($_POST['updateclass'])));
$updated = $wpdb->update($prefix.eusr_class, array('class'=>$updateclass), array('id'=>$editid));
}
if(isset($_POST['updatesubmit'])){
if($updated>0){
header('Location: '.admin_url("admin.php?page=eusr-class&edit=true"));
}
}
}
?>

<div class='classcontainer m-4 px-1' <?php echo $display;?>>
        <center><a href='<?php echo admin_url("admin.php?page=eusr-class");?>'><h3 class='heading'>Classes Added by You</h3></a></center>
    <div style='float:right;' >
        <button  onclick="document.getElementById('addmodal').style.display='block'" id="adddelete" class='btn btn-primary m-2'>Add Class</button>
    </div>
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Class Id</th>
      <th scope="col">Classes</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      <?php 
      $sql = "SELECT * FROM `{$prefix}eusr_class`";
      $row = $wpdb->get_results($sql, ARRAY_A);
      $num = $wpdb->query($sql);
      $i = 1;
      foreach($row as $row){
          ?>
      
    <tr>
      <th><?php echo esc_html($row['id']);?></th>
      <td><strong><?php echo esc_html($row['class']);?></strong></td>
      <td><a href="<?php echo admin_url('admin.php?page=eusr-class&editid=');?><?php echo esc_html($row['id']);?>"><img width="20px" src="<?php echo plugins_url('/e-unlocked-student-result/images/edit.svg');?>"></a> / <a href="<?php echo admin_url('admin.php?page=eusr-class&delid=');?><?php echo esc_html($row['id']);?>" onclick="return eusr_show_confirm();" rel="tooltip" title="Delete" class="delete"> <img width="20px" src="<?php echo plugins_url('/e-unlocked-student-result/images/delete.png');?>"></a></td>
      
     
      
    </tr>
    <?php
    $i++;
    }
      ?>
    
  </tbody>
</table>

<?php
    if(count($row)==0){
        ?>
        <h2><center>No Classes Added</center></h2>
        <?php
    }
?>



<div id="addmodal" class="modal w3-center w3-animate-zoom">
  <span onclick="document.getElementById('addmodal').style.display='none'" class="close" title="Close Modal">X</span>
  <div class="modal-content">
      
    <div class="addcontainer">
      <h1><center>Add Class</center></h1>
      <p><center>Enter Class Name and Click on Add Class</center></p>
        <form method="post" action="">
            <center><input type='text' name='class' required></center>
      <center>
          <div class="clearfix">
        <button type="button" class="cancelbtn mx-2 btn btn-secondary" onclick="document.getElementById('addmodal').style.display='none'">Cancel</button>
        <input type="submit" name="addsubmit" class="addbtn btn btn-primary" value="Add Class"></form></center>
      </div>
    </div>
  </div>
</div>

</div>
<?php 
if(isset($_POST['addsubmit'])){
    $class = sanitize_text_field($_POST['class']);
    $inserted = $wpdb->insert($prefix.'eusr_class', array(
                'id' => NULL,
                'class' => $class
        ), array('%d', '%s'));
        if($inserted>0){
    header('Location: '.admin_url("admin.php?page=eusr-class&add=true"));
}}

?>
<script type="text/javascript">
function eusr_show_confirm() {
    return confirm("Do You Really Want to delete the Class ? It will delete all the records regarding this class like subjects and all students. ");
}
</script>