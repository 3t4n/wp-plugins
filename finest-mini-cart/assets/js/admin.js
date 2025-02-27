$(function() {
    $('.fmc-tabs-nav a').click(function() {

      // Check for active
      $('.fmc-tabs-nav a').removeClass('active');
      $(this).addClass('active');

      // Display active tab
      let currentTab = $(this).attr('href');
      $('.tabs-content div.single-tab').hide();
      $(currentTab).show();

      return false;
    });

  });