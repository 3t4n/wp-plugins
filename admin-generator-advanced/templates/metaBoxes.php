<div id="panelsCtrl" ng-controller="panelsCtrl as panel" class="panels">
    <?php require_once plugin_dir_path(__FILE__).'../templates/menuSettings.php'; ?>

    <div class="metaBoxes" ng-hide="mSettings">
        <ul class="pContainer">
            <!-- ***********************************Individual panels START *******************************-->
            <li ng-repeat="mB in panelArr" class="mB">
                <div class="hC">
                    <div class="expand {{eCClass}}" ng-click="changeVis(true,mB)"></div>
                    <div class="edit" ng-class="{show: this.pShow}" ng-click="cMBSettingsVis()"></div>
                    <div class="label">
                        {{mB.label}}
                    </div>
                    <div class="delete" ng-click="panelArr.splice($index, 1);"></div>
                    <div class="move">
                      <div class="up" ng-click="move('up',panelArr,$index)"></div>
                      <div class="down" ng-click="move('down',panelArr,$index)"></div>
                    </div>
                </div>
                <div class="bC" ng-class="{show: this.vis}">
                    <!-- Panel content START -->
                    <!-- Panel Settings START -->
                    <?php require_once plugin_dir_path(__FILE__).'../templates/panelSettings.php'; ?>

                    <!-- Panel Settings END -->

                    <!-- Panel FIELDS START -->
                    <div class="panelFields" ng-hide="this.pShow">
                        <?php require_once plugin_dir_path(__FILE__).'../templates/fields.php'; ?>
                    </div>
                    <!-- Panel FIELDS END -->

                    <!-- Panel content END -->
                </div>
            </li>
            <!-- ****************************** Individual panels END *******************************-->
        </ul>
        <div class="full-width center" ng-show="aMBShow">
            <a class="btn btn-success" href="javascript:void(0);" ng-click="addPanel()">+ Add Meta Box</a>
        </div>
    </div>
</div>
