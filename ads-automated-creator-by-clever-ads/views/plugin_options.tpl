<?php
/**

* NOTICE OF LICENSE

*

* This file is licenced under the Software License Agreement.

* With the purchase or the installation of the software in your application

* you accept the licence agreement.

*

* You must not modify, adapt or create derivative works of this source code

*

*  @author    Carlos García Vega

*  @copyright 2010-2021 CleverPPC S.L.

*  @license   LICENSE.txt

*/
?>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<body>
	<div id="my-custom-font" class="d-flex flex-column bd-highlight mb-3">
	
		<!-- WHITE ZONE -->
		<div class="p-2 bd-highlight align-items-center white-zone">
			<div class="row" style="margin-bottom: 30px">
				<div class="col-6 header-images">
					<img style="height: 100%" src="../wp-content/plugins/google-ads-automated-creator-by-clever-ads/assets/cleveradslogo.png">
				</div>
				<div class="col-6 header-images d-flex">
					<img class="ml-auto" style="height: 100%" src="../wp-content/plugins/google-ads-automated-creator-by-clever-ads/assets/wordpresslogo.png">
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 col-md-7">
					<div class="title-white"><?php echo $data["headline"] ?></div>
					<div class="list-white">
						<div class="item-white">
							<img src="../wp-content/plugins/google-ads-automated-creator-by-clever-ads/assets/check.svg">
							<?php echo $data["tip1"] ?>
						</div>
						<div class="item-white">
							<img src="../wp-content/plugins/google-ads-automated-creator-by-clever-ads/assets/check.svg">
							<?php echo $data["tip2"] ?>
						</div>
						<div class="item-white">
							<img src="../wp-content/plugins/google-ads-automated-creator-by-clever-ads/assets/check.svg">
							<?php echo $data["tip3"] ?>
						</div>
					</div>
					<div style="text-align: center">
						<button type="button" class="btn green-button" onclick="window.open('https://cleverads.com/v1/auth?locale=en&app=campaigns&provider=WORDPRESS', '_blank');">
							<?php echo $data["button"] ?>
						</button>
					</div>
				</div>
				<div class="d-none d-md-block col-md-5 align-items-center">
					<img class="main-image" src="../wp-content/plugins/google-ads-automated-creator-by-clever-ads/assets/creator.svg">
				</div>
			</div>
		</div>

		<!-- BLUE ZONE -->
		<div class="p-2 row bd-highlight blue-zone">
		 	<div class="col-sm-12 col-md-4">
			 	<div class="col-12 title-blue">
					<div class="blue-circle" style="margin-left: auto; margin-right: auto">1</div>
				</div>
				<div class="col-12">
					<div class="title-blue"><?php echo $data["blue1_title"] ?></div>
				</div>
				<div class="col-12">
					<div class="description-blue"><?php echo $data["blue1_text"] ?></div>
				</div>
			</div>
			<div class="col-12 d-block d-md-none"><div style="margin-bottom: 25px"></div></div>
			<div class="col-sm-12 col-md-4">
				<div class="col-12 title-blue">
					<div class="blue-circle" style="margin-left: auto; margin-right: auto">2</div>
				</div>
				<div class="col-12">
					<div class="title-blue"><?php echo $data["blue2_title"] ?></div>
				</div class="col-12">
				<div>
					<div class="description-blue"><?php echo $data["blue2_text"] ?></div>
				</div>
			</div>
			<div class="col-12 d-block d-md-none"><div style="margin-bottom: 25px"></div></div>
			<div class="col-sm-12 col-md-4">
				<div class="col-12 title-blue">
					<div class="blue-circle" style="margin-left: auto; margin-right: auto">3</div>
				</div>
				<div class="col-12">
					<div class="title-blue"><?php echo $data["blue3_title"] ?></div>
				</div>
				<div class="col-12">
					<div><?php echo $data["blue3_text"] ?></div>
				</div>
			</div>
		</div>

		<!-- FOOTER --> 
		<div class="p-2 align-items-center footer">
			<?php echo $data["footer"] ?>
			<img class="partner-image" src="../wp-content/plugins/google-ads-automated-creator-by-clever-ads/assets/partner.jpg">
		</div>

	</div>
</body>

