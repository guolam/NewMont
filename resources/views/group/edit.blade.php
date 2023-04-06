<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('グループ編集') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          @include('common.errors')

           <form method="POST" action="{{ route('group.update', $group->id) }}">
                        @csrf
                        @method('PUT')

            <div class="flex flex-col mb-4">
              <x-input-label for="group_name" :value="__('グループ名')" />
              <input id="group_name" class="block mt-1 w-full px-3 py-2 placeholder-gray-400 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-transparent mb-2" type="text" name="group_name" value="{{ old('group_name', $group->group_name) }}" required autofocus />
              <x-input-error :messages="$errors->get('group_name')" class="mt-2" />
            </div>

            <div class="flex flex-col mb-4">
              <x-input-label for="description" :value="__('グループ説明')" />
              <!--textareaにしたい-->
              <textarea id="description" class="block mt-1 w-full px-3 py-2 placeholder-gray-400 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-transparent mb-2" name="description" rows="4">{{ old('description', $group->description) }}</textarea>
              <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
              <x-primary-button class="ml-3">
                {{ __('更新') }}
              </x-primary-button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
