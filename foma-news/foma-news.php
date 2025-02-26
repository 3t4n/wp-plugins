<?php
 /*
Plugin Name:  Foma's news
Plugin URI: http://support.prihod.ru/docs/vidzhety-i-sajdbary/novostnaya-lenta-zhurnala-foma/
Description: Новости и анонсы православного журнала "Фома"
Author: ORTOX
Version: 1.0.1
Author URI: http://prihod.ru
*/

////////////////////////////////////////////////////////////////
// ШПАРГАЛКА ПО ПАРАМЕТРАМ ШОРТКОДА foma-news
/*
Параметры:
-----------------------------------------
url - 1|2|3|4|5, идентификатор новости, по умолчанию = 1
count - 1..10, кол-во новостных блоков, по умолчанию = 5
date - yes|no, показвать дату? по умолчанию = yes
datesize - размер даты в pt, по умолчанию = 8pt
title - yes|no, показвать заголовок? по умолчанию = yes
titlesize - размер заголовка новости в pt, по умолчанию = 10
img - yes|no, показвать изображение? по умолчанию = yes 
imgsize - размер изображения в px, максимально 150, по умолчанию = 60
content - yes|no, показвать текст новости? по умолчанию = yes 
contentsize  - размер текста новости в pt, по умолчанию = 10
line - межстрочный интерва, по умолчанию = 1

*/

// Например [foma-news url='3' count='3' date='no' title='no' img='no']



////////////////////////////////////////////////////////////////
// ФИДЫ

$fomaNewsFeeds = array(
	'1' => 'http://foma.ru/novosti/feed', 
	'2' => 'http://foma.ru/stati/feed' 
	);

$fomaNewsFeedsName = array(
	'1' => 'Новости', 
	'2' => 'Статьи'
	);

// время жизни закешированных файлов (сек)
	
	define( '_FOMANEWS_CACHE_LIFETIME_', 1800);  // 30 минут

///////////////////////////////////////////////////////////////////////////////////////////
// Значения по умолчанию

		define( '_FOMANEWS_DEFAULT_URL_', 			1);			//идентификатор ссылки
		define( '_FOMANEWS_DEFAULT_COUNT_', 		5);			//кол-во блоков
		define( '_FOMANEWS_DEFAULT_DATE_', 			"yes");		//показывать дату?
		define( '_FOMANEWS_DEFAULT_DATESIZE_', 		8);			//размер даты
		define( '_FOMANEWS_DEFAULT_TITLE_', 		"yes");		//показывать заголовок?
		define( '_FOMANEWS_DEFAULT_TITLESIZE_', 	10);		//размер заголовка
		define( '_FOMANEWS_DEFAULT_IMG_', 			"yes");		//показывать изображение?
		define( '_FOMANEWS_DEFAULT_CONTENT_', 		"yes");		//показывать текст новости?
		define( '_FOMANEWS_DEFAULT_CONTENTSIZE_', 	10);			//размер основного текста новости
		define( '_FOMANEWS_DEFAULT_IMGSIZE_', 		60);		//размер изображения в px
		define( '_FOMANEWS_DEFAULT_LINE_', 			1);			//межстрочный интервал

///////////////////////////////////////////////////////////////////////////////////////////

define( 'FOMANEWS__PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'FOMANEWS__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

add_action('plugins_loaded', 'fomanews_init');

function fomanews_init() {
	load_plugin_textdomain("fomanews", false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}


// Виджет 
class FomaNews extends WP_Widget {
			public function __construct() {
				parent::__construct(
					'FomaNews',
					__('News feeds from the site foma.ru','fomanews'),
					array( 'description' =>  __('This widget shows the various news feeds from the site foma.ru','fomanews'))
				);



			}
			 
			public function widget( $args, $instance ){
				echo $args['before_widget'];

				// получаем сохраненные переменные	
		 		$title 			= isset( $instance[ 'title' ] )  ? $instance[ 'title' ] : '';
		 		$feed 			= isset( $instance[ 'feed' ] )  ? $instance[ 'feed' ] : _FOMANEWS_DEFAULT_URL_;
		 		$count 			= (isset( $instance[ 'count' ] ) and ($instance['count']*1)!=0)  ? $instance[ 'count' ] : _FOMANEWS_DEFAULT_COUNT_;
		 		$date 			= isset( $instance[ 'date' ] )  ? $instance[ 'date' ] : _FOMANEWS_DEFAULT_DATE_;
		 		$wtitle 		= isset( $instance[ 'wtitle' ] )  ? $instance[ 'wtitle' ] : _FOMANEWS_DEFAULT_TITLE_;
		 		$img 			= isset( $instance[ 'img' ] )  ? $instance[ 'img' ] : _FOMANEWS_DEFAULT_IMG_;
		 		$content 		= isset( $instance[ 'content' ] )  ? $instance[ 'content' ] : _FOMANEWS_DEFAULT_CONTENT_;
		 		$datesize 		= isset( $instance[ 'datesize' ] )  ? $instance[ 'datesize' ] : _FOMANEWS_DEFAULT_DATESIZE_;
		 		$titlesize 		= isset( $instance[ 'titlesize' ] )  ? $instance[ 'titlesize' ] : _FOMANEWS_DEFAULT_TITLESIZE_;
		 		$imgsize 		= isset( $instance[ 'imgsize' ] )  ? $instance[ 'imgsize' ] : _FOMANEWS_DEFAULT_IMGSIZE_;
		 		$contentsize 	= isset( $instance[ 'contentsize' ] )  ? $instance[ 'contentsize' ] : _FOMANEWS_DEFAULT_CONTENTSIZE_;
		 		$line 			= isset( $instance[ 'line' ] )  ? $instance[ 'line' ] : _FOMANEWS_DEFAULT_LINE_;	 			
				
				echo $args['before_title'].$title.$args['after_title'];

				// выводим
				echo shortcodefomanews(array(
					'url'			=> $feed,
					'count'			=> $count,
					'date'			=> $date,
					'datesize'		=> $datesize,
					'title'			=> $wtitle,
					'titlesize' 	=> $titlesize,
					'img'			=> $img,
					'content'		=> $content,
					'contentsize'	=> $contentsize,
					'imgsize'		=> $imgsize,
					'line'			=> $line
				));

				echo $args['after_widget'];
			}
				
			public function update( $new_instance,$old_instance)
			{
				    $instance = array();
				    $instance['title'] 			= strip_tags( $new_instance['title'] );
				    $instance['feed'] 			= strip_tags( $new_instance['feed'] );
				    $instance['count'] 			= strip_tags( $new_instance['count'] );
					$instance['date'] 			= strip_tags( $new_instance['date'] );
					$instance['wtitle'] 		= strip_tags( $new_instance['wtitle'] );
					$instance['img'] 			= strip_tags( $new_instance['img'] );
					$instance['content'] 		= strip_tags( $new_instance['content'] );
					$instance['datesize'] 		= strip_tags( (int)$new_instance['datesize'] );
					$instance['titlesize'] 		= strip_tags( (int)$new_instance['titlesize'] );
					$instance['imgsize'] 		= strip_tags( ((int)$new_instance['imgsize']==0 ? _FOMANEWS_DEFAULT_IMGSIZE_: (int)$new_instance['imgsize']));
					$instance['contentsize'] 	= strip_tags( (int)$new_instance['contentsize'] );
					$instance['line'] 			= strip_tags( ((($new_instance['line']*1)==0 or ($new_instance['line']*1)>5) ? _FOMANEWS_DEFAULT_LINE_:$new_instance['line']) );
					
					return $instance;
			}
				
			public function form( $instance ){
				global $fomaNewsFeeds,$fomaNewsFeedsName;

		 		$title 			= isset( $instance[ 'title' ] )  ? $instance[ 'title' ] : '';
		 		$feed 			= isset( $instance[ 'feed' ] )  ? $instance[ 'feed' ] : _FOMANEWS_DEFAULT_URL_;
		 		$count 			= (isset( $instance[ 'count' ] ) and ($instance['count']*1)!=0)  ? $instance[ 'count' ] : _FOMANEWS_DEFAULT_COUNT_;
		 		$date 			= isset( $instance[ 'date' ] )  ? $instance[ 'date' ] : _FOMANEWS_DEFAULT_DATE_;
		 		$wtitle 		= isset( $instance[ 'wtitle' ] )  ? $instance[ 'wtitle' ] : _FOMANEWS_DEFAULT_TITLE_;
		 		$img 			= isset( $instance[ 'img' ] )  ? $instance[ 'img' ] : _FOMANEWS_DEFAULT_IMG_;
		 		$content 		= isset( $instance[ 'content' ] )  ? $instance[ 'content' ] : _FOMANEWS_DEFAULT_CONTENT_;
		 		$datesize 		= isset( $instance[ 'datesize' ] )  ? $instance[ 'datesize' ] : _FOMANEWS_DEFAULT_DATESIZE_;
		 		$titlesize 		= isset( $instance[ 'titlesize' ] )  ? $instance[ 'titlesize' ] : _FOMANEWS_DEFAULT_TITLESIZE_;
		 		$imgsize 		= isset( $instance[ 'imgsize' ] )  ? $instance[ 'imgsize' ] : _FOMANEWS_DEFAULT_IMGSIZE_;
		 		$contentsize 	= isset( $instance[ 'contentsize' ] )  ? $instance[ 'contentsize' ] : _FOMANEWS_DEFAULT_CONTENTSIZE_;
		 		$line 			= isset( $instance[ 'line' ] )  ? $instance[ 'line' ] : _FOMANEWS_DEFAULT_LINE_;

		 		// создаем шорткод
		 		$shortcode 	= "[foma-news".
		 		($feed 		== _FOMANEWS_DEFAULT_URL_ 		? "":" url='".$feed."'").
		 		($count 	== _FOMANEWS_DEFAULT_COUNT_ 	? "":" count='".$count."'").
		 		($date 		== 'yes' 						? ($datesize>0 ? ($datesize==_FOMANEWS_DEFAULT_DATESIZE_ ? "":" datesize='".$datesize."'"):""):" date='no'").
		 		($wtitle 	== 'yes' 						? ($titlesize>0 ? ($titlesize==_FOMANEWS_DEFAULT_TITLESIZE_ ? "":" titlesize='".$titlesize."'"):""):" title='no'").
		 		($content 	== 'yes' 						? ($contentsize>0 ? ($contentsize==_FOMANEWS_DEFAULT_CONTENTSIZE_ ? "":" contentsize='".$contentsize."'"):""):" content='no'").
		 		($img 		== 'yes' 						? ($imgsize>0 ? ($imgsize==_FOMANEWS_DEFAULT_IMGSIZE_ ? "":" imgsize='".$imgsize."'"):""):" img='no'").
		 		($line 		== _FOMANEWS_DEFAULT_LINE_ 		? "":" line='".$line."'").
		 		"]";
		 		
		 		echo "<p align='center'><img src='".FOMANEWS__PLUGIN_URL."logo.png'></p>";

			    ?>
			    <p>
    				<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','fomanews'); ?></label>
    				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
    			</p>
			    <p>
    				<label for="<?php echo $this->get_field_id('feed'); ?>"><?php _e('News feed:','fomanews'); ?></label>
    				<select class="widefat" id="<?php echo $this->get_field_id( 'feed' ); ?>" name="<?php echo $this->get_field_name( 'feed' ); ?>">
	    				<?php
    					foreach ($fomaNewsFeedsName as $key => $value){
    						echo "<option value='".$key."' ".selected( esc_attr($feed),$key).">".$value."</option>";
    					}
    				?>
    				</select>
    			</p>

			    <table>
			    <tr>
			    	<td colspan='2'>
		   				<label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('Number of news blocks:','fomanews'); ?></label>
	    				<input id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" type="number" max='10' min='1' value="<?php echo esc_attr($count); ?>" />
			    	</td>
			    </tr>	
			    <tr>	
			    	<td>
     					<input id="<?php echo $this->get_field_id( 'date' ); ?>" name="<?php echo $this->get_field_name( 'date' ); ?>" type="checkbox" <?php checked(esc_attr($date),'yes'); ?> value='yes'/>
	   					<label for="<?php echo $this->get_field_id('date'); ?>"><?php _e('Show date','fomanews'); ?></label> 
	   				</td>
	   				<td>
	   					<label for="<?php echo $this->get_field_id('datesize'); ?>"><?php _e('size:','fomanews'); ?></label>
    					<select id="<?php echo $this->get_field_id( 'datesize' ); ?>" name="<?php echo $this->get_field_name( 'datesize' ); ?>">
	    				<?php
    						echo "<option value='6'  ".selected( esc_attr($datesize),6).">6</option>";
    						echo "<option value='8'  ".selected( esc_attr($datesize),8).">8</option>";
    						echo "<option value='10' ".selected( esc_attr($datesize),10).">10</option>";
    						echo "<option value='11' ".selected( esc_attr($datesize),11).">11</option>";
    						echo "<option value='12' ".selected( esc_attr($datesize),12).">12</option>";
    						echo "<option value='14' ".selected( esc_attr($datesize),14).">14</option>";
    						echo "<option value='16' ".selected( esc_attr($datesize),16).">16</option>";
    						echo "<option value='18' ".selected( esc_attr($datesize),18).">18</option>";
     						echo "<option value='20' ".selected( esc_attr($datesize),20).">20</option>";   						
	   					?>
    					</select> pt
    				</td>
    			</tr>		
	   			<tr> 	   					
			    	<td>
    					<input id="<?php echo $this->get_field_id( 'wtitle' ); ?>" name="<?php echo $this->get_field_name( 'wtitle' ); ?>" type="checkbox" <?php checked(esc_attr($wtitle),'yes'); ?> value='yes'/>
    					<label for="<?php echo $this->get_field_id('wtitle'); ?>"><?php _e('Show title news','fomanews'); ?></label>
    				</td>
    				<td>
    					<label for="<?php echo $this->get_field_id('titlesize'); ?>"><?php _e('size:','fomanews'); ?></label>
    					<select id="<?php echo $this->get_field_id( 'titlesize' ); ?>" name="<?php echo $this->get_field_name( 'titlesize' ); ?>">
	    				<?php
    						echo "<option value='6'  ".selected( esc_attr($titlesize),6).">6</option>";
    						echo "<option value='8'  ".selected( esc_attr($titlesize),8).">8</option>";
    						echo "<option value='10' ".selected( esc_attr($titlesize),10).">10</option>";
    						echo "<option value='11' ".selected( esc_attr($titlesize),11).">11</option>";
    						echo "<option value='12' ".selected( esc_attr($titlesize),12).">12</option>";
    						echo "<option value='14' ".selected( esc_attr($titlesize),14).">14</option>";
    						echo "<option value='16' ".selected( esc_attr($titlesize),16).">16</option>";
    						echo "<option value='18' ".selected( esc_attr($titlesize),18).">18</option>";
     						echo "<option value='20' ".selected( esc_attr($titlesize),20).">20</option>";   						
	   					?>
	   					</select> pt
	   				</td>
	   			</tr>		
			    <tr>
			    	<td>
    					<input id="<?php echo $this->get_field_id( 'content' ); ?>" name="<?php echo $this->get_field_name( 'content' ); ?>" type="checkbox" <?php checked(esc_attr($content),'yes'); ?> value='yes'/>
    					<label for="<?php echo $this->get_field_id('content'); ?>"><?php _e('Show news text','fomanews'); ?></label>
	   				</td>
    				<td>
    					<label for="<?php echo $this->get_field_id('contentsize'); ?>"><?php _e('size:','fomanews'); ?></label>
    					<select id="<?php echo $this->get_field_id( 'contentsize' ); ?>" name="<?php echo $this->get_field_name( 'contentsize' ); ?>">
	    				<?php
    						echo "<option value='6'  ".selected( esc_attr($contentsize),6).">6</option>";
    						echo "<option value='8'  ".selected( esc_attr($contentsize),8).">8</option>";
    						echo "<option value='10' ".selected( esc_attr($contentsize),10).">10</option>";
    						echo "<option value='11' ".selected( esc_attr($contentsize),11).">11</option>";
    						echo "<option value='12' ".selected( esc_attr($contentsize),12).">12</option>";
    						echo "<option value='14' ".selected( esc_attr($contentsize),14).">14</option>";
    						echo "<option value='16' ".selected( esc_attr($contentsize),16).">16</option>";
    						echo "<option value='18' ".selected( esc_attr($contentsize),18).">18</option>";
     						echo "<option value='20' ".selected( esc_attr($contentsize),20).">20</option>";   						
	   					?>
	   					</select> pt
	   				</td>
	   			</tr> 		   			
    			<tr> 	   					
			    	<td>
    					<input id="<?php echo $this->get_field_id( 'img' ); ?>" name="<?php echo $this->get_field_name( 'img' ); ?>" type="checkbox" <?php checked(esc_attr($img),'yes'); ?> value='yes'/>
    					<label for="<?php echo $this->get_field_id('img'); ?>"><?php _e('Show picture','fomanews'); ?></label>
	   				</td>
	   				<td>
	   					<label for="<?php echo $this->get_field_id('imgsize'); ?>"><?php _e('size:','fomanews'); ?></label>
    					<input id="<?php echo $this->get_field_id( 'imgsize' ); ?>" name="<?php echo $this->get_field_name( 'imgsize' ); ?>" type="number" max='150' min='10' value="<?php echo esc_attr($imgsize); ?>" /> px
    				</td>
	   			</tr> 	   					
   				<tr>
			    	<td colspan='2'>
		   				<label for="<?php echo $this->get_field_id('line'); ?>"><?php _e('Line Spacing:','fomanews'); ?></label>
	    				<input id="<?php echo $this->get_field_id( 'line' ); ?>" name="<?php echo $this->get_field_name( 'line' ); ?>" type="number" step='0.1' max='3' min='0.5' value="<?php echo esc_attr($line); ?>" />
			    	</td>
			    </tr>		
	   		</table>		
	   		<br><br><p><?php echo __('Shortcode:','fomanews')."<br><font color='green'><small>".$shortcode."</small></font>"; ?></p>
   			
    		<?php

			}
}

function fomaRfc2822ToTimestamp($date){
 $aMonth = array(
             "Jan"=>"1", "Feb"=>"2", "Mar"=>"3", "Apr"=>"4", "May"=>"5",
             "Jun"=>"6", "Jul"=>"7", "Aug"=>"8", "Sep"=>"9", "Oct"=>"10",
             "Nov"=>"11", "Dec"=>"12",
             "янв"=>"1", "фев"=>"2", "мар"=>"3", "апр"=>"4", "май"=>"5",
             "июн"=>"6", "июл"=>"7", "авг"=>"8", "сен"=>"9", "окт"=>"10",
             "ноя"=>"11", "дек"=>"12",
             );
     if (strlen($date) <= 27){$date="Fri, ".$date;}
        
    list( , $day, $month, $year, $time) = explode(" ", $date);
    
    list($hour, $min, $sec) = explode(":", $time);
    
    $month = $aMonth[$month];
    
    return $day.".".$month.".".$year;
}

/**********************************************************************
* Получение URL новости
***********************************************************************/ 
function geturlfomanews($idNews){
	global $fomaNewsFeeds;

	if(isset($fomaNewsFeeds[$idNews])){
		$newsURL = $fomaNewsFeeds[$idNews];
	}else{
		$newsURL = $fomaNewsFeeds[_FOMANEWS_DEFAULT_URL_];
	}

	return $newsURL;	
}

/**********************************************************************
* Шорткод foma-news
***********************************************************************/
function shortcodefomanews($atts){

	//получение параметров
	extract(shortcode_atts(array(
		'url'			=> _FOMANEWS_DEFAULT_URL_,
		'count'			=> _FOMANEWS_DEFAULT_COUNT_,
		'date'			=> _FOMANEWS_DEFAULT_DATE_,
		'datesize'		=> _FOMANEWS_DEFAULT_DATESIZE_,
		'title'			=> _FOMANEWS_DEFAULT_TITLE_,
		'titlesize' 	=> _FOMANEWS_DEFAULT_TITLESIZE_,
		'img'			=> _FOMANEWS_DEFAULT_IMG_,
		'content'		=> _FOMANEWS_DEFAULT_CONTENT_,
		'contentsize'	=> _FOMANEWS_DEFAULT_CONTENTSIZE_,
		'imgsize'		=> _FOMANEWS_DEFAULT_IMGSIZE_,
		'line'			=> _FOMANEWS_DEFAULT_LINE_
	), $atts));


		// получим урл по идентификатору
		$newsUrl = geturlfomanews($url);

		// прежде чем качать из интернета посмотрим в кеше

		$fileFromCache = FOMANEWS__PLUGIN_DIR."cache/".md5($newsUrl);

		if(file_exists($fileFromCache)){
			// Файл найден в кеше, проверяем возраст
			if((time()-filemtime($fileFromCache))>_FOMANEWS_CACHE_LIFETIME_ or filesize($fileFromCache)==0){
				// получим XML удаленно
				if($feed = simplexml_load_file($newsUrl,'SimpleXMLElement',LIBXML_NOERROR)){
					if(@file_put_contents($fileFromCache,"")){
						$feed->asXML($fileFromCache);
					}
				}
			}else{
				// Возьмем XML из кеша
				$feed = @simplexml_load_file($fileFromCache,'SimpleXMLElement',LIBXML_NOERROR);
			}
		}else{
			if($feed = @simplexml_load_file($newsUrl,'SimpleXMLElement',LIBXML_NOERROR)){
				file_put_contents($fileFromCache,"");
				$feed->asXML($fileFromCache);
			}
		}

		if(is_object($feed)){

				// возьмем ветку item
				$getEntries = $feed->channel->item;
				
				// случайное число для разделения стилей в разных шорткодах
				$rand = rand(10000,1000000);
				$Counter = 1;

				$output = "
					<style>
						.news_item_".$rand." {margin: 0px; display:inline-block;line-height:normal; width:100%;}
						.news_item_blank".$rand." {height:10px;}
						.img_".$rand." {float:left; margin-bottom:3px!important; margin-top:0px!important; margin-right:6px!important; width:".(($imgsize*1)>0 ? $imgsize: _FOMANEWS_DEFAULT_IMGSIZE_)."px!important;}
						.date_".$rand." {float:right!important; margin-top:2px!important; font-size: ".(($datesize*1)>0 ? $datesize: _FOMANEWS_DEFAULT_DATESIZE_)."pt;line-height:".(($line*1)>0 ? $line: _FOMANEWS_DEFAULT_LINE_)."em!important}
						.title_".$rand." {margin-bottom:4px!important; font-weight: bold;font-size: ".(($titlesize*1)>0 ? $titlesize: _FOMANEWS_DEFAULT_TITLESIZE_)."pt; line-height:".(($line*1)>0 ? $line: _FOMANEWS_DEFAULT_LINE_)."em!important}
						.content_".$rand." {font-size: ".(($contentsize*1)>0 ? $contentsize: _FOMANEWS_DEFAULT_CONTENTSIZE_)."pt; line-height:".(($line*1)>0 ? $line: _FOMANEWS_DEFAULT_LINE_)."em!important}
					</style>\n";


				foreach ($getEntries as $entries){

						$oldValueImg = $img;

						if($entries->enclosure){
							$ImageSrc = $entries->enclosure->attributes()->url;
						}else{
							$img = 'no';
						}
						
						$_img =  @fopen($ImageSrc, 'r'); 
						if (!$_img){$img='no';}else{fclose($_img);}


						$output.= "<div class='news_item_".$rand."'>
					    				<a href='".$entries->link."' target='_blank'>";
						if($img=='yes')$output.= "<img alt='".$entries->title."' src='".$ImageSrc."' class='img_".$rand."'>";
				    	if($title=='yes')$output.= "<div class='title_".$rand."'>".$entries->title."</div>";
						$output.= "</a>";
						if($title!='yes' and $content=='yes' and $img=='yes'){$output.="<a href='".$entries->link."' target='_blank'>";}
						if($content=='yes')$output.= "<div class='content_".$rand."'>".$entries->description."</div>";
						if($title!='yes' and $content=='yes' and $img=='yes'){$output.="</a>";}
						if($title!='yes' and $img!='yes' and $content=='yes'){$output.=" <a href='".$entries->link."' target='_blank'>".__('[more...]','fomanews')."</a><br>";}
						if($date=='yes')$output.= "<div class='date_".$rand."'>".fomaRfc2822ToTimestamp($entries->pubDate)."</div>";
		    			$output.= "</div>\n";
		    			$output.= "<div class='news_item_blank".$rand."'></div>";
						if($Counter>=$count) break;
						$Counter++;

						$img = $oldValueImg;
				} 
		}

		return $output;
}
// *****************************************************************************

add_shortcode('foma-news', 'shortcodefomanews');
add_action('widgets_init', create_function('','register_widget("FomaNews");'));