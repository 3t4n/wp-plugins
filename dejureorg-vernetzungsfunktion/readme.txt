=== dejure.org Vernetzungsfunktion ===
Contributors: dejure.org
Donate link: https://dejure.org/vernetzung.html
Tags: rechtsprechung, verlinkung, dejure.org, vernetzung
Requires at least: 6.0
Tested up to: 6.7
Stable tag: 1.98.1
Requires PHP: 7.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Diese Erweiterung verlinkt automatisch zitierte Gesetze und Rechtsprechung (Aktenzeichen und Fundstellen) mit den
Inhalten von dejure.org.

== Description ==

Als Anbieter von juristischen Inhalten im Internet können Sie mit dieser kostenlos von dejure.org bereitgestellten
Funktion ohne eigenen redaktionellen Aufwand Ihre Texte mit Gesetzen und Rechtsprechung selbständig verlinken lassen.
Urteile, Pressemitteilungen, oder sonstige juristische Beiträge - darin vorkommende Zitate von Gesetzesnormen oder
Gerichtsentscheidungen werden automatisch mit den entsprechenden Rechtsquellen auf dejure.org verlinkt.
Es werden Blogbeiträge und Kommentare vernetzt.

== Installation ==

Sofern Sie nicht das Plugin-Verzeichnis von Wordpress nutzen, können Sie es auch manuell installieren:

= Über das Plugin-Menü des Adminbereichs =

1. Menüpunkt 'Plugins' -> 'Installieren'
2. Dort 'Plugin hochladen' anklicken
3. Zip-Datei auswählen und 'Installieren'
4. Das Plugin gleich aktivieren, oder später über das Plugin-Menü
5. Unter 'Einstellungen' -> 'dejure.org' können Sie noch das Verhalten des Plugins ändern. (optional)

= Komplett manuell =

1. Erzeugen Sie auf Ihrem Webspace im Verzeichnis `/wp-content/plugins/` das Verzeichnis `dejureorg-vernetzungsfunktion`
2. Laden Sie `dejure.org-vernetzung.php` aus der Zip-Datei in `/wp-content/plugins/dejureorg-vernetzungsfunktion/`
3. Aktivieren Sie das Plugin unter 'Plugins' im Admin-Bereich von WordPress
4. Unter 'Einstellungen' -> 'dejure.org' können Sie noch das Verhalten des Plugins ändern. (optional)

== Frequently Asked Questions ==

= Welche Gesetze werden verlinkt? =

Der Gesetzesbestand von dejure.org umfaßt z.Zt. rund 270 Gesetze aus fast allen Rechtsgebieten ( Übersicht: https://dejure.org/ ).
Der Bestand wird weiter ausgebaut.

= Welche Urteile werden verlinkt? =

Urteile, die in Ihren Texten mit einem Aktenzeichen oder einer Fundstelle zitiert werden, werden automatisch verlinkt,
falls die entsprechende Entscheidung in unserer Datenbank enthalten ist (Es werden also keine Links erzeugt, die
"ins Leere gehen").

In unserer Rechtsprechungsdatenbank weisen wir derzeit über 1.000.000 Entscheidungen, überwiegend mit frei verfügbarem
Volltext, nach. Die Datenbank wird fortlaufend aktualisiert. Zu den einzelnen Entscheidungen geben wir neben allgemeinen
Informationen einen Link zu einer oder mehreren - in der Regel frei zugänglichen - Volltextveröffentlichungen im Internet
an. Darüber hinaus weisen wir auch weitere Informationen wie Urteilsbesprechungen nach.

= Was passiert, wenn im Text bereits Links gesetzt sind? =

Die Vernetzungsfunktion respektiert alle Links, die bereits im Text enthalten sind, auch solche zu anderen Gesetzesseiten.
Das bedeutet, daß nur solche Gesetzes- und Rechtsprechungszitate, die noch nicht verlinkt sind, von der Funktion
verarbeitet werden. Die Vernetzungsfunktion greift rein unterstützend ein und nimmt niemals die Freiheit der Verlinkung.

= Wie lange dauert die Verarbeitung eines Textes? =

Die Dauer der Vernetzung ist proportional zu der Länge des Ausgangstextes und hängt auch von der Zitierhäufigkeit der
Rechtsquellen ab. Als Faustregel läßt sich sagen, daß eine Bildschirmseite Text in 0,05 sec. verarbeitet wird. Dies
bedeutet, daß es beim ersten Aufruf eines Textes zu einer kurzen Verzögerung kommen kann. Bei späteren Aufrufen hingegen
greift eine lokale Zwischenspeicherung ("Cache") ein, aufgrund derer keinerlei Unterschied in der Seitengeschwindigkeit
wahrnehmbar ist.

= Wie zuverlässig ist die Funktion? =

Die Funktion ist so konzipiert, daß möglichst viele Schreibweisen der Gesetzes- und Rechtsprechungszitate automatisch
erkannt werden. Ein Scheitern der Erkennung ist sehr selten.

= Kann ich sicher sein, dass meine Texte selbst inhaltlich und optisch unangetastet bleiben? =

Neben der zuverlässigen Erkennung der Rechtsquellen stand die Integritität des Ausgangstextes bei der Entwicklung der
Vernetzungsfunktion im Vordergrund. So sind in mehreren Stufen Sicherungen eingebaut, die jegliche Veränderung des
Ausgangstextes ausschließen. Dies betrifft nicht nur den reinen Inhalt des Textes, sondern auch Aufbau und Formatierung
der Textdatei. Als letzter Schritt der Vernetzung wird (auf unserem Server und auch auf Ihrem) ein Vergleich des
Ausgangstextes mit dem Vernetzungsergebnis durchgeführt. Ergibt sich dabei, daß - abgesehen von den bewußt eingefügten
neuen Links - auch nur ein Zeichen verändert ist, so wird die Vernetzung als gescheitert angesehen und der Ausgangstext
zurückgegeben. Dies kommt jedoch extrem selten vor. Die Links, die eingesetzt werden, gehen ausschließlich auf die
allgemeinen Gesetzes- und Rechtsprechungsseiten von dejure.org.

= Gehe ich irgendwelche Verpflichtungen oder Bindungen ein? =

Nein. Wir stellen die Funktion kostenlos zur Verfügung und es steht Ihnen jederzeit frei, zu entscheiden, ob und in
welchem Umfang Sie die Funktion nutzen.

= Kann ich auch einzelne Beiträge von der Vernetzung ausschließen? =

Dafür müssen Sie lediglich
&lt;!-- ohnedjo --&gt;
am Anfang oder Ende des Textes einfügen. Dann wird er von der Vernetzung ignoriert.

== Changelog ==

= 1.98.1 =
*Veröffentlicht am 12.12.2024*

* Potentielle XSS Schwachstelle im Einstellungsformular beseitigt.
* Der Zwischenspeicher für vernetzte Texte verwendet jetzt den Cache von Wordpress, und nicht mehr eine MySQL-Tabelle.


= 1.97.5 =
*Veröffentlicht am 18.12.2018*

* Problem behoben, durch das mit dem Gutenberg-Editor angelegte Texte eventuell nicht vernetzt wurden.

= 1.97.4 =
*Veröffentlicht am 17.12.2018*

* Durch Änderungen der letzten Version konnte, wenn in Wordpress der Debug-Modus aktiviert war, eine PHP-Warnung erscheinen.

= 1.97.3 =
*Veröffentlicht am 27.08.2018*

* Durch das Auslaufen von TLS 1.0 erfordert die verschlüsselt übertragene Vernetzung jetzt mindestens TLS 1.1. Auf vereinzelten, veralteten Webservern kam es deshalb zuletzt vor, dass nichts vernetzt wurde. Jetzt wird in solchen Fällen auf eine unverschlüsselte Verbindung zurückgegriffen.

= 1.97.2 =
*Veröffentlicht am 30.03.2018*

* Logikfehler behoben, der verschlüsselte Vernetzung verhinderte.

= 1.97.1 =
*Veröffentlicht am 26.02.2018*

* Mögliche PHP-Warnung behoben. Verursacht durch Anwendung von count auf einen String.

= 1.97 =
*Veröffentlicht am 09.11.2017*

* Die Links zu dejure.org verweisen jetzt auf HTTPS
* Die Vernetzung geschieht jetzt per TLS Verbindung, sofern von PHP unterstützt

= 1.96 =
*Veröffentlicht am 14.12.2016*

* Veraltete Wordpress-Funktion ersetzt ("escape" -> "prepare")

= 1.95 =
*Veröffentlicht am 25.08.2016*

* Warnung durch veralteten user_level Aufruf behoben.
* Optimierung beim Abruf der Plugin-Einstellungen.

= 1.94 =
*Veröffentlicht am 23.12.2015*

* Schnittstelle verbessert; in Ausnahmefällen konnte es vorkommen, daß nur der Ausgangstext statt dem vernetzten Text angezeigt wurde.

= 1.93 =
*Veröffentlicht am 23.04.2015*

* Erweiterung der Einstellungsmöglichkeiten (Sonderbehandlung von Überschriftsbereichen).

= 1.92 =
*Veröffentlicht am 22.04.2015*

* Kompatibilität mit Wordpress 4.2 sichergestellt.
* Problembehebung Cache.

= 1.91 =
*Veröffentlicht am 04.03.2015*

* Verbesserte Erkennung von Gesetzeszitaten

= 1.90 =
*Veröffentlicht am 23.01.2015*

* Einbau der Möglichkeit, auch Gesetze zu verlinken, die sich nicht im Datenbestand von dejure.org befinden. Hierzu wird der Partnerdienst buzer.de hinzugezogen.
* Neuer Einstellungspunkt "Gesetzesumfang" zur Aktivierung der Verlinkung zu buzer.de (Standard ist inaktiv).
* Optimierung der Verbindung zum dejure.org-Server

= 1.85 =
*Veröffentlicht am 14.01.2015*

* Verbesserte Säuberung des eingebauten Cache
* Anpassung an Wordpress-Vorgaben zur Einbindung ins Plugin-Verzeichnis

= 1.80 =
*Veröffentlicht am 29.12.2010*

* Optimierung des Codes zur Verbesserung der Geschwindigkeit
