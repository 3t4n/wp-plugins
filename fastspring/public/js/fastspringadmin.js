function dataCallbackFunctionAdmin(data)
{
	var prods = new Array();
	var items = "<option value=''></option>";
	var products = [];
	for(var i = 0; i < data.groups.length; i++)
	{
		for(var j = 0; j < data.groups[i].items.length; j++)
		{
			prods[data.groups[i].items[j].pid] = data.groups[i].items[j];
			items = items + "<option value='" + data.groups[i].items[j].pid + "'>" + data.groups[i].items[j].pid + " - "+ data.groups[i].items[j].display + "</option>";
			products.push( {
						value: data.groups[i].items[j].pid,
						label: data.groups[i].items[j].display
					});
			for(var k = 0; k < data.groups[i].items[j].groups.length; k++)
			{
				for(var l = 0; l < data.groups[i].items[j].groups[k].items.length; l++)
				{
					products.push( {
						value: data.groups[i].items[j].groups[k].items[l].pid,
						label: data.groups[i].items[j].groups[k].items[l].display
					});
				}
			}
		}
	}
	window.parent.prods = prods;
}