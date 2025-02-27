<?php
/**
 * Plugin Name: Terms of Service & Privacy Policy Generator
 * Plugin URI: http://www.wishloop.com
 * Description: Terms of Service & Privacy Policy Generator By Wishloop
 * Version: 1.0
 * Author: WishLoop
 * Author URI: http://www.wishloop.com
 * License:     GPL v2 or later

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

 */


add_action( 'admin_menu', 'wl_tos_menu' );
add_action( 'admin_init', 'wl_tos_register_options');

// registering wl_tos options
function wl_tos_register_options() {
	register_setting('wl_tos_options', 'wl_tos_tos_heading' );
	register_setting('wl_tos_options', 'wl_tos_pp_heading' );
	register_setting('wl_tos_options', 'wl_tos_name' );
	register_setting('wl_tos_options', 'wl_tos_full_name' );
	register_setting('wl_tos_options', 'wl_tos_possessive_name' );
	register_setting('wl_tos_options', 'wl_tos_domain_name' );
	register_setting('wl_tos_options', 'wl_tos_official_site' );
	register_setting('wl_tos_options', 'wl_tos_min_age' );
	register_setting('wl_tos_options', 'wl_tos_time_period_change' );
	register_setting('wl_tos_options', 'wl_tos_time_period_reply' );
	register_setting('wl_tos_options', 'wl_tos_time_period_damage' );
	register_setting('wl_tos_options', 'wl_tos_time_dcma_url' );
	register_setting('wl_tos_options', 'wl_tos_venue' );
	register_setting('wl_tos_options', 'wl_tos_court' );
	register_setting('wl_tos_options', 'wl_tos_arbit' );
}

// admin menu
function wl_tos_menu() {
	add_options_page( 'Terms of Service & Privacy Policy Generator Settings', 'TOS Generator', 'manage_options', 'wl_tos-wp', 'wl_tos_options' );
}

// wl_tos options page
function wl_tos_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	// condition : eq (equals), gt(greater than), lt(less than), df(different de)
	// pre_callback : func to execute on value bfr going any further
	// choices : array of values / first = default
	// type : text, text_simple, text_licensekey, text_licensestatut, single_checkbox, radio, dropdown , textarea
	$lippsi_options =  array(
		'settings' => array(
			'label'=> 'Settings',
			'desc'=> 'After updating the information, you can use the following shortcodes <b>[wl_tos]</b> to output the Terms Of Service text and <b>[wl_privacypolicy]</b> to display the Privacy Policy text',
			'fields' => array(
				array(
					'type'	 	=> 'text',
					'name' 		=> 'wl_tos_tos_heading',
					'value'     => 'Terms of Service',
					'label'		=> 'TOS Heading',
					'desc'      => 'e.g Terms of Service'
				),

				array(
					'type'	 	=> 'text',
					'name' 		=> 'wl_tos_pp_heading',
					'value'     => 'Privacy Policy',
					'label'		=> 'Privacy Policy Heading',
					'desc'      => 'e.g Privacy Policy'
				),

				array(
					'type'	 	=> 'text',
					'name' 		=> 'wl_tos_name',
					'value'     => 'Wishloop',
					'label'		=> 'Name',
					'desc'      => 'e.g Wishloop'
				),

				array(
					'type'	 	=> 'text',
					'name' 		=> 'wl_tos_full_name',
					'value'     => 'Wishloop Ltd',
					'label'		=> 'Full Name',
					'desc'      => 'e.g Wishloop Ltd'
				),


				array(
					'type'	 	=> 'text',
					'name' 		=> 'wl_tos_possessive_name',
					'value'     => 'Wishloop\'s',
					'label'		=> 'Possessive Name',
					'desc'      => 'e.g Wishloop\'s'
				),

				array(
					'type'	 	=> 'text',
					'name' 		=> 'wl_tos_domain_name',
					'value'     => 'wishloop.com',
					'label'		=> 'Domain Name',
					'desc'      => 'e.g wishloop.com'
				),

				array(
					'type'	 	=> 'text',
					'name' 		=> 'wl_tos_official_site',
					'value'     => 'http://wishloop.com',
					'label'		=> 'Official Website URL',
					'desc'      => 'e.g wishloop.com'
				),

				array(
					'type'	 	=> 'number',
					'name' 		=> 'wl_tos_min_age',
					'value'     => '13',
					'label'		=> 'Minimum Age',
					'desc'      => 'e.g 12'
				),

				array(
					'type'	 	=> 'text',
					'name' 		=> 'wl_tos_time_period_change',
					'value'     => 'thirty (30) days',
					'label'		=> 'Time Period for changing fees and for notifications',
					'desc'      => 'e.g thirty (30) days'
				),

				array(
					'type'	 	=> 'text',
					'name' 		=> 'wl_tos_time_period_reply',
					'value'     => 'one business day',
					'label'		=> 'Time Period for replying to priority email',
					'desc'      => 'e.g 12'
				),

				array(
					'type'	 	=> 'text',
					'name' 		=> 'wl_tos_time_period_damage',
					'value'     => 'twelve (12) month',
					'label'		=> 'Time Period for determining maximum damages',
					'desc'      => 'e.g 12'
				),

				array(
					'type'	 	=> 'text',
					'name' 		=> 'wl_tos_time_dcma_url',
					'value'     => '',
					'label'		=> 'DCMA Notice URL',
					'desc'      => 'e.g http://yoursite.com/dcma'
				),

				array(
					'type'	 	=> 'text',
					'name' 		=> 'wl_tos_venue',
					'value'     => 'State of California, U.S.A',
					'label'		=> 'Venue',
					'desc'      => 'e.g State of California, U.S.A'
				),

				array(
					'type'	 	=> 'text',
					'name' 		=> 'wl_tos_court',
					'value'     => 'San Francisco County, California',
					'label'		=> 'Court Location',
					'desc'      => 'e.g San Francisco County, California'
				),
			),

			array(
					'type'	 	=> 'text',
					'name' 		=> 'wl_tos_arbit',
					'value'     => 'San Francisco, California',
					'label'		=> 'Arbitration Location',
					'desc'      => 'e.g San Francisco, California'
				),

			array(
					'type'	 	=> 'text',
					'name' 		=> 'wl_tos_arbit',
					'value'     => 'San Francisco, California',
					'label'		=> 'Arbitration Location',
					'desc'      => 'e.g San Francisco, California'
				),
			),

	);
	?>
	<div class="wrap">
		<h2 class="nav-tab-wrapper">
			<?php
			$active = key($lippsi_options);
			// $status = base64_decode( get_option( 'widget_api_endpoint' ));

			foreach ($lippsi_options as $tab_id => $tab_content) {
				if($active == $tab_id)
					$active_class = 'nav-tab-active';
				else
					$active_class = '';

				?>
				<a href="#"
				   id="<?php echo $tab_id; ?>"
				   class="nav-tab <?php echo $active_class; ?>"><?php echo $tab_content['label']; ?></a>
			<?php
			}
			?>
		</h2>
		<form method="post" action="options.php">
			<?php
			settings_fields('wl_tos_options');
			// Printing tabs contents
			foreach ($lippsi_options as $tab_id => $tab_content)
			{
				if ($tab_id == $active)
					$display = "display:block;";
				else
					$display = "display:none;";

				?>
				<div class="tab-content <?php echo $tab_id; ?>" style="<?php echo $display; ?>">
					<div class="manage-menus"> <?php echo $tab_content['desc']; ?>	</div>
					<table class="form-table">
						<tbody>
						<?php
						foreach ($tab_content['fields'] as $field)
						{
							wl_tos_render_setting_field($field);
						}
						?>
						</tbody>
					</table>
				</div>
			<?php
			} // END FOREACH
			?>

			<?php
			submit_button();
			?>
		</form>

	</div>
<?php
}

// rendering the options page fields
function wl_tos_render_setting_field($data)
{
	//$status 	= base64_decode(get_option( 'widget_api_endpoint' )); // status=widget_api_endpoint

	$bfr_label = '<tr valign="top">
					<th scope="row" valign="top">';
	$aftr_label = '</th>
					<td>';
	$aftr_field = '</td>
					</tr>';

	// eq (equals), gt(greater than), lt(less than), df(different de)
	if (isset($data['condition']))
	{
		$condition = explode(':', $data['condition']);
		$id_to_compare = $condition[0];

		$operator = substr($condition[1], 0, 2);
		$value    = str_replace($operator, '', $condition[1]);
		$value    = str_replace('(', '', $value);
		$value    = str_replace(')', '', $value);

		$attrs = 'data-condition="true" data-id_to_compare="'.$id_to_compare.'" data-operator="'.$operator.'" data-value="'.$value.'"';
	}
	else
		$attrs = '';

	// the label
	?>
	<tr valign="top">
		<th scope="row" valign="top">
			<label for="<?php echo $data['name']; ?>"><?php _e($data['label']); ?></label>
		</th>
		<td>
			<?php
			// the field
			$stored_value = esc_attr(get_option($data['name'], @$data['value'] ) );

			// Check if there is a function to execute before showing the value
			if (isset($data['pre_callback']))
			{
				$stored_value = call_user_func($data['pre_callback'], $stored_value);
			}

			switch ($data['type']) {

				case 'text_simple':
					echo '<p '.$attrs.' >'.$data['value'].'</p>';
					break;

				case 'text_licensestatut':
					if (@$status == 'valid')
						echo('<span style="color:green">'.__('Activated').'</span>');
					else if (@$status == 'invalid' || @$status == 'missing' || @$status == 'deactivated' || $status == 'invalid')
						echo ('<span style="color:red">'.__('Deactivated').'</span>');
					else if (@$status == 'expired')
						echo ('<span style="color:red">'.__('Expired. Please Renew to receive security patchs, features updates & technical support.').'</span>');
					else if (@$status == 'revoked' || @$status == 'disabled')
						echo ('<span style="color:red">Revoked. Please contact the support to know why.</span>');
					else if (@$status == 'no_activations_left')
						echo ('<span style="color:red">No Activations Left. You are trying to activate this license more than allowed.</span>');
					else
						echo ('<span style="color:red">No statut.</div>');
					break;

				case 'text':
					echo '<input '.$attrs.' id="'.$data['name'].'" name="'.$data['name'].'" type="text" class="regular-text" value="'.$stored_value.'" />';
					break;

				case 'number':
					echo '<input '.$attrs.' id="'.$data['name'].'" name="'.$data['name'].'" type="number" class="regular-text" value="'.$stored_value.'" />';
					break;

				case 'divider':
					echo '<hr style="margin-top:10px"/>';
					break;

				case 'text_licensekey':

					$status   = base64_decode( get_option( 'widget_api_endpoint' ));

					echo '<input '.$attrs.' id="'.$data['name'].'" name="'.$data['name'].'" type="text" class="regular-text" value="'.$stored_value.'" /> &nbsp;';

					if( $status !== false && ($status == 'valid' || $status == 'expired'))
					{
						echo '<input type="submit" name="deactivate_license" class="button button-secondary" value="'.__('Deactivate').'"/>';
					}
					else
					{
						echo '<input type="submit" name="activate_license" class="button button-secondary" value="'.__('Activate').'"/>';
					}
					break;

				case 'single_checkbox':
					if ($stored_value == key($data['choices']))
					{
						$checked = "checked='checked'";
					}
					else
					{
						$checked = "";
					}

					echo ' <input '.$attrs.' id="'.$data['name'].'" name="'.$data['name'].'" type="checkbox" value="'.key($data['choices']).'"  '.$checked.'/> <label for="'.$data['name'].'">'.$data['choices'][key($data['choices'])].'</label>';
					break;

				case 'radio':
					foreach ($data['choices'] as $key => $value)
					{
						if ($key == $stored_value )
							$checked = 'checked="checked"';
						else
							$checked = '';

						echo '<input '.$attrs.' type="radio" id="'.$data['name'].'_'.$key.'" name="'.$data['name'].'" value="'.$key.'" '.$checked.'/> <label for="'.$data['name'].'_'.$key.'">'.$value.'</label> &nbsp; ';
					}
					break;

				case 'textarea':
					echo "<textarea ".$attrs." name='".$data["name"]."' id='".$data["name"]."' rows=6 cols=40 class='".$data["name"]." form-control'>".$stored_value."</textarea>";
					break;

				case 'dropdown':
					echo '<select '.$attrs.' name="'.$data['name'].'" id="'.$data['name'].'">';
					foreach ($data['choices'] as $key => $value)
					{
						if ($key == $stored_value )
							$checked = 'selected="selected"';
						else
							$checked = '';

						echo ' <option id="'.$data['name'].'_'.$key.'" name="'.$data['name'].'" value="'.$key.'" '.$checked.'/> '.$value.'  </option> ';
					}
					echo '</select>';
					break;
			}
			// the description
			?>
			<br/><p class="description"><?php _e(@$data['desc']); ?></p>
		</td>
	</tr>
<?php
}


function wl_tos_tos_shortcode() {
	$wl_tos_op_termsheading                                 = get_option('wl_tos_tos_heading');
	$wl_tos_op_privacypolicyheading                         = get_option('wl_tos_pp_heading');
	$wl_tos_op_biznamefull                                  = get_option('wl_tos_full_name');;
	$wl_tos_op_bizname                                      = get_option('wl_tos_name');
	$wl_tos_op_biznamepossessive                            = get_option('wl_tos_possessive_name');
	$wl_tos_op_domainname                                   = get_option('wl_tos_domain_name');
	$wl_tos_op_websiteurl                                   = get_option('wl_tos_official_site');
	$wl_tos_op_minimumage                                   = get_option('wl_tos_min_age');
	$wl_tos_op_timeperiodforchangingfeesandfornotifications = get_option('wl_tos_time_period_change');
	$wl_tos_op_timeperiodtoreplytopriorityemail             = get_option('wl_tos_time_period_reply');
	$wl_tos_op_timeperiodfordeterminingmaximumdamages       = get_option('wl_tos_time_period_damage');
	$wl_tos_op_dmcanoticeurl                                = get_option('wl_tos_time_dcma_url');
	if ( ! empty( $wl_tos_op_dmcanoticeurl ) ) {
		$wl_tos_op_dmcaoutput = "$wl_tos_op_bizname in accordance with <a href=\"$wl_tos_op_dmcanoticeurl\">$wl_tos_op_biznamepossessive Digital Millennium Copyright Act (&quot;DMCA&quot;) Policy</a>";
	} else {
		$wl_tos_op_dmcaoutput = "$wl_tos_op_bizname in accordance with $wl_tos_op_biznamepossessive Digital Millennium Copyright Act (&quot;DMCA&quot;) Policy";
	}
	$wl_tos_op_venue               = get_option('wl_tos_venue');
	$wl_tos_op_courtlocation       = get_option('wl_tos_court');
	$wl_tos_op_arbitrationlocation = get_option('wl_tos_arbit');
	$wl_tos_op_tcond               = '';
	$wl_tos_op_tcond .= "<h2 id='atospp-terms' class='auto-tos-pp tosheading'>$wl_tos_op_termsheading:</h2>";
	$wl_tos_op_tcond .= "<p>The following terms and conditions govern all use of the $wl_tos_op_domainname website and all content, services and products available at or through the website (taken together, the Website). The Website is owned and operated by $wl_tos_op_biznamefull (&quot;$wl_tos_op_bizname&quot;). The Website is offered subject to your acceptance without modification of all of the terms and conditions contained herein and all other operating rules, policies (including, without limitation, $wl_tos_op_biznamepossessive $wl_tos_op_privacypolicyheading) and procedures that may be published from time to time on this Site by $wl_tos_op_bizname (collectively, the &quot;Agreement&quot;).</p>
<p>Please read this Agreement carefully before accessing or using the Website. By accessing or using any part of the web site, you agree to become bound by the terms and conditions of this agreement. If you do not agree to all the terms and conditions of this agreement, then you may not access the Website or use any services. If these terms and conditions are considered an offer by $wl_tos_op_bizname, acceptance is expressly limited to these terms. The Website is available only to individuals who are at least $wl_tos_op_minimumage years old.</p>
<ol>
<li><strong>Your $wl_tos_op_domainname Account and Site.</strong> If you create a blog/site on the Website, you are responsible for maintaining the security of your account and blog, and you are fully responsible for all activities that occur under the account and any other actions taken in connection with the blog. You must not describe or assign keywords to your blog in a misleading or unlawful manner, including in a manner intended to trade on the name or reputation of others, and $wl_tos_op_bizname may change or remove any description or keyword that it considers inappropriate or unlawful, or otherwise likely to cause $wl_tos_op_bizname liability. You must immediately notify $wl_tos_op_bizname of any unauthorized uses of your blog, your account or any other breaches of security. $wl_tos_op_bizname will not be liable for any acts or omissions by You, including any damages of any kind incurred as a result of such acts or omissions.</li>
<li><strong>Responsibility of Contributors.</strong> If you operate a blog, comment on a blog, post material to the Website, post links on the Website, or otherwise make (or allow any third party to make) material available by means of the Website (any such material, &quot;Content&quot;), You are entirely responsible for the content of, and any harm resulting from, that Content. That is the case regardless of whether the Content in question constitutes text, graphics, an audio file, or computer software. By making Content available, you represent and warrant that:
  <ul>
<li>the downloading, copying and use of the Content will not infringe the proprietary rights, including but not limited to the copyright, patent, trademark or trade secret rights, of any third party;</li>
<li>if your employer has rights to intellectual property you create, you have either (i) received permission from your employer to post or make available the Content, including but not limited to any software, or (ii) secured from your employer a waiver as to all rights in or to the Content;</li>
<li>you have fully complied with any third-party licenses relating to the Content, and have done all things necessary to successfully pass through to end users any required terms;</li>
<li>the Content does not contain or install any viruses, worms, malware, Trojan horses or other harmful or destructive content;</li>
<li class='important'>the Content is not spam, is not machine- or randomly-generated, and does not contain unethical or unwanted commercial content designed to drive traffic to third party sites or boost the search engine rankings of third party sites, or to further unlawful acts (such as phishing) or mislead recipients as to the source of the material (such as spoofing);</li>
<li>the Content is not pornographic, does not contain threats or incite violence towards individuals or entities, and does not violate the privacy or publicity rights of any third party;</li>
<li>your blog is not getting advertised via unwanted electronic messages such as spam links on newsgroups, email lists, other blogs and web sites, and similar unsolicited promotional methods;</li>
<li>your blog is not named in a manner that misleads your readers into thinking that you are another person or company. For example, your blog's URL or name is not the name of a person other than yourself or company other than your own; and</li>
<li>you have, in the case of Content that includes computer code, accurately categorized and/or described the type, nature, uses and effects of the materials, whether requested to do so by $wl_tos_op_bizname or otherwise.</li>
</ul>
<p>By submitting Content to $wl_tos_op_bizname for inclusion on your Website, you grant $wl_tos_op_bizname a world-wide, royalty-free, and non-exclusive license to reproduce, modify, adapt and publish the Content solely for the purpose of displaying, distributing and promoting your blog. If you delete Content, $wl_tos_op_bizname will use reasonable efforts to remove it from the Website, but you acknowledge that caching or references to the Content may not be made immediately unavailable.</p>
<p>Without limiting any of those representations or warranties, $wl_tos_op_bizname has the right (though not the obligation) to, in $wl_tos_op_biznamepossessive sole discretion (i) refuse or remove any content that, in $wl_tos_op_biznamepossessive reasonable opinion, violates any $wl_tos_op_bizname policy or is in any way harmful or objectionable, or (ii) terminate or deny access to and use of the Website to any individual or entity for any reason, in $wl_tos_op_biznamepossessive sole discretion. $wl_tos_op_bizname will have no obligation to provide a refund of any amounts previously paid.</li>
<li><strong>Payment and Renewal.</strong>
<ul>
<li><strong>General Terms.</strong><br>
  By selecting a product or service, you agree to pay $wl_tos_op_bizname the one-time and/or monthly or annual subscription fees indicated  (additional payment terms may be included in other communications). Subscription payments will be charged on a pre-pay basis on the day you sign up for an Upgrade and will cover the use of that service for a monthly or annual subscription period as indicated. Payments are not refundable.</li>
<li><strong>Automatic Renewal. </strong><br>
Unless you notify $wl_tos_op_bizname before the end of the applicable subscription period that you want to cancel a subscription, your  subscription will automatically renew and you authorize us to collect the then-applicable annual or monthly subscription fee for such subscription (as well as any taxes) using any credit card or other payment mechanism we have on record for you. Upgrades can be canceled at any time by submitting your request to $wl_tos_op_bizname in writing.</li>
</ul>
</li>
<li><strong>Services.</strong>
<ul>
<li><strong>Fees; Payment. </strong>By signing up for a Services account you agree to pay $wl_tos_op_bizname the applicable setup fees and recurring fees. Applicable fees will be invoiced starting from the day your services are established and in advance of using such services. $wl_tos_op_bizname reserves the right to change the payment terms and fees upon $wl_tos_op_timeperiodforchangingfeesandfornotifications prior written notice to you. Services can be canceled by you at anytime on $wl_tos_op_timeperiodforchangingfeesandfornotifications written notice to $wl_tos_op_bizname.</li>
<li><strong>Support.</strong> If your service includes access to priority email support. &quot;Email support&quot; means the ability to make requests for technical support assistance by email at any time (with reasonable efforts by $wl_tos_op_bizname to respond within $wl_tos_op_timeperiodtoreplytopriorityemail) concerning the use of the VIP Services. &quot;Priority&quot; means that support takes priority over support for users of the standard or free $wl_tos_op_domainname services. All support will be provided in accordance with $wl_tos_op_bizname standard services practices, procedures and policies.</li>
</ul>
<li><strong>Responsibility of Website Visitors.</strong> $wl_tos_op_bizname has not reviewed, and cannot review, all of the material, including computer software, posted to the Website, and cannot therefore be responsible for that material's content, use or effects. By operating the Website, $wl_tos_op_bizname does not represent or imply that it endorses the material there posted, or that it believes such material to be accurate, useful or non-harmful. You are responsible for taking precautions as necessary to protect yourself and your computer systems from viruses, worms, Trojan horses, and other harmful or destructive content. The Website may contain content that is offensive, indecent, or otherwise objectionable, as well as content containing technical inaccuracies, typographical mistakes, and other errors. The Website may also contain material that violates the privacy or publicity rights, or infringes the intellectual property and other proprietary rights, of third parties, or the downloading, copying or use of which is subject to additional terms and conditions, stated or unstated. $wl_tos_op_bizname disclaims any responsibility for any harm resulting from the use by visitors of the Website, or from any downloading by those visitors of content there posted.</li>
<li><strong>Content Posted on Other Websites.</strong> We have not reviewed, and cannot review, all of the material, including computer software, made available through the websites and webpages to which $wl_tos_op_domainname links, and that link to $wl_tos_op_domainname. $wl_tos_op_bizname does not have any control over those non-$wl_tos_op_bizname websites and webpages, and is not responsible for their contents or their use. By linking to a non-$wl_tos_op_bizname website or webpage, $wl_tos_op_bizname does not represent or imply that it endorses such website or webpage. You are responsible for taking precautions as necessary to protect yourself and your computer systems from viruses, worms, Trojan horses, and other harmful or destructive content. $wl_tos_op_bizname disclaims any responsibility for any harm resulting from your use of non-$wl_tos_op_bizname websites and webpages.</li>
<li><strong>Copyright Infringement and DMCA Policy.</strong> As $wl_tos_op_bizname asks others to respect its intellectual property rights, it respects the intellectual property rights of others. If you believe that material located on or linked to by $wl_tos_op_domainname violates your copyright, you are encouraged to notify $wl_tos_op_dmcaoutput. $wl_tos_op_bizname will respond to all such notices, including as required or appropriate by removing the infringing material or disabling all links to the infringing material. $wl_tos_op_bizname will terminate a visitor's access to and use of the Website if, under appropriate circumstances, the visitor is determined to be a repeat infringer of the copyrights or other intellectual property rights of $wl_tos_op_bizname or others. In the case of such termination, $wl_tos_op_bizname will have no obligation to provide a refund of any amounts previously paid to $wl_tos_op_bizname.</li>
<li><strong>Intellectual Property.</strong> This Agreement does not transfer from $wl_tos_op_bizname to you any $wl_tos_op_bizname or third party intellectual property, and all right, title and interest in and to such property will remain (as between the parties) solely with $wl_tos_op_bizname. $wl_tos_op_bizname, $wl_tos_op_domainname, the $wl_tos_op_domainname logo, and all other trademarks, service marks, graphics and logos used in connection with $wl_tos_op_domainname, or the Website are trademarks or registered trademarks of $wl_tos_op_bizname or $wl_tos_op_biznamepossessive licensors. Other trademarks, service marks, graphics and logos used in connection with the Website may be the trademarks of other third parties. Your use of the Website grants you no right or license to reproduce or otherwise use any $wl_tos_op_bizname or third-party trademarks.</li>
<li><strong>Advertisements.</strong> $wl_tos_op_bizname reserves the right to display advertisements on your blog unless you have purchased an ad-free account.</li>
<li><strong>Attribution.</strong> $wl_tos_op_bizname reserves the right to display attribution links such as 'Blog at $wl_tos_op_domainname,' theme author, and font attribution in your blog footer or toolbar.</li>
<li><strong>Partner Products.</strong> By activating a partner product (e.g. theme) from one of our partners, you agree to that partner's terms of service. You can opt out of their terms of service at any time by de-activating the partner product.</li>
<li><strong>Domain Names.</strong> If you are registering a domain name, using or transferring a previously registered domain name, you acknowledge and agree that use of the domain name is also subject to the policies of the Internet Corporation for Assigned Names and Numbers (&quot;ICANN&quot;), including their <a href=\"http://www.icann.org/en/registrars/registrant-rights-responsibilities-en.htm\">Registration Rights and Responsibilities</a>.</li>
<li><strong>Changes. </strong>$wl_tos_op_bizname reserves the right, at its sole discretion, to modify or replace any part of this Agreement. It is your responsibility to check this Agreement periodically for changes. Your continued use of or access to the Website following the posting of any changes to this Agreement constitutes acceptance of those changes. $wl_tos_op_bizname may also, in the future, offer new services and/or features through the Website (including, the release of new tools and resources). Such new features and/or services shall be subject to the terms and conditions of this Agreement. <strong><br>
</strong></li>
<li><strong>Termination. </strong>$wl_tos_op_bizname may terminate your access to all or any part of the Website at any time, with or without cause, with or without notice, effective immediately. If you wish to terminate this Agreement or your $wl_tos_op_domainname account (if you have one), you may simply discontinue using the Website. Notwithstanding the foregoing, if you have a paid services account, such account can only be terminated by $wl_tos_op_bizname if you materially breach this Agreement and fail to cure such breach within $wl_tos_op_timeperiodforchangingfeesandfornotifications from $wl_tos_op_biznamepossessive notice to you thereof; provided that, $wl_tos_op_bizname can terminate the Website immediately as part of a general shut down of our service. All provisions of this Agreement which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability. <strong><br>
</strong></li>
<li class='important'><strong>Disclaimer of Warranties.</strong> The Website is provided &quot;as is&quot;. $wl_tos_op_bizname and its suppliers and licensors hereby disclaim all warranties of any kind, express or implied, including, without limitation, the warranties of merchantability, fitness for a particular purpose and non-infringement. Neither $wl_tos_op_bizname nor its suppliers and licensors, makes any warranty that the Website will be error free or that access thereto will be continuous or uninterrupted. You understand that you download from, or otherwise obtain content or services through, the Website at your own discretion and risk.</li>
<li class='important'><strong>Limitation of Liability.</strong> In no event will $wl_tos_op_bizname, or its suppliers or licensors, be liable with respect to any subject matter of this agreement under any contract, negligence, strict liability or other legal or equitable theory for: (i) any special, incidental or consequential damages; (ii) the cost of procurement for substitute products or services; (iii) for interruption of use or loss or corruption of data; or (iv) for any amounts that exceed the fees paid by you to $wl_tos_op_bizname under this agreement during the $wl_tos_op_timeperiodfordeterminingmaximumdamages period prior to the cause of action. $wl_tos_op_bizname shall have no liability for any failure or delay due to matters beyond their reasonable control. The foregoing shall not apply to the extent prohibited by applicable law.</li>
<li><strong>General Representation and Warranty.</strong> You represent and warrant that (i) your use of the Website will be in strict accordance with the $wl_tos_op_bizname $wl_tos_op_privacypolicyheading, with this Agreement and with all applicable laws and regulations (including without limitation any local laws or regulations in your country, state, city, or other governmental area, regarding online conduct and acceptable content, and including all applicable laws regarding the transmission of technical data exported from the United States or the country in which you reside) and (ii) your use of the Website will not infringe or misappropriate the intellectual property rights of any third party.</li>
<li><strong>Indemnification.</strong> You agree to indemnify and hold harmless $wl_tos_op_bizname, its contractors, and its licensors, and their respective directors, officers, employees and agents from and against any and all claims and expenses, including attorneys' fees, arising out of your use of the Website, including but not limited to your violation of this Agreement.</li>
<li><strong>Miscellaneous.</strong> This Agreement constitutes the entire agreement between $wl_tos_op_bizname and you concerning the subject matter hereof, and they may only be modified by a written amendment signed by an authorized executive of $wl_tos_op_bizname, or by the posting by $wl_tos_op_bizname of a revised version. Except to the extent applicable law, if any, provides otherwise, this Agreement, any access to or use of the Website will be governed by the laws of the $wl_tos_op_venue, excluding its conflict of law provisions, and the proper venue for any disputes arising out of or relating to any of the same will be the state and federal courts located in $wl_tos_op_courtlocation. Except for claims for injunctive or equitable relief or claims regarding intellectual property rights (which may be brought in any competent court without the posting of a bond), any dispute arising under this Agreement shall be finally settled in accordance with the Comprehensive Arbitration Rules of the Judicial Arbitration and Mediation Service, Inc. (&quot;JAMS&quot;) by three arbitrators appointed in accordance with such Rules. The arbitration shall take place in $wl_tos_op_arbitrationlocation, in the English language and the arbitral decision may be enforced in any court. The prevailing party in any action or proceeding to enforce this Agreement shall be entitled to costs and attorneys' fees. If any part of this Agreement is held invalid or unenforceable, that part will be construed to reflect the parties' original intent, and the remaining portions will remain in full force and effect. A waiver by either party of any term or condition of this Agreement or any breach thereof, in any one instance, will not waive such term or condition or any subsequent breach thereof. You may assign your rights under this Agreement to any party that consents to, and agrees to be bound by, its terms and conditions; $wl_tos_op_bizname may assign its rights under this Agreement without condition. This Agreement will be binding upon and will inure to the benefit of the parties, their successors and permitted assigns.</li>
</ol>";
	$wl_tos_op_tcond .= apply_filters( 'atospp_tos_after_end', '' );

	return $wl_tos_op_tcond;
}
add_shortcode( 'wl_tos', 'wl_tos_tos_shortcode');

function wl_tos_pp_shortcode() {
	$wl_tos_op_termsheading                                 = get_option('wl_tos_tos_heading');
	$wl_tos_op_privacypolicyheading                         = get_option('wl_tos_pp_heading');
	$wl_tos_op_biznamefull                                  = get_option('wl_tos_full_name');;
	$wl_tos_op_bizname                                      = get_option('wl_tos_name');
	$wl_tos_op_biznamepossessive                            = get_option('wl_tos_possessive_name');
	$wl_tos_op_domainname                                   = get_option('wl_tos_domain_name');
	$wl_tos_op_websiteurl                                   = get_option('wl_tos_official_site');
	$wl_tos_op_minimumage                                   = get_option('wl_tos_min_age');
	$wl_tos_op_timeperiodforchangingfeesandfornotifications = get_option('wl_tos_time_period_change');
	$wl_tos_op_timeperiodtoreplytopriorityemail             = get_option('wl_tos_time_period_reply');
	$wl_tos_op_timeperiodfordeterminingmaximumdamages       = get_option('wl_tos_time_period_damage');
	$wl_tos_op_dmcanoticeurl                                = get_option('wl_tos_time_dcma_url');
	if ( ! empty( $wl_tos_op_dmcanoticeurl ) ) {
		$wl_tos_op_dmcaoutput = "$wl_tos_op_bizname in accordance with <a href=\"$wl_tos_op_dmcanoticeurl\">$wl_tos_op_biznamepossessive Digital Millennium Copyright Act (&quot;DMCA&quot;) Policy</a>";
	} else {
		$wl_tos_op_dmcaoutput = "$wl_tos_op_bizname in accordance with $wl_tos_op_biznamepossessive Digital Millennium Copyright Act (&quot;DMCA&quot;) Policy";
	}
	$wl_tos_op_venue               = get_option('wl_tos_venue');
	$wl_tos_op_courtlocation       = get_option('wl_tos_court');
	$wl_tos_op_arbitrationlocation = get_option('wl_tos_arbit');
	$wl_tos_op_privacypolicy = '';
	$wl_tos_op_privacypolicy .= "<h2 id='atospp-privacy' class='auto-tos-pp ppheading'>$wl_tos_op_privacypolicyheading:</h2>";
	$wl_tos_op_privacypolicy .= "<p>$wl_tos_op_biznamefull (&quot;<strong>$wl_tos_op_bizname</strong>&quot;) operates $wl_tos_op_domainname and may operate other websites. It is $wl_tos_op_biznamepossessive policy to respect your privacy regarding any information we may collect while operating our websites.</p>
<h3>Website Visitors</h3>
<p>Like most website operators, $wl_tos_op_bizname collects non-personally-identifying information of the sort that web browsers and servers typically make available, such as the browser type, language preference, referring site, and the date and time of each visitor request. $wl_tos_op_biznamepossessive purpose in collecting non-personally identifying information is to better understand how $wl_tos_op_biznamepossessive visitors use its website. From time to time, $wl_tos_op_bizname may release non-personally-identifying information in the aggregate, e.g., by publishing a report on trends in the usage of its website.</p>
<p>$wl_tos_op_bizname also collects potentially personally-identifying information like Internet Protocol (IP) addresses for logged in users and for users leaving comments on $wl_tos_op_domainname blogs/sites. $wl_tos_op_bizname only discloses logged in user and commenter IP addresses under the same circumstances that it uses and discloses personally-identifying information as described below, except that commenter IP addresses and email addresses are visible and disclosed to the administrators of the blog/site where the comment was left.</p>
<h3>Gathering of Personally-Identifying Information</h3>
<p>Certain visitors to $wl_tos_op_biznamepossessive websites choose to interact with $wl_tos_op_bizname in ways that require $wl_tos_op_bizname to gather personally-identifying information. The amount and type of information that $wl_tos_op_bizname gathers depends on the nature of the interaction. For example, we ask visitors who sign up  at <a href=\"$wl_tos_op_websiteurl\">$wl_tos_op_domainname</a> to provide a username and email address. Those who engage in transactions with $wl_tos_op_bizname are asked to provide additional information, including as necessary the personal and financial information required to process those transactions. In each case, $wl_tos_op_bizname collects such information only insofar as is necessary or appropriate to fulfill the purpose of the visitor's interaction with $wl_tos_op_bizname. $wl_tos_op_bizname does not disclose personally-identifying information other than as described below. And visitors can always refuse to supply personally-identifying information, with the caveat that it may prevent them from engaging in certain website-related activities.</p>
<h3>Aggregated Statistics</h3>
<p>$wl_tos_op_bizname may collect statistics about the behavior of visitors to its websites. $wl_tos_op_bizname may display this information publicly or provide it to others. However, $wl_tos_op_bizname does not disclose personally-identifying information other than as described below.</p>
<h3>Protection of Certain Personally-Identifying Information</h3>
<p>$wl_tos_op_bizname discloses potentially personally-identifying and personally-identifying information only to those of its employees, contractors and affiliated organizations that (i) need to know that information in order to process it on $wl_tos_op_biznamepossessive behalf or to provide services available at $wl_tos_op_biznamepossessive websites, and (ii) that have agreed not to disclose it to others. Some of those employees, contractors and affiliated organizations may be located outside of your home country; by using $wl_tos_op_biznamepossessive websites, you consent to the transfer of such information to them. $wl_tos_op_bizname will not rent or sell potentially personally-identifying and personally-identifying information to anyone. Other than to its employees, contractors and affiliated organizations, as described above, $wl_tos_op_bizname discloses potentially personally-identifying and personally-identifying information only in response to a subpoena, court order or other governmental request, or when $wl_tos_op_bizname believes in good faith that disclosure is reasonably necessary to protect the property or rights of $wl_tos_op_bizname, third parties or the public at large. If you are a registered user of an $wl_tos_op_bizname website and have supplied your email address, $wl_tos_op_bizname may occasionally send you an email to tell you about new features, solicit your feedback, or just keep you up to date with what's going on with $wl_tos_op_bizname and our products.  If you send us a request (for example via email or via one of our feedback mechanisms), we reserve the right to publish it in order to help us clarify or respond to your request or to help us support other users. $wl_tos_op_bizname takes all measures reasonably necessary to protect against the unauthorized access, use, alteration or destruction of potentially personally-identifying and personally-identifying information.</p>
<h3>Cookies</h3>
<p>A cookie is a string of information that a website stores on a visitor's computer, and that the visitor's browser provides to the website each time the visitor returns. $wl_tos_op_bizname uses cookies to help $wl_tos_op_bizname identify and track visitors, their usage of $wl_tos_op_bizname website, and their website access preferences. $wl_tos_op_bizname visitors who do not wish to have cookies placed on their computers should set their browsers to refuse cookies before using $wl_tos_op_biznamepossessive websites, with the drawback that certain features of $wl_tos_op_biznamepossessive websites may not function properly without the aid of cookies.</p>
<h3>Business Transfers</h3>
<p>If $wl_tos_op_bizname, or substantially all of its assets, were acquired, or in the unlikely event that $wl_tos_op_bizname goes out of business or enters bankruptcy, user information would be one of the assets that is transferred or acquired by a third party. You acknowledge that such transfers may occur, and that any acquirer of $wl_tos_op_bizname may continue to use your personal information as set forth in this policy.</p>
<h3>Ads</h3>
<p>Ads appearing on any of our websites may be delivered to users by advertising partners, who may set cookies. These cookies allow the ad server to recognize your computer each time they send you an online advertisement to compile information about you or others who use your computer. This information allows ad networks to, among other things, deliver targeted advertisements that they believe will be of most interest to you. This Privacy Policy covers the use of cookies by $wl_tos_op_bizname and does not cover the use of cookies by any advertisers.</p>
<h3>$wl_tos_op_privacypolicyheading Changes</h3>
<p>Although most changes are likely to be minor, $wl_tos_op_bizname may change its $wl_tos_op_privacypolicyheading from time to time, and in $wl_tos_op_biznamepossessive sole discretion. $wl_tos_op_bizname encourages visitors to frequently check this page for any changes to its $wl_tos_op_privacypolicyheading. If you have a $wl_tos_op_domainname account, you might also receive an alert informing you of these changes. Your continued use of this site after any change in this $wl_tos_op_privacypolicyheading will constitute your acceptance of such change.</p>";
	return $wl_tos_op_privacypolicy;
}
add_shortcode( 'wl_privacypolicy', 'wl_tos_pp_shortcode');

if (!function_exists('wl_rss_register_widgets'))
{
	function wl_rss_register_widgets() {
		global $wp_meta_boxes;
		wp_add_dashboard_widget('wl_widget_blog_rss', __('Latest Wishloop News', 'rc_mdm'), 'wl_widget_blog_rss_content');
	}

}
add_action('wp_dashboard_setup', 'wl_rss_register_widgets');

if (!function_exists('wl_widget_blog_rss_content'))
{
	function wl_widget_blog_rss_content(){
		// Get RSS Feed(s)
		include_once( ABSPATH . WPINC . '/feed.php' );

		// Get a SimplePie feed object from the specified feed source.
		$rss = fetch_feed( 'http://wishloop.com/blog/feed/' );

		$maxitems = 0;

		if ( ! is_wp_error( $rss ) ) : // Checks that the object is created correctly

			// Figure out how many total items there are, but limit it to 5.
			$maxitems = $rss->get_item_quantity( 5 );

			// Build an array of all the items, starting with element 0 (first element).
			$rss_items = $rss->get_items( 0, $maxitems );

		endif;
		?>

		<ul>
			<?php if ( $maxitems == 0 ) : ?>
				<li><?php _e( 'No items', 'my-text-domain' ); ?></li>
			<?php else : ?>
				<?php // Loop through each feed item and display each item as a hyperlink. ?>
				<?php foreach ( $rss_items as $item ) : ?>
					<li class="rss-widget">
						<a href="<?php echo esc_url( $item->get_permalink() ); ?>"
						   title="<?php printf( __( 'Posted %s', 'my-text-domain' ), $item->get_date('j F Y | g:i a') ); ?>">
							<?php echo esc_html( $item->get_title() ); ?>
						</a>
						<?php
							// Get item content
			                $content = $item->get_description();
			                // Shorten content
			                $content = wp_html_excerpt($content, 120) . ' [...]';

							$item_date = human_time_diff( $item->get_date('U'), current_time('timestamp')).' '.__( 'ago', 'rc_mdm' );
						?>
						<span class="rss-date">- <?php echo $item_date?></span><br />
		                <div class="rssSummary"><?php echo $content; ?></div>
					</li>
				<?php endforeach; ?>
			<?php endif; ?>
		</ul>
		<?php
	}

}