@foreach ($tweets as $tweet)
    <tr class="hover:bg-gray-lighter">
        <td class="py-4 px-6 border-b border-gray-light">
            <a href="{{ route('tweet.show', $tweet->id) }}">
                <!-- 🔽 所属の人を追加 -->
                <div id="example"></div>
                <div class="flex justify-between">
                    <div style="padding-top: 0.1em; padding-bottom: 0.1rem" class="text-sm px-3 bg-teal-300 text-teal-800 rounded-full">
                        <p class="text-left text-gray-800">{{$tweet->perfecture}}</p>
                    </div>
                    <p class="text-left text-gray-800">{{$tweet->user->name}}</p>
                </div>
                <h3 class="mt-2 text-left font-bold text-lg text-gray-800">{{$tweet->tweet}}</h3>
                <img src="{{ asset('storage/image/'.$tweet->image)}}" class="mt-8 mb-8 mx-auto" style="height:300px; object-fit: cover; display:block" />
            </a>
            <div class="flex">
                <!-- 条件分岐でログインしているユーザが投稿したtweetのみ編集ボタンと削除ボタンが表示される -->
            </div>
        </td>
    </tr>
@endforeach
