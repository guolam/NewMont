<!-- resources/views/tweet/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('山旅') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-grey-200 dark:border-gray-800">
                    <table class="text-center w-full border-collapse">
                        <thead>
                            <tr>
                                <th
                                    class="py-4 px-6 bg-gray-lightest dark:bg-gray-darkest font-bold uppercase text-lg text-gray-dark dark:text-gray-200 border-b border-grey-light dark:border-grey-dark">
                                    マイページ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($tweets) > 0)
                                @foreach ($tweets as $tweet)
                                <tr class="hover:bg-gray-lighter">
                                    <td class="py-4 px-6 border-b border-gray-light dark:border-gray-600">
                                        <a href="{{ route('tweet.show',$tweet->id) }}">
                                            <!-- 🔽 所属の人を追加 -->
                                            <div id="example"></div>
                                            <p class="text-left text-gray-800 dark:text-gray-200">{{$tweet->user->name}}</p>
                                            <h3 class="mt-2 text-left font-bold text-lg text-gray-800">{{$tweet->tweet}}</h3>
                                        <img src="{{ asset('storage/image/'.$tweet->image)}}" 
                                        class="mt-8 mb-8 mx-auto" style="height:300px; object-fit: cover; display:block" />
                                        </a>
                                        <div class="flex">
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                           <td class="py-4 px-6 border-b border-gray-light dark:border-gray-600">
                            <p class="text-left text-gray-800 dark:text-gray-200">投稿がありません</p>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
