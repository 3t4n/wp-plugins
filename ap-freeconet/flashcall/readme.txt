
Aby uruchomiæ kontrolkê FlashCall na swojej stronie:
----------------------------------------------------
1. Pobra³eœ i rozpakowa³eœ ju¿ plik flashcall.zip, wiêc wszystkie pliki umieœæ na serwerze, w katalogu z Twoj¹ stron¹ www. Pliki musz¹ siê znaleŸæ w g³ównym katalogu Twojej strony (tam, gdzie znajduje siê plik index.php lub index.html). Je¿eli nie potrafisz tego zrobiæ, zwróæ siê do osoby, która stworzy³a dla Ciebie stronê www. Je¿eli chcesz umieœciæ pliki FlashCall'a w jakimœ podkatalogu, zobacz temat "Modyfikacja wygenerowanego kodu".
2. Skopiuj kod, który wygenerowa³eœ w swoim panelu FreecoNet na ekranie "Konfiguracja -> Dodatki -> FlashCall". Je¿eli  zapomnia³eœ skopiowaæ kodu, mo¿esz go teraz ponownie wygenerowaæ na wspomnianym ekranie.
3. Wklej kod na swoj¹ stronê w miejscu, w którym chcesz umieœciæ kontrolkê FlashCall.



Chcê umieœciæ na swojej stronie wiêcej ni¿ jedn¹ kontrolkê FlashCall:
---------------------------------------------------------------------
W takim przypadku po prostu wygeneruj kod dla kolejnej kontrolki i umieœæ na swojej stronie. Pamiêtaj, ¿e ka¿da kontrolka powinna zestawiaæ po³¹czenie z innym kontem FreecoNet.



Coœ nie dzia³a? Upewnij siê:
----------------------------
- Czy podczas konfiguracji kontrolki wybra³eœ prawid³owe konto w polu "Po³¹cz z kontem"? Upewnij siê, czy na wybrane przez Ciebie konto mo¿na siê dodzwoniæ.
- Czy na pewno skopiowa³eœ ca³y kod jaki dla Ciebie wygenerowaliœmy? Jeœli nie jesteœ pewien, wygeneruj go ponownie, kliknij prawym klawiszem myszki w okienko z kodem i wybierz "Zaznacz wszystko". Skopiuj kod (Ctrl+C) oraz wklej (Ctrl+V) ponownie na swoj¹ stronê.
- Czy umieœci³eœ wszystkie rozpakowane pliki w g³ównym katalogu Twojej strony? Te pliki to: flashcall.swf, FlashCallF.lib, FlashCallS.lib. Nie umieszczaj ich w ¿adnym podkatalogu np. "flash". Powinny znaleŸæ siê w tym samym katalogu, w którym znajduje siê plik index.php (lub index.html). Je¿eli chcesz umieœciæ pliki FlashCall'a w jakimœ podkatalogu, zobacz temat "Modyfikacja wygenerowanego kodu".

Je¿eli zrobi³eœ wszystko poprawnie a mimo to kontrolka FlashCall nie dzia³a, wówczas napisz do nas na service@freeconet.pl podaj¹c adres strony www, na któr¹ próbowa³eœ wstawiæ kontrolkê FlashCall.




Modyfikacja wygenerowanego kodu:
--------------------------------
Je¿eli jesteœ zaawansowanym u¿ytkownikiem, mo¿esz sam modyfikowaæ wygenerowany kod za pomoc¹ parametrów:
<param name="flashvars" value="parametr1=wartoœæ&parametr2=wartoœæ...">

Mo¿esz ustawiæ nastêpuj¹ce parametry:

id=IDENTYFIKATOR
Ustawia identyfikator kontrolki FlashCall. Musi on odpowiadaæ parametrom id oraz name znacznika <object>. W przypadku umieszczenia na stronie wiêcej ni¿ jednej kontrolki FlashCall, ich identyfikatory musz¹ siê ró¿niæ. Domyœlnie generowanym identyfikatorem jest "flascall_NAZWAKONTA".

auth_domain=DOMENA
Ustawia domenê sip. Domyœlnie generowan¹ domen¹ jest "sip.vectrabiznes.pl" i nie powinna byæ ona zmieniana.

user=NAZWA_KONTA
Ustawia konto NAZWA_KONTA, z którym zostanie zestawione po³¹czenie.

keyboard=on/off
Ustawia, czy ma byæ widoczna klawiatura numeryczna po nawi¹zaniu po³¹czenia. Ustaw "on" aby w³¹czyæ klawiaturê lub "off" aby j¹ wy³¹czyæ.

label=TEKST_TYTU£OWY
Ustawia tekst tytu³owy widoczny obok zielonego przycisku ze s³uchawk¹.

info_text=TEKST_DODATKOWY
Ustawia dodatkowy tekst widoczny pod zielonym przyciskiem ze s³uchawk¹.

text=TEKST_OPISU
Ustawia dodatkowy tekst opisu, widoczny po klikniêciu na "wiêcej".

lang=pl/en
Ustawia jêzyk komunikatów wyœwietlanych przez FlashCall. Mo¿liwe opcje to: pl - jêzyk polski (domyœlnie), en - jêzyk angielski.

Istnieje równie¿ funkcja javascript, za pomoc¹ której mo¿esz zmieniæ œcie¿kê z zasobami FlashCall'a (pliki FlashCallF.lib oraz FlashCallS.lib):

function getLibPath() { return "ŒCIE¯KA"; }

Œcie¿kê mo¿na podaæ w postaci nazwy podkatalogu lub adresu URL. Je¿eli chcia³byœ umieœciæ pliki FlashCall'a np. w podkatalogu "/swf/flashcall" wówczas wywo³aj nastêpuj¹c¹ funkcjê:

<script type="text/javascript">
function getLibPath() { return "swf/flashcall"; }
</script>
