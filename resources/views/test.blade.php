<x-app-layout>
 
　<body>
  　<!--<div id="map">Now Loading...</div>-->
  　 <div id="map" style="height:500px" class="w-960"> </div>
  　@include('map/yama')
  　<input></input>
  　
  　<form id="address-form" action="" method="get" autocomplete="off">
    <p class="title">駐車場</p>
    <p class="note"><em>* = required field</em></p>
    <label class="full-field">
   
   
    <button type="button" class="my-button">保存</button>
    <input type="reset" value="Clear form" />
</form>

  　
  　
  　@include('map/autocomplete')
　　<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
　　<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDad24zpc64K8oLZQoO_cWKpeCSeHLGNwc&language=ja&region=JP&callback=initMap"></script>
　
　</body>
　
　
</x-app-layout>