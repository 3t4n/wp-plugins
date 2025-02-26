$(document).ready(function(){
	var numItems = $('.nikita_kiro').length;
	var x = new Array();
	for(var i=1;i<=numItems;i++)
	{
		x[i] = $(".nikita-kiro").attr("src");
	}
	console.log(x);
});