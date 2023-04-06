<!--users.show 所属グループ-->
<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('所属グループ') }}
    </h2>
  </x-slot>

<div class="py-12">
        <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-800 ">
                    @include('common.errors')
                    
<div class="mt-8">
    <h2 class="text-xl font-semibold text-gray-800">承認されたグループ</h2>
    <ul class="mt-4">
        @foreach($approved_requests as $request)
        <li class="mb-2">
            <span class="text-gray-800 font-semibold">グループ: </span>{{ $request->group->group_name }}
        </li>
        @endforeach
    </ul>
</div>
    <div class="flex items-center justify-end mt-4">
        <a href="{{ url()->previous() }}">
            <x-secondary-button class="ml-3">
                {{ __('戻る') }}
            </x-primary-button>
        </a>
    </div>

 
</x-app-layout>

