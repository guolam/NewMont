<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Peak Experiences, Everyday Journeys 山旅を日常に') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-grey-200">
                    <div class="flex flex-col mb-4">
                        <div class="flex items-center justify-end mt-4">
                            <x-href-button class="ml-3" :href="route('tweet.create')"
                                :active="request()->routeIs('tweet.create')">
                                {{ __('新規作成') }}
                            </x-href-button>
                        </div>
                    </div>
                    <table class="text-center w-full border-collapse">
                        <thead>
                            <tr>
                                <th
                                    class="py-4 px-6 bg-gray-lightest font-bold uppercase text-lg text-gray-dark border-b border-grey-light">
                                    ソロ旅</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tweets as $tweet)
                            <tr class="hover:bg-gray-lighter">
                                <td class="py-4 px-6 border-b border-gray-light">
                                    <a href="{{ route('tweet.show',$tweet->id) }}">
                                        <!-- 🔽 所属の人を追加 -->
                                        <div id="example"></div>
                                        <div class="flex justify-between">
                                            <div style="padding-top: 0.1em; padding-bottom: 0.1rem"
                                                class="text-sm px-3 bg-teal-300 text-teal-800 rounded-full">
                                                <p class="text-left text-gray-800">{{$tweet->perfecture}}</p>
                                            </div>
                                            <p class="text-left text-gray-800">{{$tweet->user->name}}</p>
                                        </div>
                                        <h3 class="mt-2 text-left font-bold text-lg text-gray-800">{{$tweet->tweet}}</h3>
                                        <img src="{{ asset('storage/image/'.$tweet->image)}}" 
                                        class="mt-8 mb-8 mx-auto" style="height:300px; object-fit: cover; display:block" />
                                        </a>
                                    
                                    <div class="flex">
                                        <!-- 条件分岐でログインしているユーザが投稿したtweetのみ編集ボタンと削除ボタンが表示される -->

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