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
          <form class="mb-6" action="{{ route('tweet.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col mb-4">
              <x-input-label for="tweet" :value="__('山')" />
              <x-text-input id="tweet" class="block mt-1 w-full" type="text" name="tweet" :value="old('tweet')" required autofocus />
              <x-input-error :messages="$errors->get('tweet')" class="mt-2" />
            </div>
             <div class="flex flex-col mb-4">
              <x-input-label for="parking" :value="__('駐車場')" />
              <x-text-input id="parking" class="block mt-1 w-full" type="text" name="parking" :value="old('parking')" required autofocus />
              <x-input-error :messages="$errors->get('parking')" class="mt-2" />
            </div>
            <div class="flex flex-col mb-4">
              <x-input-label for="description" :value="__('所感')" />
              <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus />
              <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
            
           <div class="flex flex-col mb-4">
              <x-input-label for="image" :value="__('画像')" />
              <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')" required autofocus />
              <x-input-error :messages="$errors->get('image')" class="mt-2" />
            </div>
           
            <!--<x-input-label for="image" :value="__('画像')" />-->
            @csrf
            
            <div class="flex items-center justify-end mt-4">
              <x-primary-button class="ml-3">
                {{ __('作成') }}
              </x-primary-button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>

