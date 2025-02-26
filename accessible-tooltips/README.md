# Accessible Tooltips for WordPress
***Made by Quentin BETTOUM <quentin@toiledemaitre.fr> from <https://toiledemaitre.fr>***

***Gitlab repository <https://gitlab.com/quentin-bettoum/wp-accessible-tooltips>

An extension to make accessible tooltips easily using the awesome TippyJS library (https://atomiks.github.io/tippyjs/).

Once the plugin is installed, you should have a new "Tooltip" menu in your backoffice from where you can create tooltips content and adjust settings.
Then, on your content (page, post, etc.), you should have a new button in the text editor to append a tooltip shortcode. Select a word, press the button, and the shortcode should enclose the word you want to put your tooltip on.
The word must be the same as the title you put on the tooltip setting, if it's the case you should now have a tooltip on your frontend page.

You can also just use the shortcode manually [accessible-tooltip]YourTooltipWord[/accessible-tooltip]

Works in Gutenberg and classic editor.

Install dependencies
```bash
npm install && npm run packages-update
```

**npm watch** and **start** need to be reworked in one webpack config. For now the easiest way to update the JavaScript is to run the **build** command
```bash
npm run build
```
