<!--group/show.blade.php-->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('グループ詳細') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-800 ">
                    
                
                    <div class="flex items-center justify-end mt-4">
                            <x-href-button class="ml-3" 
                            href="{{ route('groupcontent.create',$group->id) }}"
                                :active="request()->routeIs('groupcontent.create')">
                                {{ __('旅記録作成') }}
                            </x-href-button>
                        </div>
                        
                    <h3 class="text-left font-bold text-lg text-gray-800 dark:text-gray-200">
                        グループ名: {{ $group->group_name }}
                    </h3>
                    <p class="text-left text-gray-800 dark:text-gray-200">
                        グループ詳細: {{ $group->description }}
                    </p>

    <h4 class="mt-4 text-gray-800 dark:text-gray-200">所属ユーザー:</h4>
    <ul>
        @foreach ($related_users as $user)
            <li>{{ $user->name }}</li>
        @endforeach
    </ul>
    
    @include('groupcontent/show')
    
              <!-- 関連データを表示するためのコードを追加（例: 関連ユーザー、投稿など） -->
                    <!-- $related_dataを使用してデータを表示 -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>