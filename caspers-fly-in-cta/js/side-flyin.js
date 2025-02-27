const slideWindow = () => {  
  const $flyin = document.querySelector('.cpcta-flyin');
  const $topbar = $flyin.querySelector('.cpcta-top-bar');
  const isOpen = $flyin.classList.contains('slidOut');
  const isMobile = window.innerWidth < 480;

  if(isOpen) {
    /**
     * When you close the Flyin, reset the text back to its original value
     */
    $flyin.classList.remove('slidOut');
    if(!isMobile) $topbar.innerText = $topbar.dataset.text;
  } else {
    /**
     * When you open the Flyin, switch the topbar text to 'Close'
     */
    $flyin.classList.add('slidOut');
    if(!isMobile) $topbar.innerText = 'Close';
  }
}

document.addEventListener('DOMContentLoaded', () => {   
  /**
   * Once the content finishes loading, attach the following event listeners.
   * 1. When a user clicks on the tab (i.e. top-bar), reveal/hide the content window.
   * 2. When a user clicks on the "close" button, hide the content window
   */ 
  
  // auto-pop out cta window
  const autopopTime = document.querySelector('.cpcta-flyin').dataset.autopopTimer;
  let autopopCountdown;
  if(autopopTime) {
    autopopCountdown = setTimeout(slideWindow, parseInt(autopopTime));
  }

  document.querySelector('.cpcta-top-bar').addEventListener('click', () => {
    slideWindow();
    if(autopopCountdown) clearTimeout(autopopCountdown);
  });
  document.querySelector('.cpcta-close').addEventListener('click', slideWindow);

  // compensate for logged in admin bar
  const $wpadminbar = document.querySelector('#wpadminbar');
  if($wpadminbar) {
    const offset = $wpadminbar.offsetHeight;
    const newHeight = window.innerHeight - offset;
    document.querySelector('.cpcta-content-panel').style.marginTop = `${offset}px`;
    document.querySelector('.cpcta-content-panel').style.height = `${newHeight}px`;
  }
})