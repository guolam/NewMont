<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('グループ申請状況確認') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @include('common.errors')
                    @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="flex items-center justify-end mt-4">
                        <a href="{{route('group.index') }}">
                            <x-secondary-button class="ml-3">
                                {{ __('戻る') }}
                            </x-secondary-button>
                        </a>
                    </div>
                    @foreach($groups as $group)
                        @if(Auth::user()->id === $group->user_id)
                            <div class="my-6">
                                <h2 class="text-xl font-semibold text-gray-800">{{ $group->group_name }}</h2>
                                <h3 class="text-lg font-semibold text-gray-600">リクエスト中</h3>
                                <table class="table w-full mt-4">
                                    <thead>
                                        <tr>
                                            <th class="w-1/3 text-center">申請ユーザー</th>
                                            <th class="w-1/3 text-center">承認・拒否</th>
                                            <tr class="h-4"></tr>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pending_requests as $request)
                                            @if($request->group_id === $group->id)
                                                @php
                                                    $hasApplicants = true;
                                                @endphp
                                                
                                    
                                                <tr>
                                                    <td class="w-1/3 text-center py-4 border-t border-gray-200">{{ $request->user->name }}</td>
                                                    <td class="w-1/3 text-center py-4 border-t border-gray-200">
                                                        <div class="flex justify-center">
                                                            <form action="{{ route('group_requests.approve', $request->id) }}" method="POST">
                                                                @csrf
                                                                <x-secondary-button type="submit" class="mr-4">承認</x-secondary-button>
                                                            </form>
                                                            <form action="{{ route('group_requests.reject', $request->id) }}" method="POST">
                                                                @csrf
                                                                <x-primary-button type="submit" class="ml-4">拒否</x-primary-button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                                @if(!$hasApplicants)
                                    <div class="text-center py-4 text-gray-600">
                                        申請者がいません
                                    </div>
                                @endif
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
