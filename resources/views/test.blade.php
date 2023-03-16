<x-app-layout>
 
　<body>
  　<!--<div id="map">Now Loading...</div>-->
  　 <div id="map" style="height:500px" class="w-960"> </div>
  　@include('map/yama')
  　
  
  　
  　<form id="address-form" action="" method="get" autocomplete="on">
    <p class="title">駐車場</p>
    <p class="note"><em>* = required field</em></p>
    <label class="full-field">
        <!-- Avoid the word "address" in id, name, or label text to avoid browser autofill from conflicting with Place Autocomplete. Star or comment bug https://crbug.com/587466 to request Chromium to honor autocomplete="off" attribute. -->
        <span class="form-label">Deliver to*</span>
        <input id="ship-address" name="ship-address" required autocomplete="off" />
    </label>
    <label class="full-field">
        <span class="form-label">Apartment, unit, suite, or floor #</span>
        <input id="address2" name="address2" />
    </label>
    <label class="full-field">
        <span class="form-label">City*</span>
        <input id="locality" name="locality" required />
    </label>
   
    <button type="button" class="my-button">Save address</button>
    <input type="reset" value="Clear form" />
</form>
<!-- Replace Powered By Google image src with self hosted image. https://developers.google.com/maps/documentation/places/web-service/policies#other_attribution_requirements -->

  　
  　
  　@include('map/autocomplete')
　　<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
　　<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDad24zpc64K8oLZQoO_cWKpeCSeHLGNwc&language=ja&region=JP&callback=initMap"></script>
　
　</body>
　
　
</x-app-layout>