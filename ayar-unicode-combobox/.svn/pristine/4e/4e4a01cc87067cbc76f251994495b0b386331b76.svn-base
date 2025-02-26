if(BrowserDetect.OS=="iPhone/iPod" || BrowserDetect.OS=="iPad")
{
	//For WpTouch Theme and Carrington
	footer=".singlentry , .commentlist, .comment-content, a.sh2, .post div, a.h2, ul.table.disclosure a, ul.table li.disclosure a, .group h1, .group p, .commentlist, .post a.h2, .post h2,post.not-single.not-page p,#content .content, #content .page .content, #content .post.single .content, #content .post.not-single.not-page p, .single .title-area, .page .title-area,.post.single h2, .post.page h2,.post h2, .post h2 a";
	footer+="{";
	footer+="font-family: 'Ayar', AyarTakhu, Ayar Takhu !important;"
	footer+="}";
	
	var body = document.getElementsByTagName('body')[0];
	var style = document.createElement('style');
	
	rules = document.createTextNode(footer);
	if(style.styleSheet)
		style.styleSheet.cssText = rules.nodeValue;
	else style.appendChild(rules);
	
	body.appendChild(style);
	
}