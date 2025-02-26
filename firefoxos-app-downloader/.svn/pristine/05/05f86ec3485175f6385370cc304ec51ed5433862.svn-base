var installButton = document.getElementById("ffapp-dl-btn");

installButton.addEventListener("click", function() {
    var manifestUrl = installButton.getAttribute("data-ffapp-dllink");
    var request = window.navigator.mozApps.install(manifestUrl);
    request.onsuccess = function () {
      var appRecord = this.result;
      alert('Installed!');
    };
    request.onerror = function () {
      alert('ERROR:' + this.error.name);
    };
});