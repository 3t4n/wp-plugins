var pinv = progressinv = 0;
var site_count = 0;
var wordpress_size;
var update_progress_counter = 0;
var copy_progress_counter = 0;
var db_progress_counter = 0;
var update_finished_triggered = false;
var copy_finished_triggered = false;
var db_finished_triggered = false;
var tables = [];
var queries = [];
var retrying_database = false;
var total_queries = 0;
var copy_log = '';
var copy_lines = 0;
var update_plugins, include_uploads ,skip_database;
var copy_started = false;
var updateInv = 0
var queue_index = 0
var update_queue = []
var single_idx = null
var current_data_image = 0
const animateCSS = (element, animation, prefix = 'animate__') =>
// We create a Promise and return it
new Promise((resolve, reject) => {
    const animationName = `${prefix}${animation}`;
    const node = $(element)[0];

    node.classList.add(`${prefix}animated`, animationName);

    // When the animation ends, we clean the classes and resolve the Promise
    function handleAnimationEnd(event) {
        event.stopPropagation();
        node.classList.remove(`${prefix}animated`, animationName);
        resolve('Animation ended');
    }

    node.addEventListener('animationend', handleAnimationEnd, {once: true});
});

String.prototype.rtrim = function(s) { 
    return this.replace(new RegExp(s + "*$"),''); 
};

$ = jQuery

const WPBOOM_IS_COPY = (typeof wpboom != 'undefined' && wpboom.WPBOOM_COPY)?true:false
const WPBOOM_INCLUDE_UPLOADS = (typeof wpboom != 'undefined' && wpboom.include_uploads)?true:false
function ValidateEmail(email) {
    if (/^\w+([\.\-\+]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)){
        return (true)
    }
    return (false)
}

var spawn_timer = 0;
var spawn_seconds = 0;
var hoverTimer = 0;
var hoveredRow;
var remainingInv = 0;
jQuery(document).ready(function($){
    jQuery(".exclude-check").on("click",function(){
        jQuery(this).parent().toggleClass("bd-blue-300")
    })
    if(jQuery("data#total_percent").length){
        var wpboom_total_percent = jQuery("data#total_percent").data('value')
       
    }
    if(jQuery("[data-scheduled_remaining]").length){
        var scheduled_remaining = parseInt(jQuery("[data-scheduled_remaining]").data("scheduled_remaining"));
        if(scheduled_remaining <= 0){
            window.location.reload();
        }
       
    }

   
    
    jQuery("#createModal")[0].addEventListener('shown.bs.modal', () => {
        Swal.fire({
            icon: "warning",
            title: "Disclaimer",
            width: "50vw",
            html: "The creation of a dev site is not guaranteed to work — while this plugin has been tested thoroughly, there is always the possibility that another plugin may interfere with the dev site you create. There are known instances where plugins that <u>implement security</u>, <u>rewrite urls</u>, <u>modify .htaccess or wp-config</u>, <u>have settings related to specific server paths</u> and <u>manage caching</u> have been known to 'break' the dev site.  A sure sign of such a 'break' is a 500 error. <br /><br />While we strive to make this plugin as felixble as possible, there is no way to predict how another plugin will react to being copied to a new WordPress install. As such, we encourage you to try to determine the cause of the failure by deactivating other plugins and trying this process again."
        })
   })
    if(typeof scheduled_remaining != 'undefined'){
        remainingInv = setInterval(function(){
            scheduled_remaining--
            if(scheduled_remaining <= 0){
                scheduled_remaining = 0
                clearInterval(remainingInv)
                jQuery(".pending-schedule-alert").removeClass("alert-info").addClass("alert-success")
                jQuery(".pending-schedule-alert").html('<span class="dashicons dashicons-info"></span> Dev site creation has started. <a href="/wp-admin/admin.php?page=safeupdates_dashboard">Refresh</a> page to view progress.')
            }
            jQuery(".scheduled-remaining-seconds").text(scheduled_remaining + "s")
            
        },1000)
    }
    if(typeof wpboom_total_percent != "undefined" && wpboom_total_percent != null && wpboom_total_percent >= 0 && jQuery(".overall-percent").length){
        jQuery(".overall-percent").html(wpboom_total_percent + "%").addClass("animate__animated animate__heartBeat")
        if(wpboom_total_percent >= 15){
            jQuery(".overall-percent").addClass("text-danger")
        } else if(wpboom_total_percent >= 5){
            jQuery(".overall-percent").addClass("text-warning")
        } else {
            jQuery(".overall-percent").addClass("text-success")
        }
    }
    if(jQuery("#wpboom_pending_actions").val() == "snapshot_requested" || jQuery("#wpboom_pending_actions").val() == "crawl_requested"){
        jQuery(".btn-trigger-create-modal").attr("disabled",true);
        jQuery(".btn-group").addClass('disabled')
    }
    jQuery(".dashboard-news-panel").animate({height: jQuery(".dashboard-main-panel").height()},500)
    $(".php-error").removeClass("php-error")
    if($(".latest-news").length){
        jQuery.ajax({
            url: "/wp-admin/admin-ajax.php",
            type: 'post',
            async: true,
            dataType: 'html',
            data: { _ajax_nonce: boomvars._wpnonce, action: 'safeupdates_news'},
            success: function(html) {
                $(".latest-news").html(html)
            }
        })
    }
    
   
   
    jQuery(document).on('heartbeat-send', function(e, data) {
        data['safeupdates_heartbeat'] = $("#wpboom_pending_actions").val();
    });
    jQuery(document).on( 'heartbeat-tick', function(e, data) {
        if ( ! data['safeupdates_pending_actions'] ) return;
        // Log the response for easy proof it works
        if(data['safeupdates_pending_actions'] == "ready" || data['safeupdates_pending_actions'] == "snapshot_after_login"){
            //jQuery('#api_form').submit()
            var title = "New Data Available"
            if($("#wpboom_pending_actions").val() == "snapshot_requested"){
                title = "Snapshot Completed"
            }
            if($("#wpboom_pending_actions").val() == "crawl_requested"){
                title = "Crawl Completed"
            }
            Swal.fire({
                title: title,
                allowOutsideClick: false,
                width: "500px",
                footer: "Refreshing...",
                didOpen: () => {
                    Swal.showLoading()
                    setTimeout(function(){
                        window.location.reload();
                    },1000)
                },
            });
        }
    });
    

    $(".preview-container .btn-group .btn").on("click",function(){
       
        var type = $(this).data("type")
        var images = $(".preview-container .btn-group").data("images")
        var src = images[type]
        console.log(src)
        if(src){
            $(".preview-img").fadeTo(100,0)
            $(".preview-container .btn-group .btn").removeClass("btn-primary").addClass("btn-secondary")
            $(this).removeClass("btn-secondary").addClass("btn-primary")
            loadPreviewImage(images[type]) 
        }
    })

    $("tr.site-pages").on("click",function(){
        hoveredRow = $(this)
        $(".preview-container .btn-group").addClass("d-none").data("images",{})
        
        var ref = hoveredRow.find("img.img-thumbnail.ref")
        var diff = hoveredRow.find("img.img-thumbnail.diff")
        var img = hoveredRow.find("img.img-thumbnail.img")
        var src = "";
        console.log(ref,diff,img)
        $("tr.site-page").removeClass("table-primary")
        hoveredRow.addClass("table-primary")
        var images = {diff:null,ref:null,img:null}
        if(img.length){
            src = img.attr("src")
            images['img'] = (src)?src:null
        }
       
        if(ref.length){
            src = ref.attr("src")
            images['ref'] = (src)?src:null
        }
        if(diff.length){
            src = diff.attr("src")
            images['diff'] = (src)?src:null
        }
        console.log(images)
        $(".preview-img").fadeTo(100,0)
        if(src){
            $(".preview-container .btn-group").data("images",images)
            loadPreviewImage(src)
            if(images.diff){
                $(".btn-diff").removeClass("disabled").trigger("click")
            } else {
                $(".btn-diff").addClass("disabled")
            }
            if(images.img){
                $(".btn-new").removeClass("disabled")
            } else {
                $(".btn-new").addClass("disabled")
            }
        }
        
       
    })
   
    function loadPreviewImage(src){
        $(".preview-container").addClass("loading")
        var img = new Image()
        $(img).off().on("load",function(){
            $(".preview-img").off().on("load",function(){
                setTimeout(function(){
                    $(".preview-img").fadeTo(100,1)
                },500)
            })
            $(".preview-img").attr("src",img.src)
            
            $(".preview-container .btn-group").removeClass("d-none")
            $(".preview-container").removeClass("loading")
        })
        img.src = src
    }
    if($(".img-thumbnail.diff").length){
      /*   $(".btn-approve").removeClass("d-none") */
    }
    $( '#boom-password,#boom-password-retyped' ).on( 'keyup', 
		function( event ) {
			checkPasswordStrength(
				$('#boom-password'),         // First password field 
				$('#boom-password-retyped'), // Second password field 
				$('#password-strength'),           // Strength meter 
				$('#register-boom'),           // Submit button 
				['black', 'listed', 'word']        // Blacklisted words 
			);
		}
	);
    const tooltipTriggerList = document.querySelectorAll("[data-bs-title]");
    const tooltipList = [...tooltipTriggerList].map(
        (tooltipTriggerEl) =>
        new bootstrap.Tooltip(tooltipTriggerEl, {
            trigger: "hover",
        })
    );
    if($("#secs_until_spawn").length){
        spawn_seconds = parseInt($("#secs_until_spawn").text().replace(/[^0-9]+/,''))
        spawn_timer = setInterval(function(){
            spawn_seconds--;
            if(spawn_seconds <= 0){
                clearInterval(spawn_timer)
                Swal.fire({
                    title: "Checking Progress...",
                    allowOutsideClick: false,
                    width: "500px",
                    footer: "<pre class='update-progress text-center'>Please wait...\n</pre>",
                    didOpen: () => {
                        Swal.showLoading()
                        setTimeout(function(){
                            window.location.reload();
                        },1000)
                    },
                });
                
            }
            $("#secs_until_spawn").text(spawn_seconds + " seconds")
        },1000)
    }
    $(".boom-loading").hide();
    if(WPBOOM_IS_COPY){
        wpboom_do_copy_restrictions();
    }
    if(!WPBOOM_INCLUDE_UPLOADS){
        //wpboom_upload_intervention();
    }
    jQuery("[data-password").tooltip();
    const myModal = document.getElementById('createModal')
    const thumbModal = document.getElementById('thumbModal')
    if(myModal){
        myModal.addEventListener('show.bs.modal', () => {
            jQuery("#update_plugins").prop('checked',false).parent().addClass('show');
            jQuery("#include_uploads").prop('checked',false).parent().addClass('show');
            jQuery("#skip_database").prop('checked',false).parent().addClass('show');
            copy_started = update_plugins = include_uploads = skip_database = copy_finished_triggered = db_finished_triggered = update_finished_triggered = retrying_database = false;
            update_progress_counter = copy_progress_counter = db_finished_triggered = 0;
            
            if(pinv){
                clearInterval(pinv);
            }
            
            
        })
    }
    jQuery(".img-thumbnail").each(function(){
        jQuery(this).on("load",function(){
            jQuery(this).siblings(".modal-spinner").addClass("d-none")
            jQuery(this).fadeTo(300,1);
        })
        var src =  jQuery(this).attr("src")
        jQuery(this).attr("src",'').delay(1).attr('src',src);
    });
    jQuery(".img-thumbnails").on("click",function(){
        var th = jQuery(this)
        
        initEnlarge(th)
        
    })
    jQuery(".btn-snapshot-prev").on("click",function(){
        var num_pages = jQuery(".site-page").length
        var eq = current_data_image - 1
        if(eq < 0) { 
            eq = num_pages - 1
        }
        jQuery(".site-page:eq("+eq+")").find(".data-images:visible:first").click()
    })
    jQuery(".btn-snapshot-next").on("click",function(){
        var num_pages = jQuery(".site-page").length
        var eq = current_data_image + 1
        if(eq >= num_pages - 1) { 
            eq = 0
        }
        jQuery(".site-page:eq("+eq+")").find(".data-images:visible:first").click()
    })
    jQuery(".data-images").on("click",function(){
        jQuery("#thumbModal").modal('hide')
        current_data_image = jQuery(this).parent().parent().index(".site-page")
        
        initEnlarge(jQuery(this))
        
        
    });
   
    jQuery(".btn-update-token").on("click",function(){
        Swal.fire({
            title: "Please Wait...",
            width: "500px",
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
               
            },
        });
        
       
    })
    jQuery("[data-password]").on("click",function(e){
        e.preventDefault();
        var pwd = jQuery(this).data('password')
        jQuery(this).text(pwd);
    })
    jQuery("#skip_database").on("change",function(e){
        if(jQuery(this).prop('checked')){
            jQuery("#update_plugins").prop('checked',false); 
            jQuery("#update_plugins").parent().removeClass('show');
            jQuery("#include_uploads").prop('checked',false); 
            jQuery("#include_uploads").parent().removeClass('show');
            
        } else {
            jQuery("#update_plugins").parent().addClass('show');
            jQuery("#include_uploads").parent().addClass('show');
        }
    })
    jQuery("#update_plugins").on("change",function(e){
        if(jQuery(this).prop('checked')){
            jQuery("#skip_database").prop('checked',false); 
            jQuery("#skip_database").parent().removeClass('show');
        } else if(!jQuery("#include_uploads").prop('checked')) {
            jQuery("#skip_database").parent().addClass('show');
        }
    })
    jQuery("#include_uploads").on("change",function(e){
        if(jQuery(this).prop('checked')){
            jQuery("#skip_database").prop('checked',false); 
            jQuery("#skip_database").parent().removeClass('show');
        } else if(!jQuery("#update_plugins").prop('checked')) {
            jQuery("#skip_database").parent().addClass('show');
        }
    })
    jQuery(".wpboom-api-reveal").on("click",function(e){
        e.preventDefault();
        $(".wpboom-api-container").removeClass("d-none")
    })
    jQuery("td[data-site_status]").each(function(){
        var prefix = jQuery(this).data('site_status');
        safeupdates_check_spawn_status(prefix, false);

    })
    jQuery("td[data-in_progress]").each(function(){
        var prefix = jQuery(this).data('in_progress');
        var colspan = jQuery("tr#"+prefix).find("td").length
        jQuery(this).attr("colspan",colspan)
        jQuery(".sites-table > thead").hide()
        jQuery("tr#"+prefix).find("td:not([data-in_progress])").addClass("d-none")
        jQuery(".btn-trigger-create-modal").attr("disabled",true);
        jQuery(".snapshot-btn").addClass("disabled")
        progressinv = setInterval(function(){
            safeupdates_check_install_progress(prefix);
        },500)
        

    })
    
    /*
    jQuery(".data-images").off().on("click",function(){
       
        var html = ''
        var percent =  100 / jQuery(this).siblings(".data-images").length
        jQuery(this).siblings(".data-images").each(function(){
            var src = jQuery(this).data('src');
            html += '<img src="'+src+'" class="d-inline-block" style="width:'+percent+'%">'
        })
        Swal.fire({
            html: html,
            grow: "fullscreen",
            closeButtonHtml: "&times;&nbsp",
            showCloseButton: true
        })

    })
    */
    $(".animate__fadeIn").removeClass("animate__fadeIn");
    if( jQuery("#wpboom_pending_actions").val() == "snapshot_after_login" && jQuery("#api_token").val() != ""){
        takeSnapshot(0)
    }
    jQuery("input.required").on("blur keyup",function(){
        if(! $(this).val()){
            $(this).addClass("is-invalid")
        } else {
            $(this).removeClass("is-invalid")
        }
    })
    $("#register-boom").on("click",function(){
            var skip = $("#skip-snapshot").prop('checked');
            var name = $("#boom-name").val();
            var email = $("#boom-email").val();
            var password = $("#boom-password").val();
            var password_retyped = $("#boom-password-retyped").val();
            var sitename = $("#boom-site-name").val();
            var url = $("#boom-url").val();
            var dev_url = $("#boom-dev-url").val();
            if(! url || ! password || !email || !name){
              
                jQuery("input.required:visible").each(function(){
                    if(! $(this).val()){
                        $(this).addClass("is-invalid")
                    }
                })
                Swal.fire({
                    icon: 'error',
                    width: "500px",
                    title: 'All fields are required!',
                    allowOutsideClick: false
                });
                return;
            }
            if(password_retyped != password){
                Swal.fire({
                    icon: 'error',
                    width: "500px",
                    title: 'Passwords do not match!',
                    allowOutsideClick: false
                });
                return;
            }
            if($("#password-strength").hasClass("bad")){
                Swal.fire({
                    icon: 'error',
                    title: 'Password Error',
                    width: "500px",
                    html: "<p class='text-center'>Please make your password stronger.</p>",
                    footer:"You can use a combination of lower and upper case letters, symbols, and numbers.",
                    allowOutsideClick: false
                });
                return;
            }
            $("#register-boom").find('.spinner-border').removeClass('d-none');
          
           
            Swal.fire({
                title: "Registering...",
                allowOutsideClick: false,
                footer: "<div class='text-center'>Please wait...</div>",
                width: "500px",
                crossDomain: true,
                didOpen: () => {
                    Swal.showLoading();
                    jQuery.ajax({
                        url: boomvars.boom_url+"/api/webhook",
                        type: 'post',
                        async: true,
                        dataType: 'json',
                        data: { _ajax_nonce: boomvars._wpnonce, action: 'register_via_plugin',  email: email, password: password,url:url,dev_url:dev_url,name: name,sitename:sitename, is_dev: 0},
                        success: function(data) {
                            jQuery(".spinner-border").addClass("d-none")
                            if(data.result == "success"){
                                if("require login" == data.message){
                                    Swal.fire({
                                        width: "500px",
                                        icon: "warning",
                                        html: "An account already exists for <span class='text-primary'>"+email+"</span>. Please login with this email address and password instead.",
                                        didOpen: () => {
                                            jQuery("[data-bs-target='#collapseLogin']").trigger("click");
                                        }
                                    })
                                } else {
                                    var pending_actions = data.action;
                                    $("#signupModal").modal('hide');
                                    Swal.fire({
                                        title: "Registration Successful!",
                                        width: "500px",
                                        html: data.message,
                                        icon: 'success',
                                        didOpen: () => {
                                           
                                            if(data.api_key){
                                                Swal.showLoading();
                                                jQuery("#wpboom_pending_actions").val(pending_actions)
                                               
                                                jQuery.ajax({
                                                    url: "/wp-admin/admin-ajax.php",
                                                    type: 'post',
                                                    async: true,
                                                    dataType: 'json',
                                                    data: { _ajax_nonce: boomvars._wpnonce, action: 'safeupdates_ajax', method: "update_api", login: email, api_token: data.api_key, pending_actions: pending_actions},
                                                    success: function(data) {
                                                        Swal.hideLoading();
                                                    }
                                                })
                                            }
                                        },
                                        didClose: () => {
                                            Swal.showLoading();
                                            window.location.reload()
                                        }
                                    });
                                }
                               
                               
                                
                            } else {
                                jQuery(".spinner-border").addClass("d-none")
                                Swal.fire({
                                    title: "Error",
                                    width: "500px",
                                    html: data.message,
                                    icon: 'error'
                                });
                            }
                        },
                        error: function (xhr) {
                            title = xhr.responseJSON.message;
                            jQuery(".spinner-border").addClass("d-none")
                            Swal.fire({
                                title: xhr.statusText,
                                icon: "error",
                                html: xhr.responseJSON.message
                            });
                        }
                    })
                },
            });
            
              
        
        
        })
    
    $("#login-boom").on("click",function(){
    
        var skip = $("#skip-snapshot").prop('checked');
        var email = $("#email").val();
        var password = $("#password").val();
        var validEmail = ValidateEmail(email);
        if(! password || !email || !validEmail){
            jQuery("input.required:visible").each(function(){
                if(! $(this).val()){
                    $(this).addClass("is-invalid")
                }
            })
            if(!validEmail){
                Swal.fire({
                    icon: 'error',
                    width: "500px",
                    title: 'Please enter a valid email!',
                    allowOutsideClick: false
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    width: "500px",
                    title: 'All fields are required!',
                    allowOutsideClick: false
                });
            }
           
            return;
        }
        
        
        $("#login-boom").find('.spinner-border').removeClass('d-none');
        
        var sitename = $("#boom-site-name").val();
        var url = $("#boom-url").val();
        
        var dev_url = $("#boom-dev-url").val();
        Swal.fire({
            title: "Attempting Log In...",
            allowOutsideClick: false,
            footer: "<div class='text-center'>Please wait...</div>",
            width: "500px",
            crossDomain: true,
            didOpen: () => {
                Swal.showLoading();
                jQuery.ajax({
                    url: boomvars.boom_url+"/api/webhook",
                    type: 'post',
                    async: true,
                    dataType: 'json',
                    data: { _ajax_nonce: boomvars._wpnonce, action: 'login_via_plugin',  email: email, password: password, url:url,dev_url:dev_url,sitename:sitename},
                    success: function(data) {
                        jQuery(".spinner-border").addClass("d-none")
                        if(data.result == "success"){
                            
                            Swal.fire({
                                title: "Login Successful!",
                                width: "500px",
                                //html: data.message,
                                icon: 'success',
                                didOpen: () => {
                                    
                                    if(data.api_key){
                                        $("#signupModal").modal('hide');
                                        Swal.showLoading();
                                        var pending_actions = "ready";
                                        if(!skip){
                                            pending_actions = "snapshot_after_login"
                                        }
                                        jQuery.ajax({
                                            url: "/wp-admin/admin-ajax.php",
                                            type: 'post',
                                            async: true,
                                            dataType: 'json',
                                            data: { _ajax_nonce: boomvars._wpnonce, action: 'safeupdates_ajax', method: "update_api", login: email, api_token: data.api_key, pending_actions: pending_actions},
                                            success: function(data) {
                                                Swal.showLoading();
                                                window.location.reload()
                                            }
                                        })
                                    }
                                },
                                didClose: () => {
                                    
                                }
                            });
                            
                        } else {
                            jQuery(".spinner-border").addClass("d-none")
                            Swal.fire({
                                title: "Error",
                                width: "500px",
                                html: data.message,
                                icon: 'error'
                            });
                        }
                    },
                    error: function (xhr) {
                        title = xhr.responseJSON.message;
                        jQuery(".spinner-border").addClass("d-none")
                        Swal.fire({
                            title: xhr.statusText,
                            icon: "error",
                            html: xhr.responseJSON.message
                        });
                    }
                })
            },
        });
        
            
    
    
    })
    if(jQuery("td[data-in_progress]").length){
        window.onbeforeunload = function() { 
            return "A development site is currently being created. If you navigate away from this page you may interrupt the process.";
        }
    }
    if(jQuery("#update_dev_url").length  && jQuery("td[data-in_progress]").length == 0){
        //
        let timerInterval;
        var service_responded = false
        Swal.fire({
            icon: 'info',
            width: "500px",
            title: 'WP Boom Service Update',
            timer: 15000,
            timerProgressBar: true,
            html: 'Your dev site has changed.',
            footer: "Updating WP Boom Service...",
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
                
                
                jQuery.ajax({
                    url: boomvars.boom_url+"/api/webhook",
                    type: 'post',
                    async: true,
                    dataType: 'json',
                    data: { _ajax_nonce: boomvars._wpnonce, action: 'update_via_plugin', password: jQuery("#api_token").val(), dev_url: jQuery("#update_dev_url").val()},
                    success: function(data) {
                        service_responded = true;
                        if(data.result == "error"){
                            Swal.fire({
                                icon: 'error',
                                width: "500px",
                                title: 'WP Boom Service Error',
                                html: "The WP Boom service has indicated that this plugin is not connected to a valid account. Press OK to reset the plugin to register or login again.",
                                didClose: () => {
                                    Swal.showLoading();
                                    jQuery('.swal2-footer').html('Resetting Account...').show();
                                    jQuery('#api_token').val('');
                                    jQuery('#api_form').submit();
                                }
                            })
                        } else {
                            //sync site again
                            setTimeout(function(){
                                jQuery('.btn-update-token').trigger('click')
                           },1500)
                        }
                       
                    }
            
                })

            },
            willClose: () => {
              if(!service_responded){
                Swal.fire({
                    icon: 'error',
                    width: "500px",
                    title: 'WP Boom Service Error',
                    html: 'There was a problem communicating with the WP Boom service. Refresh the page to try again shortly.'
                })
              }
            }
        });
       
    }
        setTimeout(function(){
            var el = jQuery("#wpbody-content")
            if(jQuery(".alert")){
                el = jQuery(".alert:first")
            }
            jQuery('html,body').animate({
                scrollTop: el.offset().top
            }, 500);
        },1000)
        
    })


    

    
    

    $("#prefix").on("keyup",function(e){
        
        var folder_name = $(this).val().replace(/[_]/g,' ').replace(/[^a-zA-Z0-9 ]/g,'').replace(/\s/g,'_');
        $(".prefix-preview").text(folder_name.toLowerCase())
    })

    $("#spawn-dev").on("click",function(){
        $("#prefix").val( $("#prefix").val().replace(/[_]/g,' '))
        var site_name = $("#prefix").val();
        var excluded = []
        jQuery("[name^=excluded_files]:checked").each(function(){
            excluded.push(jQuery(this).val())
        })
        if(!site_name){
            Swal.fire({
                icon: 'error',
                width: "500px",
                title: 'Please provide a name for this site!',
                allowOutsideClick: false
            });
            return;
        }
        if(copy_started) return;
        copy_started = true;
        $(this).find('.spinner-border').removeClass('d-none');
        update_plugins = false;
       
        retrying_database = false;
        copy_finished_triggered = false;
        copy_progress_counter = 0;
        db_finished_triggered = false;
        db_progress_counter = 0;
        update_finished_triggered = false;
        update_progress_counter = 0;
        tables = [];
       
        var install_size = parseInt($("[data-wordpress_size]").data("wordpress_size"))
        var free_space = parseInt($("[data-free_space]").data("free_space"))
        if(install_size >= free_space){
            Swal.fire({
                icon: 'error',
                width: "500px",
                title: 'There is not enough free space to spawn a new site!',
                allowOutsideClick: false
            });
            return;
        }
        
        if($("[data-wordpress_size]").length){
            wordpress_size = $("[data-wordpress_size]").data("wordpress_size")
        } else {
            wordpress_size = "Unknown";
        }
       
       
        copy_log = '';
        update_plugins = jQuery("#update_plugins").prop('checked');
      
        include_uploads = jQuery("#include_uploads").prop('checked')
        skip_database = jQuery("#skip_database").prop('checked')
        $("#spawn-dev").find('.spinner-border').addClass('d-none');
        $("#createModal").modal('hide');
        Swal.fire({
            title: "Preparing files...",
            width: "500px",
            allowOutsideClick: false,
            footer: "<div class='text-center'>Please wait...</div>",
            didOpen: () => {
                Swal.showLoading();
                jQuery.ajax({
                    url: "/wp-admin/admin-ajax.php",
                    type: 'post',
                    async: true,
                    dataType: 'json',
                    data: { _ajax_nonce: boomvars._wpnonce, action: 'safeupdates_ajax', site_name: site_name,  method: "cron", include_uploads: 0, update_plugins: (update_plugins)?1:0, skip_database: (skip_database)?1:0, excluded: excluded},
                    success: function(data) {
                        if(data.response == "error"){
                            Swal.fire({
                                title: "Spawn Failed",
                                width: "500px",
                                html: data.message,
                                icon: 'error'
                            });
                        } else {
                            jQuery(".swal2-title").text('Preparing files...Done!');
                            jQuery('.swal2-footer').html('<div class="text-center">Reloading page...</div>');
                            Swal.showLoading()
                            setTimeout(function(){
                                window.location.reload();
                            },1000)
                        }
                    }
                })
            },
        });
        
        
       
       
    })



function initEnlarge(th){
    Swal.showLoading()
    jQuery('.swal2-actions').append('<p class="fs-6 fw-bold pe-3 pt-3">Loading Image...</p>')
    var images_to_load = th.parent().find(".data-images").length
    var number_of_pages = th.parent().parent().parent().find("tr").length
    
    var current_page = current_data_image + 1
    var images_loaded = 0
    var percent =  100 / images_to_load
    jQuery(".snapshot-pagination").text(current_page + " / " + number_of_pages)
    jQuery(".modal-image").remove();
    jQuery(".snapshot-tip").remove();
    var mbody = jQuery("#thumbModal").find(".modal-body")
    jQuery("#thumbModalLabel").text(th.parent().parent().find("td:eq(1)").text())
    var idx = 0;
    th.parent().find(".data-images").each(function(){
        var src = jQuery(this).attr('data-src');
        console.log(src)
        
        
        src = src + "?no-cache=" + new Date().getTime()
        var tooltip = ""
        var diff_percent = "";
        if(src.match(/ref/i)){
            tooltip = "Reference"
        } else  if(src.match(/diff/i)){
            tooltip = "Difference"
            diff_percent = " " + jQuery(this).attr('data-percent') + "%"
        } else {
            tooltip = "New"
        }
        var left_percent = percent * idx;
        idx++;
        var left = 'calc( '+left_percent+'% + 10px)'
        var img = jQuery('<img style="margin:0px 5px;" class="modal-image float-start rounded-0 p-0">')
        var tooltip = jQuery('<div class="snapshot-tip" style="left: '+left+';">'+tooltip + diff_percent +'</div>');
        img.css({width: "calc("+percent.toFixed(2)+"% - 10px)"})
        img.on("load",function(){
            images_loaded++
            console.log(images_to_load,images_loaded)
            if(images_loaded == images_to_load){
                jQuery("#thumbModal").modal('show')
                setTimeout(function(){
                    jQuery(".modal-image").off().on("mouseover",function(){
                        var idx = Math.abs(jQuery(this).index(".modal-image") - 2)
                        jQuery(".snapshot-tip").eq(idx).fadeTo(200,0.1)
                    
                    }).on("mouseout",function(){
                        var idx = Math.abs(jQuery(this).index(".modal-image") - 2)
                        jQuery(".snapshot-tip").eq(idx).fadeTo(200,1)
                    
                    })
                },500)
                Swal.close()
            }
        })
        tooltip.prependTo(mbody)
        img.appendTo(mbody)
        img.attr("src",src);
    })
    
}
function  updatePlugins(prefix){
    update_finished_triggered = false;
    Swal.fire({
        title: "Updating Plugins...",
        allowOutsideClick: false,
        width: "500px",
        footer: "<pre class='update-progress'>Please wait...\n</pre>",
        didOpen: () => {
            Swal.showLoading();
        },
    });
    setTimeout(function(){
        jQuery.ajax({
            url: "/wp-admin/admin-ajax.php",
            type: 'post',
            async: true,
            dataType: 'json',
            data: { _ajax_nonce: boomvars._wpnonce, action: 'safeupdates_ajax',  method: "updateplugins", prefix: prefix},
            success: function(data) {
                update_progress_counter = 0;
                pinv = setInterval(function(){
                   
                    checkProgressUpdate(prefix);
                },100)
            }
        })  
    },1000)  
}


function  updateThemes(prefix){
    update_finished_triggered = false;
    Swal.fire({
        title: "Updating Themes...",
        allowOutsideClick: false,
        width: "500px",
        html: "<pre class='update-progress'>Please wait...\n</pre>",
        didOpen: () => {
            Swal.showLoading();
        },
    });
    setTimeout(function(){
        jQuery.ajax({
            url: "/wp-admin/admin-ajax.php",
            type: 'post',
            async: true,
            dataType: 'json',
            data: { _ajax_nonce: boomvars._wpnonce, action: 'safeupdates_ajax',  method: "updatethemes", prefix: prefix},
            success: function(data) {
                update_progress_counter = 0;
                update_finished_triggered = false;
                pinv = setInterval(function(){
                    checkProgressUpdate(prefix,true);
                },100)
            }
        })  
    },1000)  
}

function  checkProgressUpdate(prefix,is_theme = false){
    jQuery.ajax({
        url: "/wp-admin/admin-ajax.php",
        type: 'post',
        async: true,
        dataType: 'json',
        data: { _ajax_nonce: boomvars._wpnonce, action: 'safeupdates_ajax',  method: "updateprogress", prefix: prefix},
        success: function(data) {
            var text = jQuery.trim(data.response);
            if(text){
                if(text.match(/The site you have requested is not installed/) && !retrying_database){
                    clearInterval(pinv);
                    retrying_database = true;
                    $(".update-progress").text("Retrying database....");
                    update_finished_triggered = false;
                    update_progress_counter = 0;
                    setTimeout(function(){
                        getTables(prefix);
                    },2000);
                    return;
                   
                }
                update_progress_counter++;
                $(".update-progress").html(text);
                //$(".update-progress").scrollTop($(".update-progress").prop('scrollHeight'))
                if(update_finished_triggered && update_progress_counter == 70){
                    
                    clearInterval(pinv);
                    if(is_theme){
                        copy_log +=   "\n\n+++++++++++++++++++++++++++++++\n+++++++ Updating Themes +++++++ \n+++++++++++++++++++++++++++++++\n"+ $(".update-progress").text();
                        deleteUpdateProgress(prefix);
                    } else {
                        copy_log +=  "\n\n++++++++++++++++++++++++++++++++\n+++++++ Updating Plugins +++++++\n++++++++++++++++++++++++++++++++\n"+ $(".update-progress").text();
                        setTimeout(function(){
                            updateThemes(prefix);
                        },1000);
                       
                    }
                    
                }
                if(($(".update-progress").text().match(/Disabling Maintenance mode/i) ) && !update_finished_triggered){
                    update_progress_counter = 0;  
                    update_finished_triggered = true;
                }
                
               

            }
        
        
            
        }
    })    
}

function deleteCopyProgress(prefix){
    clearInterval(pinv);
    jQuery.ajax({
        url: "/wp-admin/admin-ajax.php",
        type: 'post',
        async: true,
        dataType: 'json',
        data: { _ajax_nonce: boomvars._wpnonce, action: 'safeupdates_ajax',  method: "deletecopyprogress", prefix: prefix, skip_database: (skip_database)?1:0},
        success: function(data) { 
            safeupdates_check_spawn_status(prefix,true);
        }
    })  
    
}
var pages_to_snapshot = 0
var current_snapshot_idx = 0
var snapshot_page_array = []

function takeSnapshot(is_dev){
    $(".snapshot-btn").find(".spinner-border").removeClass("d-none")
    $("#register-boom").find('.spinner-border').removeClass('d-none');
    $(".snapshot-btn").addClass("disabled text-dark")
    jQuery.ajax({
        url: "/wp-admin/admin-ajax.php",
        type: 'post',
        async: true,
        dataType: 'json',
        data: { _ajax_nonce: boomvars._wpnonce, action: 'safeupdates_ajax', method: "snapshot_requested", api_token: ""},
        success: function(data) {
           
            Swal.fire({
                title: "Requesting Snapshot...",
                allowOutsideClick: false,
                footer: "<div class='text-center'>Please wait...</div>",
                width: "500px",
                crossDomain: true,
                didOpen: () => {
                    Swal.showLoading();
                    jQuery.ajax({
                        url: boomvars.boom_url+"/api/webhook",
                        type: 'post',
                        async: true,
                        dataType: 'json',
                        data: { _ajax_nonce: boomvars._wpnonce, action: 'snapshot_via_plugin',  user: boomvars.user, spawns: boomvars.spawns, is_dev: is_dev}, // need to clarify dev
                        success: function(data) {
                           
                            $(".snapshot-btn").find(".spinner-border").addClass("d-none")
                            
                            //$(".btn-snapshot").remove()
                            if(data.result == "success"){
                                jQuery("#wpboom_pending_actions").val("snapshot_requested")
                                jQuery(".snapshot-requested").removeClass("d-none");
                                jQuery(".btn-group").addClass('disabled')
                                jQuery(".btn-trigger-create-modal").attr("disabled",true);
                                var remaining = data.snapshots_remaining
                                Swal.fire({
                                    title: "Snapshot Request Sent",
                                    width: "500px",
                                    html: data.message,
                                    icon: 'success'
                                });
                               
                                //$(".alert-site-pages").html('<span class="spinner-border spinner-border-sm" aria-hidden="true"></span> Waiting on snapshots. Refresh to check.')
                                
                                
                                
                            } else {
                                var msg = data.message
                                var title = data.title
                                jQuery(".spinner-border").addClass("d-none")
                                jQuery.ajax({
                                    url: "/wp-admin/admin-ajax.php",
                                    type: 'post',
                                    async: true,
                                    dataType: 'json',
                                    data: { _ajax_nonce: boomvars._wpnonce, action: 'safeupdates_ajax', method: "snapshot_error"},
                                    success: function(data) {
                                        Swal.fire({
                                            title: title,
                                            width: "500px",
                                            html: msg,
                                            icon: 'error'
                                        });
                                    }
                                })
                               
                            }
                        },
                        error: function (xhr) {
                            title = xhr.responseJSON.message;
                            jQuery(".spinner-border").addClass("d-none")
                            
                            Swal.fire({
                                title: xhr.statusText,
                                icon: "error",
                                html: xhr.responseJSON.message
                            });
                        }
                    })
                },
            });
        }
    })
    
    
        
            


    
}


function deprecated__takeSnapshot(prefix,pages_total,reference = 0,single_page = ''){
    current_snapshot_idx = 0
    pages_to_snapshot = pages_total
    if(single_page){
        pages_to_snapshot = 1
    }
    var title = "Taking Compare Snapshot"
    if(reference){
        title = "Taking Reference Snapshot"
    }
    Swal.fire({
        title: title,
        allowOutsideClick: false,
       
        footer: '<div class="progress w-100" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><div class="database-bar progress-bar" style="width: 0%"></div></div>',
        html: '<p class="text-center text-danger">SNAPSHOTS AND COMPARES ARE DONE IN REAL-TIME!</p><p class="text-center text-danger fw-bold">DO NOT CLOSE PAGE! </p><div class="snapshot-counter text-center fs-4">0/'+pages_to_snapshot+'</div>',
        didOpen: () => {
            Swal.showLoading();
            jQuery.ajax({
                url: "/wp-admin/admin-ajax.php",
                type: 'post',
                async: true,
                dataType: 'json',
                data: { _ajax_nonce: boomvars._wpnonce, action: 'safeupdates_ajax',  method: "get_pages", prefix: prefix, single_page:single_page},
                success: function(data) { 
                    snapshot_page_array = data.message
                    if(snapshot_page_array.length){
                        snapshot(prefix,snapshot_page_array[current_snapshot_idx],reference)
                    }
                   
                }
            }) 
          
        },
    });
}


function deleteUpdateProgress(prefix){
    clearInterval(pinv);
    jQuery.ajax({
        url: "/wp-admin/admin-ajax.php",
        type: 'post',
        async: true,
        dataType: 'json',
        data: { _ajax_nonce: boomvars._wpnonce, action: 'safeupdates_ajax',  method: "deleteupdateprogress", prefix: prefix},
        success: function(data) { 
            if(update_plugins){
                showLog(prefix);
            }
           
        }
    })  
    
}

function showLog(prefix){
    Swal.fire({
        title: "Log",
        allowOutsideClick: false,
        confirmButtonText: 'Close',
        width: "500px",
        html: "<pre style='height:500px;' class='update-progress'>"+copy_log+"</pre>",
    });  
    theme_update_triggered = false; 
    update_progress_counter = 0; 
    safeupdates_check_spawn_status(prefix,true); 
}

function  checkProgressCopy(prefix){
    jQuery.ajax({
        url: "/wp-admin/admin-ajax.php",
        type: 'post',
        async: true,
        dataType: 'json',
        data: { _ajax_nonce: boomvars._wpnonce, action: 'safeupdates_ajax',  method: "copyprogress", prefix: prefix},
        success: function(data) {
            var text = jQuery.trim(data.response);
            var lines = parseInt(data.message);
            var p = Math.floor((lines / copy_lines) * 100);
            $(".database-bar ").css({width: p+"%"}).text(p+"%")
            console.log(p+"%")
            if(text){
                copy_progress_counter++;
                $(".update-progress").html(text);
                //$(".update-progress").scrollTop($(".update-progress").prop('scrollHeight'))
                if(($(".update-progress").text().match(/speedup/i) ) && p >= 100 && !copy_finished_triggered){
                    copy_finished_triggered = true;
                    clearInterval(pinv);
                    copy_log +=   "\n+++++++++++++++++++++++++++++\n+++++++ Copying Files +++++++ \n+++++++++++++++++++++++++++++\n"+ $(".update-progress").text();
                    setTimeout(function(){
                        $(".update-progress").text('');
                        getTables(prefix);
                    },0)
                }
            }
        
        
            
        }
    })    
}

function getTables(prefix){

    jQuery.ajax({
        url: "/wp-admin/admin-ajax.php",
        type: 'post',
        async: true,
        dataType: 'json',
        data: { _ajax_nonce: boomvars._wpnonce, action: 'safeupdates_ajax',  method: "gettables", prefix: prefix, skip_database: (skip_database)?1:0, include_uploads: (include_uploads)?1:0},
        success: function(data) {
            tables = data.response
            if(tables.length > 0){
                total_queries = tables.length
                db_finished_triggered = false;
                queries = [];
                Swal.fire({
                    title: (skip_database)?"Finishing Setup...":"Generating Tables...",
                    allowOutsideClick: false,
                    width: "500px",
                    footer: '<div class="progress w-100" role="progressbar" aria-label="Basic example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><div class="database-bar progress-bar" style="width: 0%"></div></div>',
                    html: "<pre class='update-progress'>Please wait...\n</pre>",
                    didOpen: () => {
                        retrying_database = false;
                        Swal.showLoading();
                        if(skip_database){
                            jQuery(".swal2-footer").hide();
                            jQuery(".update-progress").remove();
                            deleteCopyProgress(prefix);
                            finishSetup(prefix, null);
                            
                            
                        } else {
                          
                            setTimeout(function(){
                                createTables(prefix);
                            },500)
                        }
                      
                    },
                });
               
               
                
            } else {
                Swal.fire({
                    title: "Spawn Failed",
                    html: "Table function did not return any queries. Please delete the site and try again!",
                    icon: 'error'
                });
            }
            
        }
    })  
}

function  createTables(prefix){
    if(tables.length > 0){
        var query = tables.shift();
        queries.push(query);
   
        jQuery.ajax({
            url: "/wp-admin/admin-ajax.php",
            type: 'post',
            async: true,
            dataType: 'json',
            data: { _ajax_nonce: boomvars._wpnonce, action: 'safeupdates_ajax',  method: "createtables", query: query, prefix: prefix},
            success: function(data) {
                var p = Math.floor(((total_queries - tables.length) / total_queries) * 100)
                $(".database-bar ").css({width: p+"%"}).text(p+"%")
                $(".update-progress").append("\n"+query);
                //$(".update-progress").append("\nProgress: "+p+"%");
                //$(".update-progress").scrollTop($(".update-progress").prop('scrollHeight'))
                createTables(prefix)
            }
        }) 
    } else {
        deleteCopyProgress(prefix);
        copy_log +=   "\n\n+++++++++++++++++++++++++++++++\n+++++++ Generating Tables +++++++\n+++++++++++++++++++++++++++++++\n"+ $(".update-progress").text();
        if(update_plugins){
            updatePlugins(prefix);
        } else {
            Swal.hideLoading();
            showLog(prefix);
        }
    }
    
}
var plugins_were_updated = false
function list_plugins(prefix){
    plugins_were_updated = false
    jQuery.ajax({
        url: "/wp-admin/admin-ajax.php",
        type: 'post',
        async: true,
        dataType: 'json',
        data: { _ajax_nonce: boomvars._wpnonce, action: 'safeupdates_ajax',  method: "list_plugins", prefix: prefix },
        success: function(data) {
            if(data.response == "success"){
                data.message = JSON.parse(data.message)
                html = '<p>Only active plugins with available updates will be listed listed. Please keep window open during process.</p><div class="table-responsive" style="max-height:400px;"><table class="table table-striped">\
                <thead class="table-dark sticky-top"><tr><th>Plugin</th><th>Version</th><th>Update Version</th><th>WordFence</th><th><button type="button" data-plugin="all" data-prefix="'+prefix+'" class="btn-update-plugin btn-update-all btn btn-light btn-sm"><div class="spinner-border spinner-border-sm d-inline-block d-none" role="status"></div> UPDATE ALL</button></th></tr></thead><tbody>'
                var update_count = 0
                var updates_available = false
                for(var i in data.message){
                    var action = ""
                    if(data.message[i].update == "available" && data.message[i].status == "active"){
                        update_count ++
                        var action = '<button type="button" data-plugin="'+data.message[i].name+'" data-prefix="'+prefix+'" class="float-end btn-update-plugin btn btn-secondary btn-sm"><div class="spinner-border spinner-border-sm d-inline-block d-none" role="status"></div> <span class="status-txt">UPDATE</span></button>'
                        html += '<tr>\
                        <td>'+data.message[i].title+'</td>\
                        <td>'+data.message[i].version+'</td>\
                        <td>'+data.message[i].update_version+'</td>\
                        <td><a href="https://www.wordfence.com/threat-intel/vulnerabilities/search?search='+data.message[i].name+'&cwe_type=-&cvss_rating=-&date_month=-&date_year=" title="Search WordFence" target="_blank">link</a></td>\
                        <td align="right">'+action+'</td>\
                        </tr>'
                        updates_available = true
                    } 
                   
                }
                
                if(update_count == 0){
                    updates_available = false
                    html += '<tr>\
                    <td colspan="5" class="text-center">There are not any plugin updates available.</td>\
                    </tr>'
                    
                }
                html += '</tbody></table><p>After updates are completed you can visit the site or check status from the \'Actions\' dropdown menu.</p><div class="alert alert-success alert-updates-complete d-none"><i class="fa-solid fa-check"></i> Updates have been completed.</div><div class="alert alert-danger alert-updates-error d-none"><i class="fa-solid fa-circle-exclamation"></i> There were errors. Login to your dev site and process updates there to see if a specific reason is given.</div></div>'
                
                Swal.fire({
                    position: 'middle',
                    maxHeight: "80%",
                    title: 'Update Plugins',
                    html: html,
                    showCancelButton: true,
                    cancelButtonText: "DISMISS",
                    confirmButtonColor: "#73a81e",
                    didOpen: () => {
                        
                        if(updates_available){
                            jQuery(".swal2-confirm").addClass("disabled")
                        } else {
                            jQuery(".btn-update-all").addClass("disabled");
                        }
                        
                        jQuery(".btn-update-plugin").on("click",function(){
                            var prefix = jQuery(this).data('prefix')
                            var plugin = jQuery(this).data('plugin')
                           
                            jQuery(".alert-updates-complete").addClass("d-none")
                            jQuery(".alert-updates-error").addClass("d-none")
                            update_queue = []
                            queue_index = 0
                            if(plugin == "all"){
                                updateInv = 0
                               
                                jQuery(".btn-update-plugin").not(jQuery(this)).each(function(){
                                    if(!jQuery(this).hasClass("btn-success") && !jQuery(this).hasClass("btn-danger")){
                                        update_queue.push(jQuery(this).data("plugin"))
                                    }
                                })
                                doUpdateQueue(prefix)
                                
                            } else {
                                update_queue.push(plugin)
                                doUpdateQueue(prefix)
                            }
                            
                        })
                    },
                    
                }).then((result) => {
                    if (result.isConfirmed) {
                        //takeSnapshot(prefix,jQuery("#"+prefix+"-snapshots").find(".site-page").length,0)
                    }
                })
              
            } else {
               
                Swal.fire({
                    title: data.message,
                    icon: 'error'
                });
            }
        
        
        }
    }) 
}


function doUpdateQueue(prefix){
    plugin = update_queue[queue_index]
    var btn = jQuery("button[data-plugin='"+plugin+"']")
    btn.find(".spinner-border").removeClass("d-none")
    btn.find(".status-txt").text("UPDATING");
    btn.prop("disabled",true)
    console.log("updating " + plugin + "...")
    //jQuery(".swal2-cancel").addClass("disabled")
    jQuery.ajax({
        url: "/wp-admin/admin-ajax.php",
        type: 'post',
        async: true,
        dataType: 'json',
        data: { _ajax_nonce: boomvars._wpnonce, action: 'safeupdates_ajax',  method: "update_plugin", prefix: prefix, plugin_name: plugin },
        success: function(data) {
            
            var updateError = false;
            if(data.response == "success" && data.message){
                plugins_were_updated = true
                data.message = JSON.parse(data.message)
                btn.toggleClass("btn-secondary btn-success")
                btn.find(".spinner-border").addClass("d-none")
                if(typeof data.message.status != 'undefined'){
                    if(data.message.status){
                        if(data.message.status == "Error"){
                            updateError = true;
                            btn.addClass("btn-danger").removeClass("btn-success")
                        }
                        btn.find(".status-txt").text(data.message.status.toUpperCase())
                    } else {
                        btn.find(".status-txt").text("UPDATED")
                    }
                } else {
                    btn.find(".status-txt").text("UPDATED")
                }
                
                
                jQuery("#"+prefix).find(".updated-date").html(data.data)
              
                
            } else {
                btn.find(".spinner-border").addClass("d-none")
                btn.toggleClass("btn-secondary btn-danger")
                btn.text("Failed")
            }
            
            
            
            queue_index++
            if(queue_index < update_queue.length){
                doUpdateQueue(prefix)
            } else {
                if(updateError){
                    jQuery(".alert-updates-error").removeClass("d-none")
                } else {
                    jQuery(".alert-updates-complete").removeClass("d-none")
                }
                
               
                safeupdates_check_spawn_status(prefix)
                //takeScreenshot(prefix)
                
                jQuery(".swal2-cancel").removeClass("disabled")
                jQuery(".swal2-confirm").removeClass("disabled")
            }
        }
    })
}

function deleteSite(prefix){
    Swal.fire({
        title: "Delete Site",
        html: "This will delete all files related to the site and all related tables from the database!",
        //footer: "TODO: If this site is connected to WPBOOM, it will be removed.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "red",
        allowOutsideClick: false,
        confirmButtonText: "Delete Site",
    }).then((result) => {
        if (result.isConfirmed) {
            showLoading("Deleting Site...");
            setTimeout(function(){
                jQuery.ajax({
                    url: "/wp-admin/admin-ajax.php",
                    type: 'post',
                    async: true,
                    dataType: 'json',
                    data: { _ajax_nonce: boomvars._wpnonce, action: 'safeupdates_ajax',  method: "despawn", prefix: prefix },
                    success: function(data) {
                        if(data.response == "success"){
                           
                            if(jQuery("#api_token").val()){
                                // clear devsite
                                jQuery.ajax({
                                    url: boomvars.boom_url+"/api/webhook",
                                    type: 'post',
                                    async: true,
                                    dataType: 'json',
                                    data: { _ajax_nonce: boomvars._wpnonce, action: 'update_via_plugin', password: jQuery("#api_token").val(), dev_url: ""},
                                    success: function(data) {
                                        
                                    }
                            
                                })
                            }
                            
                            
                            Swal.fire({
                                position: 'middle',
                                icon: "success",
                                title: 'Site Successfully Deleted',
                                footer:'<div class="text-center">Reloading...</div>',
                                showConfirmButton: false,
                                didOpen: () => {
                                    Swal.showLoading();
                                    setTimeout(function(){
                                        window.location.reload();
                                    },1000)
                                },
                            })
                            animateCSS("#"+prefix, 'fadeOut').then((message) => {
                                $("#"+prefix).remove();
                                if($("#spawned_sites").find("tr").length == 0){
                                    $("#spawned_sites").append('<tr class="nosites"><td colspan="6">All active plugins are up-to-date.</td></tr>');
                                    $(".btn-trigger-create-modal").removeAttr("disabled")
                                }
                               
                            });
                        } else {
                            $("#"+prefix).remove();
                            Swal.fire({
                                title: data.message,
                                icon: 'error'
                            });
                        }
                    
                    
                    }
                })    
            },1)
            
        
        }
    });


}

function safeupdates_check_install_progress(prefix){
    jQuery.ajax({
        url: "/wp-admin/admin-ajax.php",
        type: 'post',
        async: true,
        dataType: 'json',
        data: { _ajax_nonce: boomvars._wpnonce, action: 'safeupdates_ajax',  method: "progress", prefix: prefix },
        success: function(data) {
            var progress = data.message;
            if(!progress) return;
            var steps =  jQuery("#"+prefix).find('.progress-steps')
            var laststep = steps.find("div:last");
            var regex = new RegExp(progress.split("*")[0],'i')

            if(!laststep.text().match(regex)){
                if(!laststep.hasClass('done')){
                    laststep.append('done');
                    laststep.addClass('done')
                }
               
                var cmd = progress.split("*")[0]
                progress = '<div>'+progress;
                if(data.message != "Finished"){
                    progress += '...</div>'
                } else {
                    clearInterval(progressinv);
                    progress += '.</div>'
                }
               
                var exp = new RegExp(cmd,"i")
                if(!steps.text().match(exp)){
                    steps.append(progress)
                }
                
            } else {
                if(data.message != "Finished"){
                    laststep.append('.')
                }
            }
            steps.scrollTop(steps.prop('scrollHeight'))
            if(data.message == "Finished"){
                clearInterval(progressinv);
                if(!Swal.isVisible()){
                    Swal.fire({
                        title: "Site Created!",
                        icon: 'success',
                        width: "500px",
                        html: '<div class="text-center">Reloading page...</div>',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                            setTimeout(function(){
                                window.onbeforeunload = null
                                window.location.reload();
                            },1000)
                        },
                    });
                }
                
            }
        }
    })  
}

function safeupdates_check_spawn_status(prefix,image = false){
    jQuery("#"+prefix).find("td[data-modified]").html('<span class="spinner-border spinner-border-sm" aria-hidden="true"></span><span role="status"> Checking...</span>')
    jQuery("#"+prefix).find("td.site_size").html('<span class="spinner-border spinner-border-sm" aria-hidden="true"></span><span role="status"> Checking...</span>')
    jQuery("#"+prefix).find("td[data-site_status]").html('<span class="spinner-border spinner-border-sm" aria-hidden="true"></span><span role="status"> Checking...</span>')
                
    jQuery.ajax({
        url: "/wp-admin/admin-ajax.php",
        type: 'post',
        async: true,
        dataType: 'json',
        data: { _ajax_nonce: boomvars._wpnonce, action: 'safeupdates_ajax',  method: "status", prefix: prefix },
        success: function(data) {
            if(data.response.code){
                var statusText  = data.response.message; 
                var statusColor  = 'success'; 
                var code = parseInt(data.response.code);
                switch(true){
                    case code >= 600:
                        statusColor  = 'danger';
                        statusText = "<span class='dashicons dashicons-warning'></span> WP BOOM cannot work unless its SSL certificate issue is fixed. <br>Spawned site responded with: " + statusText 
                        break;
                    case code >= 500:
                        statusColor  = 'danger'; 
                        break;
                    case code >= 300:
                        statusColor  = 'warning'; 
                        break;
                }
                if(data.response.code == "install"){
                    statusColor = 'danger';
                }
                if(data.response.code == "tables"){
                    statusColor = 'danger';
                }
                
                var button = jQuery('<span  class="fw-bold text-'+statusColor+' w-100"><span class="spinner-border spinner-border-sm d-none" aria-hidden="true"></span> <span class="btn-text">'+statusText+'</span></span>');
                if(data.response.code == "install"){
                    button.on("click",function(){
                        jQuery(this).unbind('click');
                        jQuery(this).find(".spinner-border").removeClass("d-none")
                        jQuery(this).find(".btn-text").text("Please Wait...")
                       
                        finishSetup(prefix, jQuery(this));
                    })
                }
                if(statusColor == "success"){
                    jQuery("#"+prefix).find(".action-group:not(.disable-disabling)").removeClass("disabled")
                }
                if(statusColor == "success" && image){
                    //takeScreenshot(prefix)
                }
                jQuery("#"+prefix).find("td[data-site_status]").html('').append(button)
                jQuery("#"+prefix).find("td[data-modified]").html(data.response.modified)
                jQuery("#"+prefix).find("td.site_size").html(data.response.size)
                
                if(data.response.code == "tables"){
                    
                    jQuery(".btn-repair").unbind('click').on("click",function(){
                        var queries = jQuery(this).data('queries')
                        
                        var parent = jQuery(this).parent().parent().parent()
                        parent.html('<span class="spinner-border spinner-border-sm" aria-hidden="true"></span> <span>Updating Tables...</span>')
                        jQuery.ajax({
                            url: "/wp-admin/admin-ajax.php",
                            type: 'post',
                            async: true,
                            dataType: 'json',
                            data: { _ajax_nonce: boomvars._wpnonce, action: 'safeupdates_ajax',  method: "repair", queries: queries, prefix: prefix },
                            success: function(data) {
                                parent.html('<span class="spinner-border spinner-border-sm" aria-hidden="true"></span> <span>Updating Tables...Finished.</span>')
                                if(data.response){
                                   
                                    safeupdates_check_spawn_status(prefix)
                                }
                            }
                        });
                    }).trigger("click")
                } else if(statusColor == "success"){
                    if(jQuery("tr#"+prefix).hasClass("crawl-pages")){
                        //get_dev_pages(prefix)
                        
                    }
                    
                    
                }
                
            }
        
        
        }
    })  
}


function finishSetup(prefix,btn){
    jQuery.ajax({
        url: "/wp-admin/admin-ajax.php",
        type: 'post',
        async: true,
        dataType: 'json',
        data: { _ajax_nonce: boomvars._wpnonce, action: 'safeupdates_ajax',  method: "finishsetup", prefix: prefix },
        success: function(data) {
            if(data.response.admin_password && data.response.user_name){
                if(btn){
                    btn.find(".spinner-border").addClass("d-none")
                    btn.find(".btn-text").text("Setup Complete")
                    btn.removeClass('btn-warning').addClass('btn-success')
                }
               
                Swal.fire({
                    title: "Setup Complete",
                    html: '<p>Please login and change your password using the credentials below.</p><table class="table table-bordered">\
                        <tr>\
                            <th class="text-start">Email</th>\
                            <td class="text-start">'+data.response.admin_email+'</td>\
                        </tr>\
                        <tr>\
                            <th class="text-start">Username</th>\
                            <td class="text-start">'+data.response.user_name+'</td>\
                        </tr>\
                        <tr>\
                            <th class="text-start">Password</th>\
                            <td class="text-start" data-password="'+data.response.admin_password+'"><a href="#" class="reveal-password text-decoration-none text-primary">'+''.padStart(+data.response.admin_password.length, '•')+' Show Password</a></td>\
                        </tr>\
                    </table>',
                    confirmButtonText: "Login",
                    showCancelButton: true,
                    cancelButtonText: 'Close',
                    allowOutsideClick: false,
                    didOpen: () => {
                        safeupdates_check_spawn_status(prefix,true);
                        jQuery(".reveal-password").on("click",function(e){
                            e.preventDefault();
                            var pwd = jQuery(this).parent().data('password')
                            jQuery(this).replaceWith(pwd);
                        })
                        jQuery(".swal2-confirm").on("click",function(){
                            var login_url = window.location.origin + "/"+prefix+"/wp-login.php" ; 
                            window.open(login_url,'_blank')
                        })
                    },
                });
            }
        
        
        }
    })  
}

function safeupdates_do_copy_restrictions(){
    
    var target = document.querySelector('body.wp-admin');

    var observer = new MutationObserver(function(mutations) {
        if(!WPBOOM_INCLUDE_UPLOADS){
            if(jQuery("#wp-media-grid").length){
                if(!jQuery("#wp-media-grid").hasClass('disabled')){
                    Swal.fire({
                        title: "WP BOOM : Uploads are Disabled",
                        icon: 'warning',
                        width: "500px",
                        html: 'This copy shares the live sites uploads.',
                        allowOutsideClick: false
                    });
                    jQuery("#wp-media-grid:not(.disabled)").addClass("disabled")
                }
            }
           
           
        }
    });

    var config = {
        characterData: true,
        childList: true,
        attributes: true,
        subtree: true,
    };

    observer.observe(target, config);

    // otherwise
    //observer.disconnect();
    //observer.observe(target, config);
    //
}

function showLoading(title = ""){
    Swal.fire({
        title: title,
        footer:"<div class='text-center'>Please wait...</div>",
        width: "500px",
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        },
    });
}


function safeupdates_upload_intervention(){
    jQuery( document ).on( "ajaxComplete", function( event, xhr, settings ) {
        console.log(event, xhr, settings)   ;
    });
}

function checkPasswordStrength( $pass1,$pass2,$strengthResult,$submitButton,blacklistArray ) {
    var pass1 = $pass1.val();
    var pass2 = $pass2.val();
   
    // Reset the form & meter 
    
    $strengthResult.removeClass( 'short bad good strong' );
    // Extend our blacklist array with those from the inputs & site data 
    blacklistArray = blacklistArray.concat( wp.passwordStrength.userInputDisallowedList() )
    // Get the password strength 
    var strength = wp.passwordStrength.meter( pass1, blacklistArray, pass2 );
    // Add the strength meter results 
    $submitButton.addClass("disabled")
    console.log(pass1,pass2)
    if(!pass2 || !pass1){
        strength = 5
    }
    $strengthResult.removeClass("bad sbd-yellow-300 text-dark bd-red-500 text-light bd-green-300 text-success bd-green-500 text-light bd-red-200 text-danger").text(' ')
    switch ( strength ) {
       
        case 2:
            $strengthResult.addClass( 'bad bd-red-500' ).text( pwsL10n.bad );
            break;
        case 3:
            $strengthResult.addClass( 'bd-green-300' ).text( pwsL10n.good );
            break;
        case 4:
            $strengthResult.addClass( 'bd-green-500 ' ).text( pwsL10n.strong );
            break;
        case 5:
            $strengthResult.addClass( 'bad bd-red-200' ).text( pwsL10n.mismatch );
            break;
        default:
            $strengthResult.addClass( 'bad bd-yellow-300' ).text( pwsL10n.short );
    }
    // The meter function returns a result even if pass2 is empty, 
    // enable only the submit button if the password is strong and 
    // both passwords are filled up 
    if(strength == 3 || strength == 4){
        $submitButton.removeClass("disabled")
    }
    return strength;
}

function get_dev_pages(prefix){
    
    var site_url = window.location.origin + "/" + prefix
    var hostname = new URL(site_url).hostname
    Swal.fire({
        title: "Crawling Site",
        allowOutsideClick: false,
        html: "<p class='text-center lead crawl-message'>Please Wait...</p>",
        width: "500px",
        didOpen: () => {
            Swal.showLoading()
        },
    });
    var pages = []
    jQuery.ajax({
        url: site_url,
        type: 'get',
        async: false,
        dataType: 'html',
        data: { },
        success: function(html) {
            jQuery(html).find("a").each(function(){
                try{
                    var url = jQuery(this).attr("href").rtrim("/")
                    const parsed_url = new URL(url)
                    if(url != site_url){
                        if(pages.indexOf(url) < 0 && parsed_url.hostname == hostname){
                            pages.push(url)
                        }
                    }
                   
                } catch(exception){

                }
            })
            let shuffled = pages
                .map(value => ({ value, sort: Math.random() }))
                .sort((a, b) => a.sort - b.sort)
                .map(({ value }) => value)
            pages = shuffled
            pages.length = 10
            pages.unshift(site_url)
           
            jQuery.ajax({
                url: "/wp-admin/admin-ajax.php",
                type: 'post',
                async: true,
                dataType: 'json',
                data: { _ajax_nonce: boomvars._wpnonce, action: 'safeupdates_ajax', method: "save_pages", prefix: prefix, pages:pages},
                success: function(data) {
                    var count = data.message
                    jQuery("tr#"+prefix).find(".page-count").text(count)
                    Swal.fire({
                        position: 'middle',
                        icon: "success",
                        title: 'Crawling Site...Completed',
                        html:'<div class="text-center">Reloading...</div>',
                        showConfirmButton: false,
                        didOpen: () => {
                            Swal.showLoading();
                            setTimeout(function(){
                                window.location.reload();
                            },1000)
                        },
                    })
                   
                    
                }
            })
            
        }
    })
   
    
}
function OpenQuick(url) {
    var windowcontents = url;
    var myWindow = window.open( windowcontents, "remote", "");
    myWindow.creator = self;
   
    setTimeout(function(){
    myWindow.close()
    },2000)
}