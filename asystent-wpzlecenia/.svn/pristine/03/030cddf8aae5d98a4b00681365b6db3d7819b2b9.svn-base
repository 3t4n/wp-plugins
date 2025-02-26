<?php
/*
Plugin Name: Asystent WPzlecenia
Author: Konrad 'Muzungu' Karpieszuk
Plugin URI: http://wpzlecenia.pl
Author URI: http://muzungu.pl
Description: Plugin doda do Twojego bloga możliwość zlecania zadań z nim związanych bezpośrednio z Twojej strony
Version: 1.0
*/

/*
Copyright (C) 2009 Konrad Karpieszuk / www.muzungu.pl / kkarpieszuk@gmail.com

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

// tworzymy widget na stronie głównej Kokpitu
add_action('wp_dashboard_setup', 'wpzleceniaDashboardWidget');

function wpzleceniaDashboardWidget() {
global $wp_meta_boxes;

wp_add_dashboard_widget('wpzleceniaDWidget', 'Asystent WPzlecenia', 'wpzleceniaDWidget');

// Get the regular dashboard widgets array 
// (which has our new widget already but at the end)

$normal_dashboard = $wp_meta_boxes['dashboard']['normal']['core'];

// Backup and delete our new dashbaord widget from the end of the array

$wpzleceniaDWidget_backup = array('wpzleceniaDWidget' => $normal_dashboard['wpzleceniaDWidget']);
unset($normal_dashboard['wpzleceniaDWidget']);

// Merge the two arrays together so our widget is at the beginning

$sorted_dashboard = array_merge($wpzleceniaDWidget_backup, $normal_dashboard);

// Save the sorted array back into the original metaboxes 

$wp_meta_boxes['dashboard']['normal']['core'] = $sorted_dashboard;

}

function wpzleceniaDWidget() {
?>
<style type="text/css">
form#asystentWPzlecenia {
font-size: 11px;
}

form#asystentWPzlecenia label {
display: block;
font-weight: bold;
}

form#asystentWPzlecenia .extendedLabel {
display: block;
}

form#asystentWPzlecenia input[type=text], form#asystentWPzlecenia textarea {
width: 100%;
}

form#asystentWPzlecenia textarea {
height: 90px;
}
</style>
<p>Masz problem ze swoim Wordpressem? Zleć jego rozwiązanie:</p>
<form action="http://wpzlecenia.pl/dodaj-zlecenie/" method="post" id="asystentWPzlecenia">
<label for="tytulOgloszenia">Tytuł zlecenia</label> 
<span class="extendedLabel">W kilku słowach opisz czego dotyczy Twoje ogłoszenie</span> 
<input type="text" name="tytulOgloszenia" value="" /> 
 
<label for="opisOgloszenia">Treść zlecenia</label> 
<span class="extendedLabel">Im więcej informacji zawrzesz w ogloszeniu, tym lepiej zostanie ono zrozumiane, dzięki czemu oszczędzisz czas na doprecyzowanie zasad współpracy i zadanie ostatecznie zostanie wykonane szybciej.</span> 
<textarea name="opisOgloszenia">
Szukam osoby, który szybko pomoże mi przy mojej stronie <?php bloginfo('name'); ?> (adres to <?php bloginfo('url') ?>).

Problem polega na:

Zadania, które musisz wykonać:

Termin realizacji zlecenia:
</textarea> 
 
<label for="budzetOgloszenia">Budżet zlecenia</label> 
<span class="extendedLabel">Im więcej jesteś w stanie zaoferować wykonawcy za jego pracę, tym lepszego i szybszego wykonania możesz się spodziewać. </span> 
<input type="radio" name="budzetOgloszenia" value="5 - 20" /> 5 - 20 PLN <br /> 
<input type="radio" name="budzetOgloszenia" value="21 - 50" /> 21 - 50 PLN <br /> 
<input type="radio" name="budzetOgloszenia" value="51 - 200" /> 51 - 200 PLN <br /> 
<input type="radio" name="budzetOgloszenia" value="ponad 200" /> ponad 200 PLN <br /> 
 
<label for="daneKontaktowe">Kontakt</label> 
<span class="extendedLabel">Jak zleceniobiorca ma się z Tobą skontaktować? Wpisz tutaj swój adres email, nr telefonu, numer GG...</span> 
<input type="text" name="daneKontaktowe" value="<?php echo get_option('admin_email'); ?>"> 
 
<input type="submit" name="dodajZlecenie" value="Dodaj zlecenie" /> 
</form>
<?php
}

//
//
//

// tworzymy boks wyswietlany na blogu dla admina

add_action('wp_footer', 'asystentBoxNaBlogu');
function asystentBoxNaBlogu () {
if (current_user_can('level_8')) {
?>
<style type="text/css">
div#asystentBoxNaBlogu {
position: fixed;
bottom: 15px;
left: 10px;
padding: 5px;
background: white;
width: 128px;
font-size: 11px;
text-align: center;
border: 1px grey solid;
-webkit-border-radius: 3px;
-moz-border-radius: 3px;
border-radius: 3px;
}

div#asystentBoxNaBlogu h2 {
font-weight: bold;
font-family: serif;
font-size: 12px;
background: none;
}

div#asystentBoxNaBlogu a {
display: inline-block;
padding: 0px 3px;
border: 1px solid grey;
background: #F4EFBA;
color: #470770;
}

div#asystentBoxNaBlogu p.explain {
display: none;
}

div#asystentBoxNaBlogu:hover p.explain {
display: inline-block;
font-size: 9px;
line-height: 9px;
text-align: justify;
}
</style>
<div id="asystentBoxNaBlogu" ondblclick="document.getElementById('asystentBoxNaBlogu').style.display='none'">
<h2>Asystent WPzlecenia.pl</h2>
<p>
Masz problem ze stroną? <a href="http://wpzlecenia.pl/dodaj-zlecenie/" title="kliknij i wypełnij formularz zlecenia">Zleć jego rozwiązanie</a>
</p>
<p class="explain">
Box ten wyświetla się tylko dla administratora strony, jeśli jest zalogowany (czyli dla Ciebie). <br />Nie obawiaj się, osoby odwiedzające twoją stronę go nie widzą.
<br />
Kliknij dwa razy by ukryć ten box
</p>
</div>
<?php
}
}
