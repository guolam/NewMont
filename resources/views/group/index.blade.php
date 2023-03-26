<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('グループ一覧') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-800 ">
                    @include('common.errors')

                    <div class="flex flex-col mb-4">
                        <div class="flex items-center justify-end mt-4">
                            <x-href-button class="ml-3" :href="route('group.create')"
                                :active="request()->routeIs('group.create')">
                                {{ __('グループ作成') }}
                            </x-href-button>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-href-button class="ml-3" :href="route('group_requests.index')"
                                :active="request()->routeIs('group_requests.index')">
                                {{ __('グループ申請確認') }}
                            </x-href-button>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-href-button class="ml-3" :href="route('users.show')"
                                :active="request()->routeIs('users.show')">
                                {{ __('マイグループ') }}
                            </x-href-button>
                        </div>
                        @foreach ($groups as $group)
                        <ul>
                            <li>{{ $group->name }}</li>
                        </ul>
                        
                        <tr class="hover:bg-gray-lighter">
                            <td class="py-6 px-6 border-b border-gray-light dark:border-gray-600">

                               
                                <div id="group"></div>
                                <div class="py-4">
  
                                <!--やりたいことグループに加入する-->
                                @include('group_requests.create', ['group' => $group])

                         <!-- 所属メンバーのみがアクセスできる -->
                        @if(Auth::user()->isMemberOf($group))
                            <a href="{{ route('group.show',$group->id) }}">
                                <p class="text-left text-gray-800 dark:text-gray-200">グループ名</p>
                                <h3 class="text-left font-bold text-lg text-gray-800 dark:text-gray-200">
                                    {{$group->group_name}}</h3>
                                <p class="text-left text-gray-800 dark:text-gray-200">グループ詳細</p>
                                <h3 class="text-left font-bold text-lg text-gray-800 dark:text-gray-200">
                                    {{$group->description}}</h3>
                            </a>
                        @else
                        <p class="text-left text-gray-800 dark:text-gray-200">グループ名</p>
                                <h3 class="text-left font-bold text-lg text-gray-800 dark:text-gray-200">
                                    {{$group->group_name}}</h3>
                                <p class="text-left text-gray-800 dark:text-gray-200">グループ詳細</p>
                                <h3 class="text-left font-bold text-lg text-gray-800 dark:text-gray-200">
                                    {{$group->description}}</h3>
                        @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>