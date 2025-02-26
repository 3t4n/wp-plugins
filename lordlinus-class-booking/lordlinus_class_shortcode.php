<script src="<?php echo plugins_url('/datepicker-assets/js/jquery.ui.datepicker.js', __FILE__); ?>" type="text/javascript"></script>
<?php echo "<link rel='stylesheet' type='text/css' href='".plugins_url('/bootstrap-assets/css/bootstrap.css', __FILE__)."' />"; ?>
<link rel='stylesheet' type='text/css' href='<?php echo plugins_url('/datepicker-assets/css/jquery-ui-1.8.23.custom.css', __FILE__); ?>' />
<script>
jQuery(document).ready(function() {
document.addnewappointment.appdate.value = jQuery.datepicker.formatDate('dd-mm-yy', new Date());

	jQuery('#lordlinus_class_shortcode').click(function(){
		jQuery('#lordlinus_clss_firstmodal').show('slow');
	});
	jQuery('#closemodal').click(function(){
		jQuery('#lordlinus_clss_firstmodal').hide('slow');
	});
	
	jQuery('#classlist').change(function(){
			jQuery("#sheduling_wait2").show();
			var ServiceId = jQuery("select#classlist").val();
			if(ServiceId > 0)
			{
				var FirstData = "ServiceId=" + ServiceId;
				var currenturl = jQuery(location).attr('href');
				var url = currenturl;
				jQuery.ajax({
					dataType : 'html',
					type: 'GET',
					url : url,
					data : FirstData,
					complete : function() { },
					success: function(data) 
						{
							
							data=jQuery(data).find('div#stfflistdiv');
							jQuery('#staff').show();
							jQuery('#staff').html(data);
							jQuery("#sheduling_wait2").hide();
						}
				});
			}
		});	
});
		jQuery(function(){ 
			jQuery("#datepicker").datepicker({
				inline: true,
				minDate: 0,
				altField: '#alternate',
				onSelect: function(dateText, inst) { 
					var dateAsString = dateText; 
					var seleteddate = jQuery.datepicker.formatDate('dd-mm-yy', new Date(dateAsString));
					document.addnewappointment.appdate.value = seleteddate;
				}
			});
		});
		function backtopavolian()
		{
			jQuery('#lordlinus_clss_firstmodal').show();
			jQuery('#AppSecondModalData').hide();
			return false;
		}
		function CloseModelform()
		{
			jQuery("#AppForth").hide();
		}
		function validate_step1()
		{
			var staff = jQuery('#stafflist').val();
			if(staff == 0)
			{
				alert('Please Select Staff');
				return false;
			}
			var raddio = jQuery("input[name=selectshift]:checked").val();
			if(!raddio)
			{
				alert('Please Select Shift');
				jQuery('#errorshift').show();
				return false;
			}
			
			//return false;
			
			
		}
		function booknow_final()
		{
			jQuery('#sheduling_wait').show();
			var client_name = jQuery('#client_name').val();
			if(client_name == '')
			{
				alert('Please Enter Any of the candidate name');
				jQuery('#sheduling_wait').hide();
				return false;
			}
			var client_email = jQuery('#client_email').val();
			if(client_email == '')
			{
				alert('Please Enter Client Email id');
				jQuery('#sheduling_wait').hide();
				return false;
			}
			var rx = /^([^\s@,:"<>]+)@([^\s@,:"<>]+\.[^\s@,:"<>.\d]{2,}|(\d{1,3}\.){3}\d{1,3})$/;
			var part = client_email.match(rx);
			if (!part )
			{
				alert('Please Enter Correct Email Id');
				jQuery('#sheduling_wait').hide();
				return false;
			}
			var client_phone = jQuery('#client_phone').val();
			if(client_phone == '')
			{
				alert('Please Enter Client Phone number');
				jQuery('#sheduling_wait').hide();
				return false;
			}
			if(isNaN(client_phone)==true)
			{
				alert('Please Enter Client Phone number in numbers only');
				jQuery('#sheduling_wait').hide();
				return false;
			}
		}
function getShift()
{
	var ServiceId = jQuery("#stafflist").val();
	//alert(ServiceId);
	if(ServiceId > 0)
	{
		jQuery('#sheduling_wait').show();
		var FirstData = "ServiceId2=" + ServiceId;
		var currenturl = jQuery(location).attr('href');
		var url = currenturl;
		jQuery.ajax({
			dataType : 'html',
			type: 'GET',
			url : url,
			data : FirstData,
			complete : function() { },
			success: function(data) 
				{
					//alert(data);
					data=jQuery(data).find('div#stfflistdiv2');
					//console.log(data);
					jQuery('#staff2').show();
					jQuery('#staff2').html(data);
					jQuery('#sheduling_wait').hide();
					
				}
		});
	}
	else
	{
		alert("Select Proper Class");
	}
}
</script>
<?php
$display_s = get_option('lordlinus_display_seting_book');
if($display_s == '1')
	$classssss_m = "modal";
elseif($display_s == '2')
	$classssss_m = '';
else
	$classssss_m = "modal";
?>
<div align="center">
<button id="lordlinus_class_shortcode" type="submit" class="btn btn-primary"> Reserve your class</button>
<p style="font-size:10px;margin-left:40px;"><a href="http://singhalrohitashv.com"> Powered by Rohitashv Singhal</a></p>
</div>
<div id="AppSecondModal" style="display:none;">hhh</div>
<div class="<?php echo $classssss_m; ?>" style="display:none;z-index:9999;height:400px" id="lordlinus_clss_firstmodal">
		<div class="modal-info">
			<div class="alert alert-info">
				<a href="#" style="float:right; margin-right:-4px; margin-top:12px;" id="closemodal"><i class="icon-remove"></i></a>
				<h4 align="center" ><?php _e('Reserve your class', 'classbooking'); ?></h4>
			</div>
		</div>
		<div class="modal-body">
		<form name="addnewappointment" id="addnewappointment" action="#" method="POST">
			<?php
				global $wpdb;
				$allclasses = "SELECT * FROM `lordlinus_class_book`";
				$allclasslist = $wpdb->get_results($allclasses);
				echo "<strong>Select Class:</strong><br/>";
				?>
				<select name="classlist" id="classlist">
				<option value="0">Select Class</option>
				<?php
				foreach($allclasslist as $allclasslist)
					echo "<option value='$allclasslist->id'>$allclasslist->name</option>";
				?>
				</select>
				<br/>
				<div>
				<div style="width:60%;float:left;">
				<div id="datepicker"></div></div>
				<div style="width:39%;float:right;">
				Selected Date : <input name="appdate" id="appdate" type="text" readonly="" style="height:30px;" /><br>
				<strong>Select Staff : </strong> <span id="staff"></span><br/>
				<span id="sheduling_wait2" style="display:none;"><?php _e("Loading Staff List...", "lordlinus-class-book`"); ?><img src="<?php echo plugins_url()."/lordlinus-class-booking/images/loading.gif"; ?>" /></span>
				<span id="sheduling_wait" style="display:none;"><?php _e("Loading Shifts...", "lordlinus-class-book`"); ?><img src="<?php echo plugins_url()."/lordlinus-class-booking/images/loading.gif"; ?>" /></span>
				<span id="staff2"></span>
				<br/><button  class="btn btn-primary" id="submitdata1" onclick="return validate_step1();"> Next &rarr; </button>
				</div>
				</div>
				<?php
			?>
		</table>
		</form>
		</div>
</div>
<?php
if(isset($_GET['ServiceId']) && !isset($_GET['classname']))
{
	?>
	<div id="stfflistdiv">
	 <?php 
		global $wpdb;
		$serviceid = $_GET['ServiceId'];
		$allclassess = "SELECT * FROM `lordlinus_class_book` where `id`= $serviceid";
		$allclassess = $wpdb->get_results($allclassess);
		$staffid = $allclassess[0]->staff_name;
		
		$stafflist = "SELECT * FROM `lordlinus_class_staff` WHERE `id`= '$staffid'";
		$stafflists = $wpdb->get_results($stafflist);
		//print_r($stafflists);
	 ?>
	 
	 <select name="stafflist" id="stafflist" style="width:200px;" onChange="return getShift();">
	 <option value="0">Select Staff</option>
	 <?php
		foreach($stafflists as $stafflists)
		{
			echo "<option value='$stafflists->id'>$stafflists->name</option>";
		}
	 ?>
	 </select>
	 
		
	
	<?php
}
//print_r($_POST);
if(isset($_POST['classlist']))
{
	?>
	<div id="AppSecondModalData">
		<div class="<?php echo $classssss_m; ?>" id="AppThirdModal" style="z-index:9999;display:block;height:500px;">
		<form action="" method="post" name="thirdmodal" id="thirdmodal">
			<input name="classname" id="classname" type="hidden" value="<?php echo $_POST['classlist']; ?>" />
			<input name="staffname" id="staffname" type="hidden" value="<?php echo $_POST['stafflist']; ?>" />
			<input name="shiftname" id="shiftname" type="hidden" value="<?php echo $_POST['selectshift']; ?>" />
			<input name="appdate" id="appdate" type="hidden" value="<?php echo $_POST['appdate']; ?> "/ >
			<div class="modal-info">
				<div style="float:right; margin-top:5px; margin-right:10px;">
					<a href="" onclick="CloseModelform()" id="close" ><i class="icon-remove"></i></a>
				</div>
				<div class="alert alert-info">
					<h4><?php _e('Reserve your class', 'classbooking'); ?></h4><?php _e('Step-2. Fill Up Your`s Details', 'classbooking'); ?>
				</div>
			</div>				
			<div class="modal-body">
				<table width="100%" class="table">
				 
						<?php 
						$class_Cap = $_POST['selectshift'];
						$query = "select * from `lordlinus_class_shift` where `id`=$class_Cap ";
						$noofse = $wpdb->get_row($query);
						$noofses = $noofse->no_of_seats;
						if($noofses <= 0)
						{
							echo "<div class='alert alert-error'>Sorry !!! No Seats available Right Now<br/> Please Select Another Date</div>";
							echo "<br/><button class='btn btn-primary' id='backtopav' onclick='return backtopavolian();'>Back</button>";
						}
						else
						{
						?>
						 <tr>
					<th scope="row"><?php _e('Select No of Candidates', 'classbooking'); ?></th>
					<td><strong>:</strong></td>
					<td>
					<select name="slect_candidates">
					<?php
						for($i=1; $i<=$noofses; $i++)
						{
							echo "<option value='$i'>$i</option>";
						}
						?>
					</select>
					
					</td>
				  </tr>
				  
				  <tr>
					<th scope="row"><?php _e('Name Of the First Candidate', 'classbooking'); ?></th>
					<td><strong>:</strong></td>
					<td><input name="client_name" type="text" id="client_name" style="height:30px;" /></td>
				  </tr>
				  <tr>
					<th scope="row"><?php _e('Email', 'classbooking'); ?></th>
					<td><strong>:</strong></td>
					<td><input name="client_email" type="text" id="client_email" style="height:30px;" /></td>
				  </tr>
				  <tr>
					<th scope="row"><?php _e('Phone', 'classbooking'); ?></th>
					<td><strong>:</strong></td>
					<td><input name="client_phone" type="text" id="client_phone" style="height:30px;"  maxlength="14"/></td>
				  </tr>
				  <tr>
					<th scope="row"><?php _e('Special Instruction', 'classbooking'); ?></th>
					<td><strong>:</strong></td>
					<td><textarea name="client_note" id="client_note"></textarea></td>
				  </tr>
				  <tr>
				    <th scope="row">&nbsp;</th>
				    <td>&nbsp;</td>
				    <td>
					<div id="formbtndiv">
					<button type="submit" class="btn btn-primary" value="" id="booknow" onclick="return booknow_final();" name="booknow"><?php _e('Book Now', 'classbooking'); ?></button>	</div>
					<div id="sheduling_wait" style="display:none;"><?php _e('Sheduling Apoointment, Please wait...', 'classbooking'); ?><img src="<?php echo plugins_url('images/loading.gif', __FILE__); ?>" /></div>
					</td>
			      </tr>
				  <?php
				  }
				  ?>
				</table>
			</div>
		</form>
		</div>
	<?php
}
if((isset($_POST['client_name'])) && isset($_POST['client_email']))
{
	global $wpdb;
	include("Mailinter.php");
	$mail_send = new Mailinter;
	//print_r($mail_send);
	$classname = $_POST['classname'];
	$staffname = $_POST['staffname'];
	$shiftname = $_POST['shiftname'];
	$appdate = $_POST['appdate'];
	$name = $_POST['client_name'];
	$email = $_POST['client_email'];
	$phone = $_POST['client_phone'];
	$note = $_POST['client_note'];
	$no_of_candidates = $_POST['slect_candidates'];
	$insert_date_query = "insert into `lordlinus_class_cooking`(`id`, `class_id`,`staff_id`, `shift_id`, `appdate`, `name`, `email`, `phone`, `note`,`noofcandi`)
	value ('','$classname', '$staffname', '$shiftname', '$appdate', '$name', '$email', '$phone', '$note','$no_of_candidates')";
	$wpdb->query($insert_date_query);
	$query = "select * from `lordlinus_class_shift` where `id`=$shiftname ";
	$noofse = $wpdb->get_row($query);
	$noofses = $noofse->no_of_seats;
	$rem_set = $noofses - $no_of_candidates;
	$update_q = "UPDATE `lordlinus_class_shift` SET `no_of_seats`=$rem_set where `id`=$shiftname";
	$wpdb->query($update_q);
	?>
	<div class="<?php echo $classssss_m; ?>" id="AppForth" style="z-index:9999;display:block;height:500px;">
			<div class="modal-info">
				<div style="float:right; margin-top:5px; margin-right:10px;">
					<a href="" onclick="CloseModelform()" id="close" ><i class="icon-remove"></i></a>
				</div>
				<div class="alert alert-info">
					<h4><?php _e('Confirmation of Reserve class', 'classbooking'); ?></h4><?php _e('Final Confirmation', 'classbooking'); ?>
				</div>
			</div>				
			<div class="modal-body">
			<div class='alert alert-info'>Your Appointments has been Scheduled according to following details</div>
				<table width="100%" class="table">
				  
				  <tr>
					<th scope="row"><?php _e('Name Of the First Candidate', 'classbooking'); ?></th>
					<td><strong>:</strong></td>
					<td><?php echo $name; ?></td>
				  </tr>
				   <tr>
					<th scope="row"><?php _e('Name Of Seats Booked', 'classbooking'); ?></th>
					<td><strong>:</strong></td>
					<td><?php echo $no_of_candidates; ?></td>
				  </tr>
				  <tr>
					<th scope="row"><?php _e('Email', 'classbooking'); ?></th>
					<td><strong>:</strong></td>
					<td><?php echo $email; ?></td>
				  </tr>
				  <tr>
					<th scope="row"><?php _e('Phone', 'classbooking'); ?></th>
					<td><strong>:</strong></td>
					<td><?php echo $phone; ?></td>
				  </tr>
				  <tr>
					<th scope="row"><?php _e('Special Instruction', 'classbooking'); ?></th>
					<td><strong>:</strong></td>
					<td><?php echo $note; ?></td>
				  </tr>
				  <tr>
				    <th scope="row">&nbsp;</th>
				    <td>&nbsp;</td>
				    <td>
					<div id="formbtndiv">
					<button class="btn btn-danger" value="" id="booknow4" onclick="CloseModelform()" name=""><?php _e('Close', 'classbooking'); ?></button>	</div>
					<div id="sheduling_wait" style="display:none;"><?php _e('Sheduling Apoointment, Please wait...', 'classbooking'); ?><img src="<?php echo plugins_url('images/loading.gif', __FILE__); ?>" /></div>
					</td>
			      </tr>

				</table>
			</div>
		</form>
		</div>
	
	<?php
	$bloginfo = get_bloginfo( 'name' );
	//$bloginfo = $blog_details->blogname;
	
	$shift_query = "select * from `lordlinus_class_shift` where `id`=$shiftname ";
	$re_shift = $wpdb->get_results($shift_query);
	//print_r($re_shift);
	$st_t = $re_shift[0]->start_time;
	$ed_t = $re_shift[0]->end_time;
	
	$staff_query = "select * from `lordlinus_class_staff` where `id`=$staffname ";
	$re_staff = $wpdb->get_results($staff_query);
	$st_name = $re_staff[0]->name;
	$st_email = $re_staff[0]->email;
	
	$class_query = "select * from `lordlinus_class_book` where `id`=$classname ";
	$re_class = $wpdb->get_results($class_query);
	$cl_name = $re_class[0]->name;
	
	$sub = "Online Booking Made";
	$mail_body_client = "Hello $name <br/><br/>
	Thank you for Scheduling Appointment with us. Please Carry this appointment letter with you at the time of schedule<br/><br/>
	Your Appointment Details are as Follow : <br/>
	Class Name : $cl_name ;<br/>
	Staff Name : $st_name ;<br/>
	Appointment Date : $appdate ;<br/>
	Shift Time : $st_t to $ed_t ;
	<br/><br/>
	Please be strict about the timings. <br/><br/><br/>
	Thanks & Regards<br/>
	$bloginfo <br/><br/><font size='-2'>Powered By <a href='http://impulsesoftech.in'>Impulse Softech</a></font>";
	
	$mail_body_staff = "Hello $st_name<br/>
	A booking has been done for your class. Details are as follow :<br/><br/>
	Class Name : $cl_name ;<br/>
	Staff Name : $st_name ;<br/>
	Appointment Date : $appdate ;<br/>
	Shift Time : $st_t to $ed_t ;<br/>
	Name : $name<br/>
	Number of Candidate : $no_of_candidates<br/><br/><br/>
	Thanks<br/>
	$bloginfo <br/><br/><font size='-2'>Powered By <a href='http://Singhalrohitashv.com'>Rohitashv Sighal</a></font>";
	
	
	$mail_send->send_mail_on_booking_staff($st_email, $mail_body_staff);
	$mail_send->send_mail_on_booking_staff($email, $mail_body_client);
}
if(isset($_GET['ServiceId2']))
{
?>
	<div id="stfflistdiv2" style="margin-top:-35px;">
	 <?php 
		global $wpdb;
		$servicId = $_GET['ServiceId2'];
		$shiftlist = "select * from `lordlinus_class_shift` where `class_id`= '$servicId'";
		$shtiftlists = $wpdb->get_results($shiftlist);
		echo "<br><strong>Select Shift</strong><br/>";
		foreach($shtiftlists as $shtiftlists)
		echo "<input type='radio' name='selectshift' value='$shtiftlists->id'> &nbsp; $shtiftlists->start_time - $shtiftlists->end_time <br/>";
		?>

	 </div>
<?php
}
?>
