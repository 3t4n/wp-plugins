<style>

.accordion {
  background-color: #3c3c3c;
  color: #a3a3a3;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
}

.active, .accordion:hover {
  background-color:rgb(45, 44, 44); 
}

.panel {
  padding: 18px;
  display: none;
  background-color:#515151;
  overflow: hidden;
}
.col-4{
font-size: 15px;
}
.colorbox{
    width:20px;
    border: none !important;
    outline: none !important;
    padding: 2px;
    height:20px;
}
.sliderbox{
    width:47px;
    height:15px;
    font-size: 10px;
    accent-color:#7f7f7f;
}
input[type=color]{
border: none;
height:60%;
margin-top: 3px;
cursor: pointer;
width:20%;
outline: none;
border: none;
padding: 0px;
border-color: inherit;
  -webkit-box-shadow: none;
  box-shadow: none;
}
::-moz-color-swatch {
    border-color: red;
}
.inputselect{
font-size: 9px !important;
background-color: red;
width:50px;
}
#headingtextalign{
width:60px;
height:15px;
font-size: 10px;
}

input[type="color"]::-webkit-color-swatch {
  border: none;
}
</style>
</head>
<body>

<p class="fs-4 text-white text-center">Style</p>
<div class="mainsettingsbox">
  <button class="accordion">Box Settings</button>
<div class="panel">
   <div class="row" style="color:#7f7f7f;">
        <div class="luckydrawinputbox smalluckydrawinputbox"> 
        <p>Background Color</p>
        <input  id="boxbackgroundcolor" name="boxbackgroundcolor"  value="#e6e6e6" type="color" class="luckydrawinputboxsmalltext" title="Choose a color"> 
        </div>  

        <div class="luckydrawinputbox smalluckydrawinputbox"> 
        <p>Divider Color</p>
        <input  id="boxdividercolor" name="boxdividercolor"  value="#ffffff" type="color" class="luckydrawinputboxsmalltext" title="Choose a color">
        </div>  

      
        <div class="luckydrawinputbox smalluckydrawinputbox"> 
        <p>Divider Size</p>
        <input  id="boxdividersize" name="boxdividercolor"  value="1" type="number" min="0" max="10" onkeyup="if(this.value > 10) this.value = 10"; class="luckydrawinputboxsmalltext" title="Choose size"> <b>px</b>
        </div>

        <div class="luckydrawinputbox smalluckydrawinputbox"> 
        <p>Border Color</p>
        <input  id="boxbordercolor" name="boxdividercolor"  value="#e6e6e6" type="color" class="luckydrawinputboxsmalltext" title="Choose a color">
        </div>  

      
        <div class="luckydrawinputbox smalluckydrawinputbox"> 
        <p>Border Size</p>
        <input  id="boxbordersize" name="boxdividercolor"  value="1" type="number" min="0" max="20" onkeyup="if(this.value > 20) this.value = 20"; class="luckydrawinputboxsmalltext" title="Choose size"> <b>px</b>
        </div>

        <div class="luckydrawinputbox smalluckydrawinputbox"> 
        <p>Border Radius</p>
        <input  id="borderradius" name="boxdividercolor"  value="2" type="number" min="0" max="20" onkeyup="if(this.value > 20) this.value = 20"; class="luckydrawinputboxsmalltext" title="Choose size"> <b>px</b>
        </div>


  </div>
      
</div>

<button class="accordion">Heading Settings </button>
<div class="panel">
<div class="row" style="color:#7f7f7f;">
        

        <div class="luckydrawinputbox smalluckydrawinputbox"> 
        <p>Background Color</p>
        <input  id="headingbackgroundcolor" name="boxbackgroundcolor"  value="#e5e5e5" type="color" class="luckydrawinputboxsmalltext" title="Choose a color"> 
        </div>

        <div class="luckydrawinputbox smalluckydrawinputbox"> 
        <p>Color</p>
        <input  id="headingcolor" name="boxbackgroundcolor"  value="#fff" type="color" class="luckydrawinputboxsmalltext" title="Choose a color"> 
        </div>  

              
        <div class="luckydrawinputbox smalluckydrawinputbox"> 
        <p>Font Size</p>
        <input  id="headingfontsize" name="boxdividercolor"  value="15" type="number" class="luckydrawinputboxsmalltext" min="0" step="1" max="35" title="Choose size" onkeyup="if(this.value > 35) this.value = null;"> <b>px</b>
        </div>

        <div class="luckydrawinputbox smalluckydrawinputbox headingalign" style="width:100%;"> 
        <p style="width:60%";>Border Color</p>
        <button id="" name="boxdividercolor"  value="left" type="color" class="luckydrawinputboxsmallbutton" title="Choose a color"><i class="fa-solid fa-align-left"></i></button>
        <button id="" name="boxdividercolor"  value="center" type="color" class="luckydrawinputboxsmallbutton" title="Choose a color"><i class="fa-solid fa-align-center"></i></button>
        <button id="" name="boxdividercolor"  value="right" type="color" class="luckydrawinputboxsmallbutton" title="Choose a color"><i class="fa-solid fa-align-right"></i></button>

        </div>  
      
  </div>
</div>

<button class="accordion">Description Settings</button>
<div class="panel">
<div class="row" style="color:#7f7f7f;">

        <div class="luckydrawinputbox smalluckydrawinputbox"> 
        <p>Background Color</p>
        <input  id="descriptionbgcolor" name="boxbackgroundcolor"  value="#e5e5e5" type="color" class="luckydrawinputboxsmalltext" title="Choose a color"> 
        </div> 

        <div class="luckydrawinputbox smalluckydrawinputbox"> 
        <p>Color</p>
        <input  id="descriptioncolor" name="boxbackgroundcolor"  value="#e5e5e5" type="color" class="luckydrawinputboxsmalltext" title="Choose a color"> 
        </div>  

              
        <div class="luckydrawinputbox smalluckydrawinputbox"> 
        <p>Font Size</p>
        <input  id="descriptionfontsize" name="boxdividercolor"  value="15" type="number" class="luckydrawinputboxsmalltext" min="0" step="1" max="35" title="Choose size" onkeyup="if(this.value > 35) this.value = null;"> <b>px</b>
        </div>

        <div class="luckydrawinputbox smalluckydrawinputbox descriptionalign" style="width:100%;"> 
        <p style="width:60%;">Text Align Color</p>
        <button id="" name="boxdividercolor"  value="left" type="color" class="luckydrawinputboxsmallbutton" title="Choose a color"><i class="fa-solid fa-align-left"></i></button>
        <button id="" name="boxdividercolor"  value="center" type="color" class="luckydrawinputboxsmallbutton" title="Choose a color"><i class="fa-solid fa-align-center"></i></button>
        <button id="" name="boxdividercolor"  value="right" type="color" class="luckydrawinputboxsmallbutton" title="Choose a color"><i class="fa-solid fa-align-right"></i></button>

        </div>  
      
  </div>
</div>

<button class="accordion">Prize Settings</button>
<div class="panel">
<div class="row" style="color:#7f7f7f;">
        <div class="luckydrawinputbox smalluckydrawinputbox"> 
        <p>Background Color</p>
        <input  id="prizebgcolor" name="boxbackgroundcolor"  value="#e5e5e5" type="color" class="luckydrawinputboxsmalltext" title="Choose a color"> 
        </div>  

        <div class="luckydrawinputbox smalluckydrawinputbox"> 
        <p>Color</p>
        <input  id="prizecolor" name="boxbackgroundcolor"  value="#ffffff" type="color" class="luckydrawinputboxsmalltext" title="Choose a color"> 
        </div>

              
        <div class="luckydrawinputbox smalluckydrawinputbox"> 
        <p>Font Size</p>
        <input  id="prizefontsize" name="boxdividercolor"  value="15" type="number" class="luckydrawinputboxsmalltext" min="0" step="1" max="35" title="Choose size" onkeyup="if(this.value > 35) this.value = null;"> <b>px</b>
        </div>        
      
  </div>
</div>

<button class="accordion">Date Settings </button>
<div class="panel">
<div class="row" style="color:#7f7f7f;">

        <p class="fs-7 text-white text-left">Countdown Numbers </p>

        <div class="luckydrawinputbox smalluckydrawinputbox "> 
        <p>Background Color</p>
        <input  id="countdownnumberbgcolor" name="boxbackgroundcolor"  value="#D3C0C0" type="color" class="luckydrawinputboxsmalltext" title="Choose a color"> 
        </div>

        <div class="luckydrawinputbox smalluckydrawinputbox"> 
        <p>Color</p>
        <input  id="countdownnumbercolor" name="boxbackgroundcolor"  value="#e5e5e5" type="color" class="luckydrawinputboxsmalltext" title="Choose a color"> 
        </div>  

        <p class="fs-7 text-white text-left mt-4">Countdown Days</p>
        <div class="luckydrawinputbox smalluckydrawinputbox "> 
        <p>Background Color</p>
        <input  id="countdowndaysbgcolor" name="boxbackgroundcolor"  value="#D3C0C0" type="color" class="luckydrawinputboxsmalltext" title="Choose a color"> 
        </div>

        <div class="luckydrawinputbox smalluckydrawinputbox"> 
        <p>Color</p>
        <input  id="countdowndayscolor" name="boxbackgroundcolor"  value="#e5e5e5" type="color" class="luckydrawinputboxsmalltext" title="Choose a color"> 
        </div>  

             
       
  </div>
</div>

</div>


<button class="accordion">Button Settings</button>
<div class="panel">
<p class="fs-7 text-white text-left">Action Button</p>
<div class="row" style="color:#7f7f7f;">

        <div class="luckydrawinputbox mt-1 "> 
        <p>Button Text </p>
        <input id="actionbuttontext" type="text" class="luckydrawinputboxfulltext" maxlength="20" value="Register Now">
        </div> 

        <div class="luckydrawinputbox smalluckydrawinputbox"> 
        <p>Background Color</p>
        <input  id="actionbuttonbgcolor" name="boxbackgroundcolor"  value="#e5e5e5" type="color" class="luckydrawinputboxsmalltext" title="Choose a color"> 
        </div> 

        <div class="luckydrawinputbox smalluckydrawinputbox"> 
        <p>Color</p>
        <input  id="actionbuttoncolor" name="boxbackgroundcolor"  value="#ffffff" type="color" class="luckydrawinputboxsmalltext" title="Choose a color"> 
        </div>  
              
        <div class="luckydrawinputbox smalluckydrawinputbox"> 
        <p>Border Radius</p>
        <input  id="actionbuttonborderradius" name="boxdividercolor"  value="2" type="number" class="luckydrawinputboxsmalltext" min="0" step="1" max="35" title="Choose size" onkeyup="if(this.value > 35) this.value = null;"> <b>px</b>
        </div>

        <p class="fs-7 text-white text-left mt-4">Close Button</p>

        <div class="luckydrawinputbox smalluckydrawinputbox"> 
        <p>Color </p>
        <input  id="closebuttoncolor" name="boxbackgroundcolor"  value="#e5e5e5" type="color" class="luckydrawinputboxsmalltext" title="Choose a color"> 
        </div>

              
       
  </div>
</div>
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>