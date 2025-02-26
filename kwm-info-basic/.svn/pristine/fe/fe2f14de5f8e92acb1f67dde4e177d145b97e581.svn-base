<?php
//echo '<pre>';
//print_r($_POST);
//echo '</pre>';
?>
<div class="contentKwmInfoBasic">
	<div class="content">
		<h1>KWM Info Basic</h1>
		<div class="contentTab">
			<form action="<?php echo $_SERVER['REQUEST_URI'] ; ?>" method="post" enctype="multipart/form-data">
				<?php
					$output = '';
					include('inc-tabs/telephones.php');
					include('inc-tabs/address.php');
					include('inc-tabs/social-network.php');
					$output .= get_submit_button();
					echo $output;
				?>
			</form>
		</div>
	</div>
</div>