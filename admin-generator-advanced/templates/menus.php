<div id="menuCtrl" class="col-sm-3 tabs" ng-controller="menuCtrl as mC">
    <ul>
        <li ng-repeat="menu in data.menus" class="menuItemClass" ng-mouseenter="hover = true " ng-mouseleave="hover = false">
          <div class="deleteMenu" ng-class="{visible: hover}" ng-click="delMenuItem(menu)">
            <span class="delete" aria-hidden="true"></span>
          </div>
          <div class="EditMenu"  ng-class="{visible: !menu.unique && hover}" ng-click="editMenuItem(menu)">
            <span class="edit" aria-hidden="true"></span>
          </div>
          <a ng-click="menuClick(menu)" href="javascript:void(0);" ng-class="{active : menu.selected}">{{menu.label}}</a>
        </li>
    </ul>
    <a href="javascript:void(0);" ng-click="showMenuOpt()" ng-hide="data.showMO" class=" btn btn-primary menuButton">+ Add</a>
    <div class="newMenuOptions" ng-show="data.showMO">
      <p>
      <a class="btn btn-danger menuButton" href="javascript:void(0);" ng-click="data.showMO=0">Cancel</a>
      </p>
      <select name="nMO" ng-model="nMO" ng-change="addMenu(nMO)">
          <option ng-repeat="mti in data.mO | filter: {show:true}" value="{{mti.type}}">{{mti.label}}</option>
      </select>
      <p>
        Selected option has the value of: {{MO}}
      </p>
    </div>
</div>
