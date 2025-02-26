<?php
/*
Plugin Name:	Age Calculator
Plugin URI:		http://wordpress.org/extend/plugins/age-calculator/
Description:	A quicktag that will calculate the current age of a person/animal/whatever based on it's birthdate. Supports changing the verbage for year(s) and month(s) plus has a multiplier for animals (such as "in dog years").
Version:			0.81
Author:				Josh Cook
Author URI:		http://www.joshcook.net/

License:

Copyright (c) 2017 Josh Cook

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sub-license, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NON INFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/

/**
 * Calculates the age and displays it back to the page
 */
function jc_age_f_AgeCalculator($attrs, $content=null)
{
	global $jc_age_v_Options;
	
	$jc_age_v_birthdate = $attrs['birthdate'];
	$jc_age_v_birthdate = preg_replace(array('/\./', '/\//'), '-', $jc_age_v_birthdate);
	
	if (!jc_age_f_is_date($jc_age_v_birthdate))
	{
		return '<!-- Age Calculator: Invalid Date -->';
	}
	
	$jc_age_v_text_month	= (!is_null($attrs['month']))		?	$attrs['month']		: $jc_age_v_Options['month'];
	$jc_age_v_text_months	= (!is_null($attrs['months']))	?	$attrs['months']	: $jc_age_v_Options['months'];
	$jc_age_v_text_year		= (!is_null($attrs['year']))		?	$attrs['year']		: $jc_age_v_Options['year'];
	$jc_age_v_text_years	= (!is_null($attrs['years']))		?	$attrs['years']		: $jc_age_v_Options['years'];
	
	$jc_age_v_multiplierM	= (!is_null($attrs['multiplierm']))	?	$attrs['multiplierm']	: $jc_age_v_Options['multiplierM'];
	$jc_age_v_multiplierM	= (is_numeric($jc_age_v_multiplierM))	? $jc_age_v_multiplierM 	: 1;
	
	$jc_age_v_multiplierY	= (!is_null($attrs['multipliery']))	?	$attrs['multipliery']	: $jc_age_v_Options['multiplierY'];
	$jc_age_v_multiplierY	= (is_numeric($jc_age_v_multiplierY))	? $jc_age_v_multiplierY 	: 1;
	
	list($bY,$bM,$bD) = explode("-", $jc_age_v_birthdate);
	list($cY,$cM,$cD) = explode("-", date("Y-n-d"));
	
	//Calculates Months
	if ($bY == $cY)
	{
		$months = $cM - $bM;
		
		if ($months == 0 || $months > 1)
		{
			return ($months * $jc_age_v_multiplierM) . '&nbsp;' . $jc_age_v_text_months;
		}
		else
		{
			return ($months * $jc_age_v_multiplierM) . '&nbsp;' . $jc_age_v_text_month;
		}
	}
	
	//Calculates Months if "over" a year change
	if ($cY - $bY == 1 && $cM - $bM < 12)
	{
		if ($cD - $bM > 0)
		{
			$xm = 0;
		}
		else
		{
			$xm = 1;
		}
		
		$months = 12 - $bM + $cM - $xm;
		
		if ($months == 0 || $months > 1)
		{
			return ($months * $jc_age_v_multiplierM) . '&nbsp;' . $jc_age_v_text_months;
		}
		else
		{
			return ($months * $jc_age_v_multiplierM) . '&nbsp;' . $jc_age_v_text_month;
		}
	}
	
	//Calculates Years
	$years = (date("md") < $bM.$bD ? date("Y")-$bY-1 : date("Y")-$bY );
	
	if ($years == 0 || $years > 1)
	{
		return ($years * $jc_age_v_multiplierY) . '&nbsp;' . $jc_age_v_text_years;
	}
	else
	{
		return ($years * $jc_age_v_multiplierY) . '&nbsp;' . $jc_age_v_text_year;
	}
}

/**
 * is_date function, stole from web
 */
function jc_age_f_is_date($value, $format = 'yyyy-mm-dd'){
    
	if (strlen($value) == 10 && strlen($format) == 10)
	{
		// find separator. Remove all other characters from $format
		$separator_only = str_replace(array('m','d','y'),'', $format);
		$separator = $separator_only[0]; // separator is first character
		
		if ($separator && strlen($separator_only) == 2)
		{
			// make regex
			$regexp = str_replace('mm', '[0-1][0-9]', $value);
			$regexp = str_replace('dd', '[0-3][0-9]', $value);
			$regexp = str_replace('yyyy', '[0-9]{4}', $value);
			$regexp = str_replace($separator, "\\" . $separator, $value);
			
			if($regexp != $value && preg_match('/'.$regexp.'/', $value))
			{
				// check date
				$day   = substr($value,strpos($format, 'd'),2);
				$month = substr($value,strpos($format, 'm'),2);
				$year  = substr($value,strpos($format, 'y'),4);
				
				if (@checkdate($month, $day, $year)) return true;
			}
		}
	}
	return false;
}

/**
 * Displays and processes the settings page
 */
function jc_age_f_DashboardSettings()
{
	global $jc_age_v_Options;

	if (isset($_POST['submit']))
	{
		check_admin_referer('jc_age__options'); 
		$jc_age_v_Options['year']					= $_POST['agecalc_year'];
		$jc_age_v_Options['years']				= $_POST['agecalc_years'];
		$jc_age_v_Options['month']				= $_POST['agecalc_month'];
		$jc_age_v_Options['months']				= $_POST['agecalc_months'];
		$jc_age_v_Options['multiplierY']	= $_POST['agecalc_multiplierY'];
		$jc_age_v_Options['multiplierM']	= $_POST['agecalc_multiplierM'];
		update_option('jcAgeCalculator', $jc_age_v_Options);
	}
?>
<div class="wrap">
<h2>Age Calculator</h2>
<p>
Configure the default text used when the plugin returns the current age.  All values can be overridden within the quicktag.
</p>
<form action="" method="post">
<?php wp_nonce_field('jc_age__options'); ?>
<p>
<table class="form-table">
<tr valign="top">
<th scope="row"><label for="Year (singular)">Year (singular)</label></th>
<td><input name="agecalc_year" type="text" value="<?php echo($jc_age_v_Options['year']); ?>" class="regular-text" />
<br><span class="setting-description">Christine is 1 <strong><?php echo($jc_age_v_Options['year']); ?></strong> old</span></td>
</tr>
<tr valign="top">
<th scope="row"><label for="Years (plural)">Years (plural)</label></th>
<td><input name="agecalc_years" type="text" value="<?php echo($jc_age_v_Options['years']); ?>" class="regular-text" />
<br><span class="setting-description">Ray is 4 <strong><?php echo($jc_age_v_Options['years']); ?></strong> old</span></td>
</tr>
<tr valign="top">
<th scope="row"><label for="Month (singular)">Month (singular)</label></th>
<td><input name="agecalc_month" type="text" value="<?php echo($jc_age_v_Options['month']); ?>" class="regular-text" />
<br><span class="setting-description">Christine is 1 <strong><?php echo($jc_age_v_Options['month']); ?></strong> old</span></td>
</tr>
<tr valign="top">
<th scope="row"><label for="Months (plural)">Months (plural)</label></th>
<td><input name="agecalc_months" type="text" value="<?php echo($jc_age_v_Options['months']); ?>" class="regular-text" />
<br><span class="setting-description">Ray is 9 <strong><?php echo($jc_age_v_Options['months']); ?></strong> old</span></td>
</tr>
<tr valign="top">
<th scope="row"><label for="Year Multiplier">Year Multiplier</label></th>
<td><input name="agecalc_multiplierY" type="text" value="<?php echo($jc_age_v_Options['multiplierY']); ?>" class="regular-text" />
<br><span class="setting-description">Used as the multiplier for the year value. For example, if you had a pet web site you could multiply the age by 7 for "dog years"</span></td>
</tr>
<tr valign="top">
<th scope="row"><label for="Month Multiplier">Month Multiplier</label></th>
<td><input name="agecalc_multiplierM" type="text" value="<?php echo($jc_age_v_Options['multiplierM']); ?>" class="regular-text" />
<br><span class="setting-description">Used as the multiplier for the month value</span></td>
</tr>
</table>
</p>
<p>
<p class="submit">
<input name="submit" value="Save Changes" type="submit" />
</p>
</form>
</div>
<?php
}

/**
 * Get Options
 */
function jc_age_f_GetOptions()
{
		$tmp_jc_age_v_Options = array(
		'month'		=> 'month',
		'months'	=> 'months',
		'year'		=> 'year',
		'years'		=> 'years',
		'multiplierM' => '1',
		'multiplierY' => '1'
		);
		
		$jc_age_v_Options = get_option('jcAgeCalculator');
		
		if (!empty($jc_age_v_Options))
		{
			foreach ($jc_age_v_Options as $key => $option)
			{
				$tmp_jc_age_v_Options[$key] = $option;
			}
		}
		
		update_option('jcAgeCalculator', $tmp_jc_age_v_Options);
		return $tmp_jc_age_v_Options;
}

/**
 * Adds Settings Page Link for Dashboard Links
 */
function jc_age_f_AddDashboardSettings()
{
	add_options_page('Age Calculator', 'Age Calculator', 8, basename(__FILE__), 'jc_age_f_DashboardSettings');
}

$jc_age_v_Options = jc_age_f_GetOptions();

add_shortcode('agecalc', 'jc_age_f_AgeCalculator');
add_action('admin_menu', 'jc_age_f_AddDashboardSettings');
?>