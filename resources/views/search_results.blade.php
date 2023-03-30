<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('山旅詳細') }}
        </h2>
    </x-slot>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="results-container">

                <h1 class="text-2xl font-bold mb-2">検索結果</h1>

                <h2 class="text-xl font-bold mb-2">Tweets</h2>
                <ul>
                    @foreach ($tweets->where('is_public', 1) as $tweet)
                    <li class="mb-2">
                        <a href="{{ route('tweet.showopen', $tweet->id) }}" class="text-blue-600 hover:underline">{{
                            $tweet->tweet }}</a>
                    </li>
                    @endforeach
                </ul>

                <h2 class="text-xl font-bold mb-2 mt-8">Group Contents</h2>
                <ul>
                    @foreach ($groupContents->where('is_public', 1) as $groupContent)
                    <li class="mb-2">
                        <a href="{{ route('groupcontent.showdetail', $groupContent->id) }}"
                            class="text-blue-600 hover:underline">{{ $groupContent->tweet }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>