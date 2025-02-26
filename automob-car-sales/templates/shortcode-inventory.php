<div class="automob-inventory-controller">	
	<strong><p>Results Found: <?=sizeof($cars);?></p></strong>
	
	<div id="am-sorting">
		<label>Sort by:</label>
		<select id="am-field">
			<option value="price">Price</option>
		</select>
		<select id="am-direction">
		<?php if (isset($_GET['order_dir'])):?>
			<?php if ($_GET['order_dir']=="asc"):?>
				<option selected value="asc">ASC</option>
				<option value="desc">DESC</option>
			<?php else:?>
				<option value="asc">ASC</option>
				<option selected value="desc">DESC</option>
			<?php endif;?>		
		<?php else:?>
			<option selected value="asc">ASC</option>
			<option value="desc">DESC</option>
		<?php endif;?>
			
		</select>
	</div>

	<div class="am-car-list">

		<?php foreach ($cars as $car): ?>
		<?php if (($car->status=="Available")||(get_option('show-sold-cars')==true)):?>
		<div class="am-car-item automob-clearfix">
			<div class='row'>
				<div class="col-sm-8">
					<div class='row'>
						<div class="col-sm-5">
							<div class="am-car-image-container">
								<?php if (!empty($car->ribbon_url)): ?>
									<img class = "am-car-ribbon" src="<?=$car->ribbon_url;?>">	
								<?php endif; ?>
									<img class = "am-car-image" src="<?=$car->main_image_thumb;?>">	
							</div>
						</div>
						<div class="col-sm-7">
							<h2 class="am-car-title"><?=$car->title;?></h2>
							
							<div class="am-inventory-car-spec">
								<div class="row">
									<?php if (!empty($car->model_year)):?>
										<div class="col-md-4">
											Year
										</div>
										<div class="col-md-8">
											<?=$car->model_year;?>
										</div>
									<?php endif;?>	
								
									
									<?php if ($car->getFormattedMileage()):?>
										<div class="col-md-4">
											Mileage
										</div>
										<div class="col-md-8">
											<?=$car->getFormattedMileage();?>
										</div>
									<?php endif;?>	
					
									<?php if (!empty($car->transmission)):?>
										<div class="col-md-4">
											Transmission
										</div>
										
										<div class="col-md-8">
											<?=$car->transmission;?>
										</div>
									<?php endif;?>	

									<?php if (!empty($car->fuel)):?>
										<div class="col-md-4">
											Fuel
										</div>
										<div class="col-md-8">
											<?=$car->fuel;?>
										</div>
									<?php endif;?>	

									<?php if (!empty($car->status)):?> 
							       	    	<div class="col-md-4">
							       	    		Status
							       	    	</div>
							       	    	<div class="col-md-8">
							       	    		<?php if ($car->status=="Available"):?>
									       	    	<div class="am-status-available"><?= $car->status?></div>
									       	    <?php else:?>
									       	    	<div class="am-status-sold"><?= $car->status?></div>
									       	    <?php endif;?> 	
							       	    	</div>
									<?php endif;?> 


								</div>		
							</div>
							<?php if (!empty($car->location)):?>
								<span class="am-car-location"><?=$car->location;?></span>
							<?php endif;?>	
			        		
						</div>					
					</div>	
	        		
				</div>

				<div class="col-sm-4">
					<div class="right-content">
						<h2 class="am-car-price"><?=$car->getFormattedAskingPrice();?></h2>
						<a href="<?=$car->permalink;?>">View Car</a>
					</div>
				</div>
			</div>

		</div>
		<?php endif;?>
		<?php endforeach;?>	
	</div>
	<?php $car_posts->getPagination();?>
</div>
