<?php


function lovetesthoroscope(){
    
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

    $product_details = get_product_details(22);

    ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <div class="container mb-5 mt-5" style="width:100%;padding:0" style="display:none" id="supercontainer_lovetesthoroscope" >
            <div class="row" id="maincontainer_lovetesthoroscope">
                <div class="col-md-12 defaulttextcontainer_lovetesthoroscope">
                    <div style="font-size: 35px;line-height:40px;" class="headersize_lovetesthoroscope theme_color_lovetesthoroscope" id="headtext"><strong><?php echo $product_details['consumer_title']; ?></strong></div>

                    <div id="leadingtext" class="textsize_lovetesthoroscope text_color_lovetesthoroscope font_lovetest mt-3 "><?php echo $product_details['consumer_text1']; ?></div>
                    <div id="leadingtext" class="textsize_lovetesthoroscope text_color_lovetesthoroscope font_lovetest mt-3 "><?php echo $product_details['consumer_text2']; ?></div>
                    <hr style="background-color:black">
                </div>
                <div class="col-md-12" id="primescreen_lovetesthoroscope">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mt-2">
                                <input class="form-control font_lovetest textsize_lovetesthoroscope" style="width:100%" id="name_lovetest" type="text" placeholder="Je voor- en achternaam">
                            </div>

                            <div class="mt-2">
                                <input type="text" style="width:100%" class=" textsize_lovetesthoroscope" onkeypress="return onlyNumberKey(event)" placeholder="Geboortedag (DD)" name="day" id="day_lovetest">
                            </div>
                            <div class="mt-2">
                                <input type="text" style="width:100%" class=" textsize_lovetesthoroscope" onkeypress="return onlyNumberKey(event)" placeholder="Geboortemaand (MM)" name="month" id="month_lovetest">
                            </div>
                            <div class="mt-2">
                                <input type="text" style="width:100%" class=" textsize_lovetesthoroscope" onkeypress="return onlyNumberKey(event)" placeholder="Geboortejaar (YYYY)" name="year" id="year_lovetest">
                            </div>

                            <div class="mt-2">
                                <div class="row">
                                    <div class="col-6">
                                        <input type="text" style="width:100%" class=" textsize_lovetesthoroscope" onkeypress="return onlyNumberKey(event)" placeholder="Geboorteuur (UU)" name="hour" id="hour_lovetest">
                                    </div>
                                    <div class="col-6">
                                        <input type="text" style="width:100%" class=" textsize_lovetesthoroscope" onkeypress="return onlyNumberKey(event)" placeholder="Geboorteminuut (MM)" name="minute" id="minute_lovetest">
                                    </div>
                                </div>
                            </div>

                            <div class="mt-2">

                                <input placeholder="Uw geboorteland" type="text" style="width:100%" onkeyup="filter_countries_lovetest()" autocomplete="off" list="country-list" class="textsize_lovetesthoroscope " name="country" id="country_lovetest">
                                <ul class="" style="display:none" id="countrylist"></ul>

                            </div>
                            <div class="mt-2">

                                <input type="text" placeholder="Uw geboorteplaats" style="width:100%" onkeyup="filter_cities_lovetest()" autocomplete="off" list="city-list" class="textsize_lovetesthoroscope " name="city" id="city_lovetest">
                                <ul class="" style="display:none" id="citylist_lovetest"></ul>

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
                                    <button class="btn housebutton textsize_lovetesthoroscope" id="payment-button_lovetesthoroscope" style="color:white!important;width:100%;letter-spacing: 0px">LIEFDESTESTHOROSCOOP BEKIJKEN</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

            <div id="lovetest_loader" style="display:none;text-align:center;width:100%" class="row">
                <div>
                    <img style="width:50%;height:auto" src="<?php echo plugins_url( '../../images/spinner.gif', __FILE__ ); ?>" alt="">
                    <div class="mt-2 text_color_lovetesthoroscope">Een moment geduld alstublieft</div>
                </div>
            </div>

            <div id="lovetesthoroscope_box" style="max-height:900px;overflow-y:auto;display:none;border-radius:10px" class="row">
                <div style="border-radius:10px;">
                    <div class="theme_color_lovetesthoroscope text-center headersize_lovetesthoroscope mt-2" style="font-size:25px;!important">Je liefdestest is klaar</div>
                    <div class="col-md-6 offset-4 textsize_lovetesthoroscope  mt-3">Bekijk uw resultaat via onderstaande knop:</div>
                    <div class="row">
                        <div class="col-md-10 text-end mt-4">
                            <button id="resultbutton_lovetesthoroscope" class="textsize_lovetesthoroscope font btn btn-outline " style="width:80%;">
                                <span class="textsize_lovetesthoroscope" style="color:white!important;">BEKIJK DE LIEFDESTEST</span>
                            </button>
                        </div> 
                        <div class="col-md-2 mt-4">
                            <button type="button" onclick="location.reload();" class="btn btn-outline-dark" style="width:50%">
                            <span class="textsize_lovetesthoroscope"><i class="fa-solid fa-rotate-right fa2x"></i></span>
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
                22, 
                'lovetesthoroscope', 
                'supercontainer_lovetesthoroscope', 
                'lovetest', 
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

                var countrylist = document.getElementById('countrylist');

                for(i=0;i<countries.length;i++){

                    countrylist.innerHTML += '<li style="cursor:pointer" onclick="selectcountry_lovetest(\'' + countries[i] + '\')"><a>' + countries[i] + '</a></li>';
                }
            }

        });

        function filter_countries_lovetest() {
            // Declare variables
            var input, filter, ul, li, a, i, txtValue;
            input = document.getElementById('country_lovetest');
            filter = input.value.toUpperCase();
            ul = document.getElementById("countrylist");
            li = ul.getElementsByTagName('li');

            if(input.value.length > 0){
                document.getElementById('countrylist').style.display = '';
            }else{
                document.getElementById('countrylist').style.display = 'none';
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

        function selectcountry_lovetest(country){

            document.getElementById('country_lovetest').value = country;
            document.getElementById('countrylist').style.display = 'none';

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

                    var citylist_lovetest = document.getElementById('citylist_lovetest');

                    var html = '';

                    for(i=0;i<jsonString.length;i++){

                        html += '<li style="cursor:pointer" class="cityclass" onclick="selectcity_lovetest(\'' + jsonString[i].city_name + '\')"><a>' + jsonString[i].city_name + '</a></li>';
                    }
                    citylist_lovetest.innerHTML = html
                }

            });
        }

        function filter_cities_lovetest() {

            var ul = document.getElementById("citylist_lovetest");
            var li = ul.getElementsByClassName('cityclass');
            var input = document.getElementById('city_lovetest');

            // Declare variables
            var filter, a, i, txtValue;
            
            filter = input.value.toUpperCase();
            

            if(input.value.length > 0){
                document.getElementById('citylist_lovetest').style.display = '';
            }else{
                document.getElementById('citylist_lovetest').style.display = 'none';
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

        function selectcity_lovetest(city){

            document.getElementById('city_lovetest').value = city;
            document.getElementById('citylist_lovetest').style.display = 'none';
        }

        jQuery("#payment-button_lovetesthoroscope").click(function() {

            // Call the server to get the payment URL
            myService().getUrl().then(function(url) {

                var name = document.getElementById('name_lovetest').value;
                var day = document.getElementById('day_lovetest').value;
                var month = document.getElementById('month_lovetest').value;
                var year = document.getElementById('year_lovetest').value;
                var minute = document.getElementById('minute_lovetest').value;
                var hour = document.getElementById('hour_lovetest').value;
                var country = document.getElementById('country_lovetest').value;
                var city = document.getElementById('city_lovetest').value;
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
                        console.log(cityId)
                        var attribute = Object.values(parameters).join(',');

                        var host = window.location.href;
                        var returlurl = 'https://astromedia-business.nl/return?t=' + token + '&attr=' + attribute + '&host=' + host + '&pid=' + 22;

                        jQuery.ajax({
                            type: "post",
                            crossDomain: true,
                            data: {
                                email: email,
                                token: token,
                                host: host,
                                attribute: attribute,
                                returlurl: returlurl,
                                id: 22,
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

        // Click event handler for the button
        jQuery("#resultbutton_lovetesthoroscope").on('click', function() {
            var newWindow = window.open();
            if (newWindow && responseContent) {
                // Write the stored response HTML to the new window
                newWindow.document.write(responseContent);
            } else {
                // Handle the case where the new window couldn't be opened or responseContent is empty
                alert("Unable to open a new window or no content available.");
            }
        });

        function reset_horoscope(){

            jQuery('#maincontainer_lovetesthoroscope').show();
            jQuery('#lovetesthoroscope_box').hide();
        }

        </script>

    <?php

    // return the buffer contents and delete
    return ob_get_clean();
}
add_shortcode('astro_lovetest_horoscope', 'lovetesthoroscope');

?>