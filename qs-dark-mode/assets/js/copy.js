


var qs_dm_service = function () {
     
    var qs_dark_mode_active_current = false;
    // Let's make sure no one can directly access our 
    var tags_list = [ 
        'body', 'header', 'footer', 'div', 'section', 'nav', 'article', 'aside', 'figure',
        'p', 'a', 'span', 'strong', 'font', 'i', 'label', 'small','h1', 'h2', 'h3', 'h4', 'h5',
         'h6', 'ul', 'ol', 'li', 'form', 'table', 'tr', 'td ','button','img'
    ];

    var exclude_bg_elements = [
        'p', 'a', 'span', 'strong', 'font', 'i', 'label', 'small','h1', 'h2', 'h3', 'h4', 'h5',
        'h6', 'ul', 'ol', 'li', 'form', 'table', 'tr', 'td ','button','img','button','.button__icon','.elementor-inner-section','.elementor-inner-column'
        
    ];
    
    var exclude_color_elements = [
          '.element__ready__btn', '.element__ready__dual__button .button__icon', '.element__ready__dual__button .button__icon i'
        ];

    var exclude_border_elements = [
        'p', 'a', 'span', 'strong', 'font', 'i', 'label', 'small','h1', 'h2', 'h3', 'h4', 'h5',
        'h6', 'ul', 'ol', 'li' ,'img'
    ];

    var include_imgs_elements = [
         
    ];

    var r = document.querySelector(':root');
    var qs_exclude_elements = [
        '.ab-top-menu li',
        '.ab-top-menu li span',
        '.ab-top-menu li a',
        '.ab-top-menu',
        '.ab-sub-wrapper',
        '.ab-submenu',
        '#adminbarsearch',
        '.element__ready__dual__button .button__title',
        'span',
        'p',
    ];

    var switch_type               = qs_dm_obj.switch_preset;
    var switcher_div              = document.createElement("div");
    var switcher_inner_div        = document.createElement("div");
    var switcher_inner_common_div = document.createElement("div");
    var switcher_light_img        = document.createElement("img");
    var switcher_dark_img         = document.createElement("img");
    var switcher_lavel            = document.createElement("label");

    switcher_lavel.setAttribute("for",qs_dm_obj.switch_preset);
    switcher_lavel.setAttribute("data-dark", qs_dm_obj.switch_dark_text);
    switcher_lavel.setAttribute("data-darkimg",qs_dm_obj.switch_dark_image);
    switcher_lavel.setAttribute("data-lightimg",qs_dm_obj.switch_light_image);
    switcher_lavel.setAttribute("data-light",qs_dm_obj.switch_light_text);
    switcher_lavel.className = 'qs-skip-dark-mode';

    switcher_custom_icons();
    
    var switcher_input             = document.createElement("input");
        switcher_input.type      = "checkbox";
        switcher_input.className = "switch qs-skip-dark-mode";  // set the CSS class
        switcher_input.setAttribute('id',qs_dm_obj.switch_preset);  
        
        if(qs_dm_obj.default){
            switcher_input.setAttribute('checked','checked'); 
        }else{
            switcher_input.setAttribute('checked','0'); 
        }
        
  
    // We'll expose all these functions to the user
    function add_class() {

       let root_ele = document.querySelector("html");
       root_ele.classList.add('qs-dm-service-enable');

    }

    function switcher_custom_icons(){

        if(switch_type == 'qs-dark-mood-layout-8' || switch_type == 'qs-dark-mood-layout-9'){
            if(qs_dm_obj.switch_dark_image.length == 0){
                r.style.setProperty('--qs-dm-dark-icon', 'url('+qs_dm_obj.qs_dark_mode_img+'/dark4.svg')+')';
            }
        
            if(qs_dm_obj.switch_light_image.length == 0){
            r.style.setProperty('--qs-dm-light-icon', 'url('+qs_dm_obj.qs_dark_mode_img+'/light3.svg')+')';
            }
        }
        
        if(switch_type == 'qs-dark-mood-layout-6'){
            if(qs_dm_obj.switch_dark_image.length == 0){
                r.style.setProperty('--qs-dm-dark-icon', 'url('+qs_dm_obj.qs_dark_mode_img+'/dark.svg')+')';
            }
        
            if(qs_dm_obj.switch_light_image.length == 0){
            r.style.setProperty('--qs-dm-light-icon', 'url('+qs_dm_obj.qs_dark_mode_img+'/light.svg')+')';
            }
        }
    }

    function custom_colors(){

       
        var rs = getComputedStyle(r);
       
        r.style.setProperty('--qs-dm-bg', qs_dm_obj.background_color);
        r.style.setProperty('--qs-dm-text', qs_dm_obj.text_color);
        r.style.setProperty('--qs-dm-title', qs_dm_obj.title_color);
        r.style.setProperty('--qs-dm-icon', qs_dm_obj.icon_color);
        r.style.setProperty('--qs-dm-link', qs_dm_obj.link_color);
        r.style.setProperty('--qs-dm-btn', qs_dm_obj.button_color);
        r.style.setProperty('--qs-dm-border', qs_dm_obj.border_color);  
        r.style.setProperty('--qs-dm-img-opacity', qs_dm_obj.image_opacity);
        if(qs_dm_obj.image_filter !='none'){
            r.style.setProperty('--qs-dm-img-filter', qs_dm_obj.image_filter+'('+qs_dm_obj.image_filter_value+')');
        }
       
       
    }
    function custom_pro_colors(){

     
        r.style.setProperty('--qs-dm-bg', '#000');
        r.style.setProperty('--qs-dm-text', '#fff');
        r.style.setProperty('--qs-dm-title', '#fff');
        r.style.setProperty('--qs-dm-icon', '#fff');
        r.style.setProperty('--qs-dm-link', '#fff');
        r.style.setProperty('--qs-dm-btn', '#fff');
        r.style.setProperty('--qs-dm-border', '#fff'); 
        r.style.setProperty('--qs-dm-img-opacity', qs_dm_obj.image_opacity);
        if(qs_dm_obj.image_filter !='none'){
            r.style.setProperty('--qs-dm-img-filter', qs_dm_obj.image_filter+'('+qs_dm_obj.image_filter_value+')');
        }

    }

    function activate_colors(){
       
        let custom_color = Boolean( qs_dm_obj.theme_custom_color );
       
        if( custom_color ){
           
            if(!qs_dm_obj.hasOwnProperty('qs_dm_lite_version')){
                custom_colors();
            }else{
                custom_pro_colors();
            }
            
        }else{
            
            try {  
                var presets = JSON.parse(qs_dm_obj.theme_preset);
              } catch (e) {  
                var presets = null;
            }
           
            var r = document.querySelector(':root');
          
            if( presets == null ){
                r.style.setProperty('--qs-dm-bg', '#000');
                r.style.setProperty('--qs-dm-text', '#ffffffc7');
                r.style.setProperty('--qs-dm-title', '#fff');
                r.style.setProperty('--qs-dm-icon', '#fff');
                r.style.setProperty('--qs-dm-link', '#fff');
                r.style.setProperty('--qs-dm-btn', '#fff');
                r.style.setProperty('--qs-dm-border', '#fff'); 
                r.style.setProperty('--qs-dm-img-opacity', qs_dm_obj.image_opacity); 
                if(qs_dm_obj.image_filter !='none'){
                    r.style.setProperty('--qs-dm-img-filter', qs_dm_obj.image_filter+'('+qs_dm_obj.image_filter_value+')');
                }
            }else{
                
                Object.keys(presets).forEach(key => {
                    r.style.setProperty(key, presets[key] );
                });

                r.style.setProperty('--qs-dm-img-opacity', qs_dm_obj.image_opacity); 
                if(qs_dm_obj.image_filter !='none'){
                    r.style.setProperty('--qs-dm-img-filter', qs_dm_obj.image_filter+'('+qs_dm_obj.image_filter_value+')');
                }
            }
        
        }

      
        
    }

    function deactivate_colors(){
       
        let elements = document.querySelectorAll(tags_list.join());
        elements.forEach(element => {
            const styles = window.getComputedStyle(element, "");
            const rgb = styles.getPropertyValue('background-color');
           
            if('var(--qs-dm-bg)' == element.style.backgroundColor){
                element.style.removeProperty('background-color');
            }
            
            if('var(--qs-dm-border)' == element.style.borderColor){
                element.style.removeProperty('border-color');
            }
            
            if('var(--qs-dm-text)' == element.style.color){
                element.style.removeProperty('color');
            }
            if('var(--qs-dm-title)' == element.style.color){
                element.style.removeProperty('color');
            }

            if('var(--qs-dm-btn)' == element.style.color){
                element.style.removeProperty('color');
            }

            if('var(--qs-dm-icon)' == element.style.color){
                element.style.removeProperty('color');
            }
            
            if('var(--qs-dm-link)' == element.style.color){
                element.style.removeProperty('color');
            }
            if('var(--qs-dm-img-opacity)' == element.style.opacity){
                element.style.removeProperty('opacity');
            }

            if('var(--qs-dm-img-filter)' == element.style.filter){
                element.style.removeProperty('filter');
            }
            
            if('none' == element.style.boxShadow){
                element.style.removeProperty('box-shadow');
            }

        });
     
    }

    function activate(){
        qs_dark_mode_active_current = true;
        activate_colors();
        let root_ele = document.querySelector("html");
        root_ele.classList.add('qs-dm-service-enable');
    }
    function deactivate(){
        qs_dark_mode_active_current = false;
        deactivate_colors();

        let root_ele = document.querySelector("html");
        root_ele.classList.remove('qs-dm-service-enable');
       
    }

    function status(){
        return qs_dark_mode_active_current;
    }

    function include_elements(){
  
         if(qs_dm_obj.custom_element_include){
            let dm_includes = qs_dm_obj.custom_element_include.split(','); 
         
            dm_includes.forEach(element => {
                tags_list.push(element.trim());
            });
           
         }
    
    } 
    
    function include_img_elements(){
  
         if(qs_dm_obj.adv_include_img_element){
            let dm_imgs_includes = qs_dm_obj.adv_include_img_element.split(','); 
         
            dm_imgs_includes.forEach(element => {
                include_imgs_elements.push(element.trim());
            });
           
         }
       
    }

    function exclude_elements(){

        tags_list.indexOf('.widget_search .input-box input') !== -1 && tags_list.splice(tags_list.indexOf('.widget_search .input-box input'), 1) 
       
        if(qs_dm_obj.custom_element_exclude){
            let dm_excludes = qs_dm_obj.custom_element_exclude.split(','); 
           
            dm_excludes.forEach(element => {

                if (typeof(document.querySelector(element)) != 'undefined' && document.querySelector(element) != null){
                    document.querySelector(element).classList.add('qs-skip-dark-mode');
                    qs_exclude_elements.push(element);
                }
               
            });
           
         }
 
    }

    function image_switcher(){
      
        if(qs_dm_obj.default){

            if( switcher_input.checked == true ){
                activate();
                dark_element();
                //switcher_inner_div.innerHTML = '';
                //switcher_inner_div.appendChild(switcher_light_img);
            }
    
            if(switcher_input.checked != true){
                deactivate();
                dark_image_swap_reverse();
            }

        }else{

            if( switcher_input.checked == true ){
                activate();
                dark_element();
                //switcher_inner_div.innerHTML = '';
                //switcher_inner_div.appendChild(switcher_light_img);
            }
    
            if(switcher_input.checked != true){
                deactivate();
                dark_image_swap_reverse();
            }
        }
       
        
    }

    function switch_enable(){
        // button control
        if( qs_dm_obj.switch_enable ){
              
              switcher_div.addEventListener("click", this.image_switcher);
           
                switcher_dark_img.src               = qs_dm_obj.switch_dark_image;
                switcher_light_img.src              = qs_dm_obj.switch_light_image;
                switcher_inner_div.classList        = 'switch_common qs-skip-dark-mode '
                switcher_div.classList              = 'qs-skip-dark-mode qs-dark-mood-layout-common ' + switch_type;
                switcher_inner_common_div.classList = 'md_switch qs-skip-dark-mode';
               
                switcher_inner_common_div.appendChild(switcher_input);
                switcher_inner_common_div.appendChild(switcher_lavel);
                switcher_inner_div.appendChild(switcher_inner_common_div);
                switcher_div.appendChild(switcher_inner_div);
                
                switcher_div.setAttribute("style", switcher_pos(qs_dm_obj.switch_position));
                document.body.appendChild(switcher_div);
        
        }
    }

    function switcher_pos( option = ''){
      
        if(option == 'top-right'){
           return 'position: fixed; top: 50px; right: 20px; z-index: 999;';
        }
        else if(option == 'top-left'){
            return 'position: fixed; top: 50px; left: 20px; z-index: 999;';
        }
        else if(option == 'top-center'){
            return 'position: fixed; top: 20px; left: 50%; z-index: 999;';
        }
        else if(option == 'bottom-left'){
            return 'position: fixed; bottom: 20px; left: 20px; z-index: 999;';
        }
        else if(option == 'bottom-center'){
            return 'position: fixed; bottom: 20px; left: 50%; z-index: 999;';
        }
        else{
            return 'position: fixed; bottom: 20px; right: 20px; z-index: 999;';
        }
    }

    function selector_exist(element){
        let flag = false;
        
        let join_ex_ele = qs_exclude_elements.join();
     
        qs_exclude_elements.every(selectors => {
           
            if(element.matches(join_ex_ele)){
                 
                flag = true;
            }
            
        });
      
        
        return flag;
    }
    
    function exclude_bgs_elements(element){
        let flag = true;
        
        let join_ex_ele = exclude_bg_elements.join();
     
        exclude_bg_elements.every(selectors => {
           
            if(element.matches(join_ex_ele)){
                 
                flag = false;
            }
            
        });
      
        
        return flag;
    }
    function img_selector_exist(element){
        let flag = false;
       
        let join_ex_ele = include_imgs_elements.join();
       
        include_imgs_elements.every(selectors => {
           
            if(element.matches(join_ex_ele)){
             
                flag = true;
            }
            
        });
      
        
        return flag;
    }
    
    function exclude_borders_elements(element){
        let flag = false;
       
        let join_ex_ele = exclude_border_elements.join();
       
        exclude_border_elements.every(selectors => {
           
            if(element.matches(join_ex_ele)){
             
                flag = true;
            }
            
        });
      
        
        return flag;
    }
    
      function exclude_color_text_elements(element){
        let flag = true;
       
        let join_ex_ele = exclude_color_elements.join();
       
        exclude_color_elements.every(selectors => {
           
            if(element.matches(join_ex_ele)){
             
                flag = false;
            }
            
        });
      
        
        return flag;
    }

    function isTransparent(color) {

        switch ((color || "").replace(/\s+/g, '').toLowerCase()) {
          case "transparent":
          case "":
          case "rgba(0,0,0,0)":
            return true;
          default:
            return false;
        }
    }
    
    function dark_image_swap_reverse(){

        if(qs_dm_obj.hasOwnProperty('qs_swap_images')){
            
            let images = document.getElementsByTagName('img');

            for(var rp = 0; rp < images.length; rp++) {

                if(("qs_real_src" in images[rp].dataset)) {
                    var real_src = images[rp].dataset.qs_real_src;
                    var real_srcset = images[rp].dataset.qs_real_srcset;
                    images[rp].src = real_src;
                    images[rp].srcset = real_srcset;
                    
                    
                }
            } 
            
        }   
    }

    function dark_image_swap(){
        
         if(qs_dm_obj.hasOwnProperty('qs_swap_images')){
            
            let images                = document.getElementsByTagName('img');
            let qs_swap_images_normal = qs_dm_obj.qs_swap_images;
           
            for(var lp = 0; lp < images.length; lp++) {
               var this_image_src = images[lp].src;
               if( this_image_src.trim() in qs_swap_images_normal ){
                  var temp_real_src = images[lp].src; 
                  var temp_real_srcset = images[lp].srcset; 
                  images[lp].src = qs_swap_images_normal[this_image_src];
                  images[lp].srcset = qs_swap_images_normal[this_image_src];
                  images[lp].dataset.qs_real_src = temp_real_src;
                  images[lp].dataset.qs_real_srcset = temp_real_srcset;
               }
            } 
            
         }
        
    }

    function dark_element(){
      
                            let elements = document.querySelectorAll(tags_list.join());

                            if(qs_dm_obj.hasOwnProperty('qs_swap_image_enable') && qs_dm_obj.qs_swap_image_enable){
                                dark_image_swap();
                            }
                           
                            elements.forEach(element => {
       
                                if (element.classList.contains('qs-dm-switcher-btn')) {
                                    return;
                                } 
                               
                                if (element.classList.contains('qs-dm-switcher-btn')) {
                                    return;
                                }
                                if (element.classList.contains('ab-icon')) {
                                    return;
                                }
                                if (element.classList.contains('ab-item')) {
                                    return;
                                }
                                if (element.classList.contains('menupop')) {
                                    return;
                                } 
                                if (element.classList.contains('nojq')) {
                                    return;
                                }
                                
                                if (element.classList.contains('screen-reader-shortcut')) {
                                    return;
                                }
                                if (element.classList.contains('quicklinks')) {
                                    return;
                                } 
                                
                                if (element.classList.contains('ab-top-menu')) {
                                    return;
                                }
                                
                                if (element.classList.contains('qs-skip-dark-mode')) {
                                    return;
                                }
                                
                              

                                //qs_exclude_elements
                                if(selector_exist(element)){
                                    return;
                                }
                             

                                const styles             = window.getComputedStyle(element, "");
                                const qs_gradientBG      = styles.getPropertyValue('background-image');
                                const qs_gen_bg_color    = styles.getPropertyValue('background-color');
                                const qs_gradientAttr    = element.getAttribute('bg-gradient');
                                const qs_inline_bg_color = element.style.backgroundColor;
                                const qs_inline_bg_img   = element.style.backgroundImage;
                             
                                if (  qs_gradientBG.includes('gradient') || qs_gradientAttr ) {
                                    
                                        element.removeAttribute('bg-gradient');
                                        element.style.backgroundImage = 'var(--qs-dm-bg)';
                                        
                                        if (qs_gradientAttr || qs_gradientBG.startsWith('linear-gradient')) {
                                            
                                            element.removeAttribute('bg-gradient');
                                            element.style.removeProperty('background-image');
                                            element.style.background = qs_gradientAttr;
    
                                        } else {
                                            
                                            element.setAttribute('bg-gradient', qs_gradientBG);
                                            element.style.backgroundImage = 'var(--qs-dm-bg)';
                                        }
                                
                                }else{
                                    // exclude background
                                    if( exclude_bgs_elements(element) ){

                                        if( !isTransparent(qs_gen_bg_color) || !isTransparent(qs_inline_bg_color) ){
                                            element.style.setProperty('background-color', 'var(--qs-dm-bg)');
                                        }
                                       
                                    }
                                    
                                }
                                  
                                element.style.setProperty('border-color', 'var(--qs-dm-border)');
                                 
                                if(element.nodeName == 'A'){
                                    element.style.setProperty('color', 'var(--qs-dm-link)');

                                }else if(element.nodeName == 'BUTTON'){
                                    
                                    element.style.setProperty('color', 'var(--qs-dm-btn)');
                                
                                }else if(element.nodeName == 'IMG'){
                                   
                                    element.style.setProperty('opacity', 'var(--qs-dm-img-opacity)');
                                     if(qs_dm_obj.image_filter !='none'){
                                        if(img_selector_exist(element)){
                                         
                                            element.style.setProperty('filter', 'var(--qs-dm-img-filter)');
                                        }
                                    
                                     }
                                    element.style.removeProperty('border-color');
                                    element.style.removeProperty('background-color');
                                   
                                
                                }
                               
                                else if(
                                    element.nodeName == 'H1' || 
                                    element.nodeName == 'H2' ||
                                    element.nodeName == 'H3' ||
                                    element.nodeName == 'H4' ||
                                    element.nodeName == 'H5' ||
                                    element.nodeName == 'H6' 
                                    ){
                                  
                                    element.style.setProperty('color', 'var(--qs-dm-title)');
                                }else if( element.nodeName == 'I' ){                             
                                    element.style.setProperty('color', 'var(--qs-dm-icon)');
                                 }else if( element.nodeName == 'SPAN' ){                             
                                    element.style.setProperty('color', 'var(--qs-dm-icon)');
                                }
                                else{
                                    
                                    if(exclude_color_text_elements(element)){
                                      element.style.setProperty('color', 'var(--qs-dm-text)');  
                                    }
                                    
                                } 
                           
                                if(!qs_dm_obj.theme_box_shadow){
                                    element.style.boxShadow = 'none'
                                }
                       
                            });

    }
  
    return {

      bootstrap     : add_class,
      drill_element : dark_element,
      include_tags  : include_elements,
      include_img_tags  : include_img_elements,
      exclude_tags  : exclude_elements,
      button_enable : switch_enable,
      image_switcher : image_switcher,
      dark_image_swap_reverse: dark_image_swap_reverse,
      activate      : activate,
      deactivate    : deactivate,
      status        : status,
    
    }
  }

  qs_plugin_dark_mode_initial_loader();

  document.addEventListener("DOMContentLoaded", function(event) {
  
    qs_plugin_dark_mode_initial_loader(true);
    var list = document.querySelectorAll(".qs-dark-mode-preloader-overlay");
    for (var i = 0; i < list.length; ++i) {
        list[i].classList.add('qs-active');
    }
    
  });

  function qs_plugin_dark_mode_initial_loader(load_button = false){

        let qs_act      = qs_dm_obj.active;
        let qs_default  = qs_dm_obj.default;
    
        if( qs_act ){
            
            var qs_dm_service_obj = qs_dm_service(); // invoke our darkmode to return it's object (module)
            //qs_dm_service_obj.bootstrap();
            qs_dm_service_obj.include_tags();
            qs_dm_service_obj.include_img_tags();
            qs_dm_service_obj.exclude_tags();
        
            if( qs_default ){

                qs_dm_service_obj.bootstrap();
                qs_dm_service_obj.activate();
                qs_dm_service_obj.drill_element();
            
            }
            if(load_button){
                qs_dm_service_obj.button_enable();
            }   
           

        }
    
        if(load_button && document.querySelector('.qs-dark-mood-layout-shortcode')){
            
            document.querySelector('.qs-dark-mood-layout-shortcode').addEventListener('click',function(){
            
                if( this.checked == true ){

                    qs_dm_service_obj.activate();
                    qs_dm_service_obj.drill_element();

                }else{
                    qs_dm_service_obj.deactivate();
                }
            });
        
        }

  }


