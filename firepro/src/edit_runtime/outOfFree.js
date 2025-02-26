  //<beginFold> outOfFree
  FM.outOfFree = function(updateFunction, packageName, packageLocation){
    let backDrop = document.createElement("div");
    backDrop.classList.add("FP_outOfFree_BackDrop");

    let container = document.createElement("div");
    container.classList.add("FP_outOfFree");
    backDrop.appendChild(container);

    let refreshIcon = document.createElement("div");
    refreshIcon.classList.add("FP_closeOutOfFree");
    refreshIcon.innerHTML = '<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M2 12C2 16.97 6.03 21 11 21C13.39 21 15.68 20.06 17.4 18.4L15.9 16.9C14.63 18.25 12.86 19 11 19C4.76 19 1.64 11.46 6.05 7.05C10.46 2.64 18 5.77 18 12H15L19 16H19.1L23 12H20C20 7.03 15.97 3 11 3C6.03 3 2 7.03 2 12Z" /></svg>';
    refreshIcon.onclick = function(){
      FM.closeEditor(backDrop);
    }
    container.appendChild(refreshIcon);

    let alertIcon = document.createElement("div");
    alertIcon.classList.add("FP_outOfFree_Icon");
    alertIcon.innerHTML = '<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M11,15H13V17H11V15M11,7H13V13H11V7M12,2C6.47,2 2,6.5 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20Z" /></svg>';
    container.appendChild(alertIcon);

    let errorMssgContainer = document.createElement("div");
    errorMssgContainer.classList.add("FP_outOfFree_MessageContainer");
    container.appendChild(errorMssgContainer);

    let errorMssg = document.createElement("div");
    errorMssg.classList.add("FP_outOfFree_Message");
    errorMssg.innerHTML = "The <span><a href='https://firepro.io/package_editor/build.php?packageName="+encodeURIComponent(packageName)+"' target='_blank'>" + packageName + "</a></span> effect you want to use is only available for Pro users.";
    errorMssgContainer.appendChild(errorMssg);

    let buttonContainer = document.createElement("div");
    buttonContainer.classList.add("FP_outOfFree_ButtonContainer");
    container.appendChild(buttonContainer);

    let button1 = document.createElement("div");
    button1.classList.add("FP_outOfFree_Button");
    button1.classList.add("--sad");
    button1.innerHTML = "<div>Remove "+packageName+"</div>";
    let clickTrack = false;
    button1.onclick = function(){
      if(clickTrack == false){
        FM.removeAnimation(packageName, updateFunction, packageLocation, backDrop);
      }
      clickTrack = true;
    }
    buttonContainer.appendChild(button1);

    let button2 = document.createElement("div");
    button2.classList.add("FP_outOfFree_Button");
    button2.classList.add("--happy");
    button2.innerHTML = "<a target='blank' href='https://firepro.io/go-pro' style='width: 100%;'><div>Upgrade To Pro</div></a>";
    buttonContainer.appendChild(button2);

    document.body.appendChild(backDrop);
  }
  //</endFold>

  //<beginFold> removeAnimation
  FM.removeAnimation = function(animationName, updateFunction, packageLocation, backdrop){
    packageLocation.package.package = null;
    FM[updateFunction]().then(function(){
      FM.closeEditor(backdrop);
    });
  }
  //</endFold>
