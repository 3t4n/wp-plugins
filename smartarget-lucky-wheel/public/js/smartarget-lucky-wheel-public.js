function init_lucky_wheel (hash)
{
	if (!hash)
	{
		return;
	}

	insertJs_lucky_wheel(hash);
}

function insertJs_lucky_wheel (hash)
{
	var script = document.createElement("script");
	script.type = "text/javascript";
	script.src = `https://smartarget.online/loader.js?ver=${Math.random()}&u=${hash}&source=wordpress_lucky_wheel`;
	document.head.appendChild(script);
}

init_lucky_wheel(smartarget_lucky_wheel_params.hash);
