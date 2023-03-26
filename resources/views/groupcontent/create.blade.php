<!-- resources/views/groupcontent/create.blade.php -->

<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('旅作成') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-800 ">
          @include('common.errors')
          
          
        
          <form id="address-form" class="mb-6" action="{{ route('groupcontent.store',$group->id) }}" method="POST" enctype="multipart/form-data" autocomplete="on">
            @csrf
          <input type="hidden" name="group_id" value="{{ $group->id}}">
          <div class="flex flex-col mb-4">
              <x-input-label for="date" :value="__('日付')" />
              <x-text-input id="date" class="block mt-1 w-full" type="date" name="date" :value="old('date')" required autofocus />
              <x-input-error :messages="$errors->get('date')" class="mt-2" />
            </div>
          
          <div class="flex flex-col mb-4">
          <x-input-label for="perfecture" :value="__('道都府県（必須）')" />
          <div class="relative">
          <select id="perfecture" name="perfecture" type="text" :value="old('perfecture')" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  required autofocus>
            <option></option>
            <option value="北海道">北海道</option>
            <option value="青森県">青森県</option>
            <option value="岩手県">岩手県</option>
            <option value="宮城県">宮城県</option>
            <option value="秋田県">秋田県</option>
            <option value="山形県">山形県</option>
            <option value="福島県">福島県</option>
            <option value="茨城県">茨城県</option>
            <option value="栃木県">栃木県</option>
            <option value="群馬県">群馬県</option>
            <option value="埼玉県">埼玉県</option>
            <option value="千葉県">千葉県</option>
            <option value="東京都">東京都</option>
            <option value="神奈川県">神奈川県</option>
            <option value="新潟県">新潟県</option>
            <option value="富山県">富山県</option>
            <option value="石川県">石川県</option>
            <option value="福井県">福井県</option>
            <option value="山梨県">山梨県</option>
            <option value="長野県">長野県</option>
            <option value="岐阜県">岐阜県</option>
            <option value="静岡県">静岡県</option>
            <option value="愛知県">愛知県</option>
            <option value="三重県">三重県</option>
            <option value="滋賀県">滋賀県</option>
            <option value="京都府">京都府</option>
            <option value="大阪府">大阪府</option>
            <option value="兵庫県">兵庫県</option>
            <option value="奈良県">奈良県</option>
            <option value="和歌山県">和歌山県</option>
            <option value="鳥取県">鳥取県</option>
            <option value="島根県">島根県</option>
            <option value="岡山県">岡山県</option>
            <option value="広島県">広島県</option>
            <option value="山口県">山口県</option>
            <option value="徳島県">徳島県</option>
            <option value="香川県">香川県</option>
            <option value="愛媛県">愛媛県</option>
            <option value="高知県">高知県</option>
            <option value="福岡県">福岡県</option>
            <option value="佐賀県">佐賀県</option>
            <option value="長崎県">長崎県</option>
            <option value="熊本県">熊本県</option>
            <option value="大分県">大分県</option>
            <option value="宮崎県">宮崎県</option>
            <option value="鹿児島県">鹿児島県</option>
            <option value="沖縄県">沖縄県</option>
            <option value="海外">海外</option>
          </select>
           <x-input-error :messages="$errors->get('perfecture')" class="mt-2" />
          </div></div>
            
          <div class="flex flex-col mb-4">
          <x-input-label for="mont" :value="__('百・二百名山(任意)')" />
          <div class="relative">
          <select id="mont" type="text" name="mont" :value="old('mont')" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            <option value="なし" id="mont" name="mont"></option>
            <option value="百名山" id="mont" name="mont">百名山</option>
            <option value="二百名山" id="mont" name="mont">二百名山</option>
          </select>
          </div></div>
            
            <div class="flex flex-col mb-4">
              <x-input-label for="tweet" :value="__('山（必須）')" />
              <x-text-input id="tweet" class="block mt-1 w-full" type="text" name="tweet" :value="old('tweet')" required autofocus />
              <x-input-error :messages="$errors->get('tweet')" class="mt-2" />
            </div>
            
            @include('map/autocomplete')
            <div class="flex flex-col mb-4">
              <p class="title"> </p>
              <label class="full-field">
              <x-input-label for="parking" :value="__('駐車場(必須・場所を入力すると、住所が表示されます)')" />
              <x-text-input 
              id="parking" 
              class="block mt-1 w-full" 
              type="text" 
              name="parking" 
              :value="old('parking')" 
              required  autocomplete="on"/>
              <x-input-error :messages="$errors->get('parking')" class="mt-2" />
              </label>
            </div>
          
            <div id="map" style="height:500px" class="w-960"> </div>

            <div class="flex flex-col mb-4">
              <p class="title"> </p>
              <label class="full-field">
              <x-input-label for="spring" :value="__('温泉(場所を入力すると、住所が表示されます)')" />
              <x-text-input 
              id="spring" 
              class="block mt-1 w-full" 
              type="text" 
              name="spring" 
              :value="old('spring')" 
              autocomplete="on"/>
              <x-input-error :messages="$errors->get('spring')" class="mt-2" />
              </label>
            </div>
          
            <div id="mapSpring" style="height:500px" class="w-960"> </div>

            <div class="flex flex-col mb-4">
              <p class="title"> </p>
              <label class="full-field">
              <x-input-label for="food" :value="__('飲食店 (場所を入力すると、住所が表示されます)')" />
              <x-text-input 
              id="food" 
              class="block mt-1 w-full" 
              type="text" 
              name="food" 
              :value="old('food')" 
              autocomplete="on"/>
              <x-input-error :messages="$errors->get('food')" class="mt-2" />
              </label>
            </div>
            <div id="mapFood" style="height:500px" class="w-960"> </div>
            
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
           
            
            @csrf
            
            <div class="flex items-center justify-end mt-4">
              <x-primary-button class="ml-3">
                {{ __('作成') }}
              </x-primary-button>
            </div>
          </form>
           
          <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDad24zpc64K8oLZQoO_cWKpeCSeHLGNwc&callback=initMap&region=JP&language=ja&libraries=places&v=weekly"
            defer
          ></script>    
         
        </div>
      </div>
    </div>
  </div>
</x-app-layout>