<html>
  <head>
    <title>Place Autocomplete Address Form</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link
      href="https://fonts.googleapis.com/css?family=Roboto:400,500"
      rel="stylesheet"
    />

    <link rel="stylesheet" type="text/css" href="./style.css" />
    <script type="module" src="./index.js"></script>
  </head>
  <body>
    @include('map/autocomplete')
    <!-- Note: The address components in this sample are based on North American address format. You might need to adjust them for the locations relevant to your app. For more information, see
https://developers.google.com/maps/documentation/javascript/examples/places-autocomplete-addressform
    -->

    <form id="address-form" action="" method="get" autocomplete="on">
      <p class="title"> </p>
    
      <label class="full-field">
        <!-- Avoid the word "address" in id, name, or label text to avoid browser autofill from conflicting with Place Autocomplete. Star or comment bug https://crbug.com/587466 to request Chromium to honor autocomplete="off" attribute. -->
        <span class="form-label">駐車場場所</span>
        <input
          id="ship-address"
          name="ship-address"
          required
          autocomplete="on"
        />
      </label>
    
      </label>
      <button type="button" class="my-button">保存</button>

      <!-- Reset button provided for development testing convenience.
  Not recommended for user-facing forms due to risk of mis-click when aiming for Submit button. -->
      <input type="reset" value="クリア" />
    </form>
    <!-- Replace Powered By Google image src with self hosted image. https://developers.google.com/maps/documentation/places/web-service/policies#other_attribution_requirements -->
    

    <!-- 
      The `defer` attribute causes the callback to execute after the full HTML
      document has been parsed. For non-blocking uses, avoiding race conditions,
      and consistent behavior across browsers, consider loading using Promises
      with https://www.npmjs.com/package/@googlemaps/js-api-loader.
      -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDad24zpc64K8oLZQoO_cWKpeCSeHLGNwc&callback=initAutocomplete&region=JP&language=ja&libraries=places&v=weekly"
      defer
    ></script>
    
  </body>
</html>