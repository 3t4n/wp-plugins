if(typeof($add)=="undefined")var $add={version:{},auto:{disabled:false}};(function($){
  $add.version.Accordion = "1.0.0";
  $add.Accordion = function(selector, settings){
    $(selector).each(function(i, el){
      var $el = $(el);
      if($el.hasClass("smooth-Accordion")) return;
      $el.addClass("smooth-Accordion");
      var S = $.extend({
        initial: 0,
        change: "click",
        maxOpened: 1
      }, $el.data(), settings);

      if(S.change == "hover"){
        S.change = "mouseover";
      }
      var $headers = $el.find("[role=header]").addClass("smooth-Accordion-header");
      var $contents = $el.find("[role=content]").addClass("smooth-Accordion-content").hide();

      $headers.eq(0).addClass("smooth-Accordion-first");
      $contents.eq(0).addClass("smooth-Accordion-first");
      $headers.last().addClass("smooth-Accordion-last");
      $contents.last().addClass("smooth-Accordion-last");

      function countOpen(){
        var count = 0;
        $headers.each(function(i, header){
          if($(header).hasClass("smooth-Accordion-open")){
            count++;
          }
        });
        return count;
      }
      function open(index){
        if(S.maxOpened && countOpen() >= S.maxOpened){
          closeLastOpen();
        }
        $headers.eq(index).addClass("smooth-Accordion-open");
        $contents.eq(index).addClass("smooth-Accordion-open").slideDown({duration:100});
      }
      function close(index){
        $headers.eq(index).removeClass("smooth-Accordion-open");
        $contents.eq(index).removeClass("smooth-Accordion-open").slideUp({duration:100});
      }
      function closeAll(){
        $headers.removeClass("smooth-Accordion-open");
        $content.removeClass("smooth-Accordion-open").slideUp({duration:100});
      }
      function closeLastOpen(){
        var lastOpenIndex = 0;
        $headers.each(function(i, header){
          if($(header).hasClass("smooth-Accordion-open")){
            lastOpenIndex = i;
          }
        });
        close(lastOpenIndex);
      }
      function toggle(index){
        if($headers.eq(index).hasClass("smooth-Accordion-open")){
          close(index);
        } else {
          open(index);
        }
      }

      $headers.each(function(i, header){
        var $header = $(header);
        $header.on(S.change, function(){
          if(S.change == "mouseover"){
            if(!$header.hasClass("smooth-Accordion-open")){
              open(i);
            }
          } else {
            toggle(i);
          }
        });
      })

      if(S.initial instanceof Array){
        for(var i=0 ;i<S.initial.length; i++){
          $contents.eq(S.initial[i]).show();
          open(S.initial[i]);
        }
      } else {
        $contents.eq(S.initial).show();
        open(S.initial);
      }
    });
  };
  $.fn.addAccordion = function(settings){
    $add.Accordion(this, settings);
  };
  $add.auto.Accordion = function(){
    if(!$add.auto.disabled){
      $("[data-smooth=accordion]").addAccordion();
    }
  };
})(jQuery);
jQuery(function(){for(var k in $add.auto){if(typeof($add.auto[k])=="function"){$add.auto[k]();}}});


// _Accordion
(function($){
  $add.version.Accordion = "1.0.0";
  $add.Accordion = function(selector, settings){
    $(selector).each(function(i, el){
      var $el = $(el);
      if($el.hasClass("smooth-Accordion")) return;
      $el.addClass("smooth-Accordion");
      var S = $.extend({
        initial: 0,
        change: "click",
        maxOpened: 1
      }, $el.data(), settings);

      if(S.change == "hover"){
        S.change = "mouseover";
      }
      if(typeof(S.inital) == "string" && S.initial.indexOf(",")){
        S.initial = S.initial.split(",");
      }
      var $headers = $el.find("[role=header]").addClass("smooth-Accordion-header");
      var $contents = $el.find("[role=content]").addClass("smooth-Accordion-content").hide();

      $headers.eq(0).addClass("smooth-Accordion-first");
      $contents.eq(0).addClass("smooth-Accordion-first");
      $headers.last().addClass("smooth-Accordion-last");
      $contents.last().addClass("smooth-Accordion-last");

      function countOpen(){
        var count = 0;
        $headers.each(function(i, header){
          if($(header).hasClass("smooth-Accordion-open")){
            count++;
          }
        });
        return count;
      }
      function open(index){
        if(S.maxOpened && countOpen() >= S.maxOpened){
          closeLastOpen();
        }
        $headers.eq(index).addClass("smooth-Accordion-open");
        $contents.eq(index).addClass("smooth-Accordion-open").slideDown({duration:100});
      }
      function close(index){
        $headers.eq(index).removeClass("smooth-Accordion-open");
        $contents.eq(index).removeClass("smooth-Accordion-open").slideUp({duration:100});
      }
      function closeAll(){
        $headers.removeClass("smooth-Accordion-open");
        $content.removeClass("smooth-Accordion-open").slideUp({duration:100});
      }
      function closeLastOpen(){
        var lastOpenIndex = 0;
        $headers.each(function(i, header){
          if($(header).hasClass("smooth-Accordion-open")){
            lastOpenIndex = i;
          }
        });
        close(lastOpenIndex);
      }
      function toggle(index){
        if($headers.eq(index).hasClass("smooth-Accordion-open")){
          close(index);
        } else {
          open(index);
        }
      }

      $headers.each(function(i, header){
        var $header = $(header);
        $header.on(S.change, function(){
          if(S.change == "mouseover"){
            if(!$header.hasClass("smooth-Accordion-open")){
              open(i);
            }
          } else {
            toggle(i);
          }
        });
      })

      if(S.initial instanceof Array){
        for(var i=0 ;i<S.initial.length; i++){
          $contents.eq(S.initial[i]).show();
          open(S.initial[i]);
        }
      } else {
        $contents.eq(S.initial).show();
        open(S.initial);
      }
    });
  };
  $.fn.addAccordion = function(settings){
    $add.Accordion(this, settings);
  };
  $add.auto.Accordion = function(){
    if(!$add.auto.disabled){
      $("[data-smooth=accordion]").addAccordion();
    }
  };
})(jQuery);
