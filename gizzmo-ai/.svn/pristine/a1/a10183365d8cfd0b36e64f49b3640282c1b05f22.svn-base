const baseURL = 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app';
const pageValue = getPageParameterValue();
var gb24 ="false";

function stc(targetTimestamp) {

  // Add 24 hours (24 * 60 * 60 * 1000 milliseconds) to the target timestamp
  const targetTimeWith24HoursAdded = targetTimestamp + (24 * 60 * 60 * 1000);
  
  const countdownSpan = document.getElementById('countown24timer');
  
  function updateTimer() {
    const now = new Date().getTime();
    const distance = targetTimeWith24HoursAdded - now;

    if (distance < 0) {
      countdownSpan.innerHTML = "00:00:00"; // If the countdown is over
      gb24 = "false"; // Set the flag to false
      clearInterval(interval);
      // Hide countdown24timer
      document.getElementById('countown24timer').style.display = 'none';
      return;
    }
    else {
      // Check if 24hpop is in local storage
      var gb24pop_shown = localStorage.getItem('gb24pop_shown');
      if (gb24pop_shown == null) {
        // Show the 24hpop
        showModal('promotionModel');
        // Set the gb24pop_shown to true
        localStorage.setItem('gb24pop_shown', 'true');
      }
      
      // Check if the countdown24timer is hidden then show it
      if (document.getElementById('countown24timer').style.display == 'none') {
        document.getElementById('countown24timer').style.display = 'block';
      }
    }
    gb24 = "true";
    
    // Calculate hours, minutes, and seconds
    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Update countdown display in hh:mm:ss format
    countdownSpan.innerHTML = `&#127873; <b>24-Hour Full Access:</b> ${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
  }

  const interval = setInterval(updateTimer, 1000);
  updateTimer(); // Initial call to display timer immediately
}


 

function able_disable_elements(settings_json)
{
  
  var current_page = getPageParameterValue();

  // locked-element
  //key_phrase_input_addon
  //key_phrase_input
  account_settings = settings_json['account_data'];
  //locked_element_badge = '<a href="https://gizzmo.ai/#upgrade" target="_blank" class="locked_badge">Upgrade to unlock</a>';
  locked_element_badge = '<a href="https://app.gizzmo.ai/?p=login&upgrade=true" target="_blank" class="locked_badge">Upgrade to unlock</a>';
  (function ($) {
    
    //seo_keyword
    if (account_settings['seo_keyword'] == 'Unavailable') {
      //locked_element_badge = '<a href="https://gizzmo.ai/#seo_keyword" target="_blank" class="locked_badge">Upgrade to unlock</a>';
      locked_element_badge = '<a href="https://app.gizzmo.ai/?p=login&upgrade=true&feature=seo_keyword" target="_blank" class="locked_badge">Upgrade to unlock</a>';
      $('#key_phrase_input_addon').html(locked_element_badge);
      $('#key_phrase_input').addClass('locked-element').prop('disabled', true);
    }
    

    //thematic_concept
    if (account_settings['thematic_concept'] == 'Unavailable') {
      //console.log('thematic_concept is locked');
      //locked_element_badge = '<a href="https://gizzmo.ai/#thematic_concept" target="_blank" class="locked_badge">Upgrade to unlock</a>';
       
      if(gb24 == "false")
      {
        locked_element_badge = '<a href="https://app.gizzmo.ai/?p=login&upgrade=true&feature=thematic_concept" target="_blank" class="locked_badge">Upgrade to unlock</a>';
        $('#thematic_concept_list_addon').html(locked_element_badge);
        $('#thematic_concept_list').addClass('locked-element').prop('disabled', true);
        //make all the <input  type="radio" > in the thematic_concept_list disabled
        $('#thematic_concept_list input[type="radio"]').prop('disabled', true);
      }
      else
      {
        locked_element_badge = '<a title="24-Hour Free Access Gift from Gizzmo.ai" href="https://app.gizzmo.ai/?p=login&upgrade=true" target="_blank" >&#127873;</a>';
        $('#thematic_concept_list_addon').html(locked_element_badge);
      }
    }
     


    //images_embed_in_content
    if (account_settings['images_embed_in_content'] == 'Unavailable') {
      //locked_element_badge = '<a href="https://gizzmo.ai/#images_embed_in_content" target="_blank" class="locked_badge">Upgrade to unlock</a>';
      locked_element_badge = '<a href="https://app.gizzmo.ai/?p=login&upgrade=true&feature=images_embed_in_content" target="_blank" class="locked_badge">Upgrade to unlock</a>';
      $('#images_embed_in_content_addon').html(locked_element_badge);
      $('#images_embed_in_content').addClass('locked-element').prop('disabled', true);
      //unchecked the checkbox
      $('#images_embed_in_content').prop('checked', false);
    }
    
    //internal_linking
    if (account_settings['internal_linking'] == 'Unavailable') {
      if(gb24 == "false")
      {

        //locked_element_badge = '<a href="https://gizzmo.ai/#internal_linking" target="_blank" class="locked_badge">Upgrade to unlock</a>';
        locked_element_badge = '<a href="https://app.gizzmo.ai/?p=login&upgrade=true&feature=internal_linking" target="_blank" class="locked_badge">Upgrade to unlock</a>';
        $('#internal_linking_addon').html(locked_element_badge);
        $('#internal_linking').addClass('locked-element').prop('disabled', true);
        //unchecked the checkbox
        $('#internal_linking').prop('checked', false);
      }
      else
      {
        locked_element_badge = '<a title="24-Hour Free Access Gift from Gizzmo.ai" href="https://app.gizzmo.ai/?p=login&upgrade=true" target="_blank" >&#127873;</a>';
        $('#internal_linking_addon').html(locked_element_badge);
        $('#internal_linking').prop('checked', true);
      }
    }

    //faqs
    if (account_settings['faqs'] == 'Unavailable') {
      if(gb24 == "false")
      {
        //locked_element_badge = '<a href="https://gizzmo.ai/#faqs" target="_blank" class="locked_badge">Upgrade to unlock</a>';
        locked_element_badge = '<a href="https://app.gizzmo.ai/?p=login&upgrade=true&feature=faqs" target="_blank" class="locked_badge">Upgrade to unlock</a>';
        $('#faqs_addon').html(locked_element_badge);
        $('#faqs').addClass('locked-element').prop('disabled', true);
        $('#faqs').prop('checked', false);
      }
      else
      {
        locked_element_badge = '<a title="24-Hour Free Access Gift from Gizzmo.ai" href="https://app.gizzmo.ai/?p=login&upgrade=true" target="_blank" >&#127873;</a>';
        $('#faqs_addon').html(locked_element_badge);
        if (current_page != 'gizzmo-ai-listicle') {
          $('#faqs').prop('checked', true);
        }
      }
    }

    //pros_cons
    if (account_settings['pros_cons'] == 'Unavailable') {
      if(gb24 == "false")
      { 
        //locked_element_badge = '<a href="https://gizzmo.ai/#pros_cons" target="_blank" class="locked_badge">Upgrade to unlock</a>';
        locked_element_badge = '<a href="https://app.gizzmo.ai/?p=login&upgrade=true&feature=pros_cons" target="_blank" class="locked_badge">Upgrade to unlock</a>';
        $('#pros_cons_addon').html(locked_element_badge);
        $('#pros_cons').addClass('locked-element').prop('disabled', true);
        $('#pros_cons').prop('checked', false);
      }
      else
      {
        locked_element_badge = '<a title="24-Hour Free Access Gift from Gizzmo.ai" href="https://app.gizzmo.ai/?p=login&upgrade=true" target="_blank" >&#127873;</a>';
        $('#pros_cons_addon').html(locked_element_badge);
        $('#pros_cons').prop('checked', true);
      }
    }

    //conclusion
    if (account_settings['conclusion'] == 'Unavailable') {
      if(gb24 == "false")
      {
        //locked_element_badge = '<a href="https://gizzmo.ai/#conclusion" target="_blank" class="locked_badge">Upgrade to unlock</a>';
        locked_element_badge = '<a href="https://app.gizzmo.ai/?p=login&upgrade=true&feature=conclusion" target="_blank" class="locked_badge">Upgrade to unlock</a>';
        $('#conclusion_addon').html(locked_element_badge);
        $('#conclusion').addClass('locked-element').prop('disabled', true);
        $('#conclusion').prop('checked', false);
      }
      else
      {
        locked_element_badge = '<a title="24-Hour Free Access Gift from Gizzmo.ai" href="https://app.gizzmo.ai/?p=login&upgrade=true" target="_blank" >&#127873;</a>';
        $('#conclusion_addon').html(locked_element_badge);
        if (current_page != 'gizzmo-ai-listicle') {
          $('#conclusion').prop('checked', true);
        }
      }
    }

    //schemas
    if (account_settings['seo_schemas'] == 'Unavailable') {
      if(gb24 == "false")
      {
        //locked_element_badge = '<a href="https://gizzmo.ai/#schemas" target="_blank" class="locked_badge">Upgrade to unlock</a>';
        locked_element_badge = '<a href="https://app.gizzmo.ai/?p=login&upgrade=true&feature=schemas" target="_blank" class="locked_badge">Upgrade to unlock</a>';
        $('#schemas_addon').html(locked_element_badge);
        $('#schemas').addClass('locked-element').prop('disabled', true);
        $('#schemas').prop('checked', false);
      }
      else
      {
        locked_element_badge = '<a title="24-Hour Free Access Gift from Gizzmo.ai" href="https://app.gizzmo.ai/?p=login&upgrade=true" target="_blank" >&#127873;</a>';
        $('#schemas_addon').html(locked_element_badge);
        $('#schemas').prop('checked', true);
      }
    }

    //tags
    if (account_settings['tags'] == 'Unavailable') {
      if(gb24 == "false")
      {
        //locked_element_badge = '<a href="https://gizzmo.ai/#tags" target="_blank" class="locked_badge">Upgrade to unlock</a>';
        locked_element_badge = '<a href="https://app.gizzmo.ai/?p=login&upgrade=true&feature=tags" target="_blank" class="locked_badge">Upgrade to unlock</a>';
        $('#tags_addon').html(locked_element_badge);
        $('#tags').addClass('locked-element').prop('disabled', true);
        $('#tags').prop('checked', false);
      }
      else
      {
        locked_element_badge = '<a title="24-Hour Free Access Gift from Gizzmo.ai" href="https://app.gizzmo.ai/?p=login&upgrade=true" target="_blank" >&#127873;</a>';
        $('#tags_addon').html(locked_element_badge);
        if (current_page != 'gizzmo-ai-listicle') {
          $('#tags').prop('checked', true);
        }
      }
    }

    //categories
    if (account_settings['categories'] == 'Unavailable') {
      //locked_element_badge = '<a href="https://gizzmo.ai/#categories" target="_blank" class="locked_badge">Upgrade to unlock</a>';
      locked_element_badge = '<a href="https://app.gizzmo.ai/?p=login&upgrade=true&feature=categories" target="_blank" class="locked_badge">Upgrade to unlock</a>';
      $('#categories_addon').html(locked_element_badge);
      $('#categories').addClass('locked-element').prop('disabled', true);
      $('#categories').prop('checked', false);
    }

    //affiliate_tags
    if (account_settings['affiliate_tags'] == 'Unavailable') {
      if(gb24 == "false")
      {
        //locked_element_badge = '<a href="https://gizzmo.ai/#affiliate_tags" target="_blank" class="locked_badge">Upgrade to unlock</a>';
        locked_element_badge = '<a href="https://app.gizzmo.ai/?p=login&upgrade=true&feature=affiliate_tags" target="_blank" class="locked_badge">Upgrade to unlock</a>';
        $('#affiliate_tags_addon').html(locked_element_badge);
        $('#affiliate_tags').addClass('locked-element').prop('disabled', true);

        $('#add_affiliate_tag').hide();
        $('#delete_affiliate_tag').hide();
        $('#amazon_affilaite_link').hide();
      }
      else
      {
        locked_element_badge = '<a title="24-Hour Free Access Gift from Gizzmo.ai" href="https://app.gizzmo.ai/?p=login&upgrade=true" target="_blank" >&#127873;</a>';
        $('#affiliate_tags_addon').html(locked_element_badge);
      }
    }


    //carousels
    if (account_settings['carousels'] == 'Unavailable') {
      if(gb24 == "false")
      {
        //locked_element_badge = '<a href="https://gizzmo.ai/#carousels" target="_blank" class="locked_badge">Upgrade to unlock</a>';
        locked_element_badge = '<a href="https://gizzmo.ai/#carousels" target="_blank" class="locked_badge">Upgrade to unlock</a>';
        $('#carousels_addon').html(locked_element_badge);
        $('#carousels').addClass('locked-element').prop('disabled', true);
        $('#carousels').prop('checked', false);
      }
      else
      {
        locked_element_badge = '<a title="24-Hour Free Access Gift from Gizzmo.ai" href="https://app.gizzmo.ai/?p=login&upgrade=true" target="_blank" >&#127873;</a>';
        $('#carousels_addon').html(locked_element_badge);
        $('#carousels').prop('checked', true);
      }
    }

    //keyphrase_hyperlinks
    if (account_settings['keyphrase_hyperlinks'] == 'Unavailable') {
      if(gb24 == "false")
      {
        locked_element_badge = '<a href="https://app.gizzmo.ai/?p=login&upgrade=true&feature=keyphrase_hyperlinks" target="_blank" class="locked_badge">Upgrade to unlock</a>';
        $('#keyphrase_hyperlinks_addon').html(locked_element_badge);
        $('#keyphrase_hyperlinks').addClass('locked-element').prop('disabled', true);
        $('#keyphrase_hyperlinks').prop('checked', false);
      }
      else
      {
        locked_element_badge = '<a title="24-Hour Free Access Gift from Gizzmo.ai" href="https://app.gizzmo.ai/?p=login&upgrade=true" target="_blank" >&#127873;</a>';
        $('#keyphrase_hyperlinks_addon').html(locked_element_badge);
        $('#keyphrase_hyperlinks').prop('checked', true);
      }
    }

    //ai_image_generation
    if (account_settings['ai_image_generation'] == 'Unavailable') {
      if(gb24 == "false")
      {
        //locked_element_badge = '<a href="https://gizzmo.ai/#ai_image_generation" target="_blank" class="locked_badge">Upgrade to unlock</a>';
        locked_element_badge = '<a href="https://app.gizzmo.ai/?p=login&upgrade=true&feature=ai_image_generation" target="_blank" class="locked_badge">Upgrade to unlock</a>';
        $('#ai_image_generation_addon').html(locked_element_badge);
        $('.cover_div').show();
        $('#ai_image_generation').addClass('locked-element').prop('disabled', true);
        $('#ai_image_generation').prop('checked', false);
      }
      else
      {
        locked_element_badge = '<a title="24-Hour Free Access Gift from Gizzmo.ai" href="https://app.gizzmo.ai/?p=login&upgrade=true" target="_blank" >&#127873;</a>';
        $('#ai_image_generation_addon').html(locked_element_badge);
      }
    }

    //roundup_products_list
    if (account_settings['roundup_products_list'] == 'Unavailable') {
      if(gb24 == "false")
      {
        //locked_element_badge = '<a href="https://gizzmo.ai/#roundup_products_list" target="_blank" class="locked_badge">Upgrade to unlock</a>';
        locked_element_badge = '<a href="https://app.gizzmo.ai/?p=login&upgrade=true&feature=roundup_products_list" target="_blank" class="locked_badge">Upgrade to unlock</a>';
        $('#roundup_products_list_addon').html(locked_element_badge);
        $('#roundup_products_list').addClass('locked-element').prop('disabled', true);
        $('#roundup_products_list').prop('checked', false);
      }
      else
      {
        locked_element_badge = '<a title="24-Hour Free Access Gift from Gizzmo.ai" href="https://app.gizzmo.ai/?p=login&upgrade=true" target="_blank" >&#127873;</a>';
        $('#roundup_products_list_addon').html(locked_element_badge);
        $('#roundup_products_list').prop('checked', true);
      }
    }

    //roundup_pros_cons_list
    if (account_settings['roundup_pros_cons'] == 'Unavailable') {
      if(gb24 == "false")
      {
        //locked_element_badge = '<a href="https://gizzmo.ai/#roundup_pros_cons" target="_blank" class="locked_badge">Upgrade to unlock</a>';
        locked_element_badge = '<a href="https://app.gizzmo.ai/?p=login&upgrade=true&feature=roundup_pros_cons" target="_blank" class="locked_badge">Upgrade to unlock</a>';
        $('#roundup_pros_cons_list_addon').html(locked_element_badge);
        $('#roundup_pros_cons_list').addClass('locked-element').prop('disabled', true);
        $('#roundup_pros_cons_list').prop('checked', false);
      }
      else
      {
        locked_element_badge = '<a title="24-Hour Free Access Gift from Gizzmo.ai" href="https://app.gizzmo.ai/?p=login&upgrade=true" target="_blank" >&#127873;</a>';
        $('#roundup_pros_cons_list_addon').html(locked_element_badge);
        $('#roundup_pros_cons_list').prop('checked', true);
      }

    }

    //roundup_rating_reviews
    if (account_settings['roundup_rating_reviews'] == 'Unavailable') {
      if(gb24 == "false")
      {
        //locked_element_badge = '<a href="https://gizzmo.ai/#roundup_rating_reviews" target="_blank" class="locked_badge">Upgrade to unlock</a>';
        locked_element_badge = '<a href="https://app.gizzmo.ai/?p=login&upgrade=true&feature=roundup_rating_reviews" target="_blank" class="locked_badge">Upgrade to unlock</a>';
        $('#roundup_rating_reviews_list_addon').html(locked_element_badge);
        $('#roundup_rating_reviews_list').addClass('locked-element').prop('disabled', true);
        $('#roundup_rating_reviroundup_rating_reviews_listews').prop('checked', false);
      }
      else
      {
        locked_element_badge = '<a title="24-Hour Free Access Gift from Gizzmo.ai" href="https://app.gizzmo.ai/?p=login&upgrade=true" target="_blank" >&#127873;</a>';
        $('#roundup_rating_reviews_list_addon').html(locked_element_badge);
        $('#roundup_rating_reviews_list').prop('checked', true);
      }
    }

    //CTAs
    if (account_settings['CTAs'] == 'Unavailable') {
      if(gb24 == "false")
      {
        //locked_element_badge = '<a href="https://gizzmo.ai/#CTAs" target="_blank" class="locked_badge">Upgrade to unlock</a>';
        locked_element_badge = '<a href="https://app.gizzmo.ai/?p=login&upgrade=true&feature=CTAs" target="_blank" class="locked_badge">Upgrade to unlock</a>';
        $('#CTAs_addon').html(locked_element_badge);
        $('#CTAs').addClass('locked-element').prop('disabled', true);
        $('#CTAs').prop('checked', false);
      }
      else
      {
        locked_element_badge = '<a title="24-Hour Free Access Gift from Gizzmo.ai" href="https://app.gizzmo.ai/?p=login&upgrade=true" target="_blank" >&#127873;</a>';
        $('#CTAs_addon').html(locked_element_badge);
        $('#CTAs').prop('checked', true);
      }
    }

    //tone_and_audience
    if (account_settings['tone_and_audience'] == 'Unavailable') {
      //locked_element_badge = '<a href="https://gizzmo.ai/#CTAs" target="_blank" class="locked_badge">Upgrade to unlock</a>';
      locked_element_badge = '<a href="https://app.gizzmo.ai/?p=login&upgrade=true&feature=tone_and_audience" target="_blank" class="locked_badge">Upgrade to unlock</a>';
      $('#selected_audience_addon').html(locked_element_badge);
      $('#selected_tone_addon').html(locked_element_badge);

      $('#selected_audience').addClass('locked-element').prop('disabled', true);
      $('#selected_tone').addClass('locked-element').prop('disabled', true);

      //change the background color of the seletec_audience and selected_tone to grey
      $('#selected_audience').css('background-color', 'grey');
      $('#selected_audience').css('cursor', 'not-allowed');
      $('#selected_audience').unbind('click');

      $('#selected_tone').css('background-color', 'grey');
      $('#selected_tone').css('cursor', 'not-allowed');
      $('#selected_tone').unbind('click');

    }

 

  }(jQuery));
  return;

  

}

function set_account_affiliate_tags(affiliate_tags_string)
{
  if (affiliate_tags_string != "" && affiliate_tags_string != null) {
     
    document.getElementById('affiliate_tags').style.display = 'block';
    document.getElementById('delete_affiliate_tag').style.display = 'block';

    //properties
    //affiliate_tags_string = settings_json['properties']["affiliate_tags"];

    
    // Split the string into an array of tags
    const affiliate_tags = affiliate_tags_string.split(',');
    // Get the select element
    const selectElement = document.getElementById('affiliate_tags');
    //clear the select element
    selectElement.innerHTML = '';

    // Get the selected tag from local storage, if available
    const selectedTag = localStorage.getItem('selected_affiliate_tag');
    // Loop through the tags and add them as options to the select element
    affiliate_tags.forEach((tag, index) => {
        const option = document.createElement('option');
        option.value = tag;
        option.textContent = tag;

        // Set the option as selected if it matches the stored tag or if it's the first tag
        if (tag === selectedTag || (index === 0 && !selectedTag)) {
            option.selected = true;
        }

        selectElement.appendChild(option);
    });
    // Save the selected tag to local storage when the selection changes
    selectElement.addEventListener('change', () => {
        localStorage.setItem('selected_affiliate_tag', selectElement.value);
    });


  }
  else {
      document.getElementById('affiliate_tags').style.display = 'none';
      //remove the margin-left: 10px from the add_affiliate_tag button
      document.getElementById('add_affiliate_tag').style.marginLeft = '0px';
      document.getElementById('delete_affiliate_tag').style.display = 'none';
      
  }
}

function check_unckeck_elements_by_settings(format_type,settings_json)
{
  //check if settings_json['formats_settings'] is {}
  //if (Object.keys(settings_json["formats_settings"]).length === 0)
  //{
  //  property_affilate_tags = settings_json['properties']['affiliate_tags'];
  //  set_account_affiliate_tags(property_affilate_tags)
  //  return;
  //} 
  (function ($) {
      var account_settings = null;
      if (format_type == 'product_review') {
        account_settings = settings_json["formats_settings"]['product_review'];
      }
      else if (format_type == 'roundup') {
        account_settings = settings_json["formats_settings"]['product_roundup'];
      }
      else if (format_type == 'comparison') {
        account_settings = settings_json["formats_settings"]['products_comparison'];
      }
      else if (format_type == 'listicle') {
        account_settings = settings_json["formats_settings"]['listicle'];
      }
    
      if (account_settings == null) {
        property_affilate_tags = settings_json['properties']['affiliate_tags'];
        if (format_type != 'listicle') {
          set_account_affiliate_tags(property_affilate_tags)
        }



        //set deafult values for checkboxes
        account_settings = settings_json['account_data'];

        if (account_settings['images_embed_in_content'] == 'Active') {
          $('#images_embed_in_content').prop('checked', true);
        }
        
        if (format_type != 'roundup') { 
          if (format_type != 'comparison') { 
            if (account_settings['internal_linking'] == 'Active') {
              $('#internal_linking').prop('checked', true);
            }
            if (account_settings['carousels'] == 'Active') {
              $('#carousels').prop('checked', true);
            }
          }
          if (account_settings['conclusion'] == 'Active') {
            $('#conclusion').prop('checked', true);
          }
          
        }
        else
        {
          if (account_settings['roundup_products_list'] == 'Active') {
            $('#roundup_products_list').prop('checked', true);
          }
          if (account_settings['roundup_pros_cons'] == 'Active') {
            $('#roundup_pros_cons_list').prop('checked', true);
          }
          if (account_settings['roundup_rating_reviews'] == 'Active') {
            $('#roundup_rating_reviews_list').prop('checked', true);
          }
        }
        
        if (account_settings['faqs'] == 'Active') {
          
          $('#faqs').prop('checked', true);
        }
        if (account_settings['pros_cons'] == 'Active') {
          $('#pros_cons').prop('checked', true);
        }
        
        if (account_settings['seo_schemas'] == 'Active') {
          $('#schemas').prop('checked', true);
        }
        if (account_settings['tags'] == 'Active') {
          $('#tags').prop('checked', true);
        }
        if (account_settings['CTAs'] == 'Active') {
          $('#CTAs').prop('checked', true);
        }
        

        return;
      }

  

  
    
      //seo_k`eyword
      //if (account_settings['seo_keyword'] == 'yes') {
      //  $('#key_phrase_input').prop('checked', true);
      //}
      //else {
      //  $('#key_phrase_input').prop('checked', false);
      //}

      //thematic_concept
      //if (account_settings['thematic_concept'] == 'yes') {
      //  $('#thematic_concept_list').prop('checked', true);
      //}

      //images_embed_in_content
      if (account_settings['images_embed_in_content'] == 'yes') {
        $('#images_embed_in_content').prop('checked', true);
      }
      else {  
        $('#images_embed_in_content').prop('checked', false);
      }
      
      //internal_linking
      if (account_settings['internal_linking'] == 'yes') {
        $('#internal_linking').prop('checked', true);
      }
      else {
        $('#internal_linking').prop('checked', false);
      }

      //faqs
      if (account_settings['faqs'] == 'yes') {
        $('#faqs').prop('checked', true);
      }
      else {
        $('#faqs').prop('checked', false);
      }

      //pros_cons
      if (account_settings['pros_cons'] == 'yes') {
        $('#pros_cons').prop('checked', true);
      }
      else {
        $('#pros_cons').prop('checked', false);
      }

      //conclusion
      if (account_settings['conclusion'] == 'yes') {
        $('#conclusion').prop('checked', true);
      }
      else {
        $('#conclusion').prop('checked', false);
      }

      //schemas
      if (account_settings['seo_schemas'] == 'yes') {
        $('#schemas').prop('checked', true);
      }
      else {
        $('#schemas').prop('checked', false);
      }

      //tags
      if (account_settings['tags'] == 'yes') {
        $('#tags').prop('checked', true);
      }
      else {
        $('#tags').prop('checked', false);
      }

      //categories
      if (account_settings['categories'] == 'yes') {
        $('#categories').prop('checked', true);
      }
      else {
        $('#categories').prop('checked', false);
      }

      if (format_type != 'listicle') {
        //affiliate_tags
        property_affilate_tags = settings_json['properties']['affiliate_tags'];
        set_account_affiliate_tags(property_affilate_tags)
      }

      //carousels
      if (account_settings['carousels'] == 'yes') {
        $('#carousels').prop('checked', true);
      }
      else {
        $('#carousels').prop('checked', false);
      }

      //keyphrase_hyperlinks
      if (account_settings['keyphrase_hyperlinks'] == 'yes') {
        $('#keyphrase_hyperlinks').prop('checked', true);
      }
      else {
        $('#keyphrase_hyperlinks').prop('checked', false);
      }

      //ai_image_generation
      if (format_type != 'listicle') {
        if (account_settings['ai_image_generation'] == 'yes') {
          $('#ai_image_generation').prop('checked', true);
        }
        else {
          $('#ai_image_generation').prop('checked', false);
        }
      }

      //roundup_products_list
      if (account_settings['roundup_products_list'] == 'yes') {
        $('#roundup_products_list').prop('checked', true);
      }
      else {
        $('#roundup_products_list').prop('checked', false);
      }

      //roundup_pros_cons
      if (account_settings['roundup_pros_cons'] == 'yes') {
        $('#roundup_pros_cons_list').prop('checked', true);
      }
      else {
        $('#roundup_pros_cons_list').prop('checked', false);
      }

      //roundup_rating_reviews
      if (account_settings['roundup_rating_reviews'] == 'yes') {
        $('#roundup_rating_reviews_list').prop('checked', true);
      }
      else {
        $('#roundup_rating_reviews_list').prop('checked', false);
      }

      //CTAs
      if (account_settings['CTAs'] == 'yes') {
        $('#CTAs').prop('checked', true);
      }
      else {
        $('#CTAs').prop('checked', false);
      }

  })(jQuery);


}


function handle_get_domain_account_data_reponse(data) {
  //get the page value
  pageName = getPageParameterValue();
  if (pageName == 'gizzmo-ai-product-review') {
    check_unckeck_elements_by_settings("product_review",data);
  }
  else if (pageName == 'gizzmo-ai-products-roundup') {
    check_unckeck_elements_by_settings("roundup",data);
  }
  else if (pageName == 'gizzmo-ai-products-comparison') {
    check_unckeck_elements_by_settings("comparison",data);
  }
  else if (pageName == 'gizzmo-ai-listicle') {
    check_unckeck_elements_by_settings("listicle",data);
  }

  gizzmo_package_name = data["account_data"]["package"];

  if (gizzmo_package_name == 'Free') {
    properties_date_created = data['account_data']["date_created"];
    const targetTimestamp = properties_date_created
    stc(targetTimestamp);
    able_disable_elements(data);
  }
  else
  {
    able_disable_elements(data);
  }


 
  
  
  






  //set the package name 
  document.getElementById('main_package_name').value = gizzmo_package_name;

  document.getElementById('package_name').innerHTML = gizzmo_package_name;
  
  
  document.getElementById('pkg_name').innerHTML = gizzmo_package_name;
  document.getElementById('total_credits').innerHTML = data["account_data"]["current_credits"];
  document.getElementById('credits_used').innerHTML = data["number_of_articles_created"];
  document.getElementById('credits_left').innerHTML = data["number_of_articles_left"];
  document.getElementById('days_left').innerHTML = data["number_of_days_left"];
  document.getElementById('rrenew_date').innerHTML = data["package_renew_date"];


  document.getElementById('token').innerHTML = data["account_data"]["token"];
  
  
  //get the current page
  pageName = getPageParameterValue();
  
  if (pageName != 'gizzmo-ai-listicle' && pageName != 'gizzmo-ai-deals' && pageName != 'gizzmo-ai-gizzmo-posts')
  {
    document.getElementById('ext_token').innerHTML = data["account_data"]["token"];
  }


  if (pageName == 'gizzmo-ai-deals')
  {
    
  }
  else if (pageName == 'gizzmo-ai-gizzmo-posts') {
    
    available_c = data["available_c"];
    if (available_c == "False") {
      //outofcredits_Modal
      showModal('outofcredits_Modal');
      document.getElementById('available_c').value = 'False';
    }
  }
  else
  {
    available_c = data["available_c"];
    if (available_c == "False") {
      //outofcredits_Modal
      showModal('outofcredits_Modal');
    }
  }
  


  if (gizzmo_package_name == 'Free') {
    document.getElementById('paid_packages_submenu').style.display = 'none';
    //get the current page
    pageName = getPageParameterValue();
    if (pageName == 'gizzmo-ai-products-roundup' || pageName == 'gizzmo-ai-products-comparison' || pageName == 'gizzmo-ai-listicle' || pageName == 'gizzmo-ai-deals' ) {
      if (gb24 == "false") {
        showModal('upgrade_package_Modal');
      }
      else {
        //activate the promotionPopModel for 2 seconds and fade out
        showModal('promotionPopModel');
        setTimeout(function () {
          closeModal('promotionPopModel');
        }, 1000);
      }
    }
  }
  else if (gizzmo_package_name == 'Starter') {
    //document.getElementById('paid_packages_submenu').style.display = 'block';
    document.getElementById('upgrade_package').style.display = 'block';
    pageName = getPageParameterValue();
    if (pageName == 'gizzmo-ai-products-roundup' || pageName == 'gizzmo-ai-deals' ) {

      if (pageName == 'gizzmo-ai-products-roundup') {
        if (data["account_data"]["roundup"] == 'Unavailable') {
          showModal('upgrade_package_Modal');
        }
      }

      if (pageName == 'gizzmo-ai-deals') {
        if (data["account_data"]["deals"] == 'Unavailable') {
          showModal('upgrade_package_Modal');
        }
      }

      
    }
  } 
  else if (gizzmo_package_name == 'Builder') {
    //document.getElementById('paid_packages_submenu').style.display = 'block';
    document.getElementById('upgrade_package').style.display = 'none';
    pageName = getPageParameterValue();
    if (pageName == 'gizzmo-ai-deals' ) {
        if (data["account_data"]["deals"] == 'Unavailable') {
          showModal('upgrade_package_Modal');
        }
    }
  }
  else if (gizzmo_package_name == 'Professional') {
    //document.getElementById('paid_packages_submenu').style.display = 'block';
    document.getElementById('upgrade_package').style.display = 'none';
  }
}

// on page load, check if the property is connected to gizzmo, if not, get the property and account data
function get_domain_account_data(domain) {

  //get plugin version
  var plugin_version = document.getElementById('plugin_version').value;

  return new Promise((resolve, reject) => {
      const data_json = {
          "domain": domain,
          "plugin_version": plugin_version
      };
      //console.log(JSON.stringify(data_json));
      const xhttp = new XMLHttpRequest();
      //xhttp.open("POST", `${baseURL}/g_get_domain_data`, true);
      xhttp.open("POST", `${baseURL}/g_get_domain_data_bubble`, true);
      xhttp.setRequestHeader("Content-Type", "application/json");
      xhttp.onreadystatechange = function() {
          if (this.readyState == 4) {
              if (this.status == 200) {
                  const response = this.responseText;
                  const response_json = JSON.parse(response);

                  const status = response_json['status'];
                  if (status == 'success') {
                    const data = response_json['data'];
                    sessionStorage.setItem('gizzmo_data', JSON.stringify(data));
                    //localStorage.setItem('gizzmo_data', JSON.stringify(data));

                    handle_get_domain_account_data_reponse(data);

                    closeModal('loading_Modal');


                    



                    resolve(data);
                  }
                  else {
                    if (response_json["message"] == "Domain Does not Exist") {
                      
                      closeModal('loading_Modal');

                      showModal('authModal');
                      showTab('signupTab');

                      reject("Domain Does not Exist");
                    }
                    else if (response_json["message"] == "Domain Exist Only in Bubbleapps") {
                      //roy here
                      closeModal('loading_Modal');

                      //showModal('authModal');
                      //showTab('loginTab')

                      //reject("Domain Exist Only in Bubbleapps");
                    }
                  }

                  //if (status == 'success') {
                  //    resolve(data);
                  //} else {
                  //    reject("error");
                  //}
              } else {
                  reject("HTTP error: " + this.status);
              }
          }
      };
      xhttp.send(JSON.stringify(data_json));
  });
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
function getPageParameterValue() {
  const urlParams = new URLSearchParams(window.location.search);
  return urlParams.get('page');
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




function generate_review_action(productID,products_type,used,task_id,property_id)
{
  var trash_svg = '';
  var product_id = `review_product_${productID}`;
  if (products_type == 'your_products') {
    product_id = `your_review_product_${productID}`;
    trash_svg = `<div id='${product_id}' style='cursor:pointer;padding: 0px;background-color: transparent;padding-left: 0px;position: relative;top: 6px;width: 35px;' title='Click to delete' onclick='delete_product(this)' data-id='${productID}'  data-task_id='${task_id}' data-property_id='${property_id}' class='btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90' ><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="23" height="23" viewBox="0 0 24 24" stroke-width="1.5" stroke="#646970" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"/> <line x1="4" y1="7" x2="20" y2="7" /> <line x1="10" y1="11" x2="10" y2="17" /> <line x1="14" y1="11" x2="14" y2="17" /> <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /> <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /> </svg></div>`;
  }

  if (used) {
    action_html = `<div id='${product_id}' style='cursor:pointer; width:43px;' title='You already used this product in a Review, Click to select Again' onclick='select_product(this)' data-id='${productID}' class='btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90 added' >Select</div>` + trash_svg;
  }
  else
  {
    action_html = `<div id='${product_id}' style='cursor:pointer;width:43px' title='Click to select' onclick='select_product(this)' data-id='${productID}' class='btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90' >Select</div>` + trash_svg;
  }
  return action_html;
}
function generate_roundup_action(productID,displayName,image_src,products_type,used,task_id,property_id)
{
  var trash_svg = '';
  var product_id = `roundup_product_${productID}`;
  if (products_type == 'your_products') {
    product_id = `your_roundup_product_${productID}`;
    trash_svg = `<div id='${product_id}' style='cursor:pointer;padding: 0px;background-color: transparent;padding-left: 0px;position: relative;top: 6px;width: 35px;' title='Click to delete' onclick='delete_product(this)' data-id='${productID}'  data-task_id='${task_id}' data-property_id='${property_id}' class='btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90' ><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="23" height="23" viewBox="0 0 24 24" stroke-width="1.5" stroke="#646970" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"/> <line x1="4" y1="7" x2="20" y2="7" /> <line x1="10" y1="11" x2="10" y2="17" /> <line x1="14" y1="11" x2="14" y2="17" /> <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /> <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /> </svg></div>`;
  }

  if (used) {
    action_html = `<div id='${product_id}' style='width:45px' title='You already used this product in a Roundup, Click to Add' data-identifier='${productID}' data-img="${image_src}" data-productname="${displayName}"   onclick='add_to_roundup_tab(this)' data-id='${productID}' class='btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90 added' >Add</div>` + trash_svg;
  }
  else
  {
    action_html = `<div id='${product_id}' style='width:45px' data-identifier='${productID}' data-img="${image_src}" data-productname="${displayName}" title='Click to add' onclick='add_to_roundup_tab(this)' data-id='${productID}' class='btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90' >Add</div>` + trash_svg;
  }
  return action_html;
}
function generate_comparison_action(productID,displayName,image_src,json_file_path,products_type,used,task_id,property_id)
{
  var trash_svg = '';
  var product_id = `compare_product_${productID}`;
  if (products_type == 'your_products') {
    product_id = `your_compare_product_${productID}`;
    trash_svg = `<div id='${product_id}' style='cursor:pointer;padding: 0px;background-color: transparent;padding-left: 0px;position: relative;top: 6px;width: 35px;' title='Click to delete' onclick='delete_product(this)' data-id='${productID}'  data-task_id='${task_id}' data-property_id='${property_id}' class='btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90' ><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="23" height="23" viewBox="0 0 24 24" stroke-width="1.5" stroke="#646970" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"/> <line x1="4" y1="7" x2="20" y2="7" /> <line x1="10" y1="11" x2="10" y2="17" /> <line x1="14" y1="11" x2="14" y2="17" /> <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /> <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /> </svg></div>`;
  }
  
  if (used) {
    action_html = `<div data-json_file_path='${json_file_path}' id='${product_id}' style='width:45px' data-identifier='${productID}' data-img="${image_src}" data-productname="${displayName}" title='You already used this product in a Comparison, Click to Add' onclick='add_to_comparison_tab(this)' data-id='${productID}' class='btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90 added' >Add</div>` + trash_svg;
  }
  else
  {
    action_html = `<div data-json_file_path='${json_file_path}' id='${product_id}' style='width:45px' data-identifier='${productID}' data-img="${image_src}" data-productname="${displayName}" title='Click to add' onclick='add_to_comparison_tab(this)' data-id='${productID}' class='btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90' >Add</div>` + trash_svg;
  }
  return action_html;
}
function generate_deal_action(productID,displayName,image_src,products_type,list_price,savingsPercentage,avg_price,json_file_path,price,source, property_id, task_id)
{
  var trash_svg = '';
  var product_id = `deal_product_${productID}`;
  if (products_type == 'your_deals') {
    product_id = `your_deal_product_${productID}`;
    trash_svg = `<div id='${product_id}' style='cursor:pointer;padding: 0px;background-color: transparent;padding-left: 0px;position: relative;top: 6px;width: 35px;' title='Click to delete' onclick='delete_product(this)'  data-task_id='${task_id}' data-property_id='${property_id}' class='btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90' ><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="23" height="23" viewBox="0 0 24 24" stroke-width="1.5" stroke="#646970" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"/> <line x1="4" y1="7" x2="20" y2="7" /> <line x1="10" y1="11" x2="10" y2="17" /> <line x1="14" y1="11" x2="14" y2="17" /> <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /> <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /> </svg></div>`;
  }

  action_html = `<div id='${product_id}' data-source="${source}" data-price="${price}"  data-list_price="${list_price}"  data-savingsPercentage="${savingsPercentage}" data-avg_price="${avg_price}"   style='width:45px' data-identifier='${productID}' data-img="${image_src}" data-productname="${displayName}" title='Click to add' onclick='add_to_deal_tab(this)' data-id='${productID}' class='btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90' >Add</div>` + trash_svg;
  return action_html;
}
function generate_select_deal_page_action(post_id,post_name,image_src,gizzmo_id,account_id,property_id,language,affiliate_tags)
{
  var deal_post_id = `deal_post_id_${post_id}`;
  var trash_svg = `<div id='${post_id}' style='cursor:pointer;padding: 0px;background-color: transparent;padding-left: 0px;position: relative;top: 6px;width: 35px;' title='Click to delete' onclick='delete_deal_post(this)' data-id='${post_id}'  data-post_id='${post_id}' data-property_id='${property_id}' class='btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90' ><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="23" height="23" viewBox="0 0 24 24" stroke-width="1.5" stroke="#646970" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"/> <line x1="4" y1="7" x2="20" y2="7" /> <line x1="10" y1="11" x2="10" y2="17" /> <line x1="14" y1="11" x2="14" y2="17" /> <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /> <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /> </svg></div>`;
  action_html = `<div id='${deal_post_id}'  style='width:45px' data-language='${language}'  data-affiliate_tags='${affiliate_tags}'  data-account_id='${account_id}' data-property_id='${property_id}' data-gizzmo_id='${gizzmo_id}'  data-post_id='${post_id}' data-img="${image_src}" data-post_name="${post_name}" title='Click to Select' onclick='select_deal_page(this)' class='btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90' >Select Post</div>`+ trash_svg;
  return action_html;
}
/*
function get_artifacts(property_id) {
  property_id = property_id.toString();
  const data_json = {
      "property_id": property_id
  };

  const cacheKey = `artifacts_${property_id}`;
  const cachedData = sessionStorage.getItem(cacheKey);
  const cacheTimestamp = sessionStorage.getItem(`${cacheKey}_timestamp`);
  const cacheDuration = 30 * 60 * 1000; // 30 minutes in milliseconds

  // Check if cached data exists and is still valid
  if (cachedData && cacheTimestamp && (Date.now() - cacheTimestamp < cacheDuration)) {
      // Parse the cached data and use it
      const gridData = JSON.parse(cachedData);
      renderGrid(gridData);
  } else {
      // Fetch from API
      const xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
          if (this.readyState === 4) {
              if (this.status === 200) {
                  const resp = JSON.parse(this.response);
                  const json_data = JSON.parse(resp.data);

                  // Filter and keep only the required properties
                  const filteredData = json_data.map(artifact => ({
                      preview_image: artifact.preview_image,
                      preview_name: artifact.preview_name,
                      preview_price: artifact.preview_price,
                      source: artifact.source,
                      product_id: artifact.product_id,
                      stars: artifact.stars,
                      reviews: artifact.reviews,
                      json_file_path: artifact.json_file_path
                  }));

                  // Create array of arrays for Grid.js
                  const gridData = filteredData.map(artifact => [
                      artifact.preview_image,
                      artifact.preview_name,
                      artifact.preview_price,
                      artifact.source || 'defaultSource', // Provide default if undefined
                      artifact.product_id || 'defaultProductID', // Provide default if undefined
                      artifact.stars,
                      artifact.reviews,
                      artifact.json_file_path
                  ]);

                  // Store data in sessionStorage
                  sessionStorage.setItem(cacheKey, JSON.stringify(gridData));
                  sessionStorage.setItem(`${cacheKey}_timestamp`, Date.now());

                  // Render the grid with the fetched data
                  renderGrid(gridData);
              } else {
                  console.error("Error fetching data from the API");
              }
          }
      };
      xhttp.open("POST", `${baseURL}/g_public_artifacts`, true);
      xhttp.setRequestHeader("Content-Type", "application/json");
      xhttp.send(JSON.stringify(data_json));
  }
}

function renderGrid(gridData) {
  const grid = new gridjs.Grid({
      search: {
          server: {
              url: (prev, keyword) => {
                  const baseUrl = prev || 'https://example.com/api';
                  return `${baseUrl}?search=${keyword}`;
              }
          }
      },
      columns: [
          {
              name: 'Search: ',
              id: 'id_search',
              formatter: (cell, row) => gridjs.html(`<img id="product_image_${row.cells[4]?.data}" style="width:50px; height:35px; object-fit:cover;" src="${cell}"></img>`)
          },
          {
              name: '',
              id: 'id_product_name',
              formatter: (cell, row) => {
                  const productID = row.cells[4]?.data;
                  const source = row.cells[3]?.data;
                  let displayName = cell;
                  if (cell.length > 45) {
                      displayName = cell.substring(0, 40) + '...';
                  }

                  const stars = row.cells[5]?.data;
                  const rating_number = row.cells[6]?.data;

                  const star_svg = '<svg style="float: right; padding-left: 5px;" height="12px" width="12px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 47.94 47.94" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path style="fill:#ED8A19;" d="M26.285,2.486l5.407,10.956c0.376,0.762,1.103,1.29,1.944,1.412l12.091,1.757 c2.118,0.308,2.963,2.91,1.431,4.403l-8.749,8.528c-0.608,0.593-0.886,1.448-0.742,2.285l2.065,12.042 c0.362,2.109-1.852,3.717-3.746,2.722l-10.814-5.685c-0.752-0.395-1.651-0.395-2.403,0l-10.814,5.685 c-1.894,0.996-4.108-0.613-3.746-2.722l2.065-12.042c0.144-0.837-0.134-1.692-0.742-2.285l-8.749-8.528 c-1.532-1.494-0.687-4.096,1.431-4.403l12.091-1.757c0.841-0.122,1.568-0.65,1.944-1.412l5.407-10.956 C22.602,0.567,25.338,0.567,26.285,2.486z"></path> </g></svg>';
                  const priceCount = `<span style="float:left;"><span style='font-weight: 600;'>Price:</span> ${row.cells[2]?.data}</span>`;
                  const starsCount = `<span style="float:right;padding-right: 3px;"> ${stars} ${star_svg} </span>`;

                  const ratingCount = `<span style="float:right;padding-left: 6px;">${rating_number} Rating</span>`;
                  const ratingHTML = `<div style="margin-top: 5px;line-height:12.5px;font-size: 11px;">${priceCount} ${ratingCount} ${starsCount} </div>`;

                  return gridjs.html(`
                      <div>
                          <a id="product_name_${productID}" style='font-weight: 600;text-decoration:underline' title='${cell}' target='_blank' href='https://${source}/dp/${productID}'>${displayName}</a>
                          ${ratingHTML}
                      </div>
                  `);
              }
          },
          { name: 'source', hidden: true, id: 'id_source' },
          { name: 'stars', hidden: true, id: 'id_stars' },
          { name: 'json_file_path', hidden: true, id: 'id_json_file_path' },
          { name: 'reviews', hidden: true, id: 'id_reviews' },
          {
              name: 'product_id',
              id: 'id_product_id',
              hidden: true,
              formatter: (cell, row) => cell
          },
          {
              name: '',
              id: 'id_action',
              formatter: (cell, row) => {
                  const productID = row.cells[4]?.data;
                  const image_src = row.cells[0]?.data;
                  const displayName = row.cells[1]?.data;
                  const json_file_path = row.cells[7]?.data;

                  let action_html = '';
                  if (pageValue == 'gizzmo-ai-product-review') {
                      action_html = generate_review_action(productID);
                  } else if (pageValue == 'gizzmo-ai-products-roundup') {
                      action_html = generate_roundup_action(productID, displayName, image_src);
                  } else if (pageValue == 'gizzmo-ai-products-comparison') {
                      action_html = generate_comparison_action(productID, displayName, image_src, json_file_path);
                  }

                  return gridjs.html(action_html);
              }
          }
      ],
      server: {
          url: '', // URL is not needed here as we're using cached data
          data: () => Promise.resolve({ data: gridData, total: gridData.length })
      },
      pagination: {
          limit: 10
      }
  }).render(document.getElementById("public_products"));
}
*/

function get_flag_by_source(source) {
  const flags = {
      "www.amazon.com": "https://flagcdn.com/w40/us.png",
      "www.amazon.co.uk": "https://flagcdn.com/w40/gb.png",
      "www.amazon.ca": "https://flagcdn.com/w40/ca.png",
      "www.amazon.de": "https://flagcdn.com/w40/de.png",
      "www.amazon.fr": "https://flagcdn.com/w40/fr.png",
      "www.amazon.it": "https://flagcdn.com/w40/it.png",
      "www.amazon.es": "https://flagcdn.com/w40/es.png",
      "www.amazon.co.jp": "https://flagcdn.com/w40/jp.png",
      "www.amazon.com.au": "https://flagcdn.com/w40/au.png",
      "www.amazon.in": "https://flagcdn.com/w40/in.png",
      "www.amazon.com.mx": "https://flagcdn.com/w40/mx.png",
      "www.amazon.com.br": "https://flagcdn.com/w40/br.png",
      "www.amazon.nl": "https://flagcdn.com/w40/nl.png",
      "www.amazon.com.tr": "https://flagcdn.com/w40/tr.png",
      "www.amazon.ae": "https://flagcdn.com/w40/ae.png",
      "www.amazon.sg": "https://flagcdn.com/w40/sg.png",
      "www.amazon.com.be": "https://flagcdn.com/w40/be.png",
      "www.amazon.sa": "https://flagcdn.com/w40/sa.png",
      "www.amazon.se": "https://flagcdn.com/w40/se.png",
      "www.amazon.pl": "https://flagcdn.com/w40/pl.png",
      "www.amazon.eg": "https://flagcdn.com/w40/eg.png"
  };

  // Return the img HTML if the source is found
  if (flags[source]) {
      return `<img style="height: 10px;position: relative;top: -1px;" src="${flags[source]}" alt="${source}">`;
  } else {
      return `<img style="height: 10px;position: relative;top: -1px;" src="https://flagcdn.com/w40/un.png" alt="Flag not found">`; // Default image if not found
  }
}



 
function get_artifacts(property_id)
{

    property_id = property_id.toString();
    const data_json = {
        "property_id": property_id
    };


    const grid = new gridjs.Grid({
        search: {
            server: {
              url: (prev, keyword) => {
                // Ensure 'prev' is defined or provide a fallback URL
                const baseUrl = prev || 'https://example.com/api'; // Replace with your actual base URL
                return `${baseUrl}?search=${keyword}`;
            }
            }
          },
        columns: [
          { 
            name: 'Search: ',
            id : 'id_search',
            formatter: (cell, row) => gridjs.html(`<img id="product_image_${row.cells[4]?.data}" style="width:50px; height:35px; object-fit:cover;" src="${cell}"></img>`)
          },
          {
            name: '',
            id : 'id_product_name',
            formatter: (cell, row) => {
              const productID = row.cells[4]?.data;
              const source = row.cells[3]?.data;
              let displayName = cell;
              if (cell.length > 45) {
                displayName = cell.substring(0, 40) + '...';
              }
              
              const stars = row.cells[5]?.data;
              const rating_number = row.cells[6]?.data;
              
              var flag = get_flag_by_source(source);

              const star_svg = '<svg style="float: right;    padding-left: 5px;" height="12px" width="12px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 47.94 47.94" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path style="fill:#ED8A19;" d="M26.285,2.486l5.407,10.956c0.376,0.762,1.103,1.29,1.944,1.412l12.091,1.757 c2.118,0.308,2.963,2.91,1.431,4.403l-8.749,8.528c-0.608,0.593-0.886,1.448-0.742,2.285l2.065,12.042 c0.362,2.109-1.852,3.717-3.746,2.722l-10.814-5.685c-0.752-0.395-1.651-0.395-2.403,0l-10.814,5.685 c-1.894,0.996-4.108-0.613-3.746-2.722l2.065-12.042c0.144-0.837-0.134-1.692-0.742-2.285l-8.749-8.528 c-1.532-1.494-0.687-4.096,1.431-4.403l12.091-1.757c0.841-0.122,1.568-0.65,1.944-1.412l5.407-10.956 C22.602,0.567,25.338,0.567,26.285,2.486z"></path> </g></svg>'
              const priceCount = `<span style="float:left;"><span style='font-weight: 600;'>${flag} Price:</span> ${row.cells[2]?.data}</span>`;
              const starsCount = `<span style="float:right;padding-right: 3px;"> ${stars} ${star_svg} </span>`;
              
              const ratingCount = `<span style="float:right;padding-left: 6px;">${rating_number} Rating</span>`;
              const ratingHTML = `<div style="margin-top: 5px;line-height:12.5px;font-size: 11px;">${priceCount} ${ratingCount}  ${starsCount}  </div>`;

              return gridjs.html(`
                <div>
                  <a id="product_name_${productID}" style='font-weight: 600;text-decoration:underline' title='${cell}' target='_blank' href='https://${source}/dp/${productID}'>${displayName}</a>
                  ${ratingHTML}
                </div>
              `);


            }
          },
          { name: 'source', hidden: true, id : 'id_source' },  // Hide the 'source' column
          { name: 'stars', hidden: true, id : 'id_stars' },  // Hide the 'source' column
          { name: 'json_file_path', hidden: true, id : 'id_json_file_path' },  // Hide the 'source' column
          { name: 'reviews', hidden: true, id : 'id_reviews' },  // Hide the 'source' column
          { 
            name: 'product_id',
            id : 'id_product_id',
            hidden: true,  // Hide the 'product_id' column
            formatter: (cell, row) => {
              return cell;
            }
          },
          { 
            name: '',
            id : 'id_action',
            formatter: (cell, row) => {
              var productID = row.cells[4]?.data;
              var image_src = row.cells[0]?.data;
              var displayName = row.cells[1]?.data;
              var json_file_path = row.cells[7]?.data;


               

                if (displayName.length > 45) {
                  displayName = displayName.substring(0, 40) + '...';
                }


                action_html = '';
                if (pageValue == 'gizzmo-ai-product-review') {
                  action_html = generate_review_action(productID)
                }
                else if (pageValue == 'gizzmo-ai-products-roundup') {
                  action_html = generate_roundup_action(productID,displayName,image_src)
                }
                else if (pageValue == 'gizzmo-ai-products-comparison') {
                  action_html = generate_comparison_action(productID,displayName,image_src,json_file_path)
                }



                return gridjs.html(action_html);
              }
          },
        ],
        server: {
          url: `${baseURL}/g_public_artifacts`,
          data: (opts) => {
            return new Promise((resolve, reject) => {
              // Let's implement our own HTTP client
              const xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function() {
                if (this.readyState === 4) {
                  if (this.status === 200 && !this.response.includes("No Artifacts Found")) {
                    const resp = JSON.parse(this.response);
                    //check if resp.data is undefined
                    const json_data = JSON.parse(resp.data);
      
                  
      
                    // Filter and keep only the required properties
                    const filteredData = json_data.map(artifact => ({
                      preview_image: artifact.preview_image,
                      preview_name: artifact.preview_name,
                      preview_price: artifact.preview_price,
                      source: artifact.source,
                      product_id: artifact.product_id,
                      stars: artifact.stars,
                      reviews: artifact.reviews,
                      json_file_path: artifact.json_file_path
                    }));
      
                    // Log the json_data for debugging
                    //console.log('JSON Data:', filteredData);

                    // Create array of arrays for Grid.js
                    const gridData = filteredData.map(artifact => [
                      artifact.preview_image,
                      artifact.preview_name,
                      artifact.preview_price,
                      artifact.source || 'defaultSource', // Provide default if undefined
                      artifact.product_id || 'defaultProductID', // Provide default if undefined
                      artifact.stars,
                      artifact.reviews,
                      artifact.json_file_path
                    ]);
      
      
                    // Make sure the output conforms to StorageResponse format: 
                    // https://github.com/grid-js/gridjs/blob/master/src/storage/storage.ts#L21-L24
                    resolve({
                      data: gridData,
                      total: gridData.length,
                    });
                  } else {
                    reject();
                  }
                }
              };
              //xhttp.open("GET", opts.url, true);
              //xhttp.send();
              xhttp.open("POST", opts.url, true);
              xhttp.setRequestHeader("Content-Type", "application/json");
              xhttp.send(JSON.stringify(data_json));
            });
          }
        },
        pagination: {
          limit: 10
        }
        
      }).render(document.getElementById("public_products"));
      
      
}
 




var check_tasks_interval;


//product review grid initialization=======================================================================================================
let grid;
let existingProductIds = new Set(); // A set to keep track of existing product IDs
function initializeGrid(initialData) {
    grid = new gridjs.Grid({
      search: {
          url: (prev, keyword) => {
            // Ensure 'prev' is defined or provide a fallback URL
            const baseUrl = prev || 'https://example.com/api'; // Replace with your actual base URL
            return `${baseUrl}?search=${keyword}`;
        }
      },
      columns: [
        { 
            name: 'Search: ',
            id : 'id_search',
            formatter: (cell,row) => gridjs.html(`<img id="product_image_${row.cells[4]?.data}" style="width:50px; height:35px; object-fit:cover;" src="${cell}"></img>`)
        },
        {
            name: '',
            id : 'id_product_name',
            formatter: (cell, row) => {
                const productID = row.cells[4]?.data;
                const source = row.cells[3]?.data;
                let displayName = cell;
                if (cell.length > 45) {
                    displayName = cell.substring(0, 40) + '...';
                }
                
                const stars = row.cells[5]?.data;
                const rating_number = row.cells[6]?.data;

                var flag = get_flag_by_source(source);

                const star_svg = '<svg style="float: right; padding-left: 5px;" height="12px" width="12px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 47.94 47.94" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path style="fill:#ED8A19;" d="M26.285,2.486l5.407,10.956c0.376,0.762,1.103,1.29,1.944,1.412l12.091,1.757 c2.118,0.308,2.963,2.91,1.431,4.403l-8.749,8.528c-0.608,0.593-0.886,1.448-0.742,2.285l2.065,12.042 c0.362,2.109-1.852,3.717-3.746,2.722l-10.814-5.685c-0.752-0.395-1.651-0.395-2.403,0l-10.814,5.685 c-1.894,0.996-4.108-0.613-3.746-2.722l2.065-12.042c0.144-0.837-0.134-1.692-0.742-2.285l-8.749-8.528 c-1.532-1.494-0.687-4.096,1.431-4.403l12.091-1.757c0.841-0.122,1.568-0.65,1.944-1.412l5.407-10.956 C22.602,0.567,25.338,0.567,26.285,2.486z"></path> </g></svg>'
                const priceCount = `<span style="float:left;"><span style='font-weight: 600;'>${flag} Price:</span> ${row.cells[2]?.data}</span>`;
                const starsCount = `<span style="float:right;padding-right: 3px;"> ${stars} ${star_svg} </span>`;
                
                const ratingCount = `<span style="float:right;padding-left: 6px;">${rating_number} Rating</span>`;
                const ratingHTML = `<div style="margin-top: 5px;line-height:12.5px;font-size: 11px;">${priceCount} ${ratingCount}  ${starsCount}  </div>`;
            
                return gridjs.html(`
                    <div>
                        <a id="product_name_${productID}" style='font-weight: 600;text-decoration:underline' title='${cell}' target='_blank' href='https://${source}/dp/${productID}'>${displayName}</a>
                        ${ratingHTML}
                    </div>
                `);
            }
        },
        { name: 'source', hidden: true, id : 'id_source' },
        { name: 'stars', hidden: true, id : 'id_stars' },
        { name: 'json_file_path', hidden: true, id : 'id_json_file_path' },
        { name: 'reviews', hidden: true, id : 'id_reviews' },
        { name: 'used', hidden: true, id : 'id_used' },
        { name: 'property_id', hidden: true, id : 'id_property_id' },
        { name: 'id', hidden: true, id : 'id_task' },
        
        { 
            name: 'product_id',
            id : 'id_product_id',
            hidden: true,
            formatter: (cell, row) => cell
        },
        { 
            name: '',
            id : 'id_action',
            formatter: (cell, row) => {
                 
                var productID = row.cells[4]?.data;
                var image_src = row.cells[0]?.data;
                var displayName = row.cells[1]?.data;
                var json_file_path = row.cells[7]?.data;
                var used = row.cells[8]?.data;
                var property_id = row.cells[9]?.data;
                var task_id = row.cells[10]?.data;

                if (displayName.length > 45) {
                    displayName = displayName.substring(0, 40) + '...';
                }

                let action_html = '';
                if (pageValue === 'gizzmo-ai-product-review') {
                    action_html = generate_review_action(productID,"your_products",used,task_id,property_id);
                } else if (pageValue === 'gizzmo-ai-products-roundup') {
                    action_html = generate_roundup_action(productID, displayName, image_src,"your_products",used,task_id,property_id);
                } else if (pageValue === 'gizzmo-ai-products-comparison') {
                    action_html = generate_comparison_action(productID, displayName, image_src, json_file_path,"your_products",used,task_id,property_id);
                }

                return gridjs.html(action_html);
            }
        }
      ],
          data: initialData,
          pagination: {
              limit: 10
          }
    }).render(document.getElementById("property_products"));
    
    // Store the initial product IDs in the set
    initialData.forEach(row => existingProductIds.add(row[4]));
}

function addNewRowsToGrid(newData) {
  // Filter new data to only include rows with product IDs not already in the existing set
  const uniqueNewData = newData.filter(row => !existingProductIds.has(row[4]));

  if (uniqueNewData.length > 0) {
      // Add the new product IDs to the existing set
      uniqueNewData.forEach(row => existingProductIds.add(row[4]));

      // Prepend the new rows to the existing data
      const updatedData = uniqueNewData.concat(grid.config.data);

      // Update the grid with the combined data and force a re-render
      grid.updateConfig({
          data: updatedData
      }).forceRender();
  }
}

function get_property_artifacts(property_id) {

   //main_content_type
  var content_type =  document.getElementById('main_content_type').value;

  const data_json = {
     "property_id": property_id.toString(),
      "content_type": content_type
    };

  const xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      if (this.readyState === 4 && this.status === 200) {
          const resp = JSON.parse(this.response);
          if (resp['message'] === 'No Artifacts Found') {
              document.getElementById('property_products').style.display = 'none';
              document.getElementById('promotion-div').style.display = 'block';

              //check local storage for if this is the first time the user is visiting the page
              if (localStorage.getItem('first_time') === null) {
                  //set the first time key to true
                  localStorage.setItem('first_time', 'no');
                  //emulate the click on the tab1 tab
                  document.getElementById('tab2').click();
              }

              return;
          }


          document.getElementById('promotion-div').style.display = 'none';
          document.getElementById('property_products').style.display = 'block';

          const json_data = JSON.parse(resp.data);
          const newGridData = json_data.map(artifact => [
              artifact.preview_image,
              artifact.preview_name,
              artifact.preview_price,
              artifact.source || 'defaultSource',
              artifact.product_id || 'defaultProductID',
              artifact.stars,
              artifact.reviews,
              artifact.json_file_path,
              artifact.used,
              artifact.property_id,
              artifact.id
          ]);

          // If the grid has not been initialized yet, initialize it
          if (!grid) {
              initializeGrid(newGridData);
          } else {
              // Add new rows to the existing grid
              addNewRowsToGrid(newGridData);
          }
      } else if (this.readyState === 4) {
          console.error('Failed to fetch data.');
      }
  };
  xhttp.open("POST", `${baseURL}/g_property_artifacts`, true);
  xhttp.setRequestHeader("Content-Type", "application/json");
  xhttp.send(JSON.stringify(data_json));
}
//end product review grid initialization=======================================================================================================



function delete_product(element)
{
  var productID = element.getAttribute('data-id');
  var task_id = element.getAttribute('data-task_id');
  var property_id = element.getAttribute('data-property_id');
  var data_json = {
    "task_id": task_id,
    "property_id": property_id
  };

  const xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState === 4 && this.status === 200) {
      const resp = JSON.parse(this.response);
      if (resp['message'] === 'Product Deleted') {
        // Remove the product from the grid
        //remove the parent tr with the class gridjs-tr
        const productRow = element.closest('.gridjs-tr');
        productRow.remove();
      } else {
        console.error('Failed to delete product.');
      }
    }
  };
  xhttp.open("POST", `${baseURL}/g_delete_product`, true);
  xhttp.setRequestHeader("Content-Type", "application/json");
  xhttp.send(JSON.stringify(data_json));
}


function delete_completed_task(element)
{
  var task_id = element.getAttribute('data-task_id');
  var property_id = element.getAttribute('data-property_id');
  var data_json = {
    "task_id": task_id,
    "property_id": property_id
  };

  const xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState === 4 && this.status === 200) {
      const resp = JSON.parse(this.response);
      if (resp['message'] === 'Task Deleted') {
        // Remove the product from the grid
        //remove the parent tr with the class gridjs-tr
        const productRow = element.closest('.gridjs-tr');
        productRow.remove();
      } else {
        console.error('Failed to delete task.');
      }
    }
  };
  xhttp.open("POST", `${baseURL}/g_delete_task`, true);
  xhttp.setRequestHeader("Content-Type", "application/json");
  xhttp.send(JSON.stringify(data_json));
}





function get_property_artifacts_old_unused(property_id) {
    document.getElementById("property_products").innerHTML = ''; // Clear the previous table

    // Convert property_id to string
    property_id = property_id.toString();
    const data_json = {
        "property_id": property_id
    };

    console.log("Fetching property artifacts...");

    if (!grid) {
        // Initialize the grid if it hasn't been initialized yet
        grid = new gridjs.Grid({
            search: {
                server: {
                  url: (prev, keyword) => `${prev}?search=${keyword}`
                }
            },
            columns: [
                { 
                    name: 'Search: ',
                    id : 'id_search',
                    formatter: (cell,row) => gridjs.html(`<img id="product_image_${row.cells[4]?.data}" style="width:50px; height:35px; object-fit:cover;" src="${cell}"></img>`)
                },
                {
                    name: '',
                    id : 'id_product_name',
                    formatter: (cell, row) => {
                        const productID = row.cells[4]?.data;
                        const source = row.cells[3]?.data;
                        let displayName = cell;
                        if (cell.length > 45) {
                            displayName = cell.substring(0, 40) + '...';
                        }
                        
                        const stars = row.cells[5]?.data;
                        const rating_number = row.cells[6]?.data;

                        const star_svg = '<svg style="float: right; padding-left: 5px;" height="12px" width="12px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 47.94 47.94" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path style="fill:#ED8A19;" d="M26.285,2.486l5.407,10.956c0.376,0.762,1.103,1.29,1.944,1.412l12.091,1.757 c2.118,0.308,2.963,2.91,1.431,4.403l-8.749,8.528c-0.608,0.593-0.886,1.448-0.742,2.285l2.065,12.042 c0.362,2.109-1.852,3.717-3.746,2.722l-10.814-5.685c-0.752-0.395-1.651-0.395-2.403,0l-10.814,5.685 c-1.894,0.996-4.108-0.613-3.746-2.722l2.065-12.042c0.144-0.837-0.134-1.692-0.742-2.285l-8.749-8.528 c-1.532-1.494-0.687-4.096,1.431-4.403l12.091-1.757c0.841-0.122,1.568-0.65,1.944-1.412l5.407-10.956 C22.602,0.567,25.338,0.567,26.285,2.486z"></path> </g></svg>'
                        const priceCount = `<span style="float:left;"><span style='font-weight: 600;'>Price:</span> ${row.cells[2]?.data}</span>`;
                        const starsCount = `<span style="float:right;padding-right: 3px;"> ${stars} ${star_svg} </span>`;
                        
                        const ratingCount = `<span style="float:right;padding-left: 6px;">${rating_number} Rating</span>`;
                        const ratingHTML = `<div style="margin-top: 5px;line-height:12.5px;font-size: 11px;">${priceCount} ${ratingCount}  ${starsCount}  </div>`;
                    
                        return gridjs.html(`
                            <div>
                                <a id="product_name_${productID}" style='font-weight: 600;text-decoration:underline' title='${cell}' target='_blank' href='https://${source}/dp/${productID}'>${displayName}</a>
                                ${ratingHTML}
                            </div>
                        `);
                    }
                },
                { name: 'source', hidden: true, id : 'id_source' },
                { name: 'stars', hidden: true, id : 'id_stars' },
                { name: 'json_file_path', hidden: true, id : 'id_json_file_path' },
                { name: 'reviews', hidden: true, id : 'id_reviews' },
                { 
                    name: 'product_id',
                    id : 'id_product_id',
                    hidden: true,
                    formatter: (cell, row) => cell
                },
                { 
                    name: '',
                    id : 'id_action',
                    formatter: (cell, row) => {
                        var productID = row.cells[4]?.data;
                        var image_src = row.cells[0]?.data;
                        var displayName = row.cells[1]?.data;
                        var json_file_path = row.cells[7]?.data;

                        if (displayName.length > 45) {
                            displayName = displayName.substring(0, 40) + '...';
                        }

                        let action_html = '';
                        if (pageValue === 'gizzmo-ai-product-review') {
                            action_html = generate_review_action(productID,"your_products");
                        } else if (pageValue === 'gizzmo-ai-products-roundup') {
                            action_html = generate_roundup_action(productID, displayName, image_src,"your_products");
                        } else if (pageValue === 'gizzmo-ai-products-comparison') {
                            action_html = generate_comparison_action(productID, displayName, image_src, json_file_path,"your_products");
                        }

                        return gridjs.html(action_html);
                    }
                }
            ],
            server: {
                url: `${baseURL}/g_property_artifacts`,
                data: (opts) => {
                    return new Promise((resolve, reject) => {
                        const xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function() {
                            if (this.readyState === 4) {
                                if (this.status === 200) {
                                    const resp = JSON.parse(this.response);
                                    if (resp['message'] === 'No Artifacts Found') {
                                        document.getElementById('property_products').style.display = 'none';
                                        document.getElementById('promotion-div').style.display = 'block';
                                        return;
                                    }
                                    document.getElementById('promotion-div').style.display = 'none';
                                    document.getElementById('property_products').style.display = 'block';

                                    const json_data = JSON.parse(resp.data);
                                    const filteredData = json_data.map(artifact => ({
                                        preview_image: artifact.preview_image,
                                        preview_name: artifact.preview_name,
                                        preview_price: artifact.preview_price,
                                        source: artifact.source,
                                        product_id: artifact.product_id,
                                        stars: artifact.stars,
                                        reviews: artifact.reviews,
                                        json_file_path: artifact.json_file_path
                                    }));

                                    const gridData = filteredData.map(artifact => [
                                        artifact.preview_image,
                                        artifact.preview_name,
                                        artifact.preview_price,
                                        artifact.source || 'defaultSource',
                                        artifact.product_id || 'defaultProductID',
                                        artifact.stars,
                                        artifact.reviews,
                                        artifact.json_file_path
                                    ]);

                                    resolve({
                                        data: gridData,
                                        total: gridData.length,
                                    });
                                } else {
                                    reject();
                                }
                            }
                        };
                        xhttp.open("POST", `${baseURL}/g_property_artifacts`, true);
                        xhttp.setRequestHeader("Content-Type", "application/json");
                        xhttp.send(JSON.stringify(data_json));
                    });
                }
            },
            pagination: {
                limit: 10
            }
        }).render(document.getElementById("property_products"));
    } else {
        // Refresh the grid data without reinitializing the grid
        grid.updateConfig({
            server: {
                data: (opts) => {
                    return new Promise((resolve, reject) => {
                        const xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function() {
                            if (this.readyState === 4) {
                                if (this.status === 200) {
                                    const resp = JSON.parse(this.response);
                                    if (resp['message'] === 'No Artifacts Found') {
                                        document.getElementById('property_products').style.display = 'none';
                                        document.getElementById('promotion-div').style.display = 'block';
                                        return;
                                    }
                                    document.getElementById('promotion-div').style.display = 'none';
                                    document.getElementById('property_products').style.display = 'block';

                                    const json_data = JSON.parse(resp.data);
                                    const filteredData = json_data.map(artifact => ({
                                        preview_image: artifact.preview_image,
                                        preview_name: artifact.preview_name,
                                        preview_price: artifact.preview_price,
                                        source: artifact.source,
                                        product_id: artifact.product_id,
                                        stars: artifact.stars,
                                        reviews: artifact.reviews,
                                        json_file_path: artifact.json_file_path
                                    }));

                                    const gridData = filteredData.map(artifact => [
                                        artifact.preview_image,
                                        artifact.preview_name,
                                        artifact.preview_price,
                                        artifact.source || 'defaultSource',
                                        artifact.product_id || 'defaultProductID',
                                        artifact.stars,
                                        artifact.reviews,
                                        artifact.json_file_path
                                    ]);

                                    resolve({
                                        data: gridData,
                                        total: gridData.length,
                                    });
                                } else {
                                    reject();
                                }
                            }
                        };
                        xhttp.open("POST", `${baseURL}/g_property_artifacts`, true);
                        xhttp.setRequestHeader("Content-Type", "application/json");
                        xhttp.send(JSON.stringify(data_json));
                    });
                }
            }
        }).forceRender();
    }
}






let gridInstance_2;

function get_property_tasks(property_id) {
    // Convert property_id to string
    property_id = property_id.toString();
    const data_json = {
        "property_id": property_id
    };


     
    var available_c = document.getElementById('available_c').value;

    // Function to fetch and update data
    const fetchDataAndUpdateGrid = () => {
        fetch(`${baseURL}/g_property_tasks?timestamp=${new Date().getTime()}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data_json)
        })
        .then(response => response.json())
        .then(resp => {
            if (resp.message === 'No Posts Found') {
                document.getElementById('posts').style.display = 'none';
                document.getElementById('promotion-div-posts_in_progress').style.display = 'block';

                //hide the loading_Modal modal
                closeModal('loading_Modal');
                return;
            }
            document.getElementById('promotion-div-posts_in_progress').style.display = 'none';
            document.getElementById('posts').style.display = 'block';

            const json_data = JSON.parse(resp.data);

            const gridData = json_data.map(post => [
                post.id,
                post.account_id,
                post.property_id,
                post.content_type,
                post.featured_image || 'https://placehold.co/300x200',
                post.language,
                post.selected_topic || '',
                post.seo_keyword || '',
                post.date_created,
                post.status
            ]);

            // If gridInstance_2 is already initialized, update its data
            if (gridInstance_2) {
                gridInstance_2.updateConfig({
                    data: gridData
                }).forceRender();
            } else {
                // Initialize the grid instance if it doesn't exist yet
                gridInstance_2 = new gridjs.Grid({
                    search: {
                        server: {
                          url: (prev, keyword) => {
                            const baseUrl = prev || 'https://example.com/api';
                            return `${baseUrl}?search=${keyword}`;
                          }
                        }
                    },
                    columns: [
                        {
                            name: 'Search: ',
                            id: 'id_search',
                            formatter: (cell, row) => gridjs.html(`<img id="product_image_${row.cells[0]?.data}" style="width:50px; height:35px; object-fit:cover;" src="${row.cells[4]?.data}"></img>`)
                        },
                        {
                            name: '',
                            id: 'id_product_name',
                            formatter: (cell, row) => {
                                var task_id = cell;
                                var account_id = row.cells[1]?.data;
                                var property_id = row.cells[2]?.data;
                                var content_type = row.cells[3]?.data;
                                var content_img = row.cells[4]?.data;
                                var content_language = row.cells[5]?.data;
                                var listicle_topic = row.cells[6]?.data;
                                var seo_keyphrase = row.cells[7]?.data;
                                var date_created = row.cells[8]?.data;
                                var status = row.cells[9]?.data;
                                
                                const date = new Date(date_created);
                                const dateTimeString = date.toLocaleString();

                                var content_title = seo_keyphrase;
                                if (content_type == 'Listicle') {
                                    content_title = listicle_topic;
                                }
                                if (content_title == null || content_title == "") {
                                    content_title = "Title Not Set Yet";
                                }
                                if (content_title.length > 45) {
                                    content_title = content_title.substring(0, 40) + '...';
                                }
                                content_title = "<span style='font-weight: 600;'>" + content_title + "</span>";

                                const date_created_span = `<span style="float:left;"><span style='font-weight: 600;'>Created :</span> ${dateTimeString}</span>`;
                                const ratingHTML = `<div style="margin-top: 5px;line-height:12.5px;font-size: 11px;">${date_created_span}</div>`;
                            
                                return gridjs.html(`
                                    <div>
                                        ${content_title}
                                        ${ratingHTML}
                                    </div>
                                `);
                            }
                        },
                        {
                            name: '',
                            id: 'id_content_type',
                            formatter: (cell, row) => {
                                var content_type = row.cells[3]?.data;
                                var background_color = "#333";
                                if (content_type == 'Listicle') {
                                    background_color = "#57b797";
                                } else if (content_type == 'Review') {
                                    background_color = "#0ea5e9";
                                } else if (content_type == 'Roundup') {
                                    background_color = "#bb60b1";
                                } else if (content_type == 'Comparison') {
                                    background_color = "#e9ad0e";
                                }
                                
                                var content_type_html = `<span style="background-color: ${background_color};border-radius: 14px;color: #fff;width: 80px;display: block;text-align: center;padding: 2px;">${content_type}</span>`;
            
                                return gridjs.html(`
                                    <div>
                                        ${content_type_html}
                                    </div>
                                `);
                            }
                        },
                        { name: 'stars', hidden: true, id: 'id_stars' },  // Hide the 'source' column
                        { name: 'json_file_path', hidden: true, id: 'id_json_file_path' },  // Hide the 'source' column
                        { name: 'reviews', hidden: true, id: 'id_reviews' },  // Hide the 'source' column
                        { name: 'date_created', hidden: true, id: 'id_date_created' },  // Hide the 'source' column
                        { name: 'status', hidden: true, id: 'id_status' },  // Hide the 'source' column
                        { 
                            name: 'product_id',
                            id: 'id_product_id',
                            hidden: true,  // Hide the 'product_id' column
                            formatter: (cell, row) => {
                                return cell;
                            }
                        },
                        { 
                            name: '',
                            id: 'id_action',
                            formatter: (cell, row) => {
                                var task_id = row.cells[0]?.data;
                                var account_id = row.cells[1]?.data;
                                var property_id = row.cells[2]?.data;
                                var content_type = row.cells[3]?.data;
                                var content_img = row.cells[4]?.data;
                                var content_language = row.cells[5]?.data;
                                var listicle_topic = row.cells[6]?.data;
                                var seo_keyphrase = row.cells[7]?.data;
                                var date_created = row.cells[8]?.data;
                                var status = row.cells[9]?.data;

                                var action_html = '';
                                if (status == 'In_Progress') {
                                    var in_progress_gif = `<div style="width: 26px;position: absolute;left: 630px;margin-top: -3px;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200"><rect fill="#f9f9f9" width="100%" height="100%"/><radialGradient id="a4" cx=".66" fx=".66" cy=".3125" fy=".3125" gradientTransform="scale(1.5)"><stop offset="0" stop-color="#5A10B9"></stop><stop offset=".3" stop-color="#5A10B9" stop-opacity=".9"></stop><stop offset=".6" stop-color="#5A10B9" stop-opacity=".6"></stop><stop offset=".8" stop-color="#5A10B9" stop-opacity=".3"></stop><stop offset="1" stop-color="#5A10B9" stop-opacity="0"></stop></radialGradient><circle transform-origin="center" fill="none" stroke="url(#a4)" stroke-width="15" stroke-linecap="round" stroke-dasharray="200 1000" stroke-dashoffset="0" cx="100" cy="100" r="70"><animateTransform type="rotate" attributeName="transform" calcMode="spline" dur="2" values="360;0" keyTimes="0;1" keySplines="0 0 1 1" repeatCount="indefinite"></animateTransform></circle><circle transform-origin="center" fill="none" opacity=".2" stroke="#5A10B9" stroke-width="15" stroke-linecap="round" cx="100" cy="100" r="70"></circle></svg></div>`;
                                    var in_progress_div = `<div style='width:100px' title='In Progress'><div style="float:left;position:relative">In Progress</div> ${in_progress_gif}</div>`;
                                    action_html = in_progress_div;
                                } else if (status == 'Completed') {
                                    var trash_svg = `<div style='cursor:pointer;padding: 0px;background-color: transparent;padding-left: 0px;position: relative;top: 6px;width: 35px;' title='Click to delete' onclick='delete_completed_task(this)'  data-task_id='${task_id}' data-property_id='${property_id}' class='btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90' ><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="23" height="23" viewBox="0 0 24 24" stroke-width="1.5" stroke="#646970" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"/> <line x1="4" y1="7" x2="20" y2="7" /> <line x1="10" y1="11" x2="10" y2="17" /> <line x1="14" y1="11" x2="14" y2="17" /> <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /> <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /> </svg></div>`;
                                    if (available_c =="False") {
                                      action_html = `<span onclick="alert('Out Of Credits')"  style="color: #5a10b9;border: 1px solid #5a10b9;border-radius: 3px;padding: 5px;padding-left: 10px;padding-right: 10px;background-color: #fff;cursor: pointer;">Save As Draft</span>` + trash_svg; 
                                    }
                                    else 
                                    {
                                      action_html = `<span onclick="save_content_as_draft(this)" data-task_id="${task_id}" style="color: #5a10b9;border: 1px solid #5a10b9;border-radius: 3px;padding: 5px;padding-left: 10px;padding-right: 10px;background-color: #fff;cursor: pointer;">Save As Draft</span>` + trash_svg;
                                    }
                                } else if (status == 'Failed') {
                                    action_html = `<div style='width:45px' title='Failed'>Failed</div>`;
                                } else if (status == 'Waiting') {
                                    action_html = `<div style='width:45px' title='Waiting'>Waiting</div>`;
                                }

                                return gridjs.html(action_html);
                            }
                        },
                    ],
                    data: gridData,
                    pagination: {
                        limit: 100
                    }
                }).render(document.getElementById("posts"));
            }
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
    };

    // Call the fetch and update function
    fetchDataAndUpdateGrid();
}

function update_posts_statuses(posts_statuses) {
  //console.log("Updating posts statuses");
  //console.log(posts_statuses);
  const data_json = {
    "posts_statuses": posts_statuses
  };

  fetch(`${baseURL}/g_update_posts_statuses`, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(data_json)
  })
  .then(response => response.json())
  .then(resp => {
    //console.log('Posts statuses updated:', resp);
  })
  .catch(error => {
    console.error('Error updating posts statuses:', error);
  });
}



let gridInstance_4;
function get_property_archived_posts(property_id) {

  (function ($) {

  var tasks_to_refrash_count = 0;

  // Convert property_id to string
  property_id = property_id.toString();
  const data_json = {
      "property_id": property_id
  };

  // Get the container element
  const container = document.getElementById("posts_published");


  if (gridInstance_4) {
    gridInstance_4.destroy();
  }


  //get wp_gizzmo_posts
  var gizzmo_posts_string = $('#wp_gizzmo_posts').val(); 
  var gizzmo_posts = [];
  if (gizzmo_posts_string != '') {
    //split the string into array by comma
    gizzmo_posts = gizzmo_posts_string.split(',');
  }

  //get the gizzmo_posts and update there status in the db
  posts_statuses = [];
  var total_number_of_posts = 0;


  // Create a new grid instance
  var row_count = 0;
  gridInstance_4 = new gridjs.Grid({
      search: {
          server: {
            url: (prev, keyword) => {
              const baseUrl = prev || 'https://example.com/api';
              return `${baseUrl}?search=${keyword}`;
            }
          }
      },
      columns: [
          {
              name: 'Search: ',
              id: 'id_search',
              formatter: (cell, row) => gridjs.html(`<img id="product_image_${row.cells[0]?.data}" style="width:50px; height:35px; object-fit:cover;" src="${row.cells[6]?.data}"></img>`)
          },
          {
              name: '',
              id: 'id_product_name',
              formatter: (cell, row) => {
                  var task_id = row.cells[0]?.data;
                  var account_id = row.cells[1]?.data;
                  var property_id = row.cells[2]?.data;
                  var wp_post_id = row.cells[3]?.data;
                  var post_title = row.cells[4]?.data;
                  var content_type = row.cells[5]?.data;
                  var content_img = row.cells[6]?.data;
                  var content_language = row.cells[7]?.data;
                  var date_created =  row.cells[10]?.data;
                  var post_wp_status =  row.cells[12]?.data;
                  row_count++;
                  
                  const date = new Date(date_created);
                  const dateTimeString = date.toLocaleString();


                  //go over the gizzmo_posts and check if the post is in the list
                  var post_in_gizzmo = false;
                  var live_wp_status = 'Deleted';
                  for (var i = 0; i < gizzmo_posts.length; i++) {
                    //split the string into array by -
                    var post_id = gizzmo_posts[i].split('^')[0];
                    var post_status = gizzmo_posts[i].split('^')[1];
                    var post_paramlink = gizzmo_posts[i].split('^')[2];
                    var post_edit_link = gizzmo_posts[i].split('^')[3];
                    if (post_id == wp_post_id) {
                      post_in_gizzmo = true;
                      live_wp_status = post_status;
                      if (live_wp_status != post_wp_status) {
                        posts_statuses.push({
                          "property_id": property_id,
                          "post_id": post_id,
                          "status": live_wp_status
                        });
                      }
                      break;
                    }
                  }
                  if (!post_in_gizzmo) {
                    //check if the post_id is in the posts_statuses
                    var already_in_posts_statuses = false;
                    if (posts_statuses.length > 0) {
                      for (var i = 0; i < posts_statuses.length; i++) {
                        if (posts_statuses[i].post_id == wp_post_id) {
                          already_in_posts_statuses = true;
                          break;
                        }
                      }
                    }
                    if (!already_in_posts_statuses) {
                        posts_statuses.push({
                          "property_id": property_id,
                          "post_id": wp_post_id,
                          "status": live_wp_status
                        });
                    }
                  }

                  //check if this row is the last row in the grid
                  
                  if (row_count == total_number_of_posts) {
                    //console.log("Last row");
                    //console.log(posts_statuses);
                    //update the posts statuses
                    if (posts_statuses.length > 0) {
                      //console.log("Updating posts statuses");
                       
                      update_posts_statuses(posts_statuses);
                    }
                  }


                   

                  

                  

                  //var content_title = seo_keyphrase;
                  //if (content_type == 'Listicle') {
                  //    content_title = listicle_topic;
                  //}
                  //if (content_title == null || content_title == "") {
                  //    content_title = "Title Not Set Yet";
                  //}
                  if (post_title.length > 45) {
                    post_title = post_title.substring(0, 40) + '...';
                  }
                  
                  if (post_paramlink == null || post_paramlink == "") {
                    if (live_wp_status == 'Deleted') {
                      content_title = `<span style='font-weight: 600;'>${post_title}</span>`;
                    }
                    else {
                      content_title = `<a href="${post_edit_link}" target="_blank"><span style='font-weight: 600;text-decoration:underline'>${post_title}</span></a>`;
                    }
                  } 
                  else {
                    content_title = `<a href="${post_paramlink}" target="_blank"><span style='font-weight: 600;color:#5a10b9;text-decoration:underline'>${post_title}</span></a>`;
                  }

                  var status_wrapper = `<span style="background-color: #10b981;border-radius: 14px;color: #fff;text-align: center;padding: 2px;font-size: 9px;padding-left: 14px;padding-right: 14px;">${live_wp_status}</span>`;
                  
                  if (live_wp_status == 'Deleted') {
                    status_wrapper = `<span style="min-width:66px;background-color: #d63638;border-radius: 14px;color: #fff;text-align: center;padding: 2px;font-size: 9px;padding-left: 14px;padding-right: 14px;">${live_wp_status}</span>`;
                  }
                  else if (live_wp_status != 'Published') {
                    status_wrapper = `<span style="min-width:66px;background-color: #929795;border-radius: 14px;color: #fff;text-align: center;padding: 2px;font-size: 9px;padding-left: 14px;padding-right: 14px;">${live_wp_status}</span>`;
                  }
                  const date_created_span = `<span style="float:left;"><span style='font-weight: 600;'>Created :</span> ${dateTimeString}</span>`;
                  const ratingHTML = `<div style="margin-top: 5px;line-height:12.5px;font-size: 11px;">${date_created_span} - ${status_wrapper}</div>`;
              
                  return gridjs.html(`
                      <div>
                          ${content_title}
                          ${ratingHTML}
                      </div>
                  `);
              }
          },
          {
              name: '',
              id: 'id_content_type',
              formatter: (cell, row) => {
                  var content_type = row.cells[5]?.data;
                  var background_color = "#333";
                  if (content_type == 'Listicle') {
                      background_color = "#57b797";
                  } else if (content_type == 'Review') {
                      background_color = "#0ea5e9";
                  } else if (content_type == 'Roundup') {
                      background_color = "#bb60b1";
                  } else if (content_type == 'Comparison') {
                      background_color = "#e9ad0e";
                  }
                  
                  var content_type_html = `<span style="background-color: ${background_color};border-radius: 14px;color: #fff;width: 80px;display: block;text-align: center;padding: 2px;">${content_type}</span>`;
  
                  return gridjs.html(`
                      <div>
                          ${content_type_html}
                      </div>
                  `);
              }
          },
          { name: 'stars', hidden: true, id: 'id_stars' },  // Hide the 'source' column
          { name: 'json_file_path', hidden: true, id: 'id_json_file_path' },  // Hide the 'source' column
          { name: 'reviews', hidden: true, id: 'id_reviews' },  // Hide the 'source' column
          { name: 'date_created', hidden: true, id: 'id_date_created' },  // Hide the 'source' column
          { name: 'status', hidden: true, id: 'id_status' },  // Hide the 'source' column
          { name: 'wp_post_id', hidden: true, id: 'id_wp_post_id' },  // Hide the 'source' column
          { name: 'post_title', hidden: true, id: 'id_post_title' },  // Hide the 'source' column\
          { name: 'wp_status', hidden: true, id: 'id_wp_status' },  // Hide the 'source' column\
          
          { 
              name: 'product_id',
              id: 'id_product_id',
              hidden: true,  // Hide the 'product_id' column
              formatter: (cell, row) => {
                  return cell;
              }
          },
          { 
              name: '',
              id: 'id_action',
              formatter: (cell, row) => {
                  var task_id = row.cells[0]?.data;
                  var account_id = row.cells[1]?.data;
                  var property_id = row.cells[2]?.data;
                  var wp_post_id = row.cells[3]?.data;
                  var post_title = row.cells[4]?.data;
                  var content_type = row.cells[5]?.data;
                  var content_img = row.cells[6]?.data;
                  var content_language = row.cells[7]?.data;
                  var date_created =  row.cells[10]?.data;
                  var wp_status =  row.cells[12]?.data;
                  var status = "Completed";


                  //go over the gizzmo_posts and check if the post is in the list
                  var post_in_gizzmo = false;
                  var live_wp_status = 'Deleted';
                  for (var i = 0; i < gizzmo_posts.length; i++) {
                    //split the string into array by -
                    var post_id = gizzmo_posts[i].split('^')[0];
                    var post_status = gizzmo_posts[i].split('^')[1];
                    var post_paramlink = gizzmo_posts[i].split('^')[2];
                    var post_edit_link = gizzmo_posts[i].split('^')[3];
                    if (post_id == wp_post_id) {
                      post_in_gizzmo = true;
                      live_wp_status = post_status;
                      break;
                    }
                  }


                  var action_html = '';
                  if (live_wp_status == 'Deleted') {
                    //pass 
                  }
                  else if (live_wp_status == 'Published') {
                    action_html = `<a href="${post_paramlink}" target="_blank"><span style="color: #5a10b9;border: 1px solid #5a10b9;border-radius: 3px;padding: 5px;padding-left: 20px;padding-right: 20px;background-color: #fff;cursor: pointer;">View Post</span></a>`;
                  }
                  else {
                    action_html = `<a href="${post_edit_link}" target="_blank"><span style="color: #5a10b9;border: 1px solid #5a10b9;border-radius: 3px;padding: 5px;padding-left: 23px;padding-right: 23px;background-color: #fff;cursor: pointer;">Edit Post</span></a>`;
                  }
                  

                  

                  return gridjs.html(action_html);
              }
          },
      ],
      server: {
          url: `${baseURL}/g_property_archived_posts?timestamp=${new Date().getTime()}`, // Cache-busting parameter
          data: (opts) => {
              return fetch(opts.url, {
                  method: 'POST',
                  headers: {
                      'Content-Type': 'application/json'
                  },
                  body: JSON.stringify(data_json)
              })
              .then(response => response.json())
              .then(resp => {
                  if (resp.message === 'No Posts Found') {
                      document.getElementById('posts_published').style.display = 'none';
                      document.getElementById('promotion-div-posts_published').style.display = 'block';
                      
                      //hide the loading_Modal modal
                      closeModal('loading_Modal');

                      return;
                  }
                  document.getElementById('promotion-div-posts_published').style.display = 'none';
                  document.getElementById('posts_published').style.display = 'block';

                  const json_data = JSON.parse(resp.data);

                  total_number_of_posts = json_data.length;

                  const filteredData = json_data.map(post => ({
                      id: post.id,
                      account_id: post.account_id,
                      property_id: post.property_id,
                      wp_post_id: post.wp_post_id,
                      post_title: post.post_title,
                      content_type: post.content_type,
                      featured_image: post.featured_image,
                      language: post.language,
                      selected_topic: post.selected_topic,
                      seo_keyword: post.seo_keyword,
                      date_created: post.date_created,
                      status: post.status,
                      wp_status: post.wp_status
                  }));

                  //go through the data and check if there are any tasks in progress
                  //for (var i = 0; i < filteredData.length; i++) {
                  //    if (filteredData[i].status == 'In_Progress' || filteredData[i].status == 'Waiting' || filteredData[i].status == 'Failed') {
                  //        tasks_to_refrash_count++;
                  //    }
                  //}
                  //console.log('JSON Data:', filteredData);

                  const gridData = filteredData.map(post => [
                      post.id,
                      post.account_id,
                      post.property_id,
                      post.wp_post_id,
                      post.post_title,
                      post.content_type, 
                      post.featured_image || 'https://placehold.co/300x200',
                      post.language,
                      post.selected_topic || '',
                      post.seo_keyword || '',
                      post.date_created,
                      post.status,
                      post.wp_status
                  ]);

                  //$('#posts').fadeIn(400);


                  //get url paramter show_archive
                  const urlParams = new URLSearchParams(window.location.search);
                  const show_archive = urlParams.get('show_archive');
                  if (show_archive == 'true') {
                     //show the archive posts by emulating the click on the tab
                      
                      document.getElementById('tab2').click();

                  }  
                  

                  //hide the loading_Modal modal
                  closeModal('loading_Modal');
                  



                  // Ensure output conforms to StorageResponse format
                  return {
                      data: gridData,
                      total: gridData.length,
                  };
              })
              .catch(error => {
                  console.error('Error fetching data:', error);
              })
              .finally(() => {

                  


                  //console.log('Data fetch completed');
                  //if (tasks_to_refrash_count == 0) {
                    //console.log("Clearing interval");
                    //clearInterval(check_tasks_interval);
                  //}
              });
              
          }
      },
      pagination: {
          limit: 100
      }
  }).render(container);






 














  })(jQuery);
}






function get_property_artifacts_deals(account_id, property_id, wp_post_id)
{

    property_id = property_id.toString();
    const data_json = {
        "property_id": property_id
    };


    const grid = new gridjs.Grid({
        search: {
            server: {
              url: (prev, keyword) => {
                // Ensure 'prev' is defined or provide a fallback URL
                const baseUrl = prev || 'https://example.com/api'; // Replace with your actual base URL
                return `${baseUrl}?search=${keyword}`;
            }
            }
          },
          columns: [
            { 
              name: 'Search: ',
              id : 'deal_image',
              formatter: (cell, row) => gridjs.html(`<img id="product_image_${row.cells[4]?.data}" style="width:50px; height:35px; object-fit:cover;" src="${cell}"></img>`)
            },
            {
              name: '',
              id : 'deal_name',
              formatter: (cell, row) => {
                const productID = row.cells[4]?.data;
                const source = row.cells[3]?.data;
                let displayName = cell;
                if (cell.length > 45) {
                  displayName = cell.substring(0, 40) + '...';
                }
                
                const stars = row.cells[5]?.data;
                const rating_number = row.cells[6]?.data;
    
                const star_svg = '<svg style="float: right; padding-left: 5px;" height="12px" width="12px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 47.94 47.94" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path style="fill:#ED8A19;" d="M26.285,2.486l5.407,10.956c0.376,0.762,1.103,1.29,1.944,1.412l12.091,1.757 c2.118,0.308,2.963,2.91,1.431,4.403l-8.749,8.528c-0.608,0.593-0.886,1.448-0.742,2.285l2.065,12.042 c0.362,2.109-1.852,3.717-3.746,2.722l-10.814-5.685c-0.752-0.395-1.651-0.395-2.403,0l-10.814,5.685 c-1.894,0.996-4.108-0.613-3.746-2.722l2.065-12.042c0.144-0.837-0.134-1.692-0.742-2.285l-8.749-8.528 c-1.532-1.494-0.687-4.096,1.431-4.403l12.091-1.757c0.841-0.122,1.568-0.65,1.944-1.412l5.407-10.956 C22.602,0.567,25.338,0.567,26.285,2.486z"></path> </g></svg>';
                const priceCount = `<span style="float:left;"><span style='font-weight: 600;'>Price:</span> ${row.cells[2]?.data}</span>`;
                const starsCount = `<span style="float:right;padding-right: 3px;"> ${stars} ${star_svg} </span>`;
                
                const ratingCount = `<span style="float:right;padding-left: 6px;">${rating_number} Rating</span>`;
                const ratingHTML = `<div style="margin-top: 5px;line-height:12.5px;font-size: 11px;">${priceCount} ${ratingCount} ${starsCount} </div>`;
            
                return gridjs.html(`
                  <div>
                    <a id="product_name_${productID}" style='font-weight: 600;text-decoration:underline' title='${cell}' target='_blank' href='https://${source}/dp/${productID}'>${displayName}</a>
                    ${ratingHTML}
                  </div>
                `);
              }
            },
            { name: 'source', hidden: true, id: "source_id" },
            { name: 'stars', hidden: true, id: "stars_id" },
            { name: 'json_file_path', hidden: true, id: "json_file_path_id" },
            { name: 'reviews', hidden: true, id: "reviews_id" },
            { name: 'list_price', hidden: true, id: "list_price_id" },
            { name: 'savingsPercentage', hidden: true, id: "savingsPercentage_id" },
            { name: 'avg_price', hidden: true, id: "avg_price_id" },
            { name: 'property_id', hidden: true, id: "property_id_id" },
            { name: 'id', hidden: true, id: "task_id" },
            { 
              name: 'product_id',
              id: "product_id_id",
              hidden: true,
              formatter: (cell, row) => cell
            },
            { 
              name: '',
              id: 'action_id',
              formatter: (cell, row) => {
                var productID = row.cells[4]?.data;
                var image_src = row.cells[0]?.data;
                var displayName = row.cells[1]?.data;
                var json_file_path = row.cells[10]?.data;
                var list_price = row.cells[7]?.data;
                var savingsPercentage = row.cells[8]?.data;
                var avg_price = row.cells[9]?.data;
                var price = row.cells[2]?.data;
                var source = row.cells[3]?.data;
                var property_id = row.cells[11]?.data;
                var task_id = row.cells[12]?.data;
    
    
                if (displayName.length > 45) {
                  displayName = displayName.substring(0, 40) + '...';
                }
                 
                action_html = generate_deal_action(productID, displayName, image_src, "your_deals", list_price, savingsPercentage, avg_price, json_file_path, price, source, property_id, task_id);
    
                return gridjs.html(action_html);
              }
            },
          ],
        server: {
          url: `${baseURL}/g_property_deal_artifacts`,
          data: (opts) => {
            return new Promise((resolve, reject) => {
              // Let's implement our own HTTP client
              const xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function() {
                if (this.readyState === 4) {
                  if (this.status === 200) {

                    

                    
                    var resp = JSON.parse(this.response);
                    if (resp['message'] === 'No Artifacts Found') {
                      document.getElementById('property_deals').style.display = 'none';
                      document.getElementById('promotion-div').style.display = 'block';
                      return;
                    }

                    document.getElementById('promotion-div').style.display = 'none';
                    document.getElementById('property_deals').style.display = 'block';

                    var json_data = JSON.parse(resp.data);

                    // Filter and keep only the required properties
                    var gridData = json_data.map(artifact => [
                      artifact.preview_image,
                      artifact.preview_name,
                      artifact.preview_price,
                      artifact.source || 'defaultSource',
                      artifact.product_id || 'defaultProductID',
                      artifact.stars,
                      artifact.reviews,
                      artifact.list_price,
                      artifact.savingsPercentage,
                      artifact.avg_price,
                      artifact.json_file_path,
                      artifact.property_id,
                      artifact.id
                    ]);


                    // Call get_live_deals only once after the grid has been rendered
                    //if (!liveDealsCalled) {
                    get_live_deals(property_id, account_id, wp_post_id);
                    liveDealsCalled = true; // Set the flag to true so it won't be called again
                    //}


                    // Make sure the output conforms to StorageResponse format: 
                    // https://github.com/grid-js/gridjs/blob/master/src/storage/storage.ts#L21-L24
                    resolve({
                      data: gridData,
                      total: gridData.length,
                    });
                  } else {
                    reject();
                  }
                }
              };
              //xhttp.open("GET", opts.url, true);
              //xhttp.send();
              xhttp.open("POST", opts.url, true);
              xhttp.setRequestHeader("Content-Type", "application/json");
              xhttp.send(JSON.stringify(data_json));
            });
          }
        },
        pagination: {
          limit: 100
        }
        
      }).render(document.getElementById("property_deals"));
      
      
}













/*
// Declare a variable to hold the Grid instance
let gridInstance;
let existingDealProductIds = new Set(); // A set to keep track of existing product IDs
let liveDealsCalled = false; // Flag to track if get_live_deals has been called

function get_property_artifacts_deals_____________________(account_id, property_id, wp_post_id) {
  // Convert property_id to string
  property_id = property_id.toString();
  const data_json = {
    "property_id": property_id
  };

  // Fetch and update the grid with only new rows
  const updateGridWithNewData = (gridData) => {
    // Filter new data to only include rows with product IDs not already in the existing set
    const uniqueNewData = gridData.filter(row => !existingDealProductIds.has(row[4]));

    if (uniqueNewData.length > 0) {
      // Add the new product IDs to the existing set
      uniqueNewData.forEach(row => existingDealProductIds.add(row[4]));

      // Prepend the new rows to the existing data
      const updatedData = uniqueNewData.concat(gridInstance.config.data);

      // Update the grid with the combined data and force a re-render
      gridInstance.updateConfig({
        data: updatedData
      }).forceRender();
    }

    // Call get_live_deals only once after the grid has been rendered
    if (!liveDealsCalled) {
      get_live_deals(property_id, account_id, wp_post_id);
      liveDealsCalled = true; // Set the flag to true so it won't be called again
    }
  };

  // If the grid instance already exists, don't destroy it; update it instead
  if (gridInstance) {
    fetchDealsData(data_json, updateGridWithNewData);
  } else {
    // Initialize the grid instance if it doesn't exist yet
    gridInstance = new gridjs.Grid({
      search: {
        server: {
            url: (prev, keyword) => {

              console.log("prev");
              console.log(keyword);

              // Ensure 'prev' is defined or provide a fallback URL
              const baseUrl = prev || 'https://example.com/api'; // Replace with your actual base URL
              return `${baseUrl}?search=${keyword}`;
          }
        }
      },
      columns: [
        { 
          name: 'Search: ',
          id : 'deal_image',
          formatter: (cell, row) => gridjs.html(`<img id="product_image_${row.cells[4]?.data}" style="width:50px; height:35px; object-fit:cover;" src="${cell}"></img>`)
        },
        {
          name: '',
          id : 'deal_name',
          formatter: (cell, row) => {
            const productID = row.cells[4]?.data;
            const source = row.cells[3]?.data;
            let displayName = cell;
            if (cell.length > 45) {
              displayName = cell.substring(0, 40) + '...';
            }
            
            const stars = row.cells[5]?.data;
            const rating_number = row.cells[6]?.data;

            const star_svg = '<svg style="float: right; padding-left: 5px;" height="12px" width="12px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 47.94 47.94" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path style="fill:#ED8A19;" d="M26.285,2.486l5.407,10.956c0.376,0.762,1.103,1.29,1.944,1.412l12.091,1.757 c2.118,0.308,2.963,2.91,1.431,4.403l-8.749,8.528c-0.608,0.593-0.886,1.448-0.742,2.285l2.065,12.042 c0.362,2.109-1.852,3.717-3.746,2.722l-10.814-5.685c-0.752-0.395-1.651-0.395-2.403,0l-10.814,5.685 c-1.894,0.996-4.108-0.613-3.746-2.722l2.065-12.042c0.144-0.837-0.134-1.692-0.742-2.285l-8.749-8.528 c-1.532-1.494-0.687-4.096,1.431-4.403l12.091-1.757c0.841-0.122,1.568-0.65,1.944-1.412l5.407-10.956 C22.602,0.567,25.338,0.567,26.285,2.486z"></path> </g></svg>';
            const priceCount = `<span style="float:left;"><span style='font-weight: 600;'>Price:</span> ${row.cells[2]?.data}</span>`;
            const starsCount = `<span style="float:right;padding-right: 3px;"> ${stars} ${star_svg} </span>`;
            
            const ratingCount = `<span style="float:right;padding-left: 6px;">${rating_number} Rating</span>`;
            const ratingHTML = `<div style="margin-top: 5px;line-height:12.5px;font-size: 11px;">${priceCount} ${ratingCount} ${starsCount} </div>`;
        
            return gridjs.html(`
              <div>
                <a id="product_name_${productID}" style='font-weight: 600;text-decoration:underline' title='${cell}' target='_blank' href='https://${source}/dp/${productID}'>${displayName}</a>
                ${ratingHTML}
              </div>
            `);
          }
        },
        { name: 'source', hidden: true, id: "source_id" },
        { name: 'stars', hidden: true, id: "stars_id" },
        { name: 'json_file_path', hidden: true, id: "json_file_path_id" },
        { name: 'reviews', hidden: true, id: "reviews_id" },
        { name: 'list_price', hidden: true, id: "list_price_id" },
        { name: 'savingsPercentage', hidden: true, id: "savingsPercentage_id" },
        { name: 'avg_price', hidden: true, id: "avg_price_id" },
        { name: 'property_id', hidden: true, id: "property_id_id" },
        { name: 'id', hidden: true, id: "task_id" },
        { 
          name: 'product_id',
          id: "product_id_id",
          hidden: true,
          formatter: (cell, row) => cell
        },
        { 
          name: '',
          id: 'action_id',
          formatter: (cell, row) => {
            var productID = row.cells[4]?.data;
            var image_src = row.cells[0]?.data;
            var displayName = row.cells[1]?.data;
            var json_file_path = row.cells[10]?.data;
            var list_price = row.cells[7]?.data;
            var savingsPercentage = row.cells[8]?.data;
            var avg_price = row.cells[9]?.data;
            var price = row.cells[2]?.data;
            var source = row.cells[3]?.data;
            var property_id = row.cells[11]?.data;
            var task_id = row.cells[12]?.data;


            if (displayName.length > 45) {
              displayName = displayName.substring(0, 40) + '...';
            }
             
            action_html = generate_deal_action(productID, displayName, image_src, "your_deals", list_price, savingsPercentage, avg_price, json_file_path, price, source, property_id, task_id);

            return gridjs.html(action_html);
          }
        },
      ],
      data: [], // Start with an empty data array
      pagination: {
        limit: 100
      }
    }).render(document.getElementById("property_deals"));

    // Fetch the data and update the grid
    fetchDealsData(data_json, updateGridWithNewData);
  }
}

function fetchDealsData(data_json, callback) {
  // Fetch the deal artifacts data
  const xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState === 4 && this.status === 200) {
      const resp = JSON.parse(this.response);
      if (resp['message'] === 'No Artifacts Found') {
        document.getElementById('property_deals').style.display = 'none';
        document.getElementById('promotion-div').style.display = 'block';
        return;
      }

      document.getElementById('promotion-div').style.display = 'none';
      document.getElementById('property_deals').style.display = 'block';

      const json_data = JSON.parse(resp.data);

      // Filter and keep only the required properties
      const gridData = json_data.map(artifact => [
        artifact.preview_image,
        artifact.preview_name,
        artifact.preview_price,
        artifact.source || 'defaultSource',
        artifact.product_id || 'defaultProductID',
        artifact.stars,
        artifact.reviews,
        artifact.list_price,
        artifact.savingsPercentage,
        artifact.avg_price,
        artifact.json_file_path,
        artifact.property_id,
        artifact.id
      ]);

      callback(gridData); // Call the callback function to update the grid with the new data
    }
  };
  xhttp.open("POST", `${baseURL}/g_property_deal_artifacts`, true);
  xhttp.setRequestHeader("Content-Type", "application/json");
  xhttp.send(JSON.stringify(data_json));
}
*/



function get_property_artifacts_deals_old_unused(account_id, property_id, wp_post_id) {
  // Convert property_id to string
  property_id = property_id.toString();
  const data_json = {
    "property_id": property_id
  };

  // Clear property_deals
  document.getElementById('property_deals').innerHTML = '';

  // Destroy the existing grid instance if it exists
  if (gridInstance) {
    gridInstance.destroy();
  }


  // Create a new grid instance
  gridInstance = new gridjs.Grid({
    search: {
      server: {
        url: (prev, keyword) => {
          // Ensure 'prev' is defined or provide a fallback URL
          const baseUrl = prev || 'https://example.com/api'; // Replace with your actual base URL
          return `${baseUrl}?search=${keyword}`;
      }
      }
    },
    columns: [
      { 
        name: 'Search: ',
        id : 'deal_image',
        formatter: (cell, row) => gridjs.html(`<img id="product_image_${row.cells[4]?.data}" style="width:50px; height:35px; object-fit:cover;" src="${cell}"></img>`)
      },
      {
        name: '',
        id : 'deal_name',
        formatter: (cell, row) => {
          const productID = row.cells[4]?.data;
          const source = row.cells[3]?.data;
          let displayName = cell;
          if (cell.length > 45) {
            displayName = cell.substring(0, 40) + '...';
          }
          
          const stars = row.cells[5]?.data;
          const rating_number = row.cells[6]?.data;

          const star_svg = '<svg style="float: right; padding-left: 5px;" height="12px" width="12px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 47.94 47.94" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path style="fill:#ED8A19;" d="M26.285,2.486l5.407,10.956c0.376,0.762,1.103,1.29,1.944,1.412l12.091,1.757 c2.118,0.308,2.963,2.91,1.431,4.403l-8.749,8.528c-0.608,0.593-0.886,1.448-0.742,2.285l2.065,12.042 c0.362,2.109-1.852,3.717-3.746,2.722l-10.814-5.685c-0.752-0.395-1.651-0.395-2.403,0l-10.814,5.685 c-1.894,0.996-4.108-0.613-3.746-2.722l2.065-12.042c0.144-0.837-0.134-1.692-0.742-2.285l-8.749-8.528 c-1.532-1.494-0.687-4.096,1.431-4.403l12.091-1.757c0.841-0.122,1.568-0.65,1.944-1.412l5.407-10.956 C22.602,0.567,25.338,0.567,26.285,2.486z"></path> </g></svg>';
          const priceCount = `<span style="float:left;"><span style='font-weight: 600;'>Price:</span> ${row.cells[2]?.data}</span>`;
          const starsCount = `<span style="float:right;padding-right: 3px;"> ${stars} ${star_svg} </span>`;
          
          const ratingCount = `<span style="float:right;padding-left: 6px;">${rating_number} Rating</span>`;
          const ratingHTML = `<div style="margin-top: 5px;line-height:12.5px;font-size: 11px;">${priceCount} ${ratingCount} ${starsCount} </div>`;
      
          return gridjs.html(`
            <div>
              <a id="product_name_${productID}" style='font-weight: 600;text-decoration:underline' title='${cell}' target='_blank' href='https://${source}/dp/${productID}'>${displayName}</a>
              ${ratingHTML}
            </div>
          `);
        }
      },
      { name: 'source', hidden: true, id: "source_id" }, // Hide the 'source' column
      { name: 'stars', hidden: true, id: "stars_id" }, // Hide the 'source' column
      { name: 'json_file_path', hidden: true, id: "json_file_path_id" }, // Hide the 'source' column
      { name: 'reviews', hidden: true, id: "reviews_id" }, // Hide the 'source' column
      { name: 'list_price', hidden: true, id: "list_price_id" }, // Hide the 'source' column
      { name: 'savingsPercentage', hidden: true, id: "savingsPercentage_id" }, // Hide the 'source' column
      { name: 'avg_price', hidden: true, id: "avg_price_id" }, // Hide the 'source' column
      { 
        name: 'product_id',
        id: "product_id_id",
        hidden: true, // Hide the 'product_id' column
        formatter: (cell, row) => {
          return cell;
        }
      },
      { 
        name: '',
        id: 'action_id',
        formatter: (cell, row) => {
          var productID = row.cells[4]?.data;
          var image_src = row.cells[0]?.data;
          var displayName = row.cells[1]?.data;
          var json_file_path = row.cells[10]?.data;
          var list_price = row.cells[7]?.data;
          var savingsPercentage = row.cells[8]?.data;
          var avg_price = row.cells[9]?.data;
          var price = row.cells[2]?.data;
          var source = row.cells[3]?.data;

          if (displayName.length > 45) {
            displayName = displayName.substring(0, 40) + '...';
          }
           
          action_html = generate_deal_action(productID, displayName, image_src, "your_deals", list_price, savingsPercentage, avg_price, json_file_path, price, source);

          return gridjs.html(action_html);
        }
      },
    ],
    server: {
      url: `${baseURL}/g_property_deal_artifacts`,
      data: (opts) => {
        return new Promise((resolve, reject) => {
          // Let's implement our own HTTP client
          const xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState === 4) {
              if (this.status === 200) {
                const resp = JSON.parse(this.response);
                if (resp['message'] === 'No Artifacts Found') {
                  // Hide property_products
                  document.getElementById('property_deals').style.display = 'none';
                  // Show promotion div
                  document.getElementById('promotion-div').style.display = 'block';
                  return;
                }

                 
                document.getElementById('promotion-div').style.display = 'none';
                document.getElementById('property_deals').style.display = 'block';

                const json_data = JSON.parse(resp.data);
              
                // Filter and keep only the required properties
                const filteredData = json_data.map(artifact => ({
                  preview_image: artifact.preview_image,
                  preview_name: artifact.preview_name,
                  preview_price: artifact.preview_price,
                  source: artifact.source,
                  product_id: artifact.product_id,
                  stars: artifact.stars,
                  reviews: artifact.reviews,
                  list_price: artifact.list_price,
                  savingsPercentage: artifact.savingsPercentage,
                  avg_price: artifact.avg_price,
                  json_file_path: artifact.json_file_path
                }));
    
                // Log the json_data for debugging
                //console.log('JSON Data:', filteredData);

                // Create array of arrays for Grid.js
                const gridData = filteredData.map(artifact => [
                  artifact.preview_image,
                  artifact.preview_name,
                  artifact.preview_price,
                  artifact.source || 'defaultSource', // Provide default if undefined
                  artifact.product_id || 'defaultProductID', // Provide default if undefined
                  artifact.stars,
                  artifact.reviews,
                  artifact.list_price,
                  artifact.savingsPercentage,
                  artifact.avg_price,
                  artifact.json_file_path
                ]);
    
                // Make sure the output conforms to StorageResponse format: 
                // https://github.com/grid-js/gridjs/blob/master/src/storage/storage.ts#L21-L24
                resolve({
                  data: gridData,
                  total: gridData.length,
                });


                



                get_live_deals(property_id, account_id, wp_post_id);
              } else {
                reject();
              }
            }
          };
          xhttp.open("POST", opts.url, true);
          xhttp.setRequestHeader("Content-Type", "application/json");
          xhttp.send(JSON.stringify(data_json));
        });
      }
    },
    pagination: {
      limit: 100
    }
  }).render(document.getElementById("property_deals"));
}



function get_account_property_deals_pages(account_id,property_id)
{
  //convert property_id to string
  property_id = property_id.toString();
  account_id = account_id.toString();
  const data_json = {
      "account_id": account_id,
      "property_id": property_id
  };

   

  const grid = new gridjs.Grid({
      search: {
          server: {
            url: (prev, keyword) => {
              // Ensure 'prev' is defined or provide a fallback URL
              const baseUrl = prev || 'https://example.com/api'; // Replace with your actual base URL
              return `${baseUrl}?search=${keyword}`;
          }
          }
        },
      columns: [
        { 
          name: 'Search: ',
          id:'seach_id',
          formatter: (cell,row) => gridjs.html(`<img id="product_image_${cell}" style="width:50px; height:35px; object-fit:cover;" src="${row.cells[4]?.data}"></img>`)
        },
        {
          name: '',
          id:'action_id',
          formatter: (cell, row) => {

              //wp_post_id: deal_page.wp_post_id,
              //page_title: deal_page.page_title,
              //sys_featured_image: deal_page.sys_featured_image,
              //last_update: deal_page.last_update,
              //date_created: deal_page.date_created
            const gizzmo_id = row.cells[0]?.data;
            const post_id = row.cells[2]?.data;
            let displayName = row.cells[3]?.data;
            var full_name = row.cells[3]?.data;
            if (displayName.length > 50) {
              displayName = displayName.substring(0, 50) + '...';
            }
            const date_created = row.cells[6]?.data;
            // Create a Date object from the timestamp
            const date = new Date(date_created);
            const dateString = date.toISOString().split('T')[0];

            var date_deals_updated = "";
            const date_updated = row.cells[5]?.data;
            if (date_updated == null || date_updated == 'undefined') {
              date_deals_updated = 'Never';
            }
            else
            {
              // Create a Date object from the timestamp
              const date_updated_date = new Date(date_updated);
              date_deals_updated = date_updated_date.toISOString().split('T')[0];
            }


            var url = window.location.href;
            var arr = url.split("/");
            var main_domain = arr[0] + "//" + arr[2] + "/";
            var post_link = main_domain + "?p=" + post_id;
            

            const createdDate = `<span style="float:left;"><span style='font-weight: 600;'>Created:</span> ${dateString}</span>`;
            const UpdatedDate = `<span style="float:right;padding-right: 3px;"><span style='font-weight: 600;'>Deals Updated:</span> ${date_deals_updated} </span>`;
            
            const created_updated_HTML = `<div style="margin-top: 5px;line-height:12.5px;font-size: 11px;">${createdDate} ${UpdatedDate}</div>`;
        
            return gridjs.html(`
              <div>
                <a style='font-weight: 600;text-decoration:underline' title='${full_name}' target='_blank' href='${post_link}'>${displayName}</a>
                ${created_updated_HTML}
              </div>
            `);
          }
        },
        { name: 'id', hidden: true, id:'g_id' },  // Hide the 'source' column
        { name: 'gizzmo_id', hidden: true, id:'gz_id'},  // Hide the 'source' column
        { name: 'sys_featured_image', hidden: true, id:'sys_featured_image_id' },  // Hide the 'source' column
        { name: 'last_update', hidden: true, id:'last_update_id' },  // Hide the 'source' column
        { name: 'date_created', hidden: true, id:'date_created_id' },  // Hide the 'source' column
        { name: 'language', hidden: true, id:'language_id' },  // Hide the 'source' column
        { name: 'affiliate_tags', hidden: true, id:'affiliate_tags_id' },  // Hide the 'source' column
        { 
          name: '',
          id:'g_action_id',
          formatter: (cell, row) => {
              

              var gizzmo_id = row.cells[0]?.data;
              var post_id = row.cells[2]?.data;
              var post_name = row.cells[3]?.data;
              var image_src = row.cells[4]?.data;
              var language = row.cells[7]?.data;
              var affiliate_tags = row.cells[8]?.data;

              if (post_name.length > 45) {
                post_name = post_name.substring(0, 40) + '...';
              }
              action_html = generate_select_deal_page_action(post_id,post_name,image_src,gizzmo_id,account_id,property_id,language,affiliate_tags)

              return gridjs.html(action_html);

            }
        },
      ],
      server: {
        url: `${baseURL}/g_get_deals_pages`,
        data: (opts) => {
          return new Promise((resolve, reject) => {
            // Let's implement our own HTTP client
            const xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
              if (this.readyState === 4) {
                if (this.status === 200) {

                  //hide the loading_Modal modal
                  closeModal('loading_Modal');

                  const resp = JSON.parse(this.response);
                  if (resp['message'] === 'No Deals Pages Found') {
                    //hide tabs_holder
                    document.getElementById('tabs_holder').style.display = 'none';
                    //hide live_deals_placeholder
                    document.getElementById('live_deals_placeholder').style.display = 'none';
                    //show deal_pages_placeholder
                    document.getElementById('deal_pages_placeholder').style.display = 'block';

                    //hide go_back_to_deals
                    document.getElementById('go_back_to_deals').style.display = 'none';
                    return;
                  }
                  else
                  {
                    document.getElementById('tabs_holder').style.display = 'block';
                  }

                  document.getElementById('promotion-div').style.display = 'none';
                  document.getElementById('property_deals').style.display = 'block';

                  const json_data = JSON.parse(resp.data);
     
                  


                  // Filter and keep only the required properties
                  const filteredData = json_data.map(deal_page => ({
                    id: deal_page.id,
                    gizzmo_id: deal_page.id,
                    wp_post_id: deal_page.wp_post_id,
                    page_title: deal_page.page_title,
                    sys_featured_image: deal_page.sys_featured_image,
                    last_update: deal_page.last_update,
                    date_created: deal_page.date_created,
                    language: deal_page.language,
                    affiliate_tags: deal_page.affiliate_tags
                  }));
    
                  // Log the json_data for debugging
                  //console.log('JSON Data:', filteredData);

                  // Create array of arrays for Grid.js
                  const gridData = filteredData.map(deal_page => [
                    deal_page.id,
                    deal_page.gizzmo_id,
                    deal_page.wp_post_id,
                    deal_page.page_title,
                    deal_page.sys_featured_image,
                    deal_page.last_update,
                    deal_page.date_created,
                    deal_page.language,
                    deal_page.affiliate_tags
                  ]);
    
    
                  // Make sure the output conforms to StorageResponse format: 
                  // https://github.com/grid-js/gridjs/blob/master/src/storage/storage.ts#L21-L24
                  resolve({
                    data: gridData,
                    total: gridData.length,
                  });
                } else {
                  reject();
                }
              }
            };
            xhttp.open("POST", opts.url, true);
            xhttp.setRequestHeader("Content-Type", "application/json");
            xhttp.send(JSON.stringify(data_json));
          });
        }
      },
      pagination: {
        limit: 10
      }
      
    }).render(document.getElementById("property_deals_pages"));
}
function get_live_deals(property_id,account_id,wp_post_id)
{
  (function ($) {

      //clear live_deals_draggable
      document.getElementById('live_deals_draggable').innerHTML = '';

      //shoe spinner_loader
      document.getElementById('action_placeholder').style.display = 'none';
      document.getElementById('live_deals_spinner_loader').style.display = 'block';
      //hide action_placeholder_msg
      document.getElementById('live_deals_action_placeholder_msg').style.display = 'none';


      const data_json = {
          "property_id": property_id,
          "account_id": account_id,
          "wp_post_id": wp_post_id
      };

      //console.log(JSON.stringify(data_json));
      //  make a request to get the live deals get_live_deals and with the response populate the live_deals_draggable
      const xhttp = new XMLHttpRequest();
      xhttp.open("POST", `${baseURL}/g_get_live_deals`, true);
      xhttp.setRequestHeader("Content-Type", "application/json");
      xhttp.onreadystatechange = function() {
          if (this.readyState == 4) {
              if (this.status == 200) {
                  const response = this.responseText;
                  const response_json = JSON.parse(response);
                  const status = response_json['status'];
                  const data = response_json['data'];
                  if (status == 'success') {

                      //HIDE THE SPINNER LOADER
                      document.getElementById('live_deals_spinner_loader').style.display = 'none';


                      document.getElementById('live_deals_placeholder').style.display = 'block';
                      //show the live_deals_draggable
                      document.getElementById('live_deals_draggable').style.display = 'block';
                      //clear the live_deals_draggable
                      document.getElementById('live_deals_draggable').innerHTML = '';
                      //populate the live_deals_draggable
                      //each one should look like this: 
                      live_deals = JSON.parse(data);
                      
                      
                      document.getElementById('publish_form_account_id').value = account_id;
                      document.getElementById('publish_form_property_id').value = property_id;
                      document.getElementById('publish_form_wp_post_id').value = wp_post_id;
                      document.getElementById('publish_form_deals_json').value = data;


                      live_deals.forEach(function(deal) {

                          //add added class to your_deal_product_B09PRHXS6L
                          var deal_asin = deal['deal_asin'];
                          $('#your_deal_product_'+deal_asin).addClass('added');
                          //remove the onclick event
                          $('#your_deal_product_'+deal_asin).removeAttr('onclick');


                          var live_deals_draggable = document.getElementById('live_deals_draggable');
                          var deal_div = document.createElement('div');
                          deal_div.id = 'deal_'+deal['id'];
                          deal_div.className = 'list__item';
                          deal_div.setAttribute('data-identifier', deal['deal_asin']);
                          deal_div.setAttribute('data-img', deal['deal_image']);
                          deal_div.setAttribute('sortable-item', 'sortable-item');
                          deal_div.style = '';
                          var deal_div_content = document.createElement('div');
                          deal_div_content.className = 'list__item-content';
                          var deal_div_description = document.createElement('div');
                          deal_div_description.className = 'list__item-description';
                          var deal_div_button = document.createElement('button');
                          deal_div_button.setAttribute('data-identifier', deal['id']);
                          deal_div_button.setAttribute('data-asin', deal['deal_asin']);
                          deal_div_button.setAttribute('data-account_id', deal['account_id']);
                          deal_div_button.setAttribute('data-property_id', deal['property_id']);
                          deal_div_button.setAttribute('data-wp_post_id', deal['wp_post_id']);
                          deal_div_button.onclick = function() { remove_live_deal(this); };
                          deal_div_button.style = 'background-color: #858487;float: left;border: none;';
                          deal_div_button.className = 'btn h-8 w-8 rounded-full p-0 font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90';
                          var deal_div_button_i = document.createElement('i');
                          deal_div_button_i.className = 'fa-regular fa-trash-alt';
                          deal_div_button.appendChild(deal_div_button_i);
                          deal_div_description.appendChild(deal_div_button);
                          var deal_div_img = document.createElement('img');
                          deal_div_img.id = 'prod_image_'+deal['deal_asin'];
                          deal_div_img.setAttribute('data-identifier', deal['deal_asin']);
                          deal_div_img.onclick = function() { show_prod_image_select_deal(this); };
                          deal_div_img.src = deal['deal_image'];
                          deal_div_img.className = 'prod_img_in_list';
                          deal_div_img.style = 'margin-left: 15px;cursor:pointer';
                          var deal_div_span = document.createElement('span');
                          deal_div_span.setAttribute('data-identifier', deal['deal_asin']);
                          deal_div_span.onclick = function() { show_prod_image_select_deal(this); };
                          deal_div_span.className = 'change_prod_image';
                          deal_div_span.innerHTML = 'CHANGE';
                          var deal_div_span_prodname = document.createElement('span');
                          deal_div_span_prodname.className = 'prodname';
                          deal_div_span_prodname.innerHTML = deal['deal_title'];
                          deal_div_description.appendChild(deal_div_img);
                          deal_div_description.appendChild(deal_div_span);
                          deal_div_description.appendChild(deal_div_span_prodname);
                          deal_div_content.appendChild(deal_div_description);
                          deal_div.appendChild(deal_div_content);
                          var deal_div_handle = document.createElement('div');
                          deal_div_handle.className = 'list__item-handle';
                          deal_div_handle.setAttribute('sortable-handle', 'sortable-handle');
                          deal_div.appendChild(deal_div_handle);
                          live_deals_draggable.appendChild(deal_div);
                      });
                  }
                  else  
                  {   
                      document.getElementById('live_deals_placeholder').style.display = 'block';
                      document.getElementById('live_deals_spinner_loader').style.display = 'none';
                      document.getElementById('live_deals_action_placeholder_msg').style.display = 'block';
                      //show the live_deals_draggable
                      document.getElementById('live_deals_draggable').style.display = 'none';
                      

                  }
              }
          }
      };
      xhttp.send(JSON.stringify(data_json));
    }
  )(jQuery);
}




function get_spaciphic_artifact(artifact_product_id)
{

  (function ($) {

      return new Promise((resolve, reject) => {
          const data_json = {
              "artifact_id": artifact_product_id
          };
          //console.log(JSON.stringify(data_json));
          const xhttp = new XMLHttpRequest();
          xhttp.open("POST", `${baseURL}/g_get_artifact`, true);
          xhttp.setRequestHeader("Content-Type", "application/json");
          xhttp.onreadystatechange = function() {
              if (this.readyState == 4) {
                  if (this.status == 200) {
                      const response = this.responseText;
                      const response_json = JSON.parse(response);
                      const status = response_json['status'];
                      const data = response_json['data'];
                      
                      selected_product_name = data['attributes']['name'];
                      if (selected_product_name.length > 45) {
                          selected_product_name = selected_product_name.substring(0, 40) + '...';
                      }
                      document.getElementById('preview_product_review_name').innerHTML = selected_product_name;
                      document.getElementById('preview_product_review_img').src = data['attributes']['product_image'];

                      //initate a lick on first_step
                      document.getElementById('first_step').click();
                      

                      //hide the action_placeholder
                      document.getElementById('action_placeholder').style.display = 'none';
                      //hide the spinner_loader
                      document.getElementById('spinner_loader').style.display = 'none';
                      //show the action_placeholder_msg
                      document.getElementById('action_placeholder_msg').style.display = 'block';
                      
                      localStorage.setItem('artifact_data', JSON.stringify(data));

                      //g_gizzmo_addons.js FUNCTIONS
                      media_images_addon(data)



                      //clear the thematic_concept_list
                      document.getElementById('thematic_concept_list').innerHTML = '';
                      //get the thematic_concepts list from data
                      thematic_concepts = data['thematic_concepts'];
                      thematic_concepts.unshift({'theme_name':'General Theme','description':'Exploring Key Features and Benefits of the Product.'});


                      //<li class="gizzmo_list-item">
                      //    <input class="theme_radio" type="radio" id="theme_1" name="theme" value="1" checked />
                          //    <label for="theme_1" class="gizzmo_list-title">General Theme</label>
                          //    <div class="gizzmo_list-description">Exploring Key Features and Benefits of the Product.</div>
                          //</li>
                      //fill thematic_concept_list with the thematic_concepts
                      //<li class="gizzmo_list-item">
                      //    <input class="theme_radio" type="radio" id="theme_2" name="theme" value="2" />
                      //    <label for="theme_2" class="gizzmo_list-title">Educational Content and Features</label>
                      //    <div class="gizzmo_list-description">Exploring the educational benefits and interactive features of smart speakers designed specifically for children.</div>
                      //</li>

                      //var gizzmo_data = JSON.parse(localStorage.getItem('gizzmo_data'));
                      var gizzmo_data = JSON.parse(sessionStorage.getItem('gizzmo_data'));


                      var thematic_concept_active = gizzmo_data['account_data']['thematic_concept'];
                      
                      theme_count = 0;
                      thematic_concepts.forEach(function(thematic_concept) {
                          var thematic_concept_list = document.getElementById('thematic_concept_list');
                          var thematic_concept_li = document.createElement('li');
                          thematic_concept_li.className = 'gizzmo_list-item';
                          var thematic_concept_input = document.createElement('input');
                          thematic_concept_input.className = 'theme_radio';
                          thematic_concept_input.type = 'radio';
                          thematic_concept_input.id = 'theme_'+ theme_count.toString();
                          thematic_concept_input.name = 'theme';

                          //add data-theme attribute to the thematic_concept_input
                          thematic_concept_input.setAttribute('data-theme', thematic_concept['theme_name']);
                          thematic_concept_input.setAttribute('data-description', thematic_concept['description']);

                          thematic_concept_input.value = thematic_concept['id'];
                          if (theme_count == 0) {
                              thematic_concept_input.checked = true;
                          }
                          else
                          {
                            if (thematic_concept_active == 'Unavailable' && gb24 == 'false') {
                              //make the input disabled
                              thematic_concept_input.disabled = true;
                            }
                          }
                          thematic_concept_li.appendChild(thematic_concept_input);
                          var thematic_concept_label = document.createElement('label');
                          thematic_concept_label.className = 'gizzmo_list-title';
                          thematic_concept_label.htmlFor = 'theme_'+ theme_count.toString();
                          thematic_concept_label.innerHTML = thematic_concept['theme_name'];
                          thematic_concept_li.appendChild(thematic_concept_label);
                          var thematic_concept_description = document.createElement('div');
                          thematic_concept_description.className = 'gizzmo_list-description';
                          thematic_concept_description.innerHTML = thematic_concept['description'];
                          thematic_concept_li.appendChild(thematic_concept_description);
                          thematic_concept_list.appendChild(thematic_concept_li);
                          theme_count = theme_count + 1;
                      });

                      //reset the click event listener for the .theme_radio
                      //$('.theme_radio').click(function(){
                      //    //check if the name attribute of the clicked radio button is theme
                      //    if ($(this).attr('name') == 'theme') {
                      //      var theme_name = $(this)[0].attributes[4].nodeValue;
                      //      var theme_description = $(this)[0].attributes[5].nodeValue;
                      //      console.log(theme_name);
                      //      console.log(theme_description);
                      //    }
                      //});








                      //show the steps_wrapper
                      document.getElementById('steps_wrapper').style.display = 'block';

                      //reset the image-row 
                      document.getElementById('image-row').innerHTML = '';

                      //add the images divs to the div with class image-row
                      var image_row = document.getElementById('image-row');
                      var styles_string = "Cinematic,Comic Book,Cyberpunk,Photograph,illustration";
                      var styles_array = styles_string.split(',');

                      for (var i = 0; i < 5; i++) {
                          var image_container = document.createElement('div');
                          image_container.className = 'image-container';
                          var image_div = document.createElement('div');
                          image_div.id = 'ai_image_'+(i+1);
                          //add data-style attribute to the image_div
                          image_div.setAttribute('data-style', styles_array[i]);
                          image_div.className = 'generate-placeholder';
                          image_div.innerHTML = 'AI Generate';
                          image_container.appendChild(image_div);
                          image_row.appendChild(image_container);
                      }

                     

                      //reset the click event listener for the .generate-placeholder
                      $('.generate-placeholder').click(function(){
                          var image_id = $(this).attr('id');
                          var style = $(this)[0].attributes[1].nodeValue;
                          generate_ai_image(image_id,style);
                      });


                      
                      

                      







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

    }(jQuery));
  
}


function select_product(this_element)
{
  var product_id = this_element.getAttribute('data-id');

  //hide the action_placeholder_msg
  document.getElementById('action_placeholder_msg').style.display = 'none';
  //show the spinner_loader
  document.getElementById('spinner_loader').style.display = 'block';

  //fill main_review_asin
  document.getElementById('main_review_asin').value = product_id;

  //console.log(product_id);
  get_spaciphic_artifact(product_id);
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


}
function remove_roundup_prod(this_element)
{
  (function ($) {
    var product_id = this_element.getAttribute('data-identifier');
    //remove the product from the roundup_products_draggable
    $('#roundup_'+product_id).remove();
    
    $('#roundup_product_'+product_id).removeClass('added');
    $('#your_roundup_product_'+product_id).removeClass('added');

    var number_of_products = 0;
    $('#roundup_products_draggable .list__item').each(function(){
      number_of_products = number_of_products + 1;
    });

    if (number_of_products <= 2)
    {
      document.getElementById("products_next").disabled = true;
      //remove the background color of the next button to none
      document.getElementById("products_next").style.backgroundColor = '#f0f0f1';
    }

    //check if the number of products is 0
    if (number_of_products == 0)
    {
      document.getElementById('action_placeholder').style.display = 'block';
      document.getElementById('steps_wrapper').style.display = 'none';
      document.getElementById('roundup_products_draggable').style.display = 'none';
    } 

    var image_count = 0;
    $('#roundup_products_draggable .list__item').each(function(){
        identifier = $(this).data('identifier');
        productimage = $(this).data('img');

        //set selected_featured_image to the first product image
        if (image_count == 0)
        {
          document.getElementById('selected_featured_image').src = productimage;
        }
        image_count = image_count + 1;
        
        //add this product image to the featured image selection modal
        var image_container = document.createElement('div');
        image_container.className = 'image-container';
        var image_div = document.createElement('img');
        image_div.onclick = function() {set_featured_image(this)};
        image_div.className = 'artifact_option_image';
        image_div.src = productimage;
        image_div.alt = 'Click to Select';
        //add and attribute data-source_idenetifier
        image_div.setAttribute('data-source_idenetifier', identifier);
        image_container.appendChild(image_div);
        featured_images_placeholder.appendChild(image_container);
    });


  }(jQuery));

}
function remove_compare_prod(this_element)
{
  (function ($) {
    var product_id = this_element.getAttribute('data-identifier');
    //remove the product from the compare_products_draggable
    $('#compare_'+product_id).remove();
    
    $('#compare_product_'+product_id).removeClass('added');
    $('#your_compare_product_'+product_id).removeClass('added');

    var number_of_products = 0;
    $('#compare_products_draggable .list__item').each(function(){
      number_of_products = number_of_products + 1;
    });

    if (number_of_products <= 2)
    {
      document.getElementById("products_next").disabled = true;
      //remove the background color of the next button to none
      document.getElementById("products_next").style.backgroundColor = '#f0f0f1';
    }

    //check if the number of products is 0
    if (number_of_products == 0)
    {
      document.getElementById('action_placeholder').style.display = 'block';
      document.getElementById('steps_wrapper').style.display = 'none';
      document.getElementById('compare_products_draggable').style.display = 'none';
    } 

    var image_count = 0;
    $('#compare_products_draggable .list__item').each(function(){
        identifier = $(this).data('identifier');
        productimage = $(this).data('img');

        //set selected_featured_image to the first product image
        if (image_count == 0)
        {
          document.getElementById('selected_featured_image').src = productimage;
        }
        image_count = image_count + 1;
        
        //add this product image to the featured image selection modal
        var image_container = document.createElement('div');
        image_container.className = 'image-container';
        var image_div = document.createElement('img');
        image_div.onclick = function() {set_featured_image(this)};
        image_div.className = 'artifact_option_image';
        image_div.src = productimage;
        image_div.alt = 'Click to Select';
        //add and attribute data-source_idenetifier
        image_div.setAttribute('data-source_idenetifier', identifier);
        image_container.appendChild(image_div);
        featured_images_placeholder.appendChild(image_container);
    });


  }(jQuery));

}

function get_product_images_from_gizzmo(artifact_id)
{

   var pageName = getPageParameterValue('page');

  return new Promise((resolve, reject) => {
    const data_json = {
        "artifact_id": artifact_id
    };
    //console.log(JSON.stringify(data_json));
    const xhttp = new XMLHttpRequest();
    xhttp.open("POST", `${baseURL}/g_get_artifact_images`, true);
    xhttp.setRequestHeader("Content-Type", "application/json");
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
            if (this.status == 200) {
                const response = this.responseText;
                const response_json = JSON.parse(response);
                const status = response_json['status'];
                if (status == 'success') {
                    const data = response_json['data'];
                    //show images_placeholder
                    document.getElementById('images_placeholder').style.display = 'flex';

                    //hide images_placeholder_spinner_loader
                    //check if the images_placeholder_spinner_loader exists
                    if (document.getElementById('images_placeholder_spinner_loader') == null)
                    {
                      //do nothing
                    }
                    else
                    {
                      document.getElementById('images_placeholder_spinner_loader').style.display = 'none';
                    }


                    //loop through the images and add them to the image-row
                    var images_placeholder = document.getElementById('images_placeholder');
                    images_placeholder.innerHTML = '';

                    //<div class="image-container">
                    //  <img onclick="set_product_image(this)" id="product_option_image_1" class="option_image selected" src="'images/300x200_image.svg';" alt="Image 1">
                    //</div>

                    data.forEach(function(image) {
                      var image_container = document.createElement('div');
                      image_container.className = 'image-container';
                      image_container.style.position = 'relative'; // Ensure relative positioning for icon overlay
                      
                      var image_div = document.createElement('img');
                      if (pageName == 'gizzmo-ai-products-comparison') {
                        image_div.onclick = function() { set_featured_image(this) };
                      }
                      else
                      {
                        image_div.onclick = function() { set_product_image(this) };
                      }
                      
                      
                      image_div.className = 'artifact_option_image';
                      image_div.src = image;
                      image_div.alt = 'Click to Select.';
                      
                      // Add an attribute data-source_identifier
                      image_div.setAttribute('data-source_idenetifier', artifact_id);
                      
                      // Create the magnifying glass icon
                      var magnifying_glass = document.createElement('div');
                      magnifying_glass.className = 'magnify-icon';
                      magnifying_glass.innerHTML = '&#128269;'; // Magnifying glass symbol (Unicode)
                      magnifying_glass.style.position = 'absolute';
                      magnifying_glass.style.top = '0px';
                      magnifying_glass.style.left = '0px';
                      magnifying_glass.style.cursor = 'pointer';
                      magnifying_glass.style.fontSize = '24px'; // Adjust the icon size if necessary
                      magnifying_glass.style.color = '#fff'; // Color for the icon, change as needed
                      magnifying_glass.style.padding = '5px';
                      
                      // Click event for the magnifying glass icon
                      magnifying_glass.onclick = function() {
                          const src = image_div.getAttribute('src');
                          document.getElementById('zoom_image').setAttribute('src', src);
                          showModal('zoomPopModel');
                      };
                      
                      // Append the image and the icon to the container
                      image_container.appendChild(image_div);
                      image_container.appendChild(magnifying_glass);
                      
                      // Append the container to the placeholder
                      images_placeholder.appendChild(image_container);
                  });
                  
                    

                       
 

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
function show_prod_image_select(this_element)
{
  (function ($) {
    var product_id = this_element.getAttribute('data-identifier');
    //var product_image = this_element.getAttribute('data-img');
    //document.getElementById('prod_image_select').src = product_image;

    //clear the images_placeholder and add the images from the gizzmo
    var images_placeholder = document.getElementById('images_placeholder');
    images_placeholder.innerHTML = '';

    //hide images_placeholder
    document.getElementById('images_placeholder').style.display = 'none';

    //show images_placeholder_spinner_loader
    document.getElementById('images_placeholder_spinner_loader').style.display = 'block';

    showModal('selectimageionModal');

    get_product_images_from_gizzmo(product_id);


     
  

  }(jQuery));
}

function get_product_images_from_gizzmo_deals(artifact_id)
{
  return new Promise((resolve, reject) => {
    const data_json = {
        "artifact_id": artifact_id
    };
    //console.log(JSON.stringify(data_json));
    const xhttp = new XMLHttpRequest();
    xhttp.open("POST", `${baseURL}/g_get_artifact_images`, true);
    xhttp.setRequestHeader("Content-Type", "application/json");
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
            if (this.status == 200) {
                const response = this.responseText;
                const response_json = JSON.parse(response);
                const status = response_json['status'];
                if (status == 'success') {
                    const data = response_json['data'];

                    //loop through the images and add them to the image-row
                    var images_placeholder = document.getElementById('images_deals_placeholder');
                    images_placeholder.innerHTML = '';

                    //<div class="image-container">
                    //  <img onclick="set_product_image(this)" id="product_option_image_1" class="option_image selected" src="'images/300x200_image.svg';" alt="Image 1">
                    //</div>

                    data.forEach(function(image) {
                        var image_container = document.createElement('div');
                        image_container.className = 'image-container';
                        var image_div = document.createElement('img');
                        image_div.onclick = function() {set_deal_image(this)};
                        image_div.className = 'artifact_option_image';
                        image_div.src = image;
                        image_div.alt = 'Click to Select';
                        //add and attribute data-source_idenetifier
                        image_div.setAttribute('data-source_idenetifier', artifact_id);
                        image_container.appendChild(image_div);

                        // Create the magnifying glass icon
                        var magnifying_glass = document.createElement('div');
                        magnifying_glass.className = 'magnify-icon';
                        magnifying_glass.innerHTML = '&#128269;'; // Magnifying glass symbol (Unicode)
                        magnifying_glass.style.position = 'absolute';
                        magnifying_glass.style.top = '0px';
                        magnifying_glass.style.left = '0px';
                        magnifying_glass.style.cursor = 'pointer';
                        magnifying_glass.style.fontSize = '24px'; // Adjust the icon size if necessary
                        magnifying_glass.style.color = '#fff'; // Color for the icon, change as needed
                        magnifying_glass.style.padding = '5px';
                        
                        // Click event for the magnifying glass icon
                        magnifying_glass.onclick = function() {
                            const src = image_div.getAttribute('src');
                            document.getElementById('zoom_image').setAttribute('src', src);
                            showModal('zoomPopModel');
                        };
                        
                        // Append the image and the icon to the container
                        image_container.appendChild(magnifying_glass);

                        images_placeholder.appendChild(image_container);
                    });
                    
                    






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

function show_prod_image_select_deal(this_element)
{
  (function ($) {
    var product_id = this_element.getAttribute('data-identifier');
    //var product_image = this_element.getAttribute('data-img');
    //document.getElementById('prod_image_select').src = product_image;
    showModal('selectimageionModal_deals');

    get_product_images_from_gizzmo_deals(product_id);

  }(jQuery));
}


function show_prod_image_select_comparison()
{
  (function ($) {

    //check if the popup has already been filled with images
    //count the number of images in the images_placeholder 
    var image_count = 0;
    $('#images_placeholder .image-container').each(function(){
      image_count = image_count + 1;
    });


    if (image_count > 3)
    {
      showModal('selectimageionModal');
      return;
    }
    var product_ids = ""
    $('#compare_products_draggable .list__item').each(function(){
      if ($(this).data('identifier') != undefined)
      {
        if (product_ids == "") {
          product_ids = $(this).data('identifier') + ",";
        }
        else
        {
          product_ids = product_ids + $(this).data('identifier') ;
        }
      }
    });
    //console.log(product_ids);
    showModal('selectimageionModal');

    get_product_images_from_gizzmo(product_ids);

  }(jQuery));
}

function set_deal_product_image(this_element)
{
  (function ($) {
    var product_image = this_element.src;
    //set main_deal_img to the product_image
    document.getElementById('main_deal_img').src = product_image;

    //make the clicked image the selected image
    $('#images_placeholder .image-container').each(function(){
      $(this).removeClass('selected');
    }
    );
    $(this_element).parent().addClass('selected');

  }(jQuery));
}


function set_product_image(this_element)
{
  (function ($) {
    var product_image = this_element.src;
    //get the data-source_idenetifier
    var source_idenetifier = this_element.getAttribute('data-source_idenetifier');
    //check if this was initiated from the comparison page
    if (product_image.includes(',')) {
      document.getElementById('selected_featured_image').src = product_image;
      //close the selectimageionModal
      closeModal('selectimageionModal')
      return;
    }



    //set the product_image to the image with id prod_image_identifier
    document.getElementById('prod_image_'+source_idenetifier).src = product_image;
    
    //close the selectimageionModal
    closeModal('selectimageionModal')


    //clear the featured_images_placeholder
    //update the new image in th featured_images_placeholder
   
    $('#featured_images_placeholder').html('');
    $('#roundup_products_draggable .list__item').each(function(){

      debugger;


        identifier = $(this).data('identifier');
        productimage = $(this).data('img');
        var image_container = document.createElement('div');
        image_container.className = 'image-container';
        var image_div = document.createElement('img');
        image_div.onclick = function() {set_featured_image(this)};
        image_div.className = 'artifact_option_image';
        if (identifier == source_idenetifier) {
          image_div.src = product_image;
        }
        else
        {
          image_div.src = productimage;
        }
        image_div.alt = 'Click to Select';
        //add and attribute data-source_idenetifier
        image_div.setAttribute('data-source_idenetifier', identifier);
        


        // Create the magnifying glass icon
        var magnifying_glass = document.createElement('div');
        magnifying_glass.className = 'magnify-icon';
        magnifying_glass.innerHTML = '&#128269;'; // Magnifying glass symbol (Unicode)
        magnifying_glass.style.position = 'absolute';
        magnifying_glass.style.top = '0px';
        magnifying_glass.style.left = '0px';
        magnifying_glass.style.cursor = 'pointer';
        magnifying_glass.style.fontSize = '24px'; // Adjust the icon size if necessary
        magnifying_glass.style.color = '#fff'; // Color for the icon, change as needed
        magnifying_glass.style.padding = '5px';
        
        // Click event for the magnifying glass icon
        magnifying_glass.onclick = function() {
            const src = image_div.getAttribute('src');
            document.getElementById('zoom_image').setAttribute('src', src);
            showModal('zoomPopModel');
        };
        
        // Append the image and the icon to the container
        image_container.appendChild(image_div);
        image_container.appendChild(magnifying_glass);


        featured_images_placeholder.appendChild(image_container);
    });




  }(jQuery));
}

function set_deal_image(this_element)
{
  (function ($) {
    var product_image = this_element.src;
    //get the data-source_idenetifier
    var source_idenetifier = this_element.getAttribute('data-source_idenetifier');
    //check if this was initiated from the comparison page
    if (source_idenetifier.includes(',')) {
      document.getElementById('selected_featured_image').src = product_image;
      //close the selectimageionModal
      closeModal('selectimageionModal')
      return;
    }



    //set the product_image to the image with id prod_image_identifier
    document.getElementById('prod_image_'+source_idenetifier).src = product_image;
    
    

    //clear the featured_images_placeholder
    //update the new image in th featured_images_placeholder
    $('#featured_images_placeholder').html('');
    $('#roundup_products_draggable .list__item').each(function(){
        identifier = $(this).data('identifier');
        productimage = $(this).data('img');
        var image_container = document.createElement('div');
        image_container.className = 'image-container';
        var image_div = document.createElement('img');
        image_div.onclick = function() {set_featured_image(this)};
        image_div.className = 'artifact_option_image';
        if (identifier == source_idenetifier) {
          image_div.src = product_image;
        }
        else
        {
          image_div.src = productimage;
        }
        image_div.alt = 'Click to Select';
        //add and attribute data-source_idenetifier
        image_div.setAttribute('data-source_idenetifier', identifier);
        image_container.appendChild(image_div);
        featured_images_placeholder.appendChild(image_container);
    });

    var existing_list_json = document.getElementById('publish_form_deals_json').value;
    var existing_list = JSON.parse(existing_list_json);

     
    //get the list of deals inside live_deals_draggable
    debugger;
    var deals_list = [];
    $('#live_deals_draggable .list__item').each(function(){
      var deal_asin = $(this).data('identifier');
      
      var img_id = "prod_image_"+deal_asin;
      var deal_image = document.getElementById(img_id).src;
      var deal = existing_list.find(x => x.deal_asin === deal_asin);
      deal['deal_image'] = deal_image;

      var deal = existing_list.find(x => x.deal_asin === deal_asin);
      deals_list.push(deal);
    });

    var deals_postions_images = [];
    $('#live_deals_draggable .list__item').each(function(){
      var deal_asin_id = $(this).data('identifier');
      var deal_asin_new_position = $(this).index();
      var deal_asin_img = $('#prod_image_' + deal_asin_id).attr('src');
      deals_postions_images.push({"deal_asin": deal_asin_id, "deal_asin_position": deal_asin_new_position, "deal_asin_img": deal_asin_img});
    }
    );
    //update the hidden input with the new position and image changes
    document.getElementById('live_deals_position_changes').value = JSON.stringify(deals_postions_images);



    //update the hidden input with the new list of deals
    document.getElementById('publish_form_deals_json').value = JSON.stringify(deals_list);

    closeModal('selectimageionModal_deals')

    document.getElementById('save_live_deals_changes').style.display = 'block';

  }(jQuery));
}




function set_featured_image(this_element)
{
  (function ($) {
    var product_image = this_element.src;
    //get the data-source_idenetifier
    var source_idenetifier = this_element.getAttribute('data-source_idenetifier');
    //set the product_image to the image with id prod_image_identifier
    document.getElementById('selected_featured_image').src = product_image;

    //close the selectimageionModal
    closeModal('selectfeaturedimageionModal')
    closeModal('selectimageionModal')
    

  }(jQuery));
}

  
function add_to_roundup_tab(clicked_obj)
{
    (function ($) {

      document.getElementById('action_placeholder').style.display = 'none';
      document.getElementById('steps_wrapper').style.display = 'block';
      document.getElementById('roundup_products_draggable').style.display = 'block';


      var identifier = $(clicked_obj).data('identifier');
      var productname = $(clicked_obj).data('productname');
      var productimage = $(clicked_obj).data('img');

      var product_in_roundup = false;
      var number_of_products = 0;
      $('#roundup_products_draggable .list__item').each(function(){
        if ($(this).data('identifier') != undefined)
        {
          if ($(this).data('identifier') == identifier){product_in_roundup = true;}
        }
        number_of_products = number_of_products + 1;
      });
      

      if (number_of_products >= 2)
      {
          if (number_of_products >= 2)
          {
            document.getElementById("products_next").style.backgroundColor = '#5a10b9';
            document.getElementById("products_next").disabled = false;
          }
          else if (number_of_products == 50)
          {
            alert('Maximum number of products reached');
            return;
          }
      }



       
      if (product_in_roundup == false)
      {
        show_func = 'onclick="showModal("selectimageionModal")"';

        one_prod = '<div  id="roundup_' + identifier + '" data-identifier="' + identifier + '" data-img="' + productimage + '" class="list__item" sortable-item="sortable-item">'
        one_prod += '<div class="list__item-content">'
        one_prod += '<div class="list__item-description">'
        one_prod += '<button data-identifier="' + identifier + '" onclick="remove_roundup_prod(this)" style="background-color: #858487;float: left;border: none;" class="btn h-8 w-8 rounded-full p-0 font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90"><i class="fa-regular fa-trash-alt"></i></button>'
        one_prod += '<img id="prod_image_' + identifier + '" data-identifier="' + identifier + '" onclick="show_prod_image_select(this)"  src="' + productimage + '" class="prod_img_in_list" style="margin-left: 15px;cursor:pointer" /><span data-identifier="' + identifier + '" onclick="show_prod_image_select(this)" class="change_prod_image">CHANGE</span><span class="prodname">' + productname + '</span>'
        one_prod += '</div>'
        one_prod += '</div>'
        one_prod += '<div class="list__item-handle" sortable-handle="sortable-handle"></div>'
        one_prod += '</div>'
        
        $('#roundup_products_draggable').append(one_prod);

        //add a class "added" to the div with id "roundup_product_identifier"
        $('#roundup_product_'+identifier).addClass('added');
        $('#your_roundup_product_'+identifier).addClass('added');



        //clear the featured_images_placeholder
        $('#featured_images_placeholder').html('');

        var image_count = 0;
        $('#roundup_products_draggable .list__item').each(function(){
            identifier = $(this).data('identifier');
            productimage = $(this).data('img');

            //set selected_featured_image to the first product image
            if (image_count == 0)
            {
              document.getElementById('selected_featured_image').src = productimage;
            }
            image_count = image_count + 1;
            
            //add this product image to the featured image selection modal
            var image_container = document.createElement('div');
            image_container.className = 'image-container';
            var image_div = document.createElement('img');
            image_div.onclick = function() {set_featured_image(this)};
            image_div.className = 'artifact_option_image';
            image_div.src = productimage;
            image_div.alt = 'Click to Select';
            //add and attribute data-source_idenetifier
            image_div.setAttribute('data-source_idenetifier', identifier);

            // Create the magnifying glass icon
            var magnifying_glass = document.createElement('div');
            magnifying_glass.className = 'magnify-icon';
            magnifying_glass.innerHTML = '&#128269;'; // Magnifying glass symbol (Unicode)
            magnifying_glass.style.position = 'absolute';
            magnifying_glass.style.top = '0px';
            magnifying_glass.style.left = '0px';
            magnifying_glass.style.cursor = 'pointer';
            magnifying_glass.style.fontSize = '24px'; // Adjust the icon size if necessary
            magnifying_glass.style.color = '#fff'; // Color for the icon, change as needed
            magnifying_glass.style.padding = '5px';
            
            // Click event for the magnifying glass icon
            magnifying_glass.onclick = function() {
                const src = image_div.getAttribute('src');
                document.getElementById('zoom_image').setAttribute('src', src);
                showModal('zoomPopModel');
            };
            
            // Append the image and the icon to the container
            image_container.appendChild(image_div);
            image_container.appendChild(magnifying_glass);

            featured_images_placeholder.appendChild(image_container);
        });

        

        






      }
      else
      {
        alert('Product already in the roundup');
      }

      

       







    }(jQuery));
      
}

function add_to_comparison_tab(clicked_obj)
{
    (function ($) {

      document.getElementById('action_placeholder').style.display = 'none';
      document.getElementById('steps_wrapper').style.display = 'block';
      document.getElementById('compare_products_draggable').style.display = 'block';


      var identifier = $(clicked_obj).data('identifier');
      var productname = $(clicked_obj).data('productname');
      var productimage = $(clicked_obj).data('img');
      var json_file_path = $(clicked_obj).data('json_file_path');

      var product_in_compare = false;
      var number_of_products = 0;
      $('#compare_products_draggable .list__item').each(function(){
        if ($(this).data('identifier') != undefined)
        {
          if ($(this).data('identifier') == identifier){product_in_compare = true;}
        }
        number_of_products = number_of_products + 1;
      });
      
      if (number_of_products >= 2)
      {
          alert('You can compare only two products');
          return;
      }
      else if (number_of_products >= 1)
      {
          if (number_of_products >= 1)
          {
            document.getElementById("products_next").style.backgroundColor = '#5a10b9';
            document.getElementById("products_next").disabled = false;
          }
          else if (number_of_products >= 2)
          {
            alert('You can compare only two products');
            return;
          }
      }



       
      if (product_in_compare == false)
      {
        //show_func = 'onclick="showModal("selectimageionModal")"';

        one_prod = '<div data-json_file_path="' + json_file_path + '"  id="compare_' + identifier + '" data-identifier="' + identifier + '" data-img="' + productimage + '" class="list__item" sortable-item="sortable-item">'
        one_prod += '<div class="list__item-content">'
        one_prod += '<div class="list__item-description">'
        one_prod += '<button data-identifier="' + identifier + '" onclick="remove_compare_prod(this)" style="background-color: #858487;float: left;border: none;" class="btn h-8 w-8 rounded-full p-0 font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90"><i class="fa-regular fa-trash-alt"></i></button>'
        //one_prod += '<img id="prod_image_' + identifier + '" data-identifier="' + identifier + '" onclick="show_prod_image_select(this)"  src="' + productimage + '" class="prod_img_in_list" style="margin-left: 15px;cursor:pointer" /><span data-identifier="' + identifier + '" onclick="show_prod_image_select(this)" class="change_prod_image">CHANGE</span><span class="prodname">' + productname + '</span>'
        one_prod += '<img id="prod_image_' + identifier + '" data-identifier="' + identifier + '"    src="' + productimage + '" class="prod_img_in_list" style="margin-left: 15px;" /><span class="prodname">' + productname + '</span>'
        one_prod += '</div>'
        one_prod += '</div>'
        one_prod += '<div class="list__item-handle" sortable-handle="sortable-handle"></div>'
        one_prod += '</div>'
        
        $('#compare_products_draggable').append(one_prod);

        //add a class "added" to the div with id "compare_product_identifier"
        $('#compare_product_'+identifier).addClass('added');
        $('#your_compare_product_'+identifier).addClass('added');



        //clear the featured_images_placeholder
        $('#featured_images_placeholder').html('');

        var image_count = 0;
        $('#compare_products_draggable .list__item').each(function(){
            identifier = $(this).data('identifier');
            productimage = $(this).data('img');

            //set selected_featured_image to the first product image
            if (image_count == 0)
            {
              document.getElementById('selected_featured_image').src = productimage;
            }
            image_count = image_count + 1;
            
            //add this product image to the featured image selection modal
            var image_container = document.createElement('div');
            image_container.className = 'image-container';
            var image_div = document.createElement('img');
            image_div.onclick = function() {set_featured_image(this)};
            image_div.className = 'artifact_option_image';
            image_div.src = productimage;
            image_div.alt = 'Click to Select';
            //add and attribute data-source_idenetifier
            image_div.setAttribute('data-source_idenetifier', identifier);
            image_container.appendChild(image_div);

            // Create the magnifying glass icon
            var magnifying_glass = document.createElement('div');
            magnifying_glass.className = 'magnify-icon';
            magnifying_glass.innerHTML = '&#128269;'; // Magnifying glass symbol (Unicode)
            magnifying_glass.style.position = 'absolute';
            magnifying_glass.style.top = '0px';
            magnifying_glass.style.left = '0px';
            magnifying_glass.style.cursor = 'pointer';
            magnifying_glass.style.fontSize = '24px'; // Adjust the icon size if necessary
            magnifying_glass.style.color = '#fff'; // Color for the icon, change as needed
            magnifying_glass.style.padding = '5px';
            
            // Click event for the magnifying glass icon
            magnifying_glass.onclick = function() {
                const src = image_div.getAttribute('src');
                document.getElementById('zoom_image').setAttribute('src', src);
                showModal('zoomPopModel');
            };
            
            // Append the image and the icon to the container
            image_container.appendChild(magnifying_glass);

            featured_images_placeholder.appendChild(image_container);
        });

        

        






      }
      else
      {
        alert('Product already in the roundup');
      }

      

       







    }(jQuery));
      
}

function add_to_deal_tab(clicked_obj)
{
  
  //show the action_placeholder
  document.getElementById('action_placeholder').style.display = 'block';
  //spinner_loader
  document.getElementById('deals_spinner_loader').style.display = 'block';
  document.getElementById('deal_fields_wrapper').style.display = 'none';
  
  //get the data-identifier of the clicked object
  var identifier = clicked_obj.getAttribute('data-identifier');
  var price = clicked_obj.getAttribute('data-price');
  var list_price = clicked_obj.getAttribute('data-list_price');
  var savingspercentage = clicked_obj.getAttribute('data-savingspercentage');
  var source = clicked_obj.getAttribute('data-source');

  document.getElementById('form_deal_source').value = source;
  document.getElementById('form_percent_off').value = savingspercentage;
  document.getElementById('deal_asin').value = identifier;
  
  
  //remove the - sign from the savingspercentage
  savingspercentage = savingspercentage.replace('-', '');

  var avg_price = clicked_obj.getAttribute('data-avg_price');

  
  return new Promise((resolve, reject) => {
    const data_json = {
        "artifact_id": identifier
    };
    //console.log(JSON.stringify(data_json));
    const xhttp = new XMLHttpRequest();
    xhttp.open("POST", `${baseURL}/g_get_deal_data`, true);
    xhttp.setRequestHeader("Content-Type", "application/json");
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
            if (this.status == 200) {
                const response = this.responseText;
                const response_json = JSON.parse(response);
                const status = response_json['status'];
                if (status == 'success') {
                    const data = response_json['data'];

                    //hide spinner_loader
                    document.getElementById('deals_spinner_loader').style.display = 'none';
                    //show deal_fields_wrapper
                    document.getElementById('deal_fields_wrapper').style.display = 'block';
 
                    //console.log(data);
                    
                    //fill the deal_fields_wrapper with the data
                    if (list_price.includes('$')) {
                      list_price = list_price.split('$')[1];
                    }
                      
                    if (avg_price.includes('$')) {
                      avg_price = avg_price.split('$')[1];
                    }
                    //check if avg_price is NaN
                    if ( avg_price == "NaN") {
                      var float_list_price = parseFloat(list_price);
                      var float_price = parseFloat(price);
                      avg_price = (float_price + float_list_price) / 2;
                      avg_price = avg_price.toFixed(2);
                    }

                    if (price.includes('%')) {
                      price = price.split('%')[0];
                    }


                    var deal_title = data['deal']['title'];
                    //var deal_title_with_percent_off = savingspercentage + ' off ' + deal_title; 

                    if (savingspercentage == "" || savingspercentage == null) {
                      //calculate the savings percentage
                      var float_list_price = parseFloat(list_price);
                      var float_price = parseFloat(price);
                      var savings = float_list_price - float_price;
                      savingspercentage = (savings / float_list_price) * 100;
                      savingspercentage = Math.round(savingspercentage);
                      savingspercentage = savingspercentage + '% off';
                    }
                    else
                    {
                      savingspercentage = savingspercentage + ' off';
                    }

                    var deal_description = data['deal']['description'];


                    document.getElementById('deal_title').value = deal_title;
                    document.getElementById('list_price').value = list_price;
                    document.getElementById('avg_price').value = avg_price;
                    document.getElementById('discount_price').value = savingspercentage;
                    document.getElementById('deal_description').value = deal_description;
                    document.getElementById('deal_price').value = price;
                    
                    //clear checkbox discount_badge
                    document.getElementById('discount_badge').checked = false;
                    document.getElementById('limited_time_deal_badge').checked = false;
                    document.getElementById('best_deal_badge').checked = false;
                    document.getElementById('wow_deal_badge').checked = false;


                    //for each image inside data['high_res_images'] create 
                    //<div class="image-container">
                    //<img id="option_image_1" onclick="set_deal_product_image(this)" class="option_image selected" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/300x200_image.svg'; ?>" alt="Image 1">
                    //</div>

                    var images_placeholder = document.getElementById('deals_images_row');
                    //clear the images_placeholder
                    images_placeholder.innerHTML = '';

                    product_images = data['high_res_images'];
                    product_images.forEach(function(image) {
                      //set the first image as the main_deal_img image source and add the selected class
                        if (image == product_images[0]) {
                          document.getElementById('main_deal_img').src = image;
                        }
                        
                        var image_container = document.createElement('div');
                        image_container.className = 'image-container';
                        if (image == product_images[0]) {
                          image_container.className = 'image-container selected';
                        }
                        var image_div = document.createElement('img');
                        image_div.onclick = function() {set_deal_product_image(this)};
                        image_div.className = 'artifact_option_image';
                        image_div.src = image;
                        image_div.alt = 'Click to Select';
                        image_container.appendChild(image_div);
                        images_placeholder.appendChild(image_container);
                    });



                    //data.forEach(function(image) {
                    //    var image_container = document.createElement('div');
                    //    image_container.className = 'image-container';
                    //    var image_div = document.createElement('img');
                    //    image_div.onclick = function() {set_product_image(this)};
                    //    image_div.className = 'artifact_option_image';
                    //    image_div.src = image;
                    //    image_div.alt = 'Click to Select';
                        //add and attribute data-source_idenetifier
                    //    image_div.setAttribute('data-source_idenetifier', artifact_id);
                    //    image_container.appendChild(image_div);
                    //    images_placeholder.appendChild(image_container);
                    //});
                        

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

function add_deal_page(clicked_obj)
{
  (function ($) {

    //data-account_id="" data-property_id=""
    var account_id = clicked_obj.getAttribute('data-account_id');
    var property_id = clicked_obj.getAttribute('data-property_id');
     
    $('#form_account_id').val(account_id);
    $('#form_property_id').val(property_id);

    //add_deal_fields_holder
    $('#action_placeholder_msg').hide();
    $('#add_deal_fields_holder').show();

    $('#deal_pages_placeholder').show();
    $('#tabs_holder').hide();

  }(jQuery));
}
function save_deal_page_as_draft()
{
  (function ($) {

    var deal_page_title = document.getElementById('deal_page_title').value;
    var deal_page_description = document.getElementById('deal_page_description').value;
    var deal_image = document.getElementById('selected_featured_image').src;
    var deals_affiliate_tag = document.getElementById('deals_affiliate_tag').value;
    var deals_category_tags = document.getElementById('deals_category_tags').value;
     
    //get the selected language
    var language_slct = document.getElementById('languge_slct');
    var language = language_slct.options[language_slct.selectedIndex].value;

 

    //now make sure all the fields are filled
    if (deal_page_title == "") {
      alert('Please enter the Deal Page Title');
      return;
    }
    if (deal_page_description == "") {
      alert('Please enter the Deal Page Description');
      return;
    }
    if (deal_image == "") {
      alert('Please select the Deal Page Image');
      return;
    }
    if (deals_affiliate_tag == "") {
      alert('Please enter the Deals Affiliate Tag');
      return;
    }
    if (deals_category_tags == "") {
      alert('Please enter the Deals Category Tags');
      return;
    }
    if (language == "") {
      alert('Please select the language');
      return;
    }

    $('#form_deal_title').val(deal_page_title);
    $('#form_deal_description').val(deal_page_description);
    $('#form_deal_affiliate_tag').val(deals_affiliate_tag);
    $('#form_deal_category_tags').val(deals_category_tags);
    $('#form_deal_language').val(language);
    $('#form_deal_image').val(deal_image);

    //submit the form add_deal_page_form
    $('#add_deal_page_form').submit();


    //change the button text to saving... save_deal_page_as_draft
    $('#save_deal_page_as_draft').html('Saving... Please Wait');




  }(jQuery));

}
function select_deal_page(this_element)
{

   

  var account_id = this_element.getAttribute('data-account_id');
  var property_id = this_element.getAttribute('data-property_id');
  var gizzmo_id = this_element.getAttribute('data-gizzmo_id');
  var post_name = this_element.getAttribute('data-post_name');
  var deal_page_image = this_element.getAttribute('data-img');
  var language = this_element.getAttribute('data-language');
  var affiliate_tags = this_element.getAttribute('data-affiliate_tags');
  var wp_post_id = this_element.getAttribute('data-post_id');

  document.getElementById('selected_deal_page_img').src = deal_page_image;
  document.getElementById('selected_deal_title').innerHTML = post_name;

  document.getElementById('form_language').value = language;
  document.getElementById('form_affiliate_tags').value = affiliate_tags;

  document.getElementById('form_account_id').value = account_id;
  document.getElementById('form_property_id').value = property_id;

  document.getElementById('live_deal_form_account_id').value = account_id;
  document.getElementById('live_deal_form_property_id').value = property_id;

  document.getElementById('gizzmo_deal_post_id').value = gizzmo_id;
  document.getElementById('deal_wp_post_id').value = wp_post_id;
   
  //showe tab2
  //document.getElementById('tab2').style.display = 'block';
  //document.getElementById('tab2_lable').style.display = 'block';
  document.getElementById('tab2').click();
  
  document.getElementById('action_placeholder').style.display = 'none';

  //show deal_pages_placeholder
  document.getElementById('deal_pages_placeholder').style.display = 'none';
  //show live_deals_placeholder
  document.getElementById('live_deals_placeholder').style.display = 'block';
  //hide action_placeholder_msg
  document.getElementById('action_placeholder_msg').style.display = 'none';


  //hide the save_live_deals_changes button
  document.getElementById('save_live_deals_changes').style.display = 'none';

  get_property_artifacts_deals(account_id, property_id, wp_post_id);
  //check if interval exist, if not them and setInterval(() => get_property_artifacts(property_id), 10000);
  //if (typeof interval === 'undefined') {
  //  interval = setInterval(() => get_property_artifacts_deals(account_id, property_id, wp_post_id), 10000);
 // }



  (function ($) {
    //show tab2_lable tab
    //$('#tab2_lable').show();
    
  }(jQuery));
}

function publish_deal(this_element)
{
  (function ($) {
    var deal_image = document.getElementById('main_deal_img').src;
    var account_id = document.getElementById('live_deal_form_account_id').value;
    var property_id = document.getElementById('live_deal_form_property_id').value;
    var affiliate_tag = document.getElementById('form_affiliate_tags').value;
    var deal_source = document.getElementById('form_deal_source').value;
    var deal_asin = document.getElementById('deal_asin').value;
    var gizzmo_deal_id = document.getElementById('gizzmo_deal_post_id').value;
    var wp_post_id = document.getElementById('deal_wp_post_id').value;
    var list_price = document.getElementById('list_price').value;
    var avg_price = document.getElementById('avg_price').value;
    var percent_off = document.getElementById('form_percent_off').value;
    percent_off = percent_off.replace('%', '').replace('-', '');
    var position_in_list = ""
    var deal_price = document.getElementById('deal_price').value;
    var deal_title = document.getElementById('deal_title').value;
    var deal_paragraph = document.getElementById('deal_description').value;

    debugger;
    //check if deal_title is empty
    if (deal_title == "") {
      alert('Please enter the Deal Title');
      return;
    }
    //check if deal_paragraph is empty
    if (deal_paragraph == "") {
      alert('Please enter the Deal Description');
      return;
    }
    //check if deal_price is empty
    if (deal_price == "") {
      alert('Please enter the Deal Price');
      return;
    }
    //check if list_price is empty
    if (list_price == "") {
      alert('Please enter the List Price');
      return;
    }
    //check if avg_price is empty
    if (avg_price == "") {
      alert('Please enter the Average Price');
      return;
    }





    var deal_promotions = ""
    //get discount_badge checkbox
    var discount_badge = document.getElementById('discount_badge').checked;
    if (discount_badge == true) {discount_badge = 'yes';}
    else {discount_badge = 'no';}
    
    var best_deal_badge = document.getElementById('best_deal_badge').checked;
    if (best_deal_badge == true) {best_deal_badge = 'yes';}
    else {best_deal_badge = 'no';}

    var limited_time_deal_badge = document.getElementById('limited_time_deal_badge').checked;
    if (limited_time_deal_badge == true) {limited_time_deal_badge = 'yes';}
    else {limited_time_deal_badge = 'no';}

    var wow_deal_badge = document.getElementById('wow_deal_badge').checked;
    if (wow_deal_badge == true) {wow_deal_badge = 'yes';}
    else {wow_deal_badge = 'no';}

    deal_promotions = "discount_badge:" + discount_badge + ",best_deal_badge:" + best_deal_badge + ",limited_time_deal_badge:" + limited_time_deal_badge + ",wow_deal_badge:" + wow_deal_badge;

  

    //create a json object
    var request_json = {
      "account_id": account_id,
      "property_id": property_id,
      "affiliate_tag": affiliate_tag,
      "deal_source": deal_source,
      "deal_asin": deal_asin,
      "gizzmo_deal_id": gizzmo_deal_id,
      "wp_post_id": wp_post_id,
      "list_price": list_price,
      "avg_price": avg_price,
      "percent_off": percent_off,
      "position_in_list": position_in_list,
      "deal_image": deal_image,
      "deal_price": deal_price,
      "deal_title": deal_title,
      "deal_paragraph": deal_paragraph,
      "deal_promotions": deal_promotions
    };

    //console.log(JSON.stringify(request_json));

    //change the button text to saving... save_deal_page_as_draft
    $('#publish_deal').html('Publishing... Please Wait');

    // make a post request to the server g_add_live_deal
    return new Promise((resolve, reject) => {
      const xhttp = new XMLHttpRequest();
      xhttp.open("POST", `${baseURL}/g_add_live_deal`, true);
      xhttp.setRequestHeader("Content-Type", "application/json");
      xhttp.onreadystatechange = function() {
          if (this.readyState == 4) {
              if (this.status == 200) {
                  const response = this.responseText;
                  const response_json = JSON.parse(response);
                  const status = response_json['status'];
                  if (status == 'success') {
                      const data = response_json['data'];
                      //console.log(data);

                      get_live_deals(property_id, account_id,wp_post_id);

                      //change the button text back to Publish Deal
                      $('#publish_deal').html('Publish Deal');

                      //hide the deal_fields_wrapper
                      document.getElementById('action_placeholder').style.display = 'none';

                      $('#save_live_deals_changes').show();
                      //change the button text to saving... save_deal_page_as_draft
                      //alert('Deal Published Successfully');

                      resolve(data);
                  } else {
                      reject("error");
                  }
              } else {
                  reject("HTTP error: " + this.status);
              }
          }
      };
      xhttp.send(JSON.stringify(request_json));
    });


  }(jQuery));


}

function remove_live_deal(this_element)
{
  (function ($) {
    var identifier = this_element.getAttribute('data-identifier');
    var deal_asin = this_element.getAttribute('data-asin');


    var account_id = this_element.getAttribute('data-account_id');
    var property_id = this_element.getAttribute('data-property_id');
    var wp_post_id = this_element.getAttribute('data-wp_post_id');


    //create a json object call g_remove_live_deal
    var request_json = {
      "id": identifier
    };

    //console.log(JSON.stringify(request_json));

    // make a post request to the server g_remove_live_deal
    return new Promise((resolve, reject) => {
      const xhttp = new XMLHttpRequest();
      xhttp.open("POST", `${baseURL}/g_remove_live_deal`, true);
      xhttp.setRequestHeader("Content-Type", "application/json");
      xhttp.onreadystatechange = function() {
          if (this.readyState == 4) {
              if (this.status == 200) {
                  const response = this.responseText;
                  const response_json = JSON.parse(response);
                  const status = response_json['status'];
                  if (status == 'success') {
                      const data = response_json['data'];
                      //console.log(data);
                      //remove the deal from the live_deals_placeholder
                      $('#deal_' + identifier).remove();

                      //remove the added class from the deal_product_identifier
                      $('#your_deal_product_' + deal_asin).removeClass('added');
                      //return the click event to the #your_deal_product_' + deal_asin
                      $('#your_deal_product_' + deal_asin).attr('onclick', 'add_to_deal_tab(this)');

                      $('#save_live_deals_changes').show();

                      get_live_deals(property_id,account_id, wp_post_id);

                      resolve(data);
                  } else {
                      reject("error");
                  }
              } else {
                  reject("HTTP error: " + this.status);
              }
          }
      };
      xhttp.send(JSON.stringify(request_json));
    });



  })(jQuery);

}

function go_back_to_deals()
{
  (function ($) {

    $('#add_deal_fields_holder').hide();
    $('#deal_pages_placeholder').hide();
    $('#tabs_holder').show();

  }(jQuery));
}


function save_live_deals_changes()
{
  (function ($) {


    //save the deals_json to the server
    var deals_json = document.getElementById('publish_form_deals_json').value;
    //var deal_position_images_changes_json = document.getElementById('live_deals_position_changes').value;


    //create a json object call g_update_live_deals
    var request_json = {
      "deals_json": deals_json
    };

 
    return new Promise((resolve, reject) => {
      const xhttp = new XMLHttpRequest();
      xhttp.open("POST", `${baseURL}/g_update_live_deals`, true);
      xhttp.setRequestHeader("Content-Type", "application/json");
      xhttp.onreadystatechange = function() {
          if (this.readyState == 4) {
              if (this.status == 200) {
                  const response = this.responseText;
                  const response_json = JSON.parse(response);
                  const status = response_json['status'];
                  if (status == 'success') {
                    //console.log('Deals Updated Successfully');
                    //publish_live_deals_form
                    $('#publish_live_deals_form').submit();
                  }
              }
          }
      };
      xhttp.send(JSON.stringify(request_json));
    });











    

  }(jQuery));

}


function get_products_shared_features()
{
  (function ($) {

  $('#get_products_shared_features_bt').hide();


  identifier_1 = "";
  identifier_2 = "";
  existing_features = ""; //fill this later
  //get the existing features
  $('#selected_shared_features_draggable .one_criteria').each(function(){
    existing_features += $(this).data('criteria') + ",";
  });
  if (existing_features != "") {existing_features = existing_features.slice(0, -1);}

  //count the number of products in the existing_features
  var number_of_features = 0;
  //split the existing_features by ,
  existing_features_ar = existing_features.split(',');
  //get the number of products
  number_of_features = existing_features_ar.length;
  if (number_of_features >= 30)
  {
    alert('Maximum number of features reached');
    return;
  }


  $('#compare_products_draggable .list__item').each(function(){
    if ($(this).data('json_file_path') != undefined)
    {
        if (identifier_1 == ""){identifier_1 = $(this).data('json_file_path');}
        else{identifier_2 = $(this).data('json_file_path');}
    }
  });


  





  //shared_features_spinner_loader
  document.getElementById('selected_shared_features_draggable').style.display = 'block';
  document.getElementById('shared_features_spinner_loader').style.display = 'block';
  


  return new Promise((resolve, reject) => {
    const data_json = {
        "identifier_1": identifier_1.replace('.json',''),
        "identifier_2": identifier_2.replace('.json',''), 
        "existing_features": existing_features
    };
    //console.log(JSON.stringify(data_json));
    const xhttp = new XMLHttpRequest();
    xhttp.open("POST", `${baseURL}/g_get_products_comparible_features`, true);
    xhttp.setRequestHeader("Content-Type", "application/json");
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
            if (this.status == 200) {
                debugger;
                const response = this.responseText;
                const response_json = JSON.parse(response);
                const status = response_json['status'];
                if (status == 'success') {
                    const data = response_json['data'];
                    comparison_criterias = data['comparible_features']['comparison_criterias'];
                    

                   

                    for (var i = 0; i < comparison_criterias.length; i++) {
                      criteria = comparison_criterias[i]['criteria'];
                      criteria_desc = comparison_criterias[i]['criteria_description'];
                     
                      criteria_identifier = convert_text_to_numbers(criteria);
                      criteria = criteria.replace("'", "");


                      title_length = criteria.length;
                      max_left = 70 - title_length;

                      //shorter the criteria_desc
                      short_criteria_desc = criteria_desc;
                      if (criteria_desc.length > max_left) {
                        short_criteria_desc = criteria_desc.substring(0, max_left) + '...';
                      }
                      
    
                      one_prod = '<div  id="criteria_' + criteria_identifier + '" data-identifier="' + criteria_identifier + '" class="list__item" sortable-item="sortable-item">'
                      one_prod += '<div style="padding-bottom:2px;padding-top:2px"  class="list__item-content">'
                      one_prod += '<div class="list__item-description">'
                      one_prod += '<div data-status="selected" data-criteria_desc="' + criteria_desc + '" data-criteria="' + criteria + '" data-identifier="' + criteria_identifier + '" onclick="remove_selected_shared_topic(this)" style="cursor:pointer; background-color: #ffffff;float: left;height: 25px;width: 25px;margin-top: 5px;" class="one_criteria btn h-8 w-8 rounded-full p-0 font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90"><i id="action_icon_' + criteria_identifier + '" class="fas fa-eye" style="font-size: 17px;line-height: 25px;padding-left: 1px;color: #6c6c6c;"></i></div>'
                      one_prod += '<span title="' + criteria_desc+ '" class="prodname"><span class="criteria_name"><b>' + criteria + '</b></span> (' + short_criteria_desc + ')' + '</span>'
                      
                      one_prod += '</div>'
                      one_prod += '</div>'
                      one_prod += '<div class="list__item-handle" sortable-handle="sortable-handle"></div>'
                      one_prod += '</div>'
    
                      $('#selected_shared_features_draggable').append(one_prod);
    
                    }
                    


                    //show selected_shared_features_draggable
                    $("#selected_shared_features_draggable").css("display", "block");
                    //hide shared_features_spinner_loader
                    document.getElementById('shared_features_spinner_loader').style.display = 'none';
                    
                    //show the next button
                    document.getElementById('shared_features_next').style.display = 'block';


                    $('#get_products_shared_features_bt').html('Get More Shared Features');
                    $('#get_products_shared_features_bt').show();
                    
                    

                    //clear the thematic_concept_list
                    document.getElementById('thematic_concept_list').innerHTML = '';
                    //get the thematic_concepts list from data
                    thematic_concepts = data['thematic_concepts'];
                    thematic_concepts.unshift({'theme_name':'General Theme','description':'Exploring Key Features and Benefits of the Product.'});

                    

                    //now for thematic_concepts list, it shows in the next step but we fill it here
                    var gizzmo_data = JSON.parse(sessionStorage.getItem('gizzmo_data'));
                    var thematic_concept_active = gizzmo_data['account_data']['thematic_concept'];
                      
                    theme_count = 0;
                    thematic_concepts.forEach(function(thematic_concept) {
                        var thematic_concept_list = document.getElementById('thematic_concept_list');
                        var thematic_concept_li = document.createElement('li');
                        thematic_concept_li.className = 'gizzmo_list-item';
                        var thematic_concept_input = document.createElement('input');
                        thematic_concept_input.className = 'theme_radio';
                        thematic_concept_input.type = 'radio';
                        //thematic_concept_input.id = 'theme_'+thematic_concept['id'];
                        thematic_concept_input.name = 'theme';

                        //add data-theme attribute to the thematic_concept_input
                        thematic_concept_input.setAttribute('data-theme', thematic_concept['theme_name']);
                        thematic_concept_input.setAttribute('data-description', thematic_concept['description']);

                        //thematic_concept_input.value = thematic_concept['id'];
                        if (theme_count == 0) {
                            thematic_concept_input.checked = true;
                        }
                        else
                        {
                          if (thematic_concept_active == 'Unavailable') {
                            //make the input disabled
                            thematic_concept_input.disabled = true;
                          }
                        }
                        thematic_concept_li.appendChild(thematic_concept_input);
                        var thematic_concept_label = document.createElement('label');
                        thematic_concept_label.className = 'gizzmo_list-title';
                        //thematic_concept_label.htmlFor = 'theme_'+thematic_concept['id'];
                        thematic_concept_label.innerHTML = thematic_concept['theme_name'];
                        thematic_concept_li.appendChild(thematic_concept_label);
                        var thematic_concept_description = document.createElement('div');
                        thematic_concept_description.className = 'gizzmo_list-description';
                        thematic_concept_description.innerHTML = thematic_concept['description'];
                        thematic_concept_li.appendChild(thematic_concept_description);
                        thematic_concept_list.appendChild(thematic_concept_li);
                        theme_count = theme_count + 1;
                    });

                    //reset the click event listener for the .theme_radio
                    //$('.theme_radio').click(function(){
                    //    var theme_name = $(this)[0].attributes[4].nodeValue;
                    //    var theme_description = $(this)[0].attributes[5].nodeValue;
                    //    console.log(theme_name);
                    //    console.log(theme_description);
                    //});
























                    resolve(data);
                } else {
                    alert('Failed getting shared features, please try again');
                    $('#get_products_shared_features_bt').show();
                    document.getElementById('shared_features_spinner_loader').style.display = 'none';
                    reject("error");
                }
            } else {
                alert('Failed getting shared features, please try again');
                $('#get_products_shared_features_bt').show();
                document.getElementById('shared_features_spinner_loader').style.display = 'none';
                reject("HTTP error: " + this.status);
            }
        }
    };
    xhttp.send(JSON.stringify(data_json));
  });

  
























    

      $('#get_products_shared_features_bt').html('Loading...');


      //get the selected asins
      var asins = $('#comparison_asins').val();
      //replace the , with -
      asins = asins.replace(/,/g, '-');

      var existing_criterias = [];
      var existing_thematic_concepts = [];

      products_shared_features_list ="";

      $.ajax({
        //url: 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/get_products_comparible_features/' + asins,
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

function get_listicle_topics()
  {
    (function ($) {
      
      //get the package type
      //var package_type = $('#package_type').val();

      //fill the action_type input
      //$('#action_type').val('listicle');
      //$('#listicle_action_type').val('listicle');



      var listicle_subject = $('#listicle_subject_input').val().replace(',', '');
      if (listicle_subject == '')
      {
        alert('Please enter a Subject');
        return;
      }

      document.getElementById('topics_spinner_loader').style.display = 'block';
      document.getElementById('topics_list_wrapper').style.display = 'none';

      //return;

      data = {
        "listicle_subject": listicle_subject
      }
      
      $.ajax({
        url: 'https://gizzmo-content-service-h0gfnqs6e4jhj.cpln.app/g_get_listicle_titles_list',
        type: 'POST',
        data: JSON.stringify(data),
        contentType: "application/json",
        success: function (data) {
          //console.log(data);
          //data = data.data.titles;
          topics_list = data.data.titles;
          //$('#get_listicle_titles_bt').html('Get More Listicle Titles');
          if (topics_list.length > 0)
          {
            $('#topics_list').html('');



            topics_count = 0;
            topics_list.forEach(function(topic) {
                var topic_title = topic["title"];
                var expected_section_number = topic["expected_section_number"];
                var topics_list = document.getElementById('topics_list');
                var topics_list_li = document.createElement('li');
                topics_list_li.className = 'gizzmo_list-item';
                var topic_input = document.createElement('input');
                topic_input.className = 'theme_radio';
                topic_input.type = 'radio';
                topic_input.name = 'theme';
                topic_input.setAttribute('data-expected-section-number', expected_section_number);
                topic_input.value = topic_title;
                topic_input.setAttribute('onchange', 'listicle_handleCheckChange(this);');
                topics_list_li.appendChild(topic_input);
                var topic_label = document.createElement('label');
                topic_label.className = 'gizzmo_list-title';
                topic_label.innerHTML = topic_title;
                topics_list_li.appendChild(topic_label);
                topics_list.appendChild(topics_list_li);
                topics_count = topics_count + 1;
            });


            //$('#topics_list').html(all_titles_html);
            document.getElementById('topics_spinner_loader').style.display = 'none';
            document.getElementById('topics_list_wrapper').style.display = 'block';
            

             

             


          }

           
        }

      });


    }(jQuery));
    
}
function listicle_handleCheckChange(checkbox) {
  (function ($) {
    //get the selected title
    //var selected_title = $(checkbox).val();
    //var expected_section_number = $(checkbox).data('expected-section-number');
    //show the next button
    document.getElementById('next_after_topic').style.display = 'block';

    //show seo_keyphrase_wrapper
    document.getElementById('seo_keyphrase_wrapper').style.display = 'block';


  }(jQuery));
}

function get_listicle_paragraphs()
{
    (function ($) {

      
      //from teh topics_list UL get the selected title and expected_section_number
      var selected_listicle_title = document.querySelector('input[name="theme"]:checked');
      var listicle_expected_section_number = selected_listicle_title.getAttribute('data-expected-section-number');
      var listicle_title = selected_listicle_title.value;
      if (listicle_expected_section_number == null || listicle_expected_section_number == undefined || listicle_expected_section_number == "" || listicle_expected_section_number == "null")
      {
        listicle_expected_section_number = 15;
      }
 

      //console.log(data);

      document.getElementById('listicle_paragraphs_spinner_loader').style.display = 'block';
      document.getElementById('selected_shared_features_draggable').style.display = 'none';
      //hide get_listicle_paragraphs_bt
      $('#get_listicle_paragraphs_bt').hide();


      return new Promise((resolve, reject) => {
        const data_json = {
          "listicle_title": listicle_title,
          "sections_count": listicle_expected_section_number,
          "existing_sections": ""
        };
        
        const xhttp = new XMLHttpRequest();
        xhttp.open("POST", `${baseURL}/g_get_listicle_paragraphs_list`, true);
        xhttp.setRequestHeader("Content-Type", "application/json");
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4) {
                if (this.status == 200) {
                    const response = this.responseText;
                    const response_json = JSON.parse(response);
                    const status = response_json['status'];
                    if (status == 'success') {
                        const data = response_json['data'];
                        listicle_sections = data['Sections']
    
                        for (var i = 0; i < listicle_sections.length; i++) {
                          criteria = listicle_sections[i]['Title'];
                          criteria_desc = listicle_sections[i]['Section_description'];
                         
                          criteria_identifier = convert_text_to_numbers(criteria);
                          criteria = criteria.replace("'", "");
    
    
                          title_length = criteria.length;
                          max_left = 70 - title_length;
    
                          //shorter the criteria_desc
                          short_criteria_desc = criteria_desc;
                          if (criteria_desc.length > max_left) {
                            short_criteria_desc = criteria_desc.substring(0, max_left) + '...';
                          }
                          
                          var icount = i + 1;
                          one_prod = '<div  id="criteria_' + criteria_identifier + '" data-identifier="' + criteria_identifier + '" class="list__item" sortable-item="sortable-item">'
                          one_prod += '<div style="padding-bottom:2px;padding-top:2px"  class="list__item-content">'
                          one_prod += '<div class="list__item-description">'
                          one_prod += '<div data-status="selected" data-criteria_desc="' + criteria_desc + '" data-criteria="' + criteria + '" data-identifier="' + criteria_identifier + '" onclick="remove_selected_shared_topic(this)" style="cursor:pointer; background-color: #ffffff;float: left;height: 25px;width: 25px;margin-top: 5px;" class="one_criteria btn h-8 w-8 rounded-full p-0 font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90"><i id="action_icon_' + criteria_identifier + '" class="fas fa-eye" style="font-size: 17px;line-height: 25px;padding-left: 1px;color: #6c6c6c;"></i></div>'
                          one_prod += '<span title="' + criteria_desc+ '" class="prodname"><span class="criteria_name"><b>' + icount + '. '  + criteria + '</b></span> (' + short_criteria_desc + ')' + '</span>'
                          
                          one_prod += '</div>'
                          one_prod += '</div>'
                          one_prod += '<div class="list__item-handle" sortable-handle="sortable-handle"></div>'
                          one_prod += '</div>'
        
                          $('#selected_shared_features_draggable').append(one_prod);
        
                        }
                        
    
    
                        //show selected_shared_features_draggable
                        $("#selected_shared_features_draggable").css("display", "block");
                        //hide shared_features_spinner_loader
                        document.getElementById('listicle_paragraphs_spinner_loader').style.display = 'none';
                        
                         
    
                        $('#get_more_listicle_paragraphs_bt').show();
                        
                        
    
    
                        resolve(data);
                    } else {
                        alert('Failed getting listicle sections, please try again');
                        $('#get_listicle_paragraphs_bt').show();
                        document.getElementById('listicle_paragraphs_spinner_loader').style.display = 'none';
                        reject("error");
                    }
                } else {
                    alert('Failed getting listicle sections, please try again');
                    $('#get_listicle_paragraphs_bt').show();
                    document.getElementById('listicle_paragraphs_spinner_loader').style.display = 'none';
                    reject("HTTP error: " + this.status);
                }
            }
        };
        xhttp.send(JSON.stringify(data_json));
      });


    }(jQuery));
}
function get_more_listicle_paragraphs()
{
    (function ($) {

      
      //from teh topics_list UL get the selected title and expected_section_number
      var selected_listicle_title = document.querySelector('input[name="theme"]:checked');
      var listicle_expected_section_number = selected_listicle_title.getAttribute('data-expected-section-number');
      var listicle_title = selected_listicle_title.value;
      if (listicle_expected_section_number == null || listicle_expected_section_number == undefined || listicle_expected_section_number == "" || listicle_expected_section_number == "null")
      {
        listicle_expected_section_number = 15;
      }

      //create a comma separated list of the existing sections
      var existing_sections_ar = [];
      var existing_sections = "";
      var number_of_existing_sections = 0;
      $('#selected_shared_features_draggable .one_criteria').each(function(){
        existing_sections += $(this).data('criteria') + ",";
        number_of_existing_sections = number_of_existing_sections + 1;
        existing_sections_ar.push($(this).data('criteria'));
      });
      if (existing_sections != "") {existing_sections = existing_sections.slice(0, -1);}


 


      document.getElementById('listicle_paragraphs_spinner_loader').style.display = 'block';
      //document.getElementById('selected_shared_features_draggable').style.display = 'none';
      //hide get_listicle_paragraphs_bt
      $('#get_more_listicle_paragraphs_bt').hide();


      return new Promise((resolve, reject) => {
        const data_json = {
          "listicle_title": listicle_title,
          "sections_count": listicle_expected_section_number,
          "existing_sections": existing_sections
        };
        
        const xhttp = new XMLHttpRequest();
        xhttp.open("POST", `${baseURL}/g_get_listicle_paragraphs_list`, true);
        xhttp.setRequestHeader("Content-Type", "application/json");
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4) {
                if (this.status == 200) {
                    const response = this.responseText;
                    const response_json = JSON.parse(response);
                    const status = response_json['status'];
                    if (status == 'success') {
                        const data = response_json['data'];
                        listicle_sections = data['Sections']
                        
                        for (var k = 0; k < listicle_sections.length; k++) {
                          criteria = listicle_sections[k]['Title'];
                          //check if the criteria already exists in the list of criterias
                          if (existing_sections_ar.includes(criteria))
                          {
                            //remove the criteria from the listicle_sections
                            listicle_sections.splice(k, 1);
                          }
                        }




                        var total_sections= 0;
                        for (var i = 0; i < listicle_sections.length; i++) {
                          criteria = listicle_sections[i]['Title'];
                          //check if the criteria already exists in the list of criterias
                          if (existing_sections_ar.includes(criteria))
                          {
                            continue;
                          }

                          criteria_desc = listicle_sections[i]['Section_description'];
                         
                          criteria_identifier = convert_text_to_numbers(criteria);
                          criteria = criteria.replace("'", "");
    
    
                          title_length = criteria.length;
                          max_left = 70 - title_length;
    
                          //shorter the criteria_desc
                          short_criteria_desc = criteria_desc;
                          if (criteria_desc.length > max_left) {
                            short_criteria_desc = criteria_desc.substring(0, max_left) + '...';
                          }
                          
                          var icount = number_of_existing_sections + i + 1;
                          total_sections =icount;
                          one_prod = '<div  id="criteria_' + criteria_identifier + '" data-identifier="' + criteria_identifier + '" class="list__item" sortable-item="sortable-item">'
                          one_prod += '<div style="padding-bottom:2px;padding-top:2px"  class="list__item-content">'
                          one_prod += '<div class="list__item-description">'
                          one_prod += '<div data-status="selected" data-criteria_desc="' + criteria_desc + '" data-criteria="' + criteria + '" data-identifier="' + criteria_identifier + '" onclick="remove_selected_shared_topic(this)" style="cursor:pointer; background-color: #ffffff;float: left;height: 25px;width: 25px;margin-top: 5px;" class="one_criteria btn h-8 w-8 rounded-full p-0 font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90"><i id="action_icon_' + criteria_identifier + '" class="fas fa-eye" style="font-size: 17px;line-height: 25px;padding-left: 1px;color: #6c6c6c;"></i></div>'
                          one_prod += '<span title="' + criteria_desc+ '" class="prodname"><span class="criteria_name"><b>' + icount + '. '  + criteria + '</b></span> (' + short_criteria_desc + ')' + '</span>'
                          
                          one_prod += '</div>'
                          one_prod += '</div>'
                          one_prod += '<div class="list__item-handle" sortable-handle="sortable-handle"></div>'
                          one_prod += '</div>'
        
                          $('#selected_shared_features_draggable').append(one_prod);
        
                        }
                        
    
    
                        //show selected_shared_features_draggable
                        $("#selected_shared_features_draggable").css("display", "block");
                        //hide shared_features_spinner_loader
                        document.getElementById('listicle_paragraphs_spinner_loader').style.display = 'none';
                        
                         
                        if (total_sections >= 59)
                        {
                          $('#get_more_listicle_paragraphs_bt').hide();
                        }
                        else
                        {
                          $('#get_more_listicle_paragraphs_bt').show();
                        }
                        
                         
    
    
                        resolve(data);
                    } else {
                        alert('Failed getting listicle sections, please try again');
                        $('#get_listicle_paragraphs_bt').show();
                        document.getElementById('listicle_paragraphs_spinner_loader').style.display = 'none';
                        reject("error");
                    }
                } else {
                    alert('Failed getting listicle sections, please try again');
                    $('#get_listicle_paragraphs_bt').show();
                    document.getElementById('listicle_paragraphs_spinner_loader').style.display = 'none';
                    reject("HTTP error: " + this.status);
                }
            }
        };
        xhttp.send(JSON.stringify(data_json));
      });


    }(jQuery));
}

function addAffiliateTag()
{
  (function ($) {

    var affiliateTag = $('#affiliateTag').val();
    if (affiliateTag == "")
    {
      alert('Please enter an Affiliate Tag');
      return;
    }

    var property_id = $('#main_property_id').val();

    return new Promise((resolve, reject) => {
      const data_json = {
        "affiliate_tag": affiliateTag,
        "property_id": property_id
      };
      //console.log(JSON.stringify(data_json));
      const xhttp = new XMLHttpRequest();
      xhttp.open("POST", `${baseURL}/g_add_affiliate_tag`, true);
      xhttp.setRequestHeader("Content-Type", "application/json");
      xhttp.onreadystatechange = function() {
          if (this.readyState == 4) {
              if (this.status == 200) {
                  const response = this.responseText;
                  const response_json = JSON.parse(response);

                  const status = response_json['status'];
                  if (status == 'success') {
                    const data = response_json['data'];
                    
                    //add the affiliate tag to the affiliate_tags select
                    var affiliate_tags = document.getElementById('affiliate_tags');
                    var option = document.createElement('option');
                    option.text = affiliateTag;
                    option.value = affiliateTag;
                    affiliate_tags.add(option);
                    //make it selected
                    option.selected = true;
                    //clear the affiliateTag input
                    $('#affiliateTag').val('');

                    closeModal('addAffiliateModal');
                    


                    document.getElementById('affiliate_tags').style.display = 'block';
                    document.getElementById('add_affiliate_tag').style.marginLeft = '10px';
                    document.getElementById('delete_affiliate_tag').style.display = 'block';


                    resolve(data);
                  }
                  else {
                    if (response_json["message"] == "Domain Does not Exist") {
                       
                    }
                  }
              } else {
                  reject("HTTP error: " + this.status);
              }
          }
      };
      xhttp.send(JSON.stringify(data_json));
    });





  }(jQuery));
}

function confirmDelete()
{
  (function ($) {

    var affiliateTag = $('#affiliate_tags').val();
    if (affiliateTag == "")
    {
      alert('Please select an Affiliate Tag');
      return;
    }

    var property_id = $('#main_property_id').val();

    return new Promise((resolve, reject) => {
      const data_json = {
        "affiliate_tag": affiliateTag,
        "property_id": property_id
      };
      //console.log(JSON.stringify(data_json));
      const xhttp = new XMLHttpRequest();
      xhttp.open("POST", `${baseURL}/g_delete_affiliate_tag`, true);
      xhttp.setRequestHeader("Content-Type", "application/json");
      xhttp.onreadystatechange = function() {
          if (this.readyState == 4) {
              if (this.status == 200) {
                  const response = this.responseText;
                  const response_json = JSON.parse(response);

                  const status = response_json['status'];
                  if (status == 'success') {
                    const data = response_json['data'];

                    //remove the affiliate tag from the affiliate_tags select
                    var affiliate_tags = document.getElementById('affiliate_tags');
                    var i;
                    for(i = 0; i < affiliate_tags.options.length; i++) {
                      if(affiliate_tags.options[i].value == affiliateTag) {
                        affiliate_tags.remove(i);
                        break;
                      }
                    }
                    //make the first option selected if there is any
                    if (affiliate_tags.options.length > 0)
                    {
                      affiliate_tags.options[0].selected = true;
                    }
                    else{
                      //hide the affiliate_tags select
                      document.getElementById('affiliate_tags').style.display = 'none';
                      document.getElementById('add_affiliate_tag').style.marginLeft = '0px';
                      document.getElementById('delete_affiliate_tag').style.display = 'none';
                    }
                    

                    //clear the affiliateTag input
                    $('#affiliateTag').val('');

                    closeModal('deleteConfirmationModal');

                    resolve(data);
                  }
                  else {
                    if (response_json["message"] == "Domain Does not Exist") {
                      alert('An error occured, please try again');
                      closeModal('deleteAffiliateModal');
                    }
                  }
              } else {
                  reject("HTTP error: " + this.status);
              }
          }
      };
      xhttp.send(JSON.stringify(data_json));
  });

  }(jQuery));
}


function save_content_as_draft(clicked_button)
{

  //clear the interval check_tasks_interval
  clearInterval(check_tasks_interval);
  //console.log('clearing check_tasks_interval');

  (function ($) {

    var task_id = $(clicked_button).data('task_id');
    $('#form_task_id').val(task_id);

    //console.log('task_id: ' + task_id);

    //show the spinner loader
    showModal('loading_Modal');

    //change the button text to saving... save_deal_page_as_draft
    $(clicked_button).html('Saving...');
    $(clicked_button).prop('disabled', true);

    //submit the form 
    $('#save_content_as_draft_form').submit();

    


  }(jQuery));

}





function save_post_task()
{
  (function ($) {
    
  
  //get the account_id
  var account_id = $('#main_account_id').val();
  var property_id = $('#main_property_id').val();
  var content_type = $('#main_content_type').val();
  var package = $('#main_package_name').val();
  
  //get from schemas checkboxe input value
  var schemas = "";
  if ($('#schemas').is(":checked"))
  {schemas = "yes";}else{schemas = "no";}

  //get from tags checkboxe input value tags
  var tags = "";
  if ($('#tags').is(":checked"))
  {tags = "yes";}else{tags = "no";}

  //get from carousels checkboxe input value carousels
  var carousels = "";
  if ($('#carousels').is(":checked"))
  {carousels = "yes";}else{carousels = "no";}

  //get from categories checkboxe input value categories
  var categories = "";
  if ($('#categories').is(":checked"))
  {categories = "yes";}else{categories = "no";}

  //get from faqs checkboxe input value faqs
  var faqs = "";
  if ($('#faqs').is(":checked"))
  {faqs = "yes";}else{faqs = "no";}

  //get from pros_cons checkboxe input value pros_cons
  var pros_cons = "";
  if ($('#pros_cons').is(":checked"))
  {pros_cons = "yes";}else{pros_cons = "no";}

  //get from conclusion checkboxe input value conclusion
  var conclusion = "";
  if ($('#conclusion').is(":checked"))
  {conclusion = "yes";}else{conclusion = "no";}


  //get selected language from languge_slct
  var language = $('#languge_slct').val();

  //get selected affiliate_tags from affiliate_tags
  var affiliate_tags = "";
  if ($('#affiliate_tags'))
  {
    affiliate_tags = $('#affiliate_tags').val();
  }
  //check if the affiliate_tags is undefined
  if (affiliate_tags == undefined)
  {
    affiliate_tags = "";
  }


  //get seo_keyword from seo_keyword
  var seo_keyword = $('#key_phrase_input').val();

  //get thematic_concept  name and description from ul#thematic_concept_list
  var thematic_concept = "";
  var thematic_concept_description = "";
  $('#thematic_concept_list input[type=radio]').each(function(){
    if ($(this).is(":checked"))
    {
      thematic_concept = $(this).data('theme');
      thematic_concept_description = $(this).data('description');
    }
  });


  //get the internal_linking from internal_linking
  var internal_linking = "";
  if ($('#internal_linking').is(":checked"))
  {internal_linking = "yes";}else{internal_linking = "no";}


  var images_embed_in_content = "";
  if ($('#images_embed_in_content').is(":checked"))
  {
    images_embed_in_content = "yes";
    image_placeholders = "no";
  }else
  {
    images_embed_in_content = "no";
    image_placeholders = "yes";
  }


  var keyphrase_hyperlinks = "";
  if ($('#keyphrase_hyperlinks').is(":checked"))
  {keyphrase_hyperlinks = "yes";}else{keyphrase_hyperlinks = "no";}


  

  var roundup_products_list = "";
  if ($('#roundup_products_list')) {
    //check if it is checked
    if ($('#roundup_products_list').is(":checked"))
    {roundup_products_list = "yes";}else{roundup_products_list = "no";}
  }


 


  var roundup_rating_reviews = "";
  if ($('#roundup_rating_reviews_list')) {
    //check if it is checked
    if ($('#roundup_rating_reviews_list').is(":checked"))
    {roundup_rating_reviews = "yes";}else{roundup_rating_reviews = "no";}
  }

  var roundup_pros_cons = "";
  if ($('#roundup_pros_cons_list')) {
    //check if it is checked
    if ($('#roundup_pros_cons_list').is(":checked"))
    {roundup_pros_cons = "yes";}else{roundup_pros_cons = "no";}
  }

  var asins_in_roundup = "";
  if ($('#roundup_products_draggable')) {
    $('#roundup_products_draggable .list__item').each(function(){
      if ($(this).data('identifier') != undefined)
      {
        //also get the image
        var image = $(this).find('img').attr('src');
        //add the image to the asins_in_roundup
        asins_in_roundup += $(this).data('identifier') + "~" + image + ",";
      }
    });
    if (asins_in_roundup != "") {asins_in_roundup = asins_in_roundup.slice(0, -1);}
  }


  var asins_in_comparison = "";
  if ($('#compare_products_draggable')) {
    $('#compare_products_draggable .list__item').each(function(){
      if ($(this).data('identifier') != undefined)
      {
        asins_in_comparison += $(this).data('identifier') + ",";
      }
    });
    if (asins_in_comparison != "") {asins_in_comparison = asins_in_comparison.slice(0, -1);}
  }
  //get comparison shared features list
  var comparison_shared_features_list ="";
  if (content_type == 'Comparison')
  {
    if ($('#selected_shared_features_draggable')) {
      $('#selected_shared_features_draggable .list__item').each(function() {
        var criteriaDiv = $(this).find('.one_criteria');
        //var dataStatus = criteriaDiv.data('status');
        var dataCriteriaDesc = criteriaDiv.data('criteria_desc');
        var dataCriteria = criteriaDiv.data('criteria');

        //find the i tag and get the class of the i tag
        var iTag = criteriaDiv.find('i');
        var iTagClass = iTag.attr('class');
        //check if the i tag class is fas fa-eye-slash or fas fa-eye
        var dataStatus = "enabled";
        if (iTagClass == "fas fa-eye-slash")
        {
          dataStatus = "disabled";
        }

        if (dataStatus == "enabled")
        {
          comparison_shared_features_list += dataCriteria + "~" + dataCriteriaDesc + "^";
        }
      });
      //remove the last ^
      comparison_shared_features_list = comparison_shared_features_list.substring(0, comparison_shared_features_list.length - 1);
    }
  }



  var featured_image = "";
  //check if there is a featured image selected_featured_image and get its src
  if ($('#selected_featured_image').attr('src') != undefined)
  {
    featured_image = $('#selected_featured_image').attr('src');
  }


  var ai_image_generation = "";
  //check if exist ai_image_generation
  if ($('#ai_image_generation'))
  {
    //check if it is checked
    if ($('#ai_image_generation').is(":checked"))
    {ai_image_generation = "yes";}else{ai_image_generation = "no";}
  }


  //if topics_list exists get the selected topic
  var selected_topic = "";
  if ($('#topics_list'))
  {
    $('#topics_list input[type=radio]').each(function(){
      if ($(this).is(":checked"))
      {
        selected_topic = $(this).val();
      }
    });
  }

  var listicle_sections = "";
  if (content_type == 'Listicle')
  {
    if ($('#selected_shared_features_draggable')) {
      $('#selected_shared_features_draggable .list__item').each(function() {
        var criteriaDiv = $(this).find('.one_criteria');
        //var dataStatus = criteriaDiv.data('status');
        var dataCriteriaDesc = criteriaDiv.data('criteria_desc');
        var dataCriteria = criteriaDiv.data('criteria');

        //find the i tag and get the class of the i tag
        var iTag = criteriaDiv.find('i');
        var iTagClass = iTag.attr('class');
        //check if the i tag class is fas fa-eye-slash or fas fa-eye
        var dataStatus = "enabled";
        if (iTagClass == "fas fa-eye-slash")
        {
          dataStatus = "disabled";
        }

        if (dataStatus == "enabled")
        {
          listicle_sections += dataCriteria + "~" + dataCriteriaDesc + "^";
        }
      });
      //remove the last ^
      listicle_sections = listicle_sections.substring(0, listicle_sections.length - 1);
    }
  }


  //CTAs
  var ctas = "";
  if ($('#CTAs')) {
    //check if it is checked
    if ($('#CTAs').is(":checked"))
      {ctas = "yes";}else{ctas = "no";}
  }
    
  
  var review_asin = "";
  if (content_type == 'Review')
  {
    review_asin = $('#main_review_asin').val();
  }


  //new addition, selected_audience and selected_tone
  //check if the selected_audience and selected_tone exists
  var selected_audience = "";
  var selected_tone = "";
  debugger;
  if ($('#selected_audience').length)
  {
    selected_audience = $('#selected_audience').html();
  }
  if ($('#selected_tone').length)
  {
    selected_tone = $('#selected_tone').html();
  }


  //create a json object to send to the server
  const data_json  = {
    "account_id": account_id,
    "property_id": property_id,
    "content_type": content_type,
    "package": package,
    "schemas": schemas,
    "tags": tags,
    "carousels": carousels,
    "categories": categories,
    "faqs": faqs,
    "pros_cons": pros_cons,
    "conclusion": conclusion,
    "language": language,
    "affiliate_tags": affiliate_tags,
    "seo_keyword": seo_keyword,
    "thematic_concept": thematic_concept,
    "thematic_concept_description": thematic_concept_description,
    "internal_linking": internal_linking,
    "images_embed_in_content": images_embed_in_content,
    "image_placeholders": image_placeholders,
    "keyphrase_hyperlinks": keyphrase_hyperlinks,
    "ai_image_generation": ai_image_generation,
    "roundup_rating_reviews": roundup_rating_reviews,
    "roundup_products_list": roundup_products_list,
    "roundup_pros_cons": roundup_pros_cons,
    "asins_in_roundup": asins_in_roundup,
    "asins_in_comparison": asins_in_comparison,
    "comparison_shared_features_list": comparison_shared_features_list,
    "featured_image": featured_image,
    "selected_topic": selected_topic,
    "listicle_sections": listicle_sections,
    "review_asin": review_asin,
    "CTAs": ctas,
    "selected_audience": selected_audience,
    "selected_tone": selected_tone
  };

  //console.log(data_json);

  //send the data to the server
  return new Promise((resolve, reject) => {
    const xhttp = new XMLHttpRequest();
    xhttp.open("POST", `${baseURL}/g_insert_task`, true);
    xhttp.setRequestHeader("Content-Type", "application/json");
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
            if (this.status == 200) {
                const response = this.responseText;
                const response_json = JSON.parse(response);

                const status = response_json['status'];
                if (status == 'success') {
                  //redirect to the gizzmo-ai-gizzmo-posts page
                  window.location.href = "admin.php?page=gizzmo-ai-gizzmo-posts";
                  //resolve(data);
                }
                else {
                  if (response_json["message"] == "Domain Does not Exist") {
                     
                  }
                }
            } else {
                reject("HTTP error: " + this.status);
            }
        }
    };
    xhttp.send(JSON.stringify(data_json));
  });







  
  }(jQuery));
}


function select_audience(radio)
{
  (function ($) {
    var audience = $(radio).data('audience');
    $('#selected_audience').html(audience);
    //set the default_selected_audience in the local storage
    localStorage.setItem('deafult_selected_audience', audience);
    //close the modal
    closeModal('audiances_model');

  }(jQuery));
}
function select_tone(radio)
{
  (function ($) {
    var tone = $(radio).data('tone');
    $('#selected_tone').html(tone);
    //set the default_selected_tone in the local storage
    localStorage.setItem('deafult_selected_tone', tone);
    //close the modal
    closeModal('tones_model');

  }(jQuery));
}

function set_tones_and_audiences(tones_and_audiences)
{

  const tones_and_audiences_json = JSON.parse(tones_and_audiences);

  var audiences_string = tones_and_audiences_json['audiences'];
  var audiences = JSON.parse(audiences_string);

  var tones_string = tones_and_audiences_json['tones'];
  var tones = JSON.parse(tones_string);


  

  //set the tones and audiences in the select elements
  var audiences_select = document.getElementById('audiences_list');
  var tones_select = document.getElementById('tones_list');
  //clear the select elements
  audiences_select.innerHTML = "";
  tones_select.innerHTML = "";

  //add the tones and audiences to the select elements
 
  //add the audiences
  
  
  var audiences_count = 0;
  var tones_count = 0;
  audiences.forEach(function(audience) {
    var audience_title = audience["name"];
    var audience_description = audience["description"];
    var audience_radio = document.createElement('input');
    audience_radio.className = 'audience_radio';
    audience_radio.type = 'radio';
    audience_radio.id = 'audience_' + audiences_count;
    audience_radio.name = 'audience';
    audience_radio.setAttribute('data-audience', audience_title);
    audience_radio.setAttribute('data-description', audience_description);
    audience_radio.value = 'undefined';
    var audience_label = document.createElement('label');
    audience_label.className = 'gizzmo_list-title';
    audience_label.htmlFor = 'audience_' + audiences_count;
    audience_label.innerHTML = audience_title;
    var audience_description_div = document.createElement('div');
    audience_description_div.className = 'gizzmo_list-description';
    audience_description_div.innerHTML = audience_description;

    //if audience["is_deafult"] == true then make it selected
    //check if the user has a default audience set in his local storage
    var default_selected_audience = localStorage.getItem('deafult_selected_audience');
    if (default_selected_audience != null && default_selected_audience != undefined && default_selected_audience != "")
    {
      if (audience_title == default_selected_audience)
      {
        audience_radio.checked = true;
        document.getElementById('selected_audience').innerHTML = audience_title;
      }
    }
    else
    {
      if (audience["is_deafult"] == "True")
      {
        audience_radio.checked = true;
        document.getElementById('selected_audience').innerHTML = audience_title;
        //set the default_selected_audience in the local storage
        localStorage.setItem('deafult_selected_audience', audience_title);
      }
    }

    //add an onchange event to the radio button called select_audience
    audience_radio.setAttribute('onchange', 'select_audience(this);');


    var audience_li = document.createElement('li');
    audience_li.className = 'gizzmo_list-item';
    audience_li.appendChild(audience_radio);
    audience_li.appendChild(audience_label);
    audience_li.appendChild(audience_description_div);

    audiences_select.appendChild(audience_li);

    audiences_count = audiences_count + 1;
  });


  //add the tones
  tones.forEach(function(tone) {
    var tone_title = tone["name"];
    var tone_description = tone["description"];
    var tone_radio = document.createElement('input');
    tone_radio.className = 'tone_radio';
    tone_radio.type = 'radio';
    tone_radio.id = 'tone_' + tones_count;
    tone_radio.name = 'tone';
    tone_radio.setAttribute('data-tone', tone_title);
    tone_radio.setAttribute('data-description', tone_description);
    tone_radio.value = 'undefined';
    var tone_label = document.createElement('label');
    tone_label.className = 'gizzmo_list-title';
    tone_label.htmlFor = 'tone_' + tones_count;
    tone_label.innerHTML = tone_title;
    var tone_description_div = document.createElement('div');
    tone_description_div.className = 'gizzmo_list-description';
    tone_description_div.innerHTML = tone_description;

    //if tone["is_deafult"] == true then make it selected
    //check if the user has a default audience set in his local storage
    var default_selected_tone = localStorage.getItem('deafult_selected_tone');

    if (default_selected_tone != null && default_selected_tone != undefined && default_selected_tone != "")
    {
      if (tone_title == default_selected_tone)
      {
        tone_radio.checked = true;
        document.getElementById('selected_tone').innerHTML = tone_title;
      }
    }
    else
    {
      if (tone["is_deafult"] == "True")
      {
        tone_radio.checked = true;
        document.getElementById('selected_tone').innerHTML = tone_title;
        //set the default_selected_tone in the local storage
        localStorage.setItem('deafult_selected_tone', tone_title);
      }
    }

    //add an onchange event to the radio button called select_tone
    tone_radio.setAttribute('onchange', 'select_tone(this);');

    var tone_li = document.createElement('li');
    tone_li.className = 'gizzmo_list-item';
    tone_li.appendChild(tone_radio);
    tone_li.appendChild(tone_label);
    tone_li.appendChild(tone_description_div);

    tones_select.appendChild(tone_li);

    tones_count = tones_count + 1;

  });


}
function get_tones_and_audiences()
{
  //make a call to the server to get the tones and audiences g_get_tones_and_audiences
  return new Promise((resolve, reject) => {
    const xhttp = new XMLHttpRequest();
    xhttp.open("GET", `${baseURL}/g_get_tones_and_audiences`, true);
    xhttp.setRequestHeader("Content-Type", "application/json");
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
            if (this.status == 200) {
                const response = this.responseText;
                const response_json = JSON.parse(response);

                const status = response_json['status'];
                if (status == 'success') {
                  //set the tones_and_audiences in the session storage
                  sessionStorage.setItem('tones_and_audiences', response);

                  //set the tones_and_audiences
                  set_tones_and_audiences(response);
                  resolve(response);
                }
                else {
                  if (response_json["message"] == "Error") {
                    console.log('Tones and audiences Does not Exist');
                  }
                }
            } else {
                reject("HTTP error: " + this.status);
            }
        }
    };
    xhttp.send();
  });


}





//get the ready state of the document
document.addEventListener("DOMContentLoaded", function() {

  var page = getPageParameterValue();
  //if (page != 'gizzmo-ai-listicle' && page != 'gizzmo-ai-deals')
  //{
  //  get_artifacts();
  //}

    (function ($) {

        //=================gizzmo connect domain================
        var currentURL = window.location.href;
        var domain = extractDomainWithProtocolAndWWW(currentURL);

        //show the loading_Modal modal
        if (page != 'gizzmo-ai-listicle')
        {
          showModal('loading_Modal');
        }
        

        get_domain_account_data(domain)
          .then(property_account_data => {
              //console.log(property_account_data);
              if (property_account_data) {
                  //get the property id
                  var property_id = property_account_data['properties']['id'];
                  var account_id = property_account_data['account_data']['id'];

                  $('#main_account_id').val(account_id);
                  $('#main_property_id').val(property_id);

                  //get the property artifacts
                  if (page != 'gizzmo-ai-listicle' && page != 'gizzmo-ai-deals' && page != 'gizzmo-ai-gizzmo-posts')
                  {
                    get_artifacts(property_id);

                    get_property_artifacts(property_id);

                    //hide the loading_Modal modal
                    closeModal('loading_Modal');

                    setInterval(() => get_property_artifacts(property_id), 10000);

                    //check session storage for the tones_and_audiences data

                    var tones_and_audiences = sessionStorage.getItem('tones_and_audiences');
                    if (tones_and_audiences == null)
                    {
                      tones_and_audiences = get_tones_and_audiences();

                    }
                    else
                    {
                      //set the tones_and_audiences
                      set_tones_and_audiences(tones_and_audiences);
                    }
                    
                  }
                  else if (page == 'gizzmo-ai-deals')
                  {
                    $('#add_first_deal_bt').attr('data-account_id', account_id);
                    $('#add_first_deal_bt').attr('data-property_id', property_id);

                    $('#add_another_deal_bt').attr('data-account_id', account_id);
                    $('#add_another_deal_bt').attr('data-property_id', property_id);
                    get_account_property_deals_pages(account_id,property_id);


                    //var tones_and_audiences = sessionStorage.getItem('tones_and_audiences');
                    //if (tones_and_audiences == null)
                    //{
                    //  tones_and_audiences = get_tones_and_audiences();

                    //}
                    //else
                    //{
                      //set the tones_and_audiences
                    //  set_tones_and_audiences(tones_and_audiences);
                    //}

                    //hide tab2_lable tab
                    $('#tab2_lable').hide();


                  }
                  else if (page == 'gizzmo-ai-listicle')
                  {
                      
                    var tones_and_audiences = sessionStorage.getItem('tones_and_audiences');
                    if (tones_and_audiences == null)
                    {
                      tones_and_audiences = get_tones_and_audiences();

                    }
                    else
                    {
                      //set the tones_and_audiences
                      set_tones_and_audiences(tones_and_audiences);
                    }

                  }
                  else if (page == 'gizzmo-ai-gizzmo-posts')
                  {
                     
                    get_property_tasks(property_id);
                    //setInterval(() => get_property_tasks(property_id), 10000);
                    //set an interval to get the tasks but give id 
                    check_tasks_interval = setInterval(() => get_property_tasks(property_id), 10000);


                    get_property_archived_posts(property_id);
                    // Refresh data every 10 seconds
                    //check_tasks_interval = setInterval(() => {
                    //  get_property_tasks(property_id);
                    //}, 25000);

                  }
              }

        })
        .catch(error => {
          
            console.log(error);
        });
        //=================end gizzmo connect domain===========



        //=================steps widget================
        //get total number of list items - variable number of items
        //$('.steps-meta #total').text($('.steps-list > li').length)
        $('.steps-widget').on('click', '.btn-next', function(e) {
            e.preventDefault();
            //save reference to parent li for faster performance
            var li = $(this).closest('li');
            //check to see if next li exists
            if ($(li).next('li').length === 0) {
                //alert('Move on to next page or submit form.');

                save_post_task();

                return false;
            }
            //clean up previous li.current
            $(li).prevAll().removeClass('current');
            // move to next step on next button click; add complete class to li
            $(li).addClass('complete').removeClass('active').next('li').addClass('active current');
            //update item index in meta
            //$('.steps-meta #current').text($(li).next('li').index() + 1)
            
        }).on('click', 'li.complete .label, li.current .label', function(e) {
            // open only complete or current li
            e.preventDefault();
            var li = $(this).closest('li');
            $(li).addClass('active').siblings('li.active').removeClass('active')
        })
        //=================end steps widget================



        //=============seo keyphrase================
        $("#key_phrase_input").on("keydown", function(event) {
          if (event.key === ",") {
            event.preventDefault();
          }
        });
        $("#key_phrase_input").on("input", function() {
          var inputValue = $(this).val();
          var words = inputValue.trim().split(/\s+/);
          if (words.length > 6) {
            words = words.slice(0, 6);
            inputValue = words.join(' ');
          }
          var modifiedValue = inputValue.replace(/,/g, ' ');
          modifiedValue = modifiedValue.replace(/  /g, ' ');
          $(this).val(modifiedValue);
        });
        //=============end seo keyphrase================

        
        //=============selected lang================
        selected_language = localStorage.getItem('selected_language');
        if (selected_language != null) {
            $('#languge_slct').val(selected_language);
        }
        $('#languge_slct').change(function(){
            selected_language = $('#languge_slct').val();
            localStorage.setItem('selected_language', selected_language);
        });
        //=============end selected lang================

        if (page == 'gizzmo-ai-listicle')
        {
          //=============images in listicle================
          document.getElementById('images_placeholders').addEventListener('change', function() {
            if (this.checked) {
                document.getElementById('ai_image_generation').checked = false;
            }
            else
            {
              document.getElementById('images_placeholders').checked = true;
            }
          });
          document.getElementById('ai_image_generation').addEventListener('change', function() {
              if (this.checked) {
                  document.getElementById('images_placeholders').checked = false;
              }
              else
              {
                document.getElementById('ai_image_generation').checked = true;
              }
          });
          //=============end images in listicle================
        }



        $('#token').on('click', function() {
          // Get the text inside the span with ID 'token'
          const tokenText = $(this).text();
          // Use the Clipboard API to copy the text
          navigator.clipboard.writeText(tokenText).then(function() {
              // Show an alert with the copied text
              alert("Copied to clipboard: " + tokenText);
          }).catch(function(error) {
              console.error("Could not copy text: ", error);
          });
        });
        
        $('#ext_token').on('click', function() {
          // Get the text inside the span with ID 'token'
          const tokenText = $(this).text();
          // Use the Clipboard API to copy the text
          navigator.clipboard.writeText(tokenText).then(function() {
              // Show an alert with the copied text
              alert("Copied to clipboard: " + tokenText);
          }).catch(function(error) {
              console.error("Could not copy text: ", error);
          });
        });
        





    }(jQuery));

});





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

      //console.log the position of the element that was dragged
      //console.log('dragged to: '+ this.position);
      //console.log the identifier of the element that was dragged
      //console.log('identifier: '+ this.items[this.position].attributes['data-identifier'].value);
      
      

      //roy
      //check if this is the products list
      if (this.list.id == "selected_shared_features_draggable")
      {
        //get_shared_features_list();
      }
      else if (this.list.id == "live_deals_draggable")
      {
          var deals_postions_images = [];
          (function ($) {
            //now go through the changes and update thier positions according to the new positions '#live_deals_draggable .list__item'
            $('#live_deals_draggable .list__item').each(function(){
              var deal_asin_id = $(this).data('identifier');
              var deal_asin_new_position = $(this).index();
              var deal_asin_img = $('#prod_image_' + deal_asin_id).attr('src');
              deals_postions_images.push({"deal_asin": deal_asin_id, "deal_asin_position": deal_asin_new_position, "deal_asin_img": deal_asin_img});
            }
            );
            //update the hidden input with the new changes
            document.getElementById('live_deals_position_changes').value = JSON.stringify(deals_postions_images);
          }(jQuery));



          //$('#save_live_deals_changes').show();
          document.getElementById('save_live_deals_changes').style.display = 'block';

          //get existing list json from the hidden input
          var existing_list_json = document.getElementById('publish_form_deals_json').value;
          var existing_list = JSON.parse(existing_list_json);

          (function ($) {
            //get the list of deals inside live_deals_draggable
             
            var deals_list = [];
            $('#live_deals_draggable .list__item').each(function(){
              var deal_asin = $(this).data('identifier');
              var deal = existing_list.find(x => x.deal_asin === deal_asin);
              deals_list.push(deal);
            });
            //update the hidden input with the new list of deals
            document.getElementById('publish_form_deals_json').value = JSON.stringify(deals_list);

          }(jQuery));



      }
      else
      {
        if (this.list.id == "selected_shared_paragraphs_draggable")
        {
          //it's the listicle paragraphs list
          //get_shared_listicle_pargraphs_list();
        }
        else
        {
          //var identifier = this.items[0].attributes['data-identifier'].value
          //var img_url = this.items[0].attributes['data-img'].value

          //set_featured_image_from_list(identifier,img_url)

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


var page = getPageParameterValue();
if (page == 'gizzmo-ai-products-roundup' )
{
  const sortable = new Sortable(".list");
}
else if (page == 'gizzmo-ai-products-comparison' )
{
  const sortable = new Sortable(".list");
  const sortable4 = new Sortable(".selectedsharedfeatureslist");
}
else if (page == 'gizzmo-ai-listicle' )
{
  const sortable4 = new Sortable(".selectedsharedfeatureslist");
}
else if (page == 'gizzmo-ai-deals' )
{
  const sortable2 = new Sortable(".list");
}


 
  