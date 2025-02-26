<?php
/*
Plugin Name: A Te
Plugin URI: http://gidibao.net/index.php/2008/04/14/a-te-plugin-per-wordpress/
Description: Questo non &eacute; solamente un plugin, &eacute; una soave poesia scritta per tutti gli innamorati da Lorenzo Cherubini (aka <a href="http://www.soleluna.com/">Jovanotti</a>): A Te. Potrai leggere gli estratti del testo di <cite>A Te</cite> in alto a destra della tua pagina admin.
Author: Gianni Diurno
Version: 1.0
Author URI: http://gidibao.net/
*/

// A seguire il testo di A Te
$thesong = "A te che sei l&prime;unica al mondo
L&prime;unica ragione per arrivare fino in fondo
Ad ogni mio respiro
Quando ti guardo
Dopo un giorno pieno di parole
Senza che tu mi dica niente
Tutto si fa chiaro
A te che mi hai trovato
All&prime;angolo coi pugni chiusi
Con le mie spalle contro il muro
Pronto a difendermi
Con gli occhi bassi
Stavo in fila
Con i disillusi
Tu mi hai raccolto come un gatto
E mi hai portato con te
A te io canto una canzone
Perch&eacute; non ho altro
Niente di meglio da offrirti
Di tutto quello che ho
Prendi il mio tempo
E la magia
Che con un solo salto
Ci fa volare dentro all&prime;aria
Come bollicine
A te che sei
Semplicemente sei
Sostanza dei giorni miei
A te che sei il mio grande amore
Ed il mio amore grande
A te che hai preso la mia vita
E ne hai fatto molto di pi&uacute;
A te che hai dato senso al tempo
Senza misurarlo
A te che sei il mio amore grande
Ed il mio grande amore
A te che io
Ti ho visto piangere nella mia mano
Fragile che potevo ucciderti
Stringendoti un po&prime;
E poi ti ho visto
Con la forza di un aeroplano
Prendere in mano la tua vita
E trascinarla in salvo
A te che mi hai insegnato i sogni
E l&prime;arte dell&prime;avventura
A te che credi nel coraggio
E anche nella paura
A te che sei la miglior cosa
Che mi sia successa
A te che cambi tutti i giorni
E resti sempre la stessa
A te che sei
Semplicemente sei
Sostanza dei giorni miei
Sostanza dei sogni miei
A te che sei
Essenzialmente sei
Sostanza dei sogni miei
Sostanza dei giorni miei
A te che non ti piaci mai
E sei una meraviglia
Le forze della natura si concentrano in te
Che sei una roccia sei una pianta sei un uragano
Sei l&prime;orizzonte che mi accoglie quando mi allontano
A te che sei l&prime;unica amica
Che io posso avere
L&prime;unico amore che vorrei
Se io non ti avessi con me
a te che hai reso la mia vita bella da morire, che riesci a render la fatica un immenso piacere
a te che sei il mio grande amore ed il mio amore grande,
a te che hai preso la mia vita e ne hai fatto molto di pi&uacute;
a te che hai dato senso al tempo senza misurarlo,
a te che sei il mio amore grande ed il mio grande amore
a te che sei, semplicemente sei, sostanza dei giorni miei, sostanza dei sogni miei
e a te che sei, semplicemente sei, compagna dei giorni miei, sostanza dei sogni";

// Here we split it into lines
$thesong = explode("\n", $thesong);
// And then randomly choose a line
$chosen = wptexturize( $thesong[ mt_rand(0, count($thesong) - 1) ] );

// This just echoes the chosen line, we'll position it later
function a_te() {
	global $chosen;
	echo "<p id='cherubini'>$chosen</p>";
}

// Now we set that function up to execute when the admin_footer action is called
add_action('admin_footer', 'a_te');

// We need some CSS to position the paragraph
function cherubini_css() {
	echo "
	<style type='text/css'>
	#cherubini {
		position: absolute;
		top: 2.3em;
		margin: 0;
		padding: 0;
		right: 10px;
		font-size: 16px;
		color: #d54e21;
	}
	</style>
	";
}

add_action('admin_head', 'cherubini_css');

?>