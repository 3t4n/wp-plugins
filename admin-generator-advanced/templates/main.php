<div ng-app="agaMain" class="agaMain">
    <h2>Admin Generator Advanced Settings</h2>
    <div class="container-fluid">
        <div class="row main-content" ng-controller="mainController as mainCtrl">
            <div class="col-md-12">
              <div class="row">
                <div class="col-lg-12">
                  <button type="button" name="button" class=" btn btn-success agaSettings" ng-click="showSettings()">Settings</button>
                </div>
              </div>
                <div class="row">
                    <?php require_once(plugin_dir_path( __FILE__ ) .'../templates/menus.php'); ?>
                      <?php require_once(plugin_dir_path( __FILE__ ) .'../templates/content.php'); ?>
                    </div>

                </div>
            </div>
        </div>
        <div class="row" id="restHTTP" ng-controller="restHTTP as rest" >
          <div class="col-lg-12">
            <br>
            <br>
            <button type="button" name="save" ng-click="saveData()">Save Settings</button>
          </div>
        </div>
    </div>
</div>
