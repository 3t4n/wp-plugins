function rmySpecificdays(date) {
    const rdatedData = [];
    return rdatedData.includes(date.toISOString().substring(0, 10));
}

function rmydayspick(date) {
    disable_days = jQuery("#bp-woopick-pickup_date_field").data("unableweekdays");
    if( disable_days!== undefined && disable_days.length > 0 ){
      arrUnableDays = disable_days.split(',');
      return ( arrUnableDays.indexOf( date.getDay()+'' ) > -1 )
    }else{
      return false;
    }
}

function rmydaysdelivery(date) {
    disable_days = jQuery("#bp-woopick-delivery_date_field").data("unableweekdays");
    if( disable_days!== undefined && disable_days.length > 0 ){
      arrUnableDays = disable_days.split(',');
      return ( arrUnableDays.indexOf( date.getDay()+'' ) > -1 )
    }else{
      return false;
    }
}

function getLocale(){
  var def = 'default';
  locale_config = jQuery("#bp-woopick-general_field").data("general_locale");
  if( undefined !== locale_config && locale_config.length > 0 ){
    return locale_config;
  }
  return def;
}
function getDtformat(){
  var def = 'm-d-Y';
  locale_config = jQuery("#bp-woopick-general_field").data("general_dtformat");
  if( undefined !== locale_config && locale_config.length > 0 ){
    return locale_config;
  }
  return def;
}


window.onload = function() {

    getlocale = getLocale();
    getDtformat = getDtformat();
    jQuery("#bp-woopick-pickup_date_field").flatpickr({
        enableTime: false,
        inline: false,
        dateFormat: getDtformat,
        minDate: new Date(),
        disable: [ rmydayspick ],
        locale: getlocale
      });

    jQuery("#bp-woopick-delivery_date_field").flatpickr({
          enableTime: false,
          inline: false,
          dateFormat: getDtformat,
          minDate: new Date(),
          disable: [rmydaysdelivery],
          locale: getlocale
        });


};
