
<!DOCTYPE html>
<html>
<head>
<title>Mortgage Calculator</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>@import url('https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap');</style>

<link rel="stylesheet" type="text/css" href="https://wppluginbox.com/ICONS/icons.css"> 
<link rel="stylesheet" type="text/css" href="CSS/css.css?v=1.5">
<link rel="stylesheet" type="text/css" href="CSS/style.css">
<link rel="stylesheet" type="text/css" href="CSS/button.css?v=1.1">
<link rel="stylesheet" type="text/css" href="CSS/custom.css?v=3.1">
<link rel="stylesheet" href="slider/style.css?v=1.2"/>
<link rel="stylesheet" type="text/css" href="CSS/loader.css?v=1.4">
<link rel="stylesheet" href="JS/tooltips/jquery-ui.css">
<link rel="stylesheet" href="JS/tooltips/style.css">

<script type="text/javascript" src="JS/jquery.min.js"></script>
<script type="text/javascript" src="LIB-JS/formatters.js?v=2.2"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="JS/tooltips/jquery-ui.js"></script>
<script type="text/javascript" src="LIB-JS/isend.min.js"></script>

</head>

<body>

<div class="main card-1">

<div class="flexer-1">  
<div id="step-1">
<div class="">

<form onsubmit="calc();return false;" id="form-data">

   
<div class="input-div">
<div>Loan Amount</div>
   <div><input type="text" class="s_l dollar" sld-id="A3" id="label_A3" name="A3" data-max="400000" limit-lock="0" title="Use slider or enter value in these input fields"></div>
   <div class="sldr-div"><input type="text" class="khyzer sld"  id="A3" placeholder="Enter" data-form="dollar"></div>
</div>


<div class="input-div">
<div>Interest Rate</div>
   <div><input type="text" class="s_l perc" sld-id="B3" id="label_B3" name="B3" data-max="40" value="2%" limit-lock="1"></div>
   <div class="sldr-div"><input type="text" class="khyzer sld"  id="B3" placeholder="Enter" data-form="perc" ></div>
</div>


<div class="input-div">
   <div>Term in Years</div>
   <div><input type="text" class="s_l yrs" sld-id="C3" id="label_C3" name="C3" data-max="30" limit-lock="1"></div>
    <div class="sldr-div"><input type="text" class="khyzer sld"  id="C3" placeholder="Enter" data-form="yrs" ></div>
</div>



<div style="margin-top: 20px;" class="align-center">
      <div class="loader calc-load" style="margin:12px;display: none;"></div>
      <button type="submit" class="btn">Calculate <i class="fas fa-calculator"></i></button>
      <button type="button" class="btn detail-show hide">View Amortization schedule <i class="fas fa-chevron-double-right"></i></button>
</div>



</form>
</div>


<script> 
 $( function() { $( document ).tooltip(

{ tooltipClass: "tooltip", }

); } ); 


$(document).ready(function() {
    $("#label_A3").focus();
    $("#label_A3").addClass('hover-field');
});

$(document).on('click', 'body', function() {
$("#label_A3").removeClass('hover-field');
$("#label_A3").removeAttr('title');

});

</script>
  <style type="text/css">
  .tooltip{
    background-color:black;
    color: white;
    font-size: 12px;
    border: 1px solid black;
    font-family: var(--default-font);
    border-radius: 4px;
  }

  .ui-widget.ui-widget-content {
    border: 1px solid #000000;
}

.ui-widget-shadow {
     -webkit-box-shadow: 0px 0px 0px #666666; 
     box-shadow: 0px 0px 0px #666666; 
}
</style>

<style type="text/css">
   .info-tb{
     width: 100%;
     font-weight: 600;
   }

   .info-tb td:nth-child(2){text-align: right;}
   .info-tb td{
      padding: 8px 2px;
      border-bottom:1px solid #c6c6c6;
   }

   .input-div{
      margin-bottom: 40px;
   }


   .sldr-div {
    margin-top: -12px;
}

.s_l:hover,.hover-field {
    border: 1px solid #005bfd;
    border-radius: 6px;
    max-width: 124px;
    padding-left: 12px;
}
</style>

<style type="text/css">
 .irs--round .irs-from, .irs--round .irs-to, .irs--round .irs-single {
    display: none;
}
</style>

</div>
<div id="step-2"><div id="wpbox-chart-1"></div></div>
</div>

</div>


<center>
  <div id="statement" style="display:none;">
    <p class="mp">You will need to pay <b>
      <span id="monthly-pay">...</span></b> every month for 
      <b><span id="years-to-pay">...</span></b> years to payoff the debt.
    </p>
  </div>
</center>





<div class="main" id="details-div" style="display: none;">
<div id="step-3"><div id="wpbox-chart-2"></div></div>
<div id="step-4"><div style="height: 20px;"></div>

<div class="overflow custom-scroll">
<table class="amortize">
<thead>
<tr>
<td>Month </td>
<td>Starting Balance </td>
<td>You Paid </td>
<td>Interest </td>
<td>Principal </td>
<td>Ending Balance </td>
<td>Total Interest </td>
</tr>
</thead>

<tbody id="amortize-table"></tbody>

</table>
</div>




<style type="text/css">
.overflow{
	max-height: 600px;
	overflow-y: auto;
}

	.amortize{
		width: 100%;		
		text-align: center;
}
	.amortize thead td {
    padding: 12px;
    background-color: #ff0075;
    position: sticky;
    top: 0;
    color: white;
}

	.amortize tbody td {
    padding: 11px 6px;
}

	.amortize tbody tr:nth-child(even){
		background-color:  #f3f9ff;
	}

    @media screen and (max-width: 600px) {

.btn {margin-bottom: 12px;}
.align-center{text-align: center;}

}


</style></div>
</div>



 <script type="text/javascript" src="LIB-JS/slider-js.js"></script> 
 <script type="text/javascript" src="LIB-JS/script.js?v=1.2"></script> 
 <script type="text/javascript" src="LIB-JS/format-js.js?v=1.9"></script> 
<script type="text/javascript" src="LIB-JS/donut-chart.js"></script>
<script type="text/javascript" src="LIB-JS/line-chart.js?v=1.4"></script>

<div style="height: 50px;"></div>


<script>document.addEventListener('contextmenu', event => event.preventDefault());</script>

</body>
</html>