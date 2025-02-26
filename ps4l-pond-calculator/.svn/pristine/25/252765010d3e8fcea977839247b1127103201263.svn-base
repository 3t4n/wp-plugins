jQuery(document).ready(function() {
						   
// Here we will write a function when link click under class popup				   
jQuery('a.popup').click(function() {
									
									
// Here we will describe a variable popupid which gets the
// rel attribute from the clicked link							
var popupid = jQuery(this).attr('rel');


// Now we need to popup the marked which belongs to the rel attribute
// Suppose the rel attribute of click link is popuprel then here in below code
// #popuprel will fadein
jQuery('#' + popupid).fadeIn();


// append div with id fade into the bottom of body tag
// and we allready styled it in our step 2 : CSS
jQuery('body').append('<div id="fade"></div>');
jQuery('#fade').css({'filter' : 'alpha(opacity=80)'}).fadeIn();


// Now here we need to have our popup box in center of 
// webpage when its fadein. so we add 10px to height and width 
var popuptopmargin = (jQuery('#' + popupid).height() + 10) / 2;
var popupleftmargin = (jQuery('#' + popupid).width() + 10) / 2;


// Then using .css function style our popup box for center allignment
jQuery('#' + popupid).css({
'margin-top' : -popuptopmargin,
'margin-left' : -popupleftmargin
});
});


// Now define one more function which is used to fadeout the 
// fade layer and popup window as soon as we click on fade layer
jQuery('#fade,.cross-close').click(function() {


// Add markup ids of all custom popup box here 						  
jQuery('#fade , #popuprel , #popuprel2 , #popuprel3').fadeOut();
return false;
});
});
function numonly(values) {
    var findit
    var findittest = "N"
    for (var i = 0; i < values.length; i++)  {
      findit = values.substring(i, i + 1)
      if (findit != "." && (findit < "0" || findit > "9")) {
        findittest = "Y"
      }
    }
    if (findittest == "Y") {
      alert ("Please enter numeric value only")
    }
}  
function Getresults() {
	var   nLength = parseFloat(jQuery('.pondl1').val());  
    var   nWidth =  parseFloat(jQuery('.pondw1').val());
    var   nMaxdepth = parseFloat(jQuery('.pondh1').val());
    var   nAvgdepth = parseFloat(jQuery('.pondd1').val());
    var   nArea = nLength * nWidth;
    var   nVolume = Math.round(nLength * nWidth * nAvgdepth * 7.5);
    var   nLinerwidth = Math.ceil(nWidth + (2 * nMaxdepth) + 2);
    var   nLinerlength = Math.ceil(nLength + (2 * nMaxdepth) + 2);
    var   nFilter = Math.ceil(nVolume * 1.058);
    var   nPump = Math.ceil(nVolume / 2);
    var   nPerimeter = Math.ceil((nWidth+nLength)*2);
    var   nLily = Math.round((nArea / 10) * .60);    
	var   nVolumeltrs = Math.ceil(nVolume*3.78541);
	var   nVolumeIglns = Math.ceil(nVolume*0.832674);
	  nVolume = accounting.formatNumber(nVolume);
	  nVolumeltrs = accounting.formatNumber(nVolumeltrs);
	  nVolumeIglns = accounting.formatNumber(nVolumeIglns);
	
	
	jQuery('.volume').html(nVolume);
	jQuery('.volumeltrs').html(nVolumeltrs);
	jQuery('.volumeglns').html(nVolumeIglns);
	jQuery('.nLinerlength').html(nLinerlength);
	jQuery('.nLinerwidth').html(nLinerwidth);
} 

function Getresultsoval() {
	var   nDiameterA = parseFloat(jQuery('.pondl2').val());  
    var   nDiameterB =  parseFloat(jQuery('.pondw2').val());
    var   nMaxdepth = parseFloat(jQuery('.pondh2').val());
    var   nAvgdepth = parseFloat(jQuery('.pondd2').val());
   nRadiusA = nDiameterA / 2;
    nRadiusB = nDiameterB / 2;
    nArea = nRadiusA * nRadiusB * Math.PI;
    nVolume = Math.round(nArea * nAvgdepth * 7.5);
    nLinerwidth = Math.ceil(nDiameterB + (2 * nMaxdepth) + 2);
    nLinerlength = Math.ceil(nDiameterA + (2 * nMaxdepth) + 2);
    nFilter = Math.ceil(nVolume * 1.10);
    nPump = Math.ceil(nVolume / 2);
    nPerimeter = Math.ceil(Math.PI * Math.sqrt(2 * ((nRadiusA * nRadiusA) + (nRadiusB * nRadiusB))));
		var   nVolumeltrs = Math.ceil(nVolume*3.78541);
	var   nVolumeIglns = Math.ceil(nVolume*0.832674);
	 nVolume = accounting.formatNumber(nVolume);
	 nVolumeltrs = accounting.formatNumber(nVolumeltrs);
	 nVolumeIglns = accounting.formatNumber(nVolumeIglns);
	 
	jQuery('.volume').html(nVolume);
	jQuery('.volumeltrs').html(nVolumeltrs);
	jQuery('.volumeglns').html(nVolumeIglns);
	jQuery('.nLinerlength').html(nLinerlength);
	jQuery('.nLinerwidth').html(nLinerwidth);
}
function Getresultsround() {
	diammpond = parseFloat(jQuery('.pondd3').val()); 
    diammponddeep = parseFloat(jQuery('.ponddp3').val());
    diammpondavg = parseFloat(jQuery('.pondad3').val());
    radiuspond = diammpond / 2;
    nArea = (radiuspond * radiuspond) * Math.PI;
    nVolume = Math.round(nArea * diammpondavg * 7.5);
    nVolume1 = nArea * diammpondavg * 7.5;
		console.log(nVolume);
		console.log(nVolume1);
    nLinerwidth = 2 * diammponddeep + diammpond + 2;
    nLinerlength = diammpond + (2 * diammponddeep) + 2;
    nFilter = Math.ceil(nVolume * 1.055);
    nPump = Math.ceil(nVolume / 2);
    nPerimeter = Math.ceil(diammpond * Math.PI);
	
	
	
		var   nVolumeltrs = Math.ceil(nVolume*3.78541);
	var   nVolumeIglns = Math.ceil(nVolume*0.832674);
	
	 nVolume = accounting.formatNumber(nVolume);
	 nVolumeltrs = accounting.formatNumber(nVolumeltrs);
	 nVolumeIglns = accounting.formatNumber(nVolumeIglns);
	jQuery('.volume').html(nVolume);
	jQuery('.volumeltrs').html(nVolumeltrs);
	jQuery('.volumeglns').html(nVolumeIglns);
	jQuery('.nLinerlength').html(nLinerlength);
	jQuery('.nLinerwidth').html(nLinerwidth);
}

   