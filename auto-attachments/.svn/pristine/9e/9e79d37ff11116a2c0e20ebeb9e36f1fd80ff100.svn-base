jQuery(document).ready(function($) {
		var editor = CodeMirror.fromTextArea(document.getElementById("custom_css"), {mode:  "css",lineWrapping:true,workTime:0,workDelay:0,autofocus:true});
	  
$(".btn-group").each(function(){var e=$(this);var t=e.children(".yes");var n=e.children(".no");var r=e.attr("data-target");var i=$("#"+r).val();if("no"==i){n.addClass("active")}else if("yes"==i){t.addClass("active")}t.on("click",function(){$(n).removeClass("active");$(this).addClass("active");$("#"+r).val("yes").change()});n.on("click",function(){$(t).removeClass("active");$(this).addClass("active");$("#"+r).val("no").change()})});
});