<?php global $wpdb; 

if(isset($_POST["Lucky_Draw_Submit"])){
  if(wp_kses_post(wp_unslash(isset($_POST["Lucky_Draw_Nonce_Field"])))&&wp_verify_nonce(wp_kses_post(wp_unslash($_POST["Lucky_Draw_Nonce_Field"])),'Lucky_Draw_Nonce')){ 
    include_once Lucky_Draw_Plugin_Path.'includes/putvalues.php';

}else {  die; }
}

$nonce= wp_nonce_url( home_url().'/wp-admin/admin.php?page=lucky-draw','URL_CHECK');

$serialno=0;
$result = $wpdb->get_results( "SELECT * FROM wp_lucky_draw ORDER BY id DESC " ); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.SchemaChange

?>
<div style="width:60em;margin-left:-5em;"class="mt-5 ms-5 shadow  mb-5 bg-dark-tertiary rounded">
<?php 
if(isset($_GET['_wpnonce'])){
  if ( wp_verify_nonce(wp_kses_post(wp_unslash($_GET['_wpnonce'])), 'URL_CHECK' )==1 ) {

  //Nonce Verified Via Url

    if(isset($_GET['id'])){
      //Delete Draw
     $fid=wp_kses_post(wp_unslash($_GET['id']));
    $wpdb->delete( $wpdb->prefix.'lucky_Draw', array( 'id' => $fid) );  // phpcs:ignore WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.SchemaChange
    //db call ok; no-cache ok
      // Show Alert 
    ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Draw Successfully Deleted</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    } 
  }
  else
  {
    die();
  }

}  ?>


<!-- Display Table WHen Records Found Else Display NOT FOUND DIV -->
<?php $total_draws = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM %i ",Lucky_Draw_Database)); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.SchemaChange
if($total_draws>0){ ?>


<table id="luckydrawtables">
  <tr>
    <th>Sr.No</th>
    <th>Draw Name</th>
    <th>Draw Date</th>
    <th>Prizes</th>
    <th>Status</th>
    <th>Participants</th>
    <th>Action</th>
  </tr>
  
<?php   
foreach ($result as $post){
  $serialno=$serialno+1;
echo '<tr>'; //Row Create 
echo '<td>'.wp_kses_post($serialno).'</td>';
$fsrno=wp_kses_post($srno = $post->id);
echo '<td>'.wp_kses_post($drawname = $post->draw_name).'</td>';
echo '<td>'.wp_kses_post($drawdate = $post->draw_date).'</td>';
$drawprize=$post->prizes;
$drawprize=unserialize($drawprize);
echo '<td>'.wp_kses_post($drawprize["SKUText1"]).'</td>';

echo '<td>';
if($drawstatus = $post->status==1){

echo '<span id="luckydrawtablestatus">Active</button>';
}else{
  echo '<span id="luckydrawtablestatus">Inactive</button>';
}
echo '</td>';


//Get Total Participants For Draw
$contestant_count = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM %i WHERE contest_id =%s  ",Lucky_Draw_Database2,$fsrno)); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.SchemaChange

echo '<td>'.$contestant_count.'</td>';
echo '<td><a href="'.wp_kses_post($nonce).'&id='.wp_kses_post($fsrno).'" ><button id="luckydrawtablebutton">Delete</button></a>';

} }else{
?>

<table id="luckydrawtables">
  <tr>
    <th>Sr.No</th>
    <th>Draw Name</th>
    <th>Draw Date</th>
    <th>Prizes</th>

    <th>Participants</th>
    <th>Status</th>
    <th>Action</th>
  </tr>
  </table><div id="luckydrawnodrawfound">NO DRAW FOUND!</div>

</div><?php } ?>