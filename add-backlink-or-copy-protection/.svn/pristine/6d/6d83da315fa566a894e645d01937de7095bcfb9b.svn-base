document.addEventListener('copy', function (e) {
    var selection = window.getSelection().toString();
    if (selection) {
        var dotIndices = [];
        for (var i = 0; i < selection.length; i++) {
            if (selection[i] === '.') {
                dotIndices.push(i);
            }
        }

        var newSelection = selection;
        var siteLink = '<a href="' + window.location.href + '">.</a>';

        if (dotIndices.length === 1) {
            var singleDotIndex = dotIndices[0];
            newSelection = selection.substring(0, singleDotIndex) + siteLink + selection.substring(singleDotIndex + 1);
        } else if (dotIndices.length > 1) {
            var middleDotIndex = dotIndices[Math.floor(dotIndices.length / 2)];
            newSelection = selection.substring(0, middleDotIndex) + siteLink + selection.substring(middleDotIndex + 1);
        } else {
            newSelection = selection + ' ' + window.location.href;
        }

        e.clipboardData.setData('text/html', newSelection);
        e.clipboardData.setData('text/plain', newSelection);
        e.preventDefault();
    }
});