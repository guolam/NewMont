<script>

function initMap() {
 
  var target = document.getElementById('map'); //マップを表示する要素を指定
  var targetFood = document.getElementById('mapFood'); 
  var targetSpring = document.getElementById('mapSpring'); 
  
  var address = '{{$tweet->parking}}'; //input//住所を指定
  var addressFood = '{{$tweet->food}}';
  var addressSpring = '{{$tweet->spring}}';
  
  var geocoder = new google.maps.Geocoder();  
  var geocoderFood = new google.maps.Geocoder();  
  var geocoderSpring = new google.maps.Geocoder();  

  geocoder.geocode({ address: address }, function(results, status){
    if (status === 'OK' && results[0]){

      console.log(results[0].geometry.location);

       var map = new google.maps.Map(target, {  
         center: results[0].geometry.location,
         zoom: 18
       });

       var marker = new google.maps.Marker({
         position: results[0].geometry.location,
         map: map,
         animation: google.maps.Animation.DROP
       });

    }else{ 
      //住所が存在しない場合の処理
      alert('住所が正しくないか存在しません。');
      target.style.display='none';
    }
  });
  
   geocoderFood.geocode({ address: addressFood }, function(results, status){
    if (status === 'OK' && results[0]){

      console.log(results[0].geometry.location);

       var mapFood = new google.maps.Map(targetFood, {  
         center: results[0].geometry.location,
         zoom: 18
       });

       var markerFood = new google.maps.Marker({
         position: results[0].geometry.location,
         mapFood: mapFood,
         animation: google.maps.Animation.DROP
       });

    }else{ 
      //住所が存在しない場合の処理
      alert('住所が正しくないか存在しません。');
      target.style.display='none';
    }
  });
  
  geocoderSpring.geocode({ address: addressSpring }, function(results, status){
    if (status === 'OK' && results[0]){

      console.log(results[0].geometry.location);

       var mapSpring = new google.maps.Map(targetSpring, {  
         center: results[0].geometry.location,
         zoom: 18
       });

       var markerSpring = new google.maps.Marker({
         position: results[0].geometry.location,
         mapSpring: mapSpring,
         animation: google.maps.Animation.DROP
       });

    }else{ 
      //住所が存在しない場合の処理
      alert('住所が正しくないか存在しません。');
      target.style.display='none';
    }
  });
}
</script>