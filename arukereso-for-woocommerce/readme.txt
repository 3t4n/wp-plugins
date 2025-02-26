=== Árukereső for Woocommerce ===
Contributors: oaron
Donate link: https://bitron.hu/arukereso-for-woocommerce/
Tags: Woocommerce, arukereso
Requires at least: 3.0
Tested up to: 6.2.2
Stable tag: trunk
License: GPLv2 or later

Woocommerce terméklista az Árukereső és Árgép szolgáltatásaihoz.

== Description ==

A bővítmény segítségével átadhatjuk termékeink listáját az Árukereső,   Árgép és olcsobbat.hu számára.
[Árukereső regisztráció](http://www.arukereso.hu/admin/)
[Árgép regisztráció](http://www.argep.hu/content_reszvetel.html)
[Olcsobbat.hu regisztráció](https://partnerportal.olcsobbat.hu/static/erdeklodoknek)

> **Prémium verzió**
> Az ingyenes verzió csak az első 50 egyszerű terméket emeli át az Árukereső számára, a teljeskörű termék szinkronizációhoz nézzük meg a [prémium verziót](https://bitron.hu/arukereso-for-woocommerce/)!

= Funkciók =

* **50 egyszerű termék átadása**
Az ingyenes verzióban az első 50 egyszerű termék kerül bele az Árukereső számára biztosított xml feed-be.
* **Korlátlan számú termék behúzása** _PRÉMIUM_
A termékek korlátozás nélkül betöltésre kerülnek az XML feed-be.
* **Variációs termékek** _PRÉMIUM_
Az Árukereső megköveteli, hogy minden terméknek egyedi linkje és neve legyen. Variációs termékek esetén a terméknévbe bekerülnek a termék jellemzők is (pl. Póló, piros, XL)
* **Termék készlet figyelés**
Ha egy termék nincs raktáron, nem kerül a listába
* **Termékek kizárásának lehetősége az Árukereső rendszeréből**
Manuálisan kizárhatunk termékeket, ebben az esetben ezek nem kerülnek bele az xml feed-be. Lehetőség van az összes termék alapértelmezett kizárására is, ezt követően egyesével engedélyezhetjük a megfelelő termékeket.
* **Kiegészítő termékadatok támogatása**
Minden terméknél megadhatóak az Árukereső kosárprogramhoz tartozó mezők (garancia, EAN kód, stb)
* **Alapértelmezett szállítási idő és díj megadása**
Megadható az alapértelmezett szállítási díj és idő, ezek egyes termékeknél felülbírálhatóak.
* **Árgép alap támogatása**
* **Olcsobbat.hu alap támogatása**
* **Időzített xml fájl készítése** _PRÉMIUM_
Kissebb erőforrású tárhelyeken hasznos, ekkor ugyanis a terméklista feed a háttérben (óránként 1 alkalommal) készül el, és nem akkor, amikor az Árukereső elindítja  a termék szinkronizálást.
* **Kézi xml fájl generálása ** _PRÉMIUM_
* **Attribútumok párosítása ** _PRÉMIUM_
A termékekhez létrehozott attribútumok párosíthatóak az Árukereső által elvárt mezőkhöz (pl. garancia, EAN kód)
* **Kiemelt támogatás** _PRÉMIUM_
Ügyfélszolgálatunk 1 munkanapon belül válaszol, amennyiben hiba lép fel, megkezdi annak kivizsgálását.

= Használat =
A bővítmény telepítését és bekapcsolását követően több helyen is testre szabható:
Ingyenes:
* **Beállítások->Árukereső: Alapértelmezett beállítások módosíthatóak itt. Úgy mint összes termék kizárása; Alapértelmezett szállítási idő és költség, stb.**
Prémium:
* ** Árukereső->Általános beállítások: Alapértelmezett beállítások módosíthatóak itt. Úgy mint összes termék kizárása; Alapértelmezett szállítási idő és költség, stb.**
* ** Árukereső->Attribútum beállítások: Összepárosíthatóak a termék attribútumok az Árukereső egyes mezőivel.**
* ** Árukereső->Időzített feed generálás: Amennyiben be van kapcsolva az óránkénti feed készítés, itt követhetjük nyomon ennek státuszát, illetve ha szükséges kézzel is elindíthatjuk a terméklista legenerálását.**

* **Termék szerkesztése: Termék szerkesztésénél az arra vonatkozó beállításokat lehet módosítani. Pl. EAN kód; garancia hossza; egyedi kiszállítási díj; egyéb paraméterek.**
* **Termékkategória szerkesztése: Egy termékkategória módosításánál megadhatunk egyedi nevet az Árukereső számára, ill. kizárhatjuk az abban a kategóriában található összes terméket.**

== Changelog ==

= 2.9 =
* HPOS kompatibilitás
* Készletkezelés javítása
= 2.8.2 =
* Olcsobbat  fix

= 2.8.1 =
* 50 termék lekérés hiba javítása
= 2.8 =
* Ingyenes szállítás  hiba javítása
* Apróbb hibajavítások
= 2.6.2 =
* Olcsobbat feed hiba jav
= 2.6.1 =
* Ingyenes verzióban 50 termék hiba jav
= 2.6 =
* Beállítások oldal átalakítása
* Kézi xml generálási lehetőség
* Termék attribútumok összerendelése az Árukereső mezőkkel
* Olcsobbat.hu feed támogatása
* Xml generálás hiba javítása
* Már nem akad össze az ingyenes és a prémium Árukereső bővítmény
* Értékelések beillesztési hiba javítása

= 2.5.1 =
* Filter hiba javítása

= 2.5 =
* Megbízható bolt program támogatása
* Termék attribútumok átadása
* ÁFA külön megadása
* 50 termék betöltés javítása

= 2.0 =
* Szétbontás alap és prémium verzióra. Az alap verzió csak 50 egyszerű terméket támogat.
* Újraírásra került az XML generálás, kisebb erőforrású tárhelyeken is működik
* Időzített XML generálás
* Egyedi terméknév és termékurl a variációs termékekhez
* Megadható Árukereső kategórianév egy termékkategória szerkesztésénél
* Kizárható alapértelmezetten az összes termék az Árukereső xml-ből
* Egyéb hibajavítások

= 1.8.5 =
* A beállításokban megadható, hogy leírásnak a rövid, vagy a hosszabb leírás kerüljön átadásra.
* WordPress 5.5 kompatibilitás

= 1.8.4 =
* Array kiírás probléma javítása
* Szállítási idő elmentésének javítása
* Ha a rövid leírás üres, de a hosszú ki van töltve, ez kerül bele a feed-be.

= 1.8.3 =
* Gyártó nem került bele minden esetben a feed-be.

= 1.8.2 =
* Áfa esetén az akciós árak hibásan jelentek meg

= 1.8.1 =
*Beállított kategóriák nem jelentek meg az Árukereső feed-ben.

= 1.8 =
* Feed linkek a beállításokban most már a megadott permalink struktúra alapján jelennek meg.
* A lekérések optimalizálva lettek, sok termék esetén sem telik meg a memória.
* Üres termékleírás és termékkategória esetén nincs hibaüzenet

= 1.7 =
* Árgép feed esetén a szállítás minden esetben ingyenes volt.

= 1.6 =
* Variációk külön kitilthatósága a terméklistából
* Egyedi terméknév megadása variációk esetén

= 1.5 =
* Ean_code és manufacturer mezők hozzáadása
* Javítva az összeghatár feletti ingyenes kiszállítás hibája
* Megoldva a 2.x és 3.x közötti kompatibilitási probléma

= 1.4 =
* Árgép xml támogatás

= 1.3 =
* Fix ár fölött ingyenes kiszállítás lehetősége
* Árukereső kategória megadása kézzel termékenként

= 1.2 =
* Termék kizárható az Árukereső xml-ből
* Megadható az alapértelmezett szállítási idő/ár
* Megadható termékenként külön-külön a termék szállítási ideje/ára

= 1.1.2 =
* Nettó és bruttó ár hiba javítása

= 1.1.1 =
*  Kódolási és apróbb hibák javítása a kimenetben

= 1.1 =
* Ha van akciós ár, az kerül bele az xml-be
* Amennyiben meg van adva, az xml-ben megjelenik a termék képére mutató link
* Termékleírás hozzáadása
* Variációk megjelenítése
* Apróbb hibajavítások

= 1.0 =
* Initial release

== Installation ==

1. Töltsük fel a bővítmény mappáját a Wordpress /wp-content/plugins/ mappájába.
2. A vezérlőpulton a Telepített bővítmények oldalon kapcsoljuk be a kiegészítőt.
3. További információkért tekintsük meg a vezérlőpulton a Beállítások->Árukereső beállításai aloldalt.


== Frequently Asked Questions ==

= Hogyan küldhetem el javaslataimat a fejlesztőnek? =

A fejlesztőt az alábbi címen érhetjük el: ugyfelszolgalat (kukac) bitron (pont) hu.

= Mit csináljak, ha "Érvénytelen rss feed" hibaüzenetet kapok? =

Amennyiben nincsen létrehozva egyetlen bejegyzés sem, csak termékek, a Wordpress letiltja az összes rss csatornát. A hiba már javítás alatt. A hibát legegyszerűbben egy bejegyzés létrehozásával orvosolhatjuk.

= Mit csináljak, ha üres xml-t kapok eredményül? =

Gyakori hiba szokott lenni, hogy a Wordpress számára túl kevés memória van engedélyezve. Erre a legegyszerűbb megoldás, ha a wp-config.php fájlban elhelyezzük az alábbi sort:
define('WP_MEMORY_LIMIT', '256M');

= A nettó és bruttó árak az Árukereső szerint ugyanazok, pedig van a termékeimen áfa. Mi lehet a gond? =

Ez általában akkor szokott előfordulni, ha hibásak az adózási beállítások a Woocommerce-ben. Helyes megadáshoz  egy részletes leírás: [Áfakulcsok beállítása WooCommerce áruházakban](https://wphu.org/tippek-trukkok/afakulcsok-beallitasa-woocom-merce-aruhazakban/)

= Az xml-be csak 50 darab termék kerül bele. Miért? =

A 2.0 verziótól kezdve, az ingyenes változat csak 50 darab terméket ad át az Árukeresőnek. Amennyiben többre van szükségünk, olvassuk el a [prémium verzi](https://bitron.hu/arukereso-for-woocommerce/) lehetőségeit!