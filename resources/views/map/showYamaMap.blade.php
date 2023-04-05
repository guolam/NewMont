  <script>
  // 同じマップに収まる実験
  
    function initMap() {
      const map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: 36.2048, lng: 138.2529 },
        zoom: 6,
      });

      const center = { lat: 36.2048, lng: 138.2529 };

      // Create a bounding box with sides ~10km away from the center point
      const defaultBounds = {
        north: center.lat + 0.1,
        south: center.lat - 0.1,
        east: center.lng + 0.1,
        west: center.lng - 0.1,
      };

      const inputParking = document.getElementById("parking");
      const inputFood = document.getElementById("food");
      const inputSpring = document.getElementById("spring");

      const options = {
        bounds: defaultBounds,
        componentRestrictions: { country: "jp" },
        fields: ["address_components", "geometry", "icon", "name"],
        strictBounds: false,
        types: ["establishment"],
      };

      const autocompleteParking = new google.maps.places.Autocomplete(inputParking, options);
      const autocompleteFood = new google.maps.places.Autocomplete(inputFood, options);
      const autocompleteSpring = new google.maps.places.Autocomplete(inputSpring, options);

      const infowindow = new google.maps.InfoWindow();
      const infowindowContent = document.getElementById("infowindow-content");
      infowindow.setContent(infowindowContent);

      const markerParking = new google.maps.Marker({
        map,
        anchorPoint: new google.maps.Point(0, -29),
      });

      const markerFood = new google.maps.Marker({
        map,
        anchorPoint: new google.maps.Point(0, -29),
      });

      const markerSpring = new google.maps.Marker({
        map,
        anchorPoint: new google.maps.Point(0, -29),
      });

      autocompleteParking.addListener("place_changed", () => {
        handlePlaceChanged(autocompleteParking, markerParking, infowindow, infowindowContent);
      });

      autocompleteFood.addListener("place_changed", () => {
        handlePlaceChanged(autocompleteFood, markerFood, infowindow, infowindowContent);
      });

        autocompleteSpring.addListener("place_changed", () => {
    handlePlaceChanged(autocompleteSpring, markerSpring, infowindow, infowindowContent);
  });

  function handlePlaceChanged(autocomplete, marker, infowindow, infowindowContent) {
    infowindow.close();
    marker.setVisible(false);

    const place = autocomplete.getPlace();

    if (!place.geometry || !place.geometry.location) {
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
      address = [        (place.address_components[0] && place.address_components[0].short_name) || "",
        (place.address_components[1] && place.address_components[1].short_name) || "",
        (place.address_components[2] && place.address_components[2].short_name) || "",
      ].join(" ");
    }

    infowindowContent.children["place-icon"].src = place.icon;
    infowindowContent.children["place-name"].textContent = place.name;
    infowindowContent.children["place-address"].textContent = address;
    infowindow.open(map, marker);
  }
}

window.initMap = initMap;

</script>
