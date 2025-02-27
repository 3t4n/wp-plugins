function dataCallbackFunction(data)
{
	var prods = new Array();
	var items = "<option value=''></option>";
	for(var i = 0; i < data.groups.length; i++)
	{
		for(var j = 0; j < data.groups[i].items.length; j++)
		{
			prods[data.groups[i].items[j].pid] = data.groups[i].items[j];
			items = items + "<option value='" + data.groups[i].items[j].pid + "'>" + data.groups[i].items[j].display + " - "+ data.groups[i].items[j].pid + "</option>";
			for(var k = 0; k < data.groups[i].items[j].groups.length; k++)
			{
				for(var l = 0; l < data.groups[i].items[j].groups[k].items.length; l++)
				{
					items = items + "<option value='" + data.groups[i].items[j].groups[k].items[l].pid + "'>" + data.groups[i].items[j].display + " - "+ data.groups[i].items[j].pid + "</option>";
				}
			}
		}
	}
	window.parent.prods = prods;
	jQuery("#bbpathidselect").html(items);
	jQuery("#attribpathidselect").html(items);
}


function bbenableadd()
{
	if(jQuery("#TB_ajaxContent #bbpathidselect").val())
	{
		jQuery("#TB_ajaxContent #bbaddfastspringbutton").prop('disabled', false);
	} else
	{
		jQuery("#TB_ajaxContent #bbaddfastspringbutton").prop('disabled', true);
	}
}

function bbinsertfastspring(e)
{
	e.preventDefault();
	bb_product = jQuery("#TB_ajaxContent #bbpathidselect").val();
	bb_text = jQuery("#TB_ajaxContent #bb_text").val();
	bb_class = jQuery("#TB_ajaxContent #bb_class").val();
	rc_text = jQuery("#TB_ajaxContent #rc_text").val();
	rc_class = jQuery("#TB_ajaxContent #rc_class").val();
	vcrfc = jQuery("#TB_ajaxContent input[name='vc_rfc']:checked").val();
	bbvcIcon = jQuery("#TB_ajaxContent input.bbvciconradio:checked").val();
	bbvc_text = jQuery("#TB_ajaxContent #bbvc_text").val();
	bbvc_class = jQuery("#TB_ajaxContent #bbvc_class").val();
	bb_checkout = jQuery("#TB_ajaxContent input[name='checkout']:checked").val();
	rcIcon = jQuery("#TB_ajaxContent input[name='rcIcon']:checked").val();
	Icon = jQuery("#TB_ajaxContent input.bbiconradio:checked").val();



	var buy = '<span data-fsc-item-path-value="' + bb_product + '" data-fsc-item-path="' + bb_product + '" data-fsc-item-selection-smartdisplay-inverse><a href="#" class="' + bb_class + '" ';
	buy = buy + 'data-fsc-item-path-value="' + bb_product + '" data-fsc-item-path="' + bb_product + '" ';
	if(bb_checkout == 'true')
	{
		buy = buy + 'data-fsc-action="Add, Checkout"';
	} else
	{
		buy = buy + 'data-fsc-addthis="' + bb_product + '" ';
	}
	buy = buy + '>';
	if(Icon)
	{
		buy = buy + '<i class="fa ' + Icon + '" aria-hidden="true"></i>&nbsp;';
	}
	buy = buy + bb_text + '</a></span>';


	if(vcrfc == 'rfc')
	{
		buy = buy + '<span data-fsc-item-path-value="' + bb_product + '" data-fsc-item-path="' + bb_product + '" data-fsc-item-selection-smartdisplay style="display:none;"><a href="#" data-fsc-item-path-value="' + bb_product + '" data-fsc-item-path="' + bb_product + '" ';
		buy = buy + 'class="' + rc_class + '" data-fsc-action="Remove" >';
		if(rcIcon)
		{
			buy = buy + '<i class="fa '+ rcIcon + '" aria-hidden="true"></i>&nbsp;';
		}
		buy = buy + rc_text + '</a></span>';
	}
	if(vcrfc == 'vc')
	{
		buy = buy + '<span data-fsc-item-path-value="' + bb_product + '" data-fsc-item-path="' + bb_product + '" data-fsc-item-selection-smartdisplay style="display:none;"><a href="#" data-fsc-item-path-value="' + bb_product + '" data-fsc-item-path="' + bb_product + '"';
		buy = buy + 'class="' + bbvc_class + '" data-fsc-opencart >';
		if(bbvcIcon)
		{
			buy = buy + '<i class="fa '+ bbvcIcon + '" aria-hidden="true"></i>&nbsp;';
		}
		buy = buy + bbvc_text + '</a></span>';
	}
	window.send_to_editor(buy);
}

function noncheckout()
{
	noncheckoutval = jQuery("#TB_ajaxContent input[name='checkout']:checked").val();
	if(noncheckoutval == 'true')
	{
		jQuery('#TB_ajaxContent .nncheckout').hide();
	} else
	{
		jQuery('#TB_ajaxContent .nncheckout').show();
	}
}

function vcrfcfunction(e)
{
	vcrfc = jQuery("#TB_ajaxContent input[name='vc_rfc']:checked").val();
	if(vcrfc == 'rfc')
	{
		jQuery("#TB_ajaxContent .rfcsection").show();
		jQuery("#TB_ajaxContent .vcsection").hide();
	}
	if(vcrfc == 'vc')
	{
		jQuery("#TB_ajaxContent .vcsection").show();
		jQuery("#TB_ajaxContent .rfcsection").hide();
	}
}














/*product attributes*/
function paenableadd()
{
	if(jQuery("#TB_ajaxContent #attribpathidselect").val())
	{
		jQuery("#TB_ajaxContent #paaddfastspringbutton").prop('disabled', false);
	} else
	{
		jQuery("#TB_ajaxContent #paaddfastspringbutton").prop('disabled', true);
	}
}
function painsertfastspring(e)
{
	e.preventDefault();
	attrib_product = jQuery("#TB_ajaxContent #attribpathidselect").val();
	attrib_product_name = jQuery("#TB_ajaxContent #attribpathidselect option:selected").text();
	attrib_radio = jQuery("#TB_ajaxContent input[name='pacheckout']:checked").val();
	attrib = '<span data-fsc-item-path-value="' + attrib_product + '" data-fsc-item-path="' + attrib_product + '" ';
	if(attrib_radio != 'image')
	{


		if(attrib_radio == 'path')
		{
			attrib = attrib + 'data-fsc-item-pid>' + window.parent.prods[attrib_product]["pid"] + '<!--' + attrib_product + ' - Path--></span>';
		}
		if(attrib_radio == 'name')
		{
			attrib = attrib + 'data-fsc-item-display>' + window.parent.prods[attrib_product]["display"] + '<!--' + attrib_product + ' - Display--></span>';
		}
		if(attrib_radio == 'summary')
		{
			attrib = attrib + 'data-fsc-item-description-summary>' + attrib_product + ' - Summary</span>';
		}
		if(attrib_radio == 'full')
		{
			attrib = attrib + 'data-fsc-item-description-full>' + attrib_product + ' - Full Description</span>';
		}
		if(attrib_radio == 'price')
		{
			attrib = attrib + 'data-fsc-item-price>' + window.parent.prods[attrib_product]["price"] + '<!--' + attrib_product + ' - Price--></span>';
		}
		if(attrib_radio == 'priceValue')
		{
			attrib = attrib + 'data-fsc-item-priceValue>' + window.parent.prods[attrib_product]["priceValue"] + '<!--' + attrib_product + ' - Price Value--></span>';
		}
		if(attrib_radio == 'priceTotal')
		{
			attrib = attrib + 'data-fsc-item-priceTotal>' + window.parent.prods[attrib_product]["priceTotal"] + '<!--' + attrib_product + ' - Price Total--></span>';
		}
		if(attrib_radio == 'priceTotalValue')
		{
			attrib = attrib + 'data-fsc-item-priceTotalValue>' + window.parent.prods[attrib_product]["priceTotalValue"] + '<!--' + attrib_product + ' - Price Total Value--></span>';
		}
		if(attrib_radio == 'unitPrice')
		{
			attrib = attrib + 'data-fsc-item-unitPrice>' + window.parent.prods[attrib_product]["unitPrice"] + '<!--' + attrib_product + ' - Unit Price--></span>';
		}
		if(attrib_radio == 'unitPriceValue')
		{
			attrib = attrib + 'data-fsc-item-unitPriceValue>' + window.parent.prods[attrib_product]["unitPriceValue"] + '<!--' + attrib_product + ' - Unit Price Value--></span>';
		}
		if(attrib_radio == 'unitDiscountValue')
		{
			attrib = attrib + 'data-fsc-item-unitDiscountValue>' + window.parent.prods[attrib_product]["unityDiscoutnValue"] + '<!--' + attrib_product + ' - Unit Discount Value--></span>';
		}
		if(attrib_radio == 'discountPercentValue')
		{
			attrib = attrib + 'data-fsc-item-discountPercentValue>' + window.parent.prods[attrib_product]["discountPercentValue"] + '<!--' + attrib_product + ' - Discount Percent Value--></span>';
		}
		if(attrib_radio == 'discountTotal')
		{
			attrib = attrib + 'data-fsc-item-discountTotal>' + window.parent.prods[attrib_product]["discountTotal"] + '<!--' + attrib_product + ' - Discount Total--></span>';
		}
		if(attrib_radio == 'discountTotalValue')
		{
			attrib = attrib + 'data-fsc-item-discountTotalValue >discountTotalValue<!--' + attrib_product + ' - Discount Total Value--></span>';
		}
		if(attrib_radio == 'total')
		{
			attrib = attrib + 'data-fsc-item-total>' + window.parent.prods[attrib_product]["total"] + '<!--' + attrib_product + ' - Total--></span>';
		}
		if(attrib_radio == 'totalValue')
		{
			attrib = attrib + 'data-fsc-item-totalValue>' + window.parent.prods[attrib_product]["totalValue"] + '<!--' + attrib_product + ' - Total Value--></span>';
		}
	} else
	{
		img_class = jQuery("#TB_ajaxContent #img_class").val();
		attrib = '<img src="' + window.parent.prods[attrib_product]["image"] + '" data-fsc-item-path-value="' + attrib_product + '" data-fsc-item-path="' + attrib_product + '" data-fsc-item-image ';
		if(img_class)
		{
			attrib = attrib + ' class="' + img_class + '"';
		}
		attrib = attrib + ' />';
	}
	window.send_to_editor(attrib);
}


/*view cart*/

function insertviewcart(e)
{
	e.preventDefault();
	vc_text = jQuery("#TB_ajaxContent #vc_text").val();
	vc_class = jQuery("#TB_ajaxContent #vc_class").val();
	vc_icon = jQuery("#TB_ajaxContent input[name='vcicon']:checked").val();
	var vc = '<a href="#" class="' + vc_class + '" ';
	vc = vc + 'data-fsc-opencart>';
	if(vc_icon)
	{
		vc = vc + '<i class="fa ' + vc_icon + '" aria-hidden="true"></i>&nbsp;';
	}
	vc = vc + vc_text;
	vc = vc + '</a>';
	window.parent.send_to_editor(vc);
}


/*checkout*/
function insertcheckout(e)
{
	e.preventDefault();
	co_text = jQuery("#TB_ajaxContent #co_text").val();
	co_class = jQuery("#TB_ajaxContent #co_class").val();
	co_icon = jQuery("#TB_ajaxContent input[name='coicon']:checked").val();
	var co = '<a href="#" class="' + co_class + '" data-fsc-action="Checkout">';
	if(co_icon)
	{
		co = co + '<i class="fa ' + co_icon + '" aria-hidden="true"></i>&nbsp;';
	}
	co = co + co_text;
	co = co + '</a>';
	window.parent.send_to_editor(co);
}




