tesel = function(evt) {
    try {
        if (window.getSelection)
            window.getSelection().removeAllRanges();
        else if (document.selection)
            document.selection.empty();
    } catch (e) {
    }
}
if(document.ondoubleclick) document.ondoubleclick = tesel;
if(document.body.style && document.body.style.MozUserSelect) document.body.style.MozUserSelect = "none";
if(document.body.onselectstart) document.body.onselectstart = function() { return false }