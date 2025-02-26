<?php


function loverelationhoroscope(){

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

    $product_details = get_product_details(3);

    ?>  
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <div class="container mb-5 mt-5" style="width:100%;padding:0" style="display:none" id="supercontainer_loverelationhoroscope" >
            <div class="row" id="maincontainer_loverelationhoroscope">
                <div class="col-md-12 defaulttextcontainer_loverelationhoroscope">
                    <div style="font-size: 35px;" class="heawdersize_loverelationhoroscope theme_color_loverelationhoroscope" id="headtext"><strong><?php echo $product_details['consumer_title']; ?></strong></div>
                    <div id="leadingtext" class="textsize_loverelationhoroscope mt-3 text_color_loverelationhoroscope"><?php echo $product_details['consumer_text1']; ?></div>
                    <div id="leadingtext" class="textsize_loverelationhoroscope mt-3 text_color_loverelationhoroscope"><?php echo $product_details['consumer_text2']; ?></div>
                    <hr style="background-color:black">
                </div>
                <div class="col-md-12" id="primescreen_loverelation">
                    <div class="row">
                        <div class="col-md-12" id="flip_box_loverelation">
                            <div class="textsize_loverelationhoroscope font_relation text_color_loverelationhoroscope">Persoon 1</div>
                            <div class="mt-2">
                                <input class="textsize_loverelationhoroscope" style="width:100%" id="name" type="text" placeholder="Voornaam en achternaam persoon 1">
                            </div>
                            <div class="mt-2">
                                <input type="text" style="width:100%" class="inputclass textsize_loverelationhoroscope" onkeypress="return onlyNumberKey(event)" placeholder="Geboortedag (DD)" name="day" id="day">
                            </div>
                            <div class="mt-2">
                                <input type="text" style="width:100%" class="inputclass textsize_loverelationhoroscope" onkeypress="return onlyNumberKey(event)" placeholder="Geboortemaand (MM)" name="month" id="month">
                            </div>
                            <div class="mt-2">
                                <input type="text" style="width:100%" class="inputclass textsize_loverelationhoroscope" onkeypress="return onlyNumberKey(event)" placeholder="Geboortejaar (YYYY)" name="year" id="year">
                            </div>

                            <div class="mt-2">
                                <div class="row">
                                    <div class="col-6">
                                        <input type="text" style="width:100%" class="inputclass textsize_loverelationhoroscope" onkeypress="return onlyNumberKey(event)" placeholder="Geboorteuur (UU)" name="hour" id="hour">
                                    </div>
                                    <div class="col-6">
                                        <input type="text" style="width:100%" class="inputclass textsize_loverelationhoroscope" onkeypress="return onlyNumberKey(event)" placeholder="Geboorteminuut (MM)" name="minute" id="minute">
                                    </div>
                                </div>
                            </div>

                            <div class="mt-2">
                                <input placeholder="Geboorteland" type="text" style="width:100%" onkeyup="filter_countries()" autocomplete="off" list="country-list" class="inputclass textsize_loverelationhoroscope" name="country" id="country">
                                <ul style="display:none" class="font_relation" id="countrylist"></ul>
                            </div>
                            <div class="mt-2">
                                <input type="text" placeholder="Geboorteplaats" style="width:100%" onkeyup="filter_cities()" autocomplete="off" list="city-list" class="inputclass textsize_loverelationhoroscope" name="city" id="city">
                                <ul style="display:none" class="font_relation" id="citylist"></ul>
                            </div>

                            <div class="mt-2">

                                <hr>

                            </div>
                            <div class="font_relation textsize_loverelationhoroscope text_color_loverelationhoroscope">Persoon 2</div>
                            <div class="mt-2">
                                <input class="textsize_loverelationhoroscope" style="width:100%" id="name2" type="text" placeholder="Voornaam en achternaam persoon 2">
                            </div>
                            <div class="mt-2">
                                <input type="text" style="width:100%" class="inputclass textsize_loverelationhoroscope" onkeypress="return onlyNumberKey(event)" placeholder="Geboortedag (DD)" name="day2" id="day2">
                            </div>
                            <div class="mt-2">
                                <input type="text" style="width:100%" class="inputclass textsize_loverelationhoroscope" onkeypress="return onlyNumberKey(event)" placeholder="Geboortemaand (MM)" name="month2" id="month2">
                            </div>
                            <div class="mt-2">
                                <input type="text" style="width:100%" class="inputclass textsize_loverelationhoroscope" onkeypress="return onlyNumberKey(event)" placeholder="Geboortejaar (YYYY)" name="year2" id="year2">
                            </div>

                            <div class="mt-2">
                                <div class="row">
                                    <div class="col-6">
                                        <input type="text" style="width:100%" class="inputclass textsize_loverelationhoroscope" onkeypress="return onlyNumberKey(event)" placeholder="Geboorteuur (UU)" name="hour2" id="hour2">
                                    </div>
                                    <div class="col-6">
                                        <input type="text" style="width:100%" class="inputclass textsize_loverelationhoroscope" onkeypress="return onlyNumberKey(event)" placeholder="Geboorteminuut (MM)" name="minute2" id="minute2">
                                    </div>
                                </div>
                            </div>

                            <div class="mt-2">

                                <input placeholder="Geboorteland" type="text" style="width:100%" onkeyup="filter_countries2()" autocomplete="off" list="country-list" class="inputclass textsize_loverelationhoroscope" name="country2" id="country2">
                                <ul class="font_relation" style="display:none;margin:0!important;padding:0!important" id="countrylist2"></ul>

                            </div>
                            <div class="mt-2">

                                <input type="text" placeholder="Geboorteplaats" style="width:100%" onkeyup="filter_cities2()" autocomplete="off" list="city-list" class="inputclass textsize_loverelationhoroscope" name="city2" id="city2">
                                <ul class="font_relation" style="display:none;margin:0!important;padding:0!important" id="citylist2"></ul>

                            </div>

                            <div class="row mt-5">
                                <div class="col-md-12">
                                    <button class="btn textsize_loverelationhoroscope" id="payment-button_loverelationhoroscope" style="color:white!important;width:100%;background-color:<?php echo esc_html($theme_color); ?>">RELATIEHOROSCOOP BEKIJKEN</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

            <div id="loverelation_loader" style="display:none;text-align:center;width:100%" class="row">
                <div>
                    <img style="width:50%;height:auto" src="<?php echo plugins_url( '../images/spinner.gif', __FILE__ ); ?>" alt="">
                    <div class="mt-2 text_color_loverelationhoroscope">Een moment geduld alstublieft</div>
                </div>
            </div>

            <div id="loverelationhoroscope_box" style="max-height:900px;overflow-y:auto;display:none;border-radius:10px" class="row">
                <div style="border-radius:10px;">
                    <div class="theme_color_loverelationhoroscope text-center headersize_loverelationhoroscope mt-2" style="font-size:25px;!important">Je relatiehoroschoop is klaar</div>
                    <div class="col-md-6 offset-4 textsize_loverelationhoroscope text_color_loverelationhoroscope mt-3">Bekijk uw resultaat via onderstaande knop:</div>
                    <div class="row">
                        <div class="col-md-10 text-end mt-4">
                            <button id="resultbutton_loverelationhoroscope" class="textsize_loverelationhoroscope font btn btn-outline text_color_loverelationhoroscope" style="width:80%;">
                                <span class="textsize_loverelationhoroscope" style="color:white!important;">BEKIJK DE RELATIEHOROSCOOP</span>
                            </button>
                        </div> 
                        <div class="col-md-2 mt-4">
                            <button type="button" onclick="location.reload();" id="resultbutton_loverelation" class="btn btn-outline-dark" style="width:50%">
                            <span class="textsize_loverelationhoroscope"><i class="fa-solid fa-rotate-right fa2x"></i></span>
                            </button>
                        </div>                    
                    </div>
                </div>
            </div>
        </div>

        <script>

        jQuery(document).ready(function() {

            window.token = '<?php echo esc_js(esc_html($token)); ?>';
            window.email = '<?php echo esc_js(esc_html($email)); ?>';

            getsettings(
                jQuery, 
                token,
                3, 
                'loverelationhoroscope', 
                'supercontainer_loverelationhoroscope', 
                'relation', 
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

                    countrylist.innerHTML += '<li class="listitem" style="cursor:pointer" onclick="selectcountry(\'' + countries[i] + '\')"><a>' + countries[i] + '</a></li>';
                }

                var countrylist = document.getElementById('countrylist2');

                for(i=0;i<countries.length;i++){

                    countrylist.innerHTML += '<li class="listitem" style="cursor:pointer" onclick="selectcountry2(\'' + countries[i] + '\')"><a>' + countries[i] + '</a></li>';
                }
            }

        });

        function filter_countries() {
            
            // Declare variables
            var input, filter, ul, li, a, i, txtValue;
            input = document.getElementById('country');
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

        function filter_countries2() {
            // Declare variables
            var input, filter, ul, li, a, i, txtValue;
            input = document.getElementById('country2');
            filter = input.value.toUpperCase();
            ul = document.getElementById("countrylist2");
            li = ul.getElementsByTagName('li');

            if(input.value.length > 0){
                document.getElementById('countrylist2').style.display = '';
            }else{
                document.getElementById('countrylist2').style.display = 'none';
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

        function selectcountry(country){

            document.getElementById('country').value = country;
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

                    var citylist = document.getElementById('citylist');

                    var html = '';

                    for(i=0;i<jsonString.length;i++){

                        html += '<li style="cursor:pointer" class="cityclass" onclick="selectcity(\'' + jsonString[i].city_name + '\')"><a>' + jsonString[i].city_name + '</a></li>';
                    }
                    citylist.innerHTML = html
                }

            });
        }

        function selectcountry2(country){

            document.getElementById('country2').value = country;
            document.getElementById('countrylist2').style.display = 'none';

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

                    var citylist = document.getElementById('citylist2');

                    var html = '';

                    for(i=0;i<jsonString.length;i++){

                        html += '<li style="cursor:pointer" class="cityclass2" onclick="selectcity2(\'' + jsonString[i].city_name + '\')"><a>' + jsonString[i].city_name + '</a></li>';
                    }
                    citylist.innerHTML = html
                }

            });
        }

        function filter_cities() {

            var ul = document.getElementById("citylist");
            var li = ul.getElementsByClassName('cityclass');
            var input = document.getElementById('city');
            // Declare variables
            var filter, a, i, txtValue;
            
            filter = input.value.toUpperCase();

            if(input.value.length > 0){
                document.getElementById('citylist').style.display = '';
            }else{
                document.getElementById('citylist').style.display = 'none';
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

        function filter_cities2() {

            var ul = document.getElementById("citylist2");
            var li = ul.getElementsByClassName('cityclass2');
            var input = document.getElementById('city2');
            // Declare variables
            var filter, a, i, txtValue;

            filter = input.value.toUpperCase();

            if(input.value.length > 0){
                document.getElementById('citylist2').style.display = '';
            }else{
                document.getElementById('citylist2').style.display = 'none';
            }

            // Loop through all list items, and hide those who don't match the search query
            for (i = 0; i < li.length; i++) {
                a = li[i].getElementsByTagName("a")[0];
                //a = document.getElementsByClassname('cityclass')[0];
                txtValue = a.textContent || a.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
                } else {
                li[i].style.display = "none";
                }
            }
        }

        function selectcity(city){

            document.getElementById('city').value = city;
            document.getElementById('citylist').style.display = 'none';
        }

        function selectcity2(city){

            document.getElementById('city2').value = city;
            document.getElementById('citylist2').style.display = 'none';
        }

        jQuery("#payment-button_loverelationhoroscope").click(function() {

            // Open the payment gateway in a new window

            var name = document.getElementById('name').value;
            var day = document.getElementById('day').value;
            var month = document.getElementById('month').value;
            var year = document.getElementById('year').value;
            var hour = document.getElementById('hour').value;
            var minute = document.getElementById('minute').value;
            var country = document.getElementById('country').value;
            var city = document.getElementById('city').value;

            var name2 = document.getElementById('name2').value;
            var day2 = document.getElementById('day2').value;
            var month2 = document.getElementById('month2').value;
            var year2 = document.getElementById('year2').value;
            var hour2 = document.getElementById('hour2').value;
            var minute2 = document.getElementById('minute2').value;
            var country2 = document.getElementById('country2').value;
            var city2 = document.getElementById('city2').value;

            if(day < 1 || day > 31){
                alert('De dag is niet goed ingevuld van persoon 1, vul een getal in tussen de 1 en 31');
                return false;
            }
            if(month < 1 || month > 12){
                alert('De maand is niet goed ingevuld van persoon 1, vul een getal in tussen de 1 en 12');
                return false;
            }
            if(year < 1900 || year > 2023){
                alert('Het jaartal is niet goed ingevuld van persoon 1, vul een getal in tussen de 1900 en 2023');
                return false;
            }
            if(minute < 0 || minute > 59){
                alert('De minuten zijn niet goed ingevuld van persoon 1, vul een getal in tussen de 0 en 59');
                return false;
            }
            if(hour < 0 || hour > 23){
                alert('De uren zijn niet goed ingevuld van persoon 1, vul een getal in tussen de 0 en 23');
                return false;
            }

            if(day2 < 1 || day2 > 31){
                alert('De dag is niet goed ingevuld van persoon 2, vul een getal in tussen de 1 en 31');
                return false;
            }
            if(month2 < 1 || month2 > 12){
                alert('De maand is niet goed ingevuld van persoon 2, vul een getal in tussen de 1 en 12');
                return false;
            }
            if(year2 < 1900 || year2 > 2023){
                alert('Het jaartal is niet goed ingevuld van persoon 2, vul een getal in tussen de 1900 en 2023');
                return false;
            }
            if(minute2 < 0 || minute2 > 59){
                alert('De minuten zijn niet goed ingevuld van persoon 2, vul een getal in tussen de 0 en 59');
                return false;
            }
            if(hour2 < 0 || hour2 > 23){
                alert('De uren zijn niet goed ingevuld van persoon 2, vul een getal in tussen de 0 en 23');
                return false;
            }

            var host = window.location.href;

            if(name2 != '' && day2 != '' && month2 != '' && year2 != '' && hour2 != '' && minute2 != '' && country2 != '' && city2 != '' && name != '' && day != '' && month != '' && year != '' && hour != '' && minute != '' && country != '' && city != ''){

                // Call the server to get the payment URL
                myService().getUrl().then(function(url) {
                    
                    getCityId(city).then(cityId => {

                        const values1 = [
                            name, day, month, year, hour, minute, country, city,cityId
                        ];

                        getCityId(city2).then(cityId2 => {

                            const values2 = [
                                name2, day2, month2, year2, hour2, minute2, country2, city2, cityId2
                            ];

                            const attribute = values1.join(',') + ',' + values2.join(',');

                            // Open the payment gateway in a new window
                            //var popupWindow = window.open('', '_blank', 'width=800,height=600');
                            var paymentWindow = window.open('', '_blank');

                            var host = window.location.href;
                            var returlurl = 'https://astromedia-business.nl/return?t=' + token + '&attr=' + attribute + '&host=' + host + '&pid=' + 3;

                            jQuery.ajax({
                                type: "post",
                                crossDomain: true,
                                data: {
                                    email: email,
                                    token: token,
                                    host: host,
                                    attribute: attribute,
                                    returlurl: returlurl,
                                    id: 3,
                                },
                                url: 'https://astromedia-business.nl/startpayment',
                                success: function(response){
                                    if(response.slice(0,6) == '000000'){
                                        // Set the URL of the popup window after the response is received
                                        paymentWindow.location.href = response.split('|')[1];

                                    } else {
                                        alert('Er is iets mis gegaan, excuses');
                                    }
                                }
                            });
                        });
                    });
                });

            }else{

                alert('Niet alle gegevens zijn ingevuld');
            }
        });

        function reset_horoscope(){

            jQuery('#maincontainer_loverelationhoroscope').show();
            jQuery('#primescreen_loverelation').show();
            jQuery('#loverelationhoroscope_box').hide();
        }

        // Click event handler for the button
        jQuery("#resultbutton_loverelationhoroscope").on('click', function() {
            var newWindow = window.open();
            if (newWindow && responseContent) {
                // Write the stored response HTML to the new window
                newWindow.document.write(responseContent);
            } else {
                // Handle the case where the new window couldn't be opened or responseContent is empty
                alert("Unable to open a new window or no content available.");
            }
        });

        function onlyNumberKey(evt) {
              
            // Only ASCII character in that range allowed
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                return false;
            return true;
        }

        </script>

    <?php

    // return the buffer contents and delete
    return ob_get_clean();
}
add_shortcode('astro_loverelation_horoscope', 'loverelationhoroscope');

?>