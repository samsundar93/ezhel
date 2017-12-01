
// This example displays an address form, using the autocomplete feature
// of the Google Places API to help users fill in the information.
var placeSearch, autocomplete,autocomplete1;
var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};

function initialize() {
  // Create the autocomplete object, restricting the search
  autocomplete1 = new google.maps.places.Autocomplete(
  /** @type {HTMLInputElement} */ (document.getElementById('location')),
  { types: ['geocode'],componentRestrictions: {country: "SA"} });
  google.maps.event.addListener(autocomplete1, 'place_changed', function() {
    fillInAddress1();
  });
  
  var myElem = document.getElementById('service_area');
  if (myElem != null)
  {
    autocomplete = new google.maps.places.Autocomplete(
          /** @type {HTMLInputElement} */(document.getElementById('service_area')),
          { types: ['geocode'],componentRestrictions: {country: "SA"} });
      // When the user selects an address from the dropdown,
      // populate the address fields in the form.
      google.maps.event.addListener(autocomplete, 'place_changed', function() {
        fillInAddress();
      });
  }  
}

// The START and END in square brackets define a snippet for our documentation:
// [START region_fillform]
function fillInAddress() {
  // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();

  
  // Get each component of the address from the place details
  // and fill the corresponding field on the form.
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
      //document.getElementById(addressType).value = val;
    }
  }
}
// [END region_fillform]

// The START and END in square brackets define a snippet for our documentation:
// [START region_fillform]
function fillInAddress1() {
  // Get the place details from the autocomplete object.
  var place = autocomplete1.getPlace();  
  
  // Get each component of the address from the place details
  // and fill the corresponding field on the form.
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
      //document.getElementById(addressType).value = val;
    }
  }
}

// [START region_geolocation]
// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = new google.maps.LatLng(
          position.coords.latitude, position.coords.longitude);
      autocomplete.setBounds(new google.maps.LatLngBounds(geolocation,
          geolocation));
    });
  }
}

$(document).ready(function(){ 
	initialize();
	});