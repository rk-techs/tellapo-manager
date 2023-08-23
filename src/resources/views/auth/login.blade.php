@extends('layouts.guest')

@section('title')
    ログイン | {{ config('app.name') }}
@endsection

@section('content')
<main class="layout-login">
    <div class="login-container">
        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="login-title-block">
                <h1 class="title title-h1">{{ config('app.name') }} login</h1>
            </div>

            <div class="login-form-block">
                <div class="login-input-row">
                    <label for="userEmailInput" class="form-label">
                        <span class="label-txt">E-mail</span>
                    </label>
                    <input id="userEmailInput" type="email" class="input-field" name="email" value="{{ old('email') }}">
                </div>
                <div class="login-input-row">
                    <label for="userPasswordInput" class="form-label">
                        <span class="label-txt">Password</span>
                    </label>
                    <input id="userPasswordInput" type="password" class="input-field" name="password">
                </div>
                {{-- Remember Me --}}
                <div class="login-input-row">
                    <label for="userRememberMeInput" class="form-label">
                        <input id="userRememberMeInput" type="checkbox" class="input-field" name="remember">
                        <span class="label-txt">Remember me</span>
                    </label>
                </div>

                @if ($errors->any())
                @foreach ($errors->all() as $error)
                <div class="invalid-feedback u-my-2">
                    {{ $error }}
                </div>
                @endforeach
                @endif

                <div class="login-input-row">
                    <button class="btn-block btn-primary">ログイン</button>
                </div>
            </div>

        </form>
    </div>
</main>
@endsection
