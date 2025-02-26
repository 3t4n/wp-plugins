<?php
	if($_GET['action'] == 'delete' && $_GET['id']>0) { 
		deleteBanner($_GET['id']);
		echo '<script>document.location="admin.php?page=manage_ads&message=deleted"</script>';
		exit;
	}

	$date_start 	= (empty($_POST['date_start']))	?	date('Y-m-d', strtotime("-4 day"))	:	$_POST['date_start'];
	$date_end 		= (empty($_POST['date_end']))	?	date('Y-m-d')						:	$_POST['date_end'];

	$date_start = preg_replace('/[^-0-9]*/', '', $date_start);
	$date_end = preg_replace('/[^-0-9]*/', '', $date_end);

	$only_with_earnings = ($_REQUEST['only_with_earnings'] == 'on') ? 1 : 0;
?>
<script type="text/javascript" src="<?php echo plugin_dir_url(__FILE__) ?>3rd/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo plugin_dir_url(__FILE__) ?>3rd/ace/ace.js" type="text/javascript" charset="utf-8"></script>
<link href="<?php echo plugin_dir_url(__FILE__) ?>3rd/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
<link href="<?php echo plugin_dir_url(__FILE__) ?>css/style.css" rel="stylesheet"/>


<div class="container-fluid padded">
	<div class="row-fluid">
        <div class="span12">
            <div class="box">
                <div class="box-header">
                    <span class="title">Ads Earnings</span>
                    <?php if($pub_id > 0) { ?>
                        <span class="title_right">Publisher ID: <b><i class="glyphicon glyphicon-user"></i> <?php echo $pub_id; ?></b> <a href="admin.php?page=set_pub_id">[Change]</a></span>
                    <?php } ?>
                </div>
                <div class="box-content padded">
                	<form name="f" method="post" action="">
						<div class="row-fluid">
							<div class="span12 padded">
								<div class="row row-fluid">								
									<div class="span2">
										<label style="font-size: 18px;" accesskey="s">Start Date</label>
										<input style="font-size: 16px;" type="text" value="<?= $date_start; ?>" name="date_start" id="date_start" class="datepicker"/>
									</div>
									<div class="span3">
										<label style="font-size: 18px;" accesskey="e">End Date</label>
										<input style="font-size: 16px;" type="text" value="<?= $date_end; ?>" name="date_end" id="date_end" class="datepicker"/>	
										<input type="submit" class="btn btn-sm btn-green" name="statlookup" value="Submit" style="margin-top: -12px" />
									</div>
									<div class="span7">
										<label style="font-size: 18px;" accesskey="e">Important</label>
										<p style="margin-top:16px">This report shows estimated earnings only. <strong>CPAlead pays out for every 5 cents earned.</strong></p><p>Example 1: If a click pays you 20 cents, you will be paid 5 cents 4 times.</p><p>Example 2: If a click pays you 2 cents, you will not be paid until you earn 3 or more cents.</p><p>This report does not show earnings generated before July 19, 2017</p>
										<p>This report require up to 90 seconds for loading.</p>
									</div>
								</div>
								<div class="row">
									<label><input type="checkbox" name="only_with_earnings" <?php if($only_with_earnings == 1) echo "checked"; ?> style="margin-top: -2px"> Show only banners with earnings more than $0.00</label>														      	
								</div>
							</div>
						</div>
			    	</form>
			    	<?php if($Res != null) { ?>
				    	<hr>
	                	<b>Ads Banner</b>
	                	<table class="wp-list-table widefat fixed striped posts">
							<thead>
								<tr>
									<th><div>Name</div></th>
			        				<th><div>Clicks / Pops</div></th>
			        				<th><div>Estimated Earnings</div></th>
								</tr>
							</thead>
							<tbody>
			                    <?php if(!empty($Res)):?>
									<?php foreach($Res as $banner): ?>
										<?php if($banner->type == 1) { 
											if($only_with_earnings == 1 && $banner->earn == 0) {
												// Skip
											} else { ?>
												<tr>
													<td>From <?php echo date('F d, Y', $banner->created); ?> <small><?php if($banner->wp == 1) echo '<i class="dashicons dashicons-wordpress" style="font-size:12px;width:12px;height:12px;line-height:inherit"></i> '; ?></small>
													</td>
													<td><?= ($banner->clicks > 0) ? $banner->clicks : '0'; ?></td>
													<td>$<?= ($banner->earn > 0) ? number_format($banner->earn,'4','.',',') : '0.0000'; ?></td>
												</tr>
											<?php } 
										} ?>
									<?php endforeach;?>
								<?php else:?>
								<tr>
									<td colspan="3">Nothing Found!</td>
								</tr>
								<?php endif;?>
							</tbody>
						</table>
						<br>
						<b>Custom Ad</b>
	                	<table class="wp-list-table widefat fixed striped posts">
							<thead>
								<tr>
									<th><div>Name</div></th>
			        				<th><div>Clicks / Pops</div></th>
			        				<th><div>Estimated Earnings</div></th>
								</tr>
							</thead>
							<tbody>
			                    <?php if(!empty($Res)):?>
									<?php foreach($Res as $banner): ?>
										<?php if($banner->type == 2) { 
											if($only_with_earnings == 1 && $banner->earn == 0) {
												// Skip
											} else { ?>
												<tr>
													<td><?php echo $banner->name ?> <small><?php if($banner->wp == 1) echo '<i class="dashicons dashicons-wordpress" style="font-size:12px;width:12px;height:12px;line-height:inherit"></i> '; ?></small>
													</td>
													<td><?= ($banner->clicks > 0) ? $banner->clicks : '0'; ?></td>
													<td>$<?= ($banner->earn > 0) ? number_format($banner->earn,'4','.',',') : '0.0000'; ?></td>
												</tr>
											<?php } 
										} ?>
									<?php endforeach;?>
								<?php else:?>
								<tr>
									<td colspan="3">Nothing Found!</td>
								</tr>
								<?php endif;?>
							</tbody>
						</table>
						<br>
						<b>Pop-Under Ad</b>
	                	<table class="wp-list-table widefat fixed striped posts">
							<thead>
								<tr>
			        				<th><div>Name</div></th>
			        				<th><div>Clicks / Pops</div></th>
			        				<th><div>Estimated Earnings</div></th>
			        				<th><div>RPM</div></th>
			        			</tr>
							</thead>
							<tbody>
			                    <?php if(!empty($Res)):?>
									<?php foreach($Res as $banner): ?>
										<?php if($banner->type == 3) { 
											if($only_with_earnings == 1 && $banner->earn == 0) {
												// Skip
											} else {
												if($banner->clicks > 0) {
													$rpm = ( $banner->earn / $banner->clicks ) * 1000;
												} else {
													$rpm = 0;
												} ?>
												<tr>
													<td><?php echo $banner->name ?> <small><?php if($banner->wp == 1) echo '<i class="dashicons dashicons-wordpress" style="font-size:12px;width:12px;height:12px;line-height:inherit"></i> '; ?></small>
													</td>
													<td><?= ($banner->clicks > 0) ? $banner->clicks : '0'; ?></td>
													<td>$<?= ($banner->earn > 0) ? number_format($banner->earn,'4','.',',') : '0.0000'; ?></td>
													<td>$<?= ($rpm > 0) ? number_format($rpm,'2','.',',') : '0.00'; ?></td>
												</tr>
											<?php } 
										} ?>
									<?php endforeach;?>
								<?php else:?>
								<tr>
									<td colspan="4">Nothing Found!</td>
								</tr>
								<?php endif;?>
							</tbody>
						</table>
						<br>
						<b>Interstitial Ad</b>
	                	<table class="wp-list-table widefat fixed striped posts">
							<thead>
								<tr>
									<th><div>Name</div></th>
			        				<th><div>Clicks / Pops</div></th>
			        				<th><div>Estimated Earnings</div></th>
								</tr>
							</thead>
							<tbody>
			                    <?php if(!empty($Res)):?>
									<?php foreach($Res as $banner): ?>
										<?php if($banner->type == 4) { 
											if($only_with_earnings == 1 && $banner->earn == 0) {
												// Skip
											} else { ?>
												<tr>
													<td><?php echo $banner->name ?> <small><?php if($banner->wp == 1) echo '<i class="dashicons dashicons-wordpress" style="font-size:12px;width:12px;height:12px;line-height:inherit"></i> '; ?></small>
													</td>
													<td><?= ($banner->clicks > 0) ? $banner->clicks : '0'; ?></td>
													<td>$<?= ($banner->earn > 0) ? number_format($banner->earn,'4','.',',') : '0.0000'; ?></td>
												</tr>
											<?php }
										} ?>
									<?php endforeach;?>
								<?php else:?>
								<tr>
									<td colspan="3">Nothing Found!</td>
								</tr>
								<?php endif;?>
							</tbody>
						</table>
						<br>
						<b>Superlink Ad</b>
	                	<table class="wp-list-table widefat fixed striped posts">
							<thead>
								<tr>
			        				<th><div>Name</div></th>
			        				<th><div>Clicks / Pops</div></th>
			        				<th><div>Estimated Earnings</div></th>
			        				<th><div>RPM</div></th>
			        			</tr>
							</thead>
							<tbody>
			                    <?php if(!empty($Res)):?>
									<?php foreach($Res as $banner): ?>
										<?php if($banner->type == 5) { 
											if($only_with_earnings == 1 && $banner->earn == 0) {
												// Skip
											} else {
												if($banner->clicks > 0) {
													$rpm = ( $banner->earn / $banner->clicks ) * 1000;
												} else {
													$rpm = 0;
												}
												?>
												<tr>
													<td><?php echo $banner->name ?> <small><?php if($banner->wp == 1) echo '<i class="dashicons dashicons-wordpress" style="font-size:12px;width:12px;height:12px;line-height:inherit"></i> '; ?></small>
													</td>
													<td><?= ($banner->clicks > 0) ? $banner->clicks : '0'; ?></td>
													<td>$<?= ($banner->earn > 0) ? number_format($banner->earn,'4','.',',') : '0.0000'; ?></td>
													<td>$<?= ($rpm > 0) ? number_format($rpm,'2','.',',') : '0.00'; ?></td>
												</tr>
											<?php } 
										} ?>
									<?php endforeach;?>
								<?php else:?>
								<tr>
									<td colspan="4">Nothing Found!</td>
								</tr>
								<?php endif;?>
							</tbody>
						</table>
						<br>
						<b>PushUp Ad</b>
	                	<table class="wp-list-table widefat fixed striped posts">
							<thead>
								<tr>
									<th><div>Name</div></th>
			        				<th><div>Clicks / Pops</div></th>
			        				<th><div>Estimated Earnings</div></th>
								</tr>
							</thead>
							<tbody>
			                    <?php if(!empty($Res)):?>
									<?php foreach($Res as $banner): ?>
										<?php if($banner->type == 6) { 
											if($only_with_earnings == 1 && $banner->earn == 0) {
												// Skip
											} else { ?>
												<tr>
													<td><?php echo $banner->name ?> <small><?php if($banner->wp == 1) echo '<i class="dashicons dashicons-wordpress" style="font-size:12px;width:12px;height:12px;line-height:inherit"></i> '; ?></small>
													</td>
													<td><?= ($banner->clicks > 0) ? $banner->clicks : '0'; ?></td>
													<td>$<?= ($banner->earn > 0) ? number_format($banner->earn,'4','.',',') : '0.0000'; ?></td>
												</tr>
											<?php } 
										} ?>
									<?php endforeach;?>
								<?php else:?>
								<tr>
									<td colspan="3">Nothing Found!</td>
								</tr>
								<?php endif;?>
							</tbody>
						</table>
						<br>
						<b>Locker Ad</b>
	                	<table class="wp-list-table widefat fixed striped posts">
							<thead>
								<tr>
									<th><div>Name</div></th>
			        				<th><div>Clicks / Pops</div></th>
			        				<th><div>Estimated Earnings</div></th>
								</tr>
							</thead>
							<tbody>
			                    <?php if(!empty($Res)):?>
									<?php foreach($Res as $banner): ?>
										<?php if($banner->type == 7) { 
											if($only_with_earnings == 1 && $banner->earn == 0) {
												// Skip
											} else { ?>
												<tr>
													<td><?php echo $banner->name ?> <small><?php if($banner->wp == 1) echo '<i class="dashicons dashicons-wordpress" style="font-size:12px;width:12px;height:12px;line-height:inherit"></i> '; ?></small>
													</td>
													<td><?= ($banner->clicks > 0) ? $banner->clicks : '0'; ?></td>
													<td>$<?= ($banner->earn > 0) ? number_format($banner->earn,'4','.',',') : '0.0000'; ?></td>
												</tr>
											<?php } 
										} ?>
									<?php endforeach;?>
								<?php else:?>
								<tr>
									<td colspan="3">Nothing Found!</td>
								</tr>
								<?php endif;?>
							</tbody>
						</table>
						<br>
						<b>OfferWall Ad</b>
	                	<table class="wp-list-table widefat fixed striped posts">
							<thead>
								<tr>
									<th><div>Name</div></th>
			        				<th><div>Clicks / Pops</div></th>
			        				<th><div>Estimated Earnings</div></th>
								</tr>
							</thead>
							<tbody>
			                    <?php if(!empty($Res)):?>
									<?php foreach($Res as $banner): ?>
										<?php if($banner->type == 8) { 
											if($only_with_earnings == 1 && $banner->earn == 0) {
												// Skip
											} else { ?>
												<tr>
													<td><?php echo $banner->name ?> <small><?php if($banner->wp == 1) echo '<i class="dashicons dashicons-wordpress" style="font-size:12px;width:12px;height:12px;line-height:inherit"></i> '; ?></small>
													</td>
													<td><?= ($banner->clicks > 0) ? $banner->clicks : '0'; ?></td>
													<td>$<?= ($banner->earn > 0) ? number_format($banner->earn,'4','.',',') : '0.0000'; ?></td>
												</tr>
											<?php } 
										} ?>
									<?php endforeach;?>
								<?php else:?>
								<tr>
									<td colspan="3">Nothing Found!</td>
								</tr>
								<?php endif;?>
							</tbody>
						</table>
					<?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('.datepicker').datepicker({
			dateFormat : 'yy-mm-dd'
		});
	});
</script>