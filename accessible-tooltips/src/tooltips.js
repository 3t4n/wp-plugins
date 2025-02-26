import tippy from 'tippy.js';
import 'tippy.js/dist/tippy.css'; // optional for styling
import 'tooltips.css'
import 'tippy.js/themes/light.css';
import 'tippy.js/themes/light-border.css';
import 'tippy.js/themes/material.css';
import 'tippy.js/themes/translucent.css';

let tippy_options_backend = JSON.parse(tippy_vars);

let tippy_options =
{
  theme: tippy_options_backend['theme'] === 'default' ? null : tippy_options_backend['theme'],
	interactive: true,
 	interactiveBorder: tippy_options_backend['interactiveBorder'],
 	placement: tippy_options_backend['placement'],
  modifiers: [
    {
	     name: 'flip',
       options: {
         fallbackPlacements: tippy_options_backend['fallbackPlacements']
       }
     }
  ],
  allowHTML: tippy_options_backend['allowHTML'],
  hideOnClick: tippy_options_backend['hideOnClick'],
  aria: {
    content: 'describedby',
    expanded: 'auto',
  }
};

tippy('[data-tippy-content]', tippy_options);
