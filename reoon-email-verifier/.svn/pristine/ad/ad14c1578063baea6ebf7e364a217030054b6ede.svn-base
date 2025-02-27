<?php

namespace REOONENV\Views;

use REOONENV\api\ReoonApi;
use REOONENV\util\Util;

class DashboardView
{

    public function __construct()
    {
    }
    // Display the plugin's dashboard
    function reoonev_dashboard()
    {
        
    echo '<div class="reo-em-ver-container">
    <h1 class="reo-em-ver-reo-em-ver-h1">Reoon Email Verifier Dashboard</h1>';

        if(Util::get_reoon_option("reoon_api_key") == "") {
			echo '<div class="reo-em-ver-card" style="text-align:center;padding: 8em 2em;"><div class="reo-em-ver-btn-wrapper">
					<a href="' . esc_url(admin_url('admin.php?page=reoonev-settings')) . '">Please add API Key</a>
				</div></div>';
			Util::get_support_url();
			die();
		}   
        
        $api = new ReoonApi();
        $account = $api->GetAccountInfo();

        $daily_credits_limit=0;
        $daily_credits_remaining=0;
        $credits_lifetime_remaning=0;
        $last_check_emails=array();
        $count_check_power=property_exists($account,"api_data")?$account->api_data->count_check_power:0;
        $count_check_quick=property_exists($account,"api_data")?$account->api_data->count_check_quick:0;
        $count_check_total=property_exists($account,"api_data")?$account->api_data->count_check_total:0;
        $stat_count_disposable=property_exists($account,"api_data")?$account->api_data->stat_count_disposable:0;
        $stat_count_invalid=property_exists($account,"api_data")?$account->api_data->stat_count_invalid:0;
        $stat_count_unknown=property_exists($account,"api_data")?$account->api_data->stat_count_unknown:0;
        $stat_count_valid=property_exists($account,"api_data")?$account->api_data->stat_count_valid:0;


        if(property_exists($account,"user_data"))
        {
            $daily_credits_limit=$account->user_data->credits_daily_limit;
            $daily_credits_remaining=$account->user_data->credits_daily_remaining;
            $credits_lifetime_remaning= $account->user_data->credits_lifetime_remaining;
        }

        if(property_exists($account,"api_data") && property_exists($account->api_data,"last_checked_emails"))
        {
            $last_check_emails = $account->api_data->last_checked_emails;
        }


        ?>
        

        <div class="reo-em-ver-card" style="text-align:center">
			<div class="reo-em-ver-card-title">Account Overview</div>
			<div class="reo-em-ver-card-body">
				<?php
				if($daily_credits_limit == 0) {
					$daily_credits_percent = 0; 
				} else {
					$daily_credits_percent = round(($daily_credits_remaining / $daily_credits_limit) * 100, 2); 
				}
				?>
				<p><strong>Daily Credits Remaining:</strong> <?php echo esc_html($daily_credits_remaining); ?>/<?php echo esc_html($daily_credits_limit); ?> (<?php echo esc_html($daily_credits_percent); ?>%) </p>
				<p><strong>Instant Credits Remaining:</strong> <?php echo esc_html($credits_lifetime_remaning); ?> </p>               
				<div class="reo-em-ver-btn-wrapper">
					<a href="<?php echo esc_url('https://emailverifier.reoon.com/buy-credits/'); ?>">Click Here to Get More Credits</a>
				</div>
			</div>
		</div>


        <div class="reo-em-ver-card">
			<div class="reo-em-ver-card-title">API Usage Statistics</div>
			<div class="reo-em-ver-card-body">
				<table class="reo-em-ver-table-cols">
					<tr>
						<th>Total Checked:</th>
						<td><?php echo esc_html($count_check_total); ?></td>

						<th>Valid Counts:</th>
						<td><?php echo esc_html($stat_count_valid); ?></td>
					</tr>
					<tr>
						<th>Checked Using Quick Mode:</th>
						<td><?php echo esc_html($count_check_quick); ?></td>

						<th>Disposable Count:</th>
						<td><?php echo esc_html($stat_count_disposable); ?></td>
					</tr>

					<tr>
						<th>Checked Using Power Mode:</th>
						<td><?php echo esc_html($count_check_power); ?></td>

						<th>Invalid Counts:</th>
						<td><?php echo esc_html($stat_count_invalid); ?></td>
					</tr>
				</table>
			</div>
		</div>


        <div class="reo-em-ver-card">
			<div class="reo-em-ver-card-title">
				Last 10 Verifications
			</div>
			<div class="reo-em-ver-card-body">
				<table class="reo-em-ver-table-border">
					<tr>
						<th>Date Verified</th>
						<th>Email Address</th>
						<th>Verification Method</th>
						<th>Result Status</th>
						<th>Time Taken (sec)</th>
					</tr>
					<?php foreach($last_check_emails as $stat): ?>
						<tr>
							<td><?php echo esc_html(gmdate("d-m-Y", strtotime($stat->date_created))); ?></td>
							<td><?php echo esc_html($stat->checked_email); ?></td>
							<td><?php echo esc_html($stat->methode); ?></td>
							<td><?php echo esc_html($stat->result_status); ?></td>
							<td><?php echo esc_html($stat->time_taken); ?></td>
						</tr>
					<?php endforeach; ?>
				</table>
			</div>
		</div>


        <?php Util::get_support_url()?>
        </div>

        <?php
    }
}
