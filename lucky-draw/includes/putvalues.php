<?php
if ( !defined('ABSPATH') ){
  die();
}
global $wpdb;
echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">';
if(isset($_POST["Lucky_Draw_Submit"])){ 


//Draw Details

$valuedrawtype=Luckydrawcheckifset("valuedrawtype",'valuedrawtype');

$valuedrawfixed=Luckydrawcheckifset("valuedrawfixed",'valuedrawfixed');

$valuedrawfixedheight=Luckydrawcheckifset("valuedrawfixedheight",'valuedrawfixedheight');

$valuedrawfixedwidth=Luckydrawcheckifset("valuedrawfixedwidth",'valuedrawfixedwidth');

$valuedrawfixedposition=Luckydrawcheckifset("valuedrawfixedposition",'valuedrawfixedposition');

$valuedrawfixedposition=LuckyDrawgetpositon($valuedrawfixedposition);


//
$drawtype=array("drawtype"=>$valuedrawtype,"fixed"=>$valuedrawfixed,"height"=>$valuedrawfixedheight,"width"=>$valuedrawfixedwidth,"position"=>$valuedrawfixedposition);
$drawtype=serialize($drawtype);


$valuedrawname=Luckydrawcheckifset("valuedrawname",'valuedrawname');

$valuedrawurl=Luckydrawcheckifset("valuedrawurl",'valuedrawurl');

$valuedrawdesc=Luckydrawcheckifset("valuedrawdesc",'valuedrawdesc');

$valuedrawdate=Luckydrawcheckifset("valuedrawdate",'valuedrawdate');


//Prize Details
$valuedrawprizesku=Luckydrawcheckifset("valuedrawprizesku",'valuedrawprizesku');

$valuedrawprizetext=Luckydrawcheckifset("valuedrawprizetext",'valuedrawprizetext');

$prize=array("SKU1"=>$valuedrawprizesku,"SKUText1"=>$valuedrawprizetext);
$prize=serialize($prize);

//Mail Settings

$valuedrawparticipationmail=Luckydrawcheckifset("valuedrawparticipationmail",'valuedrawparticipationmail');

$valuedrawlosingnmail=Luckydrawcheckifset("valuedrawlosingnmail",'valuedrawlosingnmail');
$mailing=array("participationmail"=>$valuedrawparticipationmail,"losingmail"=>$valuedrawlosingnmail);
$mailing=serialize($mailing);




//Box Styling
$valuedrawboxstyle=Luckydrawcheckifset("valuedrawboxstyle",'valuedrawboxstyle');

$valuedrawboxdivider=Luckydrawcheckifset("valuedrawboxdivider",'valuedrawboxdivider');

$valuedrawboxheading=Luckydrawcheckifset("valuedrawboxheading",'valuedrawboxheading');

$valuedrawdescription=Luckydrawcheckifset("valuedrawdescription",'valuedrawdescription');

$valuedrawprize=Luckydrawcheckifset("valuedrawprize",'valuedrawprize');

$valuedrawcountdownnumber=Luckydrawcheckifset("valuedrawcountdownnumber",'valuedrawcountdownnumber');

$valuedrawcountdowndays=Luckydrawcheckifset("valuedrawcountdowndays",'valuedrawcountdowndays');

$valuedrawbuttontext=Luckydrawcheckifset("valuedrawbuttontext",'valuedrawbuttontext');

$valuedrawactionbutton=Luckydrawcheckifset("valuedrawactionbutton",'valuedrawactionbutton');

$valuedrawclosebutton=Luckydrawcheckifset("valuedrawclosebutton",'valuedrawclosebutton');

//Serialize Box Settings
$boxstyle=array(
  "box"=>$valuedrawboxstyle,
  "heading"=>$valuedrawboxheading,
  "divider"=>$valuedrawboxdivider,
  "description"=>$valuedrawdescription,
  "prize"=>$valuedrawprize,
  "countdownnumber"=>$valuedrawcountdownnumber,
  "countdowndays"=>$valuedrawcountdowndays,
  "buttontext"=>$valuedrawbuttontext,
  "actionbutton"=>$valuedrawactionbutton,
  "closebutton"=>$valuedrawclosebutton,
);

$boxstyle=serialize($boxstyle);

$valuedrawdate=date('Y-m-d', strtotime($valuedrawdate));




// Value 1 is Active and 0 Deactive For Status
$wpdb->insert($wpdb->prefix.'lucky_draw',
array(
  'draw_type'=>$drawtype,
  'draw_name' => $valuedrawname,
  'draw_desc' => $valuedrawdesc,
  'img_url'=>$valuedrawurl,
  'status' => 1,
   'draw_date'=> $valuedrawdate,
   'sendmail'=>$mailing,
   'prizes'=> $prize,
   'box_style'=> $boxstyle
  )); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.SchemaChange
?>

  Contest Name <strong><?php echo wp_kses_post($valuedrawname); ?></strong> Successfully Added ! 

  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>