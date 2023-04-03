<!--showdetail.blade.php-->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('山旅') }}
        </h2>
    </x-slot>


    <body>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
                <div class="bg-white bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white  border-b border-gray-200 ">
                        <div class="mb-6">
                            <div class="flex flex-col mb-4">
                                <p class="mb-2 uppercase font-bold text-lg text-gray-800 ">日付</p>
                                <p class="py-2 px-3 text-gray-800 " id="date">
                                    {{$group_content->date}}

                                </p>
                            </div> <!-- Add closing div tag -->
                            <div class="flex flex-col mb-4">
                                <p class="mb-2 uppercase font-bold text-lg text-gray-800 ">名山</p>
                                <p class="py-2 px-3 text-gray-800 " id="mont">
                                    {{$group_content->mont}}
                                </p>
                            </div> <!-- Add closing div tag -->
                            <div class="flex flex-col mb-4">
                                <p class="mb-2 uppercase font-bold text-lg text-gray-800 ">道都府県</p>
                                <p class="py-2 px-3 text-gray-800 " id="perfecture">
                               
                                    {{$group_content->perfecture}}
                                </p>
                            </div> <!-- Add closing div tag -->
                            <div class="flex flex-col mb-4">
                                <p class="mb-2 uppercase font-bold text-lg text-gray-800 ">山</p>
                                <p class="py-2 px-3 text-gray-800 " id="tweet">
                                    {{$group_content->tweet}}
                                </p>
                            </div>
                            @include('map/contentYama')
                            <div class="flex flex-col mb-4">
                                <p class="mb-2 uppercase font-bold text-lg text-gray-800 ">駐車場</p>
                                <p class="py-2 px-3 text-gray-800 " id="parking">
                                    {{$group_content->parking}}
                                </p>
                            </div> 

                            <!--駐車場の地図-->
                            <div id="map" style="height:500px" class="w-960"></div>

                            <div class="flex flex-col mb-4">
                                <p class="mb-2 uppercase font-bold text-lg text-gray-800 ">温泉</p>
                                <p class="py-2 px-3 text-gray-800 " id="spring">
                                    @if($group_content->spring)
                                   {{$group_content->spring}}
                                     @else
                                    <p>なし</p>
                                     @endif
                                    
                                </p>
                            </div> 
                            <!--温泉地図-->
                             @if($group_content->spring)
                            <div id="mapSpring" style="height:500px" class="w-960"></div>
                             @endif

                            <div class="flex flex-col mb-4">
                                <p class="mb-2 uppercase font-bold text-lg text-gray-800 ">ごはん</p>
                                <p class="py-2 px-3 text-gray-800 " id="food">
                                    @if($group_content->food)
                                    {{$group_content->food}}
                                     @else
                                    <p>なし</p>
                                     @endif
                                </p>
                            </div>
                             @if($group_content->food)
                            <div id="mapFood" style="height:500px" class="w-960"></div>
                            @endif

                            <div class="flex flex-col mb-4">
                                <p class="mb-2 uppercase font-bold text-lg text-gray-800 ">旅の感想</p>
                                <p class="py-2 px-3 text-gray-800" id="description">
                                    {{$group_content->description}}
                                </p>
                                <x-modal-image src="{{ asset('storage/image/'.$group_content->image)}}" alt="image" class="mt-24 mx-auto" style="height:300px; object-fit: cover; display:block"/>
                                
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
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDad24zpc64K8oLZQoO_cWKpeCSeHLGNwc&language=ja&region=JP&callback=initMap"></script>
</x-app-layout>