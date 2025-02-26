/**
 * Reacho WooCommerce Started Checkout
 *
 * Incoming event object
 * @typedef {object} reachowc_checkout
 *   @property {string} email - Email of current logged in user
 *
 *   @property {object} event_data - Data for started checkout event
 *     @property {object} $extra - Event data
 *     @property {string} $service - Value will always be "woocommerce"
 *     @property {int} value - Total value of checkout event
 *     @property {array} Categories - Product categories (array of strings)
 *     @property {string} Currency - Currency type
 *     @property {string} CurrencySymbol - Currency type symbol
 *     @property {array} ItemNames - List of items in the cart
 *
 */


/**
 * Attach event listeners to save billing fields.
 */

var identify_object = {
  'company_id': public_key.token,
  'properties': {}
};

var reacho_cookie_id = '__reachowc_id';

function buildProfileRequestPayload(event_attributes) {
  return JSON.stringify({
    data: {
      type: "profile",
      attributes: event_attributes
    }
  })
}

function buildEventRequestPayload(customer_properties, event_properties, metric_attributes) {
  return JSON.stringify({
    data: {
      type: 'event',
      attributes: {
        properties: {
          ...event_properties,
        },
        metric: {
        data: {
          type: 'metric',
          attributes: {
            ...metric_attributes,
          }
        }
      },
      profile: {
        data: {
          type: 'profile',
          attributes: {
            ...customer_properties,
          }
        }
      }
      }
    }
  })
}

function makePublicAPIcall(endpoint, event_data) {
  var company_id = public_key.token;
  jQuery.ajax('https://a.reacho.com/' + endpoint + '?company_id=' + company_id, {
    type: "POST",
    contentType: "application/json",
    data: event_data,
    headers: {
      'revision': '2023-08-15',
      'X-Reacho-User-Agent': plugin_meta_data.data,
    }
  });
}

function getReachoCookie() {
  var name = reacho_cookie_id + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return atob(c.substring(name.length, c.length));
    }
  }
  return "";
}

function setReachoCookie(cookie_data) {
  cvalue = btoa(JSON.stringify(cookie_data));
  var date = new Date();
  date.setTime(date.getTime() + (63072e6)); // adding 2 years in milliseconds to current time
  var expires = "expires=" + date.toUTCString();
  document.cookie = reacho_cookie_id + "=" + cvalue + ";" + expires + "; path=/";
}

  /**
   * Queries the dom for first_name, last_name, and email inputs being displayed on the checkout page.
   * If both shipping and billing forms are present, both input nodes will be returned for the type (ie. first_name)
   * @return {object} an object of dom nodes (firstNameNode, lastNameNode, emailNode)
   */
function getTrackingNodes() {
  var emailNodes = jQuery('input[id*="email"]:visible, input[name*="email"]:visible');
  var firstNameNodes = jQuery('input[id*="first_name"]:visible, input[name*="first_name"]:visible');
  var lastNameNodes = jQuery('input[id*="last_name"]:visible, input[name*="last_name"]:visible');

  return { firstNameNodes, lastNameNodes, emailNodes};
}

/**
 * The event listener to be added to visible email, first_name, and last_name nodes.
 * It makes a call to client/profile with the values from the email field and either
 * the first_name or last_name value depending on the caller
 * @return {undefined}
 */
function identifyUser(nameType, self) {
  var { emailNodes } = getTrackingNodes();
  var email = emailNodes.val();
  var identify_properties = {
    [nameType]: jQuery.trim(jQuery(self).val())
  }
  if (email) {
    identify_properties["email"] = email;
    setReachoCookie(identify_properties);
    identify_object.properties = identify_properties;
    makePublicAPIcall('client/profiles/', buildProfileRequestPayload(identify_object));
  }
}

/**
 * Adds the event listeners for tracking on the first name and last name inputs.
 * If both the shipping and billing forms are visible, listeners will be added to all first name and last name nodes
 * @return {undefined}
 */
function reachowcIdentifyBillingField() {
  var { firstNameNodes, lastNameNodes } = getTrackingNodes();
  firstNameNodes.each(function(){
    var node = jQuery(this);
    node.change(() => identifyUser("first_name", node));
  });
  lastNameNodes.each(function(){
    var node = jQuery(this);
    node.change(() => identifyUser("last_name", node));
  });
}

window.addEventListener("load", function () {
  // Custom checkouts/payment platforms may still load this file but won't
  // fire woocommerce_after_checkout_form hook to load checkout data.
  if (typeof reachowc_checkout === 'undefined') {
    return;
  }

  var ReachoWC = ReachoWC || {};
  ReachoWC.trackStartedCheckout = function () {
    var metric_attributes = {
      'name': 'Started Checkout',
      'service': 'woocommerce'
    }
    var customer_properties = {}
    if (reachowc_checkout.email) {
      customer_properties['email'] = reachowc_checkout.email;
    } else if (reachowc_checkout.exchange_id) {
      customer_properties['_reachox'] = reachowc_checkout.exchange_id;
    } else {
      return;
    }

    makePublicAPIcall('client/events/', buildEventRequestPayload(customer_properties, reachowc_checkout.event_data, metric_attributes));
  };

  const reachowcCookie = getReachoCookie();

  // Priority of emails for syncing Started Checkout event: Logged-in user,
  // cookied exchange ID, cookied email, billing email address
  if (reachowc_checkout.email !== "") {
    identify_object.properties = {
      'email': reachowc_checkout.email
    };
    makePublicAPIcall('client/profiles/', buildProfileRequestPayload(identify_object));
    setReachoCookie(identify_object.properties);
    ReachoWC.trackStartedCheckout();
  } else if (reachowcCookie && JSON.parse(reachowcCookie).$exchange_id !== undefined) {
    reachowc_checkout.exchange_id = JSON.parse(reachowcCookie).$exchange_id;
    ReachoWC.trackStartedCheckout();
  } else if (reachowcCookie && JSON.parse(reachowcCookie).email !== undefined) {
    reachowc_checkout.email = JSON.parse(reachowcCookie).email;
    ReachoWC.trackStartedCheckout();
  } else {
    if (jQuery) {
      var { firstNameNodes, lastNameNodes, emailNodes } = getTrackingNodes();
      emailNodes.change(function () {
        var elem = jQuery(this),
          email = jQuery.trim(elem.val());

        if (email && /@/.test(email)) {
          var params = {
            "email": email
          };

          if (firstNameNodes.length > 0) {
            // Values come from first visible input node in the DOM
            params["first_name"] = firstNameNodes.val();
          }
          if (lastNameNodes.length > 0) {
            params["last_name"] = lastNameNodes.val();
          }

          setReachoCookie(params);
          reachowc_checkout.email = params.email;
          identify_object.properties = params;
          makePublicAPIcall('client/profiles/', buildProfileRequestPayload((identify_object)));
          ReachoWC.trackStartedCheckout();
        }
      });

      // Save billing fields
      reachowcIdentifyBillingField();
    }
  }
});
