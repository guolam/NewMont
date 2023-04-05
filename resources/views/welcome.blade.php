<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--tailwindcss-->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <title>YAMOBE</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body class="">
    <div
        class="relative flex flex-col items-center justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

        <img src="{{ asset('image/banner_re.png')}}" alt="YAMOBEの画像" class="w-full md:w-3/4  mx-auto mb-4">
        <div class="mt-4 flex flex-col sm:flex-row items-center">
           



            <div class="text-center">

                Peak Experiences, Everyday Journeys.<br><br>
                山旅を日常に<br><br>

                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded ml-2 mr-4">
                    <a href="{{ route('login') }}">ログイン</a>
                </button>

                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded ml-2 mr-4">
                    <a href="{{ route('register') }}">
                        <div class="flex">
                            山や旅の思い出を登録されたい方はこちら
                            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                stroke-width="1.5" width="24" height="24" color="#ffffff">
                                <defs>
                                    <style>
                                        .cls-637b715ef95e86b59c579e66-1 {
                                            fill: none;
                                            stroke: currentColor;
                                            stroke-miterlimit: 10;
                                        }
                                    </style>
                                </defs>
                                <path class="cls-637b715ef95e86b59c579e66-1"
                                    d="M17.62,23.28V20.47l.09-.17a16.93,16.93,0,0,0,1.79-7.58h0a1.89,1.89,0,0,0-1.61-1.86l-5-.7V3.59a1.84,1.84,0,0,0-.56-1.32,1.83,1.83,0,0,0-1.48-.54,1.94,1.94,0,0,0-1.71,2V13.91l-1.3-1.3A2,2,0,0,0,6.49,12a2,2,0,0,0-1.41.58,2,2,0,0,0,0,2.81l5,5v2.81">
                                </path>
                            </svg>
                        </div>
                    </a>
                </button>
            </div>
        </div>
        <p>道都府県から山旅を探す</p>
        <div class="mt-12">
             <div class="mt-8">
            <div class="flex">
                <h2 class="mr-4">
                    <a href="{{ route('search', ['perfecture' => json_encode(['北海道'])]) }}">北海道</a>

                </h2>
                <p class="mr-4">
                   <a href="{{ route('search', ['perfecture' => json_encode(['北海道'])]) }}">北海道</a>
            </div>
        </div>

        <div class="mt-8">
            <div class="flex">
                <h2 class="mr-8">
                    <a href="{{ route('search', ['perfecture' => json_encode(['青森県', '岩手県', '宮城県', '秋田県', '山形県', '福島県'])]) }}">東北</a>
                </h2>
                <p class="mr-4">
                    <a href="{{ route('search', ['perfecture' => json_encode(['青森県'])]) }}">青森県</a>
                </p>
                <p class="mr-4">
                    <a href="{{ route('search', ['perfecture' => json_encode(['岩手県'])]) }}">岩手県</a>
                </p>
                <p class="mr-4">
                    <a href="{{ route('search', ['perfecture' => json_encode(['宮城県'])]) }}">宮城県</a>
                </p>
                <p class="mr-4">
                    <a href="{{ route('search', ['perfecture' => json_encode(['秋田県'])]) }}">秋田県</a>
                </p>
                <p class="mr-4">
                   <a href="{{ route('search', ['perfecture' => json_encode(['山形県'])]) }}">山形県</a>
                </p>
                <p class="mr-4">
                   <a href="{{ route('search', ['perfecture' => json_encode(['福島県'])]) }}">福島県</a>
                </p>
            </div>
        </div>

        <div class="mt-8">
            <div class="flex">
                 <h2 class="mr-8">
                    <a href="{{ route('search', ['perfecture' => json_encode(['茨城県', '栃木県', '群馬県', '埼玉県', '千葉県', '東京都', '神奈川県'])]) }}">関東</a>
                </h2>
                <p class="mr-4">
                    <a href="{{ route('search', ['perfecture' => json_encode(['茨城県'])]) }}">茨城県</a>
                </p>
                <p class="mr-4">
                    <a href="{{ route('search', ['perfecture' => json_encode(['栃木県'])]) }}">栃木県</a>
                </p>
                <p class="mr-4">
                    <a href="{{ route('search', ['perfecture' => json_encode(['群馬県'])]) }}">群馬県</a>
                </p>
                <p class="mr-4">
                    <a href="{{ route('search', ['perfecture' => json_encode(['埼玉県'])]) }}">埼玉県</a>
                </p>
                <p class="mr-4">
                   <a href="{{ route('search', ['perfecture' => json_encode(['千葉県'])]) }}">千葉県</a>
                </p>
                <p class="mr-4">
                   <a href="{{ route('search', ['perfecture' => json_encode(['東京都'])]) }}">東京都</a>
                </p>
                <p class="mr-4">
                    <a href="{{ route('search', ['perfecture' => json_encode(['神奈川県'])]) }}">神奈川県</a>
                </p>
            </div>
        </div>

        <div class="mt-8">
            <div class="flex">
                <h2 class="mr-8">
                    <a href="{{ route('search', ['perfecture' => json_encode (['新潟県', '富山県', '石川県', '福井県', '山梨県', '長野県', '岐阜県','静岡県','愛知県'])]) }}">中部</a>
                </h2>
                
                <p class="mr-4">
                    <a href="{{ route('search', ['perfecture' => json_encode(['新潟県'])]) }}">新潟県</a>
                </p>

                <p class="mr-4">
                    <a href="{{ route('search', ['perfecture' => json_encode(['富山県'])]) }}">富山県</a>

                </p>
                <p class="mr-4">
                    <a href="{{ route('search', ['perfecture' => json_encode(['石川県'])]) }}">石川県</a>

                </p>
                <p class="mr-4">
                    <a href="{{ route('search', ['perfecture' => json_encode(['福井県'])]) }}">福井県</a>

                </p>
                <p class="mr-4">
                    <a href="{{ route('search', ['perfecture' => json_encode(['山梨県'])]) }}">山梨県</a>

                </p>
                <p class="mr-4">
                    <a href="{{ route('search', ['perfecture' => json_encode(['長野県'])]) }}">長野県</a>

                </p>
                <p class="mr-4">
                    <a href="{{ route('search', ['perfecture' => json_encode(['岐阜県'])]) }}">岐阜県</a>

                </p>
                <p class="mr-4">
                    <a href="{{ route('search', ['perfecture' => json_encode(['静岡県'])]) }}">静岡県</a>

                </p>
                <p class="mr-4">
                    <a href="{{ route('search', ['perfecture' => json_encode(['愛知県'])])}}">愛知県</a>
                </p>
            </div>

        </div>
        <div class="mt-8">
            <div class="flex">
                <h2 class="mr-8">
                     <a href="{{ route('search', ['perfecture' => json_encode(['三重県', '滋賀県', '京都県', '大阪府', '兵庫県', '奈良県', '和歌山県'])]) }}">近畿</a>
                </h2>
                <p class="mr-4">
                    <a href="{{ route('search', ['perfecture' => json_encode(['三重県'])]) }}">三重県</a>
                </p>
                <p class="mr-4">
                    <a href="{{ route('search', ['perfecture' => json_encode(['滋賀県'])]) }}">滋賀県</a>
                </p>
                <p class="mr-4">
                    <a href="{{ route('search', ['perfecture' => json_encode(['京都府'])]) }}">京都府</a>
                </p>
                <p class="mr-4">
                    <a href="{{ route('search', ['perfecture' => json_encode(['大阪府'])]) }}">大阪府</a>
                </p>
                <p class="mr-4">
                    <a href="{{ route('search', ['perfecture' => json_encode(['兵庫県'])]) }}">兵庫県</a>
                </p>
                <p class="mr-4">
                    <a href="{{ route('search', ['perfecture' => json_encode(['奈良県'])]) }}">奈良県</a>
                </p>
                <p class="mr-4">
                    <a href="{{ route('search', ['perfecture' => json_encode(['和歌山県'])]) }}">和歌山県</a>
                </p>
            </div>
        </div>
        <div class="mt-8">
            <div class="flex">
                <h2 class="mr-8">
                    <a href="{{ route('search', ['perfecture' => json_encode (['鳥取県', '島根県', '岡山県', '広島県'])]) }}">中国</a>
                </h2>
                <p class="mr-4">
                   <a href="{{ route('search', ['perfecture' => json_encode(['鳥取県'])]) }}">鳥取県</a>
                </p>
                <p class="mr-4">
                    <a href="{{ route('search', ['perfecture' => json_encode(['島根県'])]) }}">島根県</a>
                </p>
                <p class="mr-4">
                    <a href="{{ route('search', ['perfecture' => json_encode(['岡山県'])]) }}">岡山県</a>
                </p>
                <p class="mr-4">
                    <a href="{{ route('search', ['perfecture' => json_encode(['広島県'])]) }}">広島県</a>
                </p>
                <p class="mr-4">
                   <a href="{{ route('search', ['perfecture' => json_encode(['山口県'])]) }}">山口県</a>
                </p>
            </div>

        </div>
        <div class="mt-8">
            <div class="flex">
                <h2 class="mr-8">
                    <a href="{{ route('search', ['perfecture' => json_encode (['徳島県', '香川県', '愛媛県', '高知県'])]) }}">四国</a>
                </h2>
                <p class="mr-4">
                    <a href="{{ route('search', ['perfecture' => json_encode(['徳島県'])]) }}">徳島県</a>
                </p>
                <p class="mr-4">
                   <a href="{{ route('search', ['perfecture' => json_encode(['香川県'])]) }}">香川県</a>
                </p>
                <p class="mr-4">
                    <a href="{{ route('search', ['perfecture' => json_encode(['愛媛県'])]) }}">愛媛県</a>
                </p>
                <p class="mr-4">
                    <a href="{{ route('search', ['perfecture' => json_encode(['高知県'])]) }}">高知県</a>
                </p>
            </div>
        </div>
        <div class="mt-8">
            <div class="flex">
                <h2 class="mr-8">
                    <a href="{{ route('search', ['perfecture' => json_encode (['福岡県', '佐賀県', '長崎県', '熊本県', '大分県', '宮崎県', '鹿児島県'])]) }}">九州</a>
                </h2>
                <p class="mr-4">
                    <a href="{{ route('search', ['perfecture'  => json_encode([ '福岡県'])]) }}">福岡県</a>
                </p>
                <p class="mr-4">
                   <a href="{{ route('search', ['perfecture' => json_encode(['佐賀県'])]) }}">佐賀県</a>
                </p>
                <p class="mr-4">
                    <a href="{{ route('search', ['perfecture' => json_encode(['長崎県'])]) }}">長崎県</a>
                </p>
                <p class="mr-4">
                   <a href="{{ route('search', ['perfecture' => json_encode(['熊本県'])]) }}">熊本県</a>
                </p>
                <p class="mr-4">
                   <a href="{{ route('search', ['perfecture' => json_encode(['大分県'])]) }}">大分県</a>
                </p>
                <p class="mr-4">
                    <a href="{{ route('search', ['perfecture' => json_encode(['宮崎県'])]) }}">宮崎県</a>
                </p>
                <p class="mr-4">
                   <a href="{{ route('search', ['perfecture' => json_encode(['鹿児島県'])]) }}">鹿児島県</a>
                </p>
            </div>
        </div>
        <div class="mt-8">
            <div class="flex">
                <h2 class="mr-8">
                    <a href="{{ route('search', ['perfecture' => json_encode(['沖縄県'])]) }}">沖縄</a>
                </h2>
                <p class="mr-4">
                    <a href="{{ route('search', ['perfecture' => json_encode(['沖縄県'])]) }}">沖縄県</a>
                </p>
            </div>
        </div>
        <div class="mt-8">
            <div class="flex">
                <h2 class="mr-8">
                     <a href="{{ route('search', ['perfecture'=> json_encode(['沖縄県'])]) }}">海外</a>
                </h2>
            </div>
        </div>
    </div>
</body>

</html>