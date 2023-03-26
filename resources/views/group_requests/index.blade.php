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
                            <h2>リクエスト中: {{ $group->group_name }}</h2>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>グループ名</th>
                                        <th>申請ユーザー</th>
                                        <th>承認・拒否</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pending_requests as $request)
                                        @if($request->group_id === $group->id)
                                            <tr>
                                                <td>{{ $request->group->group_name }}</td>
                                                <td>{{ $request->user->name }}</td>
                                                <td>
                                                    <form action="{{ route('group_requests.approve', $request->id) }}" method="POST">
                                                        @csrf
                                                        
                                                        <button type="submit" class="btn btn-success">承認</button>
                                                    </form>
                                                    
                                                    
                                                    <form action="{{ route('group_requests.reject', $request->id) }}" method="POST">
                                                        @csrf
                                                       
                                                        <button type="submit" class="btn btn-danger">拒否</button>
                                                    </form>
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
