<!DOCTYPE html>
<html>
<head>
<title>Admin Settings</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>@import url('https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap');</style>

<link rel="stylesheet" type="text/css" href="https://wppluginbox.com/ICONS/icons.css"> 
<link rel="stylesheet" type="text/css" href="../CSS/css.css?v=1.4">
<link rel="stylesheet" type="text/css" href="../CSS/style.css">
<link rel="stylesheet" type="text/css" href="../CSS/button.css?v=1.1">
<link rel="stylesheet" type="text/css" href="../CSS/custom.css?v=3.1">
<link rel="stylesheet" type="text/css" href="../CSS/loader.css?v=1.4">
<link rel="stylesheet" href="../JS/tooltips/jquery-ui.css">
<link rel="stylesheet" href="../JS/tooltips/style.css">

<script type="text/javascript" src="../JS/jquery.min.js"></script>
<!-- <script type="text/javascript" src="../LIB-JS/formatters.js?v=2.4"></script> -->
<script src="../JS/tooltips/jquery-ui.js"></script>
<script type="text/javascript" src="../LIB-JS/isend.min.js"></script>


<style type="text/css">
    :root{
    --theme: #005bfd;
    --slider: var(--theme);
    --default-font:'League Spartan', sans-serif;

  }
</style>
</head>

<body>

<form action="" method="post">
<div class="main">

<div class="card">  <div> <h2 style="margin-top: 40px;">General Settings</h2>
<hr>
	<table class="admin-tb">
		
	<tbody>
		<tr>
			<td>Choose Currency</td>
			<td>
				<input type="text" class="khyzer" value="$" placeholder="Enter" name="user-currency" list="currency-s" required>
				<datalist id="currency-s">
					<option value="$">$</option>
					<option value="€">€</option>
					<option value="£">£</option>
				</datalist>
			</td>
		</tr>

		<td>Number Format</td>
			<td>
				<select class="khyzer" name="number-format">
					<option value="EU">European (i.e 1000 = 1.000)</option>
					<option value="US" selected>US (i.e 1000 = 1,000)</option>
				</select>
			</td>
		</tr>

		<tr>
			<td>Background Color</td>
			<td><input type="text" class="khyzer clr" value="#f3f9ff" name="calc-background" required> <input type="color" value="" class="d-clr"></td>
		</tr>


		<tr>
			<td>Theme Color (Sliders & Buttons)</td>
			<td><input type="text" class="khyzer clr" value="#005bfd" name="theme-clr" required> <input type="color" value="" class="d-clr"></td>
		</tr>

		
	</tbody>
	</table>
</div>
 </div>
<div style="height: 30px;"></div>
<div class="card">  <div> <h2>Input Settings</h2>
<hr>
	<table class="admin-tb">
		<thead>
		<tr>
			<td>Default Label</td>
			<td>New Label</td>
			<td>Min Value</td>
			<td>Max Value</td>
			<td>Default Value</td>

		</tr>
	</thead>

	<tbody customize-inputs="1" format-inputs="1">
		<tr>
			<td>Loan Amount</td>
			<td><input type="text" class="khyzer" name="admin-label-A3"   value="Loan Amount" required></td>
			<td><input type="text" class="khyzer" name="admin-min-val-A3" data-format="dollar" default-v="$5,000" value="$5,000" required></td>
			<td><input type="text" class="khyzer" name="admin-max-val-A3" data-format="dollar" default-v="$400,000" value="$400,000" required></td>
			<td><input type="text" class="khyzer" name="admin-def-val-A3" data-format="dollar" default-v="$200,000" value="$200,000" required></td>
		</tr>

		<tr>
			<td>Interest Rate</td>
			<td><input type="text" class="khyzer" name="admin-label-B3" value="Interest Rate" required></td>
			<td><input type="text" class="khyzer" name="admin-min-val-B3" data-format="perc" default-v="0.5%" value="0.5%" required></td>
			<td><input type="text" class="khyzer" name="admin-max-val-B3" data-format="perc" default-v="45%" value="45%" required></td>
			<td><input type="text" class="khyzer" name="admin-def-val-B3" data-format="perc" default-v="3.5%" value="3.5%" required></td>
		</tr>

		<tr>
			<td>Term in Years</td>
			<td><input type="text" class="khyzer" name="admin-label-C3" value="Term in Years" required></td>
			<td><input type="text" class="khyzer" name="admin-min-val-C3" data-format="intx" default-v="1 Yrs" value="1 Yrs" required></td>
			<td><input type="text" class="khyzer" name="admin-max-val-C3" data-format="intx" default-v="30 Yrs" value="30 Yrs" required></td>
			<td><input type="text" class="khyzer" name="admin-def-val-C3" data-format="intx" default-v="5 Yrs" value="5 Yrs" required></td>
		</tr>

<tr>
			<td>Input Label (YRS)</td>
			<td><input type="text" class="khyzer" name="yrs-label" value="YRS" required></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>


		<tr>
			<td>Result Label</td>
			<td colspan="5" style="text-align: left;">
				<input type="text" class="khyzer res-label" name="res-label-1" value="You will need to pay" required>
				XXX 
				<input type="text" class="khyzer res-label" name="res-label-2" value="every month for" required>
				X
				<input type="text" class="khyzer res-label" name="res-label-3" value="years to payoff the debt." required>

			</td>
		</tr>

	</tbody>
	</table>


<style type="text/css">
	[customize-inputs="1"] input{
       max-width: 160px!important;
	}

	input.res-label[type="text"]{
		width: 100%;
		max-width: 250px!important;
	}
</style></div>
<div> <h2 style="margin-top: 40px;">Pie Chart Settings</h2>
<hr>
	<table class="admin-tb">
		<thead>
		<tr>
			<td>Default Label</td>
			<td>New Label</td>
			<td>Color</td>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>Principal</td>
			<td><input type="text" class="khyzer" name="pie-label-principle" value="Principal" required></td>
			<td><input type="text" class="khyzer clr" name="pie-clr-principle" value="#ff0080" required> 
				<input type="color" value="" class="d-clr"></td>
		</tr>

		<tr>
			<td>Interest</td>
			<td><input type="text" class="khyzer" name="pie-label-interest" value="Interest" required></td>
			<td><input type="text" class="khyzer clr" name="pie-clr-interest" value="#ffc000" required> 
				<input type="color" value="" class="d-clr"></td>
		</tr>

		<tr>
			<td>Total Payments</td>
			<td><input type="text" class="khyzer" name="pie-label-payments" value="Total Payments" required></td>
			<td><input type="text" class="khyzer clr" name="pie-clr-payments" value="#0059fe" required> 
				<input type="color" value="" class="d-clr"></td>
		</tr>
	</tbody>
	</table></div>
<div> <h2 style="margin-top: 40px;">Line Chart Settings</h2>
<hr>
	<table class="admin-tb">
		<thead>
		<tr>
			<td>Default Label</td>
			<td>New Label</td>
			<td>Color</td>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>Balance</td>
			<td><input type="text" class="khyzer" name="line-label-balance" value="Balance" required></td>
			<td><input type="text" class="khyzer clr" name="line-clr-balance" value="#ff0080" required> 
				<input type="color" value="" class="d-clr"></td>
		</tr>

		<tr>
			<td>Interest</td>
			<td><input type="text" class="khyzer" name="line-label-interest" value="Interest" required></td>
			<td><input type="text" class="khyzer clr" name="line-clr-interest" value="#ffc000" required> 
				<input type="color" value="" class="d-clr"></td>
		</tr>

		<tr>
			<td>Payment</td>
			<td><input type="text" class="khyzer" name="line-label-payment" value="Total Payments" required></td>
			<td><input type="text" class="khyzer clr" name="line-clr-payment" value="#0059fe" required> 
				<input type="color" value="" class="d-clr"></td>
		</tr>
	</tbody>
	</table></div>
<div> <h2 style="margin-top: 40px;">Amortization Table Settings</h2>
<hr>
	<table class="admin-tb">
		<thead>
		<tr>
			<td>Default Settings</td>
			<td>Custom Setting</td>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>Set Labels</td>
			<td><textarea class="khyzer" name="table-labels" required>Month |	Starting Balance |	You Paid |	Interest |	Principal |	Ending Balance |	Total Interest</textarea></td>
		</tr>

		<tr>
			<td>Background Color</td>
			<td><input type="text" class="khyzer clr" name="table-head-clr" value="#ff0080" required> <input type="color" value="" class="d-clr"></td>
		</tr>

		
	</tbody>
	</table>


</div>
<div> <h2 style="margin-top: 40px;">Other Settings</h2>
<hr>
	<table class="admin-tb">
		<thead>
		<tr>
			<td>Default Settings</td>
			<td>Custom Setting</td>
		</tr>
	</thead>

	<tbody>

		<tr>
			<td>Calculate Button Label</td>
			<td><input type="text" class="khyzer clr" name="calc-btn-txt" value="Calculate" required></td>
		</tr>

		<tr>
			<td>Amortization Button Label</td>
			<td><input type="text" class="khyzer clr" name="amortize-btn-txt" value="View Amortization schedule" required></td>
		</tr>

		<tr>
			<td>Calculator Font Color</td>
			<td><input type="text" class="khyzer clr" name="font-clr" value="black" required> <input type="color" value="" class="d-clr"></td>
		</tr>

		
	</tbody>
	</table>


</div>







<style type="text/css">
	.admin-tb{
		width: 100%;
		text-align: center;
		    table-layout: fixed;
/*		margin-top: 20px;*/
	}

	.admin-tb thead td{
		background-color: black;
		color: white;
		padding: 8px;
	}

	input.khyzer[type="text"],textarea{
		background-color: white;
		border:1px solid black;
	}

	input.clr[type="text"]{
		width: 195px;
		border:1px solid black;
	}

	select {
    background: transparent;
    border: 1px solid #141313;
    font-size: 16px;
}

</style>

<style type="text/css">
	textarea.khyzer {
    max-width: 300px;
    height: 74px;
}
</style>

<script type="text/javascript">
	$(document).on('change', '.clr', function() {
		var clr = $(this).val();
		$(this).closest('td').find('.d-clr').val(clr);
  

});


$(document).on('change', '.d-clr', function() {
		var clr = $(this).val();
		$(this).closest('td').find('.clr').val(clr);
  

});


	$('.clr').trigger('change');
</script> </div>

</div>


<div style="text-align: center;"></div>
<div style="height:40px;"></div>
<div> <center> <button type="button" onclick="alert('These Settings are only available in pro version.')" class="btn">Save Settings (Go Pro) <i class="fas fa-bookmark"></i></button> </center> </div>

</form>



<style type="text/css">
  .card{
    padding: 20px;
  }

  .btn {
    
    padding: 10px 21px;
    width: 300px;
}
</style>

<script type="text/javascript">
  function send_alert(msg){
    alert(msg);
  }
</script>



<div style="height: 50px;"></div>


</body>
</html>