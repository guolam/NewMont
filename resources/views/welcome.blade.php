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
                    <a href="{{ route('register') }}" >山や旅の思い出を登録されたい方はこちら</a>
                    </button>
                </div>
            </div>
        </div>
    </body>
</html>
