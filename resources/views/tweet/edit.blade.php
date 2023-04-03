<!-- resources/views/tweet/edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('編集画面') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
            <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200  ">
                    @include('common.errors')
                    <form class="mb-6"  action="{{ route('tweet.update', ['tweet' => $tweet->id]) }}" method="POST">
                        @method('put')
                        @csrf
                        <div class="flex flex-col mb-4">
                            <x-input-label for="tweet" :value="__('山（必須）')" />
                            <x-text-input id="tweet" class="block mt-1 w-full" type="text" name="tweet"
                                value="{{$tweet->tweet}}" required autofocus />
                            <x-input-error :messages="$errors->get('tweet')" class="mt-2" />
                        </div>

                        <x-input-label :value="__('公開設定')" />
                        <div class="flex items-center mt-2">
                            <input id="public" type="radio" name="is_public" value="1" class="form-radio h-5 w-5 text-blue-600" {{ $tweet->is_public == 1 ? 'checked' : '' }}>
                            <label for="public" class="ml-2">{{ __('公開') }}</label>
                        </div>
                        <div class="flex items-center mt-2">
                            <input id="private" type="radio" name="is_public" value="0"
                                class="form-radio h-5 w-5 text-blue-600" {{ $tweet->is_public == 0 ? 'checked' : '' }}>
                            <label for="private" class="ml-2">{{ __('非公開') }}</label>
                        </div>
                        <x-input-error :messages="$errors->get('is_public')" class="mt-2" />

                        <div class="flex flex-col mb-4">
                            <x-input-label for="date" :value="__('日付')" />
                            <x-text-input id="date" class="block mt-1 w-full" type="date" name="date"
                                value="{{ $tweet->date }}" required autofocus />
                            <x-input-error :messages="$errors->get('date')" class="mt-2" />
                        </div>

                        <div class="flex flex-col mb-4">
                            <x-input-label for="perfecture" :value="__('道都府県（必須）')" />
                            <div class="relative">
                                <select id="perfecture" name="perfecture" type="text" value="{{ $tweet->perfecture }}"
                                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    required autofocus>
                                    <option></option>
                                    <option value="北海道" {{ $tweet->perfecture == '北海道' ? 'selected' : '' }}>北海道</option>
                                    <option value="青森県" {{ $tweet->perfecture == '青森県' ? 'selected' : '' }}>青森県</option>
                                    <option value="岩手県" {{ $tweet->perfecture == '岩手県' ? 'selected' : '' }}>岩手県</option>
                                    <option value="宮城県" {{ $tweet->perfecture == '宮城県' ? 'selected' : '' }}>宮城県</option>
                                    <option value="秋田県" {{ $tweet->perfecture == '秋田県' ? 'selected' : '' }}>秋田県</option>
                                    <option value="山形県" {{ $tweet->perfecture == '山形県' ? 'selected' : '' }}>山形県</option>
                                    <option value="福島県" {{ $tweet->perfecture == '福島県' ? 'selected' : '' }}>福島県</option>
                                    <option value="茨城県" {{ $tweet->perfecture == '茨城県' ? 'selected' : '' }}>茨城県</option>
                                    <option value="栃木県" {{ $tweet->perfecture == '栃木県' ? 'selected' : '' }}>栃木県</option>
                                    <option value="群馬県" {{ $tweet->perfecture == '群馬県' ? 'selected' : '' }}>群馬県</option>
                                    <option value="埼玉県" {{ $tweet->perfecture == '埼玉県' ? 'selected' : '' }}>埼玉県</option>
                                    <option value="千葉県" {{ $tweet->perfecture == '千葉県' ? 'selected' : '' }}>千葉県</option>
                                    <option value="東京都" {{ $tweet->perfecture == '東京都' ? 'selected' : '' }}>東京都</option>
                                    <option value="神奈川県" {{ $tweet->perfecture == '神奈川県' ? 'selected' : '' }}>神奈川県</option>
                                    <option value="新潟県" {{ $tweet->perfecture == '新潟県' ? 'selected' : '' }}>新潟県</option>
                                    <option value="富山県" {{ $tweet->perfecture == '富山県' ? 'selected' : '' }}>富山県</option>
                                    <option value="石川県" {{ $tweet->perfecture == '石川県' ? 'selected' : '' }}>石川県</option>
                                    <option value="福井県" {{ $tweet->perfecture == '福井県' ? 'selected' : '' }}>福井県</option>
                                    <option value="山梨県" {{ $tweet->perfecture == '山梨県' ? 'selected' : '' }}>山梨県</option>
                                    <option value="長野県" {{ $tweet->perfecture == '長野県' ? 'selected' : '' }}>長野県</option>
                                    <option value="岐阜県" {{ $tweet->perfecture == '岐阜県' ? 'selected' : '' }}>岐阜県</option>
                                    <option value="静岡県" {{ $tweet->perfecture == '静岡県' ? 'selected' : '' }}>静岡県</option>
                                    <option value="愛知県" {{ $tweet->perfecture == '愛知県' ? 'selected' : '' }}>愛知県</option>
                                    <option value="三重県" {{ $tweet->perfecture == '三重県' ? 'selected' : '' }}>三重県</option>
                                    <option value="滋賀県" {{ $tweet->perfecture == '滋賀県' ? 'selected' : '' }}>滋賀県</option>
                                    <option value="京都府" {{ $tweet->perfecture == '京都府' ? 'selected' : '' }}>京都府</option>
                                    <option value="大阪府" {{ $tweet->perfecture == '大阪府' ? 'selected' : '' }}>大阪府</option>
                                    <option value="兵庫県" {{ $tweet->perfecture == '兵庫県' ? 'selected' : '' }}>兵庫県</option>
                                    <option value="奈良県" {{ $tweet->perfecture == '奈良県' ? 'selected' : '' }}>奈良県</option>
                                    <option value="和歌山県" {{ $tweet->perfecture == '和歌山県' ? 'selected' : '' }}>和歌山県</option>
                                    <option value="鳥取県" {{ $tweet->perfecture == '鳥取県' ? 'selected' : '' }}>鳥取県</option>
                                    <option value="島根県" {{ $tweet->perfecture == '島根県' ? 'selected' : '' }}>島根県</option>
                                    <option value="岡山県" {{ $tweet->perfecture == '岡山県' ? 'selected' : '' }}>岡山県</option>
                                    <option value="広島県" {{ $tweet->perfecture == '広島県' ? 'selected' : '' }}>広島県</option>
                                    <option value="山口県" {{ $tweet->perfecture == '山口県' ? 'selected' : '' }}>山口県</option>
                                    <option value="徳島県" {{ $tweet->perfecture == '徳島県' ? 'selected' : '' }}>徳島県</option>
                                    <option value="香川県" {{ $tweet->perfecture == '香川県' ? 'selected' : '' }}>香川県</option>
                                    <option value="愛媛県" {{ $tweet->perfecture == '愛媛県' ? 'selected' : '' }}>愛媛県</option>
                                    <option value="高知県" {{ $tweet->perfecture == '高知県' ? 'selected' : '' }}>高知県</option>
                                    <option value="福岡県" {{ $tweet->perfecture == '福岡県' ? 'selected' : '' }}>福岡県</option>
                                    <option value="佐賀県" {{ $tweet->perfecture == '佐賀県' ? 'selected' : '' }}>佐賀県</option>
                                    <option value="長崎県" {{ $tweet->perfecture == '長崎県' ? 'selected' : '' }}>長崎県</option>
                                    <option value="熊本県" {{ $tweet->perfecture == '熊本県' ? 'selected' : '' }}>熊本県</option>
                                    <option value="大分県" {{ $tweet->perfecture == '大分県' ? 'selected' : '' }}>大分県</option>
                                    <option value="宮崎県" {{ $tweet->perfecture == '宮崎県' ? 'selected' : '' }}>宮崎県</option>
                                    <option value="鹿児島県" {{ $tweet->perfecture == '鹿児島県' ? 'selected' : '' }}>鹿児島県</option>
                                    <option value="沖縄県" {{ $tweet->perfecture == '沖縄県' ? 'selected' : '' }}>沖縄県</option>
                                    <option value="海外" {{ $tweet->perfecture == '海外' ? 'selected' : '' }}>海外</option>

                                </select>
                                <x-input-error :messages="$errors->get('perfecture')" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex flex-col mb-4">
                            <x-input-label for="mont" :value="__('百・二百名山(任意)')" />
                            <div class="relative">
                                <select id="mont" type="text" name="mont" :value="old('mont')"
                                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    <option value="なし" {{ $tweet->mont == 'なし' ? 'selected' : '' }}></option>
                                    <option value="百名山" {{ $tweet->mont == '百名山' ? 'selected' : '' }}>百名山</option>
                                    <option value="二百名山" {{ $tweet->mont == '二百名山' ? 'selected' : '' }}>二百名山</option>

                                </select>
                            </div>
                        </div>

                        @include('map/autocomplete')
                        <div class="flex flex-col mb-4">
                            <p class="title"> </p>
                            <label class="full-field">
                                <x-input-label for="parking" :value="__('駐車場(必須・場所を入力すると、住所が表示されます)')" />
                                <x-text-input id="parking" class="block mt-1 w-full" type="text" name="parking"
                                    value="{{ $tweet->parking }}" required autocomplete="on" />
                                <x-input-error :messages="$errors->get('parking')" class="mt-2" />
                            </label>
                        </div>

                        <div id="map" style="height:500px" class="w-960"> </div>

                        <div class="flex flex-col mb-4">
                            <p class="title"> </p>
                            <label class="full-field">
                                <x-input-label for="spring" :value="__('温泉(場所を入力すると、住所が表示されます)')" />
                                <x-text-input id="spring" class="block mt-1 w-full" type="text" name="spring"
                                    value="{{ $tweet->spring }}" autocomplete="on" />
                                <x-input-error :messages="$errors->get('spring')" class="mt-2" />
                            </label>
                        </div>

                        <div id="mapSpring" style="height:500px" class="w-960"> </div>

                        <div class="flex flex-col mb-4">
                            <p class="title"> </p>
                            <label class="full-field">
                                <x-input-label for="food" :value="__('飲食店 (場所を入力すると、住所が表示されます)')" />
                                <x-text-input id="food" class="block mt-1 w-full" type="text" name="food"
                                    value="{{ $tweet->food }}" autocomplete="on" />
                                <x-input-error :messages="$errors->get('food')" class="mt-2" />
                            </label>
                        </div>
                        <div id="mapFood" style="height:500px" class="w-960"> </div>

                        <div class="flex flex-col mb-4">
                            <x-input-label for="description" :value="__('旅の感想')" />
                            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description"
                                value="{{ $tweet->description }}" required autofocus />
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                 

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ url()->previous() }}">
                                <x-secondary-button class="ml-3">
                                    {{ __('戻る') }}
                                    </x-primary-button>
                            </a>
                            <x-primary-button class="ml-3">
                                {{ __('更新') }}
                            </x-primary-button>
                        </div>
                    </form>
                    <script
                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDad24zpc64K8oLZQoO_cWKpeCSeHLGNwc&callback=initMap&region=JP&language=ja&libraries=places&v=weekly"
                        defer></script>
                </div>
            </div>
        </div>
</x-app-layout>