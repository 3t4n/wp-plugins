<?php 

if ( ! defined( 'ABSPATH' ) ) exit;

global $wpdb;

global $user_ID;

$getallservices = $wpdb->get_results(

@$wpdb->prepare("SELECT * from ".my_sercices_detaildata()." ORDER BY id desc","")

); ?>

<?php if(count($getallservices)>0){
	$i = 1; 
     foreach ($getallservices as $key => $value) {  ?>

<div class="gs-my-service-block">
<p><img style="width: 100%;height: 200px" src="<?php echo esc_url($value->serviceimage); ?>"></p>	
<h3 class="servicenamecls" style="background-color: white;">SERVICE NAME</h3>
<h3 class="servicenamecls"><?php echo esc_html($value->name); ?></h3>
<h3 class="serviceprovidercls" style="background-color: white;">SERVICE PROVIDER NAME</h3>
<h3 class="serviceprovidercls"><?php echo esc_html($value->client_name); ?></h3>

<?php
// 1st Method - Declaring $wpdb as global and using it to execute an SQL query statement that returns a PHP object
global $wpdb;
$datadetail =  $value->id;
$accestabledataa = my_services_access_tracker();
$userdataasses = new WP_User(get_current_user_id());
$acciesuserservs_id = $wpdb->get_results( "SELECT * FROM $accestabledataa WHERE serviceuser_id = '$userdataasses->ID' AND service_id = '$datadetail'",OBJECT);
?>


<?php if (is_array($acciesuserservs_id) && !empty($acciesuserservs_id)) { 
  foreach ($acciesuserservs_id as $item) {    ?>           
   
<button type="button" class="btn btn-primary" style="background-color: green; width: 45%;font-size: 13px;" >
  Enrolled
</button>

<button type="button" class="btn btn-primary" style="background-color:#650217; width: 30%;font-size: 14px;" data-toggle="modal" data-target="#myModal1-<?php echo $i;  ?>">
  View
</button>

<?php } } else { ?>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal-<?php echo $i;  ?>">
  Enroll Now
</button>

<?php } ?>



<!--*************** Enroll Confirm popup ***********-->

<div class="modal" id="myModal-<?php echo $i; // Displaying the increment ?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h3 class="modal-title" style="font-size: 16px;font-weight: 600;">Are You Sure Enroll in <span style="color: blue;"><?php echo esc_html($value->name); ?>.</span></h3>
  <div id="result"></div>
      </div>
<form class="save_enroll" action="javascript:void(0)" id="saveenrollment<?php echo esc_html($value->id); ?>">
	
	<input type="hidden" name="service_id" value="<?php echo esc_html($value->id);  ?>">
	<input type="hidden" name="service_name" value="<?php echo esc_html($value->name); ?>">
	<input type="hidden" name="user_id" value="<?php echo esc_html($user_ID); ?>">

	<button class="btn my_service_gs_btnyes" type="submit" style="width: 50%;" >Yes</button>

	<button type="button" class="btn my_service_gs_btn btn-danger" data-dismiss="modal" style="width: 50%;">Close</button>

</form>

    </div>
  </div>
</div>

<!--*************** Enroll Confirm popup ***********-->


<!--*************** View data popup ***********-->

<div class="modal" id="myModal1-<?php echo $i; // Displaying the increment ?>" >
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h3 class="modal-title" style="font-size: 16px;font-weight: 600;"> Detail Of <span style="color: blue;"><?php echo esc_html($value->name); ?>.</span></h3>
        <button type="button" class="btn btn-danger" data-dismiss="modal" style="width: 20%;float: right;">Close</button>
      </div>
      <div class="modal-header">
        <?php echo esc_html($value->description); ?>
</div>
	<div class="modal-header">	
<?php 
$mydata =  $value->service_documnts; 
$mydata = unserialize($mydata); ?> 
<?php $dummyfileurlvw = plugin_dir_url( __DIR__ ).'assets/images/dummy12.jpg';?>

<div class="row">

<?php foreach ($mydata as $key => $valuedocfile) { ?>

<?php if(!empty($valuedocfile)) { ?>
	
<div class="popupcontent">

<embed src="<?php echo esc_url($valuedocfile); ?>" style='width:70px;height:70px;'/>
<br>

<a href="<?php echo esc_url($valuedocfile); ?>" download>
<button type="button" class="btn btn-primary" style="background-color: green; padding: 5px;margin: 1px; " >Download</button></a><br>	

	</div>


<?php } else { echo ""; } ?>		

<?php } ?>
</div>
			

      </div>
 		
    </div>
  </div>
</div>

<!--*************** View Data popup ***********-->





<script type="text/javascript">
	

jQuery(document).ready(function() {

    jQuery('#saveenrollment<?php echo $value->id  ?>').validate({

		submitHandler:function(){

			var savedataentollment = "action=myserviceslib&param=save_entollment&"+jQuery('#saveenrollment<?php echo $value->id  ?>').serialize();
			
			jQuery.post(myservicesajaxurl,savedataentollment,function(response){
				
					//var dataenroll = jQuery.parseJSON(response);
					var dataenroll = JSON.parse(response);
					//console.log(parsed_data.success);
					//console.log(response);
					//console.log(dataenroll.status);
					if(dataenroll.status==1){
						console.log(dataenroll.status);
						jQuery.notifyBar({
						cssClass:"success",
						//html:data.message
						html: "Thank you, your Enrollment!",
					    delay: 200,
					    animationSpeed: "normal"
						});
						setTimeout(function(){
							//window.location.href = site_url().'/my_gs_service/';
							location.reload();
						},200)
					}
					else{

						if(dataenroll.status==2){
						console.log(dataenroll.status);
						jQuery.notifyBar({
						cssClass:"errors",
						//html:data.message
						html: "You Are Allready Enrolled!",
					    delay: 200,
					    animationSpeed: "normal"
						});				
						setTimeout(function(){
							//window.location.href = site_url().'/my_gs_service/';
							location.reload();
						},500)
					}



					}
			});
			}
	});
	
});


</script>



</div>


<?php  $i++; } } ?>

