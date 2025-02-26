<?php
	if($_GET['action'] == 'delete' && $_GET['id']>0) { 
		deleteBanner($_GET['id']);
		echo '<script>document.location="admin.php?page=manage_ads&message=deleted"</script>';
		exit;
	}
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
                    <span class="title">CPC Rates</span>
                    <?php if($pub_id > 0) { ?>
                        <span class="title_right">Publisher ID: <b><i class="glyphicon glyphicon-user"></i> <?php echo $pub_id; ?></b> <a href="admin.php?page=set_pub_id">[Change]</a></span>
                    <?php } ?>
                </div>
                <div class="box-content padded">
                	<b>Banner Ads & Custom Ads</b>
                	<table class="wp-list-table widefat fixed striped posts">
						<thead>
							<tr>
								<th><div>Country</div></th>
		        				<th><div>Device</div></th>
		        				<th><div>Average Payout Per Click</div></th>
							</tr>
						</thead>
						<tbody>
		                    <?php if(!empty($Res)):?>
								<?php foreach($Res as $rate): ?>
									<?php if($rate->banner_type == 1) { ?>
										<tr>
											<td><?php echo $rate->country; ?></td>
											<td><?php echo $rate->device; ?></td>
											<td>$<?= ($rate->average > 0) ? number_format($rate->average,'2','.',',') : '0.00'; ?></td>
										</tr>
									<?php } ?>
								<?php endforeach;?>
							<?php else:?>
							<tr>
								<td colspan="3">Nothing Found!</td>
							</tr>
							<?php endif;?>
						</tbody>
					</table>
					
					<br>

					<b>Interstitial Ads</b>
                	<table class="wp-list-table widefat fixed striped posts">
						<thead>
							<tr>
								<th><div>Country</div></th>
		        				<th><div>Device</div></th>
		        				<th><div>Average Payout Per Click</div></th>
							</tr>
						</thead>
						<tbody>
		                    <?php if(!empty($Res)):?>
								<?php foreach($Res as $rate): ?>
									<?php if($rate->banner_type == 4) { ?>
										<tr>
											<td><?php echo $rate->country; ?></td>
											<td><?php echo $rate->device; ?></td>
											<td>$<?= ($rate->average > 0) ? number_format($rate->average,'2','.',',') : '0.00'; ?></td>
										</tr>
									<?php } ?>
								<?php endforeach;?>
							<?php else:?>
							<tr>
								<td colspan="3">Nothing Found!</td>
							</tr>
							<?php endif;?>
						</tbody>
					</table>

					<br>

					<b>Lockers</b>
                	<table class="wp-list-table widefat fixed striped posts">
						<thead>
							<tr>
								<th><div>Country</div></th>
		        				<th><div>Device</div></th>
		        				<th><div>Average Payout Per Click</div></th>
							</tr>
						</thead>
						<tbody>
		                    <?php if(!empty($Res)):?>
								<?php foreach($Res as $rate): ?>
									<?php if($rate->banner_type == 7) { ?>
										<tr>
											<td><?php echo $rate->country; ?></td>
											<td><?php echo $rate->device; ?></td>
											<td>$<?= ($rate->average > 0) ? number_format($rate->average,'2','.',',') : '0.00'; ?></td>
										</tr>
									<?php } ?>
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
								<th><div>Country</div></th>
		        				<th><div>Device</div></th>
		        				<th><div>Average Payout Per Click</div></th>
		        				<th><div>CPM</div></th>
							</tr>
						</thead>
						<tbody>
		                    <?php if(!empty($Res)):?>
								<?php foreach($Res as $rate): ?>
									<?php if($rate->banner_type == 3) { ?>
										<tr>
											<td><?php echo $rate->country; ?></td>
											<td><?php echo $rate->device; ?></td>
											<td>$<?= ($rate->average > 0) ? number_format($rate->average,'4','.',',') : '0.0000'; ?></td>
											<td>$<?= ($rate->cpm > 0) ? number_format($rate->cpm,'2','.',',') : '0.00'; ?></td>
										</tr>
									<?php } ?>
								<?php endforeach;?>
							<?php else:?>
							<tr>
								<td colspan="4">Nothing Found!</td>
							</tr>
							<?php endif;?>
						</tbody>
					</table>

					<br>

					<b>Pop-Under Ad</b>
                	<table class="wp-list-table widefat fixed striped posts">
						<thead>
							<tr>
								<th><div>Country</div></th>
		        				<th><div>Device</div></th>
		        				<th><div>Average Payout Per Click</div></th>
		        				<th><div>CPM</div></th>
							</tr>
						</thead>
						<tbody>
		                    <?php if(!empty($Res)):?>
								<?php foreach($Res as $rate): ?>
									<?php if($rate->banner_type == 6) { ?>
										<tr>
											<td><?php echo $rate->country; ?></td>
											<td><?php echo $rate->device; ?></td>
											<td>$<?= ($rate->average > 0) ? number_format($rate->average,'4','.',',') : '0.0000'; ?></td>
											<td>$<?= ($rate->cpm > 0) ? number_format($rate->cpm,'2','.',',') : '0.00'; ?></td>
										</tr>
									<?php } ?>
								<?php endforeach;?>
							<?php else:?>
							<tr>
								<td colspan="4">Nothing Found!</td>
							</tr>
							<?php endif;?>
						</tbody>
					</table>
                </div>
            </div>
        </div>
    </div>
</div>