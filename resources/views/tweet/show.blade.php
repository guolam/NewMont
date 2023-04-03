<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('山旅詳細') }}
        </h2>
    </x-slot>

    <body>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 border-b border-gray-200">
                        <div class="mb-6">
                            <div class="flex flex-col mb-4">
                                <p class="mb-2 uppercase font-bold text-lg text-gray-800">日付</p>
                                <p class="py-2 px-3 text-gray-800" id="date">
                                    {{$tweet->date}}
                                </p>
                                <div class="flex flex-col mb-4">
                                    <p class="mb-2 uppercase font-bold text-lg text-gray-800">名山</p>
                                    <p class="py-2 px-3 text-gray-800" id="mont">
                                        {{$tweet->mont}}
                                    <div class="flex flex-col mb-4">
                                        <p class="mb-2 uppercase font-bold text-lg text-gray-800">道都府県</p>
                                        <p class="py-2 px-3 text-gray-800" id="perfecture">
                                            {{$tweet->perfecture}}
                                        </p>
                                        <div class="flex flex-col mb-4">
                                            <p class="mb-2 uppercase font-bold text-lg text-gray-800">山</p>
                                            <p class="py-2 px-3 text-gray-800" id="tweet">
                                                {{$tweet->tweet}}
                                            </p>
                                        </div>
                                        @include('map/showYama')
                                        <div class="flex flex-col mb-4">
                                            <p class="mb-2 uppercase font-bold text-lg text-gray-800">駐車場</p>
                                            <p class="py-2 px-3 text-gray-800" id="parking">
                                                {{$tweet->parking}}
                                            </p>
                                         
                                            <!--ここに入れたい、駐車場の地図-->
                                        </div>
                                        <div id="map" style="height:500px" class="w-960"> </div>

                                        <div class="flex flex-col mb-4">
                                            <p class="mb-2 uppercase font-bold text-lg text-gray-800">温泉</p>
                                            <p class="py-2 px-3 text-gray-800" id="spring">
                                                @if($tweet->spring)
                                                    {{$tweet->spring}}
                                                 @else
                                                <p>なし</p>
                                                @endif
                                            </p>
                                        </div>
                                         @if($tweet->spring)
                                        <div id="mapSpring" style="height:500px" class="w-960"> </div>
                                        @endif

                                        <div class="flex flex-col mb-4">
                                            <p class="mb-2 uppercase font-bold text-lg text-gray-800">ごはん</p>
                                            <p class="py-2 px-3 text-gray-800" id="food">
                                                @if($tweet->food)
                                                     {{$tweet->food}}
                                                @else
                                                <p>なし</p>
                                                @endif
                                            </p>
                                        </div>
                                        @if($tweet->food)
                                        <div id="mapFood" style="height:500px" class="w-960"> </div>
                                        @endif

                                        <div class="flex flex-col mb-4">
                                            <p class="mb-2 uppercase font-bold text-lg text-gray-800 ">
                                                山への感想
                                            </p>
                                            <p class="py-2 px-3 text-gray-800 " id="description">
                                                {{$tweet->description}}
                                            </p>
                                           
                                             <x-modal-image src="{{ asset('storage/image/'.$tweet->image)}}" alt="image" class="mt-24 mx-auto" style="height:300px; object-fit: cover; display:block"/>
                                
                                   
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
                    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDad24zpc64K8oLZQoO_cWKpeCSeHLGNwc&language=ja&region=JP&callback=initMap"></script>
                </div>
            </div>
        </div>
    </body>
</x-app-layout>