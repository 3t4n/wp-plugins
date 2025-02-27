<?php
/*
Plugin Name: Time Based Greeting
Plugin URI:http://www.yashbinani.wordpress.com
Description: Greet Your Website users according to Time of the Day
Version: 2.2.2
Author:Yash Binani.
Author URI:http://www.yashbinani.wordpress.com
License: GPLv2 or later
*/
add_action('admin_menu','mt_add_pages_one');
function mt_add_pages_one()
{
add_menu_page("Time1","Time Based Greeting Free",1,"Time1","user11");
}
function user11()
{
//getting blog location
$get=get_bloginfo('wpurl');
echo "<h2>Fill Setting Information</h2>";
    if (!current_user_can('manage_options'))
    {
      wp_die(__('You do not have sufficient permissions to access this page.'));
    }
    $hidden_field_name = 'mt_submit_hidden';
	
	// Default Time
	
	$time_wd=array(
				'gtimewd'=>7,'atimewd'=>13,'etimewd'=>19,'ntimewd'=>23
			  );

	// Deafault Messages
	$morning_wd=array('gmsgwd'=>'Good Morning','gimgwd'=>'','glinkwd'=>'');
	$afternoon_wd=array('amsgwd'=>'Good Afternoon','aimgwd'=>'','alinkwd'=>'');
	$evening_wd=array('emsgwd'=>'Good Evening','eimgwd'=>'','elinkwd'=>'');
	$night_wd=array('nmsgwd'=>'Up So Late!','nimgwd'=>'','nlinkwd'=>'');

	add_option('timesetting',$time_wd);
	add_option('morning_wd',$morning_wd);
	add_option('afternoon_wd',$afternoon_wd);
	add_option('evening_wd',$evening_wd);
	add_option('night_wd',$night_wd);

//Retrving arrays


	$retsettings=get_option('timesetting');

		$gtimewd=$retsettings[gtimewd];
		$atimewd=$retsettings[atimewd];
		$etimewd=$retsettings[etimewd];
		$ntimewd=$retsettings[ntimewd];

	
	$retm_wd=get_option('morning_wd');
		
		$gmsgwd=$retm_wd[gmsgwd];
		$gimgwd=$retm_wd[gimgwd];
		$glinkwd=$retm_wd[glinkwd];
		

	$retm_wd=get_option('afternoon_wd');
		
		$amsgwd=$retm_wd[amsgwd];
		$aimgwd=$retm_wd[aimgwd];
		$alinkwd=$retm_wd[alinkwd];

	$retm_wd=get_option('evening_wd');
		
		$emsgwd=$retm_wd[emsgwd];
		$eimgwd=$retm_wd[eimgwd];
		$elinkwd=$retm_wd[elinkwd];

	$retm_wd=get_option('night_wd');
		
		$nmsgwd=$retm_wd[nmsgwd];
		$nimgwd=$retm_wd[nimgwd];
		$nlinkwd=$retm_wd[nlinkwd];

//End retriving arrays

//if the user has posted us some information
    

	if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) {
	
        //Read their posted value

//for Weakdays

        $gtimewd = $_POST['gtimewd'];
        $atimewd = $_POST['atimewd'];
        $etimewd = $_POST['etimewd'];
        $ntimewd = $_POST['ntimewd'];

        $gmsgwd = $_POST['gmsgwd'];
        $amsgwd = $_POST['amsgwd'];
        $emsgwd = $_POST['emsgwd'];
        $nmsgwd = $_POST['nmsgwd'];
		
        $gimgwd = $_POST['gimgwd'];
        $aimgwd = $_POST['aimgwd'];
        $eimgwd = $_POST['eimgwd'];
        $nimgwd = $_POST['nimgwd'];

	    $glinkwd = $_POST['glinkwd'];
        $alinkwd = $_POST['alinkwd'];
        $elinkwd = $_POST['elinkwd'];
        $nlinkwd = $_POST['nlinkwd'];
		
	$morning_wd_up=array('gmsgwd'=>$gmsgwd,'gimgwd'=>$gimgwd,'glinkwd'=>$glinkwd);
	$afternoon_wd_up=array('amsgwd'=>$amsgwd,'aimgwd'=>$aimgwd,'alinkwd'=>$alinkwd);

	$evening_wd_up=array('emsgwd'=>$emsgwd,'eimgwd'=>$eimgwd,'elinkwd'=>$elinkwd);
	$night_wd_up=array('nmsgwd'=>$nmsgwd,'nimgwd'=>$nimgwd,'nlinkwd'=>$nlinkwd);

	$timesetting = array('gtimewd'=>$gtimewd,'atimewd'=>$atimewd,'etimewd'=>$etimewd,'ntimewd'=>$ntimewd);
	
	update_option('timesetting',$timesetting);
	update_option('morning_wd',$morning_wd_up);
	update_option('afternoon_wd',$afternoon_wd_up);
	update_option('evening_wd',$evening_wd_up);
	update_option('night_wd',$night_wd_up);

//end of weekday
?>
<div class="updated"><p><strong><?php _e('settings saved.', 'menu-test' ); ?></strong></p></div>
<?php
}	//end of if for posted
//Now display the settings editing screen
    echo '<div class="wrap">';
    //header
       echo "<h2 align=right><a href=http://timebasedgreeting.wordpress.com/ target=_blank>" . __( 'Blog!!', 'menu-test' ) . "</a></h2>";
    echo "<h2>".__( 'Time Based Greeting Free Admin Options', 'menu-test' )."</h2><hr><br><br>";

    //settings form
    
    ?>
<form name="form1" method="post" action="">
<input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">
<br>
<table cellspacing=10 cellpadding=10>
<tr>
<td></td>
<th>Morning</th>
<th>Afternoon</th>
<th>Evening</th>
<th>Night</th>
</tr>
<tr>
<th> <p><?php _e("Time Settings", 'menu-test' ); ?></p></th>
<td><input type="text" name="gtimewd" value="<?php echo $gtimewd; ?>" size="5"> </td>
<td><input type="text" name="atimewd" value="<?php echo $atimewd; ?>" size="5"> </td>
<td><input type="text" name="etimewd" value="<?php echo $etimewd; ?>" size="5"> </td>
<td><input type="text" name="ntimewd" value="<?php echo $ntimewd; ?>" size="5"> </td>
</tr>
<tr>
<th><p><?php _e("Message Settings", 'menu-test' ); ?></p></th>
<td><textarea name="gmsgwd" rows="3" cols="14"><?php echo $gmsgwd; ?></textarea></td>
<td><textarea name="amsgwd" rows="3" cols="14"><?php echo $amsgwd; ?></textarea></td>
<td><textarea name="emsgwd" rows="3" cols="14"><?php echo $emsgwd; ?></textarea></td>
<td><textarea name="nmsgwd" rows="3" cols="14"><?php echo $nmsgwd; ?></textarea></td>
</tr>
<tr>
<th><p><?php _e("Image Settings", 'menu-test' ); ?></p></th>
<td><input type="text" name="gimgwd" value="<?php echo $gimgwd; ?>" size="10"></td>
<td><input type="text" name="aimgwd" value="<?php echo $aimgwd; ?>" size="10"></td>
<td><input type="text" name="eimgwd" value="<?php echo $eimgwd; ?>" size="10"></td>
<td><input type="text" name="nimgwd" value="<?php echo $nimgwd; ?>" size="10">
</td>
</tr>
</table>
<br><br>
<p class="submit">
<input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
</p>
</form>
<br>
<table>
<tr><td></td><td>Put your images in <?php echo($get);?></td></tr>
</table>
<hr>
<p><h3><a href=http://timebasedgreeting.wordpress.com/ target=_blank>Connect with me on my BLOG</a></h3>. Would love to hear your feedback as well as ideas for more plugins.<br><br><b><a href=http://timebasedgreeting.wordpress.com/ target=_blank>Get ideas for customizations</a></b>-See how people are using This plugin..</p>
<p>Hope you liked the plugin,For any customization request, Kindly contact me on <b>yashbinani@gmail.com</b></p>
</div>
<?php
}
//To control the front end
function TimeWidgetOne()
	{
$retset=get_option('timesetting');
			//For weekdays fetching time setting from array $retset
			$gtime=$retset[gtimewd];
			$atime=$retset[atimewd];	
			$etime=$retset[etimewd];
			$ltime=$retset[ntimewd];
		//fetch Message,Image,url details.
	$fetch_wd=get_option('morning_wd');
			$gmessage=$fetch_wd[gmsgwd];
			$gimage=$fetch_wd[gimgwd];
			$urlone=$fetch_wd[glinkwd];

	$fetch_wd=get_option('afternoon_wd');

			$amessage=$fetch_wd[amsgwd];
			$aimage=$fetch_wd[aimgwd];
			$urltwo=$fetch_wd[alinkwd];

	$fetch_wd=get_option('evening_wd');

			$emessage=$fetch_wd[emsgwd];
			$eimage=$fetch_wd[eimgwd];
			$urlthree=$fetch_wd[elinkwd];

	$fetch_wd=get_option('night_wd');

			$admessage=$fetch_wd[nmsgwd];
			$limage=$fetch_wd[nimgwd];
			$urlfour=$fetch_wd[nlinkwd];
//check if user has not entered any url

		if($urlone=="")
			{
				$urlone=5;
			}
		if($urltwo=="")
			{
				$urltwo=5;
			}
		if($urlthree=="")
			{
				$urlthree=5;
			}
		if($urlfour=="")
			{
				$urlfour=5;
			}

//------------------------------------------------------------------
				//start of front end logic
					//Heading Tags can be changed from here.This is used for styling message.
					
					$start="<h2>";
					$end="</h2>";

			echo'
				<script type=text/javascript>	
				var now=new Date();
				d=now.getHours();
//FOR WEEKDAYS
			
				if (d>='.$gtime.' && d<'.($atime).')
				{

					if("5"=="'.$urlone.'")
						{
						  document.write("'.$start.$gmessage.$end.'<br>")
						  document.write("<img src='.$gimage.' width=160 height=160 /> ")
						}
					else
						{
					  document.write("'.$start.$gmessage.$end.'<br>")
					  document.write("<a href='.$urlone.'><img src='.$gimage.' width=160 height=160 /></a>")
						}
				}


			if (d>='.$atime.' && d<'.($etime).')
			{
				if("'.$urltwo.'"=="5")
						{
							document.write("'.$start.$amessage.$end.'<br>")
							document.write("<img src='.$aimage.  '  width=160 height=160 /> ")
						}
				else
						{
				 	  		document.write("'.$start.$amessage.$end.'<br>")
				 	 		document.write("<a href='.$urltwo.'><img src='.$aimage.' width=160 height=160 /></a>")
						}
			
			}
	
	
			if('.$ltime.'>'.$etime.')
				{

					if (d>='.$etime.' && d < '.$ltime.')
	    				{
	 					if("'.$urlthree.'"=="5")
						{
						      document.write("'.$start.$emessage.$end.'<br>")
							document.write("<img src='.$eimage.  '  width=160 height=160 /> ")
						}
					else
						{
				     		document.write("'.$start.$emessage.$end.'<br>")
				 		document.write("<a href='.$urlthree.'><img src='.$eimage.' width=160 height=160 /></a>")
						}
					}
				
				}
					 
					if('.$ltime.'<'.$etime.')
				{
						if (d>='.$ltime.' && d>'.$etime.')
				
					{	
						if("'.$urlthree.'"=="5")
						{
							document.write("'.$start.$emessage.$end.'<br>")
							document.write("<img src='.$eimage.' width=160 height=160/>")
						}
							
						else
						{
							document.write("'.$start.$emessage.$end.'<br>")
				      		document.write("<a href='.$urlthree.'><img src='.$eimage.' width=160 height=160 /></a>")
						}
							
					}
		
				}


					if('.$ltime.'>'.$gtime.')
			     	{
						if(d>='.$ltime.')
				
						  {
							if("'.$urlfour.'"=="5")
								{
					 				document.write("'.$start.$admessage.$end.'<br>")
				       				document.write("<img src='.$limage.  '  width=160 height=160 /> ")
								}
							else
								{		
					 				document.write("'.$start.$admessage.$end.'<br>")
				 	 				document.write("<a href='.$urlfour.'><img src='.$limage.' width=160 height=160 /></a>")
								}
			  			  }
			
						else if(d>=0 && d<'.$gtime.')
			
						{
							if("'.$urlfour.'"=="5")
								{
									document.write("'.$start.$admessage.$end.'<br>")
									document.write("<img src='.$limage.' width=160 height=160 /> ")
								}
							else
								{
				       				document.write("'.$start.$admessage.$end.'<br>")
				       				document.write("<a href='.$urlfour.'><img src='.$limage.' width=160 height=160 /></a>")
								}
						}
			     }
		
		if('.$ltime.'<'.$gtime.')
		
			{
			
				if(d>='.$ltime.' && d<'.$gtime.')
			
				{	
					if("'.$urlfour.'"=="5")
						{
							document.write("'.$start.$admessage.$end.'<br>")
							document.write("<img src='.$limage.' width=160 height=160 /> ")
						}
					else
						{
				 	   		document.write("'.$start.$admessage.$end.'<br>")
				 	   		document.write("<a href='.$urlfour.'><img src='.$limage.' width=160 height=160 /></a>")}
				}
			}
</script>';
}
//end function timewidget()
function widget_myTimeOne(){
?>
<h2 class="widgettitle"></h2>
<?php TimeWidgetOne();?>
<?php
}
function widget_TimecontrolOne()
{
$geturl=get_bloginfo('wpurl');
echo '<a href='.$geturl.'/wp-admin/options-general.php?page=Time1>Go to Settings Page</a>';
?>
<?php
}
function myTime_init_One()
{   register_sidebar_widget(__('Time Widget Free'), 'widget_myTimeOne');
    register_widget_control('Time Widget Free','widget_TimecontrolOne',300,200);
}
add_action("plugins_loaded", "myTime_init_One");
?>
