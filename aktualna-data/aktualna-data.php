<?php
/**
 * Plugin Name:     AKTUALNA DATA
 * Plugin URI:      https://bezpiecznyvpn.pl/
 * Description:     Plugin wyświetla aktualną datę, aktualny rok i aktualny dzień za pomocą shortoode'ów.
 * Author:          interere
 * Author URI:      https://profiles.wordpress.org/interere/
 * Text Domain:     Aktualna data
 * Version:         0.1.0
 */

function wyswietl_rok() {
    return date('Y');
}
add_shortcode('aktualny_rok', 'wyswietl_rok');

function wyswietl_miesiac() {
    return date('F');
}
add_shortcode('aktualny_miesiac', 'wyswietl_miesiac');

function wyswietl_dzien() {
    return date('d-m-Y');
}
add_shortcode('aktualny_dzien', 'wyswietl_dzien');
?>

