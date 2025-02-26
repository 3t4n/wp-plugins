// initialize display options
disp_options_array=[];	


//listen for changes in products form
const cbfnl_product_form = document.getElementById("cbfunnelpro_product_form");

isFormDirty_product = false;

if (cbfnl_product_form){
	cbfnl_product_form.addEventListener('change', function() {
		document.getElementById("cbfunnelpro_products_save").className="button-red";
		isFormDirty_product = true;
	});
	
	
	document.getElementById("cbfunnelpro_products_save").addEventListener('click', function(){	
		isFormDirty_product = false;
	});
	
	
	const cbfnl_products_form = document.getElementById("cbfunnelpro_product_form");
	if (cbfnl_products_form){		
		
		$cbfnl_category=cbfnlData.cbfnl_category;
		$cbfnl_subcat=cbfnlData.cbfnl_subcat;
		$resourcePath=cbfnlData.resourcePath;
		$affid=cbfnlData.affid;
		$cbfnl_prod_chkbox_status=cbfnlData.cbfnl_prod_chkbox_status;
		
		cbfnl_getImages();
		
	}
	
	// Trigger a warning if the user tries to leave the settings page without saving
    window.addEventListener("beforeunload", (event) => {
        if (isFormDirty_product) {
            var message = "You have unsaved changes. Are you sure you want to leave?";
            event.preventDefault();
            event.returnValue = message;
            return message; 
		}
	});
}

//listen for changes in general settings form
const cbfnl_settings_form = document.getElementById("cbfunnelpro_setting_form");

isFormDirty_settings = false;

if (cbfnl_settings_form){
	cbfnl_settings_form.addEventListener('keyup', function(event) {	
		
		
		
		document.getElementById("cbfunnelpro_setting_save").className="button-red";
		isFormDirty_settings = true;
		
	});
	
	cbfnl_settings_form.addEventListener('change', function(event) {
		
		if(event.target.name !='cbfnl_select_shortcode'){
			document.getElementById("cbfunnelpro_setting_save").className="button-red";
			isFormDirty_settings = true;
			
		}	
		
		
	});
	
	document.getElementById("cbfunnelpro_setting_save").addEventListener('click', function(){	
		isFormDirty_settings = false;
	});
	
	// Trigger a warning if the user tries to leave the settings page without saving
    window.addEventListener("beforeunload", (event) => {
        if (isFormDirty_settings) {
            var message = "You have unsaved changes. Are you sure you want to leave?";
            event.preventDefault();
            event.returnValue = message;
            return message; 
		}
	});
	
}



// Trigger a warning if the user tries to leave the settings page without saving
// window.addEventListener("beforeunload", (event) => {
// if (isFormDirty_settings || isFormDirty_product || isFormDirty_display) {
// var message = "You have unsaved changes. Are you sure you want to leave?";
// event.preventDefault();
// event.returnValue = message;
// return message; 
// }
// });



//listen for changes in advanced settings form
const cbfnl_advance_form = document.getElementById("cbfunnelpro_advance_setting_form");
if (cbfnl_advance_form){
	
	isFormDirty_display = false;
	
	cbfnl_advance_form.addEventListener('change', function() {
		document.getElementById("cbfunnelpro_advance_setting_save").className="button-red";
		isFormDirty_display = true;
	});
	
	document.getElementById("cbfunnelpro_advance_setting_save").addEventListener('click', function(){	
		isFormDirty_display = false;
	});
	
	// Trigger a warning if the user tries to leave the settings page without saving
    window.addEventListener("beforeunload", (event) => {
        if (isFormDirty_display) {
            var message = "You have unsaved changes. Are you sure you want to leave?";
            event.preventDefault();
            event.returnValue = message;
            return message; 
		}
	});
	
	
	
	$cbfnl_show_header_text=cbfnlData.cbfnl_show_header_text;
	$cbfnl_show_header_image=cbfnlData.cbfnl_show_header_image;
	$cbfnl_show_header_mobile=cbfnlData.cbfnl_show_header_mobile;
	
	$cbfnl_show_widget_text=cbfnlData.cbfnl_show_widget_text;
	$cbfnl_show_widget_image=cbfnlData.cbfnl_show_widget_image;
	$cbfnl_show_widget_mobile=cbfnlData.cbfnl_show_widget_mobile;
	
	$cbfnl_show_content_text=cbfnlData.cbfnl_show_content_text;
	$cbfnl_show_content_image=cbfnlData.cbfnl_show_content_image;
	$cbfnl_show_content_mobile=cbfnlData.cbfnl_show_content_mobile;
	
	$cbfnl_show_footer_text=cbfnlData.cbfnl_show_footer_text;
	$cbfnl_show_footer_image=cbfnlData.cbfnl_show_footer_image;
	$cbfnl_show_footer_mobile=cbfnlData.cbfnl_show_footer_mobile;
	
	$cbfnl_number_of_results=cbfnlData.cbfnl_number_of_results;
	
	$cbfnl_show_home=cbfnlData.cbfnl_show_home;
	$cbfnl_show_search=cbfnlData.cbfnl_show_search;
	$cbfnl_show_pages=cbfnlData.cbfnl_show_pages;
	
	$cbfnl_font_size=cbfnlData.cbfnl_font_size;
	$cbfnl_font_family=cbfnlData.cbfnl_font_family;
	
	$resourcePath=cbfnlData.resourcePath;
	
	
	cbfnl_updateDisplaySettings();
	
}


jQuery(document).ready(function() {
	
	
	const cbfnl_setting_form = document.getElementById("cbfunnelpro_setting_form");
	if (cbfnl_setting_form){		
		
		$cbfnl_category=cbfnlData.cbfnl_category;
		$cbfnl_subcat=cbfnlData.cbfnl_subcat;
		$resourcePath=cbfnlData.resourcePath;
		
		getSettingCategory();
		
	}	
    
});



function cbfnl_products_selall(){	
	
	chkboxes=document.getElementsByClassName("cbfnl_chkbox");	
	
	for (i=0; i<chkboxes.length ; i++){				
		
		chkboxes[i].checked=true;								
		
	}
	document.getElementById("cbfunnelpro_products_save").className="button-red";
	
	
}		



function cbfnl_products_deselall(){			
	
	chkboxes=document.getElementsByClassName("cbfnl_chkbox");	
	
	for (i=0; i<chkboxes.length ; i++){				
		
		chkboxes[i].checked=false;								
		
	}	
	
	document.getElementById("cbfunnelpro_products_save").className="button-red";
	
}

function getSettingCategory(){
	
	
	url=$resourcePath+"/getcategories.php";
	
	fetch(url)			
	.then(response => response.text())			
	.then(data => {					
		
		document.getElementById("cbfnl_category").innerHTML= data;
		document.getElementById("cbfnl_category").value= $cbfnl_category;
		cbfnl_update_sub_cat();				
		
	});
	
}




function copyToClipboard() {			
	// Get the text field			
	var copyText = document.getElementById("display_shortcode").innerHTML;			
	
	navigator.clipboard.writeText(copyText);			
	
	// Alert the copied text			
	alert("ShortCode Copied to Clipboard");			
}

function changeshortcode(){			
	
	value=document.getElementById("cbfnl_select_shortcode").value;			
	document.getElementById("display_shortcode").innerHTML='[cbfunnelpro location="'+value+'"]';			
	
}

function cbfnl_clear_sub_cat(){			
	
	cbfnl_update_sub_cat();			
	
}		

function cbfnl_update_sub_cat(){
	
	$cat=document.getElementById("cbfnl_category").value;	
	
	url=$resourcePath+"/getcbfsubcat.php?category="+$cat;			
	
	fetch(url)			
	.then(response => response.text())			
	.then(data => {				
		
		document.getElementById("cbfnl_sub_category").innerHTML= data;				
		document.getElementById("cbfnl_sub_category").value=$cbfnl_subcat;				
		
	});			
}


function cbfnl_getImages(){
	
	$url=$resourcePath+"/getimages.php?cat="+$cbfnl_category+"&subcat="+$cbfnl_subcat+"&affid="+$affid;	
	
	
	fetch($url)		
	.then(response => response.text())		
	.then(data => {				
		
		document.getElementById("cbfnl_prod_images").innerHTML= data;			
		allchkboxstatus=$cbfnl_prod_chkbox_status;
		
		buttons=document.getElementsByClassName("button button-primary button-large");			
		for (i=0; i<buttons.length; i++){							
			buttons[i].style.display="inline-block";							
		}				
		
		chkboxes=document.getElementsByClassName("cbfnl_chkbox");	
		
		document.getElementById("prod_selection_heading").innerHTML="Select from the List of <b>"+chkboxes.length+"</b> Products Below to be Promoted";
		
		numberchecked=0;			
		
		for (j=0; j<chkboxes.length; j++){				
			
			myid=chkboxes[j].id;							
			
			if (allchkboxstatus.includes(myid)){					
				chkboxes[j].checked=true;					
				numberchecked++;					
				}else{					
				chkboxes[j].checked=false;					
			}				
			
		}			
		
		
		
	});	
	
	
}


function cbfnl_updateDisplaySettings(){	
	
	var displayCheckBoxes = document.getElementsByClassName("cbfnl_option_chk_box");				
	for (i=0; i<displayCheckBoxes.length; i++){					
		displayCheckBoxes[i].checked=false;					
	}
	
	
	document.getElementById('cbfnl_show_header_text').checked = ($cbfnl_show_header_text==1) ? true: false;	
	document.getElementById('cbfnl_show_header_image').checked = ($cbfnl_show_header_image==1) ? true: false;	
	document.getElementById('cbfnl_show_header_mobile').checked = ($cbfnl_show_header_mobile==1) ? true: false;
	
	document.getElementById('cbfnl_show_widget_text').checked = ($cbfnl_show_widget_text==1) ? true: false;
	document.getElementById('cbfnl_show_widget_image').checked = ($cbfnl_show_widget_image==1) ? true: false;
	document.getElementById('cbfnl_show_widget_mobile').checked = ($cbfnl_show_widget_mobile==1) ? true: false;
	
	document.getElementById('cbfnl_show_content_text').checked = ($cbfnl_show_content_text==1) ? true: false;
	document.getElementById('cbfnl_show_content_image').checked = ($cbfnl_show_content_image==1) ? true: false;
	document.getElementById('cbfnl_show_content_mobile').checked = ($cbfnl_show_content_mobile==1) ? true: false;
	
	document.getElementById('cbfnl_show_footer_text').checked = ($cbfnl_show_footer_text==1) ? true: false;
	document.getElementById('cbfnl_show_footer_image').checked = ($cbfnl_show_footer_image==1) ? true: false;
	document.getElementById('cbfnl_show_footer_mobile').checked = ($cbfnl_show_footer_mobile==1) ? true: false;
	
	document.getElementById('cbfnl_number_of_results').value=$cbfnl_number_of_results;
	
	document.getElementById('cbfnl_show_home').checked = ($cbfnl_show_home == 1) ? true: false; 	
	document.getElementById('cbfnl_show_search').checked = ($cbfnl_show_search == 1) ? true: false; 			
	document.getElementById('cbfnl_show_pages').checked = ($cbfnl_show_pages == 1) ? true: false;	
	
	document.getElementById('cbfnl_font_size').value= $cbfnl_font_size;		
	document.getElementById('cbfnl_font_family').value= $cbfnl_font_family;
	
	
}


