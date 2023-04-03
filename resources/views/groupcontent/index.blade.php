<!-- resources/views/groupcontent/index.blade.php -->
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-grey-200">
                <table class="text-center w-full border-collapse">
                    <thead>
                        <tr>
                            <th
                                class="py-4 px-6 bg-gray-lightest font-bold uppercase text-lg text-gray-dark border-b border-grey-light">
                                山旅一覧</th>
                        </tr>
                    </thead>
                    <tbody>
                        <a href="{{ route('groupcontent.show', ['group_content' => $group_content->id]) }}">
                            @foreach ($group_contents as $group_content)
                            <tr class="hover:bg-gray-lighter">
                                <td class="py-4 px-6 border-b border-gray-light">
                                    <a href="{{ route('groupcontent.show',$group_content->id) }}">
                                        <!-- 🔽 所属の人を追加 -->
                                        <div id="example"></div>
                                        <p class="text-left text-gray-800">{{$group_content->user->name}}</p>
                                        <h3 class="text-left font-bold text-lg text-gray-800">{{$group_content->tweet}}
                                        </h3>
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