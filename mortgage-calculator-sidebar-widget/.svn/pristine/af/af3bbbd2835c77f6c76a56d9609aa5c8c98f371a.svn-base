<?php
/*
Plugin Name: Mortgage Calculator Sidebar Widget
Plugin URI: http://www.promoteseo.com/wordpress-development.php
Description: A Mortgage Calculator sidebar widget that enables your visitors to calculate their monthly payments towards their mortgage.
Version: 1.0
Author: Astral Web, Inc
Author URI: http://www.promoteseo.com/
*/

/*	
	This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
	
*/

// We're putting the plugin's functions in one big function we then
// call at 'plugins_loaded' (add_action() at bottom) to ensure the
// required Sidebar Widget functions are available.
function widget_mortgagecalculator_init() {

	// Check to see required Widget API functions are defined...
	if ( !function_exists('register_sidebar_widget') || !function_exists('register_widget_control') )
		return; // ...and if not, exit gracefully from the script.

	// This function prints the sidebar widget--the cool stuff!
	function widget_mortgagecalculator($args) {

		// $args is an array of strings which help your widget
		// conform to the active theme: before_widget, before_title,
		// after_widget, and after_title are the array keys.
		extract($args);

		// Collect our widget's options, or define their defaults.
		$options = get_option('widget_mortgagecalculator');
		$title = empty($options['title']) ? '' : $options['title'];
		$text = empty($options['text']) ? '' : $options['text'];
		$credit = empty($options['credit']) ? 'no' : $options['credit'];


 		// It's important to use the $before_widget, $before_title,
 		// $after_title and $after_widget variables in your output.
		echo $before_widget;
		echo $before_title . $title . $after_title;

echo '<script language="JavaScript">';echo "\n";
echo 'function Morgcal(){';echo "\n";
echo '	form = document.myform';echo "\n";
echo '	LoanAmount= form.LoanAmount.value';echo "\n";
echo '		';echo "\n";
echo '	DownPayment= "0"';echo "\n";
echo '	AnnualInterestRate = form.InterestRate.value/100';echo "\n";
echo '	Years= form.NumberOfYears.value';echo "\n";
echo '		MonthRate=AnnualInterestRate/12';echo "\n";
echo '	NumPayments=Years*12';echo "\n";
echo '	Prin=LoanAmount-DownPayment';echo "\n";
echo '	';echo "\n";
echo '	MonthPayment=Math.floor((Prin*MonthRate)/(1-Math.pow((1+MonthRate),(-1*NumPayments)))*100)/100';echo "\n";
echo '		form.NumberOfPayments.value=NumPayments';echo "\n";
echo '	form.MonthlyPayment.value=MonthPayment';echo "\n";
echo '}</script> ';echo "\n";
echo "\n";
echo "<style>.mortgcells td{padding-bottom:2px;padding-left:3px;padding-right:3px;}</style>\n\n";
echo '<form action="POST" name="myform">';echo "\n";
echo '<table border="0" cellpadding="2" class="mortgcells" style="background:#EEF2FD;color:#000000;font-size:12px;font-family:arial narrow;border:1px solid #3399CC;">';echo "\n";
echo '<tr><td colspan=2 align=center style="font-size:15px;height:26px;vertical-align:middle;"><b><u>Mortgage Calculator</u></b></td></tr>';echo "\n";
echo '<tr><td>Loan Amount $</td><td><input type="text" style="background:#ffffff;width:80px;height:21px;" name="LoanAmount" value="500000" onBlur="Morgcal()" onChange="Morgcal()"></td></tr>';echo "\n";
echo '<tr><td>Term of Loan (yrs)</td><td><input type="text" style="background:#ffffff;width:80px;height:21px;" name="NumberOfYears" value="30" onBlur="Morgcal()" onChange="Morgcal()"></td></tr>';echo "\n";
echo '<tr><td>Interest Rate (%)</td><td><input type="text" style="background:#ffffff;width:80px;height:21px;" name="InterestRate" value="4.5" onBlur="Morgcal()" onChange="Morgcal()"></td></tr>';echo "\n";
echo '<tr><td># of Payments</td><td><input type="text" style="background:#ffffff;width:80px;height:21px;" name="NumberOfPayments"></td></tr>';echo "\n";
echo '<tr><td>Monthly Payment $</td><td><input type="text" style="background:#ffffff;width:80px;height:21px;" name="MonthlyPayment"></td></tr>';echo "\n";
echo '<tr><td colspan=2 align=center><input type="button" style="width:132px;height:26px;background:#46A026;color:#ffffff;font-weight:bold;font-size:14px;" name="morgcal" value="Calculate" language="JavaScript" onClick="Morgcal()"></td></tr>';echo "\n";
if($credit!='no'){echo '<tr><td align=center colspan=2>powered by <a href="http://www.luxurybigisland.com/real_estate_tools.php">luxury big island</a></td></tr>';echo "\n";}
else{echo '<tr><td colspan=2>&nbsp;</td></tr>';}
echo '</table></form>';echo "\n";

		echo $text;
		echo $after_widget;
	}

	// This is the function that outputs the form to let users edit
	// the widget's title and so on. It's an optional feature, but
	// we'll use it because we can!
	function widget_mortgagecalculator_control() {

		// Collect our widget's options.
		$options = get_option('widget_mortgagecalculator');

		// This is for handing the control form submission.
		if ( $_POST['mortgagecalculator-submit'] ) {
			// Clean up control form submission options
			$newoptions['title'] = strip_tags(stripslashes($_POST['mortgagecalculator-title']));
			$newoptions['text'] = strip_tags(stripslashes($_POST['mortgagecalculator-text']));
			$newoptions['credit'] = strip_tags(stripslashes($_POST['mortgagecalculator-credit']));
			$formsubmitted=$_POST['mortgagecalculator-submit'];
		}

		// If original widget options do not match control form
		// submission options, update them.
		if ( $options != $newoptions ) {
			$options = $newoptions;
			update_option('widget_mortgagecalculator', $options);
		}

		// Format options as valid HTML. Hey, why not.
		$title = htmlspecialchars($options['title'], ENT_QUOTES);
		$text = htmlspecialchars($options['text'], ENT_QUOTES);
		$credit = htmlspecialchars($options['credit'], ENT_QUOTES);
//		$mortgagecalculator-submit = htmlspecialchars($options['mortgagecalculator-submit'], ENT_QUOTES);

// The HTML below is the control form for editing options.
?>
		<div>
		<label for="mortgagecalculator-title" style="line-height:35px;display:block;">Widget title: <input type="text" id="mortgagecalculator-title" name="mortgagecalculator-title" value="<?php echo $title; ?>" /></label>
		<label for="mortgagecalculator-text" style="line-height:35px;display:block;">Widget text: <input type="text" id="mortgagecalculator-text" name="mortgagecalculator-text" value="<?php echo $text; ?>" /></label>
		<label for="mortgagecalculator-credit" style="line-height:35px;display:block;">Give Credit to Author: <input type="checkbox" id="mortgagecalculator-credit" name="mortgagecalculator-credit" <?php if(($credit!='')||(!($formsubmitted))){echo 'checked';} ?> /></label>
		<input type="hidden" name="mortgagecalculator-submit" id="mortgagecalculator-submit" value="1" />

		</div>
	<?php
	// end of widget_mortgagecalculator_control()
	}

	// This registers the widget. About time.
	register_sidebar_widget('Mortgage Calculator', 'widget_mortgagecalculator');

	// This registers the (optional!) widget control form.
	register_widget_control('Mortgage Calculator', 'widget_mortgagecalculator_control');
}

// Delays plugin execution until Dynamic Sidebar has loaded first.
add_action('plugins_loaded', 'widget_mortgagecalculator_init');
?>