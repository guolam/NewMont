<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('メールアドレス')" />
            <input id="email" class="rounded-md block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('パスワード')" />

            <input id="password" class="rounded-md block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded  border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 " name="remember">
                <span class="ml-2 text-sm text-gray-600 ">{{ __('パスワードを保存') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600  hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 " href="{{ route('password.request') }}">
                    {{ __('パスワードを忘れた方') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('ログイン') }}
            </x-primary-button>
        </div>
    </form>
    <div class="text-center">
        <button type="submit" class="rounded-md bg-green-500 text-white px-4 py-2 rounded mt-4">
                <a href="{{ route('register') }}" >
                    <div class="flex">
                    山や旅の思い出を登録されたい方はこちら
                    <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" width="24" height="24" color="#ffffff"><defs><style>.cls-637b715ef95e86b59c579e66-1{fill:none;stroke:currentColor;stroke-miterlimit:10;}</style></defs><path class="cls-637b715ef95e86b59c579e66-1" d="M17.62,23.28V20.47l.09-.17a16.93,16.93,0,0,0,1.79-7.58h0a1.89,1.89,0,0,0-1.61-1.86l-5-.7V3.59a1.84,1.84,0,0,0-.56-1.32,1.83,1.83,0,0,0-1.48-.54,1.94,1.94,0,0,0-1.71,2V13.91l-1.3-1.3A2,2,0,0,0,6.49,12a2,2,0,0,0-1.41.58,2,2,0,0,0,0,2.81l5,5v2.81"></path></svg>
                    </div>
                </a>
        </button>
    </div>
</x-guest-layout>
