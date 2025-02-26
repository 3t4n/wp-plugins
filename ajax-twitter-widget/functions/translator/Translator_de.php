<?php

require_once 'Translator.php';

class Translator_de extends Translator {

    public function __construct() {
        parent::__construct(array(
            "year" => array("", "vor einem Jahr", "vor zwei Jahren", "vor langer Zeit"),
            "month" => array("", "vor einem Monat", "vor zwei Monaten", "vor drei Monaten", "vor ier Monaten", "vor fünf Monaten", "vor sechs Monaten", "vor sieben Monaten", "vor acht Monaten", "vor neun Monaten", "vor zehn Monaten", "vor elf Monaten"),
            "day" => array("", "one Day vor", "vor zwei Tagen", "vor drei Tagen", "vor vier Tagen", "vor fünf Tagen", "vor sechs Tagen", "vor einer Woche", "vor acht Tagen", "neun Tage vor", "vor zehn Tagen", "elf Tage vor", "zwölf Tage vor", "dreizehn Stunden", "vor zwei Wochen", "15 Tage vor", "16 Tage vor", "17 Tage vor", "18 Tage vor", "19 Tage vor", "20 Tage vor", "vor 3 Wochen", "22 Tage vor", "23 Tage vor", "vor 24 Tagen", "vor 25 Tagen", "vor 26 Tageen", "vor 27 Tagen", "vier Wochen", "vor 29 Tage", "vor 30 Tage", "vor 31 Tage"),
            "hour" => array("", "vor einer Stunde", "zwei Stunden vor", "drei Tage", "vor 4 Stunden", "vor fünf Stunden", "sechs Stunden vor", "sieben Tage ago", "vor acht Stunden", "vor 9 Stunden", "vor 10 Stunden", "vor elf Stunden", "vor 12 Stunden", "vor 13 Studen", "vor 14 Studen", "vor 15 Studen", "vor 16 Studen", "vor 17 Studen", "vor 18 Studen", "vor 19 Studen", "vor 20 Studen", "vor 21 Studen", "vor 22 Studen", "vor 23 Studen", "vor 24 Stunden"),
            "minute" => array("", "eine Minute vor", "vor zwei Minuten", "drei Minuten vor", "vier Minuten vor", "vor fünf Minuten", "sechs Minuten vor", "sieben Minuten vor", "acht Minuten vor", "neun Minuten vor", "zehn Minuten vor", "11 Minuten vor", "12 Stunden", "13 Minuten vor", "14 Minuten vor", "15 Minuten vor", "15 Minuten vor", "16 Minuten vor", "17 Minuten vor", "18 Minuten vor", "19 Minuten vor", "20 Minuten", "21 Minuten vor", "22 Minuten vor", "23 Minuten vor", "24 Stunden", "25 Stunden", "26 Minuten vor", "27 Minuten vor", "28 Minuten vor", "29 Minuten vor", "30 Minuten vor", "31 Minuten vor", "32 Minuten vor", "33 Minuten vor", "34 Minuten vor", "35 Minuten vor", "36 Minuten vor", "37 Minuten vor", "38 Minuten vor", "39 Minuten vor", "40 Minuten vor", "41 Minuten vor", "42 Minuten vor", "43 Minuten vor", "44 Minuten vor", "45 Minuten vor", "46 Minuten vor", "47 Minuten vor", "48 Minuten vor", "49 Minuten vor", "50 Minuten vor", "hours ago", "52 Minuten vor", "53 Minuten vor", "54 Minuten vor", "55 Minuten vor", "56 Minuten vor", "57 Minuten vor", "58 Minuten vor", "59 Minuten vor"),
            "second" => array("vor ein paar Sekunden")));
    }

}

?>
