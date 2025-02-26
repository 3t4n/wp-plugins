$(document).ready(function() {

  var tbl = " ABCDEFGHIJKLMNOPQRSTUVWXYZ?,";

  function Letter(table, letter, duration) {
    this.table = table;
    this.letter = letter;
    this.current = 0;
    this.delay = duration / tbl.indexOf(letter); // ms
    this.time = Date.now();
    this.done = false;
  }

  Letter.prototype.update = function() {
	if (this.done) return;
    var time = Date.now();
    if (time - this.time >= this.delay) {
	  this.time = time;
      if (this.letter === this.table[this.current] || this.current === this.table.length) {
		this.done = true;
      } else {
        this.current++;
      }
    }
  };

  $(".ali").each(function() {

    // store reference to current `this` element
    var elem = $(this);
    var word = elem.html();
    console.log("Word: " + word);
    var letters = [];
    word.toUpperCase().split("").forEach(function(l) {
      letters.push(new Letter(tbl, l, 2500))
      console.log(l);
    });
	
    (function loop() {

      var txt = "",
        isDone = true;
      letters.forEach(function(l) {
        l.update();
        if (!l.done) isDone = false;
        txt += l.table[l.current];

      });

      // `elem` : `this` element at `.each()` iteration
      elem.html(txt);

      if (!isDone) requestAnimationFrame(loop);
      else { /* done */ }

    })();

  });

});
