<div id="wp_alc">
    	<form name='autoloandata'>
	    <br />
	    <strong>Please pick one:</strong>
	    <br />
	    <input id='used_radio_button' name='switcher' type='radio' value='on' onclick='toggleLayer(this.checked);' /><strong>Used car loan</strong>
	    <br />
	    <input id='new_radio_button' name='switcher' type='radio' value='off' onclick='toggleLayer(!this.checked);' /><strong>New car loan</strong>
	    <br />
	    <br />
	    </form>
	    
   		<div id='used_auto_loan'>
   			<form>
   					<div class='float'><strong>Purchase <br />price:</strong></div> <div class='floatR'>$<input type='text' name='purchase_price' id='alc_used_purchase_price' size='10' onchange='Calculate_used()'/></div>
   		 			<br />
	     			<br />
	     			<br />
	    			<div class='float'><strong>Down <br />payment:</strong></div> <div class='floatR'>$<input type='text' name='down_payment' id='alc_used_down_payment' size='10'onchange='Calculate_used()'/></div>
	     			<br />
	     			<br />
	     			<br />
	    			Used auto loan averages: <?php echo $used_rate; ?> percent, 36-month or insert your interest rate and choose your months.
	     			<br />
	    			<div class='float'><strong>Interest <br />rate:</strong></div><div class='floatR'><input type='text' name='alc_used_interest' id='alc_used_interest' value="<?php echo $used_rate; ?>" size='10'onchange='Calculate_used()'/>%</div>
	     			<br />
	     			<br /> 
	     			<br />  
	    			<div class='float'><strong>Loan <br />length <br />(months):</strong></div><div class='floatR'><select name='months' id='alc_used_months' onchange='Calculate_used()'>
	    				<option value='24' >24 months</option>
	    				<option value='36' selected='selected'>36 months</option>
	    				<option value='48' >48 months</option>
	    				<option value='60' >60 months</option>
	    				<option value='72'>72 months</option>
	    				</select></div> 
	     			<br />
	     			<br />
   		 			<br />
	     			<br />
	    			<div class='style1'><input type='button' value='Calculate' id='alc_used_button' onclick='Validate_used()'></div>
	     			<br />
	    			<div class='style1'><h3>Your approximate monthly payment:</h3></div>
	    			<div class='style1'>$<input type='text' name='monthlyPayment' id='alc_used_monthlyPayment' /></div>
 					<br />
    				<h3 class='style1'>Get your own <br /><a title='Get Your Own Auto Loan Calculator' href='http://www.cardealexpert.com/gadgets-and-widgets/auto-loan-calculator-widgets/'>Auto Loan Calculator</a></h3>
	    		</form> 
	    	</div>
	        
	    	<div id='new_auto_loan'>
   				<form>
   	    			<div class='float'><strong>Purchase <br />price:</strong> </div><div class='floatR'>$<input type='text' name='purchase_price' id='alc_new_purchase_price' size='10'onchange='Calculate_new()'/></div>
   		 			<br />
	     			<br />
	     			<br />
	    			<div class='float'><strong>Down <br />payment:</strong></div> <div class='floatR'>$<input type='text' name='down_payment' id='alc_new_down_payment' size='10'onchange='Calculate_new()'/></div>
   		 			<br />
	     			<br />
   		 			<br />
   	    			New auto loan averages: <?php echo $new_rate; ?> percent, 60-month or insert your interest rate and choose your months.
	     			<br />
	    			<div class='float'><strong>Interest <br />rate:</strong></div><div class='floatR'><input type='text' name='alc_new_interest' id='alc_new_interest' size='10' value="<?php echo $new_rate; ?>" onchange='Calculate_new()'/>%</div>    
   		 			<br />
	     			<br />
	     			<br />
	    			<div class='float'><strong>Loan <br />length <br />(months):</strong></div>    
	    			<div class='floatR'><select name='months' id='alc_new_months' onchange='Calculate_new()'>
	    				<option value='24' >24 months</option>
	    				<option value='36' >36 months</option>
	    				<option value='48' >48 months</option>
	    				<option value='60' selected='selected'>60 months</option>
	    				<option value='72'>72 months</option>
	    			</select></div> 	
   		 			<br />
	     			<br />
	     			<br />
	     			<br />
	    			<div class='style1'><input type='button' value='Calculate' id='alc_button' onclick='Validate_new()'></div>
	     			<br />
	    			<div class='style1'><h3>Your approximate monthly payment:</h3></div>
	    			<div class='style1'>$<input type='text' name='monthlyPayment' id='alc_new_monthlyPayment' /></div>
 					<br />
	   				<h3 class='style1'>Get your own <br /><a title='Get Your Own Auto Loan Calculator' href='http://www.cardealexpert.com/gadgets-and-widgets/auto-loan-calculator-widgets/'>Auto Loan Calculator</a></h3>
	    		</form> 
	    	</div>	
</div>