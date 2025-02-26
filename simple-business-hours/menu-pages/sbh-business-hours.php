<?php 
if($TimeFormat == '') $BHTimeFormat = "g:i A";
if($TimeFormat == 'h:i') $BHTimeFormat = "g:i A";
if($TimeFormat == 'H:i') $BHTimeFormat = "G:i";
global $wpdb;
$BusinessHoursTable = $wpdb->prefix . "sbh_business_hours";
	
//saving business hours
if(isset($_POST['saveservice']))
{
	$_SESSION['ActiveTab'] = "sbh-hrs";
	global $wpdb;
	$BusinessHoursTable = $wpdb->prefix."sbh_business_hours";

	//monday
	if(isset($_POST['mcheck']) == 'mclose')
	{
		$mst = 'none';
		$met = 'none';
		$mclose = 'yes';
	}
	else
	{
		$mst = $_POST['mst'];
		$met = $_POST['met'];
		$mclose = 'no';
	}
	
	//tuesday
	if(isset($_POST['tucheck']) == 'tuclose')
	{
		$tst = 'none';
		$tet = 'none';
		$tclose = 'yes';
	}
	else
	{
		$tst = $_POST['tst'];
		$tet = $_POST['tet'];
		$tclose = 'no';
	}
	
	//Wednesday
	if(isset($_POST['wcheck']) == 'wclose')
	{
		$wst = 'none';
		$wet = 'none';
		$wclose = 'yes';
	}
	else
	{
		$wst = $_POST['wst'];
		$wet = $_POST['wet'];
		$wclose = 'no';
	}
	
	//Thusday
	if(isset($_POST['thcheck']) == 'thclose')
	{
		$thst = 'none';
		$thet = 'none';
		$thclose = 'yes';
	}
	else
	{
		$thst = $_POST['thst'];
		$thet = $_POST['thet'];
		$thclose = 'no';
	}
	
	//Friday
	if(isset($_POST['fcheck']) == 'fclose')
	{
		$fst = 'none';
		$fet = 'none';
		$fclose = 'yes';
	}
	else
	{
		$fst = $_POST['fst'];
		$fet = $_POST['fet'];
		$fclose = 'no';
	}
	
	
	//Saturday
	if(isset($_POST['satcheck']) == 'satclose')
	{
		$satst = 'none';
		$satet = 'none';
		$satclose = 'yes';
	}
	else
	{
		$satst = $_POST['satst'];
		$satet = $_POST['satet'];
		$satclose = 'no';
	}
	

	//Sunday
	if(isset($_POST['suncheck']) == 'sunclose')
	{
		$sunst = 'none';
		$sunet = 'none';
		$sunclose = 'yes';
	}
	else
	{
		$sunst = $_POST['sunst'];
		$sunet = $_POST['sunet'];
		$sunclose = 'no';
	}
	
	$monday    =  serialize(array( 'start_time' => $mst,   'end_time' => $met, 'close' => $mclose));
	$tuesday   =  serialize(array( 'start_time' => $tst,   'end_time' => $tet, 'close' => $tclose));
	$wednesday =  serialize(array( 'start_time' => $wst,   'end_time' => $wet, 'close' => $wclose));
	$thursday  =  serialize(array( 'start_time' => $thst,  'end_time' => $thet, 'close' => $thclose));
	$friday    =  serialize(array( 'start_time' => $fst,   'end_time' => $fet, 'close' => $fclose));
	$saturday  =  serialize(array( 'start_time' => $satst, 'end_time' => $satet, 'close' => $satclose));
	$sunday    =  serialize(array( 'start_time' => $sunst, 'end_time' => $sunet, 'close' => $sunclose));
	
	//insert default business hours in simple_business_hours table
	$BusinessHoursTableUpdate_sql = "UPDATE `$BusinessHoursTable` SET `monday` = '$monday',
`tuesday` = '$tuesday',
`wednesday` = '$wednesday',
`thursday` = '$thursday',
`friday` = '$friday',
`saturday` = '$saturday',
`sunday` = '$sunday' WHERE `id` = '1'";
	if($wpdb->query($BusinessHoursTableUpdate_sql))
	{
		echo "<script>alert('" . __('Business Hours successfully updated.' ,'SimpleBusinessHours') . "');</script>";
		echo "<script>location.href='?page=spl-biz-hrs-dashboard';</script>";
	}
	else
	{
		echo "<script>alert('" . __('Business Hours successfully updated.' ,'SimpleBusinessHours') . "');</script>";
		echo "<script>location.href='?page=spl-biz-hrs-dashboard';</script>";
	}
} // end of isset

?>

<form action="" method="post" name="save-business-settings">
	<?php
			$FetchBusinessHours_sql = "SELECT * FROM `$BusinessHoursTable` WHERE `id` = '1' AND `loc_id` = '1'";
			$GetBusinessHours = $wpdb->get_row($FetchBusinessHours_sql, OBJECT);
			if($GetBusinessHours)
			{
				$monday    = unserialize($GetBusinessHours->monday);
				$tuesday   = unserialize($GetBusinessHours->tuesday);
				$wednesday = unserialize($GetBusinessHours->wednesday);
				$thursday  = unserialize($GetBusinessHours->thursday);
				$friday    = unserialize($GetBusinessHours->friday);
				$saturday  = unserialize($GetBusinessHours->saturday);
				$sunday    = unserialize($GetBusinessHours->sunday);
				
				if($monday['close'] == 'yes')    { $monday['start_time'] = 'none'; $monday['end_time'] = 'none';  }
				if($tuesday['close'] == 'yes')   { $tuesday['start_time'] = 'none'; $tuesday['end_time'] = 'none';  }
				if($wednesday['close'] == 'yes') { $wednesday['start_time'] = 'none'; $wednesday['end_time'] = 'none';  }
				if($thursday['close'] == 'yes')  { $thursday['start_time'] = 'none'; $thursday['end_time'] = 'none';  }
				if($friday['close'] == 'yes')    { $friday['start_time'] = 'none'; $friday['end_time'] = 'none';  }
				if($saturday['close'] == 'yes')  { $saturday['start_time'] = 'none'; $saturday['end_time'] = 'none';  }
				if($sunday['close'] == 'yes')    { $sunday['start_time'] = 'none'; $sunday['end_time'] = 'none';  }

				$DayStartTimes = array( 
					'1' => $monday['start_time'],
				 	'2' => $tuesday['start_time'],
					'3' => $wednesday['start_time'],
					'4' => $thursday['start_time'],
					'5' => $friday['start_time'],
					'6' => $saturday['start_time'],
					'7' => $sunday['start_time'] );
					
				$DayEndTimes  = array( 
					'1' => $monday['end_time'],
				 	'2' => $tuesday['end_time'],
					'3' => $wednesday['end_time'],
					'4' => $thursday['end_time'],
					'5' => $friday['end_time'],
					'6' => $saturday['end_time'],
					'7' => $sunday['end_time'] );
				
				$DayClose = array( 
					'1' => $monday['close'],
				 	'2' => $tuesday['close'],
					'3' => $wednesday['close'],
					'4' => $thursday['close'],
					'5' => $friday['close'],
					'6' => $saturday['close'],
					'7' => $sunday['close'] );
				
				for($i = 1; $i <= 7; $i++)
				{
					$setst[$i] = $DayStartTimes[$i];
					$setet[$i] = $DayEndTimes[$i];
					$setclose[$i] = $DayClose[$i];
				}
			}
			else
			{
				for($i = 1; $i <= 7; $i++)
				{
					$setst[$i] = '';
					$setet[$i] = '';
					$setclose[$i] = '';
				}
			}
			/*print_r($DayStartTimes); echo "<br><br>";
			print_r($DayEndTimes); echo "<br><br>";
			print_r($DayClose); echo "<br><br><br><br>";
			
			print_r($setst); echo "<br><br>";
			print_r($setet); echo "<br><br>";
			print_r($setclose); echo "<br><br>";*/
			
	?>
	<table width="100%" class="items table table-bordered table-hover">
	  <tr>
		<td align="center" scope="col"><div align="center"><strong>
		  <?php _e('Days' ,'SimpleBusinessHours'); ?>
		</strong></div></td>
		<td align="center" scope="col"><strong>
	    <?php _e('Start Time' ,'SimpleBusinessHours'); ?>
		</strong></td>
		<td align="center" scope="col"><strong>
	    <?php _e('End Time' ,'SimpleBusinessHours'); ?>
		</strong></td>
		<td align="center" scope="col"><strong>
	    <?php _e('Close' ,'SimpleBusinessHours'); ?>
		</strong></td>
	  </tr>
	  <tr>
		<td align="left"><div align="center">
		  <?php _e('MONDAY' ,'SimpleBusinessHours'); ?>
	    </div></td>
		<td align="center">
			<?php
				if($setclose[1] == 'yes') $mdisable="disabled";  else $mdisable ="";
				$time = time();
				$rounded_time = $time % 900 > 450 ? $time += (900 - $time % 900):  $time -= $time % 900;
				echo '<select id=mst name=mst '.$mdisable.'>';
				$start = strtotime('12:00am');
				$end = strtotime('11:59pm');
				for( $i = $start; $i <= $end; $i += 1800) 
				{
					if($setst[1])  $default = $setst[1];  else $default = '10:00 AM';
					if($setst[1] == 'none')  $default = '10:00 AM'; 
					if(date('g:i A', $i) == $default)	//made 10:00 AM selected
					{
						echo "<option value='" .date('g:i A', $i). "' selected='selected'>" . date($BHTimeFormat, $i) . "</option>";
					}
					else
					{
						//$selected = ( $rounded_time == $i) ? ' selected="selected"' : '';
						echo "<option value='" .date('g:i A', $i). "'>" . date($BHTimeFormat, $i) . "</option>";
					}
				}
				echo '</select>';
			?>		</td>
		<td align="center">
			<?php
				$time = time();
				$rounded_time = $time % 900 > 450 ? $time += (900 - $time % 900):  $time -= $time % 900;
				echo '<select id=met name=met '.$mdisable.'>';
				$start = strtotime('12:00am');
				$end = strtotime('11:59pm');
				for( $i = $start; $i <= $end; $i += 1800)
				{
					if($setet[1])  $default = $setet[1];  else $default = "5:00 PM";
					if($setst[1] == 'none')  $default = '5:00 PM';
					if(date('g:i A', $i) == $default )	//made 5:00 PM selected
					{
						echo "<option value='" .date('g:i A', $i). "' selected='selected'>" . date($BHTimeFormat, $i) . "</option>";
					}
					else
					{
						//$selected = ( $rounded_time == $i) ? ' selected="selected"' : '';
						echo "<option value='" .date('g:i A', $i). "'>" . date($BHTimeFormat, $i) . "</option>";
					}
				}
				echo '</select>';
			?>		</td>
		<td align="center">
		  <input name="mcheck" type="checkbox" id="mcheck" value="mclose" <?php if($setclose[1] == 'yes'){ echo "checked=checked"; } ?> />		</td>
	  </tr>

	  
	  
	  <tr>
		<td align="left"><div align="center">
		  <?php _e('TUESDAY' ,'SimpleBusinessHours'); ?>
	    </div></td>
		<td align="center"><?php
				if($setclose[2] == 'yes') $tdisable="disabled";  else $tdisable ="";
				$time = time();
				$rounded_time = $time % 900 > 450 ? $time += (900 - $time % 900):  $time -= $time % 900;
				echo '<select id=tst name=tst '.$tdisable.'>';
				$start = strtotime('12:00am');
				$end = strtotime('11:59pm');
				for( $i = $start; $i <= $end; $i += 1800)
				{
					if($setst[2])  $default = $setst[2];  else $default = '10:00 AM';
					if($setst[2] == 'none')  $default = '10:00 AM';
					if(date('g:i A', $i) == $default)	//made 10:00 AM selected
					{
						echo "<option value='" .date('g:i A', $i). "' selected='selected'>" . date($BHTimeFormat, $i) . "</option>";
					}
					else
					{
						//$selected = ( $rounded_time == $i) ? ' selected="selected"' : '';
						echo "<option value='" .date('g:i A', $i). "'>" . date($BHTimeFormat, $i) . "</option>";
					}
				}
				echo '</select>';
			?>        </td>
		<td align="center"><?php 
				$time = time();
				$rounded_time = $time % 900 > 450 ? $time += (900 - $time % 900):  $time -= $time % 900;
				echo '<select id=tet name=tet '.$tdisable.'>';
				$start = strtotime('12:00am');
				$end = strtotime('11:59pm');
				for( $i = $start; $i <= $end; $i += 1800) 
				{
					if($setet[2])  $default = $setet[2];  else $default = "5:00 PM";
					if($setst[2] == 'none')  $default = '5:00 PM';
					if(date('g:i A', $i) == $default )	//made 5:00 AM selected
					{
						echo "<option value='" .date('g:i A', $i). "' selected='selected'>" . date($BHTimeFormat, $i) . "</option>";
					}
					else
					{
						//$selected = ( $rounded_time == $i) ? ' selected="selected"' : '';
						echo "<option value='" .date('g:i A', $i). "'>" . date($BHTimeFormat, $i) . "</option>";
					}
				}
				echo '</select>';
			?>        </td>
		<td align="center">
		  <input name="tucheck" type="checkbox" id="tucheck" value="tuclose" <?php if($setclose[2] == 'yes'){ echo "checked=checked"; } ?> />		</td>
	  </tr>
	  
	  <tr>
		<td align="left"><div align="center">
		  <?php _e('WEDNESDAY' ,'SimpleBusinessHours'); ?>
	    </div></td>
		<td align="center"><?php
				if($setclose[3] == 'yes') $wdisable="disabled";  else $wdisable ="";
				$time = time();
				$rounded_time = $time % 900 > 450 ? $time += (900 - $time % 900):  $time -= $time % 900;
				echo '<select id=wst name=wst '.$wdisable.'>';
				$start = strtotime('12:00am');
				$end = strtotime('11:59pm');
				for( $i = $start; $i <= $end; $i += 1800)
				{
					if($setst[3])  $default = $setst[3];  else $default = '10:00 AM';
					if($setst[3] == 'none')  $default = '10:00 AM';
					if(date('g:i A', $i) == $default)	//made 10:00 AM selected
					{
						echo "<option value='" .date('g:i A', $i). "' selected='selected'>" . date($BHTimeFormat, $i) . "</option>";
					}
					else
					{
						//$selected = ( $rounded_time == $i) ? ' selected="selected"' : '';
						echo "<option value='" .date('g:i A', $i). "'>" . date($BHTimeFormat, $i) . "</option>";
					}
				}
				echo '</select>';
			?>        </td>
		<td align="center"><?php 
				$time = time();
				$rounded_time = $time % 900 > 450 ? $time += (900 - $time % 900):  $time -= $time % 900;
				echo '<select id=wet name=wet '.$wdisable.'>';
				$start = strtotime('12:00am');
				$end = strtotime('11:59pm');
				for( $i = $start; $i <= $end; $i += 1800) 
				{
					if($setet[3])  $default = $setet[3];  else $default = "5:00 PM";
					if($setst[3] == 'none')  $default = '5:00 PM';
					if(date('g:i A', $i) == $default )	//made 5:00 AM selected
					{
						echo "<option value='" .date('g:i A', $i). "' selected='selected'>" . date($BHTimeFormat, $i) . "</option>";
					}
					else
					{
						//$selected = ( $rounded_time == $i) ? ' selected="selected"' : '';
						echo "<option value='" .date('g:i A', $i). "'>" . date($BHTimeFormat, $i) . "</option>";
					}
				}
				echo '</select>';
			?>        </td>
		<td align="center"><input name="wcheck" type="checkbox" id="wcheck" value="wclose" <?php if($setclose[3] == 'yes'){ echo "checked=checked"; } ?> /></td>
	  </tr>
	  
	  <tr>
		<td align="left"><div align="center">
		  <?php _e('THURSDAY' ,'SimpleBusinessHours'); ?>
	    </div></td>
		<td align="center"><?php 
				if($setclose[4] == 'yes') $thdisable="disabled";  else $thdisable ="";
				$time = time();
				$rounded_time = $time % 900 > 450 ? $time += (900 - $time % 900):  $time -= $time % 900;
				echo '<select id=thst name=thst '.$thdisable.'>';
				$start = strtotime('12:00am');
				$end = strtotime('11:59pm');
				for( $i = $start; $i <= $end; $i += 1800) 
				{
					if($setst[4])  $default = $setst[4];  else $default = '10:00 AM';
					if($setst[4] == 'none')  $default = '10:00 AM';
					if(date('g:i A', $i) == $default)	//made 10:00 AM selected
					{
						echo "<option value='" .date('g:i A', $i). "' selected='selected'>" . date($BHTimeFormat, $i) . "</option>";
					}
					else
					{
						//$selected = ( $rounded_time == $i) ? ' selected="selected"' : '';
						echo "<option value='" .date('g:i A', $i). "'>" . date($BHTimeFormat, $i) . "</option>";
					}
				}
				echo '</select>';
			?>        </td>
		<td align="center"><?php 
				$time = time();
				$rounded_time = $time % 900 > 450 ? $time += (900 - $time % 900):  $time -= $time % 900;
				echo '<select id=thet name=thet '.$thdisable.'>';
				$start = strtotime('12:00am');
				$end = strtotime('11:59pm');
				for( $i = $start; $i <= $end; $i += 1800)
				{
					if($setet[4])  $default = $setet[4];  else $default = "5:00 PM";
					if($setst[4] == 'none')  $default = '5:00 PM';
					if(date('g:i A', $i) == $default )	//made 5:00 AM selected
					{
						echo "<option value='" .date('g:i A', $i). "' selected='selected'>" . date($BHTimeFormat, $i) . "</option>";
					}
					else
					{
						//$selected = ( $rounded_time == $i) ? ' selected="selected"' : '';
						echo "<option value='" .date('g:i A', $i). "'>" . date($BHTimeFormat, $i) . "</option>";
					}
				}
				echo '</select>';
			?>        </td>
		<td align="center"><input name="thcheck" type="checkbox" id="thcheck" value="thclose" <?php if($setclose[4] == 'yes'){ echo "checked=checked"; } ?> /></td>
	  </tr>
	  
	  <tr>
		<td align="left"><div align="center">
		  <?php _e('FRIDAY' ,'SimpleBusinessHours'); ?>
	    </div></td>
		<td align="center"><?php 
				if($setclose[5] == 'yes') $fdisable="disabled";  else $fdisable ="";
				$time = time();
				$rounded_time = $time % 900 > 450 ? $time += (900 - $time % 900):  $time -= $time % 900;
				echo '<select id=fst name=fst '.$fdisable.'>';
				$start = strtotime('12:00am');
				$end = strtotime('11:59pm');
				for( $i = $start; $i <= $end; $i += 1800) 
				{
					if($setst[5])  $default = $setst[5];  else $default = '10:00 AM';
					if($setst[5] == 'none')  $default = '10:00 AM';
					if(date('g:i A', $i) == $default)	//made 10:00 AM selected
					{
						echo "<option value='" .date('g:i A', $i). "' selected='selected'>" . date($BHTimeFormat, $i) . "</option>";
					}
					else
					{
						//$selected = ( $rounded_time == $i) ? ' selected="selected"' : '';
						echo "<option value='" .date('g:i A', $i). "'>" . date($BHTimeFormat, $i) . "</option>";
					}
				}
				echo '</select>';
			?>        </td>
		<td align="center"><?php 
				$time = time();
				$rounded_time = $time % 900 > 450 ? $time += (900 - $time % 900):  $time -= $time % 900;
				echo '<select id=fet name=fet '.$fdisable.'>';
				$start = strtotime('12:00am');
				$end = strtotime('11:59pm');
				for( $i = $start; $i <= $end; $i += 1800) 
				{
					if($setet[5])  $default = $setet[5];  else $default = "5:00 PM";
					if($setst[5] == 'none')  $default = '5:00 PM';
					if(date('g:i A', $i) == $default )	//made 5:00 AM selected
					{
						echo "<option value='" .date('g:i A', $i). "' selected='selected'>" . date($BHTimeFormat, $i) . "</option>";
					}
					else
					{
						echo "<option value='" .date('g:i A', $i). "'>" . date($BHTimeFormat, $i) . "</option>";
					}
				}
				echo '</select>';
			?>        </td>
		<td align="center"><input name="fcheck" type="checkbox" id="fcheck" value="fclose" <?php if($setclose[5] == 'yes'){ echo "checked=checked"; } ?>  /></td>
	  </tr>
	  
	  <tr>
		<td align="left"><div align="center">
		  <?php _e('SATURDAY' ,'SimpleBusinessHours'); ?>
	    </div></td>
		<td align="center"><?php
				if($setclose[6] == 'yes') $satdisable="disabled";  else $satdisable ="";
				$time = time();
				$rounded_time = $time % 900 > 450 ? $time += (900 - $time % 900):  $time -= $time % 900;
				echo '<select id=satst name=satst '.$satdisable.'>';
				$start = strtotime('12:00am');
				$end = strtotime('11:59pm');
				for( $i = $start; $i <= $end; $i += 1800)
				{
					if($setst[6])  $default = $setst[6];  else $default = '10:00 AM';
					if($setst[6] == 'none')  $default = '10:00 AM';
					if(date('g:i A', $i) == $default)	//made 10:00 AM selected
					{
						echo "<option value='" .date('g:i A', $i). "' selected='selected'>" . date($BHTimeFormat, $i) . "</option>";
					}
					else
					{
						echo "<option value='" .date('g:i A', $i). "'>" . date($BHTimeFormat, $i) . "</option>";
					}
				}
				echo '</select>';
			?>        </td>
		<td align="center"><?php 
				$time = time();
				$rounded_time = $time % 900 > 450 ? $time += (900 - $time % 900):  $time -= $time % 900;
				echo '<select id=satet name=satet '.$satdisable.'>';
				$start = strtotime('12:00am');
				$end = strtotime('11:59pm');
				for( $i = $start; $i <= $end; $i += 1800) 
				{
					if($setet[6])  $default = $setet[6];  else $default = "5:00 PM";
					if($setst[6] == 'none')  $default = '5:00 PM';
					if(date('g:i A', $i) == $default )	//made 5:00 AM selected
					{
						echo "<option value='" .date('g:i A', $i). "' selected='selected'>" . date($BHTimeFormat, $i) . "</option>";
					}
					else
					{
						echo "<option value='" .date('g:i A', $i). "'>" . date($BHTimeFormat, $i) . "</option>";
					}
				}
				echo '</select>';
			?>        </td>
		<td align="center"><input name="satcheck" type="checkbox" id="satcheck" value="satclose" <?php if($setclose[6] == 'yes'){ echo "checked=checked"; } ?> /></td>
	  </tr>
	  
	  <tr>
		<td align="left"><div align="center">
		  <?php _e('SUNDAY' ,'SimpleBusinessHours'); ?>
	    </div></td>
		<td align="center"><?php 
				if($setclose[7] == 'yes') $sundisable="disabled"; else $sundisable ="";
				$time = time();
				$rounded_time = $time % 900 > 450 ? $time += (900 - $time % 900):  $time -= $time % 900;
				echo '<select id=sunst name=sunst '.$sundisable.'>';
				$start = strtotime('12:00am');
				$end = strtotime('11:59pm');
				for( $i = $start; $i <= $end; $i += 1800) 
				{
					if($setst[7])  $default = $setst[7];  else $default = '10:00 AM';
					if($setst[7] == 'none')  $default = '10:00 AM';
					if(date('g:i A', $i) == $default)	//made 10:00 AM selected
					{
						echo "<option value='" .date('g:i A', $i). "' selected='selected'>" . date($BHTimeFormat, $i) . "</option>";
					}
					else
					{
						echo "<option value='" .date('g:i A', $i). "'>" . date($BHTimeFormat, $i) . "</option>";
					}
				}
				echo '</select>';
			?>        </td>

		<td align="center"><?php 
				$time = time();
				$rounded_time = $time % 900 > 450 ? $time += (900 - $time % 900):  $time -= $time % 900;
				echo '<select id=sunet name=sunet '.$sundisable.'>';
				$start = strtotime('12:00am');
				$end = strtotime('11:59pm');
				for( $i = $start; $i <= $end; $i += 1800) 
				{
					if($setet[7])  $default = $setet[7];  else $default = "5:00 PM";
					if($setst[7] == 'none')  $default = '5:00 PM';
					if(date('g:i A', $i) == $default )	//made 5:00 AM selected
					{
						echo "<option value='" .date('g:i A', $i). "' selected='selected'>" . date($BHTimeFormat, $i) . "</option>";
					}
					else
					{
						echo "<option value='" .date('g:i A', $i). "'>" . date($BHTimeFormat, $i) . "</option>";
					}
				}
				echo '</select>';
			?>        </td>
		<td align="center"><input name="suncheck" type="checkbox" id="suncheck" value="sunclose" <?php if($setclose[7] == 'yes'){ echo "checked=checked"; } ?> /></td>
	  </tr>
 </table>
<button name="saveservice" class="btn btn-primary" type="submit" id="save"><?php _e('Save Business Hours' ,'SimpleBusinessHours'); ?></button>
</form>

<script type="text/javascript">
jQuery(document).ready(function() {

	var mflag = 1, tflag = 1, wflag = 1, thflag = 1, fflag = 1, satflag = 1, sunflag = 1;
	
	<!--Monday-->
	//monday start-time
	jQuery('#mst').change(function(){
		var mst = jQuery('#mst').val();
		var met = jQuery('#met').val();
		
		console.log(Date.parse("1-1-2000 " + mst) + " " + Date.parse("1-1-2000 " + met));
		//equal check
		if(mst == met) {
			alert("<?php echo __("Monday's Start-time and End-time can't be equal" ,'SimpleBusinessHours'); ?>"); mflag = 0;
		}else  mflag = 1;
		mst = Date.parse("1-1-2000 " + mst);
		met = Date.parse("1-1-2000 " + met);
		if(mst > met) {
			alert("<?php echo __("Monday's Start-time must be smaller then End-time" ,'SimpleBusinessHours'); ?>"); mflag = 0;
		}else  mflag = 1;
	});
	//monday end-time
	jQuery('#met').change(function(){
		var mst = jQuery('#mst').val();
		var met = jQuery('#met').val();
		console.log(Date.parse("1-1-2000 " + mst) + " " + Date.parse("1-1-2000 " + met));
		//equal check
		if(mst == met) {
			alert("<?php echo __("Monday's Start-time and End-time can't be equal" ,'SimpleBusinessHours'); ?>"); mflag = 0;
		}else  mflag = 1;
		mst = Date.parse("1-1-2000 " + mst);
		met = Date.parse("1-1-2000 " + met);
		if(met !=null)
		{
			if(mst > met) {
				alert("<?php echo __("Monday's End-time must be bigger then Start-time" ,'SimpleBusinessHours'); ?>"); mflag = 0;
			}else  mflag = 1;
		}
	});
	
	
	<!--Tuesday-->
	//Tuesday start-time
	jQuery('#tst').change(function(){
		var st = jQuery('#tst').val();
		var et = jQuery('#tet').val();
		console.log(Date.parse("1-1-2000 " + st) + " " + Date.parse("1-1-2000 " + et));
		//equal check
		if(st == et) {
			alert("<?php echo __("Tuesday's Start-time and End-time can't be equal" ,'SimpleBusinessHours'); ?>"); tflag = 0;
		}else  tflag = 1;
		st = Date.parse("1-1-2000 " + st);
		et = Date.parse("1-1-2000 " + et);
		if(st > et) {
			alert("<?php echo __("Tuesday's Start-time must be smaller then End-time" ,'SimpleBusinessHours'); ?>"); tflag = 0;
		}else  tflag = 1;
	});
	//Tuesday end-time
	jQuery('#tet').change(function(){
		var st = jQuery('#tst').val();
		var et = jQuery('#tet').val();
		console.log(Date.parse("1-1-2000 " + st) + " " + Date.parse("1-1-2000 " + et));
		//equal check
		if(st == et) {
			alert("<?php echo __("Tuesday's Start-time and End-time can't be equal" ,'SimpleBusinessHours'); ?>");  tflag = 0;
		}else  tflag = 1;
		st = Date.parse("1-1-2000 " + st);
		et = Date.parse("1-1-2000 " + et);
		if(et !=null)
		{
			if(st > et) {
				alert("<?php echo __("Tuesday's End-time must be bigger then Start-time" ,'SimpleBusinessHours'); ?>");  tflag = 0;
			}else  tflag = 1;
		}
	});
	
	
	<!--Wednesday-->
	//Wednesday start-time
	jQuery('#wst').change(function(){
		var st = jQuery('#wst').val();
		var et = jQuery('#wet').val();
		console.log(Date.parse("1-1-2000 " + st) + " " + Date.parse("1-1-2000 " + et));
		//equal check
		if(st == et) {
			alert("<?php echo __("Wednesday's Start-time and End-time can't be equal" ,'SimpleBusinessHours'); ?>");  wflag = 0;
		}else  wflag = 1;
		st = Date.parse("1-1-2000 " + st);
		et = Date.parse("1-1-2000 " + et);
		if(st > et) {
			alert("<?php echo __("Wednesday's Start-time must be smaller then End-time" ,'SimpleBusinessHours'); ?>");  wflag = 0;
		}else  wflag = 1;
	});
	//Wednesday end-time
	jQuery('#wet').change(function(){
		var st = jQuery('#wst').val();
		var et = jQuery('#wet').val();
		console.log(Date.parse("1-1-2000 " + st) + " " + Date.parse("1-1-2000 " + et));
		//equal check
		if(st == et) {
			alert("<?php echo __("Wednesday's Start-time and End-time can't be equal" ,'SimpleBusinessHours'); ?>");  wflag = 0;
		}else  wflag = 1;
		st = Date.parse("1-1-2000 " + st);
		et = Date.parse("1-1-2000 " + et);
		if(et !=null)
		{
			if(st > et) {
				alert("<?php echo __("Wednesday's End-time must be bigger then Start-time" ,'SimpleBusinessHours'); ?>");  wflag = 0;
			}else  wflag = 1;
		}
	});
	
	
	<!--Thursday-->
	//Thursday start-time
	jQuery('#thst').change(function(){
		var st = jQuery('#thst').val();
		var et = jQuery('#thet').val();
		console.log(Date.parse("1-1-2000 " + st) + " " + Date.parse("1-1-2000 " + et));
		//equal check
		if(st == et) {
			alert("<?php echo __("Thursday's Start-time and End-time can't be equal" ,'SimpleBusinessHours'); ?>");  thflag = 0;
		}else  thflag = 1;
		st = Date.parse("1-1-2000 " + st);
		et = Date.parse("1-1-2000 " + et);
		if(st > et) {
			alert("<?php echo __("Thursday's Start-time must be smaller then End-time" ,'SimpleBusinessHours'); ?>");  thflag = 0;
		}else  thflag = 1;
	});
	//Thursday end-time
	jQuery('#thet').change(function(){
		var st = jQuery('#thst').val();
		var et = jQuery('#thet').val();
		console.log(Date.parse("1-1-2000 " + st) + " " + Date.parse("1-1-2000 " + et));
		//equal check
		if(st == et) {
			alert("<?php echo __("Thursday's Start-time and End-time can't be equal" ,'SimpleBusinessHours'); ?>");  thflag = 0;
		}else  thflag = 1;
		st = Date.parse("1-1-2000 " + st);
		et = Date.parse("1-1-2000 " + et);
		if(et !=null)
		{
			if(st > et) {
				alert("<?php echo __("Thursday's End-time must be bigger then Start-time" ,'SimpleBusinessHours'); ?>");  thflag = 0;
			}else  thflag = 1;
		}
	});
	
	
	<!--Friday-->
	//Friday start-time
	jQuery('#fst').change(function(){
		var st = jQuery('#fst').val();
		var et = jQuery('#fet').val();
		console.log(Date.parse("1-1-2000 " + st) + " " + Date.parse("1-1-2000 " + et));
		//equal check
		if(st == et) {
			alert("<?php echo __("Friday's Start-time and End-time can't be equal" ,'SimpleBusinessHours'); ?>");  fflag = 0;
		}else  fflag = 1;
		st = Date.parse("1-1-2000 " + st);
		et = Date.parse("1-1-2000 " + et);
		if(st > et) {
			alert("<?php echo __("Friday's Start-time must be smaller then End-time" ,'SimpleBusinessHours'); ?>");  fflag = 0;
		}else  fflag = 1;
	});
	//Friday end-time
	jQuery('#fet').change(function(){
		var st = jQuery('#fst').val();
		var et = jQuery('#fet').val();
		console.log(Date.parse("1-1-2000 " + st) + " " + Date.parse("1-1-2000 " + et));
		//equal check
		if(st == et) {
			alert("<?php echo __("Friday's Start-time and End-time can't be equal" ,'SimpleBusinessHours'); ?>");  fflag = 0;
		}else  fflag = 1;
		st = Date.parse("1-1-2000 " + st);
		et = Date.parse("1-1-2000 " + et);
		if(et !=null)
		{
			if(st > et) {
				alert("<?php echo __("Friday's End-time must be bigger then Start-time" ,'SimpleBusinessHours'); ?>");  fflag = 0;
			}else  fflag = 1;
		}
	});
	
	
	<!--Saturday-->
	//Saturday start-time
	jQuery('#satst').change(function(){
		var st = jQuery('#satst').val();
		var et = jQuery('#satet').val();
		console.log(Date.parse("1-1-2000 " + st) + " " + Date.parse("1-1-2000 " + et));
		//equal check
		if(st == et) {
			alert("<?php echo __("Saturday's Start-time and End-time can't be equal" ,'SimpleBusinessHours'); ?>");  satflag = 0;
		}else  satflag = 1;
		st = Date.parse("1-1-2000 " + st);
		et = Date.parse("1-1-2000 " + et);
		if(st > et) {
			alert("<?php echo __("Saturday's Start-time must be smaller then End-time" ,'SimpleBusinessHours'); ?>");  satflag = 0;
		}else  satflag = 1;
	});
	//Saturday end-time
	jQuery('#satet').change(function(){
		var st = jQuery('#satst').val();
		var et = jQuery('#satet').val();
		console.log(Date.parse("1-1-2000 " + st) + " " + Date.parse("1-1-2000 " + et));
		//equal check
		if(st == et) {
			alert("<?php echo __("Saturday's Start-time and End-time can't be equal" ,'SimpleBusinessHours'); ?>");  satflag = 0;
		}else satflag = 1;
		st = Date.parse("1-1-2000 " + st);
		et = Date.parse("1-1-2000 " + et);
		if(et !=null)
		{
			if(st > et) {
				alert("<?php echo __("Saturday's End-time must be bigger then Start-time" ,'SimpleBusinessHours'); ?>");  satflag = 0;
			}else satflag = 1;
		}
	});
	
	
	<!--Sunday-->
	//Sunday start-time
	jQuery('#sunst').change(function(){
		var st = jQuery('#sunst').val();
		var et = jQuery('#sunet').val();
		console.log(Date.parse("1-1-2000 " + st) + " " + Date.parse("1-1-2000 " + et));
		//equal check
		if(st == et) {
			alert("<?php echo __("Sunday's Start-time and End-time can't be equal" ,'SimpleBusinessHours'); ?>");  sunflag = 0;
		}else sunflag = 1;
		st = Date.parse("1-1-2000 " + st);
		et = Date.parse("1-1-2000 " + et);
		if(st > et) {
			alert("<?php echo __("Sunday's Start-time must be smaller then End-time" ,'SimpleBusinessHours'); ?>");  sunflag = 0;
		}else sunflag = 1;
	});
	//Sunday end-time
	jQuery('#sunet').change(function(){
		var st = jQuery('#sunst').val();
		var et = jQuery('#sunet').val();
		console.log(Date.parse("1-1-2000 " + st) + " " + Date.parse("1-1-2000 " + et));
		//equal check
		if(st == et) {
			alert("<?php echo __("Sunday's Start-time and End-time can't be equal" ,'SimpleBusinessHours'); ?>");  sunflag = 0;
		}else sunflag = 1;
		st = Date.parse("1-1-2000 " + st);
		et = Date.parse("1-1-2000 " + et);
		if(et !=null)
		{
			if(st > et) {
				alert("<?php echo __("Sunday's End-time must be bigger then Start-time" ,'SimpleBusinessHours'); ?>");  sunflag = 0;
			}else sunflag = 1;
		}
	});
	
	jQuery("form").submit( function () {
	
	
		<!--Monday-->
	   if(jQuery('#mcheck').is(':checked')) var mcheck = "mclose"; else var mcheck = "";
	   if(!mcheck){
		   var mst = jQuery('#mst').val();
		   var met = jQuery('#met').val();
			console.log(Date.parse("1-1-2000 " + mst) + " " + Date.parse("1-1-2000 " + met));
			//equal check
			if(mst == met) {
				alert("<?php echo __("Monday's Start-time and End-time can't be equal" ,'SimpleBusinessHours'); ?>");	return false;
			}
		}
		
		//tuesday
	   if(jQuery('#tucheck').is(':checked')) var tucheck = "tuclose"; else var tucheck = "";
	   if(!tucheck){
		   var tst = jQuery('#tst').val();
		   var tet = jQuery('#tet').val();
		   //equal check
			if(tst == tet) {
				alert("<?php echo __("Tuesday's Start-time and End-time can't be equal" ,'SimpleBusinessHours'); ?>");	return false;
			}
		}
		
		//wednesday
	   if(jQuery('#wcheck').is(':checked')) var wcheck = "wclose"; else var wcheck = "";
	   if(!wcheck)
	   {
		   var wst = jQuery('#wst').val();
		   var wet = jQuery('#wet').val();
		   //equal check
			if(wst == wet) {
				alert("<?php echo __("Wednesday's Start-time and End-time can't be equal" ,'SimpleBusinessHours'); ?>");	return false;
			}
		}
		
		//thursday
	   if(jQuery('#thcheck').is(':checked')) var thcheck = "thclose"; else var thcheck = "";
	   if(!thcheck)
	   {
		   var thst = jQuery('#thst').val();
		   var thet = jQuery('#thet').val();
		   //equal check
			if(thst == thet) {
				alert("<?php echo __("Thursday's Start-time and End-time can't be equal" ,'SimpleBusinessHours'); ?>");	return false;
			}
		}
	   
	   //friday
	   if(jQuery('#fcheck').is(':checked')) var fcheck = "fclose"; else var fcheck = "";
	   if(!fcheck)
	   {
		   var fst = jQuery('#fst').val();
		   var fet = jQuery('#fet').val();
			//equal check
			if(fst == fet) {
				alert("<?php echo __("Friday's Start-time and End-time can't be equal" ,'SimpleBusinessHours'); ?>");	return false;
			}
		}
	   
	    //saturday
	   if(jQuery('#satcheck').is(':checked')) var satcheck = "satclose"; else var satcheck = "";
	   if(!satcheck)
	   {
		   var satst = jQuery('#satst').val();
		   var satet = jQuery('#satet').val();
		   //equal check
			if(satst == satet) {
				alert("<?php echo __("Saturday's Start-time and End-time can't be equal" ,'SimpleBusinessHours'); ?>");	return false;
			}
		}	   
	   
	  //sunday
	   if(jQuery('#suncheck').is(':checked')) var suncheck = "sunclose"; else var suncheck = "";
	   if(!suncheck)
	   {
		   var sunst = jQuery('#sunst').val();
		   var sunet = jQuery('#sunet').val();
		   //equal check
			if(sunst == sunet) {
				alert("<?php echo __("Sunday's Start-time and End-time can't be equal" ,'SimpleBusinessHours'); ?>");	return false;
			}
		}
	   
	
	   if(mflag != 1) { alert("<?php echo __("ERROR! Check Monday's Working Hours" ,'SimpleBusinessHours'); ?>"); return false; }
	   if(tflag != 1) { alert("<?php echo __("ERROR! Check Tuesday's Working Hours" ,'SimpleBusinessHours'); ?>"); return false; }
	   if(wflag != 1) { alert("<?php echo __("ERROR! Check Wednesday's Working Hours" ,'SimpleBusinessHours'); ?>"); return false; }
	   if(thflag != 1) { alert("<?php echo __("ERROR! Check Thursday's Working Hours" ,'SimpleBusinessHours'); ?>"); return false; }
	   if(fflag != 1) { alert("<?php echo __("ERROR! Check Friday's Working Hours" ,'SimpleBusinessHours'); ?>"); return false; }
	   if(satflag != 1) { alert("<?php echo __("ERROR! Check Saturday's Working Hours" ,'SimpleBusinessHours'); ?>"); return false; }
	   if(sunflag != 1) { alert("<?php echo __("ERROR! Check Sunday's Working Hours" ,'SimpleBusinessHours'); ?>"); return false; }
	   
	   //if(mflag  && tflag && wflag && thflag && fflag && satflag && sunflag) { alert("Success! Working Hours Saved"); return true; }
	});
	
	//disable monday times
	jQuery('#mcheck').change(function(){
	  if(jQuery(this).is(':checked')){
		jQuery('#mst').attr("disabled", true);
		jQuery('#met').attr("disabled", true);
	  } else {
		jQuery('#mst').attr("disabled", false);
		jQuery('#met').attr("disabled", false);
	  }
	});
	
	//disable tuesday times
	jQuery('#tucheck').change(function(){
	  if(jQuery(this).is(':checked')){
		jQuery('#tst').attr("disabled", true);
		jQuery('#tet').attr("disabled", true);
	  } else {
		jQuery('#tst').attr("disabled", false);
		jQuery('#tet').attr("disabled", false);
	  }
	});
	
	
	//disable wednesday times
	jQuery('#wcheck').change(function(){
	  if(jQuery(this).is(':checked')){
		jQuery('#wst').attr("disabled", true);
		jQuery('#wet').attr("disabled", true);
	  } else {
		jQuery('#wst').attr("disabled", false);
		jQuery('#wet').attr("disabled", false);
	  }
	});
	
	//disable thusday times
	jQuery('#thcheck').change(function(){
	  if(jQuery(this).is(':checked')){
		jQuery('#thst').attr("disabled", true);
		jQuery('#thet').attr("disabled", true);
	  } else {
		jQuery('#thst').attr("disabled", false);
		jQuery('#thet').attr("disabled", false);
	  }
	});
	
	//disable friday times
	jQuery('#fcheck').change(function(){
	  if(jQuery(this).is(':checked')){
		jQuery('#fst').attr("disabled", true);
		jQuery('#fet').attr("disabled", true);
	  } else {
		jQuery('#fst').attr("disabled", false);
		jQuery('#fet').attr("disabled", false);
	  }
	});
	
	//disable saturday times
	jQuery('#satcheck').change(function(){
	  if(jQuery(this).is(':checked')){
		jQuery('#satst').attr("disabled", true);
		jQuery('#satet').attr("disabled", true);
	  } else {
		jQuery('#satst').attr("disabled", false);
		jQuery('#satet').attr("disabled", false);
	  }
	});
	
	//disable sunday times
	jQuery('#suncheck').change(function(){
	  if(jQuery(this).is(':checked')){
		jQuery('#sunst').attr("disabled", true);
		jQuery('#sunet').attr("disabled", true);
	  } else {
		jQuery('#sunst').attr("disabled", false);
		jQuery('#sunet').attr("disabled", false);
	  }
	});
	
});
</script>