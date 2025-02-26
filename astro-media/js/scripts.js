
function myService() {
    return {
        getUrl: function () {
        // Replace this URL with the one you want the popup window to navigate to
        return Promise.resolve("https://www.example.com");
        },
    };
}

function getsettings($, token, product_id, horoscope_type, container_id, font_class) {

    $.ajax({
        type: "post",
        crossDomain: true,
        data: {
            apikey: token,
            domain: window.location.hostname,
        },
        url: "https://astromedia-business.nl/api/endpoint/v1/getsettings",
        success: function(response) {

            // Get settings from response for the current horoscope type
            var itemtofilter = 'activated';
            var result = response.filter(item => {
                return item.product_id == product_id && item.item == itemtofilter;
            });
            var activated = result.length == 0 ? '0' : result[0].setting;

            var itemtofilter = 'defaulttext';
            var result = response.filter(item => {
                return item.product_id == product_id && item.item == itemtofilter;
            });
            var defaulttext = result.length == 0 ? '1' : result[0].setting;

            itemtofilter = 'text_color';
            result = response.filter(item => {
                return item.product_id == product_id && item.item == itemtofilter;
            });
            var text_color = result.length == 0 ? '#000000' : result[0].setting;

            itemtofilter = 'theme_color';
            result = response.filter(item => {
                return item.product_id == product_id && item.item == itemtofilter;
            });
            var theme_color = result.length == 0 ? '#408080' : result[0].setting;

            itemtofilter = 'font';
            result = response.filter(item => {
                return item.product_id == product_id && item.item == itemtofilter;
            });
            var font = result.length == 0 ? 'roboto' : result[0].setting;

            if (typeof result[0] !== 'undefined') {

				if (result[0].setting == '1') {
					var font = 'roboto';
				} else if (result[0].setting == '2') {
					var font = 'lato';
				} else if (result[0].setting == '3') {
					var font = 'rubik';
				} else if (result[0].setting == '4') {
					var font = 'noto-sans';
				} else if (result[0].setting == '5') {
					var font = 'droid-sans';
				} else if (result[0].setting == '6') {
					var font = 'pt-sans';
				} else if (result[0].setting == '7') {
					var font = 'ubuntu';
				} else if (result[0].setting == '8') {
					var font = 'raleway';
				} else if (result[0].setting == '9') {
					var font = 'source-sans-pro';
				} else if (result[0].setting == '10') {
					var font = 'lato';
				} else if (result[0].setting == '11') {
					var font = 'montserrat';
				} else if (result[0].setting == '12') {
					var font = 'open-sans';
				}else{
					var font = 'roboto';
				}
			}else{
				var font = 'roboto';
			}

            itemtofilter = 'fontsize';
            result = response.filter(item => {
                return item.product_id == product_id && item.item == itemtofilter;
            });
            var textsize = result.length == 0 ? '18px' : (
                result[0].setting == '1' ? '13px' :
                result[0].setting == '2' ? '18px' :
                result[0].setting == '3' ? '23px' :
                result[0].setting == '4' ? '28px' :
                '18px'
            );
            var headersize = result.length == 0 ? '35px' : (
                result[0].setting == '1' ? '30px' :
                result[0].setting == '2' ? '35px' :
                result[0].setting == '3' ? '40px' :
                result[0].setting == '4' ? '45px' :
                '35px'
            );

            // Apply settings to elements in the current horoscope container
            var container = $('#' + container_id);
            
            if (activated == 1) {
                container.show();
            } else {
                container.hide();
            }

            if(defaulttext == 0){
                container.find('.defaulttextcontainer_' + horoscope_type).hide();
            }else{
                container.find('.defaulttextcontainer_' + horoscope_type).show();
            }            

            container.find('.textsize_' + horoscope_type).css('font-size', textsize);
            container.find('.headersize_' + horoscope_type).css('font-size', headersize);

            container.find('.textsize_'+horoscope_type).addClass(font);
            container.find('.headersize_'+horoscope_type).addClass(font);
            container.find('.theme_color_'+horoscope_type).addClass(font);

            container.find('.theme_color_' + horoscope_type).css('color', theme_color);
            container.find('.text_color_' + horoscope_type).css('color', text_color);
            container.find('#payment-button_' + horoscope_type).css('background-color', theme_color);
            container.find('#resultbutton_' + horoscope_type).css('background-color', theme_color);

            container.find('.horoclass').hover(
                function() { // Mouse enter
                    $(this).css('border', '2px solid '+theme_color);
                },
                function() { // Mouse leave
                    $(this).css('border', '2px solid transparent'); 
                }
            );

            container.find('.background_' + horoscope_type).css('background-color', theme_color);

            randomizeBackgroundGradient(theme_color, horoscope_type); 
        }
    });
}

function randomizeBackgroundGradient(theme_color, horoscope_type) {
    var elements = document.getElementsByClassName('background_gradient_' + horoscope_type);
    
    for (var i = 0; i < elements.length; i++) {
        var randomDegree = Math.floor(Math.random() * 360);
        
        // let gradient color with the theme color
        //var gradient = 'linear-gradient(' + randomDegree + 'deg, rgba(255,255,255,0) 0%, '+theme_color+' 180%)';
        // or let it be white
        var gradient = 'linear-gradient(' + randomDegree + 'deg, rgba(255,255,255,0) 0%, white 180%)';
        
        elements[i].style.background = gradient;
    }
}


function open_second(token, horoscope, type, product_id, active){

    (function($) {

        var imagesfolder = document.getElementById('getimagesfolderforthisplugin').value;

        if(type == 'ram'){

            var image = imagesfolder + 'ram.gif';
            $('#image_second_' + horoscope).attr('src', image);
            $('#strong_second_' + horoscope).html('Ram');
            $('#span_second_' + horoscope).html('<span style="color:black!important">21 Mrt - 20 Apr</span>');
            $('#title_second_' + horoscope).html('Ram');
            $('#description_second_' + horoscope).html('Ram heeft een sterk onafhankelijk karakter, is positief ingesteld en een geboren leider Ook is Ram avontuurlijk, ambitieus, zelfverzekerd, sexy en charismatisch. Wat er ook gebeurt, Ram slaat zich overal doorheen, Ram is strijdlustig. Een Ram is niet kapot te krijgen en zal ook in slechte tijden overleven. Een Ram is impulsief en denkt vaak niet na, voordat hij of zij iets zegt of handelt. Ram is meestal onbevangen kinderlijk en openhartig, maar kan ook emotioneel afstandelijk zijn. Ram vindt het moeilijk om over gevoelens te praten, vooral als ze gecompliceerd zijn.');
        }

        if(type == 'stier'){

            var image = imagesfolder + 'stier.gif';
            $('#image_second_' + horoscope).attr('src', image);
            $('#strong_second_' + horoscope).html('Stier');
            $('#span_second_' + horoscope).html('<span style="color:black!important">21 Apr - 21 Mei</span>');
            $('#title_second_' + horoscope).html('Stier');
            $('#description_second_' + horoscope).html('Stier is attent, toegewijd, betrokken, stabiel, eerlijk en staat bekend om zijn of haar geduld. Stieren nemen liever geen risico, maar zoeken naar emotionele en financiële zekerheid. Het sterrenbeeld Stier is volhardend en gaat door wanneer anderen al lang hebben opgegeven. Stieren houden van rust en regelmaat. Gedragen zich niet opvallend en zijn down to earth. Stier houdt niet van veranderingen en voelt zich op z’n best bij vertrouwde en alledaagse dingen. Stier is een echte levensgenieter en geniet van de mooie dingen in het leven.');
        }

        if(type == 'tweelingen'){

            var image = imagesfolder + 'tweelingen.gif';
            $('#image_second_' + horoscope).attr('src', image);
            $('#strong_second_' + horoscope).html('Tweelingen');
            $('#span_second_' + horoscope).html('<span style="color:black!important">22 Mei - 21 Juni</span>');
            $('#title_second_' + horoscope).html('Tweelingen');
            $('#description_second_' + horoscope).html('Tweelingen is het interessantste sterrenbeeld van de dierenriem. Tweelingen is charmant, geestig, energiek, inventief, slim, veelzijdig en een meester in gevatte opmerkingen. Een Tweelingen is communicatief en steeds bezig met kennis vergaren, het is een echte denker, een ware filosoof. De behoefte aan verandering is groot, saaiheid is de grootste vijand. Een Tweelingen voelt zich op z’n best bij opwinding en gezonde spanning, is ongrijpbaar en vermijdt confrontaties.');
        }

        if(type == 'kreeft'){

            var image = imagesfolder + 'kreeft.gif';
            $('#image_second_' + horoscope).attr('src', image);
            $('#strong_second_' + horoscope).html('Kreeft');
            $('#span_second_' + horoscope).html('<span style="color:black!important">22 Juni - 21 Juli</span>');
            $('#title_second_' + horoscope).html('Kreeft');
            $('#description_second_' + horoscope).html('Kreeft is sympathiek, fantasierijk, verleidelijk, fascinerend, beschermend, geduldig en heeft een aanbiddelijke glimlach. Kreeft is verlegen en heeft een sterk gevoel voor eigenwaarde. Kreeft stelt liever geen eisen, maar als een Kreeft iets wil, kan Kreeft behoorlijk overtuigend en vasthoudend zijn. Kreeften hebben de neiging conflicten uit de weg te gaan, maar kunnen behoorlijk agressief zijn, als ze hun zin niet krijgen. Een Kreeft houdt niet van het onbekende, is emotioneel en verschuilt zich soms voor de buitenwereld. Omdat Kreeft zich groothoudt, is het teruggetrokken gedrag van Kreeft voor anderen lastig te herkennen. Ook kan een Kreeft lichtgeraakt zijn, één sneer of snauw kan ervoor zorgen dat een Kreeft van slag is.');
        }

        if(type == 'leeuw'){

            var image = imagesfolder + 'leeuw.gif';
            $('#image_second_' + horoscope).attr('src', image);
            $('#strong_second_' + horoscope).html('Leeuw');
            $('#span_second_' + horoscope).html('<span style="color:black!important">22 Juli - 22 Aug</span>');
            $('#title_second_' + horoscope).html('Leeuw');
            $('#description_second_' + horoscope).html('Leeuw is loyaal, betrokken, zelfverzekerd, sympathiek, warmhartig en genereus. Het sterrenbeeld Leeuw is het gulste sterrenbeeld van de dierenriem. Leeuwen zijn hartstochtelijk en vechten voor wat ze willen hebben. Ook zijn Leeuwen betrouwbaar, ze houden zich aan hun afspraken en verwachten van anderen hetzelfde. Leeuwen maken anderen graag aan het lachen. Mensen met een negatieve instelling mijden ze het liefst, Leeuwen zien het glas half vol en houden van het leven. Leeuw is eerlijk, nobel, integer en zal nooit iemand in de steek laten.');
        }

        if(type == 'maagd'){

            var image = imagesfolder + 'maagd.gif';
            $('#image_second_' + horoscope).attr('src', image);
            $('#strong_second_' + horoscope).html('Maagd');
            $('#span_second_' + horoscope).html('<span style="color:black!important">23 Aug - 23 Sep</span>');
            $('#title_second_' + horoscope).html('Maagd');
            $('#description_second_' + horoscope).html('Maagd is attent, perfectionistisch, aardig, kieskeurig en een beetje geheimzinnig. Een Maagd vindt het niet nodig alles over zichzelf te vertellen. Maagden zijn niet dromerig, integendeel ze zijn nuchter. Ze zien zaken zoals ze zijn en laten zich niet meesleuren door emoties. Een Maagd staat met beide benen op de grond, is gericht op de toekomst en maakt plannen om naar een bepaald doel toe te werken. Maagd vat dingen letterlijk op en verwacht dat als iemand iets belooft, zijn of haar belofte nakomt.');
        }

        if(type == 'weegschaal'){

            var image = imagesfolder + 'weegschaal.gif';
            $('#image_second_' + horoscope).attr('src', image);
            $('#strong_second_' + horoscope).html('Weegschaal');
            $('#span_second_' + horoscope).html('<span style="color:black!important">24 Sep - 23 Okt</span>');
            $('#title_second_' + horoscope).html('Weegschaal');
            $('#description_second_' + horoscope).html('Weegschaal is charmant, grappig, slim en het meest beschaafde, diplomatieke, welgemanierde sterrenbeeld van de dierenriem. Een Weegschaal is overtuigend en van nature een bemiddelaar in conflicten. Weegschaal bouwt bruggen tussen mensen. Een Weegschaal is recht door zee, rechtvaardig, onbevangen en een briljante strateeg, die een situatie vanuit alle kanten kan bekijken alvorens tot een oordeel te komen. Weegschaal heeft behoefte aan harmonie en evenwicht in het leven.');
        }

        if(type == 'schorpioen'){

            var image = imagesfolder + 'schorpioen.gif';
            $('#image_second_' + horoscope).attr('src', image);
            $('#strong_second_' + horoscope).html('Schorpioen');
            $('#span_second_' + horoscope).html('<span style="color:black!important">24 Okt - 22 Nov</span>');
            $('#title_second_' + horoscope).html('Schorpioen');
            $('#description_second_' + horoscope).html('Schorpioen is verleidelijk, onweerstaanbaar sexy, heeft klasse en trekt overal de aandacht. Een Schorpioen is vastbesloten, doelgericht, mysterieus, loyaal, diepgaand en extreem intuïtief. Schorpioen is onafhankelijk en houdt de controle liever in eigen handen. Een Schorpioen weigert zich door anderen te laten sturen. Schorpioen heeft weinig woorden nodig om zich uit te drukken en zal zich niet anders voordoen dan hij of zij is.');
        }

        if(type == 'boogschutter'){

            var image = imagesfolder + 'boogschutter.gif';
            $('#image_second_' + horoscope).attr('src', image);
            $('#strong_second_' + horoscope).html('Boogschutter');
            $('#span_second_' + horoscope).html('<span style="color:black!important">23 Nov - 21 Dec</span>');
            $('#title_second_' + horoscope).html('Boogschutter');
            $('#description_second_' + horoscope).html('Boogschutter is slim, avontuurlijk, recht door zee, optimistisch en heeft een geweldig gevoel voor humor. Boogschutters zijn wijs, hebben enorm veel kennis en zijn constant bezig hun kennis uit te breiden. Boogschutters zijn bijzonder geïnteresseerd in de natuur en in dieren, ze zouden heel graag willen dat alle mensen dit me ze konden delen. Boogschutter is graag onder mensen en heeft een open mind, anderen zijn graag in het gezelschap van een Boogschutter. Boogschutters zijn echte filosofen, zoeken naar de zin van het leven, zijn sociaal en een meester in het sluiten van vriendschappen.');
        }

        if(type == 'steenbok'){

            var image = imagesfolder + 'steenbok.gif';
            $('#image_second_' + horoscope).attr('src', image);
            $('#strong_second_' + horoscope).html('Steenbok');
            $('#span_second_' + horoscope).html('<span style="color:black!important">22 Dec - 20 Jan</span>');
            $('#title_second_' + horoscope).html('Steenbok');
            $('#description_second_' + horoscope).html('Steenbok is aantrekkelijk, wijs, intelligent, vastberaden, gedisciplineerd, verantwoordelijk, betrouwbaar en heeft een scherpzinnig gevoel voor stijl en smaak. Arm of rijk, een Steenbok kleedt zich fantastisch. Steenbokken zijn ambitieus en moeten altijd iets hebben om achterna te gaan dat hun leven betekenis geeft. Steenbokken zijn extreem geduldig en kunnen lange tijd wachten op hetgeen ze willen. Een Steenbok kan zich goed concentreren, heeft een actieve geest en ziet het leven vaak zwart-wit. Helaas beseft Steenbok vaak te laat dat het leven zonder vreugde niets voorstelt. Steenbok is het sterrenbeeld waarop je kunt rekenen.');
        }

        if(type == 'waterman'){

            var image = imagesfolder + 'waterman.gif';
            $('#image_second_' + horoscope).attr('src', image);
            $('#strong_second_' + horoscope).html('Waterman');
            $('#span_second_' + horoscope).html('<span style="color:black!important">21 Jan - 18 Feb</span>');
            $('#title_second_' + horoscope).html('Waterman');
            $('#description_second_' + horoscope).html('Waterman is origineel, intelligent, spontaan, excentriek, onvoorspelbaar en heeft een aangeboren zelfverzekerdheid. Waterman is sociaal, heeft een vrije geest, is nog zelfzuchtig, nog dominant en heeft veel speelruimte nodig. Waterman is het vriendelijkste en meest onafhankelijke sterrenbeeld van de dierenriem, staat overal voor open en houdt van pret, plezier hebben is essentieel voor een Waterman. Het kan een Waterman weinig schelen wat anderen denken, Waterman doet waar hij of zij zin in heeft. Waterman is fantasievol, kinderlijk, maar ook wijs. Een Waterman doorgronden een onmogelijke opgave. ');
        }

        if(type == 'vissen'){

            var image = imagesfolder + 'vissen.gif';
            $('#image_second_' + horoscope).attr('src', image);
            $('#strong_second_' + horoscope).html('Vissen');
            $('#span_second_' + horoscope).html('<span style="color:black!important">19 Feb - 20 Mrt</span>');
            $('#title_second_' + horoscope).html('Vissen');
            $('#description_second_' + horoscope).html('Vissen is spiritueel, zachtaardig, rustig, dromerig, artistiek en intuïtief. Vissen voelt problemen van anderen haarfijn aan, toont medeleven en verstaat de kunt van het luisteren. Vissen is het meest empathische sterrenbeeld van de dierenriem, gaat uit van het goede in de mens en houdt niet van conflicten. Vissen staat bekend als meegaand, maar is absoluut geen meeloper, Vissen heeft wel degelijk een eigen mening. Vissen is het liefst in het gezelschap van gelijkgestemden, maar heeft ook de behoefte aan alleen zijn.');
        }

        fadeOutEffect(horoscope);

        $('#' + horoscope + '_secondscreen').animate({opacity: 1}, 1000);
        document.getElementById(horoscope + '_secondscreen').style.display = '';
        document.getElementById(horoscope + '_primescreen').style.display = 'none';

        document.getElementById('selected_zodiac').value = type;

    })(jQuery);
}

function fetch_custom_images(token, product_id){

    (function($) {

        $.ajax({
            url: my_ajax_object.ajax_url,
            type: 'POST',
            data: {
                token: token,
                product_id: product_id,
                action: 'fetch_customimages' // Action to trigger the AJAX handler
            },
            success: function(response) {
                // Process the response data (JSON)
                if (response) {
                    // Handle your data here
                    return response;
                }
            },
            error: function(xhr, status, error) {
                console.log('AJAX error:', xhr.responseText, status, error);
            }
        });
    })(jQuery);
}

function fadeOutEffect(horoscope) {

    var target = horoscope + '_primescreen';

    var fadeTarget = document.getElementById(target);
    var fadeEffect = setInterval(function () {
        
            clearInterval(fadeEffect);

            document.getElementById(horoscope + '_primescreen').style.display = 'none';

            document.getElementById(horoscope + '_secondscreen').style.display = '';
            
        
    }, 20);
}

function reset_horoscope_type1(horoscope){

    if (confirm("Sla eerst uw huidige resultaat op als u deze wilt bewaren. Klik op OK om door te gaan") == true) {
        
        document.getElementById('resultbutton_'+horoscope).href = '';
        
        jQuery('#'+horoscope+'_secondscreen').animate({opacity: 0}, 1000);
        document.getElementById(horoscope+'_secondscreen').style.display = 'none';

        jQuery('#'+horoscope+'_maincontainer').animate({opacity: 1}, 1000);
        document.getElementById(horoscope+'_maincontainer').style.display = '';

        jQuery('#'+horoscope+'_primescreen').animate({opacity: 1}, 1000);
        document.getElementById(horoscope+'_primescreen').style.display = '';                    

        document.getElementById(horoscope+'horoscope_box').style.display = 'none';
        jQuery('#'+horoscope+'horoscope_box').animate({opacity: 0}, 500); 
    }
}

function reset_horoscope_type2(horoscope){

    if (confirm("Sla eerst uw huidige resultaat op als u deze wilt bewaren. Klik op OK om door te gaan") == true) {
        
        document.getElementById('resultbutton_' + horoscope).href = '';

        jQuery('#maincontainer_' + horoscope + 'horoscope').animate({opacity: 1}, 1000);
        document.getElementById('maincontainer_' + horoscope + 'horoscope').style.display = '';

        document.getElementById(horoscope + 'horoscope_box').style.display = 'none';
        jQuery('#'+horoscope+'horoscope_box').animate({opacity: 0}, 500); 
    }
}

function getCityId(cityName) {
    return new Promise((resolve, reject) => {
        jQuery.ajax({
            type: "post",
            url: my_ajax_object.ajax_url,
            data: {
                action: 'getcityid',
                city_name: cityName
            },
            success: function(response) {
                resolve(response.city_id);
            },
            error: function(error) {
                reject(error);
            }
        });
    });
}



