<?php 
	if(isset($_POST['protwitter_hidden']) && ($_POST['protwitter_hidden'] == 'Y')) {
		//Form data sent
		$template_id = $_POST['protwitter_template_id'];
		update_option('protwitter_template_id', $template_id);
		?>
		<div class="updated"><p><strong><?php _e('Options saved.' , 'protwitter'); ?></strong></p></div>
		<?php
	} else {
		//Normal page display
		$twitter_id = get_option('protwitter_twitter_id');
	}
?>

<div class="wrap">
	<?php    echo "<h2>" . __( 'Pro Twitter - Counter Options', 'protwitter') . "</h2>"; ?>
	<form name="protwitter_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
		<input type="hidden" name="protwitter_hidden" value="Y">  	
					
		<?php    echo "<h4>" . __( 'Display Settings', 'protwitter') . "</h4>"; ?>
		<p>
		<?php 
			$count='12345'; 
			$url_twitter='#'; 
			$template_id = get_option('protwitter_template_id');
		?>
		<table border="0" cellspacing="10" cellpadding="0" >
		<tr>
		<td>
			<input type="radio" name="protwitter_template_id" value="1" <?php echo $template_id==1? 'checked=checked': '' ?>>
		</td>
		<td width="150px">
		<?php 
	echo '<span style="background: #fff; padding: 1px; font-family: Geneva, Vera, Arial, Helvetica, sans-serif; font-size: x-small; font-variant: small-caps; border: 1px solid #999999;"><span style="color: #FFFFFF; background: #3333FF; padding: 0px 3px 0px 3px;">'.$count.'</span><span style="color: #0000CC; background: #AAAAAA; padding: 0px 6px 0px 3px;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color: #000;">followers</a></span></span>';
		?>
		</td>
		<td>
			<input type="radio" name="protwitter_template_id" value="2" <?php echo $template_id==2? 'checked=checked': '' ?>>
		</td>
		<td width="150px">
		<?php 
		echo '<span style="background: #fff; padding: 1px; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-size: 0.8em; font-variant: small-caps; border: 1px solid #aaa;"><span style="color: #fff; background: #c00; padding: 0px 2px 0px 2.4000000000000004px;">'.$count.'</span><span style="color: #000; background: #fff; padding: 0px 0px 4.5px 0px 2px;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color: #000;">followers</a></span></span>';
		?>
		</td>
		<td>
			<input type="radio" name="protwitter_template_id" value="3" <?php echo $template_id==3? 'checked=checked': '' ?>>
		</td>
		<td width="150px">	
		<?php 
		echo '<span style="background: #fff; padding: 1px; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-size: 10px; font-variant: small-caps; border: 1px solid #aaa;"><span style="color: #00c; background: #fff; padding: 0px 2px 0px 4.5px;">'.$count.'</span><span style="color: #000; background: #f93; padding: 0px 4.5px 0px 2px;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color: #000;">followers</a></span></span>';
		?>
		</td>	
		<td>
			<input type="radio" name="protwitter_template_id" value="4" <?php echo $template_id==4? 'checked=checked': '' ?>>
		</td>
		<td width="150px">	
		<?php 
		echo '<span style="background: #fff; padding: 1px; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-size: x-small; font-variant: small-caps; border: 1px solid #080;"><span style="color: #fff; background: #080; padding: 0px 2px;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color: #fff;">followers</a></span><span style="color: #080; background: #fff; padding: 0px 8px 0px 2px;">'.$count.'</span></span>';
		?>
		</td>	
		<td>
			<input type="radio" name="protwitter_template_id" value="5" <?php echo $template_id==5? 'checked=checked': '' ?>>
		</td>
		<td width="150px">	
		<?php 
		echo '<span style="background: #fff; padding: 1px; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-size: 10px; font-variant: small-caps; border: 1px solid #000;"><span style="color: #000; background: #fc0; padding: 0px 2px 0px 3px;">'.$count.'</span><span style="color: #fc0; background: #000; padding: 0px 3px 0px 2px;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color: #fc0;">followers</a></span></span>';
		?>
		</td>	
	
		</tr>		

		<tr>
		<td>
			<input type="radio" name="protwitter_template_id" value="6" <?php echo $template_id==6? 'checked=checked': '' ?>>
		</td>
		<td width="150px">
		<?php 
		echo '<span style="background: #fff; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; border: 1px solid #000; font: bold 10px Verdana, sans-serif;"><span style="background:#ccf; color:#006; padding: 0px 2px 0px 3px;">'.$count.'</span><span style="background:#006; color:white; padding: 0px 3px 0px 2px;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color:white; margin: 0 0.2em; padding: 0.1em 0; _padding:0;">Followers</a></span></span>';
		?>
		</td>
		<td>
			<input type="radio" name="protwitter_template_id" value="7" <?php echo $template_id==7? 'checked=checked': '' ?>>
		</td>
		<td width="150px">
		<?php 
		echo '<span style="background: #fff; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; border: 1px solid #000; font: bold 10px Verdana, sans-serif;"><span style="background: white; color: #c60; padding: 0px 2px 0px 3px;">'.$count.'</span><span style="background: orange; color: black; padding: 0px 3px 0px 2px;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color:black; margin: 0 0.2em; padding: 0.1em 0; _padding:0;">Followers</a></span></span>';
		?>
		</td>
		<td>
			<input type="radio" name="protwitter_template_id" value="8" <?php echo $template_id==8? 'checked=checked': '' ?>>
		</td>
		<td width="150px">	
		<?php 
		echo '<span style="background: #fff; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; border: 1px solid #000; font: bold 10px Verdana, sans-serif;"><span style="background: white; color: #06c; padding: 0px 2px 0px 3px;">'.$count.'</span><span style="background: #06c; color: white; padding: 0px 3px 0px 2px;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color:white; margin: 0 0.2em; padding: 0.1em 0; _padding:0;">Followers</a></span></span>';
		?>
		</td>
		<td>
			<input type="radio" name="protwitter_template_id" value="9" <?php echo $template_id==9? 'checked=checked': '' ?>>
		</td>
		<td width="150px">
		<?php 
		echo '<span style="background: #fff; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; border: 1px solid #000; font: bold 10px Verdana, sans-serif;"><span style="background: white; color: green; padding: 0px 2px 0px 3px;">'.$count.'</span><span style="background: green; color: white; color: white; padding: 0px 3px 0px 2px;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color:white; margin: 0 0.2em; padding: 0.1em 0; _padding:0;">Followers</a></span></span>';
		?>
		</td>
		<td>
			<input type="radio" name="protwitter_template_id" value="10" <?php echo $template_id==10? 'checked=checked': '' ?>>
		</td>
		<td width="150px">	
			<?php 
	echo '<span style="background: #fff; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; border: 1px solid #000; font: bold 10px Verdana, sans-serif;"><span style="background:#003; color:#ffc; padding: 0px 2px 0px 3px;">'.$count.'</span><span style="background:#dd9; color:black; padding: 0px 3px 0px 2px;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color:black; margin: 0 0.2em; padding: 0.1em 0; _padding:0;">Followers</a></span></span>';
		?>
		</td>
		
		</tr>


		<tr>
		<td>
			<input type="radio" name="protwitter_template_id" value="11" <?php echo $template_id==11? 'checked=checked': '' ?>>
		</td>
		<td width="150px">
		<?php 
		echo '<table border="0" cellspacing="0" cellpadding="0" style="border: 1px solid #000;">
<tr><td align="right" style="background: #ccf;">
	<span style="color: #006; padding: 0px 5px 0px 5px; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; font: bold 10px Verdana, sans-serif;">'.$count.'</span></td>
<td align="center" style="background: #006;">
		<span style="color: white; padding: 0px 5px 0px 5px; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; font: bold 10px Verdana, sans-serif;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color:white;">Followers</a></span></td>
</tr>
<tr><td colspan="2" style="background: #006;text-align:center;"><span style="color: white; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; font: bold 8px Verdana, sans-serif; xpadding: 3px 3px 3px 3px;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color:white;">Pro Twitter Counter</a></span>
</td></tr></table>';
		?>
		</td>
		<td>
			<input type="radio" name="protwitter_template_id" value="12" <?php echo $template_id==12? 'checked=checked': '' ?>>
		</td>
		<td width="150px">
		<?php 
		echo '<table border="0" cellspacing="0" cellpadding="0" style="border: 1px solid #000;">
<tr><td align="right" style="background: white;">
	<span style="color: #c60; padding: 0px 5px 0px 5px; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; font: bold 10px Verdana, sans-serif;">'.$count.'</span></td>
<td align="center" style="background: orange;">
		<span style="color: black; padding: 0px 5px 0px 5px; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; font: bold 10px Verdana, sans-serif;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color:black;">Followers</a></span></td>
</tr>
<tr><td colspan="2" style="background: orange;text-align:center;"><span style="color: white; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; font: bold 8px Verdana, sans-serif; xpadding: 3px 3px 3px 3px;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color:black;">Pro Twitter Counter</a></span>
</td></tr></table>';
		?>
		</td>
		<td>
			<input type="radio" name="protwitter_template_id" value="13" <?php echo $template_id==13? 'checked=checked': '' ?>>
		</td>
		<td width="150px">	
		<?php 
		echo '<table border="0" cellspacing="0" cellpadding="0" style="border: 1px solid #000;">
<tr><td align="right" style="background: white;">
	<span style="color: #06c; padding: 0px 5px 0px 5px; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; font: bold 10px Verdana, sans-serif;">'.$count.'</span></td>
<td align="center" style="background: #06c;">
		<span style="color: white; padding: 0px 5px 0px 5px; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; font: bold 10px Verdana, sans-serif;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color:white;">Followers</a></span></td>
</tr>
<tr><td colspan="2" style="background: #06c;text-align:center;"><span style="color: white; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; font: bold 8px Verdana, sans-serif; xpadding: 3px 3px 3px 3px;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color:white;">Pro Twitter Counter</a></span>
</td></tr></table>';
		?>
		</td>
		<td>
			<input type="radio" name="protwitter_template_id" value="14" <?php echo $template_id==14? 'checked=checked': '' ?>>
		</td>
		<td width="150px">
		<?php 
		echo '<table border="0" cellspacing="0" cellpadding="0" style="border: 1px solid #000;">
<tr><td align="right" style="background: white;">
	<span style="color: green; padding: 0px 5px 0px 5px; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; font: bold 10px Verdana, sans-serif;">'.$count.'</span></td>
<td align="center" style="background: green;">
		<span style="color: white; padding: 0px 5px 0px 5px; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; font: bold 10px Verdana, sans-serif;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color:white;">Followers</a></span></td>
</tr>
<tr><td colspan="2" style="background: green;text-align:center;"><span style="color: white; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; font: bold 8px Verdana, sans-serif; xpadding: 3px 3px 3px 3px;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color:white;">Pro Twitter Counter</a></span>
</td></tr></table>';
		?>
		</td>
		<td>
			<input type="radio" name="protwitter_template_id" value="15" <?php echo $template_id==15? 'checked=checked': '' ?>>
		</td>
		<td width="150px">	
			<?php 
	echo '<table border="0" cellspacing="0" cellpadding="0" style="border: 1px solid #000;">
<tr><td align="right" style="background: #003;">
	<span style="color: #dd9; padding: 0px 5px 0px 5px; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; font: bold 10px Verdana, sans-serif;">'.$count.'</span></td>
<td align="center" style="background: #dd9;">
		<span style="color: black; padding: 0px 5px 0px 5px; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; font: bold 10px Verdana, sans-serif;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color:black;">Followers</a></span></td>
</tr>
<tr><td colspan="2" style="background: #dd9;text-align:center;"><span style="color: white; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; font: bold 8px Verdana, sans-serif; xpadding: 3px 3px 3px 3px;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color:black;">Pro Twitter Counter</a></span>
</td></tr></table>';
		?>
		</td>
		
		</tr>


		<tr>
		<td>
			<input type="radio" name="protwitter_template_id" value="16" <?php echo $template_id==16? 'checked=checked': '' ?>>
		</td>
		<td width="150px">
		<?php 
		echo '<table width="90px" border="0" cellspacing="0" cellpadding="0" style="border: 1px solid #006;">
<tr><td align="right" style="background: #ccf;">
	<span style="
				text-align: right;
				background-color: #ccf;
				font-size:9px;
				padding: 0px 5px 0px 5px;
				color: #006;
				line-height: 11px;
				font-family:Arial,Vendana,Sans;">'.$count.'</span></td>
<td align="center" style="background: #006;">
		<span style="color: white; line-height: 10px; padding: 0px 5px 0px 5px; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; font: bold 8px Verdana, sans-serif;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color:white;">FollowMe</a></span></td>
</tr>
<tr><td colspan="2" style="background: #006;text-align:center;"><span style="color: white; line-height: 10px; text-align:center; font-size:8px; font-family:Arial;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color:white;">Pro Twitter Counter</a></span>
</td></tr></table>';
		?>
		</td>
		<td>
			<input type="radio" name="protwitter_template_id" value="17" <?php echo $template_id==17? 'checked=checked': '' ?>>
		</td>
		<td width="150px">
		<?php 
		echo '<table width="90px" border="0" cellspacing="0" cellpadding="0" style="border: 1px solid orange;">
<tr><td align="right" style="background: white;">
	<span style="
				text-align: right;
				background-color: white;
				font-size:9px;
				padding: 0px 5px 0px 5px;
				color: black;
				line-height: 11px;
				font-family:Arial,Vendana,Sans;">'.$count.'</span></td>
<td align="center" style="background: orange;">
		<span style="color: white; line-height: 10px; padding: 0px 5px 0px 5px; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; font: bold 8px Verdana, sans-serif;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color:black;">FollowMe</a></span></td>
</tr>
<tr><td colspan="2" style="background: orange;text-align:center;"><span style="color: black; line-height: 10px; text-align:center; font-size:8px; font-family:Arial;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color:black;">Pro Twitter Counter</a></span>
</td></tr></table>';
		?>
		</td>
		<td>
			<input type="radio" name="protwitter_template_id" value="18" <?php echo $template_id==18? 'checked=checked': '' ?>>
		</td>
		<td width="150px">	
		<?php 
		echo '<table width="90px" border="0" cellspacing="0" cellpadding="0" style="border: 1px solid #06c;">
<tr><td align="right" style="background: white;">
	<span style="
				text-align: right;
				background-color: white;
				font-size:9px;
				padding: 0px 5px 0px 5px;
				color: #06c;
				line-height: 11px;
				font-family:Arial,Vendana,Sans;">'.$count.'</span></td>
<td align="center" style="background: #06c;">
		<span style="color: white; line-height: 10px; padding: 0px 5px 0px 5px; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; font: bold 8px Verdana, sans-serif;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color:white;">FollowMe</a></span></td>
</tr>
<tr><td colspan="2" style="background: #06c;text-align:center;"><span style="color: white; line-height: 10px; text-align:center; font-size:8px; font-family:Arial;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color:white;">Pro Twitter Counter</a></span>
</td></tr></table>';
		?>
		</td>
		<td>
			<input type="radio" name="protwitter_template_id" value="19" <?php echo $template_id==19? 'checked=checked': '' ?>>
		</td>
		<td width="150px">
		<?php 
		echo '<table width="90px" border="0" cellspacing="0" cellpadding="0" style="border: 1px solid green;">
<tr><td align="right" style="background: white;">
	<span style="
				text-align: right;
				background-color: white;
				font-size:9px;
				padding: 0px 5px 0px 5px;
				color: green;
				line-height: 11px;
				font-family:Arial,Vendana,Sans;">'.$count.'</span></td>
<td align="center" style="background: green;">
		<span style="color: white; line-height: 10px; padding: 0px 5px 0px 5px; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; font: bold 8px Verdana, sans-serif;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color:white;">FollowMe</a></span></td>
</tr>
<tr><td colspan="2" style="background: green;text-align:center;"><span style="color: white; line-height: 10px; text-align:center; font-size:8px; font-family:Arial;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color:white;">Pro Twitter Counter</a></span>
</td></tr></table>';
		?>
		</td>
		<td>
			<input type="radio" name="protwitter_template_id" value="20" <?php echo $template_id==20? 'checked=checked': '' ?>>
		</td>
		<td width="150px">	
			<?php 
	echo '<table width="90px" border="0" cellspacing="0" cellpadding="0" style="border: 1px solid black;">
<tr><td align="right" style="background: black;">
	<span style="
				text-align: right;
				background-color: black;
				font-size:9px;
				padding: 0px 5px 0px 5px;
				color: white;
				line-height: 11px;
				font-family:Arial,Vendana,Sans;">'.$count.'</span></td>
<td align="center" style="background: #dd9;">
		<span style="color: white; line-height: 10px; padding: 0px 5px 0px 5px; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-variant: small-caps; font: bold 8px Verdana, sans-serif;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color:black;">FollowMe</a></span></td>
</tr>
<tr><td colspan="2" style="background: #dd9;text-align:center;"><span style="color: black; line-height: 10px; text-align:center; font-size:8px; font-family:Arial;"><a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: none; color:black;">Pro Twitter Counter</a></span>
</td></tr></table>';
		?>
		</td>
		
		</tr>


		<tr>
		<td>
			<input type="radio" name="protwitter_template_id" value="21" <?php echo $template_id==21? 'checked=checked': '' ?>>
		</td>
		<td width="150px">
		<?php 
		echo '<div style="border : 1px solid #104ed9; margin : 5px 0 0 20px; width: 50px; height: 50px; background-color: #0A328C; margin: 1px;">
			<div style="padding: 15px 1px 1px 1px;
				font-family:Arial,Vendana,Sans; 
				text-align: center;
				font-weight: bold;
				font-size:12px;
				color: white;
				width:46px;
				height: 15px;
				font-family:Arial,Vendana,Sans;"/>'.$count.'
			</div>
			<div style="padding: 1px;
				font-family:Arial,Vendana,Sans; 
				text-align: center;
				font-size:10px;
				font-family:Arial,Vendana,Sans;"/>
				<a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: underline; color: #66bbff;">FollowMe</a>
			</div>
	</div>';
		?>
		</td>
		<td>
			<input type="radio" name="protwitter_template_id" value="22" <?php echo $template_id==22? 'checked=checked': '' ?>>
		</td>
		<td width="150px">
		<?php 
		echo '<div style="border : 1px solid #104ed9; margin : 5px 0 0 20px; width: 50px; height: 50px; background-color: orange; margin: 1px;">
			<div style="padding: 15px 1px 1px 1px;
				font-family:Arial,Vendana,Sans; 
				text-align: center;
				font-weight: bold;
				font-size:12px;
				color: white;
				width:46px;
				height: 15px;
				font-family:Arial,Vendana,Sans;"/>'.$count.'
			</div>
			<div style="padding: 1px;
				font-family:Arial,Vendana,Sans; 
				text-align: center;
				font-size:10px;
				font-family:Arial,Vendana,Sans;"/>
				<a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: underline; color: black;">FollowMe</a>
			</div>
	</div>';
		?>
		</td>
		<td>
			<input type="radio" name="protwitter_template_id" value="23" <?php echo $template_id==23? 'checked=checked': '' ?>>
		</td>
		<td width="150px">	
		<?php 
		echo '<div style="border : 1px solid black; margin : 5px 0 0 20px; width: 50px; height: 50px; background-color: #06c; margin: 1px;">
			<div style="padding: 15px 1px 1px 1px;
				font-family:Arial,Vendana,Sans; 
				text-align: center;
				font-weight: bold;
				font-size:12px;
				color: white;
				width:46px;
				height: 15px;
				font-family:Arial,Vendana,Sans;"/>'.$count.'
			</div>
			<div style="padding: 1px;
				font-family:Arial,Vendana,Sans; 
				text-align: center;
				font-size:10px;
				font-family:Arial,Vendana,Sans;"/>
				<a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: underline; color: white;">FollowMe</a>
			</div>
	</div>';
		?>
		</td>
		<td>
			<input type="radio" name="protwitter_template_id" value="24" <?php echo $template_id==24? 'checked=checked': '' ?>>
		</td>
		<td width="150px">
		<?php 
		echo '<div style="border : 1px solid black; margin : 5px 0 0 20px; width: 50px; height: 50px; background-color: green; margin: 1px;">
			<div style="padding: 15px 1px 1px 1px;
				font-family:Arial,Vendana,Sans; 
				text-align: center;
				font-weight: bold;
				font-size:12px;
				color: white;
				width:46px;
				height: 15px;
				font-family:Arial,Vendana,Sans;"/>'.$count.'
			</div>
			<div style="padding: 1px;
				font-family:Arial,Vendana,Sans; 
				text-align: center;
				font-size:10px;
				font-family:Arial,Vendana,Sans;"/>
				<a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: underline; color: white;">FollowMe</a>
			</div>
	</div>';
		?>
		</td>
		<td>
			<input type="radio" name="protwitter_template_id" value="25" <?php echo $template_id==25? 'checked=checked': '' ?>>
		</td>
		<td width="150px">	
			<?php 
	echo '<div style="border : 1px solid black; margin : 5px 0 0 20px; width: 50px; height: 50px; background-color: #dd9; margin: 1px;">
			<div style="padding: 15px 1px 1px 1px;
				font-family:Arial,Vendana,Sans; 
				text-align: center;
				font-weight: bold;
				font-size:12px;
				color: black;
				width:46px;
				height: 15px;
				font-family:Arial,Vendana,Sans;"/>'.$count.'
			</div>
			<div style="padding: 1px;
				font-family:Arial,Vendana,Sans; 
				text-align: center;
				font-size:10px;
				font-family:Arial,Vendana,Sans;"/>
				<a href="'.$url_twitter.'" target="_BLANK" style="text-decoration: underline; color: black;">FollowMe</a>
			</div>
	</div>';
		?>
		</td>
		
		</tr>


	</table>
	
	
		
		
		</p>		
			
		<p class="submit">
		<input type="submit" name="Submit" value="<?php _e('Update Options', 'protwitter') ?>" />
		</p>
	</form>
	<p>For more plugins visit <a href="http://www.myfastblog.com" target="_BLANK" alt="My Fast Blog"> My Fast Blog</a></p>
</div>
