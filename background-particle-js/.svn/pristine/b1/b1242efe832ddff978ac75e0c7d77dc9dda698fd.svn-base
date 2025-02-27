jQuery(document).ready(function () {

  const particleDimentions = {

    particleContainerHeight: document.querySelector("#mh-particles-js").offsetHeight,
    particleContainerWidth: document.querySelector("#mh-particles-js").offsetWidth,
    contentHeight: document.querySelector(".mh-banner-info").offsetHeight,
    contentWidth: document.querySelector(".mh-banner-info").offsetWidth,
    centerDimention: function () {
      let contentHeightPosition = (this.particleContainerHeight - this.contentHeight) / 2;
      let contentWidthPosition = (this.particleContainerWidth - this.contentWidth) / 2;
      let contentPosition = `position: absolute; top: ${contentHeightPosition}px !important; left: ${contentWidthPosition}px !important; text-align: center; `;
      document.querySelector(".mh-banner-info").style.cssText = contentPosition;
    }
  }
  particleDimentions.centerDimention();

});