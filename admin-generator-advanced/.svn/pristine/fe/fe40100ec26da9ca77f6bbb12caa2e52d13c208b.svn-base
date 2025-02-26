<div class="metaBoxesSettings" ng-show="this.pShow">
  <h4>Panel Settings</h4>
  <p>
    <label for="sLabel">Panel Label:</label><br />
    <input ng-model="mB.label" type="text" name="pSLabel" value="{{mB.label}}"  /><br />
    <span>The title for the panel Label text goes here. What ever the panel's (visible to the user) Name you want to be, here's where you set it.</span>
  </p>
  <p>
    <label for="sLabel">Panel Name:</label><br />
    <input ng-model="mB.name" type="text" name="pSName" value="{{mB.name}}"  /><br />
    <span>The title for the panel name goes here. It has to be unique, it's not visible by the user.</span>
  </p>
  <p>
    <label for="pPriority">Select Context:</label><br />
    <select class="pContext" ng-model="mB.context" name="pContext" ng-change="saveSettings()">
      <option ng-repeat="item in cArr" value="{{item.key}}">{{item.name}}</option>
    </select>
    <br>
    <span>Are these settings made for a theme or a plugin? select here. A list of themes or plugins will show in the next row, depending on your selection.</span>
  </p>
  <p>
    <label for="pPriority">Select Priority:</label><br />
    <select class="pPriority" ng-model="mB.priority" name="pPriority" ng-change="saveSettings()">
      <option ng-repeat="item in pArr" value="{{item.key}}">{{item.name}}</option>
    </select>
    <br>
    <span>Are these settings made for a theme or a plugin? select here. A list of themes or plugins will show in the next row, depending on your selection.</span>
  </p>
</div>
