<x-guest-layout>
    <div class="w-full max-w-md mx-auto bg-white shadow-md rounded-lg p-6">
        <!-- Logo / Header -->
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">
                Selamat Datang di {{ config('app.name') }}
            </h1>
            <p class="text-gray-500 mt-2">
                Silakan login
            </p>
        </div>

        <!-- Form Login Breeze -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                    :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password"
                    name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Tombol Login -->
            <div class="flex items-center justify-between mt-6">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                        href="{{ route('password.request') }}">
                        {{ __('Lupa password?') }}
                    </a>
                @endif

                <x-primary-button class="ms-3">
                    {{ __('Login') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
