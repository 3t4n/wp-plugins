function loadStyle()
{
	jQuery(".color").each(function(e, o)
	{
		var t = this.value;
		jQuery("#display-" + this.id).css("background-color", t)
	})
}




jQuery(function()
{
	jQuery(document).tooltip(
	{
		tooltipClass: "tooltip",
		content: function()
		{
			return jQuery(this).prop("title")
		}
	})
}) 


jQuery(".color").change(function()
{
	loadStyle()
})


loadStyle() 
