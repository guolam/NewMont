<!--showdetail.blade.php-->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('山旅詳細') }}
        </h2>
    </x-slot>


    <body>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
                <div class="bg-white bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white  border-b border-gray-200 ">
                        <div class="mb-6">
                             @if (Auth::check() && ($group_content->user_id === Auth::user()->id))
                            <!-- 更新ボタン -->
                            <div class="flex justify-end">
                                <form action="{{ route('groupcontent.edit',$group_content->id) }}" method="GET"
                                    class="text-left">
                                    @csrf
                                    <button type="submit"
                                        class="flex bg-green-500 text-white px-4 py-2 rounded ml-2 mr-4">
                                        更新
                                        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24" stroke-width="1.5" width="24" height="24"
                                            color="#ffffff">
                                            <defs>
                                                <style>
                                                    .cls-637b7b44f95e86b59c579f7b-1 {
                                                        fill: none;
                                                        stroke: currentColor;
                                                        stroke-miterlimit: 10;
                                                    }
                                                </style>
                                            </defs>
                                            <path class="cls-637b7b44f95e86b59c579f7b-1"
                                                d="M1.5,18.68H8.18A3.82,3.82,0,0,1,12,22.5v0a0,0,0,0,1,0,0H1.5a0,0,0,0,1,0,0V18.68A0,0,0,0,1,1.5,18.68Z">
                                            </path>
                                            <path class="cls-637b7b44f95e86b59c579f7b-1"
                                                d="M15.82,18.68H22.5a0,0,0,0,1,0,0V22.5a0,0,0,0,1,0,0H12a0,0,0,0,1,0,0v0A3.82,3.82,0,0,1,15.82,18.68Z">
                                            </path>
                                            <path class="cls-637b7b44f95e86b59c579f7b-1"
                                                d="M1.5,6.27H8.18A3.82,3.82,0,0,1,12,10.09V22.5a0,0,0,0,1,0,0H1.5a0,0,0,0,1,0,0V6.27A0,0,0,0,1,1.5,6.27Z">
                                            </path>
                                            <path class="cls-637b7b44f95e86b59c579f7b-1"
                                                d="M19.64,6.27H22.5V22.5H12V10.09a3.82,3.82,0,0,1,3.82-3.82"></path>
                                            <path class="cls-637b7b44f95e86b59c579f7b-1"
                                                d="M19.64,13l-1.91,1.91L15.82,13V3.41A1.9,1.9,0,0,1,17.73,1.5h0a1.91,1.91,0,0,1,1.91,1.91Z">
                                            </path>
                                        </svg>
                                    </button>
                                </form>

                                <!-- 削除ボタン -->

                                <form action="{{ route('groupcontent.destroy',$group_content->id) }}" method="POST"
                                    class="text-left onsubmit=" return confirm('削除しますか？'); id="deleteForm">
                                    @method('delete')
                                    @csrf

                                    <button type="submit"
                                        class="flex bg-green-500 text-white px-4 py-2 rounded ml-2 mr-4">
                                        削除
                                        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24" stroke-width="1.5" width="24" height="24"
                                            color="#ffffff">
                                            <defs>
                                                <style>
                                                    .cls-6374f8d9b67f094e4896c66b-1 {
                                                        fill: none;
                                                        stroke: currentColor;
                                                        stroke-miterlimit: 10;
                                                    }
                                                </style>
                                            </defs>
                                            <path class="cls-6374f8d9b67f094e4896c66b-1"
                                                d="M16.88,22.5H7.12a1.9,1.9,0,0,1-1.9-1.8L4.36,5.32H19.64L18.78,20.7A1.9,1.9,0,0,1,16.88,22.5Z">
                                            </path>
                                            <line class="cls-6374f8d9b67f094e4896c66b-1" x1="2.45" y1="5.32" x2="21.55"
                                                y2="5.32"></line>
                                            <path class="cls-6374f8d9b67f094e4896c66b-1"
                                                d="M10.09,1.5h3.82a1.91,1.91,0,0,1,1.91,1.91V5.32a0,0,0,0,1,0,0H8.18a0,0,0,0,1,0,0V3.41A1.91,1.91,0,0,1,10.09,1.5Z">
                                            </path>
                                            <line class="cls-6374f8d9b67f094e4896c66b-1" x1="12" y1="8.18" x2="12"
                                                y2="19.64"></line>
                                            <line class="cls-6374f8d9b67f094e4896c66b-1" x1="15.82" y1="8.18" x2="15.82"
                                                y2="19.64"></line>
                                            <line class="cls-6374f8d9b67f094e4896c66b-1" x1="8.18" y1="8.18" x2="8.18"
                                                y2="19.64"></line>
                                        </svg>
                                    </button>
                                </form>
                                @endif
                            </div>
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
                            <!--<div id="map" style="height:500px" class="w-960"></div>-->

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
                          

                            <div class="flex flex-col mb-4">
                                <p class="mb-2 uppercase font-bold text-lg text-gray-800 ">ごはん</p>
                                <p class="py-2 px-3 text-gray-800 " id="food">
                                    @if($group_content->food)
                                    {{$group_content->food}}
                                    @else
                                <p>なし</p>
                                @endif
                                </p>
                            
                            
                             @include('map/showYamaMap')
                            <div id="map"></div>

                            <div class="flex flex-col mb-4">
                                <p class="mb-2 uppercase font-bold text-lg text-gray-800 ">旅の感想</p>
                                <p class="py-2 px-3 text-gray-800" id="description">
                                    {{$group_content->description}}
                                </p>
                                <x-modal-image src="{{ asset('storage/image/'.$group_content->image)}}" alt="image"
                                    class="mt-24 mx-auto" style="height:300px; object-fit: cover; display:block" />

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
    <script>
        document.querySelector('#deleteForm button[type="submit"]').addEventListener('click', function (event) {
            if (!confirm('削除してもよろしいですか？')) {
                event.preventDefault();
            }
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDad24zpc64K8oLZQoO_cWKpeCSeHLGNwc&language=ja&region=JP&callback=initMap"></script>
</x-app-layout>