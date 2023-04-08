<!--resources/views/group/create.blade.php -->
<!--グループ作成-->

<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('グループ作成') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
      <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200  ">
          @include('common.errors')
          
<form method="POST" action="{{ route('group.store') }}">
    @csrf


    <div class="flex flex-col mb-4">
            <x-input-label for="group_name" :value="__('グループ名')" />
            <input id="group_name" class="block mt-1 w-full px-3 py-2 placeholder-gray-400 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-transparent mb-2" type="text" name="group_name" :value="old('group_name')" required autofocus />
            <x-input-error :messages="$errors->get('group_name')" class="mt-2" />
    </div>
    
    <div class="flex flex-col mb-4">
            <x-input-label for="description" :value="__('グループ説明')" />
            <!--textareaにしたい-->
           <textarea id="description" class="block mt-1 w-full px-3 py-2 placeholder-gray-400 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-transparent mb-2" name="description" rows="4">{{ old('description') }}</textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
    </div>
            @csrf
            <div class="flex justify-between">
        <div class="flex items-center">
          <a href="{{ url()->previous() }}">
            <x-secondary-button>
              {{ __('戻る') }}
            </x-primary-button>
          </a>
        </div>
      
        <div class="flex items-center">
          <x-primary-button class="ml-3">
            {{ __('作成') }}
          </x-primary-button>
        </div>
      </div>

    <!--<button type="submit" class="btn btn-primary">作成</button>-->
</form>

</div>
      </div>
    </div>
  </div>
</x-app-layout>