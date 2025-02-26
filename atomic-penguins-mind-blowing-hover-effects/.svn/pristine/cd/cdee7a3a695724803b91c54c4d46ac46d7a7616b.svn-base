jQuery(document).ready(function (e) {
  HovEffect();
  make_responsive();
  on_load();
  $HOVER = e(".square_hover");

      

       


function on_load()
{

       var viewportwidth = e(window).width();
       var pluginwidth = e(".square_preview").width();
  if (viewportwidth < pluginwidth || viewportwidth == pluginwidth) 
        {
          e(".square_preview").css("width","100%");
          e(".square_hover").css("width","100%");
        }

      on_load = function(){};
}


function HovEffect(){
  
     e(".square_preview").unbind("hover");
     e(".square_preview").hover(function(){
      if(e(this).find(".square_hover").attr("in") == 'slide' || e(this).find(".square_hover").attr("entrance") == 1)
      {
          e(this).find(".square_hover").animate({top: "-50"}, {queue: false, duration: 400});
      }
      else
      {
        e(this).find(".square_hover").removeClass(e(this).find(".square_hover").attr("out")).addClass(e(this).find(".square_hover").attr("in"));
      }
      },function(){
         if(e(this).find(".square_hover").attr("in") == 'slide' || e(this).find(".square_hover").attr("entrance") == 1)
      {
          var total_height = e(".square_preview").height() - 50;
        var title_height = e("#thehover_title").outerHeight(true);
          var total = total_height - title_height;
          e(this).find(".square_hover").animate({top: total}, {queue: false, duration: 400});
      }
        else
      {
        e(this).find(".square_hover").removeClass(e(this).find(".square_hover").attr("in")).addClass(e(this).find(".square_hover").attr("out"));
      }
      });
}

  function make_responsive(){
    // var orig = e(".square_preview").width();
    // e(window).resize(function() {
    //       if(this.resizeTO) clearTimeout(this.resizeTO);
    //       this.resizeTO = setTimeout(function() {

    //       e(this).trigger('windowResize');
    //     }, 500); 
    //   });
    // e(window).on('windowResize', function() {
    //    var viewportwidth = e(window).width();
    //    var pluginwidth = e(".square_preview").width();
    //    if (viewportwidth <= pluginwidth)
    //     {
    //       e(".square_preview").css("width","100%");
    //       e(".square_hover").css("width","100%");
    //     } 
    //     else if (viewportwidth >= pluginwidth)
    //     {
    //       e(".square_hover").css("width",orig);
    //       e(".square_preview").css("width",orig);
    //     }
    // });
    // -------------------------------------------------------------
     var orig = e(".square_preview").width();
    // var TO = false;
    // var resizeEvent = 'onorientationchange' in window ? 'orientationchange' : 'resize';
    // e(window).bind(resizeEvent, function() {
    //     TO && clearTimeout(TO);
    //     TO = setTimeout(resizeBody, 200);
    // });
    // function resizeBody(){

    //     var viewportwidth = window.innerWidth || e(window).width();
    //     var pluginwidth = e(".square_preview").width();
    //    if (viewportwidth >= pluginwidth)
    //     {
    //       e(".square_hover").css("width",orig);
    //       e(".square_preview").css("width",orig);
    //     } 
    //     else
    //     {
    //       e(".square_preview").css("width","100%");
    //       e(".square_hover").css("width","100%");
    //     }
        
    // }
      e(window).resize(function() {
        if(this.resizeTO) clearTimeout(this.resizeTO);
        this.resizeTO = setTimeout(function() {
            e(this).trigger('resizeEnd');
        }, 500);
    });

      e(window).bind('resizeEnd', function() {
        var viewportwidth = window.innerWidth || e(window).width();
        var pluginwidth = e(".square_preview").width();
       if (viewportwidth >= orig)
        {
          e(".square_hover").css("width",orig);
          e(".square_preview").css("width",orig);
        } 
        else
        {
          e(".square_preview").css("width","100%");
          e(".square_hover").css("width","100%");
        }


      });
  }

})