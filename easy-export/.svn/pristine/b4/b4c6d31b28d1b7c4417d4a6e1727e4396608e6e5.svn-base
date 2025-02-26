   /*
  *  Additional jQuery code require for the Easy Export plugin to run
  *
  *   - HP Gong
  */

(function( $ ) {
$(document).ready(function(){
  function changeColor(word, hexColor) {
       $("td:contains("+word+")").css("color", hexColor);
  }

  changeColor("Completed", "Blue");
  changeColor("Processing", "Green");
  changeColor("Pending", "Orange");
  changeColor("On-hold", "Red");

$('.st').each(function(i, n) {
   if($(n).text() < 500) $(n).css('color', 'red');
   if($(n).text() > 499) $(n).css('color', 'blue');
});

$('.sale').css('color', 'red');

	$(".first_tab").champ();
	$(".second_tab").champ({
	plugin_type: "tab",
	side: "right",
	active_tab: "1",
	controllers: "false"
	});
	$(".multipleTab").champ({
	multiple_tabs: "true"
	});

$('th#col').click(function(){
    var table = $(this).parents('table').eq(0);
    var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()));
    this.asc = !this.asc;
    if (!this.asc){
		rows = rows.reverse();
		}
    for (var i = 0; i < rows.length; i++){
		table.append(rows[i]);
	}
});
function comparer(index) {
    return function(a, b) {
        var valA = getCellValue(a, index), valB = getCellValue(b, index);
        return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.toString().localeCompare(valB);
    }
}
function getCellValue(row, index){ 
	return $(row).children('td').eq(index).text(); 
}


});
})( jQuery );
