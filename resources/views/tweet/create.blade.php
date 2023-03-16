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
          <form id="address-form" class="mb-6" action="{{ route('tweet.store') }}" method="POST" enctype="multipart/form-data" autocomplete="on">
            @csrf
          
          <div class="flex flex-col mb-4">
          <x-input-label for="perfecture" :value="__('道都府県')" />
          <div class="relative">
          <select id="perfecture" name="perfecture" type="text" :value="old('perfecture')" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  required autofocus>
            <option></option>
            <option value="1">北海道</option>
            <option value="2">青森県</option>
            <option value="3">岩手県</option>
            <option value="4">宮城県</option>
            <option value="5">秋田県</option>
            <option value="6">山形県</option>
            <option value="7">福島県</option>
            <option value="8">茨城県</option>
            <option value="9">栃木県</option>
            <option value="10">群馬県</option>
            <option value="11">埼玉県</option>
            <option value="12">千葉県</option>
            <option value="13">東京都</option>
            <option value="14">神奈川県</option>
            <option value="15">新潟県</option>
            <option value="16">富山県</option>
            <option value="17">石川県</option>
            <option value="18">福井県</option>
            <option value="19">山梨県</option>
            <option value="20">長野県</option>
            <option value="21">岐阜県</option>
            <option value="22">静岡県</option>
            <option value="23">愛知県</option>
            <option value="24">三重県</option>
            <option value="25">滋賀県</option>
            <option value="26">京都府</option>
            <option value="27">大阪府</option>
            <option value="28">兵庫県</option>
            <option value="29">奈良県</option>
            <option value="30">和歌山県</option>
            <option value="31">鳥取県</option>
            <option value="32">島根県</option>
            <option value="33">岡山県</option>
            <option value="34">広島県</option>
            <option value="35">山口県</option>
            <option value="36">徳島県</option>
            <option value="37">香川県</option>
            <option value="38">愛媛県</option>
            <option value="39">高知県</option>
            <option value="40">福岡県</option>
            <option value="41">佐賀県</option>
            <option value="42">長崎県</option>
            <option value="43">熊本県</option>
            <option value="44">大分県</option>
            <option value="45">宮崎県</option>
            <option value="46">鹿児島県</option>
            <option value="47">沖縄県</option>
          </select>
           <x-input-error :messages="$errors->get('perfecture')" class="mt-2" />
          </div></div>
            
          <div class="flex flex-col mb-4">
          <x-input-label for="mont" :value="__('百・二百名山')" />
          <div class="relative">
          <select id="mont" type="text" name="mont" :value="old('mont')" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            <option></option>
            <option value="1" id="mont" name="mont">百名山</option>
            <option value="2" id="mont" name="mont">二百名山</option>
          </select>
          </div></div>
            
            <div class="flex flex-col mb-4">
              <x-input-label for="tweet" :value="__('山')" />
              <x-text-input id="tweet" class="block mt-1 w-full" type="text" name="tweet" :value="old('tweet')" required autofocus />
              <x-input-error :messages="$errors->get('tweet')" class="mt-2" />
            </div>
            
            
             <div class="flex flex-col mb-4">
                <p class="title"> </p>
              <label class="full-field">
              <x-input-label for="parking" :value="__('駐車場')" />
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
           @include('map/autocomplete')
          <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDad24zpc64K8oLZQoO_cWKpeCSeHLGNwc&callback=initAutocomplete&region=JP&language=ja&libraries=places&v=weekly"
            defer
          ></script>    
        </div>
      </div>
    </div>
  </div>
</x-app-layout>

