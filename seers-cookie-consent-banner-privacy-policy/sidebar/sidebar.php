<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar</title>
    <link rel="stylesheet" href="<?php echo plugin_dir_url(__FILE__) . '../sidebar/sidebar.css'; ?>">
</head>
<body>
    <div class="seers-cms-sidebar">
        <div class="seers-cms-sidebar-header">
            <button class="seers-cms-sidebar-close-button">&times;</button>
        </div>
        <ul class="seers-cms-sidebar-menu">
            <li class="seers-cms-sidebar-menu-options" data-page="Dashboard"><a href="javascript:void(0);" ><img class="seers-cms-sidebar-icon" src="<?php echo plugin_dir_url(__FILE__) . '../images/dashboard.png'; ?>" alt="icon"><span class="seers-cms-sidebar-options"><?php esc_html_e('Dashboard', $this->textdomain);?></span></a></li>
            <li class="seers-cms-sidebar-menu-options" data-page="Account"><a href="javascript:void(0);" ><img class="seers-cms-sidebar-icon" src="<?php echo plugin_dir_url(__FILE__) . '../images/policy.png'; ?>" alt="icon"><span class="seers-cms-sidebar-options"><?php esc_html_e('Account Setup', $this->textdomain);?></span></a></li>
            <li class="seers-cms-sidebar-menu-options" data-page="Consent-Banner"><a href="javascript:void(0);" id="consent-banner-toggle"><img class="seers-cms-sidebar-icon" src="<?php echo plugin_dir_url(__FILE__) . '../images/consent-banner.png'; ?>" alt="icon"><span class="seers-cms-sidebar-options"><?php esc_html_e('Consent Banner', $this->textdomain);?> <img class="seers-cms-sidebar-dropdown-blue" src="<?php echo plugin_dir_url(__FILE__) . '../images/dropdown-blue.png'; ?>"></span></a></li>
            <div id="consent-banner-submenu" class="seers-cms-sidebar-consent-banner-expand">
                <li class="seers-cms-sidebar-menu-optionss" data-page="General"><a href="javascript:void(0);" id="general-toggle"><img id="general-icon" class="seers-cms-sidebar-icon-expand" src="<?php echo plugin_dir_url(__FILE__) . '../images/select-app.png'; ?>" alt="icon"><span class="seers-cms-sidebar-options"><?php esc_html_e('General', $this->textdomain);?></span></a></li>
                <li class="seers-cms-sidebar-menu-optionss" data-page="Appearance"><a href="javascript:void(0);" id="appearance-toggle"><img id="appearance-icon" class="seers-cms-sidebar-icon-expand" src="<?php echo plugin_dir_url(__FILE__) . '../images/no-select-app.png'; ?>" alt="icon"><span class="seers-cms-sidebar-options"><?php esc_html_e('Appearance', $this->textdomain);?></span></a></li>
            <div id="appearance-submenu" class="seers-cms-sidebar-appearance-expand">
                <li class="seers-cms-sidebar-menu-optionss" data-page="Settings"><a href="javascript:void(0);" id="settings-item"><img class="seers-cms-sidebar-icon-expand" src="<?php echo plugin_dir_url(__FILE__) . '../images/select-option.png'; ?>" alt="icon"><span class="seers-cms-sidebar-options"><?php esc_html_e('Settings', $this->textdomain);?></span></a></li>
                <li class="seers-cms-sidebar-menu-optionss" data-page="Visuals"><a href="javascript:void(0);" id="visuals-item"><img class="seers-cms-sidebar-icon-expand" src="<?php echo plugin_dir_url(__FILE__) . '../images/option.png'; ?>" alt="icon"><span class="seers-cms-sidebar-options"><?php esc_html_e('Visuals', $this->textdomain);?></span></a></li>
            </div>
            </div>
            <li class="seers-cms-sidebar-menu-options" data-page="Tracking-Manager"><a href="javascript:void(0);" ><img class="seers-cms-sidebar-icon" src="<?php echo plugin_dir_url(__FILE__) . '../images/tracking-manager.png'; ?>" alt="icon"><span class="seers-cms-sidebar-options"><?php esc_html_e('Tracking Manager', $this->textdomain);?></span></a></li>
            <li class="seers-cms-sidebar-menu-options" data-page="Frameworks"><a href="javascript:void(0);" ><img class="seers-cms-sidebar-icon" src="<?php echo plugin_dir_url(__FILE__) . '../images/framework.png'; ?>" alt="icon"><span class="seers-cms-sidebar-options"><?php esc_html_e('Frameworks', $this->textdomain);?></span></a></li>
            <li class="seers-cms-sidebar-menu-options" data-page="Privacy-Policy"><a href="javascript:void(0);" ><img class="seers-cms-sidebar-icon" src="<?php echo plugin_dir_url(__FILE__) . '../images/policy.png'; ?>" alt="icon"><span class="seers-cms-sidebar-options"><?php esc_html_e('Privacy Policy', $this->textdomain);?></span></a></li>
            <li class="seers-cms-sidebar-menu-options" data-page="Reports"><a href="javascript:void(0);" ><img class="seers-cms-sidebar-icon" src="<?php echo plugin_dir_url(__FILE__) . '../images/reports.png'; ?>" alt="icon"><span class="seers-cms-sidebar-options"><?php esc_html_e('Reports', $this->textdomain);?></span></a></li>
            <li class="seers-cms-sidebar-menu-options" data-page="UserGuide"><a href="javascript:void(0);" ><img class="seers-cms-sidebar-icon" src="<?php echo plugin_dir_url(__FILE__) . '../images/user-guide.png'; ?>" alt="icon"><span class="seers-cms-sidebar-options"><?php esc_html_e('User Guide', $this->textdomain);?></span></a></li>
        </ul>
        <div class="seers-cms-sidebar-borders">
            <ul class="seers-cms-sidebar-menu seers-cms-sidebar-menu-extras">
                <li class="seers-cms-sidebar-links"><a href="https://seersco.com/price-plan" target="_blank"><?php esc_html_e('Pricing Plan', $this->textdomain);?></a></li>
                <li class="seers-cms-sidebar-links"><a href="mailto:support@seersco.com"><?php esc_html_e('Support', $this->textdomain);?></a></li>
                <li class="seers-cms-sidebar-links"><a href="https://seersco.com/contact/" target="_blank"><?php esc_html_e('Need any help?', $this->textdomain);?></a></li>
            </ul>
        </div>
        <div class="seers-cms-sidebar-footer">
        <a href="https://www.facebook.com/seersgroupltd?mibextid=ZbWKwL" target="_blank">
            <img class="seers-cms-social-links" src="<?php echo plugin_dir_url(__FILE__) . '../images/facebook.png'; ?>">
        </a>
        <a href="https://x.com/seersco" target="_blank">
            <img class="seers-cms-social-links" src="<?php echo plugin_dir_url(__FILE__) . '../images/twitter.png'; ?>">
        </a>
        <a href="https://www.linkedin.com/company/seersco/" target="_blank">
            <img class="seers-cms-social-links" src="<?php echo plugin_dir_url(__FILE__) . '../images/linkedin.png'; ?>">
        </a>
        </div>
    </div>
    
    <script>
        const toggleButton = document.querySelector('.seers-cms-toggle-button');
        const sidebar = document.querySelector('.seers-cms-sidebar');
        const closeButton = document.querySelector('.seers-cms-sidebar-close-button');
        const menuItems = document.querySelectorAll('.seers-cms-sidebar-menu-options');
        const consentBannerToggle = document.getElementById('consent-banner-toggle');
        const consentBannerSubmenu = document.getElementById('consent-banner-submenu');
        const appearanceToggle = document.getElementById('appearance-toggle');
        const appearanceSubmenu = document.getElementById('appearance-submenu');
        const generalToggle = document.getElementById('general-toggle');
        const generalIcon = document.getElementById('general-icon');
        const appearanceIcon = document.getElementById('appearance-icon');
        const settingsItem = document.getElementById('settings-item').querySelector('img');
        const visualsItem = document.getElementById('visuals-item').querySelector('img');
    
        window.addEventListener('load', () => {
            menuItems[0].classList.add('active');
        });
    
        toggleButton.addEventListener('click', () => {
            sidebar.classList.toggle('active');
            toggleButton.classList.toggle('active');
        });
    
        closeButton.addEventListener('click', () => {
            sidebar.classList.remove('active');
            toggleButton.classList.remove('active');
        });
    
        consentBannerToggle.addEventListener('click', (e) => {
            e.preventDefault();
            consentBannerSubmenu.classList.toggle('active');
            generalToggle.click();
        });
    
        appearanceToggle.addEventListener('click', (e) => {
            e.preventDefault();
            appearanceSubmenu.classList.toggle('active');
            generalIcon.src = '<?php echo plugin_dir_url(__FILE__) . '../images/no-select-app.png'; ?>';
            appearanceIcon.src = '<?php echo plugin_dir_url(__FILE__) . '../images/select-app.png'; ?>';
            settingsItem.src = '<?php echo plugin_dir_url(__FILE__) . '../images/select-option.png'; ?>';
            visualsItem.src = '<?php echo plugin_dir_url(__FILE__) . '../images/option.png'; ?>';
        });
    
        generalToggle.addEventListener('click', (e) => {
            e.preventDefault();
            generalIcon.src = '<?php echo plugin_dir_url(__FILE__) . '../images/select-app.png'; ?>';
            appearanceIcon.src = '<?php echo plugin_dir_url(__FILE__) . '../images/no-select-app.png'; ?>';
            appearanceSubmenu.classList.remove('active');
        });
    
        function switchIcons(selectedItem, unselectedItem, selectedIcon, unselectedIcon) {
            selectedItem.src = selectedIcon;
            unselectedItem.src = unselectedIcon;
        }
    
        settingsItem.parentElement.addEventListener('click', (e) => {
            e.preventDefault();
            switchIcons(settingsItem, visualsItem, '<?php echo plugin_dir_url(__FILE__) . '../images/select-option.png'; ?>', '<?php echo plugin_dir_url(__FILE__) . '../images/option.png'; ?>');
        });
    
        visualsItem.parentElement.addEventListener('click', (e) => {
            e.preventDefault();
            switchIcons(visualsItem, settingsItem, '<?php echo plugin_dir_url(__FILE__) . '../images/select-option.png'; ?>', '<?php echo plugin_dir_url(__FILE__) . '../images/option.png'; ?>');
        });
        menuItems.forEach(item => {
            item.addEventListener('click', (e) => {
                const clickedMenu = e.currentTarget.querySelector('.seers-cms-sidebar-options').textContent.trim();
                menuItems.forEach(i => i.classList.remove('active'));
                e.currentTarget.classList.add('active');
                if (clickedMenu !== 'Consent Banner') {
                    consentBannerSubmenu.classList.remove('active');
                    appearanceSubmenu.classList.remove('active');
                    generalIcon.src = '<?php echo plugin_dir_url(__FILE__) . '../images/no-select-app.png'; ?>';
                    appearanceIcon.src = '<?php echo plugin_dir_url(__FILE__) . '../images/no-select-app.png'; ?>';
                }
            });
        });
        window.addEventListener('load', () => {
    const defaultPage = 'Dashboard';
    const contentSections = document.querySelectorAll('.content-section');
    
    // Hide all sections except the Dashboard
    contentSections.forEach(section => {
        if (section.getAttribute('data-page') !== defaultPage) {
            section.style.display = 'none';
        }
    });
    
    // Handle sidebar menu clicks
    const menuItems = document.querySelectorAll('.seers-cms-sidebar-menu-options');
    menuItems.forEach(item => {
        item.addEventListener('click', function() {
            // console.log("hello",this.getAttribute('data-page'));
            const page = this.getAttribute('data-page');
            
            contentSections.forEach(section => {
                if (section.getAttribute('data-page') === page) {
                    section.style.display = 'block';
                } else {
                    section.style.display = 'none';
                }
            });
        });
    });
    const submenuItems = document.querySelectorAll('.seers-cms-sidebar-menu-optionss');
        submenuItems.forEach(item => {
            item.addEventListener('click', function() {
                // console.log("hello",this.getAttribute('data-page'));
                const page = this.getAttribute('data-page');
                
                contentSections.forEach(section => {
                    if (section.getAttribute('data-page') === page) {
                        section.style.display = 'block';
                    } else {
                        section.style.display = 'none';
                    }
                });
            });
        });
});

    </script>
    
</body>
</html>
