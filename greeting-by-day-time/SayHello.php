<?php
/**
* Plugin Name: Greeting by day time
* Plugin URI: https://wordtune.me
* Description: Use your shortcode on any page ore post and greet your website visitors with the time of day in german.
* Author: WordTune
* Author URI: https://wordtune.me/
* Version:           1.0
* License:           GPL-2.0+
* License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
**/
//Say hallo in german

function hallo_de (){
$uhrzeit = date('H');
    if ($uhrzeit < 11) {
       $gruss = "Guten Morgen";
       }
elseif ($uhrzeit >= 11 && $uhrzeit < 16){
       $gruss = "Guten Tag";
       }
elseif ($uhrzeit >= 16 && $uhrzeit < 23){
       $gruss = "Guten Abend";
       }
  else {
       $gruss = "Guten Morgen";
       }
echo esc_attr( $gruss );

}

function dorud_irn (){
$saman = date('H');
    if ($saman < 11) {
       $salam = "صبح به خیر";
       }
elseif ($saman >= 11 && $saman < 16){
       $salam = "روز به خیر";
       }
elseif ($saman >= 16 && $saman < 23){
       $salam = "عصر بخیر";
       }
  else {
       $salam = "صبح به خیر";
       }
echo esc_attr( $salam );

}

add_shortcode ( 'dorud_irn', 'dorud_irn' );


function hello_en (){
$time = date('H');
    if ($time < 11) {
       $greeting = "Good morning";
       }
elseif ($time >= 11 && $time < 16){
       $greeting = "Good afternoon";
       }
elseif ($time >= 16 && $time < 23){
       $greeting = "Good evening";
       }
  else {
       $greeting = "Good morning";
       }
echo esc_attr( $greeting );

}
add_shortcode ( 'hello_en', 'hello_en' );

function heileo_ir (){
$am = date('H');
    if ($am < 11) {
       $beannu = "Maidin mhaith";
       }
elseif ($am >= 11 && $am < 16){
       $beannu = "Lá maith";
       }
elseif ($am >= 16 && $am < 23){
       $beannu = "Tráthnóna maith";
       }
  else {
       $beannu = "Maidin mhaith";
       }
echo esc_attr( $beannu );

}
add_shortcode ( 'heileo_ir', 'heileo_ir' );

function bonjour_fr (){
$temps = date('H');
    if ($temps < 11) {
       $salutation = "Bonjour";
       }
elseif ($temps >= 11 && $temps < 16){
       $salutation = "Bonne journée";
       }
elseif ($temps >= 16 && $temps < 23){
       $salutation = "Bonsoir";
       }
  else {
       $salutation = "Bonjour";
       }
echo esc_attr( $salutation );

}
add_shortcode ( 'bonjour_fr', 'bonjour_fr' );

function hola_sp (){
$hora = date('H');
    if ($hora < 11) {
       $saludo = "Buenos días";
       }
elseif ($hora >= 11 && $hora < 16){
       $saludo = "Buenos días";
       }
elseif ($hora >= 16 && $hora < 23){
       $saludo = "Buenas noches";
       }
  else {
       $saludo = "Buenos días";
       }
echo esc_attr( $saludo );

}
add_shortcode ( 'hola_sp', 'hola_sp' );


function ciao_it (){
$volta = date('H');
    if ($volta < 11) {
       $saluto = "Buongiorno";
       }
elseif ($volta >= 11 && $volta < 16){
       $saluto = "Buona giornata";
       }
elseif ($volta >= 16 && $volta < 23){
       $saluto = "Buona serata";
       }
  else {
       $saluto = "Buongiorno";
       }
echo esc_attr( $saluto );

}


add_shortcode ( 'ciao_it', 'ciao_it' );


function nihao_chn (){
$fuda = date('H');
    if ($fuda < 11) {
       $nihao = "早上好";
       }
elseif ($fuda >= 11 && $fuda < 16){
       $nihao = "再會";
       }
elseif ($fuda >= 16 && $fuda < 23){
       $nihao = "晚安";
       }
  else {
       $nihao = "早上好";
       }
echo esc_attr( $nihao );

}


add_shortcode ( 'nihao_chn', 'nihao_chn' );



function chairete_grc (){
$chronos = date('H');
    if ($chronos < 11) {
       $chairetismos = "Καλημέρα";
       }
elseif ($chronos >= 11 && $chronos < 16){
       $chairetismos = "Kαλό απόγευμα";
       }
elseif ($chronos >= 16 && $chronos < 23){
       $chairetismos = "καληνυχτα";
       }
  else {
       $chairetismos = "Καλημέρα";
       }
echo esc_attr( $chairetismos );

}
add_shortcode ( 'chairete_grc', 'chairete_grc' );





function czesc_pol (){
$czas = date('H');
    if ($czas < 11) {
       $powitanie = "Dzień dobry";
       }
elseif ($czas >= 11 && $czas < 16){
       $powitanie = "Dobry dzień";
       }
elseif ($czas >= 16 && $czas < 23){
       $powitanie = "Dobry wieczór";
       }
  else {
       $powitanie = "Dzień dobry";
       }
echo esc_attr( $powitanie );

}

add_shortcode ( 'czesc_pol', 'czesc_pol' );



function mrhban_ae (){
$zaman = date('H');
    if ($zaman < 11) {
       $tahia = "صباح الخير";
       }
elseif ($zaman >= 11 && $zaman < 16){
       $tahia = "يوم جيد";
       }
elseif ($zaman >= 16 && $zaman < 23){
       $tahia = "مساء الخير";
       }
  else {
       $tahia = "صباح الخير";
       }
echo esc_attr( $tahia );

}

add_shortcode ( 'mrhban_ae', 'mrhban_ae' );

?>
