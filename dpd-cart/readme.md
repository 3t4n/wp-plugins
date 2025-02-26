# DPD Cart Plugin

##Getting started
1. Install and Activate the Plugin in your WordPress site.
2. On WordPress Dashboard Go to Settings > DPD Cart Plugin.
3. Enter DPD username and API Key.
4. Save Changes.
5. Now, select the store you want to use and other preferences.
6. Save Changes.
7. Now Create Pages.

### Creating  store page
1. On WordPress Dashboard go to Pages > Add New
2. Use shortcode that meets your requirements.
    * Grid Layout - [dpdcart-store layout="grid"]
    * List Layout - [dpdcart-store layout="list"]
### Creating Product Page
1. On WordPress Dashboard go to Pages > Add New
2. Use shortcode-  [dpdcart-product-page]
3. On WordPress Dashboard Go to Settings > DPD Cart Plugin.
4. Select newly created page as product page.
5. Save Changes.

## Make Button
### Making Button Manually
1. Use shortcode [dpdcart id='xxxxxxx']
    * id (required) - product id
    * text (optional) - Text on Button (Default- Settings for button text on store page.)
    * size (optional) - 'small', 'medium' or, 'large' (Default- Settings for button size on store page.)
    * color (optional) - HexColor eg. #000000  (Default- Settings for button color on store page.)
    * hover_color (optional) - HexColor eg. #000000  (Default- Settings for button hover color on store page.)
    * text_color (optional) - HexColor eg. #000000  (Default- Settings for button text color on store page.)
    * lightbox (optional) - 1 or 0  (Default- Settings for use lightbox?.)
    * price_position (optional) - 'none','top','left','right'  (Default- Settings for store page price position.)
    * price_color (optional) - HexColor eg. #000000  (Default- Settings for store page price color.)
    * price_bg_color (optional) - HexColor eg. #000000  (Default- Settings for store page price background color.)
    
### Use Gutenberg (Default WordPress v5+ Editor)
 After you complete step 1-7 of getting started section you should see a new DPD button block type on editor with title 'DPD Button'. Select the DPD Button type, choose your product, edit your button text, and set the button alignment to insert in to pages and posts.
 
