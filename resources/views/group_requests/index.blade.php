<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('グループ申請状況確認') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-800 ">
                    @include('common.errors')
                    @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($groups as $group)
                        @if(Auth::user()->id === $group->user_id)
                            <h2>リクエスト中</h2>
                            <table class="table w-full">
                                <thead>
                                    <tr>
                                        <th class="w-1/3 text-center">グループ名</th>
                                        <th class="w-1/3 text-center">申請ユーザー</th>
                                        <th class="w-1/3 text-center">承認・拒否</th>
                                        <tr class="h-4"></tr>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pending_requests as $request)
                                        @if($request->group_id === $group->id)
                                            <tr>
                                                <td class="w-1/3 text-center">{{ $request->group->group_name }}</td>
                                                <td class="w-1/3 text-center">{{ $request->user->name }}</td>
                                                <td class="w-1/3 text-center">
                                                    <div class="w-1/3 text-center flex justify-center">
                                                   
                                                        
                                                        <form action="{{ route('group_requests.approve', $request->id) }}" method="POST">
                                @csrf
                                <x-secondary-button type="submit" class="btn btn-success mr-4">承認</x-secondary-button>
                            </form>
                            <form action="{{ route('group_requests.reject', $request->id) }}" method="POST">
                                @csrf
                                <x-primary-button type="submit" class="btn btn-danger ml-4">拒否</x-primary-button>
                                                    </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
