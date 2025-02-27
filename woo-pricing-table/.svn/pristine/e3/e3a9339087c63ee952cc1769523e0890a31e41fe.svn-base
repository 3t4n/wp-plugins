<?php
if(!defined('ABSPATH')) exit;
if(!current_user_can('manage_options')) {
	die('Access Denied');
}
global $wpdb;
$tspt_icons_table = esc_sql( $wpdb->prefix . "totalsoft_icons" );
$tspt_ids_table = esc_sql( $wpdb->prefix . "totalsoft_ptable_id" );
$tspt_manager_table = esc_sql( $wpdb->prefix . "totalsoft_ptable_manager" );
$tspt_columns_table = esc_sql( $wpdb->prefix . "totalsoft_ptable_cols" );
$tspt_settings_table = esc_sql( $wpdb->prefix . "totalsoft_ptable_sets" );
if($_SERVER["REQUEST_METHOD"]=="POST") {
	if(check_admin_referer( 'tspt_action_field', 'tspt_action_nonce' )) {
		$Total_Soft_PTable_Title = isset($_POST['Total_Soft_PTable_Title']) ? sanitize_text_field(wp_unslash($_POST['Total_Soft_PTable_Title'])) : '';
		$Total_Soft_PTable_Them = isset($_POST['Total_Soft_PTable_Them']) ? sanitize_text_field(wp_unslash($_POST['Total_Soft_PTable_Them'])) : '';
		$Total_Soft_PTable_Cols_Count = isset($_POST['Total_Soft_PTable_Cols_Count']) ? sanitize_text_field(wp_unslash($_POST['Total_Soft_PTable_Cols_Count'])) : '';
		$Total_Soft_PTable_M_01 = isset($_POST['Total_Soft_PTable_M_01']) ? sanitize_text_field(wp_unslash($_POST['Total_Soft_PTable_M_01'])) : '';
		$Total_Soft_PTable_M_02 = isset($_POST['Total_Soft_PTable_M_02']) ? sanitize_text_field(wp_unslash($_POST['Total_Soft_PTable_M_02'])) : '';
		$TS_PTable_TSetting = $TS_PTable_TText = $TS_PTable_TIcon = $TS_PTable_PCur = $TS_PTable_PVal = $TS_PTable_PPlan = $TS_PTable_FCount = $TS_PTable_BText = $TS_PTable_BIcon = $TS_PTable_BLink = array();
		for($i=1;$i<=$Total_Soft_PTable_Cols_Count;$i++){
			array_push($TS_PTable_TSetting,isset($_POST['TS_PTable_TSetting_' . $i]) ? sanitize_text_field(wp_unslash($_POST['TS_PTable_TSetting_' . $i])) : '');
			array_push($TS_PTable_TText,isset($_POST['TS_PTable_TText_' . $i]) ? str_replace("\&","&", sanitize_text_field(esc_html(wp_unslash($_POST['TS_PTable_TText_' . $i])))) : '');
			array_push($TS_PTable_TIcon,isset($_POST['TS_PTable_TIcon_' . $i]) ? sanitize_text_field(wp_unslash($_POST['TS_PTable_TIcon_' . $i])) : '');
			array_push($TS_PTable_PCur,isset($_POST['TS_PTable_PCur_' . $i]) ? str_replace("\&","&", sanitize_text_field(esc_html(wp_unslash($_POST['TS_PTable_PCur_' . $i])))) : '');
			array_push($TS_PTable_PVal,isset($_POST['TS_PTable_PVal_' . $i]) ? sanitize_text_field(wp_unslash($_POST['TS_PTable_PVal_' . $i])) : '');
			array_push($TS_PTable_PPlan,isset($_POST['TS_PTable_PPlan_' . $i]) ? str_replace("\&","&", sanitize_text_field(esc_html(wp_unslash($_POST['TS_PTable_PPlan_' . $i])))) : '');
			array_push($TS_PTable_FCount,isset($_POST['TS_PTable_FCount_' . $i]) ? sanitize_text_field(wp_unslash($_POST['TS_PTable_FCount_' . $i])) : '');
			array_push($TS_PTable_BText,isset($_POST['TS_PTable_BText_' . $i]) ? str_replace("\&","&", sanitize_text_field(esc_html(wp_unslash($_POST['TS_PTable_BText_' . $i])))) : '');
			array_push($TS_PTable_BIcon,isset($_POST['TS_PTable_BIcon_' . $i]) ? sanitize_text_field(wp_unslash($_POST['TS_PTable_BIcon_' . $i])) : '');
			array_push($TS_PTable_BLink,isset($_POST['TS_PTable_BLink_' . $i]) ? sanitize_text_field(wp_unslash($_POST['TS_PTable_BLink_' . $i])) : '');
		}
		if(isset($_POST['Total_Soft_PTable_Save'])){
			$wpdb->query($wpdb->prepare("INSERT INTO $tspt_manager_table (id, Total_Soft_PTable_Title, Total_Soft_PTable_Them, Total_Soft_PTable_Cols_Count, Total_Soft_PTable_M_01, Total_Soft_PTable_M_02) VALUES (%d, %s, %s, %s, %s, %s)", '', $Total_Soft_PTable_Title, $Total_Soft_PTable_Them, $Total_Soft_PTable_Cols_Count, $Total_Soft_PTable_M_01, $Total_Soft_PTable_M_02));
			$New_PTable_ID = $wpdb->get_results($wpdb->prepare("SELECT * FROM $tspt_ids_table WHERE id>%d order by id desc limit 1",0));
			$New_PTableID = absint($New_PTable_ID[0]->PTable_ID) + 1;
			$wpdb->query($wpdb->prepare("INSERT INTO $tspt_ids_table (id, PTable_ID) VALUES (%d, %s)", '', $New_PTableID));
			for($i=1;$i<=$Total_Soft_PTable_Cols_Count;$i++){
				$TS_PTable_FIcon = $TS_PTable_FCheck = $TS_PTable_FText = array();
				for($j=1;$j<=sanitize_text_field(wp_unslash($_POST['TS_PTable_FCount_' . $i]));$j++) {
					array_push($TS_PTable_FIcon, isset($_POST['TS_PTable_FIcon_' . $i . '_' . $j]) ? sanitize_text_field(wp_unslash($_POST['TS_PTable_FIcon_' . $i . '_' . $j])) : '');
					array_push($TS_PTable_FCheck, isset($_POST['TS_PTable_FChecked_' . $i . '_' . $j]) ? sanitize_text_field(wp_unslash($_POST['TS_PTable_FChecked_' . $i . '_' . $j])) : '');
					array_push($TS_PTable_FText, isset($_POST['TS_PTable_FText_' . $i . '_' . $j]) ? str_replace("\&","&", sanitize_text_field(esc_html(wp_unslash($_POST['TS_PTable_FText_' . $i . '_' . $j])))) : '');
				}
				$TS_PTable_FIcon_Im = implode("TSPTFI",$TS_PTable_FIcon);
				$TS_PTable_FCheck_Im = implode("TSPTFC",$TS_PTable_FCheck);
				$TS_PTable_FText_Im = implode("TSPTFT",$TS_PTable_FText);
				$wpdb->query($wpdb->prepare("INSERT INTO $tspt_columns_table (id, PTable_ID, TS_PTable_TSetting, TS_PTable_TText, TS_PTable_TIcon, TS_PTable_PCur, TS_PTable_PVal, TS_PTable_PPlan, TS_PTable_FCount, TS_PTable_BText, TS_PTable_BIcon, TS_PTable_BLink, TS_PTable_FIcon, TS_PTable_FText, TS_PTable_C_01) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $New_PTableID, $TS_PTable_TSetting[$i-1], $TS_PTable_TText[$i-1], $TS_PTable_TIcon[$i-1], $TS_PTable_PCur[$i-1], $TS_PTable_PVal[$i-1], $TS_PTable_PPlan[$i-1], $TS_PTable_FCount[$i-1], $TS_PTable_BText[$i-1], $TS_PTable_BIcon[$i-1], $TS_PTable_BLink[$i-1], $TS_PTable_FIcon_Im, $TS_PTable_FText_Im, $TS_PTable_FCheck_Im));
			}
		}else if(isset($_POST['Total_Soft_PTable_Update']) && isset($_POST['Total_SoftPTable_Update'])) {
			$Total_SoftPTable_Update = sanitize_text_field(wp_unslash($_POST['Total_SoftPTable_Update']));
			$wpdb->query($wpdb->prepare("UPDATE $tspt_manager_table set Total_Soft_PTable_Title = %s, Total_Soft_PTable_Them = %s, Total_Soft_PTable_Cols_Count = %s, Total_Soft_PTable_M_01 = %s, Total_Soft_PTable_M_02 = %s WHERE id = %d", $Total_Soft_PTable_Title, $Total_Soft_PTable_Them, $Total_Soft_PTable_Cols_Count, $Total_Soft_PTable_M_01, $Total_Soft_PTable_M_02, $Total_SoftPTable_Update));
			$wpdb->query($wpdb->prepare("DELETE FROM $tspt_columns_table WHERE PTable_ID = %d", $Total_SoftPTable_Update));
			for($i=1;$i<=$Total_Soft_PTable_Cols_Count;$i++) {
				$TS_PTable_FIcon = $TS_PTable_FCheck = $TS_PTable_FText = array();
				for($j=1;$j<=sanitize_text_field(wp_unslash($_POST['TS_PTable_FCount_' . $i]));$j++) {
					array_push($TS_PTable_FIcon, isset($_POST['TS_PTable_FIcon_' . $i . '_' . $j]) ? sanitize_text_field(wp_unslash($_POST['TS_PTable_FIcon_' . $i . '_' . $j])) : '');
					array_push($TS_PTable_FCheck, isset($_POST['TS_PTable_FChecked_' . $i . '_' . $j]) ? sanitize_text_field(wp_unslash($_POST['TS_PTable_FChecked_' . $i . '_' . $j])) : '');
					array_push($TS_PTable_FText, isset($_POST['TS_PTable_FText_' . $i . '_' . $j]) ? str_replace("\&","&", sanitize_text_field(esc_html(wp_unslash($_POST['TS_PTable_FText_' . $i . '_' . $j])))) : '');
				}
				$TS_PTable_FIcon_Im = implode("TSPTFI",$TS_PTable_FIcon);
				$TS_PTable_FCheck_Im = implode("TSPTFC",$TS_PTable_FCheck);
				$TS_PTable_FText_Im = implode("TSPTFT",$TS_PTable_FText);
				$wpdb->query($wpdb->prepare("INSERT INTO $tspt_columns_table (id, PTable_ID, TS_PTable_TSetting, TS_PTable_TText, TS_PTable_TIcon, TS_PTable_PCur, TS_PTable_PVal, TS_PTable_PPlan, TS_PTable_FCount, TS_PTable_BText, TS_PTable_BIcon, TS_PTable_BLink, TS_PTable_FIcon, TS_PTable_FText, TS_PTable_C_01) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $Total_SoftPTable_Update, $TS_PTable_TSetting[$i-1], $TS_PTable_TText[$i-1], $TS_PTable_TIcon[$i-1], $TS_PTable_PCur[$i-1], $TS_PTable_PVal[$i-1], $TS_PTable_PPlan[$i-1], $TS_PTable_FCount[$i-1], $TS_PTable_BText[$i-1], $TS_PTable_BIcon[$i-1], $TS_PTable_BLink[$i-1], $TS_PTable_FIcon_Im, $TS_PTable_FText_Im, $TS_PTable_FCheck_Im));
			}
		}
	} else {
		wp_die('Security check fail');
	}
}
$tspt_get_icons = $wpdb->get_results($wpdb->prepare("SELECT * FROM $tspt_icons_table WHERE id>%d order by id",0),'ARRAY_A');
$tspt_get_settings = $wpdb->get_results($wpdb->prepare("SELECT * FROM $tspt_settings_table WHERE id>%d order by id",0),'ARRAY_A');
$tsp_get_last_id = $wpdb->get_row($wpdb->prepare("SELECT `id` FROM $tspt_ids_table WHERE id>%d order by id desc limit 1",0),'ARRAY_A');
$tspt_new_id = $tsp_get_last_id ? absint($tsp_get_last_id['id']) + 1 : 1;
$tspt_get_manager = $wpdb->get_results($wpdb->prepare("SELECT * FROM $tspt_manager_table WHERE id>%d order by id",0),'ARRAY_A');
?>
<div class="Total_Soft_PTable_Loading" style="position: fixed;top: 0;left: 0;width: 100%;height: 100%;z-index: 999999999999;background: rgba(0, 0, 0, 0.8);display: block;">
	<img src="<?php echo esc_url(plugins_url('../Images/loading.gif',__FILE__));?>" style="position: absolute;left: 50%;top: 50%;transform: translate(-50%, -50%);-moz-transform: translate(-50%, -50%);-webkit-transform: translate(-50%, -50%);">
</div>
<form method="POST" enctype="multipart/form-data" oninput="tsptUpdateOutput()" class="tspt-form" style="display:none;">
	<?php wp_nonce_field( 'tspt_action_field', 'tspt_action_nonce' );?>
	<div class="Total_Soft_PTable_AMD">
		<div class="Support_Span">
			<a href="<?php echo esc_url( "https://wordpress.org/support/plugin/woo-pricing-table" ); ?>" target="_blank" title="Click Here to Ask">
				<i class="totalsoft totalsoft-comments-o"></i><span style="margin-left:5px;">If you have any questions click here to ask it to our support.</span>
			</a>
		</div>
		<div class="Total_Soft_PTable_AMD1"></div>
		<div class="Total_Soft_PTable_AMD2">
			<i class="Total_Soft_PTable_Help totalsoft totalsoft-question-circle-o" title=""></i>
			<span class="Total_Soft_PTable_AMD2_But" onclick="tsptCreate(<?php echo esc_js($tspt_new_id);?>)">
				Create New
			</span>
		</div>
		<div class="Total_Soft_PTable_AMD3">
			<i class="Total_Soft_PTable_Help totalsoft totalsoft-question-circle-o" title=""></i>
			<span class="Total_Soft_PTable_AMD2_But" onclick="tsptReload()">
				Cancel
			</span>
			<i class="Total_Soft_PTable_Save Total_Soft_PTable_Help totalsoft totalsoft-question-circle-o" title=""></i>
			<button type="submit" class="Total_Soft_PTable_Save Total_Soft_PTable_AMD2_But" name="Total_Soft_PTable_Save">
				Save
			</button>
			<i class="Total_Soft_PTable_Update Total_Soft_PTable_Help totalsoft totalsoft-question-circle-o" title=""></i>
			<button type="submit" class="Total_Soft_PTable_Update Total_Soft_PTable_AMD2_But" name="Total_Soft_PTable_Update">
				Update
			</button>
			<input type="text" style="display:none" name="Total_SoftPTable_Update" id="Total_SoftPTable_Update">
		</div>
	</div>
	<table class="Total_Soft_PTable_AMMTable">
		<tr class="Total_Soft_PTable_AMMTableFR">
			<td>No</td>
			<td>Title</td>
			<td>Theme</td>
			<td>Column Count</td>
			<td>Copy</td>
			<td>Edit</td>
			<td>Delete</td>
		</tr>
	</table>
	<table class="Total_Soft_PTable_AMOTable">
		<?php foreach ($tspt_get_manager as $tspt_manager_key => $tspt_manager) { 
			$tspt_manager_theme_name = '';
			switch ($tspt_manager['Total_Soft_PTable_Them']) {
				case 'type1':
					$tspt_manager_theme_name = 'Pricing Theme 1';
					break;
				case 'type2':
					$tspt_manager_theme_name = 'Pricing Theme 2';
					break;
				case 'type3':
					$tspt_manager_theme_name = 'Pricing Theme 3';
					break;
				case 'type4':
					$tspt_manager_theme_name = 'Pricing Theme 4';
					break;
				case 'type5':
					$tspt_manager_theme_name = 'Pricing Theme 5';
					break;
			}
		?>
			<tr id="Total_Soft_PTable_AMOTable_tr_<?php echo esc_html($tspt_manager['id']);?>">
				<td><?php echo esc_html($tspt_manager_key + 1);?></td>
				<td><?php echo esc_html($tspt_manager['Total_Soft_PTable_Title']);?></td>
				<td><?php echo esc_html($tspt_manager_theme_name);?></td>
				<td><?php echo esc_html($tspt_manager['Total_Soft_PTable_Cols_Count']);?></td>
				<td><i class="totalsoft totalsoft-file-text" onclick="tsptCloneTable(<?php echo esc_html($tspt_manager['id']);?>)"></i></td>
				<td><i class="totalsoft totalsoft-pencil" onclick="tsptEditTable(<?php echo esc_html($tspt_manager['id']);?>)"></i></td>
				<td>
					<i class="totalsoft totalsoft-trash" onclick="tsptDeleteTable(<?php echo esc_html($tspt_manager['id']);?>)"></i>
					<span class="Total_Soft_PTable_Del_Span">
						<i class="Total_Soft_PTable_Del_Span_Yes totalsoft totalsoft-check" onclick="tsptDelete(<?php echo esc_html($tspt_manager['id']);?>)"></i>
						<i class="Total_Soft_PTable_Del_Span_No totalsoft totalsoft-times" onclick="tsptCancel(<?php echo esc_html($tspt_manager['id']);?>)"></i>
					</span>
				</td>
			</tr>
		<?php } ?>
	</table>
	<div class="Total_Soft_PTable_AMMain_Div">
		<table class="Total_Soft_PTable_AMShortTable">
			<tr style="text-align:center">
				<td>Shortcode</td>
				<td>Templete Include</td>
			</tr>
			<tr>
				<td>Copy &amp; paste the shortcode directly into any WordPress post or page.</td>
				<td>Copy &amp; paste this code into a template file to include the pricing table within your theme.</td>
			</tr>
			<tr style="text-align:center">
				<td>
					<span id="Total_Soft_PTable_ID"></span>
					<i class="Total_Soft_PTable_Help1 totalsoft totalsoft-files-o" title="Click to Copy." onclick="tsptCopyShortcode('Total_Soft_PTable_ID')"></i>
				</td>
				<td>
					<span id="Total_Soft_PTable_TID"></span>
					<i class="Total_Soft_PTable_Help1 totalsoft totalsoft-files-o" title="Click to Copy." onclick="tsptCopyShortcode('Total_Soft_PTable_TID')"></i>
				</td>
			</tr>
		</table>
		<div class="TS_PTable_Remove_Cols_Fixed"></div>
		<div class="TS_PTable_Remove_Cols_Abs">
			<div class="TS_PTable_Remove_Cols_Rel">
				<p> Are you sure you want to remove ? </p>
				<span class="TS_PTable_Remove_Cols_Rel_No">No</span>
				<span class="TS_PTable_Remove_Cols_Rel_Yes">Yes</span>
			</div>
		</div>
		<div class="Total_Soft_PTable_AMMain_Div1">
			<table class="Total_Soft_PTable_AMMainTable1">
				<tr>
					<td>Table Title</td>
				</tr>
				<tr>
					<td>
						<input type="text" class="Total_Soft_PTable_Select" name="Total_Soft_PTable_Title" id="Total_Soft_PTable_Title" required>
					</td>
				</tr>
				<tr>
					<td>Container Width</td>
				</tr>
				<tr>
					<td style="height: 28px;">
						<input type="range" class="TS_PTable_Range TS_PTable_Rangeper" name="Total_Soft_PTable_M_01" id="Total_Soft_PTable_M_01" min="0" max="100" value="100">
						<output class="TS_PTable_Range_Out" name="" id="Total_Soft_PTable_M_01_Output" for="Total_Soft_PTable_M_01"></output>
					</td>
				</tr>
				<tr>
					<td>Container Position</td>
				</tr>
				<tr>
					<td>
						<select class="Total_Soft_PTable_Select" id="Total_Soft_PTable_M_02" name="Total_Soft_PTable_M_02">
							<option value="left">   Left   </option>
							<option value="right">  Right  </option>
							<option value="center"> Center </option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Table Theme</td>
				</tr>
				<tr>
					<td>
						<select class="Total_Soft_PTable_Select" onchange="tsptThemeImage()" id="Total_Soft_PTable_Them" name="Total_Soft_PTable_Them">
							<option value="type1">Pricing Theme 1</option>
							<option value="type2">Pricing Theme 2</option>
							<option value="type3">Pricing Theme 3</option>
							<option value="type4">Pricing Theme 4</option>
							<option value="type5">Pricing Theme 5</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Theme Model</td>
				</tr>
				<tr>
					<td class="Total_Soft_PTable_AMMainTable1_Model">
						<img src="<?php echo esc_url(plugins_url('../Images/Themes/type1.png',__FILE__));?>" class="Total_Soft_PTable_TImage" id="Total_Soft_PTable_TImage">
						<input type="text" style="display: none;" id="Total_Soft_PTable_TImage_HidSrc" value="<?php echo esc_url(plugins_url('../Images/Themes/',__FILE__))?>">
					</td>
				</tr>
			</table>
		</div>
		<div class="Total_Soft_PTable_AMMain_Div2">
			<div class="Total_Soft_PTable_AMMain_Div2_But">
				<span class="Total_Soft_PTable_AddColBut" onclick="tsptNewColumn()">
					<span class="Total_Soft_PTable_AddColBut2">
						<i class="Total_Soft_PTable_AddColBut_Icon totalsoft totalsoft-plus-circle" style="margin-right: 5px;"></i>
						Add Column
					</span>
				</span>
				<input type="text" style="display: none;" id="Total_Soft_PTable_Cols_Count" name="Total_Soft_PTable_Cols_Count" value="0">
				<div id="Total_Soft_PTable_Select_Icon" style="display: none;">
					<option value="none" selected> None </option>
					<?php foreach ($tspt_get_icons as $tspt_icon) { ?>
						<option value="<?php echo esc_html(strtolower(str_replace(" ", "-", $tspt_icon['Icon_Name'])));?>"><?php echo '&#x' . esc_html($tspt_icon['Icon_Type']) . '&nbsp; &nbsp; &nbsp;' . esc_html($tspt_icon['Icon_Name']);?></option>
					<?php } ?>
				</div>
				<div id="Total_Soft_PTable_Select_TSet" style="display: none;">
					<?php foreach ($tspt_get_settings as $tspt_setting) { ?>
						<option value="<?php echo esc_html($tspt_setting['id']);?>" alt="<?php echo esc_html($tspt_setting['TS_PTable_TType']);?>"><?php echo esc_html($tspt_setting['TS_PTable_ST_00']);?></option>
					<?php } ?>
				</div>
			</div>
			<div class="Total_Soft_PTable_AMMain_Div2_Cols"></div>
		</div>
	</div>
</form>