
function GrabAR_textCopy(f) {
	  /* Get the text field */
	  var copyText = document.getElementById("grabar_"+f);

	  /* Select the text field */
	  copyText.select();
	  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

	  /* Copy the text inside the text field */
	  document.execCommand("copy");

	  /* Alert the copied text */
	  alert("Code was copied to clipboard")//. + copyText.value);
}
function GrabAR_click_side_button() {
	var btnWidth = document.getElementById("grabar_btn_width");
	var btnColor = document.getElementById("grabar_btn_color");
	var custBtn = document.getElementById("grabar_custom_btn");
	var sideBtnPos = document.getElementById("grabar_side_button_position");

  if(document.getElementById("grabar_side_button").checked == true){
  	btnWidth.readOnly = true;
  	btnColor.disabled = true;
  	custBtn.readOnly = true;
  	sideBtnPos.disabled = false;
  }
  else{
  	btnWidth.readOnly = false;
  	btnColor.disabled = false;
  	custBtn.readOnly = false;
		sideBtnPos.disabled = true;
  }
};
function GrabAR_click_inc_button() {
	var code_d = document.getElementById("grabar_button_code_d");
	var code = document.getElementById("grabar_button_code");
	var copyLink = document.getElementById("grabar_copy_link");
	var ccss = document.getElementById("grabar_custom_style");
  if(document.getElementById("grabar_inc_button").checked == true){
  	document.getElementById("grabar_woo_btn").checked = false;
  	code_d.style.display = "block";
  	code.style.display = "none";
  	copyLink.style.display = "none";
  	ccss.readOnly = false;
  }
  else{
  	code_d.style.display = "none";
  	code.style.display = "block";
  	copyLink.style.display = "block";
  	customCSS = ccss.value;
  	ccss.readOnly = true;

  }
};
function GrabAR_click_woo_btn(){
	if(document.getElementById("grabar_woo_btn").checked == true){
  	document.getElementById("grabar_inc_button").checked = false;
  	GrabAR_click_inc_button();
  }
}
function GrabAR_SubmitMsg(){
	document.getElementById("grabar_ClickSubmit").style.display = "";
}
document.onload = GrabAR_click_inc_button();
document.onload = GrabAR_click_side_button();

