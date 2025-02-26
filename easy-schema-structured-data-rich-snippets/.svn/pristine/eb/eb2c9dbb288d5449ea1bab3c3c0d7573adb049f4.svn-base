function esAdminSettingsSubmit() {
    
    var esAdminSettingData = new FormData(this);
    esAdminSettingData.append('es_admin_save_changes_button', 1);
    // Get save changes button for success functionality
    const esAdminSaveChangesBtn = document.getElementById('es-admin-save-changes-button');
    // Get upgrade button for success functionality
    const esAdminProUpgradeBtn = document.getElementById('es_admin_upgrade_button');
    //success message
    const esAdminSuccessMessage = document.getElementById('es_admin_save_changes_success');
    
    jQuery.ajax({
        type: 'POST',
        url: '/wp-admin/options.php',
        data: esAdminSettingData,
        processData: false,
        contentType: false,
        
        success: function () {
            console.log('Successfully saved the plugin settings.');

            esAdminSuccessMessage.style.display = 'block';
            
            setTimeout(() => {  
                esAdminSuccessMessage.style.display = 'none';
            }, 7500);
            
        },
        
        error: function () {
            console.log('Error: failed to save easy schema settings.');
        }
    });

    return false;
}

jQuery('#esAdminSaveSettings').submit(esAdminSettingsSubmit);