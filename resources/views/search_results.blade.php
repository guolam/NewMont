<!--show search.result.detail'-->
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

    <div class="min-h-screen bg-gray-100 ">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="results-container">

                <h1 class="text-2xl font-bold mb-2">検索結果</h1>
                
                <h2 class="text-xl font-bold mb-2">ソロ旅</h2>
                <ul>
                    @foreach ($tweets->where('is_public', 1) as $tweet)
                    <li class="mb-2">
                        <a href="{{ route('tweet.showopen', $tweet->id) }}" class="text-blue-600 hover:underline">{{
                            $tweet->tweet }}</a>
                    </li>
                    @endforeach
                </ul>

                <h2 class="text-xl font-bold mb-2 mt-8">グループ旅</h2>
                <ul>
                    @foreach ($groupContents->where('is_public', 1) as $groupContent)
                    <li class="mb-2">
                        <a href="{{ route('groupcontent.showdetail', $groupContent->id) }}"
                            class="text-blue-600 hover:underline">{{ $groupContent->tweet }}</a>
                    </li>
                    @endforeach
                </ul>
                @if ($tweets->where('is_public', 1)->isEmpty() && $groupContents->where('is_public', 1)->isEmpty())
                    <p class="mt-8">まだ山旅が登録されておりません。ぜひ、あなたの山を登録してください。</p>
                @endif
                <h1 class="mt-8 text-2xl flex font-bold mb-2"><svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" width="24" height="24" color="#000000"><defs><style>.cls-63ce7444ea57ea6c838005e0-1{fill:none;stroke:currentColor;stroke-miterlimit:10;}</style></defs><polygon class="cls-63ce7444ea57ea6c838005e0-1" points="20.59 22.5 3.41 22.5 12 11.04 20.59 22.5"></polygon><rect class="cls-63ce7444ea57ea6c838005e0-1" x="12" y="1.5" width="5.73" height="4.77"></rect><line class="cls-63ce7444ea57ea6c838005e0-1" x1="12" y1="11.05" x2="12" y2="6.27"></line></svg>ぜひ、あなたの旅も教えてください!
                </h1>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded ml-2 mr-4">
                     <a href="{{ route('register') }}" class="text-sm text-gray-700  underline">会員登録はこちら</a>
                </button>
                
            </div>
        </div>
    </div>
</x-app-layout>