jQuery(document).ready(function($)
{
  $('a#DiscoveryRingLoadWidget').fancybox(
  {
    width: 880,
    height: 556,
    margin: 0,
    titleShow: false
  });

  $('a#DiscoveryRingLoadWidget').click(function()
  {
    $('#fancybox-wrap').css('z-index', 999999);
  });
});
