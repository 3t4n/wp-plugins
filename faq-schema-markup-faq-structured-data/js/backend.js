function removetr(tda)
{
		
		$(tda).closest("tr").remove();
}

$(document).ready(function() {
    $("#faq_add_row").on("click", function() {
       var newid = 0;
        $.each($("#tab_logic tr"), function() {
            if (parseInt($(this).data("id")) > newid) {
                newid = parseInt($(this).data("id"));
            }
        });
        newid++;
        
		questionno=jQuery("tr").length+1;
        var tr = $('<tr></tr>', {
            id: "addr"+newid,
            "data-id": newid
        });
        
		var td = $('<td class="faq-tdwidth"><input type="text" class="faq-question-input" placeholder="Question #'+questionno+'" name="questions[]"><a href="javascript:void(0);" class="faq-float-right faq-row-remove" onclick="removetr(this)"><span class="dashicons dashicons-trash"></span></a><textarea class="faq-answer-input"  placeholder="Answer #'+questionno+'" name="answers[]"></textarea></td>');
		td.appendTo($(tr));
		$(tr).appendTo($('#tab_logic'));
	
        
});
});
