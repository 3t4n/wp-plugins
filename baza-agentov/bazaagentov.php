<?php
/*
Plugin Name: bazaagentov
Plugin URI: http://bazagentov.ru/plugin
Description: Показывает общегородскую базу недвижимости на вашем сайте.
Version: 0.16
License: GPL
Author: Semenov Dmitry
Author URI: http://dmitriysemenov15.moikrug.ru
*/

require_once('bazaagentov_wp.php');

if (!class_exists('bazaagentov')) {
	class bazaagentov extends bazaagentov_wp {
	

		function bazaagentov() {
			parent::__construct();
			$this->version = "0.15";
			add_action( 'admin_menu', array(&$this, 'setupSettingsPage') );
			add_action( 'plugins_loaded', array(&$this, 'setupWidget') );
			add_action ( 'wp_head' , array ( &$this , 'styles' ) , 7 );
			register_activation_hook( __FILE__, array( &$this, 'setupActivation' ));
		}

		function styles () {
			$plugin_url = get_option('siteurl').'/wp-content/plugins/baza-agentov';//$this->plugin_url ();
			wp_enqueue_script('bazaagentov_js', $plugin_url.'/bazaagentov.js', false , $this->version  );
			wp_enqueue_script('highslide_js', $plugin_url.'/highslide/highslide-with-html.js', false , $this->version  );

			wp_enqueue_style ( 'bazaagentov-css' , $plugin_url . '/css/ba.css' , false , $this->version , 'screen' );
			wp_enqueue_style ( 'highslide-css' , $plugin_url . '/highslide/highslide.css' , false , $this->version , 'screen' );

			
		}


		
	
		function setupActivation() {
		
			function get_and_delete_option($setting) { $v = get_option($setting); delete_option($setting); return $v; }
		
			// check for previously installed version 4.0 or older
			if (get_option('bazaagentov_flickrid')) {
				// let's port previous settings and delete them
				$settings = $this->fixArguments(array(
					get_and_delete_option('bazaagentov_display_numitems'),
					get_and_delete_option('bazaagentov_display_type'),
					get_and_delete_option('bazaagentov_tags'),
					get_and_delete_option('bazaagentov_display_imagesize'),
					get_and_delete_option('bazaagentov_before'),
					get_and_delete_option('bazaagentov_after'),
					get_and_delete_option('bazaagentov_flickrid'),
					get_and_delete_option('bazaagentov_set'),
					get_and_delete_option('bazaagentov_use_image_cache'),
					get_and_delete_option('bazaagentov_image_cache_uri'),
					get_and_delete_option('bazaagentov_image_cache_dest')
				));
				update_option('bazaagentov_settings', $settings);
			}
		
			// update version number
			if (get_option('bazaagentov_version') != $this->version)
				update_option('bazaagentov_version', $this->version);
		}
	
		function fixArguments($args) {
			$settings = array();
		
			if (isset($args[0])) $settings['num_items'] = $args[0];
		  	if (isset($args[1])) $settings['type'] = $args[1];
		  	if (isset($args[2])) $settings['tags'] = $args[2];
		  	if (isset($args[6])) $settings['id'] = $args[6];
		  	if (isset($args[7])) $settings['set'] = $args[7];
			if (isset($args[8])) $settings['do_cache'] = $args[8];
			if (isset($args[9])) $settings['cache_uri'] = $args[9];
			if (isset($args[10])) $settings['cache_path'] = $args[10];
	
			$imagesize = $args[3]?$args[3]:"square";
			$before_image = $args[4]?$args[4]:"";
			$after_image = $args[5]?$args[5]:"";

			$settings['html'] = $before_image . '<li data-code="%id%" class="">      <span class="bgPng letter fontfaceOslo lA">A</span>        	    <a href="/home-for-sale-kelvington-saskatchewan-201315" class="showimage">			<img class="showimage-house" src="http://photos.duproprio.com/_imported/sk//201315//894196_medium.jpg" style="height:116px;width:155px;" alt="Bungalow in city Kelvington" title="Bungalow in city Kelvington">		    </a>		<div class="resultData">                 <p class="price skhomes4sale">%price% руб.</p>                <h4><a href="/home-for-sale-kelvington-saskatchewan-201315">%metro%</a> - <spanclass="precision">Reduced&nbsp;Price</span></h4>     	        <h5><a href="/home-for-sale-kelvington-saskatchewan-201315">%adress%</a></h5>                    <p>  %date% %type% %metro_dist% %sj% %sk% %sun_uzel% %telephone% %mebel% %holod% %washingmachine% %about% %komnat% %komnat_all%  %photo%  %floar% %floars%</p>		    </div>		    <div class="resultMeta">		<p>%komnat%к. кв.  площадь: %so% </p>	    </div>	</li>    ' . $after_image;
		
			return $settings;
		}
	

	
		function setupWidget() {
			if (!function_exists('register_sidebar_widget')) return;
			// Отправить имя домена в базу агентов
			//$_SERVER
			function widget_bazaagentov($args) {
				extract($args);
				$options = get_option('widget_bazaagentov');
				$title = $options['title'];
				echo $before_widget . $before_title . $title. '<div style="float:right;display:none;" id="ba_ajax_label">Загрузка... </div>' . $after_title;
				get_bazaagentov();
				echo $after_widget;
			}
			function widget_bazaagentov_control() {
				$options = get_option('widget_bazaagentov');
				if ( $_POST['bazaagentov-submit'] ) {
					$options['title'] = strip_tags(stripslashes($_POST['bazaagentov-title']));
					update_option('widget_bazaagentov', $options);
				}
				$title = htmlspecialchars($options['title'], ENT_QUOTES);
				$settingspage = trailingslashit(get_option('siteurl')).'wp-admin/options-general.php?page='.basename(__FILE__);
				echo 
				'<p><label for="bazaagentov-title">Заголовок:<input class="widefat" name="bazaagentov-title" type="text" value="'.$title.'" /></label></p>'.
				'<p>Что бы увидеть все настройки зайдите на <a href="'.$settingspage.'">страницу настроек База Агентов</a>.</p>'.
				'<input type="hidden" id="bazaagentov-submit" name="bazaagentov-submit" value="1" />';
			}
			register_sidebar_widget('Список объектов', 'widget_bazaagentov');
			register_widget_control('Список объектов', 'widget_bazaagentov_control');

			function widget_bazaagentov_panel($args) {
				extract($args);
				$options = get_option('widget_bazaagentov');
				$title = $options['title'];
				//echo $before_widget . $before_title . $title . $after_title;
				get_bazaagentov_panel();
				//echo $after_widget;
			}
			function widget_bazaagentov_panel_control() {
				$options = get_option('widget_bazaagentov');
				if ( $_POST['bazaagentov-submit'] ) {
					$options['title'] = strip_tags(stripslashes($_POST['bazaagentov-title']));
					update_option('widget_bazaagentov', $options);
				}
				$title = htmlspecialchars($options['title'], ENT_QUOTES);
				$settingspage = trailingslashit(get_option('siteurl')).'wp-admin/options-general.php?page='.basename(__FILE__);
				echo 
				'<p><label for="bazaagentov-title">Заголовок:<input class="widefat" name="bazaagentov-title" type="text" value="'.$title.'" /></label></p>'.
				'<p>Что бы увидеть все настройки зайдите на <a href="'.$settingspage.'">страницу настроек База Агентов</a>.</p>'.
				'<input type="hidden" id="bazaagentov-submit" name="bazaagentov-submit" value="1" />';
			}
			register_sidebar_widget('Параметры поиска', 'widget_bazaagentov_panel');
			register_widget_control('Параметры поиска', 'widget_bazaagentov_panel_control');

		}
	
		function setupSettingsPage() {
			if (function_exists('add_options_page')) {
				add_options_page('База Агентов настройки', 'База Агентов', 8, basename(__FILE__), array(&$this, 'printSettingsPage'));
			}
		}
	
		function printSettingsPage() {
			$settings = $this->getSettings();
			if (isset($_POST['save_bazaagentov_settings'])) {
				foreach ($settings as $name => $value) {
					$settings[$name] = $_POST['bazaagentov_'.$name];
				}
				$settings['cache_sizes'] = array();
				foreach (array("small", "square", "thumbnail", "medium", "large") as $size) {
					if ($_POST['bazaagentov_cache_'.$size]) $settings['cache_sizes'][] = $size;
				}
				update_option('bazaagentov_settings', $settings);
				echo '<div class="updated"><p>Настройки Базы Агентов сохранены!</p></div>';
			}
			if (isset($_POST['reset_bazaagentov_settings'])) {
				delete_option('bazaagentov_settings');
				echo '<div class="updated"><p>Настройки базы агентов восстановлены по умолчанию!</p></div>';
			}
			include ("bazaagentov-settingspage.php");
		}
	
	}
}
$bazaagentov = new bazaagentov();

function get_bazaagentov($settings = array()) {
	global $bazaagentov;
	
	$bazaagentov->get_bazaagentov($settings);
}

function get_bazaagentov_panel($settings = array()) {
	global $bazaagentov;
	?>
	<a href="<?=get_option('siteurl').'/wp-content/plugins/baza-agentov/jsonp/search.php' ?>">test</a>
	<h2>Параметры поиска</h2><div id="filters_body">
	<form action="/wp-content/plugins/baza-agentov/ba_ajax.php" id="ba_form">
		<div class="clearfix" id="filter_content">
			<label for="filter_type" class="filter_title">Объект</label>
            
            <select class="prop_type_select cleft" id="filter_type" onchange="go()" name="type">
		<option selected="selected" value="1">
	  		Комната
		</option>
		<option value="0">
		  Квартира
		</option>
            </select>
            
	 <div class="clearfix ">
              <label for="" class="filter_title fleft">Колличество комнат</label>
        </div>
	<div class="cleft">
            <label for="lt_0" id="lt_0_label">
<input type="checkbox" onclick="go()" value="1" name="room[]" class="f_checkbox" id="room_1">1</label>
<label for="lt_1" id="lt_1_label">
<input type="checkbox" onclick="go()" value="2" name="room[]" class="f_checkbox" id="room_2">2</label>
<label for="lt_2" id="lt_2_label">
<input type="checkbox" onclick="go()" value="3" name="room[]" class="f_checkbox" id="room_3">3</label>
<label for="lt_2" id="lt_3_label">
<input type="checkbox" onclick="go()" value="4" name="room[]" class="f_checkbox" id="room_4">4+</label>
	</div>
<script type="text/javascript"> 
hs.graphicsDir = '<?=get_option('siteurl').'/wp-content/plugins/baza-agentov' ?>/highslide/graphics/';
hs.outlineType = 'rounded-white';
hs.wrapperClassName = 'draggable-header';
</script> 


<div > 
<!--
	3) Mark up the main content like this to use a self rendering content wrapper with inline
	main content. The content is grabbed from the first subsequent
	div with a class name of .highslide-maincontent.
--> 
<a href="index.htm" onclick="return hs.htmlExpand(this,{ headingText: 'Выберите станции метро', width:660, height:580  })"> 
	Выбрать метро
</a> 

<div class="highslide-maincontent" > 
	<ul id="mapspb"> <li class="nsel" id="Komendantskiiypr"><a class="Komendantskiiypr" href="#" onclick="m(this.className,'Комендантск.пр.',16)"><span>_____________</span></a></li> <li class="nsel" id="Staraiaderevnia"><a class="Staraiaderevnia" href="#" onclick="m(this.className,'Старая Деревня',57)"><span>______________</span></a></li> <li class="nsel" id="Krestovskiiyostrov"><a class="Krestovskiiyostrov" href="#" onclick="m(this.className,'Крестовск.остров',17)"><span>______________</span></a></li> <li class="nsel" id="Chkalovskaia"><a class="Chkalovskaia" href="#" onclick="m(this.className,'Чкаловская',65)"><span>______________</span></a></li> <li class="nsel" id="Sportivnaia"><a class="Sportivnaia" href="#" onclick="m(this.className,'Спортивная',56)"><span>______________</span></a></li> <li class="nsel" id="Spasskaia"><a class="Spasskaia" href="#" onclick="m(this.className,'Спасская',230)"><span>_____</span></a></li> <li class="nsel" id="Zvenigorodskaia"><a class="Zvenigorodskaia" href="#" onclick="m(this.className,'Звенигородская',27)"><span>_____</span></a></li> <li class="nsel" id="Volkovskaia"><a class="Volkovskaia" href="#" onclick="m(this.className,'Волковская',21)"><span>__________</span></a></li> <li class="nsel" id="Parnas"><a class="Parnas" href="#" onclick="m(this.className,'Парнас',35)"><span>_____________</span></a></li> <li class="nsel" id="PrProsvesheniia"><a class="PrProsvesheniia" href="#" onclick="m(this.className,'Пр.Просвещения',49)"><span>_____________</span></a></li> <li class="nsel" id="Ozerki"><a class="Ozerki" href="#" onclick="m(this.className,'Озерки',33)"><span>_____________</span></a></li> <li class="nsel" id="Udelnaia"><a class="Udelnaia" href="#" onclick="m(this.className,'Удельная',60)"><span>_____________</span></a></li> <li class="nsel" id="Pionerskaia"><a class="Pionerskaia" href="#" onclick="m(this.className,'Пионерская',37)"><span>_____________</span></a></li> <li class="nsel" id="Chernaiarechka"><a class="Chernaiarechka" href="#" onclick="m(this.className,'Черная речка',63)"><span>_____________</span></a></li> <li class="nsel" id="Petrogradskaia"><a class="Petrogradskaia" href="#" onclick="m(this.className,'Петроградская',36)"><span>_____________</span></a></li> <li class="nsel" id="Gorkovskaia"><a class="Gorkovskaia" href="#" onclick="m(this.className,'Горьковская',8)"><span>_____________</span></a></li> <li class="nsel" id="Nevskiiypr"><a class="Nevskiiypr" href="#" onclick="m(this.className,'Невский пр.',29)"><span>_____________</span></a></li> <li class="nsel" id="Sennaya"><a class="Sennaya" href="#" onclick="m(this.className,'Сенная пл.',55)"><span>_____________</span></a></li> <li class="nsel" id="Texnologicheskiiyinstitut"><a class="Texnologicheskiiyinstitut" href="#" onclick="m(this.className,'Технологич.ин.',58)"><span>_____________</span></a></li> <li class="nsel" id="Frunzenskaia"><a class="Frunzenskaia" href="#" onclick="m(this.className,'Фрунзенская',62)"><span>_____________</span></a></li> <li class="nsel" id="Moskovskievorota"><a class="Moskovskievorota" href="#" onclick="m(this.className,'Московск.ворота',25)"><span>_____________</span></a></li> <li class="nsel" id="Elektrosila"><a class="Elektrosila" href="#" onclick="m(this.className,'Электросила',66)"><span>_____________</span></a></li> <li class="nsel" id="ParkPobedi"><a class="ParkPobedi" href="#" onclick="m(this.className,'Парк Победы',34)"><span>_____________</span></a></li> <li class="nsel" id="Moskovskaia"><a class="Moskovskaia" href="#" onclick="m(this.className,'Московская',26)"><span>_____________</span></a></li> <li class="nsel" id="Zvezdnaia"><a class="Zvezdnaia" href="#" onclick="m(this.className,'Звездная',14)"><span>_____________</span></a></li> <li class="nsel" id="Kupchino"><a class="Kupchino" href="#" onclick="m(this.className,'Купчино',18)"><span>_____________</span></a></li> <li class="nsel" id="Primorskaia"><a class="Primorskaia" href="#" onclick="m(this.className,'Приморская',50)"><span>_____________</span></a></li> <li class="nsel" id="Vasileostrovskaia"><a class="Vasileostrovskaia" href="#" onclick="m(this.className,'Василеостровская',5)"><span>_____________</span></a></li> <li class="nsel" id="Gostinniiydvor"><a class="Gostinniiydvor" href="#" onclick="m(this.className,'Гостиный Двор',9)"><span>_____________</span></a></li> <li class="nsel" id="plVosstaniia"><a class="plVosstaniia" href="#" onclick="m(this.className,'Пл.Восстания',40)"><span>_____________</span></a></li> <li class="nsel" id="PlAlNevskogo"><a class="PlAlNevskogo" href="#" onclick="m(this.className,'Пл.Ал.Невск.',38)"><span>_____________</span></a></li> <li class="nsel" id="Elizarovskaia"><a class="Elizarovskaia" href="#" onclick="m(this.className,'Елизаровская',13)"><span>_____________</span></a></li> <li class="nsel" id="Lomonosovskaia"><a class="Lomonosovskaia" href="#" onclick="m(this.className,'Ломоносовская',24)"><span>_____________</span></a></li> <li class="nsel" id="Proletarskaya"><a class="Proletarskaya" href="#" onclick="m(this.className,'Пролетарская',51)"><span>_____________</span></a></li> <li class="nsel" id="Obuxovo"><a class="Obuxovo" href="#" onclick="m(this.className,'Обухово',32)"><span>_____________</span></a></li> <li class="nsel" id="Ribackoe"><a class="Ribackoe" href="#" onclick="m(this.className,'Рыбацкое',53)"><span>_____________</span></a></li> <li class="nsel" id="Deviatkino"><a class="Deviatkino" href="#" onclick="m(this.className,'Девяткино',11)"><span>_____________</span></a></li> <li class="nsel" id="Grazhdanskiiypr"><a class="Grazhdanskiiypr" href="#" onclick="m(this.className,'Гражданский пр.',10)"><span>_____________</span></a></li> <li class="nsel" id="Akademicheskaia"><a class="Akademicheskaia" href="#" onclick="m(this.className,'Академическая',3)"><span>_____________</span></a></li> <li class="nsel" id="Politexnicheskaia"><a class="Politexnicheskaia" href="#" onclick="m(this.className,'Политехническая',45)"><span>_____________</span></a></li> <li class="nsel" id="PlMuzhestva"><a class="PlMuzhestva" href="#" onclick="m(this.className,'Пл.Мужества',44)"><span>_____________</span></a></li> <li class="nsel" id="Lesnaia"><a class="Lesnaia" href="#" onclick="m(this.className,'Лесная',22)"><span>_____________</span></a></li> <li class="nsel" id="Viborgskaia"><a class="Viborgskaia" href="#" onclick="m(this.className,'Выборгская',7)"><span>_____________</span></a></li> <li class="nsel" id="PlLenina"><a class="PlLenina" href="#" onclick="m(this.className,'Пл.Ленина',42)"><span>_____________</span></a></li> <li class="nsel" id="Chernishevskaia"><a class="Chernishevskaia" href="#" onclick="m(this.className,'Чернышевская',64)"><span>_____________</span></a></li> <li class="nsel" id="Maiakovskaia"><a class="Maiakovskaia" href="#" onclick="m(this.className,'Маяковская',229)"><span>_____________</span></a></li> <li class="nsel" id="Vladimirskaia"><a class="Vladimirskaia" href="#" onclick="m(this.className,'Владимирская',6)"><span>_____________</span></a></li> <li class="nsel" id="Pushkinskaia"><a class="Pushkinskaia" href="#" onclick="m(this.className,'Пушкинская',52)"><span>_____________</span></a></li> <li class="nsel" id="Baltiiyskaia"><a class="Baltiiyskaia" href="#" onclick="m(this.className,'Балтийская',4)"><span>_____________</span></a></li> <li class="nsel" id="Narvskaia"><a class="Narvskaia" href="#" onclick="m(this.className,'Нарвская',28)"><span>_____________</span></a></li> <li class="nsel" id="Kirovskiiyzavod"><a class="Kirovskiiyzavod" href="#" onclick="m(this.className,'Кировский з-д',15)"><span>_____________</span></a></li> <li class="nsel" id="Avtovo"><a class="Avtovo" href="#" onclick="m(this.className,'Автово',2)"><span>_____________</span></a></li> <li class="nsel" id="Leninskiiypr"><a class="Leninskiiypr" href="#" onclick="m(this.className,'Ленинский пр.',20)"><span>_____________</span></a></li> <li class="nsel" id="prVeteranov"><a class="prVeteranov" href="#" onclick="m(this.className,'Пр.Ветеранов',47)"><span>_____________</span></a></li> <li class="nsel" id="Sadovaya"><a class="Sadovaya" href="#" onclick="m(this.className,'Садовая',55)"><span>_____________</span></a></li> <li class="nsel" id="Dostoevskaia"><a class="Dostoevskaia" href="#" onclick="m(this.className,'Достоевская',12)"><span>_____________</span></a></li> <li class="nsel" id="Ligovskiiypr"><a class="Ligovskiiypr" href="#" onclick="m(this.className,'Лиговский пр.',23)"><span>_____________</span></a></li> <li class="nsel" id="Novocherkasskaia"><a class="Novocherkasskaia" href="#" onclick="m(this.className,'Новочеркасская',31)"><span>_____________</span></a></li> <li class="nsel" id="Ladozhskaia"><a class="Ladozhskaia" href="#" onclick="m(this.className,'Ладожская',19)"><span>_____________</span></a></li> <li class="nsel" id="prBolshevikov"><a class="prBolshevikov" href="#" onclick="m(this.className,'Пр.Большевиков',46)"><span>_____________</span></a></li> <li class="nsel" id="ulDibenko"><a class="ulDibenko" href="#" onclick="m(this.className,'Ул.Дыбенко',61)"><span>_____________</span></a></li> </ul>

<input onclick="return;" value="Выбрать" type="button">
</div> 


        	<div id="metro_selected" style="display:none">
			<div class="filter_right " style="display: block;margin-top:7px;">[<a href="#" onclick="location_clear()">убр. все</a>]   </div> 
	         </div>
	         
              	
          <div class="filter cleft">
            <label for="" class="filter_title">Стоимость</label>
            <div id="filter_price_section_content" class="cleft">
            <table border="0" width="100%" cellspacing="0" cellpadding="0">
            <tbody><tr>
              <td>
                <select class="price_select" id="filter_price_min" name="price_min" onchange="go()">
                  <option value="0">От</option>
                  <option value="8000">8 000руб.</option>
                  <option value="9000">9 000руб.</option>
                  <option value="10000">10 000руб.</option>
                  <option value="11000">11 000руб.</option>
                  <option value="15000">15 000руб.</option>
                  <option value="16000">16 000руб.</option>
                  <option value="17000">17 000руб.</option>
                  <option value="18000">18 000руб.</option>
                  <option value="19000">19 000руб.</option>
                  <option value="20000">20 000руб.</option>
                  <option value="21000">21 000руб.</option>
                  <option value="22000">22 000руб.</option>
                  <option value="23000">23 000руб.</option>
                  <option value="24000">24 000руб.</option>
                  <option value="25000">25 000руб.</option>
                  <option value="30000">30 000руб.</option>
                  <option value="35000">35 000руб.</option>
                </select>
              </td>
              <td>
                <select class="price_select" id="filter_price_max" name="price_max" onchange="go()">
                  <option value="0">До</option>
                  <option value="9000">9 000руб.</option>
                  <option value="10000">10 000руб.</option>
                  <option value="11000">11 000руб.</option>
                  <option value="15000">15 000руб.</option>
                  <option value="16000">16 000руб.</option>
                  <option value="17000">17 000руб.</option>
                  <option value="18000">18 000руб.</option>
                  <option value="19000">19 000руб.</option>
                  <option value="20000">20 000руб.</option>
                  <option value="21000">21 000руб.</option>
                  <option value="22000">22 000руб.</option>
                  <option value="23000">23 000руб.</option>
                  <option value="24000">24 000руб.</option>
                  <option value="25000">25 000руб.</option>
                  <option value="30000">30 000руб.</option>
                  <option value="35000">35 000руб.</option>
                </select>
              </td>
            </tr>
          </tbody></table>
            </div>
          
          <label for="" class="filter_title">Обязательно</label><!-- <a rel="nofollow" onclick="return false;" href="" style="margin-top:7px;" class="imgsheet action info_white">Инфо</a>!-->
            <div class="cleft">
            <label class="block" for="telephone" id="telephone_label">
            <input type="checkbox" onclick="go()" name="telephone" id="telephone" class="f_checkbox">Телефон</label>
            <label class="block" for="washingmachine" id="washingmachine_label">
            <input type="checkbox" onclick="go()" name="washingmachine" id="washingmachine" class="f_checkbox">Стиральная машина</label>
            <label class="block" for="holod" id="holod_label">
            <input type="checkbox" onclick="go()" name="holod" id="holod" class="f_checkbox">Холодильник</label>
            <label class="block" for="mebel" id="mebel_label">
            <input type="checkbox" name="mebel" onclick="go()" id="mebel" class="f_checkbox">Мебель</label>

          	</div>
        </div>


	</div>
	</form>
</div><?
	//$bazaagentov->get_bazaagentov($settings);
}

?>
