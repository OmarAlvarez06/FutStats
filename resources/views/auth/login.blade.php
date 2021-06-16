<x-guest-layout>
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        <a href="{{route('register')}}" class="ml-4 text-sm text-gray-700 underline">Registrarse</a>
    </div>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <img src="{{asset('images/logo_icon.png')}}">
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{route('login')}}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Correo Electrónico')}}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Contraseña')}}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Recuérdame')}}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste Tu Contraseña?')}}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Ingresar')}}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
