<!-- resources/views/tweet/create.blade.php -->

<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('新規作成') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-800 ">
          @include('common.errors')
          
<form method="POST" action="{{ route('group.store') }}">
    @csrf


    <div class="flex flex-col mb-4">
            <x-input-label for="group_name" :value="__('グループ名')" />
            <x-text-input id="group_name" class="block mt-1 w-full" type="text" name="group_name" :value="old('group_name')" required autofocus />
            <x-input-error :messages="$errors->get('group_name')" class="mt-2" />
    </div>
    
    <div class="flex flex-col mb-4">
            <x-input-label for="description" :value="__('グループ説明')" />
            <!--textareaにしたい-->
            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" />
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
    </div>
            @csrf
            <div class="flex items-center justify-end mt-4">
              <x-primary-button class="ml-3">
                {{ __('作成') }}
              </x-primary-button>
            </div>

    <!--<button type="submit" class="btn btn-primary">作成</button>-->
</form>

</div>
      </div>
    </div>
  </div>
</x-app-layout>