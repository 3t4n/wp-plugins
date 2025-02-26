<?php if( ! defined('ABSPATH'))exit; ?>
<script type="text/javascript">
	(function($){
		 	var loanCalc = null;
			$(window).ready(function(){
					loadTool();	
				});
			var __loancalculator = null;
			var calculator = null;
			var loadTool = function(){
				__loancalculator = gbst.module("gbst.loan.app.loancalculator");
				var container = $(".loan-calculator-app");
				container.empty();
				if ((parent.hasOwnProperty && parent.hasOwnProperty("setIframeHeight")) ||
					Object.prototype.hasOwnProperty.call(parent, "setIframeHeight")) {
					container.resize(function(e){
							parent.setIframeHeight(container.height());
						})
				};
				calculator = new __loancalculator.LoanCalculatorApp(container);
				calculator.init();
			};
		})(jQuery); 
	</script>
<div id="content-wrapper"><div class="mboxDefault"><div class="loan-calculator-app portrait_tablets_layout" style="max-width: 614px;"></div></div></div>