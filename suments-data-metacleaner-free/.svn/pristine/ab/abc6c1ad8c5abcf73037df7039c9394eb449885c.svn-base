(function ($) {
  "use strict";

  $(function () {

    $('#config_auto').click(function(){
    
      $.ajax({
        type: "post",
        dataType: "json",
        url: myAjax.ajaxurl,
        data: {
          action: "config_update_automatic",
        },
        success: function () {
          location.reload();
          }
      });
    });

    $("#showerror").on('click' , function() {
        alert('Please provide a valid token.');
    })

    $("#convert").on("click", function () {

      var user_confirmed = confirm("Esta operación va a modificar fuerttus archivos. Te recomendamos que hagas una copia de seguridad de tus archivos. ¿Deseas continuar? \n ");

      if (user_confirmed == false) {
        return
      }
      
      $(".errorlog").css("display", "none");
      var directory = $("#directory").val();

      if(!s_isvalid_token()){
        return
      }
      if (!s_check_value_selected(directory)) {
        return;
      }


      document.getElementById("mc_processing_gif").style.display = "block";

      var nonce = $(this).attr("data-nonce");

      $.ajax({
        type: "post",
        dataType: "json",
        url: myAjax.ajaxurl,
        data: {
          action: "directory_files_connvert",
          directory: directory,
          nonce: nonce,
        },
        success: function (response) {
          document.getElementById("mc_log_summary").style.display = "block";

          document.getElementById("mc_processing_gif").style.display = "none";

          $(".log_success_n").text(
            "✔ ¡Archivos limpiados con éxito! (" + response.success.length + ")"
          );
          $(".log_traffic_n").text(
            "✗ Tráfico excedido (" + response.traffic_exceeded.length + ")"
          );
          $(".log_filesize_n").text(
            "✗ Superan el tamaño de archivo de tu plan (" +
              response.filesize_exceeded.length +
              ")"
          );
          $(".log_extension_n").text(
            "✗ Tipo de archivo no soportado(" +
              response.extension_not_supported.length +
              ")"
          );

          $(".log_success_files").html(s_format_list(response.success));
          $(".log_traffic_files").html(
            s_format_list(response.traffic_exceeded)
          );
          $(".log_filesize_files").html(
            s_format_list(response.filesize_exceeded)
          );
          $(".log_extension_files").html(
            s_format_list(response.extension_not_supported)
          );
        },
      });
    });

    $("#mc_ajax_save_token").click(function () {

      if(!s_isvalid_token()){
        return
      }

      $.ajax({
        type: "post",
        url: myAjax.ajaxurl,
        dataType: "json",
        data: {
          action: "mc_save_token",
          input_token: $("#mc_token").val(),
        },
        success: function () {
          document.getElementById("token_saved_success").style.display = "block";
          location.reload();
        },
        error: function () {
          document.getElementById("token_saved_fail").style.display = "block";
        },
      });
    });

    jQuery(document).on("click", " #mc_ajax_delete_token ", function () {

      jQuery.ajax({
        type: "post",
        url: myAjax.ajaxurl,
        dataType: "json",
        data: {
          action: "mc_delete_token",
          test: 'test',
        },
        success: function () {
          location.reload();
        },
        error: function () {
          console.log('not-working');
        },
      });
    });
  
    
    jQuery(document).on("click", " #contact_submit_mail ", function (event) {
      // event.preventDefault();

      if ($("input[name='contact_email']").val() != '' && $("textarea[name='contact_msg']").val() != '') {
        event.preventDefault();   
        let contact_email = $("input[name='contact_email']").val();
        let contact_msg = $("textarea[name='contact_msg']").val();

        
        jQuery.ajax({
          type: "post",
          url: myAjax.ajaxurl,
          dataType: "json",
  
          data: {
            action: "mc_contact_mail",
            email: contact_email,
            msg: contact_msg,
          },
          success: function (data) {
            console.log(data);
            if(data === 1){
              $('#contact_form_msg').empty();
              $('#contact_form_msg').append('Email has sent successfully.');
              $('.contact_form_msg_outer').css('background','#00800033');
              $('.contact_form_msg_outer').show();
            }else{
              $('#contact_form_msg').empty();
              $('#contact_form_msg').append('Email not sent.');
              $('.contact_form_msg_outer').css('background','#ff00005c');
              $('.contact_form_msg_outer').show();
            }
            // location.reload();
          },
          error: function (error) {
            $('#contact_form_msg').empty();
            $('#contact_form_msg').append('Email not sent.');
            $('.contact_form_msg_outer').css('background','#ff00005c');
            console.log('not-working',error);
            $('.contact_form_msg_outer').show();
          },
        }); 
      }else{
        $('#contact_form_msg').empty();
        $('#contact_form_msg').append('Email and message are not filled correctly');
        $('.contact_form_msg_outer').css('background','#ff00005c');
      }
    });
  
    $("#directory").on("change", function () {
      var value = $("#directory").val();
      s_check_value_selected(value);
    });
  });

  function s_isvalid_token(){

    var n_token = $("#mc_token").val().length
    if (n_token == 32){
      return true
    }else if (n_token == 0){
      document.getElementById("token_error_empty").style.display = "block";
      return false
    }else if (n_token != 32){
      document.getElementById("token_error_length").style.display = "block";
      return false
    }

  }

  function s_format_list(myArray) {
    var html_list = "<ul>";
    for (var i = 0; i < myArray.length; i++) {
      html_list = html_list + "<li>" + myArray[i] + "</li>";
    }
    return html_list + "</ul>";
  }

  function s_check_value_selected(value) {
    if (value == "not_valid") {
      $(".errorlog").css("display", "block");
      $(".error").html("<h4>La opción seleccionada no es válida.</h4>");
      return false;
    } else {
      return true;
    }
  }

  // start tabs

  function handleChange(src) {
   
    var data_file= src.val();
    
       if(data_file){
          //document.getElementById("file_name").placeholder = data_file;
          document.getElementById("directory").setAttribute('value', data_file);
       }   
    }

    $(document).on("click", ".tablinks" ,function() {
      var btnTarget = $(this);
      var country = btnTarget.data("country");

      $(".tabcontent").removeClass("active");
      $(".tablinks").removeClass("active");

      $("#" + country).addClass("active");
      btnTarget.addClass("active");
    });

    $(document).on("click", ".delete_confirm_btn" ,function() {
      delete_confirm();
    });
    $(document).on("click", ".delete_close_btn" ,function() {
      delete_close();
    });
    $(document).on("click", ".delete_token_btn" ,function() {
      delete_token();
    });
    
    $(document).on("change", ".handleChange_btn" ,function() {
      handleChange($(this));
    });
  // end tabs
    
    function delete_confirm(){    
    document.getElementById("modal_outer1").style.display = 'block'; 
    }
    function delete_close(){
    document.getElementById("modal_outer1").style.display = 'none';
    }
    function delete_token(){
    
    
    document.getElementById("modal_outer1").style.display = 'none';
    
    var currentUrl = window.location.href;
    var newUrl = currentUrl + "&delete_token=data";
    window.location.href = newUrl;
    
    }
    
  
    
})(jQuery);
