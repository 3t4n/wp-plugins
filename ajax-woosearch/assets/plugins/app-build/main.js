( function( $ ) {
  $(window).on('load', function() {
      woos_main_body_class();
      woos_page_name_as_class();
  });
  /**
    * Body Class
    * Feature added by : Joy Shaha <joysaha7302@gmail.com>
    * Date : 21.04.2020
    */
  function woos_main_body_class(){
      $('body').addClass('woos');
      $('body').addClass('woos-desktop-device');
      
  }
    /**
    * Page Name
    * Feature added by : Joy Shaha <joysaha7302@gmail.com>
    * Date : 21.04.2020
    */
  function woos_page_name_as_class() {
      var pageCurrentUrl = window.location.href;
      var removeDomainSegment = pageCurrentUrl.substr(pageCurrentUrl.lastIndexOf('/') + 1);
      var lastSegment = removeDomainSegment.split('.').slice(0, -1).join('.')
      $('.woos-wrapper').addClass('woos-page-'+lastSegment);
  }
  /**
    * Save Setting Data
    * Feature added by : Joy Shaha <joysaha7302@gmail.com>
    * Date : 21.04.2020
    */
 $('#woos_save_setting').on('click', function () {
    var nonce = $('#security_woos').val();
    var serialized_data = $('#woos_form :input[name][name!="security"]').serialize();

    $('#woos_form :input[type=checkbox]').each(function() {     
        if (!this.checked) {
            serialized_data += '&'+this.name+'=0';
        }
    });
    var data = {
      type: 'save_woos_setting',
      action: 'woos_setting_action',
      security: nonce,
      data: serialized_data
    };
    $.post(ajaxurl, data, function (response) {
      if (response == 1) {
        woosNotifyMessage('Option Updated', 'success', 'fa fa-check');
      } else if(response == -1) {
        woosNotifyMessage('Nonce is invalid or Something wrong, try again!', 'danger', 'fa fa-times-circle');
      }else {
        woosNotifyMessage('Something wrong, try again!', 'warning', 'fa fa-warning');
      }
    });
    return false;
  });
  /**
  * Radio 
  * Dependencies   : jquery
  * Feature added by : Joy Shaha <joysaha7302@gmail.com>
  * Date : 25.04.2020
  */
  $('.woos-radio-img-img').click(function(){
    $(this).parent().parent().parent().find('.woos-radio-img-img').removeClass('woos-radio-img-selected');
    $(this).addClass('woos-radio-img-selected');
    $(this).parent().parent().parent().find('.select-image-wrap').removeClass('_woos-radio-img-selected');
    $(this).parent().addClass('_woos-radio-img-selected');
  });
  $('.woos-radio-img-label').hide();
  $('.woos-radio-img-img').show();
  $('.woos-radio-img-radio').hide();
} )( jQuery );
  /**
  * Notify Message Show Function
  * Dependencies   : jquery
  * Feature added by : Joy Shaha <joysaha7302@gmail.com>
  * Date : 21.04.2020
  */
function woosNotifyMessage(message,messageType,icon) {
  jQuery.notify(
    {
      // options
      title: messageType.charAt(0).toUpperCase() + messageType.slice(1),
      message: "<br>" + message,
      icon: icon,
      target: "_blank",

    },
    {
      // settings
      element: "body",
      type: messageType,
      showProgressbar: false,
      placement: {
        from: "top",
        align: "right"
      },
      offset: {
        x:25,
        y:50
      },
      spacing: 10,
      z_index: 1031,
      delay: 3300,
      timer: 1000,
      allow_dismiss: true,
      newest_on_top: false,
      mouse_over: 'pause',
      url_target: "_blank",
      mouse_over: null,
      animate: {
        enter: "animated fadeInDown",
        exit: "animated lightSpeedOut"
      },
      onShow: null,
      onShown: null,
      onClose: null,
      onClosed: null,
      icon_type: "class",
      beforeOpen : function() {
        alert('A notice will be presented.');
      },
    }
  );
};
window.addEventListener("load", function() {
   var tabs = document.querySelectorAll("ul.tabs-nav > li");
    for (var i = 0; i < tabs.length; i++) {
      tabs[i].addEventListener("click",switchTab)
    }
    function switchTab(event){
      event.preventDefault();
      document.querySelector("ul.tabs-nav li.active").classList.remove("active");
      document.querySelector(".tab-pane.active").classList.remove("active")
      var clickedTab = event.currentTarget,
          clickedLinked = event.target.getAttribute("href");
          clickedTab.classList.add("active");
          document.querySelector(clickedLinked).classList.add("active")
    }
});