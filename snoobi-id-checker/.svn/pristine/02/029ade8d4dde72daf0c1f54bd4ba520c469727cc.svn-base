var snoobi_options = {
  sn_found_en: "Your Snoobi ID for this website is: ",
  sn_nofound_en: "You do not have a Snoobi ID for this website.",
  sn_found_nl: "Uw Snoobi bezoekers ID voor deze website is: ",
  sn_nofound_nl: "U heeft geen Snoobi ID in deze browser voor deze website.",
  sn_found_fi: "Snoobin vierailijatunnuksesi on:",
  sn_nofound_fi:
    "Sinulla ei ole Snoobin vierailijatunnusta tälle verkkosivustolle.",
};

var en = `
    <h2 style="font-size: 20px;font-weight: bold;margin: 20px 0;">Snoobi Analytics GDPR Support - Check your Snoobi ID</h2>
    <p>When you visit this website that uses the Snoobi Analytics Suite and consent with cookies to be placed on your browser, a visitor ID is created and stored in a cookie. We do not store additional identifiable cookies in your browser and any information is for the exclusive use of the website owner.</p>
    <p>The information below shows the Snoobi ID as it exists in the current browser for this website.<br/>
        If you are using additional computers or browsers to access this site then you may have multiple Snoobi ID's for each browser.</p>
    <p>If no Snoobi ID exists for this browser then you will see the the text 'You do not have a Snoobi ID for this website', otherwise you will see a message such as 'Your Snoobi ID for this website is: 1036644383-95ebcd4a9dd5d019e23c892a89fea683'</p>
    <hr />
    <h4 style="font-size: 18px;font-weight: bold;margin: 20px 0;">
        <div id='cookieid'>
            You do not have a Snoobi ID for this website.
        </div>
    </h4>
    <hr />
    <p>You can use this information to check the various Snoobi ID's you have, but you can also request insight in the information a website has collected from your visits with this Snoobi ID.
        <br />
        <span style="text-decoration: underline;margin: 20px 0;">You will need the copy the complete Snoobi ID and send that to the owner of the website for which you want to check your access details.</span>
    </p>
    <p>It is possible that no information exists. Any Snoobi ID may already been removed from the website analytics or otherwise scrambled.</p>
    <p>In that case you cannot be recognized by Snoobi or the website owner so you are anonymous.</p>
    <hr />
    <p>Please note that you cannot contact Snoobi directly for this information, as Snoobi can only work on request of the owner of the website and we have no direct access to your details.</p>
    <p>&copy; Snoobi Technology B.V.</p>
    <p>&nbsp;</p>
`;
var nl = `
    <h2 style="font-size: 20px;font-weight: bold;margin: 20px 0;">Snoobi Analytics GDPR-Support - Controleer uw Snoobi ID</h2>
    <p>Wanneer u een website bezoekt waar de Snoobi Analytics Suite actief op is en u geeft toestemming dat uw browser cookies opslaat, wordt er een bezoekersidentificatie gemaakt en opgeslagen in een cookie (het Snoobi ID).
    Snoobi slaat geen aanvullende identificeerbare cookies op in uw browser. Alle informatie is uitsluitend voor gebruik door de eigenaar van de website.</p>
        <p>Onderstaande informatie toont de Snoobi ID zoals deze aanwezig is voor de voor deze website gebruikte browser.
    Als u andere computers of browsers gebruikt om deze website te bezoeken dan heeft u meerdere Snoobi IDs voor elke browser.
    .</p>
    <p>Als er geen Snoobi ID bestaat voor deze browser en voor deze website, ziet u de tekst 'U heeft geen Snoobi ID in deze browser voor deze website'. Anders ziet u een bericht zoals 'Uw Snoobi bezoekers ID voor deze website is: 1036644383-95ebcd4a9dd5d019e23c892a89fea683'</p>
    <hr />
    <h4 style="font-size: 18px;font-weight: bold;margin: 20px 0;">
        <div id='cookieid'>
            U heeft geen Snoobi ID in deze browser voor deze website.
        </div>
    </h4>
    <hr />
    <p>U kunt deze informatie gebruiken om de verschillende Snoobi IDs die u heeft te controleren. Ook kunt u vragen om de informatie die door een website is opgeslagen van uw bezoeken met dit Snoobi ID.
        <br />
        <span style="text-decoration: underline;margin: 20px 0;">U heeft een kopie nodig van de volledige Snoobi ID zoals hier getoond en verstuurt dat aan de eigenaar van de website waar u uw bezoekgegevens wil controleren.</span>
    </p>
    <p>De kans bestaat dat er geen informatie aanwezig is voor dit Snoobi ID. HHet kan zijn dat die al is verwijderd van de website-analyse, of op een andere manier vervormd is (‘scrambled’). In dat geval kunt u niet worden herkend door Snoobi of de website-eigenaar, dus bent u een anonieme bezoeker.</p>
    <p>Note: u kunt geen rechtstreeks contact opnemen met Snoobi Technology B.V., omdat ons bedrijf uitsluitend werkt op verzoek van de eigenaar van de website en wij geen directe toegang hebben tot uw gegevens.</p>
    <p>&copy; Snoobi Technology B.V.</p>
    <p>&nbsp;</p>
`;
var fi = `
    <h2 style="font-size: 20px;font-weight: bold;margin: 20px 0;">Snoobi Analytics GDPR Tuki - Tarkista Snoobi ID:si</h2>
    <p>Kun vierailet tällä verkkosivustolla, joka käyttää Snoobi Analytics Suitea, ja suostut evästeiden asettamiseen selaimeesi, niin selaimesi evästeeseen luodaan ja tallennetaan yksilöllinen vierailijatunnus (Snoobi ID). Snoobi ei tallenna selaimeesi muita tunnistettavia evästeitä, ja kaikki tiedot on tarkoitettu yksinomaan sivuston omistajan käyttöön.</p>
    <p>Alla näet Snoobi-tunnuksesi tiedot sellaisena kuin se on tämänhetkisessä selaimessa tällä verkkosivustolla. Jos käytät verkkosivustolla vierailuun muita tietokoneita tai selaimia, sinulla voi olla useita Snoobi-tunnuksia kullekin selaimelle erikseen.</p>
    <p>Jos tälle selaimelle ei ole olemassa Snoobi-tunnusta, näet tekstin: 'Sinulla ei ole Snoobin vierailijatunnusta tälle verkkosivustolle'', muussa tapauksessa näet esim. seuraavanlaisen viestin: 'Snoobi-vierailijatunnuksesi on: 1036644383-95ebcd4a9dd5d019e23c892a89fea683'</p>
    <hr />
    <h4 style="font-size: 18px;font-weight: bold;margin: 20px 0;">
        <div id="cookieid">Sinulla ei ole Snoobin vierailijatunnusta tälle verkkosivustolle.</div>
    </h4>
    <hr />
    <p>Voit käyttää näitä tietoja tarkistaaksesi kaikki mahdolliset omat Snoobi-tunnuksesi, mutta voit myös pyytää tällä Snoobi-tunnuksellasi informaatiota, jota verkkosivusto on kerännyt vierailuistasi. <br /><span style="text-decoration: underline;margin: 20px 0;">Ota kopio koko vierailijatunnuksesta ja lähetä se sen verkkosivuston omistajalle, jonka sivustolta haluat tietosi tarkistaa.</span></p>
    <p>On mahdollista, että tälle kävijätunnukselle ei ole tietoja. Tunnus on saatettu jo poistaa verkkosivuston analytiikasta tai se on muulla tavalla salattu.</p>
    <p>Tällöin Snoobi tai verkkosivuston omistaja ei tunnista sinua, joten olet anonyymi vierailija.</p>
    <p>Huomioi, että et voi saada Snoobilta suoraan näitä tietoja, koska Snoobi voi toimia vain verkkosivuston omistajan pyynnöstä, eikä meillä ole suoraa pääsyä tietoihisi.</p>
    <p>&copy; Snoobi Technology B.V.</p>
    <p>&nbsp;</p>
`;

var content_id = myData.id;

var contents = [
  {
    en,
    fi,
  },
  {
    nl,
    en,
  },
];

/ ~~~ FETCH LANGUAGE PARAM~~~~ /;
var language = myData.language;
var content = "";
if (language && language in contents[content_id - 1]) {
  content = contents[content_id - 1][language];
} else {
  content = contents[content_id - 1]["en"];
}

document.body.style.background = "#f3f3f3";
var html_template = `
    <div style='font-family: -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica, Arial, sans-serif;font-size: 16px;'>
        <p style="font-family: Arial; font-size:20pt; margin-bottom: 20px; font-weight: bold;">Snoobi Analytics</p>
        <input type='button' onclick='changeContent(\"en\")' value=' English ' />
`;
if (content_id == 1)
  html_template += `<input type="button" onclick="changeContent('fi')" value=" Suomeksi " />`;
else if (content_id == 2)
  html_template += `<input type='button' onclick='changeContent(\"nl\")' value=' Nederlands ' />`;

var template = `
    ${html_template}
        <div id='content'>${content}</div>
    </div>
`;

document.getElementById("snoobi-id-check").innerHTML = template;

/ ~~~GET COOKIE VALUE~~~~ /;
var cookieValue = document.cookie
  .split("; ")
  .find((row) => row.startsWith("SnoobiID="));

if (cookieValue) {
  cookieValue = cookieValue.split("=")[1];
  document.getElementById("cookieid").innerHTML =
    snoobi_options[`sn_found_${language}`] + "<b>" + cookieValue + "</b>";
} else {
  document.getElementById("cookieid").innerHTML =
    snoobi_options[`sn_nofound_${language}`];
}

function changeContent(cont) {
  if (cont == "en") {
    content = en;
  } else if (cont == "fi") {
    content = fi;
  } else if (cont == "nl") {
    content = nl;
  } else if (cont == "snoobi") {
    content = en;
  }
  var template = `
        ${html_template}
            <div id='content'>${content}</div>
        </div>
    `;
  document.getElementById("snoobi-id-check").innerHTML = template;
  document.getElementById("cookieid").innerHTML = cookieValue
    ? snoobi_options[`sn_found_${cont}`] + "<b>" + cookieValue + "</b>"
    : snoobi_options[`sn_nofound_${cont}`];
}
