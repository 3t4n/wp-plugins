function acip_open_radio(tabName) {
  // Declare all variables
  var i, acip_radioContent, acip_radiolinks;
  // Get all elements with class="radioCcontent" and hide them
  acip_radioContent = document.getElementsByClassName("acip_radioContent");
  for (i = 0; i < acip_radioContent.length; i++) {
    acip_radioContent[i].style.display = "none";
  }
  // Get all elements with class="radiolinks" and remove the class "active"
  acip_radiolinks = document.getElementsByClassName("acip_radiolinks");
  for (i = 0; i < acip_radiolinks.length; i++) {
    acip_radiolinks[i].className = acip_radiolinks[i].className.replace(" active", "");
  }
  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(tabName).style.display = "block";
}
function acip_open_tab(evt, tabName) {
  // Declare all variables
  var i, acip_tabcontent, acip_tablinks;
  // Get all elements with class="tabcontent" and hide them
  acip_tabcontent = document.getElementsByClassName("acip_tabcontent");
  for (i = 0; i < acip_tabcontent.length; i++) {
    acip_tabcontent[i].style.display = "none";
  }
  // Get all elements with class="tablinks" and remove the class "active"
  acip_tablinks = document.getElementsByClassName("acip_tablinks");
  for (i = 0; i < acip_tablinks.length; i++) {
    acip_tablinks[i].className = acip_tablinks[i].className.replace(" active", "");
  }
  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
  jQuery('#designSuccessAl').removeClass('acip_success');
}
function newEstab() {
  var count = jQuery('.estabCount').length + 1;
  jQuery('#multiEstab').append("<label class='estabCount'>Property " + count + ":</label>" +
  "<input id='codecon" + count + "' name='codecon" + count + "' type='text' required='' placeholder='Webcode'>" +
  "<input id='nomcon" + count + "' name='nomcon" + count + "' type='text' required='' placeholder='Name'>");
}
function remNewEstab() {
  var count = jQuery('.estabCount').length;
  if (count !== 1) {
    jQuery("#codecon" + count).remove();
    jQuery("#nomcon" + count).remove();
    jQuery('.estabCount:last-child').remove();
  }
}
function acip_replaceCurrTable() {
  var htmlMulti = '';
  var count = jQuery('.estabCount').length;
  var estCodeArray = new Array();
  var estNomArray = new Array();
  var opcionArray = '';
  var i = 0;
  var e = 1;
  if (jQuery("#codecon1").val().length <= 0 || jQuery("#nomcon1").val().length <= 0 || /^[a-zA-Z]+$/.test(jQuery('#codecon1').val())) {
    jQuery('#acip_alertInput').css('height', '36px');
    jQuery('#acip_alertInput').css('opacity', '1');
    setTimeout(function () {
      jQuery('#acip_alertInput').css('height', '0');
      jQuery('#acip_alertInput').css('opacity', '0');
    }, 3000);
  } else {
    jQuery('#acip_alertInput').css('height', '0');
    jQuery('#acip_alertInput').css('opacity', '0');
    while (i < count) {
      estCodeArray[i] = jQuery("#codecon" + e).val();
      estNomArray[i] = jQuery("#nomcon" + e).val();
      if (jQuery("#codecon" + e).val().length <= 0 || jQuery("#nomcon" + e).val().length <= 0) {
      } else {
        opcionArray += "<option value='https://avirato.com/motor_reservas/reserva_online.php?code=" + estCodeArray[i] + "'>" + estNomArray[i] + "</option>";
      }
      i++;
      e++;
      if (jQuery("#codecon" + i).val().length <= 0 || jQuery("#nomcon" + i).val().length <= 0) {
      } else {
        htmlMulti = "<form id='form_avirato' action='https://avirato.com/motor_reservas/reserva_online.php?code=" + estCodeArray[0] + "' target='_blank' method='POST' ><div class='orig'><select name='hotel' class='select_apart' >" + opcionArray + "</select></div>";
      }
    }
  }
  jQuery('#acip_noShow').html(htmlMulti);
};
function acip_replaceCurrTable1() {
  if (jQuery("#codecon").val().length <= 0 || jQuery("#calName").val().length <= 0) {
    jQuery('#acip_alertInput1').css('height', '36px');
    jQuery('#acip_alertInput1').css('opacity', '1');
    setTimeout(function () {
      jQuery('#acip_alertInput1').css('height', '0');
      jQuery('#acip_alertInput1').css('opacity', '0');
    }, 3000);
  } else {
    jQuery('#acip_alertInput1').css('height', '0');
    jQuery('#acip_alertInput1').css('opacity', '0');
  }
}
function acip_replaceCurrTable2() {
  var htmlMulti = '';
  if (jQuery("#codeconS").val().length <= 0 || jQuery("#nomconS").val().length <= 0 || /^[a-zA-Z]+$/.test(jQuery('#codeconS').val())) {
    jQuery('#acip_alertInput').css('height', '36px');
    jQuery('#acip_alertInput').css('opacity', '1');
    setTimeout(function () {
      jQuery('#acip_alertInput').css('height', '0');
      jQuery('#acip_alertInput').css('opacity', '0');
    }, 3000);
  } else {
    jQuery('#acip_alertInput').css('height', '0');
    jQuery('#acip_alertInput').css('opacity', '0');

    if (jQuery("#codeconS").val().length <= 0 || jQuery("#nomconS").val().length <= 0) {
    } else {
      htmlMulti = "<form id='form_avirato' action='https://avirato.com/motor_reservas/reserva_online.php?code=" + jQuery("#codeconS").val() + "' target='_blank' method='POST' >";
    }

  }
  jQuery('#acip_noShow').html(htmlMulti);
}

//function acip_replaceCurrTable1() {
//    if (jQuery("#codecon").val().length <= 0 || jQuery("#usercon").val().length <= 0 || jQuery("#calName").val().length <= 0) {
//        jQuery('#acip_alertInput1').css('height', '36px');
//        jQuery('#acip_alertInput1').css('opacity', '1');
//    } else {
//        jQuery('#acip_alertInput1').css('height', '0');
//        jQuery('#acip_alertInput1').css('opacity', '0');
//
//    }
//}
//
//jQuery(document).ready(function () {
//    jQuery("#estilocon").change(function () {
//        jQuery("select[name='acip_aviratoCalendar_type_value']").val(jQuery("#estilocon").val());
//    });
//}
//);

function val() {
  d = document.getElementById("zonaSelect").value;
  bd = document.getElementById("catSelect");
  bd.classList.add("animationSelect");
  setTimeout(function(){
    jQuery(bd).removeClass('animationSelect');
    //....and whatever else you need to do
  }, 520);
  bda = bd.getElementsByTagName('option');
  for(i =0;i<bda.length;i++){
    if(bda[i].className !== d && d !== 'all' ){
      bda[i].style.display = 'none';
    }else{
      bda[i].style.display = 'block';
    }
  }
}
jQuery(document).ready(function () {
  jQuery(".acipCaledit").click(function () {
    jQuery(this).parents('tr').next('.caleRow').slideToggle();
  });
});
