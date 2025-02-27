<?php
class Total_Soft_Pricing_Table extends WP_Widget {
	function __construct() {
		$params = array(
			'name' => 'Total Soft Pricing Table',
			'description' => 'This is the widget of Total Soft Pricing Table plugin'
		);
		parent::__construct('Total_Soft_Pricing_Table', '', $params);
	}
	function form($instance) {
		$defaults = array('Total_Soft_Pricing_Table'=>'');
		$instance = wp_parse_args( (array) $instance, $defaults);
		$Pricing_Table = $instance['Pricing_Table'];
		$instance['Pricing_Table_T'] = ''; ?>
		<div>
			<p>
				Pricing Table:
				<select name="<?php echo esc_attr($this->get_field_name('Pricing_Table')); ?>" class="widefat">
					<?php
						global $wpdb;
						$tspt_manager_table = esc_sql( $wpdb->prefix . "totalsoft_ptable_manager" );
						$tspt_tables = $wpdb->get_results($wpdb->prepare("SELECT * FROM $tspt_manager_table WHERE id > %d", 0),'ARRAY_A');
						foreach ($tspt_tables as $tspt_table) {
					?> 
						<option value="<?php echo esc_attr( $tspt_table['id'] ); ?>"> <?php echo esc_html( $tspt_table['Total_Soft_PTable_Title'] ); ?> </option> 
					<?php } ?>
				</select>
			</p>
		</div>
		<?php
	}
	function widget($args,$instance) {
		extract($args);
		$tspt_table_id = empty($instance['Pricing_Table']) ? '' : $instance['Pricing_Table'];
		global $wpdb;
		$tspt_manager_table = esc_sql( $wpdb->prefix . "totalsoft_ptable_manager" );
		$tspt_columns_table = esc_sql( $wpdb->prefix . "totalsoft_ptable_cols" );
		$tspt_settings_table = esc_sql( $wpdb->prefix . "totalsoft_ptable_sets" );
		$tspt_manager = $wpdb->get_row($wpdb->prepare("SELECT * FROM $tspt_manager_table WHERE id = %d order by id", $tspt_table_id),'ARRAY_A');
		$tspt_columns = $wpdb->get_results($wpdb->prepare("SELECT * FROM $tspt_columns_table WHERE PTable_ID = %s order by id", $tspt_table_id),'ARRAY_A'); ?>
		<style type="text/css">
			.TS_PTable_Container {
				padding: 35px 15px;
				float: left;
				width: <?php echo esc_html( $tspt_manager['Total_Soft_PTable_M_01'] );?>%;
				<?php if($tspt_manager['Total_Soft_PTable_M_02'] == 'left'){ ?>
					margin-left: 0;
				<?php }else if($tspt_manager['Total_Soft_PTable_M_02'] == 'right'){ ?>
					margin-left: <?php echo esc_html( 100 - $tspt_manager['Total_Soft_PTable_M_01'] );?>%;
				<?php }else if($tspt_manager['Total_Soft_PTable_M_02'] == 'center'){ ?>
					margin-left: <?php echo esc_html( (100 - $tspt_manager['Total_Soft_PTable_M_01']) / 2 );?>%;
				<?php }?>
			}
			.TS_PTable_Container, .TS_PTable_Container * { -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; cursor: default; }
			.TS_PTable_Container *:before, .TS_PTable_Container *:after { -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; }
		</style>
		<div class="TS_PTable_Container">
			<?php foreach ($tspt_columns as $tspt_column) {
				$tspt_settings = $wpdb->get_row($wpdb->prepare("SELECT * FROM $tspt_settings_table WHERE id = %d order by id", $tspt_column['TS_PTable_TSetting']),'ARRAY_A');
				if($tspt_manager['Total_Soft_PTable_Them'] == 'type1'){ ?>
					<style type="text/css">
						.TS_PTable_Container_Col_<?php echo esc_attr( $tspt_column['id'] );?> {
							position: relative;
							min-height: 1px;
							padding: 0 15px;
							float: left;
							width: <?php echo esc_attr($tspt_settings['TS_PTable_ST_01']);?>%;
							<?php if( 'on' == $tspt_settings['TS_PTable_ST_02'] ) { ?>
								-webkit-transform: scale(1.1, 1.1);
								-moz-transform: scale(1.1, 1.1);
								transform: scale(1.1, 1.1);
							<?php } ?>
							margin-bottom: 30px;
						}
						@media not screen and (min-width: 820px) {
							.TS_PTable_Container { padding: 20px 5px; }
							.TS_PTable_Container_Col_<?php echo esc_attr( $tspt_column['id'] );?> { width: 70%; margin:0 15% 40px 15%; padding: 0 10px; }
						}
						@media not screen and (min-width: 400px) {
							.TS_PTable_Container { padding: 20px 0; }
							.TS_PTable_Container_Col_<?php echo esc_attr( $tspt_column['id'] );?> { width: 100%; margin:0 0 40px 0; padding: 0 5px; }
						}
						.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
							position: relative;
							z-index: 0;
						}
						<?php if($tspt_settings['TS_PTable_ST_06'] == 'none') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								box-shadow: none !important;
								-moz-box-shadow: none !important;
								-webkit-box-shadow: none !important;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_06'] == 'shadow01') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								box-shadow: 0 10px 6px -6px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-webkit-box-shadow: 0 10px 6px -6px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-moz-box-shadow: 0 10px 6px -6px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_06'] == 'shadow02') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:before, .TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								bottom: 15px;
								left: 10px;
								width: 50%;
								height: 20%;
								max-width: 300px;
								max-height: 100px;
								-webkit-box-shadow: 0 15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-moz-box-shadow: 0 15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								box-shadow: 0 15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-webkit-transform: rotate(-3deg);
								-moz-transform: rotate(-3deg);
								-ms-transform: rotate(-3deg);
								-o-transform: rotate(-3deg);
								transform: rotate(-3deg);
								z-index: -1;
								position: absolute;
								content: "";
							}
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								transform: rotate(3deg);
								-moz-transform: rotate(3deg);
								-webkit-transform: rotate(3deg);
								right: 10px;
								left: auto;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_06'] == 'shadow03') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:before {
								bottom: 15px;
								left: 10px;
								width: 50%;
								height: 20%;
								max-width: 300px;
								max-height: 100px;
								-webkit-box-shadow: 0 15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-moz-box-shadow: 0 15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								box-shadow: 0 15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-webkit-transform: rotate(-3deg);
								-moz-transform: rotate(-3deg);
								-ms-transform: rotate(-3deg);
								-o-transform: rotate(-3deg);
								transform: rotate(-3deg);
								z-index: -1;
								position: absolute;
								content: "";
							}
						<?php } else if($tspt_settings['TS_PTable_ST_06'] == 'shadow04') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								bottom: 15px;
								right: 10px;
								width: 50%;
								height: 20%;
								max-width: 300px;
								max-height: 100px;
								-webkit-box-shadow: 0 15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-moz-box-shadow: 0 15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								box-shadow: 0 15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-webkit-transform: rotate(3deg);
								-moz-transform: rotate(3deg);
								-ms-transform: rotate(3deg);
								-o-transform: rotate(3deg);
								transform: rotate(3deg);
								z-index: -1;
								position: absolute;
								content: "";
							}
						<?php } else if($tspt_settings['TS_PTable_ST_06'] == 'shadow05') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:before, .TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								top: 15px;
								left: 10px;
								width: 50%;
								height: 20%;
								max-width: 300px;
								max-height: 100px;
								z-index: -1;
								position: absolute;
								content: "";
								background: <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								box-shadow: 0 -15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-webkit-box-shadow: 0 -15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-moz-box-shadow: 0 -15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								transform: rotate(3deg);
								-moz-transform: rotate(3deg);
								-webkit-transform: rotate(3deg);
							}
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								transform: rotate(-3deg);
								-moz-transform: rotate(-3deg);
								-webkit-transform: rotate(-3deg);
								right: 10px;
								left: auto;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_06'] == 'shadow06') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								position:relative;
								box-shadow:0 1px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>, 0 0 40px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?> inset;
								-webkit-box-shadow:0 1px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>, 0 0 40px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?> inset;
								-moz-box-shadow:0 1px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>, 0 0 40px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?> inset;
							}
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:before, .TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								content:"";
								position:absolute;
								z-index:-1;
								box-shadow:0 0 20px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-webkit-box-shadow:0 0 20px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-moz-box-shadow:0 0 20px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								top:50%;
								bottom:0;
								left:10px;
								right:10px;
								border-radius:100px / 10px;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_06'] == 'shadow07') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								position:relative;
								box-shadow:0 1px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>, 0 0 40px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?> inset;
								-webkit-box-shadow:0 1px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>, 0 0 40px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?> inset;
								-moz-box-shadow:0 1px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>, 0 0 40px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?> inset;
							}
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:before, .TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								content:"";
								position:absolute;
								z-index:-1;
								box-shadow:0 0 20px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-webkit-box-shadow:0 0 20px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-moz-box-shadow:0 0 20px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								top:0;
								bottom:0;
								left:10px;
								right:10px;
								border-radius:100px / 10px;
							}
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								right:10px;
								left:auto;
								transform:skew(8deg) rotate(3deg);
								-moz-transform:skew(8deg) rotate(3deg);
								-webkit-transform:skew(8deg) rotate(3deg);
							}
						<?php } else if($tspt_settings['TS_PTable_ST_06'] == 'shadow08') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								position:relative;
								box-shadow:0 1px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>, 0 0 40px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?> inset;
								-webkit-box-shadow:0 1px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>, 0 0 40px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?> inset;
								-moz-box-shadow:0 1px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>, 0 0 40px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?> inset;
							}
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:before, .TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								content:"";
								position:absolute;
								z-index:-1;
								box-shadow:0 0 20px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-webkit-box-shadow:0 0 20px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-moz-box-shadow:0 0 20px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								top:10px;
								bottom:10px;
								left:0;
								right:0;
								border-radius:100px / 10px;
							}
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								right:10px;
								left:auto;
								transform:skew(8deg) rotate(3deg);
								-moz-transform:skew(8deg) rotate(3deg);
								-webkit-transform:skew(8deg) rotate(3deg);
							}
						<?php } else if($tspt_settings['TS_PTable_ST_06'] == 'shadow09') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								box-shadow: 0 0 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-webkit-box-shadow: 0 0 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-moz-box-shadow: 0 0 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_06'] == 'shadow10') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								box-shadow: 4px -4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-moz-box-shadow: 4px -4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-webkit-box-shadow: 4px -4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_06'] == 'shadow11') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								box-shadow: 5px 5px 3px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-moz-box-shadow: 5px 5px 3px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-webkit-box-shadow: 5px 5px 3px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_06'] == 'shadow12') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								box-shadow: 2px 2px white, 4px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-moz-box-shadow: 2px 2px white, 4px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-webkit-box-shadow: 2px 2px white, 4px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_06'] == 'shadow13') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								box-shadow: 8px 8px 18px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-moz-box-shadow: 8px 8px 18px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-webkit-box-shadow: 8px 8px 18px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_06'] == 'shadow14') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								box-shadow: 0 8px 6px -6px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-moz-box-shadow: 0 8px 6px -6px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-webkit-box-shadow: 0 8px 6px -6px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_06'] == 'shadow15') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								box-shadow: 0 0 18px 7px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-moz-box-shadow: 0 0 18px 7px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-webkit-box-shadow: 0 0 18px 7px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
							}
						<?php } ?>
						.TS_PTable__<?php echo esc_attr( $tspt_column['id'] );?> {
							padding: 30px 0;
							border: <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>px solid <?php echo esc_attr($tspt_settings['TS_PTable_ST_04']);?>;
							text-align: center;
							overflow: hidden;
							position: relative;
							background-color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_03']);?>;
						}
						.TS_PTable__<?php echo esc_attr( $tspt_column['id'] );?>:before {
							content: "";
							border-right: 70px solid <?php echo esc_attr($tspt_settings['TS_PTable_ST_28']);?>;
							border-top: 70px solid transparent;
							border-bottom: 70px solid transparent;
							position: absolute;
							top: 30px;
							right: -100px;
							transition: all 0.3s ease 0s;
						}
						.TS_PTable__<?php echo esc_attr( $tspt_column['id'] );?>:hover:before {
							right: 0;
						}
						.TS_PTable_Title_<?php echo esc_attr( $tspt_column['id'] );?> {
							font-size: <?php echo esc_attr($tspt_settings['TS_PTable_ST_08']);?>px;
							font-family: <?php echo esc_attr($tspt_settings['TS_PTable_ST_09']);?>;
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_10']);?>;
							margin: 10px 0 !important;
							padding: 0 !important;
						}
						.TS_PTable_Title_IconTB_<?php echo esc_attr( $tspt_column['id'] );?> {
							display: block;
						}
						.TS_PTable_Title_IconLR_<?php echo esc_attr( $tspt_column['id'] );?> {
							margin: 0 10px !important;
						}
						.TS_PTable_Title_Icon_<?php echo esc_attr( $tspt_column['id'] );?> i {
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_11']);?>;
							font-size: <?php echo esc_attr($tspt_settings['TS_PTable_ST_12']);?>px;
						}
						.TS_PTable_PValue_<?php echo esc_attr( $tspt_column['id'] );?> {
							font-size: <?php echo esc_attr($tspt_settings['TS_PTable_ST_14']);?>px;
							font-family: <?php echo esc_attr($tspt_settings['TS_PTable_ST_15']);?>;
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_16']);?>;
							margin: 10px 0 !important;
						}
						.TS_PTable_PPlan_<?php echo esc_attr( $tspt_column['id'] );?> {
							display: inline-block;
							font-size: <?php echo esc_attr($tspt_settings['TS_PTable_ST_17']);?>px;
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_18']);?>;
						}
						.TS_PTable_Features_<?php echo esc_attr( $tspt_column['id'] );?> {
							padding: 0 !important;
							margin: 20px 0 !important;
							list-style: none;
						}
						.TS_PTable_Features_<?php echo esc_attr( $tspt_column['id'] );?> li:before {
							content: '' !important;
							display: none !important;
						}
						.TS_PTable_Features_<?php echo esc_attr( $tspt_column['id'] );?> li {
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_21']);?>;
							font-size: <?php echo esc_attr($tspt_settings['TS_PTable_ST_22']);?>px;
							font-family: <?php echo esc_attr($tspt_settings['TS_PTable_ST_23']);?>;
							line-height: 1;
							padding: 10px;
						}
						.TS_PTable_Features_<?php echo esc_attr( $tspt_column['id'] );?> li:nth-child(even) {
							background: <?php echo esc_attr($tspt_settings['TS_PTable_ST_19']);?>;
						}
						.TS_PTable_Features_<?php echo esc_attr( $tspt_column['id'] );?> li:nth-child(odd) {
							background: <?php echo esc_attr($tspt_settings['TS_PTable_ST_20']);?>;
						}
						.TS_PTable_FIcon_<?php echo esc_attr( $tspt_column['id'] );?> {
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_24']);?> !important;
							font-size: <?php echo esc_attr($tspt_settings['TS_PTable_ST_26']);?>px;
							margin: 0 10px !important;
						}
						.TS_PTable_FIcon_<?php echo esc_attr( $tspt_column['id'] );?>.TS_PTable_FCheck {
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_25']);?> !important;
						}
						.TS_PTable_Button_<?php echo esc_attr( $tspt_column['id'] );?> {
							display: inline-block;
							padding: 7px 30px;
							background: <?php echo esc_attr($tspt_settings['TS_PTable_ST_28']);?>;
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_29']);?>;
							font-size: <?php echo esc_attr($tspt_settings['TS_PTable_ST_30']);?>px;
							font-family: <?php echo esc_attr($tspt_settings['TS_PTable_ST_31']);?>;
							text-decoration: none;
							outline: none;
							box-shadow: none;
							-webkit-box-shadow: none;
							-moz-box-shadow: none;
							border-bottom: none;
							transition: all 0.5s ease 0s;
							cursor: pointer !important;
						}
						.TS_PTable_Button_<?php echo esc_attr( $tspt_column['id'] );?>:hover, .TS_PTable_Button_<?php echo esc_attr( $tspt_column['id'] );?>:focus {
							text-decoration: none;
							outline: none;
							box-shadow: none;
							-webkit-box-shadow: none;
							-moz-box-shadow: none;
							border-bottom: none;
							background: <?php echo esc_attr($tspt_settings['TS_PTable_ST_28']);?>;
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_29']);?>;
							font-size: <?php echo esc_attr($tspt_settings['TS_PTable_ST_30']);?>px;
							font-family: <?php echo esc_attr($tspt_settings['TS_PTable_ST_31']);?>;
						}
						.TS_PTable_BIconA_<?php echo esc_attr( $tspt_column['id'] );?>, .TS_PTable_BIconB_<?php echo esc_attr( $tspt_column['id'] );?> {
							font-size: <?php echo esc_attr($tspt_settings['TS_PTable_ST_32']);?>px;
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_33']);?>;
						}
						.TS_PTable_BIconB_<?php echo esc_attr( $tspt_column['id'] );?> {
							margin: 0 10px 0 0 !important;
						}
						.TS_PTable_BIconA_<?php echo esc_attr( $tspt_column['id'] );?> {
							margin: 0 0 0 10px !important;
						}
						.TS_PTable__<?php echo esc_attr( $tspt_column['id'] );?>:hover .TS_PTable_Button_<?php echo esc_attr( $tspt_column['id'] );?> {
							border-radius: 30px;
						}
					</style>
					<div class="TS_PTable_Container_Col_<?php echo esc_attr( $tspt_column['id'] );?>">
						<div class="TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>">
							<div class="TS_PTable__<?php echo esc_attr( $tspt_column['id'] );?>">
								<?php if($tspt_column['TS_PTable_TIcon'] == 'none'){ ?>
									<h3 class="TS_PTable_Title_<?php echo esc_attr( $tspt_column['id'] );?>"><?php echo esc_html(html_entity_decode($tspt_column['TS_PTable_TText']));?></h3>
								<?php } else { ?>
									<?php if( $tspt_settings['TS_PTable_ST_13'] == 'after' ){ ?>
										<h3 class="TS_PTable_Title_<?php echo esc_attr( $tspt_column['id'] );?>">
											<?php echo esc_html(html_entity_decode($tspt_column['TS_PTable_TText']));?>
											<span class="TS_PTable_Title_Icon_<?php echo esc_attr( $tspt_column['id'] );?> TS_PTable_Title_IconLR_<?php echo esc_attr( $tspt_column['id'] );?>">
												<i class="totalsoft totalsoft-<?php echo esc_attr($tspt_column['TS_PTable_TIcon']);?>"></i>
											</span>
										</h3>
									<?php } else if( $tspt_settings['TS_PTable_ST_13'] == 'before' ) { ?>
										<h3 class="TS_PTable_Title_<?php echo esc_attr( $tspt_column['id'] );?>">
											<span class="TS_PTable_Title_Icon_<?php echo esc_attr( $tspt_column['id'] );?> TS_PTable_Title_IconLR_<?php echo esc_attr( $tspt_column['id'] );?>">
												<i class="totalsoft totalsoft-<?php echo esc_attr($tspt_column['TS_PTable_TIcon']);?>"></i>
											</span>
											<?php echo esc_html(html_entity_decode($tspt_column['TS_PTable_TText']));?>
										</h3>
									<?php } else if( $tspt_settings['TS_PTable_ST_13'] == 'above' ) { ?>
										<span class="TS_PTable_Title_Icon_<?php echo esc_attr( $tspt_column['id'] );?> TS_PTable_Title_IconTB_<?php echo esc_attr( $tspt_column['id'] );?>">
											<i class="totalsoft totalsoft-<?php echo esc_attr($tspt_column['TS_PTable_TIcon']);?>"></i>
										</span>
										<h3 class="TS_PTable_Title_<?php echo esc_attr( $tspt_column['id'] );?>"><?php echo esc_html(html_entity_decode($tspt_column['TS_PTable_TText']));?>
									</h3>
									<?php } else if( $tspt_settings['TS_PTable_ST_13'] == 'under' ) { ?>
										<h3 class="TS_PTable_Title_<?php echo esc_attr( $tspt_column['id'] );?>"><?php echo esc_html(html_entity_decode($tspt_column['TS_PTable_TText']));?>
									</h3>
										<span class="TS_PTable_Title_Icon_<?php echo esc_attr( $tspt_column['id'] );?> TS_PTable_Title_IconTB_<?php echo esc_attr( $tspt_column['id'] );?>">
											<i class="totalsoft totalsoft-<?php echo esc_attr($tspt_column['TS_PTable_TIcon']);?>"></i>
										</span>
									<?php }?>
								<?php }?>
								<div class="TS_PTable_PValue_<?php echo esc_attr( $tspt_column['id'] );?>">
									<?php echo esc_attr($tspt_column['TS_PTable_PCur']);?><?php echo esc_html($tspt_column['TS_PTable_PVal']);?>
									<span class="TS_PTable_PPlan_<?php echo esc_attr( $tspt_column['id'] );?>"><?php echo esc_html($tspt_column['TS_PTable_PPlan']);?></span>
								</div>
								<?php if($tspt_column['TS_PTable_FCount'] != 0){ ?>
									<ul class="TS_PTable_Features_<?php echo esc_attr( $tspt_column['id'] );?>">
										<?php $TS_PTable_FIcon = explode('TSPTFI', $tspt_column['TS_PTable_FIcon']); ?>
										<?php $TS_PTable_FText = explode('TSPTFT', $tspt_column['TS_PTable_FText']); ?>
										<?php $TS_PTable_FChek = explode('TSPTFC', $tspt_column['TS_PTable_C_01']); ?>
										<?php for($j = 0; $j < $tspt_column['TS_PTable_FCount']; $j++) { ?>
											<?php if($TS_PTable_FChek[$j] != ''){ $TS_PTable_FCheck = 'TS_PTable_FCheck'; }else{ $TS_PTable_FCheck = ''; }?>
											<li>
												<?php if($tspt_settings['TS_PTable_ST_27'] == 'before' && $TS_PTable_FIcon[$j] != 'none'){ ?>
													<i class="totalsoft totalsoft-<?php echo esc_attr($TS_PTable_FIcon[$j]);?> TS_PTable_FIcon_<?php echo esc_attr( $tspt_column['id'] );?> <?php echo esc_html($TS_PTable_FCheck);?>"></i>
												<?php }?>
												<?php echo esc_html(html_entity_decode($TS_PTable_FText[$j]));?>
												<?php if($tspt_settings['TS_PTable_ST_27'] == 'after' && $TS_PTable_FIcon[$j] != 'none'){ ?>
													<i class="totalsoft totalsoft-<?php echo esc_attr($TS_PTable_FIcon[$j]);?> TS_PTable_FIcon_<?php echo esc_attr( $tspt_column['id'] );?> <?php echo esc_html($TS_PTable_FCheck);?>"></i>
												<?php }?>
											</li>
										<?php }?>
									</ul>
								<?php }?>
								<a href="<?php echo esc_html($tspt_column['TS_PTable_BLink']);?>" class="TS_PTable_Button_<?php echo esc_attr( $tspt_column['id'] );?>">
									<?php if($tspt_settings['TS_PTable_ST_34'] == 'before' && $tspt_column['TS_PTable_BIcon'] != 'none'){ ?>
										<i class="totalsoft totalsoft-<?php echo esc_html($tspt_column['TS_PTable_BIcon']);?> TS_PTable_BIconB_<?php echo esc_attr( $tspt_column['id'] );?>"></i>
									<?php }?>
									<?php echo esc_html(html_entity_decode($tspt_column['TS_PTable_BText']));?>
									<?php if($tspt_settings['TS_PTable_ST_34'] == 'after' && $tspt_column['TS_PTable_BIcon'] != 'none'){ ?>
										<i class="totalsoft totalsoft-<?php echo esc_html($tspt_column['TS_PTable_BIcon']);?> TS_PTable_BIconA_<?php echo esc_attr( $tspt_column['id'] );?>"></i>
									<?php }?>
								</a>
							</div>
						</div>
					</div>
				<?php } else if($tspt_manager['Total_Soft_PTable_Them'] == 'type2'){ ?>
					<style type="text/css">
						.TS_PTable_Container_Col_<?php echo esc_attr( $tspt_column['id'] );?> {
							position: relative;
							min-height: 1px;
							padding: 0 18px;
							float: left;
							width: <?php echo esc_attr($tspt_settings['TS_PTable_ST_01']);?>%;
							<?php if( $tspt_settings['TS_PTable_ST_02'] == 'on' ) { ?>
								-webkit-transform: scale(1.05, 1.05);
								-moz-transform: scale(1.05, 1.05);
								transform: scale(1.05, 1.05);
							<?php }?>
							margin-bottom: 30px;
						}
						@media not screen and (min-width: 820px) {
							.TS_PTable_Container { padding: 20px 5px; }
							.TS_PTable_Container_Col_<?php echo esc_attr( $tspt_column['id'] );?> { width: 70%; margin:0 15% 40px 15%; padding: 0 10px; }
						}
						@media not screen and (min-width: 400px) {
							.TS_PTable_Container { padding: 20px 0; }
							.TS_PTable_Container_Col_<?php echo esc_attr( $tspt_column['id'] );?> { width: 100%; margin:0 0 40px 0; padding: 0 5px; }
						}
						.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>  {
							position: relative;
							z-index: 0;
						}
						<?php if($tspt_settings['TS_PTable_ST_04'] == 'none') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								box-shadow: none !important;
								-moz-box-shadow: none !important;
								-webkit-box-shadow: none !important;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_04'] == 'shadow01') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								box-shadow: 0 10px 6px -6px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-webkit-box-shadow: 0 10px 6px -6px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-moz-box-shadow: 0 10px 6px -6px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_04'] == 'shadow02') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:before, .TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								bottom: 15px;
								left: 10px;
								width: 50%;
								height: 20%;
								max-width: 300px;
								max-height: 100px;
								-webkit-box-shadow: 0 15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-moz-box-shadow: 0 15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								box-shadow: 0 15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-webkit-transform: rotate(-3deg);
								-moz-transform: rotate(-3deg);
								-ms-transform: rotate(-3deg);
								-o-transform: rotate(-3deg);
								transform: rotate(-3deg);
								z-index: -1;
								position: absolute;
								content: "";
							}
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								transform: rotate(3deg);
								-moz-transform: rotate(3deg);
								-webkit-transform: rotate(3deg);
								right: 10px;
								left: auto;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_04'] == 'shadow03') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:before {
								bottom: 15px;
								left: 10px;
								width: 50%;
								height: 20%;
								max-width: 300px;
								max-height: 100px;
								-webkit-box-shadow: 0 15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-moz-box-shadow: 0 15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								box-shadow: 0 15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-webkit-transform: rotate(-3deg);
								-moz-transform: rotate(-3deg);
								-ms-transform: rotate(-3deg);
								-o-transform: rotate(-3deg);
								transform: rotate(-3deg);
								z-index: -1;
								position: absolute;
								content: "";
							}
						<?php } else if($tspt_settings['TS_PTable_ST_04'] == 'shadow04') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								bottom: 15px;
								right: 10px;
								width: 50%;
								height: 20%;
								max-width: 300px;
								max-height: 100px;
								-webkit-box-shadow: 0 15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-moz-box-shadow: 0 15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								box-shadow: 0 15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-webkit-transform: rotate(3deg);
								-moz-transform: rotate(3deg);
								-ms-transform: rotate(3deg);
								-o-transform: rotate(3deg);
								transform: rotate(3deg);
								z-index: -1;
								position: absolute;
								content: "";
							}
						<?php } else if($tspt_settings['TS_PTable_ST_04'] == 'shadow05') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:before, .TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								top: 15px;
								left: 10px;
								width: 50%;
								height: 20%;
								max-width: 300px;
								max-height: 100px;
								z-index: -1;
								position: absolute;
								content: "";
								background: <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								box-shadow: 0 -15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-webkit-box-shadow: 0 -15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-moz-box-shadow: 0 -15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								transform: rotate(3deg);
								-moz-transform: rotate(3deg);
								-webkit-transform: rotate(3deg);
							}
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								transform: rotate(-3deg);
								-moz-transform: rotate(-3deg);
								-webkit-transform: rotate(-3deg);
								right: 10px;
								left: auto;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_04'] == 'shadow06') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								position:relative;
								box-shadow:0 1px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>, 0 0 40px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?> inset;
								-webkit-box-shadow:0 1px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>, 0 0 40px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?> inset;
								-moz-box-shadow:0 1px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>, 0 0 40px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?> inset;
							}
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:before, .TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								content:"";
								position:absolute;
								z-index:-1;
								box-shadow:0 0 20px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-webkit-box-shadow:0 0 20px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-moz-box-shadow:0 0 20px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								top:50%;
								bottom:0;
								left:10px;
								right:10px;
								border-radius:100px / 10px;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_04'] == 'shadow07') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								position:relative;
								box-shadow:0 1px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>, 0 0 40px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?> inset;
								-webkit-box-shadow:0 1px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>, 0 0 40px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?> inset;
								-moz-box-shadow:0 1px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>, 0 0 40px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?> inset;
							}
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:before, .TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								content:"";
								position:absolute;
								z-index:-1;
								box-shadow:0 0 20px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-webkit-box-shadow:0 0 20px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-moz-box-shadow:0 0 20px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								top:0;
								bottom:0;
								left:10px;
								right:10px;
								border-radius:100px / 10px;
							}
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								right:10px;
								left:auto;
								transform:skew(8deg) rotate(3deg);
								-moz-transform:skew(8deg) rotate(3deg);
								-webkit-transform:skew(8deg) rotate(3deg);
							}
						<?php } else if($tspt_settings['TS_PTable_ST_04'] == 'shadow08') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								position:relative;
								box-shadow:0 1px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>, 0 0 40px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?> inset;
								-webkit-box-shadow:0 1px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>, 0 0 40px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?> inset;
								-moz-box-shadow:0 1px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>, 0 0 40px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?> inset;
							}
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:before, .TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								content:"";
								position:absolute;
								z-index:-1;
								box-shadow:0 0 20px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-webkit-box-shadow:0 0 20px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-moz-box-shadow:0 0 20px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								top:10px;
								bottom:10px;
								left:0;
								right:0;
								border-radius:100px / 10px;
							}
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								right:10px;
								left:auto;
								transform:skew(8deg) rotate(3deg);
								-moz-transform:skew(8deg) rotate(3deg);
								-webkit-transform:skew(8deg) rotate(3deg);
							}
						<?php } else if($tspt_settings['TS_PTable_ST_04'] == 'shadow09') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								box-shadow: 0 0 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-webkit-box-shadow: 0 0 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-moz-box-shadow: 0 0 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_04'] == 'shadow10') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								box-shadow: 4px -4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-moz-box-shadow: 4px -4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-webkit-box-shadow: 4px -4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_04'] == 'shadow11') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								box-shadow: 5px 5px 3px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-moz-box-shadow: 5px 5px 3px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-webkit-box-shadow: 5px 5px 3px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_04'] == 'shadow12') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								box-shadow: 2px 2px white, 4px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-moz-box-shadow: 2px 2px white, 4px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-webkit-box-shadow: 2px 2px white, 4px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_04'] == 'shadow13') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								box-shadow: 8px 8px 18px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-moz-box-shadow: 8px 8px 18px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-webkit-box-shadow: 8px 8px 18px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_04'] == 'shadow14') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								box-shadow: 0 8px 6px -6px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-moz-box-shadow: 0 8px 6px -6px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-webkit-box-shadow: 0 8px 6px -6px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_04'] == 'shadow15') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								box-shadow: 0 0 18px 7px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-moz-box-shadow: 0 0 18px 7px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-webkit-box-shadow: 0 0 18px 7px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
							}
						<?php } ?>
						.TS_PTable__<?php echo esc_attr( $tspt_column['id'] );?> {
							text-align: center;
							position: relative;
							background: <?php echo esc_attr($tspt_settings['TS_PTable_ST_19']);?>;
						}
						.TS_PTable_Div1_<?php echo esc_attr( $tspt_column['id'] );?> {
							background-color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_03']);?>;
							padding: 30px 0 1px;
						}
						.TS_PTable_Title_<?php echo esc_attr( $tspt_column['id'] );?> {
							font-size: <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>px;
							font-family: <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_08']);?>;
							margin: 10px 0 !important;
							padding: 0 !important;
						}
						.TS_PTable_Title_Icon_<?php echo esc_attr( $tspt_column['id'] );?> {
							display: block;
						}
						.TS_PTable_Title_Icon_<?php echo esc_attr( $tspt_column['id'] );?> i {
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_09']);?>;
							font-size: <?php echo esc_attr($tspt_settings['TS_PTable_ST_10']);?>px;
						}
						.TS_PTable_PValue_<?php echo esc_attr( $tspt_column['id'] );?> {
							padding: 20px 0 14px;
							margin: 23px -10px 30px;
							background: <?php echo esc_attr($tspt_settings['TS_PTable_ST_11']);?>;
							font-family: <?php echo esc_attr($tspt_settings['TS_PTable_ST_12']);?>;
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_13']);?>;
							position: relative;
							transition: all 0.3s ease-in-out 0s;
							-moz-transition: all 0.3s ease-in-out 0s;
							-webkit-transition: all 0.3s ease-in-out 0s;
						}
						.TS_PTable__<?php echo esc_attr( $tspt_column['id'] );?>:hover .TS_PTable_PValue_<?php echo esc_attr( $tspt_column['id'] );?> {
							background: <?php echo esc_attr($tspt_settings['TS_PTable_ST_17']);?>;
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_18']);?>;
						}
						.TS_PTable_PValue_<?php echo esc_attr( $tspt_column['id'] );?>:before, .TS_PTable_PValue_<?php echo esc_attr( $tspt_column['id'] );?>:after {
							content: "";
							display: block;
							width: 10px;
							height: 15px;
							border-width: 13px 5px 11px;
							border-style: solid;
							border-color: transparent <?php echo esc_attr($tspt_settings['TS_PTable_ST_11']);?> <?php echo esc_attr($tspt_settings['TS_PTable_ST_11']);?> transparent;
							position: absolute;
							left: 0;
							transition: all 0.3s ease-in-out 0s;
							-moz-transition: all 0.3s ease-in-out 0s;
							-webkit-transition: all 0.3s ease-in-out 0s;
							<?php if( $tspt_settings['TS_PTable_ST_02'] == 'on' ) { ?>
								top: -23px;
							<?php } else { ?>
								top: -24px;
							<?php }?>
						}
						.TS_PTable_PValue_<?php echo esc_attr( $tspt_column['id'] );?>:after {
							border-width: 11px 5px;
							border-color: transparent transparent <?php echo esc_attr($tspt_settings['TS_PTable_ST_11']);?> <?php echo esc_attr($tspt_settings['TS_PTable_ST_11']);?>;
							<?php if( $tspt_settings['TS_PTable_ST_02'] == 'on' ) { ?>
								top: -21px;
							<?php } else { ?>
								top: -22px;
							<?php }?>
							left: auto;
							right: 0;
						}
						.TS_PTable__<?php echo esc_attr( $tspt_column['id'] );?>:hover .TS_PTable_PValue_<?php echo esc_attr( $tspt_column['id'] );?>:before {
							border-color: transparent <?php echo esc_attr($tspt_settings['TS_PTable_ST_17']);?> <?php echo esc_attr($tspt_settings['TS_PTable_ST_17']);?> transparent;
						}
						.TS_PTable__<?php echo esc_attr( $tspt_column['id'] );?>:hover .TS_PTable_PValue_<?php echo esc_attr( $tspt_column['id'] );?>:after {
							border-color: transparent transparent <?php echo esc_attr($tspt_settings['TS_PTable_ST_17']);?> <?php echo esc_attr($tspt_settings['TS_PTable_ST_17']);?>;
						}
						.TS_PTable_Amount_<?php echo esc_attr( $tspt_column['id'] );?> {
							display: inline-block;
							font-size: <?php echo esc_attr($tspt_settings['TS_PTable_ST_15']);?>px;
							position: relative;
						}
						.TS_PTable_PCur_<?php echo esc_attr( $tspt_column['id'] );?> {
							font-size: <?php echo esc_attr($tspt_settings['TS_PTable_ST_14']);?>px;
							top: 0 !important;
							vertical-align: super !important;
							line-height: 1 !important;
						}
						.TS_PTable_PPlan_<?php echo esc_attr( $tspt_column['id'] );?> {
							font-size: <?php echo esc_attr($tspt_settings['TS_PTable_ST_16']);?>px;
						}
						.TS_PTable_Features_<?php echo esc_attr( $tspt_column['id'] );?> {
							padding: 0 !important;
							margin: 0 !important;
							list-style: none;
							background: <?php echo esc_attr($tspt_settings['TS_PTable_ST_19']);?>;
						}
						.TS_PTable_Features_<?php echo esc_attr( $tspt_column['id'] );?> li:before {
							content: '' !important;
							display: none !important;
						}
						.TS_PTable_Features_<?php echo esc_attr( $tspt_column['id'] );?> li {
							background: <?php echo esc_attr($tspt_settings['TS_PTable_ST_19']);?>;
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_20']);?>;
							font-size: <?php echo esc_attr($tspt_settings['TS_PTable_ST_21']);?>px;
							font-family: <?php echo esc_attr($tspt_settings['TS_PTable_ST_22']);?>;
							line-height: 1;
							padding: 10px;
						}
						.TS_PTable_FIcon_<?php echo esc_attr( $tspt_column['id'] );?> {
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_23']);?> !important;
							font-size: <?php echo esc_attr($tspt_settings['TS_PTable_ST_25']);?>px;
							margin: 0 10px !important;
						}
						.TS_PTable_FIcon_<?php echo esc_attr( $tspt_column['id'] );?>.TS_PTable_FCheck {
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_24']);?> !important;
						}
						.TS_PTable_Div2_<?php echo esc_attr( $tspt_column['id'] );?> {
							background-color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_03']);?>;
							padding: 20px 0 30px;
						}
						.TS_PTable_Button_<?php echo esc_attr( $tspt_column['id'] );?> {
							display: block;
							padding: 10px 0;
							font-size: <?php echo esc_attr($tspt_settings['TS_PTable_ST_27']);?>px;
							font-family: <?php echo esc_attr($tspt_settings['TS_PTable_ST_28']);?>;
							background: <?php echo esc_attr($tspt_settings['TS_PTable_ST_11']);?>;
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_13']);?>;
							border-top: 2px solid <?php echo esc_attr($tspt_settings['TS_PTable_ST_13']);?>;
							border-bottom: 2px solid <?php echo esc_attr($tspt_settings['TS_PTable_ST_13']);?>;
							transition: all 0.5s ease 0s;
							-moz-transition: all 0.5s ease 0s;
							-webkit-transition: all 0.5s ease 0s;
							text-decoration: none;
							outline: none;
							box-shadow: none;
							-webkit-box-shadow: none;
							-moz-box-shadow: none;
							cursor: pointer !important;
						}
						.TS_PTable__<?php echo esc_attr( $tspt_column['id'] );?>:hover .TS_PTable_Button_<?php echo esc_attr( $tspt_column['id'] );?> {
							background: <?php echo esc_attr($tspt_settings['TS_PTable_ST_17']);?>;
							border-top: 2px solid <?php echo esc_attr($tspt_settings['TS_PTable_ST_18']);?>;
							border-bottom: 2px solid <?php echo esc_attr($tspt_settings['TS_PTable_ST_18']);?>;
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_18']);?>;
						}
						.TS_PTable_Button_<?php echo esc_attr( $tspt_column['id'] );?>:hover, .TS_PTable_Button_<?php echo esc_attr( $tspt_column['id'] );?>:focus {
							text-decoration: none;
							outline: none;
							box-shadow: none;
							-webkit-box-shadow: none;
							-moz-box-shadow: none;
						}
						.TS_PTable_BIconA_<?php echo esc_attr( $tspt_column['id'] );?>, .TS_PTable_BIconB_<?php echo esc_attr( $tspt_column['id'] );?> {
							font-size: <?php echo esc_attr($tspt_settings['TS_PTable_ST_29']);?>px;
						}
						.TS_PTable_BIconB_<?php echo esc_attr( $tspt_column['id'] );?> {
							margin: 0 10px 0 0 !important;
						}
						.TS_PTable_BIconA_<?php echo esc_attr( $tspt_column['id'] );?> {
							margin: 0 0 0 10px !important;
						}
					</style>
					<div class="TS_PTable_Container_Col_<?php echo esc_attr( $tspt_column['id'] );?>">
						<div class="TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>">
							<div class="TS_PTable__<?php echo esc_attr( $tspt_column['id'] );?>">
								<div class="TS_PTable_Div1_<?php echo esc_attr( $tspt_column['id'] );?>">
									<?php if($tspt_column['TS_PTable_TIcon'] == 'none'){ ?>
										<h3 class="TS_PTable_Title_<?php echo esc_attr( $tspt_column['id'] );?>"><?php echo esc_html(html_entity_decode($tspt_column['TS_PTable_TText']));?>
									</h3>
									<?php } else { ?>
										<span class="TS_PTable_Title_Icon_<?php echo esc_attr( $tspt_column['id'] );?>">
											<i class="totalsoft totalsoft-<?php echo esc_attr($tspt_column['TS_PTable_TIcon']);?>"></i>
										</span>
										<h3 class="TS_PTable_Title_<?php echo esc_attr( $tspt_column['id'] );?>"><?php echo esc_html(html_entity_decode($tspt_column['TS_PTable_TText']));?>
									</h3>
									<?php }?>
									<div class="TS_PTable_PValue_<?php echo esc_attr( $tspt_column['id'] );?>">
										<span class="TS_PTable_Amount_<?php echo esc_attr( $tspt_column['id'] );?>">
											<sup class="TS_PTable_PCur_<?php echo esc_attr( $tspt_column['id'] );?>"><?php echo esc_attr($tspt_column['TS_PTable_PCur']);?></sup>
											<?php echo esc_html($tspt_column['TS_PTable_PVal']);?>
											<sub class="TS_PTable_PPlan_<?php echo esc_attr( $tspt_column['id'] );?>"><?php echo esc_html($tspt_column['TS_PTable_PPlan']);?></sub>
										</span>
									</div>
								</div>
								<?php if($tspt_column['TS_PTable_FCount'] != 0){ ?>
									<ul class="TS_PTable_Features_<?php echo esc_attr( $tspt_column['id'] );?>">
										<?php $TS_PTable_FIcon = explode('TSPTFI', $tspt_column['TS_PTable_FIcon']); ?>
										<?php $TS_PTable_FText = explode('TSPTFT', $tspt_column['TS_PTable_FText']); ?>
										<?php $TS_PTable_FChek = explode('TSPTFC', $tspt_column['TS_PTable_C_01']); ?>
										<?php for($j = 0; $j < $tspt_column['TS_PTable_FCount']; $j++) { ?>
											<?php if($TS_PTable_FChek[$j] != ''){ $TS_PTable_FCheck = 'TS_PTable_FCheck'; }else{ $TS_PTable_FCheck = ''; }?>
											<li>
												<?php if($tspt_settings['TS_PTable_ST_26'] == 'before' && $TS_PTable_FIcon[$j] != 'none'){ ?>
													<i class="totalsoft totalsoft-<?php echo esc_attr($TS_PTable_FIcon[$j]);?> TS_PTable_FIcon_<?php echo esc_attr( $tspt_column['id'] );?> <?php echo esc_html($TS_PTable_FCheck);?>"></i>
												<?php }?>
												<?php echo esc_html(html_entity_decode($TS_PTable_FText[$j]));?>
												<?php if($tspt_settings['TS_PTable_ST_26'] == 'after' && $TS_PTable_FIcon[$j] != 'none'){ ?>
													<i class="totalsoft totalsoft-<?php echo esc_attr($TS_PTable_FIcon[$j]);?> TS_PTable_FIcon_<?php echo esc_attr( $tspt_column['id'] );?> <?php echo esc_html($TS_PTable_FCheck);?>"></i>
												<?php }?>
											</li>
										<?php }?>
									</ul>
								<?php }?>
								<div class="TS_PTable_Div2_<?php echo esc_attr( $tspt_column['id'] );?>">
									<a href="<?php echo esc_html($tspt_column['TS_PTable_BLink']);?>" class="TS_PTable_Button_<?php echo esc_attr( $tspt_column['id'] );?>">
										<?php if($tspt_settings['TS_PTable_ST_30'] == 'before' && $tspt_column['TS_PTable_BIcon'] != 'none'){ ?>
											<i class="totalsoft totalsoft-<?php echo esc_html($tspt_column['TS_PTable_BIcon']);?> TS_PTable_BIconB_<?php echo esc_attr( $tspt_column['id'] );?>"></i>
										<?php }?>
										<?php echo esc_html(html_entity_decode($tspt_column['TS_PTable_BText']));?>
										<?php if($tspt_settings['TS_PTable_ST_30'] == 'after' && $tspt_column['TS_PTable_BIcon'] != 'none'){ ?>
											<i class="totalsoft totalsoft-<?php echo esc_html($tspt_column['TS_PTable_BIcon']);?> TS_PTable_BIconA_<?php echo esc_attr( $tspt_column['id'] );?>"></i>
										<?php }?>
									</a>
								</div>
							</div>
						</div>
					</div>
				<?php } else if($tspt_manager['Total_Soft_PTable_Them'] == 'type3'){ ?>
					<style type="text/css">
						.TS_PTable_Container_Col_<?php echo esc_attr( $tspt_column['id'] );?> {
							position: relative;
							min-height: 1px;
							padding: 0 18px;
							float: left;
							width: <?php echo esc_attr($tspt_settings['TS_PTable_ST_01']);?>%;
							<?php if( $tspt_settings['TS_PTable_ST_02'] == 'on' ) { ?>
								-webkit-transform: scale(1.1, 1.1);
								-moz-transform: scale(1.1, 1.1);
								transform: scale(1.1, 1.1);
							<?php }?>
							margin-bottom: 30px;
						}
						@media not screen and (min-width: 820px) {
							.TS_PTable_Container { padding: 20px 5px; }
							.TS_PTable_Container_Col_<?php echo esc_attr( $tspt_column['id'] );?> { width: 70%; margin:0 15% 40px 15%; padding: 0 10px; }
						}
						@media not screen and (min-width: 400px) {
							.TS_PTable_Container { padding: 20px 0; }
							.TS_PTable_Container_Col_<?php echo esc_attr( $tspt_column['id'] );?> { width: 100%; margin:0 0 40px 0; padding: 0 5px; }
						}
						.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>  {
							position: relative;
							z-index: 0;
						}
						<?php if($tspt_settings['TS_PTable_ST_06'] == 'none') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								box-shadow: none !important;
								-moz-box-shadow: none !important;
								-webkit-box-shadow: none !important;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_06'] == 'shadow01') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								box-shadow: 0 10px 6px -6px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-webkit-box-shadow: 0 10px 6px -6px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-moz-box-shadow: 0 10px 6px -6px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_06'] == 'shadow02') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:before, .TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								bottom: 15px;
								left: 10px;
								width: 50%;
								height: 20%;
								max-width: 300px;
								max-height: 100px;
								-webkit-box-shadow: 0 15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-moz-box-shadow: 0 15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								box-shadow: 0 15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-webkit-transform: rotate(-3deg);
								-moz-transform: rotate(-3deg);
								-ms-transform: rotate(-3deg);
								-o-transform: rotate(-3deg);
								transform: rotate(-3deg);
								z-index: -1;
								position: absolute;
								content: "";
							}
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								transform: rotate(3deg);
								-moz-transform: rotate(3deg);
								-webkit-transform: rotate(3deg);
								right: 10px;
								left: auto;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_06'] == 'shadow03') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:before {
								bottom: 15px;
								left: 10px;
								width: 50%;
								height: 20%;
								max-width: 300px;
								max-height: 100px;
								-webkit-box-shadow: 0 15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-moz-box-shadow: 0 15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								box-shadow: 0 15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-webkit-transform: rotate(-3deg);
								-moz-transform: rotate(-3deg);
								-ms-transform: rotate(-3deg);
								-o-transform: rotate(-3deg);
								transform: rotate(-3deg);
								z-index: -1;
								position: absolute;
								content: "";
							}
						<?php } else if($tspt_settings['TS_PTable_ST_06'] == 'shadow04') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								bottom: 15px;
								right: 10px;
								width: 50%;
								height: 20%;
								max-width: 300px;
								max-height: 100px;
								-webkit-box-shadow: 0 15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-moz-box-shadow: 0 15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								box-shadow: 0 15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-webkit-transform: rotate(3deg);
								-moz-transform: rotate(3deg);
								-ms-transform: rotate(3deg);
								-o-transform: rotate(3deg);
								transform: rotate(3deg);
								z-index: -1;
								position: absolute;
								content: "";
							}
						<?php } else if($tspt_settings['TS_PTable_ST_06'] == 'shadow05') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:before, .TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								top: 15px;
								left: 10px;
								width: 50%;
								height: 20%;
								max-width: 300px;
								max-height: 100px;
								z-index: -1;
								position: absolute;
								content: "";
								background: <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								box-shadow: 0 -15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-webkit-box-shadow: 0 -15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-moz-box-shadow: 0 -15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								transform: rotate(3deg);
								-moz-transform: rotate(3deg);
								-webkit-transform: rotate(3deg);
							}
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								transform: rotate(-3deg);
								-moz-transform: rotate(-3deg);
								-webkit-transform: rotate(-3deg);
								right: 10px;
								left: auto;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_06'] == 'shadow06') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								position:relative;
								box-shadow:0 1px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>, 0 0 40px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?> inset;
								-webkit-box-shadow:0 1px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>, 0 0 40px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?> inset;
								-moz-box-shadow:0 1px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>, 0 0 40px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?> inset;
							}
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:before, .TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								content:"";
								position:absolute;
								z-index:-1;
								box-shadow:0 0 20px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-webkit-box-shadow:0 0 20px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-moz-box-shadow:0 0 20px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								top:50%;
								bottom:0;
								left:10px;
								right:10px;
								border-radius:100px / 10px;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_06'] == 'shadow07') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								position:relative;
								box-shadow:0 1px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>, 0 0 40px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?> inset;
								-webkit-box-shadow:0 1px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>, 0 0 40px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?> inset;
								-moz-box-shadow:0 1px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>, 0 0 40px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?> inset;
							}
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:before, .TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								content:"";
								position:absolute;
								z-index:-1;
								box-shadow:0 0 20px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-webkit-box-shadow:0 0 20px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-moz-box-shadow:0 0 20px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								top:0;
								bottom:0;
								left:10px;
								right:10px;
								border-radius:100px / 10px;
							}
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								right:10px;
								left:auto;
								transform:skew(8deg) rotate(3deg);
								-moz-transform:skew(8deg) rotate(3deg);
								-webkit-transform:skew(8deg) rotate(3deg);
							}
						<?php } else if($tspt_settings['TS_PTable_ST_06'] == 'shadow08') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								position:relative;
								box-shadow:0 1px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>, 0 0 40px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?> inset;
								-webkit-box-shadow:0 1px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>, 0 0 40px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?> inset;
								-moz-box-shadow:0 1px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>, 0 0 40px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?> inset;
							}
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:before, .TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								content:"";
								position:absolute;
								z-index:-1;
								box-shadow:0 0 20px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-webkit-box-shadow:0 0 20px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-moz-box-shadow:0 0 20px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								top:10px;
								bottom:10px;
								left:0;
								right:0;
								border-radius:100px / 10px;
							}
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								right:10px;
								left:auto;
								transform:skew(8deg) rotate(3deg);
								-moz-transform:skew(8deg) rotate(3deg);
								-webkit-transform:skew(8deg) rotate(3deg);
							}
						<?php } else if($tspt_settings['TS_PTable_ST_06'] == 'shadow09') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								box-shadow: 0 0 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-webkit-box-shadow: 0 0 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-moz-box-shadow: 0 0 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_06'] == 'shadow10') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								box-shadow: 4px -4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-moz-box-shadow: 4px -4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-webkit-box-shadow: 4px -4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_06'] == 'shadow11') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								box-shadow: 5px 5px 3px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-moz-box-shadow: 5px 5px 3px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-webkit-box-shadow: 5px 5px 3px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_06'] == 'shadow12') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								box-shadow: 2px 2px white, 4px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-moz-box-shadow: 2px 2px white, 4px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-webkit-box-shadow: 2px 2px white, 4px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_06'] == 'shadow13') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								box-shadow: 8px 8px 18px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-moz-box-shadow: 8px 8px 18px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-webkit-box-shadow: 8px 8px 18px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_06'] == 'shadow14') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								box-shadow: 0 8px 6px -6px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-moz-box-shadow: 0 8px 6px -6px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-webkit-box-shadow: 0 8px 6px -6px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_06'] == 'shadow15') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								box-shadow: 0 0 18px 7px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-moz-box-shadow: 0 0 18px 7px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
								-webkit-box-shadow: 0 0 18px 7px <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
							}
						<?php } ?>
						.TS_PTable__<?php echo esc_attr( $tspt_column['id'] );?> {
							text-align: center;
							position: relative;
							border: <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>px solid <?php echo esc_attr($tspt_settings['TS_PTable_ST_04']);?>;
							margin-top: 30px;
						}
						.TS_PTable_Div1_<?php echo esc_attr( $tspt_column['id'] );?> {
							background-color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_03']);?>;
							padding: 50px 0 1px;
						}
						.TS_PTable_Div2_<?php echo esc_attr( $tspt_column['id'] );?> {
							background-color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_03']);?>;
							padding: 20px 0 25px;
						}
						.TS_PTable_Title_Icon_<?php echo esc_attr( $tspt_column['id'] );?> {
							width: 80px;
							height: 80px;
							border-radius: 50%;
							background: <?php echo esc_attr($tspt_settings['TS_PTable_ST_12']);?>;
							border: <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>px solid <?php echo esc_attr($tspt_settings['TS_PTable_ST_04']);?>;
							position: absolute;
							top: -40px;
							left: 50%;
							padding: 10px;
							transform: translateX(-50%);
							-moz-transform: translateX(-50%);
							-webkit-transform: translateX(-50%);
							transition: all 0.5s ease 0s;
							-moz-transition: all 0.5s ease 0s;
							-webkit-transition: all 0.5s ease 0s;
						}
						.TS_PTable__<?php echo esc_attr( $tspt_column['id'] );?>:hover .TS_PTable_Title_Icon_<?php echo esc_attr( $tspt_column['id'] );?> {
							background: <?php echo esc_attr($tspt_settings['TS_PTable_ST_15']);?>;
							transform: translateX(-50%) !important;
							-moz-transform: translateX(-50%) !important;
							-webkit-transform: translateX(-50%) !important;
						}
						.TS_PTable_Title_Icon_<?php echo esc_attr( $tspt_column['id'] );?> i {
							width: 100%;
							height: 100%;
							line-height: 58px;
							border-radius: 50%;
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_12']);?>;
							background: <?php echo esc_attr($tspt_settings['TS_PTable_ST_13']);?>;
							font-size: <?php echo esc_attr($tspt_settings['TS_PTable_ST_14']);?>px;
							transition: all 0.5s ease 0s;
							-moz-transition: all 0.5s ease 0s;
							-webkit-transition: all 0.5s ease 0s;
						}
						.TS_PTable__<?php echo esc_attr( $tspt_column['id'] );?>:hover .TS_PTable_Title_Icon_<?php echo esc_attr( $tspt_column['id'] );?> i {
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_15']);?>;
							background: <?php echo esc_attr($tspt_settings['TS_PTable_ST_16']);?>;
						}
						.TS_PTable_PValue_<?php echo esc_attr( $tspt_column['id'] );?> {
							display: inline-block;
							font-family: <?php echo esc_attr($tspt_settings['TS_PTable_ST_17']);?>;
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_18']);?>;
							font-size: <?php echo esc_attr($tspt_settings['TS_PTable_ST_20']);?>px;
							position: relative;
						}
						.TS_PTable_PCur_<?php echo esc_attr( $tspt_column['id'] );?> {
							font-size: <?php echo esc_attr($tspt_settings['TS_PTable_ST_19']);?>px;
							top: 0 !important;
							vertical-align: super !important;
							line-height: 1 !important;
						}
						.TS_PTable_PPlan_<?php echo esc_attr( $tspt_column['id'] );?> {
							display: block;
							font-family: <?php echo esc_attr($tspt_settings['TS_PTable_ST_17']);?>;
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_18']);?>;
							font-size: <?php echo esc_attr($tspt_settings['TS_PTable_ST_21']);?>px;
						}
						.TS_PTable_Header_<?php echo esc_attr( $tspt_column['id'] );?> {
							position: relative;
							z-index: 1;
						}
						.TS_PTable_Header_<?php echo esc_attr( $tspt_column['id'] );?>:after {
							content: "";
							width: 100%;
							height: 1px;
							background: <?php echo esc_attr($tspt_settings['TS_PTable_ST_04']);?>;
							position: absolute;
							top: 50%;
							left: 0;
							z-index: -1;
						}
						.TS_PTable_Title_<?php echo esc_attr( $tspt_column['id'] );?> {
							width: fit-content;
							margin: 10px auto;
							padding: 10px 15px;
							font-size: <?php echo esc_attr($tspt_settings['TS_PTable_ST_08']);?>px;
							font-family: <?php echo esc_attr($tspt_settings['TS_PTable_ST_09']);?>;
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_10']);?>;
							background: <?php echo esc_attr($tspt_settings['TS_PTable_ST_11']);?>;
							position: relative;
							z-index: 1;
						}
						.TS_PTable_Features_<?php echo esc_attr( $tspt_column['id'] );?> {
							list-style: none;
							padding: 0 !important;
							margin: 0 !important;
							background: <?php echo esc_attr($tspt_settings['TS_PTable_ST_22']);?>;
						}
						.TS_PTable_Features_<?php echo esc_attr( $tspt_column['id'] );?> li:before {
							content: '' !important;
							display: none !important;
						}
						.TS_PTable_Features_<?php echo esc_attr( $tspt_column['id'] );?> li {
							background: <?php echo esc_attr($tspt_settings['TS_PTable_ST_22']);?>;
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_23']);?>;
							font-size: <?php echo esc_attr($tspt_settings['TS_PTable_ST_24']);?>px;
							font-family: <?php echo esc_attr($tspt_settings['TS_PTable_ST_25']);?>;
							line-height: 1;
							padding: 10px;
						}
						.TS_PTable_FIcon_<?php echo esc_attr( $tspt_column['id'] );?> {
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_26']);?> !important;
							font-size: <?php echo esc_attr($tspt_settings['TS_PTable_ST_28']);?>px;
							margin: 0 10px !important;
						}
						.TS_PTable_FIcon_<?php echo esc_attr( $tspt_column['id'] );?>.TS_PTable_FCheck {
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_27']);?> !important;
						}
						.TS_PTable_Button_<?php echo esc_attr( $tspt_column['id'] );?> {
							display: inline-block;
							font-size: <?php echo esc_attr($tspt_settings['TS_PTable_ST_30']);?>px;
							font-family: <?php echo esc_attr($tspt_settings['TS_PTable_ST_31']);?>;
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_35']);?>;
							background: <?php echo esc_attr($tspt_settings['TS_PTable_ST_34']);?>;
							border: 1px solid <?php echo esc_attr($tspt_settings['TS_PTable_ST_35']);?>;
							padding: 5px 20px;
							transition: all 0.5s ease 0s;
							-moz-transition: all 0.5s ease 0s;
							-webkit-transition: all 0.5s ease 0s;
							text-decoration: none;
							outline: none;
							box-shadow: none;
							-webkit-box-shadow: none;
							-moz-box-shadow: none;
							cursor: pointer !important;
						}
						.TS_PTable_Button_<?php echo esc_attr( $tspt_column['id'] );?>:hover {
							background: <?php echo esc_attr($tspt_settings['TS_PTable_ST_36']);?>;
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_37']);?>;
							border: 1px solid <?php echo esc_attr($tspt_settings['TS_PTable_ST_37']);?>;
						}
						.TS_PTable_Button_<?php echo esc_attr( $tspt_column['id'] );?>:hover, .TS_PTable_Button_<?php echo esc_attr( $tspt_column['id'] );?>:focus {
							text-decoration: none;
							outline: none;
							box-shadow: none;
							-webkit-box-shadow: none;
							-moz-box-shadow: none;
						}
						.TS_PTable_BIconA_<?php echo esc_attr( $tspt_column['id'] );?>, .TS_PTable_BIconB_<?php echo esc_attr( $tspt_column['id'] );?> {
							font-size: <?php echo esc_attr($tspt_settings['TS_PTable_ST_32']);?>px;
						}
						.TS_PTable_BIconB_<?php echo esc_attr( $tspt_column['id'] );?> {
							margin: 0 10px 0 0 !important;
						}
						.TS_PTable_BIconA_<?php echo esc_attr( $tspt_column['id'] );?> {
							margin: 0 0 0 10px !important;
						}
					</style>
					<div class="TS_PTable_Container_Col_<?php echo esc_attr( $tspt_column['id'] );?>">
						<div class="TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>">
							<div class="TS_PTable__<?php echo esc_attr( $tspt_column['id'] );?>">
								<div class="TS_PTable_Div1_<?php echo esc_attr( $tspt_column['id'] );?>">
									<?php if($tspt_column['TS_PTable_TIcon'] != 'none'){ ?>
										<div class="TS_PTable_Title_Icon_<?php echo esc_attr( $tspt_column['id'] );?>">
											<i class="totalsoft totalsoft-<?php echo esc_attr($tspt_column['TS_PTable_TIcon']);?>"></i>
										</div>
									<?php }?>
									<div class="TS_PTable_PValue_<?php echo esc_attr( $tspt_column['id'] );?>">
										<sup class="TS_PTable_PCur_<?php echo esc_attr( $tspt_column['id'] );?>"><?php echo esc_attr($tspt_column['TS_PTable_PCur']);?></sup>
										<?php echo esc_html($tspt_column['TS_PTable_PVal']);?>
									</div>
									<span class="TS_PTable_PPlan_<?php echo esc_attr( $tspt_column['id'] );?>"><?php echo esc_html($tspt_column['TS_PTable_PPlan']);?></span>
									<div class="TS_PTable_Header_<?php echo esc_attr( $tspt_column['id'] );?>">
										<h3 class="TS_PTable_Title_<?php echo esc_attr( $tspt_column['id'] );?>"><?php echo esc_html(html_entity_decode($tspt_column['TS_PTable_TText']));?>
									</h3>
									</div>
								</div>
								<?php if($tspt_column['TS_PTable_FCount'] != 0){ ?>
									<div class="TS_PTable_Content_<?php echo esc_attr( $tspt_column['id'] );?>">
										<ul class="TS_PTable_Features_<?php echo esc_attr( $tspt_column['id'] );?>">
											<?php $TS_PTable_FIcon = explode('TSPTFI', $tspt_column['TS_PTable_FIcon']); ?>
											<?php $TS_PTable_FText = explode('TSPTFT', $tspt_column['TS_PTable_FText']); ?>
											<?php $TS_PTable_FChek = explode('TSPTFC', $tspt_column['TS_PTable_C_01']); ?>
											<?php for($j = 0; $j < $tspt_column['TS_PTable_FCount']; $j++) { ?>
												<?php if($TS_PTable_FChek[$j] != ''){ $TS_PTable_FCheck = 'TS_PTable_FCheck'; }else{ $TS_PTable_FCheck = ''; }?>
												<li>
													<?php if($tspt_settings['TS_PTable_ST_29'] == 'before' && $TS_PTable_FIcon[$j] != 'none'){ ?>
														<i class="totalsoft totalsoft-<?php echo esc_attr($TS_PTable_FIcon[$j]);?> TS_PTable_FIcon_<?php echo esc_attr( $tspt_column['id'] );?> <?php echo esc_html($TS_PTable_FCheck);?>"></i>
													<?php }?>
													<?php echo esc_html(html_entity_decode($TS_PTable_FText[$j]));?>
													<?php if($tspt_settings['TS_PTable_ST_29'] == 'after' && $TS_PTable_FIcon[$j] != 'none'){ ?>
														<i class="totalsoft totalsoft-<?php echo esc_attr($TS_PTable_FIcon[$j]);?> TS_PTable_FIcon_<?php echo esc_attr( $tspt_column['id'] );?> <?php echo esc_html($TS_PTable_FCheck);?>"></i>
													<?php }?>
												</li>
											<?php }?>
										</ul>
									</div>
								<?php }?>
								<div class="TS_PTable_Div2_<?php echo esc_attr( $tspt_column['id'] );?>">
									<a href="<?php echo esc_html($tspt_column['TS_PTable_BLink']);?>" class="TS_PTable_Button_<?php echo esc_attr( $tspt_column['id'] );?>">
										<?php if($tspt_settings['TS_PTable_ST_33'] == 'before' && $tspt_column['TS_PTable_BIcon'] != 'none'){ ?>
											<i class="totalsoft totalsoft-<?php echo esc_html($tspt_column['TS_PTable_BIcon']);?> TS_PTable_BIconB_<?php echo esc_attr( $tspt_column['id'] );?>"></i>
										<?php }?>
										<?php echo esc_html(html_entity_decode($tspt_column['TS_PTable_BText']));?>
										<?php if($tspt_settings['TS_PTable_ST_33'] == 'after' && $tspt_column['TS_PTable_BIcon'] != 'none'){ ?>
											<i class="totalsoft totalsoft-<?php echo esc_html($tspt_column['TS_PTable_BIcon']);?> TS_PTable_BIconA_<?php echo esc_attr( $tspt_column['id'] );?>"></i>
										<?php }?>
									</a>
								</div>
							</div>
						</div>
					</div>
				<?php } else if($tspt_manager['Total_Soft_PTable_Them'] == 'type4'){ ?>
					<style type="text/css">
						.TS_PTable_Container_Col_<?php echo esc_attr( $tspt_column['id'] );?> {
							position: relative;
							min-height: 1px;
							padding: 0 18px;
							float: left;
							width: <?php echo esc_attr($tspt_settings['TS_PTable_ST_01']);?>%;
							<?php if( $tspt_settings['TS_PTable_ST_02'] == 'on' ) { ?>
								-webkit-transform: scale(1.1, 1.1);
								-moz-transform: scale(1.1, 1.1);
								transform: scale(1.1, 1.1);
							<?php }?>
							margin-bottom: 30px;
						}
						@media not screen and (min-width: 820px) {
							.TS_PTable_Container { padding: 20px 5px; }
							.TS_PTable_Container_Col_<?php echo esc_attr( $tspt_column['id'] );?> { width: 70%; margin:0 15% 40px 15%; padding: 0 10px; }
						}
						@media not screen and (min-width: 400px) {
							.TS_PTable_Container { padding: 20px 0; }
							.TS_PTable_Container_Col_<?php echo esc_attr( $tspt_column['id'] );?> { width: 100%; margin:0 0 40px 0; padding: 0 5px; }
						}
						.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
							position: relative;
							z-index: 0;
						}
						<?php if($tspt_settings['TS_PTable_ST_05'] == 'none') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								box-shadow: none !important;
								-moz-box-shadow: none !important;
								-webkit-box-shadow: none !important;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_05'] == 'shadow01') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								box-shadow: 0 10px 6px -6px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>;
								-webkit-box-shadow: 0 10px 6px -6px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>;
								-moz-box-shadow: 0 10px 6px -6px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_05'] == 'shadow02') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:before, .TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								bottom: 15px;
								left: 10px;
								width: 50%;
								height: 20%;
								max-width: 300px;
								max-height: 100px;
								-webkit-box-shadow: 0 15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>;
								-moz-box-shadow: 0 15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>;
								box-shadow: 0 15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>;
								-webkit-transform: rotate(-3deg);
								-moz-transform: rotate(-3deg);
								-ms-transform: rotate(-3deg);
								-o-transform: rotate(-3deg);
								transform: rotate(-3deg);
								z-index: -1;
								position: absolute;
								content: "";
							}
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								transform: rotate(3deg);
								-moz-transform: rotate(3deg);
								-webkit-transform: rotate(3deg);
								right: 10px;
								left: auto;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_05'] == 'shadow03') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:before {
								bottom: 15px;
								left: 10px;
								width: 50%;
								height: 20%;
								max-width: 300px;
								max-height: 100px;
								-webkit-box-shadow: 0 15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>;
								-moz-box-shadow: 0 15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>;
								box-shadow: 0 15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>;
								-webkit-transform: rotate(-3deg);
								-moz-transform: rotate(-3deg);
								-ms-transform: rotate(-3deg);
								-o-transform: rotate(-3deg);
								transform: rotate(-3deg);
								z-index: -1;
								position: absolute;
								content: "";
							}
						<?php } else if($tspt_settings['TS_PTable_ST_05'] == 'shadow04') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								bottom: 15px;
								right: 10px;
								width: 50%;
								height: 20%;
								max-width: 300px;
								max-height: 100px;
								-webkit-box-shadow: 0 15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>;
								-moz-box-shadow: 0 15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>;
								box-shadow: 0 15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>;
								-webkit-transform: rotate(3deg);
								-moz-transform: rotate(3deg);
								-ms-transform: rotate(3deg);
								-o-transform: rotate(3deg);
								transform: rotate(3deg);
								z-index: -1;
								position: absolute;
								content: "";
							}
						<?php } else if($tspt_settings['TS_PTable_ST_05'] == 'shadow05') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:before, .TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								top: 15px;
								left: 10px;
								width: 50%;
								height: 20%;
								max-width: 300px;
								max-height: 100px;
								z-index: -1;
								position: absolute;
								content: "";
								background: <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>;
								box-shadow: 0 -15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>;
								-webkit-box-shadow: 0 -15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>;
								-moz-box-shadow: 0 -15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>;
								transform: rotate(3deg);
								-moz-transform: rotate(3deg);
								-webkit-transform: rotate(3deg);
							}
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								transform: rotate(-3deg);
								-moz-transform: rotate(-3deg);
								-webkit-transform: rotate(-3deg);
								right: 10px;
								left: auto;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_05'] == 'shadow06') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								position:relative;
								box-shadow:0 1px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>, 0 0 40px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?> inset;
								-webkit-box-shadow:0 1px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>, 0 0 40px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?> inset;
								-moz-box-shadow:0 1px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>, 0 0 40px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?> inset;
							}
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:before, .TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								content:"";
								position:absolute;
								z-index:-1;
								box-shadow:0 0 20px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>;
								-webkit-box-shadow:0 0 20px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>;
								-moz-box-shadow:0 0 20px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>;
								top:50%;
								bottom:0;
								left:10px;
								right:10px;
								border-radius:100px / 10px;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_05'] == 'shadow07') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								position:relative;
								box-shadow:0 1px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>, 0 0 40px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?> inset;
								-webkit-box-shadow:0 1px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>, 0 0 40px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?> inset;
								-moz-box-shadow:0 1px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>, 0 0 40px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?> inset;
							}
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:before, .TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								content:"";
								position:absolute;
								z-index:-1;
								box-shadow:0 0 20px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>;
								-webkit-box-shadow:0 0 20px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>;
								-moz-box-shadow:0 0 20px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>;
								top:0;
								bottom:0;
								left:10px;
								right:10px;
								border-radius:100px / 10px;
							}
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								right:10px;
								left:auto;
								transform:skew(8deg) rotate(3deg);
								-moz-transform:skew(8deg) rotate(3deg);
								-webkit-transform:skew(8deg) rotate(3deg);
							}
						<?php } else if($tspt_settings['TS_PTable_ST_05'] == 'shadow08') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								position:relative;
								box-shadow:0 1px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>, 0 0 40px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?> inset;
								-webkit-box-shadow:0 1px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>, 0 0 40px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?> inset;
								-moz-box-shadow:0 1px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>, 0 0 40px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?> inset;
							}
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:before, .TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								content:"";
								position:absolute;
								z-index:-1;
								box-shadow:0 0 20px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>;
								-webkit-box-shadow:0 0 20px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>;
								-moz-box-shadow:0 0 20px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>;
								top:10px;
								bottom:10px;
								left:0;
								right:0;
								border-radius:100px / 10px;
							}
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								right:10px;
								left:auto;
								transform:skew(8deg) rotate(3deg);
								-moz-transform:skew(8deg) rotate(3deg);
								-webkit-transform:skew(8deg) rotate(3deg);
							}
						<?php } else if($tspt_settings['TS_PTable_ST_05'] == 'shadow09') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								box-shadow: 0 0 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>;
								-webkit-box-shadow: 0 0 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>;
								-moz-box-shadow: 0 0 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_05'] == 'shadow10') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								box-shadow: 4px -4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>;
								-moz-box-shadow: 4px -4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>;
								-webkit-box-shadow: 4px -4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_05'] == 'shadow11') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								box-shadow: 5px 5px 3px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>;
								-moz-box-shadow: 5px 5px 3px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>;
								-webkit-box-shadow: 5px 5px 3px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_05'] == 'shadow12') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								box-shadow: 2px 2px white, 4px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>;
								-moz-box-shadow: 2px 2px white, 4px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>;
								-webkit-box-shadow: 2px 2px white, 4px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_05'] == 'shadow13') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								box-shadow: 8px 8px 18px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>;
								-moz-box-shadow: 8px 8px 18px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>;
								-webkit-box-shadow: 8px 8px 18px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_05'] == 'shadow14') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								box-shadow: 0 8px 6px -6px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>;
								-moz-box-shadow: 0 8px 6px -6px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>;
								-webkit-box-shadow: 0 8px 6px -6px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_05'] == 'shadow15') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								box-shadow: 0 0 18px 7px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>;
								-moz-box-shadow: 0 0 18px 7px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>;
								-webkit-box-shadow: 0 0 18px 7px <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>;
							}
						<?php } ?>
						.TS_PTable__<?php echo esc_attr( $tspt_column['id'] );?> {
							text-align: center;
							position: relative;
						}
						.TS_PTable_Div1_<?php echo esc_attr( $tspt_column['id'] );?> {
							background-color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_03']);?>;
							padding: 30px 0;
							transition: all 0.3s ease 0s;
							-moz-transition: all 0.3s ease 0s;
							-webkit-transition: all 0.3s ease 0s;
							position: relative;
						}
						.TS_PTable__<?php echo esc_attr( $tspt_column['id'] );?>:hover .TS_PTable_Div1_<?php echo esc_attr( $tspt_column['id'] );?> {
							background-color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_04']);?>;
						}
						.TS_PTable_Div1_<?php echo esc_attr( $tspt_column['id'] );?>:before, .TS_PTable_Div1_<?php echo esc_attr( $tspt_column['id'] );?>:after {
							content: "";
							width: 16px;
							height: 16px;
							border-radius: 50%;
							border: 1px solid <?php echo esc_attr($tspt_settings['TS_PTable_ST_12']);?>;
							position: absolute;
							bottom: 12px;
						}
						.TS_PTable_Div1_<?php echo esc_attr( $tspt_column['id'] );?>:before { left: 40px; }
						.TS_PTable_Div1_<?php echo esc_attr( $tspt_column['id'] );?>:after { right: 40px; }
						.TS_PTable_Title_<?php echo esc_attr( $tspt_column['id'] );?> {
							font-size: <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>px;
							font-family: <?php echo esc_attr($tspt_settings['TS_PTable_ST_08']);?>;
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_09']);?>;
							margin: 0 0 15px 0 !important;
							padding: 0 !important;
							letter-spacing: 2px !important;
						}
						.TS_PTable__<?php echo esc_attr( $tspt_column['id'] );?>:hover .TS_PTable_Title_<?php echo esc_attr( $tspt_column['id'] );?> {
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_10']);?>;
						}
						.TS_PTable_Amount_<?php echo esc_attr( $tspt_column['id'] );?> {
							display: inline-block;
							font-family: <?php echo esc_attr($tspt_settings['TS_PTable_ST_11']);?>;
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_12']);?>;
							font-size: <?php echo esc_attr($tspt_settings['TS_PTable_ST_15']);?>px;
							position: relative;
							transition: all 0.3s ease 0s;
							-moz-transition: all 0.3s ease 0s;
							-webkit-transition: all 0.3s ease 0s;
							margin-bottom: 20px !important;
						}
						.TS_PTable_PCur_<?php echo esc_attr( $tspt_column['id'] );?> {
							font-size: <?php echo esc_attr($tspt_settings['TS_PTable_ST_14']);?>px;
							top: 0px !important;
							vertical-align: super !important;
							line-height: 1 !important;
						}
						.TS_PTable_PPlan_<?php echo esc_attr( $tspt_column['id'] );?> {
							font-size: <?php echo esc_attr($tspt_settings['TS_PTable_ST_16']);?>px;
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_09']);?>;
							bottom: 0;
						}
						.TS_PTable__<?php echo esc_attr( $tspt_column['id'] );?>:hover .TS_PTable_Amount_<?php echo esc_attr( $tspt_column['id'] );?> {
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_13']);?>;
						}
						.TS_PTable__<?php echo esc_attr( $tspt_column['id'] );?>:hover .TS_PTable_PPlan_<?php echo esc_attr( $tspt_column['id'] );?> {
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_10']);?>;
						}
						.TS_PTable_Content_<?php echo esc_attr( $tspt_column['id'] );?> {
							padding-top: 50px;
							background: <?php echo esc_attr($tspt_settings['TS_PTable_ST_17']);?>;
							position: relative;
						}
						.TS_PTable_Content_<?php echo esc_attr( $tspt_column['id'] );?>:before, .TS_PTable_Content_<?php echo esc_attr( $tspt_column['id'] );?>:after {
							content: "";
							width: 16px;
							height: 16px;
							border-radius: 50%;
							border: 1px solid <?php echo esc_attr($tspt_settings['TS_PTable_ST_18']);?>;
							position: absolute;
							top: 12px;
						}
						.TS_PTable_Content_<?php echo esc_attr( $tspt_column['id'] );?>:before { left: 40px; }
						.TS_PTable_Content_<?php echo esc_attr( $tspt_column['id'] );?>:after { right: 40px; }
						.TS_PTable_Features_<?php echo esc_attr( $tspt_column['id'] );?> {
							padding: 0 10px !important;
							margin: 0 !important;
							list-style: none;
						}
						.TS_PTable_Features_<?php echo esc_attr( $tspt_column['id'] );?>:before, .TS_PTable_Features_<?php echo esc_attr( $tspt_column['id'] );?>:after {
							content: "";
							width: 8px;
							height: 46px;
							border-radius: 3px;
							background: <?php echo esc_attr($tspt_settings['TS_PTable_ST_09']);?>;
							position: absolute;
							top: -22px;
							z-index: 1;
							box-shadow: 0 0 5px #707070;
							transition: all 0.3s ease 0s;
						}
						.TS_PTable__<?php echo esc_attr( $tspt_column['id'] );?>:hover .TS_PTable_Features_<?php echo esc_attr( $tspt_column['id'] );?>:before, .TS_PTable__<?php echo esc_attr( $tspt_column['id'] );?>:hover .TS_PTable_Features_<?php echo esc_attr( $tspt_column['id'] );?>:after {
							background: <?php echo esc_attr($tspt_settings['TS_PTable_ST_10']);?>;
						}
						.TS_PTable_Features_<?php echo esc_attr( $tspt_column['id'] );?>:before { left: 44px; }
						.TS_PTable_Features_<?php echo esc_attr( $tspt_column['id'] );?>:after { right: 44px; }
						.TS_PTable_Features_<?php echo esc_attr( $tspt_column['id'] );?> li {
							background: <?php echo esc_attr($tspt_settings['TS_PTable_ST_17']);?>;
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_18']);?>;
							font-size: <?php echo esc_attr($tspt_settings['TS_PTable_ST_19']);?>px;
							font-family: <?php echo esc_attr($tspt_settings['TS_PTable_ST_20']);?>;
							border-bottom: 1px solid <?php echo esc_attr($tspt_settings['TS_PTable_ST_18']);?>;
							line-height: 1;
							padding: 10px;
						}
						.TS_PTable_Features_<?php echo esc_attr( $tspt_column['id'] );?> li:last-child { border-bottom: none; }
						.TS_PTable_Features_<?php echo esc_attr( $tspt_column['id'] );?> li:before {
							content: '' !important;
							display: none !important;
						}
						.TS_PTable_FIcon_<?php echo esc_attr( $tspt_column['id'] );?> {
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_21']);?> !important;
							font-size: <?php echo esc_attr($tspt_settings['TS_PTable_ST_23']);?>px;
							margin: 0 10px !important;
						}
						.TS_PTable_FIcon_<?php echo esc_attr( $tspt_column['id'] );?>.TS_PTable_FCheck {
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_22']);?> !important;
						}
						.TS_PTable_Button_<?php echo esc_attr( $tspt_column['id'] );?> {
							display: inline-block;
							padding: 5px 20px;
							margin: 15px 0;
							font-size: <?php echo esc_attr($tspt_settings['TS_PTable_ST_25']);?>px;
							font-family: <?php echo esc_attr($tspt_settings['TS_PTable_ST_26']);?>;
							background: <?php echo esc_attr($tspt_settings['TS_PTable_ST_29']);?>;
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_30']);?>;
							transition: all 0.3s ease 0s;
							-moz-transition: all 0.3s ease 0s;
							-webkit-transition: all 0.3s ease 0s;
							text-decoration: none;
							outline: none;
							box-shadow: none;
							-webkit-box-shadow: none;
							-moz-box-shadow: none;
							cursor: pointer !important;
						}
						.TS_PTable__<?php echo esc_attr( $tspt_column['id'] );?>:hover .TS_PTable_Button_<?php echo esc_attr( $tspt_column['id'] );?> {
							background: <?php echo esc_attr($tspt_settings['TS_PTable_ST_31']);?>;
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_32']);?>;
						}
						.TS_PTable_Button_<?php echo esc_attr( $tspt_column['id'] );?>:hover, .TS_PTable_Button_<?php echo esc_attr( $tspt_column['id'] );?>:focus {
							text-decoration: none;
							outline: none;
							box-shadow: none;
							-webkit-box-shadow: none;
							-moz-box-shadow: none;
						}
						.TS_PTable_BIconA_<?php echo esc_attr( $tspt_column['id'] );?>, .TS_PTable_BIconB_<?php echo esc_attr( $tspt_column['id'] );?> {
							font-size: <?php echo esc_attr($tspt_settings['TS_PTable_ST_27']);?>px;
						}
						.TS_PTable_BIconB_<?php echo esc_attr( $tspt_column['id'] );?> {
							margin: 0 10px 0 0 !important;
						}
						.TS_PTable_BIconA_<?php echo esc_attr( $tspt_column['id'] );?> {
							margin: 0 0 0 10px !important;
						}
					</style>
					<div class="TS_PTable_Container_Col_<?php echo esc_attr( $tspt_column['id'] );?>">
						<div class="TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>">
							<div class="TS_PTable__<?php echo esc_attr( $tspt_column['id'] );?>">
								<div class="TS_PTable_Div1_<?php echo esc_attr( $tspt_column['id'] );?>">
									<h3 class="TS_PTable_Title_<?php echo esc_attr( $tspt_column['id'] );?>"><?php echo esc_html(html_entity_decode($tspt_column['TS_PTable_TText']));?></h3>
									<span class="TS_PTable_Amount_<?php echo esc_attr( $tspt_column['id'] );?>">
										<sup class="TS_PTable_PCur_<?php echo esc_attr( $tspt_column['id'] );?>"><?php echo esc_attr($tspt_column['TS_PTable_PCur']);?></sup>
										<?php echo esc_html($tspt_column['TS_PTable_PVal']);?>
										<sub class="TS_PTable_PPlan_<?php echo esc_attr( $tspt_column['id'] );?>"><?php echo esc_html($tspt_column['TS_PTable_PPlan']);?></sub>
									</span>
								</div>
								<div class="TS_PTable_Content_<?php echo esc_attr( $tspt_column['id'] );?>">
									<ul class="TS_PTable_Features_<?php echo esc_attr( $tspt_column['id'] );?>">
										<?php $TS_PTable_FIcon = explode('TSPTFI', $tspt_column['TS_PTable_FIcon']); ?>
										<?php $TS_PTable_FText = explode('TSPTFT', $tspt_column['TS_PTable_FText']); ?>
										<?php $TS_PTable_FChek = explode('TSPTFC', $tspt_column['TS_PTable_C_01']); ?>
										<?php for($j = 0; $j < $tspt_column['TS_PTable_FCount']; $j++) { ?>
											<?php if($TS_PTable_FChek[$j] != ''){ $TS_PTable_FCheck = 'TS_PTable_FCheck'; }else{ $TS_PTable_FCheck = ''; }?>
											<li>
												<?php if($tspt_settings['TS_PTable_ST_24'] == 'before' && $TS_PTable_FIcon[$j] != 'none'){ ?>
													<i class="totalsoft totalsoft-<?php echo esc_attr($TS_PTable_FIcon[$j]);?> TS_PTable_FIcon_<?php echo esc_attr( $tspt_column['id'] );?> <?php echo esc_html($TS_PTable_FCheck);?>"></i>
												<?php }?>
												<?php echo esc_html(html_entity_decode($TS_PTable_FText[$j]));?>
												<?php if($tspt_settings['TS_PTable_ST_24'] == 'after' && $TS_PTable_FIcon[$j] != 'none'){ ?>
													<i class="totalsoft totalsoft-<?php echo esc_attr($TS_PTable_FIcon[$j]);?> TS_PTable_FIcon_<?php echo esc_attr( $tspt_column['id'] );?> <?php echo esc_html($TS_PTable_FCheck);?>"></i>
												<?php }?>
											</li>
										<?php }?>
									</ul>
									<a href="<?php echo esc_html($tspt_column['TS_PTable_BLink']);?>" class="TS_PTable_Button_<?php echo esc_attr( $tspt_column['id'] );?>">
										<?php if($tspt_settings['TS_PTable_ST_28'] == 'before' && $tspt_column['TS_PTable_BIcon'] != 'none'){ ?>
											<i class="totalsoft totalsoft-<?php echo esc_html($tspt_column['TS_PTable_BIcon']);?> TS_PTable_BIconB_<?php echo esc_attr( $tspt_column['id'] );?>"></i>
										<?php }?>
										<?php echo esc_html(html_entity_decode($tspt_column['TS_PTable_BText']));?>
										<?php if($tspt_settings['TS_PTable_ST_28'] == 'after' && $tspt_column['TS_PTable_BIcon'] != 'none'){ ?>
											<i class="totalsoft totalsoft-<?php echo esc_html($tspt_column['TS_PTable_BIcon']);?> TS_PTable_BIconA_<?php echo esc_attr( $tspt_column['id'] );?>"></i>
										<?php }?>
									</a>
								</div>
							</div>
						</div>
					</div>
				<?php } else if($tspt_manager['Total_Soft_PTable_Them'] == 'type5'){ ?>
					<style type="text/css">
						.TS_PTable_Container_Col_<?php echo esc_attr( $tspt_column['id'] );?> {
							position: relative;
							min-height: 1px;
							padding: 0 18px;
							float: left;
							width: <?php echo esc_attr($tspt_settings['TS_PTable_ST_01']);?>%;
							<?php if( $tspt_settings['TS_PTable_ST_02'] == 'on' ) { ?>
								-webkit-transform: translate3d(0, 0, 0) scale(1.1, 1.1);
								-moz-transform: translate3d(0, 0, 0) scale(1.1, 1.1);
								transform: translate3d(0, 0, 0) scale(1.1, 1.1);
							<?php } else { ?>
								-webkit-transform: translate3d(0, 0, 0) scale(1, 1);
								-moz-transform: translate3d(0, 0, 0) scale(1, 1);
								transform: translate3d(0, 0, 0) scale(1, 1);
							<?php }?>
							margin-bottom: 30px;
							transition: transform 0.5s ease 0s;
							-moz-transition: transform 0.5s ease 0s;
							-webkit-transition: transform 0.5s ease 0s;
						}
						.TS_PTable_Container_Col_<?php echo esc_attr( $tspt_column['id'] );?>:hover {
							<?php if( $tspt_settings['TS_PTable_ST_02'] == 'on' ) { ?>
								-webkit-transform: translate3d(0, 0, 0) scale(1.07, 1.07);
								-moz-transform: translate3d(0, 0, 0) scale(1.07, 1.07);
								transform: translate3d(0, 0, 0) scale(1.07, 1.07);
							<?php } else { ?>
								-webkit-transform: translate3d(0, 0, 0) scale(1.03, 1.03);
								-moz-transform: translate3d(0, 0, 0) scale(1.03, 1.03);
								transform: translate3d(0, 0, 0) scale(1.03, 1.03);
							<?php }?>
							z-index: 1;
						}
						@media not screen and (min-width: 820px) {
							.TS_PTable_Container { padding: 20px 5px; }
							.TS_PTable_Container_Col_<?php echo esc_attr( $tspt_column['id'] );?> { width: 70%; margin:0 15% 40px 15%; padding: 0 10px; }
						}
						@media not screen and (min-width: 400px) {
							.TS_PTable_Container { padding: 20px 0; }
							.TS_PTable_Container_Col_<?php echo esc_attr( $tspt_column['id'] );?> { width: 100%; margin:0 0 40px 0; padding: 0 5px; }
						}
						.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>  {
							position: relative;
							z-index: 0;
							border-radius: 10px;
						}
						<?php if($tspt_settings['TS_PTable_ST_04'] == 'none') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								box-shadow: none !important;
								-moz-box-shadow: none !important;
								-webkit-box-shadow: none !important;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_04'] == 'shadow01') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								box-shadow: 0 10px 6px -6px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-webkit-box-shadow: 0 10px 6px -6px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-moz-box-shadow: 0 10px 6px -6px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_04'] == 'shadow02') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:before, .TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								bottom: 15px;
								left: 10px;
								width: 50%;
								height: 20%;
								max-width: 300px;
								max-height: 100px;
								-webkit-box-shadow: 0 15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-moz-box-shadow: 0 15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								box-shadow: 0 15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-webkit-transform: rotate(-3deg);
								-moz-transform: rotate(-3deg);
								-ms-transform: rotate(-3deg);
								-o-transform: rotate(-3deg);
								transform: rotate(-3deg);
								z-index: -1;
								position: absolute;
								content: "";
							}
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								transform: rotate(3deg);
								-moz-transform: rotate(3deg);
								-webkit-transform: rotate(3deg);
								right: 10px;
								left: auto;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_04'] == 'shadow03') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:before {
								bottom: 15px;
								left: 10px;
								width: 50%;
								height: 20%;
								max-width: 300px;
								max-height: 100px;
								-webkit-box-shadow: 0 15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-moz-box-shadow: 0 15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								box-shadow: 0 15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-webkit-transform: rotate(-3deg);
								-moz-transform: rotate(-3deg);
								-ms-transform: rotate(-3deg);
								-o-transform: rotate(-3deg);
								transform: rotate(-3deg);
								z-index: -1;
								position: absolute;
								content: "";
							}
						<?php } else if($tspt_settings['TS_PTable_ST_04'] == 'shadow04') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								bottom: 15px;
								right: 10px;
								width: 50%;
								height: 20%;
								max-width: 300px;
								max-height: 100px;
								-webkit-box-shadow: 0 15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-moz-box-shadow: 0 15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								box-shadow: 0 15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-webkit-transform: rotate(3deg);
								-moz-transform: rotate(3deg);
								-ms-transform: rotate(3deg);
								-o-transform: rotate(3deg);
								transform: rotate(3deg);
								z-index: -1;
								position: absolute;
								content: "";
							}
						<?php } else if($tspt_settings['TS_PTable_ST_04'] == 'shadow05') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:before, .TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								top: 15px;
								left: 10px;
								width: 50%;
								height: 20%;
								max-width: 300px;
								max-height: 100px;
								z-index: -1;
								position: absolute;
								content: "";
								background: <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								box-shadow: 0 -15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-webkit-box-shadow: 0 -15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-moz-box-shadow: 0 -15px 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								transform: rotate(3deg);
								-moz-transform: rotate(3deg);
								-webkit-transform: rotate(3deg);
							}
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								transform: rotate(-3deg);
								-moz-transform: rotate(-3deg);
								-webkit-transform: rotate(-3deg);
								right: 10px;
								left: auto;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_04'] == 'shadow06') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								position:relative;
								box-shadow:0 1px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>, 0 0 40px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?> inset;
								-webkit-box-shadow:0 1px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>, 0 0 40px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?> inset;
								-moz-box-shadow:0 1px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>, 0 0 40px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?> inset;
							}
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:before, .TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								content:"";
								position:absolute;
								z-index:-1;
								box-shadow:0 0 20px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-webkit-box-shadow:0 0 20px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-moz-box-shadow:0 0 20px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								top:50%;
								bottom:0;
								left:10px;
								right:10px;
								border-radius:100px / 10px;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_04'] == 'shadow07') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								position:relative;
								box-shadow:0 1px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>, 0 0 40px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?> inset;
								-webkit-box-shadow:0 1px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>, 0 0 40px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?> inset;
								-moz-box-shadow:0 1px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>, 0 0 40px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?> inset;
							}
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:before, .TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								content:"";
								position:absolute;
								z-index:-1;
								box-shadow:0 0 20px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-webkit-box-shadow:0 0 20px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-moz-box-shadow:0 0 20px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								top:0;
								bottom:0;
								left:10px;
								right:10px;
								border-radius:100px / 10px;
							}
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								right:10px;
								left:auto;
								transform:skew(8deg) rotate(3deg);
								-moz-transform:skew(8deg) rotate(3deg);
								-webkit-transform:skew(8deg) rotate(3deg);
							}
						<?php } else if($tspt_settings['TS_PTable_ST_04'] == 'shadow08') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								position:relative;
								box-shadow:0 1px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>, 0 0 40px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?> inset;
								-webkit-box-shadow:0 1px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>, 0 0 40px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?> inset;
								-moz-box-shadow:0 1px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>, 0 0 40px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?> inset;
							}
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:before, .TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								content:"";
								position:absolute;
								z-index:-1;
								box-shadow:0 0 20px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-webkit-box-shadow:0 0 20px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-moz-box-shadow:0 0 20px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								top:10px;
								bottom:10px;
								left:0;
								right:0;
								border-radius:100px / 10px;
							}
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>:after {
								right:10px;
								left:auto;
								transform:skew(8deg) rotate(3deg);
								-moz-transform:skew(8deg) rotate(3deg);
								-webkit-transform:skew(8deg) rotate(3deg);
							}
						<?php } else if($tspt_settings['TS_PTable_ST_04'] == 'shadow09') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								box-shadow: 0 0 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-webkit-box-shadow: 0 0 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-moz-box-shadow: 0 0 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_04'] == 'shadow10') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								box-shadow: 4px -4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-moz-box-shadow: 4px -4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-webkit-box-shadow: 4px -4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_04'] == 'shadow11') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								box-shadow: 5px 5px 3px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-moz-box-shadow: 5px 5px 3px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-webkit-box-shadow: 5px 5px 3px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_04'] == 'shadow12') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								box-shadow: 2px 2px white, 4px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-moz-box-shadow: 2px 2px white, 4px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-webkit-box-shadow: 2px 2px white, 4px 4px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_04'] == 'shadow13') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								box-shadow: 8px 8px 18px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-moz-box-shadow: 8px 8px 18px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-webkit-box-shadow: 8px 8px 18px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_04'] == 'shadow14') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								box-shadow: 0 8px 6px -6px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-moz-box-shadow: 0 8px 6px -6px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-webkit-box-shadow: 0 8px 6px -6px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
							}
						<?php } else if($tspt_settings['TS_PTable_ST_04'] == 'shadow15') { ?>
							.TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?> {
								box-shadow: 0 0 18px 7px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-moz-box-shadow: 0 0 18px 7px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
								-webkit-box-shadow: 0 0 18px 7px <?php echo esc_attr($tspt_settings['TS_PTable_ST_05']);?>;
							}
						<?php } ?>
						.TS_PTable__<?php echo esc_attr( $tspt_column['id'] );?> {
							text-align: center;
							position: relative;
							background-color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_03']);?>;
							padding-bottom: 40px;
							border-radius: 10px;
							transition: all 0.5s ease 0s;
							-moz-transition: all 0.5s ease 0s;
							-webkit-transition: all 0.5s ease 0s;
						}
						.TS_PTable_Div1_<?php echo esc_attr( $tspt_column['id'] );?> {
							background-color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_18']);?>;
							padding: 40px 0;
							border-radius: 10px 10px 50% 50%;
							transition: all 0.5s ease 0s;
							-moz-transition: all 0.5s ease 0s;
							-webkit-transition: all 0.5s ease 0s;
							position: relative;
						}
						.TS_PTable__<?php echo esc_attr( $tspt_column['id'] );?>:hover .TS_PTable_Div1_<?php echo esc_attr( $tspt_column['id'] );?> {
							background-color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_19']);?>;
						}
						.TS_PTable_Div1_<?php echo esc_attr( $tspt_column['id'] );?> i {
							font-size: <?php echo esc_attr($tspt_settings['TS_PTable_ST_09']);?>px;
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_10']);?>;
							margin-bottom: 10px;
							transition: all 0.5s ease 0s;
							-moz-transition: all 0.5s ease 0s;
							-webkit-transition: all 0.5s ease 0s;
						}
						.TS_PTable__<?php echo esc_attr( $tspt_column['id'] );?>:hover .TS_PTable_Div1_<?php echo esc_attr( $tspt_column['id'] );?> i {
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_11']);?>;
						}
						.TS_PTable_Title_<?php echo esc_attr( $tspt_column['id'] );?> {
							font-size: <?php echo esc_attr($tspt_settings['TS_PTable_ST_06']);?>px;
							font-family: <?php echo esc_attr($tspt_settings['TS_PTable_ST_07']);?>;
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_08']);?>;
							margin: 20px 0 !important;
							padding: 0 !important;
						}
						.TS_PTable_Amount_<?php echo esc_attr( $tspt_column['id'] );?> {
							font-family: <?php echo esc_attr($tspt_settings['TS_PTable_ST_12']);?>;
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_13']);?>;
							font-size: <?php echo esc_attr($tspt_settings['TS_PTable_ST_16']);?>px;
							position: relative;
							transition: all 0.5s ease 0s;
							-moz-transition: all 0.5s ease 0s;
							-webkit-transition: all 0.5s ease 0s;
						}
						.TS_PTable_PCur_<?php echo esc_attr( $tspt_column['id'] );?> {
							font-size: <?php echo esc_attr($tspt_settings['TS_PTable_ST_15']);?>px;
						}
						.TS_PTable_PPlan_<?php echo esc_attr( $tspt_column['id'] );?> {
							font-size: <?php echo esc_attr($tspt_settings['TS_PTable_ST_17']);?>px;
							display: block;
						}
						.TS_PTable__<?php echo esc_attr( $tspt_column['id'] );?>:hover .TS_PTable_Amount_<?php echo esc_attr( $tspt_column['id'] );?> {
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_14']);?>;
						}
						.TS_PTable_Features_<?php echo esc_attr( $tspt_column['id'] );?> {
							padding: 0 !important;
							margin: 0 0 30px 0 !important;
							list-style: none;
						}
						.TS_PTable_Features_<?php echo esc_attr( $tspt_column['id'] );?> li {
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_20']);?>;
							font-size: <?php echo esc_attr($tspt_settings['TS_PTable_ST_21']);?>px;
							font-family: <?php echo esc_attr($tspt_settings['TS_PTable_ST_22']);?>;
							line-height: 1;
							padding: 10px;
						}
						.TS_PTable_Features_<?php echo esc_attr( $tspt_column['id'] );?> li:before {
							content: '' !important;
							display: none !important;
						}
						.TS_PTable_FIcon_<?php echo esc_attr( $tspt_column['id'] );?> {
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_23']);?> !important;
							font-size: <?php echo esc_attr($tspt_settings['TS_PTable_ST_25']);?>px;
							margin: 0 10px !important;
						}
						.TS_PTable_FIcon_<?php echo esc_attr( $tspt_column['id'] );?>.TS_PTable_FCheck {
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_24']);?> !important;
						}
						.TS_PTable_Button_<?php echo esc_attr( $tspt_column['id'] );?> {
							display: inline-block;
							padding: 10px 35px;
							font-size: <?php echo esc_attr($tspt_settings['TS_PTable_ST_27']);?>px;
							font-family: <?php echo esc_attr($tspt_settings['TS_PTable_ST_28']);?>;
							background: <?php echo esc_attr($tspt_settings['TS_PTable_ST_31']);?>;
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_32']);?>;
							border-radius: 20px;
							transition: all 0.3s ease 0s;
							-moz-transition: all 0.3s ease 0s;
							-webkit-transition: all 0.3s ease 0s;
							text-decoration: none;
							outline: none;
							box-shadow: none;
							-webkit-box-shadow: none;
							-moz-box-shadow: none;
							cursor: pointer !important;
						}
						.TS_PTable_Button_<?php echo esc_attr( $tspt_column['id'] );?>:hover {
							box-shadow: 0 0 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_31']);?>;
							-moz-box-shadow: 0 0 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_31']);?>;
							-webkit-box-shadow: 0 0 10px <?php echo esc_attr($tspt_settings['TS_PTable_ST_31']);?>;
							background: <?php echo esc_attr($tspt_settings['TS_PTable_ST_31']);?>;
							color: <?php echo esc_attr($tspt_settings['TS_PTable_ST_32']);?>;
						}
						.TS_PTable_Button_<?php echo esc_attr( $tspt_column['id'] );?>:hover {
							text-decoration: none;
							outline: none;
						}
						.TS_PTable_Button_<?php echo esc_attr( $tspt_column['id'] );?>:focus {
							text-decoration: none;
							outline: none;
							box-shadow: none;
							-webkit-box-shadow: none;
							-moz-box-shadow: none;
						}
						.TS_PTable_BIconA_<?php echo esc_attr( $tspt_column['id'] );?>, .TS_PTable_BIconB_<?php echo esc_attr( $tspt_column['id'] );?> {
							font-size: <?php echo esc_attr($tspt_settings['TS_PTable_ST_29']);?>px;
						}
						.TS_PTable_BIconB_<?php echo esc_attr( $tspt_column['id'] );?> {
							margin: 0 10px 0 0 !important;
						}
						.TS_PTable_BIconA_<?php echo esc_attr( $tspt_column['id'] );?> {
							margin: 0 0 0 10px !important;
						}
					</style>
					<div class="TS_PTable_Container_Col_<?php echo esc_attr( $tspt_column['id'] );?>">
						<div class="TS_PTable_Shadow_<?php echo esc_attr( $tspt_column['id'] );?>">
							<div class="TS_PTable__<?php echo esc_attr( $tspt_column['id'] );?>">
								<div class="TS_PTable_Div1_<?php echo esc_attr( $tspt_column['id'] );?>">
									<?php if($tspt_column['TS_PTable_TIcon'] != 'none'){ ?>
										<i class="totalsoft totalsoft-<?php echo esc_attr($tspt_column['TS_PTable_TIcon']);?>"></i>
									<?php }?>
									<div class="TS_PTable_Amount_<?php echo esc_attr( $tspt_column['id'] );?>">
										<span class="TS_PTable_PCur_<?php echo esc_attr( $tspt_column['id'] );?>">
											<?php echo esc_attr($tspt_column['TS_PTable_PCur']);?>
										</span>
										<?php echo esc_html($tspt_column['TS_PTable_PVal']);?>
										<span class="TS_PTable_PPlan_<?php echo esc_attr( $tspt_column['id'] );?>">
											<?php echo esc_html($tspt_column['TS_PTable_PPlan']);?>
										</span>
									</div>
								</div>
								<h3 class="TS_PTable_Title_<?php echo esc_attr( $tspt_column['id'] );?>"><?php echo esc_html(html_entity_decode($tspt_column['TS_PTable_TText']));?></h3>
								<?php if($tspt_column['TS_PTable_FCount'] != 0){ ?>
									<div class="TS_PTable_Content_<?php echo esc_attr( $tspt_column['id'] );?>">
										<ul class="TS_PTable_Features_<?php echo esc_attr( $tspt_column['id'] );?>">
											<?php $TS_PTable_FIcon = explode('TSPTFI', $tspt_column['TS_PTable_FIcon']); ?>
											<?php $TS_PTable_FText = explode('TSPTFT', $tspt_column['TS_PTable_FText']); ?>
											<?php $TS_PTable_FChek = explode('TSPTFC', $tspt_column['TS_PTable_C_01']); ?>
											<?php for($j = 0; $j < $tspt_column['TS_PTable_FCount']; $j++) { ?>
												<?php if($TS_PTable_FChek[$j] != ''){ $TS_PTable_FCheck = 'TS_PTable_FCheck'; }else{ $TS_PTable_FCheck = ''; }?>
												<li>
													<?php if($tspt_settings['TS_PTable_ST_26'] == 'before' && $TS_PTable_FIcon[$j] != 'none'){ ?>
														<i class="totalsoft totalsoft-<?php echo esc_attr($TS_PTable_FIcon[$j]);?> TS_PTable_FIcon_<?php echo esc_attr( $tspt_column['id'] );?> <?php echo esc_html($TS_PTable_FCheck);?>"></i>
													<?php }?>
													<?php echo esc_html(html_entity_decode($TS_PTable_FText[$j]));?>
													<?php if($tspt_settings['TS_PTable_ST_26'] == 'after' && $TS_PTable_FIcon[$j] != 'none'){ ?>
														<i class="totalsoft totalsoft-<?php echo esc_attr($TS_PTable_FIcon[$j]);?> TS_PTable_FIcon_<?php echo esc_attr( $tspt_column['id'] );?> <?php echo esc_html($TS_PTable_FCheck);?>"></i>
													<?php }?>
												</li>
											<?php }?>
										</ul>
									</div>
								<?php }?>
								<div class="TS_PTable_Div2_<?php echo esc_attr( $tspt_column['id'] );?>">
									<a href="<?php echo esc_html($tspt_column['TS_PTable_BLink']);?>" class="TS_PTable_Button_<?php echo esc_attr( $tspt_column['id'] );?>">
										<?php if($tspt_settings['TS_PTable_ST_30'] == 'before' && $tspt_column['TS_PTable_BIcon'] != 'none'){ ?>
											<i class="totalsoft totalsoft-<?php echo esc_html($tspt_column['TS_PTable_BIcon']);?> TS_PTable_BIconB_<?php echo esc_attr( $tspt_column['id'] );?>"></i>
										<?php }?>
										<?php echo esc_html(html_entity_decode($tspt_column['TS_PTable_BText']));?>
										<?php if($tspt_settings['TS_PTable_ST_30'] == 'after' && $tspt_column['TS_PTable_BIcon'] != 'none'){ ?>
											<i class="totalsoft totalsoft-<?php echo esc_html($tspt_column['TS_PTable_BIcon']);?> TS_PTable_BIconA_<?php echo esc_attr( $tspt_column['id'] );?>"></i>
										<?php }?>
									</a>
								</div>
							</div>
						</div>
					</div>
				<?php }
			} ?>
		</div>
	<?php
	}
}
?>