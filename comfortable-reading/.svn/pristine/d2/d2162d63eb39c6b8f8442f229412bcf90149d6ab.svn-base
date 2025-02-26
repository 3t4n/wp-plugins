<?php
/**
* Plugin Name: Comfortable Reading
* Plugin URI: http://wp-lessons.com/comfortable-reading
* Description: Демо версия плагина для слабовидящих.
* Version: 1.6.6
* Author: Flaeron
* Author URI: http://wp-lessons.com/
*/

/*  Copyright 2015 Flaeron  (email : d.flaeron@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
add_action('admin_menu', 'cr_plugin_setup_menu');

function cr_plugin_setup_menu(){
        add_menu_page( 'Демо версия плагина для слабовидящих', 'Версия для слабовидящих', 'manage_options', 'cr-info', 'cr_content_init', plugin_dir_url( __FILE__ ) . 'img/cr-admin-icon.png');
}

add_action('admin_head', 'cr_custom_admin_styles');

function cr_custom_admin_styles() {
  echo '<style>
	.cr-description {
		margin-top: 30px;
	}
	.cr-ul-style {
		list-style-type: square;
		margin-left: 40px;
	}
	.cr-ul-style span{
		text-decoration:underline;
	}
  </style>';
}
		
function cr_content_init(){
        echo "<h1>Comfortable Reading</h1>";
		
		echo "<h2>Демо версия плагина для слабовидящих</h2>";
		
		echo "<p>О плагине:</p>";
		
		echo "<h3>Данная (бесплатная) версия плагина не соответствует требованиям ГОСТа!!!</h3>";
		echo '<p><b>Обратите внимание, что данная бесплатная версия плагина не подходит для сайтов, требующих полного соответствия ГОСТ, так как не умеет отключать изображения, закрашивать все фоновые изображения и изменять межстрочный/межбуквенный интервал.</p>
		<p>С этой задачей справляется <a href="http://wp-lessons.com/comfortable-reading-premium" target="_blank">премиум версиия плагина</a>, в которой эта возможность предусмотрена.</p></b>';
		
		echo '<p>Требования записаны в <a href="http://wp-lessons.com/wp-content/uploads/2015/10/528722007gostnovyiydlyaslabovidyashaix.pdf" target="_blank">ГОСТ Р 52872-2012 "Интернет-ресурсы. Требования доступности для инвалидов по зрению</a>.</p>
			<p>Основные положения ГОСТ:</p>
			<ul class="cr-ul-style">
			<li>Возможность изменить размер шрифта.</li>
			<li><span><b>Возможность преобразовать все иллюстрации в черно белый вариант, либо отключить иллюстрации</b></span> (отлключение изображений доступно <b>ТОЛЬКО</b> в <span><a href="http://wp-lessons.com/comfortable-reading-premium" target="_blank">премиум версии</a></span> плагина).</li>
			<li>Возможность смены фона страницы.</li>
			</ul>';
		echo "<div class='cr-description'>";
		
		echo '<h3>Чем еще <a href="http://wp-lessons.com/comfortable-reading-premium" target="_blank">премиум версия</a> плагина отличается от бесплатной?</h3>
		<ul class="cr-ul-style">
			<li>Добавлена <strong>новая функция:</strong> <strong>"Отключение и включение изображений"</strong> (<span>по требованиям ГОСТа</span>).</li>
			<li>Добавлена <strong>возможность добавлять кнопку в меню</strong>!</li>
			<li>Исправлен баг, при котором <strong>графические элементы фона не закрашивались</strong>!</li>
			<li>Добавлено <strong>две новых цветовых схемы</strong>: <strong>"Коричневым по бежевому"</strong> и <strong>"Зеленым по темно-коричневому"</strong>.</li>
			<li>Исправлен баг, при котором сайдбар (боковая панель) на котором находился виджет плагина <strong>"ломался"</strong>.</li>
			<li>Исправлен баг, при котором оставалось <strong>пустое место в сайдбаре</strong> при активированном плагине.</li>
			<li>Панель управления версией для слабовидящих теперь идет <strong>поверх админ панели</strong> администратора.</li>
			<li><strong>Решена проблема</strong> необходимости два раза нажимать кнопку "Обычная версия" для отключения версии для слабовидящих.</li>
			<li>Исправлены <strong>конфликты с некоторыми плагинами</strong>.</li>
			<li>Исправлены различные баги, конфликты скриптов и мелкие недоработки.</li>
		</ul>';
		
		echo '<h3>Сколько стоит премиум версия плагина (соответствующая требованиям ГОСТа) и как ее приобрести?</h3>
		<p>Цена премиум версии плагина - <b>700 руб.</b></p>
		<p>Напишите мне на почтовый ящик <b>d.flaeron@gmail.com</b> или <a href="http://vk.com/flaeron" target="_blank">Вконтакте</a>, и я отвечу на все Ваши вопросы касательно приобретения премиум версии плагина.</p>
		<p>Также я помогу установить премиум плагин на "проблемные" или кастомные темы сайтов.</p>
		<p>По поводу установки версии сайта для слабовидящих на другие CMS (Joomla, DLE и т.п.) пишите мне на почту <b>d.flaeron@gmail.com</b></p>';
		
		echo "<h3>Демонстрация работы премиум версии плагина:</h3>";
		echo '<iframe width="800" height="450" src="https://www.youtube.com/embed/MMkxOZko6p8" frameborder="0" allowfullscreen></iframe>';
		echo "</div>";
}

add_action('wp_enqueue_scripts', 'add_cr_custom_styles');

function add_cr_custom_styles() {
	wp_enqueue_style ('css-style', plugins_url('css/custom.css', __FILE__));
}

add_action('wp_enqueue_scripts','add_cr_script');

function add_cr_script(){
	wp_register_script('add_cr_script',plugin_dir_url( __FILE__ ).'js/jquery.comfortable.reading.js', array('jquery'),'1.1', true);
	wp_enqueue_script('add_cr_script');
}

add_action('wp_enqueue_scripts','cr_cookie');

function cr_cookie(){
	wp_register_script('cr_cookie',plugin_dir_url( __FILE__ ).'js/jquery.cookie.js', array('jquery'),'1.1', true);
	wp_enqueue_script('cr_cookie');
}

add_shortcode( 'cr', 'caption_shortcode' );

function caption_shortcode( $atts, $content = null ) {
   return '<a href="#" id="cr_version_link">' . $content . '</a>';
}

class wp_cr_plugin extends WP_Widget {

    function wp_cr_plugin() {
	    parent::__construct( false, $name = __( 'Comfortable Reading', 'comfortable-reading' ) );
    }

	function form($instance) {

	if( $instance) {
		 $text = esc_attr($instance['text']);
	} else {
		 $text = '';
	}
	?>

	<p>
	<label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Текст кнопки:', 'comfortable-reading'); ?></label>
	<input class="wide" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" type="text" value="<?php echo $text; ?>" />
	</p>

	<?php
	}

	function update($new_instance, $old_instance) {
		  $instance = $old_instance;
		  $instance['text'] = strip_tags($new_instance['text']);
		 return $instance;
	}
	
	function widget($args, $instance) {
	   extract( $args );
	   $text = $instance['text'];
	   echo $before_widget;
	   echo '<div id="cr_widget">';

	   if( $text ) {
		  echo '<a href="#" id="cr_version_link">'.$text.'</a>';
	   };
	   echo '</div>';
	   echo $after_widget;
	}
}

add_action('widgets_init', create_function('', 'return register_widget("wp_cr_plugin");'));