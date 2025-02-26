<div class="single-car-container">
	<div class="row">
		<div class="col-sm-7">
			<h3><?= $vehicle->title?></h3>
		</div>
		<div class="col-sm-5">
			<h5><?= $vehicle->getFormattedAskingPrice();?></h5>
		</div>
	</div>

  	<div class="row">
	    <div class="col-sm-7">
	        <div id="car-item-details">
				<div class="am-car-image-container">
					<?php if (!empty($vehicle->ribbon_url)): ?>
						<img class = "am-car-ribbon" src="<?=$vehicle->ribbon_url;?>">	
					<?php endif; ?>
						<img  src="<?= $vehicle->main_image_large[0]?>">
				</div>
				
				<div class="automob-gallery clearfix">

					<?php foreach ($vehicle->images as $image): ?>
						<div class="col-xs-3 no-margins">
							<div class="gallery-images">
								<a  class="grouped_elements" rel="group1" href="<?=$image['image']?>"><img src="<?=$image['thumbnail']?>" alt=""/></a>
							</div> 
						</div>
					<?php endforeach; ?>											
				</div>

	        </div>
	    </div>

	    <div class="col-sm-5">
       	    <div class="automob-basic-specs-table">
       	    	<div class="row">
	       	    	<div class="col-sm-12">
		       	    	<div id="am-spec-description" class="am-spec-value"><?= $vehicle->description?></div>
	       	    	</div>
				</div>

				<?php if ($vehicle->getFormattedRetailPrice()):?> 
	       	    	<div class="row">
		       	    	<div class="col-xs-8">
		       	    		<div class="am-spec-label"><strong>Retail Price</strong></div>
		       	    	</div>
		       	    	<div class="col-xs-4">
			       	    	<div class="am-spec-value"><?= $vehicle->getFormattedRetailPrice();?></div>
		       	    	</div>
					</div>
				<?php endif;?> 
       	    	
       	    	<?php if ($vehicle->getFormattedMileage()):?> 
	       	    	<div class="row">
		       	    	<div class="col-xs-8">
		       	    		<div class="am-spec-label"><strong>Mileage</strong></div>
		       	    	</div>
		       	    	<div class="col-xs-4">
			       	    	<div class="am-spec-value"><?= $vehicle->getFormattedMileage();?></div>
		       	    	</div>
					</div>
				<?php endif;?> 

				<?php if (!empty($vehicle->model_year)):?> 
       	    	<div class="row">
	       	    	<div class="col-xs-8">
	       	    		<div class="am-spec-label"><strong>Year</strong></div>
	       	    	</div>
	       	    	<div class="col-xs-4">
		       	    	<div class="am-spec-value"><?= $vehicle->model_year?></div>
	       	    	</div>
				</div>
				<?php endif;?> 

				<?php if (!empty($vehicle->condition)):?> 
       	    	<div class="row">
	       	    	<div class="col-xs-8">
	       	    		<div class="am-spec-label"><strong>Condition</strong></div>
	       	    	</div>
	       	    	<div class="col-xs-4">
		       	    	<div class="am-spec-value"><?= $vehicle->condition?></div>
	       	    	</div>
				</div>
				<?php endif;?> 

				<?php if (!empty($vehicle->exterior_color)):?> 
       	    	<div class="row">
	       	    	<div class="col-xs-8">
	       	    		<div class="am-spec-label"><strong>Colour</strong></div>
	       	    	</div>
	       	    	<div class="col-xs-4">
		       	    	<div class="am-spec-value"><?= $vehicle->exterior_color?></div>
	       	    	</div>
				</div>
				<?php endif;?> 

				<?php if (!empty($vehicle->transmission)):?> 
       	    	<div class="row">
	       	    	<div class="col-xs-8">
	       	    		<div class="am-spec-label"><strong>Transmission</strong></div>
	       	    	</div>
	       	    	<div class="col-xs-4">
		       	    	<div class="am-spec-value"><?= $vehicle->transmission?></div>
	       	    	</div>
				</div>
				<?php endif;?> 


				<?php if (!empty($vehicle->fuel)):?> 
       	    	<div class="row">
	       	    	<div class="col-xs-8">
	       	    		<div class="am-spec-label"><strong>Fuel Type</strong></div>
	       	    	</div>
	       	    	<div class="col-xs-4">
		       	    	<div class="am-spec-value"><?= $vehicle->fuel?></div>
	       	    	</div>
				</div>
				<?php endif;?> 

				<?php if (!empty($vehicle->location)):?> 
       	    	<div class="row">
	       	    	<div class="col-xs-8">
	       	    		<div class="am-spec-label"><strong>Area</strong></div>
	       	    	</div>
	       	    	<div class="col-xs-4">
		       	    	<div class="am-spec-value"><?= $vehicle->location?></div>
	       	    	</div>
				</div>
				<?php endif;?> 

				<?php if (!empty($vehicle->status)):?> 
	       	    	<div class="row">
		       	    	<div class="col-xs-8">
		       	    		<div class="am-spec-label"><strong>Status</strong></div>
		       	    	</div>
		       	    	<div class="col-xs-4">
		       	    		<?php if ($vehicle->status=="Available"):?>
				       	    	<div class="am-spec-value am-status-available"><?= $vehicle->status?></div>
				       	    <?php else:?>
				       	    	<div class="am-spec-value am-status-sold"><?= $vehicle->status?></div>
				       	    <?php endif;?> 	
		       	    	</div>
					</div>
				<?php endif;?> 

			</div>

			<div class="row">
				<div class="col-sm-12">
					<a id="am-iam-intrested" class="amcs-button" href="#">Email Us</a>
				</div>
			</div>

			<div id="am-dim-background"></div>
	      
	      	<div id="car-item-form" >
			    <a title="Close" class="fancybox-item fancybox-close" id="am-close-form" href="javascript:;"></a>
		      	<h5>Contact Dealer</h5>
		      	<!-- <h5><?= $vehicle->asking_price?></h5> -->
				<form method="post" class="automob-contact-form">

					<input type="text" placeholder="Your Name" name="name" required>
					
					<input type="email" placeholder="Your Email" name="email" required>	
					
					
					<input type="text" placeholder="Your Phone" name="mobile">
					
					
					<input type="text" placeholder="Your Area" name="area" required>
					
					<input type="number" value="<?=$vehicle->id;?>"  name="vehicle-id" hidden>
					
					<textarea name="message" placeholder="Your Message" required></textarea>
					<br>
					<input type="submit" value="Contact Us"></input>
					
					<div id="am-ajax-result">
					</div>
					
					<div class="windows8" id="am-ajax-spinner">
						<div class="wBall" id="wBall_1">
							<div class="wInnerBall"></div>
						</div>
						<div class="wBall" id="wBall_2">
							<div class="wInnerBall"></div>
						</div>
						<div class="wBall" id="wBall_3">
							<div class="wInnerBall"></div>
						</div>
						<div class="wBall" id="wBall_4">
							<div class="wInnerBall"></div>
						</div>
						<div class="wBall" id="wBall_5">
							<div class="wInnerBall"></div>
						</div>
					</div>
					<input type="hidden" name="action" value="am_send_email" />	
				</form>
	      	</div>
	    </div>
  	</div>	
</div>


