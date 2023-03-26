<!--groupcontent/show.blade.php-->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('グループで行った山旅') }}
        </h2>
    </x-slot>
    
<body>
@foreach ($group_contents as $group_content)
    <h3>{{ $group_content->tweet }}</h3>



  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-800">
          <div class="mb-6">
            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-gray-800 dark:text-gray-200">日付</p>
              <p class="py-2 px-3 text-gray-800 dark:text-gray-200" id="date">
                {{$group_content->date}}
              </p>
            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-gray-800 dark:text-gray-200">名山</p>
              <p class="py-2 px-3 text-gray-800 dark:text-gray-200" id="mont">
                {{$group_content->mont}}
            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-gray-800 dark:text-gray-200">道都府県</p>
              <p class="py-2 px-3 text-gray-800 dark:text-gray-200" id="perfecture">
                {{$group_content->perfecture}}
              </p>
            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-gray-800 dark:text-gray-200">山</p>
              <p class="py-2 px-3 text-gray-800 dark:text-gray-200" id="tweet">
                {{$group_content->tweet}}
              </p>
            </div>
            @include('map/contentYama')
            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-gray-800 dark:text-gray-200">駐車場</p>
              <p class="py-2 px-3 text-gray-800 dark:text-gray-200" id="parking">
                {{$group_content->parking}}
              </p>
              
              <!--ここに入れたい、駐車場の地図-->
            </div>
            <div id="map" style="height:500px" class="w-960"> </div>
            
            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-gray-800 dark:text-gray-200">温泉</p>
              <p class="py-2 px-3 text-gray-800 dark:text-gray-200" id="spring">
                {{$group_content->spring}}
              </p>
            </div>  
            <div id="mapSpring" style="height:500px" class="w-960"> </div>
            
            
            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-gray-800 dark:text-gray-200">ごはん</p>
              <p class="py-2 px-3 text-gray-800 dark:text-gray-200" id="food">
                {{$group_content->food}}
              </p>
            </div>  
            <div id="mapFood" style="height:500px" class="w-960"> </div>
            
            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-gray-800 dark:text-gray-200">所感</p>
              <p class="py-2 px-3 text-gray-800 dark:text-gray-200" id="description">
                {{$group_content->description}}
              </p>
              <img src="{{ asset('storage/image/'.$group_content->image)}}"　class="mx-auto" style="height:300px;">
            </div>
            <div class="flex items-center justify-end mt-4">
            <a href="{{ url()->previous() }}">
              <x-secondary-button class="ml-3">
                {{ __('戻る') }}
              </x-primary-button>
            </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script async defer src=
"https://maps.googleapis.com/maps/api/js?
key=AIzaSyDad24zpc64K8oLZQoO_cWKpeCSeHLGNwc&
language=ja&region=JP&callback=initMap"></script>
</body>
@endforeach

  </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

