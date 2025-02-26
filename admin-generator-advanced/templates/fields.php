<div class="fContainer" id="fieldsController" ng-controller="fieldsController as fC">
    <ul>
        <!-- ***********************************Individual metaBoxes START *******************************-->
        <!-- ng-repeat="mB in fieldArr" -->
        <li ng-repeat="field in mB.fields" class="field">
            <div class="hC">
                <div class="edit" ng-class="{show: this.fIShow}" ng-click="cFSettingsVis();setDefault(field)"></div>
                <div class="move">
                  <div class="up" ng-click="move('up',mB.fields,$index)"></div>
                  <div class="down" ng-click="move('down',mB.fields,$index)"></div>
                </div>
                <div class="label">
                    {{field.label}} - Type: {{field.type}}
                </div>
                <div class="delete" ng-click="mB.fields.splice($index, 1)"></div>
            </div>
            <div class="bC" ng-class="{show: this.fIShow}">
                <!-- Panel content START -->
                <!-- Panel Settings START -->
                <?php //require_once(plugin_dir_path( __FILE__ ) .'../templates/fieldSettings.php'); ?>

                <!-- Panel Settings END -->

                <!-- Panel FIELDS START -->
                <div class="fieldFields">
                    <?php require_once(plugin_dir_path(__FILE__) . '../templates/fieldsContent.php'); ?>
                </div>
                <!-- Panel FIELDS END -->

                <!-- Panel content END -->
            </div>
        </li>
    </ul>
    <div class="full-width center newField" ng-hide="this.iShow">
        <a class="btn btn-success addField" href="javascript:void(0);" ng-click="aFOptions()" ng-hide="bFC">+ Add
            Field</a>
        <div ng-show="bFC">
            <a class="btn btn-danger addField" href="javascript:void(0);" ng-click="aFOptions()">Cancel</a>
            <br/>
            <select ng-model="fModel" name="fieldOptions" ng-show="bFC" ng-change="addField(fModel,mB.fields)">
                <option ng-repeat="field in fieldsOptions" value="{{field.value}}">{{field.label}}</option>
            </select>
        </div>

    </div>
</div>
