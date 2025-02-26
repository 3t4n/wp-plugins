<!-- Label -->
<div class="section">
  <span class="label">Field Label:</span><br />
  <input ng-model="field.label" type="text" name="fLabel" value="{{field.label}}"  /><br />
  <span class="description">The title for the field Label text goes here.</span>
</div>
<!-- Name -->
<div class="section">
  <span class="label">Field Name:</span><br />
  <input ng-model="field.name" type="text" name="fName" value="{{field.name}}"  />
  <br />
  <span class="description">The title for the field Name text goes here. Make it unique!!!</span>
</div>
<!-- Description -->
<div class="section">
  <span class="label">Field Description:</span><br />
  <textarea ng-model="field.description" type="text" name="fDescription" >{{field.description}}</textarea><br />
  <span class="description">Add a description for the field. It will show under the field</span>
</div>
<!-- Default -->
<div class="section">
  <span class="label">Field Default Value:</span><br />
  <input ng-model="field.default" type="text" name="fName" value="{{field.default}}"  /><br />
  <span class="description">Set a default value for this field</span>
</div>
<!-- Options List -->
<div class="section" ng-show="field.type=='selectCustom'">
  <span class="label">Options List:</span>
  <div class="" ng-repeat="option in field.options">
    Key:<input type="text" ng-model="option.key" name="key" value="{{option.key}}">
    Value:<input type="text" ng-model="option.value"  name="value" value="{{option.value}}">

    <input type="button" name="name" value="X" ng-click="deleteOption(field.options,$index)">
  </div>
  <button type="button" name="button" class="btn btn-success" ng-click="addOptionA(field.options)">+ Add</button>
  <span class="description">Each Row is a new list element. Keys and values are separated by a comma. <br/>Ex: <br/>key,value<br/>key,value<br/></span>
</div>

<!-- Post Status -->
<div class="section" ng-show="field.type=='selectPosts' || field.type=='selectPages'">
  <span class="label">Select a post status:</span><br/>
  <select ng-model="field.post_status">
    <option ng-repeat="status in pPStatuses" value="{{status.value}}">{{status.label}}</option>
  </select>
  <span class="description" ng-init="">Select the status you want you want to show.</span>
</div>

<h3> USAGE: </h3>
<p>
  <span>Example on how to use the field, how to get it's value:</span>
  <textarea name="name" rows="3">

    //Return this field

$value = get_post_meta( get_the_ID(), 'agaMb_{{mB.name}}{{field.name}}' );
  </textarea>

</p>
