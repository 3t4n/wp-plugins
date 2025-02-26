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

if (!class_exists('bazaagentov_base')) {
	class bazaagentov_base {
	
		public $photo_default;
		public $settings_default;

		function __construct(){
			$this->photo_default = 'http://bazaagentov.ru/img/no_foto.jpg';
			$this->init_settings_default();
		}

		// Получение настроек, сейчас настройки по умолчанию, далее перегружается настройками wordpress
		function getSettings(){
			return $this->settings_default;
		}

		function init_settings_default(){

			$this->settings_default = array(
				/*== Content params ==*/
				// The type of Flickr images that you want to show. Possible values: 'user', 'favorite', 'set', 'group', 'public'
				'type' => 'public',
				// Optional: To be used when type = 'user' or 'public', comma separated
				'tags' => '',
				// Optional: To be used when type = 'set' 
				'set' => '',
				// Optional: Your Group or User ID. To be used when type = 'user' or 'group'
				'id' => '',
				// Do you want caching?
				'do_cache' => false,
				// The image sizes to cache locally. Possible values: 'square', 'thumbnail', 'small', 'medium' or 'large', provided within an array
				'cache_sizes' => array('square'),
				// Where images are saved (Server path)
				'cache_path' => '',
				// The URI associated to the cache path (web address)
				'cache_uri' => '',
			
				/*== Presentational params ==*/
				 // The number of thumbnails you want
				'num_items' => 4,
				 // the HTML to print before the list of images
				'before_list' => '<ol id="searchResults">',
				// the code to print out for each image. Meta tags available:
				// - %flickr_page%
				// - %title%
				// - %image_small%, %image_square%, %image_thumbnail%, %image_medium%, %image_large%
				'html' => '<li data-code="%id%" class="">      <span class="bgPng letter fontfaceOslo lA">A</span>        	    <a href="/home-for-sale-kelvington-saskatchewan-201315" class="showimage">			<img class="showimage-house" src="http://photos.duproprio.com/_imported/sk//201315//894196_medium.jpg" style="height:116px;width:155px;" alt="Bungalow in city Kelvington" title="Bungalow in city Kelvington">		    </a>		<div class="resultData">                 <p class="price skhomes4sale">%price% руб.</p>                <h4><a href="/home-for-sale-kelvington-saskatchewan-201315">%metro%</a> - <spanclass="precision">Reduced&nbsp;Price</span></h4>     	        <h5><a href="/home-for-sale-kelvington-saskatchewan-201315">%adress%</a></h5>                    <p>  %date% %type% %metro_dist% %sj% %sk% %sun_uzel% %telephone% %mebel% %holod% %washingmachine% %about% %komnat% %komnat_all%  %photo%  %floar% %floars%</p>		    </div>		    <div class="resultMeta">		<p>%komnat%к. кв.  площадь: %so% </p>	    </div>	</li>    ',
				// the default title
				'default_title' => "Недвижимость в аренду", 
				// the HTML to print after the list of images
				'after_list' => '</ol>'
			);

		}
	
		function replace_data($tpl, &$data){
			$data = $this->prepare_data($data);
			$tags = array('id','date','type','adress','metro_name','metro_dist','so','sj','sk','floar','floars','sun_uzel','telephone','mebel','holod','washingmachine','telephone_t','mebel_t','holod_t','washingmachine_t','price','about','komnat','komnat_all','photo');
			foreach($tags as $v){
				if(isset($data->$v)){
					$tpl = str_replace("%".$v."%", $data->$v, $tpl);
				}
			}
			return $tpl;

		}

		// Преобразует  данные
		function prepare_data($data){
	
			if(!empty($data->photo)){
				$data->photo = 'http://bazaagentov.ru/img/'.doubleval($data->id).'/1.jpg';
			}else{
				$data->photo = $this->photo_default;
			}

			if($data->komnat == $data->komnat_all){
				$data->komnat_all ='';
			}else{
				$data->komnat = $data->komnat.'('.$data->komnat_all.')';
			}


			$plus = array(array('telephone','телефон'),array('mebel','мебель'),array('holod','холодильник'),array('washingmachine','стиральная машина'));
			foreach($plus as $v){
				$data->$v[0] = $this->set_plus($data->$v[0]);
				$n = $v[0].'_t';
				$data->$n = $v[1];
			}

			if(!empty($data->type)){
				$data->type = 'комната';
			}else{
				$data->type = 'квартира';
			}

			$data->date = date("d.m.y", doubleval($data->date));

			return $data;

		}

		function set_plus($val){
			if(isset($val) and !empty($val)){
				return '+';
			}else{
				return '-';
			}
		}

		function get_param(){
		
			$param = array();
			$param['start'] = $_REQUEST['start'];
			$param['sourseId'] = $_REQUEST['sourseId'];
			$param['price_min'] = $_REQUEST['price_min'];
			$param['price_max'] = $_REQUEST['price_max'];
			$param['text_search'] = $_REQUEST['text_search'];
			$param['adress_text_search'] = $_REQUEST['adress_text_search'];
		//	$param['sourseId'] = $_REQUEST['sourseId'];
		//	$param['sourseId'] = $_REQUEST['sourseId'];
		//	$param['sourseId'] = $_REQUEST['sourseId']; room

			return http_build_query($param);
		}

		function get_bazaagentov($settings = array()){

		$settings = array_merge($this->getSettings(), $settings);
		$data =	json_decode(file_get_contents('http://bazaagentov.ru/api/index.php?c=agentapi&m=json&'.$this->get_param().'&start=0&limit=25&sourseId=room&client_id=&type='));
		
		echo '<div id="bazaagentov_result">'.stripslashes($settings['before_list']);
		if(!empty($data->topics)){	
			foreach ( $data->topics  as $item ) {
				echo $this->replace_data(stripslashes($settings['html']), $item);
			}
		}else{
			echo '<div class="objnotfound">объектов не найдено</div>';
		}
		echo stripslashes($settings['after_list']).'</div>';
		}
	}
}
?>
