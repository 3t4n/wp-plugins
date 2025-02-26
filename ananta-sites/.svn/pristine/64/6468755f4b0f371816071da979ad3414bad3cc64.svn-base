jQuery(document).ready(function ($) {

    const currentUrl = window.location.href;
    const hasThemeid = currentUrl.includes('theme_id');
    if (!hasThemeid) {

    /* For Filters on Grid */
    const filters = document.querySelectorAll('.filter');
    const themeTypeFilters = document.querySelectorAll('.theme_type-filter');

    filters.forEach(filter => {
        filter.addEventListener('click', function(e) {

            let selectedFilter = filter.getAttribute('data-filter');

            let itemsToHide = [];
            let itemsToShow = [];
            if (selectedFilter == 'demos') {
                itemsToHide = [];
                itemsToShow = document.querySelectorAll('.theme-grid-wrap [data-filter]');
            } else {
                let allItems = document.querySelectorAll('.theme-grid-wrap [data-filter]');
                allItems.forEach(el => {
                    let attrs_text = el.getAttribute('data-filter');
                    let attrs = attrs_text.split("|");
                    if(attrs.includes(selectedFilter)){
                        itemsToShow.push(el);
                    } else {
                        itemsToHide.push(el);
                    }
                });
            }

            itemsToHide.forEach(el => {
                el.classList.add('hide');
                el.classList.remove('show');
            });

            itemsToShow.forEach(el => {
                el.classList.remove('hide');
                el.classList.add('show'); 
            });
        });
    });

    themeTypeFilters.forEach(themeTypeFilter => {
        themeTypeFilter.addEventListener('click', function(e) { 
            let selectThemeType = themeTypeFilter.getAttribute('data-theme_type');
            let itemsToHide = document.querySelectorAll(`.theme-grid-wrap .grid-item:not([data-theme_type='${selectThemeType}'])`);
            let itemsToShow = document.querySelectorAll(`.theme-grid-wrap [data-theme_type='${selectThemeType}']`);

            if (selectThemeType == 'all') {
                itemsToHide = [];
                itemsToShow = document.querySelectorAll('.theme-grid-wrap [data-theme_type]');
            }

            itemsToHide.forEach(el => {
                el.classList.add('hide');
                el.classList.remove('show');
            });

            itemsToShow.forEach(el => {
                el.classList.remove('hide');
                el.classList.add('show'); 
            });
        });
    });
    
    /* Demo Categories Toggle */
    const catTabs = document.getElementById('category-navList');
    catTabs.addEventListener("click", (e) => {
        if (document.querySelector('#category-navList a.active') !== null) {
            document.querySelector('#category-navList a.active').classList.remove('active');
        }
        e.target.classList.add('active');
        // Toggle All after Category change
        themeTypeFilters.forEach(el => {
            el.classList.remove('active');
        });
        themeTypeFilters[0].classList.add('active');
    });

    /* Theme Types Toggle */
    const themeTypes = document.getElementById('themeType-navList');
    themeTypes.addEventListener("click", (e) => {
        if (document.querySelector('#themeType-navList a.active') !== null) {
            document.querySelector('#themeType-navList a.active').classList.remove('active');
        }
        e.target.classList.add('active');
        // Toggle All after ThemeType change
        filters.forEach(el => {
            el.classList.remove('active');
        });
        filters[0].classList.add('active');
    });
    const hasEditorElementor = currentUrl.includes('editor=elementor');

    if (hasEditorElementor) {
        // console.log('yes exist elementor');
        //search bar
        const searchFilter = document.getElementById('btn-search-theme');
        searchFilter.addEventListener('click', function(e) {

            let selectedFilter = searchFilter.getAttribute('uk-filter-control');
            let itemsToHide = [];
            let itemsToShow = [];

            if (selectedFilter == 'demos') {
                itemsToHide = [];
                itemsToShow = document.querySelectorAll('.theme-grid-wrap [data-name]');
            } else {
                let allItems =  document.querySelectorAll('.theme-grid-wrap [data-name]');
                allItems.forEach(el => {
                    let attrs_text = el.getAttribute('data-name');
                    let filter_text = el.getAttribute('data-filter');
                    if(attrs_text.includes(selectedFilter.toLocaleLowerCase()) || filter_text.includes(selectedFilter.toLocaleLowerCase())){
                        itemsToShow.push(el);
                    } else {
                        itemsToHide.push(el);
                    }
                });
            }

            itemsToHide.forEach(el => {
                el.classList.add('hide');
                el.classList.remove('show');
            });

            itemsToShow.forEach(el => {
                el.classList.remove('hide');
                el.classList.add('show'); 
            });
        });


        const optionMenu = document.querySelector(".select-menu"),
            selectBtn = optionMenu.querySelector(".select-btn"),
            options = optionMenu.querySelectorAll(".option"),
            sBtn_text = optionMenu.querySelector(".sBtn-text");

        selectBtn.addEventListener("click", () =>
            optionMenu.classList.toggle("active")
        );

        options.forEach((option) => {
            option.addEventListener("click", () => {
            let selectedOption = option.querySelector(".option-text").innerText;
            sBtn_text.innerText = selectedOption;

            optionMenu.classList.remove("active");
            
            if(selectedOption == 'Block Editor'){
                location.href = my_ajax_object.block_editor_url;
            }
            });
        });
    }  
    }


    /* Import Data */
    /* On btn-import click */

    jQuery("#btn-import").on("click", function ($) {
        let is_customizer_selected = jQuery("#import-customizer").is(":checked");
        let is_content_selected = jQuery("#import-content").is(":checked");
        let is_replace_content_selected = jQuery("#replace-content").is(":checked");
        let theme_id = jQuery("#theme_id").val();

        var theme_data = {
            'is_customizer_selected': is_customizer_selected,
            'is_content_selected': is_content_selected,
            'is_replace_content_selected': is_replace_content_selected
        }

        init_import(theme_id, theme_data);
        return false;
    });

    function init_import(theme_id, theme_data){
        data = {
            'action': 'import_action',
            'theme_id': theme_id,
            'check_import_nonce': my_ajax_object.nonce,
            'step': 'init'
        }
        jQuery.ajax({
            type: "POST", 
            url: my_ajax_object.ajax_url, 
            data: data,
            dataType: 'json',
            beforeSend: function(){
                // jQuery("#import-step-data").html("Importing theme data files...");

                jQuery("#progress-wrapper").removeClass('hide');
                jQuery("#progress-bar-wrapper").removeClass('hide');
                
                jQuery('#final-step-wrapper').addClass("hide");
                // jQuery(".progress-value").animate({ width:'5%'});
                // jQuery("#progress-percentage").html('5%');
                jQuery("#step_one").addClass('tab_active');
            },
            complete: function(){
                // jQuery(".progress-value").animate({ width:'25%'});
                // jQuery("#progress-percentage").html('25%');
                // jQuery("#import-step-data").html("Checking theme...");
                // jQuery("#step_one").removeClass('tab_active');
                // jQuery("#step_one").addClass('tab_inactive');
                // jQuery("#step_two").addClass('tab_active');

                
                jQuery("#step_one").removeClass('tab_active');
                jQuery("#step_one").addClass('tab_inactive');
                jQuery("#step_two").addClass('tab_active');
            },
            success: function (data) {
                if(data.status == 'ok') {
                    install_plugins(theme_id, theme_data);
                    $("#step_one a").text('Import Data Initialized');
                } else {
                    jQuery("#progress-error-wrapper").removeClass("hide");
                    jQuery("#import-error-text").html(data.msg);
                }
                console.log(data);
            }, 
            error: function (data) {
                console.log(data);
                alert("Something went wrong!, Contact Plugin Author For Further Help");
                console.log("Something went wrong! from : init import");
            }

        });
    }

    function install_plugins(theme_id, theme_data){
        data = {
            'action': 'import_action',
            'theme_id': theme_id,
            'check_import_nonce': my_ajax_object.nonce,
            'step': 'install_plugins'
        }
        jQuery.ajax({
            type: "POST", 
            url: my_ajax_object.ajax_url, 
            data: data,
            dataType: 'json',
            beforeSend: function(){
                // jQuery("#step_two a").text("Checking required plugins...");
            },
            complete: function(){
                // jQuery(".progress-value").animate({ width:'75%'});
                // jQuery("#progress-percentage").html('75%');
                // jQuery("#import-step-data").html("Required plugins installed/activated successfully.");
                jQuery("#step_two").removeClass('tab_active');
                jQuery("#step_two").addClass('tab_inactive');
                jQuery("#step_three").addClass('tab_active');
            },
            success: function (data) {
                if(data.status == 'ok') {
                    import_data(theme_id, theme_data);
                    $("#step_two a").text('Required Plugins Activated');
                } else {
                    jQuery("#progress-error-wrapper").removeClass("hide");
                    jQuery("#import-error-text").html(data.msg);
                }
                console.log(data);
            }, 
            error: function (data) {
                console.log(data);
                alert("Something went wrong!, Contact Plugin Author For Further Help");
                console.log("Something went wrong! from : install plugin");
            }

        });
    }

    function import_data(theme_id, theme_data){
        data = {
            'action': 'import_action',
            'theme_id': theme_id,
            'check_import_nonce': my_ajax_object.nonce,
            'step': 'import_data',
            'is_customizer_selected': theme_data.is_customizer_selected,
            'is_content_selected': theme_data.is_content_selected,
            'is_replace_content_selected': theme_data.is_replace_content_selected
        }
        jQuery.ajax({
            type: "POST", 
            url: my_ajax_object.ajax_url, 
            data: data,
            dataType: 'json',
            beforeSend: function(){
                $("#step_three a").text('Demo Importing');
            },
            complete: function(){
                // jQuery(".progress-value").animate({ width:'100%'});
                // jQuery("#progress-percentage").html('100%');
                // alert('complate');
                $("#step_three a").text('Demo Imported Successfully');
                setTimeout(function(){
                    jQuery("#step_three").addClass('tab_inactive');
                    jQuery("#step_three").removeClass('tab_active');
                    const jsConfetti = new JSConfetti();
                    const triggerConfetti = setTimeout(function(){
                    jsConfetti.addConfetti({
                            confettiNumber: 1000,
                            confettiRadius: 4,
                            confettiColors: [
                            "#d5ff00","#ff0015","yellow","#55ff00","#00e1ff","#ff5100",  
                            "#99ff00","#00ff6a","#0026ff","#fff200","#ffee00","#005eff",
                            "#91ff00","#d5ff00","#55ff00","#ff00d5","#3cff00","#ffbb00",
                            "#ff7700","#ff00a6","#2200ff","#ff8800","#3c00ff","#00ff48",
                            "#00aaff","#0009ff","#3cff00","#00ffb7","#bb00ff","#ffc800",  
                            "aqua","#001aff","#ff00d0","#00ffb7","#ff3300","#00ff80",
                            "#80ff00","red","#00ff6f","#80ff00","#ff006a","#ff3700",
                            "#44ff00","#ff2600","#0004ff","#00ffea","#b7ff00", "#bb00ff",
                            "#33ff00","#ff0084","#0059ff"
                            ],
                        });
                    }, 500); 
                }, 1000);
                
            },
            success: function (data) {
                // alert('success');
                jQuery("#step_four").removeClass('tab_active');
                jQuery("#step_four").addClass('tab_inactive');
                jQuery("#step_five").addClass('tab_active');
                if(data.status == 'ok') {
                    jQuery("#import-step-data").html("Theme data imported successfully.");
                    setTimeout(function(){
                        jQuery("#progress-bar-wrapper").addClass('hide');
                        jQuery("#visit-site-link").removeClass('hide');
                        jQuery("#progress-complete-wrapper").removeClass('hide');
                    }, 1500);
                } else {
                    jQuery("#progress-bar-wrapper").addClass('hide');
                    jQuery("#progress-error-wrapper").removeClass("hide");
                    jQuery("#import-error-text").html(data.msg);
                }
                console.log(data);
            }, 
            error: function (data) {
                console.log(data);
                alert("Something went wrong!, Contact Plugin Author For Further Help");
                console.log("Something went wrong! from : import data");
            }

        });
    }
});