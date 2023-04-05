<!-- resources/views/tweet/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('山旅') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
            <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-grey-200 ">
                    <table class="text-center w-full border-collapse">
                        <thead>
                            <tr>
                                <th
                                    class="py-4 px-6 bg-gray-lightest font-bold uppercase text-lg text-gray-dark  border-b border-grey-light ">
                                    山旅一覧</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tweets as $tweet)
                            <tr class="hover:bg-gray-lighter">
                                <td class="py-4 px-6 border-b border-gray-light ">
                                    <a href="{{ route('tweet.show',$tweet->id) }}">
                                        <!-- 🔽 所属の人を追加 -->
                                        <div id="example"></div>
                                        <p class="text-left text-gray-800 ">{{$tweet->user->name}}</p>
                                        <h3 class="text-left font-bold text-lg text-gray-800 ">
                                            {{$tweet->tweet}}</h3>
                                    </a>
                                    <div class="flex">

                                        <!-- 条件分岐でログインしているユーザが投稿したtweetのみ編集ボタンと削除ボタンが表示される -->
                                       @if (Auth::check() && $tweet->user_id === Auth::user()->id)
                                        
                                        <!-- 更新ボタン -->
                                        <form action="{{ route('tweet.edit',$tweet->id) }}" method="GET"
                                            class="text-left">

                                            @csrf
                                            <button
                                                class="ml-3 rounded-md m-1 px-4 py-2 h-12 flex items-center justify-center">
                                                <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" stroke-width="1.5" width="39" height="39"
                                                    color="#292929">
                                                    <defs>
                                                        <style>
                                                            .cls-637b7f18f95e86b59c57a00f-1 {
                                                                fill: none;
                                                                stroke: currentColor;
                                                                stroke-miterlimit: 10;
                                                            }
                                                        </style>
                                                    </defs>
                                                    <path class="cls-637b7f18f95e86b59c57a00f-1"
                                                        d="M5.32,14.86,3.41,17.73,1.5,14.86V3.41A1.9,1.9,0,0,1,3.41,1.5h0A1.91,1.91,0,0,1,5.32,3.41Z">
                                                    </path>
                                                    <path class="cls-637b7f18f95e86b59c57a00f-1"
                                                        d="M20.59,22.5H8.18a1.92,1.92,0,0,1-1.91-1.91V18.68H18.68v1.91A1.92,1.92,0,0,0,20.59,22.5Z">
                                                    </path>
                                                    <path class="cls-637b7f18f95e86b59c57a00f-1"
                                                        d="M22.5,1.5V20.59a1.91,1.91,0,0,1-3.82,0V18.68H10.09V1.5Z">
                                                    </path>
                                                    <line class="cls-637b7f18f95e86b59c57a00f-1" x1="12.95" y1="6.27"
                                                        x2="19.64" y2="6.27"></line>
                                                    <line class="cls-637b7f18f95e86b59c57a00f-1" x1="12.95" y1="10.09"
                                                        x2="19.64" y2="10.09"></line>
                                                    <line class="cls-637b7f18f95e86b59c57a00f-1" x1="12.95" y1="13.91"
                                                        x2="19.64" y2="13.91"></line>
                                                </svg>
                                                <span class="text-lg font-medium text-gray-500 text-center">
                                            </button>
                                        </form>

                                        <!-- 削除ボタン -->
                                        <form action="{{ route('tweet.destroy',$tweet->id) }}" method="POST"
                                            class="text-left">
                                            @method('delete')
                                            @csrf
                                            <button
                                                class="ml-3 rounded-md m-1 px-4 py-2 h-12 flex items-center justify-center">
                                                <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" stroke-width="1.5" width="39" height="39"
                                                    color="#292929">
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
                                                    <line class="cls-6374f8d9b67f094e4896c66b-1" x1="2.45" y1="5.32"
                                                        x2="21.55" y2="5.32"></line>
                                                    <path class="cls-6374f8d9b67f094e4896c66b-1"
                                                        d="M10.09,1.5h3.82a1.91,1.91,0,0,1,1.91,1.91V5.32a0,0,0,0,1,0,0H8.18a0,0,0,0,1,0,0V3.41A1.91,1.91,0,0,1,10.09,1.5Z">
                                                    </path>
                                                    <line class="cls-6374f8d9b67f094e4896c66b-1" x1="12" y1="8.18"
                                                        x2="12" y2="19.64"></line>
                                                    <line class="cls-6374f8d9b67f094e4896c66b-1" x1="15.82" y1="8.18"
                                                        x2="15.82" y2="19.64"></line>
                                                    <line class="cls-6374f8d9b67f094e4896c66b-1" x1="8.18" y1="8.18"
                                                        x2="8.18" y2="19.64"></line>
                                                </svg>
                                                <span class="text-lg font-medium text-gray-500 text-center">
                                            </button>
                                        </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>