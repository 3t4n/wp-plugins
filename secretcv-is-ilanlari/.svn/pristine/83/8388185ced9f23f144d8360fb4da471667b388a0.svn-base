<?php

/*
Plugin Name: Secretcv İş İlanları
Plugin URI: http://www.secretcv.com/wordpress/
Description: Secretcv.com sitesinde yayınlanan iş ilanlarından istediğiniz Sektör/Bölüm/Pozisyon/Şehir kombinasyonuna uyan ilanları sitede gösterir.
Version: 1.0
Author: Nazmi ZORLU
Author URI: http://www.secretcv.com/wordpress/
*/

add_action( 'widgets_init', 'secretcv_widgets' );

function secretcv_widgets() {
	register_widget( 'Secretcv_Widget' );
}


/**
 * Secretcv Widget Class.
 * Bu class Secretcv İş İlanları Aygıtını herşeyiyle yönetir 
 *
 * @since 0.0.1
 */
class Secretcv_Widget extends WP_Widget {

	/**
	 * Aygıt Ayarları.
	 */
	function Secretcv_Widget() {
		$widget_ops = array( 'classname' => 'secretcv', 'description' => 'Secretcv\'de yayınlanan iş ilanlarını sitenizde yayınlayın.' );
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'secretcv-widget' );
		$this->WP_Widget( 'secretcv-widget', __('Secretcv İş İlanları', 'secretcv'), $widget_ops, $control_ops );
	}

	/**
	 * Aygıtın sayfa üzerinde nasıl gösterileceğini belirler.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		$defaults = array( 
			'scv_sektorler'		=> "",
			'scv_bolumler'		=> "",
			'scv_sehirler'		=> "",
			'scv_genislik'		=> 170,
			'scv_yukseklik'		=> 300,
			'scv_oge_sayisi'	=> 5,
			'scv_detay'			=> 1,
			'scv_logo'			=> 1,
			'scv_r_b_bg'		=> '#d71f27',
			'scv_r_b_y'			=> '#ffffff',
			'scv_r_ib_y'		=> '#494949',
			'scv_r_it_y'		=> '#aaaaaa',
			'scv_r_ia_y'		=> '#000000',
			'scv_r_bg_1'		=> '#ffffff',
			'scv_r_bg_2'		=> '#f6f9ff',
			'scv_r_y'			=> '#000000',
			
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults );

		$varsayilanlar = array
		(
			'sektorler'		=> $instance['scv_sektorler'],
			'bolumler'		=> $instance['scv_bolumler'],
			'sehirler'		=> $instance['scv_sehirler'],
			'genislik'		=> $instance['scv_genislik'],
			'yukseklik'		=> $instance['scv_yukseklik'],
			'oge_sayisi'	=> $instance['scv_oge_sayisi'],
			'detay'			=> $instance['scv_detay'],
			'logo'			=> $instance['scv_logo']
		);
		
		$renkler =  array (
				'r_b_bg'	=> $instance['scv_r_b_bg'],
				'r_b_y'		=> $instance['scv_r_b_y'],
				'r_ib_y'	=> $instance['scv_r_ib_y'],
				'r_it_y'	=> $instance['scv_r_it_y'],
				'r_ia_y'	=> $instance['scv_r_ia_y'],
				'r_bg_1'	=> $instance['scv_r_bg_1'],
				'r_bg_2'	=> $instance['scv_r_bg_2'],
				'r_y'		=> $instance['scv_r_y'] 
		);

		/* Aygıt kodundan öncesi (temadan) */
		echo $before_widget;

		/* Aygıt Kodu */
		?>
		<div id="scv_container">
			<script type="text/javascript" src="http://www.secretcv.com/modul3/ilan/kutu/js"></script>
			<script type="text/javascript">
				SCV_ilan_kutusu().secenekler({
					'genislik': '<?=$varsayilanlar['genislik'];?>',
					'yukseklik': '<?=$varsayilanlar['yukseklik'];?>'
				}).ayarlar({
					'sektor': [<?=$varsayilanlar['sektorler'];?>],
					'bolum': [<?=$varsayilanlar['bolumler'];?>],
					'sehir': [<?=$varsayilanlar['sehirler'];?>],
					'oge_sayisi': '<?=$varsayilanlar['oge_sayisi'];?>',
					'detay': '<?=$varsayilanlar['detay'];?>',
					'logo': '<?=$varsayilanlar['logo'];?>'
				}).renkler(
					{
						<?php foreach ($renkler as $k => $r) echo "'{$k}': '{$r}',\n"; ?>
					}
				).yaz();
			</script>
		</div>
		<?

		/* Aygıt kodundan sonrası (temadan) */
		echo $after_widget;
	}

	/**
	 * Aygıt ayarları değiştirildiği anda güncelleyen method.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['scv_sektorler'] = $new_instance['scv_sektorler'];
		$instance['scv_bolumler'] = $new_instance['scv_bolumler'];
		$instance['scv_sehirler'] = $new_instance['scv_sehirler'];
		$instance['scv_genislik'] = strip_tags( $new_instance['scv_genislik']);
		$instance['scv_yukseklik'] = strip_tags( $new_instance['scv_yukseklik']);
		$instance['scv_oge_sayisi'] = $new_instance['scv_oge_sayisi'];
		$instance['scv_detay'] = $new_instance['scv_detay'];
		$instance['scv_logo'] = $new_instance['scv_logo'];
		$instance['scv_r_b_bg'] = $new_instance['scv_r_b_bg'];
		$instance['scv_r_b_y'] = $new_instance['scv_r_b_y'];
		$instance['scv_r_ib_y'] = $new_instance['scv_r_ib_y'];
		$instance['scv_r_it_y'] = $new_instance['scv_r_it_y'];
		$instance['scv_r_ia_y'] = $new_instance['scv_r_ia_y'];
		$instance['scv_r_bg_1'] = $new_instance['scv_r_bg_1'];
		$instance['scv_r_bg_2'] = $new_instance['scv_r_bg_2'];
		$instance['scv_r_y'] = $new_instance['scv_r_y'];
		
		return $instance;
		
	}

	/**
	 * Yönetim tarafındaki ayar ekranı için method.
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 
			'scv_sektorler'		=> "",
			'scv_bolumler'		=> "",
			'scv_sehirler'		=> "",
			'scv_genislik'		=> 170,
			'scv_yukseklik'		=> 300,
			'scv_oge_sayisi'	=> 5,
			'scv_detay'			=> 1,
			'scv_logo'			=> 1,
			'scv_r_b_bg'		=> '#d71f27',
			'scv_r_b_y'			=> '#ffffff',
			'scv_r_ib_y'		=> '#494949',
			'scv_r_it_y'		=> '#aaaaaa',
			'scv_r_ia_y'		=> '#000000',
			'scv_r_bg_1'		=> '#ffffff',
			'scv_r_bg_2'		=> '#f6f9ff',
			'scv_r_y'			=> '#000000',
			
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults );

		$varsayilanlar = array (
			'sektorler'		=> $instance['scv_sektorler'],
			'bolumler'		=> $instance['scv_bolumler'],
			'sehirler'		=> $instance['scv_sehirler'],
			'genislik'		=> $instance['scv_genislik'],
			'yukseklik'		=> $instance['scv_yukseklik'],
			'oge_sayisi'	=> $instance['scv_oge_sayisi'],
			'detay'			=> $instance['scv_detay'],
			'logo'			=> $instance['scv_logo'],
			'renkler'		=> array (
				'r_b_bg'	=> $instance['scv_r_b_bg'],
				'r_b_y'		=> $instance['scv_r_b_y'],
				'r_ib_y'	=> $instance['scv_r_ib_y'],
				'r_it_y'	=> $instance['scv_r_it_y'],
				'r_ia_y'	=> $instance['scv_r_ia_y'],
				'r_bg_1'	=> $instance['scv_r_bg_1'],
				'r_bg_2'	=> $instance['scv_r_bg_2'],
				'r_y'		=> $instance['scv_r_y'],
			),
		);
		?>
		

		<link rel="stylesheet" href="http://www.secretcv.com/css/secretcv_main_new.css.php?v=5" type="text/css" />
		<link rel="stylesheet" href="http://static.secretcv.com/css/secretcv.css?v=4" type="text/css" />
		<style>
		<!--
			.editwidget, .widget-inside { width: 750px;  height: 500px; float: left; padding: 0px;}
			#footer {display: none;}
		-->
		</style>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
		<script type="text/javascript" src="http://static.secretcv.com/js/jquery.colorpicker.js"></script>
		<script type="text/javascript" src="http://static.secretcv.com/js/jquery.tools.js"></script>
		<script type="text/javascript" src="http://www.secretcv.com/modul3/ilan/kutu/js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				renk_sifirla();
				liste_doldur();
				$("input.colorpick").colorPicker();
				$("select, .kodopt, .kodayar").change(function() {
					kod_guncelle();
				});
				$('.colorpick').change(function() {
					kod_guncelle(true);
				});
				$('<option/>').val("999").text("Türkiye Geneli").prependTo('#sehir');
				$("#kutu_kod").focus(function() {
					this.select();
				});
				kod_guncelle(true);
				kod_guncelle();
				$(".divbuton").corner();
				$(".bgt").bt();
			});
		
			var varsayilanlar = {};
			<?php foreach ($varsayilanlar as $k => $r) echo "varsayilanlar['{$k}'] = '{$r}';\n"; ?>
			var vrenkler = {};
			<?php foreach ($varsayilanlar['renkler'] as $k => $r) echo "vrenkler['{$k}'] = '{$r}';\n"; ?>
			var sektorler_selected = [<?php foreach (split(',', $varsayilanlar['sektorler']) as $k => $r) echo "'{$r}',"; ?>];
			var bolumler_selected = [<?php foreach (split(',', $varsayilanlar['bolumler']) as $k => $r) echo "'{$r}',"; ?>];
			var sehirler_selected = [<?php foreach (split(',', $varsayilanlar['sehirler']) as $k => $r) echo "'{$r}',"; ?>];
		
			function liste_doldur() {
				$.get('http://secretcv.com/modul3/ilan/wpkutu/sektor/?code=?', function(data){ for(id in data) { $('<option ' + (($.inArray(id, sektorler_selected) != -1)?'selected="selected"':'')   + '/>').val(id).text(data[id]).appendTo('#sektor'); }; kod_guncelle(true);}, "json");
				$.get('http://secretcv.com/modul3/ilan/wpkutu/bolum/?code=?', function(data){ for(id in data) { $('<option ' +  (($.inArray(id, bolumler_selected)!= -1)?'selected="selected"':'')   + '/>').val(id).text(data[id]).appendTo('#bolum'); };kod_guncelle(true); }, "json");
				$.get('http://secretcv.com/modul3/ilan/wpkutu/sehir/?code=?', function(data){ for(id in data) { $('<option ' +  (($.inArray(id, sehirler_selected)!= -1)?'selected="selected"':'')   + '/>').val(id).text(data[id]).appendTo('#sehir'); };kod_guncelle(true); }, "json");
			}
			
			function kod_guncelle(ver) {
				var ver = ver || false;
				var renkler = [];
				var opt = [];
				var ayar = [];
		
				$('.kodopt').each(function() {
					var aval = $(this).val();
					var aname = $(this).attr('id');
					if (aval != "" && aval != varsayilanlar[aname])
						opt.push("'" + aname + "': '" + aval.replace(/("|')/g, " ") + "'");
				});
		
				if (ver) {
					ayar.push("'id': 'ilanlar_onizleme'");
					//opt.push("'yukseklik': '350'");
				}
		
				$('#scv_container select').each(function() {
					var deg = [];
					var did = $(this).attr("id");
					var selected = $("#" + did + " option:selected");
		
					$.each(selected, function(i) {
						if (i > 4) {
							$(this).attr('selected', false);
						} else {
							deg.push($(this).val());
						}
					});
		
					if (deg.length > 0) {
						if ($(this).hasClass('tek')) {
							ayar.push("'" + did + "': '" + deg[0].replace(/("|')/g, " ") + "'");
						} else {
							ayar.push("'" + did + "': ['" + deg.join("', '") + "']");
						}
					}
				});
		
				
		
				$('.kodayar').each(function() {
					ayar.push("'" + $(this).attr('id') + "': '" + $(this).val().replace(/("|')/g, " ") + "'");
				});
		
				$('.colorpick').each(function() {
					renkler.push("'" + $(this).attr('id') + "': '" + $(this).val().replace(/("|')/g, " ") + "'");
				});
		
				var kod = '<' + 'script type="text/javascript" src="http://www.secretcv.com/modul3/ilan/kutu/js"><' + '/script>\n';
				kod += '<' + 'script type="text/javascript">\n';
				kod += '\tSCV_ilan_kutusu()';
		
				if (opt.length > 0) {
					kod += ".secenekler(\n\t{\n\t\t" + opt.join(",\n\t\t") + "\n\t})";
				}
		
				if (ayar.length > 0) {
					kod += ".ayarlar(\n\t{\n\t\t" + ayar.join(",\n\t\t") + "\n\t})";
				}
		
				if (renkler.length > 0) {
					kod += ".renkler(\n\t{\n\t\t" + renkler.join(",\n\t\t") + "\n\t})";
				}
		
				kod += '.yaz();\n';
				kod += '<' + '/script>';
		
				if (ver) {
					$('#ilanlar_onizleme').html(kod);
				} else {
					$('#kutu_kod').val(kod);
				}
		
				// Nazmi ek
				// Coklu secimleri gerekli yerlere koyar.
				
				$('#<?=$this->get_field_id('scv_sektorler');?>').val("");
				$('#sektor :selected').each(function(i, selected){
					if(i == 0) { $('#<?=$this->get_field_id('scv_sektorler');?>').val($(selected).val()); }
					else { $('#<?=$this->get_field_id('scv_sektorler');?>').val($('#<?=$this->get_field_id('scv_sektorler');?>').val() + "," + $(selected).val()); } 
				});
				
				$('#<?=$this->get_field_id('scv_bolumler');?>').val("");
				$('#bolum :selected').each(function(i, selected){
					if(i == 0) { $('#<?=$this->get_field_id('scv_bolumler');?>').val($(selected).val()); }
					else { $('#<?=$this->get_field_id('scv_bolumler');?>').val($('#<?=$this->get_field_id('scv_bolumler');?>').val() + "," + $(selected).val()); }
				});
				
				$('#<?=$this->get_field_id('scv_sehirler');?>').val("");
				$('#sehir :selected').each(function(i, selected){
					if(i == 0) { $('#<?=$this->get_field_id('scv_sehirler');?>').val($(selected).val()); }
					else { $('#<?=$this->get_field_id('scv_sehirler');?>').val($('#<?=$this->get_field_id('scv_sehirler');?>').val() + "," + $(selected).val()); }
				});
			}
		
			
			function renk_sifirla() {
				for (key in vrenkler) {
					$("#" + key).val(vrenkler[key]).next("div.color_picker").css("background-color", vrenkler[key]);
					$("#" + key).change();
				}
			}
		</script>
		<link rel="stylesheet" href="http://static.secretcv.com/js/colorpicker/colorpicker.css" type="text/css" />
		<style type="text/css">
		body, table, td,div, span, select { font-size: 10px;}
		input.colorpick {display: none;}
		#ilanlar_onizleme
		{
			height: 405px;
			width: 300px;
			overflow: auto;
			background-color: #fff;
		}
		.divbuton
		{
			float: right;
			color: #008;
			font-weight: bold;
			cursor: pointer;
			margin-top: 3px;
			padding: 5px;
			background-color: #fff;
		}
		</style>
		<table width="740" border="0" align="center" cellpadding="0" cellspacing="0">
		    <tr>
				<td valign="top" align="left" width="500" bgcolor="#F4F4F4">
					<table width="99%" border="0" cellspacing="0" cellpadding="2" align="center" id="scv_container">
						<tr>
							<td>
								<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
									<tr>
										<td align="left">
											<strong>Sektör:</strong><br />
											<select multiple="multiple" size="5" style="width: 150px; height: 200px;" id="sektor" name="tmp_scv_sektorler"> </select>
											<input type="hidden" id="<?=$this->get_field_id('scv_sektorler');?>" name="<?=$this->get_field_name('scv_sektorler');?>">
										</td>
										<td align="left">
											<strong>Bölüm:</strong><br />
											<select multiple="multiple" size="5" style="width: 150px; height: 200px;" id="bolum" name="tmp_scv_bolumler"> </select>
											<input type="hidden" id="<?=$this->get_field_id('scv_bolumler');?>" name="<?=$this->get_field_name('scv_bolumler');?>">
										</td>
										<td align="left">
											<strong>Şehir:</strong><br />
											<select multiple="multiple" size="5" style="width: 150px; height: 200px;" id="sehir" name="tmp_scv_sehirler"> </select>
											<input type="hidden" id="<?=$this->get_field_id('scv_sehirler');?>" name="<?=$this->get_field_name('scv_sehirler');?>">
										</td>
									</tr>
									<tr>
										<td colspan="3" style="padding: 4px 1px;">
											<table style="margin: 0; width: 100%;">
												<tr>
													<th style="text-align: left;">Genişlik:</th>
													<td>
														<input type="text" name="<?=$this->get_field_name('scv_genislik');?>" id="genislik" value="<?=$varsayilanlar['genislik'];?>" size="5" class="kodopt">
													</td>
												</tr>
												<tr>
													<th style="text-align: left;">Yükseklik:</th>
													<td>
														<input type="text" name="<?=$this->get_field_name('scv_yukseklik');?>" id="yukseklik" value="<?=$varsayilanlar['yukseklik'];?>" size="5" class="kodopt">
													</td>
												</tr>
												<tr>
													<th style="text-align: left;">Sayfa başına ilan sayısı:</th>
													<td>
														<select name="<?=$this->get_field_name('scv_oge_sayisi');?>" id="oge_sayisi" class="tek">
															<option value="5">5</option>
															<option value="10">10</option>
															<option value="15">15</option>
															<option value="20">20</option>
														</select>
													</td>
												</tr>
												<tr>
													<th style="text-align: left;">İlan açıklaması gösterilsin mi?:</th>
													<td>
														<select name="<?=$this->get_field_name('scv_detay');?>');?>" id="detay" class="tek">
															<option value="1" <?=($varsayilanlar['detay'] == 1)?"selected='selected'":"" ;?>>Evet</option>
															<option value="0" <?=($varsayilanlar['detay'] == 0)?"selected='selected'":"" ;?>>Hayır</option>
														</select>
													</td>
												</tr>
												<tr>
													<th style="text-align: left;">Firma logosu gösterilsin mi?:</th>
													<td>
														<select name="<?=$this->get_field_name('scv_logo');?>" id="logo" class="tek">
															<option value="1" <?=($varsayilanlar['logo'] == 1)?"selected='selected'":"" ;?>>Evet</option>
															<option value="0" <?=($varsayilanlar['logo'] == 0)?"selected='selected'":"" ;?>>Hayır</option>
														</select>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td style="padding: 4px 1px;">
								<table style="margin: 0; width: 100%;">
									<tr>
										<th style="width: 40%; text-align: left;">Başlık Yazı Rengi:</th>
										<td style="width: 10%;">
											<input type="text" name="<?=$this->get_field_name('scv_r_b_y');?>" id="r_b_y" value="<?=$renkler['r_b_y'];?>" class='colorpick' >
										</td>
										<th style="width: 40%; text-align: left;">Başlık Arkaplan Rengi:</th>
										<td style="width: 10%;">
											<input type="text" name="<?=$this->get_field_name('scv_r_b_bg');?>" id="r_b_bg" value="<?=$renkler['r_b_bg'];?>" class='colorpick' >
										</td>
									</tr>
									<tr>
										<th style="text-align: left;">İlan Başlığı Rengi:</th>
										<td>
											<input type="text" name="<?=$this->get_field_name('scv_r_ib_y');?>" id="r_ib_y" value="<?=$renkler['r_ib_y'];?>" class='colorpick' >
										</td>
										<th style="text-align: left;">İlan Tarihi Rengi:</th>
										<td>
											<input type="text" name="<?=$this->get_field_name('scv_r_it_y');?>" id="r_it_y" value="<?=$renkler['r_it_y'];?>" class='colorpick' >
										</td>
									</tr>
									<tr>
										<th style="text-align: left;">İlan Açıklaması Rengi:</th>
										<td>
											<input type="text" name="<?=$this->get_field_name('scv_r_ia_y');?>" id="r_ia_y" value="<?=$renkler['r_ia_y'];?>" class='colorpick' >
										</td>
										<th style="text-align: left;">Genel Yazı Rengi:</th>
										<td>
											<input type="text" name="<?=$this->get_field_name('scv_r_y');?>" id="r_y" value="<?=$renkler['r_y'];?>" class='colorpick' >
										</td>
									</tr>
									<tr>
										<th style="text-align: left;">Arkaplan Rengi 1:</th>
										<td>
											<input type="text" name="<?=$this->get_field_name('scv_r_bg_1');?>" id="r_bg_1" value="<?=$renkler['r_bg_1'];?>" class='colorpick' >
										</td>
										<th style="text-align: left;">Arkaplan Rengi 2:</th>
										<td>
											<input type="text" name="<?=$this->get_field_name('scv_r_bg_2');?>" id="r_bg_2" value="<?=$renkler['r_bg_2'];?>" class='colorpick' >
										</td>
									</tr>
								</table>
								<div class="bgt divbuton" title="Varysayılan Renkler" style="float: left;" onclick="renk_sifirla(); return false;">
									<img src="http://static.secretcv.com/images/silk/layout.png" style="vertical-align: middle;" alt="Varsayılan" /> Varsayılan Renkler
								</div>
							</td>
						</tr>
					</table>
				</td>
				<td valign="top" width="200" bgcolor="#F4F4F4">
					<table width="99%" border="0" align="center" cellpadding="2" cellspacing="0">
						<tr>
							<td style="font-weight: bold; font-size: 12px;">
								<div style="float: left;">Önizleme:</div>
								<div style="float: right; cursor: pointer;" title="Önizlemeyi Güncelle" onclick="kod_guncelle(true); return false;"><img src="http://static.secretcv.com/images/silk/application_side_list.png" style="vertical-align: middle;" alt="Güncelle" /> Önizlemeyi Güncelle</div>
							</td>
						</tr>
						<tr>
							<td>
								<div id="ilanlar_onizleme"></div>
							</td>
						</tr>
					</table>
				</td>
		    </tr>
		</table>
		<?php
	}
}

?>