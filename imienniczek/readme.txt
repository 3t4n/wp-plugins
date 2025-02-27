=== imienniczek ===
Contributors: hubi10
Tags: imieniny, imienniczek, data imienin, czyje są imieniny, kto ma dziś imieniny, imieniny dzisiaj, imieniny dziś, solenizanci
Requires at least: 4.4
Tested up to: 5.5.3
Requires PHP: 5.2.4
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Stable tag: trunk

Wtyczka wyświetla imiona osób które obchodzą dziś imieniny.

== Description ==

<strong>Wtyczka pobiera listę imion osób, które obchodzą dzisiaj swoje imieniny i wyświetla je w Twojej witrynie.</strong><br />
Udostępniamy dwie metody wyświetlania imion: przez shortcode wklejony w dowolnie wybrane miejsce (np. w treści, nagłówku itp), lub widget dodany do panelu bocznego lub stopki.<br />

<h4>Shortcode</h4><br ?>
Wpisz w treści shortcode <strong>[imienniczek]</strong> aby wyświetlić osoby które mają dziś imieniny.
Wtyczka automatycznie pobiera listę dzisiejszych solenizantów i wyświetla ją na Twojej witrynie. <br />

<h4>Widget</h4><br />
Udostępniliśmy 2 różne widgety dostępne w zależności od Twoich potrzeb.
	1. Widget "Imienniczek" - wyświetla imiona 2-4 najpopularniejszych imienin z dzisiejszego dnia. Przykład z 29 czerwca: "Imieniny: Kasjusza, Pawła, Piotra".
	2. Widget "ImienniczekBox" - wyświetla interaktywną tabelkę ze wszystkimi imionami osób które obchodzą swoje imieniny w dniu poprzednim, dziś, jutro oraz pojutrze. Widget daje opcje konfiguracji użytej kolorystyki w kodzie HEX.
<br />

<strong>Źródło danych</strong><br />
Wtyczka korzysta z bazy danych imienin udostępnionych na stronie [imienniczek.pl](https://imienniczek.pl).

== Installation ==

<h4>Instalacja automatyczna</h4>
1. Zainstaluj wtyczkę przez automatyczny instalator wtyczek. Możesz ją wyszukać po słowie "imienniczek" lub "imieniny".
2. Aktywuj wtyczkę w WordPressie w menu "Wtyczki".
3. W wybranym miejscu strony wklej shortcode [imienniczek] <br />

<h4>Instalacja ręczna</h4>
1. Pobierz wtyczkę i rozpakuj na swoim komputerze.
2. Wgraj pliki przez ftp na swój serwer do katalogu: /wp-content
3. Aktywuj wtyczkę w WordPressie w menu "Wtyczki".
4. W wybranym miejscu strony wklej shortcode [imienniczek]

== Frequently Asked Questions ==

= Jaki kod shortcode mam użyć aby wyświetlić imiona solenizantów?=
[imienniczek] - wystarczy wkleić/wpisać ten kod a w tym miejscu strony wyświetli się aktualna lista solenizantów.

=Jak działa widget "imienniczek"?=
Po zainstalowaniu i włączeniu wtyczki, wśród dostępnych widgetów pojawi się imienniczek. Wystarczy przeciągnąć go w wybrane miejsce panelu bocznego lub pola stopki.
Wtyczka umożliwia nadanie własnego tytułu widgetu. 

=Czy lista imion jutro się zmieni?=
Oczywiście! Codziennie automatycznie będzie aktualizowała się lista solenizantów.

=Czy mogę użyć własny kod CSS?=
Tak. Wtyczka korzysta z domyślnego kodu css jaki masz na swojej stronie - dostosowuje się do wyglądu. Możesz dowolnie ingerować w arkusz styli CSS.

=Jak ustawić własne kolory w widgecie ImienniczekBox?=
Po dodaniu wudgetu w jego ustawieniach możesz wprowadzić własne kolory w formacie #HEX. Przykładowo dla koloru czerwonego: #FF0000

=Mam pomysł na nową funkcję, lub pytanie do twórców wtyczki. Jak się skontaktować?=
W stopce naszej strony [imienniczek.pl](https://imienniczek.pl) znajdziesz dane kontaktowe. Napisz do nas:)


== Screenshots ==

1. 2 dostępne widgety.
2. 2 widgety zamieszczone na przykładowej stronie internetowej.
3. 2 widgety zamieszczone na przykładowej stronie internetowej.
4. Użyty shortcode.

== Changelog ==

= 1.4.2 =
* Dostosowanie koloru tekstu aktualnej zakładki do koloru imion.

= 1.4.1 =
* Bug - naprawa błędnie wyświetlanych styli widgetu ImienniczekBox
* Widget ImienniczekBox otrzymuje możliwość ustawienia własnych kolorów dla imion, tła i zakładek.
* Nowy opis, faq i screenshoty wtyczki.

= 1.4 =
* Dodany nowy widget "ImienniczekBox" - wyświetla interaktywną tabelkę z imionami solenizantów obhodzących swoje święto wczoraj/dziś/jutro/pojutrze.

= 1.3.1 =
* Bug - naprawiony błąd, który nie wyświetlał imienin w przypadku użycia shortcode.

= 1.3 =
* Optymalizacja pobierania danych imienin - nowy kod javascript
* Skasowane błędne działanie tłumaczenia wtyczki

= 1.2.1 =
* Dodanie plików tłumaczeń .po .mo.

= 1.2.0 =
* Wprowadzenie tłumaczeń wtyczki - oficjalna polska wersja językowa.

= 1.1.3 =
* Poprawka opisu modułu "widget".
* Całkowicie przeredagowany opis wtyczki, FAQ i instrukcje.
* Nowe screenshoty.

= 1.1.2 =
* Poprawka błędu changelog.

= 1.1.0 =
* Stworzyliśmy Widget "Imienniczek" dzięki czemu wystarczy włączyć widget aby wyświetlić w imieniny w sidebar lub stopce witryny.
* Poprawka opisu wtyczki.

= 1.0.1 =
* Poprawka opis wtyczki.

= 1.0.0 =
* Pierwsza oficjalna wersja wtyczki. Życzymy miłego użytkowania.