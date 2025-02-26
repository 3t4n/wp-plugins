function loadSVG(id, url, vivusArray) {
    fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text();
        })
        .then(svgContent => {
            // Create a container for the SVG content
            let container = document.createElement('div');
            container.innerHTML = svgContent;
            
            // Get the SVG element
            let svgElement = container.querySelector('svg');
            svgElement.setAttribute('id', id);

            // Replace the img with the SVG element
            document.getElementById(id).replaceWith(svgElement);

            // Create a new Vivus animation
            let vivus = new Vivus(id, { type: 'oneByOne', duration: 100, start: 'manual' });
            vivusArray.push(vivus);
        })
        .catch(error => {
            console.error('Error fetching the SVG:', error);
        });
}


// Initialize Vivus animations array
let vivusAnimations = [];

// Automatically find all img elements with IDs and load the SVGs
document.querySelectorAll('.svg-block img').forEach(img => {
    let id = img.id;
    let src = img.src;
    loadSVG(id, src, vivusAnimations);
});

// Options for the IntersectionObserver
let observerOptions = {
    root: null, // Use the viewport as the root
    rootMargin: '0px', // No margin around the root
    threshold: 0.5 // Trigger when 50% of the element is visible
};

// Create a new IntersectionObserver instance
let observer = new IntersectionObserver((entries, observer) => {
    // Loop through each entry (observed element)
    entries.forEach(entry => {
        // Check if the element is intersecting the viewport
        if (entry.isIntersecting) {
            // Find the corresponding Vivus animation
            let animation = vivusAnimations.find(anim => anim.el.id === entry.target.id);
            if (animation) {
                // Reset and play the animation
                animation.reset().play();
            }
        }
    });
}, observerOptions);

// Observe each SVG element for visibility in the viewport
window.addEventListener('load', () => {
    document.querySelectorAll('.svg-block svg').forEach(svg => {
        observer.observe(svg);
    });
});

// Add an event listener to reset and replay animations when scrolling back to the top
window.addEventListener('scroll', function() {
    if (window.scrollY === 0) {
        // Reset and replay all animations if scrolled to the top
        vivusAnimations.forEach(function(animation) {
            animation.reset().play();
        });
    }
});

// Function to add unique prefix to SVG elements
function addUniquePrefix(svgElement, prefix) {
    // Prefix IDs
    svgElement.querySelectorAll('[id]').forEach(el => {
        el.setAttribute('id', prefix + el.getAttribute('id'));
    });

    // Prefix class names
    svgElement.querySelectorAll('[class]').forEach(el => {
        el.setAttribute('class', el.getAttribute('class').split(' ').map(cls => prefix + cls).join(' '));
    });

    // Prefix styles in <style> blocks
    svgElement.querySelectorAll('style').forEach(style => {
        style.textContent = style.textContent.replace(/\.([a-zA-Z0-9_-]+)/g, `.${prefix}$1`);
    });

    // Update references to IDs within the SVG
    svgElement.querySelectorAll('[href], [xlink\\:href]').forEach(el => {
        const href = el.getAttribute('href') || el.getAttribute('xlink:href');
        if (href && href.startsWith('#')) {
            el.setAttribute('href', '#' + prefix + href.slice(1));
            el.setAttribute('xlink:href', '#' + prefix + href.slice(1));
        }
    });

    svgElement.querySelectorAll('use').forEach(el => {
        const href = el.getAttribute('href') || el.getAttribute('xlink:href');
        if (href && href.startsWith('#')) {
            el.setAttribute('href', '#' + prefix + href.slice(1));
            el.setAttribute('xlink:href', '#' + prefix + href.slice(1));
        }
    });
}

// Example usage to add prefixes to existing SVGs in the document
window.addEventListener('load', () => {
    document.querySelectorAll('svg').forEach((svg, index) => {
        const prefix = `svg${index}_`;
        addUniquePrefix(svg, prefix);
    });
});
