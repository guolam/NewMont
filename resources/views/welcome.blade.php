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
        <div class="relative flex flex-col items-center justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
       
            <img src="{{ asset('image/banner_re.png')}}" alt="YAMOBEの画像" class="w-full md:w-3/4  mx-auto mb-4">
         <div class="mt-4 flex flex-col sm:flex-row items-center">
            <div class="mt-8 ">
                <h3 class="text-lg mb-4">ログインせずに検索</h3>
                <form action="{{ route('search') }}" method="GET" class="flex items-center">
                    <input type="text" name="query" placeholder="山の名前を入力してください" class="border rounded px-4 py-2">
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded ml-2 mr-4">検索</button>
                </form>
            </div>

           
                <div class="text-center">
                    
                    Peak Experiences, Everyday Journeys.<br><br>
                    山旅を日常に<br><br>
               
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded ml-2 mr-4">
                   <a href="{{ route('login') }}" >ログイン</a>
                    </button>
                   
                     <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded ml-2 mr-4">
                    <a href="{{ route('register') }}" >
                       <div class="flex">
                        山や旅の思い出を登録されたい方はこちら
                        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" width="24" height="24" color="#ffffff"><defs><style>.cls-637b715ef95e86b59c579e66-1{fill:none;stroke:currentColor;stroke-miterlimit:10;}</style></defs><path class="cls-637b715ef95e86b59c579e66-1" d="M17.62,23.28V20.47l.09-.17a16.93,16.93,0,0,0,1.79-7.58h0a1.89,1.89,0,0,0-1.61-1.86l-5-.7V3.59a1.84,1.84,0,0,0-.56-1.32,1.83,1.83,0,0,0-1.48-.54,1.94,1.94,0,0,0-1.71,2V13.91l-1.3-1.3A2,2,0,0,0,6.49,12a2,2,0,0,0-1.41.58,2,2,0,0,0,0,2.81l5,5v2.81"></path></svg>
                        </div>
                    </a>
                    </button>
                </div>
            </div>
        </div>
    </body>
</html>
