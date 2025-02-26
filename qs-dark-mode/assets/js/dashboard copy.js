var qs_dm_service = function () {
    
    var dark_dm_storage = window.localStorage;   
    var custom_element_exclude = [
        '#wpwrap','.qs-dark-mode-components-topbar .qs-dark-mode-savechanges .button i',
        '.qs-dark-mode-go-pro-btn a h3','.qs-dark-mode-components-topbar .qs-dark-mode-savechanges .button i',
        '.qs-dark-mode-components-topbar .qs-dark-mode-savechanges .button i',
        '.element-ready-components-topbar .element-ready-savechanges .button i',
        '.quomodo_sm_switch .quomodo_switch + label'
       
   
    ];

    var storage_key_one = 'qs_dark_mode_dash_active';
    var root_ele = document.querySelector("html");
    var switcher_div = document.querySelector('#wp-admin-bar-qs-dark-mode-dash .qs-dm-toggle');
    
    // We'll expose all these functions to the user
    function add_class() {

     
        root_ele.classList.add('qs-dm-service-enable');
        this.activate_colors();
 
    }
    function admin_swicth_active(e){

        e.preventDefault(); 
     
        swicher_toggle();
      
    }

    function swicher_toggle(){
        switcher_div.classList.toggle('qs-active'); 

        if(switcher_div.classList.contains("qs-active")){
            dark_dm_storage.setItem(storage_key_one, 1); 
            root_ele.classList.add('qs-root-active');
        }else{
            dark_dm_storage.setItem(storage_key_one, 0); 
            root_ele.classList.remove('qs-root-active');
        }
    }

    function exclude_elements(){

       
        if(custom_element_exclude){
         
            custom_element_exclude.forEach(element => {

                if (typeof(document.querySelector(element)) != 'undefined' && document.querySelector(element) != null){
                    document.querySelector(element).classList.add('qs-skip-dark-mode');
                   
                }
               
            });
           
         }
 
    }

    function switch_enable(){ 
        
        switcher_div.addEventListener("click", this.admin_swicth_active);
    }

    function activation(){

        if( dark_dm_storage.getItem( storage_key_one) != null ){ 
            if(dark_dm_storage.getItem( storage_key_one) == 1){
               root_ele.classList.add('qs-root-active');
               switcher_div.classList.add('qs-active');
            }
        
       }
    }
    
    function activate_colors(){
      
            
            var r = document.querySelector(':root');
             
            var presets = qs_dm_obj.color_scheme;
          
            if(presets == null){
                r.style.setProperty('--qs-dm-bg', '#000');
                r.style.setProperty('--qs-dm-text', '#ffffffc7');
                r.style.setProperty('--qs-dm-title', '#fff');
                r.style.setProperty('--qs-dm-icon', '#fff');
                r.style.setProperty('--qs-dm-link', '#fff');
                r.style.setProperty('--qs-dm-btn', '#fff');
                r.style.setProperty('--qs-dm-border', '#fff'); 
            }else{
                
                Object.keys(presets).forEach(key => {
                    r.style.setProperty(key, presets[key] );
                    
                });
            }

        
    }

    return {

        bootstrap: add_class,
        switch_enable: switch_enable,
        admin_swicth_active: admin_swicth_active,
        exclude_elements: exclude_elements,
        activation: activation,
        activate_colors: activate_colors,
    
        
      }
    }

    document.addEventListener("DOMContentLoaded", function(event) {
      
         
        if(qs_dm_obj.active){
            
            const qs_dm_service_obj = qs_dm_service(); // invoke our darkmode to return it's object (module)
            qs_dm_service_obj.bootstrap();
            qs_dm_service_obj.exclude_elements();
            qs_dm_service_obj.switch_enable();
            qs_dm_service_obj.activation();

        
           
        }
    });