<?php
/*
Plugin Name: amcaptcha
Plugin URI: http://ega.ru/
Description: Simple captcha for Wordpress.
Author: Alexey Kucherov
Version: 2.1
Author URI: http://ega.ru/
*/

add_action('comment_post', "comment_post");
add_action('comment_form', "amcaptcha_init");
add_action('admin_menu', 'amcaptcha_add_menu');

add_option('ac_lang', '1', '', 'yes');
add_option('ac_show_credit', '1', '', 'yes');
add_option('ac_captcha_text', '', '', 'yes');

$langs = array(
	'1'=>array(
	'title' => 'English',
	'pref_title' => 'Amcaptcha settings',
	'pref_descr' => 'Simplicity is great!',
	'pref_lang' => 'Select language:',
	'pref_captcha_text' => 'Captcha\'s text',
	'pref_show_credit' => 'Display credits:',
	'pref_show_credit_link' => 'as link',
	'pref_show_credit_text' => 'as plain text',
	'pref_show_credit_none' => 'off',
	'pref_apply' => 'Apply',
	'pref_update_message' => 'Settings was successfully updated!',
	'error' => 'You forget to check &laquo;I\'m not a spam bot&raquo; field to pass amcaptcha\'s filter. Here is your comment (copy it to clipboard, just in case):',
	'link_url' => 'http://ega.ru/',
	'link_text' => '&copy; webinar',
	'subtext' => 'powered by <strong>amcaptcha</strong>',
	'text' => 'I am not a spam bot!',
	'js_disabled' => 'Please, enable JavaScript in your browser to comment!',
	'translator' => 'Alexey Moskovsky',
	'translator_url' => 'http://multitoolbox.com/'
	),
	
	'2'=>array(
	'title' => 'Русский',
	'pref_title' => 'Настройки amcaptcha',
	'pref_descr' => 'Если вам понравился плагин amcaptcha, то, пожалуйста, оставьте включенной опцию отображения ссылки на его домашнюю страницу. Чем больше пользователей Wordpress узнают о нем, тем сложнее будет жизнь для спамеров.',
	'pref_lang' => 'Выберите язык:',
	'pref_captcha_text' => 'Текст капчи',
	'pref_show_credit' => 'Вывод информации о плагине:',
	'pref_show_credit_link' => 'Ссылка',
	'pref_show_credit_text' => 'Текст',
	'pref_show_credit_none' => 'Не показывать',
	'pref_apply' => 'Применить',
	'pref_update_message' => 'Настройки обновлены.',
	'error' => 'Вы забыли отметить галочкой поле &laquo;Подтверждаю, что я не спам-бот&raquo;. Текст Вашего комментария:',
	'link_url' => 'http://ega.ru/',
	'link_text' => '&copy; webinar',
	'subtext' => 'amcaptcha &mdash защита от спама в Wordpress',
	'text' => 'Подтверждаю, что я не спам-бот',
	'js_disabled' => 'Для того, чтобы иметь возможность комментировать, включите JavaScript в Вашем браузере.',
	'translator' => 'Alexey Moskovsky',
	'translator_url' => 'http://multitoolbox.com/'
	),

	'3'=>array(
	'title' => 'Український',
	'pref_title' => 'Налаштування amcaptcha',
	'pref_descr' => 'Якщо вам сподобався плагін amcaptcha, будь ласка, залиште ввімкнену опцію відображення посилання на його домашню сторінку. Чим більше користувачів Wordpress дізнаються про нього, тим складніше буде життя для спамерів.',
	'pref_lang' => 'Виберіть мову:',
	'pref_captcha_text' => 'Текст капчі',
	'pref_show_credit' => 'Інформація о amcaptcha',
	'pref_show_credit_link' => 'Посилання',
	'pref_show_credit_text' => 'Текст',
	'pref_show_credit_none' => 'Не відображати',
	'pref_apply' => 'Застосувати',
	'pref_update_message' => 'Налаштунки оновлені.',
	'error' => 'Ви забули відзначити галочкою поле &laquo;Підтверджую, що я не спам-бот&raquo;. Текст Вашого коментаря:',
	'link_url' => 'http://ega.ru/',
	'link_text' => '&copy; webinar',
	'subtext' => 'amcaptcha - захист від спаму у Wordpress',
	'text' => 'Підтверджую, що я не спам-бот',
	'js_disabled' => 'Для того, щоб мати можливість коментувати, увімкніть JavaScript у Вашому браузері.',
	'translator' => 'Sweat Tony',
	'translator_url' => 'http://sweatego.ru/'
	),

	'4'=>array(
	'title' => 'Italiano',
	'pref_title' => 'Impostazioni amcaptcha',
	'pref_descr' => 'Se gli è piaciuto l\'amcaptcha plugin,si pregano gli utenti di lasciare accesa l\'opzione di visualizzare un link sulla vostra hompage. Gli utenti che vogliono sapere più difficile sara la vita per gli spammer.',
	'pref_lang' => 'Lingue:',
	'pref_captcha_text' => 'Testo captcha',
	'pref_show_credit' => 'Output le informazioni relative al plugin:',
	'pref_show_credit_link' => 'Collegamento',
	'pref_show_credit_text' => 'Testo',
	'pref_show_credit_none' => 'Non far vedere',
	'pref_apply' => 'Applicare',
	'pref_update_message' => 'Impostazioni aggiornate.',
	'error' => 'Ha dimenticato casella di controllo &laquo;Сonfermo che io non sono uno spam-bot&raquo;. Il testo del tuo commento:',
	'link_url' => 'http://ega.ru/',
	'link_text' => '&copy; webinar',
	'subtext' => 'amcaptcha è la pro spam in Wordpress',
	'text' => 'Confermo che io non sono uno spam-bot',
	'js_disabled' => 'Alla fine di essere in grado di commento, si prega di abilitare JavaScript nel tuo browser',
	'translator' => 'Sweat Tony',
	'translator_url' => 'http://sweatego.ru/'
	),
	
	'5'=>array(
	'title' => 'Français',
	'pref_title' => 'R&eacute;glages Amcaptcha',
	'pref_descr' => 'Une grande simplicit&eacute; !',
	'pref_lang' => 'S&eacute;lectionnez la langue:',
	'pref_captcha_text' => 'Texte Captcha',
	'pref_show_credit' => 'Afficher le nom de l\'auteur:',
	'pref_show_credit_link' => 'sous forme de lien',
	'pref_show_credit_text' => 'sous forme de texte',
	'pref_show_credit_none' => 'Ne pas afficher',
	'pref_apply' => 'Valider',
	'pref_update_message' => 'Les r&eacute;glages ont &eacute;t&eacute; mis &agrave; jour!',
	'error' => 'Vous avez oubli&eacute; de cocher la case &laquo;je ne suis pas un robot&raquo; afin que votre commentaire ne soit pas consid&eacute;r&eacute; comme spam. Voici ci-dessous votre commentaire (veuillez svp le copier dans votre presse-papier avant de revenir en arri&egrave;re, ceci afin de vous &eacute;viter de le retaper). :',
	'link_url' => 'http://ega.ru/',
	'link_text' => '&copy; webinar',
	'subtext' => 'propos&eacute; par <strong>amcaptcha</strong>',
	'text' => 'Je ne suis pas un robot !',
	'js_disabled' => 'Veuillez svp activer JavaScript dans votre navigateur Web pour laisser un commentaire !',
	'translator' => 'Laurent',
	'translator_url' => 'http://www.android-software.fr/'
	),
	
	'6'=>array(
	'title' => 'Čeština',
	'pref_title' => 'Nastavení amcaptcha',
	'pref_descr' => 'Jestli se Vám plugin amcaptcha libí, ponechte možnost zobrazení odkazu na domácí stránku amcaptcha  zapnutou. Čím více uživatelů Wordpressu se o tomto pluginu dozví, tím menší šanci spammeři budou mít.',
	'pref_lang' => 'Vyberte jazyk:',
	'pref_captcha_text' => 'Opiště kód z obrázku',
	'pref_show_credit' => 'Popis pluginu:',
	'pref_show_credit_link' => 'Odkaz',
	'pref_show_credit_text' => 'Text',
	'pref_show_credit_none' => 'Nezobrazovat',
	'pref_apply' => 'Použít',
	'pref_update_message' => 'Nastavení obnoveno.',
	'error' => 'Zapomněli jste zaškrtnout "Potvrzuji, že nejsem robot". Váš komentář:',
	'link_url' => 'http://ega.ru/',
	'link_text' => '&copy; webinar',
	'subtext' => 'Amcaptcha - ochrana před spamem ve Wordpressu',
	'text' => 'Potvrzuji, že nejsem robot.',
	'js_disabled' => 'Abyste mohli vkládat komentáře, zapněte si JavaScript ve svém prohlížeči.',
	'translator' => 'Zeleny Rajce',
	'translator_url' => 'http://spa-ostrov.ru/'
	),
	
	'7'=>array(
	'title' => 'Беларуская',
	'pref_title' => 'Налады amcaptcha',
	'pref_descr' => 'Калі вам спадабалася ўбудова amcaptcha, то, калі ласка, пакіньце ўключанай опцыю адлюстравання спасылкі на яго хатнюю старонку. Чым больш карыстачоў Wordpress пазнаюць пра яго, тым складаней будзе жыццё для спамераў.',
	'pref_lang' => 'Абярыце мову:',
	'pref_captcha_text' => 'Тэкст капчы',
	'pref_show_credit' => 'Выснова інфармацыі пра ўбудову:',
	'pref_show_credit_link' => 'Спасылка',
	'pref_show_credit_text' => 'Тэкст',
	'pref_show_credit_none' => 'Не паказваць',
	'pref_apply' => 'Ужыць',
	'pref_update_message' => 'Налады абноўлены.',
	'error' => 'Вы забыліся адзначыць галачкай поле &laquo;Пацвярджаю, што я не спам-бот&raquo;. Тэкст Вашага каментара:',
	'link_url' => 'http://ega.ru/',
	'link_text' => '&copy; webinar',
	'subtext' => 'amcaptcha &mdash абарона ад спаму ў Wordpress',
	'text' => 'Пацвярджаю, што я не спам-бот',
	'js_disabled' => 'Для таго, каб мець магчымасць каментаваць, уключыце JavaScript у Вашым браўзары.',
	'translator' => 'Marcis G.',
	'translator_url' => 'http://pc.de/'
	)
);

function checkaddslashes($str){
    $str2 = str_replace("\'", "*****", $str);
    if(strpos($str2,"'")!== false)
        return str_replace('*****', "\'", addslashes($str2));
    else
        return $str;
}

function amcaptcha_options_page() {
	global $langs;
	$texts = $langs[get_option('ac_lang')];
	
	if($_POST['Submit']) {
		if (get_option('ac_lang')!=$_POST['ac_lang'])
			$_POST['ac_captcha_text'] = ''; // reset captcha text to default for selected language
		
		update_option('ac_lang', $_POST['ac_lang']);
		update_option('ac_show_credit', $_POST['ac_show_credit']);
		update_option('ac_captcha_text', checkaddslashes($_POST['ac_captcha_text']));
		$texts = $langs[get_option('ac_lang')];
		echo '<div class="updated"><p>'.$texts['pref_update_message'].'</p></div>';
	}
?>
<div class="wrap">
	<h2><?=$texts['pref_title']?></h2>
	<p><?=$texts['pref_descr']?></p>

	<form method="post">
	<fieldset class="options">
		<?php
		$ac_show_credit = get_option('ac_show_credit');
		$ac_lang = get_option('ac_lang');
		$ac_captcha_text = htmlspecialchars(stripslashes(get_option('ac_captcha_text')), ENT_QUOTES);
		?>
			<p><?=$texts['pref_lang']?> 
			<select name='ac_lang' />
			<?foreach ($langs as $lang_id=>$value):?>
			<option value='<?=$lang_id?>' <?=$lang_id==$ac_lang?'selected':''?>><?=$value['title']?></option>
			<?endforeach;?>
			</select>			
			</p>
		
			<p><?=$texts['pref_show_credit']?> 
			<select name='ac_show_credit' />
			<option value='1' <?=$ac_show_credit==1?'selected':''?>><?=$texts['pref_show_credit_link']?></option>
			<option value='2' <?=$ac_show_credit==2?'selected':''?>><?=$texts['pref_show_credit_text']?></option>
			<option value='3' <?=$ac_show_credit==3?'selected':''?>><?=$texts['pref_show_credit_none']?></option>
			</select>
			</p>
			
			<p><?=$texts['pref_captcha_text']?> 
			<input type='text' name='ac_captcha_text' style='width: 300px;' value="<?=empty($ac_captcha_text)?$texts['text']:$ac_captcha_text?>" />
			</p>
			
			<p><input type="submit" name='Submit' value="<?=$texts['pref_apply']?> " /></p>
	</fieldset>
	</form>
	
	<p>Translated by <a href='<?=$texts['translator_url']?>'><?=$texts['translator']?></a></p>
</div>
<?php
}

function amcaptcha_add_menu() {
		add_options_page('amcaptcha', 'amcaptcha', 8, __FILE__, 'amcaptcha_options_page');
}

function str_rand()
{
    $seeds = 'abcdefghijklmnopqrstuvwqyz';
	$length = 8;    
    // Seed generator
    list($usec, $sec) = explode(' ', microtime());
    $seed = (float) $sec + ((float) $usec * 100000);
    mt_srand($seed);
    
    // Generate
    $str = '';
    $seeds_count = strlen($seeds);
    
    for ($i = 0; $length > $i; $i++)
        $str .= $seeds{mt_rand(0, $seeds_count - 1)};
    
    return $str;
}

session_start();

if (!isset($_SESSION['amcaptcha_id']) or !isset($_SESSION['label_id']) or !isset($_SESSION['amcaptcha_session']) or !isset($_SESSION['func_name']) or !isset($_SESSION['cb_id']))
{
	$_SESSION['amcaptcha_id'] = str_rand();
	$_SESSION['label_id'] = str_rand();
	$_SESSION['amcaptcha_session'] = str_rand();
	$_SESSION['func_name'] = str_rand();
	$_SESSION['cb_id'] = str_rand();
}

function comment_post ($id){
	global $user_ID;
	global $langs;
	
	$texts = $langs[get_option('ac_lang')];
	
	if ($user_ID)
		return $id;

	if ($_POST[$_SESSION['amcaptcha_session']] != '1'){
		wp_delete_comment($id);
		echo "<strong>".$texts['error']."</strong><br/><br/>".$_POST['comment'];
		exit;
	}
}

function amcaptcha_init ($id)
{
	global $user_ID;
	global $langs;
	if ($user_ID)
		return $id;
		
	$texts = $langs[get_option('ac_lang')];
	$show_credit = get_option('ac_show_credit');
	$ac_captcha_text = get_option('ac_captcha_text');
	?>

	<div id="<?=$_SESSION['amcaptcha_id']?>" style='text-align: left'></div>
	<noscript><p style='color: #c00; margin-top: 3px;'><?=$texts['js_disabled']?></p></noscript>


	<script>
	function <?=$_SESSION['func_name']?>(){
		document.getElementById('<?=$_SESSION['amcaptcha_session']?>').value = document.getElementById('<?=$_SESSION['amcaptcha_session']?>').value==1?0:1;
	}
	var commentField = document.getElementById("url");
	if(commentField==null)
		commentField = document.getElementsByName("url");
	
    var submitp = commentField.parentNode;
    var answerDiv = document.getElementById("<?=$_SESSION['amcaptcha_id']?>");
    answerDiv.innerHTML = '<label id="<?=$_SESSION['label_id']?>"><input type="checkbox" id="<?=$_SESSION['cb_id']?>" onclick="<?=$_SESSION['func_name']?>();" style="width: 15px"> <strong><?=empty($ac_captcha_text)?$texts['text']:$ac_captcha_text?></strong></label><?if($show_credit==1):?><br/><a style="font-size: 10px; color: #777; text-decoration: none;" href="<?=$texts['link_url']?>"><?=$texts['link_text']?></a><?elseif ($show_credit==2):?><br/><span style="font-size: 10px; color: #777; text-decoration: none;" ><?=$texts['subtext']?></span><?endif;?></div><input type="hidden" name="<?=$_SESSION['amcaptcha_session']?>" id="<?=$_SESSION['amcaptcha_session']?>" value="0">';
    submitp.appendChild(answerDiv, commentField);
	</script>
	<?php
}
?>