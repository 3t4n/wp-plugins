function hideAndRemoveNode(node, afterRemoveCallback) {
	var $ = jQuery;

	var $node = $(node);

	var transitionEndEvents = [
		'transitionend',
		'webkitTransitionEnd',
		'oTransitionEnd',
		'otransitionend',
		'mozTransitionEnd'
	];

	var removeNode = function () {
		$node.remove();
		afterRemoveCallback();
	};

	transitionEndEvents.forEach(function (event) {
		$node.one(event, removeNode);
	});

	$node.css({
		'transition': 'opacity 0.5s',
		'opacity': '1',
	});

	$node[0].offsetHeight;

	setTimeout(function () {
		$node.css({
			'opacity': '0'
		});
	}, 10);
}

function populateTemplate(template, data) {
    const placeholderPattern = /%([^%]+)%/g;
    
    return template.replace(placeholderPattern, function(match, placeholder) {
        if (data.hasOwnProperty(placeholder)) {
            return data[placeholder];
        }
        return match;
    });
}
