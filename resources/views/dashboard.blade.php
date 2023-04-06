@php
  $prefectures = [
    '北海道', '青森県', '岩手県', '宮城県', '秋田県', '山形県', '福島県', '茨城県', '栃木県', '群馬県',
    '埼玉県', '千葉県', '東京都', '神奈川県', '新潟県', '富山県', '石川県', '福井県', '山梨県', '長野県',
    '岐阜県', '静岡県', '愛知県', '三重県', '滋賀県', '京都府', '大阪府', '兵庫県', '奈良県', '和歌山県',
    '鳥取県', '島根県', '岡山県', '広島県', '山口県', '徳島県', '香川県', '愛媛県', '高知県', '福岡県',
    '佐賀県', '長崎県', '熊本県', '大分県', '宮崎県', '鹿児島県', '沖縄県','海外'
  ];
  $orderedPrefectures = [
   '北海道', '青森県', '岩手県', '宮城県', '秋田県', '山形県', '福島県', '茨城県', '栃木県', '群馬県',
    '埼玉県', '千葉県', '東京都', '神奈川県', '新潟県', '富山県', '石川県', '福井県', '山梨県', '長野県',
    '岐阜県', '静岡県', '愛知県', '三重県', '滋賀県', '京都府', '大阪府', '兵庫県', '奈良県', '和歌山県',
    '鳥取県', '島根県', '岡山県', '広島県', '山口県', '徳島県', '香川県', '愛媛県', '高知県', '福岡県',
    '佐賀県', '長崎県', '熊本県', '大分県', '宮崎県', '鹿児島県', '沖縄県','海外'
    ];
    $prefectures = array_values(array_intersect($orderedPrefectures, $prefectures));
@endphp


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
                   
                    <!--セレクトタグで道都府県を自動検索-->
                    <div class="flex">
                    <p class="hidden sm:flex sm:items-center sm:ml-6">道都府県から検索:</p>
                    <div class="hidden sm:flex sm:items-center sm:ml-6 rounded">
                        <form method="GET" action="{{ route('tweet.select') }}">
                            <select name="perfecture" onchange="selectPerfecture(this.value)">
                              @foreach ($prefectures as $prefecture)
                                <option value="{{ $prefecture }}" @if ($prefecture == $selectedPerfecture) selected @endif>
                                    {{ $prefecture }}
                                </option>
                              @endforeach
                            </select>
                       
                        </form>
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
    
    <script>
function selectPerfecture(value) {
    if (value) {
        const url = new URL('{{ route("tweet.select") }}');
        url.searchParams.append('perfecture', value);
        window.location.href = url;
    }
}
</script>

</x-app-layout>