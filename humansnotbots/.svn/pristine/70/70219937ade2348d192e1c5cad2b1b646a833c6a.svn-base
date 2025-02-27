function HumansNotBots(replacement_method, strAT, strDOT) {
    if (document.getElementsByTagName) {
	if (strAT == null || strDOT == null) {
	    strAT = "AT";
	    strDOT = "DOT";
	}
	var disguisedForm = "([a-zA-Z0-9._%+-]+)\\s" + strAT + "\\s([a-zA-Z0-9.-]+)\\s" + strDOT + "\\s(co\.uk|[a-zA-Z]{2,4})";
	var htmlbody = document.getElementsByTagName('body')[0];
	if (replacement_method == 'innerhtml')   
	    HumansNotBots_innerhtml(htmlbody, disguisedForm);
	else if (replacement_method == 'dom')
	    HumansNotBots_dom(htmlbody, disguisedForm);
    }
}

/* innerHTML replacement method */
function HumansNotBots_innerhtml(htmlbody, disguisedForm) {
    var matchexp = new RegExp(disguisedForm, "g");
    var replacement = '<a href="mailto:$1@$2.$3">$1@$2.$3</a>';
    var newInnerHTML = htmlbody.innerHTML.replace(matchexp, replacement);
    htmlbody.innerHTML = newInnerHTML;
}

/* Walk the DOM replacement method */
function HumansNotBots_dom(element, disguisedForm) {
    if (element) {
	if (element.hasChildNodes()) {
	    var child = element.firstChild;
	    while (child) {
		HumansNotBots_dom(child, disguisedForm);
		child = child.nextSibling;
	    }
	}
	else if (element.nodeValue) {
	    var matchexp = new RegExp(disguisedForm, "g");
	    var disguisedEmailAddresses = element.nodeValue.match(matchexp);
	    if (disguisedEmailAddresses !== null) {
		var unprocessedText = element.nodeValue;
		var newParentsChildren = new Array();
		for (var i = 0; i < disguisedEmailAddresses.length; i++) {
		    var disguisedEmailAddress = disguisedEmailAddresses[i];

		    /* textBefore is the text in unprocessedText that comes before the first disguised email address in unprocessedText */ 
		    var textBefore = unprocessedText.substring(0,unprocessedText.search(new RegExp(disguisedEmailAddress)));
		    if (textBefore) {
			newParentsChildren.push(document.createTextNode(textBefore));
		    }
		    var matchexp1 = new RegExp(disguisedForm);
		    var realEmailAddress = disguisedEmailAddress.replace(matchexp1, '$1@$2.$3');
		    var a = document.createElement('a');
		    a.setAttribute('href', 'mailto:' + realEmailAddress);
		    a.appendChild(document.createTextNode(realEmailAddress));

		    newParentsChildren.push(a);
		    
		    unprocessedText = unprocessedText.substring(textBefore.length + disguisedEmailAddress.length);
		}
		
		if (unprocessedText) {
		    // there is some text after the last disguised email address
		    newParentsChildren.push(document.createTextNode(unprocessedText));
		}

		/* replace element with newParentsChildren */
		var parent = element.parentNode;
		var child = newParentsChildren.shift();
		while (child) {
		    parent.insertBefore(child, element);
		    child = newParentsChildren.shift();
		}
		parent.removeChild(element);
	    }
	}
    }
}

