<div id="agaSettCtrl" ng-controller="agaSettCtrl as agaS">
    <div class="row" ng-show="sShow">
        <div class="col-sm-12">
            <p>
                <label for="sLabel">Settings Title:</label><br/>
                <input ng-model="sLabel" ng-change="saveSettings()" type="text" id="slabel" name="sLabel"
                       value="{{sLabel}}"/><br/>
                <span>The title for the setting. Each setting is exportable, importable. You can name the setting what ever you want.</span>
            </p>
            <p>
                <label for="sDescription">Settings Description:</label><br/>
                <textarea name="sDescription" id="sDescription" rows="4" ng-model="sDescription"
                          ng-change="saveSettings()">{{sDescription}}</textarea><br/>
                <span>Text description of the setting. You can add here more details. Thy will show on import.</span>
            </p>
            <p>
                <label for="sTPOption">Theme or plugin:</label><br/>
            <div id="sTPOption">
                <input type="radio" ng-model="sTPOption" ng-change="loadPTs(sTPOption)" name="sTPOption" value="1">
                Theme -
                <input type="radio" ng-model="sTPOption" ng-change="loadPTs(sTPOption)" name="sTPOption" value="2">
                Plugin
            </div>
            <br>
            <span>Are these settings made for a theme or a plugin? select here. A list of themes or plugins will show in the next row, depending on your selection.</span>
            </p>
            <p>
                <label for="pTSelect">Please select:</label><br/>
                <select class="pTSelect" ng-model="pTSelect" id="pTSelect" name="pTSelect" ng-change="saveSettings()">
                    <option ng-repeat="pt in ptArr" value="{{pt.key}}">{{pt.name}}</option>
                </select>
                <br>
                <span>Are these settings made for a theme or a plugin? select here. A list of themes or plugins will show in the next row, depending on your selection.</span>
            </p>
            <p>
                <button class=" btn btn-danger resetSettings" ng-click="resetSettings()">Reset Settings</button>
                <br/>
                <b>WARNING!</b> Clicking this will set all the values in settings (only) to default (empty)<br/>
                You must save settings to save these settings
            </p>

            <h3>Import/export</h3>
            <p>
                Import or export the entire saved settings, options, everything
            </p>
            <p>
                <textarea name="importExport" ng-model="importExport" rows="10"></textarea>
            </p>
            <p>
                <button class="btn btn-primary import" ng-click="agaImport()">Import</button>
            </p>
            <p>The current array is set into the above textbox. Replace it with your own array and hit import to process a new one</p>
        </div>
    </div>