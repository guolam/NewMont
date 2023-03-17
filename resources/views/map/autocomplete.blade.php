<script>

function initMap() {
  const map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: 36.2048, lng: 138.2529 },
    zoom:6,
  });
  
  const center = { lat: 36.2048, lng: 138.2529 };
  
  // Create a bounding box with sides ~10km away from the center point
  const defaultBounds = {
    north: center.lat + 0.1,
    south: center.lat - 0.1,
    east: center.lng + 0.1,
    west: center.lng - 0.1,
  };
  const input = document.getElementById("parking");
  
  const options = {
    bounds: defaultBounds,
    componentRestrictions: { country: "jp" },
    fields: ["address_components", "geometry", "icon", "name"],
    strictBounds: false,
    types: ["establishment"],
  };
  const autocomplete = new google.maps.places.Autocomplete(input, options);

  const infowindow = new google.maps.InfoWindow();
  const infowindowContent = document.getElementById("infowindow-content");

  infowindow.setContent(infowindowContent);

  const marker = new google.maps.Marker({
    map,
    anchorPoint: new google.maps.Point(0, -29),
  });


  autocomplete.addListener("place_changed", () => {
    infowindow.close();
    marker.setVisible(false);

    const place = autocomplete.getPlace();

    if (!place.geometry || !place.geometry.location) {
      // User entered the name of a Place that was not suggested and
      // pressed the Enter key, or the Place Details request failed.
      window.alert("No details available for input: '" + place.name + "'");
      return;
    }

    // If the place has a geometry, then present it on a map.
    if (place.geometry.viewport) {
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(17); // Why 17? Because it looks good.
    }

    marker.setPosition(place.geometry.location);
    marker.setVisible(true);

    let address = "";

    if (place.address_components) {
      address = [
        (place.address_components[0] &&
          place.address_components[0].short_name) ||
          "",
        (place.address_components[1] &&
          place.address_components[1].short_name) ||
          "",
        (place.address_components[2] &&
          place.address_components[2].short_name) ||
          "",
      ].join(" ");
    }

    infowindowContent.children["place-icon"].src = place.icon;
    infowindowContent.children["place-name"].textContent = place.name;
    infowindowContent.children["place-address"].textContent = address;
    infowindow.open(map, marker);
  });


  //food
  const mapFood = new google.maps.Map(document.getElementById("mapFood"), {
    center: { lat: 36.2048, lng: 138.2529 },
    zoom:6,
  });

  const centerFood = { lat: 36.2048, lng: 138.2529 };
  
  // Create a bounding box with sides ~10km away from the center point
  const defaultBoundsFood = {
    north: centerFood.lat + 0.1,
    south: centerFood.lat - 0.1,
    east: centerFood.lng + 0.1,
    west: centerFood.lng - 0.1,
  };
  const inputFood = document.getElementById("food");
  
  const optionsFood = {
    bounds: defaultBoundsFood,
    componentRestrictions: { country: "jp" },
    fields: ["address_components", "geometry", "icon", "name"],
    strictBounds: false,
    types: ["establishment"],
  };
  const autocompleteFood = new google.maps.places.Autocomplete(inputFood, optionsFood);


// 地図表示？
  const infowindowFood = new google.maps.InfoWindow();
  const infowindowContentFood = document.getElementById("infowindowFood-content");

  infowindowFood.setContent(infowindowContentFood);

  const markerFood = new google.maps.Marker({
    mapFood,
    anchorPoint: new google.maps.Point(0, -29),
  });
  
  
autocompleteFood.addListener("place_changed", () => {
  infowindowFood.close();
  markerFood.setVisible(false);

  const placeFood = autocompleteFood.getPlace();

  if (!placeFood.geometry || !placeFood.geometry.location) {
    // User entered the name of a Place that was not suggested and
    // pressed the Enter key, or the Place Details request failed.
    window.alert("No details available for input: '" + placeFood.name + "'");
    return;
  }

  // If the place has a geometry, then present it on a map.
  if (placeFood.geometry.viewport) {
    mapFood.fitBounds(placeFood.geometry.viewport);
  } else {
    mapFood.setCenter(placeFood.geometry.location);
    mapFood.setZoom(17); // Why 17? Because it looks good.
  }

  markerFood.setPosition(placeFood.geometry.location);
  markerFood.setVisible(true);

  let addressFood = "";

  if (placeFood.address_components) {
    addressFood = [      (placeFood.address_components[0] &&
        placeFood.address_components[0].short_name) ||
        "",
      (placeFood.address_components[1] &&
        placeFood.address_components[1].short_name) ||
        "",
      (placeFood.address_components[2] &&
        placeFood.address_components[2].short_name) ||
        "",
    ].join(" ");
  }

  infowindowContentFood.children["place-icon"].src = placeFood.icon;
  infowindowContentFood.children["place-name"].textContent = placeFood.name;
  infowindowContentFood.children["place-address"].textContent = addressFood;
  infowindowFood.open(mapFood, markerFood);
});


//Spring
  const mapSpring = new google.maps.Map(document.getElementById("mapSpring"), {
    center: { lat: 36.2048, lng: 138.2529 },
    zoom:6,
  });

  const centerSpring = { lat: 36.2048, lng: 138.2529 };
  
  // Create a bounding box with sides ~10km away from the center point
  const defaultBoundsSpring = {
    north: centerSpring.lat + 0.1,
    south: centerSpring.lat - 0.1,
    east: centerSpring.lng + 0.1,
    west: centerSpring.lng - 0.1,
  };
  const inputSpring = document.getElementById("spring");
  
  const optionsSpring = {
    bounds: defaultBoundsSpring,
    componentRestrictions: { country: "jp" },
    fields: ["address_components", "geometry", "icon", "name"],
    strictBounds: false,
    types: ["establishment"],
  };
  const autocompleteSpring = new google.maps.places.Autocomplete(inputSpring, optionsSpring);


// 地図表示？
  const infowindowSpring = new google.maps.InfoWindow();
  const infowindowContentSpring = document.getElementById("infowindowSpring-content");

  infowindowSpring.setContent(infowindowContentSpring);

  const markerSpring = new google.maps.Marker({
    mapSpring,
    anchorPoint: new google.maps.Point(0, -29),
  });
  
  
autocompleteSpring.addListener("place_changed", () => {
  infowindowSpring.close();
  markerSpring.setVisible(false);

  const placeSpring = autocompleteSpring.getPlace();

  if (!placeSpring.geometry || !placeSpring.geometry.location) {
    // User entered the name of a Place that was not suggested and
    // pressed the Enter key, or the Place Details request failed.
    window.alert("No details available for input: '" + placeSpring.name + "'");
    return;
  }

  // If the place has a geometry, then present it on a map.
  if (placeSpring.geometry.viewport) {
    mapSpring.fitBounds(placeSpring.geometry.viewport);
  } else {
    mapSpring.setCenter(placeSpring.geometry.location);
    mapSpring.setZoom(17); // Why 17? Because it looks good.
  }

  markerSpring.setPosition(placeSpring.geometry.location);
  markerSpring.setVisible(true);

  let addressSpring = "";

  if (placeSpring.address_components) {
    addressSpring = [      (placeSpring.address_components[0] &&
        placeSpring.address_components[0].short_name) ||
        "",
      (placeSpring.address_components[1] &&
        placeSpring.address_components[1].short_name) ||
        "",
      (placeSpring.address_components[2] &&
        placeSpring.address_components[2].short_name) ||
        "",
    ].join(" ");
  }

  infowindowContentSpring.children["place-icon"].src = placeSpring.icon;
  infowindowContentSpring.children["place-name"].textContent = placeSpring.name;
  infowindowContentSpring.children["place-address"].textContent = addressSpring;
  infowindowSpring.open(mapSpring, markerSpring);
});



}

window.initMap = initMap;

</script>
 