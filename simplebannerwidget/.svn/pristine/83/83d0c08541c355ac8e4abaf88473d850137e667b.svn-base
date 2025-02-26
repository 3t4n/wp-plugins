jQuery(document).ready(function($) {
  var simpleBanners = []
  var items = $(document).find('.simple-banner-widget')
  for (var i = 0; i < items.length; i++) {
    simpleBanners[i] = new SimpleBannerWidget(items[i].id)

    var data = $("#" + items[i].id).find('.data').val()
    if (data) {
      simpleBanners[i].viewDisplay(JSON.parse(data), $("#" + items[i].id).find('.view'))
    }
  }


  //データの保存時
  $('body').ajaxSuccess(function(evt, request, settings) {
    if (~settings.data.indexOf('simple-banner-widget')) {
      var items = $(document).find('.simple-banner-widget')
      for (var i = 0; i < items.length; i++) {
        simpleBanners[i] = new SimpleBannerWidget(items[i].id)
        var data = $("#" + items[i].id).find('.data').val()
        if (data) {
          simpleBanners[i].viewDisplay(JSON.parse(data), $("#" + items[i].id).find('.view'))
        }
      }
    }
  });
});
