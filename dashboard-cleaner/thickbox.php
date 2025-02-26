<?php
/*
 +=====================================================================+
 |     ____            _     _                         _               |
 |    |  _ \  __ _ ___| |__ | |__   ___   __ _ _ __ __| |              |
 |    | | | |/ _` / __| '_ \| '_ \ / _ \ / _` | '__/ _` |              |
 |    | |_| | (_| \__ \ | | | |_) | (_) | (_| | | | (_| |              |
 |    |____/ \__,_|___/_| |_|_.__/ \___/ \__,_|_|  \__,_|              |
 |      ____ _                                                         |
 |     / ___| | ___  __ _ _ __   ___ _ __                              |
 |    | |   | |/ _ \/ _` | '_ \ / _ \ '__|                             |
 |    | |___| |  __/ (_| | | | |  __/ |                                |
 |     \____|_|\___|\__,_|_| |_|\___|_|                                |
 |                                                                     |
 | (c) Jerome Bruandet ~ https://nintechnet.com/bruandet/              |
 +=====================================================================+
*/
if (! defined( 'ABSPATH' ) ) { die( 'Forbidden' ); }

/* ================================================================== */

// ThickBox dialogbox:

add_thickbox();

?>

<div class="" id="dhcl_modal_content" style="display:none">

	<form name="filter_form" method="post" onSubmit="return dhcl_filterform_check();">

		<?php wp_nonce_field('dhcl_thickbox_nonce', 'dhcl_nonce', 0); ?>

		<h3><?php printf( __('Create a filter for any %s HTML element having the following attribute name/value pair:', 'dashboard-cleaner'), '<input type="text" class="short-code" id="dhcl-choice-tag" name="dhcl_choice_tag" value="" size="10" />' ) ?></h3>

		<table class="form-table" style="background-color:#F9F9F9;">
			<tr>
				<th scope="row" style="padding:5px 3px 5px 3px;text-align:center"><?php _e('Attribute name', 'dashboard-cleaner') ?></th>
				<th scope="row" style="padding:5px 3px 5px 3px;text-align:center"><?php _e('Attribute value (case-sensitive)', 'dashboard-cleaner') ?></th>
			</tr>
			<tr>
				<th scope="row" style="padding:5px 3px 5px 3px"><label><input type="radio" name="dhcl_choice" value="dhclid" /><code>id</code></label></th>
				<td align="left" style="padding:5px 3px 5px 3px">
					<input type="text" class="large-text" id="dhcl-choice-id" name="dhclid" value="" />
				</td>
			</tr>
			<tr>
				<th scope="row" style="padding:5px 3px 5px 3px"><label><input type="radio" name="dhcl_choice" value="dhclclass" /><code>class</code></label></th>
				<td align="left" style="padding:5px 3px 5px 3px">
					<input type="text" class="large-text" id="dhcl-choice-class" name="dhclclass" value="" />
				</td>
			</tr>
			<tr>
				<th scope="row" style="padding:5px 3px 5px 3px"><label><input type="radio" name="dhcl_choice" value="dhclsrc" /><code>src</code></label></th>
				<td align="left" style="padding:5px 3px 5px 3px">
					<input type="text" class="large-text" id="dhcl-choice-src" name="dhclsrc" value="" />
				</td>
			</tr>
			<tr>
				<th scope="row" style="padding:5px 3px 5px 3px"><label><input type="radio" name="dhcl_choice" value="dhclhref" /><code>href</code></label></th>
				<td align="left" style="padding:5px 3px 5px 3px">
					<input type="text" class="large-text" id="dhcl-choice-href" name="dhclhref" value="" />
				</td>
			</tr>
			<tr>
				<th scope="row" style="padding:5px 3px 5px 3px"><label><input type="radio" name="dhcl_choice" value="dhclname" /><code>name</code></label></th>
				<td align="left" style="padding:5px 3px 5px 3px">
					<input type="text" class="large-text" id="dhcl-choice-name" name="dhclname" value="" />
				</td>
			</tr>
			<tr>
				<th scope="row" style="padding:5px 3px 5px 3px"><label><input type="radio" name="dhcl_choice" value="dhclstyle" /><code>style</code></label></th>
				<td align="left" style="padding:5px 3px 5px 3px">
					<input type="text" class="large-text" id="dhcl-choice-style" name="dhclstyle" value="" />
				</td>
			</tr>
			<tr style="background-color:#fff">
				<th scope="row" style="padding:5px 3px 5px 3px;vertical-align:middle"><?php _e('Personal notes (optional)', 'dashboard-cleaner') ?></th>
				<td align="left" style="padding:5px 3px 5px 3px">
					<input type="text" class="large-text" name="dhcl-notes" value="" maxlength="255" />
				</td>
			</tr>
			<tr style="background-color:#fff">
				<th scope="row" style="padding:5px 3px 5px 3px;vertical-align:middle"><?php _e('How to hide elements?', 'dashboard-cleaner') ?></th>
				<td align="left" style="padding:5px 3px 5px 3px">
					<select name="hidding_method">
						<option value="1" selected><?php _e('Hide them completely', 'dashboard-cleaner') ?></option>
						<option value="0"><?php _e('Same as above, but less aggressive', 'dashboard-cleaner') ?></option>
						<option value="2"><?php _e('Make them invisible without altering the page layout', 'dashboard-cleaner') ?></option>
					</select>
				</td>
			</tr>
		</table>
		<p>
			<input type="button" id="dhcl-html-source-btn" class="button-secondary" value="<?php _e('View selected HTML source', 'dashboard-cleaner') ?>" onClick="dhcl_toggle_source();" />
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="button" class="button-secondary" value="<?php _e('Cancel', 'dashboard-cleaner') ?>" onClick="tb_remove();" />
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="submit" class="button-primary" id="dhcl-html-submit" name="dhcl_html_submit" value="<?php _e('Create a filter', 'dashboard-cleaner') ?> &#187;" />
		</p>
	</form>

	<div id="dhcl-html-source" style="display:none">
		<table class="form-table">
			<tr>
				<td>
					<textarea id="html-src-textarea" class="large-text code" style="background-color: #fff;" rows="10" readonly="readonly"></textarea>
				</td>
			</tr>
		</table>
	</div>
	<span class="description"><?php _e('The current page will reload after submitting this form.', 'dashboard-cleaner') ?></span>
</div>

<?php
/* ================================================================== */
// EOF
