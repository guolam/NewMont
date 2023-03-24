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
                        @foreach ($groups as $group)
                        <ul>
                            <li>{{ $group->name }}</li>
                        </ul>
                        
                        <tr class="hover:bg-gray-lighter">
                            <td class="py-6 px-6 border-b border-gray-light dark:border-gray-600">

                                <!--<a href="{{ route('tweet.show',$group->id) }}">-->
                                <!-- 🔽 所属の人を追加 -->
                                <div id="group"></div>
                                <div class="py-4">
  
                                <!--やりたいことグループに加入する-->
                                @include('groupmembership/create')
                                
                                <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24" stroke-width="1.5" width="24" height="24" color="#000000">
                                    <defs>
                                        <style>
                                            .cls-6374f8d9b67f094e4896c60d-1 {
                                                fill: none;
                                                stroke: currentColor;
                                                stroke-miterlimit: 10;
                                            }
                                        </style>
                                    </defs>
                                    <circle class="cls-6374f8d9b67f094e4896c60d-1" cx="9.61" cy="5.8" r="4.3"></circle>
                                    <path class="cls-6374f8d9b67f094e4896c60d-1"
                                        d="M1.5,19.64l.7-3.47a7.56,7.56,0,0,1,7.41-6.08,7.43,7.43,0,0,1,4.59,1.57">
                                    </path>
                                    <circle class="cls-6374f8d9b67f094e4896c60d-1" cx="16.77" cy="16.77" r="5.73">
                                    </circle>
                                    <line class="cls-6374f8d9b67f094e4896c60d-1" x1="13.91" y1="16.77" x2="19.64"
                                        y2="16.77"></line>
                                    <line class="cls-6374f8d9b67f094e4896c60d-1" x1="16.77" y1="13.91" x2="16.77"
                                        y2="19.64"></line>
                                </svg>
                                </form>
                                <p class="text-left text-gray-800 dark:text-gray-200">グループ名</p>
                                <h3 class="text-left font-bold text-lg text-gray-800 dark:text-gray-200">
                                    {{$group->group_name}}</h3>
                                <p class="text-left text-gray-800 dark:text-gray-200">グループ詳細</p>
                                <h3 class="text-left font-bold text-lg text-gray-800 dark:text-gray-200">
                                    {{$group->description}}</h3>
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