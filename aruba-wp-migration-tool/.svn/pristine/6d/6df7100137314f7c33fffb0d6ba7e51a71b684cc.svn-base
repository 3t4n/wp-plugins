<?php

class AWMT_ViewMigrationProgressStep extends AWMT_MigrationStep
{
    private $reloadTime;
    function __construct()
    {
        parent::__construct(5, esc_html(__("Migrate",'aruba-wp-migration-tool'))  );
        $this->reloadTime = 5000;
    }
    public function canBeDone()
    {
        return $GLOBALS["AWMT_MIGRATION_FILE_MANAGER"]->isMigrationStarted();
    }

    public function draw()
    {

        $migrationInfo = $GLOBALS["AWMT_MIGRATION_FILE_MANAGER"]->getMigrationProgressInfo();

        $message = $migrationInfo->migrationStateName;

        if ($migrationInfo->isKilledByUser === true) {
            $this->killedByUserPanel($message);
            return;
        }
        if ($migrationInfo->isError === true) {
            $this->errorPanel($message);
            return;
        }
        if ($migrationInfo->isCompleted === true) {
            $this->migrationCompletedPanel();
            return;
        }

        // per il calcolo dell'avanzamento della progress bar
        $progress = ($migrationInfo->migrationState + 1) * 10;
        $this->migrationProgressPanel($message, $progress);
    }

    private function killedByUserPanel($message)
    {
        $revoke_api_url=AWMT_API_URL."revoke";

        $headers = array(
            'Content-Type' => 'application/json',
            'Authorization' => "Bearer " . esc_attr(sanitize_text_field($_SESSION["wp2wp-jwt"])),
            'token' => esc_attr(sanitize_text_field($_SESSION['wp2wp-migration-token']))
        );

        $response = WpOrg\Requests\Requests::delete($revoke_api_url,$headers);

        $data = $response->decode_body();
        /* DA CONTROLLARE*/
        switch($message) {
            case "chiamata orchestratore":$message_trsl=esc_html(__('Check import service','aruba-wp-migration-tool'));break;;
            case "creazione dump database":$message_trsl=esc_html(__('Database dump','aruba-wp-migration-tool'));break;
            case "verifica maintenance":$message_trsl=esc_html(__('Check requirements','aruba-wp-migration-tool'));break;
            case "finalizzazione installazione":$message_trsl=esc_html(__('Migrate','aruba-wp-migration-tool'));break;
            case "creazione pacchetti migrazione":$message_trsl=esc_html(__('Package creation','aruba-wp-migration-tool'));break;
            case "upload":$message_trsl=esc_html(__('Copy and upload data','aruba-wp-migration-tool'));break;
            default : $message_trsl=esc_html(__('Undefined','aruba-wp-migration-tool'));;break;
        }

        echo "<div class='wp2wp-panel wp2wp-text-center' style='padding: 20px; max-width:590px;'>
                <span class='wp2wp-icon error'></span>
                <h2 class='wp2wp-text-center' style='font-size: 22px;'>" . esc_html(__("Migration aborted", "aruba-wp-migration-tool") ). "</h2>
                 <p class='wp2wp-text-bold'>" . esc_html(__("The procedure was stopped by the user during the", "aruba-wp-migration-tool")) . "&nbsp;".esc_html($message_trsl)."</p>
                <hr class='wp2wp-mb wp2wp-mt' style='margin-left: 18%;margin-right: 18%;' >
                 
                <p style='margin-left: 18%;margin-right: 18%;'>
                <strong>".esc_html(__("I want to keep the mode maintenance", "aruba-wp-migration-tool"))."</strong>&nbsp;&nbsp;
                <span >
                <label class='switch maintenance'>
                  <input type='checkbox' name='maintenance' id='status-maintenance' ".  ( ($GLOBALS["AWMT_MIGRATION_FILE_MANAGER"]->isMaintenanceModeActive())?"checked":"" )." >
                  <span class='slider round'></span>
                  </label>
                  </span>
                </p>
                <p style='margin-left: 18%;margin-right: 18%;text-align: justify;'>
                " . esc_html(__("We recommend leaving your site in maintenance until you finish publishing on Aruba.", "aruba-wp-migration-tool")) . "
                 </p>
                <p style='margin-left: 18%;margin-right: 18%; text-align: justify;'>
                " . esc_html(__("By activating the maintenance mode, this site will be visible and any operation carried out will not be migrated to the site hosted by Aruba.", "aruba-wp-migration-tool")) . "
                </p>
                
                <form method='GET' action='" . esc_url(admin_url('admin-post.php')) . "'>
                    <input type='hidden' name='action' value='restart_migration'>
                    <input class='button-secondary' type='submit' type='submit' value='" . esc_attr(__("Start the migration process again", "aruba-wp-migration-tool")) . "'>
                </form>
        </div>";
        $files = scandir(AWMT_MIGRATION_FOLDER_PATH);
        $files = array_filter($files, function ($var) {
            return  $var !== "." && $var !== ".." ;
        });
        foreach ($files as $f) {
            $filePath = AWMT_MIGRATION_FOLDER_PATH. DIRECTORY_SEPARATOR . $f;
            wp_delete_file($filePath);
        }
       // wp_delete_file(AWMT_PROCESS_FOLDER_PATH . DIRECTORY_SEPARATOR . 'sss');
    }

    private function errorPanel($message){

        /* DA CONTROLLARE*/
        switch($message) {
            case "chiamata orchestratore":$message_trsl=esc_html(__('Check import service','aruba-wp-migration-tool'));break;;
            case "creazione dump database":$message_trsl=esc_html(__('Database dump','aruba-wp-migration-tool'));break;
            case "verifica maintenance":$message_trsl=esc_html(__('Check requirements','aruba-wp-migration-tool'));break;
            case "finalizzazione installazione":$message_trsl=esc_html(__('Migrate','aruba-wp-migration-tool'));break;
            case "creazione pacchetti migrazione":$message_trsl=esc_html(__('Package creation','aruba-wp-migration-tool'));break;
            case "upload":$message_trsl=esc_html(__('Copy and upload data','aruba-wp-migration-tool'));break;
            default : $message_trsl=esc_html(__('Undefined','aruba-wp-migration-tool'));;break;
        }

        echo "<div class='wp2wp-panel wp2wp-text-center' style='padding: 20px; max-width:590px;'>
                <span class='wp2wp-icon error'></span>
                <h2 class='wp2wp-text-center' style='font-size: 22px;'>" . esc_html(__("Migration failed", "aruba-wp-migration-tool")) . "</h2>
                 <p class='wp2wp-text-bold'>" . esc_html(__("An error occurred during the phase", "aruba-wp-migration-tool")) . "&nbsp;".esc_html($message_trsl)."</p>
                <hr class='wp2wp-mb wp2wp-mt' style='margin-left: 18%;margin-right: 18%;' >
                 <p>
                    " .  esc_html(__("We suggest you carry out the procedure again or", "aruba-wp-migration-tool")) ."<br>
                    <a href='" . esc_url(AWMT_ARUBA_HELP_URL) . "' target='_blank'>" . esc_html(__("Please see our dedicated Aruba Support page", "aruba-wp-migration-tool")) . "</a>
                </p>
                <p style='margin-left: 18%;margin-right: 18%;'>
                <strong>".esc_html(__("I want to keep the mode maintenance", "aruba-wp-migration-tool"))."</strong>&nbsp;&nbsp;
                <span >
                <label class='switch maintenance'>
                  <input type='checkbox' name='maintenance' id='status-maintenance' ".  ( ($GLOBALS["AWMT_MIGRATION_FILE_MANAGER"]->isMaintenanceModeActive())?"checked":"" )." >
                  <span class='slider round'></span>
                  </label>
                  </span>
                </p>
                <p style='margin-left: 18%;margin-right: 18%;text-align: justify;'>
                " . esc_html(__("We recommend leaving your site in maintenance until you finish publishing on Aruba.", "aruba-wp-migration-tool")) . "
                 </p>
                <p style='margin-left: 18%;margin-right: 18%; text-align: justify;'>
                " . esc_html(__("By deactivating the maintenance mode, this site will be visible and any operation carried out will not be migrated to the site hosted by Aruba.", "aruba-wp-migration-tool")) . "
                </p>
                
                <form method='GET' action='" . esc_url(admin_url('admin-post.php')) . "'>
                    <input type='hidden' name='action' value='new_migration'>
                    <input class='button-secondary' type='submit' type='submit' value='" .esc_attr( __("Start the migration process again", "aruba-wp-migration-tool") ). "'>
                </form>
        </div>";
        $files = scandir(AWMT_MIGRATION_FOLDER_PATH);
        $files = array_filter($files, function ($var) {
            return  $var !== "." && $var !== ".." ;
        });
        foreach ($files as $f) {
            $filePath = AWMT_MIGRATION_FOLDER_PATH. DIRECTORY_SEPARATOR . $f;
            wp_delete_file($filePath);
        }
       // wp_delete_file(AWMT_PROCESS_FOLDER_PATH . DIRECTORY_SEPARATOR . 'sss');

    }

    private function migrationCompletedPanel()
    {
        echo "<div class='wp2wp-panel wp2wp-text-center' style='padding: 20px; max-width:590px;'>
                <span class='wp2wp-icon ok'></span>
                <h2 class='wp2wp-text-center' style='font-size: 22px;'>" . esc_html(__("Migration complete", "aruba-wp-migration-tool")) . "</h2>
                <hr class='wp2wp-mb wp2wp-mt' style='margin-left: 18%;margin-right: 18%;' >
                <p style='margin-left: 18%;margin-right: 18%;'>
                <strong>".esc_html(__("I want to keep the mode maintenance", "aruba-wp-migration-tool"))."</strong>&nbsp;&nbsp;
                <span >
                <label class='switch maintenance'>
                  <input type='checkbox' name='maintenance' id='status-maintenance' ".  ( ($GLOBALS["AWMT_MIGRATION_FILE_MANAGER"]->isMaintenanceModeActive())?"checked":"" )." >
                  <span class='slider round'></span>
                  </label>
                  </span>
                </p>
                <p style='margin-left: 18%;margin-right: 18%;text-align: justify;'>
                " . esc_html(__("We recommend leaving your site in maintenance until you finish publishing on Aruba.", "aruba-wp-migration-tool")) . "
                 </p>
                <p style='margin-left: 18%;margin-right: 18%; text-align: justify;'>
                " . esc_html(__("By deactivating the maintenance mode, this site will be visible and any operation carried out will not be migrated to the site hosted by Aruba.", "aruba-wp-migration-tool")) . "
                </p>
                <a class='button' style='margin-top:24px;margin-bottom: 16px;' href='".esc_url(AWMT_ARUBA_CLIENT_AREA_URL)."' target='_blank'>".esc_html(__("Log in to the Aruba panel","aruba-wp-migration-tool")). "</a>
                <form method='GET' action='" . esc_url(admin_url('admin-post.php')) . "' style='margin-bottom: 30px;'>
                    <input type='hidden' name='action' value='new_migration'>
                    <input class='button-secondary' type='submit' type='submit' value='" . esc_attr(__("Start the migration process again", "aruba-wp-migration-tool")) . "'>
                </form>
        </div>";
        $files = scandir(AWMT_MIGRATION_FOLDER_PATH);
        $files = array_filter($files, function ($var) {
            return  $var !== "." && $var !== ".." ;
        });
        foreach ($files as $f) {
            $filePath = AWMT_MIGRATION_FOLDER_PATH. DIRECTORY_SEPARATOR . $f;
            wp_delete_file($filePath);
        }
       // wp_delete_file(AWMT_PROCESS_FOLDER_PATH . DIRECTORY_SEPARATOR . 'sss');
    }

    private function migrationProgressPanel($message, $progress)
    {
	    wp_enqueue_script(
		    'view-migration-progress-step',
		    WP_PLUGIN_URL .'/aruba-wp-migration-tool/src/migration-plugin/assets/js/view-migration-progress-step.js',
		    array('jquery'),
		    filemtime( WP_PLUGIN_DIR.'/aruba-wp-migration-tool/src/migration-plugin/assets/js/view-migration-progress-step.js' ),
		    array(
			    'strategy'  => 'async',
			    'in_footer'=>true
		    )
	    );

	    $js_param = array(
		    'awmt_ajax_url' => esc_url(admin_url( 'admin-ajax.php' )),
		    'awmt_ajax_url_migration_detail' => esc_url(admin_url('admin-ajax.php?action=migration_detail')),
		    'awmt_ajax_url_migration_error' => esc_url(admin_url('admin-ajax.php?action=setmigrationerror')),
		    'awmt_ajax_url_migration_complete' => esc_url(admin_url('admin-ajax.php?action=setmigrationcomplete')),
		    'awmt_ajax_url_step5'=> esc_url(admin_url(AWMT_STEPS_URL[5])),
	    );
	    wp_add_inline_script( 'view-migration-progress-step', 'const awmt_view_migration_progress_param = ' . wp_json_encode( $js_param ), 'before' );

        echo "<div class='wp2wp-panel' style='padding: 20px'>
                <h2 class='wp2wp-text-center actiontitle'>".esc_html(__("Migration in progress","aruba-wp-migration-tool"))."
                 <span>.</span><span>.</span><span>.</span>
                </h2>
             
                <div id='LiteralBarraStato'>
                  <div class='status-bar'>
                  
                    <div class='status-line'></div>
                    <div id='0' class='status-dot orange' style='top:0%;'>
                      <div class='status-label current'>".esc_html(__("Start of migration procedure","aruba-wp-migration-tool"))." </div> </div>
                   
                    
                     <div class='status-line'></div>
                     <div id='1' class='status-dot white' style='top:20%;'>
                       <div class='status-label'>".esc_html(__("Content downloading","aruba-wp-migration-tool"))." </div> 
                     </div>
            
                    
                     <div class='status-line'></div>
                     <div id='2' class='status-dot white' style='top:40%;'>
                       <div class='status-label'>".esc_html(__("Antivirus scan","aruba-wp-migration-tool"))." </div> 
                     </div>
            
                    
                    <div class='status-line'></div>
                    <div id='3' class='status-dot white' style='top:60%;'>
                      <div class='status-label'>".esc_html(__("Content transfer","aruba-wp-migration-tool"))." </div> 
                    </div>
              
                    
                    <div class='status-line'></div>
                    <div id='4' class='status-dot white' style='top:80%;'>
                      <div class='status-label'>".esc_html(__("Import, Configuration and Verification","aruba-wp-migration-tool"))." </div> 
                    </div>
                
                    
                    <div class='status-line'></div>
                    <div id='5' class='status-dot white' style='top:100%;'>
                      <div class='status-label'>".esc_html(__("Completed","aruba-wp-migration-tool"))." </div> 
                    </div>        
                  </div>
                </div>
                
                <hr class='wp2wp-mt wp2wp-mb'>
                <p class='wp2wp-text-center'>
                   " .esc_html( __("Based on the size of the folders to be migrated and the connection,","aruba-wp-migration-tool"))." 
                    <b>" . esc_html(__("the procedure may take up to a few hours.", "aruba-wp-migration-tool")) . "</b><br>
                    " . esc_html(__("Leave this page open to monitor the migration status, otherwise you can close it without compromising the completion of the operation.", "aruba-wp-migration-tool") ). "
                </p>
                <p class='wp2wp-text-center wp2wp-mb'>" . esc_html(__("You can continue to follow the progress of the process directly from the Aruba Hosting control panel of the space you are migrating to.", "aruba-wp-migration-tool")) . "</p>
                <form method='POST' action='" . esc_url(admin_url('admin-post.php')) . "' style='text-align: right;'>
                    <input type='hidden' name='action' value='stop_migration'>
                    <a class='button-secondary wp2wp-mr' href='" . esc_url(AWMT_ARUBA_CLIENT_AREA_URL) . "' target='_blank'>" . esc_html(__("Log in to the Aruba customer area", "aruba-wp-migration-tool")) . "</a>
                    <input class='button-secondary' type='submit' type='submit' value='" . esc_attr(__("Stop Migration", "aruba-wp-migration-tool")) . "'>
                </form>
            </div>";
    }
}
