### WP ABL PLugin

#### Installation using git clone

* Download or clone this repo
* Copy the folder into your Wordpress plugins folder. Make sure rename the folder to: wp-abl-plugin (lowercase)
* Activate the plugin in your Wordpress Plugins page
* After successful activatiion you will see the link in the menu bar (http://imgur.com/DDAAjFC)

#### Installation using wordpress plugin admin

##### Automatic
* Log into your WordPress admin
* Click Plugins
* Click Add New
* Search for Agenda by Adventure Bucket List
* Click Install Now under “Agenda by Adventure Bucket List”
* Activate the plugin

##### Manually
* Download the plugin
* Extract the contents of the zip file
* Upload the contents of the zip file to the wp-content/plugins/ folder of your WordPress installation
* Activate the Agenda by Adventure Bucket List plugin from ‘Plugins’ page.


#### Setup

* Add your Merchant ID to the input box
* Add custom CSS to style buttons & other elements
* Add shortcodes with Activity IDs to pages + posts

#### Adding shortcodes

There are 4 types of shortcodes you can add

"Book now" Button:
```javascript
[abl-button label="Book Now" activity="57336b293e6f0f447119987d" event="asdafasd_20170131012313" style="prettyButton"]
```

Redirect Link:
```js
[abl-redirect label="See this activity…" activity="57336b293e6f0f447119987d" event="asdafasd_20170131012313"]
```

Widget:
```js
[abl-widget merchant="tLVVsHUlBAweKP2ZOofhRBCFFP54hX9CfmQ9EsDlyLfN6DYHY5k8VzpuiUxjNO5L"]
```

Embeddable Calendar:
```js
[abl-calendar merchant="tLVVsHUlBAweKP2ZOofhRBCFFP54hX9CfmQ9EsDlyLfN6DYHY5k8VzpuiUxjNO5L" type="embedded" height="1200px" width="100%" id="f1"]
```
