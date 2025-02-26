<?php 
if ( !defined('ABSPATH') ){
  die();
}


 global $wpdb;
 global $current_user;
      wp_get_current_user();

 $datetoday= gmdate('Y-m-d ', time());

?>
<div style="width:60em;margin-left:-5em;"class="mt-5 ms-5 shadow  mb-5 bg-dark-tertiary rounded">
  
  <?php
if(isset($_GET['_wpnonce'])){
  if ( wp_verify_nonce(wp_kses_post(wp_unslash($_GET['_wpnonce'])), 'URL_CHECK' )==1 ) {
  //Nonce Verified Via Url

    if(isset($_GET['id'])){
      $contest_id=wp_kses_post(wp_unslash($_GET['id']));
      // get contestant and insert in array
      $luckydrawdb=$wpdb->prefix.'lucky_draw_contestants';
      $serialno=0;
      $const_email[0]=0;
      $const_name[0]='';
      $maindb=$wpdb->prefix.'lucky_draw';
      $drawname = $wpdb->get_var($wpdb->prepare("SELECT draw_name FROM %i WHERE id =%s ",$maindb,$contest_id)); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.SchemaChange
      $drawdate = $wpdb->get_var($wpdb->prepare("SELECT draw_date FROM %i WHERE id =%s ",$maindb,$contest_id)); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.SchemaChange

      $prize = $wpdb->get_var($wpdb->prepare("SELECT prizes FROM %i WHERE id =%s ",$maindb,$contest_id)); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.SchemaChange
$prize=unserialize($prize);
 
      $result = $wpdb->get_results( // phpcs:ignore WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.SchemaChange
        $wpdb->prepare("SELECT contestants,contestant_name FROM %i WHERE contest_id = %d",$luckydrawdb,wp_kses_post(wp_unslash(($_GET['id'])))
            ));


        foreach ($result as $post){

        $serialno=$serialno+1;
        $contestnt = $post->contestants;
        $const_email[$serialno]=$contestnt;
        $const_name[$serialno]=$post->contestant_name;


      }
       $winno=wp_rand(1,$serialno);

       //Winner Name
        $winner_name=$const_name[$winno];
       //Winnr E-Mail
        $winner_mail=$const_email[$winno];
        
       //Set Contest ID To 0 i.e. InActive
  $wpdb->update($wpdb->prefix.'lucky_draw',array('status' => 0,'winner_email'=>$winner_mail,'winner_name'=>$winner_name),array('id'=>wp_kses_post(wp_unslash($_GET['id'])))); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.SchemaChange
        // phpcs:ignore WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.SchemaChange

// Call Function To Send Mail
        $to      = $winner_mail;
        $subject ="Congratulations! You Are a " .$drawname." Winner";
       
        lucky_draw_winner_mail($to,$winner_name,$winner_mail,$subject,$drawname,$prize["SKUText1"],$drawdate);

        

//Delete Draw
     $fid=wp_kses_post(wp_unslash($_GET['id']));
      // Show Alert 
    ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      Contestant Name<strong> <?php echo wp_kses_post($winner_name); ?></strong> Has Won !!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php




    } 


  }
  else
  {
    die();
  }

}  
$nonce= wp_nonce_url( home_url().'/wp-admin/admin.php?page=drawprize','URL_CHECK');


$serialno=0;
$luckydrawdb=$wpdb->prefix.'lucky_draw';
$result = $wpdb->get_results($wpdb->prepare("SELECT * FROM %i WHERE draw_date <=%s AND status =1 ORDER BY id ASC ",$luckydrawdb,$datetoday));  // phpcs:ignore WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.SchemaChange

 $total_draws = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM %i WHERE draw_date <=%s AND status =1 ORDER BY id ASC ",$luckydrawdb,$datetoday)); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.SchemaChange
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
  </tr><?php 



foreach ($result as $post){
  $serialno=$serialno+1;
echo '<tr>'; //Row Create 
echo '<td>'.wp_kses_post($serialno).'</td>';
$fsrno=wp_kses_post($srno = $post->id);
echo '<td>'.wp_kses_post($drawname = $post->draw_name).'</td>';
echo '<td>'.wp_kses_post($drawdate = $post->draw_date).'</td>';
$drawprize=$post->prizes;
$drawprize=unserialize($drawprize);
echo '<td>'.wp_kses_post($drawprize["SKU1"]).'</td>';

echo '<td>';
if($drawstatus = $post->status==1){

echo '<span id="luckydrawtablestatus">Active</button>';
}else{
  echo '<span id="luckydrawtablestatus">Inactive</button>';
}
echo '</td>';


//Get Total Participants For Draw
$contestant_count = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM %i WHERE contest_id =%s ORDER BY id ASC ",Lucky_Draw_Database2,$fsrno)); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.SchemaChange

echo '<td>'.$contestant_count.'</td>';

echo '<td><a href="'.wp_kses_post($nonce).'&id='.wp_kses_post($fsrno).'" ><button id="luckydrawtablebutton">Draw </button></a>';
} ?> 

        </tfoot>
    </table></div><?php }else{
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
<p style="color:#3498DB;padding:1em;">Note : You can only draw prize when is draw date is over </p>
</div><?php } ?>
    </div>
