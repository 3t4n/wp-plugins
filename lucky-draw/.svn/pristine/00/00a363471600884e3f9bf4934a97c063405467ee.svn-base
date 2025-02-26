
$(document).ready(function(){
    $(".LDshortcodeisselected").hide();
    $(".LDpopupisselected").hide();
    $(".LDimageisselected").hide();
    $(".absoluteselected").hide();
    $(".imagepreviewbody").hide();
    $("#LDdrawurlbox").hide();



});
$(".positionfixedshortcodehandw input").change(function(){
    var val6=$("#fixedpositionshortcodeheight").val()+"px";
    var val7=$("#fixedpositionshortcodewidth").val()+"px";
    $(".absolutebox").css('height',val6);
    $(".absolutebox").css('width',val7);
    
    valuedrawfixedheight
    $("#valuedrawfixedheight").val(val6);
    $("#valuedrawfixedwidth").val(val7);
    
    });
    

//Main Menu Buttons
$(".tabcontentinline button").click(function(){

  var oldval=($(this).val());
  var val=($(this).val())+"position";
  $('.tabcontentinline button').removeClass('buttonselected');
  $(this).addClass('buttonselected');
 
  switch(oldval){
    case "shortcode":
    $(".LDshortcodeisselected").show();
    $(".absoluteselected").hide();
    $(".LDpopupisselected").hide();
    $(".LDimageisselected").hide();
    $("#LDdrawurlbox").hide(); 
    $("#LDdrawnamebox").show();
    $("#LDdrawdescbox").show();
    $(".imagepreviewbody").hide();
    $(".shortcodepreviewbody").show();
    $("#valuedrawtype").val("shortcode");
    $(".mainsettingsbox").show();




    break;

    case "image":
      $(".LDshortcodeisselected").hide();
      $(".LDimageisselected").show();
      $(".absoluteselected").hide();
      $(".LDpopupisselected").hide();
      $("#LDdrawurlbox").show(); 
      $("#LDdrawnamebox").hide();
      $("#LDdrawdescbox").hide();
      $(".shortcodepreviewbody").hide();
      $(".imagepreviewbody").show();
      $(".mainsettingsbox").hide();
      $("#valuedrawtype").val("image");


      break;

    case "popup":
      $(".LDshortcodeisselected").hide();
      $(".LDpopupisselected").show();
      $(".absoluteselected").show();
      $("#LDdrawurlbox").hide(); 
      $(".LDimageisselected").hide();
      $("#LDdrawnamebox").show();
      $("#LDdrawdescbox").show();
      $(".shortcodepreviewbody").show();
      $(".imagepreviewbody").hide();
      $("#valuedrawtype").val("popup");
      $(".mainsettingsbox").show();




      break;

    default:
  }
 
});



$("#positionabsolutetrue").change(function() {
    if($("#positionabsolutetrue").is(':checked'))
     {
      $(".absoluteselected").show();
      $(".shortcodepreviewbody").addClass("absolutebox");
      $(".shortcodepreviewbody").css("margin-top","60px");
      $(".shortcodepreviewbody").css("margin-left","410px");
      $("#valuedrawfixed").val("fixed");
  
  
  
  
  
       }else{
        $(".absoluteselected").hide();
        $("#valuedrawfixed").val("");
        $(".shortcodepreviewbody").removeClass("absolutebox");
  
       }
  });
  
  $("#participationmail").change(function() {
    if($("#participationmail").is(':checked'))
     {
      $("#valuedrawparticipationmail").val("sendmail");
       }else{
        $("#valuedrawparticipationmail").val("");
       }
  });
  
  $("#losingmail").change(function() {
    if($("#losingmail").is(':checked'))
     {
      $("#valuedrawlosingnmail").val("sendmail");
       }else{
        $("#valuedrawlosingnmail").val("");
       }
  });
  


//Fixed Position

$("#absolutepositionlocation").change(function(){
    var val=$(this).val();
    
    switch(val){
  
    case "Topleft":
      $(".absolutebox").css('top',"20px");
      $(".absolutebox").css('left',"20px");
      $("#valuedrawfixedposition").val("Topleft");
      break;
  
      case "Topcenter":
      $(".absolutebox").css('top',"20px");
      $(".absolutebox").css('left',"220px");
      $("#valuedrawfixedposition").val("Topcenter");
      break;
  
      case "Topright":
      $(".absolutebox").css('top',"20px");
      $(".absolutebox").css('right',"20px");
      $(".absolutebox").css('left',"auto");
      $("#valuedrawfixedposition").val("Topright");

      break;
  
      case "Bottomleft":
      $(".absolutebox").css('top',"auto");
      $(".absolutebox").css('bottom',"20px");
      $(".absolutebox").css('left',"20px");
      $(".absolutebox").css('right',"auto");
      $("#valuedrawfixedposition").val("Bottomleft");

      break;
  
      case "Bottomcenter":
  
      $(".absolutebox").css('bottom',"20px");
      $(".absolutebox").css('top',"auto");
      $(".absolutebox").css('left',"220px");
      $("#valuedrawfixedposition").val("Bottomcenter");

      break;
  
      case "Bottomright":
      $(".absolutebox").css('bottom',"20px");
      $(".absolutebox").css('top',"auto");
      $(".absolutebox").css('right',"20px");
      $(".absolutebox").css('left',"auto");
      $("#valuedrawfixedposition").val("Bottomright");

  
      break;
  
    
  
  
  }
  
  });
  



  //Display Real Time Data In Preview
$("#Lucky_Draw_Name").bind("change keyup", function(){
    var val = $(this).val();
    $(".shortcodepreviewheader span").html(val);

    $("#valuedrawname").val(val);


});

$("#Lucky_Draw_Desc").keyup(function(){
    var lddesc = $(this).val();
    lddesc=lddesc.replaceAll("{user}", "<Strong>[Username]</strong>");
    lddesc=lddesc.replaceAll("{prize", "<span>");
    lddesc=lddesc.replaceAll("}", "</span>");
    $(".shortcodepreviewdescription ").html(lddesc);
    $("#valuedrawdesc").val(lddesc);

});

$("#LDUurlvalue").change(function(){
    $('#mainpreviewimage').attr('src', $(this).val());
    $("#valuedrawurl").val($(this).val());
  });
  
  $(".prompt").change(function(){
    $("#valuedrawprizesku").val($(this).val());
});



$("#Lucky_Draw_Prize1_Text1").bind("change keyup", function(){
    var val = $(this).val();
    $(".shortcodepreviewdescription span").html(val);

    $("#valuedrawprizetext").val($(this).val());

});




$(document).ready( function () {
    $('#LuckyDrawTable').DataTable();
});
	
$('table.display').DataTable();
//$('#drawdatepick').datepicker({

  
//  format: 'mm/dd/yyyy',
//  startDate: '-3d',
//  minDate: 0
//});

$(document).ready( function () {
  $('#myTable').DataTable();
} );

$("#Mainluckydrawdatepicker").datepicker({
  startDate: '-3d',
  dateFormat: "M d, yy",
  minDate: 0  
});


var countdownInterval; // Declare a global variable to hold the interval ID

function SetTimerForDrawDate(formattedDate) {
  var countDownDate = new Date(formattedDate).getTime();

  // Clear any existing interval before starting a new one
  if (countdownInterval) {
    clearInterval(countdownInterval);
  }

  // Update the count down every 1 second
  countdownInterval = setInterval(function() {
    // Get the current time
    var now = new Date().getTime();

    // Find the distance between current time and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes, and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result in the corresponding elements
    document.getElementById("days").innerHTML = days < 10 ? '0' + days : days;
    document.getElementById("hours").innerHTML = hours < 10 ? '0' + hours : hours;
    document.getElementById("minutes").innerHTML = minutes < 10 ? '0' + minutes : minutes;
    document.getElementById("seconds").innerHTML = seconds < 10 ? '0' + seconds : seconds;

    // If the countdown is finished, display zeroes
    if (distance < 0) {
      clearInterval(countdownInterval);
      document.getElementById("days").innerHTML = "00";
      document.getElementById("hours").innerHTML = "00";
      document.getElementById("minutes").innerHTML = "00";
      document.getElementById("seconds").innerHTML = "00";
    }
  }, 1000);
}

$("#Mainluckydrawdatepicker").on('change', function() {

  var NewdateStr = $(this).val();
  var NewformattedDate = NewdateStr + " 00:00:00"; // Append the time to the date string

  // Call the function with the new formatted date
  SetTimerForDrawDate(NewformattedDate);
  $("#valuedrawdate").val($(this).val());


});

//$("#YesImInButton").click(function(){
//  alert("The paragraph was clicked.");
//});
  $('#registerbuttondisabled').click(function() {
      window.location.href = '../wp-login.php';
      return false;
  });


//Box Settings

$("#boxbackgroundcolor").change(function(){
    $(".shortcodepreviewbody").css('background', $(this).val());
});

$("#boxdividercolor").change(function(){
    $('.dividerbox').css('background-color', $(this).val());
});
$("#boxdividersize").change(function(){
    $('.dividerbox').css('height', $(this).val());
});

$("#boxbordercolor").change(function(){
    $('.shortcodepreviewbody').css('border-color', $(this).val());
});

$("#boxbordersize").change(function(){
    $('.shortcodepreviewbody').css('border-width', $(this).val());
});

$("#borderradius").change(function(){
    var  val="border-radius:"+$(this).val()+"px !important;";
    $('.shortcodepreviewbody').attr('style',val);
});



//Heading Settings
$("#headingbackgroundcolor").change(function(){
    $(".shortcodepreviewheader").css('background-color', $(this).val());
});

$("#headingcolor").change(function(){
    $(".shortcodepreviewheader span").css('color', $(this).val());
});

$("#headingfontsize").change(function(){
    var  val="font-size:"+$(this).val()+"px !important";
    $('.shortcodepreviewheader span').attr('style',val);
});

$(".headingalign button").click(function(){
    $('.headingalign').removeClass('activebtn'); // Remove active class from all buttons
    $(this).addClass('activebtn');
    $(".shortcodepreviewheader span").css("textAlign",$(this).attr("value"));
});

//Description Settings
$("#descriptionbgcolor").change(function(){
    $(".shortcodepreviewdescription").css('background-color', $(this).val());
});

$("#descriptioncolor").change(function(){
    $(".shortcodepreviewdescription ").css('color', $(this).val());
});

$("#descriptionfontsize").change(function(){
    var  val="font-size:"+$(this).val()+"px !important;";

    $('.shortcodepreviewdescription ').attr('style',val);
});

$(".descriptionalign button").click(function(){
    $('.descriptionalign').removeClass('activebtn'); // Remove active class from all buttons
    $(this).addClass('activebtn');
    $(".shortcodepreviewdescription").css("textAlign",$(this).attr("value"));
});

//Prize Settings
$("#prizebgcolor").change(function(){
    $(".shortcodepreviewdescription span").css('background-color', $(this).val());
});

$("#prizecolor").change(function(){
    $(".shortcodepreviewdescription span ").css('color', $(this).val());
});

$("#prizefontsize").change(function(){
    var  val="font-size:"+$(this).val()+"px !important;";
    $('.shortcodepreviewdescription span').attr('style',val);
});

$("#drawdatefontsize").change(function(){
    var  val="font-size:"+$(this).val()+"px !important";
    $('#ShortcodeDateFormat span').attr('style',val);
});

$(".datealign button").click(function(){
    $("#ShortcodeDateFormat span").css("textAlign",$(this).val());
});


//Draw Date Settings
$("#countdownnumberbgcolor").change(function(){
    $(".counter span").css('background-color', $(this).val());
});

$("#countdownnumbercolor").change(function(){
    $(".counter span").css('color', $(this).val());
});

$("#countdowndaysbgcolor").change(function(){
    $(".counter p").css('background-color', $(this).val());
});

$("#countdowndayscolor").change(function(){
    $(".counter p").css('color', $(this).val());
});



//Button Settings
$("#actionbuttontext").keyup(function(){
    $('.shortcodepreviewactionbutton').text($(this).val());
    $('.imageregister-btn').text($(this).val());

});

$("#actionbuttonbgcolor").change(function(){
    $('.shortcodepreviewactionbutton ').css('background-color', $(this).val());
    $('.imageregister-btn').css('background-color', $(this).val());
});

$("#actionbuttoncolor").change(function(){
    $('.shortcodepreviewactionbutton ').css('color', $(this).val());
    $('.imageregister-btn').css('color', $(this).val());
});

$("#actionbuttonborderradius").change(function(){
  var  val="border-radius:"+$(this).val()+"px !important;";
    $('.shortcodepreviewactionbutton ').attr('style',val);
    $('.imageregister-btn').attr('style',val);

});

$("#closebuttoncolor").change(function(){
    $('.fa-xmark').css('color', $(this).val());
});



//Put All Values in a Input And Submit
$("#luckydrawmodalsubmitbutton").click(function(){
   


    //Box Settings
   var val1="background-color:"+$("#boxbackgroundcolor").val()+";";
   var val2=$("#boxbordercolor").val();
   var val3=$("#boxbordersize").val();
   var val4="border:"+val3+"px solid "+val2+";";
   var val5="border-radius:"+$("#borderradius").val()+"px;";
   $("#valuedrawboxstyle").val(val1+val4+val5);

//HeadingBox

   var val1="background-color:"+$("#headingbackgroundcolor").val()+";";
   var val2="color:"+$("#headingcolor").val()+";";
   var val3="font-size:" +$("#headingfontsize").val()+"px;";
   var val4 ="text-align:"+ $('.headingalign .activebtn').val()+";";

   $("#valuedrawboxheading").val(val1+val2+val3+val4);


//Divider Settings

var val1="height:"+$("#boxdividersize").val()+"px;";
   var val2="background:"+$("#boxdividercolor").val()+";";
   $("#valuedrawboxdivider").val(val1+val2);

//Description

var val1="background-color:"+$("#descriptionbgcolor").val()+";";
var val2="color:"+$("#descriptioncolor").val()+";";
var val3="font-size:" +$("#descriptionfontsize").val()+"px;";
var val4 ="text-align:"+ $('.descriptionalign .activebtn').val()+";";

$("#valuedrawdescription").val(val1+val2+val3+val4);

//Prize
var val1="background-color:"+$("#prizebgcolor").val()+";";
var val2="color:" +$("#prizecolor").val()+";";
var val3="font-size:"+$("#prizefontsize").val()+";";
$("#valuedrawprize").val(val1+val2+val3);


//Countdown Number
var val1="background-color:"+$("#countdowndaysbgcolor").val()+";";
var val2="color:" +$("#countdowndayscolor").val()+";";
$("#valuedrawcountdowndays").val(val1+val2);

//Countdown Days
var val1="background-color:"+$("#countdownnumberbgcolor").val()+";";
var val2="color:" +$("#countdownnumbercolor").val()+";";
$("#valuedrawcountdownnumber").val(val1+val2);

//Button Text
var val1=$("#actionbuttontext").val();
$("#valuedrawbuttontext").val(val1);


//Action Settings
var val1="background-color:"+$("#actionbuttonbgcolor").val()+" !important;";
var val2="color:" +$("#actionbuttoncolor").val()+" !important;";
var  val3="border-radius:"+$("#actionbuttonborderradius").val()+"px !important";
$("#valuedrawactionbutton").val(val1+val2+val3);

//Close Button
var val2="color:" +$("#closebuttoncolor").val()+";";
$("#valuedrawclosebutton").val(val2);


//Divider Settings

var val1="height:"+$("#dividersize").val()+";";
var val2="background-color:" +$("#dividercolor").val()+";";
$("#dividersettingsdrawbox").val(val1+val2);


$('#mainForm').submit();


});



