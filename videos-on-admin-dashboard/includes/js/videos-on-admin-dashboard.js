  //On ready page

  var coll = document.getElementsByClassName("voad-collapsible1");
  var i;
  window.onload = function() {
      for (i = 0; i < coll.length; i++) {    
      coll[i].addEventListener("click", function() {
        coll[i].classList.toggle("voad-active1");
      this.classList.toggle("voad-active1");
      var content = this.nextElementSibling;
      if (content.style.display === "block") {
        content.style.display = "none";
      } else {
        content.style.display = "block";
      }
    });
  }
  };