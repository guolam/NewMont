<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('山旅詳細') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-800">
          <div class="mb-6">
            
            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-gray-800 dark:text-gray-200">名山</p>
              <p class="py-2 px-3 text-gray-800 dark:text-gray-200" id="mont">
                {{$tweet->mont}}
            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-gray-800 dark:text-gray-200">道都府県</p>
              <p class="py-2 px-3 text-gray-800 dark:text-gray-200" id="perfecture">
                {{$tweet->perfecture}}
              </p>
            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-gray-800 dark:text-gray-200">山</p>
              <p class="py-2 px-3 text-gray-800 dark:text-gray-200" id="tweet">
                {{$tweet->tweet}}
              </p>
            </div>
            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-gray-800 dark:text-gray-200">駐車場</p>
              <p class="py-2 px-3 text-gray-800 dark:text-gray-200" id="parking">
                {{$tweet->parking}}
              </p>
              <!--ここに入れたい、駐車場の地図-->
            </div>
            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-gray-800 dark:text-gray-200">所感</p>
              <p class="py-2 px-3 text-gray-800 dark:text-gray-200" id="description">
                {{$tweet->description}}
              </p>
              <img src="{{ asset('storage/image/'.$tweet->image)}}"　class="mx-auto" style="height:300px;">
            </div>
            <div class="flex items-center justify-end mt-4">
            <a href="{{ url()->previous() }}">
              <x-secondary-button class="ml-3">
                {{ __('戻る') }}
              </x-primary-button>
            </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>

