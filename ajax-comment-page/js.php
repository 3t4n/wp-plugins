max = <?php echo $_GET["max"];?>;
comList = $("#comment_pager li");
function showCommentPage(num) {
	$(comList).hide("slow");
	
	from = (num-1)*max;
	to = from+max;
	
	for (i=from;i<to;i++) {
		$(comList[i]).show("slow");
	}
	
	$(cpsa).css("background-color","#FFFFFF");
	$(cpsa).css("color","#3B5999");
	
	$(cpsa[num-1]).css("background-color","#3B5999");
	$(cpsa[num-1]).css("color","#FFFFFF");
	
}

pagenum = Math.ceil(comList.length/max);
commentNavi = "<span>Comment Page : </span>";
for (i=1;i<pagenum+1;i++) {
	commentNavi += "<span><a href='#comment_pager' onclick='showCommentPage("+i+")'>"+i+"</a></span>";
}
commentNavi += "</div>";
$("#comment_pager li:last").after("<p>"+commentNavi+"</p>");

cpsa = $("#comment_pager span a");

$(cpsa).css("padding","3px");
$(cpsa).css("border","solid 1px");
$(cpsa).css("margin","3px");

showCommentPage(1);