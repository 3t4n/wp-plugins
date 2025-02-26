jQuery(document).ready(function (e) {
  //Functions
  change_title_color();
  change_effect();
  change_background_on_main_box();
  change_border_radius();
  change_border_size();
  change_width();
  change_height();
  change_text_on_main_box();
  change_background_color();
  change_border_color();
  remove_background_image();
  change_font_color();
  change_margins();
  change_font_size();
  change_line_height();
  HovEffect();
  change_hover_title();
  change_hover_content();
  change_hover_background();
  change_divider_color_hover();
  change_font_color_hover();
  change_opacity_hover();
  change_margin_for_hover_top();
  change_margin_for_hover_right();
  change_margin_for_hover_bottom();
  change_margin_for_hover_left();
  show_hide_divider();
  get_boxes();
  get_a_box();
  CustomAlert();
  closee();
  show_history();
  new_project();
  saveNOW();
  decide_overwrite();
  do_overwrite();
  cancel_overwrite();
  cancel_this_overwrite();
  do_delete();
  cancel_delete();
  decide_delete();
  change_background_on_hover_box();
  remove_img_bg_hover();
  change_hover_title_link();
  change_hover_title_font_size();
  change_hover_font_size();
  change_hover_text_line_height();
  //remain_top();
  //Variables
  var Alert = new CustomAlert();
  var id = "";
  var t;
  var b;
  var global_id;
  var delete_id;
  $MAIN = e(".square_preview");
  $HOVER = e(".square_hover");
  function remove_img_bg_hover(){
    e("#remove_bg_image_hover").click(function(){
          e(".square_hover").css("background-image",'none');
          e(".square_hover").css("background-color",e("#background_hover").val());
    })
  }
  function change_background_on_main_box(){
      e("#upload_image_button").click(function(a) {
            a.preventDefault();
            if (b) {
                b.open();
                return
            }
            b = wp.media.frames.file_frame = wp.media({title: "Choose Image", button: {text: "Choose Image"}, multiple: false});
            b.on("select", function() {
                attachment = b.state().get("selection").first().toJSON();
                e("#upload_image").val(attachment.url);
                e(".square_preview").css({background: "transparent url(" + e("#upload_image").val() + ") left top no-repeat", "background-size": "100%"})
            });
            b.open()
        });
  }
  function change_background_on_hover_box(){
      e("#upload_image_button_hover").click(function(n) {
            n.preventDefault();
            if (t) {
                t.open();
                return
            }
            t = wp.media.frames.file_frame = wp.media({title: "Choose Image", button: {text: "Choose Image"}, multiple: false});
            t.on("select", function() {
                attachment = t.state().get("selection").first().toJSON();
                e("#upload_image_hover").val(attachment.url);
                e(".square_hover").css({background: "transparent url(" + e("#upload_image_hover").val() + ") left top no-repeat", "background-size": "100%"})
            });
            t.open()
        });
  }
  function change_border_radius(){
    e("#bottom-left").change(function(){
      e(".square_preview").css("border-bottom-left-radius", e("#bottom-left").val() + "px" );
      e(".hoverMain").css("border-bottom-left-radius", e("#bottom-left").val() + "px" );
    });
    //Change border radius - top-right
    e("#top-right").change(function(){
      e(".square_preview").css("border-top-right-radius", e("#top-right").val() + "px" );
      e(".hoverMain").css("border-top-right-radius", e("#top-right").val() + "px" );
    });
    //Change border radius - top-left
    e("#top-left").change(function(){
      e(".square_preview").css("border-top-left-radius", e("#top-left").val() + "px" );
      e(".hoverMain").css("border-top-left-radius", e("#top-left").val() + "px" );
    });
    //Change border radius - bottom-right
    e("#bottom-right").change(function(){
      e(".square_preview").css("border-bottom-right-radius", e("#bottom-right").val() + "px" );
      e(".hoverMain").css("border-bottom-right-radius", e("#bottom-right").val() + "px" );
    });
  }
 
  function change_border_size(){
    e("#border_main").change(function(){
      if (e("#border_main").val() != "")
      {
        e(".square_preview").css("border", e("#border_main").val() + "px solid" + e(".border-color").val() );
      }
      else
      {
        e(".square_preview").css("border","0px solid" + e(".border-color").val() );
      }
    });
  }
    
  function change_width(){
    e("#width_main").change(function(){
      if (e("#width_main").val() != ""){
        e(".square_preview").css("width", e("#width_main").val() + "px" );
        e(".hoverMain").css("width", e("#width_main").val() + "px" );
      }
      else
      {
        e(".square_preview").css("width", "500px" );
        e(".hoverMain").css("width", "500px" );
      }
    });
  }
    
 function change_height(){
    e("#height_main").change(function(){
      if (e("#height_main").val() != "")
      {
        e(".square_preview").css("height", e("#height_main").val() + "px" );
        e(".hoverMain").css("height", e("#height_main").val() + "px" );
        var total_height = e(".square_preview").height() - 50;
        var title_height = e("#thehover_title").outerHeight(true);
        var total = total_height - title_height;
        if (e("option:selected", "#HovEffect").attr("in") == "slide") {
           $HOVER.removeClass("animated flipInX flipOutX flipInY flipOutY fadeIn fadeInUp fadeInDown fadeInLeft fadeInRight fadeOut fadeOutUp fadeOutDown fadeOutLeft fadeOutRight bounceIn bounceInDown bounceInUp bounceInLeft bounceInRight bounceOut bounceOutDown bounceOutUp bounceOutLeft bounceOutRight rotateIn rotateInDownLeft rotateInDownRight rotateInUpLeft rotateInUpRight rotateOut rotateOutDownLeft rotateOutDownRight rotateOutUpLeft rotateOutUpRight lightSpeedIn lightSpeedOut rollIn rollOut tada swing flash circleOut wobble tada swing shake rubberBand pulse flash circleOut pulse flipSide swrillIn hiLeft hiRight flipFlap outIn zoomIn zoomOut zoomInDown zoomInUp zoomInRight zoomInLeft zoomOutDown zoomOutUp zoomOutLeft zoomOutRight wobble tada swing shake rubberBand pulse flash circleOut");
         $HOVER.animate({top: total}, {queue: false, duration: 400})
        }
      }
      else
      {
        e(".square_preview").css("height", "300px" );
        e(".hoverMain").css("height", "300px" );
        e(".hoverMain").css("height", e("#height_main").val() + "px" );
        var total_height = e(".square_preview").height() - 50;
        var title_height = e("#thehover_title").outerHeight(true);
        var total = total_height - title_height;
        if (e("option:selected", "#HovEffect").attr("in") == "slide") {
           $HOVER.removeClass("animated flipInX flipOutX flipInY flipOutY fadeIn fadeInUp fadeInDown fadeInLeft fadeInRight fadeOut fadeOutUp fadeOutDown fadeOutLeft fadeOutRight bounceIn bounceInDown bounceInUp bounceInLeft bounceInRight bounceOut bounceOutDown bounceOutUp bounceOutLeft bounceOutRight rotateIn rotateInDownLeft rotateInDownRight rotateInUpLeft rotateInUpRight rotateOut rotateOutDownLeft rotateOutDownRight rotateOutUpLeft rotateOutUpRight lightSpeedIn lightSpeedOut rollIn rollOut tada swing flash circleOut wobble tada swing shake rubberBand pulse flash circleOut pulse flipSide swrillIn hiLeft hiRight flipFlap outIn zoomIn zoomOut zoomInDown zoomInUp zoomInRight zoomInLeft zoomOutDown zoomOutUp zoomOutLeft zoomOutRight wobble tada swing shake rubberBand pulse flash circleOut");
         $HOVER.animate({top: total}, {queue: false, duration: 400})
        }
      }
    });
  }
    
  function change_text_on_main_box(){
    e("#the_text").change(function(){
      e(".previewMain_text").html(e("#the_text").val().replace(/\n/g, "<br />"));
    });
  }

  function change_background_color(){
    e(".background-color").change(function(){
      e(".square_preview").css("background-color", e(".background-color").val());
    });
  }
      
  function change_border_color(){
    e(".border-color").change(function(){
      e(".square_preview").css("border", e("#border_main").val() + "px solid" + e(".border-color").val());
    });
  }
     
  function remove_background_image(){
    e("#remove_bg_image").click(function(){
      e(".square_preview").css("background-image","none");
      e(".square_preview").css("background-color",e(".background-color").val()) ;
    });
  }
   
  function change_font_color(){
    e(".font-color").change(function(){
      e(".previewMain_text").css("color",e(".font-color").val());
    });
  }
    
  function change_margins(){
    e(".previewtext-margin-top").change(function()
    {
      if (e(".previewtext-margin-top").val() != "") {
        e(".previewMain_text").css("margin-top",e(".previewtext-margin-top").val()+"px");
      }
      else
      {
        e(".previewMain_text").css("margin-top","inherit");
      }
      
    });
    //Right
    e(".previewtext-margin-right").change(function()
    {
      if (e(".previewtext-margin-right").val() != "") {
        e(".previewMain_text").css("margin-right",e(".previewtext-margin-right").val()+"px");
      }
      else
      {
        e(".previewMain_text").css("margin-right","0px");
      }
      
    });
    //Bottom
    e(".previewtext-margin-bottom").change(function()
    {
      if (e(".previewtext-margin-bottom").val() != "") {
        e(".previewMain_text").css("margin-bottom",e(".previewtext-margin-bottom").val()+"px");
      }
      else
      {
        e(".previewMain_text").css("margin-bottom","0px");
      }
      
    });
    //Left
    e(".previewtext-margin-left").change(function()
    {
      if (e(".previewtext-margin-left").val() != "") {
        e(".previewMain_text").css("margin-left",e(".previewtext-margin-left").val()+"px");
      }
      else
      {
        e(".previewMain_text").css("margin-left","0px");
      }
      
    });
  }
    
  function change_font_size(){
    e(".previewtext-font").change(function()
    {
      if (e(".previewtext-font").val() != "") {
        e(".previewMain_text").css("font-size",e(".previewtext-font").val()+"px");  
      }
      else
      {
        e(".previewMain_text").css("font-size","13px");
      }
      
    });
  }
    
  function change_line_height(){
    e(".previewtext-spacing").change(function()
    {
      if (e(".previewtext-spacing").val() != "") {
        e(".previewMain_text").css("line-height",e(".previewtext-spacing").val()+"px"); 
      }
      else
      {
        e(".previewMain_text").css("line-height","1.4em");
      }
      
    });
  }
    
  function HovEffect(){
      e(".square_preview").unbind("hover");
     e(".square_preview").hover(function() {
      
      if (e("option:selected", "#HovEffect").attr("in") == "slide") {
         $HOVER.removeClass("animated flipInX flipOutX flipInY flipOutY fadeIn fadeInUp fadeInDown fadeInLeft fadeInRight fadeOut fadeOutUp fadeOutDown fadeOutLeft fadeOutRight bounceIn bounceInDown bounceInUp bounceInLeft bounceInRight bounceOut bounceOutDown bounceOutUp bounceOutLeft bounceOutRight rotateIn rotateInDownLeft rotateInDownRight rotateInUpLeft rotateInUpRight rotateOut rotateOutDownLeft rotateOutDownRight rotateOutUpLeft rotateOutUpRight lightSpeedIn lightSpeedOut rollIn rollOut tada swing flash circleOut wobble tada swing shake rubberBand pulse flash circleOut pulse flipSide swrillIn hiLeft hiRight flipFlap outIn zoomIn zoomOut zoomInDown zoomInUp zoomInRight zoomInLeft zoomOutDown zoomOutUp zoomOutLeft zoomOutRight wobble tada swing shake rubberBand pulse flash circleOut");
         $HOVER.animate({top: "-50"}, {queue: false, duration: 400})
      }
      else
      {
        $HOVER.removeClass("animated " + $HOVER.attr("out")).addClass("animated " + $HOVER.attr("in"))
           $HOVER.css("top","-50px");
         if (!e(".square_preview").hasClass("maskImg")) {
            e(".square_preview").addClass("maskImg");
          }
          
      }
      },function()
      {
        var total_height = e(".square_preview").height() - 50;
        var title_height = e("#thehover_title").outerHeight(true);
        var total = total_height - title_height;
        if (e("option:selected", "#HovEffect").attr("in") == "slide") {
           $HOVER.removeClass("animated flipInX flipOutX flipInY flipOutY fadeIn fadeInUp fadeInDown fadeInLeft fadeInRight fadeOut fadeOutUp fadeOutDown fadeOutLeft fadeOutRight bounceIn bounceInDown bounceInUp bounceInLeft bounceInRight bounceOut bounceOutDown bounceOutUp bounceOutLeft bounceOutRight rotateIn rotateInDownLeft rotateInDownRight rotateInUpLeft rotateInUpRight rotateOut rotateOutDownLeft rotateOutDownRight rotateOutUpLeft rotateOutUpRight lightSpeedIn lightSpeedOut rollIn rollOut tada swing flash circleOut wobble tada swing shake rubberBand pulse flash circleOut pulse flipSide swrillIn hiLeft hiRight flipFlap outIn zoomIn zoomOut zoomInDown zoomInUp zoomInRight zoomInLeft zoomOutDown zoomOutUp zoomOutLeft zoomOutRight wobble tada swing shake rubberBand pulse flash circleOut");
         $HOVER.animate({top: total}, {queue: false, duration: 400})
        }
        else
        {
         $HOVER.removeClass("animated " + $HOVER.attr("in")).addClass("animated " + $HOVER.attr("out"))
        }
      });
  }
    




   //For the LIT DIV
   //Change title
  function change_hover_title(){
        e("#hover_title").change(function(){
          $title="TITLE";
          if (e("#hover_title").val() != "") {
            e("#thehover_title").html(e("#hover_title").val());
          }
          else
          {
            e("#thehover_title").text($title);
          }
        });
  }
      
   //Change content
  function change_hover_content(){
          e("#hover_content").change(function(){
            $title="This is the hover content";
            if (e("#hover_content").val() != "") {
              e("#thehover_content").html(e("#hover_content").val().replace(/\n/g, "<br />"));
            }
            else
            {
              e("#thehover_content").text($title);
            }
           });
            e("#radio-holder input").change(function(){
            e("#thehover_content").css("text-align",e('input[name=align]:checked').val());
         });
  }

   //Change Effect
  function change_effect(){
        e("#HovEffect").change(function(){
          if (e("option:selected", "#HovEffect").attr("in") == "slide")
          {
             var total_height = e(".square_preview").height() - 50;
        if (e("#hover_title").val() == "")
        {
           title_height = e("#thehover_title").outerHeight(true) / 2;
        }
        else
        {
         title_height = e("#thehover_title").outerHeight(true);
        }
        var total = total_height - title_height;
            $HOVER.animate({top: total}, {queue: false, duration: 400})
          $HOVER.removeClass("animated flipInX flipOutX flipInY flipOutY fadeIn fadeInUp fadeInDown fadeInLeft fadeInRight fadeOut fadeOutUp fadeOutDown fadeOutLeft fadeOutRight bounceIn bounceInDown bounceInUp bounceInLeft bounceInRight bounceOut bounceOutDown bounceOutUp bounceOutLeft bounceOutRight rotateIn rotateInDownLeft rotateInDownRight rotateInUpLeft rotateInUpRight rotateOut rotateOutDownLeft rotateOutDownRight rotateOutUpLeft rotateOutUpRight lightSpeedIn lightSpeedOut rollIn rollOut tada swing flash circleOut grayscale non-grayscale wobble tada swing shake rubberBand pulse flash circleOut grayscale non-grayscale pulse flipSide swrillIn hiLeft hiRight flipFlap outIn zoomIn zoomOut zoomInDown zoomInUp zoomInRight zoomInLeft zoomOutDown zoomOutUp zoomOutLeft zoomOutRight wobble tada swing shake rubberBand pulse flash circleOut grayscale non-grayscale");
            $HOVER.attr("in","slide");
          }
          $HOVER.attr("entrance", "effect");
          $HOVER.removeClass("animated flipInX flipOutX flipInY flipOutY fadeIn fadeInUp fadeInDown fadeInLeft fadeInRight fadeOut fadeOutUp fadeOutDown fadeOutLeft fadeOutRight bounceIn bounceInDown bounceInUp bounceInLeft bounceInRight bounceOut bounceOutDown bounceOutUp bounceOutLeft bounceOutRight rotateIn rotateInDownLeft rotateInDownRight rotateInUpLeft rotateInUpRight rotateOut rotateOutDownLeft rotateOutDownRight rotateOutUpLeft rotateOutUpRight lightSpeedIn lightSpeedOut rollIn rollOut tada swing flash circleOut wobble tada swing shake rubberBand pulse flash circleOut pulse flipSide swrillIn hiLeft hiRight flipFlap outIn zoomIn zoomOut zoomInDown zoomInUp zoomInRight zoomInLeft zoomOutDown zoomOutUp zoomOutLeft zoomOutRight wobble tada swing shake rubberBand pulse flash circleOut");
          $HOVER.attr("in", e("option:selected", this).attr("in"));
          $HOVER.attr("out", e("option:selected", this).attr("out"));
          $HOVER.addClass("animated " + e("option:selected", this).attr("out"))
        });
  }

  //Change background of hover div
  function change_hover_background(){
    e("#background_hover").change(function(){
      e(".square_hover").css("background-color",e("#background_hover").val());
    });
  }

  //Change border color of hover div
  function change_divider_color_hover(){
    e("#divider_hover").change(function(){
      e(".divider-display").css("border-color",e("#divider_hover").val());
    });
  }

  //Change font color hover
  function change_font_color_hover(){
    e("#font_hover").change(function(){
      e("#thehover_content").css("color",e("#font_hover").val());
    });
  }

  //Change Opacity
  function change_opacity_hover(){
    e("#opacity_hover").change(function(){
      e(".hoverMain").css("opacity",e("#opacity_hover").val());
    });
  }

  //Change margin
  function change_margin_for_hover_top(){
    e("#topmargin_hover").change(function(){
      if (e("#topmargin_hover").val() != ""){
      e("#thehover_content").css("margin-top",e("#topmargin_hover").val() + "px");
      }
      else
      {
        e("#thehover_content").css("margin-top","1em");
      }
    })
  }

  function change_margin_for_hover_right(){
    e("#rightmargin_hover").change(function(){
      if (e("#rightmargin_hover").val() != ""){
      e("#thehover_content").css("margin-right",e("#rightmargin_hover").val() + "px")
      }
      else
      {
        e("#thehover_content").css("margin-right","0px")
      }
    })
  }

  function change_margin_for_hover_bottom(){
    e("#bottommargin_hover").change(function(){
      if (e("#bottommargin_hover").val() != ""){
      e("#thehover_content").css("margin-bottom",e("#bottommargin_hover").val() + "px")
      }
      else
      {
        e("#thehover_content").css("margin-bottom","1em")
      }
    })
  }

  function change_margin_for_hover_left(){
    e("#leftmargin_hover").change(function(){
      if (e("#leftmargin_hover").val() != ""){
      e("#thehover_content").css("margin-left",e("#leftmargin_hover").val() + "px")
      }
      else
      {
        e("#thehover_content").css("margin-left","0px")
      }
    })
  }

  //Display-Hide Divider
  function show_hide_divider(){
    e(".divider-check").change(function(){
      if(this.checked)
      {
        e(".divider-display").css("display","block");
      }
      else
      {
        e(".divider-display").css("display","none");
      }
    })
  }

  //Save Data
  function saveNOW(){

      e("#saveNow").click(function(){
        if (e(".save_name").val() == "" || e(".save_name").val().indexOf(" ") >= 0)
        {
              Alert.render("Please enter a name for your project. No spaces allowed.");
        }
        else
        {
          var s = {action: "SAVE", data: {container: 
          {name: e(".save_name").val(),
          box: e(".the_box").html(),
          br_tl: e("#top-left").val(),
          br_tr: e("#top-right").val(),
          br_bl: e("#bottom-left").val(),
          br_br: e("#bottom-right").val(),
          border: e("#border_main").val(),
          width: e("#width_main").val(),
          height: e("#height_main").val(),
          main_bg: e(".background-color").val(),
          main_brdr_clr: e(".border-color").val(),
          main_font_clr: e(".font-color").val(),
          main_font: e(".previewtext-font").val(),
          main_spacing: e(".previewtext-spacing").val(),
          main_mar_t: e(".previewtext-margin-top").val(),
          main_mar_r: e(".previewtext-margin-right").val(),
          main_mar_b: e(".previewtext-margin-bottom").val(),
          main_mar_l: e(".previewtext-margin-left").val(),
          main_text: e("#the_text").val()
          },
          hover:
          {hov_title: e("#hover_title").val(),
          hov_title_link: e("#hover_title_link").val(),
          hov_title_font_size: e("#title_font_size").val(),
          hov_align: e('input[name=align]:checked').val(),
          hov_effect: e("#HovEffect option:selected").val(),
          hov_opac: e("#opacity_hover").val(),
          hov_bg: e("#background_hover").val(),
          hov_divider_clr: e("#divider_hover").val(),
          hov_font_clr: e("#font_hover").val(),
          hov_divider_vis: e(".divider-check").attr("checked"),
          hov_mar_t: e("#topmargin_hover").val(),
          hov_mar_r: e("#rightmargin_hover").val(),
          hov_mar_b: e("#bottommargin_hover").val(),
          hov_mar_l: e("#leftmargin_hover").val(),
          hov_text_spacing: e("#hover_spacing").val(),
          hov_text_font_size: e("#hover_font_size").val,
          hov_text: e("#hover_content").val(),
          hov_title_color: e("#title_color").val()
          }}};
          e.post(ajaxurl, s, function(t)
          {
            if (t.Type == "success")
            {
              Alert.render("Your project has been saved. You can view it in the projects view.");
              location.reload();
            }
            else
            {
              Alert.render("Error");
            }
          })
        }
      })
  }

  function decide_overwrite(){
    e("#overwrite").click(function(){
      Alert.render("Are you sure you want overwrite this project?")
      document.getElementById('dialogboxfoot').innerHTML = '<button id="do_overwrite" class="green ok" style="margin-right: 10px">Yes</button><button id="cancel_overwrite" class="green ok">No</button>';
    })
  }

  function overWrite()
   {
    
      if (e(".save_name").val() == "" || e(".save_name").val().indexOf(" ") >= 0)
      {
            Alert.render("Please enter a name for your project. No spaces allowed.");
      }
      else
      {
        var s = {action: "UPDATE", id: id, data: {container: {name: e(".save_name").val(),
          box: e(".the_box").html(),
          br_tl: e("#top-left").val(),
          br_tr: e("#top-right").val(),
          br_bl: e("#bottom-left").val(),
          br_br: e("#bottom-right").val(),
          border: e("#border_main").val(),
          width: e("#width_main").val(),
          height: e("#height_main").val(),
          main_bg: e(".background-color").val(),
          main_brdr_clr: e(".border-color").val(),
          main_font_clr: e(".font-color").val(),
          main_font: e(".previewtext-font").val(),
          main_spacing: e(".previewtext-spacing").val(),
          main_mar_t: e(".previewtext-margin-top").val(),
          main_mar_r: e(".previewtext-margin-right").val(),
          main_mar_b: e(".previewtext-margin-bottom").val(),
          main_mar_l: e(".previewtext-margin-left").val(),
          main_text: e("#the_text").val()
          },
          hover:
          {hov_title: e("#hover_title").val(),
          hov_title_link: e("#hover_title_link").val(),
          hov_title_font_size: e("#title_font_size").val(),
          hov_align: e('input[name=align]:checked').val(),
          hov_effect: e("#HovEffect option:selected").val(),
          hov_opac: e("#opacity_hover").val(),
          hov_bg: e("#background_hover").val(),
          hov_divider_clr: e("#divider_hover").val(),
          hov_font_clr: e("#font_hover").val(),
          hov_divider_vis: e(".divider-check").attr("checked"),
          hov_mar_t: e("#topmargin_hover").val(),
          hov_mar_r: e("#rightmargin_hover").val(),
          hov_mar_b: e("#bottommargin_hover").val(),
          hov_mar_l: e("#leftmargin_hover").val(),
          hov_text_spacing: e("#hover_spacing").val(),
          hov_text_font_size: e("#hover_font_size").val(),
          hov_text: e("#hover_content").val(),
          hov_title_color: e("#title_color").val()
          }}};
        e.post(ajaxurl, s, function(t)
        {
          if (t.Type == "success")
          {
            Alert.render("Your project has been updated.");
          } 
          else
          {
            Alert.render("Error");
          }
        })
      }
  }

  function delete_mind(){
    var p = {action: "DELETE_MIND", id: id};
              e.post(ajaxurl, p, function () {
                if (global_id == delete_id)
                {
                  e("tr#"+id).remove();
                  Alert.render("Your project has been deleted.");
                  location.reload();
                }
                else
                {
                  e("tr#"+id).remove();
                  Alert.render("Your project has been deleted.");
                }

                  
              })
  }

  function decide_delete(){
    e(".remove_mind").live('click',function(){
      Alert.ok();
      var t = this;
      id = t.id.replace("del_", "");
      delete_id = id;
      Alert.render("Are you sure you want delete this project?")
      document.getElementById('dialogboxfoot').innerHTML = '<button id="do_delete" class="green ok" style="margin-right: 10px">Yes</button><button id="cancel_delete" class="green ok">No</button>';
    })
  }
  function get_boxes() {
          var t = {action: "GET_ALL_BOXES", data: {}};
          e.post(ajaxurl, t, function(t) {
              e(".the_projects").html("");
              e.each(t, function(t, n) {
                  var r = n.box.replace(/\\/g, "");
                  var id = n.id;
                  var name = n.name;
                  var shortcode = n.short_code.replace("test", n.id);
                  var date_created = n.date_created;
                  e(".the_projects").append('<tr id="' + id + '"><td>' + id +'</td><td>'+ name +'</td><td>'+ shortcode +'</td><td>' + date_created + '</td><td><button id="edit_' + id + '" class="btn btn-warning span12 btn-mini edit" style="width:70px">Edit</button>       <button id="del_' + id + '" class="btn span12 btn-danger btn-mini remove_mind" style="width:70px">Delete</button></td></tr>');
              });
            
          })
  }

  function CustomAlert(){
        this.render = function(dialog){
            var winW = window.innerWidth;
            var winH = window.innerHeight;
            var dialogoverlay = document.getElementById('dialogoverlay');
            var dialogbox = document.getElementById('dialogbox');
            dialogoverlay.style.display = "block";
            dialogoverlay.style.height = winH+"px";
            dialogbox.style.left = (winW/2) - (550 * .5)+"px";
            dialogbox.style.top = "100px";
            dialogbox.style.display = "block";
            document.getElementById('dialogboxhead').innerHTML = "GET YOUR MIND BLOWN";
            document.getElementById('dialogboxbody').innerHTML = dialog;
            document.getElementById('dialogboxfoot').innerHTML = '<button id="close" class="green ok">Ok</button>';
        }

        this.ok = function(){
            document.getElementById('dialogbox').style.display = "none";
            document.getElementById('dialogoverlay').style.display = "none";
        }
  }
      
  function closee(){
        e("button#close").live('click',function(){
            Alert.ok();
        })
  }

  function new_project(){
        e("#newProject").click(function(){
          location.reload();
        })
        
  }

  function get_a_box(){
      e(".edit").live("click",function(){
        var t = this;
        if (typeof this.id != "undefined") {
            id = t.id.replace("edit_", "");
            global_id = t.id.replace("edit_", "");
            var n = {action: "GET_BLOWN", id: t.id.replace("edit_", "")};
            e.post(ajaxurl, n, function (t) {
               e(".the_box").html("");
              var n = t[0].box.replace(/\\/g, "");
              e(".the_box").html(n);
              HovEffect();
              $MAIN = e(".square_preview");
              $HOVER = e(".square_hover");
              //variables containing data from databse
                var hov_align
                var br_tl = t[0].br_tl;
                var br_bl = t[0].br_bl;
                var br_tr = t[0].br_tr;
                var br_br = t[0].br_br;
                var border = t[0].border;
                var width = t[0].width;
                var height = t[0].height;
                var main_bg = t[0].main_bg;
                var main_brdr_clr = t[0].main_brdr_clr;
                var main_font_clr = t[0].main_font_clr;
                var main_font = t[0].main_font;
                var main_spacing = t[0].main_spacing;
                var main_mar_t = t[0].main_mar_t;
                var main_mar_r = t[0].main_mar_r;
                var main_mar_b = t[0].main_mar_b;
                var main_mar_l = t[0].main_mar_l;
                var main_text = t[0].main_text;

                var hov_title = t[0].hov_title;
                var hov_title_link = t[0].hov_title_link;
                var hov_title_font_size = t[0].hov_title_font_size;

                if (t[0].hov_align == "")
                {
                  hov_align = "Center";
                }
                else
                {

                 hov_align = t[0].hov_align;
                }

                var hov_effect = t[0].hov_effect;
                var hov_opac = t[0].hov_opac;
                var hov_bg = t[0].hov_bg;
                var hov_divider_clr = t[0].hov_divider_clr;
                var hov_font_clr = t[0].hov_font_clr;
                var hov_divider_vis = t[0].hov_divider_vis;
                var hov_mar_t = t[0].hov_mar_t;
                var hov_mar_r = t[0].hov_mar_r;
                var hov_mar_b = t[0].hov_mar_b;
                var hov_mar_l = t[0].hov_mar_l;
                var hov_text_spacing = t[0].hov_text_spacing;
                var hov_text_font_size = t[0].hov_text_font_size;
                var hov_text = t[0].hov_text;
                var hov_title_color = t[0].hov_title_color;
              //
             
              //main box
                //name 
                  
                  e(".save_name").val(t[0].name);
                //
                //border-radius
                  e("#top-left").val(br_tl);
                  e("#bottom-left").val(br_bl);
                  e("#top-right").val(br_tr);
                  e("#bottom-right").val(br_br);
                //
                //pxs
                  e("#border_main").val(border);
                  e("#width_main").val(width);
                  e("#height_main").val(height);
                //
                //colors
                  e(".background-color").val(main_bg);
                  e(".border-color").val(main_brdr_clr);
                  e(".font-color").val(main_font_clr);
                //
                //font,spacing and margins and the text content
                  e(".previewtext-font").val(main_font);
                  e(".previewtext-spacing").val(main_spacing);
                  e(".previewtext-margin-top").val(main_mar_t);
                  e(".previewtext-margin-right").val(main_mar_r);
                  e(".previewtext-margin-bottom").val(main_mar_b);
                  e(".previewtext-margin-left").val(main_mar_l);
                  e("#the_text").val(main_text);
                //
              //

              //hover box
                e("#hover_title").val(hov_title);
                e("#title_color").val(hov_title_color);
                e("#hover_title_link").val(hov_title_link);
                e("#title_font_size").val(hov_title_font_size);
                e("input[name=align][value="+ hov_align +"]").prop('checked',true);
                if (hov_effect != 1)
                  {
                    e('#HovEffect option:contains("' + hov_effect + '")').prop("selected","true")
                  }
                  else
                  {
                    e('#HovEffect option:contains("Slide")').prop("selected","true")
                }
                e("#opacity_hover").val(hov_opac);
                e("#background_hover").val(hov_bg);
                e("#divider_hover").val(hov_divider_clr);
                e("#font_hover").val(hov_font_clr);
                if(hov_divider_vis == "checked")
                  {
                      e(".divider-check").attr("checked",true);
                  }
                  else
                  {
                    e(".divider-check").attr("checked",false);
                }
                e("#topmargin_hover").val(hov_mar_t);
                e("#rightmargin_hover").val(hov_mar_r);
                e("#bottommargin_hover").val(hov_mar_b);
                e("#leftmargin_hover").val(hov_mar_l);
                e("#hover_spacing").val(hov_text_spacing);
                e("#hover_font_size").val(hov_text_font_size);
                e("#hover_content").val(hov_text);
              //


              e("button#close").trigger("click");
              e("html, body").animate({scrollTop: 0}, "slow");
              e("#newProject").css("display","none");
              e("#saveNow").css("display","none");
              e("#overwrite").css("display","inline-block");
              e("#cancel_this").css("display","inline-block");
            });
        }
        else
        {
          alert("Error");
        }
      });
  }
  function show_history(){
        e(".show_history").click(function(){
          Alert.render(e("#history").html() );
        })
  }

  function cancel_overwrite(){
        e("#cancel_overwrite").live("click",function(){
          Alert.ok();
        })
  }

  function do_overwrite(){
        e("#do_overwrite").live("click",function(){
          overWrite();
        })
  }

  function cancel_this_overwrite(){
        e("#cancel_this").click(function(){
          location.reload();
        })
  }

  function do_delete(){
    e("#do_delete").live('click',function(){
      delete_mind();
    })
  }

  function cancel_delete(){
    e("#cancel_delete").live('click',function(){
      Alert.ok();
    })
  }


function remain_top(){
  var scrollingDiv = e(".leftBox");
  if (e(window).width() > 1325 )
  {
    e(window).scroll(function(){            
            scrollingDiv
                .stop()
                .animate({"marginTop": (e(window).scrollTop() )}, "slow" );         
    });
  }
  else
  {
    scrollingDiv = undefined;
  }
        
}

  function change_title_color(){
    e("#title_color").change(function(){
      e("#thehover_title").css("color",e("#title_color").val())
    })
  }

  function change_hover_title_link(){
    e("#hover_title_link").change(function(){
      var link = e(this).val();
      e(".title_link").attr("href",link);
    })
  }


  function change_hover_title_font_size()
  {
    e("#title_font_size").change(function(){
      if (e("#title_font_size").val() != ""){
      e("#thehover_title").css("font-size",e("#title_font_size").val()+ "px");
       var total_height = e(".square_preview").height() - 50;
        var title_height = e("#thehover_title").outerHeight(true);
        var total = total_height - title_height;
        if (e("option:selected", "#HovEffect").attr("in") == "slide") {
           $HOVER.removeClass("animated flipInX flipOutX flipInY flipOutY fadeIn fadeInUp fadeInDown fadeInLeft fadeInRight fadeOut fadeOutUp fadeOutDown fadeOutLeft fadeOutRight bounceIn bounceInDown bounceInUp bounceInLeft bounceInRight bounceOut bounceOutDown bounceOutUp bounceOutLeft bounceOutRight rotateIn rotateInDownLeft rotateInDownRight rotateInUpLeft rotateInUpRight rotateOut rotateOutDownLeft rotateOutDownRight rotateOutUpLeft rotateOutUpRight lightSpeedIn lightSpeedOut rollIn rollOut tada swing flash circleOut wobble tada swing shake rubberBand pulse flash circleOut pulse flipSide swrillIn hiLeft hiRight flipFlap outIn zoomIn zoomOut zoomInDown zoomInUp zoomInRight zoomInLeft zoomOutDown zoomOutUp zoomOutLeft zoomOutRight wobble tada swing shake rubberBand pulse flash circleOut");
         $HOVER.animate({top: total}, {queue: false, duration: 400})
        }
    }
    else
    {
      e("#thehover_title").css("font-size","2em");
      if (e("option:selected", "#HovEffect").attr("in") == "slide") {
           $HOVER.removeClass("animated flipInX flipOutX flipInY flipOutY fadeIn fadeInUp fadeInDown fadeInLeft fadeInRight fadeOut fadeOutUp fadeOutDown fadeOutLeft fadeOutRight bounceIn bounceInDown bounceInUp bounceInLeft bounceInRight bounceOut bounceOutDown bounceOutUp bounceOutLeft bounceOutRight rotateIn rotateInDownLeft rotateInDownRight rotateInUpLeft rotateInUpRight rotateOut rotateOutDownLeft rotateOutDownRight rotateOutUpLeft rotateOutUpRight lightSpeedIn lightSpeedOut rollIn rollOut tada swing flash circleOut wobble tada swing shake rubberBand pulse flash circleOut pulse flipSide swrillIn hiLeft hiRight flipFlap outIn zoomIn zoomOut zoomInDown zoomInUp zoomInRight zoomInLeft zoomOutDown zoomOutUp zoomOutLeft zoomOutRight wobble tada swing shake rubberBand pulse flash circleOut");
         $HOVER.animate({top: "205"}, {queue: false, duration: 400})
        }
    }
    })
  }

  function change_hover_font_size()
  {
    e("#hover_font_size").change(function(){
      if (e("#hover_font_size").val() != ""){
      e("#thehover_content").css("font-size",e("#hover_font_size").val()+"px");
      }
      else
      {
        e("#thehover_content").css("font-size","13px");
      }
    })

  }

  function change_hover_text_line_height()
  {
    e("#hover_spacing").change(function(){
      if (e("#hover_spacing").val() != "")
      {
        e("#thehover_content").css("line-height",e("#hover_spacing").val()+"px")
      }
      else
      {
        e("#thehover_content").css("line-height","1.5")
      }
    })
  }
});