// ********************************************************************** //
// Review the README for more information on configuration settings.
// It's important that each value is surround by double quotes.
// To obtain an AirNow API Key, create an account here:
// https://docs.airnowapi.org/account/request/

// Information on the CORS proxy service and how to get a key can be found here:
// https://github.com/gridaco/base/issues/23

// If you decide to use another proxy, see aqi-widget-public - refreshAQI()
// for the request header. You will need to update this!

// None of this works without the AirNow API key and a CORS proxy service!
// ********************************************************************** //

let aqiLocalSettings = {
  key: "", // your AirNow API Key
  proxy_uri: "https://cors.bridged.cc/", //CORS proxy URL
  proxy_key: "", // your bridged.cc api key -
  zip: "", // the reporting zip code
  show_forecast: "1", // 0 for no - 1 for yes
  show_legend: "1", // 0 for no - 1 for yes
  theme: "light", // light or dark
  // **********************************************************************//
  // *********** DO NOT CHANGE ANYTHING BELOW THIS SECTION ****************//
  // *************** UNLESS YOU KNOW WHAT YOU'RE DOING ********************//
  // **********************************************************************//
  airnow_uri: "https://www.airnowapi.org/aq/forecast/zipCode/?format=application/json&",
  distance: "100", // the surrounding distance in miles from the zip code

  // Compact widget image paths
  aqi_compact_1: "aqi-widget/img/aqi_compact_1.png",
  aqi_compact_2: "aqi-widget/img/aqi_compact_2.png",
  aqi_compact_3: "aqi-widget/img/aqi_compact_3.png",
  aqi_compact_4: "aqi-widget/img/aqi_compact_4.png",
  aqi_compact_5: "aqi-widget/img/aqi_compact_5.png",
  // Full page widget image paths
  aqi_page_1: "aqi-widget/img/aqi_page_1.png",
  aqi_page_2: "aqi-widget/img/aqi_page_2.png",
  aqi_page_3: "aqi-widget/img/aqi_page_3.png",
  aqi_page_4: "aqi-widget/img/aqi_page_4.png",
  aqi_page_5: "aqi-widget/img/aqi_page_5.png",
};

// Display text for Action Day alerts
let actionDayAlert = `<div class="aqi-alert">An Air Quality Alert has been issued.
Children, older adults and people with asthma and other respiratory diseases should
avoid long periods of activity outdoors. Others can help reduce air
pollution by driving less, refueling only after sun down,
and not using gas-powered lawn equipment.</div><hr>`;
