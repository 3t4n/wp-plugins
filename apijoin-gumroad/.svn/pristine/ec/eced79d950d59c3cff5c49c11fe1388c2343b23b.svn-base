let apijoinGumroadOverlay = function(){
 
  // CREATE SCRIPT
  const docHeader = document.getElementsByTagName("head")[0];
  

  let apijoinGumroadOverlay = document.createElement('script');

  apijoinGumroadOverlay.setAttribute("src", 'https://gumroad.com/js/gumroad.js');
  apijoinGumroadOverlay.setAttribute("type", 'text/javascript');

  docHeader.appendChild(apijoinGumroadOverlay);
}
window.apijoinGumroadOverlay = apijoinGumroadOverlay;
window.apijoinGumroadOverlay();



function apijoinGumroadEmbedHeight(t){
  console.log("hola");
  if (t.data) try {
    e = JSON.parse(t.data)
    console.log(e);
    if ("GumroadEmbedMessage" === e.type) {
      let elementId = e.args.id;
      let elementHeight = e.args.height;
      document.querySelector('#gumroad-embed-iframe-'+elementId.toLowerCase()).height = elementHeight;
    }
  } catch (r) {}
}

window.addEventListener("message", apijoinGumroadEmbedHeight, !1)