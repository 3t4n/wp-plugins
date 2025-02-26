/**
 * Admin Sticky Notes
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @author Farhan Girach <farhangirach@hotmail.com>
 * @copyright Copyright (c) 2017, Farhan Girach
**/
var dom = "<div id='controls'><ul id='notes'></ul></div>";
document.write(dom);
var notes, count = 0;
// save the notes into local storage
function saveNotes() {
 
//jQuery( "#notes li" ).draggable();
    var notesArray = [];
    // for each of the notes add a bespoke note object to the array
    notes.find("li > div").each(function (i, e) {
        // save the class attribute of the div, as well as the text for the title and content text areas
        var colourClass = jQuery(e).attr("class");
        var title = jQuery(e).find("textarea.note-title");
        var content = jQuery(e).find("textarea.note-content");

        notesArray.push({ Index: i, Title: title.val(), Content: content.val(), Class: colourClass });
    });
    // json encode it
    var jsonStr = JSON.stringify(notesArray);
    // and save the json string into local storage
    localStorage.setItem("notes", jsonStr);
}
// add event handlers to a note
function addNoteEvent(noteElement) {
    var div = noteElement.children("div");
    var closeImg = div.find("span");
    div.focus(function () {
        closeImg.removeClass("hide");
    });
    div.children().focus(function () {
        closeImg.removeClass("hide");
    });
    div.hover(function () {
        closeImg.removeClass("hide");
    }, function () {
        closeImg.addClass("hide");
        saveNotes();
    });
    div.children().hover(function () {
        closeImg.removeClass("hide");
    }, function () {
        closeImg.addClass("hide");
    });
}		
//  adds a new note to the 'notes' list
function addNewNote(className, title, content) {
	// if class is not specified, use a random colour class
	if (!className) {
		className = "colour" + Math.ceil(Math.random() * 6);
	}		



	// add a new note to the end of the list
	notes.append("<li class='ui-widget-content'><div class='" + className + "'>" + 
					"<textarea class='note-title' placeholder='Heading' maxlength='20'/>" + 
					"<textarea class='note-content' placeholder='Your Note'/>" + 
					"<span class='hide'>X</span>" + 
					"</div></li>");		
	// get the new note that's just been added and attach the click event handler to its close button
	var newNote = notes.find("li:last");
	newNote.find("span").click(function () {
        // remove the note and save
	    newNote.remove();
	    saveNotes();
	});		
	// hook up event handlers to show/hide close button as appropriate
	addNoteEvent(newNote);			
	// if a title is provided then set the title of the new note
	if (title) {
		// get the title textarea element and set its value
		newNote.find("textarea.note-title").val(title);
    }
	// if a content is provided then set the content of the new note
	if (content) {
		// get the content textarea element and set its value
		newNote.find("textarea.note-content").val(content);
    }
    // save
    saveNotes();
}
// load the notes saved in the local storage
function loadNotes() {
    var storedNotes = localStorage.getItem("notes");
    if (storedNotes) {
        // passes the stored json back into an array of note objects
        var notesArray = JSON.parse(storedNotes);
        count = notesArray.length;
        var i;
        for (i = 0; i < count; i++) {
            var storedNote = notesArray[i];
            addNewNote(storedNote.Class, storedNote.Title, storedNote.Content);
        }
    }
}
jQuery(document).ready(function () {
    // get references to the 'notes' list
    notes = jQuery("#notes");
    // load notes from local storage if one's available
    loadNotes();
    // clicking the 'New Note' button adds a new note to the list
    jQuery("#toplevel_page_asn_but a").click(function () {
        addNewNote();
    });
    // add a note to the list if there aren't any
    /*if (count === 0) {
        jQuery("#btnNew").click();
    }*/
	
	// target elements with the "draggable" class
interact('.ui-widget-content')
 .draggable({
   // enable inertial throwing
   inertia: true,
   // keep the element within the area of it's parent
  /* restrict: {
     restriction: "parent",
     endOnly: true,
     elementRect: { top: 0, left: 0, bottom: 1, right: 1 }
   },*/
   // enable autoScroll
   autoScroll: true,

   // call this function on every dragmove event
   onmove: dragMoveListener,
   // call this function on every dragend event
   onend: function (event) {
     var textEl = event.target.querySelector('p');

     textEl && (textEl.textContent =
       'moved a distance of '
       + (Math.sqrt(Math.pow(event.pageX - event.x0, 2) +
                    Math.pow(event.pageY - event.y0, 2) | 0))
           .toFixed(2) + 'px');
   }
 });

 function dragMoveListener (event) {
   var target = event.target,
       // keep the dragged position in the data-x/data-y attributes
       x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx,
       y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy;

   // translate the element
   target.style.webkitTransform =
   target.style.transform =
     'translate(' + x + 'px, ' + y + 'px)';

   // update the posiion attributes
   target.setAttribute('data-x', x);
   target.setAttribute('data-y', y);
 }

 // this is used later in the resizing and gesture demos
 window.dragMoveListener = dragMoveListener;

	jQuery("#toplevel_page_asn_but a").removeAttr("href");
});
