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
                <th class="py-4 px-6 bg-gray-lightest dark:bg-gray-darkest font-bold uppercase text-lg text-gray-dark dark:text-gray-200 border-b border-grey-light dark:border-grey-dark">山旅一覧</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($tweets as $tweet)
              <tr class="hover:bg-gray-lighter">
                <td class="py-4 px-6 border-b border-gray-light dark:border-gray-600">
                <a href="{{ route('tweet.show',$tweet->id) }}">
                  <!-- 🔽 所属の人を追加 -->
                  <div id="example"></div>
                  <p class="text-left text-gray-800 dark:text-gray-200">{{$tweet->user->name}}</p>
                  <h3 class="text-left font-bold text-lg text-gray-800 dark:text-gray-200">{{$tweet->tweet}}</h3>
                </a>
                <div class="flex">
                 
                  <!-- 条件分岐でログインしているユーザが投稿したtweetのみ編集ボタンと削除ボタンが表示される -->
               
                   @if (Auth::check() && ($tweet->is_public || $tweet->user_id === Auth::user()->id))
                  <!-- 更新ボタン -->
                  <form action="{{ route('tweet.edit',$tweet->id) }}" method="GET" class="text-left">
                  @csrf
                    <button class="ml-3">
                      <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" width="29" height="29" color="#292929"><defs><style>.cls-637b7f18f95e86b59c57a00f-1{fill:none;stroke:currentColor;stroke-miterlimit:10;}</style></defs><path class="cls-637b7f18f95e86b59c57a00f-1" d="M5.32,14.86,3.41,17.73,1.5,14.86V3.41A1.9,1.9,0,0,1,3.41,1.5h0A1.91,1.91,0,0,1,5.32,3.41Z"></path><path class="cls-637b7f18f95e86b59c57a00f-1" d="M20.59,22.5H8.18a1.92,1.92,0,0,1-1.91-1.91V18.68H18.68v1.91A1.92,1.92,0,0,0,20.59,22.5Z"></path><path class="cls-637b7f18f95e86b59c57a00f-1" d="M22.5,1.5V20.59a1.91,1.91,0,0,1-3.82,0V18.68H10.09V1.5Z"></path><line class="cls-637b7f18f95e86b59c57a00f-1" x1="12.95" y1="6.27" x2="19.64" y2="6.27"></line><line class="cls-637b7f18f95e86b59c57a00f-1" x1="12.95" y1="10.09" x2="19.64" y2="10.09"></line><line class="cls-637b7f18f95e86b59c57a00f-1" x1="12.95" y1="13.91" x2="19.64" y2="13.91"></line></svg>
                    <button>
                  </form>
                    <!-- 削除ボタン -->
                    <form action="{{ route('tweet.destroy',$tweet->id) }}" method="POST" class="text-left">
                      @method('delete')
                      @csrf
                      <x-primary-button class="ml-3">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="gray">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                      </x-primary-button>
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

