<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function gutenspring_fsb_block_assets() {
	wp_enqueue_style(
		'fastspring-style-css', 
		plugins_url( 'dist/blocks.style.build.css', dirname( __FILE__ ) ), 
		array( 'wp-editor' ) 
	);
	if($GLOBALS['fsb_options']['fastspring_cssclass']) {
		wp_add_inline_style( 'fastspringcss', $GLOBALS['fsb_options']['fastspring_cssclass'] );
	}
	if( !is_admin() ) {
		wp_enqueue_script(
			'fastspringapi', 
			$GLOBALS['fsb_options']['fastspring_builder_url'], 
			array('wp-blocks'),
			true
		);
	}	
}

add_action( 'enqueue_block_assets', 'gutenspring_fsb_block_assets' );

function fsb_add_id_to_script( $tag, $handle, $src ) {
	if ( 'fastspringapi'  === $handle ) {
		$tag = '<script type="text/javascript" src="' . esc_url( $src ) . '" defer="true" id="fsc-api" data-storefront="' . $GLOBALS['fsb_options']['fastspring_storefront'] . '"></script>';
	}
	return $tag;
}
add_filter( 'script_loader_tag', 'fsb_add_id_to_script', 10, 3 );

function fsb_add_id_to_script_admin( $tag, $handle, $src ) {
	if ( 'fastspringapiadmin'  === $handle ) {
		$tag = '<script type="text/javascript" src="' . esc_url( $src ) . '" id="fsc-api" data-storefront="' . $GLOBALS['fsb_options']['fastspring_storefront'] . '" data-data-callback="dataCallbackFunctionAdmin"></script>';
	}
	return $tag;
}
add_filter( 'script_loader_tag', 'fsb_add_id_to_script_admin', 10, 3 );

function gutenspring_fsb_editor_assets() {
	wp_enqueue_script(
		'gutenspring-fastspring-block-js', 
		plugins_url( '/dist/blocks.build.js', dirname( __FILE__ ) ),
		array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor', 'wp-compose' ), 
		true
	);
	
	wp_localize_script('gutenspring-fastspring-block-js', 'fsb_options', $GLOBALS['fsb_options']);

	wp_enqueue_script(
		'fastspringjs', 
		plugins_url( '/public/js/fastspringadmin.js', dirname( __FILE__ ) ), 
		array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor' ), 
		true
	);	

	wp_enqueue_script(
		'fastspringapiadmin', 
		$GLOBALS['fsb_options']['fastspring_builder_url'], 
		array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor' ), 
		true
	);	

	/*wp_enqueue_style(
		'gutenspring-fastspring-block-editor-css', 
		plugins_url( 'dist/blocks.editor.build.css', dirname( __FILE__ ) ), 
		array( 'wp-edit-blocks' ) 
	);*/
}

add_action( 'enqueue_block_editor_assets', 'gutenspring_fsb_editor_assets' );

register_block_type( 'fastspring/block-fastspringblocks-complete-product-catalog', array(
		'render_callback' => 'fsb_product_catalog_render_callback'
	)
);

function fsb_product_catalog_render_callback( $attributes){
	if(!isset($attributes["AllProductsLinkIcon"])) { $attributes["AllProductsLinkIcon"] = "fa fa-chevron-right"; }
	if(!isset($attributes["CatalogColumns"])) { $attributes["CatalogColumns"] = "4"; }
	if(!isset($attributes["htag"])) { $attributes["htag"] = "h1"; }
	if(!isset($attributes["fontSize"])) { $attributes["fontSize"] = "36"; }
	if(!isset($attributes["allproductsfontSizes"])) { $attributes["allproductsfontSizes"] = "36"; }
	if(!isset($attributes["AllProductsText"])) { $attributes["AllProductsText"] = "All Products"; }
	if(!isset($attributes["fontSizeOriginal"])) { $attributes["fontSizeOriginal"] = "20"; }
	if(!isset($attributes["color"])) { $attributes["color"] = "#28a745"; }
	if(!isset($attributes["colorOriginal"])) { $attributes["colorOriginal"] = "#6c757d"; }
	if(!isset($attributes["BuyButtonAction"])) { $attributes["BuyButtonAction"] = $GLOBALS['fsb_options']['fastspring_bbaction']; }
	if(!isset($attributes["BuyButtonClass"])) { $attributes["BuyButtonClass"] = $GLOBALS['fsb_options']['fastspring_bbclass']; }
	if(!isset($attributes["BuyButtonIcon"])) { $attributes["BuyButtonIcon"] = $GLOBALS['fsb_options']['fastspring_bbicon']; }
	if(!isset($attributes["BuyButtonText"])) { $attributes["BuyButtonText"] = $GLOBALS['fsb_options']['fastspring_bbtext']; }
	if(!isset($attributes["SecondaryButtonAction"])) { $attributes["SecondaryButtonAction"] = $GLOBALS['fsb_options']['fastspring_bbsecondaryaction']; }
	if(!isset($attributes["RemoveFromCartButtonClass"])) { $attributes["RemoveFromCartButtonClass"] = $GLOBALS['fsb_options']['fastspring_rcclass']; }
	if(!isset($attributes["RemoveFromCartButtonIcon"])) { $attributes["RemoveFromCartButtonIcon"] = $GLOBALS['fsb_options']['fastspring_rcicon']; }
	if(!isset($attributes["RemoveFromCartButtonText"])) { $attributes["RemoveFromCartButtonText"] = $GLOBALS['fsb_options']['fastspring_rctext']; }
	if(!isset($attributes["ViewCartButtonClass"])) { $attributes["ViewCartButtonClass"] = $GLOBALS['fsb_options']['fastspring_vcclass']; }
	if(!isset($attributes["ViewCartButtonIcon"])) { $attributes["ViewCartButtonIcon"] = $GLOBALS['fsb_options']['fastspring_vcicon']; }
	if(!isset($attributes["ViewCartButtonText"])) { $attributes["ViewCartButtonText"] = $GLOBALS['fsb_options']['fastspring_vctext']; }
	if(!isset($attributes["ShoppingCartLocation"])) { $attributes["ShoppingCartLocation"] = $GLOBALS['fsb_options']['fastspring_cart_location']; }
	if(!isset($attributes["htagproduct"])) { $attributes["htagproduct"] = "h1"; }
	if(isset($_GET['product'])) {
		$returnValue = "<div data-fsc-items-container='one-product' class='one-product fastspring' id='one-product'  data-fsc-filter='path=".sanitize_text_field( $_GET['product'])."'></div>
		<!-- This template will display one product. It will be rendered and placed to the data-fsc-items-container='one-products' -->
		<script data-fsc-template-for='one-product' type='text/x-handlebars-template'>
				<div class='row'>
				<div class='col-12 mb-4'><span  style=\"font-size: " . $attributes["allproductsfontSizes"] . "px;\"><a href='" . parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) . "' ><i class='" . $attributes["AllProductsLinkIcon"] . "'></i> " . $attributes["AllProductsText"] . "</a> / <span data-fsc-item-path='" . sanitize_text_field( $_GET['product']) . "'' data-fsc-item-display></span></span></div>
				<div class='col-md-4'>
					<img data-fsc-item-path='" . sanitize_text_field( $_GET['product']) . "'' data-fsc-item-image class='img' />
				</div>
				<div class='col-md-8 mb-4'>
					<" . $attributes["htagproduct"] . "><span data-fsc-item-path='" . sanitize_text_field( $_GET['product']) . "'' data-fsc-item-display></" . $attributes["htagproduct"] . "></span>
					<div>
						<span data-product=" . sanitize_text_field( $_GET['product']) . ">
							<span class=\"priceOriginal\" data-fsc-item-path=\"" . sanitize_text_field( $_GET['product']) . "\" data-fsc-item-price data-fsc-smartdisplay=\"data-product='" . sanitize_text_field( $_GET['product']) . "'\" style=\"font-size: " . $attributes["fontSizeOriginal"] . "px; text-decoration: line-through; color: " . $attributes["colorOriginal"] . ";\"></span>
						</span>
					</div>
					<div>
						<span class=\"price\" data-fsc-item-path=\"" . sanitize_text_field( $_GET['product']) . "\" data-fsc-item-unitprice style=\"font-size: " . $attributes["fontSize"] . "px; color: " . $attributes["color"] . ";\"></span>
					</div>
					{{#each items}}
						{{#each items}}
							{{#iff path '===' '" . sanitize_text_field( $_GET['product']) . "'}}
								{{#if discountTotalValue}}
									<div class=\"text-success\">
										You save {{discountTotal}} ({{discountPercent}})
									</div>
								{{/if}}
								<div class='mb-4'>
									{{#if description.summary}}<span data-fsc-item-path='" . sanitize_text_field( $_GET['product']) . "' data-fsc-item-description-summary>	</span>{{/if}}
								</div>
							{{/iff}}
						{{/each}}
					{{/each}}
					<div class='mb-4'>
						<span data-fsc-item-path-value='" . sanitize_text_field( $_GET['product']) . "'' data-fsc-item-path='" . sanitize_text_field( $_GET['product']) . "'' data-fsc-item-selection-smartdisplay-inverse style='display: block;'>";
			if($attributes["BuyButtonAction"] == 'addtocart') {
				$returnValue = $returnValue . '
					<button class="'.$attributes["BuyButtonClass"].'" onclick="fsaddProd(\'' . sanitize_text_field( $_GET['product']) . '\', \'' . $attributes["ShoppingCartLocation"]  . '\')">
						<i class="'.$attributes["BuyButtonIcon"].'" aria-hidden="true"></i>
						&nbsp;'.$attributes["BuyButtonText"].'
					</button>';
			}
			if($attributes["BuyButtonAction"] == 'checkout') {			
				$returnValue = $returnValue . '
					<button class="'.$attributes["BuyButtonClass"].'" data-fsc-item-path-value="' . sanitize_text_field( $_GET['product']) . '" data-fsc-item-path="' . sanitize_text_field( $_GET['product']) . '" data-fsc-action="Add, Checkout">
						<i class="'.$attributes["BuyButtonIcon"].'" aria-hidden="true"></i>
						&nbsp;'.$attributes["BuyButtonText"].'
					</button>';
			}		
			$returnValue = $returnValue . '</span>';
			if($attributes["SecondaryButtonAction"] == 'viewcart') {
				$returnValue = $returnValue . '
				<span data-fsc-item-path-value="' . sanitize_text_field( $_GET['product']) . '" data-fsc-item-path="' . sanitize_text_field( $_GET['product']) . '" data-fsc-item-selection-smartdisplay="" style="display:none;">
					<button class="'.$attributes["ViewCartButtonClass"].'" onclick="openCart(\'' . $attributes["ShoppingCartLocation"] . '\')">
						<i class="'.$attributes["ViewCartButtonIcon"].'" aria-hidden="true"></i>&nbsp;'.$attributes["ViewCartButtonText"].'
					</button>
				</span>';
			}
			if($attributes["SecondaryButtonAction"] == 'removefromcart') {
				$returnValue = $returnValue . '
				<span data-fsc-item-path-value="' . sanitize_text_field( $_GET['product']) . '" data-fsc-item-path="' . sanitize_text_field( $_GET['product']) . '" data-fsc-item-selection-smartdisplay style="display:none;">
					<button data-fsc-item-path-value="' . sanitize_text_field( $_GET['product']) . '" data-fsc-item-path="' . sanitize_text_field( $_GET['product']) . '" class="'.$attributes["RemoveFromCartButtonClass"].'" data-fsc-action="Remove" >
						<i class="'.$attributes["RemoveFromCartButtonIcon"].'" aria-hidden="true"></i>
						&nbsp;'.$attributes["RemoveFromCartButtonText"].'
					</button>
				</span>';
			}
			$returnValue = $returnValue . '
				</div>
			</div>
			<div class="col-md-12">
				<div>
					<span data-fsc-item-path="' . sanitize_text_field( $_GET['product']) . '" data-fsc-item-description-full>	</span>
				</div>
			</div>
		</script>';
	} else {
		if (strpos($_SERVER['REQUEST_URI'], '?')) {
			$parameterval = "&";
		} else {
			$parameterval = "?";
		}
		if($attributes["CatalogColumns"] == "1") {
			$columns = "12";
		}
		if($attributes["CatalogColumns"] == "2") {
			$columns = "6";
		}
		if($attributes["CatalogColumns"] == "3") {
			$columns = "4";
		}
		if($attributes["CatalogColumns"] == "4") {
			$columns = "3";
		}
		$returnValue = "<div data-fsc-items-container='all-products' class='all-products fastspring' id='all-products' data-fsc-filter='selected=true'></div>
		<!-- This template will display all products. It will be rendered and placed to the data-fsc-items-container='all-products' -->
		<script data-fsc-template-for='all-products' type='text/x-handlebars-template'>
			<div class=\"row\">
				{{#each groups}}
					{{#iff driverType '==' 'storefront'}}
						{{#each items}}
							<div class=\"col-" . $columns . " mb-4\">
								<a href=\"" . $_SERVER['REQUEST_URI'] . $parameterval . "product={{path}}\" class=\"fsb_productcatalog\"> 
									<div>
										<img src=\"{{image}}\" class=\"img\" style=\"padding: 5px; max-height: 170px;\" />
									</div>
									<div>
										<span class=\"displayname\"><" . $attributes["htag"] . ">{{display}}</" . $attributes["htag"] . "></span>
									</div>
									<div>
										<span data-product={{path}}>
											<span class=\"priceOriginal\" data-fsc-item-path=\"{{path}}\" data-fsc-item-price=\"true\" data-fsc-smartdisplay=\"data-product='{{path}}'\" style=\"font-size: " . $attributes["fontSizeOriginal"] . "px; text-decoration: line-through; color: " . $attributes["colorOriginal"] . ";\"></span>
										</span>
									</div>
									<div>
										<span class=\"price\" data-fsc-item-path=\"{{path}}\" data-fsc-item-unitprice=\"true\" style=\"font-size: " . $attributes["fontSize"] . "px; color: " . $attributes["color"] . ";\"></span>
									</div>
									{{#if discountTotalValue}}
										<div class=\"text-success\">
											You save {{discountTotal}} ({{discountPercent}})
										</div>
									{{/if}}
								</a>
								{{>moreInfo}}
								<div class=\"mb-4\">";
									if($attributes["BuyButtonAction"] == 'addtocart') {
										$returnValue = $returnValue . '
										<span data-fsc-item-path-value="{{path}}" data-fsc-item-path="{{path}}" data-fsc-item-selection-smartdisplay-inverse style="display: none;">
											<button class="'.$attributes["BuyButtonClass"].'" onclick="fsaddProd(\'{{path}}\', \'' . $attributes["ShoppingCartLocation"]  . '\')">
												<i class="'.$attributes["BuyButtonIcon"].'" aria-hidden="true"></i>
												&nbsp;'.$attributes["BuyButtonText"].'
											</button>
										</span>';
									}
									if($attributes["BuyButtonAction"] == 'checkout') {			
										$returnValue = $returnValue . '
										<span data-fsc-item-path-value="{{path}}" data-fsc-item-path="{{path}}" data-fsc-item-selection-smartdisplay-inverse style="display: none;">
											<button class="'.$attributes["BuyButtonClass"].'" data-fsc-item-path-value="{{path}}" data-fsc-item-path="{{path}}" data-fsc-action="Add, Checkout">
												<i class="'.$attributes["BuyButtonIcon"].'" aria-hidden="true"></i>
												&nbsp;'.$attributes["BuyButtonText"].'
											</button>
										</span>';
									}		
									if($attributes["SecondaryButtonAction"] == 'viewcart') {
										$returnValue = $returnValue . '
										<span data-fsc-item-path-value="{{path}}" data-fsc-item-path="{{path}}" data-fsc-item-selection-smartdisplay="" style="display:none;">
											<button class="'.$attributes["ViewCartButtonClass"].'" onclick="openCart(\'' . $attributes["ShoppingCartLocation"] . '\')">
												<i class="'.$attributes["ViewCartButtonIcon"].'" aria-hidden="true"></i>&nbsp;'.$attributes["ViewCartButtonText"].'
											</button>
										</span>';
									}
									if($attributes["SecondaryButtonAction"] == 'removefromcart') {
										$returnValue = $returnValue . '
										<span data-fsc-item-path-value="{{path}}" data-fsc-item-path="{{path}}" data-fsc-item-selection-smartdisplay style="display:none;">
											<button data-fsc-item-path-value="{{path}}" data-fsc-item-path="{{path}}" class="'.$attributes["RemoveFromCartButtonClass"].'" data-fsc-action="Remove" >
												<i class="'.$attributes["RemoveFromCartButtonIcon"].'" aria-hidden="true"></i>
												&nbsp;'.$attributes["RemoveFromCartButtonText"].'
											</button>
										</span>';
									}
								$returnValue = $returnValue . "</div>		
							</div>
						{{/each}}
					{{/iff}}
				{{/each}}
			</div>
		</script>";	
	}	
	return $returnValue;
}

register_block_type( 'fastspring/block-fastspringblocks-viewcart', array(
		'render_callback' => 'fsb_viewcart_render_callback'
	)
);

function fsb_viewcart_render_callback( $attributes){
	if(!isset($attributes["ViewCartButtonClass"])) { $attributes["ViewCartButtonClass"] = $GLOBALS['fsb_options']['fastspring_vcclass']; }
	if(!isset($attributes["ViewCartButtonIcon"])) { $attributes["ViewCartButtonIcon"] = $GLOBALS['fsb_options']['fastspring_vcicon']; }
	if(!isset($attributes["ViewCartButtonText"])) { $attributes["ViewCartButtonText"] = $GLOBALS['fsb_options']['fastspring_vctext']; }
	if(!isset($attributes["ShoppingCartLocation"])) { $attributes["ShoppingCartLocation"] = $GLOBALS['fsb_options']['fastspring_cart_location']; }
	if(isset($attributes["alignment"])) { $attributes["alignment"] = 'fsb-btn-align-' . $attributes["alignment"]; } else { $attributes["alignment"] = ""; }
	if(!isset($attributes["className"])) { $attributes["className"] = "";}
	$returnValue = '<div  class="'. $attributes["alignment"] . $attributes["className"] . '" data-fsc-selections-smartdisplay>
		<span>
			<button class="'.$attributes["ViewCartButtonClass"].'" onclick="openCart(\''.$attributes["ShoppingCartLocation"].'\')">
				<i class="'.$attributes["ViewCartButtonIcon"].'" aria-hidden="true"></i>
				&nbsp;'.$attributes["ViewCartButtonText"].'
			</button>
		</span>
	</div>';
	return $returnValue;
}

register_block_type( 'fastspring/block-fastspringblocks-checkout', array(
		'render_callback' => 'fsb_checkout_render_callback'
	)
);

function fsb_checkout_render_callback( $attributes){
	if(!isset($attributes["CheckoutButtonClass"])) { $attributes["CheckoutButtonClass"] = $GLOBALS['fsb_options']['fastspring_coclass']; }
	if(!isset($attributes["CheckoutButtonIcon"])) { $attributes["CheckoutButtonIcon"] = $GLOBALS['fsb_options']['fastspring_coicon']; }
	if(!isset($attributes["CheckoutButtonText"])) { $attributes["CheckoutButtonText"] = $GLOBALS['fsb_options']['fastspring_cotext']; }
	if(isset($attributes["alignment"])) { $attributes["alignment"] = 'fsb-btn-align-' . $attributes["alignment"]; } else { $attributes["alignment"] = ""; }
	if(!isset($attributes["className"])) { $attributes["className"] = "";}
	$returnValue = '<div  class="' . $attributes["alignment"] . $attributes["className"] . '"  data-fsc-selections-smartdisplay>
		<span>
			<button class="'.$attributes["CheckoutButtonClass"].'" data-fsc-action="Checkout">
				<i class="'.$attributes["CheckoutButtonIcon"].'" aria-hidden="true"></i>
				&nbsp;'.$attributes["CheckoutButtonText"].'
			</button>
		</span>
	</div>';
	return $returnValue;
}

register_block_type( 'fastspring/block-fastspringblocks-product-summary', array(
		'render_callback' => 'fsb_summary_render_callback'
	)
);

function fsb_summary_render_callback( $attributes){
	if(isset($attributes["alignment"])) { $attributes["alignment"] = 'fsb-btn-align-' . $attributes["alignment"]; } else { $attributes["alignment"] = ""; }
	if(!isset($attributes["className"])) { $attributes["className"] = "";}
	$returnValue = '<div  class=' . $attributes["alignment"] . $attributes["className"] . '><span data-fsc-item-path='. $attributes["PSProduct"].' data-fsc-item-description-summary></span></div>';
	return $returnValue;
}

register_block_type( 'fastspring/block-fastspringblocks-product-display', array(
		'render_callback' => 'fsb_display_render_callback'
	)
);

function fsb_display_render_callback( $attributes){
	if(isset($attributes["alignment"])) { $attributes["alignment"] = 'fsb-btn-align-' . $attributes["alignment"]; } else { $attributes["alignment"] = ""; }
	if(!isset($attributes["className"])) { $attributes["className"] = "";}
	if(!isset($attributes["htag"])) { $attributes["htag"] = 'h1'; }
	$returnValue =  '<div  class='. $attributes["alignment"] . $attributes["className"] . '><' . $attributes["htag"] . ' data-fsc-item-path=' . $attributes["PDProduct"] . ' data-fsc-item-display></' . $attributes["htag"] . '></div>';
	return $returnValue;
}

register_block_type( 'fastspring/block-fastspringblocks-productimage', array(
		'render_callback' => 'fsb_image_render_callback'
	)
);

function fsb_image_render_callback( $attributes){
	if(!isset($attributes["PIClass"])) { $attributes["PIClass"] = "fsb-img"; } 
	if(!isset($attributes["className"])) { $attributes["className"] = ""; } 
	if(!isset($attributes["alignment"])) { $attributes["alignment"] = ""; } 
	$returnValue =  '<figure class="' . $attributes["className"];
	if($attributes["alignment"] == 'full') { $retunValue = $returnValue . ' fsb-img-align-full';}
	
	$returnValue = $returnValue . ' ">';
	$returnValue = $returnValue  . '<img data-fsc-item-path='.$attributes["PIProduct"].' data-fsc-item-image class="' . $attributes["PIClass"];
	if(isset($attributes["alignment"])) { $returnValue = $returnValue . ' fsb-img-align-'.$attributes["alignment"];}
	$returnValue = $returnValue . '" />
	</figure>';
	return $returnValue;
}

register_block_type('fastspring/block-buybutton', array(
	'render_callback' => 'fsb_buybutton_callback'
	)
);
    
function fsb_buybutton_callback( $attributes){
	if(!isset($attributes["BuyButtonAction"])) { $attributes["BuyButtonAction"] = $GLOBALS['fsb_options']['fastspring_bbaction']; }
	if(!isset($attributes["BuyButtonClass"])) { $attributes["BuyButtonClass"] = $GLOBALS['fsb_options']['fastspring_bbclass']; }
	if(!isset($attributes["BuyButtonIcon"])) { $attributes["BuyButtonIcon"] = $GLOBALS['fsb_options']['fastspring_bbicon']; }
	if(!isset($attributes["BuyButtonText"])) { $attributes["BuyButtonText"] = $GLOBALS['fsb_options']['fastspring_bbtext']; }
	if(!isset($attributes["SecondaryButtonAction"])) { $attributes["SecondaryButtonAction"] = $GLOBALS['fsb_options']['fastspring_bbsecondaryaction']; }
	if(!isset($attributes["RemoveFromCartButtonClass"])) { $attributes["RemoveFromCartButtonClass"] = $GLOBALS['fsb_options']['fastspring_rcclass']; }
	if(!isset($attributes["RemoveFromCartButtonIcon"])) { $attributes["RemoveFromCartButtonIcon"] = $GLOBALS['fsb_options']['fastspring_rcicon']; }
	if(!isset($attributes["RemoveFromCartButtonText"])) { $attributes["RemoveFromCartButtonText"] = $GLOBALS['fsb_options']['fastspring_rctext']; }
	if(!isset($attributes["ViewCartButtonClass"])) { $attributes["ViewCartButtonClass"] = $GLOBALS['fsb_options']['fastspring_vcclass']; }
	if(!isset($attributes["ViewCartButtonIcon"])) { $attributes["ViewCartButtonIcon"] = $GLOBALS['fsb_options']['fastspring_vcicon']; }
	if(!isset($attributes["ViewCartButtonText"])) { $attributes["ViewCartButtonText"] = $GLOBALS['fsb_options']['fastspring_vctext']; }
	if(!isset($attributes["ShoppingCartLocation"])) { $attributes["ShoppingCartLocation"] = $GLOBALS['fsb_options']['fastspring_cart_location']; }
	if(isset($attributes["alignment"])) { $attributes["alignment"] = 'fsb-btn-align-' . $attributes["alignment"]; } else { $attributes["alignment"] = ""; }
	if(!isset($attributes["className"])) { $attributes["className"] = "";}
	$returnValue = '<div class="' . $attributes["alignment"] . $attributes["className"] . '">';
	if($attributes["BuyButtonAction"] == 'addtocart') {
		$returnValue = $returnValue . '
		<span data-fsc-item-path-value="'.$attributes["BuyButtonProduct"].'" data-fsc-item-path="'.$attributes["BuyButtonProduct"].'" data-fsc-item-selection-smartdisplay-inverse style="display: none;">
			<button class="'.$attributes["BuyButtonClass"].'" data-fsc-item-path-value="'.$attributes["BuyButtonProduct"].'" data-fsc-item-path="'.$attributes["BuyButtonProduct"].'" data-fsc-addthis="'.$attributes["BuyButtonProduct"].'" data-fsc-cart="'.$attributes["ShoppingCartLocation"].'">
				<i class="'.$attributes["BuyButtonIcon"].'" aria-hidden="true"></i>
				&nbsp;'.$attributes["BuyButtonText"].'
			</button>
		</span>';
	}
	if($attributes["BuyButtonAction"] == 'checkout') {			
		$returnValue = $returnValue . '
		<span data-fsc-item-path-value="'.$attributes["BuyButtonProduct"].'" data-fsc-item-path="'.$attributes["BuyButtonProduct"].'" data-fsc-item-selection-smartdisplay-inverse style="display: none;">
			<button class="'.$attributes["BuyButtonClass"].'" data-fsc-item-path-value="'.$attributes["BuyButtonProduct"].'" data-fsc-item-path="'.$attributes["BuyButtonProduct"].'" data-fsc-action="Add, Checkout">
				<i class="'.$attributes["BuyButtonIcon"].'" aria-hidden="true"></i>
				&nbsp;'.$attributes["BuyButtonText"].'
			</button>
		</span>';
	}		
	if($attributes["SecondaryButtonAction"] == 'viewcart') {
		$returnValue = $returnValue . '
		<span data-fsc-item-path-value="'.$attributes["BuyButtonProduct"].'" data-fsc-item-path="'.$attributes["BuyButtonProduct"].'" data-fsc-item-selection-smartdisplay="" style="display:none;">
			<button data-fsc-item-path-value="'.$attributes["BuyButtonProduct"].'" data-fsc-item-path="'.$attributes["BuyButtonProduct"].'" class="'.$attributes["ViewCartButtonClass"].'" data-fsc-opencart="'.$attributes["ShoppingCartLocation"].'">
				<i class="'.$attributes["ViewCartButtonIcon"].'" aria-hidden="true"></i>&nbsp;'.$attributes["ViewCartButtonText"].'
			</button>
		</span>';
	}
	if($attributes["SecondaryButtonAction"] == 'removefromcart') {
		$returnValue = $returnValue . '
		<span data-fsc-item-path-value="'.$attributes["BuyButtonProduct"].'" data-fsc-item-path="'.$attributes["BuyButtonProduct"].'" data-fsc-item-selection-smartdisplay style="display:none;">
			<button data-fsc-item-path-value="'.$attributes["BuyButtonProduct"].'" data-fsc-item-path="'.$attributes["BuyButtonProduct"].'" class="'.$attributes["RemoveFromCartButtonClass"].'" data-fsc-action="Remove" >
				<i class="'.$attributes["RemoveFromCartButtonIcon"].'" aria-hidden="true"></i>
				&nbsp;'.$attributes["RemoveFromCartButtonText"].'
			</button>
		</span>';
	}
	$returnValue = $returnValue . '</div>';
	return $returnValue;
}

register_block_type('fastspring/block-buybuttonwqty', array(
	'render_callback' => 'fsb_buybuttonwqty_callback'
	)
);
    
function fsb_buybuttonwqty_callback( $attributes){
	if(!isset($attributes["BuyButtonAction"])) { $attributes["BuyButtonAction"] = $GLOBALS['fsb_options']['fastspring_bbaction']; }
	if(!isset($attributes["BuyButtonClass"])) { $attributes["BuyButtonClass"] = $GLOBALS['fsb_options']['fastspring_bbclass']; }
	if(!isset($attributes["BuyButtonIcon"])) { $attributes["BuyButtonIcon"] = $GLOBALS['fsb_options']['fastspring_bbicon']; }
	if(!isset($attributes["BuyButtonText"])) { $attributes["BuyButtonText"] = $GLOBALS['fsb_options']['fastspring_bbtext']; }
	if(!isset($attributes["SecondaryButtonAction"])) { $attributes["SecondaryButtonAction"] = $GLOBALS['fsb_options']['fastspring_bbsecondaryaction']; }
	if(!isset($attributes["RemoveFromCartButtonClass"])) { $attributes["RemoveFromCartButtonClass"] = $GLOBALS['fsb_options']['fastspring_rcclass']; }
	if(!isset($attributes["RemoveFromCartButtonIcon"])) { $attributes["RemoveFromCartButtonIcon"] = $GLOBALS['fsb_options']['fastspring_rcicon']; }
	if(!isset($attributes["RemoveFromCartButtonText"])) { $attributes["RemoveFromCartButtonText"] = $GLOBALS['fsb_options']['fastspring_rctext']; }
	if(!isset($attributes["ViewCartButtonClass"])) { $attributes["ViewCartButtonClass"] = $GLOBALS['fsb_options']['fastspring_vcclass']; }
	if(!isset($attributes["ViewCartButtonIcon"])) { $attributes["ViewCartButtonIcon"] = $GLOBALS['fsb_options']['fastspring_vcicon']; }
	if(!isset($attributes["ViewCartButtonText"])) { $attributes["ViewCartButtonText"] = $GLOBALS['fsb_options']['fastspring_vctext']; }
	if(!isset($attributes["ShoppingCartLocation"])) { $attributes["ShoppingCartLocation"] = $GLOBALS['fsb_options']['fastspring_cart_location']; }
	if(isset($attributes["alignment"])) { $attributes["alignment"] = 'fsb-btn-align-' . $attributes["alignment"]; } else { $attributes["alignment"] = ""; }
	if(!isset($attributes["className"])) { $attributes["className"] = "";}
	$digits = 5;
	$rand = rand(pow(10, $digits-1), pow(10, $digits)-1);
	$returnValue = '<div class="'.$attributes["className"] . $attributes["alignment"] . '">';
	$returnValue = $returnValue . "<div data-fsc-item-path-value=" . $attributes["BuyButtonProduct"]  . " data-fsc-item-path=" . $attributes["BuyButtonProduct"]  . " data-fsc-item-selection-smartdisplay-inverse>	
	<div class=\"fsb-numberProd\">
		<span class=\"fsb-minusProd\"><span class='fastspring_circle minus'></span></span>
		<input id=\"fsb-" . $rand . "\" class=\"fsb-qtyinputProd\" type=\"text\" value=\"1\" />
		<span class=\"fsb-plusProd\" ><span class='fastspring_circle plus'></span></span>
	</div>";
	if($attributes["BuyButtonAction"] == 'addtocart') {
		$returnValue = $returnValue . '
			<button class="'.$attributes["BuyButtonClass"].'" onclick="fsbProductaddProd(\'' . $attributes["BuyButtonProduct"] . '\', \'' . $attributes["ShoppingCartLocation"]  . '\', \'fsb-'. $rand . '\')">
				<i class="'.$attributes["BuyButtonIcon"].'" aria-hidden="true"></i>
				&nbsp;'.$attributes["BuyButtonText"].'
			</button>';
	}
	if($attributes["BuyButtonAction"] == 'checkout') {			
		$returnValue = $returnValue . '
			<button class="'.$attributes["BuyButtonClass"].'" data-fsc-item-path-value="' . $attributes["BuyButtonProduct"] . '" data-fsc-item-path="' . $attributes["BuyButtonProduct"] . '" data-fsc-action="Add, Checkout">
				<i class="'.$attributes["BuyButtonIcon"].'" aria-hidden="true"></i>
				&nbsp;'.$attributes["BuyButtonText"].'
			</button>';
	}		
	$returnValue = $returnValue . '</div>';
	if($attributes["SecondaryButtonAction"] == 'viewcart') {
		$returnValue = $returnValue . '
		<span data-fsc-item-path-value="' . $attributes["BuyButtonProduct"] . '" data-fsc-item-path="' . $attributes["BuyButtonProduct"] . '" data-fsc-item-selection-smartdisplay="" style="display:none;">
			<button class="'.$attributes["ViewCartButtonClass"].'" onclick="openCart(\'' . $attributes["ShoppingCartLocation"] . '\')">
				<i class="'.$attributes["ViewCartButtonIcon"].'" aria-hidden="true"></i>&nbsp;'.$attributes["ViewCartButtonText"].'
			</button>
		</span>';
	}
	if($attributes["SecondaryButtonAction"] == 'removefromcart') {
		$returnValue = $returnValue . '
		<span data-fsc-item-path-value="' . $attributes["BuyButtonProduct"] . '" data-fsc-item-path="' . $attributes["BuyButtonProduct"] . '" data-fsc-item-selection-smartdisplay style="display:none;">
			<button data-fsc-item-path-value="' . $attributes["BuyButtonProduct"] . '" data-fsc-item-path="' . $attributes["BuyButtonProduct"] . '" class="'.$attributes["RemoveFromCartButtonClass"].'" data-fsc-action="Remove" >
				<i class="'.$attributes["RemoveFromCartButtonIcon"].'" aria-hidden="true"></i>
				&nbsp;'.$attributes["RemoveFromCartButtonText"].'
			</button>
		</span>';
	$returnValue = $returnValue . '</div>';
	}
	return $returnValue;
}

register_block_type( 'fastspring/block-fastspringblocks-product-full', array(
		'render_callback' => 'fsb_full_render_callback'
	)
);

function fsb_full_render_callback( $attributes){
	if(isset($attributes["alignment"])) { $attributes["alignment"] = 'fsb-btn-align-' . $attributes["alignment"]; } else { $attributes["alignment"] = ""; }
	if(!isset($attributes["className"])) { $attributes["className"] = "";}
	$returnValue = '<div  class=' . $attributes["alignment"] . $attributes["className"] . '><span data-fsc-item-path='. $attributes["PFProduct"].' data-fsc-item-description-full></span></div>';
	return $returnValue;
}

register_block_type( 'fastspring/block-fastspringblocks-product-price', array(
		'render_callback' => 'fsb_price_render_callback'
	)
);

function fsb_price_render_callback( $attributes){
	if(!isset($attributes["fontSize"])) { $attributes["fontSize"] = "36"; }
	if(!isset($attributes["fontSizeOriginal"])) { $attributes["fontSizeOriginal"] = "20"; }
	if(!isset($attributes["color"])) { $attributes["color"] = "#28a745"; }
	if(!isset($attributes["colorOriginal"])) { $attributes["colorOriginal"] = "#6c757d"; }
	if(isset($attributes["alignment"])) { $attributes["alignment"] = 'fsb-btn-align-' . $attributes["alignment"]; } else { $attributes["alignment"] = ""; }
	if(!isset($attributes["className"])) { $attributes["className"] = "";}
	$returnValue =  "<div  class='" . $attributes["alignment"] . $attributes["className"] . "'>
		<div>
			<span class=\"priceOriginal\" data-fsc-item-path=\"" . $attributes['PPProduct'] . "\" data-fsc-item-price data-fsc-smartdisplay style=\"font-size: " . $attributes["fontSizeOriginal"] . "px; text-decoration: line-through; color: " . $attributes["colorOriginal"] . ";\"></span>
		</div>
		<div>
			<span class=\"price\" data-fsc-item-path=\"" . $attributes['PPProduct'] . "\" data-fsc-item-unitprice style=\" font-size: " . $attributes["fontSize"] . "px; color: " . $attributes["color"] . ";\"></span>
		</div>
		<div style='display:none; color: " . $GLOBALS['fsb_options']['fastspring_free_text_color'] . "' data-fsc-item-path=\"" . $attributes['PPProduct'] . "\" data-fsc-item-price data-fsc-smartdisplay>
			You save <span data-fsc-item-path=\"" . $attributes['PPProduct'] . "\" data-fsc-item-discountPercentValue></span>% (<span data-fsc-item-path=\"" . $attributes['PPProduct'] . "\" data-fsc-item-discountTotal></span>)
		</div>
	</div>";
	return $returnValue;
}

function fsb_block_category( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'fastspring-blocks',
				'title' => __( 'FastSpring Blocks', 'fastspring-blocks' ),
			),
		)
	);
}
add_filter( 'block_categories', 'fsb_block_category', 10, 2);    