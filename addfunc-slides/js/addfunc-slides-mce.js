//(function() {
jQuery(function($){
  tinymce.PluginManager.add('aFSMCE',function(editor,url){
    
    editor.addButton('aFSLeft',{
      title: 'Back/Left',
      icon: 'icon dashicons-arrow-left-alt move-left',
      classes: 'widget btn',
      stateSelector: '.move-left',
      onclick: function(){
        aFSAddRmvCls("move-left");
      }
    });
    editor.addButton('aFSRight',{
      title: 'Forth/Right',
      icon: 'icon dashicons-arrow-right-alt move-right',
      classes: 'widget btn',
      stateSelector: '.move-right',
      onclick: function(){
        aFSAddRmvCls("move-right");
      }
    });
    editor.addButton('aFSUp',{
      title: 'Up/Above',
      icon: 'icon dashicons-arrow-up-alt move-up',
      classes: 'widget btn',
      stateSelector: '.move-up',
      onclick: function(){
        aFSAddRmvCls("move-up");
      }
    });
    editor.addButton('aFSDown',{
      title: 'Down/Below',
      icon: 'icon dashicons-arrow-down-alt move-down',
      classes: 'widget btn',
      stateSelector: '.move-down',
      onclick: function(){
        aFSAddRmvCls("move-down");
      }
    });
    editor.addButton('aFSClock',{
      title: 'Rotate Clockwise',
      icon: 'icon dashicons-image-rotate-right turn-clock',
      stateSelector: '[class*="turn-clock"]',
      classes: 'widget btn',
      stateSelector: '.turn-clock',
      onclick: function(){
        aFSAddRmvCls("turn-clock");
      }
    });
    editor.addButton('aFSCntrClock',{
      title: 'Rotate Counter Clockwise',
      icon: 'icon dashicons-image-rotate-left turn-cntr-clock',
      classes: 'widget btn',
      stateSelector: '.turn-cntr-clock',
      onclick: function(){
        aFSAddRmvCls("turn-cntr-clock");
      }
    });
    editor.addButton('aFSMor',{
      title: 'Increase/More',
      icon: 'icon dashicons-arrow-up mor',
      classes: 'widget btn',
      stateSelector: '.mor,.morr,.morrr,.morrrr,.morrrrr,.morrrrrr',
      onclick: function(){
        aFSIncDecCls("r");
      }
    });
    editor.addButton('aFSLes',{
      title: 'Decrease/Less',
      icon: 'icon dashicons-arrow-down les',
      classes: 'widget btn',
      stateSelector: '.les,.less,.lesss,.lessss,.lesssss,.lessssss',
      onclick: function(){
        aFSIncDecCls("s");
      }
    });
    function aFSIncDecCls(cssClass){
      var bodyEl = editor.getBody();
      var selectedEl = editor.selection.getNode();
      while(selectedEl.parentNode != bodyEl){
        var step = $(selectedEl);
        step.removeClass("lessssss lesssss lessss lesss less les mor morr morrr morrrr morrrrr morrrrrr");
        selectedEl = selectedEl.parentNode;
      }
      var sel = $(selectedEl);
      if(cssClass == "r"){ // --- More! -->
             if(sel.hasClass("mor")){sel.removeClass("mor"); sel.addClass("morr"); editor.nodeChanged(); return;}
        else if(sel.hasClass("morr")){sel.removeClass("morr"); sel.addClass("morrr"); editor.nodeChanged(); return;}
        else if(sel.hasClass("morrr")){sel.removeClass("morrr"); sel.addClass("morrrr"); editor.nodeChanged(); return;}
        else if(sel.hasClass("morrrr")){sel.removeClass("morrrr"); sel.addClass("morrrrr"); editor.nodeChanged(); return;}
        else if(sel.hasClass("morrrrr")){sel.removeClass("morrrrr"); sel.addClass("morrrrrr"); editor.nodeChanged(); return;}
        else if(sel.hasClass("lessssss")){sel.removeClass("lessssss"); sel.addClass("lesssss"); editor.nodeChanged(); return;}
        else if(sel.hasClass("lesssss")){sel.removeClass("lesssss"); sel.addClass("lessss"); editor.nodeChanged(); return;}
        else if(sel.hasClass("lessss")){sel.removeClass("lessss"); sel.addClass("lesss"); editor.nodeChanged(); return;}
        else if(sel.hasClass("lesss")){sel.removeClass("lesss"); sel.addClass("less"); editor.nodeChanged(); return;}
        else if(sel.hasClass("less")){sel.removeClass("less"); sel.addClass("les"); editor.nodeChanged(); return;}
        else if(sel.hasClass("les")){sel.removeClass("les"); editor.nodeChanged(); return;}
        else if(sel.hasClass("morrrrrr")){ editor.nodeChanged(); return;}
        else {sel.addClass("mor"); editor.nodeChanged(); return;}
      }
      if(cssClass == "s"){ // <-- Less! ---
             if(sel.hasClass("morrrrrr")){sel.removeClass("morrrrrr"); sel.addClass("morrrrr"); editor.nodeChanged(); return;}
        else if(sel.hasClass("morrrrr")){sel.removeClass("morrrrr"); sel.addClass("morrrr"); editor.nodeChanged(); return;}
        else if(sel.hasClass("morrrr")){sel.removeClass("morrrr"); sel.addClass("morrr"); editor.nodeChanged(); return;}
        else if(sel.hasClass("morrr")){sel.removeClass("morrr"); sel.addClass("morr"); editor.nodeChanged(); return;}
        else if(sel.hasClass("morr")){sel.removeClass("morr"); sel.addClass("mor"); editor.nodeChanged(); return;}
        else if(sel.hasClass("mor")){sel.removeClass("mor"); editor.nodeChanged(); return;}
        else if(sel.hasClass("les")){sel.removeClass("les"); sel.addClass("less"); editor.nodeChanged(); return;}
        else if(sel.hasClass("less")){sel.removeClass("less"); sel.addClass("lesss"); editor.nodeChanged(); return;}
        else if(sel.hasClass("lesss")){sel.removeClass("lesss"); sel.addClass("lessss"); editor.nodeChanged(); return;}
        else if(sel.hasClass("lessss")){sel.removeClass("lessss"); sel.addClass("lesssss"); editor.nodeChanged(); return;}
        else if(sel.hasClass("lesssss")){sel.removeClass("lesssss"); sel.addClass("lessssss"); editor.nodeChanged(); return;}
        else if(sel.hasClass("lessssss")){ editor.nodeChanged(); return;}
        else {sel.addClass("les"); editor.nodeChanged(); return;}
      }
    }
    function aFSAddRmvCls(cssClass){
      var bodyEl = editor.getBody();
      var selectedEl = editor.selection.getNode();
      while(selectedEl.parentNode != bodyEl){
        var step = $(selectedEl);
        step.removeClass("move-left move-right move-up move-down turn-clock turn-cntr-clock");
        selectedEl = selectedEl.parentNode;
      }
      console.log(selectedEl);
      
      var sel = $(selectedEl);
      if(sel.hasClass(cssClass)){
        sel.removeClass(cssClass);
		editor.nodeChanged();
        return;
      }else{
        if(cssClass == "move-left" || cssClass == "move-right" || cssClass == "move-up" || cssClass == "move-down"){
          sel.removeClass("move-left move-right move-up move-down");
        }
        if(cssClass == "turn-clock" || cssClass == "turn-cntr-clock"){
          sel.removeClass("turn-clock turn-cntr-clock");
        }
        sel.addClass(cssClass);
		editor.nodeChanged();
        return;
      }
    }
  });
});