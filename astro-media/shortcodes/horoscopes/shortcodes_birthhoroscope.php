<?php


function birthhoroscope(){
    
    require_once(dirname(__FILE__) . '/../../midone.php');

    ob_start();

    global $wpdb;  

    $table_name = $wpdb->prefix . 'astromedia';

    $token = $wpdb->get_results("SELECT token FROM $table_name WHERE id='1'");
    $token = $token[0]->token;

    $email = $wpdb->get_results("SELECT email FROM $table_name WHERE id='1'");
    $email = $email[0]->email;

    ////

    //get the cities
    $city_table = $wpdb->prefix . 'astrocities';
    $cities = $wpdb->get_results("SELECT * FROM $city_table");

    $product_details = get_product_details(68);

    ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <div class="container mb-5 mt-5" style="width:100%;padding:0" style="display:none" id="supercontainer_birthhoroscope" >
            <div class="row" id="maincontainer_birthhoroscope">
                <div class="col-md-12 defaulttextcontainer_birthhoroscope">
                    <div style="font-size: 35px;" class="headersize_birthhoroscope theme_color_birthhoroscope" id="headtext"><strong><?php echo $product_details['consumer_title']; ?></strong></div>
                    </div>
                    <div id="leadingtext" class="textsize_birthhoroscope font_birth mt-3 text_color_birthhoroscope"><?php echo $product_details['consumer_text1']; ?></div>
                    <div id="leadingtext" class="textsize_birthhoroscope font_birth mt-3 text_color_birthhoroscope"><?php echo $product_details['consumer_text2']; ?></div>
                    <hr style="background-color:black">
                </div>
                <div class="col-md-12" id="primescreen_birthhoroscope">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mt-2">
                                <input class="form-control font_birth textsize_birthhoroscope" style="width:100%" id="name_birth" type="text" placeholder="Je voor- en achternaam">
                            </div>

                            <div class="mt-2">
                                <input type="text" style="width:100%" class="form-control textsize_birthhoroscope" onkeypress="return onlyNumberKey(event)" placeholder="Geboortedag (DD)" name="day" id="day_birth">
                            </div>
                            <div class="mt-2">
                                <input type="text" style="width:100%" class="form-control textsize_birthhoroscope" onkeypress="return onlyNumberKey(event)" placeholder="Geboortemaand (MM)" name="month" id="month_birth">
                            </div>
                            <div class="mt-2">
                                <input type="text" style="width:100%" class="form-control textsize_birthhoroscope" onkeypress="return onlyNumberKey(event)" placeholder="Geboortejaar (YYYY)" name="year" id="year_birth">
                            </div>

                            <div class="mt-2">
                                <div class="row">
                                    <div class="col-6">
                                        <input type="text" style="width:100%" class="form-control textsize_birthhoroscope" onkeypress="return onlyNumberKey(event)" placeholder="Geboorteuur (UU)" name="hour" id="hour_birth">
                                    </div>
                                    <div class="col-6">
                                        <input type="text" style="width:100%" class="form-control textsize_birthhoroscope" onkeypress="return onlyNumberKey(event)" placeholder="Geboorteminuut (MM)" name="minute" id="minute_birth">
                                    </div>
                                </div>
                            </div>

                            <div class="mt-2">

                                <input placeholder="Uw geboorteland" type="text" style="width:100%" onkeyup="filter_countries_birth()" autocomplete="off" list="country-list" class="textsize_birthhoroscope form-control" name="country" id="country_birth">
                                <ul class="form-control" style="display:none" id="countrylist_birth"></ul>

                            </div>
                            <div class="mt-2">

                                <input type="text" placeholder="Uw geboorteplaats" style="width:100%" onkeyup="filter_cities_birth()" autocomplete="off" list="city-list" class="textsize_birthhoroscope form-control" name="city" id="city_birth">
                                <ul class="form-control" style="display:none" id="citylist_birth"></ul>

                                <div class="row">
                                    <div class="col-4">
                                        <div style="display:none;" id="cityspinner" class="mt-2 spinner-border text-primary" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-md-12">
                                    <button class="btn housebutton textsize_birthhoroscope" id="payment-button_birthhoroscope" style="color:white!important;width:100%;letter-spacing: 0px">GEBOORTEHOROSCOOP BEKIJKEN</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

            <div id="birth_loader" style="display:none;text-align:center;width:100%" class="row">
                <div>
                    <img style="width:50%;height:auto" src="<?php echo plugins_url( '../../images/spinner.gif', __FILE__ ); ?>" alt="">
                    <div style="color:white" class="mt-2 text_color_birthhoroscope">Een moment geduld alstublieft</div>
                </div>
            </div>

            <div id="birthhoroscope_box" style="max-height:900px;overflow-y:auto;display:none;border-radius:10px" class="row">
                <div style="border-radius:10px;">
                    <div class="theme_color_birthhoroscope text-center headersize_birthhoroscope mt-2" style="font-size:25px;!important">Je geboortehoroschoop is klaar</div>
                    <div class="col-md-6 offset-4 textsize_birthhoroscope text_color_birthhoroscope mt-3">Bekijk uw resultaat via onderstaande knop:</div>
                    <div class="row">
                        <div class="col-md-10 text-end mt-4">
                            <button id="resultbutton_birthhoroscope" class="textsize_birthhoroscope font btn btn-info " style="width:80%;">
                                <span class="textsize_birthhoroscope" style="color:white!important;">BEKIJK DE GEBOORTEHOROSCOOP</span>
                            </button>
                        </div> 
                        <div class="col-md-2 mt-4">
                            <button type="button" onclick="location.reload();" class="btn btn-outline-dark" style="width:50%">
                            <span class="textsize_birthhoroscope"><i class="fa-solid fa-rotate-right fa2x"></i></span>
                            </button>
                        </div>                    
                    </div>
                </div>
            </div>
        </div>
      
        <script>

        jQuery(document).ready(function() {

            var token = '<?php echo esc_js(esc_html($token)); ?>';

            getsettings(
                jQuery, 
                token,
                68, 
                'birthhoroscope', 
                'supercontainer_birthhoroscope', 
                'birth', 
            );
        });

        // AJAX call to retrieve countries and cities
        jQuery.ajax({
            type: 'POST',
            url: my_ajax_object.ajax_url,
            data: {
                action: 'get_countries_and_cities'
            },
            success: function(response) {

                responsearray = response;

                var country_array = [];
                
                var jsonString = JSON.parse(response);

                for(i=0;i<jsonString.length;i++){

                    country_array.push(jsonString[i].country_name)
                }

                var countries = _.uniq(country_array);

                var countrylist_birth = document.getElementById('countrylist_birth');

                for(i=0;i<countries.length;i++){

                    countrylist_birth.innerHTML += '<li style="cursor:pointer" onclick="selectcountry_birth(\'' + countries[i] + '\')"><a>' + countries[i] + '</a></li>';
                }
            }

        });

        function filter_countries_birth() {
            // Declare variables
            var input, filter, ul, li, a, i, txtValue;
            input = document.getElementById('country_birth');
            filter = input.value.toUpperCase();
            ul = document.getElementById("countrylist_birth");
            li = ul.getElementsByTagName('li');

            if(input.value.length > 0){
                document.getElementById('countrylist_birth').style.display = '';
            }else{
                document.getElementById('countrylist_birth').style.display = 'none';
            }

            // Loop through all list items, and hide those who don't match the search query
            for (i = 0; i < li.length; i++) {
                a = li[i].getElementsByTagName("a")[0];
                txtValue = a.textContent || a.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
                } else {
                li[i].style.display = "none";
                }
            }
        }

        function selectcountry_birth(country){

            document.getElementById('country_birth').value = country;
            document.getElementById('countrylist_birth').style.display = 'none';

            jQuery.ajax({
                type: 'POST',
                url: my_ajax_object.ajax_url,
                data: {
                    action: 'get_cities',
                    data: country,
                },
                success: function(response) {

                    var cities_array = [];
                    
                    var jsonString = JSON.parse(response);

                    var citylist_birth = document.getElementById('citylist_birth');

                    var html = '';

                    for(i=0;i<jsonString.length;i++){

                        html += '<li style="cursor:pointer" class="cityclass" onclick="selectcity_birth(\'' + jsonString[i].city_name + '\')"><a>' + jsonString[i].city_name + '</a></li>';
                    }
                    citylist_birth.innerHTML = html
                }

            });
        }

        function filter_cities_birth() {

            var ul = document.getElementById("citylist_birth");
            var li = ul.getElementsByClassName('cityclass');
            var input = document.getElementById('city_birth');

            // Declare variables
            var filter, a, i, txtValue;
            
            filter = input.value.toUpperCase();
            

            if(input.value.length > 0){
                document.getElementById('citylist_birth').style.display = '';
            }else{
                document.getElementById('citylist_birth').style.display = 'none';
            }

            // Loop through all list items, and hide those who don't match the search query
            for (i = 0; i < li.length; i++) {
                a = li[i].getElementsByTagName("a")[0];
                txtValue = a.textContent || a.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
                } else {
                li[i].style.display = "none";
                }
            }
        }

        function selectcity_birth(city){

            document.getElementById('city_birth').value = city;
            document.getElementById('citylist_birth').style.display = 'none';
        }

        jQuery("#payment-button_birthhoroscope").click(function() {

            // Call the server to get the payment URL
            myService().getUrl().then(function(url) {

                var attribute = jQuery('#strong_second').html();
                var name = document.getElementById('name_birth').value;
                var day = document.getElementById('day_birth').value;
                var month = document.getElementById('month_birth').value;
                var year = document.getElementById('year_birth').value;
                var minute = document.getElementById('minute_birth').value;
                var hour = document.getElementById('hour_birth').value;
                var country = document.getElementById('country_birth').value;
                var city = document.getElementById('city_birth').value;
                var host = window.location.href;

                if(day < 1 || day > 31){
                    //alert('De dag is niet goed ingevuld, vul een getal in tussen de 1 en 31');
					alert('Vul alle velden correct in alstublieft');
                    return false;
                }
                if(month < 1 || month > 12){
                    //alert('De maand is niet goed ingevuld, vul een getal in tussen de 1 en 12');
					alert('Vul alle velden correct in alstublieft');
                    return false;
                }
                if(year < 1900 || year > 2023){
                    //alert('Het jaartal is niet goed ingevuld, vul een getal in tussen de 1900 en 2023');
					alert('Vul alle velden correct in alstublieft');
                    return false;
                }
                if(minute < 0 || minute > 59){
                    //alert('De minuten zijn niet goed ingevuld, vul een getal in tussen de 0 en 59');
					alert('Vul alle velden correct in alstublieft');
                    return false;
                }
                if(hour < 0 || hour > 23){
                    //alert('De uren zijn niet goed ingevuld, vul een getal in tussen de 0 en 23');
					alert('Vul alle velden correct in alstublieft');
                    return false;
                }

                // Open the payment gateway in a new window
                //var popupWindow = window.open('', '_blank', 'width=800,height=600');
                var paymentWindow = window.open('', '_blank');

                if(name != '' && day != '' && month != '' && year != '' && hour != '' && minute != '' && country != '' && city != ''){

                    getCityId(city).then(cityId => {

                        var token = '<?php echo esc_js(esc_html($token)); ?>';
                        var email = '<?php echo esc_js(esc_html($email)); ?>';

                        var parameters = {
                            'hs_name': name,
                            'hs_day': day,
                            'hs_month': month,
                            'hs_year': year,
                            'hs_hours': hour,
                            'hs_minutes': minute,
                            'hs_country': country,
                            'hs_city': city,
                            'hs_city_id': cityId
                        };

                        var attribute = Object.values(parameters).join(',');

                        var host = window.location.href;
                        var returlurl = 'https://astromedia-business.nl/return?t=' + token + '&attr=' + attribute + '&host=' + host + '&pid=' + 68;

                        jQuery.ajax({
                            type: "post",
                            crossDomain: true,
                            data: {
                                email: email,
                                token: token,
                                host: host,
                                attribute: attribute,
                                returlurl: returlurl,
                                id: 68,
                            },
                            url: "https://astromedia-business.nl/startpayment",
                            success: function(response){
                                if(response.slice(0,6) == '000000'){
    
                                    // Set the URL of the popup window after the response is received
                                    paymentWindow.location.href = response.split('|')[1];
                                    
                                } else {
                                    alert('Er is iets mis gegaan, excuses');
                                }
                            }
                        });

                    }).catch(error => {
                        console.error("Error fetching city ID:", error);
                    });

                }else{

                    alert('Niet alle gegevens zijn ingevuld');
                }
            });
        });

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

        function reset_horoscope(){

            jQuery('#supercontainer_birthhoroscope').show();
            jQuery('#birthhoroscope_box').hide();
        }

        </script>

    <?php

    // return the buffer contents and delete
    return ob_get_clean();
}
add_shortcode('astro_birth_horoscope', 'birthhoroscope');

?>