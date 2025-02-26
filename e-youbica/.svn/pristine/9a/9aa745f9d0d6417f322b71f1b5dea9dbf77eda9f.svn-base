jQuery( function( $ ) {
  
    var params = new window.URLSearchParams(window.location.search);
    if(params.get('youbica')){
      $('.modal_youbica').toggleClass('is-visible');
    } 
    $("#loginYoubica").submit(function (event) {   
      $(".alert").remove();
      var formData = {
        email: $("#loginYoubica #email").val(),
        password: $("#loginYoubica #password").val(),
        user: user_id.current_user
      };

      $.ajax({
        type: "POST",
        url: user_id.rest_url+"youbica/login",
        data: formData,
        dataType: "json",
        encode: true,
      }).done(function (data) {
        console.log(data);
        if(data['status'] == "success" && data['login'] == "usuario") {  
          document.cookie = "token_user_youbica="+data['token']+"; expires=0;";
          document.cookie = "name_user_youbica="+data['user']['nombreCuenta']+"; expires=0;";  
          document.cookie = "id_user_youbica="+data['user']['id']+"; expires=0;";
          if(data['user']['foto_perfil']){
            document.cookie = "avatar_user_youbica="+data['user']['foto_perfil']+"; expires=0;";
          }
           
          $(".login").addClass("login-disabled");
          var separator = (window.location.href.indexOf("?")===-1)?"?":"&";
          window.location.href = window.location.href + separator + "youbica=true";
        }  else {
          if(data['status'] == "fail" && data['message'] == 'Usuario o contraseña incorrecta.') {
            $('.error_user').remove();
            $(".login").append(
              '<div class="alert error_user">' + data['message'] + "</div>"
            );
          }
          if(data['status'] == "success" && data['login'] == "registro") {
            $('.error_user').remove();
            $(".login").append(
              '<div class="alert error_user">Usuario o contraseña incorrecta</div>'
            );
          }
        } 
  
      });
    
      event.preventDefault();
    });
    $("#tags").autocomplete({
      
      source:function(request,response){
        $.ajax({
          url: user_id.rest_url+"youbica/amigos",
          type:"POST",
          dataType:"json",
          data:{
            
              token: user_id.token,
              nombre: document.getElementById('tags').value 
          },
          
          success:function(data){    
            response($.map(data, function (item) {
              return {
                  label: item.nombreUsuario,
                  id: item.id
              }
            }));
          }
            
        })
      },
      select: function(event, ui) {  
          $("input[name=user_id_youbica]").val(ui.item.id);  
          $("input[name=_youbica_user_id_remitente]").val(getCookie('id_user_youbica')); 
          $("input[name=_youbica_user_token]").val(getCookie('token_user_youbica')); 
          $("#ship-to-different-address-checkbox").prop("checked", false);
          $(".shipping_address").css("display", "none");
          $("#ship-to-different-address").css("display", "none");
          $(".confirm-youbica ").css("display", "inline");
          $('.added').remove();
          $(".ui-widget").append(
            '<div class="added" style="font-size: 18px; padding: 10px; color: #777;">Envio de regalo a: ' + ui.item.label + "</div>"
          );
          $('.confirm_regalo').remove();
          $(".woocommerce-billing-fields").append(
            
            '<div class="confirm_regalo"><img alt="e-Youbica logo" src="https://e-youbica.com/assets/img/logo-color.svg" class="logo" width="150">Estás enviando este artículo a '+ ui.item.label +' con e-youbica. ¡Enhorabuena por hacer feliz a otra persona!</div>'
          );
           
          $( document.body ).trigger( 'update_checkout' );
      },
      search: function () {
        $("#loading1").addClass("isloading");
      },
      response: function () {
          $("#loading1").removeClass("isloading");
      }
    });
    $('.modal-toggle').on('click', function(e) {
      e.preventDefault();
      $('.modal_youbica').toggleClass('is-visible');
    });
    $('.btn-youbica-copy').on('click', function(e) {
      navigator.clipboard.writeText("https://e-youbica.com/register");
    });
    $('.btn-logout').on('click', function(e) {
      
        document.cookie = "token_user_youbica" + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
        document.cookie = "name_user_youbica" + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
        document.cookie = "id_user_youbica" + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';  
        document.cookie = "avatar_user_youbica" + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';  
        window.location.href = window.location.href;
      
    });

    /*$(window).bind('load', function(){
      navigator.sendBeacon(user_id.base_url+"/index.php/wp-json/youbica/clear-aux-address", {});
    });*/
    
    function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for(var i=0;i < ca.length;i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1,c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
        }
        return null;
    }
  });
  