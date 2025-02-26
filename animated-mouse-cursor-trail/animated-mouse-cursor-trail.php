<?php
/*
Plugin Name: Animated Mouse Cursor Trail
Plugin URI: https://store.devilhunter.net/wordpress-plugin/mousetrail/
Description: Only Plugin activation is enough! No need to use any short-code or to edit settings.
Version: 2.0
Author: Tawhidur Rahman Dear
Author URI: https://www.tawhidurrahmandear.com
Requires at least: 5.5
Requires PHP: 7.4
License: GPLv2 or later
Text Domain: animated-mouse-cursor-trail
 */


// Prevent direct file access
if ( ! defined ( 'ABSPATH' ) ) {
	exit;
}

// Add custom links to the plugin's action links
function animatedmousecursortrail_by_tawhidurrahmandear_add_plugin_links($plugin_meta, $plugin_file) {
    if ($plugin_file === plugin_basename(__FILE__)) {
        $new_links = array(
            '<a href="https://store.devilhunter.net/wordpress-plugin/mousetrail/" target="_blank">Introduction to Plugin with Documentation</a>',
			'<a href="https://dearstore.gumroad.com/l/kite" target="_blank">Buy Pro Version</a>',
			'<a href="https://www.youtube.com/watch?v=b5PyYTsFncU" target="_blank">Video Preview of Pro Version</a>',
            '<a href="https://wordpress.org/plugins/animated-mouse-cursor-trail#reviews" target="_blank">Rate and Review at WordPress.org</a>',
            '<a href="https://itsolution.devilhunter.net" target="_blank">Hire for WordPress Web Development</a>',
        );

        // Add the new links to the existing array of links
        $plugin_meta = array_merge($plugin_meta, $new_links);
    }
    return $plugin_meta;
}
add_filter('plugin_row_meta', 'animatedmousecursortrail_by_tawhidurrahmandear_add_plugin_links', 10, 2);

function animatedmousecursortrail_by_tawhidurrahmandear_add_script_to_head() {
    ?>
<script>
(() => {
  const colours = [
  '#f00', '#f06', '#f0f', '#f6f', '#f39', '#f9c', // Reds and pinks
  '#ff4500', '#ffa500', '#ff8c00', '#ffd700', // Oranges and yellows
  '#32cd32', '#00ff00', '#7fff00', '#adff2f', // Greens
  '#00ffff', '#1e90ff', '#4682b4', '#5f9ea0', // Blues
  '#9370db', '#8a2be2', '#9400d3', '#ff1493', // Purples and magentas
  '#000000', '#808080', '#c0c0c0', '#ffffff'  // Neutral colors
];
 // Animated Mouse Cursor Trail colors
  const minSize = 10; // Minimum size of animatedmousecursortrails in pixels
  const maxSize = 20; // Maximum size of animatedmousecursortrails in pixels
  const maxanimatedmousecursortrails = 20; // Maximum number of animatedmousecursortrails on screen
  const zIndex = "under"; // "over" for on top, "under" for behind other objects

  let animatedmousecursortrails = [];
  let animatedmousecursortrailPositions = [];
  let animatedmousecursortrailSizes = [];
  let animatedmousecursortrailStates = [];
  let mouseX = 500;
  let mouseY = 200;
  let viewportWidth = window.innerWidth;
  let viewportHeight = window.innerHeight;
  let scrollLeft = 0;
  let scrollTop = 0;
  let flying = false;

  // Initialize Animated Mouse Cursor Trail
  document.addEventListener("DOMContentLoaded", initialize);

  function initialize() {
    for (let i = 0; i < maxanimatedmousecursortrails; i++) {
      const animatedmousecursortrail = createanimatedmousecursortrailElement(colours[i % colours.length]);
      document.body.appendChild(animatedmousecursortrail);
      animatedmousecursortrails.push(animatedmousecursortrail);
      animatedmousecursortrailPositions.push({ x: 0, y: 0 });
      animatedmousecursortrailSizes.push(minSize);
      animatedmousecursortrailStates.push(false);
    }

    updateViewport();
    updateScrollPosition();
    animateanimatedmousecursortrails();

    document.addEventListener("mousemove", updateMousePosition);
    document.addEventListener("mousedown", startFly);
    document.addEventListener("mouseup", stopFly);
    window.addEventListener("resize", updateViewport);
    window.addEventListener("scroll", updateScrollPosition);
  }

  function createanimatedmousecursortrailElement(color) {
    const animatedmousecursortrail = document.createElement("div");
    animatedmousecursortrail.style.position = "absolute";
    animatedmousecursortrail.style.height = "auto";
    animatedmousecursortrail.style.width = "auto";
    animatedmousecursortrail.style.overflow = "hidden";
    animatedmousecursortrail.style.backgroundColor = "transparent";
    animatedmousecursortrail.style.visibility = "hidden";
    animatedmousecursortrail.style.zIndex = zIndex === "over" ? "1001" : "0";
    animatedmousecursortrail.style.color = color;
    animatedmousecursortrail.style.pointerEvents = "none";
    animatedmousecursortrail.style.opacity = 0.75;
	animatedmousecursortrail.style.fontFamily = `"Apple Color Emoji", "Segoe UI Emoji", "Noto Color Emoji", sans-serif`;
	animatedmousecursortrail.innerHTML = 
  '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="15" height="15" ' +
  'style="fill:' + color + '; transform: scale(1.1);">' +
  '<path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>' +
  '</svg>';
    return animatedmousecursortrail;
  }

  function updateMousePosition(event) {
    mouseX = event.pageX;
    mouseY = event.pageY;
  }

  function startFly() {
    flying = setInterval(() => (mouseX = mouseY = -1), 100);
  }

  function stopFly() {
    clearInterval(flying);
  }

  function animateanimatedmousecursortrails() {
    for (let i = 0; i < maxanimatedmousecursortrails; i++) {
      if (!animatedmousecursortrailStates[i]) {
        animatedmousecursortrails[i].style.left = `${(animatedmousecursortrailPositions[i].x = mouseX - minSize / 2)}px`;
        animatedmousecursortrails[i].style.top = `${(animatedmousecursortrailPositions[i].y = mouseY - minSize)}px`;
        animatedmousecursortrails[i].style.fontSize = `${animatedmousecursortrailSizes[i]}px`;
        animatedmousecursortrails[i].style.visibility = "visible";
        animatedmousecursortrailSizes[i] = minSize;
        animatedmousecursortrailStates[i] = true;
        break;
      }
    }

    for (let i = 0; i < maxanimatedmousecursortrails; i++) {
      if (animatedmousecursortrailStates[i]) updateanimatedmousecursortrail(i);
    }

    requestAnimationFrame(animateanimatedmousecursortrails);
  }

  function updateanimatedmousecursortrail(index) {
    animatedmousecursortrailPositions[index].y -= animatedmousecursortrailSizes[index] / minSize + index % 2;
    animatedmousecursortrailPositions[index].x += (index % 5 - 2) / 5;

    if (
      animatedmousecursortrailPositions[index].y < scrollTop - animatedmousecursortrailSizes[index] ||
      animatedmousecursortrailPositions[index].x < scrollLeft - animatedmousecursortrailSizes[index] ||
      animatedmousecursortrailPositions[index].x > scrollLeft + viewportWidth - animatedmousecursortrailSizes[index]
    ) {
      resetanimatedmousecursortrail(index);
    } else {
      growanimatedmousecursortrail(index);
      updateanimatedmousecursortrailStyle(index);
    }
  }

  function growanimatedmousecursortrail(index) {
    if (
      Math.random() < maxSize / animatedmousecursortrailPositions[index].y &&
      animatedmousecursortrailSizes[index] < maxSize
    ) {
      animatedmousecursortrailSizes[index]++;
    }
  }

  function updateanimatedmousecursortrailStyle(index) {
    animatedmousecursortrails[index].style.top = `${animatedmousecursortrailPositions[index].y}px`;
    animatedmousecursortrails[index].style.left = `${animatedmousecursortrailPositions[index].x}px`;
    animatedmousecursortrails[index].style.fontSize = `${animatedmousecursortrailSizes[index]}px`;
  }

  function resetanimatedmousecursortrail(index) {
    animatedmousecursortrails[index].style.visibility = "hidden";
    animatedmousecursortrailStates[index] = false;
  }

  function updateViewport() {
    viewportWidth = window.innerWidth;
    viewportHeight = window.innerHeight;
  }

  function updateScrollPosition() {
    scrollLeft = window.pageXOffset || document.documentElement.scrollLeft;
    scrollTop = window.pageYOffset || document.documentElement.scrollTop;
  }
})();
</script>
<?php
}
add_action('wp_head', 'animatedmousecursortrail_by_tawhidurrahmandear_add_script_to_head');