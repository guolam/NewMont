<script>
function initMap() {
  // フードピン用のアイコン画像のURL
  var foodIcon = "{{ asset('image/ricemark.png') }}";

  // スプリングピン用のアイコン画像のURL
  var springIcon = "{{ asset('image/springicon.png') }}";

  var target = document.getElementById("map"); //マップを表示する要素を指定

  var address = "{{ $group_content->parking ?? '' }}"; //input//住所を指定
  var addressFood = "{{ $group_content->food ?? '' }}";
  var addressSpring = "{{ $group_content->spring ?? '' }}";

  var geocoder = new google.maps.Geocoder();

  geocoder.geocode({ address: address }, function (results, status) {
    if (status === "OK" && results[0]) {
      console.log(results[0].geometry.location);

      var map = new google.maps.Map(target, {
        center: results[0].geometry.location,
        zoom: 8,
      });

      // マーカーを追加
      var marker = new google.maps.Marker({
        position: results[0].geometry.location,
        map: map,
        icon: "{{ asset('image/parkingmark.png') }}",
        animation: google.maps.Animation.DROP,
      });

      // フードピンの場合は、アイコンを設定
      if (addressFood) {
        geocoder.geocode({ address: addressFood }, function (results, status) {
          if (status === "OK" && results[0]) {
            console.log(results[0].geometry.location);

            var markerFood = new google.maps.Marker({
              position: results[0].geometry.location,
              map: map,
              icon: foodIcon,
              animation: google.maps.Animation.DROP,
            });
          } else {
            alert("住所が正しくないか存在しません。");
          }
        });
      }

      // スプリングピンの場合は、アイコンを設定
      if (addressSpring) {
        geocoder.geocode({ address: addressSpring }, function (results, status) {
          if (status === "OK" && results[0]) {
            console.log(results[0].geometry.location);

            var markerSpring = new google.maps.Marker({
              position: results[0].geometry.location,
              map: map,
              icon: springIcon,
              animation: google.maps.Animation.DROP,
            });
          } else {
            alert("住所が正しくないか存在しません。");
          }
        });
      }
    } else {
      alert("住所が正しくないか存在しません。");
      target.style.display = "none";
    }
  });
}
</script>
