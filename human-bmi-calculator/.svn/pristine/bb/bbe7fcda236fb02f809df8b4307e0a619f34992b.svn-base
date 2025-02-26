jQuery(document).ready(function(){

  jQuery("#heightUnit").change(function(){
  
    var hu = jQuery(this).val();
    if(hu=='inch') 
    {
      jQuery("#heightCm").hide();
      jQuery(".heightinch").show();
    }
    else 
    {
        jQuery(".heightinch").hide();
        jQuery("#heightCm").show();
    }
  
  });
  
  jQuery("#bmi_result").click(function(){
  
      var hu = jQuery("#heightUnit").val();
      var wu = jQuery("#weight_unit").val();
  
      if(wu=='kg')
          var wv = parseInt(jQuery("#valWeight").val());
      else
          var wv = parseInt(jQuery("#valWeight").val()*0.45359237);
  
      if(hu=='inch') 
      {
          var Inch = parseInt(jQuery("#valFeet").val()*12)+parseInt(jQuery("#valInch").val());
          var Cent = parseInt(Inch*2.54); 
      }
      else
      {
           var Cent = jQuery("#heightCm").val();
      }
  
      var bmi_score = [wv/Cent/Cent]*10000;
      bmi_score = bmi_score.toFixed(1);
      var msg = "Something went wrong! Please enter values properly."
      
      if (bmi_score <= 18.5) {
          msg = "Your BMI  is "+bmi_score+" which is considered as <b class='redtxt'>Underweight</b>.";
        } else if (bmi_score > 18.5 && bmi_score <= 24.9) {
          msg = "Your BMI  is "+bmi_score+" which is considered as <b class='greentxt'>Healthy Weight</b>.";
        } else if (bmi_score > 24.9 && bmi_score < 30) {
          msg = "Your BMI  is "+bmi_score+" which is considered as <b class='yellowtxt'>Overweight</b>.";
        } else {
          msg = "Your BMI  is "+bmi_score+" which is considered as <b class='redtxt'>Obesity</b>.";
        }
  
        if(isNaN(wv) || wv==0) msg = "Please enter value for weight.";
        if(Cent==0)  msg = "Please enter value for height.";
        
  
      jQuery(".bmi_message").html(msg);
      jQuery(".bmi_message").fadeIn();
  
  });
  
  
  });