jQuery( document ).ready(function() {
    // console.log( "calc-ready!" );
  // load_result();
    jQuery(".cfw_calc_message").hide();
    jQuery(".cfw_errormessage").hide();
    jQuery(".wpb_schedule_content").hide();

    jQuery('ul.nav-tab-wrapper li').click(function(){
        var tab_id = jQuery(this).attr('data-tab');
        jQuery('ul.nav-tab-wrapper li').removeClass('nav-tab-active');
        jQuery('.tab-content').removeClass('current');
        jQuery(this).addClass('nav-tab-active');
        jQuery("#"+tab_id).addClass('current');
    });
    
    jQuery( "#calculatebtn" ).click(function() {
      // var wpb_gender = jQuery('#wpb_gender').find(":selected").val();
      var wpb_gender = jQuery("input[name='wpb_gender']:checked").val();
      // console.log(wpb_gender);
      var cfw_age = jQuery("#cfw_age").val();
      var cfw_weight = jQuery("#cfw_weight").val();
      var cfw_height = jQuery("#cfw_height").val();
      var cfw_activity = jQuery("input[name='cfw_activity']:checked").val();
      var mild_Deficit = 250;
      var weight_Deficit = 500;
      var extrem_weight_Deficit = 1000;

      if (wpb_gender === "male") {
        var cfw_male = 10 * cfw_weight + 6.25 * cfw_height - 5 * cfw_age + 5;
        var calorieNeeds = Math.round(cfw_male * cfw_activity).toFixed(2); 
        var mild_loss = Math.round((cfw_male * cfw_activity) - mild_Deficit).toFixed(2);
        var weight_loss = Math.round((cfw_male * cfw_activity) - weight_Deficit).toFixed(2);
        var extrem_weight_loss = Math.round((cfw_male * cfw_activity) - extrem_weight_Deficit).toFixed(2);
        var mild_gain = Math.round((cfw_male * cfw_activity) + mild_Deficit).toFixed(2);
        var weight_gain = Math.round((cfw_male * cfw_activity) + weight_Deficit).toFixed(2);
        var extrem_weight_gain = Math.round((cfw_male * cfw_activity) + extrem_weight_Deficit).toFixed(2);
      } else {
        var cfw_female = 10 * cfw_weight + 6.25 * cfw_height - 5 * cfw_age - 161;
        var calorieNeeds = Math.round(cfw_female * cfw_activity).toFixed(2); 
        var mild_loss = Math.round((cfw_female * cfw_activity) - mild_Deficit).toFixed(2);
        var weight_loss = Math.round((cfw_female * cfw_activity) - weight_Deficit).toFixed(2);
        var extrem_weight_loss = Math.round((cfw_female * cfw_activity) - extrem_weight_Deficit).toFixed(2);
        var mild_gain = Math.round((cfw_female * cfw_activity) + mild_Deficit).toFixed(2);
        var weight_gain = Math.round((cfw_female * cfw_activity) + weight_Deficit).toFixed(2);
        var extrem_weight_gain = Math.round((cfw_female * cfw_activity) + extrem_weight_Deficit).toFixed(2);
      }

      if(cfw_age == '' || cfw_weight == '' || cfw_height == ''){
        jQuery(".cfw_calc_message").html('You burn '+ 0 + ' calories during a typical day.').show();
        jQuery("#cfw_maintain_loss_message").html(0);
        jQuery("#cfw_mild_weight_loss").html(0);
        jQuery("#cfw_weight_loss").html(0);
        jQuery("#cfw_ext_weight_loss").html(0);

        jQuery("#cfw_maintain_gain_message").html(0);
        jQuery("#cfw_mild_weight_gain").html(0);
        jQuery("#cfw_weight_gain").html(0);
        jQuery("#cfw_ext_weight_gain").html(0);
        jQuery(".wpb_schedule_content").show();
      }else{
        jQuery(".cfw_calc_message").html('You burn '+ calorieNeeds + ' calories during a typical day.').show();
        jQuery("#cfw_maintain_loss_message").html(calorieNeeds);
        jQuery("#cfw_mild_weight_loss").html(mild_loss);
        jQuery("#cfw_weight_loss").html(weight_loss);
        jQuery("#cfw_ext_weight_loss").html(extrem_weight_loss);

        jQuery("#cfw_maintain_gain_message").html(calorieNeeds);
        jQuery("#cfw_mild_weight_gain").html(mild_gain);
        jQuery("#cfw_weight_gain").html(weight_gain);
        jQuery("#cfw_ext_weight_gain").html(extrem_weight_gain);
        jQuery(".wpb_schedule_content").show();
      }
     
    });

});