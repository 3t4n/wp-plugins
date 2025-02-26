<div ng-app="automob-plugin" ng-controller="automob-search-form-controller"  class="automob-search-form clearfix">
	<form id="automob-search-form" action="<?=$args['permalink'];?>" method="get">
		<div class="row">
			<div class="col-md-6">
				<div class="am-field-holder">
					<label>Make</label>
				 	<select name="make" id="make" ng-change="update()" ng-init="filters['make'] = '<?=$args['defaults']['make'];?>'" ng-model="filters['make']" >
				 		<option  value="Any">All Makes</option>
				 		<option ng-repeat="option in filtered_cars| unique: 'make'" value="{{option.make}}">{{option.make}}</option>
				 	</select>
				</div>

				<div class="am-field-holder">
					<label class="am-search-model">Model</label>
				 	<select name="model" id="model" ng-change="update()" ng-model="filters['model']"  ng-init="filters['model'] = '<?=$args['defaults']['model'];?>'" >
				 		<option value="Any">All Models</option>
				 		<option ng-repeat="option in filtered_cars| unique: 'model'" value="{{option.model}}">{{option.model}}</option>
				 	</select>
				</div>

				<div class="am-field-holder">
				    <label>Condition</label>
				 	<select name="condition" id="condition" ng-change="update()" ng-model="filters['condition']" ng-init="filters['condition'] = '<?=$args['defaults']['condition'];?>'">
				 		<option value="Any">Any</option>
				 		<option ng-repeat="option in filtered_cars | unique: 'condition'" value="{{option.condition}}">{{option.condition}}</option>
				 	</select>
				</div>



			</div>
			<div class="col-md-6">
				<div class="max-min-holder">
					<label class="am-search-year">Min Year</label>
				 	<input type="range" value-type="value" id="model_year"  min='1900' value="<?=$args['defaults']['model_year'];?>" max="<?= date("Y"); ?>" name="model_year">
				</div>



				<div class="max-min-holder">
					<label>Max Price</label>
					<input type="range" value-type="currency" id="asking_price"  min='0' value="<?=$args['vehicle']->getMinMaxValues('_am_asking_price')['max']?>" max="<?=$args['vehicle']->getMinMaxValues('_am_asking_price')['max']?>" name="asking_price">
				</div>

				<div class="max-min-holder">
					<label>Max Mileage</label>
					<input type="range" value-type="distance" id="mileage" min='0' max="<?=$args['vehicle']->getMinMaxValues('_am_mileage')['max']?>" value="<?=$args['defaults']['mileage'];?>" name="mileage">
				</div>
			</div>

		</div>
		<a id="am-reset-form" ng-click='reset()' href="">Reset</a>
		<input type="submit" class="amcs-button" id="am-search-show-results" value="Show Results"></input>
	</form>	
</div>