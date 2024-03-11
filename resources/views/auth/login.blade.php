@extends('layouts.app')
@section('content')
<!-- Content area -->
<div class="content d-flex justify-content-center align-items-center">

    <!-- Login form -->
    <form class="login-form" action="{{ route('login') }}" method="POST">
        @csrf
        <div class="card mb-0">
            <div class="card-body ">
                <div class="text-center mb-3 ">
                    <h5 class="mb-0">Ingrese a su cuenta</h5>
                    <span class="d-block text-muted">Ingrese sus credenciales a continuación</span>
                </div>

                <x-auth-session-status class="mb-4 bg-info" :status="session('status')" />

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Contraseña')" />

                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember Me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif

                    <x-primary-button class="ms-3">
                        {{ __('Acceder') }}
                    </x-primary-button>
                </div>
                
            </div>
        </div>
    </form>
    <!-- /login form -->

</div>
<!-- /content area -->
   
@endsection