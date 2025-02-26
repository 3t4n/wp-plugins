PHP wrapper for the FreeGeoIp Geolocation API
=======

Basic PHP wrapper for the [FreeGeoIp Geolocation API] (https://freegeoip.net/)


### Installation

Download and include in your project.
Not listed on Composer.

### Methods

#### Get GEO info by IP
Use `->fetch($ip)` to retrieve GEO information from specified IP.


### API usage limits
You're allowed up to 15,000 queries per hour by default. Once this limit is reached, all of your requests will result in HTTP 403, forbidden, until your quota is cleared. 

### Usage
```php
// json
$ipInfoJSON = new FreeGeoIp('json');
var_dump($ipInfoJSON->fetch('194.78.226.199'));

// xml
$ipInfoXML = new FreeGeoIp('xml');
var_dump($ipInfoXML->fetch('194.78.226.199'));

// csv
$ipInfoCSV = new FreeGeoIp('csv');
var_dump($ipInfoCSV->fetch('194.78.226.199'));
```

#### Formats supported
`json`
`xml`
`csv`