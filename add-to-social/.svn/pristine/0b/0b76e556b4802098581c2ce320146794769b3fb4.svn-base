<div class="wrap">
	<?php    echo "<h2>" . __( 'Add To Social', 'oscimp_trdom' ) . "</h2>"; ?><br />
	<?php 
	if($_POST['ats_hidden'] == 'Y') {  
		$dbpwd = $_POST['ats_shorturl'];  
		update_option('ats-shorturl', $dbpwd); 
		
		$dbpwd = $_POST['ats_rejim'];  
		update_option('ats-rejim', $dbpwd);
		
		$dbpwd = $_POST['ats_size'];  
		update_option('ats-size', $dbpwd);
		
		$dbpwd = $_POST['ats_align'];  
		update_option('ats-align', $dbpwd);
				
		print "<div class=\"updated\"><p><strong>Промените бяха запазени</strong></p></div>";
	}

	if($_POST['ats_restore'] == 'Y') {  
		update_option('ats-shorturl', '0'); 
		update_option('ats-rejim', 'automatic');
		update_option('ats-size', 'small');
		update_option('ats-align', 'justify');
				
		print "<div class=\"updated\"><p><strong>Промените бяха запазени</strong></p></div>";
	}
	?>
	<form name="ats_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
		<input type="hidden" name="ats_hidden" value="Y">
		<p>
			<b><a href="#rejim">Начин на показване</a></b><br />
			<input type="radio" name="ats_rejim" value="automatic" <? if (get_option('ats-rejim') == "automatic") { echo 'checked="yes"'; } ?> /> Автоматичен<br />
			<input type="radio" name="ats_rejim" value="manual" <? if (get_option('ats-rejim') == "manual") { echo 'checked="yes"'; } ?> /> Ръчен<br />
			<input type="radio" name="ats_rejim" value="shortcode" <? if (get_option('ats-rejim') == "shortcode") { echo 'checked="yes"'; } ?> /> Къс код<br /><br />
			<em>Дали да се добавят автоматично бутоните или не.</em>
		</p>
		<hr />
		<p>
			<b><a href="#shorturl">Смаляване на URL адресите ?</a></b><br />
			<input type="radio" name="ats_shorturl" value="0" <? if (get_option('ats-shorturl') == 0) { echo 'checked="yes"'; } ?> /> Не<br />
			<input type="radio" name="ats_shorturl" value="1" <? if (get_option('ats-shorturl') == 1) { echo 'checked="yes"'; } ?> /> Да<br /><br />
			<em>Удобно при споделяне в социални мрежи с ограничен брой символи. Пример Twitter - 140 символа.</em>
		</p>	
		<p>
			<b>Големина на иконките</b><br />
			<input type="radio" name="ats_size" value="small" <? if (get_option('ats-size') == "small") { echo 'checked="yes"'; } ?> /> Малки <i>(16x16)</i><br /><br />
			<img src="http://img697.imageshack.us/img697/3186/buttonssmall.png" alt="small" title="Преглед на малките бутони" /><br /><br />
			<input type="radio" name="ats_size" value="large" <? if (get_option('ats-size') == "large") { echo 'checked="yes"'; } ?> /> Големи <i>(32x32)</i><br /><br />
			<img src="http://img9.imageshack.us/img9/3986/buttonslarge.png" alt="large" title="Преглед на големите бутони" /><br /><br />
		</p>
		<p>
			<b>Подравняване на иконките</b><br />
			<input type="radio" name="ats_align" value="justify" <? if (get_option('ats-align') == "justify") { echo 'checked="yes"'; } ?> /> Двустранно подравнени <i>(justify)</i><br />
			<input type="radio" name="ats_align" value="left" <? if (get_option('ats-align') == "left") { echo 'checked="yes"'; } ?> /> Ляво<br />
			<input type="radio" name="ats_align" value="center" <? if (get_option('ats-align') == "center") { echo 'checked="yes"'; } ?> /> Центрирани<br />
			<input type="radio" name="ats_align" value="right" <? if (get_option('ats-align') == "right") { echo 'checked="yes"'; } ?> /> Дясно<br />
		</p>
		<hr />		
		<p class="submit">
			<input type="submit" name="Submit" value="<?php _e('Запазване', 'oscimp_trdom' ) ?>" />
		</p>
	</form>
	<h2>Информация</h2><br />
	<div id="rejim">
	<b>Начин на показване:</b><br /><br />

	- При <u>автоматичния режим</u>, бутоните се добавят автоматично към всики материали от блога ви. Забележете, че те се добавят чак при отпечатването, и по никакъв начин не променят съдържанието на материалите, запаметено в базата данни.<br /><br />
	- При <u>ръчен режим</u> можете да поставите бутоните, където си пожелаете в темплейта, чрез поставянето на кодът "<b>&lt;?php echo ats_buttons(); ?&gt;</b>"<br /><br />
	<em>Пример за използване на shortcode</em>
	<blockquote>
		<pre style="background:#BFDFFF; padding: 1em; ">	
&lt;div class=&quot;entry&quot;&gt;
	&lt;?php the_content(''); ?&gt;
	&lt;?php the_tags( '&lt;p&gt;Tags: ', ', ', '&lt;/p&gt;'); ?&gt;
	&lt;p class="postmetadata"&gt;

		<b>&lt;?php echo ats_buttons(); ?&gt;</b>
		
	&lt;/p&gt;
&lt;/div&gt;
</pre>
	</blockquote><br />
	
	- При <u>къс код</u> <em>(shortcode)</em>, Вие сами контролирате на кои страници да се показват бутоните, като поставите следният код "<b>[add-to-social]</b>"<br /><br />
	<em>Пример за използване на shortcode</em>
	<blockquote>
	<pre style="background:#BFDFFF; padding: 1em; ">
Здравейте,
Това е моята първа публикация и в нея ще Ви разкажа...

<b>[add-to-social]</b>
		
... Очаквайте в следващите дни... 
</pre>
	</blockquote>
	</div>
	<div id="shorturl">
	<b>Смаляване на URL адреса</b><br /><br />
	Чрез тази опция можете да смалите дългите URL адресите. За целта се използва API-то на <a href="http://bit.ly/" target="_blank">bit.ly</a>. Тази опция е полезна при споделяне на дадена публикация в Twitter, където има ограничение от 140 символа.<br /><br />
	<em>Пример за смаляване на URL</em>
	<blockquote>
		<pre style="background:#BFDFFF; padding: 1em; ">
http://svil4ok.info/google-buzz-disable-notifications/
</pre>
	</blockquote>
		<blockquote>
		<pre style="background:#BFDFFF; padding: 1em; ">
http://bit.ly/aGKxiN
</pre>
	</blockquote>
	</div>
	<h2>Възстановяване на настройки</h2><br />
	Ако натиснете бутона "Възстановяване", всички настройки ще бъдат по подразбиране, а вашите промени ще бъдат премахнати.<br />
	<form name="ats_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
		<input type="hidden" name="ats_restore" value="Y">
		<p class="submit">
			<input class="button-primary" type="submit" value="Възстановяване" />
		</p>
	</form>
	<h2>Copyright</h2><br />
	<ul>
		<li><b>Автор:</b> <a href="http://svil4ok.info/" target="_blank">Свилен Попов</a></li>
		<li><b>Адрес на плъгина:</b> <a href="http://dev.svil4ok.info/wordpress/add-to-social/" target="_blank">http://dev.svil4ok.info/wordpress/add-to-social/</a></li>
		<li><b>Версия:</b> 0.4.1</li>
		<li><b><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=svil4ok%40networx-bg%2ecom&item_name=Add+To+Social&item_number=Support+Open+Source&no_shipping=0&no_note=1&tax=0&currency_code=USD&lc=US&bn=PP+DonationsBF&charset=UTF%2d8">Donate to this plugin</a></b></li>
	</ul>
</div>
	