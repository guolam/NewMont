<!-- resources/views/groupcontent/index.blade.php -->

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
              <a href="{{ route('groupcontent.show', ['group_content' => $group_content->id]) }}">

              @foreach ($group_contents as $group_content)
              <tr class="hover:bg-gray-lighter">
                <td class="py-4 px-6 border-b border-gray-light dark:border-gray-600">
                <a href="{{ route('groupcontent.show',$group_content->id) }}">
                  <!-- 🔽 所属の人を追加 -->
                  <div id="example"></div>
                  <p class="text-left text-gray-800 dark:text-gray-200">{{$group_content->user->name}}</p>
                  <h3 class="text-left font-bold text-lg text-gray-800 dark:text-gray-200">{{$group_content->tweet}}</h3>
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

