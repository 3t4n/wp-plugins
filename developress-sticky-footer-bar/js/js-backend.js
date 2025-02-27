
    function openTab(evt, tabName) {
      evt.preventDefault();

      // Nasconde tutti i contenuti delle tab
      var tabContent = document.getElementsByClassName("tab-content");
      for (var i = 0; i < tabContent.length; i++) {
        tabContent[i].style.display = "none";
      }

      // Rimuove la classe "active" da tutti i link delle tab
      var tabLabels = document.getElementsByClassName("tab-label");
      for (var i = 0; i < tabLabels.length; i++) {
        tabLabels[i].className = tabLabels[i].className.replace(" active", "");
      }

      // Mostra il contenuto della tab selezionata e aggiunge la classe "active" al link della tab corrispondente
      document.getElementById(tabName).style.display = "block";
      evt.currentTarget.className += " active";
    }
