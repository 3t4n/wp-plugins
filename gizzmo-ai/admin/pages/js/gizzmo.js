//new gizzmo 2.0 code===========================
const baseURL = 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app';

// on page load, check if the property is connected to gizzmo, if not, get the property and account data
function get_domain_account_data(domain) {
    return new Promise((resolve, reject) => {
        const data_json = {
            "domain": domain
        };
        console.log(JSON.stringify(data_json));
        const xhttp = new XMLHttpRequest();
        xhttp.open("POST", `${baseURL}/g_get_domain_data`, true);
        xhttp.setRequestHeader("Content-Type", "application/json");
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4) {
                if (this.status == 200) {
                    const response = this.responseText;
                    const response_json = JSON.parse(response);
                    const status = response_json['status'];
                    const data = response_json['data'];
                    
                    if (status == 'success') {
                        resolve(data);
                    } else {
                        reject("error");
                    }
                } else {
                    reject("HTTP error: " + this.status);
                }
            }
        };
        xhttp.send(JSON.stringify(data_json));
    });
}


jQuery(document).ready(function($) {
    var currentURL = window.location.href;
    var domain = extractDomainWithProtocolAndWWW(currentURL);
    
    get_domain_account_data(domain)
      .then(property_account_data => {
          console.log(property_account_data);
          // Do something with property_account_data here
          var completed_onboarding = property_account_data.properties.completed_onboarding;

          get_website_data();

          //if (completed_onboarding == "False") {
              // show the onboarding modal
          //    $('#backdrop').show();
          //    $('#onboarding_modal').show();
          //} else {
              // load the gizzmo main page
          //    get_website_data();
          //}

      })
      .catch(error => {
          console.error(error);
      });
});
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  //old codes===========================
  
  
  
  
  
  
  var progress_interval = null; 
  var timer_started = false;
  var ooc = false;



  //this function will be called every 10 seconds, to get the list of products that have changed in status and are in progress
  function check_for_products_updates_scaduale() {
    
    //check if the website id is in the local storage
    var gizzmo_website_settings = localStorage.getItem('gizzmo_website_settings');
    if (gizzmo_website_settings == null)
    {
      //if not, get it from the url
    }
    else
    {
      var website_id = JSON.parse(gizzmo_website_settings).website_id;
      //console.log('check_for_products_updates_scaduale ' + website_id);




      var identifiers_string = '';
      //check if there are any products in local storage array
      var queued_for_ai_identifiers = localStorage.getItem('queued_for_ai_identifiers');
      if (queued_for_ai_identifiers == null || queued_for_ai_identifiers == '[]')
      {
        //stop the interval
        clearInterval(progress_interval);
        timer_started = false;

      }
      else
      {
        //get the products from the local storage
        var queued_for_ai_identifiers_array = JSON.parse(queued_for_ai_identifiers);
        //convert the array to a string with a - seperator
        identifiers_string = queued_for_ai_identifiers_array.join('-');

        //console.log('identifiers_string ' + identifiers_string);

        if (identifiers_string != '')
        {

          (function ($) {
            //var identifier = $(e).data('identifier');

            $.ajax({
              url: 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/get_website_asins_statusses/' + website_id + "," + identifiers_string,
              type: 'GET',
              success: function (data) {
                if (data.data == "No products found")
                {
                  //console.log('no more progress');
                  //clear the local storage
                  localStorage.setItem('queued_for_ai_identifiers', JSON.stringify([]));

                }
                else
                {
                  if (data.data.length > 0)
                  {
                    for (var i = 0; i < data.data.length; i++) {
                      var identifier = data.data[i].identifier;
                      var identifier_status = data.data[i].status;
                      var identifier_name = data.data[i].name;
                      var identifier_preview_image = data.data[i].preview_image;
                      //console.log(identifier + ' ' + identifier_status);
                      if (identifier_status == "Ready")
                      {
                        var gizzmo_nonce = $("#gizzmo_nonce").val();
                        //this is for the reviews 
                        ready_string = '<button onclick="show_waitingmsg()" id="'+ identifier +'" type="submit" title="Click to generate a review post" name="create_review['+ identifier +']" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90" style="min-width:88px">Review</button>' +
                        '<input type="hidden" name="img_url_' + identifier +'"  value="' + identifier_preview_image +'">'+
                        '<input type="hidden" name="product_name_' + identifier +'"  value="' + identifier_name +'">'+
                        '<input type="hidden" name="websiteid_' + identifier +'"  value="' + website_id +'">' +
                        '<input type="hidden" name="_wpnonce" value="' + gizzmo_nonce + '">';
                        var action_div_html = '<form method="post">' + ready_string + '</form>';
                        
                        var outerDiv = $('#review_products_list');
                        var innerDiv = outerDiv.find("#action_" + identifier);
                        innerDiv.html(action_div_html);


                        //this is for the roundup
                        action_div_html = '<button onclick="add_to_roundup_tab(this)" data-identifier="' + identifier + '" data-type="roundup" data-img="' + identifier_preview_image + '" data-productname="' + identifier_name + '" id="' + identifier + '"  title="Click to add this product to roundup" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90" style="min-width:88px"><span>Add</span></button>';
                        var outerDiv_roundup = $('#roundup_products_list');
                        var innerDiv_roundup = outerDiv_roundup.find("#action_" + identifier);
                        innerDiv_roundup.html(action_div_html);


                        //this is for the general //
                        action_div_html = '<button onclick="add_to_general_tab(this)" data-identifier="' + identifier + '" data-type="general" data-img="' + identifier_preview_image + '" data-productname="' + identifier_name + '" id="' + identifier + '"  title="Click to add this product to general" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90" style="min-width:88px"><span>Add</span></button>';
                        var outerDiv_general = $('#general_products_list');
                        var innerDiv_general = outerDiv_general.find("#action_" + identifier);
                        innerDiv_general.html(action_div_html);

                        //remove the identifier from the local storage
                        var queued_for_ai_identifiers = localStorage.getItem('queued_for_ai_identifiers');
                        var queued_for_ai_identifiers_array = JSON.parse(queued_for_ai_identifiers);
                        var index = queued_for_ai_identifiers_array.indexOf(identifier);
                        if (index > -1) {
                          queued_for_ai_identifiers_array.splice(index, 1);
                        }
                        localStorage.setItem('queued_for_ai_identifiers', JSON.stringify(queued_for_ai_identifiers_array));


                      }
                      else if (identifier_status == "Failed")
                      {
                        //failed_string =  '<div id="action_' + identifier + '">' +
                        //failed_string = '<span title="Data preparation has failed, we are sorry, Gizzmo team will check it out, You can try again or try a different product"   class="nav-link analyze_bt failed" onclick="analyze(this)" data-identifier="' + identifier + '">Failed</span>' + 
                        failed_string = '<button title="Data preparation has failed, we are sorry, Gizzmo team will check it out, You can try again or try a different product" data-websiteid="' + website_id + '" data-identifier="' + identifier + '" onclick="prepare(this)" class="btn bg-warning font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90" style="background-color:#d63638 !important;min-width:88px">Failed</button>' +
                        '<input type="hidden" name="img_url_' + identifier +'"  value="' + identifier_preview_image +'">'+
                        '<input type="hidden" name="product_name_' + identifier +'"  value="' + identifier_name +'">'+
                        '<input type="hidden" name="websiteid_' + identifier +'"  value="' + website_id +'">'
                        //$("#action_" + identifier).html(failed_string);

                        var outerDiv = $('#review_products_list');
                        var innerDiv = outerDiv.find("#action_" + identifier);
                        innerDiv.html(failed_string);


                        //this is for the roundup
                        var outerDiv_roundup = $('#roundup_products_list');
                        var innerDiv_roundup = outerDiv_roundup.find("#action_" + identifier);
                        innerDiv_roundup.html(failed_string);


                        //this is for the general //
                        var outerDiv_general = $('#general_products_list');
                        var innerDiv_general = outerDiv_general.find("#action_" + identifier);
                        innerDiv_general.html(failed_string);





                        //remove the identifier from the local storage
                        var queued_for_ai_identifiers = localStorage.getItem('queued_for_ai_identifiers');
                        var queued_for_ai_identifiers_array = JSON.parse(queued_for_ai_identifiers);
                        var index = queued_for_ai_identifiers_array.indexOf(identifier);
                        if (index > -1) {
                          queued_for_ai_identifiers_array.splice(index, 1);
                        }
                        localStorage.setItem('queued_for_ai_identifiers', JSON.stringify(queued_for_ai_identifiers_array));


                      }
                      else if ( identifier_status == 'in_progress' || identifier_status == 'In_Progress')
                      {	

                        var in_progress_html = '<img src="images/loading.gif" style="position: absolute;width: 16px;margin-top: 1px;"><span  class="nav-link status_text" style="margin-left: 20px;" >Preparing AI</span>' +
                        '<input type="hidden" name="img_url_' + identifier +'"  value="' + identifier_preview_image +'">'+
                        '<input type="hidden" name="product_name_' + identifier +'"  value="' + identifier_name +'">'+
                        '<input type="hidden" name="websiteid_' + identifier +'"  value="' + website_id +'">'


                        var outerDiv = $('#review_products_list');
                        var innerDiv = outerDiv.find("#action_" + identifier);
                        innerDiv.html(in_progress_html);


                        //this is for the roundup
                        var outerDiv_roundup = $('#roundup_products_list');
                        var innerDiv_roundup = outerDiv_roundup.find("#action_" + identifier);
                        innerDiv_roundup.html(in_progress_html);


                        //this is for the general //
                        var outerDiv_general = $('#general_products_list');
                        var innerDiv_general = outerDiv_general.find("#action_" + identifier);
                        innerDiv_general.html(in_progress_html);



                        //in_progress_string = '<div id="action_' + identifier + '"><div class="spinner h-7 w-7 animate-spin rounded-full border-[3px] border-primary border-r-transparent dark:border-accent dark:border-r-transparent"></div></div><span  class="nav-link status_text" >Preparing AI Data...</span></div>'
                        //$("#action_" + identifier).html(in_progress_string);
                      }
                    }
                  }
                }
              }
            });

            

          }(jQuery));

        }
      }
    }
  }

  function escapeRegExp(string) {
    return string.replace(/[.*+?^${}()|[\]\\]/g, '\\$&'); // $& means the whole matched string
  }
  function replaceAll(str, find, replace) {
    return str.replace(new RegExp(escapeRegExp(find), 'g'), replace);
  }


  function get_website_data()
  {
    (function ($) {
      //get the plugin version
      var plugin_version = $("#plugin_version").val();
      
      //get the website url
      var website_url = window.location.origin;
      website_url = replaceAll(website_url,'/', '@');


      //make an ajax call to check if the token is valid
      $.ajax({
          url: 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/enter_website_v2/' + website_url+ "," + plugin_version,
          type: 'GET',
          success: function (data) {
              console.log(data);
              if (data.status == 'success')
              {
                  //convert the website settings to json
                  var website_settings = JSON.stringify(data.data);
                  localStorage.setItem('gizzmo_website_settings', website_settings);
                  //localStorage.setItem('gizzmo_token', website_token);

                  //save the time of the last login
                  var current_time = new Date();
                  var current_time_string = current_time.toString();
                  localStorage.setItem('gizzmo_last_login', current_time_string);




                  load_gizzmo_main_page(website_settings);

              }
              else
              {
                  $('#domain_invalid').click();
              }
          }
      });
    }(jQuery));
  }



  function check_bulk_prepare_limit()
  {
    (function ($) {
      //get the package name 
      limit_per_bulk = 10;
      var package_name = $("#top_package_button").html();
      if (package_name == 'Trial')
      { 
        limit_per_bulk = 5;
      }
      else if (package_name == 'Free')
      {
        limit_per_bulk = 1;
      }
      else
      {
        limit_per_bulk = 10;
      }

      var queued_for_ai_identifiers = localStorage.getItem('queued_for_ai_identifiers');
      if (queued_for_ai_identifiers == null)
      {
        return true;
      }
      else
      {
        queued_for_ai_identifiers = JSON.parse(queued_for_ai_identifiers);
        if (queued_for_ai_identifiers.length >= limit_per_bulk)
        {
          return false;
        }
        else
        {
          return true;
        }
      }
    }(jQuery));
  }

 

  function check_prepare_limit_count(identifier)
  {

    (function ($) {

    var limit_per_bulk = 10;
    var package_name = $("#top_package_button").html();
    console.log('package_name: ' + package_name);
    if (package_name == 'Trial')
    { 
      limit_per_bulk = 5;
    }
    else if (package_name == 'Free')
    {
      limit_per_bulk = 1;
    }


    //save this identifier to the local storage as queued for AI
    var queued_for_ai_identifiers = localStorage.getItem('queued_for_ai_identifiers');
    if (queued_for_ai_identifiers == null)
    {
      console.log('empty queued_for_ai_identifier, adding the identifier to the local storage')
      queued_for_ai_identifiers = [];
      queued_for_ai_identifiers.push(identifier);
      localStorage.setItem('queued_for_ai_identifiers', JSON.stringify(queued_for_ai_identifiers));
      
      console.log('queued_for_ai_identifiers: ' + queued_for_ai_identifiers);
      return true;
    }
    else
    {
      console.log('not empty queued_for_ai_identifier')
      queued_for_ai_identifiers = JSON.parse(queued_for_ai_identifiers);

      console.log('queued_for_ai_identifiers: ' + queued_for_ai_identifiers);

      //get the number of identifiers in the array
      var identifiers_inwork_count = queued_for_ai_identifiers.length;
      if (identifiers_inwork_count >= limit_per_bulk)
      {
        if (package_name == 'Trial')
        { 
          alert('Upgrade to Unlock, Only 5 Products at a time, please wait for the current products to finish preparing or upgrade to unlock more products at a time');
        }
        else if (package_name == 'Free')
        {
          alert('Upgrade to Unlock, Only 1 Product at a time, please wait for the current products to finish preparing or upgrade to unlock more products at a time');
        } 
        else
        {
          alert('Only 10 Products at a time, please wait for the current products to finish preparing.');
        }
        console.log('returning false');
        return false;
      }
      else
      {
        if (queued_for_ai_identifiers.includes(identifier) == false)
        {
          queued_for_ai_identifiers.push(identifier);
          localStorage.setItem('queued_for_ai_identifiers', JSON.stringify(queued_for_ai_identifiers));
          console.log('returning true');
          return true;
        }
      }
    }
    
    }(jQuery));

 
  }

  function get_limit_by_package_name(package_name)
  {
    var limit_per_bulk = 30;
    if (package_name == 'Trial')
    {
      limit_per_bulk = 5;
    } 
    else if (package_name == 'Free')
    {
      limit_per_bulk = 10;
    }
    return limit_per_bulk;
  }

  function prepare(clicked_obj)
  {
    (function ($) {
      var website_id = $(clicked_obj).attr('data-websiteid');  
      var identifier = $(clicked_obj).attr('data-identifier');  
      var package_name = $("#top_package_button").html();
      var limit_per_bulk =  get_limit_by_package_name(package_name);
      var is_to_prepare = true;

      var queued_for_ai_identifiers = localStorage.getItem('queued_for_ai_identifiers');
      if (queued_for_ai_identifiers == null)
      {
        queued_for_ai_identifiers = [];
        queued_for_ai_identifiers.push(identifier);
        localStorage.setItem('queued_for_ai_identifiers', JSON.stringify(queued_for_ai_identifiers));
        is_to_prepare = true;
        //console.log('is_to_prepare:' + is_to_prepare);
      }
      else
      {
        queued_for_ai_identifiers = JSON.parse(queued_for_ai_identifiers);
        var identifiers_inwork_count = queued_for_ai_identifiers.length;
        if (identifiers_inwork_count >= limit_per_bulk)
        {
          is_to_prepare = false;
          //console.log('is_to_prepare:' + is_to_prepare);
        }
        else
        {
          if (queued_for_ai_identifiers.includes(identifier) == false)
          {
            queued_for_ai_identifiers.push(identifier);
            localStorage.setItem('queued_for_ai_identifiers', JSON.stringify(queued_for_ai_identifiers));
            is_to_prepare = true;
            //console.log('is_to_prepare:' + is_to_prepare);
          }
        }
      }


      



      //console.log('is_to_prepare: ' + is_to_prepare);

      
 
      if (is_to_prepare == true)
      {
        var current_status = $(clicked_obj).html();
        var status = 'Waiting_For_Analysis';
        if (current_status != 'Prepare')
        {
            status = 'Curated';
        }
        var params = website_id + "," + identifier + "," + status;

        $.ajax({
          url: 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/change_identifier_status/' + params,
          type: 'GET',
          success: function (data) {

            var res_status = data.status;
            //console.log(res_status);
            if (res_status == 'error')
            {
              alert(data.message);
            }
            else
            {
              if (status == 'Curated')
              {
                $('#in_queue_' + identifier).css('display','none');
                $(e).removeClass('queue');
                $(e).html('Prepare');
              }
              else
              {
                
                var que_for_ai_html = '<span  class="nav-link status_text" ><svg style="position: relative;top: 2px;left: -4px;float: left;" fill="#512fb7" height="15px" width="15px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 	 viewBox="0 0 60 60" xml:space="preserve"><g>	<path d="M54,58h-3v-4h-5V43.778c0-2.7-1.342-5.208-3.589-6.706L31.803,30l10.608-7.072C44.658,21.43,46,18.922,46,16.222V6h5V2h3		c0.552,0,1-0.447,1-1s-0.448-1-1-1h-3h-1H10H9H6C5.448,0,5,0.447,5,1s0.448,1,1,1h3v4h5v10.222c0,2.7,1.342,5.208,3.589,6.706		L28.197,30l-10.608,7.072C15.342,38.57,14,41.078,14,43.778V54H9v4H6c-0.552,0-1,0.447-1,1s0.448,1,1,1h3h1h40h1h3		c0.552,0,1-0.447,1-1S54.552,58,54,58z M18.698,21.264C17.009,20.137,16,18.252,16,16.222V6h28v10.222		c0,2.03-1.009,3.915-2.698,5.042L30,28.798L18.698,21.264z M16,43.778c0-2.03,1.009-3.915,2.698-5.042L30,31.202l11.302,7.534		C42.991,39.863,44,41.748,44,43.778V54H16V43.778z"/>	<path d="M20.917,17.936C20.343,17.553,20,16.912,20,16.222V14c0-0.553-0.448-1-1-1s-1,0.447-1,1v2.222		c0,1.361,0.676,2.624,1.808,3.378l4.638,3.092c0.17,0.113,0.363,0.168,0.554,0.168c0.323,0,0.64-0.156,0.833-0.445		c0.306-0.46,0.182-1.08-0.277-1.387L20.917,17.936z"/>	<path d="M40.192,41.26l-4.638-3.092c-0.46-0.307-1.08-0.183-1.387,0.277c-0.306,0.46-0.182,1.08,0.277,1.387l4.638,3.092		C39.657,43.307,40,43.947,40,44.638v2.222c0,0.553,0.448,1,1,1s1-0.447,1-1v-2.222C42,43.276,41.324,42.014,40.192,41.26z"/></g></svg> Queued For AI</span>'


                var outerDiv = $('#review_products_list');
                var innerDiv = outerDiv.find("#action_" + identifier);
                innerDiv.html(que_for_ai_html);


                //this is for the roundup
                var outerDiv_roundup = $('#roundup_products_list');
                var innerDiv_roundup = outerDiv_roundup.find("#action_" + identifier);
                innerDiv_roundup.html(que_for_ai_html);


                //this is for the general //
                var outerDiv_general = $('#general_products_list');
                var innerDiv_general = outerDiv_general.find("#action_" + identifier);
                innerDiv_general.html(que_for_ai_html);




                //save this identifier to the local storage as queued for AI
                //var queued_for_ai_identifiers = localStorage.getItem('queued_for_ai_identifiers');
                //if (queued_for_ai_identifiers == null)
                //{
                //  queued_for_ai_identifiers = [];
                //}
                //else
                //{
                //  queued_for_ai_identifiers = JSON.parse(queued_for_ai_identifiers);
                //}
                //queued_for_ai_identifiers.push(identifier);
                //localStorage.setItem('queued_for_ai_identifiers', JSON.stringify(queued_for_ai_identifiers));


                if (timer_started == false)
                {
                  timer_started = true;
                  progress_interval = setInterval(function () {
                    check_for_products_updates_scaduale();
                  }, 5000);
                }

              }
            }

          }
        });
      }
      else
      {
        if (package_name == 'Trial')
        { 
          alert('Upgrade to Unlock, Only 5 Products at a time, please wait for the current products to finish preparing or upgrade to unlock more products at a time');
        }
        else if (package_name == 'Free')
        {
          alert('Upgrade to Unlock, Only 10 Product at a time, please wait for the current products to finish preparing or upgrade to unlock more products at a time');
        } 
        else
        {
          alert('Only 30 Products at a time, please wait for the current products to finish preparing.');
        }

      }
    }(jQuery));
  }


  function load_connect_page(){
    
    (function ($) {
      $("#connect_token").fadeIn();
      $("#main_gizzmo").hide();
      $("#main_header").hide();
    }(jQuery));

  }
  function load_gizzmo_main_page(website_settings)
  {
    (function ($) {
      //convert the website_settings json to an object
      var website_settings_json = JSON.parse(website_settings);


      if (website_settings_json.package_credits_data.package_credits_left == 0)
      {
        ooc = true;
        $('#credits_left').css('color','red');
        $('#credits_left').css('font-weight','bold');
        $('.out_of_credits').css('display','block');
      }


      if (website_settings_json.promotions.pro_1 != '' && website_settings_json.promotions.pro_1 != null)
      {
        $('#plugin_promotion_1_holder').html(website_settings_json.promotions.pro_1);
        $('#plugin_promotion_1_holder').css('display','block');
      }

      if (website_settings_json.promotions.pro_2 != '' && website_settings_json.promotions.pro_2 != null)
      {
        $('#plugin_promotion_2_holder').html(website_settings_json.promotions.pro_2);
        $('#plugin_promotion_2_holder').css('display','block');
      }

      $("#connect_token").hide();
      $("#main_gizzmo").fadeIn();
      $("#main_header").fadeIn();

      
      $("#top_package_button").html(website_settings_json.package);

      
      $("#package_name").html(website_settings_json.package);
      
      $("#total_credits").html(website_settings_json.package_credits_data.package_credits);
      $("#credits_used").html(website_settings_json.package_credits_data.package_credits_used);
      $("#credits_left").html(website_settings_json.package_credits_data.package_credits_left);
      $("#days_left").html(website_settings_json.package_credits_data.package_days_left);
      
      if (website_settings_json.package == 'Trial' || website_settings_json.subscription_status == 'Cancelled')
      {
        $("#renew_date").hide();
      }
      else
      {
        $("#renew_date").html(website_settings_json.package_credits_data.end_date);
      }
      

      $("#package_type").val(website_settings_json.package);
      $("#package_type_listicle").val(website_settings_json.package);
      

      if (website_settings_json.package == 'Free')
      {
        $("#pro_packages_details").hide();
      }

      $("#website_id").val(website_settings_json.website_id);
      $("#website_id_listicle").val(website_settings_json.website_id);




      account_link  = "https://gizzmo.ai/account/?wid=" + website_settings_json.website_id;
      
      
      //change all a tags with the class of "account_link_class" href to the account link
      $(".account_link_class").attr("href", account_link);
      

      //console.log("website_id: " + website_settings_json.website_id);

  
      affiliate_tags = website_settings_json.affiliate_tags;
      //fill the affiliate tags dropdown
      $.each(affiliate_tags, function (i, item) {
        
        $('#product_review_affiliate_tag_slct').append($('<option>', { 
          value: item,
          text : item,
          selected: true 
        }));

      });

      
      //load_review_products();
      var user_step = localStorage.getItem('user_step');
      load_content_tasks();
      if (user_step == '1')
      {
        //get the  'go_to_waiting_tasks from the local storage
        var go_to_waiting_tasks = localStorage.getItem('go_to_waiting_tasks');
        if (go_to_waiting_tasks == 'true')
        {
          //initiate the review_tab_bt click
          $('#posts_tab_bt').click();
          //remove the go_to_waiting_tasks from the local storage
          localStorage.setItem('go_to_waiting_tasks', 'false');
        }
        else
        {
          //console.log('show the review tab');
            $('#review_tab_bt').click();
        }
      }






      if (website_settings_json.package == 'Free')
      {

        const internal_linking_div = document.getElementById("internal_linking_div");
        // Set the x-tooltip.interactive.content attribute
        internal_linking_div.setAttribute('x-tooltip.interactive.content', "'#paid_feature_tip'");
        $('#similar_posts_list input[type=checkbox]').attr('disabled', true);

        
        $("#remove_aff_tag").hide();
        $("#add_affiliate_tag_bt").hide();
        const product_review_affiliate_tag_slct = document.getElementById("product_review_affiliate_tag_slct");
        //make the product_review_affiliate_tag_slct disabled
        //$('#product_review_affiliate_tag_slct').attr('disabled', true);
        product_review_affiliate_tag_slct.setAttribute('x-tooltip.interactive.content', "'#paid_feature_tip'");


        //product_review_seo_keyword
        const product_review_seo_keyword = document.getElementById("product_review_seo_keyword");
        //make the product_review_seo_keyword 
        product_review_seo_keyword.setAttribute('x-tooltip.interactive.content', "'#paid_feature_tip'");
        //make the product_review_seo_keyword input uneditable
        $('#product_review_seo_keyword').attr('readonly', true);


        //make carousel_options checkbox disabled
        $('#carousel_options').prop('checked', false);
        $('#carousel_options').attr('disabled', true);
        const carousel_options_text = document.getElementById("carousel_options_text");
        carousel_options_text.setAttribute('x-tooltip.interactive.content', "'#paid_feature_tip'");


        //create_tags
        $('#create_tags').prop('checked', false);
        $('#create_tags').attr('disabled', true);
        const create_tags_text = document.getElementById("create_tags_text");
        create_tags_text.setAttribute('x-tooltip.interactive.content', "'#paid_feature_tip'");
        

        //connect_categories
        $('#connect_categories').prop('checked', false);
        $('#connect_categories').attr('disabled', true);
        const connect_categories_text = document.getElementById("connect_categories_text");
        connect_categories_text.setAttribute('x-tooltip.interactive.content', "'#paid_feature_tip'");

        //create_pros_cons
        $('#create_pros_cons').prop('checked', false);
        $('#create_pros_cons').attr('disabled', true);
        const create_pros_cons_text = document.getElementById("create_pros_cons_text");
        create_pros_cons_text.setAttribute('x-tooltip.interactive.content', "'#paid_feature_tip'");

        //create_faqs
        $('#create_faqs').prop('checked', false);
        $('#create_faqs').attr('disabled', true);
        const create_faqs_text = document.getElementById("create_faqs_text");
        create_faqs_text.setAttribute('x-tooltip.interactive.content', "'#paid_feature_tip'");

        //create_conclusion
        $('#create_conclusion').prop('checked', false);
        $('#create_conclusion').attr('disabled', true);
        const create_conclusion_text = document.getElementById("create_conclusion_text");
        create_conclusion_text.setAttribute('x-tooltip.interactive.content', "'#paid_feature_tip'");


        //make the similar_posts_list height to 100px 
        $('#similar_posts_list').css('height','100px');

        $("#free_comparison_div").show();
        $("#free_listicle_div").show();

        check_free_listicles_comparisons();

      }

      //get_all_products('review');



      //check local storage if the user has clicked the i_understand_bt button
      var i_understand_bt = localStorage.getItem('i_understand');
      //if the local storage is null, show the modal
      if (i_understand_bt == null)
      {
        $('#backdrop').show();
        $('#i_understand_model').show();

        //initiate the review_tab_bt click
        $('#review_tab_bt').click();
      }
      






    }(jQuery));
      
  }


    function i_understand()
    {
      (function ($) {

        $('#i_understand_model').hide();
        $('#backdrop').hide();
        
        localStorage.setItem('i_understand', 'true');

      }(jQuery));
    }








  function load_content_tasks()
  {

    console.log('load_content_tasks');

    tasks_length = 0;


    (function ($) {
      var website_id = $("#website_id").val();
      var type= 'general';


      $("div#content_tasks_list").Grid({
        columns: [
          {
            name: "Delete",
            formatter: function(e,row,cell) {
              var task_id = row._cells[0].data;
              //return Gridjs.html('<button id="delete_bt_'+prod_identifier+'" data-identifier="' + prod_identifier + '" onclick="remove_prod(this)" style="background-color:#6c6c6c" class="btn h-8 w-8 rounded-full p-0 font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90"><i class="fa-regular fa-trash-alt"></i></button>')
              return Gridjs.html('<button id="delete_bt_'+task_id+'" data-task_id="'+task_id+'" onclick="remove_task(this)" style="background-color:#6c6c6c" class="btn h-8 w-8 rounded-full p-0 font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90"><i class="fa-regular fa-trash-alt"></i></button>')
            }
          }, 
          {
            name: "Actions",
            formatter: function(e,row,cell) {
              //task.id, task.task_type, task.status, task.asin,task.featured_image
             
             


              var task_id = row._cells[1].data;
              
              //make the first latter uppercase
              task_id = task_id.charAt(0).toUpperCase() + task_id.slice(1);

              var bt_html = "";

              
              var action_div_html = "";

              action_div_html = '<div id="action_">' + task_id + '</div>';

              return Gridjs.html(action_div_html)
            }
          }
          ,
          {
            name: "since",
            formatter: function(e,row,cell) {
              
              

              
              


                //save a true vallue in a has_tasks in local storage
                $("#tasks_top_msg").html('You have Posts in progress, or waiting to be saved as Drafts.');
 
                var task_id = row._cells[0].data;
                var task_type = row._cells[1].data;
                
                html_block = '';
                if (e == "In Progress")
                {
                  html_block = '<div id="task_status_wrapper_' + task_id + '" class="flex shrink-0 items-center space-x-1"><img src="images/loading.gif" style="position: absolute;width: 16px;margin-top: 1px;"><span class="nav-link status_text" style="margin-left: 20px;">In Progress</span></div>'

                  var asin = row._cells[4].data;
                  if (task_type == 'roundup' || task_type == 'comparison' || task_type == 'listicle')
                  {
                    asin =task_id;
                  }

                  var gizzmo_nonce = $("#gizzmo_nonce").val();
                  var input_websiteid = '<input type="hidden" name="website_id" value="' + website_id + '"></input>';
                  var input_asin = '<input type="hidden" name="asin" value="' + asin + '"></input>';
                  var task_type_html = '<input type="hidden" name="task_type" value="' + task_type + '"></input>';
                  var task_id_html = '<input type="hidden" name="task_id" value="' + task_id + '"></input>';
                  
                  var input_wpnonce = '<input type="hidden" name="_wpnonce" value="' + gizzmo_nonce + '"></input>';
                  var action_div_html = '<div id="action_' + task_id + '">' + html_block + input_websiteid + input_wpnonce + input_asin + task_type_html + task_id_html + '</div>';
                  action_div_html = '<form method="post">' + action_div_html + '</form>';

                  return Gridjs.html(action_div_html)
                }
                else if (e == "Completed")
                {
                  //html_block = '<div data-task_id="' + task_id + '" id="task_status_wrapper_' + task_id + '" class="flex shrink-0 items-center space-x-1"><button onclick="show_saving_waitingmsg(this)"   type="submit" title="Click to save the ' + task_type + ' post" name="save_review" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90" style="min-width:88px">Save</button></div>'
                  html_block = '<div id="task_status_wrapper_' + task_id + '" class="flex shrink-0 items-center space-x-1"><button onclick="show_saving_waitingmsg(this)"   type="submit" title="Click to save the ' + task_type + ' post" name="save_review" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90" style="min-width:88px">Save As Draft</button></div>'

                  console.log('Completed: task_type: ' + task_type);
                  
                  var asin = row._cells[4].data;
                  if (task_type == 'roundup' || task_type == 'comparison'|| task_type == 'listicle')
                  {
                    asin =task_id;
                  }

                  var gizzmo_nonce = $("#gizzmo_nonce").val();
                  var input_websiteid = '<input type="hidden" name="website_id" value="' + website_id + '"></input>';
                  var input_asin = '<input type="hidden" name="asin" value="' + asin + '"></input>';
                  var task_type_html = '<input type="hidden" name="task_type" value="' + task_type + '"></input>';
                  var task_id_html = '<input type="hidden" name="task_id" value="' + task_id + '"></input>';
                  
                  var input_wpnonce = '<input type="hidden" name="_wpnonce" value="' + gizzmo_nonce + '"></input>';
                  var action_div_html = '<div id="action_' + task_id + '">' + html_block + input_websiteid + input_wpnonce + input_asin + task_type_html + task_id_html + '</div>';
                  action_div_html = '<form method="post">' + action_div_html + '</form>';

                  return Gridjs.html(action_div_html)

                }
                else
                {
                  html_block = '<div id="task_status_wrapper_' + task_id + '" class="flex shrink-0 items-center space-x-1"><svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-slate-400 dark:text-navy-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg><p>' + e + '</p></div>'
                  
                  var asin = row._cells[4].data;
                  if (task_type == 'roundup' || task_type == 'comparison'|| task_type == 'listicle')
                  {
                    asin =task_id;
                  }

                  var gizzmo_nonce = $("#gizzmo_nonce").val();
                  var input_websiteid = '<input type="hidden" name="website_id" value="' + website_id + '"></input>';
                  var input_asin = '<input type="hidden" name="asin" value="' + asin + '"></input>';
                  var task_type_html = '<input type="hidden" name="task_type" value="' + task_type + '"></input>';
                  var task_id_html = '<input type="hidden" name="task_id" value="' + task_id + '"></input>';
                  
                  var input_wpnonce = '<input type="hidden" name="_wpnonce" value="' + gizzmo_nonce + '"></input>';
                  var action_div_html = '<div id="action_' + task_id + '">' + html_block + input_websiteid + input_wpnonce + input_asin + task_type_html + task_id_html + '</div>';
                  action_div_html = '<form method="post">' + action_div_html + '</form>';

                  return Gridjs.html(action_div_html)
                }


                return Gridjs.html(html_block)
            }
          }
          ,
          {
            name: "Image",
            formatter: function(e) {
                return Gridjs.html('<img class="mask rounded-lg" style="width:35px;height:35px" src="'.concat(e,'"/>'))
            }
          }
          ,
          {
            name: "Name",
            formatter: function(e,row,cell) {
                var keyphrase = row._cells[5].data;
                //replace the %20 with a space
                keyphrase = keyphrase.replace(/%20/g, ' ');
                //trim the name to 55 characters
                if (keyphrase.length > 55)
                {
                  keyphrasee = keyphrase.substring(0, 55) + '...';
                }
                amzn_url = ""
                return Gridjs.html('<span class="text-slate-700 dark:text-navy-100 font-medium">'.concat(keyphrase, "</span>"))
            }
          }
          ,
          { 
            name: 'source',
            hidden: true
          },
          {
            name: "used_count",
            hidden: true
          },
          {
            name: "status",
            hidden: true
          },
          {
            name: "website_id",
            hidden: true
          }
        ],
        width: '100%',
        search: false,
        pagination: false,
        server: {
          url: "https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/get_content_tasks/" + website_id,
          then: (data) => {
            // Count the number of rows here
            //console.log("Number of rows:", data.data.length);
            //console.log('tasks_length: ' + tasks_length);
            if (data.data.length > 0)
            {
              $("#posts_notification").show();
              $("#posts_notification").html(data.data.length);
            }

            // Return the mapped data for grid population
            return data.data.map((task) => [task.id, task.task_type, task.status, task.featured_image,task.asin,task.product_keyphrase]);
          },
        }
        
      });

    
    }(jQuery));


    (function ($) {
      $("#content_tasks_list .gridjs-thead").hide();
    }(jQuery));
  }

  function set_go_to_waiting_tasks() {
    localStorage.setItem('go_to_waiting_tasks', 'true');
  }


  function try_listicle_again(clicked_obj)
  {
    (function ($) {
    //get the task_id
    var task_id = $(clicked_obj).attr('data-taskid');
    //change the status to 'Waiting'
    var task_status_wrapper = document.getElementById('task_status_wrapper_' + task_id);
    var waiting_html = '<svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-slate-400 dark:text-navy-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg><p>Waiting</p>';
    task_status_wrapper.innerHTML = waiting_html;
    //make an ajax call to change the status to 'Waiting'
    
    $.ajax({
      url: 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/change_task_status/' + task_id + ',Waiting',
      type: 'GET',
      success: function (data) {
        //console.log(data);
        if (data.status == 'ok')
        {
          //console.log('status changed to waiting');
        }
        else
        {
          //console.log('status not changed to waiting');
        }
      }
    });

    }(jQuery));

  }

  function check_content_tasks()
  {
  
    (function ($) {

      
      var website_id = $("#website_id").val();

      if (website_id == '' || website_id == null || website_id == 'undefined' || website_id == undefined)
      {
        return;
      }

      $.ajax({
        url: "https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/get_content_tasks/" + website_id,
        type: 'GET',
        success: function (data) {
          
           
          if (data.status == 'ok')
          {
            //task_status_wrapper_7
            //convert the website settings to json

            //var error_html = '<p>Error, Delete and try again.</p>';
            
            

            var waiting_html = '<svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-slate-400 dark:text-navy-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg><p>Waiting</p>';
            var in_progress_html = '<img src="images/loading.gif" style="position: absolute;width: 16px;margin-top: 1px;"><span class="nav-link status_text" style="margin-left: 20px;">In Progress</span>';
            



            var tasks = data.data;
            var tasks_length = tasks.length;
            if (tasks_length == 0)
            {
              //set the gizzmo_check_tasks to 'false'
              localStorage.setItem('gizzmo_check_tasks', 'false');
              //hide the content_tasks_list
              //$("#tasks_wrapper").hide();
              //$("#content_tasks_list").hide();
              $("#posts_notification").hide();
              $("#posts_notification").html('0');
              $("#tasks_top_msg").html('No Posts in progress, or waiting to be saved as Drafts.');

            }
            else
            {
              // if content_tasks_list is hidden, show it
              //check if the content_tasks_list is hidden
              //if ($("#content_tasks_list").is(":hidden") == true || $("#tasks_wrapper").is(":hidden") == true)
              //{
              //  $("#tasks_wrapper").show();
              //  $("#content_tasks_list").show();
              //}
              $("#tasks_top_msg").html('You have Posts in progress, or waiting to be saved as Drafts.');

              //set the gizzmo_check_tasks to 'true'
              //console.log('set gizzmo_check_tasks to true');
              localStorage.setItem('gizzmo_check_tasks', 'true');
              
              //console.log('tasks_length: ' + tasks_length);
              $("#posts_notification").show();
              $("#posts_notification").html(tasks_length);

              //go through each task and update the status
              for (var i = 0; i < tasks_length; i++)
              {
                var task = tasks[i];
                var task_id = task.id;
                var task_status = task.status;
                var task_status_wrapper = document.getElementById('task_status_wrapper_' + task_id);
                var task_type = task.task_type;

                
                
                var ready_html = '<button  onclick="show_saving_waitingmsg(this)" type="submit" title="Click to save the ' + task_type + ' post" name="save_review" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90" style="min-width:88px">Save As Draft</button>';

                if (task_status_wrapper != null)
                {
                  if (task_status == 'In Progress')
                  {
                    task_status_wrapper.innerHTML = in_progress_html;
                  }
                  else if (task_status == 'Completed')
                  {
                    task_status_wrapper.innerHTML = ready_html;
                  }
                  else if (task_status == 'Waiting')
                  {
                    task_status_wrapper.innerHTML = waiting_html;
                  }
                  else
                  {
                    var error_html = '<span style="background-color: #b13131;" data-taskid="' + task_id + '"  onclick="try_listicle_again(this)" title="AI Process Failed, click to try again, if problem persists, delete and start over"   class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90" style="min-width:88px">Failed, Try Again</span>';

                    task_status_wrapper.innerHTML = error_html;
                  }
                }
              }
            }
          }
          else
          {
            //set the gizzmo_check_tasks to 'false'
             
            localStorage.setItem('gizzmo_check_tasks', 'false');

            


          }
        }
      });
    }(jQuery));

  }












  function load_review_products()
  {
    (function ($) {

      //review_products_list 
      var website_id = $("#website_id").val();
      var type= 'product_review';

      //clear the review_products_list products list
      $("div#review_products_list").html('');

      $("div#review_products_list").Grid({
          columns: [
            {
              name: "Delete",
              formatter: function(e,row,cell) {
                var prod_identifier = row._cells[5].data;
                return Gridjs.html('<button id="delete_bt_'+prod_identifier+'" data-identifier="' + prod_identifier + '" onclick="remove_prod(this)" style="background-color:#6c6c6c" class="btn h-8 w-8 rounded-full p-0 font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90"><i class="fa-regular fa-trash-alt"></i></button>')
              }
            }, 
            {
              name: "Actions",
              formatter: function(e,row,cell) {

                var bt_html = "";
                var prod_status = row._cells[7].data;
                var used_count = row._cells[6].data;
                var prod_identifier = row._cells[5].data;
                var prod_img = row._cells[3].data;
                var prod_name = row._cells[4].data;
                //remove the " from the name
                prod_name = prod_name.replace(/"/g, "");
                //remove the ' from the name
                prod_name = prod_name.replace(/'/g, "");

                var prod_website_id = row._cells[8].data;
                if (ooc == false)
                {
                  if (prod_status == 'Ready')
                  {
                    
                    if (used_count > 0)
                    {
                      bt_html = '<button onclick="show_review_waitingmsg()" id="' + prod_identifier + '" type="submit" title="Click to generate a review post" name="create_review[' + prod_identifier + ']" class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90" style="background-color:#0c0b0c33 !important;min-width:88px">Review</button>';
                    }
                    else
                    {
                      bt_html = '<button onclick="show_review_waitingmsg()" id="' + prod_identifier + '" type="submit" title="Click to generate a review post" name="create_review[' + prod_identifier + ']" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90" style="min-width:88px">Review</button>';
                    }
                    
                  }
                  else if (prod_status == 'Failed')
                  {
                    bt_html = '<button title="Data preparation has failed, we are sorry, Gizzmo team will check it out, You can try again or try a different product" data-websiteid="' + prod_website_id + '" data-identifier="' + prod_identifier + '" onclick="prepare(this)" class="btn bg-warning font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90" style="background-color:#d63638 !important;min-width:88px">Failed</button>';
                  }
                  else if (prod_status == 'Curated')
                  {
                    bt_html = '<button title="Click to prepare product data with Gizzmo AI" data-websiteid="' + prod_website_id + '" data-identifier="' + prod_identifier + '" onclick="prepare(this)" class="btn bg-warning font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90" style="min-width:88px">Prepare</button>';
                  }
                  else if ( prod_status == 'in_progress' || prod_status == 'In_Progress')
                  {	
                    bt_html = '<img src="images/loading.gif" style="position: absolute;width: 16px;margin-top: 1px;"><span  class="nav-link status_text" style="margin-left: 20px;" >Preparing AI</span>'
                  }
                  else if ( prod_status == 'Waiting_For_Analysis' || prod_status == 'in-queue')
                  {
                    bt_html = '<span  class="nav-link status_text" ><svg style="position: relative;top: 2px;left: -4px;float: left;" fill="#512fb7" height="15px" width="15px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 	 viewBox="0 0 60 60" xml:space="preserve"><g>	<path d="M54,58h-3v-4h-5V43.778c0-2.7-1.342-5.208-3.589-6.706L31.803,30l10.608-7.072C44.658,21.43,46,18.922,46,16.222V6h5V2h3		c0.552,0,1-0.447,1-1s-0.448-1-1-1h-3h-1H10H9H6C5.448,0,5,0.447,5,1s0.448,1,1,1h3v4h5v10.222c0,2.7,1.342,5.208,3.589,6.706		L28.197,30l-10.608,7.072C15.342,38.57,14,41.078,14,43.778V54H9v4H6c-0.552,0-1,0.447-1,1s0.448,1,1,1h3h1h40h1h3		c0.552,0,1-0.447,1-1S54.552,58,54,58z M18.698,21.264C17.009,20.137,16,18.252,16,16.222V6h28v10.222		c0,2.03-1.009,3.915-2.698,5.042L30,28.798L18.698,21.264z M16,43.778c0-2.03,1.009-3.915,2.698-5.042L30,31.202l11.302,7.534		C42.991,39.863,44,41.748,44,43.778V54H16V43.778z"/>	<path d="M20.917,17.936C20.343,17.553,20,16.912,20,16.222V14c0-0.553-0.448-1-1-1s-1,0.447-1,1v2.222		c0,1.361,0.676,2.624,1.808,3.378l4.638,3.092c0.17,0.113,0.363,0.168,0.554,0.168c0.323,0,0.64-0.156,0.833-0.445		c0.306-0.46,0.182-1.08-0.277-1.387L20.917,17.936z"/>	<path d="M40.192,41.26l-4.638-3.092c-0.46-0.307-1.08-0.183-1.387,0.277c-0.306,0.46-0.182,1.08,0.277,1.387l4.638,3.092		C39.657,43.307,40,43.947,40,44.638v2.222c0,0.553,0.448,1,1,1s1-0.447,1-1v-2.222C42,43.276,41.324,42.014,40.192,41.26z"/></g></svg> Queued For AI</span>'
                  }
                }
                else
                {
                  bt_html = '<button title="You have used all your credits, please upgrade your package" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90" style="min-width:88px;background-color:#e4e8f0">Review</button>';
                }

                var input_img = "";
                var input_name = "";
                var input_websiteid = "";
                var action_div_html = "";
                var input_wpnonce = "";
                
                var gizzmo_nonce = $("#gizzmo_nonce").val();
                if (prod_status !="Curated")
                {
                    input_img = '<input type="hidden" name="img_url_' + prod_identifier + '" value="' + prod_img + '"></input>';
                    input_name = '<input type="hidden" name="product_name_' + prod_identifier + '" value="' + prod_name + '"></input>';
                    input_websiteid = '<input type="hidden" name="websiteid_' + prod_identifier + '" value="' + prod_website_id + '"></input>';
                    input_wpnonce = '<input type="hidden" name="_wpnonce" value="' + gizzmo_nonce + '"></input>';
                    action_div_html = '<div id="action_' + prod_identifier + '">' + bt_html +  input_img + input_name + input_websiteid + input_wpnonce + '</div>';
                }
                else
                {
                  action_div_html = '<div id="action_' + prod_identifier + '">' + bt_html + '</div>';
                }

                
                if (prod_status == 'Ready')
                {
                  action_div_html = '<form method="post">' + action_div_html + '</form>';
                  return Gridjs.html(action_div_html)
                }
                return Gridjs.html(action_div_html)
              }
            }
            ,
            {
              name: "since",
              formatter: function(e) {
                  return Gridjs.html('<div class="flex shrink-0 items-center space-x-1"><svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-slate-400 dark:text-navy-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg><p>' + e + '</p></div>')
              }
            }
            ,
            {
              name: "Image",
              formatter: function(e) {
                  return Gridjs.html('<img class="mask rounded-lg" style="width:35px;height:35px" src="'.concat(e,'"/>'))
              }
            }
            ,
            {
              name: "Name",
              formatter: function(e,row,cell) {

                  localStorage.setItem('user_step', '1');

                  amzn_url = "https://" + row._cells[1].data + "/dp/" + row._cells[5].data;
                  //trim the name to 80 characters
                  if (e.length > 55)
                  {
                      e = e.substring(0, 55) + '...';
                  }
                  return Gridjs.html('<span class="text-slate-700 dark:text-navy-100 font-medium"><a target="_blank" href="' + amzn_url + '" />'.concat(e, "</a></span>"))
              }
            }
            
            
            ,
            { 
              name: 'source',
              hidden: true
            },
            {
              name: "used_count",
              hidden: true
            },
            {
              name: "status",
              hidden: true
            },
            {
              name: "website_id",
              hidden: true
            }
          ],
          width: '100%',
          search: true,
          pagination: true,
          server: {
            url:
              "https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/get_website_products_by_type/" + website_id + "," + type,
            then: (data) => data.data.map((product) => [product.id, product.source, product.time_since, product.preview_image, product.name, product.identifier,  product.used_count, product.status, product.website_id]),
          }
      });
    
    }(jQuery));
  }



  function load_roundup_products()
  {
    (function ($) {
      var website_id = $("#website_id").val();
      var type= 'roundup';

      //clear the roundup products list
      $("div#roundup_products_list").html('');

      $("div#roundup_products_list").Grid({
        columns: [
          {
            name: "Delete",
            formatter: function(e,row,cell) {
              var prod_identifier = row._cells[5].data;
              return Gridjs.html('<button id="delete_bt_'+prod_identifier+'" data-identifier="' + prod_identifier + '" onclick="remove_prod(this)" style="background-color:#6c6c6c" class="btn h-8 w-8 rounded-full p-0 font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90"><i class="fa-regular fa-trash-alt"></i></button>')
            }
          }, 
          {
            name: "Actions",
            formatter: function(e,row,cell) {

              var bt_html = "";
              var prod_status = row._cells[7].data;
              var used_count = row._cells[6].data;
              var prod_identifier = row._cells[5].data;
              var prod_img = row._cells[3].data;
              var prod_name = row._cells[4].data;
              //remove the " from the name
              prod_name = prod_name.replace(/"/g, "");
              //remove the ' from the name
              prod_name = prod_name.replace(/'/g, "");

              var prod_website_id = row._cells[8].data;
              if (ooc == false)
              {
                if (prod_status == 'Ready')
                {
                  if (used_count > 0)
                  {
                    bt_html = '<button onclick="add_to_roundup_tab(this)" data-identifier="' + prod_identifier + '" data-type="roundup" data-img="' + prod_img + '" data-productname="' + prod_name + '" id="' + prod_identifier + '"  title="Click to add this product to roundup" class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90" style="background-color:#0c0b0c33 !important;min-width:88px"><span>Add</span></button>';
                  }
                  else
                  {
                    bt_html = '<button onclick="add_to_roundup_tab(this)" data-identifier="' + prod_identifier + '" data-type="roundup" data-img="' + prod_img + '" data-productname="' + prod_name + '" id="' + prod_identifier + '"  title="Click to add this product to roundup" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90" style="min-width:88px"><span>Add</span></button>';
                  }
                  
                }
                else if (prod_status == 'Failed')
                {
                  bt_html = '<button title="Data preparation has failed, we are sorry, Gizzmo team will check it out, You can try again or try a different product" data-websiteid="' + prod_website_id + '" data-identifier="' + prod_identifier + '" onclick="prepare(this)" class="btn bg-warning font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90" style="background-color:#d63638 !important;min-width:88px">Failed</button>';
                }
                else if (prod_status == 'Curated')
                {
                  bt_html = '<button title="Click to prepare product data with Gizzmo AI" data-websiteid="' + prod_website_id + '" data-identifier="' + prod_identifier + '" onclick="prepare(this)" class="btn bg-warning font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90" style="min-width:88px">Prepare</button>';
                }
                else if ( prod_status == 'in_progress' || prod_status == 'In_Progress')
                {	
                  bt_html = '<img src="images/loading.gif" style="position: absolute;width: 16px;margin-top: 1px;"><span  class="nav-link status_text" style="margin-left: 20px;" >Preparing AI</span>'
                }
                else if ( prod_status == 'Waiting_For_Analysis' || prod_status == 'in-queue')
                {
                  bt_html = '<span  class="nav-link status_text" ><svg style="position: relative;top: 2px;left: -4px;float: left;" fill="#512fb7" height="15px" width="15px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 	 viewBox="0 0 60 60" xml:space="preserve"><g>	<path d="M54,58h-3v-4h-5V43.778c0-2.7-1.342-5.208-3.589-6.706L31.803,30l10.608-7.072C44.658,21.43,46,18.922,46,16.222V6h5V2h3		c0.552,0,1-0.447,1-1s-0.448-1-1-1h-3h-1H10H9H6C5.448,0,5,0.447,5,1s0.448,1,1,1h3v4h5v10.222c0,2.7,1.342,5.208,3.589,6.706		L28.197,30l-10.608,7.072C15.342,38.57,14,41.078,14,43.778V54H9v4H6c-0.552,0-1,0.447-1,1s0.448,1,1,1h3h1h40h1h3		c0.552,0,1-0.447,1-1S54.552,58,54,58z M18.698,21.264C17.009,20.137,16,18.252,16,16.222V6h28v10.222		c0,2.03-1.009,3.915-2.698,5.042L30,28.798L18.698,21.264z M16,43.778c0-2.03,1.009-3.915,2.698-5.042L30,31.202l11.302,7.534		C42.991,39.863,44,41.748,44,43.778V54H16V43.778z"/>	<path d="M20.917,17.936C20.343,17.553,20,16.912,20,16.222V14c0-0.553-0.448-1-1-1s-1,0.447-1,1v2.222		c0,1.361,0.676,2.624,1.808,3.378l4.638,3.092c0.17,0.113,0.363,0.168,0.554,0.168c0.323,0,0.64-0.156,0.833-0.445		c0.306-0.46,0.182-1.08-0.277-1.387L20.917,17.936z"/>	<path d="M40.192,41.26l-4.638-3.092c-0.46-0.307-1.08-0.183-1.387,0.277c-0.306,0.46-0.182,1.08,0.277,1.387l4.638,3.092		C39.657,43.307,40,43.947,40,44.638v2.222c0,0.553,0.448,1,1,1s1-0.447,1-1v-2.222C42,43.276,41.324,42.014,40.192,41.26z"/></g></svg> Queued For AI</span>'
                }
              }
              else
              {
                bt_html = '<button title="You have used all your credits, please upgrade your package" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90" style="min-width:88px;background-color:#e4e8f0">Add</button>';
              }

              //var input_img = "";
              //var input_name = "";
              //var input_websiteid = "";
              var action_div_html = "";

              //if (prod_status !="Curated")
              //{
              //    input_img = '<input type="hidden" name="img_url_' + prod_identifier + '" value="' + prod_img + '"></input>';
              //    input_name = '<input type="hidden" name="product_name_' + prod_identifier + '" value="' + prod_name + '"></input>';
              //    input_websiteid = '<input type="hidden" name="websiteid_' + prod_identifier + '" value="' + prod_website_id + '"></input>';
              //    action_div_html = '<div id="action_' + prod_identifier + '">' + bt_html +  input_img + input_name + input_websiteid + '</div>';
              //}
              //else
              //{
              action_div_html = '<div id="action_' + prod_identifier + '">' + bt_html + '</div>';
              //}

              
              //if (prod_status == 'Ready')
              //{
              //  action_div_html = '<form method="post">' + action_div_html + '</form>';
              //  return Gridjs.html(action_div_html)
              //}
              return Gridjs.html(action_div_html)
            }
          }
          ,
          {
            name: "since",
            formatter: function(e) {
                return Gridjs.html('<div class="flex shrink-0 items-center space-x-1"><svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-slate-400 dark:text-navy-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg><p>' + e + '</p></div>')
            }
          }
          ,
          {
            name: "Image",
            formatter: function(e) {
                return Gridjs.html('<img class="mask rounded-lg" style="width:35px;height:35px" src="'.concat(e,'"/>'))
            }
          }
          ,
          {
            name: "Name",
            formatter: function(e,row,cell) {

                amzn_url = "https://" + row._cells[1].data + "/dp/" + row._cells[5].data;
                //trim the name to 80 characters
                if (e.length > 55)
                {
                    e = e.substring(0, 55) + '...';
                }
                return Gridjs.html('<span class="text-slate-700 dark:text-navy-100 font-medium"><a target="_blank" href="' + amzn_url + '" />'.concat(e, "</a></span>"))
            }
          }
          
          
          ,
          { 
            name: 'source',
            hidden: true
          },
          {
            name: "used_count",
            hidden: true
          },
          {
            name: "status",
            hidden: true
          },
          {
            name: "website_id",
            hidden: true
          }
        ],
        width: '100%',
        search: true,
        pagination: true,
        server: {
          url: "https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/get_website_products_by_type/" + website_id + "," + type,
          then: (data) => data.data.map((product) => [product.id, product.source, product.time_since, product.preview_image, product.name, product.identifier,  product.used_count, product.status, product.website_id]),
        }
      });
    
    }(jQuery));
  }


  function load_general_products()
  {
    (function ($) {
      var website_id = $("#website_id").val();
      var type= 'general';

      //clear the general_products_list products list
      $("div#general_products_list").html('');


      $("div#general_products_list").Grid({
        columns: [
          {
            name: "Delete",
            formatter: function(e,row,cell) {
              var prod_identifier = row._cells[5].data;
              return Gridjs.html('<button id="delete_bt_'+prod_identifier+'" data-identifier="' + prod_identifier + '" onclick="remove_prod(this)" style="background-color:#6c6c6c" class="btn h-8 w-8 rounded-full p-0 font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90"><i class="fa-regular fa-trash-alt"></i></button>')
            }
          }, 
          {
            name: "Actions",
            formatter: function(e,row,cell) {

              var bt_html = "";
              var prod_status = row._cells[7].data;
              var used_count = row._cells[6].data;
              var prod_identifier = row._cells[5].data;
              var prod_img = row._cells[3].data;
              var prod_name = row._cells[4].data;
              //remove the " from the name
              prod_name = prod_name.replace(/"/g, "");
              //remove the ' from the name
              prod_name = prod_name.replace(/'/g, "");

              var prod_website_id = row._cells[8].data;
              if (ooc == false)
              {
                if (prod_status == 'Ready')
                {
                  if (used_count > 0)
                  {
                    bt_html = '<button onclick="add_to_general_tab(this)" data-identifier="' + prod_identifier + '" data-type="general" data-img="' + prod_img + '" data-productname="' + prod_name + '" id="' + prod_identifier + '"  title="Click to add this product to general" class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90" style="background-color:#0c0b0c33 !important;min-width:88px"><span>Add</span></button>';
                  }
                  else
                  {
                    bt_html = '<button onclick="add_to_general_tab(this)" data-identifier="' + prod_identifier + '" data-type="general" data-img="' + prod_img + '" data-productname="' + prod_name + '" id="' + prod_identifier + '"  title="Click to add this product to general" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90" style="min-width:88px"><span>Add</span></button>';
                  }
                  
                }
                else if (prod_status == 'Failed')
                {
                  bt_html = '<button title="Data preparation has failed, we are sorry, Gizzmo team will check it out, You can try again or try a different product" data-websiteid="' + prod_website_id + '" data-identifier="' + prod_identifier + '" onclick="prepare(this)" class="btn bg-warning font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90" style="background-color:#d63638 !important;min-width:88px">Failed</button>';
                }
                else if (prod_status == 'Curated')
                {
                  bt_html = '<button title="Click to prepare product data with Gizzmo AI" data-websiteid="' + prod_website_id + '" data-identifier="' + prod_identifier + '" onclick="prepare(this)" class="btn bg-warning font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90" style="min-width:88px">Prepare</button>';
                }
                else if ( prod_status == 'in_progress' || prod_status == 'In_Progress')
                {	
                  bt_html = '<img src="images/loading.gif" style="position: absolute;width: 16px;margin-top: 1px;"><span  class="nav-link status_text" style="margin-left: 20px;" >Preparing AI</span>'
                }
                else if ( prod_status == 'Waiting_For_Analysis' || prod_status == 'in-queue')
                {
                  bt_html = '<span  class="nav-link status_text" ><svg style="position: relative;top: 2px;left: -4px;float: left;" fill="#512fb7" height="15px" width="15px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 	 viewBox="0 0 60 60" xml:space="preserve"><g>	<path d="M54,58h-3v-4h-5V43.778c0-2.7-1.342-5.208-3.589-6.706L31.803,30l10.608-7.072C44.658,21.43,46,18.922,46,16.222V6h5V2h3		c0.552,0,1-0.447,1-1s-0.448-1-1-1h-3h-1H10H9H6C5.448,0,5,0.447,5,1s0.448,1,1,1h3v4h5v10.222c0,2.7,1.342,5.208,3.589,6.706		L28.197,30l-10.608,7.072C15.342,38.57,14,41.078,14,43.778V54H9v4H6c-0.552,0-1,0.447-1,1s0.448,1,1,1h3h1h40h1h3		c0.552,0,1-0.447,1-1S54.552,58,54,58z M18.698,21.264C17.009,20.137,16,18.252,16,16.222V6h28v10.222		c0,2.03-1.009,3.915-2.698,5.042L30,28.798L18.698,21.264z M16,43.778c0-2.03,1.009-3.915,2.698-5.042L30,31.202l11.302,7.534		C42.991,39.863,44,41.748,44,43.778V54H16V43.778z"/>	<path d="M20.917,17.936C20.343,17.553,20,16.912,20,16.222V14c0-0.553-0.448-1-1-1s-1,0.447-1,1v2.222		c0,1.361,0.676,2.624,1.808,3.378l4.638,3.092c0.17,0.113,0.363,0.168,0.554,0.168c0.323,0,0.64-0.156,0.833-0.445		c0.306-0.46,0.182-1.08-0.277-1.387L20.917,17.936z"/>	<path d="M40.192,41.26l-4.638-3.092c-0.46-0.307-1.08-0.183-1.387,0.277c-0.306,0.46-0.182,1.08,0.277,1.387l4.638,3.092		C39.657,43.307,40,43.947,40,44.638v2.222c0,0.553,0.448,1,1,1s1-0.447,1-1v-2.222C42,43.276,41.324,42.014,40.192,41.26z"/></g></svg> Queued For AI</span>'
                }
              }
              else
              {
                bt_html = '<button title="You have used all your credits, please upgrade your package" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90" style="min-width:88px;background-color:#e4e8f0">Add</button>';
              }


              //var input_img = "";
              //var input_name = "";
              //var input_websiteid = "";
              var action_div_html = "";

              //if (prod_status !="Curated")
              //{
              //    input_img = '<input type="hidden" name="img_url_' + prod_identifier + '" value="' + prod_img + '"></input>';
              //    input_name = '<input type="hidden" name="product_name_' + prod_identifier + '" value="' + prod_name + '"></input>';
              //    input_websiteid = '<input type="hidden" name="websiteid_' + prod_identifier + '" value="' + prod_website_id + '"></input>';
              //    action_div_html = '<div id="action_' + prod_identifier + '">' + bt_html +  input_img + input_name + input_websiteid + '</div>';
              //}
              //else
              //{
              action_div_html = '<div id="action_' + prod_identifier + '">' + bt_html + '</div>';
              //}

              
              //if (prod_status == 'Ready')
              //{
              //  action_div_html = '<form method="post">' + action_div_html + '</form>';
              //  return Gridjs.html(action_div_html)
              //}
              return Gridjs.html(action_div_html)
            }
          }
          ,
          {
            name: "since",
            formatter: function(e) {
                return Gridjs.html('<div class="flex shrink-0 items-center space-x-1"><svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-slate-400 dark:text-navy-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg><p>' + e + '</p></div>')
            }
          }
          ,
          {
            name: "Image",
            formatter: function(e) {
                return Gridjs.html('<img class="mask rounded-lg" style="width:35px;height:35px" src="'.concat(e,'"/>'))
            }
          }
          ,
          {
            name: "Name",
            formatter: function(e,row,cell) {

                amzn_url = "https://" + row._cells[1].data + "/dp/" + row._cells[5].data;
                //trim the name to 80 characters
                if (e.length > 55)
                {
                    e = e.substring(0, 55) + '...';
                }
                return Gridjs.html('<span class="text-slate-700 dark:text-navy-100 font-medium"><a target="_blank" href="' + amzn_url + '" />'.concat(e, "</a></span>"))
            }
          }
          ,
          { 
            name: 'source',
            hidden: true
          },
          {
            name: "used_count",
            hidden: true
          },
          {
            name: "status",
            hidden: true
          },
          {
            name: "website_id",
            hidden: true
          }
        ],
        width: '100%',
        search: true,
        pagination: true,
        server: {
          url: "https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/get_website_products_by_type/" + website_id + "," + type,
          then: (data) => data.data.map((product) => [product.id, product.source, product.time_since, product.preview_image, product.name, product.identifier,  product.used_count, product.status, product.website_id]),
        }
      });
    
    }(jQuery));
  }


  function remove_limitations_on_functionality()
  {
    (function ($) {
      
    //check package type
    //disable the limitations for the free package
    //product_review_seo_keyword
    const product_review_seo_keyword = document.getElementById("product_review_seo_keyword");
    //remomve the tooltip
    product_review_seo_keyword.removeAttribute('x-tooltip.interactive.content');
    $('#product_review_seo_keyword').attr('readonly', false);


    //create_tags
    $('#create_tags').prop('checked', false);
    $('#create_tags').attr('disabled', false);
    const create_tags_text = document.getElementById("create_tags_text");
    create_tags_text.removeAttribute('x-tooltip.interactive.content');
    

    //connect_categories
    $('#connect_categories').prop('checked', false);
    $('#connect_categories').attr('disabled', false);
    const connect_categories_text = document.getElementById("connect_categories_text");
    connect_categories_text.removeAttribute('x-tooltip.interactive.content');

    //create_pros_cons
    $('#create_pros_cons').prop('checked', true);
    $('#create_pros_cons').attr('disabled', false);
    const create_pros_cons_text = document.getElementById("create_pros_cons_text");
    create_pros_cons_text.removeAttribute('x-tooltip.interactive.content');

    //create_faqs
    $('#create_faqs').prop('checked', true);
    $('#create_faqs').attr('disabled', false);
    const create_faqs_text = document.getElementById("create_faqs_text");
    create_faqs_text.removeAttribute('x-tooltip.interactive.content');

    //create_conclusion
    $('#create_conclusion').prop('checked', true);
    $('#create_conclusion').attr('disabled', false);
    const create_conclusion_text = document.getElementById("create_conclusion_text");
    create_conclusion_text.removeAttribute('x-tooltip.interactive.content');
        
     

    }(jQuery));
  }



  function load_comparison_products()
  {
    (function ($) {
      var website_id = $("#website_id").val();
      var type= 'comparison';

      //clear the comparison_products_list products list
      $("div#comparison_products_list").html('');

      $("div#comparison_products_list").Grid({
        columns: [
          {
            name: "Delete",
            formatter: function(e,row,cell) {
              var prod_identifier = row._cells[5].data;
              return Gridjs.html('<button id="delete_bt_'+prod_identifier+'" data-identifier="' + prod_identifier + '" onclick="remove_prod(this)" style="background-color:#6c6c6c" class="btn h-8 w-8 rounded-full p-0 font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90"><i class="fa-regular fa-trash-alt"></i></button>')
            }
          }, 
          {
            name: "Actions",
            formatter: function(e,row,cell) {

              var bt_html = "";
              var prod_status = row._cells[7].data;
              var used_count = row._cells[6].data;
              var prod_identifier = row._cells[5].data;
              var prod_img = row._cells[3].data;
              var prod_name = row._cells[4].data;
              //remove the " from the name
              prod_name = prod_name.replace(/"/g, "");
              //remove the ' from the name
              prod_name = prod_name.replace(/'/g, "");

              var prod_website_id = row._cells[8].data;
              if (ooc == false)
              {
                if (prod_status == 'Ready')
                {
                  if (used_count > 0)
                  {
                    bt_html = '<button onclick="add_to_comparison_tab(this)" data-identifier="' + prod_identifier + '" data-type="comparison" data-img="' + prod_img + '" data-productname="' + prod_name + '" id="' + prod_identifier + '"  title="Click to add this product to comparison" class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90" style="background-color:#0c0b0c33 !important;min-width:88px"><span>Add</span></button>';
                  }
                  else
                  {
                    bt_html = '<button onclick="add_to_comparison_tab(this)" data-identifier="' + prod_identifier + '" data-type="comparison" data-img="' + prod_img + '" data-productname="' + prod_name + '" id="' + prod_identifier + '"  title="Click to add this product to comparison" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90" style="min-width:88px"><span>Add</span></button>';
                  }
                  
                }
                else if (prod_status == 'Failed')
                {
                  bt_html = '<button title="Data preparation has failed, we are sorry, Gizzmo team will check it out, You can try again or try a different product" data-websiteid="' + prod_website_id + '" data-identifier="' + prod_identifier + '" onclick="prepare(this)" class="btn bg-warning font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90" style="background-color:#d63638 !important;min-width:88px">Failed</button>';
                }
                else if (prod_status == 'Curated')
                {
                  bt_html = '<button title="Click to prepare product data with Gizzmo AI" data-websiteid="' + prod_website_id + '" data-identifier="' + prod_identifier + '" onclick="prepare(this)" class="btn bg-warning font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90" style="min-width:88px">Prepare</button>';
                }
                else if ( prod_status == 'in_progress' || prod_status == 'In_Progress')
                {	
                  bt_html = '<img src="images/loading.gif" style="position: absolute;width: 16px;margin-top: 1px;"><span  class="nav-link status_text" style="margin-left: 20px;" >Preparing AI</span>'
                }
                else if ( prod_status == 'Waiting_For_Analysis' || prod_status == 'in-queue')
                {
                  bt_html = '<span  class="nav-link status_text" ><svg style="position: relative;top: 2px;left: -4px;float: left;" fill="#512fb7" height="15px" width="15px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 	 viewBox="0 0 60 60" xml:space="preserve"><g>	<path d="M54,58h-3v-4h-5V43.778c0-2.7-1.342-5.208-3.589-6.706L31.803,30l10.608-7.072C44.658,21.43,46,18.922,46,16.222V6h5V2h3		c0.552,0,1-0.447,1-1s-0.448-1-1-1h-3h-1H10H9H6C5.448,0,5,0.447,5,1s0.448,1,1,1h3v4h5v10.222c0,2.7,1.342,5.208,3.589,6.706		L28.197,30l-10.608,7.072C15.342,38.57,14,41.078,14,43.778V54H9v4H6c-0.552,0-1,0.447-1,1s0.448,1,1,1h3h1h40h1h3		c0.552,0,1-0.447,1-1S54.552,58,54,58z M18.698,21.264C17.009,20.137,16,18.252,16,16.222V6h28v10.222		c0,2.03-1.009,3.915-2.698,5.042L30,28.798L18.698,21.264z M16,43.778c0-2.03,1.009-3.915,2.698-5.042L30,31.202l11.302,7.534		C42.991,39.863,44,41.748,44,43.778V54H16V43.778z"/>	<path d="M20.917,17.936C20.343,17.553,20,16.912,20,16.222V14c0-0.553-0.448-1-1-1s-1,0.447-1,1v2.222		c0,1.361,0.676,2.624,1.808,3.378l4.638,3.092c0.17,0.113,0.363,0.168,0.554,0.168c0.323,0,0.64-0.156,0.833-0.445		c0.306-0.46,0.182-1.08-0.277-1.387L20.917,17.936z"/>	<path d="M40.192,41.26l-4.638-3.092c-0.46-0.307-1.08-0.183-1.387,0.277c-0.306,0.46-0.182,1.08,0.277,1.387l4.638,3.092		C39.657,43.307,40,43.947,40,44.638v2.222c0,0.553,0.448,1,1,1s1-0.447,1-1v-2.222C42,43.276,41.324,42.014,40.192,41.26z"/></g></svg> Queued For AI</span>'
                }
              }
              else
              {
                bt_html = '<button title="You have used all your credits, please upgrade your package" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90" style="min-width:88px;background-color:#e4e8f0">Add</button>';
              }


              //var input_img = "";
              //var input_name = "";
              //var input_websiteid = "";
              var action_div_html = "";

              //if (prod_status !="Curated")
              //{
              //    input_img = '<input type="hidden" name="img_url_' + prod_identifier + '" value="' + prod_img + '"></input>';
              //    input_name = '<input type="hidden" name="product_name_' + prod_identifier + '" value="' + prod_name + '"></input>';
              //    input_websiteid = '<input type="hidden" name="websiteid_' + prod_identifier + '" value="' + prod_website_id + '"></input>';
              //    action_div_html = '<div id="action_' + prod_identifier + '">' + bt_html +  input_img + input_name + input_websiteid + '</div>';
              //}
              //else
              //{
              action_div_html = '<div id="action_' + prod_identifier + '">' + bt_html + '</div>';
              //}

              
              //if (prod_status == 'Ready')
              //{
              //  action_div_html = '<form method="post">' + action_div_html + '</form>';
              //  return Gridjs.html(action_div_html)
              //}
              return Gridjs.html(action_div_html)
            }
          }
          ,
          {
            name: "since",
            formatter: function(e) {
                return Gridjs.html('<div class="flex shrink-0 items-center space-x-1"><svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-slate-400 dark:text-navy-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg><p>' + e + '</p></div>')
            }
          }
          ,
          {
            name: "Image",
            formatter: function(e) {
                return Gridjs.html('<img class="mask rounded-lg" style="width:35px;height:35px" src="'.concat(e,'"/>'))
            }
          }
          ,
          {
            name: "Name",
            formatter: function(e,row,cell) {

                amzn_url = "https://" + row._cells[1].data + "/dp/" + row._cells[5].data;
                //trim the name to 80 characters
                if (e.length > 55)
                {
                    e = e.substring(0, 55) + '...';
                }
                return Gridjs.html('<span class="text-slate-700 dark:text-navy-100 font-medium"><a target="_blank" href="' + amzn_url + '" />'.concat(e, "</a></span>"))
            }
          }
          ,
          { 
            name: 'source',
            hidden: true
          },
          {
            name: "used_count",
            hidden: true
          },
          {
            name: "status",
            hidden: true
          },
          {
            name: "website_id",
            hidden: true
          }
        ],
        width: '100%',
        search: true,
        pagination: true,
        server: {
          url: "https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/get_website_products_by_type/" + website_id + "," + type,
          then: (data) => data.data.map((product) => [product.id, product.source, product.time_since, product.preview_image, product.name, product.identifier,  product.used_count, product.status, product.website_id]),
        }
      });
    













    }
    (jQuery));



  }

  function get_post_topics()
  {
    (function ($) {
      //get the subjct from the input

      //change the button text to loading
      
      //get the package type
      var package_type = $('#package_type').val();



      var subject = $('#general_subject').val();
      if (subject == '')
      {
        alert('Please enter a subject');
        return;
      }

      $('#get_post_topics_bt').html('Loading...');

      $('#affiliate_seo_div').hide();
      $('#create_general_bt').hide();
      

      subject = subject.replace(',', '');
      subject = subject.replace(' ', '%20');

      $.ajax({
        url: 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/get_subject_topics/' + subject,
        type: 'GET',
        success: function (data) {
          $('#get_post_topics_bt').html('Get More Post Topics');
          if (data.length > 0)
          {
            $("#topics_list_div").css("display", "block");
            //clear the ul
            $('#suggested_topics_list').html('');

            var all_topics_html = "";
            for (var i = 0; i < data.length; i++) {

              topic = data[i];
              topic = topic.replace("'", "");

              var one_topic = "";
              if (package_type == "Free")
              {
                if (i <= 2)
                {
                  one_topic = '<label class="flex items-center space-x-2 chckbox">' +
                              '<input  onchange="topic_handleCheckChange(this);" name="topic_select" value="' + topic + '" class="topics_checkbox form-checkbox is-basic h-5 w-5 rounded bg-slate-100 border-slate-400/70 checked:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:bg-navy-900 dark:border-navy-500 dark:checked:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" type="checkbox" />' +
                              '<p>' + topic + '</p>' +
                              '</label>';
                }
                else
                {
                  one_topic = '<label class="flex items-center space-x-2 chckbox">' +
                              '<input disabled="disabled" name="topic_select" value="' + topic + '" class="topics_checkbox form-checkbox is-basic h-5 w-5 rounded bg-slate-100 border-slate-400/70 checked:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:bg-navy-900 dark:border-navy-500 dark:checked:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" type="checkbox" />' +
                              '<p>🔒 Upgrade to Unlock! : ' + topic + '</p>' +
                              '</label>';
                }
              }
              else
              {
                one_topic = '<label class="flex items-center space-x-2 chckbox">' +
                              '<input  onchange="topic_handleCheckChange(this);" name="topic_select" value="' + topic + '" class="topics_checkbox form-checkbox is-basic h-5 w-5 rounded bg-slate-100 border-slate-400/70 checked:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:bg-navy-900 dark:border-navy-500 dark:checked:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" type="checkbox" />' +
                              '<p>' + topic + '</p>' +
                              '</label>';
              }
              


              all_topics_html += one_topic;


            }

            $('#suggested_topics_list').html(all_topics_html);

            get_similer_posts();
          }
      
        }

      });

    }(jQuery));
    
  }


  function get_listicle_titles()
  {
    (function ($) {
      //get the subjct from the input

      //change the button text to loading
      
      //get the package type
      var package_type = $('#package_type').val();

      //fill the action_type input
      $('#action_type').val('listicle');
      $('#listicle_action_type').val('listicle');



      var key_phrase = $('#listicle_seo_keyphrase').val();
      if (key_phrase == '')
      {
        alert('Please enter SEO Keyphrase');
        return;
      }

      $('#get_listicle_titles_bt').html('<img src="images/loading.gif" style="position: absolute;width: 16px;margin-top: 1px;margin-left: 326px;"> Loading, Please Wait...(may take a minute)');


      //$('#affiliate_seo_div').hide();
      //$('#create_general_bt').hide();
      

      key_phrase = key_phrase.replace(',', '');
      //key_phrase = key_phrase.replace(' ', '%20');

      data = {
        "key_phrase": key_phrase
      }
      
      $.ajax({
        url: 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/get_listicle_titles_list',
        type: 'POST',
        data: JSON.stringify(data),
        contentType: "application/json",
        success: function (data) {
          console.log(data);
          data = data.data.titles;
          $('#get_listicle_titles_bt').html('Get More Listicle Titles');
          if (data.length > 0)
          {
            $("#listicles_list_div").css("display", "block");
            //clear the ul
            $('#suggested_listicle_titles_list').html('');

            var all_titles_html = "";
            for (var i = 0; i < data.length; i++) {
              listicle_title = data[i]['title'];
              listicle_title = listicle_title.replace("'", "");
              listicle_expected_section_number = 15;
              
              //check if expected_section_number is in the data
              if ('expected_section_number' in data[i]) {
                listicle_expected_section_number = data[i]['expected_section_number'];
              }

              //var one_title = "";
              //if (package_type == "Free")
              //{
              //  if (i <= 2)
              //  {
              //    one_title = '<label class="flex items-center space-x-2 chckbox">' +
              //                '<input  onchange="listicle_handleCheckChange(this);" name="listicle_select" value="' + listicle_title + '" data-expected-section-number="' + listicle_expected_section_number + '" class="listicle_checkbox form-checkbox is-basic h-5 w-5 rounded bg-slate-100 border-slate-400/70 checked:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:bg-navy-900 dark:border-navy-500 dark:checked:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" type="checkbox" />' +
              //                '<p>' + listicle_title + '</p>' +
              //                '</label>';
              //  }
              //  else
              //  {
              //    one_title = '<label class="flex items-center space-x-2 chckbox">' +
              //                '<input disabled="disabled" name="listicle_select" value="' + listicle_title + '" data-expected-section-number="' + listicle_expected_section_number + '" class="listicle_checkbox form-checkbox is-basic h-5 w-5 rounded bg-slate-100 border-slate-400/70 checked:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:bg-navy-900 dark:border-navy-500 dark:checked:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" type="checkbox" />' +
              //                '<p>🔒 Upgrade to Unlock! : ' + listicle_title + '</p>' +
              //                '</label>';
              //  }
              //}
              //else
              //{
                one_title = '<label class="flex items-center space-x-2 chckbox">' +
                              '<input  onchange="listicle_handleCheckChange(this);" name="listicle_select" value="' + listicle_title + '" data-expected-section-number="' + listicle_expected_section_number + '" class="listicle_checkbox form-checkbox is-basic h-5 w-5 rounded bg-slate-100 border-slate-400/70 checked:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:bg-navy-900 dark:border-navy-500 dark:checked:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" type="checkbox" />' +
                              '<p>' + listicle_title + '</p>' +
                              '</label>';

              //}

              all_titles_html += one_title;
              
            }

            $('#suggested_listicle_titles_list').html(all_titles_html);

           
          }
 



           
        }

      });


    }(jQuery));
    
  }



  function get_listicle_paragraphs()
  {
    (function ($) {

      //check if the list of criterias is empty 
      if ($('#selected_shared_paragraphs_draggable').children().length > 0)
      {
        return;
      }
      else
      {
        //add a message to the user and a loading gif to show that the data is being loaded
        $('#selected_shared_paragraphs_draggable').html('<div style="margin-top: -61px;padding-left: 384PX;font-style: italic;"><img src="images/loading.gif" style="position: absolute;width: 16px;margin-top: 1px;margin-left: 246px;"> Loading, Please Wait...(may take a minute)</div>');
      }


      var listicle_title = selected_listicle_title.value;

      data = {
        "listicle_title": listicle_title,
        "sections_count": listicle_expected_section_number
      }
      
      var products_shared_paragraphes_list_string = ""
      var existing_paragraphs = [];
      var existing_criterias = [];
      $.ajax({
        url: 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/get_listicle_paragraphs_list',
        type: 'POST',
        data: JSON.stringify(data),
        contentType: "application/json",
        success: function (data) {
          console.log(data);
          data = data.data;
          title = data.Title
          sections = data.Sections
          $('#selected_shared_paragraphs_draggable').html('');
          debugger;
          $('.criteria_name').each(function(){
            existing_criterias.push($(this).text());
          });
                
          for (var i = 0; i < sections.length; i++) {
            criteria = sections[i]['Title'];
            criteria_desc = sections[i]['Section_description'];
            img_alt = sections[i]['Image_data']['alt'];

            features = criteria + "~" + criteria_desc + "~" + img_alt;
            products_shared_paragraphes_list_string += features + "^";
            
            
            criteria_identifier = convert_text_to_numbers(criteria);
            
            criteria = criteria.replace("'", "");
          

            one_prod = '<div  id="criteria_' + criteria_identifier + '" data-identifier="' + criteria_identifier + '" class="list__item" sortable-item="sortable-item">'
            one_prod += '<div style="padding-bottom:2px;padding-top:2px"  class="list__item-content">'
            one_prod += '<div class="list__item-description">'
            one_prod += '<div data-status="selected" data-imgalt="' + img_alt + '" data-criteria_desc="' + criteria_desc + '" data-criteria="' + criteria + '" data-identifier="' + criteria_identifier + '" onclick="remove_selected_paragraps(this)" style="cursor:pointer; background-color: #ffffff;float: left;height: 25px;width: 25px;margin-top: 5px;" class="one_paragraph btn h-8 w-8 rounded-full p-0 font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90"><i id="action_icon_' + criteria_identifier + '" class="fas fa-eye" style="font-size: 17px;line-height: 25px;padding-left: 1px;color: #6c6c6c;"></i></div>'
            one_prod += '<span class="prodname"><span class="criteria_name"><b>' + (i+1).toString() + '.</b> ' + criteria + '</span> (' + criteria_desc+ ')' + '</span>'
            one_prod += '</div>'
            one_prod += '</div>'
            one_prod += '<div class="list__item-handle" sortable-handle="sortable-handle"></div>'
            one_prod += '</div>'

            
            $('#selected_shared_paragraphs_draggable').append(one_prod);

            




          }
          //remove the last ^
          products_shared_paragraphes_list_string = products_shared_paragraphes_list_string.substring(0, products_shared_paragraphes_list_string.length - 1);
          debugger;
          $('#listicle_paragraphes_list').val(products_shared_paragraphes_list_string);
          
          $('#add_listicle_paragraphs_bt').show();
          

          //show the selected_shared_features_list_draggable
          //$("#selected_shared_features_list_draggable").css("display", "block");
          //show the selected_shared_features_draggable
          //$("#selected_shared_features_draggable").css("display", "block");





           
        }

      });


      return;

    }(jQuery));


    
     
    
  }



  function add_listicle_paragraphs()
  {
    (function ($) {
      //var package_type = $('#package_type').val();
      
      var loading_msg = '<div style="color:#333; text-decoration:none;cursor:none;padding-left: 370PX;font-style: italic;"><img src="images/loading.gif" style="position: absolute;width: 16px;margin-top: 1px;margin-left: 246px;"> Loading, Please Wait...(may take a minute)</div>'
      $('#add_listicle_paragraphs_bt').html(loading_msg);
      //remove the "text-decoration: underline;" from add_listicle_paragraphs_bt
      $('#add_listicle_paragraphs_bt').css('text-decoration', 'none');




      //$('#affiliate_seo_div').hide();
      //$('#create_general_bt').hide();

      //get the selected asins
      //var asins = $('#comparison_asins').val();
      //replace the , with -
      //asins = asins.replace(/,/g, '-');
      debugger;
      var existing_criterias = [];
      $('.one_paragraph').each(function(){
        //get the data-criteria value
        criteria = $(this).data('criteria');
        existing_criterias.push(criteria);
      });
      var index_counter = existing_criterias.length


      var products_shared_paragraphes_list_string = $('#listicle_paragraphes_list').val();


      //convert the existing_criterias to a string with , as a separator. but first check if none of the criterias has a , in it
      //if any of the criterias has a , in it, then replace it with a space and then convert the list to a string
      for (var i = 0; i < existing_criterias.length; i++) {
        if (existing_criterias[i].includes(","))
        {
          existing_criterias[i] = existing_criterias[i].replace(",", " ");
        }
      }
      existing_criterias = existing_criterias.join(',');

      data = {
        "existing_criterias": existing_criterias,
        "listicle_title": selected_listicle_title.value,
      }
      
      $.ajax({
        url: 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/get_more_listicle_paragraphs',
        type: 'POST',
        data: JSON.stringify(data),
        contentType: "application/json",
        success: function (data) {
          
          $('#add_listicle_paragraphs_bt').html('SUGGEST MORE PARAGRAPHS');
          $('#add_listicle_paragraphs_bt').css('text-decoration', 'underline');

            sections = data.data.Sections
            existing_sections = [];
            if (products_shared_paragraphes_list_string != "")
            {
              products_shared_paragraphes_list_string += "^";
            }

            for (var i = 0; i < sections.length; i++) {
              index_counter += 1;
              criteria = sections[i]['Title'];
              criteria_desc = sections[i]['Section_description'];
              img_alt = sections[i]['Image_data']['alt'];

              features = criteria + "~" + criteria_desc + "~" + img_alt;

              

              products_shared_paragraphes_list_string += features + "^";
              
               
              //check if the criteria already exists in the list of criterias
              if (existing_sections.includes(criteria))
              {
                continue;
              }
              existing_sections.push(criteria);

              criteria_identifier = convert_text_to_numbers(criteria);
              
              criteria = criteria.replace("'", "");
            

              one_prod = '<div  id="criteria_' + criteria_identifier + '" data-identifier="' + criteria_identifier + '" class="list__item" sortable-item="sortable-item">'
              one_prod += '<div style="padding-bottom:2px;padding-top:2px"  class="list__item-content">'
              one_prod += '<div class="list__item-description">'
              one_prod += '<div data-status="selected" data-imgalt="' + img_alt + '" data-criteria_desc="' + criteria_desc + '" data-criteria="' + criteria + '" data-identifier="' + criteria_identifier + '" onclick="remove_selected_paragraps(this)" style="cursor:pointer; background-color: #ffffff;float: left;height: 25px;width: 25px;margin-top: 5px;" class="one_paragraph btn h-8 w-8 rounded-full p-0 font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90"><i id="action_icon_' + criteria_identifier + '" class="fas fa-eye" style="font-size: 17px;line-height: 25px;padding-left: 1px;color: #6c6c6c;"></i></div>'
              one_prod += '<span class="prodname"><span class="criteria_name"><b>' + (index_counter).toString() + '.</b> ' + criteria + '</span> (' + criteria_desc+ ')' + '</span>'
              one_prod += '</div>'
              one_prod += '</div>'
              one_prod += '<div class="list__item-handle" sortable-handle="sortable-handle"></div>'
              one_prod += '</div>'

              
              $('#selected_shared_paragraphs_draggable').append(one_prod);

            }
            
            //remove the last ^
            products_shared_paragraphes_list_string = products_shared_paragraphes_list_string.substring(0, products_shared_paragraphes_list_string.length - 1);
            $('#listicle_paragraphes_list').val(products_shared_paragraphes_list_string);

 



           
        }

      });

    }(jQuery));
    
  }




  function get_shared_listicle_pargraphs_list()
  {
    (function ($) {
      //get all the divs with the class one_criteria 
      listicle_pargraphs_list = "";
      $('#selected_shared_paragraphs_draggable .one_paragraph').each(function(){
        var criteria = $(this).data('criteria');
        var criteria_desc = $(this).data('criteria_desc');
        var img_alt = $(this).data('imgalt');
        
        var one_paragraph = criteria + "~" + criteria_desc + "~" + img_alt;

        var identifier = $(this).data('identifier');
        var icon_class_name = $("#action_icon_" + identifier).attr('class');
        console.log(criteria);
        console.log(icon_class_name);
        if (icon_class_name.includes('fa-eye-slash'))
        {
          //skip this criteria
        }
        else
        {
          listicle_pargraphs_list += one_paragraph + "^";
        }

      });

      listicle_pargraphs_list = listicle_pargraphs_list.substring(0, listicle_pargraphs_list.length - 1);
      $('#listicle_paragraphes_list').val(listicle_pargraphs_list);
    }(jQuery));
  }







  //here
  function get_shared_features_list()
  {
    (function ($) {
      //get all the divs with the class one_criteria 
      products_shared_features_list = "";
      $('.one_criteria').each(function(){
        var criteria = $(this).data('criteria');
        var criteria_desc = $(this).data('criteria_desc');

        var identifier = $(this).data('identifier');
        var icon_class_name = $("#action_icon_" + identifier).attr('class');

        if (icon_class_name.includes('fa-eye-slash'))
        {
          //skip this criteria
        }
        else
        {
          var features = criteria + "~" + criteria_desc;
          products_shared_features_list += features + "^";
        }

      });

      products_shared_features_list = products_shared_features_list.substring(0, products_shared_features_list.length - 1);
      $('#products_shared_features_list').val(products_shared_features_list);
    }(jQuery));
  }



  function get_products_shared_features()
  {
    (function ($) {
      var package_type = $('#package_type').val();

      $('#get_products_shared_features_bt').html('Loading...');

      //$('#affiliate_seo_div').hide();
      //$('#create_general_bt').hide();

      //get the selected asins
      var asins = $('#comparison_asins').val();
      //replace the , with -
      asins = asins.replace(/,/g, '-');

      var existing_criterias = [];
      var existing_thematic_concepts = [];

      products_shared_features_list ="";

      $.ajax({
        url: 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/get_products_comparible_features/' + asins,
        type: 'GET',
        success: function (data) {
          //$('#get_post_topics_bt').html('Get More Post Topics');
          if (data == 'error')
          {
            $('#get_products_shared_features_bt').html('Get Shared Features');
            alert('Failed getting shared features, please try again');
          }
          else
          {
            //check if comparison_criterias is in the data
            if ('comparison_criterias' in data) {
            

              if (data.comparison_criterias.length > 0)
              {
                
                //get all the existing criterias and add them to the list of criterias, they are all input that have criteria_checkbox class
              
                
                $('.criteria_name').each(function(){
                  existing_criterias.push($(this).text());
                });
                
                for (var i = 0; i < data.comparison_criterias.length; i++) {
                  criteria = data.comparison_criterias[i]['criteria'];
                  criteria_desc = data.comparison_criterias[i]['criteria_description'];

                  features = criteria + "~" + criteria_desc;
                  products_shared_features_list += features + "^";
                  
                  
                  //check if the criteria already exists in the list of criterias
                  if (existing_criterias.includes(criteria))
                  {
                    continue;
                  }
                  existing_criterias.push(criteria);

                  criteria_identifier = convert_text_to_numbers(criteria);
                  
                  criteria = criteria.replace("'", "");
                

                  one_prod = '<div  id="criteria_' + criteria_identifier + '" data-identifier="' + criteria_identifier + '" class="list__item" sortable-item="sortable-item">'
                  one_prod += '<div style="padding-bottom:2px;padding-top:2px"  class="list__item-content">'
                  one_prod += '<div class="list__item-description">'
                  one_prod += '<div data-status="selected" data-criteria_desc="' + criteria_desc + '" data-criteria="' + criteria + '" data-identifier="' + criteria_identifier + '" onclick="remove_selected_shared_topic(this)" style="cursor:pointer; background-color: #ffffff;float: left;height: 25px;width: 25px;margin-top: 5px;" class="one_criteria btn h-8 w-8 rounded-full p-0 font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90"><i id="action_icon_' + criteria_identifier + '" class="fas fa-eye" style="font-size: 17px;line-height: 25px;padding-left: 1px;color: #6c6c6c;"></i></div>'
                  one_prod += '<span class="prodname"><span class="criteria_name">' + criteria + '</span> (' + criteria_desc+ ')' + '</span>'
                  one_prod += '</div>'
                  one_prod += '</div>'
                  one_prod += '<div class="list__item-handle" sortable-handle="sortable-handle"></div>'
                  one_prod += '</div>'

                  
                  $('#selected_shared_features_draggable').append(one_prod);

                  




                }
                //remove the last ^
                products_shared_features_list = products_shared_features_list.substring(0, products_shared_features_list.length - 1);
                $('#products_shared_features_list').val(products_shared_features_list);

                

                //show the selected_shared_features_list_draggable
                $("#selected_shared_features_list_draggable").css("display", "block");
                //show the selected_shared_features_draggable
                $("#selected_shared_features_draggable").css("display", "block");


                $("#thematic_concepts_list_div").css("display", "block");


                //schemas_lable un check
                $("#create_schema").removeAttr("checked");
                //make the input disabled
                $("#create_schema").prop('disabled', true);
                //add a title to the input that sais that there is no schema for comparison posts
                $("#schemas_lable").attr("title", "There is no schema for comparison posts");


                var container_2 = document.getElementById('thematic_concepts_list');
                var all_thematic_concepts_html = "";
                var existing_thematic_concepts_html = $('#thematic_concepts_list').html();
                all_thematic_concepts_html = existing_thematic_concepts_html;
                for (var i = 0; i < data.thematic_post_concepts.length; i++) {
                  thematic_concept = data.thematic_post_concepts[i]['theme_name'];
                  //check if the criteria already exists in the list of criterias
                  if (existing_thematic_concepts.includes(thematic_concept))
                  {
                    continue;
                  }
                  thematic_concept_identifier = convert_text_to_numbers(thematic_concept);
                  thematic_concept_desc = data.thematic_post_concepts[i]['description'];
                  thematic_concept = thematic_concept.replace("'", "");
                  one_thematic_concept = '<label class="flex items-center space-x-2 chckbox">' +
                                '<input id="thematic_concept_chk_' + thematic_concept_identifier + '"  onchange="thematic_concept_handleCheckChange(this);" data-description="' + thematic_concept_desc + '" name="thematic_concept_select" value="' + thematic_concept + '" class="thematic_concept_checkbox form-checkbox is-basic h-5 w-5 rounded bg-slate-100 border-slate-400/70 checked:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:bg-navy-900 dark:border-navy-500 dark:checked:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" type="checkbox" />' +
                                '<p title="'+ thematic_concept_desc + '" >' + thematic_concept + ' (' + thematic_concept_desc + ')' + '</p>' +
                                '</label>';
                  //append the criteria to the existing criterias
                  container_2.insertAdjacentHTML('beforeend', one_thematic_concept);
                  all_thematic_concepts_html += one_thematic_concept;
                }





                //$('#suggested_products_shared_features_list').html(all_criterias_html);

                $('#get_products_shared_features_bt').html('Get More Shared Features');



                //show the affiliate_seo_div
                $("#affiliate_seo_div").show();
                $("#scheme_monitization_div").show();
                $("#tags_categories_div").show();
                $("#extended_content_div").show();
                $("#extended_conclusion_content_div").show();
                $("#create_comparison_bt").show();

                $("#action_type").val('comparison');


                remove_limitations_on_functionality();

                
                //
                get_similer_posts();

              }
            }
            else
            {
              $('#get_products_shared_features_bt').html('Get More Shared Features');
              alert('No shared features found, please try again');
            }
          }
      
        }

      });

    }(jQuery));
    
  }



  function listicle_handleCheckChange(checkbox) {

    (function ($) {
      if(checkbox.checked == true){
        listicle_expected_section_number = checkbox.getAttribute("data-expected-section-number");
        $('.listicle_checkbox').each(function(){
          if ($(this)[0].value != checkbox.value)
          {
            $(this).prop('checked', false);
            //
          }
        });

        $('#expected_sections_number').val(listicle_expected_section_number);
        $('#selected_listicle_title').val(checkbox.value);
      }else{

        $('#expected_sections_number').val('');
        $('#selected_listicle_title').val('');

      }


      if ($('#selected_listicle_title').val() != "")
      {
        //$("#affiliate_seo_div").css("display", "grid");


        $("#listicle_tags_categories_div").css("display", "grid");
        $("#listicle_extended_content_div").css("display", "grid");
        $("#listicle_extended_conclusion_content_div").css("display", "grid");
        $("#listicle_ai_images").css("display", "grid");
        $("#listicle_affiliate_seo_div").css("display", "grid");
        $("#listicle_internal_linking_div").css("display", "grid");
        
        
        
        
        $("#submit_listicle_div").show();
        $("#long_listicle_text").show();
        $("#listicle_spacer").show();
        $("#listicle_help_section").show();

        $("#paragraphs_list_div").show();
        

        //here, get the listicle paragraph titles and show them as a sortable list, similer to the shared features list
        //listicle_title = $('#selected_listicle_title').val();
        //listicle_title = listicle_title.replace("'", "");
        //listicle_expected_section_number = $('#expected_sections_number').val();
        //get_listicle_paragraphs(listicle_title, listicle_expected_section_number);

        //check if the selected_shared_paragraphs_draggable is empty
        list_was_filled = false;
        if ($('#selected_shared_paragraphs_draggable').children().length > 0)
        {
          list_was_filled = true;
        }

        $('#selected_shared_paragraphs_draggable').html('');
        $('#add_listicle_paragraphs_bt').hide();
        if (list_was_filled == true)
        {
           //initiate a click on the listicle_pargraphs_title_click
          $('#listicle_pargraphs_title_click').click();//this is meant to close the slide up
        }
       
        
        get_listicle_similer_posts();
      }
      else{
        //$("#affiliate_seo_div").css("display", "none");
        $("#listicle_tags_categories_div").css("display", "none");
        $("#listicle_extended_content_div").css("display", "none");
        $("#listicle_extended_conclusion_content_div").css("display", "none");
        $("#listicle_ai_images").css("display", "none");
        $("#listicle_affiliate_seo_div").css("display", "none");
        $("#listicle_internal_linking_div").css("display", "none");

        $("#submit_listicle_div").hide();
        $("#long_listicle_text").hide();
        $("#listicle_spacer").hide();
        $("#listicle_help_section").hide();
        

        //$("#seo_keyphrase_div").css("display", "none");
        //$("#affiliate_tag_div").css("display", "none");
      }
    }(jQuery));
  }




  function listicle_create_ai_images_handleCheckChange(checkbox) {

    (function ($) {
      if(checkbox.checked == true){
        //uncheck the listicle_create_images_placeholders checkbox
        $('#listicle_create_images_placeholders').prop('checked', false);
      }
      else{
        //check the listicle_create_images_placeholders checkbox
        $('#listicle_create_images_placeholders').prop('checked', true);
      }
    }(jQuery));
  }

  function listicle_create_images_placeholders_handleCheckChange(checkbox) {
      
      (function ($) {
        if(checkbox.checked == true){
          //uncheck the listicle_create_ai_images checkbox
          $('#listicle_create_ai_images').prop('checked', false);
        }
        else{
          //check the listicle_create_ai_images checkbox
          $('#listicle_create_ai_images').prop('checked', true);
        }
      }(jQuery));
  }
  //


  function topic_handleCheckChange(checkbox) {

    (function ($) {
      if(checkbox.checked == true){

        $('.topics_checkbox').each(function(){
          if ($(this)[0].value != checkbox.value)
          {
            $(this).prop('checked', false);
          }
        });

        $('#selected_topic').val(checkbox.value);
      }else{

        $('#selected_topic').val('');
      }


      if ($('#selected_topic').val() != "")
      {
        $("#affiliate_seo_div").css("display", "grid");
        
        $("#create_general_bt").show();
        //$("#seo_keyphrase_div").css("display", "block");
        //$("#affiliate_tag_div").css("display", "block");
        
      }
      else{
        $("#affiliate_seo_div").css("display", "none");

        $("#create_general_bt").hide();

        //$("#seo_keyphrase_div").css("display", "none");
        //$("#affiliate_tag_div").css("display", "none");
      }
    }(jQuery));
  }

  function thematic_concept_handleCheckChange(checkbox) {

    (function ($) {
      if(checkbox.checked == true){

        //get the input value
        var thematic_concept = checkbox.value;
        var thematic_concept_desc = checkbox.getAttribute("data-description");
        var thme = thematic_concept + "~" + thematic_concept_desc; 
        $("#selected_thematic_concept").val(thme);

        $('.thematic_concept_checkbox ').each(function(){
          if ($(this)[0].value != checkbox.value)
          {
            $(this).prop('checked', false);
          }
        });
      }else{
      }
  
    }(jQuery));
  }

  function similer_post_handleCheckChange(checkbox) {

    (function ($) {

       
      if(checkbox.checked == true){
        //add this checkbox value to the selected_similar_post_ids input with a comma
        var selected_similar_post_ids = $('#selected_similar_post_ids').val();
        if (selected_similar_post_ids == "")
        {
          $('#selected_similar_post_ids').val(checkbox.value);
        }
        else{
          $('#selected_similar_post_ids').val(selected_similar_post_ids + ',' + checkbox.value);
        }
      }else{
        //remove this checkbox value from the selected_similar_post_ids input
        var selected_similar_post_ids = $('#selected_similar_post_ids').val();
        var selected_similar_post_ids_array = selected_similar_post_ids.split(',');
        var new_selected_similar_post_ids = "";
        for (var i = 0; i < selected_similar_post_ids_array.length; i++) {
          if (selected_similar_post_ids_array[i] != checkbox.value)
          {
            if (new_selected_similar_post_ids == "")
            {
              new_selected_similar_post_ids = selected_similar_post_ids_array[i];
            }
            else{
              new_selected_similar_post_ids = new_selected_similar_post_ids + ',' + selected_similar_post_ids_array[i];
            }
          }

        }
        $('#selected_similar_post_ids').val(new_selected_similar_post_ids);

      }

    }(jQuery));
  }

  function similer_listicle_post_handleCheckChange(checkbox) {

    (function ($) {

       
      if(checkbox.checked == true){
        //add this checkbox value to the selected_similar_post_ids input with a comma
        var selected_similar_post_ids = $('#selected_listicle_similar_post_ids').val();
        if (selected_similar_post_ids == "")
        {
          $('#selected_listicle_similar_post_ids').val(checkbox.value);
        }
        else{
          $('#selected_listicle_similar_post_ids').val(selected_similar_post_ids + ',' + checkbox.value);
        }
      }else{
        //remove this checkbox value from the selected_similar_post_ids input
        var selected_similar_post_ids = $('#selected_listicle_similar_post_ids').val();
        var selected_similar_post_ids_array = selected_similar_post_ids.split(',');
        var new_selected_similar_post_ids = "";
        for (var i = 0; i < selected_similar_post_ids_array.length; i++) {
          if (selected_similar_post_ids_array[i] != checkbox.value)
          {
            if (new_selected_similar_post_ids == "")
            {
              new_selected_similar_post_ids = selected_similar_post_ids_array[i];
            }
            else{
              new_selected_similar_post_ids = new_selected_similar_post_ids + ',' + selected_similar_post_ids_array[i];
            }
          }

        }
        $('#selected_listicle_similar_post_ids').val(new_selected_similar_post_ids);

      }

    }(jQuery));
  }

  function convert_text_to_numbers(text)
  {
    //convert the criteria to lowercase and then the latters to numbers
    text = text.toLowerCase();
    //remove white spaces
    text = text.replace(/ /g, '');
    text = text.replace(/a/g, '1');
    text = text.replace(/b/g, '2');
    text = text.replace(/c/g, '3');
    text = text.replace(/d/g, '4');
    text = text.replace(/e/g, '5');
    text = text.replace(/f/g, '6');
    text = text.replace(/g/g, '7');
    text = text.replace(/h/g, '8');
    text = text.replace(/i/g, '9');
    text = text.replace(/j/g, '10');
    text = text.replace(/k/g, '11');
    text = text.replace(/l/g, '12');
    text = text.replace(/m/g, '13');
    text = text.replace(/n/g, '14');
    text = text.replace(/o/g, '15');
    text = text.replace(/p/g, '16');
    text = text.replace(/q/g, '17');
    text = text.replace(/r/g, '18');
    text = text.replace(/s/g, '19');
    text = text.replace(/t/g, '20');
    text = text.replace(/u/g, '21');
    text = text.replace(/v/g, '22');
    text = text.replace(/w/g, '23');
    text = text.replace(/x/g, '24');
    text = text.replace(/y/g, '25');
    text = text.replace(/z/g, '26');

    //remove . and , from the text
    text = text.replace(/\./g, '');
    text = text.replace(/,/g, '');


    //convert the symbols to numbers
    text = text.replace(/-/g, '27');
    text = text.replace(/_/g, '28');
    text = text.replace(/!/g, '31');
    text = text.replace(/@/g, '32');
    text = text.replace(/#/g, '33');
    text = text.replace(/\$/g, '34');
    text = text.replace(/%/g, '35');
    text = text.replace(/\^/g, '36');
    text = text.replace(/&/g, '37');
    text = text.replace(/\*/g, '38');
    text = text.replace(/\(/g, '39');
    text = text.replace(/\)/g, '40');
    text = text.replace(/\[/g, '41');
    text = text.replace(/\]/g, '42');
    text = text.replace(/\{/g, '43');
    text = text.replace(/\}/g, '44');
    text = text.replace(/:/g, '45');
    text = text.replace(/;/g, '46');
    text = text.replace(/"/g, '47');
    text = text.replace(/'/g, '48');
    text = text.replace(/</g, '49');
    text = text.replace(/>/g, '50');
    text = text.replace(/\?/g, '51');
    text = text.replace(/\//g, '52');
    text = text.replace(/\\/g, '53');
    text = text.replace(/\|/g, '54');
    text = text.replace(/`/g, '55');
    text = text.replace(/~/g, '56');



    return text;
  }

  function criteria_handleCheckChange(checkbox) {

    (function ($) {

      var selected_criteria = "";
      var criteria_description = "";
      if(checkbox.checked == true){

        selected_criteria = checkbox.value;
        criteria_description = checkbox.getAttribute("data-description");

        



        //add the product identifier to the hidden input comparison_asins
        //var comparison_asins = $('#comparison_asins').val();
        //comparison_asins += identifier + ',';
        //$('#comparison_asins').val(comparison_asins);
        identifier = convert_text_to_numbers(selected_criteria);

        one_prod = '<div id="criteria_' + identifier + '" data-identifier="' + identifier + '" class="list__item" sortable-item="sortable-item">'
        one_prod += '<div class="list__item-content">'
        one_prod += '<div class="list__item-description">'
        one_prod += '<button data-identifier="' + identifier + '" onclick="remove_selected_shared_topic(this)" style="background-color:#6c6c6c;float: left;" class="btn h-8 w-8 rounded-full p-0 font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90"><i class="fa-regular fa-trash-alt"></i></button>'
        one_prod += '<span class="prodname">' + selected_criteria + ' (' + criteria_description+ ')' + '</span>'
        one_prod += '</div>'
        one_prod += '</div>'
        one_prod += '<div class="list__item-handle" sortable-handle="sortable-handle"></div>'
        one_prod += '</div>'

        
        $('#selected_shared_features_draggable').append(one_prod);

        //show the selected_shared_features_list_draggable
        $("#selected_shared_features_list_draggable").css("display", "block");
        //show the selected_shared_features_draggable
        $("#selected_shared_features_draggable").css("display", "block");
        
      }else{
        selected_criteria = checkbox.value;
        var identifier = convert_text_to_numbers(selected_criteria);
        var divid = 'criteria_' + identifier;
        $('#' + divid).remove();
      }



      
    }(jQuery));
  }


  function get_all_products(product_type)
  {
    (function ($) {

      if (product_type == 'review')
      {
        load_review_products();
        return;
      }
      else if (product_type == 'roundup')
      {


        $("#roundup_products_draggable").html('');
        $('#roundups_asins').val('');
        $("#product_review_form").hide();
        $("#selected_product_link_name").hide();

        $("#create_review_bt").hide();
        $("#create_general_bt").hide();
        $("#create_roundup_bt").hide();
        $("#create_comparison_bt").hide();
        $("#topics_list_div").hide();


        $("#post_categories_div").hide();
        $("#internal_linking_div").hide();
        $("#scheme_monitization_div").hide();
        $("#affiliate_seo_div").hide();
        $("#featured_image_change").hide();
        $("#comparison_products_draggable").hide();
        $("#general_products_draggable").hide();
        $("#products_list_draggable").show();
        $("#roundup_products_draggable").show();


        $("#product_list_featured_image_change").show();


        $("#tags_categories_div").hide();
        $("#extended_content_div").hide();
        $("#extended_conclusion_content_div").hide();

        $("#selected_shared_features_list_draggable").hide();
        $("#thematic_concepts_list_div").hide();
        $("#post_products_shared_features_div").hide();


        load_roundup_products();
        return;
  

        //
        
        
      }
      else if (product_type == 'general')
      {

        $("#general_products_draggable").html('');
        $("#suggested_topics_list").html('');

        $('#general_subject').val('');

        $('#general_asins').val('');
        $("#product_review_form").hide();
        $("#roundup_products_draggable").hide();
        $("#comparison_products_draggable").hide();
        

        $("#topics_list_div").hide();

        $("#selected_product_link_name").hide();

        $("#create_review_bt").hide();
        $("#create_general_bt").hide();
        $("#create_roundup_bt").hide();
        $("#create_comparison_bt").hide();

        $("#post_categories_div").hide();
        $("#internal_linking_div").hide();
        $("#scheme_monitization_div").hide();
        $("#affiliate_seo_div").hide();
        $("#featured_image_change").hide();

        $("#products_list_draggable").show();

        $("#product_list_featured_image_change").show();
        $("#general_products_draggable").show();
        
        $("#tags_categories_div").hide();
        $("#extended_content_div").hide();
        $("#extended_conclusion_content_div").hide();


        $("#selected_shared_features_list_draggable").hide();
        $("#thematic_concepts_list_div").hide();
        $("#post_products_shared_features_div").hide();
        $("#roundup_extended_content_div").hide();
        $("#roundup_content_div").hide();
        $("#roundup_ai_images").hide();


        load_general_products();

        return;      

      }
      else if (product_type == 'comparison')
      {
        //set the local storage "seen_new_compare_badge" to "true"
        localStorage.setItem("seen_new_compare_badge", "true");
        $("#new_compare_badge").hide();

        $("#comparison_products_draggable").html('');
        $("#suggested_topics_list").html('');

        $('#general_subject').val('');

        $('#general_asins').val('');
        $("#product_review_form").hide();
        $("#roundup_products_draggable").hide();


        $("#comparison_asins").val('');
        $("#comparison_products_draggable").hide();

        $("#topics_list_div").hide();

        $("#selected_product_link_name").hide();

        $("#create_review_bt").hide();
        $("#create_general_bt").hide();
        $("#create_roundup_bt").hide();

        $("#post_categories_div").hide();
        $("#internal_linking_div").hide();
        $("#scheme_monitization_div").hide();
        $("#affiliate_seo_div").hide();
        $("#featured_image_change").hide();

        $("#products_list_draggable").show();

        $("#product_list_featured_image_change").show();
        $("#comparison_products_draggable").show();
        
        $("#general_products_draggable").hide();

        $("#tags_categories_div").hide();
        $("#extended_content_div").hide();
        $("#extended_conclusion_content_div").hide();

        //clear the selected_shared_features_draggable
        $("#selected_shared_features_draggable").html('');
        //clear the thematic_concepts_list_div
        $("#thematic_concepts_list").html('');
        //hide the thematic_concepts_list_div
        $("#thematic_concepts_list_div").hide();

        //clear the internal_linking_div
        $("#internal_linking_div").html('');
        //hide the internal_linking_div
        $("#internal_linking_div").hide();
        
        $("#roundup_extended_content_div").hide();
        $("#roundup_content_div").hide();
        $("#roundup_ai_images").hide();
        
        
        //get package type
        var package_type = $('#package_type').val();
        if (package_type == 'Free')
        {
          //check if the user has used all the comparison credits
          var comparison_credits = $('#comparison_credits').val();
          if (comparison_credits < 3)
          {
            load_comparison_products();
          }
        }
        else
        {
          load_comparison_products();
        }
        return;
    
      }
    
    }(jQuery));
  }


  function check_free_listicles_comparisons()
  {
    (function ($) {
      website_id = $('#website_id').val();

      $.ajax({
        url: "https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/get_website_content_created_counts/" + website_id,
        type: 'GET',
        success: function (data) {
           
            var listicles_used = data.listicle;
            var comparisons_used = data.comparison;
             
            if (listicles_used == 0)
            {
              $("#free_no_listicles_yet").show();
            }
            else if (listicles_used < 3)
            {
              $("#free_no_listicles_yet").hide();
              $("#some_listicles_used").show();
              $("#listicle_credits_used").html(listicles_used);
              var credits_left = 3 - listicles_used;
              $("#listicle_credits_left").html(credits_left);
              
            }
            else
            {
              $("#free_no_listicles_yet").hide();
              $("#some_listicles_used").hide();
              $("#all_listicles_used").show();
              $("#listicle_topic_div").html('');

              $("#long_listicle_text").hide();
              $("#listicle_spacer").hide();
              $("#listicle_help_section").hide();

            }

            $("#comparison_credits").val(comparisons_used);
            if (comparisons_used == 0)
            {
              $("#free_no_comparisons_yet").show();

              //product_review_seo_keyword
            }
            else if (comparisons_used < 3)
            {
              $("#free_no_comparisons_yet").hide();
              $("#some_comparisons_used").show();
              $("#comparisons_credits_used").html(comparisons_used);
              var credits_left = 3 - comparisons_used;
              $("#comparisons_credits_left").html(credits_left);
              
            }
            else
            {
              $("#free_no_comparisons_yet").hide();
              $("#some_comparisons_used").hide();
              $("#all_comparisons_used").show();
              $("#help_comparison_section").hide();
              $("#comparison_products_list").html('');
            }

          
            
        }
      });

    }(jQuery));

  }


  function show_listicle_creation_ui()
  {
    (function ($) {

      $("#general_products_draggable").html('');
      $("#suggested_topics_list").html('');
      $('#general_subject').val('');
      $('#general_asins').val('');
      $("#product_review_form").hide();
      $("#roundup_products_draggable").hide();
      $("#comparison_products_draggable").hide();
      $("#topics_list_div").hide();
      $("#selected_product_link_name").hide();
      $("#create_review_bt").hide();
      $("#create_general_bt").hide();
      $("#create_roundup_bt").hide();
      $("#create_comparison_bt").hide();
      $("#post_categories_div").hide();
      $("#internal_linking_div").hide();
      $("#scheme_monitization_div").hide();
      $("#affiliate_seo_div").hide();
      $("#featured_image_change").hide();
      $("#products_list_draggable").show();
      $("#product_list_featured_image_change").show();
      $("#general_products_draggable").show();
      $("#tags_categories_div").hide();
      $("#extended_content_div").hide();
      $("#extended_conclusion_content_div").hide();
      $("#selected_shared_features_list_draggable").hide();
      $("#thematic_concepts_list_div").hide();
      $("#post_products_shared_features_div").hide();

      $("#listicle_creation_ui").show();

      //set the local storage "seen_new_listicle_badge" to "true"
      localStorage.setItem("seen_new_listicle_badge", "true");
      $("#new_listicle_badge").hide();

      
      //get the package type
      var package_type = $('#package_type').val();
      if (package_type == 'Free')
      {
        check_free_listicles_comparisons();
      }

    
    }(jQuery));
  }

  function load_onboarding_page()
  {
    (function ($) {
      $("#main_gizzmo").hide();
      $("#connect_token").hide();
      $("#onboarding").show();
    }(jQuery));
  }

  function validateEmail(email)
  {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
  }

  function extractDomainWithProtocolAndWWW(url) {
    // Extract the protocol (http:// or https://) if present
    var protocolMatch = url.match(/^(https?:\/\/)/);
    var protocol = protocolMatch ? protocolMatch[0] : '';

    // Remove protocol (http:// or https://) if present
    url = url.replace(/^(https?:\/\/)?(www\.)?/, '');

    // Extract domain (everything before the next '/')
    var domain = url.split('/')[0];

    return protocol + domain;
  }




  function check_domain_status(domain)
  {
    (function ($) {
    
    
        $.ajax({
          url: 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/check_domain_status_and_first_prod_import',
          type: 'POST',
          data: {
              'domain':domain
          },
          success: function (data) {
              if (data.message == 'imported_product')
              {
                  
                  localStorage.setItem("gizzmo_token", data.token);
                  localStorage.setItem("token", data.token);
                  localStorage.setItem("extension_activated", "true");
                  get_website_data();
              }
              else if (data.message == 'not_imported_product')
              {
                  load_onboarding_page();

                  localStorage.setItem("gizzmo_token", data.token);
                  localStorage.setItem("token", data.token);
                  localStorage.setItem("extension_activated", "false");

                  $("#token").html(data.token);
                  switch_from_step_1_to_step_2();

              }
              else if (data.message == 'Not_Activated')
              { 
                  load_onboarding_page();

                  localStorage.setItem("gizzmo_token", data.token);
                  localStorage.setItem("token", data.token);
                  localStorage.setItem("extension_activated", "false");

                  $("#token").html(data.token);
                  switch_from_step_1_to_step_2();
              }
              else if (data.message == 'Does not Exist')
              {
                load_onboarding_page();
              }
              else
              {
                  alert("Error, try again later, or contact support");
              }
          }
        });
    
    }(jQuery));
  
  }



  function complete_profile()
  {
    (function ($) {
      var plugin_version = $("#plugin_version").val();
      var name = $('#name').val();
      var email = $('#email').val();
      var domain = $('#domain').val();
      var aggree_recive_emails_chk = $('#aggree_recive_emails_chk').is(":checked");
      var aggree_terms_chk = $('#aggree_terms_chk').is(":checked");


      var password = $('#password').val();
      var password_confirm = $('#password_confirmation').val();



      if (name == "")
      {
        alert('Please enter your name');
        return;
      }

      if (email == "")
      {
        alert('Please enter your email');
        return;
      }
      else
      {
        //check if email is valid
        var email_valid = validateEmail(email);
        if (email_valid == false)
        {
          alert('Please enter a valid email');
          return;
        }
      }

      if(password == "" || password_confirm == "")
      {
        alert('Please enter a password');
        return;
      }
      else
      {
        if (password.length < 8)
        {
          alert('Password must be at least 8 characters');
          return;
        }
        if (password != password_confirm)
        {
          alert('Passwords do not match');
          return;
        }
      }








      if (aggree_terms_chk == false)
      {
        alert('Please read and agree to terms and conditions and privacy policy');
        return;
      }

      var data = {
        name: name,
        email: email,
        domain: domain,
        password: password,
        plugin_version: plugin_version,
        recive_emails: aggree_recive_emails_chk
      };

    

      $.ajax({
        url: 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/complete_profile',
        type: 'POST',
        data: JSON.stringify(data),
        contentType: "application/json",
        success: function (data) {

          $("#token").html(data.token);
          localStorage.setItem("gizzmo_token", data.token);
          localStorage.setItem("website_id", data.website_id);
          switch_from_step_1_to_step_2();
        }

      });
    
    }(jQuery));

  }

  function switch_from_step_1_to_step_2()
  {
    (function ($) {
      $("#step_1_hexagon").removeClass("bg-primary");
      $("#step_1_hexagon").addClass("bg-secondary");

      $("#step_1_title").removeClass("text-primary");
      $("#step_1_title").addClass("text-base");

      $("#step_1_fa_icon").removeClass("fa-user text-base");
      $("#step_1_fa_icon").addClass("fa-solid fa-check text-base");


      $("#step_2_hexagon").removeClass("bg-slate-200 text-slate-500");
      $("#step_2_hexagon").addClass("bg-primary text-white");

      $("#step_2_title").removeClass("text-slate-500");
      $("#step_2_title").addClass("text-primary");

      $("#step_1").hide();
      $("#step_2").show();
    }(jQuery));
  }
  function switch_from_step_2_to_step_3()
  {
    (function ($) {
      $("#step_2_hexagon").removeClass("bg-primary");
      $("#step_2_hexagon").addClass("bg-secondary");

      $("#step_2_title").removeClass("text-primary");
      $("#step_2_title").addClass("text-base");

      $("#step_2_fa_icon").removeClass("fa fa-wordpress");
      $("#step_2_fa_icon").addClass("fa-solid fa-check text-base");


      $("#step_3_hexagon").removeClass("bg-slate-200 text-slate-500");
      $("#step_3_hexagon").addClass("bg-primary text-white");

      $("#step_3_title").removeClass("text-slate-500");
      $("#step_3_title").addClass("text-primary");

      $("#step_2").hide();
      $("#step_3").show();
    }(jQuery));
  }

  function copyToClipboard() {
    (function ($) {
      var element = $("#token");

      var $temp = $("<input>");
      $("body").append($temp);
      $temp.val($(element).text()).select();
      document.execCommand("copy");
      $temp.remove();

      $("#token_copied").trigger('click');
    }(jQuery));
  }
  function validate_extension_install()
  {
    (function ($) {
      $("#continue_bt_validate").html('<i class="fa fa-spinner fa-spin"></i> Validating, Please wait...');
      $("#continue_bt_validate").attr('disabled','disabled');
      $("#continue_arrow").hide();

      //return;
      var token = localStorage.getItem("token");
      if (token == null)
      {
          token = $('#token').html();
          localStorage.setItem("token", token);
      }

      
      //make a post request to the server 
      $.ajax({
          url: 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/check_it_extension_activated_and_imported_product',
          type: 'POST',
          data: {
              'token':token
          },
          success: function (data) {
              if (data.status == 'success')
              {
                  if (data.message == 'Not_Activated')
                  {
                     //$("#plugin_not_installed").trigger('click');
                     alert('Validations Failed, Please install the Gizzmo Chrome Extension and try again');
                     $("#continue_bt_validate").html('Validate Install & Continue');
                     $("#continue_bt_validate").attr('disabled',false);
                     $("#continue_arrow").show();
                  }
                  else if (data.message == 'not_imported_product')
                  {
                     //$("#plugin_not_installed").trigger('click');
                     alert('Product Import Validation Failed, Please Click the + button to import a product and try again');
                     $("#continue_bt_validate").html('Validate Install & Continue');
                     $("#continue_bt_validate").attr('disabled',false);
                     $("#continue_arrow").show();
                  }
                  else if (data.message == 'imported_product')
                  {
                      switch_from_step_2_to_step_3();
                  }
                  else
                  {
                      
                  }


              }
              else
              {
                  alert("Error, try again later, or contact support");
              }
          }
      });
    }(jQuery));

  }



  function get_listicle_similer_posts()
  {
    (function ($) {
      console.log('get_listicle_similer_posts');

      //clear the listicle_similar_posts_list
      $("#listicle_similar_posts_list").html('');
      

      var existing_similer_posts = [];
      
      var listicle_title = $('#selected_listicle_title').val();
      //remove , and ' from the listicle_title
      //listicle_title = listicle_title.replace(/,/g, '');
      //listicle_title = listicle_title.replace(/'/g, '');

      var posts_data = $('#all_posts').val();

      var data = {
        posts_data: posts_data,
        listicle_title: listicle_title
      };

      $.ajax({
        url: 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/get_listicle_similer_posts',
        type: 'POST',
        data: JSON.stringify(data),
        contentType: "application/json",
        success: function (data) {
          
          var container_2 = document.getElementById('listicle_similar_posts_list');
          var all_internal_links_html = "";
          var existing_internal_links_html = $('#listicle_similar_posts_list').html();
          all_internal_links_html = existing_internal_links_html;
          for (var i = 0; i < data.data.length; i++) {
            post_title = data.data[i]['post_title'];
            //check if the criteria already exists in the list of criterias
            if (existing_similer_posts.includes(post_title))
            {
              continue;
            }
            post_identifier =  data.data[i]['post_id'];
            post_desc = post_title;
            one_post = '<label class="flex items-center space-x-2 chckbox">' +
                          '<input value="' + post_identifier + '" id="post_id_chk_' + post_identifier + '"  onchange="similer_listicle_post_handleCheckChange(this);" data-description="' + post_desc + '" name="similer_post_select" value="' + post_title + '" class="similer_post_checkbox form-checkbox is-basic h-5 w-5 rounded bg-slate-100 border-slate-400/70 checked:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:bg-navy-900 dark:border-navy-500 dark:checked:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" type="checkbox" />' +
                          '<p title="'+ post_title + '" >' + post_title + '</p>' +
                          '</label>';
            //append the criteria to the existing criterias
            container_2.insertAdjacentHTML('beforeend', one_post);
            all_internal_links_html += one_post;
          }

          //if there are no internal links, hide the internal_linking_div
          if ( data.data.length == 0)
          {
            $("#listicle_internal_linking_div").hide();
          }
          else
          {
            $("#listicle_internal_linking_div").show();
          }

                    
        }

      });






    }(jQuery));

  }


  function get_similer_posts()
  {
    (function ($) {

      var existing_similer_posts = [];
      
      products_asins ="";
      //get the action_type from the hidden input
      var action_type = $('#action_type').val();
      if (action_type == 'comparison')
      {
        products_asins = $('#comparison_asins').val();
      }
      else if (action_type == 'roundup')
      {
        products_asins = $('#roundups_asins').val();
      }
      else if (action_type == 'general')
      {
        products_asins = $('#general_asins').val();
      }

      //check if the products_asins has a , at the end, if so remove it
      if (products_asins.endsWith(","))
      {
        products_asins = products_asins.substring(0, products_asins.length - 1);
      }


      //get the posts_data from the hidden input all_posts
      var posts_data = $('#all_posts').val();
      //get the website_id from the hidden input
      var website_id = $('#website_id').val();

      var data = {
        posts_data: posts_data,
        website_id: website_id,
        products_asins: products_asins
      };

      //url: 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/get_similer_posts',
      

      $.ajax({
        url: 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/get_similer_posts',
        type: 'POST',
        data: JSON.stringify(data),
        contentType: "application/json",
        success: function (data) {
           
          
          var container_2 = document.getElementById('internal_links_list');
          var all_internal_links_html = "";
          var existing_internal_links_html = $('#internal_links_list').html();
          all_internal_links_html = existing_internal_links_html;
          for (var i = 0; i < data.data.length; i++) {
            post_title = data.data[i]['post_title'];
            //check if the criteria already exists in the list of criterias
            if (existing_similer_posts.includes(post_title))
            {
              continue;
            }
            post_identifier =  data.data[i]['post_id'];
            post_desc = post_title;
            one_post = '<label class="flex items-center space-x-2 chckbox">' +
                          '<input value="' + post_identifier + '" id="post_id_chk_' + post_identifier + '"  onchange="similer_post_handleCheckChange(this);" data-description="' + post_desc + '" name="similer_post_select" value="' + post_title + '" class="similer_post_checkbox form-checkbox is-basic h-5 w-5 rounded bg-slate-100 border-slate-400/70 checked:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:bg-navy-900 dark:border-navy-500 dark:checked:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" type="checkbox" />' +
                          '<p title="'+ post_title + '" >' + post_title + '</p>' +
                          '</label>';
            //append the criteria to the existing criterias
            container_2.insertAdjacentHTML('beforeend', one_post);
            all_internal_links_html += one_post;
          }

          //if there are no internal links, hide the internal_linking_div
          if ( data.data.length == 0)
          {
            $("#internal_links_list_div").hide();
          }
          else
          {
            $("#internal_links_list_div").show();
          }

                    
        }

      });
    
    }(jQuery));

  }




  jQuery(document).ready(function($) {
    return; //temp disabled

    //var website_settings = JSON.parse(localStorage.getItem('gizzmo_website_settings'));
    //var website_id = website_settings.website_id;


    var currentURL = window.location.href;
    var domain = extractDomainWithProtocolAndWWW(currentURL);
    //fill the domain input
    $('#domain').val(domain);  

    //check if the gizzmo_token is in the local storage
    //var gizzmo_token = localStorage.getItem('gizzmo_token')
     
    var extension_activated = localStorage.getItem('extension_activated');
    if (extension_activated == null || extension_activated == "false")
    {
        check_domain_status(domain);
    }
    else
    {    
        //check review_help_closed
        var review_help_closed = localStorage.getItem('review_help_closed');
        var roundup_help_closed = localStorage.getItem('roundup_help_closed');
        var general_help_closed = localStorage.getItem('general_help_closed');
        var comparison_help_closed = localStorage.getItem('comparison_help_closed');


        if (review_help_closed == 'yes')
        {
          $('#review_help').hide();
          $('#review_bt_holder').show();
        }

        if (roundup_help_closed == 'yes')
        {
          $('#roundup_help').hide();
          $('#roundup_bt_holder').show();
        }

        if (general_help_closed == 'yes')
        {
          $('#general_help').hide();
          $('#general_bt_holder').show();
        }
        
        if (comparison_help_closed == 'yes')
        {
          $('#comparison_help').hide();
          $('#comparison_bt_holder').show();
        }


        //check if the user has seen the new compare badge
        var seen_new_compare_badge = localStorage.getItem('seen_new_compare_badge');
        var seen_new_listicle_badge = localStorage.getItem('seen_new_listicle_badge');
        if (seen_new_compare_badge == 'true')
        {
          $("#new_compare_badge").hide();
        }
        if (seen_new_listicle_badge == 'true')
        {
          $("#new_listicle_badge").hide();
        }


      
        //GET the time of the last login
        //var last_login_time_string = localStorage.getItem('gizzmo_last_login');
        //var last_login_time = new Date(last_login_time_string);
        //var now = new Date();
        //var diff = now - last_login_time;
        //var diff_in_minutes = diff / 60000;
        //if (diff_in_minutes > 60)
        //{
        get_website_data()
        //}
        //else
        //{
          //  var gizzmo_website_settings = localStorage.getItem('gizzmo_website_settings');
          //  load_gizzmo_main_page(gizzmo_website_settings);
        //}
      }
  

      $("#product_review_seo_keyword").on("keydown", function(event) {
        if (event.key === ",") {
          event.preventDefault();
        }
      });
      $("#product_review_seo_keyword").on("input", function() {
        var inputValue = $(this).val();

        var words = inputValue.trim().split(/\s+/);
        if (words.length > 4) {
          words = words.slice(0, 4);
          inputValue = words.join(' ');
        }

        var modifiedValue = inputValue.replace(/,/g, ' ');
        modifiedValue = modifiedValue.replace(/  /g, ' ');
        $(this).val(modifiedValue);
      });



      //this was used to connect after logout
      $('#unlock_bt').click(function(){
          //get the website token entered by the user
          var website_token = $('#website_token').val();
          if (website_token == '')
          {
              $('#token_empty').click();
              return;
          }
          else
          {
              get_website_token_data(website_token);
          }
      });


      //close_help_review
      $('#close_help_review').click(function(){
          $('#review_help').hide();
          $('#review_bt_holder').show();
          localStorage.setItem('review_help_closed', 'yes');
      });
      $('#open_help_review').click(function(){
        $('#review_help').show();
        $('#review_bt_holder').hide();
        localStorage.setItem('review_help_closed', 'no');
      });


      $('#close_help_comparison').click(function(){
        $('#comparison_help').hide();
        $('#comparison_bt_holder').show();
        localStorage.setItem('comparison_help_closed', 'yes');
    });
      $('#open_help_comparison').click(function(){
        $('#comparison_help').show();
        $('#comparison_bt_holder').hide();
        localStorage.setItem('comparison_help_closed', 'no');
      });

      //close_help_roundup
      $('#close_help_roundup').click(function(){
        $('#roundup_help').hide();
        $('#roundup_bt_holder').show();
        localStorage.setItem('roundup_help_closed', 'yes');
      });
      $('#open_help_roundup').click(function(){
        $('#roundup_help').show();
        $('#roundup_bt_holder').hide();
        localStorage.setItem('roundup_help_closed', 'no');
      });

      //close_help_general
      $('#close_help_general').click(function(){
        $('#general_help').hide();
        $('#general_bt_holder').show();
        localStorage.setItem('general_help_closed', 'yes');
      });
      $('#open_help_general').click(function(){
        $('#general_help').show();
        $('#general_bt_holder').hide();
        localStorage.setItem('general_help_closed', 'no');
      });

      //close_help_comparison
      $('#close_help_comparison').click(function(){
        $('#comparison_help').hide();
        $('#comparison_bt_holder').show();
        localStorage.setItem('comparison_help_closed', 'yes');
      });
      $('#open_help_comparison').click(function(){
        $('#comparison_help').show();
        $('#comparison_bt_holder').hide();
        localStorage.setItem('comparison_help_closed', 'no');
      });

      //close_help_listicle
      $('#close_help_listicle').click(function(){
        $('#listicle_help').hide();
        $('#listicle_bt_holder').show();
        localStorage.setItem('listicle_help_closed', 'yes');
      });
      $('#open_help_listicle').click(function(){
        $('#listicle_help').show();
        $('#listicle_bt_holder').hide();
        localStorage.setItem('listicle_help_closed', 'no');
      });


      

      $('#featured_image_change').click(function(){
        $("#all_product_images").show();

        
        

        $(".backdrop").css("display", "block");
        $(".backdrop").animate({'opacity':'0.8'}, 300, 'linear');
        $(".box").css("display", "block");
        
        $("#adding_affiliate_tag").hide();
        $("#adding_thematic_concept_box").hide();
    
      });
      
    $('#add_affiliate_tag_bt').click(function(){

      $("#all_product_images").hide();
      $("#add_affiliate_tag").show();
      $("#adding_affiliate_tag").show();
      

      
      $(".backdrop").css("display", "block");
      $(".backdrop").animate({'opacity':'0.50'}, 300, 'linear');
      $("#adding_affiliate_tag_box").css("display", "block");
      $("#adding_thematic_concept_box").hide();
    });


    $('.close_box').click(function(){
      $('.backdrop').animate({'opacity':'0'}, 300, 'linear', function(){
        $('.backdrop').css('display', 'none');
      });
      $('#adding_affiliate_tag_box').fadeOut();	
      $('#adding_thematic_concept_box').fadeOut();	
    });

    
    $('#add_thematic_concept_bt').click(function(){
      $(".backdrop").css("display", "block");
      $(".backdrop").animate({'opacity':'0.50'}, 300, 'linear');
      $("#adding_thematic_concept_box").css("display", "block");
    });


    


    $('.backdrop').click(function(){
      $('.backdrop').animate({'opacity':'0'}, 300, 'linear', function(){
        $('.backdrop').css('display', 'none');
      });
      $('.box').fadeOut();	
    });



    $('#logout_bt').click(function(){
      localStorage.removeItem('gizzmo_website_settings');
      localStorage.removeItem('gizzmo_token');
      localStorage.removeItem('website_token');
      localStorage.removeItem('gizzmo_last_login');
      location.reload();
    });


     


    $('#save_affiliate_bt').click(function(){
      var affiliate_tag = $('#affiliate_tag').val();
      if (affiliate_tag == "")
      {
        alert('Please enter an affiliate tag');
        return;
      }
      else
      {
        var website_settings = JSON.parse(localStorage.getItem('gizzmo_website_settings'));
        var website_id = website_settings.website_id;

          $.ajax({
            url: 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/save_affiliate_tag/' + website_id + ',' + affiliate_tag,
            type: 'GET',
            success: function (data) {
              //(data);
              if (data.status == 'ok')
              {
                //reload the page
                alert('The Affiliate Tag has been saved');
                
                //clear the gizzmo_last_login from local storage
                localStorage.removeItem('gizzmo_last_login');
                
                location.reload();
              }
              else
              {
                alert('The Affiliate Tag could not be saved');
                //close the box
                $('.backdrop').animate({'opacity':'0'}, 300, 'linear', function(){
                  $('.backdrop').css('display', 'none');
                });
                $('.box').fadeOut();
              }
            }
          });
        }
      });



      //make an onclick event for the save_thematic_concept_bt 
      $('#save_thematic_concept_bt').click(function(){
        var thematic_concept = $('#thematic_concept_title').val();
        if (thematic_concept == "")
        {
          alert('Please enter a thematic concept Title');
          return;
        }
        var thematic_concept_desc = $('#thematic_concept_desc').val();
        if (thematic_concept_desc == "")
        {
          alert('Please enter a thematic concept Description');
          return;
        }

        thematic_concept_identifier = convert_text_to_numbers(thematic_concept);

        var one_thematic_concept = '<label class="flex items-center space-x-2 chckbox">' +
                                '<input checked id="thematic_concept_chk_' + thematic_concept_identifier + '"  onchange="thematic_concept_handleCheckChange(this);" data-description="' + thematic_concept_desc + '" name="thematic_concept_select" value="' + thematic_concept + '" class="thematic_concept_checkbox form-checkbox is-basic h-5 w-5 rounded bg-slate-100 border-slate-400/70 checked:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:bg-navy-900 dark:border-navy-500 dark:checked:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" type="checkbox" />' +
                                '<p title="'+ thematic_concept_desc + '" >' + thematic_concept + ' (' + thematic_concept_desc + ')' + '</p>' +
                                '</label>';
        //append the criteria to the existing criterias
        var container_2 = document.getElementById('thematic_concepts_list');
        container_2.insertAdjacentHTML('beforebegin', one_thematic_concept);
        //scroll to the top
        container_2.scrollTo(0, 0);

        var thme = thematic_concept + "~" + thematic_concept_desc; 
        $("#selected_thematic_concept").val(thme);

        $('.thematic_concept_checkbox ').each(function(){
          if ($(this)[0].value != thematic_concept)
          {
            $(this).prop('checked', false);
          }
        });

        //clear the input fields
        $('#thematic_concept_title').val('');
        $('#thematic_concept_desc').val('');
        //close the box

        $('.backdrop').animate({'opacity':'0'}, 300, 'linear', function(){
          $('.backdrop').css('display', 'none');
        });
        $('#adding_thematic_concept_box').fadeOut();	

        

      });



      //check if an input with the id of 'gizzmo_error' exists
      if ($('#gizzmo_error').length)
      {
        alert("An Error Occurred, try again, or contact support if the problem persists");
      }

      //set as true for the first time
      localStorage.setItem('gizzmo_check_tasks', 'true');

      //write a function that will be called every 10 seconds if the localstorage parameter gizzmo_check_tasks is set to true
      //check_content_tasks();

      setInterval(function(){
        var gizzmo_check_tasks = localStorage.getItem('gizzmo_check_tasks');
        if (gizzmo_check_tasks == 'true')
        {
          check_content_tasks();
        }
      }, 10000);




      //check gizzmo_task_id_to_delete localstorage parameter is set, if so, delete the task
      if (localStorage.getItem('gizzmo_task_id_to_delete') != null && localStorage.getItem('gizzmo_task_id_to_delete') != 'undefined')
      {
        var gizzmo_task_id_to_delete = localStorage.getItem('gizzmo_task_id_to_delete');
        //return; //temp roy
        $.ajax({
          url: 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/remove_task_from_db/' + gizzmo_task_id_to_delete,
          type: 'GET',
          success: function (data) {
            //clear the gizzmo_task_id_to_delete from local storage
            localStorage.removeItem('gizzmo_task_id_to_delete');
          }
        });
      }



      //if localStorage.setItem('gizzmo_language', selected_language); is set, set the language in the dropdown
      if ( localStorage.getItem('gizzmo_language') != null &&localStorage.getItem('gizzmo_language') != 'undefined') 
      {
        var selected_language = localStorage.getItem('gizzmo_language');
        $('#language').val(selected_language);
        $('#language_selected').val(selected_language);
        
        $('#languge_tag_slct').val(selected_language);
        $('#languge_tag_slct_2').val(selected_language);
        
      }


  });


  

  function updateLanguage(dropdown_obg)
  {
    (function ($) {
      //get the selected language
      var selected_language = dropdown_obg.options[dropdown_obg.selectedIndex].value;
      //set the selected language in the hidden input
      $('#language').val(selected_language);
      $('#language_selected').val(selected_language);

      //save the selected language in the local storage
      localStorage.setItem('gizzmo_language', selected_language);


    }(jQuery));
  }




  function add_to_roundup_tab(clicked_obj)
  {
    (function ($) {
      $("#gizzmo_msg_board_wrapper").hide();

      //switch_displays('roundup');

      var num_of_prods_added = 0;

      var roundupsasins = $('#roundups_asins').val();
      if (roundupsasins != "")
      {
        //check if the last character is a comma, if so, remove it
        if (roundupsasins.slice(-1) == ',')
        {
          roundupsasins = roundupsasins.substring(0, roundupsasins.length - 1);
        }
        var roundupsasins_array = roundupsasins.split(',');
        num_of_prods_added = roundupsasins_array.length;

        //get the package type
        var package_type = $('#package_type').val();
        if (package_type == 'Free')
        {
          if (num_of_prods_added >= 3)
          {
            alert('Upgrade to Unlock, Only 3 Products are allowed, please upgrade to unlock more products');
            return;
          }
        }
        else
        {
          if (num_of_prods_added >= 50)
          {
            alert('You cannot add more than 50 products for a roundup post');
            return;
          }
        }
      }
      



      var identifier = $(clicked_obj).data('identifier');
      var type = $(clicked_obj).data('type');
      var website_id = $('#website_id').val();
      
      //check length of product name
      var productname = $(clicked_obj).data('productname');
      if ($(clicked_obj).data('productname').length > 65)
      {
        productname = $(clicked_obj).data('productname').substring(0, 65) + '...';
      }


      var productimage = $(clicked_obj).data('img');


      



      $("#action_type").val('product_roundup');
      

      //check if the product is already in the roundup
      var product_already_in_roundup = false;
      var roundup_asins_string = "";
      $('#roundup_products_draggable div').each(function(){
        if ($(this).data('identifier') != undefined)
        {
          if ($(this).data('identifier') == identifier)
          {
            product_already_in_roundup = true;
          }
          else
          {
            if (roundup_asins_string == "")
            {
              roundup_asins_string = $(this).data('identifier');
            }
            else
            {
              roundup_asins_string += "," + $(this).data('identifier');
            }            
          }
        }
      });

      if (product_already_in_roundup == false)
      {
        //add the product identifier to the hidden input roundups_asins
        //var roundups_asins = $('#roundups_asins').val();

        if (roundup_asins_string == "")
        {
          roundup_asins_string = identifier;
        }
        else
        {
          roundup_asins_string += "," + identifier;
        }

        $('#roundups_asins').val(roundup_asins_string);

        one_prod = '<div id="roundup_' + identifier + '" data-identifier="' + identifier + '" data-img="' + productimage + '" class="list__item" sortable-item="sortable-item">'
        one_prod += '<div class="list__item-content">'
        one_prod += '<div class="list__item-description">'
        one_prod += '<button data-identifier="' + identifier + '" onclick="remove_roundup_prod(this)" style="background-color:#6c6c6c;float: left;" class="btn h-8 w-8 rounded-full p-0 font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90"><i class="fa-regular fa-trash-alt"></i></button>'
        one_prod += '<img src="' + productimage + '" class="prod_img_in_list" style="margin-left: 15px;" /><span class="prodname">' + productname + '</span>'
        one_prod += '</div>'
        one_prod += '</div>'
        one_prod += '<div class="list__item-handle" sortable-handle="sortable-handle"></div>'
        one_prod += '</div>'

        
        $('#roundup_products_draggable').append(one_prod);


        //

      }
      else
      {
        alert('Product already in the roundup');
      }



      if (num_of_prods_added == 0)
      {
        $('#product_review_form').show();
        set_featured_image_from_list(identifier, productimage);
      }
      //console.log(num_of_prods_added);
      
      if (num_of_prods_added > 1)
      {
          $("#affiliate_seo_div").show();
          $("#create_roundup_bt").show();
          $("#roundup_extended_content_div").show();
          $("#roundup_content_div").show();
          $("#roundup_ai_images").show();
          
      }

    }(jQuery));
      
  }



  function add_to_general_tab(clicked_obj)
  {

    (function ($) {
      $("#gizzmo_msg_board_wrapper").hide();
      
        var num_of_prods_added = 0;

        var generalasins = $('#general_asins').val();
        if (generalasins != "")
        {
          //check if the last character is a comma, if so, remove it
          if (generalasins.slice(-1) == ',')
          {
            generalasins = generalasins.substring(0, generalasins.length - 1);
          }
          var generalasins_array = generalasins.split(',');
          num_of_prods_added = generalasins_array.length;
          if (num_of_prods_added > 3)
          {
            alert('You cannot add more than 4 products for a general post');
            return;
          }
          
        }
        



        var identifier = $(clicked_obj).data('identifier');
        var type = $(clicked_obj).data('type');
        var website_id = $('#website_id').val();
        
        //check length of product name
        var productname = $(clicked_obj).data('productname');
        if ($(clicked_obj).data('productname').length > 65)
        {
          productname = $(clicked_obj).data('productname').substring(0, 65) + '...';
        }


        var productimage = $(clicked_obj).data('img');
        debugger;
        $("#action_type").val('general');
        

        //check if the product is already in the roundup
        var product_already_in_general = false;
        var general_asins_string = ""; 
        $('#general_products_draggable div').each(function(){
          if ($(this).data('identifier') != undefined)
          {
            if ($(this).data('identifier') == identifier)
            {
              product_already_in_general = true;
            }
            else
            {
              if (general_asins_string == "")
              {
                general_asins_string = $(this).data('identifier');
              }
              else
              {
                general_asins_string += "," + $(this).data('identifier');
              }            
            }
          }
        });

         

        if (product_already_in_general == false)
        {
          //add the product identifier to the hidden input general_asins
          //var general_asins = $('#general_asins').val();
          //general_asins += identifier + ',';
          if (general_asins_string == "")
          {
            general_asins_string = identifier;
          }
          else
          {
            general_asins_string += "," + identifier;
          }

          $('#general_asins').val(general_asins_string);

          one_prod = '<div id="general_' + identifier + '" data-identifier="' + identifier + '" data-img="' + productimage + '" class="list__item" sortable-item="sortable-item">'
          one_prod += '<div class="list__item-content">'
          one_prod += '<div class="list__item-description">'
          one_prod += '<button data-identifier="' + identifier + '" onclick="remove_general_prod(this)" style="background-color:#6c6c6c;float: left;" class="btn h-8 w-8 rounded-full p-0 font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90"><i class="fa-regular fa-trash-alt"></i></button>'
          one_prod += '<img src="' + productimage + '" class="prod_img_in_list" style="margin-left: 15px;" /><span class="prodname">' + productname + '</span>'
          one_prod += '</div>'
          one_prod += '</div>'
          one_prod += '<div class="list__item-handle" sortable-handle="sortable-handle"></div>'
          one_prod += '</div>'

          
          $('#general_products_draggable').append(one_prod);


          //

        }
        else
        {
          alert('Product already in the General');
          return;
        }

        if (num_of_prods_added == 0)
        {
          $('#product_review_form').show();
          
          set_featured_image_from_list(identifier, productimage);
        }
        else if (num_of_prods_added == 3)
        {
            $("#post_categories_div").show();

            //if ($('#selected_topic').val() != "" && $('#suggested_topics_list').html().trim() != "")
            //{
            //  $("#topics_list_div").show();
            //  $("#affiliate_seo_div").show();
            //  $("#create_general_bt").show();
            //}
            //else if ($('#suggested_topics_list').html().trim() != "")
            //{
            //  $("#topics_list_div").show();
            //}
            //else if ($('#selected_topic').val() != "")
            //{
            //  $("#topics_list_div").show();
            //  $("#affiliate_seo_div").show();
            //  $("#create_general_bt").show();
            //}
        }
        else if (num_of_prods_added < 3)
        {
          $("#post_categories_div").hide();
        }
      
    }(jQuery));

  }

  function add_to_comparison_tab(clicked_obj)
  {
    (function ($) {
      $("#gizzmo_msg_board_wrapper").hide();
      
        var num_of_prods_added = 0;

        var comparisonasins = $('#comparison_asins').val();
        if (comparisonasins != "")
        {
          //check if the last character is a comma, if so, remove it
          if (comparisonasins.slice(-1) == ',')
          {
            comparisonasins = comparisonasins.substring(0, comparisonasins.length - 1);
          }
          var comparisonasins_array = comparisonasins.split(',');
          num_of_prods_added = comparisonasins_array.length;
          if (num_of_prods_added > 1)
          {
            alert('You cannot add more than 2 products for a comparison post');
            return;
          }
          
        }
        



        var identifier = $(clicked_obj).data('identifier');
        var type = $(clicked_obj).data('type');
        var website_id = $('#website_id').val();
        
        //check length of product name
        var productname = $(clicked_obj).data('productname');
        if ($(clicked_obj).data('productname').length > 65)
        {
          productname = $(clicked_obj).data('productname').substring(0, 65) + '...';
        }


        var productimage = $(clicked_obj).data('img');

        $("#action_type").val('comparison');

        //check if the product is already in the roundup
        var product_already_in_comparison = false;
        var comparison_asins_string = ""; 
        $('#comparison_products_draggable div').each(function(){
          if ($(this).data('identifier') != undefined)
          {
            if ($(this).data('identifier') == identifier)
            {
              product_already_in_comparison = true;
            }
            else
            {
              if (comparison_asins_string == "")
              {
                comparison_asins_string = $(this).data('identifier');
              }
              else
              {
                comparison_asins_string += "," + $(this).data('identifier');
              }            
            }
          }
        });

        if (product_already_in_comparison == false)
        {
          //add the product identifier to the hidden input comparison_asins
          //var comparison_asins = $('#comparison_asins').val();
          if (comparison_asins_string == "")
          {
            comparison_asins_string = identifier;
          }
          else
          {
            comparison_asins_string += "," + identifier;
          }

          $('#comparison_asins').val(comparison_asins_string);
          



          one_prod = '<div id="comparison_' + identifier + '" data-identifier="' + identifier + '" data-img="' + productimage + '" class="list__item" sortable-item="sortable-item">'
          one_prod += '<div class="list__item-content">'
          one_prod += '<div class="list__item-description">'
          one_prod += '<button data-identifier="' + identifier + '" onclick="remove_comparison_prod(this)" style="background-color:#6c6c6c;float: left;" class="btn h-8 w-8 rounded-full p-0 font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90"><i class="fa-regular fa-trash-alt"></i></button>'
          one_prod += '<img src="' + productimage + '" class="prod_img_in_list" style="margin-left: 15px;" /><span class="prodname">' + productname + '</span>'
          one_prod += '</div>'
          one_prod += '</div>'
          one_prod += '<div class="list__item-handle" sortable-handle="sortable-handle"></div>'
          one_prod += '</div>'

          
          $('#comparison_products_draggable').append(one_prod);


          //

        }
        else
        {
          alert('Product already in the Comparison');
          return;
        }

        console.log(num_of_prods_added);
        if (num_of_prods_added == 0)
        {
          $('#product_review_form').show();
          
          set_featured_image_from_list(identifier, productimage);
        }
        else if (num_of_prods_added == 1)
        {
            $("#post_products_shared_features_div").show();
            
        }
        else if (num_of_prods_added < 1)
        {
          $("#post_products_shared_features_div").hide();
        }
      
    }(jQuery));

  }


  function change_product_other_images()
  {
    (function ($) {
      identifier = $('#selected_asin').val();

      var ajax_url = "https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/get_product_images/" + identifier ;
      $.ajax({
          url: ajax_url,
          type: 'GET',
          dataType: 'json', // added data type
          success: function(res) {
              if (res !=null)
              {
                  var product_images_html = "";
                  for (let x in res) {
                      var product_image = res[x];
                      var bk = "url('" + product_image + "')";
                      product_images_html += '<div data-imgurl="' + product_image + '" class="product_image_wrapper" onclick="set_featured_image(this)" style="background-image:' + bk + '"></div>';
                  }
                  $('#product_images_list').html(product_images_html);


                  $("#all_product_images").show();

                  $("#adding_affiliate_tag").hide();
                  $("#adding_thematic_concept_box").hide();
                  

                  $(".backdrop").css("display", "block");
                  $(".backdrop").animate({'opacity':'0.8'}, 300, 'linear');
                  $("#adding_affiliate_tag_box").css("display", "block");



              }
          }
      });
    
    }(jQuery));

  }



  function remove_selected_paragraps(clicked_obj)
  {
    (function ($) {
      var identifier = $(clicked_obj).data('identifier');
      var divid = 'criteria_' + identifier;


      //get the data-status of the criteria
      var status = $(clicked_obj).attr('data-status');

      if (status == 'selected')
      {
        //change the background color of the product
        $('#' + divid).css('background-color', '#e9e6e6');
        $('#' + divid).css('color', '#000000');

        //change the icon
        var icon_i = 'action_icon_' + identifier;
        $('#' + icon_i).removeClass('fas fa-eye');
        $('#' + icon_i).addClass('fas fa-eye-slash');

        $(clicked_obj).attr('data-status', 'disabled');
      }
      else
      {
        //remove the background color of the product and remove the text color
        $('#' + divid).css('background-color', '');
        $('#' + divid).css('color', '');

        //change the icon
        var icon_i = 'action_icon_' + identifier;
        $('#' + icon_i).removeClass('fas fa-eye-slash');
        $('#' + icon_i).addClass('fas fa-eye');

        //chnage the data-status of the criteria to selected
        $(clicked_obj).attr('data-status', 'selected');

      }
    
    }(jQuery));

    
    get_shared_listicle_pargraphs_list();

  }



  function remove_selected_shared_topic(clicked_obj)
  {
    (function ($) {
      var identifier = $(clicked_obj).data('identifier');
      var divid = 'criteria_' + identifier;


      //get the data-status of the criteria
      var status = $(clicked_obj).attr('data-status');

      if (status == 'selected')
      {
        //change the background color of the product
        $('#' + divid).css('background-color', '#e9e6e6');
        $('#' + divid).css('color', '#000000');

        //change the icon
        var icon_i = 'action_icon_' + identifier;
        $('#' + icon_i).removeClass('fas fa-eye');
        $('#' + icon_i).addClass('fas fa-eye-slash');

        $(clicked_obj).attr('data-status', 'disabled');
      }
      else
      {
        //remove the background color of the product and remove the text color
        $('#' + divid).css('background-color', '');
        $('#' + divid).css('color', '');

        //change the icon
        var icon_i = 'action_icon_' + identifier;
        $('#' + icon_i).removeClass('fas fa-eye-slash');
        $('#' + icon_i).addClass('fas fa-eye');

        //chnage the data-status of the criteria to selected
        $(clicked_obj).attr('data-status', 'selected');

      }



      
    
    }(jQuery));

    
    get_shared_features_list();

  }


  function remove_general_prod(clicked_obj)
  {
    (function ($) {
      var identifier = $(clicked_obj).data('identifier');
      var divid = 'general_' + identifier;
      $('#' + divid).remove();


      var num_of_prods_added = 0;

      var generalasins = $('#general_asins').val();
      if (generalasins != "")
      {
        //check if the last character is a comma, if so, remove it
        if (generalasins.slice(-1) == ',')
        {
          generalasins = generalasins.substring(0, generalasins.length - 1);
        }
        var generalasins_array = generalasins.split(',');

        //loop through the array and remove the identifier
        var new_generalasins_array = [];
        for (var i = 0; i < generalasins_array.length; i++) {
          if (generalasins_array[i] != identifier)
          {
            new_generalasins_array.push(generalasins_array[i]);
          }
        }
        

        //get the first asin in the array and set it as the featured image
        if (new_generalasins_array.length > 0)
        {
          the_list = document.querySelector(".generallist");
          var identifier = the_list.children[0].attributes['data-identifier'].value
          var img_url = the_list.children[0].attributes['data-img'].value
          set_featured_image_from_list(identifier,img_url)
        }


        //set the new general_asins
        $('#general_asins').val(new_generalasins_array.join(','));
        num_of_prods_added = new_generalasins_array.length;

        if (num_of_prods_added == 0)
        {
          $('#product_review_form').hide();
        }
        else if (num_of_prods_added < 4)
        {
          $("#post_categories_div").hide();
          $("#topics_list_div").hide();
          $("#affiliate_seo_div").hide();
          $("#create_general_bt").hide();

        }
      }
    
    }(jQuery));


  }

  function remove_comparison_prod(clicked_obj)
  {
    (function ($) {
      var identifier = $(clicked_obj).data('identifier');
      var divid = 'comparison_' + identifier;
      $('#' + divid).remove();


      var num_of_prods_added = 0;

      var comparisonasins = $('#comparison_asins').val();
      if (comparisonasins != "")
      {
        //check if the last character is a comma, if so, remove it
        if (comparisonasins.slice(-1) == ',')
        {
          comparisonasins = comparisonasins.substring(0, comparisonasins.length - 1);
        }
        var comparisonasins_array = comparisonasins.split(',');

        //loop through the array and remove the identifier
        var new_comparisonasins_array = [];
        for (var i = 0; i < comparisonasins_array.length; i++) {
          if (comparisonasins_array[i] != identifier)
          {
            new_comparisonasins_array.push(comparisonasins_array[i]);
          }
        }
        

        //get the first asin in the array and set it as the featured image
        if (new_comparisonasins_array.length > 0)
        {
          the_list = document.querySelector(".comparisonlist");
          var identifier = the_list.children[0].attributes['data-identifier'].value
          var img_url = the_list.children[0].attributes['data-img'].value
          set_featured_image_from_list(identifier,img_url)
        }


        //set the new comparison_asins
        $('#comparison_asins').val(new_comparisonasins_array.join(','));
        num_of_prods_added = new_comparisonasins_array.length;

        if (num_of_prods_added == 0)
        {
          $('#product_review_form').hide();
        }
        else if (num_of_prods_added < 1)
        {
          $("#post_categories_div").hide();
          $("#topics_list_div").hide();
          $("#affiliate_seo_div").hide();
          $("#create_general_bt").hide();

        }
      }
    
    }(jQuery));


  }

  function remove_roundup_prod(clicked_obj)
  {
    (function ($) {
      var identifier = $(clicked_obj).data('identifier');
      var divid = 'roundup_' + identifier;
      $('#' + divid).remove();


      var num_of_prods_added = 0;

      var roundupsasins = $('#roundups_asins').val();
      if (roundupsasins != "")
      {
        //check if the last character is a comma, if so, remove it
        if (roundupsasins.slice(-1) == ',')
        {
          roundupsasins = roundupsasins.substring(0, roundupsasins.length - 1);
        }
        var roundupsasins_array = roundupsasins.split(',');

        //loop through the array and remove the identifier
        var new_roundupsasins_array = [];
        for (var i = 0; i < roundupsasins_array.length; i++) {
          if (roundupsasins_array[i] != identifier)
          {
            new_roundupsasins_array.push(roundupsasins_array[i]);
          }
        }

        //get the first asin in the array and set it as the featured image
        if (new_roundupsasins_array.length > 0)
        {
          the_list = document.querySelector(".list");
          var identifier = the_list.children[0].attributes['data-identifier'].value
          var img_url = the_list.children[0].attributes['data-img'].value
          set_featured_image_from_list(identifier,img_url)
        }


        
        //set the new roundupsasins
        $('#roundups_asins').val(new_roundupsasins_array.join(','));
        num_of_prods_added = new_roundupsasins_array.length;

        if (num_of_prods_added == 0)
        {
          $('#product_review_form').hide();
        }

        //console.log(num_of_prods_added);

        if (num_of_prods_added < 3)
        {
          $("#affiliate_seo_div").hide();
          $("#create_roundup_bt").hide();
        }
      }
    
    }(jQuery));


  }

  function remove_prod(clicked_obj)
  {
    (function ($) {

      //id="delete_bt_'+prod_identifier+'"
      //get the tr element that contains this button
      var tr = $(clicked_obj).closest('tr');
      var identifier = $(clicked_obj).data('identifier');
      

      var outerDiv = $('#review_products_list');
      var innerDiv = outerDiv.find("#delete_bt_" + identifier).closest('tr');
      innerDiv.remove();


      //this is for the roundup
      outerDiv = $('#roundup_products_list');
      innerDiv = outerDiv.find("#delete_bt_" + identifier).closest('tr');
      innerDiv.remove();


      outerDiv = $('#general_products_list');
      innerDiv = outerDiv.find("#action_" + identifier).closest('tr');
      innerDiv.remove();


  

      //get the website id
      var website_id = $('#website_id').val();

      $.ajax({
        url: 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/remove_asin_from_list/' + website_id + "," + identifier,
        type: 'GET',
        success: function (data) {
          //alert('The product was removed successfully');
          //tr.remove();
          //refresh the page
          //location.reload();
        }
      });
    
    }(jQuery));
  }


  function remove_task(clicked_obj)
  {
    (function ($) {

      var tr = $(clicked_obj).closest('tr');
      var task_id = $(clicked_obj).data('task_id');
      

      var outerDiv = $('#content_tasks_list');
      var innerDiv = outerDiv.find("#delete_bt_" + task_id).closest('tr');
      innerDiv.remove();

      //get the website id
      //var website_id = $('#website_id').val();

      $.ajax({
        url: 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/remove_task_from_db/' + task_id,
        type: 'GET',
        success: function (data) {
          //alert('The product was removed successfully');
          //tr.remove();
          //refresh the page
          //location.reload();
        }
      });
    
    }(jQuery));
  }








  function remove_aff_tag()
  {
    (function ($) {
      var select = document.getElementById('product_review_affiliate_tag_slct');
      var value = select.options[select.selectedIndex].value;

      var aff_tag_identifier =value;
      //get the website id
      var website_id = $('#website_id').val();

      $.ajax({
        url: 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/remove_affiliate_tag/' + website_id + "," + aff_tag_identifier,
        type: 'GET',
        success: function (data) {

          //clear the gizzmo_last_login from local storage
          localStorage.removeItem('gizzmo_last_login');


          alert('The Affiliate Tag was removed successfully');
          //refresh the page
          location.reload();
        }
      });
    
    }(jQuery));
  }
  function show_waitingmsg()
  {
    (function ($) {
      $('.loading_msg').css('display','block');
      $('.backdrop').css('display','block');
      $('.backdrop').css('opacity','0.8');
    }(jQuery));

  }
  function show_review_waitingmsg()
  {
    (function ($) {
      $('.review_loading_msg').css('display','block');
      $('.backdrop').css('display','block');
      $('.backdrop').css('opacity','0.8');

    }(jQuery));
  }
  function show_saving_waitingmsg(clicked_obj)
  {
    (function ($) {
      $('.saving_msg').css('display','block');
      $('.backdrop').css('display','block');
      $('.backdrop').css('opacity','0.8');

      //save the taskid to the local storage
      //var task_id = $(clicked_obj).data('task_id');
      //localStorage.setItem('gizzmo_task_id_to_delete', task_id);
      

    }(jQuery));
  }


  function handleCheckChange(checkbox) {

    (function ($) {

      if(checkbox.checked == true){
        //add this checkbox value to the selected_similar_post_ids input with a comma
        var selected_similar_post_ids = $('#selected_similar_post_ids').val();
        if (selected_similar_post_ids == "")
        {
          $('#selected_similar_post_ids').val(checkbox.value);
        }
        else{
          $('#selected_similar_post_ids').val(selected_similar_post_ids + ',' + checkbox.value);
        }
      }else{
        //remove this checkbox value from the selected_similar_post_ids input
        var selected_similar_post_ids = $('#selected_similar_post_ids').val();
        var selected_similar_post_ids_array = selected_similar_post_ids.split(',');
        var new_selected_similar_post_ids = "";
        for (var i = 0; i < selected_similar_post_ids_array.length; i++) {
          if (selected_similar_post_ids_array[i] != checkbox.value)
          {
            if (new_selected_similar_post_ids == "")
            {
              new_selected_similar_post_ids = selected_similar_post_ids_array[i];
            }
            else{
              new_selected_similar_post_ids = new_selected_similar_post_ids + ',' + selected_similar_post_ids_array[i];
            }
          }

        }
        $('#selected_similar_post_ids').val(new_selected_similar_post_ids);

      }

    }(jQuery));
  }
  function set_featured_image_from_list(identifier,img_url)
  {
    (function ($) {
      $("#selected_asin").val(identifier)
      $('#selected_product_review_img').css('background-image', 'url(' + img_url + ')');
      $('#featured_image').val(img_url);
    }(jQuery));

  }



  window.addEventListener("touchmove", () => {});

  class Sortable {
    constructor(list, options) {
      this.list = typeof list === "string" ? document.querySelector(list) : list;

      this.items = Array.from(this.list.children);
      this.animation = false;

      this.options = Object.assign(
        {
          animationSpeed: 200,
          animationEasing: "ease-out"
        },
        options || {}
      );

      this.dragStart = this.dragStart.bind(this);
      this.dragMove = this.dragMove.bind(this);
      this.dragEnd = this.dragEnd.bind(this);

      this.list.addEventListener("touchstart", this.dragStart, false);
      this.list.addEventListener("mousedown", this.dragStart, false);
    }

    dragStart(e) {

      this.items = Array.from(this.list.children);

      if (this.animation) return;
      if (e.type === "mousedown" && e.which !== 1) return;
      if (e.type === "touchstart" && e.touches.length > 1) return;

      this.handle = null;

      let el = e.target;
      while (el) {
        if (el.hasAttribute("sortable-handle")) this.handle = el;
        if (el.hasAttribute("sortable-item")) this.item = el;
        if (el.hasAttribute("sortable-list")) break;
        el = el.parentElement;
      }

      if (!this.handle) return;

      this.list.style.position = "relative";
      this.list.style.height = this.list.offsetHeight + "px";

      this.item.classList.add("is-dragging");

      this.itemHeight = this.items[1].offsetTop;
      this.listHeight = this.list.offsetHeight;
      this.startTouchY = this.getDragY(e);
      this.startTop = this.item.offsetTop;

      const offsetsTop = this.items.map((item) => item.offsetTop);

      this.items.forEach((item, index) => {
        item.style.position = "absolute";
        item.style.top = 0;
        item.style.left = 0;
        item.style.width = "100%";
        item.style.transform = `translateY(${offsetsTop[index]}px)`;
        item.style.zIndex = item == this.item ? 2 : 1;
      });

      setTimeout(() => {
        this.items.forEach((item) => {
          if (this.item == item) return;
          item.style.transition = `transform ${this.options.animationSpeed}ms ${this.options.animationEasing}`;
        });
      });

      this.positions = this.items.map((item, index) => index);
      this.position = Math.round(
        (this.startTop / this.listHeight) * this.items.length
      );

      this.touch = e.type == "touchstart";
      window.addEventListener(
        this.touch ? "touchmove" : "mousemove",
        this.dragMove,
        { passive: false }
      );
      window.addEventListener(
        this.touch ? "touchend" : "mouseup",
        this.dragEnd,
        false
      );
    }

    dragMove(e) {

      this.items = Array.from(this.list.children);

      if (this.animation) return;

      const top = this.startTop + this.getDragY(e) - this.startTouchY;
      const newPosition = Math.round((top / this.listHeight) * this.items.length);

      this.item.style.transform = `translateY(${top}px)`;

      this.positions.forEach((index) => {
        if (index == this.position || index != newPosition) return;
        this.swapElements(this.positions, this.position, index);
        this.position = index;
      });

      this.items.forEach((item, index) => {
        if (item == this.item) return;
        item.style.transform = `translateY(${
          this.positions.indexOf(index) * this.itemHeight
        }px)`;
      });

      e.preventDefault();
    }

    dragEnd(e) {
      this.animation = true;

      this.item.style.transition = `all ${this.options.animationSpeed}ms ${this.options.animationEasing}`;
      this.item.style.transform = `translateY(${
        this.position * this.itemHeight
      }px)`;

      this.item.classList.remove("is-dragging");

      setTimeout(() => {
        this.list.style.position = "";
        this.list.style.height = "";

        this.items.forEach((item) => {
          item.style.top = "";
          item.style.left = "";
          item.style.right = "";
          item.style.position = "";
          item.style.transform = "";
          item.style.transition = "";
          item.style.width = "";
          item.style.zIndex = "";
        });

        this.positions.map((i) => this.list.appendChild(this.items[i]));
        this.items = Array.from(this.list.children);

        this.animation = false;

        //roy
        //check if this is the products list
        if (this.list.id == "selected_shared_features_draggable")
        {
          get_shared_features_list();
        }
        else
        {
          if (this.list.id == "selected_shared_paragraphs_draggable")
          {
            //it's the listicle paragraphs list
            get_shared_listicle_pargraphs_list();
          }
          else
          {
            var identifier = this.items[0].attributes['data-identifier'].value
            var img_url = this.items[0].attributes['data-img'].value
            set_featured_image_from_list(identifier,img_url)
          }
          
        }
        
        

      }, this.options.animationSpeed);

      window.removeEventListener(
        this.touch ? "touchmove" : "mousemove",
        this.dragMove,
        { passive: false }
      );
      window.removeEventListener(
        this.touch ? "touchend" : "mouseup",
        this.dragEnd,
        false
      );
    }

    swapElements(array, a, b) {
      const temp = array[a];
      array[a] = array[b];
      array[b] = temp;
    }

    getDragY(e) {
      return e.touches ? (e.touches[0] || e.changedTouches[0]).pageY : e.pageY;
    }
  }


  const sortable = new Sortable(".list");
  const sortable2 = new Sortable(".generallist");
  const sortable3 = new Sortable(".comparisonlist");
  const sortable4 = new Sortable(".selectedsharedfeatureslist");
  const sortable5 = new Sortable(".selectedsharedparagraphslist");
  
