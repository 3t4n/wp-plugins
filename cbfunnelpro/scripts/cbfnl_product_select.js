//listen for changes in products form
const cbf_product_form = document.getElementById("cbfunnel_product_form");
		cbf_product_form.addEventListener('change', function() {
			document.getElementById("cbfunnel_products_save").className="button-red";
		});