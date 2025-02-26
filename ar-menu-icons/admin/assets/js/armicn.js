(function($) {
    var ArmicnAdmin = {
        init: function() {
            ArmicnAdmin.pluginOptions();
            ArmicnAdmin.pluginDeactivation();
            $(document)
                .on('click.ArmicnAdmin', '.armicn_set_icon_toggle_in_nav_item', this.showModal)
                .on('click.ArmicnAdmin', '.armicn-modal-closer', this.hideModal)
                .on('click.ArmicnAdmin', '.armicn-save', this.updateIcon)
                .on('click.ArmicnAdmin', '.armicn_remove_icon_toggle_in_nav_item', this.deleteIcon)
                .on('change.ArmicnAdmin', '#armicn_source_select', this.getIconButtonsBySource)
                .on('change.ArmicnAdmin', '#armicn_variation_select', this.selectVariationOption)
                .on('change.ArmicnAdmin', '#armicn-modal input, #armicn-modal select,.wp-color-picker', this.enableSaveButton)
                .on('click.ArmicnAdmin', '#armicn-modal .armicn-icon-button, .color-selector', this.enableSaveButton)
        },
        ajaxLoader: function(display = true) {
            $('#armicn-modal .ajax-loader').css('display', display ? 'flex' : 'none');
        },
        enableSaveButton: function () { 
            $('div#armicn-modal .armicn-modal-body .action-bar .armicn-save').removeAttr('disabled');
        },
        selectVariationOption: function (e) { 

            let icon_source = $('#armicn_source_select').val();

            if(icon_source == 'fontawesome'){
                iconVariation = $(this).val();
                ArmicnAdmin.getIconButtons(icon_source, iconVariation);
            }

            
        },
        getIconSettings: function (menuItemId) { 
            //console.log('menuItemId', menuItemId);
            
            $.post(armicn_ajax.ajaxurl, {
                action: "armicn_get_icon_settings",
                menu_item_id: menuItemId,
                nonce: armicn_ajax.nonce
            }).done(function(response) {
                
              // console.log(response);
               
                if (response.success && response.data !='') {

                   let savedIcon = response.data.content.icon;
                   let css = response.data.css;
                   let fontSize = css.icon_font_size,
                        marginBottom = css.icon_margin_bottom,
                        marginLeft = css.icon_margin_left,
                        marginRight = css.icon_margin_right,
                        marginTop = css.icon_margin_top,
                        position = css.icon_position;

                    $('#armicn_items_css input[name="icon_font_size"]').val(fontSize);
                    $('#armicn_items_css input[name="icon_margin_left"]').val(marginLeft);
                    $('#armicn_items_css input[name="icon_margin_right"]').val(marginRight);
                    $('#armicn_items_css input[name="icon_margin_top"]').val(marginTop);
                    $('#armicn_items_css input[name="icon_margin_bottom"]').val(marginBottom);


                    if(savedIcon !== ''){
                        $('#armicn_settings_form input.saved-icon').val(savedIcon);
                    }
                    if(position != ''){
                        $('select#icon_position_select').val(position);
                    }
                }
                
            });
         },
        showModal: function() {
            //ArmicnAdmin.ajaxLoader();
            var menuItemId = $(this).attr('data-menu_item_id'),
                icon_source = $(this).data('icon_source') || 'dashicon';

            $('#armicn_source_select option[value="'+icon_source+'"]').attr('selected', 'selected');

            $('#armicn-modal').css('display', 'flex');
            $('.armicn-save, .delete-rt-menu-item-options').attr('data-menu_item_id', menuItemId);
            
            if(icon_source == 'fontawesome'){
                $('#armicn_variation_select').css('display', 'inline-block');
            }

            ArmicnAdmin.getIconButtons(icon_source);

            ArmicnAdmin.getIconSettings(menuItemId);

            setTimeout(function() {
                ArmicnAdmin.inputScripts();
            }, 1000);

            //ArmicnAdmin.ajaxLoader(false);
        },
        hideModal: function() {
            $('#armicn-modal').hide();
        },
        createIconButtons: function (iconsArray, iconPrefix) { 
            
            let iconContainer = document.querySelector('.armicn_icons-selection-wrapper');
            iconContainer.innerHTML = '';
            iconsArray.forEach(element => {

                let iconBtn = document.createElement('button');
                iconBtn.className = 'armicn-icon-button';
                iconBtn.setAttribute('icon_class', `${iconPrefix}${element}`);
            
                // Create the span for the icon
                let iconSpan = document.createElement('span');
                iconSpan.className = `${iconPrefix}${element}`;
            
                // Create the span for the icon name
                let nameSpan = document.createElement('span');
                nameSpan.className = 'icon-name';
                nameSpan.textContent = element;
            
                // Append the spans to the button
                iconBtn.appendChild(iconSpan);
                iconBtn.appendChild(nameSpan);

                // Append the button to the container
                iconContainer.appendChild(iconBtn);

                $('input.armicon_search_icon').quicksearch('.armicn_icons-selection-wrapper .armicn-icon-button');
                ArmicnAdmin.inputScripts();
                
                
            });
        },
        getIconButtonsBySource: function() {
            let iconContainer = document.querySelector('.armicn_icons-selection-wrapper');
            let icon_source = $(this).val();
            let iconVariation = null;

            let FreeIconSources = ['dashicon', 'fontawesome', 'themify'];
            if(FreeIconSources.includes(icon_source)){
                if(icon_source == 'fontawesome'){
                    iconVariation = $('#armicn_variation_select').css('display', 'inline-block');
                    iconVariation = $('#armicn_variation_select').find(':selected').val();
                }
                ArmicnAdmin.getIconButtons(icon_source, iconVariation);
            }else{
                $(iconContainer).html('<p class="warning notice">Oops! This icon library is unavailable in the free version. Upgrade to the premium version to access it!</p>');
            }
            
        },
        getIconButtons: function(icon_source = 'dashicon', iconVariation = null) {

            

            iconPrefix = 'dashicons dashicons-'
            
            if(icon_source == 'fontawesome'){

                if(iconVariation == null) {
                    iconVariation = 'solid';
                }

                if(iconVariation == 'solid'){
                    iconPrefix = 'fas fa-';
                }else if(iconVariation == 'brands'){
                    iconPrefix = 'fab fa-';
                } else {
                    iconPrefix = 'far fa-';
                }
                // console.log('iconPrefix', iconPrefix);
                
                let apiUrl = armicn_ajax.plugin_dir_url + 'admin/assets/lib/font-awesome/json/'+iconVariation+'.json';

                ArmicnAdmin.getData(apiUrl)
                .then(icons => {
                    //icons = array;
                    const iconsArray = Object.keys(icons.icons);
                    // console.log(iconsArray);
                    
                    ArmicnAdmin.createIconButtons(iconsArray, iconPrefix)
                    
                })
                .catch(error => console.error('Error:', error));
                
            }else if(icon_source == 'themify'){

                
                iconPrefix = 'ti-';
                
                let apiUrl = armicn_ajax.plugin_dir_url + 'admin/assets/lib/themify/icons.json';

                ArmicnAdmin.getData(apiUrl)
                .then(icons => {
                    //icons = array;
                    const iconsArray = Object.values(icons.icons);
                    console.log(icons);
                    
                    ArmicnAdmin.createIconButtons(iconsArray, iconPrefix)
                    
                })
                .catch(error => console.error('Error:', error));
                
            }else if(icon_source == 'dashicon'){
                
                ArmicnAdmin.getData()
                .then(icons => {
                    //icons = array;
                    const iconsArray = Object.keys(icons);
                    ArmicnAdmin.createIconButtons(iconsArray, iconPrefix)
                    
                })
                .catch(error => console.error('Error:', error));
            }

            
           
        },
        updateIcon: function(that) {

            console.log(that);
            

            var $this = $(this),
                menu_item_id = $(this).attr('data-menu_item_id'),
                menu_id = $("#nav-menu-meta-object-id").val(),
                status_form = $('#armicn-modal .form-status'),
                btnParent = $('li#menu-item-' + menu_item_id),
                settings = ArmicnAdmin.getFormData('#armicn_settings_form'),
                css = ArmicnAdmin.getFormData('#armicn_items_css');

            ArmicnAdmin.ajaxLoader();

            console.log('menu_id', menu_id);
            console.log('menu_item_id', menu_item_id);
            

            $.post(armicn_ajax.ajaxurl, {
                action: "armicn_update_icon_options",
                settings: settings,
                css: css,
                menu_id: menu_id,
                menu_item_id: menu_item_id,
                nonce: armicn_ajax.nonce
            }).done(function(response) {
                if (response.success) {
                    status_form.html('<span class="armicn-text-success">Settings Saved!</span>');
                    btnParent.find('.armicn_saved_icon_wrapper').addClass('has-icon')
                        .find('.armicn_set_icon_toggle_in_nav_item').html('Change');
                    setTimeout(function() {
                        status_form.empty();
                    }, 2000);
                    ArmicnAdmin.hideModal();
                }
                ArmicnAdmin.ajaxLoader(false);
            });

        },
        deleteIcon: function() {
            var $this = $(this),
                menu_item_id = $this.attr('data-menu_item_id'),
                btnParent = $this.closest('li');

            ArmicnAdmin.ajaxLoader();
            $.post(armicn_ajax.ajaxurl, {
                action: "armicn_delete_icon",
                menu_item_id: menu_item_id,
                nonce: armicn_ajax.nonce
            }).done(function(response) {
                if (response.success) {
                    btnParent.find('.armicn_saved_icon').empty().removeClass('has-icon');
                    $this.html('Add Icon');
                }
                ArmicnAdmin.ajaxLoader(false);
            });
        },
        getFormData: function(selector) {
            var data = {};
            $(selector).find('input, select').each(function() {
                if ($(this).attr('type') !== 'submit' && $(this).attr('name') !== 'armicon_search_icon') {
                    data[$(this).attr('name')] = $(this).val();
                }
            });
            return data;
        },
        inputScripts: function() {
            $(function() {
                $('input[type="wpcolor"]').wpColorPicker({
                    change: function () { 
                        ArmicnAdmin.enableSaveButton();
                    }
                });
                $('.armicn-icon-button').click(function(e) {
                    e.preventDefault();
                    var $this = $(this),
                        menuItemId = $('.armicn-save').attr('data-menu_item_id'),
                        iconClass = $this.attr('icon_class');

                    $('.armicn-icon-button').removeClass('active-armicn');
                    $this.addClass('active-armicn');
                    $('#armicn_settings_form input[name="icon"]').val(iconClass);
                    $('#armicn_settings_form .saved_icon').html('<i class="' + iconClass + '"></i>');
                    $('#menu-item-' + menuItemId).find('.armicn_saved_icon').html('<i class="' + iconClass + '"></i>');
                    $('#armicn_remove_icon_toggle').show();
                    $('#armicn_set_icon_toggle').html('Change');
                });
                $('input.armicon_search_icon').quicksearch('.armicn_icons-selection-wrapper .armicn-icon-button');

                
            });
        },
        pluginOptions: function (that) {
            // Click function
            $('.armicn-settings-tabs  #tabs-nav li').click(function(){
                $('.armicn-settings-tabs  #tabs-nav li').removeClass('active');
                $(this).addClass('active');
                $('.armicn-settings-tabs  .tab-content').hide();
                var activeTab = $(this).find('a').attr('href');
                $(activeTab).fadeIn();
                return false;
            });
    
            $('input[type="wpcolor"]').wpColorPicker();
        },
        handle: async function handle(promise) {
            try {
              const result = await promise;
              return [null, result]; // No error, return [null, result]
            } catch (error) {
              return [error, null]; // Error occurred, return [error, null]
            }
        },
        getData: async function getData(apiUrl = armicn_ajax.plugin_dir_url + 'admin/assets/lib/dashicon/dashicons.json', iconSource='dashicon', variation=null) {
            const [error, response] = await ArmicnAdmin.handle(fetch(apiUrl));
            
            if (error) {
               console.error(error)// Replace with your error-handling logic
            }
          
            const data = await response.json(); // Assuming the response contains JSON
            //const dataArray = Array.isArray(data) ? data : [data]; // Ensure the result is an array

            // console.log(data);
            

            return data;
        },
        pluginDeactivation: function(){
            
              
           
        
            $('a#deactivate-ar-menu-icons').on('click', function (e) {
                e.preventDefault();
        
                const feedbackForm = `
                    <div id="ar-menu-icons-deactivation-popup">
                        <div class="ar-menu-icons-deactivation-popup-content">
                            <h3>Quick Feedback</h3>
                           <p>If you have a moment, please share why you are deactivating ${armicn_ajax.plugin_name}:</p>
                            <form id="deactivation-feedback-form">
                                <label><input type="radio" name="reason" value="No longer need the plugin"> I no longer need the plugin</label><br>
                                <label><input type="radio" name="reason" value="Found a better plugin"> I found a better plugin</label><br>
                                <label><input type="radio" name="reason" value="Couldn't get the plugin to work"> I couldn't get the plugin to work</label><br>
                                <label><input type="radio" name="reason" value="Temporary deactivation"> It's a temporary deactivation</label><br>
                                <label><input type="radio" name="reason" value="Other"> Other</label>
                                <textarea id="feedback-text" placeholder="Please provide additional details (optional)"></textarea>
                                <div class="buttons">
                                    <button type="button" id="submit-feedback">Submit & Deactivate</button>
                                    <button type="button" id="skip-feedback">Skip & Deactivate</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="deactivation-overlay"></div>
                `;
        
                $('body').append(feedbackForm);
        
                $('#submit-feedback').on('click', function () {
                   
                    const reason = $('input[name="reason"]:checked').val();
                    const feedback = $('#feedback-text').val();
        
                    if (!reason) {
                        alert('Please select a reason.');
                        return;
                    }
        
                    const feedbackData = {
                        feedback: feedback,
                        reason: reason,
                        plugin_name: armicn_ajax.plugin_name,
                        plugin_version: armicn_ajax.plugin_version,
                        user_email: armicn_ajax.user_email,
                        site_url: armicn_ajax.site_url
                    };
                    
                   
                    
                    fetch('https://arsyntax.com/wp-json/arsyntax/v1/submit-feedback', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                        },
                        body: JSON.stringify(feedbackData),
                    })
                    .then(response => response.json())
                    .then(data => {
                        window.location.href = e.target.href;
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });


                });
        
                $('#skip-feedback').on('click', function () {
                    window.location.href = e.target.href;
                });
        
                $('#deactivation-overlay').on('click', function () {
                    $('#ar-menu-icons-deactivation-popup, #deactivation-overlay').remove();
                });
            });
                
                
            
            
        }
    };

    ArmicnAdmin.init();
})(jQuery);





  
 

  


  