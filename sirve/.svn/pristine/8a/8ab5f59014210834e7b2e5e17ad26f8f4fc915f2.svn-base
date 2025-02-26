(function ($) {
  "use strict";
  sirvePagination();

  // Ajax All Search request
  $(document).ready(function () {
    $(".sirve__search-input").keyup(function (e) {
      var $this = $(this);
      clearTimeout($.data(this, "timer"));
      if (e.keyCode == 13) {
        doSearch($this);
      } else {
        doSearch($this);
        $(this).data("timer", setTimeout(doSearch, 100));
      }
    });
    
    // Ajax Catagory Search request
    $(".sirve__nav-tabs li").on("click", function () {
      document.getElementById("sirve__search-input-field").value = "";
      // Sirve Event
      var sirveevent = $(this).find("button").data("sirveevent");
      // Sirve Category
      var sirveCategorie = $(this).find("button").data("category");
      //Shortcode attributes
      var options = $(this).closest('.sirve__container').data('sirveoptions');
      //Tags
      var sirveTags = $(this).find("button").data("sirvetags");
      
      $.ajax({
        url: sirve.ajaxurl,
        data: {
          action: "sirve_category_search",
          sirveCategorie: sirveCategorie,
          sirveevent: sirveevent,
          sirveTags: sirveTags,
          options: options,
          nonce: sirve.ajaxnonce,
        },
        beforeSend: function () {
          $(".sirve__body").addClass("beforeLoader");
          $(".sirve-loader").addClass("sirve-after-loader");
        },
        success: function (response) {
          $(".sirve-ajax-search").html(response);
          sirvePagination();
          $(".sirve__body").removeClass("beforeLoader");
          $(".sirve-loader").removeClass("sirve-after-loader");
        },
        error: function (errorThrown) {
          console.log(errorThrown);
        },
      });
    });

    // Listing Pagination
    $(document).on("click", ".sirve-pagination a", function () {
      // Shortcode Attributes
      var options = $(this).closest('.sirve__container').data('sirveoptions'); 
      // Key
      var sirvekey = $(this).data().sirvekey;
      // Event
      var sirveevent = $(this).data().sirveevent ?? '';
      //Tags
      var sirveTags = '';
      if($('.sirve-pagination a').length) {
        sirveTags = $('.sirve-pagination a')[0].dataset.sirvetags;
        sirveTags = (sirveTags != undefined) ? jQuery.parseJSON(sirveTags) : '';
      }
      //Page Number 
      var page = $(this).data().page;

      $.ajax({
        url: sirve.ajaxurl,
        data: {
          action: "sirve_category_search",
          sirveCategorie: sirvekey,
          sirveevent: sirveevent,
          sirveTags:sirveTags,
          page: page,
          options: options,
          nonce: sirve.ajaxnonce,
        },
        beforeSend: function () {
          $(".sirve__body").addClass("beforeLoader");
          $(".sirve-loader").addClass("sirve-after-loader");
        },
        success: function (response) {
          $(".sirve-ajax-search").html(response);
          $(".sirve-ajax-search").addClass("sirve__row");
          sirvePagination();

          $(".sirve-loader").removeClass("sirve-after-loader");
          $(".sirve__body").removeClass("beforeLoader");
        },
        error: function (errorThrown) {
          console.log(errorThrown);
        },
      });
    });

    //Sirve Search Pagination
    $(document).on("click", ".sirve-search-pagination a", function () {
      // Event
      var sirveevent = $('.sirve__nav-link')[0].dataset.sirveevent;
      // catagory
      var sirvekey = $(this).data().sirvekey;

      var sirveTags = $('.sirve__nav-link')[0].dataset.sirvetags;
      sirveTags = (sirveTags != undefined) ? jQuery.parseJSON( $('.sirve__nav-link')[0].dataset.sirvetags) : '';

      var page = $(this).data().page;
      $.ajax({
        url: sirve.ajaxurl,
        data: {
          action: "sirve_search",
          page: page,
          s: sirvekey,
          sirveevent : sirveevent,
          sirveTags : sirveTags,
          nonce: sirve.ajaxnonce,
        },
        beforeSend: function () {
          $(".sirve__body").addClass("beforeLoader");
          $(".sirve-loader").addClass("sirve-after-loader");
        },
        success: function (response) {
          $(".sirve-ajax-search").html(response);
          $(".sirve-ajax-search").addClass("sirve__row");
          sirvePagination();
          $(".sirve-loader").removeClass("sirve-after-loader");
          $(".sirve__body").removeClass("beforeLoader");
        },
        error: function (errorThrown) {
          console.log(errorThrown);
        },
      });
    });
  });

  //sirve Pagination
  function sirvePagination() {
    $(".sirve-ajax-search").on( "click", ".ajaxpagination a", function (event) {
        event.preventDefault();

        var link = $(this).attr("href");
        $(".sirve-ajax-search").addClass("loading");

        $(".sirve-ajax-search").load(link + " .ajaxcontent", function () {
          $(".sirve-ajax-search").removeClass("loading");
        });
      }
    );
  }

  //Sirve Search
  function doSearch($this = "") {
    if ($this.length > 0) {
      var searchString = $this.val();
      $(".sirve__nav-link").removeClass("active");
      $(".scarch-item").addClass("active");

      var sirveevent = $('.sirve__nav-link')[0].dataset.sirveevent;
      var sirveTags = $('.sirve__nav-link')[0].dataset.sirvetags;
      sirveTags = (sirveTags != undefined) ? jQuery.parseJSON( $('.sirve__nav-link')[0].dataset.sirvetags) : '';
      
      if(searchString == ''){
        // var sirveevent = $('.sirve__nav-link')[0].dataset.sirveevent;
        allListing_search(searchString, sirveevent, sirveTags);
      }
      //wasn't enter, not < 3 char
      if ( searchString.length >= 3 ){
        // var sirveevent = $('.sirve__nav-link')[0].dataset.sirveevent;
        allListing_search(searchString, sirveevent, sirveTags);
      }
    }
  }

  function allListing_search(searchString, sirveevent, sirveTags){
    
    $.ajax({
      url: sirve.ajaxurl,
      data: {
        action: "sirve_search",
        s: searchString,
        sirveevent : sirveevent,
        sirveTags : sirveTags,
        nonce: sirve.ajaxnonce,
      },
      beforeSend: function () {
        $(".sirve__body").addClass("beforeLoader");
        $(".sirve-loader").addClass("sirve-after-loader");
      },
      success: function (response) {
        $(".sirve-ajax-search").html(response);
        $(".sirve-ajax-search").addClass("sirve__row");

        sirvePagination();
        $(".sirve-loader").removeClass("sirve-after-loader");
        $(".sirve__body").removeClass("beforeLoader");
      },
      error: function (errorThrown) {
        console.log(errorThrown);
      },
    }).done(function (response) {});
  }


  // $('.sirve__container').each(function(){
  //   let sirveevent = ''

  //   if($('.sirve__nav-link').length) {
  //     sirveevent = $('.sirve__nav-link')[0].dataset.sirveevent && $('.sirve__nav-link')[0].dataset.sirveevent;
  //     //sirveTags = $('.sirve__nav-link')[0].dataset.sirvetags && $('.sirve__nav-link')[0].dataset.sirvetags;
  //   }

  //   var sirveTags = '';
  //     if($('.sirve-pagination a').length) {
  //       sirveTags = $('.sirve-pagination a')[0].dataset.sirvetags;
  //       sirveTags = (sirveTags != undefined) ? jQuery.parseJSON(sirveTags) : '';
  //     }
  //   //sirveTags = (sirveTags != undefined) ? jQuery.parseJSON(sirveTags) : '';

  //   var options = $(this).data('sirveoptions');
  //   $.ajax({
  //     url: sirve.ajaxurl,
  //     data: {
  //       action: "sirve_category_search",
  //       sirveCategorie: "all",
  //       sirveevent: sirveevent,
  //       sirveTags: sirveTags,
  //       options: options,
  //       nonce: sirve.ajaxnonce,
  //     },
  //     beforeSend: function () {},
  //     success: function (response) {
  //       $(".sirve-ajax-search").html(response);
  //       sirvePagination();
  //     },
  //     error: function (errorThrown) {
  //       console.log(errorThrown);
  //     },
  //   });
  // });

})(jQuery);