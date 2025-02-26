var pluginBaseUrl = pluginData.baseUrl;
window.addEventListener("load", function () {
  var arviewz3dModel = document.getElementById("arviewz-3d-model");
  if (arviewz3dModel) {
    var olElement = document.querySelector(
      "ol.flex-control-nav.flex-control-thumbs"
    );
    if (olElement && olElement.children.length > 0) {
      var firstLi = olElement.children[0];
      var img = firstLi.querySelector("img");
      img.src = pluginBaseUrl+"assets/images/arviewz-new-logo.png";
    }
  }
});
