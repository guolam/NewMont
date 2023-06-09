<!--group/show.blade.php-->
<!-- Add accordion styles and scripts -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('グループ詳細') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                <div class="flex justify-between mb-8">    
                    <div class="flex items-center justify-end mt-4">
                        <a href="{{  route('group.index', $group->id) }}">
                            <x-secondary-button class="ml-3">
                                {{ __('戻る') }}
                            </x-primary-button>
                        </a>
                    </div>
                    
                    
                    <div class="flex items-center justify-end mt-4">
                        <x-href-button class="ml-3 " href="{{ route('groupcontent.create',$group->id) }}"
                            :active="request()->routeIs('groupcontent.create')">
                            {{ __('旅記録作成') }}
                        </x-href-button>
                    </div>
                    
                    
                    @if(Auth::user()->id === $group->user->id)
                       <div class="flex items-center justify-end mt-4">
                        <x-href-button href="{{ route('group.edit', $group->id) }}">
                          {{ __('編集') }}
                        </x-href-button>
                      </div>
                      @endif

                    
                    </div>

                    <div class="mb-8">
                    <h3 class="text-left font-bold text-lg text-gray-800 mb-4">
                        グループ名: {{ $group->group_name }}
                    </h3>
                    <p class="text-left text-gray-800">
                        詳細: {{ $group->description }}
                    </p>
                    </div>

                    <x-accordion>
                        <h4 class="text-gray-800 mb-8">所属ユーザー▼</h4>
                        <div class="accordion-content">
                            <ul>
                                @foreach ($related_users as $user)
                                <li>{{ $user->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </x-accordion>

                    @include('groupcontent/show')

                    <!-- 関連データを表示するためのコードを追加（例: 関連ユーザー、投稿など） -->
                    <!-- $related_dataを使用してデータを表示 -->
                </div>
            </div>
        </div>
    </div>
   
</x-app-layout>